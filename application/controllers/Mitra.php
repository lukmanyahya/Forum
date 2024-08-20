<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mitra extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('Mitra_model'); // Load specific models for Mitra here
        
        $this->is_logged_in();
    }

    private function is_logged_in()
    {
        if (!$this->session->userdata('nim') || $this->session->userdata('role_id') != 3) {
            redirect('login');
        }
    }

    public function index()
    {
        $data['title'] = 'Dashboard | Mitra';
        $this->load->view('templates/header', $data);
        $this->load->view('mitra/index_mitra', $data);
        $this->load->view('templates/footer');
    }
}
