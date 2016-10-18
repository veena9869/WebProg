-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Oct 18, 2016 at 04:49 PM
-- Server version: 5.5.49-log
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `question&answer_website`
--
CREATE DATABASE IF NOT EXISTS `question&answer_website` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `question&answer_website`;

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

DROP TABLE IF EXISTS `answer`;
CREATE TABLE IF NOT EXISTS `answer` (
  `aid` int(11) NOT NULL,
  `qid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `Answer` longtext CHARACTER SET utf8 NOT NULL,
  `vote_count` int(11) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Correct_Answer` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`aid`, `qid`, `uid`, `Answer`, `vote_count`, `creation_date`, `Correct_Answer`) VALUES
(1, 1, 2, 'by using split("\\.")', 0, '2016-10-18 16:13:53', 0),
(2, 2, 2, 'iphone', 0, '2016-10-18 16:05:35', 0),
(9, 4, 1, 'hello', 0, '2016-10-17 14:36:52', 1),
(10, 2, 1, 'asdfgh', 0, '2016-10-18 16:05:35', 0),
(11, 2, 1, 'asdf', 0, '2017-10-16 20:43:37', 0),
(12, 6, 1, ',jsmzxx z', 0, '2017-10-17 01:31:15', 0),
(13, 2, 1, 'hbjnbama', 0, '2016-10-18 16:05:35', 0),
(14, 1, 1, 'asmbjsdz', 0, '2016-10-18 16:13:53', 1);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `qid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `Title` varchar(800) CHARACTER SET utf8 NOT NULL,
  `Description` longtext CHARACTER SET utf8 NOT NULL,
  `Vote_Count` int(11) NOT NULL,
  `Answer_Count` int(11) NOT NULL,
  `Date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`qid`, `uid`, `Title`, `Description`, `Vote_Count`, `Answer_Count`, `Date_created`) VALUES
(1, 1, 'how to use split ?', 'how to use split with "."', 0, 1, '2016-10-18 16:05:04'),
(2, 2, 'which phone is better iphone or samsung?', 'I need to gift a phone to my friend who is into photography which phone is better for this requirement?', 0, 4, '2016-10-18 08:28:04'),
(4, 1, 'what is the specification of iphone camera?', 'what is the shutter speed in front camera of an iphone?', 0, 1, '2016-10-17 14:36:24'),
(5, 1, 'ajnsam', 'ask,nasa', 0, 0, '2017-10-16 13:22:38'),
(6, 1, 'sajbas', 'sajsnmxs ', 0, 1, '2016-10-17 21:31:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(4) NOT NULL,
  `username` varchar(100) CHARACTER SET utf8 NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `username`, `password`) VALUES
(1, 'admin ', 'cs518pa$$'),
(2, 'jbrunelle ', 'M0n@rch$'),
(3, 'pvenkman', 'imadoctor'),
(4, 'dbarrett', 'fr1ed3GGS'),
(5, 'winston', 'zeddM0r3'),
(6, 'gozer', 'd3$truct0R'),
(7, 'slimer', 'f33dM3'),
(13, 'keymaster', 'n0D@na'),
(14, 'gatekeeper', '$l0r'),
(15, 'staypuft', 'm@r$hM@ll0w'),
(16, 'rstantz', '"; INSERT INTO Customers (CustomerName,Address,City) Values(@0,@1,@2); --');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
