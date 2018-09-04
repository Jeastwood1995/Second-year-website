-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 10, 2016 at 08:19 PM
-- Server version: 5.0.67-log
-- PHP Version: 5.3.21

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `c3415781`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `orderID` int(2) NOT NULL auto_increment,
  `orderDate` date NOT NULL,
  `username` varchar(50) NOT NULL,
  `total` float NOT NULL,
  PRIMARY KEY  (`orderID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `orderDate`, `username`, `total`) VALUES
(2, '2016-05-10', 'admin@admin.co.uk', 19.99),
(1, '2016-05-07', 'admin@admin.co.uk', 19.99),
(3, '2016-05-08', 'jumping_jack06@hotmail.com', 39.99),
(4, '2016-05-10', 'jumping_jack06@hotmail.com', 39.99),
(5, '2016-05-10', 'jumping_jack06@hotmail.com', 39.99),
(6, '2016-05-10', 'jumping_jack06@hotmail.com', 39.99),
(7, '2016-05-10', 'admin@admin.co.uk', 39.98),
(8, '2016-05-10', 'admin@admin.co.uk', 39.98),
(9, '2016-05-10', 'admin@admin.co.uk', 39.98),
(10, '2016-05-10', 'admin@admin.co.uk', 39.98),
(11, '2016-05-10', 'admin@admin.co.uk', 19.99),
(12, '2016-05-10', 'jumping_jack06@hotmail.com', 39.99),
(13, '0000-00-00', 'admin@admin.co.uk', 39.99),
(14, '0000-00-00', 'admin@admin.co.uk', 39.99),
(15, '0000-00-00', 'admin@admin.co.uk', 39.99),
(16, '0000-00-00', 'admin@admin.co.uk', 39.99);
