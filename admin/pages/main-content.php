<div class="content">
    <div class="container-fluid">
        <?php
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            switch ($page) {
                case 'dashboard':
                    include "dashboard/index.php";
                    break;
                case 'users':
                    include "users/index.php";
                    break;
                case 'artikel':
                    include "artikel/index.php";
                    break;
                case 'kategori':
                    include "kategori/index.php";
                    break;
                case 'about':
                    include "about/index.php";
                    break;
                case 'pengaturan':
                    include "pengaturan/index.php";
                    break;
                case 'faq':
                    include "faq/index.php";
                    break;
                case 'produk':
                    include "produk/index.php";
                    break;
                default:
                    echo "<center><h3>Maaf. Halaman tidak ditemukan!</h3></center>";
                    break;
            }
        } else {
            include "../dashboard/index.php";
        }
        ?>
    </div>
</div>