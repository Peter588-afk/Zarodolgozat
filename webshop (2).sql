-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2021. Jan 12. 13:15
-- Kiszolgáló verziója: 10.4.14-MariaDB
-- PHP verzió: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `webshop`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(60) COLLATE utf8_hungarian_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `password` varchar(256) COLLATE utf8_hungarian_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_hungarian_ci NOT NULL,
  `avatar` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `password`, `phone`, `avatar`, `address`) VALUES
(1, 'epeti', '', 'qwe@qwe.com', '$2y$10$pzJAiwwG', 'avatar/epeti.png', ''),
(2, 'rtz', '', 'rtz', '$2y$10$0KVlzKUz', 'avatar/rtz.png', ''),
(3, 'yxc', 'yxc', '$2y$10$6mAAEvxWpJNKV2ZGz/nkBuPtDs/TqiIvK/snU1MH3VCrBTKhvfryC', '456', 'avatar/yxc.png', ''),
(4, 'fgh', 'fgh', '$2y$10$lPentqo3ATjxGF2h5zjPROc2KfQwW9BwHLeI1WICENCUhOw1BIlqC', '0123', 'avatar/fgh.png', ''),
(5, 'asd', 'asd@asd.com', '$2y$10$Cgi1mCrgUwNp9LQtGDa8lezOyL32TRN12aKPEr/Iso65IU6znOOPe', '123', 'avatar/asd.png', ''),
(6, 'Peter', 'ecsegi.peter@gmail.com', '$2y$10$rHTisxFKCyQxuTDUsWx8V.ecnvKQLPESEsMwfHqjEFcyiizEUiGg.', '1234', '', 'asd u 6');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kategoria`
--

CREATE TABLE `kategoria` (
  `id` int(11) NOT NULL,
  `leiras` varchar(100) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `kategoria`
--

INSERT INTO `kategoria` (`id`, `leiras`) VALUES
(1, 'utcai'),
(2, 'kosar'),
(3, 'papucs'),
(4, 'polo'),
(5, 'pulcsi'),
(6, 'nadrag'),
(7, 'sapka'),
(8, 'taska'),
(9, 'labda');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kosar`
--

CREATE TABLE `kosar` (
  `id` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `idTermek` int(11) NOT NULL,
  `darab` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `kosar`
--

INSERT INTO `kosar` (`id`, `idTermek`, `darab`) VALUES
('59h78188o0opq6nqu56et22q90', 9, 1),
('4biivf9c1f1220cnagajmlcf5i', 5, 1),
('65aipgb8t61r20kcdm002kof0l', 5, 1),
('65aipgb8t61r20kcdm002kof0l', 9, 1),
('65aipgb8t61r20kcdm002kof0l', 9, 1),
('4m7u50pgnmevs4htagd7sm7194', 9, 1),
('c6l3gjlcsfn7ftr9v5g104m74r', 6, 1),
('q0ev8hi7253j4laoftmgkhqrrb', 8, 1),
('q0ev8hi7253j4laoftmgkhqrrb', 6, 1),
('cqb3qs8hpkkpgqdrvgcm5kbgcg', 5, 1),
('g1ostt4nne9qgl60c8k9u6kg1t', 8, 1),
('mf97i3s1aj0gnhlc68hc6gi7jf', 4, 1),
('mf97i3s1aj0gnhlc68hc6gi7jf', 9, 1),
('mf97i3s1aj0gnhlc68hc6gi7jf', 6, 1),
('mf97i3s1aj0gnhlc68hc6gi7jf', 8, 1),
('3jjdjug4d1cb78v1vojpkuh4l3', 8, 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `total` int(100) NOT NULL,
  `status` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `total`, `status`) VALUES
(1, 3, 111111, '2021-01-05'),
(2, 3, 111111, '2021-01-05'),
(3, 3, 111111, '2021-01-05'),
(4, 3, 111111, '2021-01-05'),
(5, 3, 111111, '2021-01-05'),
(6, 3, 111111, '2021-01-05'),
(7, 3, 353333, '2021-01-05'),
(8, 3, 343333, '2021-01-06'),
(9, 6, 312222, '2021-01-11'),
(10, 6, 171111, '2021-01-11'),
(11, 6, 322222, '2021-01-11');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`) VALUES
(3, 6, 10, 1),
(4, 7, 20, 3),
(5, 7, 1, 2),
(6, 8, 20, 3),
(7, 8, 1, 1),
(8, 9, 3, 3),
(9, 9, 27, 2),
(10, 10, 3, 2),
(11, 10, 11, 1),
(12, 11, 5, 2),
(13, 11, 10, 2);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_hungarian_ci NOT NULL,
  `price` int(10) NOT NULL,
  `picture` varchar(60) COLLATE utf8_hungarian_ci NOT NULL,
  `kategId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `picture`, `kategId`) VALUES
(1, 'Concord', 10000, 'images/utcai1.jpg', 1),
(2, 'Freak 2', 20000, 'images/kosar1.jpg', 2),
(3, 'Papucs', 30000, 'images/papucs1.jpg', 3),
(4, 'Polo', 40000, 'images/polo1.jpg', 4),
(5, 'Pulcsi', 50000, 'images/pulcsi1.jpg', 5),
(6, 'Nadrag', 60000, 'images/nadrag1.jpg', 6),
(7, 'Sapka', 70000, 'images/sapka1.jpg', 7),
(8, 'Taska', 80000, 'images/taska1.jpg', 8),
(9, 'Labda', 90000, 'images/labda1.jpg', 9),
(10, 'utcai2', 111111, 'images/utcai2.jpg', 1),
(11, 'utcai3', 111111, 'images/utcai3.jpg', 1),
(12, 'kosar2', 111111, 'images/kosar2.jpg', 2),
(13, 'kosar3', 111111, 'images/kosar3.jpg', 2),
(14, 'papucs2', 111111, 'images/papucs2.jpg', 3),
(15, 'papucs3', 111111, 'images/papucs3.jpg', 3),
(16, 'polo2', 111111, 'images/polo2.jpg', 4),
(17, 'polo3', 111111, 'images/polo3.jpg', 4),
(18, 'pulcsi2', 111111, 'images/pulcsi2.jpg', 5),
(19, 'pulcsi3', 111111, 'images/pulcsi3.jpg', 5),
(20, 'nadrag2', 111111, 'images/nadrag2.jpg', 6),
(21, 'nadrag3', 111111, 'images/nadrag3.jpg', 6),
(22, 'sapka2', 111111, 'images/sapka2.jpg', 7),
(23, 'sapka3', 111111, 'images/sapka3.jpg', 7),
(24, 'taska2', 111111, 'images/taska2.jpg', 8),
(25, 'taska3', 111111, 'images/taska3.jpg', 8),
(26, 'labda2', 111111, 'images/labda2.jpg', 9),
(27, 'labda3', 111111, 'images/labda3.jpg', 9);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `termekek`
--

CREATE TABLE `termekek` (
  `id` int(11) NOT NULL,
  `nev` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `ar` int(11) NOT NULL,
  `foto` varchar(50) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `termekek`
--

INSERT INTO `termekek` (`id`, `nev`, `ar`, `foto`) VALUES
(1, 'Concord', 10000, 'images/utcai1.jpg'),
(2, 'Freak 2', 20000, 'images/kosar1.jpg'),
(3, 'Papucs', 30000, 'images/papucs1.jpg'),
(4, 'Polo', 40000, 'images/polo1.jpg'),
(5, 'Pulcsi', 50000, 'images/pulcsi1.jpg'),
(6, 'Nadrag', 60000, 'images/nadrag1.jpg'),
(7, 'Sapka', 70000, 'images/sapka1.jpg'),
(8, 'Taska', 80000, 'images/taska1.jpg'),
(9, 'Labda', 90000, 'images/labda1.jpg');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `kategoria`
--
ALTER TABLE `kategoria`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `kosar`
--
ALTER TABLE `kosar`
  ADD KEY `idTermek` (`idTermek`);

--
-- A tábla indexei `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- A tábla indexei `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- A tábla indexei `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategId` (`kategId`);

--
-- A tábla indexei `termekek`
--
ALTER TABLE `termekek`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT a táblához `kategoria`
--
ALTER TABLE `kategoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT a táblához `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT a táblához `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT a táblához `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT a táblához `termekek`
--
ALTER TABLE `termekek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `kosar`
--
ALTER TABLE `kosar`
  ADD CONSTRAINT `kosar_ibfk_1` FOREIGN KEY (`idTermek`) REFERENCES `termekek` (`id`);

--
-- Megkötések a táblához `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Megkötések a táblához `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Megkötések a táblához `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`kategId`) REFERENCES `kategoria` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
