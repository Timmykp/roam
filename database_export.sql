-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 01, 2015 at 07:26 AM
-- Server version: 5.5.42-cll
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `stefanbo_roam`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `klant_ID` int(11) NOT NULL AUTO_INCREMENT,
  `klant_voornaam` varchar(64) NOT NULL,
  `klant_achternaam` varchar(64) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `klant_wachtwoord` varchar(255) CHARACTER SET latin1 COLLATE latin1_bin DEFAULT NULL,
  `klant_email` varchar(255) NOT NULL,
  `klant_geboortedatum` date NOT NULL,
  `klant_geslacht` varchar(8) NOT NULL,
  `klant_nationaliteit` varchar(64) NOT NULL,
  `facebook_ID` varchar(64) DEFAULT NULL,
  `klant_registratie_datum` date NOT NULL,
  `klant_status` varchar(32) NOT NULL,
  PRIMARY KEY (`klant_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`klant_ID`, `klant_voornaam`, `klant_achternaam`, `klant_wachtwoord`, `klant_email`, `klant_geboortedatum`, `klant_geslacht`, `klant_nationaliteit`, `facebook_ID`, `klant_registratie_datum`, `klant_status`) VALUES
(8, 'Stefan', 'Boonstra', '$6$rounds=50000$iopgcjquyrtfslpt$ajDpjkwPZjFnZV/Sxqhcu/viGgM35tcIuo1sf8tqmmj/Qtr5APsi5UjK.SUH/4AMW38PH48dntdadwGvjmSdQ1', 'st.boonstra@st.hanze.nl', '1994-05-29', 'Male', 'dutch', 'NULL', '2015-05-31', 'active'),
(11, 'Tim', 'Kuip', '$6$rounds=50000$iopgcjquyrtfslpt$6gkC7G757ObQt9kdWUDCxpZuuT4b1kS9M9JQ7GqUrf2N0k1yu5Cih0dojDhUSDM5QzHx.WOxW181ejZaB8Fqy0', 't.p.van.der.kuip@st.hanze.nl', '1991-06-08', 'Male', 'dutch', 'NULL', '2015-06-01', 'active'),
(12, 'Thijs', 'Driessen', '$6$rounds=50000$iopgcjquyrtfslpt$IiNAJW6C4L4hMPphbX7Q8YPFVNeuFpksxOjlNH4ey36mmAOIEDFu9WOD.HvAY3yfzg9ztXbvDSBEw55p1wHJd1', 'thijs.driessen44@gmail.com', '1995-08-07', 'Male', 'dutch', 'NULL', '2015-06-01', 'active'),
(13, 'jochem', 'smit', '$6$rounds=50000$iopgcjquyrtfslpt$ug47X9IpBcU8AMZEN8u5j8gVETLVEtVEq4OQzorKpKtfEdg21P9cEgT11fe/4Q5bBA1TcXJfjTeoAUt2riYjt.', 'jochem_smitje@hotmail.com', '1996-11-08', 'Male', 'dutch', 'NULL', '2015-06-01', 'active'),
(14, 'Stefab', 'Boonstra', '$6$rounds=50000$iopgcjquyrtfslpt$ajDpjkwPZjFnZV/Sxqhcu/viGgM35tcIuo1sf8tqmmj/Qtr5APsi5UjK.SUH/4AMW38PH48dntdadwGvjmSdQ1', 'st.boonstra@st.hanzre.nl', '1994-05-29', 'Male', 'dutch', 'NULL', '2015-06-01', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `etablissement`
--

CREATE TABLE IF NOT EXISTS `etablissement` (
  `etablissement_ID` int(11) NOT NULL AUTO_INCREMENT,
  `etablissement_soort` varchar(64) NOT NULL,
  PRIMARY KEY (`etablissement_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `faciliteiten`
--

CREATE TABLE IF NOT EXISTS `faciliteiten` (
  `faciliteit_ID` int(11) NOT NULL AUTO_INCREMENT,
  `faciliteit_naam` varchar(128) NOT NULL,
  PRIMARY KEY (`faciliteit_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `faciliteiten_etablissement`
--

CREATE TABLE IF NOT EXISTS `faciliteiten_etablissement` (
  `faciliteit_ID` int(11) NOT NULL,
  `etablissement_ID` int(11) NOT NULL,
  KEY `faciliteit_ID` (`faciliteit_ID`),
  KEY `etablissement_ID` (`etablissement_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `post_ID` int(11) NOT NULL AUTO_INCREMENT,
  `klant_ID` int(11) NOT NULL,
  `post_datum` date NOT NULL,
  `post_titel` varchar(255) NOT NULL,
  `post_inhoud` text NOT NULL,
  `post_creatie_tijd` datetime NOT NULL,
  `post_is_public` varchar(3) NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`post_ID`),
  KEY `klant_ID` (`klant_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_ID`, `klant_ID`, `post_datum`, `post_titel`, `post_inhoud`, `post_creatie_tijd`, `post_is_public`) VALUES
(5, 8, '2015-06-01', 'Tijd voor een leven', 'Het is momenteel 04:30. Sommigen zeggen dat ik geen leven heb, aangezien ik nu nog met PHP bezig ben. Ze hebben waarschijnlijk gelijk.', '2015-06-01 01:34:55', 'yes'),
(7, 8, '2015-05-29', 'Birthday', 'May 29th was my birthday. I couldn''t really celebrate, for I was too busy coding all kinds of crazy stuff. Mainly for this very site. This post isn''t really in the theme of this website, since it has nothing to do with travel. Therefore I will say this: a srprs.me trip sounds like fun. I might book such a trip in the future. Maybe. Someday. Eventually.', '2015-06-01 02:44:49', 'yes'),
(8, 8, '2015-05-27', 'LOREM IPSUM', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur rhoncus viverra tellus a vehicula. In ut risus finibus, consequat elit eget, pretium diam. Nulla iaculis magna mauris, et lobortis dui tristique eget. Vestibulum auctor faucibus augue, non interdum urna. Sed tempus magna vitae euismod hendrerit. Praesent ullamcorper imperdiet mauris, id pulvinar turpis dignissim at. Fusce viverra tempor metus et ultricies. Phasellus ut ullamcorper neque. In eleifend lectus magna. In ac ex et dui congue malesuada. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Morbi aliquam feugiat velit id lacinia. Fusce congue felis enim, eu interdum justo sodales eget.  Proin at nisi massa. Aliquam ante lacus, consectetur at aliquet in, molestie eu urna. Aliquam eget convallis lacus. Donec varius ligula lectus, in ullamcorper augue maximus pretium. Donec consectetur cursus massa, porttitor mattis massa faucibus non. In porta tellus a turpis lobortis pharetra. Donec feugiat nunc ac arcu condimentum blandit. Integer porttitor felis vitae facilisis rhoncus. Duis finibus at mauris at rhoncus. Phasellus dolor nunc, accumsan in magna quis, tristique porta massa. Vestibulum nulla quam, sollicitudin non varius dictum, viverra eu neque.  Phasellus et eros quis sem consectetur vehicula ut id nunc. Suspendisse sapien massa, tempor sed dignissim sed, porttitor ut nibh. Fusce a lobortis felis. Nam tincidunt sodales lacus, vel ultricies dui faucibus eu. Nullam laoreet risus nunc, nec gravida risus condimentum ac. Donec mattis aliquam nunc egestas efficitur. Mauris sollicitudin, turpis sed viverra tristique, nibh tortor imperdiet eros, sed scelerisque est turpis vitae magna. Aenean facilisis dictum augue. Aenean id ante et risus pharetra pellentesque a non sapien. Donec ultricies pharetra neque, nec tempor nisi varius in. Etiam nec ultrices nisl. Suspendisse sed erat lectus. Etiam convallis purus ut erat pharetra, ut laoreet leo congue. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.  Ut ligula tellus, elementum vel tempus venenatis, vulputate eget libero. Nulla in vestibulum nisi. Suspendisse aliquet neque eget varius bibendum. Aenean mauris mauris, rhoncus non eros vel, tincidunt elementum magna. Pellentesque sed vestibulum metus. Nunc id egestas dolor. Maecenas volutpat enim neque, at pharetra dui eleifend sit amet. Morbi porttitor risus in dignissim consectetur. Mauris accumsan vulputate odio, ac scelerisque orci blandit et. Nulla ligula sem, condimentum sed rutrum a, venenatis nec purus. In pharetra tellus et massa porttitor iaculis. Nunc sed leo erat. Mauris ante neque, egestas et dui maximus, facilisis vehicula neque. Fusce posuere, ante quis interdum consequat, neque sapien hendrerit felis, ut tristique dolor metus id arcu. Integer at dignissim sapien.', '2015-06-01 02:45:18', 'yes'),
(9, 8, '2015-05-29', 'Eten', 'Het was lekker', '2015-06-01 12:45:40', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `profiel`
--

CREATE TABLE IF NOT EXISTS `profiel` (
  `profiel_ID` int(11) NOT NULL AUTO_INCREMENT,
  `klant_ID` int(11) NOT NULL,
  `klant_bio` text NOT NULL,
  `klant_foto_url` varchar(255) DEFAULT NULL,
  `GPS_langitude` varchar(25) DEFAULT NULL,
  `GPS_longitude` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`profiel_ID`),
  KEY `klant_ID` (`klant_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `profiel`
--

INSERT INTO `profiel` (`profiel_ID`, `klant_ID`, `klant_bio`, `klant_foto_url`, `GPS_langitude`, `GPS_longitude`) VALUES
(3, 8, 'To add a Biography about yourself, edit this field on your profile page!', NULL, NULL, NULL),
(6, 11, 'To add a Biography about yourself, edit this field on your profile page!', NULL, NULL, NULL),
(7, 12, 'To add a Biography about yourself, edit this field on your profile page!', NULL, NULL, NULL),
(8, 13, 'To add a Biography about yourself, edit this field on your profile page!', NULL, NULL, NULL),
(9, 14, 'To add a Biography about yourself, edit this field on your profile page!', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
  `review_ID` int(11) NOT NULL AUTO_INCREMENT,
  `klant_ID` int(11) NOT NULL,
  `review_inhoud` text NOT NULL,
  `review_titel` varchar(255) NOT NULL,
  `review_beoordeling` float NOT NULL,
  `review_datum` date NOT NULL,
  `faciliteit_ID` int(11) NOT NULL,
  PRIMARY KEY (`review_ID`),
  KEY `faciliteit_ID` (`faciliteit_ID`),
  KEY `klant_ID` (`klant_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `faciliteiten_etablissement`
--
ALTER TABLE `faciliteiten_etablissement`
  ADD CONSTRAINT `faciliteiten_etablissement_ibfk_1` FOREIGN KEY (`faciliteit_ID`) REFERENCES `faciliteiten` (`faciliteit_ID`),
  ADD CONSTRAINT `faciliteiten_etablissement_ibfk_2` FOREIGN KEY (`etablissement_ID`) REFERENCES `etablissement` (`etablissement_ID`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`klant_ID`) REFERENCES `account` (`klant_ID`);

--
-- Constraints for table `profiel`
--
ALTER TABLE `profiel`
  ADD CONSTRAINT `profiel_ibfk_1` FOREIGN KEY (`klant_ID`) REFERENCES `account` (`klant_ID`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`faciliteit_ID`) REFERENCES `faciliteiten` (`faciliteit_ID`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`klant_ID`) REFERENCES `account` (`klant_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
