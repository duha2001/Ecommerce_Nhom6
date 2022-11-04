<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = '';
}

$sql_laytendanhmuc = mysqli_query($conn, "SELECT * FROM tbl_danhmuc WHERE id_thuonghieu='$id'");
$row_title = mysqli_fetch_array($sql_laytendanhmuc);
$title = $row_title['title'];
?>
<section class="bread-crumb">
    <div class="container">
        <ul class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
            <li class="home" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <a itemprop="item" href="/" title="Trang chủ">
                    <span itemprop="name">Trang chủ</span>
                    <meta itemprop="position" content="1" />
                </a>
            </li>


            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <strong>
                    <span itemprop="name"><?php echo $title ?></span>
                    <meta itemprop="position" content="2" />
                </strong>
            </li>


        </ul>
    </div>
</section>
<link rel="preload" as="script"
    href="//bizweb.dktcdn.net/100/415/483/themes/804267/assets/search_filter.js?1649491018773" />
<script src="//bizweb.dktcdn.net/100/415/483/themes/804267/assets/search_filter.js?1649491018773"
    type="text/javascript"></script>
<div class="container margin-top-10">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="shadow-sm margin-bottom-10">
                <h1 class="col-title"><?php echo $title ?></h1>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="shadow-sm margin-bottom-10 evo-coll-banner">
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-12">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <a href="" class="clearfix" title="">
                                        <img src="https://bizweb.dktcdn.net/100/415/483/files/1.jpg?v=1610250675633"
                                            alt="" class="img-responsive center-block" />
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="" class="clearfix" title="">
                                        <img src="https://bizweb.dktcdn.net/100/415/483/files/2.jpg?v=1610250675697"
                                            alt="" class="img-responsive center-block" />
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="" class="clearfix" title="">
                                        <img src="https://bizweb.dktcdn.net/100/415/483/files/3.jpg?v=1610250675767"
                                            alt="" class="img-responsive center-block" />
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-12 small-banner">
                        <a href="" title="">
                            <img class="lazy" src="./dist/images/.png"
                                data-src="https://bizweb.dktcdn.net/100/415/483/files/untitled-1.jpg?v=1610250675847"
                                alt="" />
                        </a>
                        <a href="" title="">
                            <img class="lazy" src="./dist/images/.png"
                                data-src="https://bizweb.dktcdn.net/100/415/483/files/untitled-2.jpg?v=1610250675897"
                                alt="" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="shadow-sm margin-bottom-10 evo-list-accessories">
                <?php
                $sql = "SELECT * FROM tbl_danhmuc WHERE parent_id = 4";
                $query = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($query)) {
                ?>
                <div class="col8 col-border">
                    <a class="search-item"
                        href="index.php?quanly=danhmucthuonghieuphukien&id=<?php echo $row['id_thuonghieu'] ?>"
                        title="<?php echo $row['title'] ?>">
                        <div class="keyword-img">

                            <img src="./dist/images/<?php echo $row['icon'] ?>.png"
                                data-src="./dist/images/<?php echo $row['icon'] ?>.png"
                                alt="<?php echo $row['title'] ?>" class="lazy img-responsive mx-auto d-block" />

                        </div>
                        <div class="keyword-info-title"><?php echo $row['title'] ?></div>
                    </a>
                </div>
                <?php
                }
                ?>



            </div>
        </div>
    </div>


    <section class="products-view products-view-grid row shadow-sm">
        <?php
        $sql_tablet = "SELECT * FROM tbl_sanpham WHERE id_thuonghieu = 4 AND id_loaisanpham = '$id' ORDER BY  id_sanpham DESC";
        $query_tablet = mysqli_query($conn, $sql_tablet);
        ?>
        <!-- bắt đầu -->
        <?php
        if (mysqli_num_rows($query_tablet) > 0) {
            while ($row = mysqli_fetch_array($query_tablet)) {

        ?>

        <div class="col-lg-15 col-md-15 col-sm-4 col-6">
            <div class="evo-product-block-item">
                <a href="index.php?quanly=chitietsanpham&id=<?php echo $row['id_sanpham']; ?>"
                    title="<?php echo $row['tensanpham']; ?>" class="product__box-image">
                    <img class="lazy" src="<?php echo $row['img_avatar']; ?>"
                        data-src="<?php echo $row['img_avatar']; ?>" alt="<?php echo $row['tensanpham']; ?>" />


                    <span class="sales">
                        <?php
                                $giamgia = $row['giagoc'] - $row['giakhuyenmai'];
                                ?>
                        <i class="icon-flash2"></i> Giảm <?php echo number_format($giamgia) . '₫' ?>

                    </span>


                </a>
                <a href="index.php?quanly=chitietsanpham&id=<?php echo $row['id_sanpham']; ?>"
                    title="<?php echo $row['tensanpham']; ?>"
                    class="product__box-name"><?php echo $row['tensanpham']; ?></a>
                <div class="product__box-price">


                    <span class="price"><?php echo number_format($row['giakhuyenmai']) . '₫' ?></span>

                    <span class="old-price"><?php echo number_format($row['giagoc']) . '₫' ?></span>
                </div>
                <?php if ($row['hienthi'] == 0) {
                        ?>
                <div class="evo-tag">
                    <span>Trả góp 0% lãi suất</span>
                    <span><?php echo $row['baohanh']; ?></span>
                </div>

                <?php
                        } else {

                        ?>
                <div class="box-promotion">
                    <span class="bag">KM</span>
                    <div class="box-promotions">
                        <p><?php echo $row['khuyenmai']; ?></p>
                    </div>
                </div>
                <?php
                        }
                        ?>
                <div class="product__box-btn">
                    <a href="index.php?quanly=chitietsanpham&id=<?php echo $row['id_sanpham']; ?>"
                        class="btn btn-primary" title="Chi tiết">Chi tiết</a>
                                <form enctype="multipart/form-data"
                action="pages/themgiohang.php?idsanpham=<?= $row['id_sanpham'] ?>" method="post">
                <button type="submit" name="themgiohang" class="btn-buy">Thêm<i class="fas fa-cart-arrow-down"></i></button>
            </form>   
                </div>
            </div>
        </div>
        <?php
            }
        } else {
            echo '<center>Không có dữ liệu sản phẩm vui lòng thêm sản phẩm nếu bạn là admin</center>';
        }
        ?>
        <!-- Kết thúc -->
    </section>
</div>
</section>
</div>
</div>
<link rel="preload" as="script"
    href="//bizweb.dktcdn.net/100/415/483/themes/804267/assets/evo-collection.js?1649491018773" />
<script src="//bizweb.dktcdn.net/100/415/483/themes/804267/assets/evo-collection.js?1649491018773"
    type="text/javascript"></script>