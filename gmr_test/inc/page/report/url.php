<!------------------------ Content ------------------------>
<div class="content">
    <!------------------------ Navbar ------------------------>
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand">
            <span>
                <?php echo getItem('users', $_SESSION['foursan'], 'username = ?', 'username') ?>
            </span>
        </a>
    </nav> <!-- Navbar -->
    <!------------------------ Container ------------------------>
    <div class="container">
        <!------------------------ Url ------------------------>
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
                            <?php echo words('State') ?>
                        </th>
                        <th scope="col">
                            <?php echo words('Control') ?>
                        </th>
                    </tr>
                </thead> <!-- Table Head -->
                <!------------------------ Table Body ------------------------>
                <tbody>
                    <?php $i = 1; foreach (getData('url_transactions','username=?',array($_SESSION['foursan'])) as $all) { ?>
                    <tr>
                        <td><?php echo $i ?></td>
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
    </div>
</div>