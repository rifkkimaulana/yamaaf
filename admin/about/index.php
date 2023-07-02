<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
include("../../config.php");
include('session.php');

$id = $_GET['id'];
if (isset($_POST['update'])) {
    $isi1 = $_POST['isi1'];
    $isi2 = $_POST['isi2'];

    // Memeriksa apakah ada file gambar yang diunggah
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['image'];

        // Memeriksa tipe file
        $allowedTypes = array('image/jpeg', 'image/png');
        $fileType = $file['type'];
        if (!in_array($fileType, $allowedTypes)) {
            echo "Tipe file yang diunggah tidak didukung. Harap unggah file JPG atau PNG.";
            exit;
        }
        // Mengambil informasi file yang diunggah
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];

        // Menggunakan direktori tujuan penyimpanan file
        $uploadDir = 'image/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        // Memindahkan file ke direktori tujuan
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
        $upload = ($fileName);
        if (move_uploaded_file($fileTmpName, $uploadDir . $upload)) {
            // Melakukan query UPDATE setelah file berhasil diunggah
            // Menghapus gambar lama jika ada
            $query_about = mysqli_query($koneksi, "SELECT * FROM tb_about WHERE id='$id'");
            $data = mysqli_fetch_array($query_about);
            $row_gambar = $data['cover'];

            if (!empty($fileName) && $fileName !== $row_gambar) {
                $oldImagePath = $uploadDir . $row_gambar;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $result = mysqli_query($koneksi, "UPDATE tb_about SET isi1='$isi1', isi2='$isi2', cover='$upload' WHERE id='$id'");

            if ($result) {
                echo "<script>window.location.href = '../../admin/about/index.php?id=1&page=about';</script>";
                exit;
            } else {
                echo "<script>alert('Gagal mengubah about!');</script>";
                exit;
            }
        } else {
            echo "<script>alert('Gagal mengunggah file!');</script>";
            exit;
        }
    } else {
        // Tidak ada file gambar yang diunggah, hanya mengubah data produk
        $result = mysqli_query($koneksi, "UPDATE tb_about SET isi1='$isi1', isi2='$isi2' WHERE id='$id'");

        if ($result) {
            echo "<script>alert('About berhasil diubah!');</script>";
            echo "<script>window.location.href = '../../admin/about/index.php?id=1&page=about';</script>";
            exit;
        } else {
            echo "<script>alert('Gagal mengubah profil!');</script>";
            exit;
        }
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
                                    <h3 class="card-title">Data About</h3>
                                    <div class="card-tools">
                                        <a href="../dashboar/about/index.php?page=about"
                                            class="btn btn-info">Kembali</a>
                                    </div>
                                </div>

                                <form method="post" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <?php
                                        include '../../config.php';
                                        $id = $_GET['id'];
                                        $about = mysqli_query($koneksi, "SELECT * FROM tb_about WHERE id='$id'");
                                        $data = mysqli_fetch_array($about);
                                        ?>

                                        <input type="hidden" name="id" value="<?= $data['id'] ?>">

                                        <div class="form-group">
                                            <label for="isi1">Isi Pertama</label>
                                            <textarea class="form-control" name="isi1"><?= $data['isi1'] ?></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="isi2">Isi Kedua</label>
                                            <textarea class="form-control" name="isi2"><?= $data['isi2'] ?></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="isi2">Gambar</label></br>
                                            <td><img src="../about/image/<?= $data['cover'] ?>" width="300"></td>
                                        </div>

                                        <div class="form-group" enctype="multipart/form-data">
                                            <label for="image">Ubah Gambar</label>
                                            <input type="file" class="form-control" name="image">

                                        </div>
                                    </div>

                                    <div class="card-footer">
                                        <button class="btn btn-primary" type="submit" name="update">Simpan</button>
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