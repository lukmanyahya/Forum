<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Message_model');
        $this->load->helper('url_helper');
        $this->load->library('form_validation');
        $this->load->library('session'); // Pastikan library session dimuat
    }
   
    // Halaman utama chat
    public function index() {
        $data['messages'] = $this->Message_model->get_messages(); // Mengambil semua pesan
        $data['user_nim'] = $this->session->userdata('nim'); // Ambil nim dari sesi

        // Pastikan nim diambil dengan benar dari sesi
        if (empty($data['user_nim'])) {
            show_error('User NIM is required.');
            return;
        }

        // Dapatkan komentar untuk setiap pesan
        foreach ($data['messages'] as &$message) {
            $message['comments'] = $this->Message_model->get_comments($message['id']);
        }

        $this->load->view('chat/index', $data);
    }
    public function send() {
        $nim = $this->session->userdata('nim');
        $message = $this->input->post('message');
        
        if (!empty($nim) && !empty($message)) {
            $this->Message_model->save_message($nim, $message);
            redirect('chat');
        } else {
            show_error('Message cannot be empty.');
        }
    }
    public function edit($message_id) {
        $nim = $this->session->userdata('nim');
        $message = $this->input->post('message');
    
        // Cek apakah pesan milik pengguna yang sedang login
        $message_owner = $this->Message_model->get_message_owner($message_id);
        if ($message_owner == $nim) {
            $this->Message_model->update_message($message_id, $message);
            redirect('chat');
        } else {
            show_error('You do not have permission to edit this message.');
        }
    }
    public function delete($message_id) {
            $nim = $this->session->userdata('nim');
            $message_owner = $this->Message_model->get_message_owner($message_id);
            
            if ($message_owner == $nim) {
                $this->Message_model->delete_message($message_id);
                redirect('chat');
            } else {
                show_error('You do not have permission to delete this message.');
            }
        }
    public function add_comment($message_id) {
            $nim = $this->session->userdata('nim');
            $comment = $this->input->post('comment');
            
            if (!empty($comment)) {
                $this->Message_model->save_comment($message_id, $nim, $comment);
            }
            redirect('chat');
        }
        public function like($message_id) {
            $nim = $this->session->userdata('nim');
            if ($this->Message_model->save_like($message_id, $nim)) {
                redirect('chat');
            } else {
                show_error('You have already liked this message.');
            }
        }

    // Mengirim komentar baru
    public function comment() {
        $message_id = $this->input->post('message_id');
        $nim = $this->session->userdata('nim');
        $comment = $this->input->post('comment');

        if (!empty($message_id) && !empty($nim) && !empty($comment)) {
            $this->Message_model->save_comment($message_id, $nim, $comment);
        }

        redirect('chat');
    }
}
