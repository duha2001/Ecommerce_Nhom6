<?php
if (!isset($_SESSION['dangnhap_home'])) {
    echo '<script>setTimeout("window.location=\'index.php?quanly=khongtimthaytrang\'",100);</script>';
} else {
?>
<?php
    $code = $_GET['code'];
    $sql_lietke_dh = "SELECT * FROM tbl_cart_details,tbl_sanpham WHERE tbl_cart_details.id_sanpham=tbl_sanpham.id_sanpham AND tbl_cart_details.code_cart=$code ORDER BY tbl_cart_details.id_cart_details DESC;";
    $query_lietke_dh = mysqli_query($conn, $sql_lietke_dh);


    $id_khachhang = $_SESSION['id_dangky'];
    $sql_lietke_dh2 = "SELECT * FROM tbl_cart,tbl_dangky WHERE tbl_cart.id_khachhang=tbl_dangky.id_dangky AND tbl_cart.id_khachhang='$id_khachhang' ORDER BY tbl_cart.id_cart DESC";
    $query_lietke_dh2 = mysqli_query($conn, $sql_lietke_dh2);
    $laytrangthai = mysqli_fetch_assoc($query_lietke_dh2);


    $kiemtradh = "SELECT cart_status,cart_payment FROM tbl_cart WHERE code_cart = '$code'";
    $kiemtracode = mysqli_query($conn, $kiemtradh);
    $kiemtra = mysqli_fetch_assoc($kiemtracode);


    $sql_ship = mysqli_query($conn, "SELECT * FROM tbl_shipping WHERE id_dangky = '.$id_khachhang.' LIMIT 1");
    $laythongtin = mysqli_fetch_assoc($sql_ship);

    ?>
<?php
    if (!isset($laytrangthai['cart_date'])) {
        echo '<script>setTimeout("window.location=\'index.php?quanly=khongtimthaytrang\'",1);</script>';
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
                <a itemprop="item" href="index.php?quanly=thongtintaikhoan" title="Trang Tài khoản">
                    <span itemprop="name">Trang Tài khoản</span>
                    <meta itemprop="position" content="2" />
                </a>
            </li>
            <li class="active" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <strong itemprop="name">Chi tiết đơn hàng</strong>
                <meta itemprop="position" content="3" />
            </li>

        </ul>
    </div>
</section>
<section class="login page_order">
    <div class="container">
        <div class="shadow-sm">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-lg-3 col-left-ac">
                    <div class="block-account">
                        <h5 class="title-account">Trang tài khoản</h5>
                        <p>
                            Xin chào, <span style="color: red;"><?php
                                                                        if (isset($_SESSION['dangnhap_home'])) {
                                                                            echo  $_SESSION['dangnhap_home'];
                                                                        } ?></span>&nbsp;!
                        </p>
                        <?php include('accmenu.php'); ?>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-lg-9">
                    <div class="head-title clearfix">
                        <h1>Chi tiết đơn hàng <b>#<?= $code; ?></b></h1>
                        <span class="note order_date">
                            Ngày đặt hàng: <?php $date = date_create($laytrangthai['cart_date']);
                                                    echo date_format($date, 'd-m-Y'); ?>
                        </span>
                    </div>
                    <div class="payment_status">
                        <span class="note">Trạng thái thanh toán:</span>

                        <i class="status_pending">

                            <em>

                                <span class="span_pending"><strong><em>
                                            <?php if ($kiemtra['cart_payment'] == 'tienmat') {
                                                        echo '<em style="color: green;">Thanh toán khi giao hàng (COD)</em>';
                                                    } elseif ($kiemtra['cart_payment'] == 'chuyenkhoan') {
                                                        echo '<em style="color: #6a4c93;">Đơn hàng đang chờ bạn thanh toán</em>';
                                                    } else {
                                                        echo '<em style="color: green;">Đã thanh toán</em>';
                                                    } ?></em></strong></span>

                            </em>

                        </i>

                    </div>
                    <div class="shipping_status">
                        <span class="note">Trạng thái vận chuyển:</span>


                        <span class="span_" style="color: red"><strong><em><?php if ($kiemtra['cart_status'] == '1') {
                                                                                        echo 'Chờ xử lý';
                                                                                    } elseif ($kiemtra['cart_status'] == '2') {
                                                                                        echo 'Đang giao hàng';
                                                                                    } elseif ($kiemtra['cart_status'] == '3') {
                                                                                        echo 'Đã giao hàng thành công';
                                                                                    } else {
                                                                                        echo 'Đơn hàng đã huỷ';
                                                                                    } ?></em></strong></span>


                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6 body_order">

                            <div class="box-address">
                                <h2 class="title-head">Địa chỉ giao hàng</h2>

                                <div class="address box-des">
                                    <p> <strong><?= $laythongtin['name']; ?></strong></p>
                                    <p
                                        style="font-size: 15px; padding-top: 10px; padding-bottom: 10px; line-height: 1.3;">
                                        Địa chỉ: <?= $laythongtin['address']; ?>
                                    </p>
                                    <hr />
                                    <p>Số điện thoại: <?= $laythongtin['phone']; ?></p>

                                </div>
                            </div>

                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-3 body_order">
                            <div class="box-address">
                                <h2 class="title-head">
                                    Thanh toán
                                </h2>
                                <div class="box-des">
                                    <p>
                                        <?php if ($kiemtra['cart_payment'] == 'tienmat') {
                                                    echo 'Thanh toán khi giao hàng (COD)';
                                                } elseif ($kiemtra['cart_payment'] == 'chuyenkhoan') {
                                                    echo 'Chờ thanh toán';
                                                } else {
                                                    echo 'Đã thanh toán';
                                                } ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-3 body_order">
                            <div class="box-address">
                                <h2 class="title-head">
                                    Ghi chú
                                </h2>
                                <div class="box-des">
                                    <p>

                                        <?= $laythongtin['note']; ?>

                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 margin-top-20">
                            <div class="table-order">
                                <div class="table-responsive table_mobile">
                                    <table id="order_details" class="table table-cart">
                                        <thead class="thead-default">
                                            <tr>
                                                <th>Sản phẩm</th>
                                                <th>Đơn giá</th>
                                                <th>Số lượng</th>
                                                <th>Tổng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                    $i = 0;
                                                    $tongtien = 0;
                                                    while ($row = mysqli_fetch_array($query_lietke_dh)) {
                                                        $i++;
                                                        $thanhtien = $row['giakhuyenmai'] * $row['soluongmua'];
                                                        $tongtien += $thanhtien;
                                                    ?>
                                            <tr>
                                                <td class="link" data-title="Tên">
                                                    <div class="image_order">
                                                        <a title="<?php echo $row['tensanpham'] ?>"
                                                            href="index.php?quanly=chitietsanpham&id=<?php echo $row['id_sanpham'] ?>"><img
                                                                src="<?php echo $row['img_avatar'] ?>" /></a>
                                                    </div>
                                                    <div class="content_right">
                                                        <a class="title_order"
                                                            href="index.php?quanly=chitietsanpham&id=<?php echo $row['id_sanpham'] ?>"
                                                            title="<?php echo $row['tensanpham'] ?>"><?php echo $row['tensanpham'] ?></a>




                                                    </div>

                                                </td>
                                                <td data-title="Giá" class="numeric">
                                                    <?php echo number_format($row['giakhuyenmai'], 0, ',', '.') . ' VNĐ' ?>
                                                </td>
                                                <td data-title="Số lượng" class="numeric">
                                                    <?php echo $row['soluongmua'] ?></td>
                                                <td data-title="Tổng" class="numeric">
                                                    <?php echo number_format($thanhtien, 0, ',', '.') . ' VNĐ' ?>
                                                </td>
                                            </tr>
                                            <?php
                                                    }
                                                    ?>
                                        </tbody>
                                    </table>
                                </div>
                                <table class="table totalorders">
                                    <tfoot>
                                        <tr class="order_summary discount">
                                            <td>Khuyến mãi </td>

                                            <td class="total money right">0đ</td>
                                        </tr>

                                        <tr class="order_summary ">
                                            <td colspan="">Phí vận chuyển</td>
                                            <td class="total money right">

                                                Miễn phí


                                            </td>

                                        </tr>

                                        <tr class="order_summary order_total">
                                            <td>Tổng tiền</td>
                                            <td class="right">
                                                <strong><?php echo number_format($tongtien, 0, ',', '.') . ' VNĐ' ?></strong>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
    }
    ?>
<?php
}
?>