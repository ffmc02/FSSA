-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 03 août 2020 à 08:15
-- Version du serveur :  5.7.24
-- Version de PHP : 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ffsa`
--
CREATE DATABASE IF NOT EXISTS `ffsa` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `ffsa`;

-- --------------------------------------------------------

--
-- Structure de la table `0108asap_cars`
--

CREATE TABLE `0108asap_cars` (
  `id` int(11) NOT NULL,
  `NomberOfOccupant` int(11) NOT NULL,
  `Mark` varchar(50) NOT NULL,
  `Model` varchar(50) NOT NULL,
  `Category` varchar(50) NOT NULL,
  `Classroom` varchar(50) NOT NULL,
  `id_0108ASAP_membres` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `0108asap_cars`
--

INSERT INTO `0108asap_cars` (`id`, `NomberOfOccupant`, `Mark`, `Model`, `Category`, `Classroom`, `id_0108ASAP_membres`) VALUES
(1, 2, 'Peugeot', '205', 'f', '2000', 1),
(2, 1, 'renault', 'super5 turbo2', 'F', '2000', 1),
(3, 1, 'teste', 'ty', 'teste', 'test', 1);

-- --------------------------------------------------------

--
-- Structure de la table `0108asap_functions`
--

CREATE TABLE `0108asap_functions` (
  `id` int(11) NOT NULL,
  `TypeOfLicence` varchar(250) NOT NULL,
  `id_0108ASAP_membres` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `0108asap_functions`
--

INSERT INTO `0108asap_functions` (`id`, `TypeOfLicence`, `id_0108ASAP_membres`) VALUES
(1, 'Commissaire C', NULL),
(2, 'Commissaire B', NULL),
(3, 'Commissaire A', NULL),
(4, 'Chef de poste', NULL),
(5, 'Chrono', NULL),
(6, 'Bénévole', NULL),
(7, 'Directeur d\'ES', NULL),
(8, 'Directeur adjoint d\'ES', NULL),
(9, 'Directeur de Cources \r\n', NULL),
(10, 'Directeur adjoint de cource \r\n', NULL),
(11, 'relation concurant ', NULL),
(12, 'Responsable Commissaire ', NULL),
(13, 'Responsable Officiel ', NULL),
(14, 'Président rallye', NULL),
(15, 'Pilote ', NULL),
(16, 'Copîlote', NULL),
(17, 'Commissaire technique ', NULL),
(18, 'Juge de fait ', NULL),
(155, 'Administrateur site', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `0108asap_functionsummary`
--

CREATE TABLE `0108asap_functionsummary` (
  `id` int(11) NOT NULL,
  `LicenceNumber` varchar(10) DEFAULT NULL,
  `id_0108asap_member` int(11) NOT NULL,
  `id_0108asap_function` int(11) NOT NULL,
  `LicencePrimary` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `0108asap_functionsummary`
--

INSERT INTO `0108asap_functionsummary` (`id`, `LicenceNumber`, `id_0108asap_member`, `id_0108asap_function`, `LicencePrimary`) VALUES
(1, '249498', 1, 155, 1),
(3, '249498', 1, 17, 0);

-- --------------------------------------------------------

--
-- Structure de la table `0108asap_membres`
--

CREATE TABLE `0108asap_membres` (
  `id` int(11) NOT NULL,
  `Name` varchar(250) DEFAULT NULL,
  `Firstname` varchar(250) DEFAULT NULL,
  `Email` varchar(250) DEFAULT NULL,
  `Password` blob,
  `Cle` varchar(100) DEFAULT NULL,
  `Actif` varchar(10) DEFAULT 'false',
  `Address` varchar(250) DEFAULT NULL,
  `ZipCode` varchar(5) DEFAULT NULL,
  `City` varchar(250) DEFAULT NULL,
  `AsaCode` varchar(10) DEFAULT NULL,
  `AsaName` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `0108asap_membres`
--

INSERT INTO `0108asap_membres` (`id`, `Name`, `Firstname`, `Email`, `Password`, `Cle`, `Actif`, `Address`, `ZipCode`, `City`, `AsaCode`, `AsaName`) VALUES
(1, 'Jonard', 'Gaetan', 'gaetan.jonard@outlook.fr', 0x243279243130247a4d307a6b4a66705a6a492f4d6a7361644d726e414f587a2e44666755314d6e386f623730505a4f423049536d5878723934584c71, 'NqYgwRC1fU3ACpO1593694866NqYgwRC1fU3ACpO', 'true', 'APT 31 26 parc des clairs Logis', '80290', 'Poix', '0108', 'picardie');

-- --------------------------------------------------------

--
-- Structure de la table `0108asap_sportsevents`
--

CREATE TABLE `0108asap_sportsevents` (
  `id` int(11) NOT NULL,
  `NameOfTheTest` varchar(5) NOT NULL,
  `DateOfTeste` date NOT NULL,
  `TypeOfAccommodation` varchar(250) NOT NULL,
  `Observation` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `0108asap_sportsevents`
--

INSERT INTO `0108asap_sportsevents` (`id`, `NameOfTheTest`, `DateOfTeste`, `TypeOfAccommodation`, `Observation`) VALUES
(1, 'teste', '2020-07-16', 'teste teste', 'terersrezqr efgerfqerqerqerqerqerqerqe');

-- --------------------------------------------------------

--
-- Structure de la table `0108asap_test`
--

CREATE TABLE `0108asap_test` (
  `id` int(11) NOT NULL,
  `id_0108ASAP_membres` int(11) DEFAULT NULL,
  `id_0108ASAP_TypeOfCompetition` int(11) NOT NULL,
  `id_0108ASAP_Cars` int(11) DEFAULT NULL,
  `id_0108ASAP_SportsEvents` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `0108asap_typeofcompetition`
--

CREATE TABLE `0108asap_typeofcompetition` (
  `id` int(11) NOT NULL,
  `EventCategory` varchar(50) NOT NULL,
  `Area` varchar(50) NOT NULL,
  `CategoryOfTheCompetition` varchar(50) NOT NULL,
  `MaximunNumberOfConcurrent` varchar(50) NOT NULL,
  `MinimumNumberOfCommissioners` varchar(50) NOT NULL,
  `MinimumNumberOfOfficials` varchar(50) NOT NULL,
  `MinimunNumbersOfVolunteers` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `0108asap_cars`
--
ALTER TABLE `0108asap_cars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `0108ASAP_Cars_0108ASAP_membres_FK` (`id_0108ASAP_membres`);

--
-- Index pour la table `0108asap_functions`
--
ALTER TABLE `0108asap_functions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `0108ASAP_Functions_0108ASAP_membres_FK` (`id_0108ASAP_membres`);

--
-- Index pour la table `0108asap_functionsummary`
--
ALTER TABLE `0108asap_functionsummary`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `0108asap_membres`
--
ALTER TABLE `0108asap_membres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `0108asap_sportsevents`
--
ALTER TABLE `0108asap_sportsevents`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `0108asap_test`
--
ALTER TABLE `0108asap_test`
  ADD PRIMARY KEY (`id`),
  ADD KEY `0108ASAP_Test_0108ASAP_membres_FK` (`id_0108ASAP_membres`),
  ADD KEY `0108ASAP_Test_0108ASAP_TypeOfCompetition0_FK` (`id_0108ASAP_TypeOfCompetition`),
  ADD KEY `0108ASAP_Test_0108ASAP_Cars1_FK` (`id_0108ASAP_Cars`),
  ADD KEY `0108ASAP_Test_0108ASAP_SportsEvents2_FK` (`id_0108ASAP_SportsEvents`);

--
-- Index pour la table `0108asap_typeofcompetition`
--
ALTER TABLE `0108asap_typeofcompetition`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `0108asap_cars`
--
ALTER TABLE `0108asap_cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `0108asap_functions`
--
ALTER TABLE `0108asap_functions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT pour la table `0108asap_functionsummary`
--
ALTER TABLE `0108asap_functionsummary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `0108asap_membres`
--
ALTER TABLE `0108asap_membres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `0108asap_sportsevents`
--
ALTER TABLE `0108asap_sportsevents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `0108asap_test`
--
ALTER TABLE `0108asap_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `0108asap_typeofcompetition`
--
ALTER TABLE `0108asap_typeofcompetition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `0108asap_cars`
--
ALTER TABLE `0108asap_cars`
  ADD CONSTRAINT `0108ASAP_Cars_0108ASAP_membres_FK` FOREIGN KEY (`id_0108ASAP_membres`) REFERENCES `0108asap_membres` (`id`);

--
-- Contraintes pour la table `0108asap_functions`
--
ALTER TABLE `0108asap_functions`
  ADD CONSTRAINT `0108ASAP_Functions_0108ASAP_membres_FK` FOREIGN KEY (`id_0108ASAP_membres`) REFERENCES `0108asap_membres` (`id`);

--
-- Contraintes pour la table `0108asap_test`
--
ALTER TABLE `0108asap_test`
  ADD CONSTRAINT `0108ASAP_Test_0108ASAP_Cars1_FK` FOREIGN KEY (`id_0108ASAP_Cars`) REFERENCES `0108asap_cars` (`id`),
  ADD CONSTRAINT `0108ASAP_Test_0108ASAP_SportsEvents2_FK` FOREIGN KEY (`id_0108ASAP_SportsEvents`) REFERENCES `0108asap_sportsevents` (`id`),
  ADD CONSTRAINT `0108ASAP_Test_0108ASAP_TypeOfCompetition0_FK` FOREIGN KEY (`id_0108ASAP_TypeOfCompetition`) REFERENCES `0108asap_typeofcompetition` (`id`),
  ADD CONSTRAINT `0108ASAP_Test_0108ASAP_membres_FK` FOREIGN KEY (`id_0108ASAP_membres`) REFERENCES `0108asap_membres` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
