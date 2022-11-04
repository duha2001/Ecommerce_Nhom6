-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 02, 2022 at 03:06 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thuongmaidientu`
--

-- --------------------------------------------------------

--
-- Table structure for table `fileup`
--

CREATE TABLE `fileup` (
  `id_fileup` int(11) NOT NULL,
  `id_folder` int(11) DEFAULT NULL,
  `title_fileup` varchar(27) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_fileup` text COLLATE utf8mb4_unicode_ci,
  `isdelete` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `folder`
--

CREATE TABLE `folder` (
  `id_folder` int(11) NOT NULL,
  `name_folder` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `folder`
--

INSERT INTO `folder` (`id_folder`, `name_folder`) VALUES
(1, 'a');

-- --------------------------------------------------------

--
-- Table structure for table `tai_khoan`
--

CREATE TABLE `tai_khoan` (
  `id` int(11) NOT NULL,
  `ho` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ten` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `hinh_anh` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mat_khau` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `so_dt` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `quyen` tinyint(1) NOT NULL,
  `trang_thai` tinyint(1) NOT NULL,
  `truy_cap` int(11) NOT NULL,
  `ngay_tao` datetime NOT NULL,
  `ngay_sua` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tai_khoan`
--

INSERT INTO `tai_khoan` (`id`, `ho`, `ten`, `hinh_anh`, `email`, `mat_khau`, `so_dt`, `quyen`, `trang_thai`, `truy_cap`, `ngay_tao`, `ngay_sua`) VALUES
(1, 'Võ', 'Huy Khang', 'admin.png', 'admin@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '0848741399', 0, 1, 296, '2022-02-08 13:51:10', '2022-02-08 13:51:10'),
(3, 'Võ', 'Huy Khang', '1644897102.jpg', '18004057@student.vlute.edu.vn', 'c4ca4238a0b923820dcc509a6f75849b', '0794943324', 2, 1, 2, '2022-02-15 10:51:42', '2022-04-27 10:23:22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `id_cart` int(11) NOT NULL,
  `id_khachhang` int(11) NOT NULL,
  `code_cart` varchar(10) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `cart_status` int(11) NOT NULL,
  `cart_date` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `cart_payment` varchar(11) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `cart_shipping` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`id_cart`, `id_khachhang`, `code_cart`, `cart_status`, `cart_date`, `cart_payment`, `cart_shipping`) VALUES
(8, 1, '389', 3, '2022-06-02 20:01:32', 'tienmat', 1),
(9, 1, '7061', 4, '2022-06-02 20:01:36', 'tienmat', 1),
(10, 1, '6272', 1, '2022-06-02 21:17:10', 'tienmat', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart_details`
--

CREATE TABLE `tbl_cart_details` (
  `id_cart_details` int(11) NOT NULL,
  `code_cart` varchar(10) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `soluongmua` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `tbl_cart_details`
--

INSERT INTO `tbl_cart_details` (`id_cart_details`, `code_cart`, `id_sanpham`, `soluongmua`) VALUES
(8, '389', 8, 2),
(9, '6272', 8, 2),
(10, '6272', 7, 1),
(11, '6272', 6, 1),
(12, '6272', 5, 1),
(13, '6272', 4, 1),
(14, '6272', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dangky`
--

CREATE TABLE `tbl_dangky` (
  `id_dangky` int(11) NOT NULL,
  `ho` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `ten` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `sdt` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `code` mediumint(9) NOT NULL,
  `status` text COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `tbl_dangky`
--

INSERT INTO `tbl_dangky` (`id_dangky`, `ho`, `ten`, `sdt`, `email`, `password`, `code`, `status`) VALUES
(1, 'Võ', 'Huy Khang', '0848741399', 'huykhangvo02092000@gmail.com', '$2y$10$P4v4CPv3NJnKGcCtcuSBG./76b1VXeUF5hw/ak5PPjtX5nQiBsREO', 0, 'xác minh');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_danhmuc`
--

CREATE TABLE `tbl_danhmuc` (
  `id_thuonghieu` int(11) NOT NULL,
  `icon` text COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_danhmuc`
--

INSERT INTO `tbl_danhmuc` (`id_thuonghieu`, `icon`, `title`, `parent_id`) VALUES
(1, 'cell-phone', 'Điện thoại', 0),
(2, 'laptop', 'Laptop', 0),
(3, 'tablet', 'Tablet', 0),
(4, 'usb', 'Phụ kiện', 0),
(5, 'wireless-headphones', 'Âm thanh', 0),
(6, 'smart-watch', 'Đồng hồ', 0),
(7, 'smart-home', 'Nhà thông minh', 0),
(8, 'processor', 'Linh kiện PC', 0),
(9, 'computer', 'Máy tính', 0),
(10, 'apple', 'Apple', 1),
(11, 'samsung', 'Samsung', 1),
(12, 'xiaomi', 'Xiaomi', 1),
(13, 'oppo', 'OPPO', 1),
(14, 'nokia', 'Nokia', 1),
(15, 'realme', 'Realme', 1),
(16, 'vsmart', 'Vsmart', 1),
(17, 'asus', 'ASUS', 1),
(18, 'huawei', 'Huawei', 1),
(19, 'vivo', 'Vivo', 1),
(20, 'https://i.imgur.com/KqT8mt8.png', 'Thiết bị văn phòng', 2),
(21, 'https://i.imgur.com/0FLHRwv.png', 'Đồ Hoạ - Kỹ Thuật', 2),
(22, 'https://i.imgur.com/vV6D3T0.png', 'Mỏng nhẹ', 2),
(23, 'https://i.imgur.com/xvppFUf.png', 'Laptop Gaming', 2),
(24, 'https://i.imgur.com/senv5sd.png', 'Cao cấp - Sang trọng', 2),
(25, 'https://i.imgur.com/xHp8DMv.png', 'MacBook', 2),
(26, 'null', 'iPad Pro', 3),
(27, 'null', 'iPad 10.2', 3),
(28, 'null', 'iPad Air', 3),
(29, 'null', 'iPad 9.7', 3),
(30, 'null', 'iPad mini', 3),
(31, 'phukiennoibat', 'Phụ kiện nổi bật', 4),
(32, 'baoda', 'Bao da ốp lưng', 4),
(33, 'sacduphong', 'Sạc dự phòng', 4),
(34, 'thenho', 'Thẻ nhớ', 4),
(35, 'apple', 'Phụ kiện Apple', 4),
(36, 'danmanghinh', 'Dán màn hình', 4),
(37, 'tainghe', 'Tai nghe', 4),
(38, 'loa', 'Loa', 4),
(39, 'usbocung', 'USB - Ổ cứng', 4),
(40, 'capsac', 'Sạc cáp', 4),
(41, 'chuot', 'Chuột', 4),
(42, 'giadodt', 'Giá đỡ điện thoại', 4),
(43, 'balotuisach', 'Balo - Túi xách', 4),
(44, 'daydongho', 'Dây đồng hồ', 4),
(45, 'thietbimang', 'Thiết bị mạng', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_danhmuctructhuoc`
--

CREATE TABLE `tbl_danhmuctructhuoc` (
  `id_danhmuc` int(11) NOT NULL,
  `img` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `title` varchar(25) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `id` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `tbl_danhmuctructhuoc`
--

INSERT INTO `tbl_danhmuctructhuoc` (`id_danhmuc`, `img`, `title`, `id`) VALUES
(1, 'iphone-12-series', 'iPhone 12 Series', 10),
(2, 'iphone-11-series', 'iPhone 11 Series', 10),
(3, 'iphone-xs-xs-max', 'iPhone XS | XS MAX', 10),
(4, 'iphone-x-xr', 'iPhone X | XR', 10),
(5, 'iphone-8-8-plus', 'iPhone 8 | 8 Plus', 10),
(6, 'note', 'Galaxy Note', 11),
(7, 's', 'Galaxy S', 11),
(8, 'a', 'Galaxy A', 11),
(9, 'null', 'Galaxy J', 11),
(10, 'null', 'Galaxy M', 11),
(11, 'null', 'Xiaomi Redmi', 12),
(12, 'null', 'Xiaomi Mi', 12);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_momo`
--

CREATE TABLE `tbl_momo` (
  `id_momo` int(11) NOT NULL,
  `partner_code` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `order_id` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `amount` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `order_info` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `order_type` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `trans_id` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `pay_type` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `code_cart` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sanpham`
--

CREATE TABLE `tbl_sanpham` (
  `id_sanpham` int(11) NOT NULL,
  `tensanpham` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `giagoc` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `giakhuyenmai` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `baohanh` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `khuyenmai` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `id_thuonghieu` int(11) NOT NULL,
  `id_loaisanpham` int(11) DEFAULT NULL,
  `id_tructhuoc` int(11) DEFAULT NULL,
  `tinh_trang` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `hopbaogom` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `mota` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `noi_bat` tinyint(4) NOT NULL DEFAULT '0',
  `img_avatar` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `banner1` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `banner2` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `banner3` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `banner4` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `banner5` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `thong_so_ky_thuat` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `nguoitao` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `ngaytao` date DEFAULT NULL,
  `nguoicapnhat` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `ngaycapnhat` date DEFAULT NULL,
  `hienthi` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `tbl_sanpham`
--

INSERT INTO `tbl_sanpham` (`id_sanpham`, `tensanpham`, `giagoc`, `giakhuyenmai`, `baohanh`, `khuyenmai`, `id_thuonghieu`, `id_loaisanpham`, `id_tructhuoc`, `tinh_trang`, `hopbaogom`, `mota`, `noi_bat`, `img_avatar`, `banner1`, `banner2`, `banner3`, `banner4`, `banner5`, `thong_so_ky_thuat`, `nguoitao`, `ngaytao`, `nguoicapnhat`, `ngaycapnhat`, `hienthi`) VALUES
(1, 'iPhone 12 Pro Max 256GB Chính Hãng (VN/A)', '33990000', '33590000', 'Bảo hành 1 đổi 1', 'Giảm thêm 10% khi mua kèm iPhone/Apple Watch', 1, 10, 0, '1', 'Máy mới 100% , chính hãng Apple Việt Nam.', '<p>asd</p>\r\n', 1, 'https://i.imgur.com/dBPnHyr.png', 'https://i.imgur.com/nvY05nx.png', 'https://i.imgur.com/7B0Vu13.png', 'https://i.imgur.com/AF6NdwU.png', 'https://i.imgur.com/fr2R5x4.png', 'https://i.imgur.com/AbW59L5.png', 'Thông số kỹ thuật', '', NULL, 'Võ Huy Khang', '2022-05-14', 1),
(2, 'iPhone 12 128GB Chính hãng (VN/A)', '24990000', '22500000', 'Bảo hành 1 đổi 1', '\nGiảm thêm 10% khi mua kèm iPhone/Apple Watch', 1, 10, 1, '1', 'Máy mới 100% , chính hãng Apple Việt Nam.', 'Đánh giá chi tiết iPhone 12 Pro Max 256GB Chính Hãng (VN/A)\r\n“Trùm cuối” của dòng iPhone 12 đã xuất hiện. iPhone 12 Pro Max là chiếc iPhone có màn hình lớn nhất từ trước đến nay, mang trên mình bộ vi xử lý mạnh nhất, camera đẳng cấp pro cùng kết nối 5G siêu tốc, cho bạn những trải nghiệm tuyệt vời chưa từng có.  ', 0, 'https://i.imgur.com/Fp6fLZJ.png', 'https://i.imgur.com/nvY05nx.png', 'https://i.imgur.com/7B0Vu13.png', 'https://i.imgur.com/AF6NdwU.png', 'https://i.imgur.com/fr2R5x4.png', 'https://i.imgur.com/AbW59L5.png', 'Thông số kỹ thuật', '', NULL, '', NULL, 0),
(3, 'iPhone 12 mini 64GB Chính hãng (VN/A)', '24990000', '18990000', 'Bảo hành 1 đổi 1', '\nGiảm thêm 10% khi mua kèm iPhone/Apple Watch', 1, 10, 1, '1', 'Máy mới 100% , chính hãng Apple Việt Nam.', 'Đánh giá chi tiết iPhone 12 Pro Max 256GB Chính Hãng (VN/A)\r\n“Trùm cuối” của dòng iPhone 12 đã xuất hiện. iPhone 12 Pro Max là chiếc iPhone có màn hình lớn nhất từ trước đến nay, mang trên mình bộ vi xử lý mạnh nhất, camera đẳng cấp pro cùng kết nối 5G siêu tốc, cho bạn những trải nghiệm tuyệt vời chưa từng có.  ', 0, 'https://i.imgur.com/2E3lGln.png', 'https://i.imgur.com/nvY05nx.png', 'https://i.imgur.com/7B0Vu13.png', 'https://i.imgur.com/AF6NdwU.png', 'https://i.imgur.com/fr2R5x4.png', 'https://i.imgur.com/AbW59L5.png', 'Thông số kỹ thuật', '', NULL, '', NULL, 0),
(4, 'iPhone 11 Pro Max 512GB Chính hãng', '33990000', '30000000', 'Bảo hành 1 đổi 1', '\nGiảm thêm 10% khi mua kèm iPhone/Apple Watch', 1, 10, 2, '0', 'Máy mới 100% , chính hãng Apple Việt Nam.', 'Đánh giá chi tiết iPhone 12 Pro Max 256GB Chính Hãng (VN/A)\r\n“Trùm cuối” của dòng iPhone 12 đã xuất hiện. iPhone 12 Pro Max là chiếc iPhone có màn hình lớn nhất từ trước đến nay, mang trên mình bộ vi xử lý mạnh nhất, camera đẳng cấp pro cùng kết nối 5G siêu tốc, cho bạn những trải nghiệm tuyệt vời chưa từng có.  ', 0, 'https://i.imgur.com/5ERLeWI.png', 'https://i.imgur.com/nvY05nx.png', 'https://i.imgur.com/7B0Vu13.png', 'https://i.imgur.com/AF6NdwU.png', 'https://i.imgur.com/fr2R5x4.png', 'https://i.imgur.com/AbW59L5.png', 'Thông số kỹ thuật', '', NULL, '', NULL, 0),
(5, 'iPhone 11 128GB Chính hãng (VN/A)', '20990000', '16990000', 'Bảo hành 1 đổi 1', '\nGiảm thêm 10% khi mua kèm iPhone/Apple Watch', 1, 10, 2, '0', 'Máy mới 100% , chính hãng Apple Việt Nam.', 'Đánh giá chi tiết iPhone 12 Pro Max 256GB Chính Hãng (VN/A)\r\n“Trùm cuối” của dòng iPhone 12 đã xuất hiện. iPhone 12 Pro Max là chiếc iPhone có màn hình lớn nhất từ trước đến nay, mang trên mình bộ vi xử lý mạnh nhất, camera đẳng cấp pro cùng kết nối 5G siêu tốc, cho bạn những trải nghiệm tuyệt vời chưa từng có.  ', 0, 'https://i.imgur.com/rRbAi1v.png', 'https://i.imgur.com/nvY05nx.png', 'https://i.imgur.com/7B0Vu13.png', 'https://i.imgur.com/AF6NdwU.png', 'https://i.imgur.com/fr2R5x4.png', 'https://i.imgur.com/AbW59L5.png', 'Thông số kỹ thuật', '', NULL, '', NULL, 0),
(6, 'iPhone 12 256GB Chính Hãng (VN/A)', '24990000', '22990000', 'Bảo hành 1 đổi 1', 'Giảm thêm 10% khi mua kèm iPhone/Apple Watch', 1, 10, 0, '1', 'Máy mới 100% , chính hãng Apple Việt Nam.', '<p>sdadas</p>\r\n', 0, 'https://i.imgur.com/5k6aeXy.png', 'https://i.imgur.com/nvY05nx.png', 'https://i.imgur.com/7B0Vu13.png', 'https://i.imgur.com/AF6NdwU.png', 'https://i.imgur.com/fr2R5x4.png', 'https://i.imgur.com/AbW59L5.png', 'Thông số kỹ thuật', '', NULL, 'Võ Huy Khang', '2022-05-11', 1),
(7, 'iPhone 12 Pro Max 256GB Chính Hãng (VN/A)', '33990000', '33590000', 'Bảo hành 1 đổi 1', 'Giảm thêm 10% khi mua kèm iPhone/Apple Watch', 1, 10, 1, '1', 'Máy mới 100% , chính hãng Apple Việt Nam.', '<p>dsadsaddsadsaddsadsaddsadsaddsadsaddsadsaddsadsaddsadsaddsadsaddsadsaddsadsaddsadsaddsadsad</p>\r\n', 0, 'https://i.imgur.com/0KKKNKC.png', 'https://i.imgur.com/nvY05nx.png', 'https://i.imgur.com/7B0Vu13.png', 'https://i.imgur.com/AF6NdwU.png', 'https://i.imgur.com/fr2R5x4.png', 'https://i.imgur.com/AbW59L5.png', 'Thông số kỹ thuật', '', NULL, 'Võ Huy Khang', '2022-05-14', 0),
(8, 'Laptop MSI Gaming GL65 LEOPARD 10SCXK-089VN', '24990000', '10000', 'Bảo hành 12 tháng tại trung tâm bảo hành chính hãng tại Việt Nam. 1 ĐỔI 1 trong 30 ngày nếu có lỗi nhà sản xuất.', 'Nhập MOCA400 Giảm/Hoàn tiền 10% tối đa 400.000đ khi thanh toán Online bằng ví Moca', 1, 10, 0, 'Máy mới 100% , chính hãng Apple Việt Nam.', 'Thân máy, cáp USB-C to Lightning, sách HDSD', '<p>&nbsp;</p>\r\n\r\n<p><strong>M&agrave;n h&igrave;nh hiển thị rộng</strong></p>\r\n\r\n<p>Trang bị m&agrave;n h&igrave;nh 15.6&quot; FHD (1920*1080) IPS with Anti-Glare mang đến h&igrave;nh ảnh hiển thị r&otilde; n&eacute;t từng chi tiết, m&agrave;u sắc trung thực nhất. M&agrave;n h&igrave;nh hiển thị rộng hơn nằm gọn g&agrave;ng trong một kiểu d&aacute;ng nhỏ gọn gi&uacute;p n&acirc;ng tầm trải nghiệm của ngưới sử dụng.</p>\r\n\r\n<p><img alt=\"Laptop MSI GL65 Leopard 10SEK-235VN (Core i7-10750H/ 16GB (8GBx2) DDR4 2666MHz/ 1TB SSD M.2 PCIE/ RTX 2060 6GB GDDR6/ 15.6 FHD IPS 144Hz/ Win 10) - Hàng Chính Hãng\" src=\"https://salt.tikicdn.com/ts/tmp/c5/58/2a/9e434f6649c295bd151c01ae319a7c9a.jpg\" style=\"height:500px; width:750px\" /></p>\r\n\r\n<p><strong>Hiệu năng v&ocirc; c&ugrave;ng mạnh mẽ</strong></p>\r\n\r\n<p><strong>MSI GL65 Leopard 10SEK-235VN</strong>&nbsp;sở hữu sức mạnh đến từ vi xử l&yacute; mới nhất i7-10750H mang đến cho bạn hiệu năng vượt trội tới 10% so với c&aacute;c thế hệ trước. Kết hợp với 16GB (8GBx2) DDR4 2666MHz cho khả năng xử l&yacute; c&aacute;c t&aacute;c vụ đa nhiệm mượt m&agrave;, nhẹ nh&agrave;ng hơn. Người d&ugrave;ng c&oacute; thể n&acirc;ng cấp th&ecirc;m RAM để phục vụ cho nhu cầu c&ocirc;ng việc v&agrave; giải tr&iacute; cao hơn.</p>\r\n\r\n<p><img alt=\"Laptop MSI GL65 Leopard 10SEK-235VN (Core i7-10750H/ 16GB (8GBx2) DDR4 2666MHz/ 1TB SSD M.2 PCIE/ RTX 2060 6GB GDDR6/ 15.6 FHD IPS 144Hz/ Win 10) - Hàng Chính Hãng\" src=\"https://salt.tikicdn.com/ts/tmp/75/9f/c2/050c2a27f910fcd2c0db48b4fb8f9814.jpg\" style=\"height:500px; width:750px\" /></p>\r\n\r\n<p>Sử dụng card đồ họa NVIDIA GeForce RTX 2060 6GB GDDR6 được x&acirc;y dựng với hiệu năng đồ họa đột ph&aacute; của kiến tr&uacute;c NVIDIA Turing, hỗ trợ tăng tốc độ cho c&aacute;c game phổ biến nhất v&agrave; c&aacute;c ứng dụng chỉnh sửa ảnh.</p>\r\n\r\n<p><img alt=\"Laptop MSI GL65 Leopard 10SEK-235VN (Core i7-10750H/ 16GB (8GBx2) DDR4 2666MHz/ 1TB SSD M.2 PCIE/ RTX 2060 6GB GDDR6/ 15.6 FHD IPS 144Hz/ Win 10) - Hàng Chính Hãng\" src=\"https://salt.tikicdn.com/ts/tmp/c3/d9/c0/a0115092da346960a70acb8cb1c3ff85.jpg\" style=\"height:500px; width:750px\" /></p>\r\n\r\n<p><strong>Trang bị đ&egrave;n b&agrave;n ph&iacute;m PER-KEY RGB</strong></p>\r\n\r\n<p>Đ&egrave;n nền Per-key RGB t&ugrave;y chỉnh ph&iacute;m theo &yacute; th&iacute;ch, thể hiện chế độ thực trong game hoặc nhấp nh&aacute;y theo giai điệu b&agrave;i nhạc y&ecirc;u th&iacute;ch của bạn. C&aacute;c chế độ đ&egrave;n nền được hỗ trợ: Gold Splash, FPS, MMO, MOBA, free way, Chakra, Disco Mode, Roulette.</p>\r\n\r\n<p><img alt=\"Laptop MSI GL65 Leopard 10SEK-235VN (Core i7-10750H/ 16GB (8GBx2) DDR4 2666MHz/ 1TB SSD M.2 PCIE/ RTX 2060 6GB GDDR6/ 15.6 FHD IPS 144Hz/ Win 10) - Hàng Chính Hãng\" src=\"https://salt.tikicdn.com/ts/tmp/30/94/1f/60175ad097aa16eef0883e497ffba235.jpg\" style=\"height:500px; width:750px\" /></p>\r\n\r\n<p>&quot;&gt;</p>\r\n', 1, 'https://i.imgur.com/GOexkeE.png', 'https://i.imgur.com/GOexkeE.png', 'https://i.imgur.com/7Gtx9Su.png', 'https://i.imgur.com/Z54pWYD.png', 'https://i.imgur.com/mZvwWuW.png', 'https://i.imgur.com/RjUFZZL.png', '<p><strong>M&agrave;n h&igrave;nh hiển thị rộng</strong></p>\r\n\r\n<p>Trang bị m&agrave;n h&igrave;nh 15.6&quot; FHD (1920*1080) IPS with Anti-Glare mang đến h&igrave;nh ảnh hiển thị r&otilde; n&eacute;t từng chi tiết, m&agrave;u sắc trung thực nhất. M&agrave;n h&igrave;nh hiển thị rộng hơn nằm gọn g&agrave;ng trong một kiểu d&aacute;ng nhỏ gọn gi&uacute;p n&acirc;ng tầm trải nghiệm của ngưới sử dụng.</p>\r\n\r\n<p><img alt=\"Laptop MSI GL65 Leopard 10SEK-235VN (Core i7-10750H/ 16GB (8GBx2) DDR4 2666MHz/ 1TB SSD M.2 PCIE/ RTX 2060 6GB GDDR6/ 15.6 FHD IPS 144Hz/ Win 10) - Hàng Chính Hãng\" src=\"https://salt.tikicdn.com/ts/tmp/c5/58/2a/9e434f6649c295bd151c01ae319a7c9a.jpg\" style=\"height:500px; width:750px\" /></p>\r\n\r\n<p><strong>Hiệu năng v&ocirc; c&ugrave;ng mạnh mẽ</strong></p>\r\n\r\n<p><strong>MSI GL65 Leopard 10SEK-235VN</strong>&nbsp;sở hữu sức mạnh đến từ vi xử l&yacute; mới nhất i7-10750H mang đến cho bạn hiệu năng vượt trội tới 10% so với c&aacute;c thế hệ trước. Kết hợp với 16GB (8GBx2) DDR4 2666MHz cho khả năng xử l&yacute; c&aacute;c t&aacute;c vụ đa nhiệm mượt m&agrave;, nhẹ nh&agrave;ng hơn. Người d&ugrave;ng c&oacute; thể n&acirc;ng cấp th&ecirc;m RAM để phục vụ cho nhu cầu c&ocirc;ng việc v&agrave; giải tr&iacute; cao hơn.</p>\r\n\r\n<p><img alt=\"Laptop MSI GL65 Leopard 10SEK-235VN (Core i7-10750H/ 16GB (8GBx2) DDR4 2666MHz/ 1TB SSD M.2 PCIE/ RTX 2060 6GB GDDR6/ 15.6 FHD IPS 144Hz/ Win 10) - Hàng Chính Hãng\" src=\"https://salt.tikicdn.com/ts/tmp/75/9f/c2/050c2a27f910fcd2c0db48b4fb8f9814.jpg\" style=\"height:500px; width:750px\" /></p>\r\n\r\n<p>Sử dụng card đồ họa NVIDIA GeForce RTX 2060 6GB GDDR6 được x&acirc;y dựng với hiệu năng đồ họa đột ph&aacute; của kiến tr&uacute;c NVIDIA Turing, hỗ trợ tăng tốc độ cho c&aacute;c game phổ biến nhất v&agrave; c&aacute;c ứng dụng chỉnh sửa ảnh.</p>\r\n\r\n<p><img alt=\"Laptop MSI GL65 Leopard 10SEK-235VN (Core i7-10750H/ 16GB (8GBx2) DDR4 2666MHz/ 1TB SSD M.2 PCIE/ RTX 2060 6GB GDDR6/ 15.6 FHD IPS 144Hz/ Win 10) - Hàng Chính Hãng\" src=\"https://salt.tikicdn.com/ts/tmp/c3/d9/c0/a0115092da346960a70acb8cb1c3ff85.jpg\" style=\"height:500px; width:750px\" /></p>\r\n\r\n<p><strong>Trang bị đ&egrave;n b&agrave;n ph&iacute;m PER-KEY RGB</strong></p>\r\n\r\n<p>Đ&egrave;n nền Per-key RGB t&ugrave;y chỉnh ph&iacute;m theo &yacute; th&iacute;ch, thể hiện chế độ thực trong game hoặc nhấp nh&aacute;y theo giai điệu b&agrave;i nhạc y&ecirc;u th&iacute;ch của bạn. C&aacute;c chế độ đ&egrave;n nền được hỗ trợ: Gold Splash, FPS, MMO, MOBA, free way, Chakra, Disco Mode, Roulette.</p>\r\n\r\n<p><img alt=\"Laptop MSI GL65 Leopard 10SEK-235VN (Core i7-10750H/ 16GB (8GBx2) DDR4 2666MHz/ 1TB SSD M.2 PCIE/ RTX 2060 6GB GDDR6/ 15.6 FHD IPS 144Hz/ Win 10) - Hàng Chính Hãng\" src=\"https://salt.tikicdn.com/ts/tmp/30/94/1f/60175ad097aa16eef0883e497ffba235.jpg\" style=\"height:500px; width:750px\" /></p>\r\n\r\n<p>&quot;&gt;</p>\r\n', 'Võ Huy Khang', '2022-05-09', 'Võ Huy Khang', '2022-06-02', 1),
(23, 'iPhone 12 Pro Max 256GB Chính Hãng (VN/A)', '33990000', '33590000', 'Bảo hành 1 đổi 1', 'Giảm thêm 10% khi mua kèm iPhone/Apple Watch', 4, 31, 0, '1', 'Máy mới 100% , chính hãng Apple Việt Nam.', '<p>S</p>\r\n', 1, 'https://i.imgur.com/0KKKNKC.png', 'https://i.imgur.com/nvY05nx.png', 'https://i.imgur.com/7B0Vu13.png', 'https://i.imgur.com/AF6NdwU.png', 'https://i.imgur.com/fr2R5x4.png', 'https://i.imgur.com/AbW59L5.png', '<p>S</p>\r\n', 'Võ Huy Khang', '2022-05-23', NULL, NULL, 0),
(24, 'LAPTOP MSI GAMING GL65 LEOPARD 10SCXK-089VN', '24990000', '10000', 'Bảo hành 12 tháng tại trung tâm bảo hành chính hãng Apple Việt Nam. 1 ĐỔI 1 trong 30 ngày nếu có lỗi nhà sản xuất.', 'Nhập MOCA400 Giảm/Hoàn tiền 10% tối đa 400.000đ khi thanh toán Online bằng ví Moca', 2, 23, 0, 'Máy mới 100% , chính hãng Apple Việt Nam.', 'Thân máy, cáp USB-C to Lightning, sách HDSD', '<p>&nbsp;</p>\r\n\r\n<p><strong>Hiệu năng v&ocirc; c&ugrave;ng mạnh mẽ</strong></p>\r\n\r\n<p><strong>MSI GL65 Leopard 10SEK-235VN</strong>&nbsp;sở hữu sức mạnh đến từ vi xử l&yacute; mới nhất i7-10750H mang đến cho bạn hiệu năng vượt trội tới 10% so với c&aacute;c thế hệ trước. Kết hợp với 16GB (8GBx2) DDR4 2666MHz cho khả năng xử l&yacute; c&aacute;c t&aacute;c vụ đa nhiệm mượt m&agrave;, nhẹ nh&agrave;ng hơn. Người d&ugrave;ng c&oacute; thể n&acirc;ng cấp th&ecirc;m RAM để phục vụ cho nhu cầu c&ocirc;ng việc v&agrave; giải tr&iacute; cao hơn.</p>\r\n\r\n<p><img alt=\"Laptop MSI GL65 Leopard 10SEK-235VN (Core i7-10750H/ 16GB (8GBx2) DDR4 2666MHz/ 1TB SSD M.2 PCIE/ RTX 2060 6GB GDDR6/ 15.6 FHD IPS 144Hz/ Win 10) - Hàng Chính Hãng\" src=\"https://salt.tikicdn.com/ts/tmp/75/9f/c2/050c2a27f910fcd2c0db48b4fb8f9814.jpg\" /></p>\r\n\r\n<p>Sử dụng card đồ họa NVIDIA GeForce RTX 2060 6GB GDDR6 được x&acirc;y dựng với hiệu năng đồ họa đột ph&aacute; của kiến tr&uacute;c NVIDIA Turing, hỗ trợ tăng tốc độ cho c&aacute;c game phổ biến nhất v&agrave; c&aacute;c ứng dụng chỉnh sửa ảnh.</p>\r\n\r\n<p><img alt=\"Laptop MSI GL65 Leopard 10SEK-235VN (Core i7-10750H/ 16GB (8GBx2) DDR4 2666MHz/ 1TB SSD M.2 PCIE/ RTX 2060 6GB GDDR6/ 15.6 FHD IPS 144Hz/ Win 10) - Hàng Chính Hãng\" src=\"https://salt.tikicdn.com/ts/tmp/c3/d9/c0/a0115092da346960a70acb8cb1c3ff85.jpg\" /></p>\r\n\r\n<p><strong>Trang bị đ&egrave;n b&agrave;n ph&iacute;m PER-KEY RGB</strong></p>\r\n\r\n<p>Đ&egrave;n nền Per-key RGB t&ugrave;y chỉnh ph&iacute;m theo &yacute; th&iacute;ch, thể hiện chế độ thực trong game hoặc nhấp nh&aacute;y theo giai điệu b&agrave;i nhạc y&ecirc;u th&iacute;ch của bạn. C&aacute;c chế độ đ&egrave;n nền được hỗ trợ: Gold Splash, FPS, MMO, MOBA, free way, Chakra, Disco Mode, Roulette.</p>\r\n\r\n<p>&quot;&gt;</p>\r\n\r\n<p>&quot;&gt;</p>\r\n', 1, 'https://i.imgur.com/LE6RDdX.png', 'https://i.imgur.com/CECCzY6.png', 'https://i.imgur.com/K2VDQfx.png', 'https://i.imgur.com/t4bcd9a.png', 'https://i.imgur.com/5gNAs95.png', 'https://i.imgur.com/5gNAs95.png', '<p><strong>M&agrave;n h&igrave;nh hiển thị rộng</strong></p>\r\n\r\n<p>Trang bị m&agrave;n h&igrave;nh 15.6&quot; FHD (1920*1080) IPS with Anti-Glare mang đến h&igrave;nh ảnh hiển thị r&otilde; n&eacute;t từng chi tiết, m&agrave;u sắc trung thực nhất. M&agrave;n h&igrave;nh hiển thị rộng hơn nằm gọn g&agrave;ng trong một kiểu d&aacute;ng nhỏ gọn gi&uacute;p n&acirc;ng tầm trải nghiệm của ngưới sử dụng.</p>\r\n\r\n<p><img alt=\"Laptop MSI GL65 Leopard 10SEK-235VN (Core i7-10750H/ 16GB (8GBx2) DDR4 2666MHz/ 1TB SSD M.2 PCIE/ RTX 2060 6GB GDDR6/ 15.6 FHD IPS 144Hz/ Win 10) - Hàng Chính Hãng\" src=\"https://salt.tikicdn.com/ts/tmp/c5/58/2a/9e434f6649c295bd151c01ae319a7c9a.jpg\" /></p>\r\n\r\n<p><strong>Hiệu năng v&ocirc; c&ugrave;ng mạnh mẽ</strong></p>\r\n\r\n<p><strong>MSI GL65 Leopard 10SEK-235VN</strong>&nbsp;sở hữu sức mạnh đến từ vi xử l&yacute; mới nhất i7-10750H mang đến cho bạn hiệu năng vượt trội tới 10% so với c&aacute;c thế hệ trước. Kết hợp với 16GB (8GBx2) DDR4 2666MHz cho khả năng xử l&yacute; c&aacute;c t&aacute;c vụ đa nhiệm mượt m&agrave;, nhẹ nh&agrave;ng hơn. Người d&ugrave;ng c&oacute; thể n&acirc;ng cấp th&ecirc;m RAM để phục vụ cho nhu cầu c&ocirc;ng việc v&agrave; giải tr&iacute; cao hơn.</p>\r\n\r\n<p><img alt=\"Laptop MSI GL65 Leopard 10SEK-235VN (Core i7-10750H/ 16GB (8GBx2) DDR4 2666MHz/ 1TB SSD M.2 PCIE/ RTX 2060 6GB GDDR6/ 15.6 FHD IPS 144Hz/ Win 10) - Hàng Chính Hãng\" src=\"https://salt.tikicdn.com/ts/tmp/75/9f/c2/050c2a27f910fcd2c0db48b4fb8f9814.jpg\" /></p>\r\n\r\n<p>Sử dụng card đồ họa NVIDIA GeForce RTX 2060 6GB GDDR6 được x&acirc;y dựng với hiệu năng đồ họa đột ph&aacute; của kiến tr&uacute;c NVIDIA Turing, hỗ trợ tăng tốc độ cho c&aacute;c game phổ biến nhất v&agrave; c&aacute;c ứng dụng chỉnh sửa ảnh.</p>\r\n\r\n<p><img alt=\"Laptop MSI GL65 Leopard 10SEK-235VN (Core i7-10750H/ 16GB (8GBx2) DDR4 2666MHz/ 1TB SSD M.2 PCIE/ RTX 2060 6GB GDDR6/ 15.6 FHD IPS 144Hz/ Win 10) - Hàng Chính Hãng\" src=\"https://salt.tikicdn.com/ts/tmp/c3/d9/c0/a0115092da346960a70acb8cb1c3ff85.jpg\" /></p>\r\n\r\n<p><strong>Trang bị đ&egrave;n b&agrave;n ph&iacute;m PER-KEY RGB</strong></p>\r\n\r\n<p>Đ&egrave;n nền Per-key RGB t&ugrave;y chỉnh ph&iacute;m theo &yacute; th&iacute;ch, thể hiện chế độ thực trong game hoặc nhấp nh&aacute;y theo giai điệu b&agrave;i nhạc y&ecirc;u th&iacute;ch của bạn. C&aacute;c chế độ đ&egrave;n nền được hỗ trợ: Gold Splash, FPS, MMO, MOBA, free way, Chakra, Disco Mode, Roulette.</p>\r\n\r\n<p><img alt=\"Laptop MSI GL65 Leopard 10SEK-235VN (Core i7-10750H/ 16GB (8GBx2) DDR4 2666MHz/ 1TB SSD M.2 PCIE/ RTX 2060 6GB GDDR6/ 15.6 FHD IPS 144Hz/ Win 10) - Hàng Chính Hãng\" src=\"https://salt.tikicdn.com/ts/tmp/30/94/1f/60175ad097aa16eef0883e497ffba235.jpg\" /></p>\r\n\r\n<p>&quot;&gt;</p>\r\n', 'Võ Huy Khang', '2022-05-25', 'Võ Huy Khang', '2022-06-02', 0),
(26, 'LAPTOP MSI GAMING GL65 LEOPARD 10SCXK-089VN', '24990000', '23990000', 'Bảo hành 12 tháng tại trung tâm bảo hành chính hãng Apple Việt Nam. 1 ĐỔI 1 trong 30 ngày nếu có lỗi nhà sản xuất.', 'Nhập MOCA400 Giảm/Hoàn tiền 10% tối đa 400.000đ khi thanh toán Online bằng ví Moca', 2, 23, 0, 'Máy mới 100% , chính hãng Apple Việt Nam.', 'Thân máy, cáp USB-C to Lightning, sách HDSD', '<p>&nbsp;</p>\r\n\r\n<p>Sử dụng card đồ họa NVIDIA GeForce RTX 2060 6GB GDDR6 được x&acirc;y dựng với hiệu năng đồ họa đột ph&aacute; của kiến tr&uacute;c NVIDIA Turing, hỗ trợ tăng tốc độ cho c&aacute;c game phổ biến nhất v&agrave; c&aacute;c ứng dụng chỉnh sửa ảnh.</p>\r\n\r\n<p><img alt=\"Laptop MSI GL65 Leopard 10SEK-235VN (Core i7-10750H/ 16GB (8GBx2) DDR4 2666MHz/ 1TB SSD M.2 PCIE/ RTX 2060 6GB GDDR6/ 15.6 FHD IPS 144Hz/ Win 10) - Hàng Chính Hãng\" src=\"https://salt.tikicdn.com/ts/tmp/c3/d9/c0/a0115092da346960a70acb8cb1c3ff85.jpg\" /></p>\r\n\r\n<p><strong>Trang bị đ&egrave;n b&agrave;n ph&iacute;m PER-KEY RGB</strong></p>\r\n\r\n<p>Đ&egrave;n nền Per-key RGB t&ugrave;y chỉnh ph&iacute;m theo &yacute; th&iacute;ch, thể hiện chế độ thực trong game hoặc nhấp nh&aacute;y theo giai điệu b&agrave;i nhạc y&ecirc;u th&iacute;ch của bạn. C&aacute;c chế độ đ&egrave;n nền được hỗ trợ: Gold Splash, FPS, MMO, MOBA, free way, Chakra, Disco Mode, Roulette.</p>\r\n\r\n<p>&quot;&gt;</p>\r\n\r\n<p>&quot;&gt;</p>\r\n\r\n<p>&quot;&gt;</p>\r\n', 1, 'https://i.imgur.com/LE6RDdX.png', 'https://i.imgur.com/CECCzY6.png', 'https://i.imgur.com/K2VDQfx.png', 'https://i.imgur.com/t4bcd9a.png', 'https://i.imgur.com/5gNAs95.png', 'https://i.imgur.com/5gNAs95.png', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>H&atilde;ng sản xuất</td>\r\n			<td>MSI</td>\r\n		</tr>\r\n		<tr>\r\n			<td>K&iacute;ch thước</td>\r\n			<td>357.7 x 248 x 27.5 mm</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Trọng lượng</td>\r\n			<td>2.3 kg</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Loại m&agrave;n h&igrave;nh</td>\r\n			<td>15.6&quot; FHD (1920 x 1080) IPS with Anti-Glare, 144Hz, Thin Bezel, 45% NTSC</td>\r\n		</tr>\r\n		<tr>\r\n			<td>K&iacute;ch thước m&agrave;n h&igrave;nh</td>\r\n			<td>15.6 inches</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Độ ph&acirc;n giải m&agrave;n h&igrave;nh</td>\r\n			<td>1920 x 1080 pixels</td>\r\n		</tr>\r\n		<tr>\r\n			<td>CPU</td>\r\n			<td>Intel Core i7-10750H 2.6GHz up to 5.0GHz 12MB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>VGA</td>\r\n			<td>NVIDIA GeForce GTX 1650 4GB GDDR6 + Intel UHD Graphics</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Ổ cứng</td>\r\n			<td>512GB SSD M.2 PCIE, x1 slot 2.5&quot; SATA (HDD/SSD)</td>\r\n		</tr>\r\n		<tr>\r\n			<td>RAM</td>\r\n			<td>8GB DDR4 2666MHz (2x SO-DIMM socket, up to 32GB SDRAM)</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Hệ điều h&agrave;nh</td>\r\n			<td>Windows</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Phi&ecirc;n bản hệ điều h&agrave;nh</td>\r\n			<td>Windows 10 Home SL</td>\r\n		</tr>\r\n		<tr>\r\n			<td>WLAN</td>\r\n			<td>Intel Wi-Fi 6 AX201(2*2 ax)</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Bluetooth</td>\r\n			<td>v5.0</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Pin</td>\r\n			<td>6 Cell 51WHr</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Cổng/Khe cắm</td>\r\n			<td>1x Type-C USB3.2 Gen1, 3x Type-A USB3.2 Gen1, 1x Mini-DisplayPort, 1x (4K @ 30Hz) HDMI, 1x RJ45</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Tự động in đảo mặt</td>\r\n			<td>Kh&ocirc;ng</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 'Võ Huy Khang', '2022-05-25', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shipping`
--

CREATE TABLE `tbl_shipping` (
  `id_shipping` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `note` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `id_dangky` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `tbl_shipping`
--

INSERT INTO `tbl_shipping` (`id_shipping`, `name`, `phone`, `email`, `address`, `note`, `id_dangky`) VALUES
(1, 'Võ Huy Khang', '0848741399', 'huykhangvo02092000@gmail.com', '156/15 Phú An - Phú Đức  - Long Hồ - Vĩnh Long ', 'Giao đúng hẹn', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_thongke`
--

CREATE TABLE `tbl_thongke` (
  `id` int(11) NOT NULL,
  `ngaydat` varchar(30) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `donhang` int(11) NOT NULL,
  `doanhthu` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `soluongban` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vnpay`
--

CREATE TABLE `tbl_vnpay` (
  `id_vnpay` int(11) NOT NULL,
  `vnp_amount` varchar(50) NOT NULL,
  `vnp_bankCode` varchar(50) NOT NULL,
  `vnp_banktranno` varchar(50) NOT NULL,
  `vnp_cardtype` varchar(50) NOT NULL,
  `vnp_orderinfo` varchar(100) NOT NULL,
  `vnp_paydate` varchar(50) NOT NULL,
  `vnp_tmncode` varchar(50) NOT NULL,
  `vnp_transactionno` varchar(50) NOT NULL,
  `code_cart` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fileup`
--
ALTER TABLE `fileup`
  ADD PRIMARY KEY (`id_fileup`),
  ADD KEY `fk_folder` (`id_folder`);

--
-- Indexes for table `folder`
--
ALTER TABLE `folder`
  ADD PRIMARY KEY (`id_folder`);

--
-- Indexes for table `tai_khoan`
--
ALTER TABLE `tai_khoan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`id_cart`);

--
-- Indexes for table `tbl_cart_details`
--
ALTER TABLE `tbl_cart_details`
  ADD PRIMARY KEY (`id_cart_details`);

--
-- Indexes for table `tbl_dangky`
--
ALTER TABLE `tbl_dangky`
  ADD PRIMARY KEY (`id_dangky`);

--
-- Indexes for table `tbl_danhmuc`
--
ALTER TABLE `tbl_danhmuc`
  ADD PRIMARY KEY (`id_thuonghieu`);

--
-- Indexes for table `tbl_danhmuctructhuoc`
--
ALTER TABLE `tbl_danhmuctructhuoc`
  ADD PRIMARY KEY (`id_danhmuc`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `tbl_momo`
--
ALTER TABLE `tbl_momo`
  ADD PRIMARY KEY (`id_momo`);

--
-- Indexes for table `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD PRIMARY KEY (`id_sanpham`),
  ADD KEY `id_thuonghieu` (`id_thuonghieu`);

--
-- Indexes for table `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  ADD PRIMARY KEY (`id_shipping`),
  ADD KEY `id_dangky` (`id_dangky`);

--
-- Indexes for table `tbl_thongke`
--
ALTER TABLE `tbl_thongke`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_vnpay`
--
ALTER TABLE `tbl_vnpay`
  ADD PRIMARY KEY (`id_vnpay`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fileup`
--
ALTER TABLE `fileup`
  MODIFY `id_fileup` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `folder`
--
ALTER TABLE `folder`
  MODIFY `id_folder` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tai_khoan`
--
ALTER TABLE `tai_khoan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_cart_details`
--
ALTER TABLE `tbl_cart_details`
  MODIFY `id_cart_details` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_dangky`
--
ALTER TABLE `tbl_dangky`
  MODIFY `id_dangky` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_danhmuc`
--
ALTER TABLE `tbl_danhmuc`
  MODIFY `id_thuonghieu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `tbl_danhmuctructhuoc`
--
ALTER TABLE `tbl_danhmuctructhuoc`
  MODIFY `id_danhmuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_momo`
--
ALTER TABLE `tbl_momo`
  MODIFY `id_momo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  MODIFY `id_sanpham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  MODIFY `id_shipping` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_vnpay`
--
ALTER TABLE `tbl_vnpay`
  MODIFY `id_vnpay` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
