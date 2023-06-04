<?php
session_start();

if (!$_SESSION) {
    header('Location: index.php');
}

require 'vendor/connect.php';

if ($_SESSION) {
    $user = $_SESSION['user'];
    $id_user = $user['id'];

    $user_info = mysqli_query($conn, "SELECT * FROM `users` WHERE id_users = '$id_user';");
    $user_info = mysqli_fetch_all($user_info);
}

$id_course = $_GET['id'];
$module_position = $_GET['module'];

$course_tickets = mysqli_query($conn, "SELECT course_title, course_overview, course_image, award_points, level_name, category_name 
                                        FROM courses
                                        JOIN difficulty_level ON difficulty_level_id_difficulty_level = difficulty_level.id_difficulty_level
                                        JOIN category ON category_id_category = category.id_category
                                        WHERE id_courses = '$id_course';");
$course_tickets = mysqli_fetch_all($course_tickets);

$outline = mysqli_query($conn, "SELECT id_course_outlines, module_title, module_content, id_questions, question_text
                                        FROM questions
                                        JOIN course_outlines ON course_outlines_id_course_outlines = course_outlines.id_course_outlines
                                        WHERE course_outlines_courses_id_courses = '$id_course'
                                        AND module_position = '$module_position';");
$outline = mysqli_fetch_all($outline);

$id_question = $outline[0][3];
$id_course_outline = $outline[0][0];

$question_options = mysqli_query($conn, "SELECT * FROM question_option 
                                                WHERE questions_id_questions = '$id_question'
                                                AND questions_course_outlines_id_course_outlines = '$id_course_outline'
                                                AND questions_course_outlines_courses_id_courses = '$id_course';");
$question_options = mysqli_fetch_all($question_options);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title><?=$course_tickets[0][0]?></title>
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
                    <a class="nav-link" href="tasks.php">Tasks</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="courses.php">Courses</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="user-table.php">TOP</a>
                </li>
            </ul>
            <div class="header-buttons">
                <?php
                if (!$_SESSION) { ?>
                    <button class="btn btn-outline-secondary" type="button" data-bs-toggle="modal" data-bs-target="#loginModal">Log in</button>
                    <button class="btn btn-outline-secondary" type="button" data-bs-toggle="modal" data-bs-target="#signupModal">Sign up</button>
                    <?php
                }
                else { ?>
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?=$user_info[0][1]?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><p class="dropdown-item"><?=$user_info[0][1]?></p></li>
                                <li><p class="dropdown-item">My points: <?=$user_info[0][4]?></p></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="vendor/logout.php">Log out</a></li>
                            </ul>
                        </li>
                    </ul>
                    <?php
                }
                ?>
            </div>

        </div>
    </nav>
</header>


<main class="interesting-page container">
    <div class="container">
        <button class="btn btn-primary" style="float: right;" type="button" onclick="location.href='courses.php'">Turn Back</button>
        <h1><?=$course_tickets[0][0]?></h1>
        <hr>
        <h2><?=$module_position?>. <?=$outline[0][1]?></h2>
        <p><?=$outline[0][2]?></p>
        <hr>
        <form>
            <div class="form-group">
                <label for="question"><?=$outline[0][4]?></label>
                <?php
                foreach ($question_options as $question_option){
                    ?>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="answer" id="answer-a" value="<?=$question_option[2]?>">
                        <label class="form-check-label" for="answer-a">
                            <?=$question_option[1]?>
                        </label>
                    </div>
                    <?php
                }
                ?>
            </div>
            <hr>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
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