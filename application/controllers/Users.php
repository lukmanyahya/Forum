<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('Users_model');

        $this->is_logged_in();
    }

    private function is_logged_in()
    {
        if (!$this->session->userdata('nim') || $this->session->userdata('role_id') != 2) {
            redirect('login');
        }
    }

    public function index()
    {
        $nim = $this->session->userdata('nim');
        $data['users'] = $this->Users_model->get_user_by_nim($nim);
        $data['title'] = 'Alumni Mahasiswa | Prodi Informatika';

        $user_id = $data['users']['id'];
        $data['tracer_exists'] = $this->Users_model->get_tracer_by_user_id($user_id);
        $data['profesi_exists'] = $this->Users_model->get_profesi_exists($user_id, $data['tracer_exists']->status ?? null);
        $data['tracer_lanjutan_exists'] = $this->Users_model->get_tracer_lanjutan_by_user_id($user_id);

        $this->load->view('templates/header', $data);
        $this->load->view('users/index', $data);
        $this->load->view('templates/footer');
    }
}
