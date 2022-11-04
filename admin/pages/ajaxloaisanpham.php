<?php
require_once('../config.php');
//SELECT Du lieu

if (isset($_POST['id_thuonghieu'])) {
    $id_thuonghieu  = $_POST['id_thuonghieu'];
    $sql_loaisanpham = mysqli_query($conn, "SELECT * FROM tbl_danhmuc WHERE parent_id ='$id_thuonghieu'");
    $output = '';
    $output = '<option value="0">--Vui lòng chọn loại sản phẩm--</option>';
    if (mysqli_num_rows($sql_loaisanpham) > 0) {
        while ($rows_loaisanpham = mysqli_fetch_array($sql_loaisanpham)) {
            $output .= '<option value="' . $rows_loaisanpham['id_thuonghieu'] . '">' . $rows_loaisanpham['title'] . '</option>';
        }
    } else {
        $output = '<option value="0">Không có dữ liệu để load</option>';
    }
    echo $output;
}