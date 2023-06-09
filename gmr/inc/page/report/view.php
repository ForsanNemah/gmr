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
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                    <a class="nav-link btn btn-primary btn-sm" aria-current="page" href="#">
                        <i class="fa fa-sack-dollar fa-fw"></i>
                        <span>Total : <?php echo $total ?></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-primary btn-sm" aria-current="page" href="#">
                        <i class="fa fa-sack-dollar fa-fw"></i>
                        <span>Remaining : <?php echo getCount('url_transactions',"ut_state=1 and username=?",array($_SESSION['foursan']))-$remaining?></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-primary btn-sm" aria-current="page" href="#">
                        <i class="fa fa-sack-dollar fa-fw"></i>
                        <span>Withdrawal : <?php echo $remaining ?></span>
                    </a>
                </li>
            </ul>
        </div>
    </nav> <!-- Navbar -->
    <!------------------------ Container ------------------------>
    <div class="container">
        <!------------------------ Transactions ------------------------>
        <div class="panel">
            <div class="panel-heading">Transactions</div>
            <div class="panel-body">
                <!------------------------ Table Responsive ------------------------>
                <div class="table-responsive">
                    <!------------------------ Table ------------------------>
                    <table class="table">
                        <!------------------------ Table Head ------------------------>
                        <thead>
                            <tr>
                                <th scope="col">UserName</th>
                                <th scope="col">Customer</th>
                                <th scope="col">Balance</th>
                                <th scope="col">Description</th>
                                <th scope="col">Date</th>
                            </tr>
                        </thead> <!-- Table Head -->
                        <!------------------------ Table Body ------------------------>
                        <tbody>
                            <?php foreach (getData('transactions','user_id=?',array(getItem('users',$_SESSION['foursan'],'username=?','id'))) as $all) { $i = 1; ?>
                            <tr>
                                <td><?php echo getItem('users',$all['user_id'],'id=?', 'username') ?></td>
                                <td><?php echo getItem('customers',$all['customer_id'],'id=?','fullname') ?></td>
                                <td><?php echo $all['balance'] ?></td>
                                <td><?php echo $all['descr'] ?></td>
                                <td><?php echo $all['tr_date'] ?></td>
                            </tr>
                            <?php } ?>
                        </tbody> <!-- Table Body -->
                    </table> <!-- Table -->
                </div> <!-- Table Responsive -->
            </div>
        </div> <!-- Transactions -->
        <!------------------------ Url ------------------------>
        <div class="panel">
            <div class="panel-heading">Url</div>
            <div class="panel-body">
                <!------------------------ Table Responsive ------------------------>
                <div class="table-responsive">
                    <!------------------------ Table ------------------------>
                    <table class="table">
                        <!------------------------ Table Head ------------------------>
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Url</th>
                        <th scope="col">State</th>
                        <th scope="col">Control</th>
                    </tr>
                </thead> <!-- Table Head -->
                <!------------------------ Table Body ------------------------>
                <tbody>
                    <?php $i = 1; foreach (getData('url_transactions','username=?',array($_SESSION['foursan'])) as $all) { ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $all['ut_url'] ?></td>
                        <td><?php echo printName($all['ut_state']) ?></td>
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
                        </td>
                        <input id="foo<?php echo $all['id']?>" type="hidden" value="<?php echo $all['ut_url'] ?>">
                    </tr>
                    <?php $i++; } ?>
                </tbody> <!-- Table Body -->
                    </table> <!-- Table -->
                </div> <!-- Table Responsive -->
            </div>
        </div> <!-- Url -->
    </div> <!-- Container -->
</div> <!-- Content -->