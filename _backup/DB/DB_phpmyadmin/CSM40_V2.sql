-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 20, 2015 at 07:42 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `CSM40`
--

-- --------------------------------------------------------

--
-- Table structure for table `club`
--

CREATE TABLE IF NOT EXISTS `club` (
  `id` int(10) unsigned NOT NULL,
  `sport_id` int(10) unsigned NOT NULL,
  `union_id` int(10) unsigned NOT NULL,
  `name` varchar(64) NOT NULL,
  `permission_id` int(10) NOT NULL,
  `date` int(11) NOT NULL,
  `detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE IF NOT EXISTS `email` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `email` varchar(40) NOT NULL,
  `date` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email`
--

INSERT INTO `email` (`id`, `user_id`, `email`, `date`) VALUES
(1, 1, '808956@swansea.ac.uk', 0);

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE IF NOT EXISTS `game` (
  `id` int(10) unsigned NOT NULL,
  `sport_id` int(10) unsigned NOT NULL,
  `first_team_id` int(10) unsigned NOT NULL,
  `second_team_id` int(10) unsigned NOT NULL,
  `host_team_id` int(10) unsigned NOT NULL,
  `date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE IF NOT EXISTS `score` (
  `id` int(10) unsigned NOT NULL,
  `game_id` int(10) unsigned NOT NULL,
  `first_participant_point` float NOT NULL,
  `second_participant_point` float NOT NULL,
  `set_number` tinyint(3) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sport`
--

CREATE TABLE IF NOT EXISTS `sport` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(64) NOT NULL,
  `permission_id` smallint(5) unsigned NOT NULL,
  `date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE IF NOT EXISTS `team` (
  `id` int(10) unsigned NOT NULL,
  `club_id` int(10) unsigned NOT NULL,
  `name` varchar(64) NOT NULL,
  `permission_id` smallint(5) unsigned NOT NULL,
  `detail` text NOT NULL,
  `date` int(11) NOT NULL,
  `last_update` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `team_member`
--

CREATE TABLE IF NOT EXISTS `team_member` (
  `id` int(10) unsigned NOT NULL,
  `team_id` int(10) unsigned NOT NULL,
  `fname` varchar(40) NOT NULL,
  `lname` varchar(40) NOT NULL,
  `detail` text NOT NULL,
  `date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `union`
--

CREATE TABLE IF NOT EXISTS `union` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(64) NOT NULL,
  `permission_id` smallint(5) unsigned NOT NULL,
  `date` int(11) NOT NULL,
  `detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `union_club`
--

CREATE TABLE IF NOT EXISTS `union_club` (
  `id` int(10) unsigned NOT NULL,
  `union_id` int(10) unsigned NOT NULL,
  `club_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) unsigned NOT NULL,
  `username` varchar(40) NOT NULL,
  `hashpassword` varchar(60) NOT NULL,
  `fname` varchar(40) NOT NULL,
  `lname` varchar(40) NOT NULL,
  `signupdate` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `hashpassword`, `fname`, `lname`, `signupdate`) VALUES
(1, 'sandyfan', '', 'MoHo', 'Kh', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `club`
--
ALTER TABLE `club`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sport_id` (`sport_id`),
  ADD KEY `union_id` (`union_id`),
  ADD FULLTEXT KEY `detail` (`detail`);

--
-- Indexes for table `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_id` (`sport_id`),
  ADD KEY `first_team_id` (`first_team_id`),
  ADD KEY `second_team_id` (`second_team_id`),
  ADD KEY `host_team_id` (`host_team_id`);

--
-- Indexes for table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`id`),
  ADD KEY `match_id` (`game_id`);

--
-- Indexes for table `sport`
--
ALTER TABLE `sport`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`),
  ADD KEY `club_id` (`club_id`),
  ADD FULLTEXT KEY `detail` (`detail`);

--
-- Indexes for table `team_member`
--
ALTER TABLE `team_member`
  ADD PRIMARY KEY (`id`),
  ADD KEY `team_id` (`team_id`);

--
-- Indexes for table `union`
--
ALTER TABLE `union`
  ADD PRIMARY KEY (`id`),
  ADD FULLTEXT KEY `detail` (`detail`);

--
-- Indexes for table `union_club`
--
ALTER TABLE `union_club`
  ADD PRIMARY KEY (`id`),
  ADD KEY `union_id` (`union_id`),
  ADD KEY `club_id` (`club_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `club`
--
ALTER TABLE `club`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `email`
--
ALTER TABLE `email`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `score`
--
ALTER TABLE `score`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sport`
--
ALTER TABLE `sport`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `team_member`
--
ALTER TABLE `team_member`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `union`
--
ALTER TABLE `union`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `union_club`
--
ALTER TABLE `union_club`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `club`
--
ALTER TABLE `club`
  ADD CONSTRAINT `club_ibfk_1` FOREIGN KEY (`sport_id`) REFERENCES `sport` (`id`),
  ADD CONSTRAINT `club_ibfk_2` FOREIGN KEY (`union_id`) REFERENCES `union` (`id`);

--
-- Constraints for table `email`
--
ALTER TABLE `email`
  ADD CONSTRAINT `email_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `game`
--
ALTER TABLE `game`
  ADD CONSTRAINT `game_ibfk_1` FOREIGN KEY (`sport_id`) REFERENCES `sport` (`id`),
  ADD CONSTRAINT `game_ibfk_2` FOREIGN KEY (`first_team_id`) REFERENCES `team` (`id`),
  ADD CONSTRAINT `game_ibfk_3` FOREIGN KEY (`second_team_id`) REFERENCES `team` (`id`),
  ADD CONSTRAINT `game_ibfk_4` FOREIGN KEY (`host_team_id`) REFERENCES `team` (`id`);

--
-- Constraints for table `score`
--
ALTER TABLE `score`
  ADD CONSTRAINT `score_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `game` (`id`);

--
-- Constraints for table `team`
--
ALTER TABLE `team`
  ADD CONSTRAINT `team_ibfk_1` FOREIGN KEY (`club_id`) REFERENCES `club` (`id`);

--
-- Constraints for table `team_member`
--
ALTER TABLE `team_member`
  ADD CONSTRAINT `team_member_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `team` (`id`);

--
-- Constraints for table `union_club`
--
ALTER TABLE `union_club`
  ADD CONSTRAINT `union_club_ibfk_1` FOREIGN KEY (`union_id`) REFERENCES `union` (`id`),
  ADD CONSTRAINT `union_club_ibfk_2` FOREIGN KEY (`club_id`) REFERENCES `club` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
