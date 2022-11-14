<?php
include "PHPMailer/src/PHPMailer.php";
include "PHPMailer/src/Exception.php";
include "PHPMailer/src/OAuth.php";
include "PHPMailer/src/POP3.php";
include "PHPMailer/src/SMTP.php";
include "cauhinh.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


class Mailer
{
	public function dathangmail($tieude, $noidung, $maildathang)
	{
		//print_r($mail);
		$mail = new PHPMailer(true);
		$mail->CharSet = 'UTF-8';
		try {
			//Server settings
			$mail->SMTPDebug = 0;                                 // Enable verbose debug output
			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = SMTP_HOST;  // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = SMTP_UNAME;                 // SMTP username
			$mail->Password = SMTP_PWORD; // Phiên bản mới tạo app trong gmail sử dụng mật khẩu application
			//$mail->Password = 'EVEmgFUD';                           // Phiên bản cũ xử dụng pk của gmail hiện tại
			$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
			$mail->Port = SMTP_PORT;                                    // TCP port to connect to
			//$mail->Port = 465; //Cổng SMTP
			// Bước 1: Đăng nhập vào tài khoản Gmail trên web gmail.com
			//Bước 2: bật bảo mật 2 lớp
			//Bước 3: tạo mk cho ứng dụng
			//Bước 4: sao chép mật khẩu ứng dụng dán vào đây
			//Phải chỉnh sửa lại
			//Recipients
			$mail->setFrom(SMTP_GMAILADMIN, SMTP_TENCUAHANG);

			$mail->addAddress($maildathang, SMTP_TENCUAHANG);     // Khách hàng đặt
			// Name is optional
			// $mail->addReplyTo('info@example.com', 'Information');
			$mail->addCC(SMTP_GMAILADMIN); // Admin nhận 1 gmail có người đặt hàng
			// $mail->addBCC('bcc@example.com');

			//Attachments
			// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
			// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

			//Content
			$mail->isHTML(true);                                  // Set email format to HTML
			$mail->Subject = $tieude;
			$mail->Body    = $noidung;
			// $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            $mail->send();
			//Gửi email thành công load lại trang tránh insert trùng dữ liệu
// 			if ($mail->Send()) {
// 				echo '<script>setTimeout("window.location=\'index.php?quanly=hoantat\'",200);</script>';
// 			}
		} catch (Exception $e) {
			//Gửi không được, đưa ra thông báo lỗi
			echo 'Không xong rồi đại vương ơi ', $mail->ErrorInfo;
		}
	}
}