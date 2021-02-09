-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: mysql5044.site4now.net
-- Generation Time: Jan 24, 2021 at 06:21 AM
-- Server version: 8.0.21
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_a6d9b2_bety`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `email`, `password`) VALUES
(1, 'admin@bety.com', 'admin18181');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CategoryNo` int NOT NULL,
  `chef_id` int NOT NULL,
  `CategoryName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CategoryNo`, `chef_id`, `CategoryName`) VALUES
(1, 1, 'Breakfast'),
(1, 4, 'Breakfast'),
(2, 1, 'Dinner'),
(3, 2, 'Drinks'),
(4, 3, 'Desert'),
(5, 5, 'Diet');

-- --------------------------------------------------------

--
-- Table structure for table `chefs`
--

CREATE TABLE `chefs` (
  `chef_id` int NOT NULL,
  `chef_name` varchar(100) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `rate` int NOT NULL,
  `about_chef` varchar(500) NOT NULL,
  `admin_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `chefs`
--

INSERT INTO `chefs` (`chef_id`, `chef_name`, `phone`, `address`, `email`, `rate`, `about_chef`, `admin_id`) VALUES
(1, 'aya', '01254525551', 'aaaaaaaaaaaaaaaaaaa', 'aya@bety.com', 5, 'homemade and clean', 1),
(2, 'Emad', '01254525552', 'eeeeeeeeeeeeeeeeeeeee', 'emad@bety.com', 4, 'good for you ;)', 1),
(3, 'Naglaa', '01254525553', 'nnnnnnnnnnnnnnnnnnnnnn', 'naglaa@bety.com', 8, 'professional', 1),
(4, 'Sara', '01254525554', 'ssssssssssssssssssssssssssssssss', 'sara@bety.com', 6, 'exelent', 1),
(5, 'Sherief', '01254525555', 'shshshsh', 'sherif@bety.com', 5, 'good ;)', 1),
(6, 'Wesam', '01254525556', 'wwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww', 'wesam@bety.com', 4, 'healthy ;)', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cus_id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cus_id`, `name`, `password`, `phone`, `email`, `address`) VALUES
(1, 'esraa', '@Esraa81', '01201227240', 'esraa.eissa123@gmail.com', '11 hany kamel st');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `food_code` int NOT NULL,
  `food_name` varchar(50) NOT NULL,
  `food_description` varchar(300) NOT NULL,
  `price` int NOT NULL,
  `time_needed` varchar(20) NOT NULL,
  `CategoryNo` int NOT NULL,
  `chef_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`food_code`, `food_name`, `food_description`, `price`, `time_needed`, `CategoryNo`, `chef_id`) VALUES
(1, 'healthy breakfast', 'Italian healthy breakfast ', 50, 'after 30min', 1, 4),
(2, 'soap', 'awesome soap for diet', 30, 'after 15min', 5, 5),
(3, 'burger combo', 'burger with potato', 90, 'after 1 hour', 2, 1),
(4, 'lemon mint', 'delicious lemon mint juice', 20, 'after 15min', 3, 2),
(5, 'Brownies', 'delicious Brownies', 40, 'after 15min', 4, 3);

-- --------------------------------------------------------

--
-- Stand-in structure for view `fooddetails`
-- (See below for the actual view)
--
CREATE TABLE `fooddetails` (
`CategoryNo` int
,`chef_id` int
,`chef_name` varchar(100)
,`food_code` int
,`food_description` varchar(300)
,`food_name` varchar(50)
,`phone` varchar(11)
,`price` int
,`rate` int
,`time_needed` varchar(20)
);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderNo` int NOT NULL,
  `OrderDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Total` double NOT NULL,
  `status` varchar(20) NOT NULL,
  `cus_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderNo`, `OrderDate`, `Total`, `status`, `cus_id`) VALUES
(1, '2021-01-24 10:41:34', 180, 'Pending', 1),
(2, '2021-01-24 10:48:53', 180, 'Pending', 1),
(3, '2021-01-24 10:48:55', 180, 'Pending', 1),
(4, '2021-01-24 10:50:30', 180, 'Pending', 1),
(5, '2021-01-24 10:50:40', 180, 'Pending', 1),
(6, '2021-01-24 11:08:59', 180, 'Pending', 1),
(7, '2021-01-24 11:12:40', 180, 'Pending', 1),
(8, '2021-01-24 11:14:22', 210, 'Pending', 1),
(9, '2021-01-24 11:25:54', 190, 'Pending', 1),
(10, '2021-01-24 11:32:21', 230, 'Pending', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ordertemp`
--

CREATE TABLE `ordertemp` (
  `prono` int NOT NULL,
  `qty` int NOT NULL,
  `cus_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `food_code` int NOT NULL,
  `OrderNo` int NOT NULL,
  `Qty` int NOT NULL,
  `Price` double NOT NULL,
  `Total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`food_code`, `OrderNo`, `Qty`, `Price`, `Total`) VALUES
(1, 9, 1, 50, 50),
(1, 10, 1, 50, 50),
(2, 8, 1, 30, 30),
(2, 9, 1, 30, 30),
(3, 7, 2, 90, 180),
(3, 8, 2, 90, 180),
(3, 9, 1, 90, 90),
(3, 10, 2, 90, 180),
(4, 9, 1, 20, 20);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vieworders`
-- (See below for the actual view)
--
CREATE TABLE `vieworders` (
`cus_id` int
,`food_code` int
,`food_name` varchar(50)
,`price` int
,`qty` int
,`total` bigint
);

-- --------------------------------------------------------

--
-- Structure for view `fooddetails` exported as a table
--
DROP TABLE IF EXISTS `fooddetails`;
CREATE TABLE`fooddetails`(
    `chef_name` varchar(100) COLLATE utf8mb4_0900_ai_ci NOT NULL,
    `chef_id` int NOT NULL DEFAULT '0',
    `phone` varchar(11) COLLATE utf8mb4_0900_ai_ci NOT NULL,
    `rate` int NOT NULL,
    `food_code` int NOT NULL DEFAULT '0',
    `food_name` varchar(50) COLLATE utf8mb4_0900_ai_ci NOT NULL,
    `food_description` varchar(300) COLLATE utf8mb4_0900_ai_ci NOT NULL,
    `price` int NOT NULL,
    `time_needed` varchar(20) COLLATE utf8mb4_0900_ai_ci NOT NULL,
    `CategoryNo` int NOT NULL
);

-- --------------------------------------------------------

--
-- Structure for view `vieworders` exported as a table
--
DROP TABLE IF EXISTS `vieworders`;
CREATE TABLE`vieworders`(
    `food_code` int NOT NULL DEFAULT '0',
    `food_name` varchar(50) COLLATE utf8mb4_0900_ai_ci NOT NULL,
    `price` int NOT NULL,
    `qty` int NOT NULL,
    `total` bigint NOT NULL DEFAULT '0',
    `cus_id` int NOT NULL
);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CategoryNo`,`chef_id`),
  ADD KEY `chefcategoryfk` (`chef_id`);

--
-- Indexes for table `chefs`
--
ALTER TABLE `chefs`
  ADD PRIMARY KEY (`chef_id`),
  ADD UNIQUE KEY `phone` (`phone`,`email`),
  ADD KEY `adminschefs` (`admin_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cus_id`),
  ADD UNIQUE KEY `phone` (`phone`,`email`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`food_code`),
  ADD KEY `chefcategoryfoodfk` (`CategoryNo`,`chef_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderNo`),
  ADD KEY `orderscusfk` (`cus_id`);

--
-- Indexes for table `ordertemp`
--
ALTER TABLE `ordertemp`
  ADD PRIMARY KEY (`prono`,`cus_id`),
  ADD KEY `ordercusfk` (`cus_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`food_code`,`OrderNo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `CategoryNo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `chefs`
--
ALTER TABLE `chefs`
  MODIFY `chef_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cus_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `food_code` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderNo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `chefcategoryfk` FOREIGN KEY (`chef_id`) REFERENCES `chefs` (`chef_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `chefs`
--
ALTER TABLE `chefs`
  ADD CONSTRAINT `adminschefs` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`admin_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `food`
--
ALTER TABLE `food`
  ADD CONSTRAINT `chefcategoryfoodfk` FOREIGN KEY (`CategoryNo`,`chef_id`) REFERENCES `category` (`CategoryNo`, `chef_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orderscusfk` FOREIGN KEY (`cus_id`) REFERENCES `customer` (`cus_id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `ordertemp`
--
ALTER TABLE `ordertemp`
  ADD CONSTRAINT `ordercusfk` FOREIGN KEY (`cus_id`) REFERENCES `customer` (`cus_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
