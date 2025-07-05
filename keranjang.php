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
  <title>Keranjang Page</title>
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
                <h1 class="text-center">KERANJANG</h1>

              </div>
            </div>
          </div>
        </section>
        <!-- Mt Process Section of the Page -->
        <div class="mt-process-sec">
          <div class="container">
            <div class="row">
              <div class="col-xs-12">
                <ul class="list-unstyled process-list">
                  <li class="active">
                    <span class="counter">01</span>
                    <strong class="title">Keranjang</strong>
                  </li>
                  <li>
                    <span class="counter">02</span>
                    <strong class="title">Checkout</strong>
                  </li>
                  <li>
                    <span class="counter">03</span>
                    <strong class="title">Pesanan Selesai</strong>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div><!-- Mt Process Section of the Page end -->
        <!-- Mt Product Table of the Page -->
        <div class="mt-product-table">
          <div class="container">
            <div class="row border">
              <div class="col-xs-12 col-sm-6">
                <strong class="title">PRODUK</strong>
              </div>
              <div class="col-xs-12 col-sm-2">
                <strong class="title">HARGA</strong>
              </div>
              <div class="col-xs-12 col-sm-2">
                <strong class="title">QUANTITY</strong>
              </div>
              <div class="col-xs-12 col-sm-2">
                <strong class="title">TOTAL</strong>
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
              "select * from data_keranjang, data_produk where data_keranjang.id_user='$id_user' 
            and data_keranjang.id_pesanan='0' and data_keranjang.id_produk=data_produk.id_produk"
            );

            $subtotal = 0;
            while ($data = mysqli_fetch_array($query)) {

              $subtotal = $subtotal + $data['total'];

              echo "
              <div class='row border'>
              <div class='col-xs-12 col-sm-2'>
                <div class='img-holder'>
                  <img src='admin/$data[gambar]' alt='image description' style='height: 100px;'>
                </div>
              </div>
              <div class='col-xs-12 col-sm-4'>
                <strong class='price'>$data[merek]</strong>
              </div>
              <div class='col-xs-12 col-sm-2'>
                <strong class='price'>" . format_rupiah($data['hargax']) . "</strong>
              </div>

              <div class='col-xs-12 col-sm-2'>
                <strong class='price'> $data[qty] </strong>
                <div class='quantity-buttons col-xs-12 col-sm-2'>
                  <form method='post' action='update_quantity.php'>
                    <input type='hidden' name='id_keranjang' value='$data[id_keranjang]'>
                    <br><br><br>
                    <button type='submit' name='action' value='add' class='btn btn-default quantity-btn'><i class='fa fa-plus'></i></button>
                    <button type='submit' name='action' value='subtract' class='btn btn-default quantity-btn'><i class='fa fa-minus'></i></button>
                  </form>
                </div>
              </div>

              
              <div class='col-xs-12 col-sm-2'>
              <strong class='price'>" . format_rupiah($data['total']) . "</strong>
              <a href='hapus_produk.php?id_keranjang=$data[id_keranjang]'><i class='fa fa-close'></i></a>
              </div>
            </div>
              ";
            }

            // Periksa apakah totalnya 0 dan nonaktifkan tombol checkout
            $isCheckoutDisabled = $subtotal == 0;

            ?>


          </div>
        </div><!-- Mt Product Table of the Page end -->
        <!-- Mt Detail Section of the Page -->
        <section class="mt-detail-sec style1">
          <div class="container">
            <div class="row">
              <div class="col-xs-12 col-sm-6">

              </div>
              <div class="col-xs-12 col-sm-6">
                <h2>TOTAL KERANJANG</h2>
                <ul class="list-unstyled block cart">
                  <li>
                    <div class="txt-holder">
                      <strong class="title sub-title pull-left">TOTAL</strong>
                      <div class="txt pull-right">
                        <span> <?= format_rupiah($subtotal); ?></span>
                      </div>
                    </div>
                  </li>

                </ul>
                <!-- <a href="checkout.php" class="process-btn">PROSES CHECKOUT <i class="fa fa-check"></i></a> -->
                <?php if ($isCheckoutDisabled) : ?>
                  <button class="process-btn" disabled>PROSES CHECKOUT <i class="fa fa-check"></i></button>
                  <p class="text-danger">Keranjang Anda kosong. Tambahkan produk ke keranjang sebelum
                    melanjutkan.</p>
                <?php else : ?>
                  <a href="checkout.php" class="process-btn">PROSES CHECKOUT <i class="fa fa-check"></i></a>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </section>
        <!-- Mt Detail Section of the Page end -->
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