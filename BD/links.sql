-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2019 at 02:28 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `links`
--

-- --------------------------------------------------------

--
-- Table structure for table `langue`
--

CREATE TABLE `langue` (
  `id` int(11) NOT NULL,
  `Langue` varchar(25) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `langue`
--

INSERT INTO `langue` (`id`, `Langue`) VALUES
(1, 'EN');

-- --------------------------------------------------------

--
-- Table structure for table `lien`
--

CREATE TABLE `lien` (
  `id` int(11) NOT NULL,
  `lien` text COLLATE utf8_bin NOT NULL,
  `description` varchar(300) COLLATE utf8_bin NOT NULL,
  `idLangue` int(11) NOT NULL,
  `idNiveau` int(11) NOT NULL,
  `idSousMatiere` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `lien`
--

INSERT INTO `lien` (`id`, `lien`, `description`, `idLangue`, `idNiveau`, `idSousMatiere`) VALUES
(1, 'https://css-tricks.com/snippets/css/a-guide-to-flexbox/', 'This complete guide explains everything about flexbox, focusing on all the different possible properties ', 1, 1, 4),
(2, 'https://flexboxfroggy.com/', 'Welcome to Flexbox Froggy, a game where you help Froggy and friends by writing CSS code! ', 1, 1, 4),
(4, 'https://www.w3schools.com/js/js_events.asp', 'An HTML event can be something the browser does, or something a user does.', 1, 1, 5),
(5, 'https://www.youtube.com/watch?v=OK_JCtrrv-c', 'PHP Programming Language Tutorial - Full Course', 1, 1, 7),
(28, 'https://www.tutorialspoint.com/unity/index.htm', 'This tutorial is designed for those who find the world of gaming exciting and creative.', 1, 1, 21),
(32, 'https://www.w3schools.com/html/html_tables.asp', 'pas mal, simple', 1, 1, 24),
(33, 'https://www.freecodecamp.org/news/best-python-tutorial/', 'les bases', 1, 1, 25);

-- --------------------------------------------------------

--
-- Table structure for table `matiere`
--

CREATE TABLE `matiere` (
  `id` int(11) NOT NULL,
  `Matiere` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `matiere`
--

INSERT INTO `matiere` (`id`, `Matiere`) VALUES
(6, 'C#'),
(4, 'CSS3'),
(3, 'HTML5'),
(2, 'JavaScript'),
(1, 'PHP'),
(5, 'Python'),
(7, 'Unity');

-- --------------------------------------------------------

--
-- Table structure for table `niveau`
--

CREATE TABLE `niveau` (
  `id` int(11) NOT NULL,
  `Niveau` varchar(25) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `niveau`
--

INSERT INTO `niveau` (`id`, `Niveau`) VALUES
(1, 'Debutant');

-- --------------------------------------------------------

--
-- Table structure for table `sousmatier`
--

CREATE TABLE `sousmatier` (
  `id` int(11) NOT NULL,
  `sousmatier` varchar(100) COLLATE utf8_bin NOT NULL,
  `idMatiere` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `sousmatier`
--

INSERT INTO `sousmatier` (`id`, `sousmatier`, `idMatiere`) VALUES
(3, 'grid', 4),
(4, 'flexbox', 4),
(5, 'event', 2),
(6, 'class', 5),
(7, 'formulaire', 1),
(8, 'email', 2),
(9, 'general', 5),
(21, '2Dgame', 7),
(22, 'délégué', 6),
(24, 'table', 3),
(25, 'introduction', 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` varchar(15) COLLATE utf8_bin NOT NULL,
  `email` varchar(25) COLLATE utf8_bin NOT NULL,
  `pass` varchar(250) COLLATE utf8_bin NOT NULL,
  `foto` varchar(256) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nom`, `email`, `pass`, `foto`) VALUES
(1, 'Anna', 'anna.laskowska@hotmail.co', 'qwerty', '5ddfa980c1d592019-11-28-12-03-28dalmatyńczyk.png'),
(2, 'aurelie', 'aurelie@hotmail.com', 'azerty', '5ddfba005ac4b2019-11-28-01-13-52banner-bg.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `langue`
--
ALTER TABLE `langue`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Langue` (`Langue`);

--
-- Indexes for table `lien`
--
ALTER TABLE `lien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idLangue` (`idLangue`),
  ADD KEY `idNiveau` (`idNiveau`),
  ADD KEY `idSousMatiere` (`idSousMatiere`);

--
-- Indexes for table `matiere`
--
ALTER TABLE `matiere`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Matiere` (`Matiere`);

--
-- Indexes for table `niveau`
--
ALTER TABLE `niveau`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Niveau` (`Niveau`);

--
-- Indexes for table `sousmatier`
--
ALTER TABLE `sousmatier`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idMatiere` (`idMatiere`),
  ADD KEY `sousmatier` (`sousmatier`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `langue`
--
ALTER TABLE `langue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lien`
--
ALTER TABLE `lien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `matiere`
--
ALTER TABLE `matiere`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `niveau`
--
ALTER TABLE `niveau`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sousmatier`
--
ALTER TABLE `sousmatier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lien`
--
ALTER TABLE `lien`
  ADD CONSTRAINT `lien_ibfk_1` FOREIGN KEY (`idNiveau`) REFERENCES `niveau` (`id`),
  ADD CONSTRAINT `lien_ibfk_2` FOREIGN KEY (`idLangue`) REFERENCES `langue` (`id`),
  ADD CONSTRAINT `lien_ibfk_3` FOREIGN KEY (`idSousMatiere`) REFERENCES `sousmatier` (`id`);

--
-- Constraints for table `sousmatier`
--
ALTER TABLE `sousmatier`
  ADD CONSTRAINT `sousmatier_ibfk_1` FOREIGN KEY (`idMatiere`) REFERENCES `matiere` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
