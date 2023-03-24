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
        <a href="home.php">
            <img id="logo-img" src="./media/logo.png"/>
        </a>
        <nav>
            <ul>
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li>
                    <a href="admin.php">About</a>
                </li>
                <li>
                    <a href="page-list.php">Services</a>
                </li>
                <li>
                    <a href="logo.php">Contact</a>
                </li>
                <?php
                    require('includes/db.php');
                    $sql = "SELECT pageId, title, content FROM pages";
                    $cmd = $db->prepare($sql);
                    $cmd->execute();
                    $pages = $cmd->fetchAll();
                    foreach($pages as $page) {
                        echo '<li><a href="index.php?pageId=' . $page["pageId"] . '">' . $page["title"] . '</a></li>';
                    }
                ?>
                <li>
                    <a href="register.php">Register</a>
                </li>
                <li>
                    <a href="login.php">Login</a>
                </li>
            </ul>
        </nav>
    </header>