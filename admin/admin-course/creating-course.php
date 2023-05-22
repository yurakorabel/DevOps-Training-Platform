<?php

require '../../vendor/connect.php';

$title = $_POST['title'];
$overview_text = $_POST['overview_text'];
$award_points = $_POST['award_points'];
$difficulty_level = $_POST['difficulty_level'];
$category = $_POST['category'];
$image_url = $_POST['image_url'];


$add = mysqli_query($conn, "INSERT INTO courses
    (course_title, course_overview, course_image, award_points, difficulty_level_id_difficulty_level, category_id_category) 
    VALUES ('$title', '$overview_text', '$image_url', '$award_points', '$difficulty_level', '$category');");


header("Location: admin-courses.php");

?>