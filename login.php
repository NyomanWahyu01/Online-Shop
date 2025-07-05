<?php
session_start();
include 'koneksi.php';

// Memeriksa apakah formulir login telah dikirimkan
if (isset($_POST["login"])) {

    // Mengambil nilai dari kolom username dan password yang dikirimkan melalui formulir
    $userlogin = $_POST['userlogin'];
    $passlogin = $_POST['passlogin'];

    // Jika kolom formulir tidak kosong, membuat kueri SQL untuk mencari username di database
    $query = mysqli_query($koneksi, "SELECT * FROM `user` WHERE `username` = '$userlogin' AND `password` = '$passlogin' ");
    $jumlah = mysqli_num_rows($query);
    $data = mysqli_fetch_array($query);

    // Pengecekan apakah tidak ada hasil atau password yang dimasukkan tidak cocok dengan password di database
    if ($jumlah == 0) {
        // Jika kondisi tidak terpenuhi, menampilkan pesan peringatan dan mengarahkan pengguna kembali ke halaman login
        echo "
            <script>
                alert('Username atau password salah');
                location.href='login.php';
            </script>
        ";
    } else {
        // Jika username dan password cocok, menyimpan beberapa informasi pengguna dalam sesi
        $_SESSION['id_user'] = $data['id_user'];
        $_SESSION['userlogin'] = $userlogin;
        // Menampilkan pesan sukses dan mengarahkan pengguna ke halaman setelah login
        echo "
            <script>
                alert('Berhasil Login');
                location.href='index.php'; 
            </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from htmlbeans.com/html/schon/loginpage.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 07 Jan 2024 16:09:09 GMT -->
<head>
  <!-- set the encoding of your site -->
  <meta charset="utf-8">
  <!-- set the viewport width and initial-scale on mobile devices -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <title>Login Page</title>
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
        <!-- Mt Detail Section of the Page -->
        <section class="mt-detail-sec toppadding-zero">
          <div class="container">
            <div class="row">
              <div class="col-xs-12 col-sm-8 col-sm-push-2">
                <div class="holder" style="margin: 0;">
                    <div class="mt-side-widget">
                      <header>
                        <h2 style="margin: 0 0 5px;">LOGIN</h2>
                        <p></p>
                      </header>
                      <form action="" method="post">
                        <fieldset>
                          <input id="userlogin" name="userlogin" type="text" placeholder="Username" class="input">
                          <input id="passlogin" name="passlogin" type="password" placeholder="Password" class="input">
                          <button name="login" value="login" type="submit" class="btn-type1">Login</button>
                          <br></br>
                          <p>Belum Punya Akun? <a href="registrasi.php">Registrasi</a></p>
                        </fieldset>
                      </form>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </section>

      </main><!-- Main of the Page end -->

  <!-- include jQuery -->
  <script src="js/jquery.js"></script>
  <!-- include jQuery -->
  <script src="js/plugins.js"></script>
  <!-- include jQuery -->
  <script src="js/jquery.main.js"></script>
</body>

<!-- Mirrored from htmlbeans.com/html/schon/loginpage.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 07 Jan 2024 16:09:09 GMT -->
</html>