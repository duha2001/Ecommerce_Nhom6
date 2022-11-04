<?php
session_start();
include('../admin/config.php');
include('./mail/sendmail.php');
require('../admin/carbon/autoload.php');
require_once('config_vnpay.php');

use Carbon\Carbon;
use Carbon\CarbonInterval;

$now = Carbon::now('Asia/Ho_Chi_Minh');
$id_khachhang = $_SESSION['id_dangky'];
$code_order = rand(0, 9999);
$cart_payment = $_POST['payment'];
//lay id thong tin van chuyen
$sql_get_vanchuyen = mysqli_query($conn, "SELECT * FROM tbl_shipping WHERE id_dangky='$id_khachhang' LIMIT 1");
$row_get_vanchuyen = mysqli_fetch_array($sql_get_vanchuyen);
$id_shipping = $row_get_vanchuyen['id_shipping'];
$tongtien = 0;
foreach ($_SESSION['cart'] as $key => $value) {
    $thanhtien = $value['soluong'] * $value['giakhuyenmai'];
    $tongtien += $thanhtien;
}


if ($cart_payment == 'tienmat') {
    //insert vào đơn hàng
    $insert_cart = "INSERT INTO tbl_cart(id_khachhang,code_cart,cart_status,cart_date,cart_payment,cart_shipping) VALUE('" . $id_khachhang . "','" . $code_order . "',1,'" . $now . "','" . $cart_payment . "','" . $id_shipping . "')";
    $cart_query = mysqli_query($conn, $insert_cart);
    //them don hàng chi tiet
    foreach ($_SESSION['cart'] as $key => $value) {
        $id_sanpham = $value['id'];
        $soluong = $value['soluong'];
        $insert_order_details = "INSERT INTO tbl_cart_details(id_sanpham,code_cart,soluongmua) VALUE('" . $id_sanpham . "','" . $code_order . "','" . $soluong . "')";
        mysqli_query($conn, $insert_order_details);
    }

    $name = $_POST['name'];
    $mail = $_SESSION['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $note = $_POST['note'];

    $tieude = "Đặt hàng website ADHK Mobile thành công!";
    $noidung .= "<p>Xin Chào $name</p>";
    $noidung .= "<p>Cảm ơn Anh/chị đã đặt hàng tại ADHK Mobile</p>";
    $noidung .= 'Đơn hàng của Anh/chị đã được tiếp nhận, chúng tôi sẽ nhanh chóng liên hệ với Anh/chị.';
    $noidung .= "<h4>THÔNG TIN KHÁCH HÀNG:</h4>";
    $noidung .= '<p>
    <b>Khách Hàng: </b>' . $name . '<br/>
    <b>Email: </b>' . $mail . '<br/>
    <b>Số điện thoại: </b>' . $phone . '<br/>
    <b>Địa chỉ nhận hàng: </b>' . $address . '<br/>
    <b>Ghi chú: </b>' . $note . '<br/>
    <b>Thông tin đơn hàng:</b> #' . $code_order . '<br/>
    <b>	Phương thức thanh toán: </b> Thanh toán khi giao hàng (COD) <br/>
    <b>	Phương thức vận chuyển: </b> Giao hàng tận nơi <br/>
    <b> Ngày đặt hàng: </b>' . date("d/m/Y") . '
    </p>';
    $noidung .= "<h4>HOÁ ĐƠN ĐIỆN TỬ CỦA QUÝ KHÁCH:</h4>";

    //Danh sách sản phẩm đã mua
    $noidung .= '<table style="font-family: arial, sans-serif;
                        border-collapse: collapse;
                        width: 100%;">
                        <thead>
                            <tr>
                            <th style="border: 1px solid #dddddd;
                            text-align: left;
                            padding: 8px;" scope="col">STT</th>
                            <th style="border: 1px solid #dddddd;
                                text-align: left;
                                padding: 8px;" scope="col">HÌNH ẢNH</th>
                                <th style="border: 1px solid #dddddd;
                                text-align: left;
                                padding: 8px;" scope="col">THÔNG TIN SẢN PHẨM</th>
                                <th style="border: 1px solid #dddddd;
                                text-align: left;
                                padding: 8px;" scope="col">ĐƠN GIÁ</th>
                                <th style="border: 1px solid #dddddd;
                                text-align: left;
                                padding: 8px;" scope="col">SỐ LƯỢNG</th>
                                <th style="border: 1px solid #dddddd;
                                text-align: left;
                                padding: 8px;" scope="col">THÀNH TIỀN</th>
                            </tr>
                        </thead>
                        <tbody>';
    $totalPriceAll = 0;
    $i = 0;
    foreach ($_SESSION['cart'] as $key => $val) {
        $totalPrice = $val['giakhuyenmai'] * $val['soluong'];
        $i++;

        $noidung .= '<tr>
        <td style="border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;">' . $i . ' </td>
        <td style="border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;">                        <center>
        <img src="' . $val['img_avatar'] . '" width="150px">
    </center></td>
                            <td style="border: 1px solid #dddddd;
                            text-align: left;
                            padding: 8px;">' . $val['tensanpham'] . ' </td>
                            <td style="border: 1px solid #dddddd;
                            text-align: left;
                            padding: 8px;">' . number_format($val['giakhuyenmai'], 0, ',', '.') . ' VNĐ' . '</td>
                            <td style="border: 1px solid #dddddd;
                            text-align: left;
                            padding: 8px;">' . $val['soluong'] . '</td>
                            <td style="border: 1px solid #dddddd;
                            text-align: left;
                            padding: 8px;">' . number_format($totalPrice) . ' VNĐ' . '</td>
                            </tr>';
        $totalPriceAll += $totalPrice;
    }

    $noidung .= '<tr>
    <td colspan="3" style="border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;color: green;">Đơn hàng của bạn được Miễn phí
ship</td>
                <td style="border: 1px solid #dddddd;
                text-align: left;
                padding: 8px; color: red;" colspan="2">TỔNG GIÁ TRỊ HOÁ ĐƠN</td>

       

                <td style="border: 1px solid #dddddd;
                text-align: left;
                padding: 8px; color: red;" colspan="1">' . number_format($totalPriceAll) . ' VNĐ' . '</td>
            </tr>
        </tbody>
    </table>';
    $noidung .= "<br/>";
    $noidung .= '<div class="symple-box yellow center " style="background: #219ebc; border-radius: 2px; border: 1px solid #264653; box-sizing: border-box; color: #264653; float: none; font-family: Arial, sans-serif; font-size: 15px; margin: 0px auto; outline: 0px; padding: 15px 20px; vertical-align: baseline;"><strong style="background: transparent; border: 0px; box-sizing: initial; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;">Quý khách đã đặt hàng thành công</strong>:
        <ul style="background: transparent; border: 0px; box-sizing: initial; margin: 0px 0px 20px 20px; outline: 0px; padding: 0px; vertical-align: baseline;">
        <li style="background: transparent; border: 0px; box-sizing: initial; list-style: disc; margin: 5px 0px; outline: 0px; padding: 0px; vertical-align: baseline;">Lưu và chụp hình hoá đơn điện tử này để bảo hành và đổi trả</li>
        <li style="background: transparent; border: 0px; box-sizing: initial; list-style: disc; margin: 5px 0px; outline: 0px; padding: 0px; vertical-align: baseline;">Hoá đơn đặt hàng của quý khách đã được gửi đến địa chỉ Email hoặc vào trang Thông tin khách hàng để xem chi tiết</li>
        <li style="background: transparent; border: 0px; box-sizing: initial; list-style: disc; margin: 5px 0px; outline: 0px; padding: 0px; vertical-align: baseline;">Đơn hàng của quý khách sẽ được vận chuyển đến tay Quý khách trong sau thời gian 2 đến 3 ngày làm việc tính từ thời điểm này.</li>
        <li style="background: transparent; border: 0px; box-sizing: initial; list-style: disc; margin: 5px 0px; outline: 0px; padding: 0px; vertical-align: baseline;">Nhân viên giao hàng sẽ liên hệ với số điện thoại trước khi giao hàng 24 tiếng</li>
        <li style="background: transparent; border: 0px; box-sizing: initial; list-style: disc; margin: 5px 0px; outline: 0px; padding: 0px; vertical-align: baseline;">Cảm ơn Quý khách đã mua sản phẩm tại Công ty chúng Tôi!</li>
        <li style="background: transparent; border: 0px; box-sizing: initial; list-style: disc; margin: 5px 0px; outline: 0px; padding: 0px; vertical-align: baseline;">Nếu Anh/chị có bất kỳ câu hỏi nào, xin liên hệ với chúng tôi tại: adhkmobile@gmail.com</li>
        <li style="background: transparent; border: 0px; box-sizing: initial; list-style: disc; margin: 5px 0px; outline: 0px; padding: 0px; vertical-align: baseline;">Trân trọng, Ban quản trị cửa hàng ADHK Mobile</li>
        ';
    $maildathang = $_SESSION['email'];
    $mail = new Mailer();
    $mail->dathangmail($tieude, $noidung, $maildathang);

    unset($_SESSION['cart']);
    header('Location:../../index.php?quanly=hoantat');
} elseif ($cart_payment == 'chuyenkhoan') {
    //insert vào đơn hàng
    $insert_cart = "INSERT INTO tbl_cart(id_khachhang,code_cart,cart_status,cart_date,cart_payment,cart_shipping) VALUE('" . $id_khachhang . "','" . $code_order . "',1,'" . $now . "','" . $cart_payment . "','" . $id_shipping . "')";
    $cart_query = mysqli_query($conn, $insert_cart);
    //them don hàng chi tiet
    foreach ($_SESSION['cart'] as $key => $value) {
        $id_sanpham = $value['id'];
        $soluong = $value['soluong'];
        $insert_order_details = "INSERT INTO tbl_cart_details(id_sanpham,code_cart,soluongmua) VALUE('" . $id_sanpham . "','" . $code_order . "','" . $soluong . "')";
        mysqli_query($conn, $insert_order_details);
    }

    $name = $_POST['name'];
    $mail = $_SESSION['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $note = $_POST['note'];

    $tieude = "Đặt hàng website ADHK Mobile thành công!";
    $noidung .= "<p>Xin Chào $name</p>";
    $noidung .= "<p>Cảm ơn Anh/chị đã đặt hàng tại ADHK Mobile</p>";
    $noidung .= "<p><b>TÀI KHOẢN NHẬN THANH TOÁN</b></br></p>
    <strong>Tên giao dịch: Võ Huy Khang</strong><br>
    <strong>Số Tài Khoản: 101869094651</strong><br>
    <strong>Ngân hàng TMCP Công Thương Việt Nam, VietinBank</strong><br>
    <strong>Chuyển khoản với nội dung: #$code_order</strong><br>
    ";
    $noidung .= 'Đơn hàng của Anh/chị đã được tiếp nhận, chúng tôi sẽ nhanh chóng liên hệ với Anh/chị sau 24h làm việc sao 48h quý khách chưa thực hiện chuyển khoản đơn hàng sẽ tự động huỷ.';
    $noidung .= "<h4>THÔNG TIN KHÁCH HÀNG:</h4>";
    $noidung .= '<p>
    <b>Khách Hàng: </b>' . $name . '<br/>
    <b>Email: </b>' . $mail . '<br/>
    <b>Số điện thoại: </b>' . $phone . '<br/>
    <b>Địa chỉ nhận hàng: </b>' . $address . '<br/>
    <b>Ghi chú: </b>' . $note . '<br/>
    <b>Thông tin đơn hàng:</b> #' . $code_order . '<br/>
    <b>	Phương thức thanh toán: </b> Chuyển khoản trực tiếp đến cửa hàng<br/>
    <b>	Phương thức vận chuyển: </b> Giao hàng tận nơi <br/>
    <b> Ngày đặt hàng: </b>' . date("d/m/Y") . '
    </p>';
    $noidung .= "<h4>HOÁ ĐƠN ĐIỆN TỬ CỦA QUÝ KHÁCH:</h4>";

    //Danh sách sản phẩm đã mua
    $noidung .= '<table style="font-family: arial, sans-serif;
                        border-collapse: collapse;
                        width: 100%;">
                        <thead>
                            <tr>
                            <th style="border: 1px solid #dddddd;
                            text-align: left;
                            padding: 8px;" scope="col">STT</th>
                            <th style="border: 1px solid #dddddd;
                                text-align: left;
                                padding: 8px;" scope="col">HÌNH ẢNH</th>
                                <th style="border: 1px solid #dddddd;
                                text-align: left;
                                padding: 8px;" scope="col">THÔNG TIN SẢN PHẨM</th>
                                <th style="border: 1px solid #dddddd;
                                text-align: left;
                                padding: 8px;" scope="col">ĐƠN GIÁ</th>
                                <th style="border: 1px solid #dddddd;
                                text-align: left;
                                padding: 8px;" scope="col">SỐ LƯỢNG</th>
                                <th style="border: 1px solid #dddddd;
                                text-align: left;
                                padding: 8px;" scope="col">THÀNH TIỀN</th>
                            </tr>
                        </thead>
                        <tbody>';
    $totalPriceAll = 0;
    $i = 0;
    foreach ($_SESSION['cart'] as $key => $val) {
        $totalPrice = $val['giakhuyenmai'] * $val['soluong'];
        $i++;

        $noidung .= '<tr>
        <td style="border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;">' . $i . ' </td>
        <td style="border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;">                        <center>
        <img src="' . $val['img_avatar'] . '" width="150px">
    </center></td>
                            <td style="border: 1px solid #dddddd;
                            text-align: left;
                            padding: 8px;">' . $val['tensanpham'] . ' </td>
                            <td style="border: 1px solid #dddddd;
                            text-align: left;
                            padding: 8px;">' . number_format($val['giakhuyenmai'], 0, ',', '.') . ' VNĐ' . '</td>
                            <td style="border: 1px solid #dddddd;
                            text-align: left;
                            padding: 8px;">' . $val['soluong'] . '</td>
                            <td style="border: 1px solid #dddddd;
                            text-align: left;
                            padding: 8px;">' . number_format($totalPrice) . ' VNĐ' . '</td>
                            </tr>';
        $totalPriceAll += $totalPrice;
    }

    $noidung .= '<tr>
    <td colspan="3" style="border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;color: green;">Đơn hàng của bạn được Miễn phí
ship</td>
                <td style="border: 1px solid #dddddd;
                text-align: left;
                padding: 8px; color: red;" colspan="2">TỔNG GIÁ TRỊ HOÁ ĐƠN</td>

       

                <td style="border: 1px solid #dddddd;
                text-align: left;
                padding: 8px; color: red;" colspan="1">' . number_format($totalPriceAll) . ' VNĐ' . '</td>
            </tr>
        </tbody>
    </table>';
    $noidung .= "<br/>";
    $noidung .= '<div class="symple-box yellow center " style="background: #219ebc; border-radius: 2px; border: 1px solid #264653; box-sizing: border-box; color: #264653; float: none; font-family: Arial, sans-serif; font-size: 15px; margin: 0px auto; outline: 0px; padding: 15px 20px; vertical-align: baseline;"><strong style="background: transparent; border: 0px; box-sizing: initial; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;">Quý khách đã đặt hàng thành công</strong>:
        <ul style="background: transparent; border: 0px; box-sizing: initial; margin: 0px 0px 20px 20px; outline: 0px; padding: 0px; vertical-align: baseline;">
        <li style="background: transparent; border: 0px; box-sizing: initial; list-style: disc; margin: 5px 0px; outline: 0px; padding: 0px; vertical-align: baseline;">Lưu và chụp hình hoá đơn điện tử này để bảo hành và đổi trả</li>
        <li style="background: transparent; border: 0px; box-sizing: initial; list-style: disc; margin: 5px 0px; outline: 0px; padding: 0px; vertical-align: baseline;">Hoá đơn đặt hàng của quý khách đã được gửi đến địa chỉ Email hoặc vào trang Thông tin khách hàng để xem chi tiết</li>
        <li style="background: transparent; border: 0px; box-sizing: initial; list-style: disc; margin: 5px 0px; outline: 0px; padding: 0px; vertical-align: baseline;">Đơn hàng của quý khách sẽ được vận chuyển đến tay Quý khách trong sau thời gian 2 đến 3 ngày làm việc tính từ thời điểm này.</li>
        <li style="background: transparent; border: 0px; box-sizing: initial; list-style: disc; margin: 5px 0px; outline: 0px; padding: 0px; vertical-align: baseline;">Nhân viên giao hàng sẽ liên hệ với số điện thoại trước khi giao hàng 24 tiếng</li>
        <li style="background: transparent; border: 0px; box-sizing: initial; list-style: disc; margin: 5px 0px; outline: 0px; padding: 0px; vertical-align: baseline;">Cảm ơn Quý khách đã mua sản phẩm tại Công ty chúng Tôi!</li>
        <li style="background: transparent; border: 0px; box-sizing: initial; list-style: disc; margin: 5px 0px; outline: 0px; padding: 0px; vertical-align: baseline;">Nếu Anh/chị có bất kỳ câu hỏi nào, xin liên hệ với chúng tôi tại: adhkmobile@gmail.com</li>
        <li style="background: transparent; border: 0px; box-sizing: initial; list-style: disc; margin: 5px 0px; outline: 0px; padding: 0px; vertical-align: baseline;">Trân trọng, Ban quản trị cửa hàng ADHK Mobile</li>
        ';
    $maildathang = $_SESSION['email'];
    $mail = new Mailer();
    $mail->dathangmail($tieude, $noidung, $maildathang);

    unset($_SESSION['cart']);
    header('Location:../../index.php?quanly=hoantat');
} elseif ($cart_payment == 'vnpay') {
    //thanh toan bang vnpay
    $vnp_TxnRef = $code_order; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
    $vnp_OrderInfo = 'Thanh toán đơn hàng đặt tại web';
    $vnp_OrderType = 'billpayment';

    $vnp_Amount = $tongtien * 100;
    $vnp_Locale = 'vn';
    $vnp_BankCode = 'NCB';
    $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

    $vnp_ExpireDate = $expire;

    $inputData = array(
        "vnp_Version" => "2.1.0",
        "vnp_TmnCode" => $vnp_TmnCode,
        "vnp_Amount" => $vnp_Amount,
        "vnp_Command" => "pay",
        "vnp_CreateDate" => date('YmdHis'),
        "vnp_CurrCode" => "VND",
        "vnp_IpAddr" => $vnp_IpAddr,
        "vnp_Locale" => $vnp_Locale,
        "vnp_OrderInfo" => $vnp_OrderInfo,
        "vnp_OrderType" => $vnp_OrderType,
        "vnp_ReturnUrl" => $vnp_Returnurl,
        "vnp_TxnRef" => $vnp_TxnRef,
        "vnp_ExpireDate" => $vnp_ExpireDate

    );

    if (isset($vnp_BankCode) && $vnp_BankCode != "") {
        $inputData['vnp_BankCode'] = $vnp_BankCode;
    }

    ksort($inputData);
    $query = "";
    $i = 0;
    $hashdata = "";
    foreach ($inputData as $key => $value) {
        if ($i == 1) {
            $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
        } else {
            $hashdata .= urlencode($key) . "=" . urlencode($value);
            $i = 1;
        }
        $query .= urlencode($key) . "=" . urlencode($value) . '&';
    }

    $vnp_Url = $vnp_Url . "?" . $query;
    if (isset($vnp_HashSecret)) {
        $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
        $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
    }
    $returnData = array(
        'code' => '00', 'message' => 'success', 'data' => $vnp_Url
    );
    if (isset($_POST['redirect'])) {
        $_SESSION['code_cart'] = $code_order;

        $insert_cart = "INSERT INTO tbl_cart(id_khachhang,code_cart,cart_status,cart_date,cart_payment,cart_shipping) VALUE('" . $id_khachhang . "','" . $code_order . "',1,'" . $now . "','" . $cart_payment . "','" . $id_shipping . "')";
        $cart_query = mysqli_query($conn, $insert_cart);
        //them don hàng chi tiet
        foreach ($_SESSION['cart'] as $key => $value) {
            $id_sanpham = $value['id'];
            $soluong = $value['soluong'];
            $insert_order_details = "INSERT INTO tbl_cart_details(id_sanpham,code_cart,soluongmua) VALUE('" . $id_sanpham . "','" . $code_order . "','" . $soluong . "')";
            mysqli_query($conn, $insert_order_details);
        }
        header('Location: ' . $vnp_Url);
        die();
    } else {
        echo json_encode($returnData);
    }
}