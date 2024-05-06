-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2024 at 02:48 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stage`
--
CREATE Database stage;
use stage;
-- --------------------------------------------------------

--
-- Table structure for table `affecter`
--

CREATE TABLE `affecter` (
  `idaff` int(12) NOT NULL,
  `datedebut` date NOT NULL,
  `datefin` date NOT NULL,
  `idst` int(33) NOT NULL,
  `idser` int(22) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `affecter`
--

INSERT INTO `affecter` (`idaff`, `datedebut`, `datefin`, `idst`, `idser`) VALUES
(1, '2023-01-30', '2023-02-05', 1, 2),
(2, '2023-02-03', '2023-01-23', 2, 2),
(3, '2023-02-15', '2023-02-02', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `agentmsg`
--

CREATE TABLE `agentmsg` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `entreprise`
--

CREATE TABLE `entreprise` (
  `identre` int(11) NOT NULL,
  `nomentre` varchar(23) NOT NULL,
  `fonction` varchar(14) NOT NULL,
  `idser` int(22) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `entreprise`
--

INSERT INTO `entreprise` (`identre`, `nomentre`, `fonction`, `idser`) VALUES
(1, 'bbci', 'commerce', 2);

-- --------------------------------------------------------

--
-- Table structure for table `etablissement`
--

CREATE TABLE `etablissement` (
  `ideta` int(11) NOT NULL,
  `nometa` varchar(11) NOT NULL,
  `adressetat` varchar(132) NOT NULL,
  `idfil` int(11) NOT NULL,
  `emaileta` varchar(22) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `etablissement`
--

INSERT INTO `etablissement` (`ideta`, `nometa`, `adressetat`, `idfil`, `emaileta`) VALUES
(4, 'hope', '', 2, 'kigobe@gmail.com'),
(2, 'ult', 'kigobe', 1, 'kigobe@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `filiere`
--

CREATE TABLE `filiere` (
  `idfil` int(11) NOT NULL,
  `nomfil` varchar(19) NOT NULL,
  `idst` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `filiere`
--

INSERT INTO `filiere` (`idfil`, `nomfil`, `idst`) VALUES
(1, 'informatique', 1),
(2, 'securite', 2),
(3, 'Finance', 2);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `id_expediteur` int(11) NOT NULL,
  `id_destinataire` int(11) NOT NULL,
  `contenu` text NOT NULL,
  `date_message` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `id_expediteur`, `id_destinataire`, `contenu`, `date_message`) VALUES
(1, 3, 5, 'bjr boss', '2023-01-23 10:28:41'),
(2, 3, 6, 'hi\r\n', '2023-01-23 10:29:41'),
(3, 3, 2, 'bjr mrs cv\r\n', '2023-01-23 22:13:58'),
(4, 3, 2, 'uko bien', '2023-01-23 22:27:31'),
(5, 7, 3, 'salut chef\r\n', '2023-01-23 23:21:50'),
(6, 3, 7, 'slt cv et vs\r\n', '2023-01-23 23:23:10'),
(7, 7, 3, 'oui cv vrt', '2023-01-23 23:23:25');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `idser` int(11) NOT NULL,
  `typeser` varchar(21) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`idser`, `typeser`) VALUES
(1, 'comptabilite'),
(2, 'maintenance'),
(3, 'acceuil');

-- --------------------------------------------------------

--
-- Table structure for table `stagiaire`
--

CREATE TABLE `stagiaire` (
  `idst` int(11) NOT NULL,
  `nomst` varchar(32) NOT NULL,
  `prenomst` varchar(20) NOT NULL,
  `emailst` varchar(14) NOT NULL,
  `nationalite` varchar(21) NOT NULL,
  `sexe` varchar(9) NOT NULL,
  `telephone` varchar(22) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stagiaire`
--

INSERT INTO `stagiaire` (`idst`, `nomst`, `prenomst`, `emailst`, `nationalite`, `sexe`, `telephone`, `photo`) VALUES
(1, 'ilunga', 'ngoy', 'F', 'ilunga@gmail.com', 'Burundi', '65487922', 'shalom.png'),
(2, 'aza', 'mahamudu', 'F', 'aza@gmail.com', 'Rwanda', '612439865', 'rea.jpg'),
(4, 'cedi', 'bayubahe', 'M', 'cedric@gmail.com', 'Burundi', '649387089', 'ase.png'),
(5, 'area', 'porte', 'F', 'real@gmail.com', 'Rwanda', '563789023', '2023.jpg'),
(6, 'ugl', 'mamy', 'F', 'frearo@gmail.com', 'Tanzanie', '76787678', 'mlgklt.webp');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `iduser` int(4) NOT NULL,
  `login` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `etat` int(1) DEFAULT NULL,
  `pwd` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`iduser`, `login`, `email`, `role`, `etat`, `pwd`) VALUES
(12, 'paci', 'unc.prrpb@gmail.com', 'ADMIN', 1, '81dc9bdb52d04dc20036dbd8313ed055'),
(11, 'claude', 'claudembonimpa@gmail.com', 'user', 0, 'b2d7edd1e671526e66decba802095f4d'),
(10, 'grange', 'grangeirankunda@gmail.com', 'user', 0, '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `affecter`
--
ALTER TABLE `affecter`
  ADD PRIMARY KEY (`idaff`),
  ADD KEY `idser` (`idser`),
  ADD KEY `idst` (`idst`);

--
-- Indexes for table `agentmsg`
--
ALTER TABLE `agentmsg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `entreprise`
--
ALTER TABLE `entreprise`
  ADD PRIMARY KEY (`identre`),
  ADD KEY `idser` (`idser`);

--
-- Indexes for table `etablissement`
--
ALTER TABLE `etablissement`
  ADD PRIMARY KEY (`ideta`),
  ADD KEY `idfil` (`idfil`);

--
-- Indexes for table `filiere`
--
ALTER TABLE `filiere`
  ADD PRIMARY KEY (`idfil`),
  ADD KEY `idst` (`idst`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`idser`);

--
-- Indexes for table `stagiaire`
--
ALTER TABLE `stagiaire`
  ADD PRIMARY KEY (`idst`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `affecter`
--
ALTER TABLE `affecter`
  MODIFY `idaff` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `agentmsg`
--
ALTER TABLE `agentmsg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `entreprise`
--
ALTER TABLE `entreprise`
  MODIFY `identre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `etablissement`
--
ALTER TABLE `etablissement`
  MODIFY `ideta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `filiere`
--
ALTER TABLE `filiere`
  MODIFY `idfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `idser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stagiaire`
--
ALTER TABLE `stagiaire`
  MODIFY `idst` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `iduser` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
