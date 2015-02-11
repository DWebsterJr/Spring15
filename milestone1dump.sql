-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2015 at 04:46 PM
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
  `likes` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`user_id`, `question_id`, `a_id`, `a_answer`, `a_datetime`, `likes`) VALUES
(4, 1, 1, 'What do you need help with', '2015-02-11 00:02:33', 0),
(1, 1, 2, '?????', '2015-02-11 00:02:33', 0),
(0, 3, 16, 'Batman', '2011-02-15 21:04:03', 0);

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
  `reply` int(4) DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`u_id`, `q_id`, `topic`, `detail`, `datetime`, `view`, `reply`) VALUES
(1, 3, 'Favorite Superhero', 'Who is your favorite Superhero?', '2015-02-11 15:30:19', 6, 1),
(7, 1, 'Help please', 'I need help', '2015-02-11 14:10:56', 12, 2),
(2, 2, 'Help', 'help', '2015-02-10 21:32:14', 0, 0),
(7, 4, 'Favorite movie', 'What is your favorite movie?', '2015-02-11 02:34:01', 0, 0),
(3, 5, 'Question,Questions', 'What kind of question are allowed on this site?', '2015-02-11 15:35:58', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(4) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'pallen', 'm$ftw'),
(2, 'tblee', '0mGth3WeB!'),
(3, 'bourne', 'bash_$'),
(4, 'edsger', 'st1ll1l11lG0O2'),
(5, 'wgates', '5il3M4X_m$4L'),
(6, 'hopper', 'im4usn'),
(7, 'dknuth', 'tek!tex'),
(8, 'ada', 'wtf15b4b'),
(9, 'cmoore', 'moreM00R3!'),
(10, 'jresig', 'In0JS'),
(11, 'atanen', 'minix!minix'),
(12, 'linus', 'ilUvP3nGu1n5'),
(13, 'aturing', '1nfin1t3TAp3'),
(14, 'lwall', 'oysters&camels'),
(15, 'thewoz', '4daK1d5');

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
MODIFY `a_id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
MODIFY `q_id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
