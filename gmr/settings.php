<?php
ob_start();
session_start(); // Start Session
if (isset($_SESSION['foursan'])&&$_SESSION['idForsan']==1) {
    // Page Title
    $pageTitle = 'Settings';
    include 'init.php'; // Include Init File
    include $topbar; // Include Topbar File
    include $sidebar; // Include Sidebar File
    if (filterPage() == 'Home') {
        include $pageSettings . 'home.php';
    } elseif (filterPage() == 'Url') {
        $pageTitle = 'Settings Email';
        include $pageSettings . 'url.php';
    } elseif (filterPage() == 'Languages') {
        $pageTitle = 'Settings Languages';
        include $pageSettings . 'languages.php';
    }
    // Include Footer File
    include $footer;
} else {
    header('Location: index.php');
    exit();
}
