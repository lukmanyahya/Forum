<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('file');
        $this->load->database();

        // Panggil metode is_logged_in dari Auth controller
        $this->is_logged_in();
    }

    private function is_logged_in()
    {
        if (!$this->session->userdata('nim')) {
            redirect('login');
        }
    }

    public function index()
    {
        $data['users'] = $this->db->get_where('users', ['nim' => $this->session->userdata('nim')])->row_array();
        $data['title'] = 'Profile | Alumni Mahasiswa | Prodi Informatika';

        $this->load->view('templates/header', $data);
        $this->load->view('users/profile', $data);
        $this->load->view('templates/footer');
    }

    public function update()
    {
        $data['users'] = $this->db->get_where('users', ['nim' => $this->session->userdata('nim')])->row_array();

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password1', 'Password', 'trim|min_length[5]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', validation_errors());
            $this->session->set_flashdata('alert_class', 'alert-danger');
            redirect('profile');
        } else {
            $email = $this->input->post('email');
            $password1 = $this->input->post('password1');

            // Update email
            $this->db->set('email', $email);
            $this->db->where('nim', $this->session->userdata('nim'));
            $this->db->update('users');

            // Update password if provided
            if (!empty($password1)) {
                $password_hash = password_hash($password1, PASSWORD_DEFAULT);
                $this->db->set('password', $password_hash);
                $this->db->where('nim', $this->session->userdata('nim'));
                $this->db->update('users');
            }

            // Handle image upload
            if (!empty($_FILES['avatar']['name'])) {
                $config['upload_path'] = './assets/users/img/profile/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = 10240;
                $config['file_name'] = $this->session->userdata('nim');

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('avatar')) {
                    // Delete the old image if not the default one
                    if ($data['users']['image'] != 'default.png') {
                        unlink(FCPATH . 'assets/users/img/profile/' . $data['users']['image']);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                    $this->db->where('nim', $this->session->userdata('nim'));
                    $this->db->update('users');
                } else {
                    // Set custom error message
                    if ($this->upload->display_errors('', '') == "The file you are attempting to upload is larger than the permitted size.") {
                        $this->session->set_flashdata('message', 'Ukuran gambar melebihi batas maksimal (10MB)');
                    } else {
                        $this->session->set_flashdata('message', $this->upload->display_errors());
                    }
                    $this->session->set_flashdata('alert_class', 'alert-danger');
                    redirect('profile');
                }
            }

            $this->session->set_flashdata('message', 'Profile berhasil di update');
            $this->session->set_flashdata('alert_class', 'alert-success');
            redirect('profile');
        }
    }
}
