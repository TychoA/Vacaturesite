-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Machine: localhost:8889
-- Gegenereerd op: 14 jan 2015 om 14:07
-- Serverversie: 5.5.38
-- PHP-versie: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `stagepeer`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `cv`
--

CREATE TABLE `cv` (
`ID` int(11) NOT NULL,
  `ID_werknemers` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `naam` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `instituut` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `datum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `locatie` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `beschrijving` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `cv`
--

INSERT INTO `cv` (`ID`, `ID_werknemers`, `type`, `naam`, `instituut`, `datum`, `locatie`, `beschrijving`) VALUES
(7, 1, 'diploma', 'Zwemdiploma A', 'Zwemschool', '2015-01-12 13:49:27', 'Amsterdam', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam tincidunt, nibh id suscipit lacinia, tellus orci scelerisque nibh, a ornare magna augue eu nisl. Aliquam erat volutpat.'),
(8, 1, 'opleiding', 'Informatiekunde', 'Universiteit van Amsterdam', '2015-01-12 13:49:27', 'Amsterdam', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam tincidunt, nibh id suscipit lacinia, tellus orci scelerisque nibh, a ornare magna augue eu nisl. Aliquam erat volutpat.'),
(9, 1, 'werkervaring', 'Koffiezetter', 'Universiteit van Amsterdam', '2015-01-12 14:02:21', 'Amsterdam', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam tincidunt, nibh id suscipit lacinia, tellus orci scelerisque nibh, a ornare magna augue eu nisl. Aliquam erat volutpat.');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `favorieten`
--

CREATE TABLE `favorieten` (
`ID` int(11) NOT NULL,
  `ID_werknemers` int(11) NOT NULL,
  `ID_vacatures` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `favorieten`
--

INSERT INTO `favorieten` (`ID`, `ID_werknemers`, `ID_vacatures`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `skills`
--

CREATE TABLE `skills` (
`ID` int(11) NOT NULL,
  `ID_werknemer` int(11) NOT NULL,
  `skill` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vaardigheid` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `skills`
--

INSERT INTO `skills` (`ID`, `ID_werknemer`, `skill`, `vaardigheid`) VALUES
(1, 1, 'PHP', 5);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `taal`
--

CREATE TABLE `taal` (
`ID` int(11) NOT NULL,
  `ID_werknemers` int(11) NOT NULL,
  `taal` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vaardigheid` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `taal`
--

INSERT INTO `taal` (`ID`, `ID_werknemers`, `taal`, `vaardigheid`) VALUES
(1, 1, 'Engels', 'Moedertaal');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `vacatures`
--

CREATE TABLE `vacatures` (
`ID` int(11) NOT NULL,
  `ID_werkgevers` int(11) NOT NULL,
  `datum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `duur` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `opleidingen` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `locatie` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foto` tinyint(1) NOT NULL,
  `titel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `beschrijving_aanbod` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `beschrijving_eisen` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `beschrijving_overige` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `tags` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `vacatures`
--

INSERT INTO `vacatures` (`ID`, `ID_werkgevers`, `datum`, `duur`, `opleidingen`, `locatie`, `foto`, `titel`, `beschrijving_aanbod`, `beschrijving_eisen`, `beschrijving_overige`, `tags`) VALUES
(1, 1, '2015-01-12 13:39:09', '2', 'in, ki, ik', 'Amsterdam', 1, 'Titel vacature', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam tincidunt, nibh id suscipit lacinia, tellus orci scelerisque nibh, a ornare magna augue eu nisl. Aliquam erat volutpat.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam tincidunt, nibh id suscipit lacinia, tellus orci scelerisque nibh, a ornare magna augue eu nisl. Aliquam erat volutpat.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam tincidunt, nibh id suscipit lacinia, tellus orci scelerisque nibh, a ornare magna augue eu nisl. Aliquam erat volutpat.', 'webdesign, css');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `verstuurd_werkgever`
--

CREATE TABLE `verstuurd_werkgever` (
`ID` int(11) NOT NULL,
  `ID_werkgever` int(11) NOT NULL,
  `ID_werknemer` int(11) NOT NULL,
  `ID_vacature` int(11) NOT NULL,
  `datum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `titel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bericht` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `verstuurd_werkgever`
--

INSERT INTO `verstuurd_werkgever` (`ID`, `ID_werkgever`, `ID_werknemer`, `ID_vacature`, `datum`, `titel`, `bericht`) VALUES
(1, 1, 1, 1, '2015-01-12 13:41:20', 'Titel bericht', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam tincidunt, nibh id suscipit lacinia, tellus orci scelerisque nibh, a ornare magna augue eu nisl. Aliquam erat volutpat.');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `verstuurd_werknemer`
--

CREATE TABLE `verstuurd_werknemer` (
`ID` int(11) NOT NULL,
  `ID_werknemer` int(11) NOT NULL,
  `ID_werkgever` int(11) NOT NULL,
  `ID_vacature` int(11) NOT NULL,
  `datum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `titel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bericht` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `verstuurd_werknemer`
--

INSERT INTO `verstuurd_werknemer` (`ID`, `ID_werknemer`, `ID_werkgever`, `ID_vacature`, `datum`, `titel`, `bericht`) VALUES
(1, 1, 1, 1, '2015-01-12 13:41:05', 'Titel bericht', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam tincidunt, nibh id suscipit lacinia, tellus orci scelerisque nibh, a ornare magna augue eu nisl. Aliquam erat volutpat.');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `werkgevers`
--

CREATE TABLE `werkgevers` (
`ID` int(11) NOT NULL,
  `naam` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `e-mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `wachtwoord` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefoonnummer` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `plaatsnaam` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kvk` int(30) NOT NULL,
  `url_foto` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `werkgevers`
--

INSERT INTO `werkgevers` (`ID`, `naam`, `e-mail`, `wachtwoord`, `telefoonnummer`, `plaatsnaam`, `kvk`, `url_foto`) VALUES
(1, 'Google', 'google@gmail.com', 'google', '0612345678', 'Amsterdam', 12345678, 'ik44.webdb.fnwi.uva.nl/Vacaturesite//img/logo.png');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `werknemers`
--

CREATE TABLE `werknemers` (
`ID` int(11) NOT NULL COMMENT 'Werknemers ID',
  `naam` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Voornaam',
  `achternaam` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Achternaam',
  `wachtwoord` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Wachtwoord',
  `telefoonnummer` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Telefoonnummer',
  `plaatsnaam` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Plaatsnaam',
  `url_foto` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'URL van profielfoto',
  `samenvatting` varchar(500) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Samenvatting',
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `werknemers`
--

INSERT INTO `werknemers` (`ID`, `naam`, `achternaam`, `wachtwoord`, `telefoonnummer`, `plaatsnaam`, `url_foto`, `samenvatting`, `email`) VALUES
(1, 'jaap', 'verhoeven', 'geheim', '0612345678', 'Amsterdam', 'ik44.webdb.fnwi.uva.nl/Vacaturesite/img/me.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam tincidunt, nibh id suscipit lacinia, tellus orci scelerisque nibh, a ornare magna augue eu nisl. Aliquam erat volutpat.', 'jaapverhoeven@gmail.com');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `cv`
--
ALTER TABLE `cv`
 ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `favorieten`
--
ALTER TABLE `favorieten`
 ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `skills`
--
ALTER TABLE `skills`
 ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `taal`
--
ALTER TABLE `taal`
 ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `vacatures`
--
ALTER TABLE `vacatures`
 ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `verstuurd_werkgever`
--
ALTER TABLE `verstuurd_werkgever`
 ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `verstuurd_werknemer`
--
ALTER TABLE `verstuurd_werknemer`
 ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `werkgevers`
--
ALTER TABLE `werkgevers`
 ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `werknemers`
--
ALTER TABLE `werknemers`
 ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `cv`
--
ALTER TABLE `cv`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT voor een tabel `favorieten`
--
ALTER TABLE `favorieten`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT voor een tabel `skills`
--
ALTER TABLE `skills`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT voor een tabel `taal`
--
ALTER TABLE `taal`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT voor een tabel `vacatures`
--
ALTER TABLE `vacatures`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT voor een tabel `verstuurd_werkgever`
--
ALTER TABLE `verstuurd_werkgever`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT voor een tabel `verstuurd_werknemer`
--
ALTER TABLE `verstuurd_werknemer`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT voor een tabel `werkgevers`
--
ALTER TABLE `werkgevers`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT voor een tabel `werknemers`
--
ALTER TABLE `werknemers`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Werknemers ID',AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
