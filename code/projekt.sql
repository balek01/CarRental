-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1:3306
-- Vytvořeno: Sob 13. úno 2021, 14:38
-- Verze serveru: 10.4.10-MariaDB
-- Verze PHP: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `projekt`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `idadmin` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(45) COLLATE utf8_czech_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`idadmin`),
  UNIQUE KEY `idadmin_UNIQUE` (`idadmin`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `car`
--

DROP TABLE IF EXISTS `car`;
CREATE TABLE IF NOT EXISTS `car` (
  `idcar` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `brand` varchar(45) COLLATE utf8_czech_ci NOT NULL,
  `model` varchar(45) COLLATE utf8_czech_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL,
  `fuel` enum('Benzín','Naftal','LPG','Elektřina') COLLATE utf8_czech_ci NOT NULL,
  `price` decimal(7,2) UNSIGNED NOT NULL,
  `seat` tinyint(3) UNSIGNED NOT NULL,
  `gearing` enum('Manuální','Automatické') COLLATE utf8_czech_ci NOT NULL,
  `available` tinyint(1) UNSIGNED NOT NULL,
  `reservation_id` int(10) UNSIGNED NOT NULL,
  `img` varchar(255) COLLATE utf8_czech_ci DEFAULT '/ready/assets/img/def.jpg',
  PRIMARY KEY (`idcar`),
  UNIQUE KEY `idcar_UNIQUE` (`idcar`),
  UNIQUE KEY `img_UNIQUE` (`img`),
  KEY `fk_car_reservation1_idx` (`reservation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `rating`
--

DROP TABLE IF EXISTS `rating`;
CREATE TABLE IF NOT EXISTS `rating` (
  `idrating` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `stars` varchar(45) COLLATE utf8_czech_ci NOT NULL,
  `rating_date` varchar(45) COLLATE utf8_czech_ci NOT NULL,
  `ratingcol` varchar(45) COLLATE utf8_czech_ci NOT NULL,
  `car_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`idrating`),
  UNIQUE KEY `idrating_UNIQUE` (`idrating`),
  KEY `fk_rating_car1_idx` (`car_id`),
  KEY `fk_rating_user1_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `idreservation` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `date_of_reservation` datetime NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `return_date` datetime DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`idreservation`),
  UNIQUE KEY `idreservation_UNIQUE` (`idreservation`),
  KEY `fk_reservation_user1_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `iduser` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(45) COLLATE utf8_czech_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_czech_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_czech_ci NOT NULL,
  `firstname` varchar(45) COLLATE utf8_czech_ci DEFAULT NULL,
  `lastname` varchar(45) COLLATE utf8_czech_ci DEFAULT NULL,
  `phonenumber` varchar(45) COLLATE utf8_czech_ci DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `user_address_id` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`iduser`),
  UNIQUE KEY `iduser_UNIQUE` (`iduser`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `phonenumber_UNIQUE` (`phonenumber`),
  KEY `fk_user_user_address_idx` (`user_address_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `user_address`
--

DROP TABLE IF EXISTS `user_address`;
CREATE TABLE IF NOT EXISTS `user_address` (
  `iduser_address` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `postcode` varchar(45) COLLATE utf8_czech_ci NOT NULL,
  `state` varchar(45) COLLATE utf8_czech_ci NOT NULL,
  `city` varchar(45) COLLATE utf8_czech_ci NOT NULL,
  `house_number` tinyint(3) UNSIGNED NOT NULL,
  PRIMARY KEY (`iduser_address`),
  UNIQUE KEY `iduser_address_UNIQUE` (`iduser_address`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `fk_car_reservation1` FOREIGN KEY (`reservation_id`) REFERENCES `reservation` (`idreservation`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Omezení pro tabulku `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `fk_rating_car1` FOREIGN KEY (`car_id`) REFERENCES `car` (`idcar`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_rating_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Omezení pro tabulku `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `fk_reservation_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Omezení pro tabulku `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_user_address` FOREIGN KEY (`user_address_id`) REFERENCES `user_address` (`iduser_address`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
