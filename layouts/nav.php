<?php
if (isset($_POST['login'])) {
    $email = $_SESSION['email'];
    $password = $_SESSION['password'];
    if ($email != false && $password != false) {
        $sql = "SELECT * FROM tbl_dangky WHERE email = '$email'";
        $run_Sql = mysqli_query($conn, $sql);
        if ($run_Sql) {
            $fetch_info = mysqli_fetch_assoc($run_Sql);
            $status = $fetch_info['status'];
            $code = $fetch_info['code'];
            if ($status == "xác minh") {
                if ($code != 0) {
                    header('Location: reset-code.php');
                }
            } else {
                header('Location: index.php?quanly=xacminhotp');
            }
        }
    } else {
        header('Location: index.php?quanly=login');
    }
}
?>
<div class="header-bottom">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-3 evo-cate-header d-lg-block d-none">
                <div class="title">
                    <button class="menu-icon" aria-label="Menu" title="Menu">
                        <svg viewBox="0 0 24 16">
                            <path d="M0 15.985v-2h24v2H0zm0-9h24v2H0v-2zm0-7h24v2H0v-2z"></path>
                        </svg>
                    </button> Danh mục
                </div>
                <div class="evo-width-cate">
                    <ul class="evo-main-cate">
                        <li class="evo-main-cate-has-child menu-item-count">
                            <?php
                            $sql = "SELECT * FROM tbl_danhmuc ORDER BY id_thuonghieu ASC limit 0,1";
                            $query = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_array($query)) {
                            ?>
                            <a href="index.php?quanly=danhmucsanpham&id=<?php echo $row['id_thuonghieu'] ?>"
                                title="<?php echo $row['title']; ?>">
                                <img src="./dist/images/<?php echo $row['icon']; ?>.png"
                                    alt="<?php echo $row['title']; ?>" /> <?php echo $row['title']; ?></a>
                            <?php
                            }
                            ?>
                            <ul class="menu-child sub-menu evo-sub-mega-menu">
                                <li class="evo-main-cate-has-child clearfix">
                                    <?php
                                    $sql = "SELECT * FROM tbl_danhmuc ORDER BY id_thuonghieu ASC limit 9,1";
                                    $query = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_array($query)) {
                                    ?>
                                    <a href="index.php?quanly=danhmucthuonghieudienthoai&id=<?php echo $row['id_thuonghieu'] ?>"
                                        title="<?php echo $row['title']; ?>"><?php echo $row['title']; ?></a>
                                    <?php
                                    }
                                    ?>
                                    <ul class="menu-child-2 sub-menu clearfix">
                                        <?php
                                        $sql = "SELECT * FROM tbl_danhmuctructhuoc WHERE id = 10";
                                        $query = mysqli_query($conn, $sql);
                                        while ($row = mysqli_fetch_array($query)) {
                                        ?>
                                        <li>
                                            <a href="index.php?quanly=danhmuctructhuoc&id=<?php echo $row['id_danhmuc'] ?>"
                                                title="<?php echo $row['title']; ?>"><?php echo $row['title']; ?></a>
                                        </li>
                                        <?php
                                        }
                                        ?>
                                    </ul>
                                </li>



                                <li class="evo-main-cate-has-child clearfix">
                                    <?php
                                    $sql = "SELECT * FROM tbl_danhmuc ORDER BY id_thuonghieu ASC limit 10,1";
                                    $query = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_array($query)) {
                                    ?>
                                    <a href="index.php?quanly=danhmucthuonghieudienthoai&id=<?php echo $row['id_thuonghieu'] ?>"
                                        title="<?php echo $row['title']; ?>"><?php echo $row['title']; ?></a>
                                    <?php
                                    }
                                    ?>
                                    <ul class="menu-child-2 sub-menu clearfix">

                                        <?php
                                        $sql = "SELECT * FROM tbl_danhmuctructhuoc WHERE id = 11";
                                        $query = mysqli_query($conn, $sql);
                                        while ($row = mysqli_fetch_array($query)) {
                                        ?>
                                        <li>
                                            <a href="index.php?quanly=danhmuctructhuoc&id=<?php echo $row['id_danhmuc'] ?>"
                                                title="<?php echo $row['title']; ?>"><?php echo $row['title']; ?></a>
                                        </li>
                                        <?php
                                        }
                                        ?>
                                    </ul>
                                </li>



                                <li class="evo-main-cate-has-child clearfix">
                                    <?php
                                    $sql = "SELECT * FROM tbl_danhmuc ORDER BY id_thuonghieu ASC limit 11,1";
                                    $query = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_array($query)) {
                                    ?>
                                    <a href="index.php?quanly=danhmucthuonghieudienthoai&id=<?php echo $row['id_thuonghieu'] ?>"
                                        title="<?php echo $row['title']; ?>"><?php echo $row['title']; ?></a>
                                    <?php
                                    }
                                    ?>
                                    <ul class="menu-child-2 sub-menu clearfix">

                                        <?php
                                        $sql = "SELECT * FROM tbl_danhmuctructhuoc WHERE id = 12";
                                        $query = mysqli_query($conn, $sql);
                                        while ($row = mysqli_fetch_array($query)) {
                                        ?>
                                        <li>
                                            <a href="index.php?quanly=danhmuctructhuoc&id=<?php echo $row['id_danhmuc'] ?>"
                                                title="<?php echo $row['title']; ?>"><?php echo $row['title']; ?></a>
                                        </li>
                                        <?php
                                        }
                                        ?>

                                    </ul>
                                </li>


                                <?php
                                $sql = "SELECT * FROM tbl_danhmuc ORDER BY id_thuonghieu ASC limit 12,6";
                                $query = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_array($query)) {
                                ?> <li>
                                    <a href="index.php?quanly=danhmucthuonghieudienthoai&id=<?php echo $row['id_thuonghieu'] ?>"
                                        title="<?php echo $row['title']; ?>"><?php echo $row['title']; ?></a>
                                </li>
                                <?php
                                }
                                ?>
                            </ul>
                        </li>




                        <li class="evo-main-cate-has-child menu-item-count">

                            <?php
                            $sql = "SELECT * FROM tbl_danhmuc ORDER BY id_thuonghieu ASC limit 1,1";
                            $query = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_array($query)) {
                            ?>
                            <a href="index.php?quanly=danhmucthuonghieudienthoai&id=<?php echo $row['id_thuonghieu'] ?>"
                                title="<?php echo $row['title']; ?>">
                                <img src="./dist/images/<?php echo $row['icon']; ?>.png"
                                    alt="<?php echo $row['title']; ?>" /> <?php echo $row['title']; ?></a>
                            <?php
                            }
                            ?>

                            <ul class="menu-child sub-menu evo-sub-mega-menu">


                                <?php
                                $sql = "SELECT * FROM tbl_danhmuc ORDER BY id_thuonghieu ASC limit 19,6";
                                $query = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_array($query)) {
                                ?>
                                <li>
                                    <a href="index.php?quanly=danhmucthuonghieulaptop&id=<?php echo $row['id_thuonghieu'] ?>"
                                        title="<?php echo $row['title']; ?>"><?php echo $row['title']; ?></a>
                                </li>
                                <?php
                                }
                                ?>


                            </ul>
                        </li>




                        <li class="evo-main-cate-has-child menu-item-count">
                            <?php
                            $sql = "SELECT * FROM tbl_danhmuc ORDER BY id_thuonghieu ASC limit 2,1";
                            $query = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_array($query)) {
                            ?>
                            <a href="index.php?quanly=danhmucsanpham&id=<?php echo $row['id_thuonghieu'] ?>"
                                title="<?php echo $row['title']; ?>">
                                <img src="./dist/images/<?php echo $row['icon']; ?>.png"
                                    alt="<?php echo $row['title']; ?>" /> <?php echo $row['title']; ?></a>
                            <?php
                            }
                            ?>
                            <ul class="menu-child sub-menu evo-sub-mega-menu">
                                <?php
                                $sql = "SELECT * FROM tbl_danhmuc ORDER BY id_thuonghieu ASC limit 25,5";
                                $query = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_array($query)) {
                                ?>
                                <li>
                                    <a href="index.php?quanly=danhmucthuonghieutablet&id=<?php echo $row['id_thuonghieu'] ?>"
                                        title="<?php echo $row['title']; ?>"><?php echo $row['title']; ?></a>
                                </li>
                                <?php
                                }
                                ?>
                            </ul>
                        </li>




                        <li class="evo-main-cate-has-child menu-item-count">
                            <?php
                            $sql = "SELECT * FROM tbl_danhmuc ORDER BY id_thuonghieu ASC limit 3,1";
                            $query = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_array($query)) {
                            ?>
                            <a href="index.php?quanly=danhmucsanpham&id=<?php echo $row['id_thuonghieu'] ?>"
                                title="<?php echo $row['title']; ?>">
                                <img src="./dist/images/<?php echo $row['icon']; ?>.png"
                                    alt="<?php echo $row['title']; ?>" /> <?php echo $row['title']; ?></a>
                            <?php
                            }
                            ?>
                            <ul class="menu-child sub-menu evo-sub-mega-menu">
                                <?php
                                $sql = "SELECT * FROM tbl_danhmuc ORDER BY id_thuonghieu ASC limit 30,15";
                                $query = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_array($query)) {
                                ?>
                                <li>
                                    <a href="index.php?quanly=danhmucthuonghieuphukien&id=<?php echo $row['id_thuonghieu'] ?>"
                                        title="<?php echo $row['title']; ?>"><?php echo $row['title']; ?></a>
                                </li>
                                <?php
                                }
                                ?>


                            </ul>
                        </li>
                        <?php
                        $sql = "SELECT * FROM tbl_danhmuc ORDER BY id_thuonghieu ASC limit 4,5";
                        $query = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                        <li class="menu-item-count">

                            <a href="index.php?quanly=danhmucthuonghieudienthoai&id=<?php echo $row['id_thuonghieu'] ?>"
                                title="<?php echo $row['title']; ?>">
                                <img src="./dist/images/<?php echo $row['icon']; ?>.png"
                                    alt="<?php echo $row['title']; ?>" /> <?php echo $row['title']; ?></a>
                        </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>

            </div>
            <div class="col-xl-6 col-lg-9 evo-search-header evo-search-desktop">
                <div class="box-main__box-left">
                    <button class="menu-icon" aria-label="Menu" id="evo-trigger-mobile3" title="Menu">
                        <svg viewBox="0 0 24 16">
                            <path d="M0 15.985v-2h24v2H0zm0-9h24v2H0v-2zm0-7h24v2H0v-2z"></path>
                        </svg>
                    </button>
                </div>
                <div class="evo-searchs">
                    <form action="index.php?quanly=timkiem" method="POST" class="evo-header-search-form" role="search">
                        <input type="text" aria-label="Tìm sản phẩm" name="search_product" class="search-auto form-control"
                            placeholder="Bạn cần tìm gì?" autocomplete="off" />
                        
                        <button class="btn btn-default" name="search_button" type="submit" aria-label="Tìm kiếm">
                            <svg class="Icon Icon--search-desktop" viewBox="0 0 21 21">
                                <g transform="translate(1 1)" stroke="currentColor" stroke-width="2" fill="none"
                                    fill-rule="evenodd" stroke-linecap="square">
                                    <path d="M18 18l-5.7096-5.7096"></path>
                                    <circle cx="7.2" cy="7.2" r="7.2"></circle>
                                </g>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 evo-function-cart-header d-lg-flex d-none">
                <div class="evo-main-account d-lg-inline-block d-none">
                    <?php
                    if (isset($_SESSION['dangnhap_home'])) {
                        $thongtintaikhoan = '';
                        $thongtintaikhoan = 'index.php?quanly=thongtintaikhoan';
                    } else {
                        $thongtintaikhoan = 'index.php?quanly=login';
                    } ?>
                    <a href="<?= $thongtintaikhoan ?> " class="header-account" aria-label="Tài khoản" title="Tài khoản">
                        <svg viewBox="0 0 512 512">
                            <path
                                d="M437.02,330.98c-27.883-27.882-61.071-48.523-97.281-61.018C378.521,243.251,404,198.548,404,148    C404,66.393,337.607,0,256,0S108,66.393,108,148c0,50.548,25.479,95.251,64.262,121.962    c-36.21,12.495-69.398,33.136-97.281,61.018C26.629,379.333,0,443.62,0,512h40c0-119.103,96.897-216,216-216s216,96.897,216,216    h40C512,443.62,485.371,379.333,437.02,330.98z M256,256c-59.551,0-108-48.448-108-108S196.449,40,256,40    c59.551,0,108,48.448,108,108S315.551,256,256,256z"
                                data-original="#222222" class="active-path" fill="#222222" />
                        </svg>
                        <span class="acc-text"><?php
                                                if (isset($_SESSION['dangnhap_home'])) {
                                                    echo  $_SESSION['dangnhap_home'];
                                                } else {
                                                    echo 'Tài khoản';
                                                } ?></span>
                    </a>
                    <ul>

                        <?php
                        if (isset($_SESSION['dangnhap_home'])) {
                        ?>
                        <li class="ng-scope"><a rel="nofollow" href="index.php?quanly=dangxuat" title="Đăng xuất">Đăng
                                xuất</a></li>
                        <?php
                        } else {
                        ?>
                        <li class="ng-scope"><a rel="nofollow" href="index.php?quanly=login" title="Đăng nhập">Đăng
                                nhập</a></li>
                        <li class="ng-scope"><a rel="nofollow" href="index.php?quanly=register" title="Đăng ký">Đăng
                                ký</a></li>
                        <?php
                        } ?>


                    </ul>
                </div>
                <?php
                include "xemgiohang.php";
                ?>
            </div>
        </div>
    </div>
</div>
</header>
<script>
var resizeTimer = false,
    resizeWindow = $(window).prop("innerWidth");
var parentHeight = $('.evo-header-other').outerHeight();
var $header = $('.header-bottom');
var offset_sticky_header = $header.outerHeight() + 100;
var offset_sticky_down = 0;
$('.evo-header-other').css('min-height', parentHeight);
$(window).on("resize", function() {
    if (resizeTimer) {
        clearTimeout(resizeTimer)
    }
    resizeTimer = setTimeout(function() {
        var newWidth = $(window).prop("innerWidth");
        if (resizeWindow != newWidth) {
            $header.removeClass('hSticky-up').removeClass('hSticky-down').removeClass('hSticky');
            $('.evo-header-other').css('min-height', '');
            parentHeight = $('.evo-header-other').outerHeight();
            $('.evo-header-other').css('min-height', parentHeight);
            resizeWindow = newWidth
        }
    }, 200);
});
setTimeout(function() {
    $header.removeClass('hSticky-up').removeClass('hSticky-down').removeClass('hSticky');
    $('.evo-header-other').css('min-height', '');
    parentHeight = $('.evo-header-other').outerHeight();
    $('.evo-header-other').css('min-height', parentHeight);
    jQuery(window).scroll(function() {
        /* scroll header */
        if (jQuery(window).scrollTop() > offset_sticky_header && jQuery(window).scrollTop() >
            offset_sticky_down) {
            if (jQuery(window).width() > 991) {
                $('body').removeClass('locked-scroll');
                $('.header-action-icon').removeClass('show-action');
            }
            $header.addClass('hSticky');
            if (jQuery(window).scrollTop() > offset_sticky_header + 150) {
                $header.removeClass('hSticky-up').addClass('hSticky-down');
                $('body').removeClass('bSticky-scroll');
            }
        } else {
            if (jQuery(window).scrollTop() > offset_sticky_header + 150 && (jQuery(window).scrollTop() -
                    150) + jQuery(window).height() < $(document).height()) {
                $header.addClass('hSticky-up');
                $('body').addClass('bSticky-scroll');
            }
        }
        if (jQuery(window).scrollTop() <= offset_sticky_down && jQuery(window).scrollTop() <=
            offset_sticky_header) {
            $header.removeClass('hSticky-up').removeClass('hSticky-down').removeClass('hSticky');
            $('body').removeClass('bSticky-scroll');
        }
        offset_sticky_down = jQuery(window).scrollTop();
    });
}, 300);
</script>