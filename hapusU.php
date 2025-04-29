<?php  
    include_once'db/koneksi.php';
        $id = $_GET['id'];
        $username = $_GET['username'];

        $hapusData = mysqli_query($koneksi, "DELETE FROM user_login WHERE username = '$username'");
        $hapusDataUser = mysqli_query($koneksi, "DELETE FROM kasir WHERE id_kasir = '$id'");
        if ($hapusDataUser == true) {
            echo "<script>alert('Data Berhasil Dihapus')</script>";
            echo "<script>window.location.href = 'index.php'</script>";
        }
        else{
            echo "<script>alert('Data Gagal Dihapus')</script>";
            echo "<script>window.location.href = 'index.php'</script>";
        }

        

?>