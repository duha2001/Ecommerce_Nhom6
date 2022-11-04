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
                        <form accept-charset="utf-8" action="" id="customer_register" method="post">
                            <div class="form-signup clearfix">
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php
                                        if (count($errors) == 1) {
                                        ?>
                                        <div class="alert alert-danger text-center">
                                            <?php
                                                foreach ($errors as $showerror) {
                                                    echo $showerror;
                                                }
                                                ?>
                                        </div>
                                        <?php
                                        } elseif (count($errors) > 1) {
                                        ?>
                                        <div class="alert alert-danger">
                                            <?php
                                                foreach ($errors as $showerror) {
                                                ?>
                                            <li><?php echo $showerror; ?></li>
                                            <?php
                                                }
                                                ?>
                                        </div>
                                        <?php
                                        }
                                        ?>


                                        <fieldset class="form-group">
                                            <label>Họ<span class="required">*</span></label>
                                            <input placeholder="Nhập Họ" type="text"
                                                class="form-control form-control-lg" value="" name="ho">
                                            <span class="form-message"></span>
                                        </fieldset>
                                    </div>
                                    <div class="col-md-12">
                                        <fieldset class="form-group">
                                            <label>Tên<span class="required">*</span></label>
                                            <input placeholder="Nhập Tên" type="text"
                                                class="form-control form-control-lg" value="" name="ten">
                                        </fieldset>
                                    </div>
                                    <div class="col-md-12">
                                        <fieldset class="form-group">
                                            <label>Số điện thoại<span class="required">*</span></label>
                                            <input placeholder="Nhập Số điện thoại" type="tel"
                                                class="number-phone form-control form-control-lg" value=""
                                                name="sdt">
                                        </fieldset>
                                    </div>
                                    <div class="col-md-12">
                                        <fieldset class="form-group">
                                            <label>Email<span class="required">*</span></label>
                                            <input placeholder="Nhập Địa chỉ Email" type="email"
                                                class="form-control form-control-lg" data-validation="email"
                                                pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$"
                                                value="" name="email" />
                                        </fieldset>
                                    </div>
                                    <div class="col-md-12">
                                        <fieldset class="form-group">
                                            <label>Mật khẩu<span class="required">*</span></label>
                                            <input placeholder="Nhập Mật khẩu" type="password"
                                                class="form-control form-control-lg" value="" name="password">
                                        </fieldset>
                                    </div>

                                    <div class="col-md-12 text-center margin-top-10">
                                        <input type="submit" value="Tạo tài khoản" name="signup"
                                            class="btn btn-style btn-blues"></input>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="clearfix"></div>
                        <div class="line-break">
                            <span>hoặc đăng nhập qua</span>
                        </div>
                        <div class="social-login text-center">
                      
                            <a href="javascript:void(0)" class="social-login--facebook" onclick="loginFacebook()"><img
                                    width="129px" height="37px" alt="facebook-login-button"
                                    src="//bizweb.dktcdn.net/assets/admin/images/login/fb-btn.svg"></a>
                            <a href="javascript:void(0)" class="social-login--google" onclick="loginGoogle()"><img
                                    width="129px" height="37px" alt="google-login-button"
                                    src="//bizweb.dktcdn.net/assets/admin/images/login/gp-btn.svg"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>