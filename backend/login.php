<?php 
session_start();
include 'common/common.php';
include 'database/database_connection.php';

if(!empty($_SESSION['userid'])){
    if($_SESSION['userid'] != ""){
        header("Location: " .$dir. "index.php");
        die();
    }
}

if(isset($_POST['email'])) $email = clearInput($_POST['email']);
else $email = "";
if(isset($_POST['password'])) $password = clearInput($_POST['password']);
else $password = "";

$error = "";

if(isset($_POST['submit'])){
    if(checkFields($email, $password)){
        validateEmailAndPassword($email, $password, $conn);
    }else{
        $error = "Fill Inputs";
    }
}

function checkFields($email, $password){
    if(!empty($email) && !empty($password)){
        return true;
    }
    
    return false;
}

function validateEmailAndPassword($email, $password, $conn){
    $query = "SELECT * FROM user";
    $result = mysqli_query($conn, $query);
    $found = false;
    $userid = "";
    
    while($row = mysqli_fetch_assoc($result)){
        if($row['email'] == $email && $row['password'] == $password){
            $found = true;
            $userid = $row['user_id'];
            break;
        }
    }
    
    if($found == true){
        $_SESSION['userid'] = $userid;
        header("Location: ".$dir."index.php");
        die();
    }else{
        $GLOBALS['error'] = "Email or Password is incorrect";
    }
}

mysqli_close($conn);
?>