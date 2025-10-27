-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2025 at 08:02 AM
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
-- Database: `jolaha`
--

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_subscribers`
--

CREATE TABLE `newsletter_subscribers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subscription_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `newsletter_subscribers`
--

INSERT INTO `newsletter_subscribers` (`id`, `name`, `email`, `subscription_date`) VALUES
(1, 'First', 'first@email.com', '2025-10-27 06:45:41'),
(2, 'Second', 'second@email.com', '2025-10-27 06:49:14'),
(3, 'Third', 'third@email.com', '2025-10-27 07:00:55');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(10) UNSIGNED NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_slug` varchar(255) NOT NULL,
  `post_content` text NOT NULL,
  `post_author` int(10) UNSIGNED NOT NULL,
  `post_author_name` varchar(100) NOT NULL,
  `post_excerpt` text DEFAULT NULL,
  `post_status` enum('draft','published') NOT NULL DEFAULT 'published',
  `post_image` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `post_category` enum('solution','product','service') NOT NULL,
  `selected_solution` int(10) UNSIGNED DEFAULT NULL,
  `selected_product` int(10) UNSIGNED DEFAULT NULL,
  `selected_service` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_title`, `post_slug`, `post_content`, `post_author`, `post_author_name`, `post_excerpt`, `post_status`, `post_image`, `meta_title`, `meta_description`, `meta_keywords`, `post_category`, `selected_solution`, `selected_product`, `selected_service`, `created_at`, `updated_at`) VALUES
(1, 'Retesting Posts11', 'retesting-posts11', 'Testing id looking good so far.', 0, 'Abdull', 'Hahhaha', 'published', 'post_1760535786_6302.png', '', '', '', 'service', 0, 0, 2, '2025-10-15 13:43:06', '2025-10-15 19:49:35'),
(4, 'Checking Meta Tags Edit', 'checking-meta-tags-edit', 'Choose whether to save as draft or publish immediately. Select what type of content this post belongs to. Content *Title of your post (keep it concise and descriptive)', 1, 'Boss Man', 'Hello', 'published', 'post_1760556777_7964.png', 'Filling meta tags from edit page, Filling meta tags from ed', 'Filling meta tags from edit pageFilling meta tags from edit pageFilling meta tags from edit pageFilling meta tags from edit pageFilling meta tags from edit', 'ed, ed, ed,', 'solution', 2, 0, 0, '2025-10-15 19:31:02', '2025-10-15 19:32:57'),
(5, 'Meta Tags Check', 'meta-tags-check', 'Making Sure Meta Tags Are Submitting', 1, 'Man', 'Meta Tags Check', 'published', 'post_1760556904_6498.png', 'Meta Tags Check', 'Meta Tags Check', 'meta, tags', 'product', 0, 2, 0, '2025-10-15 19:35:04', '2025-10-15 19:35:04');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `created_at`, `updated_at`) VALUES
(1, 'Product-1', '2025-10-15 13:32:33', '2025-10-15 13:32:45'),
(2, 'Product-2', '2025-10-15 13:32:59', '2025-10-15 13:32:59');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `service_description` text DEFAULT NULL,
  `service_icon` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_name`, `service_description`, `service_icon`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Service-1', 'Some service here', '', 1, '2025-10-15 13:35:03', '2025-10-15 13:35:03'),
(2, 'Service-1', 'Some service here', '', 0, '2025-10-15 13:35:09', '2025-10-15 23:14:09');

-- --------------------------------------------------------

--
-- Table structure for table `solutions`
--

CREATE TABLE `solutions` (
  `solution_id` int(10) UNSIGNED NOT NULL,
  `solution_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `solutions`
--

INSERT INTO `solutions` (`solution_id`, `solution_name`, `created_at`, `updated_at`) VALUES
(1, 'Solution-1', '2025-10-15 13:33:22', '2025-10-15 13:33:22'),
(2, 'Solution-2', '2025-10-15 13:33:29', '2025-10-15 13:33:29');

-- --------------------------------------------------------

--
-- Table structure for table `sub_services`
--

CREATE TABLE `sub_services` (
  `id` int(10) UNSIGNED NOT NULL,
  `service_id` int(10) UNSIGNED NOT NULL,
  `sub_service_name` varchar(255) NOT NULL,
  `sub_service_description` text DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_services`
--

INSERT INTO `sub_services` (`id`, `service_id`, `sub_service_name`, `sub_service_description`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 'Sub-S-1', '', 1, '2025-10-15 13:35:03', '2025-10-15 13:35:03'),
(2, 1, 'Sub-S-2', '', 1, '2025-10-15 13:35:03', '2025-10-15 13:35:03'),
(3, 1, 'Sub-S-3', '', 1, '2025-10-15 13:35:03', '2025-10-15 13:35:03'),
(4, 2, 'Sub-S-1', '', 0, '2025-10-15 13:35:09', '2025-10-15 23:14:09'),
(5, 2, 'Sub-S-2', '', 0, '2025-10-15 13:35:09', '2025-10-15 23:14:09'),
(6, 2, 'Sub-S-3', '', 0, '2025-10-15 13:35:09', '2025-10-15 23:14:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `newsletter_subscribers`
--
ALTER TABLE `newsletter_subscribers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `solutions`
--
ALTER TABLE `solutions`
  ADD PRIMARY KEY (`solution_id`);

--
-- Indexes for table `sub_services`
--
ALTER TABLE `sub_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_id` (`service_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `newsletter_subscribers`
--
ALTER TABLE `newsletter_subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `solutions`
--
ALTER TABLE `solutions`
  MODIFY `solution_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sub_services`
--
ALTER TABLE `sub_services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sub_services`
--
ALTER TABLE `sub_services`
  ADD CONSTRAINT `sub_services_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
