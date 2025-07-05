<?php
session_start();
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from htmlbeans.com/html/schon/contact-us2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 07 Jan 2024 16:09:13 GMT -->

<head>
  <!-- set the encoding of your site -->
  <meta charset="utf-8">
  <!-- set the viewport width and initial-scale on mobile devices -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Page</title>
  <!-- Favicon -->
  <link rel="icon" href="logo/toko-logo.png" />
  <!-- include the site stylesheet -->
  <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,200,200italic,300,300italic,400italic,600,600italic,700,700italic,900,900italic%7cMontserrat:400,700%7cOxygen:400,300,700' rel='stylesheet' type='text/css'>
  <!-- include the site stylesheet -->
  <link rel="stylesheet" href="css/bootstrap.css">
  <!-- include the site stylesheet -->
  <link rel="stylesheet" href="css/animate.css">
  <!-- include the site stylesheet -->
  <link rel="stylesheet" href="css/icon-fonts.css">
  <!-- include the site stylesheet -->
  <link rel="stylesheet" href="css/main.css">
  <!-- include the site stylesheet -->
  <link rel="stylesheet" href="css/responsive.css">
</head>

<body>
  <!-- main container of all the page elements -->
  <div id="wrapper">
    <div class="w1">
      <?php
      if (isset($_SESSION['id_user'])) {
        // Pengguna sudah masuk, sertakan file datadiri.php
        include('datadiri.php');
      } else {
        // Pengguna belum masuk, sertakan file sidemenu-login-regis.php
        include('sidemenu-login-regis.php');
      }
      ?>

      <!-- Header -->
      <?php include('header.php'); ?>

      <!-- mt search popup start here -->
      <div class="mt-search-popup">
        <div class="mt-holder">
          <a href="#" class="search-close"><span></span><span></span></a>
          <div class="mt-frame">
            <form action="#">
              <fieldset>
                <input type="text" placeholder="Search...">
                <span class="icon-microphone"></span>
                <button class="icon-magnifier" type="submit"></button>
              </fieldset>
            </form>
          </div>
        </div>
      </div><!-- mt search popup end here -->
      <!-- Main of the Page -->
      <main id="mt-main">
        <!-- Mt Contact Banner of the Page -->
        <section class="mt-contact-banner wow fadeInUp" data-wow-delay="0.4s" style="background-image: url(logo/backgrounds.jpg);">
          <div class="container">
            <div class="row">
              <div class="col-xs-12 text-center">
                <h1>CONTACT</h1>
                <nav class="breadcrumbs">
                  <ul class="list-unstyled">
                    <li><a href="index.html">Home <i class="fa fa-angle-right"></i></a></li>
                    <li><a href="#">Contact</a></li>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </section><!-- Mt Contact Banner of the Page -->
        <!-- Mt Contact Detail of the Page -->
        <section class="mt-contact-detail content-info wow fadeInUp" data-wow-delay="0.4s">
          <div class="container-fluid">
            <div class="row">
              <div class="col-xs-12 col-sm-8">
                <div class="txt-wrap">
                  <h2>Toko Orange</h2>
                  <p>Menjual segala jenis Sepatu dan Pakaian</p>
                </div>
                <ul class="list-unstyled contact-txt">
                  <li>
                    <strong>Address</strong>
                    <address>Jalan Perintis Kemerdekaan KM.9 </address>
                  </li>
                  <li>
                    <strong>Phone</strong>
                    <a href="#">+62 865849774949</a>
                  </li>
                  <li>
                    <strong>E_mail</strong>
                    <a href="#">info@toko-orange.com</a>
                  </li>
                </ul>
              </div>

            </div>
          </div>
        </section><!-- Mt Contact Detail of the Page end -->
        <!-- Mt Map Holder of the Page -->

      </main>
      <!-- footer of the Page -->
      <?php include('footer.php'); ?>
      <!-- footer of the Page end -->
    </div>
    <span id="back-top" class="fa fa-arrow-up"></span>
  </div>
  <!-- include jQuery -->
  <script src="js/jquery.js"></script>
  <!-- include jQuery -->
  <script src="js/plugins.js"></script>
  <!-- include jQuery -->
  <script src="js/jquery.main.js"></script>
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
</body>

<!-- Mirrored from htmlbeans.com/html/schon/contact-us2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 07 Jan 2024 16:09:13 GMT -->

</html>