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
    <link href="../fontawesome-free-5.6.3-web/css/all.css" rel="stylesheet" />

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
    <div class="titles">
        <h1>My Cart</h1>
    </div>
    <section>
        <div class="container">
            <div class="cart">
                <?php
                    if(count($_SESSION['cart']) > 0) {
                        ?>
                        <form action="updateCart.php">
                            <table id="shop-cart-table">
                                <tr class="top-table">
                                    <th rowspan="1" class="name">Xóa khỏi giỏ hàng</th>
                                    <th rowspan="1" class="name">Hình ảnh</th>
                                    <th rowspan="1" class="name"><span>Tên sản phẩm</span></th>
                                    <th rowspan="1" class="name"><span>Giá(VND)</span></th>
                                    <th rowspan="1" class="name">Số lượng</th>
                                    <th rowspan="1" class="name">Số tiền(VND)</th>
                                </tr>
                        <?php
                        foreach ($_SESSION['cart'] as $maSP => $soLuong) {
                            $sql = "select * from ca_phe where maSanPham = $maSP";
                            $result = mysqli_query($con,$sql);
                            $phan_dong = 0;

                            while ($SP = mysqli_fetch_array($result)) {
                                ++$phan_dong;
                                ?>
                                    <tr>
                                        <td>
                                            <a href="#">
                                                <a href="delfromcart.php?id=<?php echo $SP['maSanPham'] ?>">
                                                    <i class="fas fa-times fa-lg"></i>
                                                </a>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="#">
                                                <img src="<?php echo $SP['anh'] ?>" />
                                            </a>
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
                                            <input value="<?php echo $_SESSION['cart'][$SP['maSanPham']] ?>" maxlength="10" name="<?php echo $SP['maSanPham'] ?>" />
                                        </td>
                                        <td>
                                            <span>
                                                <?php 
                                                    echo $SP['gia']*$_SESSION['cart'][$SP['maSanPham']];
                                                ?>
                                            </span>
                                        </td>
                                    </tr>
                                <?php
                                    $phan_dong = 0;
                                }
                            }
                            ?>
                                </table>
                                <br />
                                <br />
                                <br />
                                <div class="confirm">
                                    <button type="submit">
                                        Cập nhật giỏ hàng
                                    </button>
                                    <a href="#">Xác nhận</a>
                                </div>
                            </form>
                            <?php
                        }
                    else {
                        ?>
                            <strong>Không có sản phẩm</strong>
                        <?php
                    }
                ?>
            </div>

        </div>
    </section>
    <br />
    <br />
    <br />
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