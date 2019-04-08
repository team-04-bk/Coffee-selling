?<?php
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
            <a href="index.html" class="logo"><img src="../Image/LogoSample_ByTailorBrands.jpg" /></a>
            <div class="search-box">
                <input class="search-txt" type="text" placeholder="Tìm sản phẩm" />
                <a class="search-btn" style="text-decoration:none;" href="#"><i class="fas fa-search fa-lg"></i></a>
            </div>
            <div class="shop-cart">
                <a class="shop-btn" href="ShopCart.html"><i class="fas fa-shopping-cart fa-lg"></i></a>
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
                                    <a href="userinfo.php">Thông tin</a>
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
    <section id="about">
        <br />
        <div class="about-name"><h2><i class="fab fa-diaspora"></i> VỀ CHÚNG TÔI</h2></div>
        <br />
        <div id="about-content">
            <div id="about-content-img"><img src="../Image/image-2.jpg" /> </div>
            <div id="about-content-l">
                <br />
                <br />
                <br />
                <br />
                <br />
                <p>
                <span>CHẤT LƯỢNG CÀ PHÊ TUYỆT HẢO</span>
                    <br />
                    <br />
                    Chúng tôi muốn tạo ra dấu ấn khác biệt cho cà phê Việt Nam bằng sự tử tế và cẩn trọng.
                    <br />
                    Chúng tôi ươm mầm, chăm dưỡng kỹ lưỡng cây cà phê dưới các chuẩn mực khắt khe để đưa ra thị trường những thành phẩm tuyệt vời nhất.
                    <br />
                    Chúng tôi muốn góp phần tạo nên những thay đổi bền vững cho ngành cà phê Việt Nam.
                </p>
            </div>
        </div>
    </section>


    <<section id="list-store">
        <br />
        <br />
        <div class="about-name">
            <h2><i class="fab fa-diaspora"></i> DANH SÁCH CỬA HÀNG</h2>
        </div>
        <div class="list-single-store">
            <h3><i class="fas fa-map-marker-alt"></i> HÀ NỘI</h3>
            <h4>17 Giải Phóng, Hai Bà Trưng, Hà Nội</h4>
        </div>
        <div class="list-single-store">
            <h3><i class="fas fa-map-marker-alt"></i> HỒ CHÍ MINH</h3>
            <h4>95 Cao Thắng, Quận 3, Hồ Chí Minh</h4>
        </div>

    </section>
    <br />
    <br />
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
                <h4>95 Cao Thắng, Quận3, Hồ Chí Minh</h4>

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