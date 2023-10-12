<?php
require '../Database/koneksi.php';

session_start();

if( !isset($_SESSION["login"]) ){
    header("Location: login.php");
    exit;
}

$pelanggan = query("SELECT * FROM pelanggan");
$AllKategori = query("SELECT * FROM kategori");
$AllProduk = query("SELECT * FROM produk JOIN kategori ON produk.id_kategori=kategori.id_kategori");
$AllPembelian = query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan");
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Toko Alat Kesehatan | Admin</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="assets/css/newCustom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

   <!-- TABLES BOOTSTRAP-->
   <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"> -->
   <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
</head>
<body>
    <div id="newWrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Alat Kesehatan</a> 
            </div>
            <div style="color: white; padding: 15px 50px 5px 50px; float: right; font-size: 16px;"> 
                <a href="logout.php" class="btn btn-danger square-btn-adjust">Logout</a> 
            </div>
        </nav>   
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="text-center">
                        <img src="assets/img/find_user.png" class="user-image img-responsive"/>
                    </li>
                    <li>
                        <a href="index.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="index.php?halaman=user"><i class="fa fa-desktop fa-3x"></i> User</a>
                    </li>
                    <li>
                        <a href="index.php?halaman=kategori"><i class="fa fa-qrcode fa-3x"></i> Kategori</a>
                    </li>
                    <li>
                        <a href="index.php?halaman=produk"><i class="fa fa-table fa-3x"></i> Produk</a>
                    </li>
                    <li>
                        <a href="index.php?halaman=pesanan"><i class="fa fa-laptop fa-3x"></i> Pesanan</a>
                    </li>    
                </ul>
            </div>
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <?php
                if(isset($_GET["halaman"])){

                    //Produk
                    if($_GET["halaman"]=="produk"){
                        include 'hlm-produk/produk.php';
                    }
                    elseif($_GET["halaman"]=="tambahProduk"){
                        include 'hlm-produk/tbhProduk.php';
                    }
                    elseif($_GET["halaman"]=="editProduk"){
                        include 'hlm-produk/editProduk.php';
                    }


                    //Pesanan
                    elseif($_GET["halaman"]=="pesanan"){
                        include 'pesanan.php';
                    }

                    //User/Pelanggan
                    elseif($_GET["halaman"]=="user"){
                        include 'hlm-pelanggan/user.php';
                    }
                    elseif($_GET["halaman"]=="tambahUser"){
                        include 'hlm-pelanggan/tbhUser.php';
                    }
                    elseif($_GET["halaman"]=="editUser"){
                        include 'hlm-pelanggan/editUser.php';
                    }

                    //Kategori
                    elseif($_GET["halaman"]=="kategori"){
                        include 'hlm-kategori/kategori.php';
                    }
                    elseif($_GET["halaman"]=="detailPesanan"){
                        include 'detailPesanan.php';
                    }
                    elseif($_GET["halaman"]=="tambahKategori"){
                        include 'hlm-kategori/tbhKategori.php';
                    }
                    elseif($_GET["halaman"]=="editKategori"){
                        include 'hlm-kategori/editKategori.php';
                    }
                    // elseif($_GET["halaman"]=="hapusKategori"){
                    //     include 'hlm-kategori/hapusKategori.php';
                    // }
                }
                else{
                    include 'dashboard.php';
                }
                ?>
            </div>
             <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>



    <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>

    <!-- TABLES BOOTSTRAP-->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "lengthMenu": [[5, 10, 25], [5, 10, 25]] // Menentukan pilihan jumlah entri yang ditampilkan
            });
        });
    </script>
    
   
</body>
</html>
