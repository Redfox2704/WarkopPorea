<?php  
    include_once'db/koneksi.php';
    if (isset($_POST['upload'])) {
            $tmp = $_FILES['gambar']['tmp_name'];
            $folder = "assets/img/";

            $id = $_POST['kode'];
            $nama = $_POST['nama'];
            $harga = $_POST['harga'];
            $jenis = $_POST['jenis'];

            $tambahMenu = mysqli_query($koneksi, "INSERT INTO menu VALUES('$id','$nama','$harga','$jenis')");
            if ($tambahMenu == true) {
                move_uploaded_file($tmp, $folder.$nama.".jpg");


            }

            

        }

?>