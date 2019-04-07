<?php 
	session_start();
	if ( isset($_POST['oldpass']) && isset($_POST['newpass']) && isset($_POST['renewpass'])) {
		$oldpass = $_POST['oldpass'];
		$newpass = $_POST['newpass'];
		$renewpass = $_POST['renewpass'];
		require_once('connectDB.php');
		
		$makh = $_SESSION['ma_khach_hang'];
		$sql = "select * from khach_hang where ma_khach_hang = '$makh'";
		$result = mysqli_query($con, $sql);
		if (mysqli_num_rows($result) == 0) {
			mysqli_close($con);
			# khong tim thay user
			header('location: change-password.php?err=403');
		}
		else {
			#	var_dump($oldpass);die;
			while ($KH = mysqli_fetch_array($result)) {
				if ($oldpass != $KH['mat_khau']) {
				#var_dump($oldpass, $KH['mat_khau']);die;
					mysqli_close($con);
					# mat khau hien tai khong dung
					header('location: change-password.php?err=500');
				}
				else {
					$sql = "update khach_hang SET mat_khau='$newpass' WHERE ma_khach_hang='$makh'";
					$result = mysqli_query($con, $sql);
					if ($result !== TRUE) {
						mysqli_close($con);
						# cap nhat mat khau moi khong thanh cong
						header('location: change-password.php?err=501');
					}
					else {
						mysqli_close($con);
						header('location: change-password.php');
					}
				}
			}
		}
	}
	else {
		# khong thay duoc thong tin de thay doi mat khau
		header('location: change-password.php?err=0');
	}
?>