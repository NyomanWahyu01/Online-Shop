<?php
include("koneksi.php");

$id_pesanan = $_REQUEST['id'];

$query1 = mysqli_query($koneksi, "UPDATE `data_pesanan` SET `status` = 'LUNAS' WHERE `data_pesanan`.`id_pesanan` = '$id_pesanan';");
$query2 = mysqli_query($koneksi, "UPDATE `data_bukti` SET `tgl_bukti` = NOW(), `status` = 'Lunas' WHERE `data_bukti`.`id_bukti` = '$id_pesanan';");

if ($query1) {
	echo "
		<script>
			alert('Data Pesanan Telah Dikonfirmasi');
			history.back();
		</script>	
	";
} else {
	echo "
		<script>
			alert('Data gagal dikonfirmasi');
			history.back();
		</script>	
	";
}
