<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('Admin_model');
        $this->is_logged_in();
    }

    private function is_logged_in()
    {
        if (!$this->session->userdata('nim') || $this->session->userdata('role_id') != 1) {
            redirect('login');
        }
    }

    private function load_common_data()
    {
        return [
            'admin_user' => $this->Admin_model->get_user_by_nim($this->session->userdata('nim')),
        ];
    }

    public function index()
    {
        $data = $this->load_common_data();
        $data['title'] = 'Dashboard | Admin Alumni | Prodi Informatika';
        $data['total_users'] = $this->Admin_model->get_total_users();
        $data['total_tracer_filled'] = $this->Admin_model->get_total_tracer_filled();
        $data['total_bekerja'] = $this->Admin_model->get_total_bekerja();
        $data['total_wiraswasta'] = $this->Admin_model->get_total_wiraswasta();
        $data['total_lanjut_studi'] = $this->Admin_model->get_total_lanjut_studi();
        $data['total_belum_kerja'] = $this->Admin_model->get_total_belum_kerja();

        $this->load->view('admin/templates_admin/header_admin', $data);
        $this->load->view('admin/templates_admin/sidebar_admin', $data);
        $this->load->view('admin/templates_admin/topbar_admin', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('admin/templates_admin/footer_admin');
    }

    public function users()
    {
        $data = $this->load_common_data();
        $data['title'] = 'Users | Admin Alumni | Prodi Informatika';
        $data['all_users'] = $this->Admin_model->get_all_users();

        $this->load->view('admin/templates_admin/header_admin', $data);
        $this->load->view('admin/templates_admin/sidebar_admin', $data);
        $this->load->view('admin/templates_admin/topbar_admin', $data);
        $this->load->view('admin/users/users', $data);
        $this->load->view('admin/templates_admin/footer_admin');
    }

    public function users_add()
    {
        $data = $this->load_common_data();
        $this->form_validation->set_rules('nim', 'NIM', 'required|trim');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[5]|matches[password2]', [
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password terlalu pendek!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        $this->form_validation->set_rules('role', 'Role', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah User | Alumni Mahasiswa | Prodi Informatika';
            $this->load->view('admin/templates_admin/header_admin', $data);
            $this->load->view('admin/templates_admin/sidebar_admin', $data);
            $this->load->view('admin/templates_admin/topbar_admin', $data);
            $this->load->view('admin/users/users_add', $data);
            $this->load->view('admin/templates_admin/footer_admin');
        } else {
            $new_user_data = [
                'nim' => htmlspecialchars($this->input->post('nim', true)),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.png',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => $this->input->post('role'),
                'is_active' => 1,
            ];

            $this->Admin_model->insert_user($new_user_data);
            $this->session->set_flashdata('message', 'Akun berhasil dibuat');
            $this->session->set_flashdata('alert_class', 'alert-success');

            redirect('admin/users');
        }
    }

    public function users_edit($id)
    {
        $data = $this->load_common_data();
        $data['user'] = $this->Admin_model->get_user_by_id($id);

        $this->form_validation->set_rules('nim', 'NIM', 'required|trim');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password1', 'Password', 'trim|min_length[5]|matches[password2]', [
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password terlalu pendek!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'trim|matches[password1]');
        $this->form_validation->set_rules('role', 'Role', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit User | Alumni Mahasiswa | Prodi Informatika';
            $this->load->view('admin/templates_admin/header_admin', $data);
            $this->load->view('admin/templates_admin/sidebar_admin', $data);
            $this->load->view('admin/templates_admin/topbar_admin', $data);
            $this->load->view('admin/users/users_edit', $data);
            $this->load->view('admin/templates_admin/footer_admin');
        } else {
            $update_data = [
                'nim' => htmlspecialchars($this->input->post('nim', true)),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'role_id' => $this->input->post('role')
            ];

            if ($this->input->post('password1')) {
                $update_data['password'] = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            }

            $this->Admin_model->update_user($id, $update_data);
            $this->session->set_flashdata('message', 'Akun berhasil diupdate');
            $this->session->set_flashdata('alert_class', 'alert-success');
            redirect('admin/users');
        }
    }

    public function users_delete($id)
    {
        $data = $this->load_common_data();
        $this->Admin_model->delete_user($id);
        $this->session->set_flashdata('message', 'Akun berhasil dihapus');
        $this->session->set_flashdata('alert_class', 'alert-success');
        redirect('admin/users');
    }

    public function angkatan()
    {
        $data = $this->load_common_data();
        $data['title'] = 'Angkatan Alumni | Alumni Mahasiswa | Prodi Informatika';
        $data['graduation_data'] = $this->Admin_model->get_graduation_years_and_counts();

        $this->load->view('admin/templates_admin/header_admin', $data);
        $this->load->view('admin/templates_admin/sidebar_admin', $data);
        $this->load->view('admin/templates_admin/topbar_admin', $data);
        $this->load->view('admin/angkatan/angkatan', $data);
        $this->load->view('admin/templates_admin/footer_admin');
    }
}
