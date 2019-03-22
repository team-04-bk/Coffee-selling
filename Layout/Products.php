﻿<?php
    session_start();
    require_once('connectDB.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Coffe</title>
    <link href="../css/Style.css" rel="stylesheet" />
    <link href="../fontawesome-free-5.6.3-web/css/all.css" rel="stylesheet" />
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
                    <li><a href="#">Trang chủ</a></li>
                    <li><a href="Products.php">Sản phẩm</a></li>
                    <li><a href="#">Chi nhánh</a></li>
                    <li><a href="#">Giới thiệu</a></li>
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
        <h2>Chào mừng</h2>

        <div>

            <h4>Địa chỉ:1 HBT-HN</h4>
        </div>
    </footer>
    <?php 
        mysqli_close($con);
    ?>
</body>
</html>