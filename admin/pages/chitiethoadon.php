<?php

// create session
session_start();

if (isset($_SESSION['username']) && isset($_SESSION['level'])) {
    // include file
    include('../layouts/header.php');
    include('../layouts/topbar.php');
    include('../layouts/sidebar.php');
    $id_khachhang = $_GET['id_khachhang'];

    $code = $_GET['code'];
    $sql_lietke_dh = "SELECT * FROM tbl_cart_details,tbl_sanpham WHERE tbl_cart_details.id_sanpham=tbl_sanpham.id_sanpham AND tbl_cart_details.code_cart='" . $code . "' ORDER BY tbl_cart_details.id_cart_details DESC";
    $query_lietke_dh = mysqli_query($conn, $sql_lietke_dh);

    $sql_kiemtra = "SELECT tbl_cart.code_cart, tbl_cart.cart_date, tbl_cart.cart_payment FROM tbl_cart where tbl_cart.cart_shipping = tbl_cart.id_khachhang AND code_cart = $code";
    $query_kiemtra = mysqli_query($conn, $sql_kiemtra);
    $kiemtra = mysqli_fetch_assoc($query_kiemtra);

    $sql_layten = "SELECT ten FROM tbl_dangky WHERE id_dangky = $id_khachhang";
    $query_layten = mysqli_query($conn, $sql_layten);
    $layten = mysqli_fetch_assoc($query_layten);


    $sql_locdulieu = "SELECT * FROM tbl_shipping WHERE id_dangky = $id_khachhang";
    $query_locdulieu = mysqli_query($conn, $sql_locdulieu);
    $locdulieu = mysqli_fetch_assoc($query_locdulieu);
?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Hoá đơn bán hàng
        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php?p=index&a=statistic"><i class="fa fa-dashboard"></i> Tổng quan</a></li>
            <li><a href="quan-ly-don-hang.php?p=ql&a=donhang"> QL Đơn hàng</a></li>
            <li class="active">Hoá đơn</li>
        </ol>
    </section>


    <section class="invoice">
        <!-- title row -->
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header"><img style=" width: 120px;
    height: 50px;" src="../../dist/images/pc.png">Hợp Đồng Mua Bán Công ty trách nhiệm hữu hạn 2 thành
                    viên ADHK Mobile
                    <small class="pull-right">Ngày đặt: <?php $date_cre = date_create(isset($kiemtra['cart_date']));
                                                            echo date_format($date_cre, 'd/m/Y'); ?></small>
                </h2>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
                <strong>BÊN BÁN HÀNG(NGƯỜI GỬI)</strong>
                <address>
                    <strong>Gorillas Company</strong><br>
                    Điện thoại: (+84) 366610949<br>
                    Địa chỉ: 280 An Dương Vương, Phường 4, Quận 5, TPHCM<br>
                    Email: adhkmobile@gmail.com
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                <strong>BÊN MUA HÀNG (NGƯỜI NHẬN)</strong>
                <address style="">
                    <strong>Anh/Chị, <?= $layten['ten'] ?></strong><br>
                    Điện thoại: (+84) <?= $locdulieu['phone'] ?><br>
                    Họ và tên: <?= $locdulieu['name'] ?><br>
                    Địa chỉ: <?= $locdulieu['address'] ?><br>
                    Email: <?= $locdulieu['email'] ?>
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                <b>Đơn Hàng ID:</b> #<?= $code ?><br>
                <br>
                <b>Ngày thanh toán:</b> <?php $date_cre = date_create(isset($kiemtra['cart_date']));
                                            echo date_format($date_cre, 'd/m/Y'); ?><br>
                <b style="font-size: 12px;">Kính chúc quý khách hàng nhiều sức khỏe, thành công, hạnh phúc và thịnh
                    vượng
                    trong năm
                    <?php echo date('Y'); ?>!</b>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Table row -->
        <div class="row">
            <div class="col-xs-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Mã sản phẩm #</th>
                            <th>Ảnh hàng hoá</th>
                            <th>Tên hàng hoá</th>
                            <th>Đơn giá</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
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
                            <td><?php echo $i ?></td>
                            <td>#<?php echo $row['id_sanpham'] ?></td>
                            <td><img style=" width: 75px;
    height: 75px;" src="<?php echo $row['img_avatar'] ?>" alt="<?php echo $row['tensanpham'] ?>"></td>
                            <td><?php echo $row['tensanpham'] ?>
                            </td>
                            <td><?php echo number_format($row['giakhuyenmai'], 0, ',', '.') . ' VNĐ' ?></td>
                            <td><?php echo $row['soluongmua'] ?></td>
                            <td><?php echo number_format($thanhtien, 0, ',', '.') . ' VNĐ' ?></td>
                        </tr>
                        <?php
                            }
                            ?>
                    </tbody>
                </table>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
            <!-- accepted payments column -->
            <div class="col-xs-6">
                <p class="lead">Các Phương thức thanh toán được chấp thuận:</p>
                <img src="../../dist/images/payment_1.svg" alt="Visa">
                <img src="../../dist/images/payment_2.svg" alt="Mastercard">
                <img src="../../dist/images/paypal2.png" alt="Paypal">
                <img src="../../dist/images/payment_3.svg" alt="JCB">
                <img src="../../dist/images/payment_4.svg" alt="Tiền mặt">
                <img src="../../dist/images/payment_5.svg" alt="Internet banking">
                <img src="../../dist/images/payment_6.svg" alt="Trả góp">


                <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                    Ghi chú <br />
                    Cho khách xem hàng
                </p>
            </div>
            <!-- /.col -->
            <div class="col-xs-6">
                <p class="lead">Xuất hoá đơn: <?php echo date('H:i:s d/m/Y'); ?></p>

                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th style="width:50%">Khuyến mãi:</th>
                            <td>0đ</td>
                        </tr>
                        <tr>
                            <th>Phí vận chuyển</th>
                            <td>Miễn phí</td>
                        </tr>
                        <tr>
                            <th>Tổng giá trị hoá đơn:</th>
                            <td><?php echo number_format($tongtien, 0, ',', '.') . ' VNĐ' ?></td>
                        </tr>
                        <tr style="color: red">
                            <th>Nhân viên giao hàng thu hộ:</th>
                            <td><?php
                                    if (isset($kiemtra['cart_payment']) == 'tienmat') {
                                        echo number_format($tongtien, 0, ',', '.') . ' VNĐ';
                                    } else {
                                        echo '0đ (Đã thanh toán)';
                                    }
                                    ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- this row will not appear when printing -->
        <div class="row no-print">
            <div class="col-xs-12">
                <button onclick="window.print();" class="btn btn-default">
                    <i class="fa fa-print"></i> Print Me
                </button>
                <a href="index.php?p=index&a=statistic" target="_blank" class="btn btn-success pull-right"><i
                        class="fa fa-credit-card"></i> Thống
                    kê
                    doanh thu
                </a>
                <button onclick="window.print(); type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
                    <i class="fa fa-download"></i> Xuất PDF
                </button>
            </div>
        </div>
    </section>
    <div class="clearfix"></div>
</div>
<?php
    // include
    include('../layouts/footer.php');
} else {
    // go to pages login
    header('Location: dang-nhap.php');
}

?>