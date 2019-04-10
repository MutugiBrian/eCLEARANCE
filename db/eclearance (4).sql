-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2019 at 05:13 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eclearance`
--

-- --------------------------------------------------------

--
-- Table structure for table `clearances`
--

CREATE TABLE `clearances` (
  `uid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cby` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clearances`
--

INSERT INTO `clearances` (`uid`, `sid`, `createdat`, `updatedat`, `cby`, `id`) VALUES
(6, 1, '2019-03-27 13:56:39', '2019-03-27 13:56:39', 6, 6),
(7, 1, '2019-03-28 10:22:03', '2019-03-28 10:22:03', 7, 7),
(7, 2, '2019-03-28 10:22:21', '2019-03-28 10:22:21', 7, 8);

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `uemail` varchar(30) NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `clearedat` int(11) NOT NULL,
  `cby` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`uemail`, `createdat`, `clearedat`, `cby`, `status`) VALUES
('bt@gmail.com', '2019-03-06 04:32:11', 0, 0, 0),
('bdvsvg@gmail.com', '2019-03-06 04:33:57', 0, 0, 0),
('antoh@gmail.com', '2019-03-06 04:36:35', 0, 0, 0),
('antonynyaga@gmail.com', '2019-03-27 10:50:09', 0, 0, 0),
('ngethedennis018@gmail.com', '2019-03-28 10:21:06', 0, 0, 0),
('briantugz@gmail.com', '2019-04-03 11:50:22', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `name` varchar(30) NOT NULL,
  `id` int(11) NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `admin` varchar(30) NOT NULL,
  `pass` varchar(40) NOT NULL,
  `phone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`name`, `id`, `createdat`, `updatedat`, `admin`, `pass`, `phone`) VALUES
('FINANCE', 1, '2019-03-05 20:22:17', '2019-03-05 20:22:17', '', '', 0),
('LIBRARY', 2, '2019-03-05 20:22:17', '2019-03-05 20:22:17', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `regno` varchar(15) NOT NULL,
  `phone` int(10) NOT NULL,
  `course` varchar(10) NOT NULL,
  `pass` varchar(40) NOT NULL,
  `priv` int(11) NOT NULL DEFAULT '1',
  `createdat` int(11) NOT NULL,
  `updatedat` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`fname`, `lname`, `email`, `regno`, `phone`, `course`, `pass`, `priv`, `createdat`, `updatedat`, `id`) VALUES
('MAIN', 'ADMIN', 'admin@admin.com', '', 714359694, '', 'admin123', 0, 0, 0, 3),
('ANTHONY ', 'NYAGA', 'antoh@gmail.com', 'sccj/00251/2015', 713456987, 'BTECH CN', '12345678', 1, 1551844737, 1551844737, 4),
('ANTHONY', 'NYAGA', 'antonynyaga@gmail.com', 'SCCJ/00250/2015', 701975644, 'BTECH CN', '123456an', 1, 1553683029, 1553683029, 6),
('dennis ', 'ngethe', 'ngethedennis018@gmail.com', 'scci/00296/2015', 702887616, 'BTECH CT', 'kakaempire', 1, 1553768412, 1553768412, 7),
('BRIAN', 'MUTUGI', 'briantugz@gmail.com', 'SCCJ/00248/2015', 714359693, 'BTECH CN', '84df608940ad1aec1c8ab33c5cde6a93', 1, 1554292201, 1554292201, 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clearances`
--
ALTER TABLE `clearances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
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
-- AUTO_INCREMENT for table `clearances`
--
ALTER TABLE `clearances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
