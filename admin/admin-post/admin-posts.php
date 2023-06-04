<?php
session_start();
require '../../vendor/connect.php';

if (!$_SESSION) {
    header('Location: ../../index.php');
}

require '../../vendor/connect.php';

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
    <link rel="stylesheet" href="../../css/style.css">
    <title>Admin Posts</title>
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
                    <a class="nav-link active" href="../admin-post/admin-posts.php">Posts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../admin-task/admin-tasks.php">Tasks</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Courses</a>
                </li>
            </ul>
            <div class="header-buttons">
                <button class="btn btn-outline-secondary" type="button" onclick="location.href = '../../vendor/logout.php';">Log out</button>
            </div>
        </div>
    </nav>
</header>


<main class="interesting-page container">
    <div class="row">
        <section class="col-md-9">
            <article class="card">
                <button class="create-task btn btn-success" style="width: 100%;" onclick="location.href='create-post.php'">CREATE</button>
            </article>
            <?php
            foreach($news as $post){
                ?>
                <article class="card article-js">
                    <img src="<?=$post[1]?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="newsCategory"><?=$post[5]?></p>
                        <h2 class="card-title"><?=$post[2]?></h2>
                        <p class="card-text"><?=$post[3]?></p>
                        <div class="vitalik d-flex justify-content-between">
                            <button class="btn btn-primary" type="button" onclick="location.href='update_post.php?id=<?=$post[0]?>'">Update Post</button>
                            <button class="delete-button" type="button" onclick="location.href='deleting-post.php?id=<?=$post[0]?>'">&#x2716;</button>
                        </div>
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
                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#<?=$post[0]?>">New Category</button>
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

<!-- Bootstrap JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="../../script/script.js"></script>
</body>
</html>
