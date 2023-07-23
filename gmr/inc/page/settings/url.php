<?php
// Check If Server User Coming From HTTP Post Request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get Variables From Form
    $urltransactions = filterRequest('urltransactions');
    // Edit Informatio To Database
    $edit = $con->prepare('UPDATE settings SET url_email = ? WHERE id = ?');
    $edit->execute(array($urltransactions, id()));
    header('location: ?Page=Home');
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
                    <a class="nav-link btn btn-danger btn-sm" aria-current="page" href="?Page=Home">
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
            <!------------------------ Status ------------------------>
            <div class="panel">
                <!------------------------ Title ------------------------>
                <div class="panel-heading"><?php echo words('State') ?></div>
                <!------------------------ Body ------------------------>
                <div class="panel-body">
                    <!------------------------ Raw ------------------------>
                    <div class="row">
                        <!------------------------ Url Transactions ------------------------>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="form-group">
                                <label>
                                    <?php echo words('Url Transactions') ?>
                                </label>
                                <select name="urltransactions" class="form-control">
                                    <?php foreach (status() as $k => $v) { ?>
                                    <option value="<?php echo $k ?>"
                                    <?php if((isset($urltransactions)&&$$urltransactions==$k)||getItem('settings',id(),'id=?','url_email')==$k){echo'selected';}?>>
                                        <?php echo $v ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div> <!-- Url Transactions -->
                    </div> <!-- Raw -->
                </div> <!-- Body -->
            </div> <!-- Status -->
            <div class="form-group">
                <button type="submit" class="btn btn-success btn-sm">
                    <?php echo words('Edit') ?>
                </button>
            </div>
        </div> <!-- Container -->
    </form> <!-- Form -->
</div> <!-- Content -->