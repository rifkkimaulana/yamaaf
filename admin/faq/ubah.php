<?php
include_once("../../config.php");
include('session.php');
$id = @$_GET['id'];

$result = mysqli_query($koneksi, "SELECT * FROM tb_faq WHERE id=$id");
while ($data = mysqli_fetch_array($result)) {
    $row_pertanyaan = $data['pertanyaan'];
    $row_jawaban = $data['jawaban'];
}

if (isset($_POST['ubah'])) {
    $id = $_POST['id'];
    $pertanyaan = $_POST['pertanyaan'];
    $jawaban = $_POST['jawaban'];
    $result = mysqli_query($koneksi, "UPDATE tb_faq SET pertanyaan='$pertanyaan', jawaban='$jawaban' WHERE id=$id");
    header("Location:../dashboard.php?page=faq");
    exit();
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
                                    <h3 class="card-title">Data FAQ</h3>

                                    <div class="card-tools">
                                        <a href="dashboard.php?page=faq" class="btn btn-info">Kembali</a>
                                    </div>

                                </div>

                                <div class="card-body">

                                    <form method="post">
                                        <input type="hidden" name="id" value="<?= $id ?>">
                                        <div class="form-group">
                                            <label for="pertanyaan">Pertanyaan</label>
                                            <input type="text" class="form-control" name="pertanyaan"
                                                value="<?= $row_pertanyaan ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="jawaban">Jawaban</label>
                                            <input type="text" class="form-control" name="jawaban"
                                                value="<?= $row_jawaban ?>" required>
                                        </div>
                                        <button class="btn btn-primary" type="submit" name="ubah">Ubah</button>

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