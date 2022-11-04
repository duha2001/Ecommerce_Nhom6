<?php

// create session
session_start();

if (isset($_SESSION['username']) && isset($_SESSION['level'])) {
    // include file
    include('../layouts/header.php');
    include('../layouts/topbar.php');
    include('../layouts/sidebar.php');
    if (isset($_POST['themsanpham'])) {
        // create array error
        $error = array();
        $success = array();
        $showMess = false;

        // get id in form
        $tensanpham = $_POST['tensanpham'];
        $giagoc = $_POST['giagoc'];
        $giakhuyenmai = $_POST['giakhuyenmai'];


        $baohanh = $_POST['baohanh'];
        $khuyenmai = $_POST['khuyenmai'];

        $danhmuc = $_POST['danhmuc'];
        $loaisanpham = $_POST['loaisanpham'];
        $tructhuoc = $_POST['tructhuoc'];

        $tinh_trang = $_POST['tinh_trang'];
        $hopbaogom = $_POST['hopbaogom'];
        $noi_bat = $_POST['noi_bat'];
        $img_avatar = $_POST['img_avatar'];
        $mota = $_POST['mota'];
        $banner1 = $_POST['banner1'];
        $banner2 = $_POST['banner2'];
        $banner3 = $_POST['banner3'];
        $banner4 = $_POST['banner4'];
        $banner5 = $_POST['banner5'];
        $thong_so_ky_thuat = $_POST['thong_so_ky_thuat'];

        $nguoitao = $_POST['nguoitao'];
        $ngaytao = date("Y-m-d H:i:s");
        $hienthi = $_POST['hienthi'];
        $var = $_POST['danhmuc'];
        if ($var == 0) {
            $error['danhmuc'] = 'Vui lòng chọn<b> Danh mục sản phẩm</b>';
        }

        // validate
        if (empty($_POST['tensanpham']))
            $error['tensanpham'] = 'Vui lòng nhập<b> Tên sản phẩm</b>';

        if (empty($_POST['giagoc']))
            $error['giagoc'] = 'Vui lòng nhập<b> Giá gốc</b>';

        if (empty($_POST['giakhuyenmai']))
            $error['giakhuyenmai'] = 'Vui lòng nhập<b> Giá khuyến mãi</b>';

        if (empty($_POST['tinh_trang']))
            $error['tinh_trang'] = 'Vui lòng nhập<b> Tình trạng</b>';

        if (empty($_POST['hopbaogom']))
            $error['hopbaogom'] = 'Vui lòng nhập<b> Hộp bao gồm</b>';

        if (empty($_POST['baohanh']))
            $error['baohanh'] = 'Vui lòng nhập<b> Thông tin bảo hành</b>';

        if (empty($_POST['khuyenmai']))
            $error['khuyenmai'] = 'Vui lòng nhập<b> Nội dung Khuyến mãi</b>';

        if (empty($_POST['img_avatar']))
            $error['img_avatar'] = 'Vui lòng nhập<b> Ảnh đại diện sản phẩm</b>';

        if (empty($_POST['banner1']))
            $error['banner1'] = 'Vui lòng nhập<b> banner1</b>';

        if (empty($_POST['banner2']))
            $error['banner2'] = 'Vui lòng nhập<b> banner2</b>';

        if (empty($_POST['banner3']))
            $error['banner3'] = 'Vui lòng nhập<b> banner3</b>';

        if (empty($_POST['banner4']))
            $error['banner4'] = 'Vui lòng nhập<b> banner4</b>';

        if (empty($_POST['banner5']))
            $error['banner5'] = 'Vui lòng nhập<b> banner5</b>';

        if (empty($_POST['thong_so_ky_thuat']))
            $error['thong_so_ky_thuat'] = 'Vui lòng nhập<b> Thông số kỹ thuật</b>';

        // save to db
        if (!$error) {
            $showMess = true;
            // insert record
            $insert = "INSERT INTO tbl_sanpham (tensanpham,giagoc,giakhuyenmai,baohanh,khuyenmai,id_thuonghieu ,id_loaisanpham,id_tructhuoc,tinh_trang,hopbaogom,mota,noi_bat,img_avatar,banner1,banner2,banner3,banner4,banner5,thong_so_ky_thuat,nguoitao,ngaytao,hienthi) VALUES ('$tensanpham','$giagoc','$giakhuyenmai','$baohanh','$khuyenmai','$danhmuc ','$loaisanpham','$tructhuoc','$tinh_trang','$hopbaogom','$mota','$noi_bat','$img_avatar','$banner1','$banner2','$banner3','$banner4','$banner5','$thong_so_ky_thuat','$nguoitao','$ngaytao','$hienthi')";
            // var_dump($insert);
            // exit;
            mysqli_query($conn, $insert);
            // add image to folder
            $success['success'] = 'Thêm sản phẩm thành công.';
            echo '<script>setTimeout("window.location=\'ds-san-pham.php?p=sanpham&a=dssp\'",1000);</script>';
        }
    }
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Thêm sản phẩm
        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php?p=index&a=statistic"><i class="fa fa-dashboard"></i> Tổng quan</a></li>
            <li><a href="ds-san-pham.php?p=sanpham&a=dssp">Quản lý sản phẩm</a></li>
            <li class="active">Thêm sản phẩm</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Thêm sản phẩm</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->

                    <div class="box-body">
                        <?php
                            // show error
                            if (isset($error)) {
                                if ($showMess == false) {
                                    echo "<div class='alert alert-danger alert-dismissible'>";
                                    echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
                                    echo "<h4><i class='icon fa fa-ban'></i> Lỗi!</h4>";
                                    foreach ($error as $err) {
                                        echo $err . "<br/>";
                                    }
                                    echo "</div>";
                                }
                            }
                            ?>

                        <?php
                            // show success
                            if (isset($success)) {
                                if ($showMess == true) {
                                    echo "<div class='alert alert-success alert-dismissible'>";
                                    echo "<h4><i class='icon fa fa-check'></i> Thành công!</h4>";
                                    foreach ($success as $suc) {
                                        echo $suc . "<br/>";
                                    }
                                    echo "</div>";
                                }
                            }
                            ?>
                        <form role="form" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label>Tên sản phẩm: <b style="color: red;">*</b></label>
                                            <input autocomplete="off" type="text" class="form-control"
                                                placeholder="Nhập tên sản phẩm..." name="tensanpham">
                                        </div>

                                        <div class="form-group">
                                            <label>Giá gốc: <b style="color: red;">*</b></label>
                                            <input autocomplete="off" type="text" class="form-control"
                                                placeholder="Nhập giá gốc..." name="giagoc">
                                        </div>

                                        <div class="form-group">
                                            <label>Giá khuyến mãi: <b style="color: red;">*</b></label>
                                            <input autocomplete="off" type="text" class="form-control"
                                                placeholder="Nhập giá khuyến mãi..." name="giakhuyenmai">
                                        </div>

                                        <div class="form-group">
                                            <label>Bảo hành: <b style="color: red;">*</b></label>
                                            <input autocomplete="off" type="text" class="form-control"
                                                value="Bảo hành 12 tháng tại trung tâm bảo hành chính hãng Apple Việt Nam. 1 ĐỔI 1 trong 30 ngày nếu có lỗi nhà sản xuất."
                                                placeholder="Nhập nội dung bảo hành..." name="baohanh">
                                        </div>

                                        <div class="form-group">
                                            <label>Khuyến mãi: <b style="color: red;">*</b></label>
                                            <input autocomplete="off" type="text" class="form-control"
                                                value="Nhập MOCA400 Giảm/Hoàn tiền 10% tối đa 400.000đ khi thanh toán Online bằng ví Moca"
                                                placeholder="Nhập nội dung khuyến mãi..." name="khuyenmai">
                                        </div>

                                        <?php
                                            $sql_danhmuc = mysqli_query($conn, "SELECT * FROM tbl_danhmuc ORDER BY id_thuonghieu  ASC LIMIT 9");
                                            ?>
                                        <div class="form-group">
                                            <label>Danh mục sản phẩm: <b style="color: red;">*</b></label>
                                            <select class="form-control" id="danhmuc" name="danhmuc">
                                                <option value="0">---Vui lòng chọn danh mục sản phẩm---</option>
                                                <?php while ($rows_danhmuc = mysqli_fetch_array($sql_danhmuc)) {
                                                        echo '<option value="' . $rows_danhmuc['id_thuonghieu'] . '">' . $rows_danhmuc['title'] . '</option>';
                                                    } ?>
                                            </select>
                                            <small style="color: red;"><?php if (isset($error['danhmuc'])) {
                                                                                echo "Vui lòng chọn danh mục sản phẩm";
                                                                            } ?></small>
                                        </div>

                                        <div class="form-group">
                                            <label>Loại sản phẩm: <b style="color: red;">*</b></label>
                                            <select class="form-control" id="loaisanpham" name="loaisanpham">
                                                <option value="0">---Chọn danh mục sản phẩm trước---</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Trực thuộc: <b style="color: red;">*</b></label>
                                            <select class="form-control" id="tructhuoc" name="tructhuoc">
                                                <option value="0">---Chọn loại sản phẩm trước---</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Tình Trạng: <b style="color: red;">*</b></label>
                                            <input autocomplete="off" type="text" class="form-control"
                                                placeholder="Tình trạng thiết bị..." name="tinh_trang"
                                                value="Máy mới 100% , chính hãng Apple Việt Nam.">
                                        </div>

                                        <div class="form-group">
                                            <label>Hộp bao gồm: <b style="color: red;">*</b></label>
                                            <input autocomplete="off" type="text" class="form-control"
                                                placeholder="Hộp bao gồm..." name="hopbaogom"
                                                value="Thân máy, cáp USB-C to Lightning, sách HDSD">
                                        </div>

                                        <div class="form-group">
                                            <label>Ảnh đại diện: <b style="color: red;">*</b></label>
                                            <input autocomplete="off" type="text" class="form-control"
                                                placeholder="Nhập mô tả..." name="img_avatar">
                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label>Mô tả: <b style="color: red;">*</b></label>
                                            <textarea class="form-control" id="mota" name="mota"></textarea>
                                            <script>
                                            CKEDITOR.replace('mota');
                                            </script>
                                        </div>

                                        <div class="form-group">
                                            <label>Banner 1: <b style="color: red;">*</b></label>
                                            <input autocomplete="off" type="text" class="form-control"
                                                placeholder="Nhập mô tả..." name="banner1">
                                        </div>

                                        <div class="form-group">
                                            <label>Banner 2: <b style="color: red;">*</b></label>
                                            <input autocomplete="off" type="text" class="form-control"
                                                placeholder="Nhập mô tả..." name="banner2">
                                        </div>

                                        <div class="form-group">
                                            <label>Banner 3: <b style="color: red;">*</b></label>
                                            <input autocomplete="off" type="text" class="form-control"
                                                placeholder="Nhập mô tả..." name="banner3">
                                        </div>

                                        <div class="form-group">
                                            <label>Banner 4: <b style="color: red;">*</b></label>
                                            <input autocomplete="off" type="text" class="form-control"
                                                placeholder="Nhập mô tả..." name="banner4">
                                        </div>

                                        <div class="form-group">
                                            <label>Banner 5: <b style="color: red;">*</b></label>
                                            <input autocomplete="off" type="text" class="form-control"
                                                placeholder="Nhập mô tả..." name="banner5">
                                        </div>


                                        <div class="form-group">
                                            <label>Hiển thị Box khuyến mãi</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="hienthi"
                                                    id="exampleRadios1" value="0" checked>
                                                <label class="form-check-label" for="exampleRadios1">
                                                    Bảo hành
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="hienthi"
                                                    id="exampleRadios2" value="1">
                                                <label class="form-check-label" for="exampleRadios2">
                                                    Khuyến mãi
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="box box-success">
                                                <div class="box-header">
                                                    <h3 class="box-title">Hiển thị sản phẩm nổi bật</h3>
                                                </div>
                                                <div class="box-body">
                                                    <!-- radio -->
                                                    <div class="form-group">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="noi_bat"
                                                                id="exampleRadios1" value="1" checked>
                                                            <label class="form-check-label" for="exampleRadios1">
                                                                Bật
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="noi_bat"
                                                                id="exampleRadios2" value="0">
                                                            <label class="form-check-label" for="exampleRadios2">
                                                                Tắt
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.box-body -->
                                                <div class="box-footer">
                                                    API UPDATE IMAGE ONLINE. <a href="update-anh.php?p=sanpham&a=api"
                                                        target="_blank">UPLOAD IMAGE ONLINE</a>
                                                </div>
                                            </div>
                                            <!-- /.box -->
                                        </div>
                                        <!-- /.col (right) -->
                                    </div>
                                    <!-- /.row -->
                                </div>
                            </div>
                            <div class="form-group">
                                <label>THÔNG SỐ KỸ THUẬT <b style="color: red;">*</b></label>
                                <textarea class="form-control" name="thong_so_ky_thuat"></textarea>
                                <script>
                                CKEDITOR.replace('thong_so_ky_thuat');
                                </script>
                            </div>

                            <div class="form-group">
                                <label>Người tạo: <b style="color: red;">*</b></label>
                                <input type="text" class="form-control" readonly=""
                                    value="<?php echo $row_acc['ho']; ?> <?php echo $row_acc['ten']; ?>"
                                    name="nguoitao">
                            </div>
                            <div class="form-group">
                                <label>Ngày tạo:</label>
                                <input type="text" class="form-control" disabled=""
                                    data-inputmask="'alias': 'dd/mm/yyyy'" name="ngaytao"
                                    value="<?php echo date("d/m/Y"); ?>" data-mask>
                            </div>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <?php
                    if ($_SESSION['level'] == 0 || $_SESSION['level'] == 1)
                        echo "<button type='submit' class='btn btn-primary' name='themsanpham'><i class='fa fa-plus'></i> Thêm sản phẩm vào kho</button>";
                    ?>
            </div>
            </form>
        </div>
        <!-- /.box -->
</div>
</div>
<!-- /.row -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script type="text/javascript">
$(document).ready(function() {
    $('#danhmuc').change(function() {
        var id_thuonghieu = $(this).val();
        $.ajax({
            url: "ajaxloaisanpham.php", //gửi dữ liệu đến file ... để xử lý
            method: "POST",
            data: {
                id_thuonghieu: id_thuonghieu
            },
            success: function(data) {
                $('#loaisanpham').html(data);
            }
        });
    });
});
</script>

<script type="text/javascript">
$(document).ready(function() {
    $('#loaisanpham').change(function() {
        var id_thuonghieu = $(this).val();
        $.ajax({
            url: "ajaxtructhuoc.php", //gửi dữ liệu đến file ... để xử lý
            method: "POST",
            data: {
                id_thuonghieu: id_thuonghieu
            },
            success: function(data) {
                $('#tructhuoc').html(data);
            }
        });
    });
});
</script>
<?php
    // include
    include('../layouts/footer.php');
} else {
    // go to pages login
    header('Location: dang-nhap.php');
}

?>