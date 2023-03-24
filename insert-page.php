<?php
// Authenticating
require('includes/auth.php');
// Creating title and adding header
$title = 'Saving Page Details...';
require('includes/header.php');
// Here are the variables
$title = $_POST['title'];
$content = $_POST['content'];
// Boolean variable for security/proper input
$validate = true;
// Several if statements to ensure input is given
if (empty($title)) {
    echo '<p>Title is required.</p>';
    $validate = false;
}
if (empty($content)) {
    echo '<p>Content is required.</p>';
    $validate = false;
}
// If the validation is true then run the code:
if ($validate) {
    // Connect to database
    require('includes/db.php');
    // Run the sql query
    $sql = "INSERT INTO pages (title, content) VALUES (:title, :content)";
    $cmd = $db->prepare($sql);
    // Adding the PDO parameters
    $cmd->bindParam(':title', $title, PDO::PARAM_STR, 255);
    $cmd->bindParam(':content', $content, PDO::PARAM_STR, 255);
    $cmd->execute();
    // Disconnecting
    $db = null;
    // Confirmation message
    echo "Page Saved";
}
// Adding the footer
require('includes/footer.php');?>