<?php
ob_start();
session_start(); // Start Session
if (isset($_SESSION['foursan'])&&$_SESSION['idForsan']==1) {
    $header = '';
    include 'init.php'; // Include Init File
    if (filterPage() == 'Users') {
        include $pageExcel . 'users.php';
    }
} else {
    header('Location: index.php');
    exit();
}
