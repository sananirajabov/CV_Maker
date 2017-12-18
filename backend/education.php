<?php 
include 'common/common.php';
include 'database/database_connection.php';

if (isset($_GET['education_start_date'])) $startDate = clearInput($_GET['education_start_date']);
else $startDate = "";
if (isset($_GET['education_stop_date'])) $stopDate = clearInput($_GET['education_stop_date']);
else $stopDate = "";
if (isset($_GET['education_degree'])) $degree = clearInput($_GET['education_degree']);
else $degree = "";
if (isset($_GET['education_place'])) $place = clearInput($_GET['education_place']);
else $place = "";
if(isset($_GET['education_department'])) $department = clearInput($_GET['education_department']);
else $department = "";

$userid = $_SESSION['userid'];
$error = "";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    removeRecord($conn, $id);
}

if(isset($_GET['submit'])){
    insertEducationValues($startDate, $stopDate, $degree, $place, $department, $conn, $userid);
    header("Location: " .$dir. "education_page.php");
}

function insertEducationValues($startDate, $stopDate, $degree, $place, $department, $conn, $userid){
    if(checkFields($startDate, $stopDate, $degree, $place, $department)){
        $query = "INSERT INTO education(user_id, start_date, end_date, degree, place, department)
                 VALUES('$userid', '$startDate', '$stopDate', '$degree', '$place', '$department')";
        
        if(!mysqli_query($conn, $query)){
            $GLOBALS['error'] = mysqli_error($conn);
        }
    }else{
        $GLOBALS['error'] = "Fill Fields";
    }
}

function removeRecord($conn, $id){
    $query = "DELETE FROM education WHERE education_id = " .$id;
    
    if(!mysqli_query($conn, $query)){
        $GLOBALS['error'] = mysqli_error($conn);
    }
}

function checkFields($startDate, $stopDate, $degree, $place, $department){
    if(!empty($startDate) && !empty($stopDate) && !empty($degree) && !empty($place) && !empty($department)){
        return true;
    }
    
    return false;
}

function listEducationValues(){
    $query = "SELECT * FROM education WHERE user_id = " . $GLOBALS['userid'];
    $result = mysqli_query($GLOBALS['conn'], $query);
    
    while ($row = mysqli_fetch_assoc($result)){
        echo '<tr>';
        echo '<td>'.$row['start_date'].'</td>';
        echo '<td>'.$row['end_date'].'</td>';
        echo '<td>'.$row['degree'].'</td>';
        echo '<td>'.$row['place'].'</td>';
        echo '<td>'.$row['department'].'</td>';
        echo '<td class="text-right">
                <a class="btn btn-danger" style="text-decoration: none; color: #fff;" 
                    href="'.'?id='.$row['education_id'].'">Remove</a>
            </td>';
        echo "</tr>";
    }
    
}

?>