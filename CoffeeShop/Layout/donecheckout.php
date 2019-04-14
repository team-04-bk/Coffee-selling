<?php 
	session_start();

	require '../PHPMailer/Exception.php';
	require '../PHPMailer/OAuth.php';
	require '../PHPMailer/PHPMailer.php';
	require '../PHPMailer/POP3.php';
	require '../PHPMailer/SMTP.php';
	require 'connectDB.php';

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	$mail = new PHPMailer(true);
	$mail->SMTPDebug = 0;
	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'cskhcoffeeshop@gmail.com';
	$mail->Password = 'admin147258';
	$mail->SMTPSecure = 'tls';
	$mail->Port = 587;

	$ten_khach_hang = $_SESSION['ten_khach_hang'];
	$email = $_SESSION['email'];

	$mail->setFrom('cskhcoffeeshop@gmail.com', 'CSKH Coffee Shop');
	$mail->addAddress($email, $ten_khach_hang);

	$mail->isHTML(true);
	$mail->Subject = 'Thanks for your purchase!';

	$body = '
		<h1>Thông tin đơn hàng</h1>
		<table border="1" cellspacing="0" cellpadding="16" style="text-align: center">
			<tr>
                <th>Tên sản phẩm</th>
                <th>Giá(VND)</th>
                <th>Số lượng</th>
                <th>Số tiền(VND)</th>
            </tr>';

    $tongTien = 0;
    $tongSoLuong = 0;
    foreach ($_SESSION['cart'] as $maSP => $soLuong) {
        $sql = "select * from ca_phe where maSanPham = $maSP";
        $result = mysqli_query($con,$sql);

        while ($SP = mysqli_fetch_array($result)) {
        	$tongSoLuong += $_SESSION['cart'][$SP['maSanPham']];
        	$tongTien += $SP['gia']*$_SESSION['cart'][$SP['maSanPham']];
        	$body.= '
            <tr>
                <td>
                    '.$SP['tenSanPham'].'
                </td>
                <td>
                    '.$SP['gia'].'
                </td>
                <td>
                	'.$_SESSION['cart'][$SP['maSanPham']].'
                </td>
                <td>
                    '.$SP['gia']*$_SESSION['cart'][$SP['maSanPham']].'
                </td>
            </tr>';
        }
    }

    $body .= '
	    	<tr>
	    	    <th colspan="2">
	    	        Tổng
	    	    </th>
	    	    <th>
	    	    	'.$tongSoLuong.'
	    	    </th>
	    	    <th>
	    	        '.$tongTien.'
	    	    </th>
	    	</tr>
    	</table>
    	<table style="text-align: left;">
    	    <tr height="50px">
    	        <th>Thông tin người nhận</th>
    	    </tr>
    	    <tr>
    	        <td>
    	            Họ và tên:
    	        </td>
    	        <td>
    	        	'.$_SESSION['ten_khach_hang'].'
    	        </td>
    	    </tr>
    	    <tr>
    	        <td>
    	            Email:
    	        </td>
    	        <td>
    	            '.$_SESSION['email'].'
    	        </td>
    	    </tr>
    	    <tr>
    	        <td>
    	            Số điện thoại:
    	        </td>
    	        <td>
    	            '.$_SESSION['phone'].'
    	        </td>
    	    </tr>
    	    <tr>
    	        <td>
    	            Địa chỉ:
    	        </td>
    	        <td>
    	            '.$_SESSION['dia_chi'].'
    	        </td>
    	    </tr>
    	</table>
    ';
    // echo $body;
	$mail->Body    = $body;
	mysqli_close($con);
	if (!$mail->send()) {
		echo '<h1>Thất bại!</h1>';
	    echo 'Mailer Error: ' . $mail->ErrorInfo;
	    die;
	} else {
	    echo '<h1>Thành công!</h1>';
	}
?>