<?php
$title = 'Public Site';
require('includes/header-b.php');

require('includes/db.php');

    $pageId = $_GET['pageId'];
    $sql = "SELECT title, content FROM pages WHERE pageId = :pageId";
    $cmd = $db->prepare($sql);
    $cmd->bindParam(':pageId', $pageId, PDO::PARAM_INT);
    $cmd->execute();
    $page = $cmd->fetch();
    if ($page) {
        echo '<h1>' . $page['title'] . '</h1>';
        echo '<p>' . $page['content'] . '</p>';
    } else {
        echo '<h1>Page not found</h1>';
    }
$db = null;
  ?>
</body>

<?php require('includes/footer-a.php'); ?>