<!-- FROM THE PHPTO-DO IN-CLASS FILE -->
<?php
// DB connection
require('includes/db.php');
// Variables
$username = $_POST['username'];
$password = $_POST['password'];
// SQL query
$sql = "SELECT * FROM administrators WHERE username = :username";
$cmd = $db->prepare($sql);
// PDO parameters
$cmd->bindParam(':username', $username, PDO::PARAM_STR, 100);
$cmd->execute();
$user = $cmd->fetch();
// If the user is empty:
if (empty($user)) {
    // Disconnect
    $db = null;
    header('location:login.php?valid=false');
    exit();
}
// If not empty, then verify password
else {
    // If failed then:
    if (!password_verify($password, $user['password'])) {
        // Diconnect
        $db = null;
        header('location:login.php?valid=false');
        exit();
    }
    else {
        // If passed, then start the session
        session_start();
        $_SESSION['user'] = $username;
        // Redirect
        header('location:content-manager.php');
        exit();
    }
}
?>