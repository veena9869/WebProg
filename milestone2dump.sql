-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Nov 01, 2016 at 07:45 AM
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
CREATE DATABASE IF NOT EXISTS `thrones` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `thrones`;

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

DROP TABLE IF EXISTS `answer`;
CREATE TABLE IF NOT EXISTS `answer` (
  `a_id` int(11) NOT NULL,
  `a_asker` varchar(20) NOT NULL,
  `a_topic` varchar(500) NOT NULL,
  `a_content` text NOT NULL,
  `a_rating` int(11) NOT NULL,
  `a_order` int(11) NOT NULL,
  `a_best` int(11) NOT NULL,
  `a_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`a_id`, `a_asker`, `a_topic`, `a_content`, `a_rating`, `a_order`, `a_best`, `a_timestamp`) VALUES
(1, 'pvenkman', '', 'she did not have any option', 1, 1, 1, '0000-00-00 00:00:00'),
(2, 'jbrunelle', '', 'She will not die', 0, 2, 1, '0000-00-00 00:00:00'),
(4, 'pvenkman', '', 'She was shocked as he had blood of aking', 0, 3, 1, '0000-00-00 00:00:00'),
(1, 'admin', '', '123', -1, 4, 0, '0000-00-00 00:00:00'),
(1, 'admin', '', 'to servive', 0, 5, 0, '2016-10-28 15:49:35');

-- --------------------------------------------------------

--
-- Table structure for table `answer_votes`
--

DROP TABLE IF EXISTS `answer_votes`;
CREATE TABLE IF NOT EXISTS `answer_votes` (
  `vid` int(11) NOT NULL,
  `v_aorder` int(11) NOT NULL,
  `v_uid` int(11) NOT NULL,
  `vote` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `answer_votes`
--

INSERT INTO `answer_votes` (`vid`, `v_aorder`, `v_uid`, `vote`) VALUES
(3, 1, 1, 1),
(4, 4, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

DROP TABLE IF EXISTS `question`;
CREATE TABLE IF NOT EXISTS `question` (
  `q_id` int(11) NOT NULL,
  `q_asker` varchar(20) NOT NULL,
  `q_title` varchar(500) NOT NULL,
  `q_content` text NOT NULL,
  `q_value` int(11) NOT NULL,
  `q_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`q_id`, `q_asker`, `q_title`, `q_content`, `q_value`, `q_timestamp`) VALUES
(1, 'admin', 'Why does Arya want to go to Braavos?\r\n', 'At this episode 4 why does Arya want to go to Braavos?\r\n\r\n', 1, '0000-00-00 00:00:00'),
(2, 'admin', 'Who will kill Circy', 'How does Circy meet her death?', 0, '0000-00-00 00:00:00'),
(3, 'jbrunelle', 'Where is Gendry', 'Where is he gone', 0, '0000-00-00 00:00:00'),
(4, 'jbrunelle', ' Why did Melisandre look so fascinated by Jon Snow?', 'Why was she amazed by looking at him', 0, '0000-00-00 00:00:00'),
(5, 'pvenkman', 'Is the Hound dead?', 'Was he left by Arya to die?', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `question_votes`
--

DROP TABLE IF EXISTS `question_votes`;
CREATE TABLE IF NOT EXISTS `question_votes` (
  `qvid` int(11) NOT NULL,
  `qv_qid` int(11) NOT NULL,
  `qv_uid` int(11) NOT NULL,
  `qv_vote` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `user_pw` varchar(500) NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_pw`, `user_date`) VALUES
(1, 'admin ', 'cs518pa$$', '2016-10-26 09:05:18'),
(2, 'jbrunelle', 'M0n@rch$', '2016-10-26 09:05:59'),
(3, 'pvenkman', 'imadoctor', '2016-10-26 09:06:38'),
(4, 'rstantz ";', 'INSERT INTO Customer', '2016-10-26 09:07:31'),
(5, 'dbarrett', 'fr1ed3GGS', '2016-10-26 09:08:00'),
(6, 'ltully', '<!--<i>', '2016-10-26 09:08:31'),
(7, 'janine', '--!drop tables;', '2016-10-26 09:09:07'),
(8, 'winston', 'zeddM0r3', '2016-10-26 09:09:29'),
(9, 'gozer', 'd3$truct0R', '2016-10-26 09:09:53'),
(10, 'slimer', 'f33dM3', '2016-10-26 09:10:13'),
(11, 'keymaster', 'n0D@na', '2016-10-26 09:10:45'),
(12, 'gatekeeper', '$l0r', '2016-10-26 09:11:27'),
(13, 'staypuft', 'm@r$hM@ll0w', '2016-10-26 09:11:51'),
(14, 'espengler', 'don''t cross the stre', '2016-10-26 09:12:55'),
(15, 'zuul', '105"; DROP TABLE', '2016-10-26 09:14:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`a_order`);

--
-- Indexes for table `answer_votes`
--
ALTER TABLE `answer_votes`
  ADD PRIMARY KEY (`vid`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`q_id`);

--
-- Indexes for table `question_votes`
--
ALTER TABLE `question_votes`
  ADD PRIMARY KEY (`qvid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `a_order` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `answer_votes`
--
ALTER TABLE `answer_votes`
  MODIFY `vid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `question_votes`
--
ALTER TABLE `question_votes`
  MODIFY `qvid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
