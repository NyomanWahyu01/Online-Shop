<?php
  session_start();

?>
<!doctype html>
<html lang="en">

<!-- Mirrored from demo.riktheme.com/xvito/compact-menu/data-table.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 04 Jan 2024 03:24:36 GMT -->
<!-- Head -->
<?php include('head.php');?>

<body class="sidebar-mini">

     <!-- ======================================
    ******* Main Page Wrapper **********
    ======================================= -->

    <div class="main-container-wrapper">
        <!-- Top bar area -->
        <?php include('header.php');?>
        <div class="container-fluid page-body-wrapper">
            <!-- Side Menu area -->
            <?php include('side-bar.php');?>

            <!-- Main page -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="data-table-area">
                        <div class="container-fluid">
                            <div class="row">
                                    <div class="col-12 box-margin">
                                        <div class="card">
                                            <div class="card-body">
                                            <h4 class="card-title mb-2">Data Laporan</h4>

                                                <p class="text-muted font-14 mb-4">
                                                    <!-- Button trigger modal -->
                                                    <?php
                                                    $awal=$_GET['awal'];
                                                    $akhir=$_GET['akhir'];

                                                    echo"
                                                   
                                                    <div class='row g-3'>
                                                        <div class='col-md-3'>
                                                            <label for='inputEmail5' class='form-label'><b>Tgl Awal: $awal</b></label>
                                                        </div>
                                                        <div class='col-md-3'>
                                                            <label for='inputPassword5' class='form-label'><b>Tgl Akhir: $akhir</b></label>
                                                        </div>                                                    
                                                    </div>
                                                    "; 
                                                    ?>                                            
                                                </p>
                                            
                                                <!-- Tabel -->
                                                <table class="table table-nowrap table-hover mb-0" id="disini">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Tanggal Pesanan</th>
                                                            <th>ID Pesanan</th>
                                                            <th>Jenis Pembayaran</th>
                                                            <th>Total Pesanan</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                     $awal = isset($_GET['awal']) ? $_GET['awal'] : '';
                                                     $akhir = isset($_GET['akhir']) ? $_GET['akhir'] : '';
                                                        include("koneksi.php");

                                                        $query = mysqli_query($koneksi, 
                                                        "SELECT * FROM `data_pesanan`
                                                        WHERE date(tgl_pesanan)>= '$awal' 
                                                        AND date(tgl_pesanan)<='$akhir'
                                                        and data_pesanan.status='Lunas'

                                                        ");
                                                        $no = 1;
                                                        

                                                        while ($data = mysqli_fetch_array($query)) {
                                                            echo "
                                                            <tr>
                                                                <td>$no</td>
                                                                <td>$data[tgl_pesanan]</td>
                                                                <td>$data[id_pesanan]</td>
                                                                <td>$data[jenis_pembayaran]</td>
                                                                <td>$data[total_pesanan]</td>
                                                                <td><span class='badge badge-info'>$data[status]</span></td>
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
                    <?php include('footer.php');?>
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
    $(document).ready(function () {
        $(".tampil").click(function () {
            let awal = document.getElementById('awal').value;
            let akhir = document.getElementById('akhir').value;

            if (awal == "" || akhir == "") {
                alert('Pilih Tanggal terlebih dahulu');
            } else {
                $("#disini").load("laporan.php?awal=" + awal + "&akhir=" + akhir);
               
            }
        });
    });
</script>

