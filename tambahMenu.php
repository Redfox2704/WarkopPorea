<?php
      include('db/koneksi.php');
      session_start();
      if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
        $akses = $_SESSION['username'];
        $sql = mysqli_query($koneksi,"SELECT akses FROM user_login WHERE username = '$akses'");
        $query = mysqli_fetch_array($sql);

        $sqlId = mysqli_query($koneksi, "SELECT max(id_menu) as kodeTerbesar FROM menu");
        $data = mysqli_fetch_array($sqlId);
        $kodeMenu = $data['kodeTerbesar'];
        $urutan = (int) substr($kodeMenu, 3, 3);
        $urutan++;
        $huruf = "MN";
        $kodeMenu = $huruf . sprintf("%03s", $urutan);

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
                            <?php if ($query['akses'] == 'kasir') {?>
                            <a class="nav-link" href="insertData.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-clipboard"></i></div>
                                Buat Pesanan
                            </a>
                            <?php } ?>
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
                      <form action="tambahM.php" method="post" enctype="multipart/form-data">
                          <div class="mb-3">
                            <label for="kode" class="form-label">Id Menu</label>
                            <input type="text" class="form-control" id="kode" name="kode" value="<?php echo $kodeMenu;?>" required readonly>
                          </div>
                          <div class="mb-3">
                            <label for="nama" class="form-label">Nama Menu</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                          </div>
                          <div class="mb-3">
                            <label for="harga" class="form-label">Harga Menu</label>
                            <input type="number" class="form-control" id="harga" name="harga" required>
                          </div>
                          <div class="mb-3">
                            <label for="menu" class="form-label">Pilih Jenis Menu</label>
                          </div>
                          <div class="form-check mb-3">
                            <input type="radio" class="form-check-input" id="jenis1" name="jenis" value="makanan" required>
                            <label for="jenis1" class="form-check-label">makanan</label><br>
                            <input type="radio" class="form-check-input" id="jenis2" name="jenis" value="minuman" required>
                            <label for="jenis2" class="form-check-label">minuman</label>
                          </div>
                          <div class="mb-3">
                            <label for="gambar" class="form-label">Upload Gambar</label>
                            <input type="file" class="form-control" id="gambar" name="gambar" accept=".jpg" required>
                          </div>
                          <button type="submit" class="btn btn-primary" name="upload">Proses</button>
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
    </body>
</html>
<?php }else{header("Location: login.php");}?>






















