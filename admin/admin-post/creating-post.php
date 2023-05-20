<?php

require '../../vendor/connect.php';

$title = $_POST['title'];
$preview_text = $_POST['preview_text'];
$main_text = $_POST['main_text'];
$category = $_POST['category'];
$image_url = $_POST['image_url'];


$add = mysqli_query($conn, "INSERT INTO interesting 
    (post_image, post_title, post_preview_text, post_main_text, news_category_id_interesting_category) 
    VALUES ('$image_url', '$title', '$preview_text', '$main_text', '$category');");


header("Location: admin-posts.php");

?>