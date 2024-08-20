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
            <div class="py-2 px-4">
                <a href="https://maps.app.goo.gl/P8v6Q7PjAnaxeQ616" target="_blank"><i class="fa-solid fa-location-dot"></i> Jalan Letjend Pol Soemarto, Watumas, Purwokerto Utara | Gedung FIK Universitas Amikom Purwokerto</a>
            </div>
        </div>
    </div>
    <!-- ./Header -->

    <!-- Change Password -->
    <div class="login">
        <div class="container">
            <div class="px-4">
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
                                        <i class="fa-solid fa-key pb-3"></i>
                                        <h2 class="card-title pb-3">Change Password</h2>
                                        <p>Please enter your new password</p>
                                    </div>

                                    <form method="post" action="<?= base_url('change_password'); ?>">
                                        <div class="pb-3">
                                            <label for="password1" class="form-label">Password</label>
                                            <input type="password" class="form-control" name="password1" id="password1" placeholder="New Password...">
                                            <?= form_error('password1', '<small>', '</small>'); ?>
                                        </div>
                                        <div class="pb-3">
                                            <label for="password2" class="form-label">Repeat Password</label>
                                            <input type="password" class="form-control" name="password2" id="password2" placeholder="Repeat New Password...">
                                            <?= form_error('password2', '<small>', '</small>'); ?>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn-login mt-2">Change Password</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ./Change Password -->

    <?php if ($this->session->flashdata('message')) : ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: '<?= $this->session->flashdata('alert_class') == 'alert-success' ? 'success' : 'error' ?>',
                    title: '<?= $this->session->flashdata('message') ?>',
                    showConfirmButton: false,
                    timer: 1500
                });
            });
        </script>
    <?php endif; ?>

    <!-- JS Files -->
    <?php include 'application/views/templates/js-files.php'; ?>
</body>

</html>