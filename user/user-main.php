<?php
session_start();
require '../vendor/connect.php';

if (!$_SESSION) {
    header('Location: ../index.php');
}
?>

<a href="../vendor/logout.php">LOGOUT</a>


