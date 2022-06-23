-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 23 Haz 2022, 19:18:59
-- Sunucu sürümü: 10.4.18-MariaDB
-- PHP Sürümü: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `ecommerce`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `address` text NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `order`
--

INSERT INTO `order` (`order_id`, `product_id`, `user_id`, `quantity`, `price`, `address`, `order_date`, `update_date`) VALUES
(1, 1, 5, 22, 11, 'Davutpaşa mah. 123 sk no:12 Bağcılar/İstanbu', '2022-06-23 11:55:18', '2022-06-23 17:08:14'),
(2, 2, 5, 13, 11, 'Davutpaşa mah. 123 sk no:12 Bağcılar/İstanbu', '2022-06-23 11:51:55', '2022-06-23 17:08:12'),
(3, 1, 2, 44, 14, 'Davutpaşa mah. 123 sk no:12 Bağcılar/İstanbu', '2022-06-23 11:46:50', '2022-06-23 17:08:47'),
(4, 1, 1, 2, 33, 'Davutpaşa mah. 123 sk no:12 Bağcılar/İstanbu', '2022-06-23 07:09:00', '2022-06-23 11:46:52'),
(5, 1, 3, 2, 66, 'Davutpaşa mah. 123 sk no:12 Bağcılar/İstanbu', '2022-06-23 07:10:17', '2022-06-23 17:08:43'),
(6, 1, 5, 2, 33, 'Davutpaşa mah. 123 sk no:12 Bağcılar/İstanbu', '2022-06-23 07:10:24', '2022-06-23 11:46:43'),
(7, 1, 5, 2, 22, 'Davutpaşa mah. 123 sk no:12 Bağcılar/İstanbu', '2022-06-23 07:11:34', '2022-06-23 17:08:39'),
(8, 1, 5, 2, 33, 'Davutpaşa mah. 123 sk no:12 Bağcılar/İstanbu', '2022-06-23 07:15:02', '2022-06-23 11:46:48'),
(9, 2, 5, 121, 44, 'Davutpaşa mah. 123 sk no:12 Bağcılar/İstanbu', '2022-06-23 11:11:28', '2022-06-23 17:08:55'),
(10, 1, 5, 21, 88, 'Davutpaşa mah. 123 sk no:12 Bağcılar/İstanbu', '2022-06-23 11:12:52', '2022-06-23 17:08:58'),
(11, 1, 5, 1, 5, 'Davutpaşa mah. 123 sk no:12 Bağcılar/İstanbu', '2022-06-23 11:13:23', '2022-06-23 17:09:01'),
(12, 2, 5, 2, 12, 'Davutpaşa mah. 123 sk no:12 Bağcılar/İstanbu', '2022-06-23 11:15:16', '2022-06-23 17:08:28'),
(13, 2, 5, 2, 15, 'Davutpaşa mah. 123 sk no:12 Bağcılar/İstanbu', '2022-06-23 11:16:15', '2022-06-23 17:08:25'),
(14, 2, 9, 2, 13, 'istanbul/türkiye', '2022-06-23 13:37:31', '2022-06-23 13:45:03');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `product`
--

INSERT INTO `product` (`product_id`, `name`, `price`, `stok`) VALUES
(1, 'Ayakkabı', 1346, 12),
(2, 'Spor Ayakkabı', 789, 19),
(3, 'Süpürge', 144, 33),
(4, 'Televizyon', 3300, 44);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `transactioncode` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `user`
--

INSERT INTO `user` (`user_id`, `name`, `surname`, `username`, `password`, `transactioncode`, `status`) VALUES
(1, 'Cüneyt', 'Durgun', 'cbeyt', 'cc03e747a6afbbcbf8be7668acfebee5', '155513afb93ed10274129f387601ac00', 1),
(2, 'Betül', 'Demir', 'btldmr', 'cc03e747a6afbbcbf8be7668acfebee5', '', 1),
(3, 'Ceylan', 'Türkoğlu', 'ceylan55', 'cc03e747a6afbbcbf8be7668acfebee5', '', 1),
(4, 'Hasan', 'Yıldırım', 'hsnyildirim', 'cc03e747a6afbbcbf8be7668acfebee5', '', 1),
(5, 'Osman', 'Şentürk', 'osman89', 'cc03e747a6afbbcbf8be7668acfebee5', '', 1),
(6, 'Ahmet', 'Yetkin', 'aliyetkin', '84e204e8f8419b340e1272d67e9aedcd', '', 1),
(7, 'Veli', 'Yılmaz', 'veli33', '8ccc140d3ffd2a683eaddbfcfb45d040', '', 1),
(8, 'Bülent', 'Has', 'has44', 'cc03e747a6afbbcbf8be7668acfebee5', '', 0),
(10, 'Kadriye', 'Yalçın', 'kdr_yal', 'cc03e747a6afbbcbf8be7668acfebee5', '', 0);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Tablo için indeksler `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Tablo için indeksler `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Tablo için AUTO_INCREMENT değeri `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
