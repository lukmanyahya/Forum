<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $title; ?></title>
    <!-- CSS Files -->
    <?php include 'application/views/templates/css-files.php'; ?>
</head>
<body>
<h2><?php echo htmlspecialchars($title, ENT_QUOTES); ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('forum/create'); ?>

<label for="user_id">User ID</label>
<?php if (isset($user_id)): ?>
    <input type="text" name="user_id" value="<?php echo htmlspecialchars($user_id, ENT_QUOTES, 'UTF-8'); ?>" />
<?php endif; ?>

<label for="title">Title</label>
<input type="text" name="title" id="title" /><br />

<label for="content">Content</label>
<textarea name="content" id="content"></textarea><br />

<input type="submit" name="submit" value="Create forum" />

<?php echo form_close(); ?>
