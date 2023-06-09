<?php
// Check If Server User Coming From HTTP Post Request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get Variables From Form
    $username = filterRequest('username');
    $customer = filterRequest('customer');
    $phone = filterRequest('phone');
    $url = filterRequest('url');
    $state = filterRequest('state');
    // Array Errors
    $errors = array();
    // UserName Errors
    if (empty($username)) {
        $errors[] = 'UserName Can Not Be Empty';
    }
    // Customer Errors
    if (empty($customer)) {
        $errors[] = 'Customer Can Not Be Empty';
    }
    // Phone Errors
    if (empty($phone)) {
        $errors[] = 'Phone Can Not Be Empty';
    }
    // Url Errors
    if (empty($url)) {
        $errors[] = 'Url Can Not Be Empty';
    } elseif (getCount('url_transactions', 'ut_url=?', array($url))) {
        $errors[] = 'Url Is Already Exists';
    }
    // Add Informatio To Database
    if (empty($errors)) {
        $add = $con->prepare('INSERT INTO url_transactions(username, customer, phone, ut_url, ut_state) VALUES(?, ?, ?, ?, ?)');
        $add->execute(array($username, $customer, $phone, $url, $state));
        if ($add->rowCount() > 0) {
            $success = 'Added Successfully';
            $phone = '';
            $url = '';
            $state = 0;
        }
    }
}
?>
<!------------------------ Content ------------------------>
<div class="content">
    <!------------------------ Navbar ------------------------>
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand">
            <span><?php echo $pageTitle ?></span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link btn btn-danger btn-sm" aria-current="page" href="users.php?Page=View">
                        <i class="fa fa-chevron-left fa-fw"></i>
                        <span>Back</span>
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
                <div class="panel-heading">Add New Transactions</div>
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
                            <?php }
                            } ?>
                        </div>
                        <?php
                        if (isset($success)) {
                        echo "<div class='alert alert-success'>$success</div>";
                        }
                        ?>
                        <!------------------------ UserName ------------------------>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>UserName</label>
                                <select name="username" class="chosen">
                                    <?php foreach (getData('users') as $all) { ?>
                                    <option value="<?php echo $all['username']?>"
                                    <?php if(isset($username)&&$username==$all['username']){echo'selected';}?>>
                                        <?php echo $all['username'] ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div> <!-- UserName -->
                        <!------------------------ Customer ------------------------>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Customer</label>
                                <select name="customer" class="chosen">
                                    <?php foreach (getData('customers') as $all) { ?>
                                    <option value="<?php echo $all['fullname']?>"
                                    <?php if(isset($customer)&&$customer==$all['fullname']){echo'selected';}?>>
                                        <?php echo $all['fullname'] ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div> <!-- Customer -->
                        <!------------------------ Phone ------------------------>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Phone</label>
                                <input
                                    type="number"
                                    class="form-control"
                                    autocomplete="off" name="phone"
                                    value="<?php if(isset($phone)){echo$phone;}?>">
                            </div>
                        </div> <!-- Phone -->
                        <!------------------------ State ------------------------>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>State</label>
                                <div class="form-group">
                                    <select name="state" class="form-control">
                                        <option value="0"
                                        <?php if(isset($state)&& $state==0){echo 'selected';}?>>Disabled</option>
                                        <option value="1"
                                        <?php if(isset($state)&&$state==1){echo'selected';}?>>Enabled</option>
                                    </select>
                                </div>
                            </div>
                        </div> <!-- State -->
                        <!------------------------ Url ------------------------>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Url</label>
                                <input type="url" class="form-control" autocomplete="off" name="url" value="<?php if (isset($url)) {
                                                                                                                echo $url;
                                                                                                            } ?>">
                            </div>
                        </div> <!-- Url -->
                    </div> <!-- Raw -->
                </div> <!-- Body -->
            </div> <!-- Beasic -->
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-sm">Save</button>
            </div>
        </div> <!-- Container -->
    </form> <!-- Form -->
</div> <!-- Content -->