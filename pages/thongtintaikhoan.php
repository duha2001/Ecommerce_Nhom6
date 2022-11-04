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
                <strong itemprop="name">Trang thông tin khách hàng</strong>
                <meta itemprop="position" content="2" />
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
                        <h5 class="title-account margin-top-10">Trang tài khoản</h5>
                        <p>Xin chào, <span style="color:red;"><?php
                                                                    if (isset($_SESSION['dangnhap_home'])) {
                                                                        echo  $_SESSION['dangnhap_home'];
                                                                    } ?></span>&nbsp;!</p>
                        <?php include('accmenu.php'); ?>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-lg-9 col-right-ac">
                    <h1 class="title-head margin-top-10">Thông tin tài khoản</h1>
                    <div class="form-signup name-account m992">
                        <p><strong>Xin chào quý khách:</strong> <?php
                                                                    if (isset($_SESSION['dangnhap_home'])) {
                                                                        echo  $_SESSION['dangnhap_home'];
                                                                    } ?></p>
                        <?php
                            $id_khachhang = $_SESSION['id_dangky'];
                            $sql_lietke_dh2 = "SELECT * FROM tbl_shipping WHERE id_dangky='$id_khachhang'";
                            $query_lietke_dh2 = mysqli_query($conn, $sql_lietke_dh2);
                            $laytrangthai = mysqli_fetch_assoc($query_lietke_dh2);
                            ?>
                        <p> <strong>Email:</strong> <?= $laytrangthai['email'] ?></p>
                        <p> <strong>Điện thoại:</strong> <?= $laytrangthai['phone'] ?> </p>
                        <p><strong>Địa chỉ :</strong> <?= $laytrangthai['address'] ?></p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
}
?>