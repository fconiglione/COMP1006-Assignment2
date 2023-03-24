<footer>
    <h5>
<?php if (!empty($_SESSION['user'])) {
            // Allows admins to return to the control panel
            echo '<a href="content-manager.php">Admin Access</a> | ';
        } ?>COMP1006 | PHP Content Manager | &copy; <?php echo date("Y"); ?> Francesco Coniglione
    </h5>
    </footer>
</body>
</html>