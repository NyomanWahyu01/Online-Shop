<?php
session_start();
$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from demo.riktheme.com/xvito/compact-menu/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 04 Jan 2024 03:22:51 GMT -->
<!-- Head -->
<?php include('head.php'); ?>

<body class="sidebar-mini">
  <div class="main-container-wrapper">
    <!-- HEADER -->
    <?php include('header.php'); ?>

    <div class="container-fluid page-body-wrapper">
      <!-- Side Menu area -->
      <?php include("side-bar.php"); ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="container-fluid">
            <!-- Get Data -->
            <?php
            include 'koneksi.php';
            //ambil data user
            $get1 = mysqli_query($koneksi, "SELECT * FROM user");
            $user = mysqli_num_rows($get1);

            //ambil data produk
            $get2 = mysqli_query($koneksi, "SELECT * FROM data_produk");
            $produk = mysqli_num_rows($get2);

            //ambil total data pesanan
            $get3 = mysqli_query($koneksi, "SELECT * FROM data_pesanan");
            $pesanan = mysqli_num_rows($get3);


            //ambil data pesanan yang Lunas
            $get4 = mysqli_query($koneksi, "SELECT * FROM data_pesanan WHERE status= 'Lunas'");
            $pesananlunas = mysqli_num_rows($get4);


            //ambil data pesanan yang belum bayar
            $get5 = mysqli_query($koneksi, "SELECT * FROM data_pesanan WHERE status='Belum Bayar'");
            $pesananbelum = mysqli_num_rows($get5);



            ?>

            <div class="row">
              <div class="col-12 col-sm-6 col-xl">
                <!-- Card -->
                <div class="card box-margin">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col">
                        <!-- Title -->
                        <h6 class="text-uppercase font-14">Data User</h6>
                        <!-- Heading -->
                        <span class="font-24 text-dark mb-0"><?= $user; ?> Orang </span>
                      </div>

                      <div class="col-auto">
                        <!-- Icon -->
                        <div class="icon">
                          <img src="gambar/manusia.png" alt="" />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-12 col-sm-6 col-xl">
                <!-- Card -->
                <div class="card box-margin">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col">
                        <!-- Title -->
                        <h6 class="font-14 text-uppercase">Data Produk</h6>
                        <!-- Heading -->
                        <span class="font-24 text-dark mb-0"><?= $produk; ?> Barang</span>
                      </div>
                      <div class="col-auto">
                        <!-- Icon -->
                        <div class="icon">
                          <img src="gambar/bag.png" alt="" />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-12 col-sm-6 col-xl">
                <!-- Card -->
                <div class="card box-margin">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col">
                        <!-- Title -->
                        <h6 class="font-14 text-uppercase">Data Pesanan</h6>
                        <div class="row align-items-center no-gutters">
                          <div class="col-auto">
                            <!-- Heading -->
                            <span class="font-24 text-dark mr-2">
                              <?= $pesanan; ?> Orderan
                            </span>
                          </div>

                        </div>
                      </div>

                      <div class="col-auto">
                        <!-- Icon -->
                        <div class="icon">
                          <img src="gambar/keranjang.png" alt="" />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-12 col-sm-6 col-xl">
                <!-- Card -->
                <div class="card box-margin">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col">
                        <!-- Title -->
                        <h6 class="font-14 text-uppercase">Data Pesanan Lunas </h6>
                        <!-- Heading -->
                        <span class="font-24 text-dark"> <?= $pesananlunas; ?> Orderan </span>
                      </div>
                      <div class="col-auto">
                        <!-- Icon -->
                        <div class="icon">
                          <img src="gambar/card lunas.png" alt="" />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- / .row -->

          </div>

          <!-- Footer Area -->
          <?php include('footer.php'); ?>
        </div>
      </div>
    </div>
  </div>

  <!-- Plugins Js -->
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/bundle.js"></script>
  <script src="js/default-assets/fullscreen.js"></script>

  <!-- Active JS -->
  <script src="js/canvas.js"></script>
  <script src="js/collapse.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/template.js"></script>
  <script src="js/default-assets/active.js"></script>

  <!-- Inject JS -->
  <script src="js/default-assets/mini-event-calendar.min.js"></script>
  <script src="js/default-assets/mini-calendar-active.js"></script>
  <script src="js/default-assets/apexchart.min.js"></script>
  <script src="js/default-assets/dashboard-active.js"></script>
</body>

<!-- Mirrored from demo.riktheme.com/xvito/compact-menu/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 04 Jan 2024 03:23:33 GMT -->

</html>