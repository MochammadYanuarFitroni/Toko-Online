<?php 
session_start();
include '../Database/koneksi.php';

$username = $_POST['username'];
$password = $_POST['pass'];

$cek = mysqli_query($conn, "SELECT * FROM pelanggan where username = '$username'");
$jml = mysqli_num_rows($cek);
$row = mysqli_fetch_assoc($cek);

if($jml ==1){
	if(password_verify($password, $row['password'])){
		$_SESSION['pelanggan'] = $row['nama_pelanggan'];
		$_SESSION['id_pelanggan'] = $row['id_pelanggan'];
		header('location:../index.php');
	}else{
		echo "
		<script>
		alert('USERNAME/PASSWORD SALAH');
		window.location = '../user-login.php';
		</script>
		";
		die;
	}
}else{
	echo "
	<script>
	alert('USERNAME/PASSWORD SALAH');
	window.location = '../user-login.php';
	</script>
	";
	die;
}

?>
