-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2025 at 05:00 PM
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
-- Table structure for table `cake`
--

CREATE TABLE `cake` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `weight` varchar(50) DEFAULT NULL,
  `size` varchar(50) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cake`
--

INSERT INTO `cake` (`id`, `product_name`, `description`, `price`, `quantity`, `weight`, `size`, `image`, `created_at`) VALUES
(1, 'Strawberry Pistachio Velvet Cake', 'A vibrant red velvet cake layered with fresh cream, topped with crushed pistachios and chocolate-dipped strawberries. The side is elegantly decorated with fresh strawberry slices embedded in the cream, giving it a luxurious and fresh appearance.', 1199.00, 20, '1kg', '8 inch', 'https://bakeybucket.s3.ap-south-1.amazonaws.com/cake/1744988151-Strawberry%20Pistachio%20Velvet%20Cake.jpg', '2025-04-18 20:26:15'),
(2, 'Strawberry White Chocolate Delight', 'A luscious, soft vanilla sponge cake coated in creamy white chocolate flakes and topped with fresh, juicy strawberries. Perfectly sweet and visually stunning — ideal for celebrations and special moments.', 899.00, 20, '1 kg', '8 inch', 'https://bakeybucket.s3.ap-south-1.amazonaws.com/cake/1744988854-Strawberry%20White%20Chocolate%20Delight.jpg', '2025-04-18 20:37:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cake`
--
ALTER TABLE `cake`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cake`
--
ALTER TABLE `cake`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
