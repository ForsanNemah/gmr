<?php
ob_start();
session_start(); // Start Session
$pageTitle = 'Login';
include 'init.php'; // Include Init File
// Redirect To Dashboard
function redirectDashboard() {
    header('Location: dashboard.php');
    exit();
}
// Check If Server User Coming From HTTP Post Request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get Variables From Form
    $username = filterRequest('username');
    $password = filterRequest('password');
    // Settings Errors
    $errors = array();
    // UserName Error
    if (empty($username)) {
        $errors[] = words('Enter User Name');
    } elseif (getCount('admins', 'username = ?', array($username)) == 0 && getCount('users', 'username = ?', array($username)) == 0) {
        $errors[] = words('User Name Or Password Is Incorrect');
    }
    // Password Error
    if (empty($password)) {
        $errors[] = words('Enter Password');
    }
    // If Count > 0 This Main The Database Contain Record About This UserName
    if (getCount('admins', 'username = ? and pass = ?', array($username, $password)) > 0) {
        // Register Session User Name
        $_SESSION['foursan'] = $username;
        $_SESSION['idForsan'] = getItem('admins', $username, 'username = ?', 'type');
        redirectDashboard();
    }
    // If Count > 0 This Main The Database Contain Record About This UserName
    if (getCount('users', 'username = ? and pass = ? and active = 1', array($username, $password)) > 0) {
        // Register Session User Name
        $_SESSION['foursan'] = $username;
        $_SESSION['idForsan'] = getItem('users', $username, 'username = ?', 'type');
        header('location: report.php?Page=Report');
    }
}

if (isset($_SESSION['foursna'])&&$_SESSION['idForsan']==1) {
    redirectDashboard();
} elseif (isset($_SESSION['foursna'])&&$_SESSION['idForsan']==2) {
    header('location: report.php?Page=Report');
}
//
?>
<div class="container">
    <div class="login">
        <?php
        if (isset($errors)&&!empty($errors)) {
            foreach ($errors as $error) {
                echo "<div class='alert alert-danger alert-sm'>$error</div>";
            }
        }
        ?>
        <h3 class="text-center">Get Mony From Gmail</h3>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <div class="form-group">
                <label for="username">
                    <?php echo words('User Name') ?>
                </label>
                <i class="fa fa-user fa-fw"></i>
                <input
                    type="text"
                    name="username"
                    id="username"
                    class="form-control"
                    value="<?php if(isset($username)) {echo $username;} ?>"
                    autocomplete="off">
            </div>
            <div class="form-group">
                <label for="password">
                    <?php echo words('Password') ?>
                </label>
                <i class="fa fa-lock fa-fw"></i>
                <input type="password" name="password" id="password" class="form-control" autocomplete="off">
                <i class="fa fa-eye" id="showPassword"></i>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-sm">
                    <?php echo words('Login') ?>
                </button>
            </div>
        </form>
        <div class="anchor">
            <a href="accounts.php?Page=Add">
                <?php echo words('Create New Account') ?>
            </a>
            <a href="checkemail.php">
                <?php echo words('Forget Password') ?>
            </a>
        </div>
    </div>
</div>
<?php include $footer ?>