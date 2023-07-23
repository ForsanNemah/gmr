-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2023 at 03:18 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `getmonyfromgmail`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `pass` text NOT NULL,
  `active` int(1) NOT NULL DEFAULT 0,
  `type` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `pass`, `active`, `type`) VALUES
(1, 'admin', 'admin', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `fullname` text NOT NULL,
  `cu_location` text NOT NULL,
  `cu_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `active` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `fullname`, `cu_location`, `cu_date`, `active`) VALUES
(15, 'عالم الصيانة', '', '2023-06-19 17:42:11', 1),
(16, 'الملاطي', '', '2023-06-19 17:42:16', 1),
(17, 'الازرق نت', '2', '2023-06-19 17:42:24', 1),
(18, 'dc', '1', '2023-06-24 19:07:46', 1),
(19, 'ghjg', '767', '2023-07-05 06:01:35', 0);

-- --------------------------------------------------------

--
-- Table structure for table `email_names`
--

CREATE TABLE `email_names` (
  `id` int(11) NOT NULL,
  `em_name` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `state` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `email_names`
--

INSERT INTO `email_names` (`id`, `em_name`, `user_id`, `state`) VALUES
(1, 'gmail', 37, 0),
(2, 'khkj', 39, 0);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `url_email` tinyint(1) NOT NULL DEFAULT 0,
  `languages` varchar(2) NOT NULL DEFAULT 'en'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `url_email`, `languages`) VALUES
(1, 1, 'en');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `balance` double NOT NULL,
  `tr_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `descr` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `url_transactions`
--

CREATE TABLE `url_transactions` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `phone` text NOT NULL,
  `customer` text NOT NULL,
  `ut_url` varchar(255) NOT NULL,
  `ut_state` int(1) NOT NULL DEFAULT 0,
  `checked` tinyint(1) NOT NULL DEFAULT 0,
  `ut_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `email_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `url_transactions`
--

INSERT INTO `url_transactions` (`id`, `username`, `phone`, `customer`, `ut_url`, `ut_state`, `checked`, `ut_date`, `email_name`) VALUES
(1, 'زياد صالح علي مظفر', '773715155', 'الازرق نت', 'https://google.com', 0, 0, '2023-06-19 17:56:28', ''),
(2, 'amgad', '1234545', 'الملاطي', 'https://facebook.com', 0, 0, '2023-06-22 15:04:28', ''),
(3, 'زياد صالح علي مظفر', '32434234', 'الازرق نت', 'https://hjkhjk', 1, 0, '2023-06-22 16:09:03', ''),
(4, 'yuigth', '1', 'dc', 'https://fvljvfko', 0, 0, '2023-06-24 19:33:20', 'dffd'),
(5, 'yuigth', '765675', 'dc', 'https://,fvhkjfd', 0, 0, '2023-06-24 22:21:30', 'gmail'),
(6, 'yuigth', '656576', 'dc', 'HTTPS://KHJKH', 0, 0, '2023-06-25 20:40:41', 'gmail'),
(7, 'yuigth', '7578', 'dc', 'https:///dlkfnkjds', 0, 0, '2023-06-25 20:40:53', 'gmail'),
(8, 'yuigth', '5765765', 'dc', 'https://jhjghj', 1, 0, '2023-06-25 20:41:05', 'gmail'),
(9, 'yuigth', '75765', 'dc', 'https://fsdfs', 0, 0, '2023-06-25 20:41:12', 'gmail'),
(10, 'yuigth', '75675', 'dc', 'https://dgfsgfd', 0, 0, '2023-06-25 20:41:18', 'gmail');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `pass` text NOT NULL,
  `phone` text NOT NULL,
  `main_email` varchar(255) NOT NULL,
  `email` text NOT NULL,
  `us_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `active` int(1) NOT NULL DEFAULT 1,
  `type` int(1) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `pass`, `phone`, `main_email`, `email`, `us_date`, `active`, `type`) VALUES
(36, 'زياد صالح علي مظفر', 'zs143031', '773715155', 'ziadmuzaffar@gmail.com', '', '2023-06-19 17:43:06', 1, 2),
(37, 'amgad', 'amgadamgad', '0025377166383', 'softzizu#gmail.com', '', '2023-06-19 17:57:51', 1, 2),
(38, 'yuigth', 'yuigthyuigth', '86786', 'f@f', '', '2023-06-24 12:35:18', 1, 2),
(39, 'fgffhgf', 'fgffhgffgffhgf', '757656', 'fgffhgf@fgffhgf', '', '2023-07-04 06:11:08', 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_names`
--
ALTER TABLE `email_names`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `em_name` (`em_name`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `url_transactions`
--
ALTER TABLE `url_transactions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ut_url` (`ut_url`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `main_email` (`main_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `email_names`
--
ALTER TABLE `email_names`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `url_transactions`
--
ALTER TABLE `url_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `email_names`
--
ALTER TABLE `email_names`
  ADD CONSTRAINT `email_names_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
