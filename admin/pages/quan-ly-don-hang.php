<?php

// create session
session_start();

if (isset($_SESSION['username']) && isset($_SESSION['level'])) {
    // include file
    include('../layouts/header.php');
    include('../layouts/topbar.php');
    include('../layouts/sidebar.php');




?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Quản lý đơn hàng
        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php?p=index&a=statistic"><i class="fa fa-dashboard"></i> Tổng quan</a></li>
            <li class="active">QL đơn hàng</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box-body">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#all" data-toggle="tab">Tất cả</a></li>
                    <li><a href="#choxacnhan" data-toggle="tab">Chờ xác nhận</a></li>
                    <li><a href="#dangdatmua" data-toggle="tab">Đang giao hàng</a></li>
                    <li><a href="#dahoantat" data-toggle="tab">Đơn hàng đã giao thành công</a></li>
                    <li><a href="#dahuy" data-toggle="tab">Đã huỷ</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="all">

                        <!-- Mở -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>ĐH</th>
                                            <th>Khách hàng</th>
                                            <th>Ngày đặt</th>
                                            <th>Địa chỉ</th>
                                            <th>Email</th>
                                            <th>SĐT</th>
                                            <th>Trạng thái</th>
                                            <th>Xuất đơn</th>
                                            <th>Xác nhận</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $sql_lietke_dh = "SELECT * FROM tbl_cart,tbl_dangky,tbl_shipping WHERE tbl_cart.id_khachhang=tbl_dangky.id_dangky AND tbl_shipping.id_dangky = tbl_dangky.id_dangky ORDER BY tbl_cart.id_cart AND tbl_shipping.id_dangky DESC";
                                            $query_lietke_dh = mysqli_query($conn, $sql_lietke_dh);
                                            $i = 0;
                                            while ($row = mysqli_fetch_array($query_lietke_dh)) {
                                                $i++;
                                            ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td><a
                                                    href="chitiethoadon.php?p=ql&a=donhang&code=<?php echo $row['code_cart']; ?>&id_khachhang=<?php echo $row['id_khachhang']; ?>">#<?php echo $row['code_cart'] ?></a>
                                            </td>
                                            
                                            <td style="font-size: 12px;"><?php echo $row['ten'] ?></td>
                                            <td style="font-size: 12px;">
                                                <?php $date = date_create($row['cart_date']);
                                                        echo date_format($date, 'd-m-Y'); ?></td>
                                            <td style="font-size: 10px;"><?php echo $row['address'] ?></td>
                                            <td style="font-size: 12px;"><?php echo $row['email'] ?></td>
                                            <td style="font-size: 12px;"><?php echo $row['sdt'] ?></td>

                                            <td>
                                                <?php if ($row['cart_status'] == 1) {
                                                            echo '<span class="label label-warning">Chờ xác nhận</span>';
                                                        } elseif ($row['cart_status'] == 2) {
                                                            echo '<span class="label label-primary">Đang giao hàng</span>';
                                                        } elseif ($row['cart_status'] == 3) {
                                                            echo '<span class="label label-success">Đơn hàng đã giao thành công</span>';
                                                        } else {
                                                            echo '<span class="label label-danger">Đơn hàng đã huỷ</span>';
                                                        }
                                                        ?>
                                            </td>
                                            <td><a
                                                    href="inhoadon.php?p=ql&a=donhang&code=<?php echo $row['code_cart']; ?>&id_khachhang=<?php echo $row['id_khachhang']; ?>">#<?php echo $row['code_cart'] ?></a>
                                            </td>
                                            <td>
                                                <center>
                                                    <?php if ($row['cart_status'] == 1) {
                                                                      echo "
                                                                      <a class='btn bg-green' href='xulydonhang.php?p=ql&a=donhang&cod=" . $row['code_cart'] . "'><i class='fa fa-truck'></i></a>";
                                                                      if ($_SESSION['level'] != 1) {
                                                                          echo "
                                                                          <a class='btn bg-red' href='xulydonhang.php?p=ql&a=donhang&huy=" . $row['code_cart'] . "'><i class='fa fa-ban'></i></a>
                                                                          ";
                                                                      }else{
                                                                      //
                                                                  }
                                                            } elseif ($row['cart_status'] == 2) {
                                                                echo "
                                                                <a class='btn bg-primary' href='xulydonhang.php?p=ql&a=donhang&check=" . $row['code_cart'] . "'><i class='fa fa-check'></i></a>
                                                                ";
                                                            } elseif ($row['cart_status'] == 3) {
                                                                if ($_SESSION['level'] != 1) {
                                                                    echo "<a class='btn bg-red' href='xulydonhang.php?p=ql&a=donhang&xoa=" . $row['code_cart'] . "'><i class='fas fa-trash-alt'></i></a>";
                                                                }else{
                                                                //
                                                            }
                                                            } else {
                                                                if ($_SESSION['level'] != 1) {
                                                                    echo "<a class='btn bg-red' href='xulydonhang.php?p=ql&a=donhang&xoa=" . $row['code_cart'] . "'><i class='fas fa-trash-alt'></i></a>";
                                                                }else{
                                                                //
                                                            }
                                                            }
                                                            ?>
                                                </center>
                                            </td>
                                        </tr>
                                        <?php
                                            }
                                            ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- Đóng -->
                    </div>

                    <div class="tab-pane" id="choxacnhan">
                        <!-- Mở -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>ĐH</th>
                                            <th>Khách hàng</th>
                                            <th>Ngày đặt</th>
                                            <th>Địa chỉ</th>
                                            <th>Email</th>
                                            <th>SĐT</th>
                                            <th>Trạng thái</th>
                                            <th>Xác nhận</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $sql_lietke_dh = "SELECT * FROM tbl_cart,tbl_dangky,tbl_shipping WHERE cart_status = 1 AND tbl_cart.id_khachhang=tbl_dangky.id_dangky AND tbl_shipping.id_dangky = tbl_dangky.id_dangky ORDER BY tbl_cart.id_cart AND tbl_shipping.id_dangky DESC";
                                            $query_lietke_dh = mysqli_query($conn, $sql_lietke_dh);

                                            $i = 0;
                                            while ($row = mysqli_fetch_array($query_lietke_dh)) {
                                                $i++;
                                            ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td><a
                                                    href="chitiethoadon.php?p=ql&a=donhang&code=<?php echo $row['code_cart']; ?>&id_khachhang=<?php echo $row['id_khachhang']; ?>">#<?php echo $row['code_cart'] ?></a>
                                            </td>
                                            <td style="font-size: 12px;"><?php echo $row['ten'] ?></td>
                                            <td style="font-size: 12px;">
                                                <?php $date = date_create($row['cart_date']);
                                                        echo date_format($date, 'd-m-Y'); ?></td>
                                            <td style="font-size: 10px;"><?php echo $row['address'] ?></td>
                                            <td style="font-size: 12px;"><?php echo $row['email'] ?></td>
                                            <td style="font-size: 12px;"><?php echo $row['sdt'] ?></td>

                                            <td>
                                                <?php if ($row['cart_status'] == 1) {
                                                            echo '<span class="label label-warning">Chờ xác nhận</span>';
                                                        } elseif ($row['cart_status'] == 2) {
                                                            echo '<span class="label label-primary">Đang giao hàng</span>';
                                                        } elseif ($row['cart_status'] == 3) {
                                                            echo '<span class="label label-success">Đơn hàng đã giao thành công</span>';
                                                        } else {
                                                            echo '<span class="label label-danger">Đơn hàng đã huỷ</span>';
                                                        }
                                                        ?>
                                            </td>
                                            <td>
                                                <center>
                                                    <?php if ($row['cart_status'] == 1) {
                                                                echo "
                                                                <a class='btn bg-green' href='xulydonhang.php?p=ql&a=donhang&cod=" . $row['code_cart'] . "'><i class='fa fa-truck'></i></a>";
                                                                if ($_SESSION['level'] != 1) {
                                                                    echo "
                                                                    <a class='btn bg-red' href='xulydonhang.php?p=ql&a=donhang&huy=" . $row['code_cart'] . "'><i class='fa fa-ban'></i></a>
                                                                    ";
                                                                }else{
                                                                //
                                                            }


                                                            } elseif ($row['cart_status'] == 2) {
                                                                echo "
                                                                <a class='btn bg-primary' href='xulydonhang.php?p=ql&a=donhang&check=" . $row['code_cart'] . "'><i class='fa fa-check'></i></a>
                                                                ";
                                                            } elseif ($row['cart_status'] == 3) {
                                                                echo "
                                                                <a class='btn bg-red' href='xulydonhang.php?p=ql&a=donhang&xoa=" . $row['code_cart'] . "'><i class='fas fa-trash-alt'></i></a>
                                                                ";
                                                            } else {
                                                                echo "<a class='btn bg-red' href='xulydonhang.php?p=ql&a=donhang&xoa=" . $row['code_cart'] . "'><i class='fas fa-trash-alt'></i></a>";
                                                            }
                                                            ?>
                                                </center>
                                            </td>
                                        </tr>
                                        <?php
                                            }
                                            ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- Đóng -->
                    </div>

                    <div class="tab-pane" id="dangdatmua">
                        <!-- Mở -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>ĐH</th>
                                            <th>Khách hàng</th>
                                            <th>Ngày đặt</th>
                                            <th>Địa chỉ</th>
                                            <th>Email</th>
                                            <th>SĐT</th>
                                            <th>Trạng thái</th>
                                            <th>Xác nhận</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $sql_lietke_dh = "SELECT * FROM tbl_cart,tbl_dangky,tbl_shipping WHERE cart_status = 2 AND tbl_cart.id_khachhang=tbl_dangky.id_dangky AND tbl_shipping.id_dangky = tbl_dangky.id_dangky ORDER BY tbl_cart.id_cart AND tbl_shipping.id_dangky DESC";
                                            $query_lietke_dh = mysqli_query($conn, $sql_lietke_dh);

                                            $i = 0;
                                            while ($row = mysqli_fetch_array($query_lietke_dh)) {
                                                $i++;
                                            ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td><a
                                                    href="chitiethoadon.php?p=ql&a=donhang&code=<?php echo $row['code_cart']; ?>&id_khachhang=<?php echo $row['id_khachhang']; ?>">#<?php echo $row['code_cart'] ?></a>
                                            </td>
                                            <td style="font-size: 12px;"><?php echo $row['ten'] ?></td>
                                            <td style="font-size: 12px;">
                                                <?php $date = date_create($row['cart_date']);
                                                        echo date_format($date, 'd-m-Y'); ?></td>
                                            <td style="font-size: 10px;"><?php echo $row['address'] ?></td>
                                            <td style="font-size: 12px;"><?php echo $row['email'] ?></td>
                                            <td style="font-size: 12px;"><?php echo $row['sdt'] ?></td>

                                            <td>
                                                <?php if ($row['cart_status'] == 1) {
                                                            echo '<span class="label label-warning">Chờ xác nhận</span>';
                                                        } elseif ($row['cart_status'] == 2) {
                                                            echo '<span class="label label-primary">Đang giao hàng</span>';
                                                        } elseif ($row['cart_status'] == 3) {
                                                            echo '<span class="label label-success">Đơn hàng đã giao thành công</span>';
                                                        } else {
                                                            echo '<span class="label label-danger">Đơn hàng đã huỷ</span>';
                                                        }
                                                        ?>
                                            </td>
                                            <td>
                                                <center>
                                                    <?php if ($row['cart_status'] == 1) {
                                                                echo "
                                                                <a class='btn bg-green' href='xulydonhang.php?p=ql&a=donhang&cod=" . $row['code_cart'] . "'><i class='fa fa-truck'></i></a>
                                                                <a class='btn bg-red' href='xulydonhang.php?p=ql&a=donhang&huy=" . $row['code_cart'] . "'><i class='fa fa-ban'></i></a>
                                                                ";
                                                            } elseif ($row['cart_status'] == 2) {
                                                                echo "
                                                                <a class='btn bg-primary' href='xulydonhang.php?p=ql&a=donhang&check=" . $row['code_cart'] . "'><i class='fa fa-check'></i></a>
                                                                ";
                                                            } elseif ($row['cart_status'] == 3) {
                                                                echo "
                                                                <a class='btn bg-red' href='xulydonhang.php?p=ql&a=donhang&xoa=" . $row['code_cart'] . "'><i class='fas fa-trash-alt'></i></a>
                                                                ";
                                                            } else {
                                                                echo "<a class='btn bg-red' href='xulydonhang.php?p=ql&a=donhang&xoa=" . $row['code_cart'] . "'><i class='fas fa-trash-alt'></i></a>";
                                                            }
                                                            ?>
                                                </center>
                                            </td>
                                        </tr>
                                        <?php
                                            }
                                            ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- Đóng -->
                    </div>

                    <div class="tab-pane" id="dahoantat">
                        <!-- Mở -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>ĐH</th>
                                            <th>Khách hàng</th>
                                            <th>Ngày đặt</th>
                                            <th>Địa chỉ</th>
                                            <th>Email</th>
                                            <th>SĐT</th>
                                            <th>Trạng thái</th>
                                            <th>Xác nhận</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $sql_lietke_dh = "SELECT * FROM tbl_cart,tbl_dangky,tbl_shipping WHERE cart_status = 3 AND tbl_cart.id_khachhang=tbl_dangky.id_dangky AND tbl_shipping.id_dangky = tbl_dangky.id_dangky ORDER BY tbl_cart.id_cart AND tbl_shipping.id_dangky DESC";
                                            $query_lietke_dh = mysqli_query($conn, $sql_lietke_dh);

                                            $i = 0;
                                            while ($row = mysqli_fetch_array($query_lietke_dh)) {
                                                $i++;
                                            ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td><a
                                                    href="chitiethoadon.php?p=ql&a=donhang&code=<?php echo $row['code_cart']; ?>&id_khachhang=<?php echo $row['id_khachhang']; ?>">#<?php echo $row['code_cart'] ?></a>
                                            </td>
                                            <td style="font-size: 12px;"><?php echo $row['ten'] ?></td>
                                            <td style="font-size: 12px;">
                                                <?php $date = date_create($row['cart_date']);
                                                        echo date_format($date, 'd-m-Y'); ?></td>
                                            <td style="font-size: 10px;"><?php echo $row['address'] ?></td>
                                            <td style="font-size: 12px;"><?php echo $row['email'] ?></td>
                                            <td style="font-size: 12px;"><?php echo $row['sdt'] ?></td>

                                            <td>
                                                <?php if ($row['cart_status'] == 1) {
                                                            echo '<span class="label label-warning">Chờ xác nhận</span>';
                                                        } elseif ($row['cart_status'] == 2) {
                                                            echo '<span class="label label-primary">Đang giao hàng</span>';
                                                        } elseif ($row['cart_status'] == 3) {
                                                            echo '<span class="label label-success">Đơn hàng đã giao thành công</span>';
                                                        } else {
                                                            echo '<span class="label label-danger">Đơn hàng đã huỷ</span>';
                                                        }
                                                        ?>
                                            </td>
                                            <td>
                                                <center>
                                                    <?php if ($row['cart_status'] == 1) {
                                                                echo "
                                                                <a class='btn bg-green' href='xulydonhang.php?p=ql&a=donhang&cod=" . $row['code_cart'] . "'><i class='fa fa-truck'></i></a>
                                                                <a class='btn bg-red' href='xulydonhang.php?p=ql&a=donhang&huy=" . $row['code_cart'] . "'><i class='fa fa-ban'></i></a>
                                                                ";
                                                            } elseif ($row['cart_status'] == 2) {
                                                                echo "
                                                                <a class='btn bg-primary' href='xulydonhang.php?p=ql&a=donhang&check=" . $row['code_cart'] . "'><i class='fa fa-check'></i></a>
                                                                ";
                                                            } elseif ($row['cart_status'] == 3) {
                                                                if ($_SESSION['level'] != 1) {
                                                                    echo "<a class='btn bg-red' href='xulydonhang.php?p=ql&a=donhang&xoa=" . $row['code_cart'] . "'><i class='fas fa-trash-alt'></i></a>";
                                                                }else{
                                                                //
                                                            }
                                                            } else {
                                                                echo "<a class='btn bg-red' href='xulydonhang.php?p=ql&a=donhang&xoa=" . $row['code_cart'] . "'><i class='fas fa-trash-alt'></i></a>";
                                                            }
                                                            ?>
                                                </center>
                                            </td>
                                        </tr>
                                        <?php
                                            }
                                            ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- Đóng -->
                    </div>

                    <div class="tab-pane" id="dahuy">
                        <!-- Mở -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>ĐH</th>
                                            <th>Khách hàng</th>
                                            <th>Ngày đặt</th>
                                            <th>Địa chỉ</th>
                                            <th>Email</th>
                                            <th>SĐT</th>
                                            <th>Trạng thái</th>
                                            <th>Xác nhận</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $sql_lietke_dh = "SELECT * FROM tbl_cart,tbl_dangky,tbl_shipping WHERE cart_status = 4 AND tbl_cart.id_khachhang=tbl_dangky.id_dangky AND tbl_shipping.id_dangky = tbl_dangky.id_dangky ORDER BY tbl_cart.id_cart AND tbl_shipping.id_dangky DESC";
                                            $query_lietke_dh = mysqli_query($conn, $sql_lietke_dh);

                                            $i = 0;
                                            while ($row = mysqli_fetch_array($query_lietke_dh)) {
                                                $i++;
                                            ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td><a
                                                    href="chitiethoadon.php?p=ql&a=donhang&code=<?php echo $row['code_cart']; ?>&id_khachhang=<?php echo $row['id_khachhang']; ?>">#<?php echo $row['code_cart'] ?></a>
                                            </td>
                                            <td style="font-size: 12px;"><?php echo $row['ten'] ?></td>
                                            <td style="font-size: 12px;">
                                                <?php $date = date_create($row['cart_date']);
                                                        echo date_format($date, 'd-m-Y'); ?></td>
                                            <td style="font-size: 10px;"><?php echo $row['address'] ?></td>
                                            <td style="font-size: 12px;"><?php echo $row['email'] ?></td>
                                            <td style="font-size: 12px;"><?php echo $row['sdt'] ?></td>

                                            <td>
                                                <?php if ($row['cart_status'] == 1) {
                                                            echo '<span class="label label-warning">Chờ xác nhận</span>';
                                                        } elseif ($row['cart_status'] == 2) {
                                                            echo '<span class="label label-primary">Đang giao hàng</span>';
                                                        } elseif ($row['cart_status'] == 3) {
                                                            echo '<span class="label label-success">Đơn hàng đã giao thành công</span>';
                                                        } else {
                                                            echo '<span class="label label-danger">Đơn hàng đã huỷ</span>';
                                                        }
                                                        ?>
                                            </td>
                                            <td>
                                                <center>
                                                    <?php if ($row['cart_status'] == 1) {
                                                                echo "
                                                                <a class='btn bg-green' href='xulydonhang.php?p=ql&a=donhang&cod=" . $row['code_cart'] . "'><i class='fa fa-truck'></i></a>
                                                                <a class='btn bg-red' href='xulydonhang.php?p=ql&a=donhang&huy=" . $row['code_cart'] . "'><i class='fa fa-ban'></i></a>
                                                                ";
                                                            } elseif ($row['cart_status'] == 2) {
                                                                echo "
                                                                <a class='btn bg-primary' href='xulydonhang.php?p=ql&a=donhang&check=" . $row['code_cart'] . "'><i class='fa fa-check'></i></a>
                                                                ";
                                                            } elseif ($row['cart_status'] == 3) {
                                                                echo "
                                                                <a class='btn bg-red' href='xulydonhang.php?p=ql&a=donhang&xoa=" . $row['code_cart'] . "'><i class='fas fa-trash-alt'></i></a>
                                                                ";
                                                            } else {
                                                                if ($_SESSION['level'] != 1) {
                                                                    echo "<a class='btn bg-red' href='xulydonhang.php?p=ql&a=donhang&xoa=" . $row['code_cart'] . "'><i class='fas fa-trash-alt'></i></a>";
                                                                }else{
                                                                //
                                                            }}
                                                            ?>
                                                </center>
                                            </td>
                                        </tr>
                                        <?php
                                            }
                                            ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- Đóng -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php
    // include
    include('../layouts/footer.php');
} else {
    // go to pages login
    header('Location: dang-nhap.php');
}

?>