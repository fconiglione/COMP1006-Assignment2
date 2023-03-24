<footer>
    <h5>
        <!-- BONUS HERE (see README.md): -->
<?php if (!empty($_SESSION['user'])) {
            // Allows admins to return to the control panel
            echo '<a href="content-manager.php">Admin Access</a> | ';
            // Footer details
        } ?>COMP1006 | PHP Content Manager | &copy; <?php echo date("Y"); ?> Francesco Coniglione
    </h5>
    </footer>
</body>
</html>