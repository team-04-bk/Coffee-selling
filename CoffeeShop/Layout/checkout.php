<?php
    session_start();
    require_once('connectDB.php');
    if(!isset($_SESSION['cart']))
        $_SESSION['cart'] = array();
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
        <div class="">
            <a href="#" class="logo"><img src="../Image/LogoSample_ByTailorBrands.jpg" /></a>
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
    <div class="titles">
        <h1>Thanh toán</h1>
    </div>
    <section>
        <div class="container">
            <div class="cart">
                <form action="updateCart.php">
                    <table id="shop-cart-table">
                        <tr class="top-table">
                            <th class="name">Hình ảnh</th>
                            <th class="name"><span>Tên sản phẩm</span></th>
                            <th class="name"><span>Giá(VND)</span></th>
                            <th class="name">Số lượng</th>
                            <th class="name">Số tiền(VND)</th>
                        </tr>
                    <?php
                    $tongTien = 0;
                    $tongSoLuong = 0;
                    foreach ($_SESSION['cart'] as $maSP => $soLuong) {
                        $sql = "select * from ca_phe where maSanPham = $maSP";
                        $result = mysqli_query($con,$sql);

                        while ($SP = mysqli_fetch_array($result)) {
                            ?>
                            <tr>
                                <td>
                                    <img src="<?php echo $SP['anh'] ?>" />
                                </td>
                                <td>
                                    <h3>
                                        <?php echo $SP['tenSanPham'] ?>
                                    </h3>
                                </td>
                                <td>
                                    <span>
                                        <?php echo $SP['gia'] ?>
                                    </span>
                                </td>
                                <td>
                                    <?php
                                        echo $_SESSION['cart'][$SP['maSanPham']];
                                        $tongSoLuong += $_SESSION['cart'][$SP['maSanPham']];
                                    ?>
                                </td>
                                <td>
                                    <span>
                                        <?php 
                                            echo $SP['gia']*$_SESSION['cart'][$SP['maSanPham']];
                                            $tongTien += $SP['gia']*$_SESSION['cart'][$SP['maSanPham']];
                                        ?>
                                    </span>
                                </td>
                            </tr>
                        <?php
                        }
                    }
                    ?>
                        <tr>
                            <th colspan="3">
                                Tổng
                            </th>
                            <th>
                                <?= $tongSoLuong ?>
                            </th>
                            <th>
                                <?= $tongTien ?>
                            </th>
                        </tr>
                        </table>
                        <br>

                        <table style="text-align: left; margin: 0 auto;">
                            <tr>
                                <th>Thông tin người nhận</th>
                            </tr>
                            <tr>
                                <td>
                                    Họ và tên:
                                </td>
                                <td>
                                    <?= $_SESSION['ten_khach_hang'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Email:
                                </td>
                                <td>
                                    <?= $_SESSION['email'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Số điện thoại:
                                </td>
                                <td>
                                    <?= $_SESSION['phone'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Địa chỉ:
                                </td>
                                <td>
                                    <?= $_SESSION['dia_chi'] ?>
                                </td>
                            </tr>
                        </table>
                        <br />
                        <br />
                        <br />
                        <div class="confirm">
                            <a href="donecheckout.php">Hoàn tất</a>
                        </div>
                    </form>
            </div>
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
