<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Updating Page Details...</title>
</head>
<body>
    <?php
    $title = $_POST['title'];
    $content = $_POST['content'];
    $validate = true;
    $pageId = $_POST['pageId'];

    if (empty($pageId)) {
        echo '<p>Page Id is required.</p>';
        $validate = false;
    }

    if (empty($title)) {
        echo '<p>Title is required.</p>';
        $validate = false;
    }

    if (empty($content)) {
        echo '<p>Content is required.</p>';
        $validate = false;
    }

    if ($validate) {
        require('includes/db.php');
        $sql = "UPDATE pages SET title = :title, content = :content
            WHERE pageId = :pageId";
        $cmd = $db->prepare($sql);
        $cmd->bindParam(':title', $title, PDO::PARAM_STR, 255);
        $cmd->bindParam(':content', $content, PDO::PARAM_STR);
        $cmd->bindParam(':pageId', $pageId, PDO::PARAM_INT);
        $cmd->execute();
        $db = null;
        echo "Page Updated";
        header('location:page-list.php');
    }
    ?>
</body>
</html>
