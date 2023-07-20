<?php
// Check If Server User Coming From HTTP Post Request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get Variables From Form
    $id = getItem('users',$_SESSION['foursan'],'username = ?', 'id');
    $name = filterRequest('name');
    // Array Errors
    $errors = array();
    // UserName Error
    if (empty($name)) {
        $errors[] = words('Enter Email Name');
    } elseif (getCount('email_names', 'em_name = ?', array($name)) > 0) {
        $errors[] = words('Email Name Is Exists');
    }
    // Add Informatio To Database
    if (empty($errors)) {
        $add = $con->prepare('INSERT INTO email_names(user_id, em_name) VALUES(?, ?)');
        $add->execute(array($id, $name));
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
                    <?php echo words('Add New Email Name') ?>
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
                        <!------------------------ Name ------------------------>
                        <div class="col-12">
                            <div class="form-group">
                                <label><?php echo words('Email Name') ?></label>
                                <input
                                    type="text"
                                    name="name"
                                    class="form-control"
                                    autocomplete="off"
                                    value="<?php if(isset($name)){echo$name;}?>">
                            </div>
                        </div> <!-- Name -->
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