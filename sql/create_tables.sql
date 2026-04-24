CREATE TABLE `allergene` (
  `id_allergene` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_allergene`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `avis` (
  `id_avis` int NOT NULL AUTO_INCREMENT,
  `note` int DEFAULT NULL,
  `commentaire` text COLLATE utf8mb4_general_ci,
  `valide` tinyint(1) DEFAULT '0',
  `date_avis` datetime DEFAULT NULL,
  `id_commande` int NOT NULL,
  PRIMARY KEY (`id_avis`),
  KEY `id_commande` (`id_commande`),
  CONSTRAINT `avis_ibfk_1` FOREIGN KEY (`id_commande`) REFERENCES `commande` (`id_commande`),
  CONSTRAINT `avis_chk_1` CHECK ((`note` between 1 and 5))
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `commande` (
  `id_commande` int NOT NULL AUTO_INCREMENT,
  `date_commande` datetime NOT NULL,
  `date_prestation` date NOT NULL,
  `heure_livraison` time DEFAULT NULL,
  `adresse_livraison` text COLLATE utf8mb4_general_ci,
  `nb_personnes` int NOT NULL,
  `prix_total` decimal(10,2) NOT NULL,
  `prix_livraison` decimal(10,2) DEFAULT NULL,
  `id_user` int NOT NULL,
  `id_menu` int NOT NULL,
  `statut` varchar(50) COLLATE utf8mb4_general_ci DEFAULT 'en_attente',
  PRIMARY KEY (`id_commande`),
  KEY `id_user` (`id_user`),
  KEY `id_menu` (`id_menu`),
  CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `utilisateur` (`id_user`),
  CONSTRAINT `commande_ibfk_2` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `commande_statut` (
  `id` int NOT NULL AUTO_INCREMENT,
  `statut` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `date_statut` datetime NOT NULL,
  `id_commande` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_commande` (`id_commande`),
  CONSTRAINT `commande_statut_ibfk_1` FOREIGN KEY (`id_commande`) REFERENCES `commande` (`id_commande`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



CREATE TABLE `horaire` (
  `id_horaire` int NOT NULL AUTO_INCREMENT,
  `jour_semaine` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `heure_ouverture` time NOT NULL,
  `heure_fermeture` time NOT NULL,
  PRIMARY KEY (`id_horaire`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `menu` (
  `id_menu` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `theme` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `regime` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nb_personnes_min` int NOT NULL,
  `prix_base` decimal(10,2) NOT NULL,
  `conditions` text COLLATE utf8mb4_general_ci,
  `stock` int NOT NULL,
  `actif` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `menu_plat` (
  `id_menu` int NOT NULL,
  `id_plat` int NOT NULL,
  PRIMARY KEY (`id_menu`,`id_plat`),
  KEY `id_plat` (`id_plat`),
  CONSTRAINT `menu_plat_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`),
  CONSTRAINT `menu_plat_ibfk_2` FOREIGN KEY (`id_plat`) REFERENCES `plat` (`id_plat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `plat` (
  `id_plat` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `type_plat` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id_plat`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `plat_allergene` (
  `id_plat` int NOT NULL,
  `id_allergene` int NOT NULL,
  PRIMARY KEY (`id_plat`,`id_allergene`),
  KEY `id_allergene` (`id_allergene`),
  CONSTRAINT `plat_allergene_ibfk_1` FOREIGN KEY (`id_plat`) REFERENCES `plat` (`id_plat`),
  CONSTRAINT `plat_allergene_ibfk_2` FOREIGN KEY (`id_allergene`) REFERENCES `allergene` (`id_allergene`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `role` (
  `id_role` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `utilisateur` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `prenom` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `mot_de_passe` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `telephone` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `adresse` text COLLATE utf8mb4_general_ci,
  `actif` tinyint(1) DEFAULT '1',
  `id_role` int NOT NULL,
  PRIMARY KEY (`id_user`),
  KEY `id_role` (`id_role`),
  CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

