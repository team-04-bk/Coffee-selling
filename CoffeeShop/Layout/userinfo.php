<?php
    session_start();
    require_once('connectDB.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Coffee Admin</title>
    <link href="../css/style1.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
</head>
<body>
    <header>
        <div class="top-bar">
            <a href="#" class="logo"><img src="../Image/LogoSample_ByTailorBrands.jpg" /></a>
            <div class="search-box">
                <input class="search-txt" type="text" placeholder="Tìm sản phẩm" />
                <a class="search-btn" style="text-decoration:none;" href="#"><i class="fas fa-search fa-lg"></i></a>
            </div>
            <div class="shop-cart">
                <a class="shop-btn" href="ShopCart.php"><i class="fas fa-shopping-cart fa-lg"></i></a>
            </div>
            <nav>

                <ul>
                    <li><a href="index.php">Trang chủ</a></li>
                    <li><a href="Products.php">Sản phẩm</a></li>
                    <li><a href="ShopCart.php">Giỏ hàng</a></li>
                    <li><a href="About.php">Giới thiệu</a></li>
                    <li><a href="logout.php">Đăng xuất</a></li>
                    <li><a href="edit-user-info.php">Chỉnh sửa</a></li>
                        
    <div id="wrap">
        <div class="container">
            <div id="myheader" class="col-md-12">
                <div id="avatar">
                    <img src="../css/avatar.jpg" alt="avatar">
                    <h3>
                        <?php echo $_SESSION['ten_khach_hang'] ?>
                    </h3>
                </div>
            </div>
            <div id="innerwrap">
                <div id="sidebar">
                    <div id="navibar">
                        <ul>
                            <li>Số điện thoại: <?php echo $_SESSION['phone'] ?></li>
                            <li>Năm sinh: <?php echo $_SESSION['ngay_sinh'] ?></li>
                            <li>Nơi ở hiện tại: <?php echo $_SESSION['dia_chi'] ?></li>
                            <li>Email: <?php echo $_SESSION['email'] ?></li>                            
                        </ul>
                    </div>
                </div> 
            </div>
        </div>
    </div>

</body>
</html>