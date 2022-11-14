<?php
$sql_iphone_chinh_hang_gia_tot = "SELECT * FROM tbl_sanpham WHERE id_thuonghieu = 1 ORDER BY  id_sanpham DESC LIMIT 6";
$query = mysqli_query($conn, $sql_iphone_chinh_hang_gia_tot);
?>
<section class="awe-section-4">
    <div class="container evo_block-product evo_block-product-s">
        <div class="section_product_1">
            <div class="flash-sale-title text-center">
                <a class="sport-titles" href="index.php?quanly=allsp"
                    title="iPhone 12 Chính Hãng VN/A giá tốt"><span>iPhone 12 Chính Hãng VN/A giá tốt</span></a>
            </div>
            <div class="evo-owl-product swiper-container">
                <div class="swiper-wrapper">
                    <?php
                    if (mysqli_num_rows($query) > 0) {
                        while ($row = mysqli_fetch_array($query)) {
                    ?>
                    <div class="swiper-slide">
                        <div class="evo-product-block-item">
                            <a href="index.php?quanly=chitietsanpham&id=<?php echo $row['id_sanpham']; ?>"
                                title="<?php echo $row['tensanpham']; ?>" class="product__box-image">
                                <img class="lazy" src="<?php echo $row['img_avatar']; ?>"
                                    data-src="<?php echo $row['img_avatar']; ?>"
                                    alt="<?php echo $row['tensanpham']; ?>" />
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
                              <!-- <a href="pages/themgiohang.php?idsanpham=<?= $row['id_sanpham'] ?>" title="Mua ngay" class="btn-buy">Mua ngay</a> -->
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    } else {
                        echo '<center>Không có dữ liệu sản phẩm vui lòng thêm sản phẩm nếu bạn là admin</center>';
                    }
                    ?>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </div>
</section>

<section class="awe-section-5">
    <div class="section_banner container section_banner_2">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-12 fix-banner">
                <a href="/index.php?quanly=allsp" title="Smart Store">
                    <img class="lazy mx-auto d-block" src="../dist/images/feature_banner_1.png"
                        data-src="../dist/images/feature_banner_1.png" alt="Smart Store" />
                </a>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-12 fix-banner">
                <a href="/index.php?quanly=allsp" title="Smart Store">
                    <img class="lazy mx-auto d-block" src="../dist/images/feature_banner_2.png"
                        data-src="../dist/images/feature_banner_2.png" alt="Smart Store" />
                </a>
            </div>
        </div>
    </div>
</section>