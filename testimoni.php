<!-- ======= Testimonials Section ======= -->
<section id="testimonials" class="testimonials">
    <div class="container" data-aos="zoom-in">
        <div class="quote-icon">
            <i class="bx bxs-quote-right"></i>
        </div>

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
            <div class="swiper-wrapper">
                <?php
                // Query untuk mendapatkan data dari tabel tb_team
                $query = mysqli_query($koneksi, "SELECT * FROM tb_team");
                while ($data = mysqli_fetch_array($query)) {
                    $nama = $data['nama'];
                    $jabatan = $data['jabatan'];
                    $deskripsi = $data['deskripsi'];
                    $cover = $data['cover'];
                    ?>
                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <p>
                                <?php echo $deskripsi; ?>
                            </p>
                            <img src="path/to/your/images/<?php echo $cover; ?>" class="testimonial-img" alt="" />
                            <h3>
                                <?php echo $nama; ?>
                            </h3>
                            <h4>
                                <?php echo $jabatan; ?>
                            </h4>
                        </div>
                    </div>
                    <!-- End testimonial item -->
                <?php } ?>

            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>
<!-- End Testimonials Section -->