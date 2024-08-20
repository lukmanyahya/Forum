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
    <!-- Header -->
    <div class="header-top">
        <div class="container">
            <div class="py-2 px-3">
                <a href="https://maps.app.goo.gl/P8v6Q7PjAnaxeQ616" target="_blank"><i class="fa-solid fa-location-dot"></i> Jalan Letjend Pol Soemarto, Watumas, Purwokerto Utara | Gedung FIK Universitas Amikom Purwokerto</a>
            </div>
        </div>
    </div>
    <!-- ./Header -->

    <!-- Login -->
    <div class="login">
        <div class="container">
            <div class="card" data-aos="zoom-in">
                <div class="row g-0">
                    <div class="col-md-6 bg-title d-flex justify-content-center align-items-center">
                        <div class="col-auto px-2">
                            <img src="<?= base_url('assets/users/img/logo-if.png'); ?>" alt="Logo">
                        </div>
                        <div class="col-auto px-2">
                            <h1>Alumni Prodi Informatika</h1>
                            <p>Universitas Amikom Purwokerto</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="container p-4">
                            <div class="card-body">
                                <div class="pb-4">
                                    <i class="fa-solid fa-user-graduate pb-3"></i>
                                    <h2 class="card-title pb-3">Masuk Sebagai Alumni</h2>
                                    <p>Silahkan masuk sebagai Alumni agar bisa mengakses fitur yang lebih lengkap</p>
                                </div>
                                <form method="post" action="<?= base_url('register'); ?>">
                                    <div class="pb-3">
                                        <label for="nim" class="form-label">NIM</label>
                                        <input type="text" class="form-control" name="nim" id="nim" placeholder="Your NIM..." value="<?= set_value('nim'); ?>">
                                        <?= form_error('nim', '<small>', '</small>'); ?>
                                    </div>
                                    <div class="pb-3">
                                        <label for="nama" class="form-label">Nama</label>
                                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Your Name..." value="<?= set_value('nama'); ?>">
                                        <?= form_error('nama', '<small>', '</small>'); ?>
                                    </div>
                                    <div class="pb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Your Email..." value="<?= set_value('email'); ?>">
                                        <?= form_error('email', '<small>', '</small>'); ?>
                                    </div>
                                    <div class="pb-3">
                                        <label for="password1" class="form-label">Password</label>
                                        <input type="password" class="form-control" name="password1" id="password1" placeholder="Your Password...">
                                        <?= form_error('password1', '<small>', '</small>'); ?>
                                    </div>
                                    <div class="pb-3">
                                        <label for="password2" class="form-label">Ulangi Password</label>
                                        <input type="password" class="form-control" name="password2" id="password2" placeholder="Repeat Your Password...">
                                    </div>
                                    <div class="pb-3">
                                        <label for="role" class="form-label">Role</label>
                                        <select class="form-control" name="role" id="role">
                                            <option value="" disabled selected>Select your role...</option>
                                            <option value="1">Administrator</option>
                                            <option value="2">User</option>
                                        </select>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn-login mt-2">Register</button>
                                        <a href="<?= base_url('login'); ?>" class="btn-back mt-3">Kembali</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ./Login -->

    <!-- JS Files -->
    <?php include 'application/views/templates/js-files.php'; ?>
</body>

</html>