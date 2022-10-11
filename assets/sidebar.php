<nav class="side-navbar">
    <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <div class="sidenav-header d-flex align-items-center justify-content-center">
            <!-- User Info-->
            <div class="sidenav-header-inner text-center"><img src="img/avatar.png" alt="person" class="img-fluid rounded-circle">
                <h5 class="h5"><?= $_SESSION['nome'] ?></h5>
                Psicólogo
            </div>
            <!-- Small Brand information, appears on minimized sidebar-->
            <div class="sidenav-header-logo"><a href="index.php" class="brand-small text-center"> <strong>S</strong><strong class="text-primary">P</strong></a></div>
        </div>
        <!-- Sidebar Navigation Menus-->
        <?php
        include_once './assets/navbar.php';
        ?>
    </div>
</nav>