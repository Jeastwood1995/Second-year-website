-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 10, 2016 at 08:17 PM
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
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userID` int(8) NOT NULL auto_increment,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `Surname` varchar(50) NOT NULL,
  PRIMARY KEY  (`userID`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `email`, `password`, `FirstName`, `Surname`) VALUES
(38, 'tsharp@gmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'tony', 'sharp'),
(33, 'admin@admin.co.uk', 'dc76e9f0c0006e8f919e0c515c66dbba3982f785', 'jack', 'eastwood'),
(35, 'jumping_jack06@hotmail.com', '596727c8a0ea4db3ba2ceceedccbacd3d7b371b8', 'jack', 'eastwood'),
(36, 'samwreford@gmail.com', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684', 'sam', 'wreford'),
(37, 'khunter@hotmail.com', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684', 'kareem', 'hunter'),
(48, 'coleary@gmail.com', '30277750103c2cd3d9ca2faae7875553e95d86f7', 'callum', 'o&#39;leary'),
(46, 'swain@gmail.com', 'd04fcf8b76b8a65a251a7754cb6133c9a288f82f', 'sam', 'wain'),
(49, 'tturan@gmail.com', '1001e8702733cced254345e193c88aaa47a4f5de', 'Tony', 'Turan');
