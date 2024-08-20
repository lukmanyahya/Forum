<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users_model extends CI_Model
{
    public function get_user_by_nim($nim)
    {
        return $this->db->get_where('users', ['nim' => $nim])->row_array();
    }

    public function get_tracer_by_user_id($user_id)
    {
        return $this->db->get_where('tracer', ['user_id' => $user_id])->row();
    }

    public function get_profesi_exists($user_id, $status)
    {
        if (!$status) {
            return null;
        }

        switch ($status) {
            case 1:
                return $this->db->get_where('bekerja', ['user_id' => $user_id])->row();
            case 2:
                return $this->db->get_where('wiraswasta', ['user_id' => $user_id])->row();
            case 3:
                return $this->db->get_where('lanjut_studi', ['user_id' => $user_id])->row();
            case 4:
                return $this->db->get_where('belum_kerja', ['user_id' => $user_id])->row();
            default:
                return null;
        }
    }

    public function get_tracer_lanjutan_by_user_id($user_id)
    {
        return $this->db->get_where('tracer_lanjutan', ['user_id' => $user_id])->row();
    }

    public function get_current_status($user_id)
    {
        return $this->db->get_where('tracer', ['user_id' => $user_id])->row()->status;
    }

    public function update_user_email($user_id, $email)
    {
        $this->db->set('email', $email);
        $this->db->where('id', $user_id);
        $this->db->update('users');
    }

    public function delete_old_profesi($user_id, $status)
    {
        switch ($status) {
            case 1:
                $this->db->delete('bekerja', ['user_id' => $user_id]);
                break;
            case 2:
                $this->db->delete('wiraswasta', ['user_id' => $user_id]);
                break;
            case 3:
                $this->db->delete('lanjut_studi', ['user_id' => $user_id]);
                break;
            case 4:
                $this->db->delete('belum_kerja', ['user_id' => $user_id]);
                break;
        }
    }

    public function insert_tracer($tracer_data)
    {
        $this->db->insert('tracer', $tracer_data);
    }

    public function insert_profesi($profesi_table, $profesi_data)
    {
        $this->db->insert($profesi_table, $profesi_data);
    }

    public function insert_tracer_lanjutan($tracer_lanjutan_data)
    {
        $this->db->insert('tracer_lanjutan', $tracer_lanjutan_data);
    }

    public function update_tracer($user_id, $tracer_data)
    {
        $this->db->where('user_id', $user_id);
        $this->db->update('tracer', $tracer_data);
    }

    public function insert_or_update_profesi($profesi_table, $profesi_data)
    {
        $existing_profesi = $this->db->get_where($profesi_table, ['user_id' => $profesi_data['user_id']])->row();

        if ($existing_profesi) {
            $this->db->where('user_id', $profesi_data['user_id']);
            $this->db->update($profesi_table, $profesi_data);
        } else {
            $this->db->insert($profesi_table, $profesi_data);
        }
    }

    public function update_tracer_lanjutan($user_id, $tracer_lanjutan_data)
    {
        $this->db->where('user_id', $user_id);
        $this->db->update('tracer_lanjutan', $tracer_lanjutan_data);
    }

    public function get_user_by_id($user_id)
    {
        
        $this->db->where('id', $user_id);
        $query = $this->db->get('users');
        return $query->row();
    }
    
}