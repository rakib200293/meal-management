-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2020 at 11:02 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mealsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `bazar_cost`
--

CREATE TABLE `bazar_cost` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `cost` varchar(100) NOT NULL,
  `remark` text CHARACTER SET utf8
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bazar_cost`
--

INSERT INTO `bazar_cost` (`id`, `date`, `user_id`, `cost`, `remark`) VALUES
(24, '2020-01-07', 4, '666', ''),
(25, '2020-06-18', 6, '345', '');

-- --------------------------------------------------------

--
-- Table structure for table `meals`
--

CREATE TABLE `meals` (
  `id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `meal_quantity` int(11) NOT NULL,
  `is_approved` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 (not approved), 1 (approved), 2 (reject)',
  `meal_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meals`
--

INSERT INTO `meals` (`id`, `user_id`, `meal_quantity`, `is_approved`, `meal_date`) VALUES
(10, 4, 67, 1, '2019-08-01'),
(11, 4, 56, 1, '2019-06-19'),
(12, 4, 45, 1, '2019-03-17'),
(13, 4, 345, 1, '2019-03-04'),
(16, 4, 1111, 1, '2019-03-17'),
(17, 4, 678, 1, '2020-03-28'),
(18, 4, 3, 1, '2020-03-20'),
(19, 4, 3, 1, '1970-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `isDeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `isDeleted`) VALUES
(4, 'Rakib', 'rakib', 'rakib@gmail.com', '123', 0),
(5, 'Faruk Ahmed', 'faruk', 'faruk7@gmail.com', '123456', 0),
(6, 'Arif Babu', 'arif', 'arif@gmail.com', '123456', 0),
(7, 'Alamin', 'alamin', 'alamin@gmail.com', '123456', 0),
(8, 'Rabbi', 'rabbi', 'rabbi@gmail.com', '123456', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bazar_cost`
--
ALTER TABLE `bazar_cost`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meals`
--
ALTER TABLE `meals`
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
-- AUTO_INCREMENT for table `bazar_cost`
--
ALTER TABLE `bazar_cost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `meals`
--
ALTER TABLE `meals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
