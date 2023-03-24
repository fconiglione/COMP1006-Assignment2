<?php
require('includes/auth.php');

$title = 'User Details';
require('includes/header.php');

$userId = base64_decode($_GET['userId']);

if (empty($userId) || !is_numeric($userId)) {
    header('location:400.php');
    exit();
}
require('includes/db.php');
$sql = "SELECT * FROM administrators WHERE userId = :userId";
$cmd = $db->prepare($sql);
$cmd->bindParam(':userId', $userId, PDO::PARAM_INT);
$cmd->execute();
$user = $cmd->fetch();

if (empty($user)) {
    header('location:404.php');
    exit();
}

$username = $user['username'];
?>
<main>
    <h1>Edit User</h1>
    <form action="update-admin.php" method="POST">
        <fieldset>
            <label for="name">User:</label>
            <input type="text" name="username" id="username" value="<?php echo $username; ?>" required>
        </fieldset>
        <button class="btn">Update</button>
        <input name="userId" id="userId" value="<?php echo $userId; ?>" type="hidden" />
    </form>
    <h2>For security purposes, passwords <u>cannot</u> be changed or modified.</h2>
</main>
<?php require('includes/footer.php'); ?>
