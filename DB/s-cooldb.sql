-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2017 at 10:12 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

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
(1, '1995-12-30', 'PejÃ«', 11111111, 'arbermullaa@gmail.com', 'EEEEEEE', 'PejÃ«', 'single', 'JoJo', 4, NULL),
(2, '0000-00-00', 'F', 10101, 'abc@gmail.com', 'adresa', '2016-12-14', 'no girlfriend', 'detajet', 6, 1),
(3, '2017-01-10', 'London', 12365487, 'aaaccc@gmai.com', 'Lezha123', 'prishtine', 'single', '', 16, NULL),
(4, '2017-01-28', 'Paris', 8978979, 'ny@gmail.com', 'nyny', 'New York', 'yes', '', 17, NULL),
(5, '2017-01-04', 'Vjetnam', 456654, 'ccc@gmail.com', '45 shtatori, Prishtine', 'Prishtine', 'Jo', '', 18, NULL),
(6, '2017-01-31', 'Peje', 10101, 'q20@gmail.com', 'adresa', 'askdnkas', 'asnda', 'detajet', NULL, 5),
(7, '2017-01-04', 'qwewqe', 123123, 'qweqwewq', 'qwewqe', 'qwewqeq', 'qweqwe', NULL, NULL, 7),
(8, '2017-01-03', 'qwewqeqw', 1231231, 'qweqweqw@gmail.com', 'qweqweqw', 'asesa', 'qewqesa', NULL, 19, NULL),
(9, '2017-01-21', 'qweqwe', 123123, 'qweqwe@yahoo.com', 'jasdnjan', 'kjasnfjask', 'ksnajkd', NULL, 20, NULL),
(10, '2017-01-19', 'qweqweq', 12312312, 'asjdasj@jhasdas.com', 'kajsfn', 'ajn', 'aa', NULL, NULL, 6),
(11, '1970-01-01', 'asjdn', 8789, 'ajksndjkas@hotmal.com', 'ajksdnajk', 'asdnasj', 'jkasndja', 'asjkdas', 22, NULL),
(12, '1970-01-01', '', NULL, '', NULL, '', NULL, NULL, NULL, 8),
(13, '1970-01-01', 'qweqweq', 0, '', '', '', NULL, '', 23, NULL),
(14, '1970-01-01', 'qweqweqqqq', NULL, '', NULL, '', NULL, NULL, NULL, 9),
(15, '1970-01-01', 'qwe', 0, '', '', '', NULL, '', NULL, 10),
(16, '1996-08-06', 'Rahovec', 0, '', '', '', NULL, '', 24, NULL);

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
(5, 'programim', NULL);

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
(10, '486373086.png', 'image/png', 177728, NULL, 17, NULL),
(12, '486373086.png', 'image/png', 177728, NULL, 18, NULL),
(13, 'mr-robot-3.png', 'image/png', 90395, NULL, 4, NULL);

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
(15, 'G4', 'Paradite', NULL, NULL, NULL);

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
(2, 18, 7);

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
(2, 'Java', 5);

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
(3, 'Postimi i par nga profi dikushi!!!!', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(4, 'Postimi i dyt nga profi dikushi!!!!', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(6, 'Pstimi i tret nga profi prej faqes!!!!', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(9, 'Pstimi 4 test!!!!', NULL, NULL, NULL, NULL, 4, 1, 13, NULL),
(10, 'Postimi i 5 test!!!!', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(11, 'Postimi i 6 test!!!!', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(12, 'test 7', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(13, 'asdfghjk', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(14, 'aaaa', 'Detyra-Menaxhimi-i-Projekteve.docx', 'application/vnd.open', 18619, NULL, NULL, 1, NULL, NULL),
(15, 'aaaaaa', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(16, 'qweq', '486373086.png', 'image/png', 177728, NULL, NULL, 1, NULL, NULL),
(20, 'asdasdsa', NULL, NULL, NULL, NULL, 4, NULL, 13, NULL),
(21, 'asdasdsa', NULL, NULL, NULL, NULL, 4, NULL, 13, NULL),
(23, 'asdadasdsa', NULL, NULL, NULL, NULL, 4, NULL, 13, NULL),
(24, 'asdad', NULL, NULL, NULL, NULL, 18, NULL, 13, NULL),
(25, 'KALLLLI', 'Gant-Chart.xlsx', 'application/vnd.open', 12407, NULL, NULL, 5, NULL, NULL),
(26, 'mrrobot', 'p2.jpg', 'image/jpeg', 172137, NULL, NULL, 5, NULL, NULL),
(30, 'u editu', NULL, NULL, NULL, NULL, 18, NULL, 13, NULL),
(31, 'Une jom kryetari ktuee', 'onlinelogomaker-042516-2404.png', 'image/png', 65965, NULL, 18, NULL, 13, NULL),
(32, 'aaaaaaaaaaaaaaaaaaaa', NULL, NULL, NULL, NULL, NULL, 5, NULL, 2),
(33, 'Detyra Awet!', 'New Text Document.txt', 'text/plain', 246, NULL, NULL, 5, NULL, NULL);

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
(1, 'ArbÃ«r', 'Mulla', 'ArberM', 'AmJyr.sjVp4IM', 1234567891, 'F', NULL, NULL),
(5, 'qqq', 'qqq', 'qqq', 'AmxrkS7Psd752', 123131312, 'M', NULL, NULL),
(6, 'Edmond', 'edmond', 'edmond', 'AmFpF8acnExWA', 1231313, 'M', NULL, NULL),
(7, 'Ragip', 'Topalli', 'qweqe', 'AmHSDLB.wSSKM', 21323, 'M', NULL, NULL),
(8, 'maus', 'maus', 'maus', 'AmTsVFaiIPk8E', 54645, 'F', NULL, NULL),
(9, 'iii', 'iii', 'iii', 'AmkPQSUGeWfd.', 123213, 'M', NULL, NULL),
(10, 'yyy', 'yyy', 'yyy', 'AmpBUUNCqxcAI', 234, 'M', NULL, NULL);

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
(16, 1, 'Illi', 'olla', 'abc', 'AmFqZUcTz9zXM', 2313213, 'M', NULL, NULL, 5),
(17, 0, 'asdsaf', 'hasaaaa', 'ddd', 'Amf.OTVl5qBjo', 1234123, 'M', NULL, 14, 5),
(18, 1, 'ccc', 'ccc', 'ccc', 'AmmT6iVP.QVpQ', 12321321, 'M', NULL, NULL, 5),
(19, 0, 'aaa', 'aaa', 'aaa', 'aaa', 123456789, 'M', NULL, NULL, 5),
(20, 1, 'eee', 'eee', 'eee', 'eee', 123456987, 'F', NULL, NULL, 5),
(22, 1, 'Shkelzen', 'askmf', 'xeni', 'Am6zh3XN6xSpo', 2147483647, 'M', NULL, NULL, NULL),
(23, 1, 'www', 'www', 'www', 'Ammj5t1kypzc2', 1232131, 'M', NULL, NULL, NULL),
(24, 1, 'Rilind', 'Fetoshi', 'lindi', 'AmVpHVK/vXJeE', 123123, 'M', NULL, NULL, NULL);

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
(1, '2014/2015', NULL);

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `drejtimi`
--
ALTER TABLE `drejtimi`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
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
-- AUTO_INCREMENT for table `foto`
--
ALTER TABLE `foto`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `grupi`
--
ALTER TABLE `grupi`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `isfollowing`
--
ALTER TABLE `isfollowing`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `lendet`
--
ALTER TABLE `lendet`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `postimi`
--
ALTER TABLE `postimi`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `profesori`
--
ALTER TABLE `profesori`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `viti_studimit`
--
ALTER TABLE `viti_studimit`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
-- Constraints for table `viti_studimit`
--
ALTER TABLE `viti_studimit`
  ADD CONSTRAINT `viti_studimit_ibfk_1` FOREIGN KEY (`fk_Drejtimit`) REFERENCES `drejtimi` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
