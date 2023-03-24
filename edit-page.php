<?php
require('includes/auth.php');

$title = 'Page Details';
require('includes/header.php');

$pageId = base64_decode($_GET['pageId']);

if (empty($pageId) || !is_numeric($pageId)) {
    header('location:400.php');
    exit();
}
require('includes/db.php');
$sql = "SELECT * FROM pages WHERE pageId = :pageId";
$cmd = $db->prepare($sql);
$cmd->bindParam(':pageId', $pageId, PDO::PARAM_INT);
$cmd->execute();
$page = $cmd->fetch();

if (empty($page)) {
    header('location:404.php');
    exit();
}

$title = $page['title'];
$content = $page['content'];
?>
<main>
    <h1>Edit Page</h1>
    <form action="update-page.php" method="POST">
        <fieldset>
            <label for="name">Title:</label>
            <textarea name="title" id="title" required><?php echo $title; ?></textarea>
        </fieldset>
        <fieldset>
            <label for="content">Content:</label>
            <input name="content" id="content" required value="<?php echo $content; ?>" />
        </fieldset>
        <button class="btn">Update</button>
        <input name="pageId" id="pageId" value="<?php echo $pageId; ?>" type="hidden" />
    </form>
</main>
<?php require('includes/footer.php'); ?>