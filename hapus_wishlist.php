<?php
include("koneksi.php");


$id_wishlist = $_GET['id_wishlist'];

// Lakukan query penghapusan
$hapus_query = mysqli_query($koneksi, "DELETE FROM data_wishlist WHERE id_wishlist = '$id_wishlist'");

if ($hapus_query) {
    // Jika penghapusan berhasil, kembalikan ke halaman sebelumnya atau halaman tertentu
    echo "<script>
    history.back();
    </script>";
    exit();
} else {
    // Jika terjadi kesalahan dalam penghapusan
    echo "Gagal menghapus produk. Silakan coba lagi.";
}
