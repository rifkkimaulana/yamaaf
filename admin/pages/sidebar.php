<?php
$base_url = "http://localhost/yamaaf/";
$page = isset($_GET['page']) ? $_GET['page'] : '';
?>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="<?= $base_url ?>admin/dashboard.php?page=dashboard" class="brand-link">
        <span class="brand-text font-weight-light"><b>ADMIN DASHBOARD</b></span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="#" class="d-block">
                    <?= isset($_SESSION['username']) ? $_SESSION['username'] : 'GUEST'; ?>
                </a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="<?= $base_url ?>admin/dashboard.php?page=dashboard"
                        class="nav-link <?php echo ($page == 'dashboard') ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Dashboard
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= $base_url ?>admin/dashboard.php?page=users"
                        class="nav-link <?php echo ($page == 'users') ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Users
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= $base_url ?>admin/dashboard.php?page=produk"
                        class="nav-link <?php echo ($page == 'produk') ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>
                            Produk
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= $base_url ?>admin/dashboard.php?page=artikel"
                        class="nav-link <?php echo ($page == 'artikel') ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>
                            Artikel
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= $base_url ?>admin/dashboard.php?page=kategori"
                        class="nav-link <?php echo ($page == 'kategori') ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-tags"></i>
                        <p>
                            Kategori
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= $base_url ?>admin/dashboard.php?page=team"
                        class="nav-link <?php echo ($page == 'team') ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Team
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= $base_url ?>admin/dashboard.php?page=faq"
                        class="nav-link <?php echo ($page == 'faq') ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-question-circle"></i>
                        <p>
                            FAQ
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= $base_url ?>admin/about/index.php?id=1&page=about"
                        class="nav-link <?php echo ($page == 'about') ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-info-circle"></i>
                        <p>
                            About
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= $base_url ?>admin/pengaturan/index.php?id=1&page=pengaturan"
                        class="nav-link <?php echo ($page == 'pengaturan') ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Pengaturan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= $base_url ?>admin/logout.php" class="nav-link"
                        onclick="return confirm('Apakah Anda yakin ingin keluar?')">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</aside>