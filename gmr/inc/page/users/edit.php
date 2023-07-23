<?php
// Check If Server User Coming From HTTP Post Request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get Variables From Form
    $username = filterRequest('username');
    $password1 = filterRequest('password1');
    $password2 = filterRequest('password2');
    $phone = filterRequest('phone');
    $main = filterRequest('main');
    $email = filterRequest('email');
    $active = filterRequest('active');
    // Array Errors
    $errors = array();
    // UserName Error
    if (empty($username)) {
        $errors[] = words('Enter User Name');
    } elseif (getCount('admins', 'username = ?', array($username)) > 0 || getCount('users', 'username = ? AND id != ?', array($username, id())) > 0) {
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
    // Phone Error
    if (empty($phone)) {
        $errors[] = words('Enter Phone');
    }
    // Email Error
    if (empty($main)) {
        $errors[] = words('Enter Main Email');
    } elseif (getCount('users', 'main_email = ? and id != ?', array($main,id())) > 0) {
        $errors[] = words('Email Is Exists');
    }
    // Edit Informatio To Database
    if (empty($errors)) {
        $edit = $con->prepare('UPDATE url_transactions SET username = ? WHERE username = ?');
        $edit->execute(array($username, getItem('users',id(),'id=?','username')));
        $edit = $con->prepare('UPDATE users SET username = ?, pass = ?, phone = ?, main_email = ?, email = ?, active = ? WHERE id = ?');
        $edit->execute(array($username, $password1, $phone, $main, $email, $active, id()));
        if ($_SESSION['idForsan'] == 1) {
            header('location: ?Page=View');
        } else {
            header('location: report.php?Page=View');
        }
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
                    <a
                    class="nav-link btn btn-danger btn-sm"
                    aria-current="page"
                    href="<?php if($_SESSION['idForsan'] == 1){echo '?Page=View';}else{echo 'report.php?Page=View';}?>">
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
                    <?php echo words('Edit User') ?>
                </div>
                <!------------------------ Body ------------------------>
                <div class="panel-body">
                    <!------------------------ Raw ------------------------>
                    <div class="row">
                        <div class="col-12">
                            <?php
                            if (isset($errors) && !empty($errors)) {
                            foreach ($errors as $error) {
                            ?>
                            <div class="alert alert-danger">
                                <?php echo $error ?>
                            </div>
                            <?php } } ?>
                        </div>
                        <!------------------------ User Name ------------------------>
                        <div class="col-md-4 col-sm-6">
                            <div class="form-group">
                                <label><?php echo words('User Name') ?></label>
                                <input
                                    type="text"
                                    name="username"
                                    class="form-control"
                                    autocomplete="off"
                                    value="<?php if(isset($username)){echo$username;}else{echo getItem('users',id(),'id=?','username');}?>">
                            </div>
                        </div> <!-- User Name -->
                        <!------------------------ Password ------------------------>
                        <div class="col-md-4 col-sm-6">
                            <div class="form-group">
                                <label><?php echo words('Password') ?></label>
                                <input
                                    type="password"
                                    name="password1"
                                    class="form-control"
                                    autocomplete="off"
                                    value="<?php if(isset($password1)){echo$password1;}else{echo getItem('users',id(),'id=?','pass');}?>">
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
                                    value="<?php if(isset($password2)){echo$password2;}else{echo getItem('users',id(),'id=?','pass');}?>">
                            </div>
                        </div> <!-- Reenter Password -->
                        <!------------------------ Phone ------------------------>
                        <div class="col-md-4 col-sm-6">
                            <div class="form-group">
                                <label><?php echo words('Phone') ?></label>
                                <input
                                    type="number"
                                    name="phone"
                                    class="form-control"
                                    autocomplete="off"
                                    value="<?php if(isset($phone)){echo$phone;}else{echo getItem('users',id(),'id=?','phone');}?>">
                            </div>
                        </div> <!-- Phone -->
                        <!------------------------ Email ------------------------>
                        <div class="col-md-4 col-sm-6">
                            <div class="form-group">
                                <label><?php echo words('Main Email') ?></label>
                                <input
                                    type="text"
                                    name="main"
                                    class="form-control"
                                    autocomplete="off"
                                    value="<?php if(isset($main)){echo$main;}else{echo getItem('users',id(),'id=?','main_email');}?>">
                            </div>
                        </div> <!-- Email -->
                        <!------------------------ Active ------------------------>
                        <div class="col-md-4 col-sm-6">
                            <div class="form-group">
                                <label><?php echo words('State') ?></label>
                                <div class="form-group">
                                    <select name="active" class="form-control">
                                        <option value="0" <?php if(getItem('users',id(),'id=?','active')==0){echo'selected';}?>>Disabled</option>
                                        <option value="1"<?php if (getItem('users',id(),'id=?','active')==1){echo'selected';}?>>Enabled</option>
                                    </select>
                                </div>
                            </div>
                        </div> <!-- Active -->
                        <!------------------------ Email ------------------------>
                        <div class="col-12">
                            <div class="form-group">
                                <label><?php echo words('Emails') ?></label>
                                <textarea name="email" class="form-control" autocomplete="off" rows="7"><?php if(isset($email)){echo$email;}else{echo getItem('users',id(),'id=?','email');}?></textarea>
                            </div>
                        </div> <!-- Email -->
                    </div> <!-- Raw -->
                </div> <!-- Body -->
            </div> <!-- Beasic -->
            <div class="form-group">
                <button type="submit" class="btn btn-success btn-sm">
                    <?php echo words('Edit') ?>
                </button>
            </div>
        </div> <!-- Container -->
    </form> <!-- Form -->
</div> <!-- Content -->