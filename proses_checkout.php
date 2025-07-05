<?php
session_start();
include("koneksi.php");

$id_user = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : '';
$datetime = date('Y-m-d H:i:s');
$metode_pembayaran = $_POST['metode_pembayaran']; 
$status = '';
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$email = $_POST['email'];
$telpon = $_POST['telpon'];

if ($id_user !== "") {
    // Ambil cart_subtotal dari session
    $subtotal = isset($_SESSION['cart_subtotal']) ? $_SESSION['cart_subtotal'] : 0;

    // Periksa apakah subtotal lebih dari 0 sebelum melanjutkan
    if ($subtotal > 0) {
        // Menghitung total_pesanan
        $total_pesanan = $subtotal;

        $query = mysqli_query($koneksi, "INSERT INTO `data_pesanan` (`tgl_pesanan`, `jenis_pembayaran`, `total_pesanan`, `id_user`, `status`, `nama`, `alamat`, `email`, `telpon`) 
            VALUES ('$datetime', '$metode_pembayaran', '$total_pesanan', '$id_user', 'Belum Bayar', '$nama', '$alamat', '$email', '$telpon')");

        if ($query) {
            $id_pesanan = mysqli_insert_id($koneksi); // Ambil ID yang baru saja dimasukkan

            // Kosongkan keranjang setelah checkout berhasil
            $updatepesanan = mysqli_query($koneksi, "UPDATE `data_keranjang` SET `id_pesanan` = '$id_pesanan' WHERE `data_keranjang`.`id_user` = '$id_user' and `id_pesanan`= 0;");

            if ($updatepesanan) {
                echo "
                    <script>
                        alert('Pesanan Anda berhasil, silahkan melakukan pembayaran!');
                        window.location.href='ordercomplite.php?id_pesanan=$id_pesanan';
                    </script>";
            } else {
                echo "<script>alert('Gagal mengosongkan keranjang');</script>";
            }
        } else {
            echo "<script>alert('Gagal menyimpan data');</script>";
        }
    } else {
        echo "<script>alert('Silakan tambahkan barang ke keranjang Anda.'); 
        window.location.href='checkout.php';</script>";
    }
} else {
    echo "<script>alert('Silahkan login kembali.'); 
    window.location.href='index.php';</script>";
}
?>
