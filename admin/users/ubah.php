<?php
include_once("../../config.php");
include('session.php');
$id = @$_GET['id'];
$result = mysqli_query($koneksi, "SELECT * FROM tb_users WHERE id=$id");
while ($user_data = mysqli_fetch_array($result)) {
    $row_nama_lengkap = $user_data['nama'];
    $row_username = $user_data['username'];
}
?>
<?php
if (isset($_POST['update'])) {

    $id = $_POST['id'];
    $username = @$_POST['username'];
    $password = @$_POST['password'];
    $nama = @$_POST['nama'];

    if ($password) {
        $result = mysqli_query($koneksi, "UPDATE tb_users SET username='$username',nama='$nama',password='$password' WHERE id=$id");
    } else {
        $result = mysqli_query($koneksi, "UPDATE tb_users SET username='$username',nama='$nama' WHERE id=$id");
        echo "<script>alert('Berhasil disimpan!'); window.location.href = '../../admin/dashboard.php?page=users';</script>";
    }
    header("Location:../dashboard.php?page=users");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PANEL ADMIN</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?php include_once('../pages/navbar.php'); ?>
        <?php include_once('../pages/sidebar.php'); ?>
        <div class="content-wrapper">
            <?php include_once('content-header.php'); ?>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Data Pengguna</h3>
                                    <div class="card-tools">
                                        <a href="../../admin/dashboard.php?page=users" class="btn btn-info">Kembali</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form method="post">
                                        <input type="hidden" name="id" value="<?= $id ?>">
                                        <div class="form-group">
                                            <label for="nama_operator">Nama Lengkap</label>
                                            <input type="text" class="form-control" value="<?= $row_nama_lengkap ?>"
                                                name="nama_operator" required autofocus>
                                        </div>
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control" value="<?= $row_username ?>"
                                                name="username" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" value="" name="password">
                                            <span class="help-block"> Kosongkan bila tidak di ubah</span>
                                        </div>
                                        <button class="btn btn-primary" type="submit" name="update">Simpan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include_once('../pages/footer.php'); ?>
    </div>
    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>
</body>

</html>