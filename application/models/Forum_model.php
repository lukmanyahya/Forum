<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Forum_model extends CI_Model
{
    public function get_all_forums_with_users()
    {
        $this->db->select('forum.*, users.nama, users.email');
        $this->db->from('forum');
        $this->db->join('users', 'forum.user_id = users.id');
        return $this->db->get()->result_array();
    }

    public function get_forum_with_user($forum_id)
    {
        $this->db->select('forum.*, users.nama, users.email');
        $this->db->from('forum');
        $this->db->join('users', 'forum.user_id = users.id');
        $this->db->where('forum.id', $forum_id);
        return $this->db->get()->row_array();
    }

    public function insert_forum($data)
    {
        return $this->db->insert('forum', $data);
    }

    public function get_user_id_by_nim($nim)
    {
        $this->db->select('id');
        $this->db->from('users');
        $this->db->where('nim', $nim);
        $query = $this->db->get();
        return $query->row()->id;
    }
}
?>