<?php

// connect database
require_once('../config.php');

// get info acount share to all view
$email = $_SESSION['username'];
$acc = "SELECT * FROM tai_khoan WHERE email = '$email'";
$result_acc = mysqli_query($conn, $acc);
$row_acc = mysqli_fetch_array($result_acc);

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="../dist/images/icon-admin.jpeg" type="image/x-icon" />
    <title>SMART STORE - THẾ GIỚI DI DỘNG</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="../bower_components/morris.js/morris.css">
    <link rel="stylesheet" href="../bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="../plugins/iCheck/all.css">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="../bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="../plugins/timepicker/bootstrap-timepicker.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="../bower_components/select2/dist/css/select2.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/css/stylett1.css">
    <link rel="stylesheet" href="../dist/css/stylett2.css">
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- <script src="//cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script> -->
    <!-- CK Editor -->
    <script src="../bower_components/ckeditor/ckeditor.js"></script>







    <!-- Biểu đồ -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <!-- Biểu đồ -->











</head>
<style>
.example-modal .modal {
    position: relative;
    top: auto;
    bottom: auto;
    right: auto;
    left: auto;
    display: block;
    z-index: 1;
}

.example-modal .modal {
    background: transparent !important;
}
</style>
<?php
// Đếm chờ xác nhận
$cxn = "SELECT count(cart_status) as choxacnhan FROM tbl_cart WHERE cart_status= 1";
$result_cxn = mysqli_query($conn, $cxn);
$row_cxn = mysqli_fetch_array($result_cxn);
$tong_cxn = $row_cxn['choxacnhan'];

//Đếm đang giao hàng
$dgh = "SELECT count(cart_status) as danggiaohang FROM tbl_cart WHERE cart_status= 2";
$result_dgh = mysqli_query($conn, $dgh);
$row_dgh = mysqli_fetch_array($result_dgh);
$tong_dgh = $row_dgh['danggiaohang'];

//Đếm chờ giao thành công
$ghtc = "SELECT count(cart_status) as giaohangthanhcong FROM tbl_cart WHERE cart_status= 3";
$result_ghtc = mysqli_query($conn, $ghtc);
$row_ghtc = mysqli_fetch_array($result_ghtc);
$tong_ghtc = $row_ghtc['giaohangthanhcong'];

//Đếm chờ đơn hàng đã hủy
$dhdh = "SELECT count(cart_status) as donhangdahuy FROM tbl_cart WHERE cart_status= 4";
$result_dhdh = mysqli_query($conn, $dhdh);
$row_dhdh = mysqli_fetch_array($result_dhdh);
$tong_dhdh = $row_dhdh['donhangdahuy'];
?>