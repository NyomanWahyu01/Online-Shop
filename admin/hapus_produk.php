<?php
include("koneksi.php");

$id_produk=$_GET['id_produk'];

$query=mysqli_query($koneksi,"DELETE FROM data_produk WHERE `data_produk`.`id_produk` = $id_produk");


if($query)
{
	echo"
		<script>
			alert('Data Berhasil dihapus');
			location.href='produk.php';
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