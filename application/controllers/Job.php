<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Job extends CI_Controller
{
    public function index()
    {
        $data['users'] = $this->db->get_where('users', ['nim' => $this->session->userdata('nim')])->row_array();
        $data['title'] = 'Job | Alumni Mahasiswa | Prodi Informatika';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('users/job', $data);
        $this->load->view('templates/footer');
    }
}
