<?php
session_start();

if (!$_SESSION) {
    header('Location: ../../index.php');
}

require '../../vendor/connect.php';

$id_task = $_GET['id'];

$title = $_POST['title'];
$preview_text = $_POST['preview_text'];
$final_text = $_POST['final_text'];
$difficulty_level = $_POST['difficulty_level'];
$category = $_POST['category'];
$requirements = $_POST['requirement'];
$steps = $_POST['step'];


$update_task = mysqli_query($conn, "UPDATE task SET 
                                    task_title = '$title',
                                    task_preview_text = '$preview_text', 
                                    task_final_text = '$final_text',
                                    difficulty_level_id_difficulty_level = '$difficulty_level', 
                                    category_id_category = '$category' 
                                    WHERE id_task = '$id_task';");


$ids_requirements = mysqli_query($conn, "SELECT id_task_requirements FROM task_requirements 
                                                WHERE task_id_task = '$id_task';");

foreach ($ids_requirements as $id_requirement){
    $id_requirement_temp = $id_requirement['id_task_requirements'];
    $delete_requirement = mysqli_query($conn, "DELETE FROM task_requirements 
                                                        WHERE id_task_requirements = '$id_requirement_temp'");
}

$ids_steps = mysqli_query($conn, "SELECT id_task_steps FROM task_steps 
                                        WHERE task_id_task = '$id_task';");

foreach ($ids_steps as $id_step){
    $id_step_temp = $id_step['id_task_steps'];
    $delete_step = mysqli_query($conn, "DELETE FROM task_steps 
                                                        WHERE id_task_steps = '$id_step_temp'");
}


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