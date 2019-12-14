-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Darbinė stotis: localhost
-- Atlikimo laikas:  2011 m. Kovo 10 d.  09:03
-- Serverio versija: 5.1.41
-- PHP versija: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Duombazė: `forex`
--

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `orderiai`
--

CREATE TABLE IF NOT EXISTS `orderiai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sanderio_data` text COLLATE utf8_lithuanian_ci NOT NULL,
  `sanderio_tipas` text COLLATE utf8_lithuanian_ci NOT NULL,
  `EMA15` text COLLATE utf8_lithuanian_ci NOT NULL,
  `EMA15_kirtimas` text COLLATE utf8_lithuanian_ci NOT NULL,
  `EMA5` text COLLATE utf8_lithuanian_ci NOT NULL,
  `FZR_ir_NK` text COLLATE utf8_lithuanian_ci NOT NULL,
  `FOS` text COLLATE utf8_lithuanian_ci NOT NULL,
  `kaina` text COLLATE utf8_lithuanian_ci NOT NULL,
  `TP` text COLLATE utf8_lithuanian_ci NOT NULL,
  `SL` text COLLATE utf8_lithuanian_ci NOT NULL,
  `FIBO` text COLLATE utf8_lithuanian_ci NOT NULL,
  `Planas_ir_komentarai` text COLLATE utf8_lithuanian_ci NOT NULL,
  `paveikslelis_did_tf` text COLLATE utf8_lithuanian_ci NOT NULL,
  `paveikslelis_ein_tf` text COLLATE utf8_lithuanian_ci NOT NULL,
  `rezultato_orderis` text COLLATE utf8_lithuanian_ci NOT NULL,
  `paveikslelis_po` text COLLATE utf8_lithuanian_ci NOT NULL,
  `komentarai_analizes` text COLLATE utf8_lithuanian_ci NOT NULL,
  `Pagal_trenda` text COLLATE utf8_lithuanian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci AUTO_INCREMENT=110 ;

--
-- Sukurta duomenų kopija lentelei `orderiai`
--

INSERT INTO `orderiai` (`id`, `sanderio_data`, `sanderio_tipas`, `EMA15`, `EMA15_kirtimas`, `EMA5`, `FZR_ir_NK`, `FOS`, `kaina`, `TP`, `SL`, `FIBO`, `Planas_ir_komentarai`, `paveikslelis_did_tf`, `paveikslelis_ein_tf`, `rezultato_orderis`, `paveikslelis_po`, `komentarai_analizes`, `Pagal_trenda`) VALUES
(104, '1292246760', 'Buy', 'Å½emyn', 'Å½emyn', 'Å½emyn', 'UsC + pivotas + NK', 'Ne', '1.5743', '1.5755', '1.5720', '161%', '161% nuo A ir korekcinis 76%\r\nPo usC galimas apsisukimas\r\n\r\n', '1292247536.gif ', '1292247020.gif ', 'TP', '1292247202.gif ', 'Greitas Å¡uolis kliudes TP\r\nPrastas MM ir RM. Per didelis stopas, per maÅ¾as TF.\r\n', 'Taip');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `strategija`
--

CREATE TABLE IF NOT EXISTS `strategija` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sdata` text COLLATE utf8_lithuanian_ci NOT NULL,
  `srusis` text COLLATE utf8_lithuanian_ci NOT NULL,
  `speriodas` text COLLATE utf8_lithuanian_ci NOT NULL,
  `gr1link` text COLLATE utf8_lithuanian_ci NOT NULL,
  `gr1cmt` text COLLATE utf8_lithuanian_ci NOT NULL,
  `gr2link` text COLLATE utf8_lithuanian_ci NOT NULL,
  `gr2cmt` text COLLATE utf8_lithuanian_ci NOT NULL,
  `gr3link` text COLLATE utf8_lithuanian_ci NOT NULL,
  `gr3cmt` text COLLATE utf8_lithuanian_ci NOT NULL,
  `gr4link` text COLLATE utf8_lithuanian_ci NOT NULL,
  `gr4cmt` text COLLATE utf8_lithuanian_ci NOT NULL,
  `taktika` text COLLATE utf8_lithuanian_ci NOT NULL,
  `arpasitvirtino` text COLLATE utf8_lithuanian_ci NOT NULL,
  `valiuta` text COLLATE utf8_lithuanian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci AUTO_INCREMENT=16 ;

--
-- Sukurta duomenų kopija lentelei `strategija`
--

INSERT INTO `strategija` (`id`, `sdata`, `srusis`, `speriodas`, `gr1link`, `gr1cmt`, `gr2link`, `gr2cmt`, `gr3link`, `gr3cmt`, `gr4link`, `gr4cmt`, `taktika`, `arpasitvirtino`, `valiuta`) VALUES
(11, '2011/03/09/16:42:41', '', 'IP', '', '', '', '', '', '', '', '', '', '', 'GBP/USD'),
(12, '1299680745', '', 'TP', '1299679388.png', 'trendas Å¾emyn - paskutinis FZR Ä¯ tÄ… pusÄ™', '', '', '', '', '', '', '', '', 'GBP/USD'),
(15, '1299682464', '', 'VP', '1299740468.png', '2011/03/09/16:54:24', '', 'antras seivas', '', '', '', '', '', '', 'EUR/USD');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
