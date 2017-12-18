<?php
include 'database/database_connection.php';

function getFullnameAndJobTitle(){
    $conn = $GLOBALS['conn'];
    $userid = $_SESSION['userid'];
    
    $querySelectFullname = "SELECT fullname FROM user WHERE user_id = '$userid'";
    $resultSelectFullname = mysqli_query($conn, $querySelectFullname);
    $rowFullname = mysqli_fetch_assoc($resultSelectFullname);
    
    $querySelectJobTitle = "SELECT job_title FROM personal_information WHERE user_id = '$userid'";
    $resultSelectJobTitle = mysqli_query($conn, $querySelectJobTitle);
    $rowJobTitle = mysqli_fetch_assoc($resultSelectJobTitle);
    
    echo '<h1>'.$rowFullname['fullname'].'</h1>';
    echo '<h2>'.$rowJobTitle['job_title'].'</h2>';
}

function getPersonalInformation(){
    $conn = $GLOBALS['conn'];
    $userid = $_SESSION['userid'];
    
    $query = "SELECT * FROM personal_information WHERE user_id = '$userid'";
    $result = mysqli_query($conn, $query);
    $tab = "&nbsp;&nbsp;";
    
    while($row = mysqli_fetch_assoc($result)){
        echo 'Birth Date:'.$tab.explode("-", $row['date_birth'])[2].'-'.explode("-", $row['date_birth'])[1].'-'.explode("-", $row['date_birth'])[0].'</br>';
        echo 'Birth Place:'.$tab.$row['place_birth'].'</br>';
        echo 'Martial Status:'.$tab.$row['martial_status'].'</br>';
        echo 'Gender:'.$tab.$row['gender'].'</br>';
    }
    
}

function getContactInformation(){
    $conn = $GLOBALS['conn'];
    $userid = $_SESSION['userid'];
    
    $query = "SELECT * FROM contact_information WHERE user_id = '$userid'";
    $result = mysqli_query($conn, $query);
    $tab = "&nbsp;&nbsp;";
    
    $querySelect = "SELECT email FROM user WHERE user_id = '$userid'";
    $resultSelect = mysqli_query($conn, $querySelect);
    $email = mysqli_fetch_assoc($resultSelect)['email'];
    
    echo 'Email:'.$tab.$email.'</br>';
    
    while($row = mysqli_fetch_assoc($result)){
        if(!empty($row['email_secondary'])){
            echo 'Email:'.$tab.$row['email_secondary'].'</br>';
        }
        
        echo 'Mobile Number:'.$tab.$row['mobile_number'].'</br>';
        
        if($row['home_number'] != '0'){
            echo 'Home Number:'.$tab.$row['home_number'].'</br>';
        }
        
        if(!empty($row['facebook_address'])){
            echo 'Facebook:'.$tab.$row['facebook_address'].'</br>';
        }
        
        if(!empty($row['linkedin_address'])){
            echo 'Linkedin:'.$tab.$row['linkedin_address'].'</br>';
        }
        
        if(!empty($row['twitter_address'])){
            echo 'Twitter:'.$tab.$row['twitter_address'].'</br>';
        }
        
    }
}

function getEducation(){
    $conn = $GLOBALS['conn'];
    $userid = $_SESSION['userid'];
    
    $query = "SELECT * FROM education WHERE user_id = '$userid'";
    $result = mysqli_query($conn, $query);
    
    while ($row = mysqli_fetch_assoc($result)){
        echo '<div class="job">';
        echo '<h2>'.$row['degree'].'</h2>';
        echo '<h3>'.$row['place'].'</h3>';
        echo '<h3>'.$row['department'].'</h3>';
        echo '<h4>'.explode("-", $row['start_date'])[0].'-'.explode("-", $row['end_date'])[0].'</h4></div>';
    }
}

function getSkills(){
    $conn = $GLOBALS['conn'];
    $userid = $_SESSION['userid'];
    
    $query = "SELECT * FROM skills WHERE user_id = '$userid'";
    $result = mysqli_query($conn, $query);
    
    while($row = mysqli_fetch_assoc($result)){
        echo '<ul class="talent">';
        echo '<li>'.$row['skill'].' - '.$row['level'].'</li>';
        echo '<li class="last"></li></ul>';
    }
}

function getWorkExperience(){
    $conn = $GLOBALS['conn'];
    $userid = $_SESSION['userid'];
    
    $query = "SELECT * FROM work_experience WHERE user_id = '$userid'";
    $result = mysqli_query($conn, $query);
    
    while ($row = mysqli_fetch_assoc($result)){
        echo '<div class="job">';
        echo '<h2>'.$row['place'].'</h2>';
        echo '<h3>'.$row['position'].'</h3>';
        echo '<h4>'.explode("-", $row['start_date'])[0].'-'.explode("-", $row['end_date'])[0].'</h4></div>';
    }
}

function getProjects(){
    $conn = $GLOBALS['conn'];
    $userid = $_SESSION['userid'];
    
    $query = "SELECT * FROM projects WHERE user_id = '$userid'";
    $result = mysqli_query($conn, $query);
    
    while ($row = mysqli_fetch_assoc($result)){
        echo '<div class="job">';
        echo '<h2>'.$row['project_name'].'</h2>';
        echo '<h3>'.$row['project_detail'].'</h3>';
        echo '<h4>'.explode("-", $row['start_date'])[0].'-'.explode("-", $row['stop_date'])[0].'</h4></div>';
    }
}

function getLanguages(){
    $conn = $GLOBALS['conn'];
    $userid = $_SESSION['userid'];
    
    $query = "SELECT * FROM languages WHERE user_id = '$userid'";
    $result = mysqli_query($conn, $query);
    
    while($row = mysqli_fetch_assoc($result)){
        echo '<ul class="talent">';
        echo '<li>'.$row['language'].' - '.$row['level'].'</li>';
        echo '<li class="last"></li></ul>';
    }
}

function getAdditionalInformation(){
    $conn = $GLOBALS['conn'];
    $userid = $_SESSION['userid'];
    
    $query = "SELECT * FROM additional_information WHERE user_id = '$userid'";
    $result = mysqli_query($conn, $query);
    $info = mysqli_fetch_assoc($result)['info'];
    
    return $info;
}
?>
