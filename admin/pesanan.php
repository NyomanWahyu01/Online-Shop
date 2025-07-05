<?php
session_start();
?>
<!doctype html>
<html lang="en">

<!-- Mirrored from demo.riktheme.com/xvito/compact-menu/data-table.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 04 Jan 2024 03:24:36 GMT -->
<!-- Head -->
<?php include('head.php'); ?>

<body class="sidebar-mini">

    <!-- ======================================
    ******* Main Page Wrapper **********
    ======================================= -->

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
                                                <!-- <button data-toggle="modal" data-target="#exampleModal" type="button" class="tambah btn btn-rounded btn-outline-primary mb-2 mr-2">Tambah Data</button> -->
                                            </p>

                                            <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Tanggal Pesanan</th>
                                                        <th>ID Pesanan</th>
                                                        <th>Jenis Pembayaran</th>
                                                        <th>Total Pesanan</th>
                                                        <th>Status</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <?php
                                                        function format_rupiah($angka)
                                                        {
                                                            $rupiah = "Rp " . number_format($angka, 0, ',', '.');
                                                            return $rupiah;
                                                        }
                                                        include("koneksi.php");
                                                        $query = mysqli_query($koneksi, "SELECT * FROM `data_pesanan`");
                                                        $no = 1;

                                                        while ($data = mysqli_fetch_array($query)) {
                                                            echo "
                                                                <td>$no</td>
                                                                <td>$data[tgl_pesanan]</td>
                                                                <td>$data[id_pesanan]</td>
                                                                <td>$data[jenis_pembayaran]</td>
                                                                <td>" . format_rupiah($data['total_pesanan']) . "</td>
                                                                <td>";
                                                            $querybukti = mysqli_fetch_array(mysqli_query($koneksi, "select * from data_bukti where id_pesanan='$data[id_pesanan]' "));
                                                            if ($data['status'] == "Bukti Transfer Terkirim") {
                                                                echo "<a href='bukti/$querybukti[bukti_transfer]'><span class='badge badge-info'>Lihat Bukti Transfer </span></a> <a href='konfirmasi.php?id=$data[id_pesanan]' onclick='return confirm(\"Yakin bukti pembayaran sudah sesuai?\")'><span class='badge badge-info'>Konfirmasi</span></a>";
                                                            } else {
                                                                echo "<span class='badge badge-info'>$data[status] </span>";
                                                            }

                                                            echo "</td>
 
                                                                <td>
                                                                    
                                                                    <button 
                                                                        type='submit' class='btn btn-info btn-circle mb-2'>
                                                                        <input type='hidden' name='id_pesanan' value='$data[id_pesanan]'>
                                                                        <a href='detail_pesanan.php?id_pesanan=$data[id_pesanan]' style='text-decoration: none; color: inherit;'>
                                                                        <i class='fa fa-eye'></i> </a>
                                                                    </button>
                                                                </td>
                                                        </tr>";
                                                            $no++;
                                                        }
                                                        ?>
                                                </tbody>
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
<script type="text/javascript">
    $(document).ready(function() {
        $(".simpan").click(function() {

            if ($("#tgl_pesanan").val() == "" || $("#jenis_pembayaran").val() == "" || $("#total_pesanan").val() == "" || $("#status").val() == "") {
                alert("Lengkapi Semua Data!");
            } else {
                var myForm = document.getElementById('form_input');
                $.ajax({

                    url: "simpan_pesanan.php",
                    type: "POST",
                    data: new FormData(myForm),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(respon) {
                        alert(respon);
                        location.href = 'pesanan.php';
                    }
                });
            }

        });

        $(".batal").click(function() {
            history.back();
        });

        $(".tambah").click(function() {
            document.getElementById('id_pesanan').value = "";
            document.getElementById('tgl_pesanan').value = "";
            document.getElementById('jenis_pembayaran').value = "";
            document.getElementById('total_pesanan').value = "";
            document.getElementById('status').value = "";

        });

        $(".edit").click(function() {
            let id_pesanan = $(this).data("id_pesanan");
            let tgl_pesanan = $(this).data("tgl_pesanan");
            let jenis_pembayaran = $(this).data("jenis_pembayaran");
            let total_pesanan = $(this).data("total_pesanan");
            let status = $(this).data("status");

            $("#id_pesanan").val(id_pesanan);
            $("#tgl_pesanan").val(tgl_pesanan);
            $("#jenis_pembayaran").val(jenis_pembayaran);
            $("#total_pesanan").val(total_pesanan);
            $("#status").val(status);

        });
        $(".hapus").click(function() {
            let id_pesanan = $(this).data("id_pesanan");

            if (confirm("Yakin ingin menghapus data ini?")) {
                location.href = "hapus_pesanan.php?id_pesanan=" + id_pesanan;
            }
        });
    });
</script>