<?php
session_start();

if (!isset($_SESSION['id_user'])) {
    echo "
    <script>
        alert('Silahkan login terlebih dahulu!!!');
        history.back();
    </script>";
} else {
    include("koneksi.php");
    $id_user = $_SESSION['id_user'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id_keranjang = $_POST['id_keranjang'];
        $action = $_POST['action'];

        $query = mysqli_query($koneksi, "SELECT * FROM data_keranjang WHERE id_keranjang='$id_keranjang' AND id_user='$id_user' AND id_pesanan='0'");
        $data_keranjang = mysqli_fetch_array($query);

        $id_produk = $data_keranjang['id_produk'];
        $qty = $data_keranjang['qty'];

        // Dapatkan stok produk dari database
        $stok_produk = mysqli_fetch_array(mysqli_query($koneksi, "SELECT stok FROM data_produk WHERE id_produk='$id_produk'"))['stok'];

        if ($qty == 1 && $action == 'subtract') {
            // Tidak dapat lagi mengurangkan qty jika sisa qty adalah 1
            echo "
            <script>
                alert('Qty Produk Tidak dapat dikurangkan lagi');
                history.back();
            </script>";
            exit();
        }

        if ($action == 'add') {
            // Tambah qty
            $qty++;
            $new_stok = $stok_produk - ($qty - $data_keranjang['qty']);
            if ($new_stok < 0) {
                // Stok tidak mencukupi
                echo "
                <script>
                    alert('Stok Produk tidak mencukupi');
                    history.back();
                </script>";
                exit();
            }
        } elseif ($action == 'subtract') {
            // Kurangi qty
            if ($qty - 1 > 0) {
                $qty--;

                // Update stok produk di database setelah mengurangi qty
                $new_stok = $stok_produk + 1;
            }
        }

        // Update qty di keranjang belanja
        $total = $data_keranjang['hargax'] * $qty;
        $update = mysqli_query($koneksi, "UPDATE `data_keranjang` SET `qty` = '$qty', `total` = '$total' WHERE `id_keranjang` = '$id_keranjang'");

        if ($update) {
            // Update stok produk di database setelah mengubah qty di keranjang
            mysqli_query($koneksi, "UPDATE `data_produk` SET `stok` = '$new_stok' WHERE `id_produk` = '$id_produk'");

            echo "
            <script>
                window.location='keranjang.php';
            </script>";
        } else {
            echo "
            <script>
                alert('Gagal mengupdate qty');
                history.back();
            </script>";
        }
    }
}
?>
