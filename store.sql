-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2019 at 02:04 AM
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
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `username` varchar(200) COLLATE utf8_bin NOT NULL,
  `address` varchar(200) COLLATE utf8_bin NOT NULL,
  `city` varchar(200) COLLATE utf8_bin NOT NULL,
  `postal_code` varchar(7) COLLATE utf8_bin NOT NULL,
  `province` varchar(50) COLLATE utf8_bin NOT NULL,
  `num_prod_1` int(11) NOT NULL,
  `num_prod_2` int(11) NOT NULL,
  `num_prod_3` int(11) NOT NULL,
  `delivery_time` varchar(50) COLLATE utf8_bin NOT NULL,
  `order_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `username`, `address`, `city`, `postal_code`, `province`, `num_prod_1`, `num_prod_2`, `num_prod_3`, `delivery_time`, `order_date`) VALUES
(3, 'admin', '2270 Gladacres Lane', 'Oakville', 'L6M 0G3', 'ON', 0, 1, 0, '30', '2019-04-09 19:24:16'),
(4, 'admin', '2270 Gladacres Lane', 'Oakville', 'L6M 0G3', 'ON', 0, 22, 0, '30', '2019-04-09 19:25:36'),
(5, 'admin', '2270 Gladacres Lane', 'Oakville', 'L6M 0G3', 'ON', 0, 2, 0, '30', '2019-04-09 19:25:42'),
(7, 'admin', '2270 Gladacres Lane', 'Oakville', 'L6M 0G3', 'ON', 1111, 0, 0, '30', '2019-04-09 19:53:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(200) COLLATE utf8_bin NOT NULL,
  `password` varchar(200) COLLATE utf8_bin NOT NULL,
  `name` varchar(50) COLLATE utf8_bin NOT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `phone_number` bigint(11) NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT '0',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `name`, `email`, `phone_number`, `role`, `date_created`) VALUES
(1, 'admin', 'admin', 'admin', 'admin@admin.com', 111222333, 1, '2019-04-08 01:33:43'),
(2, 'user', 'pass', 'user', 'ryan.dominic.henry@gmail.com', 647521792, 0, '2019-04-09 19:42:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
