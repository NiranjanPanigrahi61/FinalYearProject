-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2025 at 02:14 PM
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
  `quantity` int(11) NOT NULL DEFAULT 0,
  `weight` varchar(50) DEFAULT NULL,
  `size` varchar(50) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cake`
--

INSERT INTO `cake` (`id`, `product_name`, `description`, `price`, `quantity`, `weight`, `size`, `image`, `created_at`) VALUES
(1, 'Floral Berry Cake', 'A beautifully decorated pastel peach cake adorned with delicate meringues, blueberries, macarons, and fresh pink roses. Ideal for elegant celebrations and floral-themed occasions. The frosting features a petal-textured design, giving it a handcrafted aesthetic.', 1699.00, 20, '1.5 kg', '8 inch', 'https://bakeybucket.s3.ap-south-1.amazonaws.com/cake/1746703411-Floral%20Berry%20Cake.jpg', '2025-05-08 16:53:34'),
(2, 'Oreo Fantasy Drip Cake', 'A tall cookies-and-cream layered cake, generously frosted with speckled vanilla cream and decorated with mini Oreos, colorful sprinkles, whipped swirls, and vibrant pink drip icing. Topped with donuts and stacked Oreos for a playful, indulgent finish — perfect for kids\' parties and celebrations.', 2199.00, 30, '2 kg', '6 inch', 'https://bakeybucket.s3.ap-south-1.amazonaws.com/cake/1746704021-Oreo%20Fantasy%20Drip%20Cake.jpg', '2025-05-08 17:03:43'),
(3, 'Rustic Fig & Pistachio Naked Cake', 'A rustic two-tier naked cake lightly frosted to showcase the golden sponge layers. Garnished with fresh figs, crushed pistachios, rose petals, and olive leaves for a natural, earthy look — ideal for weddings or garden-themed events. The minimal frosting highlights the artisanal and organic appeal.', 3499.00, 20, '3.5 kg', '10 inch', 'https://bakeybucket.s3.ap-south-1.amazonaws.com/cake/1746704166-Rustic%20Fig%20%26%20Pistachio%20Naked%20Cake.jpg', '2025-05-08 17:06:09'),
(4, 'Pastel Blue Celebration Cake', 'A visually charming single-tier cake frosted with a smooth pastel blue buttercream finish. The top is decorated with evenly spaced pink whipped swirls adorned with rainbow sprinkles, giving it a festive, party-ready look. The base of the cake is also bordered with colorful sprinkles for added joy and vibrancy.', 749.00, 30, '1 kg', '8 inch', 'https://bakeybucket.s3.ap-south-1.amazonaws.com/cake/1746704230-Pastel%20Blue%20Celebration%20Cake.jpg', '2025-05-08 17:07:11'),
(5, 'Classic Strawberry Cheesecake', 'An elegant and creamy cheesecake with a buttery biscuit base, topped with a rich strawberry glaze. The top is beautifully garnished with fresh, juicy strawberries and mint leaves for a refreshing finish. Perfect for dessert lovers who enjoy a fruity twist.', 899.00, 10, '1 kg', '7 inch', 'https://bakeybucket.s3.ap-south-1.amazonaws.com/cake/1746704280-Classic%20Strawberry%20Cheesecake.jpg', '2025-05-08 17:08:02'),
(6, 'Blackberry Vanilla Floral Cake', 'An elegant vanilla sponge cake layered and frosted with smooth buttercream, topped with fresh blackberries and adorned with edible lavender or lilac flowers. This cake combines delicate floral notes with the tart sweetness of blackberries for a sophisticated treat perfect for special occasions.', 1299.00, 20, '1.2 kg', '8 inch', 'https://bakeybucket.s3.ap-south-1.amazonaws.com/cake/1746704333-Blackberry%20Vanilla%20Floral%20Cake.jpg', '2025-05-08 17:08:56'),
(7, 'Berry Cascade Wedding Cake', 'An elegant three-tiered white cake with smooth frosting, beautifully decorated with a cascade of fresh berries. The cake features strawberries, blueberries, and raspberries dusted with powdered sugar, along with small mint leaves for garnish. The cake has a clean, contemporary design with a rustic touch, highlighted by warm bokeh lighting in the background, creating a romantic atmosphere.', 4599.00, 20, '6 kg', '12 inch', 'https://bakeybucket.s3.ap-south-1.amazonaws.com/cake/1746704423-Berry%20Cascade%20Wedding%20Cake.jpg', '2025-05-08 17:10:25'),
(8, 'Pastel Macaron Drip Cake', 'A charming celebration cake featuring pink and white horizontal stripes with a white chocolate drip topping. The cake is elegantly decorated with pastel pink and yellow macarons arranged around the top edge, and colorful sprinkles scattered across the white chocolate drip. Small white star-shaped sprinkles are visible on the sides of the cake. The cake is presented on a white scalloped cake stand against a light wooden surface, with mint green napkins and wooden utensils visible in the styled setting.', 2599.00, 20, '1.5 kg', '6 inch', 'https://bakeybucket.s3.ap-south-1.amazonaws.com/cake/1746704527-Pastel%20Macaron%20Drip%20Cake.jpg', '2025-05-08 17:12:09'),
(9, 'Triple Chocolate Drip Cake', 'A decadent chocolate cake featuring smooth milk chocolate buttercream frosting with a rich dark chocolate ganache drip. The cake is elegantly decorated with chocolate buttercream rosettes around the top edge and chocolate shavings along the bottom border. The glossy chocolate drip creates an indulgent, sophisticated appearance. The cake sits on a decorative white metal cake stand, highlighting its rich brown tones and elaborate decoration', 1899.00, 10, '1.8 kg', '8 inch', 'https://bakeybucket.s3.ap-south-1.amazonaws.com/cake/1746704599-Triple%20Chocolate%20Drip%20Cake.jpg', '2025-05-08 17:13:21'),
(10, 'Vanilla Chocolate Drip Cake', ' An elegant cake featuring smooth vanilla buttercream frosting with a dramatic dark chocolate ganache drip. The top is generously garnished with chocolate shards and chunks for added texture and visual appeal. The contrast between the creamy white exterior and rich chocolate drip creates a sophisticated yet indulgent appearance. The cake is presented on a simple white cake stand against a minimalist background, highlighting its clean lines and artisanal finish.', 1599.00, 18, '1.6 kg', '8 inch', 'https://bakeybucket.s3.ap-south-1.amazonaws.com/cake/1746704656-Vanilla%20Chocolate%20Drip%20Cake.jpg', '2025-05-08 17:14:18');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
