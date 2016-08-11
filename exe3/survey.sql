-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 09, 2015 at 10:45 AM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `survey`
--

-- --------------------------------------------------------

--
-- Table structure for table `sports`
--

CREATE TABLE IF NOT EXISTS `sports` (
  `uid` int(11) NOT NULL,
  `sport` varchar(255) DEFAULT '--'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sports`
--

INSERT INTO `sports` (`uid`, `sport`) VALUES
(1, 'volley'),
(1, '--'),
(1, '--'),
(2, 'skiing'),
(2, 'swimming'),
(2, '--'),
(3, 'skiing'),
(3, 'swimming'),
(3, '--'),
(4, 'tennis'),
(4, 'volley'),
(4, 'skiing'),
(5, 'new'),
(5, 'volley'),
(5, '--');

-- --------------------------------------------------------

--
-- Table structure for table `survey`
--

CREATE TABLE IF NOT EXISTS `survey` (
`id` int(11) NOT NULL,
  `first_name` varchar(16) DEFAULT NULL,
  `last_name` varchar(16) DEFAULT NULL,
  `age` int(3) DEFAULT NULL,
  `sport1` varchar(255) DEFAULT NULL,
  `sport2` varchar(255) DEFAULT NULL,
  `sport3` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `reward` float DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `survey`
--

INSERT INTO `survey` (`id`, `first_name`, `last_name`, `age`, `sport1`, `sport2`, `sport3`, `email`, `reward`) VALUES
(1, 'xufeng', 'cheng', 25, 'volley', '--', '--', 'chengxu@gmail.com', 50),
(2, 'dskjfs', 'jsdn', 48, 'skiing', 'swimming', '--', 'mario@gmail.com', 25),
(3, 'Mario', 'Bouttino', 43, 'skiing', 'swimming', '--', 'mario@polito.it', 12.5),
(4, 'Paolo', 'Bottino', 30, 'tennis', 'volley', 'skiing', 'paolo@hotmail.com', 6.25),
(5, 'Monica', 'Baldi', 19, 'new', 'volley', '--', 'monica@foxmail.com', 3.125);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sports`
--
ALTER TABLE `sports`
 ADD KEY `uid` (`uid`);

--
-- Indexes for table `survey`
--
ALTER TABLE `survey`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `survey`
--
ALTER TABLE `survey`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `sports`
--
ALTER TABLE `sports`
ADD CONSTRAINT `sports_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `survey` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
