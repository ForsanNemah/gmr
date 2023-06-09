<?php
$pageTitle = 'Check Email';
include 'init.php'; // Include Init File
session_start();
?>
<div class="container">
    <div class="login">
        <?php if (isset($_SESSION['success'])) { ?>
        <div class="alert alert-success alert-sm">
            <?php echo $_SESSION['success'] ?>
        </div>
        <?php } ?>
        <h3>Check Email</h3>
        <form action="phpmailer/my.php" method="post">
            <div class="form-group">
                <label for="username">Email</label>
                <i class="fa fa-message fa-fw"></i>
                <input
                    required
                    type="email"
                    name="email"
                    class="form-control"
                    autocomplete="off">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-sm">Check</button>
            </div>
        </form>
    </div>
</div>
<?php
include $footer;
session_unset();
?>