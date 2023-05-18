<?php
require 'vendor/connect.php';

$id_task = $_GET['id'];

$task_ticket = mysqli_query($conn, "SELECT task_title, task_preview_text, task_final_text, level_name, category_name FROM task
                                        JOIN difficulty_level ON difficulty_level_id_difficulty_level = difficulty_level.id_difficulty_level
                                        JOIN category ON category_id_category = category.id_category
                                        WHERE id_task = '$id_task';");
$task_ticket = mysqli_fetch_all($task_ticket);

$task_requirements = mysqli_query($conn, "SELECT * FROM task_requirements WHERE task_id_task = '$id_task'
                                                ORDER BY requirement_position;");
$task_requirements = mysqli_fetch_all($task_requirements);

$task_steps = mysqli_query($conn, "SELECT * FROM task_steps WHERE task_id_task = '$id_task'
                                            ORDER BY step_position;");
$task_steps = mysqli_fetch_all($task_steps);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Tasks</title>
</head>
<body>
<header class="bg-white shadow-sm">
    <nav class="navbar navbar-expand-lg navbar-light container">
        <a class="navbar-brand" href="#">DevOps Learning Platform</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Main</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="interesting.php">Interesting</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="tasks.php">Tasks</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="courses.php">Courses</a>
                </li>
            </ul>
            <div class="header-buttons">
                <button class="btn btn-outline-secondary" type="button" data-bs-toggle="modal" data-bs-target="#loginModal">Log in</button>
                <button class="btn btn-outline-secondary" type="button" data-bs-toggle="modal" data-bs-target="#signupModal">Sign up</button>
            </div>

        </div>
    </nav>
</header>


<main class="interesting-page container">
    <div class="container">
        <h1><?=$task_ticket[0][0]?></h1>
        <div class="card">
            <div class="card-body">
                <h6 class="card-subtitle mb-2 text-muted">Difficulty level: <?=$task_ticket[0][3]?></h6>
                <h6 class="card-subtitle mb-2 text-muted">Category: <?=$task_ticket[0][4]?></h6>
                <hr>
                <p class="card-text">Task: <?=$task_ticket[0][0]?></p>
                <p class="card-text"><?=$task_ticket[0][1]?></p>
                <h5 class="mt-4">Requirements:</h5>
                <ul class="list-group">
                    <?php
                    foreach($task_requirements as $task_requirement){
                        ?>
                        <li class="list-group-item">- <?=$task_requirement[2]?></li>
                        <?php
                    }
                    ?>
                </ul>
                <h5 class="mt-4">Steps:</h5>
                <ol class="list-group">
                    <?php
                    $step_num = 1;
                    foreach($task_steps as $task_step){
                        ?>
                        <li class="list-group-item"><?=$step_num?>. <?=$task_step[2]?></li>
                        <?php
                        $step_num++;
                    }
                    ?>
                </ol>
                <p class="mt-4"><?=$task_ticket[0][2]?></p>
                <hr>
                <button class="btn btn-primary" type="button" onclick="location.href='tasks.php'">turn back</button>
            </div>
        </div>
    </div>
</main>


<footer class="footer mt-auto pt-3 pb-0 bg-dark text-light">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <p>&copy; 2023 DevOps Learning Platform</p>
            </div>
            <div class="col-md-6">
                <p class="text-end">Made with &hearts; by <a href="#">Yura Korabel</a></p>
            </div>
        </div>
    </div>
</footer>

<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Log in</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-container">
                    <div class="form-header">
                        <h2>Login Form</h2>
                    </div>
                    <input type="text" class="form-input" placeholder="Email">
                    <input type="password" class="form-input" placeholder="Password">
                    <button type="submit" class="form-submit">Login</button>
                    <a href="#" class="form-link" data-bs-toggle="modal" data-bs-target="#signupModal">Create an account</a>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-secondary log-in-btn">Log in</button>
            </div>
        </div>
    </div>
</div>

<!-- Sign up Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signupModalLabel">Sign up</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-container">
                    <div class="form-header">
                        <h2>Sign Up Form</h2>
                    </div>
                    <input type="text" class="form-input" placeholder="Name">
                    <input type="text" class="form-input" placeholder="Email">
                    <input type="password" class="form-input" placeholder="Password">
                    <button type="submit" class="form-submit">Sign Up</button>
                    <a href="#" class="form-link" data-bs-toggle="modal" data-bs-target="#loginModal">Already have an account?</a>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-secondary log-in-btn">Sign up</button>
            </div>
        </div>
    </div>
</div>


<!-- Bootstrap JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="script/script.js"></script>
</body>
</html>