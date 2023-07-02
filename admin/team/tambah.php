<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

include("../../config.php");
include('session.php');

if (isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $deskripsi = $_POST['deskripsi'];

    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['gambar'];

        $allowedTypes = array('image/jpeg', 'image/png');
        $fileType = $file['type'];
        if (!in_array($fileType, $allowedTypes)) {
            echo "Tipe file yang diunggah tidak didukung. Harap unggah file JPG atau PNG.";
            exit;
        }
        $uniqueFileName = 'upload_' . date('YmdHis') . '_';

        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];

        $uploadDir = '../../admin/team/image/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
        $upload = ($uploadDir . $uniqueFileName . $fileName);
        $uploaddb = ($uniqueFileName . $fileName);

        if (move_uploaded_file($fileTmpName, $upload)) {

            $result = mysqli_query($koneksi, "INSERT INTO tb_team (nama, jabatan, deskripsi, cover)
                VALUES ('$nama', '$jabatan', '$deskripsi', '$uploaddb')");

            if ($result) {
                echo "<script>window.location.href = '../../admin/dashboard.php?page=team';</script>";
                exit;
            } else {
                echo "<script>alert('Gagal menyimpan data team!');</script>";
                echo "Error: " . mysqli_error($koneksi);
                exit;
            }
        } else {
            echo "<script>alert('Gagal mengunggah file!');</script>";
            exit;
        }
    } else {
        echo "<script>alert('Tidak ada file yang diunggah!');</script>";
        exit;
    }
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

        <?php include('../pages/navbar.php'); ?>
        <?php include('../pages/sidebar.php'); ?>

        <div class="content-wrapper">

            <?php include('content-header.php'); ?>

            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Data Team</h3>
                                    <div class="card-tools">
                                        <a href="../dashboard.php?page=team" class="btn btn-info">Kembali</a>
                                    </div>
                                </div>

                                <form method="post" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="nama">Nama Lengkap</label>
                                            <input type="text" class="form-control" name="nama" required autofocus>
                                        </div>

                                        <div class="form-group">
                                            <label for="jabatan">Jabatan</label>
                                            <input type="text" class="form-control" name="jabatan" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="deskripsi">Deskripsi</label>
                                            <textarea type="text" class="form-control" name="deskripsi"
                                                required></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="gambar">Gambar</label>
                                            <input type="file" class="form-control" name="gambar">
                                        </div>

                                    </div>

                                    <div class="card-footer">
                                        <button class="btn btn-primary" type="submit" name="tambah">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include('../pages/footer.php'); ?>

    </div>
</body>

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>

</body>

</html>