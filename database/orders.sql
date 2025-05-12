-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2025 at 09:20 PM
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
  `productid` int(11) NOT NULL,
  `addressid` int(11) NOT NULL,
  `paymentid` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `total_price` decimal(10,2) NOT NULL,
  `category` varchar(255) NOT NULL,
  `status` enum('Pending','Processing','Shipped','Delivered','Cancelled') DEFAULT 'Pending',
  `order_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `userid`, `orderid`, `productid`, `addressid`, `paymentid`, `quantity`, `total_price`, `category`, `status`, `order_date`) VALUES
(18, 4, 'order_QU7MLzS2LwtYGq', 7, 4, 'pay_QU7MQHyY04zlou', 1, 4599.00, 'cake', 'Delivered', '2025-05-13 00:03:14'),
(19, 4, 'order_QU7MLzS2LwtYGq', 6, 4, 'pay_QU7MQHyY04zlou', 1, 1299.00, 'cake', 'Delivered', '2025-05-13 00:03:14'),
(20, 4, 'order_QU7MLzS2LwtYGq', 2, 4, 'pay_QU7MQHyY04zlou', 1, 70.00, 'bread', 'Delivered', '2025-05-13 00:03:14'),
(21, 4, 'order_QU7MLzS2LwtYGq', 5, 4, 'pay_QU7MQHyY04zlou', 1, 90.00, 'bread', 'Delivered', '2025-05-13 00:03:14'),
(22, 4, 'order_QU7MLzS2LwtYGq', 6, 4, 'pay_QU7MQHyY04zlou', 1, 145.00, 'burger', 'Delivered', '2025-05-13 00:03:14'),
(23, 4, 'order_QU7MLzS2LwtYGq', 2, 4, 'pay_QU7MQHyY04zlou', 1, 139.00, 'burger', 'Delivered', '2025-05-13 00:03:14'),
(24, 4, 'order_QU7MLzS2LwtYGq', 3, 4, 'pay_QU7MQHyY04zlou', 1, 400.00, 'cookie', 'Delivered', '2025-05-13 00:03:14'),
(25, 4, 'order_QU7MLzS2LwtYGq', 4, 4, 'pay_QU7MQHyY04zlou', 1, 370.00, 'cookie', 'Delivered', '2025-05-13 00:03:14'),
(26, 4, 'order_QU7MLzS2LwtYGq', 3, 4, 'pay_QU7MQHyY04zlou', 1, 65.00, 'doughnuts', 'Delivered', '2025-05-13 00:03:14'),
(27, 4, 'order_QU7MLzS2LwtYGq', 5, 4, 'pay_QU7MQHyY04zlou', 1, 55.00, 'doughnuts', 'Delivered', '2025-05-13 00:03:14'),
(28, 4, 'order_QU7MLzS2LwtYGq', 4, 4, 'pay_QU7MQHyY04zlou', 1, 75.00, 'pastries', 'Delivered', '2025-05-13 00:03:14'),
(29, 4, 'order_QU7MLzS2LwtYGq', 5, 4, 'pay_QU7MQHyY04zlou', 1, 75.00, 'pastries', 'Delivered', '2025-05-13 00:03:14'),
(30, 4, 'order_QU7MLzS2LwtYGq', 3, 4, 'pay_QU7MQHyY04zlou', 1, 109.00, 'sandwich', 'Delivered', '2025-05-13 00:03:14'),
(31, 4, 'order_QU7MLzS2LwtYGq', 4, 4, 'pay_QU7MQHyY04zlou', 1, 129.00, 'sandwich', 'Delivered', '2025-05-13 00:03:14'),
(32, 4, 'order_QU892BxxS5f0Q7', 3, 4, 'pay_QU89DSlSQHdhdO', 1, 3499.00, 'cake', 'Delivered', '2025-05-13 00:49:26');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

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
