<?php
session_start();

require 'vendor/connect.php';

if ($_SESSION) {
    $user = $_SESSION['user'];
    $id_user = $user['id'];

    $user_info = mysqli_query($conn, "SELECT * FROM `users` WHERE id_users = '$id_user';");
    $user_info = mysqli_fetch_all($user_info);
}

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
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">Main</a>
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


    <main class="main-page container">
        <section class="banner">
            <div class="banner-text">
                <h1>Welcome to the DevOps Learning Platform</h1>
                <p>Master the skills you need to succeed in the fast-paced world of DevOps</p>
                <?php
                if (!$_SESSION) { ?>
                    <button class="btn btn-warning banner-text-button" type="button" data-bs-toggle="modal" data-bs-target="#signupModal">Start Learning</button>
                    <?php
                }
                else { ?>
                    <button class="btn btn-warning banner-text-button" type="button" onclick="location.href = 'courses.php';">Start Learning</button>
                    <?php
                }
                ?>
            </div>
        </section>

        <section class="features">
            <div class="row">
                <div class="col-md-4">
                    <div class="feature">
                        <i class="bi bi-cpu"></i>
                        <h3>Up-to-Date Content</h3>
                        <p>Stay ahead in the fast-paced world of DevOps with our platform's up-to-date content. Regularly updated news posts, practice tasks, and training courses ensure that you're equipped with the latest industry trends and practices. Gain the skills that are in demand and stay relevant in your DevOps journey.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature">
                        <i class="bi bi-calendar"></i>
                        <h3>Time Management Made Easy</h3>
                        <p>Take control of your learning with our flexible scheduling feature, empowering you to effectively manage your time and balance other responsibilities alongside your DevOps education. Enjoy the convenience of learning when it fits into your schedule, making your learning journey seamless and stress-free.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature">
                        <i class="bi bi-globe"></i>
                        <h3>Diverse Learning Materials</h3>
                        <p>With a wide range of posts, tasks, and courses, this platform offers diverse learning materials catering to different levels and categories of DevOps. It ensures that learners can explore various topics and choose what suits their interests and goals.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="courses">
            <h2>Popular Courses</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <img src="images/ItSvit_DevOps-business-value-and-advantages_Cover_1-1-1.png" class="card-img-top" alt="Course 1">
                        <div class="card-body">
                            <h5 class="card-title">Introduction to DevOps</h5>
                            <p class="card-text">Learn the basics of DevOps, including continuous integration and delivery, with hands-on projects.</p>
                            <?php
                            if (!$_SESSION) { ?>
                                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#signupModal">Enroll Now</button>
                                <?php
                            }
                            else { ?>
                                <button class="btn btn-primary" type="button" onclick="location.href = 'course-page.php?id=1&module=1';">Enroll Now</button>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="images/cover.png" class="card-img-top" alt="Course 2">
                        <div class="card-body">
                            <h5 class="card-title">Docker Fundamentals</h5>
                            <p class="card-text">Master containerization with Docker, from building images to deploying and scaling applications.</p>
                            <?php
                            if (!$_SESSION) { ?>
                                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#signupModal">Enroll Now</button>
                                <?php
                            }
                            else { ?>
                                <button class="btn btn-primary" type="button" onclick="location.href = 'course-page.php?id=1&module=1';">Enroll Now</button>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="images/OnDemandWebinar-Kubernetes-KeyGraphic-@2x-768x422.png" class="card-img-top" alt="Course 3">
                        <div class="card-body">
                            <h5 class="card-title">Kubernetes Essentials</h5>
                            <p class="card-text">Learn how to deploy and manage applications in a Kubernetes cluster, including scaling and autohealing.</p>
                            <?php
                            if (!$_SESSION) { ?>
                                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#signupModal">Enroll Now</button>
                                <?php
                            }
                            else { ?>
                                <button class="btn btn-primary" type="button" onclick="location.href = 'course-page.php?id=1&module=1';">Enroll Now</button>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="testimonials">
            <h2>What Our Users Say</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="testimonial">
                        <p>"This DevOps learning platform has revolutionized my understanding of the subject. The interactive tasks and comprehensive courses have truly enhanced my skills and boosted my confidence in implementing DevOps practices. Highly recommended!"</p>
                        <p class="testimonial-author">- Emily W.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="testimonial">
                        <p>"I can't thank the DevOps learning platform enough for its user-friendly interface and practical approach. The hands-on tasks allowed me to apply what I learned immediately, making the learning process engaging and effective. A game-changer for aspiring DevOps professionals!"</p>
                        <p class="testimonial-author">- Jessica T.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="testimonial">
                        <p>"The DevOps learning platform exceeded my expectations! The vast array of resources, including tutorials, and real-world examples, made the concepts easy to grasp. The progress tracking feature motivated me to keep pushing forward. It's a must-have for anyone serious about DevOps"</p>
                        <p class="testimonial-author">- Alex S.</p>
                    </div>
                </div>
            </div>
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