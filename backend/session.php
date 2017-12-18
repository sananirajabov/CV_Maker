<?php
session_start();

if (empty($_SESSION['userid'])) {
    header("Location: " . $dir . "login_page.php");
    die();
}
?>