<?php
// Memulai sesi
session_start();

if (!isset($_SESSION['id_user'])) {
    echo "<script>
    alert('Anda harus login terlebih dahulu.');
    location.href='index.php';
    </script>";
}


// Mengimpor file koneksi.php
include("koneksi.php");

// Fungsi untuk membersihkan input dari potensi SQL injection
function membersihkanInput($input)
{
    global $koneksi;
    return mysqli_real_escape_string($koneksi, $input);
}

// Memeriksa apakah ada parameter 'id_produk' dalam URL
if (isset($_GET['id_produk'])) {
    $id_produk = membersihkanInput($_GET['id_produk']);

    // Mendapatkan detail produk dari database
    $query_produk = mysqli_query($koneksi, "SELECT * FROM data_produk WHERE id_produk='$id_produk'");
    $data_produk = mysqli_fetch_array($query_produk);

    // Fungsi untuk memeriksa stok produk
    function periksaStok($stok_produk)
    {
        if ($stok_produk > 0) {
            return true;
        } else {
            // Menampilkan pesan dan kembali ke halaman sebelumnya jika stok habis
            echo "
            <script>
                alert('Stok produk sudah habis. Silahkan cari produk lain!');
                history.back();
            </script>";
            return false;
        }
    }

    // Mendapatkan stok produk dari data produk
    $stok_produk = $data_produk['stok'];

    // Memeriksa apakah kuantitas (quantity) tersedia dalam POST
    if (isset($_POST['qyt']) && $_POST['qyt'] > 0) {
        // Scenario ketika kuantitas disediakan
        $qtyprodukdetail = $_POST['qyt'];

        // Memeriksa apakah kuantitas melebihi stok yang tersedia
        if ($qtyprodukdetail > $stok_produk) {
            // Menampilkan pesan jika kuantitas melebihi stok dan kembali ke halaman sebelumnya
            echo "
            <script>
                alert('Jumlah melebihi stok yang tersedia, silahkan cek kembali');
                history.back();
            </script>";
        } else {
            // Memeriksa stok dan melakukan pembaruan keranjang belanja jika stok mencukupi
            if (periksaStok($stok_produk)) {
                $id_user = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : 0;

                // Memeriksa apakah produk sudah ada dalam keranjang pengguna
                $cek = mysqli_query($koneksi, "SELECT * FROM data_keranjang WHERE id_produk='$id_produk' AND id_user='$id_user' AND id_pesanan='0'");
                $jum = mysqli_num_rows($cek);

                // Fungsi untuk memperbarui keranjang belanja
                function perbaruiKeranjang($id_keranjang, $qty, $total, $id_produk, $stok_produk)
                {
                    global $koneksi;
                    // Memperbarui keranjang belanja
                    $update = mysqli_query($koneksi, "UPDATE `data_keranjang` SET `qty` = '$qty' ,  `total` = '$total' WHERE `data_keranjang`.`id_keranjang` = $id_keranjang;");
                    // Memperbarui stok produk
                    $update_stok = mysqli_query($koneksi, "UPDATE `data_produk` SET `stok` = '$stok_produk' WHERE `data_produk`.`id_produk` = $id_produk;");

                    return ($update && $update_stok);
                }

                // Jika produk sudah ada dalam keranjang pengguna
                if ($jum > 0) {
                    $dt = mysqli_fetch_array($cek);
                    $id_keranjang = $dt['id_keranjang'];
                    $qty = $dt['qty'] + $qtyprodukdetail;
                    $total = $dt['hargax'] * $qty;

                    // Mengurangi stok produk
                    $stok_produk -= $qtyprodukdetail;

                    // Memperbarui keranjang belanja
                    if (perbaruiKeranjang($id_keranjang, $qty, $total, $id_produk, $stok_produk)) {
                        // Memperbarui stok produk di database
                        mysqli_query($koneksi, "UPDATE `data_produk` SET `stok` = '$stok_produk' WHERE `data_produk`.`id_produk` = $id_produk;");
                        // Menampilkan pesan sukses dan mengarahkan ke halaman produk detail
                        echo "
                        <script>
                            alert('Produk berhasil ditambahkan ke keranjang');
                            window.location='produk-detail.php?id_produk=$id_produk';
                        </script>";
                    } else {
                        // Menampilkan pesan gagal dan kembali ke halaman sebelumnya
                        echo "
                        <script>
                            alert('Gagal');
                            history.back();
                        </script>";
                    }
                } else {
                    // Jika produk belum ada dalam keranjang pengguna
                    $harga = $data_produk['harga'];
                    $total = $harga * $qtyprodukdetail;

                    // Mengurangi stok produk
                    $stok_produk -= $qtyprodukdetail;

                    // Menyimpan data produk ke dalam keranjang belanja
                    $simpan = mysqli_query($koneksi, "INSERT INTO `data_keranjang` (`id_keranjang`, `id_produk`, `qty`, `hargax`, `total`, `id_user`, `id_pesanan`) VALUES (NULL, '$id_produk', '$qtyprodukdetail', '$harga', '$total', '$id_user', '0');");
                    // Memperbarui stok produk di database
                    $update_stok = mysqli_query($koneksi, "UPDATE `data_produk` SET `stok` = '$stok_produk' WHERE `data_produk`.`id_produk` = $id_produk;");

                    // Menampilkan pesan sukses dan mengarahkan ke halaman produk detail
                    if ($simpan && $update_stok) {
                        echo "
                        <script>
                            alert('Produk berhasil ditambahkan ke keranjang');
                            window.location='produk-detail.php?id_produk=$id_produk';
                        </script>";
                    } else {
                        // Menampilkan pesan gagal dan kembali ke halaman sebelumnya
                        echo "
                        <script>
                            alert('Gagal');
                            history.back();
                        </script>";
                    }
                }
            }
        }
    } else {
        // Scenario ketika kuantitas tidak disediakan
        if (periksaStok($stok_produk)) {
            $id_user = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : 0;

            // Memeriksa apakah produk sudah ada dalam keranjang pengguna
            $cek = mysqli_query($koneksi, "SELECT * FROM data_keranjang WHERE id_produk='$id_produk' AND id_user='$id_user' AND id_pesanan='0'");
            $jum = mysqli_num_rows($cek);

            // Fungsi untuk memperbarui keranjang belanja
            function perbaruiKeranjang($id_keranjang, $qty, $total, $id_produk, $stok_produk)
            {
                global $koneksi;
                // Memperbarui keranjang belanja
                $update = mysqli_query($koneksi, "UPDATE `data_keranjang` SET `qty` = '$qty' ,  `total` = '$total' WHERE `data_keranjang`.`id_keranjang` = $id_keranjang;");
                // Memperbarui stok produk
                $update_stok = mysqli_query($koneksi, "UPDATE `data_produk` SET `stok` = '$stok_produk' WHERE `data_produk`.`id_produk` = $id_produk;");

                return ($update && $update_stok);
            }

            // Jika produk sudah ada dalam keranjang pengguna
            if ($jum > 0) {
                $dt = mysqli_fetch_array($cek);
                $id_keranjang = $dt['id_keranjang'];
                $qty = $dt['qty'] + 1;
                $total = $dt['hargax'] * $qty;

                // Mengurangi stok produk
                $stok_produk -= 1;

                // Memperbarui keranjang belanja
                if (perbaruiKeranjang($id_keranjang, $qty, $total, $id_produk, $stok_produk)) {
                    // Memperbarui stok produk di database
                    mysqli_query($koneksi, "UPDATE `data_produk` SET `stok` = '$stok_produk' WHERE `data_produk`.`id_produk` = $id_produk;");
                    // Menampilkan pesan sukses dan mengarahkan ke halaman utama
                    echo "
                    <script>
                        alert('Produk berhasil ditambahkan ke keranjang');
                        window.location='index.php';
                    </script>";
                } else {
                    // Menampilkan pesan gagal dan kembali ke halaman sebelumnya
                    echo "
                    <script>
                        alert('Gagal');
                        history.back();
                    </script>";
                }
            } else {
                // Jika produk belum ada dalam keranjang pengguna
                $harga = $data_produk['harga'];
                $qty = 1;
                $total = $harga * $qty;

                // Mengurangi stok produk
                $stok_produk -= 1;

                // Menyimpan data produk ke dalam keranjang belanja
                $simpan = mysqli_query($koneksi, "INSERT INTO `data_keranjang` (`id_keranjang`, `id_produk`, `qty`, `hargax`, `total`, `id_user`, `id_pesanan`) VALUES (NULL, '$id_produk', '$qty', '$harga', '$total', '$id_user', '0');");
                // Memperbarui stok produk di database
                $update_stok = mysqli_query($koneksi, "UPDATE `data_produk` SET `stok` = '$stok_produk' WHERE `data_produk`.`id_produk` = $id_produk;");

                // Menampilkan pesan sukses dan mengarahkan ke halaman utama
                if ($simpan && $update_stok) {
                    echo "
                    <script>
                        alert('Produk berhasil ditambahkan ke keranjang');
                        window.location='index.php';
                    </script>";
                } else {
                    // Menampilkan pesan gagal dan kembali ke halaman sebelumnya
                    echo "
                    <script>
                        alert('Gagal');
                        history.back();
                    </script>";
                }
            }
        }
    }
}
