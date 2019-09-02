-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 19 aug 2019 om 17:07
-- Serverversie: 10.1.28-MariaDB
-- PHP-versie: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bakery`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `file`
--

CREATE TABLE `file` (
  `id` int(11) NOT NULL,
  `filename` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `period` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `fos_user`
--

CREATE TABLE `fos_user` (
  `id` int(11) NOT NULL,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `system` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `fos_user`
--

INSERT INTO `fos_user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `confirmation_token`, `password_requested_at`, `roles`, `system`) VALUES
(7, 'dirk', 'dirk', 'dirk@feka.nl', 'dirk@feka.nl', 1, 'OyLx5ljOv1dnMJQBSxT.ZW6KNwD/UrHUDPwec64egUw', 'BN114eXDh0BmoH+wr/qwfFQO81eCtTD8osMAn58ks+htcmFnDPWKboZZp1yprP5xv7QZXz3XMbwUpwYUo7LPIw==', '2019-08-19 16:59:41', NULL, NULL, 'a:1:{i:0;s:16:\"ROLE_SUPER_ADMIN\";}', 0),
(9, 'silvija', 'silvija', 'silvija_ilic@hotmail.com', 'silvija_ilic@hotmail.com', 1, 't0ucMAgkmeg7egbUwLnGpJeWFMT1cx7tUXSzT80M7nE', 'xCZ0RB0X1igZMoj4g4k1c1rObzSyjGlJuFCZKeRQG+4bKq0DHY2HTCZxaRaDVd6RCv7dAwXjVDCig37oszuMWw==', NULL, NULL, NULL, 'a:1:{i:0;s:10:\"ROLE_ADMIN\";}', 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` double NOT NULL,
  `amountWithVat` double NOT NULL,
  `vatAmount` double NOT NULL,
  `vatPercentage` int(11) NOT NULL,
  `relation_id` int(11) DEFAULT NULL,
  `invoiceSend` date DEFAULT NULL,
  `statusPayment` tinyint(1) NOT NULL,
  `invoiceNumber` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `invoice`
--

INSERT INTO `invoice` (`id`, `date`, `description`, `amount`, `amountWithVat`, `vatAmount`, `vatPercentage`, `relation_id`, `invoiceSend`, `statusPayment`, `invoiceNumber`) VALUES
(16, '2019-08-01', 'Taart thema Disney cars', 20, 21.8, 1.8, 9, 2, '2019-08-02', 1, '19-001'),
(17, '2019-08-10', 'Taart met foto', 50, 54.5, 4.5, 9, 1, NULL, 1, '19-002'),
(19, '2019-08-16', 'nog een taart', 22, 23.98, 1.98, 9, 1, NULL, 0, '19-004'),
(20, '2019-08-13', 'Workshop 12 kinderen Cupcakes', 44, 47.96, 3.96, 9, 3, NULL, 0, '19-005');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `relation`
--

CREATE TABLE `relation` (
  `id` int(11) NOT NULL,
  `kindOfRelation` tinyint(1) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `street` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `houseNumber` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postalCode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telephone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `allergies` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bankAccountNumber` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `extraInfo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `relation`
--

INSERT INTO `relation` (`id`, `kindOfRelation`, `name`, `street`, `houseNumber`, `postalCode`, `city`, `telephone`, `email`, `allergies`, `bankAccountNumber`, `extraInfo`) VALUES
(1, 0, 'Feka', 'Rendementsweg', '14', '3641 SL', 'Mijdrecht', NULL, 'info@feka.nl', NULL, 'INGB12 121 5513 033', NULL),
(2, 1, 'Dirk Kuijer', 'Meeuwenlaan', '24', '3645 GH', 'Vinkeveen', '06 2530 6299', 'dirkkuijer@hotmail.com', NULL, 'ING12 000 7714020', NULL),
(3, 1, 'Jan Kuijer', 'Tjerk Hiddeslaan', '22', '1234 AB', 'Baarn', '0615562628', 'jan@janimo.nl', NULL, 'ing12 000 3388111', NULL);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8C9F36103C0BE965` (`filename`);

--
-- Indexen voor tabel `fos_user`
--
ALTER TABLE `fos_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_957A647992FC23A8` (`username_canonical`),
  ADD UNIQUE KEY `UNIQ_957A6479A0D96FBF` (`email_canonical`),
  ADD UNIQUE KEY `UNIQ_957A6479C05FB297` (`confirmation_token`);

--
-- Indexen voor tabel `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_9065174426DEA64B` (`invoiceNumber`),
  ADD KEY `IDX_906517443256915B` (`relation_id`);

--
-- Indexen voor tabel `relation`
--
ALTER TABLE `relation`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `file`
--
ALTER TABLE `file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `fos_user`
--
ALTER TABLE `fos_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT voor een tabel `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT voor een tabel `relation`
--
ALTER TABLE `relation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `FK_906517443256915B` FOREIGN KEY (`relation_id`) REFERENCES `relation` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
