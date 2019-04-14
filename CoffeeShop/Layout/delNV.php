<?php 
	if (!isset($_GET['ma_nv'])) {
		header('location: list-employees.php');
	}
	else {
		require 'connectDB.php';
		$ma_nv = $_GET['ma_nv'];
		$sql = "delete from nhan_vien where ma_nhan_vien = $ma_nv";
		if(mysqli_query($con, $sql)) {
			mysqli_close($con);
			header('location: list-employees.php?success');
		}
		else {
			mysqli_close($con);
			header('location: list-employees.php?err');
		}
	}
?>