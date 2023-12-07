<?php
    // Remove the cookie for persistent login
    setcookie('username', '', time() - 3600, '/');
    header("Location: home.php"); // Redirect to the login page
    exit();
?>
