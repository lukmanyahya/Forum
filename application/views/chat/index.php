<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Forum</title>
    <?php include 'application/views/templates/css-files.php'; ?>
</head>

<body>
<div style="margin-bottom: 20px;">
        <a href="<?= site_url('admin'); ?>" class="btn btn-primary">Kembali</a>
    </div>
<div class="chat-box">
    <?php foreach ($messages as $message): ?>
        <div class="message">
            <strong class="message-author"><?= htmlspecialchars($message['nim']) ?>:</strong>
            <?= htmlspecialchars($message['message']) ?>
            <small class="message-time">
                <?= $message['created_at'] ?>
                <?php if (!empty($message['edited_at'])): ?>
                    <span class="message-edited">(Edited: <?= $message['edited_at'] ?>)</span>
                <?php endif; ?>
            </small>

            <!-- Tampilkan tombol Like -->
            <div class="message-actions">
                <form method="post" action="<?= site_url('chat/like/' . $message['id']) ?>" style="display:inline;">
                    <button type="submit" class="like-button">
                        <?php if ($this->Message_model->user_liked($message['id'], $user_nim)): ?>
                            Unlike
                        <?php else: ?>
                            Like
                        <?php endif; ?>
                    </button>
                </form>
                <span class="like-count"><?= $this->Message_model->get_likes_count($message['id']) ?> Likes</span>
            </div>

            <?php if ($message['nim'] == $user_nim): // Tampilkan tombol edit/hapus hanya untuk pemilik pesan ?>
                <div class="message-edit-delete">
                    <!-- Form untuk Edit -->
                    <form method="post" action="<?= site_url('chat/edit/' . $message['id']) ?>" style="display:inline;">
                        <input type="text" name="message" value="<?= htmlspecialchars($message['message']) ?>" required class="edit-input">
                        <button type="submit" class="edit-button">Edit</button>
                    </form>

                    <!-- Form untuk Hapus -->
                    <form method="post" action="<?= site_url('chat/delete/' . $message['id']) ?>" style="display:inline;">
                        <button type="submit" class="delete-button" onclick="return confirm('Are you sure you want to delete this message?');">Delete</button>
                    </form>
                </div>
            <?php endif; ?>

            <!-- Tampilkan komentar -->
            <div class="comments-section">
                <?php foreach ($message['comments'] as $comment): ?>
                    <div class="comment">
                        <strong><?= htmlspecialchars($comment['nim']) ?>:</strong>
                        <?= htmlspecialchars($comment['comment']) ?>
                        <small>(<?= $comment['created_at'] ?>)</small>
                    </div>
                <?php endforeach; ?>
                
                <!-- Form untuk menambahkan komentar -->
                <form method="post" action="<?= site_url('chat/comment') ?>" class="comment-form">
                    <input type="hidden" name="message_id" value="<?= $message['id'] ?>" />
                    <input type="text" name="comment" placeholder="Add a comment" required class="comment-input">
                    <button type="submit" class="comment-button">Comment</button>
                </form>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<form method="post" action="<?= site_url('chat/send') ?>" class="send-form">
    <input type="hidden" name="nim" value="<?php echo htmlspecialchars($user_nim, ENT_QUOTES, 'UTF-8'); ?>" />
    <input type="text" name="message" placeholder="Your message" required class="message-input">
    <button type="submit" class="send-button">Send</button>
</form>


</body>
</html>
