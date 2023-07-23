<?php
ob_start();
session_start(); // Start Session
if (isset($_SESSION['foursan'])) {
    // Page Title
    $pageTitle = 'Email Names';
    include 'init.php'; // Include Init File
    include $topbar; // Include Topbar File
    include $sidebar; // Include Sidebar File
    if (filterPage() == 'View') {
        include $pageEmailNames . 'view.php';
    } elseif (filterPage() == 'Add'&&$_SESSION['idForsan']==2) {
        include $pageEmailNames . 'add.php';
    }
    // Include Footer File
    include $footer;
} else {
    header('Location: index.php');
    exit();
}
?>
<script>
$(document).ready(function() {
    if ($('a').hasClass('active-emailnames-class')) {
        $('.active-dashboard-class').removeClass('active');
        $('.active-emailnames-class').addClass('active');
    }
});
</script>
