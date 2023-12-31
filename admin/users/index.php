<?php
include_once("../config.php");
?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Users</h3>
                        <div class="card-tools">
                            <a href='users/tambah.php?page=users' class="btn btn-info"><i class="fas fa-plus"></i>Tambah
                                Users</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table width='100%' id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Lengkap</th>
                                    <th>Username</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <?php
                            $no = 1;
                            $result = mysqli_query($koneksi, "SELECT * FROM tb_users ORDER BY id DESC");
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
                                            <?= $data['username'] ?>
                                        </td>
                                        <td>
                                            <a class="btn btn-success"
                                                href='users/ubah.php?id=<?= $data['id'] ?>&page=users'>Edit</a>
                                            <?php if ($data['username'] != 'admin') { ?>
                                                <a class="btn btn-danger" onclick='return confirmDelete()'
                                                    href='users/hapus.php?id=<?= $data['id'] ?>&page=users'>Hapus</a>
                                            <?php } ?>
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