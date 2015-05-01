-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2015 at 01:01 PM
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
  `a_datetime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `vote` int(5) NOT NULL DEFAULT '0',
  `like` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`user_id`, `question_id`, `a_id`, `a_answer`, `a_datetime`, `vote`, `like`) VALUES
(4, 1, 1, 'Sega Dreamcast RIP :(', '2015-03-15 19:10:33', 1, 0),
(1, 1, 2, 'Nintendo 64', '2015-03-15 19:10:21', 20, 1),
(5, 3, 3, 'RPG', '2015-03-15 19:10:44', 1, 0),
(2, 8, 4, 'Let''s find out', '2015-03-15 19:10:52', -50, 0),
(10, 11, 20, 'Master Chief from HALO', '2015-03-16 17:16:24', 1, 0),
(2, 3, 19, 'Puzzle', '2015-03-16 17:16:24', -1, 0),
(11, 3, 18, 'Adventure', '2015-03-16 17:16:24', 0, 0),
(5, 3, 17, 'Fighting  MORTAL KOMBAT!!', '2015-03-16 17:16:24', 1, 0),
(1, 3, 16, 'Racing', '2015-03-16 17:16:24', -1, 1),
(4, 3, 15, 'Multiplayer', '2015-03-16 17:16:24', 0, 0),
(12, 3, 14, 'Third-Person Shooter', '2015-03-16 17:16:24', 0, 0),
(16, 3, 13, 'Horror', '2015-03-16 17:16:24', 0, 0),
(4, 3, 12, 'Action', '2015-03-16 17:16:24', 0, 0),
(13, 1, 10, 'Game Boy', '2015-03-15 10:16:25', 1, 0),
(14, 1, 7, 'Sega Genesis', '2015-03-16 17:05:37', 0, 0),
(16, 1, 9, 'Playstation', '2015-03-15 12:33:44', 0, 0),
(8, 1, 8, 'The original XBOX', '2015-03-16 17:09:49', 0, 0),
(9, 1, 6, 'Super Nintendo Entertainment System', '2015-03-16 17:05:28', 0, 0),
(2, 1, 5, 'PlayStation 2', '2015-03-16 17:00:00', 0, 0),
(1, 11, 21, 'Sonic the Hedgehog', '2015-03-16 17:16:24', 1, 1),
(5, 11, 22, 'Scorpion from MK. GET OVER HERE!!', '2015-03-16 17:19:17', 0, 0),
(11, 11, 23, 'Lara Croft', '2015-03-16 17:19:17', 0, 0),
(5, 11, 24, 'Samus', '2015-03-16 17:19:17', 0, 0),
(1, 4, 25, 'Mario Kart 64', '2016-03-15 20:48:40', 1, 0),
(16, 11, 26, 'Good answers', '2027-03-15 09:03:50', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `questag`
--

CREATE TABLE IF NOT EXISTS `questag` (
`qt_id` int(11) NOT NULL,
  `question` int(11) NOT NULL,
  `tag` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questag`
--

INSERT INTO `questag` (`qt_id`, `question`, `tag`) VALUES
(1, 12, 1),
(2, 12, 2),
(3, 12, 3),
(4, 1, 1),
(5, 2, 1);

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
  `value` int(5) NOT NULL DEFAULT '0',
  `freeze` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`u_id`, `q_id`, `topic`, `detail`, `datetime`, `view`, `reply`, `value`, `freeze`) VALUES
(1, 3, 'Favorite Genre', 'What is your favorite Video Game genre?', '2015-04-02 19:20:05', 113, 9, 0, 0),
(7, 1, 'What is your favorite console', 'What is your favorite console of all time?', '2015-04-02 19:42:29', 49, 9, 23, 0),
(2, 2, 'Help. Stuck on a level?', 'I need help', '2015-03-29 17:21:51', 2, 0, 0, 0),
(7, 4, 'Favorite game', 'What is your favorite game of all time?', '2015-03-16 15:58:57', 9, 1, 1, 0),
(16, 11, 'Favorite video game character', 'Who is your favorite video game character?Mine is Mario.', '2015-04-04 16:14:50', 86, 6, 2, 0),
(16, 10, 'Weird glitch that happen to me', 'What was weirdest glitch to happen to you during a game?', '2015-03-28 15:17:23', 0, 0, 0, 0),
(1, 8, 'New games this month', 'What games are coming out this month and are they any good?', '2015-03-15 19:20:35', 8, 1, -50, 0),
(16, 9, 'Playstation 4 or Xbox One or WiiU?', 'Which one is your favorite console? I choose PS4', '2015-03-31 18:47:03', 0, 0, 0, 0),
(16, 12, 'Favorite Action-Adventure Game', 'What is your favorite action-adventure game?', '2029-03-15 11:19:24', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
`t_id` int(11) NOT NULL,
  `tag` text NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`t_id`, `tag`) VALUES
(1, 'VideoGame'),
(2, 'Action'),
(3, 'Adventure');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(4) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` longtext NOT NULL,
  `validate` int(11) NOT NULL DEFAULT '0',
  `admin` int(11) NOT NULL DEFAULT '0',
  `picture` longtext NOT NULL,
  `score` int(11) NOT NULL DEFAULT '0',
  `q` int(11) NOT NULL DEFAULT '0',
  `access` longtext NOT NULL,
  `gitpic` longtext NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `validate`, `admin`, `picture`, `score`, `q`, `access`, `gitpic`) VALUES
(1, 'pallen', 'm$ftw', '', 1, 1, 'rabbit.jpg', -51, 2, '', ''),
(2, 'tblee', '0mGth3WeB!', '', 1, 0, '', 0, 1, '', ''),
(3, 'bourne', 'bash_$', '', 1, 0, 'biohazard.jpg', 0, 0, '', ''),
(4, 'edsger', 'st1ll1l11lG0O2', '', 1, 0, '', 0, 0, '', ''),
(5, 'wgates', '5il3M4X_m$4L', '', 1, 0, 'SEGA.jpg', 0, 0, '', ''),
(6, 'hopper', 'im4usn', '', 1, 0, '', 0, 0, '', ''),
(7, 'dknuth', 'tek!tex', '', 1, 0, 'dragonshield.png', 22, 2, '', ''),
(8, 'ada', 'wtf15b4b', '', 1, 0, '', 0, 0, '', ''),
(9, 'cmoore', 'moreM00R3!', '', 1, 0, 'HighDragon.jpg', 0, 0, '', ''),
(10, 'jresig', 'In0JS', '', 1, 0, '', 0, 0, '', ''),
(11, 'atanen', 'minix!minix', '', 1, 0, 'J&H.jpg', 0, 0, '', ''),
(12, 'linus', 'ilUvP3nGu1n5', '', 1, 0, 'XBOXOne.jpg', 0, 0, '', ''),
(13, 'aturing', '1nfin1t3TAp3', '', 1, 0, '', 0, 0, '', ''),
(14, 'lwall', 'oysters&camels', '', 1, 0, 'The_Mario_Bros..jpeg', 0, 0, '', ''),
(15, 'thewoz', '4daK1d5', '', 1, 0, '', 0, 0, '', ''),
(16, 'bwayne', 'bman', '', 1, 1, 'batman.jpg', 2, 4, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `voting`
--

CREATE TABLE IF NOT EXISTS `voting` (
  `user` int(4) NOT NULL,
  `1` int(11) NOT NULL DEFAULT '0',
  `2` int(11) DEFAULT '0',
  `3` int(11) NOT NULL DEFAULT '0',
  `4` int(11) NOT NULL DEFAULT '0',
  `5` int(11) NOT NULL DEFAULT '0',
  `6` int(11) NOT NULL DEFAULT '0',
  `7` int(11) NOT NULL DEFAULT '0',
  `8` int(11) NOT NULL DEFAULT '0',
  `9` int(11) NOT NULL DEFAULT '0',
  `10` int(11) NOT NULL DEFAULT '0',
  `11` int(11) NOT NULL DEFAULT '0',
  `12` int(11) NOT NULL DEFAULT '0',
  `13` int(11) DEFAULT '0',
  `14` int(11) NOT NULL DEFAULT '0',
  `15` int(11) NOT NULL DEFAULT '0',
  `16` int(11) NOT NULL DEFAULT '0',
  `17` int(11) DEFAULT '0',
  `18` int(11) NOT NULL DEFAULT '0',
  `19` int(11) NOT NULL DEFAULT '0',
  `20` int(11) NOT NULL DEFAULT '0',
  `21` int(11) NOT NULL DEFAULT '0',
  `22` int(11) NOT NULL DEFAULT '0',
  `23` int(11) NOT NULL DEFAULT '0',
  `24` int(11) NOT NULL DEFAULT '0',
  `25` int(11) NOT NULL DEFAULT '0',
  `26` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `voting`
--

INSERT INTO `voting` (`user`, `1`, `2`, `3`, `4`, `5`, `6`, `7`, `8`, `9`, `10`, `11`, `12`, `13`, `14`, `15`, `16`, `17`, `18`, `19`, `20`, `21`, `22`, `23`, `24`, `25`, `26`) VALUES
(1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(9, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(11, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(12, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(13, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(14, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(15, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(16, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
 ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `questag`
--
ALTER TABLE `questag`
 ADD PRIMARY KEY (`qt_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
 ADD PRIMARY KEY (`q_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
 ADD PRIMARY KEY (`t_id`), ADD UNIQUE KEY `t_id` (`t_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voting`
--
ALTER TABLE `voting`
 ADD UNIQUE KEY `user` (`user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
MODIFY `a_id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `questag`
--
ALTER TABLE `questag`
MODIFY `qt_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
MODIFY `q_id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
