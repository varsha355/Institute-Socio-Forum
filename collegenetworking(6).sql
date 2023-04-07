-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 02, 2011 at 05:56 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `collegenetworking`
--

-- --------------------------------------------------------

--
-- Table structure for table `addfriends`
--

CREATE TABLE IF NOT EXISTS `addfriends` (
  `addid` bigint(4) NOT NULL AUTO_INCREMENT,
  `meid` bigint(4) NOT NULL,
  `friendid` bigint(4) NOT NULL,
  PRIMARY KEY (`addid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `addfriends`
--

INSERT INTO `addfriends` (`addid`, `meid`, `friendid`) VALUES
(1, 37, 49),
(2, 37, 51),
(6, 37, 50);

-- --------------------------------------------------------

-- --------------------------------------------------------

--
-- Table structure for table `college`
--

CREATE TABLE IF NOT EXISTS `college` (
  `collegeid` bigint(10) NOT NULL AUTO_INCREMENT,
  `collegename` varchar(50) NOT NULL,
  `collegelocation` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  PRIMARY KEY (`collegeid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `college`
--

INSERT INTO `college` (`collegeid`, `collegename`, `collegelocation`, `image`) VALUES
(1, 'BVRIT', 'NARSAPUR', ''),
(2, 'BVRIT', 'NARSAPUR', ''),
(3, 'BVRIT', 'NARSAPUR', ''),
(4, 'BVRIT', 'NARSAPUR', '');

-- --------------------------------------------------------

--
-- Table structure for table `img`
--

CREATE TABLE IF NOT EXISTS `img` (
  `imgid` bigint(8) NOT NULL AUTO_INCREMENT,
  `imagname` varchar(20) NOT NULL,
  `imgcategory` varchar(20) NOT NULL,
  `description` varchar(50) NOT NULL,
  `uploadimage` varchar(25) NOT NULL,
  PRIMARY KEY (`imgid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=79 ;

--
-- Dumping data for table `img`
--

INSERT INTO `img` (`imgid`, `imagname`, `imgcategory`, `description`, `uploadimage`) VALUES
(77, 'ddg', 'dgg', 'dgdg', 'boy.jpg'),
(76, 'ttg', 'dgdg', 'dgdg', 'boy2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pracdemo`
--

CREATE TABLE IF NOT EXISTS `pracdemo` (
  `videoid` bigint(8) NOT NULL AUTO_INCREMENT,
  `videoname` varchar(25) NOT NULL,
  `videocategory` text NOT NULL,
  `uploadvideo` text NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`videoid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `pracdemo`
--

INSERT INTO `pracdemo` (`videoid`, `videoname`, `videocategory`, `uploadvideo`, `description`) VALUES
(44, 'PHP', 'PHP', '<iframe title="YouTube video player" width="480" height="390" src="http://www.youtube.com/embed/PtMHYFQYbdo" frameborder="0" allowfullscreen></iframe>', 'php'),
(43, 'PHP', 'PHP', '<iframe title="YouTube video player" width="480" height="390" src="http://www.youtube.com/embed/UQ0xoaVJPJU" frameborder="0" allowfullscreen></iframe>', 'Php');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `profileid` bigint(8) NOT NULL AUTO_INCREMENT,
  `userid` varchar(30) NOT NULL,
  `relstat` varchar(30) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(30) NOT NULL,
  `pincode` int(20) NOT NULL,
  `country` varchar(30) NOT NULL,
  `image` varchar(50) NOT NULL,
  `hschool` varchar(50) NOT NULL,
  `coluni` varchar(70) NOT NULL,
  `course` varchar(50) NOT NULL,
  PRIMARY KEY (`profileid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`profileid`, `userid`, `relstat`, `city`, `state`, `pincode`, `country`, `image`, `hschool`, `coluni`, `course`) VALUES
(1, '37', 'single', 'HYD', 'TELANGANA', 502110, 'select country', 'usersimg/boy.jpg', 'aaa', 'BVRIT', 'ece'),
(2, '48', 'single', 'MDK', 'TELANGANA', 502109,'INDIA', 'usersimg/boy2.jpg', 'aaa', 'BVRIT', 'cse'),
(4, '49', 'single', 'SRD', 'TELANGANA', 502134, 'INDIA', 'usersimg/girl2.jpg', 'jain', 'BVRIT', 'eee'),
(5, '50', 'single', 'HYD', 'TELANGANA', 503010, 'INDIA', 'usersimg/boy3.jpg', 'sssa', 'BVRIT', 'bme'),
(6, '51', 'single', 'SEC', 'TELANGANA', 502010, 'select country', 'usersimg/boy4.jpg', 'jain', 'BVRIT', 'civil');

-- --------------------------------------------------------

--
-- Table structure for table `qanswer`
--

CREATE TABLE IF NOT EXISTS `qanswer` (
  `qid` bigint(8) NOT NULL AUTO_INCREMENT,
  `question` varchar(50) NOT NULL,
  `answer` varchar(70) NOT NULL,
  `option1` varchar(70) NOT NULL,
  `option2` varchar(70) NOT NULL,
  `option3` varchar(70) NOT NULL,
  `option4` varchar(70) NOT NULL,
  `visible` varchar(25) NOT NULL,
  PRIMARY KEY (`qid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `qanswer`
--

INSERT INTO `qanswer` (`qid`, `question`, `answer`, `option1`, `option2`, `option3`, `option4`, `visible`) VALUES
(1, 'which one is the first fully supported 64-bit os?', 'option2', 'Windows vista', 'Linux', 'Mac', 'Windows xp', ''),
(4, 'Which one of folowing is not a web browser?', 'option1', 'Facebook', 'WWW', 'Mosaic', 'Netscape Navigator', 'Everyone'),
(5, 'In Computer World, Trojan refers to..?', 'option2', 'Virus', 'Malware', 'Worm', 'SpyWare', 'Everyone');

-- --------------------------------------------------------

--
-- Table structure for table `qpaper`
--

CREATE TABLE IF NOT EXISTS `qpaper` (
  `paperid` bigint(8) NOT NULL AUTO_INCREMENT,
  `papername` varchar(25) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `section` varchar(20) NOT NULL,
  `description` varchar(50) NOT NULL,
  `upload` varchar(50) NOT NULL,
  `uploadtext` varchar(50) NOT NULL,
  PRIMARY KEY (`paperid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `qpaper`
--

INSERT INTO `qpaper` (`paperid`, `papername`, `subject`, `section`, `description`, `upload`, `uploadtext`) VALUES
(3, 'fffrrf', '', '', 'ddfdd', '', 'deddddd'),
(12, 'dgd', '', '', 'dgdg', 'sachin.jpg', ''),
(13, 'dgd', '', '', 'dgdg', 'sachin.jpg', ''),
(14, 'fghdhs', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE IF NOT EXISTS `result` (
  `resid` bigint(8) NOT NULL AUTO_INCREMENT,
  `collegename` varchar(50) NOT NULL,
  `section` varchar(50) NOT NULL,
  `result` varchar(50) NOT NULL,
  PRIMARY KEY (`resid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `result`
--


-- --------------------------------------------------------

--
-- Table structure for table `scrap`
--

CREATE TABLE IF NOT EXISTS `scrap` (
  `scrapid` bigint(8) NOT NULL AUTO_INCREMENT,
  `senderid` bigint(2) NOT NULL,
  `recieverid` bigint(2) NOT NULL,
  `smessage` varchar(500) NOT NULL,
  `time` varchar(50) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`scrapid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `scrap`
--

INSERT INTO `scrap` (`scrapid`, `senderid`, `recieverid`, `smessage`, `time`, `date`) VALUES
(9, 49, 0, 'safdassssssssss', '05:48:22', '0000-00-00'),
(8, 49, 51, 'ddd', '05:48:18', '0000-00-00'),
(6, 37, 51, 'sss', '05:42:18', '0000-00-00'),
(7, 0, 51, 'ddd', '05:46:23', '0000-00-00'),
(10, 49, 0, 'safdassssssssss', '05:49:57', '0000-00-00'),
(11, 49, 0, 'aaa', '05:50:00', '0000-00-00'),
(12, 52, 51, 'danede', '06:24:41', '0000-00-00'),
(13, 51, 0, 'same to u', '06:33:59', '0000-00-00'),
(14, 51, 49, 'eeeeeeeeeeee', '06:43:46', '0000-00-00'),
(15, 51, 49, 'eeeeeeeeeeee', '06:44:53', '0000-00-00'),
(16, 51, 49, 'eeeeeeeeeeee', '06:45:10', '0000-00-00'),
(17, 51, 49, 'eeeeeeeeeeee', '06:45:14', '0000-00-00'),
(18, 51, 49, 'eeeeeeeeeeee', '06:45:22', '0000-00-00'),
(19, 51, 49, 'eeeeeeeeeeee', '06:45:38', '0000-00-00'),
(20, 51, 49, 'eeeeeeeeeeee', '06:48:04', '0000-00-00'),
(21, 51, 49, 'eeeeeeeeeeee', '06:52:36', '0000-00-00'),
(22, 51, 52, 'dalijmbe', '07:06:41', '0000-00-00'),
(23, 52, 51, 'baka dane sudiji ninna', '07:07:57', '0000-00-00'),
(24, 37, 0, 'jgjgjy', '08:44:16', '0000-00-00'),
(25, 37, 0, 'drfytr', '08:44:29', '0000-00-00'),
(26, 37, 0, 'hbvhgvgv', '08:51:56', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `stuacc`
--

CREATE TABLE IF NOT EXISTS `stuacc` (
  `id` bigint(8) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `confirmpassword` varchar(30) NOT NULL,
  `iam` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `stuacc`
--

INSERT INTO `stuacc` (`id`, `firstname`, `lastname`, `email`, `password`, `confirmpassword`, `iam`, `dob`) VALUES
(37, 'A', 'Akash', 'akash@gmail.com', 'aaa', 'aaa', 'Male', '0000-00-00'),
(52, 'a', 'arjun', 'arjun@gmail.com', 'zzzzzzzz', 'zzzzzzzz', 'Male', '2001-11-18'),
(51, 'k', 'karthika', 'karthi@gmail.com', 'ddd', 'ddd', 'Female', '2002-09-28'),
(50, 'r', 'suresh', 'suresh@gmail.com', 'ccc', 'ccc', 'Male', '2003-03-22'),
(47, 't', 'swapna', 'swap@gmail.com', 'testtest', 'testtest', 'feMale', '2001-12-18'),
(49, 's', 'sachin', 'sachin@gmail.com', 'bbb', 'bbb', 'Male', '2000-09-14'),
(48, 'v', 'vijay', 'vijaya@gmail.com', 'aaa', 'aaa', 'Male', '2001-02-20');
