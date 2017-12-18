<?php 
include 'common/common.php';
include 'database/database_connection.php';

if(isset($_GET['additional_info'])) $info = clearInput($_GET['additional_info']);
else $info = "";

$userid = $_SESSION['userid'];
$error = "";
$additional_info = "";

if(isset($_GET['submit'])){
    insertOrUpdateInfo($conn, $userid, $info);
}

selectAdditionalInfo($conn, $userid);

function insertOrUpdateInfo($conn, $userid, $info){
    $query = "SELECT info FROM additional_information WHERE user_id = " .$userid;
    $result = mysqli_query($conn, $query);
    
    if(mysqli_num_rows($result) < 1){
        $queryInsert = "INSERT INTO additional_information(user_id, info) 
                    VALUES('$userid', '$info')";
        
        if(!mysqli_query($conn, $queryInsert)){
            $GLOBALS['error'] = "Database Error: " .mysqli_error($conn);
        }
    }else{
        $queryUpdate = "UPDATE additional_information SET info = '$info' WHERE user_id = " .$userid;
        
        if(!mysqli_query($conn, $queryUpdate)){
            $GLOBALS['error'] = "Database Error: " .mysqli_error($conn);
        }
    }
}

function selectAdditionalInfo($conn, $userid){
    $query = "SELECT info FROM additional_information WHERE user_id = " .$userid;
    $result = mysqli_query($conn, $query);
    
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $GLOBALS['additional_info'] = $row['info'];
    }
}

function getAdditionalInfo(){
    return $GLOBALS['additional_info'];
}

?>