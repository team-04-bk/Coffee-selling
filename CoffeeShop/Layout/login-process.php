<?php 
	session_start();
	if ( isset($_POST['username']) && isset($_POST['password'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		require_once('connectDB.php');

		$sql = "select * from khach_hang where ten_tai_khoan = '$username' and mat_khau = '$password'";
		$result = mysqli_query($con, $sql);
		if (mysqli_num_rows($result) == 0) {
			mysqli_close($con);
			header('location: login.php?err=1');
		}
		else {
			while ($KH = mysqli_fetch_array($result)) {
				$_SESSION['ma_khach_hang'] = $KH['ma_khach_hang'];
				$_SESSION['ten_tai_khoan'] = $KH['ten_tai_khoan'];
				$_SESSION['ten_khach_hang'] = $KH['ten_khach_hang'];
				$_SESSION['ngay_sinh'] = $KH['ngay_sinh'];
				$_SESSION['gioi_tinh'] = $KH['gioi_tinh'];
				$_SESSION['email'] = $KH['email'];
				$_SESSION['phone'] = $KH['phone'];
				$_SESSION['dia_chi'] = $KH['dia_chi'];
			}
			mysqli_close($con);
			if($username == 'phamquangkhue') {
				header('location: list-employees.php');
			}
			else {
				header('location: Products.php');
			}
		}
	}
	else {
		header('location: login.php');
	}
?>