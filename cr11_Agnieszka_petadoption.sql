-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 25. Jul 2020 um 17:19
-- Server-Version: 10.4.13-MariaDB
-- PHP-Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `cr11_Agnieszka_petadoption`
--
CREATE DATABASE IF NOT EXISTS `cr11_Agnieszka_petadoption` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cr11_Agnieszka_petadoption`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `animal`
--

CREATE TABLE `animal` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `type` enum('small','large','middle') NOT NULL,
  `hobbies` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zip` int(11) NOT NULL,
  `street` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `animal`
--

INSERT INTO `animal` (`id`, `name`, `image`, `age`, `description`, `type`, `hobbies`, `city`, `zip`, `street`) VALUES
(1, 'squirrel', 'https://images.maennersache.de/eichhoernchen_maennersache,id=ab3203f2,b=maennersache,w=1100,rm=sk.jpeg', 2, 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam', 'middle', 'jumping', 'Vienna', 1220, 'Aspernstraße'),
(13, 'mouse', 'https://einfachtierisch.de/media/cache/article_main_image/cms/2013/01/Wilde-Maus-Feld.jpg?595617', 3, 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam', 'small', 'hide', 'Vienna', 1230, 'Liesinger Hauptstraße'),
(14, 'hedgehog', 'https://resize.hswstatic.com/u_0/w_480/gif/hedgehog-pet.jpg', 8, 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam', 'small', 'viele', 'Vienna', 1110, 'Hauptstraße'),
(15, 'rabbit', 'https://media.4-paws.org/b/6/9/0/b6901c6357c4de3012219ed3b5f57cf6c6049793/Kaninchen%20im%20Freigehege%20%2832%29-4440x3072.jpg', 3, 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam', 'small', 'jumping, runnig', 'Vienna', 1140, 'Schönbrunner Straße'),
(16, 'horse', 'https://www.zooroyal.de/magazin/wp-content/uploads/2019/02/Quarter-Horse_760x560.jpg', 10, 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam', 'large', 'running', 'Kloserneuburg', 3400, 'Wiesenstraße'),
(17, 'cow', 'https://scx1.b-cdn.net/csz/news/800/2019/quotacowisne.jpg', 9, 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam', 'large', 'eating', 'Ellmau', 7000, 'Almstraße'),
(18, 'lama', 'https://bilder.bild.de/fotos-skaliert/die-antikoerper-eines-lamas-koennen-verschiedene-viren-abwehren-201425330-70502846/9,w=1280,c=0.bild.jpg', 10, 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam', 'large', 'chilling', 'Baden', 2400, 'Baden Allee'),
(19, 'dog', 'https://i.insider.com/5484d9d1eab8ea3017b17e29?width=1100&format=jpeg&auto=webp', 5, 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam', 'middle', 'playing ', 'Graz', 6000, 'Bellenstraße'),
(20, 'camel', 'https://cdn.britannica.com/94/152294-050-92FE0C83/Arabian-dromedary-camel.jpg', 13, 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum', 'large', 'backpacking', 'Rust', 7000, 'Kamelstraße'),
(21, 'turtle', 'https://i.dailymail.co.uk/i/newpix/2018/04/20/10/4B58A4A500000578-0-image-a-51_1524217478774.jpg', 90, 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum', 'middle', 'swimming', 'Vienna', 1130, 'Wasserstraße');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin','superadmin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `role`) VALUES
(3, 'filip', 'filip@me.com', '7a46ff0544cc9b98510463b037ced288850e2579e4d1a362ba260ee8738f3445', 'user'),
(4, 'alicia', 'alicia@me.com', '7a46ff0544cc9b98510463b037ced288850e2579e4d1a362ba260ee8738f3445', 'admin'),
(5, 'aga', 'aga@me.com', '7a46ff0544cc9b98510463b037ced288850e2579e4d1a362ba260ee8738f3445', 'user'),
(8, 'super', 'super@me.com', '891e12e156d8c6609c6d5f3e04b2fc8da6d9ff3d7e9f906314c0909da69637eb', 'superadmin');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `animal`
--
ALTER TABLE `animal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
