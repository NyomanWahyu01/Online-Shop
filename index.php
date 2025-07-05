<?php
session_start();
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from htmlbeans.com/html/schon/homepage1.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 07 Jan 2024 16:07:59 GMT -->

<head>
    <!-- set the encoding of your site -->
    <meta charset="utf-8">
    <!-- set the viewport width and initial-scale on mobile devices -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>

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
    <link rel="stylesheet" href="path/to/icomoon/style.css">
</head>

<body>
    <!-- main container of all the page elements -->
    <div id="wrapper">
        <!-- W1 start here -->
        <div class="w1">
            <!-- mt header style4 start here -->
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
            <!-- mt main slider start here -->
            <div class="mt-main-slider">
                <!-- slider banner-slider start here -->
                <div class="slider banner-slider">
                    <!-- holder start here -->
                    <div class="holder text-center" style="background-image: url(logo/bg1b.jpg);">
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="text">
                                        <strong class="title"></strong>
                                        <h1>TOKO ORANGE</h1>
                                        <h2></h2>
                                        <div class="txt">
                                            <p>Sepatu berkualitas</p>
                                        </div>
                                        <a href="#" class="shop">shop now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- holder end here -->

                    <!-- holder start here -->
                    <div class="holder text-center" style="background-image: url(logo/baju1.jpeg);">
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="text">
                                        <strong class="title"></strong>
                                        <h1>TOKO ORANGE</h1>
                                        <h2></h2>
                                        <div class="txt">
                                            <p>Baju terlengkap</p>
                                        </div>
                                        <a href="#" class="shop">shop now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- holder end here -->

                    <!-- holder start here -->

                    <!-- holder end here -->
                </div>
                <!-- slider regular end here -->
            </div>
            <!-- mt main slider end here -->
            <!-- mt main start here -->
            <main id="mt-main">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <!-- mt producttabs start here -->
                            <div class="mt-producttabs wow fadeInUp" data-wow-delay="0.4s">
                                <!-- producttabs start here -->

                                <ul class="producttabs">
                                    <li><a href="#taball" class="active">ALL PRODUK</a></li>
                                    <?php
                                    include("koneksi.php");
                                    $query_kategori = mysqli_query($koneksi, "select * from data_kategori");

                                    while ($datak = mysqli_fetch_array($query_kategori)) {
                                        echo "<li><a href='#tab$datak[id_kategori]'>$datak[kategori]</a></li>";
                                    }
                                    ?>

                                </ul>
                                <!-- producttabs end here -->
                                <div class="tab-content text-center">
                                    <div id="taball">
                                        <!-- tabs slider start here -->
                                        <div class="tabs-slider">
                                            <!-- slide start here -->

                                            <?php
                                            function format_rupiah($angka)
                                            {
                                                $rupiah = "Rp " . number_format($angka, 0, ',', '.');
                                                return $rupiah;
                                            }
                                            function cekGenapGanjil($angka)
                                            {
                                                if ($angka % 2 == 0) {
                                                    $hasil = "genap";
                                                } else {
                                                    $hasil = "ganjil";
                                                }
                                                return $hasil;
                                            }

                                            $queryall = mysqli_query($koneksi, "select * from data_produk");
                                            $jumall = mysqli_num_rows($queryall);
                                            $status = cekGenapGanjil($jumall);
                                            if ($status == "ganjil") {
                                                $jump = $jumall + 1;
                                            } else {
                                                $jump = $jumall;
                                            }

                                            $totalslide = $jump / 2;
                                            $y = 1;
                                            for ($i = 0; $i < $totalslide; $i++) {

                                                echo "<div class='slide'>";

                                                if ($y <= $jumall) {
                                                    $dt = mysqli_fetch_array($queryall);
                                                    echo "
                                                    <div class='mt-product1 mt-paddingbottom20'>
                                                        <div class='box'>
                                                            <div class='b1'>
                                                                <div class='b2'>
                                                                    <a href='produk-detail.php?id_produk={$dt['id_produk']}'>
                                                                        <img src='admin/$dt[gambar]' alt='image description'>
                                                                    </a>
                                                                  
                                                                    <ul class='links'>
                                                                        <li><a href='addtocart.php?id_produk={$dt['id_produk']}'><i class='icon-handbag'></i></a></li>
                                                                        <li><a href='produk-detail.php?id_produk={$dt['id_produk']}'> <i class='icomoon icon-eye'></i></a></li>
                                                                        <li><a href='addtowishlist.php?id_produk={$dt['id_produk']}'> <i class='icon-heart'></i></a></li>
                                                                        </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class='txt'>
                                                            <strong class='title'><a href='produk-detail.php'>$dt[nama_produk] </a></strong>
                                                            <strong class='title'><a>Stok: $dt[stok]</a></strong>
                                                            <span class='price'><i class='fa fa-tag'></i> <span>" . format_rupiah($dt['harga']) . "</span></span>
                                                        </div>
                                                    </div>";
                                                    $y++;
                                                }

                                                if ($y <= $jumall) {
                                                    $dt = mysqli_fetch_array($queryall);
                                                    echo "
                                                    <div class='mt-product1 mt-paddingbottom20'>
                                                        <div class='box'>
                                                            <div class='b1'>
                                                                <div class='b2'>
                                                                    <a href='produk-detail.php?id_produk={$dt['id_produk']}'>
                                                                        <img src='admin/$dt[gambar]' alt='image description'>
                                                                    </a>                                                                    
                                                                   
                                                                    <ul class='links'>
                                                                        <li><a href='addtocart.php?id_produk={$dt['id_produk']}'><i class='icon-handbag'></i></a></li>
                                                                        <li><a href='produk-detail.php?id_produk={$dt['id_produk']}'> <i class='icomoon icon-eye'></i></a></li>
                                                                        <li><a href='addtowishlist.php?id_produk={$dt['id_produk']}'> <i class='icon-heart'></i></a></li>
                                                                        </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class='txt'>
                                                            <strong class='title'><a href='produk-detail.php'>$dt[nama_produk]</a></strong>
                                                            <strong class='title'><a>Stok: $dt[stok]</a></strong>
                                                            <span class='price'><i class='fa fa-tag'></i> <span>" . format_rupiah($dt['harga']) . "</span></span>
                                                        </div>
                                                    </div>";
                                                    $y++;
                                                }

                                                echo "</div>";
                                            }

                                            ?>

                                        </div>
                                        <!-- tabs slider end here -->
                                    </div>

                                    <!-- <li><a href='addtocart.php?id_produk={$dt[' id_produk']}'><i class='icon-handbag'></i><span>Add to Cart</span></a></li> -->

                                    <?php
                                    $query_kategori = mysqli_query($koneksi, "select * from data_kategori");

                                    while ($datak = mysqli_fetch_array($query_kategori)) {
                                        echo "
                                        <div id='tab$datak[id_kategori]'>
										<!-- tabs slider start here -->
										<div class='tabs-slider'>";

                                        $queryall = mysqli_query($koneksi, "select * from data_produk where id_kategori=$datak[id_kategori]");
                                        $jumall = mysqli_num_rows($queryall);
                                        $status = cekGenapGanjil($jumall);
                                        if ($status == "ganjil") {
                                            $jump = $jumall + 1;
                                        } else {
                                            $jump = $jumall;
                                        }

                                        $totalslide = $jump / 2;
                                        $y = 1;
                                        for ($i = 0; $i < $totalslide; $i++) {


                                            echo "<div class='slide'>";

                                            if ($y <= $jumall) {
                                                $dt = mysqli_fetch_array($queryall);
                                                echo "
                                                    <div class='mt-product1 mt-paddingbottom20'>
                                                        <div class='box'>
                                                            <div class='b1'>
                                                                <div class='b2'>
                                                                    <a href='produk-detail.php?id_produk={$dt['id_produk']}'>
                                                                        <img src='admin/$dt[gambar]' alt='image description'>
                                                                    </a>                                                                    
                                                                    
                                                                    <ul class='links'>
                                                                        <li><a href='addtocart.php?id_produk={$dt['id_produk']}'><i class='icon-handbag'></i></a></li>
                                                                        <li><a href='produk-detail.php?id_produk={$dt['id_produk']}'> <i class='icomoon icon-eye'></i></a></li>
                                                                        <li><a href='addtowishlist.php?id_produk={$dt['id_produk']}'> <i class='icon-heart'></i></a></li>
                                                                        </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class='txt'>
                                                            <strong class='title'><a href='produk-detail.php'>$dt[nama_produk]</a></strong>
                                                            <strong class='title'><a>Stok: $dt[stok]</a></strong>
                                                            <span class='price'><i class='fa fa-tag'></i> <span>" . format_rupiah($dt['harga']) . "</span></span>
                                                        </div>
                                                    </div>";
                                                $y++;
                                            }

                                            if ($y <= $jumall) {
                                                $dt = mysqli_fetch_array($queryall);
                                                echo "
                                                    <div class='mt-product1 mt-paddingbottom20'>
                                                        <div class='box'>
                                                            <div class='b1'>
                                                                <div class='b2'>
                                                                    <a href='produk-detail.php?id_produk={$dt['id_produk']}'>
                                                                        <img src='admin/$dt[gambar]' alt='image description'>
                                                                    </a>                                                                    
                                                                    
                                                                    <ul class='links'>
                                                                        <li><a href='addtocart.php?id_produk={$dt['id_produk']}'><i class='icon-handbag'></i></a></li>
                                                                        <li><a href='produk-detail.php?id_produk={$dt['id_produk']}'> <i class='icomoon icon-eye'></i></a></li>
                                                                        <li><a href='addtowishlist.php?id_produk={$dt['id_produk']}'> <i class='icon-heart'></i></a></li>
                                                                        </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class='txt'>
                                                            <strong class='title'><a href='produk-detail.php'>$dt[nama_produk]</a></strong>
                                                            <strong class='title'><a>Stok: $dt[stok]</a></strong>
                                                            <span class='price'><i class='fa fa-tag'></i> <span>" . format_rupiah($dt['harga']) . "</span></span>
                                                        </div>
                                                    </div>";
                                                $y++;
                                            }

                                            echo "</div>";
                                        }

                                        echo "
										</div>
										<!-- tabs slider end here -->
									</div>";
                                    }
                                    ?>


                                </div>
                            </div>
                            <!-- mt producttabs end here -->
                        </div>
                    </div>
                </div>
                <!-- mt bestseller start here -->
                <div class="mt-bestseller bg-grey text-center wow fadeInUp" data-wow-delay="0.4s">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 mt-heading text-uppercase">
                                <h2 class="heading">PRODUK TERBAIK</h2>
                                <p></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="bestseller-slider">
                                    <?php
                                    include 'koneksi.php';

                                    // Listing Produk
                                    $query_kategori = mysqli_query($koneksi, "SELECT DISTINCT id_kategori FROM `data_produk`");

                                    while ($data_kategori = mysqli_fetch_array($query_kategori)) {
                                        $kategori_id = $data_kategori['id_kategori'];

                                        $query_produk = mysqli_query($koneksi, "SELECT * FROM `data_produk` WHERE id_kategori = {$kategori_id}");

                                        while ($data = mysqli_fetch_array($query_produk)) {
                                            echo "
											<div class='mt-product1'>
												<div class='box'>
													<div class='b1'>
														<div class='b2'>
															<a href='produk-detail.php?id_produk={$data['id_produk']}'>
																<img src='admin/{$data['gambar']}' alt=''>
															</a>
															
															<ul class='links'>
                                                                        <li><a href='addtocart.php?id_produk={$data['id_produk']}'><i class='icon-handbag'></i></a></li>
                                                                        <li><a href='produk-detail.php?id_produk={$data['id_produk']}'> <i class='icomoon icon-eye'></i></a></li>
                                                                        <li><a href='addtowishlist.php?id_produk={$data['id_produk']}'> <i class='icon-heart'></i></a></li>
                                                                        </ul>
														</div>
													</div>
												</div>
												<div class='txt'>
													<strong class='title'><a href='produk-detail.php?id_produk={$data['id_produk']}'>{$data['nama_produk']}</a></strong>
                                                    <strong class='title'><a> Stok : {$data['stok']}</a></strong>
													<span class='price'><i class='fa fa-price'></i> <span>" . format_rupiah($data['harga']) . "</span></span>
												</div>
											</div>
											";
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

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

<!-- Mirrored from htmlbeans.com/html/schon/homepage1.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 07 Jan 2024 16:08:10 GMT -->

</html>

