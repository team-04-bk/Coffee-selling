-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 08, 2019 at 02:50 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coffee_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `ca_phe`
--

CREATE TABLE `ca_phe` (
  `maSanPham` int(11) NOT NULL,
  `maDanhMuc` int(11) DEFAULT NULL,
  `tenSanPham` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `gia` int(200) NOT NULL,
  `soLuong` int(11) DEFAULT NULL,
  `moTa` text COLLATE utf8_unicode_ci,
  `anh` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ca_phe`
--

INSERT INTO `ca_phe` (`maSanPham`, `maDanhMuc`, `tenSanPham`, `gia`, `soLuong`, `moTa`, `anh`) VALUES
(1, 1, 'Americano Coffee', 50000, 99, 'Ngon vl', '../Products/americano.jpg'),
(2, 1, 'Au lait Coffee', 50000, 99, 'Ngon bình thường', '../Products/au_lait.jpg'),
(3, 1, 'Cappuccino Coffee', 50000, 99, 'Khá ngon', '../Products/cappuccino.jpg'),
(4, 2, 'Latte Coffee', 50000, 99, 'Ngon vl', '../Products/latte.jpg'),
(5, 2, 'Macchiato Coffee', 50000, 99, 'Ngon vl', '../Products/macchiato.jpg'),
(6, 2, 'Marocchino Coffee', 50000, 99, 'Ngon bình thường', '../Products/Marocchino.jpg'),
(7, 3, 'Mazagran Coffee', 50000, 99, 'Ngon ngon', '../Products/mazagran.jpg'),
(8, 3, 'Mocha Coffee', 50000, 99, 'Nah', '../Products/mocha.jpg'),
(9, 3, 'Yuanyang Coffee', 50000, 99, 'Blablabla', '../Products/yuanyang.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `danh_muc`
--

CREATE TABLE `danh_muc` (
  `maDanhMuc` int(11) NOT NULL,
  `tenDanhMuc` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `danh_muc`
--

INSERT INTO `danh_muc` (`maDanhMuc`, `tenDanhMuc`) VALUES
(1, 'Coffee 1'),
(2, 'Coffee 2'),
(3, 'Coffee 3');

-- --------------------------------------------------------

--
-- Table structure for table `khach_hang`
--

CREATE TABLE `khach_hang` (
  `ma_khach_hang` int(11) NOT NULL,
  `ten_tai_khoan` varchar(200) DEFAULT NULL,
  `mat_khau` varchar(200) DEFAULT NULL,
  `ten_khach_hang` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `ngay_sinh` date NOT NULL,
  `gioi_tinh` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `dia_chi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `khach_hang`
--

INSERT INTO `khach_hang` (`ma_khach_hang`, `ten_tai_khoan`, `mat_khau`, `ten_khach_hang`, `ngay_sinh`, `gioi_tinh`, `email`, `phone`, `dia_chi`) VALUES
(1, 'vtlam107', '3', 'Lâm thồn', '2000-01-01', '1', 'vtlam@lam.com', '123', 'abc'),
(2, 'lam123', 'lam123', 'Lam Lam Lam', '2000-03-03', '1', 'lam123@lam.com', '456', 'def');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ca_phe`
--
ALTER TABLE `ca_phe`
  ADD PRIMARY KEY (`maSanPham`),
  ADD KEY `maDanhMuc` (`maDanhMuc`);

--
-- Indexes for table `danh_muc`
--
ALTER TABLE `danh_muc`
  ADD PRIMARY KEY (`maDanhMuc`);

--
-- Indexes for table `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`ma_khach_hang`),
  ADD UNIQUE KEY `ma_khach_hang` (`ma_khach_hang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ca_phe`
--
ALTER TABLE `ca_phe`
  MODIFY `maSanPham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `danh_muc`
--
ALTER TABLE `danh_muc`
  MODIFY `maDanhMuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `ma_khach_hang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ca_phe`
--
ALTER TABLE `ca_phe`
  ADD CONSTRAINT `ca_phe_ibfk_1` FOREIGN KEY (`maDanhMuc`) REFERENCES `danh_muc` (`maDanhMuc`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
