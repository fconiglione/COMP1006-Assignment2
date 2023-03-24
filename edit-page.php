<?php
// Authenticating the user
require('includes/auth.php');
// Creating the title
$title = 'Page Details';
// Including the header
require('includes/header.php');
// Getting the existing pageId and decoding
$pageId = base64_decode($_GET['pageId']);
// Security statement again
if (empty($pageId) || !is_numeric($pageId)) {
    header('location:400.php');
    exit();
}
// Connecting to the database and running the sql query
require('includes/db.php');
$sql = "SELECT * FROM pages WHERE pageId = :pageId";
$cmd = $db->prepare($sql);
$cmd->bindParam(':pageId', $pageId, PDO::PARAM_INT);
$cmd->execute();
$page = $cmd->fetch();
// Security statement again
if (empty($page)) {
    header('location:404.php');
    exit();
}
// creating the variables
$title = $page['title'];
$content = $page['content'];
?>
<main>
    <h1>Edit Page</h1>
    <!-- Actioning the update-page.php once submitted -->
    <form action="update-page.php" method="POST">
        <fieldset>
            <label for="name">Title:</label>
            <!-- Required title field -->
            <textarea name="title" id="title" required><?php echo $title; ?></textarea>
        </fieldset>
        <fieldset>
            <label for="content">Content:</label>
            <!-- Required content field -->
            <input name="content" id="content" required value="<?php echo $content; ?>" />
        </fieldset>
        <button class="btn">Update</button>
        <input name="pageId" id="pageId" value="<?php echo $pageId; ?>" type="hidden" />
    </form>
</main>
<!-- Adding the footer -->
<?php require('includes/footer.php'); ?>