<?php 
	session_start();
	unset($_SESSION['pelanggan']);
	unset($_SESSION['id_pelanggan']);
	header('location:../user-login.php');
?>