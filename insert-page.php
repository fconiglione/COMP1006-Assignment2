<?php
require('includes/auth.php');

$title = 'Saving Page Details...';
require('includes/header.php');

$title = $_POST['title'];
$content = $_POST['content'];
$validate = true;

if (empty($title)) {
    echo '<p>Title is required.</p>';
    $validate = false;
}
if (empty($content)) {
    echo '<p>Content is required.</p>';
    $validate = false;
}
if ($validate) {
    require('includes/db.php');
    $sql = "INSERT INTO pages (title, content) 
            VALUES (:title, :content)";
    $cmd = $db->prepare($sql);
    $cmd->bindParam(':title', $title, PDO::PARAM_STR, 255);
    $cmd->bindParam(':content', $content, PDO::PARAM_STR, 255);
    $cmd->execute();
    $db = null;
    echo "Page Saved";
}

require('includes/footer.php'); ?>