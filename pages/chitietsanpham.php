<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $showData = "SELECT * FROM tbl_sanpham WHERE id_sanpham = $id";
    $arrSanPhamhow = mysqli_query($conn, $showData);
    $row = mysqli_fetch_array($arrSanPhamhow);
}
?>
           <?php
if(isset($_POST['send_binhluan'])){
    $error = array();
    $success = array();
    $showMess = false;
    $id_sanpham = $_GET['id'];
    $user = $_SESSION['dangnhap_home'];
    $binhluan = $_POST['binhluan'];
    if (empty($_POST['binhluan']))
            $error['binhluan'] = 'Vui lòng nhập<b> nội dung bình luận</b>';
if (!$error) {
    $showMess = true;
    // insert record
    $insert = "INSERT INTO `tbl_binhluan` (`id_binhluan`, `id_sanpham`, `user`, `binhluan`) VALUES (NULL, '$id_sanpham', '$user', '$binhluan');";
    mysqli_query($conn, $insert);
    // add image to folder
    $success['success'] = 'Gửi bình luận thành công.';
    echo '<script>setTimeout("window.location=\'?quanly=chitietsanpham&id=' . $id_sanpham . '\'",1000);</script>';
}

}
           ?>





<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="theme-color" content="#30656b" />

    <link rel="preload" as="style" type="text/css"
        href="//bizweb.dktcdn.net/100/415/483/themes/804267/assets/evo-products.scss.css?1649491018773" />
    <link href="//bizweb.dktcdn.net/100/415/483/themes/804267/assets/evo-products.scss.css?1649491018773"
        rel="stylesheet" type="text/css" />
    <script src="/dist/js/stats.min.js?v=28095b0"></script>
</head>

<body class="product">
    <section class="bread-crumb">
        <div class="container">
            <ul class="breadcrumb">
                <li class="home" itemprop="itemListElement">
                    <a itemprop="item" href="/" title="Trang chủ">
                        <span itemprop="name">Trang chủ</span>
                        <meta itemprop="position" content="1" />
                    </a>
                </li>


                <li itemprop="itemListElement">
                    <a itemprop="item" href="/iphone-12-series" title="iPhone 12 Series">
                        <span itemprop="name">iPhone 12 Series</span>
                        <meta itemprop="position" content="2" />

                    </a>
                </li>

                <li itemprop="itemListElement">
                    <strong>
                        <span itemprop="name"><?= $row['tensanpham']; ?></span>
                        <meta itemprop="position" content="3" />
                    </strong>
                </li>

            </ul>
        </div>
    </section>

    <section class="product product-margin" itemscope itemtype="">
        <div class="container margin-top-10">
            <div class="shadow-sm margin-bottom-10 row details-product product-bottom">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12 evo-top-product-name">
                    <h1 class="title-head"><?= $row['tensanpham']; ?></h1>
                    <div class="sapo-product-reviews-badge"></div>
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
                            // show success
                            if (isset($success)) {
                                if ($showMess == true) {
                                    echo "<div class='alert alert-success alert-dismissible'>";
                                    echo "<h4><i class='icon fa fa-check'></i> Thành công!</h4>";
                                    foreach ($success as $suc) {
                                        echo $suc . "<br/>";
                                    }
                                    echo "</div>";
                                }
                            }
                            ?>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-12 no-padding">
                    <div class="product-image-block">
                        <div class="swiper-container gallery-top margin-bottom-10">
                            <div class="swiper-wrapper" id="lightgallery">

                                <a class="swiper-slide" data-hash="0" href="<?= $row['banner1']; ?>"
                                    title="Click để xem">
                                    <!--<img src="<?= $row['banner1']; ?>" data-src="<?= $row['banner1']; ?>"-->
                                    <!--    alt="<?= $row['tensanpham']; ?>" data-image="<?= $row['banner1']; ?>"-->
                                    <!--    class="img-responsive mx-auto d-block swiper-lazy" />-->
                                    <iframe  src="<?= $row['banner1']; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="
    width: 97%;
    height: 100%;
"></iframe>
                                </a> 




                                <a class="swiper-slide" data-hash="1" href="" title="Click để xem">
                                    <img src="<?= $row['banner2']; ?>" data-src="<?= $row['banner2']; ?>"
                                        alt="<?= $row['tensanpham']; ?>" data-image="<?= $row['banner2']; ?>"
                                        class="img-responsive mx-auto d-block swiper-lazy" />
                                </a>

                                <a class="swiper-slide" data-hash="2" href="" title="Click để xem">
                                    <img src="<?= $row['banner3']; ?>" data-src="<?= $row['banner3']; ?>"
                                        alt="<?= $row['tensanpham']; ?>" data-image="<?= $row['banner3']; ?>"
                                        class="img-responsive mx-auto d-block swiper-lazy" />
                                </a>

                                <a class="swiper-slide" data-hash="3" href="" title="Click để xem">
                                    <img src="<?= $row['banner4']; ?>" data-src="<?= $row['banner4']; ?>"
                                        alt="<?= $row['tensanpham']; ?>" data-image="<?= $row['banner4']; ?>"
                                        class="img-responsive mx-auto d-block swiper-lazy" />
                                </a>

                                <a class="swiper-slide" data-hash="4" href="" title="Click để xem">
                                    <img src="<?= $row['banner5']; ?>" data-src="<?= $row['banner5']; ?>"
                                        alt="<?= $row['tensanpham']; ?>" data-image="<?= $row['banner5']; ?>"
                                        class="img-responsive mx-auto d-block swiper-lazy" />
                                </a>
                            </div>
                        </div>
                        <div class="swiper-container gallery-thumbs">
                            <div class="swiper-wrapper">


                                <div class="swiper-slide" data-hash="0">
                                    <!--<img src="<?= $row['banner1']; ?>" data-src="<?= $row['banner1']; ?>"-->
                                    <!--    alt="<?= $row['tensanpham']; ?>" data-image="<?= $row['banner1']; ?>"-->
                                    <!--    class="swiper-lazy" />-->
                                    <iframe  src="<?= $row['banner1']; ?>" data-src="<?= $row['banner1']; ?>" alt="<?= $row['tensanpham']; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="
    width: 100%;
    height: 100%;
"></iframe>
                                </div>

                                <div class="swiper-slide" data-hash="1">
                                    <img src="<?= $row['banner2']; ?>" data-src="<?= $row['banner2']; ?>"
                                        alt="<?= $row['tensanpham']; ?>" data-image="<?= $row['banner2']; ?>"
                                        class="swiper-lazy" />
                                </div>

                                <div class="swiper-slide" data-hash="2">
                                    <img src="<?= $row['banner3']; ?>" data-src="<?= $row['banner3']; ?>"
                                        alt="<?= $row['tensanpham']; ?>" data-image="<?= $row['banner3']; ?>"
                                        class="swiper-lazy" />
                                </div>

                                <div class="swiper-slide" data-hash="3">
                                    <img src="<?= $row['banner4']; ?>" data-src="<?= $row['banner4']; ?>"
                                        alt="<?= $row['tensanpham']; ?>" data-image="<?= $row['banner4']; ?>"
                                        class="swiper-lazy" />
                                </div>

                                <div class="swiper-slide" data-hash="4">
                                    <img src="<?= $row['banner5']; ?>" data-src="<?= $row['banner5']; ?>"
                                        alt="<?= $row['tensanpham']; ?>" data-image="<?= $row['banner5']; ?>"
                                        class="swiper-lazy" />
                                </div>

                            </div>
                        </div>

                    </div>

                </div>
                <div class="col-lg-5 col-md-6 col-sm-12 col-12 details-pro">
                    <div class="product-top clearfix">

                        <div class="sku-product clearfix">
                            <span itemprop="brand" itemtype="http://schema.org/Brand" itemscope>
                                Thương hiệu: <strong>
                                    <?php $showdanhmuc = $row['id_loaisanpham'];
                                    $rs_danhmuc = mysqli_query($conn, "SELECT * FROM tbl_danhmuc WHERE id_thuonghieu = $showdanhmuc");
                                    $show_dm = mysqli_fetch_array($rs_danhmuc);
                                    echo $show_dm['title']; ?>
                                </strong>
                            </span>
                            <span class="variant-sku" itemprop="sku" content="Đang cập nhật">Mã sản phẩm:
                                <strong><?= $row['id_sanpham']; ?></strong></span>
                        </div>
                    </div>
                    <div itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
                        <div class="price-box clearfix">
                            <span class="special-price">
                                <span
                                    class="price product-price"><?php echo number_format($row['giakhuyenmai']) . '₫' ?></span>
                            </span> <!-- Giá Khuyến mại -->
                            <span class="old-price" itemprop="priceSpecification" itemscope=""
                                itemtype="http://schema.org/priceSpecification">
                                Giá niêm yết:
                                <del class="price product-price-old">
                                    <?php echo number_format($row['giagoc']) . '₫' ?>
                                </del>
                                <meta itemprop="price" content="9900000">
                                <meta itemprop="priceCurrency" content="VND">
                            </span> <!-- Giá gốc -->
                            <?php
                            $giamgia = $row['giagoc'] - $row['giakhuyenmai'];
                            ?>
                            <span class="save-price">Tiết kiệm:
                                <span
                                    class="price product-price-save"><?php echo number_format($giamgia) . '₫' ?></span>
                            </span> <!-- Tiết kiệm -->

                        </div>
                    </div>
                    <div class="form-product">
                        <form enctype="multipart/form-data"
                            action="pages/themgiohang.php?idsanpham=<?= $row['id_sanpham'] ?>" method="post"
                            class="clearfix">
                            <div class="form-groups clearfix ">
                                <div class="btn-mua">
                                    <button type="submit" name="themgiohang"
                                        class="btn btn-lg btn-gray btn-cart btn_buy add_to_cart">Mua
                                        ngay<span>Giao tận
                                            nơi hoặc nhận tại cửa hàng</span></button>
                                </div>
                            </div>
                        </form>
                        <div class="product-wish">
                            <button type="button" class="evo-button-bottom-form favorites-btn"
                                title="Thêm vào danh sách yêu thích">
                                Yêu thích
                            </button>
                            <a href="index.php?quanly=tragop" class="evo-button-bottom-form favorites-btn" target="_blank"
                                title="Trả góp">Trả góp</a>

                        </div>
                        <div class="product-hotline">Gọi <a href="tel:19006750" title="19006750">1900 6750</a> để tư vấn
                            mua hàng</div>
                            <div class="zalo-share-button" data-href="" data-oaid="579745863508352884" data-layout="1" data-color="white" data-share-type="2" data-customize="false"></div>
                            <div class="sharethis-inline-share-buttons"></div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 col-sm-12 col-12 evo-feature no-padding">


                    <div class="product-summary">
                        <p><b>Tình trạng</b><br />
                            <?= $row['tinh_trang']; ?></p>
                        <p><b>Hộp bao gồm</b><br />
                            <?= $row['hopbaogom']; ?></p>
                        <p><b>Bảo hành</b><br />
                            <?= $row['baohanh']; ?></p>
                    </div>


                    <div class="product-promotion">
                        <div class="promotion-item">
                            <img data-src="//bizweb.dktcdn.net/100/415/483/themes/804267/assets/product_main_policy_1_img.jpg?1649491018773"
                                class="lazy"
                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
                                alt="Bàn phím Magic Keyboard iPad Pro 11 (MXQT2ZA/A)" />
                            <div class="text"><strong>Thanh toán Smartpay</strong> Giảm ngay 20% tối đa 500.000đ khi
                                thanh toán qua Smartpay tại quầy</div>
                        </div>
                        <div class="promotion-item">
                            <img data-src="//bizweb.dktcdn.net/100/415/483/themes/804267/assets/product_main_policy_2_img.jpg?1649491018773"
                                class="lazy"
                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
                                alt="Bàn phím Magic Keyboard iPad Pro 11 (MXQT2ZA/A)" />
                            <div class="text"><strong>Thanh toán ví Moca trên ứng dụng Grab</strong> Nhập MOCA400
                                Giảm/Hoàn tiền 10% tối đa 400.000đ khi thanh toán Online bằng ví Moca</div>
                        </div>
                    </div>


                </div>
            </div>
            <div class="row">
                <div class="col-lg-7">
                    <div class="shadow-sm margin-bottom-10">

                        <div class="evo-product-review-details">
                            <div class="title">Đánh giá chi tiết <?= $row['tensanpham']; ?></div>
                            <div class="clearfix"></div>
                            <div class="evo-product-review-content">
                                <div class="ba-text-fpt has-height">
                                    <?= $row['mota']; ?></p>
                                </div>

                                <div class="show-more hidden-lg hidden-md hidden-sm">
                                    <div class="btn btn-default btn--view-more">
                                        <span class="more-text">Xem thêm <i class="fa fa-chevron-down"></i></span>
                                        <span class="less-text">Thu gọn <i class="fa fa-chevron-up"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br/>
                        <h4>Bình Luận<span class="glyphicon glyphicon-pencil"></span></h4>
                        <?php
    $id_sanpham = $_GET['id'];
    $showData = "SELECT * FROM `tbl_binhluan` where `id_sanpham` = $id_sanpham";

    $result = mysqli_query($conn, $showData);
    $arrbt = array();
    while ($rowbl = mysqli_fetch_array($result)) {
        $arrbt[] = $rowbl;
    }
    ?>
     <?php
        $count = 0;
        foreach ($arrbt as $arrbinhluan) {
            $count++;
        ?>
        <hr>
        <p class="txt">
            <span class="user" style="font-weight: bold"><img src="../dist//images/2.jpg" style="width: 50px; margin-right:10px"><?php echo $count; ?>. <?= $arrbinhluan['user'];?>: </span> <?= $arrbinhluan['binhluan'];?>
        <a style="float: right; margin-top: 45px" href="http://">Trả lời</a>
        </p>
        <hr>
<?php } ?>
           <hr>
<div class="well">
    <h4>Viết bình luận<span class="glyphicon glyphicon-pencil"></span></h4>
    <form action="" method="post">
<div class="form-group">
    <textarea class="form-control" name="binhluan" rows="3"></textarea>
</div>
<?php if(isset($_SESSION['dangnhap_home'])){

?>
<button type="submit" name="send_binhluan" class="btn btn-primary">Bình luận</button>
<?php } else {
 echo "Vui lòng <b>đăng nhập</b> để thực hiện chức năng này";
}?>
    </form>
</div>

                    </div>
                </div>
                <div class="col-lg-5 evo-product-fix-padding">
                    <div class="shadow-sm margin-bottom-10 specifications">
                        <div class="title">Thông số kỹ thuật</div>

                        <table>
                            <?=  substr($row['thong_so_ky_thuat'], 0, 1560); ?>
                        </table>

                        <div class="text-center">
                            <button type="button" class="btn btn-primary evo-specifications-button" data-toggle="modal"
                                data-target="#specificationsModal" title="Xem cấu hình chi tiết">Xem cấu hình chi tiết
                                <span class="carret"></span></button>
                        </div>
                    </div>

                    <div class="modal fade" id="specificationsModal" tabindex="-1" aria-labelledby="specificationsModal"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Thông số kỹ thuật</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <table id="tskt">
                                        <?= $row['thong_so_ky_thuat']; ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php include 'tintuc.php'
                    ?>

                </div>
            </div>

            <?php include 'sanphamcungdanhmuc.php'
            ?>


        </div>
    </section>



    <script>
    $('.btn--view-more').on('click', function(e) {
        e.preventDefault();
        var $this = $(this);
        $this.parents('.evo-product-review-details').find('.evo-product-review-content').toggleClass(
            'expanded');
        $('html, body').animate({
            scrollTop: $('.evo-product-review-details').offset().top - 110
        }, 'slow');
        $(this).toggleClass('active');
        return false;
    });
    </script>

</body>

</html>