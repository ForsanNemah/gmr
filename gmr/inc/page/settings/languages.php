<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $lang = filterRequest('lang');
    $edit = $con->prepare('UPDATE settings SET languages = ? WHERE id = ?');
    $edit->execute(array($lang, 1));
    if ($edit->rowCount() > 0) {
        header('location: ?Page=Languages');
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
    </nav> <!-- Navbar -->
    <!------------------------ Container ------------------------>
    <div class="container">
        <!------------------------ Home ------------------------>
        <div class="panel">
            <!------------------------ Title ------------------------>
            <div class="panel-heading"><?php echo words('Chosse Language') ?></div>
            <!------------------------ Body ------------------------>
            <div class="panel-body">
                <!------------------------ Row ------------------------>
                <div class="row">
                    <!------------------------ English ------------------------>
                    <div class="col-sm-6">
                        <form class="setting" method="post">
                            <i class="fa fa-language fa-fw"></i>
                            <input type="hidden" name="lang" value="en">
                            <p>English</p>
                            <button type="submit" class="btn btn-primary btn-sm">
                                <?php echo words('Chosse') ?>
                            </button>
                        </form> 
                    </div> <!-- English -->
                    <!------------------------ Arabic ------------------------>
                    <div class="col-sm-6">
                        <form class="setting" method="post">
                            <i class="fa fa-language fa-fw"></i>
                            <input type="hidden" name="lang" value="ar">
                            <p>العربية</p>
                            <button type="submit" class="btn btn-primary btn-sm">
                                <?php echo words('Chosse') ?>
                            </button>
                        </form> 
                    </div> <!-- Arabic -->
                </div> <!-- Row -->
            </div> <!-- Body -->
        </div> <!-- Home -->
    </div> <!-- Container -->
</div> <!-- Content -->