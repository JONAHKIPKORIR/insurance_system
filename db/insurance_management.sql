-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2022 at 04:25 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `insurance_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`) VALUES
(1, 'Life'),
(2, 'General'),
(4, 'Test'),
(5, 'Medical'),
(6, 'Testing testing2');

-- --------------------------------------------------------

--
-- Table structure for table `policy_tbl`
--

CREATE TABLE `policy_tbl` (
  `id` int(11) NOT NULL,
  `policy_type` varchar(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sum_assured` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `premium` int(11) NOT NULL,
  `tenure` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `policy_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `policy_tbl`
--

INSERT INTO `policy_tbl` (`id`, `policy_type`, `category_id`, `sum_assured`, `user_id`, `premium`, `tenure`, `created_date`, `policy_status`) VALUES
(9, 'property', 2, '200000', 3, 100000, 10, '0000-00-00', 3),
(13, '3', 0, '5000000', 3, 500000, 12, '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `policy_type`
--

CREATE TABLE `policy_type` (
  `id` int(11) NOT NULL,
  `policy_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `policy_type`
--

INSERT INTO `policy_type` (`id`, `policy_type`) VALUES
(2, 'Property'),
(3, 'Brain'),
(4, 'Psychology'),
(5, 'Test');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `password` varchar(20) NOT NULL,
  `category_id` int(11) NOT NULL,
  `address` varchar(2000) NOT NULL,
  `birthday` date NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `password`, `category_id`, `address`, `birthday`, `role`) VALUES
(1, 'admin', 'admin@gmail.com', '0727760375', 'admin', 0, '12345', '0000-00-00', 1),
(3, 'Jonah Kiplimo', 'jonahkiplimo1998@gmail.com', '0727760375', '12345', 2, '12345', '2000-01-01', 2),
(5, 'user1', 'user1@gmail.com', '12345', '12345', 1, '12345', '2000-01-27', 2),
(6, 'Jonah Kiplimo', 'jonahkiplimo8@gmail.com', '0727760375', '', 1, 'Catholic University of Eastern Africa. P.O BOX 62157-00200 Nairobi, Kenya', '2022-01-28', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `policy_tbl`
--
ALTER TABLE `policy_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `policy_type`
--
ALTER TABLE `policy_type`
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
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `policy_tbl`
--
ALTER TABLE `policy_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `policy_type`
--
ALTER TABLE `policy_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
