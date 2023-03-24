<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Updating Admin Details...</title>
</head>
<body>
    <?php
    // Adding the variables
    $user = $_POST['username'];
    $userId = $_POST['userId'];
    // Boolean validation variable
    $validate = true;
    // Adding several if statements to confirm proper input
    if (empty($userId)) {
        echo '<p>User Id is required.</p>';
        $validate = false;
    }
    if (empty($user)) {
        echo '<p>User is required.</p>';
        $validate = false;
    }
    // If the validation passes, then run the code:
    if ($validate) {
        // Require the database conenction
        require('includes/db.php');
        $sql = "UPDATE administrators SET username = :username WHERE userId = :userId";
        $cmd = $db->prepare($sql);
        // PDO parameters
        $cmd->bindParam(':username', $user, PDO::PARAM_STR, 255);
        $cmd->bindParam(':userId', $userId, PDO::PARAM_INT);
        $cmd->execute();
        // DB disconnect
        $db = null;
        // Confirmation message
        echo "Administrator Updated";
        header('location:admin.php');
    }
    ?>
</body>
</html>
