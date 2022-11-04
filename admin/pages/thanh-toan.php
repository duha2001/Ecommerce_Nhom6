<?php

// create session
session_start();

if (isset($_SESSION['username']) && isset($_SESSION['level'])) {
    // include file
    include('../layouts/header.php');
    include('../layouts/topbar.php');
    include('../layouts/sidebar.php');

    //Thêm
    if (isset($_POST['them'])) {
        // create error array
        $error = array();
        $success = array();
        $showMess = false;


        $tenfolder = $_POST['tenfolder'];

        // validate
        if (empty($_POST['tenfolder']))
            $error['tenfolder'] = 'Vui lòng nhập <b> tên  folder</b>';



        // save to db
        if (!$error) {
            $showMess = true;
            // update record
            $sql_insert = mysqli_query($conn, "INSERT INTO folder(name_folder) VALUES('$tenfolder')");

            $success['success'] = 'Thêm thành công.';
            echo '<script>setTimeout("window.location=\'thanh-toan.php?p=salary&a=thanhtoan\'",1000);</script>';
        }
    } elseif (isset($_POST['capnhat'])) {

        // create error array
        $error = array();
        $success = array();
        $showMess = false;

        $id_folder = $_POST['id_folder'];
        $namefolder = $_POST['namefolder'];

        // validate
        if (empty($_POST['namefolder']))
            $error['namefolder'] = 'Vui lòng nhập <b> tên  folder</b>';

        // save to db
        if (!$error) {
            $showMess = true;
            // update record
            $sql_update = mysqli_query($conn, "UPDATE folder SET name_folder='$namefolder' WHERE id_folder = '$id_folder'");
            $success['success'] = 'Cập nhật thành công.';
            echo '<script>setTimeout("window.location=\'thanh-toan.php?p=salary&a=thanhtoan\'",1000);</script>';
        }
    }
    //Xóa
    if (isset($_GET['xoa'])) {
        $id = $_GET['xoa'];
        if (!$error) {
            $showMess = true;
            // update record
            $sql_xoa = mysqli_query($conn, "DELETE FROM folder WHERE id_folder ='$id'");
            $success['success'] = 'Xoá thành công.';
            echo '<script>setTimeout("window.location=\'thanh-toan.php?p=salary&a=thanhtoan\'",1000);</script>';
        }
    }

?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
            KHO LƯU TRỮ TÀI LIỆU SỐ
                <small>Hóa đơn, Biểu mẫu, Hình ảnh biên lai, thanh toán vật tư</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="index.php?p=index&a=statistic"><i class="fa fa-dashboard"></i> Tổng quan</a></li>
                <li class="active">Biểu mẫu</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- sửa -->
                <?php
                if (isset($_GET['quanly']) == 'capnhat') {
                    $id_capnhat = $_GET['id'];
                    $sql_capnhat = mysqli_query($conn, "SELECT * FROM folder WHERE id_folder = '$id_capnhat'");
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
                                <h3 class="box-title">Cập nhật Folder </h3>
                            </div>
                            <!-- /.box-header -->
                            <form role="form" action="" method="POST">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Name folder</label>
                                        <input type="folder" class="form-control" name="namefolder" id="exampleInputEmail1" value="<?php echo $row_capnhat['name_folder'] ?>">
                                        <input type="hidden" class="form-control" name="id_folder" value="<?php echo $row_capnhat['id_folder'] ?>">
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



                        <div class="col-lg-6">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Thêm mới Folder </h3>
                                </div>
                                <!-- /.box-header -->
                                <form role="form" action="" method="POST">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Name folder</label>
                                            <input type="folder" class="form-control" name="tenfolder" id="exampleInputEmail1" placeholder="Name folder">

                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary" name="them">Thêm</button>
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
                                    <h3 class="box-title">Danh sách Folder</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="table-responsive">
                                        <table id="example3" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Tên Folder</th>
                                                    <th>Xem</th>
                                                    <th>Sửa</th>
                                                    <th>Xoá</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sql = "SELECT * FROM folder ORDER BY id_folder ASC";
                                                $query = mysqli_query($conn, $sql);

                                                $count = 1;
                                                while ($row = mysqli_fetch_array($query)) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $count; ?></td>
                                                        <td><a href="?quanly=capnhat&id=<?php echo $row['id_folder'] ?>" style="color: blue;"><?= $row['name_folder']; ?></a></td>
                                                        <td><a class="btn btn-success" href="thanh-toan-chi-tiet.php?quanly=xem&id=<?php echo $row['id_folder'] ?>">Xem</a></td>
                                                        <td><a class="btn btn-primary" href="?quanly=capnhat&id=<?php echo $row['id_folder'] ?>">Sửa</a></td>
                                                        <td><a class="btn btn-danger" href="?xoa=<?php echo $row['id_folder'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xoá</a></td>
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

                        <div class="row">
                            <div class="col-md-12">
                                <div class="box box-info">
                                    <div class="box-header">
                                        <h3 class="box-title">Danh sách Folder
                                        </h3>
                                        <!-- tools box -->
                                        <div class="pull-right box-tools">
                                            <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                <i class="fa fa-minus"></i></button>
                                            <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                                                <i class="fa fa-times"></i></button>
                                        </div>
                                        <!-- /. tools -->
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body pad">
                                        <div class="list-itemmm">
                                        <div class="itemK2" style="width: 142px;">
                                                    <div class="abcde">
                                                        <a href="thungrac.php">
                                                            <img src="https://i.imgur.com/RHuXWN6.png" width="65">
                                                        </a>
                                                    </div>

                                                    <div class="itemmname2" style="color: red">Thùng rác</div>
                                                </div>
                                            <?php
                                            $sql = "SELECT * FROM folder ORDER BY id_folder ASC";
                                            $query = mysqli_query($conn, $sql);
                                            while ($row = mysqli_fetch_array($query)) {
                                            ?>
                                                <div class="itemK2" style="width: 142px;">
                                                    <div class="abcde">
                                                        <a href="thanh-toan-chi-tiet.php?quanly=xem&id=<?php echo $row['id_folder'] ?>">
                                                            <img src="https://i.imgur.com/bP9CbH3.png" width="65">
                                                        </a>
                                                    </div>

                                                    <div class="itemmname2"><?= $row['name_folder']; ?></div>
                                                </div>

                                            <?php
                                            }
                                            ?>
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