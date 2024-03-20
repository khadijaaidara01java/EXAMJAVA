-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 20 mars 2024 à 15:32
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `jsexam_bd`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

CREATE TABLE `admins` (
  `id_admins` int(11) NOT NULL,
  `nom` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `passwords` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`id_admins`, `nom`, `email`, `passwords`) VALUES
(1, 'hp22', 'hp22@gmail.com', '$2y$10$AM8PjZtvcrYpL/MReimbk.n.Lj4iBdT0t.1HPpPQIbfbX3BCo3O6C'),
(2, 'test22', 'test22@gmail.com', '$2y$10$WZT7/xsx13KVTMNl1curC.L8FRkoOsqvqcEC6lkDew18jitGS0JcS'),
(3, 'modou fall', 'modoufall01@gmail.com', '$2y$10$QVU1v2zUKMy4ie674yOCcOnWFjbJxOympPBOtuKnnShC14ItJTyiS');

-- --------------------------------------------------------

--
-- Structure de la table `options`
--

CREATE TABLE `options` (
  `id_options` int(3) NOT NULL,
  `option1` text NOT NULL,
  `options2` text NOT NULL,
  `options3` text NOT NULL,
  `bonreponse` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

CREATE TABLE `question` (
  `id_question` int(11) NOT NULL,
  `question1` varchar(250) NOT NULL,
  `question2` varchar(250) NOT NULL,
  `question3` varchar(250) NOT NULL,
  `selectQuestion` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `question`
--

INSERT INTO `question` (`id_question`, `question1`, `question2`, `question3`, `selectQuestion`) VALUES
(1, 'le premier president de la république du Sénégal?', 'abdou diouf', 'leopold sedhar senghor', ''),
(2, 'quelle est la capital du senegal', 'thies', 'saint louis', 'question4'),
(3, 'quelle est la capitale du mali?', 'bamako', 'ouagadougou', ''),
(4, 'c\'est quoi planète mars', 'une planète ', 'un mois', 'question2'),
(5, 'read gab bloc', 'red green blue', 'read write execute', 'red green blue'),
(6, 'Que signifie h2o', 'oxygen', 'hydrogene', 'question4'),
(7, 'abcd', '2 voyelle et 3 consonne', 'tous des consonne', 'question1'),
(8, 'abcd', '2 voyelle et 3 consonne', 'tous des consonne', 'question1'),
(9, 'abcd', '2 voyelle et 3 consonne', 'saint louis', 'question2'),
(10, 'quelle est la capitale de la france?', 'berlin', 'londres', 'question3'),
(11, 'quel est l\'animal national de l\'Australie?', 'koala', 'kangourou ', 'question2'),
(12, 'qui à découvert la gravité?', 'isaac newton', 'albert Einstein', 'question1'),
(13, 'quel est le plus grand océan du monde?', 'océan Atlantique ', 'océan indien', 'question3'),
(14, 'quel est le plus grand pays du monde par superficie?', 'USA', 'RUSSIE', 'question2'),
(15, 'quelle est la monnaie officielle du Royaume-Uni?', 'euro', 'dollard américain ', 'question3'),
(16, 'quel est le plus grand fleuve du monde?', 'nil', 'amazone', 'question2'),
(17, 'qui a inventé l\'ampoule electrique?', 'thomas edison', 'nikola tesla', 'question1'),
(18, 'quel est le symbole pour désigner une variable ?', '$', '#', 'question1'),
(19, 'quel est le symbole pour désigner une variable ?', '$', '#', 'question1'),
(20, 'comment déclare-t-on une variable en Javascript?', 'var', 'int', 'question1'),
(21, 'quelle est la langue officielle au Sénégal?', 'français ', 'wolof', 'question1');

-- --------------------------------------------------------

--
-- Structure de la table `session`
--

CREATE TABLE `session` (
  `id_session` int(11) NOT NULL,
  `id_users` int(11) DEFAULT NULL,
  `date_session` date DEFAULT NULL,
  `score` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `classe` varchar(255) DEFAULT NULL,
  `passwords` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `email`, `classe`, `passwords`) VALUES
(8, 'papis dia', 'papis@gmail.com', NULL, '$2y$10$IvAJySJYRXUfy3HaO4JkHOWMSji75YscoPxCt5xPmL0YFL9JG4PWm'),
(9, 'papis dia', 'papis@gmail.com', NULL, '$2y$10$r0UhGG9.YAPY2lWl21DTW.nLOCj56yTXeZZ2RJrJ25GQyKta9CUtS'),
(10, 'khadija ', '', NULL, '$2y$10$PbHDjWS.60eNDMJ/60Yr/OuMG1CkEmZzEVOEalpgWk74029vubbma'),
(11, 'khadija samb', 'khadijasamb01@gmail.com', NULL, '$2y$10$0qsenC8TSnbrdorqWDxVQ.VkR60Sxnb6KrdjCl.qcpYE79BsTnIf6'),
(12, 'khadija aidara', 'khadijaaidara2000@gmail.com', NULL, '$2y$10$se1omvDiDZhYsUovV9jKt.suBN5LcTpQoM3xTbrV6NVn8QJ9A0nMy'),
(13, 'assane ba', 'assaneba2000@gmail.com', NULL, '$2y$10$bPWRefTH2gxGmuegHhgW9.bM/Z9adzzOHY0B6lxi1aLdYWfSga.0y');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id_admins`);

--
-- Index pour la table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id_options`);

--
-- Index pour la table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id_question`);

--
-- Index pour la table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id_session`),
  ADD KEY `id_users` (`id_users`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admins`
--
ALTER TABLE `admins`
  MODIFY `id_admins` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `options`
--
ALTER TABLE `options`
  MODIFY `id_options` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `question`
--
ALTER TABLE `question`
  MODIFY `id_question` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `session`
--
ALTER TABLE `session`
  MODIFY `id_session` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `session`
--
ALTER TABLE `session`
  ADD CONSTRAINT `session_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
