<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
//include("../../config.php");
//include('session.php');

//$id = $_GET['id'];
if (isset($_POST['tambah_gambar'])) {
    $isi1 = $_POST['isi1'];

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
            $query_about = mysqli_query($koneksi, "SELECT * FROM tb_about WHERE id=''");
            $data = mysqli_fetch_array($query_about);
            $row_gambar = $data['cover'];

            if (!empty($fileName) && $fileName !== $row_gambar) {
                $oldImagePath = $uploadDir . $row_gambar;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $result = mysqli_query($koneksi, "UPDATE tb_about SET isi1='$isi1', cover='$upload' WHERE id=''");

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
        $result = mysqli_query($koneksi, "UPDATE tb_about SET isi1='$isi1' WHERE id='$id'");

        if ($result) {
            echo "<script>alert('About berhasil diubah!');</script>";
            //echo "<script>window.location.href = '../../admin/about/index.php?id=1&page=about';</script>";
            exit;
        } else {
            echo "<script>alert('Gagal mengubah profil!');</script>";
            exit;
        }
    }
}
?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data About</h3>
                        <div class="card-tools">
                            <a href="../dashboar/about/index.php?page=about" class="btn btn-info">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>