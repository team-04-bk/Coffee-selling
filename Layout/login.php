<?php 
	session_start();
	if (isset($_SESSION['ma_khach_hang'])) {
		header('location: Products.php');
	}
?>

<!DOCTYPE html>
<html lang="en" >

<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../css/style2.css">
	<link rel="stylesheet" type="text/css" href="../css/duc.css">
	<title>Login</title>
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
</head>

<body style="overflow: hidden;">
	<div class="body"></div>
	<div class="grad"></div>
	<div class="header">
		<div>Name<span>Coffee</span></div>
	</div>
	<br>
	<div class="login">
		<form action="login-process.php" id="form" method="POST">
			<input type="text" placeholder="username" name="username" id="user"><br>
				<label id="errUser" class="cyellow bold"></label>
			<br>
			<input type="password" placeholder="password" name="password" id="password"><br>
				<label id="errPassword" class="cyellow bold"></label>
			<br>
			<input type="button" value="Login" onclick="validate()">
			<input type="button" value="Sign up">
		</form>
	</div>
	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

	<script type="text/javascript">
		function validate()
		{
			var userLength = document.getElementById('user').value.length;
			var passwordLength = document.getElementById('password').value.length;

			if (userLength == 0) {
				document.getElementById('errUser').innerHTML = "Vui lòng điền tên đăng nhập";
			}
			else {
				document.getElementById('errUser').innerHTML = "";
			}
			if(passwordLength == 0){
				document.getElementById('errPassword').innerHTML = "Vui lòng điền mật khẩu";
			}
			else {
				document.getElementById('errPassword').innerHTML = "";
			}
			if (passwordLength != 0 && userLength != 0) {
				document.getElementById('form').submit();
			}
		}
	</script>
</body>

</html>
