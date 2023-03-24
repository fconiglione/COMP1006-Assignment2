<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="./css/normalize.css" />
    <link rel="stylesheet" href="./css/app.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="js/sorttable.js" defer></script>
    <script src="js/scripts.js" defer></script>
</head>
<body>
    <header>
        <a href="index.php">
            <img id="logo-img" src="./media/logo.png" />
        </a>
        <?php
        echo '<nav>';
        echo '<ul>';
        if (session_start() == PHP_SESSION_NONE) {
            session_start();
        }

        if (empty($_SESSION['user'])) {
            echo '<li><a href="register.php">Register</a></li>';
            echo '<li><a href="login.php">Login</a></li>';
        }
        else {
            echo '<li><a href="admin.php">Administrators</a></li>';
            echo '<li><a href="page-list.php">Page Editor</a></li>';
            echo '<li><a href="index.php">Public Site</a></li>';
            echo '<li><a href="#">Welcome ' . $_SESSION['user'] . '. </a></li>'; 
            echo '<li><a href="logout.php">Logout</a></li>'; 
        }
        echo '</ul>';
        echo '</nav>';
        $db = null;
        ?>
    </header>