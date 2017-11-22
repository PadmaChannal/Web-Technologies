-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 22, 2017 at 06:31 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yoga`
--

-- --------------------------------------------------------

--
-- Table structure for table `Class`
--

CREATE TABLE `Class` (
  `ClassId` int(100) NOT NULL,
  `Classname` varchar(100) NOT NULL,
  `Description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Class`
--

INSERT INTO `Class` (`ClassId`, `Classname`, `Description`) VALUES
(1, 'Gentle Hatha Yoga', 'Intended for beginners and anyone who is wishing a grounded foundation in the practice of Yoga, this 60 minute class of poses and slow movement focusses on asana (proper alignment and posture), pranayama ( breathing), and guided meditation to foster your mind and body concentartion.'),
(2, 'Vinyasa Yoga', 'Although designed for intermediate to advanced students, beginners are welcome to  sample this 60 minute class that focusses on beadth synchronised movement- you will inhale and exhale as you flow energitically through yoga poses.'),
(3, 'Restorative Yoga', 'The 90  minute features very slow movement and long poses that are supported by chair or a wall. This clamming and restorative experince is suitable for students of any leel of experience. This practice can be a perfect ay to help rehabilitate an injury.');

-- --------------------------------------------------------

--
-- Table structure for table `Client`
--

CREATE TABLE `Client` (
  `ClientId` int(100) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Address` varchar(1000) NOT NULL,
  `Phone` bigint(15) NOT NULL,
  `Email` varchar(1000) NOT NULL,
  `Password` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Client`
--

INSERT INTO `Client` (`ClientId`, `Name`, `Address`, `Phone`, `Email`, `Password`) VALUES
(1, 'Padmavati Channal', '904 Greek Row Dr', 6822562048, 'padmahchannal@gmail.com', 'Padmavati@gmail.com!2345'),
(2, 'John', '456 Montogomery street', 2345673879, 'john@gmail.com', '123457635'),
(3, 'Matt', '564 San francisco', 2653486378, 'matt@gmail.com', 'Pthsrgdk@gmail.com'),
(4, 'Anny', '675 Sattle', 7538496378, 'anny@gmail.com', 'PafgsthW123@@#ht'),
(5, 'Monica', '356 Lincoln', 6345637849, 'Monica@gmail.com', 'Adhrths@1424hnkca');

-- --------------------------------------------------------

--
-- Table structure for table `Client-Schedule`
--

CREATE TABLE `Client-Schedule` (
  `ClientId` int(11) NOT NULL,
  `TimeId` int(11) NOT NULL,
  `ClassId` int(11) NOT NULL,
  `DaysId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Client-Schedule`
--

INSERT INTO `Client-Schedule` (`ClientId`, `TimeId`, `ClassId`, `DaysId`) VALUES
(1, 6, 1, 1),
(2, 4, 3, 2),
(3, 4, 2, 1),
(4, 7, 2, 2),
(5, 4, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Contact`
--

CREATE TABLE `Contact` (
  `Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Comments` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Contact`
--

INSERT INTO `Contact` (`Name`, `Email`, `Comments`) VALUES
('', '', ''),
('jiggy', 'jigggy@gmail.com', 'what is session charges?'),
('Kishor', 'kishorchannal@gmail.com', 'What other yoga can I learn?'),
('Kushal', 'kushalchannal@gmail.com', 'What are the charges?'),
('Padma', 'padma.channal@gmail.com', 'Can I take class from home?'),
('Padmavati Channal', 'padmahchannal@gmail.com', '904 Greek Row Dr, #219 Apt University Village');

-- --------------------------------------------------------

--
-- Table structure for table `Days`
--

CREATE TABLE `Days` (
  `DaysId` int(100) NOT NULL,
  `DaysName` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Days`
--

INSERT INTO `Days` (`DaysId`, `DaysName`) VALUES
(1, 'Monday-Friday'),
(2, 'Saturday-Sunday');

-- --------------------------------------------------------

--
-- Table structure for table `Schedule`
--

CREATE TABLE `Schedule` (
  `scheduleID` int(11) NOT NULL,
  `TimeId` int(100) NOT NULL,
  `ClassId` int(100) NOT NULL,
  `DaysId` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Schedule`
--

INSERT INTO `Schedule` (`scheduleID`, `TimeId`, `ClassId`, `DaysId`) VALUES
(1, 1, 1, 1),
(2, 2, 2, 1),
(3, 3, 3, 1),
(4, 4, 1, 1),
(5, 2, 1, 2),
(6, 5, 2, 2),
(7, 6, 1, 2),
(8, 7, 2, 2),
(9, 3, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `Time`
--

CREATE TABLE `Time` (
  `TimeId` int(11) NOT NULL,
  `TimeName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Time`
--

INSERT INTO `Time` (`TimeId`, `TimeName`) VALUES
(1, '9:00 am'),
(2, '10:30 am'),
(3, '5:30 pm'),
(4, '7:00 pm'),
(5, 'noon'),
(6, '1:30 pm'),
(7, '3:00 pm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Class`
--
ALTER TABLE `Class`
  ADD PRIMARY KEY (`ClassId`);

--
-- Indexes for table `Client`
--
ALTER TABLE `Client`
  ADD PRIMARY KEY (`ClientId`);

--
-- Indexes for table `Client-Schedule`
--
ALTER TABLE `Client-Schedule`
  ADD KEY `clientschedule_time_fk` (`TimeId`),
  ADD KEY `clientschedule_class_fk` (`ClassId`),
  ADD KEY `clientschedule_days_fk` (`DaysId`),
  ADD KEY `clientschedule_client_fk` (`ClientId`);

--
-- Indexes for table `Contact`
--
ALTER TABLE `Contact`
  ADD PRIMARY KEY (`Name`);

--
-- Indexes for table `Days`
--
ALTER TABLE `Days`
  ADD PRIMARY KEY (`DaysId`);

--
-- Indexes for table `Schedule`
--
ALTER TABLE `Schedule`
  ADD PRIMARY KEY (`scheduleID`),
  ADD KEY `schedule_time` (`TimeId`),
  ADD KEY `schedule_class` (`ClassId`),
  ADD KEY `schedule_days` (`DaysId`);

--
-- Indexes for table `Time`
--
ALTER TABLE `Time`
  ADD PRIMARY KEY (`TimeId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Class`
--
ALTER TABLE `Class`
  MODIFY `ClassId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Client`
--
ALTER TABLE `Client`
  MODIFY `ClientId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `Days`
--
ALTER TABLE `Days`
  MODIFY `DaysId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Schedule`
--
ALTER TABLE `Schedule`
  MODIFY `scheduleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `Time`
--
ALTER TABLE `Time`
  MODIFY `TimeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Client-Schedule`
--
ALTER TABLE `Client-Schedule`
  ADD CONSTRAINT `clientschedule_class_fk` FOREIGN KEY (`ClassId`) REFERENCES `Class` (`ClassId`),
  ADD CONSTRAINT `clientschedule_client_fk` FOREIGN KEY (`ClientId`) REFERENCES `Client` (`ClientId`),
  ADD CONSTRAINT `clientschedule_days_fk` FOREIGN KEY (`DaysId`) REFERENCES `Days` (`DaysId`),
  ADD CONSTRAINT `clientschedule_time_fk` FOREIGN KEY (`TimeId`) REFERENCES `Time` (`TimeId`);

--
-- Constraints for table `Schedule`
--
ALTER TABLE `Schedule`
  ADD CONSTRAINT `schedule_class` FOREIGN KEY (`ClassId`) REFERENCES `Class` (`ClassId`),
  ADD CONSTRAINT `schedule_days` FOREIGN KEY (`DaysId`) REFERENCES `Days` (`DaysId`),
  ADD CONSTRAINT `schedule_time` FOREIGN KEY (`TimeId`) REFERENCES `Time` (`TimeId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
