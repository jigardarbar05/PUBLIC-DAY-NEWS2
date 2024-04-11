-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 21, 2024 at 11:43 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `public-news`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `email` varchar(35) NOT NULL,
  `password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email`, `password`) VALUES
('milan12@gmail.com', '1212'),
('jixs05@gmail.com', 'bapu01');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `cat_id` int(10) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(30) NOT NULL,
  `post` int(10) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `post`) VALUES
(1, 'Sports', 3),
(2, 'Politics', 1),
(3, 'Tecnology', 1),
(4, 'Entertainment', 1),
(5, 'Goverment', 1),
(6, 'Business', 1);

-- --------------------------------------------------------

--
-- Table structure for table `feed`
--

CREATE TABLE IF NOT EXISTS `feed` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `user_id` int(2) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(35) NOT NULL,
  `option` varchar(8) NOT NULL,
  `comments` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `feed`
--

INSERT INTO `feed` (`id`, `user_id`, `name`, `email`, `option`, `comments`) VALUES
(1, 1, 'MILAN', 'milan12@gmail.com', 'feedback', 'nice web ');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(2) NOT NULL,
  `title` text NOT NULL,
  `description` varchar(10000) NOT NULL,
  `category` varchar(100) NOT NULL,
  `image` text NOT NULL,
  `date` varchar(11) NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `user_id`, `title`, `description`, `category`, `image`, `date`) VALUES
(1, 1, 'MS Dhoni likely to work with Team India for 2024 T20 World Cup', ' One of the steps reportedly under consideration is to use the experience and skills of M.S. Dhoni, in some capacity, to prepare and plan for the 2024 T20 World Cup.\r\n', '1', 'dhoni2.jpg', '10 Mar,2024'),
(2, 1, 'PM Modi To Unveil Mega Development Projects Worth Over Rs 42,000 In Uttar Pradesh.', 'Prime Minister Narendra Modi is set to participate in a public programme on Sunday,\r\nwhere he will inaugurate, dedicate, and lay the foundation stone of multiple development \r\nprojects worth more than Rs 42,000 crore in Uttar Pradesh at around 12 noon.\r\n', '2', 'p2.jpg', '10 Mar,2024'),
(3, 3, 'When Amitabh Bachchanâ€™s ABCL organised Miss World in 1996: Protestor died by self immolation, actor suffered financial losses', 'Amitabh had shared that they got an offer from the company that puts up the show to host it India and they â€œwere nervous about saying yes because we had only four months to organise the pageant.', '4', 'en.jpg', '10 Mar,2024'),
(4, 3, 'Demand for Gen AI courses surge as working professionals rush to keep themselves relevant', 'Artificial intelligence and automation are reshaping industries, creating a pressing demand for professionals versed in AI-related skillsâ€¦ Professionals are proactively future-proofing their careers by acquiring expertise in generative AI,â€ said Hari Krishnan Nair, co-founder, Great Learning.', '3', 'tec.jpg', '10 Mar,2024'),
(5, 3, 'AG&P Pratham reduces its CNG price by Rs 2.5 per kg in Kerala, Andhra', 'AG&P Pratham, one of the leading city gas distribution players in the country, has announced a price cut of Rs 2.5 per kilogram in the compressed natural gas sold at its outlets in Kerala and Andhra Pradesh.\r\nThe price cut took effect from March 7, the company said in a release.', '6', 'download.jpeg', '10 Mar,2024'),
(6, 2, 'Potholes lead San Antonio to ask Union Pacific for better maintenance of railroads', 'A Union Pacific train is parked in the Union Pacific Kirby Yard in Kirby, Texas. Credit: Bonnie Arbittier / San Antonio Report\r\nOn Dividend Road, an industrial road off of busy W.W. White Road on San Antonioâ€™s East Side, vehicles painstakingly pass over a railroad with at least four potholes.\r\n\r\nItâ€™s been this way for â€œat least two years,â€ said John Lackness, who drives by the area once a week for maintenance work at a radio transmitting site for KONO Radio nearby. In the past 18 months, he says the track has cost him two $260 front left tires on his Toyota Tundra.', '5', 'goverment.jpg', '10 Mar,2024'),
(7, 2, ' Pep Guardiolaâ€™s title march: Manchester Cityâ€™s March madness set to continue with huge upcoming fixtures', '\r\nAs Manchester City celebrated their victory under lights against Manchester United in a derby which continues to lose its competitive edge by the season, the Pep Guardiola side will be wary that much greater challenges lie in front of the defending champions as the month progresses.', '1', 'sportnews.jpg', '10 Mar,2024'),
(8, 2, ' Davis Cup, IND vs PAK: Yuki Bhambri and Saketh Myneniâ€™s straight-sets doubles win seals Indiaâ€™s promotion', 'India capped off their first visit to Pakistan for a Davis Cup tie in 60 years with an eighth consecutive win over their neighbours in the team competition, ensuring promotion to the World Group 1. Entering the day with a 2-0 lead, Yuki Bhambri and Saketh Myneni defeated Muzammil Murtaza and Aqeel Khan in the doubles rubber to seal the playoff tie. Later, debutant Niki Poonacha beat Muhammad Shoaib in a dead rubber, as India completed a 4-0 win in Islamabad on Sunday.', '1', 'sportnews1.jpg', '10 Mar,2024');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE IF NOT EXISTS `registration` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `fnum` int(5) NOT NULL,
  `fword` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `profile_image` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `name`, `fnum`, `fword`, `city`, `gender`, `mobile`, `email`, `password`, `profile_image`) VALUES
(1, 'MILAN PARMAR', 8, 'Rohit', 'DEESA', 'male', '6354809288', 'milan12@gmail.com', '1212', 'milan.jpg'),
(2, 'JIGARSINH DARBAR', 333, 'RAJA .JAHU', 'PATAN', 'male', '7861918895', 'jigarsinh05@gmail.com', 'JIXS.BAPU', '82.jpg'),
(3, 'SAGAR PANCHAL', 18, 'A B Devill', 'DEESA', 'male', '9265266355', 'sagarpanchal22@gamil.com', '12345678', 'sagar.jpg'),
(5, 'RAJ', 8, 'ddddd', 'DEESA', 'male', '9327497082', 'raj@gmail.com', '123', 'business.jpg');
