<?php
$where = '1 = ?';
$value = array(1);
$urlWhere = '1 = ?';
$urlValue = array(1);
if (isset($_GET['User'])&&!empty($_GET['User'])) {
    $where = 'user_id = ?';
    $value = array($_GET['User']);
    $urlWhere = 'username = ?';
    $urlValue = array(getItem('users',$_GET['User'],'id=?','username'));
}
$remaining = 0;
foreach (getData('transactions',$where,$value) as $all) {
    $remaining += $all['balance'];
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
                    <a class="nav-link btn btn-dark btn-sm" aria-current="page" href="#" id="search">
                        <i class="fa fa-search fa-fw"></i>
                        <span><?php echo words('Search') ?></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-primary btn-sm" aria-current="page" href="#">
                        <i class="fa fa-sack-dollar fa-fw"></i>
                        <span>
                            <?php echo words('Total') . ' : ' . getCount('url_transactions',"ut_state=1 and $urlWhere", $urlValue) ?>
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-primary btn-sm" aria-current="page" href="#">
                        <i class="fa fa-sack-dollar fa-fw"></i>
                        <span>
                            <?php echo words('Remaining') . ' : ' . getCount('url_transactions',"ut_state=1 and $urlWhere", $urlValue) - $remaining?>
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-primary btn-sm" aria-current="page" href="#">
                        <i class="fa fa-sack-dollar fa-fw"></i>
                        <span>
                            <?php echo words('Withdrawal') . ' : ' . $remaining ?>
                        </span>
                    </a>
                </li>
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
                        <th scope="col"><?php echo words('Customer') ?></th>
                        <th scope="col"><?php echo words('Description') ?></th>
                        <th scope="col"><?php echo words('Balance') ?></th>
                        <th scope="col"><?php echo words('Add Date') ?></th>
                    </tr>
                </thead> <!-- Table Head -->
                <!------------------------ Table Body ------------------------>
                <tbody>
                    <?php $i = 1; foreach (getData('transactions', $where, $value) as $all) { ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo getItem('users',$all['user_id'],'id=?', 'username') ?></td>
                        <td><?php echo getItem('customers',$all['customer_id'],'id=?','fullname') ?></td>
                        <td><?php echo $all['descr'] ?></td>
                        <td><?php echo $all['balance'] ?></td>
                        <td><?php echo $all['tr_date'] ?></td>
                    </tr>
                    <?php $i++; } ?>
                </tbody> <!-- Table Body -->
            </table> <!-- Table -->
        </div> <!-- Table Responsive -->
    </div> <!-- Container -->
</div> <!-- Content -->