-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 13 Nis 2018, 23:24:20
-- Sunucu sürümü: 10.1.31-MariaDB
-- PHP Sürümü: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `myfreshdb`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin`
--

CREATE TABLE `admin` (
  `id` int(3) NOT NULL,
  `first_name` varchar(25) COLLATE utf8_turkish_ci NOT NULL,
  `last_name` varchar(25) COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `mobile1` varchar(15) COLLATE utf8_turkish_ci NOT NULL,
  `mobile2` varchar(15) COLLATE utf8_turkish_ci NOT NULL,
  `password` char(60) COLLATE utf8_turkish_ci NOT NULL,
  `role` char(5) COLLATE utf8_turkish_ci NOT NULL,
  `created_on` datetime NOT NULL,
  `last_login` datetime NOT NULL,
  `last_seen` datetime NOT NULL,
  `last_edited` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `account_status` char(1) COLLATE utf8_turkish_ci NOT NULL DEFAULT '1',
  `deleted` char(1) COLLATE utf8_turkish_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `admin`
--

INSERT INTO `admin` (`id`, `first_name`, `last_name`, `email`, `mobile1`, `mobile2`, `password`, `role`, `created_on`, `last_login`, `last_seen`, `last_edited`, `account_status`, `deleted`) VALUES
(1, 'Admin', 'Demo', 'demo@1410inc.xyz', '08021111111', '07032222222', '$2y$10$xv9I14OlR36kPCjlTv.wEOX/6Dl7VMuWCl4vCxAVWP1JwYIaw4J2C', 'Super', '2017-01-04 22:19:16', '2018-04-13 05:07:18', '2018-04-13 05:07:46', '2018-04-13 02:07:46', '1', '0'),
(2, 'Galip', 'Ozturk', 'oztrk.glp@gmail.com', '05432050009', '', '$2y$10$8VM7hQFTssoILA1jvTDmVexrQQ6B3H83UkokYjlwdjSgMPZtmZ4Wu', 'Super', '2018-04-13 05:05:57', '2018-04-14 00:20:55', '2018-04-13 05:22:10', '2018-04-13 21:20:55', '1', '0'),
(3, 'Bilal', 'Asamaka', 'bilal.asamaka@gmail.com', '05454544545', '', '$2y$10$.oJcryn9a9C/8Jev2qUSgukS09Pqy5maxV05geLJ/SU4NtCn/g3YO', 'Basic', '2018-04-13 05:06:36', '2018-04-13 05:09:19', '2018-04-13 05:10:15', '2018-04-13 02:10:15', '1', '0');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `eventlog`
--

CREATE TABLE `eventlog` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `eventRowIdOrRef` varchar(20) COLLATE utf8_turkish_ci DEFAULT NULL,
  `eventDesc` mediumtext COLLATE utf8_turkish_ci,
  `eventTable` varchar(20) COLLATE utf8_turkish_ci DEFAULT NULL,
  `staffInCharge` bigint(20) UNSIGNED NOT NULL,
  `eventTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `eventlog`
--

INSERT INTO `eventlog` (`id`, `event`, `eventRowIdOrRef`, `eventDesc`, `eventTable`, `staffInCharge`, `eventTime`) VALUES
(1, 'Creation of new item', '1', 'Addition of 32 quantities of a new item \'biber\' with a unit price of &#8358;10.00 to stock', 'items', 1, '2018-04-13 02:03:58'),
(2, 'Creation of new item', '2', 'Addition of 323 quantities of a new item \'asd\' with a unit price of &#8358;123.00 to stock', 'items', 1, '2018-04-13 02:04:22'),
(3, 'New Transaction', '360154717', '2 items totalling &#8358;256.00 with reference number 360154717 was purchased', 'transactions', 3, '2018-04-13 02:10:36'),
(4, 'New Transaction', '973631547', '1 items totalling &#8358;100.00 with reference number 973631547 was purchased', 'transactions', 2, '2018-04-13 02:14:09');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `code` varchar(10) COLLATE utf8_turkish_ci NOT NULL,
  `description` mediumtext COLLATE utf8_turkish_ci,
  `unitPrice` decimal(10,2) NOT NULL,
  `quantity` int(6) NOT NULL,
  `dateAdded` datetime NOT NULL,
  `lastUpdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `items`
--

INSERT INTO `items` (`id`, `name`, `code`, `description`, `unitPrice`, `quantity`, `dateAdded`, `lastUpdated`) VALUES
(1, 'biber', '2332', '', '10.00', 21, '2018-04-13 05:03:58', '2018-04-13 02:14:09'),
(2, 'asd', '323', '', '123.00', 321, '2018-04-13 05:04:22', '2018-04-13 02:10:36');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `lk_sess`
--

CREATE TABLE `lk_sess` (
  `id` varchar(40) COLLATE utf8_turkish_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_turkish_ci NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `transactions`
--

CREATE TABLE `transactions` (
  `transId` bigint(20) UNSIGNED NOT NULL,
  `ref` varchar(10) COLLATE utf8_turkish_ci NOT NULL,
  `itemName` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `itemCode` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `description` mediumtext COLLATE utf8_turkish_ci,
  `quantity` int(6) NOT NULL,
  `unitPrice` decimal(10,2) NOT NULL,
  `totalPrice` decimal(10,2) NOT NULL,
  `totalMoneySpent` decimal(10,2) NOT NULL,
  `amountTendered` decimal(10,2) NOT NULL,
  `discount_amount` decimal(10,2) NOT NULL,
  `discount_percentage` decimal(10,2) NOT NULL,
  `vatPercentage` decimal(10,2) NOT NULL,
  `vatAmount` decimal(10,2) NOT NULL,
  `changeDue` decimal(10,2) NOT NULL,
  `modeOfPayment` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `cust_name` varchar(20) COLLATE utf8_turkish_ci DEFAULT NULL,
  `cust_phone` varchar(15) COLLATE utf8_turkish_ci DEFAULT NULL,
  `cust_email` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `transType` char(1) COLLATE utf8_turkish_ci NOT NULL,
  `staffId` bigint(20) UNSIGNED NOT NULL,
  `transDate` datetime NOT NULL,
  `lastUpdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cancelled` char(1) COLLATE utf8_turkish_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `transactions`
--

INSERT INTO `transactions` (`transId`, `ref`, `itemName`, `itemCode`, `description`, `quantity`, `unitPrice`, `totalPrice`, `totalMoneySpent`, `amountTendered`, `discount_amount`, `discount_percentage`, `vatPercentage`, `vatAmount`, `changeDue`, `modeOfPayment`, `cust_name`, `cust_phone`, `cust_email`, `transType`, `staffId`, `transDate`, `lastUpdated`, `cancelled`) VALUES
(1, '360154717', 'asd', '323', '', 2, '123.00', '246.00', '256.00', '300.00', '0.00', '0.00', '0.00', '0.00', '44.00', 'Cash', '', '', '', '1', 3, '2018-04-13 05:10:36', '2018-04-13 02:10:36', '0'),
(2, '360154717', 'biber', '2332', '', 1, '10.00', '10.00', '256.00', '300.00', '0.00', '0.00', '0.00', '0.00', '44.00', 'Cash', '', '', '', '1', 3, '2018-04-13 05:10:36', '2018-04-13 02:10:36', '0'),
(3, '973631547', 'biber', '2332', '', 10, '10.00', '100.00', '100.00', '100.00', '0.00', '0.00', '0.00', '0.00', '0.00', 'Cash', '', '', '', '1', 2, '2018-04-13 05:14:09', '2018-04-13 02:14:09', '0');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mobile1` (`mobile1`);

--
-- Tablo için indeksler `eventlog`
--
ALTER TABLE `eventlog`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Tablo için indeksler `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transId`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `eventlog`
--
ALTER TABLE `eventlog`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
