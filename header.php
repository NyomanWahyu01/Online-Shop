<?php
include 'koneksi.php';
?>

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

						<!-- mt side menu start here -->
						<li class="drop">
							<?php
							if (isset($_SESSION['id_user'])) {
								echo '<a href="#" onclick="redirectToKeranjang()" class="cart-opener">';
							} else {
								// Jika pengguna belum login, tampilkan pesan dan tidak arahkan ke halaman keranjang
								echo '<a href="#" onclick="showLoginAlert()" class="cart-opener">';
							}
							?>
							<span class="icon-handbag"></span>
							<span class="num">
								<?php
								if (isset($_SESSION['id_user'])) {
									include("koneksi.php");
									$id_user = $_SESSION['id_user'];

									// Query untuk menghitung jumlah produk dalam keranjang
									$query = mysqli_query($koneksi, "SELECT COUNT(*) AS total_produk FROM data_keranjang WHERE id_user='$id_user' AND id_pesanan='0'");
									$data = mysqli_fetch_assoc($query);
									$total_produk = $data['total_produk'];

									// Tampilkan jumlah produk dalam keranjang
									echo $total_produk;
								} else {
									// Jika tidak ada user yang login, tampilkan '0'
									echo '0';
								}
								?>
							</span>
							</a>
							<!-- ... Bagian lain dari elemen drop-down keranjang ... -->
						</li>

						<li>
							<a href="#" class="bar-opener side-opener">
								<span class="bar"></span>
								<span class="bar small"></span>
								<span class="bar"></span>
							</a>
						</li>
					</ul><!-- mt icon list end here -->
					<!-- navigation start here -->
					<nav id="nav">



						<ul>
							<li>
								<form action="pencarian.php" method='post'>
									<table>
										<tr>
											<td><input type="text" name="cari" placeholder="Search..." class="form-control"></td>
											<td>&nbsp;&nbsp;<button type="submit">Cari</button></td>
										</tr>
									</table>


								</form>
							</li>
							<li><a href="index.php">Home</a></li>
							<li><a href="cara_belanja.php">Cara Belanja</a></li>
							<li><a href="contact2.php">Contact</a></li>
						</ul>
					</nav>
					<!-- mt icon list end here -->
				</div>
			</div>
		</div>
	</div>
	<!-- mt bottom bar end here -->
</header><!-- mt header style4 end here -->

<script>
	function redirectToKeranjang() {
		// Lakukan pengalihan ke halaman keranjang.php
		window.location = 'keranjang.php';
	}

	function showLoginAlert() {
		alert('Anda harus login terlebih dahulu.');
		window.location.reload();
	}
</script>