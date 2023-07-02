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
                        <h3 class="card-title">Data Kategori</h3>
                        <div class="card-tools">
                            <a href='kategori/tambah.php?page=kategori' class="btn btn-info"><i
                                    class="fas fa-plus"></i>Tambah kategori</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table width='100%' id='example2' class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">No</th>
                                    <th>Nama Kategori</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <?php
                            $no = 1;
                            $result = mysqli_query($koneksi, "SELECT * FROM tb_kategori ORDER BY id DESC");

                            while ($data = mysqli_fetch_array($result)) {
                                ?>
                                <tbody>
                                    <tr>
                                        <td>
                                            <?= $no++ ?>
                                        </td>
                                        <td>
                                            <?= $data['kategori'] ?>
                                        </td>
                                        <td class="text-center">
                                            <a class="btn btn-success"
                                                href='kategori/ubah.php?id=<?= $data['id'] ?>&page=kategori'>Edit</a>
                                            <a class="btn btn-danger" onclick='return confirmDelete()'
                                                href='kategori/hapus.php?id=<?= $data['id'] ?>&page=kategori'>Hapus</a>
                                        </td>
                                    </tr>
                                </tbody>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>