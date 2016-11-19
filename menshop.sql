-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2016 at 08:05 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `menshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `ctdh`
--

CREATE TABLE `ctdh` (
  `madh` int(11) NOT NULL,
  `masp` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `soluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ctdh`
--

INSERT INTO `ctdh` (`madh`, `masp`, `soluong`) VALUES
(4, 'ASM01', 2),
(4, 'ASM02', 2),
(4, 'G02', 1),
(5, 'ASM02', 2),
(5, 'ASM03', 1),
(5, 'QJ01', 1),
(6, 'ASM02', 3),
(6, 'ASM03', 2),
(7, 'ASM03', 1),
(7, 'AT02', 2),
(7, 'QJ01', 2);

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `madh` int(11) NOT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ngaydh` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tongtien` int(11) NOT NULL,
  `hotennn` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `diachinn` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` int(11) NOT NULL,
  `trangthaitt` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`madh`, `username`, `ngaydh`, `tongtien`, `hotennn`, `diachinn`, `sdt`, `trangthaitt`) VALUES
(4, 'josvantri1', '2016-08-18 17:14:08', 1020000, 'luong van tri', '99 man thien', 984219990, 1),
(5, 'triluong', '2016-08-18 17:28:54', 860000, 'tran minh tam', '9 hien vuong', 1667876090, 0),
(6, 'josvantri1', '2016-08-25 07:53:34', 940000, 'Lương Văn Trí', '99 Man Thiện-Tăng Nhơn Phú A-Q.9-Tp.HCM', 1667476284, 0),
(7, 'josvantri1', '2016-08-25 09:56:26', 1100000, 'Lương Văn Trí', '99 Man Thiện-Tăng Nhơn Phú A-Q.9-Tp.HCM', 1667476284, 0);

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `diachi` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`username`, `password`, `fullname`, `email`, `diachi`, `sdt`) VALUES
('josvantri1', 'tamthanh', 'Lương Văn Trí', 'pet.vantri@yahoo.com.vn', '99 Man Thiện-Tăng Nhơn Phú A-Q.9-Tp.HCM', 1667476284),
('triluong', 'tamthanh', 'luong van tri', 'pet.vantri@yahoo.com.vn', '99 man thien', 1667476284),
('triluong123', 'triluong', 'luong van tri', 'pet.vantri@yahoo.com.vn', '9 hiên vuong', 1667476352);

-- --------------------------------------------------------

--
-- Table structure for table `nhomsp`
--

CREATE TABLE `nhomsp` (
  `manhom` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tennhom` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nhomsp`
--

INSERT INTO `nhomsp` (`manhom`, `tennhom`) VALUES
('ASM', 'Áo Sơ Mi'),
('AT', 'Áo Thun'),
('G', 'Giày'),
('QJ', 'Quần Jean'),
('QK', 'Quần Kaki');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `masp` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `manhom` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tensp` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `anhsp` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `gia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`masp`, `manhom`, `tensp`, `anhsp`, `gia`) VALUES
('ASM01', 'ASM', 'Áo Sơ Mi A01', '\\menshop\\images\\aosomi\\s1.jpg', 180000),
('ASM02', 'ASM', 'Áo Sơ Mi A02', '\\menshop\\images\\aosomi\\s2.jpg', 180000),
('ASM03', 'ASM', 'Áo Sơ Mi A03', '\\menshop\\images\\aosomi\\s3.jpg', 200000),
('ASM04', 'ASM', 'Áo Sơ Mi A04', '\\menshop\\images\\aosomi\\s4.jpg', 200000),
('ASM05', 'ASM', 'Áo Sơ Mi A05', '\\menshop\\images\\aosomi\\s5.jpg', 220000),
('ASM06', 'ASM', 'Áo Sơ Mi A06', '\\menshop\\images\\aosomi\\s6.jpg', 180000),
('ASM07', 'ASM', 'Áo Sơ Mi A07', '\\menshop\\images\\aosomi\\s7.jpg', 180000),
('ASM08', 'ASM', 'Áo Sơ Mi A08', '\\menshop\\images\\aosomi\\s8.jpg', 180000),
('AT01', 'AT', 'Áo Thun T01', '\\menshop\\images\\aothun\\t1.jpg', 150000),
('AT02', 'AT', 'Áo Thun T02', '\\menshop\\images\\aothun\\t2.jpg', 150000),
('AT03', 'AT', 'Áo Thun T03', '\\menshop\\images\\aothun\\t3.jpg', 130000),
('AT04', 'AT', 'Áo Thun T04', '\\menshop\\images\\aothun\\t4.jpg', 160000),
('AT05', 'AT', 'Áo Thun T05', '\\menshop\\images\\aothun\\t5.jpg', 160000),
('AT06', 'AT', 'Áo Thun T06', '\\menshop\\images\\aothun\\t6.jpg', 170000),
('AT07', 'AT', 'Áo Thun T07', '\\menshop\\images\\aothun\\t7.jpg', 150000),
('AT08', 'AT', 'Áo Thun T08', '\\menshop\\images\\aothun\\t8.jpg', 140000),
('G01', 'G', 'GIày G01', '\\menshop\\images\\giaytt\\g1.jpg', 320000),
('G02', 'G', 'GIày G02', '\\menshop\\images\\giaytt\\g2.jpg', 300000),
('G03', 'G', 'GIày G03', '\\menshop\\images\\giaytt\\g3.jpg', 300000),
('G04', 'G', 'GIày G04', '\\menshop\\images\\giaytt\\g4.jpg', 320000),
('G05', 'G', 'GIày G05', '\\menshop\\images\\giaytt\\g5.jpg', 300000),
('G06', 'G', 'GIày G06', '\\menshop\\images\\giaytt\\g6.jpg', 320000),
('G07', 'G', 'GIày G07', '\\menshop\\images\\giaytt\\g7.jpg', 320000),
('G08', 'G', 'GIày G08', '\\menshop\\images\\giaytt\\g8.jpg', 300000),
('QJ01', 'QJ', 'Quần Jean J01', '\\menshop\\images\\quanjean\\j1.jpg', 300000),
('QJ02', 'QJ', 'Quần Jean J02', '\\menshop\\images\\quanjean\\j2.jpg', 320000),
('QJ03', 'QJ', 'Quần Jean J03', '\\menshop\\images\\quanjean\\j3.jpg', 350000),
('QJ04', 'QJ', 'Quần Jean J04', '\\menshop\\images\\quanjean\\j4.jpg', 320000),
('QJ05', 'QJ', 'Quần Jean J05', '\\menshop\\images\\quanjean\\j5.jpg', 350000),
('QJ06', 'QJ', 'Quần Jean J06', '\\menshop\\images\\quanjean\\j6.jpg', 300000),
('QK01', 'QK', 'Quần Kaki K01', '\\menshop\\images\\quankk\\k1.jpg', 250000),
('QK02', 'QK', 'Quần Kaki K02', '\\menshop\\images\\quankk\\k2.jpg', 250000),
('QK03', 'QK', 'Quần Kaki K03', '\\menshop\\images\\quankk\\k3.jpg', 250000),
('QK04', 'QK', 'Quần Kaki K04', '\\menshop\\images\\quankk\\k4.jpg', 250000),
('QK05', 'QK', 'Quần Kaki K05', '\\menshop\\images\\quankk\\k5.jpg', 250000),
('QK06', 'QK', 'Quần Kaki K06', '\\menshop\\images\\quankk\\k6.jpg', 270000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ctdh`
--
ALTER TABLE `ctdh`
  ADD KEY `masp` (`masp`),
  ADD KEY `madh` (`madh`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`madh`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `nhomsp`
--
ALTER TABLE `nhomsp`
  ADD PRIMARY KEY (`manhom`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`masp`),
  ADD KEY `manhom` (`manhom`),
  ADD KEY `manhom_2` (`manhom`),
  ADD KEY `manhom_3` (`manhom`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `madh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `ctdh`
--
ALTER TABLE `ctdh`
  ADD CONSTRAINT `ctdh_ibfk_1` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ctdh_ibfk_2` FOREIGN KEY (`madh`) REFERENCES `donhang` (`madh`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`username`) REFERENCES `khachhang` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `fk_sanpham_nhomsp` FOREIGN KEY (`manhom`) REFERENCES `nhomsp` (`manhom`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
