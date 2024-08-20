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
 


    <!-- JS Files -->
    <?php include 'application/views/templates/js-files.php'; ?>

    <script>
        <?php if ($this->session->flashdata('message')) : ?>
            Swal.fire({
                icon: '<?= $this->session->flashdata('alert_class') == "alert-success" ? "success" : "error"; ?>',
                title: '<?= $this->session->flashdata('message'); ?>',
                timer: 3000,
                showConfirmButton: false
            });
        <?php endif; ?>

        $(document).ready(function() {
            $('input[name="status"]').change(function() {
                // Menyembunyikan semua form terlebih dahulu
                $('.conditional-form').hide();

                // Menampilkan form yang relevan berdasarkan pilihan status
                switch ($(this).val()) {
                    case '1':
                        $('#form-bekerja').show();
                        break;
                    case '2':
                        $('#form-wiraswasta').show();
                        break;
                    case '3':
                        $('#form-melanjutkan-pendidikan').show();
                        break;
                    case '4':
                        $('#form-belum-bekerja').show();
                        break;
                }
            });

            // Trigger change event saat halaman pertama kali dimuat
            $('input[name="status"]:checked').trigger('change');
        });
    </script>
</body>

</html>