<?php
session_start();
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from htmlbeans.com/html/schon/product-detail2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 07 Jan 2024 16:09:05 GMT -->

<head>
    <!-- set the encoding of your site -->
    <meta charset="utf-8">
    <!-- set the viewport width and initial-scale on mobile devices -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk Detail</title>
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
        <!-- W1 start here -->

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
            <!-- mt main start here -->
            <main id="mt-main">
                <!-- Mt Product Detial of the Page -->
                <section class="mt-product-detial wow fadeInUp" data-wow-delay="0.4s">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <!-- Slider of the Page -->
                                <?php
                                include 'koneksi.php';

                                if (isset($_GET['id_produk'])) {
                                    $id_produk = $_GET['id_produk'];

                                    $query = mysqli_query($koneksi, "SELECT * FROM `data_produk` WHERE `id_produk` = $id_produk");

                                    if ($query && $data = mysqli_fetch_array($query)) {
                                        echo "
											<div class='slider'>
												<div class='product-slider'>
													<div class='slide'>
														<img src='admin/$data[gambar]' alt='image description' style='height: 500px;'>
													</div>
												</div>		
											</div>
													
											<div class='detial-holder'>
											
									
												<ul class='list-unstyled breadcrumbs'>
													<li><a href='#'>Dashboard<i class='fa fa-angle-right'></i></a></li>
													<li>Products</li>
												</ul>
												<!-- Breadcrumbs of the Page end -->
                                                <h2>$data[nama_produk]</h2>
												<h3>Merek : &nbsp;$data[merek] </h3>
                                                <h3>Warna : &nbsp;$data[warna] </h3>
                                                <h3>Size  : &nbsp;$data[size] </h3>
                                                <h3>Berat : &nbsp;$data[berat]</h3>
												<!-- Rank Rating of the Page -->
												
												<div class='text-holder'>
													<span class='price'>Rp. " . number_format($data['harga']) . "</span>
													<br>
													<b>Stok: $data[stok]</b>

												</div>
												<!-- Product Form of the Page -->
												<form action='addtocart.php?id_produk=$id_produk' method='POST' class='product-form' style='margin-bottom: 40px'>
													<fieldset>
														<input type='hidden' name='id_produk' value='$id_produk'>
														<div class='row-val'>
															<label>qty</label>
															<input type='number' id='qytpd' name='qyt' placeholder='1' min='1'>
														</div>
														<div class='row-val'>
															<button type='submit'>ADD TO CART</button>
														</div>
													</fieldset>
												</form>

												<!-- Rank Rating of the Page end -->
												<div class='txt-wrap'>
													<p>{$data['deskripsi']}</p>
												</div>";
                                    } else {
                                        echo "Produk tidak ditemukan.";
                                    }
                                } else {
                                    echo "ID Produk tidak ditemukan.";
                                }
                                ?>

                                <!-- Product Form of the Page end -->
                            </div>
                            <!-- Detail Holder of the Page end -->
                        </div>
                    </div>
        </div>
        </section><!-- Mt Product Detial of the Page end -->

        </main><!-- mt main end here -->
        <!-- footer of the Page -->
        <?php include('footer.php'); ?>
    </div><!-- W1 end here -->
    <span id="back-top" class="fa fa-arrow-up"></span>
    </div>
    <!-- include jQuery -->
    <script src="js/jquery.js"></script>
    <!-- include jQuery -->
    <script src="js/plugins.js"></script>
    <!-- include jQuery -->
    <script src="js/jquery.main.js"></script>
</body>

<!-- Mirrored from htmlbeans.com/html/schon/product-detail2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 07 Jan 2024 16:09:05 GMT -->

</html>