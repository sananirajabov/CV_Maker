<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "university_cv_system";

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
mysqli_set_charset($conn, "utf8");

if (! $conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// echo "Connected successfully";
?>