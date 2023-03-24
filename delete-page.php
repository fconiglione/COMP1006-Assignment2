<?php
require('includes/auth.php');

$pageId = $_GET['pageId'];
require('includes/db.php');
$sql = "DELETE FROM pages WHERE pageId = :pageId";
$cmd = $db->prepare($sql);
$cmd->bindParam(':pageId', $pageId, PDO::PARAM_INT);
$cmd->execute();
$db = null;
echo '<p>Page Deleted</p>
    <a href="page-list.php">See The Updated Page List</a>';

header('location:page-list.php');
?>