<?php 
	$makanan = mysqli_query($koneksi,"SELECT COUNT(jenis_menu) as makanan FROM menu WHERE jenis_menu = 'makanan'");
        $minuman = mysqli_query($koneksi,"SELECT COUNT(jenis_menu) as minuman FROM menu WHERE jenis_menu = 'minuman'");
        $pelanggan = mysqli_query($koneksi,"SELECT COUNT(id_pelanggan) as pelanggan FROM pelanggan");
        $kasir = mysqli_query($koneksi,"SELECT COUNT(akses) as kasir FROM user_login WHERE akses = 'kasir'");


        $queryMakanan = mysqli_fetch_array($makanan);
        $queryMinuman = mysqli_fetch_array($minuman);
        $queryPelanggan = mysqli_fetch_array($pelanggan); 
        $queryKasir = mysqli_fetch_array($kasir);

 ?>