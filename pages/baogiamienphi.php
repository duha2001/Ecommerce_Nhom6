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
				<strong itemprop="name">Báo giá miễn phí</strong>
				<meta itemprop="position" content="2" />
			</li>

		</ul>
	</div>
</section>
<h1 class="d-none">Báo giá miễn phí</h1>
<div class="container contact page-contacts">
	<div class="shadow-sm">
		<div class="row contact-padding">
			<div class="col-lg-6 col-md-6 col-sm-12 leave-your-message">
				<h3>Gửi yêu cầu báo giá, đặt hàng</h3>
				<p class="p-bottom">Khi có nhu cầu đơn hàng riêng, quý khách hàng có thể đặt mua với phòng kinh doanh của http://cod.test. Với kinh nghiệm hơn 10 năm hoạt động, http://cod.test sẽ nỗ lực hết mình để hài lòng quý khách hàng.</p>
				<div class="contact-box">

					<p><strong>Địa chỉ: </strong>280 An Dương Vương, Quận 7, TPHCM</p>


					<p><strong>Điện thoại: </strong><a href="tel:0270 3822 141" title="0270 3822 141">0366 6610 949</a></p>


					<p><strong>Email: </strong><a href="mailto:huynhanhdu2000@gmail.com" title="huynhanhdu2000@gmail.com">huynhanhdu2000@gmail.com</a></p>

				</div>
			</div>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
include 'pages/function.php';

if (isset($_POST['send'])) {
	if (isset($_FILES['file_upload'])) {
		$uploadedFiles = $_FILES['file_upload'];
		$result = uploadFiles($uploadedFiles);
		if (!empty($result['errors'])) {
			$error = $result['errors'];
		} else {
			$uploadedFiles = $result['uploaded_files'];
		}
	}

	if (!isset($error)) {
		include('./mail/cauhinh.php');
		include('../admin/carbon/vendor/autoload.php');
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$address = $_POST['diachi'];
	$noidungthu = $_POST['body'];
	$noidung = '';
	$noidung .= '<p>
    <b>Khách Hàng: </b>' . $name . '<br/>
    <b>Email: </b>' . $email . '<br/>
    <b>Số điện thoại: </b>' . $phone . '<br/>
    <b>Địa chỉ: </b>' . $address . '<br/>
    <b>Nội dung: </b>' . $noidungthu . '<br/>
    <b> Ngày đặt hàng: </b>' . date("d/m/Y") . '
    </p>';


	$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
	try {
		//Server settings
		$mail->CharSet = "UTF-8";
		$mail->SMTPDebug = 0;                                 // Enable verbose debug output
		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = SMTP_HOST;  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = SMTP_UNAME;                 // SMTP username
		$mail->Password = SMTP_PWORD;                           // SMTP password
		$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = SMTP_PORT_BAOGIA;                                    // TCP port to connect to
		//Recipients
		$mail->setFrom(SMTP_GMAILADMIN, SMTP_TENCUAHANG);

		$mail->addAddress('adhkmobile@gmail.com', SMTP_TENCUAHANG);     // Khách hàng đặt

		if (!empty($uploadedFiles)) {
			foreach ($uploadedFiles as $file) {
				$mail->addAttachment(realpath('.') . $file);
			}
		}
		$mail->isHTML(true);                                  // Set email format to HTML
		$mail->Subject = 'Yêu cầu báo giá từ khách hàng';
		$mail->Body = $noidung;
		$mail->AltBody = $noidung; //None HTML
		$result = $mail->send();
		if (!$result) {
			$error = "Có lỗi xảy ra trong quá trình gửi mail";
		}
	} catch (Exception $e) {
		echo 'Không xong rồi đại vương ơi ', $mail->ErrorInfo;
	}
}
	?>
	<div class = "container">
                <div class = "error"><?= isset($error) ? $error : "Gửi email thành công" ?></div>
                <a href = "index.php">Quay lại form gửi mail</a>
            </div>
<?php } else {
	?>
			<div class="col-lg-6 col-md-6 col-sm-12 leave-your-message">
				<form accept-charset="utf-8" action="" id="contact" method="post" enctype="multipart/form-data">
				<div class="row">
					<div class="col-sm-6 col-xs-12">
						<fieldset class="form-group">
							<label>Họ và tên<span class="required">*</span></label>
							<input placeholder="Nhập họ và tên" type="text" name="name" id="name" class="form-control  form-control-lg" data-validation-error-msg= "Không được để trống" data-validation="required" required />
						</fieldset>
					</div>
					<div class="col-sm-6 col-xs-12">
						<fieldset class="form-group">
							<label>Email<span class="required">*</span></label>
							<input placeholder="Nhập địa chỉ Email" type="email" name="email" data-validation="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$" data-validation-error-msg= "Email sai định dạng" id="email" class="form-control form-control-lg" required />
						</fieldset>
					</div>
					<div class="col-sm-12 col-xs-12">
						<fieldset class="form-group">
							<label>Điện thoại<span class="required">*</span></label>
							<input placeholder="Nhập số điện thoại" type="tel" name="phone" data-validation-error-msg= "Không được để trống" data-validation="required" id="tel" class="number-phone form-control form-control-lg" required />
						</fieldset>
					</div>
                    <div class="col-sm-12 col-xs-12">
						<fieldset class="form-group">
							<label>Địa chỉ<span class="required">*</span></label>
							<input placeholder="Nhập địa chỉ" type="text" name="diachi" data-validation-error-msg= "Không được để trống" data-validation="required" required />
						</fieldset>
					</div>
					<div class="col-sm-12 col-xs-12">
						<fieldset class="form-group">
							<label>Nội dung<span class="required">*</span></label>
							<textarea placeholder="Nội dung liên hệ" name="body" id="comment" class="form-control form-control-lg" rows="5" data-validation-error-msg= "Không được để trống" data-validation="required" required></textarea>
						</fieldset>
                    <div class="col-sm-12 col-xs-12">
						<fieldset class="form-group">
							<label>File đính kèm<span class="required">*</span></label>
                            <input class="form-control form-control-lg" multiple type="file" name="file_upload[]">(Chỉ chấp nhận word hoặc excel)</td>
                        </fieldset>
					</div>
						<fieldset class="form-group">
							<button type="submit" name="send" class="btn btn-blues btn-style btn-style-active">Gửi yêu cầu</button>
						</fieldset>
					</div>
				</div>
				</form>
			</div>
			<?php } ?>
		</div>
	</div>
</div>