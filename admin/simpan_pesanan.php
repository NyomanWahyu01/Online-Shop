<?php
session_start(); 

include("koneksi.php");
$id_pesanan = $_POST['id_pesanan'];
$jenis_pembayaran = $_POST['jenis_pembayaran'];
$total_pesanan = $_POST['total_pesanan'];
$status = $_POST['status'];


if($id_pesanan=="")
{

    $query = mysqli_query($koneksi, "INSERT INTO `data_pesanan` (`id_pesanan`, `tgl_pesanan`, `jenis_pembayaran`, `total_pesanan`, `status`) 
    VALUES (NULL, '$tgl_pesanan', '$jenis_pembayaran', '$total_pesanan', '$status');");
    if ($query) {
        echo "Data berhasil disimpan";
    } else {
        echo "Data gagal disimpan";
    }
}else
{
    $query = mysqli_query($koneksi, "UPDATE `data_pesanan` SET `jenis_pembayaran` = '$jenis_pembayaran', `total_pesanan` = '$total_pesanan',`status` = '$status' WHERE `data_pesanan`.`id_pesanan` = $id_pesanan");
    if ($query) {
        echo "Data berhasil diupdate";
    } else {
        echo "Data gagal diupdate";
    }
}
?>
