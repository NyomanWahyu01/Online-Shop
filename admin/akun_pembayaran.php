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
                                                <h4 class="card-title mb-2">Data Akun Pembayaran</h4>
                                                <p class="text-muted font-14 mb-4">
                                                    <!-- Button trigger modal -->
                                                </p>
                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Data Akun Pembayaran</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <!-- tambah data -->
                                                                <form id="form_input">
                                                                    <input type="hidden" class="form-control" name="id_akunpembayaran" id="id_akunpembayaran">
                                                                     
                                                                    <div class="form-group">
                                                                        <label>Nama Akun</label>
                                                                        <input type="text" class="form-control" name="nama" id="nama">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Jenis Pembayaran</label>
                                                                        <input type="text" class="form-control" name="jenis_pembayaran" id="jenis_pembayaran">
                                                                    </div>
                                                                </form>                                                                
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="button" class="simpan btn btn-primary">Save changes</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Tabel -->
                                                <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama Akun</th>
                                                            <th>Jenis Pembayaran</th>
                                                            <th>Aksi</th>                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <?php
                                                            include("koneksi.php");
                                                            $query = mysqli_query($koneksi, 
                                                            "SELECT * FROM data_pesanan P 
                                                            JOIN user U
                                                            ON P.id_user = U.id_user");
                                                            $no = 1;

                                                            while ($data = mysqli_fetch_array($query)) {
                                                                echo "
                                                                <td>$no</td>
                                                                <td>$data[nama]</td>
                                                                <td>$data[jenis_pembayaran]</td>
                                                                <td>
                                                                <button 
                                                                    data-id_akunpembayaran='$data[id_pesanan]'
                                                                    data-nama='$data[nama]'
                                                                    data-jenis_pembayaran='$data[jenis_pembayaran]'
                                                                    type='button' 
                                                                    class='edit btn btn-warning btn-circle mb-2'
                                                                    data-toggle='modal' data-target='#exampleModal'><i class='fa fa-pencil'></i> 
                                                                </button>
                                                                <button 
                                                                    data-id_akunpembayaran='$data[id_pesanan]'
                                                                    type='button' class='hapus btn btn-danger btn-circle mb-2'><i class='fa fa-trash'></i>
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
<script  type="text/javascript">
$(document).ready(function(){
  $(".simpan").click(function(){
 
    if($("#id_akunpembayaran").val()==""|| $("#nama").val()==""|| $("#jenis_pembayaran").val()=="") 
    {
        alert("Lengkapi Semua Data!");
    }else
    {
        var myForm = document.getElementById('form_input');
        $.ajax
        ({

            url: "simpan_akunpembayaran.php",
            type: "POST",            
            data: new FormData(myForm),
            contentType: false,      
            cache: false,            
            processData:false,        
            success: function(respon)  
            {
                alert(respon);
                location.href='akun_pembayaran.php';
            }
        });
    } 
       
  });
 
  $(".batal").click(function(){
    history.back();
  });

  
  $(".edit").click(function(){
            let id_akunpembayaran = $(this).data("id_akunpembayaran");
            let nama = $(this).data("nama");
            let jenis_pembayaran = $(this).data("jenis_pembayaran");
        
            $("#id_akunpembayaran").val(id_akunpembayaran);
            $("#nama").val(nama);
            $("#jenis_pembayaran").val(jenis_pembayaran);
           
  });

  $(".hapus").click(function(){
    let id_akunpembayaran = $(this).data("id_akunpembayaran");

    if (confirm("Yakin ingin menghapus data ini?") == true) 
    {
      location.href='hapus_akunpembayaran.php?id_akunpembayaran='+id_akunpembayaran;
    } 
  });

});
</script>

