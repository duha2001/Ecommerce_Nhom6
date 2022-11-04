<?php
if ($_SESSION['info'] == false) {
    header('Location: dangnhap.php');
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
                <strong itemprop="name">Đổi mật khẩu</strong>
                <meta itemprop="position" content="2" />
            </li>

        </ul>
    </div>
</section>
<div class="container margin-bottom-20 margin-top-30">
    <div id="customer-reset-password">
        <div class="form-signup clearfix">
            <div class="row justify-content-md-center">
                <div class="col-lg-8 col-md-12">
                    <div class="text-center">
                        <h1 class="title-head"><span>Mật khẩu của bạn đã được thay đổi thành công</span></h1>
                    </div>
                    <form accept-charset="utf-8" action="" id="" method="post">
                        <?php
                        if (isset($_SESSION['info'])) {
                        ?>
                        <div class="alert alert-success text-center">
                            <?php echo $_SESSION['info']; ?>
                        </div>
                        <?php
                        }
                        ?>

                        <div class="col-xs-12 text-center" style="margin-top:15px; padding: 0">
                            <button type="summit" name="login-now" class="btn btn-style btn-blues">Đăng Nhập
                                ngay</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>