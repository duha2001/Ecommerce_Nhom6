<?php
$email = $_SESSION['email'];
if ($email == false) {
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
                        <h1 class="title-head"><span>Đổi mật khẩu</span></h1>
                    </div>
                    <form accept-charset="utf-8" action="" id="reset_customer_password" method="post">
                        <input name="FormType" type="hidden" value="reset_customer_password" />
                        <input name="utf8" type="hidden" value="true" />
                        <?php
                        if (isset($_SESSION['info'])) {
                        ?>
                        <div class="alert alert-success text-center">
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
                        <div class="row">
                            <div class="col-md-12">
                                <fieldset class="form-group">
                                    <label>Mật khẩu mới<span class="required">*</span></label>
                                    <input placeholder="Mật khẩu mới" type="password"
                                        class="form-control form-control-lg" value="" name="password"
                                        id="customer_password" required data-validation-error-msg="Không được để trống"
                                        data-validation="required">
                                </fieldset>
                            </div>
                            <div class="col-md-12">
                                <fieldset class="form-group">
                                    <label>Xác nhận mật khẩu<span class="required">*</span></label>
                                    <input placeholder="Xác nhận mật khẩu" type="password"
                                        class="form-control form-control-lg" value="" name="cpassword"
                                        id="customer_password_confirmation" required
                                        data-validation-error-msg="Không được để trống" data-validation="required">
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-xs-12 text-center" style="margin-top:15px; padding: 0">
                            <button type="summit" name="change-password" class="btn btn-style btn-blues">Đặt lại mật
                                khẩu</button>
                        </div>
                        <input name="Token" type="hidden" value="58c94573a8c1223952f85f8290ca87ec-12948987" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>