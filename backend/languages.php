<?php 
include 'common/common.php';
include 'database/database_connection.php';

if(isset($_GET['language'])) $language = clearInput($_GET['language']);
else $language = "";
if(isset($_GET['level'])) $level = clearInput($_GET['level']);
else $level = "";

$userid = $_SESSION['userid'];
$error = "";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    removeRecord($conn, $id);
}

if(isset($_GET['submit'])){
    insertLanguageValue($conn, $userid, $language, $level);
    header("Location: " .$dir. "languages_page.php");
}

function insertLanguageValue($conn, $userid, $language, $level){
    if(!empty($language)){
        $query = "INSERT INTO languages(user_id, language, level) VALUES('$userid', '$language', '$level')";
        
        if(!mysqli_query($conn, $query)){
            $GLOBALS['error'] = mysqli_error($conn);
        }
    }else{
        $GLOBALS['error'] = "Enter a Language";
    }
}

function removeRecord($conn, $id){
    $query = "DELETE FROM languages WHERE language_id = " .$id;
    
    if(!mysqli_query($conn, $query)){
        $GLOBALS['error'] = mysqli_error($conn);
    }
}

function listLanguages(){
    $query = "SELECT * FROM languages WHERE user_id = " .$GLOBALS['userid'];
    $result = mysqli_query($GLOBALS['conn'], $query);
    
    while($row = mysqli_fetch_assoc($result)){
        echo '<tr>';
        echo '<td>'.$row['language'].'</td>';
        echo '<td>'.$row['level'].'</td>';
        echo '<td class="text-right">
            <a href="'.'?id='.$row['language_id'].'" class="btn btn-danger" style="text-decoration: none; color: #fff;">Remove</a>';
        echo '</tr>';
    }
    
}

?>