<?php

// create session
session_start();

if (isset($_SESSION['username']) && isset($_SESSION['level'])) {
    // include file
    include('../layouts/header.php');
    include('../layouts/topbar.php');
    include('../layouts/sidebar.php');

    // dem so phong ban
    $tk = "SELECT count(id_dangky) as soluong FROM tbl_dangky";
    $resultTK = mysqli_query($conn, $tk);
    $rowTK = mysqli_fetch_array($resultTK);
    $tongTK = $rowTK['soluong'] - 1; //trừ đi 1 tài khoản admin demo


    //dem hóa đơn luu
    $tt = "SELECT count(id_fileup) as soluong FROM fileup";
    $resultTT = mysqli_query($conn, $tt);
    $rowTT = mysqli_fetch_array($resultTT);
    $tongTT = $rowTT['soluong'];

    //dem hóa đơn luu
    $dh = "SELECT count(id_cart) as soluong FROM tbl_cart";
    $resultdh = mysqli_query($conn, $dh);
    $rowdh = mysqli_fetch_array($resultdh);
    $tongdh = $rowdh['soluong'];

    //dem tai san trong kho
    $taisantrongkho = "SELECT count(id_sanpham) as soluong FROM tbl_sanpham";
    $resulttaisantrongkho = mysqli_query($conn, $taisantrongkho);
    $rowtaisantrongkho = mysqli_fetch_array($resulttaisantrongkho);
    $tongtaisantrongkho = $rowtaisantrongkho['soluong'];
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Tổng quan
            <small>Đề tài thương mại điện tử | Website Bán Hàng 2022</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php?p=index&a=statistic"><i class="fa fa-dashboard"></i> Tổng quan</a></li>
            <li class="active">Thống kê</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-blue">
                    <div class="inner">
                        <h3><?php echo $tongTK; ?></h3>

                        <p>Quản lý khách hàng</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <a href="ds-tai-khoan.php?p=account&a=list-account" class="small-box-footer">Danh sách tài khoản <i
                            class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3><?= $tongdh ?></h3>
                        <p>Quản lý đơn hàng</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-money-check-alt"></i>
                    </div>
                    <a href="quan-ly-don-hang.php?p=ql&a=donhang" class="small-box-footer">Quản lý đơn hàng <i
                            class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->


            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>+50000</h3>
                        <p>Nhà cung cấp, Nhập hàng</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-plane-departure"></i>
                    </div>
                    <a href="#" class="small-box-footer">Quản lý hàng hóa<i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->

            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-olive">
                    <div class="inner">
                        <h3>5</h3>
                        <p>Bảo hành, Báo giá</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-exchange-alt"></i>
                    </div>
                    <a href="#" class="small-box-footer"> Chăm sóc khách hàng<i
                            class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->


            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-purple">
                    <div class="inner">
                        <h3><?= $tongtaisantrongkho ?></h3>
                        <p>Kiểm kê tài sản trong kho</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-cubes"></i>
                    </div>
                    <a href="ds-san-pham.php?p=sanpham&a=dssp" class="small-box-footer">Kiểm kê tài sản<i
                            class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-blue">
                    <div class="inner">
                        <h3><?php echo $tongTT; ?></h3>
                        <p>Hóa đơn, Biên lai</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-file"></i>
                    </div>
                    <a href="thanh-toan.php?p=salary&a=thanhtoan" class="small-box-footer">Drive của tôi<i
                            class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <i class="fa fa-bar-chart-o"></i>
                        <h3 class="box-title">Thống kê đơn hàng theo : <span id="text-date"></h3>

                        <div class="box-tools pull-right">
                            <p>
                                <select class="select-date">
                                    <option value="7ngay">7 ngày qua</option>
                                    <option value="28ngay">28 ngày qua</option>
                                    <option value="90ngay">90 ngày qua</option>
                                    <option value="365ngay">365 ngày qua</option>
                                </select>
                            </p>

                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                    class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="chart" id="chart" style="height: 445px;"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Trạng thái đơn hàng</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                    class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="chart">
                            <div class="transaction-status-pie">
                                <canvas id="pie1"
                                    data-p1value="<?= $tong_dgh; ?>, <?= $tong_cxn; ?>, <?= $tong_dhdh ?>, <?= $tong_ghtc; ?>"
                                    data-p1label=" Đang giao hàng, Chờ xác nhận, Đã huỷ, Đã giao thành công"
                                    data-p1color="#372CC8, #FFA726, #E91E63, #2ACD72" width="420" height="200"></canvas>
                            </div>
                        </div>
                        <hr>
                        <?php
                            date_default_timezone_set('Asia/Ho_Chi_Minh');
                            $weekday = date("l");
                            $weekday = strtolower($weekday);
                            switch ($weekday) {
                                case 'monday':
                                    $weekday = 'Thứ hai';
                                    break;
                                case 'tuesday':
                                    $weekday = 'Thứ ba';
                                    break;
                                case 'wednesday':
                                    $weekday = 'Thứ tư';
                                    break;
                                case 'thursday':
                                    $weekday = 'Thứ năm';
                                    break;
                                case 'friday':
                                    $weekday = 'Thứ sáu';
                                    break;
                                case 'saturday':
                                    $weekday = 'Thứ bảy';
                                    break;
                                default:
                                    $weekday = 'Chủ nhật';
                                    break;
                            }
                            ?>
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="panel panel-warning panel-alt widget-today">
                                    <div class="panel-heading text-center">
                                        <i class="fa fa-calendar-o"></i>
                                    </div>
                                    <div class="panel-body text-center">
                                        <h3 class="today"><?= $weekday;
                                                                echo date(' d/m/Y') ?></h3>
                                    </div><!-- panel-body -->
                                </div><!-- panel -->
                            </div>

                            <div class="col-xs-6">
                                <div class="panel panel-danger panel-alt widget-time">
                                    <div class="panel-heading text-center">
                                        <i class="glyphicon glyphicon-time"></i>
                                    </div>
                                    <div class="panel-body text-center">
                                        <h3 class="today">
                                            <script>
                                            var myVar = setInterval(function() {
                                                myTimer()
                                            }, 1000);

                                            function myTimer() {
                                                var d = new Date();
                                                var t = d.toLocaleTimeString();
                                                document.getElementById("h").innerHTML = t;
                                            }
                                            </script>
                                            <span id="h"></span><br>
                                        </h3>
                                    </div><!-- panel-body -->
                                </div><!-- panel -->
                            </div>
                        </div><!-- col-sm-6 -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript">
    $(document).ready(function() {
        thongke();
        var char = new Morris.Area({

            element: 'chart',

            xkey: 'date',

            ykeys: ['order', 'sales', 'quantity'],

            labels: ['Tổng đơn hàng trong ngày', 'Tổng doanh thu',
                'Số lượng bán ra'
            ]
        });

        $('.select-date').change(function() {
            var thoigian = $(this).val();
            if (thoigian == '7ngay') {
                var text = '7 ngày qua';
            } else if (thoigian == '28ngay') {
                var text = '28 ngày qua';
            } else if (thoigian == '90ngay') {
                var text = '90 ngày qua';
            } else {
                var text = '365 ngày qua';
            }

            $.ajax({
                url: "thongke.php",
                method: "POST",
                dataType: "JSON",
                data: {
                    thoigian: thoigian
                },
                success: function(data) {
                    char.setData(data);
                    $('#text-date').text(text);
                }
            });
        })

        function thongke() {
            var text = '365 ngày qua';
            $('#text-date').text(text);
            $.ajax({
                url: "thongke.php",
                method: "POST",
                dataType: "JSON",
                success: function(data) {
                    char.setData(data);
                    $('#text-date').text(text);
                }
            });
        }
    });
    </script>
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