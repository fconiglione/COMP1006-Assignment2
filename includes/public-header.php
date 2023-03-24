<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Adding the title -->
    <title><?php echo $title; ?></title>
    <!-- CSS connections -->
    <link rel="stylesheet" href="./css/normalize.css" />
    <link rel="stylesheet" href="./css/app.css" />
    <!-- Font awesome connection -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- JS connections -->
    <script src="js/sorttable.js" defer></script>
    <script src="js/scripts.js" defer></script>
</head>

<body>
    <header>
        <!-- Logo here -->
        <a href="index.php">
            <img id="logo-img" src="./media/logo.png" />
        </a>
        <nav>
            <ul>
                <?php
                // Starting the session
                if (session_start() == PHP_SESSION_NONE) {
                    session_start();
                }
                // Database connection
                require('includes/db.php');
                // Running the sql query
                $sql = "SELECT pageId, title, content FROM pages";
                $cmd = $db->prepare($sql);
                $cmd->execute();
                $pages = $cmd->fetchAll();
                // Adding each page title based on the pageId to the navigation
                foreach ($pages as $page) {
                    echo '<li><a href="index.php?pageId=' . $page["pageId"] . '">' . $page["title"] . '</a></li>';
                }
                // If logged in, show logout
                if (!empty($_SESSION['user'])) {
                    echo '<li><a href="logout.php">Logout</a></li>';
                }
                // If not logged in, show register and login
                else {
                    echo '<li><a href="register.php">Register</a></li>';
                    echo '<li><a href="login.php">Login</a></li>';
                }
                ?>
            </ul>
        </nav>
    </header>