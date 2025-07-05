<?php
$userlogin = $_SESSION['userlogin'];

?>
<!-- mt side menu start here -->
<div class="mt-side-menu">
	<!-- mt holder start here -->
	<div class="mt-holder">
		<a href="#" class="side-close"><span></span><span></span></a>
		<strong class="mt-side-title">AKUN SAYA</strong>
		<!-- mt side widget start here -->
		<div class="mt-side-widget">
			<header>
				<span class="mt-side-subtitle">Halo, <?= $userlogin; ?></span>
				<p>Selamat Datang Kembali!</p>
			</header>
			<form>
				<fieldset>
					<a href="logout.php" class="btn-type1">Logout</a>
					<a href="historypesanan.php" class="btn-type1">Riwayat Pesanan</a>
					<a href="wishlist.php" class="btn-type1">Wishlist</a>
				</fieldset>

			</form>
		</div>

	</div>
	<!-- mt holder end here -->
</div><!-- mt side menu end here -->