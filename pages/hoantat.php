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
            //insert gio h??ng
            //them don h??ng chi tiet
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
            //insert v??o ????n h??ng
            $insert_cart = "INSERT INTO tbl_cart(id_khachhang,code_cart,cart_status,cart_date,cart_payment,cart_shipping) VALUE('" . $id_khachhang . "','" . $tam . "',1,'" . $now . "','" . $cart_payment . "','" . $id_shipping . "')";

            $cart_query = mysqli_query($conn, $insert_cart);
            //them don h??ng chi tiet
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
                    <a itemprop="item" href="/" title="Trang ch???">
                        <span itemprop="name">Trang ch???</span>
                        <meta itemprop="position" content="1" />
                    </a>
                </li>

                <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    <strong itemprop="name">?????t h??ng</strong>
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
                <div class="step current"> <span> <a href="index.php?quanly=giohang">Gi??? h??ng</a></span> </div>
                <div class="step current"> <span><a href="index.php?quanly=vanchuyen">?????t h??ng</a></span> </div>
                <div class="step current"> <span><a href="index.php?quanly=thongtinthanhtoan">H??nh th???c thanh to??n</a><span>
                </div>
                <div class="step current"> <a href="/">Ho??n t???t mua h??ng</a></div>
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
                        echo '<p>Giao d???ch thanh to??n b???ng VNPAY th??nh c??ng<a href="/"> TI???P T???C MUA H??NG</a>';
                        $tieude = "Thanh to??n b???ng VNPAY th??nh c??ng";
                        $noidung = '';
                        $noidung .= "<p>C???m ??n Anh/ch??? " . $_SESSION['dangnhap_home'] . " ???? ?????t h??ng t???i Smart Store</p>";
                        $noidung .= '<p>
                        <b>Kh??ch H??ng: </b>' . $name . '<br/>
                        <b>Email: </b>' . $mail . '<br/>
                        <b>S??? ??i???n tho???i: </b>' . $phone . '<br/>
                        <b>?????a ch??? nh???n h??ng: </b>' . $address . '<br/>
                        <b>Ghi ch??: </b>' . $note . '<br/>
                        <b>	Ph????ng th???c thanh to??n: </b> ???? thanh to??n qua VNPAY <br/>
                        <b>	Ph????ng th???c v???n chuy???n: </b> Giao h??ng t???n n??i <br/>
                        <b> Ng??y ?????t h??ng: </b>' . date("d/m/Y") . '
                        </p>';

                        $noidung .= "<h4>TH??NG TIN ????N H??NG: #$code_cart</h4>";
                        $noidung .= '????n h??ng c???a Anh/ch??? ???? ???????c ti???p nh???n, ch??ng t??i s??? nhanh ch??ng li??n h??? v???i Anh/ch???.';
                        $noidung .= "<h4>HO?? ????N ??I???N T??? C???A QU?? KH??CH:</h4>";

                        //Danh s??ch s???n ph???m ???? mua
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
                                                    padding: 8px;" scope="col">H??NH ???NH</th>
                                                    <th style="border: 1px solid #dddddd;
                                                    text-align: left;
                                                    padding: 8px;" scope="col">TH??NG TIN S???N PH???M</th>
                                                    <th style="border: 1px solid #dddddd;
                                                    text-align: left;
                                                    padding: 8px;" scope="col">????N GI??</th>
                                                    <th style="border: 1px solid #dddddd;
                                                    text-align: left;
                                                    padding: 8px;" scope="col">S??? L?????NG</th>
                                                    <th style="border: 1px solid #dddddd;
                                                    text-align: left;
                                                    padding: 8px;" scope="col">TH??NH TI???N</th>
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
                                                padding: 8px;">' . number_format($val['giakhuyenmai'], 0, ',', '.') . ' VN??' . '</td>
                                                <td style="border: 1px solid #dddddd;
                                                text-align: left;
                                                padding: 8px;">' . $val['soluong'] . '</td>
                                                <td style="border: 1px solid #dddddd;
                                                text-align: left;
                                                padding: 8px;">' . number_format($totalPrice) . ' VN??' . '</td>
                                                </tr>';
                            $totalPriceAll += $totalPrice;
                        }

                        $noidung .= '<tr>
                        <td colspan="3" style="border: 1px solid #dddddd;
                        text-align: left;
                        padding: 8px;color: green;">????n h??ng c???a b???n ???????c Mi???n ph??
                    ship</td>
                                    <td style="border: 1px solid #dddddd;
                                    text-align: left;
                                    padding: 8px; color: red;" colspan="2">T???NG GI?? TR??? HO?? ????N</td>
                    
                           
                    
                                    <td style="border: 1px solid #dddddd;
                                    text-align: left;
                                    padding: 8px; color: red;" colspan="1">' . number_format($totalPriceAll) . ' VN??' . '</td>
                                </tr>
                            </tbody>
                        </table>';
                        $noidung .= "<br/>";
                        $noidung .= '<div class="symple-box yellow center " style="background: #219ebc; border-radius: 2px; border: 1px solid #264653; box-sizing: border-box; color: #264653; float: none; font-family: Arial, sans-serif; font-size: 15px; margin: 0px auto; outline: 0px; padding: 15px 20px; vertical-align: baseline;"><strong style="background: transparent; border: 0px; box-sizing: initial; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;">Qu?? kh??ch ???? ?????t h??ng th??nh c??ng</strong>:
                            <ul style="background: transparent; border: 0px; box-sizing: initial; margin: 0px 0px 20px 20px; outline: 0px; padding: 0px; vertical-align: baseline;">
                            <li style="background: transparent; border: 0px; box-sizing: initial; list-style: disc; margin: 5px 0px; outline: 0px; padding: 0px; vertical-align: baseline;">L??u v?? ch???p h??nh ho?? ????n ??i???n t??? n??y ????? b???o h??nh v?? ?????i tr???</li>
                            <li style="background: transparent; border: 0px; box-sizing: initial; list-style: disc; margin: 5px 0px; outline: 0px; padding: 0px; vertical-align: baseline;">Ho?? ????n ?????t h??ng c???a qu?? kh??ch ???? ???????c g???i ?????n ?????a ch??? Email ho???c v??o trang Th??ng tin kh??ch h??ng ????? xem chi ti???t</li>
                            <li style="background: transparent; border: 0px; box-sizing: initial; list-style: disc; margin: 5px 0px; outline: 0px; padding: 0px; vertical-align: baseline;">????n h??ng c???a qu?? kh??ch s??? ???????c v???n chuy???n ?????n tay Qu?? kh??ch trong sau th???i gian 2 ?????n 3 ng??y l??m vi???c t??nh t??? th???i ??i???m n??y.</li>
                            <li style="background: transparent; border: 0px; box-sizing: initial; list-style: disc; margin: 5px 0px; outline: 0px; padding: 0px; vertical-align: baseline;">Nh??n vi??n giao h??ng s??? li??n h??? v???i s??? ??i???n tho???i tr?????c khi giao h??ng 24 ti???ng</li>
                            <li style="background: transparent; border: 0px; box-sizing: initial; list-style: disc; margin: 5px 0px; outline: 0px; padding: 0px; vertical-align: baseline;">C???m ??n Qu?? kh??ch ???? mua s???n ph???m t???i C??ng ty ch??ng T??i!</li>
                            <li style="background: transparent; border: 0px; box-sizing: initial; list-style: disc; margin: 5px 0px; outline: 0px; padding: 0px; vertical-align: baseline;">N???u Anh/ch??? c?? b???t k??? c??u h???i n??o, xin li??n h??? v???i ch??ng t??i t???i: smartstore.sales.2022@gmail.com</li>
                            <li style="background: transparent; border: 0px; box-sizing: initial; list-style: disc; margin: 5px 0px; outline: 0px; padding: 0px; vertical-align: baseline;">Tr??n tr???ng, Ban qu???n tr??? c???a h??ng Smart Store</li>
                            ';
                        $maildathang = $_SESSION['email'];
                        $mail = new Mailer();
                        $mail->dathangmail($tieude, $noidung, $maildathang);
                        unset($_SESSION['cart']);
                    } elseif (isset($_GET['partnerCode'])) {
                        echo '<p>Giao d???ch thanh to??n b???ng MoMo th??nh c??ng<a href="/"> TI???P T???C MUA H??NG</a>';
                        $tieude = "Thanh to??n b???ng v?? MoMo th??nh c??ng";
                        $noidung = '';
                        $noidung .= "<p>C???m ??n Anh/ch??? " . $_SESSION['dangnhap_home'] . " ???? ?????t h??ng t???i Smart Store</p>";
                        $noidung .= '<p>
                        <b>Kh??ch H??ng: </b>' . $name . '<br/>
                        <b>Email: </b>' . $mail . '<br/>
                        <b>S??? ??i???n tho???i: </b>' . $phone . '<br/>
                        <b>?????a ch??? nh???n h??ng: </b>' . $address . '<br/>
                        <b>Ghi ch??: </b>' . $note . '<br/>
                        <b>	Ph????ng th???c thanh to??n: </b> ???? thanh to??n qua MoMo <br/>
                        <b>	Ph????ng th???c v???n chuy???n: </b> Giao h??ng t???n n??i <br/>
                        <b> Ng??y ?????t h??ng: </b>' . date("d/m/Y") . '
                        </p>';

                        $noidung .= "<h4>TH??NG TIN ????N H??NG: #$tam </h4>";
                        $noidung .= '????n h??ng c???a Anh/ch??? ???? ???????c ti???p nh???n, ch??ng t??i s??? nhanh ch??ng li??n h??? v???i Anh/ch???.';
                        $noidung .= "<h4>HO?? ????N ??I???N T??? C???A QU?? KH??CH:</h4>";

                        //Danh s??ch s???n ph???m ???? mua
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
                                                    padding: 8px;" scope="col">H??NH ???NH</th>
                                                    <th style="border: 1px solid #dddddd;
                                                    text-align: left;
                                                    padding: 8px;" scope="col">TH??NG TIN S???N PH???M</th>
                                                    <th style="border: 1px solid #dddddd;
                                                    text-align: left;
                                                    padding: 8px;" scope="col">????N GI??</th>
                                                    <th style="border: 1px solid #dddddd;
                                                    text-align: left;
                                                    padding: 8px;" scope="col">S??? L?????NG</th>
                                                    <th style="border: 1px solid #dddddd;
                                                    text-align: left;
                                                    padding: 8px;" scope="col">TH??NH TI???N</th>
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
                                                padding: 8px;">' . number_format($val['giakhuyenmai'], 0, ',', '.') . ' VN??' . '</td>
                                                <td style="border: 1px solid #dddddd;
                                                text-align: left;
                                                padding: 8px;">' . $val['soluong'] . '</td>
                                                <td style="border: 1px solid #dddddd;
                                                text-align: left;
                                                padding: 8px;">' . number_format($totalPrice) . ' VN??' . '</td>
                                                </tr>';
                            $totalPriceAll += $totalPrice;
                        }

                        $noidung .= '<tr>
                        <td colspan="3" style="border: 1px solid #dddddd;
                        text-align: left;
                        padding: 8px;color: green;">????n h??ng c???a b???n ???????c Mi???n ph??
                    ship</td>
                                    <td style="border: 1px solid #dddddd;
                                    text-align: left;
                                    padding: 8px; color: red;" colspan="2">T???NG GI?? TR??? HO?? ????N</td>
                    
                           
                    
                                    <td style="border: 1px solid #dddddd;
                                    text-align: left;
                                    padding: 8px; color: red;" colspan="1">' . number_format($totalPriceAll) . ' VN??' . '</td>
                                </tr>
                            </tbody>
                        </table>';
                        $noidung .= "<br/>";
                        $noidung .= '<div class="symple-box yellow center " style="background: #219ebc; border-radius: 2px; border: 1px solid #264653; box-sizing: border-box; color: #264653; float: none; font-family: Arial, sans-serif; font-size: 15px; margin: 0px auto; outline: 0px; padding: 15px 20px; vertical-align: baseline;"><strong style="background: transparent; border: 0px; box-sizing: initial; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;">Qu?? kh??ch ???? ?????t h??ng th??nh c??ng</strong>:
                            <ul style="background: transparent; border: 0px; box-sizing: initial; margin: 0px 0px 20px 20px; outline: 0px; padding: 0px; vertical-align: baseline;">
                            <li style="background: transparent; border: 0px; box-sizing: initial; list-style: disc; margin: 5px 0px; outline: 0px; padding: 0px; vertical-align: baseline;">L??u v?? ch???p h??nh ho?? ????n ??i???n t??? n??y ????? b???o h??nh v?? ?????i tr???</li>
                            <li style="background: transparent; border: 0px; box-sizing: initial; list-style: disc; margin: 5px 0px; outline: 0px; padding: 0px; vertical-align: baseline;">Ho?? ????n ?????t h??ng c???a qu?? kh??ch ???? ???????c g???i ?????n ?????a ch??? Email ho???c v??o trang Th??ng tin kh??ch h??ng ????? xem chi ti???t</li>
                            <li style="background: transparent; border: 0px; box-sizing: initial; list-style: disc; margin: 5px 0px; outline: 0px; padding: 0px; vertical-align: baseline;">????n h??ng c???a qu?? kh??ch s??? ???????c v???n chuy???n ?????n tay Qu?? kh??ch trong sau th???i gian 2 ?????n 3 ng??y l??m vi???c t??nh t??? th???i ??i???m n??y.</li>
                            <li style="background: transparent; border: 0px; box-sizing: initial; list-style: disc; margin: 5px 0px; outline: 0px; padding: 0px; vertical-align: baseline;">Nh??n vi??n giao h??ng s??? li??n h??? v???i s??? ??i???n tho???i tr?????c khi giao h??ng 24 ti???ng</li>
                            <li style="background: transparent; border: 0px; box-sizing: initial; list-style: disc; margin: 5px 0px; outline: 0px; padding: 0px; vertical-align: baseline;">C???m ??n Qu?? kh??ch ???? mua s???n ph???m t???i C??ng ty ch??ng T??i!</li>
                            <li style="background: transparent; border: 0px; box-sizing: initial; list-style: disc; margin: 5px 0px; outline: 0px; padding: 0px; vertical-align: baseline;">N???u Anh/ch??? c?? b???t k??? c??u h???i n??o, xin li??n h??? v???i ch??ng t??i t???i: smartstore.sales.2022@gmail.com</li>
                            <li style="background: transparent; border: 0px; box-sizing: initial; list-style: disc; margin: 5px 0px; outline: 0px; padding: 0px; vertical-align: baseline;">Tr??n tr???ng, Ban qu???n tr??? c???a h??ng Smart Store</li>
                            ';
                        $maildathang = $_SESSION['email'];
                        $mail = new Mailer();
                        $mail->dathangmail($tieude, $noidung, $maildathang);
                        unset($_SESSION['cart']);
                    } elseif (isset($_GET['thanhtoan']) == 'paypal') {
                        echo '<p>Giao d???ch thanh to??n b???ng PAYPAL th??nh c??ng<a href="/"> TI???P T???C MUA H??NG</a>';
                        $tieude = "Thanh to??n b???ng PAYPAL th??nh c??ng";
                        $noidung = '';
                        $noidung .= "<p>C???m ??n Anh/ch??? " . $_SESSION['dangnhap_home'] . " ???? ?????t h??ng t???i Smart Store</p>";
                        $noidung .= '<p>
                        <b>Kh??ch H??ng: </b>' . $name . '<br/>
                        <b>Email: </b>' . $mail . '<br/>
                        <b>S??? ??i???n tho???i: </b>' . $phone . '<br/>
                        <b>?????a ch??? nh???n h??ng: </b>' . $address . '<br/>
                        <b>Ghi ch??: </b>' . $note . '<br/>
                        <b>	Ph????ng th???c thanh to??n: </b> ???? thanh to??n qua PAYPAL <br/>
                        <b>	Ph????ng th???c v???n chuy???n: </b> Giao h??ng t???n n??i <br/>
                        <b> Ng??y ?????t h??ng: </b>' . date("d/m/Y") . '
                        </p>';

                        $noidung .= "<h4>TH??NG TIN ????N H??NG: #$tam</h4>";
                        $noidung .= '????n h??ng c???a Anh/ch??? ???? ???????c ti???p nh???n, ch??ng t??i s??? nhanh ch??ng li??n h??? v???i Anh/ch???.';
                        $noidung .= "<h4>HO?? ????N ??I???N T??? C???A QU?? KH??CH:</h4>";

                        //Danh s??ch s???n ph???m ???? mua
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
                                                    padding: 8px;" scope="col">H??NH ???NH</th>
                                                    <th style="border: 1px solid #dddddd;
                                                    text-align: left;
                                                    padding: 8px;" scope="col">TH??NG TIN S???N PH???M</th>
                                                    <th style="border: 1px solid #dddddd;
                                                    text-align: left;
                                                    padding: 8px;" scope="col">????N GI??</th>
                                                    <th style="border: 1px solid #dddddd;
                                                    text-align: left;
                                                    padding: 8px;" scope="col">S??? L?????NG</th>
                                                    <th style="border: 1px solid #dddddd;
                                                    text-align: left;
                                                    padding: 8px;" scope="col">TH??NH TI???N</th>
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
                                                padding: 8px;">' . number_format($val['giakhuyenmai'], 0, ',', '.') . ' VN??' . '</td>
                                                <td style="border: 1px solid #dddddd;
                                                text-align: left;
                                                padding: 8px;">' . $val['soluong'] . '</td>
                                                <td style="border: 1px solid #dddddd;
                                                text-align: left;
                                                padding: 8px;">' . number_format($totalPrice) . ' VN??' . '</td>
                                                </tr>';
                            $totalPriceAll += $totalPrice;
                        }

                        $noidung .= '<tr>
                        <td colspan="3" style="border: 1px solid #dddddd;
                        text-align: left;
                        padding: 8px;color: green;">????n h??ng c???a b???n ???????c Mi???n ph??
                    ship</td>
                                    <td style="border: 1px solid #dddddd;
                                    text-align: left;
                                    padding: 8px; color: red;" colspan="2">T???NG GI?? TR??? HO?? ????N</td>
                    
                           
                    
                                    <td style="border: 1px solid #dddddd;
                                    text-align: left;
                                    padding: 8px; color: red;" colspan="1">' . number_format($totalPriceAll) . ' VN??' . '</td>
                                </tr>
                            </tbody>
                        </table>';
                        $noidung .= "<br/>";
                        $noidung .= '<div class="symple-box yellow center " style="background: #219ebc; border-radius: 2px; border: 1px solid #264653; box-sizing: border-box; color: #264653; float: none; font-family: Arial, sans-serif; font-size: 15px; margin: 0px auto; outline: 0px; padding: 15px 20px; vertical-align: baseline;"><strong style="background: transparent; border: 0px; box-sizing: initial; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;">Qu?? kh??ch ???? ?????t h??ng th??nh c??ng</strong>:
                            <ul style="background: transparent; border: 0px; box-sizing: initial; margin: 0px 0px 20px 20px; outline: 0px; padding: 0px; vertical-align: baseline;">
                            <li style="background: transparent; border: 0px; box-sizing: initial; list-style: disc; margin: 5px 0px; outline: 0px; padding: 0px; vertical-align: baseline;">L??u v?? ch???p h??nh ho?? ????n ??i???n t??? n??y ????? b???o h??nh v?? ?????i tr???</li>
                            <li style="background: transparent; border: 0px; box-sizing: initial; list-style: disc; margin: 5px 0px; outline: 0px; padding: 0px; vertical-align: baseline;">Ho?? ????n ?????t h??ng c???a qu?? kh??ch ???? ???????c g???i ?????n ?????a ch??? Email ho???c v??o trang Th??ng tin kh??ch h??ng ????? xem chi ti???t</li>
                            <li style="background: transparent; border: 0px; box-sizing: initial; list-style: disc; margin: 5px 0px; outline: 0px; padding: 0px; vertical-align: baseline;">????n h??ng c???a qu?? kh??ch s??? ???????c v???n chuy???n ?????n tay Qu?? kh??ch trong sau th???i gian 2 ?????n 3 ng??y l??m vi???c t??nh t??? th???i ??i???m n??y.</li>
                            <li style="background: transparent; border: 0px; box-sizing: initial; list-style: disc; margin: 5px 0px; outline: 0px; padding: 0px; vertical-align: baseline;">Nh??n vi??n giao h??ng s??? li??n h??? v???i s??? ??i???n tho???i tr?????c khi giao h??ng 24 ti???ng</li>
                            <li style="background: transparent; border: 0px; box-sizing: initial; list-style: disc; margin: 5px 0px; outline: 0px; padding: 0px; vertical-align: baseline;">C???m ??n Qu?? kh??ch ???? mua s???n ph???m t???i C??ng ty ch??ng T??i!</li>
                            <li style="background: transparent; border: 0px; box-sizing: initial; list-style: disc; margin: 5px 0px; outline: 0px; padding: 0px; vertical-align: baseline;">N???u Anh/ch??? c?? b???t k??? c??u h???i n??o, xin li??n h??? v???i ch??ng t??i t???i: smartstore.sales.2022@gmail.com</li>
                            <li style="background: transparent; border: 0px; box-sizing: initial; list-style: disc; margin: 5px 0px; outline: 0px; padding: 0px; vertical-align: baseline;">Tr??n tr???ng, Ban qu???n tr??? c???a h??ng Smart Store</li>
                            ';
                        $maildathang = $_SESSION['email'];
                        $mail = new Mailer();
                        $mail->dathangmail($tieude, $noidung, $maildathang);
                        unset($_SESSION['cart']);
                    } else {
                        echo '<p>QU?? KH??CH ???? ?????T H??NG TH??NH C??NG! <a href="/"> TI???P T???C MUA H??NG</a>';
                        unset($_SESSION['cart']);
                    }
                    ?>

                    </p>
                </div>
                <div class="symple-box yellow center" style="background: #219ebc; border-radius: 2px; border: 1px solid #264653; box-sizing: border-box; color: #264653; float: none; font-family: Arial, sans-serif; font-size: 15px; margin: 0px auto; outline: 0px; padding: 15px 20px; vertical-align: baseline;">
                    <strong style="background: transparent; border: 0px; box-sizing: initial; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;">Qu??
                        kh??ch ???? ?????t h??ng th??nh c??ng</strong>:
                    <ul style="background: transparent; border: 0px; box-sizing: initial; margin: 0px 0px 20px 20px; outline: 0px; padding: 0px; vertical-align: baseline;">
                        <li style="background: transparent; border: 0px; box-sizing: initial; list-style: disc; margin: 5px 0px; outline: 0px; padding: 0px; vertical-align: baseline;">
                            M???t email x??c nh???n ???? ???????c g???i t???i <?php echo $_SESSION['email'] ?> c???a b???n ho???c <b><a href="index.php?quanly=donhangcuaban">b???n c?? th??? xem
                                    tr???ng th??i ????n h??ng c???a b???n t???i ????y</a></b></li>
                        <li style="background: transparent; border: 0px; box-sizing: initial; list-style: disc; margin: 5px 0px; outline: 0px; padding: 0px; vertical-align: baseline;">
                            Xin vui l??ng ki???m tra email c???a b???n</li>
                        <li <li style="background: transparent; border: 0px; box-sizing: initial; list-style: disc; margin: 5px 0px; outline: 0px; padding: 0px; vertical-align: baseline;">
                            ????n h??ng c???a Qu?? kh??ch s??? ???????c v???n chuy???n ?????n tay Qu?? kh??ch trong sau th???i gian 2 ?????n 3 ng??y
                            l??m vi???c t??nh t??? th???i ??i???m n??y.</li>
                        <li style="background: transparent; border: 0px; box-sizing: initial; list-style: disc; margin: 5px 0px; outline: 0px; padding: 0px; vertical-align: baseline;">
                            Nh??n vi??n giao h??ng s??? li??n h??? v???i s??? ??i???n tho???i tr?????c khi giao h??ng 24 ti???ng</li>
                        <li style="background: transparent; border: 0px; box-sizing: initial; list-style: disc; margin: 5px 0px; outline: 0px; padding: 0px; vertical-align: baseline;">
                            C???m ??n Qu?? kh??ch ???? mua h??ng tr???c ti???p tr??n trang web c???a C??ng ty ch??ng T??i!</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>