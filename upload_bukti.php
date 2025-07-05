<?php
session_start();

include("koneksi.php");

$id_pesanan = $_REQUEST['id_pesanan'];

$rand = rand();
$ekstensi =  array('jpg', 'jpeg', 'png', 'gif');
$filename = $_FILES['file']['name'];
$ukuran_gambar = $_FILES['file']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

$xx = $rand . "." . $ext;
$query_simpan = mysqli_query($koneksi, "INSERT INTO `data_bukti` (`id_bukti`, `tgl_bukti`, `id_pesanan`, `bukti_transfer`, `status`) VALUES (NULL, NOW(), '$id_pesanan', '$xx', 'Bukti Transfer Terkirim')");

if ($query_simpan) {
    move_uploaded_file($_FILES['file']['tmp_name'], 'admin/bukti/' . $xx);

    $ubah = mysqli_query($koneksi, "UPDATE `data_pesanan` SET `status` = 'Bukti Transfer Terkirim' WHERE `data_pesanan`.`id_pesanan` = '$id_pesanan';");

    echo "<script>alert('Bukti pembayaran telah terkirim, pesanan anda akan segera kami proses');
    location.href='historypesanan.php';</script>";
} else {
    echo "<script>alert('Bukti gagal terkirim');
    history.back();</script>";
}
