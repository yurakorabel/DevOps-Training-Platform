<?php
session_start();
require '../../vendor/connect.php';

if (!$_SESSION) {
    header('Location: ../../index.php');
}

require '../../vendor/connect.php';

$title = $_POST['title'];
$preview_text = $_POST['preview_text'];
$final_text = $_POST['final_text'];
$difficulty_level = $_POST['difficulty_level'];
$category = $_POST['category'];
$requirements = $_POST['requirement'];
$steps = $_POST['step'];


$add = mysqli_query($conn, "INSERT INTO task 
    (task_title, task_preview_text, task_final_text, difficulty_level_id_difficulty_level, category_id_category) 
    VALUES ('$title', '$preview_text', '$final_text', '$difficulty_level', '$category');");

$last_id =  mysqli_query($conn, "SELECT id_task FROM task ORDER BY id_task DESC LIMIT 1;");
$last_id = mysqli_fetch_all($last_id);
$last_id = $last_id[0][0];


$requirement_position = 1;
foreach ($requirements as $requirement){
    $insert_requirement = mysqli_query($conn, "INSERT INTO task_requirements 
                                                    (requirement_position, requirement_text, task_id_task)
                                                    VALUES ('$requirement_position', '$requirement', '$last_id');");
    $requirement_position++;
}

$step_position = 1;
foreach ($steps as $step){
    $insert_step = mysqli_query($conn, "INSERT INTO task_steps 
                                                    (step_position, step_text, task_id_task)
                                                    VALUES ('$step_position', '$step', '$last_id');");
    $step_position++;
}

header("Location: admin-tasks.php");

?>