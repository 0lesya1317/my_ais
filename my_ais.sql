-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2016 at 05:11 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_ais`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `ID` int(64) NOT NULL,
  `season` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`ID`, `season`) VALUES
(4, 'autumn'),
(2, 'spring'),
(3, 'summer'),
(1, 'winter');

-- --------------------------------------------------------

--
-- Table structure for table `cgd`
--

CREATE TABLE `cgd` (
  `category_gd_id` int(64) NOT NULL,
  `gd_category_id` int(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cgd`
--

INSERT INTO `cgd` (`category_gd_id`, `gd_category_id`) VALUES
(1, 1),
(1, 3),
(1, 4),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(3, 1),
(3, 3),
(3, 4),
(3, 5),
(4, 1),
(4, 2),
(4, 3),
(4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `ID` int(64) NOT NULL,
  `last_name` varchar(64) NOT NULL,
  `first_name` varchar(64) NOT NULL,
  `second_name` varchar(64) NOT NULL,
  `country` varchar(32) NOT NULL,
  `city` varchar(32) NOT NULL,
  `street` varchar(128) NOT NULL,
  `contact_number` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`ID`, `last_name`, `first_name`, `second_name`, `country`, `city`, `street`, `contact_number`) VALUES
(1, 'Yaremenko', 'Olesya', 'Olesivna', 'Ukraine', 'Kyiv', 'Ozirna, 24', '+380671111111'),
(2, 'Symonenko', 'Ivan', 'Ivanovych', 'Ukraine', 'Poltava', 'Poltavs''ka,12', '+380978888888'),
(3, 'Tarasov', 'Oleksa', 'Bogdanovych', 'Ukraine', 'Kyiv', 'Kyivs''ka, 1/27', '+380445555555');

-- --------------------------------------------------------

--
-- Table structure for table `contract`
--

CREATE TABLE `contract` (
  `ID` int(64) NOT NULL,
  `ui_id` int(64) NOT NULL,
  `client_id` int(64) NOT NULL,
  `admin_id` int(64) NOT NULL,
  `user_id` int(64) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contract`
--

INSERT INTO `contract` (`ID`, `ui_id`, `client_id`, `admin_id`, `user_id`, `date_start`, `date_end`) VALUES
(1, 4, 1, 1, 2, '2016-04-03', '2016-04-13'),
(2, 1, 2, 1, 2, '2016-04-01', '2016-04-08'),
(3, 10, 3, 1, 2, '2016-03-06', '2016-04-20'),
(4, 2, 3, 1, 2, '2015-04-03', '2015-04-27'),
(5, 3, 1, 1, 2, '2016-02-07', '2016-03-07'),
(13, 5, 1, 1, 2, '2016-03-03', '2016-04-13'),
(14, 6, 2, 1, 2, '2016-01-01', '2016-04-08'),
(15, 7, 3, 1, 2, '2016-02-06', '2016-03-20'),
(16, 8, 3, 1, 2, '2015-05-03', '2015-05-27'),
(17, 9, 1, 1, 2, '2015-02-07', '2015-03-07');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `ID` int(64) NOT NULL,
  `last_name` varchar(64) NOT NULL,
  `first_name` varchar(64) NOT NULL,
  `second_name` varchar(64) NOT NULL,
  `login` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `role` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`ID`, `last_name`, `first_name`, `second_name`, `login`, `password`, `role`) VALUES
(1, 'Administrator', 'Artur', 'Andrijovych', 'Admin', '179edfe73d9c016b51e9dc77ae0eebb1', 'admin'),
(2, 'Prosta', 'Kateryna', 'Kyrylivna', 'User', '871c429757b7a0bf1654fad112b77bd4', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `groupdescription`
--

CREATE TABLE `groupdescription` (
  `ID` int(64) NOT NULL,
  `type` varchar(64) NOT NULL,
  `made_by` varchar(64) DEFAULT NULL,
  `material` varchar(128) DEFAULT NULL,
  `other_info` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groupdescription`
--

INSERT INTO `groupdescription` (`ID`, `type`, `made_by`, `material`, `other_info`) VALUES
(1, 'Tent', 'Terra Incognita', 'Polyester', 'For 2 persons'),
(2, 'Spalnyk', 'Terra Incognita', NULL, NULL),
(3, 'Naplechnyk', 'Deuter', NULL, 'Volume = 35l'),
(4, 'Naplechnyk', 'Tatonka', NULL, 'Volume = 50l'),
(5, 'Tent', 'Tatonka', 'Cotton', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `uniqueitem`
--

CREATE TABLE `uniqueitem` (
  `ID` int(64) NOT NULL,
  `color` varchar(32) DEFAULT NULL,
  `gd_id` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uniqueitem`
--

INSERT INTO `uniqueitem` (`ID`, `color`, `gd_id`) VALUES
(1, 'green', 1),
(2, 'black', 1),
(3, 'blue', 2),
(4, 'red', 2),
(5, 'yellow', 3),
(6, 'orange', 3),
(7, 'blue', 4),
(8, 'black', 4),
(9, NULL, 5),
(10, 'white', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `season` (`season`);

--
-- Indexes for table `cgd`
--
ALTER TABLE `cgd`
  ADD PRIMARY KEY (`category_gd_id`,`gd_category_id`),
  ADD KEY `gd_category_id` (`gd_category_id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `contract`
--
ALTER TABLE `contract`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `contract_ibfk_1` (`admin_id`),
  ADD KEY `contract_ibfk_2` (`user_id`),
  ADD KEY `contract_ibfk_3` (`ui_id`),
  ADD KEY `ID` (`ID`),
  ADD KEY `client_id` (`client_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `login` (`login`);

--
-- Indexes for table `groupdescription`
--
ALTER TABLE `groupdescription`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `uniqueitem`
--
ALTER TABLE `uniqueitem`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `gd_id` (`gd_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `ID` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `contract`
--
ALTER TABLE `contract`
  MODIFY `ID` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `ID` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cgd`
--
ALTER TABLE `cgd`
  ADD CONSTRAINT `cgd_ibfk_1` FOREIGN KEY (`gd_category_id`) REFERENCES `groupdescription` (`ID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `cgd_ibfk_2` FOREIGN KEY (`category_gd_id`) REFERENCES `category` (`ID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `contract`
--
ALTER TABLE `contract`
  ADD CONSTRAINT `contract_ibfk_4` FOREIGN KEY (`ui_id`) REFERENCES `uniqueitem` (`ID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `contract_ibfk_5` FOREIGN KEY (`client_id`) REFERENCES `client` (`ID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `contract_ibfk_6` FOREIGN KEY (`admin_id`) REFERENCES `employee` (`ID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `contract_ibfk_7` FOREIGN KEY (`user_id`) REFERENCES `employee` (`ID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `uniqueitem`
--
ALTER TABLE `uniqueitem`
  ADD CONSTRAINT `uniqueitem_ibfk_1` FOREIGN KEY (`gd_id`) REFERENCES `groupdescription` (`ID`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
