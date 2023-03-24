<!-- FROM THE PHPTO-DO IN-CLASS FILE -->
<?php
// If logged in
if (session_start() == PHP_SESSION_NONE) {
    session_start();
}
// If not, redirect
if (empty($_SESSION['user'])) {
    header('location:login.php');
    exit();
}
?>