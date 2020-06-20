-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 20 Cze 2020, 11:35
-- Wersja serwera: 10.4.11-MariaDB
-- Wersja PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `jww`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `bilety`
--

CREATE TABLE `bilety` (
  `id_bilet` int(11) NOT NULL,
  `miejsce_id` int(11) NOT NULL,
  `blok_id` int(11) NOT NULL,
  `sektor_id` int(11) NOT NULL,
  `pesel` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `bilet_platnosc`
--

CREATE TABLE `bilet_platnosc` (
  `id_bilet_platnosc` int(11) NOT NULL,
  `forma_platnosci_id` int(11) NOT NULL,
  `bilet_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `bloki`
--

CREATE TABLE `bloki` (
  `id_blok` int(11) NOT NULL,
  `blok` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `błędy`
--

CREATE TABLE `błędy` (
  `id_blad` int(11) NOT NULL,
  `tresc` varchar(250) NOT NULL,
  `pesel` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `forma płatności`
--

CREATE TABLE `forma płatności` (
  `id_forma_platnosci` int(11) NOT NULL,
  `nazwa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `miejsca`
--

CREATE TABLE `miejsca` (
  `id_miejsce` int(11) NOT NULL,
  `miejsce` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sektory`
--

CREATE TABLE `sektory` (
  `id_sektor` int(11) NOT NULL,
  `sektor` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `użytkownicy`
--

CREATE TABLE `użytkownicy` (
  `pesel` varchar(11) NOT NULL,
  `imie` varchar(30) NOT NULL,
  `nazwisko` varchar(50) NOT NULL,
  `e-mail` varchar(100) NOT NULL,
  `haslo` varchar(50) NOT NULL,
  `typ` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zaklad_platnosc`
--

CREATE TABLE `zaklad_platnosc` (
  `id_zaklad_platnosc` int(11) NOT NULL,
  `zaklad_id` int(11) NOT NULL,
  `forma_platnosc_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zakład`
--

CREATE TABLE `zakład` (
  `id_zakład` int(11) NOT NULL,
  `pesel` varchar(11) NOT NULL,
  `typ` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `bilety`
--
ALTER TABLE `bilety`
  ADD PRIMARY KEY (`id_bilet`),
  ADD KEY `miejsce_bilet` (`miejsce_id`),
  ADD KEY `sektor_bilet` (`sektor_id`),
  ADD KEY `blok_bilet` (`blok_id`),
  ADD KEY `pesel_bilet` (`pesel`);

--
-- Indeksy dla tabeli `bilet_platnosc`
--
ALTER TABLE `bilet_platnosc`
  ADD PRIMARY KEY (`id_bilet_platnosc`),
  ADD KEY `bilet_platnosc` (`bilet_id`),
  ADD KEY `forma_platnosc` (`forma_platnosci_id`);

--
-- Indeksy dla tabeli `bloki`
--
ALTER TABLE `bloki`
  ADD PRIMARY KEY (`id_blok`);

--
-- Indeksy dla tabeli `błędy`
--
ALTER TABLE `błędy`
  ADD PRIMARY KEY (`id_blad`);

--
-- Indeksy dla tabeli `forma płatności`
--
ALTER TABLE `forma płatności`
  ADD PRIMARY KEY (`id_forma_platnosci`);

--
-- Indeksy dla tabeli `miejsca`
--
ALTER TABLE `miejsca`
  ADD PRIMARY KEY (`id_miejsce`);

--
-- Indeksy dla tabeli `sektory`
--
ALTER TABLE `sektory`
  ADD PRIMARY KEY (`id_sektor`);

--
-- Indeksy dla tabeli `użytkownicy`
--
ALTER TABLE `użytkownicy`
  ADD PRIMARY KEY (`pesel`);

--
-- Indeksy dla tabeli `zaklad_platnosc`
--
ALTER TABLE `zaklad_platnosc`
  ADD PRIMARY KEY (`id_zaklad_platnosc`);

--
-- Indeksy dla tabeli `zakład`
--
ALTER TABLE `zakład`
  ADD PRIMARY KEY (`id_zakład`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `bilety`
--
ALTER TABLE `bilety`
  MODIFY `id_bilet` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `bilet_platnosc`
--
ALTER TABLE `bilet_platnosc`
  MODIFY `id_bilet_platnosc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `bloki`
--
ALTER TABLE `bloki`
  MODIFY `id_blok` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `błędy`
--
ALTER TABLE `błędy`
  MODIFY `id_blad` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `forma płatności`
--
ALTER TABLE `forma płatności`
  MODIFY `id_forma_platnosci` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `miejsca`
--
ALTER TABLE `miejsca`
  MODIFY `id_miejsce` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `sektory`
--
ALTER TABLE `sektory`
  MODIFY `id_sektor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `zaklad_platnosc`
--
ALTER TABLE `zaklad_platnosc`
  MODIFY `id_zaklad_platnosc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `zakład`
--
ALTER TABLE `zakład`
  MODIFY `id_zakład` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `bilety`
--
ALTER TABLE `bilety`
  ADD CONSTRAINT `blok_bilet` FOREIGN KEY (`blok_id`) REFERENCES `bloki` (`id_blok`),
  ADD CONSTRAINT `miejsce_bilet` FOREIGN KEY (`miejsce_id`) REFERENCES `miejsca` (`id_miejsce`),
  ADD CONSTRAINT `pesel_bilet` FOREIGN KEY (`pesel`) REFERENCES `użytkownicy` (`pesel`),
  ADD CONSTRAINT `sektor_bilet` FOREIGN KEY (`sektor_id`) REFERENCES `sektory` (`id_sektor`);

--
-- Ograniczenia dla tabeli `bilet_platnosc`
--
ALTER TABLE `bilet_platnosc`
  ADD CONSTRAINT `bilet_platnosc` FOREIGN KEY (`bilet_id`) REFERENCES `bilety` (`id_bilet`),
  ADD CONSTRAINT `forma_platnosc` FOREIGN KEY (`forma_platnosci_id`) REFERENCES `forma płatności` (`id_forma_platnosci`);

--
-- Ograniczenia dla tabeli `forma płatności`
--
ALTER TABLE `forma płatności`
  ADD CONSTRAINT `forma płatności_ibfk_1` FOREIGN KEY (`id_forma_platnosci`) REFERENCES `bilet_platnosc` (`forma_platnosci_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
