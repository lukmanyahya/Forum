<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="text-center my-auto">
            <span>Copyright &copy; Your Website <?php echo date("Y"); ?></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url('assets/admin/vendor/jquery/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<!-- Core plugin JavaScript-->
<script src="<?php echo base_url('assets/admin/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>
<!-- Custom scripts for all pages-->
<script src="<?php echo base_url('assets/admin/js/sb-admin-2.min.js'); ?>"></script>
<!-- Page level plugins -->
<script src="<?php echo base_url('assets/admin/vendor/chart.js/Chart.min.js'); ?>"></script>
<!-- Page level custom scripts -->
<script src="<?php echo base_url('assets/admin/js/demo/chart-area-demo.js'); ?>"></script>
<script src="<?php echo base_url('assets/admin/js/demo/chart-pie-demo.js'); ?>"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://kit.fontawesome.com/b82190895a.js" crossorigin="anonymous"></script>

<?php if ($this->session->flashdata('message')) : ?>
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

</body>

</html>