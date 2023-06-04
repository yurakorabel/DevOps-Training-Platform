<?php
session_start();
require '../../vendor/connect.php';

if (!$_SESSION) {
    header('Location: ../../index.php');
}

require '../../vendor/connect.php';

$id_post = $_GET['id'];

$delete = mysqli_query($conn, "DELETE FROM interesting WHERE id_post = '$id_post'");

header("Location: admin-posts.php");
?>