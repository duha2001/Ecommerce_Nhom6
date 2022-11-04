<section class="awe-section-3">	
	<div class="container evo_block-product">
	
	<div class="evo-block-product-big evo-block-cate-new">
		<div class="featured--content">
			
			
			<div class="featured__first">
				<a href="index.php?quanly=danhmucsanpham&id=1" title="Điện thoại" class="ps-product--vertical">
					<div class="evo-new-has-img">
						
						<img src="./dist/images/cell-phone.png" data-src="./dist/images/cell-phone.png" alt="Điện thoại" class="lazy img-responsive mx-auto d-block" />
						
					</div>
					<div class="ps-product__content">
						<div class="ps-product__name">Điện thoại</div>
						<p class="ps-product__quantity">
						<?php
							$dt = "SELECT count(id_sanpham) as soluong FROM tbl_sanpham WHERE id_thuonghieu = 1";
							$resultdt = mysqli_query($conn, $dt);
							$rowdt = mysqli_fetch_array($resultdt);
							$tongdt = $rowdt['soluong'];
						?>
						
						<?php echo $tongdt; ?> sản phẩm</p>
					</div>
				</a>
			</div>
			
			<div class="featured__group">
				<div class="row m-0">
					
					
					<div class="col-3 p-0">
						<a href="index.php?quanly=danhmucsanpham&id=2" title="Laptop" class="ps-product--vertical">
							<div class="evo-new-has-img">
								
								<img src="./dist/images/laptop.png" data-src="./dist/images/laptop.png" alt="Laptop" class="lazy img-responsive mx-auto d-block" />
								
							</div>
							<div class="ps-product__content">
								<div class="ps-product__name">Laptop</div>
								<p class="ps-product__quantity">						
						<?php
							$dt = "SELECT count(id_sanpham) as soluong FROM tbl_sanpham WHERE id_thuonghieu = 2";
							$resultdt = mysqli_query($conn, $dt);
							$rowdt = mysqli_fetch_array($resultdt);
							$tongdt = $rowdt['soluong'];
						?>
						
						<?php echo $tongdt; ?> sản phẩm</p>
							</div>
						</a>
					</div>
					
					
					<div class="col-3 p-0">
						<a href="index.php?quanly=danhmucsanpham&id=3" title="Tablet" class="ps-product--vertical">
							<div class="evo-new-has-img">
								
								<img src="./dist/images/tablet.png" data-src="./dist/images/tablet.png" alt="Tablet" class="lazy img-responsive mx-auto d-block" />
								
							</div>
							<div class="ps-product__content">
								<div class="ps-product__name">Tablet</div>
								<p class="ps-product__quantity">
						<?php
							$dt = "SELECT count(id_sanpham) as soluong FROM tbl_sanpham WHERE id_thuonghieu = 3";
							$resultdt = mysqli_query($conn, $dt);
							$rowdt = mysqli_fetch_array($resultdt);
							$tongdt = $rowdt['soluong'];
						?>
						
						<?php echo $tongdt; ?> sản phẩm</p>
							</div>
						</a>
					</div>
					
					
					<div class="col-3 p-0">
						<a href="index.php?quanly=danhmucsanpham&id=4" title="Phụ kiện" class="ps-product--vertical">
							<div class="evo-new-has-img">
								
								<img src="./dist/images/usb.png" data-src="./dist/images/usb.png" alt="Phụ kiện" class="lazy img-responsive mx-auto d-block" />
								
							</div>
							<div class="ps-product__content">
								<div class="ps-product__name">Phụ kiện</div>
								<p class="ps-product__quantity">
						<?php
							$dt = "SELECT count(id_sanpham) as soluong FROM tbl_sanpham WHERE id_thuonghieu = 4";
							$resultdt = mysqli_query($conn, $dt);
							$rowdt = mysqli_fetch_array($resultdt);
							$tongdt = $rowdt['soluong'];
						?>
						
						<?php echo $tongdt; ?> sản phẩm</p>
							</div>
						</a>
					</div>
					
					
					<div class="col-3 p-0">
						<a href="index.php?quanly=danhmucsanpham&id=5" title="Âm thanh" class="ps-product--vertical">
							<div class="evo-new-has-img">
								
								<img src="./dist/images/wireless-headphones.png" data-src="./dist/images/wireless-headphones.png" alt="Âm thanh" class="lazy img-responsive mx-auto d-block" />
								
							</div>
							<div class="ps-product__content">
								<div class="ps-product__name">Âm thanh</div>
								<p class="ps-product__quantity">
						<?php
							$dt = "SELECT count(id_sanpham) as soluong FROM tbl_sanpham WHERE id_thuonghieu = 5";
							$resultdt = mysqli_query($conn, $dt);
							$rowdt = mysqli_fetch_array($resultdt);
							$tongdt = $rowdt['soluong'];
						?>
						
						<?php echo $tongdt; ?> sản phẩm</p>
							</div>
						</a>
					</div>
					
					
					<div class="col-3 p-0">
						<a href="index.php?quanly=danhmucsanpham&id=6" title="Đồng hồ" class="ps-product--vertical">
							<div class="evo-new-has-img">
								
								<img src="./dist/images/smart-watch.png" data-src="./dist/images/smart-watch.png" alt="Đồng hồ" class="lazy img-responsive mx-auto d-block" />
								
							</div>
							<div class="ps-product__content">
								<div class="ps-product__name">Đồng hồ</div>
								<p class="ps-product__quantity">
						<?php
							$dt = "SELECT count(id_sanpham) as soluong FROM tbl_sanpham WHERE id_thuonghieu = 6";
							$resultdt = mysqli_query($conn, $dt);
							$rowdt = mysqli_fetch_array($resultdt);
							$tongdt = $rowdt['soluong'];
						?>
						
						<?php echo $tongdt; ?> sản phẩm</p>
							</div>
						</a>
					</div>
					
					
					<div class="col-3 p-0">
						<a href="index.php?quanly=danhmucsanpham&id=7" title="Nhà thông minh" class="ps-product--vertical">
							<div class="evo-new-has-img">
								
								<img src="./dist/images/smart-home.png" data-src="./dist/images/smart-home.png" alt="Nhà thông minh" class="lazy img-responsive mx-auto d-block" />
								
							</div>
							<div class="ps-product__content">
								<div class="ps-product__name">Nhà thông minh</div>
								<p class="ps-product__quantity">
						<?php
							$dt = "SELECT count(id_sanpham) as soluong FROM tbl_sanpham WHERE id_thuonghieu = 7";
							$resultdt = mysqli_query($conn, $dt);
							$rowdt = mysqli_fetch_array($resultdt);
							$tongdt = $rowdt['soluong'];
						?>
						
						<?php echo $tongdt; ?> sản phẩm</p>
							</div>
						</a>
					</div>
					
					
					<div class="col-3 p-0">
						<a href="index.php?quanly=danhmucsanpham&id=8" title="Linh kiện PC" class="ps-product--vertical">
							<div class="evo-new-has-img">
								
								<img src="./dist/images/processor.png" data-src="./dist/images/processor.png" alt="Linh kiện PC" class="lazy img-responsive mx-auto d-block" />
								
							</div>
							<div class="ps-product__content">
								<div class="ps-product__name">Linh kiện PC</div>
								<p class="ps-product__quantity">
						<?php
							$dt = "SELECT count(id_sanpham) as soluong FROM tbl_sanpham WHERE id_thuonghieu = 8";
							$resultdt = mysqli_query($conn, $dt);
							$rowdt = mysqli_fetch_array($resultdt);
							$tongdt = $rowdt['soluong'];
						?>
						
						<?php echo $tongdt; ?> sản phẩm</p>
							</div>
						</a>
					</div>
					
					
					<div class="col-3 p-0">
						<a href="index.php?quanly=danhmucsanpham&id=9" title="Máy tính" class="ps-product--vertical">
							<div class="evo-new-has-img">
								
								<img src="./dist/images/computer.png" data-src="./dist/images/computer.png" alt="Máy tính" class="lazy img-responsive mx-auto d-block" />
								
							</div>
							<div class="ps-product__content">
								<div class="ps-product__name">Máy tính</div>
								<p class="ps-product__quantity">
						<?php
							$dt = "SELECT count(id_sanpham) as soluong FROM tbl_sanpham WHERE id_thuonghieu = 9";
							$resultdt = mysqli_query($conn, $dt);
							$rowdt = mysqli_fetch_array($resultdt);
							$tongdt = $rowdt['soluong'];
						?>
						
						<?php echo $tongdt; ?> sản phẩm</p>
							</div>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</div>
	
</div>
</section>