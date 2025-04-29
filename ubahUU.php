<?php  
    include_once'db/koneksi.php';
    if (isset($_POST['ubah'])) {
            $id = $_POST['id'];
            $nama = $_POST['nama'];
            $username = $_POST['username'];
            $password = $_POST['password'];

            $ubahData = mysqli_query($koneksi, "UPDATE user_login SET nama = '$nama', password = md5('$password') WHERE username = '$username'");
            $ubahDataUser = mysqli_query($koneksi, "UPDATE kasir SET nama_kasir = '$nama', password = md5('$password') WHERE id_kasir = '$id'");
            if ($ubahDataUser == true) {
                echo "<script>alert('Data Berhasil Diubah')</script>";
                echo "<script>window.location.href = 'index.php'</script>";
            }
            else{
                echo "<script>alert('Data Gagal Diubah')</script>";
                echo "<script>window.location.href = 'index.php'</script>";
            }

        }

?>