-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Dec 13, 2016 at 07:02 PM
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
  `a_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `a_asker_score` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`a_id`, `a_asker`, `a_topic`, `a_content`, `a_rating`, `a_order`, `a_best`, `a_timestamp`, `a_asker_score`) VALUES
(1, 'pvenkman', '', 'she did not have any option', 1, 1, 1, '0000-00-00 00:00:00', 0),
(2, 'jbrunelle', '', 'She will not die', 0, 2, 1, '0000-00-00 00:00:00', 1),
(4, 'pvenkman', '', 'She was shocked as he had blood of aking', 0, 3, 1, '0000-00-00 00:00:00', 0),
(1, 'admin', '', '123', -1, 4, 0, '0000-00-00 00:00:00', 1),
(1, 'admin', '', 'to servive', 0, 5, 0, '2016-10-28 15:49:35', 1),
(1, 'slimer', '', 'Hellooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo', 0, 6, 0, '2016-11-22 08:26:54', 0),
(1, 'slimer', '', '123,vmsdkv sdmasdk.AdKLMD', 0, 7, 0, '2016-11-22 08:27:29', 0),
(4, 'slimer', '', '<div class="header">\r\n    <h1>Welcome to Web Tuts</h1>\r\n</div>', 0, 8, 0, '2016-11-22 13:54:36', 0),
(4, 'slimer', '', '<div class="header">\r\n    <h1>Welcome to Web Tuts</h1>\r\n</div>', 0, 9, 0, '2016-11-22 13:54:59', 0),
(4, 'slimer', '', '.header h1 {\r\n    margin-top: 0;\r\n}', 0, 10, 0, '2016-11-22 13:55:33', 0),
(4, 'slimer', '', '<nav class="navbar navbar-default">\r\n  <div class="container-fluid">\r\n    <!-- Brand and toggle get grouped for better mobile display -->\r\n    <div class="navbar-header">\r\n      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">\r\n        <span class="sr-only">Toggle navigation</span>\r\n        <span class="icon-bar"></span>\r\n        <span class="icon-bar"></span>\r\n        <span class="icon-bar"></span>\r\n      </button>\r\n      <a class="navbar-brand" href="#">Brand</a>\r\n    </div>\r\n', 0, 11, 0, '2016-11-22 13:56:00', 0),
(4, 'admin', '', '&lt;p&gt;&lt;img alt=&quot;Image result for john snow got&quot; src=&quot;http://screenrant.com/wp-content/uploads/Game-of-Thrones-Finale-Jon-Snow-Dead-Killed.jpg&quot; /&gt;&lt;/p&gt;\r\n', 0, 12, 0, '2016-11-22 14:48:25', 1),
(1, 'admin', '', '&lt;p&gt;thtjfuytjuy&lt;/p&gt;\r\n', 0, 13, 0, '2016-11-22 15:28:15', 1),
(1, 'anusha', '', '&lt;p&gt;asas&lt;/p&gt;\r\n', 0, 14, 0, '2016-12-10 02:26:11', 0);

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
-- Table structure for table `avatar`
--

DROP TABLE IF EXISTS `avatar`;
CREATE TABLE IF NOT EXISTS `avatar` (
  `avatarid` int(11) NOT NULL,
  `avatar_uid` int(11) NOT NULL,
  `filename` varchar(200) NOT NULL,
  `filetype` int(11) NOT NULL,
  `avataruname` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `avatar`
--

INSERT INTO `avatar` (`avatarid`, `avatar_uid`, `filename`, `filetype`, `avataruname`) VALUES
(2, 2, '1.jpg', 0, ''),
(3, 3, '2.jpg', 0, ''),
(4, 1, 'now image1.jpg', 0, '');

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
  `q_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `freeze` int(11) NOT NULL,
  `asker_score` int(11) NOT NULL,
  `tags` varchar(1000) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`q_id`, `q_asker`, `q_title`, `q_content`, `q_value`, `q_timestamp`, `freeze`, `asker_score`, `tags`) VALUES
(1, 'admin', 'Why does Arya want to go to Braavos?\r\n', 'At this episode 4 why does Arya want to go to Braavos?\r\n\r\n', 2, '0000-00-00 00:00:00', 0, 1, ''),
(2, 'admin', 'Who will kill Circy', 'How does Circy meet her death?', 2, '0000-00-00 00:00:00', 0, 1, ''),
(3, 'jbrunelle', 'Where is Gendry', 'Where is he gone', 1, '0000-00-00 00:00:00', 0, 1, ''),
(4, 'jbrunelle', ' Why did Melisandre look so fascinated by Jon Snow?', 'Why was she amazed by looking at him', 2, '0000-00-00 00:00:00', 0, 1, ''),
(5, 'pvenkman', 'Is the Hound dead?', 'Was he left by Arya to die?', 0, '0000-00-00 00:00:00', 0, 0, ''),
(6, 'admin', '           who is this guy???? hjvhb jhbjj jknu', '<p><img alt="Image result for john snow got" src="http://screenrant.com/wp-content/uploads/Game-of-Thrones-Finale-Jon-Snow-Dead-Killed.jpg" /></p>\r\n', 0, '2016-11-22 14:35:17', 0, 1, ''),
(8, 'admin', '           test', '&lt;p&gt;test&lt;/p&gt;\r\n', 1, '2016-11-22 16:43:27', 0, 1, ''),
(9, 'jbrunelle', '           test for score', '&lt;p&gt;test for score&lt;/p&gt;\r\n', 1, '2016-12-10 02:17:12', 0, 1, '');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `question_votes`
--

INSERT INTO `question_votes` (`qvid`, `qv_qid`, `qv_uid`, `qv_vote`) VALUES
(1, 2, 1, 1),
(2, 8, 1, 1),
(3, 9, 0, 1),
(4, 4, 0, 0),
(5, 3, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE IF NOT EXISTS `type` (
  `t_id` int(11) NOT NULL,
  `t_name` varchar(2000) NOT NULL,
  `t_description` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `user_pw` varchar(500) NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `admin` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `tags` varchar(1000) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_pw`, `user_date`, `admin`, `score`, `email`, `tags`) VALUES
(1, 'admin ', 'cs518pa$$', '2016-12-13 03:35:55', 1, 1, 'admin@gmail.com', ''),
(2, 'jbrunelle', 'M0n@rch$', '2016-12-13 03:36:25', 0, 1, 'jbrunelle@gmail.com', ''),
(3, 'pvenkman', 'imadoctor', '2016-12-13 03:36:39', 0, 0, 'pvenkman@yahoo.com', ''),
(4, 'rstantz ";', 'INSERT INTO Customer', '2016-12-13 03:36:48', 0, 0, 'stanz@gmail.com', ''),
(5, 'dbarrett', 'fr1ed3GGS', '2016-12-13 03:36:58', 0, 0, 'dbarrett@gmail.com', ''),
(6, 'ltully', '<!--<i>', '2016-12-13 03:37:07', 0, 0, 'itully@gmail.com', ''),
(7, 'janine', '--!drop tables;', '2016-12-13 03:37:17', 0, 0, 'jnanine@yahoo.com', ''),
(8, 'winston', 'zeddM0r3', '2016-12-13 03:37:29', 0, 0, 'zed@some.com', ''),
(9, 'gozer', 'd3$truct0R', '2016-12-13 03:37:36', 0, 0, 'gozer@gmail.com', ''),
(10, 'slimer', 'f33dM3', '2016-12-13 03:37:43', 0, 0, 'slimer@gmail.com', ''),
(11, 'keymaster', 'n0D@na', '2016-12-13 03:38:20', 0, 0, 'keymaster@gmail.com', ''),
(12, 'gatekeeper', '$l0r', '2016-12-13 03:38:30', 0, 0, 'gatekeeper@yahoo.com', ''),
(13, 'staypuft', 'm@r$hM@ll0w', '2016-12-13 03:38:40', 0, 0, 'stay@yahoo.com', ''),
(14, 'espengler', 'don''t cross the stre', '2016-12-13 03:38:53', 0, 0, 'espengler@gmail.com', ''),
(15, 'zuul', '105"; DROP TABLE', '2016-12-13 03:39:00', 0, 0, 'zuul@yahoo.com', ''),
(16, 'monica', 'monica', '2016-12-13 03:39:08', 0, 0, 'monica@yahoo.com', ''),
(17, 'anusha', 'anusha', '2016-12-13 03:39:18', 0, 0, 'anusha@gmail.com', '');

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
-- Indexes for table `avatar`
--
ALTER TABLE `avatar`
  ADD PRIMARY KEY (`avatarid`);

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
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`t_id`);

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
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `a_order` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `answer_votes`
--
ALTER TABLE `answer_votes`
  MODIFY `vid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `avatar`
--
ALTER TABLE `avatar`
  MODIFY `avatarid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `question_votes`
--
ALTER TABLE `question_votes`
  MODIFY `qvid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
