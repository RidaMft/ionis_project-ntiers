-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:8889
-- Généré le :  Sam 29 Avril 2017 à 13:12
-- Version du serveur :  5.6.28
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `archi_ntiers`
--

-- --------------------------------------------------------

--
-- Structure de la table `consultation`
--

CREATE TABLE `consultation` (
  `id` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `json` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `consultation`
--

INSERT INTO `consultation` (`id`, `login`, `json`, `date`) VALUES
(1, 'root', '[{"id":"2","0":"2","libelle":"Fraise 1kg","1":"Fraise 1kg","prix":"10","2":"10","quantite":"10","3":"10","photo":"","4":"","description":"Fraise Origine Espagne","5":"Fraise Origine Espagne","tva":"20%","6":"20%","login":"root","7":"root"},{"id":"3","0":"3","libelle":"Abricot 2 kg","1":"Abricot 2 kg","prix":"15","2":"15","quantite":"2","3":"2","photo":"","4":"","description":"Abricot bio origine espagne","5":"Abricot bio origine espagne","tva":"20%","6":"20%","login":"","7":""},{"id":"4","0":"4","libelle":"Abricot 5 kg","1":"Abricot 5 kg","prix":"30","2":"30","quantite":"2","3":"2","photo":"","4":"","description":"","5":"","tva":"20%","6":"20%","login":"root","7":"root"}]', '0000-00-00'),
(2, 'root', '[{"id":"2","0":"2","libelle":"Fraise 1kg","1":"Fraise 1kg","prix":"10","2":"10","quantite":"10","3":"10","photo":"","4":"","description":"Fraise Origine Espagne","5":"Fraise Origine Espagne","tva":"20%","6":"20%","login":"root","7":"root"},{"id":"3","0":"3","libelle":"Abricot 2 kg","1":"Abricot 2 kg","prix":"15","2":"15","quantite":"2","3":"2","photo":"","4":"","description":"Abricot bio origine espagne","5":"Abricot bio origine espagne","tva":"20%","6":"20%","login":"","7":""},{"id":"4","0":"4","libelle":"Abricot 5 kg","1":"Abricot 5 kg","prix":"30","2":"30","quantite":"2","3":"2","photo":"","4":"","description":"","5":"","tva":"20%","6":"20%","login":"root","7":"root"}]', '0000-00-00'),
(3, 'root', '[{"id":"2","0":"2","libelle":"Fraise 1kg","1":"Fraise 1kg","prix":"10","2":"10","quantite":"10","3":"10","photo":"","4":"","description":"Fraise Origine Espagne","5":"Fraise Origine Espagne","tva":"20%","6":"20%","login":"root","7":"root"},{"id":"3","0":"3","libelle":"Abricot 2 kg","1":"Abricot 2 kg","prix":"15","2":"15","quantite":"2","3":"2","photo":"","4":"","description":"Abricot bio origine espagne","5":"Abricot bio origine espagne","tva":"20%","6":"20%","login":"","7":""},{"id":"4","0":"4","libelle":"Abricot 5 kg","1":"Abricot 5 kg","prix":"30","2":"30","quantite":"2","3":"2","photo":"","4":"","description":"","5":"","tva":"20%","6":"20%","login":"root","7":"root"}]', '2017-04-29');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id` int(11) NOT NULL,
  `libelle` varchar(50) NOT NULL,
  `prix` double NOT NULL,
  `quantite` int(11) DEFAULT NULL,
  `photo` varchar(250) DEFAULT NULL,
  `description` text,
  `tva` varchar(4) NOT NULL,
  `login` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`id`, `libelle`, `prix`, `quantite`, `photo`, `description`, `tva`, `login`) VALUES
(2, 'Fraise 1kg', 10, 10, '', 'Fraise Origine Espagne', '20%', 'root'),
(3, 'Abricot 2 kg', 15, 2, '', 'Abricot bio origine espagne', '20%', ''),
(4, 'Abricot 5 kg', 30, 2, '', '', '20%', 'root');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `login` varchar(20) NOT NULL,
  `mdp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`login`, `mdp`) VALUES
('rmef', 'test'),
('root', 'root');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `consultation`
--
ALTER TABLE `consultation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`login`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `consultation`
--
ALTER TABLE `consultation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;