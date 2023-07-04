<!------------------------ Content ------------------------>
<div class="content">
    <!------------------------ Navbar ------------------------>
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand">
            <span><?php echo words($pageTitle) ?></span>
        </a>
    </nav> <!-- Navbar -->
    <!------------------------ Dashboard ------------------------>
    <div class="dashboard">
        <!------------------------ Container ------------------------>
        <div class="container">
            <!------------------------ Boards ------------------------>
            <div class="boards">
                <!------------------------ Row ------------------------>
                <div class="row text-center">
                    <!------------------------ Admins Board ------------------------>
                    <div class="col-sm-6">
                        <div class="board">
                            <p><?php echo words('Admins') ?></p>
                            <span>
                                <?php echo getCount('admins') ?>
                            </span>
                        </div>
                    </div> <!-- Admins Board -->
                    <!------------------------ Users Board ------------------------>
                    <div class="col-sm-6">
                        <div class="board">
                            <p><?php echo words('Users') ?></p>
                            <span>
                                <?php echo getCount('users') ?>
                            </span>
                        </div>
                    </div> <!-- Users Board -->
                    <!------------------------ Transactions Board ------------------------>
                    <div class="col-12">
                        <div class="board">
                            <p><?php echo words('Transactions') ?></p>
                            <span>
                                <?php echo getCount('transactions') ?>
                            </span>
                        </div>
                    </div> <!-- Transactions Board -->
                </div> <!-- Row -->
            </div> <!-- Boards -->
            <!------------------------ Row ------------------------>
            <div class="row">
                <!------------------------ Last 5 Admins ------------------------>
                <div class="col-md-6">
                    <!------------------------ Panel ------------------------>
                    <div class="panel">
                        <!------------------------ Title ------------------------>
                        <div class="panel-heading">
                            <span><?php echo words('Last 5 Admins') ?></span>
                            <i class="fa fa-minus fa-fw"></i>
                        </div>
                        <!------------------------ Body ------------------------>
                        <div class="panel-body">
                            <?php foreach (getData('admins', '1 = ?', array(1), 'id', 'desc', 'limit 5') as $all) { ?>
                            <div>
                                <p><span><?php echo $all['username'] ?></p>
                                <div class="control">
                                    <a href="?Page=Active&ID=<?php echo $all['id'] ?>" class="btn btn-primary btn-sm">
                                        <i class="fa fa-check fa-fw"></i>
                                    </a>
                                    <a href="admins.php?Page=Edit&ID=<?php echo $all['id'] ?>" class="btn btn-success btn-sm">
                                        <i class="fa fa-edit fa-fw"></i>
                                    </a>
                                    <?php if ($all['id'] != 1) { ?>
                                    <a href="#delete" class="btn btn-danger btn-sm" data-id="<?php echo $all['id']?>" data-page="admins">
                                        <i class="fa fa-trash fa-fw"></i>
                                    </a>
                                    <?php } ?>
                                </div>
                            </div>
                            <?php } ?>
                        </div> <!-- Body -->
                    </div> <!-- Panel -->
                </div> <!-- Last 5 Admins -->
                <!------------------------ Last 5 Users ------------------------>
                <div class="col-md-6">
                    <!------------------------ Panel ------------------------>
                    <div class="panel">
                        <!------------------------ Title ------------------------>
                        <div class="panel-heading">
                            <span><?php echo words('Last 5 Users') ?></span>
                            <i class="fa fa-minus fa-fw"></i>
                        </div>
                        <!------------------------ Body ------------------------>
                        <div class="panel-body">
                            <?php foreach (getData('users', '1 = ?', array(1), 'id', 'desc', 'limit 5') as $all) { ?>
                            <div>
                                <p><?php echo $all['username'] ?></p>
                                <div class="control">
                                    <?php if ($all['active'] == 0) { ?>
                                    <a href="?Page=Active&ID=<?php echo $all['id'] ?>" class="btn btn-primary btn-sm">
                                        <i class="fa fa-check fa-fw"></i>
                                    </a>
                                    <?php } ?>
                                    <a href="admins.php?Page=Edit&ID=<?php echo $all['id'] ?>" class="btn btn-success btn-sm">
                                        <i class="fa fa-edit fa-fw"></i>
                                    </a>
                                    <?php if ($all['id'] != 1) { ?>
                                    <a href="#delete" class="btn btn-danger btn-sm" data-id="<?php echo $all['id']?>" data-page="admins">
                                        <i class="fa fa-trash fa-fw"></i>
                                    </a>
                                    <?php } ?>
                                </div>
                            </div>
                            <?php } ?>
                        </div> <!-- Body -->
                    </div> <!-- Panel -->
                </div> <!-- Last 5 Users -->
                <!------------------------ Last 5 Transactions ------------------------>
                <div class="col-md-6">
                    <!------------------------ Panel ------------------------>
                    <div class="panel">
                        <!------------------------ Title ------------------------>
                        <div class="panel-heading">
                            <span><?php echo words('Last 5 Transactions') ?></span>
                            <i class="fa fa-minus fa-fw"></i>
                        </div>
                        <!------------------------ Body ------------------------>
                        <div class="panel-body">
                            <?php foreach (getData('transactions', '1 = ?', array(1), 'id', 'desc', 'limit 5') as $all) { ?>
                            <div>
                                <p><?php echo getItem('users',$all['user_id'],'id=?','username') ?></p>
                            </div>
                            <?php } ?>
                        </div> <!-- Body -->
                    </div> <!-- Panel -->
                </div> <!-- Last 5 Transactions -->
            </div> <!-- Row -->
        </div> <!-- Container -->
    </div> <!-- Dashboard -->
</div> <!-- Content -->