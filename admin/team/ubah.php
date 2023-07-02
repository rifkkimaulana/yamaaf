<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

include("../../config.php");
include('session.php');

if (isset($_POST['update'])) {
    $team_id = isset($_GET['id']) ? $_GET['id'] : '';

    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $deskripsi = $_POST['deskripsi'];

    // Memeriksa apakah ada file gambar yang diunggah
    if (isset($_FILES['cover']) && $_FILES['cover']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['cover'];

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
        $uniqueFileName = 'upload_' . date('YmdHis') . '_';
        $upload = $uniqueFileName . $fileName;
        $uploaddb = $uniqueFileName . $fileName;
        if (move_uploaded_file($fileTmpName, $uploadDir . $upload)) {
            // Melakukan query UPDATE setelah file berhasil diunggah
            // Menghapus gambar lama jika ada
            $query_team = mysqli_query($koneksi, "SELECT * FROM tb_team WHERE id='$team_id'");
            $data = mysqli_fetch_array($query_team);
            $row_cover = $data['cover'];

            if (!empty($fileName) && $fileName !== $row_cover) {
                $oldImagePath = $uploadDir . $row_cover;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $result = mysqli_query($koneksi, "UPDATE tb_team SET nama='$nama', jabatan='$jabatan', deskripsi='$deskripsi', cover='$uploaddb' WHERE id='$team_id'");

            if (mysqli_affected_rows($koneksi) > 0) {
                echo "<script>alert('Data team berhasil diubah!');</script>";
                echo "<script>window.location.href = '../../admin/dashboard.php?page=team';</script>";
                exit;
            } else {
                echo "<script>alert('Gagal mengubah data team!');</script>";
                exit;
            }
        } else {
            echo "Gagal memindahkan file ke direktori tujuan.";
            exit;
        }
    } else {
        // Tidak ada file gambar yang diunggah, hanya mengubah data team
        $result = mysqli_query($koneksi, "UPDATE tb_team SET nama='$nama', jabatan='$jabatan', deskripsi='$deskripsi' WHERE id='$team_id'");

        if (mysqli_affected_rows($koneksi) > 0) {
            echo "<script>alert('Data team berhasil diubah!');</script>";
            echo "<script>window.location.href = '../../admin/dashboard.php?page=team';</script>";
            exit;
        } else {
            echo "<script>alert('Gagal mengubah data team!');</script>";
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
                                    <h3 class="card-title">Ubah Data Team</h3>
                                    <div class="card-tools">
                                        <a href="<?= $base_url_admin ?>/dashboard.php?page=team"
                                            class="btn btn-info">Kembali</a>
                                    </div>
                                </div>

                                <form method="post" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <?php
                                        $team_id = isset($_GET['id']) ? $_GET['id'] : '';
                                        $team = mysqli_query($koneksi, "SELECT * FROM tb_team WHERE id='$team_id'");
                                        $data = mysqli_fetch_array($team);
                                        ?>

                                        <input type="hidden" name="id_team" value="<?= $data['id']; ?>">

                                        <div class="form-group">
                                            <label for="nama">Nama Lengkap</label>
                                            <input type="text" class="form-control" name="nama"
                                                value="<?= $data['nama']; ?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="jabatan">Jabatan</label>
                                            <input type="text" class="form-control" name="jabatan"
                                                value="<?= $data['jabatan']; ?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="deskripsi">Deskripsi</label>
                                            <textarea class="form-control" name="deskripsi"
                                                required><?= $data['deskripsi']; ?></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="cover">Gambar</label>
                                            <input type="file" class="form-control" name="cover">
                                        </div>
                                    </div>

                                    <div class="card-footer">
                                        <button type="submit" name="update" class="btn btn-primary">Update</button>
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

    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>
</body>

</html>