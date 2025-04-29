<?php  
    include_once'db/koneksi.php';
    if (isset($_POST['tambah'])) {
            $id = $_POST['id'];
            $nama = $_POST['nama'];
            $username = $_POST['username'];
            $password = $_POST['password'];



            $inputUserLogin = mysqli_query($koneksi, "INSERT INTO user_login VALUES('$username', md5($password), '$nama','kasir')");
            $inputDataUser = mysqli_query($koneksi, "INSERT INTO kasir VALUES('$id', '$username', md5($password), '$nama')");
            if ($inputDataUser == true) {
                echo "<script>alert('Data Berhasil Ditambahkan')</script>";
                echo "<script>window.location.href = 'index.php'</script>";
            }
            else{
                echo "<script>alert('Data Gagal Ditambahkan')</script>";
                echo "<script>window.location.href = 'index.php'</script>";
            }

        }

?>