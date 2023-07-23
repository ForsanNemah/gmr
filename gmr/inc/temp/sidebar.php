<div class="sidebar">
    <ul class="menu">
        <?php if ($_SESSION['idForsan']==1) { ?>
        <li>
            <a href="dashboard.php" class="active active-dashboard-class">
                <span><?php echo words('Dashboard') ?></span>
            </a>
        </li>
        <li>
            <a href="admins.php?Page=View" class="active-admins-class">
                <span><?php echo words('Admins') ?></span>
            </a>
        </li>
        <li>
            <a href="customers.php?Page=View" class="active-customers-class">
                <span><?php echo words('Customers') ?></span>
            </a>
        </li>
        <li>
            <a href="users.php?Page=View" class="active-users-class">
                <span><?php echo words('Users') ?></span>
            </a>
        </li>
        <li>
            <a href="transactions.php?Page=View" class="active-transactions-class">
                <span><?php echo words('Transactions') ?></span>
            </a>
        </li>
        <li>
            <a href="urltransactions.php?Page=View" class="active-url-transactions-class">
                <span><?php echo words('Url Transactions') ?></span>
            </a>
        </li>
        <li>
            <a href="emailnames.php?Page=View" class="active-emailnames-class">
                <span><?php echo words('Email Names') ?></span>
            </a>
        </li>
        <?php } else { ?>
        <li>
            <a href="report.php?Page=Report" class="active-report-class">
                <span><?php echo words('Report') ?></span>
            </a>
        </li>
        <li>
            <a href="report.php?Page=Url" class="active-url-class">
                <span><?php echo words('Url Report') ?></span>
            </a>
        </li>
        <li>
            <a href="emailnames.php?Page=View" class="active-emailnames-class">
                <span><?php echo words('Email Names') ?></span>
            </a>
        </li>
        <?php } ?>
    </ul>
</div>