-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2017 at 11:18 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beautysalon`
--
CREATE DATABASE IF NOT EXISTS `beautysalon` DEFAULT CHARACTER SET utf8 COLLATE utf8_slovenian_ci;
USE `beautysalon`;

-- --------------------------------------------------------

--
-- Table structure for table `anketa`
--

CREATE TABLE `anketa` (
  `id` int(11) NOT NULL,
  `vrijednost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `anketa`
--

INSERT INTO `anketa` (`id`, `vrijednost`) VALUES
(332, 2),
(333, 3),
(334, 2),
(335, 2),
(336, 3),
(337, 3),
(338, 4),
(339, 4),
(340, 4),
(341, 2),
(342, 3),
(343, 1),
(344, 2),
(345, 4),
(346, 3),
(347, 3),
(348, 4),
(349, 1),
(350, 3),
(351, 1),
(352, 2),
(353, 4),
(354, 3),
(355, 1),
(356, 1),
(357, 4),
(358, 2),
(359, 4);

-- --------------------------------------------------------

--
-- Table structure for table `fusluge`
--

CREATE TABLE `fusluge` (
  `id` int(11) NOT NULL,
  `nazivusluge` varchar(200) COLLATE utf8_slovenian_ci NOT NULL,
  `cijena` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `fusluge`
--

INSERT INTO `fusluge` (`id`, `nazivusluge`, `cijena`) VALUES
(2, 'Ampula', 5),
(3, 'Farbanje', 10),
(4, 'Kovrčanje kose peglom ili figarom', 5),
(5, 'Skidanje boje (depigmentacija )', 30),
(7, 'Šišanje dječje', 7),
(10, 'Površinski pramenovi', 35),
(11, 'Svečana frizura', 20);

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `id` int(11) NOT NULL,
  `username` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id`, `username`, `password`) VALUES
(0, 'admin', 'wtspirala3'),
(1, 'admin1', 'wtspirala4');

-- --------------------------------------------------------

--
-- Table structure for table `kusluge`
--

CREATE TABLE `kusluge` (
  `id` int(11) NOT NULL,
  `nazivusluge` varchar(200) COLLATE utf8_slovenian_ci NOT NULL,
  `cijena` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `kusluge`
--

INSERT INTO `kusluge` (`id`, `nazivusluge`, `cijena`) VALUES
(1, 'Čupanje obrva', 5),
(2, 'Farbanje obrva', 10),
(3, 'Collagen tretman lica', 15),
(5, 'Spa manikir', 30),
(6, 'Nadogradnja noktiju', 25),
(8, 'Klasični pedikir', 25),
(9, 'Spa pedikir', 35),
(10, 'Šminkanje za svečane prilike', 35),
(11, 'Nadogradnja trepavica', 20),
(12, 'Nadogradnja pojedinačnih trepavica', 35),
(13, 'Nadogradnja noktiju plus Šminkanje', 50),
(14, 'Korekcija noktiju', 10),
(16, 'Nadogradnja noktiju + Šminkanje', 50);

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`) VALUES
(72, 'zerry_96@hotmail.com'),
(73, 'lady_idda@hotmail.com'),
(74, 'zdragnic@gmail.com'),
(75, 'miki@gmail.com'),
(77, 'zdragnic@gmail.com'),
(78, 'aida.dragnic@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `poruka`
--

CREATE TABLE `poruka` (
  `id` int(11) NOT NULL,
  `imeprezime` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `poruka` text COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `poruka`
--

INSERT INTO `poruka` (`id`, `imeprezime`, `email`, `poruka`) VALUES
(21, 'Zerina Dragnic', 'zdragnic@gmail.com', 'Zerinaa'),
(24, ' pppaa', 'zdragnic@gmail.com', 'zerina'),
(25, ' Selsebil', 'sel@gmail.com', 'hello '),
(27, 'Zerina Dragnic', 'zdragnic@gmail.com', 'Porukaporuka'),
(29, 'Zerina Dragnic', 'zdragnic@gmail.com', 'Zerina zerina.');

-- --------------------------------------------------------

--
-- Table structure for table `uslugedetalji`
--

CREATE TABLE `uslugedetalji` (
  `nazivusluge` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `opis` text COLLATE utf8_slovenian_ci NOT NULL,
  `autor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `uslugedetalji`
--

INSERT INTO `uslugedetalji` (`nazivusluge`, `opis`, `autor`) VALUES
('Collagen tretman lica', 'Ovo wellness iskustvo\r\nnamijenjeno djevojkama\r\npored nježnog\r\nčišćenja lica također\r\nuključuje i njegujuću\r\nmasku za lice. Smiruju-\r\nća masaža lica upotpunjuje\r\novaj tretman lica.\r\n', 1),
('Čupanje obrva', 'Ovo je defaultni opis usluge. Stranica je u izradi. Pravi opisi naknadno ce biti dodani.', 1),
('Farbanje obrva', 'Ovo je defaultni opis usluge. Stranica je u izradi. Pravi opisi naknadno ce biti dodani.', 0),
('Klasični pedikir', 'Ovo je defaultni opis usluge. Stranica je u izradi. Pravi opisi naknadno ce biti dodani.', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anketa`
--
ALTER TABLE `anketa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fusluge`
--
ALTER TABLE `fusluge`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nazivusluge` (`nazivusluge`);

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kusluge`
--
ALTER TABLE `kusluge`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nazivusluge` (`nazivusluge`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `poruka`
--
ALTER TABLE `poruka`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uslugedetalji`
--
ALTER TABLE `uslugedetalji`
  ADD PRIMARY KEY (`nazivusluge`) USING BTREE,
  ADD KEY `autor` (`autor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anketa`
--
ALTER TABLE `anketa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=360;
--
-- AUTO_INCREMENT for table `fusluge`
--
ALTER TABLE `fusluge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `kusluge`
--
ALTER TABLE `kusluge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT for table `poruka`
--
ALTER TABLE `poruka`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `uslugedetalji`
--
ALTER TABLE `uslugedetalji`
  ADD CONSTRAINT `uslugedetalji_ibfk_1` FOREIGN KEY (`nazivusluge`) REFERENCES `kusluge` (`nazivusluge`),
  ADD CONSTRAINT `uslugedetalji_ibfk_2` FOREIGN KEY (`autor`) REFERENCES `korisnici` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
