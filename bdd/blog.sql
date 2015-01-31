-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Sam 31 Janvier 2015 à 18:07
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `texte` text CHARACTER SET utf8 NOT NULL,
  `date` text CHARACTER SET utf8 NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`id`, `titre`, `texte`, `date`, `user_id`) VALUES
(2, 'Test article utilisateur diffÃ©rent', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla augue risus, suscipit mattis felis id, euismod facilisis neque. Nunc scelerisque at ante nec egestas. Fusce metus ante, aliquet commodo arcu eu, blandit tempus sapien. Donec lacinia, nibh vel vestibulum volutpat, nisi nisl tristique lorem, in egestas sem libero porttitor ligula posuere. ', '1422707105', 11),
(3, 'Test article avec saut de ligne', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. \r\nNunc non ante eu augue vehicula commodo quis et elit.\r\nQuisque nec nisl eget ante aliquam varius vitae sed tortor. \r\nInteger mattis nunc id finibus lacinia. ', '1422707186', 1),
(4, 'Test article avec balise', '<h1>Lorem ipsum dolor sit amet, consectetur adipiscing</h1>', '1422707253', 1),
(5, 'Test article long', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean vel aliquet nisi. Duis nec justo ultricies, vestibulum libero a, laoreet orci. Integer malesuada blandit sem eu tristique. Curabitur vitae lectus dui. In vitae laoreet leo. Nam iaculis suscipit diam. Vestibulum gravida vitae tortor quis interdum. Nunc quis consectetur purus. Etiam dignissim dapibus elit id lobortis. Morbi at magna tincidunt, sodales tortor ut, tristique augue. Cras ac erat vulputate, efficitur nulla sed, iaculis justo. Vestibulum quis commodo lacus. In vehicula arcu sed sapien tristique vehicula. Fusce porta amet. ', '1422707300', 1),
(6, 'Test article ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean eleifend lacus volutpat, commodo ex a, pretium magna. In hac habitasse platea dictumst. Quisque vitae felis quis arcu volutpat tempor quis ac justo. Aliquam vitae laoreet arcu, eu pellentesque purus. Donec pretium mattis lectus, volutpat sodales risus finibus nec. Suspendisse volutpat. ', '1422707318', 1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `sid` varchar(255) NOT NULL,
  `expiration_sid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `email` (`email`,`mdp`),
  KEY `email_2` (`email`),
  KEY `mdp` (`mdp`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `email`, `mdp`, `sid`, `expiration_sid`) VALUES
(1, 'riviere', 'gautier', 'gautierdu59890@hotmail.fr', '1234', '77ade43048747620d27bdafd83b7901b', 1422708646),
(9, 'riv', 'gaut', 'gautier.riv@neuf.fr', 'azerty', '6b9d232886c901737c90a4e164f106d9', 1422618161),
(11, 'admin', 'admin', 'admin@admin.fr', 'admin', 'f5f47e5fca4965802959175d2e9fb6e3', 1422709084);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
