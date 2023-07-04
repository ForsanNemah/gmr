<?php $username = $_SESSION['foursan'] ?>
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
            <ul class="navbar-nav <?php echo $navbar ?>-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link btn btn-success btn-sm" aria-current="page" href="?Page=Edit">
                        <i class="fa fa-edit fa-fw"></i>
                        <span>
                            <?php echo words('Change Password') ?>
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </nav> <!-- Navbar -->
    <!------------------------ Container ------------------------>
    <div class="container">
        <!------------------------ Profile ------------------------>
        <div class="profile">
            <!------------------------ Row ------------------------>
            <div class="row text-center">
                <!------------------------ UserName ------------------------>
                <div class="col-sm-6">
                    <div class="pro">
                        <p><?php echo words('User Name') ?></p>
                        <p><?php echo $username ?></p>
                    </div>
                </div> <!-- UserName -->
                <!------------------------ Phone ------------------------>
                <div class="col-sm-6">
                    <div class="pro">
                        <p><?php echo words('Phone') ?></p>
                        <p><?php echo getItem('users',$username,'username=?','phone') ?></p>
                    </div>
                </div> <!-- Phone -->
                <!------------------------ Email ------------------------>
                <div class="col-sm-6">
                    <div class="pro">
                        <p><?php echo words('Email') ?></p>
                        <p><?php echo getItem('users',$username,'username=?','email') ?></p>
                    </div>
                </div> <!-- Email -->
                <!------------------------ Registration Date And Time ------------------------>
                <div class="col-sm-6">
                    <div class="pro">
                        <p><?php echo words('Add Date') ?></p>
                        <p><?php echo getItem('users',$username,'username=?','us_date') ?></p>
                    </div>
                </div> <!-- Registration Date And Time -->
                <!------------------------ Main Email ------------------------>
                <div class="col-12">
                    <div class="pro">
                        <p><?php echo words('Main Email') ?></p>
                        <p><?php echo getItem('users',$username,'username=?','main_email') ?></p>
                    </div>
                </div> <!-- Main Email -->
            </div> <!-- Row -->
        </div> <!-- Profile -->
    </div> <!-- Container -->
</div> <!-- Content -->