<?php
ob_start();
session_start(); // Start Session
if (isset($_SESSION['foursan'])&&$_SESSION['idForsan']==2) {
    // Page Title
    include 'init.php'; // Include Init File
    include $topbar; // Include Topbar File
    include $sidebar; // Include Sidebar File
    if (filterPage() == 'Report') {
        $pageTitle = 'Report';
        include $pageReport . 'report.php';
    } elseif (filterPage() == 'Url') {
        $pageTitle = 'Url Report';
        include $pageReport . 'url.php';
    }
    // Include Footer File
    include $footer;
} else {
    header('Location: index.php');
    exit();
}