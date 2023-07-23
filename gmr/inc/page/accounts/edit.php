<?php
$username = $_SESSION['foursan'];
// Check If Server User Coming From HTTP Post Request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get Variables From Form
    $password0 = filterRequest('password0');
    $password1 = filterRequest('password1');
    $password2 = filterRequest('password2');
    // Array Errors
    $errors = array();
    // Old Error
    if (empty($password0)) {
        $errors[] = words('Enter Old Password');
    }
    // New Error
    if (empty($password1)) {
        $errors[] = words('Enter New Password');
    } elseif (strlen($password1) < 8) {
        $errors[] = words('Password Cannot Be Less Then 8 Characters');
    }
    // Re Error
    if (empty($password2)) {
        $errors[] = words('Enter Reenter Password');
    } elseif ($password1 != $password2) {
        $errors[] = words('The Password Is Not Equal');
    }
    // Add Informatio To Database
    if (empty($errors)&&getItem('users',$username,'username=?','pass') == $password0) {
        $add = $con->prepare('UPDATE users SET pass = ? WHERE username = ?');
        $add->execute(array($password1, $username));
        header('location: report.php?Page=View');
    } else {
        $errors[] = words('The Old Password Is Incorrect');
    }
}
?>
<div class="container">
    <div class="login">
        <?php
        if (isset($errors)&&!empty($errors)) {
            foreach ($errors as $error) {
                echo "<div class='alert alert-danger alert-sm'>$error</div>";
            }
            echo '<br>';
        }
        ?>
        <h3><?php echo words('Change Password') ?></h3>
        <form method="post">
            <div class="form-group">
                <label for="password">
                    <?php echo words('Old Password') ?>
                </label>
                <i class="fa fa-lock fa-fw"></i>
                <input
                    type="password"
                    name="password0"
                    id="password"
                    class="form-control"
                    value="<?php if(isset($password0)){echo$password0;}?>">
                <i class="fa fa-eye" id="showPassword"></i>
            </div>
            <div class="form-group">
                <label for="password">
                    <?php echo words('New Password') ?>
                </label>
                <i class="fa fa-lock fa-fw"></i>
                <input
                    type="password"
                    name="password1"
                    id="password"
                    class="form-control"
                    value="<?php if(isset($password1)){echo$password1;}?>">
            </div>
            <div class="form-group">
                <label for="reenter">
                    <?php echo words('Reenter Password') ?>
                </label>
                <i class="fa fa-lock fa-fw"></i>
                <input
                    type="password"
                    name="password2"
                    id="reenter"
                    class="form-control"
                    value="<?php if(isset($password2)){echo$password2;}?>">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success btn-sm">
                    <?php echo words('Edit') ?>
                </button>
            </div>
        </form>
    </div>
</div>