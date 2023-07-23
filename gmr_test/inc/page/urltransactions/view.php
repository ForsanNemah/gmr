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
            <span><?php echo words($pageTitle) ?></span>
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
                        <span>
                            <?php echo words('Url') . ' : ' . getCount('url_transactions',"ut_state=1 and $where", $value)?>
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-dark btn-sm" aria-current="page" href="#" id="search">
                        <i class="fa fa-search fa-fw"></i>
                        <span><?php echo words('Search') ?></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-primary btn-sm" aria-current="page" href="?Page=Add">
                        <i class="fa fa-add fa-fw"></i>
                        <span><?php echo words('Add') ?></span>
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
                        <th scope="col"><?php echo words('ID') ?></th>
                        <th scope="col"><?php echo words('User Name') ?></th>
                        <th scope="col"><?php echo words('Customer') ?></th>
                        <th scope="col"><?php echo words('Email Name') ?></th>
                        <th scope="col"><?php echo words('Phone') ?></th>
                        <th scope="col"><?php echo words('State') ?></th>
                        <th scope="col"><?php echo words('Add Date') ?></th>
                        <th scope="col"><?php echo words('Control') ?></th>
                    </tr>
                </thead> <!-- Table Head -->
                <!------------------------ Table Body ------------------------>
                <tbody>
                    <?php $i = 1; foreach (getData('url_transactions',$where,$value) as $all) { ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $all['id'] ?></td>
                        <td><?php echo $all['username'] ?></td>
                        <td><?php echo $all['customer'] ?></td>
                        <td><?php echo $all['email_name'] ?></td>
                        <td><?php echo $all['phone'] ?></td>
                        <td><?php echo printName($all['ut_state']) ?></td>
                        <input id="foo<?php echo $all['id']?>" type="hidden" value="<?php echo $all['ut_url'] ?>">
                        <td><?php echo $all['ut_date'] ?></td>
                        <td>
                            <a
                                class="btn btn-primary btn-sm copy" 
                                data-clipboard-action="copy"
                                data-clipboard-target="#foo<?php echo $all['id']?>">
                                <i class="fa fa-copy fa-fw"></i>
                            </a>
                            <a
                                href="?Page=Checked&ID=<?php echo $all['id'] ?>"
                                class="btn btn-info btn-sm"
                                <?php if($all['checked']==1){echo'style="background-color: red;"';}?>>
                                <i class="fa fa-eye fa-fw"></i>
                            </a>
                            <?php if ($all['ut_state'] == 0) { ?>
                            <a href="#state" class="btn btn-primary btn-sm"
                            data-id="<?php echo $all['id'] ?>">
                                <i class="fa fa-check fa-fw"></i>
                            </a>
                            <?php } else { ?>
                            <a href="#state" class="btn btn-danger btn-sm"
                            data-id="<?php echo $all['id'] ?>">
                                <i class="fa fa-xmark fa-fw"></i>
                            </a>
                            <?php } ?>
                            <a href="https://wa.me/<?php echo$all['phone']?>" class="btn btn-sm" target="_blank">
                                <img src="lay/img/whatsapp.png" alt="whatsapp" width="30" height="30">
                            </a>
                        </td>
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