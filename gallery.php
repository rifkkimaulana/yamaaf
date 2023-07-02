<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>GALLERY</h2>
            <p>Melalui gallery, pengunjung dapat menjelajahi berbagai produk, layanan, atau karya seni dengan mudah.</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-12 d-flex justify-content-center">
                <ul id="portfolio-flters">
                    <li data-filter="*" class="filter-active">All</li>
                    <?php
                    // Query untuk mendapatkan nama kategori dari tb_kategori
                    $query_kategori = "SELECT * FROM tb_kategori";
                    $result_kategori = mysqli_query($koneksi, $query_kategori);
                    while ($data_kategori = mysqli_fetch_assoc($result_kategori)) {
                        echo '<li data-filter=".' . $data_kategori['kategori'] . '">' . $data_kategori['kategori'] . '</li>';
                    }
                    ?>
                </ul>
            </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
            <?php
            // Query untuk mendapatkan data produk berdasarkan kategori yang dipilih
            $query_produk = "SELECT p.*, k.kategori FROM tb_produk p
                            INNER JOIN tb_kategori k ON p.id_kategori = k.id
                            ORDER BY p.id ASC";
            $result_produk = mysqli_query($koneksi, $query_produk);
            while ($data_produk = mysqli_fetch_assoc($result_produk)) {
                echo '<div class="col-lg-4 col-md-6 portfolio-item ' . $data_produk['kategori'] . '">';
                echo '<div class="portfolio-wrap">';
                echo '<img src="admin/produk/image/' . $data_produk['image'] . '" class="img-fluid" alt="" />';
                echo '<div class="portfolio-info">';
                echo '<h4>' . $data_produk['nama_produk'] . '</h4>';
                echo '<p>' . $data_produk['kategori'] . '</p>';
                echo '<div class="portfolio-links">';
                echo '<a href="admin/produk/image/' . $data_produk['image'] . '" data-gallery="portfolioGallery" class="portfolio-lightbox" title="' . $data_produk['nama_produk'] . '"><i class="bx bx-plus"></i></a>';
                echo '<a href="detail_produk.php?id=' . $data_produk['id'] . '" title="More Details"><i class="bx bx-link"></i></a>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
</section>
<!-- End Portfolio Section -->