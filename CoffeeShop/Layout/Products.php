<?php
    session_start();
    require_once('connectDB.php');
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

    <h1 class="page">Các sản phẩm </h1>

    <section class="container">
        <ul class="product-gallery">
        <?php 
            $sql = "select * from ca_phe";
            $result = mysqli_query($con,$sql);
            $phan_dong = 0;
            while ($SP = mysqli_fetch_array($result)) {
                ++$phan_dong;
                ?>
                    <li>
                        <img src="<?php echo $SP['anh'] ?>" />
                        <div class="product-infomation">
                            <h4>
                                <?php echo $SP['tenSanPham'] ?>
                            </h4>
                            <span>
                                <?php echo $SP['gia'] ?>
                             VND</span>
                        </div>
                        <div class="product-description">
                            <p>
                                <?php echo $SP['moTa'] ?>
                            </p>
                            <a href="addtocart.php?id=<?php echo $SP['maSanPham'] ?>" class="buy">
                                Mua
                            </a>
                        </div>
                    </li>
                <?php
                if($phan_dong == 3)
                {
                    ?>
                            </ul>
                        </section>
                        <section class="container">
                            <ul class="product-gallery">
                    <?php
                    $phan_dong = 0;
                }
            }
        ?>
        </ul>
    </section>

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
    <?php 
        mysqli_close($con);
    ?>
</body>
</html>
