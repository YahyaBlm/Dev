-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 27 nov. 2024 à 12:03
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `thalieperrot`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `article_titre` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `article_text` text COLLATE utf8mb4_general_ci NOT NULL,
  `article_image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `id_user` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `article_titre`, `article_text`, `article_image`, `id_user`) VALUES
(1, 'Sea Love', 'Pirate bg sur un bateau avec meuf ultra sexy', 'img_6738f81c8f81d0.67554587.png', 3),
(2, 'Romanciaga', 'Nouvelle marque de pret a porté inspiré de Balenciaga', 'img_6738f848072bb1.83802787.png', 3);

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int NOT NULL AUTO_INCREMENT,
  `commentaire` text COLLATE utf8mb4_general_ci NOT NULL,
  `id_livre` int NOT NULL,
  `id_user` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `commentaire`, `id_livre`, `id_user`) VALUES
(19, 'teste commentaire 1', 2, 20),
(11, 'Oeuvre passionnante je recommande fortement !', 2, 20),
(12, 'hi bro', 3, 20),
(22, 'Je suis qu&#039;a la moiti&eacute; et j&#039;aime bien .', 47, 22),
(14, 'Hello, très belle littérature.', 3, 21),
(21, 'Trop cool J&#039;adore !', 46, 22),
(16, 'J\'attends toujours le prochain tome.', 4, 21),
(17, 'c&#039;est mortel !', 2, 22),
(23, 'Fin tragique, mais histoire captivante ! oops d&eacute;sol&eacute; pour le Spoil XD !', 48, 22),
(24, 'Commentaire, test unitaire.', 2, 20),
(28, 'ceci est un test', 2, 21);

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` int NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `id_livre` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `images`
--

INSERT INTO `images` (`id`, `image`, `id_livre`) VALUES
(1, 'img_672b53c5c66595.90782134.jpg', 2),
(2, 'img_672b53ceabe2b1.40450981.jpg', 2);

-- --------------------------------------------------------

--
-- Structure de la table `livres`
--

DROP TABLE IF EXISTS `livres`;
CREATE TABLE IF NOT EXISTS `livres` (
  `id` int NOT NULL AUTO_INCREMENT,
  `livre_titre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `livre_couverture` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `livre_resume` text COLLATE utf8mb4_general_ci NOT NULL,
  `livre_linkSale` text COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `livres`
--

INSERT INTO `livres` (`id`, `livre_titre`, `livre_couverture`, `livre_resume`, `livre_linkSale`) VALUES
(2, 'Les Gardiens de Lumière', 'img_6738a6b151e7b6.19285966.jpg', 'France, 1852, des secrets ancestraux, une cité légendaire, une lutte entre l’Ombre et la Lumière.\r\n\r\nLes jumeaux Connor et Trevor Erainn reçoivent une énigmatique injonction : accompagner leur mère sur leurs terres de Picardie pour découvrir un secret que leur grand-père, le comte de Pierrefonds, souhaite leur confier. Comble du mystère, leur cousin Miguel, médecin talentueux, qu’ils ont toujours rejeté, se voit également convié. En chemin, ils rencontrent la douce religieuse Zélie, cible d’une attaque, et la farouche Brune, chef de bande au service de l’insaisissable Ergael. Ensemble, ils se lancent dans une quête périlleuse : l’exploration d’un univers inconnu auquel rien ne pouvait les préparer. Entre trahisons et aveux, chaque pas les rapproche de la vérité, mais aussi du danger. Parviendront-ils à sauver leur monde et à affronter les ténèbres ?', 'https://www.amazon.fr/Gardiens-Lumi%C3%A8re-l%C3%A9gendaire-Brennoslynn-Erainn-ebook/dp/B0DFX5P4XJ/ref=sr_1_2?__mk_fr_FR=%C3%85M%C3%85%C5%BD%C3%95%C3%91&dib=eyJ2IjoiMSJ9.wcZbYUzCKr0EBNBnj1G-3agvh_tI57LifkKrzZWWAT0rvEfouTxj7tCZgmcOZ04VKRdRTFQNwS_CHjqGHSL2RlAuQqs8A87KrwqIYEoI566yCeXk_nyyAGIf6Eia_OUL.SB4_n9v3W5wWOEtn6UE59M_lVre8EVgGcEHXrCBJ2eU&dib_tag=se&keywords=thalie+perrot&qid=1728983364&sr=8-2'),
(3, 'Le Souffle d\'Infinité: Les Erainn, Sean', 'img_6738a6c9362226.15594269.jpg', '1851, près des côtes Françaises.\r\n\r\nSean Erainn, accompagné de sa famille vient rendre visite à son frère Rory, installé à Saint-Malo avec son épouse Cordélia. C’est au cours de ce séjour qu’il fait la connaissance de Madeline Kerradec. Une jeune femme perdue dans un mutisme si intrigant que le benjamin de la fratrie, d’une nature particulièrement solaire, se sent immédiatement attiré par celle dont il aimerait percer les mystères. Elle a vécu l’enfer, c’est tout ce qu’il détient comme information. Madeline balance entre le bien et le mal, les ombres qui la retiennent prisonnière et la lumière vers laquelle Sean est déterminé à la ramener. Il y croit ! Mais à trop sous-estimer le poids de cette bascule, ne risque-t-il pas de sombrer vers l’obscurité ? Au cours d’une épopée maritime au rythme échevelé, le Souffle d’Infinité les emportera dans une aventure d’où personne ne reviendra indemne...', 'https://www.amazon.fr/Souffle-dInfinit%C3%A9-Erainn-Sean-ebook/dp/B0CCJWM4HT/ref=sr_1_3?__mk_fr_FR=%C3%85M%C3%85%C5%BD%C3%95%C3%91&dib=eyJ2IjoiMSJ9.wcZbYUzCKr0EBNBnj1G-3agvh_tI57LifkKrzZWWAT0rvEfouTxj7tCZgmcOZ04VKRdRTFQNwS_CHjqGHSL2RlAuQqs8A87KrwqIYEoI566yCeXk_nyyAGIf6Eia_OUL.SB4_n9v3W5wWOEtn6UE59M_lVre8EVgGcEHXrCBJ2eU&dib_tag=se&keywords=thalie+perrot&qid=1728983364&sr=8-3'),
(4, 'Le Cercle de Charme: Les Erainn, Liam', 'img_6738a6d7d02d92.66279700.jpg', '1851, près de Saint-Malo, France.\r\n\r\nLe plus bougon des Erainn ne peut s’empêcher de râler, même lors de la soirée de mariage de son benjamin. Liam aimerait se trouver loin de ces frivolités qui comblent sa famille.\r\nLorsqu’une bonimenteuse aux yeux d’améthyste s’approche de lui pour lui prédire son avenir, il reste captivé par la beauté de la jeune femme.\r\nTandis qu’elle s’éloigne rapidement, il s’aperçoit qu’elle lui a volé le bijou séculaire appartenant aux Erainn depuis toujours : le médaillon d’Angus !\r\nDécidé à rattraper la ribaude qui a osé commettre l’irréparable à ses yeux, il ignore encore qu’il va ainsi au-devant d’une aventure extraordinaire !\r\nLa fascinante Loargann ainsi que sa famille attachante lui permettront-elles de se réconcilier avec la vie ? Issus de mondes diamétralement opposés, parviendront-ils au bout de cette quête mystérieuse dans laquelle ils se lancent?', 'https://www.amazon.fr/Cercle-Charme-Erainn-Liam-ebook/dp/B0CCGKPG28/ref=sr_1_4?__mk_fr_FR=%C3%85M%C3%85%C5%BD%C3%95%C3%91&dib=eyJ2IjoiMSJ9.wcZbYUzCKr0EBNBnj1G-3agvh_tI57LifkKrzZWWAT0rvEfouTxj7tCZgmcOZ04VKRdRTFQNwS_CHjqGHSL2RlAuQqs8A87KrwqIYEoI566yCeXk_nyyAGIf6Eia_OUL.SB4_n9v3W5wWOEtn6UE59M_lVre8EVgGcEHXrCBJ2eU&dib_tag=se&keywords=thalie+perrot&qid=1728983364&sr=8-4'),
(46, 'Attractif Enchantement: Les Erainn, Rory', 'img_6738a6fea40713.22302196.jpg', '1848, près de Saint-Malo, France.\r\nConsidérée comme un bas-bleu sans charme par les membres de la société dans laquelle elle gravite, Cordélia de Montrésor en est persuadée, elle finira sa vie vieille fille.\r\nAprès avoir, une fois de plus, été la cible de quolibets au cours d’un bal, elle se retrouve en présence de Rory Erainn.\r\nLe beau capitaine irlandais possède la lourde charge de protéger à tout prix une Cordélia chamboulée par les disparitions successives qui ont secoué sa famille.\r\nQuel est donc ce péril imminent qui la guette ?\r\nL’attirance qu’elle éprouve pour celui qui paraît détenir le pouvoir de la transformer ne risque-t-elle pas de tout compliquer ?\r\nDans une ambiance où s’entremêlent la passion, l’humour et un soupçon de féérie, Cordélia et Rory devront déjouer les mystères et complots qui semblent vouloir les séparer.\"', 'https://www.amazon.fr/Attractif-Enchantement-Erainn-Thalie-Perrot-ebook/dp/B0CCGQ7YNK/?_encoding=UTF8&pd_rd_w=GjvxG&content-id=amzn1.sym.93d1cf37-6671-4ba5-9e40-a303a25b28b7&pf_rd_p=93d1cf37-6671-4ba5-9e40-a303a25b28b7&pf_rd_r=259-9883082-6149015&pd_rd_wg=wwF3Z&pd_rd_r=a88724f0-c017-45d5-a161-8137716d7d05&ref_=aufs_ap_sc_dsk'),
(47, 'La même histoire que celle de maman !    : Conte N°1 : Prince Rory', 'img_6738a789efe579.73779943.jpg', 'Conte pour enfants de 9 à 12 ans, adaptation de la romance historique intitulée \"Attractif Enchantement\" de Thalie Perrot.\r\n\r\nLe prince Rory doit protéger Cordélia. Le pouvoir spécial qu\'il possède lui permettra-t-il de transformer Cordélia en une belle jeune fille ?\r\n\r\nAttention : Niveau difficile : utilisation de la 3e personne, du passé, et de mots compliqués. Pour enfant autonome en lecture ou alors accompagnement par un adulte.', 'https://www.amazon.fr/dp/B0CGSVJTZW?ref=cm_sw_r_ffobk_cso_cp_apin_dp_NKZQGY1AM65YTNAKND29&ref_=cm_sw_r_ffobk_cso_cp_apin_dp_NKZQGY1AM65YTNAKND29&social_share=cm_sw_r_ffobk_cso_cp_apin_dp_NKZQGY1AM65YTNAKND29&skipTwisterOG=1&bestFormat=true');

-- --------------------------------------------------------

--
-- Structure de la table `partner`
--

DROP TABLE IF EXISTS `partner`;
CREATE TABLE IF NOT EXISTS `partner` (
  `id` int NOT NULL AUTO_INCREMENT,
  `partner_nom` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `partner_prenom` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `partner_description` text COLLATE utf8mb4_general_ci NOT NULL,
  `partner_image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `partner_link` text COLLATE utf8mb4_general_ci NOT NULL,
  `id_user` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `partner`
--

INSERT INTO `partner` (`id`, `partner_nom`, `partner_prenom`, `partner_description`, `partner_image`, `partner_link`, `id_user`) VALUES
(1, 'Meirsman', 'Melissa', 'Auteure d\'aventure et histoires d\'horreur passionnante a coupé le souffle.', 'img_6720f02db9d929.04578457.jpg', 'https://raybradbury.com/', 3),
(2, 'Coliot', 'Eddy', 'Auteur de sci-fi et technologies futuristiques, prenez place dans la fusée d\'Eddy pour un voyage long et perieux.', 'img_6720f038839827.08372963.jpg', 'https://www.guillaumemusso.com/', 3);

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `role_level` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `role_level`) VALUES
(1, 'Utilisateur', 10),
(2, 'Moderateur', 50),
(3, 'Administrateur', 100);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_nom` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `user_prenom` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `user_password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `id_role` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `user_nom`, `user_prenom`, `user_email`, `user_password`, `id_role`) VALUES
(21, 'Belmou', 'Yahya', 'yahya.belmou@gmail.com', '$2y$10$NyONTVqShD.J85fSznUYgub7HzMnUXNLWf8uiU54I.OdB0ciAw.GW', 2),
(20, 'Perrot', 'Thalie', 'thalieperrot@gmail.com', '$2y$10$r5w2cnS1N1CttmdsSi3DfuchmqTq6iJbRPF/FEHLjWqk5sN.2m6ru', 3),
(22, 'Bel moukaddam', 'Yahya', 'lala@www.com', '$2y$10$aej7gUlTazy/4iYxqcKWtOkh5H3XCqYDWY1YmezEGxKNwYiCFzkna', 1),
(23, 'Benmessaoud', 'Firas', 'firas@gmail.com', '$2y$10$Y8pcoZU.ORPBY.z.LRW.Fe403tiDSz8tnxULbaJd5uKbUzooPTJcC', 1),
(26, 'Aboim', 'Teddy', 'teddy@gmail.com', '$2y$10$U00CL3DDOqPBYn28Hg8p9ejYzIJwPkSnVyut0IOlVlzoA69xFNKkW', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
