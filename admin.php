<?php
// Creates a page title
$title = 'Page List';
// Including the header
require('includes/header.php');
?>
<main>
    <h1>Administrators</h1>
    <p><i>Edit or delete any of the administrators below.</i></p>
    <?php
    try {
        // Including the database connection
        require('includes/db.php');
        // Connecting to the database and running the sql query
        $sql = "SELECT * FROM administrators";
        $cmd = $db->prepare($sql);
        $cmd->execute();
        $users = $cmd->fetchAll();
        // Creating the table and its headers
        echo '<table><thead><th>User</th><th>Edit</th><th>Delete</th></thead>';
        // Looping through the administrators table and showcasing each active user
        foreach ($users as $user) {
            // Completing the table rows along with edit/delete icons
            echo '<tr>
                    <td>' . $user['username'] . '</td>
                    <td>
                        <a href="edit-admin.php?userId=' . base64_encode($user['userId']) . '" title="Edit">
                        <i class="fa-solid fa-user-pen"></i>
                        </a>           
                    </td>
                        <td>
                            <a href="delete-admin.php?userId=' . $user['userId'] . '"
                                title="Delete" onclick="return confirmDelete();">
                                <i class="fa-solid fa-ban"></i>
                            </a>
                        </td>
                    </tr>';
        }
        echo '</table>';
        // Disconnecting
        $db = null;
    }
    // Try/catch block for security
    catch (Exception $e) {
        // Returns an error
        header('location:error.php');
        exit();
    }
    ?>
</main>
<!-- Including the footer -->
<?php require('includes/footer.php'); ?>