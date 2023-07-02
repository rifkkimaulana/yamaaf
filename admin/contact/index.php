<?php
include_once("../../config.php");
?>
<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data contact</h3>
                        <div class="card-tools">
                            <!-- This will cause the card to maximize when clicked -->
                            <a href='artikel/tambah.php?page=artikel' class="btn btn-info"><i
                                    class="fas fa-plus"></i>Tambah Contact</a>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <div class="card-body">
                        <table width='100%' id='example2' class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">No</th>
                                    <th>alamat 1/th>
                                    <th>alamat 2</th>
                                    <th>gmail</th>
                                    <th>no hp</th>
                                    <th>deskripsi</th>
                                    <th class="text-center">Gambar</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <?php
                            include_once("../../config.php");

                            // Query untuk mendapatkan data produk dengan kategori yang sesuai
                            $query = "SELECT tb_contact.*, tb_kategori_artikel.kategori_artikel
                            FROM tb_contact
                            INNER JOIN tb_kategori_artikel ON tb_artikel.id_kategori = tb_kategori_artikel.id
                            ORDER BY tb_artikel.id DESC";

                            $result = mysqli_query($koneksi, $query);
                            if (mysqli_num_rows($result) > 0) {
                                $no = 1; // Nomor urut
                            
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
                                                <?= $data['kategori_artikel'] ?>
                                            </td>
                                            <td>
                                                <?= $data['content_artikel'] ?>
                                            </td>
                                            <td><img src="artikel/image/<?= $data['cover'] ?>" width="100"></td>
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
                                    <td colspan="8">Tidak ada data contact.</td>
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