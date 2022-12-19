-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 19 déc. 2022 à 19:45
-- Version du serveur :  10.3.37-MariaDB-log-cll-lve
-- Version de PHP : 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `c1954440c_anoperdb`
--

-- --------------------------------------------------------

--
-- Structure de la table `arrondissements`
--

CREATE TABLE `arrondissements` (
  `idArrondissements` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `FkCommunes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `arrondissements`
--

INSERT INTO `arrondissements` (`idArrondissements`, `name`, `FkCommunes`) VALUES
(1, 'Banikoara', 1),
(2, 'Founougo', 1),
(3, 'Toura', 1),
(4, 'Soroko', 1),
(5, 'Somp&eacute;r&eacute;kou', 1),
(6, 'Ounet', 1),
(7, 'Kokiborou', 1),
(8, 'Kokey', 1),
(12, 'Goumori', 1),
(13, 'Gomparou', 1),
(14, 'Gogounou', 2),
(15, 'Bagou', 2),
(16, 'Gounarou', 2),
(17, 'Copargo', 8);

-- --------------------------------------------------------

--
-- Structure de la table `communes`
--

CREATE TABLE `communes` (
  `idCommunes` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `FkDepartements` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `communes`
--

INSERT INTO `communes` (`idCommunes`, `name`, `FkDepartements`) VALUES
(1, 'Banikoara', 1),
(2, 'Gogounou', 1),
(3, 'Kandi', 1),
(4, 'Karimama', 1),
(5, 'Malanville', 1),
(6, 'Segbana', 1),
(7, 'Bassila', 2),
(8, 'Copargo', 2),
(9, 'Djougou', 2),
(10, 'Ouaké', 2),
(11, 'Bembéréké', 3),
(12, 'Kalalé', 3),
(13, 'N\'Dali', 3),
(14, 'Nikki', 3),
(15, 'Parakou', 3),
(16, 'Pèrèrè', 3),
(17, 'Sinendé', 3),
(18, 'Tchaourou', 3),
(19, 'Bantè\r\n', 4),
(20, 'Dassa-Zoumè\r\n', 4),
(21, 'Glazoué\r\n', 4),
(22, 'Ouèssè\r\n', 4),
(23, 'Savalou\r\n', 4),
(24, 'Savè', 4),
(25, 'Boukoumbé\r\n', 5),
(26, 'Cobly\r\n', 5),
(27, 'Kérou\r\n', 5),
(28, 'Kouandé\r\n', 5),
(29, 'Matéri\r\n', 5),
(30, 'Natitingou\r\n', 5),
(31, 'Péhunco\r\n', 5),
(32, 'Tanguiéta\r\n', 5),
(33, 'Toucountouna', 5),
(34, 'Abomey', 6),
(35, 'Agbangnizoun\r\n', 6),
(36, 'Bohicon', 6),
(37, 'Covè', 6),
(38, 'Djidja', 6),
(39, 'Ouinhi', 6),
(40, 'Zagnanado', 6),
(41, 'Za-Kpota', 6),
(42, 'Zogbodomey', 6),
(43, 'Aplahoué', 7),
(44, 'Djakotomey', 7),
(45, 'Dogbo-Tota', 7),
(46, 'Klouékanmè', 7),
(47, 'Lalo', 7),
(48, 'Toviklin', 7),
(49, 'Athiémé\r\n', 8),
(50, 'Bopa', 8),
(51, 'Comè', 8),
(52, 'Grand-Popo', 8),
(53, 'Houéyogbé', 8),
(54, 'Lokossa', 8),
(55, 'Adja-Ouèrè', 9),
(56, 'Ifangni', 9),
(57, 'Kétou', 9),
(58, 'Pobè\r\n', 9),
(59, 'Sakété', 9),
(60, 'Cotonou', 10),
(61, 'Abomey-Calavi', 11),
(62, 'Allada', 11),
(63, 'Kpomassè', 11),
(64, 'Ouidah', 11),
(65, 'Sô-Ava', 11),
(66, 'Toffo', 11),
(67, 'Tori-Bossito', 11),
(68, 'Zè', 11),
(69, 'Adjarra', 12),
(70, 'Adjohoun', 12),
(71, 'Aguégués', 12),
(72, 'Akpro-Missérété', 12),
(73, 'Avrankou', 12),
(74, 'Bonou', 12),
(75, 'Dangbo', 12),
(76, 'Porto-Novo', 12),
(77, 'Sèmè-Kpodji', 12);

-- --------------------------------------------------------

--
-- Structure de la table `datas`
--

CREATE TABLE `datas` (
  `id` int(11) NOT NULL,
  `dateAdhesion` date DEFAULT NULL,
  `dateEnregistrement` date DEFAULT NULL,
  `departement` varchar(255) DEFAULT NULL,
  `udoper` varchar(255) NOT NULL,
  `commune` varchar(255) DEFAULT NULL,
  `arrondissement` varchar(255) DEFAULT NULL,
  `village` varchar(255) DEFAULT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `dateNaissance` date DEFAULT NULL,
  `lieuNaissance` varchar(255) DEFAULT NULL,
  `sexe` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `idcard` varchar(255) DEFAULT NULL,
  `numeroPiece` varchar(255) DEFAULT NULL,
  `dateExp` date DEFAULT NULL,
  `qrcodepath` varchar(255) DEFAULT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `idPicsPath` varchar(255) DEFAULT NULL,
  `cardNumber` varchar(255) DEFAULT NULL,
  `ovins` int(11) NOT NULL,
  `bovins` int(11) NOT NULL,
  `caprins` int(11) NOT NULL,
  `signaturePath` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `datas`
--

INSERT INTO `datas` (`id`, `dateAdhesion`, `dateEnregistrement`, `departement`, `udoper`, `commune`, `arrondissement`, `village`, `nom`, `prenom`, `dateNaissance`, `lieuNaissance`, `sexe`, `tel`, `idcard`, `numeroPiece`, `dateExp`, `qrcodepath`, `datetime`, `idPicsPath`, `cardNumber`, `ovins`, `bovins`, `caprins`, `signaturePath`) VALUES
(1, '1979-03-10', '2022-12-04', '5', '2', '42', '2', 'Cum ducimus volupta', 'Enim totam rerum por', 'Beatae voluptas inci', '2022-02-19', 'Cupidatat qui commod', 'M', '+1 (123) 437-5661', 'PermisDeConduire', 'Est veniam ex est l', '2018-07-29', 'images/1670163518.png', '2022-12-04 15:18:38', 'identitypics/2022-12-04 14:18:38ee_id_card_40x50mm.jpeg', '12901726', 46, 26, 92, 'images/2022-12-04 14:18:38BURNIN.png'),
(2, '1988-01-14', '2022-12-05', '11', '1', '68', '6', 'Ullamco voluptas inc', 'Quis anim commodo su', 'Temporibus ut ea eiu', '1994-08-15', 'Cumque alias sapient', 'F', '+1 (135) 896-2743', 'PermisDeConduire', 'Est quibusdam proid', '2004-11-18', 'images/1670247907.png', '2022-12-05 14:45:07', 'identitypics/2022-12-05 13:45:07ee_id_card_40x50mm.jpeg', '42742583', 81, 70, 82, 'images/2022-12-05 13:45:07benin-flag-xs.png'),
(3, '2018-06-14', NULL, '2', '2', '8', '17', 'Yabaga', 'MATCHI', 'Ali', '2000-01-01', 'P&eacute;hunco', 'M', '61858675', 'LEPI', '0725100', '2021-01-31', 'images/1670408276.png', '2022-12-07 11:17:56', 'identitypics/2022-12-07 11:17:56BASSAMBO Garba.jpg', '37438861', 3, 14, 0, 'images/2022-12-07 11:17:56Arrière plan 1.jpg'),
(4, '2018-06-14', NULL, '2', '2', '8', '17', 'Yabaga', 'MATCHI', 'Ali', '2000-01-01', 'P&eacute;hunco', 'M', '61858675', 'LEPI', '0725100', '2021-01-31', 'images/1670408666.png', '2022-12-07 11:24:26', 'identitypics/2022-12-07 11:24:2616704085780936408436505988339667.jpg', '87151107', 3, 14, 0, 'images/2022-12-07 11:24:2616704086238276990750598469413830.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `departements`
--

CREATE TABLE `departements` (
  `idDepartements` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `departements`
--

INSERT INTO `departements` (`idDepartements`, `name`) VALUES
(1, 'Alibori'),
(2, 'Donga'),
(3, 'Borgou'),
(4, 'Collines'),
(5, 'Atacora'),
(6, 'Zou'),
(7, 'Couffo'),
(8, 'Mono'),
(9, 'Plateau'),
(10, 'Littoral'),
(11, 'Atlantique'),
(12, 'Ouémé');

-- --------------------------------------------------------

--
-- Structure de la table `udopers`
--

CREATE TABLE `udopers` (
  `idUdopers` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `udopers`
--

INSERT INTO `udopers` (`idUdopers`, `name`) VALUES
(1, 'Borgou Alibori'),
(2, 'Atacora Donga'),
(3, 'Zou Collines'),
(4, 'Mono Couffo'),
(5, 'Atlantique'),
(6, 'Autres');

-- --------------------------------------------------------

--
-- Structure de la table `villages`
--

CREATE TABLE `villages` (
  `idVillage` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `FkArrondissements` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `arrondissements`
--
ALTER TABLE `arrondissements`
  ADD PRIMARY KEY (`idArrondissements`);

--
-- Index pour la table `communes`
--
ALTER TABLE `communes`
  ADD PRIMARY KEY (`idCommunes`);

--
-- Index pour la table `datas`
--
ALTER TABLE `datas`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `departements`
--
ALTER TABLE `departements`
  ADD PRIMARY KEY (`idDepartements`);

--
-- Index pour la table `udopers`
--
ALTER TABLE `udopers`
  ADD PRIMARY KEY (`idUdopers`);

--
-- Index pour la table `villages`
--
ALTER TABLE `villages`
  ADD PRIMARY KEY (`idVillage`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `arrondissements`
--
ALTER TABLE `arrondissements`
  MODIFY `idArrondissements` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `communes`
--
ALTER TABLE `communes`
  MODIFY `idCommunes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT pour la table `datas`
--
ALTER TABLE `datas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `departements`
--
ALTER TABLE `departements`
  MODIFY `idDepartements` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `udopers`
--
ALTER TABLE `udopers`
  MODIFY `idUdopers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `villages`
--
ALTER TABLE `villages`
  MODIFY `idVillage` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
