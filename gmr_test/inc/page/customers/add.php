<?php
// Check If Server User Coming From HTTP Post Request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get Variables From Form
    $fullname = filterRequest('fullname');
    $location = filterRequest('location');
    $active = filterRequest('active');
    // Array Errors
    $errors = array();
    // Full Name Error
    if (empty($fullname)) {
        $errors[] = words('Enter Full Name');
    } elseif (getCount('customers','fullname=?',array($fullname)) > 0) {
        $errors[] = words('Full Name Is Exists');
    }
    // Location Error
    if (empty($location)) {
        $errors[] = words('Enter Location');
    } elseif (getCount('customers','cu_location=?',array($location)) > 0) {
        $errors[] = words('Location Is Exists');
    }
    // Add Informatio To Database
    if (empty($errors)) {
        $add = $con->prepare('INSERT INTO customers(fullname, cu_location, active) VALUES(?, ?, ?)');
        $add->execute(array($fullname, $location, $active));
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
                    <?php echo words('Add Customer New') ?>
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
                        <!------------------------ Full Name ------------------------>
                        <div class="col-md-4 col-sm-6">
                            <div class="form-group">
                                <label><?php echo words('Full Name') ?></label>
                                <input
                                    type="text"
                                    name="fullname"
                                    class="form-control"
                                    autocomplete="off"
                                    value="<?php if(isset($fullname)){echo$fullname;}?>">
                            </div>
                        </div> <!-- Full Name -->
                        <!------------------------ Location ------------------------>
                        <div class="col-md-4 col-sm-6">
                            <div class="form-group">
                                <label><?php echo words('Location') ?></label>
                                <input
                                    type="text"
                                    name="location"
                                    class="form-control"
                                    autocomplete="off"
                                    value="<?php if(isset($location)){echo$location;}?>">
                            </div>
                        </div> <!-- Location -->
                        <!------------------------ State ------------------------>
                        <div class="col-md-4 col-sm-6">
                            <div class="form-group">
                                <label><?php echo words('State') ?></label>
                                <div class="form-group">
                                    <select name="active" class="form-control">
                                        <option value="0" <?php if(isset($active)&&$active==0){echo'selected';}?>>
                                            <?php echo words('Disabled') ?>
                                        </option>
                                        <option value="1"<?php if (isset($active)&&$active==1){echo'selected';}?>>
                                            <?php echo words('Enabled') ?>
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div> <!-- State -->
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