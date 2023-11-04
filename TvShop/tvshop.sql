-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2023. Okt 25. 09:51
-- Kiszolgáló verziója: 10.4.28-MariaDB
-- PHP verzió: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `tvshop`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `tv`
--

CREATE TABLE `tv` (
  `tvid` int(10) UNSIGNED NOT NULL,
  `tv_modell` varchar(70) NOT NULL,
  `marka` varchar(60) NOT NULL,
  `kijelzom` varchar(30) DEFAULT NULL,
  `gyartasd` date DEFAULT NULL,
  `allapot` varchar(50) DEFAULT NULL,
  `ar` varchar(28) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- A tábla adatainak kiíratása `tv`
--

INSERT INTO `tv` (`tvid`, `tv_modell`, `marka`, `kijelzom`, `gyartasd`, `allapot`, `ar`) VALUES
(1, 'András', 'kutya', 'vizsla', '2018-09-11', 'kan', 'betegsége nincs'),
(2, 'Bodri', 'kutya', 'puli', '2020-10-10', 'kan', 'betegsége nincs'),
(3, 'Bosco', 'kutya', 'stafford', '2016-03-18', 'kan', ''),
(4, 'Cirmi', 'macska', 'perzsa', '2020-10-20', 'szuka', 'betegsége nincs'),
(5, 'Falco', 'kutya', 'palotapincsi', '2021-01-05', 'szuka', 'játékos'),
(6, 'Franko', 'kutya', 'buldog', '2018-10-10', 'kan', 'betegsége nincs'),
(7, 'Gazsi', 'kutya', 'Mobsz', '2021-01-11', 'szuka', 'csinos'),
(8, 'Joker', 'kutya', 'kangal', '2015-02-08', 'kan', 'betegsége nincs'),
(9, 'Kati', 'macska', 'perzsa', '2018-10-17', 'szuka', 'beteg'),
(10, 'Maci', 'kutya', 'németjuhasz', '2019-10-01', 'kan', 'egészséges'),
(11, 'Maszat', 'kutya', 'Tibeti Masztiff', '2021-01-01', 'kan', 'betegség nincs'),
(12, 'Métisz', 'macska', 'Maine Coon', '2009-01-22', 'szuka', 'betegség nincs'),
(13, 'Mónika', 'matka', 'utca matka', '2024-01-01', 'szuka', 'allandoan fial'),
(14, 'Morcika', 'kutya', 'Rottweiler', '2015-12-24', 'kan', 'betegsége nincs'),
(15, 'Pocok', 'kutya', 'tacskó', '2019-03-05', 'kan', 'betegsége nincs'),
(16, 'Tacsi', 'kutya', 'tacskó', '2014-05-07', 'kan', 'rákos, szürkehályog, rokkant');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `userid` int(10) UNSIGNED NOT NULL,
  `vasarlo_neve` varchar(50) NOT NULL,
  `emailcim` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `vasarlas`
--

CREATE TABLE `vasarlas` (
  `tvid` int(10) UNSIGNED NOT NULL,
  `userid` int(10) UNSIGNED NOT NULL,
  `vasarlas` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `tv`
--
ALTER TABLE `tv`
  ADD PRIMARY KEY (`tvid`),
  ADD UNIQUE KEY `tv_neve` (`tv_modell`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `emailcim` (`emailcim`),
  ADD UNIQUE KEY `username` (`username`);

--
-- A tábla indexei `vasarlas`
--
ALTER TABLE `vasarlas`
  ADD KEY `fk_vasarlas_tv` (`tvid`),
  ADD KEY `fk_vasarlas_user` (`userid`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `tv`
--
ALTER TABLE `tv`
  MODIFY `tvid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `vasarlas`
--
ALTER TABLE `vasarlas`
  ADD CONSTRAINT `fk_vasarlas_tv` FOREIGN KEY (`tvid`) REFERENCES `tv` (`tvid`),
  ADD CONSTRAINT `fk_vasarlas_user` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
