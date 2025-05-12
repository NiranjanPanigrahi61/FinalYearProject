-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2025 at 07:57 AM
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
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `delivery_address` varchar(255) NOT NULL,
  `landmark` varchar(255) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `pincode` varchar(10) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `type` enum('Home','Office','Other') NOT NULL,
  `userid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `delivery_address`, `landmark`, `city`, `state`, `pincode`, `country`, `type`, `userid`) VALUES
(4, 'Bhubaneswar, odisha\r\n751024', 'ghccghcfhj', 'Bhubaneswar', 'Odisha', '757083', 'India', '', 4);

-- --------------------------------------------------------

--
-- Table structure for table `admininfo`
--

CREATE TABLE `admininfo` (
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `adminimage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admininfo`
--

INSERT INTO `admininfo` (`username`, `email`, `password`, `adminimage`) VALUES
('Niranjan', 'abakery205@gmail.com', 'Admin@123', 'https://bakeybucket.s3.ap-south-1.amazonaws.com/admin/1746713282-Screenshot%202023-12-31%20005254.png');

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

-- --------------------------------------------------------

--
-- Table structure for table `brownies`
--

CREATE TABLE `brownies` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT 0,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `status` enum('Active','Inactive') DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `product_type` varchar(100) NOT NULL,
  `added_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(6, 'Cookie', 'cookie', 'https://bakeybucket.s3.ap-south-1.amazonaws.com/category/1746642733-Cookie_category.jpg', '2025-05-07 18:32:14', '2025-05-07 18:32:14', 'active'),
(7, 'burger', 'burger', 'https://bakeybucket.s3.ap-south-1.amazonaws.com/category/1746731444-burger.jpg', '2025-05-08 19:10:46', '2025-05-08 19:10:46', 'active'),
(8, 'sandwich', 'sandwich', 'https://bakeybucket.s3.ap-south-1.amazonaws.com/category/1746731555-sandwich.jpg', '2025-05-08 19:12:37', '2025-05-08 19:12:37', 'active');

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

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `message` text NOT NULL,
  `rating` int(11) DEFAULT NULL CHECK (`rating` between 1 and 5),
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `orderid` varchar(255) NOT NULL,
  `addressid` int(11) NOT NULL,
  `paymentid` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `total_price` decimal(10,2) NOT NULL,
  `status` enum('Pending','Processing','Shipped','Delivered','Cancelled') DEFAULT 'Pending',
  `order_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `userid`, `orderid`, `addressid`, `paymentid`, `quantity`, `total_price`, `status`, `order_date`) VALUES
(5, 4, 'order_QTrJbXUecu94ZO', 4, 'pay_QTrJnuSdkUvSRT', 2, 459.00, 'Pending', '2025-05-12 08:21:39'),
(6, 4, 'order_QTrLlIe9WOaXfG', 4, 'pay_QTrLtgPzZcyzkt', 1, 3499.00, 'Pending', '2025-05-12 08:23:38'),
(7, 4, 'order_QTrLlIe9WOaXfG', 4, 'pay_QTrLtgPzZcyzkt', 1, 2199.00, 'Pending', '2025-05-12 08:23:38'),
(8, 4, 'order_QTrLlIe9WOaXfG', 4, 'pay_QTrLtgPzZcyzkt', 2, 1599.00, 'Pending', '2025-05-12 08:23:38'),
(9, 4, 'order_QTrbAvB9y1Oo4x', 4, 'pay_QTrc1nF9mZmUfF', 1, 110.00, 'Pending', '2025-05-12 08:38:54'),
(10, 4, 'order_QTrbAvB9y1Oo4x', 4, 'pay_QTrc1nF9mZmUfF', 1, 129.00, 'Pending', '2025-05-12 08:38:54'),
(11, 4, 'order_QTrbAvB9y1Oo4x', 4, 'pay_QTrc1nF9mZmUfF', 1, 65.00, 'Pending', '2025-05-12 08:38:54'),
(12, 4, 'order_QTrbAvB9y1Oo4x', 4, 'pay_QTrc1nF9mZmUfF', 1, 60.00, 'Pending', '2025-05-12 08:38:54'),
(13, 4, 'order_QTrbAvB9y1Oo4x', 4, 'pay_QTrc1nF9mZmUfF', 1, 320.00, 'Pending', '2025-05-12 08:38:54');

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

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `profile_photo` varchar(255) NOT NULL,
  `dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `email`, `phone`, `password`, `profile_photo`, `dob`) VALUES
(4, 'subhendu_behera', 'subendu@gmail.com', '7894561230', 'SSguru@1', '', '2025-01-08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `admininfo`
--
ALTER TABLE `admininfo`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `bread`
--
ALTER TABLE `bread`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brownies`
--
ALTER TABLE `brownies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `burger`
--
ALTER TABLE `burger`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cake`
--
ALTER TABLE `cake`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `table_name` (`table_name`);

--
-- Indexes for table `cookie`
--
ALTER TABLE `cookie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doughnuts`
--
ALTER TABLE `doughnuts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `addressid` (`addressid`);

--
-- Indexes for table `pastries`
--
ALTER TABLE `pastries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sandwich`
--
ALTER TABLE `sandwich`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bread`
--
ALTER TABLE `bread`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `brownies`
--
ALTER TABLE `brownies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `burger`
--
ALTER TABLE `burger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cake`
--
ALTER TABLE `cake`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cookie`
--
ALTER TABLE `cookie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `doughnuts`
--
ALTER TABLE `doughnuts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pastries`
--
ALTER TABLE `pastries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sandwich`
--
ALTER TABLE `sandwich`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE;

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
