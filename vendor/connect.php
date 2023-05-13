<?php
$servername = "localhost:8889";
$username = "root";
$database = "devops_db";

$conn = mysqli_connect($servername, $username, "", $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>