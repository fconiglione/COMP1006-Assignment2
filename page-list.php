<?php 
$title = 'Page List';
require('includes/header-a.php'); 
?>
<main>
    <h1>Pages</h1>
    <a class = "add" href="add-page.php">Add Page</a>
    <?php
    try {
        require('includes/db.php');
        $sql = "SELECT * FROM pages";
        $cmd = $db->prepare($sql);
        $cmd->execute();
        $pages = $cmd->fetchAll();
        echo '<table><thead><th>Title</th><th>Edit</th><th>Delete</th>
                </thead>';
        foreach ($pages as $page) {
            echo '<tr>
                    <td>' . $page['title'] . '</td>
                    <td class="centre">
                        <a href="edit-page.php?pageId=' . $page['pageId'] . '" title="Edit">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>           
                        </td>
                        <td class="centre">
                            <a href="delete-page.php?pageId=' . $page['pageId'] . '"
                                title="Delete" onclick="return confirmDelete();">
                                    <i class="fa-solid fa-trash-can"></i>
                            </a>
                        </td>
                    </tr>';
        }
        echo '</table>';
        $db = null;
    }
    catch (Exception $e) {
        header('location:error.php');
        exit();
    }
    ?>
</main>
<?php require('includes/footer-a.php'); ?>