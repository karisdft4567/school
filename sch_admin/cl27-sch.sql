-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 17, 2018 at 05:38 PM
-- Server version: 10.1.27-MariaDB
-- PHP Version: 5.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cl27-sch`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin_type` tinyint(4) NOT NULL,
  `company_id` int(11) NOT NULL,
  `created_datetime` datetime NOT NULL,
  `modified_datetime` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '1-Active,0-In-Active',
  PRIMARY KEY (`id`),
  KEY `admin_type` (`admin_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user_name`, `email`, `password`, `admin_type`, `company_id`, `created_datetime`, `modified_datetime`, `created_by`, `modified_by`, `status`) VALUES
(1, 'admin', 'admin@demo.com', '123456', 1, 0, '2016-07-28 10:08:52', '0000-00-00 00:00:00', 1, 0, 1),
(2, 'support', 'support@demo.com', 'support123', 2, 2, '2016-09-20 08:01:48', '0000-00-00 00:00:00', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin_models`
--

CREATE TABLE IF NOT EXISTS `admin_models` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `admin_models`
--

INSERT INTO `admin_models` (`id`, `name`, `status`) VALUES
(1, 'Admin Users Management', 1),
(2, 'Admin User Access Control Management', 1),
(3, 'Company Management', 1),
(4, 'Staff Management', 1),
(5, 'Prebooking Management', 1),
(6, 'Contractor Management', 1),
(7, 'Document Management', 1),
(8, 'Marquee Management', 1),
(9, 'Disclaimer Management', 1),
(10, 'Visitor History Management', 1),
(11, 'Contractor History Management', 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin_model_action`
--

CREATE TABLE IF NOT EXISTS `admin_model_action` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `model_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `model_id` (`model_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `admin_model_action`
--

INSERT INTO `admin_model_action` (`id`, `model_id`, `name`, `status`) VALUES
(1, 1, 'Create', 1),
(2, 1, 'Update', 1),
(3, 1, 'View', 1),
(4, 1, 'Delete', 1),
(5, 2, 'Create', 1),
(6, 2, 'Update', 0),
(7, 2, 'View', 1),
(8, 2, 'Delete', 1),
(14, 3, 'Create', 1),
(15, 3, 'Update', 1),
(16, 3, 'View', 1),
(17, 3, 'Delete', 1),
(18, 4, 'Create', 1),
(19, 4, 'Update', 1),
(20, 4, 'View', 1),
(21, 4, 'Delete', 1),
(22, 5, 'Create', 1),
(23, 5, 'Update', 1),
(24, 5, 'View', 1),
(25, 5, 'Delete', 1),
(26, 6, 'Create', 1),
(27, 6, 'Update', 1),
(28, 6, 'View', 1),
(29, 6, 'Delete', 1),
(30, 7, 'Create', 1),
(31, 7, 'Update', 1),
(32, 7, 'View', 1),
(33, 7, 'Delete', 1),
(34, 8, 'Update', 1),
(36, 9, 'Update', 1),
(39, 10, 'View', 1),
(40, 11, 'View', 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin_type`
--

CREATE TABLE IF NOT EXISTS `admin_type` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin_type`
--

INSERT INTO `admin_type` (`id`, `name`, `description`) VALUES
(1, 'Admin', 'Admin'),
(2, 'Tenants', 'Tenants');

-- --------------------------------------------------------

--
-- Table structure for table `admin_user_access_control`
--

CREATE TABLE IF NOT EXISTS `admin_user_access_control` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_role` tinyint(11) NOT NULL,
  `model_id` int(11) NOT NULL,
  `action_id` int(11) NOT NULL,
  `action_status` tinyint(4) NOT NULL,
  `created_datetime` datetime NOT NULL,
  `modified_datetime` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `model_id` (`model_id`),
  KEY `action_id` (`action_id`),
  KEY `created_by` (`created_by`),
  KEY `modified_by` (`modified_by`),
  KEY `admin_role` (`admin_role`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=858 ;

--
-- Dumping data for table `admin_user_access_control`
--

INSERT INTO `admin_user_access_control` (`id`, `admin_role`, `model_id`, `action_id`, `action_status`, `created_datetime`, `modified_datetime`, `created_by`, `modified_by`, `status`) VALUES
(440, 1, 1, 1, 1, '2017-08-08 08:06:30', '2017-08-08 08:06:30', 0, 0, 1),
(441, 1, 1, 2, 1, '2017-08-08 08:06:30', '2017-08-08 08:06:30', 0, 0, 1),
(442, 1, 1, 3, 1, '2017-08-08 08:06:30', '2017-08-08 08:06:30', 0, 0, 1),
(443, 1, 1, 4, 1, '2017-08-08 08:06:30', '2017-08-08 08:06:30', 0, 0, 1),
(444, 1, 2, 5, 1, '2017-08-08 08:06:30', '2017-08-08 08:06:30', 0, 0, 1),
(445, 1, 2, 6, 1, '2017-08-08 08:06:30', '2017-08-08 08:06:30', 0, 0, 1),
(446, 1, 2, 7, 1, '2017-08-08 08:06:30', '2017-08-08 08:06:30', 0, 0, 1),
(447, 1, 2, 8, 1, '2017-08-08 08:06:30', '2017-08-08 08:06:30', 0, 0, 1),
(448, 1, 3, 14, 1, '2017-08-08 08:06:30', '2017-08-08 08:06:30', 0, 0, 1),
(449, 1, 3, 15, 1, '2017-08-08 08:06:30', '2017-08-08 08:06:30', 0, 0, 1),
(450, 1, 3, 16, 1, '2017-08-08 08:06:30', '2017-08-08 08:06:30', 0, 0, 1),
(451, 1, 3, 17, 1, '2017-08-08 08:06:30', '2017-08-08 08:06:30', 0, 0, 1),
(452, 1, 4, 18, 1, '2017-08-08 08:06:30', '2017-08-08 08:06:30', 0, 0, 1),
(453, 1, 4, 19, 1, '2017-08-08 08:06:30', '2017-08-08 08:06:30', 0, 0, 1),
(454, 1, 4, 20, 1, '2017-08-08 08:06:30', '2017-08-08 08:06:30', 0, 0, 1),
(455, 1, 4, 21, 1, '2017-08-08 08:06:30', '2017-08-08 08:06:30', 0, 0, 1),
(456, 1, 5, 22, 1, '2017-08-08 08:06:30', '2017-08-08 08:06:30', 0, 0, 1),
(457, 1, 5, 23, 1, '2017-08-08 08:06:30', '2017-08-08 08:06:30', 0, 0, 1),
(458, 1, 5, 24, 1, '2017-08-08 08:06:30', '2017-08-08 08:06:30', 0, 0, 1),
(459, 1, 5, 25, 1, '2017-08-08 08:06:30', '2017-08-08 08:06:30', 0, 0, 1),
(460, 1, 6, 26, 1, '2017-08-08 08:06:30', '2017-08-08 08:06:30', 0, 0, 1),
(461, 1, 6, 27, 1, '2017-08-08 08:06:30', '2017-08-08 08:06:30', 0, 0, 1),
(462, 1, 6, 28, 1, '2017-08-08 08:06:30', '2017-08-08 08:06:30', 0, 0, 1),
(463, 1, 6, 29, 1, '2017-08-08 08:06:30', '2017-08-08 08:06:30', 0, 0, 1),
(464, 1, 7, 30, 1, '2017-08-08 08:06:30', '2017-08-08 08:06:30', 0, 0, 1),
(465, 1, 7, 31, 1, '2017-08-08 08:06:30', '2017-08-08 08:06:30', 0, 0, 1),
(466, 1, 7, 32, 1, '2017-08-08 08:06:30', '2017-08-08 08:06:30', 0, 0, 1),
(467, 1, 7, 33, 1, '2017-08-08 08:06:30', '2017-08-08 08:06:30', 0, 0, 1),
(468, 1, 8, 34, 1, '2017-08-08 08:06:30', '2017-08-08 08:06:30', 0, 0, 1),
(469, 1, 9, 36, 1, '2017-08-08 08:06:30', '2017-08-08 08:06:30', 0, 0, 1),
(470, 1, 10, 39, 1, '2017-08-08 08:06:30', '2017-08-08 08:06:30', 0, 0, 1),
(471, 1, 11, 40, 1, '2017-08-08 08:06:30', '2017-08-08 08:06:30', 0, 0, 1),
(762, 3, 1, 1, 0, '2017-08-11 17:57:43', '2017-08-11 17:57:43', 0, 0, 1),
(763, 3, 1, 2, 0, '2017-08-11 17:57:43', '2017-08-11 17:57:43', 0, 0, 1),
(764, 3, 1, 3, 0, '2017-08-11 17:57:43', '2017-08-11 17:57:43', 0, 0, 1),
(765, 3, 1, 4, 0, '2017-08-11 17:57:43', '2017-08-11 17:57:43', 0, 0, 1),
(766, 3, 2, 5, 0, '2017-08-11 17:57:43', '2017-08-11 17:57:43', 0, 0, 1),
(767, 3, 2, 6, 0, '2017-08-11 17:57:43', '2017-08-11 17:57:43', 0, 0, 1),
(768, 3, 2, 7, 0, '2017-08-11 17:57:43', '2017-08-11 17:57:43', 0, 0, 1),
(769, 3, 2, 8, 0, '2017-08-11 17:57:43', '2017-08-11 17:57:43', 0, 0, 1),
(770, 3, 3, 14, 1, '2017-08-11 17:57:43', '2017-08-11 17:57:43', 0, 0, 1),
(771, 3, 3, 15, 1, '2017-08-11 17:57:43', '2017-08-11 17:57:43', 0, 0, 1),
(772, 3, 3, 16, 1, '2017-08-11 17:57:43', '2017-08-11 17:57:43', 0, 0, 1),
(773, 3, 3, 17, 1, '2017-08-11 17:57:43', '2017-08-11 17:57:43', 0, 0, 1),
(774, 3, 4, 18, 1, '2017-08-11 17:57:43', '2017-08-11 17:57:43', 0, 0, 1),
(775, 3, 4, 19, 1, '2017-08-11 17:57:43', '2017-08-11 17:57:43', 0, 0, 1),
(776, 3, 4, 20, 1, '2017-08-11 17:57:43', '2017-08-11 17:57:43', 0, 0, 1),
(777, 3, 4, 21, 1, '2017-08-11 17:57:43', '2017-08-11 17:57:43', 0, 0, 1),
(778, 3, 5, 22, 0, '2017-08-11 17:57:43', '2017-08-11 17:57:43', 0, 0, 1),
(779, 3, 5, 23, 0, '2017-08-11 17:57:43', '2017-08-11 17:57:43', 0, 0, 1),
(780, 3, 5, 24, 0, '2017-08-11 17:57:43', '2017-08-11 17:57:43', 0, 0, 1),
(781, 3, 5, 25, 0, '2017-08-11 17:57:43', '2017-08-11 17:57:43', 0, 0, 1),
(782, 3, 6, 26, 0, '2017-08-11 17:57:43', '2017-08-11 17:57:43', 0, 0, 1),
(783, 3, 6, 27, 0, '2017-08-11 17:57:43', '2017-08-11 17:57:43', 0, 0, 1),
(784, 3, 6, 28, 0, '2017-08-11 17:57:43', '2017-08-11 17:57:43', 0, 0, 1),
(785, 3, 6, 29, 0, '2017-08-11 17:57:43', '2017-08-11 17:57:43', 0, 0, 1),
(786, 3, 7, 30, 0, '2017-08-11 17:57:43', '2017-08-11 17:57:43', 0, 0, 1),
(787, 3, 7, 31, 0, '2017-08-11 17:57:43', '2017-08-11 17:57:43', 0, 0, 1),
(788, 3, 7, 32, 0, '2017-08-11 17:57:43', '2017-08-11 17:57:43', 0, 0, 1),
(789, 3, 7, 33, 0, '2017-08-11 17:57:43', '2017-08-11 17:57:43', 0, 0, 1),
(790, 3, 8, 34, 0, '2017-08-11 17:57:43', '2017-08-11 17:57:43', 0, 0, 1),
(791, 3, 9, 36, 0, '2017-08-11 17:57:43', '2017-08-11 17:57:43', 0, 0, 1),
(792, 3, 10, 39, 0, '2017-08-11 17:57:43', '2017-08-11 17:57:43', 0, 0, 1),
(793, 3, 11, 40, 0, '2017-08-11 17:57:43', '2017-08-11 17:57:43', 0, 0, 1),
(826, 2, 1, 1, 0, '2017-08-13 12:22:11', '2017-08-13 12:22:11', 0, 0, 1),
(827, 2, 1, 2, 0, '2017-08-13 12:22:11', '2017-08-13 12:22:11', 0, 0, 1),
(828, 2, 1, 3, 0, '2017-08-13 12:22:11', '2017-08-13 12:22:11', 0, 0, 1),
(829, 2, 1, 4, 0, '2017-08-13 12:22:11', '2017-08-13 12:22:11', 0, 0, 1),
(830, 2, 2, 5, 0, '2017-08-13 12:22:11', '2017-08-13 12:22:11', 0, 0, 1),
(831, 2, 2, 6, 0, '2017-08-13 12:22:11', '2017-08-13 12:22:11', 0, 0, 1),
(832, 2, 2, 7, 0, '2017-08-13 12:22:11', '2017-08-13 12:22:11', 0, 0, 1),
(833, 2, 2, 8, 0, '2017-08-13 12:22:11', '2017-08-13 12:22:11', 0, 0, 1),
(834, 2, 3, 14, 0, '2017-08-13 12:22:11', '2017-08-13 12:22:11', 0, 0, 1),
(835, 2, 3, 15, 0, '2017-08-13 12:22:11', '2017-08-13 12:22:11', 0, 0, 1),
(836, 2, 3, 16, 0, '2017-08-13 12:22:11', '2017-08-13 12:22:11', 0, 0, 1),
(837, 2, 3, 17, 0, '2017-08-13 12:22:11', '2017-08-13 12:22:11', 0, 0, 1),
(838, 2, 4, 18, 1, '2017-08-13 12:22:11', '2017-08-13 12:22:11', 0, 0, 1),
(839, 2, 4, 19, 1, '2017-08-13 12:22:11', '2017-08-13 12:22:11', 0, 0, 1),
(840, 2, 4, 20, 1, '2017-08-13 12:22:11', '2017-08-13 12:22:11', 0, 0, 1),
(841, 2, 4, 21, 1, '2017-08-13 12:22:11', '2017-08-13 12:22:11', 0, 0, 1),
(842, 2, 5, 22, 1, '2017-08-13 12:22:11', '2017-08-13 12:22:11', 0, 0, 1),
(843, 2, 5, 23, 1, '2017-08-13 12:22:11', '2017-08-13 12:22:11', 0, 0, 1),
(844, 2, 5, 24, 1, '2017-08-13 12:22:11', '2017-08-13 12:22:11', 0, 0, 1),
(845, 2, 5, 25, 1, '2017-08-13 12:22:11', '2017-08-13 12:22:11', 0, 0, 1),
(846, 2, 6, 26, 1, '2017-08-13 12:22:11', '2017-08-13 12:22:11', 0, 0, 1),
(847, 2, 6, 27, 1, '2017-08-13 12:22:11', '2017-08-13 12:22:11', 0, 0, 1),
(848, 2, 6, 28, 1, '2017-08-13 12:22:11', '2017-08-13 12:22:11', 0, 0, 1),
(849, 2, 6, 29, 1, '2017-08-13 12:22:11', '2017-08-13 12:22:11', 0, 0, 1),
(850, 2, 7, 30, 1, '2017-08-13 12:22:11', '2017-08-13 12:22:11', 0, 0, 1),
(851, 2, 7, 31, 1, '2017-08-13 12:22:11', '2017-08-13 12:22:11', 0, 0, 1),
(852, 2, 7, 32, 1, '2017-08-13 12:22:11', '2017-08-13 12:22:11', 0, 0, 1),
(853, 2, 7, 33, 1, '2017-08-13 12:22:11', '2017-08-13 12:22:11', 0, 0, 1),
(854, 2, 8, 34, 0, '2017-08-13 12:22:11', '2017-08-13 12:22:11', 0, 0, 1),
(855, 2, 9, 36, 0, '2017-08-13 12:22:11', '2017-08-13 12:22:11', 0, 0, 1),
(856, 2, 10, 39, 1, '2017-08-13 12:22:11', '2017-08-13 12:22:11', 0, 0, 1),
(857, 2, 11, 40, 1, '2017-08-13 12:22:11', '2017-08-13 12:22:11', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `alerts`
--

CREATE TABLE IF NOT EXISTS `alerts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(1000) NOT NULL,
  `created_datetime` datetime NOT NULL,
  `modified_datetime` datetime NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '1-Active,2-Inactive',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `created_datetime` datetime NOT NULL,
  `modified_datetime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `created_datetime`, `modified_datetime`) VALUES
(2, 'test', '2018-07-04 10:16:52', '0000-00-00 00:00:00'),
(3, 'test1', '2018-07-04 10:16:55', '0000-00-00 00:00:00'),
(4, 'Assembly June', '2018-07-04 11:52:24', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `contact_about_us`
--

CREATE TABLE IF NOT EXISTS `contact_about_us` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `contact_us` varchar(500) NOT NULL,
  `about_us` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `contact_about_us`
--

INSERT INTO `contact_about_us` (`id`, `contact_us`, `about_us`) VALUES
(1, '122222222222222', 'cfdfsd111111111');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `description` varchar(750) NOT NULL,
  `event_start` datetime NOT NULL,
  `event_end` datetime NOT NULL,
  `created_datetime` datetime NOT NULL,
  `modified_datetime` datetime NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '1-Active,2-InActive',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `description`, `event_start`, `event_end`, `created_datetime`, `modified_datetime`, `status`) VALUES
(1, 'test', 'test', '2018-07-03 02:32:35', '2018-07-03 02:32:36', '2018-07-03 10:02:40', '0000-00-00 00:00:00', 1),
(2, 'test', 'test', '2018-07-03 02:32:35', '2018-07-03 02:32:36', '2018-07-03 10:03:21', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE IF NOT EXISTS `galleries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` tinyint(4) NOT NULL,
  `title` varchar(100) NOT NULL,
  `img` varchar(100) NOT NULL,
  `created_datetime` datetime NOT NULL,
  `modified_datetime` datetime NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `cat_id`, `title`, `img`, `created_datetime`, `modified_datetime`, `status`) VALUES
(1, 2, 'Gallery images will be displayed here', 'http://schoolsapp.co.uk/images/gallery/gallery1.jpg', '2018-07-04 11:49:58', '0000-00-00 00:00:00', 1),
(2, 2, 'Gallery images will be displayed here', 'http://schoolsapp.co.uk/images/gallery/gallery2.jpg', '2018-07-04 11:49:58', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` tinyint(4) NOT NULL,
  `img` blob NOT NULL,
  `created_datetime` datetime NOT NULL,
  `modified_datetime` datetime NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `cat_id`, `img`, `created_datetime`, `modified_datetime`, `status`) VALUES
(1, 2, 0x7472696e697479636f2e706e67, '2018-07-04 11:49:58', '0000-00-00 00:00:00', 1),
(2, 2, 0x6d6f62696c652e706e67, '2018-07-04 11:49:58', '0000-00-00 00:00:00', 1),
(3, 2, 0x3730353334313034372e706e67, '2018-07-04 11:49:58', '0000-00-00 00:00:00', 1),
(4, 2, 0x4368727973616e7468656d756d2e6a7067, '2018-07-25 11:43:13', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gallerys`
--

CREATE TABLE IF NOT EXISTS `gallerys` (
  `id` int(11) NOT NULL,
  `cat_id` tinyint(4) NOT NULL,
  `img` blob NOT NULL,
  `created_datetime` datetime NOT NULL,
  `modified_datetime` datetime NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gallerys`
--

INSERT INTO `gallerys` (`id`, `cat_id`, `img`, `created_datetime`, `modified_datetime`, `status`) VALUES
(1, 2, 0x7472696e697479636f2e706e67, '2018-07-04 11:49:58', '0000-00-00 00:00:00', 1),
(2, 2, 0x6d6f62696c652e706e67, '2018-07-04 11:49:58', '0000-00-00 00:00:00', 1),
(3, 2, 0x3730353334313034372e706e67, '2018-07-04 11:49:58', '0000-00-00 00:00:00', 1),
(4, 2, 0x4368727973616e7468656d756d2e6a7067, '2018-07-25 11:43:13', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE IF NOT EXISTS `information` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(750) NOT NULL,
  `image_url` varchar(100) NOT NULL,
  `created_datetime` datetime NOT NULL,
  `modified_datetime` datetime NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '1-Active,2-Inactive',
  `title` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`id`, `description`, `image_url`, `created_datetime`, `modified_datetime`, `status`, `title`) VALUES
(1, 'We would like to inform you that our school will be closed for the National Holidays from May 3rd to May 7th.\r\nWe will be resuming on May 8th and will respond to your inquiries as soon as possible.\r\nThank you for your understanding.', 'http://schoolsapp.co.uk/images/information/information1.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(2, 'Dear families,\r\n\r\nHope you enjoyed your weekend!  Here are a few announcements.\r\n\r\nPlease come to out PTA Meeting tomorrow November 1st at 5:30 and learn about the Remember to Love program November Food 2 Kids item is Chicken and Rice (pop-top cans).\r\n\r\nOne week from tonight LRG Provision will be filled with incredible items to bid on and our amazing community of parents and teachers!\r\nDo you have your tickets? http://barrowpta.org/fano2016  We are still accepting donations, especially for Grade Level Gift Card Baskets!\r\n\r\nLast, there is no school Tuesday November 8th.  Please remember to Vote No! to Amendment 1 and Keeps our Schools Local!', 'http://schoolsapp.co.uk/images/information/information2.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `informations`
--

CREATE TABLE IF NOT EXISTS `informations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(750) NOT NULL,
  `created_datetime` datetime NOT NULL,
  `modified_datetime` datetime NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '1-Active,2-Inactive',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `informations`
--

INSERT INTO `informations` (`id`, `description`, `created_datetime`, `modified_datetime`, `status`) VALUES
(1, 'today is holiday', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `image_url` varchar(100) NOT NULL,
  `created_datetime` datetime NOT NULL,
  `modified_datetime` datetime NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '1-Active,2-Inactive',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `description`, `image_url`, `created_datetime`, `modified_datetime`, `status`) VALUES
(1, 'Holiday Announcement\r\n', 'We would like to inform you that our school will be closed for the National Holidays from May 3rd to May 7th.\r\nWe will be resuming on May 8th and will respond to your inquiries as soon as possible.\r\nThank you for your understanding.', 'http://schoolsapp.co.uk/images/news/news1.jpg', '2018-07-31 06:52:17', '0000-00-00 00:00:00', 1),
(2, 'PTA Announcements\r\n', 'Dear families,\r\n\r\nHope you enjoyed your weekend!  Here are a few announcements.\r\n\r\nPlease come to out PTA Meeting tomorrow November 1st at 5:30 and learn about the Remember to Love program.\r\nNovember Food 2 Kids item is Chicken and Rice (pop-top cans).\r\n\r\nOne week from tonight LRG Provision will be filled with incredible items to bid on and our amazing community of parents and teachers!\r\nDo you have your tickets? http://barrowpta.org/fano2016  We are still accepting donations, especially for Grade Level Gift Card Baskets!\r\n\r\nLast, there is no school Tuesday November 8th.  Please remember to Vote No! to Amendment 1 and Keeps our Schools Local!', 'http://schoolsapp.co.uk/images/news/news2.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `views` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `views`, `created_at`, `updated_at`) VALUES
(1, 'My new book', 'My new book will be released today.All my fans can login to twitter retweet the messages.', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `api_token` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `api_token`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'dave Partner', 'daveozoalor@gmail.com', '$2y$10$bNJOS/dDBP7uzZWnjYO.a.0SPJXv1DCEG1M4RDKwLjTqWEj/RuzQe', 'HofBuylESBUIly1ZoiuzId7QHqbferXfndEsbrVFDl21ragxC0reSkjBmT7p', NULL, '2018-08-02 01:08:11', '2018-08-02 01:08:11'),
(3, 'dave Partner', 'daveozoalo1r@gmail.com', '$2y$10$Nfm8hpTlUIw/UjQfVrTBzOpeB946YZvtJMdV1XbuJF4rcdfGvmK1q', 'ypDOOjz8C9rCx1t0YJeMhbQRYtVhEro3KywMEFaVvHd7ZOUwut13R3IOCece', NULL, '2018-08-05 23:38:37', '2018-08-05 23:38:37');

-- --------------------------------------------------------

--
-- Table structure for table `vacancies`
--

CREATE TABLE IF NOT EXISTS `vacancies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `contact_no` varchar(50) NOT NULL,
  `created_datetime` datetime NOT NULL,
  `modified_datetime` datetime NOT NULL,
  `status` tinyint(11) NOT NULL COMMENT '1-Active,2-Inactive',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `vacancies`
--

INSERT INTO `vacancies` (`id`, `title`, `description`, `email_id`, `contact_no`, `created_datetime`, `modified_datetime`, `status`) VALUES
(1, 'Urgently required PHP developer', 'PHP Developer who is passionate in programming database design and analytical approach. The candidate must have ability to deliver the project alone or with the help of programmers. Sound knowledge of Core PHP Magento WordPress and other latest new technologies. Ability to understand the requirements. Expertise in CSS and JS. Should have excellent knowledge of good coding standards. The candidates must have good communication skills to communicate with the clients and in house cross department team\r\n', 'karisdft456', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(2, 'Java Developers Jobs in Coimbatore', 'Java Programmers , Freshers required immediately for Systech Infovations Pvt.Ltd., a reputed IT company in Coimbatore.\r\n\r\nJob responsibility:Software development / Web based application development/ programming using Core Java, Hibernate, and Mysql.\r\n\r\nSkills:Good knowledge in Core Java, JSF and MySql . Ability to coordinate with the client and get along with the team members. M.C.A ,M.Sc, B.E., graduates alone can apply', 'karisdft457@gmail.com', '8609965540', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`admin_type`) REFERENCES `admin_type` (`id`);

--
-- Constraints for table `admin_model_action`
--
ALTER TABLE `admin_model_action`
  ADD CONSTRAINT `admin_model_action_ibfk_1` FOREIGN KEY (`model_id`) REFERENCES `admin_models` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
