-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 14, 2015 at 11:01 AM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `conference`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
`reservid` int(10) unsigned NOT NULL,
  `user` varchar(16) DEFAULT NULL,
  `participant` int(11) DEFAULT NULL,
  `starttime` varchar(10) DEFAULT NULL,
  `endtime` varchar(10) DEFAULT NULL,
  `sth` int(11) DEFAULT NULL,
  `stm` int(11) DEFAULT NULL,
  `eth` int(11) DEFAULT NULL,
  `etm` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`reservid`, `user`, `participant`, `starttime`, `endtime`, `sth`, `stm`, `eth`, `etm`) VALUES
(2, 'cc', 30, '12:00', '13:15', 12, 0, 1, 3),
(4, 'kk', 60, '12:15', '15:30', 12, 15, 1, 5),
(6, 'cheng', 5, '12:30', '16:30', 12, 30, 1, 6),
(7, 'cheng', 30, '13:30', '16:20', 13, 30, 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user` varchar(16) DEFAULT NULL,
  `pass` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user`, `pass`) VALUES
('cc', '1234'),
('kk', '12345'),
('cheng', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
 ADD PRIMARY KEY (`reservid`), ADD KEY `user` (`user`(6));

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD KEY `user` (`user`(6));

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
MODIFY `reservid` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
