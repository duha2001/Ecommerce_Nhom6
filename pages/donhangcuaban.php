<?php
if (!isset($_SESSION['dangnhap_home'])) {
    echo '<script>setTimeout("window.location=\'index.php?quanly=khongtimthaytrang\'",100);</script>';
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
                <strong itemprop="name">Trang đơn hàng</strong>
                <meta itemprop="position" content="3" />
            </li>

        </ul>
    </div>
</section>
<section class="signup page_customer_account">
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
                <div class="col-xs-12 col-sm-12 col-lg-9 col-right-ac">
                    <h1 class="title-head margin-top-0">Đơn hàng của bạn</h1>
                    <div class="col-xs-12 col-sm-12 col-lg-12 no-padding">

                        <div class="my-account">
                            <div class="dashboard">

                                <div class="recent-orders">
                                    <div class="table-responsive tab-all">
                                        <table class="table table-cart table-order" id="my-orders-table">
                                            <?php
                                                $id_khachhang = $_SESSION['id_dangky'];
                                                $sql_lietke_dh = "SELECT * FROM tbl_cart,tbl_dangky,tbl_shipping WHERE tbl_cart.id_khachhang=tbl_dangky.id_dangky AND tbl_shipping.id_dangky = tbl_dangky.id_dangky AND tbl_cart.id_khachhang= $id_khachhang ORDER BY tbl_cart.id_cart DESC";
                                                $query_lietke_dh = mysqli_query($conn, $sql_lietke_dh);

                                                ?>
                                            <thead class="thead-default">
                                                <tr>
                                                    <th>Đơn hàng</th>
                                                    <th>Ngày</th>
                                                    <th>Địa chỉ</th>
                                                    <th>TT thanh toán</th>
                                                    <th title="Đơn hàng chưa vận chuyển được phép huỷ">TT Vận Chuyển</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                    $i = 0;
                                                    while ($row = mysqli_fetch_array($query_lietke_dh)) {
                                                        $i++;
                                                        $code = $row['code_cart'];
                                                    ?>
                                                <tr class="first odd">
                                                    <td><a
                                                            href="index.php?quanly=chitietdonhang&code=<?php echo $row['code_cart'] ?>">#<?php echo $row['code_cart'] ?></a>
                                                    </td>
                                                    <td><?php $date = date_create($row['cart_date']);
                                                                echo date_format($date, 'd-m-Y'); ?></td>
                                                    <td><?php echo $row['address'] ?></td>
                                                    <td>
                                                        <span class="span_pending"><?php
                                                                                            if ($row['cart_payment'] == 'vnpay' || $row['cart_payment'] == 'momo') {
                                                                                            ?>
                                                            <a style="color: green; font-weight: bold"
                                                                href="index.php?quanly=donhangcuaban&congthanhtoan=<?php echo $row['cart_payment'] ?>&code_cart=<?php echo $row['code_cart'] ?>">Đã
                                                                thanh toán bằng <?php echo $row['cart_payment'] ?></a>
                                                            <?php
                                                                                            } else {
                                                                    ?>
                                                            <?php if ($row['cart_payment'] == 'tienmat') {
                                                                                                    echo '<p style="color: red;">Chưa thu tiền</p>';
                                                                                                } elseif ($row['cart_payment'] == 'chuyenkhoan') {
                                                                                                    echo '<p style="color: #6a4c93;">Đang chờ thanh toán</p>';
                                                                                                } else {
                                                                                                    echo '<p style="color: green;">Đã thanh toán bằng PayPal</p>';
                                                                                                } ?>
                                                            <?php
                                                                                            }
                                                                    ?></span>
                                                    </td>
                                                    <?php
                $kiemtradh = "SELECT cart_status,cart_payment FROM tbl_cart WHERE code_cart = '$code'";
                $kiemtracode = mysqli_query($conn, $kiemtradh);
                $kiemtra = mysqli_fetch_assoc($kiemtracode);
                                                    ?>
                                                    <td>
                                                    <?php if ($kiemtra['cart_status'] == '1') {
                                                                                        echo "<a class='btn btn-dark' style='color: red;' href='index.php?quanly=huydonhang&huy=" . $row['code_cart'] . "'><i class='fa-solid fa-skull-crossbones'></i> Huỷ đơn hàng</a>";
                                                                                    } elseif ($kiemtra['cart_status'] == '2') {
                                                                                        echo '<span class="span_" style="color: blue">Đang giao hàng</span>';
                                                                                    } elseif ($kiemtra['cart_status'] == '3') {
                                                                                        echo '<span class="span_" style="color: green">Đã giao hàng thành công</span>';
                                                                                    } else {
                                                                                        if ($row['cart_payment'] == 'tienmat') {
                                                                                            echo '<span class="span_" style="color: red">Đơn hàng đã huỷ</span>';
                                                                                        } elseif ($row['cart_payment'] == 'chuyenkhoan') {
                                                                                            echo '<span class="span_" style="color: red">Tiền hoàn lại sau 24h(nếu đã TT)</span>';
                                                                                        } else {
                                                                                            echo '<span class="span_" style="color: red">Tiền hoàn lại sau 24h</span>';
                                                                                        }
                                                                                    } ?>
                                                    </td>
                                                </tr>
                                                <?php
                                                    }
                                                    ?>
                                            </tbody>
                                        </table>
                                        <?php
                                            if (isset($_GET['congthanhtoan'])) {
                                                $congthanhtoan = $_GET['congthanhtoan'];
                                                $code_cart = $_GET['code_cart'];
                                                echo '<h4>Chi tiết thanh toán qua cổng thanh toán : ' . $congthanhtoan . '</h4>';
                                                if ($congthanhtoan == 'momo') {
                                                    $sql_momo = mysqli_query($conn, "SELECT * FROM tbl_momo WHERE code_cart='$code_cart' LIMIT 1");
                                                    $row_momo = mysqli_fetch_array($sql_momo);
                                            ?>

                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Đơn hàng</th>
                                                    <th>Mô tả</th>
                                                    <th>Giá</th>
                                                    <th>Hình thức thanh toán</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>#<?php echo $row_momo['code_cart'] ?></td>
                                                    <td><?php echo $row_momo['order_info'] ?></td>
                                                    <td><?php echo number_format($row_momo['amount'], 0, ',', '.') . ' VNĐ' ?>
                                                    </td>
                                                    <td><?php echo $row_momo['pay_type'] ?></td>
                                                </tr>

                                            </tbody>
                                        </table>
                                        <?php
                                                } elseif ($congthanhtoan == 'vnpay') {
                                                    $sql_vnpay = mysqli_query($conn, "SELECT * FROM tbl_vnpay WHERE code_cart='$code_cart' LIMIT 1");
                                                    $row_vnpay = mysqli_fetch_array($sql_vnpay);
                                                ?>
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Giá trị hàng hoá</th>
                                                    <th>Ngân Hàng</th>
                                                    <th>Mô tả</th>
                                                    <th>Thời gian thanh toán</th>
                                                    <th>Đơn hàng</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><?php echo number_format($row_vnpay['vnp_amount']) . ' VNĐ' ?>
                                                    </td>
                                                    <td><?php echo $row_vnpay['vnp_bankCode'] ?></td>
                                                    <td><?php echo $row_vnpay['vnp_orderinfo'] ?></td>
                                                    <td>

                                                        <?php $date = date_create($row_vnpay['vnp_paydate']);
                                                                    echo date_format($date, 'H:i:s d-m-Y'); ?></td>
                                                    <td><?php echo $row_vnpay['code_cart'] ?></td>
                                                </tr>

                                            </tbody>
                                        </table>

                                        <?php
                                                }
                                            }
                                            ?>
                                    </div>

                                    <div
                                        class="paginate-pages pull-right page-account text-right col-xs-12 col-sm-12 col-md-12 col-lg-12">

                                    </div>
                                </div>
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