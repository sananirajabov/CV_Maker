<?php

include 'database/database_connection.php';
$dir = "http://localhost/UniversityCVSystem/";

function clearInput($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = mysqli_real_escape_string($GLOBALS['conn'], $data);
    
    return $data;
}

function showError($errorName)
{
    echo "<p style='color: red'>" . $errorName . "</p>";
}

?>