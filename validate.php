
<?php
require('includes/db.php');

$username = $_POST['username'];
$password = $_POST['password'];
$sql = "SELECT * FROM administrators WHERE username = :username";
$cmd = $db->prepare($sql);
$cmd->bindParam(':username', $username, PDO::PARAM_STR, 100);
$cmd->execute();
$user = $cmd->fetch();

if (empty($user)) {
    $db = null;
    header('location:login.php?valid=false');
    exit();
}
else {
    if (!password_verify($password, $user['password'])) {
        $db = null;
        header('location:login.php?valid=false');
        exit();
    }
    else {
        session_start();
        $_SESSION['user'] = $username;
        header('location:content-manager.php');
        exit();
    }
}
?>