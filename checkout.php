<?php
session_start();
$id_user = $_SESSION['id_user'];
include('koneksi.php');

?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from htmlbeans.com/html/schon/order-checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 07 Jan 2024 16:09:06 GMT -->

<head>
  <!-- set the encoding of your site -->
  <meta charset="utf-8">
  <!-- set the viewport width and initial-scale on mobile devices -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Checkout Page</title>
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
      <section class="mt-contact-banner mt-banner-22" style="background-image: url(logo/bg21.jpg);">
        <div class="container">
          <div class="row">
            <div class="col-xs-12">
              <h1 class="text-center">CHECK OUT</h1>
              <!-- Breadcrumbs of the Page -->
              <nav class="breadcrumbs">
                <ul class="list-unstyled">
                  <li><a href="#">Home <i class="fa fa-angle-right"></i></a></li>
                  <li>Check Out</li>
                </ul>
              </nav>
              <!-- Breadcrumbs of the Page end -->
            </div>
          </div>
        </div>
      </section>
      <!-- Mt Process Section of the Page -->
      <div class="mt-process-sec">
        <div class="container">
          <div class="row">
            <div class="col-xs-12">
              <!-- Process List of the Page -->
              <ul class="list-unstyled process-list">
                <li class="active">
                  <span class="counter">01</span>
                  <strong class="title">Keranjang</strong>
                </li>
                <li class="active">
                  <span class="counter">02</span>
                  <strong class="title">Check Out</strong>
                </li>
                <li>
                  <span class="counter">03</span>
                  <strong class="title">Pesanan Selesai</strong>
                </li>
              </ul>
              <!-- Process List of the Page end -->
            </div>
          </div>
        </div>
      </div><!-- Mt Process Section of the Page end -->
      <!-- Mt Detail Section of the Page -->
      <section class="mt-detail-sec toppadding-zero">
        <div class="container">
          <div class="row">
            <div class="col-xs-12 col-sm-6">
              <h2>DETAIL TAGIHAN</h2>
              <!-- Bill Detail of the Page -->
              <?php
              include("koneksi.php");

              $query = mysqli_query($koneksi, "SELECT * FROM `user` WHERE id_user = $id_user");

              if ($query) {
                $datauser = mysqli_fetch_assoc($query);

                $nama = $datauser['nama'];
                $alamat = $datauser['alamat'];
                $email = $datauser['email'];
                $telp = $datauser['telpon'];
              }
              ?>
              <form action="proses_checkout.php" class="bill-detail" method="post">
                <fieldset>
                  <div class="form-group">
                    <input name="nama" text" class="form-control" placeholder="Nama Lengkap" value="<?php echo $nama; ?>">
                  </div>
                  <div class="form-group">
                    <textarea name="alamat" form-control" placeholder="Alamat"><?php echo $alamat; ?></textarea>
                  </div>
                  <div class="form-group">
                    <div class="col">
                      <input name="email" type="email" class="form-control" placeholder="Email" value="<?php echo $email; ?>">
                    </div>
                    <div class="col">
                      <input name="telpon" type="text" class="form-control" placeholder="Telp" value="<?php echo $telp; ?>">
                    </div>
                  </div>

                </fieldset>


                <!-- Bill Detail of the Page end -->
            </div>
            <div class="col-xs-12 col-sm-6">
              <div class="holder">
                <h2>PESANAN ANDA</h2>
                <ul class="list-unstyled block">
                  <?php
                  function format_rupiah($angka)
                  {
                    $rupiah = "Rp " . number_format($angka, 0, ',', '.');
                    return $rupiah;
                  }
                  include("koneksi.php");
                  $id_user = $_SESSION['id_user'];
                  $query = mysqli_query(
                    $koneksi,
                    "SELECT * FROM data_keranjang A 
                    INNER JOIN data_produk B 
                    ON A.id_produk = B.id_produk 
                    WHERE A.id_user = '$id_user'
                    AND A.id_pesanan = 0"
                  );

                  $subtotal = 0;

                  while ($data = mysqli_fetch_array($query)) {
                    $subtotal += $data['total'];

                    echo "
                          <li>
                              <div class='txt-holder'>
                                  <div class='text-wrap pull-left'>
                                      <strong class='title'>PRODUK</strong>
                                      <span>{$data['merek']} x{$data['qty']}</span>
                                  </div>
                                  <div class='text-wrap txt text-right pull-right'>
                                      <strong class='title'>TOTAL</strong>
                                      <span>" . format_rupiah($data['total'], 2) . "</span>
                                  </div>
                              </div>
                          </li>
                      ";
                  }
                  $_SESSION['cart_subtotal'] = $subtotal;
                  ?>
                  <li>
                    <div class="txt-holder">
                      <strong class="title sub-title pull-left">SUBTOTAL</strong>
                      <div class="txt pull-right">
                        <span></i> <?php echo format_rupiah($subtotal, 2); ?></span>
                      </div>
                    </div>
                  </li>


                  <li>
                    <div class="txt-holder">
                      <strong class="title sub-title pull-left">PENGIRIMAN</strong>
                      <div class="txt pull-right">
                        <span>GRATIS ONGKIR</span>
                      </div>
                    </div>
                  </li>
                  <li style="border-bottom: none;">
                    <div class="txt-holder">
                      <strong class="title sub-title pull-left">TOTAL PESANAN</strong>
                      <div class="txt pull-right">
                        <span></i> <?php echo format_rupiah($subtotal, 2); ?></span>
                      </div>
                    </div>
                  </li>
                </ul>

                <h2>METODE PEMBAYARAN</h2>
                <!-- Panel Group of the Page -->
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                  <!-- Panel Panel Default of the Page -->
                  <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">
                      <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          BANK TRANSFER
                          <span class="check" onclick='tes("Transfer")'><i class="fa fa-check"></i></span>

                          <script>
                            function tes(e) {
                              // alert('Payment Confirmed! ' + e );
                              document.getElementById("metode_pembayaran").value = e;
                            }
                          </script>
                        </a>
                      </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                      <div class="panel-body">
                      </div>
                    </div>
                  </div>



                </div>
                <!-- Panel Group of the Page end -->
              </div>

              <input type="hidden" name="metode_pembayaran" id="metode_pembayaran" value='Transfer'>
              <button type="submit" class="process-btn">BUAT PESANAN<i class="fa fa-check"></i></button>

              </form>
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

<!-- Mirrored from htmlbeans.com/html/schon/order-checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 07 Jan 2024 16:09:06 GMT -->

</html>