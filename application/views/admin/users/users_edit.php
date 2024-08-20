<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Edit User</h1>

    <!-- Edit User -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="post" action="<?= base_url('admin/users_edit/' . $user['id']); ?>">
                <div class="pb-3">
                    <label for="nim" class="form-label">NIM</label>
                    <input type="text" class="form-control" name="nim" id="nim" placeholder="Your NIM..." value="<?= set_value('nim', $user['nim']); ?>">
                    <?= form_error('nim', '<small>', '</small>'); ?>
                </div>
                <div class="pb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Your Name..." value="<?= set_value('nama', $user['nama']); ?>">
                    <?= form_error('nama', '<small>', '</small>'); ?>
                </div>
                <div class="pb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email..." value="<?= set_value('email', $user['email']); ?>">
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
                <div class="text-center">
                    <button type="submit" class="btn-login mt-2">Update</button>
                    <a href="<?= base_url('admin/users'); ?>" class="btn-back mt-3">Kembali</a>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->