-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 04, 2016 at 08:06 PM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `codei`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=103 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(101, 'jon', 'jon'),
(102, 'kingsuk', 'kingsuk');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE IF NOT EXISTS `attendance` (
  `Aid` int(44) NOT NULL AUTO_INCREMENT,
  `Eid` int(4) NOT NULL,
  `date` varchar(64) NOT NULL,
  `clockin` varchar(64) DEFAULT NULL,
  `clockout` varchar(64) DEFAULT NULL,
  `breakstatus` varchar(64) DEFAULT NULL,
  `breakname` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`Aid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`Aid`, `Eid`, `date`, `clockin`, `clockout`, `breakstatus`, `breakname`) VALUES
(1, 1101, '02/02/2016', '18:18:10', NULL, '1', 'fbreak');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1118 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `email`, `password`) VALUES
(1101, 'kingsuk', 'king@gmail.com', 'kingsuk'),
(1102, 'gargi', 'gargi@gmail.com', 'gargi'),
(1103, 'sdgdg', 'gargi', 'gargi'),
(1104, 'gargi', 'gargi@gmail.com', 'gargi'),
(1105, 'sfrfd', 'fdgdfg', 'fsdgf'),
(1106, 'hgnhn', 'jon', 'jon'),
(1107, 'asda', 'kingsuk@gm.ck', 'kingsuk'),
(1108, 'aa', 'kingsuk@gdfgh.ghj', 'kingsuk'),
(1109, 'aa', 'aa@gf.gh', 'aa'),
(1110, 'adasd', 'afdas@jhajsdhf.com', 'hsfjsdfh'),
(1111, 'adf', 'kfgdsfg@jkdgfskjdgfgsdf.com', 'sadfsadf'),
(1112, 'dsfsd', 'aaa@gma.cjh', 'sdfs'),
(1113, 'dfgfd', 'fasdf@dgfg.com', 'afsdf'),
(1114, 'dsfsadf', 'kingsuk@gfg.cv', 'kingsuk'),
(1115, 'asdf', 'sad@g.cv', 'dfasd'),
(1116, 'ki', 'kingsuk@gs.com', 'kingsuk'),
(1117, 'Subahdip Sahoo', 'subhadip.tier5@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `fbreak`
--

CREATE TABLE IF NOT EXISTS `fbreak` (
  `Fid` int(10) NOT NULL AUTO_INCREMENT,
  `Eid` int(4) NOT NULL,
  `date` varchar(64) NOT NULL,
  `starttime` varchar(64) NOT NULL,
  `endtime` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`Fid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `fbreak`
--

INSERT INTO `fbreak` (`Fid`, `Eid`, `date`, `starttime`, `endtime`) VALUES
(1, 1101, '02/02/2016', '18:26:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lbreak`
--

CREATE TABLE IF NOT EXISTS `lbreak` (
  `Lid` int(10) NOT NULL AUTO_INCREMENT,
  `Eid` int(4) NOT NULL,
  `date` varchar(64) NOT NULL,
  `starttime` varchar(64) NOT NULL,
  `endtime` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`Lid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sbreak`
--

CREATE TABLE IF NOT EXISTS `sbreak` (
  `Sid` int(10) NOT NULL AUTO_INCREMENT,
  `Eid` int(4) NOT NULL,
  `date` varchar(64) NOT NULL,
  `starttime` varchar(64) NOT NULL,
  `endtime` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`Sid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_attendance`
--

CREATE TABLE IF NOT EXISTS `tbl_attendance` (
  `id_attendance` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `attend_at` datetime NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0->clockin, 1-> clockout',
  PRIMARY KEY (`id_attendance`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_attendance`
--

INSERT INTO `tbl_attendance` (`id_attendance`, `id_user`, `attend_at`, `status`) VALUES
(1, 2, '2016-02-04 17:02:24', '0'),
(2, 2, '2016-02-04 17:02:41', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_break`
--

CREATE TABLE IF NOT EXISTS `tbl_break` (
  `id_break` int(11) NOT NULL AUTO_INCREMENT,
  `break_name` varchar(50) NOT NULL,
  `break_type` int(11) NOT NULL,
  `break_time` int(11) NOT NULL,
  PRIMARY KEY (`id_break`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_break`
--

INSERT INTO `tbl_break` (`id_break`, `break_name`, `break_type`, `break_time`) VALUES
(1, 'Pre Lunch Break', 1, 20),
(2, 'Lunch Break', 2, 60),
(3, 'Post Lunch Break', 3, 20);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_emp_break`
--

CREATE TABLE IF NOT EXISTS `tbl_emp_break` (
  `id_emp_break` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `break_type` int(11) NOT NULL,
  `taken_at` datetime NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '0' COMMENT '0-> Take break, 1-> Return from break',
  PRIMARY KEY (`id_emp_break`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `tbl_emp_break`
--

INSERT INTO `tbl_emp_break` (`id_emp_break`, `id_user`, `break_type`, `taken_at`, `status`) VALUES
(1, 1101, 1, '2016-02-03 13:36:44', '0'),
(2, 1117, 1, '2016-02-03 13:32:44', '0'),
(3, 2, 1, '2016-02-04 19:37:33', '0'),
(4, 2, 1, '2016-02-04 19:39:34', '0'),
(5, 2, 1, '2016-02-04 19:39:57', '0'),
(6, 2, 1, '2016-02-04 19:39:58', '0'),
(7, 2, 1, '2016-02-04 19:39:59', '0'),
(8, 2, 1, '2016-02-04 19:43:57', '0'),
(9, 2, 1, '2016-02-04 19:44:35', '0'),
(10, 2, 1, '2016-02-04 19:45:17', '0'),
(11, 2, 1, '2016-02-04 19:45:54', '0'),
(12, 2, 1, '2016-02-04 19:58:26', '0'),
(13, 2, 1, '2016-02-04 19:58:30', '0'),
(14, 2, 1, '2016-02-04 19:58:35', '0'),
(15, 2, 1, '2016-02-04 19:59:06', '0'),
(16, 2, 1, '2016-02-04 20:00:04', '0'),
(17, 2, 1, '2016-02-04 20:00:12', '0'),
(18, 2, 1, '2016-02-04 20:03:40', '0'),
(19, 2, 1, '2016-02-04 20:03:50', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `activation_key` varchar(255) NOT NULL,
  `user_type` int(11) NOT NULL,
  `user_status` enum('1','0') NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id_user`, `user_name`, `user_email`, `user_pass`, `activation_key`, `user_type`, `user_status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@tier5.in', '21232f297a57a5a743894a0e4a801fc3', '', 1, '1', '2016-02-03 09:20:22', '2016-02-03 09:20:22'),
(2, 'subhadip', 'subhadip.tier5@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', 2, '1', '2016-02-03 08:27:28', '2016-02-03 08:27:28');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
