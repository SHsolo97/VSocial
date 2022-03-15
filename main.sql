-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2019 at 06:20 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `main`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(10) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `name` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `name`) VALUES
(1, 'suhail', 'password', 'Suhail Haroon');

-- --------------------------------------------------------

--
-- Table structure for table `enroll`
--

CREATE TABLE `enroll` (
  `slno` bigint(10) NOT NULL,
  `userid` bigint(10) NOT NULL,
  `tid` bigint(11) NOT NULL,
  `sid` bigint(11) NOT NULL,
  `grade` varchar(2) NOT NULL,
  `marks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enroll`
--

INSERT INTO `enroll` (`slno`, `userid`, `tid`, `sid`, `grade`, `marks`) VALUES
(2, 1, 1, 1, 'S', 0),
(3, 1, 1, 3, 'S', 0),
(8, 8, 1, 1, 'A', 0),
(9, 2, 1, 1, 'S', 0),
(10, 2, 1, 3, 'A', 0),
(11, 1, 1, 2, 'S', 0),
(12, 1, 1, 4, 'S', 0),
(13, 1, 1, 5, 'S', 0),
(14, 1, 1, 6, 'S', 0),
(15, 1, 1, 7, 'A', 0),
(16, 1, 1, 8, 'S', 0),
(17, 1, 1, 9, 'S', 0),
(18, 1, 1, 10, 'A', 0),
(19, 2, 1, 2, 'B', 0),
(20, 2, 1, 4, 'B', 0),
(21, 2, 1, 5, 'C', 0),
(22, 2, 1, 6, 'S', 0),
(23, 2, 1, 7, 'A', 0),
(24, 8, 1, 14, 'B', 0),
(25, 8, 1, 10, 'B', 0),
(26, 8, 1, 11, 'A', 0),
(27, 8, 1, 9, 'S', 0),
(28, 4, 1, 3, '', 0),
(29, 4, 1, 1, 'A', 0),
(30, 4, 1, 12, '', 0),
(31, 3, 1, 3, '', 0),
(32, 3, 1, 1, 'C', 0),
(33, 3, 1, 14, 'C', 0),
(34, 5, 1, 1, 'S', 0),
(35, 5, 1, 3, '', 0),
(36, 5, 1, 14, 'D', 0),
(37, 11, 1, 1, 'B', 0),
(38, 11, 1, 3, '', 0),
(39, 11, 1, 14, 'A', 0),
(40, 12, 1, 1, 'E', 0),
(41, 12, 1, 3, '', 0),
(42, 12, 1, 14, 'C', 0),
(43, 9, 1, 1, 'S', 0),
(44, 9, 1, 3, '', 0),
(45, 9, 1, 14, 'D', 0),
(46, 10, 1, 1, 'D', 0),
(47, 10, 1, 3, '', 0),
(48, 10, 1, 14, 'D', 0),
(49, 6, 1, 7, 'D', 0),
(50, 7, 1, 3, 'B', 0);

-- --------------------------------------------------------

--
-- Table structure for table `friend`
--

CREATE TABLE `friend` (
  `id` bigint(100) NOT NULL,
  `userid` bigint(100) NOT NULL,
  `friendid` bigint(100) NOT NULL,
  `status` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `timestamp` bigint(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `friend`
--

INSERT INTO `friend` (`id`, `userid`, `friendid`, `status`, `time`, `timestamp`) VALUES
(1, 2, 1, '1', '2017-10-14 11:19:35', 1507979993),
(6, 4, 2, '1', '2017-10-28 20:01:32', 1509221329),
(7, 4, 1, '1', '2017-10-28 20:01:58', 1509220934),
(8, 4, 3, '1', '2017-10-28 20:02:04', 1509220949),
(9, 3, 1, '1', '2017-10-28 20:02:35', 1509225065),
(10, 3, 2, '1', '2017-10-28 20:02:40', 1509221324),
(13, 4, 7, '1', '2017-10-29 20:46:55', 1509310029),
(14, 4, 6, '1', '2017-10-29 20:50:11', 1509310312),
(15, 5, 2, '1', '2017-10-29 20:50:30', 1509310243),
(16, 4, 5, '1', '2017-10-29 20:53:02', 1509310393),
(17, 2, 7, '1', '2017-10-29 20:58:32', 1509310724),
(18, 2, 6, '1', '2017-10-29 21:02:01', 1509310932),
(19, 6, 3, '1', '2017-10-29 21:04:56', 1509311105),
(20, 6, 5, '1', '2017-10-29 21:17:15', 1509311847),
(21, 1, 6, '1', '2017-10-30 16:32:11', 1509381143),
(23, 1, 7, '1', '2017-11-02 09:02:10', 1509613350),
(28, 1, 9, '1', '2018-10-29 04:23:44', 1540965329),
(27, 1, 10, '1', '2018-10-29 04:23:34', 1540787014),
(29, 9, 10, '0', '2018-10-31 04:27:18', 1540960038),
(30, 8, 10, '0', '2018-10-31 04:27:40', 1540960060),
(31, 8, 1, '1', '2018-10-31 05:55:13', 1540965376),
(32, 1, 11, '1', '2018-11-13 07:37:15', 1542094635),
(33, 1, 12, '1', '2018-11-13 07:37:24', 1542094644),
(34, 1, 5, '1', '2018-11-13 07:38:25', 1542094705),
(35, 13, 1, '1', '2018-11-14 12:55:44', 1548863635),
(36, 2, 8, '1', '2019-03-12 13:18:06', 1552396724);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` bigint(100) NOT NULL,
  `userid` bigint(100) NOT NULL,
  `friendid` bigint(100) NOT NULL,
  `content` text COLLATE latin1_general_ci NOT NULL,
  `timestamp` int(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `userid`, `friendid`, `content`, `timestamp`) VALUES
(1, 1, 2, 'hey', 1509210806),
(2, 1, 2, 'how are you', 1509210808),
(3, 1, 2, 'aaa', 1509210822),
(4, 1, 2, 'aaa', 1509210825),
(5, 1, 2, 'a', 1509210828),
(6, 1, 2, 'aaa<br>a', 1509210842),
(7, 1, 2, 'okay', 1509211132),
(8, 1, 2, 'aasas', 1509211133),
(9, 1, 2, 'as', 1509211133),
(10, 1, 2, 'a', 1509211133),
(11, 1, 2, 's', 1509211133),
(12, 1, 2, 'as', 1509211134),
(13, 1, 2, 'a', 1509211134),
(14, 1, 2, 'sa', 1509211134),
(15, 1, 2, 's', 1509211134),
(16, 1, 2, 'a', 1509211134),
(17, 1, 2, 'sa', 1509211134),
(18, 1, 2, 's', 1509211134),
(19, 1, 2, 'a', 1509211135),
(20, 1, 2, 's', 1509211135),
(21, 1, 2, 'sa', 1509211135),
(22, 1, 2, 's', 1509211135),
(23, 1, 2, 'a', 1509211135),
(24, 1, 2, 's', 1509211135),
(25, 1, 2, 'a', 1509211136),
(26, 1, 2, 's', 1509211136),
(27, 1, 2, 'a', 1509211136),
(28, 1, 2, 's', 1509211136),
(29, 1, 2, 'a', 1509211136),
(30, 1, 2, 'sa', 1509211136),
(31, 1, 2, 's', 1509211136),
(32, 1, 2, 'a', 1509211137),
(33, 1, 2, 's', 1509211137),
(34, 1, 2, 'a', 1509211137),
(35, 1, 2, 's', 1509211137),
(36, 1, 2, 'as', 1509211137),
(37, 1, 2, 'as', 1509211138),
(38, 1, 2, 'as', 1509211138),
(39, 1, 2, 'aa', 1509212920),
(40, 1, 2, 'sdasd', 1509212923),
(41, 1, 2, 'hi', 1509213036),
(42, 1, 2, 'hey', 1509213243),
(43, 1, 2, 'app', 1509213253),
(44, 1, 2, 'hi', 1509213760),
(45, 1, 2, 'hi', 1509213761),
(46, 2, 1, 'hi', 1509213863),
(47, 2, 1, 'how are you', 1509213869),
(48, 2, 1, 'good', 1509213930),
(49, 2, 1, 'ok', 1509214016),
(50, 2, 1, 'a', 1509214372),
(51, 2, 1, 'asa', 1509216045),
(52, 2, 1, 'asa', 1509216048),
(53, 2, 1, 'asaas', 1509216049),
(54, 2, 1, 'okay', 1509216058),
(55, 2, 1, 'aa', 1509216161),
(56, 2, 1, 'hey', 1509216171),
(57, 2, 1, 'hey', 1509216172),
(58, 2, 1, 'asa', 1509216174),
(59, 2, 1, 'asa', 1509216174),
(60, 2, 1, 'asa', 1509216175),
(61, 2, 1, 'ok', 1509216178),
(62, 2, 1, 'ooo', 1509216181),
(63, 2, 1, 'o', 1509216183),
(64, 2, 1, 'as', 1509216186),
(65, 2, 1, 'o', 1509216189),
(66, 2, 1, 'asa', 1509216193),
(67, 2, 1, 'as', 1509216208),
(68, 2, 1, 'oo', 1509216211),
(69, 2, 1, 'o', 1509216216),
(70, 2, 1, 'apple', 1509216273),
(71, 2, 1, 'hey', 1509216435),
(72, 2, 1, 'hey', 1509217005),
(73, 2, 1, 'hopw y', 1509217008),
(74, 1, 2, 'how are you', 1509217131),
(75, 1, 2, 'fine?', 1509217136),
(76, 1, 2, 'aaa', 1509217174),
(77, 1, 2, 'ok', 1509217179),
(78, 1, 2, 'aa', 1509217189),
(79, 1, 2, 'aaa', 1509217190),
(80, 1, 2, 'a', 1509217191),
(81, 1, 2, 'a', 1509217192),
(82, 1, 2, 'a', 1509217193),
(83, 1, 2, 'a', 1509217193),
(84, 1, 2, 'hi', 1509217290),
(85, 1, 2, 'asa', 1509217368),
(86, 1, 2, 'how', 1509217371),
(87, 1, 2, 'how', 1509217371),
(88, 1, 2, 'how', 1509217372),
(89, 1, 2, 'ok', 1509217376),
(90, 1, 2, 'hi', 1509217382),
(91, 1, 2, 'asas', 1509217425),
(92, 1, 2, 'a', 1509217427),
(93, 1, 2, 'hi', 1509217458),
(94, 1, 2, 'how are you', 1509217462),
(95, 1, 2, 'hi', 1509217472),
(96, 1, 2, 'how are you', 1509217475),
(97, 1, 2, 'okay', 1509217479),
(98, 1, 2, 'okay', 1509217481),
(99, 1, 2, 'okya', 1509217482),
(100, 1, 2, 'asda', 1509217486),
(101, 1, 2, 'asda', 1509217486),
(102, 1, 2, 'and wher', 1509217489),
(103, 1, 2, 'okay', 1509217522),
(104, 1, 2, 'ok', 1509217545),
(105, 1, 2, 'hi', 1509217606),
(106, 1, 2, 'how are you', 1509217609),
(107, 1, 2, 'good', 1509217612),
(108, 1, 2, 'okay', 1509217613),
(109, 1, 2, 'so where are you now', 1509217618),
(110, 1, 2, 'apple', 1509217654),
(111, 1, 2, 'okat', 1509217656),
(112, 1, 2, 'how are you', 1509217718),
(113, 1, 2, 'hey', 1509218637),
(114, 1, 2, 'hope youre fine', 1509218659),
(115, 1, 2, 'jok==', 1509219505),
(116, 1, 2, 'ok', 1509220182),
(117, 1, 2, 'aa', 1509220184),
(118, 1, 2, 'aa', 1509220522),
(119, 2, 3, 'hey', 1509221353),
(120, 2, 3, 'how are you doing', 1509221356),
(121, 2, 4, 'hey ', 1509221361),
(122, 2, 4, 'how are you doing', 1509221364),
(123, 1, 4, 'hey', 1509225935),
(124, 1, 2, 'ok', 1509226410),
(125, 1, 3, 'hey bill how are you?', 1509308213),
(126, 3, 1, 'hey suhail im good', 1509308370),
(127, 3, 1, 'hows your course going?', 1509308376),
(128, 1, 3, 'its great! thanks for asking', 1509308385),
(129, 3, 1, 'good to hear', 1509308393),
(130, 3, 1, 'this website is really nice', 1509308424),
(131, 1, 3, 'thank you! :)', 1509308439),
(132, 3, 1, 'your welcome', 1509308445),
(133, 3, 1, 'do you need any funding for this', 1509308470),
(134, 3, 1, '?', 1509308472),
(135, 1, 3, 'no its alright ', 1509308483),
(136, 1, 3, 'its self-financed ', 1509308489),
(137, 1, 3, 'thanks for the offer though, much appreciated', 1509308508),
(138, 3, 1, 'alright', 1509308513),
(139, 3, 1, 'hope everything goes well', 1509308521),
(140, 1, 3, 'thank you ', 1509308527),
(141, 1, 3, 'and you too!', 1509308529),
(142, 6, 3, 'hey', 1509311956),
(143, 1, 3, 'helo', 1509347629),
(144, 1, 2, 'helo', 1509347637),
(145, 1, 2, 'hi', 1509381243),
(146, 1, 3, 'hello', 1509613434),
(147, 1, 3, 'hi', 1512203594),
(148, 1, 4, 'hi', 1512203630),
(149, 1, 3, 'hello', 1514221747),
(150, 1, 3, 'hey you up?', 1514221751),
(151, 1, 3, 'hey', 1514535972),
(152, 1, 3, 'yo', 1540960387);

-- --------------------------------------------------------

--
-- Table structure for table `notification_checked_on`
--

CREATE TABLE `notification_checked_on` (
  `id` bigint(100) NOT NULL,
  `userid` bigint(100) NOT NULL,
  `type` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `timestamp` varchar(30) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `notification_checked_on`
--

INSERT INTO `notification_checked_on` (`id`, `userid`, `type`, `timestamp`) VALUES
(1, 1, 'f', '1507979850'),
(2, 1, 'm', '1507979850'),
(3, 1, 'a', '1507979850'),
(4, 1, 'f', '1507979893'),
(5, 1, 'a', '1507979896'),
(6, 2, 'f', '1507979962'),
(7, 2, 'm', '1507979962'),
(8, 2, 'a', '1507979962'),
(9, 2, 'a', '1507979980'),
(10, 2, 'f', '1507979981'),
(11, 1, 'f', '1507979987'),
(12, 2, 'a', '1507980008'),
(13, 1, 'a', '1508999623'),
(14, 1, 'a', '1509120320'),
(15, 1, 'a', '1509120321'),
(16, 1, 'f', '1509122466'),
(17, 1, 'a', '1509122468'),
(18, 1, 'f', '1509123062'),
(19, 1, 'a', '1509123067'),
(20, 1, 'f', '1509203290'),
(21, 1, 'a', '1509203293'),
(22, 1, 'f', '1509206729'),
(23, 1, 'a', '1509206730'),
(24, 1, 'f', '1509209194'),
(25, 1, 'a', '1509210949'),
(26, 1, 'f', '1509210952'),
(27, 1, 'f', '1509212166'),
(28, 1, 'a', '1509212169'),
(29, 1, 'f', '1509212198'),
(30, 2, 'f', '1509216612'),
(31, 2, 'a', '1509216614'),
(32, 2, 'a', '1509216617'),
(33, 1, 'f', '1509217750'),
(34, 1, 'a', '1509217751'),
(35, 1, 'f', '1509217963'),
(36, 1, 'a', '1509217966'),
(37, 1, 'f', '1509219597'),
(38, 1, 'a', '1509219600'),
(39, 3, 'f', '1509220791'),
(40, 3, 'm', '1509220791'),
(41, 3, 'a', '1509220791'),
(42, 3, 'f', '1509220829'),
(43, 3, 'a', '1509220832'),
(44, 4, 'f', '1509220862'),
(45, 4, 'm', '1509220862'),
(46, 4, 'a', '1509220862'),
(47, 1, 'f', '1509220931'),
(48, 3, 'f', '1509220946'),
(49, 4, 'a', '1509220995'),
(50, 4, 'a', '1509220997'),
(51, 2, 'f', '1509221163'),
(52, 2, 'f', '1509221320'),
(53, 2, 'f', '1509221327'),
(54, 1, 'f', '1509223225'),
(55, 1, 'f', '1509223233'),
(56, 5, 'f', '1509223595'),
(57, 5, 'm', '1509223595'),
(58, 5, 'a', '1509223595'),
(59, 1, 'a', '1509225057'),
(60, 1, 'f', '1509225060'),
(61, 1, 'a', '1509225068'),
(62, 1, 'a', '1509225597'),
(63, 1, 'a', '1509225600'),
(64, 1, 'a', '1509225603'),
(65, 1, 'a', '1509225607'),
(66, 1, 'a', '1509225695'),
(67, 1, 'a', '1509225696'),
(68, 1, 'f', '1509225699'),
(69, 1, 'a', '1509225704'),
(70, 1, 'f', '1509225706'),
(71, 1, 'f', '1509225764'),
(72, 1, 'a', '1509225767'),
(73, 1, 'f', '1509225770'),
(74, 1, 'a', '1509225773'),
(75, 1, 'f', '1509225777'),
(76, 1, 'f', '1509306304'),
(77, 3, 'f', '1509307150'),
(78, 3, 'a', '1509307570'),
(79, 3, 'f', '1509307574'),
(80, 6, 'f', '1509309094'),
(81, 6, 'm', '1509309094'),
(82, 6, 'a', '1509309094'),
(83, 7, 'f', '1509309201'),
(84, 7, 'm', '1509309201'),
(85, 7, 'a', '1509309201'),
(86, 4, 'a', '1509309799'),
(87, 4, 'a', '1509309863'),
(88, 4, 'a', '1509309864'),
(89, 4, 'a', '1509309867'),
(90, 4, 'f', '1509309870'),
(91, 4, 'f', '1509309876'),
(92, 4, 'a', '1509309879'),
(93, 4, 'a', '1509309892'),
(94, 4, 'a', '1509309897'),
(95, 4, 'a', '1509309904'),
(96, 4, 'a', '1509309993'),
(97, 7, 'f', '1509310025'),
(98, 7, 'a', '1509310033'),
(99, 4, 'a', '1509310179'),
(100, 4, 'a', '1509310181'),
(101, 4, 'a', '1509310183'),
(102, 4, 'a', '1509310194'),
(103, 4, 'a', '1509310196'),
(104, 4, 'a', '1509310206'),
(105, 5, 'a', '1509310223'),
(106, 2, 'a', '1509310238'),
(107, 2, 'f', '1509310239'),
(108, 2, 'a', '1509310245'),
(109, 5, 'a', '1509310253'),
(110, 5, 'a', '1509310255'),
(111, 5, 'a', '1509310259'),
(112, 5, 'a', '1509310260'),
(113, 5, 'a', '1509310260'),
(114, 5, 'a', '1509310261'),
(115, 5, 'a', '1509310261'),
(116, 5, 'a', '1509310262'),
(117, 5, 'f', '1509310280'),
(118, 5, 'a', '1509310280'),
(119, 5, 'a', '1509310286'),
(120, 6, 'f', '1509310308'),
(121, 4, 'a', '1509310326'),
(122, 5, 'f', '1509310389'),
(123, 4, 'a', '1509310432'),
(124, 4, 'a', '1509310441'),
(125, 7, 'f', '1509310722'),
(126, 2, 'a', '1509310741'),
(127, 2, 'a', '1509310743'),
(128, 6, 'f', '1509310927'),
(129, 2, 'a', '1509310942'),
(130, 2, 'a', '1509310954'),
(131, 2, 'a', '1509310956'),
(132, 2, 'a', '1509310962'),
(133, 3, 'f', '1509311102'),
(134, 6, 'a', '1509311250'),
(135, 6, 'a', '1509311253'),
(136, 6, 'a', '1509311471'),
(137, 6, 'a', '1509311477'),
(138, 6, 'a', '1509311512'),
(139, 6, 'a', '1509311547'),
(140, 6, 'a', '1509311597'),
(141, 6, 'a', '1509311600'),
(142, 6, 'a', '1509311684'),
(143, 6, 'a', '1509311687'),
(144, 6, 'f', '1509311701'),
(145, 6, 'a', '1509311816'),
(146, 5, 'f', '1509311843'),
(147, 6, 'a', '1509311853'),
(148, 6, 'f', '1509311869'),
(149, 1, 'f', '1509347667'),
(150, 1, 'a', '1509347669'),
(151, 6, 'f', '1509381139'),
(152, 1, 'a', '1509381148'),
(153, 1, 'a', '1509381157'),
(154, 1, 'a', '1509381251'),
(155, 1, 'a', '1509381532'),
(156, 1, 'a', '1509381778'),
(157, 1, 'a', '1509451436'),
(158, 1, 'a', '1509451499'),
(159, 8, 'f', '1509613254'),
(160, 8, 'm', '1509613254'),
(161, 8, 'a', '1509613254'),
(162, 7, 'f', '1509613346'),
(163, 1, 'a', '1509613419'),
(164, 1, 'f', '1510073406'),
(165, 1, 'a', '1510073408'),
(166, 1, 'a', '1512203682'),
(167, 1, 'f', '1512203684'),
(168, 1, 'a', '1514221776'),
(169, 1, 'f', '1514221778'),
(170, 1, 'a', '1514535994'),
(171, 1, 'a', '1514536002'),
(172, 9, 'f', '1540786279'),
(173, 9, 'm', '1540786279'),
(174, 9, 'a', '1540786279'),
(175, 10, 'f', '1540786863'),
(176, 10, 'm', '1540786863'),
(177, 10, 'a', '1540786863'),
(178, 11, 'f', '1540787102'),
(179, 11, 'm', '1540787102'),
(180, 11, 'a', '1540787102'),
(181, 1, 'a', '1540792410'),
(182, 1, 'f', '1540792412'),
(183, 4, 'a', '1540961222'),
(184, 9, 'f', '1540961582'),
(185, 1, 'a', '1540965295'),
(186, 9, 'f', '1540965325'),
(187, 1, 'f', '1540965371'),
(188, 1, 'a', '1540965590'),
(189, 1, 'f', '1541310092'),
(190, 1, 'a', '1541310094'),
(191, 12, 'f', '1541311523'),
(192, 12, 'm', '1541311523'),
(193, 12, 'a', '1541311523'),
(194, 1, 'a', '1541667657'),
(195, 1, 'a', '1541942862'),
(196, 1, 'f', '1541942864'),
(197, 1, 'a', '1542095660'),
(198, 1, 'f', '1542095669'),
(199, 1, 'a', '1542095670'),
(200, 1, 'f', '1542095672'),
(201, 1, 'a', '1542095884'),
(202, 1, 'a', '1542132145'),
(203, 13, 'f', '1542200074'),
(204, 13, 'm', '1542200074'),
(205, 13, 'a', '1542200074'),
(206, 1, 'f', '1548863629'),
(207, 1, 'a', '1548863640'),
(208, 1, 'a', '1551766417'),
(209, 1, 'a', '1551766653'),
(210, 1, 'f', '1551766655'),
(211, 8, 'f', '1552396708'),
(212, 8, 'a', '1552397478'),
(213, 8, 'a', '1552397478'),
(214, 8, 'a', '1552397478'),
(215, 8, 'f', '1552397481'),
(216, 8, 'a', '1552397489'),
(217, 8, 'a', '1552397522'),
(218, 1, 'a', '1555431092'),
(219, 1, 'f', '1555431097');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `postid` bigint(30) NOT NULL,
  `userid` bigint(10) NOT NULL,
  `content` text COLLATE latin1_general_ci NOT NULL,
  `hashtags` text COLLATE latin1_general_ci NOT NULL,
  `usertags` text COLLATE latin1_general_ci NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `timestamp` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `anonymous` varchar(1) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`postid`, `userid`, `content`, `hashtags`, `usertags`, `time`, `timestamp`, `anonymous`) VALUES
(1, 1, 'hello', '', '', '2017-10-14 11:17:48', '1550785921', ''),
(2, 1, '../uploads/4Capture.PNG', '', '', '2017-10-14 11:18:58', '1550785921', ''),
(3, 1, 'hi', '', '', '2017-10-28 15:07:55', '1550785921', ''),
(4, 1, '../uploads/4Capture.PNG', '', '', '2017-10-28 16:47:55', '1550785921', ''),
(5, 2, 'hello world\n', '', '', '2017-10-28 18:07:35', '1550785255', ''),
(6, 1, 'hi', '', '', '2017-10-28 19:58:54', '1550785921', ''),
(7, 5, 'hi\n', '', '', '2017-10-28 21:03:11', '1550785921', ''),
(8, 1, '../uploads/820121561_1536598979695114_865010858201447499_o (1).jpg', '', '', '2017-10-29 19:39:14', '1550785921', ''),
(9, 2, 'This app is awesome. Thanks!', '', '', '2017-10-29 19:53:20', '1550785921', ''),
(10, 1, 'hello (:\n', '', '', '2017-10-30 16:44:11', '1550785921', ''),
(11, 1, 'hi', '', '', '2017-11-02 09:01:22', '1550785921', ''),
(12, 1, '../uploads/12first.png', '', '', '2017-11-02 09:01:46', '1550785921', ''),
(13, 1, 'hey', '', '', '2017-11-07 16:50:59', '1550785921', ''),
(14, 1, 'hi\nhello', '', '', '2017-12-25 17:08:09', '1550785921', ''),
(15, 1, 'hello', '', '', '2017-12-29 08:25:56', '1550785921', ''),
(16, 1, '../uploads/16IMG_5420.png', '', '', '2018-10-29 04:05:21', '1550785921', ''),
(17, 8, '../uploads/17WhatsApp Image 2018-10-29 at 9.57.56 AM.jpeg', '', '', '2018-10-31 04:31:36', '1550960296', ''),
(18, 4, '../uploads/181018342229_103552640222041_9062695584582928451_n.jpg', '', '', '2018-10-31 04:46:27', '1550961187', ''),
(19, 9, 'hey ', '', '', '2018-10-31 04:53:57', '1550961637', ''),
(20, 9, 'hey hows life !!!', '', '', '2018-10-31 04:54:09', '1550961649', ''),
(21, 8, 'amazing stuff vsocial is litt', '', '', '2018-10-31 04:54:48', '1550961348', ''),
(22, 9, '../uploads/22download.jpg', '', '', '2018-10-31 05:06:19', '1550962379', ''),
(23, 9, '../uploads/23napoleon-hill-inspirational-quote.jpg', '', '', '2018-10-31 05:07:07', '1550962427', ''),
(24, 8, '../uploads/24yo.jpg', '', '', '2018-10-31 05:08:13', '1551720315', ''),
(25, 13, 'qt50', '', '', '2018-11-14 12:55:15', '1551720315', ''),
(26, 1, 'Whats up VIT', '', '', '2019-03-04 17:25:15', '1551720315', ''),
(27, 1, '../uploads/27IMG_4536.JPG', '', '', '2019-03-04 17:28:04', '1551720484', '');

-- --------------------------------------------------------

--
-- Table structure for table `primaryinfo`
--

CREATE TABLE `primaryinfo` (
  `userid` bigint(10) NOT NULL,
  `name` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `gender` varchar(1) COLLATE latin1_general_ci NOT NULL,
  `age` varchar(3) COLLATE latin1_general_ci NOT NULL,
  `phonenumber` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `address` varchar(65000) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `primaryinfo`
--

INSERT INTO `primaryinfo` (`userid`, `name`, `email`, `gender`, `age`, `phonenumber`, `address`) VALUES
(1, 'Suhail Haroon', 'suhailharoon@gmail.com', 'M', '20', '9790614952', ''),
(2, 'Mark Zuckerberg', 'mark@gmail.com', 'M', '21', '', ''),
(3, 'Bill Gates', 'bill@microsoft.com', 'M', '23', '', ''),
(4, 'Sergey Brin', 'sergey@gmail.com', 'M', '22', '', ''),
(5, 'Larry Page', 'suhail@g.vom', 'M', '21', '', ''),
(6, 'Jeff Bezos', 'jeff@amazon.com', 'M', '24', '', ''),
(7, 'Elon Musk', 'elon@gmail.com', 'M', '26', '', ''),
(8, 'Vishesh Bijlani', 'vishesh@gmail.com', 'M', '21', '9856321458', ''),
(9, 'Rishabh Kant Singh', 'rishabh@gmail.com', 'M', '21', '', ''),
(10, 'Ramendra Tripathi', 'ramu@gmail.com', 'M', '21', '', ''),
(11, 'Haroon S', 'haroon@gmail.com', 'M', '24', '', ''),
(12, 'Sahiba Haroon', 'sahibaharoon2@gmail.com', 'F', '20', '', ''),
(13, 'aryaman dhawan', 'ad@vit', 'M', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `profilepic`
--

CREATE TABLE `profilepic` (
  `id` bigint(10) NOT NULL,
  `userid` bigint(10) NOT NULL,
  `link` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `timestamp` bigint(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `profilepic`
--

INSERT INTO `profilepic` (`id`, `userid`, `link`, `time`, `timestamp`) VALUES
(1, 1, 'download.png', '2017-10-14 11:17:30', 1507979850),
(2, 1, '../uploads/213569033_1175264729161876_2804646331694300520_o.jpg', '2017-10-14 11:18:03', 1507979883),
(3, 2, 'download.png', '2017-10-14 11:19:22', 1507979962),
(4, 1, '../uploads/4giphy.gif', '2017-10-28 16:46:54', 1509209214),
(5, 1, '../uploads/5Capture2.PNG', '2017-10-28 16:48:21', 1509209301),
(6, 3, 'download.png', '2017-10-28 19:59:51', 1509220791),
(7, 4, 'download.png', '2017-10-28 20:01:02', 1509220862),
(8, 5, 'download.png', '2017-10-28 20:46:35', 1509223595),
(9, 1, '../uploads/914606519_1252349278120087_8406655802349638061_n.jpg', '2017-10-29 19:41:04', 1509306064),
(10, 2, '../uploads/10mark-zuckerberg.jpg', '2017-10-29 19:56:06', 1509306966),
(11, 3, '../uploads/10sergey-brin-4.jpg', '2017-10-29 19:58:59', 1509307139),
(12, 3, '../uploads/1018342229_103552640222041_9062695584582928451_n.jpg', '2017-10-29 20:02:58', 1509307378),
(13, 3, '../uploads/1020280559_10154756882766961_3434466954525858896_o.jpg', '2017-10-29 20:05:08', 1509307508),
(14, 1, '../uploads/1013502935_1175274395827576_1862613772696803217_o.jpg', '2017-10-29 20:24:14', 1509308654),
(15, 1, '../uploads/1014606519_1252349278120087_8406655802349638061_n (1).jpg', '2017-10-29 20:25:44', 1509308744),
(16, 4, '../uploads/1018342229_103552640222041_9062695584582928451_n.jpg', '2017-10-29 20:27:15', 1509308835),
(17, 5, '../uploads/10page-larry_topic.jpg', '2017-10-29 20:30:37', 1509309037),
(18, 6, 'download.png', '2017-10-29 20:31:34', 1509309094),
(19, 6, '../uploads/10UF3cgUk4.jpg', '2017-10-29 20:32:45', 1509309165),
(20, 7, 'download.png', '2017-10-29 20:33:21', 1509309201),
(21, 7, '../uploads/10zDo-gAo0_400x400.jpg', '2017-10-29 20:33:48', 1509309228),
(22, 4, '../uploads/10Sergey Brin.jpg', '2017-10-29 20:37:10', 1509309430),
(23, 4, '../uploads/10Sergey Brin.jpg', '2017-10-29 20:39:15', 1509309555),
(24, 4, '../uploads/10Sergey Brin.jpg', '2017-10-29 20:40:36', 1509309636),
(25, 4, '../uploads/10416x416.jpg', '2017-10-29 20:42:55', 1509309775),
(26, 8, 'download.png', '2017-11-02 09:00:54', 1509613254),
(27, 1, '../uploads/16IMG_4536.JPG', '2018-10-29 03:56:15', 1540785375),
(28, 1, '../uploads/17IMG_1529.JPG', '2018-10-29 04:10:17', 1540786217),
(29, 9, 'download.png', '2018-10-29 04:11:19', 1540786279),
(30, 10, 'download.png', '2018-10-29 04:21:03', 1540786863),
(31, 11, 'download.png', '2018-10-29 04:25:02', 1540787102),
(32, 8, '../uploads/17WhatsApp Image 2018-10-29 at 9.57.56 AM.jpeg', '2018-10-29 04:30:20', 1540787420),
(33, 8, '../uploads/17WhatsApp Image 2018-10-29 at 9.57.56 AM (2).jpeg', '2018-10-29 04:31:29', 1540787489),
(34, 9, '../uploads/17pp.jpg', '2018-10-30 15:43:22', 1540914202),
(35, 1, '../uploads/18IMG_5420 (2).png', '2018-10-31 04:36:29', 1540960589),
(36, 1, '../uploads/18IMG_1704 (2).PNG', '2018-10-31 04:41:47', 1540960907),
(37, 8, '../uploads/18WhatsApp Image 2018-10-29 at 9.57.56 AM (3).jpeg', '2018-10-31 04:43:02', 1540960982),
(38, 12, 'download.png', '2018-11-04 06:05:23', 1541311523),
(39, 12, '../uploads/25IMG_1284 (2).JPG', '2018-11-04 06:06:31', 1541311591),
(40, 13, 'download.png', '2018-11-14 12:54:34', 1542200074);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `sid` bigint(10) NOT NULL,
  `ccode` varchar(40) NOT NULL,
  `ctitle` varchar(80) NOT NULL,
  `cdescription` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`sid`, `ccode`, `ctitle`, `cdescription`) VALUES
(1, 'CSE1001', 'Problem Solving and Programming', ''),
(2, 'CSE1002', 'Problem Solving with Object Oriented\r\nProgramming', ''),
(3, 'CSE3999', 'Technical Answers for Real World\r\nProblems\r\n(TARP)', ''),
(4, 'CSE4098', 'Comprehensive Exam', ''),
(5, 'CSE1003', 'Digital Logic and Design', ''),
(6, 'CSE2001', 'Computer Architecture and Organization', ''),
(7, 'CSE2002', 'Theory of Computation & Compiler Design', ''),
(8, 'CSE2003', 'Data Structures and Algorithms', ''),
(9, 'CSE1004', 'Network and Communication', ''),
(10, 'CSE2004', 'Database Management System', ''),
(11, 'CSE3001', 'Software Engineering', ''),
(12, 'CSE2005', 'Operating Systems', ''),
(13, 'CSE4001', 'Parallel and Distributed Computing', ''),
(14, 'CSE3002', 'Internet and Web Programming', ''),
(15, 'CSE2006', 'Microprocessor and Interfacing', '');

-- --------------------------------------------------------

--
-- Table structure for table `teaches`
--

CREATE TABLE `teaches` (
  `sid` bigint(11) NOT NULL,
  `tid` bigint(11) NOT NULL,
  `slno` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teaches`
--

INSERT INTO `teaches` (`sid`, `tid`, `slno`) VALUES
(1, 1, 15),
(2, 1, 16),
(3, 1, 14),
(4, 1, 17),
(5, 1, 18),
(6, 1, 9),
(7, 1, 19),
(8, 1, 20),
(9, 1, 21),
(10, 1, 10),
(11, 1, 22),
(12, 1, 23),
(13, 1, 12),
(14, 1, 11),
(15, 1, 13);

-- --------------------------------------------------------

--
-- Table structure for table `usera`
--

CREATE TABLE `usera` (
  `userid` bigint(10) NOT NULL,
  `username` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(30) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `usera`
--

INSERT INTO `usera` (`userid`, `username`, `password`) VALUES
(1, 'suhail', 'password'),
(2, 'mark', 'password'),
(3, 'bill', 'password'),
(4, 'sergey', 'password'),
(5, 'larry', 'password'),
(6, 'jeff', 'password'),
(7, 'elon', 'password'),
(8, 'vishesh', 'password'),
(9, 'rishabh', 'password'),
(10, 'ramendra', 'password'),
(11, 'haroon', 'password'),
(12, 'sahiba', 'password'),
(13, 'aryaman', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `userb`
--

CREATE TABLE `userb` (
  `tid` bigint(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `tname` varchar(30) NOT NULL,
  `age` smallint(11) NOT NULL,
  `sex` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userb`
--

INSERT INTO `userb` (`tid`, `username`, `password`, `tname`, `age`, `sex`) VALUES
(1, 'mythili', 'password', 'Mythili T', 25, 'F');

-- --------------------------------------------------------

--
-- Table structure for table `vitdetails`
--

CREATE TABLE `vitdetails` (
  `userid` varchar(1000) COLLATE latin1_general_ci NOT NULL,
  `regno` text COLLATE latin1_general_ci NOT NULL,
  `email` text COLLATE latin1_general_ci NOT NULL,
  `block` text COLLATE latin1_general_ci NOT NULL,
  `roomnumber` text COLLATE latin1_general_ci NOT NULL,
  `clubs` text COLLATE latin1_general_ci NOT NULL,
  `cgpa` text COLLATE latin1_general_ci NOT NULL,
  `branch` text COLLATE latin1_general_ci NOT NULL,
  `classes` text COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `vitdetails`
--

INSERT INTO `vitdetails` (`userid`, `regno`, `email`, `block`, `roomnumber`, `clubs`, `cgpa`, `branch`, `classes`) VALUES
('1', '15BCE0994', 'suhail.haroon2015@vit.ac.in', '', '', '', '9.8', 'CSE', ''),
('2', '15BCE0331', 'mark.zuckerberg@vit.ac.in', '', '', '', '8.7142857142857', 'CSE', ''),
('3', '15BCE0221', 'bill.gates2015@vit.ac.in', '', '', '', '7', 'CSE', ''),
('4', '15BCE0231', 'sergey.brin2015@vit.ac.in', '', '', '', '9', 'CSE', ''),
('5', '15BCE0590', 'larry.page2015@vit.ac.in', '', '', '', '8', 'CSE', ''),
('6', '15BCE0366', 'jeff.bezos2015@vit.ac.in', '', '', '', '6', 'CSE', ''),
('7', '15BCE970', 'elon.musk2015@vit.ac.in', '', '', '', '8', 'CSE', ''),
('8', '15BCE2070', 'vishesh.bijlani2015@vit.ac.in', '', '', '', '8.8', 'CSE', ''),
('9', '15BCE0654', 'rishabh.singh2015@vit.ac.in', '', '', '', '8', 'CSE', ''),
('10', '15BCE0985', 'ramendra.tripathi2015@vit.ac.in', '', '', '', '6', 'CSE', ''),
('11', '15BCE0001', 'haroon.s2015@vit.ac.in', '', '', '', '8.5', 'CSE', ''),
('12', '15BCE0482', 'sahiba.haroon2015@vit.ac.in', '', '', '', '6', 'CSE', ''),
('13', '15BCE0023', '', '', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enroll`
--
ALTER TABLE `enroll`
  ADD PRIMARY KEY (`slno`),
  ADD KEY `userid` (`userid`,`tid`,`sid`);

--
-- Indexes for table `friend`
--
ALTER TABLE `friend`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification_checked_on`
--
ALTER TABLE `notification_checked_on`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`postid`);

--
-- Indexes for table `primaryinfo`
--
ALTER TABLE `primaryinfo`
  ADD UNIQUE KEY `userid` (`userid`);

--
-- Indexes for table `profilepic`
--
ALTER TABLE `profilepic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `teaches`
--
ALTER TABLE `teaches`
  ADD PRIMARY KEY (`slno`),
  ADD KEY `sid` (`sid`,`tid`);

--
-- Indexes for table `usera`
--
ALTER TABLE `usera`
  ADD PRIMARY KEY (`userid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `userb`
--
ALTER TABLE `userb`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `vitdetails`
--
ALTER TABLE `vitdetails`
  ADD UNIQUE KEY `userid` (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `enroll`
--
ALTER TABLE `enroll`
  MODIFY `slno` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `friend`
--
ALTER TABLE `friend`
  MODIFY `id` bigint(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` bigint(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT for table `notification_checked_on`
--
ALTER TABLE `notification_checked_on`
  MODIFY `id` bigint(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `postid` bigint(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `profilepic`
--
ALTER TABLE `profilepic`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `sid` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `teaches`
--
ALTER TABLE `teaches`
  MODIFY `slno` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `usera`
--
ALTER TABLE `usera`
  MODIFY `userid` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `userb`
--
ALTER TABLE `userb`
  MODIFY `tid` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
