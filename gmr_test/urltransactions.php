<?php
ob_start();
session_start(); // Start Session
if (isset($_SESSION['foursan'])&&$_SESSION['idForsan']==1) {
    // Page Title
    $pageTitle = 'Url Transactions';
    include 'init.php'; // Include Init File
    include $topbar; // Include Topbar File
    include $sidebar; // Include Sidebar File
    if (filterPage() == 'View') {
        $pageTitle = "$pageTitle";
        include $pageUrlTransactions . 'view.php';
    } elseif (filterPage() == 'Add') {
        $pageTitle = "$pageTitle";
        include $pageUrlTransactions . 'add.php';
    } elseif (filterPage() == 'Checked') {
        include $pageUrlTransactions . 'checked.php';
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
    if ($('a').hasClass('active-url-transactions-class')) {
        $('.active-dashboard-class').removeClass('active');
        $('.active-url-transactions-class').addClass('active');
    }
});
</script>
