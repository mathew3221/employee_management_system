-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 31, 2024 at 08:10 AM
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminuser`
--

INSERT INTO `adminuser` (`id`, `email`, `password`, `status`) VALUES
(1, 'mathewjohn@gmail.com', 'admin@mathew', 1);

--
-- Triggers `adminuser`
--
DROP TRIGGER IF EXISTS `prevent_insert`;
DELIMITER $$
CREATE TRIGGER `prevent_insert` BEFORE INSERT ON `adminuser` FOR EACH ROW BEGIN
    SIGNAL SQLSTATE '45000'
    SET MESSAGE_TEXT = 'Inserting data into this table is not allowed';
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `prevent_update_noneditable`;
DELIMITER $$
CREATE TRIGGER `prevent_update_noneditable` BEFORE UPDATE ON `adminuser` FOR EACH ROW BEGIN
    IF OLD.id = 1 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'This row cannot be updated';
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `department_name` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department_name`) VALUES
(1, 'Software Developer'),
(2, 'Quality Assurance and Testing'),
(3, 'System Administration'),
(4, 'Data Science and Analytics'),
(5, 'Cybersecurity'),
(6, 'Technical Support and IT Services'),
(7, 'Project Management'),
(8, 'UI/UX Design'),
(9, 'Sales and Marketing'),
(10, 'Human Resources (HR) and Administration'),
(12, 'Digital Marketing');

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
  `gender` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `date_of_joining` date DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `employee_status` int(1) DEFAULT NULL,
  `status` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `employee_id`, `first_name`, `last_name`, `department_id`, `email`, `mobile_no`, `gender`, `state`, `date_of_birth`, `date_of_joining`, `photo`, `address`, `password`, `employee_status`, `status`) VALUES
(1, '1', 'Mathew', 'John', 1, 'mathew@gmail.com', '7559905890', 'Male', 'kerala', '1999-01-25', '2024-07-01', 'mjlogo.png', 'hbjasdsa', '1234', 1, 1),
(2, '11', 'Reshma', 'R', 1, 'reshma@gmail.com', '1234567894', 'Female', 'kerala', '2024-07-05', '2024-07-01', 'naruto.jpg', 'hhgcc\r\nergerg', '1234', 0, 1),
(3, '13', 'Bony', 'james', 1, 'bony@gmail.com', '5464646233', 'Male', 'kerala', '2024-07-06', '2024-07-07', 'kakkashi.jpg', 'adas\r\nasda', '1234', 1, 1),
(4, '77', 'sam', 'R', 1, 'sam@gmail.com', '8589852180', 'Male', 'kerala', '1999-09-07', '2024-08-09', 'saske.jpg', 'parackal h\r\nparambuzha po\r\nkottayam\r\n', '12345', 0, 1),
(17, '12', 'Sanju', 'babu', 9, 'sanju@gmail.com', '2324523333', 'Male', 'kerala', '2024-07-02', '2024-07-11', 'kakashi3.jpg', '', '1234', 1, 1),
(15, '18', 'Anu ', 'john', 4, 'matheww@gmail.com', '2423525212', 'Female', 'keralam', '2024-07-02', '2024-07-25', 'itachi.jpg', '', '654321', 1, 1),
(18, '012', 'Sona V ', 'Sajan', 12, 'sona@gmail.com', '7559905461', 'Female', 'kerala', '2002-01-20', '2024-07-03', 'alexander-krivitskiy-yYf2bLkPFJs-unsplash.jpg', 'Sona House \r\nKottayam', '1212', 1, 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leave_applications`
--

INSERT INTO `leave_applications` (`id`, `employee_id`, `leave_type`, `from_date`, `to_date`, `description`, `status`, `admin_remark`, `created_at`) VALUES
(1, '1', '2', '2024-07-07', '2024-07-09', 'fever', '1', 'ok', '2024-07-07 11:37:45'),
(2, '2', '2', '2024-07-08', '2024-07-10', 'fever', '2', 'ok', '2024-07-07 14:41:42'),
(3, '4', '9', '2024-07-24', '2024-08-02', 'exam', '0', 'ok', '2024-07-08 09:58:14'),
(4, '1', '1', '2024-07-09', '2024-07-10', '546', '2', 'no', '2024-07-09 06:04:56'),
(7, '14', '2', '2024-07-09', '2024-07-10', 'fever', '1', 'ok', '2024-07-09 11:30:35'),
(8, '15', '2', '2024-07-12', '2024-07-16', 'dhg', '1', '', '2024-07-11 10:39:23'),
(9, '18', '10', '2024-07-12', '2024-07-13', 'I have fever', '1', '', '2024-07-12 07:32:03');

-- --------------------------------------------------------

--
-- Table structure for table `leave_type`
--

DROP TABLE IF EXISTS `leave_type`;
CREATE TABLE IF NOT EXISTS `leave_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `leave_type` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leave_type`
--

INSERT INTO `leave_type` (`id`, `leave_type`) VALUES
(1, 'Casual Leave'),
(2, 'Sick Leave'),
(3, 'Earned Leave / Privilege Leave'),
(4, 'Maternity Leave'),
(5, 'Paternity Leave'),
(7, 'Marriage Leave'),
(8, 'Compensatory Off'),
(9, 'Study Leave / Sabbatical Leave'),
(10, 'Unpaid Leave'),
(11, 'Special Leave');

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
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`id`, `employee`, `department_name`, `salary`, `allowance`, `total_salary`, `added_on`, `status`) VALUES
(1, '1', '1', 15000, 2000, 17000, '2024-07-07 16:48:19', 1),
(2, '2', '1', 15000, 3000, 18000, '2024-07-07 20:12:30', 1),
(3, '4', '1', 10000, 3000, 13000, '2024-07-08 15:24:43', 1),
(4, '', '1', 0, 0, 0, '2024-07-09 11:37:01', 1),
(5, '', '1', 0, 0, 0, '2024-07-09 11:37:09', 1),
(6, '1', '1', 10000, 1000, 11000, '2024-07-09 11:37:18', 1),
(10, '14', '5', 15000, 4000, 19000, '2024-07-09 16:58:08', 1),
(11, '15', '4', 10000, 2500, 12500, '2024-07-11 16:05:49', 1),
(12, '17', '9', 10000, 3000, 13000, '2024-07-11 17:02:24', 1),
(13, '18', '12', 15000, 2000, 17000, '2024-07-12 12:57:31', 1),
(14, '1', '1', 10000, 5000, 15000, '2024-07-22 21:06:23', 1),
(15, '1', '1', 10000, 6000, 16000, '2024-07-22 21:11:14', 1),
(16, '1', '1', 10000, 5000, 15000, '2024-07-22 21:11:47', 1),
(17, '', '1', 15000, 0, 15000, '2024-07-22 21:12:19', 1),
(18, '1', '1', 10000, 0, 10000, '2024-07-22 21:13:42', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
