<?php
// Check If Server User Coming From HTTP Post Request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get Variables From Form
    $customer = filterRequest('customer');
    $balance = filterRequest('balance');
    $desc = filterRequest('desc');
    $total = 0;
    // Array Errors
    $errors = array();
    // Balance Error
    if (empty($balance)) {
        $errors[] = words('Enter Balance');
    } elseif ($balance > getCount('url_transactions','ut_state=1 and username=?',array(getItem('users',$_GET['User'],'id=?','username')))) {
        $errors[] = words('The Balance Is Not Available');
    }
    // Add Informatio To Database
    if (empty($errors)) {
        $add = $con->prepare('INSERT INTO transactions(user_id, customer_id, balance, descr) VALUES(?, ?, ?, ?)');
        $add->execute(array(userId(), $customer, $balance, $desc));
        header('location: ?Page=View&User=' . $_GET['User']);
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
                    <a class="nav-link btn btn-danger btn-sm" aria-current="page" href="users.php?Page=View">
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
                    <?php echo words('Add New Cash Withdrawal') ?>
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
                            <?php }
                            } ?>
                        </div>
                        <!------------------------ UserName ------------------------>
                        <div class="col-md-4 col-sm-6">
                            <div class="form-group">
                                <label><?php echo words('User Name') ?></label>
                                <input
                                    type="text"
                                    class="form-control text-center" 
                                    autocomplete="off"
                                    readonly
                                    value="<?php echo getItem('users',userId(),'id=?','username')?>">
                            </div>
                        </div> <!-- UserName -->
                        <!------------------------ Customer ------------------------>
                        <div class="col-md-4 col-sm-6">
                            <div class="form-group">
                                <label><?php echo words('Customer') ?></label>
                                <select name="customer" class="chosen">
                                    <?php foreach (getData('customers') as $all) { ?>
                                    <option value="<?php echo $all['id'] ?>">
                                        <?php echo $all['fullname'] ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div> <!-- Customer -->
                        <!------------------------ Balance ------------------------>
                        <div class="col-md-4 col-sm-6">
                            <div class="form-group">
                                <label><?php echo words('Balance') ?></label>
                                <input
                                    type="number"
                                    class="form-control"
                                    autocomplete="off"
                                    name="balance"
                                    value="<?php if(isset($balance)){echo$balance;}?>">
                            </div>
                        </div> <!-- Balance -->
                        <!------------------------ Description ------------------------>
                        <div class="col-12">
                            <div class="form-group">
                                <label><?php echo words('Description') ?></label>
                                <textarea class="form-control" autocomplete="off" name="desc" rows="10"><?php if(isset($desc)){echo$desc;}?></textarea>
                            </div>
                        </div> <!-- Description -->
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