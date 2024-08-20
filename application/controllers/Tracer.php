<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tracer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->model('Users_model');

        $this->is_logged_in();
    }

    private function is_logged_in()
    {
        if (!$this->session->userdata('nim')) {
            redirect('login');
        }
    }

    public function index()
    {
        $nim = $this->session->userdata('nim');
        $data['users'] = $this->db->get_where('users', ['nim' => $nim])->row_array();
        $data['title'] = 'Tracer | Alumni Mahasiswa | Prodi Informatika';

        $user_id = $data['users']['id'];
        $data['tracer_exists'] = $this->Users_model->get_tracer_by_user_id($user_id);
        $data['tracer_lanjutan_exists'] = $this->Users_model->get_tracer_lanjutan_by_user_id($user_id);

        $this->load->view('templates/header', $data);
        $this->load->view('users/tracer', $data);
        $this->load->view('templates/footer');
    }

    public function form_tracer()
    {
        $this->form_validation->set_rules('telepon', 'Telepon', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('npwp', 'NPWP', 'required');
        $this->form_validation->set_rules('tahun_lulus', 'Tahun Lulus', 'required');
        $this->form_validation->set_rules('ipk', 'IPK', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $action = $this->input->get('action');
            $nim = $this->session->userdata('nim');
            $user = $this->Users_model->get_user_by_nim($nim);
            $user_id = $user['id'];

            $update_successful = false;
            $email = $this->input->post('email');

            if ($user['email'] != $email) {
                $this->Users_model->update_user_email($user_id, $email);
                if ($this->db->affected_rows() > 0) {
                    $update_successful = true;
                }
            }

            $tracer_data = [
                'user_id' => $user_id,
                'telepon' => $this->input->post('telepon'),
                'alamat' => $this->input->post('alamat'),
                'nik' => $this->input->post('nik'),
                'npwp' => $this->input->post('npwp'),
                'tahun_lulus' => $this->input->post('tahun_lulus'),
                'ipk' => $this->input->post('ipk'),
                'status' => $this->input->post('status')
            ];

            $tracer_lanjutan_data = [
                'user_id' => $user_id,
                'perkuliahan' => $this->input->post('perkuliahan'),
                'praktikum' => $this->input->post('praktikum'),
                'diskusi' => $this->input->post('diskusi'),
                'partisipasi_riset' => $this->input->post('partisipasi_riset'),
                'magang' => $this->input->post('magang'),
                'kerja_lapangan' => $this->input->post('kerja_lapangan'),
                'demonstrasi' => $this->input->post('demonstrasi'),
                'pendidikan' => $this->input->post('pendidikan'),
                'penelitian' => $this->input->post('penelitian'),
                'pengabdian' => $this->input->post('pengabdian'),
                'aktif_cari_pekerjaan' => $this->input->post('aktif_cari_pekerjaan'),
                'mulai_cari_pekerjaan' => $this->input->post('mulai_cari_pekerjaan'),
                'bagaimana_cari_pekerjaan' => $this->input->post('bagaimana_cari_pekerjaan'),
                'lamaran_pertama' => $this->input->post('lamaran_pertama'),
                'respon_lamaran' => $this->input->post('respon_lamaran'),
                'undangan_interview' => $this->input->post('undangan_interview'),
                'alasan_pekerjaan' => $this->input->post('alasan_pekerjaan')
            ];

            $current_status = $this->Users_model->get_current_status($user_id);

            if ($current_status != $this->input->post('status')) {
                $this->Users_model->delete_old_profesi($user_id, $current_status);
            }

            $profesi_data = [];
            $profesi_table = '';

            switch ($this->input->post('status')) {
                case 1:
                    $profesi_data = [
                        'user_id' => $user_id,
                        'perusahaan' => $this->input->post('perusahaan'),
                        'email_perusahaan' => $this->input->post('email_perusahaan'),
                        'alamat_perusahaan' => $this->input->post('alamat_perusahaan'),
                        'jenis_perusahaan' => $this->input->post('jenis_perusahaan'),
                        'nama_pimpinan' => $this->input->post('nama_pimpinan'),
                        'telepon_pimpinan' => $this->input->post('telepon_pimpinan'),
                        'posisi' => $this->input->post('posisi'),
                        'pendapatan' => $this->input->post('pendapatan'),
                        'tingkat_tempat_kerja' => $this->input->post('tingkat_tempat_kerja'),
                        'kurang_6_bulan' => $this->input->post('kurang_6_bulan'),
                        'hubungan_studi' => $this->input->post('hubungan_studi'),
                        'tingkat_pendidikan' => $this->input->post('tingkat_pendidikan')
                    ];
                    $profesi_table = 'bekerja';
                    break;
                case 2:
                    $profesi_data = [
                        'user_id' => $user_id,
                        'nama_bidang_usaha' => $this->input->post('nama_bidang_usaha'),
                        'alamat_tempat_usaha' => $this->input->post('alamat_tempat_usaha'),
                        'pendapatan_wiraswasta' => $this->input->post('pendapatan_wiraswasta'),
                        'jenis_usaha' => $this->input->post('jenis_usaha'),
                        'tingkat_bidang_usaha' => $this->input->post('tingkat_bidang_usaha'),
                        'hubungan_studi_wiraswasta' => $this->input->post('hubungan_studi_wiraswasta'),
                        'tingkat_pendidikan_wiraswasta' => $this->input->post('tingkat_pendidikan_wiraswasta')
                    ];
                    $profesi_table = 'wiraswasta';
                    break;
                case 3:
                    $profesi_data = [
                        'user_id' => $user_id,
                        'sumber_biaya' => $this->input->post('sumber_biaya'),
                        'perguruan_tinggi' => $this->input->post('perguruan_tinggi'),
                        'program_studi' => $this->input->post('program_studi'),
                        'tanggal_masuk' => $this->input->post('tanggal_masuk'),
                        'sumber_dana_pembiayaan' => $this->input->post('sumber_dana_pembiayaan')
                    ];
                    $profesi_table = 'lanjut_studi';
                    break;
                case 4:
                    $profesi_data = [
                        'user_id' => $user_id,
                        'alasan_belum_bekerja' => $this->input->post('alasan_belum_bekerja'),
                        'kualifikasi_tidak_sesuai' => $this->input->post('kualifikasi_tidak_sesuai'),
                        'kesulitan_mencari_pekerjaan' => $this->input->post('kesulitan_mencari_pekerjaan'),
                        'kendala_lain' => $this->input->post('kendala_lain'),
                        'dukungan_program_studi' => $this->input->post('dukungan_program_studi')
                    ];
                    $profesi_table = 'belum_kerja';
                    break;
            }

            if ($action == 'submit') {
                $this->Users_model->insert_tracer($tracer_data);

                if (!empty($profesi_data)) {
                    $this->Users_model->insert_profesi($profesi_table, $profesi_data);
                }

                $this->Users_model->insert_tracer_lanjutan($tracer_lanjutan_data);

                $this->session->set_flashdata('message', 'Data berhasil disimpan!');
            } elseif ($action == 'update') {
                $this->Users_model->update_tracer($user_id, $tracer_data);

                if ($this->db->affected_rows() > 0) {
                    $update_successful = true;
                }

                if ($current_status != $this->input->post('status')) {
                    $this->Users_model->delete_old_profesi($user_id, $current_status);
                }

                if (!empty($profesi_data)) {
                    $this->Users_model->insert_or_update_profesi($profesi_table, $profesi_data);
                }

                $this->Users_model->update_tracer_lanjutan($user_id, $tracer_lanjutan_data);

                if ($update_successful) {
                    $this->session->set_flashdata('message', 'Data berhasil diperbarui!');
                } else {
                    $this->session->set_flashdata('message', 'Tidak ada perubahan data!');
                }
            }

            $this->session->set_flashdata('alert_class', 'alert-success');
            redirect('/');
        }
    }
}