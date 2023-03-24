<?php
// Creating title
$title = 'Public Site';
// Adding the PUBLIC header
require('includes/public-header.php');
// Adding the database connection
require('includes/db.php');
// Getting the pageId
$pageId = $_GET['pageId'];
// Running the sql connection
$sql = "SELECT title, content FROM pages WHERE pageId = :pageId";
$cmd = $db->prepare($sql);
// PDO parameter
$cmd->bindParam(':pageId', $pageId, PDO::PARAM_INT);
$cmd->execute();
$page = $cmd->fetch();
// Creating the page content based on the info from the database
if ($page) {
    echo '<h1>' . $page['title'] . '</h1>';
    echo '<p>' . $page['content'] . '</p>';
} else {
    header('location:index.php?pageId=1');
}
// Disconnecting
$db = null;
// Adding the footer
require('includes/footer.php'); ?>