-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2023 at 02:01 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `busbooking`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `busID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `bookedon` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `busID`, `userID`, `qty`, `bookedon`) VALUES
(1, 3, 2, 3, '2023-12-10 19:24:04'),
(2, 3, 0, 5, '2023-12-11 00:46:35'),
(3, 3, 2, 5, '2023-12-11 00:46:51'),
(4, 3, 2, 5, '2023-12-11 00:47:08'),
(5, 3, 2, 5, '2023-12-11 00:47:21'),
(6, 3, 2, 22, '2023-12-11 00:47:51'),
(7, 3, 0, 1, '2023-12-11 00:48:15'),
(8, 5, 2, 10, '2023-12-11 06:54:55'),
(9, 5, 6, 10, '2023-12-11 07:23:19');

-- --------------------------------------------------------

--
-- Table structure for table `buses`
--

CREATE TABLE `buses` (
  `id` int(11) NOT NULL,
  `busName` varchar(100) NOT NULL,
  `busNumber` varchar(100) NOT NULL,
  `busFrom` varchar(100) NOT NULL,
  `busTo` varchar(100) NOT NULL,
  `dateofTravel` date NOT NULL,
  `noofseats` int(11) NOT NULL,
  `seatsBooked` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buses`
--

INSERT INTO `buses` (`id`, `busName`, `busNumber`, `busFrom`, `busTo`, `dateofTravel`, `noofseats`, `seatsBooked`) VALUES
(1, 'sample', 'sample', '', '', '0000-00-00', 2023, 0),
(2, 'sample1', 'sample1', '', '', '2023-12-11', 50, 0),
(3, 'sample', 'sample', '1', '1', '2023-12-11', 50, 51),
(5, 'sampleee', 'sampleee', '1', '1', '2023-12-13', 111, 20),
(6, 'sampleee', 'sampleee', '1', '1', '2023-12-13', 111, 0);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `Location` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `Location`) VALUES
(1, 'sample'),
(4, 'saaa'),
(5, 'sample1'),
(6, 'sample1'),
(7, 'sample2');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullName` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phoneNumber` varchar(100) NOT NULL,
  `userType` varchar(100) NOT NULL DEFAULT 'User'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullName`, `email`, `password`, `phoneNumber`, `userType`) VALUES
(1, 'sample', 'sample@gmail.com', 'sample', '7894561230', 'Admin'),
(2, 'sample1', 'sample1@gmail.com', 'sample1', '7894445555', 'User'),
(4, 'sample', 'sample2@gmail.com', 'sample', '', 'User'),
(5, 'sample102', 'sample102@gmail.com', 'sample102', '', 'User'),
(6, 'sample1022', 'sample1022@gmail.com', 'sample1022', '7888985555', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buses`
--
ALTER TABLE `buses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
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
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `buses`
--
ALTER TABLE `buses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
