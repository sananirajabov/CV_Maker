<?php 
include 'common/common.php';
include 'database/database_connection.php';

if(isset($_POST['email'])) $email = clearInput($_POST['email']);
else $email = "";
if(isset($_POST['fullname'])) $fullname = clearInput($_POST['fullname']);
else $fullname = "";

if(isset($_POST['password'])) $password = clearInput($_POST['password']);
else $password = "";
if(isset($_POST['confirm'])) $confirm_password = clearInput($_POST['confirm']);
else $confirm_password = "";

$error = "";

if(isset($_POST['submit'])){
    if(checkFields($email, $fullname, $password, $confirm_password)){
        if(!validateEmail($conn, $email)){
            saveAndRedirect($conn, $fullname, $email, $password);
        }else{
            $GLOBALS['error'] = "Email Already Exists";
        }
    }else{
        $GLOBALS['error'] = "Fill Inputs or Passwords are not matching";
    }
}

function checkFields($email, $fullname, $password, $confirm_password){
    if(strpos($email, ".") && !empty($fullname)
        && !empty($password) && !empty($confirm_password)
        && $password == $confirm_password){
            return true;
    }
    
    return false;
}

function saveAndRedirect($conn, $fullname, $email, $password){
    $query = "INSERT INTO user(fullname, email, password) VALUES('$fullname', '$email', '$password')";
    if(mysqli_query($conn, $query)){
        header("Location: ".$dir."login_page.php");
        die();
    }else{
        $GLOBALS['error'] = "Database Error";
    }
}

function validateEmail($conn, $email){
    $query = "SELECT email FROM user";
    $result = mysqli_query($conn, $query);
    
    while($row = mysqli_fetch_assoc($result)){
        if($row['email'] == $email){
            return true;
            break;
        }
    }
    
    return false;
}

mysqli_close($conn);
?>