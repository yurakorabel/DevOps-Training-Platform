<?php
session_start();
require 'connect.php';

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$check = mysqli_num_rows(mysqli_query(
    $conn,
    "SELECT * FROM `users` WHERE `email` = '$email' OR `username` = '$username'"
));

if ($check == 0) {
    $add = mysqli_query($conn, "INSERT INTO users
                                        (username, password, email, award)
                                        VALUES ('$username', '$password', '$email', 0);");

    $user = mysqli_fetch_assoc(mysqli_query(
        $conn,
        "SELECT * FROM `users` WHERE `email` = '$email'"
    ));

    $_SESSION['user'] = [
        "id" => $user['id_users'],
        "username" => $user['username'],
        "email" => $user['email'],
        "award" => $user['award']
    ];
    header('Location: ../user/user-main.php');
}
else{
//    $_SESSION['message'] = "This email or username is already registered!";
    header('Location: ../index.php');
}

?>
