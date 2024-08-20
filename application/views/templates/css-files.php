<!-- Vendor CSS Files -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet" />
<link href="<?= base_url('assets/users/css/style.css'); ?>" rel="stylesheet" type="text/css">
<link href="<?= base_url('assets/users/css/style-auth.css'); ?>" rel="stylesheet" type="text/css">
<link href="<?= base_url('assets/users/css/style-info.css'); ?>" rel="stylesheet" type="text/css">
<link href="<?= base_url('assets/users/css/style-event.css'); ?>" rel="stylesheet" type="text/css">
<link href="<?= base_url('assets/users/css/style-job.css'); ?>" rel="stylesheet" type="text/css">

<style>
.chat-box {
    width: 80%;
    margin: auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

/* Styling untuk setiap pesan */
.message {
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 10px;
    margin-bottom: 10px;
    position: relative;
}

/* Styling untuk penulis pesan */
.message-author {
    font-weight: bold;
    color: #333;
}

/* Styling untuk teks pesan */
.message-text {
    margin: 5px 0;
}

/* Styling untuk waktu pesan */
.message-time {
    font-size: 0.85em;
    color: #888;
}

/* Styling untuk indikator edit */
.message-edited {
    font-style: italic;
    color: #666;
}

/* Styling untuk tombol like */
.like-button {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 5px 10px;
    border-radius: 4px;
    cursor: pointer;
    font-size: 0.85em;
}

/* Styling untuk jumlah like */
.like-count {
    margin-left: 10px;
    font-size: 0.85em;
    color: #555;
}

/* Styling untuk tombol edit dan hapus */
.message-edit-delete {
    margin-top: 10px;
}

.edit-button, .delete-button {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 5px 10px;
    border-radius: 4px;
    cursor: pointer;
    font-size: 0.85em;
    margin-right: 5px;
}

.delete-button {
    background-color: #dc3545;
}

/* Styling untuk form pengiriman pesan */
.send-form {
    display: flex;
    align-items: center;
    margin-top: 20px;
}

.message-input {
    flex: 1;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
    margin-right: 10px;
}

.send-button {
    background-color: #28a745;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    cursor: pointer;
}
/* Styling untuk bagian komentar */
.comments-section {
    margin-top: 10px;
    border-top: 1px solid #ddd;
    padding-top: 10px;
}

.comment {
    padding: 5px 10px;
    border-bottom: 1px solid #eee;
}

.comment-input {
    padding: 8px;
    border: 1px solid #ddd;
    border-radius: 4px;
    width: calc(100% - 100px);
}

.comment-button {
    background-color: #28a745;
    color: #fff;
    border: none;
    padding: 8px 16px;
    border-radius: 4px;
    cursor: pointer;
    font-size: 0.85em;
}
/* Styling untuk bagian komentar */
.comments-section {
    margin-top: 10px;
    border-top: 1px solid #ddd;
    padding-top: 10px;
}

.comment {
    padding: 5px 10px;
    border-bottom: 1px solid #eee;
}

.comment-input {
    padding: 8px;
    border: 1px solid #ddd;
    border-radius: 4px;
    width: calc(100% - 100px);
}

.comment-button {
    background-color: #28a745;
    color: #fff;
    border: none;
    padding: 8px 16px;
    border-radius: 4px;
    cursor: pointer;
    font-size: 0.85em;
}

</style>