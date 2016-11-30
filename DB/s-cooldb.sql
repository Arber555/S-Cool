-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2016 at 01:50 PM
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
  `Data_Lindjes` date NOT NULL,
  `Vendi_Lindjes` varchar(40) NOT NULL,
  `Nr_tel` int(11) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `adresa` varchar(125) NOT NULL,
  `vendBanimi` varchar(50) DEFAULT NULL,
  `Relationship` varchar(150) DEFAULT NULL,
  `Detaje` varchar(500) DEFAULT NULL,
  `fr_Studenti` int(11) DEFAULT NULL,
  `fk_Profesori` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `drejtimi`
--

CREATE TABLE `drejtimi` (
  `ID` int(11) NOT NULL,
  `Emri` varchar(30) NOT NULL,
  `FK_Fakullteti` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(2, 'SHKI');

-- --------------------------------------------------------

--
-- Table structure for table `grupi`
--

CREATE TABLE `grupi` (
  `ID` int(11) NOT NULL,
  `Emri_g` varchar(20) NOT NULL,
  `Orari_Kohes` varchar(20) NOT NULL,
  `FK_Drejtimi` int(11) NOT NULL,
  `FK_Profi` int(11) NOT NULL,
  `FK_viti` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `postimi`
--

CREATE TABLE `postimi` (
  `ID` int(11) NOT NULL,
  `Tekst` text,
  `File_Name` text,
  `File_Type` varchar(20) DEFAULT NULL,
  `File_size` int(11) NOT NULL,
  `Content` mediumblob NOT NULL,
  `FK_Studenti` int(11) NOT NULL,
  `FK_Profi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `FK_Grupi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studenti`
--

INSERT INTO `studenti` (`ID`, `Kryetar`, `Emri`, `Mbiemri`, `UserName`, `Password`, `Nr_personal`, `Gjinia`, `FR_Fakulltetit`, `FK_Grupi`) VALUES
(4, 1, 'ArbÃ«r', 'Mulla', 'ArberM', 'AmJyr.sjVp4IM', 123456789, 'M', NULL, NULL),
(5, 0, 'ABC', 'BCA', '12345', 'AmJyr.sjVp4IM', 12345, 'F', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `viti_studimit`
--

CREATE TABLE `viti_studimit` (
  `ID` int(11) NOT NULL,
  `Viti` year(4) NOT NULL,
  `fk_Drejtimit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fr_Studenti` (`fr_Studenti`),
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
-- Indexes for table `grupi`
--
ALTER TABLE `grupi`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_Drejtimi` (`FK_Drejtimi`),
  ADD KEY `FK_Profi` (`FK_Profi`),
  ADD KEY `FK_viti` (`FK_viti`);

--
-- Indexes for table `postimi`
--
ALTER TABLE `postimi`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_Studenti` (`FK_Studenti`),
  ADD KEY `FK_Profi` (`FK_Profi`);

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `drejtimi`
--
ALTER TABLE `drejtimi`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `edukimi`
--
ALTER TABLE `edukimi`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fakullteti`
--
ALTER TABLE `fakullteti`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `grupi`
--
ALTER TABLE `grupi`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `postimi`
--
ALTER TABLE `postimi`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `profesori`
--
ALTER TABLE `profesori`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `viti_studimit`
--
ALTER TABLE `viti_studimit`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

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
-- Constraints for table `grupi`
--
ALTER TABLE `grupi`
  ADD CONSTRAINT `grupi_ibfk_1` FOREIGN KEY (`FK_Profi`) REFERENCES `profesori` (`ID`),
  ADD CONSTRAINT `grupi_ibfk_2` FOREIGN KEY (`FK_Drejtimi`) REFERENCES `drejtimi` (`ID`),
  ADD CONSTRAINT `grupi_ibfk_3` FOREIGN KEY (`FK_viti`) REFERENCES `viti_studimit` (`ID`);

--
-- Constraints for table `postimi`
--
ALTER TABLE `postimi`
  ADD CONSTRAINT `postimi_ibfk_1` FOREIGN KEY (`FK_Studenti`) REFERENCES `studenti` (`ID`),
  ADD CONSTRAINT `postimi_ibfk_2` FOREIGN KEY (`FK_Profi`) REFERENCES `profesori` (`ID`);

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
-- Constraints for table `viti_studimit`
--
ALTER TABLE `viti_studimit`
  ADD CONSTRAINT `viti_studimit_ibfk_1` FOREIGN KEY (`fk_Drejtimit`) REFERENCES `drejtimi` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
