-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 08, 2022 at 03:58 PM
-- Server version: 5.7.34
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ProjetWEB`
--

-- --------------------------------------------------------

--
-- Table structure for table `picture`
--

CREATE TABLE `picture` (
  `pic_id` int(50) NOT NULL,
  `pic_name` varchar(100) DEFAULT NULL,
  `pic_date` date DEFAULT NULL,
  `pic_comment` text,
  `pic_user` varchar(50) DEFAULT NULL,
  `pic_place` varchar(50) DEFAULT NULL,
  `pic_type` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `picture`
--

INSERT INTO `picture` (`pic_id`, `pic_name`, `pic_date`, `pic_comment`, `pic_user`, `pic_place`, `pic_type`) VALUES
(1, 'Noël au Zytho', '2021-12-10', 'En bombe pour cette journée spéciale', 'zorzor', 'MI - ISEN LILLE', 'jpg'),
(2, 'Les CIR1 à la Roypta', '2022-04-04', 'Merci au BDE @Monarch\'ISEN pour cette très belle soirée !!', 'Anya_ll', 'Roy\'pta', 'jpg'),
(3, 'Défi Nisendo', '2022-04-06', 'Défi Nisendo : Prendre la photo la plus originale devant le mur. Merci @SurimISEN pour cette très belle collab', 'benji_66', 'PDD', 'jpg'),
(4, 'On the Throne', '2022-04-04', 'Super belle soirée :))', 'alex_fb', 'Roy\'pta', 'jpg'),
(5, 'Petite sieste de Louis', '2022-03-25', 'Le p\'tit Louis pris en flagrant délit lors du dernier Zytho !', 'Scottez_dady', 'MI - ISEN LILLE', 'jpg'),
(6, 'Salut toi !', '2022-03-03', 'Hier je suis tombée sous le charme de Jacqueline, fonctionnaire de 3000 ans', 'zorzor', 'Pont Napoléon - Lille', 'jpg'),
(7, 'Zytho entre profs', '2022-03-16', 'Merci aux photographes de @ink_isen pour ce très beau cliché avec Mr Mele', 'Scottez_dady', 'Zytho ISEN', 'jpg'),
(8, 'Bellewaerd', '2022-04-02', 'Super journée avec Benjamin, Adeline et les parrains !!', 'alex_fb', 'Bellewaerd - Belgique', 'jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(25) NOT NULL,
  `pseudo_profil` varchar(100) DEFAULT NULL,
  `email_profil` varchar(250) DEFAULT NULL,
  `mdp_profil` varchar(100) DEFAULT NULL,
  `nom_user` varchar(100) DEFAULT NULL,
  `prenom_user` varchar(100) DEFAULT NULL,
  `gender_user` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `pseudo_profil`, `email_profil`, `mdp_profil`, `nom_user`, `prenom_user`, `gender_user`) VALUES
(1, 'alex_fb', 'alex@gmail.com', 'Alexou2004', 'Facon-Bocquet', 'Alexandre', 'Homme'),
(2, 'zorzor', 'isaure@free.fr', 'Isaure2003', 'Vico', 'Isaure', 'Femme'),
(3, 'Scottez_dady', 'Vivien.scottez@isen.com', 'Physique4ever', 'Scottez', 'Vivien', 'Homme'),
(4, 'benji_66', 'benji@gmail.com', 'leDaron1', 'Soulas', 'Benjamin', 'Homme'),
(5, 'Anya_ll', 'anya@hotmail.com', 'Anya2003', 'Lallart', 'Anya', 'Femme');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `picture`
--
ALTER TABLE `picture`
  ADD PRIMARY KEY (`pic_id`),
  ADD UNIQUE KEY `pic_name_2` (`pic_name`),
  ADD KEY `pic_name` (`pic_name`),
  ADD KEY `pic_user` (`pic_user`),
  ADD KEY `pic_name_4` (`pic_name`);
ALTER TABLE `picture` ADD FULLTEXT KEY `pic_name_3` (`pic_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pseudo_profil` (`pseudo_profil`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `picture`
--
ALTER TABLE `picture`
  MODIFY `pic_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `picture`
--
ALTER TABLE `picture`
  ADD CONSTRAINT `picture_ibfk_1` FOREIGN KEY (`pic_user`) REFERENCES `users` (`pseudo_profil`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
