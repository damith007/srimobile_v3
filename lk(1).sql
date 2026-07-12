-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 05, 2014 at 03:28 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `uid` int(10) NOT NULL,
  `pass` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cats`
--

CREATE TABLE IF NOT EXISTS `cats` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL DEFAULT '',
  `dscr` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE IF NOT EXISTS `chats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `sitename` varchar(50) NOT NULL DEFAULT '',
  `url` varchar(255) NOT NULL DEFAULT '',
  `logo` varchar(255) NOT NULL DEFAULT '',
  `timez` int(2) NOT NULL DEFAULT '0',
  `last` int(11) NOT NULL DEFAULT '0',
  `regtime` int(11) NOT NULL DEFAULT '0',
  `ip` varchar(100) NOT NULL DEFAULT '',
  `soft` varchar(255) NOT NULL DEFAULT '',
  `active` int(1) NOT NULL DEFAULT '0',
  UNIQUE KEY `username` (`username`),
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `clog`
--

CREATE TABLE IF NOT EXISTS `clog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `time` int(100) NOT NULL,
  `mtype` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=155 ;

-- --------------------------------------------------------

--
-- Table structure for table `cricket`
--

CREATE TABLE IF NOT EXISTS `cricket` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `wickets` int(100) NOT NULL,
  `ball` int(100) NOT NULL,
  `score` int(100) NOT NULL,
  `uid` int(100) NOT NULL,
  `who` int(100) NOT NULL,
  `time` int(100) NOT NULL,
  `mid` int(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cric_mat`
--

CREATE TABLE IF NOT EXISTS `cric_mat` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `who` int(100) NOT NULL,
  `uid` int(100) NOT NULL,
  `bet` int(100) NOT NULL,
  `balls` int(100) NOT NULL,
  `wickets` int(100) NOT NULL,
  `accept` int(100) NOT NULL,
  `time` int(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cric_match`
--

CREATE TABLE IF NOT EXISTS `cric_match` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `tscore` varchar(100) NOT NULL,
  `totscr` int(2) NOT NULL,
  `time` int(100) NOT NULL,
  `bet` varchar(100) NOT NULL,
  `rball` int(2) NOT NULL,
  `mtype` int(100) NOT NULL,
  `uid` int(100) NOT NULL,
  `wicket` int(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

-- --------------------------------------------------------

--
-- Table structure for table `cri_score`
--

CREATE TABLE IF NOT EXISTS `cri_score` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `run` int(100) NOT NULL,
  `msg` varchar(500) NOT NULL,
  `img` varchar(250) NOT NULL,
  `wick` int(100) NOT NULL,
  `ball` int(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `cri_score`
--

INSERT INTO `cri_score` (`id`, `run`, `msg`, `img`, `wick`, `ball`) VALUES
(1, 1, 'You got 1 run', 'images/cri/1run.gif', 0, 1),
(2, 3, 'You got 3 run', 'images/cri/3runs.gif', 0, 1),
(3, 0, 'oOpzz U are Out', 'images/cri/out.gif', 1, 1),
(4, 0, 'U got Forward defence : No Runs', 'images/cri/0run.gif', 0, 1),
(5, 2, 'You got 2 runs', 'images/cri/2runs.gif', 0, 1),
(6, 6, 'Excellent Shot! You Got Sixer (6 Runs)', 'images/cri/6runs.gif', 0, 1),
(7, 4, 'Excellent Shot! You Got Bounday (4 Runs)', 'images/cri/4runs.gif', 0, 1),
(8, 1, 'No Ball! You Got one Extra score', 'images/cri/noball.gif', 0, 0),
(10, 1, 'Wide Ball! You Got one Extra score', 'images/cri/wideball.gif', 0, 0),
(11, 1, 'You got 1 run', 'images/cri/1run.gif', 0, 1),
(12, 2, 'You got 2 runs', 'images/cri/2runs.gif', 0, 1),
(9, 3, 'You got 3 runs', 'images/cri/3runs.gif', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cri_top`
--

CREATE TABLE IF NOT EXISTS `cri_top` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `win` int(100) NOT NULL,
  `loss` int(100) NOT NULL,
  `time` int(100) NOT NULL,
  `md` varchar(100) NOT NULL,
  `uid` int(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `id_2` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cri_win`
--

CREATE TABLE IF NOT EXISTS `cri_win` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `uid` int(100) NOT NULL,
  `time` int(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `uid` varchar(100) NOT NULL DEFAULT '',
  `file` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `uid`, `file`) VALUES
(1, 'KKHK', 'KHKJHKHJK');

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_acc`
--

CREATE TABLE IF NOT EXISTS `ibwf_acc` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `gid` int(100) NOT NULL DEFAULT '0',
  `fid` int(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `ibwf_acc`
--

INSERT INTO `ibwf_acc` (`id`, `gid`, `fid`) VALUES
(1, 0, 27),
(2, 0, 25),
(3, 0, 27),
(4, 0, 10);

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_announcements`
--

CREATE TABLE IF NOT EXISTS `ibwf_announcements` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `antext` varchar(200) NOT NULL DEFAULT '',
  `clid` int(100) NOT NULL DEFAULT '0',
  `antime` int(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `ibwf_announcements`
--

INSERT INTO `ibwf_announcements` (`id`, `antext`, `clid`, `antime`) VALUES
(1, 'wlang mag aaway at free posting', 2, 1250566824);

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_articles`
--

CREATE TABLE IF NOT EXISTS `ibwf_articles` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL DEFAULT '',
  `crdate` int(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `ibwf_articles`
--

INSERT INTO `ibwf_articles` (`id`, `name`, `crdate`) VALUES
(1, 'Entertainment', 0),
(2, 'Technology', 0),
(3, 'Education', 0),
(4, 'News', 0),
(5, 'sports', 0),
(6, 'Secrets', 0),
(7, 'Advertsments', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_avatars`
--

CREATE TABLE IF NOT EXISTS `ibwf_avatars` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `avlink` varchar(150) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `avlink` (`avlink`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=232 ;

--
-- Dumping data for table `ibwf_avatars`
--

INSERT INTO `ibwf_avatars` (`id`, `avlink`) VALUES
(1, 'avatars/1.PNG'),
(2, 'avatars/2.gif'),
(3, 'avatars/3.gif'),
(4, 'avatars/4.jpg'),
(5, 'avatars/5.gif'),
(6, 'avatars/6.PNG'),
(7, 'avatars/7.gif'),
(8, 'avatars/8.gif'),
(9, 'avatars/9.gif'),
(10, 'avatars/10.gif'),
(11, 'avatars/11.gif'),
(12, 'avatars/12.gif'),
(13, 'avatars/13.gif'),
(14, 'avatars/14.jpg'),
(15, 'avatars/15.jpg'),
(16, 'avatars/16.jpg'),
(17, 'avatars/17.jpg'),
(18, 'avatars/18.jpg'),
(19, 'avatars/19.jpg'),
(20, 'avatars/20.jpg'),
(21, 'avatars/21.jpg'),
(22, 'avatars/22.jpg'),
(23, 'avatars/23.jpg'),
(24, 'avatars/24.jpg'),
(25, 'avatars/25.jpg'),
(26, 'avatars/26.jpg'),
(27, 'avatars/27.jpg'),
(28, 'avatars/28.jpg'),
(29, 'avatars/29.jpg'),
(30, 'avatars/30.jpg'),
(31, 'avatars/31.jpg'),
(32, 'avatars/32.jpg'),
(33, 'avatars/33.jpg'),
(34, 'avatars/34.jpg'),
(35, 'avatars/35.jpg'),
(36, 'avatars/36.jpg'),
(37, 'avatars/37.jpg'),
(38, 'avatars/38.jpg'),
(39, 'avatars/39.jpg'),
(40, 'avatars/40.jpg'),
(41, 'avatars/41.jpg'),
(42, 'avatars/42.jpg'),
(43, 'avatars/43.jpg'),
(44, 'avatars/44.jpg'),
(45, 'avatars/45.jpg'),
(46, 'avatars/46.jpg'),
(47, 'avatars/47.jpg'),
(48, 'avatars/48.jpg'),
(49, 'avatars/49.jpg'),
(50, 'avatars/50.jpg'),
(51, 'avatars/51.jpg'),
(52, 'avatars/52.jpg'),
(53, 'avatars/53.jpg'),
(54, 'avatars/001.jpg'),
(55, 'avatars/002.jpg'),
(56, 'avatars/003.gif'),
(67, 'avatars/004.gif'),
(68, 'avatars/005.gif'),
(69, 'avatars/006.gif'),
(70, 'avatars/007.gif'),
(71, 'avatars/008.gif'),
(72, 'avatars/009.gif'),
(73, 'avatars/010.gif'),
(74, 'avatars/011.gif'),
(75, 'avatars/012.gif'),
(76, 'avatars/013.gif'),
(77, 'avatars/015.jpg'),
(78, 'avatars/016.jpg'),
(79, 'avatars/017.jpg'),
(80, 'avatars/019.jpg'),
(81, 'avatars/020.jpg'),
(82, 'avatars/021.jpg'),
(83, 'avatars/022.gif'),
(84, 'avatars/023.jpg'),
(85, 'avatars/024.jpg'),
(86, 'avatars/025.jpg'),
(87, 'avatars/026.jpg'),
(88, 'avatars/027.jpg'),
(89, 'avatars/028.jpg'),
(90, 'avatars/029.jpg'),
(91, 'avatars/030.jpg'),
(92, 'avatars/031.jpg'),
(93, 'avatars/032.jpg'),
(94, 'avatars/033.jpg'),
(95, 'avatars/040.jpg'),
(96, 'avatars/049.jpg'),
(97, 'avatars/051.jpg'),
(98, 'avatars/052.jpg'),
(99, 'avatars/053.jpg'),
(100, 'avatars/054.jpg'),
(101, 'avatars/055.jpg'),
(102, 'avatars/056.jpg'),
(103, 'avatars/058.jpg'),
(104, 'avatars/060.jpg'),
(105, 'avatars/061.jpg'),
(106, 'avatars/062.jpg'),
(107, 'avatars/064.jpg'),
(108, 'avatars/065.jpg'),
(109, 'avatars/066.jpg'),
(110, 'avatars/067.jpg'),
(111, 'avatars/068.jpg'),
(112, 'avatars/069.jpg'),
(113, 'avatars/070.jpg'),
(114, 'avatars/071.jpg'),
(115, 'avatars/072.jpg'),
(116, 'avatars/073.jpg'),
(117, 'avatars/074.jpg'),
(118, 'avatars/075.jpg'),
(119, 'avatars/076.jpg'),
(120, 'avatars/077.jpg'),
(121, 'avatars/078.jpg'),
(122, 'avatars/079.jpg'),
(123, 'avatars/080.jpg'),
(124, 'avatars/081.jpg'),
(125, 'avatars/082.jpg'),
(126, 'avatars/083.jpg'),
(127, 'avatars/085.jpg'),
(128, 'avatars/086.jpg'),
(129, 'avatars/088.jpg'),
(130, 'avatars/089.jpg'),
(131, 'avatars/090.jpg'),
(132, 'avatars/091.jpg'),
(133, 'avatars/092.jpg'),
(134, 'avatars/095.jpg'),
(135, 'avatars/06080601.jpg'),
(136, 'avatars/06080602.jpg'),
(137, 'avatars/06080606.jpg'),
(138, 'avatars/06080608.jpg'),
(139, 'avatars/06080609.jpg'),
(140, 'avatars/06080610.jpg'),
(141, 'avatars/06080611.jpg'),
(142, 'avatars/08080602.jpg'),
(143, 'avatars/08080604.jpg'),
(144, 'avatars/08080608.jpg'),
(145, 'avatars/08080615.jpg'),
(146, 'avatars/08080610.jpg'),
(147, 'avatars/08080625.jpg'),
(148, 'avatars/08080627.jpg'),
(149, 'avatars/08080632.jpg'),
(150, 'avatars/08080633.jpg'),
(151, 'avatars/08080639.jpg'),
(152, 'avatars/034.gif'),
(153, 'avatars/035.gif'),
(154, 'avatars/036.gif'),
(155, 'avatars/037.gif'),
(156, 'avatars/038.gif'),
(157, 'avatars/039.gif'),
(158, 'avatars/041.gif'),
(159, 'avatars/042.gif'),
(161, 'avatars/044.gif'),
(162, 'avatars/045.gif'),
(163, 'avatars/046.gif'),
(164, 'avatars/047.gif'),
(165, 'avatars/048.gif'),
(166, 'avatars/043.gif'),
(167, 'avatars/057.gif'),
(168, 'avatars/059.gif'),
(169, 'avatars/084.gif'),
(170, 'avatars/087.gif'),
(171, 'avatars/093.gif'),
(172, 'avatars/094.gif'),
(173, 'avatars/096.gif'),
(174, 'avatars/097.gif'),
(175, 'avatars/098.gif'),
(176, 'avatars/099.gif'),
(177, 'avatars/100.gif'),
(178, 'avatars/101.gif'),
(179, 'avatars/102.gif'),
(180, 'avatars/103.gif'),
(181, 'avatars/104.gif'),
(182, 'avatars/105.gif'),
(183, 'avatars/106.gif'),
(184, 'avatars/107.gif'),
(185, 'avatars/108.gif'),
(186, 'avatars/109.gif'),
(187, 'avatars/110.gif'),
(188, 'avatars/111.gif'),
(189, 'avatars/112.gif'),
(190, 'avatars/113.gif'),
(191, 'avatars/114.gif'),
(192, 'avatars/115.gif'),
(193, 'avatars/116.gif'),
(194, 'avatars/117.gif'),
(195, 'avatars/118.gif'),
(196, 'avatars/119.gif'),
(197, 'avatars/06080604.gif'),
(198, 'avatars/06080605.gif'),
(199, 'avatars/06080607.gif'),
(200, 'avatars/08080601.gif'),
(201, 'avatars/08080603.gif'),
(202, 'avatars/08080605.gif'),
(203, 'avatars/08080606.gif'),
(204, 'avatars/08080607.gif'),
(205, 'avatars/08080609.gif'),
(206, 'avatars/08080611.gif'),
(207, 'avatars/08080612.gif'),
(208, 'avatars/08080613.gif'),
(209, 'avatars/08080614.gif'),
(210, 'avatars/08080616.gif'),
(211, 'avatars/08080617.gif'),
(212, 'avatars/08080618.gif'),
(213, 'avatars/08080619.gif'),
(214, 'avatars/08080620.gif'),
(215, 'avatars/08080621.gif'),
(216, 'avatars/08080622.gif'),
(217, 'avatars/08080623.gif'),
(218, 'avatars/08080624.gif'),
(219, 'avatars/08080626.gif'),
(220, 'avatars/08080628.gif'),
(221, 'avatars/08080629.gif'),
(222, 'avatars/08080630.gif'),
(223, 'avatars/08080631.gif'),
(224, 'avatars/08080632.gif'),
(225, 'avatars/08080634.gif'),
(226, 'avatars/08080635.gif'),
(227, 'avatars/08080636.gif'),
(228, 'avatars/08080638.gif'),
(229, 'avatars/08080640.gif'),
(231, 'j');

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_awbank`
--

CREATE TABLE IF NOT EXISTS `ibwf_awbank` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `dealer` int(100) NOT NULL DEFAULT '0',
  `dltime` int(100) NOT NULL DEFAULT '0',
  `money` int(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_bank`
--

CREATE TABLE IF NOT EXISTS `ibwf_bank` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uid` int(100) NOT NULL DEFAULT '0',
  `pass` varchar(100) NOT NULL DEFAULT '',
  `hint` varchar(100) NOT NULL DEFAULT '',
  `done` int(100) NOT NULL DEFAULT '0',
  `actime` int(100) NOT NULL DEFAULT '0',
  `plusses` int(100) NOT NULL,
  `plusses2` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ibwf_bank`
--

INSERT INTO `ibwf_bank` (`id`, `uid`, `pass`, `hint`, `done`, `actime`, `plusses`, `plusses2`) VALUES
(1, 1, '606020', 'rider', 1, 1250929388, 1100, 0),
(2, 11, 'Password', 'Domeng', 1, 1250942194, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_banktime`
--

CREATE TABLE IF NOT EXISTS `ibwf_banktime` (
  `actime` int(100) NOT NULL,
  `uid` int(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ibwf_banktime`
--

INSERT INTO `ibwf_banktime` (`actime`, `uid`) VALUES
(1250929489, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_blogs`
--

CREATE TABLE IF NOT EXISTS `ibwf_blogs` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `bowner` int(100) NOT NULL DEFAULT '0',
  `bname` varchar(30) NOT NULL DEFAULT '',
  `btext` blob NOT NULL,
  `bgdate` int(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `bname` (`bname`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `ibwf_blogs`
--

INSERT INTO `ibwf_blogs` (`id`, `bowner`, `bname`, `btext`, `bgdate`) VALUES
(48, 2, 'love hurts', 0x776879206c6f76652068757274732e2e2049206c6561726e20746f206c6f7665207520696e20757220696e207572206f776e2073696d706c79207761792c20757220736d696c652e20557220776f72647320686f772075206361726520666f72206d652e2e2049206c6f76652075206275742069206861766520746f20676f2e2e2049742068757274206275742069206e65656420746f206c6561766520752e2e20416d20736f726920616d20736f72692e2e2e, 1250848612);

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_bookmarks`
--

CREATE TABLE IF NOT EXISTS `ibwf_bookmarks` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `userid` int(6) NOT NULL DEFAULT '0',
  `topic` int(8) NOT NULL DEFAULT '0',
  `name` varchar(30) NOT NULL DEFAULT '',
  `time` bigint(30) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `userid` (`userid`,`topic`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_brate`
--

CREATE TABLE IF NOT EXISTS `ibwf_brate` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `blogid` int(100) NOT NULL DEFAULT '0',
  `uid` int(100) NOT NULL DEFAULT '0',
  `brate` char(1) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `ibwf_brate`
--

INSERT INTO `ibwf_brate` (`id`, `blogid`, `uid`, `brate`) VALUES
(1, 47, 1, '5');

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_buddies`
--

CREATE TABLE IF NOT EXISTS `ibwf_buddies` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `uid` int(100) NOT NULL DEFAULT '0',
  `tid` int(100) NOT NULL DEFAULT '0',
  `agreed` char(1) NOT NULL DEFAULT '0',
  `reqdt` int(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=168 ;

--
-- Dumping data for table `ibwf_buddies`
--

INSERT INTO `ibwf_buddies` (`id`, `uid`, `tid`, `agreed`, `reqdt`) VALUES
(1, 2, 1, '1', 1250544810),
(2, 3, 2, '1', 1250549352),
(3, 5, 2, '1', 1250553967),
(4, 5, 1, '1', 1250553992),
(5, 5, 3, '1', 1250554025),
(6, 5, 8, '1', 1250555266),
(7, 8, 10, '1', 1250561929),
(8, 11, 3, '1', 1250568128),
(9, 11, 8, '1', 1250568469),
(10, 11, 10, '1', 1250568573),
(11, 12, 10, '1', 1250570551),
(12, 12, 11, '1', 1250570573),
(13, 12, 8, '1', 1250570592),
(14, 12, 1, '1', 1250570615),
(15, 12, 2, '1', 1250570634),
(16, 11, 1, '1', 1250570817),
(17, 11, 2, '1', 1250570845),
(18, 8, 13, '1', 1250572934),
(19, 12, 14, '1', 1250573352),
(20, 12, 13, '1', 1250573413),
(21, 8, 14, '1', 1250573518),
(22, 11, 14, '1', 1250574069),
(23, 15, 12, '1', 1250574224),
(141, 15, 14, '0', 1250899655),
(25, 8, 17, '0', 1250574505),
(26, 11, 16, '1', 1250577319),
(27, 14, 10, '1', 1250579300),
(28, 10, 2, '1', 1250580668),
(29, 18, 3, '1', 1250588256),
(30, 8, 18, '1', 1250588579),
(31, 12, 18, '1', 1250588678),
(32, 8, 3, '1', 1250595464),
(33, 15, 8, '1', 1250596685),
(34, 8, 16, '1', 1250598763),
(35, 11, 19, '1', 1250601110),
(36, 11, 18, '1', 1250603900),
(37, 11, 5, '1', 1250603939),
(38, 11, 13, '1', 1250603981),
(39, 11, 7, '1', 1250604047),
(40, 15, 13, '1', 1250609486),
(41, 15, 10, '1', 1250609675),
(42, 11, 15, '1', 1250609876),
(43, 12, 5, '1', 1250612917),
(44, 11, 21, '1', 1250613346),
(45, 10, 1, '1', 1250622048),
(46, 15, 2, '1', 1250633889),
(47, 19, 16, '1', 1250642962),
(48, 3, 19, '1', 1250646215),
(49, 10, 19, '1', 1250651478),
(50, 8, 25, '0', 1250651872),
(51, 15, 16, '1', 1250652791),
(52, 8, 19, '1', 1250660998),
(53, 10, 26, '1', 1250663533),
(54, 8, 27, '1', 1250669166),
(55, 8, 28, '1', 1250669177),
(56, 16, 27, '1', 1250669490),
(57, 16, 28, '1', 1250669563),
(58, 28, 10, '1', 1250669927),
(59, 8, 4, '0', 1250674945),
(60, 27, 10, '1', 1250678534),
(61, 27, 13, '1', 1250678709),
(62, 27, 28, '1', 1250678835),
(63, 29, 27, '1', 1250679898),
(64, 29, 8, '1', 1250680479),
(65, 28, 2, '1', 1250681499),
(66, 28, 29, '1', 1250681569),
(67, 28, 12, '1', 1250681939),
(68, 29, 16, '1', 1250682977),
(69, 29, 10, '1', 1250685790),
(70, 29, 12, '1', 1250694843),
(71, 11, 32, '0', 1250701727),
(72, 33, 8, '1', 1250706876),
(73, 3, 1, '1', 1250706962),
(74, 3, 4, '0', 1250720473),
(75, 4, 16, '0', 1250720615),
(76, 8, 32, '0', 1250722419),
(77, 12, 6, '0', 1250732032),
(78, 13, 2, '1', 1250753184),
(79, 8, 37, '0', 1250765635),
(80, 4, 5, '1', 1250765903),
(81, 4, 13, '1', 1250766010),
(82, 4, 37, '0', 1250766045),
(83, 38, 2, '1', 1250768436),
(85, 1, 8, '1', 1250809914),
(86, 38, 1, '1', 1250810368),
(87, 38, 8, '1', 1250812032),
(88, 38, 12, '1', 1250812564),
(89, 40, 8, '1', 1250825367),
(90, 8, 34, '0', 1250826072),
(91, 11, 41, '0', 1250834425),
(92, 11, 27, '1', 1250835907),
(93, 27, 12, '1', 1250836014),
(94, 27, 2, '1', 1250836547),
(95, 27, 42, '0', 1250837365),
(96, 27, 36, '0', 1250837411),
(97, 27, 43, '1', 1250837941),
(98, 27, 4, '0', 1250837949),
(99, 27, 31, '0', 1250837957),
(100, 27, 26, '1', 1250837967),
(101, 27, 35, '0', 1250837973),
(102, 27, 40, '0', 1250837986),
(103, 27, 44, '1', 1250839636),
(104, 27, 15, '1', 1250839686),
(105, 27, 34, '0', 1250839693),
(106, 27, 3, '1', 1250839703),
(107, 27, 17, '0', 1250839709),
(108, 27, 38, '1', 1250839716),
(109, 27, 19, '1', 1250839722),
(110, 27, 39, '0', 1250839744),
(111, 12, 44, '1', 1250842123),
(112, 27, 41, '0', 1250843184),
(113, 27, 1, '1', 1250843231),
(114, 12, 45, '1', 1250844298),
(115, 27, 24, '1', 1250845781),
(116, 27, 45, '1', 1250845789),
(117, 27, 22, '0', 1250845987),
(118, 27, 9, '0', 1250846363),
(119, 27, 32, '0', 1250846414),
(120, 8, 43, '1', 1250848434),
(121, 27, 33, '0', 1250848639),
(122, 27, 23, '0', 1250848837),
(123, 27, 37, '0', 1250849144),
(124, 27, 18, '1', 1250849993),
(125, 27, 7, '0', 1250852128),
(126, 27, 47, '1', 1250852136),
(127, 35, 8, '1', 1250852240),
(128, 47, 8, '1', 1250852408),
(129, 48, 3, '1', 1250857472),
(130, 48, 8, '1', 1250857995),
(131, 8, 41, '0', 1250859952),
(132, 13, 10, '1', 1250861888),
(134, 50, 8, '1', 1250869877),
(135, 51, 10, '1', 1250873347),
(136, 51, 1, '1', 1250873477),
(137, 47, 12, '1', 1250873688),
(138, 11, 51, '1', 1250875379),
(139, 11, 38, '1', 1250875938),
(142, 58, 8, '1', 1250906982),
(143, 58, 2, '1', 1250910096),
(144, 58, 3, '1', 1250910119),
(145, 58, 60, '0', 1250910128),
(146, 58, 10, '1', 1250917231),
(147, 58, 15, '1', 1250917244),
(148, 47, 3, '1', 1250920208),
(149, 12, 68, '0', 1250929260),
(150, 68, 10, '1', 1250929660),
(151, 69, 12, '1', 1250929705),
(152, 8, 68, '0', 1250931807),
(153, 15, 60, '0', 1250933829),
(154, 11, 70, '1', 1250935566),
(155, 70, 2, '1', 1250935848),
(156, 70, 38, '1', 1250935866),
(157, 70, 61, '1', 1250938922),
(158, 70, 12, '0', 1250939430),
(159, 70, 4, '0', 1250939744),
(160, 70, 18, '1', 1250939817),
(161, 61, 3, '1', 1250941307),
(162, 61, 8, '1', 1250941645),
(163, 70, 34, '0', 1250942689),
(167, 78, 77, '1', 1411894406),
(165, 78, 32, '0', 1411200948);

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_cards`
--

CREATE TABLE IF NOT EXISTS `ibwf_cards` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fntsz` int(5) NOT NULL DEFAULT '0',
  `xst` int(10) NOT NULL DEFAULT '0',
  `yst` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `ibwf_cards`
--

INSERT INTO `ibwf_cards` (`id`, `fntsz`, `xst`, `yst`) VALUES
(2, 2, 9, 2),
(8, 2, 5, 60),
(1, 2, 5, 60);

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_censoruser`
--

CREATE TABLE IF NOT EXISTS `ibwf_censoruser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `UID` int(11) NOT NULL DEFAULT '0',
  `REASON` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_chat`
--

CREATE TABLE IF NOT EXISTS `ibwf_chat` (
  `id` int(99) NOT NULL AUTO_INCREMENT,
  `chatter` int(100) NOT NULL DEFAULT '0',
  `who` int(100) NOT NULL DEFAULT '0',
  `timesent` int(50) NOT NULL DEFAULT '0',
  `msgtext` varchar(255) NOT NULL DEFAULT '',
  `rid` int(99) NOT NULL DEFAULT '0',
  `exposed` char(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=212 ;

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_chonline`
--

CREATE TABLE IF NOT EXISTS `ibwf_chonline` (
  `lton` int(15) NOT NULL DEFAULT '0',
  `uid` int(100) NOT NULL DEFAULT '0',
  `rid` int(99) NOT NULL DEFAULT '0',
  PRIMARY KEY (`lton`),
  UNIQUE KEY `username` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_clubmembers`
--

CREATE TABLE IF NOT EXISTS `ibwf_clubmembers` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `uid` int(100) NOT NULL DEFAULT '0',
  `clid` int(100) NOT NULL DEFAULT '0',
  `accepted` char(1) NOT NULL DEFAULT '0',
  `points` int(100) NOT NULL DEFAULT '0',
  `joined` int(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=77 ;

--
-- Dumping data for table `ibwf_clubmembers`
--

INSERT INTO `ibwf_clubmembers` (`id`, `uid`, `clid`, `accepted`, `points`, `joined`) VALUES
(1, 2, 1, '1', 50, 1250583705),
(2, 8, 1, '1', 0, 1250594367),
(3, 8, 2, '1', 50, 1250602768),
(4, 12, 2, '1', 0, 1250603542),
(5, 11, 2, '1', 0, 1250604356),
(6, 5, 1, '1', 0, 1250604473),
(7, 12, 3, '1', 50, 1250605458),
(8, 8, 3, '1', 0, 1250605490),
(9, 13, 3, '1', 0, 1250606411),
(10, 17, 2, '1', 0, 1250607500),
(11, 13, 2, '1', 0, 1250608915),
(12, 10, 2, '1', 0, 1250610670),
(13, 14, 2, '1', 0, 1250611527),
(14, 10, 4, '1', 50, 1250615749),
(15, 8, 4, '1', 0, 1250617944),
(16, 16, 3, '1', 0, 1250622022),
(17, 16, 2, '1', 0, 1250622057),
(18, 18, 2, '1', 0, 1250622594),
(19, 11, 1, '1', 0, 1250636046),
(36, 38, 4, '1', 0, 1250844576),
(21, 13, 5, '1', 50, 1250637449),
(22, 15, 2, '1', 0, 1250641830),
(23, 8, 5, '1', 0, 1250642419),
(24, 12, 1, '1', 0, 1250642751),
(25, 15, 5, '1', 0, 1250644709),
(26, 12, 5, '1', 0, 1250645184),
(27, 15, 4, '1', 0, 1250664766),
(28, 3, 1, '1', 0, 1250670752),
(29, 12, 4, '1', 0, 1250686092),
(63, 15, 6, '1', 0, 1250917184),
(31, 15, 3, '1', 0, 1250703489),
(32, 27, 2, '1', 0, 1250711586),
(33, 14, 3, '1', 0, 1250727701),
(34, 10, 3, '1', 0, 1250735018),
(35, 13, 1, '1', 0, 1250781864),
(37, 41, 3, '1', 0, 1250860736),
(38, 41, 2, '1', 0, 1250860930),
(39, 27, 5, '1', 0, 1250872170),
(40, 27, 4, '1', 0, 1250872190),
(41, 44, 2, '1', 0, 1250872754),
(42, 45, 2, '1', 0, 1250876840),
(43, 45, 5, '1', 0, 1250877046),
(44, 45, 4, '1', 0, 1250877230),
(45, 27, 3, '1', 0, 1250878799),
(46, 1, 1, '1', 0, 1250857457),
(47, 2, 5, '1', 0, 1250857552),
(48, 2, 2, '1', 0, 1250857737),
(49, 2, 4, '1', 0, 1250857765),
(50, 13, 4, '1', 0, 1250858252),
(51, 43, 5, '1', 0, 1250860920),
(52, 43, 2, '1', 0, 1250861075),
(53, 1, 6, '1', 50, 1250910696),
(69, 51, 6, '1', 0, 1250930838),
(66, 2, 6, '1', 0, 1250929399),
(56, 41, 6, '1', 0, 1250881804),
(57, 41, 4, '1', 0, 1250881912),
(58, 41, 5, '1', 0, 1250882017),
(60, 8, 6, '1', 0, 1250905970),
(61, 44, 4, '1', 0, 1250911215),
(62, 49, 2, '1', 0, 1250911458),
(64, 10, 5, '0', 0, 1250919501),
(65, 26, 4, '1', 0, 1250926279),
(70, 78, 4, '0', 0, 1410112813),
(71, 78, 6, '0', 0, 1410112843),
(72, 77, 4, '0', 0, 1410179301),
(73, 78, 3, '0', 0, 1410180077),
(76, 78, 2, '0', 0, 1411799400);

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_clubs`
--

CREATE TABLE IF NOT EXISTS `ibwf_clubs` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `owner` int(100) NOT NULL DEFAULT '0',
  `name` varchar(30) NOT NULL DEFAULT '',
  `description` varchar(200) NOT NULL DEFAULT '',
  `rules` blob NOT NULL,
  `logo` varchar(200) NOT NULL DEFAULT '',
  `plusses` int(100) NOT NULL DEFAULT '0',
  `created` int(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `ibwf_clubs`
--

INSERT INTO `ibwf_clubs` (`id`, `owner`, `name`, `description`, `rules`, `logo`, `plusses`, `created`) VALUES
(1, 2, 'retrive staff', 'only for staff', 0x7265737065637421, '', 0, 1250583705),
(2, 8, 'certified pasaway', 'pasawayerz world', 0x616b6f20616e67206875737469737961206277616c206d61672061776179206432, 'http://rela.wapheart.com/files/cp.gif', 10000, 1250602768),
(3, 12, 'LIFE', 'Feel free 2 share ur life here to my club LIFE. and free to creat topics,so have fun wappersss!!', 0x6a757320626520757273656c662e2e, '', 10000, 1250605458),
(4, 10, '>TWIRL drop it like it''s HOT<', 'All are FREE. enjoy and have fun. . .', 0x726574726976657761702072756c65732e202e202e, '', 999, 1250615749),
(5, 13, 'Pinoy ATBP', 'Welcome!! i am inviting you all to come inside and find out what pinoy doing in and out!! Guess?ok,join as in now na!!', 0x536974652072756c6573, '', 0, 1250637449),
(6, 1, 'Fun Fun Fun', 'Just what the Title say u here to have fun', 0x526574726976657761702052756c6573206170706c792068657265, '', 0, 1250910696);

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_faq`
--

CREATE TABLE IF NOT EXISTS `ibwf_faq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_faqs`
--

CREATE TABLE IF NOT EXISTS `ibwf_faqs` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `category` varchar(10) NOT NULL DEFAULT '',
  `question` varchar(100) NOT NULL DEFAULT '',
  `answer` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `ibwf_faqs`
--

INSERT INTO `ibwf_faqs` (`id`, `category`, `question`, `answer`) VALUES
(1, '', 'Where can i tell other members about me?', 'Go to Forums> arawap >New Bies forum and post a topic there'),
(2, '', 'How can I find an information about any member?', 'You''ll find clickable nicknames everywhere, click on the nickname to go to user''s profile, which contains statistical , contact and even A/S/L informations.'),
(3, '', 'Where can I set my A/S/L?', 'In main page go to CPanel > Settings, and then enter your Birthday, sex, and location.'),
(4, '', 'There''s something wrong with my age, it says 0 though that I entered my birthday.', 'You should enter your birthday in this format (YYYY-MM-DD) for example 1950-01-15.'),
(5, '', 'why is it so important to fill in my correct birthday?', 'There''s some forums that are available for certain ages only, if you entered uncorrect age to enter that forum then you''ll get banned.'),
(6, '', 'There''s some member that keeps harasing me, what should i do?', 'If you got harassed by PMs then report that PM, if you got harassed in chatrooms then click on its nick in the chatroom and then click on Expose.'),
(7, '', 'well... what else can I do to get rid of a member irritatings?', 'view that member profile and click on Add to ignore list.'),
(8, '', 'WOW thanx, can I help too?', 'Sure you can =) wherever you got spams in your inbox or posts or if you find posts not in the right forum, or contains vulgar words report them as well.'),
(9, '', 'oh by the way, how can I make that little face?', '=) << this is called smiley, in your control panel (CPanel) you''ll find a link to the smilies list.'),
(10, '', 'if I found a bug, have other questions or suggestions what to do?', 'Read the pinned topics in Forums> Arawap > Bugs/Info, your question/suggestion/bug might have been mentioned before, don''t PM admins except in an urgent cases.'),
(11, '', 'Arawap rox.', 'yeah. thanx.'),
(12, '', 'So how can I be an Admin?', 'you can''t.'),
(13, '', 'what about a mod?', 'as arawap grows we might need more mods, in case we needed a mod, we''ll be looking for a member who is smart, polite, friendly, and respects rules and other members.'),
(14, '', 'Great! I''m all that make me a mod', 'people who ask for modding have less chances in modding, when we need a mod, we will tell you.'),
(15, '', 'I''m a cupcake!', ':0');

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_farm`
--

CREATE TABLE IF NOT EXISTS `ibwf_farm` (
  `uid` int(11) NOT NULL,
  `time` int(50) NOT NULL,
  `lev` int(11) NOT NULL,
  `fp` int(11) NOT NULL,
  `plants` int(11) NOT NULL,
  `stock` int(50) NOT NULL,
  `a` int(50) NOT NULL,
  `b` int(50) NOT NULL,
  `c` int(50) NOT NULL,
  `stocktime` int(50) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ibwf_farm`
--

INSERT INTO `ibwf_farm` (`uid`, `time`, `lev`, `fp`, `plants`, `stock`, `a`, `b`, `c`, `stocktime`) VALUES
(77, 1414221463, 15, 400, 2, 30, 1411923180, 1411923482, 1411923783, 1411926460);

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_farm_plants`
--

CREATE TABLE IF NOT EXISTS `ibwf_farm_plants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `level` int(11) NOT NULL,
  `fp` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `ibwf_farm_plants`
--

INSERT INTO `ibwf_farm_plants` (`id`, `name`, `icon`, `level`, `fp`) VALUES
(1, 'Carrot', 'farm/veg/carrot.jpg', 0, 100),
(2, 'Banana', 'farm/veg/banana.jpg', 10, 200),
(3, 'Tomato', 'farm/veg/tomato.jpg', 25, 250),
(4, 'Orange', 'farm/veg/orange.jpg', 50, 500),
(5, 'Apple', 'farm/veg/apple.jpg', 100, 1000),
(6, 'Sunflover', 'farm/veg/sunflover.jpg', 150, 1200);

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_farm_rob`
--

CREATE TABLE IF NOT EXISTS `ibwf_farm_rob` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `robber` int(11) NOT NULL,
  `robed` int(11) NOT NULL,
  `catch` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `ibwf_farm_rob`
--

INSERT INTO `ibwf_farm_rob` (`id`, `robber`, `robed`, `catch`, `time`) VALUES
(1, 1, 0, 0, 0),
(2, 77, 77, 0, 1411661922),
(3, 77, 77, 0, 1411661922),
(4, 77, 77, 0, 1411687839),
(5, 77, 77, 0, 1411831838),
(6, 77, 77, 0, 1411831948),
(7, 77, 77, 0, 1411832020);

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_favtopic`
--

CREATE TABLE IF NOT EXISTS `ibwf_favtopic` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `tid` int(100) NOT NULL DEFAULT '0',
  `uid` int(100) NOT NULL DEFAULT '0',
  `dtpost` int(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_fcats`
--

CREATE TABLE IF NOT EXISTS `ibwf_fcats` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL DEFAULT '',
  `position` int(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `ibwf_fcats`
--

INSERT INTO `ibwf_fcats` (`id`, `name`, `position`) VALUES
(1, 'Info', 1),
(2, 'General', 2),
(3, 'International', 3),
(4, 'Spiritual', 4),
(5, 'Geographics', 5),
(6, 'Entertainment', 6),
(7, 'Love', 7),
(8, 'Adult', 8),
(9, 'Fun/Games', 9),
(10, 'Competition', 10),
(11, 'Technology', 11),
(12, 'PinoyExtra', 12);

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_forums`
--

CREATE TABLE IF NOT EXISTS `ibwf_forums` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL DEFAULT '',
  `position` int(50) NOT NULL DEFAULT '0',
  `cid` int(100) NOT NULL DEFAULT '0',
  `clubid` int(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `ibwf_forums`
--

INSERT INTO `ibwf_forums` (`id`, `name`, `position`, `cid`, `clubid`) VALUES
(1, 'Announcement', 1, 1, 0),
(2, 'News', 2, 1, 0),
(3, 'Suggestion', 3, 1, 0),
(4, 'Bugs/error', 4, 1, 0),
(5, 'Support events', 5, 1, 0),
(6, 'Newbies', 1, 2, 0),
(7, 'Hacker zone', 2, 2, 0),
(8, 'Plusses zone', 3, 2, 0),
(9, 'Health zone', 4, 2, 0),
(10, 'Politics', 0, 3, 0),
(11, 'Country', 0, 3, 0),
(12, 'Races', 0, 3, 0),
(13, 'Bible learning', 0, 4, 0),
(14, 'Belief', 0, 4, 0),
(15, 'Opinions', 0, 4, 0),
(16, 'Animal planet', 0, 5, 0),
(17, 'Wonder of nature', 0, 5, 0),
(18, 'Outer space', 0, 5, 0),
(19, 'Music', 0, 6, 0),
(20, 'Sports', 0, 6, 0),
(21, 'Showbiz', 0, 6, 0),
(22, 'Quotes stories', 0, 7, 0),
(23, 'Guys life', 0, 7, 0),
(24, 'Girls life', 0, 7, 0),
(25, 'Experience', 0, 8, 0),
(26, 'Open talk', 0, 8, 0),
(27, '', 0, 8, 0),
(28, 'Jokes/riddles', 0, 9, 0),
(29, 'Games', 0, 9, 0),
(30, 'Members competition', 0, 10, 0),
(31, 'Staff competition', 0, 10, 0),
(32, 'Wap links', 0, 11, 0),
(33, 'Mobile', 0, 11, 0),
(34, 'Computers', 0, 11, 0),
(35, 'Whats new', 0, 11, 0),
(36, 'Pasaway', 0, 12, 0),
(37, 'retrive staff', 0, 0, 1),
(38, 'certified pasaway', 0, 0, 2),
(39, 'LIFE', 0, 0, 3),
(40, '>TWIRL drop it like ', 0, 0, 4),
(41, 'Pinoy ATBP', 0, 0, 5),
(42, 'Fun Fun Fun', 0, 0, 6);

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_gallery_catagary`
--

CREATE TABLE IF NOT EXISTS `ibwf_gallery_catagary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_games`
--

CREATE TABLE IF NOT EXISTS `ibwf_games` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `uid` int(100) NOT NULL DEFAULT '0',
  `gvar1` varchar(30) NOT NULL DEFAULT '',
  `gvar2` varchar(30) NOT NULL DEFAULT '',
  `gvar3` varchar(30) NOT NULL DEFAULT '',
  `gvar4` varchar(30) NOT NULL DEFAULT '',
  `gvar5` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `ibwf_games`
--

INSERT INTO `ibwf_games` (`id`, `uid`, `gvar1`, `gvar2`, `gvar3`, `gvar4`, `gvar5`) VALUES
(1, 1, '8', '23', '', '', ''),
(3, 19, '1', '73', '', '', ''),
(13, 11, '1', '91', '', '', ''),
(22, 77, '8', '67', '', '', ''),
(23, 78, '5', '36', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_gbook`
--

CREATE TABLE IF NOT EXISTS `ibwf_gbook` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `gbowner` int(100) NOT NULL DEFAULT '0',
  `gbsigner` int(100) NOT NULL DEFAULT '0',
  `gbmsg` blob NOT NULL,
  `dtime` int(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=88 ;

--
-- Dumping data for table `ibwf_gbook`
--

INSERT INTO `ibwf_gbook` (`id`, `gbowner`, `gbsigner`, `gbmsg`, `dtime`) VALUES
(1, 5, 12, 0x48692070696563652c20686d6d20616e6f206261207077642071207362686e207361753f206d6d2c63676f726f20696e676174206e6c616e6720616e64206861762066756e2065726520686568652e2e, 1250609530),
(2, 5, 12, 0x48692070696563652c20686d6d20616e6f206261207077642071207362686e207361753f206d6d2c63676f726f20696e676174206e6c616e6720616e64206861762066756e2065726520686568652e2e, 1250609537),
(3, 25, 8, 0x796f757220616c77617973206d79206c6974746c65207072696e63657373202e202e2074616b65206361726520616e642073747564792068617264202e202e202e202e202e20616e7974696d6520696d206865726520696620796f75206e65652073306d653120746f2074616c6b202e202e202e20616e642072656d656d62657220697473206e3074206561737920746f2068616e646c65206c306e672064697374616e63652072656c617469306e73686970206974732061206d6174746572206f6620747275737420616e642068306e65737479202e202e206c6f76652075206d776168212e2e726f73652e, 1250648459),
(4, 14, 15, 0x69206c65617665206d7920666f6f747072696e747320686572652121212068656c6c6f2069616e2120, 1250655279),
(5, 8, 15, 0x6861692073697321206d75737461206e6761793f20616b6f207369676e2064746f206762206d6f212121212070617361776179206576657221212120686568656865, 1250666979),
(6, 13, 15, 0x626573742c207369676e20616b6f2064746f2068613f206f6b206c616e673f207572206d7920626573742c20626573742c20626573742c206265737421212120776c61206e6b6f206d61736162692c20686568656865, 1250667965),
(7, 12, 15, 0x7468616e6b20752c207369676e20616b6f2064746f2068613f, 1250667999),
(8, 10, 15, 0x73796e2064696e20616b6f2064746f20616c65782c2070726f6f66206e6120736973206e61206b697461212120686568656865, 1250668031),
(9, 15, 12, 0x4f6b20617465207468616e6b20752064696e2c746320616c776179732e2e, 1250671912),
(10, 10, 12, 0x4261627920712c6977616e2071206d756e6120696e6b20643220686120686568652e2e706b69207461676f206e6c616e67207361206261206f6c2e2e6c61622075206d776168, 1250672161),
(11, 15, 10, 0x6174652077696e746572202e706d706c2e20746e78207861207869676e20786120676220712061682e2070776420646e206e74696e206777696e672075636861742e616e2064322072706c79206b61207861206762207120617120646e207861206762206d302e204e796168616861686120, 1250672242),
(12, 15, 10, 0x6174652077696e746572202e706d706c2e20746e78207861207869676e20786120676220712061682e2070776420646e206e74696e206777696e672075636861742e616e2064322072706c79206b61207861206762207120617120646e207861206762206d302e204e796168616861686120, 1250672293),
(13, 15, 13, 0x5961207375726520626573742c206d20796f757220626573742066726d20642077696c642077696c64207765737421, 1250673684),
(14, 13, 15, 0x736c616d6174207361207061677369676e2c207767206b61206d67736173617761206d677369676e2068613f20646f6e7420776f726920626779616e206b697461203179656172207375706c79206e67207369676e70656e2070617261207361207369676e206e67206762206b6f202868656865686529, 1250674135),
(15, 12, 10, 0x5b695d6e616e6169207130772720694c6162794f756827206e61692e202e6777696e206e54696e2073696b7265542068696445206f755420322e202e64322074617520757a61702e202e7072612064646d69206d73672e206e54696e2073612067622e202e6d776168312e2e726f73652e202e6875672e5b2f695d, 1250675657),
(16, 10, 28, 0x2e6174652062724163652e202e2e0a0a426565682e212e0a2e616d69736875207030682e2e686568650a200a2e616d20692077656c63306d6520686572653f210a2e686d6d6d6d6d3f3f, 1250676282),
(17, 1, 3, 0x54686973207369746520776c20626520746865206d3073742067726561742073697465206265634175736520474f442069732077642075733d3e, 1250683778),
(18, 28, 10, 0x5b695d7761616e2064206d4f206c6e6720616c616d2071276e672067616e4f206b5461206b616827206d697a5a7a206e7961486148614861202e637564646c652e20796e6761547a206b6575206c616765206e69206a706f69202e737469722e2e77656c636f6d652e206b657520643220756921202e746f6d61746f2e5b2f695d, 1250684293),
(19, 12, 14, 0x5b696d673d20687474703a2f2f6465646f6d696c2e6e65742f3367702f323430783332302f3433332e6a70675d, 1250692023),
(20, 10, 12, 0x2e726f73652e20696c6162796f756820746f6f20626162617920712e2e6f6b206865686520696e6761742075206c6167692e2e2e, 1250692282),
(21, 14, 12, 0x49616e2c7468616e6b7320736120626561722064306e207361206762207120686568652e2e696e67617420706f68206b6175206c61676920676f6420626c65737321, 1250692435),
(22, 29, 12, 0x2e77656c636f6d652e206865726520616e656265722032206f7572206269672068617070792066616d696c792e2e686176652066756e2121, 1250692806),
(23, 14, 15, 0x7468616e7820646e2069616e2c6b687420616c6120616b6f206d6b7461206e612073796e206d6f207361206762206b6f2c697473206f6b2c20736269206e6c612c64206561726c7920626972642063617463686573206420776f726d2c6b736f20616b6f20756e6720776f726d2c6b617961206e6b61696e20616b6f2c207468616e78207061726e2c20, 1250693250),
(24, 13, 15, 0x747275652066726e73206172652072696c79206861726420746f2066696e642c7468616e6b2075206d61726b2c20346265696e6720746865726520616c776179732c736c6d617420746c67612e2e, 1250693536),
(25, 12, 10, 0x5b695d6e616e616920636f6d706c6574652066616d696c7920616e64322063207461746169202e726f6c6c2e20686e64206c6e6720706d70616d696c7961207061276e672073706f7274207061202e726f6c6c2e202e6c617567682e206c61706974206e612062646179206d30206e61692c20616e306e672068616e6461206e74696e206a616e3f2e656174696e672e5b2f695d, 1250695647),
(26, 1, 8, 0x7965732e202e202e20616e642074687320697320766572792068617070792073697465202e202e202e20616c6c206172652076657279206e69636520657863657074206d65202e202e202e20776568616861, 1250724738),
(27, 10, 8, 0x756920686168616861, 1250742753),
(28, 8, 10, 0x5b695d6d6879206777696e206e74696e2068696445206f75542032206861686168615b2f695d, 1250743539),
(29, 14, 15, 0x7572206d7920627564647920346c796621, 1250779012),
(30, 12, 2, 0x68617070792062646179207368616d69652c20616d79212e7572612e20476f6420626c657373207520616e64207374617920686170707920616c7761797321205468616e6b7320666f72206265696e67206d792066726e6421, 1250815218),
(31, 10, 8, 0x6d697320752061206c6f74, 1250822430),
(32, 15, 8, 0x6865792061736c20706c732e202e202e2068752075206e79616861686120616d626f7421, 1250822579),
(33, 27, 15, 0x7468616e782034616464696e67206d652c207463612120, 1250836654),
(36, 8, 10, 0x5b695d6f6821206e6b4c696d7554616e2071207579697420774c6120704c6120617120626f5465742064322e202e754c79616e696e206e20746c672061712e202e68616861697a7421202e202e202e774c6120706120712061706f20754c79616e696e206e2061712e202e6d4e68696d694b206b6e61207869206b6874206e4f20706120676777696e206d6f2e207572206e4f7448696e674c6573732e202e202e202e686568656865207572206a75737420612064756d7020666c6970666c6f707a2e202e776168656865202e202e74754c646f6b20786920617475682e207175657374696f6e206d61726b20636c61206b6561207265737065637420616e67206d5461617320697469702062617461206b746920697461772e202e70756e63682e2045726173652032206e696c61206e7961686168616861202e7370792e5b2f695d20, 1250861532),
(37, 12, 10, 0x5b695d6e616920696c616e67206f726173206e6c616e672062646179206d756e612068656865202e706d706c2e202e726f73652e206e616920626b7420706f2062616974206e656f20736b696e3f206775726f20706f206e6b6b7461206e696e552061712073206b625461616e206e656f3f2068616861686120706f6b45722066616365206b6120616c6578202e70756e63682e206f2064206b656120696e4c6162206b6120786b696e206861686168616861202e6b69636b2e206e61692e202e202e77616b206e61206b6575206372792e20686170272070696e616979616b206d302071206b6e696e612073612066306e2e206b61696e6973206b6120746c672e202e746174616c6f6e206e612078616e61206171207361207475622070616979616b32206b61206b632e202e6e6b6c696d7574616e207120326c6f69206e61676c61676179206171206e6720637265616d20736120666163652071206e6170686972616e207120326c6f792078692070696e616979616b206d3020646e2061747568202e6372792e202e6372792e20746179616e67206b616c616c616761792071206c6e67206e306e2065682e204875687568752078616e612070616c61206420712070696e696e646f742079306e2077616861686168612e726f6c6c2e202e746f6d61746f2e5b2f695d, 1250862909),
(35, 8, 10, 0x5b695d6d7a20752074306f206d68792e202e686568652e202e64616e63652e626b74206b65752070756d796167206d6c61676179206c696e6b206e67206a756461732064323f206b6874206b61696c616e206b61706c617374696b616e20706120646e206d616e67696e67696261772e616e677279312e20676f20746f2068656c6c20616c6578612070616b692e616c616d206d302073617520626120322e202e68656865202e70656163652e206568212067616c6974206171207361206d307274616c206e612079616e2065682e2074736b2e2068616e6767616e67206e6b6b74612071206c696e6b206e672073697465206e2079616e2064206d77776c61206d676120636e62206e65612e2070616c696268617361206171206e617061696e206b6561206420616c616d206d676120636e62206e672064656d306e796f2e202e6861697a7421207754657645722e2053687574215550206b6e61206b632e202e70617861776169206b612e5b2f695d, 1250860612),
(38, 10, 8, 0x70617265686f2074612075672067626174692062686520776c61792074696e673067202c206e676520686168612067726162652073616b697461207569206b616e6168616e676c616e206779306420697061676d616c616b69206e7961206861792061723079207120646f2070617374696c616e206367652070616261646c306e67207461206469726520616d69677568612074616e616e67207461776f2068756d616e20617430616e672070616e672061776179306e2070617261206d616e676c61796173206e67652064617574616e612075672075746f6b206f69207361676469206c616e67206268652064616768616e2070612075672061646c6177206d616e676875676173207261206a6170306e20636c6120756720706c61746f202e202e202e206f6b206c6f7665207520, 1250863988),
(39, 8, 10, 0x5b695d6475682120756921207361206b646768616e67206e48697461626f20696e672e616e6920726120642e692e202e776168616861686168612077615454612e202e202e67527252206278746120696e6974206171206475676f2e202e616d626f74206c6e672e202e7469746c6520706120736120697961616e67206b7567616e206765627554616e67206d68756e61322e616e206e6c616e67206e6b75206e6141207120736120697961612070756445722e202e616e677279312e5b2f695d, 1250864793),
(40, 10, 8, 0x6275656e6173206e30636865732067626969206e612e202e202e202e206d652063306d706f7274626c65202e202e202e20746d6120623f206279616e67206d6167696c69772e202e202e20686179206c61676f74207569212062657364616b206b696e73612069737567206761776173206d61677061746179207461202e202e202e202e202e202e67756e2e202e202e206865686520, 1250865208),
(41, 10, 12, 0x486e64207120616c616d2062737461206d616761616e206c6f6f6220712073617520746173206e61646167646167616e207061207461776167207520616b6f206e616e616920746c67616e67206665656c2071206e6120616e616b206e20746c6761206b746120686568652e726f73652e207468616e6b7320646e206e61206a616e206b6120706c61676920736120616b696e206e6b69326e6967207361206979616b206e67207075736f20712c736f20692077697368206f757220667269656e64736869702074696c20666f726576657220616e6420657665722e2e49204c4f564520594f552042414259204b4f204d57414820, 1250865322),
(42, 10, 12, 0x486e64207120616c616d2062737461206d616761616e206c6f6f6220712073617520746173206e61646167646167616e207061207461776167207520616b6f206e616e616920746c67616e67206665656c2071206e6120616e616b206e20746c6761206b746120686568652e726f73652e207468616e6b7320646e206e61206a616e206b6120706c61676920736120616b696e206e6b69326e6967207361206979616b206e67207075736f20712c736f20692077697368206f757220667269656e64736869702074696c20666f726576657220616e6420657665722e2e49204c4f564520594f552042414259204b4f204d57414820, 1250865336),
(43, 8, 12, 0x576c61206e6120616b6f206d6173626920736175206a616e206e61206c686174206e6b69327461207120686168612e2e7065726f207468616e6b207520706172696e207361206c6861743220736120667269656e6473686970206e206c6f76652e20736f2049204c4f564520594f55204d5920444541522053495354455220737461792061732073776565742061732075206172652020, 1250865987),
(44, 12, 8, 0x5b625d5b636c723d677265656e5d202e7572612e2068617070792062646179206c616861742067766520712073617520686168612070617469207574616e67207120726567616c6f2071206e612073617520686168612074616c616d61742073612070616769326e67206d627574696e67206b61696267616e20616e6a616e206b6874206d61792069706f2069706f206f7920747964616c2077617665202e202e202e202e202e206c75622075206368756d6174636821207765652e6c6f76652e202e726f73652e2062657374206264617920736e61206974207861206c7966206d75202e6b69636b2e20686168612073627920636e697061206865686520616e67206f726173206179203131706d206973616e67206f726173206e6c616e672062646179206d75206e6120686172206861725b2f625d5b2f636c725d, 1250866197),
(45, 12, 10, 0x5b695d616e67206761616e206e672066654c696e67277a2e202e6861697a742120697361207061206e6761206e616920794f6e6720636e62206d302064306e2720626b61206c696c69706164206e206171206861686168616861202e726f6c6c2e20786920706f206e616920616e67206d67612074614f6e67206e6b6b616b696c616c61206e6120786b696e20646f6e206e6120706f206e696c61206d6169696e74696e6468616e2071276e6720636e4f20746c67612061712e202e686d4d6d2e202e636e4f206e67612062412061713f203f20486168616861202e726f6c6c2e206261787461206e6169206b687420616e306e672070726f626c656d6120616e6432206c6e67206171206b68742032342f37206b616e672074747761672e202e6b686974206d616c61706974206e67206d78756e3067207461696e6761207120736120696e6974206e6720637020712e202e616e6a616e20706120646e206171206e6b6b6e69672e205767206c6e672073616e616e672073756d3072656e64657220326e672063702071206861686168616861202e726f6c6c2e5b2f695d, 1250866226),
(46, 8, 12, 0x443220616b6f20756c69206e7961686168612e736d696c652e206b687420747964616c207761766520686e64206e696120746175206d61706167686977616c61792e2e61742073616c616d6174207361207574616e67206e6120726567616c6f20692072696c792061707072656369617465642e2e7468616e6b7320646e206e61206a616e206b6120706c61676920736120616b696e206b6874206d696e73616e20706178617761792063207368616d69652e2e64697320697320746865207265616c207368616d6965206b68742062616861207361326c616b6179696e2070617261207361206d6168616c206b6e67206d6761206b6169626167616e2e2e6c616220796f75206d7761682e, 1250866739),
(47, 10, 8, 0x486f7920616e756e67206472616d6120746f202e67756e2e2077616c616e6720693279616b20627568617920706120746175206761682061776f736865206d6168616c206b697461207072696e6365737320712077656565202e202e202e, 1250866866),
(48, 8, 10, 0x5b695d6869206e6169206432206b612070616c6120686168616861206e776179206d687920627874612061712067616c6775542079206b627554616e67616e206171206b616c616775742e202e6d616c646974612070726f20616d626f74206c6e672e202e7361306e20746d616e20776c61206d4e2071277920616c616d616720736120776f726c642e206b6174617761206c6e67206d30206472612e2054696d652077696c2072656163682e202e726f6c6c2e5b2f695d, 1250866890),
(49, 8, 10, 0x5b695d6b68742062697475696e20737573756e676b6974696e20707261206c6e67206d70616e73696e20616e6720646d64616d696e207120736175202e6d757369632e206e6b756827206e6c696c69746f206171206b6e696e306e6720676220323f20486168616861686120754c79616e696e206e20746c672e202e6d6879206f72206e61693f206b6e696e4f20322e202e636e7861206e61206b6575206d756b68616e672078617861626f67206e2061712068616861686168615b2f695d, 1250868256),
(50, 10, 12, 0x48616861206b79206d687920756e67206762206e612073756e676b6974696e206232696e206e616b206c6173696e67206b61206c6e672e726f73652e20, 1250868516),
(51, 10, 8, 0x2e6b69636b2e207861626f67206b61206b756e672073616e2073616e206b61206c756d75733074202c20776167206b632073686f72746375742070617261206d6174616e6461616e206b6e696e756e67206762206b61206e672073756c61742068616b2068616b20706c7320766973697420687474703a2f2f72656c612e77617068656172742e636f6d20776168616861206e616720616476657274202e202e746f6d61746f2e, 1250868666),
(53, 12, 10, 0x5b695d686168616861207555206e6761206b79206d616d6879206e67612079306e67206973612e202e636e7861206e61206e616e616920786920706f20642071206c6e6720706f20616c616d2071276e672070616e4f20616e67207075736f20712070672e6d776c612061786177612071206861686168616861202e706d706c2e20746177612074617761206e6c6e67206174756827207077612073612062646179206d30206e61692e202e642071206d6b4c696d7554616e20616e672061726177206e612032206e61206d7920756d6979616b202e6372792e2064207120616c616d2071276e6720617120626120696e6979616b616e206f2079306e672070726f626c656d6120616e6720696e6979616b616e2068616861686168612068616c6121206269733268616e206e6120322e202e70656163652e206e616920686168616861206d6168616c206b697461202e726f6c6c2e206275686169206174756820696e6979616b616e2061747568206d687920677252725b2f695d, 1250868860),
(54, 12, 8, 0x6c617465206171206178616e2074697375652068616b2068616b206173616e2063207968656e327820736e6120643220646e20756e2070617261206d617920706174617761792070616e67206973612068616b2068616b20736b6974206e20646c6972692071206b61206b612070696e646f7420646f7420646f74207468652074696d6520732031313a3339706d, 1250869078),
(55, 13, 12, 0x4d61726b206e70616461616e206c6e6720686d6d2c77616e74203220736179207468616e6b20752034206265696e206465722034206d65206173206120667269656e6473206e207468616e6b7320342074686520667269656e64736869702e2e616d20686170707920746f206b6e77207520736f207468616e6b7320616761696e20616e6420676f6420626c657373, 1250869177),
(56, 15, 12, 0x4174652c206432206d6520756c692077616e742032207468616e6b73207361206772656574696e6773206d6172616d696e672073616c616d617420706f682e726f73652e20676f6420626c657373, 1250869373),
(57, 8, 10, 0x5b695d6861686168616861207568214c6167652064206e6b75206d672073686f727420637574206d30616769206e6b752073612054414d414e47204441414e206e692062726f7468657220656c7920736f7269616e6f20686168616861202e726f6c6c2e20616e672054414d414e47204441414e20414e414b206d616c692079616e206c6178696e67206b61202e706d706c2e5b2f695d, 1250869399),
(58, 10, 12, 0x64206b617720746c676120696e6979616b616e20712e2e686e6420756e6720616c61206b77656e74612e726f73652e686168616861206e616b2c6e6b61207368616275206b61206174612065682068616b68616b, 1250869630),
(59, 8, 12, 0x6e796168616861207370616d696e67206b61206e616720616476657274202e6e656e652e20736861626f67206e20616e616b206e74696e2064206e696120616c616d20616e67206461616e2e2e726f73652e, 1250869772),
(60, 10, 8, 0x6e6b612073686162752079616e2033306b207472616e7361637469306e207368616275206c61622068616b2068616b, 1250869853),
(61, 1, 51, 0x6e69636520776f726b2062696b652e, 1250869916),
(62, 1, 8, 0x2e6669742e2075702075702075702e666c792e20677564206a6f6221206e307469666963617469306e2e202e202e, 1250871772),
(63, 12, 10, 0x5b695d6e61692068617070792062646179206e61206c617465206171206b69636b206b63206171202e6372792e5b2f695d, 1250872330),
(64, 11, 12, 0x546f6c2c6977616e2071206d756e612066696e6765727072696e7420712064322068613f20686568652e2e746f6c2c6e676120706c612073616c616d617420736120667269656e64736869702c617420616c616761616e207520616e616b2071206861206b6e672064202e6b69636b2e206b74612070616c616261732068616861, 1250874597),
(65, 15, 14, 0x4869206268656265212054634121, 1250884802),
(66, 1, 2, 0x7468616e6b7320666f72206d616b696e672074686973207369746520666f72207573206a6a207520646f6e65206772656174206a6f622c20616e64207468616e6b7320666f72206265696e67206d792066726e6420686f706520666f7220746865206265737420696e20752c2073746179206861706920616e6420616c7761797320636f6f6c2c2061206672696e646c792068756720666f7220752120546321, 1250887511),
(67, 38, 2, 0x7468616e6b7320666f72206265696e672068657265206d79206b75796120646f75676c617320616c77617973206665656c20617420686f6d6520616e6420676f6420626c657373207520616c77617973, 1250887637),
(68, 11, 2, 0x6869202e677564626f792e205468616e6b7320666f72206265696e672070617274206f6620746869732073697465207374617920636f6f6c20617320752061726520616e6420656e6a6f79696e672073746179696e6720686572652e2054616b65206361726520616e6420676f6420626c657373207521, 1250887887),
(69, 3, 2, 0x616d20746865203173742068657265202e726f6c6c2e20204a7573742077616e7420746f20736179207468616e6b7320666f72206265696e67206d7920636f206f776e657220686572652c207374617920636f6f6c206173207520617265207374756479206861726420726561636820757220616d626974696f6e2061696d2068696768657220616e6420616c776179732072656d656d62657220676f64206c6f7665732075212054632e, 1250888116),
(70, 15, 2, 0x617465206772616365207468616e6b7320666f7220737570706f72746e6720757320616c776179732069206c6f7665752120416c776179732073746179206861706921205463, 1250888308),
(71, 13, 2, 0x6d6973206b6f206320627574696b6920686168616861206f6b207468616e6b7320666f72206265696e6720686572652073616e612077616c61206e6720686977616c6179616e2e2048616861686120676f6420626c65737321, 1250888551),
(72, 2, 15, 0x616b6f206461706174206d677468616e6b207520736175206b6320616e6a616e206b6175206c616769206e692072656c61207061726120736b656e2c736c6d61742c646b6f206b6175206d6b616b616c696d7574616e2c, 1250895649),
(73, 8, 10, 0x5b695d6e6169206e6b612073686162752061747568272078612067616c697420627761686168616861207067696c616e206e656f2061715b2f695d, 1250912741),
(74, 10, 8, 0x686e64206171206e616e6169206d75206d616c69676f206b6e6120696e6974206c616e67206e672070616e6168306e2079616e2e202e202e202e67756e2e202e6c6f6c2e, 1250912868),
(75, 11, 10, 0x5b695d6d6168616c2071206d64616d69206b61206b616c6162616e2070672074616b78616e206d3020617475682720686168616861202e726f6c6c2e206c6f7665207520706f20686f6e657920712e202e6d776168312e2077616b206b6e61206d6861723074207072612064206b7461202e70756e63682e206c6167655b2f695d, 1250912920),
(76, 8, 10, 0x5b695d746e61676f742071206c6e6720706f7374206e69206e616e6169206432206d6879206e7961686168616861202e726f6c6c2e206e6c696475206e2061747568202e626174682e5b2f695d, 1250913135),
(77, 10, 8, 0x6b616c612071206e616c676177206b6e61206e616d616e202e6c6f6c2e, 1250913990),
(78, 8, 10, 0x5b695d6e6b752064756d69726974736f20617120643220686e642071206e62786120616e6720706f7374206d302064306e206d6879206861686168616861202e726f6c6c2e5b2f695d, 1250914225),
(79, 58, 15, 0x6869206b72616d21207468616e6b2075207361207061672061646420736b656e2c206d75737461206a616e20636e6164613f, 1250914696),
(80, 12, 13, 0x486920616d792c686170692062646179216d617920796f7520687665206d616e793278206d6f726520626461797320746f20636f6d6521676f6420626c65737320616e6420746b652063726520616c776179732e2e2e277369676e20696e20642070726573656e6365206f6620676f6427, 1250916447),
(81, 12, 13, 0x486920616d792c686170692062646179216d617920796f7520687665206d616e793278206d6f726520626461797320746f20636f6d6521676f6420626c65737320616e6420746b652063726520616c776179732e2e2e277369676e20696e20642070726573656e6365206f6620676f6427, 1250916499),
(82, 12, 13, 0x476f6420697320736f2067756420746f206d652c7768793f636f7a20686520677665207520746f206d65206173206265696e67206d7920677564206672656e2e2e6920646f20686f706520736e612069742077696c206c61737420346576657220756e74696c206d79206c61737420627265617468216c7576207520616d7920616e6420746b65206775642063726520616c7779732068613f277369676e20696e20642070726573656e6365206f66206a6573757327, 1250916701),
(83, 13, 12, 0x44756d6f676f207075736f20712064306e2061682068616b68616b20706561636520746175206d61726b2c686d6d20692070726179203220676f64206e6120736e6120686e64206e6120746175206d61676b6132686977616c6179207061207527726520746865206265737420667269656e64732e2e6174207468616e6b73206e61206a616e206b612070616c61676920736120746162692071207261696e206f72207368696e65206b6874206e616c75326e676b6f7420616b6f206a616e206b6120706172696e2070617261207061746177616e696e20616b6f20736f207468616e6b2075207468616e6b207520736f206d75636820342074686174206d61726b207769736820346576657220667269656e64732063206b616d61746179616e206c6e6720707764206d61677061686977616c6179207361206174696e2e6c6f76652075202620676f6420626c6573732e2e20, 1250917214),
(84, 2, 12, 0x46616974682c7468616e6b73207361206c61686174206c616c6f206e6120736120667269656e647368697020686d6d2c6d617361796120616b6f206b6e67206e6b696c616c612071206b617520736e6120686e64206e6120746175206d61676b61686977616c61792070612e2e6c6f7665207520616e6420676f6420626c657373, 1250919978),
(85, 10, 8, 0x73686f7274637574206b6120756c69202e67756e2e202e6c6f6c2e, 1250920815),
(86, 2, 49, 0x69206c6f766520796f752032206d75636820616e64206920686176652031207765656b6e657373207468617420697320692043414e542053454520594f552057495448204f5448455220424f592e736f6f7279, 1250942308),
(87, 32, 78, 0x6672, 1411197367);

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_getcards`
--

CREATE TABLE IF NOT EXISTS `ibwf_getcards` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `no` int(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_gift`
--

CREATE TABLE IF NOT EXISTS `ibwf_gift` (
  `uid` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `win` int(11) NOT NULL,
  `sm` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ibwf_gift`
--

INSERT INTO `ibwf_gift` (`uid`, `time`, `win`, `sm`) VALUES
(77, 1412513707, 300, 0),
(78, 1412265906, 200, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_groups`
--

CREATE TABLE IF NOT EXISTS `ibwf_groups` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `autoass` char(1) NOT NULL DEFAULT '1',
  `mage` int(10) NOT NULL DEFAULT '0',
  `userst` char(1) NOT NULL DEFAULT '0',
  `posts` int(100) NOT NULL DEFAULT '0',
  `plusses` int(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_hangman`
--

CREATE TABLE IF NOT EXISTS `ibwf_hangman` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `text` varchar(30) NOT NULL DEFAULT '',
  `dscr` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_harry_potter`
--

CREATE TABLE IF NOT EXISTS `ibwf_harry_potter` (
  `uid` int(11) NOT NULL,
  `group` int(11) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ibwf_harry_potter`
--

INSERT INTO `ibwf_harry_potter` (`uid`, `group`) VALUES
(1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_helpr`
--

CREATE TABLE IF NOT EXISTS `ibwf_helpr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `text` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_iconset`
--

CREATE TABLE IF NOT EXISTS `ibwf_iconset` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `themedir` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `ibwf_iconset`
--

INSERT INTO `ibwf_iconset` (`id`, `themedir`) VALUES
(1, 'methos'),
(2, 'blue'),
(3, 'blacktowhite'),
(4, 'red'),
(5, 'green'),
(6, 'steal'),
(7, 'operawml'),
(8, 'error'),
(9, 'greyorange'),
(10, 'pinky'),
(11, 'matrix'),
(12, 'goth'),
(13, 'nightpink');

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_ignore`
--

CREATE TABLE IF NOT EXISTS `ibwf_ignore` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` int(99) NOT NULL DEFAULT '0',
  `target` int(99) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ibwf_ignore`
--

INSERT INTO `ibwf_ignore` (`id`, `name`, `target`) VALUES
(1, 40, 8),
(2, 78, 32);

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_jakemate`
--

CREATE TABLE IF NOT EXISTS `ibwf_jakemate` (
  `uid` int(11) NOT NULL,
  `card` int(11) NOT NULL,
  `card2` int(11) NOT NULL,
  `take` int(11) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_jnp2`
--

CREATE TABLE IF NOT EXISTS `ibwf_jnp2` (
  `id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `byuid` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `touid` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `hand` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `reply` text COLLATE utf8_unicode_ci NOT NULL,
  `bet` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `actime` datetime NOT NULL,
  `accept` int(10) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_judges`
--

CREATE TABLE IF NOT EXISTS `ibwf_judges` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `uid` int(100) NOT NULL DEFAULT '0',
  `fid` int(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_lastview`
--

CREATE TABLE IF NOT EXISTS `ibwf_lastview` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lastview` int(11) NOT NULL,
  `whonick` int(11) NOT NULL,
  `viwed` int(11) NOT NULL DEFAULT '0',
  `ltime` int(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `ibwf_lastview`
--

INSERT INTO `ibwf_lastview` (`id`, `lastview`, `whonick`, `viwed`, `ltime`) VALUES
(4, 77, 2, 0, 1409596181),
(5, 77, 44, 0, 1409598901),
(6, 77, 80, 0, 1409835813),
(7, 77, 79, 0, 1409841186),
(9, 78, 80, 0, 1409949839),
(10, 78, 15, 0, 1410179008),
(11, 78, 32, 0, 1411197345),
(12, 78, 17, 0, 1411202271),
(13, 78, 1, 0, 1411207247),
(14, 78, 11, 0, 1411212111),
(18, 77, 81, 0, 1411304680),
(19, 77, 18, 0, 1411327694),
(21, 78, 81, 0, 1411477304),
(23, 77, 1, 0, 1411585470),
(26, 78, 77, 0, 1411802703),
(27, 77, 78, 0, 1411809583),
(28, 77, 12, 0, 1411888831),
(29, 77, 19, 0, 1411889111),
(30, 77, 59, 0, 1411889129),
(31, 77, 11, 0, 1411889182),
(32, 77, 13, 0, 1411889206),
(33, 77, 45, 0, 1411978206);

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_logo`
--

CREATE TABLE IF NOT EXISTS `ibwf_logo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `image` varchar(50) NOT NULL,
  `permisson` int(11) NOT NULL DEFAULT '0',
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `ibwf_logo`
--

INSERT INTO `ibwf_logo` (`id`, `uid`, `image`, `permisson`, `time`) VALUES
(2, 78, 'logo/SM_LOGO_damith.jpg', 1, 1411231108),
(3, 77, 'logo/8fa95495-4ee5-4ac3-83ba-39fbdc88f535.jpg', 1, 1412266481),
(4, 77, 'logo/8fa95495-4ee5-4ac3-83ba-39fbdc88f535_1.jpg', 1, 1412266503);

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_mag_buy`
--

CREATE TABLE IF NOT EXISTS `ibwf_mag_buy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `extime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `ibwf_mag_buy`
--

INSERT INTO `ibwf_mag_buy` (`id`, `uid`, `extime`) VALUES
(3, 77, 1411823456),
(4, 78, 1411990101);

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_mainthemes`
--

CREATE TABLE IF NOT EXISTS `ibwf_mainthemes` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(15) NOT NULL DEFAULT '',
  `iconset` int(100) NOT NULL DEFAULT '0',
  `bgc` varchar(6) NOT NULL DEFAULT '',
  `txc` varchar(6) NOT NULL DEFAULT '',
  `lnk` varchar(6) NOT NULL DEFAULT '',
  `hdc` varchar(6) NOT NULL DEFAULT '',
  `hbg` varchar(6) NOT NULL DEFAULT '',
  `boxbg` varchar(6) NOT NULL DEFAULT '',
  `bgurl` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `ibwf_mainthemes`
--

INSERT INTO `ibwf_mainthemes` (`id`, `name`, `iconset`, `bgc`, `txc`, `lnk`, `hdc`, `hbg`, `boxbg`, `bgurl`) VALUES
(8, 'error', 1, 'ccffcc', '336600', 'ff6600', 'ffffff', '6699cc', 'ffffff', ''),
(2, 'Blue', 2, '0066cc', '99ccff', '003366', '3366cc', '99ccff', '3366cc', 'images/css/blue.gif'),
(3, 'Black to White', 3, '333333', 'ffffff', '666666', '000000', 'ffffff', '000000', ''),
(4, 'Red', 4, 'ff0000', '660000', '663333', 'ffffff', '660000', 'ffffff', 'images/css/red.gif'),
(5, 'Green', 5, '66cc66', '339900', '003300', 'ccffcc', '339900', 'ccffcc', ''),
(6, 'Steal', 6, 'e7e7e7', '6E7B8B', '000000', 'CAE1FF', '6E7B8B', 'CAE1FF', ''),
(7, 'Opera WML', 7, 'cccccc', '000000', '0000FF', 'FFFFFF', '000000', 'eeeeee', ''),
(1, 'SriMobile', 8, 'CCFFFF', '080000', '9900FF', 'daf2f1', '0000FF', 'FFFFFF', ''),
(9, 'Grey Orange', 9, '555555', 'EEEEEE', 'FF9966', '000000', 'CECECE', '666666', 'images/css/orenge.gif'),
(10, 'Pinky', 10, 'FF00CC', 'FFFFFF', '000000', 'FF00CC', '000000', 'cc33cc', ''),
(11, 'Matrix', 11, '000000', '009900', '00FF00', '000000', '009900', '333333', ''),
(12, 'Goth', 12, '000000', 'FF0000', '00FF00', 'FFFFFF', '990000', '333333', ''),
(13, 'Night Pink', 13, '000000', 'EC2B78', 'FFCCCC', '000000', 'EC2B78', '330033', '');

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_mangr`
--

CREATE TABLE IF NOT EXISTS `ibwf_mangr` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `uid` int(100) NOT NULL DEFAULT '0',
  `gid` int(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_married`
--

CREATE TABLE IF NOT EXISTS `ibwf_married` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `frmuid` int(11) NOT NULL DEFAULT '0',
  `touid` int(11) NOT NULL DEFAULT '0',
  `agreed` char(1) NOT NULL DEFAULT '0',
  `refused` char(1) NOT NULL DEFAULT '0',
  `complete` char(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `ibwf_married`
--

INSERT INTO `ibwf_married` (`ID`, `frmuid`, `touid`, `agreed`, `refused`, `complete`) VALUES
(2, 3, 18, '1', '0', '1'),
(4, 8, 51, '0', '0', '0'),
(6, 78, 77, '1', '0', '1');

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_maxchat`
--

CREATE TABLE IF NOT EXISTS `ibwf_maxchat` (
  `uid` int(11) NOT NULL,
  `chat` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ibwf_maxchat`
--

INSERT INTO `ibwf_maxchat` (`uid`, `chat`, `time`) VALUES
(77, 4, 1412513754);

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_mlog`
--

CREATE TABLE IF NOT EXISTS `ibwf_mlog` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `action` varchar(10) NOT NULL DEFAULT '',
  `details` blob NOT NULL,
  `actdt` int(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=485 ;

--
-- Dumping data for table `ibwf_mlog`
--

INSERT INTO `ibwf_mlog` (`id`, `action`, `details`, `actdt`) VALUES
(240, 'shouts', 0x3c623e2d636865636b6d6174652d3c2f623e2044656c65746564207468652073686f7574203c623e3433393c2f623e202d202d636865636b6d6174652d3a20436861726765206d3064652c206265206261636b, 1250854797),
(241, 'shouts', 0x3c623e2d636865636b6d6174652d3c2f623e2044656c65746564207468652073686f7574203c623e3433393c2f623e202d203a20, 1250854829),
(242, 'handling', 0x3c623e66616974683c2f623e2068616e646c65642054686520504d2032323636, 1250857281),
(243, 'handling', 0x3c623e70696563653c2f623e2068616e646c65642054686520504d2032333631, 1250858484),
(244, 'handling', 0x3c623e70696563653c2f623e2068616e646c65642054686520504d2032333432, 1250858498),
(245, 'handling', 0x3c623e70696563653c2f623e2068616e646c65642054686520504d2032333335, 1250858515),
(246, 'penalties', 0x3c623e66616974683c2f623e2055706461746564203c623e726f6d656f3c2f623e20706c75737365732066726f6d203120746f20313031, 1250858585),
(247, 'shouts', 0x3c623e66616974683c2f623e2044656c65746564207468652073686f7574203c623e3437383c2f623e202d2072656c613a206e6168206c697374656e20746f206d6520616d20, 1250859601),
(248, 'shouts', 0x3c623e66616974683c2f623e2044656c65746564207468652073686f7574203c623e3437373c2f623e202d20726f6d656f3a2062742069206b6e7720646174207165656e656565, 1250859619),
(249, 'shouts', 0x3c623e66616974683c2f623e2044656c65746564207468652073686f7574203c623e3437363c2f623e202d20616c6578613a206d652061636863686120686f2e206b7961206b61, 1250859634),
(250, 'handling', 0x3c623e70696563653c2f623e2068616e646c65642054686520504d2032343539, 1250862962),
(251, 'handling', 0x3c623e70696563653c2f623e2068616e646c65642054686520504d2032343630, 1250862994),
(252, 'handling', 0x3c623e70696563653c2f623e2068616e646c65642054686520504d2032343631, 1250863007),
(253, 'handling', 0x3c623e70696563653c2f623e2068616e646c65642054686520504d2032343634, 1250863026),
(254, 'handling', 0x3c623e70696563653c2f623e2068616e646c65642054686520504d2032343635, 1250863040),
(255, 'handling', 0x3c623e70696563653c2f623e2068616e646c65642054686520504d2032343637, 1250863076),
(256, 'handling', 0x3c623e70696563653c2f623e2068616e646c65642054686520504d2032343734, 1250863090),
(257, 'handling', 0x3c623e70696563653c2f623e2068616e646c65642054686520504d2032343537, 1250863101),
(258, 'handling', 0x3c623e70696563653c2f623e2068616e646c65642054686520504d2032343534, 1250863115),
(259, 'handling', 0x3c623e70696563653c2f623e2068616e646c65642054686520504d2032343638, 1250864080),
(260, 'handling', 0x3c623e70696563653c2f623e2068616e646c65642054686520504d2032343733, 1250864086),
(261, 'penalties', 0x3c623e61646d696e3c2f623e204b69636b6564204f7574205468652075736572207269646572, 1250870192),
(262, 'penalties', 0x3c623e61646d696e3c2f623e204b69636b6564204f757420546865207573657220616c657861, 1250870271),
(263, 'shouts', 0x3c623e61646d696e3c2f623e2044656c65746564207468652073686f7574203c623e3532333c2f623e202d2061646d696e3a2057544620616c65786120697665206f6e6c792074, 1250871510),
(264, 'shouts', 0x3c623e7368616d69653c2f623e2044656c65746564207468652073686f7574203c623e3532313c2f623e202d20616c6578613a2072696465722075206b69636b206d652e202e7520, 1250871795),
(265, 'shouts', 0x3c623e7368616d69653c2f623e2044656c65746564207468652073686f7574203c623e3532343c2f623e202d2061646d696e3a20416e6420696d20736f727279, 1250871863),
(266, 'shouts', 0x3c623e7368616d69653c2f623e2044656c65746564207468652073686f7574203c623e3532323c2f623e202d2072656c613a20776861747320686170656e696e673f, 1250871905),
(267, 'penalties', 0x3c623e3c2f623e204b69636b6564204f7574205468652075736572202d636865636b6d6174652d, 1250879902),
(268, 'handling', 0x3c623e66616974683c2f623e2068616e646c65642054686520504d2032383933, 1250884089),
(269, 'handling', 0x3c623e66616974683c2f623e2068616e646c65642054686520504d2032383630, 1250884098),
(270, 'handling', 0x3c623e66616974683c2f623e2068616e646c65642054686520504d2032373834, 1250884110),
(271, 'handling', 0x3c623e66616974683c2f623e2068616e646c65642054686520504d2032373835, 1250884120),
(272, 'handling', 0x3c623e66616974683c2f623e2068616e646c65642054686520504d2032373836, 1250884129),
(273, 'handling', 0x3c623e66616974683c2f623e2068616e646c65642054686520504d2032373931, 1250884138),
(274, 'handling', 0x3c623e66616974683c2f623e2068616e646c65642054686520504d2032373934, 1250884148),
(275, 'handling', 0x3c623e66616974683c2f623e2068616e646c65642054686520504d2032373935, 1250884158),
(276, 'handling', 0x3c623e66616974683c2f623e2068616e646c65642054686520504d2032373936, 1250884178),
(277, 'handling', 0x3c623e66616974683c2f623e2068616e646c65642054686520504d2032373939, 1250884189),
(278, 'handling', 0x3c623e66616974683c2f623e2068616e646c65642054686520504d2032383230, 1250884200),
(279, 'handling', 0x3c623e66616974683c2f623e2068616e646c65642054686520504d2032383234, 1250884211),
(280, 'handling', 0x3c623e66616974683c2f623e2068616e646c65642054686520504d2032373630, 1250884222),
(281, 'handling', 0x3c623e66616974683c2f623e2068616e646c65642054686520504d2032343730, 1250884234),
(282, 'handling', 0x3c623e6d61726b5f3c2f623e2068616e646c65642054686520504d2032383936, 1250889188),
(283, 'handling', 0x3c623e6d61726b5f3c2f623e2068616e646c65642054686520504d2032373938, 1250889201),
(284, 'handling', 0x3c623e6d61726b5f3c2f623e2068616e646c65642054686520504d2032343532, 1250889227),
(285, 'handling', 0x3c623e6d61726b5f3c2f623e2068616e646c65642054686520504d2032343633, 1250889243),
(286, 'penalties', 0x3c623e61646d696e3c2f623e2055706461746564203c623e737069646572776562733c2f623e2062616e6b20637265646974732066726f6d203020746f2031303030, 1250889399),
(287, 'handling', 0x3c623e61646d696e3c2f623e2068616e646c65642054686520504d2032393234, 1250890357),
(288, 'handling', 0x3c623e70696563653c2f623e2068616e646c65642054686520504d2032373838, 1250892089),
(289, 'handling', 0x3c623e70696563653c2f623e2068616e646c65642054686520504d2032373839, 1250892100),
(290, 'handling', 0x3c623e70696563653c2f623e2068616e646c65642054686520504d2032383332, 1250892107),
(291, 'posts', 0x3c623e66616974683c2f623e2045646974656420506f7374204e756d62657220363831204f66207468652074687265616420526574726976657761702053746166662052756c65732061742074686520666f72756d2072657472697665207374616666, 1250896936),
(292, 'posts', 0x3c623e66616974683c2f623e2045646974656420506f7374204e756d62657220363831204f66207468652074687265616420526574726976657761702053746166662052756c65732061742074686520666f72756d2072657472697665207374616666, 1250896975),
(293, 'posts', 0x3c623e66616974683c2f623e2045646974656420506f7374204e756d62657220363931204f66207468652074687265616420526574726976657761702053746166662052756c65732061742074686520666f72756d2072657472697665207374616666, 1250897059),
(294, 'posts', 0x3c623e66616974683c2f623e2045646974656420506f7374204e756d62657220383636204f66207468652074687265616420526574726976657761702053746166662052756c65732061742074686520666f72756d2072657472697665207374616666, 1250898061),
(295, 'penalties', 0x3c623e7368616d69653c2f623e2055706461746564203c623e72656c613c2f623e20706c75737365732066726f6d203132373120746f2031343731, 1250899405),
(296, 'posts', 0x3c623e66616974683c2f623e2045646974656420506f7374204e756d62657220383739204f66207468652074687265616420526574726976657761702053746166662052756c65732061742074686520666f72756d2072657472697665207374616666, 1250900736),
(297, 'handling', 0x3c623e70696563653c2f623e2068616e646c65642054686520504d2033303336, 1250903832),
(298, 'handling', 0x3c623e70696563653c2f623e2068616e646c65642054686520504d2033303337, 1250903840),
(299, 'handling', 0x3c623e70696563653c2f623e2068616e646c65642054686520504d2033303432, 1250903846),
(300, 'handling', 0x3c623e70696563653c2f623e2068616e646c65642054686520504d2033303434, 1250903861),
(301, 'handling', 0x3c623e70696563653c2f623e2068616e646c65642054686520504d2033303530, 1250903870),
(302, 'handling', 0x3c623e70696563653c2f623e2068616e646c65642054686520504d2032383238, 1250903909),
(303, 'handling', 0x3c623e70696563653c2f623e2068616e646c65642054686520504d2033313534, 1250904247),
(304, 'handling', 0x3c623e70696563653c2f623e2068616e646c65642054686520504d2033313538, 1250904256),
(305, 'handling', 0x3c623e70696563653c2f623e2068616e646c65642054686520504d2033313633, 1250904268),
(306, 'handling', 0x3c623e70696563653c2f623e2068616e646c65642054686520504d2033323036, 1250904286),
(307, 'handling', 0x3c623e70696563653c2f623e2068616e646c65642054686520504d2033313433, 1250904305),
(308, 'handling', 0x3c623e70696563653c2f623e2068616e646c65642054686520504d2033303933, 1250904340),
(309, 'handling', 0x3c623e70696563653c2f623e2068616e646c65642054686520504d2033303938, 1250904349),
(310, 'handling', 0x3c623e70696563653c2f623e2068616e646c65642054686520504d2033313431, 1250904374),
(311, 'handling', 0x3c623e70696563653c2f623e2068616e646c65642054686520504d2033303032, 1250904389),
(312, 'handling', 0x3c623e70696563653c2f623e2068616e646c65642054686520504d2032393939, 1250904402),
(313, 'handling', 0x3c623e70696563653c2f623e2068616e646c65642054686520504d2032383031, 1250904430),
(314, 'handling', 0x3c623e70696563653c2f623e2068616e646c65642054686520504d2032383033, 1250904539),
(315, 'handling', 0x3c623e70696563653c2f623e2068616e646c65642054686520504d2032383137, 1250904552),
(316, 'handling', 0x3c623e66616974683c2f623e2068616e646c65642054686520504d2033313535, 1250905392),
(317, 'handling', 0x3c623e66616974683c2f623e2068616e646c65642054686520504d2033313434, 1250905404),
(318, 'handling', 0x3c623e66616974683c2f623e2068616e646c65642054686520504d2033313435, 1250905446),
(319, 'handling', 0x3c623e66616974683c2f623e2068616e646c65642054686520504d2033313436, 1250905475),
(320, 'handling', 0x3c623e66616974683c2f623e2068616e646c65642054686520504d2033313438, 1250905487),
(321, 'handling', 0x3c623e66616974683c2f623e2068616e646c65642054686520504d2033303839, 1250905503),
(322, 'handling', 0x3c623e66616974683c2f623e2068616e646c65642054686520504d2033303930, 1250905519),
(323, 'topics', 0x3c623e7368616d69653c2f623e20456469746564207468652074657874204f6620746865207468726561642050696e6f792047616d65206b61206e2062613f2061742074686520666f72756d206365727469666965642070617361776179, 1250909524),
(324, 'handling', 0x3c623e66616974683c2f623e2068616e646c65642054686520504d2033323930, 1250912723),
(325, 'handling', 0x3c623e66616974683c2f623e2068616e646c65642054686520504d2033323834, 1250912733),
(326, 'handling', 0x3c623e66616974683c2f623e2068616e646c65642054686520504d2033313630, 1250912743),
(327, 'handling', 0x3c623e66616974683c2f623e2068616e646c65642054686520504d2033313634, 1250912752),
(328, 'handling', 0x3c623e66616974683c2f623e2068616e646c65642054686520504d2033313635, 1250912761),
(329, 'handling', 0x3c623e66616974683c2f623e2068616e646c65642054686520504d2033313638, 1250912778),
(330, 'handling', 0x3c623e66616974683c2f623e2068616e646c65642054686520504d2033313732, 1250912786),
(331, 'handling', 0x3c623e66616974683c2f623e2068616e646c65642054686520504d2033313935, 1250912817),
(332, 'handling', 0x3c623e66616974683c2f623e2068616e646c65642054686520504d2033313939, 1250912829),
(333, 'handling', 0x3c623e66616974683c2f623e2068616e646c65642054686520504d2033323030, 1250912843),
(334, 'handling', 0x3c623e66616974683c2f623e2068616e646c65642054686520504d2033323035, 1250912889),
(335, 'handling', 0x3c623e66616974683c2f623e2068616e646c65642054686520504d2033313437, 1250912911),
(336, 'handling', 0x3c623e66616974683c2f623e2068616e646c65642054686520504d2033303935, 1250912929),
(337, 'handling', 0x3c623e66616974683c2f623e2068616e646c65642054686520504d2033303939, 1250912939),
(338, 'handling', 0x3c623e66616974683c2f623e2068616e646c65642054686520504d2033313030, 1250912979),
(339, 'handling', 0x3c623e66616974683c2f623e2068616e646c65642054686520504d2033313033, 1250913005),
(340, 'handling', 0x3c623e66616974683c2f623e2068616e646c65642054686520504d2033313037, 1250913020),
(341, 'handling', 0x3c623e66616974683c2f623e2068616e646c65642054686520504d2033313330, 1250913031),
(342, 'handling', 0x3c623e66616974683c2f623e2068616e646c65642054686520504d2033313334, 1250913040),
(343, 'handling', 0x3c623e66616974683c2f623e2068616e646c65642054686520504d2033313335, 1250913059),
(344, 'handling', 0x3c623e66616974683c2f623e2068616e646c65642054686520504d2033313430, 1250913097),
(345, 'handling', 0x3c623e66616974683c2f623e2068616e646c65642054686520504d2033303338, 1250913116),
(346, 'handling', 0x3c623e66616974683c2f623e2068616e646c65642054686520504d2033303431, 1250913141),
(347, 'handling', 0x3c623e66616974683c2f623e2068616e646c65642054686520504d2033303438, 1250913152),
(348, 'handling', 0x3c623e66616974683c2f623e2068616e646c65642054686520504d2032383236, 1250913171),
(349, 'handling', 0x3c623e66616974683c2f623e2068616e646c65642054686520504d2032383330, 1250913186),
(350, 'handling', 0x3c623e66616974683c2f623e2068616e646c65642054686520504d2032383331, 1250913205),
(351, 'handling', 0x3c623e66616974683c2f623e2068616e646c65642054686520504d2032343731, 1250913216),
(352, 'handling', 0x3c623e66616974683c2f623e2068616e646c65642054686520504d2033313035, 1250913574),
(353, 'handling', 0x3c623e66616974683c2f623e2068616e646c65642054686520504d2033303435, 1250913582),
(354, 'handling', 0x3c623e66616974683c2f623e2068616e646c65642054686520504d2033333036, 1250914174),
(355, 'handling', 0x3c623e66616974683c2f623e2068616e646c65642054686520504d2033313730, 1250914193),
(356, 'handling', 0x3c623e6d61726b5f3c2f623e2068616e646c65642054686520504d2033313739, 1250915219),
(357, 'handling', 0x3c623e6d61726b5f3c2f623e2068616e646c65642054686520504d2033313134, 1250915247),
(358, 'handling', 0x3c623e6d61726b5f3c2f623e2068616e646c65642054686520504d2032383130, 1250915263),
(359, 'handling', 0x3c623e7368616d69653c2f623e2068616e646c65642054686520504d2033313637, 1250918060),
(360, 'handling', 0x3c623e7368616d69653c2f623e2068616e646c65642054686520504d2033313737, 1250918069),
(361, 'handling', 0x3c623e7368616d69653c2f623e2068616e646c65642054686520504d2033313032, 1250918088),
(362, 'handling', 0x3c623e7368616d69653c2f623e2068616e646c65642054686520504d2033313132, 1250918096),
(363, 'handling', 0x3c623e7368616d69653c2f623e2068616e646c65642054686520504d2033303430, 1250918113),
(364, 'handling', 0x3c623e7368616d69653c2f623e2068616e646c65642054686520504d2032383038, 1250918139),
(365, 'topics', 0x3c623e66616974683c2f623e2050696e6e65642054686520746872656164206269626c652073686f72742076657273653e292061742074686520666f72756d204269626c65206c6561726e696e67, 1250920633),
(366, 'handling', 0x3c623e66616974683c2f623e2068616e646c65642054686520504d2033313837, 1250920687),
(367, 'handling', 0x3c623e66616974683c2f623e2068616e646c65642054686520504d2033313232, 1250920717),
(368, 'handling', 0x3c623e66616974683c2f623e2068616e646c65642054686520504d2032383138, 1250920739),
(369, 'penalties', 0x3c623e7368616d69653c2f623e2055706461746564203c623e7368616d69653c2f623e20706c75737365732066726f6d2038393220746f203230383932, 1250922568),
(370, 'handling', 0x3c623e66616974683c2f623e2068616e646c65642054686520504d2033343338, 1250924683),
(371, 'handling', 0x3c623e66616974683c2f623e2068616e646c65642054686520504d2033343432, 1250924827),
(372, 'handling', 0x3c623e66616974683c2f623e2068616e646c65642054686520504d2033343435, 1250924909),
(373, 'handling', 0x3c623e66616974683c2f623e2068616e646c65642054686520504d2033313231, 1250924940),
(374, 'posts', 0x3c623e2d636865636b6d6174652d3c2f623e2045646974656420506f7374204e756d62657220393534204f6620746865207468726561642028706572536f4e616c2077617073697465292061742074686520666f72756d204861636b6572207a6f6e65, 1250925234),
(375, 'posts', 0x3c623e2d636865636b6d6174652d3c2f623e2044656c6574656420506f7374204e756d62657220393536204f6620746865207468726561642028706572536f4e616c2077617073697465292061742074686520666f72756d204861636b6572207a6f6e65, 1250925527),
(376, 'posts', 0x3c623e2d636865636b6d6174652d3c2f623e2045646974656420506f7374204e756d62657220393534204f6620746865207468726561642028706572536f4e616c2077617073697465292061742074686520666f72756d204861636b6572207a6f6e65, 1250925612),
(377, 'handling', 0x3c623e66616974683c2f623e2068616e646c65642054686520504d2033313836, 1250925752),
(378, 'handling', 0x3c623e66616974683c2f623e2068616e646c65642054686520504d2033343339, 1250926931),
(379, 'handling', 0x3c623e66616974683c2f623e2068616e646c65642054686520504d2033343431, 1250926947),
(380, 'handling', 0x3c623e66616974683c2f623e2068616e646c65642054686520504d2033343030, 1250926960),
(381, 'handling', 0x3c623e66616974683c2f623e2068616e646c65642054686520504d2033343436, 1250927063),
(382, 'posts', 0x3c623e2d636865636b6d6174652d3c2f623e2045646974656420506f7374204e756d62657220393534204f6620746865207468726561642028706572536f4e616c2077617073697465292061742074686520666f72756d204861636b6572207a6f6e65, 1250928677),
(383, 'posts', 0x3c623e2d636865636b6d6174652d3c2f623e2045646974656420506f7374204e756d62657220393534204f6620746865207468726561642028706572536f4e616c2077617073697465292061742074686520666f72756d204861636b6572207a6f6e65, 1250928701),
(384, 'posts', 0x3c623e61646d696e3c2f623e2045646974656420506f7374204e756d62657220393732204f6620746865207468726561642052455452495645574150204c494e4b5320414e4420544f504c4953542061742074686520666f72756d20537570706f7274206576656e7473, 1250933406),
(385, 'handling', 0x3c623e66616974683c2f623e2068616e646c65642054686520504d2033363236, 1250935258),
(386, 'handling', 0x3c623e66616974683c2f623e2068616e646c65642054686520504d2033363230, 1250935277),
(387, 'handling', 0x3c623e66616974683c2f623e2068616e646c65642054686520504d2033363138, 1250935289),
(388, 'handling', 0x3c623e66616974683c2f623e2068616e646c65642054686520504d2033363134, 1250935298),
(389, 'handling', 0x3c623e66616974683c2f623e2068616e646c65642054686520504d2033363130, 1250935311),
(390, 'handling', 0x3c623e66616974683c2f623e2068616e646c65642054686520504d2033353935, 1250935319),
(391, 'handling', 0x3c623e66616974683c2f623e2068616e646c65642054686520504d2033333539, 1250935332),
(392, 'handling', 0x3c623e66616974683c2f623e2068616e646c65642054686520504d2033323239, 1250935344),
(393, 'handling', 0x3c623e66616974683c2f623e2068616e646c65642054686520504d2033313533, 1250935367),
(394, 'handling', 0x3c623e66616974683c2f623e2068616e646c65642054686520504d2033323032, 1250935381),
(395, 'handling', 0x3c623e66616974683c2f623e2068616e646c65642054686520504d2033303838, 1250935393),
(396, 'handling', 0x3c623e66616974683c2f623e2068616e646c65642054686520504d2033313337, 1250935406),
(397, 'handling', 0x3c623e66616974683c2f623e2068616e646c65642054686520504d2032383333, 1250935418),
(398, 'posts', 0x3c623e2d636865636b6d6174652d3c2f623e2044656c6574656420506f7374204e756d62657220393537204f6620746865207468726561642052455452495645574150204c494e4b5320414e4420544f504c4953542061742074686520666f72756d20537570706f7274206576656e7473, 1250941443),
(399, 'shouts', 0x3c623e636173683c2f623e2044656c65746564207468652073686f7574203c623e3636333c2f623e202d20636173683a20e0b6bb32e0b6bbe0b790e0b6bbe0b790e0b6bb32, 1409137777),
(400, 'penalties', 0x3c623e636173683c2f623e204b69636b6564204f7574205468652075736572206272616e645f6e65775f732d6c2d6e, 1409138240),
(401, 'posts', 0x3c623ee0b6afe0b6b8e0b792e0b6ade0b78a3c2f623e2044656c6574656420506f7374204e756d62657220393830204f662074686520746872656164204c657473207374617220686572652061742074686520666f72756d204e657762696573, 1409139060),
(402, 'shouts', 0x3c623ee0b6afe0b6b8e0b792e0b6ade0b78a3c2f623e2044656c65746564207468652073686f7574203c623e3635383c2f623e202d2066616974683a203120636f7269746869616e732031333a20342d35, 1409590157),
(403, 'shouts', 0x3c623ee0b6afe0b6b8e0b792e0b6ade0b78a3c2f623e2044656c65746564207468652073686f7574203c623e3632343c2f623e202d20676869656c3a2063686174207461753f, 1409590173),
(404, 'shouts', 0x3c623ee0b6afe0b6b8e0b792e0b6ade0b78a3c2f623e2044656c65746564207468652073686f7574203c623e3633333c2f623e202d2066616974683a20636865636b2075722070686f746f20696e207468, 1409590178),
(405, 'shouts', 0x3c623ee0b6afe0b6b8e0b792e0b6ade0b78a3c2f623e2044656c65746564207468652073686f7574203c623e3636353c2f623e202d20e0b6afe0b6b8e0b792e0b6ade0b78a3a20, 1409593306),
(406, 'shouts', 0x3c623ee0b6afe0b6b8e0b792e0b6ade0b78a3c2f623e2044656c65746564207468652073686f7574203c623e3636353c2f623e202d203a20, 1409593311),
(407, 'shouts', 0x3c623ee0b6afe0b6b8e0b792e0b6ade0b78a3c2f623e2044656c65746564207468652073686f7574203c623e3636343c2f623e202d20e0b6afe0b6b8e0b792e0b6ade0b78a3a206464646464646464646464646464, 1409593391),
(408, 'shouts', 0x3c623ee0b6afe0b6b8e0b792e0b6ade0b78a3c2f623e2044656c65746564207468652073686f7574203c623e3636343c2f623e202d203a20, 1409593394),
(409, 'shouts', 0x3c623ee0b6afe0b6b8e0b792e0b6ade0b78a3c2f623e2044656c65746564207468652073686f7574203c623e3636323c2f623e202d20e0b6afe0b6b8e0b792e0b6ade0b78a3a20, 1409593464),
(410, 'shouts', 0x3c623ee0b6afe0b6b8e0b792e0b6ade0b78a3c2f623e2044656c65746564207468652073686f7574203c623e3636313c2f623e202d20e0b6afe0b6b8e0b792e0b6ade0b78a3a2026616d703b23333437333b26616d703b23333531353b26616d703b2333353135, 1409593469),
(411, 'Logo Valid', 0x3c623e434153483c2f623e2076616c69646174696e67204c6f676f203c623e323c2f623e20, 1409599141),
(412, 'Logo Valid', 0x3c623e434153483c2f623e2076616c69646174696e67204c6f676f203c623e323c2f623e20, 1409599213),
(413, 'posts', 0x3c623e434153483c2f623e2045646974656420506f7374204e756d62657220343637204f662074686520746872656164206d79207461696c732061742074686520666f72756d20416e696d616c20706c616e6574, 1409826642),
(414, 'posts', 0x3c623e434153483c2f623e2045646974656420506f7374204e756d62657220393831204f662074686520746872656164206d79207461696c732061742074686520666f72756d20416e696d616c20706c616e6574, 1409826662),
(415, 'posts', 0x3c623e434153483c2f623e2045646974656420506f7374204e756d62657220363337204f662074686520746872656164204c657473207374617220686572652061742074686520666f72756d204e657762696573, 1409826733),
(416, 'shouts', 0x3c623e434153483c2f623e2044656c65746564207468652073686f7574203c623e3636393c2f623e202d20434153483a20666f6c6465722e205b746f7069633d3131325d20, 1409830675),
(417, 'shouts', 0x3c623e434153483c2f623e2044656c65746564207468652073686f7574203c623e3636383c2f623e202d20434153483a20666f6c6465722e205b746f7069633d3634343730, 1409830679),
(418, 'shouts', 0x3c623e434153483c2f623e2044656c65746564207468652073686f7574203c623e3637373c2f623e202d20434153483a205b636c723d677265656e5d707070707070707070, 1409893222),
(419, 'shouts', 0x3c623e434153483c2f623e2044656c65746564207468652073686f7574203c623e3637363c2f623e202d20434153483a202e61727469636c652e205b6172743d32335d6d61, 1409893225),
(420, 'penalties', 0x3c623e434153483c2f623e20536869656c646564205468652075736572203c623e434153483c2f623e, 1409909622),
(421, 'penalties', 0x3c623e434153483c2f623e20556e736869656c646564205468652075736572203c623e434153483c2f623e, 1409909626),
(422, 'penalties', 0x3c623e434153483c2f623e2055706461746564203c623e434153483c2f623e2062616e6b20637265646974732066726f6d203230303120746f2032313031, 1409910325),
(423, 'penalties', 0x3c623e434153483c2f623e20536869656c646564205468652075736572203c623e434153483c2f623e, 1409910343),
(424, 'penalties', 0x3c623e434153483c2f623e2055706461746564203c623e434153483c2f623e20706c75737365732066726f6d203231343734373832363820746f2032313437343738333638, 1409910497),
(425, 'penalties', 0x3c623e434153483c2f623e2055706461746564203c623e434153483c2f623e20706c75737365732066726f6d203231343734373833363820746f2032313437343738343638, 1409910503),
(426, 'penalties', 0x3c623e434153483c2f623e2049502d42616e6e6564205468652075736572203c623e434153483c2f623e20466f72203630205365636f6e6473, 1409910749),
(427, 'penalties', 0x3c623e434153483c2f623e2054726173686564205468652075736572203c623e434153483c2f623e20466f72203630205365636f6e6473, 1409910754),
(428, 'penalties', 0x3c623e434153483c2f623e2042616e6e6564205468652075736572203c623e434153483c2f623e20466f72203630205365636f6e6473, 1409910758),
(429, 'penalties', 0x3c623e434153483c2f623e20556e74726173686564205468652075736572203c623e43415348, 1409910764),
(430, 'penalties', 0x3c623e434153483c2f623e20556e62616e6e6564205468652075736572203c623e434153483c2f623e, 1409910767),
(431, 'penalties', 0x3c623e434153483c2f623e20556e736869656c646564205468652075736572203c623e434153483c2f623e, 1409910771),
(432, 'shouts', 0x3c623e434153483c2f623e2044656c65746564207468652073686f7574203c623e3638303c2f623e202d2064616d6974683a205b636c723d676f6c645d61616161616161616161, 1409912675),
(433, 'Logo Valid', 0x3c623e434153483c2f623e2076616c69646174696e67204c6f676f203c623e313c2f623e20, 1410111551),
(434, 'penalties', 0x3c623e3c2f623e204b69636b6564204f75742054686520757365722043415348, 1411148598),
(435, 'shouts', 0x3c623e434153483c2f623e2044656c65746564207468652073686f7574203c623e3638323c2f623e202d2064616d6974683a205b636c723d677265656e5d6a6a6a6a6a6a6a6a6a, 1411155069),
(436, 'shouts', 0x3c623e434153483c2f623e2044656c65746564207468652073686f7574203c623e3638313c2f623e202d2064616d6974683a20, 1411155074),
(437, 'shouts', 0x3c623e434153483c2f623e2044656c65746564207468652073686f7574203c623e3638313c2f623e202d203a20, 1411155094),
(438, 'shouts', 0x3c623e434153483c2f623e2044656c65746564207468652073686f7574203c623e3637323c2f623e202d20434153483a20, 1411155101),
(439, 'shouts', 0x3c623e434153483c2f623e2044656c65746564207468652073686f7574203c623e3637333c2f623e202d20434153483a205b636c723d4f72616e67655d6661666164666673, 1411155104),
(440, 'penalties', 0x3c623e434153483c2f623e204b69636b6564204f7574205468652075736572206361736866, 1411304689),
(441, 'shouts', 0x3c623e434153483c2f623e2044656c65746564207468652073686f7574203c623e3731323c2f623e202d2064616d6974683a206563686f2026616d703b616d703b616d703b71756f743b26616d703b, 1411328582),
(442, 'shouts', 0x3c623e434153483c2f623e2044656c65746564207468652073686f7574203c623e3730343c2f623e202d2064616d6974683a206775796674727479727972796574726572746572, 1411328590),
(443, 'shouts', 0x3c623e434153483c2f623e2044656c65746564207468652073686f7574203c623e3730323c2f623e202d2064616d6974683a204b484b4a4c4a464c4a4b445a464c4448464b4c, 1411328597),
(444, 'penalties', 0x3c623e3c2f623e204b69636b6564204f75742054686520757365722043415348, 1411371464),
(445, 'shouts', 0x3c623e434153483c2f623e2044656c65746564207468652073686f7574203c623e3731313c2f623e202d2064616d6974683a206775796674727479727972796574726572746572, 1411386918),
(446, 'shouts', 0x3c623e434153483c2f623e2044656c65746564207468652073686f7574203c623e3731303c2f623e202d2064616d6974683a206563686f2026616d703b616d703b71756f743b26616d703b616d703b, 1411386921),
(447, 'penalties', 0x5b757365723d37375d434153485b2f757365725d204b69636b6564204f7574205468652075736572205b757365723d38315d63617368665b2f757365725d, 1411392114),
(448, 'penalties', 0x3c623e434153483c2f623e2042616e6e6564205468652075736572203c623e434153483c2f623e20466f7220313230205365636f6e6473, 1411396540),
(449, 'penalties', 0x3c623e434153483c2f623e2042616e6e6564205468652075736572203c623e434153483c2f623e20466f7220363030205365636f6e6473, 1411396719),
(450, 'penalties', 0x3c623e434153483c2f623e2042616e6e6564205468652075736572203c623e434153483c2f623e20466f7220363030205365636f6e6473, 1411397388),
(451, 'penalties', 0x3c623e434153483c2f623e2042616e6e6564205468652075736572203c623e434153483c2f623e20466f7220363030205365636f6e6473, 1411397394),
(452, 'penalties', 0x3c623e434153483c2f623e2042616e6e6564205468652075736572203c623e434153483c2f623e20466f7220363030205365636f6e6473, 1411398242),
(453, 'Logo Valid', 0x3c623e434153483c2f623e2076616c69646174696e67204c6f676f203c623e323c2f623e20, 1411499459),
(454, 'penalties', 0x3c623e434153483c2f623e2055706461746564203c623e434153483c2f623e2062616e6b20637265646974732066726f6d203131303020746f2032303939, 1411564902),
(455, 'penalties', 0x3c623e434153483c2f623e2055706461746564203c623e434153483c2f623e2062616e6b20637265646974732066726f6d203230393920746f2033303938, 1411564916),
(456, 'penalties', 0x3c623e434153483c2f623e2055706461746564203c623e434153483c2f623e2062616e6b20637265646974732066726f6d203330393820746f2034303937, 1411564918),
(457, 'penalties', 0x3c623e434153483c2f623e2055706461746564203c623e434153483c2f623e2062616e6b20637265646974732066726f6d203430393720746f2035303936, 1411564921),
(458, 'penalties', 0x3c623e434153483c2f623e2055706461746564203c623e434153483c2f623e2062616e6b20637265646974732066726f6d203530393620746f2036303935, 1411564923),
(459, 'penalties', 0x3c623e434153483c2f623e2055706461746564203c623e434153483c2f623e20706c75737365732066726f6d2035303120746f2031353030, 1411565032),
(460, 'penalties', 0x3c623e434153483c2f623e2055706461746564203c623e434153483c2f623e20706c75737365732066726f6d203135303020746f2032343939, 1411565036),
(461, 'penalties', 0x3c623e434153483c2f623e2055706461746564203c623e434153483c2f623e20706c75737365732066726f6d203234393920746f2033343938, 1411565038),
(462, 'penalties', 0x3c623e434153483c2f623e2055706461746564203c623e434153483c2f623e20706c75737365732066726f6d203334393820746f2034343937, 1411565040),
(463, 'penalties', 0x3c623e434153483c2f623e2055706461746564203c623e434153483c2f623e20706c75737365732066726f6d203434393720746f2035343936, 1411565043),
(464, 'penalties', 0x3c623e434153483c2f623e2055706461746564203c623e434153483c2f623e20706c75737365732066726f6d203534393620746f2036343935, 1411565046),
(465, 'penalties', 0x3c623e434153483c2f623e2055706461746564203c623e434153483c2f623e20706c75737365732066726f6d203634393520746f2037343934, 1411565048),
(466, 'penalties', 0x3c623e434153483c2f623e2055706461746564203c623e434153483c2f623e20706c75737365732066726f6d203734393420746f2038343933, 1411565050),
(467, 'penalties', 0x3c623e434153483c2f623e2055706461746564203c623e434153483c2f623e20706c75737365732066726f6d203834393320746f2039343932, 1411565053),
(468, 'penalties', 0x3c623e434153483c2f623e2055706461746564203c623e434153483c2f623e20706c75737365732066726f6d203934393220746f203130343931, 1411565055),
(469, 'handling', 0x3c623e434153483c2f623e2068616e646c65642054686520504d203134, 1411586016),
(470, 'handling', 0x3c623e434153483c2f623e2068616e646c65642054686520504d203133, 1411586021),
(471, 'penalties', 0x3c623e434153483c2f623e2055706461746564203c623e434153483c2f623e20706c75737365732066726f6d2033383120746f2031333830, 1411629058),
(472, 'penalties', 0x3c623e434153483c2f623e2055706461746564203c623e434153483c2f623e20706c75737365732066726f6d203133383020746f2032333739, 1411629062),
(473, 'penalties', 0x3c623e434153483c2f623e2055706461746564203c623e434153483c2f623e20706c75737365732066726f6d203233373920746f2033333738, 1411629064),
(474, 'penalties', 0x3c623e434153483c2f623e2055706461746564203c623e434153483c2f623e20706c75737365732066726f6d203333373820746f2034333737, 1411629071),
(475, 'penalties', 0x3c623e434153483c2f623e2055706461746564203c623e434153483c2f623e20706c75737365732066726f6d203433373720746f2035333736, 1411629077),
(476, 'penalties', 0x3c623e434153483c2f623e2055706461746564203c623e434153483c2f623e20706c75737365732066726f6d203533373620746f2036333735, 1411629083),
(477, 'shouts', 0x3c623e434153483c2f623e2044656c65746564207468652073686f7574203c623e3733313c2f623e202d20434153483a205945545945545945545952595959595959595959, 1411828674),
(478, 'shouts', 0x3c623e434153483c2f623e2044656c65746564207468652073686f7574203c623e3733313c2f623e202d203a20, 1411828674),
(479, 'shouts', 0x3c623e434153483c2f623e2044656c65746564207468652073686f7574203c623e3733323c2f623e202d2064616d6974683a206868686868686868686868686868686868686868, 1411828677),
(480, 'shouts', 0x3c623e434153483c2f623e2044656c65746564207468652073686f7574203c623e3732393c2f623e202d2064616d6974683a207378737878787878787878787878787878787878, 1411913870),
(481, 'shouts', 0x3c623e434153483c2f623e2044656c65746564207468652073686f7574203c623e3730313c2f623e202d2064616d6974683a206563686f207868746d6c666f6f7428293b, 1412143867),
(482, 'shouts', 0x3c623e434153483c2f623e2044656c65746564207468652073686f7574203c623e3734363c2f623e202d20434153483a206b6b6b6b6b6b6b6b6b6b6b6b6b6b6b6b6b, 1412354393),
(483, 'shouts', 0x3c623e434153483c2f623e2044656c65746564207468652073686f7574203c623e3736343c2f623e202d20434153483a20, 1412362457),
(484, 'shouts', 0x3c623e434153483c2f623e2044656c65746564207468652073686f7574203c623e3736353c2f623e202d20434153483a20, 1412362460);

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_modr`
--

CREATE TABLE IF NOT EXISTS `ibwf_modr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` int(100) NOT NULL DEFAULT '0',
  `forum` varchar(99) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_moods`
--

CREATE TABLE IF NOT EXISTS `ibwf_moods` (
  `id` int(99) NOT NULL AUTO_INCREMENT,
  `text` varchar(10) NOT NULL DEFAULT '',
  `img` varchar(100) NOT NULL DEFAULT '',
  `dscr` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `ibwf_moods`
--

INSERT INTO `ibwf_moods` (`id`, `text`, `img`, `dscr`) VALUES
(1, '[:-(]', 'moods/angry.gif', 'Angry'),
(2, '[:D]', 'moods/happy.gif', 'big grin'),
(3, '[:?]', 'moods/confused.gif', 'Confused'),
(4, '[8)]', 'moods/cool.gif', 'Cool'),
(5, '[=P]', 'moods/disgust.gif', 'Disgusts/ like yeah whatever'),
(6, '[:*]', 'moods/nasty.gif', 'Nasty/Drools'),
(7, '[>:)]', 'moods/evil.gif', 'Evil'),
(8, '[:/]', 'moods/careless.gif', 'Careless/Angry/Disappointed'),
(9, '[:(]', 'moods/sad.gif', 'Sad'),
(10, '[~:(]', 'moods/grr.gif', 'GRRR/Angry /Mad'),
(11, '[:8)]', 'moods/shy.gif', 'Shy/redface/blushing'),
(12, '[:O]', 'moods/retard.gif', 'Retard/eek/going huh'),
(13, '[:)]', 'moods/smile.gif', 'Smiling/Happy'),
(14, '[:,(]', 'moods/cry.gif', 'Crying'),
(15, '[x-(]', 'moods/dead.gif', 'Dead'),
(16, '[=D]', 'moods/happy.gif', 'Happy'),
(17, '[8(,]', 'moods/sick.gif', 'Sick/ Tired/ Sour'),
(18, '[3(]', 'moods/sleep.gif', 'Sleeping / Sleepy'),
(19, '[(:(]', 'moods/sorry.gif', 'Sorry');

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_mpot`
--

CREATE TABLE IF NOT EXISTS `ibwf_mpot` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `ddt` varchar(20) NOT NULL DEFAULT '',
  `dtm` varchar(20) NOT NULL DEFAULT '',
  `ppl` int(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `ibwf_mpot`
--

INSERT INTO `ibwf_mpot` (`id`, `ddt`, `dtm`, `ppl`) VALUES
(1, '17 08 09', '23:59:58', 2),
(2, '18 08 09', '12:46:07', 15),
(3, '19 08 09', '09:22:38', 9),
(4, '20 08 09', '15:24:53', 11),
(5, '21 08 09', '15:35:43', 17),
(6, '22 08 09', '14:14:35', 11),
(7, '26 08 14', '20:05:54', 1),
(8, '27 08 14', '11:31:39', 1),
(9, '01 09 14', '19:28:40', 1),
(10, '02 09 14', '18:41:13', 1),
(11, '03 09 14', '17:18:56', 2),
(12, '04 09 14', '18:49:27', 1),
(13, '05 09 14', '20:44:13', 1),
(14, '06 09 14', '19:57:10', 1),
(15, '07 09 14', '18:05:07', 1),
(16, '08 09 14', '12:49:28', 2),
(17, '19 09 14', '23:28:53', 2),
(18, '20 09 14', '19:05:28', 2),
(19, '21 09 14', '23:51:51', 1),
(20, '22 09 14', '20:53:07', 1),
(21, '23 09 14', '19:17:50', 2),
(22, '24 09 14', '21:30:02', 2),
(23, '25 09 14', '22:10:30', 1),
(24, '26 09 14', '23:51:52', 1),
(25, '27 09 14', '13:05:31', 2),
(26, '28 09 14', '13:17:51', 2),
(27, '29 09 14', '22:26:57', 1),
(28, '30 09 14', '22:40:33', 2),
(29, '01 10 14', '13:39:39', 1),
(30, '02 10 14', '23:59:28', 1),
(31, '03 10 14', '23:59:46', 1),
(32, '04 10 14', '00:35:29', 1),
(33, '05 10 14', '18:36:25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_mypage`
--

CREATE TABLE IF NOT EXISTS `ibwf_mypage` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `uid` int(100) NOT NULL DEFAULT '0',
  `mimg` varchar(200) NOT NULL DEFAULT '',
  `thid` int(100) NOT NULL DEFAULT '1',
  `msg` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uid` (`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ibwf_mypage`
--

INSERT INTO `ibwf_mypage` (`id`, `uid`, `mimg`, `thid`, `msg`) VALUES
(1, 38, '../avatars/105.gif', 0, ''),
(2, 77, '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_nicks`
--

CREATE TABLE IF NOT EXISTS `ibwf_nicks` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL DEFAULT '',
  `nicklvl` char(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_online`
--

CREATE TABLE IF NOT EXISTS `ibwf_online` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `userid` int(100) NOT NULL DEFAULT '0',
  `actvtime` int(100) NOT NULL DEFAULT '0',
  `place` varchar(50) NOT NULL DEFAULT '',
  `placedet` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `userid` (`userid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1215 ;

--
-- Dumping data for table `ibwf_online`
--

INSERT INTO `ibwf_online` (`id`, `userid`, `actvtime`, `place`, `placedet`) VALUES
(1214, 77, 1412514385, 'site Extras-xhtml', 'index.php?action=extra');

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_penalties`
--

CREATE TABLE IF NOT EXISTS `ibwf_penalties` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uid` int(100) NOT NULL DEFAULT '0',
  `penalty` char(1) NOT NULL DEFAULT '0',
  `exid` int(100) NOT NULL DEFAULT '0',
  `timeto` int(100) NOT NULL DEFAULT '0',
  `pnreas` varchar(100) NOT NULL DEFAULT '',
  `ipadd` varchar(30) NOT NULL DEFAULT '',
  `browserm` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_poke`
--

CREATE TABLE IF NOT EXISTS `ibwf_poke` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `pokid` int(11) NOT NULL,
  `view` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `ibwf_poke`
--

INSERT INTO `ibwf_poke` (`id`, `uid`, `pokid`, `view`, `time`) VALUES
(27, 77, 78, 1, 1411790031),
(28, 78, 77, 1, 1411790300),
(29, 77, 78, 1, 1411790471),
(30, 78, 77, 1, 1411790482),
(31, 77, 78, 1, 1411790691),
(32, 78, 77, 1, 1411792735),
(33, 77, 78, 1, 1411792753),
(34, 77, 78, 1, 1411792781),
(35, 78, 77, 1, 1411802705),
(36, 77, 78, 0, 1412358812);

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_poke_pack`
--

CREATE TABLE IF NOT EXISTS `ibwf_poke_pack` (
  `uid` int(11) NOT NULL,
  `poke` int(11) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ibwf_poke_pack`
--

INSERT INTO `ibwf_poke_pack` (`uid`, `poke`) VALUES
(77, 100),
(78, 400);

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_polls`
--

CREATE TABLE IF NOT EXISTS `ibwf_polls` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `pqst` varchar(255) NOT NULL DEFAULT '',
  `opt1` varchar(100) NOT NULL DEFAULT '',
  `opt2` varchar(100) NOT NULL DEFAULT '',
  `opt3` varchar(100) NOT NULL DEFAULT '',
  `opt4` varchar(100) NOT NULL DEFAULT '',
  `opt5` varchar(100) NOT NULL DEFAULT '',
  `pdt` int(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `ibwf_polls`
--

INSERT INTO `ibwf_polls` (`id`, `pqst`, `opt1`, `opt2`, `opt3`, `opt4`, `opt5`, `pdt`) VALUES
(1, 'are you pasaway?', 'YES', 'N0', '', '', '', 1250626921),
(5, '1. What do u think who wil be the majority wapper''s in retrivewap?', 'girl''s', 'boy''s', 'lesbian''s', 'gay''s', 'both 1-4.', 1250721769),
(3, 'What do you think about RETRIVIWAP??', 'Getting better?', 'Getting worst?', 'No c0mment!', '', '', 1250636007),
(4, 'is it true that girls work more than boys?', 'yes', 'no ', 'maybe', 'it depends', 'dnt care!whatever.', 1250666547);

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_pops`
--

CREATE TABLE IF NOT EXISTS `ibwf_pops` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `text` blob NOT NULL,
  `byuid` int(100) NOT NULL DEFAULT '0',
  `touid` int(100) NOT NULL DEFAULT '0',
  `unread` char(1) NOT NULL DEFAULT '1',
  `timesent` int(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `ibwf_pops`
--

INSERT INTO `ibwf_pops` (`id`, `text`, `byuid`, `touid`, `unread`, `timesent`) VALUES
(1, 0x48656c6c6f20686f77206172652075, 1, 0, '1', 1250620133),
(2, 0x2e6d737461207030682e2e7368617265206372656469747320616d616e20706f682e2e, 28, 0, '1', 1250667746),
(3, 0x48656c6f20636e637861206e612068612c206e61672073686f7464776e206b632062676c6120616e67206370206b6f2065682e, 29, 0, '1', 1250681638),
(4, 0x692077616e61206372792c206e61616c616c61206b6f2063206d616d6920626865, 15, 0, '1', 1250692686),
(5, 0x426162792068306e6579206d6168616c206b6974612c20696b6177206e61206e676120776c61206e6720696261202e6d757369632e2048656865206c3076652075206d6168616c207175, 11, 0, '1', 1250697233),
(6, 0x4d6168616c2074657374206b6f20706f70207570, 11, 0, '1', 1250699208),
(7, 0x47756d6167616e61206220706f7075703f, 11, 0, '1', 1250756865),
(8, 0x6d7761682c626865, 15, 0, '1', 1250779086),
(9, 0x546a6d616a74, 21, 0, '1', 1250819629),
(10, 0x786f7269, 15, 0, '1', 1250896002),
(11, 0x486170692062646179206d69652c616e752068616e6461206d753f, 13, 0, '1', 1250916941),
(12, 0x4f6b206279652069206d20676e67206e772e2054616b20637265206661747475, 26, 0, '1', 1250928814),
(13, 0x5f, 77, 0, '1', 1409763403),
(14, 0x5f, 77, 0, '1', 1409763408),
(15, 0x6164676667666467646667646667646667646764, 77, 0, '1', 1409763457),
(16, 0x6164676667666467646667646667646667646764, 77, 0, '1', 1409763473),
(17, '', 77, 0, '1', 1409763479);

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_popups`
--

CREATE TABLE IF NOT EXISTS `ibwf_popups` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `text` blob NOT NULL,
  `byuid` int(100) NOT NULL DEFAULT '0',
  `touid` int(100) NOT NULL DEFAULT '0',
  `unread` char(1) NOT NULL DEFAULT '1',
  `timesent` int(100) NOT NULL DEFAULT '0',
  `reported` char(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=272 ;

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_posts`
--

CREATE TABLE IF NOT EXISTS `ibwf_posts` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `text` blob NOT NULL,
  `tid` int(100) NOT NULL DEFAULT '0',
  `uid` int(100) NOT NULL DEFAULT '0',
  `image` varchar(250) NOT NULL,
  `dtpost` int(100) NOT NULL DEFAULT '0',
  `reported` char(1) NOT NULL DEFAULT '0',
  `quote` int(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1013 ;

--
-- Dumping data for table `ibwf_posts`
--

INSERT INTO `ibwf_posts` (`id`, `text`, `tid`, `uid`, `image`, `dtpost`, `reported`, `quote`) VALUES
(1, 0x5b625d77306e64457266756c20736974652e2e4c6f76652069745b2f625d, 1, 5, '', 1250549806, '0', 0),
(2, 0x6261676f6e6720616869742077616161682068616b2068616b, 3, 8, '', 1250551554, '0', 0),
(3, 0x776168616861206267306e4720616849743f7361416e3f68616861, 3, 5, '', 1250551909, '0', 0),
(4, 0x2e64616e63652e20202e746f6d61746f2e20686f7965792120616e67617421, 1, 8, '', 1250551944, '0', 0),
(5, 0x7361206b696c69206b696c6120776168616b2068616b20, 3, 8, '', 1250552001, '0', 0),
(6, 0x306b65692e2e46ed6e652068656865, 2, 5, '', 1250552123, '0', 0),
(7, 0x4d79206274612064746f2e656865, 3, 3, '', 1250553681, '0', 0),
(8, 0x49276d206d616d61206675636b697374616e6920686568652e, 4, 3, '', 1250554517, '0', 0),
(9, 0x6168206d79206e657773206168656d206272622034206d3072652064657461696c73, 2, 8, '', 1250559809, '0', 0),
(10, 0x6f707a206d617920626174612e626162792e, 3, 8, '', 1250559976, '0', 0),
(11, 0x535441464620415245204e305420414c4c4f5744, 9, 8, '', 1250560235, '0', 0),
(12, 0x486168612e2e2e2e4e536e20616e6720624162793f, 3, 5, '', 1250560299, '0', 0),
(13, 0x4e696365206a306220706e302079616e3f68616861, 5, 5, '', 1250560431, '0', 0),
(14, 0x616e64306e207861206d756d6d79206e7961202e726f6c6c2e, 3, 8, '', 1250560483, '0', 0),
(15, 0x4e696365206a306220706e302079616e3f68616861, 5, 5, '', 1250560497, '0', 0),
(16, 0x642071206d627361206b757274202e6b69636b2e2070616b69206578706c61696e2e, 5, 8, '', 1250560529, '0', 0),
(17, 0x796f757220616c6c20746861742069206e65656420627920626f797a306e65, 8, 8, '', 1250560629, '0', 0),
(18, 0x757064617465206578706f7365206b676269207361207061736177617972756d206d6179203220636c612062616265732073612073706972697475616c72756d2073696c612068306e65796269652073612073686f7574626f7820632070616c616b612073756d69736761572021202e726f6c6c2e20677565732077686f21, 6, 8, '', 1250560718, '0', 0),
(19, 0x6261676f20616b6f, 3, 6, '', 1250561141, '0', 0),
(20, 0x506f70207570206d7367206973206e6f7420776f726b696e672c20706c7a20666978206974, 10, 11, '', 1250565904, '0', 0),
(21, 0x646f776e6c6f61647a206973206e307420776f726b696e6720706c732074616b652061206c6f306b, 10, 8, '', 1250566523, '0', 0),
(22, 0x505249564154452052554d204552524f522c20796f752063616e7420656e746572207468652072756d206576656e20796f7520656e7465722074686520636f72726563742070617373776f72642c20706c7a20636865636b2069745b62722f5d5b62722f5d7570646174653d20776f726b696e672066696e65206e6f77, 10, 11, '', 1250566851, '0', 0),
(23, 0x706f737420643220616b6f, 11, 8, '', 1250566879, '0', 0),
(24, 0x4179612061796120776c61206220676c3062652068616b68616b, 9, 5, '', 1250567514, '0', 0),
(25, 0x6368616e676520746865204a4f494e2041572c2041524157415020434841542c20415241574150204241424520616e642061726177617020626e6b2e204152415741502053484f502e, 10, 8, '', 1250568308, '0', 0),
(26, 0x50726573656e742c2070617861776179206e6720626179616e202e74656574682e, 11, 11, '', 1250569369, '0', 0),
(27, 0x2e6c616c612e20686168616861, 11, 8, '', 1250569440, '0', 0),
(28, 0x52657472697665, 15, 13, '', 1250573424, '0', 0),
(29, 0x457863656c6c656e74, 15, 13, '', 1250573499, '0', 0),
(30, 0x457863656c6c656e74, 15, 13, '', 1250573576, '0', 0),
(31, 0x47656e65736973, 18, 8, '', 1250575738, '0', 0),
(32, 0x5075726974616e69612062792044696d6d7520426f72676972, 8, 14, '', 1250575774, '0', 0),
(33, 0x506572736f6e616c20616c62756d206973206e6f7420776f726b696e672c20646f6e74206b6e6f77206966206974732064697361626c65206f72206e6f74207265616c6c7920776f726b696e67, 10, 11, '', 1250576351, '0', 0),
(34, 0x696d206e657720686972, 3, 14, '', 1250577263, '0', 0),
(35, 0x666173742e70683f206e6963652031212070776564652072696e2079746120616e67206d326d206174206d61696c32, 5, 14, '', 1250577333, '0', 0),
(36, 0x6461706174206d757261206e20616e672062616c75742061742070656e6f792e20647469206b63205036202d2050372062777420697361207065726f206e6761756e206e736120503133206e20616e6720697361, 17, 14, '', 1250577484, '0', 0),
(37, 0x6432206e61206d652e202e202e686168616861202e7572612e202e67756e2e, 11, 10, '', 1250579878, '0', 0),
(38, 0x6d6f6e6963612073617927732070726573656e74, 20, 10, '', 1250580185, '0', 0),
(39, 0x2c6432206d65206e7727, 11, 13, '', 1250580433, '0', 0),
(40, 0x32, 21, 10, '', 1250580529, '0', 0),
(41, 0x616d206865726520, 11, 12, '', 1250580570, '0', 0),
(42, 0x2c706170616d70616d3f6920646f6e74206b6e77206162777420697421, 12, 13, '', 1250580697, '0', 0),
(43, 0x50757368696e67206d7973656c662066726f6d2061206d6f756e7461696e20636c6966662e202e726f6c6c2e202e6b69636b2e, 22, 10, '', 1250580788, '0', 0),
(44, 0x6168656865, 17, 12, '', 1250581114, '0', 0),
(45, 0x2e726f6c6c2e20486168612062616c6f7420262070656e6f79206470617420746c61676120696261626120616e672070726573796f207061626f7269746f206b6f206b632079616e202e74656574682e2050617469206269676173206174206d6761206261676f6e67204350206d6f64656c202e6c617567682e, 17, 11, '', 1250581175, '0', 0),
(46, 0x57686174277320696e2041204e616d652020546865206e616d6520446176616f207761732070726f6261626c7920646572697665642066726f6d20746865204261676f626f20776f72642022446162612d6461626122207768696368206d65616e732022666972652e2220546865206561726c79204a65737569742070726965737473207265666572656420746f207468697320706c616365206173206120726567696f6e206f6620666c616d6573206f722066697265206173207265636f7264656420696e207468656972206561726c7920626f6f6b732e204d616e79206e6174697665732c20686f77657665722c2062656c69657665207468617420746865206e616d6520446176616f2077617320646572697665642066726f6d2074686520677265617420726976657220776869636820746865206561726c79205461676162617761207472696265207265666572656420746f20617320446162752e20, 16, 14, '', 1250581431, '0', 0),
(47, 0x2e746f6d61746f2e, 24, 10, '', 1250581472, '0', 0),
(48, 0x53616e204d6174656f2c2052697a616c202846696c6970696e6f3a20426179616e206e672053616e204d6174656f2c204c616c61776967616e206e672052697a616c206f722073696d706c792053616e204d6174656f29206973206120666972737420636c61737320757262616e206d756e69636970616c697479206f662052697a616c2050726f76696e63652e204c6f6361746564206f6e207468652069736c616e64206f66204c757a6f6e2c2053616e204d6174656f206973206f6e65206f66203133206d756e69636970616c697469657320616e642061206361706974616c20636974792074686174206d616b65207570207468652050726f76696e6365206f662052697a616c2c20526567696f6e20342d41202843616c616261727a6f6e20526567696f6e29206f6620746865205068696c697070696e65732e2053616e204d6174656f2069732070617274206f6620746865204d6574726f204c757a6f6e20557262616e2042656c747761792e204d6574726f204c757a6f6e20697320636f6d706f736564206f6620526567696f6e20332c20526567696f6e20342d41202843414c414241525a4f4e2920616e6420746865206e6561726279204e6174696f6e616c204361706974616c20526567696f6e20284e4352292e204d6574726f204c757a6f6e206973206f6e65206f6620, 16, 14, '', 1250581519, '0', 0),
(49, 0x4865686568652c6f6b21, 13, 13, '', 1250581660, '0', 0),
(50, 0x506c7a20616464204a4e502072756d2069747a2066756e2e204368617474696e67207768696c652067616d626c696e67202e726f6c6c2e, 25, 11, '', 1250581714, '0', 0),
(51, 0x49207375676765737420746861742c206e65776c792072656769737465726564206d656d6265722073686f756c6420626520676976656e20313030206672656520637265646974732e20342073686f7574696e672034706f736573, 25, 11, '', 1250581924, '0', 0),
(52, 0x7461656b2077616e20646f, 7, 8, '', 1250582048, '0', 0),
(53, 0x5b625d576974686f7574206c6f766520616d206c696b65206120656d7074792070616765206f6620626f306b2077616974696e6720342073306d653120746f20777269746520696e2069745b2f625d, 29, 8, '', 1250582222, '0', 0),
(54, 0x546f70205448454d4553206e65656420746f206368616e6765207468652041524157415020746f2072657472697665776170, 10, 10, '', 1250582276, '0', 0),
(55, 0x4d6167207472616261686f206d756e6120616b6f2c2074706f73207061672074696e67696e206b6f206d64616d69206e6b6f20706572612e2049746174616b6173206b6f20756e67204746206b6f206268616c6120636c616e67206d61672068616e6170616e2062737461206f6b206b6d69206e67204746206b6f202e686568652e202e677564626f792e, 30, 11, '', 1250582721, '0', 0),
(56, 0x63656c6562726174696f6e207361206d676120626461792063656c656272616e7473206432, 25, 14, '', 1250582762, '0', 0),
(57, 0x3136306279322e636f6d204652454520746f206a6f696e2063616e2073656e642035306d7367732e2f6461792077697468203830206368617261637465727320746578742e20546f696e7821207520636e2073656e6420746f20494e4449412c2053494e4741504f52452c205048494c495050494e45532c204d414c41595349412e, 5, 10, '', 1250582996, '0', 0),
(58, 0x50726f76656e20616e64207465737465642e202e202e6669742e20576f726b696e6720746f20746865206c6576656c2e, 5, 10, '', 1250583078, '0', 0),
(59, 0x416e6420616c736f206d326d20776f726b696e6720746f20746865206d61782e202e6669742e, 5, 10, '', 1250583154, '0', 0),
(60, 0x49276d206e30742061207374616666206861686168616861204a4f494e2061712e202e202e7073737421207068697a202862756c6f6e67206d6f646529206d672e72657369676e206d756e6120707261206d6b73616c692070676b7470307a206970626c696b206e206b61616761642e202e68616861686168616861202e726f6c6c2e, 9, 10, '', 1250583356, '0', 0),
(61, 0x513a20616e306e67206b61696268616e206e672062696f6c6f677920736120736f63696f6c6f67793f205b62722f5d205b62722f5d20414e533a2070616720616e6720627461206b616d756861206e67206d6167756c616e672062696f6c6f6779202c207065726f2070616720616e6720627461206b616d756b6861206e67206b617069746268617920746861747a20736f63696f6c6f6779202e726f6c6c2e, 37, 8, '', 1250583406, '0', 0),
(62, 0x6d616d6879206261676f206171206c696475202e626174682e2064616d69742071206174696e206e61416821202e726f6c6c2e202e6c617567682e, 3, 10, '', 1250583516, '0', 0),
(63, 0x68616861686168616861202e636f6e667573652e20, 38, 10, '', 1250583717, '0', 0),
(64, 0x6d65726f6e20706f20616b6f6e672062616c626173, 38, 14, '', 1250583733, '0', 0),
(65, 0x686168616861686120776c61206171276e672062617261626173207461792073306b30792e202e202e776578697421, 38, 10, '', 1250583797, '0', 0),
(66, 0x427269656620686168612e202e202e204367757261646f20776c61206b61206e756e202e74656574682e202e677564626f792e, 38, 11, '', 1250583825, '0', 0),
(67, 0x6d72306e2061712062697274686d61726b2073206b616d6179207072616e672072656c6f2079306e672062696c6f672073612072656c6f2068656865206e78612072696768742068616e6420712e202e202e706d706c2e, 38, 10, '', 1250583896, '0', 0),
(68, 0x2e70756e63682e20686168616861686168612062616261652061712e202e6e616e616e616e61202e746f6d61746f2e, 38, 10, '', 1250584007, '0', 0),
(69, 0x70616c656e676b6520617420706f776465722072756d20706c732070616b6920616464202e726f6c6c2e, 25, 8, '', 1250584077, '0', 0),
(70, 0x4e6b6b61206367726f20617120616e6720737573756e4f6420774c616e67204252412068616861686168616861202e726f6c6c2e, 38, 10, '', 1250584087, '0', 0),
(71, 0x576861743f203f203f2e636f6e667573652e, 15, 10, '', 1250584222, '0', 0),
(72, 0x2e726f6c6c2e203277616420616c61206b61752062756e743074207761686168616861, 38, 8, '', 1250584296, '0', 0),
(74, 0x6168656d4d6d2e202e202e6178616e206e20747262686f206d4f20684f6e3f204861686168616861202e70756e63682e, 30, 10, '', 1250584401, '0', 0),
(75, 0x4d656469756d20626f6f62732026206d656469756d206275747420697320626573742034206d652e202e202e20596177206b75206e672055424552206e6b6b616c756e6f64202e74656574682e202e677564626f792e, 36, 11, '', 1250584426, '0', 0),
(76, 0x2e726f6c6c2e207761686168616b2068616b20, 3, 8, '', 1250584438, '0', 0),
(77, 0x7761686168616861686168612061726f79207120706f207761686168612074616e616e20616e67206c61626173206e69746f206861686168612e726f6c6c2e202e746f6d61746f2e20, 30, 8, '', 1250584543, '0', 0),
(78, 0x54686572652773206e4f7468696e672077724f6e6720696e206265696e672062697474657220726d6d62722e202e202e6d65646963696e657320757375616c6c792074617374652062697474657220627574206974206d616b65277320752077656c6c2e, 29, 10, '', 1250584546, '0', 0),
(79, 0x617065, 42, 2, '', 1250584568, '0', 0),
(80, 0x4175677573742032312c6672696461792074686520676f7665726e6d656e74206465636c6172656420746861742077652068617665206e302e7061786f6b2068656865, 2, 3, '', 1250584640, '0', 0),
(81, 0x2e6c616c612e2061686168616861207765682070617261206b616e67206e61647061206e2064206e6173616b74616e207061672073757065726220626967207761686168616861206c756e3064206e61206c756e3064207761686168612e726f6c6c2e, 36, 8, '', 1250584653, '0', 0),
(82, 0x636174, 43, 2, '', 1250584735, '0', 0),
(83, 0x776174207061783f, 2, 8, '', 1250584835, '0', 0),
(84, 0x4920646f6e74206c796b206279696e672061206272616e6465642050432e2069206c696b6520627579696e67207468656d2070617274732062792070617274732e204275742068657265206973206d79206c697374206f66206272616e6473207065722070617274732e202e202e204350553d20414d4420636f7a20494d20412047414d45522e202e204d424f4152443d20524544464f58206f72204543532e202e202e2052414d3d204b494e4753544f4e2e202e202e204844443d20534541474154452e202e202e2047524150484943533d204e564944494120474658, 41, 11, '', 1250584915, '0', 0),
(85, 0x2e636e7520706f206b61753f206261676f206c6e6720707568206b6320617175206432207765682e2e207844, 3, 18, '', 1250584935, '0', 0),
(86, 0x57616861686168612c206e617461776120616b752073796f2052454c4120686568652c, 38, 11, '', 1250585140, '0', 0),
(87, 0x77656568206268616c61206b61206a616e202c20686168612e726f6c6c2e20627374612062696c69206171206e307465626f306b206675746a69736875205034202c63656e7472696e6f2064756f202c20696e74656c20696e73696465207761686168616861686120313074206d687a20686168616861, 41, 8, '', 1250585198, '0', 0),
(88, 0x41682065682c206d6168616c20692074616e616e206d75206e6120616b752c206e6b612068616e6461206e61206d67612064616d6974206b6f206b656c616e206d75206220616b7520737573756e6475696e20736d696e202e726f6c6c2e, 30, 11, '', 1250585277, '0', 0),
(89, 0x6e796168616861686168612e202e202e2e746f6d61746f2e20646f6d656e672061686168612e6b69636b2e, 30, 8, '', 1250585368, '0', 0),
(90, 0x686e6420617120636c6f776e2e6b69636b2e20776c61206b61206e306e20776168616861, 38, 8, '', 1250585418, '0', 0),
(91, 0x506c732070616c616779616e206e6d616e206e67204c41535420504f535445522026204c41535420544f5049432064756e2073204d41494e20504147452073612074616173206e67204c41535420313020504f5354, 25, 11, '', 1250585512, '0', 0),
(92, 0x776c6120636c616e67206d67676177612c2064637379306e207120616e67206d7375326e30642e21202e6c6f6c2e, 30, 16, '', 1250585602, '0', 0),
(93, 0x70616c616761792064696e206e67206e307469666963617469306e20662073306d6531206a6f696e206d7920636c7562, 25, 8, '', 1250585603, '0', 0),
(94, 0x6e6469206171206230792070726f2069207468696e6b20697473206263307a20617977206e6c616e67206970616b7461206e61206d68696e6120636c612e2e, 31, 16, '', 1250585766, '0', 0),
(95, 0x6e6765686b6b2c2e20486168612e2e20417977616e20712064696e, 33, 16, '', 1250585854, '0', 0),
(96, 0x47616d696e67204c4150544f5020706173616c75626f6e67206b6f206b6179206461647920617261626f206b63202e677564626f792e20416b6f202e74656574682e20, 41, 11, '', 1250585924, '0', 0),
(97, 0x6b617961206e6761207065726f20616e672074727565206979616b2070616c61207861207461676f202e726f6c6c2e, 31, 8, '', 1250585962, '0', 0),
(98, 0x776168616861686120707370206f72204e44533f206e7961686168616861202c636f6d7075746572206220756e3f2074616d61676f74636865206e6c616e67206776652071207361753f204064616f2064616f2e726f6c6c2e, 41, 8, '', 1250586172, '0', 0),
(99, 0x576f77206c686174206432206e612120686d6d20616e6f206b796120736120616b696e3f202e7468696e6b2e, 25, 12, '', 1250586428, '0', 0),
(100, 0x4f6b, 1, 12, '', 1250586515, '0', 0),
(101, 0x48656865, 2, 12, '', 1250586569, '0', 0),
(102, 0x4c756d61206e61206c68617420643220616c61206e61206261676f2061686568652121, 3, 12, '', 1250586757, '0', 0),
(103, 0x5265616c6c793f20747279, 5, 12, '', 1250586918, '0', 0),
(104, 0x616d206e307420737461666620746f6f206865686520736f206a6f696e206d65, 9, 12, '', 1250587007, '0', 0),
(105, 0x4e79617920636865636b6d617465206865686520632075722074656574682064726f7020616c7265616479207361206b6132696e206e672062616c6f742068616861, 17, 12, '', 1250587132, '0', 0),
(106, 0x41686568652074676120626f726120616b6f, 4, 12, '', 1250587229, '0', 0),
(107, 0x576861742061626f7574206e77206279206461756768747279, 8, 12, '', 1250587321, '0', 0),
(108, 0x4875683f, 6, 12, '', 1250587432, '0', 0),
(109, 0x436e6f207361326d6120736120616b696e20746172612068616861, 30, 12, '', 1250587603, '0', 0),
(110, 0x4865686520626b38206b7961206e6167746132676f20636c612070616720756d6979616b206e30683f, 31, 12, '', 1250587687, '0', 0),
(111, 0x50617261206d6170616e73696e2068616b68616b, 33, 12, '', 1250587791, '0', 0),
(112, 0x446e7420736578206e796168616861, 34, 12, '', 1250587873, '0', 0),
(113, 0x53616e2073612074616173206f20736120626162612068616b68616b68616b, 35, 12, '', 1250587932, '0', 0),
(114, 0x6e796168616861, 36, 12, '', 1250588034, '0', 0),
(115, 0x4977616e, 38, 12, '', 1250588165, '0', 0),
(116, 0x44656c6c20, 41, 12, '', 1250588300, '0', 0),
(117, 0x7467612062756e64306b20616b6f207065726f20616b6f2070696e3079, 4, 14, '', 1250588435, '0', 0),
(118, 0x552063616e20706f737420657665727964617920696620752077616e7420746f2074656c6c206f7220746f206b6e772070656f706c652074686174207572206f6b652c206e307420677564206f7220776174657665722e2e2e, 44, 12, '', 1250588817, '0', 0),
(119, 0x50726573656e742e, 11, 14, '', 1250588989, '0', 0),
(120, 0x5865726f78, 45, 12, '', 1250589034, '0', 0),
(121, 0x506879736963616c, 47, 12, '', 1250589285, '0', 0),
(122, 0x78656e6f6e, 45, 8, '', 1250589302, '0', 0),
(123, 0x62616363616c6175726561747465, 48, 12, '', 1250589457, '0', 0),
(124, 0x45786f647573, 18, 18, '', 1250590063, '0', 0),
(125, 0x5945532e2e204920646f2062656c696576652048494d2e, 19, 18, '', 1250590116, '0', 0),
(126, 0x4a65737573206469656420666f722075732e2e, 28, 18, '', 1250590172, '0', 0),
(127, 0x2e686d6d206d6164616d692065682e2efc, 8, 18, '', 1250590244, '0', 0),
(128, 0x2e776f772e2e61757320756e206d616d61692e2e75686d20616b6f2077616c612e2e6d68696e6120616b752065682e2e68656865, 7, 18, '', 1250590291, '0', 0),
(129, 0x2e6b6320636370756e696e20636c612e2e, 31, 18, '', 1250590413, '0', 0),
(130, 0x2e6568204f41206e6120756e2e2e68656865, 33, 18, '', 1250590463, '0', 0),
(131, 0x756f206e67612068616b68616b2e726f666c2e, 31, 8, '', 1250590533, '0', 0),
(132, 0x49207375674765737420612072616e64306d2070686f74686f732f7669612075726c2070686f74686f732075706c6f6164657220796e206c6e, 25, 3, '', 1250590533, '0', 0),
(133, 0x77616c61616b6f6d61736162696b756e6469686170796264617921206f68206b617961206d752079616e3f, 48, 8, '', 1250590609, '0', 0),
(134, 0x547279206e6975206e6c616e2e65686568656865, 5, 3, '', 1250590763, '0', 0),
(135, 0x48616c612036307068703f68616861, 9, 3, '', 1250591003, '0', 0),
(136, 0x42776c206e676120706c6120756e67207067706f706f7374206e6720776c616e67206b62756c7568616e206f6b3f, 9, 3, '', 1250591063, '0', 0),
(137, 0x2e6b69636b2e2074626920686e64206b6175206b6173616c69202e726f6c6c2e2068616861, 9, 8, '', 1250591141, '0', 0),
(138, 0x546d616e672074616d612063207968656e2071752e7761686168616861, 33, 3, '', 1250591358, '0', 0),
(139, 0x504c5a2050555420544845204c41535420313020504f53542062666f726520746865204f4e4c494e45204c495354207468616e6b73, 25, 11, '', 1250591362, '0', 0),
(140, 0x5b625d75722074686f7567687473206172652077656c636f6d655b2f625d, 49, 12, '', 1250591427, '0', 0),
(141, 0x497473206c696b6520746869733a3e4d494e443d20746f74616c2063306e74726f6c0a48454152543d20526f6d616e74696320696e206c6f7661626c652074686f75676874730a534f554c3d207075726974792e707572652c726f6d616e74696320696e206c6f7661626c65206f6620757273656c6620696e20636f6d706c657465206675636f73206f662075722070726573656e6365206f66206d696e642e, 50, 12, '', 1250591965, '0', 0),
(142, 0x70616b74617920, 33, 8, '', 1250592270, '0', 0),
(143, 0x57656c6c272069206b6e77206576657279626f6479206465726572766520746f2068617665206120736563306e64206368616e63652e2e, 54, 12, '', 1250592854, '0', 0),
(144, 0x54686520475545535320544845204e554d4245522067616d6520696e2046554e20262047414d4553206973206e6f7420776f726b696e672e202e202e2049742072657475726e20464154414c206572726f72, 10, 11, '', 1250593293, '0', 0),
(145, 0x4361726520746f20736861726520757220647265616d206865726520776170706572732e2e77616e747320746f206b6e7720616e6420686f7065207468617420647265616d73207475726e7320746f207265616c6974792061732077656c6c2e2e, 58, 12, '', 1250594006, '0', 0),
(146, 0x2e77756920686e646920616d616e206c616861742e2e756e6720696261206c6e67204f412068656865, 33, 18, '', 1250594293, '0', 0),
(147, 0x2e7775692074697461206265686176652e2e73737368212077616b206b61207075206d61696e67792e2efc, 3, 18, '', 1250594428, '0', 0),
(148, 0x2e6e68687961206b6320636c616e672074756d756c7520616e6720786970756e2e2e, 31, 18, '', 1250594535, '0', 0),
(149, 0x4d67756c6f20756e616e6720706f7374202e6c6f6c2e, 5, 16, '', 1250596570, '0', 0),
(150, 0x64706174206c69627265206e6120616e672070616d61736168652e2e, 17, 16, '', 1250596801, '0', 0),
(151, 0x446f67, 43, 16, '', 1250596965, '0', 0),
(152, 0x47616c696e67206e616d616e2c2068656865206872617020706167206172616c616e2e202e202e2021203136306279322070776420726e2064623f, 5, 19, '', 1250596973, '0', 0),
(153, 0x7374617920736f6e67206279206361726f6c2062616e617761, 8, 16, '', 1250597083, '0', 0),
(154, 0x4a61636b7374306e65202e2e68656865, 7, 16, '', 1250597136, '0', 0),
(155, 0x2e636f6e667573652e2079616e2064696e2074616e756e67207120776f6f68206d757475616c20756e6465727374616e64696e6720627574206b6565702064656e79696e673f202e6c6f6c2e, 59, 8, '', 1250597412, '0', 0),
(156, 0x4c697a617264, 43, 5, '', 1250597434, '0', 0),
(157, 0x416e752062206161686974696e2064323f, 35, 16, '', 1250597453, '0', 0),
(158, 0x6b616869742073616e2e726f6c6c2e, 35, 8, '', 1250597577, '0', 0),
(159, 0x62757761796121202e, 43, 8, '', 1250597626, '0', 0),
(160, 0x4974206f4e6c79206d65616e73207468652068652f736865206973206e30742079657420705265706172652046307220612072656c617469306e73686970206f72206e68487941206b6175206e61207362686e206d3020736b6e7961206e61206d68616c206d30207861206b6320626b61206972656a656374206b61206e612e2e2e5b625d6a75737420776169742034207468652072694768742074696d655b2f625d, 59, 5, '', 1250597709, '0', 0),
(161, 0x7065726f206462202c206e6170616b61206f6276696f7573206e616d616e20756e67206665656c696e67207061672067616e79616e202c20616c616d206e616d616e206e61206e696c6120756e2070617265686f206b61736f206d6179206b61736f2065682068656865, 59, 8, '', 1250597888, '0', 0),
(162, 0x5b625d626c756572207468616e20626c75652c6974206d6967487420626520752c65786368616e6765206f6620686561727420617420736b61206e3062306479206e306230647920627554207520686168615b2f625d, 8, 5, '', 1250597913, '0', 0),
(163, 0x506172616e6720686972617020696578706c61696e2e2e, 59, 16, '', 1250598078, '0', 0),
(164, 0x5b625d7775692c6f746f7220614261206520706b617553206e4d6e20776c6120626e67206472656374206c6e6b20796e20686568655b2f625d, 5, 5, '', 1250598290, '0', 0),
(165, 0x6e616c696c69746f2c206e616869326c6f2c20636f6b65206b6f20746f2e202e706d706c2e, 59, 8, '', 1250598309, '0', 0),
(166, 0x4241676f2041712067436e672068616861, 3, 5, '', 1250598427, '0', 0),
(167, 0x32326f2079616e2e2e68616861, 60, 16, '', 1250598470, '0', 0),
(168, 0x6368616e67652075722061746d3073706865726520206861686120616e642066696e642073306d6574686e67206e61206c6962616e67616e207061726120642075207861206d61696369702c20, 62, 8, '', 1250598512, '0', 0),
(169, 0x616c6d617269306e67206d7920692e64206b6e6120736120313630206462613f, 5, 10, '', 1250598570, '0', 0),
(170, 0x47656e657369732c65786f6475732e4c65766974696375732c6e756d626572732c6465755445526f4e6f4d592c6a6f736875612c6a75646765732c727554682c3126322073616d75656c2c312632206b696e67732c312632206368726f6e69636c65732c657a72612c6e6568656d6961682c6573746865722c6a6f622c7073616c6d732c70726f76657262732c6563636c65736961737465732c736f6e67206f6620736f6c6f6d6f6e2c6973616961682c6a6572656d6961682c6c616d656e746174696f6e732c657a656b69656c2c64616e69656c2c686f7365612c6a6f656c2c616d6f732c6f6261646961682c6a6f6e61682c6d696361682c6e6168756d2c686162616b6b756b2c7a657068616e6961682c6861676761692c7a65636861726961682c6d616c61636869205b625d616c6c206f6620746873206172652074686520626f6f6b73206f66206f6c642074657374616d656e7473, 18, 3, '', 1250598643, '0', 0),
(171, 0x69206469736167726565206174652072656c612e2e686568652e2e204d617a206d676c696e67206d616e67206173617220616e67206d6761206775726c7a206b657a612073612067757973206b7961206d6173206d646c69206d70696b306e20616e67206775792e2e686568652e746f796b7a, 61, 16, '', 1250598648, '0', 0),
(172, 0x7765682032326f20706c61206568, 60, 8, '', 1250598654, '0', 0),
(173, 0x6f6b206f6b20636c612070616c612070696b306e2e687568752e20677579732070696b306e2e687568752e, 61, 8, '', 1250598703, '0', 0),
(174, 0x6d61646179612e202e202e686168616861206d677374616666206e206b6175206c616861742070726120776c616e672063306e746573742e202e7572612e, 9, 10, '', 1250598726, '0', 0),
(175, 0x326d614c6f6e206b6120736120694c6f672070617869672068616861686168616861202e6576696c2e, 62, 10, '', 1250598855, '0', 0),
(176, 0x476e756e206220756e3f202e2e6c6f6c2e2e20692074727920322072756e20346d20686973207369646520627574206561636820706c6163652069206869646520697473206f6e6c792072656d696e6473206d65206f662068696d2e2e686168612e2e6b616e7461206d756e61, 62, 16, '', 1250598855, '0', 0),
(177, 0x2e687568752e20, 9, 8, '', 1250598858, '0', 0),
(178, 0x706172616e67206d7974746d61616e206e69746f2070676e6273612032206861686168616861202e726f6c6c2e20, 59, 10, '', 1250599022, '0', 0),
(179, 0x776168616861686120616e7568206e616b61696e206d7520617661746f74212068616b2068616b206c697061742062686179206b61206d742e2061706f20706172612034676f7420752078612c202e726f6c6c2e2070697a, 62, 8, '', 1250599054, '0', 0),
(180, 0x436e753f2048616861, 59, 16, '', 1250599118, '0', 0),
(181, 0x4861686168616861202e70756e63682e20624c696b746164206e20616e6720704e684f6e206e6761756e2e202e202e, 30, 10, '', 1250599179, '0', 0),
(182, 0x536120706c75746f206e6c616e67206171207075326e7461206174652072656c612e2e726f6c6c2e, 62, 16, '', 1250599196, '0', 0),
(183, 0x6e616e6179206171207878616d61202e706d706c2e, 30, 10, '', 1250599310, '0', 0),
(184, 0x4261676f206d616774616e616e206d61677061616c616d206d756e61207361206d67756c616e6720617420626b6120686e6170696e2e2e68656865, 30, 16, '', 1250599315, '0', 0),
(199, 0x416273747261637420616e6720747761672064756e2073612070307374202e2e6c6f6c2e, 5, 16, '', 1250600186, '0', 0),
(186, 0x6d616c616d69672064306e2064616c61206b61206b756d3074202e726f6c6c2e, 62, 8, '', 1250599482, '0', 0),
(187, 0x75736f2079616e206e6761756e207048697a20686168616861202e6d757369632e20414c4c204d59204c494645206279206b6320616e64206a6f6a6f, 8, 10, '', 1250599556, '0', 0),
(188, 0x4461326c68696e2071206e2062686179206e6d696e2064756e206e2061712074693272612e2e726f6c6c2e, 62, 16, '', 1250599593, '0', 0),
(189, 0x686d702e6d757369632e206920776173207772306e67207768656e2069206875727420752e202e202e202e206a6564206d6164656c612074686520706173742068656865, 8, 8, '', 1250599641, '0', 0),
(190, 0x54656b6120627920706172616c756d616e, 8, 16, '', 1250599655, '0', 0),
(191, 0x6875683f, 6, 8, '', 1250599688, '0', 0),
(192, 0x6469206e612067616e756e206e692079656e672063306e7374616e74696e30, 8, 16, '', 1250599706, '0', 0),
(193, 0x694c206265206f7665722075, 8, 16, '', 1250599755, '0', 0),
(194, 0x54696c206d792068656172746163686520656e6473, 8, 16, '', 1250599806, '0', 0),
(195, 0x6e796168616861686120756f206e67612e2061736b206b617520706172656e74732063306e63656e74206261676f206b6175206d616774616e616e2077616861686168612e706d706c2e, 30, 8, '', 1250599908, '0', 0),
(196, 0x436e6574636820697465793f, 6, 16, '', 1250599929, '0', 0),
(197, 0x5265616420706167652031, 5, 3, '', 1250599943, '0', 0),
(198, 0x547279206e696f2064696e207361207478742d7a6f6e652c2063306d202e2e2e, 5, 16, '', 1250600103, '0', 0),
(200, 0x4d73206d646c69207075206d706b6f4e206d67612062426165206b63206e6170616b6167616c696e67206e6c61206d616e67617361722e706720636c61206e4d6e20696e6178617220676c74206e20676c742e64206d616970696e7461207061676d756d756b612e776168616861686120746e74, 61, 3, '', 1250600364, '0', 0),
(201, 0x424c4f47532e202e6572726f7220696e20706f7374696e67206d73672e, 10, 10, '', 1250600390, '0', 0),
(202, 0x2e6d61732063687a6d7330206d676120686e617570616b206e61206d6761206c4c6b656e672079616e2120fc, 60, 18, '', 1250600398, '0', 0),
(203, 0x2e6b69636b2e206b6175206b61752064696e20616d616e20656820617361722074616c6f206861686168612e726f6c6c2e, 61, 8, '', 1250600423, '0', 0),
(204, 0x2e6b75727420746c6761206c6e67206875683f6b796120706c61206c6769206b74616e67206e70706177616c6b206f7574206b7067206b6e6b61757870206d7120617420626e62776374206b74613f2068616b2068616b, 61, 18, '', 1250600472, '0', 0),
(205, 0x46206465722077696c20616c77617973206876206120326e64206368616e6365202c20736f206974206d65616e732077652068617620616c73302064206672656564306d203220776173746520642031737420306e65213f, 54, 16, '', 1250600499, '0', 0),
(206, 0x2e6d616769632e2073616e612073612062646179206d75206174206461726174696e672070616e67206d61646d696e672062646179206d75206d737961206b617720617420692077697368203420757220686170696e657320616e64207468652072696768742067757920746f206361726520342075407368616d69652020, 64, 8, '', 1250600521, '0', 0),
(207, 0x6769746e61206461772e202e20486168616861686168612e706d706c2e, 35, 10, '', 1250600570, '0', 0),
(208, 0x4d67612061746520776c6120706f20616b6f20616c616d2073206d676120747369736d697320747369736d6973206e612079616e2c202e74656574682e, 60, 11, '', 1250600594, '0', 0),
(209, 0x6b63207061206570616c206c616e67206e616d616e206e6120686174652070617261206d6174616b70616e20616e672074727565206665656c696e67732e202e202e2068656865, 65, 8, '', 1250600610, '0', 0),
(210, 0x3120697320656e30756768203220697320746f30206d7563682064306e7420773820666f722033206f7220756c2062652064656164212e67756e2e, 54, 8, '', 1250600677, '0', 0),
(211, 0x2e72656164696e672e206861686168616861, 61, 8, '', 1250600725, '0', 0),
(212, 0x2e726f6c6c2e204861686168612e202e202e20416e616b206e672074696e6170612e202e202e20416e756e67206b6c6173656e672074616e616e20756e2e202e202e202e726f6c6c2e, 30, 11, '', 1250600753, '0', 0),
(213, 0x77616820746c6761206c616e672e746f6d61746f2e2064306d656e67, 60, 8, '', 1250600798, '0', 0),
(214, 0x34206d6520697473206e307420747275652e2e204b63207067686174652071206973616e672074616f2068617465207120746c67612065682e2e20556e2079556e2069482e2e686568652e2e, 65, 16, '', 1250600824, '0', 0),
(215, 0x61732072656c6120736179732e2e407368616d6965, 64, 5, '', 1250600834, '0', 0),
(216, 0x6e616e67616e67616e616b20706c612074696e61706120643220686e697761206e6120756e3f202e726f6c6c2e2068616b68616b68616b, 30, 8, '', 1250600889, '0', 0),
(217, 0x53616d65206e612064696e, 64, 16, '', 1250600893, '0', 0),
(218, 0x626b6974206b617520676179612067617961202e6b69636b2e207761686168616861, 64, 8, '', 1250600945, '0', 0),
(219, 0x32206245207769642068696d2034657665722e2e2e, 58, 16, '', 1250600986, '0', 0),
(220, 0x4861686168612e2053616269206e67206d6761206e6b616b6174616e6461206d6173206e6167206b69737320262074656c6c206d6761206775726c7a202e6c6f6c2e202e726f6c6c2e2050697a2074796f2068612068656865, 60, 11, '', 1250601044, '0', 0),
(221, 0x2e2e2e7468696e6b2e2e, 53, 16, '', 1250601053, '0', 0),
(222, 0x2e2e68656176656e2e2e6c6f6c2e, 55, 16, '', 1250601113, '0', 0),
(223, 0x686e6469206d6173206b6175206d67612067757973206c616c6f206e6120706167206b6175206b6175206c616e672e67756e2e, 60, 8, '', 1250601184, '0', 0),
(224, 0x696d202e7361642e, 44, 16, '', 1250601307, '0', 0),
(225, 0x4168656865206e69636520706c616365207265646275746572666c7920752063616e206c69766520776964206f757420773072726965732e2e69206c796b207468617420706c61636520746f6f2e, 55, 12, '', 1250601320, '0', 0),
(226, 0x466f72206d6520777564206665656c2068757274732c736164206f722068656172742062726f6b656e, 53, 12, '', 1250601449, '0', 0),
(227, 0x736172696c6920712077696e6b2e706d706c2e, 69, 8, '', 1250601463, '0', 0),
(228, 0x416e67206e6b6b696e6967207361207362692773626920776c6e672062616974207320736172696c692e2e686168612e2e, 60, 16, '', 1250601504, '0', 0),
(229, 0x492061677265652e2e2e, 67, 16, '', 1250601577, '0', 0),
(230, 0x616e6f68206b617961206b756e672064206171206e6167696e672074616f3f, 70, 8, '', 1250601612, '0', 0),
(231, 0x54613020622079416e3f202e686168612e2e70656163652e2e2e, 69, 16, '', 1250601635, '0', 0),
(232, 0x776168616861686168612e726f6c6c2e206179616e206b6320, 60, 8, '', 1250601679, '0', 0),
(233, 0x416e30206b7961206b756e672073717561726520616e672065617274683f, 70, 16, '', 1250601694, '0', 0),
(599, 0x416e643220616b6f, 11, 12, '', 1250752441, '0', 0),
(600, 0x54616d612034206c6e67206b63206c756d756e646167206c616e67207861207361206c6f6f62206e67206b756c756e67616e2e2e, 107, 12, '', 1250752701, '0', 0),
(601, 0x496e6469206d6164616c69206d6170696b6f6e20616e67206d676120677579732c206d6173206d6162696c6973206d6170696b6f6e20616e67206d6761206775726c7a202e616e6772792e202e70756e63682e204b6f206b796f206c61686174206479616e206568202e626565652e20486168616861, 61, 11, '', 1250752815, '0', 0),
(235, 0x70617275207061726f207761686168612e70656163652e, 69, 8, '', 1250601764, '0', 0),
(236, 0x4e7961686168612e2e6769726c73207468616e6b20796f75203420746861742069207265616c6c79206170707265636961746564206c6162207520616c4c, 64, 12, '', 1250601773, '0', 0),
(237, 0x6e30742079657420657870657269656e636520646174, 53, 16, '', 1250601783, '0', 0),
(238, 0x616e6f68206b617961206b756e672064206e62756f20616e672065617274682068616861, 70, 8, '', 1250601817, '0', 0),
(239, 0x616e75206b7961206b6e67206c756d696c69706164207461796f2e2e6c6f6c2e, 70, 16, '', 1250601879, '0', 0),
(240, 0x616d20736f20757375616c20666169722070616e7461792070616e74617920776c616e6720706e61676261676f2021, 53, 8, '', 1250601900, '0', 0),
(241, 0x2e6b69636b2e20686e642067726c2063207069656365207520616d7974307421, 64, 8, '', 1250601946, '0', 0),
(242, 0x616e7568206b617961206c616b6164207461752070626c696b7461643f202e706d706c2e, 70, 8, '', 1250602024, '0', 0),
(243, 0x686d6d2068656176656e206e2064696e2e, 55, 8, '', 1250602098, '0', 0),
(244, 0x7761682e2073686f6b6f79206178616e206b612e7365617263682e, 32, 8, '', 1250602275, '0', 0),
(245, 0x776168616b2068616b20, 17, 8, '', 1250602355, '0', 0),
(584, 0x7468616e6b20796f752c2079616e206e672061707072656369617465206e6b6f2068613f20776c61206e6120646570726563696174652e2e2e20776168616861686120286a6f6b6529, 49, 15, '', 1250750305, '0', 0),
(247, 0x776568616861686168612069736120697361206c616e6720706f74706f74, 18, 8, '', 1250602730, '0', 0),
(248, 0x5b625d6c6561726e696e673a5b2f625d203d206e307420616c6c207468652074696d6520636f6f72706f7261746520707261796572206d7573742062652068656172656420627920474f4420697473207665727920636c65617220696e207468732076657273652064306e74207072617920746f2074686f7365206e307420776f727468792070656f706c6520474f4420776f6e74206c697374656e202e202e202e20, 73, 8, '', 1250603083, '0', 0),
(250, 0x706c732e207265616420746873206361726566756c7920616e6420677665207572206f776e206578706c61696e617469306e20616e306e67207061676b6120696e74696e6469206d302077697468207468617420766572736520, 75, 8, '', 1250604259, '0', 0),
(251, 0x6e6761756e206c6e6720616b6f206e616e64322c61776f6c206e6b6f207761686168616861, 11, 15, '', 1250606275, '0', 0),
(252, 0x706170616d70616d2c3f206472756d657220626f7920756e2c20636d652064657920746f6c64206d652c706172756d706170616d70616d2c20626f6d2c626f6d2c626f6d, 12, 15, '', 1250606396, '0', 0),
(253, 0x426b74206d616d61693f20786120626120616e67206c756e61733f20486168616861, 32, 10, '', 1250606499, '0', 0),
(670, 0x70726573656e7421, 140, 2, '', 1250814133, '0', 0),
(316, 0x686168616861686120736b696e207368617665, 35, 10, '', 1250648147, '0', 0),
(260, 0x706f7374, 79, 8, '', 1250608679, '0', 0),
(598, 0x416b6f20646e2066616e73206e692072656c612068616b68616b, 97, 12, '', 1250752373, '0', 0),
(317, 0x77656c636f6d65206e657762696520616e6420686176652066756e, 91, 12, '', 1250648909, '0', 0),
(590, 0x616b6f206e6f2e20312066616e206e692072656c612c20706170617461796f20616b6f2066616e7320636c7562206d6f207369732120686568656865, 97, 15, '', 1250750872, '0', 0),
(589, 0x5768656e207765206c6f766520736f6d65312c697473206c6f766520746f2073686f77207572207265737065637420616e6420696e74657265737420616e64207572206c696b657320696e207468617420706572736f6e2c206275742077656e207765206c6f766520746f206f75722073706f7573652069747320746f206d616b65206c6f766520616e642070726f6d6f746520626574746572206c69666520616e642068617070792068306d6520616e6420677564206368696c6472656e2e2e20, 56, 12, '', 1250750862, '0', 0),
(585, 0x446176616f2c6d696e64616e616f2c697261712c626167696f752c6b68742073616e2062737461206d6173617961206f6b206e20756e20, 55, 12, '', 1250750448, '0', 0),
(586, 0x497420697320656e6a6f79696e672077686174206c6966652068617320746f206776652e2e74616b696e672065766572792073746570206f6e206265696e6720612062657474657220706572736f6e, 63, 12, '', 1250750627, '0', 0),
(587, 0x6920686176652074776f2068616e6473206d61726b2c206d67616e646120756e20686568656865, 104, 15, '', 1250750729, '0', 0),
(588, 0x6d69646f7562616e20646b6f207061206e6b696b69746120756e202862776168616861686129, 121, 15, '', 1250750808, '0', 0),
(582, 0x7767206d6f6b6f2074756c616b2121212120706c656173652072656c61212120687568756875, 103, 15, '', 1250750185, '0', 0),
(271, 0x455854454e44454420706620286d3072652061626f7574206d6529207374696c20617261776170206167652c206964206372642e, 10, 8, '', 1250611991, '0', 0),
(272, 0x7761722d7a306e65207374696c20617261776170207761722d7a306e65, 10, 8, '', 1250612272, '0', 0),
(273, 0x416e6f68206b7961206d616e677961327269206b756e67206e676e67206766206b6f2063206d6164616d206172726f796f3f, 70, 14, '', 1250618658, '0', 0),
(274, 0x492068617620646120727974203220736179206e6f20636f6d6d656e74, 6, 14, '', 1250618768, '0', 0),
(275, 0x653220756e67206c3873742e202e2044455220534154414e2049535453206279204e41524741524f5448, 8, 14, '', 1250618929, '0', 0),
(276, 0x4e6f2e20436d756c612070676b62617461206b6f206174206e616d6174617920756e672070617061206b6f2c206e6177616c616e206e20616b30206e672067616e61206d616e6977616c61207361206b616e79612e204469206e6d6e206b63207861206e67726572706c79207361206d676120747874206b6f, 19, 14, '', 1250619133, '0', 0),
(277, 0x6f7220626b61206d616e686964, 31, 14, '', 1250619301, '0', 0),
(278, 0x626f6172, 42, 14, '', 1250619689, '0', 0),
(279, 0x436174, 42, 14, '', 1250619757, '0', 0),
(280, 0x64696e6f73617572, 43, 14, '', 1250619858, '0', 0),
(281, 0x5b625d3131306d622066696c652075706c6f616445725b2f625d203c42523e2020203c6120687265663d22687474703a2f2f7472696e6974792e77656e392e6e6574223e3c623e484f4d453c2f623e3c2f613e3c68723e3c424f4459204247434f4c4f523d424c41434b206c696e6b3d79656c6c6f7720766c696e6b3d7265643e2020203c7469746c653e594f55522046494c452055504c4f414445443c2f5449544c453e2020203c7374796c653e202020613a686f7665727b636f6c6f723a77686974657d2020203c2f7374796c653e202020202020203c63656e7465723e2020203c7020616c69676e3d63656e7465723e3c623e3c666f6e7420636f6c6f723d667563687369613e4e4f2046494c452055504c4f414445443c2f666f6e743e3c62723e3c6120687265663d696e6465782e7068703e506c6561736520676f206261636b20746f2074727920616761696e3c2f613e20202020203c5441424c452069643d5441424c4531207374796c653d2257494454483a2036323370783b204845494748543a203234397078222063656c6c53706163696e673d3020202063656c6c50616464696e673d302077696474683d36323320616c69676e3d63656e74657220626f726465723d30206261636b67726f756e643d2222206267436f6c6f723d626c61636b3e20202020203c54523e2020203c54443e2020203c464f524d2069643d666f726d31206e616d653d22666f726d312220616374696f6e3d2275706c6f61642e70687022206d6574686f643d22706f737422202020656e63547970653d226d756c7469706172742f666f726d2d64617461223e3c5441424c45207374796c653d2257494454483a2034383670783b204845494748543a2032337078222063656c6c53706163696e673d302063656c6c50616464696e673d3020202077696474683d34383620616c69676e3d63656e74657220626f726465723d31206267436f6c6f723d626c61636b3e20202020203c54523e2020203c54443e2020203c5020616c69676e3d63656e7465723e3c464f4e5420666163653d2257696465204c6174696e22202020636f6c6f723d79656c6c6f773e3c5354524f4e473e55504c4f414420414e4f5448455220202046494c453c2f5354524f4e473e3c2f464f4e543e3c2f503e3c2f54443e3c2f54523e3c2f5441424c453e3c42523e2020203c5441424c45207374796c653d2257494454483a2034363870783b204845494748543a203131357078222063656c6c53706163696e673d3020202063656c6c50616464696e673d302077696474683d34363820616c69676e3d63656e746572206261636b67726f756e643d222220626f726465722020203d312020203e20202020203c54523e2020203c5444206267436f6c6f723d626c61636b3e2020203c5020616c69676e3d63656e7465723e3c464f4e5420666163653d5753545f456e676c20636f6c6f723d7265642073697a653d323e55504c4f414420555220202046494c45204f4e4c592036204d4220414c4c4f5745442021213c2f464f4e543e3c2f503e3c2f54443e3c2f54523e2020203c54523e2020203c5444206267436f6c6f723d233333333333333e2020203c503e3c494e50555420747970653d68696464656e2076616c75653d313030303030303030206e616d653d4d41585f46494c455f53495a453e2020203c423e3c464f4e5420636f6c6f723d6f72616e67657265643e3c423e4174746163686d656e74733c2f423e3c42523e3c494e5055542020207374796c653d2257494454483a2034383070783b204845494748543a20323270782220747970653d66696c652073697a653d34362020206e616d653d75706c6f616465645f66696c653e3c42523e3c494e5055542069643d7375626d69743120747970653d7375626d69742076616c75653d55706c6f6164206e616d653d7375626d6974313e2020203c2f464f4e543e3c2f423e3c2f503e3c2f54443e3c2f54523e3c2f5441424c453e3c2f464f524d3e3c2f54443e3c2f54523e3c2f5441424c453e2020203c68723e202020, 81, 3, '', 1250628068, '0', 0),
(282, 0x5468652061726177617020617265206e772072657472697665206775657320746865206e7220696e2067616d65732061726520776f726b696e6720, 10, 1, '', 1250628205, '0', 0),
(283, 0x205b625d7468726565207461626c6520736372697074735b2f625d3c7461626c6520626f726465723d22322220616c69676e3d2263656e746572222077696474683d22313030222063656c6c70616464696e673d2230222063656c6c73706163696e673d2230223e3c74723e3c74642077696474683d22323522206267636f6c6f723d22726564223e3c666f6e7420636f6c6f723d226e617679223e7472693c2f666f6e743e3c2f74643e3c746420616c69676e3d2263656e746572222077696474683d22323522206267636f6c6f723d22677265656e223e3c666f6e7420636f6c6f723d22726564223e6e693c2f666f6e743e3c2f74643e3c746420616c69676e3d2263656e746572222077696474683d22323522206267636f6c6f723d2267726179223e3c666f6e7420636f6c6f723d22726564223e7761703c2f666f6e743e3c2f74643e3c2f74723e3c2f7461626c653e20, 81, 3, '', 1250628234, '0', 0),
(284, 0x5b625d616e616c6f6720636c6f636b5b2f625d20203c703e3c696d6720626f726465723d223022207372633d22687474703a2f2f776170666f72756d2e6f72672e756b2f636c6f636b2e7068703f7a6f6e653d362673697a653d3830223e3c2f703e20, 81, 3, '', 1250628375, '0', 0),
(285, 0x616e6f206b617961206b6e67206420616b6f20706e616e67616e616b207361206d756e646f3f65206420776c616e67206d67616e64612064323f6e7961686168616861206261747568696e206e696f206b6f212070617361776179206865686568652c2e, 70, 15, '', 1250628563, '0', 0),
(286, 0x5b625d6368616e67696e67206c616e67756167655b2f625d20203c212d2d682d2d3e3c212d2d682d2d3e3c666f726d20616374696f6e3d22687474703a2f2f736372697074736f636b65742e636f6d2f6367692d62696e2f6a756d70626f782f6a756d702e63676922206d6574686f643d22676574223e3c666f6e7420636f6c6f723d22726564223e4368616e6765206c616e67756167653a3c2f666f6e743e203a3c62722f3e3c73656c656374206e616d653d2275726c223e20646f63756d656e742e77726974656c6e28273c6f7074696f6e2076616c75653d22687474703a2f2f7472696e6974792e77656e2e7275223e456e676c616e643c2f6f7074696f6e3e27293b28273c6f7074696f6e2076616c75653d22687474703a2f2f36342e3233332e3137392e3130342f7472616e736c6174655f633f686c3d656e266c616e67706169723d656e7c617226753d687474703a2f2f7472696e6974792e77656e392e6e6574223e417261623c2f6f7074696f6e3e27293b28273c6f7074696f6e2076616c75653d22687474703a2f2f36342e3233332e3137392e3130342f7472616e736c6174655f633f686c3d656e266c616e67706169723d656e7c7a682d434e26753d687474703a2f2f7472696e6974792e77656e392e6e6574223e4368696e613c2f6f7074696f6e3e27293b28273c6f7074696f6e2076616c75653d22687474703a2f2f36342e3233332e3137392e3130342f7472616e736c6174655f633f686c3d656e266c616e67706169723d656e7c6e6c26753d687474703a2f2f7472696e6974792e77656e392e6e6574223e42656c616e64613c2f6f7074696f6e3e27293b2028273c6f7074696f6e2076616c75653d22687474703a2f2f36342e3233332e3137392e3130342f7472616e736c6174655f633f686c3d656e266c616e67706169723d656e7c667226753d687474703a2f2f7472696e6974792e77656e392e6e6574223e5072616e6369733c2f6f7074696f6e3e27293b28273c6f7074696f6e2076616c75653d22687474703a2f2f36342e3233332e3137392e3130342f7472616e736c6174655f633f686c3d656e266c616e67706169723d656e7c727526753d687474703a2f2f7472696e6974792e77656e392e6e6574223e52757369613c2f6f7074696f6e3e27293b28273c6f7074696f6e2076616c75653d22687474703a2f2f36342e3233332e3137392e3130342f7472616e736c6174655f633f686c3d656e266c616e67706169723d656e7c646526753d687474703a2f2f7472696e6974792e77656e392e6e6574223e4a65726d616e3c2f6f7074696f6e3e27293b28273c6f7074696f6e2076616c75653d22687474703a2f2f36342e3233332e3137392e3130342f7472616e736c6174655f633f686c3d656e266c616e67706169723d656e7c697426753d687474703a2f2f7472696e6974792e77656e392e6e6574223e4974616c793c2f6f7074696f6e3e27293b28273c6f7074696f6e2076616c75653d22687474703a2f2f36342e3233332e3137392e3130342f7472616e736c6174655f633f686c3d656e266c616e67706169723d656e7c6a6126753d687474703a2f2f7472696e6974792e77656e392e6e6574223e4a6570616e673c2f6f7074696f6e3e27293b28273c6f7074696f6e2076616c75653d22687474703a2f2f36342e3233332e3137392e3130342f7472616e736c6174655f633f686c3d656e266c616e67706169723d656e7c6b6f26753d687474703a2f2f7472696e6974792e77656e392e6e6574223e4b6f7265613c2f6f7074696f6e3e27293b3c2f73656c6563743e3c62722f3e3c696e70757420747970653d2268696464656e22206e616d653d226a756d70222076616c75653d226a756d70223e3c696e70757420747970653d227375626d6974222076616c75653d224f6b223e3c2f666f726d3e3c62722f3e203c2f6469763e203c2f703e3c7020616c69676e3d2263656e74657222207374796c653d226261636b67726f756e642d636f6c6f723a626c616e6b223e203c212d2d682d2d3e20203c212d2d682d2d3e3c687220636f6c6f723d22477261792273697a653d2231223e20, 81, 3, '', 1250628785, '0', 0),
(287, 0x5b625d676f6f676c6520736372697074735b2f625d20203c623e3c666f6e742073697a653d22322220636f6c6f723d2223383030303030223e456e746572204b6579776f7264733a3c2f666f6e743e3c666f6e7420636f6c6f723d2223383030303030223e3c2f6469763e3c2f666f6e743e3c2f623e3c2f703e3c666f726d206d6574686f643d226765742220616374696f6e3d22687474703a2f2f7761702e676f6f676c652e636f6d2f7868746d6c223e3c696e70757420747970653d2268696464656e22206e616d653d226d7265737472696374222076616c75653d227868746d6c222f3e3c70207374796c653d226d617267696e2d746f703a20313b206d617267696e2d626f74746f6d3a2031223e203c696e70757420747970653d227465787422206e616d653d227122206d61786c656e6774683d2232303438222073697a653d223232222076616c75653d224d6f62696c65223e3c696e70757420747970653d2268696464656e22206e616d653d22686c222076616c75653d22656e222f3e3c696e70757420747970653d2268696464656e22206e616d653d226c72222076616c75653d22222f3e3c62722f3e3c666f6e742073697a653d2231223e3c696e70757420747970653d22726164696f22206e616d653d2273697465222076616c75653d227365617263682220636865636b65643d22222f3e3c666f6e7420636f6c6f723d2223303030303830223e3c623e5765623c2f623e3c2f666f6e743e3c62722f3e3c696e70757420747970653d22726164696f22206e616d653d2273697465222076616c75653d22696d61676573222f3e3c666f6e7420636f6c6f723d2223303030303830223e3c623e496d616765733c2f623e3c2f666f6e743e3c62722f3e203c696e70757420747970653d22726164696f22206e616d653d2273697465222076616c75653d226c6f63616c222f3e3c623e3c666f6e7420636f6c6f723d2223303030303830223e4c6f63616c204c697374696e673c2f666f6e743e3c2f623e3c62722f3e203c696e70757420747970653d22726164696f22206e616d653d2273697465222076616c75653d226d6f62696c65222f3e3c623e3c666f6e7420636f6c6f723d2223303030303830223e4d6f62696c65205765623c2f666f6e743e3c2f623e3c2f666f6e743e3c2f703e3c70207374796c653d226d617267696e2d746f703a20313b206d617267696e2d626f74746f6d3a2031223e3c696e70757420747970653d227375626d697422206e616d653d2262746e47222076616c75653d225365617263682e2e2e22207374796c653d22636f6c6f723a20233030383030303b20666f6e742d7765696768743a20626f6c64222f3e3c2f703e3c2f666f726d3e3c2f623e20, 81, 3, '', 1250628925, '0', 0),
(288, 0x5b625d676d61696c206c6f67696e5b2f625d203c7469746c653e476d61696c206c6f67696e3c2f7469746c653e3c2f686561643e3c626f647920746578743d227265642220766c696e6b3d2279656c6c6f77223e20203c7020616c69676e3d2263656e746572223e20203c2f6469763e20203c212d2d682d2d3e3c68723e3c696d67207372633d2268747470733a2f2f7777772e676f6f676c652e636f6d2f6163636f756e74732f676f6f676c655f7472616e73706172656e742e6769662220616c743d22222f3e3c62722f3e3c623e476f6f676c65204c6f67696e3c2f623e3c68723e20203c212d2d682d2d3e3c6469762069643d22676169615f6c6f67696e626f782220636c6173733d22626f6479223e3c666f726d2069643d22676169615f6c6f67696e666f726d2220616374696f6e3d2268747470733a2f2f7777772e676f6f676c652e636f6d2f6163636f756e74732f536572766963654c6f67696e417574683f736572766963653d6d61696c22206d6574686f643d22706f7374223e3c696e70757420747970653d2268696464656e22206e616d653d226c746d706c222076616c75653d2265636f627822202f3e3c64697620616c69676e3d226c656674223e3c666f6e7420636f6c6f723d2261717561223e3c2f666f6e743e3c2f6469763e3c64697620616c69676e3d226c656674223e3c666f6e7420636f6c6f723d2261717561223e3c2f666f6e743e3c2f6469763e3c64697620616c69676e3d226c656674223e3c666f6e7420636f6c6f723d2261717561223e3c2f666f6e743e3c2f6469763e3c6469763e3c7370616e20636c6173733d2267616961206c65206c626c223e3c736d616c6c3e3c623e557365726e616d653a3c2f623e3c2f736d616c6c3e3c2f7370616e3e3c2f6469763e3c6469763e3c696e70757420747970653d2268696464656e22206e616d653d22636f6e74696e7565222069643d22636f6e74696e7565222076616c75653d22687474703a2f2f6d61696c2e676f6f676c652e636f6d2f6d61696c2f782f31306174763433336b737072792f3f75693d6d6f62696c65267a79703d6c22202f3e3c696e70757420747970653d2268696464656e22206e616d653d2273657276696365222069643d2273657276696365222076616c75653d226d61696c22202f3e3c696e70757420747970653d2268696464656e22206e616d653d226e7569222069643d226e7569222076616c75653d223522202f3e3c696e70757420747970653d2268696464656e22206e616d653d22726d222069643d22726d222076616c75653d2266616c736522202f3e3c696e70757420747970653d2268696464656e22206e616d653d226c746d706c222069643d226c746d706c222076616c75653d2265636f627822202f3e3c696e70757420747970653d2268696464656e22206e616d653d2262746d706c222069643d2262746d706c222076616c75653d226d6f62696c6522202f3e3c696e70757420747970653d2268696464656e22206e616d653d22686c222069643d22686c222076616c75653d22656e22202f3e3c2f6469763e3c696e70757420747970653d227465787422206e616d653d22456d61696c222069643d22456d61696c222073697a653d223138222076616c75653d222220636c6173733d2267616961206c652076616c22202f3e3c6469763e3c7370616e20636c6173733d2267616961206c65206c626c223e3c736d616c6c3e3c623e50617373776f72643a3c2f623e3c2f736d616c6c3e3c2f7370616e3e3c2f6469763e3c696e70757420747970653d2270617373776f726422206e616d653d22506173737764222069643d22506173737764222073697a653d2231382220636c6173733d2267616961206c652076616c22206175746f636f6d706c6574653d226f666622202f3e3c64697620616c69676e3d226c656674223e3c696e70757420747970653d22636865636b626f7822206e616d653d2250657273697374656e74436f6f6b6965222069643d2250657273697374656e74436f6f6b6965222076616c75653d2279657322202f3e3c696e70757420747970653d2268696464656e22206e616d653d27726d53686f776e272076616c75653d223122202f3e3c7370616e20636c6173733d2267616961206c652072656d223e3c736d616c6c3e3c623e3c666f6e7420636f6c6f723d22626c61636b223e52656d656d626572206d653c2f666f6e743e3c2f623e3c2f736d616c6c3e3c2f7370616e3e3c2f6469763e3c64697620616c69676e3d226c656674223e3c696e70757420747970653d227375626d69742220636c6173733d2267616961206c6520627574746f6e22206e616d653d227369676e496e222076616c75653d225369676e20696e22202f3e3c2f6469763e3c2f666f726d3e3c62722f3e20203c2f6469763e20203c2f703e3c2f626f64793e3c2f68746d6c3e, 81, 3, '', 1250629118, '0', 0);
INSERT INTO `ibwf_posts` (`id`, `text`, `tid`, `uid`, `image`, `dtpost`, `reported`, `quote`) VALUES
(289, 0x5b625d6d736e20736372697074735b2f625d20203c7461626c6520424f524445523d2230222057494454483d2232323222204845494748543d2231382220616c69676e3d2263656e746572223e203c74723e203c74642057494454483d2232313422204845494748543d223130223e203c666f726d204e414d453d22736561726368222049443d227365617263682220414354494f4e3d22687474703a2f2f7365617263682e6d736e2e636f6d2f726573756c74732e61737022204d4554484f443d22676574223e203c70207374796c653d226d617267696e2d746f703a20313b206d617267696e2d626f74746f6d3a20312220616c69676e3d2263656e746572223e203c696d67205352433d22687474703a2f2f676f2e6d736e2e636f6d2f41472f452f302e617370222077696474683d22333222206865696768743d2231362220424f524445523d22302220414c543d22476f20746f206d736e2e636f6d223e3c666f6e7420464143453d22617269616c222053495a453d2232223e3c7374726f6e673e536561726368203c666f6e7420434f4c4f523d2223383038303830223e7468652057656220666f723a3c2f666f6e743e3c2f7374726f6e673e3c2f666f6e743e3c62723e203c696e70757420545950453d2274657874222049443d2271222053495a453d22323222204d41584c454e4754483d2232353122204e414d453d2271222056434152445f4e414d453d2253656172636854657874223e3c2f703e203c70207374796c653d226d617267696e2d746f703a20313b206d617267696e2d626f74746f6d3a20312220616c69676e3d2263656e746572223e3c696e70757420545950453d227375626d6974222056414c55453d2253656172636822204e414d453d224231223e3c696e70757420545950453d2268696464656e22204e414d453d22464f524d222056414c55453d2246524e54223e3c696e70757420545950453d2268696464656e22204e414d453d22756e222056414c55453d22646f63223e3c696e70757420545950453d2268696464656e22204e414d453d2276222056414c55453d2231223e3c2f703e203c2f666f726d3e203c2f74643e203c2f74723e203c2f7461626c653e20, 81, 3, '', 1250629188, '0', 0),
(290, 0x5b625d6d756c7469207365617263685b2f625d20203c7461626c652077696474683d2235302220626f726465723d2233223e3c74723e3c74642077696474683d223130302522206267636f6c6f723d222220616c69676e3d2263656e746572223e3c736372697074206c616e67756167653d4a6176615363726970743e6d3d27253343666f726d2532306d6574686f64253344253232676574253232253230616374696f6e253344253232687474702533412f2f6d6f62696c7573742e6e65742f6d797374617274706167652f7365617263682e61737025323225334525334370253345536561726368253343696e70757425323074797065253344253232746578742532322532306e616d652533442532327125323225323073697a6525334425323231302532322532302f25334525334373656c6563742532306e616d65253344253232656e67696e652532322533452533436f7074696f6e25323076616c756525334425323267253232253345476f6f676c652532306d6f62696c652533432f6f7074696f6e2533452533436f7074696f6e25323076616c75652533442532326e6577672532322533454e6577253230676f6f676c652532306d6f62696c652533432f6f7074696f6e2533452533436f7074696f6e25323076616c75652533442532326777253232253345476f6f676c652532307765622533432f6f7074696f6e2533452533436f7074696f6e25323076616c75652533442532326769253232253345476f6f676c65253230696d6167652533432f6f7074696f6e2533452533436f7074696f6e25323076616c7565253344253232792532322533455961686f6f2532306d6f62696c652533432f6f7074696f6e2533452533436f7074696f6e25323076616c756525334425323279772532322533455961686f6f2532307765622533432f6f7074696f6e2533452533436f7074696f6e25323076616c75652533442532326125323225334541736b2532306d6f62696c652533432f6f7074696f6e2533452533436f7074696f6e25323076616c7565253344253232617725323225334541736b2532307765622533432f6f7074696f6e2533452533436f7074696f6e25323076616c75652533442532327325323225334553656e7369732532306d6f62696c652533432f6f7074696f6e2533452533436f7074696f6e25323076616c756525334425323266253232253345466c69636b72253230696d6167652533432f6f7074696f6e2533452533436f7074696f6e25323076616c7565253344253232696d64622532322533454d6f766965732533432f6f7074696f6e2533452533436f7074696f6e25323076616c75652533442532326c692532322533454c79726963732533432f6f7074696f6e2533452533436f7074696f6e25323076616c756525334425323261722532322533454172746973742533432f6f7074696f6e2533452533436f7074696f6e25323076616c75652533442532326776253232253345476f6f676c65253230766964656f2533432f6f7074696f6e2533452533436f7074696f6e25323076616c75652533442532327974253232253345596f75747562652533432f6f7074696f6e2533452533436f7074696f6e25323076616c7565253344253232676e253232253345476f6f676c652532306e6577732533432f6f7074696f6e2533452533436f7074696f6e25323076616c756525334425323277696b6925323225334557696b6970656469612533432f6f7074696f6e2533452533436f7074696f6e25323076616c756525334425323277253232253345576561746865722533432f6f7074696f6e2533452533436f7074696f6e25323076616c756525334425323273746f636b25323225334553746f636b732533432f6f7074696f6e2533452533436f7074696f6e25323076616c75652533442532326d73706163652532322533454d7973706163652533432f6f7074696f6e2533452533436f7074696f6e25323076616c75652533442532326665642532322533454665646578253230547261636b2533432f6f7074696f6e2533452533432f73656c656374253345253343696e707574253230747970652533442532327375626d697425323225323076616c75652533442532322532305365617263682f43617269253230636f792532312532312532302532322f2533452533432f702533452533432f666f726d253345273b643d756e657363617065286d293b646f63756d656e742e77726974652864293b3c2f7363726970743e3c2f6469763e3c2f74643e3c2f74723e3c2f7461626c653e20, 81, 3, '', 1250629328, '0', 0),
(291, 0x5b625d6368616e67696e67206241636b67726f756e6420636f6c6f7220636f64455b2f625d20203c703e5b3c6120687265663d222f22206f6e6d6f7573656f7665723d22646f63756d656e742e6267436f6c6f723d27677265656e27223e477265656e3c2f613e5d3c62723e205b3c6120687265663d222f22206f6e6d6f7573656f7665723d22646f63756d656e742e6267436f6c6f723d27677265656d27223e42726967687420477265656e3c2f613e5d3c62723e205b3c6120687265663d222f22206f6e6d6f7573656f7665723d22646f63756d656e742e6267436f6c6f723d27736561677265656e27223e53656120477265656e3c2f613e5d3c62723e205b3c6120687265663d222f22206f6e6d6f7573656f7665723d22646f63756d656e742e6267436f6c6f723d2772656427223e5265643c2f613e5d3c42523e205b3c6120687265663d222f22206f6e6d6f7573656f7665723d22646f63756d656e742e6267436f6c6f723d276d6167656e746127223e4d6167656e74613c2f613e5d3c62723e205b3c6120687265663d222f22206f6e6d6f7573656f7665723d22646f63756d656e742e6267436f6c6f723d27667573696127223e46757369613c2f613e5d3c62723e205b3c6120687265663d222f22206f6e6d6f7573656f7665723d22646f63756d656e742e6267436f6c6f723d2770696e6b27223e50696e6b3c2f613e5d3c62723e205b3c6120687265663d222f22206f6e6d6f7573656f7665723d22646f63756d656e742e6267436f6c6f723d27707572706c6527223e507572706c653c2f613e5d3c42523e205b3c6120687265663d222f22206f6e6d6f7573656f7665723d22646f63756d656e742e6267436f6c6f723d276e61767927223e4e6176793c2f613e5d3c62723e205b3c6120687265663d222f22206f6e6d6f7573656f7665723d22646f63756d656e742e6267436f6c6f723d27626c756527223e426c75653c2f613e5d3c62723e205b3c6120687265663d222f22206f6e6d6f7573656f7665723d22646f63756d656e742e6267436f6c6f723d27726f79616c626c756527223e526f79616c20426c75653c2f613e5d3c62723e205b3c6120687265663d222f22206f6e6d6f7573656f7665723d22646f63756d656e742e6267436f6c6f723d27536b79626c756527223e536b7920426c75653c2f613e5d20, 81, 3, '', 1250629421, '0', 0),
(292, 0x5b625d7868746d6c20676f6f676c65207363726970745b2f625d20203c666f726d206d6574686f643d226765742220616374696f6e3d22687474703a2f2f7777772e676f6f676c652e636f6d2f7868746d6c223e3c703e3c623e3c666f6e7420636f6c6f723d22626c7565223e473c2f666f6e743e3c666f6e7420636f6c6f723d22726564223e6f3c2f666f6e743e3c666f6e7420636f6c6f723d226f72616e6765223e6f3c2f666f6e743e3c666f6e7420636f6c6f723d22626c7565223e673c2f666f6e743e3c666f6e7420636f6c6f723d22677265656e223e6c3c2f666f6e743e3c666f6e7420636f6c6f723d22726564223e653c2f666f6e743e3c2f623e3c62722f3e3c696e70757420747970653d227465787422206e616d653d227122206d61786c656e6774683d2232303438222073697a653d22313522207374796c653d226261636b67726f756e642d636f6c6f723a6f72616e6765222076616c75653d2222202f3e3c696e70757420747970653d227375626d697422206e616d653d2262746e47222076616c75653d22534541524348222f3e3c696e70757420747970653d2268696464656e22206e616d653d22686c222076616c75653d22656e222f3e3c696e70757420747970653d2268696464656e22206e616d653d226c72222076616c75653d2222202f3e3c696e70757420747970653d2268696464656e22206e616d653d2273616665222076616c75653d226f6666222f3e3c62722f3e3c696e70757420747970653d22726164696f22206e616d653d2273697465222076616c75653d2273656172636822202f3e3c736d616c6c3e3c623e3c666f6e7420636f6c6f723d2267726179223e5765623c2f666f6e743e3c2f623e3c2f736d616c6c3e3c62722f3e3c696e70757420747970653d22726164696f22206e616d653d2273697465222076616c75653d22696d6167657322202f3e3c736d616c6c3e3c623e3c666f6e7420636f6c6f723d2267726179223e496d616765733c2f666f6e743e3c2f623e3c2f736d616c6c3e3c62722f3e3c696e70757420747970653d22726164696f22206e616d653d2273697465222076616c75653d226d6f62696c652220636865636b65643d22636865636b6564222f3e3c736d616c6c3e3c623e3c666f6e7420636f6c6f723d2267726179223e4d6f62696c65205765623c2f666f6e743e3c2f623e3c2f736d616c6c3e3c696e70757420747970653d2268696464656e22206e616d653d226d7265737472696374222076616c75653d227868746d6c222f3e3c2f703e3c2f666f726d3e3c62722f3e3c62722f3e20, 81, 3, '', 1250629494, '0', 0),
(293, 0x556e67206d79206d676120616c6d2070206479616e20706f7374206e797520643220746e74, 81, 3, '', 1250629542, '0', 0),
(294, 0x6b6320656d6f74696f6e616c20616e67206769726c73206c796b206d652c20756e6c796b206d67612067757973206d6761206d616e686964207765686568656865, 33, 15, '', 1250629580, '0', 0),
(295, 0x6a757a206f626579207468656d2c74686579206b6e77207761747320626573742034752c63206d616d69206e65766572206e676b616d616c692e2e2e, 30, 15, '', 1250629736, '0', 0),
(296, 0x6268652c626b61206e6761206d616e6869642c7065726f20677579732070726574656e6420746f2062207374726f6e6720616c77617973206b687420646e616d616e206b617961207461676f206c756861, 31, 15, '', 1250629866, '0', 0),
(297, 0x736572696f75736c792c64706174206d676120766f74657273206d676b61726f6e206e67206368616e67652c6b6320636c612069746f6e67206e67626f626f746f206e616d616e206e672064206b6172617061742064617061742c65206b6e6720626e6f746f2062206e74656e20616e67206d67612064706174206c6d616e67206e61206d6761206c65616472732c347375726520616c61207461752070726f626c6d2e64623f6b79612064706174206d676b61726f6e206e672074616d616e6720706720696963702062676f2062756d6f746f2c706172612064207075726f2070726f626c656d612061626f74206e6174656e2c, 17, 15, '', 1250630187, '0', 0),
(298, 0x73656e736974697620616e672067726c732c6d64616c6920636c61206d70696b6f6e, 61, 15, '', 1250630732, '0', 0),
(299, 0x492073756747657374207768656e2061206d656d62657220646f776e6c6f61647a2061202e66696c6520697420776c2064456475637465442031706c757365732f616e642069737567657374206368616e676520746865206e616d65206f66207265747269766577617077617220746f207250472067616d652e20456865, 77, 3, '', 1250631871, '0', 0),
(300, 0x6f6b, 10, 8, '', 1250631920, '0', 0),
(301, 0x53484f5053206e2074686520347274682070616765207374696c20617261776170, 10, 8, '', 1250632055, '0', 0),
(302, 0x7761727a306e65207374696c20276e30772075206e2063616e2077696e2041572075736572203e206177206d65616e7320617261776170, 10, 8, '', 1250632202, '0', 0),
(303, 0x696e206120626e6b2069662075207769647261772069742073617973207520636e20676574207572206372656469747320696e20415720626e6b203b616e64207775642075206d696e64206368616e676520746865206772656174696e677320696e746f20656e676c69736820616c736f207468652067726c2070637472652074686572652066207520636e206d616e6167653f, 10, 8, '', 1250632431, '0', 0),
(583, 0x57656c2c657665727931206f662075732068617320676f7420616e206f776e206f70656e69306e2c20736f207520636e742073743070207468656d206f6e20686f77207468657920657870726573732064697320776f7264732e2e, 65, 12, '', 1250750212, '0', 0),
(305, 0x2e6c6f6c2e204d73756e7572696e67206274612e2e2e2e686568652e2e, 30, 16, '', 1250637240, '0', 0),
(306, 0x416d20736c65657079, 44, 12, '', 1250638126, '0', 0),
(307, 0x206320616b6f206e61206d697a207120756e67206c65746368306e206261626f7920686168612e2e776c616e67206b75326e747261206b6e6720642e2e20616c61206c6e672068656865, 82, 12, '', 1250638963, '0', 0),
(308, 0x43207368616d696520736120746162696e6720646167617420286e616d75326c6f74206e672074616c616e676b6129206e7961686168612e2e, 84, 12, '', 1250639882, '0', 0),
(309, 0x54616d612120, 17, 12, '', 1250640085, '0', 0),
(310, 0x41712073206d652074626e672062686179206e676d756d756e69206d756e69, 84, 5, '', 1250640603, '0', 0),
(311, 0x6420616e67656c, 69, 12, '', 1250641966, '0', 0),
(312, 0x416c6c206f7574206f66206c6f7665, 8, 12, '', 1250642341, '0', 0),
(313, 0x4261646d696e74306e2c766f6c6c7962616c6c, 7, 12, '', 1250642871, '0', 0),
(314, 0x4e796179206b616c626f2068616b68616b, 35, 12, '', 1250643183, '0', 0),
(318, 0x5b625d61726520776520746f6f20646570656e64656e7420306e2063656c6c7068306e653f2068617665207468657920626563306d6520736f206e65636573736172792c74686174207468657920617265206571756976616c656e7420746f206120647275673f20486f77206c306e672063616e2075206c69766520776974686f757420796f7572733f20555220564945575320504c45415345215b2f625d2020, 92, 12, '', 1250649626, '0', 0),
(319, 0x736861744f6e67, 7, 10, '', 1250649706, '0', 0),
(320, 0x546865206f776e6572206973206865726520616c736f20, 13, 12, '', 1250649892, '0', 0),
(322, 0x5368616d69652069732068657265, 20, 12, '', 1250650137, '0', 0),
(581, 0x416d2068617070792063757a206f6c206f6620752068657265206973206e206d7920736964652068656865, 44, 12, '', 1250749910, '0', 0),
(325, 0x69206c796b2073747265657420666f6f64206c796b2069686177206d6d6d2079756d6d792e2e, 26, 12, '', 1250650238, '0', 0),
(326, 0x687567, 24, 12, '', 1250650293, '0', 0),
(327, 0x2e6372792e20, 23, 12, '', 1250650392, '0', 0),
(328, 0x68656865206920677665207520612068756720626162792071, 22, 12, '', 1250650463, '0', 0),
(329, 0x416e643220616b6f20756c692068656865, 11, 12, '', 1250650732, '0', 0),
(330, 0x416e6f206b7961206d616e67796132726920736120616b696e206b6e672062616c6977206e20616b6f, 70, 12, '', 1250651162, '0', 0),
(331, 0x5b625d524554524956455741505b2f625d203d206d65616e73205265766976616c202c207769746820746865207472696e6974792074686520474f4420544845204641544845522c205448452053304e20616e642054484520484f4c59205350495249542e202e202e, 94, 8, '', 1250654575, '0', 0),
(332, 0x536f20627920616c6c206d65616e732074686174206f75722073697465206e616d6520697320484f4c592020776520616c6c206d757374206861766520766973696f6e20616e64206d697373696f6e20616e64207768617420697320746865207265616c20707572706f7365206f6620686176696e6720746869732077617073697465203f20776861742063616e2077652073686f772c20736861726520616e642068656c7020746f206f74686572732061736964652077617070696e673f20776861742063616e207765206c6561726e20616e6420657870657269656e6365206173696465206861636b696e673f, 94, 8, '', 1250654808, '0', 0),
(333, 0x5b625d4649525354205b2f625d203d207765206861766520667269656e6473686970206865726520616e6420666169722066726565646f6d202c2066726f6d206f776e657220746f20737461666620746f206d656d6265722061726520616c6c2068617665207468652073616d652066726565646f6d206173206c6f6e67206173207765206861766520746865205245535045435420202c204c495354454e20544f204f544845525320494445412c20616e6420554e4445525354414e442e202e202e, 94, 8, '', 1250655011, '0', 0),
(334, 0x5b625d326e645b2f625d203d206920656e636f7572616765206576657279626f647920746f207365656b20474f4420666972737420736f2074686174206f757220736974652077696c6c20626520626c6573736564202e202e202e20696e7374656164206f66206669676874696e67202c20626164776f7264732c2063726974696369736d2c2072756c657273202c20776879206e30742070757420696e206f7572206d69737369306e202727544f2048454c50204f54484552204b4e4f572057484f204953204f55522043524541544f52272720736f2074686174207765206c6561726e20616e64206561726e202e202e20, 94, 8, '', 1250655237, '0', 0),
(579, 0x4a757320612073696d706c6520647265616d20692077616e742061206861707079206c6966652c326765746865722077697468206d792068757362616e6420616e64206b6964732c616e64206c697665206e30726d616c206c696665, 58, 12, '', 1250749653, '0', 0),
(336, 0x5b625d3372645b2f625d203d20416e64206c617374206d617920692061736b20796f753f204f6620686f77206d616e79207761707369746520796f75206a6f696e2077686174206469642075206561726e3f2077686174206469642075206c6561726e3f2069206d7573742073617920796f757220616e737765722069732069206d6574206e657720736574206f6620667269656e647320616e642069206669676874206c6f7473206f662070657273306e20746f302e202e202e2072696768743f20, 94, 8, '', 1250655436, '0', 0),
(337, 0x5b625d20536f20686f7065206576657279626f64792067657420776861742069206d65616e2c2077652064306e74206561726e207468732077617070696e67207768656e2069742063306d657320746f206d306e657920746865207265616c697479206973207765207761737465206c6f7473206f66206d306e65792c206c6f6164732c20696e7465726e6574206665652c20656d7469306e616c202e202e616e64206574632e205b2f625d, 94, 8, '', 1250655584, '0', 0),
(338, 0x5b625d4f6620616c6c2074686f7365207468696e67732068617070656e656420524554524956452056495349304e202f4d49535349304e2061726520616c6c2061626f75742053706972697475616c2c20467269656e6473686970202c616e64204c6561726e696e6720646966666572656e742052616365732e202e202e20736f206576656e207765207761737465206d306e657920616e64206574632e2074686520676f6f64207468696e67206973207765204c4541524e2e2e5b2f625d206e3074206a75737420706c61696e2077617070696e67202e202e, 94, 8, '', 1250655767, '0', 0),
(339, 0x446e7420706f73742068766e742066696e69736820796574, 95, 12, '', 1250655847, '0', 0),
(340, 0x5b625d205448414e4b20594f5520414e4420474f4f44204c55434b204556455259304e4520544f204f55522056495349304e20535052454144494e472054484520574f5244204f4620474f442c205245414c204652494544534849502c20414e44204c4541524e2052414345535b2f625d206e30746963653a20776520617265206e30742061207365782077617073697465202e202e202e, 94, 8, '', 1250655906, '0', 0),
(548, 0x5b625d46495253543e3e6e6f2074616c6b696e6720696e7369646520746865207175697a72756d207768696c6520746865207175697a206973206f6e206169722c534543304e443e3e7175697a206d7573742062652072656c61746564206f6e207468697320736974652c67656e6572616c206b6e6f776c656467652c6e65777320746f6461792c6f722061726f756e642074686520776f726b2c2054484952443e3e4561636820717565737469306e20752077696c6c2077696e20612032303063206620752067657420746865206330727265637420616e737765722c20464f555254483e3e546f2074686f7365206a6f696e696e2061207175697a2077696e206f72206c6f7365206765742031303063203420787472612062756e6f732e2e46494654483e3e4f6e6c79207175697a6d6173746572207570646174656420746865206372696465747320746f2074686f7365206a6f696e696e672061207175697a2c4c4153544c59205155495a4d4152544552206465736572766520612035303063203420646f696e206775642061732061207175697a6d61737465725b2f625d20, 95, 12, '', 1250735943, '0', 0),
(343, 0x6875683f, 94, 2, '', 1250657215, '0', 0),
(344, 0x616e672068616261206e6720706f7374206d75207065726f20797520616469637420616b6f2e6669742e, 92, 8, '', 1250657775, '0', 0),
(345, 0x626b69742078692072656c612077616c61207761686168612e6b69636b2e, 93, 8, '', 1250657892, '0', 0),
(346, 0x616d206572652068616861, 11, 8, '', 1250657946, '0', 0),
(347, 0x4d65616e696e67206220696e73656e73697469766520616e6720677579733f202e2e726f6c6c2e, 61, 16, '', 1250658174, '0', 0),
(348, 0x7468616e6b732034207761726d2077656b636f6d65, 91, 8, '', 1250658269, '0', 0),
(349, 0x68616861686120616e67206d67207369676e20626779616e207120353063206861686168616861202e726f6c6c2e20616e306e672070616c616261732032206e61693f202e636f6e667573652e, 93, 10, '', 1250658280, '0', 0),
(350, 0x643220616761696e, 20, 10, '', 1250658372, '0', 0),
(351, 0x6d616e6977616c61206b6c616e672062686520736b616e7961206174206d67707261792c2073617361676f742064696e207369612073612074657874206d6f2e2e2e206f6b65693f, 19, 15, '', 1250658487, '0', 0),
(352, 0x65787472656d65207468696e67732062612079306e6720687567206e61693f203f204861686168612e636f6e667573652e, 22, 10, '', 1250658493, '0', 0),
(353, 0x436c65616e696e67206d79202e746f696c65742e207769746820757220746f6f74686272757368206e616920686168616861202e726f6c6c2e202e74656574685f62727573682e, 22, 10, '', 1250658569, '0', 0),
(354, 0x636775726f206e676120696e73656e73697476652073696c613f2068656865686520286a6f6b6529, 61, 15, '', 1250658574, '0', 0),
(355, 0x746e78206e616e616920616476616e6365206861707079206264617920686568656865202e706d706c2e204e455854202e70756e63682e20486168616861, 24, 10, '', 1250658670, '0', 0),
(356, 0x616b6f20616c616d206b6f206b756e672073696e6f2c20627761686168616861682028776c612079616e2c2074696e67696e206b6f206c616e672068613f2074686579206f6e6c7920656e6a6f792065616368206f746865727320636f6d70616e792920756e20796f6e2120616d656e212077656865686568656865, 59, 15, '', 1250658707, '0', 0),
(357, 0x52656c61206920677665207520616c736f20773820686568652e2e626162792071206368696b616475726120616c657861202e6e656e652e, 93, 12, '', 1250658739, '0', 0),
(358, 0x626271, 26, 10, '', 1250658774, '0', 0),
(359, 0x6d6168696e6120616b6f20736120686973746f72792065682c2c2c2c2061686d6d6d207077656465206d617468206e6c616e673f20686568656865, 16, 15, '', 1250658844, '0', 0),
(360, 0x6e6169202e6372792e204c6573736f6e2064773f202e6372792e, 23, 10, '', 1250658948, '0', 0),
(361, 0x7075736f7920646f732068616861686861206a6f6b65, 7, 15, '', 1250658960, '0', 0),
(362, 0x2e6f6f70732e20736f726920686568652c7069656365207468616e6b732064696e2e2e, 64, 12, '', 1250659498, '0', 0),
(363, 0x446f4e2774206a75646765207468652062306f6b206279206974732063307665722e2e, 23, 5, '', 1250659522, '0', 0),
(364, 0x57656c6c2c6974206470656e6473206d6179626520306e2077686f20796f7527726520686174696e6720616e642077686f20796f75277265206c6f76696e672e2e2e, 65, 12, '', 1250659756, '0', 0),
(365, 0x486d6d2c7468652062657374206d306d656e74206973207768656e20696d20776974682068696d2e2e, 66, 12, '', 1250659832, '0', 0),
(366, 0x4d7920706172656e74722077686f2064696420746861742c6d79206d306d2066656564206d652c6e6f75726973686564206d6520616e64207465616368206d652e2e20, 57, 12, '', 1250659945, '0', 0),
(367, 0x20492064756e6e6f2e202e69662069206b6e3077206920686174652074686520706572736f6e2e202e692077696c207265616c6c792068617465207468617420706572736f6e206e6f206d617474657220776861742e202e6275742069206861766520612074656d706572207468617420666c617368657320757020717569636b6c792062757420697320717569636b6c792063616c6d656420646f776e2073686f77696e6720627574206c6974746c652076696f6c656e63652e2079306e2062616e672067616c69742061712074617a2070756e74612061712073206d676120706c61636573206e61207468696d696b206f72206d6167756c6f206e77776c61206e612067616c697420712070726f206e64207061206e77776c6120616e6720676c6974207072616e672069206a7573742068696465206974206c616e672e204865686520627374612e20, 65, 10, '', 1250660393, '0', 0),
(368, 0x6e616e616920494e20706f, 13, 10, '', 1250660475, '0', 0),
(369, 0x54686520737065726d2063656c6c20616e6420746865206567672063656c6c2e204861686168616861207468657920636f6d62696e652065616368206f746865722e202e202e616e6420666f726d20616c657861207468652067726561742e202e74686520666173746573742e202e20416e64207468652070617861776169206861686168616861202e706d706c2e, 57, 10, '', 1250660649, '0', 0),
(370, 0x5468652062657374206d306d656e742075686d6e2120486d4d6d2e202e202e74696b7265742e202e, 66, 10, '', 1250660906, '0', 0),
(371, 0x2e65786163746c792e206e616e616920326c6164206e656f2068616861686168612062696e6973746f2e20, 67, 10, '', 1250661009, '0', 0),
(372, 0x686e64692074696e676e616e20712078616e61206b756e61206e61672068756761732062206e67206b616d61792c202e6d7761686168612e, 32, 8, '', 1250662488, '0', 0),
(373, 0x2e6669742e206d61792074616d61206b612074652068616b2068616b, 17, 8, '', 1250662551, '0', 0),
(374, 0x7361206c6f6f62206e67206b61686f6e2068656865686865, 84, 15, '', 1250662580, '0', 0),
(375, 0x75686d202e2027203f2e7468696e6b2e, 84, 8, '', 1250662735, '0', 0),
(376, 0x686d70206c756b73306e672074696e696b, 7, 8, '', 1250662872, '0', 0),
(377, 0x7368616d7075202e63616b65642e, 69, 8, '', 1250662999, '0', 0),
(378, 0x616b6f206e6761206b6177206e616d616e202c, 102, 8, '', 1250663269, '0', 0),
(379, 0x776c6120627562306e67206e6b697461207120786120746161732065683f202e70656163652e206d756120, 101, 8, '', 1250663318, '0', 0),
(380, 0x2e67756e2e20636e753f, 100, 8, '', 1250663369, '0', 0),
(381, 0x776c61206c616e672e77616c6b, 98, 8, '', 1250663420, '0', 0),
(382, 0x2e6b69636b2e2077616861686168612e2e202e202e2061766f696420707265206d61726974616c2073657821, 34, 8, '', 1250663522, '0', 0),
(383, 0x61726179206b6f206e616b757720706f2074616d61616e20786c61202e70756e63682e, 59, 8, '', 1250663626, '0', 0),
(384, 0x617261792c206274206d6b6f20626f6b73696e673f2068756875687520, 59, 15, '', 1250664296, '0', 0),
(385, 0x686f6e6573746c792c20692063616e742c206d75736963206973206d79206c6966652c20287768656e20696d207361642c2068617070792c2075707365742c206576656e206c6f6e656c7929, 89, 15, '', 1250664475, '0', 0),
(386, 0x70617361776179206c656164657221, 69, 15, '', 1250664583, '0', 0),
(387, 0x796561682c796561682c796561682c202874696d65732031206d696c6c696f6e292061646469637420616b6f2c206c616c6f206e612064776e6c6f6473206865686568656865, 92, 15, '', 1250665037, '0', 0),
(388, 0x646f6e6b65792c206561676c65, 42, 15, '', 1250665227, '0', 0),
(389, 0x2e70617361776179206370612e202e687568752e, 69, 8, '', 1250665260, '0', 0),
(390, 0x776c612c206b6320616c6120616b6f20676e61676177612065682c206865686568686520, 98, 15, '', 1250665310, '0', 0),
(391, 0x2e637564646c652e20776568206b617720706c6120756e67206e74616d61616e20712e6c6f6c2e, 59, 8, '', 1250665344, '0', 0),
(392, 0x7369202e2e2e20736563726574202868656865686529, 100, 15, '', 1250665373, '0', 0),
(393, 0x416e75206b7961206b6e6720686e64206e672d6576306c766520616e672074616f3f, 70, 27, '', 1250665392, '0', 0),
(394, 0x6f6f206e6d616e2c20736973206b6f2079616e206568, 101, 15, '', 1250665427, '0', 0),
(395, 0x746f6b206e656e656e672c20626f6b6e6f792c20, 26, 15, '', 1250665524, '0', 0),
(396, 0x416e75206b7961206b6e67206275627579306720616b6f2e2c686168616861, 70, 27, '', 1250665566, '0', 0),
(457, 0x416e4f206b6561206b756e6720756e676f7920616e6720616d61206e6720627574746572666c793f204861686168616861202e726f6c6c2e, 70, 10, '', 1250680893, '0', 0),
(398, 0x73656e64696e67206672657368207374726177626572726965732066726f6d2062616775696f2c20776865772e2e2e2070616e6f206b61796120756e3f2068616e6767616e67206e6761756e2069736970206b6f20706172696e2065683f2068656865686520736120626f74746c65206e6c616e672068616861686168, 22, 15, '', 1250665678, '0', 0),
(399, 0x6f6b206c616e67207369732c6b6869742073697061696e206d6f2070616b6f2c206420616b6f20636f6d706c61696e2c20286273746120696b617721292068656865, 59, 15, '', 1250665857, '0', 0),
(400, 0x6d7920736176696f75722c206d7920626573746672656e2c206d79206d6f6d2c206d79206461642c206d7920636f6d666f727465722c, 28, 15, '', 1250666785, '0', 0),
(401, 0x4e796168616861206c61622075206d776168, 91, 12, '', 1250668089, '0', 0),
(402, 0x686568652073616d6520686572652e2e6d792064617920626f72696e672066206920636e7420686561726420746865206d75736963206576656e20616d20306e2077617070696e67206d79206d703320697320616c736f20776f726b696e6720686568652e2e, 89, 12, '', 1250668704, '0', 0),
(403, 0x4d75736963206973206d792070616b6e657273206e206c6966652e2e7769646f7574206461742e2e6920636e74206c6976652e, 89, 12, '', 1250668769, '0', 0),
(404, 0x48656865206265737420712079616e21, 101, 13, '', 1250669022, '0', 0),
(405, 0x53656b726574216b617520636e75206d68616c206e753f, 100, 13, '', 1250669094, '0', 0),
(406, 0x416b6f20756c6974206b6177206e6d616e2c, 102, 13, '', 1250669573, '0', 0),
(407, 0x576c6120746c676120617120676e616777612070656b736d616e21, 98, 13, '', 1250669670, '0', 0),
(408, 0x32342f37206d792066306e2069732077697468206d65206e7961686168616861, 92, 10, '', 1250669674, '0', 0),
(409, 0x32342f37206d792066306e2069732077697468206d65206e79616861686168612e202e202e726f6c6c2e205458546361686f6c6963202e202e6e4f7720434841546361686f6c6963, 92, 10, '', 1250669727, '0', 0),
(410, 0x486f6d65206e616b75207479616b20706167206e72696e6967206d6f206532206d70617061757769206b6e61206e672070696e617321, 104, 13, '', 1250670016, '0', 0),
(411, 0x6f6b2074706f73206b617720756c69, 102, 8, '', 1250670034, '0', 0),
(412, 0x696b617720636e75206d6168616c206d753f, 100, 8, '', 1250670084, '0', 0),
(413, 0x6b616d6f7420756c6f202120636e75206b61206220786120627568617920713f, 101, 8, '', 1250670135, '0', 0),
(414, 0x2e6b69636b2e2061796f73206c696272652073697061207761686168612e70656163652e, 59, 8, '', 1250670194, '0', 0),
(415, 0x6171206e616e696e6977616c612068656865, 103, 8, '', 1250670270, '0', 0),
(416, 0x4f6f2068306e20712079616e2065682068656865, 101, 12, '', 1250671001, '0', 0),
(417, 0x6f746f6c20712079616e2068616861207975622075, 101, 8, '', 1250671231, '0', 0),
(418, 0x4d6168616c20712073656c6620712c6d6168616c2071206320676f642c6d6168616c2071206b61752e2e, 100, 12, '', 1250671366, '0', 0),
(419, 0x4168656d6d21206b6175206b617520616b6f20322063207368616d6965206275616e67206168656865, 102, 12, '', 1250671431, '0', 0),
(420, 0x73756767657374696f6e2c20736e6120776c616e67206c696d697420756e67207061672073686f75742c2069206d65616e2c20776c61207265717569726564206e612063726564697473207061672073686f75742c2064623f2064617961206e6d616e20687568756875, 77, 15, '', 1250671472, '0', 0),
(421, 0x77616973742e63616b65642e206d75737461206e617064616c6177206b6120686168616861, 102, 8, '', 1250671494, '0', 0),
(422, 0x4f6f2c6d6172616d6920616b6f20616c616d2e2e69322078616d706c653a206261686179206b75626f206b61686974206d756e74692c616e672068616c616d616e2064306f6e20617920736172692073617269206f6820616e6f68206f6b206e623f, 104, 12, '', 1250671538, '0', 0),
(423, 0x7765686168612067616e756e20746c6761207465206865686520, 77, 8, '', 1250671552, '0', 0),
(424, 0x656820626b6974207361206b62696c612064623f206e6b616b6173686f757420616b6f2e2e2e20687568756875, 77, 15, '', 1250671600, '0', 0),
(425, 0x6c686174206d68616c206b6f2062737461206d68616c20616b6f206b68697420746f6d626f7920706120776168656865686565, 100, 15, '', 1250671667, '0', 0),
(426, 0x416c61206c6e67206e6b6174616e67612073612068616e67696e206e6b6162756b6120616e672062756e67616e67612e2e6e7961792070613273756b696e206e61206e67206c616e67617720686168616861, 98, 12, '', 1250671702, '0', 0),
(427, 0x44756d75676f20696c306e6720712064756e2061682c20686168612075322c6e616b6132616444696374206e6761206d6167207761702c206c616c6f206e2073206430776e6c6f616420616e6420633064696e672e202e202e2021, 92, 19, '', 1250671892, '0', 0),
(428, 0x686d70206d6168616c20712079306e67206d6168616c206171207061672064206e7961206171206d6168616c2064207761672e6b69636b2e, 100, 8, '', 1250671918, '0', 0),
(429, 0x756f206e616c75326b61206e20646e20617120786120636f64696e672068616b2068616b2e6372617a792e, 92, 8, '', 1250671974, '0', 0),
(430, 0x666c792e, 11, 13, '', 1250672154, '0', 0),
(431, 0x2c642061712066616e73206e692072656c612e2e78612066616e7320712168656b2c68656b2c68656b2c6b7720636e742066616e73206d6f3f, 97, 13, '', 1250672315, '0', 0),
(432, 0x2c6d61676b6169626120756e2074756e67656b21706170616d70616d20616e67206c61796f206e6d616e206e6720706172756d706170616d70616d21647061207061736b6f206e6761756e206e6f683f, 12, 13, '', 1250672599, '0', 0),
(433, 0x616b6f20686e64692070696e6f792c207065726f20677573746f206b6f206d6167696e672070696e6f79207765686568652066726f6d207468652063697479206f662073746172732121212077696e746572736e6f772c2069207468616e6b20796f752121, 4, 15, '', 1250672875, '0', 0),
(434, 0x61726179206b6f2c2077617761206e6d616e2074696e756c616b206d6f2072656c612c2064706174206a616e20642074696e7574756c616b2c20647061742070696e61706174617921212121206772727220686568656865, 100, 15, '', 1250673019, '0', 0),
(435, 0x7361206b62696c612073696e616479612079306e206b63206d6164616d69206572726f722e2068656865, 77, 10, '', 1250673057, '0', 0),
(436, 0x61792067616e6f6e2062613f2068756875, 77, 15, '', 1250673126, '0', 0),
(437, 0x74656b61207368616d69652c206261676f2070756d61736f6b2073612062756e67616e6761206d6f2c207370726179206d756e61206b6f20626179676f6e2c2c2c686568656865, 98, 15, '', 1250673185, '0', 0),
(438, 0x77756921202e67756e2e, 98, 8, '', 1250673227, '0', 0),
(439, 0x2e67756e2e206179616e2070616b746179206320627574696b6921202e70656163652e, 100, 8, '', 1250673277, '0', 0),
(440, 0x6f6f206e6d616e20616b6f2070613f2068656865686865, 30, 15, '', 1250673345, '0', 0),
(441, 0x34206168206c756d756e646167206c616e6720616d616e2064206e616d616e206c756d6162732064623f202e67756e2e, 107, 8, '', 1250673351, '0', 0),
(442, 0x656820677573746f206b6f207061736b6f2065682c20626b69742062613f202868656865686529, 12, 15, '', 1250673398, '0', 0),
(443, 0x7775692e67756e2e20616e756e67206177617920746f3f, 12, 8, '', 1250673398, '0', 0),
(444, 0x6a6f6b65206c616e672068616861686120, 12, 15, '', 1250673453, '0', 0),
(445, 0x686d70206977616e202120756e67206266207120617261626f2068616b2068616b, 30, 8, '', 1250673534, '0', 0),
(446, 0x7368617665206e696f2062616c616869626f206e6720616c616761206e696f2061736f2c2067757973207472792069742c20676167616e64612061736f206e696f2c2070656b736d616e2121206865686865, 35, 15, '', 1250673545, '0', 0),
(447, 0x646f6e74207468696e6b206f662069742c20736f207520776f6e742062652074656d7074656420746f20646f2069742120286b617961206e696f3f29206462612074616d61206b6f3f2070616c616b70616b206e6d616e206a616e206f683f206e6761796f6e206e6761206c616e6720616b6f20706f73742073612067616e69746f20746f7069632065682e2e2e202862776168616861686129, 34, 15, '', 1250673661, '0', 0),
(448, 0x616b6f206261676f2c20286b616861706f6e292c206e6761796f6e206c756d6120286865686529, 3, 15, '', 1250673830, '0', 0),
(449, 0x776f77206b7579612069616e20686e6469206e616d616e206b6173692073756d617361676f7420786920474f4420706167207075726f206b61206c616e672061736b20616e6420626c616d652048696d2074727920746f206f70656e207572206865617274206e20616e6a616e2078612c2061712069444f2062656c696576652048494d206f66206f6c20746865206d696c69306e206f6620707261796572732071206c6168617420636e676f74206e796120686e64206e6761206c616e672072757368207065726f206e61676b612032326f20746c67612c20686e64206e616d616e207473757065722072656c6968796f73612067616c696e672071206e6761206d6167206d757261207065726f207265616c792069206b6e307720616e64206920646f2062656c696576652048494d2e, 19, 8, '', 1250673830, '0', 0),
(450, 0x616b6f2064696e206268652c206e6f20636f6d6d656e742c20756e6c657320616b6f206d61686561646c696e652064746f2c206b756e6469207461676f206e61206b61752028646168696c207575627573696e206b6f206c616869206e696f21212920776861686168616861206a6f6b65206c616e6721206b6175206e6d616e2c20646b6f206e6d616e206b6175206b696c616c6120286c616869206e696f207061206b6179613f292068656865, 6, 15, '', 1250673916, '0', 0),
(451, 0x77616861686168616861206174616b6f7420616b6f20747361796f21, 6, 8, '', 1250673990, '0', 0),
(452, 0x4f6b206e612073616e612e202e626b74206d79207365783f204861686168616861202e62616e672e20, 94, 10, '', 1250675178, '0', 0),
(453, 0x5755492e67756e2e20616e756820746f20686e642061712061727469737461206d61792066756e7320636c7562207761686168616861, 97, 8, '', 1250675717, '0', 0),
(454, 0x6e796148614861486120616e672070614c614b61206b694c614c6120714f772720686168616861206179616e2075682120794f6e67206b75616e2e202e794f6e672078756d756e4f6420786b696e20686168616861202e70756e63682e202e726f6c6c2e, 6, 10, '', 1250676077, '0', 0),
(455, 0x5068696c697070696e6573206c616e64206f6620616c6c206e4f797069202e706d706c2e, 113, 10, '', 1250680326, '0', 0),
(456, 0x496e205068696c697070696e65732074686520636f6d6d6f6e20747261697473206f6620612066696c6970696e6f2061726520484f5350495441424c452e, 114, 10, '', 1250680441, '0', 0),
(458, 0x77656820617420616e3068206b617961206b756e6720616c6977617320616e67206e616e6179206e696c613f202e6c6f6c312e, 70, 8, '', 1250681081, '0', 0),
(459, 0x69276d206e6577626965202e706d706c2e20692065787065637420692077696c206265636f6d652074686520747265617375726572206861686168616861202e726f6c6c2e20, 112, 10, '', 1250681139, '0', 0),
(460, 0x2e7368616b652e557220686f6e6f7220746869732077696c6c2062652074686520626573742068616e676f75747320666f7220757320636f7a2077652061726520626c65737320696e2074686520666972737420646179206f66206f7065726174696f6e2c20776520676f74206c6f742773206f6620776170706572277320616e6420616c6c20617265206163746976652e202e616e642074686520746f706963206f66206561636820666f72756d732061726520616c69766520616e64206e6f7420626f72696e67206f6e6527732e205468652073746166662061726520656e657267657469632e206168656d21202862756c6f6e67206d6f6465292062756e6f7320712068616861686168612e202e746f206265206672616e6b2061626f757420697420616d2e202e74686520736974652069732066756c6c206f66204c4f56452c2047524143452c20414c4956452c204143544956452e202e4c6f7264207765206f6666657220752074686973207369746520746f2073686172652074686520476f7370656c206f6620594f555227732e2050726169736520476f642e202e202e706f702e202e6161612e, 85, 10, '', 1250681851, '0', 0),
(461, 0x5b625d5570646174653a5b2f625d5b636c723d7265645d5b62722f5d505249564154452052554d202049532046495845445b62722f5d47544e2047414d455320495320574f524b494e472046494e45205b62722f5d444f574e4c4f4144532049532046495845445b2f636c725d, 10, 11, '', 1250683704, '0', 0),
(462, 0x697420776f756c64206265206772656174207769746820474f4427732068656c70202e202e202e207468732077696c2062652061776573306d6520616e642066616e7461737469632073697465202e202e202e202e20616e6761742071206c616e67207061746161732061682c202e6c6f6c2e202e202e202e20776973206f6c206775646c75636b202e202e202e6c616c612e, 85, 8, '', 1250686568, '0', 0),
(463, 0x6920657870656374206c306e67206c61737420667269656e64736869702e202e, 112, 8, '', 1250686624, '0', 0),
(464, 0x57652063616e206265207375726520746861742048452077696c2074616b652063617265206f66207573206e6f206d6174746572207768617420326d726f77206272696e67732e2049742773206265747465722c207468657265666f72652c20746f206265207769736520616e6420545255535420544845204c4f52442e20205765206e65656420746f20726d6d62722074686174206f75722048656176656e6c7920466174686572206b6e6f777320616c6c2061626f7574206f757220736974756174696f6e20616e64207761746368652773206f7665722075732e20286d6174746865772032383a33342920616e676174207061202e6161612e202e706f702e, 85, 10, '', 1250687510, '0', 0),
(465, 0x2e6661696e742e204e6168696c6f20616b752064756e206168202e6c6f6c2e, 81, 11, '', 1250688350, '0', 0),
(466, 0x696d20696e2068306e67206b306e6720746865206e306e6520736c656570696e6720616e642073686f7070696e67206369747921202e7572612e, 114, 8, '', 1250688556, '0', 0),
(467, 0x686f727365, 43, 15, '', 1250689989, '0', 0),
(468, 0x416d207665727920686170707920322068656172642074686174206672306d2075206769726c732e2e68307065207468697320697320746865206c617374206e2020666f72657665722068306d652e2e676f6420626c657373207573, 85, 12, '', 1250691185, '0', 0),
(469, 0x66696c6970696e65732c64206f6e6c7920636e74727920776964207061736177617965727321206865686568652c20, 114, 15, '', 1250691438, '0', 0),
(470, 0x73616c6974612c6f722070696e6f79206e616b61696e74696e64692e2e696e7374696b20686e64206e6b61696e74696e64692068656865, 99, 12, '', 1250691465, '0', 0),
(471, 0x6c6f73742061637475616c792c646e74206b6e77207768657220746f2073746172742c20, 111, 15, '', 1250691539, '0', 0),
(472, 0x4174652067726163652077616b2067616e756e2068756875, 84, 12, '', 1250691542, '0', 0),
(473, 0x536120636f6d70757465722073686f702c206e6167206f4f6e6c696e652067616d6573, 84, 11, '', 1250691771, '0', 0),
(474, 0x5341206d6761206e616b616c69706173206e206b6173617920736179616e202e202e202e, 116, 8, '', 1250691772, '0', 0),
(475, 0x77656e206d79206d6f6d2073207374696c20616c6976652c7765207573656420746f20676f2073686f70696e672c616e64207069636e6963732c69206d697373642074686f736520646179732c65767279206e79742069206372792077656e206920726d656d6272206865722c6576656e206e6f772c206d6f6d2069206d69736420752c20692072696c7920646f2e2069206f6c7779732061736b20676f642c77687920753f77687920617420616e206561726c79206167653f6d6f6d2c2069206c6f766520752c77652061732075722066616d696c79206c6f7620752076657279206d7563682e206974732072696c79207061696e66756c2c65767279746d206920676f203220636d657465727920616e642073656520686572206e616d652c6920636e74207374696c20696d6167696e6520746861742077652764206c6f7374206865722e2e2e20, 115, 15, '', 1250691956, '0', 0),
(476, 0x4f6b20706f6820626162792071, 13, 12, '', 1250693099, '0', 0),
(477, 0x2e6372792e2069276c6c206265206261636b202e2e, 115, 12, '', 1250693300, '0', 0),
(478, 0x6e79616861686168612e2e, 57, 12, '', 1250693379, '0', 0),
(479, 0x486d6d2c646174732074727565207468657265206172652073306d652070656f706c65206c796b206461742c, 65, 12, '', 1250693690, '0', 0),
(480, 0x62686c61206b617520736120636f64696e672062787461206171206d79206d6b61757a61702068616861686120, 92, 10, '', 1250696165, '0', 0),
(481, 0x5965732c206e30776164617973206966207520646e7420686176652066306e20752063616e206e6f7420636f6d6d756e6963617465207572206c6f7665206f6e65277320656173696c792e, 87, 10, '', 1250696323, '0', 0),
(482, 0x6e79614861486148612064206e64206e6c616e67206d67546e616e2e202e202e6d6168614c206d6179616e67206762692073614c7568696e206d4f20712073612062696e54616e612e202e6861686168616861202e726f6c6c2e, 30, 10, '', 1250696929, '0', 0),
(483, 0x68616861686120653220794f6e67206d47616e64616e672073704f74206c696768742e202e696c6162617320616e6720636f6b652e202e202e686168616861686120636e4f20616e67206d54546d61616e3f2e202e202e636e4f20616e67206e546d61416e3f20416c616d696e206e7961486148614861206d7920697861206e672070756d61786f6b2e202e202e, 59, 10, '', 1250697512, '0', 0),
(484, 0x6162616821207379656d707265272069207374694c2062654c6965766520696e204c6f76696e6720752e202e6d757369632e206e796168616861686120326b20326b2e202e202e6d79206d54546d61616e20754c6974206e69746f202e746f6d61746f2e, 103, 10, '', 1250697634, '0', 0),
(485, 0x4d6168616c206b6f20756e6720776c616e67206e6167206d616d6168616c202e726f6c6c2e202e677564626f792e, 100, 11, '', 1250697871, '0', 0),
(486, 0x546177612070612e202e6861686168616861686120616761696e202e726f6c6c2e20486168616861, 57, 10, '', 1250698886, '0', 0),
(487, 0x45686520636f70797061737465206c6e67206479616e206d67612077706d7374723d3e, 81, 3, '', 1250702607, '0', 0),
(488, 0x4174652072656c61207061676e646168696e2075206e616d616e2077656e7275207120746e746d6164206e71206975706461746520652e7761616a616a616a61, 92, 3, '', 1250703698, '0', 0),
(489, 0x6e6f70652c77656e20692068382073756d312c20692072696c7920683820686d2c20746865726573206e6f20706f696e74206f66206c6f76696e6720686d2e79616e6720636e617362696e672064206d6f726520752068382064206d6f72652075206c6f76652c6b706c617374696b616e2079616e2c6174206e76657220616b6f206e6167696e6720706c61737469632e77656e206920686174652068696d2c692072696c792068382069742c7468617473206974, 65, 15, '', 1250711417, '0', 0),
(490, 0x776c61206b6f206d74616e6461616e2c6e7874207175657374696f6e20706c732e2e2e, 66, 15, '', 1250711662, '0', 0),
(491, 0x746e6f6c612c6d656e75646f2c61646f626f2c61667269746164612c656761646f, 82, 15, '', 1250711941, '0', 0),
(492, 0x696d206e74206f6b2c20616c7761797320687572742c20692077616e61206372792c2074697373756520706c732e2e2e, 44, 15, '', 1250712042, '0', 0),
(493, 0x6265636f6d696e67206120736369656e746973742c2069747320642070726f666573696f6e20697665206f6c777973206472696d64206f662073696e63652069207761732061206b6964, 58, 15, '', 1250712323, '0', 0),
(494, 0x6920646e74206b6e772c2069662064203173742069732072696c79207061696e66756c20737563682064617420752063616e206e6f206c6f6e67657220746f6c65726174652069742c64656e20692074686e6b206e6f206d6f726520326e64206368616e63652c2069747320656e616621, 54, 15, '', 1250712588, '0', 0),
(495, 0x6e6f206361726520617420616c6c2c686520646f65736e74206b6e7720697420616e797761792c6f72206a75732069676e6f72696e6720642074686e6773207576206265656e20646f696e6720746f2068696d2c6576656e206620736f2072696c79206f6276696f75732e20696e73656e73697469766974792c20692074686e6b2064617473206420727974207465726d2e2e, 49, 15, '', 1250712926, '0', 0),
(496, 0x642079746120616b6f206e77616c61206a616e20616c657820686568656865, 103, 15, '', 1250713490, '0', 0),
(497, 0x6e6f2c69747320757220666169746820746861742073617665732075, 109, 15, '', 1250713613, '0', 0),
(498, 0x53696d706c65206c6e6720756e6720766964656f207065726f20637265657079207861207320616b696e203e3e2d3e2043454d45544552592062792053494c5645524348414952, 90, 14, '', 1250716762, '0', 0),
(499, 0x416b6f2064696e2e204e676e672074686572617079206b6f206e2065326e67206d75786963206c616c6f206e206b7067206420616b6f206d6b326c6f67207320676269, 89, 14, '', 1250716843, '0', 0),
(500, 0x546d6120632077696e746572206e30206f6e6520636e2073617665207520706764746e672073612072656c6947696f6e20304e4c5920464149544821544f20474f442e4163434550742068696d206173207572204c6f726420616e6420736176696f722e68626e67206e62756275686179206b70612e6c6966452e49532053484f527421, 109, 3, '', 1250717276, '0', 0),
(501, 0x6d62756861792061712062737461206d6179207061676b61696e206c616e67, 89, 8, '', 1250720029, '0', 0),
(502, 0x2e6b69636b2e202e746f6d61746f2e2061776f736821, 103, 8, '', 1250720096, '0', 0),
(503, 0x64696e696e6764696e67202c2070616b626574206174206d306e67676f2e, 82, 8, '', 1250720153, '0', 0),
(504, 0x6b617369206c616c616b69206b6120686168612e706d706c2e2064796f6b, 111, 8, '', 1250720419, '0', 0),
(505, 0x2e6b69636b2e20776168616861686120, 6, 8, '', 1250720490, '0', 0),
(506, 0x7765682064697320616772656521, 61, 8, '', 1250720767, '0', 0),
(507, 0x2e7572612e2070, 11, 8, '', 1250721510, '0', 0),
(508, 0x436e753f202e6b69636b2e, 100, 8, '', 1250721626, '0', 0),
(509, 0x2e6b69636b2e207520786120626e67696e206e2062616775696f20706171612067756c306e67206b20706170756e74616e67207a616d6230616e67612062697420626974696e206d756e6120737472617762657279202e706d706c2e2070697a2e, 22, 8, '', 1250721779, '0', 0),
(510, 0x416e30682079616e2074653f2068656865206669736862616c6c, 26, 8, '', 1250722518, '0', 0),
(511, 0x6f6b20706f, 119, 8, '', 1250723276, '0', 0),
(512, 0x4f6b656920706f2e2e63306d6520616e64207669736974206d7920736974652e2c7369476e206e20646e206b617520676220712e2e2e5b62722f5d5b75726c3d687474703a2f2f33672e6d79676c6f62652e636f6d2e70684070696563652e77656e392e6e65745d70696563657761705b2f75726c5d20746e782e2e2e, 119, 5, '', 1250723397, '0', 0),
(513, 0x20746f206265207361746973666965642e2e2e2049206c696b6520746f20747279206c61726765722073697a652121204e79616861686168615b6269675d205b636c723d7265645d5741524e494e47205448495320495320464f52204144554c54204f4e4c59215b2f636c725d5b2f6269675d, 36, 2, '', 1250723867, '0', 0),
(514, 0x6a75737420636c69636b2064697320757020746f206d616b65206d792064726167306e2067723077206661737465722e2e5b75726c3d687474703a2f2f616b697261392e647261676f6e61646f70746572732e636f6d5d6d7974686963616c647261676f6e5b2f75726c5d2064306e2774207730727920692077696c4c20636c69636b207572532074306f2e2e2e, 120, 5, '', 1250723916, '0', 0),
(515, 0x41647269616e206d61616d2061742075722073657276696365, 13, 14, '', 1250725281, '0', 0),
(516, 0x61647269616e2c2032362c20677761706f2066726d20646176616f20636974792e2073756d2073617920696d206375746520616e642061646572732073617920696d2073776565742e, 14, 14, '', 1250725421, '0', 0),
(517, 0x496d206e307365626c65656420627574203134333434, 67, 14, '', 1250725562, '0', 0),
(518, 0x53616d6520686572652068656865206920646e74206b6e772077657220746f2073746172742e2e20, 111, 12, '', 1250725842, '0', 0),
(519, 0x41707072656369617465206c6e6720736e6120616e672067757332206b6f206d6b746120736175206b6320676e677761206b6f206e6d6e206c68742070617261206d676e67206d6173617961206b612e20416e797761792c2073616c616d617420706c612c2062686562652c207361206269676179206d306e67206c6f6164, 49, 14, '', 1250726033, '0', 0),
(520, 0x492065787065637420612068617070792066616d696c792068657265, 112, 12, '', 1250726148, '0', 0),
(521, 0x616d2070726f756420746f2062652070696e6f792120, 114, 12, '', 1250726289, '0', 0),
(522, 0x4e61206d6973207120756e67206d6f6e67676f2077696420616d70616c617961206c65617665732c74696e6f6c61206e61206e617469766520636869636b656e2c6d6d6d2e656174696e672e20, 82, 12, '', 1250726645, '0', 0),
(523, 0x47757332206b6f2062616c696b616e206b756e6720636e75206d616e20756e6720317374206b697373206b6f206e756e67206e73612062616e796f206b6d69206e616c6932676f, 115, 14, '', 1250726657, '0', 0),
(524, 0x6f707a2e72656164696e672e, 49, 8, '', 1250726698, '0', 0),
(525, 0x68612e7468696e6b2e206173616e20616b6f3f, 67, 8, '', 1250726783, '0', 0),
(526, 0x6d652c6d696e73616e207361206c6f6f62206c6e67206e67206b776172322e2e, 84, 12, '', 1250726789, '0', 0),
(527, 0x696d2072656c612066726d20646176616f2067776166612120616e672070756d616c6167202e6b696c6c2e207376206e696c61206d6174696e6f20616b6f207065726f207376206c616e6720756e202e202e202e20, 14, 8, '', 1250726872, '0', 0),
(528, 0x643220616b6f2e7572612e206e61677061706170617061706170617061706170617061736177617921, 13, 8, '', 1250726921, '0', 0),
(529, 0x7669736974205b75726c3d687474703a2f2f72656c612e77617068656172742e636f6d5d434c49434b204e594f20544f204d41592043484f434f4c4154452043414b452e5b2f75726c5d, 119, 8, '', 1250727039, '0', 0),
(530, 0x4920636e7420736c65657020776964206f7574206d7573696320736f2068616e6767616e67206d616764616d6167206e6b61206d75736963206d6520736172617020326c6f672071206e79616e2e, 89, 12, '', 1250727202, '0', 0),
(531, 0x4b61707265, 121, 13, '', 1250731492, '0', 0),
(532, 0x4d616e616e616e6767616c, 121, 13, '', 1250731566, '0', 0),
(533, 0x417377616e67, 121, 13, '', 1250731613, '0', 0),
(534, 0x4477656e6465, 121, 13, '', 1250731748, '0', 0),
(535, 0x6974206d6967687420626520796f75207461746169, 67, 10, '', 1250733108, '0', 0),
(536, 0x686169, 20, 10, '', 1250733282, '0', 0),
(537, 0x416e4f2079306e3f2064207061206171206e6b6b61696e206e79616e2e2055686d6e2e2062616c6f7420, 26, 10, '', 1250733367, '0', 0),
(538, 0x686d4d6d206e72696e69672071206c6e672064617469206e786248616e206171206e79616e206861686168616861206861697a74212073616d70614c203220746845206d61782e202e202e62726f6b656e2e, 122, 10, '', 1250733583, '0', 0),
(539, 0x4861486148614861202e70756e63682e20426b74206d4f2071206b69636b2e206b5720624120794f6e672070614c614b613f203f6861686168616861202e726f6c6c2e, 6, 10, '', 1250734345, '0', 0),
(540, 0x746f6d62616e6720707265736f20686168616861, 7, 10, '', 1250734439, '0', 0),
(541, 0x687474703a2f2f726574726976657761702e776170746f702e6d65, 126, 8, '', 1250734487, '0', 0),
(544, 0x5b625d46495253542057494e4e45523e3e67657420736d617274206c6f6164206f7220676c6f62652e2e2e53504f4e534f522062793a72656c6120616e64207368616d69655b2f625d, 96, 12, '', 1250734887, '0', 0),
(580, 0x492062656c6965766520746861742065766572796f6e65206e696473206120736563306e64206368616e63652063757a2065766572796f6e65206d616b6573206d697374616b6573206f6e636520696e2061207768696c65, 54, 12, '', 1250749819, '0', 0),
(546, 0x5b625d534543304e442077696e6e65722c3372642c347468206e20736f6f6e2c752063616e20676574206120637269646574732066726d20746865207175697a206620752067657420746865206330727265637420616e737765722c5b2f625d, 96, 12, '', 1250735144, '0', 0),
(547, 0x706c7320746f206f6c207374616666207468652075726c2073203e687474703a2f2f737572667761702e636f6d2f3f736974653d726574726976657761702e636f2e7a61, 127, 8, '', 1250735305, '0', 0),
(550, 0x5b625d204c4f41443e3e746f20626520676976656e206f6e6c79204d5746207175697a206461792e2e64617473206f6e6c792034203173742077696e6e65722c676574203330736d617274206c6f6164206f7220676c6f62652e2e54414b45204e3054453a6f6e6c792070686c697070696e657320757365722e203173742077696e65722074616b65206e3074652c66207520726520736d617274207573657220752063616e2067657420757220736d617274206c6f616420746f2052454c412c6966207520617265206120676c6f6265207573657220752063616e2067657420757220676c6f6265206c6f616420746f205348414d4945205b2f625d20, 96, 12, '', 1250739602, '0', 0),
(566, 0x57616820646179612c2063676520696261206e616e672c206861697374, 130, 8, '', 1250744418, '0', 0),
(597, 0x526566657265652c626565, 27, 12, '', 1250752233, '0', 0),
(553, 0x692077616e7420646172652077686f2077616e747a20746f2064617265206d65202e202e, 130, 8, '', 1250742530, '0', 0);
INSERT INTO `ibwf_posts` (`id`, `text`, `tid`, `uid`, `image`, `dtpost`, `reported`, `quote`) VALUES
(555, 0x5b625d5b755d4c6574206d65206776652075206775797320616e206578616d706c653a206f6e20686f7720697420676f6573207468652073687566666c656420776f726473206172653e3e205b755d6567672054686520636869636b656e206c6179732e5b2f755d5468657365206172652074686520776f72642075206d7573742072652d20617272616e676520696e2070726f706572206f726465722c697420777564206265206c696b652074686973205b755d2054686520636869636b656e206c61797320656767735b2f755d2069747320746865206330727265637420666f726d617469306e206f6620776f7264732e2e706c61792e6f6b206e77206c6574207374617220776170706572732c6672656520706f7374696e672074696c2077652067657420746865207269676874207068726173652073656e74656e63652e7468616e6b732077686f20697320746865203173742067657420633072726563742077696e2032303063206f6b2e2e686572652074686520706872617365203e3e627574206974206d757374206265206c697665206261636b77617264732c4c6966652063616e206f6e6c7920626520666f72776172647320756e64657273746f6f645b2f625d5b2f755d, 129, 12, '', 1250742998, '0', 0),
(556, 0x61636365707420746865206f776e65724350, 130, 10, '', 1250743129, '0', 0),
(557, 0x7761682075736261206e61206268616c61206b6120646861207472757468206e6c616e67202e202e202e2068616b2068616b, 130, 8, '', 1250743186, '0', 0),
(558, 0x492077616e7420746f2067657420616c6c20796f757220637265646974732c2064617265206d65217761686168612e2e, 130, 13, '', 1250743635, '0', 0),
(559, 0x5761743f6c6f6c2e2e72656c693f, 37, 13, '', 1250743799, '0', 0),
(560, 0x692064617265207520746f2073686f757420696e20612073686f7574626f78206b756e6720636e75206d6168616c206d7520212068616861, 130, 8, '', 1250743864, '0', 0),
(561, 0x492068766520616c736f203120636f726e79206a6f6b65206869722c20713a20776174206265747765656e20796f7520616e64206d653f, 37, 13, '', 1250744007, '0', 0),
(562, 0x616e642077616861686168612e67756e2e202e746f6d61746f2e206d75612068616861, 37, 8, '', 1250744045, '0', 0),
(563, 0x4e6f7021, 37, 13, '', 1250744175, '0', 0),
(595, 0x444f45534e2754205245414c4c59204b4e572c444f45534e2754205245414c4c59204b4e570a49274d20414c4c204f5554204f46204c4f56450a49274d20534f204c4f525420574954484f555420594f550a49204b4e5720594f5520574552452052494748542042454c494556494e4720464f5220534f204c4f4e470a49274d20414c4c204f5554204f46204c4f56452c5748415420414d204920574954484f555420594f550a492043414e275420424520544f4f204c41544520, 51, 12, '', 1250751699, '0', 0),
(596, 0x544f20534159205448415420492057415320534f2057524f4e47200a492057414e5420594f5520544f2043304d45204241434b20414e44204341525259204d4520484f4d45200a415741592046524f4d205448455345204c4f4e47204c4f4e454c59204e49474854530a49274d205245414348494e4720464f5220594f552c0a41524520594f55204645454c494e4720495420544f4f0a444f455320544845204645454c494e47205345454d200a4f4820534f20524947485420414e44205748415420574f554c4420594f55205341590a494620492043414c4c4544204f4e20594f55204e4f5720414e4420534149442054484154200a492043414e275420484f4c44204f4e2054484552452753204e300a45415359205741592c4954204745545320484152444552204541434820444159200a504c45415345204c4f5645204d45204f520a49274c4c20424520474f4e452c, 51, 12, '', 1250752042, '0', 0),
(565, 0x54727574682c20692063616e7420646f2064617421, 130, 13, '', 1250744341, '0', 0),
(567, 0x656820616e756820776168616861206d617374307420622079616e3f, 37, 8, '', 1250744515, '0', 0),
(569, 0x2e776176652e, 79, 13, '', 1250746430, '0', 0),
(593, 0x77696e746572736e6f7720617420796f757220736572766963652c2066726f6d2062616775696f2c2070616e676173696e612c20616e64206c6120756e696f6e20287768616861686129206e6f72746865726e206c757a6f6e20696e2073686f72742e20696d206375746520286d7467616c206b6f206e6120616c616d2079616e292c206174207061736177617920686168616861, 14, 15, '', 1250751098, '0', 0),
(594, 0x5472793e3e49274d204c59494e4720414c4f4e452057495448204d592048454144204f4e205448452050484f4e450a5448494e4b494e47204f4620594f552054494c4c2049542048555254530a49204b4e5720594f55204855525420544f4f2c0a425554205748415420454c53452043414e20574520444f0a544f524d454e54454420414e4420544f524e2041504152540a492057495348204920434f554c4420434152525920594f555220534d494c450a494e204d5920484541525420464f522054494d4553200a5748454e204d59204c494645204645454c5320534f204c4f570a495420574f554c44204d414b45204d452042454c49455645205748415420544f4d4f52524f5720434f554c44204252494e47205748454e20544f444159, 51, 12, '', 1250751468, '0', 0),
(571, 0x72656c61, 121, 8, '', 1250747582, '0', 0),
(572, 0x54616775207461677520616e2068616861, 7, 12, '', 1250747739, '0', 0),
(591, 0x77612c207468617420776f726420697320746f6f206561737920746f207361792c2062757420646966666963756c7420746f2065786563757465202868616861686129, 67, 15, '', 1250750989, '0', 0),
(592, 0x4920736d696c652e2e6576656e20696e207468652064617973207468617420696d206d6573657261626c652c20627574206974206d616b6573207468652070656f706c652061726f756e64206d652068617070792c77686174206d616b6573206d65206861707079206973207768656e206d792063727573682020736d696c65206174206d65206f72206d79206c6f7665206f6e6520736d696c6573206174206d652e4e4f57205448415427532042454155544946554c, 52, 12, '', 1250751091, '0', 0),
(575, 0x6e796168616861686120, 14, 12, '', 1250748027, '0', 0),
(576, 0x48656865206f6e6c7920676f64206b6e77732077686f2072696c79203420752e2e20, 67, 12, '', 1250748388, '0', 0),
(577, 0x55277265206d792070617373696f6e2075277265206d79206465736972652062757420776974686f757420552e2e6d79206c696665206265636f6d6520696e636f6d706c657465, 49, 12, '', 1250748699, '0', 0),
(578, 0x6168656d6d2c206e796168616861202e6b69636b2e2e2e77656c2034206d652063676f726f20756e67207061706120617420756e67206b616d62616c20712067757332207120756e206b6320692072696c792072696c79206d69732073206d7920706170612067616e756e20646e206b616d62616c20712e2e6b7961206b6e6720707764206c6e67206d616962616c696b20756e20696261326c696b20712e6372792e20, 115, 12, '', 1250749066, '0', 0),
(602, 0x746f696e6b2068616861, 97, 8, '', 1250755824, '0', 0),
(603, 0x2e70756e63682e206e61676b616b616d616c69206b612064306d656e676f206b6175206d67612067757973206d61646c69206d6170696b306e2e6c6f6c2e206b697461206d7520616e677279206b616e61206f68202e687568752e20, 61, 8, '', 1250755918, '0', 0),
(604, 0x4d656d626572732047414c4c455259206e65656420746f6265204649582c20697420776f6e74206368616e676520706167652c20737475636b20746f207061676520312c, 10, 11, '', 1250756669, '0', 0),
(605, 0x506c7a204348414e4745205448452054494d4520464f524d415420262054494d45205a4f4e4520544f203132687220666f726d6174202620676d74202b382074696d65207a6f6e65202870682074696d6529, 25, 11, '', 1250757434, '0', 0),
(606, 0x416d206164646963746564206e30626f64792063616e2073743070206d652068616861, 92, 12, '', 1250758279, '0', 0),
(607, 0x536572696f75736c792069747320746f74616c6c792061206472756721206d792066306e6520697320616c776179732077697468206d65207768657265766572206920616d, 92, 12, '', 1250758342, '0', 0),
(608, 0x4d65206861686168612c6920646f2077617070696e6720696e73696465207768696c6520616d2070616e672d736169202e746f696c65742e, 117, 12, '', 1250758473, '0', 0),
(609, 0x49206c796b204c47202833672920746f756368206d3062696c652e2e77696420646f75626c652073696d20616c6c20692077616e7420697320646572206e736964652e2e, 88, 12, '', 1250758746, '0', 0),
(610, 0x322e204765726d616e795b62722f5d20706f7374206e206d6761207069707a, 134, 11, '', 1250758826, '0', 0),
(611, 0x69206c6f7665206d79206170706c65207068306e65, 88, 8, '', 1250759428, '0', 0),
(612, 0x416b6f2050414e545320616b75206e69206174652072656c61, 97, 11, '', 1250759644, '0', 0),
(613, 0x436865636b2069732068657265, 131, 11, '', 1250760644, '0', 0),
(614, 0x74727565202e6669742e20497473204a6573757320, 135, 8, '', 1250761894, '0', 0),
(615, 0x616e306e672070616e74732e746f6d61746f2e202e6b69636b2e20686168612e6c6f6c312e, 97, 8, '', 1250763048, '0', 0),
(616, 0x796f75722077656c636f6d65206b75796120646f75676c61732120537461666620646e742064656c657465207468697320746f70696320706c73207468616e6b7321, 136, 2, '', 1250765656, '0', 0),
(617, 0x746c6761206268653f20616b6f206e6c616e67206e6761727564205054206d6f207361206762692070617261206d6b61326c6f67206b612c20617320696e205061205461646a616b206b612c68656865206a6f6b65206c6e672068613f202a70656163652a, 89, 15, '', 1250767732, '0', 0),
(618, 0x6920636e742062656c697620776174206976206a7573742068656172642c637564206974206220747275652c20617265207520642067757920692074686f742069206b6e65772e206420312068752070726f6d697364206d6520326c75762077686572652064696420697420676f2c20646f657320616e79626f647920686176656e74206b6e772e20687720646f2075206865616c20612062726f6b656e2068656172742e2e2e20, 51, 15, '', 1250768214, '0', 0),
(619, 0x6c6f76696e672073756d3120657370206120706172746e65722064736e74206d65616e2075722073657875616c7920696e74726573746420696e20686d206f72206865722e69742069732064206865617274206461742077726b732c75206c6f76652068697320746f74616c6974792c68697320737472656e67746873206e636c7564696e67206873207765616b6e657365732e697473206e74206420736f2063616c6c6564206c7573742c7768792075206c6f76652068696d2c6274206d6f7265206f6620656d6f74696f6e2e6f6620636f7572736520686176696e67206f776e2066616d696c792073206120646966726e742073746f72792c636f7a206174207468732073746167652c626f7468206f66207520736875642062206d61747572656420656e61662c646174206c6f76696e672073756d312063616d7320776964206974206420726573706e7362696c697479206f66206275696c64696e67206f776e2066616d696c792c746861742069732c7520626f7468207368756420626520706172656e7473, 56, 15, '', 1250768717, '0', 0),
(620, 0x69207468696e6b2077656e2073756d3120686173206e6f74696364206e2061707265636961746573207761742069766520646f6e6520746f20686d206f7220746f206865722c326d6520646174732062656175746966756c2c636f7a2069206665656c2064617420696e206d79206f776e2073696d706c657374207761792c20692068617620776f727468, 52, 15, '', 1250769420, '0', 0),
(621, 0x6d79206d6f6d206e206d79206461642c20616e642077696420696e74657276656e74696f6e206f6620676f642c2069206f776520746f207468656d2c776174206920616d203264617921, 57, 15, '', 1250769812, '0', 0),
(622, 0x79656168206d616e792074696d65732c6e206576656e207870657269656e636564206265696e206c6f76642062792073756d312068756d207520646e74206c6f76652e2e697473206120636d706c636174656420736974756174696f6e2061637475616c792c206e2031206d7573742062652072656164792032666163652064207472757468206e20636e73657175656e63652e20776865772c206461747320776174206c6f76652069732c2020, 122, 15, '', 1250770120, '0', 0),
(623, 0x6b632073612073656c6f7320636c61206e61696e6c6f76652c6b796120326c6f7920636c6120616e67206e676b616877616c61792c20686568656865206a6f6b65, 123, 15, '', 1250770335, '0', 0),
(624, 0x61726179207120706f20616820616820616e672078616b6974, 122, 8, '', 1250770363, '0', 0),
(625, 0x50616720736f627261206e20616e67206b61207373656c6f732c2064756e206e61672068686977616c6179202e636865656b792e, 123, 11, '', 1250770725, '0', 0),
(626, 0x53757265206661697468206d20616c776179732068697220617420757220626b20737570706f7274696e67207521, 136, 13, '', 1250772066, '0', 0),
(627, 0x646179612c6b617520646e206c6e672073756d61676f742065682c6d67706f70726f7465737461206b6f207361206861726170206e67207072632120686568656865206179206d616c692c207361206d616c6163616e616e67206e6c616e672120776168616861, 107, 15, '', 1250776265, '0', 0),
(628, 0x4120706c61636520776865726520492063616e206164642074686520737570706f7274206c696e6b7320666f7220526574726976655761702e, 77, 38, '', 1250779186, '0', 0),
(629, 0x492020616d206e657720616e6420616c77617973206c6f6f6b696e6720666f72206e657720667269656e64732e, 91, 38, '', 1250779729, '0', 0),
(630, 0x4c6574206d6520736565204f2020796573206d79203220736973206973206f6e207369746520616e64206a7573742077616e7420667269656e64736869702e, 112, 38, '', 1250779882, '0', 0),
(631, 0x436f6f6c207369746520616e64206c6f7473206f6666206e65772066756e6374696f6e732e, 111, 38, '', 1250780168, '0', 0),
(728, 0x5b75726c3d687474703a2f2f33672e6d79676c6f62652e636f6d40726574726976657761702e776170746f702e6d655d524554524956455741502e574150544f502e4d455b2f75726c5d205b62722f5d20706c7320636c69636b20616e642061646420796f757220736974652068657265207468616e6b73203420737570706f7374205b62722f5d2034207068207573657220692064306e74207075742033726b7a20746865726520736f20686572652773207468652075726c203e20687474703a2f2f726574726976657761702e776170746f702e6d65, 151, 8, '', 1250842714, '0', 0),
(633, 0x736578206d616465206d65, 57, 14, '', 1250797643, '0', 0),
(634, 0x6d616b697461206b6f206c6e672063206268656265206b6f206e20686170692c2068617069206e2072696e20616b6f20617420756e20616e672032326f2e, 52, 14, '', 1250797761, '0', 0),
(635, 0x7477696e6b6c65207477696e6b6c65206c6974746c65207374617220686f7720692077616e64657220776174207520722075702061626f76652074686520776f726c6420736f2068696768206c696b652061206469616d306e6420696e20646120736b79207477696e6b6c65207477696e6b6c65206c6974746c652073746172, 51, 14, '', 1250798065, '0', 0),
(636, 0x35302d35302e204f4b2c206b63206d726d6920702072696e6720636869636b732064322e204d656a6f2c2064686c2068696e6465206b6f206d617669657720616e6720696d616765206e67204543415244206b6874206e6b494d414745204f4e206e20756e67207765622073657474696e67206e6720666f6e65206b6f2e, 111, 14, '', 1250798874, '0', 0),
(637, 0x736e61206d676b616261627920616b6f20643220732073697465, 112, 14, '', 1250798946, '0', 0),
(638, 0x69206469646e7420657870656374206469732e20746e78203420746865207761726d2077656c63756d21206c75762075206b756e6720636e75206b206d616e, 91, 14, '', 1250799053, '0', 0),
(639, 0x48617069, 85, 14, '', 1250799212, '0', 0),
(640, 0x68696e6465206b6f2069736173616e676c61202073207061776e73686f70206b756e67206d617920746977616c6120616b6f2073206b6169626967616e206b6f2e20636775726f2c20206d676e6720677564206c697374656e6572206e206c6e6720616e672070776465206b6f6e6720676177696e20617320612066726e642e, 86, 14, '', 1250799444, '0', 0),
(641, 0x6d7920737974203e3e2d3e206c6f727468697261732e70657065726f6e6974792e636f6d, 119, 14, '', 1250799596, '0', 0),
(642, 0x4577616e206b6f206c6e67206b6179204a657375732e20416b6f206e206c6e6720636775726f20616e67206d6b6b70676c69677461732073206d676120706172757361206e206e616974616d6f206b6f206b756e67206d676262676f206e20616b6f2e, 135, 14, '', 1250799897, '0', 0),
(643, 0x46616c63306e, 42, 14, '', 1250800079, '0', 0),
(644, 0x476f6174, 42, 13, '', 1250801421, '0', 0),
(645, 0x48616b68616b2e2e6d6164616d2072656c612074616d61206b20706f216f6b206e20706f2c206920616c72656469206164646564206372656469747320696e2075722062616e6b20616363742e2e, 107, 13, '', 1250802080, '0', 0),
(646, 0x513a204d616973616e672070756e6f2c20616e6f20616e672062756e67613f3f616e6f7468657220313030637265646974732034206473207175657374696f6e2e, 107, 13, '', 1250802258, '0', 0),
(647, 0x513a204d616973616e672070756e6f2c20616e6f20616e672062756e67613f3f616e6f7468657220313030637265646974732034206473207175657374696f6e2e, 107, 13, '', 1250802311, '0', 0),
(727, 0x6c69666520636e206f6e6c7920626520756e64727374306f642062636b77617264732c2062757469206974206d757374206265206c69766520666f7277617264732e202e, 129, 8, '', 1250842454, '0', 0),
(650, 0x2e6372792e206173616e206e61206b61753f, 62, 8, '', 1250808415, '0', 0),
(651, 0x6875683f20492068617665206e6f74207365656e206f6e6521204d6d6d20686176652075206b75796120646f75676c61733f204861686168616861, 138, 2, '', 1250808444, '0', 0),
(652, 0x4d61697320616e672062756e6761202e74656574682e, 107, 11, '', 1250809422, '0', 0),
(654, 0x4d656c616e696520736179204920616d20612077657265776f6c66207768656e2066756c6c206d6f6f6e207468656e204920616d2068756e67727920666f72206d6561742e4d61796265204920616d206f6e6520736f206265746572207761746368207369732e4f6e6520626974652075206d6179207475726e20696e746f206f6e652e726f666c2e, 138, 38, '', 1250809675, '0', 0),
(655, 0x6920676f74206761726c696320696e206d7920706f636b65742077657265776f6c662061732069206b6e6f772061726520616672616964206f66206974206c6f6c206861686168616861, 138, 2, '', 1250809904, '0', 0),
(656, 0x687474703a2f2f7472696e6974792e77656e392e6e6574, 119, 3, '', 1250809944, '0', 0),
(657, 0x466169746820796f75207374696c6c206120626162792e686168612e52656d656d626572206e6f74207468652073697a652077686174206d61747465722069747320686f77207468652067757920757365206974202e2e2e2e2e20, 36, 38, '', 1250810022, '0', 0),
(658, 0x4e30204f6e652063416e207361766520796f75202e616e6420796f752063416e2774207361766520757253656c662062436f7a2028726f4d616e7320333a323329616c4c207573206d616e20686176652073696e2e62755420476f6420486173206e302e73696e20736f20476f642063416e20736176652075732067617961206e6720706167736173617665206e20676e7761206e656120786b6e3d7d, 135, 3, '', 1250810136, '0', 0),
(659, 0x616c776179732075736520636f6e646f6d206e79616861686168616861, 34, 2, '', 1250810333, '0', 0),
(660, 0x616e672073776974206e616d616e206e69206268652c207468616e6b207520706f, 52, 15, '', 1250810471, '0', 0),
(661, 0x5374617920617761792066726f6d20736578207761697420756e74696c6c206d6172726965642e496620796f75206d757374206d616b65207375726520796f7520686176652020636f6e646f6d7320627574207374617920776974682073657820706172746e657220616e642020626f74682020676f20666f7220484956206f7220414944532074657374207468617420746865206265737420616e6420207361666520776179, 34, 38, '', 1250810505, '0', 0),
(662, 0x74727573742c64617473206420626573742074686e6720696e2066726e73687021, 86, 15, '', 1250810639, '0', 0),
(663, 0x62756e676120626f7721, 107, 15, '', 1250811135, '0', 0),
(664, 0x73616e746f6c20616e672062756e67612068616b68616b, 107, 12, '', 1250811413, '0', 0),
(665, 0x5b625d5570646174653a5b2f625d5b62722f5d5b636c723d7265645d47414c4c4552592049532046495845442c204e45572056455253494f4e20484153204245454e20494e5354414c4c45445b2f636c725d, 10, 11, '', 1250811703, '0', 0),
(666, 0x6620692063206d79207370656369616c202073306d653120686170692c20616d206861706920746f6f2074686174207468652062656175746966756c207468696e672034206d652c6576656e2064656570206e73696465206974732072696c79206c796b206b696c6c696e67206d6520697473206f6b2c61746c656173742069207365652068696d2068617069207769746820736f6d65312e20, 52, 12, '', 1250812007, '0', 0),
(667, 0x552070726f6d697365206d652c75207761697420666f72206d652c68616861202e6c6f73742e206e612e2e6e612e2e20, 51, 12, '', 1250812369, '0', 0),
(668, 0x4d617075746920616e67206d676120696e7473696b5b62722f5d62726f776e206e6d616e206d676120707572652070696e3079, 99, 11, '', 1250812591, '0', 0),
(669, 0x53616269206e696c615b62722f5d736d616c6c20647720616e672073697a65206e67206d676120696e7473696b5b62722f5d6d656469756d206e6d616e2064617720616e6720707572652070696e30792e726f6c6c2e204577616e206b756e6720616e7520756e202e6c6f6c2e, 99, 11, '', 1250812759, '0', 0),
(671, 0x50726573656e74, 131, 12, '', 1250814313, '0', 0),
(672, 0x496d20686572652e202e202e202e, 131, 11, '', 1250814564, '0', 0),
(673, 0x44617469206a616e20706120616b6f2073612070696e6173206b6170616d696c79612066616e7320616b6f, 133, 12, '', 1250814807, '0', 0),
(674, 0x73616d652070616c69706174206c69706174206c616e67, 133, 2, '', 1250816635, '0', 0),
(675, 0x416b752064696e204b4150552c4d494c59412070616c69706174206c697061742064696e20616b75206e67206368616e6e656c2c2070617265686f206b616d69206e6920636865636b6d617465, 133, 21, '', 1250817101, '0', 0),
(676, 0x5b696d673d687474703a2f2f6469776174612e77617068656172742e636f6d2f66696c65732f37303532522e6a70675d, 141, 2, '', 1250819025, '0', 0),
(677, 0x6b6170617265686f206b6d69206e6920636865636b6d6174652064696e, 133, 8, '', 1250822172, '0', 0),
(678, 0x2e687568752e2074736577617421, 99, 8, '', 1250822226, '0', 0),
(679, 0x626b612070616c6179206e2062756e6761206e67206d6169732c202e6c6f6c312e, 107, 8, '', 1250822298, '0', 0),
(680, 0x70726573656e74202e7361642e, 11, 8, '', 1250822344, '0', 0),
(681, 0x5b636c723d7265645d43524544495421215b2f636c725d207265676172646e672063726564697420616c6c20737461666620697320696e74696c746c6520746f2067697665203130306320746f20616c6c206e6577626965732e2e20492077696c6c6c206e6f742062652073747269637420746f20616c6c207468652073746166662077686f2077696c6c206164642063726564697420746f207468656d73656c662074686174732075722070726976656c61676520666f72206265636f6d696e6720612073746166662c206275742075206e65656420746f20706f737420616e642063726561746520746f7069632c2069662077697468656e20326461797320752068617665206e6f7420706f7374206f722063726561746520616e7920746f7069632068616c66206f66207572206372656469742077696c6c2062652064656475637465642e212120, 132, 2, '', 1250824881, '0', 0),
(682, 0x666c792e, 11, 13, '', 1250824938, '0', 0),
(683, 0x7775616c61206171206b617075736f206f72206b6170616d696c79612e2e786520616c612070206171206e70757075736f616e206174206c612064696e206b6170616d696c7961207865206e61672d69697361206c6e67206171206e62756275686179217761686568652e2e2e6f7574206f6620746f7069632e2e7475776577657765656521, 133, 13, '', 1250825586, '0', 0),
(684, 0x687520753f2061736c20706c733f, 133, 8, '', 1250826799, '0', 0),
(685, 0x70617574616e67206e616d616e206a616e2e2e, 86, 8, '', 1250827132, '0', 0),
(686, 0x55736572204e616d652121204e657762696573207769746820696e646563656e74206e616d652073686f756c642062652064656c65746564206e6f742062616e6e6564206275742075206861766520746f2074656c6c2068696d2f68657220746861742074686520757365726e616d65206973206e6f7420616c6c6f77656420696e206f7572207369746520616e642075206861766520746f2064656c6574652069742c206d616b65207375726520746861742068652f73686520686173207265616420757220706d2120416e792073746166662077686f20646f20616374696f6e2077697468206f7574207761726e696e672077696c2062652073757370656e64656420666f722033206461797321205468616e6b7321, 132, 2, '', 1250827140, '0', 0),
(687, 0x6e3074206d65202e202e20696e3063656e746520616b6f206a616e2e202e626c7573682e, 117, 8, '', 1250827360, '0', 0),
(688, 0x6173616e2035306320713f, 93, 8, '', 1250827505, '0', 0),
(689, 0x6a6f6b65206c616e672079616e2064623f, 143, 8, '', 1250827800, '0', 0),
(690, 0x4e6f70652068616861686120, 143, 12, '', 1250827948, '0', 0),
(691, 0x5b636c723d7265645d5370616d6d696e6721215b2f636c725d204e6f207370616d6d696e6720696e20746865206f7468657220736974652c20476976652031207761726e696e6720746f2074686520706572736f6e2077686f207370616d20696e20706d2c20616e64206175746f6d617469632062616e6e656420666f722074686f73652077686f207370616d20696e2073686f757420626f782e26204368617420726f6f6d2120546865792063616e20707574207468657265206c696e6b20696e20776170206c696e6b20746f706963207769746820746865207065726d697373696f6e206f6620746865206f776e65722e204966206e6f742062616e6e6564207468656d21, 132, 2, '', 1250828043, '0', 0),
(692, 0x616820726964646c653f20, 143, 8, '', 1250828045, '0', 0),
(693, 0x31202e2068306e67206b306e6720322e206a6170616e20332e2070682020342e20636e61646120352e206972656c616e6420362e206b6f72656120372e206d657869636f2e20382e2073696e6761706f726520392e2074616977616e2e2031302e746861696c616e64, 134, 8, '', 1250828135, '0', 0),
(694, 0x74616d61206f6b206c616e6720616e672073656c6f7320706167206e617361206c75676172206c616761792073612074616d616e67206c616c616779616e2e202e202e2070616720733062726120706f736573697665206e20756e206b61796120757769207361206c697061742062686179202e202e20, 123, 8, '', 1250828225, '0', 0),
(695, 0x5b625d736f756e647320746f206d65206c696b65207468617427732065786163746c7920776861742069742069732e796f7520656974686572206c6f766520736f6d653120656e6f75676820746f206861766520612072656c6174696f6e73686970206f7220796f752064306e27742e776879206e30743f206a75732062652068306e6573742061626f75742068743f20776879206c65616420686572206f6e3f207768792070726574656e7420746f2063617065207768306d2075277265206a75732077616974696e6720666f7220736f6d657468696e672062657474657220746f2063306d657320616c6f6e673f20776879202e706c61792e67616d653f2020706561636520677579735b2f625d, 145, 12, '', 1250828447, '0', 0),
(696, 0x7472757468206d6520, 130, 8, '', 1250828582, '0', 0),
(697, 0x616e6720686162612067616e306e206220746c67613f202e686162612e, 145, 8, '', 1250828667, '0', 0),
(698, 0x2e6d757369632e202e62616e616e612e20, 36, 8, '', 1250829402, '0', 0),
(699, 0x696c20676f203420736f756c20626574206f6c206d7920626e6b206372656469747320737567616c20746f202e6c6f6c2e, 50, 8, '', 1250829469, '0', 0),
(700, 0x6861686168612c20617420616e75206b617961206b756e67206261796177616b20616e67206b757961206b6f, 70, 27, '', 1250834311, '0', 0),
(701, 0x416e75206b617961206b756e6720616e6720706c616e74736120686177616b616e20616e6720756d69696e6974202e726f6c6c2e, 70, 11, '', 1250834647, '0', 0),
(702, 0x6e6f2063306d6d656e74732077616e74203220626520616c306e652e2e, 59, 12, '', 1250835283, '0', 0),
(703, 0x4865686520, 50, 12, '', 1250835478, '0', 0),
(704, 0x73756e20697320627265616b696e67206d20757220657965732073746172742061206e657720646179732c62726f6b656e2068656172742063616e207374696c6c20737572766976652e2e, 51, 12, '', 1250835691, '0', 0),
(705, 0x4e6170616b6167616e64616e67206c75676172206e612069746f2e446f6f6e20617920706177616e672067696e746f20616e67206d6761206b616c736164612e416e672074616e67696e67206b61696c616e67616e2070617261206d61676b61726f6f6e206e6720657370657379616c206e612070617361706f72746520617920616e672070616774616e67676170206b6179204a657375732062696c616e672069796f6e6720736172696c696e6720544147415041474c49475441532e41796f6e207361204a75616e20313a3132224461746170757761277420616e67204c61686174206e67207361204b616e79612779206e6167736974616e676761702061792070696e61676b616c6f6f62616e204e6979612073696c61206e67206b617261706174616e67206d6167696e6720616e616b206e672044696f732c73616d616b6174757769642062616761277920616e67206d6761206e61677369736973616d70616c6174617961207361204b616e79616e672070616e67616c616e2e22, 147, 3, '', 1250836268, '0', 0),
(706, 0x53696e61736162692072696e206e6720616b6c6174207361207061676c616c616b626179206e612073696e756d616e672074756d61776167207361204b616e79616e672050616e67616c616e206179206d616c696c69677461732e4b756e672069706170616861796167206e6174696e20616e67206174696e67206d6761206b6173616c616e616e2073612044696f732c5369796127792074617061742061742068616e64616e67206d616770617461776164206e67206174696e67206d6761206b6173616c616e616e206174206c696c696e6973696e204e697961207461796f207361206c61686174206e67206174696e67206d6761206b6173616c616e616e2e48696e6469206e6174696e20746979616b20616e672061726177206b756e67206b61696c616e206d616e6779617961726920616e67207061676c616c616b626179206e612069746f2c6b6179612774206461706174206c616769207461796f6e67206d6167696e672068616e64612e4b756e672068696e6469206b61207061206e6161616e7961796168616e207361207061676c616c616b626179206e612069746f2c6e616973206b6974616e6720616e7961796168616e206e61206d616774756e676f207461796f6e672064616c617761207361206c616e6769742e, 147, 3, '', 1250836620, '0', 0),
(707, 0x4d616e616c616e67696e206b61206e67206d67612073756d7573756e6f64206e612070616e616c616e67696e2e224a455355532c6b61696c616e67616e204b697461206174206e616973204b6974616e67206d616b6173616d612e50617461776172696e204d6f20706f20616b6f207361206c61686174206c61686174206e6720616b696e67206d6761206b6173616c616e616e2e4e616e696e6977616c6120616b6f206e6120496b617721204179206e616d61746179207061726120736120616b696e2e2c62696e7562756b73616e206b6f20616e6720616b696e67207075736f2c54696e6174616e67676170204b4954412042494c414e472050414e47494e4f4f4e20415420544147415041474c4947544153204b4f, 147, 3, '', 1250836951, '0', 0),
(708, 0x4e616e616c616e67696e206b61206261206d756c612073612069796f6e67207075736f3f4b756e672069746f20616e672067696e617761206d6f2c6e6173612069796f206e61207369204a6573752d43524953544f205369796120616e672069796f6e6720657370657379616c206e6170617361706f7274652e4d616b616b6174756e676f206b61206e61206e6761796f6e206e67206c616e67697420616e75206d616e67206f7261732062617769616e206b61206e67206275686179205b625d4d554c41205341204953414e47204e41474d414d414c4153414b49545b2f625d, 147, 3, '', 1250837165, '0', 0),
(709, 0x616d792c69207769736820752064207472756520686170696e65732c20736e61206c686174206e672070616e6761726170206d6f2c6d612061636869657665206d6f2e206769726c2c20616c616d206b6f206e61206d62616974206b612c736f206d6261697420646e2063206c6f7264207361752e686170692062646179207369732120626c6f772075722063616b65206e61206f683f206865686520, 64, 15, '', 1250837324, '0', 0),
(710, 0x34, 21, 44, '', 1250837531, '0', 0),
(711, 0x6d7920736b756c206e20636f6c656765206973207369747561746564206e20626775696f20636974792e2069742069732072756e20627920666f726569676e657220707269657374732e2074686f7567682061206e6f6e2073746f636b2c636174686f6c696320756e697665727374792c657672793120697320776c636d6520746f206e726f6c206e2074687320696e737469747574696f6e2e206d7920736b756c207370656369616c697a6573206d6f7265206f6e206d65646963616c2c656e67696e656572696e6720616e6420627573696e657320636f75727365732e74686573652072206420636f757273657320776865726520697420657863656c732c616e64206761726e657273206f6e2074686520746f706c6973742c776964206869676865737420706173657273206e206420626f617264206578616d732e6576656e206d75736c696d732c616e6420666f726569676e6572732061726520776c63756d20686572652c2e20736f2063756d20616e64207870657269656e6365207374756479696e67206e2068796c616e647321206d792062656c6f76656420616c6d61206d6174657221, 46, 15, '', 1250837961, '0', 0),
(712, 0x7068796c6c756d, 47, 15, '', 1250838148, '0', 0),
(713, 0x61686121206368636b73206c6e6720706c6120686e617020752064322068613f6d706f6b706f6b206b61206e67613f202e736d6173682e20686568656865, 111, 15, '', 1250838907, '0', 0),
(714, 0x50686f746f6772615b636c723d7265645d7068795b2f636c725d, 47, 11, '', 1250839395, '0', 0),
(715, 0x5b636c723d7265645d7068795b2f636c725d73696373, 47, 11, '', 1250839458, '0', 0),
(716, 0x656c656374726f6d796f6772617068792e2e203c74616d6120623f3e, 47, 41, '', 1250839663, '0', 0),
(717, 0x72656c61706879, 47, 8, '', 1250839724, '0', 0),
(718, 0x506f726e6f6772615b636c723d7265645d7068795b2f636c725d5b62722f5d5b62722f5d6861686168612e202e202e204d65726f6e20706c61206e79616e2072656c612c206d6168616e6170206e676120732064696374696f6e617279206d65616e696e67206e79616e202e726f6c6c2e, 47, 11, '', 1250839809, '0', 0),
(719, 0x47656f677261706879, 47, 12, '', 1250840324, '0', 0),
(720, 0x68616e6170696e206d75206d657972306e2079616e, 47, 8, '', 1250840498, '0', 0),
(721, 0x616e75206e67206d65616e696e67206e756e3f20686568652e2e, 47, 41, '', 1250840823, '0', 0),
(722, 0x4269626c696f6772615b636c723d7265645d7068795b2f636c725d, 47, 11, '', 1250841224, '0', 0),
(723, 0x70687973696369616e, 47, 41, '', 1250841301, '0', 0),
(724, 0x627374612068616e6170696e206e796f2052454c415048592021202e6c6f6c312e, 47, 8, '', 1250841556, '0', 0),
(725, 0x77686174732074686973206c69666520616e797761792057686174277320697420746f207520616e64206d652057686174277320697420746f20616e796f6e652057686f207220776520737570706f73656420746f2062652e2e206c61206c61206c612e2e, 51, 41, '', 1250841660, '0', 0),
(726, 0x57686572652077652063616e20776561722065616368206f7468657220666f7220617768696c652049276c6c206c656e642075206d7920746561727320696620692063756420626f72726f77206120736d696c652049276c6c20676574207468727520746f6d6f72726f7720736f6d65686f7720746f646179204861707079206166746572206f6e63652075706f6e20746865736520646179732e2e, 51, 41, '', 1250841911, '0', 0),
(729, 0x5b75726c3d687474703a2f2f33672e6d79676c6f62652e636f6d40737572667761702e636f6d2f3f736974653d726574726976657761702e636f2e7a615d5355524657415020504c5320434c49434b20544849535b2f75726c5d205b62722f5d2068656c7020757320746f206d616b65207265747269766577617020746f2074686520746f702e202e, 151, 8, '', 1250842927, '0', 0),
(730, 0x64697369706c696e612061742074796167612c2c2c79616e20616e67206b656c616e67616e206e6174696e2c2c2c6b6172616d6968616e206b6173692074616d61642e2e2e2e61742064756e2073612069626f626f746f206e6174696e2c2063677261647568696e206e616d616e206e6174696e206e61206b6172617061742d64617061742c2c2c68696e64692079756e67206b7572616b6f742c2c2c, 17, 27, '', 1250843190, '0', 0),
(731, 0x6d65726f6e2070612062616e672068696e6469206b7572616b6f743f3f3f686168616861, 17, 27, '', 1250843453, '0', 0),
(732, 0x746865792063616e27742068616e646c652074686520736974756174696f6e2c2c2c616e642068696e6469206e616d616e206d6167616e646120616e6720736f6272616e67207061676d616d6168616c2c2c2c64617061742074616d61206c616e672c2c2c2c, 123, 27, '', 1250843546, '0', 0),
(733, 0x5b75726c3d687474703a2f2f33672e6d79676c6f62652e636f6d4072757373746f702e776170636974792e75732f3f696e3d36373538335d5741504349545920434c49434b20544849535b2f75726c5d205b62722f5d20636c69636b20746865206c696e6b20706c7320746f2068656c7020736974652067726f772e202e202e, 151, 8, '', 1250843672, '0', 0),
(734, 0x696b6177206c616e672074616c6167612c20616761696e737420616c6c206f646473, 8, 27, '', 1250844494, '0', 0),
(735, 0x32326f2079616e2c2c2c2c6d6761206c616c616b6920746c67612c2c2c6b75706f68, 60, 27, '', 1250844701, '0', 0),
(736, 0x65783a2072657472697665, 105, 13, '', 1250844752, '0', 0),
(737, 0x656e646c657373, 105, 13, '', 1250844815, '0', 0),
(738, 0x73697465, 105, 13, '', 1250844940, '0', 0),
(739, 0x6576657279626f6479, 105, 13, '', 1250845065, '0', 0),
(740, 0x796f75, 105, 13, '', 1250845137, '0', 0),
(741, 0x756e697465, 105, 13, '', 1250845192, '0', 0),
(742, 0x486168612073616c69206e4d6e206b61752073612064726167306e2061646f70746572732e2e, 120, 5, '', 1250845285, '0', 0),
(743, 0x50646520626120322062792033206f7220666c617420746f70202e726f6c6c2e205472696d6d656420697320696465616c20, 35, 11, '', 1250845432, '0', 0),
(744, 0x6f6b2073616c69206171202e202e202e7572612e2070756d617061746179207061206e672074616f2079616e3f20686568652079756220752070697a21, 120, 8, '', 1250845443, '0', 0),
(745, 0x776f726479776f726479776f7264792020202068616861686168612c2c2c2c70776564652062612079616e3f3f3f746f696e6b73, 48, 27, '', 1250845504, '0', 0),
(746, 0x2e70756e63682e2068616861686168612061726d7920637574207077643f20, 35, 8, '', 1250845659, '0', 0),
(747, 0x7575206e67612e2e6532206d6173206d6c616b6173207468696f64616e216367757261646f2070746920696b61772070617461792177616865686568652e2e2e, 98, 13, '', 1250845686, '0', 0),
(748, 0x2e687568752e20626c65206d6761206c616c616b6920747369736d75736f207765656521, 60, 8, '', 1250845705, '0', 0),
(749, 0x2e6669742e206b63206c61686174206e6720736f627261206d6173616d61206861686168612e6c6f6c2e, 123, 8, '', 1250845769, '0', 0),
(750, 0x686520646f65736e27742064657365727665206d65, 53, 27, '', 1250845823, '0', 0),
(751, 0x6b61326c6164206e6720616e753f3f6c616c612e, 123, 13, '', 1250845969, '0', 0),
(752, 0x6b326c6164206e672073306272616e67206c617368696e67206e67696e67207368616230672e6c6f6c312e, 123, 8, '', 1250846023, '0', 0),
(753, 0x6b6174756c6164206e6720736f6272616e67207061676b61696e2c2c2c6e616b616b61696d706174736f2c2c2c686168616861, 123, 27, '', 1250846086, '0', 0),
(754, 0x36, 21, 27, '', 1250846517, '0', 0),
(755, 0x38, 21, 8, '', 1250847069, '0', 0),
(756, 0x736f20616d617a696e672079657320616d656e204c4f52442e, 147, 8, '', 1250847479, '0', 0),
(757, 0x766973697420616c736f205b75726c3d687474703a2f2f6a657430352e77656e392e6e65745d4a65743035205741505b2f75726c5d20746f206b6e6f7720616c6c206d79206b6e6f776c656467652061626f757420776170206a656a6520746e7821216e616b6120616476657274206e61206e6d616e2c, 119, 46, '', 1250848070, '0', 0),
(758, 0x5b75726c3d687474703a2f2f756e6c74647761702e7761706d6f642e636f6d5d687474703a2f2f756e6c74647761702e7761706d6f642e636f6d5b2f75726c5d2e2e2e7669732174206b61752068612e2e2e68656865, 119, 47, '', 1250848590, '0', 0),
(759, 0x2e6d6179206d6761206f726173206e61206e6b6174616e6177206171207361206d6c61796f20617420696e6969636970206b7461, 98, 13, '', 1250849345, '0', 0),
(760, 0x6d616e616e616e6767616c, 121, 13, '', 1250849638, '0', 0),
(761, 0x546865726d6f706c6173746963, 15, 41, '', 1250852456, '0', 0),
(762, 0x4372797374615b636c723d7265645d4c5b2f636c725d, 15, 11, '', 1250853228, '0', 0),
(763, 0x747261636b20656e206669656c642c206261646d696e746f6e2c20766f6c6c657962616c6c2c206368657373, 7, 41, '', 1250853378, '0', 0),
(764, 0x4c697175695b636c723d7265645d445b2f636c725d, 15, 11, '', 1250853610, '0', 0),
(765, 0x44616e63655b636c723d7265645d525b2f636c725d, 15, 11, '', 1250853742, '0', 0),
(766, 0x72656c61, 15, 8, '', 1250854079, '0', 0),
(767, 0x6865646765686f67, 42, 41, '', 1250854088, '0', 0),
(768, 0x776f77212064616e6461206e67206d67612078616730742e202e7077616e67207861626f6720686168616861202e726f6c6c2e2062656465206265646520626564652e202e706d706c2e, 123, 10, '', 1250854149, '0', 0),
(769, 0x6d6174696e75206b616d69206568202e6c6f6c312e20686168612077616b206e2074656c6f74206b617869, 123, 8, '', 1250854234, '0', 0),
(770, 0x636e4f20624120744c6720616e672073656c6f736f3f206c616c616b69206f2062616261653f202e636f6e667573652e, 123, 10, '', 1250854242, '0', 0),
(771, 0x4c6578743074, 20, 10, '', 1250854328, '0', 0),
(772, 0x6e6420617475682074656c6f782e202e696e69782061712e202e616e677279312e, 123, 10, '', 1250854468, '0', 0),
(773, 0x2e616e677279312e2077616b206e20696e697820706170616e6774206b6177207077616d697a2e20, 123, 8, '', 1250854899, '0', 0),
(774, 0x62676f2061712074706f73206b61696e, 3, 8, '', 1250855244, '0', 0),
(775, 0x6d74674c206e713077272070616e673820686568656865, 123, 10, '', 1250855534, '0', 0),
(776, 0x416b6f206261676f6e67206269686973202e677564626f792e, 3, 11, '', 1250855540, '0', 0),
(777, 0x74686174277320776861742077652063616c6c6564206d616e4869642e202e202e776168616861686120, 122, 10, '', 1250855647, '0', 0),
(778, 0x6f75636820756e206168682e2e, 122, 45, '', 1250856168, '0', 0),
(779, 0x6d6179206e6174616d61616e2068616b2068616b, 122, 8, '', 1250856246, '0', 0),
(780, 0x6e79614861486148612068616e6f2064573f20626b54206f7563682074652077696e5465723f, 122, 10, '', 1250856485, '0', 0),
(781, 0x7461676f7320616e672074616d61206172617920617261792068616b2068616b, 122, 8, '', 1250856597, '0', 0),
(782, 0x636e7520746e616d61616e3f62756c6c7365796520623f77616865686568652e2e2e, 122, 13, '', 1250856643, '0', 0),
(783, 0x6e642071206e676120616c616d20746e30206e74616d61616e206e796168616861686120746167307a206174612e202e62726f6b656e2e, 122, 10, '', 1250858018, '0', 0),
(784, 0x61726179, 122, 8, '', 1250858960, '0', 0),
(785, 0x653220617461206e74616d61616e20686168616861202e746f6d61746f2e, 122, 10, '', 1250859461, '0', 0),
(786, 0x776168616861206d616e686420616e67206c616c616b69206f707a21, 33, 8, '', 1250861035, '0', 0),
(787, 0x2e776176652e2048656c6c6f2068756720616e64206b697a206e796f206e6d6e2061712e2e2e6e6577626965206c6e6720703077682e68616b2e, 12, 43, '', 1250861364, '0', 0),
(788, 0x2d776176652d2052656c61206d776168, 11, 43, '', 1250861527, '0', 0),
(789, 0x2e726f73652e20637a206a616e2071206d61646d696e672068756720342075206d7561206d7561206b69732070612079616e20686568652e637564646c652e20, 12, 8, '', 1250861584, '0', 0),
(790, 0x75722070726573656e63652069732061206a6f79206f66206576727931212121, 91, 15, '', 1250866440, '0', 0),
(791, 0x616d656e212068656865, 91, 8, '', 1250866726, '0', 0),
(792, 0x616d70756e696e206d6f206c686174206e67206274612064322c6e79616861686168612e2e2e78706563746174696f6e733f636775726f206461742069732c2034746869732073797420746f206c61737420666f72206174206c6561737420357972732c6f2064623f6d6f7374206f6620757320686572652065682070726f666573696f6e616c73206e61206e756e2c64623f62737461206d6f7265206f66206120776973682c20726174686572207468616e2078706563746174696f6e732c736e61206e676120656820326d6167616c206e672070676b61746167616c207467616c20746c67612c, 112, 15, '', 1250866794, '0', 0),
(793, 0x6d616c61706974206e20616b6f20696b6173616c206e696e306e67206b61206b7579612074736f6b6f792070617261206d61792061706f206b6120706167206e6167206b6120616e616b20616b6f206861722068616b, 112, 8, '', 1250867000, '0', 0),
(794, 0x74686520636c696d62206279206d696c65792063797275732c2077656e20752062656c6976206279206d2e2063617265792c20647265616d73206279206d77736d6974682c20646e74206c6f76652075206e6f206d6f7265206279206372616967206461766964, 8, 15, '', 1250867530, '0', 0),
(795, 0x746f206c697665206e206972656c616e642c756e20746c6761206472696d206b6f2c7065726f206b6e6720646d616e677961726920756e2c636775726f206f6b206e612c736120746761797461792c626775696f206f7220616e7469706f6c6f2c62737461206d616c616d6720756e6720706c616365206174206d72616d6920747265657320616e64206d6f756e7461696e732c6e6174757265206c6f766572206b63206b6f, 55, 15, '', 1250867889, '0', 0),
(796, 0x2e77656c636f6d652e20776865726520752066726d3f, 153, 8, '', 1250868402, '0', 0),
(797, 0x496d2066726f6d206d79206d6f746865722062696b652e, 153, 51, '', 1250868569, '0', 0),
(798, 0x2e6b69636b2e202e746f6d61746f2e207468616e6b7a203420696e666f2068616861686168612e6c6f6c312e, 153, 8, '', 1250869284, '0', 0),
(799, 0x4c6f766520697320696e2074686520616972202e6e656e652e, 152, 12, '', 1250870596, '0', 0),
(800, 0x73756d74696e6720636e74206220746f7563686420627420636e20622066656c74, 152, 15, '', 1250870834, '0', 0),
(801, 0x4865617274206a756d70206f7574206f666620636f6e74726f6c20616e642075206861766520627574746572666c69657320696e2075722074756d6d792e4c6f766520206973207468652062657374207468696e6720752063616e206861766520696e207572206c6f76652e, 152, 38, '', 1250871399, '0', 0),
(802, 0x4920686176652064726167306e666c79206e206d792074756d792068616861, 152, 8, '', 1250872375, '0', 0),
(803, 0x416d206865726520, 131, 12, '', 1250875522, '0', 0),
(804, 0x6e796168616861686168616861202e6e656e652e, 48, 12, '', 1250877158, '0', 0),
(805, 0x456c656374726f6d61676e65746963, 48, 11, '', 1250877462, '0', 0),
(806, 0x5265766f6c7574696f6e617279, 48, 11, '', 1250877515, '0', 0),
(807, 0x476f7665726e6d656e74616c, 48, 11, '', 1250877594, '0', 0),
(808, 0x436f6d6d656e63656d656e74, 48, 11, '', 1250877670, '0', 0),
(809, 0x496e74726176656e6f7573, 48, 11, '', 1250877729, '0', 0),
(810, 0x6172726179207120706f6820616e672073616b38206e79616e2061682070616b746179206b6e6720626174612071206269746179206c61626173206d21, 122, 12, '', 1250878194, '0', 0),
(811, 0x616e4f2062616e67206d72306e3f20626b74207075726f206b617520617261793f202e636f6e667573652e, 122, 10, '', 1250878576, '0', 0),
(812, 0x5068696c697070696e65732c2064616d6920636869636b7320643221, 113, 14, '', 1250882319, '0', 0),
(813, 0x42617374656420616e67206973612073206d67612064686c6e206b756e6720626b74206c6f7665206973206e307420666169722e20547279202620747279206c6e6720756e74696c2075207375636365656421, 150, 14, '', 1250883353, '0', 0),
(814, 0x6d617320747369736d6f736f20616e67206d67612062616261652064686c20636c612072696e206179206d61696e676179206b7067206e676d69326c6167726f2073206b616d61206b6173616d61206d676120706172746e6572206e696c612e, 60, 14, '', 1250883642, '0', 0),
(815, 0x33207761797320746f20707574206d7973656c6620696e206120677564706f736974696f6e2e20312e20477761706f20322e20537765657420332e20477564206c697374656e6572, 83, 14, '', 1250883764, '0', 0),
(816, 0x4f6f206e6d6e2e204d61792070676b6b6d616c6920616e6720626177617420697361206b756e6720626b742067616e79616e20616e67206e67796172692e20436775726f20346769766520262034676574206174206970616b697461206d6f206e206c6e67207320706172746e6572206d6f206e612020494b415720616e67206d6167616c696e672073206b616d612e, 149, 14, '', 1250883961, '0', 0),
(817, 0x576c6e67206b61746979616b616e20746c6761206a616e2064686c206c75762069732063306d706c6963617465642e204b6874207361616e206d616e207320646563697369306e206f7220656d307469306e2c206461726174696e6720616e672070616e6168306e206e206d61736173616b74616e206b206c6e672e20416e672070776465206d6f206e206c6e6720676177696e206179206d676578657263697365203277696e6720756d6167612e, 148, 14, '', 1250884354, '0', 0),
(818, 0x49206c6f76652075206375746521, 146, 14, '', 1250884434, '0', 0),
(819, 0x7672792068306e6f726564203220622061206d656d626572206f662064697320736974652c20692066696c2065767279306e657320756e697465642c207468617473207761742069206c696b652064206d307374202e202e20474f44626c657373207573206f6c205e5e2c, 85, 4, '', 1250892306, '0', 0),
(820, 0x696d207870656374696e6720706561636520616e6420756e697479, 112, 4, '', 1250892400, '0', 0),
(821, 0x312e7068696c697070696e657320322e68306e676b306e6720332e55534120342e746861696c616e6420352e696e64696120362e74616977616e20372e6a6170616e20382e69737261656c20392e73696e6761706f72652031302e6368696e61, 134, 4, '', 1250892579, '0', 0),
(822, 0x686d6d6d70662e2c, 146, 15, '', 1250892687, '0', 0),
(823, 0x616c7761797320776173682075722068616e64732c20616e6420737472656e676874656e2075722062306479207468727520746b696e67207570207674616d696e73, 32, 4, '', 1250892759, '0', 0),
(824, 0x5068696c697070696e657320612064656d30637261746963206330756e747279, 113, 4, '', 1250892971, '0', 0),
(825, 0x5068696c697070696e6573207765722068307370697461626c652066696c6970696e3073206c697665642e, 114, 4, '', 1250893052, '0', 0),
(826, 0x6974206f6e6c792062636f6d657320756e666169722077656e207572206c6f76653120636865617473207521, 150, 15, '', 1250893347, '0', 0),
(827, 0x526f6d616e7320363a32332022666f7220746865207761676573206f662073696e2069732064656174682c20627574207468652067696674206f6620474f4420697320657465726e616c206c6966652074687230756768204a4553555320434852495354206f7572204c4f524422, 135, 4, '', 1250893360, '0', 0),
(828, 0x6e6f2c20696c6c2074656c20686d2c207061636b2075702075722074686e677321, 149, 15, '', 1250893459, '0', 0),
(829, 0x4c6576697469637573202e202e20, 18, 4, '', 1250893462, '0', 0),
(830, 0x446176616f2064686c20643220616b6f20626f726e2061742053696e6167706f72652064686c206d6179206c696f6e732064756e2e, 55, 14, '', 1250893573, '0', 0),
(831, 0x70726573656e74, 140, 2, '', 1250893604, '0', 0),
(832, 0x796f6b6f20736120736e6761706f72652c2062737461206c6e67, 55, 15, '', 1250893656, '0', 0),
(833, 0x616e672073616c6974616e672077616c616e67207461726f732061792073756d757375676174206e672064616d64616d696e2c206e67756e6974207361206d6167616e64616e672073616c6974612c2073616b6974206e67206c6f6f622061792067756d6167616c696e67, 75, 4, '', 1250893675, '0', 0),
(834, 0x6f6e6c7920746f2074686f7365207520647365727665206974, 146, 15, '', 1250893749, '0', 0),
(835, 0x6861686120696d2068657265, 140, 1, '', 1250893781, '0', 0),
(836, 0x6875776167206d6f6e67206970616e616c616e67696e20616e67206d67612074616f6e672069746f206a6572656d6961732e206875776167206b616e67206d616e616e6769732070617261207361206b616e696c612073617061676b61742068696e6469206b6974612070616b696b696e6767616e2e, 73, 4, '', 1250893827, '0', 0),
(837, 0x756c747261656c656374726f6d61676e65746963706f70, 48, 14, '', 1250893894, '0', 0),
(838, 0x697473206d6f7265206f6620656d6f74696f6e2c2062636f7a206966206974732061206465636973696f6e2c7468656e20697420636e74206265206c6f76652c6274206120726573706e7362696c6974792c, 148, 15, '', 1250893924, '0', 0),
(839, 0x65767279206d306e74682032206d7920667269656e6473206f6e6c79, 146, 4, '', 1250893945, '0', 0),
(840, 0x42757275677564756e73747579737475677564756e737475792028616c62756d207469746c65206e67207061726f6b7961206e6920656467617229, 48, 14, '', 1250894002, '0', 0),
(841, 0x6d6978206f662064637369306e206e6420656d3074696f6e2c20752063616e74206d6b6520612064637369306e206966207520646f206e30742068766520656d307469306e2034207468617420707273306e, 148, 4, '', 1250894059, '0', 0),
(842, 0x677579732c6273746120677579732c776c61206b6f6b6f6e7472612c6f6b65692120686d6d6d, 60, 15, '', 1250894153, '0', 0),
(843, 0x7768656e20757220706172746e65722075206c30766564206973206e30742073683077696e6720656e30756768206c307665206c796b207572206430696e, 150, 4, '', 1250894188, '0', 0),
(844, 0x72696c793f206c6574206d652074686e6b2066697273742e2e2e20686568656865, 83, 15, '', 1250894245, '0', 0),
(845, 0x7768656e2068652064306573206e307420617070726563696138206f6c2064207468696e6773207520646f2032206d6b652068696d20686170692c206f6c20642074686e67732075207363726966696365206263307a206f66206c3076696e672068696d202e202e20616e642077656e206865206973206f6e6c79207573696e672075203420686973206f776e20677564, 150, 4, '', 1250894290, '0', 0),
(846, 0x6b7572616b6f74206d676120746974736572206174207072696e636970616c2064756e207320736b756c2028756e6976657273697479206f66206d696e64616e616f29206b6f20647469207065726f206d6173617961206e616d616e2064756e2e, 46, 14, '', 1250894320, '0', 0),
(847, 0x4c6f766520697320756e63306e64697469306e616c, 152, 4, '', 1250894343, '0', 0),
(848, 0x69206c307665207520627574207520616c7265616479206876652073706369616c2073756d3120696e207572206c7966, 145, 4, '', 1250894609, '0', 0),
(849, 0x696d2061206c30766572206e61206e646920616c6d2068307720322063686561742c20627574206b756e6720676e756e206b6120736b6e2c2062652072656469202e202e20676e746968616e207461752c206861686121, 143, 4, '', 1250894752, '0', 0),
(850, 0x696620686520647365727665732069742c, 144, 4, '', 1250894833, '0', 0),
(851, 0x686d6d202e202e206c657474696e6720676f207072616e67207520646f206c307665642068696d2f6865722070612c2070656f2075206e69642032206c65742068696d20676f206b632064206e6120746d6120726c7469306e736870206e656f3f206c656176696e6720697320746865206872646573742070617274206f66206f6c2c20752077696c206c656176652068696d2f686572206263307a206f662075722064637369306e2070656f20696e206420656e6420752077696c2066696e64206f75742c207520646f206d64652061207772306e672064637369306e, 142, 4, '', 1250895083, '0', 0),
(852, 0x6e6e6932776c6120616375206a616e21, 103, 4, '', 1250895184, '0', 0),
(853, 0x70757420617779206420706374757265732c20707574206177792064206d656d72696573202e202e20, 62, 4, '', 1250895309, '0', 0),
(854, 0x7067627469696e20616e67206277617420697361202e202e2074703073206b736c616e206e612120656865686521, 30, 4, '', 1250895404, '0', 0),
(855, 0x50616b616e746f6e206b612c2072656c612120476f676f676f2e202e, 97, 14, '', 1250895473, '0', 0),
(856, 0x64306e74206220736164203420776174206973206f7665722c206a757374206220676c61642064617420697420776173206f6e6365207930757273, 29, 4, '', 1250895519, '0', 0),
(857, 0x50727574617320616e672062756e6761, 107, 14, '', 1250895638, '0', 0),
(858, 0x50726573656e7420756c6574, 11, 14, '', 1250895700, '0', 0),
(859, 0x6c6f76652075207a656368, 146, 15, '', 1250895878, '0', 0),
(860, 0x6432206171206b61776179207461206c61686174, 11, 8, '', 1250895999, '0', 0),
(861, 0x6b616c61206e7961206d67686168616e6170207020616b6f206e67206b61326c6164206e79612e205473652121204d6770616b616d617461792078612c2070616b69616c616d206b6f207361206275686179206e7961, 53, 14, '', 1250895999, '0', 0),
(862, 0x416d206865726520, 140, 3, '', 1250896030, '0', 0),
(863, 0x64756e206e6c616e6720786961206766206e69616e67206861706f6e6573612c206267617920636c61206e676c6f6c6f6b6f68616e206c6e672c, 53, 15, '', 1250896332, '0', 0),
(864, 0x7861706f6b2071206b61752e6b69636b2e20686168616861, 97, 8, '', 1250897274, '0', 0),
(865, 0x2e6c6f6c312e206b616e696e20616e672062756e6761206e306e, 107, 8, '', 1250897333, '0', 0),
(866, 0x5b636c723d7265645d53686f757420626f785b2f636c725d204576657279626f647920697320696e7469746c6520746f20757365207468652073686f757420626f782077652061636365707420616e79206469616c6563742c206275742062616420776f72647320617265206e6f7420616c6c6f7765642c206e6f2066676874696e2c6e6f20696e646563656e7420736d696c69657320616e792070726f626c656d20772f636f20776170706572732073686f756c64206469736375737320697420696e20706d2120416e792073746166662077686f2076696f6c61746520746869732072756c65732077696c6c2062652073757370656e64656420666f7220317765656b20756e74696c207520636f6f6c20646f776e2121616e79206d656d6265722077686f2076696f6c61746520746869732072756c6573206769766520337761726e696e67206966207468657920646e742073746f702062616e6e6564207468656d2120, 132, 2, '', 1250897815, '0', 0),
(867, 0x2e6b69636b2e204d616c69206b6175206c616861742050414e43495420414e472062756e676120686168616861, 107, 12, '', 1250897862, '0', 0),
(868, 0x776f6820626479206d75206c616e67206b6179612070616e6369742069736970206e6169636970206d6f2e746f6d61746f2e202e726f6c6c2e, 107, 8, '', 1250898034, '0', 0),
(869, 0x416b6f2070617861776179206861636b65642075206e676120706620712064322e2e20, 154, 12, '', 1250898204, '0', 0),
(870, 0x617120706178617761792064306e7420746f756368206d6520616d20646561646c79204345525449464945442050415341574159206578706f786521787878, 154, 8, '', 1250898401, '0', 0),
(871, 0x6e796168616861, 154, 12, '', 1250898690, '0', 0),
(872, 0x4d6179206973616e6720626174616e67206d6179207369706f6e2e2e, 116, 12, '', 1250898843, '0', 0);
INSERT INTO `ibwf_posts` (`id`, `text`, `tid`, `uid`, `image`, `dtpost`, `reported`, `quote`) VALUES
(873, 0x417420326d6174616b626f6e6720776c616e672070616e74616c306e2e2e, 116, 12, '', 1250898890, '0', 0),
(874, 0x5b636c723d7265645d557365722047616c6c6572795b2f636c725d204e6f206e7564652070686f746f2e2044656c657420697420616e642067697665207761726e696e6720746f207468617420706572736f6e2069662068652f73686520706f737420697420616761696e2062616e6e6564207468617420706572736f6e20616e6420706c7320616c6c2073746166662075706c6f6164207572207265616c2070696374757265207468616e6b7321, 132, 2, '', 1250898971, '0', 0),
(875, 0x576f772072656c6120676f742069742e2e757220637269646574732077656c6c2062652075706461746564206e772e2e20, 129, 12, '', 1250899078, '0', 0),
(876, 0x486572657320616e3074686572206a756d626c6564207068726173653e3e5b636c723d626c75655d73756666696369656e7420617274206f66204c696665207072656d65736973206973206672306d207468652064726177696e672063306e636c757369306e7320696e73756666696369656e745b2f636c725d, 129, 12, '', 1250899265, '0', 0),
(877, 0x5b636c723d7265645d466f72756d5b2f636c725d20506c7320636865636b2074686520666f72756d20657665727964617920736f6d65207761707065727a207573652074686520666f72756d20746f20666768742e2044656c657465207468617420706f737420616e642067697665207761726e696e6720746f2074686174207761707065727a2e2041766f6964205b636c723d626c75655d66726565506f73746e675b2f636c725d20786365707420746f207572206f776e20636c7562206f7220696e2066756e2f67616d657320666f72756d21202020, 132, 2, '', 1250899629, '0', 0),
(878, 0x776c616e672073756d7567616c2075692067616d626c696e6720322e202e202e, 50, 8, '', 1250900216, '0', 0),
(879, 0x5b636c723d7265645d5354415455535b2f636c725d20506c732e204c6574207573206e6f7420626520626f61737466756c20666f72207765206172652061207374616666206865726520646e742075736520757220706f776572206173206120737461666620746f207572206f776e20706572736f6e616c20616e67657220746f20746865207761707065727a2062652070726f66666573696f6e616c20776520617265206865726520746f206761696e20667269656e6473686970206e6f7420746f206761696e20706f776572215b636c723d7265645d524553504543545b2f636c725d2065616368206f746865722e204966207765205b636c723d7265645d4f776e6572735b2f636c725d20617265206e6f742061726f756e64207468655b636c723d626c75655d20686561642061646d696e5b2f636c725d2077696c6c20626520696e20636861726765202069662074686520686561642061646d696e206973207374696c6c206e6f742061726f756e642074686520205b636c723d70696e6b5d61646d696e5b2f636c725d20697320696e20636861726765207468656e20746865205b636c723d79656c6c6f775d6d6f64657261746f725b2f636c725d20616e79206d697320757365206f66207374617475732077696c6c2062652064656d6f7465642e, 132, 2, '', 1250900615, '0', 0),
(880, 0x5b636c723d7265645d4d6f64204c6f675b2f636c725d20506c73206f6e6c79204f776e65722077696c6c20636c65616e20746865206c6f67207468616e6b7321, 132, 2, '', 1250900888, '0', 0),
(881, 0x2e6c686174206e672074616f20646461746e6720756e672074796d206e206d7761776c6e206e67206d686c676e672074616f20736120627568792e202e7065726f20686e64206c68617420746e74616c696b7572616e20786920476f642e202e647074206e6761207078616c616d6174207020746175206b7920476f642073206d6761206f7261732061742061726177206e206e6b786d61206e746e20756e67206d686c67616e67207461306e6720756e2e202e202e, 19, 18, '', 1250901479, '0', 0),
(882, 0x5b636c723d7265645d4d756c7469706c652075736572204e616d655b2f636c725d2057652063616e20616c6c6f776564206561636820616e642065766572796f6e6520746f2075736520332075736572206e616d65206173206c6f6e67206173207468657920646e742076696f6c61746520616e792072756c65732e204275742069662031206f6620746865726520757365726e616d652076696f6c61746520616e792072756c657320746861742063617573652068696d2f68657220746f2062652062616e6e656420616c736f2062616e6e6564207468652072657374206f662068657220757365726e616d6521, 132, 2, '', 1250901480, '0', 0),
(883, 0x457068657369616e7320323a3820466f722062792067726163652061726520796520736176656420746872307567682066616974683b20616e642074686174204e3054204f4620594f555253454c5645533a206974206973207468652067696674206f6620474f442e, 135, 18, '', 1250901964, '0', 0),
(884, 0x5b636c723d7265645d46696e616c795b2f636c725d20456e6a6f792077617070696e6720616e64206265206e69636520746f2065766572796f6e6520616c776179732068656c7020746865206e6577626965732069662074686579206e6565642075722068656c702028776167206b616e67206d6173756e676974292077656c636f6d65206576657279626f64792073656e64207468656d20706d202c207369676e20746865726520677565737420626f6f6b206f722073656e64207468656d20612067696674206f72206120626967206875672120492077616e7420616c6c206f66207573206865726520746f20626520686170707920616e6420656e6a6f792074686520636f6d70616e79206f662065616368206f746865722121205468616e6b7320746f20616c6c20757220737570706f7274212120496620752077616e7420746f20616464206d6f72652072756c657320706d20616e79206f776e6572207468616e6b7320616761696e2120, 132, 2, '', 1250902171, '0', 0),
(885, 0x2e686e64692e202e6b6320697473206f6e6c7920746865204c4f5244204a45535553204348524953542077686f2063616e20736176652075732e202e416374732031363a333120416e64207468657920736169642c2042656c69657665206f6e20746865204c4f5244204a45535553204348524953542c20616e642074686f75207368616c742062652073617665642c20616e642074687920686f7573652e, 109, 18, '', 1250902499, '0', 0),
(886, 0x2e686e64692e202e6b6320697473206f6e6c7920746865204c4f5244204a45535553204348524953542077686f2063616e20736176652075732e202e416374732031363a333120416e64207468657920736169642c2042656c69657665206f6e20746865204c4f5244204a45535553204348524953542c20616e642074686f75207368616c742062652073617665642c20616e642074687920686f7573652e, 109, 18, '', 1250902547, '0', 0),
(887, 0x5b75726c3d687474703a2f2f33672e6d79676c6f62652e636f6d40686974636f696e732e636f6d2f696e2e7068703f7369643d36323031315d20484954434f494e5320504c532e20434c49434b205b2f75726c5d205b62722f5d2068656c7020757320746f2067726f772074687320736974652e202e202e, 151, 8, '', 1250903257, '0', 0),
(888, 0x5b75726c3d687474703a2f2f33672e6d79676c6f62652e636f6d40776170747261636b2e6e65742f77656c636f6d652f33323636315d20574150545241434b20504c5320434c49434b5b2f75726c5d205b62722f5d2068656c7020757320746f2067726f77207468732073697465202e202e20, 151, 8, '', 1250903411, '0', 0),
(889, 0x5b625d4144564552545b2f625d203e20706c656173652068656c7020616c736f20746f20616476657274697365206f75722073697465202e202e202e746f206d616b652075732067726f7720616e6420746f206265636f6d652074686520746f702e202e20, 132, 8, '', 1250904474, '0', 0),
(890, 0x616d207374696c6c206469737361706f696e7465642e, 44, 2, '', 1250904542, '0', 0),
(891, 0x5b625d504552534f4e414c2057415053495445205b2f625d203e706c65617365206265206177617265206f66207768617420697320706f7374656420696e20706572736f6e616c77617073697465207370656369616c7920746f207468652073746166662077686f2068617665207468656972206f776e20502d7369746520776520646f6e74206b6e6f7720746865792070757420746865206c696e6b2077656e2e7275206f20616e792070657273306e616c20646f6d61696e20696e206e616d652062757420696620776520636c69636b2069742077696c20726564697265637420746f2062696720636861742073697465202e207468616e6b20626520617761726520706c656173652e202e, 132, 8, '', 1250904664, '0', 0),
(892, 0x746f20696e666f726d207520616c6c2072656c6120616464696e6720706f7374206865726520697320737570706f72746564206279206d6520736f20706c73207265616420697420616c736f20616e6420666f6c6c6f772e205468616e6b7320, 132, 2, '', 1250905252, '0', 0),
(893, 0x687474703a2f2f7668617a2e77656e2e7275, 119, 59, '', 1250905612, '0', 0),
(894, 0x6d6167706f737420646e67206b326c61642071206861686168612e6c6f6c312e, 156, 8, '', 1250906034, '0', 0),
(895, 0x68626e672070696e6170616c6f206e67206e616e6179206e79612e202e20, 116, 8, '', 1250906092, '0', 0),
(896, 0x666f72206f6d332e31206c6f66692026206869666920616e64206f6d332e31322049503a3139352e3138392e3134322e363820504f52543a38302041504e3a687474702e676c6f62652e636f6d2e7068, 157, 59, '', 1250908196, '0', 0),
(897, 0x666f72206f6d322e3020616e64206f6d322e30362049503a38302e3233322e3131372e313020504f52543a38302041504e3a687474702e676c6f62652e636f6d2e7068, 157, 59, '', 1250908376, '0', 0),
(898, 0x747269656420616e6420746573746564206e612079616e2e2e206e6578742074696d65206e616c616e672079756e67206962612e2e2068616e61702070616b6f, 157, 59, '', 1250908639, '0', 0),
(899, 0x486d6d2c63676f726f206e6b613277616420686168616861, 156, 12, '', 1250909014, '0', 0),
(900, 0x416d2073616420692072696c79206d6973732068696d202e6372792e20, 44, 12, '', 1250909767, '0', 0),
(901, 0x416b6f20736f756c207461796120712062616e6b207120686168616861, 50, 12, '', 1250909834, '0', 0),
(902, 0x6f6f707320636e6f2079616e2120616e6720736b7420616d616e2e2e205569207569202e6b69636b2e, 53, 12, '', 1250910030, '0', 0),
(903, 0x57656c6c2073696d706c65206c6e67207363686f6f6c20712073612068696768207363686f6f6c206e617461706f73206d6520736120204c494e414255414e204e4154494f4e414c20484947482c5343484f4f4c2c4c494e414255414e204e30525445204b414c49424f2c414b4c414e2e2e736120636f6c6c6567652073696d706c6520646e20205341494e54204741425249454c2043304c4c454745206b6e672073616e20642071206e7461706f7320647265616d20636f7572736520712064686c207361206869726170206e6720627568617920712e2e, 46, 12, '', 1250910362, '0', 0),
(904, 0x6d676163657274696669656470617861776179202e6b69636b2e, 48, 12, '', 1250910539, '0', 0),
(905, 0x6861616e306e6773766d6f6469716d61696e74696e6468616e21, 48, 8, '', 1250910956, '0', 0),
(906, 0x6f6f206e616d616e20696b6177206d6167616e6461206b613f, 158, 8, '', 1250911009, '0', 0),
(907, 0x6f6f206e616d616e20696b6177206d6167616e6461206b613f20, 158, 49, '', 1250911565, '0', 0),
(908, 0x4775697461722c616e64206472756d73, 161, 12, '', 1250911691, '0', 0),
(909, 0x6e61692074616d61206e6120706f2e202e6d7920736970306e207061206171207554616e67206e61206d756e6120616e672070616c6f20686168616861202e726f6c6c2e, 116, 10, '', 1250911816, '0', 0),
(910, 0x6b616c6761206275726f7420627761686168616861202e706d706c2e, 7, 10, '', 1250911976, '0', 0),
(911, 0x6b6170616d696c7961207869206174756820657665722073696e6365, 133, 10, '', 1250912053, '0', 0),
(912, 0x73684f7762697a20757064615465206d61614c6162206e612067614c6974206e61674c4c6761624c61622073612067614c69742e202e626b54206e67612062412067614c69743f, 6, 10, '', 1250912275, '0', 0),
(913, 0x6d652074306f206861686168612062696e6162617861206b63206e6c61207067206d79747874206b65612032206265207361666520616c77617973206e786120706f636b657420712e, 117, 10, '', 1250914552, '0', 0),
(914, 0x776c61206e67207361736b7420736120676e7761206e6961206b6179612062676179206c6e67206e696120326c616b207361206d742066756a69207761686168616861, 53, 15, '', 1250914989, '0', 0),
(915, 0x692061677265652c2073686169212074616d61206b612c, 150, 15, '', 1250915948, '0', 0),
(916, 0x7061736177617920657665722120616d626f742c20626c6565682c206577616e2c746f696e6b7a2c6e79656b2177756921, 154, 15, '', 1250917732, '0', 0),
(917, 0x5b695d57696e74657220736e4f772069732066616c6c696e6720644f776e2e204368696c6472656e206c61756768696e2720616c6c2061726f756e642e204c69676874277320617265207475726e696e67206f6e206c696b6520612066616972792074616c6520636f6d6520747275652e2053697474696e67206279207468652066697265207765206d6164652075722074686520616e73776572207768656e2069207072617965642e202e6920776f756c642066696e6420736f6d656f6e6520616e64206e616e6169206920666f756e6420752e2e202e616c6c20692077616e5420697320746f20686f6c64207520666f72657665722c20616c6c2069206e6565642069732075206d6f726520657672796461792e20552073617665206d792068656172742066726f6d206265696e672062726f6b656e2061706172742e20596f7520677665207572206c6f7665206177617920616e642069207468616e6b66756c20657665727964617920666f72207468652067696674202e6d757369632e2e6774722e202e6775697461722e5b2f695d, 162, 10, '', 1250918156, '0', 0),
(918, 0x5b695d7761746368696e67206173207520736f66746c7920736c6565702e2057686174206920677665206966206920636f756c64206b656570206a7573742074686973206d6f6d656e74206966206f6e6c792074696d652073746f6f64207374696c6c206275742074686520636f6c6f7227732066616465206177617920616e6420746865207965617227732077696c206d616b65207573206772617920627574206e616e616920696e206d7920657965732075276c6c207374696c2062652062656175746966756c2e202e202e736d696c652e202e6d757369632e202e6774722e5b2f695d, 162, 10, '', 1250918356, '0', 0),
(919, 0x6f6b206c6e672079616e207368616d69652c696d707274616e7465206d73617961207461752073612063757272656e7420736974756174696f6e206e746e2c736973216861706920626461792c206175677573742032322c2032303039, 46, 15, '', 1250918576, '0', 0),
(920, 0x6e616e616920712073616e6120706f2064206b617520756d6979616b202e6372792e2066206576657220706f2067757332206e656f20706b696e6767616e20616e6720736f6e672069736970696e206e656f20706f20616e6432206c6e672061712e2068616e64616e67206d6b6972616d61792e202e68616e64616e67206d6b696e696720736120776c616e67206b54707573616e67206b77656e746f68616e2e202e686e6420706f206d6167626261676f206320616c657861206e612074696e7572696e67206d306e67206b705469642c206b61696267616e2061742068676954207361206c6168617420616e616b2e202e6e616e61692069206c6f7665207520706f20616e6420686170707920626461792e202e2057616b206b6e6120706f202e6372792e206861272070726f6d7a206d6f20706f2e202e6e642071206e6120646e20706f206b617520696977616e206e61692e202e6372792e, 162, 10, '', 1250918695, '0', 0),
(921, 0x6e61692068616861686120776c61206e612071206d786269206e6169206261787461207067206d792070726f626c656d6120616e6432206c6e672061712e202e68616e64616e67206c656368306e696e207461696e6761207120736120696e6974206e672063702071207067326d617461776167206b612e204861686168616861202e726f6c6c2e, 162, 10, '', 1250918980, '0', 0),
(922, 0x4576657279646179206920757365642074686973203320776f72647320746f20616c6c2070656f706c652061726f756e64206d65206a75732073686f7720736f6d65206c6f766520616e6420726573706563742c6576656e20746f2074686520737472616e6765727a20736f2049204c4f564520594f5520414c4c204f4620594f5520484552452e, 146, 12, '', 1250919212, '0', 0),
(923, 0x2e726f636b65722e202e62616e616e612e202e6b69636b202e746f6d61746f2e202e67756e2e202e62616e642e202e6177772e202e726170612e202e6c6f76652e202e726f73652e202e6472756e6b2e20, 162, 8, '', 1250919261, '0', 0),
(924, 0x5b75726c3d687474703a2f2f726574726976657761702e776170746f702e6d652f3f69643d323733315d504c5320434c49434b20544849535b2f75726c5d, 151, 8, '', 1250919376, '0', 0),
(925, 0x2e6d776168312e202e6d776168322e, 162, 10, '', 1250919417, '0', 0),
(926, 0x285b695d20546865204c6f7264206973206d7920737472656e67687429205b2f695d205073616d6c732032383a37, 163, 8, '', 1250920133, '0', 0),
(927, 0x3130, 21, 10, '', 1250921305, '0', 0),
(928, 0x4c4f56452055, 146, 8, '', 1250921423, '0', 0),
(929, 0x61742062757761796120616e672074616e676120686168616861202e706d706c2e, 70, 10, '', 1250921442, '0', 0),
(930, 0x6c616b6173206e67207472697020643220616e7568206b617961206b756e67206d6174696e75207461753f202e6c6f6c312e, 70, 8, '', 1250921569, '0', 0),
(931, 0x4b696e6720616e6420717565656e206f66206865617274277320627920646176696420706f6d6572616e7a, 8, 10, '', 1250921615, '0', 0),
(932, 0x4174652070776420626e67203f6d646d653f6d646d652061716e67206676727465206e2076727a2e6520686568652065746f, 163, 3, '', 1250921711, '0', 0),
(933, 0x5b625d53495445204d454e555b2f625d203e20706c656173652020696620796f752063616e206d616e61676520746f20616476696365206e6577626965207768617420697320696e206f7572206d61696e206d656e75202e202e202e206c6574207468656d206b6e6f7720746861742077652068617665206c696b652074686973207374756666202e202e207370656369616c7920696e204558545241532020736f20746865792063616e2066696e64206d6f726520696e746572657374696e672068657265207468616e6b7320666f7220737570706f72742e, 132, 8, '', 1250921940, '0', 0),
(934, 0x627761686168616861202e70756e63682e20616c616e6779612e202e2049624120794f6e2065682e, 32, 10, '', 1250921969, '0', 0),
(935, 0x797570207077643f206a75737420706f737420686572652077656c63306d65206b687420616e306820776167206c616e67206d61737961646f206d61686162612e2e, 163, 8, '', 1250922021, '0', 0),
(936, 0x5b695d616e64204a6573757320616e73776572656420756e746f2068696d2c736179696e672c4974206973207772697474656e2c54686174206d616e207368616c6c206e6f74206c69766520627920627265616420616c6f6e652c62757420627920657665727920776f7264206f6620474f442e5b2f695d286c756b6520343a3429, 163, 3, '', 1250922047, '0', 0),
(937, 0x4c6f766520752074306f20686168616861202e70756e63682e, 146, 10, '', 1250922163, '0', 0),
(938, 0x5b695d747261696e2075702061206368696c6420696e20746865207761792068652073686f756c6420676f20616e64207768656e206865206973206f6c642c68652077696c6c206e3074206465706172742066726f6d2069745b2f695d2870726f76657262732032323a3629, 163, 3, '', 1250922229, '0', 0),
(939, 0x546f696e782e, 30, 10, '', 1250922253, '0', 0),
(940, 0x61682e20697320746861742069743f203f202e636f6e667573652e204865686520657870616e64206e656f2070612070617461417320712068612e, 142, 10, '', 1250922357, '0', 0),
(941, 0x6974206470656e647a20686168616861, 144, 10, '', 1250922416, '0', 0),
(942, 0x42776c206e676120706c6120756e67206d676120706572786f4e616c206e2073697465206e206d72756e67206e6b4c676179206e206c696e6b2e6e672073526c69206e65616e6720636f4d6d756e69747920746e74, 119, 3, '', 1250922570, '0', 0),
(943, 0x69206c6f76652075206275742069206c696564202e746f696e7821202e6d757369632e206b616e74612079306e2065682e206e7761792074686174277320776861742077652063616c6c65642047414d45206973204f5645522e20627761686168616861202e726f6c6c2e, 145, 10, '', 1250922595, '0', 0),
(944, 0x6e616e616920616d20686572652068656865202e736d696c652e, 59, 10, '', 1250922694, '0', 0),
(945, 0x546f6c20706b6920706c77616e616720756e67206d6761206e657762692e6e307a626c69642079616e2e61686168612e7065616365, 157, 3, '', 1250922744, '0', 0),
(946, 0x2e726561642e, 6, 12, '', 1250922772, '0', 0),
(947, 0x4b414d4120626120616e67206261736568616e206e67204c4f5645206d6f206b75612073306b30693f2048656865202e636f6e667573652e, 149, 10, '', 1250922808, '0', 0),
(948, 0x4164696b2e686e642061427a7472616b20756e2e6d4f534149432e48414841, 5, 3, '', 1250922854, '0', 0),
(949, 0x4163636570742074686520666163742074686174207468722773206e6f204c4f564520776974684f757420485552542e20, 148, 10, '', 1250922949, '0', 0),
(950, 0x6166747220616c6c206472616d6120657665722020616e672068616e326e67616e20736973746572206c696e6b2070616c612e202e77614161482120636e4f6e67206d5470616e673f203f203f20432072656c613f206861686168616861202e726f6c6c2e20776578697421, 6, 10, '', 1250923341, '0', 0),
(951, 0x616d20796572, 20, 10, '', 1250924928, '0', 0),
(952, 0x2e6372792e206261627920712073616c616d61742073612073306e67202e6372792e73616e612064322074617461692075206e61206d69732071206e612078612068756875206570616c206c6e672e2e686d6d2c616e6f2062207361326268696e207120706172616e6720616c61206e61206e61736162692071206e61207361752063676f726f207468616e6b207520756c697420617420696e676174206b206c616769206a616e20616e64206d6168616c206b7461206261627920712e2e2020, 162, 12, '', 1250924932, '0', 0),
(953, 0x2e6372792e206261627920712073616c616d61742073612073306e67202e6372792e73616e612064322074617461692075206e61206d69732071206e612078612068756875206570616c206c6e672e2e686d6d2c616e6f2062207361326268696e207120706172616e6720616c61206e61206e61736162692071206e61207361752063676f726f207468616e6b207520756c697420617420696e676174206b206c616769206a616e20616e64206d6168616c206b7461206261627920712e2e2020, 162, 12, '', 1250924989, '0', 0),
(954, 0x4461646167206b75206c6e672c20756e67206d676120706572736f6e616c2073697465206e6120636f6e6e6563746564206f72206d79206c696e6b206e67206962616e6720636f6d6d756e69747920736974652c2070616b692073616c69206e796f206e6d616e206c696e6b206e67205b625d5b636c723d626c75655d687474703a2f2f726574726976657761702e636f2e7a615b2f636c725d5b2f625d20736120706172746e65722073697465206e796f2e202e202e204966206e30742077652077696c6c2064656c65746520757220706f73742c202c20706167206e6b69746120756c6974206e616d696e20756e67206c696e6b206e796f2064322c2063205b625d5b636c723d7265645d52696465725b2f636c725d5b2f625d206e206268616c61206479616e, 119, 11, '', 1250925032, '0', 0),
(955, 0x536120636c6f73206a616e20636c61206e6167206b6120616e616b2e2e2068616b68616b20616e6720706e616b61636c6f736f20616e67206c61326b692e2e626b383f206d79726e206d6761206c616c616b69206e612061796177206d6174696e676e616e20756e67206766206e67206962616e67206c61326b692c207065726f20636c61206179756e2e2e2020326c75206e61206c61776179206b63206e6b616b697461206c6e67206e67202073657879206e6b6173756f74206b7461206e612070776574206861686168612e2e, 123, 12, '', 1250925460, '0', 0),
(958, 0x4d6177616c616e206e6720616e6f3f207069736f3f202e6e656e652e, 124, 12, '', 1250925542, '0', 0),
(959, 0x686168616861206d776c616e206e67207061612e202e686168616861202e726f6c6c2e, 124, 10, '', 1250925700, '0', 0),
(960, 0x686168616861686120632064306d696e67206e61693f2068616861686168616861202e726f6c6c2e, 123, 10, '', 1250925791, '0', 0),
(961, 0x626b61206e6177616c616e206e67206469676e6964616421, 124, 8, '', 1250925856, '0', 0),
(976, 0x312e20552073686f756c64205052415920524547554c41524c59205073616c6d2035353a3137204c494645206f66204b494e47204441564944202e706f702e, 166, 10, '', 1250943273, '0', 0),
(962, 0x7761686168616861206d7a2071206e612064696e20632074617461692078616e61206d676b7461206b6d69206e7961686168616861202e706d706c2e, 162, 10, '', 1250925892, '0', 0),
(963, 0x2e6669742e202e6c6f76652e, 162, 8, '', 1250925939, '0', 0),
(964, 0x67726f7570202e6875672e, 162, 10, '', 1250927244, '0', 0),
(965, 0x2e746f6d61746f2e202b202e6b697373312e, 24, 11, '', 1250929405, '0', 0),
(966, 0x2e6875672e202e63616b65642e202e6e656e652e, 24, 10, '', 1250929567, '0', 0),
(967, 0x316c617374206372792c316c617374206372792c623420696c6976206974206f6c206268696e642c6920676f7461207075742075206f7574206f66206d79206d696e642c64732074796d2c2073746f70206c69766e2061206c69652e2e, 51, 15, '', 1250929648, '0', 0),
(968, 0x686168616861206d616c69206e6b61746968617961206171202e70756e63682e206e657874206e6b6175706f, 156, 10, '', 1250929814, '0', 0),
(969, 0x456e6b204e616b616461706120616b75206e6761756e202e626565652e202e687568752e204e6578742e204e6b6120686177616b207361204350, 156, 11, '', 1250930061, '0', 0),
(970, 0x4d736b74206b6179612c736f62726120736b742c6e77616c616e20616b6f2c6e77616c616e206e6720616c6167616e672061736f2c68756875687520617320696e20696e6979616b616e206b6f20746c67612068612c67726162652c2070617261206e6761206b6f2062616c69772065682c, 124, 15, '', 1250931459, '0', 0),
(971, 0x4568207061672067616c6973696e20756e672061736f6e67206e6177616c612c206d6173616b697420702064696e206b79613f204861686168612e202e202e202e726f6c6c2e, 124, 11, '', 1250933030, '0', 0),
(972, 0x5b75726c3d687474703a2f2f686974636f696e732e636f6d2f696e2e7068703f7369643d383532305d506c6561736520656e7465725b2f75726c5d, 151, 1, '', 1250933321, '0', 0),
(973, 0x646f6d7a206d68616c206e61206d68616c206b6f20756e2c6b657361207361206266206b6f2c206e7961686168616861, 124, 15, '', 1250939310, '0', 0),
(974, 0x546f786963, 45, 11, '', 1250939317, '0', 0),
(975, 0x6d652032707273656e74, 11, 49, '', 1250940284, '0', 0),
(977, 0x496e646920616b6f2070696e30792c2c2c2c206e3079706920616b6f202e677564626f792e, 4, 11, '', 1250943485, '0', 0),
(978, 0x7761686168616861206469676e697479206c6f73743f616e306e67206b6c6173696e67206469676e697479206d68793f202e726f6c6c2e, 124, 10, '', 1250944213, '0', 0),
(1000, 0x6767676767676767676767676767676767676767676767676767676767676767676767676767676767676767, 112, 78, 'upload/posts/996142_1524486861100924_2754156970915', 1411987088, '0', 0),
(999, 0x6767676767676767676767676767676767676767676767676767676767676767676767676767676767676767, 112, 78, 'upload/posts/996142_1524486861100924_2754156970915', 1411987008, '0', 0),
(998, 0x65666766676667666766676667666766676667666766676667666766676667666766676667666766676667666766676667666766676667666766676667666766676667, 112, 77, 'upload/posts/Capture.png', 1411742977, '0', 0),
(996, '', 0, 0, '', 0, '0', 0),
(997, 0x6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a, 112, 78, 'upload/posts/8ball.jpg', 1411576525, '0', 0),
(994, 0x6b6b6b6b6b6b, 112, 78, '', 1411575704, '0', 0),
(995, 0x6b6b6b6b6b6b, 112, 78, '', 1411576136, '0', 0),
(991, 0x48656c6c6f676767676767676767676767676767676767676767676767676767676767, 112, 78, 'forum/SM.jpg', 1409902952, '0', 0),
(992, 0x5b636c723d676f6c645d68686868686868686868686868686868686868686868686868686868685b2f636c725d, 112, 78, 'forum/SM_1.jpg', 1409903277, '0', 0),
(993, 0x676466676466676467646667646667646667667364676667666467646666676467646667646766646764, 112, 78, 'forum/SM_POST_damith.jpg', 1411234059, '0', 0),
(1001, 0x6767676767676767676767676765657272327232337232723267, 112, 78, 'upload/posts/996142_1524486861100924_2754156970915', 1411987135, '0', 0),
(1002, 0x6767676767676767676767676765657272327232337232723267, 112, 78, 'upload/posts/996142_1524486861100924_2754156970915', 1411987181, '0', 0),
(1003, 0x6153535353535353535353535353535353535353535353535353535353535353535353535353535353535353535353535353535353535353535353, 112, 78, 'upload/posts/10653993_270031316537214_1055689780_n', 1411987243, '0', 0),
(1004, 0x616161616161616161616161616161616161616161616161, 112, 78, 'upload/posts/996142_1524486861100924_2754156970915684982_n_4.jpg', 1411987562, '0', 0),
(1005, 0x7373737373737373737373737373737373737373737373, 112, 78, 'upload/posts/10647657_270031406537205_2129375708_n.jpg', 1411987764, '0', 0),
(1006, 0x7373737373737373737373737373737373737373737373, 112, 78, 'upload/posts/10647657_270031406537205_2129375708_n_1.jpg', 1411987940, '0', 0),
(1007, 0x7373737373737373737373737373737373737373737373, 112, 78, 'upload/posts/10647657_270031406537205_2129375708_n_2.jpg', 1411987986, '0', 0),
(1008, 0x7373737373737373737373737373737373737373737373, 112, 78, 'upload/posts/10647657_270031406537205_2129375708_n_3.jpg', 1411988093, '0', 0),
(1009, 0x7373737373737373737373737373737373737373737373, 112, 78, 'upload/posts/.SM_POST_112_78..jpg', 1411989185, '0', 0),
(1010, 0x7373737373737373737373737373737373737373737373, 112, 78, 'upload/posts/.SM_POST_112_78..png', 1411989232, '0', 0),
(1011, 0x7373737373737373737373737373737373737373737373, 112, 78, 'upload/posts/.SM_POST_112_78.jpg', 1411989370, '0', 0),
(1012, 0x64646464646464646464646464646464646464646464646464646464, 112, 78, '', 1412105519, '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_pp_gbook`
--

CREATE TABLE IF NOT EXISTS `ibwf_pp_gbook` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `uid` int(100) NOT NULL DEFAULT '0',
  `sname` varchar(15) NOT NULL DEFAULT '',
  `semail` varchar(100) NOT NULL DEFAULT '',
  `stext` text NOT NULL,
  `sdate` int(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `ibwf_pp_gbook`
--

INSERT INTO `ibwf_pp_gbook` (`id`, `uid`, `sname`, `semail`, `stext`, `sdate`) VALUES
(1, 77, 'dddddddd', 'ddddddddd', 'ddddddddddddd', 1411836634);

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_pp_pres`
--

CREATE TABLE IF NOT EXISTS `ibwf_pp_pres` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `pid` int(100) NOT NULL DEFAULT '0',
  `ans` int(5) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_premium`
--

CREATE TABLE IF NOT EXISTS `ibwf_premium` (
  `uid` int(11) NOT NULL,
  `time` int(50) NOT NULL,
  `c` int(11) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ibwf_premium`
--

INSERT INTO `ibwf_premium` (`uid`, `time`, `c`) VALUES
(77, 1413910054, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_presults`
--

CREATE TABLE IF NOT EXISTS `ibwf_presults` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `pid` int(100) NOT NULL DEFAULT '0',
  `uid` int(100) NOT NULL DEFAULT '0',
  `ans` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `ibwf_presults`
--

INSERT INTO `ibwf_presults` (`id`, `pid`, `uid`, `ans`) VALUES
(1, 3, 16, 1),
(2, 1, 16, 1),
(3, 1, 8, 1),
(10, 5, 10, 1),
(5, 3, 8, 1),
(6, 1, 12, 1),
(7, 3, 12, 1),
(9, 5, 8, 1),
(11, 5, 11, 1),
(12, 5, 44, 1),
(13, 5, 13, 2),
(14, 3, 49, 1),
(15, 5, 78, 1),
(16, 1, 78, 1),
(17, 3, 78, 2),
(18, 4, 78, 5);

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_private`
--

CREATE TABLE IF NOT EXISTS `ibwf_private` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `text` blob NOT NULL,
  `image` varchar(100) NOT NULL,
  `byuid` int(100) NOT NULL DEFAULT '0',
  `touid` int(100) NOT NULL DEFAULT '0',
  `unread` char(1) NOT NULL DEFAULT '1',
  `timesent` int(100) NOT NULL DEFAULT '0',
  `starred` char(1) NOT NULL DEFAULT '0',
  `reported` char(1) NOT NULL DEFAULT '0',
  `folderid` int(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=197 ;

--
-- Dumping data for table `ibwf_private`
--

INSERT INTO `ibwf_private` (`id`, `text`, `image`, `byuid`, `touid`, `unread`, `timesent`, `starred`, `reported`, `folderid`) VALUES
(1, 0x6b6b6b6b6b6b6b6b6b6b6b6b6b6b, '', 78, 78, '0', 1409896624, '0', '0', 0),
(5, 0x676666666666666666666666666666666666666666666664, 'pmimages/sm.jpg', 78, 78, '0', 1409897492, '0', '0', 0),
(4, '', '/pmimages/sm_1.jpg', 78, 78, '0', 1409896830, '0', '0', 0),
(6, 0x5b636c723d677265656e5d6b6c6c6c6c6a6a6a6a6a6a6a6a5b2f636c725d, 'pmimages/sm_1.jpg', 78, 78, '0', 1409898594, '0', '0', 0),
(7, 0x5b636c723d677265656e5d6b6c6c6c6c6a6a6a6a6a6a6a6a5b2f636c725d, 'pmimages/sm_2.jpg', 78, 78, '0', 1409898718, '0', '0', 0),
(8, 0x5b636c723d677265656e5d6b6c6c6c6c6a6a6a6a6a6a6a6a5b2f636c725d, 'pmimages/sm_3.jpg', 78, 78, '0', 1409898735, '0', '0', 0),
(9, 0x5b636c723d677265656e5d6b6c6c6c6c6a6a6a6a6a6a6a6a5b2f636c725d, 'pmimages/sm_4.jpg', 78, 78, '0', 1409898861, '0', '0', 0),
(30, '', '', 78, 80, '1', 1411222719, '0', '0', 0),
(31, '', '', 78, 78, '0', 1411223035, '0', '0', 0),
(11, 0x6c6c6c6c6c6c6c6c6c6c6c6c6c6c6c6c6c6c6c6c6c6c6c6c6c6c6c6c6c6c6c6c6c6c6c6c6c6c6c6c6c6c6c6c6c6c6c6c6c6c6c6c6c6c, '', 78, 78, '0', 1409898907, '0', '0', 0),
(12, 0x492077616e6e61206a6f696e20796f7572205b636c75623d365d46756e2046756e2046756e205b2f636c75625d20636c75625b62722f5d5b62722f5d5b736d616c6c5d287468697320697320616e206175746f20706d295b2f736d616c6c5d, '', 78, 1, '1', 1410112843, '0', '0', 0),
(13, 0x492077616e6e61206a6f696e20796f7572205b636c75623d335d4c494645205b2f636c75625d20636c75625b62722f5d5b62722f5d5b736d616c6c5d287468697320697320616e206175746f20706d295b2f736d616c6c5d, '', 78, 12, '1', 1410180077, '0', '2', 0),
(14, 0x492077616e6e61206a6f696e20796f7572205b636c75623d325d6365727469666965642070617361776179205b2f636c75625d20636c75625b62722f5d5b62722f5d5b736d616c6c5d287468697320697320616e206175746f20706d295b2f736d616c6c5d, '', 78, 8, '1', 1410180195, '0', '2', 0),
(15, 0x5b625d4e4f54494649434154494f4e3a5b2f625d5b62722f5d64616d69746820686173206a75737420637265617465642061204e657720737570706f7274207469636b65742e48616e646c65206974206e6f77215b62722f5d0d0a43617465676f72793a205b625d646464646464646464645b2f625d5b62722f5d50726f626c656d204465736372697074696f6e3a5b625d6464646464646464646464646a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a5b2f625d5b62722f5d546f2068616e646c6520697420676f20746f2043726561746520537570706f7274205469636b6574204f7074696f6e2d3e416c6c20537570706f7274205469636b6574735b62722f5d5b736d616c6c5d502e532e205468697320697320616e206175746f6d6174656420504d20666f7220616c6c207374616666735b2f736d616c6c5d, '', 3, 1, '1', 1411139856, '0', '0', 0),
(16, 0x5b625d4e4f54494649434154494f4e3a5b2f625d5b62722f5d64616d69746820686173206a75737420637265617465642061204e657720737570706f7274207469636b65742e48616e646c65206974206e6f77215b62722f5d0d0a43617465676f72793a205b625d646464646464646464645b2f625d5b62722f5d50726f626c656d204465736372697074696f6e3a5b625d6464646464646464646464646a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a5b2f625d5b62722f5d546f2068616e646c6520697420676f20746f2043726561746520537570706f7274205469636b6574204f7074696f6e2d3e416c6c20537570706f7274205469636b6574735b62722f5d5b736d616c6c5d502e532e205468697320697320616e206175746f6d6174656420504d20666f7220616c6c207374616666735b2f736d616c6c5d, '', 3, 2, '1', 1411139856, '0', '0', 0),
(17, 0x5b625d4e4f54494649434154494f4e3a5b2f625d5b62722f5d64616d69746820686173206a75737420637265617465642061204e657720737570706f7274207469636b65742e48616e646c65206974206e6f77215b62722f5d0d0a43617465676f72793a205b625d646464646464646464645b2f625d5b62722f5d50726f626c656d204465736372697074696f6e3a5b625d6464646464646464646464646a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a5b2f625d5b62722f5d546f2068616e646c6520697420676f20746f2043726561746520537570706f7274205469636b6574204f7074696f6e2d3e416c6c20537570706f7274205469636b6574735b62722f5d5b736d616c6c5d502e532e205468697320697320616e206175746f6d6174656420504d20666f7220616c6c207374616666735b2f736d616c6c5d, '', 3, 3, '1', 1411139856, '0', '0', 0),
(18, 0x5b625d4e4f54494649434154494f4e3a5b2f625d5b62722f5d64616d69746820686173206a75737420637265617465642061204e657720737570706f7274207469636b65742e48616e646c65206974206e6f77215b62722f5d0d0a43617465676f72793a205b625d646464646464646464645b2f625d5b62722f5d50726f626c656d204465736372697074696f6e3a5b625d6464646464646464646464646a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a5b2f625d5b62722f5d546f2068616e646c6520697420676f20746f2043726561746520537570706f7274205469636b6574204f7074696f6e2d3e416c6c20537570706f7274205469636b6574735b62722f5d5b736d616c6c5d502e532e205468697320697320616e206175746f6d6174656420504d20666f7220616c6c207374616666735b2f736d616c6c5d, '', 3, 5, '1', 1411139856, '0', '0', 0),
(19, 0x5b625d4e4f54494649434154494f4e3a5b2f625d5b62722f5d64616d69746820686173206a75737420637265617465642061204e657720737570706f7274207469636b65742e48616e646c65206974206e6f77215b62722f5d0d0a43617465676f72793a205b625d646464646464646464645b2f625d5b62722f5d50726f626c656d204465736372697074696f6e3a5b625d6464646464646464646464646a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a5b2f625d5b62722f5d546f2068616e646c6520697420676f20746f2043726561746520537570706f7274205469636b6574204f7074696f6e2d3e416c6c20537570706f7274205469636b6574735b62722f5d5b736d616c6c5d502e532e205468697320697320616e206175746f6d6174656420504d20666f7220616c6c207374616666735b2f736d616c6c5d, '', 3, 12, '1', 1411139856, '0', '0', 0),
(20, 0x5b625d4e4f54494649434154494f4e3a5b2f625d5b62722f5d64616d69746820686173206a75737420637265617465642061204e657720737570706f7274207469636b65742e48616e646c65206974206e6f77215b62722f5d0d0a43617465676f72793a205b625d646464646464646464645b2f625d5b62722f5d50726f626c656d204465736372697074696f6e3a5b625d6464646464646464646464646a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a5b2f625d5b62722f5d546f2068616e646c6520697420676f20746f2043726561746520537570706f7274205469636b6574204f7074696f6e2d3e416c6c20537570706f7274205469636b6574735b62722f5d5b736d616c6c5d502e532e205468697320697320616e206175746f6d6174656420504d20666f7220616c6c207374616666735b2f736d616c6c5d, '', 3, 11, '1', 1411139856, '0', '0', 0),
(21, 0x5b625d4e4f54494649434154494f4e3a5b2f625d5b62722f5d64616d69746820686173206a75737420637265617465642061204e657720737570706f7274207469636b65742e48616e646c65206974206e6f77215b62722f5d0d0a43617465676f72793a205b625d646464646464646464645b2f625d5b62722f5d50726f626c656d204465736372697074696f6e3a5b625d6464646464646464646464646a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a5b2f625d5b62722f5d546f2068616e646c6520697420676f20746f2043726561746520537570706f7274205469636b6574204f7074696f6e2d3e416c6c20537570706f7274205469636b6574735b62722f5d5b736d616c6c5d502e532e205468697320697320616e206175746f6d6174656420504d20666f7220616c6c207374616666735b2f736d616c6c5d, '', 3, 19, '1', 1411139856, '0', '0', 0),
(22, 0x5b625d4e4f54494649434154494f4e3a5b2f625d5b62722f5d64616d69746820686173206a75737420637265617465642061204e657720737570706f7274207469636b65742e48616e646c65206974206e6f77215b62722f5d0d0a43617465676f72793a205b625d646464646464646464645b2f625d5b62722f5d50726f626c656d204465736372697074696f6e3a5b625d6464646464646464646464646a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a5b2f625d5b62722f5d546f2068616e646c6520697420676f20746f2043726561746520537570706f7274205469636b6574204f7074696f6e2d3e416c6c20537570706f7274205469636b6574735b62722f5d5b736d616c6c5d502e532e205468697320697320616e206175746f6d6174656420504d20666f7220616c6c207374616666735b2f736d616c6c5d, '', 3, 13, '1', 1411139856, '0', '0', 0),
(23, 0x5b625d4e4f54494649434154494f4e3a5b2f625d5b62722f5d64616d69746820686173206a75737420637265617465642061204e657720737570706f7274207469636b65742e48616e646c65206974206e6f77215b62722f5d0d0a43617465676f72793a205b625d646464646464646464645b2f625d5b62722f5d50726f626c656d204465736372697074696f6e3a5b625d6464646464646464646464646a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a5b2f625d5b62722f5d546f2068616e646c6520697420676f20746f2043726561746520537570706f7274205469636b6574204f7074696f6e2d3e416c6c20537570706f7274205469636b6574735b62722f5d5b736d616c6c5d502e532e205468697320697320616e206175746f6d6174656420504d20666f7220616c6c207374616666735b2f736d616c6c5d, '', 3, 18, '1', 1411139856, '0', '0', 0),
(24, 0x5b625d4e4f54494649434154494f4e3a5b2f625d5b62722f5d64616d69746820686173206a75737420637265617465642061204e657720737570706f7274207469636b65742e48616e646c65206974206e6f77215b62722f5d0d0a43617465676f72793a205b625d646464646464646464645b2f625d5b62722f5d50726f626c656d204465736372697074696f6e3a5b625d6464646464646464646464646a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a5b2f625d5b62722f5d546f2068616e646c6520697420676f20746f2043726561746520537570706f7274205469636b6574204f7074696f6e2d3e416c6c20537570706f7274205469636b6574735b62722f5d5b736d616c6c5d502e532e205468697320697320616e206175746f6d6174656420504d20666f7220616c6c207374616666735b2f736d616c6c5d, '', 3, 59, '1', 1411139856, '0', '0', 0),
(25, 0x5b625d4e4f54494649434154494f4e3a5b2f625d5b62722f5d64616d69746820686173206a75737420637265617465642061204e657720737570706f7274207469636b65742e48616e646c65206974206e6f77215b62722f5d0d0a43617465676f72793a205b625d646464646464646464645b2f625d5b62722f5d50726f626c656d204465736372697074696f6e3a5b625d6464646464646464646464646a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a5b2f625d5b62722f5d546f2068616e646c6520697420676f20746f2043726561746520537570706f7274205469636b6574204f7074696f6e2d3e416c6c20537570706f7274205469636b6574735b62722f5d5b736d616c6c5d502e532e205468697320697320616e206175746f6d6174656420504d20666f7220616c6c207374616666735b2f736d616c6c5d, '', 3, 77, '0', 1411139856, '0', '0', 0),
(26, 0x5b636172643d3030385d746f20796f75206c7570696e3131315b2f636172645d205761706c697665205465616d207769736820796f752061206461792066756c6c206f66206a6f7920616e642068617070696e65737320616e64206d616e792068617070792072657475726e735b62722f5d2a66697265776f726b732a, '', 1, 17, '1', 1411151402, '0', '0', 0),
(27, 0x5b636172643d3030385d746f20796f75206b616d6f74655b2f636172645d205761706c697665205465616d207769736820796f752061206461792066756c6c206f66206a6f7920616e642068617070696e65737320616e64206d616e792068617070792072657475726e735b62722f5d2a66697265776f726b732a, '', 1, 32, '1', 1411151402, '0', '0', 0),
(28, 0x48617665206265696e67207369676e656420696e20796f757220677565737420626f6f6b20205b62722f5d5b62722f5d5b736d616c6c5d5b625d5b695d202020205468697320697320616e206175746f6d61746564206d65737361676520616e6420646f206e6f7420726573706f6e6420746f2069745b2f695d5b2f625d205b2f736d616c6c5d, '', 78, 32, '1', 1411197367, '0', '0', 0),
(29, 0x73737373737373737373737373737373737373737373, '', 78, 78, '0', 1411220134, '0', '0', 0),
(32, 0x5b636c723d676f6c645d73777777777777777777777777777777775b2f636c725d, '', 78, 78, '0', 1411223237, '0', '0', 0),
(33, 0x5b636c723d676f6c645d73777777777777777777777777777777775b2f636c725d, '', 78, 78, '0', 1411223246, '0', '0', 0),
(34, 0x5b636c723d7265645d73777777777777777777777777777777775b2f636c725d, '', 78, 78, '0', 1411223502, '0', '0', 0),
(35, 0x646464646464646464646464646464646464, '', 78, 78, '0', 1411224959, '0', '0', 0),
(36, 0x646464646464646464646464646464646464, '', 78, 78, '0', 1411224966, '0', '0', 0),
(37, 0x646464646464646464646464646464646464, '', 78, 78, '0', 1411224969, '0', '0', 0),
(38, 0x646464646464646464646464646464646464, '', 78, 78, '0', 1411224979, '0', '0', 0),
(39, 0x646464646464646464646464646464646464, '', 78, 78, '0', 1411225708, '0', '0', 0),
(45, 0x6767676767676767676767, '', 78, 77, '0', 1411226958, '0', '0', 0),
(41, '', '', 78, 78, '0', 1411226224, '0', '0', 0),
(42, '', '', 78, 78, '0', 1411226337, '0', '0', 0),
(48, '', '', 78, 78, '0', 1411232495, '0', '0', 0),
(47, 0x7975797475747975747975747975, 'pmimages/SM_PM_damith.jpg', 78, 78, '0', 1411232319, '0', '0', 0),
(49, 0x5b625d4e4f54494649434154494f4e3a5b2f625d5b62722f5d64616d69746820686173206a75737420637265617465642061204e657720737570706f7274207469636b65742e48616e646c65206974206e6f77215b62722f5d0d0a43617465676f72793a205b625d646464646464646464646464645b2f625d5b62722f5d50726f626c656d204465736372697074696f6e3a5b625d6464646464646464646464646464645b2f625d5b62722f5d546f2068616e646c6520697420676f20746f2043726561746520537570706f7274205469636b6574204f7074696f6e2d3e416c6c20537570706f7274205469636b6574735b62722f5d5b736d616c6c5d502e532e205468697320697320616e206175746f6d6174656420504d20666f7220616c6c207374616666735b2f736d616c6c5d, '', 3, 1, '1', 1411238590, '0', '0', 0),
(50, 0x5b625d4e4f54494649434154494f4e3a5b2f625d5b62722f5d64616d69746820686173206a75737420637265617465642061204e657720737570706f7274207469636b65742e48616e646c65206974206e6f77215b62722f5d0d0a43617465676f72793a205b625d646464646464646464646464645b2f625d5b62722f5d50726f626c656d204465736372697074696f6e3a5b625d6464646464646464646464646464645b2f625d5b62722f5d546f2068616e646c6520697420676f20746f2043726561746520537570706f7274205469636b6574204f7074696f6e2d3e416c6c20537570706f7274205469636b6574735b62722f5d5b736d616c6c5d502e532e205468697320697320616e206175746f6d6174656420504d20666f7220616c6c207374616666735b2f736d616c6c5d, '', 3, 2, '1', 1411238590, '0', '0', 0),
(51, 0x5b625d4e4f54494649434154494f4e3a5b2f625d5b62722f5d64616d69746820686173206a75737420637265617465642061204e657720737570706f7274207469636b65742e48616e646c65206974206e6f77215b62722f5d0d0a43617465676f72793a205b625d646464646464646464646464645b2f625d5b62722f5d50726f626c656d204465736372697074696f6e3a5b625d6464646464646464646464646464645b2f625d5b62722f5d546f2068616e646c6520697420676f20746f2043726561746520537570706f7274205469636b6574204f7074696f6e2d3e416c6c20537570706f7274205469636b6574735b62722f5d5b736d616c6c5d502e532e205468697320697320616e206175746f6d6174656420504d20666f7220616c6c207374616666735b2f736d616c6c5d, '', 3, 3, '1', 1411238590, '0', '0', 0),
(52, 0x5b625d4e4f54494649434154494f4e3a5b2f625d5b62722f5d64616d69746820686173206a75737420637265617465642061204e657720737570706f7274207469636b65742e48616e646c65206974206e6f77215b62722f5d0d0a43617465676f72793a205b625d646464646464646464646464645b2f625d5b62722f5d50726f626c656d204465736372697074696f6e3a5b625d6464646464646464646464646464645b2f625d5b62722f5d546f2068616e646c6520697420676f20746f2043726561746520537570706f7274205469636b6574204f7074696f6e2d3e416c6c20537570706f7274205469636b6574735b62722f5d5b736d616c6c5d502e532e205468697320697320616e206175746f6d6174656420504d20666f7220616c6c207374616666735b2f736d616c6c5d, '', 3, 5, '1', 1411238590, '0', '0', 0),
(53, 0x5b625d4e4f54494649434154494f4e3a5b2f625d5b62722f5d64616d69746820686173206a75737420637265617465642061204e657720737570706f7274207469636b65742e48616e646c65206974206e6f77215b62722f5d0d0a43617465676f72793a205b625d646464646464646464646464645b2f625d5b62722f5d50726f626c656d204465736372697074696f6e3a5b625d6464646464646464646464646464645b2f625d5b62722f5d546f2068616e646c6520697420676f20746f2043726561746520537570706f7274205469636b6574204f7074696f6e2d3e416c6c20537570706f7274205469636b6574735b62722f5d5b736d616c6c5d502e532e205468697320697320616e206175746f6d6174656420504d20666f7220616c6c207374616666735b2f736d616c6c5d, '', 3, 12, '1', 1411238590, '0', '0', 0),
(54, 0x5b625d4e4f54494649434154494f4e3a5b2f625d5b62722f5d64616d69746820686173206a75737420637265617465642061204e657720737570706f7274207469636b65742e48616e646c65206974206e6f77215b62722f5d0d0a43617465676f72793a205b625d646464646464646464646464645b2f625d5b62722f5d50726f626c656d204465736372697074696f6e3a5b625d6464646464646464646464646464645b2f625d5b62722f5d546f2068616e646c6520697420676f20746f2043726561746520537570706f7274205469636b6574204f7074696f6e2d3e416c6c20537570706f7274205469636b6574735b62722f5d5b736d616c6c5d502e532e205468697320697320616e206175746f6d6174656420504d20666f7220616c6c207374616666735b2f736d616c6c5d, '', 3, 11, '1', 1411238590, '0', '0', 0),
(55, 0x5b625d4e4f54494649434154494f4e3a5b2f625d5b62722f5d64616d69746820686173206a75737420637265617465642061204e657720737570706f7274207469636b65742e48616e646c65206974206e6f77215b62722f5d0d0a43617465676f72793a205b625d646464646464646464646464645b2f625d5b62722f5d50726f626c656d204465736372697074696f6e3a5b625d6464646464646464646464646464645b2f625d5b62722f5d546f2068616e646c6520697420676f20746f2043726561746520537570706f7274205469636b6574204f7074696f6e2d3e416c6c20537570706f7274205469636b6574735b62722f5d5b736d616c6c5d502e532e205468697320697320616e206175746f6d6174656420504d20666f7220616c6c207374616666735b2f736d616c6c5d, '', 3, 19, '1', 1411238590, '0', '0', 0),
(56, 0x5b625d4e4f54494649434154494f4e3a5b2f625d5b62722f5d64616d69746820686173206a75737420637265617465642061204e657720737570706f7274207469636b65742e48616e646c65206974206e6f77215b62722f5d0d0a43617465676f72793a205b625d646464646464646464646464645b2f625d5b62722f5d50726f626c656d204465736372697074696f6e3a5b625d6464646464646464646464646464645b2f625d5b62722f5d546f2068616e646c6520697420676f20746f2043726561746520537570706f7274205469636b6574204f7074696f6e2d3e416c6c20537570706f7274205469636b6574735b62722f5d5b736d616c6c5d502e532e205468697320697320616e206175746f6d6174656420504d20666f7220616c6c207374616666735b2f736d616c6c5d, '', 3, 13, '1', 1411238590, '0', '0', 0),
(57, 0x5b625d4e4f54494649434154494f4e3a5b2f625d5b62722f5d64616d69746820686173206a75737420637265617465642061204e657720737570706f7274207469636b65742e48616e646c65206974206e6f77215b62722f5d0d0a43617465676f72793a205b625d646464646464646464646464645b2f625d5b62722f5d50726f626c656d204465736372697074696f6e3a5b625d6464646464646464646464646464645b2f625d5b62722f5d546f2068616e646c6520697420676f20746f2043726561746520537570706f7274205469636b6574204f7074696f6e2d3e416c6c20537570706f7274205469636b6574735b62722f5d5b736d616c6c5d502e532e205468697320697320616e206175746f6d6174656420504d20666f7220616c6c207374616666735b2f736d616c6c5d, '', 3, 18, '1', 1411238590, '0', '0', 0),
(58, 0x5b625d4e4f54494649434154494f4e3a5b2f625d5b62722f5d64616d69746820686173206a75737420637265617465642061204e657720737570706f7274207469636b65742e48616e646c65206974206e6f77215b62722f5d0d0a43617465676f72793a205b625d646464646464646464646464645b2f625d5b62722f5d50726f626c656d204465736372697074696f6e3a5b625d6464646464646464646464646464645b2f625d5b62722f5d546f2068616e646c6520697420676f20746f2043726561746520537570706f7274205469636b6574204f7074696f6e2d3e416c6c20537570706f7274205469636b6574735b62722f5d5b736d616c6c5d502e532e205468697320697320616e206175746f6d6174656420504d20666f7220616c6c207374616666735b2f736d616c6c5d, '', 3, 59, '1', 1411238590, '0', '0', 0),
(59, 0x5b625d4e4f54494649434154494f4e3a5b2f625d5b62722f5d64616d69746820686173206a75737420637265617465642061204e657720737570706f7274207469636b65742e48616e646c65206974206e6f77215b62722f5d0d0a43617465676f72793a205b625d646464646464646464646464645b2f625d5b62722f5d50726f626c656d204465736372697074696f6e3a5b625d6464646464646464646464646464645b2f625d5b62722f5d546f2068616e646c6520697420676f20746f2043726561746520537570706f7274205469636b6574204f7074696f6e2d3e416c6c20537570706f7274205469636b6574735b62722f5d5b736d616c6c5d502e532e205468697320697320616e206175746f6d6174656420504d20666f7220616c6c207374616666735b2f736d616c6c5d, '', 3, 77, '0', 1411238590, '0', '0', 0),
(60, 0x2e68692e202f726561646572206772656574696e67732066726f6d20616c6c202073746166662c2077652061726520686170707920746f206861766520796f7520686572652c2077656c636f6d652e20746f206f7572206269672068617070792066616d696c79212020706c7a207265616420202f66617120616e64204578706c6f7265206f7468657220666561747572732e20454e4a4f59205761706c6976652120576520646f206f7572206265737420666f7220552121206d757369632e20, '', 1, 81, '1', 1411291979, '0', '0', 0),
(61, 0x5b757365723d37385d2e41727261792e5b2f757365725d206973204c696b656420552073686f75745b62722f5d2065746572746574666467666467646667646667646667646667646764676467, '', 1, 78, '0', 1411299803, '0', '0', 0),
(62, 0x5b755d5b757365723d37385d64616d6974685b2f757365725d206973204c696b656420552073686f75745b2f755d5b62722f5d20726774657465727465727465747965727465727465727465727465743372746572746574, '', 1, 78, '0', 1411299920, '0', '0', 0),
(63, 0x5b757365723d37385d64616d6974685b2f757365725d206973204c696b656420552073686f75745b62722f5d2035333574743435363436363534363534363435363435363534363435363534365b62722f5d, '', 1, 78, '0', 1411300062, '0', '0', 0),
(64, 0x5b757365723d37385d64616d6974685b2f757365725d206973204c696b656420552073686f75745b62722f5d205b62722f5d, '', 1, 0, '1', 1411303622, '0', '0', 0),
(65, 0x5b757365723d37385d64616d6974685b2f757365725d206973204c696b656420552073686f75745b62722f5d2035757579727572797572797572755b62722f5d, '', 1, 78, '0', 1411303671, '0', '0', 0),
(66, 0x2e6368656572732e20596f7520617265204e6f775b625d4c6966652054696d655b2f625d5072656d69756d20557365722e416c6c2068696464656e206974656d732e5072656d69756d20546f6f6c20417265204164646564202e656e6a6f792e, '', 1, 77, '0', 1411309126, '0', '0', 0),
(67, 0x2e6368656572732e20596f7520617265204e6f77205b625d4c6966652054696d655b2f625d205072656d69756d20557365722e416c6c2068696464656e206974656d732e5072656d69756d20546f6f6c204172652041646465642e456e6a6f7920546865205072656d69756d20696e205372694d6f62696c65, '', 1, 77, '0', 1411309272, '0', '0', 0),
(68, 0x2e6368656572732e20596f7520617265204e6f77205b625d31206d6f6e74685b2f625d205072656d69756d20557365722e416c6c2068696464656e206974656d732e5072656d69756d20546f6f6c204172652041646465642e456e6a6f7920546865205072656d69756d20696e205372694d6f62696c65, '', 1, 77, '0', 1411310363, '0', '0', 0),
(69, 0x2e6368656572732e20596f7520617265204e6f77205b625d33206d6f6e74685b2f625d205072656d69756d20557365722e416c6c2068696464656e206974656d732e5072656d69756d20546f6f6c204172652041646465642e456e6a6f7920546865205072656d69756d20696e205372694d6f62696c65, '', 1, 77, '0', 1411310382, '0', '0', 0),
(70, 0x2e6368656572732e20596f7520617265204e6f77205b625d36206d6f6e74685b2f625d205072656d69756d20557365722e416c6c2068696464656e206974656d732e5072656d69756d20546f6f6c204172652041646465642e456e6a6f7920546865205072656d69756d20696e205372694d6f62696c65, '', 1, 77, '0', 1411310396, '0', '0', 0),
(71, 0x2e6368656572732e20596f7520617265204e6f77205b625d3120796561725b2f625d205072656d69756d20557365722e416c6c2068696464656e206974656d732e5072656d69756d20546f6f6c204172652041646465642e456e6a6f7920546865205072656d69756d20696e205372694d6f62696c65, '', 1, 77, '0', 1411310484, '0', '0', 0),
(72, 0x2e6368656572732e20596f7520617265204e6f77205b625d3120796561725b2f625d205072656d69756d20557365722e416c6c2068696464656e206974656d732e5072656d69756d20546f6f6c204172652041646465642e456e6a6f7920546865205072656d69756d20696e205372694d6f62696c65, '', 1, 77, '0', 1411310502, '0', '0', 0),
(73, 0x2e6368656572732e20596f7520617265204e6f77205b625d3120796561725b2f625d205072656d69756d20557365722e416c6c2068696464656e206974656d732e5072656d69756d20546f6f6c204172652041646465642e456e6a6f7920546865205072656d69756d20696e205372694d6f62696c65, '', 1, 77, '0', 1411310784, '0', '0', 0),
(74, 0x2e6368656572732e20596f7520617265204e6f77205b625d3120796561725b2f625d205072656d69756d20557365722e416c6c2068696464656e206974656d732e5072656d69756d20546f6f6c204172652041646465642e456e6a6f7920546865205072656d69756d20696e205372694d6f62696c65, '', 1, 77, '0', 1411311724, '0', '0', 0),
(75, 0x596f7572205072656d69756d205573657220506f737420486173204265656e2052656d6f766564204259205374616666, '', 1, 77, '0', 1411311728, '0', '0', 0),
(76, 0x596f7572205072656d69756d205573657220506f737420486173204265656e2052656d6f766564204259205374616666, '', 1, 77, '0', 1411311809, '0', '0', 0),
(77, 0x2e6368656572732e20596f7520617265204e6f77205b625d36206d6f6e74685b2f625d205072656d69756d20557365722e416c6c2068696464656e206974656d732e5072656d69756d20546f6f6c204172652041646465642e456e6a6f7920546865205072656d69756d20696e205372694d6f62696c65, '', 1, 77, '0', 1411311824, '0', '0', 0),
(78, 0xe0b686e0b6afe0b6bbe0b6ba20e0b783e0b794e0b6b1e0b78ae0b6afe0b6bb20e0b780e0b6bbe0b6afe0b69ae0b792, '', 77, 1, '1', 1411316321, '0', '0', 0),
(79, 0x2e6368656572732e20596f7520617265204e6f77205b625d36206d6f6e74685b2f625d205072656d69756d20557365722e416c6c2068696464656e206974656d732e5072656d69756d20546f6f6c204172652041646465642e456e6a6f7920546865205072656d69756d20696e205372694d6f62696c65, '', 1, 77, '0', 1411316493, '0', '0', 0),
(80, 0x2e6368656572732e20596f7520617265204e6f77205b625d36206d6f6e74685b2f625d205072656d69756d20557365722e416c6c2068696464656e206974656d732e5072656d69756d20546f6f6c204172652041646465642e456e6a6f7920546865205072656d69756d20696e205372694d6f62696c65, '', 1, 77, '0', 1411316497, '0', '0', 0),
(81, 0x2e6368656572732e20596f7520617265204e6f77205b625d36206d6f6e74685b2f625d205072656d69756d20557365722e416c6c2068696464656e206974656d732e5072656d69756d20546f6f6c204172652041646465642e456e6a6f7920546865205072656d69756d20696e205372694d6f62696c65, '', 1, 77, '0', 1411316517, '0', '0', 0),
(82, 0x2e6368656572732e20596f7520617265204e6f77205b625d36206d6f6e74685b2f625d205072656d69756d20557365722e416c6c2068696464656e206974656d732e5072656d69756d20546f6f6c204172652041646465642e456e6a6f7920546865205072656d69756d20696e205372694d6f62696c65, '', 1, 77, '0', 1411316519, '0', '0', 0),
(83, 0x2e6368656572732e20596f7520617265204e6f77205b625d36206d6f6e74685b2f625d205072656d69756d20557365722e416c6c2068696464656e206974656d732e5072656d69756d20546f6f6c204172652041646465642e456e6a6f7920546865205072656d69756d20696e205372694d6f62696c65, '', 1, 77, '0', 1411316522, '0', '0', 0),
(84, 0x2e6368656572732e20596f7520617265204e6f77205b625d36206d6f6e74685b2f625d205072656d69756d20557365722e416c6c2068696464656e206974656d732e5072656d69756d20546f6f6c204172652041646465642e456e6a6f7920546865205072656d69756d20696e205372694d6f62696c65, '', 1, 77, '0', 1411316558, '0', '0', 0),
(85, 0x2e6368656572732e20596f7520617265204e6f77205b625d36206d6f6e74685b2f625d205072656d69756d20557365722e416c6c2068696464656e206974656d732e5072656d69756d20546f6f6c204172652041646465642e456e6a6f7920546865205072656d69756d20696e205372694d6f62696c65, '', 1, 77, '0', 1411316561, '0', '0', 0),
(86, 0x2e6368656572732e20596f7520617265204e6f77205b625d31206d6f6e74685b2f625d205072656d69756d20557365722e416c6c2068696464656e206974656d732e5072656d69756d20546f6f6c204172652041646465642e456e6a6f7920546865205072656d69756d20696e205372694d6f62696c65, '', 1, 77, '0', 1411316618, '0', '0', 0),
(87, 0x2e6368656572732e20596f7520617265204e6f77205b625d31206d6f6e74685b2f625d205072656d69756d20557365722e416c6c2068696464656e206974656d732e5072656d69756d20546f6f6c204172652041646465642e456e6a6f7920546865205072656d69756d20696e205372694d6f62696c65, '', 1, 77, '0', 1411316624, '0', '0', 0),
(88, 0x2e6368656572732e20596f7520617265204e6f77205b625d31206d6f6e74685b2f625d205072656d69756d20557365722e416c6c2068696464656e206974656d732e5072656d69756d20546f6f6c204172652041646465642e456e6a6f7920546865205072656d69756d20696e205372694d6f62696c65, '', 1, 77, '0', 1411316717, '0', '0', 0),
(89, 0x2e6368656572732e20596f7520617265204e6f77205b625d31206d6f6e74685b2f625d205072656d69756d20557365722e416c6c2068696464656e206974656d732e5072656d69756d20546f6f6c204172652041646465642e456e6a6f7920546865205072656d69756d20696e205372694d6f62696c65, '', 1, 77, '0', 1411316721, '0', '0', 0),
(90, 0x2e6368656572732e20596f7520617265204e6f77205b625d3120796561725b2f625d205072656d69756d20557365722e416c6c2068696464656e206974656d732e5072656d69756d20546f6f6c204172652041646465642e456e6a6f7920546865205072656d69756d20696e205372694d6f62696c65, '', 1, 77, '0', 1411316729, '0', '0', 0),
(91, 0x2e6368656572732e20596f7520617265204e6f77205b625d3120796561725b2f625d205072656d69756d20557365722e416c6c2068696464656e206974656d732e5072656d69756d20546f6f6c204172652041646465642e456e6a6f7920546865205072656d69756d20696e205372694d6f62696c65, '', 1, 77, '0', 1411316731, '0', '0', 0),
(92, 0x2e6368656572732e20596f7520617265204e6f77205b625d3120796561725b2f625d205072656d69756d20557365722e416c6c2068696464656e206974656d732e5072656d69756d20546f6f6c204172652041646465642e456e6a6f7920546865205072656d69756d20696e205372694d6f62696c65, '', 1, 77, '0', 1411316770, '0', '0', 0),
(93, 0x2e6368656572732e20596f7520617265204e6f77205b625d33206d6f6e74685b2f625d205072656d69756d20557365722e416c6c2068696464656e206974656d732e5072656d69756d20546f6f6c204172652041646465642e456e6a6f7920546865205072656d69756d20696e205372694d6f62696c65, '', 1, 77, '0', 1411316804, '0', '0', 0),
(94, 0x2e6368656572732e20596f7520617265204e6f77205b625d31206d6f6e74685b2f625d205072656d69756d20557365722e416c6c2068696464656e206974656d732e5072656d69756d20546f6f6c204172652041646465642e456e6a6f7920546865205072656d69756d20696e205372694d6f62696c65, '', 1, 77, '0', 1411318038, '0', '0', 0),
(95, 0x2e6368656572732e20596f7520617265204e6f77205b625d31206d6f6e74685b2f625d205072656d69756d20557365722e416c6c2068696464656e206974656d732e5072656d69756d20546f6f6c204172652041646465642e456e6a6f7920546865205072656d69756d20696e205372694d6f62696c65, '', 1, 77, '0', 1411318042, '0', '0', 0),
(96, 0x2e6368656572732e20596f7520617265204e6f77205b625d31206d6f6e74685b2f625d205072656d69756d20557365722e416c6c2068696464656e206974656d732e5072656d69756d20546f6f6c204172652041646465642e456e6a6f7920546865205072656d69756d20696e205372694d6f62696c65, '', 1, 77, '0', 1411318046, '0', '0', 0),
(97, 0x2e6368656572732e20596f7520617265204e6f77205b625d31206d6f6e74685b2f625d205072656d69756d20557365722e416c6c2068696464656e206974656d732e5072656d69756d20546f6f6c204172652041646465642e456e6a6f7920546865205072656d69756d20696e205372694d6f62696c65, '', 1, 77, '0', 1411318054, '0', '0', 0),
(98, 0x5372696d6f62696c65205465616d207769736820796f752061206461792066756c6c206f66206a6f7920616e642068617070696e65737320616e64206d616e792068617070792072657475726e735b62722f5d, '', 1, 77, '0', 1411319915, '0', '0', 0),
(99, 0x5372696d6f62696c65205465616d207769736820796f752061206461792066756c6c206f66206a6f7920616e642068617070696e65737320616e64206d616e792068617070792072657475726e735b62722f5d, '', 1, 77, '0', 1411319917, '0', '0', 0),
(100, 0x5372696d6f62696c65205465616d207769736820796f752061206461792066756c6c206f66206a6f7920616e642068617070696e65737320616e64206d616e792068617070792072657475726e735b62722f5d, '', 1, 77, '0', 1411319919, '0', '0', 0),
(101, 0x5372696d6f62696c65205465616d207769736820796f752061206461792066756c6c206f66206a6f7920616e642068617070696e65737320616e64206d616e792068617070792072657475726e735b62722f5d, '', 1, 77, '0', 1411319922, '0', '0', 0),
(102, 0x5372696d6f62696c65205465616d207769736820796f752061206461792066756c6c206f66206a6f7920616e642068617070696e65737320616e64206d616e792068617070792072657475726e735b62722f5d, '', 1, 77, '0', 1411319926, '0', '0', 0),
(103, 0x5372696d6f62696c65205465616d207769736820796f752061206461792066756c6c206f66206a6f7920616e642068617070696e65737320616e64206d616e792068617070792072657475726e735b62722f5d, '', 1, 77, '0', 1411323296, '0', '0', 0),
(104, 0x5372696d6f62696c65205465616d207769736820796f752061206461792066756c6c206f66206a6f7920616e642068617070696e65737320616e64206d616e792068617070792072657475726e735b62722f5d, '', 1, 77, '0', 1411323298, '0', '0', 0),
(105, 0x5372696d6f62696c65205465616d207769736820796f752061206461792066756c6c206f66206a6f7920616e642068617070696e65737320616e64206d616e792068617070792072657475726e735b62722f5d, '', 1, 18, '1', 1411325764, '0', '0', 0),
(106, 0x5b757365723d37375d434153485b2f757365725d206973204c696b656420552073686f75745b62722f5d206563686f2026616d703b616d703b71756f743b26616d703b616d703b71756f743b3b5b62722f5d, '', 1, 78, '0', 1411328576, '0', '0', 0),
(107, 0x5b757365723d37375d434153485b2f757365725d206973204c696b656420552073686f75745b62722f5d206775796674727479727972796574726572746572656572746565725b62722f5d, '', 1, 78, '0', 1411328605, '0', '0', 0),
(108, 0x5b625d48656c7020547269636b65743a5b2f625d5b62722f5d5b757365723d37375d434153482057617320437265617465642048656c7020547269636b65742e5b68656c705d2e706c7a2048616e646c6520497420536f6f6e2e, '', 1, 77, '0', 1411439985, '0', '0', 0),
(109, 0x5b625d48656c7020547269636b65743a5b2f625d5b62722f5d5b757365723d37375d434153485b2f757365725d2057617320437265617465642048656c7020547269636b65742e5b68656c705d2e706c7a2048616e646c6520497420536f6f6e2e, '', 1, 77, '0', 1411440072, '0', '0', 0),
(110, 0x5b625d48656c7020547269636b65743a5b2f625d5b62722f5d5b757365723d37375d434153485b2f757365725d2057617320437265617465642048656c7020547269636b65742e5b68656c705d2e706c7a2048616e646c6520497420536f6f6e2e, '', 1, 77, '0', 1411440953, '0', '0', 0),
(111, 0x5b625d48656c7020547269636b65743a5b2f625d5b62722f5d5b757365723d37375d434153485b2f757365725d2057617320437265617465642048656c7020547269636b65742e5b68656c705d2e706c7a2048616e646c6520497420536f6f6e2e, '', 1, 77, '0', 1411441611, '0', '0', 0),
(112, 0x5b625d48656c7020547269636b65743a5b2f625d5b62722f5d5b757365723d37375d434153485b2f757365725d2057617320437265617465642048656c7020547269636b65742e5b68656c705d2e706c7a2048616e646c6520497420536f6f6e2e, '', 1, 77, '0', 1411441637, '0', '0', 0),
(114, 0x7364666566776466776566, '', 77, 78, '0', 1411473475, '0', '0', 0),
(116, 0x6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a6a, '', 77, 77, '0', 1411543649, '0', '0', 0),
(117, 0x676767676767676767676767676767676767676767676767676767676767676767676767676767676767676767676767676767676767676767, 'pmimages/SM_PM_CASH.jpg', 77, 77, '0', 1411543668, '0', '0', 0),
(118, 0x2845766572792053756e6461792057652055706461746520496e7465726573747329, '', 77, 77, '0', 1411570234, '0', '0', 0),
(119, '', 'pmimages/SM_PM_damith_1.jpg', 78, 77, '0', 1411576656, '0', '0', 0),
(121, 0x65667373737364667366736673667366, 'upload/pmimages/8ball.jpg', 78, 0, '1', 1411577475, '0', '0', 0),
(122, 0x65667373737364667366736673667366, 'upload/pmimages/8ball_1.jpg', 78, 0, '1', 1411577538, '0', '0', 0),
(124, 0x65667373737364667366736673667366, 'upload/pmimages/8ball_3.jpg', 78, 77, '0', 1411577711, '0', '0', 0),
(125, '', '', 78, 77, '0', 1411577739, '0', '0', 0),
(126, 0x666f6c646572756e72656164, '', 78, 78, '0', 1411577781, '0', '0', 0),
(127, 0x67676767676767676767676767, 'upload/pmimages/8ball_4.jpg', 78, 78, '0', 1411577801, '0', '0', 0),
(128, 0x626262626262626262626262626262626262626262626262626262626262626262, '', 78, 78, '0', 1411582003, '0', '0', 0),
(129, 0x446f6e7420776f6e6120626520667269656e6473212a2a205b62722f5d5b62722f5d, '', 77, 78, '0', 1411659302, '0', '0', 0),
(130, 0x5572204661726d2057617320526f62204279204e69636b20537461726564205b625d435b2f625d20476f204661726d204e6f772121, '', 1, 77, '0', 1411661922, '0', '0', 0),
(131, 0x5572204661726d2057617320526f62204279204e69636b20537461726564205b625d435b2f625d20476f204661726d204e6f772121, '', 1, 77, '0', 1411661922, '0', '0', 0),
(132, 0x5372696d6f62696c65205465616d207769736820796f752061206461792066756c6c206f66206a6f7920616e642068617070696e65737320616e64206d616e792068617070792072657475726e735b62722f5d, '', 1, 23, '1', 1411683941, '0', '0', 0),
(133, 0x5372696d6f62696c65205465616d207769736820796f752061206461792066756c6c206f66206a6f7920616e642068617070696e65737320616e64206d616e792068617070792072657475726e735b62722f5d, '', 1, 65, '1', 1411683941, '0', '0', 0),
(134, 0x5572204661726d2057617320526f62204279204e69636b20537461726564205b625d435b2f625d20476f204661726d204e6f772121, '', 1, 77, '0', 1411687840, '0', '0', 0),
(135, 0x5372696d6f62696c65205465616d207769736820796f752061206461792066756c6c206f66206a6f7920616e642068617070696e65737320616e64206d616e792068617070792072657475726e735b62722f5d, '', 1, 34, '1', 1411756247, '0', '0', 0),
(136, 0x205b62722f5d5b62722f5d2a5b695d204175746f6d6174696320504d2046726f6d205b636c75623d325d206365727469666965642070617361776179205b2f636c75625d436c7562215b2f695d2a, '', 8, 8, '1', 1411792713, '0', '0', 0),
(137, 0x205b62722f5d5b62722f5d2a5b695d204175746f6d6174696320504d2046726f6d205b636c75623d325d206365727469666965642070617361776179205b2f636c75625d436c7562215b2f695d2a, '', 8, 12, '1', 1411792713, '0', '0', 0),
(138, 0x205b62722f5d5b62722f5d2a5b695d204175746f6d6174696320504d2046726f6d205b636c75623d325d206365727469666965642070617361776179205b2f636c75625d436c7562215b2f695d2a, '', 8, 11, '1', 1411792713, '0', '0', 0),
(139, 0x205b62722f5d5b62722f5d2a5b695d204175746f6d6174696320504d2046726f6d205b636c75623d325d206365727469666965642070617361776179205b2f636c75625d436c7562215b2f695d2a, '', 8, 17, '1', 1411792713, '0', '0', 0),
(140, 0x205b62722f5d5b62722f5d2a5b695d204175746f6d6174696320504d2046726f6d205b636c75623d325d206365727469666965642070617361776179205b2f636c75625d436c7562215b2f695d2a, '', 8, 13, '1', 1411792713, '0', '0', 0),
(141, 0x205b62722f5d5b62722f5d2a5b695d204175746f6d6174696320504d2046726f6d205b636c75623d325d206365727469666965642070617361776179205b2f636c75625d436c7562215b2f695d2a, '', 8, 10, '1', 1411792713, '0', '0', 0),
(142, 0x205b62722f5d5b62722f5d2a5b695d204175746f6d6174696320504d2046726f6d205b636c75623d325d206365727469666965642070617361776179205b2f636c75625d436c7562215b2f695d2a, '', 8, 14, '1', 1411792713, '0', '0', 0),
(143, 0x205b62722f5d5b62722f5d2a5b695d204175746f6d6174696320504d2046726f6d205b636c75623d325d206365727469666965642070617361776179205b2f636c75625d436c7562215b2f695d2a, '', 8, 16, '1', 1411792713, '0', '0', 0),
(144, 0x205b62722f5d5b62722f5d2a5b695d204175746f6d6174696320504d2046726f6d205b636c75623d325d206365727469666965642070617361776179205b2f636c75625d436c7562215b2f695d2a, '', 8, 18, '1', 1411792713, '0', '0', 0),
(145, 0x205b62722f5d5b62722f5d2a5b695d204175746f6d6174696320504d2046726f6d205b636c75623d325d206365727469666965642070617361776179205b2f636c75625d436c7562215b2f695d2a, '', 8, 15, '1', 1411792713, '0', '0', 0),
(146, 0x205b62722f5d5b62722f5d2a5b695d204175746f6d6174696320504d2046726f6d205b636c75623d325d206365727469666965642070617361776179205b2f636c75625d436c7562215b2f695d2a, '', 8, 27, '1', 1411792713, '0', '0', 0),
(147, 0x205b62722f5d5b62722f5d2a5b695d204175746f6d6174696320504d2046726f6d205b636c75623d325d206365727469666965642070617361776179205b2f636c75625d436c7562215b2f695d2a, '', 8, 41, '1', 1411792713, '0', '0', 0),
(148, 0x205b62722f5d5b62722f5d2a5b695d204175746f6d6174696320504d2046726f6d205b636c75623d325d206365727469666965642070617361776179205b2f636c75625d436c7562215b2f695d2a, '', 8, 44, '1', 1411792713, '0', '0', 0),
(149, 0x205b62722f5d5b62722f5d2a5b695d204175746f6d6174696320504d2046726f6d205b636c75623d325d206365727469666965642070617361776179205b2f636c75625d436c7562215b2f695d2a, '', 8, 45, '1', 1411792713, '0', '0', 0),
(150, 0x205b62722f5d5b62722f5d2a5b695d204175746f6d6174696320504d2046726f6d205b636c75623d325d206365727469666965642070617361776179205b2f636c75625d436c7562215b2f695d2a, '', 8, 2, '1', 1411792713, '0', '0', 0),
(151, 0x205b62722f5d5b62722f5d2a5b695d204175746f6d6174696320504d2046726f6d205b636c75623d325d206365727469666965642070617361776179205b2f636c75625d436c7562215b2f695d2a, '', 8, 43, '1', 1411792713, '0', '0', 0),
(152, 0x205b62722f5d5b62722f5d2a5b695d204175746f6d6174696320504d2046726f6d205b636c75623d325d206365727469666965642070617361776179205b2f636c75625d436c7562215b2f695d2a, '', 8, 49, '1', 1411792713, '0', '0', 0),
(153, 0x205b62722f5d5b62722f5d2a5b695d204175746f6d6174696320504d2046726f6d205b636c75623d325d206365727469666965642070617361776179205b2f636c75625d436c7562215b2f695d2a, '', 8, 78, '0', 1411792713, '0', '0', 0),
(154, 0x66697273746d6f76652e2064616d69746820776f756c64206c696b6520746f20546f2061736b20466f7220796f75722068616e6420696e206d617272696167652c20746f0d0a616363657074206f7220726566757365207669736974207468652063686170656c206c696e6b20696e207468652073697465206578747261732070616765, '', 78, 77, '0', 1411795181, '0', '0', 0),
(155, 0x536f7272792c204341534820686173207265667573656420796f75722070726f706f73616c2e207765206172650d0a736f72727920746f206865617220746869732c20627574206665656c206672656520746f2074727920616761696e2061742061206c617465722064617465, '', 77, 78, '0', 1411795381, '0', '0', 0),
(156, 0x72657272205b62722f5d5b62722f5d2a5b695d204175746f6d6174696320504d2046726f6d205b636c75623d375d20e0b6b8e0b69ce0b79a20e0b6a2e0b793e0b780e0b792e0b6ade0b6ba205b2f636c75625d436c7562215b2f695d2a, '', 77, 77, '0', 1411797483, '0', '0', 0),
(157, 0x72657272205b62722f5d5b62722f5d2a5b695d204175746f6d6174696320504d2046726f6d205b636c75623d375d20e0b6b8e0b69ce0b79a20e0b6a2e0b793e0b780e0b792e0b6ade0b6ba205b2f636c75625d436c7562215b2f695d2a, '', 77, 77, '0', 1411797523, '0', '0', 0),
(158, 0x492077616e6e61206a6f696e20796f7572205b636c75623d325d6365727469666965642070617361776179205b2f636c75625d20636c75625b62722f5d5b62722f5d5b736d616c6c5d287468697320697320616e206175746f20706d295b2f736d616c6c5d, '', 78, 8, '1', 1411799400, '0', '0', 0),
(159, 0x636f6e67726174756c6174696f6e73205b757365723d37375d434153485b2f757365725d206861732073656e7420796f75206869732f686572206c6f766520506f696e74205b62722f5d5b736d616c6c5d5b695d702e733a207468697320697320616e206175746f6d6174656420706d5b2f695d5b2f736d616c6c5d, '', 1, 78, '0', 1411809599, '0', '0', 0),
(160, 0x777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777, '', 77, 77, '0', 1411811593, '0', '0', 0),
(161, 0x777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777, '', 77, 77, '0', 1411811691, '0', '0', 0),
(162, 0x777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777, '', 77, 77, '0', 1411811693, '0', '0', 0),
(163, 0x777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777, '', 77, 77, '0', 1411811696, '0', '0', 0),
(164, 0x596f7572206172652042757965642053657074656d62657220534d204d6167617a696e652e2e5572205265616420546865204520626f6f6b204e6f77212121, '', 1, 77, '0', 1411823456, '0', '0', 0),
(165, 0x5b757365723d37375d434153485b2f757365725d206973204c696b656420552073686f75745b62722f5d205945545945545945545952595959595959595959595959595959595959595959595959595b62722f5d, '', 1, 77, '0', 1411828540, '0', '0', 0),
(166, 0x5b757365723d37375d434153485b2f757365725d206973204c696b656420552073686f75745b62722f5d20686868686868686868686868686868686868686868686868686868686868686868686868686868686868686868686868686868686868685b62722f5d, '', 1, 78, '0', 1411828550, '0', '0', 0),
(167, 0x5b757365723d37375d434153485b2f757365725d206973204c696b656420552073686f75745b62722f5d2073787378787878787878787878787878787878787878787878787878787878787878787878787878787878787878787878787878787878785b62722f5d, '', 1, 78, '0', 1411828599, '0', '0', 0),
(168, 0x5b757365723d37375d434153485b2f757365725d206973204c696b656420552073686f75745b62722f5d2073787378787878787878787878787878787878787878787878787878787878787878787878787878787878787878787878787878787878785b62722f5d, '', 1, 78, '0', 1411828613, '0', '0', 0),
(169, 0x5572204661726d2057617320526f62204279204e69636b20537461726564205b625d435b2f625d20476f204661726d204e6f772121, '', 1, 77, '0', 1411831838, '0', '0', 0),
(170, 0x5572204661726d2057617320526f62204279204e69636b20537461726564205b625d435b2f625d20476f204661726d204e6f772121, '', 1, 77, '0', 1411831948, '0', '0', 0),
(171, 0x5572204661726d2057617320526f62204279204e69636b20537461726564205b625d435b2f625d20476f204661726d204e6f772121, '', 1, 77, '0', 1411832020, '0', '0', 0),
(172, 0x636f6e67726174756c6174696f6e73205b757365723d37375d434153485b2f757365725d206861732073656e7420796f75206869732f686572206c6f766520506f696e74205b62722f5d5b736d616c6c5d5b695d702e733a207468697320697320616e206175746f6d6174656420706d5b2f695d5b2f736d616c6c5d, '', 1, 81, '1', 1411881271, '0', '0', 0),
(173, 0x636f6e67726174756c6174696f6e73205b757365723d37375d434153485b2f757365725d206861732073656e7420796f75206869732f686572206c6f766520506f696e74205b62722f5d5b736d616c6c5d5b695d702e733a207468697320697320616e206175746f6d6174656420706d5b2f695d5b2f736d616c6c5d, '', 1, 12, '1', 1411889370, '0', '0', 0),
(174, 0x596f757220427564647920526571756573742048617665206265656e2041636365707465642a2a205b62722f5d5b62722f5d, '', 78, 77, '0', 1411890445, '0', '0', 0),
(175, 0x446f6e7420776f6e6120626520667269656e6473212a2a205b62722f5d5b62722f5d, '', 78, 77, '0', 1411890795, '0', '0', 0),
(176, 0x2e6368656572732e20596f7520617265204e6f77205b625d4c6966652054696d655b2f625d205072656d69756d20557365722e416c6c2068696464656e206974656d732e5072656d69756d20546f6f6c204172652041646465642e456e6a6f7920546865205072656d69756d20696e205372694d6f62696c65, '', 1, 77, '0', 1411908661, '0', '0', 0),
(177, 0x596f757220427564647920526571756573742048617665206265656e2041636365707465642a2a205b62722f5d5b62722f5d, '', 77, 78, '0', 1411908675, '0', '0', 0),
(178, 0x5b757365723d37375d434153485b2f757365725d206973204c696b656420552073686f75745b62722f5d20726766666666666666666666666666666666666666666666666666666666666666666666666666666666666666666666666666666666666666666666665b62722f5d, '', 1, 77, '0', 1411983509, '0', '0', 0),
(179, 0x596f757220617265204275796564205b625d53657074656d6265725b2f625d20534d204d6167617a696e652e2e202f736d6d616720212121, '', 1, 78, '0', 1411990101, '0', '0', 0),
(182, 0x78787878787878787878787878787878787878, '', 78, 1, '1', 1411990163, '0', '0', 0),
(183, 0x78787878787878787878787878787878787878, '', 78, 1, '1', 1411990343, '0', '0', 0),
(184, 0x78787878787878787878787878787878787878, '', 78, 1, '1', 1411990346, '0', '0', 0),
(185, 0x64616d6974682053686172656420202043726564697473205769746820752e2e4e6f7720552068762032383333202063726564697473215b62722f5d5b695d20702e732e206e6f74653a205468697320697320616e206175746f6d6174696320706d2066726f6d205372694d6f62696c6520736572766963652063656e7472655b2f695d, '', 78, 78, '0', 1412072108, '0', '0', 0),
(186, 0x64616d6974682053686172656420202043726564697473205769746820752e2e4e6f7720552068762032383333202063726564697473215b62722f5d5b695d20702e732e206e6f74653a205468697320697320616e206175746f6d6174696320706d2066726f6d205372694d6f62696c6520736572766963652063656e7472655b2f695d, '', 78, 78, '0', 1412072111, '0', '0', 0),
(187, 0x64616d6974682053686172656420202043726564697473205769746820752e2e4e6f7720552068762032383333202063726564697473215b62722f5d5b695d20702e732e206e6f74653a205468697320697320616e206175746f6d6174696320706d2066726f6d205372694d6f62696c6520736572766963652063656e7472655b2f695d, '', 78, 78, '0', 1412072115, '0', '0', 0),
(188, '', '', 78, 78, '0', 1412072132, '0', '0', 0),
(189, '', '', 78, 78, '0', 1412072370, '0', '0', 0),
(190, 0x7272727272727272727272727272727272727272727272727272, 'upload/pmimages/8fa95495-4ee5-4ac3-83ba-39fbdc88f535.jpg', 78, 78, '0', 1412072394, '0', '0', 0),
(191, 0x61737373737373737373737373737373737373737373737373737373, '', 78, 78, '0', 1412077301, '0', '0', 0),
(192, 0x4747474747474747474747474747474747474747474747, '', 78, 78, '0', 1412078775, '0', '0', 0),
(193, 0x66697273746d6f76652e2064616d69746820776f756c64206c696b6520746f20546f2061736b20466f7220796f75722068616e6420696e206d617272696167652c20746f0d0a616363657074206f7220726566757365207669736974207468652063686170656c206c696e6b20696e207468652073697465206578747261732070616765, '', 78, 77, '0', 1412095615, '0', '0', 0),
(194, 0x636865657273322e2020436f6e67726174756c6174696f6e73212e20596f7572204d6172726961676520546f20434153482049730d0a436f6d706c6574652e20576520486f706520596f752041726520426f746820486170707920696e20796f7572206e65772052656c6174696f6e73686970, '', 77, 78, '0', 1412095687, '0', '0', 0),
(195, 0x636865657273322e2020436f6e67726174756c6174696f6e73212e20596f7572204d6172726961676520546f20434153482049730d0a436f6d706c6574652e20576520486f706520596f752041726520426f746820486170707920696e20796f7572206e65772052656c6174696f6e73686970, '', 77, 78, '0', 1412095711, '0', '0', 0),
(196, 0x5b757365723d37375d434153485b2f757365725d206973204c696b656420552073686f75745b62722f5d20696365637265616d312e5b62722f5d, '', 1, 78, '1', 1412353534, '0', '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_profilemood`
--

CREATE TABLE IF NOT EXISTS `ibwf_profilemood` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `pmoodlink` varchar(150) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `pmoodlink` (`pmoodlink`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=235 ;

--
-- Dumping data for table `ibwf_profilemood`
--

INSERT INTO `ibwf_profilemood` (`id`, `pmoodlink`) VALUES
(1, '../profilemoods/0carefree.gif'),
(2, '../profilemoods/0euphoric.gif'),
(3, '../profilemoods/0excited0.gif'),
(4, '../profilemoods/0flirty.gif'),
(5, '../profilemoods/0happy.gif'),
(6, '../profilemoods/0geeky.gif'),
(7, '../profilemoods/0honest.gif'),
(8, '../profilemoods/0musical.gif'),
(9, '../profilemoods/0pleased.gif'),
(10, '../profilemoods/0relaxed.gif'),
(11, '../profilemoods/0romantic.gif'),
(12, '../profilemoods/0silly.gif'),
(13, '../profilemoods/0smart.gif'),
(14, '../profilemoods/0wish.gif'),
(15, '../profilemoods/1angry.gif'),
(16, '../profilemoods/1bitter.gif'),
(17, '../profilemoods/1devilish.gif'),
(18, '../profilemoods/1disturbe.gif'),
(19, '../profilemoods/1frustrat.gif'),
(20, '../profilemoods/1lifeless.gif'),
(21, '../profilemoods/1screwed.gif'),
(22, '../profilemoods/1sick.gif'),
(23, '../profilemoods/1stressed.gif'),
(24, '../profilemoods/2annoyed.gif'),
(25, '../profilemoods/2bored.gif'),
(26, '../profilemoods/2cheeky.gif'),
(27, '../profilemoods/2confused.gif'),
(28, '../profilemoods/2crazy.gif'),
(29, '../profilemoods/2moody.gif'),
(30, '../profilemoods/2nervous.gif'),
(31, '../profilemoods/2plain.gif'),
(32, '../profilemoods/2scheming.gif'),
(33, '../profilemoods/2shocked.gif'),
(34, '../profilemoods/2sleepy.gif'),
(35, '../profilemoods/2speechle.gif'),
(36, '../profilemoods/2stuborn.gif'),
(37, '../profilemoods/2tired.gif'),
(38, '../profilemoods/2worried.gif'),
(39, '../profilemoods/3disappoi.gif'),
(40, '../profilemoods/3down.gif'),
(41, '../profilemoods/3embarras.gif'),
(42, '../profilemoods/3hopeeless.gif'),
(43, '../profilemoods/3lonely.gif'),
(44, '../profilemoods/3paranoid.gif'),
(45, '../profilemoods/3pensive.gif'),
(46, '../profilemoods/3sad.gif'),
(47, '../profilemoods/3sensitiv.gif'),
(48, '../profilemoods/3shy.gif'),
(49, '../profilemoods/3sorry.gif'),
(50, '../profilemoods/3tearful.gif'),
(51, '../profilemoods/aggressive.gif'),
(52, '../profilemoods/argumentative.gif'),
(53, '../profilemoods/available.gif'),
(54, '../profilemoods/away.gif'),
(55, '../profilemoods/bored.gif'),
(56, '../profilemoods/bovvered.gif'),
(57, '../profilemoods/busy.gif'),
(58, '../profilemoods/cocky.gif'),
(59, '../profilemoods/curious.gif'),
(60, '../profilemoods/disappointed.gif'),
(61, '../profilemoods/drunk.gif'),
(62, '../profilemoods/evil.gif'),
(63, '../profilemoods/fragile.gif'),
(64, '../profilemoods/happy.gif'),
(65, '../profilemoods/hello.gif'),
(66, '../profilemoods/horny.gif'),
(67, '../profilemoods/hungry.gif'),
(68, '../profilemoods/hyper.gif'),
(69, '../profilemoods/ill.gif'),
(70, '../profilemoods/imgood.gif'),
(71, '../profilemoods/immature.gif'),
(72, '../profilemoods/innocent.gif'),
(73, '../profilemoods/justchillin.gif'),
(74, '../profilemoods/lazyday.gif'),
(75, '../profilemoods/lovedup.gif'),
(76, '../profilemoods/moody.gif'),
(77, '../profilemoods/pissedoff.gif'),
(78, '../profilemoods/relaxing.gif'),
(79, '../profilemoods/sad.gif'),
(80, '../profilemoods/talkative.gif'),
(81, '../profilemoods/tired2.gif'),
(83, '../profilemoods/upset.gif');

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_quiz`
--

CREATE TABLE IF NOT EXISTS `ibwf_quiz` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(200) NOT NULL DEFAULT '',
  `answer` varchar(30) NOT NULL DEFAULT '',
  `difficulty` varchar(12) NOT NULL DEFAULT '',
  `number` int(11) NOT NULL DEFAULT '0',
  `answer1` varchar(50) NOT NULL DEFAULT '',
  `answer2` varchar(50) NOT NULL DEFAULT '',
  `answer3` varchar(50) NOT NULL DEFAULT '',
  `answer4` varchar(50) NOT NULL DEFAULT '',
  `switch` char(3) NOT NULL DEFAULT 'on',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `ibwf_quiz`
--

INSERT INTO `ibwf_quiz` (`id`, `question`, `answer`, `difficulty`, `number`, `answer1`, `answer2`, `answer3`, `answer4`, `switch`) VALUES
(1, 'Who preceded Margaret Thatcher as Prime Minister of Great Britain*wank*', 'james callaghan', 'easy', 1, ' shaun texas', 'john newton', 'james callaghan', 'greg peterson', 'on'),
(2, 'Who was the second man to step foot on the surface of the moon?', 'buzz aldrin', 'easy', 2, 'no man', 'buzz aldrin', 'james newman', 'paul newton', 'on'),
(3, 'Where were the 1970 football World Cup finals held*wank*', 'mexico', 'easy', 3, 'russia', 'mexico', 'spain', 'georgia', 'on'),
(4, 'In books by JRR Tolkien, what kind of creatures are Bilbo and Frodo Baggins*wank*', 'hobbits', 'easy', 4, 'trees', 'kings', 'hobbits', 'elfs', 'on'),
(5, 'Which Italian city is home of the car manufacturer Fiat?*wank*', 'turin', 'easy', 5, 'rome', 'grease', 'turin', 'italy', 'on'),
(6, 'What do the French call the English Channel*wank*', 'le manche', 'easy', 6, 'le moon', 'le manche', 'le river', 'le lake', 'on'),
(7, 'In which year of the 1940''s did the D-Day landings take place on the coast of Normandy*wank*', '1944', 'easy', 7, '1950', '1949', '1945', '1944', 'on'),
(8, 'Who starred in the films Some Like It Hot Bus Stop The Seven Year Itch*wank*', 'marilyn monroe', 'easy', 8, 'betty moore', 'patrica newman', 'marilyn monroe', 'sue white', 'on'),
(9, 'What is the largest mammal on Earth*wank*', 'blue whale', 'easy', 9, 'white shark', 'man eating whale', 'blue whale', 'red whale', 'on'),
(10, 'What is North Americas highest mountain?*wank*', 'mount mckinley', 'easy', 10, 'mount hilton', 'mount america', 'mount mckinley', 'mount nothing', 'on'),
(11, 'What is the chemical symbol for tin?*wank*', 'sn', 'med', 1, 'ca', 'pn', 'sn', 'vp', 'on'),
(12, 'What are Corvettes, Sloops and Brigantines*wank*', 'sailing ships', 'med', 2, 'ships', 'raceing ships', 'sailing ships', 'small ships', 'on'),
(13, 'Until the introduction of the Euro, what is the unit of currency in Austria*wank*', 'schilling', 'med', 3, 'penny', 'dollar', 'cents', 'schilling', 'on'),
(14, 'Which African country s capital city is Luanda', 'angola', 'med', 4, 'angola', 'pangoa', 'africa', 'zambia', 'on'),
(15, 'what is the Meaning before noon what does the abbreviation am stand for *wank*', 'ante meridiem', 'med', 5, 'ante sun rize', 'ante meridiem', 'ante morning', 'ante night', 'on'),
(16, 'hat is the fifth book book of the Old Testament?', 'deuteronomy', 'med', 6, 'mark', 'luke', 'matthew', 'deuteronomy', 'on'),
(17, 'Other than the Sun what is the nearest star to the Earth*wank*', 'proxima centauri', 'med', 7, 'sun centauri', 'Proxima sun', 'proxima centauri', 'centauri sun', 'on'),
(18, 'Which band topped the UK album charts in 1991 with their debut LP Nevermind', 'nirvana', 'med', 8, 'pearl jam', 'nirvana', 'ozzy', 'acdc', 'on'),
(19, 'In which city was the first series of Auf Wiedersehen Pet primarily set', 'dusseldorf', 'med', 9, 'the pet primarily', 'dusseldorf', 'the auf', 'pet house', 'on'),
(20, 'What precious gemstone is associated with the 45th wedding anniversary*wank*', 'sapphire', 'med', 10, 'ruby', 'pink ruby', 'sapphire', 'topaz', 'on'),
(21, ' What is the square root of 121*wank*', '11', 'hard', 1, '54', '17', '11', '23', 'on'),
(22, 'How many dimes are in a US dollar?', '10', 'hard', 2, '30', '24', '15', '10', 'on'),
(23, 'What is the chemical symbol for Gold*wank*', 'au', 'hard', 3, 'pn', 'ga', 'au', 'cn', 'on'),
(24, 'Which television character has the car registration plate FAB1*wank*', 'lady penelope', 'hard', 4, 'fed', 'smufs', 'lady penelope', 'tom and jerry', 'on'),
(25, 'Who composed the ballets The Nutcracker and Swan Lake *wank*', 'peter tchaikovsky', 'hard', 5, 'rob tilton', 'james corbet', 'peter tchaikovsky', 'tom hanks', 'on'),
(26, 'If you suffered from arachnophobia what would you have an irrational fear of', 'spiders', 'hard', 6, 'brids', 'dogs', 'spiders', 'ants', 'on'),
(27, 'Which company produces the computer operating system Windows', 'microsoft', 'hard', 7, 'windows xp', 'vesta', 'windows nt', 'microsoft', 'on'),
(28, 'What is the deepest lake in the world, with depths over 1,600 metres', 'lake baykal', 'hard', 8, 'lake baykal', 'lake tinaroo', 'lake paroo', 'the glass lake', 'on'),
(29, 'What city does Sugar Loaf mountain overlook?', 'rio de janeiro', 'hard', 9, 'vegas', 'reno', 'rio de janeiro', 'green land', 'on'),
(30, 'What were the names of the 3 ships Christopher Columbus led in his discovery of da Americas in 1492', 'santa maria nina', 'hard', 10, 'santa maria nina', 'maria pinta nina', 'pinta santa nove', 'nina pinta santa', 'on');

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_quizusers`
--

CREATE TABLE IF NOT EXISTS `ibwf_quizusers` (
  `uid` int(100) NOT NULL DEFAULT '0',
  `easy_question` char(2) NOT NULL DEFAULT '0',
  `easy_next` char(2) NOT NULL DEFAULT '0',
  `med_question` char(2) NOT NULL DEFAULT '0',
  `med_next` char(2) NOT NULL DEFAULT '0',
  `hard_question` char(2) NOT NULL DEFAULT '0',
  `hard_next` char(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ibwf_quizusers`
--

INSERT INTO `ibwf_quizusers` (`uid`, `easy_question`, `easy_next`, `med_question`, `med_next`, `hard_question`, `hard_next`) VALUES
(1, '', '', '', '', '', ''),
(77, '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_readart`
--

CREATE TABLE IF NOT EXISTS `ibwf_readart` (
  `cid` int(100) NOT NULL DEFAULT '0',
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(35) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `crdate` int(100) NOT NULL DEFAULT '0',
  `authorid` int(100) NOT NULL DEFAULT '0',
  `artid` int(100) NOT NULL DEFAULT '0',
  `text` varchar(450) CHARACTER SET latin2 NOT NULL,
  `vws` int(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `ibwf_readart`
--

INSERT INTO `ibwf_readart` (`cid`, `id`, `name`, `crdate`, `authorid`, `artid`, `text`, `vws`) VALUES
(9, 15, 'GALIT SILA!!', 1250818700, 2, 0, 'so galit pala cla atleast alam ko na! Ok lang d naman ako galit. Kung sakaling may gawing masama d2 ang kalaban nyo bababa ako ng pwesto  at ako mananagot kaya s mga galit s akin ok lang.', 16),
(4, 23, 'magazine', 1409755160, 77, 0, 'its simple and online..read magazine in srimobile', 0),
(4, 24, 'ZZZZZZZZ', 1411829052, 77, 0, 'ETERTYERTTRTRTRT', 0),
(5, 25, '4444444444', 1411829217, 77, 0, 'Y4Y46YYYYYYYYYYYYYYYYY', 0),
(9, 18, 'BDAY N0W N0W NA NI SHAMIE', 1250895462, 8, 0, '.ura. hapy bday', 19),
(9, 20, 'Matthew 11:28-29', 1250942444, 2, 0, 'come to me, all u who r weary and burdened. N i will give u rest. Take my yoke upon u n learn fm me, for I am gentle n humble in heart. N u will find rest 4 ur SOULS.', 21);

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_red`
--

CREATE TABLE IF NOT EXISTS `ibwf_red` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `who` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `ibwf_red`
--

INSERT INTO `ibwf_red` (`id`, `uid`, `who`, `time`) VALUES
(3, 77, 78, 1411890230),
(4, 78, 77, 1411986988);

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_ricon`
--

CREATE TABLE IF NOT EXISTS `ibwf_ricon` (
  `url` varchar(50) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ibwf_ricon`
--

INSERT INTO `ibwf_ricon` (`url`) VALUES
('rep/1.gif'),
('rep/2.gif'),
('rep/5.gif'),
('rep/4.gif'),
('rep/3.gif'),
('rep/6.gif'),
('rep/7.gif'),
('rep/8.gif'),
('rep/9.gif'),
('rep/10.gif'),
('rep/11.gif'),
('rep/12.gif'),
('rep/13.gif'),
('rep/14.gif'),
('rep/15.gif'),
('rep/16.gif'),
('rep/17.gif'),
('rep/18.gif'),
('rep/19.gif'),
('rep/20.gif'),
('rep/21.gif'),
('rep/22.gif'),
('rep/23.gif'),
('rep/24.gif'),
('rep/25.gif'),
('rep/26.gif'),
('rep/27.gif'),
('rep/28.gif'),
('rep/29.gif'),
('rep/30.gif');

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_rooms`
--

CREATE TABLE IF NOT EXISTS `ibwf_rooms` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL DEFAULT '',
  `pass` varchar(100) NOT NULL DEFAULT '',
  `static` char(1) NOT NULL DEFAULT '',
  `mage` int(10) NOT NULL DEFAULT '0',
  `chposts` int(100) NOT NULL DEFAULT '0',
  `perms` int(10) NOT NULL DEFAULT '0',
  `censord` char(1) NOT NULL DEFAULT '1',
  `freaky` char(1) NOT NULL DEFAULT '0',
  `lastmsg` int(100) NOT NULL DEFAULT '0',
  `clubid` int(100) NOT NULL DEFAULT '0',
  `maxage` int(10) NOT NULL DEFAULT '0',
  `bet` int(50) NOT NULL,
  `on` int(5) NOT NULL DEFAULT '0',
  `time` int(50) NOT NULL,
  `poker` int(50) NOT NULL,
  `total` int(50) NOT NULL,
  `card` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2374 ;

--
-- Dumping data for table `ibwf_rooms`
--

INSERT INTO `ibwf_rooms` (`id`, `name`, `pass`, `static`, `mage`, `chposts`, `perms`, `censord`, `freaky`, `lastmsg`, `clubid`, `maxage`, `bet`, `on`, `time`, `poker`, `total`, `card`) VALUES
(2352, 'International', '', '1', 0, 0, 0, '0', '0', 1412362428, 0, 0, 0, 0, 0, 0, 0, 0),
(2353, 'Cricket chat', '', '1', 0, 0, 0, '0', '0', 1412361902, 0, 0, 0, 0, 0, 0, 0, 0),
(2354, 'Staffroom', '', '1', 0, 0, 1, '1', '0', 1412091018, 0, 0, 0, 0, 0, 0, 0, 0),
(2355, 'Reverse', '', '1', 0, 0, 0, '1', '1', 1411218941, 0, 0, 0, 0, 0, 0, 0, 0),
(2356, 'Tambayan', '', '1', 0, 0, 0, '1', '0', 1409900698, 0, 0, 0, 0, 0, 0, 0, 0),
(2357, 'Chatbot', '', '1', 0, 0, 0, '1', '2', 1409588138, 0, 0, 0, 0, 0, 0, 0, 0),
(2358, 'Datingroom', '', '1', 0, 0, 0, '1', '0', 1412513809, 0, 0, 0, 0, 0, 0, 0, 0),
(2359, 'retrive staff', '', '1', 0, 0, 0, '0', '0', 1250863828, 1, 0, 0, 0, 0, 0, 0, 0),
(2363, 'LIFE', '', '1', 0, 0, 0, '0', '0', 1250605458, 3, 0, 0, 0, 0, 0, 0, 0),
(2362, 'certified pasaway', '', '1', 0, 0, 0, '0', '0', 1250602768, 2, 0, 0, 0, 0, 0, 0, 0),
(2364, 'TWIRL drop it like it''s HOT', '', '1', 0, 0, 0, '0', '0', 1250619053, 4, 0, 0, 0, 0, 0, 0, 0),
(2367, 'Pinoy ATBP', '', '1', 0, 0, 0, '0', '0', 1250637449, 5, 0, 0, 0, 0, 0, 0, 0),
(2372, 'Fun Fun Fun', '', '1', 0, 0, 0, '0', '0', 1250910696, 6, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_rpg`
--

CREATE TABLE IF NOT EXISTS `ibwf_rpg` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `uid` int(100) NOT NULL DEFAULT '0',
  `rhealth` int(10) NOT NULL DEFAULT '0',
  `who` int(100) NOT NULL DEFAULT '0',
  `ahealth` int(10) NOT NULL DEFAULT '0',
  `bet` int(100) NOT NULL DEFAULT '0',
  `next` int(100) NOT NULL DEFAULT '0',
  `code` int(100) NOT NULL DEFAULT '0',
  `timesent` int(100) NOT NULL DEFAULT '0',
  `byuid` int(10) NOT NULL DEFAULT '0',
  `touid` int(10) NOT NULL DEFAULT '0',
  `actime` int(10) NOT NULL DEFAULT '0',
  `accept` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uid` (`uid`),
  UNIQUE KEY `who` (`who`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_rpgame`
--

CREATE TABLE IF NOT EXISTS `ibwf_rpgame` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `bet` int(10) NOT NULL DEFAULT '0',
  `uid` int(10) NOT NULL DEFAULT '0',
  `who` int(10) NOT NULL DEFAULT '0',
  `owner` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_rss`
--

CREATE TABLE IF NOT EXISTS `ibwf_rss` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL DEFAULT '',
  `link` varchar(150) NOT NULL DEFAULT '',
  `srcd` varchar(200) NOT NULL DEFAULT '',
  `dscr` varchar(100) NOT NULL DEFAULT '',
  `imgsrc` varchar(100) NOT NULL DEFAULT '',
  `pubdate` varchar(50) NOT NULL DEFAULT '',
  `fid` int(50) NOT NULL DEFAULT '0',
  `lupdate` int(100) NOT NULL DEFAULT '0',
  `pgurl` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_rssdata`
--

CREATE TABLE IF NOT EXISTS `ibwf_rssdata` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `rssid` int(50) NOT NULL DEFAULT '0',
  `title` varchar(100) NOT NULL DEFAULT '',
  `link` varchar(255) NOT NULL DEFAULT '',
  `imgsrc` varchar(255) NOT NULL DEFAULT '',
  `text` blob NOT NULL,
  `pubdate` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_search`
--

CREATE TABLE IF NOT EXISTS `ibwf_search` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `svar1` varchar(50) NOT NULL DEFAULT '',
  `svar2` varchar(50) NOT NULL DEFAULT '',
  `svar3` varchar(50) NOT NULL DEFAULT '',
  `svar4` varchar(50) NOT NULL DEFAULT '',
  `svar5` varchar(50) NOT NULL DEFAULT '',
  `stime` int(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_ses`
--

CREATE TABLE IF NOT EXISTS `ibwf_ses` (
  `id` varchar(100) NOT NULL DEFAULT '',
  `uid` varchar(30) NOT NULL DEFAULT '',
  `ip` varchar(50) NOT NULL,
  `ua` varchar(100) NOT NULL,
  `expiretm` int(100) NOT NULL DEFAULT '0',
  UNIQUE KEY `id` (`id`,`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ibwf_ses`
--

INSERT INTO `ibwf_ses` (`id`, `uid`, `ip`, `ua`, `expiretm`) VALUES
('7d33a766fe6e7cd7e24598f6ed88efce', '77', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:32.0) Gecko/20100101 Firefox/32.0', 1412516185);

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_settings`
--

CREATE TABLE IF NOT EXISTS `ibwf_settings` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL DEFAULT '',
  `value` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `ibwf_settings`
--

INSERT INTO `ibwf_settings` (`id`, `name`, `value`) VALUES
(1, 'sesexp', '30'),
(2, 'Fri 21 Aug 2009 - 15:35', '17'),
(3, '4ummsg', 'vvvvvvvvvv'),
(4, 'Counter', '1781'),
(5, 'pmaf', '10'),
(6, 'reg', '1'),
(7, 'fview', ''),
(8, 'lastbpm', '2014-10-05'),
(9, 'siteage', '0'),
(10, 'vldtn', '0'),
(11, 'magic', 'off'),
(12, 'magictime', '1412514709'),
(13, 'magicuid', '78'),
(14, 'today', '2014-10-05'),
(15, 'pruim', 'on'),
(16, 'logmsg', 'welcomeeeeeeeeeeee');

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_shop`
--

CREATE TABLE IF NOT EXISTS `ibwf_shop` (
  `itemid` int(100) NOT NULL AUTO_INCREMENT,
  `icon` varchar(50) NOT NULL DEFAULT 'images/shop/',
  `itemname` varchar(100) NOT NULL DEFAULT '',
  `itmeprice` int(100) NOT NULL DEFAULT '0',
  `itemshopid` int(100) NOT NULL DEFAULT '0',
  `avail` int(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`itemid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `ibwf_shop`
--

INSERT INTO `ibwf_shop` (`itemid`, `icon`, `itemname`, `itmeprice`, `itemshopid`, `avail`) VALUES
(2, 'images/shop/2067.png', 'Bunch of Flowers', 50, 2, 10),
(3, 'images/shop/2080.png', 'Teddy Bear', 110, 2, 6),
(4, 'images/shop/2078.png', 'Promise Ring', 400, 2, 8),
(5, 'images/shop/2072.png', 'Cool Beer', 15, 2, 42),
(6, 'images/shop/2074.png', 'Hot Coffee', 10, 2, 30),
(7, 'images/shop/2066.png', 'Red Bull', 35, 2, 2),
(8, 'images/shop/2064.png', 'Water Bed', 250, 2, 3),
(9, 'images/shop/2081.png', 'Red Rose', 60, 2, 19),
(10, 'images/shop/2069.png', 'Chocolate', 10, 2, 6),
(11, 'images/shop/2082.png', 'Ferrari Enzo', 900, 3, 3),
(12, 'images/shop/2083.png', 'Porsche Carrera', 2000, 3, 7),
(13, 'images/shop/2084.png', 'Bugatti', 800, 3, 17),
(14, 'images/shop/2085.png', 'Jaguar XJ220', 1300, 3, 0),
(15, 'images/shop/2088.png', 'Lamborghini Murcielago', 1550, 3, 0),
(16, 'images/shop/2087.png', 'McLaren Mercedes SLR', 6100, 3, 4),
(17, 'images/shop/2079.png', 'Blue Diamond', 900, 2, 6),
(18, 'images/shop/2068.png', 'Thank you Card', 30, 1, 0),
(19, 'images/shop/2077.png', 'Gold Watch', 200, 2, 12),
(20, 'images/shop/2065.png', 'T.N.T', 300, 4, 23),
(21, 'images/shop/2070.png', 'Frindship Card', 60, 1, 0),
(22, 'images/shop/2071.png', 'Rubber Snake', 55, 4, 2),
(23, 'images/shop/2076.png', 'Poison', 65, 4, 6),
(24, 'images/shop/2075.png', 'Vodka', 210, 4, 34),
(26, 'images/shop/2073.png', 'BirthDay Gift', 100, 2, 62),
(27, 'images/shop/', 'l', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_shop_inventory`
--

CREATE TABLE IF NOT EXISTS `ibwf_shop_inventory` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `uid` int(100) NOT NULL DEFAULT '0',
  `itemid` int(100) NOT NULL DEFAULT '0',
  `time` int(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `ibwf_shop_inventory`
--

INSERT INTO `ibwf_shop_inventory` (`id`, `uid`, `itemid`, `time`) VALUES
(2, 8, 6, 1250571047),
(3, 10, 2, 1250585437),
(4, 10, 5, 1250585511),
(5, 10, 6, 1250585563),
(6, 10, 7, 1250585591),
(7, 10, 9, 1250585618),
(8, 10, 10, 1250585644),
(9, 10, 18, 1250585675),
(10, 10, 8, 1250735601),
(11, 10, 19, 1250735684),
(12, 10, 24, 1250735891),
(13, 10, 22, 1250735952),
(15, 10, 2, 1250872182),
(16, 10, 17, 1250873299),
(18, 12, 26, 1250873439),
(19, 12, 26, 1250873460),
(21, 77, 2, 1409668700),
(22, 78, 2, 1411204050),
(23, 77, 21, 1411562482),
(24, 77, 21, 1411562549),
(25, 77, 21, 1411562554),
(26, 77, 21, 1411562558),
(27, 77, 21, 1411562563),
(28, 77, 21, 1411562568),
(32, 77, 24, 1411566750),
(33, 77, 24, 1411566750),
(34, 77, 24, 1411566760);

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_shouts`
--

CREATE TABLE IF NOT EXISTS `ibwf_shouts` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `shout` varchar(100) NOT NULL DEFAULT '',
  `shouter` int(100) NOT NULL DEFAULT '0',
  `image` varchar(100) NOT NULL,
  `shtime` int(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=767 ;

--
-- Dumping data for table `ibwf_shouts`
--

INSERT INTO `ibwf_shouts` (`id`, `shout`, `shouter`, `image`, `shtime`) VALUES
(766, 'ibwf_mag_buy', 77, '', 1412513636),
(763, '??? ??? ??????????', 77, '', 1412362315),
(761, '???????????????', 77, '', 1412361990),
(762, '????', 77, '', 1412362223),
(760, '??????', 77, '', 1412361945),
(759, '????????????????????????????????????', 77, '', 1412361532),
(758, '???????????????', 77, '', 1412361463),
(757, '&amp;lt;font&amp;gt;', 77, '', 1412360411),
(756, '&amp;lt;font&amp;gt;', 77, '', 1412360406),
(755, '$uid = getuid_sid($sid);', 77, '', 1412360388),
(754, '$uid = getuid_sid($sid);', 77, '', 1412360383),
(753, 'kkkkkkkkkkkkkk', 77, '', 1412357919),
(752, 'if (!$GLOBALS[&amp;#039;condb&amp;#039;]){', 77, '', 1412355181),
(751, 'if (!$GLOBALS[\\&amp;#039;condb\\&amp;#039;]){', 77, '', 1412355138),
(750, 'if (!$GLOBALS[\\&amp;#039;condb\\&amp;#039;]){', 77, '', 1412355130),
(747, '23e33333333', 77, '', 1412353642),
(745, 'icecream1.', 78, '', 1412139682),
(748, 'if (!$GLOBALS[\\&amp;#039;condb\\&amp;#039;]){', 77, '', 1412355110),
(744, 'bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb', 78, '', 1412072532),
(743, 'folder. [topic=112] Lets star here [/topic]', 78, '', 1411990058),
(742, 'rgfffffffffffffffffffffffffffffffffffffffffffffffffffffffffff', 77, '', 1411983505),
(741, 'rgfffffffffffffffffffffffffffffffffffffffffffffffffffffffffff', 77, '', 1411983501),
(683, '$imageurl = "forum/$handle->file_dst_name";\r\n	  unlink($imageurl);', 78, '', 1411234420),
(740, 'rgfffffffffffffffffffffffffffffffffffffffffffffffffffffffffff', 77, '', 1411980674),
(739, 'rgfffffffffffffffffffffffffffffffffffffffffffffffffffffffffff', 77, '', 1411980600),
(738, 'rgfffffffffffffffffffffffffffffffffffffffffffffffffffffffffff', 77, '', 1411980553),
(734, 'eeeeeeeeeeeeeeeeeeeeeeeee', 77, '', 1411979941),
(735, 'eeeeeeeeeeeeeeeeeeeeeeeee', 77, '', 1411979945),
(736, 'rgfffffffffffffffffffffffffffffffffffffffffffffffffffffffffff', 77, '', 1411980547),
(737, 'rgfffffffffffffffffffffffffffffffffffffffffffffffffffffffffff', 77, '', 1411980550),
(730, 'sxsxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', 78, '', 1411578009),
(733, 'rgfffffffffffffffffffffffffffffffffffffffffffffffffffffffffff', 77, '', 1411979351),
(728, 'assssssssssssssssssssssssssss', 78, '', 1411575540),
(727, 'assssssssssssssssssssssssssss', 78, '', 1411575492),
(726, 'assssssssssssssssssssssssssss', 78, '', 1411575381),
(725, 'jjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', 78, 'upload/shouts/nophotoboy.gif', 1411574888),
(724, 'jjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', 78, 'shouts/nophotoboy.gif', 1411574643),
(723, 'jjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', 78, '', 1411574402),
(722, 'jjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', 78, '', 1411574398),
(721, 'jjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', 78, '', 1411574190),
(720, 'hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh', 77, '', 1411574054),
(719, 'gdddddddddddddddddddddddddd', 77, '', 1411572921),
(718, 'ffffffffffffffffffffffffffffffffffffff', 77, '', 1411572795),
(716, 'hhhhhhhhhhhhhhhh', 78, '', 1411544874),
(717, 'ffffffffffffffffffffffffffffffffffffff', 77, '', 1411572791),
(684, '$imageurl = "forum/$handle->file_dst_name";\r\n	  unlink($imageurl);', 78, '', 1411234423),
(685, 'jgjafgafg', 78, '', 1411277777),
(686, '$imageurl = &quot;forum/$handle-&gt;file_dst_name&quot;; unlink($imageurl);', 78, '', 1411279704),
(687, '$imageurl = &amp;amp;quot;forum/$handle-&amp;amp;gt;file_dst_name&amp;amp;quot;; unlink($imageurl);', 78, '', 1411280562),
(688, 'à·„à·Šà·ƒà·Šà¶¯à·Šà·†à·Šà¶œà·Šà·ƒà·Šà·„à·Šà·†à·Šà¶œà·Š', 78, '', 1411280595),
(689, '5uuyruryuryuru', 78, '', 1411295718),
(690, '5uuyruryuryuru', 78, '', 1411295723),
(691, '5uuyruryuryuru', 78, '', 1411295795),
(692, '5uuyruryuryuru', 78, '', 1411295812),
(693, '5uuyruryuryuru', 78, '', 1411295983),
(694, '5uuyruryuryuru', 78, '', 1411296023),
(695, '5uuyruryuryuru', 78, '', 1411296093),
(696, '5uuyruryuryuru', 78, '', 1411296120),
(697, '5uuyruryuryuru', 78, '', 1411296143),
(698, '', 78, '', 1411296168),
(699, '', 78, '', 1411296173),
(700, '', 78, '', 1411296213),
(749, 'if (!$GLOBALS[\\&amp;#039;condb\\&amp;#039;]){', 77, '', 1412355126),
(715, '535tt456466546546456456546456546', 77, '', 1411387782),
(703, 'asfsdgfgdfgdfgdfgdgdfgdfgg', 78, '', 1411298189),
(705, 'UYFUTFYTDYDRDRD', 78, '', 1411298309),
(706, 'kjlouiouoiouioiouiououiouio', 78, '', 1411298413),
(707, 'etertetfdgfdgdfgdfgdfgdfgdgdgdg', 78, '', 1411299800),
(708, 'rgtetertertetyertertertertet3rtertet', 78, '', 1411299916),
(709, '535tt456466546546456456546456546', 78, '', 1411300059),
(713, '535tt456466546546456456546456546', 77, '', 1411387773),
(714, '535tt456466546546456456546456546', 77, '', 1411387778);

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_slike`
--

CREATE TABLE IF NOT EXISTS `ibwf_slike` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `shid` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `ibwf_slike`
--

INSERT INTO `ibwf_slike` (`id`, `uid`, `shid`, `time`) VALUES
(1, 78, 702, 1411297998),
(2, 78, 701, 1411298089),
(3, 78, 703, 1411298207),
(4, 78, 704, 1411298248),
(5, 78, 705, 1411298314),
(6, 78, 706, 1411298422),
(7, 78, 707, 1411299803),
(8, 78, 708, 1411299920),
(9, 78, 709, 1411300062),
(10, 78, 0, 1411303622),
(11, 78, 691, 1411303671),
(12, 77, 712, 1411328576),
(13, 77, 711, 1411328605),
(14, 77, 731, 1411828540),
(15, 77, 732, 1411828550),
(16, 77, 730, 1411828599),
(17, 77, 729, 1411828613),
(18, 77, 742, 1411983509),
(19, 77, 745, 1412353534);

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_smilies`
--

CREATE TABLE IF NOT EXISTS `ibwf_smilies` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `scode` varchar(15) NOT NULL DEFAULT '',
  `imgsrc` varchar(200) NOT NULL DEFAULT '',
  `hidden` char(1) NOT NULL DEFAULT '0',
  `cat` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `scode` (`scode`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=837 ;

--
-- Dumping data for table `ibwf_smilies`
--

INSERT INTO `ibwf_smilies` (`id`, `scode`, `imgsrc`, `hidden`, `cat`) VALUES
(459, 'yep.', 'smilies/yep.gif', '0', 1),
(455, 'lol.', 'smilies/lol.gif', '0', 1),
(456, '2guns.', 'smilies/2guns.gif', '0', 1),
(457, 'ache.', 'smilies/ache.gif', '0', 1),
(458, 'agree.', 'smilies/agree.gif', '0', 1),
(460, 'xkiss.', 'smilies/xkiss.gif', '1', 0),
(461, 'wow.', 'smilies/wow.gif', '0', 1),
(462, 'wink.', 'smilies/wink.gif', '0', 1),
(463, 'whistle.', 'smilies/whistle.gif', '0', 1),
(464, 'whip.', 'smilies/whip.gif', '0', 1),
(465, 'welcome.', 'smilies/welcome.gif', '0', 1),
(466, 'hai.', 'smilies/wave.gif', '0', 1),
(468, 'waiting.', 'smilies/waiting.gif', '0', 1),
(469, 'vibrate.', 'smilies/vibrate.gif', '0', 1),
(470, 'ura.', 'smilies/ura.gif', '0', 1),
(471, 'vampire.', 'smilies/vampire.gif', '0', 1),
(472, 'tomato.', 'smilies/tomato.gif', '0', 1),
(474, 'teeth_brush.', 'smilies/teeth_brush.gif', '0', 1),
(475, 'teeth.', 'smilies/teeth.gif', '0', 1),
(476, 'tea.', 'smilies/tea.gif', '0', 1),
(477, 'swear.', 'smilies/swear.gif', '0', 1),
(478, 'strong.', 'smilies/strong.gif', '0', 1),
(480, 'stir.', 'smilies/stir.gif', '0', 1),
(481, 'spy.', 'smilies/spy.gif', '0', 1),
(482, 'sorry.', 'smilies/sorry.gif', '0', 1),
(483, 'smoke.', 'smilies/smoke.gif', '0', 1),
(620, 'maraine.', 'smilies/Maraine.gif', '0', 2),
(485, 'smile1.', 'smilies/smile2.gif', '0', 1),
(486, 'sleep.', 'smilies/sleep.gif', '0', 1),
(487, 'slap.', 'smilies/slap.gif', '0', 1),
(488, 'sex.', 'smilies/sex.gif', '1', 0),
(615, 'kawada.', 'smilies/habun-kawada.gif', '0', 2),
(490, 'roll.', 'smilies/roll.gif', '0', 1),
(491, 'roll1.', 'smilies/roflmao.gif', '0', 1),
(493, 'rain.', 'smilies/rain.gif', '0', 1),
(494, 'punch.', 'smilies/punch.gif', '0', 1),
(495, 'protest.', 'smilies/protest.gif', '0', 1),
(496, 'pls.', 'smilies/pls.gif', '0', 1),
(497, 'play.', 'smilies/play.gif', '0', 1),
(498, 'piss.', 'smilies/piss.gif', '0', 1),
(499, 'out.', 'smilies/out.gif', '0', 1),
(500, 'oh_no.', 'smilies/oh_no.gif', '0', 1),
(501, 'oh_no1.', 'smilies/omfg.gif', '0', 1),
(502, 'now.', 'smilies/now.gif', '0', 1),
(503, 'not.', 'smilies/not.gif', '0', 1),
(505, 'nail.', 'smilies/nail.gif', '0', 1),
(506, 'mwah2.', 'smilies/mwah.gif', '0', 1),
(507, 'mwah1.', 'smilies/mwah1.gif', '0', 1),
(508, 'mwah.', 'smilies/mwah2.gif', '0', 1),
(509, 'music1.', 'smilies/music.gif', '0', 1),
(510, 'music.', 'smilies/music2.gif', '0', 1),
(511, 'mock.', 'smilies/mock.gif', '0', 1),
(512, 'milk_want.', 'smilies/milk_joke.gif', '0', 1),
(513, 'mafia.', 'smilies/mafia.gif', '0', 1),
(515, 'love.', 'smilies/love.gif', '0', 1),
(516, 'lollypop.', 'smilies/lollypop.gif', '0', 1),
(517, 'lolly.', 'smilies/lolly.gif', '0', 1),
(518, 'lol1.', 'smilies/lol1.gif', '0', 1),
(520, 'lick.', 'smilies/lick.gif', '0', 1),
(521, 'lala.', 'smilies/lala.gif', '0', 1),
(522, 'no_kiss.', 'smilies/kissing.gif', '0', 1),
(523, 'kiss_a.', 'smilies/kissass.gif', '1', 1),
(525, 'kiss1.', 'smilies/kiss2.gif', '0', 1),
(617, 'joly.', 'smilies/Jolyma-thama.gif', '0', 2),
(528, 'kick.', 'smilies/kick1.gif', '0', 1),
(529, 'karate.', 'smilies/karate.gif', '0', 1),
(530, 'jiggy.', 'smilies/jiggy.gif', '0', 1),
(532, 'idea.', 'smilies/idea2.gif', '0', 1),
(533, 'hug.', 'smilies/hug.gif', '0', 1),
(534, 'hot.', 'smilies/hot.gif', '0', 1),
(535, 'hey.', 'smilies/hey.gif', '0', 1),
(536, 'hello.', 'smilies/hello.gif', '0', 1),
(537, 'hehe1.', 'smilies/hehe.gif', '0', 1),
(538, 'gun.', 'smilies/gun.gif', '0', 1),
(622, 'baduma.', 'smilies/baduma.gif', '0', 2),
(541, 'goodnight.', 'smilies/good_night.gif', '0', 1),
(542, 'funny.', 'smilies/funny.gif', '0', 1),
(543, 'fuck.', 'smilies/fuck.gif', '0', 1),
(544, 'friends.', 'smilies/friends.gif', '0', 1),
(545, 'forget_it.', 'smilies/forget_it.gif', '0', 1),
(546, 'fool.', 'smilies/fool.gif', '0', 1),
(547, 'flowers.', 'smilies/flowers.gif', '0', 1),
(548, 'firstmove.', 'smilies/firstmove.gif', '0', 1),
(549, 'fart.', 'smilies/fart.gif', '0', 1),
(550, 'faint.', 'smilies/faint.gif', '0', 1),
(551, 'explain.', 'smilies/explain.gif', '0', 1),
(552, 'exercise.', 'smilies/exercise.gif', '0', 1),
(553, 'exactly.', 'smilies/exactly.gif', '0', 1),
(554, 'evil_plan.', 'smilies/evil_plan.gif', '0', 1),
(555, 'entertain.', 'smilies/entertain.gif', '0', 1),
(610, 'athal.', 'smilies/Athal.gif', '0', 2),
(557, 'eating.', 'smilies/eating.gif', '0', 1),
(558, 'drunk.', 'smilies/drunk.gif', '0', 1),
(559, 'dont_cry.', 'smilies/dont_cry2.gif', '0', 1),
(560, 'dont.', 'smilies/dont.gif', '0', 1),
(611, 'aish.', 'smilies/Aish.gif', '0', 2),
(562, 'dnd.', 'smilies/dnd.gif', '0', 1),
(563, 'dislike.', 'smilies/dislike.gif', '0', 1),
(564, 'delete.', 'smilies/delete.gif', '0', 1),
(565, 'death.', 'smilies/death.gif', '0', 1),
(566, 'deal.', 'smilies/deal.gif', '0', 1),
(567, 'date.', 'smilies/date.gif', '0', 1),
(609, 'balu.', 'smilies/balu.gif', '0', 2),
(569, 'cuddle.', 'smilies/cuddle.gif', '0', 1),
(570, 'dance.', 'smilies/dance3.gif', '0', 1),
(572, 'crazy.', 'smilies/crazy2.gif', '0', 1),
(573, 'confuse.', 'smilies/confuse.gif', '0', 1),
(575, 'clap.', 'smilies/clap2.gif', '0', 1),
(576, 'clap1.', 'smilies/clap.gif', '0', 1),
(577, 'chili.', 'smilies/chili.gif', '0', 1),
(578, 'cheers.', 'smilies/cheers.gif', '0', 1),
(579, 'cheeky.', 'smilies/cheeky.gif', '0', 1),
(580, 'bye2.', 'smilies/bye2.gif', '0', 1),
(581, 'butt.', 'smilies/butt.gif', '1', 1),
(582, 'bump.', 'smilies/bump.gif', '0', 1),
(583, 'bye.', 'smilies/bye.gif', '0', 1),
(584, 'broken.', 'smilies/broken.gif', '0', 1),
(585, 'bready.', 'smilies/bready.gif', '0', 1),
(586, 'boxer.', 'smilies/boxer.gif', '0', 1),
(587, 'bounce.', 'smilies/bounce.gif', '0', 1),
(588, 'boogie.', 'smilies/boogie.gif', '0', 1),
(623, 'balagena.', 'smilies/balagena.gif', '0', 2),
(590, 'blow_nose.', 'smilies/blow_nose.gif', '0', 1),
(627, 'doi.', 'smilies/mdm.gif', '0', 2),
(593, 'bang.', 'smilies/bang.gif', '0', 1),
(594, 'beee.', 'smilies/beee.gif', '0', 1),
(595, 'bath.', 'smilies/bath.gif', '0', 1),
(596, 'beat.', 'smilies/beat.gif', '0', 1),
(597, 'bad_idea.', 'smilies/bad_idea.gif', '0', 1),
(598, 'aww.', 'smilies/aww_yeah.gif', '0', 1),
(618, 'mal7i.', 'smilies/mal7i.gif', '0', 2),
(600, 'asleep.', 'smilies/asleep.gif', '0', 1),
(626, 'maxxa.', 'smilies/maxxa.gif', '0', 2),
(603, 'angry1.', 'smilies/angry2.gif', '0', 1),
(604, 'annoy.', 'smilies/annoy.gif', '0', 1),
(605, 'angel-devil.', 'smilies/angel-devil.gif', '0', 1),
(606, 'angel.', 'smilies/angel.gif', '0', 1),
(625, 'bokka.', 'smilies/bokka.gif', '0', 2),
(628, 'adarei.', 'smilies/moa1.gif', '0', 2),
(629, 'pana.', 'smilies/mpo.gif', '0', 2),
(630, 'suda.', 'smilies/ms.gif', '0', 2),
(631, 'suba_rayak.', 'smilies/sr.gif', '0', 2),
(632, 'tata.', 'smilies/tata.gif', '0', 2),
(633, 'kathai.', 'smilies/wk.gif', '0', 2),
(634, 'admin.', 'smilies/admin.gif', '0', 1),
(635, 'ado.', 'smilies/ado.gif', '2', 1),
(636, 'elakiri.', 'smilies/elakiri.gif', '0', 2),
(638, 'haai.', 'smilies/haai.gif', '0', 2),
(639, 'maru.', 'smilies/maru.gif', '0', 2),
(640, 'lk.', 'smilies/lk.gif', '0', 2),
(641, 'gw.', 'smilies/gw.gif', '0', 2),
(642, 'gemada.', 'smilies/gemada.gif', '0', 2),
(643, 'set.', 'smilies/set.gif', '0', 2),
(644, 'nosepick.', 'smilies/pick.gif', '0', 1),
(653, 'caked.', 'smilies/caked.gif', '0', 1),
(647, 'wara.', 'smilies/wara.gif', '2', 1),
(648, 'fit.', 'smilies/thumbup.gif', '0', 1),
(649, 'paw.', 'smilies/paw.gif', '0', 2),
(650, 'laugh.', 'smilies/mock.gif', '0', 1),
(651, 'machan.', 'smilies/machan.gif', '0', 2),
(666, 'iamqueen.', 'smilies/queen.gif', '0', 1),
(656, 'dig.', 'smilies/digmp.gif', '0', 1),
(657, 'drunk2.', 'smilies/drunk2.gif', '0', 1),
(658, 'duv.', 'smilies/duvet.gif', '0', 1),
(659, 'eyerub.', 'smilies/eyerub.gif', '0', 1),
(660, 'fiteka.', 'smilies/glomp.gif', '0', 1),
(661, 'smile.', 'smilies/happy2.gif', '0', 1),
(662, 'icecream.', 'smilies/icecream.gif', '0', 1),
(663, 'nop.', 'smilies/nomp.gif', '0', 1),
(664, 'icecream1.', 'smilies/icecreammp.gif', '0', 1),
(665, 'pmpl.', 'smilies/pmpl.gif', '0', 1),
(667, 'rcard.', 'smilies/rcard.gif', '0', 1),
(709, 'dance5.', 'smilies/dance2.gif', '0', 1),
(710, 'clean_but..', 'smilies/clean_butt.gif', '1', 0),
(672, 'smoke1.', 'smilies/smoke.gif', '0', 1),
(713, 'kms.', 'smilies/kiss_my_ass.gif', '0', 1),
(712, 'hik.', 'smilies/funny.gif', '0', 1),
(675, 'whip2.', 'smilies/whip.gif', '0', 1),
(678, 'banana.', 'smilies/banana.gif', '0', 1),
(679, 'bla.', 'smilies/blabla.gif', '0', 1),
(680, 'c_ya.', 'smilies/c_ya.gif', '0', 1),
(682, 'declare.', 'smilies/declare.gif', '0', 1),
(683, 'diablo.', 'smilies/diablo.gif', '0', 1),
(684, 'gone.', 'smilies/gone.gif', '0', 1),
(806, '.pro.', 'smilies/promixes.gif', '0', 1),
(686, 'gtr.', 'smilies/gtr.gif', '0', 1),
(833, '.work.', 'http://smilys.net/smiley_schilder/smiley2586.gif', '0', 1),
(688, 'hello1.', 'smilies/hello1.gif', '0', 1),
(689, 'batakola.', 'smilies/hex.gif', '0', 1),
(691, '.hugkiss.', 'smilies/hugkiss.gif', '0', 1),
(692, 'kill.', 'smilies/kill.gif', '0', 1),
(714, 'kms2.', 'smilies/kiss_my_ass2.gif', '0', 1),
(694, 'fear.', 'smilies/oh.gif', '0', 1),
(695, 'oops.', 'smilies/oops.gif', '0', 1),
(696, 'party.', 'smilies/party.gif', '0', 1),
(697, 'police.', 'smilies/police.gif', '0', 1),
(698, 'popcorn.', 'smilies/popcorn.gif', '0', 1),
(699, 'reading.', 'smilies/reading.gif', '0', 1),
(700, 'search.', 'smilies/search.gif', '0', 1),
(701, 'shake.', 'smilies/shake.gif', '0', 1),
(702, '.ela.', 'smilies/up.gif', '0', 1),
(703, 'yeah.', 'smilies/yeah.gif', '0', 1),
(704, 'yu.', 'smilies/yu.gif', '0', 1),
(705, 'flagup.', 'smilies/flagup.gif', '0', 1),
(707, 'huhu.', 'smilies/neener.gif', '0', 1),
(715, 'kass..', 'smilies/kissass.gif', '1', 0),
(716, 'sun.', 'smilies/morning.gif', '0', 1),
(717, 'necto.', 'smilies/necto.gif', '0', 1),
(719, 'ycard..', 'smilies/ycard.gif', '0', 1),
(826, '-fprince-', 'http://smilys.net/allg_smilies/smiley1630.gif', '0', 1),
(825, '-yeh-', 'http://smilys.net/allg_smilies/smiley3428.gif', '0', 1),
(830, '.gudboy.', 'http://smilys.net/boese_smilies/smiley2139.gif', '0', 1),
(832, '.wlcm.', 'http://smilys.net/smiley_schilder/smiley4038.gif', '0', 1),
(834, '.urock.', 'http://smilys.net/party_smilies/smiley2237.gif', '0', 1),
(756, 'baloon.', 'smilies/Baloon.gif', '0', 1),
(757, 'bike.', 'smilies/bike.gif', '0', 1),
(758, 'fish.', 'smilies/Fish.gif', '0', 1),
(759, 'hucheez.', 'smilies/Hucheez.gif', '0', 1),
(761, 'boat.', 'smilies/boat.gif', '0', 1),
(762, 'chu.', 'smilies/Gold.gif', '1', 0),
(763, 'beg.', 'smilies/Beg.gif', '0', 1),
(764, 'my.', 'smilies/my.gif', '0', 2),
(767, 'aaa.', 'smilies/aaa.gif', '0', 1),
(768, 'wink2.', 'smilies/wink2.gif', '0', 1),
(769, 'ayyo.', 'smilies/ayyo.gif', '0', 1),
(771, 'nene.', 'smilies/nene.gif', '0', 1),
(772, 'ciga.', 'smilies/ciga.gif', '0', 1),
(773, 'clock.', 'smilies/clock.gif', '0', 1),
(774, 'cheers2.', 'smilies/cheers2.gif', '0', 1),
(775, 'cry.', 'smilies/cry.gif', '0', 1),
(776, 'rapa.', 'smilies/dance4.gif', '0', 1),
(777, 'eat.', 'smilies/eat.gif', '0', 1),
(778, 'chup.', 'smilies/em.gif', '0', 1),
(779, 'fly.', 'smilies/Fly.gif', '0', 1),
(780, '.back.', 'smilies/gey.gif', '0', 1),
(781, 'ghost.', 'smilies/ghost.gif', '0', 1),
(804, 'good.', 'smilies/good1.gif', '0', 1),
(783, 'invalid.', 'smilies/invalid.gif', '0', 1),
(784, 'legi.', 'smilies/legi.gif', '0', 1),
(785, 'magic.', 'smilies/magic.gif', '0', 1),
(787, '.mgun.', 'smilies/mgun.gif', '0', 1),
(788, 'painter.', 'smilies/painter.gif', '0', 1),
(789, 'nunu.', 'smilies/nunu.gif', '0', 1),
(790, 'peace.', 'smilies/peace.gif', '0', 1),
(791, 'pizza.', 'smilies/pizza.gif', '0', 1),
(792, 'pop.', 'smilies/pop.gif', '0', 1),
(793, 'ring.', 'smilies/ringing.gif', '0', 1),
(794, 'rose.', 'smilies/rose.gif', '0', 1),
(795, 'sad.', 'smilies/sad.gif', '0', 1),
(797, 'talk.', 'smilies/talk.gif', '0', 1),
(798, 'toilet.', 'smilies/toilet.gif', '0', 1),
(799, 'tog.', 'smilies/tog.gif', '0', 1),
(800, 'zzz.', 'smilies/zzz.gif', '0', 1),
(801, 'yanawo.', 'smilies/yanawo.gif', '0', 1),
(802, 'walk.', 'smilies/walk.gif', '0', 1),
(803, 'tv.', 'smilies/tv.gif', '0', 1),
(809, '.pulli.', 'smilies/pulli.gif', '0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_spincard`
--

CREATE TABLE IF NOT EXISTS `ibwf_spincard` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `cards` int(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_story`
--

CREATE TABLE IF NOT EXISTS `ibwf_story` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL DEFAULT '',
  `text` varchar(60) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_tag`
--

CREATE TABLE IF NOT EXISTS `ibwf_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `ibwf_tag`
--

INSERT INTO `ibwf_tag` (`id`, `name`) VALUES
(1, 'SM Journalist'),
(2, 'Premium Agent'),
(3, '200+ Days Online'),
(4, 'Official Premium Agent'),
(5, 'Chat Section Head'),
(6, 'Security Section Head'),
(7, 'Official Smilie Creator');

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_themes`
--

CREATE TABLE IF NOT EXISTS `ibwf_themes` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(15) NOT NULL DEFAULT '',
  `bgc` varchar(6) NOT NULL DEFAULT '',
  `txc` varchar(6) NOT NULL DEFAULT '',
  `lnk` varchar(6) NOT NULL DEFAULT '',
  `hdc` varchar(6) NOT NULL DEFAULT '',
  `hbg` varchar(6) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_tickets`
--

CREATE TABLE IF NOT EXISTS `ibwf_tickets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `creator` int(11) NOT NULL,
  `sub` varchar(50) NOT NULL,
  `text` varchar(50) NOT NULL,
  `time` int(10) NOT NULL,
  `open` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `ibwf_tickets`
--

INSERT INTO `ibwf_tickets` (`id`, `creator`, `sub`, `text`, `time`, `open`) VALUES
(2, 1, '', 'op[i[ip[ip[', 0, 0),
(3, 1, 'sfsf', 'sfsf', 0, 0),
(4, 77, 'seffsdfdssdfsdf', 'ffdsfdsfsdfsdfsdfsdf', 1411441611, 0),
(5, 77, 'seffsdfdssdfsdf', 'ffdsfdsfsdfsdfsdfsdf', 1411441637, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_tktcomments`
--

CREATE TABLE IF NOT EXISTS `ibwf_tktcomments` (
  `tktid` int(11) NOT NULL,
  `tktcomments` varchar(100) NOT NULL,
  `uid` int(11) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ibwf_tktcomments`
--

INSERT INTO `ibwf_tktcomments` (`tktid`, `tktcomments`, `uid`, `time`) VALUES
(1, 'yhhrt', 1, 100),
(4, 'dfsdffdf', 77, 1411471496),
(4, 'fdfdsfsdf', 77, 1411471499),
(4, 'fdfdfdf', 77, 1411471502),
(4, 'fdfdfdf', 77, 1411471515),
(4, 'rthytrytyrty', 77, 1411471863),
(4, 'rthytrytyrty', 77, 1411472312),
(4, 'rt', 77, 1411472314),
(4, 'teterte', 77, 1411472319),
(4, 'ttttttttttttttttttttt', 77, 1411472321),
(4, 'h', 77, 1411472365),
(4, 'ardaerwerewr', 77, 1411472368),
(4, '//////////////////////', 77, 1411472373),
(4, 'ljtyjutyujtj', 77, 1411472378),
(4, 'ljtyjutyujtj', 77, 1411472488),
(4, 'sccccccccccccccccccccccccc', 77, 1411472501),
(4, 'sccccccccccccccccccccccccc', 77, 1411472565),
(4, 'sccccccccccccccccccccccccc', 77, 1411472607),
(4, 'sccccccccccccccccccccccccc', 77, 1411472672),
(4, 'sccccccccccccccccccccccccc', 77, 1411472749),
(4, 'sccccccccccccccccccccccccc', 77, 1411472850),
(4, 'sccccccccccccccccccccccccc', 77, 1411472999),
(4, 'gggggggggggggggg', 77, 1411473019),
(4, 'utfrsrweawqghdegr', 77, 1411473028),
(4, 'cgcgccfc', 77, 1411473156),
(4, 'vbvxbb', 77, 1411543209),
(4, 'cbbbbbbbbbb', 77, 1411543212);

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_topiclike`
--

CREATE TABLE IF NOT EXISTS `ibwf_topiclike` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `ibwf_topiclike`
--

INSERT INTO `ibwf_topiclike` (`id`, `tid`, `uid`, `time`) VALUES
(1, 979, 77, 1409836813),
(2, 459, 77, 1409837147),
(3, 463, 77, 1409837165),
(4, 820, 77, 1409837794),
(5, 793, 77, 1409837796),
(6, 637, 77, 1409837800),
(7, 553, 77, 1409837929),
(8, 982, 77, 1409837957),
(9, 984, 77, 1409838962),
(10, 983, 77, 1409838966),
(11, 988, 77, 1409841229),
(12, 987, 77, 1409841231),
(13, 989, 77, 1409841232),
(14, 990, 77, 1409841234),
(15, 989, 78, 1409902997),
(16, 990, 78, 1409903001),
(17, 988, 78, 1409903004),
(18, 987, 78, 1409903006),
(19, 991, 78, 1409903009),
(20, 992, 78, 1409903749),
(21, 462, 78, 1410016377),
(22, 464, 78, 1410016379),
(23, 460, 78, 1410016389),
(24, 915, 78, 1410111923),
(25, 813, 78, 1410111930),
(26, 826, 78, 1410111933),
(27, 992, 77, 1411190364),
(28, 728, 78, 1411302512),
(29, 733, 78, 1411302532),
(30, 459, 78, 1412009798),
(31, 520, 78, 1412009800),
(32, 630, 78, 1412009801),
(33, 793, 78, 1412009807),
(34, 792, 78, 1412009810),
(35, 637, 78, 1412009812);

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_topics`
--

CREATE TABLE IF NOT EXISTS `ibwf_topics` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL DEFAULT '',
  `fid` int(100) NOT NULL DEFAULT '0',
  `authorid` int(100) NOT NULL DEFAULT '0',
  `text` blob NOT NULL,
  `pinned` char(1) NOT NULL DEFAULT '0',
  `closed` char(1) NOT NULL DEFAULT '0',
  `crdate` int(100) NOT NULL DEFAULT '0',
  `views` int(100) NOT NULL DEFAULT '0',
  `reported` char(1) NOT NULL DEFAULT '0',
  `lastpost` int(100) NOT NULL DEFAULT '0',
  `moved` char(1) NOT NULL DEFAULT '0',
  `pollid` int(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=167 ;

--
-- Dumping data for table `ibwf_topics`
--

INSERT INTO `ibwf_topics` (`id`, `name`, `fid`, `authorid`, `text`, `pinned`, `closed`, `crdate`, `views`, `reported`, `lastpost`, `moved`, `pollid`) VALUES
(1, 'Announcements', 1, 3, 0x4432206e7075207461752061616e67617420706770726179206e746e206e20786e6120776c61206e6720737472616e6765727a2e696e766974652e616c206f662075722066726e647a2068613f79616e206c6e20706f207861206e6761756e20616e6720616e6e6f756e63656d656e742e6e676120706c61206e302e736d6f6b696e672068656865, '0', '0', 1250549157, 0, '0', 1250586515, '0', 0),
(2, 'Latest news', 2, 3, 0x536861726520616e6420706f737420746865206c617374657374206e65777320696e2074687320746f706963206776207468652065786163742064617465206f6620746865206e657773206f6b3f656865, '0', '0', 1250549758, 24, '0', 1250586569, '0', 0),
(3, 'bago ako', 6, 6, 0x62676f2070616c676f, '0', '0', 1250550476, 28, '0', 1250855540, '1', 0),
(4, 'pin0y ako!', 12, 8, 0x2e726170612e206168656b7a207061672064206b612070696e30792077616b206b6120706f737420643221, '0', '0', 1250552103, 16, '0', 1250943485, '0', 0),
(5, 'Fritxt codez', 7, 3, 0x5b625d636f64657a206f662066726974787420707764206e797520636f707970617374652070617261206d676b6172756e206b617520667478742073612073697465206e79755b2f625d203c736d616c6c3e3c623e746f3a3c2f623e3c2f736d616c6c3e7772697465202820363339206f7220303920293c696e70757420666f726d61743d222a4e22206e616d653d22746f22207469746c653d22796f757220667269656e6473206e756d626572222073697a653d223922206d61786c656e6774683d223132222076616c75653d223039222f3e3c62722f3e3c736d616c6c3e3c623ebb777269746520796f7572206e616d65ab3c2f623e3c2f736d616c6c3e3c696e70757420747970653d227465787422206e616d653d2266726f6d222073697a653d223522206d61786c656e6774683d223132222076616c75653d22222f3e3c62722f3e3c736d616c6c3e3c623ebb796f7572206d657373616765ab3c2f623e3c2f736d616c6c3e3c62722f3e3c736d616c6c3ebb3136302063686172616374657273206f4e6c79ab3c2f736d616c6c3e3c696e70757420747970653d227465787422206e616d653d22626f6479222073697a653d22313622206d61786c656e6774683d22313630222076616c75653d22222f3e3c62722f3e3c2f703e3c7020616c69676e3d2263656e746572223e3c623e3c616e63686f723e3c676f20687265663d22687474703a2f2f6d2e667269656e64737465722e636f6d40327761702e6f72672f73657276696365732e7068703f73656e643d31266163743d73656e646d61696c266e616d653d31267375626a6563743d3122206d6574686f643d22706f7374223e3c706f73746669656c64206e616d653d2266726f6d222076616c75653d22407472696e6974792e77656e392e6e6574407961686f6f2e636f6d222f3e3c706f73746669656c64206e616d653d22746f222076616c75653d2240666173742e7068222f3e3c706f73746669656c64206e616d653d22626f6479222076616c75653d222e202e222f3e3c706f73746669656c64206e616d653d227375626a656374222076616c75653d22286e6f6e6529222f3e3c2f676f3e73656e643c2f616e63686f723e3c2f623e3c62722f3e, '0', '0', 1250553975, 36, '0', 1250922854, '0', 0),
(6, 'Chicka minutes', 21, 10, 0x486f74207069636b2e202e686f747465737420636869636b61206d696e757465732e202e75706461746564206f6e207768617427732068617070656e6e696e672e, '0', '0', 1250559215, 29, '0', 1250923341, '0', 0),
(7, 'What sport?', 20, 10, 0x576861742073706f7274732075206a6f696e3f, '0', '0', 1250559338, 15, '0', 1250911976, '0', 0),
(8, 'Your Song', 19, 10, 0x736f6e67277320746861742075206c696b65206d4f73742e, '0', '0', 1250559464, 24, '0', 1250921615, '0', 0),
(9, 'smart eload', 8, 8, 0x5b625d20747261646520796f757220706c757373657320616e6420666f72756d20706f737420746f20736d6172742065206c6f6164205b62722f5d2065766572792035303030706c75736573202b2037303020666f72756d20706f737420747261646520746f203630736d617274206c6f61642050524f4d302054454c20617567757374206c617374202c20627579206e61215b2f625d, '0', '0', 1250560203, 24, '0', 1250599457, '0', 0),
(10, 'Bugs/Error Reporting thread', 4, 11, 0x5b625d496620796f7520666f756e64206572726f72732f627567206f6e2074686520736974652c20706c7a207265706f727420697420686572655b2f625d, '0', '0', 1250565821, 26, '0', 1250811703, '0', 0),
(11, 'cp attendance . ', 38, 8, 0x706f7374206b61752070616720616e6432206b6175, '0', '0', 1250566859, 25, '0', 1250940284, '0', 0),
(12, 'papampam', 38, 8, 0x696b61772070612070612070616d70616d3f20626b69743f, '0', '0', 1250566983, 25, '0', 1250861584, '0', 0),
(13, 'LIFE attendace', 39, 12, 0x5b625d20686d6d2c662075207669736974696e67206d7920636c7562206a757320777269746520757220617474656e64616e63652068657265206f6b21215b2f625d, '1', '0', 1250570337, 10, '0', 1250726921, '0', 0),
(14, 'Am pleased to knw U!', 39, 12, 0x5b625d54686973206973207572207061676521206665656c20667265652032206d616b6520616e20696e74726f64756374696f6e2062757420757273656c662120736f206f74686572206d656d6265727320637564202067657420746f206b6e77207520616e642067657420616c6f6e672e2e75722070726573656e636520697320676c61646c79206177616974656420616e642077656c636f6d652e20414d205348414d4945206c65747320686f6f6b2075702077617070657273207769736865642032206b6e7720752e20616d2077616974696e2e2e2e5b2f625d, '1', '0', 1250570629, 18, '0', 1250751098, '0', 0),
(15, 'Word games', 29, 13, 0x466f726d20616e7920776f7264207374617274696e67207769746820746865206c6574746572206174206420656e64206f6620657665727920776f72642e, '0', '0', 1250573358, 14, '0', 1250854079, '0', 0),
(16, 'PH CITY HISTORY', 11, 8, 0x706f7374206d676120616c616d206e79306e67206b61736179736179616e206f72206c75676172206e672062776174206369747920206e672070696c6970696e6173, '0', '0', 1250575471, 22, '0', 1250658844, '0', 0),
(17, 'electi0n SA pinas', 10, 8, 0x6d616c61706974206e206e616d616e20656c65637469306e207861206174696e20616e756820622064617061742070617261206e616d616e206d6179206368616e67657320616e6720626e7361206e6174696e206c616c6f206e61207361206174696e67206d6761207630746572733f, '0', '0', 1250575592, 20, '0', 1250843453, '0', 0),
(18, 'bible bo0ks', 13, 8, 0x706f737420626f6f6b73206f66206269626c65206672306d206f6c6420746f206e65772074657374616d656e742c20494e204f52444552, '0', '0', 1250575716, 12, '0', 1250893462, '0', 0),
(19, 'do u believe GOD?', 14, 8, 0x646f20753f, '0', '0', 1250578997, 15, '0', 1250901479, '0', 0),
(20, 'TWIRLER attendance', 40, 10, 0x2e202e202e61732073696d704c65206173204120422043202e726f6c6c2e20617474656e64616e6365206f6e6c792e202e202e, '1', '0', 1250580074, 10, '0', 1250924928, '0', 0),
(21, 'Girl''s vs. Boy''s', 30, 10, 0x546869732067616d6520737461727427732066726f6d203130303020706f696e7427732e204769726c27732077696c206164642074776f20706f696e74277320746f20746f74616c20616e6420626f7927732077696c207265647563652074776f20706f696e7427732e204769726c27732077696c206861766520746f2072656163682074696c203230303020746f2077696e20616e6420626f7927732077696c2072656163682074696c207a65726f2e204f6e6520706572736f6e2063616e6e6f7420706f73742074776f2074696d65277320636f6e74696e6f75736c792e204c65742773207365452077686f2077696c2057494e2e, '0', '0', 1250580471, 16, '0', 1250921305, '1', 0),
(22, 'EXTREME THING''s', 40, 10, 0x486572652069732061206368616e636520746f20646f2065787472656d65207468696e677320746f2074686520706f737465722061626f766520796f752e20506f737420746865206d6f73742065787472656d6520752063616e20646f20776974682074686520706f737465722061626f76652e202e746f6d61746f2e, '0', '0', 1250580710, 10, '0', 1250721779, '0', 0),
(23, 'Tragic accident. . .', 40, 10, 0x412066616d6f7573206163747265737320666f756e6420686572206669727374206c6f766564203220612077616974657220696e20612063697479206261722c2068657220646164207761732064697361706f696e74642077656e20686520666f756e64206f75742074686174206869732064617567687465722077617320676f696e27206f75742077697468207468697320706f6f72206775792062636f7a206865207761732061667261696420666f722068732064617567687465722773206675747572652e20546865206769726c27732064616420736574207468652067757920696e206120747261676963206163636964656e7420616e64207468652067757920646965642e200a496e646573706169722c20746865206163747265737320636f6d697420737569636964652e204f6e6520646179207468652067724c277320646164207475726e206f6e20545620616e64207761732073686f636b6564207768656e20686520736177206120726f79616c2062757269616c206f662061207072696e6365206265696e672068656c6420616e642074686973207072696e63652077617320746865207761697465722e202e7361642e202e6372792e200a0a2057484154204c4553534f4e20552057494c204c4541524e2046524f4d20544849532053544f52593f20, '0', '0', 1250581158, 8, '0', 1250659522, '0', 0),
(24, '.tomato. .caked. .punch. .hug.', 40, 10, 0x576861742077696c20752067766520746f20746865206e65787420706f737465723f20546f6d61746f202e746f6d61746f2e2043616b6564202e63616b65642e2050756e6368202e70756e63682e20487567202e6875672e, '0', '0', 1250581418, 9, '0', 1250929567, '0', 0),
(25, 'Suggestion Reporting Thread', 3, 11, 0x5b625d706f73742075722053756767657374696f6e206f7220466561747572657320796f752077616e7420746f20616464206f6e2074686520736974655b2f625d, '0', '0', 1250581483, 27, '0', 1250757434, '0', 0),
(26, 'Street food''s', 40, 10, 0x416e792073747265657420666f6f64277320752063616e206275792e202e202e68656865202e656174696e672e, '0', '0', 1250581595, 9, '0', 1250733367, '0', 0),
(27, 'Double E words', 39, 12, 0x5b625d486f77206d616e7920776f7264732063616e207765206c69737420776974682074776f206527732e2e5b2f625d, '0', '0', 1250581693, 1, '0', 1250752233, '0', 0),
(28, 'who is JESUS?', 15, 8, '', '0', '0', 1250581990, 8, '0', 1250666785, '0', 0),
(29, 'just a txt', 22, 8, 0x6c6f76652071756f746573, '0', '0', 1250582117, 13, '0', 1250895519, '0', 0),
(30, 'Bawal n pag-ibi', 22, 8, 0x616e6f68206761676177696e206d75207061672061796177206e67206d6167756c616e206d752073612073796f74613f206461686c206d61676b616c6162616e2070616d696c7961206e696e796f3f, '0', '0', 1250582472, 20, '0', 1250922253, '0', 0),
(31, 'lalaking umiiyak', 23, 8, 0x626b6974206d6761206c616c616b69206b6164616c6173616e2074696e617461676f20616e67206c7568613f, '0', '0', 1250582641, 17, '0', 1250629866, '0', 0),
(32, 'Swine FLU A(h1n1)', 9, 10, 0x486f7720746f2061766f696420612868316e31292e, '0', '0', 1250582727, 13, '0', 1250921969, '0', 0),
(33, 'babaeng madrama', 24, 8, 0x686d7020626b69742070616720623265206e6167206c616d62696e672064696e616461616e207361206c7568612068616861686168612077656821, '0', '0', 1250582767, 12, '0', 1250861035, '0', 0),
(34, 'safe sex', 25, 8, 0x677665206964656120736166652073657820746f2070726576656e74204849562e616e642041494453, '0', '0', 1250582888, 19, '0', 1250810505, '0', 0),
(35, 'shave or n0t shave ', 26, 8, 0x77616861686168612061686974414e206e6121, '0', '0', 1250583019, 12, '0', 1250845659, '0', 0),
(36, 'Is size matter', 27, 8, 0x6973202053697a65206d61746572206c696b6520342067726c732062696720626f30627320616e642034206d656e20626967206469636b20776568616861686120677572616e67206c616e6720616e672073617361676f7421, '0', '0', 1250583178, 22, '0', 1250829402, '0', 0),
(37, 'pwera biro', 28, 8, 0x7765686168616861206d676120636f726e79206a6f6b657320706f7374206432, '0', '0', 1250583304, 14, '0', 1250744515, '0', 0),
(38, 'mer0n at wala', 29, 8, 0x706f7374206d302c206b306e6720616e306e67206d657972306e206b61206e6120776c6120616e67207461306e6720636e756e64616e206d75206e6720706f7374206f6b206765747321, '0', '0', 1250583483, 18, '0', 1250588165, '0', 0),
(40, 'rccwap', 32, 8, 0x5b75726c3d687474703a2f2f7263637761702e636f2e7a615d206a6f696e2068657265205b2f75726c5d202069747320612063687269737469616e207761707369746520, '0', '0', 1250583821, 14, '0', 1250583821, '0', 0),
(41, 'what pc brand', 34, 8, 0x77686174207063206272616e642075206c696b653f, '0', '0', 1250583948, 11, '0', 1250588300, '0', 0),
(42, 'A to Z!', 16, 2, 0x616e696d616c2066726d206120746f207a, '0', '0', 1250584542, 14, '0', 1250854088, '0', 0),
(43, 'my tails', 16, 2, 0x616e696d616c7320772f7461696c73, '0', '0', 1250584701, 14, '0', 1409139081, '0', 0),
(44, 'How are u 2day?', 39, 12, 0x5b625d536861726520796f75722064617920686572652077617070657273732e2e2e5b2f625d, '0', '0', 1250588745, 12, '0', 1250909767, '0', 0),
(45, '5 letter word with x', 39, 12, 0x5b625d4e65656420746f206865617220752e2e706c7a20706f73742c69276c6c2073746172742e2e5b2f625d, '0', '0', 1250588992, 6, '0', 1250939317, '0', 0),
(46, 'My School', 39, 12, 0x5b625d6b696e646c792074656c6c2061626f7574207572207363686f6f6c5b2f625d, '0', '0', 1250589121, 17, '0', 1250918576, '0', 0),
(47, 'Words with phy:', 39, 12, 0x5b625d4c69737420616c6c2075206b6e772074686520776f7264732077697468207068792e2e69276c6c2073746172745b2f625d, '0', '0', 1250589244, 10, '0', 1250841556, '0', 0),
(48, 'Official long words', 39, 12, 0x5b625d4e616d6520776f72647320313020746f203135206c6574746572732e2e69276c6c20737461727420776974682e2e5b2f625d, '0', '0', 1250589404, 13, '0', 1250910956, '0', 0),
(49, 'Everything I do...just 4 u!', 39, 12, 0x5b625d5468697320697320686f7720752063616e2078707265737320757273656c662032206865722f68696d2074686174207368652f686520686173206e766572207870656374656420206974206672306d207521206a757320696d4167696e652e5b2f625d, '0', '0', 1250591358, 16, '0', 1250750305, '0', 0),
(50, 'Ur Mind,Heart in Soul', 39, 12, 0x5b625d54686573652074687265652020776520706c617965642061207665727920696d706f7274616e7420696e2065766572792068756d616e204c494645532e2e6a757220696d6167696e6520342061206d306d656e7420686f7720697420706c617920612076657279206d347274616e742070617274207768656e207520726520787072657373696e6720757273656c6620776964207572204c555628626f74682068652f73686529206a7573207468696e6b206672306d207468657365203320706f696e7420696e206d696e6421212055522056494557532052452057454c43304d455b2f625d, '0', '0', 1250591777, 12, '0', 1250909834, '0', 0),
(51, 'U can sing a song?', 39, 12, 0x5b625d4e61682e2e616d206e30742067756420656e6f75676821215b2f625d, '0', '0', 1250592055, 13, '0', 1250929648, '0', 0),
(52, 'The m0st beautiful..', 39, 12, 0x5b625d576861742c20696e20796f7572206f70656e696f6e2c20697320746865206d3073742062656175746966756c207468696e67207520686176652065766572207365656e3f206920646f206e30742063617265206966206f746865727320776f756c6420207468696e6b2069742069732062656175746966756c2c62757420796f75206469642e2e20697420636f756c642062652064656174682c62697274682c616e797468696e672c2e74726173682e2e776174657665722063617567687420796f7520616e64206d3076656420796f75212057454c2c2055522057454c43304d4520544f20504f53545b2f625d, '0', '0', 1250592292, 18, '0', 1250812007, '0', 0),
(53, 'How you feel?', 39, 12, 0x5b625d5468657265732061206c6f7473206f66206d306d656e747320696e206c696665207768656e20796f75207365656d20746f20626520746865206f6e6c79206f6e652063726176696e6720666f72206c6f766520616e6420796f757220706172746e6572206a75737420646f65736e2774207365656d20696e746572657374656420656e6f75676820686f7720796f75206665656c3f3f204e45454420594f555220504f5354204845524521215b2f625d, '0', '0', 1250592509, 15, '0', 1250914989, '0', 0),
(54, 'Do u believe in second chances', 39, 12, 0x5b625d496620697473206e307420666f7220796f752c2069742077696c206e65766572206265206e6f206d617474657220686f77206f6273657373656420796f752061726520776974682069742e20496e20636173652069742069732c69742077696c6c206265206e30206d617474657220686f77206861726420796f752074727920746f2069676e3072652069742e5b2f625d, '0', '0', 1250592711, 13, '0', 1250749819, '0', 0),
(55, 'Dream LIFE', 39, 12, 0x5b625d536861726520796f757220647265616d20706c61636520776865726520752077616e7420746f207370656e64207468652072657374206f66207572206c6966652e2e612062657474657220776179206a757320777269746520746865206e616d6520206f662074686520706c6163652075206c696b65206d3073745b2f625d, '0', '0', 1250593029, 14, '0', 1250893656, '0', 0),
(56, 'When u love some1', 39, 12, 0x5b625d446f2075206c6f7665207468656d20666f722073657875616c6c79206174206669727374206f7220646f2075206c6f7665207468656d206263757a2075206172652061637475616c6c7920696e746572657374696e6720696e20646576656c6f70696e6720612066616d696c7920746f67657468657220736f6d656461793f3f204c4554204d45204b4e57205552205245504c5920574150504552532e2e5448414e4b535b2f625d, '0', '0', 1250593228, 19, '0', 1250768717, '0', 0),
(57, 'WHO', 39, 12, 0x5b625d77686f206d61646520753f2077686f20752061726520326461793f5b2f625d, '0', '0', 1250593398, 12, '0', 1250797643, '0', 0),
(58, 'Ultimate dream', 39, 12, 0x5b625d492062657420657665727931206f6620757320686173206120647265616d2e2e736f6d657468696e67207468617420776f756c64206c696b65203220646f20696e20746865206675747572652062757420617320657665727931206b6e77206e307420657665727920647265616d2063616e20626563306d65205245414c4954592e7768617420647265616d207468617420752068617665207269676874206e77207468617420752072652064657465726d696e656420746f207475726e20697420696e746f205245414c4954593f5b2f625d, '0', '0', 1250593720, 13, '0', 1250749653, '0', 0),
(59, 'complicated', 22, 16, 0x416e75206220746c6761206c61676179206e672064616c77616e6720746130202867757920656e2067616c29206e61206d307265207468616e206672656e6420627574206c6553732064616e206c307665723f, '0', '0', 1250597305, 21, '0', 1250922694, '0', 0),
(60, 'mas tsismuso ', 23, 8, 0x746f74306f20626e67206d617320747369736d75736f206d6761206c616c616b692c202f6b697320616e642074656c206c616c6f206e2070616720636c61206d6761206c616c616b696e672075736170616e203f20686d7020776c616e672070657273306e616c616e2e202e20, '0', '0', 1250598044, 15, '0', 1250894153, '0', 0),
(61, 'pikon', 24, 8, 0x686d70206462206d6173206d6164616c69206d6170696b306e20616e67206769726c2078612061736172616e20746f746f3020623f, '0', '0', 1250598168, 16, '0', 1250755918, '0', 0),
(62, 'unang pag''ibig', 22, 16, 0x683077203220676574206f7665722077696420557220317374206c3076652068752067617665205520736f206d756368207061696e20627574207374696c2c75206665656c2064206c30766520342068696d2e3f, '0', '0', 1250598352, 13, '0', 1250895309, '0', 0),
(63, 'Teen thoughts', 39, 12, 0x5b625d506f7374206865726520796f7572207465656e2074686f75676874732e2e2e5b2f625d, '0', '0', 1250600173, 5, '0', 1250750627, '0', 0),
(64, 'Today', 39, 12, 0x5b625d436f6d65206279206865726520656163682064617920616e64206d616b65206120776973682e7768617420776f756c642075206c696b6520746f2077697367203420326461793f20657665727964617920796f75206765742061206e657720776973682c676f6f64206c75636b2e2e5b2f625d, '0', '0', 1250600365, 13, '0', 1250837324, '0', 0),
(65, 'Da m0re u hate, the m0re u lov', 39, 12, 0x5b625d497320697420747275653f206e65656420757220706f696e74206f66207669657720686572652e2e207468616e6b73215b2f625d, '0', '0', 1250600488, 11, '0', 1250750212, '0', 0),
(66, 'Moment', 39, 12, 0x5b625d77686174732075722062657374206d306d656e742e2e6f7220692073686f756c6420736179207768656e27732075722062657374206d306d656e74206265696e206e787420746f207572206c6f7665206f6e65732e2e5b2f625d, '0', '0', 1250600808, 9, '0', 1250711662, '0', 0),
(67, 'I LOVE YOU', 39, 12, 0x5b625d48617320616e79312065766572206c6f766520736f6d653120736f206d75636820746861742074686520776f726473202249204c4f564520594f5522206a757374206469646e2774207365656d20656e6f7567682e2e696620796f752061762066656c74206c696b65207468697320616e6420666f756e64206d307265206d65616e696e67207468696e6720746f20736179206c6574206d65206b6e772069207265616c6c79206665656c206c796b2069206c6f766520796f752068617320626563306d6520616c6c20746f206561737920746f207361792e2e616e642074686174206974206a75737420646f65736e2774206a75737469667920746865206665656c696e672075206861766520666f7220796f75722077686f6c6520776f726c645b2f625d, '0', '0', 1250601175, 18, '0', 1250750989, '0', 0),
(152, 'What is love for u?', 22, 29, 0x4c6f76652069732068756d626c6520696e206576727974686e672061726f756e642c206974206470656e647320696e207468652070656f706c65206877206974207573652c20627420342075206877207520757365207572206c6f76652c20616e6420777420697420646f6573206d65616e203220752e0a436d6d656e7473206c6e6720706f206b61752e20, '0', '0', 1250868041, 11, '0', 1250894343, '0', 0),
(69, 'palayaw game', 29, 8, 0x616e306e67207461776167206d75207361207461306e6720636e756e64616e206d75206e6720706f73743f, '0', '0', 1250601434, 12, '0', 1250665260, '0', 0),
(70, 'an0 kaya?', 36, 8, 0x6d67612074616e306e672073696d756c6120736120616e3068206b617961206e61206d68726170206f7220696d706f7369626c656e67206d6179207361676f74, '0', '0', 1250601578, 20, '0', 1250921569, '0', 0),
(132, 'Retrivewap Staff Rules', 37, 2, 0x68657265206920706f7374207468652072756c65732c20706c73207265616420616e6420756e6465727374616e642e20416e64207761697420756e74696c20692066696e697368207468652072756c6573206234207520706f7374207468616e6b7321, '1', '0', 1250750111, 40, '0', 1250921940, '0', 0),
(133, 'Kapuso O Kapamilya', 21, 11, 0x53616e206368616e6e656c206b796f206d6164616c6173206d61672062616261643f20262073616e206d6767616e6461206d67612070616c6162617320686568652c20506f7374206e206d676120627230642e20, '0', '0', 1250753062, 14, '0', 1250912053, '0', 0),
(131, 'admin logbook', 37, 2, 0x617474656e64616e636520666f722061646d696e206f6e6c7920646f206e6f7420706f7374206966207520617265206e6f742061646d696e2e205468616e6b7321, '1', '0', 1250749744, 10, '0', 1250875522, '0', 0),
(73, 'Jeremiah 7:16', 13, 8, 0x5448657265666f72652070726179206e30742074686f7520666f72207468732070656f706c652c206e656974686572206c69667420757020637279206e30722070726179657220666f72207468656d206e656974686572206d616b6520696e7465726365737369306e20746f206d6520666f7220692077696c206e3074206865617220746865652e2e, '0', '0', 1250602959, 5, '0', 1250893827, '0', 0),
(74, 'ghost,', 14, 8, 0x20417265207468657920747275653f, '0', '0', 1250603151, 1, '0', 1250603151, '0', 0),
(75, 'proverbs 12:18', 13, 8, 0x5468657265206973207468617420737065616b657468206c696b6520746865207069657263696e6773206f6620612073776f7264203a6275742074686520746f6e677565206f66207468652077697365206973206865616c746820202e202e202e202e202e, '0', '0', 1250604173, 0, '0', 1250893675, '0', 0),
(77, 'suggestion u want to add ', 3, 10, 0x616e792073756767657374696f6e27732074686174206d616b652773206f757220736974652067726f772e20, '0', '0', 1250606839, 27, '0', 1250779186, '0', 0),
(91, 'New buddies', 6, 12, 0x5b625d73686f7720746865206e657763306d657273207761797320746f2066696e6420206e657720667269656e6473206865726520696e206d616b65207468656d206665656c2061742068306d655b2f625d, '0', '0', 1250648866, 17, '0', 1250866726, '0', 0),
(140, 'owners logbook', 37, 2, 0x6f776e6572732073676e20757220617474656e64616e6365206865726521, '1', '0', 1250814086, 15, '0', 1250896030, '0', 0),
(79, 'mod''s logbook', 37, 10, 0x2e202e6d6f64657261746f72277320617474656e64616e63652e202e202e, '1', '0', 1250607788, 7, '0', 1250746430, '0', 0),
(136, 'UnitedWap ', 32, 38, 0x5b75726c3d687474703a2f2f756e697465647761702e667269656e64732d7a6f6e652e6e65742f7765625d556e697465645761705b2f75726c5d5468616e6b73206661697468202d7572612d20536f2020686176652061206c6f6f6b20616e64206e6f207370616d6d696e672e20, '0', '0', 1250765358, 19, '0', 1250772066, '0', 0),
(81, 'html codes & java scrptz', 7, 3, 0x5468697320697320666f72207761706d61737465727a20616e64207765626d61737465727a2077686f206e6545647a207468697320736572766963657320666f72206372656174696e6720736974652e, '0', '0', 1250627869, 16, '0', 1250702607, '0', 0),
(82, 'Lutong pinoy', 12, 12, 0x416c61206c6e67206e6b61326d6973206d6761206c7574306e672070696e6f792e2e706f737465206b617520643220616e6f20616e6f2062206d6761207061626f72697430206e696f6e672070616b61696e206e61206c75746f206e672070696e6f792e686d6d2074616c61702074616c6170202e6561742e, '0', '0', 1250638813, 6, '0', 1250726645, '0', 0),
(83, 'Good things', 23, 2, 0x3320676f6f64207468696e6773206f66206265696e672061206d616e21, '0', '0', 1250638885, 17, '0', 1250894245, '0', 0),
(84, 'Tambayan', 12, 12, 0x53616e206261206b6175206d6164616c6173206e6b6174616d626179206b61706167204e616c75326e676b6f74206b6175206f7220756e672067757332206e696f206e6167206973612e2e21, '0', '0', 1250639130, 14, '0', 1250726789, '0', 0),
(85, 'RetriveWap', 6, 12, 0x5b625d486f6e6573746c792c7768617420646f20796f75206665656c2061626f757420726574726976657761703f206f72207768617420646f20796f75207468696e6b2061626f7574206f7572206e65772068306d65215b2f625d, '0', '0', 1250640519, 0, '0', 1250892306, '0', 0),
(86, 'To think about', 6, 12, 0x5b625d77686174207175616c697469657320776f756c642075206d3073742076616c756520696e206120667269656e647320616e64207768793f207768617420716175616c697469657320646f20796f75206e696420746f20776f726b206f6e20746f20626520612062657474657220667269656e64733f5b2f625d20, '0', '0', 1250640733, 8, '0', 1250827132, '0', 0),
(87, 'Moblile fone', 33, 12, 0x5b625d4974206973206d3062696c652066306e652076657279206d347274616e7420746f2075733f2026207768793f3f206e696420757220706f696e74206f6620766965772068657265215b2f625d, '0', '0', 1250641367, 6, '0', 1250696323, '0', 0),
(88, 'Types of m0bile f0ne', 33, 12, 0x5b625d77686174206b696e6473206f72207479706573206f66206d3062696c652066306e6520646f20796f75206c696b65206974206d307374215b2f625d, '0', '0', 1250641550, 5, '0', 1250759428, '0', 0),
(89, 'Can u live wid out music', 19, 12, 0x5b625d63616e20612068756d616e206d30766520306e2077697468206c69666520776974686f7574206c697374656e696e6720746f206d75736963215b2f625d, '0', '0', 1250642469, 13, '0', 1250767732, '0', 0),
(90, 'Music video', 19, 12, 0x5b625d7768617420697320746865206d7573696320636c6970207468617420616d617a6520753f206f7220637265657065642075206f75743f5b2f625d, '0', '0', 1250642766, 7, '0', 1250716762, '0', 0),
(92, 'Are cellph0ne like drugs?', 33, 12, 0x5b625d206974207365656d732061732074686f756768206f75722067656e65726174696f6e206973206c69746572616c6c792072756e20306e20746563686e306c6f6779206973207468652063656c6c7068306e652e20457665727931206861732031206e6f7761646179732e49206b6e77207468617420692068617665206d792066306e6520306e206d6520617420616c6c2074696d65732e49206665656c206c696b65206f75722067656e6572617469306e2068617320616e2061646469637469306e20746f207468652066306e652c73696d696c617220746f2074686174206f66206120647275672e20746865726520617265206576656e206c61777320616761696e73742074616c6b696e67207768696c652064726976696e672063757a2069742068617320626563306d652061207361666574792069737375652e447275677320616e642063656c6c7068306e65206172652062307468207870656e7369766520616e64206164646963746564206861626974732e5b2f625d, '0', '0', 1250649452, 13, '0', 1250758342, '0', 0),
(93, 'ALEXA FANS', 40, 12, 0x5b625d5369676e206865726520662075206172652066616e73206f6620616c6578612061686568652e2e70697a20626162792071205b2f625d, '1', '0', 1250650591, 9, '0', 1250827505, '0', 0),
(94, 'VISION/MISSI0N', 37, 8, 0x497473206265656e2061206c6f74206f6620736974652069206a6f696e20616e642075206f776e65727320616e6420737461666620746f6f202c2049206b6e6f7720686f7720796f7520616c6c206861766520657870657269656e6365642061626f75742077617070696e672c206d616b696e6720667269656e647320616e64206b6e6f77696e672077686f2061726520796f757220667269656e64732e202e202e207765206661696c656420736f206d616e792074696d657320627574207374696c20776520676174686572656420746f676574686572206e6f772069747320524554524956455741502e202e202e20, '1', '1', 1250654410, 28, '0', 1250675178, '0', 0),
(95, 'Retrive Quiz Rules', 37, 12, '', '0', '0', 1250655798, 14, '0', 1250740010, '0', 0),
(96, 'Price for QUIZ(globe n smart l', 37, 12, 0x446e7420706f737420796574, '0', '0', 1250655979, 20, '0', 1250739602, '0', 0),
(97, 'RELA FANS', 38, 12, 0x5b625d7369676e206865726520662075206172652066616e73206f662072656c612061686568652e2e5b2f625d, '1', '0', 1250658920, 15, '0', 1250897274, '0', 0),
(98, 'Wat gwa mu pag ala ka gnagawa?', 41, 13, 0x416c61206c6e672c776c61207865206d67617761206b6561206532206e6b6174616e6761206c6e6721, '0', '0', 1250662725, 12, '0', 1250849345, '0', 0),
(99, 'Anong kaibahan?', 12, 8, 0x616e306e67206b61696268616e206e672070696e307920736120696e7473696b3f, '0', '0', 1250662783, 11, '0', 1250822226, '0', 0),
(100, 'Cno mahal mo?', 41, 13, 0x57656c2c6861686168612e2e2e6c616d206e75206e61206b6e6720636e7520786121, '0', '0', 1250662890, 17, '0', 1250721626, '0', 0),
(101, 'Do you love d person above u?', 41, 13, 0x4b6177206d68616c206d6f206220756e672074616f6e67206e73612074616173206d6f3f686568652e2e, '0', '0', 1250663031, 14, '0', 1250671231, '0', 0),
(102, 'Whose next after u?', 41, 13, 0x436e75206e676120623f6b617720623f, '0', '0', 1250663241, 8, '0', 1250671494, '0', 0),
(103, 'mapaglar0ng tadhana', 22, 8, 0x6e616e693277616c612062206b6175206e206b756e6720636e7520756e67206e61676c75326b7568616e206174206e61676c616c61726f206c616e67206179206b6164616c6173616e206d61676b61326c7579616e27206174206d696e73616e20756e67206d6761203130797273206e206d61672073796f7461206e617532776920786120776c613f, '0', '0', 1250663927, 12, '0', 1250895184, '0', 0),
(104, 'Music to my ears', 41, 13, 0x4d72616d69206b6220616c616d206e61206b616e74613f77656c2c6179756e2e2e2e706f7374206d6f206e676120643221, '0', '0', 1250669858, 4, '0', 1250750729, '0', 0),
(105, 'Ending letter', 41, 13, 0x466f726d20616e7920776f7264207468617420737461727473207769746820746865206c657474657220696e2074686520656e64206f66206120776f72642e20, '0', '0', 1250670981, 10, '0', 1250845192, '0', 0),
(106, 'Pinoy jokes', 41, 13, 0x437573746f6d65723a20416e6f2062206e6d616e20326e6720746f6f74687069636b206e752c2069697361206e61206e67616c616e6720616e672064616c692070616e67206d62616c6921205761697465723a20416c616d206e75207369722c20616e672064616d69206e672067756d616d6974206e79616e206b6175206c6e67206e6b6162616c692120437573746f6d65723a2041797a757a21, '0', '0', 1250671581, 1, '0', 1250671581, '0', 0),
(107, 'Solved d puzzle & wins credits', 38, 13, 0x4d61792061706174206e61206261626f792073612031206b756c756e67616e2c206c756d756e64616720616e6720312e2e696c616e20616e67206e61746972613f20416e6720756e61206d6b616b617361676f7420736120746e756e67206e6120322c206d617920313030637265646974732073612062616e6b20616363742e20706d206e752061712070616720616c616d206e752073676f7421, '0', '0', 1250672839, 19, '0', 1250898034, '0', 0),
(108, 'Invite 5 active members', 30, 8, 0x77696e2077696e2077696e2061736b206e796f207374616620616e75206d70616e616c756e616e20776568616861, '0', '0', 1250673650, 5, '0', 1250673650, '0', 0),
(109, 'religi0n can save?', 15, 8, 0x2073612070616e616e6177206e796f206e616b616b61706167207361766520706120616e672072656c696769306e3f, '0', '0', 1250673921, 10, '0', 1250902547, '0', 0),
(134, 'Country 4 plusses', 8, 11, 0x5b625d47697665206d6520313020636f756e747279206e616d65202620692077696c6c20676976652075203230302063726564697473202e6669742e20504d206d6520696620757220646f6e652e202e202e3174796d206c6e6720706465206d616e616c6f2c20506b69206c616779616e206e67206e756d6265722065782c5b2f625d205b62722f5d312e20555341, '0', '0', 1250758541, 18, '0', 1250892579, '0', 0),
(135, 'Who can save u from d punishme', 13, 34, 0x4a6573757320736169642c20666f72207468657265206973206f6e6520476f642c20616e64206f6e65206d65646961746f72206265747765656e20476f6420616e64206d656e2c20746865206d616e20436872697374204a6573757320312054696d6f74687920323a35, '0', '0', 1250761668, 10, '0', 1250901964, '0', 0),
(111, 'Fist day  0n retrive..', 6, 12, 0x5b625d63306d6d656e7473206f6e2075722031737420646179206f6e20726574726976657761702c77657265206e6572766f7573652c636f6f6c206f72207761746576657220796f75207870657269656e636564206f6e207468652076657279203173742064617920686572652e2e5b2f625d, '0', '0', 1250678551, 11, '0', 1250838907, '0', 0),
(112, 'Lets star here', 6, 12, 0x5b625d6e6577626965206d75737420706f73742068657265207468656972206578706563746174696f6e206f6e207468697320736974652e2e616e6420706f73742074686569722077616e74732e2e5b2f625d20, '0', '0', 1250678704, 0, '0', 1412105519, '0', 0),
(113, 'Ur Country', 11, 12, 0x5b625d75736520746869732074687265616420746f20646973637269626520796f757220636f756e74727920616e6420746f20676574206b6e776e202061626f757420636f756e7472696573206f66206f74686572206d656d626572732e2e5b2f625d, '0', '0', 1250679005, 8, '0', 1250892971, '0', 0),
(114, 'Be Proud of Where you are!', 11, 12, 0x5b625d62652070726f7564206f6620776865726520796f752062656c306e672c706f7374206865726520746865206e696365207468696e672061626f757420796f757220636f756e747279207361792074686520706f73697469766520616e64206e65676174697664206f6620796f757220706c6163652e5b2f625d20, '0', '0', 1250679155, 14, '0', 1250893052, '0', 0),
(115, 'Time travel', 39, 12, 0x5b625d77686174206461797320646f207520656e6a6f79206d30737420616e6420776f756c64206c696b6520746f20676f206261636b20746f20696620706f737369626c653f5b2f625d, '0', '0', 1250679467, 14, '0', 1250749066, '0', 0),
(116, 'ang kwento . . .', 29, 8, 0x677761207461752077656e746f2064756774756e67616e206e796f206168202e202e203320746f203420776f726473202e202e, '0', '0', 1250691735, 14, '0', 1250911816, '0', 0),
(117, 'Comfort room with ur mobile', 33, 10, 0x6861686168612077686f206272696e672773206d6f62696c6520696e20636f6d666f727420726f6f6d3f20, '0', '0', 1250696479, 8, '0', 1250914552, '0', 0),
(118, 'NEW USB brand', 35, 10, 0x4e657720555342206272616e642e202e, '0', '0', 1250696719, 4, '0', 1250696719, '0', 0),
(119, '(perSoNal wapsite)', 7, 5, 0x5b625d6d6761206d656d6265725320414e442073746166462069746f4e672074687265616420504f206e6120693220617920676e7761207120707261206432206e796f206e206c6e6720696c6779206d67612070657253306e616c2073697465206e796f2e2e2e7768496368206d65616e73206e30204f6e452077696c4c206265206372656174696e672061207430706320326e676b306c2073206d67612073697465206e796f2e2e6f7220656c736520627562757261686e206e4d6e20756e672074307063206e20676e7761206e796f2e2e4d414c696e617720796e2061682e2e5b2f625d, '1', '0', 1250723201, 31, '0', 1250925494, '0', 0),
(120, '<retrives drag0n>', 7, 5, 0x443020796f752077616e7420746f20616430707420612064726167306e733f2e2e77656c4c20792064306e2774207520726567497374657220696e205b75726c3d687474703a2f2f647261676f6e61646f70746572732e636f6d5d647261676f6e41444f50544552535b2f75726c5d202064457220617265206d616e79206b6e64206f6620647261676f4e20746f206368306f73652e2e466972537420414e206567472c626563306d6520614348696c642c616e64206d6174557265442064726167306e2e2e, '0', '0', 1250723761, 17, '0', 1250845443, '0', 0),
(121, 'Kathang isip', 41, 13, 0x4d6761206261676179206e61206b617468616e67206973697020617420647061206e6b6b74612073612032326f6e672062756861792e, '0', '0', 1250731398, 10, '0', 1250849638, '0', 0),
(122, 'Mahal kTa prO maNhid kaH.', 40, 10, 0x686156652075206576657220657870657269656e636520746861743f2075206c6f766520736f6d654f6e65206275742068652f73686520646f65736e27742066654c20775420752066654c2e202e62726f6b656e2e, '0', '0', 1250733468, 20, '0', 1250878576, '0', 0),
(123, 'ang seLos dW. .', 40, 10, 0x616e672073654c6f73206b6b616d62614c206e672070676d6d48614c2e202e6b756e6720774c616e672073654c6f732e202e686e64206d4f206d4c4c6d616e206e61206d6148614c614761206b61207361206b4e79412e202e202e70724f206d64616d69206e61676b486977614c6179206448694c2073612073656c6f732e202e626b54206e6761206b59613f203f203f20, '0', '0', 1250733809, 16, '0', 1250925791, '0', 0),
(124, 'gaAnO kasakiT pagnwaLan', 40, 10, 0x3f203f2048656865, '0', '0', 1250733956, 12, '0', 1250944213, '0', 0),
(125, 'wLang kWenTa kAh!', 40, 10, 0x6d674120774c61276e67206b77456e54612e202e202e6e61206c616765206e6169697369702e202e202e, '0', '0', 1250734207, 1, '0', 1250734207, '0', 0),
(126, 'Retrivewap toplist', 37, 8, 0x5b75726c3d687474703a2f2f726574726976657761702e776170746f702e6d655d524554524956455741502e574150544f502e4d45205b2f75726c5d205b62722f5d20776c616e6720336b7a2079616e206d6761207467612070696e6173206e207374616620747279206e796f206c61676179207361207369746520696e666f20746f207769746820336b7a20706172612068656c70206f7572207369746520746f302e202e202e, '0', '0', 1250734331, 13, '0', 1250734674, '0', 0),
(127, 'RETRIVEWAP IN SURFWAP', 37, 8, 0x706c732068656c7020746f20626f617374206f7572207369746520696e672073757266776120746f20626563306d6520746f702073697465205b75726c3d687474703a2f2f737572667761702e636f6d2f3f736974653d726574726976657761702e636f2e7a615d20434c49434b204845524520464f522048454c505b2f75726c5d, '0', '0', 1250735205, 12, '0', 1250735305, '0', 0),
(128, 'QUIZMASTER', 37, 12, 0x5b625d4f5552207175697a6d617374657220434845434b20414e44205348414d49455b2f625d, '0', '1', 1250736269, 7, '0', 1250736269, '0', 0),
(129, 'RE-PHRASE ', 29, 12, 0x5b625d7965732e2e796573207761707065727320697473206a757320616e6f74686572206c696c2066756e2c69747320692077696c6c206265206372656174696e672061206a756d626c656420736574206f66207068726173652f73656e74656e63652073687566666c65642069742c207468656e2075206d75737420617272616e676520697420696e206f7264657220746f2067657420746865206330727265637420616e642070726f7065722073656e74656e63652e54686520776f726473206d75737420626520696e206f726465722e204920686f7065207520676574207761742069206d65616e20776170706572722e2e706c61792e5b2f625d, '0', '0', 1250742198, 18, '0', 1250899265, '0', 0),
(130, 'truth or dare', 28, 8, 0x6c617275207461796f20756e6720756e616e67206d6167706f7374206d61736269206b756e67207472757468206f72206461726520622067757332206e79612c20756e672073756e3064206e206d616720706f737420756e20616e67206d6167207061676177612073612067757332206e7961206174206d616773762064696e2071207472757468206f7220646172652062207861202e202e2067756c6f20622062737420756e206e6120756e202e202e202e, '0', '0', 1250742425, 0, '0', 1250828582, '0', 0),
(151, 'RETRIVEWAP LINKS AND TOPLIST', 5, 8, 0x5b625d706c732e20616c6c20737461666620616e64206d656d626572732068656c7020757320746f2067726f7720746873207369746520746f2074686520746f702e202e5b2f625d, '0', '0', 1250842550, 0, '0', 1250933321, '0', 0),
(138, 'Werewolf', 18, 38, 0x5768617420646f2075207468696e6b206f66662077657265776f6c6620646f2074686579207265616c6c79206c697665207769746820757320617320612068756d616e20616e64207475726e20696e20746f206f6e65207768656e206974732066756c6c206d6f6f6e, '0', '0', 1250808144, 0, '0', 1250809904, '0', 0),
(139, 'Sex your first time', 25, 38, 0x486f772077617320796f75722066697273742074696d65207365782074656c6c2075732072656d656d62657220776520616c6c206164756c747320686572652e, '0', '0', 1250810224, 2, '0', 1250810224, '0', 0),
(141, 'New logo', 1, 2, 0x7765206e656564206c6f676f20666f7220746865207369746520706c73206d616b6520616e6420706f7374206974206865726520736f2077652063616e2074656c6c20726964657220746f2061646420697420696e206f75722072616e646f6d206c6f676f20696e206d61696e206d656e752e205468616e6b677321, '0', '0', 1250817668, 0, '0', 1250819025, '0', 0),
(142, 'Letting go vs Leaving', 22, 12, 0x5b625d20646e742061736b207768792069206d6164652074686973207468726561642e2e627574206973207468657265206120646966666572656e6365206265747765656e206c657474696e6720676f2026206c656176696e673f204a55532055522054484f554748545320414e44204f50454e494f4e20504c5a2e2e5b2f625d, '0', '0', 1250827533, 4, '0', 1250922357, '0', 0),
(143, 'How deep is ur love', 22, 12, 0x5b625d497473206e3074206a75737420612073306e672e2e77686174206b696e642061206c6f7665722061726520796f753f20486f7720646f20796f75206c6f766520736f6d65626f64793f20534841524520534f4d452054484f554748545320414e4420455850455249454e43455b2f625d, '0', '0', 1250827751, 6, '0', 1250894752, '0', 0),
(144, 'Would you?', 22, 12, 0x5b625d776f756c6420796f752064696520666f7220746865206f6e652075206c6f76653f5b2f625d, '0', '0', 1250827884, 2, '0', 1250922416, '0', 0),
(145, 'I LOVE YOU but..', 22, 12, 0x5b625d496d206e307420696e6c6f7565207769746820796f752e207768617420646f65732074686174207265616c6c79206d65616e3f20646f6573206974206d65616e20796f75206d65616e2074686520776f726c6420746f206d65206173206120667269656e642062757420617320612077306d616e20796f75276c6c206a757374206e65766572206d6561737572652075703f2077687920776f756c6420796f75206576656e2074656c6c20736f6d653120746861743f20546f206275792074696d653f20486f70696e6720736865276c6c2066616c6c2066307220697420616e6420707574206f75743f2069206865617264207468617420776f72647320326461792e5b2f625d, '0', '0', 1250828186, 13, '0', 1250922595, '0', 0),
(146, 'Have I told U lately I LOVE U?', 22, 12, 0x5b625d49204c4f564520594f5520486f77206d616e792074696d657320646f20796f752073617920746865736520746872656520776f7264733f65766572796461793f206576657279207765656b3f206576657279206f74686572207765656b3f6576657279206d306e74683f20657665727920796561723f204f52204e455645523f20616e6420746f2077686f6d20646f20796f7520736179207468656d3f20757273656c662720757220706172656e74732c757220667269656e64732c757220706172746e65723f204f52204e30204f4e453f206c657473206d616b6520697420686162697420616e6420736179696e67207468656d206576656e20746f206120737472616e676572732e2e2e2049204c4f564520594f555b2f625d, '0', '0', 1250828853, 17, '0', 1250922163, '0', 0),
(147, 'Free trip=>', 13, 3, 0x4d6168616c206e61206b6169626967616e2c3c62722f3e5b695d4e616973206b6974616e6720616e7961796168616e207570616e67206d616b617061676c616b626179206b61206e612057414c414e472042415941442e416e67206174696e67207061747574756e677568616e2061792073616479616e67206e6170616b6167616e64612c616e7570612774206469206b6179616e67206973616c61726177616e2e416e6720616b6c617420756b6f6c207361207061676c616c616b626179206e612069746f206179207461686173616e67206e6167736173616269206e6120646f6f6e206e616e696e69726168616e20616e67206d676120616e6768656c2e5061726120696b6177206179206d616b6173616d61207361207061676c616c616b626179206e612069746f2c6b696e616b61696c616e67616e67206d61676b61726f6f6e206b61206e6720657370657379616c206e612070617361706f7274652e5b2f695d3c62723e5b695d416e67207061747574756e677568616e206e6174696e206179204c616e6769742e416e6720616b6c617420756b6f6c207361207061676c616c616b626179206e612069746f20617920616e67204269626c69612e4d61626162617361206e6174696e2073612050616861796167204b61706974756c6f20323120617420323220616e675b2f695d3e, '0', '0', 1250834321, 15, '0', 1250847479, '0', 0),
(148, 'Which do u believe?', 22, 12, 0x5b625d776869636820646f20796f752062656c696576652e2e6973206c6f766520646563697369306e206f72206973206c6f766520616e20656d3074696f6e3f204946204c4f5645206973206120646563697369306e207468656e20776174657665722063306d657320796f7572207761792077656e207527726520696e20612072656c617469306e7368697020796f75206d616b652074686174207468726f75676820746869636b20616e64207468696e2e204946204c4f564520697320616e207468656e20796f752063616e2066616c6c20696e20616e64206f7574206f66206c6f766520636175736520656d6f7469306e732063306d657320616e6420676f2074686572652773206e6f2073746162696c69747920696e2072656c617469306e736869702e574f554c4420424520494e544552455354454420544f20484541524420574841542055205448494e4b5b2f625d, '0', '0', 1250834425, 11, '0', 1250922949, '0', 0),
(149, 'Can u forgive & forget?', 22, 12, 0x5b625d496620757220706172746e6572207761732074656d7074656420746f2068617665207365782077697468206f74686572206d616e206f7220776f6d616e20616e6420796f75277265206c6561726e65642061626f75742069742e77696c6c2075207374696c6c20616363657074206865722f68696d206966207368652f68652063306d6573206261636b20746f6f20616e642073617920736f7272793f204c4554204d45204845415254204954204652304d20594f5520475559535b2f625d, '0', '0', 1250834787, 7, '0', 1250922808, '0', 0),
(150, 'Wen can u say LOVE is n0t fair', 22, 12, 0x5b625d2069206b6e7720752068616420736f6d652062616420657870657269656e63652061626f7574206c6f76652062342e446964207520657665722073617920746f20796f757273656c66206c6f7665206973206e307420666169723f2077687920776861742068617070656e643f5b2f625d, '0', '0', 1250834988, 0, '0', 1250915948, '0', 0),
(153, 'rider', 6, 51, 0x696d2061206e65776269652068657265206c6f6c, '0', '0', 1250868055, 16, '0', 1250869284, '0', 0),
(154, 'Ui paxaway kaba?', 38, 12, 0x5b625d77656c6c2c206b6e672070617861776179206b6120706f737465206b612064322c617420706f7374206d30206b6e6720616e306e67206d67612073616c697461206e6720706178617761795b2f625d, '0', '0', 1250898044, 5, '0', 1250917732, '0', 0),
(155, 'Cno si ako cno si ikaw', 38, 12, 0x5b625d636e6f206b613f202e686d7a2e20636e6f20616b6f3f5b2f625d, '0', '0', 1250898349, 2, '0', 1250898349, '0', 0),
(156, 'HULAAN MO', 38, 12, 0x5b625d68756c61616e206d30206b6e6720616e6f20676e6167617761206e67207375326e6f64206e6120706f737465722e2e5b2f625d, '0', '0', 1250898631, 0, '0', 1250930061, '0', 0),
(157, 'BROWSER SETTING', 7, 59, 0x666f72206f6d342e302c206f6d342e312c206f6d342e322c206f6d342e33206f6d342e342049503a3139352e3138392e3134322e31333220504f52543a38302041504e3a687474702e676c6f62652e636f6d2e7068, '0', '0', 1250908056, 11, '0', 1250922744, '0', 0),
(158, 'Pinoy Game ka n ba?', 38, 12, 0x5b625d6f6b206761776120616b6f20717565737469306e2c616e67207375326e6f64206e6120706f73746572207361677574696e206e696120616e6720512c74617a207061676b617461706f73206267617920736120512070617261207361207375326e6f64206e6120706f7374657220686f7065207520676574207761742069206d65616e206865726573207468652031737420512c5b636c723d626c75655d6d6167616e6461206b6162613f5b2f636c725d5b2f625d, '0', '0', 1250909441, 5, '0', 1250911565, '0', 0),
(159, 'Shakira vs beyonce', 19, 12, 0x5b625d77686f73207468652062657374207368616b697261206f72206265796f6e63655b2f625d, '0', '0', 1250910880, 0, '0', 1250910880, '0', 0),
(160, 'Artist u wanna meet', 19, 12, 0x5b625d6c697374207468652061727469737420752077616e6e61206d6565742062342075206c656176652074686973206c6966655b2f625d, '0', '0', 1250911540, 0, '0', 1250911540, '0', 0),
(161, 'Ur favorite instruments', 19, 12, 0x5b625d776861742773207572206661766f7269746520696e737472756d656e743f206c656d6d65206b6e7720677579735b2f625d, '0', '0', 1250911663, 2, '0', 1250911691, '0', 0),
(162, 'THE GIFT to my nanai HAPY Bday', 40, 10, 0x5468697320734f6e67206973206464636174656420666f722075206e616e616920616d7920612e6b2e61207368616d69652e202e7468697320697320206a75737420612073696d704c65206769667420692063616e206776452e202e6120734f6e672066724f6d206d792068456172542e202e68656172742e202e6d757369632e206d616573747261206861686168616861202e726f6c6c2e, '0', '0', 1250917833, 14, '0', 1250927244, '0', 0),
(163, 'bible short verse>)', 13, 8, 0x5b625d5b636c723d7265645d504c532e2041444420594f55522053484f555254204641564f5552495445204249424c45205645525345204845524520414e442049542057494c2042452041444445442052414e44304d4c5920494e544f204d41494e50414745205448414e4b20594f5520534f204d554348202d727766616d696c795b2f625d5b2f636c725d, '1', '0', 1250920060, 0, '0', 1250922229, '0', 0),
(164, 'Buhay sa pinas vs Buhay sa abr', 38, 12, 0x5b625d776167206b612074616e306e6720626b382071206761776120326e6720746872656164206b6320677573322071206d616c616d616e20616e67206b6169626168616e206e672062756861792073612070696e6173206174206275686179206162726f61642e2e776f772069207468696e6b20697320766572792078636974696e6720206d6167646462617465207461752064322c736f2067757973207572207669657720697320676c61646c7920617761697465645b2f625d, '0', '0', 1250923620, 2, '0', 1250923620, '0', 0),
(165, '>WIN 5000+s come quick<', 40, 10, 0x437265617465203130206b6e6f776c65646761626c6520746f706963277320616e642077696e2035303030202e7368616b652e, '0', '0', 1250924533, 4, '0', 1250924533, '0', 0),
(166, 'HOW CAN A CHRISTIAN GROW?', 40, 10, 0x616e797468696e672075206b6e4f7720736861726520697420686572652e202e706f702e202e6161612e, '0', '0', 1250943166, 0, '0', 1250943273, '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_uploads`
--

CREATE TABLE IF NOT EXISTS `ibwf_uploads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL DEFAULT '0',
  `filename` text NOT NULL,
  `date` varchar(100) NOT NULL DEFAULT '',
  `filesize` text NOT NULL,
  `uip` varchar(20) NOT NULL DEFAULT '',
  `accepted` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_usergallery`
--

CREATE TABLE IF NOT EXISTS `ibwf_usergallery` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `uid` int(100) NOT NULL DEFAULT '0',
  `imageurl` varchar(100) NOT NULL DEFAULT '',
  `sex` char(1) NOT NULL DEFAULT '',
  `time` int(100) NOT NULL DEFAULT '0',
  `descript` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `ibwf_usergallery`
--

INSERT INTO `ibwf_usergallery` (`id`, `uid`, `imageurl`, `sex`, `time`, `descript`) VALUES
(2, 5, 'usergallery/Me.gif', 'M', 1250551112, ''),
(3, 8, 'usergallery/LGIM0017.jpg', 'F', 1250559497, ''),
(4, 8, 'usergallery/LGIM0018.jpg', 'F', 1250559643, ''),
(5, 3, 'usergallery/Kurt_.jpg', 'M', 1250560952, ''),
(7, 14, 'usergallery/adrian.jpg', 'M', 1250575924, ''),
(10, 18, 'usergallery/Image054.jpg', 'F', 1250595636, ''),
(11, 3, 'usergallery/Kurt3.jpg', 'M', 1250599563, ''),
(34, 11, 'usergallery/Accretiaemblem.jpg', 'M', 1250852848, ''),
(33, 11, 'usergallery/Belatoemblem.jpg', 'M', 1250852670, ''),
(32, 11, 'usergallery/Coraemblem.jpg', 'M', 1250840779, ''),
(18, 4, 'usergallery/o_wg_mbi2gla.jpg', 'F', 1250716540, ''),
(19, 2, 'usergallery/RET1.gif', 'F', 1250724405, ''),
(20, 2, 'usergallery/RET2.gif', 'F', 1250724425, ''),
(21, 2, 'usergallery/RET3.gif', 'F', 1250724450, ''),
(22, 2, 'usergallery/RET4.gif', 'F', 1250724474, ''),
(23, 2, 'usergallery/RET5.gif', 'F', 1250724492, ''),
(24, 34, 'usergallery/Dr054.jpg', 'M', 1250763174, ''),
(25, 1, 'usergallery/17.jpg', 'M', 1250792329, ''),
(26, 2, 'usergallery/R_1.jpg', 'F', 1250802724, ''),
(27, 34, 'usergallery/Nightmare.jpg', 'M', 1250812841, ''),
(28, 19, 'usergallery/Jhun03.jpg', 'M', 1250829211, ''),
(29, 19, 'usergallery/Image00.jpg', 'M', 1250829287, ''),
(30, 19, 'usergallery/1_498807160m.jpg', 'M', 1250829488, ''),
(31, 27, 'usergallery/dlan0r013.jpg', 'F', 1250832371, ''),
(35, 2, 'usergallery/Ad.jpg', 'F', 1250930676, ''),
(36, 70, 'usergallery/A01.jpg', 'F', 1250933309, 'ghiel'),
(37, 70, 'usergallery/A02.jpg', 'F', 1250933369, 'ghiel'),
(38, 70, 'usergallery/A03.jpg', 'F', 1250933418, ''),
(39, 70, 'usergallery/A04.jpg', 'F', 1250933461, ''),
(40, 70, 'usergallery/A05.jpg', 'F', 1250933496, ''),
(41, 70, 'usergallery/Picture_257.jpg', 'F', 1250936031, ''),
(42, 61, 'usergallery/Taekwondo_2.jpg', 'M', 1250938485, ''),
(43, 70, 'usergallery/Picture_098.jpg', 'F', 1250939247, ''),
(44, 49, 'usergallery/1_3797815_4912_t.jpg', 'M', 1250940024, ''),
(45, 30, 'usergallery/content_management010.jpeg', 'M', 1250941184, ''),
(46, 0, 'usergallery/Chrysanthemum.jpg', '', 1409908548, ''),
(49, 78, 'usergallery/Koala_2.jpg', 'M', 1409944226, ''),
(50, 78, 'usergallery/Chrysanthemum_1.jpg', 'M', 1409945174, ''),
(51, 77, 'usergallery/SM_PV_CASH.jpg', '', 1411152437, ''),
(52, 77, 'usergallery/SM_PV_CASH_1.jpg', '', 1411152443, ''),
(53, 78, 'usergallery/SM_PV_damith.jpg', '', 1411230063, ''),
(54, 78, 'usergallery/SM_PV_damith_1.jpg', '', 1411230175, ''),
(55, 78, 'usergallery/SM_PV_damith_2.jpg', '', 1411230199, ''),
(56, 78, 'usergallery/SM_PV_damith_3.jpg', '', 1411230956, '');

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_users`
--

CREATE TABLE IF NOT EXISTS `ibwf_users` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL DEFAULT '',
  `pass` varchar(60) NOT NULL DEFAULT '',
  `birthday` varchar(50) NOT NULL DEFAULT '',
  `sex` char(1) NOT NULL DEFAULT '',
  `location` varchar(100) NOT NULL DEFAULT '',
  `perm` char(1) NOT NULL DEFAULT '0',
  `posts` int(100) NOT NULL DEFAULT '100',
  `signature` varchar(100) NOT NULL DEFAULT '',
  `avatar` varchar(100) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `browserm` varchar(250) NOT NULL DEFAULT '',
  `isp` varchar(50) NOT NULL,
  `ipadd` varchar(30) NOT NULL DEFAULT '',
  `lastact` int(100) NOT NULL DEFAULT '0',
  `regdate` int(100) NOT NULL DEFAULT '0',
  `chmsgs` int(100) NOT NULL DEFAULT '0',
  `chmood` int(100) NOT NULL DEFAULT '0',
  `shield` char(1) NOT NULL DEFAULT '0',
  `gplus` int(100) NOT NULL DEFAULT '0',
  `budmsg` varchar(100) NOT NULL DEFAULT '',
  `lastpnreas` varchar(100) NOT NULL DEFAULT '',
  `lastplreas` varchar(100) NOT NULL DEFAULT '',
  `shouts` int(100) NOT NULL DEFAULT '0',
  `pollid` int(100) NOT NULL DEFAULT '0',
  `rbcid` varchar(255) NOT NULL DEFAULT '',
  `hvia` char(1) NOT NULL DEFAULT '1',
  `lastvst` int(100) NOT NULL DEFAULT '0',
  `lastseen` varchar(250) NOT NULL DEFAULT '',
  `views` int(100) NOT NULL DEFAULT '1',
  `lastdet` varchar(250) NOT NULL DEFAULT '',
  `imgon` char(1) NOT NULL DEFAULT '1',
  `specialid` int(100) NOT NULL DEFAULT '0',
  `showtime` int(100) NOT NULL DEFAULT '1',
  `showshout` int(100) NOT NULL DEFAULT '1',
  `showshortkey` int(100) NOT NULL DEFAULT '1',
  `themeid` int(100) NOT NULL DEFAULT '1',
  `lang` int(100) NOT NULL DEFAULT '1',
  `shopssid` int(100) NOT NULL DEFAULT '0',
  `site` varchar(50) NOT NULL DEFAULT '',
  `plusses` int(100) NOT NULL DEFAULT '100',
  `bank` int(100) NOT NULL DEFAULT '1',
  `validated` char(1) NOT NULL DEFAULT '0',
  `battlep` int(100) NOT NULL DEFAULT '0',
  `mood` char(1) NOT NULL DEFAULT '',
  `showicon` int(100) NOT NULL DEFAULT '0',
  `automsgs` char(1) NOT NULL DEFAULT '1',
  `fmsg` varchar(50) NOT NULL,
  `ficon` varchar(50) NOT NULL,
  `pmood` varchar(100) NOT NULL,
  `setmood` varchar(100) NOT NULL,
  `activate` int(1) NOT NULL DEFAULT '0',
  `hit` int(10) NOT NULL DEFAULT '0',
  `profileview` int(10) NOT NULL DEFAULT '0',
  `hidden` char(1) NOT NULL DEFAULT '0',
  `popmsg` char(1) NOT NULL DEFAULT '1',
  `status` varchar(100) NOT NULL,
  `theme` varchar(100) NOT NULL,
  `viewpro` int(11) NOT NULL DEFAULT '0',
  `ref` int(50) NOT NULL DEFAULT '0',
  `tottimeonl` int(50) NOT NULL,
  `pass2` varchar(50) NOT NULL,
  `coin` int(11) NOT NULL,
  `staff` int(11) NOT NULL DEFAULT '0',
  `cc` varchar(2) NOT NULL,
  `mobile` int(10) NOT NULL,
  `lovegiven` int(50) NOT NULL,
  `love` int(50) NOT NULL,
  `art` int(11) NOT NULL,
  `ghost` int(11) NOT NULL,
  `invisible` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=82 ;

--
-- Dumping data for table `ibwf_users`
--

INSERT INTO `ibwf_users` (`id`, `name`, `pass`, `birthday`, `sex`, `location`, `perm`, `posts`, `signature`, `avatar`, `email`, `browserm`, `isp`, `ipadd`, `lastact`, `regdate`, `chmsgs`, `chmood`, `shield`, `gplus`, `budmsg`, `lastpnreas`, `lastplreas`, `shouts`, `pollid`, `rbcid`, `hvia`, `lastvst`, `lastseen`, `views`, `lastdet`, `imgon`, `specialid`, `showtime`, `showshout`, `showshortkey`, `themeid`, `lang`, `shopssid`, `site`, `plusses`, `bank`, `validated`, `battlep`, `mood`, `showicon`, `automsgs`, `fmsg`, `ficon`, `pmood`, `setmood`, `activate`, `hit`, `profileview`, `hidden`, `popmsg`, `status`, `theme`, `viewpro`, `ref`, `tottimeonl`, `pass2`, `coin`, `staff`, `cc`, `mobile`, `lovegiven`, `love`, `art`, `ghost`, `invisible`) VALUES
(1, 'admin', '9644a858c8d157ba6e5bb59cfa775062', '1989-02-27', 'M', 'south africa', '4', 3, 'just ask me', '', 'jjduplessis89@gmail.com', 'Opera', '', '10.1.106.60', 1250940529, 1250537755, 549, 0, '0', 899, '', '', 'welcom', 16, 0, '', '1', 1250938320, 'Main Page - xHTML', 105, 'index.php?action=main', '1', 0, 1, 1, 1, 11, 1, 0, '', 8691, 1072, '1', 0, 'e', 0, '1', 'Hello!!!', 'rep/3.gif', '../profilemoods/tired2.gif', 'hello', 0, 1, 0, '0', '1', '', 'hell.css', 0, 0, 0, '', 1, 0, '', 0, 0, 0, 0, 0, 0),
(2, 'faith', '3989da4eb832867da1eb82598a780c37', '1989-04-14', 'F', 'EARTH', '4', 35, '', 'usergallery/RET4.gif', '', 'Mozilla', '', '203.142.100.17', 1250944179, 1250540947, 244, 8, '0', 0, '', '', 'Welcome', 75, 4, '', '1', 1250940720, 'Online List - xHTML', 165, 'index.php?action=online', '1', 0, 1, 1, 1, 11, 1, 0, '', 31946, 3216403, '1', 0, 'b', 1, '1', '', '', '', '', 0, 1, 0, '0', '1', '', 'icegirl.css', 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0),
(3, 'kurlaine', 'd2cc1c68e7a891e497a745bb91566807', '1990-03-24', 'M', 'Ph-pampanga', '4', 44, '', 'http://m.friendster.com@kurlainewap.wen.ru/Upload.jpg', '', 'Nokia5200', '', '203.177.91.132', 1250941612, 1250545649, 292, 0, '1', 0, '', '', 'Staf', 14, 0, '', '1', 1250939422, 'Main Page - xHTML', 64, 'index.php?action=main', '1', 0, 1, 1, 1, 1, 1, 0, '', 98975538, 1072135, '1', 0, 'e', 1, '1', '', '', '', '', 0, 1, 0, '0', '1', '', '', 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0),
(40, 'xbobby559x', '0d343c0f0ca763f983c8042350059f56', '11-12-76', 'M', 'Fresno ca', '0', 100, '', '', '', 'LGE-VX8500', '', '63.214.229.123', 1250822357, 1250820269, 1, 0, '0', 0, '', '', '', 0, 0, '', '0', 0, 'Guestbook', 10, '', '1', 0, 1, 1, 1, 1, 1, 0, '', 101, 1, '1', 0, 's', 0, '1', '1', '', '', '', 0, 0, 0, '0', '1', '', '', 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0),
(4, 'shaillie_jel', '5fc8a1ed44de6878f82cec2cda4fc06e', '1994-10-26', 'F', 'Philippines pampanga', '0', 23, '', 'avatars/08080607.gif', '', 'Opera', '', '203.177.91.161', 1250895652, 1250548101, 0, 8, '0', 0, '', 'Banned: MULTIPLE I.D', 'update', 0, 0, '', '1', 1250768117, 'User Inbox', 17, '', '1', 0, 1, 1, 1, 1, 1, 0, '', 123, 0, '1', 0, 'h', 0, '1', '', '', '', '', 0, 1, 0, '0', '1', '', '', 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0),
(5, 'piece', '204b5003e97662ca4258ab593ec0360b', '1989-09-14', 'M', 'Ph', '3', 21, 'http://piece.wen9.net visit it tnx', 'usergallery/Me.gif', 'sydel@yuurok.com', 'Opera', '', '203.177.91.135', 1250942955, 1250549019, 183, 0, '0', 0, 'http://piece.wen9.net visit it tnx..', '', 'F0r sh0uTnesS hehe', 19, 0, '', '1', 1250920943, 'Main Page - xHTML', 35, 'index.php?action=main', '1', 0, 1, 1, 1, 13, 1, 0, '', 1125, 0, '1', 0, 'f', 1, '1', '', '', '', '', 0, 1, 0, '0', '1', '', '', 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0),
(6, 'asarna', '8d6bac0e176f1cafb12496de87c639df', '--', 'M', '', '0', 2, '', '', '', 'Opera', '', '209.139.208.236', 1250747266, 1250550223, 28, 0, '0', 0, '', '', '', 0, 0, '', '1', 1250729944, 'Chatrooms', 7, '', '1', 0, 1, 1, 1, 1, 1, 0, '', 25, 0, '1', 0, '', 0, '1', '', '', '', '', 0, 0, 0, '0', '1', '', '', 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0),
(12, 'shamie', '05a3699379b0a4f50cc0bb28e888ba52', '1982-08-22--', 'F', 'INSIDE UR HEART', '2', 208, '', 'http://retrivewap.co.za/usergallery/Shamie4.jpg', 'amy85@ovi.com', 'Opera', '', '119.234.0.13', 1250935564, 1250566794, 358, 16, '1', 0, '', '', 'Update', 53, 3, '', '1', 1250935342, 'xHTML-Viewing Topic- ', 149, 'index.php?action=viewtpc&amp;page=&amp;tid=', '1', 0, 1, 1, 1, 1, 1, 0, '+6593960937', 20898, 5897, '1', 0, 'h', 0, '1', '', '', '', '', 0, 1, 0, '0', '1', '', 'barbie.css', 0, 0, 0, '', 0, 0, '', 0, 0, 1, 0, 0, 0),
(9, 'sydel14', '92cdc189029c6c2a59704848e3b4cd33', '1989-09-13', 'M', 'Ph', '0', 0, '', '', '', 'Opera', '', '203.177.91.133', 1250559458, 1250553835, 40, 0, '0', 0, '', '', '', 0, 0, '', '1', 1250554939, 'Chatrooms', 2, '', '1', 0, 1, 1, 1, 1, 1, 0, '', 37, 0, '1', 0, '', 0, '1', '', '', '', '', 0, 0, 0, '0', '1', '', '', 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0),
(7, 'skyblazer03', '9a17ccf101f2b6dd7697135a1146bc86', '1996-03-02', 'M', 'Urdaneta City,Pangasinan,PHILIPPINES', '0', 0, '', '', '', 'Nokia7360', '', '203.177.91.195', 1250683798, 1250550337, 6, 0, '0', 0, '', '', '', 0, 0, '', '1', 1250599400, 'Chatrooms', 5, '', '1', 0, 1, 1, 1, 1, 0, 0, '', 0, 0, '1', 0, '', 0, '1', '', '', '', '', 0, 0, 0, '0', '1', '', '', 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0),
(8, 'rela', 'bb8e2dab3166b2bfd98281adffb7522e', '1990-02-05', 'F', 'hong kong', '0', 276, 'sometimes i tend to be normal but its getting boring . . so i get bck the real me >PASAWAY', 'usergallery/LGIM0018.jpg', 'rhlaniere5@gmail.com', 'Opera', '', '123.136.11.58', 1250944010, 1250551461, 480, 9, '0', 0, '[club=2] join my club[/club]', '', 'Re-phrase game', 157, 1, '', '1', 1250928577, 'Online List - xHTML', 201, 'index.php?action=online', '1', 0, 1, 1, 1, 5, 1, 0, '+85251309842', 1502, 2138911, '1', 0, 's', 1, '1', '', '', '../profilemoods/tired2.gif', '', 0, 1, 0, '0', '1', '', 'verde.css', 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0),
(10, 'alexa', '3a7e4d81ad0558aa378400dc7609384f', '1989-06-18', 'F', 'PH-PHILIPPINES', '0', 155, '[i]wHy u OpEn my prOfiLe? u OpEn thz nOw ur herby sentence to add me 2 yar buddy list .gun.[/i]', '', 'juna_gilton18@yahoo.com', 'Nokia7360', '', '83.170.93.54', 1250944241, 1250558071, 740, 19, '1', 0, '', '', 'update', 106, 5, '', '1', 1250929989, 'Reading PM from\nshamie', 206, '', '1', 0, 1, 1, 1, 1, 1, 0, '+639292826194', 827, 2142126, '1', 0, '0', 1, '1', 'if u hated alexa how much i. . .', '', '', '', 0, 1, 0, '0', '1', '', '', 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0),
(11, '-checkmate-', '93cb786fcd46a443a808bd4449bca2e8', '0001-01-19', 'M', '-Novus Sector Philippines-', '2', 63, '.[br/][b][clr=green]If You Know How To KILL !! You Must Learn How To DIE !![/clr][/b][br/].', 'http://retrivewap.co.za/usergallery/Accretiaemblem.jpg', 'hackmon3x@yahoo.com', 'Nokia6070', '', '83.170.93.54', 1250944220, 1250562146, 27, 0, '0', 0, '', '', 'Welcome', 62, 0, '', '1', 1250936199, 'Main Page - xHTML', 130, 'index.php?action=main', '1', 0, 1, 1, 0, 1, 1, 0, '09219689102', 779, 0, '1', 0, 's', 0, '1', 'Plz, Dont Follow Me ---IM LOST---', '', '../profilemoods/2crazy.gif', '', 0, 1, 0, '0', '1', '', 'hell.css', 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0),
(19, 'skybladder', 'fcd8ce74755a0c1d53e1c4750251b22c', '1991-06-14', 'M', 'Ph-manila', '1', 2, '', '', '', 'Nokia6220', '', '62.1.204.70', 1250937848, 1250584966, 43, 0, '0', 0, '', '', 'update', 15, 0, '', '1', 1250909946, 'Chat Menu - xHTML', 30, 'index.php?action=chat', '1', 0, 1, 1, 1, 1, 1, 0, '', 120, 63, '1', 0, '', 0, '1', '', '', '', '', 0, 1, 0, '0', '1', '', '', 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0),
(13, 'mark_', '75156e9e7c4b737b76e9a48f4ed2ae8b', '--', 'M', 'St.Elmo', '1', 52, '', 'avatars/08080640.gif', '', 'Nokia7210Supernova', '', '203.177.91.132', 1250928821, 1250569290, 134, 0, '1', 0, '', '', 'Mods updated', 25, 0, '', '1', 1250918665, 'Chatrooms', 68, '', '1', 0, 1, 1, 1, 6, 1, 0, '', 1897969, 107214, '1', 0, '', 1, '1', '', '', '', '', 0, 1, 0, '0', '1', '', '', 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0),
(14, 'brand_new_s-l-n', '37b43a655dec0e3504142003fce04a07', '1982-09-18', 'M', 'Philippines', '0', 51, 'N.A.S.L. >>-> Adrian, 26, m, San Mateo Rizal', 'usergallery/adrian.jpg', '', 'Nokia3220', '', '203.177.91.131', 1250944242, 1250569605, 369, 0, '0', 0, '', '', '', 2, 0, '', '0', 1250933382, 'Chatrooms', 125, '', '1', 0, 1, 1, 1, 11, 1, 0, '', 391, 0, '1', 0, 's', 1, '1', '', '', '', '', 0, 1, 0, '0', '1', '', '', 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0),
(16, 'redbutterfly', 'd97b35eecf46549c7ab9b823def4c5c6', '1991-06-01', 'F', 'Flower (pissu...i miss you like crazy)', '0', 42, '2ctch a btrfly dnt run aftr 8 nstd 0pen ur palm&8 wl land dwn dr f he nd a rest-dts d way 2 find luv', '', 'Avalicious_01@yahoo.com', 'Nokia5070', '', '66.90.65.76', 1250709921, 1250570694, 101, 0, '0', 0, '', '', 'Wants to create club', 20, 0, '', '1', 1250702532, 'Shouting', 39, '', '1', 0, 1, 1, 1, 1, 1, 0, '', 159, 20, '1', 0, '0', 0, '1', '', '', '', '', 0, 0, 0, '0', '1', '', '', 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0),
(15, 'wintersnow', '57bb54e8babc36309ad86daa618c849f', '--', 'F', 'heart n soul', '0', 97, 'me,myself,and i', 'http://fsa.zedge.net/content/9/5/0/6/1-1740529-9506-t.jpg', '', 'Opera', '', '121.1.18.241', 1250944235, 1250570334, 281, 11, '0', 0, 'why do i olwys hav 2b d least priority?', '', 'update', 1, 0, '', '1', 1250943191, 'Reading PM from\nrela', 75, '', '1', 0, 1, 1, 1, 10, 1, 0, '', 424, 0, '1', 0, 'e', 0, '1', '', '', '', '', 0, 1, 0, '0', '1', '', '', 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0),
(17, 'lupin111', 'a561a77e35039bbfe8130326ce4e1a8f', '1984-09-20', 'M', 'israel tel-aviv', '0', 0, '', '', '', 'MAUI_WAP_Browser', '', 'unknown', 1250579213, 1250570849, 47, 0, '0', 0, '', '', '', 0, 0, '', '1', 0, 'Chatrooms', 4, '', '1', 0, 1, 1, 1, 1, 1, 0, '', 42, 0, '1', 0, '', 0, '1', '', '', '', '', 0, 0, 0, '0', '1', '', '', 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0),
(18, 'yhen_yhen', 'c2d1ec343a4627732ab604b256c456cb', '1993-09-22', 'F', 'philippines-pampanga', '1', 17, '', '', '', 'Nokia3220', '', '203.177.91.135', 1250943926, 1250584590, 285, 13, '0', 0, 'ingat mga buddies:) lubx ku kaung lahat..', '', '', 27, 0, '', '1', 1250942800, 'loddeg out - xHTML', 30, 'index.php?action=logout', '1', 0, 1, 1, 1, 1, 1, 0, '', 278, 0, '1', 0, '', 0, '1', '', '', '', '', 0, 1, 0, '0', '1', '', '', 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0),
(20, 'turon', 'f3bae4040cb4107986c48bde3bc4c909', '1989-08-31', 'M', 'philippines', '0', 0, '', '', '', 'Mozilla', '', '121.1.10.250', 1250595020, 1250594975, 0, 0, '0', 0, '', '', '', 0, 0, '', '1', 0, 'Main Page - xHTML', 3, 'index.php?action=main', '1', 0, 1, 1, 1, 1, 1, 0, '', 0, 0, '1', 0, '', 0, '1', '', '', '', '', 0, 0, 0, '0', '1', '', '', 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0),
(21, '-copypaste-', '93cb786fcd46a443a808bd4449bca2e8', '0001-12-19', 'M', '', '0', 1, '', '', '', 'Nokia6070', '', '83.170.93.54', 1250830348, 1250595449, 1, 0, '0', 0, '', '', '', 2, 0, '', '1', 1250817718, 'Reading PM from\nglaize', 18, '', '1', 0, 1, 1, 1, 1, 1, 0, '', 256, 0, '1', 0, '', 0, '1', '', '', '', '', 0, 0, 0, '0', '1', '', '', 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0),
(23, 'dave26', '9848abaac41b4f330fefac04d49cbd8e', '1986-09-26', 'M', 'philippines', '0', 0, '', '', '', 'Mozilla', '', '110.55.38.159', 1250606051, 1250605958, 0, 0, '0', 0, '', '', '', 0, 0, '', '1', 0, 'Female Gallery', 9, '', '1', 0, 1, 1, 1, 1, 1, 0, '', 0, 0, '1', 0, '', 0, '1', '', '', '', '', 0, 0, 0, '0', '1', '', '', 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0),
(22, 'mystery', 'e9a62a5c970dc3970af10c39a4965012', '--', 'M', '', '0', 0, '', '', '', 'Opera', '', '203.177.91.196', 1250596453, 1250595887, 1, 0, '0', 0, '', '', '', 0, 0, '', '1', 0, 'Reading PM from\nrela', 6, '', '1', 0, 1, 1, 1, 1, 1, 0, '', 0, 0, '1', 0, '', 0, '1', '', '', '', '', 0, 0, 0, '0', '1', '', '', 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0),
(24, 'chaste', '4a7d1ed414474e4033ac29ccb8653d9b', '2008-03-01', 'F', 'Ph', '0', 100, '', '', '', 'Mozilla', '', '121.1.44.86', 1250939215, 1250631510, 0, 0, '0', 0, '', '', 'Welc0me newbie', 0, 0, '', '1', 1250917869, 'Online List - xHTML', 10, 'index.php?action=online', '1', 0, 1, 1, 1, 1, 1, 0, '', 101, 1, '1', 0, '', 0, '1', '', '', '', '', 0, 1, 0, '0', '1', '', '', 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0),
(29, 'aneber', 'a450307b5753dd16d5da8234f9a420b2', '1985-12-06', 'M', 'manila philippines', '0', 101, 'I love you h0ney... Mwaah3x', '', 'Nctberdan_ann@yahoo.com', 'Mozilla', '', '67.202.19.154', 1250868324, 1250675650, 0, 0, '0', 0, '', '', 'update', 1, 0, '', '1', 1250775269, 'xHTML-Viewing Category--', 19, 'index.php?action=viewcat&amp;cid=1', '1', 0, 1, 1, 1, 1, 1, 0, '09103244648', 102, 1, '1', 0, 'e', 0, '1', '', '', '', '', 0, 1, 0, '0', '1', '', '', 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0),
(25, 'yliz', 'e36cca14702d7d93cc03b65b0bcf1b55', '1989-11-01', 'F', 'PH-iloilo', '0', 100, '', '', '', 'SonyEricssonK800i', '', '203.177.91.193', 0, 1250641233, 0, 0, '0', 0, '', '', 'Welcome newbie', 0, 0, '', '1', 0, '', 8, '', '1', 0, 1, 1, 1, 1, 1, 0, '', 101, 1, '1', 0, '', 0, '1', '', '', '', '', 0, 0, 0, '0', '1', '', '', 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0),
(26, 'aashu', 'ce0da992c055bc069f153963916e256a', '--', 'M', 'India', '0', 100, '', '', '', 'Mozilla', '', '74.125.74.194', 1250928912, 1250651197, 0, 0, '0', 0, '', '', 'update', 2, 0, '', '1', 1250918509, 'RPG Stats', 12, 'index.php?action=main', '1', 0, 1, 1, 1, 1, 1, 0, '', 101, 1, '1', 0, '', 0, '1', '', '', '', '', 0, 1, 0, '0', '1', '', '', 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0),
(28, 'whitebutterfly', 'b85a0698b027c11e2a6efab5597180fc', '1991-06-01', 'F', 'Philipines', '0', 100, ' >._for U i wiLL_.<', '', 'em0tera_waan01@y.c', 'Nokia6111', '', '66.90.65.76', 1250678339, 1250665378, 0, 0, '0', 0, '', '', 'update', 2, 0, '', '1', 1250668861, 'Adding/Removing Buddy', 15, '', '1', 0, 1, 1, 1, 1, 1, 0, '09084968111', 101, 1, '1', 0, 'f', 0, '1', '', '', '', '', 0, 0, 0, '0', '1', '', '', 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0),
(27, 'pinkbutterfly', '6c76de9cc5b60cbd589c45eca148f1b0', '1991-05-31', 'F', 'Philippines', '0', 113, 'l0ve me or hate me.,whatever.,\nnu daw?haha', 'http://retrivewap.co.za/usergallery/dlan0r013.jpg', '', 'Mozilla', '', '119.95.240.21', 1250848544, 1250664963, 3, 0, '0', 0, '', '', 'update', 0, 0, '', '1', 1250837401, 'Wants to Log Out - xHTML', 36, '', '1', 0, 1, 1, 1, 1, 1, 0, '09084966060', 616, 1, '1', 0, 's', 0, '1', '', '', '', '', 0, 0, 0, '0', '1', '', '', 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0),
(30, 'pare', '6df8ebb35abe2e9abc897c44ea53aa8f', '1995-07-09', 'M', 'phil.', '0', 100, '', '', 'Nheil_punks_09@yahoo.com', 'Opera', '', '203.177.91.131', 1250942629, 1250679436, 8, 12, '0', 0, '', '', 'Welcome newbie', 0, 0, '', '1', 1250941465, 'xHTML-Viewing Topic- ', 6, 'index.php?action=viewtpc&amp;page=&amp;tid=', '1', 0, 1, 1, 1, 7, 1, 0, '', 102, 1, '1', 0, 's', 0, '1', '', '', '', '', 0, 1, 0, '0', '1', '', '', 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0),
(31, 'little_mermaid', 'acc4cfc0773695795955f187d86342c3', '--', 'F', '', '0', 100, '', '', '', 'Opera', '', '119.234.0.9', 1250923140, 1250684705, 106, 9, '0', 0, '', '', 'update', 0, 0, '', '1', 1250781511, 'Wants to Log Out - xHTML', 12, '', '1', 0, 1, 1, 1, 1, 1, 0, '', 201, 1, '1', 0, '', 0, '1', '', '', '', '', 0, 0, 0, '0', '1', '', '', 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0),
(32, 'kamote', 'eb33be682d786a2d2f3b8421e8abb7c3', '1983-09-20', 'M', 'qatar', '0', 100, '', '', '', 'Mozilla', '', '78.100.20.139', 1250695348, 1250695329, 0, 0, '0', 0, '', '', 'update', 0, 0, '', '1', 0, 'Main Page - xHTML', 9, 'index.php?action=main', '1', 0, 1, 1, 1, 1, 1, 0, '', 101, 1, '1', 0, '', 0, '1', '', '', '', '', 0, 0, 0, '0', '1', '', '', 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0),
(33, 'mackie', '10cd8cca7d33d4526cf4c264654762c6', '1979-05-27', 'M', 'israel', '0', 100, '', '', '', 'Mozilla', '', '84.110.78.157', 1250703444, 1250702896, 0, 0, '0', 0, '', '', '', 0, 0, '', '1', 0, 'xHTML-Viewing Profile of kurlaine', 8, 'index.php?action=viewuser&amp;who=3', '1', 0, 1, 1, 1, 1, 1, 0, '', 101, 1, '1', 0, '', 0, '1', '', '', '', '', 0, 0, 0, '0', '1', '', '', 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0),
(34, 'jhigzbadion', '3a5f8a212685350579a60c4428b1e850', '1979-09-27', 'M', 'Philippines', '0', 101, '', '', '', 'Opera', '', '203.177.91.193', 1250942863, 1250737887, 7, 0, '0', 0, '', '', 'welc0me', 2, 0, '', '1', 1250942617, 'xHTML-Viewing Forum-Bible learning', 22, 'index.php?action=viewfrm&amp;fid=13', '1', 0, 1, 1, 1, 1, 1, 0, '', 104, 1, '1', 0, '', 0, '1', '', '', '', '', 0, 1, 0, '0', '1', '', '', 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0),
(35, 'bud4u', '81dc9bdb52d04dc20036dbd8313ed055', '--', 'M', '', '0', 100, '', '', '', 'Nokia6230i', '', '10.20.129.31', 1250921266, 1250757092, 0, 0, '0', 0, '', '', 'Welc0me', 0, 0, '', '1', 1250850089, 'Wants to Log Out - xHTML', 12, '', '1', 0, 1, 1, 1, 1, 1, 0, '', 101, 1, '1', 0, '', 0, '1', '', '', '', '', 0, 1, 0, '0', '1', '', '', 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0),
(36, 'emocry', '35c2f260b41ce125a6384679491ded40', 'April291995-1995-29', 'M', 'Phil', '0', 100, '', '', '', 'Opera', '', '203.177.91.161', 1250761159, 1250759622, 0, 0, '0', 0, '', '', 'Welc0me newbie', 0, 0, '', '1', 1250759862, 'Browsing Downloads', 4, '', '1', 0, 1, 1, 1, 1, 1, 0, '', 101, 1, '1', 0, '', 0, '1', '', '', '', '', 0, 0, 0, '0', '1', '', '', 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0),
(38, 'jamesbond', 'c00f0c4675b91fb8b918e4079a0b1bac', '1971-07-26', 'M', 'South Africa/Kwa Zulu Natal/Richardsbay    ', '0', 113, 'In my g/f heart', 'avatars/105.gif', 'unitedwap@wappod.com', 'SAMSUNG-SGH-X600', '', '196.207.40.238', 1250943641, 1250764398, 18, 7, '0', 0, '', '', 'Welcome', 6, 0, '', '1', 1250943077, 'User Inbox', 32, '', '1', 0, 1, 1, 1, 1, 1, 0, '079330619', 122, 1, '1', 0, 'h', 1, '1', '', '', '', '', 0, 1, 0, '0', '1', '', 'fantasygirl.css', 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0),
(37, 'emmanuel', '65f185ec6bd47af8f082f8196d0b4d24', '10-29-66', 'M', 'israel', '0', 100, '', '', '', 'Mozilla', '', '85.250.240.191', 1250779834, 1250761917, 38, 0, '0', 0, '', '', 'Welcome gift', 0, 0, '', '1', 0, 'Chatrooms', 11, '', '1', 0, 1, 1, 1, 1, 1, 0, '', 137, 1, '1', 0, '', 0, '1', '', '', '', '', 0, 0, 0, '0', '1', '', '', 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0),
(39, 'aldrin_06', '762a3843fd74b1c3d12a385ab0c61c87', '1988-04-14', 'M', 'Bulakan', '0', 100, '', '', '', 'Nokia7360', '', '203.177.91.132', 1250786585, 1250785365, 0, 0, '0', 0, '', '', 'Welcome', 0, 0, '', '1', 1250785424, 'Browsing Downloads', 4, '', '1', 0, 1, 1, 1, 1, 1, 0, '', 100, 1, '1', 0, '', 0, '1', '', '', '', '', 0, 0, 0, '0', '1', '', '', 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0),
(43, 'janz16', '33c3b540d3fd85d539f72d48b5f2615e', '1982-01-16', 'F', 'IL', '0', 102, '', '', '', 'Nokia6300', '', 'unknown', 1250861743, 1250834262, 0, 0, '0', 0, '', '', '', 1, 0, '', '1', 1250854923, 'Wants to Log Out - xHTML', 11, '', '1', 0, 1, 1, 1, 1, 1, 0, '', 103, 1, '1', 0, '', 0, '1', '1', '', '', '', 0, 1, 0, '0', '1', '', '', 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0),
(41, 'glaize', '4b2e4460bf5eba956597fa082f2cf166', '--', 'F', '', '0', 108, '', '', '', 'Mozilla', '', '203.177.91.131,203.177.91.131', 1250882672, 1250822966, 0, 0, '0', 0, '', '', 'Welcome', 0, 0, '', '1', 1250881058, 'User Inbox', 27, '', '1', 0, 1, 1, 1, 1, 1, 0, '', 109, 1, '1', 0, '', 0, '1', '1', '', '', '', 0, 1, 0, '0', '1', '', '', 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0),
(42, 'jeddy', 'e10adc3949ba59abbe56e057f20f883e', '1996-08-03', 'M', 'Austria', '0', 100, '', '', '', 'Opera', '', '203.177.91.161', 1250832461, 1250831952, 0, 0, '0', 0, '', '', '', 0, 0, '', '1', 0, 'Shouting - xHTML', 5, 'index.php?action=shout', '1', 0, 1, 1, 1, 1, 1, 0, '', 1, 1, '1', 0, '', 0, '1', '1', '', '', '', 0, 0, 0, '0', '1', '', '', 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0),
(44, 'xxxmiakaxxx', '3a7e4d81ad0558aa378400dc7609384f', '1991-09-02', 'F', 'below the ground', '0', 101, '', '', '', 'Nokia7360', '', '83.170.93.54', 1250911257, 1250835521, 0, 0, '0', 0, '', '', 'Welcome newbie', 13, 0, '', '1', 1250846036, 'Reading PM from\nCheckmate', 12, '', '1', 0, 1, 1, 1, 1, 1, 0, '', 102, 1, '1', 0, '', 0, '1', '1', '', '', '', 0, 1, 0, '0', '1', '', '', 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0),
(50, 'mi1an', '9f5e77d1f4c4116bf3601edce941b814', '1982-12-22', 'M', 'Australia', '0', 100, '', '', '', 'Mozilla', '', '203.171.199.235', 1250866277, 1250861297, 0, 0, '0', 0, '', '', '', 0, 0, '', '1', 1250861352, 'Adding/Removing Buddy', 4, '', '1', 0, 1, 1, 1, 1, 1, 0, '', 101, 1, '1', 0, '', 0, '1', '1', '', '', '', 0, 1, 0, '0', '1', '', '', 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0),
(46, 'jet05', 'c906920a5a65faaf10606a603cf02dd4', '1991-01-24', 'M', 'Quirino Province', '0', 101, '', '', '', 'Opera', '', '203.177.91.161', 1250897451, 1250846559, 0, 0, '0', 0, '', '', '', 0, 0, '', '1', 1250852377, 'Reading PM from\nrela', 5, '', '1', 0, 1, 1, 1, 1, 1, 0, '', 102, 1, '1', 0, '', 0, '1', '1', '', '', '', 0, 1, 0, '0', '1', '', '', 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0),
(45, 'bluebutterfly', 'b946a84bf889cc250531332b85fd6544', '1991-01-16', 'F', 'sa tabi tabi', '0', 101, '', '', '', 'MAUI_WAP_Browser', '', '65.111.169.3', 1250859476, 1250840559, 22, 0, '0', 0, '', '', 'Welc0me newbie', 1, 0, '', '1', 1250858663, 'Reading PM from\nshamie', 8, '', '1', 0, 1, 1, 1, 1, 1, 0, '', 0, 129, '1', 0, '', 0, '1', '1', '', '', '', 0, 0, 0, '0', '1', '', '', 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0),
(49, 'romeo', '37d153a06c79e99e4de5889dbe2e7c57', '--', 'M', '', '0', 102, '', 'http://retrivewap.co.za/usergallery/1_3797815_4912_t.jpg', '', 'Mozilla', '', '117.199.33.147', 1250944246, 1250858338, 10, 0, '0', 0, 'i love you', '', 'Welcome', 8, 0, '', '1', 1250940450, 'Wants to Log Out - xHTML', 17, '', '1', 0, 1, 1, 1, 1, 1, 0, '', 106, 1, '1', 0, '', 0, '1', '1', '', '', '', 0, 1, 0, '0', '1', '', 'style.css', 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0),
(47, 'unltd', 'e2a7106f1cc8bb1e1318df70aa0a3540', '1988-12-26', 'M', 'Bohol, Ph', '0', 101, 'http://unltdwap.wapmod.com', '', 'unltdwap@boholano.com', 'Opera', '', '203.177.91.132', 1250941746, 1250848199, 0, 0, '0', 0, '', '', 'Welcome', 1, 0, '', '1', 1250938462, 'Reading PM from\nrela', 10, '', '1', 0, 1, 1, 1, 11, 1, 0, '', 102, 1, '1', 0, 'l', 1, '1', '1', '', '', '', 0, 1, 0, '0', '1', '', '', 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0),
(48, 'jcforever04', '0c7a9a1ffe90bd9a2bfa8250f51babe2', '1992-11-12', 'M', 'PH-ManiLa', '0', 100, '', '', '', 'Opera', '', '203.177.91.161', 1250892178, 1250853530, 1, 0, '0', 0, '', '', '', 5, 0, '', '1', 1250891788, 'Fighting With piece', 7, 'wz.php?action=war', '1', 0, 1, 1, 1, 1, 1, 0, '', 31, 1, '1', 0, '', 0, '1', '1', '', '', '', 0, 1, 0, '0', '1', '', '', 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0),
(51, 'rider', '3da8df1c5e26ae1435432cc175d7467d', '1989-02-27', 'M', '', '0', 102, '', '', '', 'Opera', '', '10.1.106.60', 1250930953, 1250867806, 0, 0, '0', 0, '', '', '', 0, 0, '', '1', 1250875560, 'Main Page - xHTML', 8, 'index.php?action=main', '1', 0, 1, 1, 1, 1, 1, 0, '', 3, 1, '1', 0, 's', 0, '1', 'just ask me', 'rep/3.gif', '', '', 0, 1, 0, '0', '1', '', '', 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0),
(55, 'spiderwebs', '098f6bcd4621d373cade4e832627b4f6', '1985-02-15', 'M', 'India', '0', 100, '', '', 'mayank@i-genx.com', 'Opera', '', '59.161.182.154', 1250895237, 1250888978, 0, 0, '0', 0, '', '', 'welcome', 0, 0, '', '1', 0, '', 20, '', '1', 0, 1, 1, 1, 1, 1, 0, '', 2, 1072, '1', 0, '', 0, '1', '', '', '', '', 0, 1, 0, '0', '1', '', '', 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0),
(56, 'meean', '25c0b9c2b9da9b7471d6565fcb09a2ca', '--', 'M', '', '0', 100, '', '', 'Meean@gmail.com', 'Opera', '', '218.248.65.158', 0, 1250901377, 0, 0, '0', 0, '', '', '', 0, 0, '', '1', 0, '', 1, '', '1', 0, 1, 1, 1, 1, 1, 0, '', 100, 1, '1', 0, '', 0, '1', '', '', '', '', 0, 0, 0, '0', '1', '', '', 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0),
(57, 'mean', '25c0b9c2b9da9b7471d6565fcb09a2ca', '--', 'M', '', '0', 100, '', '', 'Meean@gmail.com', 'Opera', '', '218.248.65.158', 1250901574, 1250901392, 0, 0, '0', 0, '', '', '', 0, 0, '', '1', 0, '', 3, '', '1', 0, 1, 1, 1, 9, 1, 0, '', 100, 1, '1', 0, '', 1, '1', '', '', '', '', 0, 1, 0, '0', '1', '', '', 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0),
(58, 'kram_3s', 'c1cb21589a091deb1a534b4a3efed17e', '1983-03-13', 'M', 'canada', '0', 100, '', '', 'kramlig_3s@yahoo.com', 'Mozilla', '', '99.234.247.228', 1250937984, 1250903179, 2, 0, '0', 0, '', '', '', 3, 0, '', '1', 1250913794, '', 4, '', '1', 0, 1, 1, 1, 1, 1, 0, '', 101, 1, '1', 0, '', 0, '1', '', '', '', '', 0, 1, 0, '0', '1', '', '', 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0),
(59, 'vhaz', 'ffe553694f5096471590343432359e02', '1992-10-9', 'M', 'Ph', '1', 105, '', '', 'chahudaz@yahoo.com', 'Opera', '', '203.177.91.161', 1250908713, 1250903630, 0, 0, '0', 0, '', '', '', 0, 0, '', '1', 1250903668, '', 8, '', '1', 0, 1, 1, 1, 1, 1, 0, '', 105, 1, '1', 0, '', 0, '1', '', '', '', '', 0, 1, 0, '0', '1', '', '', 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0),
(66, 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229', '--', 'M', '', '0', 100, '', '', '@', 'SonyEricssonP1i', '', '117.97.110.27', 1250922271, 1250920307, 1, 0, '0', 0, '', '', '', 0, 0, '', '1', 0, '', 4, '', '1', 0, 1, 1, 1, 1, 1, 0, '', 100, 1, '1', 0, '', 0, '1', '', '', '', '', 0, 1, 0, '0', '1', '', '', 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0),
(60, 'shaider', '04668875412db9993629099fd66d444d', '1977-05-13', 'M', 'Philippines', '0', 100, '', '', 'jeffrey_email@yahoo.com', 'Vodafone', '', '67.228.120.238', 1250908349, 1250906123, 0, 0, '0', 0, '', '', '', 0, 0, '', '1', 0, '', 5, '', '1', 0, 1, 1, 1, 1, 1, 0, '', 100, 1, '1', 0, '', 0, '1', '', '', '', '', 0, 1, 0, '0', '1', '', '', 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0),
(61, 'juncastro_7', '1c27680133b781cadd037e8a6dcc001b', '1982-06-07', 'M', 'Philippines', '0', 100, '', '', 'juncastro_7@yahoo.com', 'Opera', '', '203.177.91.161', 1250938839, 1250908207, 1, 0, '0', 0, '', '', '', 0, 0, '', '1', 1250923240, '', 6, '', '1', 0, 1, 1, 1, 1, 1, 0, '', 100, 1, '1', 0, '', 0, '1', '', '', '', '', 0, 1, 0, '0', '1', '', '', 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0),
(62, 'theguest', 'ad830eb7449a1bfe7119995eea606865', '1990-01-01', 'M', '', '0', 100, '', '', 'aaa@aaa.c', 'Opera', '', '119.70.40.101, 203.177.91.161', 1250909741, 1250908995, 0, 0, '0', 0, '', '', '', 0, 0, '', '1', 1250909196, '', 10, '', '1', 0, 1, 1, 1, 1, 1, 0, '', 100, 1, '1', 0, '', 0, '1', '', '', '', '', 0, 1, 0, '0', '1', '', '', 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0),
(63, 'fixme', '54d7ee4d21608ade07c7991d72659206', '1986-09-09', 'M', 'PH', '0', 100, '', '', 'Ph@ph.com', 'Mozilla', '', '121.54.29.26', 1250910788, 1250910359, 0, 0, '0', 0, '', '', '', 0, 0, '', '1', 0, '', 3, '', '1', 0, 1, 1, 1, 1, 1, 0, '', 100, 1, '1', 0, '', 0, '1', '', '', '', '', 0, 1, 0, '0', '1', '', '', 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0),
(64, 'mipf', '0ba058169c19fa3a52d1ab3815e625b0', '1990-01-25', 'M', 'Philippines', '0', 100, '', '', 'krazzymarc@yahoo.com', 'Mozilla', '', '203.87.210.174', 1250915244, 1250915070, 0, 0, '0', 0, '', '', '', 0, 0, '', '1', 0, '', 1, '', '1', 0, 1, 1, 1, 3, 1, 0, '', 100, 1, '1', 0, '', 1, '1', '', '', '', '', 0, 1, 0, '0', '1', '', '', 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0),
(65, 'kim_homer', 'a416b169e2291215842d23367cb6c8b0', '1990-09-26', 'M', 'Ph', '0', 100, '', '', 'kim_homer@ymail.com', 'Opera', '', '203.177.91.132', 1250931177, 1250918883, 0, 0, '0', 0, '', '', '', 0, 0, '', '1', 1250919678, '', 2, '', '1', 0, 1, 1, 1, 1, 1, 0, '', 100, 1, '1', 0, '', 0, '1', '', '', '', '', 0, 1, 0, '0', '1', '', '', 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0),
(67, 'robzky', '7b9206b58e6e011aa482ee930f1a1f6b', '1991-02-10', 'M', 'PH', '0', 100, '', '', 'robzky_23@yahoo.com', 'Opera', '', '121.1.53.50', 1250922579, 1250920631, 0, 0, '0', 0, '', '', '', 0, 0, '', '1', 1250920825, '', 2, '', '1', 0, 1, 1, 0, 11, 1, 0, '', 100, 1, '1', 0, '', 0, '1', '', '', '', '', 0, 1, 0, '0', '1', '', '', 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0),
(68, 'denver', '3c784bff199ef62ecc2f3a988f395c62', '10-11-86', 'M', 'philippines', '0', 101, '', '', 'denver_101186', 'Mozilla', '', '85.250.194.228', 1250939095, 1250924591, 2, 0, '0', 0, '', '', '', 0, 0, '', '1', 1250934269, '', 9, '', '1', 0, 1, 1, 1, 1, 1, 0, '', 101, 1, '1', 0, '', 0, '1', '', '', '', '', 0, 1, 0, '0', '1', '', '', 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0),
(71, 'ionutxp', 'a92b9a15414fe3987a42d6274350406c', '1990-02-13', 'M', 'romania', '0', 100, '', '', 'ion@gg.ro', 'Opera', '', '82.208.134.179', 1250934649, 1250934595, 0, 0, '0', 0, '', '', '', 0, 0, '', '1', 0, '', 1, '', '1', 0, 1, 1, 1, 1, 1, 0, '', 100, 1, '1', 0, '', 0, '1', '', 'rep/1.gif', '', '', 0, 1, 0, '0', '1', '', 'matrix.css', 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0),
(69, 'john', '3750c667d5cd8aecc0a9213b362066e9', '1984-05-24', 'M', 'phillippines', '0', 100, '', '', 'dawiks_24@yahoo.com', 'Mozilla', '', '125.60.241.253', 1250926249, 1250925795, 2, 0, '0', 0, '', '', '', 1, 0, '', '1', 0, '', 1, '', '1', 0, 1, 1, 1, 1, 1, 0, '', 100, 1, '1', 0, '', 0, '1', '', '', '', '', 0, 1, 0, '0', '1', '', '', 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0),
(70, 'ghiel', 'f806fc5a2a0d5ba2471600758452799c', '1994-03-15', 'F', 'philippines', '0', 100, 'ms.ghiel', 'http://retrivewap.co.za/usergallery/A03.jpg', 'ghielaine@y.c/ghiel15@y.c', 'Mozilla', '', '121.1.20.182', 1250939736, 1250929657, 16, 0, '0', 0, '', '', '', 20, 0, '', '1', 1250936333, '', 19, '', '1', 0, 1, 1, 1, 5, 1, 0, '', 105, 1, '1', 0, 'h', 0, '1', 'GOD', '', '', '', 0, 1, 0, '0', '1', '', '', 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0),
(72, 'marioty', '8977ecbb8cb82d77fb091c7a7f186163', '1990-04-23', 'M', 'warri.delta,nigeria', '0', 100, '', '', 'lassied15@yahoo.com', 'MAUI WAP Browser', '', '41.220.75.15', 1250935873, 1250935719, 0, 0, '0', 0, '', '', '', 0, 0, '', '1', 1250935866, '', 1, '', '1', 0, 1, 1, 1, 1, 1, 0, '', 100, 1, '1', 0, '', 0, '1', '', '', '', '', 0, 1, 0, '0', '1', '', '', 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0),
(73, 'casper', 'c0912a672e1e73076928159a18b9a2d3', '1991-01-01', 'M', '', '0', 100, '', '', '', 'Opera', '', '41.242.4.52', 1250936711, 1250936592, 0, 0, '0', 0, '', '', '', 0, 0, '', '1', 0, '', 3, '', '1', 0, 1, 1, 1, 1, 1, 0, '', 100, 1, '1', 0, '', 0, '1', '', '', '', '', 0, 1, 0, '0', '1', '', '', 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0),
(74, 'humandaka', '95a420d343e9f22d65a35e729ddf58ea', '1991-03-01', 'M', 'Sa bhay nmin', '0', 100, '', '', 'Bossglen383@yahoo.com', 'Opera', '', '203.177.91.161', 1250938969, 1250938616, 1, 0, '0', 0, '', '', '', 0, 0, '', '1', 0, '', 3, '', '1', 0, 1, 1, 1, 1, 1, 0, '', 100, 1, '1', 0, '', 0, '1', '', '', '', '', 0, 1, 0, '0', '1', '', '', 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0),
(75, 'ehhh', 'f1ff84f22c9faa3d6e676802cfdd5680', '1994-9-1', 'M', 'Ph.', '0', 100, '', '', 'Markjoffer_mj@yahoo.com', 'Nokia7360', '', '203.177.91.132', 1250944246, 1250941605, 0, 0, '0', 0, '', '', '', 0, 0, '', '1', 1250941917, '', 5, '', '1', 0, 1, 1, 1, 1, 1, 0, '', 100, 1, '1', 0, '', 0, '1', '', '', '', '', 0, 1, 0, '0', '1', '', '', 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0),
(76, 'gift', 'a0ec3b461abf4bc16ad615481260140e', '1995-04-30', 'M', 'NG-LAGOS', '0', 100, '', '', '', 'MAUI_WAP_Browser', '', '41.220.75.15', 1250943128, 1250942878, 0, 0, '0', 0, '', '', '', 0, 0, '', '1', 0, '', 2, '', '1', 0, 1, 1, 1, 1, 1, 0, '', 100, 1, '1', 0, '', 0, '1', '', '', '', '', 0, 1, 0, '0', '1', '', '', 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0),
(77, 'CASH', '93585797569d208d914078d513c8c55a', '1991-12-21', 'M', 'à¶½à¶‚à¶šà·à·€', '4', 113, 'à¶†à¶¯à¶»à¶º à·ƒà·”à¶±à·Šà¶¯à¶» à·€à¶»à¶¯à¶šà·’', '', '', 'Mozilla/5.0 (Windows NT 6.1; rv:32.0) Gecko/20100101 Firefox/32.0', '', '127.0.0.1', 1412514385, 1409079743, 236, 19, '0', 0, 'à¶†à¶¯à¶»à¶º à·ƒà·”à¶±à·Šà¶¯à¶»à·“ à¶…à¶±à·š', 'Banned: yggj', 'ddddddddd', 56, 0, '', '1', 1412512802, 'site Extras-xhtml', 192, 'index.php?action=extra', '1', 20, 1, 1, 1, 5, 1, 13, '', 8950, 5570, '1', 0, 's', 1, '1', '', 'rep/1.gif', '', '', 0, 1, 0, '0', '1', '', 'alb.css', 0, 0, 244609, 'cash', 37, 0, 'ZZ', 0, 1411890270, 0, 0, 1, 0),
(78, 'damith', 'a91734bcbd2cdcb4a79e059a4a9e7582', '1991-10-10', 'M', '', '0', 119, '', 'usergallery/Chrysanthemum_1.jpg', '', 'Mozilla/5.0 (Windows NT 6.1; rv:32.0) Gecko/20100101 Firefox/32.0', '', '127.0.0.1', 1412265754, 1409580118, 58, 0, '0', 0, '', '', '', 50, 0, '', '1', 1412139736, '[Invisible]', 185, '', '1', 0, 1, 1, 1, 1, 1, 0, '', 3635, 1, '1', 0, '', 0, '1', '', '', '../profilemoods/0happy.gif', '', 0, 0, 0, '0', '1', '', '', 0, 0, 120010, 'damith', 1, 0, 'ZZ', 0, 0, 1, 0, 1, 1),
(79, 'nuwan', '48e912410d266e8acfc5491ffd418567', '1990-10-10', 'M', '', '0', 100, '', '', '', 'Mozilla', '', '127.0.0.1', 1409633630, 1409633279, 0, 0, '0', 0, '', '', '', 0, 0, '', '1', 0, '', 3, '', '1', 0, 1, 1, 1, 1, 1, 0, '', 100, 1, '1', 0, '', 0, '1', '', '', '', '', 0, 0, 0, '0', '1', '', '', 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0),
(80, 'cash4', '4642c32a9baf6e454e276bc5c62b6421', '1991-12-12', 'M', 'lk', '0', 100, '', '', '', 'Mozilla', '', '127.0.0.1', 1409642873, 1409633971, 9, 0, '0', 0, '', '', '', 0, 0, '', '1', 0, '', 22, '', '1', 0, 1, 1, 1, 1, 1, 0, '', 5, 1, '1', 0, '', 0, '1', '', '', '', '', 0, 0, 0, '0', '1', '', '', 0, 77, 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0),
(81, 'cashf', 'ad4f56daede4c5ce5389f74551706c9a', '1984-1-1', 'M', 'lk', '0', 100, '', 'images/user_male.png', '', '', '', '', 0, 1411291979, 0, 0, '0', 0, '', '', '', 0, 0, '', '1', 0, '', 10, '', '1', 0, 1, 1, 1, 1, 1, 0, '', 100, 1, '1', 0, '', 0, '1', '', '', '', '', 0, 0, 0, '0', '1', '', '', 0, 0, 0, '', 0, 0, '', 0, 0, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_usfun`
--

CREATE TABLE IF NOT EXISTS `ibwf_usfun` (
  `id` int(100) NOT NULL DEFAULT '0',
  `uid` int(100) NOT NULL DEFAULT '0',
  `action` varchar(10) NOT NULL DEFAULT '',
  `target` int(100) NOT NULL DEFAULT '0',
  `actime` int(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_vault`
--

CREATE TABLE IF NOT EXISTS `ibwf_vault` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `uid` int(100) NOT NULL DEFAULT '0',
  `title` varchar(50) NOT NULL DEFAULT '',
  `itemurl` varchar(255) NOT NULL DEFAULT '',
  `pudt` int(100) NOT NULL DEFAULT '0',
  `cat` int(50) NOT NULL DEFAULT '0',
  `type` int(100) NOT NULL DEFAULT '0',
  `downloads` int(100) NOT NULL DEFAULT '0',
  `url` varchar(200) NOT NULL,
  `filesize` varchar(60) NOT NULL,
  `did` int(10) NOT NULL,
  `time` int(100) NOT NULL DEFAULT '0',
  `mime` int(100) NOT NULL,
  `info` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=77 ;

--
-- Dumping data for table `ibwf_vault`
--

INSERT INTO `ibwf_vault` (`id`, `uid`, `title`, `itemurl`, `pudt`, `cat`, `type`, `downloads`, `url`, `filesize`, `did`, `time`, `mime`, `info`) VALUES
(2, 14, 'Cute_240x320.gif', 'http://marga.mobile9.com/download/media/41/cute_t1ql91ua.gif', 1250581919, 0, 2, 3, '', '', 0, 0, 0, ''),
(3, 5, 'Boys over flowers OST - I dont know anything but l', 'http://3g.myglobe.com.ph@pickmic.com/downloads/Boys%20over%20flowers%20OST%20-%20I%20dont%20know%20anything%20but%20love.mp3', 1250599470, 0, 1, 0, '', '', 0, 0, 0, ''),
(5, 12, 'teddy_bear ', 'http://i205.photobucket.com/albums/bb222/marylandsunshine1954/graphics/teddy-bear04.gif', 1250608883, 0, 2, 0, '', '', 0, 0, 0, ''),
(6, 3, '3D_Resident_Evil_240x320_se.jar', 'http://tegos.ru/java/3D/3D_Resident_Evil_240x320_se.jar', 1250629723, 0, 3, 0, '', '', 0, 0, 0, ''),
(7, 3, '3D_Death_Ambush_240x320.jar', 'http://tegos.ru/java/3D/3D_Death_Ambush_240x320.jar', 1250629837, 0, 3, 0, '', '', 0, 0, 0, ''),
(8, 3, '@3kz.3D_Death_Ambush_240x320.jar', 'http://m.friendster.com@tegos.ru/java/3D/3D_Death_Ambush_240x320.jar', 1250629869, 0, 3, 0, '', '', 0, 0, 0, ''),
(9, 3, '3D_Crysis_Mobile_240x320.jar', 'http://m.friendster.com@tegos.ru/java/3D/3D_Crysis_Mobile_240x320.jar', 1250629960, 0, 3, 0, '', '', 0, 0, 0, ''),
(12, 3, '3D_Micro_Counter_Strike_1.4.0_rus.jar', 'http://m.friendster.com@tegos.ru/java/3D/3D_Micro_Counter_Strike_1.4.0_rus.jar', 1250630237, 0, 3, 0, '', '', 0, 0, 0, ''),
(11, 3, '3D_Captain_Fatal_240x320_nokia.jar', 'http://m.friendster.com@tegos.ru/java/3D/3D_Captain_Fatal_240x320_nokia.jar', 1250630112, 0, 3, 0, '', '', 0, 0, 0, ''),
(13, 3, '3D_Go_Karts_640x360_nokia.jar', 'http://m.friendster.com@tegos.ru/java/3D/3D_Go_Karts_640x360_nokia.jar', 1250630336, 0, 3, 0, '', '', 0, 0, 0, ''),
(14, 3, '3D_Shadows_of_Egypt_240x320_rus.jar', 'http://m.friendster.com@tegos.ru/java/3D/3D_Shadows_of_Egypt_240x320_rus.jar', 1250630426, 0, 3, 0, '', '', 0, 0, 0, ''),
(15, 3, 'Ghost_Fighter_Opening_Theme.mp3', 'http://3g.myglobe.com.ph@magnetron24.wen.ru/foreign/Ghost_Fighter_Opening_Theme.mp3', 1250630574, 0, 1, 0, '', '', 0, 0, 0, ''),
(16, 3, 'Rhythm_Emotion_-_Gundam_Wing_Theme.mp3', 'http://3g.myglobe.com.ph@magnetron24.wen.ru/foreign/Rhythm_Emotion_-_Gundam_Wing_Theme.mp3', 1250630638, 0, 1, 0, '', '', 0, 0, 0, ''),
(17, 3, 'Blak eyeDPEAs_booM2POW.mp3', 'http://3g.myglobe.com.ph@pickmic.com/downloads/Black%20eyed%20peas%20-%20Boom%20boom%20pow.mp3', 1250630715, 0, 1, 1, '', '', 0, 0, 0, ''),
(18, 3, 'Akon_nanana.mp3', 'http://3g.myglobe.com.ph@pickmic.com/downloads/Akon%20-%20Right%20Now%20Na%20Na%20Na.mp3', 1250630776, 0, 1, 0, '', '', 0, 0, 0, ''),
(19, 3, 'AAliah_imisyou.mp3', 'http://3g.myglobe.com.ph@pickmic.com/downloads/Aaliyah%20-%20I%20Miss%20You.mp3', 1250630826, 0, 1, 0, '', '', 0, 0, 0, ''),
(20, 3, 'Craigdavid_insoMnia.mp3', 'http://3g.myglobe.com.ph@pickmic.com/downloads/Craig%20David%20-%20Insomnia.mp3', 1250630906, 0, 1, 4, '', '', 0, 0, 0, ''),
(21, 3, 'Fmstatic_m0ment of truTh.mp3', 'http://3g.myglobe.com.ph@pickmic.com/downloads/FM%20Static%20-%20Moment%20of%20Truth.mp3', 1250631023, 0, 1, 1, '', '', 0, 0, 0, ''),
(22, 3, 'Fmstatic_toNiGHT.mp3', 'http://3g.myglobe.com.ph@pickmic.com/downloads/FM%20Static%20-%20Tonight.mp3', 1250631126, 0, 1, 0, '', '', 0, 0, 0, ''),
(23, 3, 'Jim brickman and michele wriGht_urluV.mp3', 'http://3g.myglobe.com.ph@pickmic.com/downloads/Jim%20Brickman%20&%20Michelle%20Wright%20-%20Your%20Love.mp3', 1250631214, 0, 1, 2, '', '', 0, 0, 0, ''),
(24, 5, '007-quantum_of_solace_240x320.jar', 'http://3g.myglobe.com.ph@tegos.ru/java/new-java/007-quantum_of_solace_240x320.jar', 1250640888, 0, 3, 0, '', '', 0, 0, 0, ''),
(25, 5, '1942_air_combat_240x320.jar', 'http://3g.myglobe.com.ph@tegos.ru/java/new-java/1942_air_combat_240x320.jar', 1250640966, 0, 3, 0, '', '', 0, 0, 0, ''),
(26, 5, '300_spartancev_240x320.jar', 'http://3g.myglobe.com.ph@tegos.ru/java/new-java/300_spartancev_240x320.jar', 1250641026, 0, 3, 0, '', '', 0, 0, 0, ''),
(27, 5, '5_card_slingo_240x320.jar', 'http://3g.myglobe.com.ph@tegos.ru/java/new-java/5_card_slingo_240x320.jar', 1250641123, 0, 3, 0, '', '', 0, 0, 0, ''),
(28, 5, '7_wonders_240x320.jar', 'http://3g.myglobe.com.ph@tegos.ru/java/new-java/7_wonders_240x320.jar', 1250641161, 0, 3, 0, '', '', 0, 0, 0, ''),
(29, 5, 'Beer_Shooter_240x320.jar', 'http://3g.myglobe.com.ph@tegos.ru/java/new-java/Beer_Shooter_240x320.jar', 1250641205, 0, 3, 0, '', '', 0, 0, 0, ''),
(30, 5, 'abracadaball_240x320_eng.jar', 'http://3g.myglobe.com.ph@tegos.ru/java/new-java/abracadaball_240x320_eng.jar', 1250641333, 0, 3, 0, '', '', 0, 0, 0, ''),
(31, 5, 'aces_of_the_luftwaffe.jar', 'http://3g.myglobe.com.ph@tegos.ru/java/new-java/aces_of_the_luftwaffe.jar', 1250641393, 0, 3, 0, '', '', 0, 0, 0, ''),
(32, 5, 'Adventure_boy_240x320.jar', 'http://3g.myglobe.com.ph@tegos.ru/java/new-java/adventure_boy_240x320.jar', 1250641468, 0, 3, 0, '', '', 0, 0, 0, ''),
(33, 5, 'age_of_empires_3_128x160_240x320.jar', 'http://3g.myglobe.com.ph@tegos.ru/java/new-java/age_of_empires_3_128x160_240x320.jar', 1250641521, 0, 3, 0, '', '', 0, 0, 0, ''),
(34, 5, 'age_of_japan_240x320.jar', 'http://3g.myglobe.com.ph@tegos.ru/java/new-java/age_of_japan_240x320.jar', 1250641634, 0, 3, 0, '', '', 0, 0, 0, ''),
(35, 5, 'aircraft_gear_240x320.jar', 'http://3g.myglobe.com.ph@tegos.ru/java/new-java/aircraft_gear_240x320.jar', 1250641683, 0, 3, 0, '', '', 0, 0, 0, ''),
(36, 5, 'alien_hominid_redialed_240x320.jar', 'http://3g.myglobe.com.ph@tegos.ru/java/new-java/alien_hominid_redialed_240x320.jar', 1250641819, 0, 3, 0, '', '', 0, 0, 0, ''),
(37, 5, 'ama_dress_to_impress_240x320.jar', 'http://3g.myglobe.com.ph@tegos.ru/java/new-java/ama_dress_to_impress_240x320.jar', 1250641865, 0, 3, 0, '', '', 0, 0, 0, ''),
(38, 5, 'ama_wrestling_240x320_nokia.jar', 'http://3g.myglobe.com.ph@tegos.ru/java/new-java/ama_wrestling_240x320_nokia.jar', 1250641922, 0, 3, 0, '', '', 0, 0, 0, ''),
(39, 5, 'aqua_pears_240x320_nokia.jar', 'http://3g.myglobe.com.ph@tegos.ru/java/new-java/aqua_pears_240x320_nokia.jar', 1250642017, 0, 3, 0, '', '', 0, 0, 0, ''),
(40, 5, 'bar_top_basketball_240x320.jar', 'http://3g.myglobe.com.ph@tegos.ru/java/new-java/bar_top_basketball_240x320.jar', 1250642110, 0, 3, 1, '', '', 0, 0, 0, ''),
(41, 5, 'Pussycat_Dolls_Hush_Hush_Remix.mp3', 'http://3g.myglobe.com.ph@94.101.90.251/ringtones/fulltrackbig/Pussycat_Dolls_Hush_Hush_Remix.mp3', 1250642161, 0, 1, 3, '', '', 0, 0, 0, ''),
(42, 15, 'motivation', 'http://www.quotesarcade.com/graphics/motivation/motivation_quotes_graphics_a3.gif', 1250655469, 0, 2, 1, '', '', 0, 0, 0, ''),
(43, 15, 'future', 'http://www.quotesarcade.com/graphics/motivation/motivation_quotes_graphics_a2.gif', 1250655565, 0, 2, 1, '', '', 0, 0, 0, ''),
(44, 15, 'love', 'http://www.quotesarcade.com/graphics/love/love_quotes_graphics_c1.gif', 1250655682, 0, 2, 2, '', '', 0, 0, 0, ''),
(45, 15, 'lovingU', 'http://www.quotesarcade.com/graphics/love/love_quotes_graphics_c4.gif', 1250655758, 0, 2, 1, '', '', 0, 0, 0, ''),
(46, 15, 'luvurself', 'http://www.quotesarcade.com/graphics/love/love_quotes_graphics_c3.gif', 1250655815, 0, 2, 3, '', '', 0, 0, 0, ''),
(47, 15, 'fairy', 'http://fantasyartdesign.com/free-wallpapers/imgs/new/246The_Fairies_Vale.jpg', 1250655981, 0, 2, 2, '', '', 0, 0, 0, ''),
(48, 15, 'lavender', 'http://i328.photobucket.com/albums/l350/_butterfly_1013/5616.gif', 1250656158, 0, 2, 1, '', '', 0, 0, 0, ''),
(49, 15, 'hope', 'http://i.mynicespace.com/556/55604.gif', 1250656261, 0, 2, 1, '', '', 0, 0, 0, ''),
(50, 15, 'blue eyes', 'http://fsb.zedge.net/content/8/6/8/5/1-2207498-8685-t.jpg', 1250656636, 0, 2, 1, '', '', 0, 0, 0, ''),
(52, 15, 'regrets', 'http://fsa.zedge.net/content/3/9/8/7/1-938885-3987-t.jpg', 1250656885, 0, 2, 3, '', '', 0, 0, 0, ''),
(54, 15, 'for pasawayers!', 'http://fsb.zedge.net/content/1/6/6/7/1-2555014-1667-t.jpg', 1250657137, 0, 2, 1, '', '', 0, 0, 0, ''),
(55, 15, 'for butiki', 'http://fsa.zedge.net/content/3/1/1/1/1-1914886-3111-t.jpg', 1250657336, 0, 2, 2, '', '', 0, 0, 0, ''),
(56, 15, 'loversmoon', 'http://fsa.zedge.net/content/4/5/7/8/1-2715275-4578-t.jpg', 1250657727, 0, 2, 3, '', '', 0, 0, 0, ''),
(57, 10, 'operaMini 4.2 ph. red cn b use w/out load', 'http://3g.myglobe.com.ph@mobshare.info/?d=58062', 1250686006, 0, 0, 3, '', '', 0, 0, 0, ''),
(59, 8, 'afraid_cat ', 'http://rela.wapheart.com/files/acat1.3gp', 1250732934, 0, 4, 10, '', '', 0, 0, 0, ''),
(61, 47, 'Om3.12 hifi.jar(globe)', 'http://m.olx.ph@unltdwap.wapmod.com/Application/OperaMini_3.12_v2_NiNE14PDMOD_S60_176x208_Globe.jar', 1250848985, 0, 3, 4, '', '', 0, 0, 0, ''),
(62, 5, 'magic_wars_240x320.jar', 'http://3g.myglobe.com.ph@chateg.ru/java/categor/strategii/magic_wars_240x320.jar', 1250856682, 0, 3, 0, '', '', 0, 0, 0, ''),
(63, 5, 'shadow_zone_240x320.jar', 'http://3g.myglobe.com.ph@chateg.ru/java/categor/strategii/shadow_zone_240x320.jar', 1250856816, 0, 3, 0, '', '', 0, 0, 0, ''),
(64, 5, 'sex_hunt_240x320.jar', 'http://3g.myglobe.com.ph@chateg.ru/java/new/sex_hunt_240x320.jar', 1250856856, 0, 3, 0, '', '', 0, 0, 0, ''),
(65, 5, 'yamakasi_masters_240x320.jar', 'http://3g.myglobe.com.ph@tegos.ru/java/new-java/yamakasi_masters_240x320.jar', 1250857415, 0, 3, 0, '', '', 0, 0, 0, ''),
(66, 5, 'x_factor_240x320.jar', 'http://3g.myglobe.com.ph@tegos.ru/java/new-java/x_factor_240x320.jar', 1250857646, 0, 3, 0, '', '', 0, 0, 0, ''),
(67, 5, 'wwe_smackdown_2008_240x320.jar', 'http://3g.myglobe.com.ph@tegos.ru/java/new-java/wwe_smackdown_2008_240x320.jar', 1250857833, 0, 3, 0, '', '', 0, 0, 0, ''),
(68, 5, 'wwe_smackdown_vs_raw_2009_240x320.jar', 'http://3g.myglobe.com.ph@tegos.ru/java/new-java/wwe_smackdown_vs_raw_2009_240x320.jar', 1250857950, 0, 3, 1, '', '', 0, 0, 0, ''),
(69, 5, 'secret_of_rah_240x320.jar', 'http://3g.myglobe.com.ph@tegos.ru/java/new-java/secret_of_rah_240x320.jar', 1250858111, 0, 3, 0, '', '', 0, 0, 0, ''),
(70, 5, 'saints_row_2_240x320.jar', 'http://3g.myglobe.com.ph@tegos.ru/java/new-java/saints_row_2_240x320.jar', 1250858253, 0, 3, 0, '', '', 0, 0, 0, ''),
(71, 5, 'rolling_with_katamari_240x320_nokia.jar', 'http://3g.myglobe.com.ph@tegos.ru/java/new-java/rolling_with_katamari_240x320_nokia.jar', 1250858337, 0, 3, 0, '', '', 0, 0, 0, ''),
(72, 5, 'tong_yuan_240x320_rus.jar', 'http://3g.myglobe.com.ph@tegos.ru/java/new/tong_yuan_240x320_rus.jar', 1250858419, 0, 3, 0, '', '', 0, 0, 0, ''),
(73, 47, 'Om4.6 multiwindow.jar', 'http://wapx.amob.com@unltdwap.xpmob.com/Application/ModBrowsers/mini-windows4.6.jar', 1250907069, 0, 3, 2, '', '', 0, 0, 0, ''),
(74, 47, 'Om4.2 multiwindow.jar', 'http://wapx.amob.com@unltdwap.xpmob.com/Application/ModBrowsers/mini-windows128x160.jar', 1250907195, 0, 3, 2, '', '', 0, 0, 0, ''),
(76, 77, '', '', 1411787538, 0, 0, 0, '', '', 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_vip`
--

CREATE TABLE IF NOT EXISTS `ibwf_vip` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `vip` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `ibwf_vip`
--

INSERT INTO `ibwf_vip` (`id`, `uid`, `vip`) VALUES
(1, 77, 1),
(2, 77, 2),
(3, 77, 3),
(4, 77, 4),
(5, 77, 5),
(6, 77, 6);

-- --------------------------------------------------------

--
-- Table structure for table `ibwf_xinfo`
--

CREATE TABLE IF NOT EXISTS `ibwf_xinfo` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `uid` int(100) NOT NULL DEFAULT '0',
  `city` varchar(50) NOT NULL DEFAULT '',
  `street` varchar(50) NOT NULL DEFAULT '',
  `phoneno` varchar(20) NOT NULL DEFAULT '',
  `Movies` varchar(250) NOT NULL DEFAULT '',
  `Books` varchar(250) NOT NULL DEFAULT '',
  `realname` varchar(100) NOT NULL DEFAULT '',
  `Work` varchar(100) NOT NULL DEFAULT '',
  `College` varchar(50) NOT NULL DEFAULT '',
  `School` varchar(100) NOT NULL DEFAULT '',
  `favsport` varchar(100) NOT NULL DEFAULT '',
  `favmusic` varchar(100) NOT NULL DEFAULT '',
  `budsonly` char(1) NOT NULL DEFAULT '1',
  `Shows` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uid` (`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `ibwf_xinfo`
--

INSERT INTO `ibwf_xinfo` (`id`, `uid`, `city`, `street`, `phoneno`, `Movies`, `Books`, `realname`, `Work`, `College`, `School`, `favsport`, `favmusic`, `budsonly`, `Shows`) VALUES
(1, 12, '', '', '', '', '', '', '', '', '', '', '', '1', ''),
(2, 15, 'city of angels', 'street of nowhere', 'unfigured', 'frnly, aproachable pipol', 'liars', '', '', 'black', '', 'chess', 'rnb, alternative and pop', '1', ''),
(3, 29, '', '', '', '', '', 'Anecito', 'Davao', 'Black syempre', 'Im wrking in jollibe as a crew" bee happy"', '', '', '1', ''),
(4, 70, 'basta malapit kila yhen_yhen', '', '', 'eating', 'backfighters', '', '', '', '', 'badminton', 'i never knew love', '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `kasino`
--

CREATE TABLE IF NOT EXISTS `kasino` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL DEFAULT '0',
  `combo` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `km_admins`
--

CREATE TABLE IF NOT EXISTS `km_admins` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `km_battlerecords`
--

CREATE TABLE IF NOT EXISTS `km_battlerecords` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `attid` bigint(20) NOT NULL DEFAULT '0',
  `attname` varchar(255) NOT NULL DEFAULT '',
  `result` tinytext NOT NULL,
  `landlost` bigint(20) NOT NULL DEFAULT '0',
  `victimid` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `km_forums`
--

CREATE TABLE IF NOT EXISTS `km_forums` (
  `forumID` bigint(20) NOT NULL AUTO_INCREMENT,
  `forumname` varchar(255) NOT NULL DEFAULT '',
  `timelastpost` varchar(255) NOT NULL DEFAULT '',
  `lastposter` varchar(255) NOT NULL DEFAULT '',
  `numtopics` bigint(20) NOT NULL DEFAULT '0',
  `numposts` bigint(20) NOT NULL DEFAULT '0',
  `descrip` tinytext NOT NULL,
  `forumorder` int(11) NOT NULL DEFAULT '0',
  `realtimelastpost` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`forumID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `km_messages`
--

CREATE TABLE IF NOT EXISTS `km_messages` (
  `msgid` bigint(20) NOT NULL AUTO_INCREMENT,
  `posterid` bigint(20) NOT NULL DEFAULT '0',
  `parentid` bigint(20) NOT NULL DEFAULT '0',
  `time` bigint(20) NOT NULL DEFAULT '0',
  `numreplies` bigint(20) NOT NULL DEFAULT '0',
  `realtime` varchar(255) NOT NULL DEFAULT '',
  `subject` tinytext NOT NULL,
  `message` mediumtext NOT NULL,
  `lastreplied` varchar(255) NOT NULL DEFAULT '',
  `forumparent` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`msgid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `km_monsters`
--

CREATE TABLE IF NOT EXISTS `km_monsters` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `skill` bigint(20) NOT NULL DEFAULT '0',
  `pointsifkilled` bigint(255) NOT NULL DEFAULT '0',
  `goldworth` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `km_users`
--

CREATE TABLE IF NOT EXISTS `km_users` (
  `ID` bigint(21) NOT NULL AUTO_INCREMENT,
  `status` int(11) NOT NULL DEFAULT '0',
  `playername` varchar(15) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `skillpts` bigint(21) NOT NULL DEFAULT '0',
  `dead` varchar(255) NOT NULL DEFAULT '',
  `killer` varchar(255) NOT NULL DEFAULT '',
  `numberattck` bigint(20) NOT NULL DEFAULT '0',
  `justattacked` int(4) NOT NULL DEFAULT '0',
  `honor` int(11) NOT NULL DEFAULT '0',
  `lastaction` bigint(20) NOT NULL DEFAULT '0',
  `gold` bigint(20) NOT NULL DEFAULT '0',
  `land` bigint(20) NOT NULL DEFAULT '0',
  `offarmy` bigint(20) NOT NULL DEFAULT '0',
  `dffarmy` bigint(6) NOT NULL DEFAULT '0',
  `science` bigint(20) NOT NULL DEFAULT '0',
  `validated` int(11) NOT NULL DEFAULT '0',
  `validkey` varchar(255) NOT NULL DEFAULT '',
  `numturns` bigint(20) NOT NULL DEFAULT '0',
  `tsgone` bigint(20) NOT NULL DEFAULT '0',
  `oldtime` bigint(20) NOT NULL DEFAULT '0',
  `lasttime` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `krisha`
--

CREATE TABLE IF NOT EXISTS `krisha` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `city` int(2) NOT NULL DEFAULT '0',
  `house` text NOT NULL,
  `money` int(2) NOT NULL DEFAULT '0',
  `band` text NOT NULL,
  `users` text NOT NULL,
  `time` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lastview`
--

CREATE TABLE IF NOT EXISTS `lastview` (
  `whonick` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `lastview` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `ltime` int(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`whonick`,`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `messagi`
--

CREATE TABLE IF NOT EXISTS `messagi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kto` int(11) NOT NULL DEFAULT '0',
  `komu` int(11) NOT NULL DEFAULT '0',
  `msg` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `misc`
--

CREATE TABLE IF NOT EXISTS `misc` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `dscr` varchar(200) NOT NULL DEFAULT '',
  `text` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `osobnyaki`
--

CREATE TABLE IF NOT EXISTS `osobnyaki` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bandname` text NOT NULL,
  `type` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pet`
--

CREATE TABLE IF NOT EXISTS `pet` (
  `uid` int(10) NOT NULL DEFAULT '0',
  `born` int(20) NOT NULL DEFAULT '0',
  `weight` int(10) NOT NULL DEFAULT '0',
  `name` varchar(30) NOT NULL DEFAULT '',
  `alive` int(1) NOT NULL DEFAULT '0',
  `fed` int(20) NOT NULL DEFAULT '0',
  `Colour` varchar(15) NOT NULL DEFAULT '',
  `game` int(20) NOT NULL DEFAULT '0',
  `bathing` int(20) NOT NULL DEFAULT '0',
  `death` int(20) NOT NULL DEFAULT '0',
  `mood` int(2) NOT NULL DEFAULT '5',
  `size` int(10) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pet`
--

INSERT INTO `pet` (`uid`, `born`, `weight`, `name`, `alive`, `fed`, `Colour`, `game`, `bathing`, `death`, `mood`, `size`) VALUES
(1, 1250873066, 1750, 'riderz', 0, 1250873438, 'black', 1250873452, 1250847866, 1251003063, 7, 1),
(8, 1250874346, 500, 'mybf', 0, 1250849146, 'brown', 1250849146, 1250849146, 1250978761, 5, 1),
(10, 1250874834, 500, 'yurikoh', 0, 1250849634, 'pink', 1250875402, 1250849634, 1250979248, 7, 1),
(11, 1250876165, 300, 'DDM', 0, 1250942322, 'green', 1250876210, 1250850965, 1409144453, 7, 1),
(2, 1250883953, 750, 'frogy', 0, 1250883997, 'green', 1250884026, 1250924591, 1409144453, 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sites`
--

CREATE TABLE IF NOT EXISTS `sites` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `sitename` varchar(30) NOT NULL DEFAULT '',
  `cid` int(10) NOT NULL DEFAULT '0',
  `sitelink` varchar(200) NOT NULL DEFAULT '',
  `slogo` varchar(200) NOT NULL DEFAULT '',
  `uid` int(10) NOT NULL DEFAULT '0',
  `hin` int(10) NOT NULL DEFAULT '0',
  `hout` int(10) NOT NULL DEFAULT '0',
  `dhits` int(10) NOT NULL DEFAULT '0',
  `thits` int(12) NOT NULL DEFAULT '0',
  `banned` int(5) NOT NULL DEFAULT '0',
  `dscr` varchar(200) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `sitelink` (`sitelink`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tribes_fighters`
--

CREATE TABLE IF NOT EXISTS `tribes_fighters` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `uid` int(100) NOT NULL DEFAULT '0',
  `fighters` int(100) NOT NULL DEFAULT '0',
  `start` int(100) NOT NULL DEFAULT '0',
  `finish` int(100) NOT NULL DEFAULT '0',
  `rez` int(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tusers`
--

CREATE TABLE IF NOT EXISTS `tusers` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL DEFAULT '',
  `pass` varchar(60) NOT NULL DEFAULT '',
  `admin` int(5) NOT NULL DEFAULT '0',
  `banned` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE IF NOT EXISTS `upload` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `file` varchar(200) NOT NULL DEFAULT '',
  `name` varchar(200) NOT NULL DEFAULT '',
  `description` varchar(250) NOT NULL DEFAULT '',
  `size` varchar(50) NOT NULL DEFAULT '',
  `filename` varchar(200) NOT NULL DEFAULT '',
  `ftype` varchar(10) NOT NULL DEFAULT '',
  `dir` varchar(100) NOT NULL DEFAULT '',
  `view` int(20) NOT NULL DEFAULT '0',
  `download` int(20) NOT NULL DEFAULT '0',
  `browser` varchar(200) NOT NULL DEFAULT '',
  `ip` varchar(200) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
