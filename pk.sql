-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 26 2020 г., 14:00
-- Версия сервера: 5.6.43
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `pk`
--

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `id` int(11) NOT NULL,
  `customer` varchar(50) NOT NULL,
  `catalogid` int(11) NOT NULL,
  `quantity` float NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `basket`
--

INSERT INTO `basket` (`id`, `customer`, `catalogid`, `quantity`, `datetime`) VALUES
(5, 'multcbgq5e7gmf7i8iagpc0o44', 2, 1, '2019-12-15 02:01:17'),
(7, 'anbqkqorhb2ql43o7iah0q8hc0', 2, 1, '2019-12-16 00:31:38'),
(8, 'anbqkqorhb2ql43o7iah0q8hc0', 3, 1, '2019-12-16 00:31:41'),
(12, 'csnskgh55ka40b1bto6m2jp2i5', 17, 1, '2020-02-22 19:04:33'),
(15, '7deovim2010hlek6btdruodam4', 24, 1, '2020-02-22 20:30:52'),
(16, 'v8heomg782drg2t5h5ngkooeb6', 2, 1, '2020-02-22 21:00:39'),
(17, '1m2u7b297t8bf96p3j6grlq8b7', 23, 1, '2020-02-24 22:11:29');

-- --------------------------------------------------------

--
-- Структура таблицы `catalog`
--

CREATE TABLE `catalog` (
  `id` int(11) NOT NULL,
  `typeid` int(11) NOT NULL,
  `article` varchar(15) NOT NULL,
  `name` varchar(150) NOT NULL,
  `note` varchar(500) NOT NULL,
  `amount` int(11) NOT NULL,
  `price` float NOT NULL,
  `discount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='каталог спорт товаров';

--
-- Дамп данных таблицы `catalog`
--

INSERT INTO `catalog` (`id`, `typeid`, `article`, `name`, `note`, `amount`, `price`, `discount`) VALUES
(2, 7, '13TRNKID-R', 'Планшет Supra M74AG 7 / 5735 / 512 / 4 / And 4.4 BL планшет', 'Модель	M74AG 7/5735/512/4/And 4.4 BL планшет\r\nТип	Планшет\r\nГарантия	1 год\r\nОперационная система	Android™ 4.4 KitKat\r\nДиагональ экрана	7 \"\r\nРазрешение экрана	1024 x 600 пикс\r\nТактовая частота процессора	1200 МГц\r\nКоличество ядер	4\r\nОбъем встронной памяти	4 Гб', 3, 250, 15),
(3, 7, '14PULSE180', 'Монитор Aoc e970Swn', 'Модель	e970Swn\nТип	Монитор\nПокрытие экрана	матовый\nДиагональ экрана	18.5 \"\nРазрешение матрицы	1366 x 768 пикс', 7, 350, 20),
(4, 7, '14VG180', 'Ноутбук HP ProBook 470 G2', 'Модель	ProBook 470 G2\nТип	Ноутбук\nГарантия	1 год\nФункциональность	на каждый день\nОперационная система	DOS\nМарка процессора	Intel®\nМодель процессора	Core™ i3-5010U\nЧастота работы процессора	2100 МГц', 5, 890, 0),
(16, 7, '6881010156', 'Сумка для ноутбука Samsonite 41U*008*00', 'Модель	41U*008*00\nТип	Сумка для ноутбука\nВид	рюкзак\nМаксимальная диагональ	17.3 \"\nОбласть применения	для ноутбука\nХарактеристики	отделение-органайзер \nкарман для телефона \nзащита от воды', 2, 90, 0),
(17, 2, 'AL812', 'Кабель Xiaomi ZMI AL812', 'кабель USB 2.0 Type-A/Lightning, белый, длина 1 м', 10, 19, 5),
(18, 6, 'XIA3566', 'Смартфон Xiaomi Redmi Note8', 'Android, экран 6.3\" IPS (1080x2340), Qualcomm Snapdragon 665, ОЗУ 4 ГБ, флэш-память 64 ГБ, карты памяти, камера 48 Мп, аккумулятор 4000 мАч, 2 SIM', 10, 429, 0),
(19, 4, 'LG102', 'Игровая мышь Logitech G102 Prodigy (черный)', 'полноразмерная игровая мышь для ПК, проводная USB, сенсор оптический 8000 dpi', 36, 48, 3),
(20, 8, 'MUHN2', 'Apple MacBook Pro 13\" Touch Bar 2019', '13.3\" 2560 x 1600 IPS, Intel Core i5 8257U 1400 МГц, 8 ГБ, SSD 128 ГБ, граф. адаптер: встроенный, Mac OS, цвет крышки серый', 8, 3000, 0),
(21, 1, 'L2132', 'Монитор LG 24MK600M-B', '23.8\", 16:9, 1920x1080, IPS, 75 Гц, FreeSync, интерфейсы HDMI+D-Sub (VGA)', 12, 311, 0),
(22, 9, 'ZA2K0054UA', 'Планшет Lenovo Tab 4 10 TB-X304L 16GB LTE (черный)', '10.1\" IPS (1280x800), Android, Qualcomm MSM8917, ОЗУ 2 ГБ, флэш-память 16 ГБ, LTE', 8, 390, 0),
(23, 5, 'HDTB420EK3AA', 'Внешний накопитель Toshiba Canvio Basics 2TB (черный)', 'HDD, 2.5\", пластик, USB 3.0, 2TB, цвет черный', 13, 150, 0),
(24, 14, 'ZL77400', 'Чистящее средство ZALA ZL77400', 'Салфетки для домашней техники, для экранов', 79, 3, 0),
(25, 3, 'W1106A', 'Картридж HP 106A W1106A', 'картридж, лазерный, цвет черный, ресурс 1000 стр.', 20, 108, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `period` date NOT NULL,
  `header` varchar(50) NOT NULL,
  `text` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `period`, `header`, `text`) VALUES
(1, '2020-12-11', 'Новогодняя акция!', 'С 20 по 31 декабря новогодние скидки до 70%, спешите купить!'),
(2, '2020-10-08', 'Для оптивиков', 'Для оформления заказа необходимо предоставить документ о регистрации.'),
(4, '2020-01-09', 'Спасибо от БПС-Сбербанка!', 'С 10 января при покупке товара начисляется бонусы спасибо в размере 5% от покупки.'),
(6, '2020-08-31', 'Распродажа аксессуаров для авто!', 'С 01 сентября по 01 ноября действует скидка 15% на весь товар.'),
(7, '2020-03-05', 'Поступление новых товаров!', 'В магазине новое поступление запчастей. Успевайте!');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `V` tinyint(1) NOT NULL,
  `datetime` datetime NOT NULL,
  `fio` varchar(70) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `customer` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `V`, `datetime`, `fio`, `email`, `phone`, `address`, `customer`) VALUES
(1, 1, '2020-02-14 18:25:34', 'Иванов И.И.', 'ivanII@mail.ru', '375 33 567 88 99', 'г. Брест, ул. Советская дом3', '1hsbg98poo90hft01blar3o2r7'),
(2, 1, '2020-02-14 07:27:41', 'Сидоров Евгений Онегин', 'sidorIV@mail.ru', '8-961-152-66-42', 'г. Питер, ул. Ивановская дом3', 'lao13psinu1morl5nv2dciept7'),
(3, 1, '2020-02-14 01:50:08', 'Иванов И.И.', 'ivanII@mail.ru', '375 29 1055964', 'г. Минск, ул.Ленина дом8', '577bq4e5igmt7kbr8ebhsa6413'),
(4, 1, '2020-02-14 20:08:50', 'Петровская Марина Михайловна', 'mihaylova@mail.ru', '8 952 123 45 75', 'г. Иваново ул. Кирова 8-6', 's6gdudru2g32dp666ulaqhf9i5'),
(5, 0, '2020-02-15 20:20:01', 'Миронова Олеся', 'mironO@yandex.ru', '375 29 4536790', 'г. Воронеж, ул. Смирнова дом 5', 'c5r3nrp9b4qjrgaggnlgkd2bm5'),
(6, 0, '2020-02-15 20:22:52', 'Романов Егор', 'egor51@mail.ru', '76-15-23', 'г. Москва, ул. Репина 6-120', 'c5r3nrp9b4qjrgaggnlgkd2bm5'),
(7, 1, '2020-02-16 02:32:05', 'Соловьева Олеся Ивановна', 'solovOI@yandex.ru', '8-952-162-44-55', 'г. Гродно, ул. Академическая дом 37', 'pt9g9ib0j63pucvhgpd64neab5'),
(8, 0, '2020-02-20 14:16:18', 'Иванов И.И.', 'ivanII@mail.ru', '8-923-215-44-22', 'г. Брест, ул. Советская дом3', 'o6u8paf9mmnle9l8hi8dno49j6'),
(11, 0, '2020-02-21 00:50:15', 'Иванов И.И.', 'ivanII@mail.ru', '8-923-215-44-22', 'г. Брест, ул. Советская дом3', '4vtttdspahopgn3q4gbkreh2s2'),
(12, 0, '2020-02-22 18:24:08', 'Lolkek', 'lolkek@gmail.com', '+1234567890', 'г. Минск, ул. Киселева дом 21', 'csnskgh55ka40b1bto6m2jp2i5'),
(13, 0, '2020-02-26 13:31:44', 'Юра Кубеко', 'kubeko@gmail.com', '+375 29 1234567', 'г. Минск, ул. Петруся Бровки 6', 'd69sfvre9cub1onbf2pqsvjp83'),
(16, 1, '2020-02-26 13:36:01', 'vnldvsnd', 'fasninfsa@gmail.com', '+37512345678', 'г. Минск ул. Репина 4', 'd69sfvre9cub1onbf2pqsvjp83'),
(17, 0, '2020-02-26 13:41:06', 'anvkdm', 'asdfghj@gmail.com', '+123456789', 'alert(\"Hello\");', 'd69sfvre9cub1onbf2pqsvjp83');

-- --------------------------------------------------------

--
-- Структура таблицы `orderst`
--

CREATE TABLE `orderst` (
  `id` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `goodsid` int(11) NOT NULL,
  `quantity` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orderst`
--

INSERT INTO `orderst` (`id`, `orderid`, `goodsid`, `quantity`) VALUES
(1, 1, 16, '1'),
(2, 1, 2, '1'),
(3, 2, 4, '2'),
(4, 3, 2, '1'),
(5, 4, 3, '1'),
(6, 5, 2, '1'),
(7, 6, 3, '1'),
(8, 7, 2, '1'),
(9, 8, 3, '1'),
(10, 8, 16, '1'),
(12, 11, 4, '1'),
(13, 11, 16, '1'),
(14, 16, 25, '1'),
(15, 16, 18, '1'),
(16, 17, 19, '1');

-- --------------------------------------------------------

--
-- Структура таблицы `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `login` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `registration`
--

INSERT INTO `registration` (`id`, `login`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Структура таблицы `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='типы товаров';

--
-- Дамп данных таблицы `type`
--

INSERT INTO `type` (`id`, `type`) VALUES
(1, 'Мониторы и аксессуары'),
(2, 'Кабели, шлейфы, переходники'),
(3, 'Запчасти оргтехники'),
(4, 'Манипуляторы'),
(5, 'Внешние накопители данных'),
(6, 'Телефоны и смартфоны'),
(7, 'Компьютеры'),
(8, 'Ноутбуки'),
(9, 'Планшеты'),
(14, 'Чистящие средства');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `catalogid` (`catalogid`);

--
-- Индексы таблицы `catalog`
--
ALTER TABLE `catalog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `typeid` (`typeid`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Индексы таблицы `orderst`
--
ALTER TABLE `orderst`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `orderid` (`orderid`),
  ADD KEY `goodsid` (`goodsid`);

--
-- Индексы таблицы `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `catalog`
--
ALTER TABLE `catalog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `orderst`
--
ALTER TABLE `orderst`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `basket`
--
ALTER TABLE `basket`
  ADD CONSTRAINT `basket_ibfk_1` FOREIGN KEY (`catalogid`) REFERENCES `catalog` (`id`);

--
-- Ограничения внешнего ключа таблицы `catalog`
--
ALTER TABLE `catalog`
  ADD CONSTRAINT `catalog_ibfk_1` FOREIGN KEY (`typeid`) REFERENCES `type` (`id`);

--
-- Ограничения внешнего ключа таблицы `orderst`
--
ALTER TABLE `orderst`
  ADD CONSTRAINT `orderst_ibfk_1` FOREIGN KEY (`orderid`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `orderst_ibfk_2` FOREIGN KEY (`goodsid`) REFERENCES `catalog` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
