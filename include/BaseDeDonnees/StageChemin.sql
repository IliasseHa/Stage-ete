-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : jeu. 23 sep. 2021 à 18:50
-- Version du serveur :  5.7.30
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données : `testStage`
--

-- --------------------------------------------------------

--
-- Structure de la table `StageChemin`
--

CREATE TABLE `StageChemin` (
  `chemin` varchar(255) NOT NULL,
  `note` int(5) DEFAULT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `numero_etudiant` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `StageChemin`
--

INSERT INTO `StageChemin` (`chemin`, `note`, `nom`, `prenom`, `numero_etudiant`) VALUES
('../uploads/Mini-rapport_n°6.pdf', NULL, 'haina', 'iliasse', '07203462AZ'),
('../uploads/Mini-rapport_n°1.pdf', NULL, 'zardi', 'Sofiane', '1212121212DZ'),
('../uploads/Attestation_RC_Stage_scolaire_HAINA_ILIASSE.pdf', NULL, 'haina', 'iliasse', '07203462AZ');
