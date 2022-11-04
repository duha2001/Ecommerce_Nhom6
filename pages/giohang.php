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
                <strong itemprop="name">Giỏ hàng</strong>
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


.callout {
    border-radius: 3px;
    margin: 0 0 20px 0;
    padding: 15px 30px 15px 15px;
    border-left: 5px solid #eee
}

.callout a {
    color: #fff;
    text-decoration: underline
}

.callout a:hover {
    color: #eee
}

.callout h4 {
    margin-top: 0;
    font-weight: 600
}

.callout p:last-child {
    margin-bottom: 0
}

.callout code,
.callout .highlight {
    background-color: #fff
}

.callout.callout-danger {
    border-color: #c23321
}

.callout.callout-warning {
    border-color: #c87f0a
}

.callout.callout-info {
    border-color: #0097bc
}

.callout.callout-success {
    border-color: #00733e
}

.callout.callout-danger,
.callout.callout-warning,
.callout.callout-info,
.callout.callout-success,
.alert-success,
.alert-danger,
.alert-error,
.alert-warning,
.alert-info,
.label-danger,
.label-info,
.label-warning,
.label-primary,
.label-success,
.modal-primary .modal-body,
.modal-primary .modal-header,
.modal-primary .modal-footer,
.modal-warning .modal-body,
.modal-warning .modal-header,
.modal-warning .modal-footer,
.modal-info .modal-body,
.modal-info .modal-header,
.modal-info .modal-footer,
.modal-success .modal-body,
.modal-success .modal-header,
.modal-success .modal-footer,
.modal-danger .modal-body,
.modal-danger .modal-header,
.modal-danger .modal-footer {
    color: #fff !important
}

.bg-gray {
    color: #000;
    background-color: #d2d6de !important
}

.bg-gray-light {
    background-color: #f7f7f7
}

.bg-black {
    background-color: #111 !important
}

.bg-red,
.callout.callout-danger,
.alert-danger,
.alert-error,
.label-danger,
.modal-danger .modal-body {
    background-color: #dd4b39 !important
}

.bg-yellow,
.callout.callout-warning,
.alert-warning,
.label-warning,
.modal-warning .modal-body {
    background-color: #f39c12 !important
}

.bg-aqua,
.callout.callout-info,
.alert-info,
.label-info,
.modal-info .modal-body {
    background-color: #00c0ef !important
}

.bg-blue {
    background-color: #0073b7 !important
}

.bg-light-blue,
.label-primary,
.modal-primary .modal-body {
    background-color: #3c8dbc !important
}

.bg-green,
.callout.callout-success,
.alert-success,
.label-success,
.modal-success .modal-body {
    background-color: #00a65a !important
}

.bg-navy {
    background-color: #001F3F !important
}

.bg-teal {
    background-color: #39CCCC !important
}

.bg-olive {
    background-color: #3D9970 !important
}
</style>
<div class="container">
    <!-- Responsive Arrow Progress Bar -->
    <div class="arrow-steps clearfix">
        <div class="step current"> <span> <a href="index.php?quanly=giohang">Giỏ hàng</a></span> </div>
        <div class="step"> <span><a href="index.php?quanly=vanchuyen">Đặt hàng</a></span> </div>
        <div class="step"> <span><a href="index.php?quanly=thongtinthanhtoan">Hình thức thanh toán</a></span> </div>
        <div class="step"> <a href="index.php?quanly=giohang">Hoàn tất mua hàng</a></div>
    </div>

</div>
<?php
}
?>

<div class="container contact page-contacts">
    <div class="shadow-sm">
        <div class="row contact-padding">
            <table style="width:100%;text-align: center;border-collapse: collapse;" border="1">
                <tr>
                    <!-- <th>STT</th>
                    <th>ID SP</th> -->
                    <th>
                        <center>THÔNG TIN SẢN PHẨM</center>
                    </th>
                    <th>
                        <center>ĐƠN GIÁ</center>
                    </th>
                    <th>
                        <center>SỐ LƯỢNG</center>
                    </th>
                    <th>
                        <center>THÀNH TIỀN</center>
                    </th>

                </tr>
                <?php
                if (isset($_SESSION['cart'])) {
                    $i = 0;
                    $tongtien = 0;
                    foreach ($_SESSION['cart'] as $cart_item) {
                        $thanhtien = $cart_item['soluong'] * $cart_item['giakhuyenmai'];
                        $tongtien += $thanhtien;
                        $i++;
                ?>
                <tr>
                    <td>
                        <center>
                            <img src="<?php echo $cart_item['img_avatar']; ?>" width="150px">
                        </center>

                        <center>
                            <a class="btn btn-dark" href="pages/themgiohang.php?xoa=<?php echo $cart_item['id'] ?>"><i
                                    class="fa fa-trash" aria-hidden="true"></i></a>
                        </center>
                        <hr>
                        <center>
                            <?php echo $cart_item['tensanpham']; ?>
                        </center>
                    </td>
                    <td>
                        <center>
                            <?php echo number_format($cart_item['giakhuyenmai'], 0, ',', '.') . 'vnđ'; ?>
                        </center>
                    </td>
                    <td>
                        <center>
                            <a href="pages/themgiohang.php?cong=<?php echo $cart_item['id'] ?>"><i
                                    class="fa fa-plus fa-style" aria-hidden="true"></i></a>
                            <?php echo $cart_item['soluong']; ?>
                            <a href="pages/themgiohang.php?tru=<?php echo $cart_item['id'] ?>"><i
                                    class="fa fa-minus fa-style" aria-hidden="true"></i></a>
                        </center>

                    </td>
                    <td>
                        <center>
                            <?php echo number_format($thanhtien, 0, ',', '.') . 'vnđ' ?>
                        </center>
                    </td>
                </tr>
                <?php
                    }
                    ?>
                <tr>
                    <td colspan="8">
                        <p style="float: right; color: red;">TỔNG TIỀN:
                            <?php echo number_format($tongtien, 0, ',', '.') . 'vnđ' ?>

                        <p style="float: left;"><a class="btn btn-light" href="pages/themgiohang.php?xoatatca=1"><i
                                    class="fa fa-trash" aria-hidden="true"></i> Clear</a></p>
                        <div style="clear: both;"></div>
                        <p style="float: left;"><a class="btn btn-light" href="/"><i class="fa fa-arrow-left"
                                    aria-hidden="true"></i> Tiếp tục mua hàng</a></p>


                        <?php
                            if (isset($_SESSION['dangnhap_home'])) {
                            ?>
                        <p style="float: right;"><a class="btn btn-danger" href="index.php?quanly=vanchuyen">Tiếp
                                tục thanh toán</a>
                        </p>
                        <?php
                            } else {
                            ?>
                        <p style="float: right;"><a class="btn btn-primary" href="index.php?quanly=register">Đăng kí
                                đặt
                                hàng</a>
                            <?php
                            }
                                ?>
                    </td>
                </tr>
                <?php
                } else {
                ?>
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
                <?php
                }
                ?>
            </table>

        </div>
    </div>
</div>