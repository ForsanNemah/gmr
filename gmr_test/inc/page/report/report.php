<?php
$id = getItem('users',$_SESSION['foursan'],'username=?','id');
$total = getCount('url_transactions',"ut_state=1 and username=?", array($_SESSION['foursan']));
$remaining = 0;
foreach (getData('transactions','user_id=?',array($id)) as $all) {
    $remaining += $all['balance'];
}
?>
<!------------------------ Content ------------------------>
<div class="content">
    <!------------------------ Navbar ------------------------>
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand">
            <span>
                <?php echo getItem('users', $_SESSION['foursan'], 'username = ?', 'username') ?>
            </span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav <?php echo $navbar ?>-auto mb-2 mb-lg-0">
            <li class="nav-item">
                    <a class="nav-link btn btn-primary btn-sm" aria-current="page" href="#">
                        <i class="fa fa-sack-dollar fa-fw"></i>
                        <span><?php echo words('Total') . ' : ' . $total ?></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-primary btn-sm" aria-current="page" href="#">
                        <i class="fa fa-sack-dollar fa-fw"></i>
                        <span><?php echo words('Remaining') . ' : ' . getCount('url_transactions',"ut_state=1 and username=?",array($_SESSION['foursan']))-$remaining?></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-primary btn-sm" aria-current="page" href="#">
                        <i class="fa fa-sack-dollar fa-fw"></i>
                        <span><?php echo words('Withdrawal') . ' : ' . $remaining ?></span>
                    </a>
                </li>
            </ul>
        </div>
    </nav> <!-- Navbar -->
    <!------------------------ Container ------------------------>
    <div class="container">
        <!------------------------ Transactions ------------------------>
        <div class="panel">
            <div class="panel-heading">
                <?php echo words($pageTitle) ?>
            </div>
            <div class="panel-body">
                <!------------------------ Table Responsive ------------------------>
                <div class="table-responsive">
                    <!------------------------ Table ------------------------>
                    <table class="table">
                        <!------------------------ Table Head ------------------------>
                        <thead>
                            <tr>
                                <th scope="col">
                                    <?php echo words('#') ?>
                                </th>
                                <th scope="col">
                                    <?php echo words('Customer') ?>
                                </th>
                                <th scope="col">
                                    <?php echo words('Balance') ?>
                                </th>
                                <th scope="col">
                                    <?php echo words('Description') ?>
                                </th>
                                <th scope="col">
                                    <?php echo words('Date') ?>
                                </th>
                            </tr>
                        </thead> <!-- Table Head -->
                        <!------------------------ Table Body ------------------------>
                        <tbody>
                            <?php $i = 1; foreach (getData('transactions','user_id=?',array(getItem('users',$_SESSION['foursan'],'username=?','id'))) as $all) { $i = 1; ?>
                            <tr>
                                <td><?php echo $i ?></td>
                                <td><?php echo getItem('customers',$all['customer_id'],'id=?','fullname') ?></td>
                                <td><?php echo $all['balance'] ?></td>
                                <td><?php echo $all['descr'] ?></td>
                                <td><?php echo $all['tr_date'] ?></td>
                            </tr>
                            <?php $i++; } ?>
                        </tbody> <!-- Table Body -->
                    </table> <!-- Table -->
                </div> <!-- Table Responsive -->
            </div>
        </div> <!-- Transactions -->
    </div> <!-- Container -->
</div> <!-- Content -->