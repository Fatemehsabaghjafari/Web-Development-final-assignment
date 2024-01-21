-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Gegenereerd op: 19 jan 2024 om 23:52
-- Serverversie: 11.1.3-MariaDB-1:11.1.3+maria~ubu2204
-- PHP-versie: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `FS-flowershop`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `price` float(11,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `cart`
--

INSERT INTO `cart` (`id`, `quantity`, `name`, `price`) VALUES
(220, 4, 'Narcissus', 50),
(224, 1, 'Rose', 100),
(226, 1, 'Paeonia', 70),
(227, 1, 'Tuberose', 60);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `flowers`
--

CREATE TABLE `flowers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `image_url` text NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `flowers`
--

INSERT INTO `flowers` (`id`, `name`, `color`, `image_url`, `price`, `quantity`) VALUES
(1, 'Rose', 'Red', 'https://th.bing.com/th/id/R.f3e5615417ecbb6ed1afcfb586de9ff9?rik=SlcjdYaQXqlRZg&pid=ImgRaw&r=0', 100, 100),
(2, 'Narcissus', 'White', 'https://www.jacksonandperkins.com/images/xl/23710.webp?v=0-1', 50, 100),
(3, 'Tulip', 'purple', 'https://th.bing.com/th/id/R.a9866a1c5bb4c7f43f6783cd63bb8a4d?rik=CXR004Y8wmq3Ew&riu=http%3a%2f%2fblog.teleflora.com%2fwp-content%2fuploads%2f2018%2f06%2fTeleflora_Passionate-Purple-Tulips_Instagram-1.jpg&ehk=Zl70M%2bfYGOKVJ2vhuVgLhORPdmR%2bpd43tmn8Vih1mOM%3d&risl=&pid=ImgRaw&r=0', 40, 100),
(4, 'Paeonia', 'pink', 'https://medias.interflora.fr/fstrz/r/s/c/medias.interflora.fr/medias/B2BDP-GALLERY-0-1.jpg?context=bWFzdGVyfGltYWdlc3wxMTIxMjF8aW1hZ2UvanBlZ3xpbWFnZXMvaGJhL2g4OS85NTg4ODMxMDU5OTk4LmpwZ3xhMmE4ZWE5YzZiOWUxMzVjOTI5MGM0MGY4NzFkNmExZjViMWQ5MjU4NDVlODdlMGFjOWJiNTEyN2Y5N2I5MzM2', 70, 10),
(5, 'Tuberose', 'white', 'https://i.pinimg.com/originals/32/64/ff/3264ff895fe96c95a6a634379e399b15.jpg', 60, 15),
(6, 'Bely', 'white', 'https://i.pinimg.com/originals/9e/eb/4f/9eeb4f8b3808b8d585f652ff3955d076.jpg', 30, 80);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`) VALUES
(2, NULL, 'Fateme77', '$2y$10$GgCU9kQR9WRsU/G.hvEVU.JGsdGOQN4LLdsO4xiEQiVrei26IQNje'),
(3, NULL, 'Mones55', '$2y$10$SLdpKOdo931RH18mSu6Ype2qLNx4cJNo8cFtHR1FQD6K6NFERWulK'),
(4, NULL, 'Mohsen45', '$2y$10$VnYn8K0d84WU8C6G2dALaOttdM3BQw0rJUHKurtLl6gQJ8/7bKlcW'),
(5, NULL, 'Zahra85', '$2y$10$EbH2m6f2e3oLVGZRKB/qzuryX1hKBZDml4v5d1f.vG.Bf9iYef5PS'),
(6, NULL, 'Maryam67', '$2y$10$.RGcQgZg0kI7AHMxlx2CEeoyXRV4sSnvi6KKTshGFMVEavHXSZw7i');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `flowers`
--
ALTER TABLE `flowers`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=228;

--
-- AUTO_INCREMENT voor een tabel `flowers`
--
ALTER TABLE `flowers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
