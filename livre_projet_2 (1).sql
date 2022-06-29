-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 29 juin 2022 à 21:49
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
-- Base de données : `livre_projet_2`
--

-- --------------------------------------------------------

--
-- Structure de la table `adherents`
--

CREATE TABLE `adherents` (
  `id_client` int(5) NOT NULL,
  `nom_client` varchar(20) NOT NULL,
  `prenom_client` varchar(20) NOT NULL,
  `adresse_client` varchar(50) NOT NULL,
  `code_postal` int(5) NOT NULL,
  `ville` varchar(20) NOT NULL,
  `mdp` varchar(11) NOT NULL,
  `admin` int(1) NOT NULL,
  `demande_delete` int(1) NOT NULL,
  `age` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `adherents`
--

INSERT INTO `adherents` (`id_client`, `nom_client`, `prenom_client`, `adresse_client`, `code_postal`, `ville`, `mdp`, `admin`, `demande_delete`, `age`) VALUES
(1, 'Seguin', 'Benoît', '', 0, '', 'admin', 0, 0, 18),
(2, 'Querry', 'Martin', '40, rue des Chaligny', 58000, 'NEVERS', 'admin', 0, 1, 18),
(3, 'Delhay', 'Théo', '1 rue des tilleuls', 59590, 'Raismes', 'admin', 1, 0, 18),
(10, 'Delhayee', 'Théo', '1 rue des tilleuls', 33170, 'Raismes', 'admin', 0, 0, 18),
(12, 'Admin', 'Admin', '12 rue des rue', 59150, 'Aucne', 'admin', 1, 0, 18),
(16, 'a', 'a', '3 rue des potiers', 59590, 'test', 'a', 1, 0, 18),
(19, 'Lou', 'Baigeaux', '8 rue du maréchal', 59881, 'Saint-Saulv', 'lou', 1, 0, 18),
(24, 'test', 'test', '12 rue des rue', 59150, 'aaaa', 'test', 0, 1, 18),
(26, 'Louis', 'Floquet', '37, avenue Ferdinand de Lesseps', 59300, 'Valenciennes', 'Louis', 0, 0, 19);

-- --------------------------------------------------------

--
-- Structure de la table `emprunt`
--

CREATE TABLE `emprunt` (
  `id_emprunt` int(5) NOT NULL,
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  `id_client` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `demande_emprunt` int(11) NOT NULL COMMENT '0 demande en cours ; 1 demande accepté'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `emprunt`
--

INSERT INTO `emprunt` (`id_emprunt`, `date_debut`, `date_fin`, `id_client`, `id`, `demande_emprunt`) VALUES
(13, '2022-04-05', '2022-05-06', 24, 12, 0);

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

CREATE TABLE `livre` (
  `id` int(11) NOT NULL,
  `titre` varchar(45) NOT NULL,
  `auteur` varchar(45) NOT NULL,
  `categorie` varchar(45) NOT NULL,
  `nb_exemplaires` int(11) NOT NULL,
  `id_adherent_livre` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `livre`
--

INSERT INTO `livre` (`id`, `titre`, `auteur`, `categorie`, `nb_exemplaires`, `id_adherent_livre`) VALUES
(2, 'Harry Potter à l école des sorciers, tome 1', 'JK Rowling', 'Fantaisie Littéraire', 1, 0),
(3, 'Harry Potter et la Chambre des Secrets, tome ', 'JK Rowling', 'Fantaisie Littéraire', 1, 0),
(4, 'Harry Potter et le Prisonnier d Azkaban, tome', 'JK Rowling', 'Fantaisie Littéraire', 1, 0),
(6, 'Alice au pays des merveilles', 'Lewis Caroll', 'Fantaisie Littéraire', 1, 0),
(7, 'Da Vinci Code', 'Dan Brown', 'Policier', 1, 0),
(8, 'L alchimiste', 'Paulo Coelho', 'Roman', 1, 0),
(9, 'Vingt mille lieues sous les mers', 'Jules Verne', 'Science-fiction', 1, 0),
(10, 'Twilight: Fascination, tome 1', 'Stephenie Meyer ', 'Fantaisie Littéraire', 1, 0),
(11, 'Twilight: Tentation, tome 2', 'Stephenie Meyer ', 'Fantaisie Littéraire', 1, 0),
(12, 'L �le myst�rieuse', 'Jules Verne', 'Science-fiction', 0, 24),
(15, 'Da Vincmmmmmm', 'Jules Verneeee', 'Roman', 1, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `adherents`
--
ALTER TABLE `adherents`
  ADD PRIMARY KEY (`id_client`);

--
-- Index pour la table `emprunt`
--
ALTER TABLE `emprunt`
  ADD PRIMARY KEY (`id_emprunt`),
  ADD KEY `id_client` (`id_client`),
  ADD KEY `id` (`id`);

--
-- Index pour la table `livre`
--
ALTER TABLE `livre`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `adherents`
--
ALTER TABLE `adherents`
  MODIFY `id_client` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `emprunt`
--
ALTER TABLE `emprunt`
  MODIFY `id_emprunt` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `livre`
--
ALTER TABLE `livre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
