-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 06, 2013 at 06:30 PM
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
  `batch` varchar(50) NOT NULL,
  `time` varchar(45) NOT NULL,
  `venue` varchar(50) NOT NULL,
  `fees` double NOT NULL,
  `remark` text NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`stud_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`stud_id`, `name`, `gender`, `pic`, `address`, `contact`, `occupation`, `email`, `batch`, `time`, `venue`, `fees`, `remark`, `date`) VALUES
(1, 'vrushali', 'm', '-', '17/28,jalgaon', 9503226823, 'mca', 'verg', '1', '00:00:03', 'nsk', 2000, '', '0000-00-00'),
(2, 'geeta', 'f', 'logo10.jpg', 'nscdsc', 8786756, 'xbcv', 'bfdfse', '1', '00:00:05', 'bcvdf', 5000, '', '0000-00-00'),
(3, 'jeevan', 'm', 'logo5.jpg', 'nasik', 8055508545, 'dev', 'jeevan@gmail.com', '1', '00:00:04', '1000', 1000, '', '0000-00-00'),
(4, 'sneha', 'm', 'imgs/1375792382Penguins.jpg', 'nashik', 9503226823, 'dance', 'snehakame@gmail.com', '3', '00:00:09', 'are', 3000, 'retse', '2013-08-10'),
(5, 'wave', 'm', '', 'ttest', 8888884083, 'dancer', 'snehakame@gmail.com', '5', '12:08:54', 'pune', 7000, '', '0000-00-00'),
(6, 'atul', 'm', 'imgs/1375767821Desert.jpg', 'nashik', 9028290686, 'dancer', 'atulgosavi7078@gmail.com', '3', '00:00:09', 'pune', 4000, '', '0000-00-00'),
(7, 'Rohan', 'm', '', 'Pune Chincholi', 9503226823, 'dance', 'rohangosavi7078@gmail.com', '7', '4pm', 'nahik', 5000, 'test', '0000-00-00'),
(8, 'navin', 'm', '-', 'Nashik', 9028290686, 'dance', 'atulgosavi7078@gmail.com', '7', '09:34:00', 'nahik', 5000, '', '0000-00-00'),
(9, 'Mohan', 'm', '-', 'Junnar', 9028290686, 'dancer', 'khandgeyj@gmail.com', '3', '00:00:05', 'nashik', 8000, 'this is change and up to date data', '2013-08-08'),
(10, 'Megha', 'm', '-', 'pune nashik roads', 9028290686, 'dancer', 'vrushali.golesar@gmail.com', '3', '04:03:56', 'nashik', 8000, ' testing demo', '2012-02-23'),
(11, 'edrte', 'm', 'imgs/1375780130Lighthouse.jpg', 'sfsdfsdf', 9960535128, 'sdf', 'dsf', '0', '00:00:00', 'dsf', 0, ' dsf', '2015-08-07'),
(12, 'kishor', 'm', 'imgs/1375792081Lighthouse.jpg', 'nashik', 8888884083, 'Business', 'kishor@gmail.com', 'morning', '9am', 'College Road', 800, 'Wave TechLine', '2013-08-10'),
(14, 'tester', 'm', '', 'wew asdfd sdf ', 9960535128, 'dancer', 'khandgeyj@gmail.com', 'evening', '6pm', 'nashik', 800, ' ertertert', '2013-08-06');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=128 ;

--
-- Dumping data for table `partial_payment`
--

INSERT INTO `partial_payment` (`p_id`, `s_id`, `p_mode`, `p_date`, `p_check`, `p_amt`) VALUES
(115, 2, 'Cash', '2013-08-02', '', 1000),
(116, 2, 'Cheque', '2013-08-02', '123456', 1000),
(117, 2, 'Cheque', '2013-08-02', '', 3000),
(118, 3, 'Cheque', '2013-08-03', '', 1000),
(119, 1, 'Cheque', '2013-08-03', '', 1000),
(120, 8, 'Cash', '2013-08-06', '-', 2000),
(121, 10, 'Cash', '2013-08-06', '', 5000),
(122, 12, 'Cash', '2013-08-06', '', 400),
(123, 12, 'Cheque', '2013-08-06', '65465', 400),
(124, 6, 'Cheque', '2013-08-06', '45654', 4000),
(125, 6, 'Cheque', '2013-08-06', '546', 4000),
(126, 12, 'Cheque', '2013-08-06', '65465', 800),
(127, 14, 'Cheque', '2013-08-06', 'ASE454546', 400);

-- --------------------------------------------------------

--
-- Table structure for table `sms`
--

CREATE TABLE IF NOT EXISTS `sms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `s_id` int(30) NOT NULL,
  `receiver` text NOT NULL,
  `message` text NOT NULL,
  `response` text NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `sms`
--

INSERT INTO `sms` (`id`, `s_id`, `receiver`, `message`, `response`, `date`) VALUES
(1, 0, '7350538191', 'sdgfdfgdfg', '', '0000-00-00 00:00:00'),
(2, 0, '7350538191', 'sdgfdfgdfg', '', '0000-00-00 00:00:00'),
(3, 0, '7350538191', 'sdgfdfgdfg', '', '2013-08-03 13:35:38'),
(4, 0, '7350538191', 'sdgfdfgdfg', '', '2013-08-03 13:38:14'),
(5, 0, '7350538191', 'bfggddf', '', '2013-08-03 13:38:31'),
(6, 0, '7350538191', 'bfggddf', '', '2013-08-03 13:39:15'),
(7, 0, '8888884083', 'vdsdfsdvf', '', '2013-08-03 13:39:47'),
(8, 0, '', '', '', '2013-08-05 12:03:26'),
(9, 0, '', '', '', '2013-08-05 12:03:38'),
(10, 0, '', '', '', '2013-08-05 12:36:59'),
(11, 0, '', '', '', '2013-08-05 12:36:59'),
(12, 0, '', '', '', '2013-08-05 12:37:00'),
(13, 0, '', '', '', '2013-08-05 12:37:00'),
(14, 0, '', 'Hello Dear,\r\n        Please pay your remaining fee as soon as possible\r\n\r\nThank you\r\n', '', '2013-08-05 12:38:48'),
(15, 0, '', 'Hello Dear,\r\n        Please pay your remaining fee as soon as possible\r\n\r\nThank you\r\n', '', '2013-08-05 12:38:49'),
(16, 0, '', 'Hello Dear,\r\n        Please pay your remaining fee as soon as possible\r\n\r\nThank you\r\n', '', '2013-08-05 12:38:50'),
(17, 0, '', 'Hello Dear,\r\n        Please pay your remaining fee as soon as possible\r\n\r\nThank you\r\n', '', '2013-08-05 12:38:50'),
(18, 0, '8055508545', 'Hello Dear,\r\n        Please pay your remaining fee as soon as possible\r\n\r\nThank you\r\n', '', '2013-08-05 12:48:31'),
(19, 0, '8786756', 'Hello Dear,\r\n        Please pay your remaining fee as soon as possible\r\n\r\nThank you\r\n', '', '2013-08-05 12:48:31'),
(20, 0, '8055508545', 'Hello Dear,\r\n        Please pay your remaining fee as soon as possible\r\n\r\nThank you\r\n', '', '2013-08-05 12:48:32'),
(21, 0, '9028290686', 'Hello Dear,\r\n        Please pay your remaining fee as soon as possible\r\n\r\nThank you\r\n', '', '2013-08-05 12:48:32'),
(22, 0, '8055508545', 'Hello Dear,\r\n               Please pay your remaining fee as soon as possible.\r\n\r\n       Thank you\r\nNavin Dance Academy\r\n  (+919823822717)\r\n\r\n      ', '', '2013-08-05 15:27:56'),
(23, 0, '9503226823', 'Hello Dear,\n               Please pay your remaining fee as soon as possible.\n\n       Thank you\nNavin Dance Academy\n  (+919823822717)\n\n      ', '', '2013-08-05 15:28:08'),
(24, 5, '8055508545', 'Hello Dear,\r\n               Please pay your remaining fee as soon as possible.\r\n\r\n       Thank you\r\nNavin Dance Academy\r\n  (+919823822717)\r\n\r\n      ', 'Your message is successfully sent to:918055508545\r\n', '2013-08-05 15:35:49'),
(25, 1, '9503226823', 'Hello Dear,\r\n               Please pay your remaining fee as soon as possible.\r\n\r\n       Thank you\r\nNavin Dance Academy\r\n  (+919823822717)\r\n\r\n      ', 'Your message is successfully sent to:919503226823\r\n', '2013-08-05 15:35:49'),
(26, 5, '888888408', 'Hello Dear,\r\n               Please pay your remaining fee as soon as possible.\r\n\r\n       Thank you\r\nNavin Dance Academy\r\n  (+919823822717)\r\n\r\n      ', 'Invalid mobile number.', '2013-08-05 15:35:50'),
(27, 9, '9028290686', 'Hello Dear,\r\n               Please pay your remaining fee as soon as possible.\r\n\r\n       Thank you\r\nNavin Dance Academy\r\n  (+919823822717)\r\n\r\n      ', 'Your message is successfully sent to:919028290686\r\n', '2013-08-05 15:35:50'),
(28, 8, '9028290686', 'Hello Dear,\r\n               Please pay your remaining fee as soon as possible.\r\n\r\n       Thank you\r\nNavin Dance Academy\r\n  (+919823822717)\r\n\r\n      ', 'Your message is successfully sent to:919028290686\r\n', '2013-08-05 18:40:48'),
(29, 1, '9503226823', 'Hello Dear,\r\n               Please pay your remaining fee as soon as possible.\r\n\r\n       Thank you\r\nNavin Dance Academy\r\n  (+919823822717)\r\n\r\n      ', 'Your message is successfully sent to:919503226823\r\n', '2013-08-06 15:05:17'),
(30, 1, '9503226823', 'Hello Dear,\r\n               Please pay your remaining fee as soon as possible.\r\n\r\n       Thank you\r\nNavin Dance Academy\r\n  (+919823822717)\r\n\r\n      ', 'Your message is successfully sent to:919503226823\r\n', '2013-08-06 17:31:26');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
