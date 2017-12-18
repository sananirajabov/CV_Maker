<?php 
    session_start();
    include '../common/common.php';
    session_destroy();
    header("Location: " .$dir. "login_page.php");
?>