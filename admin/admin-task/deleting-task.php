<?php
session_start();

if (!$_SESSION) {
    header('Location: ../../index.php');
}

require '../../vendor/connect.php';

$id_task = $_GET['id'];

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

$delete = mysqli_query($conn, "DELETE FROM task WHERE id_task = '$id_task'");

header("Location: admin-tasks.php");
?>