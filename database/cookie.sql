-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2025 at 02:15 PM
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
-- Table structure for table `cookie`
--

CREATE TABLE `cookie` (
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
-- Dumping data for table `cookie`
--

INSERT INTO `cookie` (`id`, `product_name`, `description`, `price`, `quantity`, `image`, `created_at`, `status`) VALUES
(1, 'Chocolate Chip Cookies', 'Soft and chewy cookies with crisp edges, loaded with premium semi-sweet chocolate chips distributed throughout a buttery vanilla dough. Each cookie has the perfect balance of sweetness with rich chocolate in every bite.', 350.00, 10, 'https://bakeybucket.s3.ap-south-1.amazonaws.com/cookie/1746706190-Chocolate%20Chip%20Cookies.jpg', '2025-05-08 17:39:52', 'Active'),
(2, 'Oatmeal Raisin Cookies', 'Wholesome cookies made with rolled oats, plump raisins, and a hint of cinnamon. These chewy treats offer a subtle sweetness complemented by warm spices, making them both comforting and satisfying.', 320.00, 30, 'https://bakeybucket.s3.ap-south-1.amazonaws.com/cookie/1746706231-Oatmeal%20Raisin%20Cookies.jpeg', '2025-05-08 17:40:31', 'Active'),
(3, 'Sugar Cookies', 'Buttery, tender cookies with a delicate crumb and vanilla flavor. Simple yet elegant, these versatile cookies can be enjoyed plain or beautifully decorated with royal icing and sprinkles for special occasions.', 400.00, 20, 'https://bakeybucket.s3.ap-south-1.amazonaws.com/cookie/1746706270-Sugar%20Cookies.jpg', '2025-05-08 17:41:12', 'Active'),
(4, 'Peanut Butter Cookies', ' Rich, nutty cookies with the distinctive crosshatch pattern. Made with creamy peanut butter for an intense flavor, these cookies have slightly crisp edges with a tender, melt-in-your-mouth center.', 370.00, 10, 'https://bakeybucket.s3.ap-south-1.amazonaws.com/cookie/1746706308-Peanut%20Butter%20Cookies.jpg', '2025-05-08 17:41:50', 'Active'),
(5, 'Snickerdoodles', 'Soft, pillowy cookies with a signature crackled surface, coated in cinnamon sugar. Their subtle tangy flavor comes from cream of tartar, creating the perfect balance of sweet and spice.\r\n', 320.00, 20, 'https://bakeybucket.s3.ap-south-1.amazonaws.com/cookie/1746706342-Snickerdoodles.jpg', '2025-05-08 17:42:25', 'Active'),
(6, 'Brownie Cookies', 'The perfect hybrid with a fudgy center and shiny, crackled top like a brownie, but in convenient cookie form. Rich and decadent with intense chocolate flavor and a slightly chewy texture.', 459.00, 20, 'https://bakeybucket.s3.ap-south-1.amazonaws.com/cookie/1746706376-Brownie%20Cookies.jpg', '2025-05-08 17:42:59', 'Active'),
(7, ' Almond Biscotti', 'Traditional Italian twice-baked cookies studded with whole almonds. These crunchy treats have a satisfying snap and subtle sweetness, perfect for dipping in coffee or tea.', 480.00, 20, 'https://bakeybucket.s3.ap-south-1.amazonaws.com/cookie/1746706410-Almond%20Biscotti%20.jpg', '2025-05-08 17:43:32', 'Active'),
(8, 'Walnut Fudge Cookies', 'Decadent chocolate cookies packed with chunky walnuts for textural contrast. The fudgy interior is rich and moist while the walnuts add a pleasant crunch and nutty flavor.', 500.00, 20, 'https://bakeybucket.s3.ap-south-1.amazonaws.com/cookie/1746706442-Walnut%20Fudge%20Cookies.jpg', '2025-05-08 17:44:04', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cookie`
--
ALTER TABLE `cookie`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cookie`
--
ALTER TABLE `cookie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
