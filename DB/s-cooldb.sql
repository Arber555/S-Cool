-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2017 at 06:22 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `s-cooldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `ID` int(11) NOT NULL,
  `Data_Lindjes` date DEFAULT NULL,
  `Vendi_Lindjes` varchar(40) DEFAULT NULL,
  `Nr_tel` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `adresa` varchar(125) DEFAULT NULL,
  `vendBanimi` varchar(50) DEFAULT NULL,
  `Relationship` varchar(150) DEFAULT NULL,
  `Detaje` varchar(500) DEFAULT NULL,
  `fk_Studenti` int(11) DEFAULT NULL,
  `fk_Profesori` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`ID`, `Data_Lindjes`, `Vendi_Lindjes`, `Nr_tel`, `email`, `adresa`, `vendBanimi`, `Relationship`, `Detaje`, `fk_Studenti`, `fk_Profesori`) VALUES
(19, '1970-01-01', 'Prishtine', 0, 'naim.preniqi@ubt-uni.net', 'Prishtine', 'Prishtine', 'I martuar', NULL, NULL, 13),
(20, '1972-02-01', 'Prishtine', 0, 'fatos.maxhuni@ubt-uni.net', 'Prishtine', 'Prishtine', 'I martuar', '', NULL, 12),
(21, '1996-07-20', 'Peje', 0, 'viganzeqiri@gmail.com', 'Prishtine', 'Prishtine', 'Single', NULL, 27, NULL),
(22, '1995-01-20', 'Vushtri', 0, 'besi123@gmail.com', '', 'Prishtine', NULL, '', 26, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `drejtimi`
--

CREATE TABLE `drejtimi` (
  `ID` int(11) NOT NULL,
  `Emri_Drejtimit` varchar(30) NOT NULL,
  `FK_Fakullteti` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drejtimi`
--

INSERT INTO `drejtimi` (`ID`, `Emri_Drejtimit`, `FK_Fakullteti`) VALUES
(5, 'programim', NULL),
(6, 'Menaxhim', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `edukimi`
--

CREATE TABLE `edukimi` (
  `ID` int(11) NOT NULL,
  `Emri` varchar(125) NOT NULL,
  `Kategoria` varchar(100) NOT NULL,
  `ID_About` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fakullteti`
--

CREATE TABLE `fakullteti` (
  `ID` int(11) NOT NULL,
  `Emri` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fakullteti`
--

INSERT INTO `fakullteti` (`ID`, `Emri`) VALUES
(3, 'MBE'),
(2, 'SHKI');

-- --------------------------------------------------------

--
-- Table structure for table `foto`
--

CREATE TABLE `foto` (
  `ID` int(11) NOT NULL,
  `File_Name` text,
  `File_Type` varchar(20) DEFAULT NULL,
  `File_Size` int(11) DEFAULT NULL,
  `Content` mediumblob,
  `FK_Studenti` int(11) DEFAULT NULL,
  `FK_Profi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foto`
--

INSERT INTO `foto` (`ID`, `File_Name`, `File_Type`, `File_Size`, `Content`, `FK_Studenti`, `FK_Profi`) VALUES
(25, 'user.png', 'image/png', 2699, NULL, NULL, 12);

-- --------------------------------------------------------

--
-- Table structure for table `grupi`
--

CREATE TABLE `grupi` (
  `ID` int(11) NOT NULL,
  `Emri_g` varchar(20) NOT NULL,
  `Orari_Kohes` varchar(20) NOT NULL,
  `FK_Drejtimi` int(11) DEFAULT NULL,
  `FK_Profi` int(11) DEFAULT NULL,
  `FK_viti` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grupi`
--

INSERT INTO `grupi` (`ID`, `Emri_g`, `Orari_Kohes`, `FK_Drejtimi`, `FK_Profi`, `FK_viti`) VALUES
(13, 'G2', 'Paradite', NULL, NULL, NULL),
(14, 'G3', 'pasdite', NULL, NULL, NULL),
(15, 'G4', 'Paradite', NULL, NULL, NULL),
(16, 'G1', 'Paradite', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `isfollowing`
--

CREATE TABLE `isfollowing` (
  `ID` int(11) NOT NULL,
  `follower` int(11) NOT NULL,
  `isFollowing` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `isfollowing`
--

INSERT INTO `isfollowing` (`ID`, `follower`, `isFollowing`) VALUES
(2, 18, 7),
(3, 18, 5),
(4, 18, 1),
(5, 22, 5),
(6, 25, 1),
(7, 25, 5),
(8, 25, 11),
(9, 26, 12),
(10, 26, 13);

-- --------------------------------------------------------

--
-- Table structure for table `lendet`
--

CREATE TABLE `lendet` (
  `ID` int(11) NOT NULL,
  `Emri` varchar(80) NOT NULL,
  `FK_Profi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lendet`
--

INSERT INTO `lendet` (`ID`, `Emri`, `FK_Profi`) VALUES
(2, 'Java', 12);

-- --------------------------------------------------------

--
-- Table structure for table `postimi`
--

CREATE TABLE `postimi` (
  `ID` int(11) NOT NULL,
  `Tekst` text,
  `File_Name` text,
  `File_Type` varchar(20) DEFAULT NULL,
  `File_size` int(11) DEFAULT NULL,
  `Content` mediumblob,
  `FK_Studenti` int(11) DEFAULT NULL,
  `FK_Profi` int(11) DEFAULT NULL,
  `FK_Grupi` int(11) DEFAULT NULL,
  `FK_Lenda` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `postimi`
--

INSERT INTO `postimi` (`ID`, `Tekst`, `File_Name`, `File_Type`, `File_size`, `Content`, `FK_Studenti`, `FK_Profi`, `FK_Grupi`, `FK_Lenda`) VALUES
(56, 'Kollokfiumi ne Java1 shtyhet per te Marten.', NULL, NULL, NULL, NULL, NULL, 12, NULL, NULL),
(57, 'Ushtrime per i/o', 'CS2_-_IO.ppt', 'application/vnd.ms-p', 310272, NULL, NULL, 12, NULL, NULL),
(58, 'FjalÃ«t kyÃ§e ne Abstrakt, KUJDES!\r\nMaksimumi 5 fjalÃ« kyÃ§ duhen pÃ«rfshirÃ« menjÃ«herÃ« pas abstraktit. FjalÃ«t kyÃ§ shÃ«rbejnÃ« pÃ«r tÃ« tÃ«rhequr vÃ«mendjen e lexuesit, si dhe pÃ«r pÃ«rzgjedhjen e artikujve nÃ« baza elektronike informacioni. FjalÃ«t kyÃ§ Ã«shtÃ« mirÃ« qÃ« tÃ« pÃ«rmbledhin temÃ«n, nÃ«ntemÃ«n, llojin e studimit, popullatÃ«n, vendin e zbatimit tÃ« studimit.\r\n', NULL, NULL, NULL, NULL, NULL, 13, NULL, NULL),
(59, 'Detyrat per kete jave', 'Detyra-2-Menaxhim-i-Projekteve.docx', 'application/vnd.open', 21471, NULL, NULL, 13, NULL, NULL),
(60, 'Provimi do te jete me 24 shkurt ', NULL, NULL, NULL, NULL, NULL, 12, NULL, 2),
(61, 'Pstimi', 'build.xml', 'text/xml', 3600, NULL, NULL, 12, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `profesori`
--

CREATE TABLE `profesori` (
  `ID` int(11) NOT NULL,
  `Emri` varchar(20) NOT NULL,
  `Mbiemri` varchar(20) NOT NULL,
  `UserName` varchar(20) NOT NULL,
  `Password` char(76) NOT NULL,
  `Nr_personal` int(11) NOT NULL,
  `Gjinia` char(1) NOT NULL,
  `FR_Fakulltetit` int(11) DEFAULT NULL,
  `fk_Drejtimit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profesori`
--

INSERT INTO `profesori` (`ID`, `Emri`, `Mbiemri`, `UserName`, `Password`, `Nr_personal`, `Gjinia`, `FR_Fakulltetit`, `fk_Drejtimit`) VALUES
(5, 'MUUUU', 'qqq', 'qqq', 'AmxrkS7Psd752', 123131312, 'F', NULL, NULL),
(6, 'Edmond', 'edmond', 'edmond', 'AmFpF8acnExWA', 1231313, 'M', NULL, NULL),
(7, 'Ragip', 'Topalli', 'qweqe', 'AmHSDLB.wSSKM', 21323, 'M', NULL, NULL),
(8, 'maus', 'maus', 'maus', 'AmTsVFaiIPk8E', 54645, 'F', NULL, NULL),
(9, 'iii', 'iii', 'iii', 'AmkPQSUGeWfd.', 123213, 'M', NULL, NULL),
(10, 'yyy', 'yyy', 'yyy', 'AmpBUUNCqxcAI', 234, 'M', NULL, NULL),
(11, 'ppp', 'ppp', 'ppp', 'Ambwcef.lPpfE', 543219876, 'M', NULL, NULL),
(12, 'Fatos', 'Maxhuni', 'fatos', 'Amr1/VboPexgk', 909098787, 'M', NULL, NULL),
(13, 'Naim', 'Preniqi', 'naimi', 'AmKSCLfJWHpxo', 34343455, 'M', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `profesori/studenti`
--

CREATE TABLE `profesori/studenti` (
  `ID` int(11) NOT NULL,
  `FK_p` int(11) NOT NULL,
  `FK_s` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `punesimi`
--

CREATE TABLE `punesimi` (
  `ID` int(11) NOT NULL,
  `Emri` varchar(100) NOT NULL,
  `Pozita` varchar(100) DEFAULT NULL,
  `ID_About` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `studenti`
--

CREATE TABLE `studenti` (
  `ID` int(11) NOT NULL,
  `Kryetar` tinyint(1) NOT NULL,
  `Emri` varchar(20) NOT NULL,
  `Mbiemri` varchar(20) NOT NULL,
  `UserName` varchar(20) NOT NULL,
  `Password` char(76) NOT NULL,
  `Nr_personal` int(11) NOT NULL,
  `Gjinia` char(1) NOT NULL,
  `FR_Fakulltetit` int(11) DEFAULT NULL,
  `FK_Grupi` int(11) DEFAULT NULL,
  `fk_Drejtimi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studenti`
--

INSERT INTO `studenti` (`ID`, `Kryetar`, `Emri`, `Mbiemri`, `UserName`, `Password`, `Nr_personal`, `Gjinia`, `FR_Fakulltetit`, `FK_Grupi`, `fk_Drejtimi`) VALUES
(4, 0, 'ArbÃ«r', 'Mulla', 'ArberM', 'AmJyr.sjVp4IM', 123456789, 'M', NULL, 13, 5),
(6, 0, 'Ragip', 'Topalli', 'Rtopalli', 'AmJyr.sjVp4IM', 123456789, 'M', NULL, 13, 5),
(16, 1, 'Illi', 'olla', 'abc', 'AmFqZUcTz9zXM', 2313213, 'M', NULL, 16, 5),
(17, 0, 'asdsaf', 'hasaaaa', 'ddd', 'Amf.OTVl5qBjo', 1234123, 'M', NULL, 14, 5),
(18, 1, 'ccc', 'ccc', 'ccc', 'AmmT6iVP.QVpQ', 12321321, 'M', NULL, NULL, 5),
(19, 0, 'aaa', 'aaa', 'aaa', 'aaa', 123456789, 'M', NULL, 16, 5),
(20, 1, 'eee', 'eee', 'eee', 'eee', 123456987, 'F', NULL, 16, 5),
(22, 1, 'Shkelzen', 'askmf', 'xeni', 'Am6zh3XN6xSpo', 2147483647, 'M', NULL, NULL, NULL),
(23, 1, 'www', 'www', 'www', 'Ammj5t1kypzc2', 1232131, 'M', NULL, NULL, NULL),
(24, 1, 'Rilind', 'Fetoshi', 'lindi', 'AmVpHVK/vXJeE', 123123, 'M', NULL, NULL, NULL),
(25, 1, 'sss', 'sss', 'sss', 'AmP1Nl0RLsv9E', 12345678, 'M', NULL, NULL, NULL),
(26, 1, 'Beslind', 'Mema', 'besi', 'AmUlPFj8RFU0o', 2147483647, 'M', NULL, NULL, NULL),
(27, 0, 'Vigan', 'Zeqiri', 'viga', 'AmBjlwnKhvqsA', 1234564532, 'M', NULL, NULL, NULL),
(28, 0, 'Agron', 'Ajvazi', 'goni123', 'Amn1Qlwh1qKZg', 13454546, 'M', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tempnotification`
--

CREATE TABLE `tempnotification` (
  `ID` int(11) NOT NULL,
  `Fk_Postimi` int(11) DEFAULT NULL,
  `Fk_Profi` int(11) DEFAULT NULL,
  `Fk_Grupi` int(11) DEFAULT NULL,
  `FK_Studenti` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tempnotification`
--

INSERT INTO `tempnotification` (`ID`, `Fk_Postimi`, `Fk_Profi`, `Fk_Grupi`, `FK_Studenti`) VALUES
(1, 53, 11, NULL, 25),
(2, 54, 5, NULL, 18),
(3, 54, 5, NULL, 22),
(4, 54, 5, NULL, 25),
(5, 55, 5, NULL, 18),
(6, 55, 5, NULL, 22),
(7, 55, 5, NULL, 25),
(8, 61, 12, NULL, 26);

-- --------------------------------------------------------

--
-- Table structure for table `viti_studimit`
--

CREATE TABLE `viti_studimit` (
  `ID` int(11) NOT NULL,
  `Viti` varchar(20) NOT NULL,
  `fk_Drejtimit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `viti_studimit`
--

INSERT INTO `viti_studimit` (`ID`, `Viti`, `fk_Drejtimit`) VALUES
(1, '2014/2015', NULL),
(2, '2015/2016', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fr_Studenti` (`fk_Studenti`),
  ADD KEY `fk_Profesori` (`fk_Profesori`);

--
-- Indexes for table `drejtimi`
--
ALTER TABLE `drejtimi`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_Fakullteti` (`FK_Fakullteti`);

--
-- Indexes for table `edukimi`
--
ALTER TABLE `edukimi`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_About` (`ID_About`);

--
-- Indexes for table `fakullteti`
--
ALTER TABLE `fakullteti`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Emri` (`Emri`);

--
-- Indexes for table `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_Studenti` (`FK_Studenti`),
  ADD KEY `FK_Profi` (`FK_Profi`);

--
-- Indexes for table `grupi`
--
ALTER TABLE `grupi`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_Drejtimi` (`FK_Drejtimi`),
  ADD KEY `FK_Profi` (`FK_Profi`),
  ADD KEY `FK_viti` (`FK_viti`);

--
-- Indexes for table `isfollowing`
--
ALTER TABLE `isfollowing`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `lendet`
--
ALTER TABLE `lendet`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_Profi` (`FK_Profi`);

--
-- Indexes for table `postimi`
--
ALTER TABLE `postimi`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_Studenti` (`FK_Studenti`),
  ADD KEY `FK_Profi` (`FK_Profi`),
  ADD KEY `FK_Grupi` (`FK_Grupi`),
  ADD KEY `FK_Lenda` (`FK_Lenda`);

--
-- Indexes for table `profesori`
--
ALTER TABLE `profesori`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_Drejtimit` (`fk_Drejtimit`);

--
-- Indexes for table `profesori/studenti`
--
ALTER TABLE `profesori/studenti`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_p` (`FK_p`),
  ADD KEY `FK_s` (`FK_s`);

--
-- Indexes for table `punesimi`
--
ALTER TABLE `punesimi`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_About` (`ID_About`);

--
-- Indexes for table `studenti`
--
ALTER TABLE `studenti`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `UserName` (`UserName`),
  ADD KEY `FK_Grupi` (`FK_Grupi`);

--
-- Indexes for table `tempnotification`
--
ALTER TABLE `tempnotification`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Fk_Postimi` (`Fk_Postimi`),
  ADD KEY `Fk_Profi` (`Fk_Profi`),
  ADD KEY `Fk_Grupi` (`Fk_Grupi`),
  ADD KEY `FK_Studenti` (`FK_Studenti`);

--
-- Indexes for table `viti_studimit`
--
ALTER TABLE `viti_studimit`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_Drejtimit` (`fk_Drejtimit`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `drejtimi`
--
ALTER TABLE `drejtimi`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `edukimi`
--
ALTER TABLE `edukimi`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fakullteti`
--
ALTER TABLE `fakullteti`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `foto`
--
ALTER TABLE `foto`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `grupi`
--
ALTER TABLE `grupi`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `isfollowing`
--
ALTER TABLE `isfollowing`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `lendet`
--
ALTER TABLE `lendet`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `postimi`
--
ALTER TABLE `postimi`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `profesori`
--
ALTER TABLE `profesori`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `profesori/studenti`
--
ALTER TABLE `profesori/studenti`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `punesimi`
--
ALTER TABLE `punesimi`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `studenti`
--
ALTER TABLE `studenti`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `tempnotification`
--
ALTER TABLE `tempnotification`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `viti_studimit`
--
ALTER TABLE `viti_studimit`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `about`
--
ALTER TABLE `about`
  ADD CONSTRAINT `about_ibfk_2` FOREIGN KEY (`fk_Profesori`) REFERENCES `profesori` (`ID`),
  ADD CONSTRAINT `about_ibfk_3` FOREIGN KEY (`fk_Studenti`) REFERENCES `studenti` (`ID`);

--
-- Constraints for table `drejtimi`
--
ALTER TABLE `drejtimi`
  ADD CONSTRAINT `drejtimi_ibfk_1` FOREIGN KEY (`FK_Fakullteti`) REFERENCES `fakullteti` (`ID`);

--
-- Constraints for table `edukimi`
--
ALTER TABLE `edukimi`
  ADD CONSTRAINT `edukimi_ibfk_1` FOREIGN KEY (`ID_About`) REFERENCES `about` (`ID`);

--
-- Constraints for table `foto`
--
ALTER TABLE `foto`
  ADD CONSTRAINT `foto_ibfk_1` FOREIGN KEY (`FK_Studenti`) REFERENCES `studenti` (`ID`),
  ADD CONSTRAINT `foto_ibfk_2` FOREIGN KEY (`FK_Profi`) REFERENCES `profesori` (`ID`);

--
-- Constraints for table `grupi`
--
ALTER TABLE `grupi`
  ADD CONSTRAINT `grupi_ibfk_1` FOREIGN KEY (`FK_Profi`) REFERENCES `profesori` (`ID`),
  ADD CONSTRAINT `grupi_ibfk_2` FOREIGN KEY (`FK_Drejtimi`) REFERENCES `drejtimi` (`ID`),
  ADD CONSTRAINT `grupi_ibfk_3` FOREIGN KEY (`FK_viti`) REFERENCES `viti_studimit` (`ID`);

--
-- Constraints for table `lendet`
--
ALTER TABLE `lendet`
  ADD CONSTRAINT `lendet_ibfk_1` FOREIGN KEY (`FK_Profi`) REFERENCES `profesori` (`ID`);

--
-- Constraints for table `postimi`
--
ALTER TABLE `postimi`
  ADD CONSTRAINT `postimi_ibfk_1` FOREIGN KEY (`FK_Studenti`) REFERENCES `studenti` (`ID`),
  ADD CONSTRAINT `postimi_ibfk_2` FOREIGN KEY (`FK_Profi`) REFERENCES `profesori` (`ID`),
  ADD CONSTRAINT `postimi_ibfk_3` FOREIGN KEY (`FK_Grupi`) REFERENCES `grupi` (`ID`),
  ADD CONSTRAINT `postimi_ibfk_4` FOREIGN KEY (`FK_Lenda`) REFERENCES `lendet` (`ID`);

--
-- Constraints for table `profesori`
--
ALTER TABLE `profesori`
  ADD CONSTRAINT `profesori_ibfk_2` FOREIGN KEY (`fk_Drejtimit`) REFERENCES `drejtimi` (`ID`);

--
-- Constraints for table `profesori/studenti`
--
ALTER TABLE `profesori/studenti`
  ADD CONSTRAINT `profesori/studenti_ibfk_1` FOREIGN KEY (`FK_p`) REFERENCES `profesori` (`ID`),
  ADD CONSTRAINT `profesori/studenti_ibfk_2` FOREIGN KEY (`FK_s`) REFERENCES `studenti` (`ID`);

--
-- Constraints for table `punesimi`
--
ALTER TABLE `punesimi`
  ADD CONSTRAINT `punesimi_ibfk_1` FOREIGN KEY (`ID_About`) REFERENCES `about` (`ID`);

--
-- Constraints for table `studenti`
--
ALTER TABLE `studenti`
  ADD CONSTRAINT `studenti_ibfk_2` FOREIGN KEY (`FK_Grupi`) REFERENCES `grupi` (`ID`);

--
-- Constraints for table `tempnotification`
--
ALTER TABLE `tempnotification`
  ADD CONSTRAINT `tempnotification_ibfk_1` FOREIGN KEY (`FK_Studenti`) REFERENCES `studenti` (`ID`);

--
-- Constraints for table `viti_studimit`
--
ALTER TABLE `viti_studimit`
  ADD CONSTRAINT `viti_studimit_ibfk_1` FOREIGN KEY (`fk_Drejtimit`) REFERENCES `drejtimi` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
