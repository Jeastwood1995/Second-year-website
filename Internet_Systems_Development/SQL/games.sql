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
-- Table structure for table `games`
--

CREATE TABLE IF NOT EXISTS `games` (
  `productID` int(2) NOT NULL auto_increment,
  `price` float NOT NULL,
  `imageName` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `genre` varchar(20) NOT NULL,
  `stock` int(3) NOT NULL,
  PRIMARY KEY  (`productID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`productID`, `price`, `imageName`, `name`, `genre`, `stock`) VALUES
(1, 39.99, 'DARKSOUL_facebook_mini.jpg', 'DarkSouls3', 'RPG', 20),
(2, 39.99, 'Metal_Gear_Solid_V_The_Phantom_Pain_cover.png', 'MetalGearSolidV:ThePhantomPain', 'Action', 12),
(3, 39.99, 'fifa.jpg', 'FIFA16', 'Sport', 14),
(4, 39.99, 'Mad_Max_2015_video_game_cover_art.jpg', 'MadMax', 'RPG', 30),
(5, 19.99, 'last_of_us.jpg', 'TheLastOfUs', 'Survival', 8),
(6, 39.99, 'Fallout_4_cover_art.jpg', 'Fallout4', 'RPG', 5),
(7, 39.99, 'black-ops.jpg', 'CallofDuty:BlackOpsIII', 'Action', 50),
(8, 39.99, 'battlefront.jpeg', 'StarWars:Battefront', 'Action', 34),
(9, 19.99, 'the-evil-within.jpg', 'TheEvilWithin:GameOfTheYearEdition', 'Survival', 45),
(10, 29.99, 'witcher3.jpg', 'TheWitcher3:WildHunt', 'RPG', 0),
(11, 9.99, 'driveclub.jpg', 'Driveclub', 'Sport', 15),
(12, 19.99, 'destiny.jpg', 'Destiny', 'Action', 30);
