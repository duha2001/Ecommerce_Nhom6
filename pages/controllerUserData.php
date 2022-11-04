<?php
session_start();
require('admin/config.php');
require('mail/sendmail.php');
$errors = array();




//if user signup button
if (isset($_POST['signup'])) {
    $ho = mysqli_real_escape_string($conn, $_POST['ho']);
    $ten = mysqli_real_escape_string($conn, $_POST['ten']);
    $sdt = mysqli_real_escape_string($conn, $_POST['sdt']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $email_check = "SELECT * FROM tbl_dangky WHERE email = '$email'";
    $res = mysqli_query($conn, $email_check);
    if (mysqli_num_rows($res) > 0) {
        $errors['email'] = "Email bạn nhập đã tồn tại!";
    }
    if (count($errors) === 0) {
        $encpass = password_hash($password, PASSWORD_BCRYPT);
        $code = rand(999999, 111111);
        $status = "Chưa xác minh";
        $insert_data = "INSERT INTO tbl_dangky (ho, ten, sdt, email, password, code, status)
                        values('$ho', '$ten', '$sdt', '$email', '$encpass', '$code', '$status')";
        $data_check = mysqli_query($conn, $insert_data);
        if ($data_check) {
            $tieude = "Mã xác minh email!";
            $noidung .= "Mã xác minh của bạn là $code";
            if ($tieude != NULL &&  $noidung != NULL) {

                $maildathang = $email;
                $mail = new Mailer();
                $mail->dathangmail($tieude, $noidung, $maildathang);
                $info = "Chúng tôi đã gửi mã xác minh đến email của bạn - $email";

                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                header('location: index.php?quanly=xacminhotp');
                exit();
            } else {
                $errors['otp-error'] = "Không thành công khi gửi mã!";
            }
        } else {
            $errors['db-error'] = "Không thành công khi chèn dữ liệu vào cơ sở dữ liệu!";
        }
    }
}
//if user click verification code submit button
if (isset($_POST['check'])) {
    $_SESSION['info'] = "";
    $otp_code = mysqli_real_escape_string($conn, $_POST['otp']);
    $check_code = "SELECT * FROM tbl_dangky WHERE code = $otp_code";
    $code_res = mysqli_query($conn, $check_code);
    if (mysqli_num_rows($code_res) > 0) {
        $fetch_data = mysqli_fetch_array($code_res);
        $fetch_code = $fetch_data['code'];
        $email = $fetch_data['email'];

        $code = 0;
        $status = 'xác minh';
        $update_otp = "UPDATE tbl_dangky SET code = $code, status = '$status' WHERE code = $fetch_code";
        $update_res = mysqli_query($conn, $update_otp);
        if ($update_res) {
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            $_SESSION['dangnhap_home'] = $fetch_data['ten'];
            $_SESSION['id_dangky'] = $fetch_data['id_dangky'];
            header('location: index.php');
            exit();
        } else {
            $errors['otp-error'] = "Không thành công khi cập nhật mã!";
        }
    } else {
        $errors['otp-error'] = "Bạn đã nhập sai mã!";
    }
}

//if user click login button
if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $check_email = "SELECT * FROM tbl_dangky WHERE email = '$email'";
    $res = mysqli_query($conn, $check_email);
    if (mysqli_num_rows($res) > 0) {
        $fetch = mysqli_fetch_array($res);
        $fetch_pass = $fetch['password'];
        if (password_verify($password, $fetch_pass)) {
            $_SESSION['email'] = $email;
            $status = $fetch['status'];
            if ($status == 'xác minh') {
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                $_SESSION['dangnhap_home'] = $fetch['ten'];
                $_SESSION['id_dangky'] = $fetch['id_dangky'];
                header('location: index.php');
            } else {
                $info = "Có vẻ như bạn vẫn chưa xác minh email của mình - $email";
                $_SESSION['info'] = $info;
                header('location: index.php?quanly=xacminhotp');
            }
        } else {
            $errors['email'] = "Email hoặc mật khẩu không chính xác!";
        }
    } else {
        $errors['email'] = "Có vẻ như bạn chưa phải là thành viên! Nhấp vào liên kết dưới cùng để đăng ký.";
    }
}

//if user click continue button in forgot password form
if (isset($_POST['check-email'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $check_email = "SELECT * FROM tbl_dangky WHERE email='$email'";
    $run_sql = mysqli_query($conn, $check_email);
    if (mysqli_num_rows($run_sql) > 0) {
        $code = rand(999999, 111111);
        $insert_code = "UPDATE tbl_dangky SET code = $code WHERE email = '$email'";
        $run_query =  mysqli_query($conn, $insert_code);
        if ($run_query) {
            $tieude = "Lấy Lại Mật Khẩu!";
            $noidung .= "Mã đặt lại mật khẩu của bạn là $code";
            if ($tieude != NULL &&  $noidung != NULL) {
                $maildathang = $email;
                $mail = new Mailer();
                $mail->dathangmail($tieude, $noidung, $maildathang);
                $info = "Chúng tôi đã gửi một otp đặt lại mật khẩu tới email của bạn- $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                header('location: index.php?quanly=resetcode');
                exit();
            } else {
                $errors['otp-error'] = "Không thành công khi gửi mã!";
            }
        } else {
            $errors['db-error'] = "Đã xảy ra lỗi!";
        }
    } else {
        $errors['email'] = "Địa chỉ email này không tồn tại!";
    }
}

//if user click check reset otp button
if (isset($_POST['check-reset-otp'])) {
    $_SESSION['info'] = "";
    $otp_code = mysqli_real_escape_string($conn, $_POST['otp']);
    $check_code = "SELECT * FROM tbl_dangky WHERE code = $otp_code";
    $code_res = mysqli_query($conn, $check_code);
    if (mysqli_num_rows($code_res) > 0) {
        $fetch_data = mysqli_fetch_array($code_res);
        $email = $fetch_data['email'];
        $_SESSION['email'] = $email;
        $info = "Vui lòng tạo một mật khẩu mới mà bạn không sử dụng trên bất kỳ trang web nào khác.";
        $_SESSION['info'] = $info;
        header('location: index.php?quanly=resetpass');
        exit();
    } else {
        $errors['otp-error'] = "Bạn đã nhập sai mã!";
    }
}

//if user click change password button
if (isset($_POST['change-password'])) {
    $_SESSION['info'] = "";
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
    if ($password !== $cpassword) {
        $errors['password'] = "Xác nhận mật khẩu không khớp!";
    } else {
        $code = 0;
        $email = $_SESSION['email']; //getting this email using session
        $encpass = password_hash($password, PASSWORD_BCRYPT);
        $update_pass = "UPDATE tbl_dangky SET code = $code, password = '$encpass' WHERE email = '$email'";
        $run_query = mysqli_query($conn, $update_pass);
        if ($run_query) {
            $info = "Mật khẩu của bạn đã thay đổi. Bây giờ bạn có thể đăng nhập bằng mật khẩu mới của mình.";
            $_SESSION['info'] = $info;
            header('Location: index.php?quanly=passwordchanged');
        } else {
            $errors['db-error'] = "Không thể thay đổi mật khẩu của bạn!";
        }
    }
}

//if login now button click
if (isset($_POST['login-now'])) {
    header('Location: index.php?quanly=login');
}