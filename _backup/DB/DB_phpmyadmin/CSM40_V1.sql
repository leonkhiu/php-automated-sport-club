-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 10, 2015 at 11:43 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `CSM40`
--

-- --------------------------------------------------------

--
-- Table structure for table `club`
--

CREATE TABLE IF NOT EXISTS `club` (
`id` int(10) unsigned NOT NULL,
  `sport_id` smallint(5) unsigned NOT NULL,
  `name` varchar(64) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `match`
--

CREATE TABLE IF NOT EXISTS `match` (
`id` int(10) unsigned NOT NULL,
  `type_id` smallint(5) unsigned NOT NULL,
  `first_participant_id` int(11) NOT NULL,
  `second_participant_id` int(11) NOT NULL,
  `host_participant_id` int(11) NOT NULL,
  `date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE IF NOT EXISTS `score` (
`id` int(10) unsigned NOT NULL,
  `match_id` int(10) unsigned NOT NULL,
  `first_participant_point` smallint(6) NOT NULL,
  `second_participant_point` smallint(6) NOT NULL,
  `set_number` tinyint(3) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sport`
--

CREATE TABLE IF NOT EXISTS `sport` (
`id` int(11) NOT NULL,
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
  `club_id` smallint(5) unsigned NOT NULL,
  `name` varchar(64) NOT NULL,
  `permission_id` smallint(5) unsigned NOT NULL,
  `detail` text NOT NULL,
  `date` int(11) NOT NULL,
  `last_update` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `club`
--
ALTER TABLE `club`
 ADD PRIMARY KEY (`id`), ADD KEY `sport_id` (`sport_id`), ADD FULLTEXT KEY `detail` (`detail`);

--
-- Indexes for table `match`
--
ALTER TABLE `match`
 ADD PRIMARY KEY (`id`), ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `score`
--
ALTER TABLE `score`
 ADD PRIMARY KEY (`id`), ADD KEY `match_id` (`match_id`);

--
-- Indexes for table `sport`
--
ALTER TABLE `sport`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
 ADD PRIMARY KEY (`id`), ADD KEY `club_id` (`club_id`), ADD FULLTEXT KEY `detail` (`detail`);

--
-- Indexes for table `union`
--
ALTER TABLE `union`
 ADD PRIMARY KEY (`id`), ADD FULLTEXT KEY `detail` (`detail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `club`
--
ALTER TABLE `club`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `match`
--
ALTER TABLE `match`
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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `union`
--
ALTER TABLE `union`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
