<?php
include 'config.php';

$keyword = $_GET['keyword'];

$query = "SELECT * FROM tb_produk WHERE nama_produk LIKE '%$keyword%'";
$result = mysqli_query($koneksi, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Search Results</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">


  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>
      </div>

      <nav id="navbar" class="navbar">
        <ul class="nav">
          <li class="nav-item"><a class="nav-link scrollto active" href="index.php#hero">Home</a></li>
          <li class="nav-item"><a class="nav-link scrollto" href="index.php#about">About</a></li>
          <li class="nav-item"><a class="nav-link scrollto" href="index.php#services">Services</a></li>
          <li class="nav-item"><a class="nav-link scrollto" href="index.php#portfolio">Portfolio</a></li>
          <li class="nav-item"><a class="nav-link scrollto" href="index.php#team">Team</a></li>
          <li class="nav-item"><a class="nav-link scrollto" href="index.php#pricing">Pricing</a></li>
          <li class="nav-item"><a class="nav-link scrollto" href="index.php#contact">Contact</a></li>
          <li class="nav-item"><a class="nav-link scrollto" href="artikel/index.php">Artikel</a></li>
          <li class="nav-item"><a class="nav-link scrollto"></a></li>
          <li class="nav-item">
            <form action="search.php" method="GET" class="d-flex">
              <input class="form-control me-2" type="search" name="keyword" placeholder="Search..." aria-label="Search">
              <button class="btn btn-outline-primary" type="submit"><i class="bi bi-search"></i></button>
            </form>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>

    </div>
  </header><!-- End Header -->


  <main id="main" data-aos="fade-up">

    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Search Results</h2>
        </div>

      </div>
    </section>

    <section class="inner-page">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <?php
            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                // Menampilkan informasi produk
                echo '<div class="card mb-3">';
                echo '<div class="row g-0">';
                echo '<div class="col-md-4">';
                echo '<a href="detail_produk.php?id=' . $row['id'] . '"><img src="admin/produk/image/' . $row['image'] . '" class="img-fluid rounded-start" alt="Product Image"></a>';
                echo '</div>';
                echo '<div class="col-md-8">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title"><a href="product_detail.php?id=' . $row['id'] . '">' . $row['nama_produk'] . '</a></h5>';
                echo '<p class="card-text">ID: ' . $row['id'] . '</p>';
                echo '<p class="card-text">Kategori: ' . $row['id_kategori'] . '</p>';
                echo '<p class="card-text">Harga: ' . $row['harga'] . '</p>';
                echo '<p class="card-text">Deskripsi: ' . $row['deskripsi'] . '</p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
              }
            } else {
              echo "<p>No results found</p>";
            }
            ?>
          </div>
        </div>
      </div>
    </section>


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include 'footer.php'; ?>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>