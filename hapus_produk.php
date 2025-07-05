<?php
include("koneksi.php");

// Periksa apakah parameter id_keranjang telah dikirimkan
if (isset($_GET['id_keranjang'])) {
    // Ambil nilai id_keranjang dari parameter URL
    $id_keranjang = $_GET['id_keranjang'];

    // Lakukan query penghapusan
    $hapus_query = mysqli_query($koneksi, "DELETE FROM data_keranjang WHERE id_keranjang = '$id_keranjang'");

    if ($hapus_query) {
        // Jika penghapusan berhasil, kembalikan ke halaman sebelumnya atau halaman tertentu
        header("Location: keranjang.php");
        exit();
    } else {
        // Jika terjadi kesalahan dalam penghapusan
        echo "Gagal menghapus produk. Silakan coba lagi.";
    }
} else {
    // Jika id_keranjang tidak tersedia
    echo "id_keranjang tidak ditemukan.";
}
?>
