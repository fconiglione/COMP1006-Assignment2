<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="css/normalize.css" />
    <link rel="stylesheet" href="css/app.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="js/sorttable.js" defer></script>
    <script src="js/scripts.js" defer></script>
</head>
<body>
    <header>
        <a href="home.html">
            <img id="logo-img"/>
        </a>
        <?php
        require('includes/db.php');
        $sql = "SELECT pageId, title, content FROM pages";
        $cmd = $db->prepare($sql);
        $cmd->execute();
        $pages = $cmd->fetchAll();
        echo '<nav>';
        echo '<ul>';
        foreach($pages as $page) {
            echo '<li><a href="index.php?pageId=' . $page["pageId"] . '">' . $page["title"] . '</a></li>';
        }
        echo '<li><a href="content-manager.php">Admin</a></li>';
        echo '<li><a href="register.php">Register</a></li>';
        echo '<li><a href="login.php">Login</a></li>';
        echo '</ul>';
        echo '</nav>';
        $db = null;
        ?>
    </header>