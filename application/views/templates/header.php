<header>
    <!-- Top Header -->
    <div class="header-top">
        <div class="container">
            <div class="py-2 px-4">
                <a href="https://maps.app.goo.gl/P8v6Q7PjAnaxeQ616" target="_blank">
                    <i class="fa-solid fa-location-dot"></i> Jalan Letjend Pol Soemarto, Watumas, Purwokerto Utara | Gedung FIK Universitas Amikom Purwokerto
                </a>
            </div>
        </div>
    </div>

    <!-- Bottom Header -->
    <div class="header-bottom">
        <div class="container">
            <div class="p-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <img src="<?= base_url('assets/users/img/logo-if.png'); ?>" alt="Logo" style="width: 60px;">
                            </div>
                            <div class="col-auto">
                            <h1>Alumni Prodi Informatika</h1>
                                <p>Universitas Amikom Purwokerto</p>
                            </div>
                        </div>
                    </div>

                    <?php if ($this->session->userdata('nim')): ?>
                        <!-- After Login -->
                        <div class="col-auto">
                            <div class="after-login">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-auto m-0">
                                            <img src="<?= base_url('assets/users/img/profile/') . $this->session->userdata('image'); ?>" alt="Profile">
                                        </div>
                                        <div class="col ps-0">
                                            <div class="row">
                                                <div class="col">
                                                    <a href="<?= base_url('profile') ?>" class="profile-btn">
                                                        <?= $this->session->userdata('nama') ?> (<?= $this->session->userdata('nim') ?>)
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <a href="<?= base_url('auth/logout') ?>" class="logout">
                                                        <i class="fa-solid fa-right-from-bracket fa-rotate-180"></i> Logout
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                        <!-- Before Login -->
                        <div class="col-auto">
                            <div class="before-login">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-auto m-0">
                                                <img src="<?= base_url('assets/users/img/profile/default.png'); ?>" alt="Profile">
                                            </div>
                                            <div class="col ps-0">
                                                <p>Guest</p>
                                                <a href="<?= base_url('login'); ?>" style="font-family: 'Urbanist', sans-serif;">
                                                    <i class="fa-solid fa-right-to-bracket"></i> <span style="font-family: 'Urbanist', sans-serif;">Login</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                </div>
                <hr class="m-0 mt-4" data-aos="zoom-in">
            </div>
        </div>
    </div>
</header>

<?php if ($this->session->flashdata('message')): ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: '<?= $this->session->flashdata('alert_class') == 'alert-success' ? 'success' : 'error' ?>',
                title: '<?= $this->session->flashdata('message') ?>',
                showConfirmButton: false,
                timer: 2000
            });
        });
    </script>
<?php endif; ?>
