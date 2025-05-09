-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2025 at 11:00 PM
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
-- Table structure for table `doughnuts`
--

CREATE TABLE `doughnuts` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT 0,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `status` enum('Active','Inactive') DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doughnuts`
--

INSERT INTO `doughnuts` (`id`, `product_name`, `description`, `price`, `quantity`, `image`, `created_at`, `status`) VALUES
(1, 'Chocolate Frosted Doughnut', 'A classic doughnut topped with rich chocolate icing  perfect for chocolate lovers', 50.00, 30, 'https://bakeybucket.s3.ap-south-1.amazonaws.com/doughnuts/1746783848-Chocolate%20Frosted%20Doughnut.jpg', '2025-05-09 15:14:10', 'Active'),
(2, 'Salted Caramel Crunch Doughnut', 'A decadent treat topped with gooey salted caramel and crunchy toffee bits.', 70.00, 30, 'https://bakeybucket.s3.ap-south-1.amazonaws.com/doughnuts/1746783926-Salted%20Caramel%20Crunch%20Doughnut.jpg', '2025-05-09 15:15:27', 'Active'),
(3, 'Boston Cream Doughnut', 'A custard-filled doughnut topped with a layer of smooth chocolate glaze.', 65.00, 30, 'https://bakeybucket.s3.ap-south-1.amazonaws.com/doughnuts/1746783970-Boston%20Cream%20Doughnut.png', '2025-05-09 15:16:13', 'Active'),
(4, 'Nutty Choco Doughnut', ' A chocolate-glazed doughnut sprinkled with roasted crushed nuts for an extra crunch.', 60.00, 30, 'https://bakeybucket.s3.ap-south-1.amazonaws.com/doughnuts/1746784014-Nutty%20Choco%20Doughnut.jpg', '2025-05-09 15:16:55', 'Active'),
(5, 'Coconut Delight Doughnut', ' A doughnut coated in vanilla glaze and rolled in shredded coconut flakes.', 55.00, 30, 'https://bakeybucket.s3.ap-south-1.amazonaws.com/doughnuts/1746784064-Coconut%20Delight%20Doughnut.jpg', '2025-05-09 15:17:46', 'Active'),
(6, 'Lemon Zest Doughnut', 'A zesty, citrusy doughnut filled with lemon curd and topped with lemon glaze.', 65.00, 20, 'https://bakeybucket.s3.ap-south-1.amazonaws.com/doughnuts/1746784119-Lemon%20Zest%20Doughnut.jpg', '2025-05-09 15:18:41', 'Active'),
(7, 'Strawberry Filled Doughnut', 'A pillowy doughnut filled with sweet strawberry jam and dusted with powdered sugar.', 60.00, 30, 'https://bakeybucket.s3.ap-south-1.amazonaws.com/doughnuts/1746784168-Strawberry%20Filled%20Doughnut.jpg', '2025-05-09 15:19:29', 'Active'),
(8, 'Classic Glazed Doughnut', 'A soft, fluffy yeast doughnut covered with a sweet, shiny sugar glaze.', 40.00, 45, 'https://bakeybucket.s3.ap-south-1.amazonaws.com/doughnuts/1746784209-Classic%20Glazed%20Doughnut.jpg', '2025-05-09 15:20:11', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doughnuts`
--
ALTER TABLE `doughnuts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doughnuts`
--
ALTER TABLE `doughnuts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
