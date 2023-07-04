<div class="topbar">
    <div class="title-arae">
        <i class="fa fa-bars fa-fw" id="toggleSidebar"></i>
        <p>Get Mony From Gmail</p>
    </div>
    <div class="actions">
        <?php if (getCount('admins','username=?',array($_SESSION['foursan'])) > 0) { ?>
        <a href="settings.php?Page=Home">
            <i class="fa fa-cogs fa-fw"></i>
        </a>
        <?php } ?>
        <div class="users-area">
            <i class="fa fa-user fa-fw"></i>
            <div>
                <?php if ($_SESSION['idForsan'] == 2) { ?>
                <a href="accounts.php?Page=Profile">
                    <?php echo words('Show Profile') ?>
                </a>
                <?php } ?>
                <a href="logout.php">
                    <?php echo words('Logout') ?>
                </a>
            </div>
        </div>
    </div>
</div>