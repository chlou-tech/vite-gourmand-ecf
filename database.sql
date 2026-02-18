-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 18 fév. 2026 à 19:19
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `vite_gourmand`
--

-- --------------------------------------------------------

--
-- Structure de la table `allergene`
--

DROP TABLE IF EXISTS `allergene`;
CREATE TABLE `allergene` (
  `id_allergene` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `allergene`
--

INSERT INTO `allergene` (`id_allergene`, `nom`) VALUES
(1, 'Gluten'),
(2, 'Lactose'),
(3, 'Fruits à coque'),
(4, 'Œufs'),
(5, 'Soja');

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

DROP TABLE IF EXISTS `avis`;
CREATE TABLE `avis` (
  `id_avis` int(11) NOT NULL,
  `note` int(11) DEFAULT NULL CHECK (`note` between 1 and 5),
  `commentaire` text DEFAULT NULL,
  `valide` tinyint(1) DEFAULT 0,
  `date_avis` datetime DEFAULT NULL,
  `id_commande` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `avis`
--

INSERT INTO `avis` (`id_avis`, `note`, `commentaire`, `valide`, `date_avis`, `id_commande`) VALUES
(1, 5, 'top top', 1, '2026-02-13 14:26:40', 4),
(2, 3, 'ça va', 1, '2026-02-17 18:22:57', 4);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE `commande` (
  `id_commande` int(11) NOT NULL,
  `date_commande` datetime NOT NULL,
  `date_prestation` date NOT NULL,
  `heure_livraison` time DEFAULT NULL,
  `adresse_livraison` text DEFAULT NULL,
  `nb_personnes` int(11) NOT NULL,
  `prix_total` decimal(10,2) NOT NULL,
  `prix_livraison` decimal(10,2) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `statut` varchar(50) DEFAULT 'en_attente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id_commande`, `date_commande`, `date_prestation`, `heure_livraison`, `adresse_livraison`, `nb_personnes`, `prix_total`, `prix_livraison`, `id_user`, `id_menu`, `statut`) VALUES
(1, '2026-02-12 19:01:25', '2026-02-12', '18:55:00', '123 rue du test', 7, 175.00, 10.00, 11, 1, 'en_preparation'),
(2, '2026-02-12 19:01:41', '2026-02-12', '18:55:00', '123 rue du test', 7, 175.00, 10.00, 11, 1, 'annulee'),
(3, '2026-02-12 19:10:02', '2026-02-24', '12:09:00', '123 rue du test encore', 4, 88.00, 10.00, 11, 2, 'livree'),
(4, '2026-02-13 14:25:17', '2026-02-21', '14:25:00', '123 rue du test encore', 10, 220.00, 10.00, 11, 2, 'livree');

-- --------------------------------------------------------

--
-- Structure de la table `commande_statut`
--

DROP TABLE IF EXISTS `commande_statut`;
CREATE TABLE `commande_statut` (
  `id` int(11) NOT NULL,
  `statut` varchar(100) NOT NULL,
  `date_statut` datetime NOT NULL,
  `id_commande` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `horaire`
--

DROP TABLE IF EXISTS `horaire`;
CREATE TABLE `horaire` (
  `id_horaire` int(11) NOT NULL,
  `jour_semaine` varchar(20) NOT NULL,
  `heure_ouverture` time NOT NULL,
  `heure_fermeture` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `horaire`
--

INSERT INTO `horaire` (`id_horaire`, `jour_semaine`, `heure_ouverture`, `heure_fermeture`) VALUES
(1, 'Lundi', '08:00:00', '18:00:00'),
(2, 'Mardi', '08:00:00', '18:00:00'),
(3, 'Mercredi', '08:00:00', '18:00:00'),
(4, 'Jeudi', '08:00:00', '18:00:00'),
(5, 'Vendredi', '08:00:00', '18:00:00'),
(6, 'Samedi', '09:00:00', '16:00:00'),
(7, 'Dimanche', '09:00:00', '14:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `titre` varchar(150) NOT NULL,
  `description` text DEFAULT NULL,
  `theme` varchar(100) DEFAULT NULL,
  `regime` varchar(100) DEFAULT NULL,
  `nb_personnes_min` int(11) NOT NULL,
  `prix_base` decimal(10,2) NOT NULL,
  `conditions` text DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `actif` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `menu`
--

INSERT INTO `menu` (`id_menu`, `titre`, `description`, `theme`, `regime`, `nb_personnes_min`, `prix_base`, `conditions`, `stock`, `actif`) VALUES
(1, 'Menu Classique', 'Menu traditionnel pour tous types d’événements', 'Classique', 'Classique', 10, 25.00, 'Commande minimum 3 jours à l’avance', 10, 1),
(2, 'Menu Végétarien', 'Menu sans viande', 'Événement', 'Végétarien', 8, 22.00, 'Commande minimum 2 jours à l’avance', 8, 1);

-- --------------------------------------------------------

--
-- Structure de la table `menu_plat`
--

DROP TABLE IF EXISTS `menu_plat`;
CREATE TABLE `menu_plat` (
  `id_menu` int(11) NOT NULL,
  `id_plat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `menu_plat`
--

INSERT INTO `menu_plat` (`id_menu`, `id_plat`) VALUES
(1, 1),
(1, 2),
(1, 4),
(2, 1),
(2, 3),
(2, 5);

-- --------------------------------------------------------

--
-- Structure de la table `plat`
--

DROP TABLE IF EXISTS `plat`;
CREATE TABLE `plat` (
  `id_plat` int(11) NOT NULL,
  `nom` varchar(150) NOT NULL,
  `type_plat` varchar(50) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `plat`
--

INSERT INTO `plat` (`id_plat`, `nom`, `type_plat`, `description`) VALUES
(1, 'Salade de chèvre chaud', 'Entrée', 'Salade verte, chèvre, miel'),
(2, 'Saumon rôti', 'Plat', 'Saumon frais et légumes de saison'),
(3, 'Lasagnes végétariennes', 'Plat', 'Lasagnes aux légumes'),
(4, 'Tarte aux pommes', 'Dessert', 'Tarte maison'),
(5, 'Mousse au chocolat', 'Dessert', 'Chocolat noir'),
(6, 'Testtest', 'miam miam', 'un bon plat pour les gourmands');

-- --------------------------------------------------------

--
-- Structure de la table `plat_allergene`
--

DROP TABLE IF EXISTS `plat_allergene`;
CREATE TABLE `plat_allergene` (
  `id_plat` int(11) NOT NULL,
  `id_allergene` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `plat_allergene`
--

INSERT INTO `plat_allergene` (`id_plat`, `id_allergene`) VALUES
(1, 2),
(2, 4),
(5, 2),
(6, 1),
(6, 2);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `libelle` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id_role`, `libelle`) VALUES
(1, 'utilisateur'),
(2, 'employe'),
(3, 'administrateur');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE `utilisateur` (
  `id_user` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `adresse` text DEFAULT NULL,
  `actif` tinyint(1) DEFAULT 1,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_user`, `nom`, `prenom`, `email`, `mot_de_passe`, `telephone`, `adresse`, `actif`, `id_role`) VALUES
(4, 'Admin', 'Test', 'admin@test.fr', '$2y$10$JYEtWPbGWfM05uzFuXvaSeWk.2xkeE30AWRmOg2YUqDtEi1FO22ay', NULL, NULL, 1, 3),
(11, 'User', 'Test', 'user@test.fr', '$2y$10$JYEtWPbGWfM05uzFuXvaSeWk.2xkeE30AWRmOg2YUqDtEi1FO22ay', NULL, NULL, 0, 2),
(12, 'Employe', 'Test', 'employe@test.fr', '$2y$10$JYEtWPbGWfM05uzFuXvaSeWk.2xkeE30AWRmOg2YUqDtEi1FO22ay', NULL, NULL, 1, 2),
(14, 'Test', 'Utilisateur', 'user@test.fr', '$2y$10$84W0rka.l9tuavTSBAilLuPoI8xuBDxnHtuLgHqOcV17sAo4Yxn7e', NULL, NULL, 1, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `allergene`
--
ALTER TABLE `allergene`
  ADD PRIMARY KEY (`id_allergene`);

--
-- Index pour la table `avis`
--
ALTER TABLE `avis`
  ADD PRIMARY KEY (`id_avis`),
  ADD KEY `id_commande` (`id_commande`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_commande`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_menu` (`id_menu`);

--
-- Index pour la table `commande_statut`
--
ALTER TABLE `commande_statut`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_commande` (`id_commande`);

--
-- Index pour la table `horaire`
--
ALTER TABLE `horaire`
  ADD PRIMARY KEY (`id_horaire`);

--
-- Index pour la table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Index pour la table `menu_plat`
--
ALTER TABLE `menu_plat`
  ADD PRIMARY KEY (`id_menu`,`id_plat`),
  ADD KEY `id_plat` (`id_plat`);

--
-- Index pour la table `plat`
--
ALTER TABLE `plat`
  ADD PRIMARY KEY (`id_plat`);

--
-- Index pour la table `plat_allergene`
--
ALTER TABLE `plat_allergene`
  ADD PRIMARY KEY (`id_plat`,`id_allergene`),
  ADD KEY `id_allergene` (`id_allergene`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `allergene`
--
ALTER TABLE `allergene`
  MODIFY `id_allergene` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `avis`
--
ALTER TABLE `avis`
  MODIFY `id_avis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id_commande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `commande_statut`
--
ALTER TABLE `commande_statut`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `horaire`
--
ALTER TABLE `horaire`
  MODIFY `id_horaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `plat`
--
ALTER TABLE `plat`
  MODIFY `id_plat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `avis`
--
ALTER TABLE `avis`
  ADD CONSTRAINT `avis_ibfk_1` FOREIGN KEY (`id_commande`) REFERENCES `commande` (`id_commande`);

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `utilisateur` (`id_user`),
  ADD CONSTRAINT `commande_ibfk_2` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`);

--
-- Contraintes pour la table `commande_statut`
--
ALTER TABLE `commande_statut`
  ADD CONSTRAINT `commande_statut_ibfk_1` FOREIGN KEY (`id_commande`) REFERENCES `commande` (`id_commande`);

--
-- Contraintes pour la table `menu_plat`
--
ALTER TABLE `menu_plat`
  ADD CONSTRAINT `menu_plat_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`),
  ADD CONSTRAINT `menu_plat_ibfk_2` FOREIGN KEY (`id_plat`) REFERENCES `plat` (`id_plat`);

--
-- Contraintes pour la table `plat_allergene`
--
ALTER TABLE `plat_allergene`
  ADD CONSTRAINT `plat_allergene_ibfk_1` FOREIGN KEY (`id_plat`) REFERENCES `plat` (`id_plat`),
  ADD CONSTRAINT `plat_allergene_ibfk_2` FOREIGN KEY (`id_allergene`) REFERENCES `allergene` (`id_allergene`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`);
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
