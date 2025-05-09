-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2025 at 04:53 PM
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
-- Table structure for table `pastries`
--

CREATE TABLE `pastries` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pastries`
--

INSERT INTO `pastries` (`id`, `product_name`, `description`, `price`, `quantity`, `image`, `created_at`) VALUES
(1, 'chocolate éclair', 'Light choux pastry filled with creamy vanilla custard and topped with rich chocolate glaze.\r\n', 79.00, 10, 'https://bakeybucket.s3.ap-south-1.amazonaws.com/pastries/1746739583-chocolate%20%C3%A9clair.jpg', '2025-05-09 02:56:37'),
(2, 'Strawberry Danish', 'Buttery, flaky pastry filled with sweet cream cheese and juicy strawberries.', 89.00, 20, 'https://bakeybucket.s3.ap-south-1.amazonaws.com/pastries/1746739667-Strawberry%20Danish.jpg', '2025-05-09 02:57:48'),
(3, 'almond croissant', 'Classic croissant filled with almond cream and dusted with powdered sugar.', 99.00, 15, 'https://bakeybucket.s3.ap-south-1.amazonaws.com/pastries/1746739876-almond%20croissant.jpg', '2025-05-09 03:01:18'),
(4, 'apple turnover', 'Golden pastry filled with cinnamon-spiced apples, baked to perfection.', 75.00, 25, 'https://bakeybucket.s3.ap-south-1.amazonaws.com/pastries/1746740500-apple%20turnover.jpg', '2025-05-09 03:11:42'),
(5, 'lemon tart', 'Tangy lemon custard in a crisp pastry shell, topped with a glossy finish.', 75.00, 22, 'https://bakeybucket.s3.ap-south-1.amazonaws.com/pastries/1746740594-lemon%20tart.jpg', '2025-05-09 03:13:15'),
(6, 'blueberry cream puff', 'Airy puff pastry filled with blueberry compote and light whipped cream.', 115.00, 30, 'https://bakeybucket.s3.ap-south-1.amazonaws.com/pastries/1746740805-blueberry%20cream%20puff.jpg', '2025-05-09 03:16:47'),
(7, 'vanilla mille-feuille', 'Layers of puff pastry and vanilla cream with a sugar glaze finish.', 109.00, 20, 'https://bakeybucket.s3.ap-south-1.amazonaws.com/pastries/1746741330-vanilla%20mille-feuille.jpg', '2025-05-09 03:25:31'),
(8, 'cinnamon roll puff', 'Swirled pastry with cinnamon-sugar filling and a drizzle of vanilla glaze.', 69.00, 25, 'https://bakeybucket.s3.ap-south-1.amazonaws.com/pastries/1746742075-cinnamon%20roll%20puff.jpg', '2025-05-09 03:37:57'),
(9, 'raspberry tartlet', 'Mini tart with a buttery crust, filled with custard and topped with fresh raspberries.\r\n', 122.00, 25, 'https://bakeybucket.s3.ap-south-1.amazonaws.com/pastries/1746742125-raspberry%20tartlet.jpg', '2025-05-09 03:38:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pastries`
--
ALTER TABLE `pastries`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pastries`
--
ALTER TABLE `pastries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
