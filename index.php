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
                        <a class="nav-link active" href="#">Main</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Interesting</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Tasks</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Courses</a>
                    </li>
                </ul>
                <div class="header-buttons">
                    <button class="btn btn-outline-secondary" type="button" data-bs-toggle="modal" data-bs-target="#loginModal">Log in</button>
                    <button class="btn btn-outline-secondary" type="button" data-bs-toggle="modal" data-bs-target="#signupModal">Sign up</button>
                </div>

            </div>
        </nav>
    </header>

    <main class="container">
        <section class="banner">
            <div class="banner-text">
                <h1>Welcome to the DevOps Learning Platform</h1>
                <p>Master the skills you need to succeed in the fast-paced world of DevOps</p>
                <button class="btn btn-warning banner-text-button">Start Learning</button>
            </div>
        </section>

        <section class="features">
            <div class="row">
                <div class="col-md-4">
                    <div class="feature">
                        <i class="bi bi-cpu"></i>
                        <h3>Hands-on Learning</h3>
                        <p>Our platform offers real-world projects and simulations that help you build practical skills.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature">
                        <i class="bi bi-calendar"></i>
                        <h3>Flexible Scheduling</h3>
                        <p>You can learn at your own pace and on your own schedule, with access to our platform 24/7.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature">
                        <i class="bi bi-globe"></i>
                        <h3>Global Community</h3>
                        <p>Connect with other learners from around the world and collaborate on projects and challenges.</p>
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
                            <a href="#" class="btn btn-primary">Enroll Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="images/cover.png" class="card-img-top" alt="Course 2">
                        <div class="card-body">
                            <h5 class="card-title">Docker Fundamentals</h5>
                            <p class="card-text">Master containerization with Docker, from building images to deploying and scaling applications.</p>
                            <a href="#" class="btn btn-primary">Enroll Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="images/OnDemandWebinar-Kubernetes-KeyGraphic-@2x-768x422.png" class="card-img-top" alt="Course 3">
                        <div class="card-body">
                            <h5 class="card-title">Kubernetes Essentials</h5>
                            <p class="card-text">Learn how to deploy and manage applications in a Kubernetes cluster, including scaling and autohealing.</p>
                            <a href="#" class="btn btn-primary">Enroll Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="testimonials">
            <h2>What Our Students Say</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="testimonial">
                        <p>"I loved my experience at this school. The teachers were knowledgeable and supportive, and the classes were challenging but manageable. I feel well-prepared for my future career thanks to this school."</p>
                        <p class="testimonial-author">- Emily W.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="testimonial">
                        <p>"This school exceeded my expectations in every way. The facilities were top-notch, the professors were passionate and engaging, and the coursework was rigorous but rewarding. I would highly recommend this school to anyone looking to further their education."</p>
                        <p class="testimonial-author">- Jessica T.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="testimonial">
                        <p>"I was hesitant to enroll in this school at first, but I'm so glad I did. The curriculum was comprehensive and the instructors were great at explaining complex topics. I learned so much and feel confident in my abilities now."</p>
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