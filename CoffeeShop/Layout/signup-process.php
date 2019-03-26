<?php 
	session_start();
	if ( isset($_POST['name']) && isset($_POST['username']) && isset($_POST['password']) ) {
		$name = $_POST['name'];
		$username = $_POST['username'];
		$password = $_POST['password'];

		require_once('connectDB.php');

		$sql = "insert into khach_hang(ten_khach_hang, ten_tai_khoan, mat_khau) values ('$name','$username','$password')";
		mysqli_query($con, $sql);

		$sql = "select * from khach_hang where ten_tai_khoan = '$username'";
		$result = mysqli_query($con, $sql);
		while ($KH = mysqli_fetch_array($result)) {
			$_SESSION['ma_khach_hang'] = $KH['ma_khach_hang'];
			$_SESSION['ten_tai_khoan'] = $KH['ten_tai_khoan'];
			$_SESSION['ten_khach_hang'] = $KH['ten_khach_hang'];
		}
		mysqli_close($con);
		header('location: Products.php');
	}
	else
	{
		header('location: signup.php');
	}
?>