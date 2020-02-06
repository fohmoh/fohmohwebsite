<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
unset($_SESSION['loggedin']);
unset($_SESSION['name']);
header('Location: login.php');

?>