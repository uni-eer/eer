-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2024 at 05:48 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eer`
--

-- --------------------------------------------------------

--
-- Table structure for table `building`
--

CREATE TABLE `building` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` text DEFAULT NULL,
  `address` varchar(1000) DEFAULT NULL,
  `built_year` date DEFAULT NULL,
  `eer` text DEFAULT NULL,
  `potential` text DEFAULT NULL,
  `grade` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `building`
--

INSERT INTO `building` (`id`, `user_id`, `name`, `address`, `built_year`, `eer`, `potential`, `grade`, `created_at`) VALUES
(3, 4, 'test', 'YTETSUHF', '3422-03-12', '18', NULL, 'A', '2024-03-14 18:09:58'),
(4, 2, 'usdusKL', 'LKDLW', '4444-03-12', '13', '90', 'ssdff', '2024-03-15 09:04:03'),
(5, 4, '868', 'uiui', '2024-03-23', '19', '39', 'B', '2024-03-23 02:05:14'),
(6, 2, '347', 'IUIU', '3223-03-12', '12', '10', 'a', '2024-03-25 21:37:50');

-- --------------------------------------------------------

--
-- Table structure for table `calculations`
--

CREATE TABLE `calculations` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `building_id` int(11) DEFAULT NULL,
  `lc` decimal(30,2) DEFAULT NULL,
  `hc` decimal(30,2) DEFAULT NULL,
  `hwc` decimal(30,2) DEFAULT NULL,
  `tfa` decimal(30,2) DEFAULT NULL,
  `rating_band` text DEFAULT NULL,
  `eer` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `calculations`
--

INSERT INTO `calculations` (`id`, `user_id`, `building_id`, `lc`, `hc`, `hwc`, `tfa`, `rating_band`, `eer`, `created_at`) VALUES
(8, 4, NULL, 782.00, 979.00, 99.00, 979.00, 'C', '73.5', '2024-03-20 22:17:15'),
(9, 4, NULL, 234.00, 345.00, 343.00, 34353.00, 'A', '99.63', '2024-03-21 15:53:58'),
(10, 3, NULL, 234.00, 345.00, 343.00, 34353.00, 'A', '99.63', '2024-03-21 15:55:21'),
(11, 2, 4, 823.00, 9898.00, 9889.00, 98898.00, 'A', '97.09', '2024-03-25 07:43:37'),
(12, 2, 4, 7823.00, 87687.00, 87787.00, 87878.00, 'C', '70.9', '2024-03-25 21:36:41'),
(13, 2, 6, 2.00, 756.00, 567.00, 565.00, 'D', '67.29', '2024-03-25 21:38:13'),
(14, 6, NULL, 12.00, 565.00, 656.00, 56565.00, 'A', '99.7', '2024-03-25 21:42:00');

-- --------------------------------------------------------

--
-- Table structure for table `callback`
--

CREATE TABLE `callback` (
  `id` int(11) NOT NULL,
  `contact_name` text DEFAULT NULL,
  `job_title` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `phone` text DEFAULT NULL,
  `company_name` text DEFAULT NULL,
  `site_postcode` text DEFAULT NULL,
  `postcode_office` text DEFAULT NULL,
  `business_sector` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `url`) VALUES
(1, 'Admin', 'admin'),
(2, 'Landlord', 'landlord'),
(3, 'Tenants', 'tenants');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` text DEFAULT NULL,
  `lname` text DEFAULT NULL,
  `username` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `address` varchar(5000) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `username`, `email`, `password`, `phone`, `address`, `role_id`, `created_at`) VALUES
(2, 'kdj', 'kmcdsm', 'landlord', 'landlord@gmail.com', '$2y$10$4OpoyLGZamyzLWrHAGAHpu6ZfRbhZ6Owrtj49Yqq.fEiFCUiTVTXS', 323, NULL, 2, '2024-03-13 10:36:51'),
(3, 'tenants', 'tenants', 'tenants', 'tenants@gmail.com', '$2y$10$wNAt2K9nxzp6TZQA/xc7Xun74L6xv3OTQIwRfYzzyE0Cu6KmamMii', 3434, NULL, 3, '2024-03-14 16:04:59'),
(4, 'admmin', 'name', 'admin', 'admin@gmail.com', '$2y$10$p9CGGtiDcJSxIpatxxRqrO5GjdQd5gsaeb0NgcFAFrd4rKonwilRq', 464645, 'kjehfjef', 1, '2024-03-14 16:09:06'),
(6, 'tesyttd', 'ytuty', '34343534', 'dfdfgrteba@gmail.com', '$2y$10$iMGuHW0TW8NE4hy1FmeFQeUdzdIT4eAAT7v3Bi9BQ9QjQEDe4qSKe', NULL, NULL, 3, '2024-03-25 21:39:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `building`
--
ALTER TABLE `building`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calculations`
--
ALTER TABLE `calculations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `callback`
--
ALTER TABLE `callback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `building`
--
ALTER TABLE `building`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `calculations`
--
ALTER TABLE `calculations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `callback`
--
ALTER TABLE `callback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
