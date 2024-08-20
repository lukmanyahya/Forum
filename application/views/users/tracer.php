<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $title; ?></title>
    <!-- CSS Files -->
    <?php include 'application/views/templates/css-files.php'; ?>
</head>

<body>
<section class="profile">
        <div class="container">
            <div class="px-4">
                <!-- <hr class="m-0" data-aos="zoom-in"> -->
                <div class="py-2" data-aos="zoom-in">

                    <?php if (!$tracer_exists) : ?>

                        <!-- Tracer Submit -->
                        <form id="profileForm" action="<?= base_url('users/form_tracer?action=submit'); ?>" method="POST" enctype="multipart/form-data">
                            <div class="mb-4">
                                <label for="nim" class="form-label">NIM</label>
                                <input type="text" class="form-control" name="nim" id="nim" aria-describedby="nimHelp" value="<?= $users['nim'] ?>" readonly>
                            </div>
                            <div class="mb-4">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" name="nama" id="nama" aria-describedby="namaHelp" value="<?= $users['nama'] ?>" readonly>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-6 mb-4 mb-md-0">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Jawaban Anda..." value="<?= $users['email'] ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="telepon" class="form-label">Nomor Telepon/WA</label>
                                    <input type="text" class="form-control" id="telepon" placeholder="Jawaban Anda..." name="telepon" required>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="alamat" placeholder="Jawaban Anda..." name="alamat" required>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-6 mb-4 mb-md-0">
                                    <label for="nik" class="form-label">NIK (Nomor Induk Kependudukan)</label>
                                    <input type="text" class="form-control" id="nik" placeholder="Jawaban Anda..." name="nik" maxlength="16" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="npwp" class="form-label">NPWP (Nomor Pokok Wajib Pajak)</label>
                                    <input type="text" class="form-control" id="npwp" placeholder="Jawaban Anda..." name="npwp" maxlength="16" required>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="tahun_lulus" class="form-label">Tahun Lulus</label>
                                <input type="number" class="form-control" id="tahun_lulus" placeholder="Jawaban Anda..." name="tahun_lulus" required>
                            </div>
                            <div class="mb-4">
                                <label for="ipk" class="form-label">IPK (Indeks Prestasi Kumulatif)</label>
                                <input type="number" class="form-control" id="ipk" placeholder="Jawaban Anda..." name="ipk" step="0.01" min="0" max="4" required>
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Pilih profesi anda saat ini</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="bekerja" value="1" required>
                                    <label class="form-check-label" for="bekerja">Bekerja</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="wiraswasta" value="2" required>
                                    <label class="form-check-label" for="wiraswasta">Wiraswasta</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="melanjutkan_pendidikan" value="3" required>
                                    <label class="form-check-label" for="melanjutkan_pendidikan">Melanjutkan Pendidikan</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="belum_bekerja" value="4" required>
                                    <label class="form-check-label" for="belum_bekerja">Belum Bekerja</label>
                                </div>
                            </div>

                            <!-- Form Bekerja -->
                            <div id="form-bekerja" class="conditional-form" style="display: none;">
                                <hr class="mt-4" data-aos="zoom-in">
                                <h1 class="mb-4">Bekerja</h1>
                                <div class="mb-4">
                                    <label for="perusahaan" class="form-label">Nama Perusahaan</label>
                                    <input type="text" class="form-control" id="perusahaan" name="perusahaan" placeholder="Jawaban Anda...">
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-6 mb-4 mb-md-0">
                                        <label for="email_perusahaan" class="form-label">Email Perusahaan</label>
                                        <input type="email" class="form-control" id="email_perusahaan" name="email_perusahaan" placeholder="Jawaban Anda...">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="alamat_perusahaan" class="form-label">Alamat Perusahaan</label>
                                        <input type="text" class="form-control" id="alamat_perusahaan" name="alamat_perusahaan" placeholder="Jawaban Anda...">
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label for="jenis_perusahaan" class="form-label">Jenis Perusahaan</label>
                                    <input type="text" class="form-control" id="jenis_perusahaan" name="jenis_perusahaan" placeholder="Jawaban Anda...">
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-6 mb-4 mb-md-0">
                                        <label for="nama_pimpinan" class="form-label">Nama Pimpinan Perusahaan dan Gelar</label>
                                        <input type="text" class="form-control" id="nama_pimpinan" name="nama_pimpinan" placeholder="Jawaban Anda...">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="telepon_pimpinan" class="form-label">Nomor Telepon Pimpinan Perusahaan</label>
                                        <input type="text" class="form-control" id="telepon_pimpinan" name="telepon_pimpinan" placeholder="Jawaban Anda...">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-6 mb-4 mb-md-0">
                                        <label for="posisi" class="form-label">Posisi Pekerjaan Anda</label>
                                        <input type="text" class="form-control" id="posisi" name="posisi" placeholder="Jawaban Anda...">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="pendapatan" class="form-label">Berapa rata-rata Pendapatan Anda Dalam Satu Bulan?</label>
                                        <input type="text" class="form-control" id="pendapatan" name="pendapatan" placeholder="Jawaban Anda...">
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label for="tingkat_tempat_kerja" class="form-label">Apa Tingkat Tempat Kerja Anda</label>
                                    <input type="text" class="form-control" id="tingkat_tempat_kerja" name="tingkat_tempat_kerja" placeholder="Jawaban Anda...">
                                </div>
                                <div class="mb-4">
                                    <label for="kurang_6_bulan" class="form-label">Apakah Anda Mendapatkan Pekerjaan Kurang Dari 6 Bulan? Termasuk Bekerja Sebelum Lulus</label>
                                    <input type="text" class="form-control" id="kurang_6_bulan" name="kurang_6_bulan" placeholder="Jawaban Anda...">
                                </div>
                                <div class="mb-4">
                                    <label for="hubungan_studi" class="form-label">Seberapa Erat Hubungan Antara Bidang Studi Ketika Kuliah Dengan Pekerjaan Anda Saat Ini?</label>
                                    <input type="text" class="form-control" id="hubungan_studi" name="hubungan_studi" placeholder="Jawaban Anda...">
                                </div>
                                <div class="mb-4">
                                    <label for="tingkat_pendidikan" class="form-label">Tingkat Pendidikan Yang Tepat Untuk Pekerjaan Anda Saat Ini?</label>
                                    <input type="text" class="form-control" id="tingkat_pendidikan" name="tingkat_pendidikan" placeholder="Jawaban Anda...">
                                </div>
                            </div>

                            <!-- Form Wiraswasta -->
                            <div id="form-wiraswasta" class="conditional-form" style="display: none;">
                                <hr class="mt-4" data-aos="zoom-in">
                                <h1 class="mb-4">Wiraswasta</h1>
                                <div class="mb-4">
                                    <label for="nama_bidang_usaha" class="form-label">Nama Bidang Usaha Anda</label>
                                    <input type="text" class="form-control" id="nama_bidang_usaha" name="nama_bidang_usaha" placeholder="Jawaban Anda...">
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-6 mb-4 mb-md-0">
                                        <label for="alamat_tempat_usaha" class="form-label">Alamat Tempat Usaha Anda</label>
                                        <input type="text" class="form-control" id="alamat_tempat_usaha" name="alamat_tempat_usaha" placeholder="Jawaban Anda...">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="pendapatan_wiraswasta" class="form-label">Berapa Rata-rata Pendapatan Anda Dalam Satu Bulan?</label>
                                        <input type="text" class="form-control" id="pendapatan_wiraswasta" name="pendapatan_wiraswasta" placeholder="Jawaban Anda...">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-6 mb-4 mb-md-0">
                                        <label for="jenis_usaha" class="form-label">Apa Jenis Usaha Anda?</label>
                                        <input type="text" class="form-control" id="jenis_usaha" name="jenis_usaha" placeholder="Jawaban Anda...">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="tingkat_bidang_usaha" class="form-label">Apa Tingkat Bidang Usaha Anda?</label>
                                        <input type="text" class="form-control" id="tingkat_bidang_usaha" name="tingkat_bidang_usaha" placeholder="Jawaban Anda...">
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label for="hubungan_studi_wiraswasta" class="form-label">Seberapa Erat Hubungan Antara Bidang Studi Ketika Kuliah Dengan Bidang Usaha Anda Saat Ini?</label>
                                    <input type="text" class="form-control" id="hubungan_studi_wiraswasta" name="hubungan_studi_wiraswasta" placeholder="Jawaban Anda...">
                                </div>
                                <div class="mb-4">
                                    <label for="tingkat_pendidikan_wiraswasta" class="form-label">Tingkat Pendidikan Yang Tepat Untuk Bidang Usaha Anda Saat Ini?</label>
                                    <input type="text" class="form-control" id="tingkat_pendidikan_wiraswasta" name="tingkat_pendidikan_wiraswasta" placeholder="Jawaban Anda...">
                                </div>
                            </div>

                            <!-- Form Melanjutkan Pendidikan -->
                            <div id="form-melanjutkan-pendidikan" class="conditional-form" style="display: none;">
                                <hr class="mt-4" data-aos="zoom-in">
                                <h1 class="mb-4">Melanjutkan Pendidikan</h1>
                                <div class="mb-4">
                                    <label for="sumber_biaya" class="form-label">Sumber Biaya</label>
                                    <input type="text" class="form-control" id="sumber_biaya" name="sumber_biaya" placeholder="Jawaban Anda...">
                                </div>
                                <div class="mb-4">
                                    <label for="perguruan_tinggi" class="form-label">Perguruan Tinggi</label>
                                    <input type="text" class="form-control" id="perguruan_tinggi" name="perguruan_tinggi" placeholder="Jawaban Anda...">
                                </div>
                                <div class="mb-4">
                                    <label for="program_studi" class="form-label">Program Studi</label>
                                    <input type="text" class="form-control" id="program_studi" name="program_studi" placeholder="Jawaban Anda...">
                                </div>
                                <div class="mb-4">
                                    <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
                                    <input type="text" class="form-control" id="tanggal_masuk" name="tanggal_masuk" placeholder="Jawaban Anda...">
                                </div>
                                <div class="mb-4">
                                    <label for="sumber_dana_pembiayaan" class="form-label">Sumber Dana Pembiayaan Kuliah</label>
                                    <input type="text" class="form-control" id="sumber_dana_pembiayaan" name="sumber_dana_pembiayaan" placeholder="Jawaban Anda...">
                                </div>
                            </div>

                            <!-- Form Belum Bekerja -->
                            <div id="form-belum-bekerja" class="conditional-form" style="display: none;">
                                <hr class="mt-4" data-aos="zoom-in">
                                <h1 class="mb-4">Belum Bekerja</h1>
                                <div class="mb-4">
                                    <label for="alasan_belum_bekerja" class="form-label">Apa Alasan Anda Belum Bekerja?</label>
                                    <input type="text" class="form-control" id="alasan_belum_bekerja" name="alasan_belum_bekerja" placeholder="Jawaban Anda...">
                                </div>
                                <div class="mb-4">
                                    <label for="kualifikasi_tidak_sesuai" class="form-label">Apakah Anda Merasa Kualifikasi Anda Tidak Sesuai dengan Lowongan Pekerjaan?</label>
                                    <input type="text" class="form-control" id="kualifikasi_tidak_sesuai" name="kualifikasi_tidak_sesuai" placeholder="Jawaban Anda...">
                                </div>
                                <div class="mb-4">
                                    <label for="kesulitan_mencari_pekerjaan" class="form-label">Kesulitan Apa yang Anda Alami dalam Mencari Pekerjaan?</label>
                                    <input type="text" class="form-control" id="kesulitan_mencari_pekerjaan" name="kesulitan_mencari_pekerjaan" placeholder="Jawaban Anda...">
                                </div>
                                <div class="mb-4">
                                    <label for="kendala_lain" class="form-label">Apakah Anda Memiliki Kendala Lain yang Menghambat Anda untuk Bekerja?</label>
                                    <input type="text" class="form-control" id="kendala_lain" name="kendala_lain" placeholder="Jawaban Anda...">
                                </div>
                                <div class="mb-4">
                                    <label for="dukungan_program_studi" class="form-label">Apakah Anda Membutuhkan Dukungan dari Program Studi untuk Membantu Anda Mendapatkan Pekerjaan?</label>
                                    <input type="text" class="form-control" id="dukungan_program_studi" name="dukungan_program_studi" placeholder="Jawaban Anda...">
                                </div>
                            </div>

                            <!-- Form Penekanan dalam metode pembelajaran -->
                            <hr class="mt-4" data-aos="zoom-in">
                            <h1 class="mb-4">Penekanan dalam metode pembelajaran yang dilaksanakan program studi</h1>
                            <div class="row mb-4">
                                <div class="col-md-6 mb-4 mb-md-0">
                                    <label for="perkuliahan" class="form-label">Perkuliahan</label>
                                    <select class="form-select" id="perkuliahan" name="perkuliahan" required>
                                        <option value="">Pilih Tingkat Penekanan...</option>
                                        <option value="Sangat Besar">Sangat Besar</option>
                                        <option value="Besar">Besar</option>
                                        <option value="Cukup Besar">Cukup Besar</option>
                                        <option value="Kurang">Kurang</option>
                                        <option value="Tidak Sama Sekali">Tidak Sama Sekali</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="praktikum" class="form-label">Praktikum</label>
                                    <select class="form-select" id="praktikum" name="praktikum" required>
                                        <option value="">Pilih Tingkat Penekanan...</option>
                                        <option value="Sangat Besar">Sangat Besar</option>
                                        <option value="Besar">Besar</option>
                                        <option value="Cukup Besar">Cukup Besar</option>
                                        <option value="Kurang">Kurang</option>
                                        <option value="Tidak Sama Sekali">Tidak Sama Sekali</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-6 mb-4 mb-md-0">
                                    <label for="diskusi" class="form-label">Diskusi</label>
                                    <select class="form-select" id="diskusi" name="diskusi" required>
                                        <option value="">Pilih Tingkat Penekanan...</option>
                                        <option value="Sangat Besar">Sangat Besar</option>
                                        <option value="Besar">Besar</option>
                                        <option value="Cukup Besar">Cukup Besar</option>
                                        <option value="Kurang">Kurang</option>
                                        <option value="Tidak Sama Sekali">Tidak Sama Sekali</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="partisipasi_riset" class="form-label">Partisipasi dalam proyek riset</label>
                                    <select class="form-select" id="partisipasi_riset" name="partisipasi_riset" required>
                                        <option value="">Pilih Tingkat Penekanan...</option>
                                        <option value="Sangat Besar">Sangat Besar</option>
                                        <option value="Besar">Besar</option>
                                        <option value="Cukup Besar">Cukup Besar</option>
                                        <option value="Kurang">Kurang</option>
                                        <option value="Tidak Sama Sekali">Tidak Sama Sekali</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-6 mb-4 mb-md-0">
                                    <label for="magang" class="form-label">Magang</label>
                                    <select class="form-select" id="magang" name="magang" required>
                                        <option value="">Pilih Tingkat Penekanan...</option>
                                        <option value="Sangat Besar">Sangat Besar</option>
                                        <option value="Besar">Besar</option>
                                        <option value="Cukup Besar">Cukup Besar</option>
                                        <option value="Kurang">Kurang</option>
                                        <option value="Tidak Sama Sekali">Tidak Sama Sekali</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="kerja_lapangan" class="form-label">Kerja Lapangan</label>
                                    <select class="form-select" id="kerja_lapangan" name="kerja_lapangan" required>
                                        <option value="">Pilih Tingkat Penekanan...</option>
                                        <option value="Sangat Besar">Sangat Besar</option>
                                        <option value="Besar">Besar</option>
                                        <option value="Cukup Besar">Cukup Besar</option>
                                        <option value="Kurang">Kurang</option>
                                        <option value="Tidak Sama Sekali">Tidak Sama Sekali</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-6 mb-4 mb-md-0">
                                    <label for="demonstrasi" class="form-label">Demonstrasi</label>
                                    <select class="form-select" id="demonstrasi" name="demonstrasi" required>
                                        <option value="">Pilih Tingkat Penekanan...</option>
                                        <option value="Sangat Besar">Sangat Besar</option>
                                        <option value="Besar">Besar</option>
                                        <option value="Cukup Besar">Cukup Besar</option>
                                        <option value="Kurang">Kurang</option>
                                        <option value="Tidak Sama Sekali">Tidak Sama Sekali</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Form Saran Tridharma -->
                            <hr class="mt-4" data-aos="zoom-in">
                            <h1 class="mb-4">Terkait Saran Tridharma</h1>
                            <div class="row mb-4">
                                <div class="col-md-6 mb-4 mb-md-0">
                                    <label for="pendidikan" class="form-label">Bidang Pendidikan</label>
                                    <select class="form-select" id="pendidikan" name="pendidikan" required>
                                        <option value="">Pilih Tingkat Saran...</option>
                                        <option value="Sangat Baik">Sangat Baik</option>
                                        <option value="Baik">Baik</option>
                                        <option value="Cukup">Cukup</option>
                                        <option value="Kurang">Kurang</option>
                                        <option value="Sangat Kurang">Sangat Kurang</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="penelitian" class="form-label">Bidang Penelitian</label>
                                    <select class="form-select" id="penelitian" name="penelitian" required>
                                        <option value="">Pilih Tingkat Saran...</option>
                                        <option value="Sangat Baik">Sangat Baik</option>
                                        <option value="Baik">Baik</option>
                                        <option value="Cukup">Cukup</option>
                                        <option value="Kurang">Kurang</option>
                                        <option value="Sangat Kurang">Sangat Kurang</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-6 mb-4 mb-md-0">
                                    <label for="pengabdian" class="form-label">Bidang Pengabdian</label>
                                    <select class="form-select" id="pengabdian" name="pengabdian" required>
                                        <option value="">Pilih Tingkat Saran...</option>
                                        <option value="Sangat Baik">Sangat Baik</option>
                                        <option value="Baik">Baik</option>
                                        <option value="Cukup">Cukup</option>
                                        <option value="Kurang">Kurang</option>
                                        <option value="Sangat Kurang">Sangat Kurang</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Form Pertanyaan Tambahan -->
                            <hr class="mt-4" data-aos="zoom-in">
                            <h1 class="mb-4">Pertanyaan Tambahan</h1>
                            <div class="row mb-4">
                                <div class="col-md-6 mb-4 mb-md-0">
                                    <label for="aktif_cari_pekerjaan" class="form-label">Apakah Anda aktif mencari pekerjaan dalam 4 minggu terakhir?</label>
                                    <select class="form-select" id="aktif_cari_pekerjaan" name="aktif_cari_pekerjaan" required>
                                        <option value="">Pilih opsi...</option>
                                        <option value="Ya">Ya</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="mulai_cari_pekerjaan" class="form-label">Kapan Anda mulai mencari pekerjaan?</label>
                                    <input type="text" class="form-control" id="mulai_cari_pekerjaan" placeholder="Jawaban Anda..." name="mulai_cari_pekerjaan" required>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="bagaimana_cari_pekerjaan" class="form-label">Bagaimana Anda mencari pekerjaan?</label>
                                <textarea class="form-control" id="bagaimana_cari_pekerjaan" placeholder="Jawaban Anda..." name="bagaimana_cari_pekerjaan" rows="2" required></textarea>
                            </div>
                            <div class="mb-4">
                                <label for="lamaran_pertama" class="form-label">Berapa perusahaan yang sudah Anda lamar sebelum memperoleh pekerjaan pertama?</label>
                                <input type="text" class="form-control" id="lamaran_pertama" placeholder="Jawaban Anda..." name="lamaran_pertama" required>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-6 mb-4 mb-md-0">
                                    <label for="respon_lamaran" class="form-label">Berapa banyak perusahaan yang merespon lamaran Anda?</label>
                                    <input type="text" class="form-control" id="respon_lamaran" placeholder="Jawaban Anda..." name="respon_lamaran" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="undangan_interview" class="form-label">Berapa banyak perusahaan yang mengundang Anda untuk interview?</label>
                                    <input type="text" class="form-control" id="undangan_interview" placeholder="Jawaban Anda..." name="undangan_interview" required>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="alasan_pekerjaan" class="form-label">Jika menurut Anda pekerjaan saat ini tidak sesuai dengan pendidikan Anda, Berikan alasan kenapa Anda mengambilnya?</label>
                                <textarea class="form-control" id="alasan_pekerjaan" placeholder="Jawaban Anda..." name="alasan_pekerjaan" rows="2" required></textarea>
                            </div>

                            <!-- Submit Button -->
                            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center pb-4 pt-2">
                                <!-- <a href="<?= base_url('profile'); ?>" class="btn btn-secondary mb-md-0"><i class="fa-solid fa-circle-chevron-left"></i> Kembali</a> -->
                                <input type="hidden" name="nim" value="<?= $users['nim'] ?>">
                                <button type="submit" class="btn btn-primary mx-auto mt-4 mb-md-0"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
                            </div>
                        </form>

                    <?php else : ?>

                        <!-- Tracer Update -->
                        <form id="profileForm" action="<?= base_url('users/form_tracer?action=update'); ?>" method="POST" enctype="multipart/form-data">
                            <div class="mb-4">
                                <label for="nim" class="form-label">NIM</label>
                                <input type="text" class="form-control" name="nim" id="nim" value="<?= $users['nim'] ?>" readonly>
                            </div>
                            <div class="mb-4">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" name="nama" id="nama" value="<?= $users['nama'] ?>" readonly>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-6 mb-4 mb-md-0">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" value="<?= $users['email'] ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="telepon" class="form-label">Nomor Telepon/WA</label>
                                    <input type="text" class="form-control" id="telepon" name="telepon" value="<?= $tracer_exists->telepon ?>" required>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $tracer_exists->alamat ?>" required>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-6 mb-4 mb-md-0">
                                    <label for="nik" class="form-label">NIK (Nomor Induk Kependudukan)</label>
                                    <input type="text" class="form-control" id="nik" name="nik" value="<?= $tracer_exists->nik ?>" maxlength="16" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="npwp" class="form-label">NPWP (Nomor Pokok Wajib Pajak)</label>
                                    <input type="text" class="form-control" id="npwp" name="npwp" value="<?= $tracer_exists->npwp ?>" maxlength="16" required>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="tahun_lulus" class="form-label">Tahun Lulus</label>
                                <input type="number" class="form-control" id="tahun_lulus" name="tahun_lulus" value="<?= $tracer_exists->tahun_lulus ?>" required>
                            </div>
                            <div class="mb-4">
                                <label for="ipk" class="form-label">IPK (Indeks Prestasi Kumulatif)</label>
                                <input type="number" class="form-control" id="ipk" name="ipk" value="<?= $tracer_exists->ipk ?>" step="0.01" min="0" max="4" required>
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Pilih profesi anda saat ini</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="bekerja" value="1" <?= $tracer_exists->status == 1 ? 'checked' : '' ?> required>
                                    <label class="form-check-label" for="bekerja">Bekerja</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="wiraswasta" value="2" <?= $tracer_exists->status == 2 ? 'checked' : '' ?> required>
                                    <label class="form-check-label" for="wiraswasta">Wiraswasta</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="melanjutkan_pendidikan" value="3" <?= $tracer_exists->status == 3 ? 'checked' : '' ?> required>
                                    <label class="form-check-label" for="melanjutkan_pendidikan">Melanjutkan Pendidikan</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="belum_bekerja" value="4" <?= $tracer_exists->status == 4 ? 'checked' : '' ?> required>
                                    <label class="form-check-label" for="belum_bekerja">Belum Bekerja</label>
                                </div>
                            </div>

                            <!-- Form Bekerja -->
                            <div id="form-bekerja" class="conditional-form" style="display: none;">
                                <hr class="mt-4" data-aos="zoom-in">
                                <h1 class="mb-4">Bekerja</h1>
                                <div class="mb-4">
                                    <label for="perusahaan" class="form-label">Nama Perusahaan</label>
                                    <input type="text" class="form-control" id="perusahaan" name="perusahaan" placeholder="Jawaban Anda..." value="<?= isset($profesi_exists->perusahaan) ? $profesi_exists->perusahaan : '' ?>">
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-6 mb-4 mb-md-0">
                                        <label for="email_perusahaan" class="form-label">Email Perusahaan</label>
                                        <input type="email" class="form-control" id="email_perusahaan" name="email_perusahaan" placeholder="Jawaban Anda..." value="<?= isset($profesi_exists->email_perusahaan) ? $profesi_exists->email_perusahaan : '' ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="alamat_perusahaan" class="form-label">Alamat Perusahaan</label>
                                        <input type="text" class="form-control" id="alamat_perusahaan" name="alamat_perusahaan" placeholder="Jawaban Anda..." value="<?= isset($profesi_exists->alamat_perusahaan) ? $profesi_exists->alamat_perusahaan : '' ?>">
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label for="jenis_perusahaan" class="form-label">Jenis Perusahaan</label>
                                    <input type="text" class="form-control" id="jenis_perusahaan" name="jenis_perusahaan" placeholder="Jawaban Anda..." value="<?= isset($profesi_exists->jenis_perusahaan) ? $profesi_exists->jenis_perusahaan : '' ?>">
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-6 mb-4 mb-md-0">
                                        <label for="nama_pimpinan" class="form-label">Nama Pimpinan Perusahaan dan Gelar</label>
                                        <input type="text" class="form-control" id="nama_pimpinan" name="nama_pimpinan" placeholder="Jawaban Anda..." value="<?= isset($profesi_exists->nama_pimpinan) ? $profesi_exists->nama_pimpinan : '' ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="telepon_pimpinan" class="form-label">Nomor Telepon Pimpinan Perusahaan</label>
                                        <input type="text" class="form-control" id="telepon_pimpinan" name="telepon_pimpinan" placeholder="Jawaban Anda..." value="<?= isset($profesi_exists->telepon_pimpinan) ? $profesi_exists->telepon_pimpinan : '' ?>">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-6 mb-4 mb-md-0">
                                        <label for="posisi" class="form-label">Posisi Pekerjaan Anda</label>
                                        <input type="text" class="form-control" id="posisi" name="posisi" placeholder="Jawaban Anda..." value="<?= isset($profesi_exists->posisi) ? $profesi_exists->posisi : '' ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="pendapatan" class="form-label">Berapa rata-rata Pendapatan Anda Dalam Satu Bulan?</label>
                                        <input type="text" class="form-control" id="pendapatan" name="pendapatan" placeholder="Jawaban Anda..." value="<?= isset($profesi_exists->pendapatan) ? $profesi_exists->pendapatan : '' ?>">
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label for="tingkat_tempat_kerja" class="form-label">Apa Tingkat Tempat Kerja Anda</label>
                                    <input type="text" class="form-control" id="tingkat_tempat_kerja" name="tingkat_tempat_kerja" placeholder="Jawaban Anda..." value="<?= isset($profesi_exists->tingkat_tempat_kerja) ? $profesi_exists->tingkat_tempat_kerja : '' ?>">
                                </div>
                                <div class="mb-4">
                                    <label for="kurang_6_bulan" class="form-label">Apakah Anda Mendapatkan Pekerjaan Kurang Dari 6 Bulan? Termasuk Bekerja Sebelum Lulus</label>
                                    <input type="text" class="form-control" id="kurang_6_bulan" name="kurang_6_bulan" placeholder="Jawaban Anda..." value="<?= isset($profesi_exists->kurang_6_bulan) ? $profesi_exists->kurang_6_bulan : '' ?>">
                                </div>
                                <div class="mb-4">
                                    <label for="hubungan_studi" class="form-label">Seberapa Erat Hubungan Antara Bidang Studi Ketika Kuliah Dengan Pekerjaan Anda Saat Ini?</label>
                                    <input type="text" class="form-control" id="hubungan_studi" name="hubungan_studi" placeholder="Jawaban Anda..." value="<?= isset($profesi_exists->hubungan_studi) ? $profesi_exists->hubungan_studi : '' ?>">
                                </div>
                                <div class="mb-4">
                                    <label for="tingkat_pendidikan" class="form-label">Tingkat Pendidikan Yang Tepat Untuk Pekerjaan Anda Saat Ini?</label>
                                    <input type="text" class="form-control" id="tingkat_pendidikan" name="tingkat_pendidikan" placeholder="Jawaban Anda..." value="<?= isset($profesi_exists->tingkat_pendidikan) ? $profesi_exists->tingkat_pendidikan : '' ?>">
                                </div>
                            </div>

                            <!-- Form Wiraswasta -->
                            <div id="form-wiraswasta" class="conditional-form" style="display: none;">
                                <hr class="mt-4" data-aos="zoom-in">
                                <h1 class="mb-4">Wiraswasta</h1>
                                <div class="mb-4">
                                    <label for="nama_bidang_usaha" class="form-label">Nama Bidang Usaha Anda</label>
                                    <input type="text" class="form-control" id="nama_bidang_usaha" name="nama_bidang_usaha" placeholder="Jawaban Anda..." value="<?= isset($profesi_exists->nama_bidang_usaha) ? $profesi_exists->nama_bidang_usaha : '' ?>">
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-6 mb-4 mb-md-0">
                                        <label for="alamat_tempat_usaha" class="form-label">Alamat Tempat Usaha Anda</label>
                                        <input type="text" class="form-control" id="alamat_tempat_usaha" name="alamat_tempat_usaha" placeholder="Jawaban Anda..." value="<?= isset($profesi_exists->alamat_tempat_usaha) ? $profesi_exists->alamat_tempat_usaha : '' ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="pendapatan_wiraswasta" class="form-label">Berapa Rata-rata Pendapatan Anda Dalam Satu Bulan?</label>
                                        <input type="text" class="form-control" id="pendapatan_wiraswasta" name="pendapatan_wiraswasta" placeholder="Jawaban Anda..." value="<?= isset($profesi_exists->pendapatan_wiraswasta) ? $profesi_exists->pendapatan_wiraswasta : '' ?>">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-6 mb-4 mb-md-0">
                                        <label for="jenis_usaha" class="form-label">Apa Jenis Usaha Anda?</label>
                                        <input type="text" class="form-control" id="jenis_usaha" name="jenis_usaha" placeholder="Jawaban Anda..." value="<?= isset($profesi_exists->jenis_usaha) ? $profesi_exists->jenis_usaha : '' ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="tingkat_bidang_usaha" class="form-label">Apa Tingkat Bidang Usaha Anda?</label>
                                        <input type="text" class="form-control" id="tingkat_bidang_usaha" name="tingkat_bidang_usaha" placeholder="Jawaban Anda..." value="<?= isset($profesi_exists->tingkat_bidang_usaha) ? $profesi_exists->tingkat_bidang_usaha : '' ?>">
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label for="hubungan_studi_wiraswasta" class="form-label">Seberapa Erat Hubungan Antara Bidang Studi Ketika Kuliah Dengan Bidang Usaha Anda Saat Ini?</label>
                                    <input type="text" class="form-control" id="hubungan_studi_wiraswasta" name="hubungan_studi_wiraswasta" placeholder="Jawaban Anda..." value="<?= isset($profesi_exists->hubungan_studi_wiraswasta) ? $profesi_exists->hubungan_studi_wiraswasta : '' ?>">
                                </div>
                                <div class="mb-4">
                                    <label for="tingkat_pendidikan_wiraswasta" class="form-label">Tingkat Pendidikan Yang Tepat Untuk Bidang Usaha Anda Saat Ini?</label>
                                    <input type="text" class="form-control" id="tingkat_pendidikan_wiraswasta" name="tingkat_pendidikan_wiraswasta" placeholder="Jawaban Anda..." value="<?= isset($profesi_exists->tingkat_pendidikan_wiraswasta) ? $profesi_exists->tingkat_pendidikan_wiraswasta : '' ?>">
                                </div>
                            </div>

                            <!-- Form Melanjutkan Pendidikan -->
                            <div id="form-melanjutkan-pendidikan" class="conditional-form" style="display: none;">
                                <hr class="mt-4" data-aos="zoom-in">
                                <h1 class="mb-4">Melanjutkan Pendidikan</h1>
                                <div class="mb-4">
                                    <label for="sumber_biaya" class="form-label">Sumber Biaya</label>
                                    <input type="text" class="form-control" id="sumber_biaya" name="sumber_biaya" placeholder="Jawaban Anda..." value="<?= isset($profesi_exists->sumber_biaya) ? $profesi_exists->sumber_biaya : '' ?>">
                                </div>
                                <div class="mb-4">
                                    <label for="perguruan_tinggi" class="form-label">Perguruan Tinggi</label>
                                    <input type="text" class="form-control" id="perguruan_tinggi" name="perguruan_tinggi" placeholder="Jawaban Anda..." value="<?= isset($profesi_exists->perguruan_tinggi) ? $profesi_exists->perguruan_tinggi : '' ?>">
                                </div>
                                <div class="mb-4">
                                    <label for="program_studi" class="form-label">Program Studi</label>
                                    <input type="text" class="form-control" id="program_studi" name="program_studi" placeholder="Jawaban Anda..." value="<?= isset($profesi_exists->program_studi) ? $profesi_exists->program_studi : '' ?>">
                                </div>
                                <div class="mb-4">
                                    <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
                                    <input type="text" class="form-control" id="tanggal_masuk" name="tanggal_masuk" placeholder="Jawaban Anda..." value="<?= isset($profesi_exists->tanggal_masuk) ? $profesi_exists->tanggal_masuk : '' ?>">
                                </div>
                                <div class="mb-4">
                                    <label for="sumber_dana_pembiayaan" class="form-label">Sumber Dana Pembiayaan Kuliah</label>
                                    <input type="text" class="form-control" id="sumber_dana_pembiayaan" name="sumber_dana_pembiayaan" placeholder="Jawaban Anda..." value="<?= isset($profesi_exists->sumber_dana_pembiayaan) ? $profesi_exists->sumber_dana_pembiayaan : '' ?>">
                                </div>
                            </div>

                            <!-- Form Belum Bekerja -->
                            <div id="form-belum-bekerja" class="conditional-form" style="display: none;">
                                <hr class="mt-4" data-aos="zoom-in">
                                <h1 class="mb-4">Belum Bekerja</h1>
                                <div class="mb-4">
                                    <label for="alasan_belum_bekerja" class="form-label">Apa Alasan Anda Belum Bekerja?</label>
                                    <input type="text" class="form-control" id="alasan_belum_bekerja" name="alasan_belum_bekerja" placeholder="Jawaban Anda..." value="<?= isset($profesi_exists->alasan_belum_bekerja) ? $profesi_exists->alasan_belum_bekerja : '' ?>">
                                </div>
                                <div class="mb-4">
                                    <label for="kualifikasi_tidak_sesuai" class="form-label">Apakah Anda Merasa Kualifikasi Anda Tidak Sesuai dengan Lowongan Pekerjaan?</label>
                                    <input type="text" class="form-control" id="kualifikasi_tidak_sesuai" name="kualifikasi_tidak_sesuai" placeholder="Jawaban Anda..." value="<?= isset($profesi_exists->kualifikasi_tidak_sesuai) ? $profesi_exists->kualifikasi_tidak_sesuai : '' ?>">
                                </div>
                                <div class="mb-4">
                                    <label for="kesulitan_mencari_pekerjaan" class="form-label">Kesulitan Apa yang Anda Alami dalam Mencari Pekerjaan?</label>
                                    <input type="text" class="form-control" id="kesulitan_mencari_pekerjaan" name="kesulitan_mencari_pekerjaan" placeholder="Jawaban Anda..." value="<?= isset($profesi_exists->kesulitan_mencari_pekerjaan) ? $profesi_exists->kesulitan_mencari_pekerjaan : '' ?>">
                                </div>
                                <div class="mb-4">
                                    <label for="kendala_lain" class="form-label">Apakah Anda Memiliki Kendala Lain yang Menghambat Anda untuk Bekerja?</label>
                                    <input type="text" class="form-control" id="kendala_lain" name="kendala_lain" placeholder="Jawaban Anda..." value="<?= isset($profesi_exists->kendala_lain) ? $profesi_exists->kendala_lain : '' ?>">
                                </div>
                                <div class="mb-4">
                                    <label for="dukungan_program_studi" class="form-label">Apakah Anda Membutuhkan Dukungan dari Program Studi untuk Membantu Anda Mendapatkan Pekerjaan?</label>
                                    <input type="text" class="form-control" id="dukungan_program_studi" name="dukungan_program_studi" placeholder="Jawaban Anda..." value="<?= isset($profesi_exists->dukungan_program_studi) ? $profesi_exists->dukungan_program_studi : '' ?>">
                                </div>
                            </div>

                            <!-- Form Penekanan dalam metode pembelajaran -->
                            <hr class="mt-4" data-aos="zoom-in">
                            <h1 class="mb-4">Penekanan dalam metode pembelajaran yang dilaksanakan program studi</h1>
                            <div class="row mb-4">
                                <div class="col-md-6 mb-4 mb-md-0">
                                    <label for="perkuliahan" class="form-label">Perkuliahan</label>
                                    <select class="form-select" id="perkuliahan" name="perkuliahan" required>
                                        <option value="">Pilih Tingkat Penekanan...</option>
                                        <option value="Sangat Besar" <?= ($tracer_lanjutan_exists && $tracer_lanjutan_exists->perkuliahan == 'Sangat Besar') ? 'selected' : '' ?>>Sangat Besar</option>
                                        <option value="Besar" <?= ($tracer_lanjutan_exists && $tracer_lanjutan_exists->perkuliahan == 'Besar') ? 'selected' : '' ?>>Besar</option>
                                        <option value="Cukup Besar" <?= ($tracer_lanjutan_exists && $tracer_lanjutan_exists->perkuliahan == 'Cukup Besar') ? 'selected' : '' ?>>Cukup Besar</option>
                                        <option value="Kurang" <?= ($tracer_lanjutan_exists && $tracer_lanjutan_exists->perkuliahan == 'Kurang') ? 'selected' : '' ?>>Kurang</option>
                                        <option value="Tidak Sama Sekali" <?= ($tracer_lanjutan_exists && $tracer_lanjutan_exists->perkuliahan == 'Tidak Sama Sekali') ? 'selected' : '' ?>>Tidak Sama Sekali</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="praktikum" class="form-label">Praktikum</label>
                                    <select class="form-select" id="praktikum" name="praktikum" required>
                                        <option value="">Pilih Tingkat Penekanan...</option>
                                        <option value="Sangat Besar" <?= ($tracer_lanjutan_exists && $tracer_lanjutan_exists->praktikum == 'Sangat Besar') ? 'selected' : '' ?>>Sangat Besar</option>
                                        <option value="Besar" <?= ($tracer_lanjutan_exists && $tracer_lanjutan_exists->praktikum == 'Besar') ? 'selected' : '' ?>>Besar</option>
                                        <option value="Cukup Besar" <?= ($tracer_lanjutan_exists && $tracer_lanjutan_exists->praktikum == 'Cukup Besar') ? 'selected' : '' ?>>Cukup Besar</option>
                                        <option value="Kurang" <?= ($tracer_lanjutan_exists && $tracer_lanjutan_exists->praktikum == 'Kurang') ? 'selected' : '' ?>>Kurang</option>
                                        <option value="Tidak Sama Sekali" <?= ($tracer_lanjutan_exists && $tracer_lanjutan_exists->praktikum == 'Tidak Sama Sekali') ? 'selected' : '' ?>>Tidak Sama Sekali</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-6 mb-4 mb-md-0">
                                    <label for="diskusi" class="form-label">Diskusi</label>
                                    <select class="form-select" id="diskusi" name="diskusi" required>
                                        <option value="">Pilih Tingkat Penekanan...</option>
                                        <option value="Sangat Besar" <?= ($tracer_lanjutan_exists && $tracer_lanjutan_exists->diskusi == 'Sangat Besar') ? 'selected' : '' ?>>Sangat Besar</option>
                                        <option value="Besar" <?= ($tracer_lanjutan_exists && $tracer_lanjutan_exists->diskusi == 'Besar') ? 'selected' : '' ?>>Besar</option>
                                        <option value="Cukup Besar" <?= ($tracer_lanjutan_exists && $tracer_lanjutan_exists->diskusi == 'Cukup Besar') ? 'selected' : '' ?>>Cukup Besar</option>
                                        <option value="Kurang" <?= ($tracer_lanjutan_exists && $tracer_lanjutan_exists->diskusi == 'Kurang') ? 'selected' : '' ?>>Kurang</option>
                                        <option value="Tidak Sama Sekali" <?= ($tracer_lanjutan_exists && $tracer_lanjutan_exists->diskusi == 'Tidak Sama Sekali') ? 'selected' : '' ?>>Tidak Sama Sekali</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="partisipasi_riset" class="form-label">Partisipasi dalam proyek riset</label>
                                    <select class="form-select" id="partisipasi_riset" name="partisipasi_riset" required>
                                        <option value="">Pilih Tingkat Penekanan...</option>
                                        <option value="Sangat Besar" <?= ($tracer_lanjutan_exists && $tracer_lanjutan_exists->partisipasi_riset == 'Sangat Besar') ? 'selected' : '' ?>>Sangat Besar</option>
                                        <option value="Besar" <?= ($tracer_lanjutan_exists && $tracer_lanjutan_exists->partisipasi_riset == 'Besar') ? 'selected' : '' ?>>Besar</option>
                                        <option value="Cukup Besar" <?= ($tracer_lanjutan_exists && $tracer_lanjutan_exists->partisipasi_riset == 'Cukup Besar') ? 'selected' : '' ?>>Cukup Besar</option>
                                        <option value="Kurang" <?= ($tracer_lanjutan_exists && $tracer_lanjutan_exists->partisipasi_riset == 'Kurang') ? 'selected' : '' ?>>Kurang</option>
                                        <option value="Tidak Sama Sekali" <?= ($tracer_lanjutan_exists && $tracer_lanjutan_exists->partisipasi_riset == 'Tidak Sama Sekali') ? 'selected' : '' ?>>Tidak Sama Sekali</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-6 mb-4 mb-md-0">
                                    <label for="magang" class="form-label">Magang</label>
                                    <select class="form-select" id="magang" name="magang" required>
                                        <option value="">Pilih Tingkat Penekanan...</option>
                                        <option value="Sangat Besar" <?= ($tracer_lanjutan_exists && $tracer_lanjutan_exists->magang == 'Sangat Besar') ? 'selected' : '' ?>>Sangat Besar</option>
                                        <option value="Besar" <?= ($tracer_lanjutan_exists && $tracer_lanjutan_exists->magang == 'Besar') ? 'selected' : '' ?>>Besar</option>
                                        <option value="Cukup Besar" <?= ($tracer_lanjutan_exists && $tracer_lanjutan_exists->magang == 'Cukup Besar') ? 'selected' : '' ?>>Cukup Besar</option>
                                        <option value="Kurang" <?= ($tracer_lanjutan_exists && $tracer_lanjutan_exists->magang == 'Kurang') ? 'selected' : '' ?>>Kurang</option>
                                        <option value="Tidak Sama Sekali" <?= ($tracer_lanjutan_exists && $tracer_lanjutan_exists->magang == 'Tidak Sama Sekali') ? 'selected' : '' ?>>Tidak Sama Sekali</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="kerja_lapangan" class="form-label">Kerja Lapangan</label>
                                    <select class="form-select" id="kerja_lapangan" name="kerja_lapangan" required>
                                        <option value="">Pilih Tingkat Penekanan...</option>
                                        <option value="Sangat Besar" <?= ($tracer_lanjutan_exists && $tracer_lanjutan_exists->kerja_lapangan == 'Sangat Besar') ? 'selected' : '' ?>>Sangat Besar</option>
                                        <option value="Besar" <?= ($tracer_lanjutan_exists && $tracer_lanjutan_exists->kerja_lapangan == 'Besar') ? 'selected' : '' ?>>Besar</option>
                                        <option value="Cukup Besar" <?= ($tracer_lanjutan_exists && $tracer_lanjutan_exists->kerja_lapangan == 'Cukup Besar') ? 'selected' : '' ?>>Cukup Besar</option>
                                        <option value="Kurang" <?= ($tracer_lanjutan_exists && $tracer_lanjutan_exists->kerja_lapangan == 'Kurang') ? 'selected' : '' ?>>Kurang</option>
                                        <option value="Tidak Sama Sekali" <?= ($tracer_lanjutan_exists && $tracer_lanjutan_exists->kerja_lapangan == 'Tidak Sama Sekali') ? 'selected' : '' ?>>Tidak Sama Sekali</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-6 mb-4 mb-md-0">
                                    <label for="demonstrasi" class="form-label">Demonstrasi</label>
                                    <select class="form-select" id="demonstrasi" name="demonstrasi" required>
                                        <option value="">Pilih Tingkat Penekanan...</option>
                                        <option value="Sangat Besar" <?= ($tracer_lanjutan_exists && $tracer_lanjutan_exists->demonstrasi == 'Sangat Besar') ? 'selected' : '' ?>>Sangat Besar</option>
                                        <option value="Besar" <?= ($tracer_lanjutan_exists && $tracer_lanjutan_exists->demonstrasi == 'Besar') ? 'selected' : '' ?>>Besar</option>
                                        <option value="Cukup Besar" <?= ($tracer_lanjutan_exists && $tracer_lanjutan_exists->demonstrasi == 'Cukup Besar') ? 'selected' : '' ?>>Cukup Besar</option>
                                        <option value="Kurang" <?= ($tracer_lanjutan_exists && $tracer_lanjutan_exists->demonstrasi == 'Kurang') ? 'selected' : '' ?>>Kurang</option>
                                        <option value="Tidak Sama Sekali" <?= ($tracer_lanjutan_exists && $tracer_lanjutan_exists->demonstrasi == 'Tidak Sama Sekali') ? 'selected' : '' ?>>Tidak Sama Sekali</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Form Saran Tridharma -->
                            <hr class="mt-4" data-aos="zoom-in">
                            <h1 class="mb-4">Terkait Saran Tridharma</h1>
                            <div class="row mb-4">
                                <div class="col-md-6 mb-4 mb-md-0">
                                    <label for="pendidikan" class="form-label">Bidang Pendidikan</label>
                                    <select class="form-select" id="pendidikan" name="pendidikan" required>
                                        <option value="">Pilih Tingkat Saran...</option>
                                        <option value="Sangat Baik" <?= ($tracer_lanjutan_exists && $tracer_lanjutan_exists->pendidikan == 'Sangat Baik') ? 'selected' : '' ?>>Sangat Baik</option>
                                        <option value="Baik" <?= ($tracer_lanjutan_exists && $tracer_lanjutan_exists->pendidikan == 'Baik') ? 'selected' : '' ?>>Baik</option>
                                        <option value="Cukup" <?= ($tracer_lanjutan_exists && $tracer_lanjutan_exists->pendidikan == 'Cukup') ? 'selected' : '' ?>>Cukup</option>
                                        <option value="Kurang" <?= ($tracer_lanjutan_exists && $tracer_lanjutan_exists->pendidikan == 'Kurang') ? 'selected' : '' ?>>Kurang</option>
                                        <option value="Sangat Kurang" <?= ($tracer_lanjutan_exists && $tracer_lanjutan_exists->pendidikan == 'Sangat Kurang') ? 'selected' : '' ?>>Sangat Kurang</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="penelitian" class="form-label">Bidang Penelitian</label>
                                    <select class="form-select" id="penelitian" name="penelitian" required>
                                        <option value="">Pilih Tingkat Saran...</option>
                                        <option value="Sangat Baik" <?= ($tracer_lanjutan_exists && $tracer_lanjutan_exists->penelitian == 'Sangat Baik') ? 'selected' : '' ?>>Sangat Baik</option>
                                        <option value="Baik" <?= ($tracer_lanjutan_exists && $tracer_lanjutan_exists->penelitian == 'Baik') ? 'selected' : '' ?>>Baik</option>
                                        <option value="Cukup" <?= ($tracer_lanjutan_exists && $tracer_lanjutan_exists->penelitian == 'Cukup') ? 'selected' : '' ?>>Cukup</option>
                                        <option value="Kurang" <?= ($tracer_lanjutan_exists && $tracer_lanjutan_exists->penelitian == 'Kurang') ? 'selected' : '' ?>>Kurang</option>
                                        <option value="Sangat Kurang" <?= ($tracer_lanjutan_exists && $tracer_lanjutan_exists->penelitian == 'Sangat Kurang') ? 'selected' : '' ?>>Sangat Kurang</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-6 mb-4 mb-md-0">
                                    <label for="pengabdian" class="form-label">Bidang Pengabdian</label>
                                    <select class="form-select" id="pengabdian" name="pengabdian" required>
                                        <option value="">Pilih Tingkat Saran...</option>
                                        <option value="Sangat Baik" <?= ($tracer_lanjutan_exists && $tracer_lanjutan_exists->pengabdian == 'Sangat Baik') ? 'selected' : '' ?>>Sangat Baik</option>
                                        <option value="Baik" <?= ($tracer_lanjutan_exists && $tracer_lanjutan_exists->pengabdian == 'Baik') ? 'selected' : '' ?>>Baik</option>
                                        <option value="Cukup" <?= ($tracer_lanjutan_exists && $tracer_lanjutan_exists->pengabdian == 'Cukup') ? 'selected' : '' ?>>Cukup</option>
                                        <option value="Kurang" <?= ($tracer_lanjutan_exists && $tracer_lanjutan_exists->pengabdian == 'Kurang') ? 'selected' : '' ?>>Kurang</option>
                                        <option value="Sangat Kurang" <?= ($tracer_lanjutan_exists && $tracer_lanjutan_exists->pengabdian == 'Sangat Kurang') ? 'selected' : '' ?>>Sangat Kurang</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Form Pertanyaan Tambahan -->
                            <hr class="mt-4" data-aos="zoom-in">
                            <h1 class="mb-4">Pertanyaan Tambahan</h1>
                            <div class="row mb-4">
                                <div class="col-md-6 mb-4 mb-md-0">
                                    <label for="aktif_cari_pekerjaan" class="form-label">Apakah Anda aktif mencari pekerjaan dalam 4 minggu terakhir?</label>
                                    <select class="form-select" id="aktif_cari_pekerjaan" name="aktif_cari_pekerjaan" required>
                                        <option value="">Pilih opsi...</option>
                                        <option value="Ya" <?= ($tracer_lanjutan_exists && $tracer_lanjutan_exists->aktif_cari_pekerjaan == 'Ya') ? 'selected' : '' ?>>Ya</option>
                                        <option value="Tidak" <?= ($tracer_lanjutan_exists && $tracer_lanjutan_exists->aktif_cari_pekerjaan == 'Tidak') ? 'selected' : '' ?>>Tidak</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="mulai_cari_pekerjaan" class="form-label">Kapan Anda mulai mencari pekerjaan?</label>
                                    <input type="text" class="form-control" id="mulai_cari_pekerjaan" name="mulai_cari_pekerjaan" value="<?= $tracer_lanjutan_exists->mulai_cari_pekerjaan ?>" required>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="bagaimana_cari_pekerjaan" class="form-label">Bagaimana Anda mencari pekerjaan?</label>
                                <textarea class="form-control" id="bagaimana_cari_pekerjaan" name="bagaimana_cari_pekerjaan" rows="2" required><?= isset($tracer_lanjutan_exists->bagaimana_cari_pekerjaan) ? $tracer_lanjutan_exists->bagaimana_cari_pekerjaan : '' ?></textarea>
                            </div>
                            <div class="mb-4">
                                <label for="lamaran_pertama" class="form-label">Berapa perusahaan yang sudah Anda lamar sebelum memperoleh pekerjaan pertama?</label>
                                <input type="text" class="form-control" id="lamaran_pertama" name="lamaran_pertama" value="<?= $tracer_lanjutan_exists->lamaran_pertama ?>" required>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-6 mb-4 mb-md-0">
                                    <label for="respon_lamaran" class="form-label">Berapa banyak perusahaan yang merespon lamaran Anda?</label>
                                    <input type="text" class="form-control" id="respon_lamaran" name="respon_lamaran" value="<?= $tracer_lanjutan_exists->respon_lamaran ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="undangan_interview" class="form-label">Berapa banyak perusahaan yang mengundang Anda untuk interview?</label>
                                    <input type="text" class="form-control" id="undangan_interview" name="undangan_interview" value="<?= $tracer_lanjutan_exists->undangan_interview ?>" required>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="alasan_pekerjaan" class="form-label">Jika menurut Anda pekerjaan saat ini tidak sesuai dengan pendidikan Anda, Berikan alasan kenapa Anda mengambilnya?</label>
                                <textarea class="form-control" id="alasan_pekerjaan" name="alasan_pekerjaan" rows="2" required><?= isset($tracer_lanjutan_exists->alasan_pekerjaan) ? $tracer_lanjutan_exists->alasan_pekerjaan : '' ?></textarea>
                            </div>

                            <!-- Update Button -->
                            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center pb-4 pt-2">
                                <!-- <a href="<?= base_url('profile'); ?>" class="btn btn-secondary mb-md-0"><i class="fa-solid fa-circle-chevron-left"></i> Kembali</a> -->
                                <input type="hidden" name="nim" value="<?= $users['nim'] ?>">
                                <button type="submit" class="btn btn-primary mx-auto mt-4 mb-md-0"><i class="fa-solid fa-pen-to-square"></i> Update</button>
                            </div>
                        </form>

                    <?php endif; ?>

                </div>
            </div>
        </div>
    </section>
    <!-- ./Tracer Alumni -->

    <!-- JS Files -->
    <?php include 'application/views/templates/js-files.php'; ?>

    <script>
        <?php if ($this->session->flashdata('message')) : ?>
            Swal.fire({
                icon: '<?= $this->session->flashdata('alert_class') == "alert-success" ? "success" : "error"; ?>',
                title: '<?= $this->session->flashdata('message'); ?>',
                timer: 3000,
                showConfirmButton: false
            });
        <?php endif; ?>
    </script>
</body>

</html>
