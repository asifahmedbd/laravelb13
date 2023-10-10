-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 10, 2023 at 12:10 PM
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
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_row_id` int UNSIGNED NOT NULL,
  `category_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `parent_id` int DEFAULT NULL,
  `has_child` int DEFAULT NULL,
  `is_featured` tinyint NOT NULL DEFAULT '0',
  `level` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_row_id`, `category_name`, `category_image`, `category_description`, `parent_id`, `has_child`, `is_featured`, `level`, `created_at`, `updated_at`) VALUES
(8, 'Men\'s Clothing', '1696843438_mens_clothing.jpg', 'All men\'s clothing here', 0, 1, 0, 0, '2023-10-09 03:23:59', '2023-10-09 03:23:59'),
(10, 'Formal Shirt', '1696843925_formal_shirt.png', 'All formal shirt', 8, NULL, 1, 1, '2023-10-09 03:32:05', '2023-10-09 03:32:05'),
(11, 'Casual Shirt', '1696844007_casual_shirt.jpg', 'All casual shirt', 8, NULL, 1, 1, '2023-10-09 03:33:28', '2023-10-09 03:33:28'),
(12, 'Women\'s Clothing', NULL, 'All womans dress', 0, 1, 0, 0, '2023-10-09 03:37:16', '2023-10-09 03:37:16'),
(13, 'Saree', '1696844330_saree.jpg', 'Desi new saree', 12, NULL, 1, 1, '2023-10-09 03:38:51', '2023-10-09 03:38:51'),
(14, 'Teen Clothing', NULL, NULL, 0, NULL, 0, 0, '2023-10-09 03:40:23', '2023-10-09 03:40:23'),
(15, 'Kid\'s Clothing', NULL, NULL, 0, 1, 0, 0, '2023-10-09 03:40:39', '2023-10-09 03:40:39'),
(16, 'Salwar Kameez', '1696844799_salawar_kameez.jpg', 'All Salwar Kameez', 12, NULL, 1, 1, '2023-10-09 03:46:39', '2023-10-09 03:46:39'),
(17, 'Panjabi', '1696844945_0542666_mens-basic-panjabi.jpeg', 'Panjabi', 8, NULL, 1, 1, '2023-10-09 03:49:05', '2023-10-09 03:49:05'),
(18, 'Kid\'s Polo', '1696845130_kids_polo.jpg', NULL, 15, NULL, 1, 1, '2023-10-09 03:52:10', '2023-10-09 03:52:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_row_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_row_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
