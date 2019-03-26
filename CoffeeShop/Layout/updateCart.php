<?php
	session_start();
	foreach ($_SESSION['cart'] as $maSP => $soLuong) {
		if (isset($_GET[$maSP])) {
			$_SESSION['cart'][$maSP] = $_GET[$maSP];
		}
	}
	
	header('location: ShopCart.php');
?>