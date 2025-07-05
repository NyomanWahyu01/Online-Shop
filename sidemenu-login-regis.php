<?php
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
<!-- mt side menu start here -->
            <div class="mt-side-menu">
				<!-- mt holder start here -->
				<div class="mt-holder">
					<a href="#" class="side-close"><span></span><span></span></a>
					<strong class="mt-side-title">AKUN SAYA</strong>
					<!-- mt side widget start here -->
					<div class="mt-side-widget">
						<header>
							<span class="mt-side-subtitle">LOGIN</span>
							<p>Selamat Datang Kembali!</p>
						</header>
						<form action="" method="post">
							<fieldset>
								<input name="userlogin" id="userlogin" type="text" placeholder="Username" class="input">
								<input name="passlogin" id="passlogin" type="password" placeholder="Password" class="input">
								<button name="login" value="login" type="submit" class="btn-type1">Login</button>
							</fieldset>
						</form>
					</div>
					<!-- mt side widget end here -->
					<div class="or-divider"><span class="txt">atau</span></div>
					<!-- mt side widget start here -->
					<div class="mt-side-widget">
						<header>
							<span class="mt-side-subtitle">BUAT AKUN BARU</span>
							<p></p>
						</header>
						<form action="" method="post">
							<fieldset>
								<input name="nama" id="nama" type="text" placeholder="Nama Lengkap" class="input">
								<input name="userregis" id="userregis" type="text" placeholder="Username" class="input">
								<input name="passregis" id="passregis" type="password" placeholder="Password" class="input">
								<input name="email" id="email" type="text" placeholder="E-mail" class="input">
								<input name="telp" id="telp" type="text" placeholder="Telpon" class="input">
								<input name="alamat" id="alamat" type="text" placeholder="Alamat" class="input">

								<button name="registrasi" value="registrasi" type="submit" class="btn-type1">Register</button>
							</fieldset>
						</form>
					</div>
					<!-- mt side widget end here -->
				</div>
				<!-- mt holder end here -->
			</div><!-- mt side menu end here -->