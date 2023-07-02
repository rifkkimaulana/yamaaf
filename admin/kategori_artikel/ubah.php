<?php
include_once("../../config.php");
include('session.php');
$id = @$_GET['id'];

$result = mysqli_query($koneksi, "SELECT * FROM tb_kategori_artikel WHERE id=$id");
while ($data = mysqli_fetch_array($result)) {
    $row_kategori = $data['kategori_artikel'];
}
?>

<?php
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama_kategori = $_POST['kategori_artikel'];
    $result = mysqli_query($koneksi, "UPDATE tb_kategori_artikel SET kategori_artikel='$nama_kategori' WHERE id=$id");
    header("Location:../dashboard.php?page=kategori_artikel");
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
                                    <h3 class="card-title">Data kategori Artikel</h3>

                                    <div class="card-tools">
                                        <a href="dashboard.php?page=kategori_artikel" class="btn btn-info">Kembali</a>
                                    </div>

                                </div>

                                <div class="card-body">

                                    <form method="post">
                                        <input type="hidden" name="id" value="<?= $id ?>">
                                        <div class="form-group">
                                            <label for="kategori_artikel">Kategori</label>
                                            <input name="kategori_artikel" type="text" class="form-control"
                                                value="<?= $row_kategori ?>" name="kategori_artikel" required <?php if ($row_kategori == 'admin') { ?> readonly <?php } ?>>
                                        </div>
                                        <button class="btn btn-primary" type="submit" name="update">Ubah</button>

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