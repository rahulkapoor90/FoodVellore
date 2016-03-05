-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2016 at 12:56 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `foodvellore`
--

-- --------------------------------------------------------

--
-- Table structure for table `apnadhaba`
--

CREATE TABLE IF NOT EXISTS `apnadhaba` (
  `order_no` int(11) NOT NULL AUTO_INCREMENT,
  `orders` varchar(500) NOT NULL,
  `amount` int(11) NOT NULL,
  `time` time NOT NULL,
  `order_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(60) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`order_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `apnadhaba`
--

INSERT INTO `apnadhaba` (`order_no`, `orders`, `amount`, `time`, `order_time`, `username`, `status`) VALUES
(5, '[{"name":"nmnmnm","price":150,"quantity":6}]', 150, '09:22:00', '2016-03-05 03:27:04', 'sulabh', 0),
(6, '[{"name":"Papad","price":75,"quantity":3}]', 75, '09:00:00', '2016-03-05 03:42:29', 'rohit', 0),
(7, '[{"name":"Papad","price":75,"quantity":3}]', 75, '09:00:00', '2016-03-05 03:43:46', 'rohit', 0),
(8, '[{"name":"Papad","price":75,"quantity":3}]', 75, '14:49:00', '2016-03-05 03:44:55', 'rohit', 0),
(9, '[{"name":"kubkuhkhk","price":50,"quantity":2},{"name":"nmnmnm","price":50,"quantity":2}]', 100, '09:00:00', '2016-03-05 04:02:35', 'rohit', 0),
(10, '[{"name":"Sizzler","price":100,"quantity":4}]', 100, '09:00:00', '2016-03-05 16:44:17', 'gopal', 0),
(11, '[{"name":"Sizzler","price":100,"quantity":4}]', 100, '09:10:00', '2016-03-05 16:44:32', 'gopal', 0),
(12, '[{"name":"Chilly Paneer","price":240,"quantity":4}]', 240, '20:00:00', '2016-03-05 16:48:29', 'rohit', 0),
(13, '[{"name":"Chilly Paneer","price":240,"quantity":4}]', 240, '20:00:00', '2016-03-05 16:49:24', 'rohit', 0),
(14, '[{"name":"Chicken Dehati(half)","price":90,"quantity":1},{"name":"Chicken Dehati(half)","price":180,"quantity":2},{"name":"Chicken Dehati(half)","price":270,"quantity":3},{"name":"Chicken Dehati(half)","price":360,"quantity":4},{"name":"Chicken Mughlai(half)","price":160,"quantity":1},{"name":"Chicken Mughlai(half)","price":320,"quantity":2}]', 680, '15:00:00', '2016-03-05 17:12:19', 'rohit', 0);

-- --------------------------------------------------------

--
-- Table structure for table `bakershub`
--

CREATE TABLE IF NOT EXISTS `bakershub` (
  `order_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `orders` varchar(500) NOT NULL,
  `amount` int(11) NOT NULL,
  `time` time NOT NULL,
  `order_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(60) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `bakershub`
--

INSERT INTO `bakershub` (`order_id`, `orders`, `amount`, `time`, `order_time`, `username`, `status`) VALUES
(1, '[{"name":"Chilly Paneer","price":60,"quantity":1},{"name":"Gobi Manchurian","price":25,"quantity":1},{"name":"Gobi Manchurian","price":50,"quantity":2},{"name":"BabyCorn Manchurian","price":25,"quantity":1}]', 185, '09:00:00', '2016-03-05 04:05:25', 'sulabh', 0);

-- --------------------------------------------------------

--
-- Table structure for table `biharidhaba`
--

CREATE TABLE IF NOT EXISTS `biharidhaba` (
  `order_no` int(11) NOT NULL AUTO_INCREMENT,
  `orders` varchar(500) NOT NULL,
  `amount` int(11) NOT NULL,
  `time` time NOT NULL,
  `order_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(60) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`order_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE IF NOT EXISTS `coupons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rest_name` varchar(60) NOT NULL,
  `coupon_code` varchar(60) NOT NULL,
  `discount` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `rest_name`, `coupon_code`, `discount`) VALUES
(1, 'apnadhaba', 'FOODONZ2', 2),
(2, 'tomsdiner', 'TOM5', 5),
(3, 'apnadhaba', 'APNA20', 20);

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE IF NOT EXISTS `restaurants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rest_name` varchar(120) NOT NULL,
  `rest_desc` varchar(255) NOT NULL,
  `rest_image` text NOT NULL,
  `res_jname` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`id`, `rest_name`, `rest_desc`, `rest_image`, `res_jname`) VALUES
(1, 'Tom Diner', 'American diner setting with mostly continental food. Some items on the menu are amazing, others are just there to fill up the page. Located right in front of the main gate in the lane which has aunty mess & apna dhaba.\r\n', '5FSpKVg.jpg', 'tomsdiner'),
(2, 'Hundered''s Heritage', 'While this place offers an awesome fare when it comes to North Indian food, people mostly go there for the continental food. It''s a bit far and the most expensive of them all.', 'yfoaxJe.jpg', 'hundredsheritage');

-- --------------------------------------------------------

--
-- Table structure for table `smscodes`
--

CREATE TABLE IF NOT EXISTS `smscodes` (
  `mobile` varchar(15) NOT NULL,
  `otp` int(11) NOT NULL,
  PRIMARY KEY (`mobile`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `smscodes`
--

INSERT INTO `smscodes` (`mobile`, `otp`) VALUES
('8148277632', 766732);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(21) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(30) NOT NULL,
  `contact_number` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `email`, `password`, `contact_number`) VALUES
(9, 'rahulkapoor', 'rahul kapoor', 'rahulkapoorbbps@outlook.com', '242ceb62198cf9e66e6887ffd5edbc', 0),
(10, 'sdsads', 'rahul kapoor', 'rahulkapoorhooting@gmail.com', '1ab9def9830ecad32a2b18c2830410', 0),
(11, 'rahulkapoor90', 'Rahul Kapoor', 'rasdasdasdsa@gmail.com', '242ceb62198cf9e66e6887ffd5edbc', 0),
(12, 'gopalchandak95@gmail.com', 'Gopal Chandak', 'gopalchandak95@gmail.com', 'ae9c7619ff0d398edd3226b420e260', 0);

-- --------------------------------------------------------

--
-- Table structure for table `valleyjunction`
--

CREATE TABLE IF NOT EXISTS `valleyjunction` (
  `order_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `orders` varchar(500) NOT NULL,
  `amount` int(11) NOT NULL,
  `time` time NOT NULL,
  `order_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(60) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `valleyjunction`
--

INSERT INTO `valleyjunction` (`order_id`, `orders`, `amount`, `time`, `order_time`, `username`, `status`) VALUES
(1, '[{"name":"Sizzler","price":25,"quantity":1},{"name":"nmnmnm","price":25,"quantity":1}]', 50, '09:00:00', '2016-03-05 04:04:12', 'sulabh', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
