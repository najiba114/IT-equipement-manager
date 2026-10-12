-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2026 at 08:20 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestion de materiel`
--

-- --------------------------------------------------------

--
-- Table structure for table `agence`
--

CREATE TABLE `agence` (
  `id agencee` int(11) NOT NULL,
  `nom agence` varchar(50) NOT NULL,
  `emplacement` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

CREATE TABLE `agent` (
  `id agent` int(11) NOT NULL,
  `id agence` int(11) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employé`
--

CREATE TABLE `employé` (
  `id employé` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fonction` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `materiel`
--

CREATE TABLE `materiel` (
  `id materiel` int(11) NOT NULL,
  `type materiel` varchar(50) NOT NULL,
  `constructeur` varchar(50) NOT NULL,
  `modele` varchar(50) NOT NULL,
  `date mise en service` date NOT NULL,
  `id agent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `panne`
--

CREATE TABLE `panne` (
  `id panne` int(11) NOT NULL,
  `date panne` date NOT NULL,
  `description par agent` text DEFAULT NULL,
  `description par technicien` text DEFAULT NULL,
  `id materiel` int(11) NOT NULL,
  `id technicien` int(11) DEFAULT NULL,
  `id responsable` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `responsable technique`
--

CREATE TABLE `responsable technique` (
  `id responsable` int(11) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `réparation`
--

CREATE TABLE `réparation` (
  `id réparation` int(11) NOT NULL,
  `date debut` date NOT NULL,
  `date fin` int(50) NOT NULL,
  `validation` int(2) NOT NULL,
  `id panne` int(11) NOT NULL,
  `id responsable` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `technicien`
--

CREATE TABLE `technicien` (
  `id technicien` int(11) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agence`
--
ALTER TABLE `agence`
  ADD PRIMARY KEY (`id agencee`);

--
-- Indexes for table `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`id agent`),
  ADD KEY `agent_ibfk_1` (`id agence`);

--
-- Indexes for table `employé`
--
ALTER TABLE `employé`
  ADD PRIMARY KEY (`id employé`);

--
-- Indexes for table `materiel`
--
ALTER TABLE `materiel`
  ADD PRIMARY KEY (`id materiel`),
  ADD KEY `id agent` (`id agent`);

--
-- Indexes for table `panne`
--
ALTER TABLE `panne`
  ADD PRIMARY KEY (`id panne`),
  ADD KEY `id materiel` (`id materiel`),
  ADD KEY `id responsable` (`id responsable`),
  ADD KEY `id technicien` (`id technicien`);

--
-- Indexes for table `responsable technique`
--
ALTER TABLE `responsable technique`
  ADD PRIMARY KEY (`id responsable`);

--
-- Indexes for table `réparation`
--
ALTER TABLE `réparation`
  ADD PRIMARY KEY (`id réparation`),
  ADD KEY `id panne` (`id panne`),
  ADD KEY `id responsable` (`id responsable`);

--
-- Indexes for table `technicien`
--
ALTER TABLE `technicien`
  ADD PRIMARY KEY (`id technicien`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employé`
--
ALTER TABLE `employé`
  MODIFY `id employé` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `materiel`
--
ALTER TABLE `materiel`
  MODIFY `id materiel` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `agent`
--
ALTER TABLE `agent`
  ADD CONSTRAINT `agent_ibfk_1` FOREIGN KEY (`id agence`) REFERENCES `agence` (`id agencee`),
  ADD CONSTRAINT `agent_ibfk_2` FOREIGN KEY (`id agent`) REFERENCES `employé` (`id employé`);

--
-- Constraints for table `materiel`
--
ALTER TABLE `materiel`
  ADD CONSTRAINT `materiel_ibfk_1` FOREIGN KEY (`id agent`) REFERENCES `agent` (`id agent`);

--
-- Constraints for table `panne`
--
ALTER TABLE `panne`
  ADD CONSTRAINT `panne_ibfk_1` FOREIGN KEY (`id materiel`) REFERENCES `materiel` (`id materiel`),
  ADD CONSTRAINT `panne_ibfk_2` FOREIGN KEY (`id responsable`) REFERENCES `responsable technique` (`id responsable`),
  ADD CONSTRAINT `panne_ibfk_3` FOREIGN KEY (`id technicien`) REFERENCES `technicien` (`id technicien`);

--
-- Constraints for table `responsable technique`
--
ALTER TABLE `responsable technique`
  ADD CONSTRAINT `responsable technique_ibfk_1` FOREIGN KEY (`id responsable`) REFERENCES `employé` (`id employé`);

--
-- Constraints for table `réparation`
--
ALTER TABLE `réparation`
  ADD CONSTRAINT `réparation_ibfk_1` FOREIGN KEY (`id panne`) REFERENCES `panne` (`id panne`),
  ADD CONSTRAINT `réparation_ibfk_2` FOREIGN KEY (`id responsable`) REFERENCES `responsable technique` (`id responsable`);

--
-- Constraints for table `technicien`
--
ALTER TABLE `technicien`
  ADD CONSTRAINT `technicien_ibfk_1` FOREIGN KEY (`id technicien`) REFERENCES `employé` (`id employé`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
