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
    <!-- Kegiatan-->
    <section class="kegiatan">
        <div class="container">
            <div class="pb-4 px-3" data-aos="zoom-in">
                <div class="mb-5">
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        <div class="col">
                            <div class="card h-100">
                                <img src="<?= base_url('assets/users/img/image-example3.jpeg'); ?>" class="card-img-top" alt="Kegiatan">
                                <div class="card-body">
                                    <h2 class="card-title">Workshop Pengembangan Karir Alumni Amikom Purwokerto</h2>
                                    <p class="card-text">
                                        Pada tanggal 15 Juni 2024, alumni Amikom Purwokerto mengadakan workshop pengembangan karir di kampus. Acara ini dihadiri oleh lebih dari 100 alumni dan mahasiswa yang ingin memperluas jaringan dan mengembangkan keterampilan profesional mereka. Para peserta mendapatkan kesempatan untuk belajar langsung dari para ahli di bidang teknologi informasi, manajemen, dan desain kreatif. Workshop ini juga menampilkan sesi networking, di mana alumni sukses berbagi pengalaman dan tips tentang cara membangun karir yang cemerlang. Peserta memberikan tanggapan positif dan mengharapkan acara serupa di masa depan untuk terus mendukung perkembangan karir mereka.
                                    </p>
                                    <a href="#" class="position-absolute bottom-0 end-0 m-3">Lihat Detail <i class="fa-solid fa-circle-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100">
                                <img src="<?= base_url('assets/users/img/image-example2.jpeg'); ?>" class="card-img-top" alt="Kegiatan">
                                <div class="card-body">
                                    <h2 class="card-title">Reuni Akbar dan Malam Apresiasi Alumni Amikom Purwokerto</h2>
                                    <p class="card-text">
                                        Pada tanggal 30 Juli 2024, Amikom Purwokerto menggelar acara reuni akbar dan malam apresiasi alumni yang diadakan di hotel bintang lima lokal. Acara ini bertujuan untuk mempererat hubungan antara alumni dari berbagai angkatan. Malam itu diisi dengan berbagai hiburan, penghargaan untuk alumni berprestasi, dan sesi nostalgia yang penuh kehangatan. Dalam pidatonya, Rektor Amikom Purwokerto menyampaikan rasa bangganya terhadap pencapaian alumni yang telah membawa nama baik almamater di kancah nasional dan internasional. Acara ini menjadi momen berharga bagi para alumni untuk mengenang masa kuliah mereka dan memperkuat ikatan kebersamaan.
                                    </p>
                                    <div class="">
                                        <a href="#" class="position-absolute bottom-0 end-0 m-3">Lihat Detail <i class="fa-solid fa-circle-chevron-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100">
                                <img src="<?= base_url('assets/users/img/image-example1.jpeg'); ?>" class="card-img-top" alt="Kegiatan">
                                <div class="card-body">
                                    <h2 class="card-title">Sosialiasasi Tracer Study Tahun Lulus 2024</h2>
                                    <p class="card-text">
                                        Pada tanggal 12 Mei 2024, AMIKOM Purwokerto dengan bangga menyelenggarakan acara Sosialisasi Alumni, sebuah kegiatan yang bertujuan untuk mempererat hubungan antara alumni dan mahasiswa saat ini. Acara yang berlangsung di Aula Kampus AMIKOM Purwokerto ini dihadiri oleh lebih dari 200 peserta, termasuk alumni dari berbagai angkatan, dosen, dan mahasiswa aktif.
                                    </p>
                                    <a href="#" class="position-absolute bottom-0 end-0 m-3">Lihat Detail <i class="fa-solid fa-circle-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100">
                                <img src="<?= base_url('assets/users/img/image-example2.jpeg'); ?>" class="card-img-top" alt="Kegiatan">
                                <div class="card-body">
                                    <h2 class="card-title">Reuni Akbar dan Malam Apresiasi Alumni Amikom Purwokerto</h2>
                                    <p class="card-text">
                                        Pada tanggal 30 Juli 2024, Amikom Purwokerto menggelar acara reuni akbar dan malam apresiasi alumni yang diadakan di hotel bintang lima lokal. Acara ini bertujuan untuk mempererat hubungan antara alumni dari berbagai angkatan. Malam itu diisi dengan berbagai hiburan, penghargaan untuk alumni berprestasi, dan sesi nostalgia yang penuh kehangatan. Dalam pidatonya, Rektor Amikom Purwokerto menyampaikan rasa bangganya terhadap pencapaian alumni yang telah membawa nama baik almamater di kancah nasional dan internasional. Acara ini menjadi momen berharga bagi para alumni untuk mengenang masa kuliah mereka dan memperkuat ikatan kebersamaan.
                                    </p>
                                    <div class="">
                                        <a href="#" class="position-absolute bottom-0 end-0 m-3">Lihat Detail <i class="fa-solid fa-circle-chevron-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ./Kegiatan -->

    <!-- JS Files -->
    <?php include 'application/views/templates/js-files.php'; ?>
</body>

</html>