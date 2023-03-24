<!-- FROM THE PHPTO-DO IN-CLASS FILE -->
<?php
session_start();
session_unset();
session_destroy();
// Redirecting to the homepage after logout
header('location:index.php');
?>