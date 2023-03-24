<?php
// Creating the title and adding the public header
$title = 'Login';
require('includes/public-header.php');
?>
<main>
    <h1>Login</h1>
    <?php 
    if (!empty($_GET['valid'])) {
        echo '<h5 class="error">Invalid Login</h5>';
    }
    else {
        echo '<h5>Please enter your login information.</h5>';
    }
    ?>
    <!-- Actioning the validate.php page -->
    <form action="validate.php" method="POST">
        <fieldset>
            <label for="username">Username:</label>
            <!-- Required field and placeholder -->
            <input name="username" id="username" required type="email" placeholder="johndoe@webmail.com" />
        </fieldset>
        <fieldset>
            <label for="password">Password:</label>
            <!-- Password required -->
            <input type="password" name="password" id="password" required placeholder="********" />
        </fieldset>
        <button class="btn">Login</button>
    </form>
</main>
<!-- Adding the footer -->
<?php require('includes/footer.php'); ?>