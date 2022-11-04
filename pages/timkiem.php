<?php
if (isset($_POST['search_button'])) {

	$tukhoa = $_POST['search_product'];


	$sql_product = mysqli_query($conn, "SELECT * FROM tbl_sanpham WHERE tensanpham LIKE '%$tukhoa%' ORDER BY id_sanpham DESC");
    
    $sql_kq = mysqli_query($conn, "SELECT COUNT(*) AS ketquatimkiem FROM tbl_sanpham WHERE tensanpham LIKE '%$tukhoa%' ORDER BY id_sanpham DESC");
    $kq = mysqli_fetch_array($sql_kq);
    $ketqua = $kq['ketquatimkiem'];
    
	$title = $tukhoa;
}
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
                <strong itemprop="name">Kết quả tìm kiếm</strong>
                <meta itemprop="position" content="2" />
            </li>

        </ul>
    </div>
</section>
<section class="signup search-main collections-container padding-top-10">
    <div class="container margin-bottom-10">
        <div class="row shadow-sm fixpadding-searchs">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <h1 class="title-head margin-bottom-5 margin-top-0">Tìm thấy <strong><?php echo $ketqua ?></strong> kết quả với từ khóa
                    <strong>"<?php echo $title ?>"</strong>
                </h1>
                <div class="evo-block-product-big evo-block-product-big-ui">
            <div class="evo_section_product evo-block-product row evo-scroll">
                <!-- bắt đầu -->
                <?php
            while ($row = mysqli_fetch_array($sql_product)) {
                
                
                ?>
                <div class="col-lg-15 col-md-15 col-sm-4 col-5">
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
                ?>
                <!-- Kết thúc -->
            </div>
        </div>
            </div>
        </div>
        
    </div>
</div>