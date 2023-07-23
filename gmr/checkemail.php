<?php
ob_start();
session_start();
$pageTitle = 'Check Email';
include 'init.php'; // Include Init File
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $reciver_email= filterRequest('email');
    $success = '';
    // Settings Errors
    $errors = array();
    // Email Error
    if (empty($reciver_email)) {
        $errors[] = words('Enter Email');
    } elseif (getCount('users','main_email=?',array($reciver_email)) == 0) {
        $errors[] = words('Email Is Not Exists');
    }
    if (empty($errors)) {
        require 'inc/lib/phpmailer/index.php';
        $resetPassword = $con->prepare('SELECT username, pass FROM users WHERE main_email = ?');
        $resetPassword->execute(array($reciver_email));
        $fetch = $resetPassword->fetch();
        $full_subject="Get Mony From Gmail";
        $message="مرحبا {$fetch['username']}\nكلمة المرور الخاصه بك هي : <span style='color:blue'>{$fetch['pass']}</span>";
        $success = send_mail("$reciver_email","GoogleMapReviews@pscye.com","Psc@2023",$full_subject,$message,"smtp.hostinger.com","465");
        $success = 'Sent New Password To Your Email';
    }
}
?>
<div class="container">
    <div class="login">
        <!------------------------ Errors ------------------------>
        <div class="col-12">
            <?php
            if (isset($errors) && !empty($errors)) {
            foreach ($errors as $error) {
            ?>
            <div class="alert alert-danger">
                <?php echo $error ?>
            </div>
            <?php } } ?>
        </div> <!-- Errors -->
        <!------------------------ Success ------------------------>
        <div class="col-12">
            <?php if (isset($success) && $success != '') { ?>
            <div class="alert alert-success">
                <?php echo $success ?>
            </div>
            <?php } ?>
        </div> <!-- Success -->
        <h3>
            <?php echo words('Check Email') ?>
        </h3>
        <form action="" method="post">
            <div class="form-group">
                <label for="username">
                    <?php echo words('Email') ?>
                </label>
                <i class="fa fa-message fa-fw"></i>
                <input
                    required
                    type="email"
                    name="email"
                    class="form-control"
                    autocomplete="off"
                    value="<?php if(isset($reciver_email)){echo$reciver_email;}?>">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-sm">Check</button>
            </div>
            <a href="index.php">
                <?php echo words('Login') ?>
            </a>
        </form>
    </div>
</div>
<?php
include $footer;
session_unset();
?>