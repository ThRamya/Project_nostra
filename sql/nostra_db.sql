-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Mar 18, 2026 at 04:13 AM
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
-- Database: `nostra_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `full_name`, `email`, `message`, `created_at`) VALUES
(1, 'Thanga Ramya M', 'ramyachandra.nec@gmail.com', '', '2026-03-06 18:01:41'),
(2, 'Thanga Ramya M', 'ramyachandra.nec@gmail.com', 'TT2025-F108421', '2026-03-06 18:13:01'),
(3, 'Radhika', 'radhika@gmail.com', 'Hi ! there', '2026-03-07 13:44:48'),
(4, 'Priya', 'priya@gmail.com', 'hello!!', '2026-03-07 13:50:51'),
(5, 'Mani', 'Mani@gmail.com', 'HI!', '2026-03-08 17:39:14'),
(6, 'Mohana', 'Mohana@gmail.com', 'Welcome!!', '2026-03-09 17:46:01'),
(7, 'ajay', 'ajay@gmail.com', 'hi!', '2026-03-09 18:13:24'),
(8, 'Meghana', 'megana@gmail.com', 'Hi !!', '2026-03-13 12:19:59'),
(9, 'Ram', 'Ram@gmail.com', 'Hi!', '2026-03-13 12:23:58');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `order_status` varchar(50) DEFAULT 'Pending',
  `order_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `total_price`, `order_status`, `order_date`) VALUES
(1, 1, 3496.99, 'Pending', '2026-03-15 06:01:40'),
(2, 1, 11294.00, 'Pending', '2026-03-15 06:13:11'),
(3, 1, 1598.00, 'Delivered', '2026-03-15 06:26:36'),
(4, 3, 1598.00, 'Delivered', '2026-03-15 13:41:02'),
(5, 4, 2198.00, 'Pending', '2026-03-16 03:40:50'),
(6, 4, 2198.00, 'Pending', '2026-03-16 03:42:17'),
(7, 4, 5796.00, 'Pending', '2026-03-16 03:59:42'),
(8, 4, 2198.00, 'Pending', '2026-03-16 07:41:15'),
(9, 4, 899.00, 'Delivered', '2026-03-16 07:42:55'),
(10, 1, 1299.00, 'Pending', '2026-03-18 02:11:42'),
(11, 1, 1998.00, 'Delivered', '2026-03-18 02:13:20'),
(12, 7, 899.00, 'Pending', '2026-03-18 02:32:01'),
(13, 7, 899.00, 'Pending', '2026-03-18 02:33:55'),
(14, 7, 699.00, 'Delivered', '2026-03-18 02:40:00'),
(15, 8, 5999.00, 'Pending', '2026-03-18 02:57:48'),
(16, 7, 899.00, 'Delivered', '2026-03-18 03:00:05'),
(17, 1, 799.00, 'Delivered', '2026-03-18 03:07:56');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`item_id`, `order_id`, `product_id`, `quantity`, `price`, `created_at`) VALUES
(1, 1, 1, 1, 999.99, '2026-03-15 06:01:40'),
(2, 1, 2, 1, 699.00, '2026-03-15 06:01:40'),
(3, 1, 3, 2, 899.00, '2026-03-15 06:01:40'),
(4, 2, 2, 1, 699.00, '2026-03-15 06:13:11'),
(5, 2, 13, 1, 1799.00, '2026-03-15 06:13:11'),
(6, 2, 10, 1, 5999.00, '2026-03-15 06:13:11'),
(7, 2, 6, 2, 999.00, '2026-03-15 06:13:11'),
(8, 2, 7, 1, 799.00, '2026-03-15 06:13:11'),
(9, 3, 2, 1, 699.00, '2026-03-15 06:26:36'),
(10, 3, 3, 1, 899.00, '2026-03-15 06:26:36'),
(11, 4, 3, 1, 899.00, '2026-03-15 13:41:02'),
(12, 4, 2, 1, 699.00, '2026-03-15 13:41:02'),
(13, 5, 4, 1, 1299.00, '2026-03-16 03:40:50'),
(14, 5, 3, 1, 899.00, '2026-03-16 03:40:50'),
(15, 6, 4, 1, 1299.00, '2026-03-16 03:42:17'),
(16, 6, 3, 1, 899.00, '2026-03-16 03:42:17'),
(17, 7, 4, 1, 1299.00, '2026-03-16 03:59:42'),
(18, 7, 3, 1, 899.00, '2026-03-16 03:59:42'),
(19, 7, 13, 2, 1799.00, '2026-03-16 03:59:42'),
(20, 8, 3, 1, 899.00, '2026-03-16 07:41:15'),
(21, 8, 4, 1, 1299.00, '2026-03-16 07:41:15'),
(22, 9, 3, 1, 899.00, '2026-03-16 07:42:55'),
(23, 10, 4, 1, 1299.00, '2026-03-18 02:11:42'),
(24, 11, 4, 1, 1299.00, '2026-03-18 02:13:20'),
(25, 11, 2, 1, 699.00, '2026-03-18 02:13:20'),
(26, 12, 3, 1, 899.00, '2026-03-18 02:32:01'),
(27, 13, 3, 1, 899.00, '2026-03-18 02:33:55'),
(28, 14, 2, 1, 699.00, '2026-03-18 02:40:00'),
(29, 15, 10, 1, 5999.00, '2026-03-18 02:57:48'),
(30, 16, 3, 1, 899.00, '2026-03-18 03:00:05'),
(31, 17, 7, 1, 799.00, '2026-03-18 03:07:56');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `price`, `image`, `description`) VALUES
(1, 'Stylish Green Wear', 999.99, 'stylish wear.jpg', '\"Simplicity is the ultimate sophistication.\"'),
(2, 'White Shirt', 699.00, 'white shirt.jpg', '\"Classic White Shirt – Timeless Elegance\"'),
(3, 'Yellow Dress', 899.00, 'yellow dress.jpg', '\"Sunny Yellow Dress – Bright & Beautiful\"'),
(4, 'Jacket', 1299.00, 'Jacket.jpg', '\"Classic Denim Jacket – Effortless Cool\"'),
(5, 'Red Saree', 1499.00, 'Red Saree.jpg', '\"Elegant Red Saree – Timeless Beauty\" ❤️'),
(6, 'Tops', 999.00, 'Tops.jpg', '\"Stylish Collection of Tops – Trendy & Comfortable\"'),
(7, 'Zebra Tops', 799.00, 'zebra tops.jpg', '\"Zebra Print Top – Bold & Trendy\" 🖤🤍'),
(8, 'Half Saree ', 2999.00, 'Half Saree.jpg', '\"Elegant Half Saree – Traditional Charm\" ✨'),
(9, 'Party Wear', 1899.00, 'party wear.jpg', '\"Party Wear – Glamorous & Stylish\" ✨'),
(10, 'Wedding Costume', 5999.00, 'Wedding costume.jpg', '\"Wedding Costume – Elegant & Royal\" 👰✨'),
(11, 'Yellow Gown', 1699.00, 'yellow gown.jpg', '\"Brighten up any occasion with this elegant yellow gown.\"'),
(13, 'Coat', 1799.00, 'coat.jpg', '\"Reception Look\"');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mobile_no` varchar(15) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `mobile_no`, `password`, `created_at`) VALUES
(1, 'Thanga Ramya M', 'ramyachandra.nec@gmail.com', '8248375321', '$2y$10$/CItkPK0LwWfA8SYZwkW7.9QaOMGTWmE8TG7V.RX9lqJHQKV//1qu', '2026-03-13 14:40:48'),
(3, 'Keerthi K', 'keerthi@gmail.com', '9842626394', '$2y$10$SntltvBML23iIy5WXZSXpOeq8Y1qaYoVvIcfDff5XLUVk/hPH15gy', '2026-03-14 01:47:12'),
(4, 'Sureka M', 'sureka@gmail.com', '8675435783', '$2y$10$RBosQkAQD4zvQ.FZpt7rrepy79BaIBPcBa7ldQmRk3HyVaxEC53Re', '2026-03-14 01:48:02'),
(5, 'Ramya', 'thangaramya99@gmail.com', '9894072553', '$2y$10$CKIVvcVhY9fu.emge.uhhOSCbdiUqr2BEUfTa4D1LwcGy1f6ZyeX6', '2026-03-14 01:48:32'),
(6, 'Mariappan T', 'mariappan@gmail.com', '8826263945', '$2y$10$oH9qDcRcRx4WpVREsIP.V.MemmQUu9h7tyCa6yPFt4CwUCG7wv.di', '2026-03-14 01:50:03'),
(7, 'Mani', 'Mani@gmail.com', '9898789999', '$2y$10$7m6FP21w9CoH0MU7XyVzsumxnwVDMQDhJIV5ftAcvyIfVeNe/Fm72', '2026-03-18 02:14:14'),
(8, 'Radha', 'Radha@gmail.com', '8787878787', '$2y$10$T5c2xKdURgh27onZqMlq6.tDHHoje0kfOCugJYnfIXCWTdp99A6H6', '2026-03-18 02:54:57');

-- --------------------------------------------------------

--
-- Table structure for table `user_cart`
--

CREATE TABLE `user_cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_cart`
--

INSERT INTO `user_cart` (`cart_id`, `user_id`, `product_id`, `quantity`, `created_at`) VALUES
(12, 3, 3, 1, '2026-03-15 17:13:12'),
(27, 6, 2, 1, '2026-03-16 07:46:35'),
(28, 6, 3, 1, '2026-03-16 07:46:35'),
(29, 5, 3, 1, '2026-03-17 02:43:32'),
(30, 5, 4, 1, '2026-03-17 04:36:07'),
(32, 5, 2, 1, '2026-03-17 09:07:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mobile_no` (`mobile_no`);

--
-- Indexes for table `user_cart`
--
ALTER TABLE `user_cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD UNIQUE KEY `user_product` (`user_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_cart`
--
ALTER TABLE `user_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_cart`
--
ALTER TABLE `user_cart`
  ADD CONSTRAINT `user_cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
