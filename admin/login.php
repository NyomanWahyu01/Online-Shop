<?php
session_start();
include("koneksi.php");

if(isset($_POST["login"]))
{
    $user=$_POST['username'];
    $pass=$_POST['password'];

    $query=mysqli_query($koneksi,"SELECT * FROM `admin` WHERE `username` = '$user' AND `password` = '$pass' ");
    $jumlah=mysqli_num_rows($query);

    if($jumlah==0)
    {

      echo"
        <script>
            alert('Username atau password salah');
        </script>
      ";
    }else
    {
      
        $_SESSION['username']= 'admin';
        echo"
        <script>
            alert('Berhasil Login');
            location.href='dashboard.php';
        </script>
      ";
    }

}

?>

<!doctype html>
<html lang="en">


<!-- Mirrored from demo.riktheme.com/xvito/compact-menu/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 04 Jan 2024 03:24:28 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Required meta tags -->

    <title>Login Admin</title>

    <!-- Favicon -->
    <link rel="icon" href="toko-logo.png">

    <!-- Master Stylesheet CSS -->
    <link rel="stylesheet" href="style.css">

</head>

<body class="login-area">


    <!-- ======================================
    ******* Page Wrapper Area Start **********
    ======================================= -->
    <div class="main-content- h-100vh">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center">
                <div class="hero">
                    <div class="cube"></div>
                    <div class="cube"></div>
                    <div class="cube"></div>
                    <div class="cube"></div>
                    <div class="cube"></div>
                    <div class="cube"></div>
                </div>
                <div class="col-sm-10 col-md-8 col-lg-5">
                    <!-- Middle Box -->
                    <div class="middle-box">
                        <div class="card">
                            <div class="card-body p-4">

                                <!-- Logo -->
                                <h4 class="font-24 mb-3">Login Admin</h4>

                                <form action="" method="post">
                                    <div class="form-group">
                                        <input class="form-control login" type="text" id="username" name="username" placeholder="Username">
                                    </div>

                                    <div class="form-group">
                                        <input class="form-control login" type="password" name="password" id="password" placeholder="Password">
                                    </div>
              
                                    <div class="form-group mb-0">
                                        <button class="btn btn-primary btn-block" value="login" type="submit" name="login"> Log In </button>
                                    </div>


                                </form>

                                <!-- end card -->
                            </div>
                        </div>
                    </div>
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
    <script src="js/default-assets/active.js"></script>

</body>


<!-- Mirrored from demo.riktheme.com/xvito/compact-menu/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 04 Jan 2024 03:24:28 GMT -->
</html>