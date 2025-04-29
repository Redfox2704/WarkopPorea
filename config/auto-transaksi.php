<?php
	$sqlLayanan = mysqli_query($koneksi,"SELECT id_kasir FROM kasir WHERE username = '$akses'");
    $queryLayanan = mysqli_fetch_array($sqlLayanan);

	$sqlId = mysqli_query($koneksi, "SELECT max(id_transaksi) as kodeTerbesar FROM transaksi");
    $data = mysqli_fetch_array($sqlId);
    $kodeTransaksi = $data['kodeTerbesar'];
    $urutan = (int) substr($kodeTransaksi, 3, 3);
    $urutan++;
    $huruf = "TRS";
    $kodeTransaksi = $huruf . sprintf("%03s", $urutan);

?>