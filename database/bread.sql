-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2025 at 03:31 PM
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
-- Table structure for table `bread`
--

CREATE TABLE `bread` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bread`
--

INSERT INTO `bread` (`id`, `product_name`, `description`, `price`, `quantity`, `image`, `created_at`) VALUES
(1, 'White Bread', 'Soft and fluffy with a mild flavor — great for sandwiches and toast.\r\n', 60.00, 20, 'https://bakeybucket.s3.ap-south-1.amazonaws.com/bread/1746710779-White%20Bread.jpg', '2025-05-08 18:56:24'),
(2, 'Whole Wheat Bread', 'Made from whole grain wheat — more fiber, richer taste, and healthier.', 70.00, 30, 'https://bakeybucket.s3.ap-south-1.amazonaws.com/bread/1746710818-Whole%20Wheat%20Bread.jpg', '2025-05-08 18:57:00'),
(3, 'Multigrain Bread', 'A mix of grains like oats, flaxseed, and millet — hearty and nutritious.', 80.00, 20, 'https://bakeybucket.s3.ap-south-1.amazonaws.com/bread/1746710856-Multigrain%20Bread.jpg', '2025-05-08 18:57:41'),
(4, 'Sourdough Bread', 'Fermented with natural wild yeast — tangy flavor and chewy crust.', 100.00, 20, 'https://bakeybucket.s3.ap-south-1.amazonaws.com/bread/1746710888-Sourdough%20Bread.jpg', '2025-05-08 18:58:11'),
(5, 'Baguette', 'Long, crusty loaf with a chewy center — perfect for bruschetta or sandwiches.', 90.00, 20, 'https://bakeybucket.s3.ap-south-1.amazonaws.com/bread/1746710923-Baguette.jpg', '2025-05-08 18:58:45'),
(6, 'Ciabatta', 'Rustic flat loaf with large air pockets — great for paninis.', 100.00, 20, 'https://bakeybucket.s3.ap-south-1.amazonaws.com/bread/1746710974-Ciabatta%20.jpg', '2025-05-08 18:59:39'),
(7, 'Focaccia ', 'Flatbread infused with olive oil and herbs — soft, savory, and aromatic.', 110.00, 20, 'https://bakeybucket.s3.ap-south-1.amazonaws.com/bread/1746711006-Focaccia.jpg', '2025-05-08 19:00:11'),
(8, 'Brioche', 'Rich and buttery with a soft, pillowy texture — ideal for burgers or sweet dishes.', 130.00, 20, 'https://bakeybucket.s3.ap-south-1.amazonaws.com/bread/1746711050-Brioche.jpg', '2025-05-08 19:00:52'),
(9, 'Pain de Campagne ', 'Rustic French bread made with a mix of white, whole wheat, and rye flours — hearty and flavorful with a crusty exterior.', 120.00, 20, 'https://bakeybucket.s3.ap-south-1.amazonaws.com/bread/1746711079-Pain%20de%20Campagne.jpg', '2025-05-08 19:01:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bread`
--
ALTER TABLE `bread`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bread`
--
ALTER TABLE `bread`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
