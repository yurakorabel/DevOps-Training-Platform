<?php
session_start();
require '../../vendor/connect.php';

if (!$_SESSION) {
    header('Location: ../../index.php');
}

require '../../vendor/connect.php';

$course_difficulty_levels = mysqli_query($conn, "SELECT * FROM difficulty_level;");
$course_difficulty_levels = mysqli_fetch_all($course_difficulty_levels);

$course_categories = mysqli_query($conn, "SELECT * FROM category;");
$course_categories = mysqli_fetch_all($course_categories);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/style.css">
    <title>Admin Create Course</title>
</head>
<body>
<header class="bg-white shadow-sm">
    <nav class="navbar navbar-expand-lg navbar-light container">
        <a class="navbar-brand" href="#">DevOps Learning Platform <b>Admin</b></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../admin-main.php">Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../admin-post/admin-posts.php">Posts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../admin-task/admin-tasks.php">Tasks</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="../admin-course/admin-courses.php">Courses</a>
                </li>
            </ul>
            <div class="header-buttons">
                <button class="btn btn-outline-secondary" type="button" onclick="location.href = '../../vendor/logout.php';">Log out</button>
            </div>
        </div>
    </nav>
</header>


<main class="interesting-page task-page container">
    <div class="container">
        <form action="creating-course.php" method="POST">
            <div class="form-group">
                <label for="exampleInputPassword1">Course Title</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="title" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Course Overview</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="overview_text" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Award Points</label>
                <input type="number" class="form-control" id="exampleInputPassword1" name="award_points" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Difficulty Level</label>
                <select class="form-control" id="exampleFormControlSelect1" name="difficulty_level">
                    <?php
                    foreach($course_difficulty_levels as $course_difficulty_level){
                        ?>
                        <option value="<?=$course_difficulty_level[0]?>"><?=$course_difficulty_level[1]?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Category</label>
                <select class="form-control" id="exampleFormControlSelect1" name="category">
                    <?php
                    foreach($course_categories as $course_category){
                        ?>
                        <option value="<?=$course_category[0]?>"><?=$course_category[1]?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Image URL</label>
                <input type="url" class="form-control" id="exampleInputPassword1" name="image_url" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1"><h5>Outlines</h5></label>
                <hr>
                <div id="outlines-container">
                    <div class="outline-input">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Module Title</label>
                            <input type="text" class="form-control" name="module_title[]" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Module Content</label>
                            <input type="text" class="form-control" name="module_content[]" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Question</label>
                            <input type="text" class="form-control" name="question[]" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Option A</label>
                            <input type="text" class="form-control" name="option_a[]" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Option B</label>
                            <input type="text" class="form-control" name="option_b[]" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Option C</label>
                            <input type="text" class="form-control" name="option_c[]" required>
                        </div>
                        <div class="form-group">
                            <label for="question">Correct Option:</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="correct_answer_a[]" id="answer-a" value="a">
                                <label class="form-check-label" for="answer-a">A</label>
                                <input class="form-check-input" type="radio" name="correct_answer_b[]" id="answer-b" value="b">
                                <label class="form-check-label" for="answer-b">B</label>
                                <input class="form-check-input" type="radio" name="correct_answer_c[]" id="answer-c" value="c">
                                <label class="form-check-label" for="answer-c">C</label>
                            </div>
                        </div>
                        <button type="button" class="remove-outline btn btn-danger">Remove</button>
                    </div>
                </div>
                <button type="button" class="add-outline btn btn-primary mt-2">Add Outline</button>
            </div>

            <button type="submit" class="create-task btn btn-success" style="width: 100%;">Create Course</button>
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

<!-- jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="../../script/script.js"></script>
</body>
</html>
