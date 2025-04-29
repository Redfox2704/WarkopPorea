<?php  
  session_start();
    if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
    header("Location: index.php");          
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Warkop Porea</title>
</head>
<link rel="stylesheet" type="text/css" href="css/login.css">
<link rel="stylesheet" type="text/css" href="css/all.min.css">
<link rel="stylesheet" type="text/css" href="css/fontawesome.min.css">
<body>
	<div class="container">
		<div class="login-page">
			<h2>Login</h2>
			<h1><i class="fas fa-mug-hot"></i></h1>
			<hr>
			<form action="" method="post">
				<label>Username</label><br>
				<input type="text" name="username" placeholder="Masukan username anda"><br>
				<label>Password</label><br>
				<input type="password" name="password" placeholder="Masukan password anda"><br>
				<?php
		        if (isset($_POST['username']) && isset($_POST['password'])) {
		                    
		          $user = $_POST['username'];
		          $pass = md5($_POST['password']);
		          
		          include 'db/koneksi.php';

		          $sql = mysqli_query($koneksi, "SELECT * FROM user_login WHERE username = '$user' AND password = '$pass'");
		          $cek =mysqli_num_rows($sql);
		          if ($cek > 0) {
		            session_start();
		            $_SESSION['username'] = $user;
		            $_SESSION['password'] = $pass;

		            header("Location: index.php");
		          }
		          else{
		            echo "<h5>username atau password salah!</h5>";
		          }
		        }
		        
		        ?>
				<center><button type="submit">Login</button></center>	
			</form>
		</div>
	</div>
</body>
</html>