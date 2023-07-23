<?php
ob_start();
session_start(); // Start Session
if (isset($_SESSION['foursan'])&&$_SESSION['idForsan']==1) {
    // Page Title
    $pageTitle = 'Users';
    include 'init.php'; // Include Init File
    include $topbar; // Include Topbar File
    include $sidebar; // Include Sidebar File
    if (filterPage() == 'View') {
        include $pageUsers . 'view.php';
    } elseif (filterPage() == 'Add') {
        include $pageUsers . 'add.php';
    } elseif (filterPage() == 'Edit') {
        include $pageUsers . 'edit.php';
    } elseif (filterPage() == 'Delete') {
        include $pageUsers . 'delete.php';
    } elseif (filterPage() == 'Active') {
        include $pageUsers . 'active.php';
    } elseif (filterPage() == 'Excel') {
        include $pageUsers . 'excel.php';
    }
    // Include Footer File
    include $footer;
} else {
    header('Location: index.php');
    exit();
}
if (filterPage() == 'Add') {
    echo filterPage();
}
?>
<script>
$(document).ready(function() {
    if ($('a').hasClass('active-users-class')) {
        $('.active-dashboard-class').removeClass('active');
        $('.active-users-class').addClass('active');
    }
});
</script>
