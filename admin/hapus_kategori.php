<?php
include("koneksi.php");

$id_kategori=$_GET['id_kategori'];

$query=mysqli_query($koneksi,"DELETE FROM data_kategori WHERE `data_kategori`.`id_kategori` = $id_kategori");



if($query)
{
	echo"
		<script>
			alert('Data Berhasil dihapus');
			location.href='kategori.php';
		</script>	
	";
}else
{
	echo"
		<script>
			alert('Data gagal dihapus');
			history.back();
		</script>	
	";
}

?>