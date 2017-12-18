<?php
include 'common/common.php';
include 'database/database_connection.php';

if (isset($_GET['fullname'])) $fullname = clearInput($_GET['fullname']);
else $fullname = "";
if (isset($_GET['date_of_birth'])) $birthDate = clearInput($_GET['date_of_birth']);
else $birthDate = "";
if (isset($_GET['job_title'])) $jobTitle = clearInput($_GET['job_title']);
else $jobTitle = "";
if (isset($_GET['place_of_birth'])) $birthPlace = clearInput($_GET['place_of_birth']);
else $birthPlace = "";
if (isset($_GET['martial_status'])) $martialStatus = clearInput($_GET['martial_status']);
else $martialStatus = "";
if (isset($_GET['gender'])) $gender = clearInput($_GET['gender']);
else $gender = "";

$userid = $_SESSION['userid'];
$db_fullname = "";
$db_jobTitle = "";
$db_birthDate = "";
$db_birthPlace = "";
$db_martialStatus = "";
$db_gender = "";
$error = "";

if (isset($_GET['submit'])) {
    insertOrUpdateValues($fullname, $jobTitle, $birthDate, $birthPlace, $martialStatus, $gender, $conn, $userid);
}

selectFullname($userid);
selectValues($conn, $userid);

function selectValues($conn, $userid)
{
    $querySelect = "SELECT * FROM personal_information WHERE user_id = " . $userid;
    $resultSelect = mysqli_query($conn, $querySelect);
    
    if (mysqli_num_rows($resultSelect) > 0) {
        if ($row = mysqli_fetch_assoc($resultSelect)) {
            $GLOBALS['db_jobTitle'] = $row['job_title'];
            $GLOBALS['db_birthDate'] = $row['date_birth'];
            $GLOBALS['db_birthPlace'] = $row['place_birth'];
            $GLOBALS['db_martialStatus'] = $row['martial_status'];
            $GLOBALS['db_gender'] = $row['gender'];
        }
    }
}

function insertOrUpdateValues($fullname, $jobTitle, $birthDate, $birthPlace, $martialStatus, $gender, $conn, $userid)
{
    $querySelect = "SELECT * FROM personal_information WHERE user_id = " . $userid;
    $resultSelect = mysqli_query($conn, $querySelect);
    
    if (checkFields($fullname, $jobTitle, $birthDate, $birthPlace, $martialStatus, $gender)) {
        
        $queryFullnameInsert = "UPDATE user SET fullname = '$fullname' WHERE user_id = '$userid'";
        
        if (! mysqli_query($conn, $queryFullnameInsert)) {
            $GLOBALS['error'] = "Insert Error: " . mysqli_error($conn);
        }
        
        if (mysqli_num_rows($resultSelect) > 0) {
            $queryUpdate = "UPDATE personal_information SET
                    job_title = '$jobTitle',
                    date_birth = '$birthDate',
                    place_birth = '$birthPlace',
                    martial_status = '$martialStatus',
                    gender = '$gender' WHERE user_id = " . $userid;
            
            if (! mysqli_query($conn, $queryUpdate)) {
                $GLOBALS['error'] = "Update Error: " . mysqli_error($conn);
            }
        } else {
            $queryInsert = "INSERT INTO personal_information(user_id, job_title, date_birth, place_birth, martial_status, gender)
                                VALUES('$userid', '$jobTitle', '$birthDate', '$birthPlace', '$martialStatus', '$gender')";
            
            if (! mysqli_query($conn, $queryInsert) || ! mysqli_query($conn, $queryFullnameInsert)) {
                $GLOBALS['error'] = "Insert Error: " . mysqli_error($conn);
            }
        }
    } else {
        $GLOBALS['error'] = "Fill Fields";
    }
}

function selectFullname($userid)
{
    $query = "SELECT fullname FROM user WHERE user_id = " . $userid;
    $result = mysqli_query($GLOBALS['conn'], $query);
    $row = mysqli_fetch_assoc($result);
    $GLOBALS['db_fullname'] = $row['fullname'];
}

function checkFields($fullname, $jobTitle, $birthDate, $birthPlace, $martialStatus, $gender)
{
    if (! empty($fullname) && ! empty($jobTitle) && ! empty($birthDate) && ! empty($birthDate) && ! empty($martialStatus) && ! empty($gender)) {
        return true;
    }
    
    return false;
}

function getFullname()
{
    return $GLOBALS['db_fullname'];
}

function getJobTitle()
{
    return $GLOBALS['db_jobTitle'];
}

function getDateOfBirth()
{
    return $GLOBALS['db_birthDate'];
}

function getPlaceOfBirth()
{
    return $GLOBALS['db_birthPlace'];
}

function getMartialStatus()
{
    return $GLOBALS['db_martialStatus'];
}

function getGender()
{
    return $GLOBALS['db_gender'];
}
?>