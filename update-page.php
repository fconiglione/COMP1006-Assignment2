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
    // Adding the variables
    $title = $_POST['title'];
    $content = $_POST['content'];
    $pageId = $_POST['pageId'];
    // Boolean validation variable
    $validate = true;
    // Adding several if statements to confirm proper input
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
    // If the validation passes, then run the code:
    if ($validate) {
        // DB connection
        require('includes/db.php');
        // SQL query
        $sql = "UPDATE pages SET title = :title, content = :content WHERE pageId = :pageId";
        $cmd = $db->prepare($sql);
        // PDO binding
        $cmd->bindParam(':title', $title, PDO::PARAM_STR, 255);
        $cmd->bindParam(':content', $content, PDO::PARAM_STR);
        $cmd->bindParam(':pageId', $pageId, PDO::PARAM_INT);
        $cmd->execute();
        // Disconnect form DB
        $db = null;
        // Confirmation message
        echo "Page Updated";
        header('location:page-list.php');
    }
    ?>
</body>
</html>
