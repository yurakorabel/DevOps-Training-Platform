<?php
session_start();

require 'vendor/connect.php';

if ($_SESSION) {
    $user = $_SESSION['user'];
    $id_user = $user['id'];

    $user_info = mysqli_query($conn, "SELECT * FROM `users` WHERE id_users = '$id_user';");
    $user_info = mysqli_fetch_all($user_info);
}

$categories = mysqli_query($conn, "SELECT category_name, COUNT(id_post) AS post_count
                                            FROM news_category
                                            LEFT JOIN interesting ON id_interesting_category = interesting.news_category_id_interesting_category
                                            GROUP BY category_name;");
$categories = mysqli_fetch_all($categories);

$news = mysqli_query($conn, "SELECT id_post, post_image, post_title, post_preview_text, 
                                            post_main_text, category_name FROM interesting
                                    JOIN news_category ON news_category_id_interesting_category = news_category.id_interesting_category
                                    ORDER BY id_post DESC;");
$news = mysqli_fetch_all($news);

$news_count = mysqli_query($conn, "SELECT COUNT(id_post) AS total_posts FROM interesting;");
$news_count = mysqli_fetch_all($news_count);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Interesting</title>
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
                        <a class="nav-link active" href="#">Interesting</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tasks.php">Tasks</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="courses.php">Courses</a>
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
        <div class="row">
            <section class="col-md-9">
                <?php
                foreach($news as $post){
                    ?>
                    <article class="card article-js">
                        <img src="<?=$post[1]?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="newsCategory"><?=$post[5]?></p>
                            <h2 class="card-title"><?=$post[2]?></h2>
                            <p class="card-text"><?=$post[3]?></p>
                            <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#<?=$post[0]?>">Read More</button>
                        </div>
                    </article>
                    <?php
                }
                ?>
            </section>
            <aside class="col-md-3">
                <h1>Categories</h1>
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center category-wrap-js">
                        <span class="category-span-js">All</span>
                        <span class="badge bg-primary rounded-pill"><?=$news_count[0][0]?></span>
                    </li>
                    <?php
                    foreach($categories as $category){
                        ?>
                        <li class="list-group-item d-flex justify-content-between align-items-center category-wrap-js">
                            <span class="category-span-js"><?=$category[0]?></span>
                            <span class="badge bg-primary rounded-pill"><?=$category[1]?></span>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
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

    <?php
    foreach($news as $post){
        ?>
        <div class="modal fade" id="<?=$post[0]?>" tabindex="-1" aria-labelledby="modal-title" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modal-title"><?=$post[2]?></h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <img src="<?=$post[1]?>" class="card-img-top" alt="...">
                        <hr>
                        <h5><?=$post[3]?></h5>
                        <hr>
                        <p><?=$post[4]?></p>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    ?>

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