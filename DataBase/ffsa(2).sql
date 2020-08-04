-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mar. 04 août 2020 à 14:17
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
-- Structure de la table `0108asap_categorycompetition`
--

CREATE TABLE `0108asap_categorycompetition` (
  `id` int(11) NOT NULL,
  `CategoryCompetition` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `0108asap_categorycompetition`
--

INSERT INTO `0108asap_categorycompetition` (`id`, `CategoryCompetition`) VALUES
(1, 'Rallye'),
(2, 'Rallye tout terrain'),
(3, 'Rallye cross'),
(4, 'Slalom'),
(5, 'Course de cote');

-- --------------------------------------------------------

--
-- Structure de la table `0108asap_competiton`
--

CREATE TABLE `0108asap_competiton` (
  `id` int(11) NOT NULL,
  `id_0108asap_cars` int(11) NOT NULL,
  `id_0108asap_categorycompetition` int(11) NOT NULL,
  `id_0108asap_functionsummary` int(11) NOT NULL,
  `id_0108asap_membres` int(11) NOT NULL,
  `id_0108asap_sportsevents` int(11) NOT NULL,
  `id_0108asap_typeofcompetition` int(11) NOT NULL,
  `Open` varchar(1) NOT NULL DEFAULT '0',
  `Close` varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Déchargement des données de la table `0108asap_competiton`
--

INSERT INTO `0108asap_competiton` (`id`, `id_0108asap_cars`, `id_0108asap_categorycompetition`, `id_0108asap_functionsummary`, `id_0108asap_membres`, `id_0108asap_sportsevents`, `id_0108asap_typeofcompetition`, `Open`, `Close`) VALUES
(1, 3, 1, 6, 1, 2, 3, '0', '1');

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
(1, '010101', 1, 155, 1),
(6, '249498', 1, 2, 0),
(7, '249498', 16, 17, 1);

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
(1, 'Jonard', 'Gaetan', 'gaetan.jonard@outlook.fr', 0x243279243130247a4d307a6b4a66705a6a492f4d6a7361644d726e414f587a2e44666755314d6e386f623730505a4f423049536d5878723934584c71, 'NqYgwRC1fU3ACpO1593694866NqYgwRC1fU3ACpO', 'true', 'APT 31 26 parc des clairs Logis', '80290', 'Poix', '0108', 'picardie'),
(16, 'Jonardg', 'ADrftg', 'aa@aa.aa', 0x243279243130244148514536506b6a2e4c634d793941784f6178716d2e35764370557048486b59364351775836616c524b63375271424d504c535447, 'UOxX4mYiNvIcGj81596478711UOxX4mYiNvIcGj8', 'true', 'APT 31 26 parc des clairs Logis', '2320', 'Prémontré    ', '0000    ', 'Rien');

-- --------------------------------------------------------

--
-- Structure de la table `0108asap_rally`
--

CREATE TABLE `0108asap_rally` (
  `id` int(11) NOT NULL,
  `NumberOfSteps` int(10) NOT NULL,
  `NumberOfEs` int(10) NOT NULL,
  `NumberOfCompetitonDays` int(10) NOT NULL,
  `RecognitionDates` date DEFAULT NULL,
  `RecognitionDates2` date DEFAULT NULL,
  `RecognitionDates3` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Structure de la table `0108asap_sportsevents`
--

CREATE TABLE `0108asap_sportsevents` (
  `id` int(11) NOT NULL,
  `NameOfTheTest` varchar(5) NOT NULL,
  `DateOfTeste` date NOT NULL,
  `NumberDays` int(11) NOT NULL,
  `TypeOfAccommodation` varchar(250) NOT NULL,
  `Observation` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `0108asap_sportsevents`
--

INSERT INTO `0108asap_sportsevents` (`id`, `NameOfTheTest`, `DateOfTeste`, `NumberDays`, `TypeOfAccommodation`, `Observation`) VALUES
(2, 'rally', '2020-08-18', 2, 'eere', 'er');

-- --------------------------------------------------------

--
-- Structure de la table `0108asap_typeofcompetition`
--

CREATE TABLE `0108asap_typeofcompetition` (
  `id` int(11) NOT NULL,
  `TypeOfCompetiton` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Déchargement des données de la table `0108asap_typeofcompetition`
--

INSERT INTO `0108asap_typeofcompetition` (`id`, `TypeOfCompetiton`) VALUES
(1, 'Championnat Régional'),
(2, 'Championnat National'),
(3, 'Championnat européen '),
(4, 'Championnat international\r\n');

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
-- Index pour la table `0108asap_categorycompetition`
--
ALTER TABLE `0108asap_categorycompetition`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `0108asap_competiton`
--
ALTER TABLE `0108asap_competiton`
  ADD PRIMARY KEY (`id`),
  ADD KEY `0108asap_categorycompetition` (`id_0108asap_categorycompetition`),
  ADD KEY `id_0108asap_cars` (`id_0108asap_cars`),
  ADD KEY `id_0108asap_functionsummary` (`id_0108asap_functionsummary`),
  ADD KEY `id_0108asap_membres` (`id_0108asap_membres`),
  ADD KEY `	id_0108asap_sportsevents` (`id_0108asap_sportsevents`),
  ADD KEY `id_0108asap_typeofcompetition` (`id_0108asap_typeofcompetition`);

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
-- Index pour la table `0108asap_rally`
--
ALTER TABLE `0108asap_rally`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `0108asap_sportsevents`
--
ALTER TABLE `0108asap_sportsevents`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT pour la table `0108asap_categorycompetition`
--
ALTER TABLE `0108asap_categorycompetition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `0108asap_competiton`
--
ALTER TABLE `0108asap_competiton`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `0108asap_functions`
--
ALTER TABLE `0108asap_functions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT pour la table `0108asap_functionsummary`
--
ALTER TABLE `0108asap_functionsummary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `0108asap_membres`
--
ALTER TABLE `0108asap_membres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `0108asap_rally`
--
ALTER TABLE `0108asap_rally`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `0108asap_sportsevents`
--
ALTER TABLE `0108asap_sportsevents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `0108asap_typeofcompetition`
--
ALTER TABLE `0108asap_typeofcompetition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `0108asap_cars`
--
ALTER TABLE `0108asap_cars`
  ADD CONSTRAINT `0108ASAP_Cars_0108ASAP_membres_FK` FOREIGN KEY (`id_0108ASAP_membres`) REFERENCES `0108asap_membres` (`id`);

--
-- Contraintes pour la table `0108asap_competiton`
--
ALTER TABLE `0108asap_competiton`
  ADD CONSTRAINT `	id_0108asap_sportsevents` FOREIGN KEY (`id_0108asap_sportsevents`) REFERENCES `0108asap_sportsevents` (`id`),
  ADD CONSTRAINT `0108asap_categorycompetition` FOREIGN KEY (`id_0108asap_categorycompetition`) REFERENCES `0108asap_categorycompetition` (`id`),
  ADD CONSTRAINT `id_0108asap_cars` FOREIGN KEY (`id_0108asap_cars`) REFERENCES `0108asap_cars` (`id`),
  ADD CONSTRAINT `id_0108asap_functionsummary` FOREIGN KEY (`id_0108asap_functionsummary`) REFERENCES `0108asap_functionsummary` (`id`),
  ADD CONSTRAINT `id_0108asap_membres` FOREIGN KEY (`id_0108asap_membres`) REFERENCES `0108asap_membres` (`id`),
  ADD CONSTRAINT `id_0108asap_typeofcompetition` FOREIGN KEY (`id_0108asap_typeofcompetition`) REFERENCES `0108asap_typeofcompetition` (`id`);

--
-- Contraintes pour la table `0108asap_functions`
--
ALTER TABLE `0108asap_functions`
  ADD CONSTRAINT `0108ASAP_Functions_0108ASAP_membres_FK` FOREIGN KEY (`id_0108ASAP_membres`) REFERENCES `0108asap_membres` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
