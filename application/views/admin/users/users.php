<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 bold">Users</h1>
    <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.</p> -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <!-- Modify the anchor tag here -->
            <a href="<?= base_url('admin/users_add'); ?>">
                <h6 class="m-0 font-weight-bold text-primary">Tambah User</h6>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($all_users as $user) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?php echo $user['nim']; ?></td>
                                <td><?php echo $user['nama']; ?></td>
                                <td><?php echo $user['email']; ?></td>
                                <td>
                                    <?php
                                    if ($user['role_id'] == 1) {
                                        echo 'Admin';
                                    } elseif ($user['role_id'] == 2) {
                                        echo 'Alumni';
                                    } else {
                                        echo 'Undefined';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <a href="<?= base_url('admin/users_edit/' . $user['id']); ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <?php if ($user['role_id'] != 1) : ?>
                                        <a href="<?= base_url('admin/users_delete/' . $user['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>