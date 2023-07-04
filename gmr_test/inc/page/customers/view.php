<?php
$url = 0;
foreach (getData('url_transactions') as $all) {
    if ($all['ut_state'] == 1) {
        $url += $all['ut_state'];
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
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav <?php echo $navbar ?>-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link btn btn-primary btn-sm" aria-current="page" href="#">
                        <i class="fa fa-sack-dollar fa-fw"></i>
                        <span><?php echo words('Url') . ' : ' . $url ?></span>
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
                    <tr>
                        <th scope="col"><?php echo words('#') ?></th>
                        <th scope="col"><?php echo words('Full Name') ?></th>
                        <th scope="col"><?php echo words('Location') ?></th>
                        <th scope="col"><?php echo words('Total Url') ?></th>
                        <th scope="col"><?php echo words('Add Date') ?></th>
                        <th scope="col"><?php echo words('State') ?></th>
                        <th scope="col"><?php echo words('Control') ?></th>
                    </tr>
                </thead> <!-- Table Head -->
                <!------------------------ Table Body ------------------------>
                <tbody>
                    <?php $i =1; foreach (getData('customers') as $all) { ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $all['fullname'] ?></td>
                        <td><?php echo $all['cu_location'] ?></td>
                        <td>
                            <?php
                                echo getCount('url_transactions','ut_state = 1 and customer = ?',array($all['fullname']));
                            ?>
                        </td>
                        <td><?php echo $all['cu_date'] ?></td>
                        <td><?php echo printName($all['active']) ?></td>
                        <td>
                            <a href="urltransactions.php?Page=View&Customer=<?php echo $all['id'] ?>" class="btn btn-dark btn-sm">
                                <i class="fa fa-eye fa-fw"></i>
                            </a>
                            <a href="?Page=Edit&ID=<?php echo $all['id'] ?>" class="btn btn-success btn-sm">
                                <i class="fa fa-edit fa-fw"></i>
                            </a>
                            <a href="#delete" class="btn btn-danger btn-sm" data-id="<?php echo $all['id']?>" data-page="customers">
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