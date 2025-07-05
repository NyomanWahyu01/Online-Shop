<?php
session_start();

if (!isset($_SESSION['id_user'])) {
    echo "<script>
    alert('Anda harus login terlebih dahulu.');
    location.href='index.php';
    </script>";
}

include("koneksi.php");
$id_user = $_SESSION['id_user'];
$id_produk = $_REQUEST['id_produk'];

$cek = mysqli_num_rows(mysqli_query($koneksi, "select * from data_wishlist where id_produk='$id_produk' and id_user='$id_user'"));

if ($cek > 0) {
    echo "
    <script>
        location.href='wishlist.php'; 
    </script>
";
} else {



    $query = mysqli_query($koneksi, "INSERT INTO `data_wishlist` (`id_wishlist`, `id_produk`, `id_user`) VALUES (NULL, '$id_produk', '$id_user')");
    if ($query) {
        echo "
            <script>
                location.href='wishlist.php'; 
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Gagal');
                history.back();
            </script>
        ";
    }
}
