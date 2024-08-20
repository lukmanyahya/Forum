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
    <!-- Job-->
    <section class="lowongan">
        <div class="container">
            <div class="pb-4 px-3" data-aos="zoom-in">
                <div class="card mb-4">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="<?= base_url('assets/users/img/logo-skilvul.png'); ?>" class="img-fluid" alt="Lowongan">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h2 class="card-title mb-4">UI/UX Designer - PT Impactbyte Teknologi Edukasi</h2>
                                <div class="col-auto">
                                    <i class="fas fa-map-marked-alt"></i>
                                    <p class="d-inline-block mb-2">Kota Purwokerto, Banyumas</p>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-graduation-cap"></i>
                                    <p class="d-inline-block mb-2">Minimal D3/S1</p>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-money-check-alt"></i>
                                    <p class="d-inline-block mb-2">Rp 3.800.000</p>
                                </div>
                                <a href="#" class="position-absolute bottom-0 end-0 m-3">Lihat Detail <i class="fa-solid fa-circle-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="<?= base_url('assets/users/img/logo-gits.png'); ?>" class="img-fluid" alt="Lowongan">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h2 class="card-title mb-4">Full Stack Developer - PT GITS Indonesia</h2>
                                <div class="col-auto">
                                    <i class="fas fa-map-marked-alt"></i>
                                    <p class="d-inline-block mb-2">Kota Bandung, Jawa Barat</p>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-graduation-cap"></i>
                                    <p class="d-inline-block mb-2">Minimal D3</p>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-money-check-alt"></i>
                                    <p class="d-inline-block mb-2">Rp 4.250.000</p>
                                </div>
                                <a href="#" class="position-absolute bottom-0 end-0 m-3">Lihat Detail <i class="fa-solid fa-circle-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ./Job -->

    <!-- JS Files -->
    <?php include 'application/views/templates/js-files.php'; ?>
</body>

</html>