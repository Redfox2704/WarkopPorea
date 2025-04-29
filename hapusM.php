<?php  
    include_once'db/koneksi.php';
        $id = $_GET['id'];
        $hapusDataMenu = mysqli_query($koneksi, "DELETE FROM menu WHERE id_menu = '$id'");
        if ($hapusDataMenu == true) {
            echo "<script>alert('Data Berhasil Dihapus')</script>";
            echo "<script>window.location.href = 'index.php'</script>";
        }
        else{
            echo "<script>alert('Data Gagal Dihapus')</script>";
            echo "<script>window.location.href = 'index.php'</script>";
        }

        

?>