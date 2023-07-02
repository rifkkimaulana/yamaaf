<?php
include 'config.php';

// Mendapatkan ID dari GET request
$id = $_GET['id'];

// Mengambil data produk berdasarkan ID
$query = mysqli_query($koneksi, "SELECT * FROM tb_produk WHERE id = $id");
$data = mysqli_fetch_assoc($query);

// Mendapatkan nama kategori berdasarkan id_kategori
$id_kategori = $data['id_kategori'];
$query_kategori = mysqli_query($koneksi, "SELECT kategori FROM tb_kategori WHERE id = $id_kategori");
$kategori = mysqli_fetch_assoc($query_kategori);

// Menutup koneksi database
mysqli_close($koneksi);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Detail Produk</title>
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
        <ul>
          <li><a class="nav-link scrollto active" href="index.php#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="index.php#about">About</a></li>
          <li><a class="nav-link scrollto" href="index.php#services">Services</a></li>
          <li>
            <a class="nav-link scrollto" href="index.php#portfolio">Portfolio</a>
          </li>
          <li><a class="nav-link scrollto" href="index.php#team">Team</a></li>
          <li><a class="nav-link scrollto" href="index.php#pricing">Pricing</a></li>
          <li><a class="nav-link scrollto" href="index.php#contact">Contact</a></li>
          <li><a class="nav-link scrollto" href="artikel/index.php">Artikel</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->


  <main id="main" data-aos="fade-up">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Produk Details</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Produk Details</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-8">
            <div class="portfolio-details-slider swiper">
              <div class="swiper-wrapper align-items-center">

                <div class="swiper-slide">
                  <img src="admin/produk/image/<?php echo $data['image']; ?>" alt="<?php echo $data['nama_produk']; ?>">
                </div>


              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="portfolio-info">
              <h3>Produk information</h3>
              <ul>
                <li><strong>Nama Produk</strong>:
                  <?php echo $data['nama_produk']; ?>
                </li>
                <li><strong>Kategori</strong>:
                  <?php echo $kategori['kategori']; ?>
                </li>

                <li><strong>Harga</strong>:
                  <?php echo number_format($data['harga'], 0, ',', '.'); ?> IDR
                </li>
                <li><strong>Deskripsi Produk</strong>:
                  <?php echo $data['deskripsi']; ?>
                </li>
              </ul>
            </div>
            <div class="portfolio-description">
              <h2>
                <?php echo $data['nama_produk']; ?>
              </h2>
              <p>
                <?php echo $data['deskripsi']; ?>
              </p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->


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