-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 17, 2015 at 12:03 PM
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
-- Table structure for table `df_answer`
--

CREATE TABLE IF NOT EXISTS `df_answer` (
  `id` int(10) unsigned NOT NULL,
  `user_form_id` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `answer` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `df_element`
--

CREATE TABLE IF NOT EXISTS `df_element` (
  `id` int(10) unsigned NOT NULL,
  `type` varchar(16) NOT NULL,
  `explain` varchar(128) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `df_element`
--

INSERT INTO `df_element` (`id`, `type`, `explain`) VALUES
(1, 'radio', 'Multiple choice'),
(2, 'checkbox', 'Checkboxes'),
(3, 'option', 'Choose from a list'),
(4, 'date', 'Date'),
(5, 'time', 'Time'),
(6, 'text', 'Text'),
(7, 'textarea', 'Paragraph text');

-- --------------------------------------------------------

--
-- Table structure for table `df_element_group`
--

CREATE TABLE IF NOT EXISTS `df_element_group` (
  `id` int(10) unsigned NOT NULL,
  `form_id` int(10) unsigned NOT NULL,
  `parent_id` int(10) unsigned NOT NULL COMMENT 'an ID from df_user_form table',
  `text` varchar(128) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `df_element_group`
--

INSERT INTO `df_element_group` (`id`, `form_id`, `parent_id`, `text`) VALUES
(1, 1, 1, 'Male'),
(2, 1, 1, 'Female'),
(3, 1, 2, 'Chess'),
(4, 1, 2, 'football'),
(5, 1, 2, 'Basketball'),
(6, 1, 2, 'Swimming'),
(7, 1, 3, '1'),
(8, 1, 3, '2'),
(9, 1, 3, '3'),
(10, 1, 3, '4'),
(11, 2, 1, 'Swansea'),
(12, 2, 1, 'Cardiff'),
(13, 2, 1, 'Newport');

-- --------------------------------------------------------

--
-- Table structure for table `df_form`
--

CREATE TABLE IF NOT EXISTS `df_form` (
  `id` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `title` varchar(64) NOT NULL,
  `description` varchar(256) NOT NULL,
  `token` varchar(32) NOT NULL,
  `permission_id` int(10) unsigned NOT NULL,
  `date` int(10) unsigned NOT NULL,
  `last_update` int(10) unsigned NOT NULL,
  `update_uid` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `df_form`
--

INSERT INTO `df_form` (`id`, `uid`, `title`, `description`, `token`, `permission_id`, `date`, `last_update`, `update_uid`) VALUES
(1, 1, 'Form title', 'form description is here as well', 'b6f31465eab3f2e55eb5e3202e0e09d0', 0, 1441370194, 1441370194, 1),
(2, 1, 'General Info', 'General information about each user', 'cd7d0cc61f052f73883a1242404bfbf5', 0, 1441896195, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `df_user_form`
--

CREATE TABLE IF NOT EXISTS `df_user_form` (
  `id` int(10) unsigned NOT NULL,
  `form_id` int(10) unsigned NOT NULL,
  `element_id` int(10) unsigned NOT NULL,
  `question` varchar(128) NOT NULL,
  `help_text` varchar(128) NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0: not required'
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `df_user_form`
--

INSERT INTO `df_user_form` (`id`, `form_id`, `element_id`, `question`, `help_text`, `required`) VALUES
(1, 1, 1, 'Gender?', 'male of female?', 1),
(2, 1, 2, 'What sport do you like?', '', 0),
(3, 1, 3, 'How many children do you have?', '', 1),
(4, 1, 6, 'Name?', 'e.g.Moho Khaleqi', 1),
(5, 1, 7, 'Do you like to add more detail?', 'e.g. you address, mobile and availability ', 0),
(6, 1, 4, 'D.O.B.', '1988.06.15', 1),
(7, 1, 5, 'What time do you wake up?', '0700', 1),
(8, 2, 6, 'What is you full name?', 'First name, Last name', 1),
(9, 2, 4, 'D.O.B', 'Date of birth', 1),
(10, 2, 1, 'What is you current city?', 'Where do you live?', 1),
(11, 2, 7, 'What do you like about sports?', 'Write one or two paragraph about sports you have done and etc.', 0);

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
(2, 'sandyfan login to the system and viewed the admin/index.php', 1440778229),
(2, 'sandyfan login to the system and viewed the admin/index.php', 1441374937),
(2, 'sandyfan login to the system and viewed the admin/index.php', 1441458891),
(2, 'sandyfan login to the system and viewed the admin/index.php', 1441480256),
(2, 'sandyfan login to the system and viewed the admin/index.php', 1441480396),
(2, 'sandyfan login to the system and viewed the admin/index.php', 1441484117),
(2, 'sandyfan login to the system and viewed the admin/index.php', 1441576047),
(2, 'sandyfan login to the system and viewed the admin/index.php', 1441707088),
(2, 'sandyfan login to the system and viewed the admin/index.php', 1441791913),
(2, 'sandyfan login to the system and viewed the admin/index.php', 1441873073),
(2, 'sandyfan login to the system and viewed the admin/index.php', 1441878076),
(2, 'sandyfan login to the system and viewed the admin/index.php', 1441878103),
(2, 'sandyfan login to the system and viewed the admin/index.php', 1441878106),
(2, 'sandyfan login to the system and viewed the admin/index.php', 1441878171),
(2, 'sandyfan login to the system and viewed the admin/index.php', 1441878174),
(2, 'sandyfan login to the system and viewed the admin/index.php', 1441878177),
(2, 'sandyfan login to the system and viewed the admin/index.php', 1441892179),
(2, 'sandyfan login to the system and viewed the admin/index.php', 1441892266),
(2, 'sandyfan login to the system and viewed the admin/index.php', 1441892278),
(2, 'sandyfan login to the system and viewed the admin/index.php', 1441892285),
(2, 'sandyfan login to the system and viewed the admin/index.php', 1441892435),
(2, 'sandyfan login to the system and viewed the admin/index.php', 1441919041),
(2, 'sandyfan login to the system and viewed the admin/index.php', 1441922334),
(2, 'sandyfan login to the system and viewed the admin/index.php', 1441958012),
(2, 'sandyfan login to the system and viewed the admin/index.php', 1442038644),
(2, 'sandyfan login to the system and viewed the admin/index.php', 1442087188),
(2, 'sandyfan login to the system and viewed the admin/index.php', 1442088261);

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
  `permission_id` int(10) unsigned NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `active`, `hashpassword`, `fname`, `lname`, `date`) VALUES
(1, 'ferfery00000088', 1, '5192a33232da0cdb071487707eb6a986', 'MoHo0000', 'Khaleqi0000', 1440684967),
(2, 'sandyfan', 1, '5192a33232da0cdb071487707eb6a986', 'moho', 'khaleqi', 1440613086),
(8, 'ferfery0000001', 1, '5192a33232da0cdb071487707eb6a986', 'MoHo00001', 'Khaleqi00001', 1440686141),
(50, 'ferfery001', 1, '5192a33232da0cdb071487707eb6a986', 'MoHo00001', 'Khaleqi00001', 1440687019),
(56, 'Gholi 1440686793', 1, '7fe4771c008a22eb763df47d19e2c6aa', 'ben', 'Mora', 1440686793),
(58, 'Gholi 1440686929', 1, '7fe4771c008a22eb763df47d19e2c6aa', 'ben', 'Mora', 1440686929);

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
-- Indexes for table `df_answer`
--
ALTER TABLE `df_answer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_form_id` (`user_form_id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `df_element`
--
ALTER TABLE `df_element`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `df_element_group`
--
ALTER TABLE `df_element_group`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_form_id` (`parent_id`),
  ADD KEY `form_id` (`form_id`);

--
-- Indexes for table `df_form`
--
ALTER TABLE `df_form`
  ADD PRIMARY KEY (`id`),
  ADD KEY `update_uid` (`update_uid`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `df_user_form`
--
ALTER TABLE `df_user_form`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_id` (`form_id`);

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
-- AUTO_INCREMENT for table `df_answer`
--
ALTER TABLE `df_answer`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `df_element`
--
ALTER TABLE `df_element`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `df_element_group`
--
ALTER TABLE `df_element_group`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `df_form`
--
ALTER TABLE `df_form`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `df_user_form`
--
ALTER TABLE `df_user_form`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
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
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=68;
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
