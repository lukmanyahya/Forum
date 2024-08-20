
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $title; ?></title>
    <!-- CSS Files -->
    <?php include 'application/views/templates/css-files.php'; ?>
</head><h2><?php echo $title; ?></h2>
<body>
<?php foreach ($forums as $forum): ?>
    <h3><?php echo $forum['title']; ?></h3>
    <p>Posted by: <?php echo $forum['nama']; ?> (<?php echo $forum['email']; ?>)</p>
    <p><a href="<?php echo site_url('forum/view'.$forum['id']); ?>">View Post</a></p>
<?php endforeach; ?>
<a href="<?= base_url('forum/create'); ?>" class="btn btn-secondary"><i class="fa-solid fa-list-check"></i> Create</a>
</body>