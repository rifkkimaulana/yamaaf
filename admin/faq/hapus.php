<?php
include_once("../../config.php");
include('session.php');

$id = @$_GET['id'];

$result = mysqli_query($koneksi, "DELETE FROM tb_faq WHERE id=$id");

header("Location:../dashboard.php?page=faq");