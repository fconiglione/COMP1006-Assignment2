<?php 
// Creating the title and including the header
$title = 'Page List';
require('includes/header.php');
?>
<main>
    <h1>Pages</h1>
    <!-- Actioning the add-page.php file when submitted -->
    <a class = "add" href="add-page.php">Add Page</a>
    <?php
    // Another try/catch block for security
    try {
        // Adding the db connection
        require('includes/db.php');
        // Running the sql query
        $sql = "SELECT * FROM pages";
        $cmd = $db->prepare($sql);
        $cmd->execute();
        $pages = $cmd->fetchAll();
        // Creating the table and its headings
        echo '<table><thead><th>Title</th><th>Edit</th><th>Delete</th></thead>';
        // Looping through the pages
        foreach ($pages as $page) {
            // Completing the table rows along with edit/delete icons
            echo '<tr>
                    <td>' . $page['title'] . '</td>
                    <td>
                        <a href="edit-page.php?pageId=' . base64_encode($page['pageId']) . '" title="Edit">
                        <i class="fa-solid fa-file-pen"></i>
                        </a>           
                        </td>
                        <td>
                            <a href="delete-page.php?pageId=' . $page['pageId'] . '"
                                title="Delete" onclick="return confirmDelete();">
                                <i class="fa-solid fa-ban"></i>
                            </a>
                        </td>
                    </tr>';
        }
        // Closing the table
        echo '</table>';
        // Disconnecting
        $db = null;
    }
    // If the caught, returns to an error page
    catch (Exception $e) {
        header('location:error.php');
        exit();
    }
    ?>
</main>
<!-- Connecting the footer -->
<?php require('includes/footer.php'); ?>