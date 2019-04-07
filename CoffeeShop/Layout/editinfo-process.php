<?php 
	session_start();
	if ( isset($_POST['name']) && isset($_POST['birth']) && isset($_POST['sex']) && isset($_POST['mail']) && isset($_POST['phone']) && isset($_POST['add'])) {
		$name = $_POST['name'];
		$birth = $_POST['birth'];
		$sex = $_POST['sex'];
		$mail = $_POST['mail'];
		$phone = $_POST['phone'];
		$add = $_POST['add'];
		#var_dump($name);die;
		require_once('connectDB.php');
		
		$makh = $_SESSION['ma_khach_hang'];
		$sql = "select * from khach_hang where ma_khach_hang = '$makh'";
		$result = mysqli_query($con, $sql);
		if (mysqli_num_rows($result) == 0) {
			mysqli_close($con);
			# khong tim thay user
			header('location: edit-user-info.php?err=403');
		}
		else {
			while ($KH = mysqli_fetch_array($result)) {
				#var_dump($KH);die;
				$sql = "update khach_hang SET ten_khach_hang='$name', ngay_sinh = '$birth', gioi_tinh = '$sex', email = '$mail', phone = '$phone', dia_chi = '$add' WHERE ma_khach_hang='$makh'";
				#var_dump($sql);die;
				$result = mysqli_query($con, $sql);
				if ($result !== TRUE) {
					mysqli_close($con);
					# cap nhat thong tin user khong thanh cong
					header('location: edit-user-info.php?err=500');
				}
				else {
					mysqli_close($con);
					header('location: edit-user-info.php');
				}
			}
		}
	}
	else {
		# khong lay duoc thong tin de update
		header('location: change-password.php?err=0');
	}
?>