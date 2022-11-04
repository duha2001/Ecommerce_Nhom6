<style>
.form-group.invalid .form-control {
    border-color: #f33a58;
}

.form-group.invalid .form-message {
    color: #f33a58;
}
</style>

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
                <strong itemprop="name">Đăng nhập tài khoản</strong>
                <meta itemprop="position" content="2" />
            </li>

        </ul>
    </div>
</section>
<div class="container margin-bottom-20 margin-top-30">
    <div class="d-none">
        <h1 class="title-head">Đăng nhập tài khoản</h1>
    </div>
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
                            <li class="active">
                                <a href="#" title="Đăng nhập">Đăng nhập</a>
                            </li>
                            <li>
                                <a href="index.php?quanly=register" title="Đăng ký">Đăng ký</a>
                            </li>
                        </ul>
                        <div id="evo-login">
                            <form accept-charset="utf-8" action="" id="customer_login" method="post">
                                <input name="FormType" type="hidden" value="customer_login" />
                                <input name="utf8" type="hidden" value="true" />
                                <div class="form-signup">
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
                                </div>
                                <div class="form-signup clearfix">
                                    <fieldset class="form-group margin-bottom-10">
                                        <label>Email<span class="required">*</span></label>
                                        <input autocomplete="off" placeholder="Nhập Địa chỉ Email" type="email"
                                            class="form-control form-control-lg" value="" name="email"
                                            id="customer_email" required data-validation="email"
                                            pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$"
                                            data-validation-error-msg="Email sai định dạng" />
                                    </fieldset>
                                    <fieldset class="form-group margin-bottom-0">
                                        <label>Mật khẩu<span class="required">*</span></label>
                                        <input autocomplete="off" placeholder="Nhập Mật khẩu" type="password"
                                            class="form-control form-control-lg" value="" name="password"
                                            id="customer_password" data-validation-error-msg="Không được để trống"
                                            data-validation="required" />
                                    </fieldset>
                                    <div class="clearfix"></div>
                                    <p class="text-right recover">
                                        <a href="#recover" class="btn-link-style" onclick="showRecoverPasswordForm();"
                                            title="Quên mật khẩu?">Quên mật khẩu?</a>
                                    </p>
                                    <div class="pull-xs-left text-center" style="margin-top: 15px;">
                                        <button class="btn btn-style btn-blues" type="submit" name="login"
                                            value="Đăng nhập">Đăng
                                            nhập</button>
                                    </div>
                                    <p class="login--notes">Evo Mobile cam kết bảo mật và sẽ không bao giờ đăng <br>hay
                                        chia sẻ thông tin mà chưa có được sự đồng ý của bạn.</p>
                                </div>
                            </form>

                            <div class="clearfix"></div>
                            <div class="line-break">
                                <span>hoặc đăng nhập qua</span>
                            </div>
                            <div class="social-login text-center">
                               
                                <a href="javascript:void(0)" class="social-login--facebook"
                                    onclick="loginFacebook()"><img width="129px" height="37px"
                                        alt="facebook-login-button"
                                        src="//bizweb.dktcdn.net/assets/admin/images/login/fb-btn.svg"></a>
                                <a href="javascript:void(0)" class="social-login--google" onclick="loginGoogle()"><img
                                        width="129px" height="37px" alt="google-login-button"
                                        src="//bizweb.dktcdn.net/assets/admin/images/login/gp-btn.svg"></a>
                            </div>
                        </div>
                        <div id="recover-password" class="form-signup" style="display:none;">
                            <div class="fix-sblock text-center">
                                Bạn quên mật khẩu? Nhập địa chỉ email để lấy lại mật khẩu qua email.
                            </div>
                            <form accept-charset="utf-8" action="" id="recover_customer_password" method="post"
                                class="has-validation-callback" autocomplete="off">
                                <input name="FormType" type="hidden" value="recover_customer_password">
                                <input name="utf8" type="hidden" value="true">
                                <div class="form-signup">

                                </div>

                                <div class="form-signup clearfix">
                                    <fieldset class="form-group">
                                        <label>Enter your email address<span class="required">*</span></label>
                                        <input type="email" class="form-control form-control-lg" value="" name="email"
                                            id="recover-email" placeholder="Enter email address" data-validation="email"
                                            pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$"
                                            data-validation-error-msg="Email sai định dạng" required="">
                                    </fieldset>
                                </div>
                                <div class="action_bottom text-center">
                                    <button class="btn btn-style btn-blues" style="margin-top: 10px;" type="submit"
                                        name="check-email">Lấy lại mật khẩu</button>
                                </div>
                                <div class="text-login text-center">
                                    <p>Quay lại <a href="javascript:;" class="btn-link-style btn-register"
                                            onclick="hideRecoverPasswordForm();" title="Quay lại">tại đây.</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
// form quên mật khẩu 

function showRecoverPasswordForm() {
    document.getElementById('recover-password').style.display = 'block';
    document.getElementById('evo-login').style.display = 'none';
}

function hideRecoverPasswordForm() {
    document.getElementById('recover-password').style.display = 'none';
    document.getElementById('evo-login').style.display = 'block';
}
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Mong muốn của chúng ta
    Validator({
        form: '#customer_login',
        formGroupSelector: '.form-group',
        errorSelector: '.form-message',
        rules: [
            Validator.isEmail('#customer_email'),
            Validator.minLength('#customer_password', 6),
        ],
        onSubmit: function(data) {
            // Call API
            console.log(data);
        }
    });
});
</script>
<!-- <script src="./dist/js/script.js"></script> -->