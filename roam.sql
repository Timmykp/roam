-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Gegenereerd op: 29 mei 2015 om 15:57
-- Serverversie: 5.6.17
-- PHP-versie: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `roam`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `account`
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `etablissement`
--

CREATE TABLE IF NOT EXISTS `etablissement` (
  `etablissement_ID` int(11) NOT NULL AUTO_INCREMENT,
  `etablissement_soort` varchar(64) NOT NULL,
  PRIMARY KEY (`etablissement_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `faciliteiten`
--

CREATE TABLE IF NOT EXISTS `faciliteiten` (
  `faciliteit_ID` int(11) NOT NULL AUTO_INCREMENT,
  `faciliteit_naam` varchar(128) NOT NULL,
  PRIMARY KEY (`faciliteit_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `faciliteiten_etablissement`
--

CREATE TABLE IF NOT EXISTS `faciliteiten_etablissement` (
  `faciliteit_ID` int(11) NOT NULL,
  `etablissement_ID` int(11) NOT NULL,
  KEY `faciliteit_ID` (`faciliteit_ID`),
  KEY `etablissement_ID` (`etablissement_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `post_ID` int(11) NOT NULL AUTO_INCREMENT,
  `klant_ID` int(11) NOT NULL,
  `post_datum` date NOT NULL,
  `post_titel` varchar(255) NOT NULL,
  `post_inhoud` text NOT NULL,
  PRIMARY KEY (`post_ID`),
  KEY `klant_ID` (`klant_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `profiel`
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `reviews`
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
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `faciliteiten_etablissement`
--
ALTER TABLE `faciliteiten_etablissement`
  ADD CONSTRAINT `faciliteiten_etablissement_ibfk_1` FOREIGN KEY (`faciliteit_ID`) REFERENCES `faciliteiten` (`faciliteit_ID`),
  ADD CONSTRAINT `faciliteiten_etablissement_ibfk_2` FOREIGN KEY (`etablissement_ID`) REFERENCES `etablissement` (`etablissement_ID`);

--
-- Beperkingen voor tabel `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`klant_ID`) REFERENCES `account` (`klant_ID`);

--
-- Beperkingen voor tabel `profiel`
--
ALTER TABLE `profiel`
  ADD CONSTRAINT `profiel_ibfk_1` FOREIGN KEY (`klant_ID`) REFERENCES `account` (`klant_ID`);

--
-- Beperkingen voor tabel `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`klant_ID`) REFERENCES `account` (`klant_ID`),
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`faciliteit_ID`) REFERENCES `faciliteiten` (`faciliteit_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
