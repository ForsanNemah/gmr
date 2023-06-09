<?php
//
require 'phpmailer/index.php';
//
if (getItem('url_transactions',id(),'id=?','ut_state')==0) {
    // Edit
    $active = $con->prepare('UPDATE url_transactions SET ut_state = 1 WHERE id = ?');
    $active->execute(array(id()));
} else {
    // Edit
    $active = $con->prepare('UPDATE url_transactions SET ut_state = 0 WHERE id = ?');
    $active->execute(array(id()));
}
// Get Status
$status = getItem('url_transactions',id(),'id=?','ut_state');
// Get UserName
$username = getItem('url_transactions',id(),'id=?','username');
// Get Url
$url = getItem('url_transactions',id(),'id=?','ut_url');
// Get Main Email
$reciverEmail = getItem('users',$username,'username=?','main_email');
// Defaine Messages
$message = 'Null';
//
if (getItem('settings',1,'id=?','url_email') == 1) {
    //
    if ($status == 1) {
        $message = "Dear Customer, $username, Your Rating For The Link $url And Your Balance Has Been Increased By One Point";
    //
    } elseif ($status == 0) {
        $message = "Dear Customer, $username, Your Rating For The Link $url Has Been Rejected, And Your Balance Has Decreased By One Point.<br>";
        $message .= "Reasons For Rejected The Eveluation :<br>";
        $message .= "1 - The Email Is Ineffective In The Possibility Of Eveluation Because It Is New Or Not Interactive<br>";
        $message .= "2 - Deleted Your Eveluation";
    }
    //
    echo send_mail("$reciverEmail","GoogleMapReviews@pscye.com","Psc@2023","Get Mony From Gmail",$message,"smtp.hostinger.com","465");
}
//
if (isset($_GET['Customer'])) {
    header('location: ?Page=View&Customer='.$_GET['Customer']);
} elseif (isset($_GET['User'])) {
    header('location: ?Page=View&User='.$_GET['User']);
} else {
    header('location: ?Page=View');
}