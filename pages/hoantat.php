<?php
if (!isset($_SESSION['dangnhap_home'])) {
    echo '<script>setTimeout("window.location=\'index.php?quanly=khongtimthaytrang\'",100);</script>';
} else {
?>
    <?php
    include('admin/config.php');
    $id_khachhang = $_SESSION['id_dangky'];

    $sendmail = "SELECT * FROM tbl_shipping WHERE id_dangky = $id_khachhang";
    $result_sendmail = mysqli_query($conn, $sendmail);
    $row_sendmail = mysqli_fetch_array($result_sendmail);
    $name = $row_sendmail['name'];
    $mail = $row_sendmail['email'];
    $phone = $row_sendmail['phone'];
    $address = $row_sendmail['address'];
    $note = $row_sendmail['note'];

    if (isset($_GET['vnp_Amount'])) {

        $vnp_Amount = $_GET['vnp_Amount'];
        $vnp_BankCode = $_GET['vnp_BankCode'];
        $vnp_BankTranNo = $_GET['vnp_BankTranNo'];
        $vnp_OrderInfo = $_GET['vnp_OrderInfo'];
        $vnp_PayDate = $_GET['vnp_PayDate'];
        $vnp_TmnCode = $_GET['vnp_TmnCode'];
        $vnp_TransactionNo = $_GET['vnp_TransactionNo'];
        $vnp_CardType = $_GET['vnp_CardType'];
        $code_cart = $_SESSION['code_cart'];

        //insert database vnpay
        $insert_vnpay = "INSERT INTO tbl_vnpay(vnp_amount,code_cart,vnp_bankcode,vnp_banktranno,vnp_cardtype,vnp_orderinfo,vnp_paydate,vnp_tmncode,vnp_transactionno) VALUE('" . $vnp_Amount . "','" . $code_cart . "','" . $vnp_BankCode . "','" . $vnp_BankTranNo . "','" . $vnp_CardType . "','" . $vnp_OrderInfo . "','" . $vnp_PayDate . "','" . $vnp_TmnCode . "','" . $vnp_TransactionNo . "')";
        $cart_query = mysqli_query($conn, $insert_vnpay);
    } elseif (isset($_GET['partnerCode'])) {
        $id_khachhang = $_SESSION['id_dangky'];
        $code_order = rand(0, 9999);
        $tam = $code_order;
        $partnerCode = $_GET['partnerCode'];
        $orderId = $_GET['orderId'];
        $amount = $_GET['amount'];
        $orderInfo = $_GET['orderInfo'];
        $orderType = $_GET['orderType'];
        $transId = $_GET['transId'];
        $payType = $_GET['payType'];
        $cart_payment = 'momo';
        //lay id thong tin van chuyen
        $sql_get_vanchuyen = mysqli_query($conn, "SELECT * FROM tbl_shipping WHERE id_dangky='$id_khachhang' LIMIT 1");
        $row_get_vanchuyen = mysqli_fetch_array($sql_get_vanchuyen);
        $id_shipping = $row_get_vanchuyen['id_shipping'];
        //insert database momo
        $insert_momo = "INSERT INTO tbl_momo(partner_code,order_id,amount,order_info,order_type,trans_id,pay_type,code_cart) VALUE('" . $partnerCode . "','" . $orderId . "','" . $amount . "','" . $orderInfo . "','" . $orderType . "','" . $transId . "','" . $payType . "','" . $code_order . "')";
        $cart_query = mysqli_query($conn, $insert_momo);

        if ($cart_query) {
            $now = date('d/m/Y');
            $insert_cart = "INSERT INTO tbl_cart(id_khachhang,code_cart,cart_status,cart_date,cart_payment,cart_shipping) VALUE('" . $id_khachhang . "','" . $code_order . "',1,'" . $now . "','" . $cart_payment . "','" . $id_shipping . "')";
            $cart_query = mysqli_query($conn, $insert_cart);
            //insert gio hàng
            //them don hàng chi tiet
            foreach ($_SESSION['cart'] as $key => $value) {
                $id_sanpham = $value['id'];
                $soluong = $value['soluong'];
                $insert_order_details = "INSERT INTO tbl_cart_details(id_sanpham,code_cart,soluongmua) VALUE('" . $id_sanpham . "','" . $code_order . "','" . $soluong . "')";
                mysqli_query($conn, $insert_order_details);
            }
        }
    } else {
        if (isset($_GET['thanhtoan']) == 'paypal') {
            $code_order = rand(0, 9999);
            $tam = $code_order;
            $cart_payment = 'paypal';
            $id_khachhang = $_SESSION['id_dangky'];
            //lay id thong tin van chuyen
            $sql_get_vanchuyen = mysqli_query($conn, "SELECT * FROM tbl_shipping WHERE id_dangky='$id_khachhang' LIMIT 1");
            $row_get_vanchuyen = mysqli_fetch_array($sql_get_vanchuyen);
            $id_shipping = $row_get_vanchuyen['id_shipping'];
            $now = date('d/m/Y');
            //insert vào đơn hàng
            $insert_cart = "INSERT INTO tbl_cart(id_khachhang,code_cart,cart_status,cart_date,cart_payment,cart_shipping) VALUE('" . $id_khachhang . "','" . $tam . "',1,'" . $now . "','" . $cart_payment . "','" . $id_shipping . "')";

            $cart_query = mysqli_query($conn, $insert_cart);
            //them don hàng chi tiet
            foreach ($_SESSION['cart'] as $key => $value) {
                $id_sanpham = $value['id'];
                $soluong = $value['soluong'];
                $insert_order_details = "INSERT INTO tbl_cart_details(id_sanpham,code_cart,soluongmua) VALUE('" . $id_sanpham . "','" . $tam . "','" . $soluong . "')";
                mysqli_query($conn, $insert_order_details);
            }
        }
    }
    ?>
    <section class="bread-crumb">
        <div class="container">
            <ul class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
                <li class="home" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    <a itemprop="item" href="/" title="Trang chủ">
                        <span itemprop="name">Trang chủ</span>
                        <meta itemprop="position" content="1" />
                    </a>
                </li>

                <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    <strong itemprop="name">Đặt hàng</strong>
                    <meta itemprop="position" content="2" />
                </li>

            </ul>
        </div>
    </section>
    <?php
    if (isset($_SESSION['dangnhap_home'])) {
    ?>
        <style>
            .arrow-steps .step {
                font-size: 14px;
                text-align: center;
                color: #777;
                cursor: default;
                margin: 0 1px 0 0;
                padding: 10px 0px 10px 0px;
                width: 15%;
                float: left;
                position: relative;
                background-color: #ddd;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
            }

            .arrow-steps .step a {
                color: #777;
                text-decoration: none;
            }

            .arrow-steps .step:after,
            .arrow-steps .step:before {
                content: "";
                position: absolute;
                top: 0;
                right: -17px;
                width: 0;
                height: 0;
                border-top: 19px solid transparent;
                border-bottom: 17px solid transparent;
                border-left: 17px solid #ddd;
                z-index: 2;
            }

            .arrow-steps .step:before {
                right: auto;
                left: 0;
                border-left: 17px solid #fff;
                z-index: 0;
            }

            .arrow-steps .step:first-child:before {
                border: none;
            }

            .arrow-steps .step:last-child:after {
                border: none;
            }

            .arrow-steps .step:first-child {
                border-top-left-radius: 4px;
                border-bottom-left-radius: 4px;
            }

            .arrow-steps .step:last-child {
                border-top-right-radius: 4px;
                border-bottom-right-radius: 4px;
            }

            .arrow-steps .step span {
                position: relative;
            }

            *.arrow-steps .step.done span:before {
                opacity: 1;
                content: "";
                position: absolute;
                top: -2px;
                left: -10px;
                font-size: 11px;
                line-height: 21px;
            }

            .arrow-steps .step.current {
                color: #fff;
                background-color: #5599e5;
            }

            .arrow-steps .step.current a {
                color: #fff;
                text-decoration: none;
            }

            .arrow-steps .step.current:after {
                border-left: 17px solid #5599e5;
            }

            .arrow-steps .step.done {
                color: #173352;
                background-color: #2f69aa;
            }

            .arrow-steps .step.done a {
                color: #173352;
                text-decoration: none;
            }

            .arrow-steps .step.done:after {
                border-left: 17px solid #2f69aa;
            }
        </style>
        <div class="container">
            <!-- Responsive Arrow Progress Bar -->
            <div class="arrow-steps clearfix">
                <div class="step current"> <span> <a href="index.php?quanly=giohang">Giỏ hàng</a></span> </div>
                <div class="step current"> <span><a href="index.php?quanly=vanchuyen">Đặt hàng</a></span> </div>
                <div class="step current"> <span><a href="index.php?quanly=thongtinthanhtoan">Hình thức thanh toán</a><span>
                </div>
                <div class="step current"> <a href="/">Hoàn tất mua hàng</a></div>
            </div>

        </div>
    <?php
    }
    ?>


    <div class="container contact page-contacts">
        <div class="shadow-sm">
            <div class="row contact-padding">

                <style>
                    table {
                        font-family: arial, sans-serif;
                        border-collapse: collapse;
                        width: 100%;
                    }

                    td,
                    th {
                        border: 1px solid #3d348b;
                        text-align: left;
                        padding: 8px;
                    }
                </style>
                <!-- checkout page -->

                <!-- tittle heading -->
                <div class="symple-box yellow center" style="float: none; font-family: Arial, sans-serif; font-size: 25px; margin: 0px auto; outline: 0px; padding: 15px 20px; vertical-align: baseline;">
                    <?php
                    if (isset($_GET['vnp_Amount'])) {
                        echo '<p>Giao dịch thanh toán bằng VNPAY thành công<a href="/"> TIẾP TỤC MUA HÀNG</a>';
                        $tieude = "Thanh toán bằng VNPAY thành công";
                        $noidung = '';
                        $noidung .= "<p>Cảm ơn Anh/chị " . $_SESSION['dangnhap_home'] . " đã đặt hàng tại Smart Store</p>";
                        $noidung .= '<p>
                        <b>Khách Hàng: </b>' . $name . '<br/>
                        <b>Email: </b>' . $mail . '<br/>
                        <b>Số điện thoại: </b>' . $phone . '<br/>
                        <b>Địa chỉ nhận hàng: </b>' . $address . '<br/>
                        <b>Ghi chú: </b>' . $note . '<br/>
                        <b>	Phương thức thanh toán: </b> Đã thanh toán qua VNPAY <br/>
                        <b>	Phương thức vận chuyển: </b> Giao hàng tận nơi <br/>
                        <b> Ngày đặt hàng: </b>' . date("d/m/Y") . '
                        </p>';

                        $noidung .= "<h4>THÔNG TIN ĐƠN HÀNG: #$code_cart</h4>";
                        $noidung .= 'Đơn hàng của Anh/chị đã được tiếp nhận, chúng tôi sẽ nhanh chóng liên hệ với Anh/chị.';
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
                            <li style="background: transparent; border: 0px; box-sizing: initial; list-style: disc; margin: 5px 0px; outline: 0px; padding: 0px; vertical-align: baseline;">Nếu Anh/chị có bất kỳ câu hỏi nào, xin liên hệ với chúng tôi tại: smartstore.sales.2022@gmail.com</li>
                            <li style="background: transparent; border: 0px; box-sizing: initial; list-style: disc; margin: 5px 0px; outline: 0px; padding: 0px; vertical-align: baseline;">Trân trọng, Ban quản trị cửa hàng Smart Store</li>
                            ';
                        $maildathang = $_SESSION['email'];
                        $mail = new Mailer();
                        $mail->dathangmail($tieude, $noidung, $maildathang);
                        unset($_SESSION['cart']);
                    } elseif (isset($_GET['partnerCode'])) {
                        echo '<p>Giao dịch thanh toán bằng MoMo thành công<a href="/"> TIẾP TỤC MUA HÀNG</a>';
                        $tieude = "Thanh toán bằng ví MoMo thành công";
                        $noidung = '';
                        $noidung .= "<p>Cảm ơn Anh/chị " . $_SESSION['dangnhap_home'] . " đã đặt hàng tại Smart Store</p>";
                        $noidung .= '<p>
                        <b>Khách Hàng: </b>' . $name . '<br/>
                        <b>Email: </b>' . $mail . '<br/>
                        <b>Số điện thoại: </b>' . $phone . '<br/>
                        <b>Địa chỉ nhận hàng: </b>' . $address . '<br/>
                        <b>Ghi chú: </b>' . $note . '<br/>
                        <b>	Phương thức thanh toán: </b> Đã thanh toán qua MoMo <br/>
                        <b>	Phương thức vận chuyển: </b> Giao hàng tận nơi <br/>
                        <b> Ngày đặt hàng: </b>' . date("d/m/Y") . '
                        </p>';

                        $noidung .= "<h4>THÔNG TIN ĐƠN HÀNG: #$tam </h4>";
                        $noidung .= 'Đơn hàng của Anh/chị đã được tiếp nhận, chúng tôi sẽ nhanh chóng liên hệ với Anh/chị.';
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
                            <li style="background: transparent; border: 0px; box-sizing: initial; list-style: disc; margin: 5px 0px; outline: 0px; padding: 0px; vertical-align: baseline;">Nếu Anh/chị có bất kỳ câu hỏi nào, xin liên hệ với chúng tôi tại: smartstore.sales.2022@gmail.com</li>
                            <li style="background: transparent; border: 0px; box-sizing: initial; list-style: disc; margin: 5px 0px; outline: 0px; padding: 0px; vertical-align: baseline;">Trân trọng, Ban quản trị cửa hàng Smart Store</li>
                            ';
                        $maildathang = $_SESSION['email'];
                        $mail = new Mailer();
                        $mail->dathangmail($tieude, $noidung, $maildathang);
                        unset($_SESSION['cart']);
                    } elseif (isset($_GET['thanhtoan']) == 'paypal') {
                        echo '<p>Giao dịch thanh toán bằng PAYPAL thành công<a href="/"> TIẾP TỤC MUA HÀNG</a>';
                        $tieude = "Thanh toán bằng PAYPAL thành công";
                        $noidung = '';
                        $noidung .= "<p>Cảm ơn Anh/chị " . $_SESSION['dangnhap_home'] . " đã đặt hàng tại Smart Store</p>";
                        $noidung .= '<p>
                        <b>Khách Hàng: </b>' . $name . '<br/>
                        <b>Email: </b>' . $mail . '<br/>
                        <b>Số điện thoại: </b>' . $phone . '<br/>
                        <b>Địa chỉ nhận hàng: </b>' . $address . '<br/>
                        <b>Ghi chú: </b>' . $note . '<br/>
                        <b>	Phương thức thanh toán: </b> Đã thanh toán qua PAYPAL <br/>
                        <b>	Phương thức vận chuyển: </b> Giao hàng tận nơi <br/>
                        <b> Ngày đặt hàng: </b>' . date("d/m/Y") . '
                        </p>';

                        $noidung .= "<h4>THÔNG TIN ĐƠN HÀNG: #$tam</h4>";
                        $noidung .= 'Đơn hàng của Anh/chị đã được tiếp nhận, chúng tôi sẽ nhanh chóng liên hệ với Anh/chị.';
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
                            <li style="background: transparent; border: 0px; box-sizing: initial; list-style: disc; margin: 5px 0px; outline: 0px; padding: 0px; vertical-align: baseline;">Nếu Anh/chị có bất kỳ câu hỏi nào, xin liên hệ với chúng tôi tại: smartstore.sales.2022@gmail.com</li>
                            <li style="background: transparent; border: 0px; box-sizing: initial; list-style: disc; margin: 5px 0px; outline: 0px; padding: 0px; vertical-align: baseline;">Trân trọng, Ban quản trị cửa hàng Smart Store</li>
                            ';
                        $maildathang = $_SESSION['email'];
                        $mail = new Mailer();
                        $mail->dathangmail($tieude, $noidung, $maildathang);
                        unset($_SESSION['cart']);
                    } else {
                        echo '<p>QUÝ KHÁCH ĐÃ ĐẶT HÀNG THÀNH CÔNG! <a href="/"> TIẾP TỤC MUA HÀNG</a>';
                        unset($_SESSION['cart']);
                    }
                    ?>

                    </p>
                </div>
                <div class="symple-box yellow center" style="background: #219ebc; border-radius: 2px; border: 1px solid #264653; box-sizing: border-box; color: #264653; float: none; font-family: Arial, sans-serif; font-size: 15px; margin: 0px auto; outline: 0px; padding: 15px 20px; vertical-align: baseline;">
                    <strong style="background: transparent; border: 0px; box-sizing: initial; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;">Quý
                        khách đã đặt hàng thành công</strong>:
                    <ul style="background: transparent; border: 0px; box-sizing: initial; margin: 0px 0px 20px 20px; outline: 0px; padding: 0px; vertical-align: baseline;">
                        <li style="background: transparent; border: 0px; box-sizing: initial; list-style: disc; margin: 5px 0px; outline: 0px; padding: 0px; vertical-align: baseline;">
                            Một email xác nhận đã được gửi tới <?php echo $_SESSION['email'] ?> của bạn hoặc <b><a href="index.php?quanly=donhangcuaban">bạn có thể xem
                                    trạng thái đơn hàng của bạn tại đây</a></b></li>
                        <li style="background: transparent; border: 0px; box-sizing: initial; list-style: disc; margin: 5px 0px; outline: 0px; padding: 0px; vertical-align: baseline;">
                            Xin vui lòng kiểm tra email của bạn</li>
                        <li <li style="background: transparent; border: 0px; box-sizing: initial; list-style: disc; margin: 5px 0px; outline: 0px; padding: 0px; vertical-align: baseline;">
                            Đơn hàng của Quý khách sẽ được vận chuyển đến tay Quý khách trong sau thời gian 2 đến 3 ngày
                            làm việc tính từ thời điểm này.</li>
                        <li style="background: transparent; border: 0px; box-sizing: initial; list-style: disc; margin: 5px 0px; outline: 0px; padding: 0px; vertical-align: baseline;">
                            Nhân viên giao hàng sẽ liên hệ với số điện thoại trước khi giao hàng 24 tiếng</li>
                        <li style="background: transparent; border: 0px; box-sizing: initial; list-style: disc; margin: 5px 0px; outline: 0px; padding: 0px; vertical-align: baseline;">
                            Cảm ơn Quý khách đã mua hàng trực tiếp trên trang web của Công ty chúng Tôi!</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>