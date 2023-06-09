<?php
ob_start();
// Page Title
$pageTitle = 'Users';
include 'init.php'; // Include Init
session_start(); // Start Session
if (isset($_SESSION['foursan'])) {
    include $temp . 'topbar.php';
    include $temp . 'sidebar.php';
    if (filterPage() == 'Edit') {
        $pageTitle = 'Chgange Password';
        include $pageAccounts . 'edit.php';
    } elseif (filterPage() == 'Profile') {
        $pageTitle = 'Your Profile';
        include $pageAccounts . 'profile.php';
    }
} else {
    $pageTitle = 'Create New Account';
    include $pageAccounts . 'add.php';
}
// Include Footer File
include $footer;