<?php

// get active sidebar
if (isset($_GET['p']) && isset($_GET['a'])) {
    $p = $_GET['p'];
    $a = $_GET['a'];
}
?>
<!-- https://fontawesome.com/v4/icons/ -->
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="../uploads/images/<?php echo $row_acc['hinh_anh']; ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>
                    <?php echo $row_acc['ho']; ?> <?php echo $row_acc['ten']; ?>
                </p>
                <a href="#"><i class="fa fa-circle text-success"></i>
                    <?php
                    if ($row_acc['quyen'] == 0) {
                        echo "Admin";
                    } elseif ($row_acc['quyen'] == 1) {
                        echo "Nhân viên";
                    } elseif ($row_acc['quyen'] == 2) {
                        echo "Khách hàng";
                    }
                    ?>
                </a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Tìm kiếm...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i
                            class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">CƠ SỞ DỮ LIỆU</li>
            <li class="<?php if ($p == 'index') echo 'active'; ?> treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php if ($a == 'statistic') echo 'active'; ?>"><a
                            href="index.php?p=index&a=statistic"><i class="fa fa-circle-o"></i> Thống kê</a></li>
                    <li class="<?php if (($p == 'index') && ($a == 'taikhoan')) echo 'active'; ?>"><a
                            href="index_taikhoan.php?p=index&a=taikhoan"><i class="fa fa-circle-o"></i> Danh sách khách
                            hàng</a></li>
                    <li class=""><a
                    href="https://business.facebook.com/latest/inbox/all?asset_id=109894831747162&nav_ref=pages_classic_isolated_section_inbox_redirect"><i class="fa fa-circle-o"></i> Chăm sóc khách
                    hàng</a></li>
                </ul>
            </li>

            <li class="<?php if ($p == 'quanly') echo 'active'; ?> treeview">
                <a href="#">
                    <i class="fa fa-cubes" aria-hidden="true"></i>
                    <span>QL Danh mục sản phẩm</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php if (($p == 'quanly') && ($a == 'danhmuc')) echo 'active'; ?>"><a
                            href="danh-muc-con.php?p=quanly&a=danhmuc"><i class="fa fa-circle-o"></i> Danh mục phụ
                            kiện</a></li>
                </ul>
            </li>

            <li class="<?php if ($p == 'sanpham') echo 'active'; ?> treeview">
                <a href="#">
                    <i class="fa fa-cube" aria-hidden="true"></i>
                    <span>QL Sản phẩm</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php if (($p == 'sanpham') && ($a == 'themsanpham')) echo 'active'; ?>"><a
                            href="them-san-pham.php?p=sanpham&a=themsanpham"><i class="fa fa-circle-o"></i> Thêm sản
                            phẩm</a></li>
                    <li class="<?php if (($p == 'sanpham') && ($a == 'api')) echo 'active'; ?>"><a
                            href="update-anh.php?p=sanpham&a=api"><i class="fa fa-circle-o"></i> Update Ảnh</a></li>
                    <li class="<?php if (($p == 'sanpham') && ($a == 'dssp')) echo 'active'; ?>"><a
                            href="ds-san-pham.php?p=sanpham&a=dssp"><i class="fa fa-circle-o"></i> Danh sách sản
                            phẩm</a></li>
                </ul>
            </li>



            <li class="<?php if (($p == 'bieumau') && ($a == 'tailieu')) echo 'active'; ?>">
                <a href="thanh-toan.php?p=bieumau&a=tailieu">
                    <i class="fa fa-cloud-upload" aria-hidden="true"></i>
                    <span>Kho lưu trữ của tôi Driver</span>
                    <span class="pull-right-container">
                    </span>
                </a>
            </li>

            <li class="<?php if (($p == 'ql') && ($a == 'donhang')) echo 'active'; ?>">
                <a href="quan-ly-don-hang.php?p=ql&a=donhang">
                    <i class="fa fa-money"></i>
                    <span>QL Đơn hàng</span>
                    <span class="pull-right-container">
                        <small class="label pull-right bg-red"><?= $tong_dhdh; ?></small>
                        <small class="label pull-right bg-blue"><?= $tong_dgh; ?></small>
                        <small class="label pull-right bg-green"><?= $tong_ghtc; ?></small>
                        <small class="label pull-right bg-yellow"><?= $tong_cxn; ?></small>
                    </span>
                </a>
            </li>

            <li class="<?php if ($p == 'account') echo 'active'; ?> treeview">
                <a href="#">
                    <i class="fa fa-user"></i> <span>QL Người dùng</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php if ($a == 'profile') echo 'active'; ?>"><a
                            href="thong-tin-tai-khoan.php?p=account&a=profile"><i class="fa fa-circle-o"></i> Thông tin
                            tài khoản</a></li>
                    <li class="<?php if ($a == 'add-account') echo 'active'; ?>"><a
                            href="tao-tai-khoan.php?p=account&a=add-account"><i class="fa fa-circle-o"></i> Tạo tài
                            khoản</a></li>
                    <li class="<?php if (($p == 'account') && ($a == 'list-account')) echo 'active'; ?>"><a
                            href="ds-tai-khoan.php?p=account&a=list-account"><i class="fa fa-circle-o"></i> Danh sách
                            tài khoản</a></li>
                    <li class="<?php if ($a == 'changepass') echo 'active'; ?>"><a
                            href="doi-mat-khau.php?p=account&a=changepass"><i class="fa fa-circle-o"></i> Đổi mật
                            khẩu</a></li>
                    <li><a href="dang-xuat.php"><i class="fa fa-circle-o"></i> Đăng xuất</a></li>
                </ul>
            </li>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>