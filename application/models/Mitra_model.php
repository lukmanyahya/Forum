<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mitra_model extends CI_Model
{
    public function get_user_by_nim($nim)
    {
        return $this->db->get_where('users', ['nim' => $nim])->row_array();
    }

    

    public function get_user_by_id($user_id)
    {
        
        $this->db->where('id', $user_id);
        $query = $this->db->get('users');
        return $query->row();
    }
    
}