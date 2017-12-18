<?php 
include 'common/common.php';
include 'database/database_connection.php';

if(isset($_GET['skill'])) $skill = clearInput($_GET['skill']);
else $skill = "";
if(isset($_GET['level'])) $level = clearInput($_GET['level']);
else $level = "";

$userid = $_SESSION['userid'];
$error = "";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    removeRecord($conn, $id);
}

if(isset($_GET['submit'])){
    insertSkillValue($conn, $userid, $skill, $level);
    header("Location: " .$dir. "skills_page.php");
}

function insertSkillValue($conn, $userid, $skill, $level){
    if(!empty($skill) && !empty($level)){
        $query = "INSERT INTO skills(user_id, skill, level) VALUES('$userid', '$skill', '$level')";
        
        if(!mysqli_query($conn, $query)){
            $GLOBALS['error'] = mysqli_error($conn);
        }
    }else{
        $GLOBALS['error'] = "Enter Skill";
    }
}

function removeRecord($conn, $id){
    $query = "DELETE FROM skills WHERE skill_id = " .$id;
    
    if(!mysqli_query($conn, $query)){
        $GLOBALS['error'] = mysqli_error($conn);
    }
}

function listSkills(){
    $query = "SELECT * FROM skills WHERE user_id = " .$GLOBALS['userid'];
    $result = mysqli_query($GLOBALS['conn'], $query);
    
    while($row = mysqli_fetch_assoc($result)){
        echo '<tr>';
        echo '<td>'.$row['skill'].'</td>';
        echo '<td>'.$row['level'].'</td>';
        echo '<td class="text-right">
            <a href="'.'?id='.$row['skill_id'].'" class="btn btn-danger" 
            style="text-decoration: none; color: #fff;">Remove</a></td>';
        echo '</tr>';
    }
    
}

?>