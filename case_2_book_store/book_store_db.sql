-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 26 2023 г., 21:41
-- Версия сервера: 8.0.30
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `book_store_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `admin`
--

INSERT INTO `admin` (`id`, `full_name`, `email`, `password`) VALUES
(1, 'Denis', 'sidnevd2000@mail.ru', '$2y$10$1.pefWKpqdgcdiQ5QTrGjO5wgRG5kb5V1nNmB6Mo8SUU4cpHigjuS');

-- --------------------------------------------------------

--
-- Структура таблицы `authors`
--

CREATE TABLE `authors` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `authors`
--

INSERT INTO `authors` (`id`, `name`) VALUES
(1, 'Джон Дакетт'),
(2, 'Шмитт и Симпсон'),
(3, 'Дэвид Макфарланд'),
(4, 'Эрик А. Мейер'),
(5, 'Николас Закас'),
(6, 'Майк МакГрат'),
(7, 'Линн Бейли');

-- --------------------------------------------------------

--
-- Структура таблицы `books`
--

CREATE TABLE `books` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `author_id` int NOT NULL,
  `description` text NOT NULL,
  `category_id` int NOT NULL,
  `cover` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `books`
--

INSERT INTO `books` (`id`, `title`, `author_id`, `description`, `category_id`, `cover`, `file`) VALUES
(1, 'HTML и CSS: Все что нужно знать.', 1, 'Эта книга - самый простой и интересный способ изучить HTML и CSS. Независимо от стоящей перед вами задачи: спроектировать и разработать веб-сайт с нуля или получить больше контроля над уже существующим сайтом, эта книга поможет вам создать привлекательный, дружелюбный к пользователю веб-контент. ', 1, '1. HTML_ Джон_Дакетт.jpg', '1. Дакетт Джон_HTML и CSS_Все что нужно знать_2013.pdf'),
(2, 'HTML5: Рецепты программирования.', 2, 'Эта книга, представляющая собой сборник рецептов и готовых решений, позволит вам получить практический опыт работы с основными элементами HTML5.', 1, '1. HTML_Шмитт_Симпсон.jpg', '1. Шмитт Кристофер, Симпсон Кайл_HTML5. Рецепты программирования_2012.pdf'),
(3, 'Новая большая книга по CSS3.', 3, 'Технология CSS3 позволяет создавать профессионально оформленные сайты, но тонкости этого языка могут оказаться сложными даже для опытных веб-разработчиков.', 2, '2. CSS_Дэвид_Макфарланд.jpg', '2. Макфарланд Дэвид_Новая большая книга по CSS3_2016.pdf'),
(4, 'CSS: Карманный справочник', 4, 'Краткий справочник по CSS. Все самое важное и необходимое. Кратко и быстро. ', 2, '2. CSS_Эрик_А_Мейер.jpg', '2. А.Мейер Эрик_CSS. Карманный справочник_2016.pdf'),
(5, 'JavaScript и jQuery. Интерактивная разработка.', 1, 'Эта книга - самый простой и интересный способ изучить JavaScript и jQuery.', 3, '3. JS_ Джон_Дакетт.jpg', '3. Дакетт Джон_JavaScript и jQuery. Интерактивная разработка_2017.pdf'),
(6, 'JavaScript. Оптимизация производительности.', 5, 'Эта книга откроет вам приемы и стратегии, которые помогут в ходе разработки устранить узкие места, влекущие за собой снижение производительности.', 3, '3. JS_Николас_Закас.jpg', '3. Закас Николас_JavaScript. Оптимизация производительности_2012.pdf'),
(7, 'PHP 7 для начинающих с пошаговыми инструкциями.', 6, 'Посвященная самому популярному на сегодняшний день языку программирования, эта книга помогает освоить азы PHP7 даже тем новичкам, которые не знакомы с этим языком, а также с программированием вообще.', 4, '4. PHP_Майк_МакГрат.jpg', '4. МакГрат Майкл_PHP 7 для начинающих с пошаговыми инструкциями_2018.pdf'),
(8, 'Изучаем SQL.', 7, 'В современном мире наивысшую ценность имеет информация, но не менее важно уметь этой информацией управлять. Эта книга посвящена языку запросов SQL и управлению базами данных.', 5, '5. SQL_Линн_Бейли.jpg', '5. Бейли Линн_Изучаем SQL_2012.pdf');

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'HTML'),
(2, 'CSS'),
(3, 'JavaScript'),
(4, 'PHP'),
(5, 'SQL');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `books`
--
ALTER TABLE `books`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
