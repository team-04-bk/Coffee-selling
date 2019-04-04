?<?php
    session_start();
    require_once('connectDB.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Coffee </title>
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

    <section class="content">
        <br />
        <div class="banner-name"><h2><i class="fab fa-diaspora"></i> Hành trình từ nông trại đến ly cà phê</h2></div>
        <br />
        <div class="banner">
            <div id="banner-img">
                <img src="../Image/coffea-coffee-coffee-beans-92354.jpg" />
            </div>
            <div id="content">
                <br />

                <p>
                    <br />

                    Có bao giờ bạn tự hỏi, ly cà phê thơm ngát trên tay mình đã trải qua những chặng đường nào?
                    <br />
                    Khi nhân viên phục vụ mang đến cho bạn một ly cà phê, đó chỉ là hành động cuối cùng của một hành trình dài và kỳ diệu: từ việc chọn vùng đất hợp thổ nhưỡng, sàng lọc giống, tới trồng cây, chăm bón và thu hái.
                    <br />
                    Tại trang trại của mình chúng tôi gieo nên không chỉ những giống cà phê chọn lọc, mà cả một ước mơ lớn: đem cà phê Việt Nam chất lượng cao chinh phục tín đồ cà phê trên toàn thế giới.
                    <br />
                    Ở đây, chúng tôi sát cánh làm việc với từng nông hộ, kiểm soát các tiêu chuẩn của quá trình chăm bón; tỉ mẩn trong các khâu sơ chế, rang, pha... để gửi đến khách hàng ly cà phê tốt nhất.
                </p>
            </div>

        </div>
    </section>
    <section class="content">
        <div class="banner-name"><h2><i class="fab fa-diaspora"></i> Sản phẩm của chúng tôi</h2></div>
        <br />
        <div id="go-to-product">

            <div id="product-intro">
                <p>
                    <br />
                    Chúng tôi muốn tạo ra dấu ấn khác biệt cho cà phê Việt Nam bằng sự tử tế và cẩn trọng.
                    <br />
                    Chúng tôi ươm mầm, chăm dưỡng kỹ lưỡng cây cà phê dưới các chuẩn mực khắt khe để đưa ra thị trường những thành phẩm tuyệt vời nhất.
                    <br />
                    Chúng tôi muốn góp phần tạo nên những thay đổi bền vững cho ngành cà phê Việt Nam.
                    <br />
                </p>
                <div id="go-to-product-btn">
                    <a href="Products.html">Xem thêm<i class="fas fa-chevron-circle-right"></i></a>
                </div>
            </div>
            <div id="go-to-product-img"><img src="../Image/coffee_banner.jpg" /></div>

        </div>

    </section>
    <br />
    <br />
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