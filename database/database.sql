-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2020 at 11:01 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopee`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `item_id` int(11) NOT NULL,
  `item_brand` varchar(200) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_price` double(10,2) NOT NULL,
  `item_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`item_id`, `item_brand`, `item_name`, `item_price`, `item_image`) VALUES
(1, 'Samsung', 'Samsung Galaxy Z Flip4 128GB', 849.00, './assets/img/product/1.jpg'),
(2, 'Xiaomi', 'Xiaomi Redmi Note 11 (4GB/64GB)', 219.00, './assets/img/product/2.jpg'),
(3, 'Xiaomi', 'Xiaomi Redmi Note 11S 5G', 349.00, './assets/img/product/3.jpg'),
(4, 'Xiaomi', 'Xiaomi 12T Pro 5G', 749.00, './assets/img/product/4.jpg'),
(5, 'Xiaomi', 'Xiaomi 11 Lite 5G NE', 449.00, './assets/img/product/5.jpg'),
(6, 'Samsung', 'Samsung Galaxy A23 4GB', 349.00, './assets/img/product/6.jpg'),
(7, 'Samsung', 'Samsung Galaxy Z Fold4 256GB', 1799.00, './assets/img/product/7.jpg'),
(8, 'Samsung', 'Samsung Galaxy S22+ 5G 128GB', 999.00, './assets/img/product/8.jpg'),
(9, 'Samsung', 'Samsung Galaxy A04 (3GB/32GB) ', 129.00, './assets/img/product/9.jpg'),
(10, 'Apple', 'iPhone 11 64GB', 489.00, './assets/img/product/10.jpg'),
(11, 'Apple', 'iPhone 13 Pro Max 1TB', 1799.00, './assets/img/product/11.jpg'),
(12, 'Apple', 'iPhone 13 Pro 512GB', 1349.00, './assets/img/product/12.jpg'),
(13, 'Apple', 'iPhone 12 mini 256GB', 999.00, './assets/img/product/13.jpg'),
(14, 'Apple', 'iPhone 13 128GB', 999.00, './assets/img/product/14.jpg'),
(15, 'Apple', 'iPhone 12 64GB', 749.00, './assets/img/product/15.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`) VALUES
(1, 'Tran', 'Tai'),
(2, 'Ho', 'Phuc'),
(3, 'Nguyen', 'Quan');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
