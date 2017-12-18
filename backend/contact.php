<?php
include 'common/common.php';
include 'database/database_connection.php';

if (isset($_GET['address'])) $address = clearInput($_GET['address']);
else $address = "";
if (isset($_GET['mobile_number'])) $mobileNumber = clearInput($_GET['mobile_number']);
else $mobileNumber = "";
if (isset($_GET['home_number'])) $homeNumber = clearInput($_GET['home_number']);
else $homeNumber = 0;
if (isset($_GET['linkedin_address'])) $linkedinAddress = clearInput($_GET['linkedin_address']);
else $linkedinAddress = "";
if (isset($_GET['facebook_address'])) $facebookAddress = clearInput($_GET['facebook_address']);
else $facebookAddress = "";
if (isset($_GET['twitter_address'])) $twitterAddress = clearInput($_GET['twitter_address']);
else $twitterAddress = "";
if (isset($_GET['email_secondary'])) $emaiLSecondary = clearInput($_GET['email_secondary']);
else $emaiLSecondary = "";

$userid = $_SESSION['userid'];
$db_email = "";
$db_address = "";
$db_mobileNumber = "";
$db_homeNumber = "";
$db_linkedinAddress = "";
$db_facebookAddress = "";
$db_twitterAddress = "";
$db_emailSecondary = "";
$error = "";

if (isset($_GET['submit'])) {
    insertOrUpdateValues($address, $mobileNumber, $homeNumber, $emaiLSecondary, $facebookAddress, 
        $linkedinAddress, $twitterAddress, $conn, $userid);
}

selectEmail($conn, $userid);
selectValues($conn, $userid);

function selectValues($conn, $userid)
{
    $querySelect = "SELECT * FROM contact_information WHERE user_id = " . $userid;
    $resultSelect = mysqli_query($conn, $querySelect);
    
    if (mysqli_num_rows($resultSelect) > 0) {
        if ($row = mysqli_fetch_assoc($resultSelect)) {
            $GLOBALS['db_address'] = $row['address'];
            $GLOBALS['db_mobileNumber'] = $row['mobile_number'];
            $GLOBALS['db_homeNumber'] = $row['home_number'];
            $GLOBALS['db_emailSecondary'] = $row['email_secondary'];
            $GLOBALS['db_linkedinAddress'] = $row['linkedin_address'];
            $GLOBALS['db_facebookAddress'] = $row['facebook_address'];
            $GLOBALS['db_twitterAddress'] = $row['twitter_address'];
        }
    }
}

function insertOrUpdateValues($address, $mobileNumber, $homeNumber, $emaiLSecondary, $facebookAddress,
    $linkedinAddress, $twitterAddress, $conn, $userid)
{
    $querySelect = "SELECT * FROM contact_information WHERE user_id = " . $userid;
    $resultSelect = mysqli_query($conn, $querySelect);
    
    if (checkFields($address, $mobileNumber)) {
        if (mysqli_num_rows($resultSelect) > 0) {
            $queryUpdate = "UPDATE contact_information SET
                    address = '$address',
                    mobile_number = '$mobileNumber',
                    home_number = '$homeNumber',
                    email_secondary = '$emaiLSecondary',
                    facebook_address = '$facebookAddress',
                    twitter_address = '$twitterAddress',
                    linkedin_address = '$linkedinAddress' WHERE user_id = " . $userid;
            
            if (! mysqli_query($conn, $queryUpdate)) {
                $GLOBALS['error'] = "Update Error: " . mysqli_error($conn);
            }
        } else {
            $queryInsert = "INSERT INTO contact_information(user_id, address, mobile_number, home_number, email_secondary
                            , facebook_address, twitter_address, linkedin_address)
                                VALUES('$userid', '$address', '$mobileNumber', '$homeNumber', '$emaiLSecondary'
                                    , '$facebookAddress', '$twitterAddress', '$linkedinAddress')";
            
            if (! mysqli_query($conn, $queryInsert)) {
                $GLOBALS['error'] = "Insert Error: " . mysqli_error($conn);
            }
        }
    } else {
        $GLOBALS['error'] = "Fill Fields";
    }
}

function checkFields($address, $mobileNumber){
    if(!empty($address) && !empty($mobileNumber)){
        return true;
    }
    
    return false;
}

function selectEmail($conn, $userid)
{
    $query = "SELECT email FROM user WHERE user_id = " . $userid;
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $GLOBALS['db_email'] = $row['email'];
}

function getEmail(){
    return $GLOBALS['db_email'];
}

function getAddress(){
    return $GLOBALS['db_address'];
}

function getMobileNumber(){
    return $GLOBALS['db_mobileNumber'];
}

function getHomeNumber(){
    return $GLOBALS['db_homeNumber'];
}

function getEmailSecondary(){
    return $GLOBALS['db_emailSecondary'];
}

function getFacebookAddress(){
    return $GLOBALS['db_facebookAddress'];
}

function getLinkedinAddress(){
    return $GLOBALS['db_linkedinAddress'];
}

function getTwitterAddress(){
    return $GLOBALS['db_twitterAddress'];
}