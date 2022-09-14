-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2021 at 06:30 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestion_cours`
--

-- --------------------------------------------------------

--
-- Table structure for table `adheren`
--

CREATE TABLE `adheren` (
  `id` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ville` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `adheren`
--

INSERT INTO `adheren` (`id`, `email`, `prenom`, `nom`, `ville`) VALUES
(3, 'helmi.br1999@gmail.com', 'helmi', 'ben romdhane', 'nabeul'),
(5, 'youssefbouguerba@gmail.com', 'youssef', 'bouguerba', 'jerjis'),
(6, 'choaut@gmail.com', 'ghassen', 'chouat', 'nabeul');

-- --------------------------------------------------------

--
-- Table structure for table `clubs`
--

CREATE TABLE `clubs` (
  `id` int(11) NOT NULL,
  `clubname` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `clubmail` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `clubnumber` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `clubadresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clubs`
--

INSERT INTO `clubs` (`id`, `clubname`, `clubmail`, `clubnumber`, `clubadresse`, `logo`, `description`) VALUES
(1, 'DEEP WATER', 'deepwater.surf@gmail.com', '23 486 582', 'dar chaaben el fehri\r\n, nahj monsof bey, \r\n8011 Nabeul, Tunisia', 'http://localhost/mini-project/images/c1.png', 'The Surf Club \"DEEP WATER\" is one of the oldest Surf Life Saving Clubs in Tunisia. Established in 1922. it has grown to become one of the premier Surf Lifesaving Clubs in Tunisia.\r\nThe Surf Club \"DEEP WATER\". rich in club history.'),
(2, 'HURRICANE-STAND', 'hurricanstand.surf@gmail.com', '23 486 582', 'dar chaaben el fehri\r\n, nahj monsof bey, \r\n8011 Nabeul, Tunisia', 'http://localhost/mini-project/images/c4.png', 'The Surf Club \"HURRICANE-STAND\" is one of the oldest Surf Life Saving Clubs in Tunisia. Established in 1922. it has grown to become one of the premier Surf Lifesaving Clubs in Tunisia.\r\nThe Surf Club \"HURRICANE-STAND\". rich in club history.'),
(3, 'REEF RIDERS', 'reefriders.surf@gmail.com', '23 486 582', 'dar chaaben el fehri\r\n, nahj monsof bey, \r\n8011 Nabeul, Tunisia', 'http://localhost/mini-project/images/c6.png', 'The Surf Club \"REEF RIDERS\" is one of the oldest Surf Life Saving Clubs in Tunisia. Established in 1922. it has grown to become one of the premier Surf Lifesaving Clubs in Tunisia.\r\nThe Surf Club \"REEF RIDERS\". rich in club history.'),
(4, 'SURF-TECH', 'surftech.surf@gmail.com', '23 486 582', 'dar chaaben el fehri\r\n, nahj monsof bey, \r\n8011 Nabeul, Tunisia', 'http://localhost/mini-project/images/c5.png', 'The Surf Club \"SURF-TECH\" is one of the oldest Surf Life Saving Clubs in Tunisia. Established in 1922. it has grown to become one of the premier Surf Lifesaving Clubs in Tunisia.\r\nThe Surf Club \"SURF-TECH\". rich in club history.'),
(5, 'TITANIUM', 'titanium.surf@gmail.com', '23 486 582', 'dar chaaben el fehri\r\n, nahj monsof bey, \r\n8011 Nabeul, Tunisia', 'http://localhost/mini-project/images/c3.png', 'The Surf Club \"TITANIUM\" is one of the oldest Surf Life Saving Clubs in Tunisia. Established in 1922. it has grown to become one of the premier Surf Lifesaving Clubs in Tunisia.\r\nThe Surf Club \"TITANIUM\". rich in club history.'),
(6, 'TIDES & VIBES', 'tidenvibe.surf@gmail.com', '23 486 582', 'dar chaaben el fehri\r\n, nahj monsof bey, \r\n8011 Nabeul, Tunisia', 'http://localhost/mini-project/images/c2.png', 'The Surf Club \"TIDES & VIBES\" is one of the oldest Surf Life Saving Clubs in Tunisia. Established in 1922. it has grown to become one of the premier Surf Lifesaving Clubs in Tunisia.\r\nThe Surf Club \"TIDES & VIBES\". rich in club history.');

-- --------------------------------------------------------

--
-- Table structure for table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20210512233431', '2021-05-13 01:35:18', 1061),
('DoctrineMigrations\\Version20210513010649', '2021-05-13 03:08:42', 827),
('DoctrineMigrations\\Version20210513012419', '2021-05-13 03:24:39', 3912),
('DoctrineMigrations\\Version20210513012941', '2021-05-13 03:29:48', 348),
('DoctrineMigrations\\Version20210526105930', '2021-05-26 12:59:45', 3944),
('DoctrineMigrations\\Version20210528214209', '2021-05-28 23:42:39', 1553),
('DoctrineMigrations\\Version20210529175046', '2021-05-29 19:51:01', 1133),
('DoctrineMigrations\\Version20210531194704', '2021-05-31 21:48:11', 1234),
('DoctrineMigrations\\Version20210601140920', '2021-06-01 16:09:36', 1200);

-- --------------------------------------------------------

--
-- Table structure for table `moniteur`
--

CREATE TABLE `moniteur` (
  `id` int(11) NOT NULL,
  `prenom` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `moniteur`
--

INSERT INTO `moniteur` (`id`, `prenom`, `nom`) VALUES
(3, 'heimer', 'dinger');

-- --------------------------------------------------------

--
-- Table structure for table `myclub`
--

CREATE TABLE `myclub` (
  `id` int(11) NOT NULL,
  `mail` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `clubname` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seances`
--

CREATE TABLE `seances` (
  `id` int(11) NOT NULL,
  `idm` int(11) NOT NULL,
  `ida` int(11) NOT NULL,
  `date` date NOT NULL,
  `heure` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nbheure` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seances`
--

INSERT INTO `seances` (`id`, `idm`, `ida`, `date`, `heure`, `nbheure`) VALUES
(7, 3, 3, '2021-06-09', '5', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `lastname`) VALUES
(1, 'helmi.br1999@gmail.com', '[]', '$argon2id$v=19$m=65536,t=4,p=1$U0tLRk9zNzVaMGMwNjhMeQ$w2vb7byt2hhW36/rnhpMo5eD/YVT5oh62qzV5cXPnH4', 'helmi ben romdhane');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adheren`
--
ALTER TABLE `adheren`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `moniteur`
--
ALTER TABLE `moniteur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `myclub`
--
ALTER TABLE `myclub`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seances`
--
ALTER TABLE `seances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adheren`
--
ALTER TABLE `adheren`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `clubs`
--
ALTER TABLE `clubs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `moniteur`
--
ALTER TABLE `moniteur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `myclub`
--
ALTER TABLE `myclub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seances`
--
ALTER TABLE `seances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
