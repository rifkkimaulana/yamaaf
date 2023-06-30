<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
$db_Host = 'localhost';
$db_Name = 'db_yamaf';
$db_Username = 'root';
$db_Password = '';

$koneksi = mysqli_connect($db_Host, $db_Username, $db_Password, $db_Name);
if (!$koneksi) {
    die("<script>alert(' Gagal tersambung dengan database.')</script>");
}
?>