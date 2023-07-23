
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
            <div class="panel-heading"><?php echo words('General') ?></div>
            <!------------------------ Body ------------------------>
            <div class="panel-body">
                <!------------------------ Row ------------------------>
                <div class="row">
                    <!------------------------ Email ------------------------>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="setting">
                            <i class="fa fa-cogs fa-fw"></i>
                            <p><?php echo words('Email') ?></p>
                            <a href="?Page=Url&ID=1" class="btn btn-info btn-sm">
                                <?php echo words('Settings') ?>
                            </a>
                        </div> 
                    </div> <!-- Email -->
                    <!------------------------ Languages ------------------------>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="setting">
                            <i class="fa fa-language fa-fw"></i>
                            <p><?php echo words('Languages') ?></p>
                            <a href="?Page=Languages" class="btn btn-info btn-sm">
                                <?php echo words('Settings') ?>
                            </a>
                        </div> 
                    </div> <!-- Languages -->
                </div> <!-- Row -->
            </div> <!-- Body -->
        </div> <!-- Home -->
    </div> <!-- Container -->
</div> <!-- Content -->