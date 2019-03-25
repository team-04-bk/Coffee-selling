<?php 
	session_start();
	unset($_SESSION['ma_khach_hang']);
	unset($_SESSION['ten_tai_khoan']);
	unset($_SESSION['ten_khach_hang']);
	header('location: login.php');
?>