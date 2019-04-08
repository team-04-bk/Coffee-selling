<?php 
	session_start();
	if (isset($_GET['err'])){
		$ret = $_GET['err'];
	}
	#var_dump($ret);die;
?>
	
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Coffe</title>
    <link href="../css/Style.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
</head>
<body>
    <header>
        <div class="top-bar">
            <a href="index.html" class="logo"><img src="../Image/LogoSample_ByTailorBrands.jpg" /></a>
            <div class="search-box">
                <input class="search-txt" type="text" placeholder="Tìm sản phẩm" />
                <a class="search-btn" style="text-decoration:none;" href="#"><i class="fas fa-search fa-lg"></i></a>
            </div>
            <div class="shop-cart">
                <a class="shop-btn" href="#"><i class="fas fa-shopping-cart fa-lg"></i></a>
            </div>
            <nav>

                <ul>
                    <li><a href="index.html">Trang chủ</a></li>
                    <li><a href="Products.html">Sản phẩm</a></li>
                    <li><a href="ShopCart.html">Giỏ hàng</a></li>
                    <li><a href="About.html">Giới thiệu</a></li>
                    
                    <li>
                        <?php  
                            if ( isset($_SESSION['ma_khach_hang'])) {
                                ?>
                                    <a href="logout.php">Đăng xuất</a>
                                <?php
                            }
                            else {
                                ?>
                                    <a href="login.php">Đăng nhập</a>
                                <?php
                            }
                        ?>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <h1 class="page">Thay đổi mật khẩu</h1>
    <div id="edit">
	<form action="changepass-process.php" id="formcp" method="POST">
        <div class="row-edit">
            <div class="row-left">Nhập mật khẩu hiện tại</div>
            <div class="row-right">
                <input type="password" name = "oldpass" id = "old" placeholder="Nhập mật khẩu hiện tại">
            </div>
        </div>
        <div class="row-edit">
            <div class="row-left">Nhập mật khẩu mới</div>
            <div class="row-right">
                <input type="password" name = "newpass" id = "new" placeholder="Nhập mật khẩu mới">
            </div>
        </div>
        <div class="row-edit">
            <div class="row-left">Nhập lại mật khẩu mới</div>
            <div class="row-right">
                <input type="password" name = "renewpass" id = "renew" placeholder="Nhập lại mật khẩu mới"><br>
				<label id="info" class="cyellow bold"></label>
				<br>
            </div>
			
        </div>
		<?php  
		if ( isset($ret)) {
			?>
			<div class="row-left">
			</div>
			<div class="row-right">
				<?php
				switch ($ret) {
					case 500:				
						?>
						<label><font color="red"><b>Có lỗi:</b></font> <i>Mật khẩu hiện tại không chính xác</i></label>
					<?php
						break;
					case 403:
						?>
						<label><font color="red"><b>Có lỗi:</b></font> <i>Không tìm thấy thông tin người dùng</i></label>
					<?php
						break;
					case 501:
						?>
						<label><font color="red"><b>Có lỗi:</b></font> <i>Cập nhật mật khẩu mới không thành công</i></label>
					<?php
						break;
					case 200:
						?>
						<label><font color="blue"><b>Thành công:</b></font> <i>Cập nhật mật khẩu mới thành công</i></label>
					<?php
						break;
					default:
						?>
						<label><font color="red"><b>Có lỗi:</b></font> <i>Không lấy được thông tin người dùng</i></label>
				<?php
				}	
				?>
			</div>
			<?php
		}
		?>
			
        <div class="row-edit">
            <div class="confirm-1"><input type="button" value="Xác nhận" onclick="change_pass()"></div>
        </div>
	</form>
	
    </div>
    <footer>

        <div class="row">
            <div class="col">
                <img src="../Image/LogoSample_ByTailorBrands.jpg" />
            </div>

            <div class="col">
                <h3>HỖ TRỢ</h3>
                <h4>Số điện thoại:0123456789</h4>
            </div>

            <div class="col">
                <h3>ĐỊA CHỈ</h3>
                <h4>17 Giải Phóng, Hai Bà Trưng, Hà Nội</h4>
                <h4>95 Cao Thắng, Quận 3, Hồ Chí Minh</h4>

                <h4>hello@demo.com</h4>
            </div>
        </div>

        <div class="coppy-right">Copyright © 2019 . All rights reserved.</div>
    </footer>
	
	
	<script type="text/javascript">
		function change_pass()
		{
			var oldlen = document.getElementById('old').value.length;
			var newlen = document.getElementById('new').value.length;
			var renewlen = document.getElementById('renew').value.length;
			
			var newpass = document.getElementById('new').value;
			var renewpass = document.getElementById('renew').value;
			if (oldlen == 0 || newlen == 0 || renewlen == 0) {
				document.getElementById('info').innerHTML = "<font color=\"red\"><i>Vui lòng điền đầy đủ thông tin</i></font>";
			}
			else {	
				if(newpass != renewpass){
					document.getElementById('info').innerHTML = "Mật khẩu mới không khớp";
				}
				else {
					document.getElementById('info').innerHTML = "";
					document.getElementById('formcp').submit();
				}
			}
		}
	
	</script>
</body>
</html>