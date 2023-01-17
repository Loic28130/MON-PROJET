-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 03 déc. 2022 à 15:58
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `monprojet`
--

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `ID_clients` int(11) NOT NULL,
  `nom` varchar(256) NOT NULL,
  `prenom` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `mot_de_passe` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`ID_clients`, `nom`, `prenom`, `email`, `mot_de_passe`) VALUES
(8, 'gogo', 'juju', 'juju@gmail.com', '123'),
(9, 'loic', 'giraudet', 'lolo@gmail.com', '789'),
(10, 'loic', 'gogo', 'gogo@gmail.com', '456'),
(18, 'po', 'lo', 'lolo@gmail.com', '789'),
(19, 'bubu', 'momo', 'cc@gmail.com', '123'),
(20, 'baba', 'lolo', 'baba@gmail.com', '123'),
(21, 'giraudet', 'loic', 'lolo@gmail.com', '789');

-- --------------------------------------------------------

--
-- Structure de la table `collaborateurs`
--

CREATE TABLE `collaborateurs` (
  `ID_collaborateurs` int(11) NOT NULL,
  `nom` varchar(256) NOT NULL,
  `prenom` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `mot_de_passe` varchar(256) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `collaborateurs`
--

INSERT INTO `collaborateurs` (`ID_collaborateurs`, `nom`, `prenom`, `email`, `mot_de_passe`, `admin`) VALUES
(3, 'lo', 'bo', 'bo@gmail.com', '159', 0);

-- --------------------------------------------------------

--
-- Structure de la table `paiement`
--

CREATE TABLE `paiement` (
  `ID_paiment` int(11) NOT NULL,
  `date` date NOT NULL,
  `prix` int(11) NOT NULL,
  `ID_RDV_chauffeur` int(11) DEFAULT NULL,
  `ID_RDV_livreur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `rdv_chauffeur`
--

CREATE TABLE `rdv_chauffeur` (
  `ID_RDV_chauffeur` int(11) NOT NULL,
  adresse_de_depart varchar(50) NOT NULL,
  adresse_arrivee varchar(50) NOT NULL,
  `date_de_depart` date NOT NULL,
  `heure_de_depart` time(6) NOT NULL,
  `ID_clients` int(11) NOT NULL,
  `ID_collaborateurs` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `rdv_chauffeur`
--

INSERT INTO `rdv_chauffeur` (`ID_RDV_chauffeur`, adresse_de_depart, adresse_arrivee, `date_de_depart`, `heure_de_depart`, `ID_clients`, `ID_collaborateurs`) VALUES
(6, 'b', 'a', '2022-12-04', '15:35:00.000000', 19, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `rdv_livreur`
--

CREATE TABLE `rdv_livreur` (
  `ID_RDV_livrreur` int(11) NOT NULL,
  `adresse_de_recuperation` varchar(256) NOT NULL,
  `adresse_de_livraison` varchar(256) NOT NULL,
  `date_de_livraison` date NOT NULL,
  `ID_clients` int(11) NOT NULL,
  `ID_collaborateurs` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`ID_clients`);

--
-- Index pour la table `collaborateurs`
--
ALTER TABLE `collaborateurs`
  ADD PRIMARY KEY (`ID_collaborateurs`);

--
-- Index pour la table `paiement`
--
ALTER TABLE `paiement`
  ADD PRIMARY KEY (`ID_paiment`),
  ADD KEY `ID_RDV_chauffeur` (`ID_RDV_chauffeur`),
  ADD KEY `ID_RDV_livreur` (`ID_RDV_livreur`);

--
-- Index pour la table `rdv_chauffeur`
--
ALTER TABLE `rdv_chauffeur`
  ADD PRIMARY KEY (`ID_RDV_chauffeur`),
  ADD KEY `ID_clients` (`ID_clients`),
  ADD KEY `ID_collaborateurs` (`ID_collaborateurs`);

--
-- Index pour la table `rdv_livreur`
--
ALTER TABLE `rdv_livreur`
  ADD PRIMARY KEY (`ID_RDV_livrreur`),
  ADD KEY `ID_clients` (`ID_clients`) USING BTREE,
  ADD KEY `ID_collaborateurs` (`ID_collaborateurs`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `ID_clients` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `collaborateurs`
--
ALTER TABLE `collaborateurs`
  MODIFY `ID_collaborateurs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `paiement`
--
ALTER TABLE `paiement`
  MODIFY `ID_paiment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `rdv_chauffeur`
--
ALTER TABLE `rdv_chauffeur`
  MODIFY `ID_RDV_chauffeur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `rdv_livreur`
--
ALTER TABLE `rdv_livreur`
  MODIFY `ID_RDV_livrreur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `paiement`
--
ALTER TABLE `paiement`
  ADD CONSTRAINT `paiement_ibfk_1` FOREIGN KEY (`ID_RDV_chauffeur`) REFERENCES `rdv_chauffeur` (`ID_RDV_chauffeur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `paiement_ibfk_2` FOREIGN KEY (`ID_RDV_livreur`) REFERENCES `rdv_livreur` (`ID_RDV_livrreur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `rdv_chauffeur`
--
ALTER TABLE `rdv_chauffeur`
  ADD CONSTRAINT `fk_RDV_chauffeur_collaborateurs` FOREIGN KEY (`ID_collaborateurs`) REFERENCES `collaborateurs` (`ID_collaborateurs`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `fk_client_RDV_chauffeur` FOREIGN KEY (`ID_clients`) REFERENCES `clients` (`ID_clients`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `rdv_livreur`
--
ALTER TABLE `rdv_livreur`
  ADD CONSTRAINT `fk_RDV_livreur_collaborateur` FOREIGN KEY (`ID_collaborateurs`) REFERENCES `collaborateurs` (`ID_collaborateurs`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `rdv_livreur_ibfk_1` FOREIGN KEY (`ID_clients`) REFERENCES `clients` (`ID_clients`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
