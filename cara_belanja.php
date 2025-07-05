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
  <title>Cara Belanja</title>
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
                <h1>Cara Belanja</h1>
                <nav class="breadcrumbs">
                  <ul class="list-unstyled">
                    <li><a href="index.html">Home <i class="fa fa-angle-right"></i></a></li>
                    <li><a href="#">Cara Belanja</a></li>
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

                <ol class="list">
                  <li>
                    <strong>Registrasi</strong>
                    <address>Silahkan registrasi terlebih dahulu jika belum memiliki akun.</address>
                    <img src='cara/satu.png'>
                  </li>
                  <li>
                    <strong>Login</strong>
                    <address>Login menggunakan data username dan password anda saat melakukan registrasi</address>
                    <img src='cara/dua.png'>
                  </li>
                  <li>
                    <strong>Memilih salah satu produk</strong>
                    <address>Pilih salah satu produk yang tampil pada halaman Home</address>
                    <img src='cara/tiga.png'>
                  </li>
                  <li>
                    <strong>Memilih icon "add to cart"</strong>
                    <address>Sorot mouse ke salah satu produk maka akan tampil popup menu, pilih icon cart. Maka Keranjang anda sudah bertambah 1 item produk.</address>
                    <img src='cara/empat_2.png'>
                    <img src='cara/empat_1.png'>

                  </li>
                  <li>
                    <strong>Atau memilih icon "view"</strong>
                    <address>Sorot mouse ke salah satu produk maka akan tampil popup menu pilih icon view. Anda akan diarahkan ke halaman detail produk</address>
                    <img src='cara/lima.png'>
                    <img src='cara/lima_2.png'>

                  </li>
                  <li>
                    <strong>Menambah jumlah pesanan</strong>
                    <address>Menekan icon tambah dan jumlah pesanan anda akan bertambah. Menekan icon kurang dan jumlah pesanan anda akan berkurang</address>
                   <img src='cara/enamfix.png'>

                  </li>
                  <li>
                    <strong>Menekan tombal Add To Cart</strong>
                    <address>Maka Keranjang anda akan bertambah 1 item produk.</address>
                    <img src='cara/tuju.png'>
                    <img src='cara/tuju_2.png'>

                  </li>
                  <li>
                    <strong>Melihat isi keranjang</strong>
                    <address>Klik icon keranjang pada suduk kanan atas, maka akan menampilkan semua pesanan anda</address>
                    <img src='cara/enam.png'>
                    <img src='cara/delapan.png'>
                  </li>
                  <li>
                    <strong>Menghapus pesanan di keranjang belanja</strong>
                    <address>Menekan icon hapus pada salah satu list pesanan, maka pesanan anda akan terhapus</address>
                    <img src='cara/sembilan.png'>
                  </li>
                  <li>
                    <strong>Melakukan Checkout</strong>
                    <address>Clik tomboh "Checkout", maka anda akan dialihkan ke halaman Detail Tagihan</address>
                    <img src='cara/sepuluh.png'>
                  </li>
                  <li>
                    <strong>Memasukkan Alamat</strong>
                    <address>Alamat akan muncul sesuai data login anda. Anda dapat mengubahnya dengan mengisi form alamat </address>
                    <img src='cara/sebelas.png'>
                  </li>
                  <li>
                    <strong>Buat pesanan</strong>
                    <address>Click tombol "Buat Pesanan", maka pesanan anda akan masuk kedalam keranjang pesanan</address>
                    <img src='cara/buatpesan.png'>
                    <img src='cara/buatpesan_2.png'>
                  </li>
                  <li>
                    <strong>Melihat Riwayat Pesanan</strong>
                    <address>Memilih icon menu disudut kanan atas, kemudian pilih riwayat pesanan, maka pesanan anda akan ditampilkan.</address>
                    <img src='cara/duabelas.png'>
                    <img src='cara/duabelas_2.png'>
                  </li>
                  <li>
                    <strong>Konfirmasi Pembayaran</strong>
                    <address>Memilih salah satu pesanan yang belum dibayar. Klik Tombol Detail, maka pesanan anda akan tampil dan silahkan memilih konfirmasi pembayaran. Isi data dan upload bukti pembayaran dan proses pesanan anda akan diproses oleh admin kami.</address>
                    <img src='cara/empatbelas_1.png'>
                    <img src='cara/empatbelas2.png'>
                  </li>
                  <li>
                    <strong>Pesanan anda Selesai</strong>
                    <address>Terima Kasih</address>
                    <img src='cara/limabelas.png'>
                    <img src='cara/terimakasih.jpg'>
                  </li>
                </ol>
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