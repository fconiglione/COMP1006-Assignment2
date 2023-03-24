<?php
// Checking user permissions
require('includes/auth.php');
// Creating the title
$title = 'User Details';
// Including the header
require('includes/header.php');
// Getting the existing userId and decoding
$userId = base64_decode($_GET['userId']);
// Checking to see if userId exists and is numeric, else going to 400.php
if (empty($userId) || !is_numeric($userId)) {
    header('location:400.php');
    exit();
}
// Adding database connection
require('includes/db.php');
// Running the sql query
$sql = "SELECT * FROM administrators WHERE userId = :userId";
$cmd = $db->prepare($sql);
// PDO binding paramter for userId
$cmd->bindParam(':userId', $userId, PDO::PARAM_INT);
$cmd->execute();
$user = $cmd->fetch();
// If the user is empty, go to 404.php
if (empty($user)) {
    header('location:404.php');
    exit();
}
// Creating a $username variable
$username = $user['username'];
?>
<main>
    <h1>Edit User</h1>
    <!-- Actioning the update-admin.php once form submitted -->
    <form action="update-admin.php" method="POST">
        <fieldset>
            <label for="name">User:</label>
            <!-- Making this a required field -->
            <input type="text" name="username" id="username" value="<?php echo $username; ?>" required>
        </fieldset>
        <button class="btn">Update</button>
        <input name="userId" id="userId" value="<?php echo $userId; ?>" type="hidden" />
    </form>
    <!-- Adding an excerpt for password inquiries -->
    <h2>For security purposes, passwords <u>cannot</u> be changed or modified.</h2>
</main>
<!-- Adding the footer -->
<?php require('includes/footer.php'); ?>