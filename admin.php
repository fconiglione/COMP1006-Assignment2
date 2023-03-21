<?php 
$title = 'Page List';
require('includes/header-a.php'); 
?>
<main>
    <h1>Administrators</h1>
    <?php
    try {
        require('includes/db.php');
        $sql = "SELECT * FROM administrators";
        $cmd = $db->prepare($sql);
        $cmd->execute();
        $users = $cmd->fetchAll();
        echo '<table><thead><th>Title</th><th>Edit</th><th>Delete</th>
                </thead>';
        foreach ($users as $user) {
            echo '<tr>
                    <td>' . $user['username'] . '</td>
                    <td class="centre">
                        <a href="edit-admin.php?userId=' . $user['userId'] . '" title="Edit">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>           
                        <a href="delete-admin.php?userId=' . $user['userId'] . '"
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