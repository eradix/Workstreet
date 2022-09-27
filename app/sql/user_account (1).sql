-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2022 at 10:38 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `workstreet`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `user_id` int(11) NOT NULL,
  `company` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` varchar(255) NOT NULL,
  `update_flg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`user_id`, `company`, `logo`, `email`, `website`, `address`, `password`, `role`, `created_at`, `updated_at`, `update_flg`) VALUES
(1, 'ADMIN', '', 'admin@email.com', 'http://192.168.1.108/pakals', 'makati city', 'fdb30ac8ee8340f7bc9ffb8ccd5b3ff4fa5c27ec', 1, '2022-07-18 01:12:42', '2022-09-27 13:45:17', 1),
(3, 'Nike', '/assets/images/uploads/nike-new.JPG', 'nike@email.com', 'https://www.nike.com/ph/', 'Manila City', '358129c60bd0956c2d5fd3f51afe70187da41895', 2, '2022-07-18 01:40:18', '2022-09-23 14:20:57', 1),
(6, 'Adidas', '/assets/images/uploads/add.JPG', 'adidas@email.com', 'https://www.adidas.com.ph/', 'Ortigas Center, Pasig City', 'e324dfa733c8e35c91437041863dc2418dfd1ae6', 2, '2022-07-18 07:04:05', '2022-09-26 08:15:43', 1),
(7, 'GARY INC', '/assets/images/uploads/gary.JPG', 'garyvalenzuela92@gmail.com', 'http://192.168.1.123/main_template/public/', 'Ayala Avenue, Makati City', '6141a4bd9ecf859c1940d8018bb4d335d2bb41f4', 2, '2022-07-18 08:18:15', '2022-09-23 13:49:51', 1),
(9, 'The PHP Group', '/assets/images/uploads/php.JPG', 'php@email.com', 'https://www.php.net', 'Mandaluyong City', '298ad8aa5ac1d34b1a0b4477cdc4f3d6e6aae644', 2, '2022-07-19 05:24:12', '2022-09-26 14:07:12', 1),
(10, 'SLEEPING QUATERS FOR RENT', '/assets/images/uploads/Capture.JPG', 'sleeping@yahoo.com', 'http://192.168.1.123/main_template/public/', 'MAKATI', '474c0f762fddcc9e62234bf2c6fa02c18a97386b', 2, '2022-09-23 06:15:12', '2022-09-23 14:28:21', 1),
(11, 'Porsche', '/assets/images/uploads/ewqweqwe.JPG', 'porsche@email.com', 'https://alpinejs.dev/', 'Brooklyn, New York, USA', 'ab099f9841f7d232ed26e0d4838bbb3a6450995d', 2, '2022-09-26 01:40:41', '2022-09-26 13:42:18', 1),
(12, 'Nokia', '', 'nokia@email.com', 'https://nokia.com.ph/', 'Mandaluyong City', '9aec7af2718068835aad158b90dd9b85ae258135', 2, '2022-09-26 02:44:36', '2022-09-26 10:44:36', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
