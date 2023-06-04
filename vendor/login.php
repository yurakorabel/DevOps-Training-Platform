<?php
session_start();
require_once "connect.php";

$email = $_POST['email'];
$password = $_POST['password'];

$password_check = mysqli_fetch_assoc(mysqli_query(
    $conn,
    "SELECT `password` FROM `users` WHERE `email` = '$email'"
));
$password_check = $password_check['password'];

if ($password == $password_check) {
    $user = mysqli_fetch_assoc(mysqli_query(
        $conn,
        "SELECT * FROM `users` WHERE `email` = '$email'"
    ));

    if ($user['role'] == 1){
        $_SESSION['user'] = ["username" => $user['username']];
        header('Location: ../admin/admin-main.php');
    }
    else{
        $_SESSION['user'] = [
            "id" => $user['id_users'],
            "username" => $user['username'],
            "email" => $user['email'],
            "award" => $user['award']
        ];
        header('Location: ../index.php');
    }
}
else{
//    $_SESSION['message'] = "Not the correct login or password!";
    echo "error";
    header('Location: ../index.php');
}
?>