<?php
// Getting the existing userId
$userId = $_GET['userId'];
// Connecting to the database
require('includes/db.php');
// Runnin the sql query
$sql = "DELETE FROM administrators WHERE userId = :userId";
$cmd = $db->prepare($sql);
// Using a PDO binding parameter to get the userId
$cmd->bindParam(':userId', $userId, PDO::PARAM_INT);
$cmd->execute();
// Disconnecting from the database
$db = null;
// Confirmation message and navigation
echo '<p>Administrator Deleted</p>
    <a href="admin.php">See The Updated Administrators List</a>';
header('location:admin.php'); ?>