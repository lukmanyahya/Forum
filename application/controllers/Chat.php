<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Message_model');
        $this->load->library('upload');
    }

    // Halaman utama chat
    public function index() {
        $data['messages'] = $this->Message_model->get_messages();
        $data['user_nim'] = $this->session->userdata('nim'); // Pastikan `nim` ada di session
        $this->load->view('chat/index', $data);
    }

    // Kirim pesan baru
    public function send() {
        $message = $this->input->post('message', true);
        $nim = $this->session->userdata('nim'); // Pastikan pengguna sudah login
        $image_path = null;

        // Cek jika ada file yang diupload
        if (!empty($_FILES['file']['name'])) {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = 2048; // Maksimal 2MB
            $config['encrypt_name'] = true;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('file')) {
                $upload_data = $this->upload->data();
                $image_path = 'uploads/' . $upload_data['file_name'];
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('chat');
            }
        }

        if ($this->Message_model->save_message($nim, $message, $image_path)) {
            $this->session->set_flashdata('success', 'Pesan berhasil dikirim.');
        } else {
            $this->session->set_flashdata('error', 'Gagal mengirim pesan.');
        }

        redirect('chat');
    }

    // Tambahkan komentar
    public function comment() {
        $message_id = $this->input->post('message_id', true);
        $comment = $this->input->post('comment', true);
        $nim = $this->session->userdata('nim');

        if ($this->Message_model->save_comment($message_id, $nim, $comment)) {
            $this->session->set_flashdata('success', 'Komentar berhasil ditambahkan.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menambahkan komentar.');
        }

        redirect('chat');
    }

    // Tambahkan balasan
    public function reply() {
        $comment_id = $this->input->post('comment_id', true);
        $message_id = $this->input->post('message_id', true);
        $reply = $this->input->post('reply', true);
        $nim = $this->session->userdata('nim');

        if ($this->Message_model->add_reply($comment_id, $message_id, $reply, $nim)) {
            $this->session->set_flashdata('success', 'Balasan berhasil dikirim.');
        } else {
            $this->session->set_flashdata('error', 'Gagal mengirim balasan.');
        }

        redirect('chat');
    }

    // Beri like pada pesan
    public function like($message_id) {
        $nim = $this->session->userdata('nim');

        if ($this->Message_model->user_liked($message_id, $nim)) {
            $this->Message_model->unlike_message($message_id, $nim);
            $this->session->set_flashdata('success', 'Like dihapus.');
        } else {
            $this->Message_model->like_message($message_id, $nim);
            $this->session->set_flashdata('success', 'Like berhasil ditambahkan.');
        }

        redirect('chat');
    }

    // Hapus pesan
    public function delete($message_id) {
        $user_nim = $this->session->userdata('nim');
        $owner_nim = $this->Message_model->get_message_owner($message_id);

        if ($user_nim === $owner_nim) {
            $this->Message_model->delete_message($message_id);
            $this->session->set_flashdata('success', 'Pesan berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Anda tidak memiliki izin untuk menghapus pesan ini.');
        }

        redirect('chat');
    }

    // Edit pesan
    public function edit($message_id) {
        $message = $this->input->post('message', true);
        $user_nim = $this->session->userdata('nim');
        $owner_nim = $this->Message_model->get_message_owner($message_id);

        if ($user_nim === $owner_nim) {
            $this->Message_model->update_message($message_id, $message);
            $this->session->set_flashdata('success', 'Pesan berhasil diperbarui.');
        } else {
            $this->session->set_flashdata('error', 'Anda tidak memiliki izin untuk mengedit pesan ini.');
        }

        redirect('chat');
    }

    // Hapus komentar
    public function delete_comment($comment_id) {
        $comment = $this->Message_model->get_comment_by_id($comment_id);

        if ($comment && $comment['nim'] === $this->session->userdata('nim')) {
            $this->Message_model->delete_comment($comment_id);
            $this->session->set_flashdata('success', 'Komentar berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Anda tidak memiliki izin untuk menghapus komentar ini.');
        }

        redirect('chat');
    }

    // Edit komentar
    public function edit_comment($comment_id) {
        $comment = $this->input->post('comment', true);
        $current_comment = $this->Message_model->get_comment_by_id($comment_id);

        if ($current_comment && $current_comment['nim'] === $this->session->userdata('nim')) {
            $this->Message_model->update_comment($comment_id, ['comment' => $comment]);
            $this->session->set_flashdata('success', 'Komentar berhasil diperbarui.');
        } else {
            $this->session->set_flashdata('error', 'Anda tidak memiliki izin untuk mengedit komentar ini.');
        }

        redirect('chat');
    }

    // Hapus balasan
    public function delete_reply($reply_id) {
        $reply = $this->Message_model->get_reply_by_id($reply_id);

        if ($reply && $reply['nim'] === $this->session->userdata('nim')) {
            $this->Message_model->delete_reply($reply_id);
            $this->session->set_flashdata('success', 'Balasan berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Anda tidak memiliki izin untuk menghapus balasan ini.');
        }

        redirect('chat');
    }

    // Edit balasan
    public function edit_reply($reply_id) {
        $reply = $this->input->post('reply', true);
    
        // Mengambil balasan berdasarkan ID
        $current_reply = $this->Message_model->get_reply_by_id($reply_id);
    
        // Mengecek apakah balasan ditemukan
        if ($current_reply) {
            $this->Message_model->edit_reply($reply_id, ['reply' => $reply]);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Balasan berhasil diperbarui.');
            } else {
                $this->session->set_flashdata('error', 'Tidak ada perubahan pada balasan.');
            }
        } else {
            $this->session->set_flashdata('error', 'Balasan tidak ditemukan.');
        }
    
        redirect('chat');
    }
    
    

}
?>