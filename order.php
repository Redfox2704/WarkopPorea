<?php
      include('db/koneksi.php');
      include_once('config/order-menu.php');

      session_start();
      if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
        $akses = $_SESSION['username'];
        $sql = mysqli_query($koneksi,"SELECT akses FROM user_login WHERE username = '$akses'");
        $query = mysqli_fetch_array($sql);

        if (isset($_POST['lanjut'])) {
            $_SESSION['nama'] = $_POST['nama'];
            $_SESSION['kode'] = $_POST['kode'];
            $_SESSION['jenis'] = $_POST['jenis'];
        }
        else
        {   
            if (isset($_SESSION['nama']) && isset($_POST['proses'])) {
                include_once('config/order-proses.php');
                include_once('config/auto-transaksi.php');
                $nama = $_SESSION['nama'];
                $kode = $_SESSION['kode'];
                $jenis = $_SESSION['jenis'];
                $idKasir = $queryLayanan['id_kasir'];

                $inputDataPelanggan = mysqli_query($koneksi, "INSERT INTO pelanggan VALUES('$kode', '$nama', '$jenis')");
                $inputTransaksi = mysqli_query($koneksi, "INSERT INTO `transaksi` (`id_transaksi`, `id_pelanggan`, `id_kasir`, `total`, `tanggal_transaksi`) VALUES ('$kodeTransaksi', '$kode', '$idKasir', '$total', curdate())");
                if ($inputTransaksi == true) {
                    unset($_SESSION['nama']);
                    unset($_SESSION['kode']);
                    unset($_SESSION['jenis']);

                    echo "berhasil";
                }

            }
            else{
                header("LOCATION: insertData.php");

            }
        }
        ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>WARKOP POREA</title>
        <link href="css/tabel.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="css/index.css">
        <link rel="stylesheet" type="text/css" href="css/all.min.css">
        <link rel="stylesheet" type="text/css" href="css/fontawesome.min.css">
        <link rel="stylesheet" type="text/css" href="css/order.css">
        
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand ps-3" href="index.php">Warkop Porea</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            
            <ul class="navbar-nav ms-auto me-0 me-md-3 my-2 my-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Utama</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link" href="insertData.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-clipboard"></i></div>
                                Buat Pesanan
                            </a>
                            <div class="sb-sidenav-menu-heading">Data</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                Data User
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="dataPelanggan.php">Data Pelanggan</a>
                                    <a class="nav-link" href="dataKasir.php">Data Kasir</a>
                            
                                </nav>
                            </div>
                            
                            <div class="sb-sidenav-menu-heading">Lainnya</div>
                            <a class="nav-link" href="riwayat.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-line"></i></div>
                                Riwayat Transaksi
                            </a>
                            <?php if ($query['akses'] == 'admin') {?>
                            <div class="sb-sidenav-menu-heading">Hak Akses</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#hak" aria-expanded="false" aria-controls="hak">
                                <div class="sb-nav-link-icon"><i class="fas fa-users-cog"></i></div>
                                Manipulasi Data
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="hak" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="ubahUser.php">Ubah Data User</a>
                                    <a class="nav-link" href="tambahUser.php">Tambah Data User</a>
                                    <a class="nav-link" href="hapusUser.php">Hapus Data User</a>
                                    <hr>
                                    <a class="nav-link" href="tambahMenu.php">Tambah Menu</a>
                                    <a class="nav-link" href="hapusMenu.php">Hapus Menu</a>

                            
                                </nav>
                            </div>
                            <?php } ?>

                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Login Sebagai:</div>
                        <?php echo $query['akses']; ?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                	<div class="container-fluid px-4">
                        <h1 class="mt-4">Buat Pesanan</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Buat Pesanan</li>
                        </ol>
                        <form method="post" action="">
                        <div class="row row-cols-1 row-cols-md-4 g-5">
						  
						  <?php 
						  		foreach ($queryMenu as $menu) {?>
						  <div class="col">
						    <div class="card">
						      <img src="assets/img/<?php echo $menu['nama_menu'].'.jpg' ?>" class="card-img-top" alt="...">
						      <div class="card-body text-center">
						        <h5 class="card-title"><?php echo $menu['nama_menu'] ?></h5>
						        <p class="card-text">Rp<?php echo $menu['harga'] ?></p>
						        <input type="checkbox" class="btn-check" id="btn-check-<?php echo $menu['id_menu']?>-outlined" checked autocomplete="off" name="pilih[]" value="<?php echo $menu['nama_menu'] ?>">
<label class="btn btn-outline-primary" for="btn-check-<?php echo $menu['id_menu']?>-outlined">Pilih</label><br>
						      </div>
						      <center><input type="number" name="<?php echo $menu['id_menu']?>" id="jumlah" min="0"></center>
						    </div>
						  </div>
						  <?php } ?>
						  

						</div>
						<div class="order">
							<button type="submit" class="btn btn-primary btn-lg btn-block" name="proses">Proses</button>
						</div>
						</form>

                	</div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; WarkopPorea 2021</div>
                    </div>
                </div>
                </footer>
            </div>
        </div>
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
        <script src="js/tabel.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <script type="text/javascript">
    		$(":checkbox").prop('checked', false).parent().removeClass('active');
        </script>
    </body>
</html>
<?php }else{header("Location: login.php");}?>
