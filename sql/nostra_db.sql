-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Mar 14, 2026 at 02:51 AM
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
(5, 'Ramya', 'thangaramya99@gmail.com', '9894072553', '$2y$10$Eljj2HLLip8s7rU5EVK8JewDNqR5hth9HXOf6MqkkJ2V3iCxCw4lW', '2026-03-14 01:48:32'),
(6, 'Mariappan T', 'mariappan@gmail.com', '8826263945', '$2y$10$oH9qDcRcRx4WpVREsIP.V.MemmQUu9h7tyCa6yPFt4CwUCG7wv.di', '2026-03-14 01:50:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
