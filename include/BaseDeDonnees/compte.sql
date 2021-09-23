-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : jeu. 23 sep. 2021 à 18:40
-- Version du serveur :  5.7.30
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données : `testStage`
--

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE `compte` (
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `numero_etudiant` varchar(255) NOT NULL,
  `statut` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `compte`
--

INSERT INTO `compte` (`nom`, `prenom`, `email`, `password`, `numero_etudiant`, `statut`) VALUES
('test', 'test', 'iliasse@gmail.com', '$2y$12$fRrDeJYi2nn05sHbnSO30OEPU9ink7vF8azc4aqqEg5jzs5tcIqvW', '07070707DF', 1),
('haina', 'iliasse', 'test@gmail.com', '$2y$12$UoGylGGKV6PaCVfElN93ie6J31l4xqH7BaU20JtQT5n4XwLsCQBy6', '07203462AZ', 0),
('jean', 'paul', 'jean@gmail.com', '$2y$12$YTD5iSO5CXMO6r6P.TUkVup5aBpKgAmm7RU.4t9XFvmYzb69RpseW', '495825478GH', 0),
('zardi', 'Sofiane', 'sofian@gmail.com', '$2y$12$RXMbJ9LXc7UwJFgjhq2gyu.eqMy7iUYXNV1SSBXFO4Cm90eZVJOGy', '1212121212DZ', 0),
('admin', 'admin', 'admin@gmail.com', '$2y$12$vxSD9hWwhkIMFdKtMvPCJ..6rrH0JJrqi0efJRYRfUvNcMm3B5fm.', '010101010AZ', 0),
('louto', 'Adam', 'adam@gmail.com', '$2y$12$NEf/9AZk4SSELgBSKpnLKumEsCrrrMQxAlm0k49YHz4I3/aQ70pEu', '94959375ID', 0);
