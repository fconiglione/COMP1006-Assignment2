<?php
$userId = $_GET['userId'];
require('includes/db.php');
$sql = "DELETE FROM administrators WHERE userId = :userId";
$cmd = $db->prepare($sql);
$cmd->bindParam(':userId', $userId, PDO::PARAM_INT);
$cmd->execute();
$db = null;
echo '<p>Administrator Deleted</p>
    <a href="admin.php">See The Updated Administrators List</a>';

header('location:admin.php');
?>