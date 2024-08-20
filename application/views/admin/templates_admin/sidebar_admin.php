<style>
    .bg-primary-solid {
        background-color: #751786;
    }

    .sidebar-brand-icon img {
        width: 50px;
        border: 2px solid white;
        border-radius: 30%;
        box-shadow: 4px 8px 16px rgba(0, 0, 0, 0.2);
    }
</style>

<!-- Sidebar -->
<ul class="navbar-nav bg-primary-solid sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin'); ?>">
        <div class="sidebar-brand-icon">
            <img src="<?= base_url('assets/users/img/logo-if.png'); ?>" alt="Logo">
        </div>
        <div class="sidebar-brand-text mx-3">Admin Alumni</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= $this->uri->segment(2) == '' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('admin'); ?>">
            <i class="fa-solid fa-gauge"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Data Angkatan -->
    <li class="nav-item <?= $this->uri->segment(2) == 'angkatan' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('admin/angkatan'); ?>">
            <i class="fa-solid fa-magnifying-glass-chart"></i>
            <span>Data Angkatan</span></a>
    </li>

    <li class="nav-item <?= $this->uri->segment(2) == '' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('chat/index'); ?>">
            <i class="fa-solid fa-gauge"></i>
            <span>Forum</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Users -->
    <li class="nav-item <?= $this->uri->segment(2) == 'users' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('admin/users'); ?>">
            <i class="fa-solid fa-users"></i>
            <span>Users</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->