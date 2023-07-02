<!-- ======= Team Section ======= -->
<section id="team" class="team">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Team</h2>
            <p>
                Magnam dolores commodi suscipit eius consequatur ex aliquid fuga
                eum quidem
            </p>
        </div>

        <div class="row">
            <?php
            // Ambil data dari tabel tb_team
            $result = mysqli_query($koneksi, "SELECT * FROM tb_team");
            while ($data = mysqli_fetch_array($result)) {
                $nama = $data['nama'];
                $jabatan = $data['jabatan'];
                $deskripsi = $data['deskripsi'];
                $gambar = $data['cover'];
                ?>
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                    <div class="member" data-aos="zoom-in">
                        <div class="member-img">
                            <img src="assets/img/team/<?php echo $gambar; ?>" class="img-fluid" alt="" />
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="member-info">
                            <h4>
                                <?php echo $nama; ?>
                            </h4>
                            <span>
                                <?php echo $jabatan; ?>
                            </span>
                            <p>
                                <?php echo $deskripsi; ?>
                            </p>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>
<!-- End Team Section -->