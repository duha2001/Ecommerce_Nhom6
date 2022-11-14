<script>
if (localStorage.last_viewed_products != undefined) {
    jQuery('.product-page-viewed').removeClass('d-none');
    var last_viewd_pro_array = JSON.parse(localStorage.last_viewed_products);
    var recentview_promises = [];
    var size_pro_review = last_viewd_pro_array.length;
    if (size_pro_review >= 14) {
        size_pro_review = 14;
    } else {
        size_pro_review = last_viewd_pro_array.length;
    }
    if (size_pro_review < 1) {
        jQuery('.product-page-viewed').addClass('d-none');
    } else {
        jQuery('.product-page-viewed').removeClass('d-none');
    }
    if (size_pro_review > 0) {
        for (i = 0; i < size_pro_review; i++) {
            var alias_product = last_viewd_pro_array[i];
            if (!!alias_product.alias) {
                var promise = new Promise(function(resolve, reject) {
                    $.ajax({
                        url: '/' + alias_product.alias + '?view=item',
                        success: function(product) {
                            resolve(product);
                        },
                        error: function(err) {
                            resolve('');
                        }
                    })
                });
                recentview_promises.push(promise);
            }
        }
        Promise.all(recentview_promises).then(function(values) {
            $.each(values, function(i, v) {
                $('.product-page-viewed-wrap .swiper-wrapper').append(v);
            });
            setTimeout(function() {
                var swiper = new Swiper('.evo-slick-product', {
                    slidesPerView: 4,
                    spaceBetween: 0,
                    slidesPerGroup: 2,
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },
                    breakpoints: {
                        300: {
                            slidesPerView: 2
                        },
                        500: {
                            slidesPerView: 2
                        },
                        640: {
                            slidesPerView: 2
                        },
                        768: {
                            slidesPerView: 3
                        },
                        1024: {
                            slidesPerView: 5
                        },
                    }
                });
                awe_lazyloadImage();
            }, 500);
        });
    }
} else {
    jQuery('.product-page-viewed').addClass('d-none');
}
</script>

<footer class="footer">
    
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-3 footer-infos">
                <div class="row">
                    <div class="col-lg-12 col-sm-6">
                        <h4 class="footer-title">Thông tin liên hệ</h4>

                        <p><strong>Địa chỉ: </strong>280 An Dương Vương, Quận 5, TPHCM</p>


                        <p><strong>Điện thoại: </strong><a href="tel:0270 3822 141" title="0366 6610 949">0366610949</a></p>


                        <p><strong>Email: </strong><a href="mailto:huynhanhdu2000@gmail.com"
                                title="huynhanhdu2000@gmail.com">huynhanhdu2000@gmail.com</a></p>
                    </div>
                    <div class="col-lg-12 col-sm-6">
                        <h4 class="footer-title footer-payment-title">Hỗ trợ thanh toán</h4>
                        <div class="footer-payment">
                            <img src="../dist/images/payment_1.svg" data-src="../dist/images/payment_1.svg"
                                alt="Hỗ trợ thanh toán" class="lazy" />
                            <img src="../dist/images/payment_2.svg" data-src="../dist/images/payment_2.svg"
                                alt="Hỗ trợ thanh toán" class="lazy" />
                            <img src="../dist/images/payment_3.svg" data-src="../dist/images/payment_3.svg"
                                alt="Hỗ trợ thanh toán" class="lazy" />
                            <img src="../dist/images/payment_4.svg" data-src="../dist/images/payment_4.svg"
                                alt="Hỗ trợ thanh toán" class="lazy" />
                            <img src="../dist/images/payment_5.svg" data-src="../dist/images/payment_5.svg"
                                alt="Hỗ trợ thanh toán" class="lazy" />
                            <img src="../dist/images/payment_6.svg" data-src="../dist/images/payment_6.svg"
                                alt="Hỗ trợ thanh toán" class="lazy" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-sm-12 full-footer">
                <div class="footer-coll-title">
                    <span class="ex">Mở rộng chân trang</span>
                    <span class="co">Thu nhỏ chân trang</span>
                </div>
                <div class="row col-footer-show">
                    <div class="col-sm-6 col-lg-4 footer-nav-menu widget">
                        <h4 class="footer-title">Thông tin khác</h4>
                        <div class="footer-menu">

                            <a href="/quy-che-hoat-dong" title="Quy chế hoạt động" rel="nofollow">Quy chế hoạt động</a>

                            <a href="/chinh-sach-bao-hanh" title="Chính sách Bảo hành" rel="nofollow">Chính sách Bảo
                                hành</a>

                            <a href="/lien-he-hop-tac-kinh-doanh" title="Liên hệ hợp tác kinh doanh" rel="nofollow">Liên
                                hệ hợp tác kinh doanh</a>

                            <a href="/don-doanh-nghiep" title="Đơn Doanh nghiệp" rel="nofollow">Đơn Doanh nghiệp</a>

                            <a href="/uu-dai-tu-doi-tac" title="Ưu đãi từ đối tác" rel="nofollow">Ưu đãi từ đối tác</a>

                            <a href="/tuyen-dung" title="Tuyển dụng" rel="nofollow">Tuyển dụng</a>

                            <a href="/trade-in-thu-cu-len-doi" title="Trade-in thu cũ lên đời" rel="nofollow">Trade-in
                                thu cũ lên đời</a>

                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4 footer-nav-menu widget">
                        <h4 class="footer-title">Hỗ trợ khách hàng</h4>
                        <div class="footer-menu">

                            <a href="/mua-hang-va-thanh-toan-online" title="Mua hàng và thanh toán Online"
                                rel="nofollow">Mua hàng và thanh toán Online</a>

                            <a href="index.php?quanly=tragop" title="Mua hàng trả góp Online" rel="nofollow">Mua hàng
                                trả góp Online</a>

                            <a href="/tra-thong-tin-don-hang" title="Tra thông tin đơn hàng" rel="nofollow">Tra thông
                                tin đơn hàng</a>

                            <a href="/tra-thong-tin-bao-hanh" title="Tra thông tin bảo hành" rel="nofollow">Tra thông
                                tin bảo hành</a>

                            <a href="/trung-tam-bao-hanh-chinh-hang" title="Trung tâm bảo hành chính hãng"
                                rel="nofollow">Trung tâm bảo hành chính hãng</a>

                            <a href="/quy-dinh-ve-viec-sao-luu-du-lieu" title="Quy định về việc sao lưu dữ liệu"
                                rel="nofollow">Quy định về việc sao lưu dữ liệu</a>

                            <a href="/dich-vu-bao-hanh-dien-thoai" title="Dịch vụ bảo hành điện thoại"
                                rel="nofollow">Dịch vụ bảo hành điện thoại</a>

                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-4 footer-nav-menu widget">
                        <div class="row">
                            <div class="col-lg-12 col-sm-6">
                                <h4 class="footer-title">Gọi tư vấn & khiếu nại</h4>
                                <div class="footer-support">

                                    <div class="item">
                                        Gọi mua hàng: <a href="tel:1800.1800" title="1800.1800">1800.1800</a> (8h00 -
                                        22h00)
                                    </div>


                                    <div class="item">
                                        Gọi khiếu nại: <a href="tel:1800.1800" title="1800.1800">1800.1800</a> (8h00 -
                                        21h00)
                                    </div>


                                    <div class="item">
                                        Gọi bảo hành: <a href="tel:1800.1800" title="1800.1800">1800.1800</a> (8h00 -
                                        21h30)
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-12 col-sm-6">
                                <h4 class="footer-title">Kết nối với chúng tôi</h4>
                                <div class="social">
                                    <a href="https://www.facebook.com/profile.php?id=100087339836859" target="_blank" aria-label="Facebook"
                                        title="Theo dõi Smart Store Mobile trên Facebook">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="25px" height="25px"
                                            viewBox="0 0 96.124 96.123" style="enable-background:new 0 0 96.124 96.123;"
                                            xml:space="preserve">
                                            <path
                                                d="M72.089,0.02L59.624,0C45.62,0,36.57,9.285,36.57,23.656v10.907H24.037c-1.083,0-1.96,0.878-1.96,1.961v15.803   c0,1.083,0.878,1.96,1.96,1.96h12.533v39.876c0,1.083,0.877,1.96,1.96,1.96h16.352c1.083,0,1.96-0.878,1.96-1.96V54.287h14.654   c1.083,0,1.96-0.877,1.96-1.96l0.006-15.803c0-0.52-0.207-1.018-0.574-1.386c-0.367-0.368-0.867-0.575-1.387-0.575H56.842v-9.246   c0-4.444,1.059-6.7,6.848-6.7l8.397-0.003c1.082,0,1.959-0.878,1.959-1.96V1.98C74.046,0.899,73.17,0.022,72.089,0.02z"
                                                data-original="#000000" class="active-path" data-old_color="#000000"
                                                fill="#EBE7E7" />
                                        </svg>
                                    </a>
                                    <a href="#" target="_blank" aria-label="Twitter"
                                        title="Theo dõi Smart Store Mobile trên Twitter">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512"
                                            style="enable-background:new 0 0 512 512;" xml:space="preserve" width="25px"
                                            height="25px">
                                            <path
                                                d="M512,97.248c-19.04,8.352-39.328,13.888-60.48,16.576c21.76-12.992,38.368-33.408,46.176-58.016    c-20.288,12.096-42.688,20.64-66.56,25.408C411.872,60.704,384.416,48,354.464,48c-58.112,0-104.896,47.168-104.896,104.992    c0,8.32,0.704,16.32,2.432,23.936c-87.264-4.256-164.48-46.08-216.352-109.792c-9.056,15.712-14.368,33.696-14.368,53.056    c0,36.352,18.72,68.576,46.624,87.232c-16.864-0.32-33.408-5.216-47.424-12.928c0,0.32,0,0.736,0,1.152    c0,51.008,36.384,93.376,84.096,103.136c-8.544,2.336-17.856,3.456-27.52,3.456c-6.72,0-13.504-0.384-19.872-1.792    c13.6,41.568,52.192,72.128,98.08,73.12c-35.712,27.936-81.056,44.768-130.144,44.768c-8.608,0-16.864-0.384-25.12-1.44    C46.496,446.88,101.6,464,161.024,464c193.152,0,298.752-160,298.752-298.688c0-4.64-0.16-9.12-0.384-13.568    C480.224,136.96,497.728,118.496,512,97.248z"
                                                data-original="#000000" class="active-path" data-old_color="#000000"
                                                fill="#EBE7E7" />
                                        </svg>
                                    </a>
                                    <a href="#" target="_blank"
                                        aria-label="Youtube" title="Theo dõi Smart Store Mobile trên Youtube">
                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512"
                                            style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                            <path d="M490.24,113.92c-13.888-24.704-28.96-29.248-59.648-30.976C399.936,80.864,322.848,80,256.064,80
													 c-66.912,0-144.032,0.864-174.656,2.912c-30.624,1.76-45.728,6.272-59.744,31.008C7.36,138.592,0,181.088,0,255.904
													 C0,255.968,0,256,0,256c0,0.064,0,0.096,0,0.096v0.064c0,74.496,7.36,117.312,21.664,141.728
													 c14.016,24.704,29.088,29.184,59.712,31.264C112.032,430.944,189.152,432,256.064,432c66.784,0,143.872-1.056,174.56-2.816
													 c30.688-2.08,45.76-6.56,59.648-31.264C504.704,373.504,512,330.688,512,256.192c0,0,0-0.096,0-0.16c0,0,0-0.064,0-0.096
													 C512,181.088,504.704,138.592,490.24,113.92z M192,352V160l160,96L192,352z" />
                                        </svg>
                                    </a>
                                    <a href="#" target="_blank"
                                        aria-label="Instagram" title="Theo dõi Smart Store Mobile trên Instagram">
                                        <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="m75 512h362c41.355469 0 75-33.644531 75-75v-362c0-41.355469-33.644531-75-75-75h-362c-41.355469 0-75 33.644531-75 75v362c0 41.355469 33.644531 75 75 75zm-45-437c0-24.8125 20.1875-45 45-45h362c24.8125 0 45 20.1875 45 45v362c0 24.8125-20.1875 45-45 45h-362c-24.8125 0-45-20.1875-45-45zm0 0" />
                                            <path
                                                d="m256 391c74.4375 0 135-60.5625 135-135s-60.5625-135-135-135-135 60.5625-135 135 60.5625 135 135 135zm0-240c57.898438 0 105 47.101562 105 105s-47.101562 105-105 105-105-47.101562-105-105 47.101562-105 105-105zm0 0" />
                                            <path
                                                d="m406 151c24.8125 0 45-20.1875 45-45s-20.1875-45-45-45-45 20.1875-45 45 20.1875 45 45 45zm0-60c8.269531 0 15 6.730469 15 15s-6.730469 15-15 15-15-6.730469-15-15 6.730469-15 15-15zm0 0" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright text-center">

        <span>© Bản quyền thuộc về <b>Smart Store</b> <span class="s480-f">|</span> Đề tài thương mại điện tử <a
                href="https://github.com/duha2001" title="Huỳnh Anh Dự" target="_blank"
                rel="nofollow">Github</a></span>


        <div class="back-to-top text-center" title="Lên đầu trang"><svg xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="15px" height="15px"
                viewBox="0 0 284.929 284.929" style="enable-background:new 0 0 284.929 284.929;" xml:space="preserve">
                <path
                    d="M282.082,195.285L149.028,62.24c-1.901-1.903-4.088-2.856-6.562-2.856s-4.665,0.953-6.567,2.856L2.856,195.285   C0.95,197.191,0,199.378,0,201.853c0,2.474,0.953,4.664,2.856,6.566l14.272,14.271c1.903,1.903,4.093,2.854,6.567,2.854   c2.474,0,4.664-0.951,6.567-2.854l112.204-112.202l112.208,112.209c1.902,1.903,4.093,2.848,6.563,2.848   c2.478,0,4.668-0.951,6.57-2.848l14.274-14.277c1.902-1.902,2.847-4.093,2.847-6.566   C284.929,199.378,283.984,197.188,282.082,195.285z"
                    data-original="#000000" class="active-path" data-old_color="#000000" fill="#FFFFFF" />
            </svg></div>

    </div>
   
</footer>
<div class="backdrop__body-backdrop___1rvky"></div>
<div class="mobile-main-menu">
    <div class="la-scroll-fix-infor-user">
        <button class="evo-close-menu" aria-label="Đóng menu" title="Đóng menu">
            <svg class="Icon Icon--close" viewBox="0 0 16 14">
                <path d="M15 0L1 14m14 0L1 0" stroke="currentColor" fill="none" fill-rule="evenodd"></path>
            </svg>
        </button>
        <div class="user-info">
            <div class="user-avatar">
                <div class="no-avt">
                    <svg viewBox="0 0 512 512">
                        <path
                            d="M437.02,330.98c-27.883-27.882-61.071-48.523-97.281-61.018C378.521,243.251,404,198.548,404,148    C404,66.393,337.607,0,256,0S108,66.393,108,148c0,50.548,25.479,95.251,64.262,121.962    c-36.21,12.495-69.398,33.136-97.281,61.018C26.629,379.333,0,443.62,0,512h40c0-119.103,96.897-216,216-216s216,96.897,216,216    h40C512,443.62,485.371,379.333,437.02,330.98z M256,256c-59.551,0-108-48.448-108-108S196.449,40,256,40    c59.551,0,108,48.448,108,108S315.551,256,256,256z"
                            data-original="#222222" class="active-path" fill="#222222" />
                    </svg>
                </div>
            </div>
            <?php
                        if (isset($_SESSION['dangnhap_home'])) {
                        ?>
            <div class="user-name has-login">
				<p><a href="index.php?quanly=thongtintaikhoan" title="Tài khoản">Tài khoản</a></p>
				<p><i><?= $_SESSION['dangnhap_home']; ?></i></p>
			</div>


            <div class="user-name has-login">
                <p><a rel="nofollow" href="index.php?quanly=dangxuat" title="Đăng xuất">Đăng xuất</a></p>
            </div>
            <?php
                        } else {
                        ?>
                <div class="user-name">

                    <p><a rel="nofollow" href="index.php?quanly=login" title="Đăng nhập">Đăng nhập</a></p>
                    <p><a rel="nofollow" href="index.php?quanly=register" title="Đăng ký">Đăng ký</a></p>

                </div>
                <?php
                        } ?>


        </div>
        <ul class="la-nav-list-items">


            <li class="ng-scope ng-has-child1">
                <?php
                $sql = "SELECT * FROM tbl_danhmuc ORDER BY id_thuonghieu ASC limit 0,1";
                $query = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($query)) {
                ?>
                <a href="index.php?quanly=danhmucsanpham&id=<?php echo $row['id_thuonghieu'] ?>"
                    title="<?php echo $row['title']; ?>"><?php echo $row['title']; ?> <span
                        class="svg svg1 collapsible-plus"></span></a>
                <?php
                }
                ?>
                <ul class="ul-has-child1">


                    <li class="ng-scope ng-has-child2">
                        <?php
                        $sql = "SELECT * FROM tbl_danhmuc ORDER BY id_thuonghieu ASC limit 9,1";
                        $query = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                        <a href="index.php?quanly=danhmucthuonghieudienthoai&id=<?php echo $row['id_thuonghieu'] ?>"
                            title="<?php echo $row['title']; ?>"><?php echo $row['title']; ?> <span
                                class="svg svg2 collapsible-plus"></span></a>
                        <?php
                        }
                        ?>
                        <ul class="ul-has-child2">
                            <?php
                            $sql = "SELECT * FROM tbl_danhmuctructhuoc WHERE id = 10";
                            $query = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_array($query)) {
                            ?>
                            <li class="ng-scope">
                                <a href="index.php?quanly=danhmuctructhuoc&id=<?php echo $row['id_danhmuc'] ?>"
                                    title="<?php echo $row['title']; ?>"><?php echo $row['title']; ?></a>
                            </li>
                            <?php
                            }
                            ?>
                        </ul>
                    </li>



                    <li class="ng-scope ng-has-child2">
                        <?php
                        $sql = "SELECT * FROM tbl_danhmuc ORDER BY id_thuonghieu ASC limit 10,1";
                        $query = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                        <a href="index.php?quanly=danhmucthuonghieudienthoai&id=<?php echo $row['id_thuonghieu'] ?>"
                            title="<?php echo $row['title']; ?>"><?php echo $row['title']; ?> <span
                                class="svg svg2 collapsible-plus"></span></a>
                        <?php
                        }
                        ?>
                        <ul class="ul-has-child2">

                            <?php
                            $sql = "SELECT * FROM tbl_danhmuctructhuoc WHERE id = 11";
                            $query = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_array($query)) {
                            ?>
                            <li class="ng-scope">
                                <a href="index.php?quanly=danhmuctructhuoc&id=<?php echo $row['id_danhmuc'] ?>"
                                    title="<?php echo $row['title']; ?>"><?php echo $row['title']; ?></a>
                            </li>
                            <?php
                            }
                            ?>

                        </ul>
                    </li>



                    <li class="ng-scope ng-has-child2">
                        <?php
                        $sql = "SELECT * FROM tbl_danhmuc ORDER BY id_thuonghieu ASC limit 11,1";
                        $query = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                        <a href="index.php?quanly=danhmucthuonghieudienthoai&id=<?php echo $row['id_thuonghieu'] ?>"
                            title="<?php echo $row['title']; ?>"><?php echo $row['title']; ?> <span
                                class="svg svg2 collapsible-plus"></span></a>
                        <?php
                        }
                        ?>
                        <ul class="ul-has-child2">

                            <?php
                            $sql = "SELECT * FROM tbl_danhmuctructhuoc WHERE id = 12";
                            $query = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_array($query)) {
                            ?>
                            <li class="ng-scope">
                                <a href="index.php?quanly=danhmuctructhuoc&id=<?php echo $row['id_danhmuc'] ?>"
                                    title="<?php echo $row['title']; ?>"><?php echo $row['title']; ?></a>
                            </li>
                            <?php
                            }
                            ?>

                        </ul>
                    </li>


                    <?php
                    $sql = "SELECT * FROM tbl_danhmuc ORDER BY id_thuonghieu ASC limit 12,7";
                    $query = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_array($query)) {
                    ?>
                    <li class="ng-scope">
                        <a href="index.php?quanly=danhmucthuonghieudienthoai&id=<?php echo $row['id_thuonghieu'] ?>"
                            title="<?php echo $row['title']; ?>"><?php echo $row['title']; ?></a>
                    </li>
                    <?php
                    }
                    ?>
                </ul>
            </li>



            <li class="ng-scope ng-has-child1">
                <?php
                $sql = "SELECT * FROM tbl_danhmuc ORDER BY id_thuonghieu ASC limit 1,1";
                $query = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($query)) {
                ?>
                <a href="index.php?quanly=danhmucsanpham&id=<?php echo $row['id_thuonghieu'] ?>"
                    title="<?php echo $row['title']; ?>"><?php echo $row['title']; ?> <span
                        class="svg svg1 collapsible-plus"></span></a>
                <?php
                }
                ?>
                <ul class="ul-has-child1">

                    <?php
                    $sql = "SELECT * FROM tbl_danhmuc WHERE parent_id = 2";
                    $query = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_array($query)) {
                    ?>
                    <li class="ng-scope">
                        <a href="index.php?quanly=danhmucthuonghieulaptop&id=<?php echo $row['id_thuonghieu'] ?>"
                            title="<?php echo $row['title']; ?>"><?php echo $row['title']; ?></a>
                    </li>


                    <?php
                    }
                    ?>
                </ul>
            </li>



            <li class="ng-scope ng-has-child1">
                <?php
                $sql = "SELECT * FROM tbl_danhmuc ORDER BY id_thuonghieu ASC limit 2,1";
                $query = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($query)) {
                ?>
                <a href="index.php?quanly=danhmucsanpham&id=<?php echo $row['id_thuonghieu'] ?>"
                    title="<?php echo $row['title']; ?>"><?php echo $row['title']; ?> <span
                        class="svg svg1 collapsible-plus"></span></a>
                <?php
                }
                ?>
                <ul class="ul-has-child1">

                    <?php
                    $sql = "SELECT * FROM tbl_danhmuc WHERE parent_id = 3";
                    $query = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_array($query)) {
                    ?>
                    <li class="ng-scope">
                        <a href="index.php?quanly=danhmucthuonghieutablet&id=<?php echo $row['id_thuonghieu'] ?>"
                            title="<?php echo $row['title']; ?>"><?php echo $row['title']; ?></a>
                    </li>


                    <?php
                    }
                    ?>
                </ul>
            </li>



            <li class="ng-scope ng-has-child1">
                <?php
                $sql = "SELECT * FROM tbl_danhmuc ORDER BY id_thuonghieu ASC limit 3,1";
                $query = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($query)) {
                ?>
                <a href="index.php?quanly=danhmucsanpham&id=<?php echo $row['id_thuonghieu'] ?>"
                    title="<?php echo $row['title']; ?>"><?php echo $row['title']; ?> <span
                        class="svg svg1 collapsible-plus"></span></a>
                <?php
                }
                ?>
                <ul class="ul-has-child1">


                    <?php
                    $sql = "SELECT * FROM tbl_danhmuc WHERE parent_id = 4";
                    $query = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_array($query)) {
                    ?>
                    <li class="ng-scope">
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
            <li class="ng-scope ">
                <a href="index.php?quanly=danhmucsanpham&id=<?php echo $row['id_thuonghieu'] ?>"
                    title="<?php echo $row['title']; ?>"><?php echo $row['title']; ?></a>
            </li>
            <?php
            }
            ?>


            <li class="evo-mb-split">Menu</li>



            <li class="ng-scope active">
                <a href="/" title="Trang chủ">Trang chủ</a>
            </li>



            <li class="ng-scope ">
                <a href="index.php?quanly=gioithieu" title="Giới thiệu">Giới thiệu</a>
            </li>



            <li class="ng-scope ng-has-child1">
                <a href="/index.php?quanly=allsp" title="Sản phẩm">Sản phẩm <span
                        class="svg svg1 collapsible-plus"></span></a>
                <ul class="ul-has-child1">


                    <li class="ng-scope ng-has-child2">
                        <?php
                        $sql = "SELECT * FROM tbl_danhmuc ORDER BY id_thuonghieu ASC limit 0,1";
                        $query = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                        <a href="index.php?quanly=danhmucsanpham&id=<?php echo $row['id_thuonghieu'] ?>"
                            title="<?php echo $row['title']; ?>"><?php echo $row['title']; ?><span
                                class="svg svg2 collapsible-plus"></span></a>
                        <?php
                        }
                        ?>
                        <ul class="ul-has-child2">

                            <?php
                            $sql = "SELECT * FROM tbl_danhmuc WHERE parent_id = 1";
                            $query = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_array($query)) {
                            ?>
                            <li class="ng-scope">
                                <a href="index.php?quanly=danhmucthuonghieudienthoai&id=<?php echo $row['id_thuonghieu'] ?>"
                                    title="<?php echo $row['title']; ?>"><?php echo $row['title']; ?></a>
                            </li>
                            <?php
                            }
                            ?>
                        </ul>
                    </li>



                    <li class="ng-scope ng-has-child2">
                        <?php
                        $sql = "SELECT * FROM tbl_danhmuc ORDER BY id_thuonghieu ASC limit 1,1";
                        $query = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                        <a href="index.php?quanly=danhmucsanpham&id=<?php echo $row['id_thuonghieu'] ?>"
                            title="<?php echo $row['title']; ?>"><?php echo $row['title']; ?><span
                                class="svg svg2 collapsible-plus"></span></a>
                        <?php
                        }
                        ?>
                        <ul class="ul-has-child2">

                            <?php
                            $sql = "SELECT * FROM tbl_danhmuc WHERE parent_id = 2";
                            $query = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_array($query)) {
                            ?>
                            <li class="ng-scope">
                                <a href="index.php?quanly=danhmucthuonghieulaptop&id=<?php echo $row['id_thuonghieu'] ?>"
                                    title="<?php echo $row['title']; ?>"><?php echo $row['title']; ?></a>
                            </li>
                            <?php
                            }
                            ?>
                        </ul>
                    </li>



                    <li class="ng-scope ng-has-child2">
                        <?php
                        $sql = "SELECT * FROM tbl_danhmuc ORDER BY id_thuonghieu ASC limit 2,1";
                        $query = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                        <a href="index.php?quanly=danhmucsanpham&id=<?php echo $row['id_thuonghieu'] ?>"
                            title="<?php echo $row['title']; ?>"><?php echo $row['title']; ?><span
                                class="svg svg2 collapsible-plus"></span></a>
                        <?php
                        }
                        ?>
                        <ul class="ul-has-child2">
                            <?php
                            $sql = "SELECT * FROM tbl_danhmuc WHERE parent_id = 3";
                            $query = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_array($query)) {
                            ?>
                            <li class="ng-scope">
                                <a href="index.php?quanly=danhmucthuonghieutablet&id=<?php echo $row['id_thuonghieu'] ?>"
                                    title="<?php echo $row['title']; ?>"><?php echo $row['title']; ?></a>
                            </li>
                            <?php
                            }
                            ?>

                        </ul>
                    </li>



                    <li class="ng-scope ng-has-child2">
                        <?php
                        $sql = "SELECT * FROM tbl_danhmuc ORDER BY id_thuonghieu ASC limit 3,1";
                        $query = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                        <a href="index.php?quanly=danhmucsanpham&id=<?php echo $row['id_thuonghieu'] ?>"
                            title="<?php echo $row['title']; ?>"><?php echo $row['title']; ?><span
                                class="svg svg2 collapsible-plus"></span></a>
                        <?php
                        }
                        ?>
                        <ul class="ul-has-child2">
                            <?php
                            $sql = "SELECT * FROM tbl_danhmuc WHERE parent_id = 4";
                            $query = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_array($query)) {
                            ?>
                            <li class="ng-scope">
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
                    <li class="ng-scope">
                        <a href="index.php?quanly=danhmucsanpham&id=<?php echo $row['id_thuonghieu'] ?>"
                            title="<?php echo $row['title']; ?>"><?php echo $row['title']; ?></a>
                    </li>
                    <?php
                    }
                    ?>
                </ul>
            </li>



            <li class="ng-scope ng-has-child1">
                <a href="#" title="Tin tức">Tin tức <span class="svg svg1 collapsible-plus"></span></a>
                <ul class="ul-has-child1">


                    <li class="ng-scope">
                        <a href="#" title="Khuyến mãi">Khuyến mãi</a>
                    </li>



                    <li class="ng-scope">
                        <a href="#" title="Thủ thuật">Thủ thuật</a>
                    </li>



                    <li class="ng-scope">
                        <a href="#" title="Video Hot">Video Hot</a>
                    </li>



                    <li class="ng-scope">
                        <a href="#" title="Đánh giá - Tư vấn">Đánh giá - Tư vấn</a>
                    </li>



                    <li class="ng-scope">
                        <a href="#" title="App & Game">App & Game</a>
                    </li>



                    <li class="ng-scope">
                        <a href="#" title="Thị trường">Thị trường</a>
                    </li>


                </ul>
            </li>



            <li class="ng-scope ">
                <a href="index.php?quanly=baogiamienphi" title="Hỏi đáp">Báo giá miễn phí</a>
            </li>



            <li class="ng-scope ">
                <a href="https://m.me/109894831747162" target="_blank" title="Liên hệ">Liên hệ</a>
            </li>
            
            <li class="ng-scope ">
                <a href="index.php?quanly=livestream"  title="Live stream">Live stream</a>
            </li>
        </ul>
    </div>
</div>
<link rel="preload" as="script"
    href="//bizweb.dktcdn.net/100/415/483/themes/804267/assets/api-jquery.js?1649491018773" />
<script src="//bizweb.dktcdn.net/100/415/483/themes/804267/assets/api-jquery.js?1649491018773" type="text/javascript">
</script>

<link rel="preload" as="script"
    href="//bizweb.dktcdn.net/100/415/483/themes/804267/assets/evo-index-js.js?1649491018773" />
<script src="//bizweb.dktcdn.net/100/415/483/themes/804267/assets/evo-index-js.js?1649491018773" type="text/javascript">
</script>
</div>
<div class="evo_sidebar_search">
    <div class="evo-search-content">
        <div class="search_heading">
            <h4 class="search_title">Tìm kiếm sản phẩm</h4>
            <div class="search_close" title="Đóng tìm kiếm">
                <svg class="Icon Icon--close" viewBox="0 0 16 14">
                    <path d="M15 0L1 14m14 0L1 0" stroke="currentColor" fill="none" fill-rule="evenodd"></path>
                </svg>
            </div>
        </div>
        <div class="evo-search">
            <form action="/search" method="get" class="evo-search-form" role="search">
                <div class="input-group">
                    <input type="text" aria-label="Tìm sản phẩm" name="query" class="search-auto form-control"
                        placeholder="Tìm sản phẩm..." autocomplete="off" />
                    <span class="input-group-append">
                        <button class="btn btn-default" type="submit" aria-label="Tìm kiếm">
                            <svg class="Icon Icon--search-desktop" viewBox="0 0 21 21">
                                <g transform="translate(1 1)" stroke="currentColor" stroke-width="2" fill="none"
                                    fill-rule="evenodd" stroke-linecap="square">
                                    <path d="M18 18l-5.7096-5.7096"></path>
                                    <circle cx="7.2" cy="7.2" r="7.2"></circle>
                                </g>
                            </svg>
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>

<link rel="preload" as="script" href="../dist/js/main.js" />
<script src="../dist/js/main.js" type="text/javascript">
</script>

<script
    src="https://www.paypal.com/sdk/js?client-id=AaA8izGjkyHaKdVHJqP7YH57erv0Ze_5mJEvB_Jfbv12Fc1smzVB44IkuevxHJJZ3_9mwsGEQNFFzeAL&currency=USD">
</script>
<script>
paypal.Buttons({

    style: {
        layout: 'vertical',
        color: 'blue',
        shape: 'rect',
        label: 'paypal'
    },
    // Sets up the transaction when a payment button is clicked
    createOrder: function(data, actions) {
        var tongtien = document.getElementById('tongtien').value;
        return actions.order.create({
            purchase_units: [{
                amount: {
                    value: tongtien // Can reference variables or functions. Example: `value: document.getElementById('...').value`
                }
            }]
        });
    },

    // Finalize the transaction after payer approval
    onApprove: function(data, actions) {

        return actions.order.capture().then(function(orderData) {
            // Successful capture! For dev/demo purposes:
            console.log('Chụp kết quả', orderData, JSON.stringify(orderData, null, 2));
            var transaction = orderData.purchase_units[0].payments.captures[0];
            alert('Giao dịch thành công' + transaction.status + ': ' + transaction.id +
                '\n\nCảm ơn bạn đã thanh toán');
            window.location.replace(
                'index.php?quanly=hoantat&thanhtoan=paypal'
            );
            // When ready to go live, remove the alert and show a success message within this page. For example:
            // var element = document.getElementById('paypal-button-container');
            // element.innerHTML = '';
            // element.innerHTML = '<h3>Thank you for your payment!</h3>';
            // Or go to another URL:  actions.redirect('thank_you.html');
        });
    },
    onCancle: function(data) {
        window.location.replace('index.php?quanly=thongtinthanhtoan');
    }
}).render('#paypal-button');
</script>
<!-- Messenger Plugin chat Code -->
<div id="fb-root"></div>

<!-- Your Plugin chat code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>

<script>
  var chatbox = document.getElementById('fb-customer-chat');
  chatbox.setAttribute("page_id", "109894831747162");
  chatbox.setAttribute("attribution", "biz_inbox");
</script>

<!-- Your SDK code -->
<script>
  window.fbAsyncInit = function() {
    FB.init({
      xfbml            : true,
      version          : 'v14.0'
    });
  };

  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script>


<div id="QPlayer">
        <div id="pContent">
            <div id="player">
                <span class="cover"></span>
                <div class="ctrl">
                    <div class="musicTag marquee">
                        <strong>Title</strong>
                        <span> - </span>
                        <span class="artist">Artist</span>
                    </div>
                    <div class="progress">
                        <div class="timer left" style="margin-top: -2px;">0:00</div>
                        <div class="contr">
                            <div class="rewind icon" style="margin-top: -5px"></div>
                            <div class="playback icon" style="margin-top: -9px"></div>
                            <div class="fastforward icon" style="margin-top: -5px"></div>
                        </div>
                        <div class="right">
                            <div class="liebiao icon" style="margin-top: -2px"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ssBtn">
                <div class="adf"></div>
            </div>
        </div>
        <ol id="playlist"></ol>
    </div>

    <script src="../dist/js/jquery.min.js"></script>
    <script src="../dist/js/jquery.marquee.min.js"></script>

    <script>
        var playlist = [
            <?php
$sql = "select * from tbl_music";
$query = mysqli_query($conn,$sql);
while ($row = mysqli_fetch_array($query)){
           echo '
            {
            title: "' .$row['tenmusic'] . '",
            artist: "' .$row['tacgia'] . '",
            mp3: "' .$row['link'] . '",
            cover: "' .$row['img'] . '",
        }, ';
}
?>



    ];
        var isRotate = true;
        var autoplay = false;
    </script>
    <script src="../dist/js/player.js"></script>
    <script>
        function bgChange() {
            var lis = $('.lib');
            for (var i = 0; i < lis.length; i += 2)
                lis[i].style.background = 'rgba(246, 246, 246, 0.5)';
        }
        window.onload = bgChange;
    </script>





<!-- Messenger Plugin chat Code -->
    <div id="fb-root"></div>

    <!-- Your Plugin chat code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "103658519235300");
      chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v15.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>
     <!--Start of Tawk.to Script-->
<!--<script type="text/javascript">-->
<!--var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();-->
<!--(function(){-->
<!--var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];-->
<!--s1.async=true;-->
<!--s1.src='https://embed.tawk.to/636db79adaff0e1306d6d409/1ghi9adpu';-->
<!--s1.charset='UTF-8';-->
<!--s1.setAttribute('crossorigin','*');-->
<!--s0.parentNode.insertBefore(s1,s0);-->
<!--})();-->
<!--</script>-->
<!--End of Tawk.to Script-->
</body>

</html>