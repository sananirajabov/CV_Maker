<?php 
include 'common/common.php';
include 'database/database_connection.php';

if (isset($_GET['start_date'])) $startDate = clearInput($_GET['start_date']);
else $startDate = "";
if (isset($_GET['end_date'])) $stopDate = clearInput($_GET['end_date']);
else $stopDate = "";
if (isset($_GET['place'])) $place = clearInput($_GET['place']);
else $place = "";
if (isset($_GET['position'])) $position = clearInput($_GET['position']);
else $position = "";

$userid = $_SESSION['userid'];
$error = "";

if(isset($_GET['submit'])){
    insertExperienceValues($startDate, $stopDate, $place, $position, $conn, $userid);
    header("Location: " .$dir. "experience_page.php");
}

if(isset($_GET['id'])){
    $id = $_GET['id'];
    deleteExperienceRecord($conn, $userid, $id);
}

function listExperienceValues(){
    $query = "SELECT * FROM work_experience WHERE user_id = ". $GLOBALS['userid'];
    $result = mysqli_query($GLOBALS['conn'], $query);
    
    while($row = mysqli_fetch_assoc($result)){
        echo '<tr>';
        echo '<td>'.$row['start_date'].'</td>';
        echo '<td>'.$row['end_date'].'</td>';
        echo '<td>'.$row['place'].'</td>';
        echo '<td>'.$row['position'].'</td>';
        echo '<td class="text-right">
                <a href="'.'?id='.$row['experience_id'].'" class="btn btn-danger" 
                style="text-decoration: none; color: #fff;">Remove</a>
              </td>';
        echo '</tr>';
    }
}

function insertExperienceValues($startDate, $stopDate, $place, $position, $conn, $userid){
    if(!empty($startDate) && !empty($stopDate) && !empty($place) && !empty($position)){
        $query = "INSERT INTO work_experience(user_id, start_date, end_date, place, position)
                VALUES('$userid', '$startDate', '$stopDate', '$place', '$position')";

        if(!mysqli_query($conn, $query)){
            $GLOBALS['error'] = "Database Error: " .mysqli_error($conn);
        }
    }else{
        $GLOBALS['error'] = "Fill Fields";
    }
}

function deleteExperienceRecord($conn, $userid, $id){
    $query = "DELETE FROM work_experience WHERE experience_id = '$id' AND user_id = '$userid'";
    
    if(!mysqli_query($conn, $query)){
        $GLOBALS['error'] = "Database Error: " .mysqli_error($conn);
    }
}


?>