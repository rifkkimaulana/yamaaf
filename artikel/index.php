<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Halaman Artikel</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">
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
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="../#about">About</a></li>
          <li><a class="nav-link scrollto" href="../#services">Services</a></li>
          <li>
            <a class="nav-link scrollto" href="../#portfolio">Portfolio</a>
          </li>
          <li><a class="nav-link scrollto" href="../#team">Team</a></li>
          <li><a class="nav-link scrollto" href="../#pricing">Pricing</a></li>
          <li><a class="nav-link scrollto" href="../#contact">Contact</a></li>
          <li><a class="nav-link scrollto" href="../#artikel">Artikel</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div id="artikel" class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Artikel</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Artikel</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
      <div class="container">

        <?php
        include '../config.php';
        // Query untuk mendapatkan data artikel
        $query = "SELECT a.*, k.kategori_artikel
              FROM tb_artikel a
              INNER JOIN tb_kategori_artikel k ON a.id_kategori = k.id
              ORDER BY a.created_time DESC";

        $result = mysqli_query($koneksi, $query);

        // Loop melalui setiap artikel
        while ($row = mysqli_fetch_assoc($result)) {
          $id = $row['id'];
          $judul = $row['judul_artikel'];
          $konten = $row['content_artikel'];
          $kategori = $row['kategori_artikel'];
          $cover = $row['cover'];
          $created_time = $row['created_time'];
          $slug = $row['slug'];
          ?>

          <div class="article">
            <h2>
              <?php echo $judul; ?>
            </h2>
            <div class="article-meta">
              <span class="category">
                <?php echo 'Kategori: ', $kategori; ?>
              </span></br>
              <span class="date">
                <?php echo 'Diposting pada: ', $created_time; ?>
              </span>
            </div>
            <img src="../admin/artikel/image/<?php echo $cover; ?>" width="200">

            <p>
              <?php echo $konten; ?>
            </p>
            <a href="article.php?slug=<?php echo $slug; ?>">Read More</a>
          </div>

          <?php
        }
        ?>

      </div>
    </section>

  </main><!-- End #main -->
  <?php include '../footer.php'; ?>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>