-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Dec 11, 2016 at 07:57 AM
-- Server version: 5.5.49-log
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thrones`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `user_pw` varchar(500) NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `admin` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_pw`, `user_date`, `admin`, `score`, `email`) VALUES
(1, 'admin ', 'cs518pa$$', '2016-12-11 07:34:34', 1, 0, 'admin@gmail.com'),
(2, 'jbrunelle', 'M0n@rch$', '2016-12-11 07:36:41', 0, 0, 'jbrunelle@gmail.com'),
(3, 'pvenkman', 'imadoctor', '2016-12-11 07:36:59', 0, 0, 'veena12@gmail.com'),
(4, 'rstantz ";', 'INSERT INTO Customer', '2016-12-11 07:37:14', 0, 0, 'manasa11@gmail.com'),
(5, 'dbarrett', 'fr1ed3GGS', '2016-12-11 07:37:28', 0, 0, 'monica13@gmail.com'),
(6, 'ltully', '<!--<i>', '2016-12-11 07:37:38', 0, 0, 'anusha14@gmail.com'),
(7, 'janine', '--!drop tables;', '2016-12-11 07:37:48', 0, 0, 'iyer15@gmail.com'),
(8, 'winston', 'zeddM0r3', '2016-12-11 07:38:16', 0, 0, 'winston@gmail.com'),
(9, 'gozer', 'd3$truct0R', '2016-12-11 07:38:29', 0, 0, 'gozer@gmail.com'),
(10, 'slimer', 'f33dM3', '2016-12-11 07:38:45', 0, 0, 'Itully@gmail.com'),
(11, 'keymaster', 'n0D@na', '2016-12-11 07:39:00', 0, 0, 'keymaster@gmail.com'),
(12, 'gatekeeper', '$l0r', '2016-12-11 07:39:10', 0, 0, 'gatekeeper@gmail.com'),
(13, 'staypuft', 'm@r$hM@ll0w', '2016-12-11 07:39:22', 0, 0, 'staypuft@gmail.com'),
(14, 'espengler', 'don''t cross the stre', '2016-12-11 07:39:38', 0, 0, 'espengler@gmail.com'),
(15, 'zuul', '105"; DROP TABLE', '2016-12-11 07:39:50', 0, 0, 'zuul@gmail.com'),
(16, 'monica', 'monica', '2016-12-11 07:39:59', 0, 0, 'monica@gmail.com'),
(19, 'sali', 'sali', '2016-12-11 07:56:30', 0, 0, 'sali@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
