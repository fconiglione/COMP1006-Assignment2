<?php
$title = 'Add a New Page';
require('includes/header-a.php');
?>
<main>
    <h1>Page Details</h1>
    <form action="insert-page.php" method="POST">
        <fieldset>
            <label for="title">Title:*</label>
            <input name="title" id="title" required />
        </fieldset>
        <fieldset>
            <label for="content">Content:*</label>
            <textarea name="content" id="content" required></textarea>
        </fieldset>
        <button class="btnOffset">Save</button>
    </form>
</main>
<?php require('includes/footer-a.php'); ?>