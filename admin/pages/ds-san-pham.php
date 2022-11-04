<?php

// create session
session_start();

if (isset($_SESSION['username']) && isset($_SESSION['level'])) {
    // include file
    include('../layouts/header.php');
    include('../layouts/topbar.php');
    include('../layouts/sidebar.php');

    if (isset($_POST['edit'])) {
        $id = $_POST['idSP'];
        echo "<script>location.href='sua-san-pham.php?p=sanpham&a=dssp&id=" . $id . "'</script>";
    }

    // delete record
    if (isset($_GET['xoa'])) {
        $showMess = true;
        $id = $_GET['xoa'];
        $delete = "DELETE FROM tbl_sanpham WHERE id_sanpham = '$id'";
        mysqli_query($conn, $delete);
        $success['success'] = 'Xóa sản phẩm thành công.';
        echo '<script>setTimeout("window.location=\'ds-san-pham.php?p=sanpham&a=dssp\'",1000);</script>';
    }


    if (isset($_POST['copy'])) {
        $id = $_POST['idSP'];
        echo "<script>location.href='copy-san-pham.php?p=sanpham&a=dssp&id=" . $id . "'</script>";
    }
    // show data
    $showData = "SELECT id_sanpham, tensanpham, img_avatar, giakhuyenmai, id_thuonghieu FROM tbl_sanpham ORDER BY id_sanpham  DESC";
    $result = mysqli_query($conn, $showData);
    $arrSanPhamhow = array();
    while ($row = mysqli_fetch_array($result)) {
        $arrSanPhamhow[] = $row;
    }
?>
<!-- Modal -->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="./xoasanpham.php">
                <div class="modal-header">
                    <span style="font-size: 18px;">Thông báo</span>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="idSP" value="8">
                    Bạn có thực sự muốn xóa sản phẩm này?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy bỏ</button>
                    <button type="submit" class="btn btn-primary" name="delete">Xóa</button>
                </div>
            </form>
        </div>
    </div>
</div> -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Danh sách sản phẩm
        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php?p=index&a=statistic"><i class="fa fa-dashboard"></i> Tổng quan</a></li>
            <li><a href="ds-thiet-bi.php?p=salary&a=dsvt">Danh sách sản phẩm</a></li>
            <li class="active">Kiểm kê tài sản</li>
        </ol>
    </section>
    <?php
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
        // show error
        if (isset($success)) {
            if ($showMess == true) {
                echo "<div class='alert alert-success alert-dismissible'>";
                echo "<h4><i class='icon fa fa-check'></i>Thành công !</h4>";
                foreach ($success as $suc) {
                    echo $suc . "<br/>";
                }
                echo "</div>";
            }
        }
        ?>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <a class="btn btn-primary" href="them-san-pham.php?p=sanpham&a=themsanpham" role="button">Thêm
                            sản phẩm</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên thiết bị</th>
                                        <th>Hình ảnh</th>
                                        <th>Giá</th>
                                        <th>Loại sản phẩm</th>
                                        <th>Copy</th>
                                        <th>Sửa</th>
                                        <th>Xoá</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $count = 1;
                                        foreach ($arrSanPhamhow as $arrSanPham) {
                                        ?>
                                    <tr>
                                        <td><?php echo $count; ?></td>
                                        <td><?php echo $arrSanPham['tensanpham']; ?></td>
                                        <td><img src=" <?php echo $arrSanPham['img_avatar']; ?>" width="80"></td>
                                        <td style="color: #f72585;">
                                            <?php echo number_format($arrSanPham['giakhuyenmai']) . 'VNĐ' ?></td>
                                        <td>
                                            <?php $showdanhmuc = $arrSanPham['id_thuonghieu'];
                                                    $rs_danhmuc = mysqli_query($conn, "SELECT * FROM tbl_danhmuc WHERE id_thuonghieu = $showdanhmuc");
                                                    $show_dm = mysqli_fetch_array($rs_danhmuc);
                                                    echo $show_dm['title']; ?>
                                        </td>

                                        <th>
                                            <?php
                                                    if ($_SESSION['level'] == 0) {
                                                        echo "<form method='POST'>";
                                                        echo "<input type='hidden' value='" . $arrSanPham['id_sanpham'] . "' name='idSP'/>";
                                                        echo "<button type='submit' class='btn btn-primary btn-flat'  name='copy'><i class='fa fa-clone'></i></button>";
                                                        echo "</form>";
                                                    } else {
                                                        echo "<button type='button' class='btn btn-primary btn-flat' disabled><i class='fa fa-clone'></i></button>";
                                                    }
                                                    ?>

                                        </th>

                                        <th>
                                            <?php
                                                    if ($_SESSION['level'] == 0 || $_SESSION['level'] == 1) {
                                                        echo "<form method='POST'>";
                                                        echo "<input type='hidden' value='" . $arrSanPham['id_sanpham'] . "' name='idSP'/>";
                                                        echo "<button type='submit' class='btn bg-orange btn-flat'  name='edit'><i class='fa fa-edit'></i></button>";
                                                        echo "</form>";
                                                    } else {
                                                        echo "<button type='button' class='btn bg-orange btn-flat' disabled><i class='fa fa-edit'></i></button>";
                                                    }
                                                    ?>

                                        </th>
                                        <th>
                                            <?php
                                                    if ($_SESSION['level'] == 0) {
                                                    ?>
                                            <a class='btn bg-red btn-flat'
                                                href="?xoa=<?php echo $arrSanPham['id_sanpham'] ?>"
                                                onclick="return confirm('Bạn có muốn xoá sản phẩm: <?= $arrSanPham['tensanpham'] ?>')"><i
                                                    class="fas fa-trash-alt"></i></a>
                                            <?php
                                                    // echo "<button type='button' class='btn bg-red btn-flat' data-toggle='modal' data-target='#exampleModal' data-whatever='" . $arrSanPham['id_sanpham'] . "'><i class='fa fa-trash'></i></button>";
                                                    } else {
                                                        echo "<button type='button' class='btn bg-red btn-flat' disabled><i class='fa fa-trash'></i></button>";
                                                    }
                                                    ?>
                                        </th>
                                    </tr>
                                    <?php
                                            $count++;
                                        }
                                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>

<?php
    // include
    include('../layouts/footer.php');
} else {
    // go to pages login
    header('Location: dang-nhap.php');
}

?>