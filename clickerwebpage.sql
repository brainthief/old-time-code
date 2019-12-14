-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Darbinė stotis: localhost
-- Atlikimo laikas:  2011 m. Kovo 03 d.  09:32
-- Serverio versija: 5.1.41
-- PHP versija: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Duombazė: `clicker`
--

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `webpagelist`
--

CREATE TABLE IF NOT EXISTS `webpagelist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(300) COLLATE utf8_lithuanian_ci NOT NULL,
  `name` varchar(300) COLLATE utf8_lithuanian_ci NOT NULL,
  `per_day` int(11) NOT NULL,
  `priory` int(11) NOT NULL,
  `actyve` int(11) NOT NULL,
  `comment` text COLLATE utf8_lithuanian_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci AUTO_INCREMENT=18 ;

--
-- Sukurta duomenų kopija lentelei `webpagelist`
--

INSERT INTO `webpagelist` (`id`, `url`, `name`, `per_day`, `priory`, `actyve`, `comment`) VALUES
(10, 'www.pxxxx.lt', 'Market Leader', 0, 0, 0, '1'),
(12, 'www.xxxxx.lt', '', 0, 0, 0, ''),
(5, 'www.xxxxx-xxxx.lt', 'Market Leader', 0, 20, 10, '1'),
(13, 'www.xxxxxx-xxx.lt', '', 0, 0, 0, ''),
(14, 'www.x-x.lt/x.html', '', 0, 0, 0, ''),
(15, 'www.x-x.lt/x.html', '', 0, 0, 0, ''),
(16, 'www.x-x.lt/x.html', '', 0, 0, 0, ''),
(17, 'www.x-x.lt/news/x.html', '', 0, 0, 0, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
