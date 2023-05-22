<?php
require '../../vendor/connect.php';

$task_difficulty_levels = mysqli_query($conn, "SELECT * FROM difficulty_level;");
$task_difficulty_levels = mysqli_fetch_all($task_difficulty_levels);

$task_categories = mysqli_query($conn, "SELECT * FROM category;");
$task_categories = mysqli_fetch_all($task_categories);

$task_tickets = mysqli_query($conn, "SELECT id_task, task_title, task_preview_text, task_final_text, level_name, category_name FROM task
                                        JOIN difficulty_level ON difficulty_level_id_difficulty_level = difficulty_level.id_difficulty_level
                                        JOIN category ON category_id_category = category.id_category
                                        ORDER BY id_task DESC ;");
$task_tickets = mysqli_fetch_all($task_tickets);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/style.css">
    <title>Admin Tasks</title>
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
                    <a class="nav-link active" href="../admin-task/admin-tasks.php">Tasks</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../admin-course/admin-courses.php">Courses</a>
                </li>
            </ul>
            <div class="header-buttons">
                <button class="btn btn-outline-secondary" type="button" data-bs-toggle="modal" data-bs-target="#loginModal">Log in</button>
                <button class="btn btn-outline-secondary" type="button" data-bs-toggle="modal" data-bs-target="#signupModal">Sign up</button>
            </div>
        </div>
    </nav>
</header>


<main class="interesting-page task-page container">
    <h1 class="title not-found-js" style="display: none;">No tasks found by theese criterias.</h1>

    <div class="row">
        <section class="col-md-9">
            <article class="card">
                <button class="create-task btn btn-success" style="width: 100%;" onclick="location.href='create-task.php'">CREATE</button>
            </article>
            <?php
            foreach($task_tickets as $task_ticket){
                ?>
                <article class="card article-js task-js">
                    <div class="card-body">
                        <h1 class="card-title"><?=$task_ticket[1]?></h1>
                        <p class="card-text"><?=$task_ticket[2]?></p>
                        <hr>
                        <h6 class="card-subtitle mb-2 text-muted">Difficulty level: <span class="task-diff-js"><?=$task_ticket[4]?></span></h6>
                        <h6 class="card-subtitle mb-2 text-muted">Category: <span class="task-cat-js"><?=$task_ticket[5]?></span></h6>
                        <br>
                        <div class="vitalik d-flex justify-content-between">
                            <button class="btn btn-primary" type="button" onclick="location.href='update-task.php?id=<?=$task_ticket[0]?>'">Update Task</button>
                            <button class="delete-button" type="button" onclick="location.href='deleting-task.php?id=<?=$task_ticket[0]?>'">&#x2716;</button>
                        </div>
                    </div>
                </article>
                <?php
            }
            ?>
        </section>
        <aside class="col-md-3">
            <h1 class="mb-3">Filter</h1>
            <div class="form-group">
                <label for="difficulty" class="form-label">Difficulty level:</label>
                <select class="form-select" id="difficulty">
                    <option value="All">All</option>
                    <?php
                    foreach($task_difficulty_levels as $task_difficulty_level){
                        ?>
                        <option value="<?=$task_difficulty_level[1]?>" class="difficulty-level-js"><?=$task_difficulty_level[1]?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="technology" class="form-label">Category:</label>
                <select class="form-select" id="technology">
                    <option value="All">All</option>
                    <?php
                    foreach($task_categories as $task_category){
                        ?>
                        <option value="<?=$task_category[1]?>" class="task-category-js"><?=$task_category[1]?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <button class="btn btn-primary mt-2 filter-button">Filter</button>
        </aside>
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
<script src="../../script/script.js"></script>
</body>
</html>
