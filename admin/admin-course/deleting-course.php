<?php

require '../../vendor/connect.php';

$id_course = $_GET['id'];

$delete = mysqli_query($conn, "DELETE FROM courses WHERE id_courses = '$id_course'");

header("Location: admin-courses.php");
?>