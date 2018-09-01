-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2018 at 11:23 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reservationappdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `blockrequests`
--

CREATE TABLE `blockrequests` (
  `request_id` int(11) NOT NULL,
  `field_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `block_resons` text NOT NULL,
  `response` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blockrequests`
--

INSERT INTO `blockrequests` (`request_id`, `field_id`, `user_id`, `block_resons`, `response`) VALUES
(1, 1, 5, 'he acted like a bitch', 0);

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `complaint_id` int(255) NOT NULL,
  `field_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `complaint` text NOT NULL,
  `del_comp` tinyint(1) NOT NULL,
  `aprove` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`complaint_id`, `field_id`, `user_id`, `complaint`, `del_comp`, `aprove`) VALUES
(1, 2, 2, 'Complaint1', 0, 0),
(2, 1, 1, 'kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkoooooooooooooooo', 0, 1),
(3, 1, 2, 'Complaint3', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `field`
--

CREATE TABLE `field` (
  `field_id` int(255) NOT NULL,
  `field_name` varchar(255) NOT NULL,
  `field_size` varchar(255) NOT NULL,
  `field_lat` float NOT NULL,
  `filed_lng` float NOT NULL,
  `field_city` varchar(255) NOT NULL,
  `open_time` time NOT NULL,
  `close_time` time NOT NULL,
  `field_hour_price` double NOT NULL,
  `block_state` tinyint(1) NOT NULL,
  `suspend_resons` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `field`
--

INSERT INTO `field` (`field_id`, `field_name`, `field_size`, `field_lat`, `filed_lng`, `field_city`, `open_time`, `close_time`, `field_hour_price`, `block_state`, `suspend_resons`) VALUES
(1, 'Almjd', '5X15', 0, 0, 'Umdurman', '04:00:00', '12:00:00', 200, 1, ''),
(2, 'Al-sgoor', '5X15', 0, 0, 'um-durmn', '03:00:00', '12:00:00', 200, 1, ''),
(3, '', '', 0, 0, '', '00:00:00', '00:00:00', 0, 0, ''),
(4, 'Almohndseen', '', 0, 0, 'Khartoum', '00:00:00', '00:00:00', 0, 2, ''),
(5, 'Almohndseen', '', 0, 0, 'Khartoum', '00:00:00', '00:00:00', 0, 2, ''),
(6, 'Almohndseen', '', 0, 0, 'Khartoum', '00:00:00', '00:00:00', 0, 0, ''),
(7, 'Almohndseen', '', 0, 0, 'Khartoum', '00:00:00', '00:00:00', 0, 0, ''),
(8, 'Almohndseen', '', 0, 0, 'Khartoum', '00:00:00', '00:00:00', 0, 0, ''),
(9, 'Almohndseen', '', 0, 0, 'Khartoum', '00:00:00', '00:00:00', 0, 0, ''),
(10, 'Almohndseen', '', 0, 0, 'Khartoum', '00:00:00', '00:00:00', 0, 0, ''),
(11, 'Almohndseen', '', 0, 0, 'Khartoum', '00:00:00', '00:00:00', 0, 0, ''),
(12, 'Almohndseen', '', 0, 0, 'Khartoum', '00:00:00', '00:00:00', 0, 0, ''),
(13, 'Alsafya', '', 0, 0, 'Alsafya', '04:00:00', '12:00:00', 0, 2, 'Suspended for being an ass'),
(14, 'hhhh', '', 0, 0, 'Khartoum', '00:00:00', '00:00:00', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `ownership`
--

CREATE TABLE `ownership` (
  `ownership_id` int(255) NOT NULL,
  `field_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ownership`
--

INSERT INTO `ownership` (`ownership_id`, `field_id`, `user_id`) VALUES
(4, 1, 1),
(5, 2, 15),
(7, 13, 59),
(8, 14, 60);

-- --------------------------------------------------------

--
-- Table structure for table `reserve`
--

CREATE TABLE `reserve` (
  `reserve_id` int(255) NOT NULL,
  `field_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `reserve_beginning_time` time NOT NULL,
  `reserve_end_time` time NOT NULL,
  `is_confirmd` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reserve`
--

INSERT INTO `reserve` (`reserve_id`, `field_id`, `user_id`, `reserve_beginning_time`, `reserve_end_time`, `is_confirmd`) VALUES
(4, 1, 2, '05:00:00', '06:00:00', 2),
(36, 1, 61, '05:30:00', '06:30:00', 2),
(37, 1, 62, '05:30:00', '06:30:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(254) NOT NULL,
  `user_name` varchar(254) NOT NULL,
  `user_phone` varchar(254) NOT NULL,
  `user_pass` varchar(254) NOT NULL,
  `block_state` tinyint(1) NOT NULL,
  `block_resons` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_phone`, `user_pass`, `block_state`, `block_resons`) VALUES
(1, 'M Alamen', '0998874521', 'Boors112', 3, ''),
(2, 'halaby', '0999025075', '0', 1, 'lrrjt'),
(5, 'haj', '0987451248', '0', 0, ''),
(15, 'Khaled', '0962241567', 'Boors1123', 3, ''),
(47, 'Admin', '0999555444', 'Boors112', 2, ''),
(58, 'Alngr', '0907900453', '$2y$12$x8xsC78LL9PaMSSTSKRLGOB2W8QArnY/e8rtRmIVdxvs2JZwABKiO', 2, ''),
(59, 'safy', '0999995555', 'Boors112', 3, ''),
(60, 'hhh', '0907900453', '$2y$12$UrK5tm.J6dGcscMGxiPg7OGiSbLyQ5A90/TWklTD2qxCU14raZGPe', 3, ''),
(61, 'naz', '0900244491', '0', 0, ''),
(62, 'fhhg', '0125478963', '0', 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blockrequests`
--
ALTER TABLE `blockrequests`
  ADD PRIMARY KEY (`request_id`),
  ADD UNIQUE KEY `request_id` (`request_id`),
  ADD KEY `request_id_2` (`request_id`),
  ADD KEY `field_id` (`field_id`),
  ADD KEY `blockrequests_ibfk_2` (`user_id`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`complaint_id`),
  ADD UNIQUE KEY `complaint_id` (`complaint_id`),
  ADD KEY `field_id` (`field_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `field`
--
ALTER TABLE `field`
  ADD PRIMARY KEY (`field_id`),
  ADD UNIQUE KEY `field_id` (`field_id`);

--
-- Indexes for table `ownership`
--
ALTER TABLE `ownership`
  ADD PRIMARY KEY (`ownership_id`),
  ADD UNIQUE KEY `ownership_id` (`ownership_id`),
  ADD KEY `ownership_ibfk_1` (`field_id`),
  ADD KEY `ownership_ibfk_2` (`user_id`),
  ADD KEY `ownership_id_2` (`ownership_id`);

--
-- Indexes for table `reserve`
--
ALTER TABLE `reserve`
  ADD PRIMARY KEY (`reserve_id`),
  ADD UNIQUE KEY `reserve_id` (`reserve_id`),
  ADD KEY `reserve_ibfk_1` (`field_id`),
  ADD KEY `reserve_ibfk_2` (`user_id`),
  ADD KEY `reserve_id_2` (`reserve_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `complaint_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `field`
--
ALTER TABLE `field`
  MODIFY `field_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `ownership`
--
ALTER TABLE `ownership`
  MODIFY `ownership_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `reserve`
--
ALTER TABLE `reserve`
  MODIFY `reserve_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blockrequests`
--
ALTER TABLE `blockrequests`
  ADD CONSTRAINT `blockrequests_ibfk_1` FOREIGN KEY (`field_id`) REFERENCES `field` (`field_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `blockrequests_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `complaint`
--
ALTER TABLE `complaint`
  ADD CONSTRAINT `complaint_ibfk_1` FOREIGN KEY (`field_id`) REFERENCES `field` (`field_id`),
  ADD CONSTRAINT `complaint_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `ownership`
--
ALTER TABLE `ownership`
  ADD CONSTRAINT `ownership_ibfk_1` FOREIGN KEY (`field_id`) REFERENCES `field` (`field_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ownership_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reserve`
--
ALTER TABLE `reserve`
  ADD CONSTRAINT `reserve_ibfk_1` FOREIGN KEY (`field_id`) REFERENCES `field` (`field_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reserve_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
