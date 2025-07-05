<?php
session_start();
?>
<!doctype html>
<html lang="en">

<!-- Mirrored from demo.riktheme.com/xvito/compact-menu/data-table.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 04 Jan 2024 03:24:36 GMT -->
<!-- Head -->
<?php include('head.php'); ?>

<body class="sidebar-mini">

    <div class="main-container-wrapper">
        <!-- Top bar area -->
        <?php include('header.php'); ?>


        <div class="container-fluid page-body-wrapper">
            <!-- Side Menu area -->
            <?php include('side-bar.php'); ?>

            <!-- Main page -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="data-table-area">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12 box-margin">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title mb-2">Data Pesanan</h4>
                                            <p class="text-muted font-14 mb-4">
                                                <!-- Button trigger modal -->
                                                <?php
                                                include('koneksi.php');
                                                $id_pesanan = $_GET['id_pesanan'];

                                                $query = mysqli_query(
                                                    $koneksi,
                                                    "SELECT * FROM data_pesanan where id_pesanan = $id_pesanan"
                                                );
                                                if ($query) {
                                                    $data_pesanan = mysqli_fetch_assoc($query);
                                                    $id_pesanan = $data_pesanan['id_pesanan'];
                                                    $tgl_pesanan = $data_pesanan['tgl_pesanan'];
                                                    $nama = $data_pesanan['nama'];
                                                    $alamat = $data_pesanan['alamat'];
                                                    $telpon = $data_pesanan['telpon'];
                                                }
                                                ?>
                                            <p><b>Tanggal Pesanan: <?php echo $tgl_pesanan ?></b></p>
                                            <p><b>ID Pesanan: <?php echo $id_pesanan ?></b></p>
                                            <p><b>Nama: <?php echo $nama ?></b></p>
                                            <p><b>Alamat: <?php echo $alamat ?></b></p>
                                            <p><b>No.Telpon: <?php echo $telpon ?></b></p>
                                            </p>
                                            <!-- Tabel -->
                                            <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>ID Produk</th>
                                                        <th>Merek</th>
                                                        <th>Harga</th>
                                                        <th>QTY</th>
                                                        <th>Status</th>
                                                        <th>SubTotal</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <?php
                                                        function format_rupiah($nilai)
                                                        {
                                                            return 'Rp. ' . number_format($nilai, 0, ',', '.');
                                                        }
                                                        include("koneksi.php");
                                                        $id_pesanan = $_GET['id_pesanan'];


                                                        $query = mysqli_query(
                                                            $koneksi,
                                                            "SELECT *
                                                            FROM data_keranjang K
                                                            JOIN data_produk Pr ON K.id_produk = Pr.id_produk
                                                            JOIN data_pesanan Ps ON K.id_pesanan = Ps.id_pesanan
                                                            WHERE K.id_pesanan='$id_pesanan';
                                                            "
                                                        );
                                                        $no = 1;

                                                        while ($data = mysqli_fetch_array($query)) {

                                                            echo "
                                                                <td>$no</td>
                                                                <td>$data[id_produk]</td>
                                                                <td>$data[merek]</td>
                                                                <td>" . format_rupiah($data['hargax']) . "</td>
                                                                <td>$data[qty]</td>
                                                                <td><span class='badge badge-info'>$data[status] </span>
                                                            
                                                           
                                                                </td>
                                                                <td>" . format_rupiah($data['total']) . "</td>

                                                        </tr>";
                                                            $no++;
                                                        }
                                                        ?>
                                                </tbody>
                                                <tr>
                                                    <?php
                                                    include('koneksi.php');
                                                    $id_pesanan = $_GET['id_pesanan'];
                                                    $query = mysqli_query($koneksi, "SELECT * FROM data_pesanan WHERE id_pesanan = '$id_pesanan'");
                                                    if ($query) {
                                                        $data_pesanan = mysqli_fetch_assoc($query);
                                                        $total_pesanan = $data_pesanan['total_pesanan'];
                                                    }
                                                    ?>
                                                    <td align='center'></td>
                                                    <td align='center'></td>
                                                    <td colspan=3 align='right'><b> </b></td>
                                                    <td id="total" align='left'><b>Total:</b></td>
                                                    <td id="totalsemua"><b><?php echo format_rupiah($total_pesanan) ?></b></td>
                                                </tr>
                                            </table>


                                        </div> <!-- end card body-->
                                    </div> <!-- end card -->
                                </div><!-- end col-->
                            </div>
                            <!-- end row-->

                        </div>
                    </div>

                    <!-- Footer Area -->
                    <?php include('footer.php'); ?>
                </div>
            </div>
        </div>
    </div>

    <!-- ======================================
    ********* Page Wrapper Area End ***********
    ======================================= -->
    <!-- Plugins Js -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bundle.js"></script>

    <!-- Active JS -->
    <script src="js/canvas.js"></script>
    <script src="js/collapse.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/template.js"></script>
    <script src="js/default-assets/active.js"></script>

    <!-- Inject JS -->
    <script src="js/default-assets/jquery.datatables.min.js"></script>
    <script src="js/default-assets/datatables.bootstrap4.js"></script>
    <script src="js/default-assets/datatable-responsive.min.js"></script>
    <script src="js/default-assets/responsive.bootstrap4.min.js"></script>
    <script src="js/default-assets/datatable-button.min.js"></script>
    <script src="js/default-assets/button.bootstrap4.min.js"></script>
    <script src="js/default-assets/button.html5.min.js"></script>
    <script src="js/default-assets/button.flash.min.js"></script>
    <script src="js/default-assets/button.print.min.js"></script>
    <script src="js/default-assets/datatables.keytable.min.js"></script>
    <script src="js/default-assets/datatables.select.min.js"></script>
    <script src="js/default-assets/demo.datatable-init.js"></script>


</body>


<!-- Mirrored from demo.riktheme.com/xvito/compact-menu/data-table.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 04 Jan 2024 03:24:42 GMT -->

</html>