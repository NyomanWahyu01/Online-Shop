<?php
session_start();

include("koneksi.php");

// Ambil data formulir
$id_produk = $_POST["id_produk"];
$id_kategori = $_POST["id_kategori"];
$merek = $_POST["merek"];
$nama_produk = $_POST["nama_produk"];
$warna = $_POST["warna"];
$size = $_POST["size"];
$berat = $_POST["berat"];
$harga = $_POST["harga"];
$stok = $_POST["stok"];
$deskripsi = $_POST["deskripsi"];

$gambar = ''; // Menggunakan variabel ini untuk menyimpan nilai gambar

if ($_FILES['gambar']['error'] == 0) {
    $targetDir = "upload/"; // direktori tujuan berkas 
    $gambar = $targetDir . basename($_FILES['gambar']['name']);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($gambar, PATHINFO_EXTENSION));

    // Periksa apakah berkas tersebut benar-benar gambar
    $check = getimagesize($_FILES["gambar"]["tmp_name"]);
    if ($check === false) {
        echo "Berkas bukan gambar.";
        $uploadOk = 0;
    }

    // Hanya izinkan format berkas tertentu
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        echo "Maaf, hanya berkas JPG, JPEG, PNG yang diizinkan.";
        $uploadOk = 0;
    }

    // Periksa apakah $uploadOk diatur ke 0 karena adanya kesalahan
    if ($uploadOk == 0) {
        echo "Maaf, berkas Anda tidak diunggah.";
    } else {
        // Jika semuanya baik-baik saja, coba unggah berkas
        if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $gambar)) {
            echo "";
        } else {
            echo "Maaf, terjadi kesalahan saat mengunggah berkas Anda.";
        }
    }
}

if ($id_produk == "") {
    $query = mysqli_query($koneksi, "INSERT INTO `data_produk` (`id_produk`, `id_kategori`, `nama_produk`,`merek`, `warna`,`size`,`berat`, `harga`, `stok`, `gambar`, `deskripsi`) VALUES (NULL, '$id_kategori', '$nama_produk','$merek','$warna','$size', '$berat', '$harga', '$stok', '$gambar', '$deskripsi')");
    if ($query) {
        echo "Data berhasil disimpan";
    } else {
        echo "Data gagal disimpan";
    }
} else {
    // Periksa apakah ada perubahan pada gambar
    $query = mysqli_query($koneksi, "SELECT gambar FROM `data_produk` WHERE `id_produk` = $id_produk");
    $data = mysqli_fetch_assoc($query);
    $gambar_lama = $data['gambar'];

    if ($_FILES['gambar']['error'] == 0) {
        // Hapus gambar lama jika ada perubahan gambar
        if ($gambar_lama != "") {
            unlink($gambar_lama);
        }
    } else {
        // Gunakan gambar lama jika tidak ada perubahan gambar
        $gambar = $gambar_lama;
    }

    $query = mysqli_query($koneksi, "UPDATE `data_produk` SET `id_kategori` = '$id_kategori',  `merek` = '$merek',`nama_produk` = '$nama_produk',`warna` = '$warna', `size` = '$size',`berat` = '$berat', `harga` = '$harga', `stok` = '$stok', `gambar` = '$gambar', `deskripsi` = '$deskripsi' WHERE `data_produk`.`id_produk` = $id_produk");

    if ($query) {
        echo "Data berhasil diupdate";
    } else {
        echo "Data gagal diupdate";
    }
}
