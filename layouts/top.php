<body class="index">
    <header class="evo-header-other">
        <div class="header-top container">
            <div class="row align-items-center evo-header-padding">
                <div class="col-lg-2 col-md-2 header-logo evo-header-flex-item">
                    <button class="d-sm-inline-block d-lg-none menu-icon" aria-label="Menu" id="evo-trigger-mobile2"
                        title="Menu">
                        <svg viewBox="0 0 24 16">
                            <path d="M0 15.985v-2h24v2H0zm0-9h24v2H0v-2zm0-7h24v2H0v-2z"></path>
                        </svg>
                    </button>
                    <a href="/" class="logo-wrapper" title="ADHK">
                        <picture>
                            <source media="(min-width: 992px)" srcset="./dist/images/smart-store-rmbg.png">
                            <source media="(max-width: 991px)" srcset="./dist/images/mobi.png">
                            <img src="./dist/images/smart-store-rmbg.png" data-src="./dist/images/smart-store-rmbg.png" alt="ADHK"
                                class="lazy img-responsive mx-auto d-block" />
                        </picture>
                    </a>
                </div>
                <div class="header-main-nav col-lg-8 col-md-8 d-lg-flex d-none">
                    <ul id="nav" class="nav container">




                        <li class="nav-item active">
                            <a class="nav-link" href="/" title="Trang chủ">Trang chủ</a>
                        </li>




                        <li class="nav-item ">
                            <a class="nav-link" href="index.php?quanly=gioithieu" title="Giới thiệu">Giới thiệu</a>
                        </li>




                        <li class=" nav-item has-childs   has-mega">
                            <a href="/index.php?quanly=allsp" class="nav-link" title="Sản phẩm">Sản phẩm <svg
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    x="0px" y="0px" viewBox="0 0 490.656 490.656"
                                    style="enable-background:new 0 0 490.656 490.656;" xml:space="preserve" width="25px"
                                    height="25px">
                                    <path
                                        d="M487.536,120.445c-4.16-4.16-10.923-4.16-15.083,0L245.339,347.581L18.203,120.467c-4.16-4.16-10.923-4.16-15.083,0    c-4.16,4.16-4.16,10.923,0,15.083l234.667,234.667c2.091,2.069,4.821,3.115,7.552,3.115s5.461-1.045,7.531-3.136l234.667-234.667    C491.696,131.368,491.696,124.605,487.536,120.445z"
                                        data-original="#000000" class="active-path" data-old_color="#000000"
                                        fill="#141414" />
                                </svg></a>


                            <div class="mega-content">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <ul class="level0">


                                                <li class="level1 parent item fix-navs">
                                                    <?php
                                                    $sql = "SELECT * FROM tbl_danhmuc ORDER BY id_thuonghieu ASC limit 0,1";
                                                    $query = mysqli_query($conn, $sql);
                                                    while ($row = mysqli_fetch_array($query)) {
                                                    ?>
                                                    <a class="hmega"
                                                        href="index.php?quanly=danhmucsanpham&id=<?php echo $row['id_thuonghieu'] ?>"
                                                        title="<?php echo $row['title']; ?>"><?php echo $row['title']; ?></a>
                                                    <?php
                                                    }
                                                    ?>
                                                    <ul class="level1">
                                                        <?php
                                                        $sql = "SELECT * FROM tbl_danhmuc WHERE parent_id = 1";
                                                        $query = mysqli_query($conn, $sql);
                                                        while ($row = mysqli_fetch_array($query)) {
                                                        ?>
                                                        <li class="level2">
                                                            <a href="index.php?quanly=danhmucthuonghieudienthoai&id=<?php echo $row['id_thuonghieu'] ?>"
                                                                title="<?php echo $row['title']; ?>"><?php echo $row['title']; ?></a>
                                                        </li>
                                                        <?php
                                                        }
                                                        ?>
                                                    </ul>
                                                </li>



                                                <li class="level1 parent item fix-navs">
                                                    <?php
                                                    $sql = "SELECT * FROM tbl_danhmuc ORDER BY id_thuonghieu ASC limit 1,1";
                                                    $query = mysqli_query($conn, $sql);
                                                    while ($row = mysqli_fetch_array($query)) {
                                                    ?>
                                                    <a class="hmega"
                                                        href="index.php?quanly=danhmucsanpham&id=<?php echo $row['id_thuonghieu'] ?>"
                                                        title="<?php echo $row['title']; ?>"><?php echo $row['title']; ?></a>
                                                    <?php
                                                    }
                                                    ?>
                                                    <ul class="level1">

                                                        <?php
                                                        $sql = "SELECT * FROM tbl_danhmuc WHERE parent_id = 2";
                                                        $query = mysqli_query($conn, $sql);
                                                        while ($row = mysqli_fetch_array($query)) {
                                                        ?>
                                                        <li class="level2">
                                                            <a href="index.php?quanly=danhmucthuonghieulaptop&id=<?php echo $row['id_thuonghieu'] ?>"
                                                                title="<?php echo $row['title']; ?>"><?php echo $row['title']; ?></a>
                                                        </li>
                                                        <?php
                                                        }
                                                        ?>

                                                    </ul>
                                                </li>



                                                <li class="level1 parent item fix-navs">
                                                    <?php
                                                    $sql = "SELECT * FROM tbl_danhmuc ORDER BY id_thuonghieu ASC limit 2,1";
                                                    $query = mysqli_query($conn, $sql);
                                                    while ($row = mysqli_fetch_array($query)) {
                                                    ?>
                                                    <a class="hmega"
                                                        href="index.php?quanly=danhmucsanpham&id=<?php echo $row['id_thuonghieu'] ?>"
                                                        title="<?php echo $row['title']; ?>"><?php echo $row['title']; ?></a>
                                                    <?php
                                                    }
                                                    ?>
                                                    <ul class="level1">
                                                        <?php
                                                        $sql = "SELECT * FROM tbl_danhmuc WHERE parent_id = 3";
                                                        $query = mysqli_query($conn, $sql);
                                                        while ($row = mysqli_fetch_array($query)) {
                                                        ?>
                                                        <li class="level2">
                                                            <a href="index.php?quanly=danhmucthuonghieutablet&id=<?php echo $row['id_thuonghieu'] ?>"
                                                                title="<?php echo $row['title']; ?>"><?php echo $row['title']; ?></a>
                                                        </li>
                                                        <?php
                                                        }
                                                        ?>

                                                    </ul>
                                                </li>



                                                <li class="level1 parent item fix-navs">
                                                    <?php
                                                    $sql = "SELECT * FROM tbl_danhmuc ORDER BY id_thuonghieu ASC limit 3,1";
                                                    $query = mysqli_query($conn, $sql);
                                                    while ($row = mysqli_fetch_array($query)) {
                                                    ?>
                                                    <a class="hmega"
                                                        href="index.php?quanly=danhmucsanpham&id=<?php echo $row['id_thuonghieu'] ?>"
                                                        title="<?php echo $row['title']; ?>"><?php echo $row['title']; ?></a>
                                                    <?php
                                                    }
                                                    ?>
                                                    <ul class="level1">

                                                        <?php
                                                        $sql = "SELECT * FROM tbl_danhmuc WHERE parent_id = 4";
                                                        $query = mysqli_query($conn, $sql);
                                                        while ($row = mysqli_fetch_array($query)) {
                                                        ?>
                                                        <li class="level2">
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
                                                <li class="level1 item">
                                                    <a class="hmega"
                                                        href="index.php?quanly=danhmucsanpham&id=<?php echo $row['id_thuonghieu'] ?>"
                                                        title="<?php echo $row['title']; ?>"><?php echo $row['title']; ?></a>
                                                </li>
                                                <?php
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                        <div class="col-lg-4">
                                            <a href="#" title="Sản phẩm">
                                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
                                                    data-src="//bizweb.dktcdn.net/100/415/483/themes/804267/assets/mega-1-image.jpg?1649491018773"
                                                    alt="Sản phẩm" class="lazy img-responsive mx-auto d-block" />
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>




                        <li class=" nav-item has-childs  ">
                            <a href="#" class="nav-link" title="Tin tức">Tin tức <svg xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                    viewBox="0 0 490.656 490.656" style="enable-background:new 0 0 490.656 490.656;"
                                    xml:space="preserve" width="25px" height="25px">
                                    <path
                                        d="M487.536,120.445c-4.16-4.16-10.923-4.16-15.083,0L245.339,347.581L18.203,120.467c-4.16-4.16-10.923-4.16-15.083,0    c-4.16,4.16-4.16,10.923,0,15.083l234.667,234.667c2.091,2.069,4.821,3.115,7.552,3.115s5.461-1.045,7.531-3.136l234.667-234.667    C491.696,131.368,491.696,124.605,487.536,120.445z"
                                        data-original="#000000" class="active-path" data-old_color="#000000"
                                        fill="#141414" />
                                </svg></a>

                            <ul class="dropdown-menu">


                                <li class="nav-item-lv2">
                                    <a class="nav-link" href="#" title="Khuyến mãi">Khuyến mãi</a>
                                </li>



                                <li class="nav-item-lv2">
                                    <a class="nav-link" href="#" title="Thủ thuật">Thủ thuật</a>
                                </li>



                                <li class="nav-item-lv2">
                                    <a class="nav-link" href="#" title="Video Hot">Video Hot</a>
                                </li>



                                <li class="nav-item-lv2">
                                    <a class="nav-link" href="#" title="Đánh giá - Tư vấn">Đánh giá - Tư vấn</a>
                                </li>



                                <li class="nav-item-lv2">
                                    <a class="nav-link" href="#" title="App & Game">App & Game</a>
                                </li>



                                <li class="nav-item-lv2">
                                    <a class="nav-link" href="#" title="Thị trường">Thị trường</a>
                                </li>


                            </ul>

                        </li>




                        <li class="nav-item ">
                            <a class="nav-link" href="index.php?quanly=baogiamienphi" title="Báo giá miễn phí">Báo giá
                                miễn phí</a>
                        </li>




                        <li class="nav-item ">
                            <a class="nav-link" target="_blank" href="https://m.me/109894831747162" title="Liên hệ">Liên hệ</a>
                        </li>


                    </ul>
                </div>
                <div class="col-lg-2 col-md-2 evo-header-flex-item evo-header-flex-item-mobile">
                    <div class="evo-main-hotline">
                        <a href="tel:19006750" title="Gọi mua hàng:"><span>Gọi mua hàng:</span>1900 6750</a>
                    </div>
                    <a href="index.php?quanly=giohang" class="evo-header-cart d-sm-inline-block d-lg-none"
                        aria-label="Xem giỏ hàng" title="Giỏ hàng">
                        <svg viewBox="0 0 512 512">
                            <g>
                                <path xmlns="http://www.w3.org/2000/svg"
                                    d="m504.399 185.065c-6.761-8.482-16.904-13.348-27.83-13.348h-98.604l-53.469-122.433c-3.315-7.591-12.157-11.06-19.749-7.743-7.592 3.315-11.059 12.158-7.743 19.75l48.225 110.427h-178.458l48.225-110.427c3.315-7.592-.151-16.434-7.743-19.75-7.591-3.317-16.434.15-19.749 7.743l-53.469 122.434h-98.604c-10.926 0-21.069 4.865-27.83 13.348-6.637 8.328-9.086 19.034-6.719 29.376l52.657 230c3.677 16.06 17.884 27.276 34.549 27.276h335.824c16.665 0 30.872-11.216 34.549-27.276l52.657-230.001c2.367-10.342-.082-21.048-6.719-29.376zm-80.487 256.652h-335.824c-2.547 0-4.778-1.67-5.305-3.972l-52.657-229.998c-.413-1.805.28-3.163.936-3.984.608-.764 1.985-2.045 4.369-2.045h85.503l-3.929 8.997c-3.315 7.592.151 16.434 7.743 19.75 1.954.854 3.99 1.258 5.995 1.258 5.782 0 11.292-3.363 13.754-9l9.173-21.003h204.662l9.173 21.003c2.462 5.638 7.972 9 13.754 9 2.004 0 4.041-.404 5.995-1.258 7.592-3.315 11.059-12.158 7.743-19.75l-3.929-8.997h85.503c2.384 0 3.761 1.281 4.369 2.045.655.822 1.349 2.18.936 3.983l-52.657 230c-.528 2.301-2.76 3.971-5.307 3.971z"
                                    fill="#ffffff" data-original="#000000" style=""></path>
                                <path xmlns="http://www.w3.org/2000/svg"
                                    d="m166 266.717c-8.284 0-15 6.716-15 15v110c0 8.284 6.716 15 15 15s15-6.716 15-15v-110c0-8.284-6.715-15-15-15z"
                                    fill="#ffffff" data-original="#000000" style=""></path>
                                <path xmlns="http://www.w3.org/2000/svg"
                                    d="m256 266.717c-8.284 0-15 6.716-15 15v110c0 8.284 6.716 15 15 15s15-6.716 15-15v-110c0-8.284-6.716-15-15-15z"
                                    fill="#ffffff" data-original="#000000" style=""></path>
                                <path xmlns="http://www.w3.org/2000/svg"
                                    d="m346 266.717c-8.284 0-15 6.716-15 15v110c0 8.284 6.716 15 15 15s15-6.716 15-15v-110c-.001-8.284-6.716-15-15-15z"
                                    fill="#ffffff" data-original="#000000" style=""></path>
                            </g>
                        </svg>
                        <span class="count_item_pr hascart"><span><?php if (isset($_SESSION['cart'])) {
                                                                        echo count($cart_item['soluong']);
                                                                    } else {
                                                                        echo 0;
                                                                    } ?></span></span>
                    </a>
                </div>
            </div>
        </div>
        </div>