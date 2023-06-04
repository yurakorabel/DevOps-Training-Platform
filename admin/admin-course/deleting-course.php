<?php
session_start();
require '../../vendor/connect.php';

if (!$_SESSION) {
    header('Location: ../../index.php');
}

require '../../vendor/connect.php';

$id_course = $_GET['id'];

$delete = mysqli_query($conn, "DELETE FROM courses WHERE id_courses = '$id_course'");

header("Location: admin-courses.php");
?>