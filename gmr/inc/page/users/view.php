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
                    <form action="excel.php?Page=Users" method="post">
                        <button type="submit" class="btn btn-success btn-sm" name="excel">
                        <i class="fa-sharp fa-solid fa-file-excel fa-fw"></i>
                        <span><?php echo words('Excel') ?></span>
                        </button>
                    </form>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-dark btn-sm" aria-current="page" href="#" id="search">
                        <i class="fa fa-search fa-fw"></i>
                        <span><?php echo words('Search') ?></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-primary btn-sm" aria-current="page" href="?Page=Add">
                        <i class="fa fa-plus fa-fw"></i>
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
                    <th scope="col"><?php echo words('#') ?></th>
                    <th scope="col"><?php echo words('User Name') ?></th>
                    <th scope="col"><?php echo words('Total Balance') ?></th>
                    <th scope="col"><?php echo words('Phone') ?></th>
                    <th scope="col"><?php echo words('Main Email') ?></th>
                    <th scope="col"><?php echo words('Emails') ?></th>
                    <th scope="col"><?php echo words('Add Date') ?></th>
                    <th scope="col"><?php echo words('State') ?></th>
                    <th scope="col"><?php echo words('Control') ?></th>
                </thead> <!-- Table Head -->
                <!------------------------ Table Body ------------------------>
                <tbody>
                    <?php
                    $i = 1;
                    $where = '1 = ?';
                    $value = array(1);
                    if (isset($_GET['ID'])&&!empty($_GET['ID'])) {
                        $where = 'id = ?';
                        $value = array($_GET['ID']);
                    }
                    foreach (getData('users', $where, $value) as $all) {
                    ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $all['username'] ?></td>
                        <td>
                            <?php echo getCount('url_transactions','ut_state=1 and username=?',array($all['username']))?>
                        </td>
                        <td><?php echo $all['phone'] ?></td>
                        <td><?php echo $all['main_email'] ?></td>
                        <td><?php echo $all['email'] ?></td>
                        <td><?php echo $all['us_date'] ?></td>
                        <td><?php echo printName($all['active']) ?></td>
                        <td>
                            <a href="urltransactions.php?Page=View&User=<?php echo $all['id'] ?>" class="btn btn-dark btn-sm">
                                <i class="fa fa-eye fa-fw"></i>
                            </a>
                            <a href="transactions.php?Page=View&User=<?php echo $all['id'] ?>" class="btn btn-info btn-sm">
                                <i class="fa fa-eye fa-fw"></i>
                            </a>
                            <a href="emailnames.php?Page=View&User=<?php echo $all['id'] ?>" class="btn btn-warning btn-sm">
                                <i class="fa fa-message fa-fw"></i>
                            </a>
                            <a href="transactions.php?Page=Add&User=<?php echo $all['id'] ?>" class="btn btn-primary btn-sm">
                                <i class="fa fa-add fa-fw"></i>
                            </a>
                            <a href="?Page=Edit&ID=<?php echo $all['id'] ?>" class="btn btn-success btn-sm">
                                <i class="fa fa-edit fa-fw"></i>
                            </a>
                            <a href="#delete" class="btn btn-danger btn-sm" data-id="<?php echo $all['id']?>" data-page="users">
                                <i class="fa fa-trash fa-fw"></i>
                            </a>
                            <?php if ($all['active'] == 0) { ?>
                            <a href="?Page=Active&ID=<?php echo $all['id'] ?>" class="btn btn-primary btn-sm">
                                <i class="fa fa-check fa-fw"></i>
                            </a>
                            <?php } ?>
                        </td>
                    </tr>
                    <?php $i++; } ?>
                </tbody> <!-- Table Body -->
            </table> <!-- Table -->
        </div> <!-- Table Responsive -->
    </div> <!-- Container -->
</div> <!-- Content -->