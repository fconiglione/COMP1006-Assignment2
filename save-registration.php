<?php
$username = $_POST['username'];
$password = $_POST['password'];
$confirm = $_POST['confirm'];
$validate = true;

if (empty($username)) {
    echo 'Username is required.<br />';
    $validate = false;
}

if (empty($password)) {
    echo 'Password is required.<br />';
    $validate = false;
}

if ($password != $confirm) {
    echo 'Passwords do not match.<br />';
    $validate = false;
}

if ($validate) {
    require('includes/db.php');

    $sql = "SELECT * FROM administrators WHERE username = :username";
    $cmd = $db->prepare($sql);
    $cmd->bindParam(':username', $username, PDO::PARAM_STR, 100);
    $cmd->execute();
    $user = $cmd->fetch();
    if (empty($user)) {
        $password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO administrators (username, password) VALUES (:username, :password)";
        $cmd = $db->prepare($sql);
        $cmd->bindParam(':username', $username, PDO::PARAM_STR, 100);
        $cmd->bindParam(':password', $password, PDO::PARAM_STR, 255);
        $cmd->execute();
    }
    else {
        echo 'User already exists.<br />';
        exit();
    }        
    $db = null;
    header('location:home.php');
}
?>