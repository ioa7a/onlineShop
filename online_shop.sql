-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Gazdă: localhost:8090
-- Timp de generare: ian. 12, 2020 la 01:57 PM
-- Versiune server: 10.4.10-MariaDB
-- Versiune PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `online_shop`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `categorie_obiecte`
--

CREATE TABLE `categorie_obiecte` (
  `idCategorie` int(11) NOT NULL,
  `Nume` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `categorie_obiecte`
--

INSERT INTO `categorie_obiecte` (`idCategorie`, `Nume`) VALUES
(1, 'Men\'s clothing'),
(2, 'Women\'s clothing'),
(3, 'Children\'s clothing'),
(4, 'Patchuri'),
(5, 'CD'),
(6, 'Vinyl'),
(7, 'DVD'),
(8, 'BLU-RAY'),
(9, 'Accesorii'),
(10, 'Other products');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `cumparaturi`
--

CREATE TABLE `cumparaturi` (
  `idCumparaturi` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `idProdus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `cumparaturi`
--

INSERT INTO `cumparaturi` (`idCumparaturi`, `username`, `idProdus`) VALUES
(1, 'Ioana', 10),
(2, 'Ioana', 2),
(3, 'default', 6),
(4, 'hello', 4);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `favorite`
--

CREATE TABLE `favorite` (
  `idFavorite` int(11) NOT NULL,
  `idProdus` int(11) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `favorite`
--

INSERT INTO `favorite` (`idFavorite`, `idProdus`, `username`) VALUES
(1, 16, 'Ioana'),
(2, 14, 'Ioana'),
(3, 2, 'Ioana'),
(4, 18, 'Ioana'),
(5, 11, 'test'),
(6, 10, 'test'),
(7, 4, 'hello'),
(8, 16, 'hello');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `login_info`
--

CREATE TABLE `login_info` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `login_info`
--

INSERT INTO `login_info` (`username`, `password`) VALUES
('default', '5f4dcc3b5aa765d61d8327deb882cf99'),
('hello', '69faab6268350295550de7d587bc323d'),
('Ioana', '5d41402abc4b2a76b9719d911017c592'),
('test', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `produs`
--

CREATE TABLE `produs` (
  `idProdus` int(11) NOT NULL,
  `idCategorie` int(11) NOT NULL,
  `Nume` varchar(70) NOT NULL,
  `Descriere` varchar(200) NOT NULL,
  `Pret` float NOT NULL,
  `DetaliiLivrare` varchar(100) NOT NULL,
  `numeImagine` varchar(100) NOT NULL DEFAULT 'noImage.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `produs`
--

INSERT INTO `produs` (`idProdus`, `idCategorie`, `Nume`, `Descriere`, `Pret`, `DetaliiLivrare`, `numeImagine`) VALUES
(1, 5, 'Metallica - Master Of Puppets', 'Contine: 1 CD\r\nPiese: 8\r\nAnul: 1986', 90, 'Courier or directly from headquarters', 'masterOfPuppets.jpg'),
(2, 5, 'MGLA - Age Of Excuse', 'Contine: 1 CD;  Piese: 6;  Anul: 2019', 110, 'Courier', 'ageOfExcuse.jpg'),
(3, 5, 'Oceans - The Sun And The Cold', 'Contine: 2 CD;  Piese: 23;  Anul: 2020', 80, 'Courier', 'sunCold.jpg'),
(4, 1, 'Queen T-Shirt', 'Men\'s Queen Bohemiam Rhapsody T-Shirt; available in S, M and L', 80, 'Directly from the headquarters', 'queenT.jpg'),
(5, 2, 'RHCP T-Shirt', 'Red Hot Chili Peppers Asterisk T-Shirt, available in sizes XS-L', 90, 'Courier', 'RHCPT.jpg'),
(6, 3, 'Pink Floyd T-Shirt', 'Pink Floyd - Dark Side of the Moon T-Shirt in sizes XS-M', 70, 'Postal Delivery ', 'PFT.jpg'),
(7, 4, 'Cradle Of Filth', 'Cradle of Filth Logo Patch', 20, 'Courier', 'COFP.jpg'),
(8, 6, 'Motley Crue - Dr. Feelgood', 'Contains: 1 Vinyl; 11 Tracks; 2019', 105, 'Postal Delivery', 'MCCD.jpg'),
(9, 7, 'Jimi Hendrix - Live At Rockpalast', 'Contains: 2CDs + 1 DVD; 52 Tracks; 2019', 100, 'Courier', 'noImage.jpg'),
(10, 8, 'Helloween - United Alive', 'Contains: 2 BLU-RAY + 3CD + 3 DVD; 92 Tracks; 2019', 390, 'Courier', 'noImage.jpg'),
(11, 9, 'Ramones Bracelet', 'Ramones Logo simple black bracelet', 20, 'Postal Delivery', 'noImage.jpg'),
(12, 10, 'Metallica Mug', 'Metallica - And Coffee For All Mug, 400ml', 45, 'Postal Delivery', 'noImage.jpg'),
(13, 6, 'Primus - Sailing The Seas', 'Contains: 1 Vinyl; 13 Tracks; 2019', 210, 'Directly from headquarters', 'noImage.jpg'),
(14, 4, 'Scorpions - Blackout', 'Scorpions Official Patch, 2018', 20, 'Courier', 'ScorpionsP.jpg'),
(15, 5, 'Mayhem - Deathcrush', 'Contine: 1 CD; Piese: 6; Durata: 18:12; Anul: 1987', 50, 'Courier', 'deathcrush.jpg'),
(16, 6, 'Suicide Silence - Become The Hunter', 'Contine: 1 VINYL', 125, 'Directly from headquarters', 'becomeTheHunter.jpg'),
(17, 8, 'Nightwish - Decades: Live in Buenos Aires', 'Contine: 1 BLU-RAY + 2 CD', 250, 'Courier', 'nightwish.jpg'),
(18, 5, 'Infected Rain - Endorphin', 'Contine: 1 CD', 65, 'Courier', 'endorphin.jpg'),
(19, 6, 'Burzum - Filosofem', 'Contine: 2 VINYL; Piese: 6; Anul: 2008', 115, 'Directly from headquarters', 'filosofem.jpg');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `review`
--

CREATE TABLE `review` (
  `idReview` int(11) NOT NULL,
  `idProdus` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `review` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `review`
--

INSERT INTO `review` (`idReview`, `idProdus`, `username`, `review`) VALUES
(1, 4, 'Ioana', '10/10'),
(2, 2, 'default', 'pretty great'),
(3, 5, 'Ioana', '9.80/10'),
(4, 8, 'Ioana', 'hello'),
(5, 9, 'Ioana', 'eh'),
(7, 8, 'test', 'enjoyable'),
(8, 18, 'Ioana', '9.5/10'),
(9, 3, 'Ioana', 'a solid 8/10'),
(10, 11, 'test', 'cute'),
(11, 19, 'test', 'enjoyable'),
(12, 4, 'hello', 'not bad'),
(13, 16, 'hello', 'pretty great');

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `categorie_obiecte`
--
ALTER TABLE `categorie_obiecte`
  ADD PRIMARY KEY (`idCategorie`);

--
-- Indexuri pentru tabele `cumparaturi`
--
ALTER TABLE `cumparaturi`
  ADD PRIMARY KEY (`idCumparaturi`),
  ADD KEY `produs` (`idProdus`),
  ADD KEY `usernameFK` (`username`);

--
-- Indexuri pentru tabele `favorite`
--
ALTER TABLE `favorite`
  ADD PRIMARY KEY (`idFavorite`),
  ADD KEY `produs_index` (`idProdus`),
  ADD KEY `usernameFK3` (`username`);

--
-- Indexuri pentru tabele `login_info`
--
ALTER TABLE `login_info`
  ADD PRIMARY KEY (`username`);

--
-- Indexuri pentru tabele `produs`
--
ALTER TABLE `produs`
  ADD PRIMARY KEY (`idProdus`),
  ADD UNIQUE KEY `unique_name` (`Nume`),
  ADD KEY `idCategorie` (`idCategorie`);

--
-- Indexuri pentru tabele `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`idReview`),
  ADD KEY `produs` (`idProdus`),
  ADD KEY `username` (`username`);

--
-- Constrângeri pentru tabele eliminate
--

--
-- Constrângeri pentru tabele `cumparaturi`
--
ALTER TABLE `cumparaturi`
  ADD CONSTRAINT `produsFK5` FOREIGN KEY (`idProdus`) REFERENCES `produs` (`idProdus`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usernameFK` FOREIGN KEY (`username`) REFERENCES `login_info` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constrângeri pentru tabele `favorite`
--
ALTER TABLE `favorite`
  ADD CONSTRAINT `produsFK` FOREIGN KEY (`idProdus`) REFERENCES `produs` (`idProdus`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usernameFK3` FOREIGN KEY (`username`) REFERENCES `login_info` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constrângeri pentru tabele `produs`
--
ALTER TABLE `produs`
  ADD CONSTRAINT `categorieFK` FOREIGN KEY (`idCategorie`) REFERENCES `categorie_obiecte` (`idCategorie`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constrângeri pentru tabele `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `produsFK4` FOREIGN KEY (`idProdus`) REFERENCES `produs` (`idProdus`),
  ADD CONSTRAINT `username` FOREIGN KEY (`username`) REFERENCES `login_info` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
