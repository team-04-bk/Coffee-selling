<?php 
    session_start();
    require 'connectDB.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Coffee Admin</title>
    <link href="../css/Style.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
</head>
<body>
    <header>
        <div class="admin-top-bar">
            <div class="nav">
                <a href="#" class="logo"><img src="../Image/LogoSample_ByTailorBrands.jpg" /></a>
                <div class="search-box">
                    <input class="search-txt" type="text" placeholder="Tìm kiếm..." />
                    <a class="search-btn" style="text-decoration:none;" href="#"><i class="fas fa-search fa-lg"></i></a>
                </div>

                <nav>

                    <ul>
                        <li><a href="user-info.php">Danh sách khách hàng</a></li>
                        <li><a href="list-employees.php">Danh sách nhân viên</a></li>
                        <li><a href="list-products.php">Danh sách sản phẩm</a></li>

                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <h1 class="page">Danh sách nhân viên</h1>
    <h3 style="text-align: center; color: red">
        <?php 
            if(isset($_GET['success'])) {
                echo "Thành công!";
            }
            else if(isset($_GET['err'])) {
                echo "Đã có lỗi xảy ra!";
            }
        ?>
    </h3>
    <div class="cart">
        <table id="shop-cart-table">
            <thead>
                <tr class="top-table">
                    <th rowspan="1" class="name">Tên nhân viên</th>
                    <th rowspan="1" class="name">Chức vụ</th>
                    <th rowspan="1" class="name">Hình ảnh</th>
                    <th rowspan="1" class="name"><span>Số điện thoại</span></th>
                    <th rowspan="1" class="name"><span>Số công</span></th>
                    <th rowspan="1" class="name">Số tiền mỗi công(VND)</th>
                    <th rowspan="1" class="name">Tiền lương(VND)</th>
                    <th rowspan="1" class="name">Thanh toán</th>
                    <th rowspan="1" class="name">Xóa khỏi danh sách</th>

                </tr>
            </thead>
            <tbody>
                <?php 
                    $sql = "select * from nhan_vien";
                    $result = mysqli_query($con, $sql);
                    while ($nhan_vien = mysqli_fetch_array($result)) {
                        ?>
                            <tr>
                                <td>
                                    <span>
                                        <?= $nhan_vien['ten_nhan_vien'] ?>
                                    </span>
                                </td>
                                <td>
                                    <span>
                                        <?= $nhan_vien['chuc_vu']==1? "Nhân viên":"Tạp vụ" ?>
                                    </span>
                                </td>
                                <td style="padding:0 15px 0 15px;">
                                    <br />
                                    <a href="#"><img src="<?= $nhan_vien['hinh_anh'] ?>" /></a>
                                    <br />
                                    <br />
                                </td>
                                <td>
                                    <span>
                                        <?= $nhan_vien['so_dien_thoai'] ?>
                                    </span>
                                <td>
                                    <span>
                                        <?= $nhan_vien['so_cong'] ?>
                                    </span>
                                    <br />
                                    <br />
                                    <a href="#">Xem chi tiết số công</a>
                                </td>
                                <td>
                                    <span>
                                        <?= number_format($nhan_vien['so_tien_moi_cong'],0,0,'.') ?>
                                    </span>
                                </td>

                                <td>
                                    <span>
                                        <?= number_format($nhan_vien['tien_luong'],0,0,'.') ?>
                                    </span>
                                </td>
                                <td>
                                    <input type="checkbox" checked />
                                    <br />
                                    <!-- <a href="#">Cập nhật</a> -->
                                </td>
                                <td>
                                    <a href="delNV.php?ma_nv=<?= $nhan_vien['ma_nhan_vien'] ?>">
                                        <i class="fas fa-times fa-lg"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php
                    }
                ?>
        </table>
        
    </div>
    
    <div class="update">
        <div class="confirm">
            <a href="#">Xác nhận</a>
        </div>
    </div>
    <footer style="background:#fff; border-top:1px solid #000;">

        <div id="admin-foot">
            <img src="../Image/LogoSample_ByTailorBrands1.jpg" />
            <div class="coppy-right" style="border-top:1px solid #000;">Copyright © 2019 . All rights reserved.</div>
        </div>
    </footer>

</body>
</html>