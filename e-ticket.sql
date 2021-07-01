-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2021 at 05:43 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-ticket`
--

-- --------------------------------------------------------

--
-- Table structure for table `airports`
--

CREATE TABLE `airports` (
  `airports_code` varchar(5) NOT NULL,
  `airports_name` varchar(50) NOT NULL,
  `flight_time` time NOT NULL,
  `ticket_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `airports`
--

INSERT INTO `airports` (`airports_code`, `airports_name`, `flight_time`, `ticket_price`) VALUES
('A1', 'Airport 1', '08:00:00', 500000),
('A2', 'Airport 2', '15:00:00', 350000),
('A3', 'Airport 3', '10:00:00', 500000);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `role_id`) VALUES
('admin1', 'e00cf25ad42683b3df678c61f42c6bda', 0),
('farhanrizky', '155a564b06efe98e382b0d921e43dacd', 1),
('admin2', 'c84258e9c39059a89ab77d846ddab909', 0),
('farhan', 'd41d8cd98f00b204e9800998ecf8427e', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `departure` varchar(15) NOT NULL,
  `destination` varchar(15) NOT NULL,
  `order_date` varchar(15) NOT NULL,
  `flight_time` time NOT NULL,
  `qty` int(11) NOT NULL,
  `total_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `username`, `departure`, `destination`, `order_date`, `flight_time`, `qty`, `total_price`) VALUES
(9, 'farhanrizky', 'A2', 'A3', '2021-06-28', '15:00:00', 2, 700000),
(10, 'farhanrizky', 'A3', 'A2', '2021-06-28', '10:00:00', 1, 500000),
(11, 'farhan', 'A2', 'A3', '2021-06-28', '15:00:00', 2, 700000),
(12, 'farhanrizky', 'A1', 'A3', '2021-06-28', '08:00:00', 3, 1500000);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(0, 'Admin'),
(1, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(50) NOT NULL,
  `first_name` varchar(15) NOT NULL,
  `last_name` varchar(15) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `first_name`, `last_name`, `phone`, `address`) VALUES
('admin1', '', '', '', ''),
('admin2', '', '', '', ''),
('farhan', 'Farhan', 'Fauzi', '123321321123', 'Banjaran, Bandung'),
('farhanrizky', 'Farhan', 'Rizky', '083824289159', 'Banjaran, Bandung, Jawa Barat, 40377');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `airports`
--
ALTER TABLE `airports`
  ADD PRIMARY KEY (`airports_code`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD KEY `FK_username` (`username`),
  ADD KEY `FK_role_id` (`role_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `FK_role_id` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`),
  ADD CONSTRAINT `FK_username` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
