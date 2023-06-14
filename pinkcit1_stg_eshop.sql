-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 09, 2022 at 11:26 AM
-- Server version: 5.7.23-23
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pinkcit1_stg_eshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `dashboard`
--

CREATE TABLE `dashboard` (
  `id` int(11) NOT NULL,
  `post_id` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `meta_key` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `date_created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dashboard`
--

INSERT INTO `dashboard` (`id`, `post_id`, `meta_key`, `value`, `date_created`) VALUES
(1, '10001', 'auto_refresh', 'off', '2022-10-21 09:47:36'),
(2, '10002', 'proxy_access', 'off', '2022-10-21 10:37:53'),
(3, '10003', 'pc_access', 'off', '2022-10-21 10:37:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', '12345', '2022-10-16 15:41:06', '2022-10-16 15:41:06');

-- --------------------------------------------------------

--
-- Table structure for table `user_information`
--

CREATE TABLE `user_information` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `othercountry` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idtype` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idnumber` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(44) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cardnumber` varchar(55) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `exp_date` varchar(55) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `card_code` varchar(11) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` varchar(22) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `cardstatus` enum('none','approve','reject') CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'none',
  `verificcode` enum('0','1','2') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `banstatus` int(11) NOT NULL DEFAULT '0',
  `ipaddress` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE `visitor` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `browser` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `platform` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `visitor`
--

INSERT INTO `visitor` (`id`, `ip_address`, `city`, `country`, `browser`, `platform`, `date_created`) VALUES
(1, '141.195.194.58', '', '', 'Google Chrome', 'windows', '2022-11-09 06:23:02'),
(2, '1.39.233.30', '', '', 'Handheld Browser', 'iPhone', '2022-11-09 06:23:08'),
(3, '1.39.252.33', '', '', 'Google Chrome', 'windows', '2022-11-09 06:54:18'),
(4, '49.36.238.141', '', '', 'Google Chrome', 'windows', '2022-11-09 08:51:53'),
(5, '1.39.235.94', '', '', 'Handheld Browser', 'iPhone', '2022-11-09 09:07:20'),
(6, '49.44.80.4', '', '', 'Google Chrome', 'Android', '2022-11-09 09:52:43'),
(7, '1.39.234.119', '', '', 'Handheld Browser', 'Android', '2022-11-09 10:55:13'),
(8, '1.39.232.148', '', '', 'Handheld Browser', 'iPhone', '2022-11-09 11:10:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dashboard`
--
ALTER TABLE `dashboard`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_information`
--
ALTER TABLE `user_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dashboard`
--
ALTER TABLE `dashboard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_information`
--
ALTER TABLE `user_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visitor`
--
ALTER TABLE `visitor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
