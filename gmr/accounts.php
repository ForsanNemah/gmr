<?php
ob_start();
// Page Title
$pageTitle = 'Login';
include 'init.php'; // Include Init
session_start(); // Start Session
if (isset($_SESSION['foursan'])) {
    include $temp . 'topbar.php';
    include $temp . 'sidebar.php';
    if (filterPage() == 'Edit') {
        $pageTitle = words('Change Password');
        include $pageAccounts . 'edit.php';
    } elseif (filterPage() == 'Profile') {
        $pageTitle = words('Profile');
        include $pageAccounts . 'profile.php';
    }
} else {
    $pageTitle = words('Create New Account');
    include $pageAccounts . 'add.php';
}
// Include Footer File
include $footer;