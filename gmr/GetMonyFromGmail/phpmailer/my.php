<?php
ob_start();
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include '../connect.php';
    $reciver_email= filterRequest('email');
    // Settings Errors
    $errors = array();
    // Email Error
    if (empty($reciver_email)) {
        echo '<div class="alert alert-danger">Please, Enter Your Email</div>';
    } elseif(getCount('users', 'main_email=?',array($reciver_email)) > 0) {
        require 'index.php';
        $resetPassword = $con->prepare('SELECT username, pass FROM users WHERE main_email = ?');
        $resetPassword->execute(array($reciver_email));
        $fetch = $resetPassword->fetch();
        $full_subject="Get Mony From Gmail";
        $message="Hello {$fetch['username']}\nYour Password Is : <span style='color:blue'>{$fetch['pass']}</span>";
        $success = send_mail("$reciver_email","GoogleMapReviews@pscye.com","Psc@2023",$full_subject,$message,"smtp.hostinger.com","465");
        $_SESSION['success'] = 'Sent New Password To Your Email';
        header('location: ../checkemail.php');
    } else {
        echo '<div class="alert alert-danger">Email Is Not Exists</div>';
    }
} else {
    header('../index.php');
    exit();
}
?>