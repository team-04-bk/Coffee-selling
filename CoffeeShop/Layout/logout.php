<?php 
	session_start();
	unset($_SESSION['ma_khach_hang']);
	unset($_SESSION['ten_tai_khoan']);
	unset($_SESSION['ten_khach_hang']);
	unset($_SESSION['ngay_sinh']);
	unset($_SESSION['gioi_tinh']);
	unset($_SESSION['email']);
	unset($_SESSION['phone']);
	unset($_SESSION['dia_chi']);
	header('location: login.php');
?>