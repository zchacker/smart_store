-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2019 at 05:57 PM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smartstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `invoice_no` varchar(350) COLLATE utf8_unicode_ci NOT NULL,
  `tailor` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `fabrics` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `design` varchar(350) COLLATE utf8_unicode_ci NOT NULL,
  `is_photo` int(11) NOT NULL DEFAULT '1',
  `width` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `invoice_no`, `tailor`, `fabrics`, `design`, `is_photo`, `width`, `height`, `total`) VALUES
(1, 'inv_5c06e0d28a005', 'محمد عبداللطيف 105 SAR', 'قماش ازرق خشن 11 SAR', './temp/design_5c06dc56d4dc8.png', 1, 22, 120, 116);

-- --------------------------------------------------------

--
-- Table structure for table `designers`
--

CREATE TABLE `designers` (
  `id` int(11) NOT NULL,
  `name` varchar(350) COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `designers`
--

INSERT INTO `designers` (`id`, `name`, `price`) VALUES
(1, 'مصممة أمل', 50),
(2, 'مصممة عبير', 60),
(3, 'مصمم أحمد', 50),
(4, 'مصمم عبدالمجيد', 65);

-- --------------------------------------------------------

--
-- Table structure for table `fabrics`
--

CREATE TABLE `fabrics` (
  `id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `fabrics`
--

INSERT INTO `fabrics` (`id`, `name`, `photo`, `price`) VALUES
(1, 'قماش ازرق', '0403741.jpg', 12.5),
(2, 'قماش ازرق خشن', '0445787.jpg', 11),
(3, 'قماش بني داكن', '0445790.jpg', 9),
(4, 'قماش وردي فاتح', 'FF-288.jpg', 17),
(5, 'قماش ازرق مخطط', 'FF-305.jpg', 16),
(6, 'قماش أحمر ', 'FF-325.jpg', 13),
(7, 'قماش بني مموج', 'FH-751.jpg', 18),
(8, 'Beads stone embroidery lace Fabric', 'p1.jpg', 55),
(9, '3D hand embroidery with beads on the mesh fabric', 'p2.jpg', 122),
(10, 'Velvet Fabric', 'p3.jpg', 69),
(11, 'Sequin Fabric', 'p4.jpg', 85);

-- --------------------------------------------------------

--
-- Table structure for table `tailor`
--

CREATE TABLE `tailor` (
  `id` int(11) NOT NULL,
  `name` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tailor`
--

INSERT INTO `tailor` (`id`, `name`, `price`) VALUES
(1, 'نهى احمد', 100),
(2, 'محمد عبداللطيف', 105),
(3, 'العنود', 150),
(4, 'محمد', 200);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designers`
--
ALTER TABLE `designers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fabrics`
--
ALTER TABLE `fabrics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tailor`
--
ALTER TABLE `tailor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `designers`
--
ALTER TABLE `designers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `fabrics`
--
ALTER TABLE `fabrics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tailor`
--
ALTER TABLE `tailor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
