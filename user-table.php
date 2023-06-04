<?php
session_start();

require 'vendor/connect.php';

if ($_SESSION) {
    $user = $_SESSION['user'];
    $id_user = $user['id'];

    $user_info = mysqli_query($conn, "SELECT * FROM `users` WHERE id_users = '$id_user';");
    $user_info = mysqli_fetch_all($user_info);
}

$users = mysqli_query($conn, "SELECT * FROM `users` WHERE role IS NULL ORDER BY award DESC LIMIT 10;");
$users = mysqli_fetch_all($users);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>DevOps Training Platform</title>
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
                        <a class="nav-link" href="courses.php">Courses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">TOP</a>
                    </li>
                </ul>
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


<main class="main-page container">
    <section class="courses">
        <h2>Top 10 Users</h2>
        <table class="table table-hover table-bordered">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Username</th>
                <th scope="col">Points</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach($users as $user){
                ?>
                <tr>
                    <td><?=$user[1]?></td>
                    <td><?=$user[4]?></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </section>
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
                <form class="form-container" action="vendor/login.php" method="POST">
                    <div class="form-header">
                        <h2>Login Form</h2>
                    </div>
                    <input type="text" class="form-input" placeholder="Email" name="email">
                    <input type="password" class="form-input" placeholder="Password" name="password">
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
                <form class="form-container" action="vendor/signup.php" method="POST">
                    <div class="form-header">
                        <h2>Sign Up Form</h2>
                    </div>
                    <input type="text" class="form-input" placeholder="Name" name="username">
                    <input type="email" class="form-input" placeholder="Email" name="email">
                    <input type="password" class="form-input" placeholder="Password" name="password">
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