<?php
// Authenticates the user to see if they have access
require('includes/auth.php');

// Creates a page title
$title = 'Add a New Page';
// Including the header
require('includes/header.php');
?>
<main>
    <h1>Page Details</h1>
    <p><i>Edit or delete any of the pages below.</i></p>
    <form action="insert-page.php" method="POST">
        <fieldset>
            <label for="title">Title:*</label>
            <!-- Making this a required field -->
            <input name="title" id="title" required />
        </fieldset>
        <fieldset>
            <label for="content">Content:*</label>
            <!-- Making this a required field -->
            <textarea name="content" id="content" required></textarea>
        </fieldset>
        <button class="btn">Save</button>
    </form>
</main>
<!-- Including the footer -->
<?php require('includes/footer.php'); ?>