-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Počítač: database
-- Vytvořeno: Úte 12. bře 2024, 16:56
-- Verze serveru: 8.3.0
-- Verze PHP: 8.2.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `univerzita`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `fakulta`
--

CREATE TABLE `fakulta` (
  `id` int NOT NULL,
  `dekan_jmeno` varchar(255) DEFAULT NULL,
  `dekan_prijmeni` varchar(255) DEFAULT NULL,
  `dekan_email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Vypisuji data pro tabulku `fakulta`
--

INSERT INTO `fakulta` (`id`, `dekan_jmeno`, `dekan_prijmeni`, `dekan_email`) VALUES
(1, 'Michal', 'Novak', 'm.novak@univerzita.cz'),
(2, 'Eva', 'Kovarova', 'e.kovarova@univerzita.cz');

-- --------------------------------------------------------

--
-- Struktura tabulky `katedra`
--

CREATE TABLE `katedra` (
  `id` int NOT NULL,
  `fakulta_id` int DEFAULT NULL,
  `nazev` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Vypisuji data pro tabulku `katedra`
--

INSERT INTO `katedra` (`id`, `fakulta_id`, `nazev`) VALUES
(1, 1, 'Informatika'),
(2, 2, 'Ekonomie');

-- --------------------------------------------------------

--
-- Struktura tabulky `kontaktni_udaje`
--

CREATE TABLE `kontaktni_udaje` (
  `id` int NOT NULL,
  `student_id` int DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telefon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Vypisuji data pro tabulku `kontaktni_udaje`
--

INSERT INTO `kontaktni_udaje` (`id`, `student_id`, `email`, `telefon`) VALUES
(1, 1, 'john.doe@univerzita.cz', '123456789'),
(2, 2, 'jane.smith@univerzita.cz', '987654321');

-- --------------------------------------------------------

--
-- Struktura tabulky `studenti`
--

CREATE TABLE `studenti` (
  `id` int NOT NULL,
  `jmeno` varchar(255) DEFAULT NULL,
  `prijmeni` varchar(255) DEFAULT NULL,
  `studentske_cislo` varchar(255) DEFAULT NULL,
  `fakulta` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Vypisuji data pro tabulku `studenti`
--

INSERT INTO `studenti` (`id`, `jmeno`, `prijmeni`, `studentske_cislo`, `fakulta`) VALUES
(1, 'John', 'Doe', '123456789', '1'),
(2, 'Jane', 'Smith', '987654321', '2');

-- --------------------------------------------------------

--
-- Struktura tabulky `zamestnanec`
--

CREATE TABLE `zamestnanec` (
  `id` int NOT NULL,
  `katedra_id` int DEFAULT NULL,
  `jmeno` varchar(255) DEFAULT NULL,
  `prijmeni` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Vypisuji data pro tabulku `zamestnanec`
--

INSERT INTO `zamestnanec` (`id`, `katedra_id`, `jmeno`, `prijmeni`, `email`) VALUES
(1, 1, 'Adam', 'Svoboda', 'adam.svoboda@univerzita.cz'),
(2, 1, 'Petra', 'Novotna', 'petra.novotna@univerzita.cz'),
(3, 2, 'Tomas', 'Hrncir', 'tomas.hrncir@univerzita.cz');

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `fakulta`
--
ALTER TABLE `fakulta`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pro tabulku `katedra`
--
ALTER TABLE `katedra`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pro tabulku `kontaktni_udaje`
--
ALTER TABLE `kontaktni_udaje`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pro tabulku `studenti`
--
ALTER TABLE `studenti`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pro tabulku `zamestnanec`
--
ALTER TABLE `zamestnanec`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `fakulta`
--
ALTER TABLE `fakulta`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pro tabulku `katedra`
--
ALTER TABLE `katedra`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pro tabulku `kontaktni_udaje`
--
ALTER TABLE `kontaktni_udaje`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pro tabulku `studenti`
--
ALTER TABLE `studenti`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pro tabulku `zamestnanec`
--
ALTER TABLE `zamestnanec`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
