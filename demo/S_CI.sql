-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 31, 2018 at 05:29 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `S_CI`
--

-- --------------------------------------------------------

--
-- Table structure for table `all_products`
--

CREATE TABLE `all_products` (
  `id` int(11) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` varchar(250) NOT NULL,
  `price` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL,
  `product_details` text NOT NULL,
  `status` enum('deactive','active','','') NOT NULL DEFAULT 'deactive',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `all_products`
--

INSERT INTO `all_products` (`id`, `cate_id`, `product_id`, `quantity`, `price`, `image`, `product_details`, `status`, `created`) VALUES
(74, 1, 1, '1', '90000', '59c8ff3629ce4.jpeg', '   gooood', 'deactive', '2017-11-22 13:16:04'),
(76, 1, 1, '4', '67676', '59c7f8481550a.jpeg', 'good product', 'deactive', '2017-11-23 03:39:27'),
(78, 2, 4, '1', '1222', '596a370e00ba5.jpeg', 'goood product', 'deactive', '2017-11-23 03:55:55'),
(79, 2, 4, '1', '2000', '1455522907.jpeg', 'segdgvd', 'deactive', '2018-01-30 09:05:04');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `cate_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cate_name`) VALUES
(1, 'Laptop'),
(2, 'Mobile');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(2, 'sruti', 'f8147411e6773238a845c128c79f6c76');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `product_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `cate_id`, `product_name`) VALUES
(1, 1, 'HP'),
(2, 1, 'Dell'),
(3, 2, 'Samsung'),
(4, 2, 'Nokia');

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `cate_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` varchar(250) NOT NULL,
  `price` varchar(250) NOT NULL,
  `product_image` varchar(250) NOT NULL,
  `product_details` text NOT NULL,
  `status` enum('deactive','active','') NOT NULL DEFAULT 'deactive',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`cate_id`, `product_id`, `quantity`, `price`, `product_image`, `product_details`, `status`, `created`) VALUES
(1, 2, '2', '22222', 'sruo.jpg', 'sewwew', 'deactive', '2017-11-21 07:15:57'),
(1, 1, '1', '2000', 'sruti.jpg', 'wwfwfwfwfweff', 'deactive', '2017-11-21 07:14:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `all_products`
--
ALTER TABLE `all_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `all_products`
--
ALTER TABLE `all_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
