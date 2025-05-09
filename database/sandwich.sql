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
-- Table structure for table `sandwich`
--

CREATE TABLE `sandwich` (
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
-- Dumping data for table `sandwich`
--

INSERT INTO `sandwich` (`id`, `product_name`, `description`, `price`, `quantity`, `image`, `created_at`, `status`) VALUES
(1, 'Grilled Veggie Melt', 'Grilled zucchini, bell peppers, and mushrooms layered with cheese and pesto in toasted multigrain bread.\r\n', 129.00, 50, 'https://bakeybucket.s3.ap-south-1.amazonaws.com/sandwich/1746776052-Grilled%20Veggie%20Melt.jpg', '2025-05-09 13:04:17', 'Active'),
(2, 'Spicy Paneer Pocket', 'Chunks of spicy paneer tossed in Indian masala, stuffed inside soft bread with mint chutney and onions', 139.00, 25, 'https://bakeybucket.s3.ap-south-1.amazonaws.com/sandwich/1746776103-Spicy%20Paneer%20Pocket.jpg', '2025-05-09 13:05:04', 'Active'),
(3, 'Egg & Mayo Supreme', 'Boiled eggs mixed with creamy mayo and pepper, served in soft white or brown bread.', 109.00, 50, 'https://bakeybucket.s3.ap-south-1.amazonaws.com/sandwich/1746781100-Egg%20%26%20Mayo%20Supreme.jpg', '2025-05-09 14:28:30', 'Active'),
(4, 'Italian Tomato Basil Sandwich', 'Fresh tomato slices, mozzarella, and basil leaves drizzled with olive oil in ciabatta bread.', 129.00, 30, 'https://bakeybucket.s3.ap-south-1.amazonaws.com/sandwich/1746781157-Italian%20Tomato%20Basil%20Sandwich.jpg', '2025-05-09 14:29:19', 'Active'),
(5, 'Classic Club Sandwich', 'A timeless favorite is a triple-layered sandwich with lettuce, tomato, cucumber, cheese, and mayo.', 149.00, 30, 'https://bakeybucket.s3.ap-south-1.amazonaws.com/sandwich/1746781315-Classic%20Club%20Sandwich.jpg', '2025-05-09 14:31:57', 'Active'),
(6, 'BBQ Soya Sandwich', 'Smoky BBQ-flavored soya chunks with onion rings and coleslaw in a toasted sandwich bun', 123.00, 25, 'https://bakeybucket.s3.ap-south-1.amazonaws.com/sandwich/1746781443-BBQ%20Soya%20Sandwich.jpg', '2025-05-09 14:34:05', 'Active'),
(7, 'Cheesy Corn Delight', 'Sweet corn mixed with creamy cheese and herbs, grilled between buttery bread slices.', 109.00, 20, 'https://bakeybucket.s3.ap-south-1.amazonaws.com/sandwich/1746781498-Cheesy%20Corn%20Delight.avif', '2025-05-09 14:34:59', 'Active'),
(8, 'Peri Peri Chicken Sandwich', 'Tender chicken marinated in peri peri sauce, with lettuce and garlic mayo in a grilled bun', 159.00, 30, 'https://bakeybucket.s3.ap-south-1.amazonaws.com/sandwich/1746781539-Peri%20Peri%20Chicken%20Sandwich.jpg', '2025-05-09 14:35:41', 'Active'),
(9, 'Creamy Cucumber Crunch', 'Thin cucumber slices, cheese, and a hint of mint mayo in soft sandwich bread — light and refreshing.', 99.00, 40, 'https://bakeybucket.s3.ap-south-1.amazonaws.com/sandwich/1746781717-Creamy%20Cucumber%20Crunch.jpg', '2025-05-09 14:38:39', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sandwich`
--
ALTER TABLE `sandwich`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sandwich`
--
ALTER TABLE `sandwich`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
