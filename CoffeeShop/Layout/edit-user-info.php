﻿<?php 
	session_start();
	if (isset($_GET['err'])){
		$ret = $_GET['err'];
	}
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
            <a href="index.php" class="logo"><img src="../Image/LogoSample_ByTailorBrands.jpg" /></a>
            <div class="search-box">
                <input class="search-txt" type="text" placeholder="Tìm sản phẩm" />
                <a class="search-btn" style="text-decoration:none;" href="#"><i class="fas fa-search fa-lg"></i></a>
            </div>
            <div class="shop-cart">
                <a class="shop-btn" href="#"><i class="fas fa-shopping-cart fa-lg"></i></a>
            </div>
            <nav>

                <ul>
                    <li><a href="index.php">Trang chủ</a></li>
                    <li><a href="Products.php">Sản phẩm</a></li>
                    <li><a href="ShopCart.php">Giỏ hàng</a></li>
                    <li><a href="About.php">Giới thiệu</a></li>
                    <li><a href="userinfo.php">Thông tin</a></li>

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
    <h1 class="page">Thay đổi thông tin</h1>
    <div id="edit">
	
	<form action="editinfo-process.php" id="formep" method="POST">
        <div class="row-edit">
            <div class="row-left">Họ tên</div>
            <div class="row-right">
                <input type="text" name = "name" id = "idname" placeholder="Nhập họ tên" />
            </div>
        </div>
        <div class="row-edit">
            <div class="row-left">Ngày sinh</div>
            <div class="row-right">
                <input type="datetime" name = "birth" id = "idbirth" placeholder="Nhập ngày sinh" />
            </div>
        </div>
        <div class="row-edit">
            <div class="row-left">Giới tính</div>
            <div class="row-right">
                <input type="text" name = "sex" id = "idsex" placeholder="Nhập giới tính" />
            </div>
        </div>
        <div class="row-edit">
            <div class="row-left">E-mail</div>
            <div class="row-right">
                <input type="email" name = "mail" id = "idmail" placeholder="Nhập e-mail" />
            </div>
        </div>
        <div class="row-edit">
            <div class="row-left">Điện thoại</div>
            <div class="row-right">
                <input type="tel" name = "phone" id = "idphone" placeholder="Nhập số điện thoại" />
            </div>
        </div>
        <div class="row-edit">
            <div class="row-left">Địa chỉ</div>
            <div class="row-right">
                <input type="address" name = "add" id = "idadd" placeholder="Nhập địa chỉ" />
            </div>
        </div>
		
		<?php  
		if ( isset($ret)) {
			?>
			
        <div class="row-edit">
			<div class="row-left">
			</div>
			<div class="row-right">
				<?php
				switch ($ret) {
					case 500:				
						?>
						<label><font color="red"><b>Có lỗi:</b></font> <i>Cập nhật thông tin người dùng không thành công</i></label>
					<?php
						break;
					case 403:
						?>
						<label><font color="red"><b>Có lỗi:</b></font> <i>Không tìm thấy thông tin người dùng</i></label>
					<?php
						break;
					case 200:
						?>
						<label><font color="blue"><b>Thành công:</b></font> <i>Cập nhật thông tin người dùng thành công</i></label>
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
		</div>
		
        <div class="row-edit">
            <div class="confirm-1"><input type="button" value="Cập nhật" onclick="edit_info()"></div>
        </div>
	</form>
        <div class="row-edit">
            <div class="confirm-1"><a href="change-password.php"><input type="submit" value="Đổi mật khẩu" /></a></div>
        </div>
		
    </div>
		
	<script type="text/javascript">
		function edit_info()
		{
			document.getElementById('formep').submit();
		}
	</script>

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
</body>
</html>