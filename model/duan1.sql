-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 04, 2024 at 05:02 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `duan1`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `tk_id` int NOT NULL,
  `tk_user` varchar(255) NOT NULL,
  `tk_password` varchar(255) NOT NULL,
  `tk_email` varchar(255) NOT NULL,
  `tk_address` text,
  `id_role` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`tk_id`, `tk_user`, `tk_password`, `tk_email`, `tk_address`, `id_role`) VALUES
(2, 'admin', 'khanhden', 'admin@gmail.com', NULL, 1),
(14, 'khanhden', '123456', 'khanhden1622@gmail.com', 'thanh hoài - thanh khương', 2),
(39, 'trongKhanh', 'khanhden', 'khanhden005@gmail.com', 'thanh hoài-thanh khương', 2),
(40, 'thanhtuan', 'khanhden', 'thanhtuan@gmail.com', 'Quế Võ Bắc Ninh', 2);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `gh_id` int NOT NULL,
  `id_tk` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`gh_id`, `id_tk`) VALUES
(34, 2),
(35, 14),
(36, 39),
(37, 40);

-- --------------------------------------------------------

--
-- Table structure for table `cartdetail`
--

CREATE TABLE `cartdetail` (
  `cd_id` int NOT NULL,
  `id_gh` int NOT NULL,
  `id_sp` int NOT NULL,
  `cd_totalamount` int NOT NULL DEFAULT '0',
  `cd_quantity` int NOT NULL DEFAULT '1',
  `cd_option` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `cd_optionColor` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cartdetail`
--

INSERT INTO `cartdetail` (`cd_id`, `id_gh`, `id_sp`, `cd_totalamount`, `cd_quantity`, `cd_option`, `cd_optionColor`) VALUES
(167, 36, 30, 0, 1, '512GB', 'Trắng'),
(174, 35, 31, 0, 1, '128GB', 'Đen'),
(175, 35, 33, 0, 1, '128GB', 'Đen');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `dm_id` int NOT NULL,
  `dm_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`dm_id`, `dm_name`) VALUES
(1, 'iPhone'),
(2, 'SamSung'),
(21, 'Oppo'),
(22, 'Xiaomi');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `bl_id` int NOT NULL,
  `bl_content` text NOT NULL,
  `bl_cmtdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `id_tk` int DEFAULT NULL,
  `id_sp` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`bl_id`, `bl_content`, `bl_cmtdate`, `id_tk`, `id_sp`) VALUES
(14, 'Điện thoại rất đẹp, shop gioa nhanh:)))', '2024-12-04 14:46:04', 14, 33);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `dh_id` int NOT NULL,
  `dh_orderdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `dh_status` varchar(255) DEFAULT NULL,
  `dh_totalamount` decimal(12,2) NOT NULL,
  `dh_addressUser` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `id_tk` int DEFAULT NULL,
  `dh_nameUser` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `dh_note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `dh_emailUser` varchar(255) NOT NULL,
  `dh_phoneUser` int NOT NULL,
  `dh_countryPay` varchar(255) NOT NULL,
  `dh_cityPay` varchar(255) NOT NULL,
  `dh_districtPay` varchar(255) NOT NULL,
  `dh_communePay` varchar(255) NOT NULL,
  `dh_messagePay` varchar(255) NOT NULL,
  `sp_quantity` varchar(255) NOT NULL,
  `dh_ma` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`dh_id`, `dh_orderdate`, `dh_status`, `dh_totalamount`, `dh_addressUser`, `id_tk`, `dh_nameUser`, `dh_note`, `dh_emailUser`, `dh_phoneUser`, `dh_countryPay`, `dh_cityPay`, `dh_districtPay`, `dh_communePay`, `dh_messagePay`, `sp_quantity`, `dh_ma`) VALUES
(114, '2024-12-04 08:36:54', 'Đã Xác Nhận', 210440000.00, 'Số nhà 25', 39, 'Nguyễn Trọng Khánh', NULL, 'khanhden@gmail.com', 987654321, 'Việt Nam', 'Bắc Ninh', 'Thuận Thành', 'Thanh Khương', 'c', '6', 'FS_471014'),
(115, '2024-12-04 14:44:25', 'Đã nhận hàng', 73570000.00, 'Số nhà 25', 14, 'Nguyễn Trọng Khánh', NULL, 'khanhden@gmail.com', 987654321, 'Việt Nam', 'Bắc Ninh', 'Thuận Thành', 'Thanh Khương', 'Ship chiều tối', '3', 'FS_108890'),
(116, '2024-12-04 16:33:33', 'chờ xác nhận', 151650000.00, 'Số nhà 25', 40, 'Nguyễn Trọng Khánh', NULL, 'khanhden@gmail.com', 987654321, 'Việt Nam', 'Bắc Ninh', 'Thuận Thành', 'Thanh Khương', 'Ship tối', '5', 'FS_326201');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `ct_id` int NOT NULL,
  `id_dh` int DEFAULT NULL,
  `id_sp` int DEFAULT NULL,
  `ct_quantity` int NOT NULL,
  `od_option` varchar(255) NOT NULL,
  `od_optionColor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`ct_id`, `id_dh`, `id_sp`, `ct_quantity`, `od_option`, `od_optionColor`) VALUES
(140, 114, 30, 3, '128GB', 'Trắng'),
(141, 114, 30, 2, '512GB', 'Gold'),
(142, 114, 35, 1, '128GB', 'Đen'),
(143, 115, 33, 1, '128GB', 'Đen'),
(144, 115, 39, 1, '256GB', 'Trắng'),
(145, 115, 35, 1, '256GB', 'Trắng'),
(146, 116, 30, 4, '256GB', 'Vàng'),
(147, 116, 34, 1, '512GB', 'Trắng');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `sp_id` int NOT NULL,
  `sp_name` varchar(255) NOT NULL,
  `sp_image` varchar(255) DEFAULT NULL,
  `sp_price` decimal(12,2) NOT NULL,
  `sp_title` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'Không phí chuyển đổi khi trả góp 0% qua thẻ tín dụng kỳ hạn 3-6 tháng',
  `sp_quantity` int NOT NULL,
  `sp_describe` text,
  `id_dm` int DEFAULT NULL,
  `sp_ma` varchar(255) DEFAULT NULL,
  `sp_pricedel` decimal(12,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`sp_id`, `sp_name`, `sp_image`, `sp_price`, `sp_title`, `sp_quantity`, `sp_describe`, `id_dm`, `sp_ma`, `sp_pricedel`) VALUES
(30, 'iPhone 16 Pro Max 256GB | Chính hãng VN/A', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:358:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/i/p/iphone-16-pro-max.png', 33690000.00, 'Không phí chuyển đổi khi trả góp 0% qua thẻ tín dụng kỳ hạn 3-6 tháng', 12, '..', 1, 'SP_875456', 34990000.00),
(31, 'iPhone 15 Pro Max 256GB | Chính hãng VN/A', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:358:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/i/p/iphone-15-pro-max_3.png', 29290000.00, 'Không phí chuyển đổi khi trả góp 0% qua thẻ tín dụng kỳ hạn 3-6 tháng', 12, '..', 1, 'SP_921377', 34990000.00),
(32, 'iPhone 13 256GB | Chính hãng VN/A', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:358:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/i/p/iphone-13_2_.png', 13490000.00, 'Không phí chuyển đổi khi trả góp 0% qua thẻ tín dụng kỳ hạn 3-6 tháng', 12, '..', 1, 'SP_108152', 17290000.00),
(33, 'iPhone 16 Plus 128GB | Chính hãng VN/A', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:358:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/i/p/iphone-16-plus-1.png', 25490000.00, 'Không phí chuyển đổi khi trả góp 0% qua thẻ tín dụng kỳ hạn 3-6 tháng', 12, '..', 1, 'SP_122787', 25990000.00),
(34, 'iPhone 14 128GB | Chính hãng VN/A', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:358:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/i/p/iphone-14_1.png', 16890000.00, 'Không phí chuyển đổi khi trả góp 0% qua thẻ tín dụng kỳ hạn 3-6 tháng', 12, '..', 1, 'SP_108111', 19990000.00),
(35, 'Samsung Galaxy Z Fold6 12GB 256GB', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:358:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/s/a/samsung-galaxy-z-fold-6-xanh_5_.png', 41990000.00, 'Không phí chuyển đổi khi trả góp 0% qua thẻ tín dụng kỳ hạn 3-6 tháng', 12, '..', 2, 'SP_196427', 43290000.00),
(37, 'Samsung Galaxy S23 8GB 128GB - Chỉ có tại FourSmart', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:358:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/s/a/samsung-s23_1.png', 13990000.00, 'Không phí chuyển đổi khi trả góp 0% qua thẻ tín dụng kỳ hạn 3-6 tháng', 10, '..', 2, 'SP_808258', 22990000.00),
(38, 'Samsung Galaxy S23 FE 5G 8GB 128GB', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:358:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/s/a/samsung-s23-fe.png', 9890000.00, 'Không phí chuyển đổi khi trả góp 0% qua thẻ tín dụng kỳ hạn 3-6 tháng', 10, '..', 2, 'SP_225112', 14890000.00),
(39, 'Samsung Galaxy A16 5G 8GB 128GB', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:358:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/s/a/samsung-a16-5g_2_.png', 6090000.00, 'Không phí chuyển đổi khi trả góp 0% qua thẻ tín dụng kỳ hạn 3-6 tháng', 10, '...', 2, 'SP_322623', 7000000.00),
(40, 'Samsung Galaxy S24 FE 5G 8GB 128GB', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:358:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/d/i/dien-thoai-samsung-galaxy-s24-fe_3__4.png', 16490000.00, 'Không phí chuyển đổi khi trả góp 0% qua thẻ tín dụng kỳ hạn 3-6 tháng', 10, '...', 2, 'SP_770969', 16990000.00),
(41, 'OPPO Find N3 16GB 512GB', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:358:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/f/i/find_n3_-_combo_product_-_gold.png', 41990000.00, 'Không phí chuyển đổi khi trả góp 0% qua thẻ tín dụng kỳ hạn 3-6 tháng', 12, '...', 21, 'SP_742392', 44990000.00),
(43, 'OPPO Find X5 Pro 12GB 256GB - Giá mới chỉ có tại CellphoneS', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:358:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/d/o/download_1__6_6.png', 15990000.00, 'Không phí chuyển đổi khi trả góp 0% qua thẻ tín dụng kỳ hạn 3-6 tháng', 11, '...', 21, 'SP_187849', 18990000.00),
(44, 'OPPO Reno10 Pro+ 5G 12GB 256GB', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:358:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/o/p/oppo-reno10-pro-plus-tim.png', 14190000.00, 'Không phí chuyển đổi khi trả góp 0% qua thẻ tín dụng kỳ hạn 3-6 tháng', 10, '...', 21, 'SP_842769', 17490000.00),
(45, 'OPPO Find X5 Pro 5G 12GB 256GB - Đã Kích Hoạt', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:358:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/d/o/download_1__6_6_1_2.png', 12590000.00, 'Không phí chuyển đổi khi trả góp 0% qua thẻ tín dụng kỳ hạn 3-6 tháng', 1, '...', 21, 'SP_396713', 19540000.00);

-- --------------------------------------------------------

--
-- Table structure for table `productcolor`
--

CREATE TABLE `productcolor` (
  `pc_id` int NOT NULL,
  `id_sp` int NOT NULL,
  `pc_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `productcolor`
--

INSERT INTO `productcolor` (`pc_id`, `id_sp`, `pc_name`) VALUES
(69, 30, 'Trắng'),
(70, 30, 'Vàng'),
(71, 31, 'Đen'),
(72, 31, 'Trắng'),
(73, 31, 'Vàng'),
(74, 32, 'Đen'),
(75, 32, 'Trắng'),
(76, 32, 'Vàng'),
(77, 33, 'Đen'),
(78, 33, 'Trắng'),
(79, 33, 'Vàng'),
(80, 34, 'Đen'),
(81, 34, 'Trắng'),
(82, 34, 'Vàng'),
(83, 35, 'Đen'),
(84, 35, 'Trắng'),
(85, 35, 'Vàng'),
(86, 37, 'Đen'),
(87, 37, 'Trắng'),
(88, 37, 'Vàng'),
(89, 39, 'Đen'),
(90, 39, 'Trắng'),
(91, 39, 'Vàng'),
(92, 40, 'Đen'),
(93, 40, 'Trắng'),
(94, 40, 'Vàng'),
(95, 41, 'Đen'),
(96, 41, 'Trắng'),
(97, 41, 'Vàng'),
(101, 43, 'Đen'),
(102, 43, 'Trắng'),
(103, 43, 'Vàng'),
(104, 44, 'Đen'),
(105, 44, 'Trắng'),
(106, 44, 'Vàng'),
(107, 45, 'Đen'),
(108, 45, 'Trắng'),
(109, 45, 'Vàng'),
(113, 38, 'Đen'),
(114, 38, 'Vàng'),
(115, 38, 'Đỏ'),
(116, 38, 'Trắng'),
(118, 30, 'Đen');

-- --------------------------------------------------------

--
-- Table structure for table `productmemory`
--

CREATE TABLE `productmemory` (
  `pm_id` int NOT NULL,
  `id_sp` int NOT NULL,
  `pm_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `productmemory`
--

INSERT INTO `productmemory` (`pm_id`, `id_sp`, `pm_name`) VALUES
(90, 30, '128GB'),
(91, 30, '256GB'),
(92, 30, '512GB'),
(93, 31, '128GB'),
(94, 31, '256GB'),
(95, 31, '512GB'),
(96, 32, '128GB'),
(97, 32, '256GB'),
(98, 32, '512GB'),
(99, 33, '128GB'),
(100, 33, '256GB'),
(101, 33, '512GB'),
(102, 34, '128GB'),
(103, 34, '256GB'),
(104, 34, '512GB'),
(105, 35, '128GB'),
(106, 35, '256GB'),
(107, 35, '512GB'),
(108, 37, '128GB'),
(109, 37, '256GB'),
(110, 37, '512GB'),
(111, 39, '128GB'),
(112, 39, '256GB'),
(113, 39, '512GB'),
(114, 40, '128GB'),
(115, 40, '256GB'),
(116, 40, '512GB'),
(117, 41, '128GB'),
(118, 41, '256GB'),
(119, 41, '512GB'),
(123, 43, '128GB'),
(124, 43, '256GB'),
(125, 43, '512GB'),
(126, 44, '128GB'),
(127, 44, '256GB'),
(128, 44, '512GB'),
(129, 45, '128GB'),
(130, 45, '256GB'),
(131, 45, '512GB'),
(132, 38, '128GB'),
(138, 38, '128GB'),
(141, 38, '512GB');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int NOT NULL,
  `role_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(1, 'admin'),
(2, 'user\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`tk_id`),
  ADD KEY `role_id` (`id_role`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`gh_id`),
  ADD KEY `tk_id` (`id_tk`);

--
-- Indexes for table `cartdetail`
--
ALTER TABLE `cartdetail`
  ADD PRIMARY KEY (`cd_id`),
  ADD KEY `id_gh` (`id_gh`),
  ADD KEY `id_sp` (`id_sp`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`dm_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`bl_id`),
  ADD KEY `tk_id` (`id_tk`),
  ADD KEY `comment_ibfk_2` (`id_sp`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`dh_id`),
  ADD KEY `tk_id` (`id_tk`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`ct_id`),
  ADD KEY `dh_id` (`id_dh`),
  ADD KEY `sp_id` (`id_sp`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`sp_id`),
  ADD KEY `dm_id` (`id_dm`);

--
-- Indexes for table `productcolor`
--
ALTER TABLE `productcolor`
  ADD PRIMARY KEY (`pc_id`),
  ADD KEY `fk_productcolor_product` (`id_sp`);

--
-- Indexes for table `productmemory`
--
ALTER TABLE `productmemory`
  ADD PRIMARY KEY (`pm_id`),
  ADD KEY `fk_productmemory_product` (`id_sp`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`),
  ADD UNIQUE KEY `role_name` (`role_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `tk_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `gh_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `cartdetail`
--
ALTER TABLE `cartdetail`
  MODIFY `cd_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `dm_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `bl_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `dh_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `ct_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `sp_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `productcolor`
--
ALTER TABLE `productcolor`
  MODIFY `pc_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `productmemory`
--
ALTER TABLE `productmemory`
  MODIFY `pm_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`role_id`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`id_tk`) REFERENCES `account` (`tk_id`);

--
-- Constraints for table `cartdetail`
--
ALTER TABLE `cartdetail`
  ADD CONSTRAINT `cartDetail_ibfk_1` FOREIGN KEY (`id_gh`) REFERENCES `cart` (`gh_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cartDetail_ibfk_2` FOREIGN KEY (`id_sp`) REFERENCES `product` (`sp_id`) ON DELETE CASCADE;

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`id_tk`) REFERENCES `account` (`tk_id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`id_sp`) REFERENCES `product` (`sp_id`) ON DELETE CASCADE;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`id_tk`) REFERENCES `account` (`tk_id`);

--
-- Constraints for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `orderdetail_ibfk_1` FOREIGN KEY (`id_dh`) REFERENCES `order` (`dh_id`),
  ADD CONSTRAINT `orderdetail_ibfk_2` FOREIGN KEY (`id_sp`) REFERENCES `product` (`sp_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_dm`) REFERENCES `category` (`dm_id`);

--
-- Constraints for table `productcolor`
--
ALTER TABLE `productcolor`
  ADD CONSTRAINT `fk_productcolor_product` FOREIGN KEY (`id_sp`) REFERENCES `product` (`sp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `productmemory`
--
ALTER TABLE `productmemory`
  ADD CONSTRAINT `fk_productmemory_product` FOREIGN KEY (`id_sp`) REFERENCES `product` (`sp_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
