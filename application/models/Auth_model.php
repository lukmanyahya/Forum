<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    public function get_user_by_nim($nim)
    {
        return $this->db->get_where('users', ['nim' => $nim])->row_array();
    }

    public function get_user_by_email($email)
    {
        return $this->db->get_where('users', ['email' => $email])->row_array();
    }

    public function insert_token($user_token)
    {
        $this->db->insert('user_token', $user_token);
    }

    public function get_token($token)
    {
        return $this->db->get_where('user_token', ['token' => $token])->row_array();
    }

    public function update_password($email, $password)
    {
        $this->db->set('password', $password);
        $this->db->where('email', $email);
        $this->db->update('users');
    }
}
