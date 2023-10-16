-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 16, 2023 at 02:56 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravelb13`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int UNSIGNED NOT NULL,
  `product_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int NOT NULL,
  `short_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long_description` text COLLATE utf8mb4_unicode_ci,
  `product_model` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_id` int DEFAULT NULL,
  `product_tags` text COLLATE utf8mb4_unicode_ci,
  `product_sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` double(8,2) NOT NULL,
  `product_unit` int DEFAULT NULL,
  `is_featured` tinyint DEFAULT NULL,
  `top_selling` tinyint DEFAULT NULL,
  `is_refundable` tinyint DEFAULT NULL,
  `active_status` tinyint NOT NULL DEFAULT '1',
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `category_id`, `short_description`, `long_description`, `product_model`, `brand_id`, `product_tags`, `product_sku`, `product_price`, `product_unit`, `is_featured`, `top_selling`, `is_refundable`, `active_status`, `created_by`, `created_at`, `updated_at`) VALUES
(8, 'Long Sleeve B.Formal Shirt', 10, 'Long Sleeve Formal Shirt regular fit. Front buttoned', '<span style=\"color: rgb(102, 102, 102); font-family: Poppins; font-size: 14px; background-color: rgb(255, 255, 255);\">Long Sleeve Formal Shirt regular fit. Front buttoned</span>', 'MCP-1001', 1, 'formal shirt', 'MBFLS14105', 2795.00, 3, 1, 1, 0, 1, 2, '2023-10-13 09:26:04', '2023-10-13 09:26:04'),
(9, 'White Cotton Long Sleeve Business Formal Shirt', 10, 'White check business formal Shirt in premium-quality Cotton fabric. Designed with a classic collar and long-sleeved with adjustable buttons at cuffs. Regular fit.', 'Place <em>some</em> <u>text</u> <strong>here</strong>', 'MCP-1002', 1, 'formal shirt', 'MBFLS14086', 2995.00, NULL, 1, 1, 0, 1, 2, '2023-10-13 09:32:29', '2023-10-13 09:32:29'),
(10, 'Blue Cotton Saree', 13, 'Blue all-over printed Cotton Saree with contrast purple borders.', 'Place <em>some</em> <u>text</u> <strong>here</strong>', 'RNS-1001', 2, 'Saree, blue cotton', 'LSHR16098', 4295.00, NULL, 1, 1, 0, 1, 2, '2023-10-14 07:28:20', '2023-10-14 07:28:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
