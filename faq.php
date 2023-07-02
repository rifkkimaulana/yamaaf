<section id="faq" class="faq">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Frequently Asked Questions</h2>
        </div>

        <ul class="faq-list">
            <?php
            $query = "SELECT id, pertanyaan, jawaban FROM tb_faq";
            $result = mysqli_query($koneksi, $query);

            while ($data = mysqli_fetch_assoc($result)) {
                $id = $data['id'];
                $pertanyaan = $data['pertanyaan'];
                $jawaban = $data['jawaban'];
                ?>
                <li data-aos="fade-up">
                    <a data-bs-toggle="collapse" class="collapsed" data-bs-target="#faq<?= $id ?>">
                        <?= $pertanyaan ?>
                        <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-x icon-close"></i>
                    </a>
                    <div id="faq<?= $id ?>" class="collapse" data-bs-parent=".faq-list">
                        <p>
                            <?= $jawaban ?>
                        </p>
                    </div>
                </li>
            <?php } ?>
        </ul>
    </div>
</section>