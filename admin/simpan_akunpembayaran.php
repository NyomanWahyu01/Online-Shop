<?php
session_start(); 

include("koneksi.php");
$id_akunpembayaran = $_POST['id_akunpembayaran'];
$nama = $_POST['nama'];
$jenis_pembayaran = $_POST['jenis_pembayaran'];



if($id_akunpembayaran=="")
{
    //$query = mysqli_query($koneksi, "INSERT INTO `data_pesanan`(`id_pesanan`,`nama`) VALUES (Null,'$kategori')");
    if ($query) {
        echo "Data berhasil disimpan";
    } else {
        echo "Data gagal disimpan";
    }
}else
{
    
    $query = mysqli_query($koneksi, "UPDATE `data_pesanan` SET `jenis_pembayaran` = '$jenis_pembayaran' WHERE `data_pesanan`.`id_pesanan` = $id_akunpembayaran;");
    if ($query) {
        echo "Data berhasil diupdate";
    } else {
        echo "Data gagal diupdate";
    }
}
?>
