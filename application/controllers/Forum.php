<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Forum extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Forum_model');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index()
    {
        $data['forums'] = $this->Forum_model->get_all_forums_with_users();
        $data['title'] = 'Forums';

        $this->load->view('templates/header', $data);
        $this->load->view('forum/index', $data);
        $this->load->view('templates/footer');
    }

    public function view($forum_id)
    {
        $data['forum'] = $this->Forum_model->get_forum_with_user($forum_id);
        $data['title'] = $data['forum']['title'];

        $this->load->view('templates/header', $data);
        $this->load->view('forum/view', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('content', 'Content', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Create Forum Post';

            $this->load->view('templates/header', $data);
            $this->load->view('forum/create', $data);
            $this->load->view('templates/footer');
        } else {
            $user_nim = $this->session->userdata('nim');
            $user_id = $this->Forum_model->get_user_id_by_nim($user_nim);
            
            if (!$user_id) {
                show_error('User ID is required.');
                return;
            }
            
            $data = [
                'user_id' => $user_id,  // Use 'user_id' to match the foreign key constraint
                'title' => $this->input->post('title'),
                'content' => $this->input->post('content')
            ];

            $this->Forum_model->insert_forum($data);
            $this->session->set_flashdata('message', 'Forum post created successfully!');
            redirect('forum');
        }
    }
}
?>