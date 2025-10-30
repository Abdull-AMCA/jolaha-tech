-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2025 at 12:33 PM
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
-- Table structure for table `careers`
--

CREATE TABLE `careers` (
  `job_id` int(11) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `job_description` text NOT NULL,
  `location` varchar(255) NOT NULL,
  `employment_type` enum('full-time','part-time','contract') NOT NULL,
  `joining_date` date DEFAULT NULL,
  `posted_date` datetime DEFAULT current_timestamp(),
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `careers`
--

INSERT INTO `careers` (`job_id`, `job_title`, `job_description`, `location`, `employment_type`, `joining_date`, `posted_date`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Test', 'New', 'Dubai', 'full-time', '2025-10-16', '2025-10-29 14:56:30', 0, '2025-10-29 10:56:30', '2025-10-29 11:28:06'),
(2, 'Adding New Career - Edited', 'Adding new career for testing pupose. Now editing it', 'Abu Dhabi', 'part-time', '2025-10-30', '2025-10-29 15:23:29', 1, '2025-10-29 11:23:29', '2025-10-29 11:27:22');

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
(3, 'Third', 'third@email.com', '2025-10-27 07:00:55'),
(4, 'Test', 'test@email.com', '2025-10-27 07:55:34'),
(5, 'Hi', 'hi@email.com', '2025-10-27 08:16:45'),
(6, 'Hello', 'hello@email.com', '2025-10-27 08:20:00'),
(7, 'g', 'g@email.om', '2025-10-27 08:22:51'),
(8, 'New', 'New@email.com', '2025-10-27 08:27:15');

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
(1, 'Product-1', '2025-10-15 13:32:33', '2025-10-15 13:32:45');

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
(1, 'Service-1', 'Some service here', '', 0, '2025-10-15 13:35:03', '2025-10-28 13:14:56'),
(3, 'Service-2', 'Description of service 2', '', 0, '2025-10-28 08:52:43', '2025-10-28 13:14:24'),
(5, 'Test Service', '', '', 0, '2025-10-28 12:34:59', '2025-10-28 13:04:59'),
(6, 'Testing', 'Testing service and sub service deletion', '', 0, '2025-10-28 13:15:57', '2025-10-28 13:41:57'),
(7, 'New Service', 'Again testing deletion till now', '', 0, '2025-10-28 14:01:27', '2025-10-28 14:12:26'),
(8, 'New Service', 'New sub service', '', 0, '2025-10-28 14:19:06', '2025-10-28 14:32:31'),
(9, 'Testing Sub S', '', '', 0, '2025-10-28 14:20:32', '2025-10-28 14:21:23'),
(10, 'Testing Sub S', '', '', 0, '2025-10-28 14:20:38', '2025-10-28 14:27:50');

-- --------------------------------------------------------

--
-- Table structure for table `service_inquiries`
--

CREATE TABLE `service_inquiries` (
  `id` int(11) NOT NULL,
  `service_type` varchar(100) NOT NULL,
  `full_name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `company_name` varchar(150) DEFAULT NULL,
  `project_type` varchar(100) DEFAULT NULL,
  `budget_range` varchar(100) DEFAULT NULL,
  `timeline` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service_inquiries`
--

INSERT INTO `service_inquiries` (`id`, `service_type`, `full_name`, `email`, `company_name`, `project_type`, `budget_range`, `timeline`, `description`, `submitted_at`) VALUES
(1, 'Web Design &amp; Development', 'First', 'first@email.com', 'First Company', 'New Web', '10,000', '1 month', 'Nothing to tell.', '2025-10-27 10:21:05');

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
(5, 'New Soln', '2025-10-28 08:25:56', '2025-10-28 08:25:56');

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
(55, 7, 'Sub S-1', '', 0, '2025-10-28 14:01:27', '2025-10-28 14:12:26'),
(56, 7, 'Sub S-2', '', 0, '2025-10-28 14:01:27', '2025-10-28 14:12:26'),
(57, 7, 'Sub S-1', '', 0, '2025-10-28 14:01:50', '2025-10-28 14:12:26'),
(58, 7, 'Sub S-2', '', 0, '2025-10-28 14:01:50', '2025-10-28 14:12:26'),
(59, 7, 'Sub S-3', '', 0, '2025-10-28 14:01:50', '2025-10-28 14:12:26'),
(60, 7, 'Sub S-1', '', 0, '2025-10-28 14:02:08', '2025-10-28 14:12:26'),
(61, 7, 'Sub S-1', '', 0, '2025-10-28 14:02:08', '2025-10-28 14:12:26'),
(62, 7, 'Sub S-2', '', 0, '2025-10-28 14:02:08', '2025-10-28 14:12:26'),
(63, 7, 'Sub S-2', '', 0, '2025-10-28 14:02:08', '2025-10-28 14:12:26'),
(64, 7, 'Sub S-3', '', 0, '2025-10-28 14:02:08', '2025-10-28 14:12:26'),
(65, 7, 'Sub S-1', '', 0, '2025-10-28 14:06:31', '2025-10-28 14:12:26'),
(66, 7, 'Sub S-1', '', 0, '2025-10-28 14:06:31', '2025-10-28 14:12:26'),
(67, 7, 'Sub S-1', '', 0, '2025-10-28 14:06:31', '2025-10-28 14:12:26'),
(68, 7, 'Sub S-1', '', 0, '2025-10-28 14:06:31', '2025-10-28 14:12:26'),
(69, 7, 'Sub S-2', '', 0, '2025-10-28 14:06:31', '2025-10-28 14:12:26'),
(70, 7, 'Sub S-2', '', 0, '2025-10-28 14:06:31', '2025-10-28 14:12:26'),
(71, 7, 'Sub S-2', '', 0, '2025-10-28 14:06:31', '2025-10-28 14:12:26'),
(72, 7, 'Sub S-2', '', 0, '2025-10-28 14:06:31', '2025-10-28 14:12:26'),
(73, 7, 'Sub S-3', '', 0, '2025-10-28 14:06:31', '2025-10-28 14:12:26'),
(74, 7, 'Sub S-3', '', 0, '2025-10-28 14:06:31', '2025-10-28 14:12:26'),
(75, 8, 'Sub service', '', 0, '2025-10-28 14:19:06', '2025-10-28 14:32:31'),
(76, 8, 'Sub service', '', 0, '2025-10-28 14:19:57', '2025-10-28 14:32:31'),
(77, 8, 'Another', '', 0, '2025-10-28 14:19:57', '2025-10-28 14:32:31'),
(78, 8, 'Yet another', '', 0, '2025-10-28 14:19:57', '2025-10-28 14:32:31'),
(79, 9, 'Yes test', '', 0, '2025-10-28 14:20:32', '2025-10-28 14:21:23'),
(80, 10, 'Yes test', '', 0, '2025-10-28 14:20:38', '2025-10-28 14:27:50'),
(81, 10, 'ggg', '', 0, '2025-10-28 14:21:00', '2025-10-28 14:27:50'),
(82, 10, 'ggg', '', 0, '2025-10-28 14:21:17', '2025-10-28 14:27:50'),
(83, 10, 'Yes test', '', 0, '2025-10-28 14:21:17', '2025-10-28 14:27:50'),
(84, 10, 'ggg', '', 0, '2025-10-28 14:26:41', '2025-10-28 14:27:50'),
(85, 10, 'ggg', '', 0, '2025-10-28 14:26:41', '2025-10-28 14:27:50'),
(86, 10, 'Yes test', '', 0, '2025-10-28 14:26:41', '2025-10-28 14:27:50'),
(87, 10, 'Yes test', '', 0, '2025-10-28 14:26:41', '2025-10-28 14:27:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `careers`
--
ALTER TABLE `careers`
  ADD PRIMARY KEY (`job_id`);

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
-- Indexes for table `service_inquiries`
--
ALTER TABLE `service_inquiries`
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
-- AUTO_INCREMENT for table `careers`
--
ALTER TABLE `careers`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `newsletter_subscribers`
--
ALTER TABLE `newsletter_subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `service_inquiries`
--
ALTER TABLE `service_inquiries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `solutions`
--
ALTER TABLE `solutions`
  MODIFY `solution_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sub_services`
--
ALTER TABLE `sub_services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

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
