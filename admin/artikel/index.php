<?php
include_once("../config.php");
?>
<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Artikel</h3>
                        <div class="card-tools">
                            <!-- This will cause the card to maximize when clicked -->
                            <a href='artikel/tambah.php?page=artikel' class="btn btn-info"><i
                                    class="fas fa-plus"></i>Tambah Artikel</a>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <div class="card-body">
                        <table width='100%' id='example2' class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">No</th>
                                    <th>Judul Artikel</th>
                                    <th>Kategori Artikel</th>
                                    <th>Content</th>
                                    <th class="text-center">Gambar</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <?php
                            include_once("../config.php");

                            $query = "SELECT tb_artikel.*, tb_kategori.kategori
                            FROM tb_artikel
                            INNER JOIN tb_kategori ON tb_artikel.id_kategori = tb_kategori.id
                            ORDER BY tb_artikel.id DESC";

                            $result = mysqli_query($koneksi, $query);
                            if (mysqli_num_rows($result) > 0) {
                                $no = 1;

                                while ($data = mysqli_fetch_array($result)) {
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <?= $no++ ?>
                                            </td>
                                            <td>
                                                <?= $data['judul_artikel'] ?>
                                            </td>
                                            <td>
                                                <?= $data['kategori'] ?>
                                            </td>
                                            <td>
                                                <?= $data['content_artikel'] ?>
                                            </td>
                                            <td><img src="../admin/artikel/image/<?= $data['cover'] ?>" width="100"></td>
                                            <td class="text-center">
                                                <a class="btn btn-success"
                                                    href='artikel/ubah.php?id=<?= $data['id'] ?>&page=artikel'>Edit</a>
                                                <a class="btn btn-danger" onclick='return confirmDelete()'
                                                    href='artikel/hapus.php?id=<?= $data['id'] ?>&page=artikel'>Hapus</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <?php
                                }
                            } else {
                                ?>
                            <tr>
                                <td colspan="8">Tidak ada data artikel.</td>
                            </tr>
                            <?php
                            }
                            ?>

                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>