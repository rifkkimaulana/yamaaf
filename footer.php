<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <?php
                    include 'config.php';
                    $query = mysqli_query($koneksi, "SELECT * FROM tb_footer WHERE id='1' ");
                    $data = mysqli_fetch_assoc($query);
                    ?>
                    <a href="#header" class="scrollto footer-logo"><img src="assets/img/hero-logo.png" alt="" /></a>
                    <h3>
                        <?php $namaperusahaan = $data['nama_perusahaan'];
                        echo $namaperusahaan; ?>
                    </h3>
                    <p>
                        <?php $deskripsi = $data['deskripsi'];
                        echo $deskripsi; ?>
                    </p>
                </div>
            </div>

            <div class="social-links">
                <a href="  <?php $twiter = $data['link_twitter'];
                echo $twiter; ?>" class="twitter"><i class="bx bxl-twitter"></i></a>

                <a href="<?php $facebook = $data['link_fb'];
                echo $facebook; ?>" class="facebook"><i class="bx bxl-facebook"></i></a>

                <a href="<?php $instagram = $data['link_ig'];
                echo $instagram; ?>" class="instagram"><i class="bx bxl-instagram"></i></a>

                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>

                <a href="<?php $linkedin = $data['link_lk'];
                echo $linkedin; ?>" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
        </div>
    </div>

    <div class="container footer-bottom clearfix">
        <div class="copyright">
            &copy; Copyright <strong><span>KELOMPOK 2 | TI-4A</span></strong>. All Rights Reserved
        </div>
    </div>
</footer>
<!-- End Footer -->