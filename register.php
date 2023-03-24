<?php
// Adding the title
$title = 'Register';
// Connecting the public header
require('includes/public-header.php');
?>
<main>
    <h1>User Registration</h1>
    <!-- Displaying password requirements -->
    <h5>Password must be at least 8 characters long and contain at least one digit, one lowercase letter, one uppercase letter, and one special character.</h5>
    <!-- Actioning the save-registration.php when submitted -->
    <form action="save-registration.php" method="POST">
        <fieldset>
            <label for="username">Username:*</label>
            <!-- Required field in an email format -->
            <input name="username" id="username" required type="email" placeholder="johndoe@email.com" />
        </fieldset>
        <fieldset>
            <label for="password">Password:*</label>
            <!-- Required field with unique password requirements -->
            <input type="password" name="password" id="password" required
                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*\W).{8,}" />
                <!-- From in-class exercises -->
            <img src="media/show.png" alt="Show/Hide" id="imgShowHide" onclick="showHide()" />
        </fieldset>
        <fieldset>
            <label for="confirm">Confirm Password: *</label>
            <input type="password" name="confirm" id="confirm" required
                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*\W).{8,}" onkeyup="return comparePasswords()" />
                <!-- From in-class exercises -->
            <span id="pwMsg" class="error"></span>
        </fieldset>
        <!-- From in-class exercises -->
        <button class="btn" onclick="return comparePasswords()">Complete Registration</button>
    </form>
</main>
<!-- Adding the footer -->
<?php require('includes/footer.php'); ?>