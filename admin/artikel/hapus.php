<?php
include_once("../../config.php");
include('session.php');

$id = @$_GET['id'];

$sql = "SELECT image FROM tb_artikel WHERE id='$id'";
$result = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_assoc($result);
$imageName = $data['gambar'];

$result = mysqli_query($koneksi, "DELETE FROM tb_artikel WHERE id=$id");

if ($result && !empty($imageName)) {
    $uploadDir = 'gambar/';
    $imagePath = $uploadDir . $imageName;
    if (file_exists($imagePath)) {
        unlink($imagePath);
    }
}

header("Location:../dashboard.php?page=artikel");