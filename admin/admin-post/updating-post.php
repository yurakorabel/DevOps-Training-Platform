<?php
session_start();
require '../../vendor/connect.php';

if (!$_SESSION) {
    header('Location: ../../index.php');
}

require '../../vendor/connect.php';

$id_post = $_GET['id'];

$title = $_POST['title'];
$preview_text = $_POST['preview_text'];
$main_text = $_POST['main_text'];
$category = $_POST['category'];
$image_url = $_POST['image_url'];


$update_post = mysqli_query($conn, "UPDATE interesting SET
                                    post_image = '$image_url',
                                    post_title = '$title',
                                    post_preview_text = '$preview_text',
                                    post_main_text = '$main_text',
                                    news_category_id_interesting_category = '$category'
                                    WHERE id_post = '$id_post';");


header("Location: admin-posts.php");

?>
