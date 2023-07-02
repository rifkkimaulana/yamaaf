<div class="content-header">
    <div class="container-fluid">
        <?php
        if (isset($_GET['page'])) {
            $page = $_GET['page'];

            switch ($page) {
                case 'dashboard':
                    include "dashboard/content-header.php";
                    break;
                case 'users':
                    include "users/content-header.php";
                    break;
                case 'artikel':
                    include "artikel/content-header.php";
                    break;
                case 'kategori_artikel':
                    include "kategori_artikel/content-header.php";
                    break;
                case 'about':
                    include "about/content-header.php";
                    break;
                case 'pengaturan':
                    include "pengaturan/content-header.php";
                    break;
                default:
                    echo "<center><h3>Maaf. Halaman tidak ditemukan!</h3></center>";
                    break;
            }
        } else {
            include "dashboard/content-header.php";
        }
        ?>
    </div>
</div>