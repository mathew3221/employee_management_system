-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 30, 2024 at 01:34 PM
-- Server version: 5.7.40
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ems`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminuser`
--

DROP TABLE IF EXISTS `adminuser`;
CREATE TABLE IF NOT EXISTS `adminuser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminuser`
--

INSERT INTO `adminuser` (`id`, `email`, `password`, `status`) VALUES
(1, 'mathew@gmail.com', '1234', 1),
(3, 'mathew.mediatrixs@gmail.com', '3221', 1);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `department_name` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department_name`) VALUES
(1, 'Security Administrator'),
(2, 'System Administrator'),
(3, 'Network Administrator'),
(4, 'IT Manager'),
(5, 'Chief Technology Officer'),
(6, 'Application Developer'),
(7, 'Help Desk Support'),
(8, 'Database Administrator'),
(9, 'Web Developer');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE IF NOT EXISTS `employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(20) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `department_id` int(10) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mobile_no` varchar(20) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `date_of_joining` date DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `employee_id`, `first_name`, `last_name`, `department_id`, `email`, `mobile_no`, `country`, `state`, `city`, `date_of_birth`, `date_of_joining`, `photo`, `address`, `password`, `status`) VALUES
(21, '1231324', 'Sona', 'sajan', 1, 'sona@gmail.com', '34535345346', 'india', 'kerala', 'pathanamthitta', '2000-12-23', '2024-04-10', 'assets/images/Untitled_design.jpg', 'wrwerwerwe', '1234', 1),
(20, '184664', 'Aravind', 'suresh', 1, 'aravind@gmail.com', '7676574754', 'india', 'kerala', 'kottayam', '2024-03-01', '2024-03-11', 'assets/images/_6b2c0dac-d83d-4440-a9b0-cc9183aa4d0f.jpg', 'yyuyfuft', '3221', 1),
(18, '123456789', 'Mathew', 'john', 5, 'mathew@gmail.com', '988978978', 'india', 'kerala', 'kottayam', '2024-03-01', '2024-03-16', 'assets/images/naruto11.png', 'tytdtdutdutdutd', '3221', 1),
(25, '23356', 'Anu ', 'Joseph', 5, 'anu@gmail.com', '666884158548', 'india', 'kerala', 'kottayam', '2024-06-06', '2024-05-31', 'assets/images/WhatsApp_Image_2024-03-20_at_2_06_35_PM4.jpeg', 'Gjiueikk', '1234', 1),
(27, '5465656456', 'princy', 'j', 1, 'princy@gmail.com', '2343554545', 'india', 'kerala', 'kottayam', '2024-06-05', '2024-06-20', 'assets/images/WhatsApp_Image_2024-03-20_at_2_06_35_PM10.jpeg', 'efsefefreferfr', '1234', 1);

-- --------------------------------------------------------

--
-- Table structure for table `leave_applications`
--

DROP TABLE IF EXISTS `leave_applications`;
CREATE TABLE IF NOT EXISTS `leave_applications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(50) DEFAULT NULL,
  `leave_type` varchar(50) DEFAULT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `description` text,
  `status` varchar(20) DEFAULT NULL,
  `admin_remark` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leave_applications`
--

INSERT INTO `leave_applications` (`id`, `employee_id`, `leave_type`, `from_date`, `to_date`, `description`, `status`, `admin_remark`, `created_at`) VALUES
(15, '18', '1', '2024-06-30', '2024-07-06', 'hhfxcc', '0', 'htdd', '2024-06-30 12:42:14'),
(14, '21', '6', '2024-06-13', '2024-06-17', 'trftj', '0', NULL, '2024-06-05 06:32:59'),
(13, '18', '3', '2024-04-23', '2024-04-25', 'gyfuyj', '1', 'tdtydrtrd', '2024-04-23 06:51:56'),
(10, '25', '2', '2024-04-23', '2024-04-24', 'leave', '0', NULL, '2024-04-22 06:48:18'),
(11, '27', '4', '2024-04-23', '2024-04-27', 'fwegfwegewg', '1', 'jgdhg', '2024-04-22 09:51:56');

-- --------------------------------------------------------

--
-- Table structure for table `leave_type`
--

DROP TABLE IF EXISTS `leave_type`;
CREATE TABLE IF NOT EXISTS `leave_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `leave_type` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leave_type`
--

INSERT INTO `leave_type` (`id`, `leave_type`) VALUES
(1, 'Privilege Leave'),
(2, 'Casual leave'),
(3, 'Sick leave'),
(4, 'Maternity leave'),
(5, 'Paternity leaves'),
(6, 'Marriage leave'),
(7, 'Sabbatical Leave'),
(8, 'Bereavement leave'),
(9, 'Half-day leave'),
(10, 'Loss of Pay Leave'),
(11, 'Compensatory Off'),
(12, 'Menstruation Leave');

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

DROP TABLE IF EXISTS `salary`;
CREATE TABLE IF NOT EXISTS `salary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee` varchar(50) DEFAULT NULL,
  `department_name` varchar(50) DEFAULT NULL,
  `salary` int(10) DEFAULT NULL,
  `allowance` int(10) DEFAULT NULL,
  `total_salary` int(10) NOT NULL,
  `added_on` datetime DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`id`, `employee`, `department_name`, `salary`, `allowance`, `total_salary`, `added_on`, `status`) VALUES
(8, '20', '1', 2423, 234, 2657, '2024-06-26 17:01:02', 1),
(7, '18', '5', 323423, 234, 323657, '2024-06-26 13:15:08', 1),
(6, '27', '1', 2423, 45, 2468, '2024-06-26 12:16:51', 1),
(5, '21', '1', 234, 3, 237, '2024-06-21 19:10:27', 1),
(10, '21', '1', 2423, 12312, 14735, '2024-06-28 16:25:37', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
