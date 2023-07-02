<!-- ======= About Us Section ======= -->
<section id="about" class="about">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>About Us</h2>
        </div>

        <div class="row">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="image">
                    <?php
                    include 'config.php';
                    $queryAbout = "SELECT * FROM tb_about LIMIT 1";
                    $resultAbout = $koneksi->query($queryAbout);
                    if ($resultAbout && $resultAbout->num_rows > 0) {
                        $rowAbout = $resultAbout->fetch_assoc();
                        $image = $rowAbout['cover']; ?>
                        <img src="admin/about/image/<?php echo $image; ?>" class="img-fluid" alt="" />
                    <?php } ?>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="content pt-4 pt-lg-0 pl-0 pl-lg-3">
                    <?php
                    include 'config.php';
                    $queryAbout = "SELECT * FROM tb_about LIMIT 1";
                    $resultAbout = $koneksi->query($queryAbout);
                    if ($resultAbout && $resultAbout->num_rows > 0) {
                        $rowAbout = $resultAbout->fetch_assoc();
                        $paragraph1 = $rowAbout['isi1'];
                        $paragraph2 = $rowAbout['isi2'];
                        $image = $rowAbout['cover'];
                        ?>
                        <p class="fst-italic">
                            <?php echo $paragraph1; ?>
                        </p>
                        <p>
                            <?php echo $paragraph2; ?>
                        </p>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End About Us Section -->