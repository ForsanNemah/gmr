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
                    <a class="nav-link btn btn-dark btn-sm" aria-current="page" href="#" id="search">
                        <i class="fa fa-search fa-fw"></i>
                        <span><?php echo words('Search') ?></span>
                    </a>
                </li>
                <?php if ($_SESSION['idForsan']==2) { ?>
                <li class="nav-item">
                    <a class="nav-link btn btn-primary btn-sm" aria-current="page" href="?Page=Add">
                        <i class="fa fa-plus fa-fw"></i>
                        <span><?php echo words('Add') ?></span>
                    </a>
                </li>
                <?php } ?>
            </ul>
        </div>
    </nav> <!-- Navbar -->
    <!------------------------ Container ------------------------>
    <div class="container">
        <!------------------------ Search ------------------------>
        <div class="search">
            <div class="form-group">
                <input type="text" name="search" class="form-control text-center">
            </div>
        </div> <!-- Search -->
        <!------------------------ Table Responsive ------------------------>
        <div class="table-responsive">
            <!------------------------ Table ------------------------>
            <table class="table">
                <!------------------------ Table Head ------------------------>
                <thead>
                    <tr>
                        <th scope="col"><?php echo words('#') ?></th>
                        <th scope="col"><?php echo words('User Name') ?></th>
                        <th scope="col"><?php echo words('Email Name') ?></th>
                        <?php if (getCount('admins','id=?',array($_SESSION['idForsan'])) == 1) { ?>
                        <th scope="col"><?php echo words('Control') ?></th>
                        <?php } ?>
                    </tr>
                </thead> <!-- Table Head -->
                <!------------------------ Table Body ------------------------>
                <tbody>
                    <?php
                    $where = '1 = ?';
                    $value = array(1);
                    if (getCount('users','username=?',array($_SESSION['foursan'])) > 0) {
                        $where = 'user_id = ?';
                        $value = array(getItem('users',$_SESSION['foursan'],'username=?','id'));
                    } elseif (isset($_GET['User'])) {
                        $where = 'user_id = ?';
                        $value = array($_GET['User']);
                    }
                    $i = 1;
                    foreach (getData('email_names',$where,$value) as $all) {
                    ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo getItem('users',$all['user_id'],'id=?','username') ?></td>
                        <td><?php echo $all['em_name'] ?></td>
                        <?php if (getCount('admins','id=?',array($_SESSION['idForsan'])) == 1) { ?>
                        <td>
                            <?php if ($all['state'] == 0) { ?>
                            <a href="#stateEmailNames" class="btn btn-primary btn-sm"
                            data-id="<?php echo $all['id'] ?>">
                                <i class="fa fa-check fa-fw"></i>
                            </a>
                            <?php } else { ?>
                            <a href="#stateEmailNames" class="btn btn-danger btn-sm"
                            data-id="<?php echo $all['id'] ?>">
                                <i class="fa fa-xmark fa-fw"></i>
                            </a>
                        </td>
                        <?php } } ?>
                    </tr>
                    <?php $i++; } ?>
                </tbody> <!-- Table Body -->
            </table> <!-- Table -->
        </div> <!-- Table Responsive -->
    </div> <!-- Container -->
</div> <!-- Content -->
<!------------------------ Spinner Loading ------------------------>
<div class="overlay" id="spinnerLoading">
    <div class="spinner-loading">
        <span class="one"></span>
        <span class="two"></span>
        <span class="three"></span>
    </div> <!-- Spinner Loading -->
</div>