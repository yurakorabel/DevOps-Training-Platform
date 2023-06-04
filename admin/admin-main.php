<?php
session_start();
require '../vendor/connect.php';

if (!$_SESSION) {
    header('Location: ../index.php');
}

$users = mysqli_query($conn, "SELECT * FROM `users` WHERE `role` IS NULL;");
$users = mysqli_fetch_all($users);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <title>Admin Users</title>
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
                    <a class="nav-link active" href="admin-main.php">Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin-post/admin-posts.php">Posts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin-task/admin-tasks.php">Tasks</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin-course/admin-courses.php">Courses</a>
                </li>
            </ul>
            <div class="header-buttons">
                <button class="btn btn-outline-secondary" type="button" onclick="location.href = '../vendor/logout.php';">Log out</button>
            </div>
        </div>
    </nav>
</header>


<main class="main-page container">
    <table class="table table-hover table-bordered">
        <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Points</th>
            <th scope="col">Редагування</th>
            <th scope="col">Видалення</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach($users as $user){
            ?>
            <tr>
                <th scope="row"><?=$user[0]?></th>
                <td><?=$user[1]?></td>
                <td><?=$user[3]?></td>
                <td><?=$user[4]?></td>
                <td><a href="admin-user/update-user.php?id=<?=$user[0]?>">Update</a></td>
                <td><a href="admin-user/deleting-user.php?id=<?=$user[0]?>">Delete</a></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
    <article class="card">
        <button class="create-task btn btn-success" style="width: 100%;" onclick="location.href='admin-user/create-user.php'">CREATE</button>
    </article>
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
<script src="../script/script.js"></script>
</body>
</html>
