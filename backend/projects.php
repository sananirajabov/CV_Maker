<?php 
include 'common/common.php';
include 'database/database_connection.php';

if (isset($_GET['project_name'])) $projectName = clearInput($_GET['project_name']);
else $projectName = "";
if (isset($_GET['project_detail'])) $projectDetail = clearInput($_GET['project_detail']);
else $projectDetail = "";
if (isset($_GET['project_start_date'])) $startDate = clearInput($_GET['project_start_date']);
else $startDate = "";
if (isset($_GET['project_stop_date'])) $stopDate = clearInput($_GET['project_stop_date']);
else $stopDate = "";

$userid = $_SESSION['userid'];
$error = "";

if(isset($_GET['submit'])){
    insertProjectValues($projectName, $projectDetail, $startDate, $stopDate, $conn, $userid);
    header("Location: " .$dir. "projects_page.php");
}

if(isset($_GET['id'])){
    $id = $_GET['id'];
    deleteProjectRecord($conn, $userid, $id);
}

function listProjectValues(){
    $query = "SELECT * FROM projects WHERE user_id = ". $GLOBALS['userid'];
    $result = mysqli_query($GLOBALS['conn'], $query);
    
    while($row = mysqli_fetch_assoc($result)){
        echo '<tr>';
        echo '<td>'.$row['project_name'].'</td>';
        echo '<td>'.$row['project_detail'].'</td>';
        echo '<td>'.$row['start_date'].'</td>';
        echo '<td>'.$row['stop_date'].'</td>';
        echo '<td class="text-right">
                <a href="'.'?id='.$row['project_id'].'" class="btn btn-danger" 
                style="text-decoration: none; color: #fff;">Remove</a>
              </td>';
        echo '</tr>';
    }
}

function insertProjectValues($projectName, $projectDetail, $startDate, $stopDate, $conn, $userid){
    if(!empty($projectName) && !empty($projectDetail) && !empty($startDate) && !empty($stopDate)){
        $query = "INSERT INTO projects(user_id, project_name, project_detail, start_date, stop_date)
                VALUES('$userid', '$projectName', '$projectDetail', '$startDate', '$stopDate')";

        if(!mysqli_query($conn, $query)){
            $GLOBALS['error'] = "Database Error: " .mysqli_error($conn);
        }
    }else{
        $GLOBALS['error'] = "Fill Fields";
    }
}

function deleteProjectRecord($conn, $userid, $id){
    $query = "DELETE FROM projects WHERE project_id = '$id' AND user_id = '$userid'";
    
    if(!mysqli_query($conn, $query)){
        $GLOBALS['error'] = "Database Error: " .mysqli_error($conn);
    }
}


?>