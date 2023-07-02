<?php
// Pastikan Anda telah membuat koneksi ke database sebelumnya
// Misalnya dengan menggunakan kode berikut:
// $koneksi = mysqli_connect("nama_host", "username", "password", "nama_database");

// Fungsi ini akan memastikan bahwa data yang dikirimkan aman dan bersih sebelum dimasukkan ke database
include '../config.php';
function sanitizeData($data)
{
  global $koneksi;
  return mysqli_real_escape_string($koneksi, htmlspecialchars(trim($data)));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Ambil data dari form dan bersihkan dengan fungsi sanitizeData
  $name = sanitizeData($_POST['name']);
  $email = sanitizeData($_POST['email']);
  $subject = sanitizeData($_POST['subject']);
  $message = sanitizeData($_POST['message']);

  // Query INSERT data ke tabel tb_kontak2
  $query = "INSERT INTO tb_kontak2 (nama, email, subjek, pesan) VALUES ('$name', '$email', '$subject', '$message')";

  // Jalankan query
  if (mysqli_query($koneksi, $query)) {
    // Data berhasil disimpan
    echo "success";
  } else {
    // Jika terjadi kesalahan saat menyimpan data
    echo "error";
  }
}
?>