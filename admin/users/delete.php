<?php
include_once("../config.php");
include('session.php');

$id = @$_GET['id'];

$result = mysqli_query($koneksi, "DELETE FROM tb_users WHERE id=$id");

header("Location:../dashboard.php?page=users");
?>