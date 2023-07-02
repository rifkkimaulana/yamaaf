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
                        <h3 class="card-title">Data Team</h3>
                        <div class="card-tools">
                            <!-- This will cause the card to maximize when clicked -->
                            <a href='team/tambah.php?page=team' class="btn btn-info"><i class="fas fa-plus"></i>Tambah
                                Team</a>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <div class="card-body">
                        <table width='100%' id='example2' class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">No</th>
                                    <th>Nama Lengkap</th>
                                    <th>Jabatan</th>
                                    <th>Deskripsi</th>
                                    <th class="text-center">Gambar</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <?php
                            include_once("../config.php");

                            $query = "SELECT * FROM tb_team";
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
                                                <?= $data['nama'] ?>
                                            </td>
                                            <td>
                                                <?= $data['jabatan'] ?>
                                            </td>
                                            <td>
                                                <?= $data['deskripsi'] ?>
                                            </td>
                                            <td class="text-center"><img src="../admin/team/image/<?= $data['cover'] ?>"
                                                    width="100"></td>
                                            <td class="text-center">
                                                <a class="btn btn-success"
                                                    href='team/ubah.php?id=<?= $data['id'] ?>&page=team'>Edit</a>
                                                <a class="btn btn-danger" onclick='return confirmDelete()'
                                                    href='team/hapus.php?id=<?= $data['id'] ?>&page=team'>Hapus</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <?php
                                }
                            } else {
                                ?>
                            <tr>
                                <td colspan="8">Tidak ada data team.</td>
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