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
  <title>Invoice Page</title>
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
                <h1 class="text-center">PESANAN SELESAI</h1>
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
                    <strong class="title">Keranjang Belanja</strong>
                  </li>
                  <li class="active">
                    <span class="counter">02</span>
                    <strong class="title">Check Out</strong>
                  </li>
                  <li class="active">
                    <span class="counter">03</span>
                    <strong class="title">Pesanan Selesai</strong>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="mt-product-table">
          <div class="container">
            <div class="row">
              <div class="col-xs-12 col-sm-6">
                <h2>TAGIHAN KEPADA</h2>
                <?php
                include("koneksi.php");
                $id_pesanan = $_GET['id_pesanan'];
                $query = mysqli_query($koneksi, "SELECT * FROM `data_pesanan` where id_pesanan='$id_pesanan'");

                if ($query) {
                  $datapesanan = mysqli_fetch_assoc($query);

                  $id_pesanan = $datapesanan['id_pesanan'];
                  $tgl_pesanan = $datapesanan['tgl_pesanan'];
                  $nama = $datapesanan['nama'];
                  $alamat = $datapesanan['alamat'];
                  $email = $datapesanan['email'];
                  $telpon = $datapesanan['telpon'];
                  $status = $datapesanan['status'];
                }
                ?>
                <form action="" class="bill-detail">
                  <fieldset>

                    <div class="form-group">
                      <label>Nama : <?php echo $nama; ?></label>
                    </div>
                    <div class="form-group">
                      <label>Alamat: <?php echo $alamat; ?></label>
                    </div>
                    <div class="form-group">
                      <label>Email: <?php echo $email; ?></label>
                    </div>
                    <div class="form-group">
                      <label>No.Telpon: <?php echo $telpon; ?></label>
                    </div>
                  </fieldset>
                </form>
              </div>

              <div class="col-xs-12 col-sm-6">
                <h2>INVOICE</h2>

                <form action="" class="bill-detail">
                  <fieldset>
                    <div class="form-group">
                      <label>ID Pesanan : <?php echo $id_pesanan; ?></label>
                    </div>
                    <div class="form-group">
                      <label>Tanggal Pesanan : <?php echo $tgl_pesanan; ?></label>
                    </div>

                  </fieldset>
                </form>
              </div>

            </div>
            <hr>
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
            $query = mysqli_query($koneksi, "select * from data_keranjang,data_produk where data_keranjang.id_pesanan='$id_pesanan' and data_keranjang.id_produk=data_produk.id_produk");
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
              </div>
              <div class='col-xs-12 col-sm-2'>
              <strong class='price'>" . format_rupiah($data['total']) . "</strong>
              </div>
            </div>
              ";
            }
            ?>
          </div>
        </div><!-- Mt Product Table of the Page end -->
        <!-- Mt Detail Section of the Page -->
        <section class="mt-detail-sec style1">
          <div class="container">
            <?php

            if ($status == "Belum Bayar") {


              echo '
              <div class="col-xs-12 col-sm-6">
                <h2>Metode Pembayaran</h2>
                <form action="upload_bukti.php" class="bill-detail" method="post" enctype="multipart/form-data">
                  <fieldset>
                    <div class="form-group">
                      <label>Silahkan Melakukan Transfer Ke:</label>
                      <br>Bank BNI
                      <br>Norek : 7638816383
                      <br>An. Nyoman Nurul
                      <br><br>
                      <label>Setelah melakukan pembayaran, silahkan upload bukti pembayaran anda dibawah ini</label>
                      <input type="hidden" name="id_pesanan" value="' . $id_pesanan . '" class="form-control">
                      <input type="file" name="file" id="file" class="form-control" required>
                      <br>
                      <button type="submit" class="process-btn form-control">Kirim<i class="fa fa-check"></i></button>
                    </div>

                  </fieldset>
                </form>
              </div>';
            } else {
              echo '
              <div class="col-xs-12 col-sm-6">
                <h2>Status Pesanan:</h2>
                <h1>' . $status . '</h1>
              </div>';
            }
            ?>
            <div class="col-xs-12 col-sm-6">
              <h2>TOTAL</h2>
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