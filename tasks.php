<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Tasks</title>
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
                        <a class="nav-link active" href="#">Tasks</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="courses.php">Courses</a>
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
        <h1 class="text-center my-4">DevOps Practice Tasks</h1>

        <!-- Beginner Tasks -->
        <h2 class="mt-5">Beginner Tasks</h2>
        <div class="card-deck mt-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Task 1</h5>
                    <p class="card-text">Description of Task 1.</p>
                    <a href="#" class="btn btn-primary">Start Task</a>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Task 2</h5>
                    <p class="card-text">Description of Task 2.</p>
                    <a href="#" class="btn btn-primary">Start Task</a>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Task 3</h5>
                    <p class="card-text">Description of Task 3.</p>
                    <a href="#" class="btn btn-primary">Start Task</a>
                </div>
            </div>
        </div>

        <!-- Intermediate Tasks -->
        <h2 class="mt-5">Intermediate Tasks</h2>
        <div class="card-deck mt-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Task 4</h5>
                    <p class="card-text">Description of Task 4.</p>
                    <a href="#" class="btn btn-primary">Start Task</a>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Task 5</h5>
                    <p class="card-text">Description of Task 5.</p>
                    <a href="#" class="btn btn-primary">Start Task</a>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Task 6</h5>
                    <p class="card-text">Description of Task 6.</p>
                    <a href="#" class="btn btn-primary">Start Task</a>
                </div>
            </div>
        </div>

        <!-- Advanced Tasks -->
        <h2 class="mt-5">Advanced Tasks</h2>
        <div class="card-deck mt-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Task 7</h5>
                    <p class="card-text">Description of Task 7.</p>
                    <a href="#" class="btn btn-primary">Start Task</a>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Task 8</h5>
                    <p class="card-text">Description of Task 8.</p>
                    <a href="#" class="btn btn-primary">Start Task</a>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Task 9</h5>
                    <p class="card-text">Description of Task 9.</p>
                    <a href="#" class="btn btn-primary">Start Task</a>
                </div>
            </div>
        </div>

        <!-- Task Categories -->
        <h2 class="mt-5">Task Categories</h2>
        <div class="list-group mt-3">
            <a href="#" class="list-group-item list-group-item-action">Automation</a>
            <a href="#" class="list-group-item list-group-item-action">Containerization</a>
            <a href="#" class="list-group-item list-group-item-action">Continuous Integration and Deployment</a>
            <a href="#" class="list-group-item list-group-item-action">Monitoring and Logging</a>
            <a href="#" class="list-group-item list-group-item-action">Security</a>
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