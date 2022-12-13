-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2022 at 10:45 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `electronic-ecommerce`
--

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
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`) VALUES
(4, 'phuc', 'phuc@gmail.com', '202cb962ac59075b964b07152d234b70'),
(5, 'phuc ho', 'phuc1@gmail.com', '202cb962ac59075b964b07152d234b70'),
(6, 'taitran', 'tai@gmail.com', 'e99a18c428cb38d5f260853678922e03');

-- --------------------------------------------------------

--
-- Table structure for table `user_cart`
--

CREATE TABLE `user_cart` (
  `id_user` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `num` int(255) NOT NULL,
  `money` int(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_cart`
--

INSERT INTO `user_cart` (`id_user`, `name`, `num`, `money`, `image`) VALUES
(4, 'iphone 14 promax', 24, 35000000, 'https://cdn.tgdd.vn/Products/Images/42/289700/iphone-14-pro-max-vang-thumb-600x600.jpg'),
(4, 'iphone 13', 44, 20000000, 'https://cdn.tgdd.vn/Products/Images/42/223602/iphone-13-starlight-1-600x600.jpg'),
(4, 'OPPO A57', 9, 4500000, 'https://cdn.tgdd.vn/Products/Images/42/285082/oppo-a57-128gb-vang-600x600.jpg'),
(4, 'Samsung Galaxy S21', 8, 13000000, 'https://cdn.tgdd.vn/Products/Images/42/267212/Samsung-Galaxy-S21-FE-vang-600x600.jpg'),
(4, 'Samsung Galaxy Z Flip4', 3, 25000000, 'https://cdn.tgdd.vn/Products/Images/42/285696/samsung-galaxy-z-flip4-5g-512gb-thumb-xanh-600x600.jpg'),
(5, 'iphone 13', 6, 14000000, 'https://cdn.tgdd.vn/Products/Images/42/223602/iphone-13-starlight-1-600x600.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(255) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `token`) VALUES
(4, 'a602213d6a1b4c0b6e875e2b2b073769'),
(5, '4d46973c715cedc963447cecc8da23c0'),
(6, '4fe83158c28ccfd236a9bb7a13dde58a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
