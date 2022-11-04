<?php

// create session
session_start();

if (isset($_SESSION['username']) && isset($_SESSION['level'])) {
    // include file
    include('../layouts/header.php');
    include('../layouts/topbar.php');
    include('../layouts/sidebar.php');

    $sql_select = mysqli_query($conn, "SELECT * FROM `fileup` WHERE isdelete = 1");
    //khôi phục toàn bộ
    if (isset($_POST['khoiphucdulieu'])) {
        $error = array();
        $success = array();
        $error = false;
        if (!$error) {
            $showMess = true;
            // remove record
            $delRecord = "UPDATE `fileup` SET isdelete = 0 WHERE isdelete = 1";
            mysqli_query($conn, $delRecord);
            $success['success'] = 'Đã khôi phục toàn bộ dữ liệu.';
            echo '<script>setTimeout("window.location=\'thungrac.php\'",1000);</script>';
        }
    }
    //khôi phục 1
    if (isset($_GET['khoiphuc'])) {
        $id = $_GET['khoiphuc'];
        $error = array();
        $success = array();
        $error = false;
        if (!$error) {
            $showMess = true;
            // remove record
            $delRecord = "UPDATE fileup SET isdelete='0' WHERE id_fileup ='$id'";
            mysqli_query($conn, $delRecord);
            $success['success'] = 'Đã khôi phục thành công.';
            echo '<script>setTimeout("window.location=\'thungrac.php\'",1000);</script>';
        }
    }
    if (isset($_GET['xoa'])) {
        $id = $_GET['xoa'];
        $error = array();
        $success = array();
        $error = false;
        if (!$error) {
            $showMess = true;

            // remove image
            $dir = '../uploads/drive/';
            $getImage = "SELECT image_fileup FROM fileup WHERE id_fileup = $id";
            $rs_getImage = mysqli_query($conn, $getImage);
            $row_getImage = mysqli_fetch_array($rs_getImage);
            $image = $row_getImage['image_fileup'];
            if ($image != 'file.png') //nếu có hình admin.png thì ko xoá được còn khác thì xoá
                unlink($dir . $image);

            // remove record
            $delRecord = "DELETE FROM fileup WHERE id_fileup ='$id'";
            mysqli_query($conn, $delRecord);
            $success['success'] = 'Xoá vĩnh viễn.';
            echo '<script>setTimeout("window.location=\'thungrac.php\'",1000);</script>';
        }
    }

    if (isset($_POST['donsachthungrac'])) {
        if (!$error) {
            $showMess = true;
            // remove image
            $dir = '../uploads/drive/';
            $getImage = "SELECT image_fileup FROM fileup WHERE isdelete = '1'";
            $rs_getImage = mysqli_query($conn, $getImage);
            $row_getImage = mysqli_fetch_array($rs_getImage);
            $image = $row_getImage['image_fileup'];
            if ($image != 'file.png') //nếu có hình admin.png thì ko xoá được còn khác thì xoá
                unlink($dir . $image);

            // remove record
            $delRecord = "DELETE FROM fileup WHERE isdelete ='1'";
            mysqli_query($conn, $delRecord);
            $success['success'] = 'Đã dọn sạch thùng rác.';
            echo '<script>setTimeout("window.location=\'thungrac.php\'",1000);</script>';
        }
    }



?>
<div class="modal fade" id="donsachthungrac" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST">
                <div class="modal-header">
                    <span style="font-size: 18px;">Thông báo</span>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="">
                    Bạn có thực sự muốn xóa hết tất cả dữ liệu này?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy bỏ</button>
                    <button type="submit" class="btn btn-danger" name="donsachthungrac">Dọn sạch thùng rác</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="khoiphuctatca" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST">
                <div class="modal-header">
                    <span style="font-size: 18px;">Thông báo</span>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="">
                    Bạn có muốn khôi phục toàn bộ tất cả dữ liệu này?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy bỏ</button>
                    <button type="submit" class="btn btn-success" name="khoiphucdulieu">Khôi phục toàn bộ dữ
                        liệu</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            THÙNG RÁC
        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php?p=index&a=statistic"><i class="fa fa-dashboard"></i> Tổng quan</a></li>
            <li><a href="thanh-toan.php?p=bieumau&a=tailieu">Biểu mẫu</a></li>
            <li class="active">Drive</li>
        </ol>

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
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">THÙNG RÁC KHO LƯU TRỮ TÀI LIỆU SỐ</h3>
                        <form method='POST' style="float: right;">
                            <button type="button" class="btn bg-maroon btn-flat" data-toggle="modal"
                                data-target='#donsachthungrac'><i class='fa fa-trash'> Dọn sạch thùng rác</i></button>
                        </form>
                        <button style="float: right; margin-right: 10px;" type="button" class="btn btn-success"
                            data-toggle="modal" data-target='#khoiphuctatca'><i class='fas fa-trash-restore'> Khôi phục
                                tất cả</i></button>

                    </div>

                    <div>
                        <div>
                            <div class="list-itemmm" style="padding: 32px">
                                <?php
                                    while ($row = mysqli_fetch_array($sql_select)) {
                                    ?>
                                <div class="itemK2">
                                    <div class="edit-itemm">
                                        <span class="edit-bttt"><a href="?khoiphuc=<?php echo $row['id_fileup'] ?>"
                                                onclick="return confirm('Khôi phục: <?= $row['image_fileup'] ?>')"><i
                                                    class="fas fa-undo-alt"></i></a></span>
                                        <span class="delete-bttt"><a href="?xoa=<?php echo $row['id_fileup'] ?>"
                                                onclick="return confirm('Xoá vĩnh viễn file: <?= $row['image_fileup'] ?>')"><i
                                                    class="fas fa-trash-alt"></i></a></span>
                                    </div>
                                    <div class="abcde">
                                        <img src="../uploads/drive/file.png" width="65">
                                    </div>
                                    <div class="itemmname2" style="height: 25px; font-size: 15px;">
                                        <?php echo $row['title_fileup']; ?></div>
                                </div>
                                <?php
                                    }
                                    ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->

</div>

<!-- /.content-wrapper -->
<?php
    // include
    include('../layouts/footer.php');
} else {
    // go to pages login
    header('Location: dang-nhap.php');
}

?>