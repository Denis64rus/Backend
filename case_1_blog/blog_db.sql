-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 26 2023 г., 21:39
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
-- База данных: `blog_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `admin`
--

INSERT INTO `admin` (`id`, `first_name`, `last_name`, `username`, `password`) VALUES
(1, 'Denis', 'Sidnev', 'admin', '$2y$10$v21Aj5IPyPde04lLEEDlKOK5aBaxdhC152z5KLaUCH/BoTeznW7t2');

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `category` varchar(127) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `category`) VALUES
(1, 'Fullstack'),
(2, 'Frontend'),
(3, 'Backend');

-- --------------------------------------------------------

--
-- Структура таблицы `comment`
--

CREATE TABLE `comment` (
  `comment_id` int NOT NULL,
  `comment` varchar(255) NOT NULL,
  `user_id` int NOT NULL,
  `post_id` int NOT NULL,
  `crated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `comment`
--

INSERT INTO `comment` (`comment_id`, `comment`, `user_id`, `post_id`, `crated_at`) VALUES
(9, 'Интересная статья)))', 5, 8, '2023-10-05 19:42:19');

-- --------------------------------------------------------

--
-- Структура таблицы `post`
--

CREATE TABLE `post` (
  `post_id` int NOT NULL,
  `post_title` varchar(127) NOT NULL,
  `post_text` text NOT NULL,
  `category` int NOT NULL,
  `publish` int NOT NULL DEFAULT '1',
  `cover_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'default.jpg',
  `crated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `post`
--

INSERT INTO `post` (`post_id`, `post_title`, `post_text`, `category`, `publish`, `cover_url`, `crated_at`) VALUES
(8, 'Стоит ли учить PHP в 2023 году?', '<h5 class=\"card-title\" style=\"margin-bottom: var(--bs-card-title-spacer-y);\"><span style=\"font-weight: bolder; font-size: 1.25rem; text-align: var(--bs-body-text-align);\">Что из себя представляет&nbsp;PHP</span><br></h5><div><span style=\"font-weight: bolder;\"><br></span></div><div>Обычно при обсуждении языка программирования приводят его сильные стороны, поэтому я буду следовать традиции и расскажу, почему&nbsp;PHP&nbsp;– это клевый&nbsp;&nbsp;и современный язык программирования.</div><div><br></div><div><span style=\"transition: opacity 0.2s ease-in-out 0s, color 0.2s ease-in-out 0s, text-decoration 0.2s ease-in-out 0s, background-color 0.2s ease-in-out 0s, -webkit-text-decoration 0.2s ease-in-out 0s; font-weight: bolder; quotes: \" «\"=\"\" \"»\";=\"\" -webkit-font-smoothing:=\"\" antialiased;\"=\"\">Отличная производительность.&nbsp;</span>Команда&nbsp;CORE PHP&nbsp;разработчиков выполнила гигантскую работу по оптимизации&nbsp;PHP&nbsp;и сделала его более производительным. Так, например, в своей&nbsp;<a href=\"http://blogerator.org/page/php-7-kritikujte-dalshe-a-my-budem-rabotat-stogov\" rel=\"noopener noreferrer nofollow\" style=\"color: rgb(84, 142, 170); text-decoration-line: none; transition: opacity 0.2s ease-in-out 0s, color 0.2s ease-in-out 0s, text-decoration 0.2s ease-in-out 0s, background-color 0.2s ease-in-out 0s, -webkit-text-decoration 0.2s ease-in-out 0s; background-color: initial; quotes: \" «\"=\"\" \"»\";\"=\"\">статье</a>&nbsp;Дмитрий Стогов приводит бенчмарк для версии&nbsp;PHP&nbsp;7.0, где демонстрируется, что&nbsp;PHP&nbsp;обходит по производительности своих конкурентов, таких как&nbsp;Python&nbsp;и&nbsp;Ruby,&nbsp;и даже не сильно отстает от&nbsp;Java&nbsp;с выключенным&nbsp;&nbsp;JIT.</div><div><br style=\"color: rgb(33, 37, 41);\"></div>			    			    			    			    ', 3, 1, 'COVER-6516fa79dff0b2.48133551.jpg', '2023-09-29 19:25:29'),
(10, 'PHP - Язык программирования', '<div class=\"entity-search__header-wrapper\" style=\"font-family: \" ys=\"\" text\",=\"\" arial,=\"\" helvetica,=\"\" \"arial=\"\" unicode=\"\" ms\",=\"\" sans-serif;=\"\" font-size:=\"\" 13px;\"=\"\"><div class=\"entity-search__header\"><div class=\"serp-title serp-title_type_supertitle serp-title_font-weight_bold typo typo_text_xxl typo_line_m entity-search__title\" role=\"heading\" aria-level=\"2\" data-log-node=\"2_eswd2u\" style=\"font-family: \" ys=\"\" text\",=\"\" arial,=\"\" helvetica,=\"\" \"arial=\"\" unicode=\"\" ms\",=\"\" sans-serif;=\"\" line-height:=\"\" var(--depot-text-xxl-line-m);=\"\" font-size:=\"\" var(--depot-text-xxl);=\"\" word-break:=\"\" break-word;=\"\" overflow-wrap:=\"\" color:=\"\" var(--depot-color-text-primary);=\"\" position:=\"\" relative;=\"\" font-weight:=\"\" 700;\"=\"\"><span style=\"font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align); color: var(--depot-color-text-primary); font-size: var(--depot-text-xxl);\">Интерпретируемый скриптовый язык программирования общего назначения.</span><br></div></div></div><div class=\"entity-search__badge entity-search__badge_has-facts\" data-log-node=\"2_eswd2w\" style=\"margin-top: 26px; font-family: \" ys=\"\" text\",=\"\" arial,=\"\" helvetica,=\"\" \"arial=\"\" unicode=\"\" ms\",=\"\" sans-serif;=\"\" font-size:=\"\" 13px;\"=\"\"><div class=\"entity-search__description entity-search__description_wiki-button\" style=\"margin-top: 26px;\"><div class=\"Description\"><div class=\"Description-Item\"><label class=\"ExtendedText ExtendedText_arrow extended-text\" style=\"pointer-events: none; overflow: hidden;\"><span class=\"ExtendedText-Full\" style=\"display: inline;\"><div>Название представляет собой рекурсивный акроним PHP: Hypertext Preprocessor (PHP: предварительный обработчик гипертекста), но изначально оно расшифровывалось как Personal Home Page Tools (Инструменты для создания персональных веб-страниц).</div><div>За более чем 20 лет PHP прошёл путь от простого набора скриптов до полноценного языка веб-программирования и стабильно входит в топ-10 популярных языков по версии TIOBE.</div><div>PHP создали специально для разработки веб-страниц. На нём можно делать ресурсы любой сложности: от простого лендинга до социальной сети — именно на PHP написана «ВКонтакте». Код на PHP легко встраивается в классический HTML — нужно всего лишь добавить соответствующий тег.</div><div>Язык поддерживают все популярные операционные системы: Windows, macOS, Linux, UNIX и не только. А ещё PHP позволяет работать с такими веб-серверами, как IIS в Windows и Apache в macOS и Linux.</div><div>Благодаря такой широкой совместимости у разработчиков практически нет ограничений в выборе веб-сервера и операционной системы.</div>&nbsp;<span class=\"Link Link_theme_neoblue ExtendedText-Toggle\" aria-hidden=\"true\" data-counter=\"[\" b\"]\"=\"\" data-log-node=\"2_eswdw0f-04\" target=\"_blank\" style=\"color: var(--depot-color-text-quaternary); text-wrap: nowrap; pointer-events: auto; cursor: pointer; outline: 0px; touch-action: manipulation; -webkit-tap-highlight-color: transparent; position: relative; padding-right: 16px;\">Скрыть</span></span></label><div class=\"EntitySearchHint Description-Source\" style=\"color: var(--depot-color-text-quaternary); padding-top: 2px;\"><a href=\"https://skillbox.ru/media/code/php_ot_istokov_do_sovremennosti/\" data-counter=\"[\" b\"]\"=\"\" data-log-node=\"2_eswdw0f-06\" class=\"Link Link_theme_normal\" target=\"_blank\" style=\"cursor: pointer; text-decoration-line: none; outline: 0px; touch-action: manipulation; -webkit-tap-highlight-color: transparent;\">skillbox.ru</a></div></div></div></div><div class=\"entity-search__facts-wrapper entity-search__facts-wrapper_gap-m\" style=\"margin-top: 16px;\"><div class=\"EntityCardFacts\"><ul class=\"KeyValue KeyValue_layout_default KeyValue_gap_l\" aria-label=\"Факты об объекте\" style=\"margin: 0px; padding-left: 0px; list-style-type: none; color: var(--depot-color-text-secondary);\"><li class=\"KeyValue-Row\"><div class=\"KeyValue-ItemTitle\" style=\"font-weight: 700; line-height: 1; display: inline;\">Год выхода:&nbsp;</div><div class=\"KeyValue-ItemValueWrapper\" style=\"display: inline;\">1995 г.</div></li><li class=\"KeyValue-Row EntityCardFacts-Website\" style=\"overflow: hidden; text-wrap: nowrap; text-overflow: ellipsis; margin-top: 9px;\"><div class=\"KeyValue-ItemTitle\" style=\"font-weight: 700; line-height: 1; display: inline;\">Сайт:&nbsp;</div><div class=\"KeyValue-ItemValueWrapper\" style=\"display: inline;\"><div class=\"KeyValue-ItemValue\" style=\"display: inline;\"><a target=\"_blank\" href=\"https://www.php.net/\" data-counter=\"[\" b\"]\"=\"\" data-log-node=\"2_eswdw0h-02\" class=\"Link Link_theme_normal\" style=\"cursor: pointer; text-decoration-line: none; outline: 0px; touch-action: manipulation; -webkit-tap-highlight-color: transparent;\">php.net</a></div></div></li></ul></div></div></div>			    			    ', 3, 1, 'COVER-6517e6ab2d7604.04981898.png', '2023-09-30 12:13:15'),
(13, 'Как освоить PHP с нуля за 30 минут?', '<div>PHP (от англ.&nbsp;<span style=\"font-weight: bolder;\">препроцессор гипертекста</span>) – язык программирования общего назначения, широко используемый в веб-разработке. Сценарии PHP можно внедрять непосредственно в код HTML. В этой статье мы пройдемся по основам программирования на PHP: синтаксису, объявлению переменных, массивам, условным операторам, циклам и функциям. Также запустим двумя способами веб-сервер на локальной машине и соберем страничку из нескольких файлов PHP и фреймворка Bootstrap. В конце статьи приведем список литературы и бесплатные курсы по PHP для новичков.</div><h2 style=\"margin-top: 20px; margin-bottom: 20px; font-family: var(--header-font); text-rendering: optimizelegibility; font-size: 22px; color: rgb(51, 58, 77);\">Редакторы кода</h2><div>Для удобного кодинга нам понадобится редактор кода (IDE). Популярные:</div><ul style=\"margin: 20px 0px 20px 20px; padding-left: 0px; list-style-position: inside; color: rgb(51, 58, 77); font-family: Roboto, &quot;PT Sans&quot;, sans-serif;\"><li style=\"margin-top: 0.5em; margin-bottom: 0.5em;\"><a href=\"https://www.jetbrains.com/ru-ru/phpstorm/\" target=\"_blank\" rel=\"noopener noreferrer nofollow\" style=\"background-color: transparent; text-decoration-line: none; cursor: pointer;\">PhpStorm</a>&nbsp;(платный, пробная версия на 30 дней);</li><li style=\"margin-top: 0.5em; margin-bottom: 0.5em;\"><a href=\"https://atom.io/\" target=\"_blank\" rel=\"noopener noreferrer nofollow\" style=\"background-color: transparent; text-decoration-line: none; cursor: pointer;\">Atom</a>&nbsp;(бесплатно);</li><li style=\"margin-top: 0.5em; margin-bottom: 0.5em;\"><a href=\"https://code.visualstudio.com/\" target=\"_blank\" rel=\"noopener noreferrer nofollow\" style=\"background-color: transparent; text-decoration-line: none; cursor: pointer;\">Visual Studio Code</a>&nbsp;(бесплатно);</li><li style=\"margin-top: 0.5em; margin-bottom: 0.5em;\"><a href=\"https://www.sublimetext.com/\" target=\"_blank\" rel=\"noopener noreferrer nofollow\" style=\"background-color: transparent; text-decoration-line: none; cursor: pointer;\">Sublime Text</a>&nbsp;(бесплатно).</li></ul>', 2, 1, 'COVER-651b0d68666f45.53763881.jpg', '2023-09-30 13:03:57');

-- --------------------------------------------------------

--
-- Структура таблицы `post_like`
--

CREATE TABLE `post_like` (
  `like_id` int NOT NULL,
  `liked_by` int NOT NULL,
  `post_id` int NOT NULL,
  `liked_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `fname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `fname`, `username`, `password`) VALUES
(3, 'Den Sid', 'Den', '$2y$10$VJihQovzV2iU.S15ylvEVe/SsAdq5KrvjN5nlfEnyBK5uMv4ER9QW'),
(4, 'Anna Delvey', 'heiress', '$2y$10$j716BsEb7ACsxtUSaXQdzeTrUwHDIg1zt2t57zBhl2cSb6TZwL.RK'),
(5, 'Denis', 'Denis64rus', '$2y$10$ZHwCqsrOtQfx8487A11mUOa4EkiG6WZ.4UEmB0ImqqHllrn//.zEu'),
(6, 'Deni', 'Deni', '$2y$10$d/BZmRkuixseWGcppZvGrOueupkElXTQy7LMOM7DHO/hm54g4q.LS'),
(7, 'Denis', 'user', '$2y$10$2AM0wWpxS4nxwHW1k7sFluMCljy33/pOXfIUVbGnYcqIFQ7iEvqke');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Индексы таблицы `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Индексы таблицы `post_like`
--
ALTER TABLE `post_like`
  ADD PRIMARY KEY (`like_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `post_like`
--
ALTER TABLE `post_like`
  MODIFY `like_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
