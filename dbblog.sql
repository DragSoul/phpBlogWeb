-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 06 jan. 2021 à 20:33
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `dbblog`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(60) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `auteur` int(11) NOT NULL,
  `contenu` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `nom`, `date`, `auteur`, `contenu`) VALUES
(17, 'Re:Zero', '2021-01-06 21:19:12', 1, 'Re:Zero kara hajimeru isekai seikatsu (Reï¼šã‚¼ãƒ­ã‹ã‚‰å§‹ã‚ã‚‹ç•°ä¸–ç•Œç”Ÿæ´»?, litt. Â« Commencer la vie dans un autre monde Ã  partir de zÃ©ro Â»), Re:Zero âˆ’ Re:vivre dans un autre monde Ã  partir de zÃ©ro en franÃ§ais, ou encore Re:Zero âˆ’ Starting Life in Another World en anglais, est une sÃ©rie de light novels Ã©crite par Tappei Nagatsuki et illustrÃ©e par Shinichirou Otsuka. Depuis le 25 janvier 2014, vingt-cinq volumes ont Ã©tÃ© publiÃ©s par Kadokawa (anciennement Media Factory) dans sa collection MF Bunko J.\r\n\r\nLes quatre premiÃ¨res parties de la sÃ©rie sont adaptÃ©es en manga. La premiÃ¨re et la troisiÃ¨me partie sont dessinÃ©es par Daichi Matsue et publiÃ©es par Media Factory entre juin 2014 et janvier 2015, puis entre mai 2015 et septembre 2019 pour la troisiÃ¨me. La deuxiÃ¨me partie est dessinÃ©e par Makoto Fugetsu et publiÃ©e par Square Enix entre octobre 2014 et octobre 2017. La quatriÃ¨me partie est dessinÃ©e par Haruno Atori et composÃ©e par Yu Aikawa, et publiÃ©e par Kadokawa Ã  partir de septembre 2019.\r\n\r\nUne adaptation en anime par White Fox est diffusÃ©e entre avril et septembre 2016. Une deuxiÃ¨me saison est divisÃ©e en deux cours, dont la premiÃ¨re partie est diffusÃ©e depuis le 8 juillet 2020 tandis que la seconde est prÃ©vue pour le 6 janvier 20211.\r\n\r\nEn France, Ofelbe publie le light novel depuis le 15 juin 2017 et Ototo publie la version manga depuis le 21 avril 2017. L\'anime est quant Ã  lui disponible en streaming sur Crunchyroll et en DVD et Bluray chez @Anime.'),
(18, 'Overwatch', '2021-01-06 21:24:00', 1, 'Overwatch est un jeu vidÃ©o de tir (FPS) en ligne et en Ã©quipe, dÃ©veloppÃ© et publiÃ© par Blizzard Entertainment. Le jeu est annoncÃ© le 7 novembre 2014 Ã  la BlizzCon, et est commercialisÃ© le 24 mai 2016 sur Windows, PlayStation 4 et Xbox One et le 15 octobre 2019 sur Nintendo Switch. Le jeu met l\'accent sur la coopÃ©ration entre diffÃ©rentes classes reprÃ©sentÃ©es par diffÃ©rents personnages ayant chacun leurs capacitÃ©s et particularitÃ©s. Le jeu s\'inspire notamment des jeux de tir en vue subjective en Ã©quipe de la dÃ©cennie prÃ©cÃ©dente mettant eux aussi l\'accent sur la coopÃ©ration entre plusieurs classes de personnage, notamment Team Fortress 2.'),
(19, 'Tales Of...', '2021-01-06 21:24:45', 1, 'Tales of (ã€Žãƒ†ã‚¤ãƒ«ã‚º ã‚ªãƒ–ã€ ã‚·ãƒªãƒ¼ã‚º, \"Teiruzu obu\" shirÄ«zu?) est une sÃ©rie de jeux vidÃ©o de rÃ´le dÃ©veloppÃ©e par Bandai Namco Games (anciennement Namco), dont les diffÃ©rents titres d\'Ã©pisodes commencent tous par les mots Â« Tales of Â». Plusieurs Ã©pisodes de la sÃ©rie sont Ã  l\'origine d\'anime et mangas dÃ©rivÃ©s. CrÃ©Ã©e en 1995, la sÃ©rie compte dÃ©sormais plus de quinze titres principaux, une quinzaine de spin-offs et quatre anime. La sÃ©rie est notamment connue pour son esthÃ©tique manga trÃ¨s encensÃ©e par les Japonais. On retrouvera de nombreuses rÃ©fÃ©rences aux Ã©pisodes de la sÃ©rie tout au long des opus. Tales of Symphonia est le premier Ã©pisode de la saga Ã  Ãªtre sorti sur le continent europÃ©en.');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `auteur` int(11) NOT NULL,
  `contenu` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idarticle` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=69 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `auteur`, `contenu`, `date`, `idarticle`) VALUES
(68, 2, 'Je suis sur Tales of Vesperia en ce moment.', '2021-01-06 21:29:08', 19),
(66, 2, 'J\'ai dÃ©jÃ  fait Tales of Symphonia et Tales of Zestiria.', '2021-01-06 21:27:15', 19),
(65, 2, 'Je joue Ana perso, j\'aime beaucoup son kit en tant que healeur.\r\nPouvoir interrompre des compÃ©tences ultimes avec une flÃ©chette soporifique QUEL PLAISIR !', '2021-01-06 21:26:20', 18),
(64, 2, 'La deuxiÃ¨me parie de la saison 2 vient de commencer. L\'Ã©pisode est sorti aujourd\'hui Ã  16h30.', '2021-01-06 21:22:26', 17);

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

DROP TABLE IF EXISTS `membres`;
CREATE TABLE IF NOT EXISTS `membres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(21) NOT NULL,
  `email` varchar(60) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `isbanned` tinyint(1) NOT NULL DEFAULT '0',
  `isadmin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`id`, `pseudo`, `email`, `mdp`, `isbanned`, `isadmin`) VALUES
(1, 'toto', 'toto@toto.com', '$2y$10$Bnb3Sr.yGCPrejypSHoCEuVUEWnD0VjZwYL4yhj.T3HbaqvRhVVpe', 0, 1),
(2, 'DragSoul', 'dragsoul@live.fr', '$2y$10$4IHi/2.UzB4X4XpOHaue0ewkjPpvWYJ4Me6pwukpSwwFywBtrLweO', 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
