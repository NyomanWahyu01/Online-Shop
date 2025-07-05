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
                                            <h4 class="card-title mb-2">Data Produk</h4>
                                            <p class="text-muted font-14 mb-4">
                                                <!-- Button trigger modal -->
                                                <button data-toggle="modal" data-target="#exampleModal" type="button" class="tambah btn btn-rounded btn-outline-primary mb-2 mr-2">Tambah Data</button>
                                            </p>
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Data Kategori</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- tambah data -->
                                                            <form id="form_input" enctype="multipart/form-data">
                                                                <input type="hidden" class="form-control" name="id_produk" id="id_produk">
                                                                <div class="form-group">
                                                                    <label>Pilih Kategori</label>
                                                                    <select class="form-control" name="id_kategori" id="id_kategori" required>
                                                                        <option value="">Pilih</option>
                                                                        <?php
                                                                        include("koneksi.php");
                                                                        $sql = "SELECT * FROM data_kategori";
                                                                        $result = mysqli_query($koneksi, $sql);
                                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                                            $id_kategori = $row['id_kategori'];
                                                                            $kategori = $row['kategori'];
                                                                            echo "<option value=\"$id_kategori\">$kategori</option>";
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Nama Produk</label>
                                                                    <input type="text" class="form-control" name="nama_produk" id="nama_produk">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Merek</label>
                                                                    <input type="text" class="form-control" name="merek" id="merek">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Warna</label>
                                                                    <input type="text" class="form-control" name="warna" id="warna">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Size</label>
                                                                    <input type="text" class="form-control" name="size" id="size">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Berat</label>
                                                                    <input type="text" class="form-control" name="berat" id="berat">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Harga</label>
                                                                    <input type="text" class="form-control" name="harga" id="harga">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Stok</label>
                                                                    <input type="text" class="form-control" name="stok" id="stok">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Gambar</label>
                                                                    <input type="file" class="form-control" name="gambar" id="gambar">
                                                                    <img id="gambar-preview" src="/admin/upload/" alt="Preview Gambar" style="max-width: 100%; margin-top: 10px; display: none;">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Deskripsi</label>
                                                                    <textarea class="form-control" name="deskripsi" id="deskripsi"></textarea>
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
                                                        <th>Nama Kategori</th>
                                                        <th>Nama Produk</th>
                                                        <th>Merek</th>
                                                        <th>Berat</th>
                                                        <th>Harga</th>
                                                        <th>Stok</th>
                                                        <th>Gambar</th>

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
                                                        $query = mysqli_query(
                                                            $koneksi,
                                                            "SELECT * FROM data_produk A 
                                                             inner join data_kategori B 
                                                             on A.id_kategori = B.id_kategori"
                                                        );
                                                        $no = 1;
                                                        while ($data = mysqli_fetch_array($query)) {

                                                            echo "
                                                                <td>$no</td>
                                                                <td>$data[kategori]</td>
                                                                <td>$data[nama_produk]</td>
                                                                <td>$data[merek]</td>
                                                                <td>$data[berat]</td>
                                                                <td>" . format_rupiah($data['harga']) . "</td>
                                                                <td>$data[stok]</td>
                                                                <td>
                                                                    <img src='{$data['gambar']}' width='100px' alt='image'>
                                                                </td>
                                                               
                                                                <td>
                                                                    <button 
                                                                        data-id_produk='$data[id_produk]' 
                                                                        data-id_kategori='$data[id_kategori]'
                                                                        data-nama_produk='$data[nama_produk]'
                                                                        data-warna ='$data[warna]'
                                                                        data-size='$data[size]'
                                                                        data-merek='$data[merek]'
                                                                        data-berat='$data[berat]'
                                                                        data-harga='$data[harga]' 
                                                                        data-stok='$data[stok]'
                                                                        data-gambar='$data[gambar]'
                                                                        data-deskripsi='$data[deskripsi]'
                                                                        type='button' 
                                                                        class='edit btn btn-warning btn-circle mb-2'
                                                                        data-toggle='modal' data-target='#exampleModal'><i class='fa fa-pencil'></i> 
                                                                    </button>
                                                                    <button 
                                                                        data-id_produk='$data[id_produk]'
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
            if ($("#id_kategori").val() == "" ||
                $("#merek").val() == "" ||
                $("#nama_produk").val() == "" ||
                $("#warna").val() == "" ||
                $("#size").val() == "" ||
                $("#berat").val() == "" ||
                $("#harga").val() == "" ||
                $("#stok").val() == "" ||
                $("#deskripsi").val() == "") {
                alert("Lengkapi Semua Data!");
            } else {
                var myForm = document.getElementById('form_input');
                var formData = new FormData(myForm);

                // Menambahkan tipe aksi (add atau edit) ke FormData
                formData.append('actionType', ($("#id_produk").val() == "") ? 'add' : 'edit');

                $.ajax({
                    url: "simpan_produk.php",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(respon) {
                        alert(respon);
                        location.href = 'produk.php';
                    }
                });
            }
        });


        $(".batal").click(function() {
            history.back();
        });

        $(".tambah").click(function() {
            document.getElementById('id_produk').value = "";
            document.getElementById('id_kategori').value = "";
            document.getElementById('nama_produk').value = "";
            document.getElementById('warna').value = "";
            document.getElementById('ukuran').value = "";
            document.getElementById('merek').value = "";
            document.getElementById('berat').value = "";
            document.getElementById('harga').value = "";
            document.getElementById('stok').value = "";
            document.getElementById('gambar').value = "";
            document.getElementById('deskripsi').value = "";


        });
        // Menampilkan preview gambar saat memilih file
        $("#gambar").change(function() {
            var inputGambar = this;
            if (inputGambar.files && inputGambar.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $("#gambar-preview").attr('src', e.target.result).show();
                }
                reader.readAsDataURL(inputGambar.files[0]);
            }
        });

        $(".edit").click(function() {
            let id_produk = $(this).data("id_produk");
            let id_kategori = $(this).data("id_kategori");
            let nama_produk = $(this).data("nama_produk");
            let warna = $(this).data("warna");
            let size = $(this).data("size");

            let merek = $(this).data("merek");
            let berat = $(this).data("berat");
            let harga = $(this).data("harga");
            let stok = $(this).data("stok");
            let gambar = $(this).data("gambar");
            let deskripsi = $(this).data("deskripsi");

            $("#id_produk").val(id_produk);
            $("#id_kategori").val(id_kategori);
            $("#nama_produk").val(nama_produk);
            $("#warna").val(warna);
            $("#size").val(size);

            $("#merek").val(merek);
            $("#berat").val(berat);
            $("#harga").val(harga);
            $("#stok").val(stok);
            // Menampilkan preview gambar saat mengedit
            $("#gambar-preview").attr('src', '' + gambar).show();
            $("#deskripsi").val(deskripsi);

        });

        $(".hapus").click(function() {
            let id_produk = $(this).data("id_produk");

            if (confirm("Yakin ingin menghapus data ini?") == true) {
                location.href = 'hapus_produk.php?id_produk=' + id_produk;
            }
        });

    });
</script>