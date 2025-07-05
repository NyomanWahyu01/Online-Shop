<?php
include 'koneksi.php';
session_start();
$username = $_SESSION['user'];

?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from htmlbeans.com/html/schon/homepage1.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 07 Jan 2024 16:07:59 GMT -->
<head>
	<!-- set the encoding of your site -->
	<meta charset="utf-8">
	<!-- set the viewport width and initial-scale on mobile devices -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dashboard</title>
	
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
			<!-- mt header style4 start here -->
			<header id="mt-header" class="style4">
				<!-- mt bottom bar start here -->
				<div class="mt-bottom-bar">
					<div class="container-fluid">
						<div class="row">
							<div class="col-xs-12">
								<!-- mt logo start here -->
								<div class="mt-logo"><a href="#"><img src="logo/beras-logo.png" alt=""></a></div>
								<!-- mt icon list start here -->
								<ul class="mt-icon-list">
									<li class="hidden-lg hidden-md">
										<a href="#" class="bar-opener mobile-toggle">
											<span class="bar"></span>
											<span class="bar small"></span>
											<span class="bar"></span>
										</a>
									</li>
									<li><a href="#" class="icon-magnifier"></a></li>
									<li class="drop">
										<a href="#" class="icon-heart cart-opener"><span style="margin-bottom: -3px;" class="num">3</span></a>
										<!-- mt drop start here -->
										<div class="mt-drop">
											<!-- mt drop sub start here -->
											<div class="mt-drop-sub">
												<!-- mt side widget start here -->
												<div class="mt-side-widget">
													<!-- cart row start here -->
													<div class="cart-row">
														<a href="#" class="img"><img src="images/products/img36.jpg" alt="image" class="img-responsive"></a>
														<div class="mt-h">
															<span class="mt-h-title"><a href="#">Marvelous Modern 3 Seater</a></span>
															<span class="price"><i class="fa fa-eur" aria-hidden="true"></i> 599,00</span>
														</div>
														<a href="#" class="close fa fa-times"></a>
													</div><!-- cart row end here -->
													<!-- cart row start here -->
													<div class="cart-row">
														<a href="#" class="img"><img src="images/products/img37.jpg" alt="image" class="img-responsive"></a>
														<div class="mt-h">
															<span class="mt-h-title"><a href="#">Marvelous Modern 3 Seater</a></span>
															<span class="price"><i class="fa fa-eur" aria-hidden="true"></i> 599,00</span>
														</div>
														<a href="#" class="close fa fa-times"></a>
													</div><!-- cart row end here -->
													<!-- cart row start here -->
													<div class="cart-row">
														<a href="#" class="img"><img src="images/products/img38.jpg" alt="image" class="img-responsive"></a>
														<div class="mt-h">
															<span class="mt-h-title"><a href="#">Marvelous Modern 3 Seater</a></span>
															<span class="price"><i class="fa fa-eur" aria-hidden="true"></i> 599,00</span>
														</div>
														<a href="#" class="close fa fa-times"></a>
													</div><!-- cart row end here -->
													<!-- cart row total start here -->
													<div class="cart-row-total">
														<span class="mt-total">Add them all</span>
														<span class="mt-total-txt"><a href="#" class="btn-type2">add to CART</a></span>
													</div>
													<!-- cart row total end here -->
												</div><!-- mt side widget end here -->
											</div>
											<!-- mt drop sub end here -->
										</div><!-- mt drop end here -->
										<span class="mt-mdropover"></span>
									</li>
									<li class="drop">
										<a href="#" class="cart-opener">
											<span class="icon-handbag"></span>
											<span class="num">3</span>
										</a>
										<!-- mt drop start here -->
										<div class="mt-drop">
											<!-- mt drop sub start here -->
											<div class="mt-drop-sub">
												<!-- mt side widget start here -->
												<div class="mt-side-widget">
													<!-- cart row start here -->
													<div class="cart-row">
														<a href="#" class="img"><img src="images/products/img38.jpg" alt="image" class="img-responsive"></a>
														<div class="mt-h">
															<span class="mt-h-title"><a href="#">Marvelous Modern 3 Seater</a></span>
															<span class="price"><i class="fa fa-eur" aria-hidden="true"></i> 599,00</span>
															<span class="mt-h-title">Qty: 1</span>
														</div>
														<a href="#" class="close fa fa-times"></a>
													</div><!-- cart row end here -->
													<!-- cart row total start here -->
													<div class="cart-row-total">
														<span class="mt-total">Sub Total</span>
														<span class="mt-total-txt"><i class="fa fa-eur" aria-hidden="true"></i> 799,00</span>
													</div>
													<!-- cart row total end here -->
													<div class="cart-btn-row">
														<a href="#" class="btn-type2">VIEW CART</a>
														<a href="#" class="btn-type3">CHECKOUT</a>
													</div>
												</div><!-- mt side widget end here -->
											</div>
											<!-- mt drop sub end here -->
										</div><!-- mt drop end here -->
										<span class="mt-mdropover"></span>
									</li>
									<li class="drop">
										<div class="mt-drop" style="text-align: center;">
											<!-- mt drop sub start here -->
											<div class="mt-drop">
												<!-- mt side widget start here -->
												<div class="mt-side-widget">
													<!-- cart row start here -->
													<div class="cart-row">
														<div class="mt-h">
															<span class="mt-h-title"><?=$username;?></span>
														</div>
													</div><!-- cart row end here -->
													<div class="cart-row">
														<div class="mt-h">
															<a href="logout.php" class="mt-h-title">Logout</a>
														</div>
													</div><!-- cart row end here -->
												</div><!-- mt side widget end here -->
											</div>
											<!-- mt drop sub end here -->
										</div><!-- mt drop end here -->
										<a href="#" class="cart-opener">
											<span class="icon-user"></span>
										</a>
										<span class="mt-mdropover"></span>
									</li>

									
								</ul><!-- mt icon list end here -->
								<!-- navigation start here -->
								<nav id="nav">
									<ul>
										<li><a class="drop-link" href="homepage.html">HOME <i class="fa fa-angle-down hidden-lg hidden-md" aria-hidden="true"></i></a></li>
										<li><a href="about-us.html">About</a></li>
										<li><a href="contact-us2.html">Contact</a></li>
									</ul>
								</nav>
								<!-- mt icon list end here -->
							</div>
						</div>
					</div>
				</div>
				<!-- mt bottom bar end here -->
				<span class="mt-side-over"></span>
			</header><!-- mt header style4 end here -->
			<!-- mt side menu start here -->
			
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
					<div class="holder text-center" style="background-image: url(logo/bg1.jpg);">
						<div class="container">
							<div class="row">
								<div class="col-xs-12">
									<div class="text right">
										<strong class="title"></strong>
										<h1>TOKO WAHYU</h1>
										<h2></h2>
										<div class="txt">
											<p>Menyediakan Beras Terbaik untuk Hidup Sehat dan Berkualitas.</p>
										</div>
										<a href="#" class="shop">shop now</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- holder end here -->

					<!-- holder start here -->
					<div class="holder text-center" style="background-image: url(logo/bg21.jpg);">
						<div class="container">
							<div class="row">
								<div class="col-xs-12">
									<div class="text right">
										<strong class="title">FURNITURE DESIGNS IDEAS</strong>
										<h1>LOUNGE CHAIRS</h1>
										<h2>SW DAYBED</h2>
										<div class="txt">
											<p>Menyediakan Beras Terbaik untuk Hidup Sehat dan Berkualitas.</p>
										</div>
										<a href="product-detail.html" class="shop">shop now</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- holder end here -->
					
					<!-- holder start here -->
					<div class="holder text-center" style="background-image: url(logo/bg31.jpg);">
						<div class="container">
							<div class="row">
								<div class="col-xs-12">
									<div class="text">
										<strong class="title">FURNITURE DESIGNS IDEAS</strong>
										<h1>CARDBOARD</h1>
										<h2> Sofas and Armchairs</h2>
										<div class="txt">
											<p>Consectetur adipisicing elit. Beatae accusamus, optio, repellendus inventore</p>
										</div>
										<a href="product-detail.html" class="shop">shop now</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- holder end here -->
				</div>
				<!-- slider regular end here -->
			</div><!-- mt main slider end here -->
			<!-- mt main start here -->
			<main id="mt-main">
				<div class="container">
					<div class="row">
						<div class="col-xs-12">

							<!-- mt producttabs start here -->
							<div class="mt-producttabs wow fadeInUp" data-wow-delay="0.4s">
								<!-- producttabs start here -->
								<ul class="producttabs">
									<li><a href="#all" class="kategori-tab">ALL PRODUK</a></li>
									<?php
									include 'koneksi.php';
									$query_kategori = mysqli_query($koneksi, "SELECT * FROM `data_kategori`");
									if ($query_kategori) {
										while ($data_kategori = mysqli_fetch_array($query_kategori)) {
											echo "<li><a href='#' class='kategori-tab' data-kategori-id='{$data_kategori['id_kategori']}'>{$data_kategori['kategori']}</a></li>";
										}
									} else {
										echo "Error: " . mysqli_error($koneksi);
									}
									?>
								</ul>
							<!-- Produk -->
							<div class="tab-content">
								<div id="all">
									<!-- Konten produk untuk All Produk -->
									<div class="tabs-slider">
										<!-- Konten slider untuk All Produk -->
										<?php
										include 'koneksi.php';

										// Memulai sesi jika belum dimulai
										if (session_status() == PHP_SESSION_NONE) {
											session_start();
										}

										$query_produk_all = mysqli_query($koneksi, "SELECT * FROM `data_produk`");

										while ($data_all = mysqli_fetch_array($query_produk_all)) {
											// Tampilkan konten produk untuk All Produk di sini
											// ...
										}
										?>
									</div>
								</div>

								<?php
								$query_kategori = mysqli_query($koneksi, "SELECT * FROM `data_kategori`");

								while ($data_kategori = mysqli_fetch_array($query_kategori)) {
									echo "<div id='tab{$data_kategori['id_kategori']}'>";
									echo "<div class='tabs-slider'>";
									// Konten slider untuk setiap kategori
									$query_produk_kategori = mysqli_query($koneksi, "SELECT * FROM `data_produk` WHERE id_kategori = {$data_kategori['id_kategori']}");

									while ($data = mysqli_fetch_array($query_produk_kategori)) {
										// Tampilkan konten produk untuk setiap kategori di sini
										// ...
									}

									echo "</div>";
									echo "</div>";
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
								<h2 class="heading">BEST SELLER</h2>
								<p>EXCEPTEUR SINT OCCAECAT</p>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<div class="bestseller-slider">
									<div class="slide">
										<!-- mt product1 center start here -->
										<div class="mt-product1 large">
											<div class="box">
												<div class="b1">
													<div class="b2">
														<a href="product-detail.html"><img src="images/products/img11.jpg" alt="image description"></a>
														<span class="caption">
															<span class="best-price">Best Price</span>
														</span>
														<ul class="links add">
															<li><a href="#"><i class="icon-handbag"></i></a></li>
															<li><a href="#"><i class="icomoon icon-heart-empty"></i></a></li>
															<li><a href="#popup1" class="lightbox"><i class="icomoon icon-eye"></i></a></li>
														</ul>
													</div>
												</div>
											</div>
											<div class="txt">
												<strong class="title"><a href="product-detail.html">Bombi Chair</a></strong>
												<span class="price"><i class="fa fa-eur"></i> <span>399,00</span></span>
											</div>
										</div><!-- mt product1 center end here -->
									</div>
									
								</div>
							</div>
						</div>
					</div>
				</div>
				
			</main><!-- mt main end here -->
			<!-- footer of the Page -->
			<footer id="mt-footer" class="style1 wow fadeInUp" data-wow-delay="0.4s">
				<!-- Footer Holder of the Page -->
				<div class="footer-holder dark">
					<div class="container">
						<div class="row">
							<div class="col-xs-12 col-sm-6 col-md-3 mt-paddingbottomsm">
								<!-- F Widget About of the Page -->
								<div class="f-widget-about">
									<div class="logo">
										<a href="#"><img src="images/logo.png" alt="Schon"></a>
									</div>
									<p>Exercitation ullamco laboris nisi ut aliquip ex commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
									<!-- Social Network of the Page -->
									<ul class="list-unstyled social-network">
										<li><a href="#"><i class="fa fa-twitter"></i></a></li>
										<li><a href="#"><i class="fa fa-facebook"></i></a></li>
										<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
										<li><a href="#"><i class="fa fa-youtube"></i></a></li>
										<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
										<li><a href="#"><i class="fa fa-whatsapp"></i></a></li>
									</ul>
									<!-- Social Network of the Page end -->
								</div>
								<!-- F Widget About of the Page end -->
							</div>
							<div class="col-xs-12 col-sm-6 col-md-3 mt-paddingbottomsm">
								<div class="f-widget-news">
									<h3 class="f-widget-heading">Twitter</h3>
									<div class="news-articles">
										<div class="news-column">
											<i class="fa fa-twitter"></i>
											<div class="txt-box">
												<p>Laboris nisi ut <a href="#">#schön</a> aliquip econse- <br>quat. <a href="#">https://t.co/vreNJ9nEDt</a></p>
											</div>
										</div>
										<div class="news-column">
											<i class="fa fa-twitter"></i>
											<div class="txt-box">
												<p>Ficia deserunt mollit anim id est labo- <br>rum. incididunt ut labore et dolore <br><a href="#">https://t.co/vreNJ9nEDt</a></p>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-3 mt-paddingbottomxs">
								<!-- Footer Tabs of the Page -->
								<div class="f-widget-tabs">
									<h3 class="f-widget-heading">Product Tags</h3>
									<ul class="list-unstyled tabs">
										<li><a href="#">Sofas</a></li>
										<li><a href="#">Armchairs</a></li>
										<li><a href="#">Living</a></li>
										<li><a href="#">Bedroom</a></li>
										<li><a href="#">Lighting</a></li>
										<li><a href="#">Tables</a></li>
										<li><a href="#">Pouf</a></li>
										<li><a href="#">Wood</a></li>
										<li><a href="#">Office</a></li>
										<li><a href="#">Outdoor</a></li>
										<li><a href="#">Kitchen</a></li>
										<li><a href="#">Stools</a></li>
										<li><a href="#">Footstools</a></li>
										<li><a href="#">Desks</a></li>
									</ul>
								</div>
								<!-- Footer Tabs of the Page -->
							</div>
							<div class="col-xs-12 col-sm-6 col-md-3 text-right">
								<!-- F Widget About of the Page -->
								<div class="f-widget-about">
									<h3 class="f-widget-heading">Information</h3>
									<ul class="list-unstyled address-list align-right">
										<li><i class="fa fa-map-marker"></i><address>Connaugt Road Central Suite 18B, 148 <br>New Yankee</address></li>
										<li><i class="fa fa-phone"></i><a href="tel:15553332211">+1 (555) 333 22 11</a></li>
										<li><i class="fa fa-envelope-o"></i><a href="mailto:&#105;&#110;&#102;&#111;&#064;&#115;&#099;&#104;&#111;&#110;&#046;&#099;&#104;&#097;&#105;&#114;">&#105;&#110;&#102;&#111;&#064;&#115;&#099;&#104;&#111;&#110;&#046;&#099;&#104;&#097;&#105;&#114;</a></li>
									</ul>
								</div>
								<!-- F Widget About of the Page end -->
							</div>
						</div>
					</div>
				</div>
				<!-- Footer Holder of the Page end -->
				<!-- Footer Area of the Page -->
				<div class="footer-area">
					<div class="container">
						<div class="row">
							<div class="col-xs-12 col-sm-6">
								<p>© <a href="#">Toko Wahyu</a> - All rights Reserved</p>
							</div>
						</div>
					</div>
				</div>
				<!-- Footer Area of the Page end -->
			</footer><!-- footer of the Page end -->
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
<!--  JAVASCRIPT -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const kategoriTabs = document.querySelectorAll('.kategori-tab');
        const kategoriSlides = document.querySelectorAll('.kategori-slide');

        kategoriTabs.forEach(tab => {
            tab.addEventListener('click', function () {
                const kategoriId = this.getAttribute('data-kategori-id');

                // Menampilkan produk yang sesuai dengan kategori yang dipilih
                kategoriSlides.forEach(slide => {
                    slide.style.display = slide.getAttribute('data-kategori-id') === kategoriId ? 'block' : 'none';
                });

                // Menandai tab yang aktif
                kategoriTabs.forEach(t => t.classList.remove('active'));
                this.classList.add('active');
            });
        });
    });
</script>
<script>
// Fungsi untuk menambahkan produk ke keranjang dengan menangani login
function tambahKeKeranjang(id_produk, merek, harga) {
    // Tambahkan logika penanganan login di sini
    <?php
    if (isset($_SESSION['user'])) {
        // Jika sudah login, tambahkan ke keranjang
        echo "tambahKeKeranjang({$data['id_produk']}, \"{$data['merek']}\", {$data['harga']});";
    } else {
        // Jika belum login, tampilkan notifikasi/alert
        echo "tampilkanLoginAlert();";
    }
    ?>
}
// Fungsi untuk menampilkan notifikasi/alert login
function tampilkanLoginAlert() {
    alert("Anda harus login terlebih dahulu");
}
</script>
