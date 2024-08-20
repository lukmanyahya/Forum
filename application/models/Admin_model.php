<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function get_user_by_id($id)
    {
        return $this->db->get_where('users', ['id' => $id])->row_array();
    }

    public function get_user_by_nim($nim)
    {
        return $this->db->get_where('users', ['nim' => $nim])->row_array();
    }

    public function get_all_users()
    {
        return $this->db->get('users')->result_array();
    }

    public function insert_user($data)
    {
        $this->db->insert('users', $data);
    }

    public function update_user($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('users', $data);
    }

    public function delete_user($id)
    {
        $this->db->delete('users', ['id' => $id]);
    }

    public function get_graduation_years_and_counts()
    {
        $this->db->select('tahun_lulus, COUNT(*) as jumlah_alumni');
        $this->db->group_by('tahun_lulus');
        return $this->db->get('tracer')->result_array();
    }

    public function get_total_users()
    {
        return $this->db->count_all('users');
    }

    public function get_total_tracer_filled()
    {
        $this->db->select('tracer.user_id');
        $this->db->from('tracer');
        $this->db->join('tracer_lanjutan', 'tracer.user_id = tracer_lanjutan.user_id', 'left');
        $this->db->join('bekerja', 'tracer.user_id = bekerja.user_id', 'left');
        $this->db->join('wiraswasta', 'tracer.user_id = wiraswasta.user_id', 'left');
        $this->db->join('lanjut_studi', 'tracer.user_id = lanjut_studi.user_id', 'left');
        $this->db->join('belum_kerja', 'tracer.user_id = belum_kerja.user_id', 'left');
        $this->db->group_by('tracer.user_id');
        return $this->db->count_all_results();
    }

    public function get_total_bekerja()
    {
        return $this->db->count_all('bekerja');
    }

    public function get_total_wiraswasta()
    {
        return $this->db->count_all('wiraswasta');
    }

    public function get_total_lanjut_studi()
    {
        return $this->db->count_all('lanjut_studi');
    }

    public function get_total_belum_kerja()
    {
        return $this->db->count_all('belum_kerja');
    }
}
