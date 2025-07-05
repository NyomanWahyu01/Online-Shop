<?php
include 'koneksi.php';

if (isset($_POST['registrasi'])) {

    $userregis = $_POST['userregis'];
    $passregis = $_POST['passregis'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];

    // Periksa kolom yang kosong
    if (empty(empty($userregis) || empty($passregis)|| $nama) || empty($email) ||  empty($telp)|| empty($alamat)) {
        echo '<script>alert("Lengkapi Data!");</script>';
    } else {
        // Periksa nama yang sudah ada
        $cari_nama = "SELECT * FROM user WHERE nama = '$nama'";
        $cek_nama = mysqli_query($koneksi, $cari_nama);

        if (mysqli_num_rows($cek_nama) > 0) {
            echo '<script>alert("Nama sudah terdaftar! Pilih nama lain.");</script>';
        } else {
            // Periksa username yang sudah ada
            $cek_username = "SELECT * FROM user WHERE username = '$userregis'";
            $periksa_username = mysqli_query($koneksi, $cek_username);

            if (mysqli_num_rows($periksa_username) > 0) {
                echo '<script>alert("Username sudah terdaftar! Pilih username lain.");</script>';
            } else {

                $query_akun = mysqli_query($koneksi, "INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `alamat`, `email`, `telpon`) 
                VALUES (NULL, '$userregis', '$passregis', '$nama', '$alamat', '$email', '$telp')");
                
                if ($query_akun) {
                    echo '<script>alert("Berhasil Registrasi, Silahkan Login!");</script>';
                    echo '<script>window.location.href = "index.php";</script>';
                } else {
                    echo '<script>alert("Gagal Melakukan Registrasi!");</script>';
                }
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from htmlbeans.com/html/schon/registerpage.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 07 Jan 2024 16:09:09 GMT -->
<head>
  <!-- set the encoding of your site -->
  <meta charset="utf-8">
  <!-- set the viewport width and initial-scale on mobile devices -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register Page</title>
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
      <!-- mt header style4 start here -->
      <?php include('header.php');?>
      <!-- SIDEMENU LOGIN REGIS -->
      <?php include('sidemenu-login-regis.php');?>

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
        
        <section class="mt-detail-sec toppadding-zero">
          <div class="container">
            <div class="row">
              <div class="col-xs-12 col-sm-10 col-sm-push-1">
                <div class="holder" style="margin: 0;">
                    <div class="mt-side-widget">
                      <header>
                        <h2 style="margin: 0 0 5px;">register</h2>
                        <p>Don’t have an account?</p>
                      </header>
                      <form action="" method="post">
                        <fieldset>
                          <div class="row">
                            <div class="col-xs-12 col-sm-6">
                              <input id="nama" name="nama" type="text" placeholder="Nama Lengkap" class="input">
                            </div>
                            <div class="col-xs-12 col-sm-6">
                              <input id="email" name="email" type="email" placeholder="E-mail" class="input">
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-xs-12 col-sm-6">
                              <input id="userregis" name="userregis" type="text" placeholder="Username" class="input">
                            </div>
                            <div class="col-xs-12 col-sm-6">
                              <input id="telp" name="telp" type="text" placeholder="Telpon" class="input">
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-xs-12 col-sm-6">
                              <input id="passregis" name="passregis" type="password" placeholder="Password" class="input">
                            </div>
                            <div class="col-xs-12 col-sm-6">
                              <textarea id="alamat" name="alamat" placeholder="Alamat" class="input"></textarea>
                            </div>
                          </div>
                          <button class="btn-type1" type="submit" name="registrasi" value="registrasi">Registrasi</button>
                        </fieldset>
                      </form>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        
      </main><!-- Main of the Page end -->
      
  </div>
  <!-- include jQuery -->
  <script src="js/jquery.js"></script>
  <!-- include jQuery -->
  <script src="js/plugins.js"></script>
  <!-- include jQuery -->
  <script src="js/jquery.main.js"></script>
</body>

<!-- Mirrored from htmlbeans.com/html/schon/registerpage.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 07 Jan 2024 16:09:09 GMT -->
</html>