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
                        <h3 class="card-title">Data FAQ</h3>
                        <div class="card-tools">
                            <a href='faq/tambah.php?page=faq' class="btn btn-info"><i class="fas fa-plus"></i>Tambah
                                FAQ</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table width='100%' id='example2' class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">No</th>
                                    <th>Pertanyaan</th>
                                    <th>Jawaban</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <?php
                            $no = 1;
                            $result = mysqli_query($koneksi, "SELECT * FROM tb_faq ORDER BY id DESC");

                            while ($data = mysqli_fetch_array($result)) {
                                ?>
                                <tbody>
                                    <tr>
                                        <td>
                                            <?= $no++ ?>
                                        </td>
                                        <td>
                                            <?= $data['pertanyaan'] ?>
                                        </td>
                                        <td>
                                            <?= $data['jawaban'] ?>
                                        </td>
                                        <td class="text-center">
                                            <a class="btn btn-success"
                                                href='faq/ubah.php?id=<?= $data['id'] ?>&page=faq'>Edit</a>
                                            <a class="btn btn-danger" onclick='return confirmDelete()'
                                                href='faq/hapus.php?id=<?= $data['id'] ?>&page=faq'>Hapus</a>
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