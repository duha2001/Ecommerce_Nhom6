<?php
include('./pages/controllerUserData.php');
include('./admin/config.php');
include('./layouts/header.php');

if (!isset($_GET['quanly'])) {
    include('./layouts/top.php');
    include('./layouts/nav.php');
    include('./layouts/banner.php');
    include('./layouts/tinkhuyenmai.php');
    include('./layouts/allsl.php');
    include('./pages/LV1.php');
    include('./pages/LV2.php');
    include('./pages/LV3.php');
    include('./pages/LV4.php');
    include('./pages/congnghe.php');
    
} else {
    include('./layouts/top.php');
    include('./layouts/nav2.php');
}
if (isset($_GET['quanly'])) {
    $tam = $_GET['quanly'];
} else {
    $tam = '';
}
if ($tam == 'gioithieu') {
    include('./pages/gioithieu.php');
} elseif ($tam == 'tragop') {
    include('./pages/tragop.php');
} elseif ($tam == 'allsp') {
    include('./pages/allsp.php');
} elseif ($tam == 'login') {
    include('./pages/dang-nhap.php');
} elseif ($tam == 'register') {
    include('./pages/dang-ky.php');
} elseif ($tam == 'giohang') {
    include('./pages/giohang.php');
} elseif ($tam == 'vanchuyen') {
    include('./pages/vanchuyen.php');
} elseif ($tam == 'thongtinthanhtoan') {
    include('./pages/thongtinthanhtoan.php');
} elseif ($tam == 'hoantat') {
    include('./pages/hoantat.php');
} elseif ($tam == 'baogiamienphi') {
    include('./pages/baogiamienphi.php');
} elseif ($tam == 'thongtintaikhoan') {
    include('./pages/thongtintaikhoan.php');
} elseif ($tam == 'donhangcuaban') {
    include('./pages/donhangcuaban.php');
} elseif ($tam == 'doimatkhau') {
    include('./pages/doimatkhau.php');
} elseif ($tam == 'danhmucsanpham') {
    include('./pages/danhmucsanpham.php');
} elseif ($tam == 'danhmucthuonghieudienthoai') {
    include('./pages/danhmucthuonghieudienthoai.php');
} elseif ($tam == 'danhmucthuonghieulaptop') {
    include('./pages/danhmucthuonghieulaptop.php');
} elseif ($tam == 'danhmucthuonghieutablet') {
    include('./pages/danhmucthuonghieutablet.php');
} elseif ($tam == 'danhmucthuonghieuphukien') {
    include('./pages/danhmucthuonghieuphukien.php');
} elseif ($tam == 'xacminhotp') {
    include('./pages/xac-minh-otp.php');
} elseif ($tam == 'resetcode') {
    include('./pages/reset-code.php');
} elseif ($tam == 'resetpass') {
    include('./pages/reset-pass-new.php');
} elseif ($tam == 'passwordchanged') {
    include('./pages/password-changed.php');
} elseif ($tam == 'dangxuat') {
    include('./pages/dang-xuat.php');
} elseif ($tam == 'danhmuctructhuoc') {
    include('./pages/danhmuctructhuoc.php');
} elseif ($tam == 'chitietsanpham') {
    include('./pages/chitietsanpham.php');
} elseif ($tam == 'chitietdonhang') {
    include('./pages/chitietdonhang.php');
} elseif ($tam == 'khongtimthaytrang') {
    include('./pages/404.php');
} elseif ($tam == 'timkiem') {
    include('./pages/timkiem.php');
}elseif ($tam == 'huydonhang') {
    include('./pages/xulyhuydonhang.php');
}elseif ($tam == 'livestream') {
    include('./pages/livestream.php');
}elseif ($tam == 'tintuccongnghe') {
    include('./pages/tintuccongnghe.php');
}elseif ($tam == 'xulythanhtoan') {
    include('./pages/xulythanhtoan.php');
}elseif ($tam == 'hoantat') {
    include('./pages/hoantat.php');
}else {
}
include('./layouts/footer.php');
?>
<script src="https://kit.fontawesome.com/3f5eefe195.js" crossorigin="anonymous"></script>
<script src="https://sp.zalo.me/plugins/sdk.js"></script>

</html>