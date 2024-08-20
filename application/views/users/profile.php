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
    <!-- Profile -->
    <section class="profile">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
                                   
                                   <a href="<?= base_url('/'); ?>" class="btn btn-secondary mb-2 mb-md-0"><i class="fa-solid fa-circle-chevron-left"></i> Kembali</a>
                                   <button type="submit" class="btn btn-primary mb-2 mb-md-0"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
                                   <a href="<?= base_url('tracer'); ?>" class="btn btn-secondary"><i class="fa-solid fa-list-check"></i> Isi Tracer</a>
                                   <a href="<?= base_url('chat/index'); ?>" class="btn btn-secondary"><i class="fa-solid fa-list-check"></i> Forum</a>
        </div>
        <div class="container">
           
            <div class="px-4">
                <!-- <hr class="m-0" data-aos="zoom-in"> -->
                <div class="py-4" data-aos="zoom-in">
                    <form id="profileForm" action="<?= base_url('profile/update'); ?>" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="text-center py-4">
                                    <img id="profileImage" src="<?= base_url('assets/users/img/profile/') . $users['image']; ?>" alt="Profile" class="img-fluid" />
                                    <h3 class="mt-4"><?= $users['nama'] ?></h3>
                                    <p><?= $users['email'] ?></p>
                                    <div class="d-flex justify-content-center">
                                        <input type="file" accept="image/*" class="form-control" name="avatar" id="avatar" aria-describedby="avatarHelp" style="display: none" onchange="showCropper()">
                                        <input type="button" value="Ubah Foto" class="btn btn-primary ms-1" onclick="document.getElementById('avatar').click();" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="mb-4">
                                    <label for="nim" class="form-label">NIM</label>
                                    <input type="text" class="form-control" name="nim" id="nim" aria-describedby="nimHelp" value="<?= $users['nim'] ?>" readonly>
                                </div>
                                <div class="mb-4">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control" name="nama" id="nama" aria-describedby="namaHelp" value="<?= $users['nama'] ?>" readonly>
                                </div>
                                <div class="mb-4">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Your Email..." value="<?= $users['email'] ?>">
                                </div>
                                <div class="mb-4">
                                    <label for="password1" class="form-label">Password Baru</label>
                                    <input type="password" class="form-control" name="password1" id="password1" placeholder="Your New Password...">
                                </div>
                                <div class="mb-4">
                                    <label for="password2" class="form-label">Ulangi Password</label>
                                    <input type="password" class="form-control" name="password2" id="password2" placeholder="Repeat Your New Password...">
                                </div>
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- ./Profile -->

    <!-- JS Files -->
    <?php include 'application/views/templates/js-files.php'; ?>

    <script>
        document.getElementById('profileForm').addEventListener('submit', function(event) {
            var password1 = document.getElementById('password1').value;
            var password2 = document.getElementById('password2').value;

            if (password1.length > 0 && password1.length < 5) {
                event.preventDefault();
                Swal.fire({
                    icon: 'error',
                    title: 'Password terlalu pendek, minimal 5 karakter',
                    timer: 3000,
                    showConfirmButton: false
                }).then(function() {
                    document.getElementById('password1').value = ''; // Clear incorrect password
                    document.getElementById('password2').value = ''; // Clear incorrect repeated password
                });
            } else if (password1 !== password2) {
                event.preventDefault();
                Swal.fire({
                    icon: 'error',
                    title: 'Password dan Ulangi Password harus sama',
                    timer: 3000,
                    showConfirmButton: false
                }).then(function() {
                    document.getElementById('password1').value = ''; // Clear incorrect password
                    document.getElementById('password2').value = ''; // Clear incorrect repeated password
                });
            }
        });

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