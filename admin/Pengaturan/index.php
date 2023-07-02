<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
include("../../config.php");
include('session.php');

// update tb_footer
if (isset($_POST['ubah_pengaturan'])) {
    $id = $_POST['id'];
    $nama_perusahaan = $_POST['nama_perusahaan'];
    $deskripsi = $_POST['post_deskripsi'];
    $alamat1 = $_POST['alamat1'];
    $alamat2 = $_POST['alamat2'];
    $gmail = $_POST['gmail'];
    $nohp = $_POST['nohp'];
    $result = mysqli_query($koneksi, "UPDATE tb_footer SET nama_perusahaan='$nama_perusahaan', deskripsi='$deskripsi' WHERE id=$id");
    $result = mysqli_query($koneksi, "UPDATE tb_contact SET alamat1='$alamat1', alamat2='$alamat2', gmail='$gmail', nohp='$nohp', deskripsi='$deskripsi' WHERE id=$id");

    //MEMBUAT KONDISI PEMBERITAHUAN PESAN
    if ($result) {
        $pesan = "Data berhasil disimpan.";
        $jenis_pesan = "success";
    } else {
        $pesan = "Gagal menyimpan data.";
        $jenis_pesan = "danger";
    }

    $_SESSION['pesan'] = $pesan;
    $_SESSION['jenis_pesan'] = $jenis_pesan;


    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

if (isset($_POST['ubah_sosmed'])) {
    $id = $_POST['id'];
    $link_ig = $_POST['link_ig'];
    $link_fb = $_POST['link_fb'];
    $link_tw = $_POST['link_tw'];
    $link_lk = $_POST['link_lk'];
    $result = mysqli_query($koneksi, "UPDATE tb_footer SET link_ig='$link_ig', link_fb='$link_fb', link_twitter='$link_tw', link_lk='$link_lk' WHERE id=$id");


    //MEMBUAT KONDISI PEMBERITAHUAN PESAN
    if ($result) {
        $pesan = "Data berhasil disimpan.";
        $jenis_pesan = "success";
    } else {
        $pesan = "Gagal menyimpan data.";
        $jenis_pesan = "danger";
    }

    $_SESSION['pesan'] = $pesan;
    $_SESSION['jenis_pesan'] = $jenis_pesan;

    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> ADMIN YAMAAF</title>

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
                    <?php
                    if (isset($_SESSION['pesan']) && isset($_SESSION['jenis_pesan'])) {
                        $pesan = $_SESSION['pesan'];
                        $jenis_pesan = $_SESSION['jenis_pesan'];
                    }
                    ?>

                    <?php if (isset($pesan) && isset($jenis_pesan)): ?>
                        <div class="alert alert-<?= $jenis_pesan ?>">
                            <?= $pesan ?>
                        </div>
                    <?php endif; ?>
                    <div class="row">
                        <?php
                        include '../../config.php';
                        $id = '1';
                        $query = mysqli_query($koneksi, "SELECT * FROM tb_footer WHERE id='$id'");
                        $data = mysqli_fetch_array($query);
                        $query2 = mysqli_query($koneksi, "SELECT * FROM tb_contact WHERE id='$id'");
                        $data2 = mysqli_fetch_array($query2);
                        ?>
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Pengaturan</h3>
                                </div>
                                <div class="card-header">
                                    <form method="post" enctype="multipart/form-data">
                                        <div class="card-body">
                                            <input type="hidden" name="id" value="<?= $data['id'] ?>">

                                            <div class="form-group">
                                                <label for="isi1">Nama Perusahaan</label>
                                                <input class="form-control" name="nama_perusahaan"
                                                    value="<?= $data['nama_perusahaan'] ?>">
                                                </input>
                                            </div>
                                            <div class="form-group">
                                                <label for="isi1">Deskripsi Perusahaan</label>
                                                <input class="form-control" name="post_deskripsi"
                                                    value="<?= $data['deskripsi'] ?>">
                                                </input>
                                            </div>
                                            <div class="form-group">
                                                <label for="isi1">Alamat 1</label>
                                                <input class="form-control" name="alamat2"
                                                    value="<?= $data2['alamat1'] ?>">
                                                </input>
                                            </div>
                                            <div class="form-group">
                                                <label for="isi1">Alamat 2</label>
                                                <input class="form-control" name="alamat2"
                                                    value="<?= $data2['alamat2'] ?>">
                                                </input>
                                            </div>
                                            <div class="form-group">
                                                <label for="isi1">Alamat Email</label>
                                                <input class="form-control" name="gmail" value="<?= $data2['gmail'] ?>">
                                                </input>
                                            </div>
                                            <div class="form-group">
                                                <label for="isi1">No Telpon</label>
                                                <input class="form-control" name="nohp" value="<?= $data2['nohp'] ?>">
                                                </input>
                                            </div>

                                        </div>

                                        <div class="card-footer">
                                            <button class="btn btn-primary" type="submit"
                                                name="ubah_pengaturan">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Link Medsos</h3>
                                </div>
                                <div class="card-header">
                                    <form method="post" enctype="multipart/form-data">
                                        <div class="card-body">
                                            <input type="hidden" name="id" value="<?= $data['id'] ?>">

                                            <div class="form-group">
                                                <label for="isi1">Link Facebook</label>
                                                <input class="form-control" name="link_fb"
                                                    value="<?= $data['link_fb'] ?>">
                                                </input>
                                            </div>
                                            <div class="form-group">
                                                <label for="isi1">Link Instagram</label>
                                                <input class="form-control" name="link_ig"
                                                    value="<?= $data['link_ig'] ?>">
                                                </input>
                                            </div>
                                            <div class="form-group">
                                                <label for="isi1">Link Twitter</label>
                                                <input class="form-control" name="link_tw"
                                                    value="<?= $data['link_twitter'] ?>">
                                                </input>
                                            </div>
                                            <div class="form-group">
                                                <label for="isi1">Link Linkedin</label>
                                                <input class="form-control" name="link_lk"
                                                    value="<?= $data['link_lk'] ?>">
                                                </input>
                                            </div>

                                        </div>

                                        <div class="card-footer">
                                            <button class="btn btn-primary" type="submit"
                                                name="ubah_sosmed">Simpan</button>
                                        </div>
                                    </form>
                                </div>
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

<script>
    setTimeout(function () {
        var alert = document.querySelector('.alert');
        if (alert) {
            alert.remove();
        }
    }, 3000);
</script>


</body>

</html>