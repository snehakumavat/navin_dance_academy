-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 05, 2013 at 06:02 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `navin`
--

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE IF NOT EXISTS `form` (
  `stud_id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `pic` text NOT NULL,
  `address` text NOT NULL,
  `contact` bigint(40) NOT NULL,
  `occupation` varchar(50) NOT NULL,
  `email` text NOT NULL,
  `batch` int(5) NOT NULL,
  `time` time NOT NULL,
  `venue` varchar(50) NOT NULL,
  `fees` double NOT NULL,
  PRIMARY KEY (`stud_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`stud_id`, `name`, `gender`, `pic`, `address`, `contact`, `occupation`, `email`, `batch`, `time`, `venue`, `fees`) VALUES
(1, 'vrushali', 'f', 'logo6.jpg', '17/28,jalgaon', 8055508545, 'mca', 'verg', 1, '00:00:03', 'nsk', 2000),
(2, 'geeta', 'f', 'logo10.jpg', 'nscdsc', 8786756, 'xbcv', 'bfdfse', 1, '00:00:05', 'bcvdf', 5000),
(3, 'jeevan', 'm', 'logo5.jpg', 'nasik', 8055508545, 'dev', 'jeevan@gmail.com', 1, '00:00:04', '1000', 1000),
(4, 'sneha', 'm', 'Koala.jpg', 'nashik', 9503226823, 'dance', 'snehakame@gmail.com', 3, '00:00:09', 'are', 3000),
(5, 'wave', 'm', '', 'ttest', 8888884083, 'dancer', 'snehakame@gmail.com', 5, '12:08:54', 'pune', 7000),
(6, 'atul', 'm', '', 'nashik', 9028290686, 'dancer', 'atulgosavi7078@gmail.com', 3, '00:00:09', 'pune', 4000);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `u_id` int(5) NOT NULL AUTO_INCREMENT,
  `u_name` varchar(50) NOT NULL,
  `u_pass` varchar(50) NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`u_id`, `u_name`, `u_pass`) VALUES
(1, 'navin', 'admin'),
(2, 'dance', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `msg`
--

CREATE TABLE IF NOT EXISTS `msg` (
  `msg_id` int(12) NOT NULL AUTO_INCREMENT,
  `msg` text NOT NULL,
  PRIMARY KEY (`msg_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `msg`
--

INSERT INTO `msg` (`msg_id`, `msg`) VALUES
(1, 'Hello Dear,\r\n               Please pay your remaining fee as soon as possible.\r\n\r\n       Thank you\r\nNavin Dance Academy\r\n  (+919823822717)\r\n\r\n      ');

-- --------------------------------------------------------

--
-- Table structure for table `partial_payment`
--

CREATE TABLE IF NOT EXISTS `partial_payment` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_id` int(11) NOT NULL,
  `p_mode` varchar(25) NOT NULL,
  `p_date` date NOT NULL,
  `p_check` varchar(25) NOT NULL,
  `p_amt` double NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=120 ;

--
-- Dumping data for table `partial_payment`
--

INSERT INTO `partial_payment` (`p_id`, `s_id`, `p_mode`, `p_date`, `p_check`, `p_amt`) VALUES
(115, 2, 'Cash', '2013-08-02', '', 1000),
(116, 2, 'Cheque', '2013-08-02', '123456', 1000),
(117, 2, 'Cheque', '2013-08-02', '', 3000),
(118, 3, 'Cheque', '2013-08-03', '', 1000),
(119, 1, 'Cheque', '2013-08-03', '', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `sms`
--

CREATE TABLE IF NOT EXISTS `sms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `receiver` text NOT NULL,
  `message` text NOT NULL,
  `response` text NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `sms`
--

INSERT INTO `sms` (`id`, `receiver`, `message`, `response`, `date`) VALUES
(1, '7350538191', 'sdgfdfgdfg', '', '0000-00-00 00:00:00'),
(2, '7350538191', 'sdgfdfgdfg', '', '0000-00-00 00:00:00'),
(3, '7350538191', 'sdgfdfgdfg', '', '2013-08-03 13:35:38'),
(4, '7350538191', 'sdgfdfgdfg', '', '2013-08-03 13:38:14'),
(5, '7350538191', 'bfggddf', '', '2013-08-03 13:38:31'),
(6, '7350538191', 'bfggddf', '', '2013-08-03 13:39:15'),
(7, '8888884083', 'vdsdfsdvf', '', '2013-08-03 13:39:47'),
(8, '', '', '', '2013-08-05 12:03:26'),
(9, '', '', '', '2013-08-05 12:03:38'),
(10, '', '', '', '2013-08-05 12:36:59'),
(11, '', '', '', '2013-08-05 12:36:59'),
(12, '', '', '', '2013-08-05 12:37:00'),
(13, '', '', '', '2013-08-05 12:37:00'),
(14, '', 'Hello Dear,\r\n        Please pay your remaining fee as soon as possible\r\n\r\nThank you\r\n', '', '2013-08-05 12:38:48'),
(15, '', 'Hello Dear,\r\n        Please pay your remaining fee as soon as possible\r\n\r\nThank you\r\n', '', '2013-08-05 12:38:49'),
(16, '', 'Hello Dear,\r\n        Please pay your remaining fee as soon as possible\r\n\r\nThank you\r\n', '', '2013-08-05 12:38:50'),
(17, '', 'Hello Dear,\r\n        Please pay your remaining fee as soon as possible\r\n\r\nThank you\r\n', '', '2013-08-05 12:38:50'),
(18, '8055508545', 'Hello Dear,\r\n        Please pay your remaining fee as soon as possible\r\n\r\nThank you\r\n', '', '2013-08-05 12:48:31'),
(19, '8786756', 'Hello Dear,\r\n        Please pay your remaining fee as soon as possible\r\n\r\nThank you\r\n', '', '2013-08-05 12:48:31'),
(20, '8055508545', 'Hello Dear,\r\n        Please pay your remaining fee as soon as possible\r\n\r\nThank you\r\n', '', '2013-08-05 12:48:32'),
(21, '9028290686', 'Hello Dear,\r\n        Please pay your remaining fee as soon as possible\r\n\r\nThank you\r\n', '', '2013-08-05 12:48:32'),
(22, '8055508545', 'Hello Dear,\r\n               Please pay your remaining fee as soon as possible.\r\n\r\n       Thank you\r\nNavin Dance Academy\r\n  (+919823822717)\r\n\r\n      ', '', '2013-08-05 15:27:56'),
(23, '9503226823', 'Hello Dear,\n               Please pay your remaining fee as soon as possible.\n\n       Thank you\nNavin Dance Academy\n  (+919823822717)\n\n      ', '', '2013-08-05 15:28:08'),
(24, '8055508545', 'Hello Dear,\r\n               Please pay your remaining fee as soon as possible.\r\n\r\n       Thank you\r\nNavin Dance Academy\r\n  (+919823822717)\r\n\r\n      ', 'Your message is successfully sent to:918055508545\r\n', '2013-08-05 15:35:49'),
(25, '9503226823', 'Hello Dear,\r\n               Please pay your remaining fee as soon as possible.\r\n\r\n       Thank you\r\nNavin Dance Academy\r\n  (+919823822717)\r\n\r\n      ', 'Your message is successfully sent to:919503226823\r\n', '2013-08-05 15:35:49'),
(26, '888888408', 'Hello Dear,\r\n               Please pay your remaining fee as soon as possible.\r\n\r\n       Thank you\r\nNavin Dance Academy\r\n  (+919823822717)\r\n\r\n      ', 'Invalid mobile number.', '2013-08-05 15:35:50'),
(27, '9028290686', 'Hello Dear,\r\n               Please pay your remaining fee as soon as possible.\r\n\r\n       Thank you\r\nNavin Dance Academy\r\n  (+919823822717)\r\n\r\n      ', 'Your message is successfully sent to:919028290686\r\n', '2013-08-05 15:35:50');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
