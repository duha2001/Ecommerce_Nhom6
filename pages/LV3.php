<section class="awe-section-7">
    <div class="container evo_block-product">

        <div class="evo-block-product-big evo-block-product-big-ui">
            <div class="evo-product-new-title">
                <a class="sport-titles" href="laptop" title="Laptop nổi bật"><span>Laptop nổi bật</span></a>
            </div>

            <div class="evo-product-new-banner-cate row">
                <div class="col-lg-3 col-md-4">
                    <a href="/index.php?quanly=allsp" title="Evo Mobile" class="banner-new-ui">
                        <img class="lazy"
                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
                            data-src="//bizweb.dktcdn.net/100/415/483/themes/804267/assets/evo_block_product_banner_3.jpg?1649491018773"
                            alt="Evo Mobile" />
                    </a>
                </div>
                <div class="col-lg-9 col-md-8">
                    <div class="evo-product-list-cate">

                        <?php
                        $sql = "SELECT * FROM tbl_danhmuc WHERE parent_id = 2";
                        $query = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_array($query)) {
                        ?>

                        <div class="col8 col-border">
                            <a class="search-item"
                                href="index.php?quanly=danhmucthuonghieulaptop&id=<?php echo $row['id_thuonghieu'] ?>"
                                title="<?php echo $row['title']; ?>">
                                <div class="keyword-img">

                                    <img src="<?php echo $row['icon']; ?>" data-src="<?php echo $row['icon']; ?>"
                                        alt="<?php echo $row['title']; ?>"
                                        class="lazy img-responsive mx-auto d-block" />

                                </div>
                                <div class="keyword-info-title"><?php echo $row['title']; ?></div>
                            </a>
                        </div>
                        <?php
                        }
                        ?>
                        <div class="col8 col-border">
                            <a class="search-item" href="/microsoft-surface" title="Microsoft Surface">
                                <div class="keyword-img">

                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
                                        data-src="//bizweb.dktcdn.net/thumb/large/100/415/483/collections/microsoft-surface-go-600x600.jpg?v=1612146791780"
                                        alt="Microsoft Surface" class="lazy img-responsive mx-auto d-block" />

                                </div>
                                <div class="keyword-info-title">Microsoft Surface</div>
                            </a>
                        </div>

                        <div class="col8 col-border">
                            <a class="search-item" href="/dell-xps" title="Dell XPS">
                                <div class="keyword-img">

                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
                                        data-src="//bizweb.dktcdn.net/thumb/large/100/415/483/collections/dell-xps.jpg?v=1612146864803"
                                        alt="Dell XPS" class="lazy img-responsive mx-auto d-block" />

                                </div>
                                <div class="keyword-info-title">Dell XPS</div>
                            </a>
                        </div>

                        <div class="col8 col-border">
                            <a class="search-item" href="/lenovo-thinkpad" title="Lenovo ThinkPad">
                                <div class="keyword-img">

                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
                                        data-src="//bizweb.dktcdn.net/thumb/large/100/415/483/collections/lenovo-thinkpad-t490s.jpg?v=1612146939943"
                                        alt="Lenovo ThinkPad" class="lazy img-responsive mx-auto d-block" />

                                </div>
                                <div class="keyword-info-title">Lenovo ThinkPad</div>
                            </a>
                        </div>

                        <div class="col8 col-border">
                            <a class="search-item" href="/asus-zenbook" title="Asus Zenbook">
                                <div class="keyword-img">

                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
                                        data-src="//bizweb.dktcdn.net/thumb/large/100/415/483/collections/asus-zendbook.jpg?v=1612147044067"
                                        alt="Asus Zenbook" class="lazy img-responsive mx-auto d-block" />

                                </div>
                                <div class="keyword-info-title">Asus Zenbook</div>
                            </a>
                        </div>

                    </div>
                </div>
            </div>

            <div class="evo_section_product evo-block-product row">
                <!-- bắt đầu -->
                <?php
                $sql_laptop_noi_bat = "SELECT * FROM tbl_sanpham WHERE id_thuonghieu = 2 AND noi_bat = 1 ORDER BY  id_sanpham DESC LIMIT 5";
                $query = mysqli_query($conn, $sql_laptop_noi_bat);
                ?>
                <!-- bắt đầu -->
                <?php
                if (mysqli_num_rows($query) > 0) {
                    while ($row = mysqli_fetch_array($query)) {

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



            </div>
        </div>

    </div>
</section>