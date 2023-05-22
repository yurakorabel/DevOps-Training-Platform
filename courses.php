<?php
require 'vendor/connect.php';

$course_difficulty_levels = mysqli_query($conn, "SELECT * FROM difficulty_level;");
$course_difficulty_levels = mysqli_fetch_all($course_difficulty_levels);

$course_categories = mysqli_query($conn, "SELECT * FROM category;");
$course_categories = mysqli_fetch_all($course_categories);

$course_tickets = mysqli_query($conn, "SELECT id_courses, course_title, course_overview, course_image, level_name, category_name FROM courses
                                        JOIN difficulty_level ON difficulty_level_id_difficulty_level = difficulty_level.id_difficulty_level
                                        JOIN category ON category_id_category = category.id_category
                                        ORDER BY id_courses DESC ;");
$course_tickets = mysqli_fetch_all($course_tickets);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Courses</title>
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
                        <a class="nav-link active" href="#">Courses</a>
                    </li>
                </ul>
                <div class="header-buttons">
                    <button class="btn btn-outline-secondary" type="button" data-bs-toggle="modal" data-bs-target="#loginModal">Log in</button>
                    <button class="btn btn-outline-secondary" type="button" data-bs-toggle="modal" data-bs-target="#signupModal">Sign up</button>
                </div>

            </div>
        </nav>
    </header>


    <main class="container task-page">
        <div class="row">
            <section class="col-md-9">
                <?php
                foreach($course_tickets as $course_ticket){
                    ?>
                    <article class="card article-js task-js">
                        <div class="card-body">
                            <img src="<?=$course_ticket[3]?>" class="card-img-top" alt="Course 2">
                            <div class="card-body">
                                <h5 class="card-title"><?=$course_ticket[1]?></h5>
                                <p class="card-text"><?=$course_ticket[2]?></p>
                                <hr>
                                <h6 class="card-subtitle mb-2 text-muted">Difficulty level: <span class="task-diff-js"><?=$course_ticket[4]?></span></h6>
                                <h6 class="card-subtitle mb-2 text-muted">Category: <span class="task-cat-js"><?=$course_ticket[5]?></span></h6>
                                <br>
                                <button class="btn btn-primary" type="button" onclick="location.href='course-page.php?id=<?=$course_ticket[0]?>&module=1'">Enroll Now!</button>
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
                        foreach($course_difficulty_levels as $course_difficulty_level){
                            ?>
                            <option value="<?=$course_difficulty_level[1]?>" class="difficulty-level-js"><?=$course_difficulty_level[1]?></option>
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
                        foreach($course_categories as $course_category){
                            ?>
                            <option value="<?=$course_category[1]?>" class="task-category-js"><?=$course_category[1]?></option>
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
    <script src="script/script.js"></script>
</body>
</html>