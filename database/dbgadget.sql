-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2018 at 09:16 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbgadget`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `title`) VALUES
(2, 'OTOBI'),
(3, 'REGAL'),
(4, 'HATIL'),
(5, 'PARTEX');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `ID` int(11) NOT NULL,
  `Product` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`) VALUES
(1, 'Chair'),
(2, 'Table'),
(3, 'Bed'),
(4, 'Sofa'),
(5, 'Almirah'),
(6, 'Showcase'),
(11, 'TV Trolley');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `item` text NOT NULL,
  `amount` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `dateOrdered` varchar(100) NOT NULL,
  `dateDelivered` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `name`, `contact`, `address`, `email`, `item`, `amount`, `status`, `dateOrdered`, `dateDelivered`) VALUES
(1, 'Md. Abu Bakar  ', '01950633622', 'rupnagor abashik', 'r@gmail.com', '(1) Otobi Bed model 2-OTOBI-Bed, (1) Otobi Bed model 2-OTOBI-Bed, ', '50000', 'confirmed', '07/18/18 01:06:13 PM', '07/28/18 04:04:19 AM'),
(2, 'Md. Abu Bakar ', '0111666513596', 'rupnagor abashik', 'r@gmail.com', '(1) Otobi Bed model 2-OTOBI-Bed, ', '50000', 'confirmed', '07/28/18 01:54:49 AM', '07/28/18 04:25:22 AM'),
(3, 'Md. Abu Bakar  ', '01950633622', 'rupnagor abashik', 'r@gmail.com', '(1) Hatil Bed model 1-HATIL-Bed, ', '35000', 'confirmed', '07/28/18 01:56:56 AM', '07/28/18 02:01:44 PM'),
(4, 'Md. Abu Bakar  ', '01950633622', 'rupnagor abashik', 'r@gmail.com', '', '0', 'delivered', '07/28/18 02:00:09 AM', '07/28/18 04:04:30 AM'),
(5, 'Md. Abu Bakar  ', '01950633622', 'rupnagor abashik', 'r@gmail.com', '(1) Otobi Bed model 2-OTOBI-Bed, ', '25000', 'delivered', '07/28/18 02:01:49 AM', '07/28/18 04:04:27 AM'),
(6, 'Shamsul Alam Reza', '01950633622', 'rupnagor abashik', 'r@gmail.com', '(2) Hatil Bed model 1-HATIL-Bed, ', '35000', 'unconfirmed', '07/28/18 02:12:12 AM', ''),
(7, 'Md. Jahanur  Alam', '011166651', 'rupnagor abashik', 'r@gmail.com', '(2) Otobi Chair model 2-OTOBI-Chair, ', '9000', 'unconfirmed', '07/28/18 02:13:39 AM', ''),
(8, 'Rajmin Rothy', '01111111111', 'rupnagor abashik', 'r@gmail.com', '(1) Regal Table model 1-REGAL-Table, ', '75000', 'unconfirmed', '07/28/18 02:14:39 AM', ''),
(9, 'Kishor Kumar Das', '01950633622', 'rupnagor abashik', 'r@gmail.com', '(2) Otobi Showcase model 1-OTOBI-Showcase, ', '45000', 'unconfirmed', '07/28/18 11:13:39 AM', ''),
(10, 'AR Abdul Rahim ', '01649761633', 'rupnagor abashik', 'rrr@gmail.com', '(2) Partex Bed model 2-OTOBI-Bed, ', '0', 'delivered', '07/28/18 12:00:32 PM', '07/28/18 02:02:04 PM'),
(11, 'dhdhhfd ndj', '01950633622', 'rupnagor abashik', 'r@gmail.com', '(4) Otobi Chair model 1-OTOBI-Chair, ', '1800', 'confirmed', '07/28/18 12:03:07 PM', '07/28/18 02:03:52 PM'),
(12, 'Kishor Kumar kumar', '01950633622', 'rupnagor abashik', 'r@gmail.com', '(2) Hatil Bed model 1-OTOBI-Bed, ', '35000', 'confirmed', '07/29/18 10:01:31 PM', '07/30/18 12:02:22 AM');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ID` int(11) NOT NULL,
  `imgUrl` text NOT NULL,
  `Product` text NOT NULL,
  `Description` text NOT NULL,
  `Price` double NOT NULL,
  `Category` text NOT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `qty` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ID`, `imgUrl`, `Product`, `Description`, `Price`, `Category`, `brand`, `qty`) VALUES
(2, 'otobibed2.png', 'Otobi Bed model 2', 'Major material	:	Laminated Board Item code	:	BDDB001LBAB001 Color	:	Beech & Black Dimension	:	2074(L)x1520(W)x750(H)mm', 25000, 'Bed', 'OTOBI', 4),
(3, 'regalbed1.jpg', 'Regal Bed model 1', 'Material : Laminated Board Product Code : 99209 Color : Antique Dimension : 219 X 186 X 80 CM (Length X Width X Height)', 20000, 'Bed', 'REGAL', 5),
(4, 'regalbed3.jpeg', 'Regal Bed model 3', 'Material : Laminated Board Product Code : 99209 Color : Antique Dimension : 219 X 186 X 80 CM (Length X Width X Height)', 25990, 'Bed', 'OTOBI', 4),
(5, 'regalbed2.jpg', 'Regal Bed model 2', 'Major material	:	Laminated Board Item code	:	BDDB001LBAB001 Color	:	Beech & Black Dimension	:	2074(L)x1520(W)x750(H)mm', 14000, 'Bed', 'REGAL', 3),
(6, 'hatilbed1.JPG', 'Hatil Bed model 10', 'Material : Laminated Board Product Code : 99209 Color : Antique Dimension : 219 X 186 X 80 CM (Length X Width X Height)', 35000, 'Bed', 'OTOBI', 2),
(7, 'hatilbed2.jpg', 'Hatil Bed model 11', 'Major material	:	Laminated Board Item code	:	BDDB001LBAB001 Color	:	Beech & Black Dimension	:	2074(L)x1520(W)x750(H)mm', 65000, 'Bed', 'HATIL', 3),
(8, 'partexbed1.jpg', 'Partex Bed model 1', 'Material : Laminated Board Product Code : 99209 Color : Antique Dimension : 219 X 186 X 80 CM (Length X Width X Height)', 22000, 'Bed', 'PARTEX', 7),
(9, 'partexbed2.jpg', 'Partex Bed model 2', 'Major material	:	Laminated Board Item code	:	BDDB001LBAB001 Color	:	Beech & Black Dimension	:	2074(L)x1520(W)x750(H)mm', 23500, 'Bed', 'OTOBI', 1),
(10, 'regalchair1.jpg', 'Regal Chair model 1', '  Major material	:	Wood Item code	:	CFDB002FFAR226 Color	:	Walnut Dimension	:	410(L)x475(W)x895(H)mm', 3000, 'Chair', 'REGAL', 6),
(11, 'otobichair2.jpg', 'Otobi Chair model 2', ' Major material	:	Wood Item code	:	CFDB002FFAR226 Color	:	Walnut Dimension	:	420(L)x475(W)x895(H)mm', 4500, 'Chair', 'OTOBI', 7),
(12, 'otobichair1.jpg', 'Otobi Chair model 1', ' Major material	:	Wood Item code	:	CFDB002FFAR226 Color	:	Walnut Dimension	:	410(L)x475(W)x895(H)mm', 1800, 'Chair', 'OTOBI', 1),
(13, 'partexchair1.jpg', 'Partex Chair model 1', ' Major material	:	Wood Item code	:	CFDP041FFBN162 Color	:	Chestnut Dimension	:	460(L)x575(W)x1050(H)mm', 2300, 'Chair', 'PARTEX', 4),
(103, 'partexchair2.jpg', 'Partex Chair model 2', ' Major material	:	Wood Item code	:	CFDP041FFBN162 Color	:	Chestnut Dimension	:	460(L)x575(W)x1050(H)mm', 2250, 'Chair', 'PARTEX', 7),
(104, 'hatilchair1.jpg', 'Hatil Chair model 1', ' Major material	:	Wood Item code	:	CFDB002FFAR226 Color	:	Walnut Dimension	:	420(L)x475(W)x895(H)mm', 6600, 'Chair', 'HATIL', 4),
(105, 'regalshowcase1.jpg', 'Regal Showcase model 1', ' Major material	:	Processed Wood Item code	:	SCDP008WDAR014 Color	:	0 Dimension	:	1900(L)x900(W)x450(H)mm', 35999, 'Showcase', 'REGAL', 3),
(106, 'otobishowcase1.jpeg', 'Otobi Showcase model 1', ' Major material	:	Processed Wood Item code	:	SCDP008WDAR014 Color	:	0 Dimension	:	1900(L)x900(W)x450(H)mm', 45000, 'Showcase', 'OTOBI', 1),
(107, 'partexshowcase1.jpg', 'Partex Showcase model 1', ' Major material	:	Processed Wood Item code	:	SCDP008WDAR014 Color	:	0 Dimension	:	1900(L)x900(W)x450(H)mm', 48900, 'Showcase', 'PARTEX', 5),
(108, 'hatilshowcase1.jpg', 'Hatil Showcase model 1', ' Major material	:	Processed Wood Item code	:	SCDP008WDAR014 Color	:	0 Dimension	:	1900(L)x900(W)x450(H)mm', 60000, 'Showcase', 'HATIL', 2),
(109, 'otobialmira1.jpg', 'Otobi Almira model 1', 'Major material	:	Laminated Board Item code	:	CBDB018LBBI024 Color	:	Oak Dimension	:	817(L)x500(W)x1800(H)mm', 28000, 'Almirah', 'OTOBI', 2),
(110, 'partexalmira1.jpg', 'Partex Almira model 1', 'Major material	:	Laminated Board Item code	:	CBDB018LBBI024 Color	:	Oak Dimension	:	817(L)x500(W)x1800(H)mm', 21000, 'Almirah', 'PARTEX', 5),
(111, 'hatiltable1.jpg', 'Hatil Table model 1', 'Major material	:	Wood Item code	:	TDDP039WDBN027 Color	:	Chestnut Dimension	:	1650(L)x950(W)x750(H)mm', 42000, 'Table', 'HATIL', 2),
(112, 'partextable1.jpg', 'Regal Table model 1', 'Major material	:	Wood Item code	:	TDDP039WDBN027 Color	:	Chestnut Dimension	:	1650(L)x950(W)x750(H)mm', 75000, 'Table', 'OTOBI', 3),
(113, 'otobitable1.jpg', 'Otobi Table model 1', 'Major material	:	Wood Item code	:	TDDP039WDBN027 Color	:	Chestnut Dimension	:	1650(L)x950(W)x750(H)mm', 56000, 'Table', 'OTOBI', 3),
(114, '1.jpg', 'Otobi Tv Trolly Model1', 'Major material	:	Laminated Board Item code	:	TVCP007LBAA024 Color	:	0 Dimension	:	1864(L)x416(W)x1500(H)mm', 15000, 'TV Trolley', 'OTOBI', 3),
(115, '4.jpg', 'Otobi Tv Trolly Model 2', 'Major material	:	Laminated Board Item code	:	TVCP007LBAA024 Color	:	0 Dimension	:	1864(L)x416(W)x1500(H)mm', 25000, 'TV Trolley', 'OTOBI', 5),
(116, '5.jpg', 'Partex Tv Trolly Model1', 'Major material	:	Laminated Board Item code	:	TVCP007LBAA024 Color	:	0 Dimension	:	1864(L)x416(W)x1500(H)mm', 18000, 'TV Trolley', 'PARTEX', 3),
(117, '6.jpg', 'Partex Tv Trolly Model 2', 'Major material	:	Laminated Board Item code	:	TVCP007LBAA024 Color	:	0 Dimension	:	1864(L)x416(W)x1500(H)mm', 16000, 'TV Trolley', 'PARTEX', 3),
(118, '9.jpg', 'Hatil Tv Trolly Model 10', 'Major material	:	Laminated Board Item code	:	TVCP007LBAA024 Color	:	0 Dimension	: 1864(L)x416(W)x1500(H)mm', 18500, 'TV Trolley', 'HATIL', 2),
(119, '7.jpg', 'Regal Tv Trolly Model 10', 'Major material	:	Laminated Board Item code	:	TVCP007LBAA024 Color	:	0 Dimension	: 1864(L)x416(W)x1500(H)mm', 22500, 'TV Trolley', 'REGAL', 3),
(120, '10.jpg', 'Partex Table model 1', 'Major material	:	Wood Item code	: TDDP039WDBN027 Color	:	Chestnut Dimension	:	1650(L)x950(W)x750(H)mm', 45600, 'Table', 'PARTEX', 4),
(121, '200.jpg', 'Otobi Sofa  Model1', ' Major material	:	Processed Wood Item code	:	SDCP039FFBN172 Color	:	Chestnut Dimension	:	1400(L)x653(W)x803(H)mm', 85000, 'Sofa', 'OTOBI', 2),
(122, '400.jpg', 'Regal Sofa Model 10', ' Major material	:	Processed Wood Item code	:	SDCP039FFBN172 Color	:	Chestnut Dimension	:	1400(L)x653(W)x803(H)mm', 75000, 'Sofa', 'REGAL', 3),
(123, '100.jpg', 'Partex Sofa Model 1', ' Major material	:	Processed Wood Item code	:	SDCP039FFBN172 Color	:	Chestnut Dimension	:	1400(L)x653(W)x803(H)mm', 45000, 'Sofa', 'PARTEX', 3),
(124, '700.jpg', 'Hatil Sofa Model 11', ' Major material	:	Processed Wood Item code	:	SDCP039FFBN172 Color	:	Chestnut Dimension	:	1400(L)x653(W)x803(H)mm', 85000, 'Sofa', 'HATIL', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'administrator', 'bobby'),
(2, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
