<?php
session_start();
$id_user = $_SESSION['id_user'];

?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from htmlbeans.com/html/schon/order-shopping-cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 07 Jan 2024 16:09:05 GMT -->

<head>
  <!-- set the encoding of your site -->
  <meta charset="utf-8">
  <!-- set the viewport width and initial-scale on mobile devices -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>History Page</title>
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
    <!-- Page Loader -->

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
        <section class="mt-contact-banner mt-banner-22" style="background-image: url(logo/bg31.jpg);">
          <div class="container">
            <div class="row">
              <div class="col-xs-12">
                <h1 class="text-center">WISHLIST</h1>
              </div>
            </div>
          </div>
        </section>

        <div class="mt-product-table">
          <div class="container">

            <hr>
            <div class="row border">
              <div class="col-xs-12 col-sm-2">
                <strong class="title">No.</strong>
              </div>
              <div class="col-xs-12 col-sm-4">
                <strong class="title">Nama Produk</strong>
              </div>
              <div class="col-xs-12 col-sm-2">
                <strong class="title">Merek</strong>
              </div>
              <div class="col-xs-12 col-sm-2">
                <strong class="title">Harga</strong>
              </div>

            </div>
            <?php
            function format_rupiah($angka)
            {
              $rupiah = "Rp " . number_format($angka, 0, ',', '.');
              return $rupiah;
            }
            include("koneksi.php");
            $query = mysqli_query(
              $koneksi,
              "select * from data_wishlist,data_produk where data_produk.id_produk = data_wishlist.id_produk and data_wishlist.id_user=$id_user"
            );
            $no = 1;
            while ($data = mysqli_fetch_array($query)) {

              echo "
              <div class='row border'>
              <div class='col-xs-12 col-sm-2'>
                <strong class='price'>$no</strong>
              </div>
              <div class='col-xs-12 col-sm-4'>
              <a href='produk-detail.php?id_produk=$data[id_produk]'><strong class='price'>$data[nama_produk]</strong></a>
              </div>
              <div class='col-xs-12 col-sm-2'>
                <strong class='price'>$data[merek]</strong>
              </div>
              <div class='col-xs-12 col-sm-2'>
                <strong class='price'>" . format_rupiah($data['harga']) . "</strong>
                <a href='hapus_wishlist.php?id_wishlist=$data[id_wishlist]'><i class='fa fa-close'></i></a>
              </div>
              
              

            </div>
              ";
              $no++;
            }
            ?>
          </div>
        </div><!-- Mt Product Table of the Page end -->

      </main><!-- Main of the Page end here -->
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
</body>

<!-- Mirrored from htmlbeans.com/html/schon/order-shopping-cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 07 Jan 2024 16:09:06 GMT -->

</html>