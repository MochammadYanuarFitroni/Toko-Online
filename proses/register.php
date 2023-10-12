<?php 
include '../Database/koneksi.php';

$nama = htmlspecialchars($_POST['nama']);
$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);
$email = htmlspecialchars($_POST['email']);
$tlp = htmlspecialchars($_POST['telp']);
$konfirmasi = htmlspecialchars($_POST['konfirmasi']);
$alamat = htmlspecialchars($_POST['alamat']);

$hash = password_hash($password, PASSWORD_DEFAULT);

if($password == $konfirmasi){
	$cek = mysqli_query($conn, "SELECT username from pelanggan where username = '$username'");;
	$jml = mysqli_num_rows($cek);

	if($jml == 1){
		echo "
		<script>
		alert('USERNAME SUDAH DIGUNAKAN');
		window.location = '../register.php';
		</script>
		";
		die;
	}

	$result = mysqli_query($conn, "INSERT INTO pelanggan VALUES ('','$nama','$username','$hash','$email','$tlp','$alamat')");
	if($result){
		echo "
		<script>
		alert('REGISTER BERHASIL');
		window.location = '../user-login.php';
		</script>
		";
	}

}else{
	echo "
	<script>
	alert('KONFIRMASI PASSWORD TIDAK SAMA');
	window.location = '../register.php';
	</script>
	";
}

?>