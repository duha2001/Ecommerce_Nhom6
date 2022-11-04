<section class="awe-section-8">
    <div class="container evo_block-product section_small_product">
        <div class="evo-block-product-big">
            <div class="evo-product-title clearfix">
                <a class="sport-titles" href="index.php?quanly=danhmucsanpham&id=35" title="Phụ kiện Apple"><span>Phụ
                        kiện Apple</span></a>

                <div class="sport-title-link">
                    <?php
                    $sql = "SELECT * FROM tbl_danhmuc ORDER BY id_thuonghieu ASC limit 5";
                    $query = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_array($query)) {
                    ?>
                    <a href="index.php?quanly=danhmucsanpham&id=<?php echo $row['id_thuonghieu'] ?>"
                        title="<?php echo $row['title']; ?>"><?php echo $row['title']; ?></a>
                    <?php
                    }
                    ?>
                    <a href="index.php?quanly=allsp" title="Xem tất cả">Xem tất cả</a>
                </div>

            </div>
            <div class="evo_section_product evo-block-product row evo-wrap-mb">
                <!-- bắt đầu -->
                <?php
                $sql_phukien_noi_bat_apple = "SELECT * FROM tbl_sanpham WHERE (noi_bat = 1) AND  id_thuonghieu = 4 AND  id_loaisanpham = 35 ORDER BY  id_sanpham DESC LIMIT 5";
                $query_pk_apple = mysqli_query($conn, $sql_phukien_noi_bat_apple);
                ?>
                <!-- bắt đầu -->
                <?php
                if (mysqli_num_rows($query_pk_apple) > 0) {
                    while ($row = mysqli_fetch_array($query_pk_apple)) {

                ?>
                <div class="col-lg-4 col-md-6 col-sm-12 col-12 item">
                    <div class="evo-product-block-item evo-product-block-item-small">
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
                        <div class="evo-product-right">
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
                        </div>
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
            </div>
        </div>
    </div>
    <script>
    if ($(window).width() < 768) {
        $.fn.chunk = function(size) {
            var arr = [];
            for (var i = 0; i < this.length; i += size) {
                arr.push(this.slice(i, i + size));
            }
            return this.pushStack(arr, "chunk", size);
        }
        $(".evo-wrap-mb .item").chunk(2).wrap('<div class="group-acc col-12 col-sm-8"></div>');
    }
    </script>
</section>

<section class="awe-section-10">
    <div class="section_banner container">
        <a href="/index.php?quanly=allsp" title="Evo Mobile">
            <picture>
                <source media="(min-width: 992px)"
                    srcset="//bizweb.dktcdn.net/100/415/483/themes/804267/assets/feature_banner.jpg?1649491018773">
                <source media="(max-width: 767px)"
                    srcset="//bizweb.dktcdn.net/100/415/483/themes/804267/assets/feature_banner_mobile.jpg?1649491018773">
                <img class="lazy"
                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
                    data-src="//bizweb.dktcdn.net/100/415/483/themes/804267/assets/feature_banner.jpg?1649491018773"
                    alt="Evo Mobile" />
            </picture>
        </a>
    </div>
</section>