<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Forum</title>
    <?php include 'application/views/templates/css-files.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

</head>
<style>
    .message {
        position: relative;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    .message-date {
        font-size: 0.8em;
        color: #777;
        position: absolute;
        top: 10px;
        right: 10px;
    }

    .comment-date {
        font-size: 0.8em;
        color: #777;
        position: absolute;
        top: 10px;
        right: 10px;
    }

    .comment {
        position: relative;
        margin-left: 20px;
        padding: 5px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    .message-author, .comment-author {
        font-weight: bold;
    }

    .message-actions {
        margin-top: 5px;
    }

    .reply-form {
        margin-left: 40px;
        margin-top: 10px;
    }

    .replies {
        margin-left: 40px;
    }

    .upload-section {
        margin-top: 20px;
    }
    .uploaded-image {
        margin-top: 10px;
        text-align: center;
    }

    .uploaded-image img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
    }

    .uploaded-image {
        margin-top: 15px;
        text-align: center;
    }

    .uploaded-image img {
        max-width: 100%;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .form-section {
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        padding: 30px;
        margin: 20px auto;
        max-width: 650px;
        box-sizing: border-box;
        transition: all 0.3s ease;
    }

    /* Gaya untuk tombol kembali */
    .back-btn {
        display: inline-block;
        padding: 12px 25px;
        background-color: #007bff;
        color: white;
        text-decoration: none;
        border-radius: 8px;
        margin-bottom: 20px;
        transition: background-color 0.3s ease;
    }

    .back-btn:hover {
        background-color: #0056b3;
    }
    .btn-kirim {
        display: inline-block;
        padding: 12px 25px;
        background-color: green;
        color: white;
        text-decoration: none;
        border-radius: 8px;
        margin-bottom: 20px;
    }
    .btn-komentar {
        display: inline-block;
        background-color: blueviolet;
        color: white;
        text-decoration: none;
    }
    .btn-edit {
        display: inline-block;
        background-color: yellow;
        color: black;
        text-decoration: none;
    }
    .btn-editkom {
        display: inline-block;
        background-color: yellowgreen;
        color: black;
        text-decoration: none;
    }
    .like-btn {
        background-color: transparent;
        border: none;
        cursor: pointer;
        font-size: 20px;
        color:blue  
    }

    .fas.fa-thumbs-up {
        margin-right: 8px;  /* Jarak antara ikon dan teks */
    }
</style>
<body>
    <div style="margin-bottom: 20px;">
        <a href="<?= site_url('admin'); ?>" class="back-btn">Kembali</a>
    </div>

    <!-- Formulir Kirim Pesan -->
    <div class="form-section">
        <h2>Ketik Postingan Anda</h2>
        <form method="post" action="<?= site_url('chat/send') ?>" enctype="multipart/form-data">
            <!-- Area untuk menulis pesan -->
            <textarea name="message" placeholder="Tulis pesan Anda" required></textarea>
            
            <!-- Upload Gambar -->
            <div class="upload-section">
                <label for="file">Upload Gambar (Opsional):</label>
                <input type="file" name="file" accept="image/*">
                <button type="submit"  class="btn-kirim">Kirim</button>
            </div>
        </form>
    </div>

    <!-- Tampilkan Gambar yang Diupload (Jika Ada) -->
    <?php if (!empty($message['image_path'])): ?>
        <div class="uploaded-image">
            <h4>Gambar yang Diunggah:</h4>
            <img src="<?= base_url($message['image_path']) ?>" alt="Uploaded Image">
        </div>
    <?php endif; ?>
</body>


    <!-- Tampilkan Pesan -->
    <?php foreach ($messages as $message): ?>
        <div class="message">
            <small class="message-date"><?= date('Y-m-d', strtotime($message['created_at'])) ?></small>
            <strong class="message-author"><?= htmlspecialchars($message['nim']) ?>:</strong>
            <p><?= htmlspecialchars($message['message']) ?></p>

            <?php if (!empty($message['image_path'])): ?>
                <div class="uploaded-image">
                    <img src="<?= base_url($message['image_path']) ?>" alt="Uploaded Image">
                </div>
            <?php endif; ?>

            <!-- Like, Edit, dan Delete -->
            <div class="message-actions">
                <form method="post" action="<?= site_url('chat/like/' . $message['id']) ?>" style="display:inline;">
                    <button type="submit" class="like-btn">
                    <i class="fas fa-thumbs-up"><span><?= $this->Message_model->get_likes_count($message['id']) ?> </span></i>
                        <?= $this->Message_model->user_liked($message['id'], $user_nim) ? '' : '' ?>
                    </button>
                </form>
                
                
                <?php if ($message['nim'] == $user_nim): ?>
                    <button onclick="toggleEditForm('edit-form-<?= $message['id'] ?>')" class="btn-edit">Edit</button>

                    <form method="post" action="<?= site_url('chat/delete/' . $message['id']) ?>" style="display:inline;">
                    <button type="button" class="delete-button" onclick="confirmDelete('<?= site_url('chat/delete/' . $message['id']) ?>')">Hapus</button>
                    </form>

                    <form id="edit-form-<?= $message['id'] ?>" method="post" action="<?= site_url('chat/edit/' . $message['id']) ?>" style="display:none;">
                        <input type="text" name="message" value="<?= htmlspecialchars($message['message']) ?>" required>
                        <button type="submit">Simpan</button>
                    </form>
                <?php endif; ?>
            </div>

            <!-- Komentar -->
            <div class="comments-section">
                <?php foreach ($message['comments'] as $comment): ?>
                    <div class="comment">
                        <strong class="comment-author"><?= htmlspecialchars($comment['nim']) ?>:</strong>
                        <small class="comment-date"><?= date('Y-m-d', strtotime($comment['created_at'])) ?></small>
                        <p><?= htmlspecialchars($comment['comment']) ?></p>

                        <!-- Edit dan Delete Komentar -->
                        <?php if ($comment['nim'] == $user_nim): ?>
                            <button onclick="toggleEditCommentForm('edit-comment-form-<?= $comment['id'] ?>')" class="btn-editkom">Edit</button>
                            <form method="post" action="<?= site_url('chat/delete_comment/' . $comment['id']) ?>" style="display:inline;">
                            <button type="button" class="delete-button" onclick="confirmDelete('<?= site_url('chat/delete_comment/' . $comment['id']) ?>')">Hapus</button>
                            </form>
                            
                            <form id="edit-comment-form-<?= $comment['id'] ?>" method="post" action="<?= site_url('chat/edit_comment/' . $comment['id']) ?>" style="display:none;">
                                <input type="text" name="comment" value="<?= htmlspecialchars($comment['comment']) ?>" required>
                                <button type="submit">Simpan</button>
                            </form>
                        <?php endif; ?>

                        <!-- Balasan -->
                        <a href="javascript:void(0);" onclick="toggleReplyForm('reply-form-<?= $comment['id'] ?>')">Balas</a>
                        <div id="reply-form-<?= $comment['id'] ?>" class="reply-form" style="display:none;">
                            <form method="post" action="<?= site_url('chat/reply') ?>">
                                <input type="hidden" name="comment_id" value="<?= $comment['id'] ?>">
                                <input type="hidden" name="message_id" value="<?= $message['id'] ?>">
                                <input type="text" name="reply" placeholder="Tulis balasan Anda" required>
                                <button type="submit">Kirim</button>
                            </form>
                        </div>
                        
                        <div class="replies">
                            <?php foreach ($comment['replies'] as $reply): ?>
                                <div class="comment">
                                    <strong class="comment-author"><?= htmlspecialchars($reply['nim']) ?>:</strong>
                                    <small class="comment-date"><?= date('Y-m-d', strtotime($reply['created_at'])) ?></small>
                                    <p><?= htmlspecialchars($reply['reply']) ?></p>

                                    <?php if ($reply['nim'] == $user_nim): ?>
                                        <button onclick="toggleEditReplyForm('edit-reply-form-<?= $reply['id'] ?>')">Edit</button>
                                        <form method="post" action="<?= site_url('chat/delete_reply/' . $reply['id']) ?>" style="display:inline;">
                                        <button type="button" class="delete-button" onclick="confirmDelete('<?= site_url('chat/delete_reply/' . $reply['id']) ?>')">Hapus</button>
                                        </form>
                                       
                                        <form id="edit-reply-form-<?= $reply['id'] ?>" method="post" action="<?= site_url('chat/edit_reply/' . $reply['id']) ?>" style="display:none;">
                                            <input type="text" name="reply" value="<?= htmlspecialchars($reply['reply']) ?>" required>
                                            <button type="submit">Simpan</button>
                                        </form>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endforeach; ?>

                <!-- Tambahkan Komentar -->
                <form method="post" action="<?= site_url('chat/comment') ?>">
                    <input type="hidden" name="message_id" value="<?= $message['id'] ?>">
                    <input type="text" name="comment" placeholder="Tambahkan komentar" required>
                    <button type="submit" class="btn-komentar">Komentar</button>
                </form>
            </div>
        </div>
    <?php endforeach; ?>

    <script>
        function toggleReplyForm(id) {
            const form = document.getElementById(id);
            form.style.display = form.style.display === "none" ? "block" : "none";
        }

        function toggleEditForm(id) {
            const form = document.getElementById(id);
            form.style.display = form.style.display === "none" ? "block" : "none";
        }

        function toggleEditCommentForm(id) {
            const form = document.getElementById(id);
            form.style.display = form.style.display === "none" ? "block" : "none";
        }

        function toggleEditReplyForm(id) {
            const form = document.getElementById(id);
            form.style.display = form.style.display === "none" ? "block" : "none";
        }
    </script>
    <script>
    // Fungsi untuk mengonfirmasi penghapusan
    function confirmDelete(url) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data yang dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#28a745',
            cancelButtonColor: '#dc3545',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Jika konfirmasi di-klik, form delete akan dikirim
                window.location.href = url; // Redirect ke URL penghapusan
            }
        });
    }
</script>
</body>
</html>
