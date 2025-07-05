<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from htmlbeans.com/html/schon/homepage10.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 10 Jun 2024 03:06:24 GMT -->

<head>
  <!-- set the encoding of your site -->
  <meta charset="utf-8">
  <!-- set the viewport width and initial-scale on mobile devices -->
  <link rel="icon" href="logo/toko-logo.png" />
  <title>Toko-Orange</title>
  <!-- include the site stylesheet -->
  <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,200,200italic,300,300italic,400italic,600,600italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Oxygen:400,300,700' rel='stylesheet' type='text/css'>
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

<body class="right-side">
  <!-- main container of all the page elements -->
  <div id="wrapper">
    <!-- Page Loader -->

    <!-- W1 start here -->
    <div class="w1">
      <!-- mt header style9 start here -->
      <?php include("header.php"); ?>
      <!-- mt side menu start here -->
      <div class="mt-side-menu">
        <!-- mt holder start here -->
        <div class="mt-holder">
          <a href="#" class="side-close"><span></span><span></span></a>
          <strong class="mt-side-title">MENU</strong>
          <!-- mt side widget start here -->

        </div><!-- mt holder end here -->
      </div><!-- mt side menu end here -->
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
      <!-- mt main start here -->
      <main id="mt-main">
        <!-- mt-mainslider4 add start here -->

        <div id="product-masonry">
          <div class="container">
            <div class="row">
              <div class="col-xs-12">
                <ul id="product-filter">
                  <li class="active"><a href="#">Hasil Pencarian</a></li>
                </ul>
                <ul class="masonry-list">
                  <?php
                  function format_rupiah($angka)
                  {
                    $rupiah = "Rp " . number_format($angka, 0, ',', '.');
                    return $rupiah;
                  }
                  include("koneksi.php");
                  $nama_produk = $_REQUEST['cari'];
                  $query = mysqli_query($koneksi, "select * from data_produk where nama_produk like '%$nama_produk%' ");
                  while ($data = mysqli_fetch_array($query)) {
                    echo '
                    <li class="fil1">
                    <!-- mt product start here -->
                    <div class="mt-product1 large">
                      <!-- box start here -->
                      <div class="box">
                        <img alt="image description" src="admin/' . $data['gambar'] . '">
                       
                        <ul class="links">
                        <li><a href="addtocart.php?id_produk=' . $data['id_produk'] . '"><i class="icon-handbag"></i></a></li>
                        <li><a href="produk-detail.php?id_produk=' . $data['id_produk'] . '"> <i class="icomoon icon-eye"></i></a></li>
                        <li><a href="addtowishlist.php?id_produk=' . $data['id_produk'] . '"> <i class="icon-heart"></i></a></li>

                        </ul>
                      </div><!-- box end here -->
                      <!-- txt end here -->
                      <div class="txt">
                        <strong class="title">' . $data['nama_produk'] . '</strong>
                        <span class="price"><span>' . format_rupiah($data['harga']) . '</span></span>
                      </div><!-- txt end here -->
                    </div><!-- mt product1 end here -->
                  </li>
                    ';
                  }
                  ?>



                </ul>
              </div>
            </div>
          </div>
        </div>
      </main>
      <!-- footer of the Page -->
      <footer id="mt-footer">
        <!-- Footer area of the Page -->
        <?php include("footer.php"); ?>
        <!-- Footer area of the Page end -->
      </footer>
      <!-- footer of the Page end -->
    </div><!-- W1 end here -->
    <span id="back-top" class="fa fa-arrow-up"></span>
  </div>
  <!-- Popup Holder of the Page -->

  <!-- include jQuery -->
  <script src="js/jquery.js"></script>
  <!-- include jQuery -->
  <script src="js/plugins.js"></script>
  <!-- include jQuery -->
  <script src="js/jquery.main.js"></script>
</body>

<!-- Mirrored from htmlbeans.com/html/schon/homepage10.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 10 Jun 2024 03:06:26 GMT -->

</html>