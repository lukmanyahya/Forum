<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Auth_model');
    }

    public function login()
    {
        if ($this->session->userdata('nim')) {
            $role_id = $this->session->userdata('role_id');
            if ($role_id == 1) {
                redirect('admin');
            } elseif ($role_id == 2) {
                redirect('users'); // Redirect to Users controller for alumni
            } elseif ($role_id == 3) {
                redirect('mitra');
            }
        }

        $this->form_validation->set_rules('nim', 'NIM', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Alumni Mahasiswa | Prodi Informatika';
            $this->load->view('auth/login', $data);
            $this->load->view('templates/footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $nim = $this->input->post('nim');
        $password = $this->input->post('password');

        $user = $this->Auth_model->get_user_by_nim($nim);

        if ($user) {
            if ($user['is_active'] == 1) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'user_id' => $user['id'],
                        'nim' => $user['nim'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);

                    $this->session->set_flashdata('message', 'Login berhasil');
                    $this->session->set_flashdata('alert_class', 'alert-success');

                    if ($user['role_id'] == 1) {
                        redirect('admin');
                    } elseif ($user['role_id'] == 2) {
                        redirect('users'); // Redirect to Users controller for alumni
                    } elseif ($user['role_id'] == 3) {
                        redirect('mitra');
                    }
                } else {
                    $this->session->set_flashdata('message', 'Password salah');
                    $this->session->set_flashdata('alert_class', 'alert-danger');
                    redirect('login');
                }
            } else {
                $this->session->set_flashdata('message', 'Akun ini belum aktif');
                $this->session->set_flashdata('alert_class', 'alert-danger');
                redirect('login');
            }
        } else {
            $this->session->set_flashdata('message', 'Akun tidak ada');
            $this->session->set_flashdata('alert_class', 'alert-danger');
            redirect('login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('nim');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', 'Logout berhasil');
        $this->session->set_flashdata('alert_class', 'alert-success');
        redirect('login');
    }

    public function forgot_password()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Forgot Password | Prodi Informatika';
            $this->load->view('auth/forgot_password', $data);
            $this->load->view('templates/footer');
        } else {
            $email = $this->input->post('email');
            $user = $this->Auth_model->get_user_by_email($email);

            if ($user) {
                // Generate token
                $token = bin2hex(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];
                $this->Auth_model->insert_token($user_token);

                // Send email
                $this->_send_email($token, 'forgot');

                $this->session->set_flashdata('message', 'Cek email Anda untuk reset password');
                $this->session->set_flashdata('alert_class', 'alert-success');
                redirect('forgot_password');
            } else {
                $this->session->set_flashdata('message', 'Email tidak terdaftar');
                $this->session->set_flashdata('alert_class', 'alert-danger');
                redirect('forgot_password');
            }
        }
    }

    private function _send_email($token, $type)
    {
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.example.com',
            'smtp_user' => 'your-email@example.com',
            'smtp_pass' => 'your-email-password',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];

        $this->load->library('email', $config);
        $this->email->initialize($config);

        $this->email->from('your-email@example.com', 'Your Name');
        $this->email->to($this->input->post('email'));

        if ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('Klik tautan ini untuk mereset password Anda: <a href="' . base_url() . 'reset_password?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function reset_password()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->Auth_model->get_user_by_email($email);

        if ($user) {
            $user_token = $this->Auth_model->get_token($token);

            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->change_password();
            } else {
                $this->session->set_flashdata('message', 'Reset password gagal! Token salah.');
                $this->session->set_flashdata('alert_class', 'alert-danger');
                redirect('login');
            }
        } else {
            $this->session->set_flashdata('message', 'Reset password gagal! Email salah.');
            $this->session->set_flashdata('alert_class', 'alert-danger');
            redirect('login');
        }
    }

    public function change_password()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('login');
        }

        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[6]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Change Password | Prodi Informatika';
            $this->load->view('auth/change_password', $data);
            $this->load->view('templates/footer');
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->Auth_model->update_password($email, $password);

            $this->session->unset_userdata('reset_email');

            $this->session->set_flashdata('message', 'Password berhasil diubah!');
            $this->session->set_flashdata('alert_class', 'alert-success');
            redirect('login');
        }
    }
}
