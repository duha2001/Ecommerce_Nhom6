<section class="awe-section-1">
    <div class="container section_slider">
        <div class="row">
            <div class="col-xl-3 col-lg-3 evo-width-cate d-lg-block d-none">
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
                                        <a href="index.php?quanly=danhmucthuonghieudienthoai&id=<?php echo $row['id_danhmuc'] ?>"
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
                        <a href="index.php?quanly=danhmucsanpham&id=<?php echo $row['id_thuonghieu'] ?>"
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

                        <a href="index.php?quanly=danhmucsanpham&id=<?php echo $row['id_thuonghieu'] ?>"
                            title="<?php echo $row['title']; ?>">
                            <img src="./dist/images/<?php echo $row['icon']; ?>.png"
                                alt="<?php echo $row['title']; ?>" /> <?php echo $row['title']; ?></a>
                    </li>
                    <?php
                    }
                    ?>
                </ul>

            </div>
            <div class="col-xl-6 col-lg-9 home-sliders">
                <div class="evo-home-slider">
                    <div class="home-slider swiper-container gallery-top">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <a href="#" class="clearfix" title="Vsmart Live 4 Chỉ còn 4.29 triệu">
                                    <picture>
                                        <source media="(min-width: 1200px)"
                                            srcset="//bizweb.dktcdn.net/100/415/483/themes/804267/assets/slider_2.jpg?1649491018773">
                                        <source media="(min-width: 992px)"
                                            srcset="//bizweb.dktcdn.net/100/415/483/themes/804267/assets/slider_2.jpg?1649491018773">
                                        <source media="(min-width: 569px)"
                                            srcset="//bizweb.dktcdn.net/100/415/483/themes/804267/assets/slider_2.jpg?1649491018773">
                                        <source media="(max-width: 480px)"
                                            srcset="//bizweb.dktcdn.net/thumb/large/100/415/483/themes/804267/assets/slider_2.jpg?1649491018773">
                                        <img src="//bizweb.dktcdn.net/thumb/grande/100/415/483/themes/804267/assets/slider_2.jpg?1649491018773"
                                            alt="Vsmart Live 4 Ch&#7881; còn 4.29 tri&#7879;u"
                                            class="img-responsive center-block" />
                                    </picture>
                                </a>
                            </div>







                            <div class="swiper-slide">
                                <a href="#" class="clearfix" title="Galaxy S21 Series Quà Cực Hot">
                                    <picture>
                                        <source media="(min-width: 1200px)"
                                            srcset="//bizweb.dktcdn.net/100/415/483/themes/804267/assets/slider_3.jpg?1649491018773">
                                        <source media="(min-width: 992px)"
                                            srcset="//bizweb.dktcdn.net/100/415/483/themes/804267/assets/slider_3.jpg?1649491018773">
                                        <source media="(min-width: 569px)"
                                            srcset="//bizweb.dktcdn.net/100/415/483/themes/804267/assets/slider_3.jpg?1649491018773">
                                        <source media="(max-width: 480px)"
                                            srcset="//bizweb.dktcdn.net/thumb/large/100/415/483/themes/804267/assets/slider_3.jpg?1649491018773">
                                        <img src="//bizweb.dktcdn.net/thumb/grande/100/415/483/themes/804267/assets/slider_3.jpg?1649491018773"
                                            alt="Galaxy S21 Series Quà C&#7921;c Hot"
                                            class="img-responsive center-block" />
                                    </picture>
                                </a>
                            </div>













                            <div class="swiper-slide">
                                <a href="#" class="clearfix" title="Vivo xuân sale Trợ giá 1.5 triệu">
                                    <picture>
                                        <source media="(min-width: 1200px)"
                                            srcset="//bizweb.dktcdn.net/100/415/483/themes/804267/assets/slider_5.jpg?1649491018773">
                                        <source media="(min-width: 992px)"
                                            srcset="//bizweb.dktcdn.net/100/415/483/themes/804267/assets/slider_5.jpg?1649491018773">
                                        <source media="(min-width: 569px)"
                                            srcset="//bizweb.dktcdn.net/100/415/483/themes/804267/assets/slider_5.jpg?1649491018773">
                                        <source media="(max-width: 480px)"
                                            srcset="//bizweb.dktcdn.net/thumb/large/100/415/483/themes/804267/assets/slider_5.jpg?1649491018773">
                                        <img src="//bizweb.dktcdn.net/thumb/grande/100/415/483/themes/804267/assets/slider_5.jpg?1649491018773"
                                            alt="Vivo xuân sale Tr&#7907; giá 1.5 tri&#7879;u"
                                            class="img-responsive center-block" />
                                    </picture>
                                </a>
                            </div>


                        </div>
                    </div>
                    <div class="swiper-container gallery-thumbs hidden-mobile">
                        <div class="swiper-wrapper">








                            <div class="swiper-slide">Vsmart Live 4<br> Chỉ còn 4.29 triệu</div>





                            <div class="swiper-slide">Galaxy S21 Series<br> Quà Cực Hot</div>









                            <div class="swiper-slide">Vivo xuân sale<br> Trợ giá 1.5 triệu</div>


                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-12 evo-width-news evo_banner_option_1">

                <a href="#" title="Evo Mobile">
                    <picture>
                        <source media="(min-width: 1200px)"
                            srcset="//bizweb.dktcdn.net/thumb/large/100/415/483/themes/804267/assets/slider_6.jpg?1649491018773">
                        <source media="(min-width: 992px)"
                            srcset="//bizweb.dktcdn.net/100/415/483/themes/804267/assets/slider_6.jpg?1649491018773">
                        <source media="(min-width: 569px)"
                            srcset="//bizweb.dktcdn.net/100/415/483/themes/804267/assets/slider_6.jpg?1649491018773">
                        <source media="(max-width: 480px)"
                            srcset="//bizweb.dktcdn.net/thumb/large/100/415/483/themes/804267/assets/slider_6.jpg?1649491018773">
                        <img class="lazy"
                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
                            data-src="//bizweb.dktcdn.net/100/415/483/themes/804267/assets/slider_6.jpg?1649491018773"
                            alt="Evo Mobile" />
                    </picture>
                </a>

            </div>
        </div>
    </div>
    <script>
    var menu_limit = "8";
    if (isNaN(menu_limit)) {
        menu_limit = 10;
    } else {
        menu_limit = 7;
    }
    var sidebar_length = $('.menu-item-count').length;
    if (sidebar_length > (menu_limit + 1)) {
        $('.evo-width-cate > ul').each(function() {
            $('.menu-item-count', this).eq(menu_limit).nextAll().hide().addClass('toggleable');
            $(this).append('<li class="more"><a title="Xem thêm...">Xem thêm...</a></li>');
        });
        $('.evo-width-cate > ul').on('click', '.more', function() {
            if ($(this).hasClass('less')) {
                $(this).html('<a title="Xem thêm...">Xem thêm...</a>').removeClass('less');
            } else {
                $(this).html('<a title="Thu gọn...">Thu gọn...</a>').addClass('less');;
            }
            $(this).siblings('li.toggleable').slideToggle({
                complete: function() {
                    var divHeight = $('.evo-main-cate').height();
                }
            });
        });
    }
    </script>
</section>