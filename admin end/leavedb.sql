-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 24, 2014 at 02:45 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `leavedb`
--
CREATE DATABASE IF NOT EXISTS `leavedb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `leavedb`;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `name` varchar(15) NOT NULL,
  `id` int(1) NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`name`, `id`) VALUES
('0', 1),
('Teaching', 1);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `dept_id` varchar(2) NOT NULL,
  `dept_name` varchar(25) NOT NULL,
  PRIMARY KEY (`dept_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `dept_name`) VALUES
('', ''),
('01', 'ProFessor'),
('CS', 'Comp Science'),
('ME', 'Mechanical');

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE IF NOT EXISTS `designation` (
  `name` varchar(20) NOT NULL,
  `id` int(2) NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`name`, `id`) VALUES
('ProFessor', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee_leave`
--

CREATE TABLE IF NOT EXISTS `employee_leave` (
  `emp_id` int(4) NOT NULL,
  `leave_id` int(2) NOT NULL,
  `carry_over` int(2) DEFAULT NULL,
  `leave_approved` int(2) DEFAULT NULL,
  `leave_pending` int(2) DEFAULT NULL,
  `leave_remaining` int(2) DEFAULT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee_personal`
--

CREATE TABLE IF NOT EXISTS `employee_personal` (
  `emp_id` int(4) NOT NULL,
  `emp_name` varchar(45) NOT NULL,
  `address` varchar(100) NOT NULL,
  `age` int(2) DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `contact` int(11) DEFAULT NULL,
  `email_id` varchar(45) NOT NULL,
  PRIMARY KEY (`emp_id`),
  UNIQUE KEY `id_UNIQUE` (`emp_id`),
  UNIQUE KEY `Email_id_UNIQUE` (`email_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee_professional`
--

CREATE TABLE IF NOT EXISTS `employee_professional` (
  `emp_id` int(4) NOT NULL,
  `dept_id` int(2) NOT NULL,
  `type` char(1) NOT NULL,
  `date_of_joining` date NOT NULL,
  `designation` varchar(45) NOT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `leave_application`
--

CREATE TABLE IF NOT EXISTS `leave_application` (
  `sno` int(5) NOT NULL AUTO_INCREMENT,
  `emp_id` int(4) NOT NULL,
  `leave_id` int(2) NOT NULL,
  `status` char(1) NOT NULL,
  `reason` varchar(140) DEFAULT NULL,
  `reply` varchar(140) DEFAULT NULL,
  `nod` int(2) DEFAULT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `leave_application`
--

INSERT INTO `leave_application` (`sno`, `emp_id`, `leave_id`, `status`, `reason`, `reply`, `nod`, `date_from`, `date_to`) VALUES
(1, 10, 1, 'p', 'blah blah blah', '', 5, '2014-07-16', '2014-07-20'),
(2, 11, 2, 'p', 'cvc', '', 6, '2014-07-09', '2014-07-14'),
(3, 11, 3, 'p', 'defdsfsf', NULL, 4, '2014-07-22', '2014-07-26');

-- --------------------------------------------------------

--
-- Table structure for table `leave_holiday`
--

CREATE TABLE IF NOT EXISTS `leave_holiday` (
  `name` varchar(20) NOT NULL,
  `date_of_holiday` date NOT NULL,
  `repeat_annually` char(1) DEFAULT NULL,
  `duration` char(4) NOT NULL,
  PRIMARY KEY (`date_of_holiday`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `leave_holiday1`
--

CREATE TABLE IF NOT EXISTS `leave_holiday1` (
  `ID` int(11) NOT NULL,
  `Title` varchar(20) NOT NULL,
  `Detail` char(2) NOT NULL,
  `eventDate` varchar(25) NOT NULL,
  `dateAdded` date NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leave_holiday1`
--

INSERT INTO `leave_holiday1` (`ID`, `Title`, `Detail`, `eventDate`, `dateAdded`) VALUES
(0, '', '', '2014-07-30', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `leave_types`
--

CREATE TABLE IF NOT EXISTS `leave_types` (
  `leave_id` int(2) NOT NULL,
  `leave_name` varchar(20) NOT NULL,
  `teaching` int(2) NOT NULL,
  `nteaching` int(2) NOT NULL,
  PRIMARY KEY (`leave_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leave_types`
--

INSERT INTO `leave_types` (`leave_id`, `leave_name`, `teaching`, `nteaching`) VALUES
(0, '', 3, 0),
(0, 'Abcd Efgh', 12, 13),
(0, 'cl', 60, 0),
(0, 'earn', 17, 0),
(0, 'el', 34, 0),
(0, 'lwp', 777, 0),
(0, 'MeDIcal LEAve', 1, 2),
(0, 'ml', 77, 0);

-- --------------------------------------------------------

--
-- Table structure for table `login2`
--

CREATE TABLE IF NOT EXISTS `login2` (
  `e_id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `department` char(2) NOT NULL,
  `category` char(1) NOT NULL,
  `result` varchar(20) NOT NULL,
  `password` varchar(45) NOT NULL,
  PRIMARY KEY (`e_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `testevent1` ON SCHEDULE EVERY 1 MONTH STARTS '2014-07-22 11:30:22' ON COMPLETION NOT PRESERVE ENABLE DO INSERT INTO `leave_types` SET leaves_alloted=leaves_alloted+3$$

CREATE DEFINER=`root`@`localhost` EVENT `testevent2` ON SCHEDULE EVERY 1 MONTH STARTS '2014-07-24 12:03:22' ON COMPLETION NOT PRESERVE ENABLE DO INSERT INTO `leave_types` SET teaching=teaching+3$$

CREATE DEFINER=`root`@`localhost` EVENT `testevent3` ON SCHEDULE EVERY 1 MONTH STARTS '2014-07-24 12:03:22' ON COMPLETION NOT PRESERVE ENABLE DO INSERT INTO `leave_types` SET teaching=teaching+3$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
