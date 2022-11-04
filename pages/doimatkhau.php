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
                <strong itemprop="name">Thay đổi mật khẩu</strong>
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
                        <h5 class="title-account">Trang tài khoản</h5>
                        <p>Xin chào, <span style="color:red;"><?php
                                                                    if (isset($_SESSION['dangnhap_home'])) {
                                                                        echo  $_SESSION['dangnhap_home'];
                                                                    } ?></span>&nbsp;!</p>
                        <ul>
                            <?php include('accmenu.php'); ?>
                        </ul>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-lg-9 col-right-ac">
                    <h1 class="title-head margin-top-0">Đổi mật khẩu</h1>
                    <div class="page-login">
                        <form accept-charset="utf-8" action="/account/changepassword" id="change_customer_password"
                            method="post">
                            <input name="FormType" type="hidden" value="change_customer_password" />
                            <input name="utf8" type="hidden" value="true" />


                            <p>
                                Để đảm bảo tính bảo mật vui lòng đặt mật khẩu với ít nhất 8 kí tự
                            </p>
                            <div class="form-signup clearfix">
                                <fieldset class="form-group">
                                    <label for="oldPass">Mật khẩu cũ <span class="required">*</span></label>
                                    <input type="password" placeholder="Mật khẩu cũ" name="OldPassword" id="OldPass"
                                        required class="form-control form-control-lg">
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="changePass">Mật khẩu mới <span class="required">*</span></label>
                                    <input type="password" placeholder="Mật khẩu mới" name="Password" id="changePass"
                                        required class="form-control form-control-lg">
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="confirmPass">Xác nhận lại mật khẩu <span
                                            class="required">*</span></label>
                                    <input type="password" placeholder="Xác nhận lại mật khẩu" name="ConfirmPassword"
                                        id="confirmPass" required class="form-control form-control-lg">
                                </fieldset>
                                <button class="button btn-edit-addr btn btn-blues btn-more"><i
                                        class="hoverButton"></i>Đặt lại mật khẩu</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
}
?>