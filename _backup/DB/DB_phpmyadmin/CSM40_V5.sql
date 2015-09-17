-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 03, 2015 at 06:50 PM
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
  `last_update` int(11) NOT NULL DEFAULT '0',
  `update_uid` int(10) unsigned NOT NULL,
  `detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE IF NOT EXISTS `email` (
  `id` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `email` varchar(40) NOT NULL,
  `date` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email`
--

INSERT INTO `email` (`id`, `uid`, `email`, `date`) VALUES
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
  `date` int(11) NOT NULL,
  `last_update` int(11) NOT NULL DEFAULT '0',
  `update_uid` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE IF NOT EXISTS `permission_user` (
  `id` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `permission_id` int(10) unsigned NOT NULL,
  `table_name` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE IF NOT EXISTS `score` (
  `id` int(10) unsigned NOT NULL,
  `game_id` int(10) unsigned NOT NULL,
  `first_participant_point` float NOT NULL,
  `second_participant_point` float NOT NULL,
  `set_number` tinyint(3) unsigned NOT NULL,
  `duration` int(11) NOT NULL COMMENT 'in second',
  `date` int(11) NOT NULL,
  `last_update` int(11) NOT NULL DEFAULT '0',
  `update_uid` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `security_question`
--

CREATE TABLE IF NOT EXISTS `security_question` (
  `id` int(10) unsigned NOT NULL,
  `question` varchar(128) NOT NULL,
  `answer` varchar(16) NOT NULL COMMENT 'Small letters only'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `security_question`
--

INSERT INTO `security_question` (`id`, `question`, `answer`) VALUES
(1, 'What''s the sixth month in the Georgian calendar? ', 'june');

-- --------------------------------------------------------

--
-- Table structure for table `sport`
--

CREATE TABLE IF NOT EXISTS `sport` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(64) NOT NULL,
  `permission_id` int(10) unsigned NOT NULL,
  `date` int(11) NOT NULL,
  `last_update` int(11) NOT NULL DEFAULT '0',
  `update_uid` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `system_log`
--

CREATE TABLE IF NOT EXISTS `system_log` (
  `uid` int(10) unsigned NOT NULL,
  `msg` varchar(256) NOT NULL,
  `date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1
/*!50100 PARTITION BY RANGE (uid)
(PARTITION p0 VALUES LESS THAN (20) ENGINE = InnoDB,
 PARTITION p1 VALUES LESS THAN (50) ENGINE = InnoDB,
 PARTITION p2 VALUES LESS THAN (150) ENGINE = InnoDB,
 PARTITION p3 VALUES LESS THAN (300) ENGINE = InnoDB,
 PARTITION p4 VALUES LESS THAN (600) ENGINE = InnoDB,
 PARTITION p5 VALUES LESS THAN (1000) ENGINE = InnoDB,
 PARTITION p6 VALUES LESS THAN (2000) ENGINE = InnoDB,
 PARTITION p7 VALUES LESS THAN MAXVALUE ENGINE = InnoDB) */;

--
-- Dumping data for table `system_log`
--

INSERT INTO `system_log` (`uid`, `msg`, `date`) VALUES
(1, 'sandyfan login to the system and viewed the admin/index.php', 1440774389),
(1, 'sandyfan login to the system and viewed the admin/index.php', 1440774390),
(1, 'sandyfan login to the system and viewed the admin/index.php', 1440775524),
(2, 'sandyfan login to the system and viewed the admin/index.php', 1440778229);

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE IF NOT EXISTS `team` (
  `id` int(10) unsigned NOT NULL,
  `club_id` int(10) unsigned NOT NULL,
  `name` varchar(64) NOT NULL,
  `permission_id` int(10) unsigned NOT NULL,
  `detail` text NOT NULL,
  `date` int(11) NOT NULL,
  `last_update` int(11) NOT NULL DEFAULT '0',
  `update_uid` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `team_user`
--

CREATE TABLE IF NOT EXISTS `team_user` (
  `id` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `team_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `unions`
--

CREATE TABLE IF NOT EXISTS `unions` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(64) NOT NULL,
  `permission_id` smallint(5) unsigned NOT NULL,
  `detail` text NOT NULL,
  `date` int(11) NOT NULL,
  `last_update` int(11) NOT NULL DEFAULT '0',
  `update_uid` int(10) unsigned NOT NULL
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
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `hashpassword` varchar(60) NOT NULL,
  `fname` varchar(40) NOT NULL,
  `lname` varchar(40) NOT NULL,
  `date` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `active`, `hashpassword`, `fname`, `lname`, `date`) VALUES
(1, 'ferfery00000088', 1, '5192a33232da0cdb071487707eb6a986', 'MoHo0000', 'Khaleqi0000', 1440684967),
(2, 'sandyfan', 1, '5192a33232da0cdb071487707eb6a986', 'moho', 'khaleqi', 1440613086),
(8, 'ferfery0000001', 1, '5192a33232da0cdb071487707eb6a986', 'MoHo00001', 'Khaleqi00001', 1440686141),
(50, 'ferfery001', 1, '5192a33232da0cdb071487707eb6a986', 'MoHo00001', 'Khaleqi00001', 1440687019),
(56, 'Gholi 1440686793', 1, '7fe4771c008a22eb763df47d19e2c6aa', 'ben', 'Mora', 1440686793),
(57, 'Gholi 1440686852', 1, '7fe4771c008a22eb763df47d19e2c6aa', 'ben', 'Mora', 1440686852),
(58, 'Gholi 1440686929', 1, '7fe4771c008a22eb763df47d19e2c6aa', 'ben', 'Mora', 1440686929),
(59, 'Gholi 1440686951', 1, '7fe4771c008a22eb763df47d19e2c6aa', 'ben', 'Mora', 1440686951),
(60, 'Gholi 1440687019', 1, '7fe4771c008a22eb763df47d19e2c6aa', 'ben', 'Mora', 1440687019),
(61, 'Gholi 1440687072', 1, '7fe4771c008a22eb763df47d19e2c6aa', 'ben', 'Mora', 1440687072),
(62, 'Gholi 1440698591', 1, '7fe4771c008a22eb763df47d19e2c6aa', 'ben', 'Mora', 1440698591);

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
  ADD KEY `modification_user-id` (`update_uid`),
  ADD FULLTEXT KEY `detail` (`detail`);

--
-- Indexes for table `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`uid`);

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_id` (`sport_id`),
  ADD KEY `first_team_id` (`first_team_id`),
  ADD KEY `second_team_id` (`second_team_id`),
  ADD KEY `host_team_id` (`host_team_id`),
  ADD KEY `modification_user_id` (`update_uid`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`id`),
  ADD KEY `match_id` (`game_id`),
  ADD KEY `modification_user_id` (`update_uid`);

--
-- Indexes for table `security_question`
--
ALTER TABLE `security_question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sport`
--
ALTER TABLE `sport`
  ADD PRIMARY KEY (`id`),
  ADD KEY `modification_user_id` (`update_uid`);

--
-- Indexes for table `system_log`
--
ALTER TABLE `system_log`
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`),
  ADD KEY `club_id` (`club_id`),
  ADD KEY `update_user_id` (`update_uid`),
  ADD FULLTEXT KEY `detail` (`detail`);

--
-- Indexes for table `team_user`
--
ALTER TABLE `team_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`),
  ADD KEY `team_id` (`team_id`);

--
-- Indexes for table `unions`
--
ALTER TABLE `unions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `update_uid` (`update_uid`),
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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `active` (`active`);

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
-- AUTO_INCREMENT for table `permission_user`
--
ALTER TABLE `permission_user`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `score`
--
ALTER TABLE `score`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `security_question`
--
ALTER TABLE `security_question`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
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
-- AUTO_INCREMENT for table `unions`
--
ALTER TABLE `unions`
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
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=63;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `club`
--
ALTER TABLE `club`
  ADD CONSTRAINT `club_ibfk_1` FOREIGN KEY (`sport_id`) REFERENCES `sport` (`id`),
  ADD CONSTRAINT `club_ibfk_2` FOREIGN KEY (`union_id`) REFERENCES `unions` (`id`),
  ADD CONSTRAINT `club_ibfk_3` FOREIGN KEY (`update_uid`) REFERENCES `user` (`id`);

--
-- Constraints for table `email`
--
ALTER TABLE `email`
  ADD CONSTRAINT `email_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`id`);

--
-- Constraints for table `game`
--
ALTER TABLE `game`
  ADD CONSTRAINT `game_ibfk_1` FOREIGN KEY (`sport_id`) REFERENCES `sport` (`id`),
  ADD CONSTRAINT `game_ibfk_2` FOREIGN KEY (`first_team_id`) REFERENCES `team` (`id`),
  ADD CONSTRAINT `game_ibfk_3` FOREIGN KEY (`second_team_id`) REFERENCES `team` (`id`),
  ADD CONSTRAINT `game_ibfk_4` FOREIGN KEY (`host_team_id`) REFERENCES `team` (`id`),
  ADD CONSTRAINT `game_ibfk_5` FOREIGN KEY (`update_uid`) REFERENCES `user` (`id`);

--
-- Constraints for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`id`);

--
-- Constraints for table `score`
--
ALTER TABLE `score`
  ADD CONSTRAINT `score_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `game` (`id`),
  ADD CONSTRAINT `score_ibfk_2` FOREIGN KEY (`update_uid`) REFERENCES `user` (`id`);

--
-- Constraints for table `sport`
--
ALTER TABLE `sport`
  ADD CONSTRAINT `sport_ibfk_1` FOREIGN KEY (`update_uid`) REFERENCES `user` (`id`);

--
-- Constraints for table `team`
--
ALTER TABLE `team`
  ADD CONSTRAINT `team_ibfk_1` FOREIGN KEY (`club_id`) REFERENCES `club` (`id`),
  ADD CONSTRAINT `team_ibfk_2` FOREIGN KEY (`update_uid`) REFERENCES `user` (`id`);

--
-- Constraints for table `team_user`
--
ALTER TABLE `team_user`
  ADD CONSTRAINT `team_user_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `team_user_ibfk_2` FOREIGN KEY (`team_id`) REFERENCES `team` (`id`);

--
-- Constraints for table `unions`
--
ALTER TABLE `unions`
  ADD CONSTRAINT `unions_ibfk_1` FOREIGN KEY (`update_uid`) REFERENCES `user` (`id`);

--
-- Constraints for table `union_club`
--
ALTER TABLE `union_club`
  ADD CONSTRAINT `union_club_ibfk_1` FOREIGN KEY (`union_id`) REFERENCES `unions` (`id`),
  ADD CONSTRAINT `union_club_ibfk_2` FOREIGN KEY (`club_id`) REFERENCES `club` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
