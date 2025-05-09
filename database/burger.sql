-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2025 at 04:54 PM
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
-- Table structure for table `burger`
--

CREATE TABLE `burger` (
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
-- Dumping data for table `burger`
--

INSERT INTO `burger` (`id`, `product_name`, `description`, `price`, `quantity`, `image`, `created_at`, `status`) VALUES
(1, 'crispy chicken delight', 'Golden fried chicken fillet with fresh lettuce, mayo, and pickles in a toasted sesame bun.\r\n', 129.00, 20, 'https://bakeybucket.s3.ap-south-1.amazonaws.com/burger/1746742309-crispy%20chicken%20delight.jpg', '2025-05-09 03:41:50', 'Active'),
(2, 'spicy paneer stack', 'Grilled paneer tikka slices layered with spicy chutney, onion, and lettuce in a soft bun.', 139.00, 25, 'https://bakeybucket.s3.ap-south-1.amazonaws.com/burger/1746742367-spicy%20paneer%20stack.jpg', '2025-05-09 03:42:49', 'Active'),
(3, 'peri peri chicken', 'Tender grilled chicken infused with peri peri spice, topped with creamy garlic mayo.', 139.00, 40, 'https://bakeybucket.s3.ap-south-1.amazonaws.com/burger/1746742417-peri%20peri%20chicken.jpg', '2025-05-09 03:43:38', 'Active'),
(4, 'veggie supreme', 'A hearty vegetable patty made from peas, carrots, and potatoes, served with cheese and tangy sauce.\r\n', 119.00, 30, 'https://bakeybucket.s3.ap-south-1.amazonaws.com/burger/1746742460-veggie%20supreme.png', '2025-05-09 03:44:22', 'Active'),
(5, 'Mushroom & Cheese', '\r\nSautéed mushrooms and melted cheese combined with a mild spiced veggie patty.\r\n', 125.00, 30, 'https://bakeybucket.s3.ap-south-1.amazonaws.com/burger/1746742504-Mushroom%20%26%20Cheese.jpg', '2025-05-09 03:45:05', 'Active'),
(6, 'Corn & Cheese Crunch', 'Crispy corn and cheese patty with lettuce, jalapeños, and chipotle mayo for a smoky kick', 145.00, 25, 'https://bakeybucket.s3.ap-south-1.amazonaws.com/burger/1746742576-Corn%20%26%20Cheese%20Crunch.jpg', '2025-05-09 03:46:17', 'Active'),
(7, 'Mexican Bean', 'Spicy black bean patty topped with salsa, jalapeños, and guacamole for a fusion flavor', 139.00, 40, 'https://bakeybucket.s3.ap-south-1.amazonaws.com/burger/1746742627-Mexican%20Bean.jpg', '2025-05-09 03:47:09', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `burger`
--
ALTER TABLE `burger`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `burger`
--
ALTER TABLE `burger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
