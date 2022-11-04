<?php

// create session
session_start();

if (isset($_SESSION['username']) && isset($_SESSION['level'])) {
    // include file
    include('../layouts/header.php');
    include('../layouts/topbar.php');
    include('../layouts/sidebar.php');

    if (isset($_POST['edit'])) {
        $id = $_POST['id'];
        echo "<script>location.href='?quanly=capnhat&id=" . $id . "'</script>";
    }

    //Thêm
    if (isset($_POST['them'])) {
        // create error array
        $error = array();
        $success = array();
        $showMess = false;


        $title = $_POST['title'];

        // validate
        if (empty($_POST['title']))
            $error['title'] = 'Vui lòng nhập <b> tên  folder</b>';



        // save to db
        if (!$error) {
            $showMess = true;
            // update record
            $sql_insert = mysqli_query($conn, "INSERT INTO tbl_danhmuc(title) VALUES('$title')");

            $success['success'] = 'Thêm thành công.';
            echo '<script>setTimeout("window.location=\'danh-muc-con.php?p=quanly&a=danhmuc\'",1000);</script>';
        }
    } elseif (isset($_POST['capnhat'])) {

        // create error array
        $error = array();
        $success = array();
        $showMess = false;

        $id_thuonghieu = $_POST['id_thuonghieu'];
        $title = $_POST['title'];

        // validate
        if (empty($_POST['title']))
            $error['title'] = 'Vui lòng nhập <b> tên  tbl_danhmuc</b>';

        // save to db
        if (!$error) {
            $showMess = true;
            // update record
            $sql_update = mysqli_query($conn, "UPDATE tbl_danhmuc SET title='$title' WHERE id_thuonghieu = '$id_thuonghieu'");
            $success['success'] = 'Cập nhật thành công.';
            echo '<script>setTimeout("window.location=\'danh-muc-con.php?p=quanly&a=danhmuc\'",1000);</script>';
        }
    } elseif (isset($_POST['delete'])) {
        $showMess = true;
        $id = $_POST['id_thuonghieu'];
        $delete = "DELETE FROM tbl_danhmuc WHERE id_thuonghieu = $id";
        $result = mysqli_query($conn, $delete);
        if (!$result) {
            $warning['warning'] = 'Thực hiện này không được phép sẽ sảy ra <b>lỗi nghiêm trọng</b> nếu bạn cố thực hiện hành động này.';
            echo '<script>setTimeout("window.location=\'danh-muc-con.php?p=quanly&a=danhmuc\'",1000);</script>';
        }
    }

?>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                    <input type="hidden" name="id_thuonghieu">
                    Bạn có thực sự muốn xóa danh mục này?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy bỏ</button>
                    <button type="submit" class="btn btn-primary" name="delete">Xóa</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            QUẢN LÝ DANH MỤC
            <small>Danh mục con</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php?p=index&a=statistic"><i class="fa fa-dashboard"></i> Tổng quan</a></li>
            <li class="active">Quản lý danh mục</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- sửa -->
            <?php
                if (isset($_GET['quanly']) == 'capnhat') {
                    $id_capnhat = $_GET['id'];
                    $sql_capnhat = mysqli_query($conn, "SELECT * FROM tbl_danhmuc WHERE id_thuonghieu = '$id_capnhat'");
                    $row_capnhat = mysqli_fetch_array($sql_capnhat);
                ?>
            <!-- Thêm -->
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
                    // show error
                    if (isset($success)) {
                        if ($showMess == true) {
                            echo "<div class='alert alert-success alert-dismissible'>";
                            echo "<h4><i class='icon fa fa-check'></i>Cập nhật thành công !</h4>";
                            foreach ($success as $suc) {
                                echo $suc . "<br/>";
                            }
                            echo "</div>";
                        }
                    }
                    ?>
            <div class="col-lg-6">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Cập nhật danh mục con </h3>
                    </div>
                    <!-- /.box-header -->
                    <form role="form" action="" method="POST">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên danh mục</label>
                                <input type="folder" class="form-control" name="title" id="exampleInputEmail1"
                                    value="<?php echo $row_capnhat['title'] ?>">
                                <input type="hidden" class="form-control" name="id_thuonghieu"
                                    value="<?php echo $row_capnhat['id_thuonghieu'] ?>">
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary" name="capnhat">Cập nhật</button>
                        </div>
                    </form>
                    <!-- /.box-body -->
                </div>
                <!-- Thêm -->
                <?php
                } else {
                    ?>
                <!-- Thêm -->

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
                <?php
                        // show error
                        if (isset($warning)) {
                            if ($showMess == true) {
                                echo "<div class='alert alert-info alert-dismissible'>";
                                echo "<h4><i class='icon fa fa-check'></i>Không xong rồi đại vương ơi!</h4>";
                                foreach ($warning as $warning) {
                                    echo $warning . "<br/>";
                                }
                                echo "</div>";
                            }
                        }
                        ?>


                <div class="col-lg-6">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Thêm danh mục</h3>
                        </div>
                        <!-- /.box-header -->
                        <form role="form" action="" method="POST">
                            <div class="box-body">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Danh mục cha:<b style="color: red;">*</b></label>
                                        <select class="form-control select2" style="width: 100%;" name="tinhtrang">
                                            <?php
                                                    $sql_hienthidanhmuc = "SELECT id_thuonghieu, title FROM tbl_danhmuc LIMIT 0,4";
                                                    $query_hienthidanhmuc = mysqli_query($conn, $sql_hienthidanhmuc);

                                                    $count = 1;
                                                    while ($row_hienthidanhmuc = mysqli_fetch_array($query_hienthidanhmuc)) {
                                                    ?>
                                            <option value="<?= $row_hienthidanhmuc['id_thuonghieu']; ?>">
                                                <?= $row_hienthidanhmuc['title']; ?></option>

                                            <?php }  ?>
                                        </select>
                                    </div>

                                    <label for="exampleInputEmail1">Tên danh mục con</label>


                                    <input type="folder" class="form-control" name="title" id="exampleInputEmail1"
                                        placeholder="Nhập tên danh mục con">

                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary" name="them">Thêm danh mục</button>
                            </div>
                        </form>
                        <!-- /.box-body -->
                    </div>
                    <!-- Thêm -->
                    <?php
                    }
                        ?>

                    <!-- /.box -->
                </div>
                <!-- col-lg-6 -->

                <div class="col-lg-6">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Danh sách danh mục</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example3" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>NAME</th>
                                            <!-- <th>ACTIVE</th> -->
                                            <th>UPDATE</th>
                                            <th>NGƯỜI CẬP NHẬT</th>
                                            <th>EDIT</th>
                                            <th>DELETE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                                $sql = 'SELECT * FROM tbl_danhmuc';

                                                $result = mysqli_query($conn, $sql);

                                                $danhmuc = array();
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    $danhmuc[] = $row;
                                                }
                                                // BƯỚC 2: HÀM ĐỆ QUY HIỂN THỊ DANH MỤC
                                                function showDanhmuc($danhmuc, $parent_id = 0, $char = '')
                                                {
                                                    foreach ($danhmuc as $key => $item) {
                                                        // Nếu là danh mục con thì hiển thị
                                                        if ($item['parent_id'] == $parent_id) {
                                                            echo '<tr>';
                                                            echo '<td>' . $char . $item['title'] . '</td>';
                                                            // if($item['active'] == 0){
                                                            //     echo '<td><span class="label label-success">YES</span></td>';
                                                            // }else{
                                                            //     echo '<td><span class="label label-danger">NO</span></td>';
                                                            // }
                                                            echo '<td>28/3/2022</td>';
                                                            echo '<td>Võ Huy Khang</td>';
                                                            if ($item['parent_id'] == 0) {

                                                                echo "<form method='POST'>";
                                                                echo "<input type='hidden' value='" . $item['id_thuonghieu'] . "' name='id'/>";
                                                                echo "<td><button type='submit' class='btn bg-orange btn-flat'  name='edit'><i class='fa fa-edit'></i></button></td>";
                                                                echo "</form>";
                                                                echo '<td><button type="button" class="btn bg-maroon btn-flat" disabled><i class="fa fa-trash"></i></button></td>';
                                                                echo '</tr>';
                                                            } else {
                                                                echo "<form method='POST'>";
                                                                echo "<input type='hidden' value='" . $item['id_thuonghieu'] . "' name='id'/>";
                                                                echo "<td><button type='submit' class='btn bg-orange btn-flat'  name='edit'><i class='fa fa-edit'></i></button></td>";
                                                                echo "</form>";

                                                                echo '<td>';
                                                                echo "<button type='button' class='btn bg-maroon btn-flat' data-toggle='modal' data-target='#exampleModal' data-whatever='" . $item['id_thuonghieu'] . "'><i class='fa fa-trash'></i></button>";
                                                                echo '</td>';

                                                                echo '</tr>';
                                                            }

                                                            // Xóa danh mục đã lặp
                                                            unset($danhmuc[$key]);
                                                            // Tiếp tục đệ quy để tìm danh mục con của danh mục đang lặp
                                                            showDanhmuc($danhmuc, $item['id_thuonghieu'], $char . '|--');
                                                        }
                                                    }
                                                }
                                                ?>
                                        <tr>
                                            <?php showDanhmuc($danhmuc); ?>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>



























                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-info">
                            <div class="box-header">
                                <h3 class="box-title">Xem trước danh mục
                                </h3>
                                <!-- tools box -->
                                <div class="pull-right box-tools">
                                    <button type="button" class="btn btn-info btn-sm" data-widget="collapse"
                                        data-toggle="tooltip" title="Collapse">
                                        <i class="fa fa-minus"></i></button>
                                    <button type="button" class="btn btn-info btn-sm" data-widget="remove"
                                        data-toggle="tooltip" title="Remove">
                                        <i class="fa fa-times"></i></button>
                                </div>
                                <!-- /. tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body pad">
                                <div class="list-itemmm">
                                    <iframe src="http://thuongmaidientu2022.herokuapp.com/" width="100%"
                                        height="500px"></iframe>
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