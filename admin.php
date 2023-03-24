<?php 
$title = 'Page List';
require('includes/header.php');
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
        echo '<table><thead><th>User</th><th>Edit</th><th>Delete</th>
                </thead>';
        foreach ($users as $user) {
            echo '<tr>
                    <td>' . $user['username'] . '</td>
                    <td class="centre">
                        <a href="edit-admin.php?userId=' . base64_encode($user['userId']) . '" title="Edit">
                        <i class="fa-solid fa-user-pen"></i>
                        </a>           
                    </td>
                        <td class="centre">
                            <a href="delete-admin.php?user=' . $user['userId'] . '"
                                title="Delete" onclick="return confirmDelete();">
                                <i class="fa-solid fa-ban"></i>
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
<?php require('includes/footer.php'); ?>