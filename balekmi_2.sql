-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Počítač: localhost
-- Vytvořeno: Úte 20. dub 2021, 17:56
-- Verze serveru: 10.1.47-MariaDB-0ubuntu0.18.04.1
-- Verze PHP: 7.2.24-0ubuntu0.18.04.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `balekmi_2`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(10) UNSIGNED NOT NULL,
  `username` varchar(45) COLLATE utf8_czech_ci NOT NULL,
  `rights` int(1) NOT NULL,
  `datelog` datetime NOT NULL,
  `password` varchar(60) COLLATE utf8_czech_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `admin`
--

INSERT INTO `admin` (`idadmin`, `username`, `rights`, `datelog`, `password`) VALUES
(1, 'Párek', 1, '2021-04-15 18:39:59', '$2y$10$rdIaAgsQrCgBVXBN1BS4Oezsze.X82QMPoaHZjFSYzKLG6gKOor.q'),
(3, 'Buřt', 0, '2021-04-15 12:50:59', '$2y$10$8ghUkXx6GAtRiyxn/5xv8O3I8oToL3//j8m7gPMQWbdNykCP3OYcm');

-- --------------------------------------------------------

--
-- Struktura tabulky `car`
--

CREATE TABLE `car` (
  `idcar` int(10) UNSIGNED NOT NULL,
  `brand` varchar(45) COLLATE utf8_czech_ci NOT NULL,
  `model` varchar(45) COLLATE utf8_czech_ci NOT NULL,
  `description` varchar(10000) COLLATE utf8_czech_ci DEFAULT NULL,
  `fuel` enum('Benzín','Nafta','LPG','Elektřina') COLLATE utf8_czech_ci NOT NULL,
  `price` decimal(7,2) UNSIGNED NOT NULL,
  `seat` tinyint(3) UNSIGNED NOT NULL,
  `gearing` enum('Manuální','Automatické') COLLATE utf8_czech_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_czech_ci DEFAULT '/ready/assets/img/def.jpg',
  `available` tinyint(1) DEFAULT '1',
  `license_plate` varchar(10) CHARACTER SET utf16 COLLATE utf16_czech_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `car`
--

INSERT INTO `car` (`idcar`, `brand`, `model`, `description`, `fuel`, `price`, `seat`, `gearing`, `img`, `available`, `license_plate`) VALUES
(5, 'BMW', 'C220', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nullam at arcu a est sollicitudin euismod. Integer lacinia. Duis condimentum augue id magna semper rutrum. Etiam commodo dui eget wisi. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat. Nulla turpis magna, cursus sit amet, suscipit a, interdum id, felis. Praesent dapibus. Mauris dolor felis, sagittis at, luctus sed, aliquam non, tellus. Maecenas sollicitudin.', 'Benzín', '7500.00', 5, 'Manuální', '../assets/img/bmw.jpeg', 1, '5E35500'),
(6, 'Audi', 'R8', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nullam at arcu a est sollicitudin euismod. Integer lacinia. Duis condimentum augue id magna semper rutrum. Etiam commodo dui eget wisi. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat. Nulla turpis magna, cursus sit amet, suscipit a, interdum id, felis. Praesent dapibus. Mauris dolor felis, sagittis at, luctus sed, aliquam non, tellus. Maecenas sollicitudin.', 'Benzín', '6500.00', 5, 'Manuální', '../assets/img/audicar0.jpg', 1, '5E35501'),
(7, 'Audi', 'A5', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nullam at arcu a est sollicitudin euismod. Integer lacinia. Duis condimentum augue id magna semper rutrum. Etiam commodo dui eget wisi. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat. Nulla turpis magna, cursus sit amet, suscipit a, interdum id, felis. Praesent dapibus. Mauris dolor felis, sagittis at, luctus sed, aliquam non, tellus. Maecenas sollicitudin.', 'Benzín', '3500.00', 11, 'Automatické', '../../assets/img/audicar1.jpg', 1, '5E35502'),
(9, 'Škoda', 'Kamiq', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nullam at arcu a est sollicitudin euismod. Integer lacinia. Duis condimentum augue id magna semper rutrum. Etiam commodo dui eget wisi. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat. Nulla turpis magna, cursus sit amet, suscipit a, interdum id, felis. Praesent dapibus. Mauris dolor felis, sagittis at, luctus sed, aliquam non, tellus. Maecenas sollicitudin.', 'Benzín', '12560.00', 7, 'Automatické', '../../assets/img/oldone.jpg', 1, '5E35503'),
(10, 'Ford', 'Mustang GTR', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nullam at arcu a est sollicitudin euismod. Integer lacinia. Duis condimentum augue id magna semper rutrum. Etiam commodo dui eget wisi. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat. Nulla turpis magna, cursus sit amet, suscipit a, interdum id, felis. Praesent dapibus. Mauris dolor felis, sagittis at, luctus sed, aliquam non, tellus. Maecenas sollicitudin.', 'Benzín', '8000.00', 2, 'Manuální', '../../assets/img/mustang.jpg', 1, '5E35504'),
(11, 'Tesla', 'S', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nullam at arcu a est sollicitudin euismod. Integer lacinia. Duis condimentum augue id magna semper rutrum. Etiam commodo dui eget wisi. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat. Nulla turpis magna, cursus sit amet, suscipit a, interdum id, felis. Praesent dapibus. Mauris dolor felis, sagittis at, luctus sed, aliquam non, tellus. Maecenas sollicitudin.', 'Benzín', '8758.00', 5, 'Automatické', '../../assets/img/tesla.jpg', 1, '5E35505'),
(12, 'Mustang', 'GT Fastback', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nullam at arcu a est sollicitudin euismod. Integer lacinia. Duis condimentum augue id magna semper rutrum. Etiam commodo dui eget wisi. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat. Nulla turpis magna, cursus sit amet, suscipit a, interdum id, felis. Praesent dapibus. Mauris dolor felis, sagittis at, luctus sed, aliquam non, tellus. Maecenas sollicitudin.', 'Benzín', '8888.00', 2, 'Automatické', '../../assets/img/mustang2.jpeg', 2, '5E35506'),
(13, 'Škoda', 'Fabia', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nullam at arcu a est sollicitudin euismod. Integer lacinia. Duis condimentum augue id magna semper rutrum. Etiam commodo dui eget wisi. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat. Nulla turpis magna, cursus sit amet, suscipit a, interdum id, felis. Praesent dapibus. Mauris dolor felis, sagittis at, luctus sed, aliquam non, tellus. Maecenas sollicitudin.', 'Benzín', '3500.00', 5, 'Automatické', '../../assets/img/skoda2.jpeg', 0, '5E35555');

-- --------------------------------------------------------

--
-- Struktura tabulky `car_has_equipment`
--

CREATE TABLE `car_has_equipment` (
  `ID` int(11) NOT NULL,
  `id_car` int(10) UNSIGNED NOT NULL,
  `id_equipment` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_czech_ci;

--
-- Vypisuji data pro tabulku `car_has_equipment`
--

INSERT INTO `car_has_equipment` (`ID`, `id_car`, `id_equipment`) VALUES
(215, 5, 1),
(216, 5, 4),
(217, 5, 15),
(222, 6, 1),
(223, 6, 3),
(224, 6, 5),
(225, 6, 16),
(226, 9, 2),
(227, 9, 4),
(228, 9, 5),
(229, 9, 15),
(230, 10, 1),
(231, 10, 2),
(232, 10, 4),
(237, 11, 1),
(238, 11, 3),
(239, 11, 4),
(240, 12, 4),
(241, 12, 5),
(242, 13, 1),
(243, 13, 2),
(244, 13, 5),
(245, 7, 1),
(246, 7, 2),
(247, 7, 3);

-- --------------------------------------------------------

--
-- Struktura tabulky `equipment`
--

CREATE TABLE `equipment` (
  `ID` int(11) UNSIGNED NOT NULL,
  `equipment_name` varchar(200) COLLATE utf8mb4_czech_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_czech_ci;

--
-- Vypisuji data pro tabulku `equipment`
--

INSERT INTO `equipment` (`ID`, `equipment_name`) VALUES
(1, 'GPS'),
(2, 'ABS'),
(3, 'Start/stop'),
(4, 'ASR'),
(5, 'Protiletecký_systém'),
(14, 'Brzdy'),
(15, 'Nitro'),
(16, 'Beranidlo');

-- --------------------------------------------------------

--
-- Struktura tabulky `rating`
--

CREATE TABLE `rating` (
  `idrating` int(10) UNSIGNED NOT NULL,
  `stars` enum('1','2','3','4','5') COLLATE utf8_czech_ci NOT NULL,
  `rating_date` date NOT NULL,
  `car_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `rating`
--

INSERT INTO `rating` (`idrating`, `stars`, `rating_date`, `car_id`, `user_id`) VALUES
(2, '4', '2021-04-06', 7, 16),
(3, '5', '2021-04-06', 10, 14),
(4, '5', '2021-04-07', 10, 16),
(7, '4', '2021-04-09', 12, 16),
(8, '3', '2021-04-12', 6, 14),
(9, '2', '2021-04-12', 7, 14);

-- --------------------------------------------------------

--
-- Struktura tabulky `reservation`
--

CREATE TABLE `reservation` (
  `idreservation` int(10) UNSIGNED NOT NULL,
  `date_of_reservation` date NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `return_date` date DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `carid` int(10) UNSIGNED NOT NULL,
  `cost` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `reservation`
--

INSERT INTO `reservation` (`idreservation`, `date_of_reservation`, `start_date`, `end_date`, `return_date`, `user_id`, `carid`, `cost`) VALUES
(1, '2021-03-03', '2021-03-03', '2021-03-11', '2021-03-12', 14, 6, 28000),
(2, '2021-03-03', '2021-03-03', '2021-03-10', '2021-03-10', 14, 7, 5000),
(8, '2021-03-03', '2021-03-15', '2021-03-16', '2021-04-03', 14, 6, 3500),
(14, '2021-03-05', '2021-03-11', '2021-03-13', '2021-04-03', 14, 7, 7000),
(15, '2021-03-05', '2021-03-20', '2021-03-21', '2021-03-21', 14, 7, 3500),
(16, '2021-03-05', '2021-03-24', '2021-03-28', NULL, 14, 7, 14000),
(17, '2021-03-06', '2021-03-13', '2021-03-14', '2021-03-15', 14, 6, 3500),
(18, '2021-03-06', '2021-03-27', '2021-04-15', '2021-04-14', 14, 6, 123500),
(19, '2021-03-08', '2021-05-26', '2021-05-27', NULL, 14, 7, 3500),
(20, '2021-03-29', '2021-05-19', '2021-05-22', NULL, 16, 7, 10500),
(21, '2021-03-29', '2021-03-29', '2021-03-30', '2021-03-30', 16, 7, 3500),
(22, '2021-03-29', '2021-03-31', '2021-04-01', '2021-04-03', 16, 10, 8000),
(26, '2021-04-07', '2021-04-08', '2021-07-31', NULL, 38, 11, 998412),
(27, '2021-04-07', '2022-03-03', '2022-03-05', NULL, 38, 11, 17516),
(28, '2021-04-07', '2021-04-07', '2021-04-08', '2021-04-07', 16, 12, 8888),
(30, '2021-04-11', '2021-04-11', '2021-05-06', NULL, 16, 7, 87500);

-- --------------------------------------------------------

--
-- Struktura tabulky `user`
--

CREATE TABLE `user` (
  `iduser` int(10) UNSIGNED NOT NULL,
  `password` varchar(60) COLLATE utf8_czech_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_czech_ci NOT NULL,
  `firstname` varchar(45) COLLATE utf8_czech_ci DEFAULT NULL,
  `lastname` varchar(45) COLLATE utf8_czech_ci DEFAULT NULL,
  `phonenumber` varchar(45) COLLATE utf8_czech_ci DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `user_address_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `user`
--

INSERT INTO `user` (`iduser`, `password`, `email`, `firstname`, `lastname`, `phonenumber`, `birthdate`, `user_address_id`) VALUES
(14, '$2y$10$Ni4QQZl/GuvlJ2pRsy/Rde65morYaZCwuJDYl2OTm9wT19KJYjkfu', 'pepazavalil@email.cs', 'pepa', 'zavalil', '606606606', '1999-12-31', 21),
(15, '$2y$12$y6AWgndOqSRTNdDjB6re5eL/T4QIOCEPt6u7iZvmYFiNtUBJrH7de', 'toban42@gmail.com', 'jan', 'řidič', '777256145', '2002-01-22', 22),
(16, '$2y$10$N/fEHgpAdMn7873aCKHrmesB7PPGTbr0ItWKuRqQuR8ctotXNKNSC', 'karolina@email.com', 'karolína', 'malá', '555666999', '1969-03-02', 23),
(18, '$2y$10$B8SCX93QOZ2meccU6nbuQe16WZRJob0oygpLh1/ZZzhF6ahkIlqvy', 'bourakJoe@gmail.com', 'joe', 'bourák', '605944707', '2002-07-12', 25),
(21, '$2y$10$AECk86WtP20YGPmWTn2B9OrhJYcfuK5yUIA6qJmVTCbCPkoPUSqOG', 'mujemail@seznam.cz', 'miroslav', 'vál', '604640663', '2002-02-03', 28),
(22, '$2y$10$pHlLLA841lV8L7pI/rdae.jcsa9o7d6jjHhxy9iloHR5vlxwlAAhe', 'velkyjezdec@seznam.cz', 'erik', 'žejdlík', '666666666', '2002-09-20', 29),
(27, '$2y$10$PZACckziWok0UZq2WfhOmOA5R94HH95rBhxuwdBGRuz2B9H1y4N.q', 'raketak@seznam.cz', 'janeš', 'david', '222222222', '1995-01-02', 34),
(34, '$2y$10$QqdzdALu6KDuz172f7KXV.3cYhqZZZMRIIJFRfnOS8iBxwlh0fP1S', 'karel@email.uk', 'karel', 'bombarďák', '666555999', '1998-02-02', 39),
(38, '$2y$10$wuR/65CUT2egSYJM2layDO8WgIuxXvn0kZ7Ev3m9O.P411PfPjZ8u', 'abc@cba.cz', 'marijánek', 'bendáček', '765879512', '2000-02-01', 43);

-- --------------------------------------------------------

--
-- Struktura tabulky `user_address`
--

CREATE TABLE `user_address` (
  `iduser_address` int(10) UNSIGNED NOT NULL,
  `street` varchar(45) COLLATE utf8_czech_ci NOT NULL,
  `house_number` varchar(45) COLLATE utf8_czech_ci NOT NULL,
  `city` varchar(45) COLLATE utf8_czech_ci NOT NULL,
  `postcode` mediumint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `user_address`
--

INSERT INTO `user_address` (`iduser_address`, `street`, `house_number`, `city`, `postcode`) VALUES
(21, 'rakvová', '5454', 'hřibitov', 55555),
(22, 'jezdim', '53002', 'pardubice', 12345),
(23, 'uliční', '55', 'raketov', 68519),
(25, 'mrkvová', '123', 'záhon', 66655),
(28, 'uzená', '539', 'masov', 53911),
(29, 'velká', '572', 'věc', 53901),
(33, 'rataje', '69696', 'pardubice', 53911),
(34, 'kadingir sanctum', '666', 'peklo', 66601),
(39, 'palackého', '8787', 'praha', 53988),
(43, 'karla iv', '69', 'nigérie', 46578);

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`),
  ADD UNIQUE KEY `idadmin_UNIQUE` (`idadmin`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- Klíče pro tabulku `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`idcar`),
  ADD UNIQUE KEY `idcar_UNIQUE` (`idcar`);

--
-- Klíče pro tabulku `car_has_equipment`
--
ALTER TABLE `car_has_equipment`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_idcar` (`id_car`),
  ADD KEY `fk_idequipment` (`id_equipment`);

--
-- Klíče pro tabulku `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`ID`);

--
-- Klíče pro tabulku `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`idrating`),
  ADD UNIQUE KEY `idrating_UNIQUE` (`idrating`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `car_id` (`car_id`) USING BTREE;

--
-- Klíče pro tabulku `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`idreservation`),
  ADD UNIQUE KEY `idreservation_UNIQUE` (`idreservation`),
  ADD KEY `fk_reservation_user1_idx` (`user_id`),
  ADD KEY `fk_idcar` (`carid`);

--
-- Klíče pro tabulku `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`),
  ADD UNIQUE KEY `iduser_UNIQUE` (`iduser`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD UNIQUE KEY `phonenumber_UNIQUE` (`phonenumber`),
  ADD KEY `fk_user_user_address_idx` (`user_address_id`);

--
-- Klíče pro tabulku `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`iduser_address`),
  ADD UNIQUE KEY `iduser_address_UNIQUE` (`iduser_address`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pro tabulku `car`
--
ALTER TABLE `car`
  MODIFY `idcar` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pro tabulku `car_has_equipment`
--
ALTER TABLE `car_has_equipment`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=248;

--
-- AUTO_INCREMENT pro tabulku `equipment`
--
ALTER TABLE `equipment`
  MODIFY `ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pro tabulku `rating`
--
ALTER TABLE `rating`
  MODIFY `idrating` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pro tabulku `reservation`
--
ALTER TABLE `reservation`
  MODIFY `idreservation` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pro tabulku `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT pro tabulku `user_address`
--
ALTER TABLE `user_address`
  MODIFY `iduser_address` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `car_has_equipment`
--
ALTER TABLE `car_has_equipment`
  ADD CONSTRAINT `fk_idcar_index` FOREIGN KEY (`id_car`) REFERENCES `car` (`idcar`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_idequipment_index` FOREIGN KEY (`id_equipment`) REFERENCES `equipment` (`ID`);

--
-- Omezení pro tabulku `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`car_id`) REFERENCES `car` (`idcar`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`iduser`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Omezení pro tabulku `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `fk_reservation_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`iduser`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`carid`) REFERENCES `car` (`idcar`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Omezení pro tabulku `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_user_address` FOREIGN KEY (`user_address_id`) REFERENCES `user_address` (`iduser_address`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
