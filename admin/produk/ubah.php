<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
include("../../config.php");
include('session.php');

if (isset($_POST['update'])) {
    $nama_produk = $_POST['nama_produk'];
    $id_kategori = $_POST['id_kategori'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $produk_id = $_POST['id_produk'];

    // Memeriksa apakah ada file gambar yang diunggah
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['image'];
        $id_kategori = isset($_POST['id_kategori']) ? $_POST['id_kategori'] : $data['id_kategori'];

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
        $upload = ($uniqueFileName . $fileName);
        $uploaddb = ($uniqueFileName . $fileName);
        if (move_uploaded_file($fileTmpName, $uploadDir . $upload)) {
            // Melakukan query UPDATE setelah file berhasil diunggah
            // Menghapus gambar lama jika ada
            $query_produk = mysqli_query($koneksi, "SELECT * FROM tb_produk WHERE id='$produk_id'");
            $data = mysqli_fetch_array($query_produk);
            $row_gambar = $data['image'];

            if (!empty($fileName) && $fileName !== $row_gambar) {
                $oldImagePath = $uploadDir . $row_gambar;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $result = mysqli_query($koneksi, "UPDATE tb_produk SET nama_produk='$nama_produk', deskripsi='$deskripsi', id_kategori='$id_kategori', harga='$harga', image='$uploaddb' WHERE id='$produk_id'");

            if ($result) {
                echo "<script>window.location.href = '../../admin/dashboard.php?page=produk';</script>";
                exit;
            } else {
                echo "<script>alert('Gagal mengubah produk!');</script>";
                exit;
            }
        } else {
            echo "<script>alert('Gagal mengunggah file!');</script>";
            exit;
        }
    } else {
        // Tidak ada file gambar yang diunggah, hanya mengubah data produk
        $result = mysqli_query($koneksi, "UPDATE tb_produk SET nama_produk='$nama_produk', deskripsi='$deskripsi', id_kategori='$id_kategori', harga='$harga' WHERE id='$produk_id'");

        if ($result) {
            echo "<script>alert('Produk berhasil diubah!');</script>";
            echo "<script>window.location.href = '../../admin/dashboard.php?page=produk';</script>";
            exit;
        } else {
            echo "<script>alert('Gagal mengubah produk!');</script>";
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
                                    <h3 class="card-title">Data Produk</h3>
                                    <div class="card-tools">
                                        <a href="<?= $base_url_admin ?>/dashboard.php?page=produk"
                                            class="btn btn-info">Kembali</a>
                                    </div>
                                </div>

                                <form method="post" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <?php
                                        $produk_id = $_GET['id'];
                                        $produk = mysqli_query($koneksi, "SELECT * FROM tb_produk WHERE id='$produk_id'");
                                        $data = mysqli_fetch_array($produk);
                                        ?>

                                        <input type="hidden" name="id_produk" value="<?= $data['id'] ?>">

                                        <div class="form-group">
                                            <label for="nama_produk">Nama Produk</label>
                                            <input type="text" class="form-control" name="nama_produk" required
                                                autofocus value="<?= $data['nama_produk'] ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="deskripsi">Deskripsi</label>
                                            <textarea type="text" class="form-control" name="deskripsi"
                                                required><?= $data['deskripsi'] ?></textarea>
                                        </div>

                                        <?php
                                        $kategori = mysqli_query($koneksi, "SELECT * FROM tb_kategori ORDER BY id DESC");
                                        ?>

                                        <div class="form-group">
                                            <label for="id_kategori">Kategori</label>
                                            <select class="form-control" name="id_kategori">
                                                <option value="">Pilih Kategori</option>
                                                <?php
                                                while ($row = mysqli_fetch_array($kategori)) {
                                                    $selected = ($row['id'] == $data['id_kategori']) ? 'selected' : '';
                                                    echo "<option value='{$row['id']}' {$selected}>{$row['kategori']}</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>


                                        <div class="form-group">
                                            <label for="harga">Harga</label>
                                            <input type="number" class="form-control" name="harga" required
                                                value="<?= $data['harga'] ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="isi2">Gambar</label></br>
                                            <td><img src="../produk/image/<?= $data['image'] ?>" width="200"></td>
                                        </div>

                                        <div class="form-group" enctype="multipart/form-data">
                                            <label for="image">Gambar</label>
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