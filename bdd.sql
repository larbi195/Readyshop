-- Adminer 4.8.1 MySQL 11.1.3-MariaDB-1:11.1.3+maria~ubu2204 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stock` int(11) DEFAULT NULL,
  `prix` float DEFAULT NULL,
  `genre` varchar(195) DEFAULT NULL,
  `nom` varchar(195) DEFAULT NULL,
  `commentaire` text DEFAULT NULL,
  `image_url` varchar(195) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `article` (`id`, `stock`, `prix`, `genre`, `nom`, `commentaire`, `image_url`) VALUES
(1,	55,	159,	NULL,	'A I R -X',	NULL,	'img/botte-removebg-preview.png'),
(2,	19,	591,	NULL,	'G L -X',	NULL,	'img/lunette-removebg-preview.png'),
(3,	0,	0,	NULL,	'-X',	NULL,	'img/pilule-removebg-preview.png'),
(4,	9,	99,	NULL,	'R B -X',	NULL,	'img/robe-removebg-preview.png'),
(5,	5,	55,	NULL,	'V S -X',	NULL,	'img/vest-removebg-preview.png');

DROP TABLE IF EXISTS `articlepanier`;
CREATE TABLE `articlepanier` (
  `id_article` int(11) DEFAULT NULL,
  `id_panier` int(11) DEFAULT NULL,
  `quantite` int(11) DEFAULT NULL,
  KEY `id_article` (`id_article`),
  KEY `id_panier` (`id_panier`),
  CONSTRAINT `articlepanier_ibfk_1` FOREIGN KEY (`id_article`) REFERENCES `article` (`id`),
  CONSTRAINT `articlepanier_ibfk_2` FOREIGN KEY (`id_panier`) REFERENCES `panier` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE `commentaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(11) DEFAULT NULL,
  `id_article` int(11) DEFAULT NULL,
  `commentaire` text DEFAULT NULL,
  `notations` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`id`) REFERENCES `utilisateur` (`id`),
  CONSTRAINT `commentaire_ibfk_2` FOREIGN KEY (`id`) REFERENCES `article` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


DROP TABLE IF EXISTS `contact`;
CREATE TABLE `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(11) DEFAULT NULL,
  `adresse` varchar(591) DEFAULT NULL,
  `code_postal` varchar(19) DEFAULT NULL,
  `ville` varchar(591) DEFAULT NULL,
  `pays` varchar(591) DEFAULT NULL,
  `image_url` varchar(591) DEFAULT NULL,
  `lien` varchar(591) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_utilisateur` (`id_utilisateur`),
  CONSTRAINT `contact_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `Utilisateur` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `contact` (`id`, `id_utilisateur`, `adresse`, `code_postal`, `ville`, `pays`, `image_url`, `lien`) VALUES
(1,	NULL,	NULL,	NULL,	NULL,	NULL,	'img/snap.png',	'https://www.snapchat.com'),
(2,	NULL,	NULL,	NULL,	NULL,	NULL,	'img/insta.png',	'https://www.instagram.com'),
(3,	NULL,	NULL,	NULL,	NULL,	NULL,	'img/TikTok.png',	'https://www.tiktok.com/fr/'),
(4,	NULL,	NULL,	NULL,	NULL,	NULL,	'img/youtube.png',	'https://www.youtube.com');

DROP TABLE IF EXISTS `panier`;
CREATE TABLE `panier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `id_produit` int(11) DEFAULT NULL,
  `date_commande` date DEFAULT NULL,
  `description` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `panier_ibfk_1` FOREIGN KEY (`id`) REFERENCES `utilisateur` (`id`),
  CONSTRAINT `panier_ibfk_2` FOREIGN KEY (`id`) REFERENCES `article` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE `utilisateur` (
  `id` int(19) NOT NULL AUTO_INCREMENT,
  `nom` varchar(159) NOT NULL,
  `email` varchar(159) NOT NULL,
  `mdp` varchar(159) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO `utilisateur` (`id`, `nom`, `email`, `mdp`, `admin`) VALUES
(1,	'M',	'm@gmail.com',	'$2y$10$he1oXbc2eudiweIS83LPd.3QYB9G4bGkzd6yOUErlIWUQZlZkE10K',	1),
(2,	'A',	'a@gmail.com',	'$2y$10$9FVGrVLy/MQjBpXuKVbMNe7bKoKHXAnjOiEfPLDHkdZXGmP8Fwxjy',	0),
(3,	'T',	't@gmail.com',	'$2y$10$Ks6A8F2DczEqZEwukWrJpuzlFYwwCeTVoPoBfMx4qVK2vuqtI0mYm',	0),
(4,	'R',	'r@gmail.com',	'$2y$10$ru8QAxLw6nvZX2L1Zh7Es.6cxlqp3jfapgk9YkNo9j.lB8ckmVIhO',	0),
(5,	'I',	'i@gmail.com',	'$2y$10$hBh6Xwli5bQ0OEqJfof./etZuXlK/wYi2YQVvFcWXRieV4BoGzyCS',	0),
(6,	'X',	'x@gmail.com',	'$2y$10$Z6ad6og9IcBtU3438Qm0.uhMv1bmvSQhdHc6as.RDFgq8xrucqnrK',	0);

-- 2024-02-02 10:17:11