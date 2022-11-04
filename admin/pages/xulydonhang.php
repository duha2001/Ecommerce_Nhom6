<?php
include '../config.php';
$now = date('Y-m-d');

if (isset($_GET['cod'])) {
    $code = $_GET['cod'];
    $update = "UPDATE `tbl_cart` SET `cart_status` = '2' WHERE `tbl_cart`.`code_cart` = $code";
    $sql = mysqli_query($conn, $update);
} elseif (isset($_GET['check'])) {
    $code = $_GET['check'];
    //thong ke doanh thu
    $sql_lietke_dh = "SELECT * FROM tbl_cart_details,tbl_sanpham WHERE tbl_cart_details.id_sanpham=tbl_sanpham.id_sanpham AND tbl_cart_details.code_cart='$code' ORDER BY tbl_cart_details.id_cart_details DESC";
    $query_lietke_dh = mysqli_query($conn, $sql_lietke_dh);

    $sql_thongke = "SELECT * FROM tbl_thongke WHERE ngaydat='$now'";
    $query_thongke = mysqli_query($conn, $sql_thongke);

    $soluongmua = 0;
    $doanhthu = 0;
    while ($row = mysqli_fetch_array($query_lietke_dh)) {
        $soluongmua += $row['soluongmua'];
        $doanhthu += $row['giakhuyenmai'] * $soluongmua;
    }

    if (mysqli_num_rows($query_thongke) == 0) {
        $soluongban = $soluongmua;
        $doanhthu = $doanhthu;
        $donhang = 1;
        $sql_update_thongke = mysqli_query($conn, "INSERT INTO tbl_thongke (ngaydat,soluongban,doanhthu,donhang) VALUE('$now','$soluongban','$doanhthu','$donhang')");
    } elseif (mysqli_num_rows($query_thongke) != 0) {
        while ($row_tk = mysqli_fetch_array($query_thongke)) {
            $soluongban = $soluongmua;
            $soluongban = $row_tk['soluongban'] + $soluongban;
            $doanhthu = $row_tk['doanhthu'] + $doanhthu;
            $donhang = $row_tk['donhang'] + 1;
            $sql_update_thongke = mysqli_query($conn, "UPDATE tbl_thongke SET soluongban='$soluongban',doanhthu='$doanhthu',donhang='$donhang' WHERE ngaydat='$now'");
        }
    }
    $update = "UPDATE `tbl_cart` SET `cart_status` = '3' WHERE `tbl_cart`.`code_cart` = $code";
    $sql = mysqli_query($conn, $update);
} elseif (isset($_GET['huy'])) {
    $code = $_GET['huy'];
    $update = "UPDATE `tbl_cart` SET `cart_status` = '4' WHERE `tbl_cart`.`code_cart` = $code";
    $sql = mysqli_query($conn, $update);
} else {
    $code = $_GET['xoa'];
    $sql = mysqli_query($conn, "DELETE FROM `tbl_cart` WHERE `tbl_cart`.`code_cart` = $code");
    $sql = mysqli_query($conn, "DELETE FROM `tbl_cart_details` WHERE `tbl_cart_details`.`code_cart` = $code");
    $sql = mysqli_query($conn, "DELETE FROM `tbl_momo` WHERE `tbl_momo`.`code_cart` = $code");
    $sql = mysqli_query($conn, "DELETE FROM `tbl_vnpay` WHERE `tbl_vnpay`.`code_cart` = $code");
}
if ($sql) {
    echo '<script>setTimeout("window.location=\'quan-ly-don-hang.php?p=ql&a=donhang\'",1);</script>';
}