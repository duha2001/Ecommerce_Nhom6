<?php
$email = $_SESSION['email'];
if ($email == false) {
    header('Location: index.php?quanly=login');
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
                <strong itemprop="name">Đăng ký tài khoản</strong>
                <meta itemprop="position" content="2" />
            </li>

        </ul>
    </div>
</section>
<div class="container margin-bottom-20 margin-top-30">
    <h1 class="d-none">Đăng ký tài khoản</h1>
    <div class="row justify-content-md-center">
        <div class="col-lg-8 col-md-12">
            <div class="page-login account-box-shadow">
                <div id="login" class="row">
                    <div
                        class="col-lg-6 col-md-6 account-banner order-lg-first order-md-first order-sm-last order-last">
                        <div class="account_policy_title">Quyền lợi thành viên</div>
                        <div class="account_policy_content">
                            <p>Mua hàng khắp thế giới cực dễ dàng, nhanh chóng</p>
                            <p>Theo dõi chi tiết đơn hàng, địa chỉ thanh toán dễ dàng</p>
                            <p>Nhận nhiều chương trình ưu đãi hấp dẫn từ chúng tôi</p>
                        </div>
                    </div>
                    <div
                        class="col-lg-6 col-md-6 evo-account-content order-lg-last order-md-last order-sm-first order-first">
                        <ul class="auth-block__menu-list">
                            <li>
                                <a href="index.php?quanly=login" title="Đăng nhập">Đăng nhập</a>
                            </li>
                            <li class="active">
                                <a href="#" title="Đăng ký">Đăng ký</a>
                            </li>
                        </ul>
                        <form accept-charset="utf-8" action="" id="customer_register" autocomplete="off" method="post">
                            <center>
                                <h1><b>Xác minh mã</b></h1>
                            </center>
                            <?php
                            if (isset($_SESSION['info'])) {
                            ?>
                            <div class="alert alert-success text-center" style="padding: 0.4rem 0.4rem">
                                <?php echo $_SESSION['info']; ?>
                            </div>
                            <?php
                            }
                            ?>
                            <?php
                            if (count($errors) > 0) {
                            ?>
                            <div class="alert alert-danger text-center">
                                <?php
                                    foreach ($errors as $showerror) {
                                        echo $showerror;
                                    }
                                    ?>
                            </div>
                            <?php
                            }
                            ?>
                            <div class="form-signup clearfix">
                                <fieldset class="form-group">
                                    <input type="number" class="form-control form-control-lg" name="otp" required=""
                                        placeholder="Enter code">
                                </fieldset>
                            </div>
                            <div class="action_bottom text-center">
                                <button class="btn btn-style btn-blues" style="margin-top: 10px;" name="check-reset-otp"
                                    type="submit">Xác
                                    minh</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>