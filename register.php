<?php
$title = 'Register';
require 'includes/header-b.php';
?>
<main>
    <h1>User Registration</h1>
    <h5>Passwords must be a minimum of 8 characters, 
        including 1 digit, 1 upper-case letter, and 1 lower-case letter.
    </h5>
    <form action="save-registration.php" method="POST">
        <fieldset>
            <label for="username">Username:*</label>
            <input name="username" id="username" required type="email" placeholder="johndoe@email.com" />
        </fieldset>
        <fieldset>
            <label for="password">Password:*</label>
            <input type="password" name="password" id="password" required
                   pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" />
            <img src="media/show.png" alt="Show/Hide" id="imgShowHide" onclick="showHide()" />
        </fieldset>
        <fieldset>
            <label for="confirm">Confirm Password: *</label>
            <input type="password" name="confirm" id="confirm" required
                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" onkeyup="return comparePasswords()" />
            <span id="pwMsg" class="error"></span>
        </fieldset>
        <button class="btn" onclick="return comparePasswords()">Complete Registration</button>
    </form>
</main>
<?php require('includes/footer-a.php'); ?>