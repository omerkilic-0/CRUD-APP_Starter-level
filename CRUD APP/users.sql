-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 01 Eyl 2023, 09:55:15
-- Sunucu sürümü: 10.4.28-MariaDB
-- PHP Sürümü: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `users`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `nodejs_comment`
--

CREATE TABLE `nodejs_comment` (
  `id` int(11) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `comment` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `nodejs_comment`
--

INSERT INTO `nodejs_comment` (`id`, `user_name`, `comment`) VALUES
(1, 'Ömer Kılıç', 'Bu makale oldukça yararlı oldu :)');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `php_comment`
--

CREATE TABLE `php_comment` (
  `id` int(11) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `comment` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `python_comment`
--

CREATE TABLE `python_comment` (
  `id` int(11) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `comment` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `user_type` varchar(250) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `user_name`, `email`, `password`, `user_type`) VALUES
(2, 'admin1', 'admin1@gmail.com', '$2y$10$O3p7casjF6e0ChKyF3raWeZd4P4f7HIRj8bNw8Axc1h24SjX2nAR.', 'admin'),
(3, 'kullanici1', 'admin1@gmail.com', '$2y$10$/8/04k12kFwqjrXBP6hhwerdP61OVG/zUrTmXSGh/b5DBwX6iU7.e', 'user'),
(4, 'admin22', 'admin22@gmail.com', '$2y$10$zNQQ3Ar.gOpYTNx1NWe3hOapQcqjc7yv5iYn7qG/jjLUqCjKcss3C', 'user');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `nodejs_comment`
--
ALTER TABLE `nodejs_comment`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `php_comment`
--
ALTER TABLE `php_comment`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `python_comment`
--
ALTER TABLE `python_comment`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `nodejs_comment`
--
ALTER TABLE `nodejs_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `php_comment`
--
ALTER TABLE `php_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `python_comment`
--
ALTER TABLE `python_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
