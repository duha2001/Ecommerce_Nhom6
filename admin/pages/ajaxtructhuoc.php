<?php
require_once('../config.php');
//SELECT Du lieu
if (isset($_POST['id_thuonghieu'])) {
    $id_thuonghieu  = $_POST['id_thuonghieu'];
    $sql_tructhuoc = mysqli_query($conn, "SELECT * FROM tbl_danhmuctructhuoc WHERE id ='$id_thuonghieu'");
    $show = '';
    $show = '<option value="0">--Vui lòng chọn sản phẩm trực thuộc--</option>';
    if (mysqli_num_rows($sql_tructhuoc) > 0) {
        while ($rows_tructhuoc = mysqli_fetch_array($sql_tructhuoc)) {
            $show .= '<option value="' . $rows_tructhuoc['id_danhmuc'] . '">' . $rows_tructhuoc['title'] . '</option>';
        }
    } else {
        $show = '<option value="0">Không có dữ liệu để load</option>';
    }
    echo $show;
}