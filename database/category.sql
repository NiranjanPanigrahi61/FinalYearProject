-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2025 at 08:39 PM
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
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `table_name` varchar(255) NOT NULL,
  `table_img` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('active','inactive') DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `table_name`, `table_img`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Cake', 'cake', 'https://bakeybucket.s3.ap-south-1.amazonaws.com/category/Cake_category.jpg', '2025-04-10 06:21:11', '2025-05-07 18:37:33', 'active'),
(2, 'Bread', 'bread', 'https://bakeybucket.s3.ap-south-1.amazonaws.com/category/Bread_category.jpg', '2025-04-10 06:27:30', '2025-05-07 18:37:19', 'active'),
(3, 'Pastries', 'pastries', 'https://bakeybucket.s3.ap-south-1.amazonaws.com/category/Pastries_category.jpg', '2025-04-10 06:35:46', '2025-05-07 18:36:46', 'active'),
(5, 'Doughnuts', 'doughnuts', 'https://bakeybucket.s3.ap-south-1.amazonaws.com/category/1746642716-doughnuts_category.jpg', '2025-05-07 18:31:57', '2025-05-07 18:31:57', 'active'),
(6, 'Cookie', 'cookie', 'https://bakeybucket.s3.ap-south-1.amazonaws.com/category/1746642733-Cookie_category.jpg', '2025-05-07 18:32:14', '2025-05-07 18:32:14', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `table_name` (`table_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
