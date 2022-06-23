-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 23, 2022 at 01:58 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_ass`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `extotal_view`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `extotal_view`;
CREATE TABLE IF NOT EXISTS `extotal_view` (
`expen_sum` decimal(65,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `intotal_view`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `intotal_view`;
CREATE TABLE IF NOT EXISTS `intotal_view` (
`sum_amount` decimal(65,0)
);

-- --------------------------------------------------------

--
-- Table structure for table `tblbank`
--

DROP TABLE IF EXISTS `tblbank`;
CREATE TABLE IF NOT EXISTS `tblbank` (
  `bankid` int(100) NOT NULL AUTO_INCREMENT,
  `bank_name` varchar(20) NOT NULL,
  PRIMARY KEY (`bankid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblbank`
--

INSERT INTO `tblbank` (`bankid`, `bank_name`) VALUES
(1, 'ABA'),
(2, 'ACELEDA'),
(3, 'LOLC'),
(4, 'WING'),
(5, 'AMK'),
(6, 'AEON');

-- --------------------------------------------------------

--
-- Table structure for table `tblbankacc`
--

DROP TABLE IF EXISTS `tblbankacc`;
CREATE TABLE IF NOT EXISTS `tblbankacc` (
  `bankid` int(100) NOT NULL AUTO_INCREMENT,
  `banknum` varchar(50) NOT NULL,
  `accname` varchar(50) NOT NULL,
  PRIMARY KEY (`bankid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblbankacc`
--

INSERT INTO `tblbankacc` (`bankid`, `banknum`, `accname`) VALUES
(4, 'ABA', 'sela'),
(3, 'ACELEDA', 'yornmeun');

-- --------------------------------------------------------

--
-- Table structure for table `tblexpensse`
--

DROP TABLE IF EXISTS `tblexpensse`;
CREATE TABLE IF NOT EXISTS `tblexpensse` (
  `expenseid` int(100) NOT NULL AUTO_INCREMENT,
  `amount` int(100) NOT NULL,
  `bank` varchar(30) NOT NULL,
  `decrition` varchar(100) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`expenseid`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblexpensse`
--

INSERT INTO `tblexpensse` (`expenseid`, `amount`, `bank`, `decrition`, `date`) VALUES
(8, 50, 'AEON', 'win ball', '2022-06-16'),
(6, 20, 'AMK', 'sell ball', '2022-06-16'),
(7, 40, 'ABA', 'sell fruit', '2022-06-07');

-- --------------------------------------------------------

--
-- Table structure for table `tblincome`
--

DROP TABLE IF EXISTS `tblincome`;
CREATE TABLE IF NOT EXISTS `tblincome` (
  `incomeid` int(100) NOT NULL AUTO_INCREMENT,
  `amount` int(100) NOT NULL,
  `bank` varchar(30) NOT NULL,
  `decrition` varchar(100) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`incomeid`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblincome`
--

INSERT INTO `tblincome` (`incomeid`, `amount`, `bank`, `decrition`, `date`) VALUES
(8, 234, 'ACELEDA', 'work', '2022-06-16'),
(7, 50, 'LOLC', 'travel', '2022-06-07'),
(5, 120, 'ABA', 'sell guitar', '2022-06-08');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

DROP TABLE IF EXISTS `tbluser`;
CREATE TABLE IF NOT EXISTS `tbluser` (
  `userid` int(100) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `create_date` date NOT NULL,
  `phone_number` int(20) NOT NULL,
  `gmail` varchar(30) NOT NULL,
  `status` tinyint(20) NOT NULL COMMENT '0 active , 1 inactived',
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`userid`, `username`, `password`, `firstname`, `lastname`, `create_date`, `phone_number`, `gmail`, `status`) VALUES
(1, 'yornmeun', 'caf1a3dfb505ffed0d024130f58c5cfa', 'yorn', 'meun', '2022-06-04', 969856497, 'yornmeun@gamil.com', 0),
(2, 'srunsela', '202cb962ac59075b964b07152d234b70', 'srun', 'sela', '2022-06-08', 123456789, 'srunsela@gmail.com', 0);

-- --------------------------------------------------------

--
-- Structure for view `extotal_view`
--
DROP TABLE IF EXISTS `extotal_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `extotal_view`  AS  select sum(`tblexpensse`.`amount`) AS `expen_sum` from `tblexpensse` ;

-- --------------------------------------------------------

--
-- Structure for view `intotal_view`
--
DROP TABLE IF EXISTS `intotal_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `intotal_view`  AS  select sum(`tblincome`.`amount`) AS `sum_amount` from `tblincome` ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
