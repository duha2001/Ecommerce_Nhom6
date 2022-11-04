<?php
if (!isset($_SESSION['dangnhap_home'])) {
    echo '<script>setTimeout("window.location=\'index.php?quanly=khongtimthaytrang\'",100);</script>';
} else {
?>
<?php
    if (isset($_SESSION['cart']) == NULL) {
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
                <strong itemprop="name">Thanh toán</strong>
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
        <center>
            <div class="step current"> <a href="index.php?quanly=giohang">Giỏ hàng</a></div>
            <div class="step current"> <a href="index.php?quanly=vanchuyen">Đặt hàng</a></div>
            <div class="step current"> <a href="index.php?quanly=thongtinthanhtoan">Hình thức thanh toán</a></div>
            <div class="step"> <a href="index.php?quanly=thongtinthanhtoan">Hoàn tất mua hàng</a></div>
        </center>
    </div>

</div>
<div class="container contact page-contacts">
    <div class="shadow-sm">
        <div class="row contact-padding">
            <table style="width:100%;text-align: center;border-collapse: collapse;" border="1">
                <tr>
                    <td colspan="8">
                        <section class="content">
                            <div class="callout callout-info">
                                <h3>Thông báo!</h3>

                                <h5>Hiện không có sản phẩm nào trong giỏ hàng của bạn! <a href="/">Nhấn vào đây để tiếp
                                        tục mua hàng</a></h5>
                            </div>
                        </section>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>


<?php
        }
        echo '<script>setTimeout("window.location=\'index.php?quanly=giohang\'",5000);</script>';
    } else {
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
                <strong itemprop="name">Thanh toán</strong>
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
        <center>
            <div class="step current"> <a href="index.php?quanly=giohang">Giỏ hàng</a></div>
            <div class="step current"> <a href="index.php?quanly=vanchuyen">Đặt hàng</a></div>
            <div class="step current"> <a href="index.php?quanly=thongtinthanhtoan">Hình thức thanh toán</a></div>
            <div class="step"> <a href="index.php?quanly=thongtinthanhtoan">Hoàn tất mua hàng</a></div>
        </center>
    </div>

</div>
<?php
        }
        ?>

<?php
        $id_dangky = $_SESSION['id_dangky'];
        $sql_get_vanchuyen = mysqli_query($conn, "SELECT * FROM tbl_shipping WHERE id_dangky='$id_dangky' LIMIT 1");
        $count = mysqli_num_rows($sql_get_vanchuyen);
        if ($count > 0) {
            $row_get_vanchuyen = mysqli_fetch_array($sql_get_vanchuyen);
            $name = $row_get_vanchuyen['name'];
            $phone = $row_get_vanchuyen['phone'];
            $address = $row_get_vanchuyen['address'];
            $note = $row_get_vanchuyen['note'];
        } else {
            $name = '';
            $phone = '';
            $address = '';
            $note = '';
        }
        ?>
<div class="container contact page-contacts">
    <div class="shadow-sm">
        <div class="row contact-padding">
            <div class="col-md-8">
                <form action="pages/xulythanhtoan.php" method="POST">
                    <h4>Thông tin vận chuyển và giỏ hàng</h4>
                    <?php
                            if ($name == '' && $phone == '' && $address == '') {
                                echo '<script>alert("Không tìm thấy địa chỉ vận chuyển vui lòng thêm địa chỉ vận chuyển")</script>';
                                echo '<script>setTimeout("window.location=\'index.php?quanly=vanchuyen\'",1000);</script>';
                            ?>
                    <h1 style="color:red;">Không tìm thấy địa chỉ vận chuyển của bạn
                    </h1>

                    <?php
                            } else {
                            ?>
                    <ul>
                        <li>Họ và tên vận chuyển : <b><?php echo $name ?></b></li>
                        <input hidden name="name" value="<?php echo $name ?>">
                        <li>Số điện thoại : <b><?php echo $phone ?></b></li>
                        <input hidden name="phone" value="<?php echo $phone ?>">
                        <li>Địa chỉ : <b><?php echo $address ?></b></li>
                        <input hidden name="address" value="<?php echo $address ?>">
                        <li>Ghi chú : <b><?php echo $note ?></b></li>
                        <input hidden name="note" value="<?php echo $note ?>">
                    </ul>
                    <?php
                            }
                            ?>
                    <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
                        Xác nhận hoá đơn thanh toán
                    </h3>
                    <table>
                        <thead>
                            <tr>
                                <th scope="col">THÔNG TIN SẢN PHẨM</th>
                                <th scope="col">ĐƠN GIÁ</th>
                                <th scope="col">SỐ LƯỢNG</th>
                                <th scope="col">THÀNH TIỀN</th>
                            </tr>
                        </thead>
                        <?php
                                if (isset($_SESSION['cart'])) {
                                    $i = 0;
                                    $tongtien = 0;
                                    foreach ($_SESSION['cart'] as $cart_item) {
                                        $thanhtien = $cart_item['soluong'] * $cart_item['giakhuyenmai'];
                                        $tongtien += $thanhtien;
                                        $i++;
                                ?>
                        <tbody>
                            <tr>
                                <td><?php echo $cart_item['tensanpham']; ?></td>
                                <td><?php echo number_format($cart_item['giakhuyenmai'], 0, ',', '.') . 'vnđ'; ?></td>
                                <td><?php echo $cart_item['soluong']; ?></td>
                                <td> <?php echo number_format($thanhtien, 0, ',', '.') . 'vnđ' ?></td>
                            </tr>
                            <?php
                                    }
                                        ?>
                            <tr>
                                <td colspan="1" style="color: red;">TỔNG GIÁ TRỊ HOÁ ĐƠN</td>
                                <td colspan="2" style="color: green;"><span
                                        class="fa fa-check-circle text-success"></span> Bạn được Miễn phí
                                    ship</td>
                                <td colspan="4" style="color: red;">
                                    <?php echo number_format($tongtien, 0, ',', '.') . 'vnđ' ?>
                                </td>
                            </tr>
                        </tbody>
                        <?php
                                } else {
                                    ?>
                        <tr>
                            <td colspan="8">
                                <section class="content">
                                    <div class="callout callout-info">
                                        <h3>Thông báo!</h3>

                                        <h5>Hiện không có sản phẩm nào trong giỏ hàng của bạn! <a href="/">Nhấn vào đây
                                                để
                                                tiếp
                                                tục mua hàng</a></h5>
                                    </div>
                                </section>
                            </td>
                        </tr>
                        <?php
                                }
                                    ?>
                    </table>
            </div>

            <div class="col-md-4 hinhthucthanhtoan">
                <h4>Phương thức thanh toán</h4>
                <div class="radio">
                    <label>
                        <input type="radio" name="payment" id="optionsRadios1" value="tienmat" checked>
                        Thanh toán khi nhận hàng
                    </label>
                </div>

                <div class="radio">
                    <label>
                        <input type="radio" name="payment" id="optionsRadios1" value="chuyenkhoan">
                        Chuyển khoản trực tiếp đến cửa hàng
                    </label>
                </div>

                <div class="radio">
                    <label>
                        <input type="radio" name="payment" id="optionsRadios1" value="vnpay">
                        <img src="https://i.imgur.com/M7E0Xq5.png" height="20" width="64">
                    </label>
                </div>
                <p></p>
                <input type="submit" value="Thanh toán ngay" name="redirect" class="btn btn-success btn-lg btn-block">
                </form>
                <p></p>

                <?php
                        $tongtien = 0;
                        foreach ($_SESSION['cart'] as $key => $value) {
                            $thanhtien = $value['soluong'] * $value['giakhuyenmai'];
                            $tongtien += $thanhtien;
                        }
                        $tongtien_vnd = $tongtien;
                        $tongtien_usd = round($tongtien / 23201);
                        ?>
                <input type="hidden" name="" value="<?php echo $tongtien_usd ?>" id="tongtien">
                <div id="paypal-button"></div>

                <form class="" method="POST" target="_blank" enctype="application/x-www-form-urlencoded"
                    action="pages/xulythanhtoanmomo.php">
                    <input type="hidden" value="<?php echo $tongtien_vnd ?>" name="tongtien_vnd">
                    <input type="submit" name="momo" value="Thanh toán MOMO QRcode"
                        class="btn btn-danger btn-lg btn-block">

                </form>

                <p></p>

                <form class="" method="POST" target="_blank" enctype="application/x-www-form-urlencoded"
                    action="pages/xulythanhtoanmomo_atm.php">
                    <input type="hidden" value="<?php echo $tongtien_vnd ?>" name="tongtien_vnd">
                    <input type="submit" name="momo" value="Thanh toán MOMO ATM"
                        class="btn btn-danger btn-lg btn-block">

                </form>
                <p></p>
            </div>
        </div>
    </div>
</div>
<?php
    }
    ?>
<?php
}
?>