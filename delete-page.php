<?php
// Checking user permissions
require('includes/auth.php');
// Getting the existing pageId
$pageId = $_GET['pageId'];
// Including the db connection
require('includes/db.php');
// Running the sql query
$sql = "DELETE FROM pages WHERE pageId = :pageId";
$cmd = $db->prepare($sql);
// Using PDO again here
$cmd->bindParam(':pageId', $pageId, PDO::PARAM_INT);
$cmd->execute();
// Disconnecting
$db = null;
// Giving confirmation
echo '<p>Page Deleted</p>
    <a href="page-list.php">See The Updated Page List</a>';

header('location:page-list.php');
?>