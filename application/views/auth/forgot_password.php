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

    <!-- Forgot Password -->
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
                                        <i class="fa-solid fa-envelope pb-3"></i>
                                        <h2 class="card-title pb-3">Forgot Password</h2>
                                        <p>Please enter your email address to reset your password</p>
                                    </div>

                                    <form method="post" action="<?= base_url('forgot_password'); ?>">
                                        <div class="pb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email..." value="<?= set_value('email'); ?>">
                                            <?= form_error('email', '<small>', '</small>'); ?>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn-login mt-2">Submit</button>
                                            <a href="<?= base_url('login'); ?>" class="btn-back mt-3">Back to Login</a>
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
    <!-- ./Forgot Password -->

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