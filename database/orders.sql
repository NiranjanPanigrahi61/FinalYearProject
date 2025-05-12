-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2025 at 07:59 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bakery`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `orderid` varchar(255) NOT NULL,
  `addressid` int(11) NOT NULL,
  `paymentid` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `total_price` decimal(10,2) NOT NULL,
  `status` enum('Pending','Processing','Shipped','Delivered','Cancelled') DEFAULT 'Pending',
  `order_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `userid`, `orderid`, `addressid`, `paymentid`, `quantity`, `total_price`, `status`, `order_date`) VALUES
(5, 4, 'order_QTrJbXUecu94ZO', 4, 'pay_QTrJnuSdkUvSRT', 2, 459.00, 'Pending', '2025-05-12 08:21:39'),
(6, 4, 'order_QTrLlIe9WOaXfG', 4, 'pay_QTrLtgPzZcyzkt', 1, 3499.00, 'Pending', '2025-05-12 08:23:38'),
(7, 4, 'order_QTrLlIe9WOaXfG', 4, 'pay_QTrLtgPzZcyzkt', 1, 2199.00, 'Pending', '2025-05-12 08:23:38'),
(8, 4, 'order_QTrLlIe9WOaXfG', 4, 'pay_QTrLtgPzZcyzkt', 2, 1599.00, 'Pending', '2025-05-12 08:23:38'),
(9, 4, 'order_QTrbAvB9y1Oo4x', 4, 'pay_QTrc1nF9mZmUfF', 1, 110.00, 'Pending', '2025-05-12 08:38:54'),
(10, 4, 'order_QTrbAvB9y1Oo4x', 4, 'pay_QTrc1nF9mZmUfF', 1, 129.00, 'Pending', '2025-05-12 08:38:54'),
(11, 4, 'order_QTrbAvB9y1Oo4x', 4, 'pay_QTrc1nF9mZmUfF', 1, 65.00, 'Pending', '2025-05-12 08:38:54'),
(12, 4, 'order_QTrbAvB9y1Oo4x', 4, 'pay_QTrc1nF9mZmUfF', 1, 60.00, 'Pending', '2025-05-12 08:38:54'),
(13, 4, 'order_QTrbAvB9y1Oo4x', 4, 'pay_QTrc1nF9mZmUfF', 1, 320.00, 'Pending', '2025-05-12 08:38:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `addressid` (`addressid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`addressid`) REFERENCES `address` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
