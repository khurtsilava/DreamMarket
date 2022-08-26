-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июл 26 2021 г., 18:49
-- Версия сервера: 10.4.14-MariaDB
-- Версия PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `imageURL` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `discounted price` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `description` varchar(1000) NOT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `imageURL`, `name`, `category`, `discounted price`, `price`, `description`, `views`, `datetime`) VALUES
(5, 'https://cdn.vox-cdn.com/thumbor/v97OD-MBgNjw8p5crApucVs9RB8=/0x0:2050x1367/1800x1800/filters:focal(1025x684:1026x685)/cdn.vox-cdn.com/uploads/chorus_asset/file/22022572/bfarsace_201106_4269_012.0.jpg', 'phone 1', 'phone', NULL, 2000, 'The iPhone 4 is a smartphone that was designed and marketed by Apple Inc. It is the fourth generation of the iPhone lineup, succeeding the iPhone 3GS and preceding the 4S. Following a number of notable leaks, the iPhone 4 was first unveiled on June 7, 2010, at Apple\'s Worldwide Developers Conference in San Francisco,[8] and was released on June 24, 2010, in the United States, United Kingdom, France, Germany, and Japan. The iPhone 4 introduced a new hardware design to the iPhone family, which Apple\'s CEO Steve Jobs touted as the thinnest smartphone in the world at the time; it consisted of a stainless steel frame which doubled as an antenna, with internal components situated between two panels of aluminosilicate glass.[9] The iPhone 4 also introduced Apple\'s new high-resolution \"Retina Display\" (with a pixel density of 326 pixels per inch), while maintaining the same physical size and aspect ratio as its precursors. The iPhone 4 also introduced Apple\'s A4 system-on-chip, along with iOS ', 20, '2021-05-31 16:32:26'),
(6, 'https://media.wired.com/photos/5f401ecca25385db776c0c46/master/w_2560%2Cc_limit/Gear-How-to-Apple-ios-13-home-screen-iphone-xs-06032019_big_large_2x.jpg', 'phone 2', 'phone', 2000, 2500, 'The iPhone 4 is a smartphone that was designed and marketed by Apple Inc. It is the fourth generation of the iPhone lineup, succeeding the iPhone 3GS and preceding the 4S. Following a number of notable leaks, the iPhone 4 was first unveiled on June 7, 2010, at Apple\'s Worldwide Developers Conference in San Francisco,[8] and was released on June 24, 2010, in the United States, United Kingdom, France, Germany, and Japan. The iPhone 4 introduced a new hardware design to the iPhone family, which Apple\'s CEO Steve Jobs touted as the thinnest smartphone in the world at the time; it consisted of a stainless steel frame which doubled as an antenna, with internal components situated between two panels of aluminosilicate glass.[9] The iPhone 4 also introduced Apple\'s new high-resolution \"Retina Display\" (with a pixel density of 326 pixels per inch), while maintaining the same physical size and aspect ratio as its precursors. The iPhone 4 also introduced Apple\'s A4 system-on-chip, along with iOS ', 15, '2021-05-31 16:33:17'),
(7, 'https://www.cnet.com/a/img/VBkXcDkQbmxlwfPJVfo831xwMgA=/2019/08/06/f6ac0733-a484-4a36-9b25-466b1c2ecb07/samsung-galaxy-a50-1.jpg', 'phone 3', 'phone', 3000, 4000, 'The iPhone 4 is a smartphone that was designed and marketed by Apple Inc. It is the fourth generation of the iPhone lineup, succeeding the iPhone 3GS and preceding the 4S. Following a number of notable leaks, the iPhone 4 was first unveiled on June 7, 2010, at Apple\'s Worldwide Developers Conference in San Francisco,[8] and was released on June 24, 2010, in the United States, United Kingdom, France, Germany, and Japan. The iPhone 4 introduced a new hardware design to the iPhone family, which Apple\'s CEO Steve Jobs touted as the thinnest smartphone in the world at the time; it consisted of a stainless steel frame which doubled as an antenna, with internal components situated between two panels of aluminosilicate glass.[9] The iPhone 4 also introduced Apple\'s new high-resolution \"Retina Display\" (with a pixel density of 326 pixels per inch), while maintaining the same physical size and aspect ratio as its precursors. The iPhone 4 also introduced Apple\'s A4 system-on-chip, along with iOS ', 15, '2021-05-31 16:53:25'),
(8, 'https://cdn.alzashop.com/ImgW.ashx?fd=f16&cd=SAMO0206d2', 'phone 4', 'phone', NULL, 6000, 'The iPhone 4 is a smartphone that was designed and marketed by Apple Inc. It is the fourth generation of the iPhone lineup, succeeding the iPhone 3GS and preceding the 4S. Following a number of notable leaks, the iPhone 4 was first unveiled on June 7, 2010, at Apple\'s Worldwide Developers Conference in San Francisco,[8] and was released on June 24, 2010, in the United States, United Kingdom, France, Germany, and Japan. The iPhone 4 introduced a new hardware design to the iPhone family, which Apple\'s CEO Steve Jobs touted as the thinnest smartphone in the world at the time; it consisted of a stainless steel frame which doubled as an antenna, with internal components situated between two panels of aluminosilicate glass.[9] The iPhone 4 also introduced Apple\'s new high-resolution \"Retina Display\" (with a pixel density of 326 pixels per inch), while maintaining the same physical size and aspect ratio as its precursors. The iPhone 4 also introduced Apple\'s A4 system-on-chip, along with iOS ', 15, '2021-05-31 16:56:25'),
(9, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRVJ2az8NVrAJYSbmMKTmFDye0O_SSbtyl9Tg&usqp=CAU', 'phone 5', 'phone', 5000, 5500, 'The iPhone 4 is a smartphone that was designed and marketed by Apple Inc. It is the fourth generation of the iPhone lineup, succeeding the iPhone 3GS and preceding the 4S. Following a number of notable leaks, the iPhone 4 was first unveiled on June 7, 2010, at Apple\'s Worldwide Developers Conference in San Francisco,[8] and was released on June 24, 2010, in the United States, United Kingdom, France, Germany, and Japan. The iPhone 4 introduced a new hardware design to the iPhone family, which Apple\'s CEO Steve Jobs touted as the thinnest smartphone in the world at the time; it consisted of a stainless steel frame which doubled as an antenna, with internal components situated between two panels of aluminosilicate glass.[9] The iPhone 4 also introduced Apple\'s new high-resolution \"Retina Display\" (with a pixel density of 326 pixels per inch), while maintaining the same physical size and aspect ratio as its precursors. The iPhone 4 also introduced Apple\'s A4 system-on-chip, along with iOS ', 28, '2021-05-31 16:58:10'),
(10, 'https://img.global.news.samsung.com/uk/wp-content/uploads/2020/05/SM_217_GalaxyA21s_Blue_Back1.jpg', 'phone 6', 'phone', NULL, 4000, 'The iPhone 4 is a smartphone that was designed and marketed by Apple Inc. It is the fourth generation of the iPhone lineup, succeeding the iPhone 3GS and preceding the 4S. Following a number of notable leaks, the iPhone 4 was first unveiled on June 7, 2010, at Apple\'s Worldwide Developers Conference in San Francisco,[8] and was released on June 24, 2010, in the United States, United Kingdom, France, Germany, and Japan. The iPhone 4 introduced a new hardware design to the iPhone family, which Apple\'s CEO Steve Jobs touted as the thinnest smartphone in the world at the time; it consisted of a stainless steel frame which doubled as an antenna, with internal components situated between two panels of aluminosilicate glass.[9] The iPhone 4 also introduced Apple\'s new high-resolution \"Retina Display\" (with a pixel density of 326 pixels per inch), while maintaining the same physical size and aspect ratio as its precursors. The iPhone 4 also introduced Apple\'s A4 system-on-chip, along with iOS ', 30, '2021-05-31 16:59:09'),
(11, 'https://img.global.news.samsung.com/global/wp-content/uploads/2018/09/galaxy-a7_main_1.jpg', 'phone 7', 'phone', 5000, 8000, 'The iPhone 4 is a smartphone that was designed and marketed by Apple Inc. It is the fourth generation of the iPhone lineup, succeeding the iPhone 3GS and preceding the 4S. Following a number of notable leaks, the iPhone 4 was first unveiled on June 7, 2010, at Apple\'s Worldwide Developers Conference in San Francisco,[8] and was released on June 24, 2010, in the United States, United Kingdom, France, Germany, and Japan. The iPhone 4 introduced a new hardware design to the iPhone family, which Apple\'s CEO Steve Jobs touted as the thinnest smartphone in the world at the time; it consisted of a stainless steel frame which doubled as an antenna, with internal components situated between two panels of aluminosilicate glass.[9] The iPhone 4 also introduced Apple\'s new high-resolution \"Retina Display\" (with a pixel density of 326 pixels per inch), while maintaining the same physical size and aspect ratio as its precursors. The iPhone 4 also introduced Apple\'s A4 system-on-chip, along with iOS ', 96, '2021-05-31 17:00:10'),
(12, 'https://images.unsplash.com/photo-1587145820266-a5951ee6f620?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80', 'calculator', 'calculator', NULL, 40, 'cool calculator with various widgeds', 147, '2021-06-02 20:21:00'),
(13, 'https://assets.adidas.com/images/h_840,f_auto,q_auto:sensitive,fl_lossy/38277b478a79419abf6da998000ab640_9366/Runfalcon_Shoes_Black_F36218_01_standard.jpg', 'shoes', 'shoes', NULL, 200, 'Deals up to 75% off along with FREE Shipping on shoes, boots, sneakers, and sandals at Shoes.com. Shop top brands like Skechers, Clarks, Dr. Martens, Vans', 33, '2021-06-08 16:34:52');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
