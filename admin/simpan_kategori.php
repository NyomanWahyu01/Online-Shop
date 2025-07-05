<?php
session_start(); 

include("koneksi.php");
$id_kategori = $_POST['id_kategori'];
$kategori = $_POST['kategori'];


if($id_kategori=="")
{
    $query = mysqli_query($koneksi, "INSERT INTO `data_kategori`(`id_kategori`,`kategori`) VALUES (Null,'$kategori')");
    if ($query) {
        echo "Data berhasil disimpan";
    } else {
        echo "Data gagal disimpan";
    }
}else
{
    
    $query = mysqli_query($koneksi, "UPDATE `data_kategori` SET `kategori` = '$kategori' WHERE `data_kategori`.`id_kategori` = $id_kategori");
    if ($query) {
        echo "Data berhasil diupdate";
    } else {
        echo "Data gagal diupdate";
    }
}
?>
