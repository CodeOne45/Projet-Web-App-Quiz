-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 16 nov. 2020 à 23:08
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `phpprojectbd`
--

-- --------------------------------------------------------

--
-- Structure de la table `answer_participants`
--

CREATE TABLE `answer_participants` (
  `id_player` int(10) NOT NULL,
  `id_answer_question` int(10) NOT NULL,
  `answer` char(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `answer_question`
--

CREATE TABLE `answer_question` (
  `id_answer_question` int(10) NOT NULL,
  `id_question` int(10) NOT NULL,
  `answer` text DEFAULT NULL,
  `correct` binary(1) DEFAULT NULL,
  `point` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `game`
--

CREATE TABLE `game` (
  `id_game` int(10) NOT NULL,
  `id_quiz` int(10) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `player`
--

CREATE TABLE `player` (
  `id_player` int(11) NOT NULL,
  `id_game` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `Nickname` varchar(10) NOT NULL,
  `score` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

CREATE TABLE `questions` (
  `id_questions` int(10) NOT NULL,
  `id_quiz` int(10) NOT NULL,
  `level` int(3) DEFAULT NULL,
  `multiple_answer` binary(1) DEFAULT NULL,
  `question` text DEFAULT NULL,
  `themes` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `quiz`
--

CREATE TABLE `quiz` (
  `id_quiz` int(10) NOT NULL,
  `name` char(20) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_user` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pwd` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `answer_participants`
--
ALTER TABLE `answer_participants`
  ADD KEY `FK_id_player` (`id_player`),
  ADD KEY `FK_id_answer_question` (`id_answer_question`);

--
-- Index pour la table `answer_question`
--
ALTER TABLE `answer_question`
  ADD PRIMARY KEY (`id_answer_question`),
  ADD UNIQUE KEY `id_answer_question` (`id_answer_question`),
  ADD KEY `FK_id_question` (`id_question`);

--
-- Index pour la table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`id_game`),
  ADD UNIQUE KEY `id_game` (`id_game`),
  ADD KEY `FK_id_quiz` (`id_quiz`);

--
-- Index pour la table `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`id_player`),
  ADD UNIQUE KEY `id_player` (`id_player`),
  ADD UNIQUE KEY `Nickname` (`Nickname`),
  ADD KEY `FK_id_user` (`id_user`),
  ADD KEY `FK_id_game` (`id_game`);

--
-- Index pour la table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id_questions`),
  ADD UNIQUE KEY `id_questions` (`id_questions`),
  ADD KEY `FK_quiz_id` (`id_quiz`);

--
-- Index pour la table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id_quiz`),
  ADD UNIQUE KEY `id_quiz` (`id_quiz`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `id_user` (`id_user`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `answer_question`
--
ALTER TABLE `answer_question`
  MODIFY `id_answer_question` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `player`
--
ALTER TABLE `player`
  MODIFY `id_player` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `questions`
--
ALTER TABLE `questions`
  MODIFY `id_questions` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id_quiz` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `answer_participants`
--
ALTER TABLE `answer_participants`
  ADD CONSTRAINT `FK_id_answer_question` FOREIGN KEY (`id_answer_question`) REFERENCES `answer_question` (`id_answer_question`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_id_player` FOREIGN KEY (`id_player`) REFERENCES `player` (`id_player`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `answer_question`
--
ALTER TABLE `answer_question`
  ADD CONSTRAINT `FK_id_question` FOREIGN KEY (`id_question`) REFERENCES `answer_question` (`id_answer_question`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `game`
--
ALTER TABLE `game`
  ADD CONSTRAINT `FK_id_quiz` FOREIGN KEY (`id_quiz`) REFERENCES `quiz` (`id_quiz`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `player`
--
ALTER TABLE `player`
  ADD CONSTRAINT `FK_id_game` FOREIGN KEY (`id_game`) REFERENCES `game` (`id_game`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_id_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `FK_quiz_id` FOREIGN KEY (`id_quiz`) REFERENCES `quiz` (`id_quiz`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
