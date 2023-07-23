<?php
// Check If Server User Coming From HTTP Post Request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get Variables From Form
    $username = filterRequest('username');
    $password1 = filterRequest('password1');
    $password2 = filterRequest('password2');
    // Array Errors
    $errors = array();
    // UserName Error
    if (empty($username)) {
        $errors[] = words('Enter User Name');
    } elseif (getCount('admins', 'username = ?', array($username)) > 0 || getCount('users', 'username = ?', array($username)) > 0) {
        $errors[] = words('User Name Is Exists');
    }
    // Password Error
    if (empty($password1)) {
        $errors[] = words('Enter Password');
    } elseif (strlen($password1) < 8) {
        $errors[] = words('Password Cannot Be Less Then 8 Characters');
    } elseif (empty($password2)) {
        $errors[] = words('Enter Reenter Password');
    } elseif ($password1 != $password2) {
        $errors[] = words('The Password Is Not Equal');
    }
    // Add Informatio To Database
    if (empty($errors)) {
        $add = $con->prepare('INSERT INTO admins(username, pass) VALUES(?, ?)');
        $add->execute(array($username, $password1));
        header('location: ?Page=View');
    }
}
?>
<!------------------------ Content ------------------------>
<div class="content">
    <!------------------------ Navbar ------------------------>
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand">
            <span><?php echo words($pageTitle) ?></span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav <?php echo $navbar ?>-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link btn btn-danger btn-sm" aria-current="page" href="?Page=View">
                        <i class="fa fa-chevron-left fa-fw"></i>
                        <span><?php echo words('Back') ?></span>
                    </a>
                </li>
            </ul>
        </div>
    </nav> <!-- Navbar -->
    <!------------------------ Form ------------------------>
    <form method="post" enctype="multipart/form-data">
        <!------------------------ Container ------------------------>
        <div class="container">
            <!------------------------ Beasic ------------------------>
            <div class="panel">
                <!------------------------ Title ------------------------>
                <div class="panel-heading">
                    <?php echo words('Add New Admin') ?>
                </div>
                <!------------------------ Body ------------------------>
                <div class="panel-body">
                    <!------------------------ Raw ------------------------>
                    <div class="row">
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
                        <!------------------------ UserName ------------------------>
                        <div class="col-md-4 col-sm-6">
                            <div class="form-group">
                                <label><?php echo words('User Name') ?></label>
                                <input
                                    type="text"
                                    name="username"
                                    class="form-control"
                                    autocomplete="off"
                                    value="<?php if(isset($username)){echo$username;}?>">
                            </div>
                        </div> <!-- UserName -->
                        <!------------------------ Password ------------------------>
                        <div class="col-md-4 col-sm-6">
                            <div class="form-group">
                                <label><?php echo words('Password') ?></label>
                                <input
                                    type="password"
                                    name="password1"
                                    class="form-control"
                                    autocomplete="off"
                                    value="<?php if(isset($password1)){echo$password1;}?>">
                            </div>
                        </div> <!-- Password -->
                        <!------------------------ Reenter Password ------------------------>
                        <div class="col-md-4 col-sm-6">
                            <div class="form-group">
                                <label><?php echo words('Reenter Password') ?></label>
                                <input
                                    type="password"
                                    name="password2"
                                    class="form-control"
                                    autocomplete="off"
                                    value="<?php if(isset($password2)){echo$password2;}?>">
                            </div>
                        </div> <!-- Reenter Password -->
                    </div> <!-- Raw -->
                </div> <!-- Body -->
            </div> <!-- Beasic -->
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-sm">
                    <?php echo words('Add') ?>
                </button>
            </div>
        </div> <!-- Container -->
    </form> <!-- Form -->
</div> <!-- Content -->