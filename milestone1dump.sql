-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2015 at 09:00 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `stack`
--
CREATE DATABASE IF NOT EXISTS `stack` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `stack`;

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE IF NOT EXISTS `answer` (
  `user_id` int(4) NOT NULL,
  `question_id` int(4) NOT NULL,
`a_id` int(4) NOT NULL,
  `a_answer` longtext NOT NULL,
  `a_datetime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `vote` int(5) NOT NULL DEFAULT '0',
  `like` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`user_id`, `question_id`, `a_id`, `a_answer`, `a_datetime`, `vote`, `like`) VALUES
(4, 1, 1, 'What do you need help with', '2015-02-11 00:02:33', 0, 0),
(1, 1, 2, 'Nintendo 64', '2015-02-28 17:03:45', 0, 0),
(5, 3, 16, 'RPG', '2015-02-28 17:02:30', 0, 0),
(2, 8, 19, 'Let''s find out', '2017-02-15 22:32:04', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `u_id` int(4) NOT NULL,
`q_id` int(4) NOT NULL,
  `topic` varchar(255) NOT NULL,
  `detail` longtext NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `view` int(4) DEFAULT '0',
  `reply` int(4) DEFAULT '0',
  `value` int(5) NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`u_id`, `q_id`, `topic`, `detail`, `datetime`, `view`, `reply`, `value`) VALUES
(1, 3, 'Favorite Genre', 'What is your favorite Video Game genre?', '2015-02-28 17:34:47', 38, 1, 0),
(7, 1, 'What is your favorite console', 'What is your favorite console of all time?', '2015-02-28 15:51:21', 16, 2, 0),
(2, 2, 'Help. Stuck on a level?', 'I need help', '2015-02-28 15:52:02', 0, 0, 0),
(7, 4, 'Favorite game', 'What is your favorite game of all time?', '2015-02-28 15:52:26', 2, 0, 0),
(16, 19, 'Favorite video game character', 'Who is your favorite video game character?\r\nMine is Mario.', '2015-02-28 17:57:56', 3, 0, 0),
(16, 17, 'Weird glitch that happen to me', 'What was weirdest glitch to happen to you during a game?', '2015-02-28 15:53:48', 0, 0, 0),
(1, 8, 'New games this month', 'What games are coming out this month and are they any good?', '2015-02-28 15:54:40', 7, 1, 0),
(16, 9, 'Playstation 4 or Xbox One or WiiU?', 'Which one is your favorite console?', '2015-02-25 18:45:43', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(4) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `picture` longtext NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `picture`) VALUES
(1, 'pallen', 'm$ftw', ''),
(2, 'tblee', '0mGth3WeB!', ''),
(3, 'bourne', 'bash_$', ''),
(4, 'edsger', 'st1ll1l11lG0O2', ''),
(5, 'wgates', '5il3M4X_m$4L', ''),
(6, 'hopper', 'im4usn', ''),
(7, 'dknuth', 'tek!tex', ''),
(8, 'ada', 'wtf15b4b', ''),
(9, 'cmoore', 'moreM00R3!', ''),
(10, 'jresig', 'In0JS', ''),
(11, 'atanen', 'minix!minix', ''),
(12, 'linus', 'ilUvP3nGu1n5', ''),
(13, 'aturing', '1nfin1t3TAp3', ''),
(14, 'lwall', 'oysters&camels', ''),
(15, 'thewoz', '4daK1d5', ''),
(16, 'bwayne', 'bman', 'batman.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
 ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
 ADD PRIMARY KEY (`q_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
MODIFY `a_id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
MODIFY `q_id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
