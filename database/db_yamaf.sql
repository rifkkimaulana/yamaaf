-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Jul 2023 pada 15.03
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_yamaf`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_about`
--

CREATE TABLE `tb_about` (
  `id` int(11) NOT NULL,
  `isi1` text NOT NULL,
  `isi2` text NOT NULL,
  `cover` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_about`
--

INSERT INTO `tb_about` (`id`, `isi1`, `isi2`, `cover`) VALUES
(1, 'Kami adalah perusahaan yang berdedikasi dalam menyediakan layanan penjualan motor terbaik untuk pelanggan kami. Dengan pengalaman dan pengetahuan yang luas dalam industri ini, kami mengutamakan kepuasan pelanggan dengan menyediakan pilihan motor terbaik, harga yang kompetitif, dan layanan pelanggan yang terbaik. Kami percaya bahwa motor bukan hanya alat transportasi, tetapi juga menjadi bagian penting dari gaya hidup dan kebebasan berkendara. Oleh karena itu, kami selalu berupaya memberikan pengalaman membeli motor yang menyenangkan dan memuaskan bagi setiap pelanggan kami.', 'Kami adalah perusahaan yang berdedikasi dalam menyediakan layanan penjualan motor terbaik untuk pelanggan kami. Dengan pengalaman dan pengetahuan yang luas dalam industri ini, kami mengutamakan kepuasan pelanggan dengan menyediakan pilihan motor terbaik, harga yang kompetitif, dan layanan pelanggan yang terbaik. Kami percaya bahwa motor bukan hanya alat transportasi, tetapi juga menjadi bagian penting dari gaya hidup dan kebebasan berkendara. Oleh karena itu, kami selalu berupaya memberikan pengalaman membeli motor yang menyenangkan dan memuaskan bagi setiap pelanggan kami.', 'Harga-Motor-Yamaha-Semua-Produk.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_artikel`
--

CREATE TABLE `tb_artikel` (
  `id` int(11) NOT NULL,
  `judul_artikel` varchar(100) NOT NULL,
  `content_artikel` longtext NOT NULL,
  `cover` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_time` datetime NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `slug` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_artikel`
--

INSERT INTO `tb_artikel` (`id`, `judul_artikel`, `content_artikel`, `cover`, `user_id`, `created_time`, `id_kategori`, `slug`) VALUES
(5, '124134234234', 'asdfasdfasdf', 'upload_20230702145948_Untitled.png', 1, '2023-07-02 14:59:48', 3, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_contact`
--

CREATE TABLE `tb_contact` (
  `id` int(11) NOT NULL,
  `alamat1` varchar(100) NOT NULL,
  `alamat2` varchar(100) NOT NULL,
  `gmail` varchar(100) NOT NULL,
  `nohp` varchar(100) NOT NULL,
  `deskripsi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_contact`
--

INSERT INTO `tb_contact` (`id`, `alamat1`, `alamat2`, `gmail`, `nohp`, `deskripsi`) VALUES
(1, 'Kabupaten Sumedang', '45372', 'info@ptyamaaf.site', '083123456789', 'Kami menyediakan motor baru dengan harga kompetitif dan berbagai fitur modern.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_faq`
--

CREATE TABLE `tb_faq` (
  `id` int(11) NOT NULL,
  `pertanyaan` varchar(200) NOT NULL,
  `jawaban` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_faq`
--

INSERT INTO `tb_faq` (`id`, `pertanyaan`, `jawaban`) VALUES
(13, 'Apakah motor yang Anda jual baru atau bekas?', 'Kami menjual motor baru dan bekas. Anda dapat memilih sesuai preferensi Anda.'),
(14, 'Apakah tersedia layanan pengiriman motor?', 'Kami menjual motor baru dan bekas. Anda dapat memilih sesuai preferensi Anda.'),
(15, 'Bagaimana cara melakukan pemesanan motor?', 'Anda dapat mengunjungi toko kami secara langsung atau melakukan pemesanan melalui website kami. Ikuti petunjuk'),
(16, 'Anda dapat mengunjungi toko kami secara langsung atau melakukan pemesanan melalui website kami.', 'Ya, kami menyediakan layanan pengiriman motor. Biaya pengiriman akan ditentukan berdasarkan lokasi tujuan.'),
(17, 'Apakah tersedia layanan pengiriman motor?', 'Ya, kami menyediakan layanan pengiriman motor. Biaya pengiriman akan ditentukan berdasarkan lokasi tujuan.'),
(18, 'Apakah tersedia opsi pembiayaan atau cicilan?', 'Ya, kami menyediakan opsi pembiayaan atau cicilan untuk pembelian motor. '),
(19, 'Apakah saya dapat melakukan uji coba atau tes ride sebelum membeli motor?', 'Apakah saya dapat melakukan uji coba atau tes ride sebelum membeli motor?'),
(20, 'Apakah ada batasan garansi untuk motor bekas?', 'Ya, garansi untuk motor bekas memiliki batasan tertentu. '),
(21, 'Apakah ada garansi?', 'Ya, kami menyediakan berbagai aksesori tambahan untuk motor.'),
(22, 'Bagaimana cara merawat dan memelihara motor dengan baik?', 'Kami merekomendasikan untuk melakukan perawatan rutin seperti servis berkala, mengganti oli, dan memeriksa komponen penting motor. ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_footer`
--

CREATE TABLE `tb_footer` (
  `id` int(11) NOT NULL,
  `nama_perusahaan` varchar(100) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `link_fb` varchar(100) NOT NULL,
  `link_ig` varchar(100) NOT NULL,
  `link_twitter` varchar(100) NOT NULL,
  `link_lk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_footer`
--

INSERT INTO `tb_footer` (`id`, `nama_perusahaan`, `deskripsi`, `link_fb`, `link_ig`, `link_twitter`, `link_lk`) VALUES
(1, 'PT.YAMAAF', 'Kami menyediakan motor baru dengan harga kompetitif dan berbagai fitur modern.', 'facebook.com', 'instagram.com', 'twitter.com', 'linkedin.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id` int(11) NOT NULL,
  `kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`id`, `kategori`) VALUES
(3, 'Racing');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kontak2`
--

CREATE TABLE `tb_kontak2` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subjek` varchar(100) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kontak2`
--

INSERT INTO `tb_kontak2` (`id`, `nama`, `email`, `subjek`, `pesan`) VALUES
(1, 'ADS', 'rifkkimaulana@gmail.com', 'asdf', 'ADS'),
(2, 'ADS', 'rifkkimaulana@gmail.com', 'asdf', 'ADS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_lihat`
--

CREATE TABLE `tb_lihat` (
  `id` int(11) NOT NULL,
  `waktu_lihat` datetime NOT NULL,
  `ip_address` varchar(20) NOT NULL,
  `browser` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_lihat`
--

INSERT INTO `tb_lihat` (`id`, `waktu_lihat`, `ip_address`, `browser`) VALUES
(6, '2023-07-02 07:34:57', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa'),
(7, '2023-07-02 07:44:36', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa'),
(8, '2023-07-02 07:44:42', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa'),
(9, '2023-07-02 10:04:09', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa'),
(10, '2023-07-02 10:39:21', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa'),
(11, '2023-07-02 10:40:48', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa'),
(12, '2023-07-02 10:41:09', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa'),
(13, '2023-07-02 10:42:13', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa'),
(14, '2023-07-02 10:43:12', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa'),
(15, '2023-07-02 10:44:27', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa'),
(16, '2023-07-02 10:44:48', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa'),
(17, '2023-07-02 10:45:02', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa'),
(18, '2023-07-02 10:45:58', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa'),
(19, '2023-07-02 10:49:20', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa'),
(20, '2023-07-02 10:49:37', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa'),
(21, '2023-07-02 10:52:35', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa'),
(22, '2023-07-02 10:53:51', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa'),
(23, '2023-07-02 12:55:54', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa'),
(24, '2023-07-02 12:56:29', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa'),
(25, '2023-07-02 12:57:07', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa'),
(26, '2023-07-02 12:59:13', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa'),
(27, '2023-07-02 13:00:15', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa'),
(28, '2023-07-02 13:01:55', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa'),
(29, '2023-07-02 13:05:22', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa'),
(30, '2023-07-02 13:07:11', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa'),
(31, '2023-07-02 13:07:52', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa'),
(32, '2023-07-02 13:08:58', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa'),
(33, '2023-07-02 13:18:28', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa'),
(34, '2023-07-02 13:20:01', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa'),
(35, '2023-07-02 13:22:35', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa'),
(36, '2023-07-02 13:28:10', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa'),
(37, '2023-07-02 13:31:59', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa'),
(38, '2023-07-02 13:33:24', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa'),
(39, '2023-07-02 13:34:24', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa'),
(40, '2023-07-02 13:34:49', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa'),
(41, '2023-07-02 13:36:11', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa'),
(42, '2023-07-02 13:48:15', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa'),
(43, '2023-07-02 14:03:12', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa'),
(44, '2023-07-02 14:04:13', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa'),
(45, '2023-07-02 14:04:37', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa'),
(46, '2023-07-02 14:05:05', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa'),
(47, '2023-07-02 14:05:30', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa'),
(48, '2023-07-02 14:09:29', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa'),
(49, '2023-07-02 14:10:15', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa'),
(50, '2023-07-02 14:15:13', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa'),
(51, '2023-07-02 14:15:40', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa'),
(52, '2023-07-02 14:17:04', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa'),
(53, '2023-07-02 14:17:07', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa'),
(54, '2023-07-02 14:18:12', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa'),
(55, '2023-07-02 14:18:49', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa'),
(56, '2023-07-02 14:19:04', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa'),
(57, '2023-07-02 14:25:34', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa'),
(58, '2023-07-02 14:25:36', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa'),
(59, '2023-07-02 14:25:54', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa'),
(60, '2023-07-02 14:26:24', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa'),
(61, '2023-07-02 14:26:47', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa'),
(62, '2023-07-02 14:28:11', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa'),
(63, '2023-07-02 14:28:29', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa'),
(64, '2023-07-02 14:31:11', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa'),
(65, '2023-07-02 14:32:29', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa'),
(66, '2023-07-02 14:32:59', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa'),
(67, '2023-07-02 14:40:36', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa'),
(68, '2023-07-02 14:48:40', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa'),
(69, '2023-07-02 14:58:34', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa'),
(70, '2023-07-02 15:02:34', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `deskripsi` varchar(500) NOT NULL,
  `harga` int(11) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_produk`
--

INSERT INTO `tb_produk` (`id`, `nama_produk`, `id_kategori`, `deskripsi`, `harga`, `image`) VALUES
(34, 'METIK', 3, 'METIK DESC', 2000000, 'upload_20230702093954_logo_yamaaf.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_team`
--

CREATE TABLE `tb_team` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `cover` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_team`
--

INSERT INTO `tb_team` (`id`, `nama`, `jabatan`, `deskripsi`, `cover`) VALUES
(2, 'Sopian Darmawan', 'Direktur', 'Saya memiliki keahlian dan pengalaman di bidang saya, dan saya terus berupaya untuk terus berkembang dan belajar hal-hal baru. Saya memahami pentingnya kerjasama, komunikasi yang efektif, dan mendukung satu sama lain dalam mencapai tujuan bersama.', 'upload_20230702140926_Untitled.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_users`
--

CREATE TABLE `tb_users` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `deskripsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_users`
--

INSERT INTO `tb_users` (`id`, `nama`, `username`, `password`, `pekerjaan`, `deskripsi`) VALUES
(1, 'Robi Anugrah', 'admin', '21232f297a57a5a743894a0e4a801fc3', '', ''),
(2, 'Ivan Gunawan', 'gunawan', '81dc9bdb52d04dc20036dbd8313ed055', '', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_about`
--
ALTER TABLE `tb_about`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_artikel`
--
ALTER TABLE `tb_artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_contact`
--
ALTER TABLE `tb_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_faq`
--
ALTER TABLE `tb_faq`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_kontak2`
--
ALTER TABLE `tb_kontak2`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_lihat`
--
ALTER TABLE `tb_lihat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_team`
--
ALTER TABLE `tb_team`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_artikel`
--
ALTER TABLE `tb_artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_faq`
--
ALTER TABLE `tb_faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_kontak2`
--
ALTER TABLE `tb_kontak2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_lihat`
--
ALTER TABLE `tb_lihat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `tb_team`
--
ALTER TABLE `tb_team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
