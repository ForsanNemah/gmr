<?php
$where = '1 = ?';
$value = array(1);
if (isset($_GET['Customer'])) {
    $where = 'customer = ?';
    $value = array(getItem('customers',$_GET['Customer'],'id=?','fullname'));
} elseif (isset($_GET['User'])) {
    $where = 'username = ?';
    $value = array(getItem('users',$_GET['User'],'id=?','username'));
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
                    <a class="nav-link btn btn-primary btn-sm" aria-current="page" href="#">
                        <i class="fa fa-sack-dollar fa-fw"></i>
                        <span>
                            Url :
                            <?php echo getCount('url_transactions',"ut_state=1 and $where", $value)?>
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-dark btn-sm" aria-current="page" href="#" id="search">
                        <i class="fa fa-search fa-fw"></i>
                        <span>Search</span>
                    </a>
                </li>
                <?php if (getCount('customers') > 0 && getCount('users') > 0) { ?>
                <li class="nav-item">
                    <a class="nav-link btn btn-primary btn-sm" aria-current="page" href="?Page=Add">
                        <i class="fa fa-add fa-fw"></i>
                        <span>Add New</span>
                    </a>
                </li>
                <?php } else { ?>
                <li class="nav-item">
                    <a class="nav-link btn btn-warning btn-sm" aria-current="page" href="#">
                        <i class="fa fa-info fa-fw"></i>
                        <span>You Must Add A User And A Customer</span>
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
                        <th scope="col">#</th>
                        <th scope="col">UserName</th>
                        <th scope="col">Customer</th>
                        <th scope="col">Phone</th>
                        <th scope="col">State</th>
                        <th scope="col">Control</th>
                    </tr>
                </thead> <!-- Table Head -->
                <!------------------------ Table Body ------------------------>
                <tbody>
                    <?php $i = 1; foreach (getData('url_transactions',$where,$value) as $all) { ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $all['username'] ?></td>
                        <td><?php echo $all['customer'] ?></td>
                        <td><?php echo $all['phone'] ?></td>
                        <td><?php echo printName($all['ut_state']) ?></td>
                        <input id="foo<?php echo $all['id']?>" type="hidden" value="<?php echo $all['ut_url'] ?>">
                        <td>
                            <a
                                href="#"
                                class="btn btn-primary btn-sm copy" 
                                data-clipboard-action="copy"
                                data-clipboard-target="#foo<?php echo $all['id']?>">
                                <i class="fa fa-copy fa-fw"></i>
                            </a>
                            <a href="<?php echo $all['ut_url'] ?>" class="btn btn-info btn-sm" target="_blank">
                                <i class="fa fa-eye fa-fw"></i>
                            </a>
                            <?php if (isset($_GET['Customer'])) { ?>
                            <?php if (getItem('url_transactions',$all['id'],'id=?','ut_state') == 0) { ?>
                            <a href="?Page=State&ID=<?php echo$all['id']?>&Customer=<?php echo$_GET['Customer']?>" class="btn btn-primary btn-sm">
                                <i class="fa fa-check fa-fw"></i>
                            </a>
                            <?php } else { ?>
                                <a href="?Page=State&ID=<?php echo$all['id']?>&Customer=<?php echo$_GET['Customer']?>" class="btn btn-danger btn-sm">
                                <i class="fa fa-xmark fa-fw"></i>
                            </a>
                            <?php } ?>
                            <?php } elseif (isset($_GET['User'])) { ?>
                            <?php if (getItem('url_transactions',$all['id'],'id=?','ut_state') == 0) { ?>
                            <a href="?Page=State&ID=<?php echo$all['id']?>&User=<?php echo$_GET['User']?>" class="btn btn-primary btn-sm">
                                <i class="fa fa-check fa-fw"></i>
                            </a>
                            <?php } else { ?>
                                <a href="?Page=State&ID=<?php echo$all['id']?>&User=<?php echo$_GET['User']?>" class="btn btn-danger btn-sm">
                                <i class="fa fa-xmark fa-fw"></i>
                            </a>
                            <?php } ?>
                            <?php } else { ?>
                            <?php if (getItem('url_transactions',$all['id'],'id=?','ut_state') == 0) { ?>
                            <a href="?Page=State&ID=<?php echo$all['id']?>" class="btn btn-primary btn-sm">
                                <i class="fa fa-check fa-fw"></i>
                            </a>
                            <?php } else { ?>
                                <a href="?Page=State&ID=<?php echo$all['id']?>" class="btn btn-danger btn-sm">
                                <i class="fa fa-xmark fa-fw"></i>
                            </a>
                            <?php } ?>
                            <?php } ?>
                        </td>
                    </tr>
                    <?php $i++; } ?>
                </tbody> <!-- Table Body -->
            </table> <!-- Table -->
        </div> <!-- Table Responsive -->
    </div> <!-- Container -->
</div> <!-- Content -->