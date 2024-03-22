-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3307
-- Время создания: Мар 22 2024 г., 16:30
-- Версия сервера: 8.0.30
-- Версия PHP: 8.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `RoyalDent`
--

-- --------------------------------------------------------

--
-- Структура таблицы `AppointmentRequests`
--

CREATE TABLE `AppointmentRequests` (
  `ID` int NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Phone` varchar(15) DEFAULT NULL,
  `ServiceCategoryID` int DEFAULT NULL
) ;

--
-- Дамп данных таблицы `AppointmentRequests`
--

INSERT INTO `AppointmentRequests` (`ID`, `Name`, `Phone`, `ServiceCategoryID`) VALUES
(9, 'Андрей Чикатило', '8963215685', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `CallbackRequests`
--

CREATE TABLE `CallbackRequests` (
  `ID` int NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Phone` varchar(15) DEFAULT NULL,
  `RequestDate` date DEFAULT NULL
) ;

-- --------------------------------------------------------

--
-- Структура таблицы `Doctors`
--

CREATE TABLE `Doctors` (
  `ID` int NOT NULL,
  `FullName` varchar(255) NOT NULL,
  `Specialization` varchar(255) NOT NULL
) ;

--
-- Дамп данных таблицы `Doctors`
--

INSERT INTO `Doctors` (`ID`, `FullName`, `Specialization`) VALUES
(1, 'Иванов Иван Иванович', 'Терапевт'),
(2, 'Петров Петр Петрович', 'Стоматолог-хирург'),
(3, 'Сидорова Анна Александровна', 'Ортодонт'),
(4, 'Козлова Елена Владимировна', 'Детский стоматолог'),
(5, 'Смирнов Сергей Алексеевич', 'Протезирование'),
(6, 'Федорова Ольга Игоревна', 'Гигиенист');

-- --------------------------------------------------------

--
-- Структура таблицы `MedicalServices`
--

CREATE TABLE `MedicalServices` (
  `service_id` int NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `service_cost` decimal(10,2) NOT NULL,
  `category_id` int DEFAULT NULL
) ;

--
-- Дамп данных таблицы `MedicalServices`
--

INSERT INTO `MedicalServices` (`service_id`, `service_name`, `service_cost`, `category_id`) VALUES
(1, 'Пломбирование зуба', '5000.00', 1),
(2, 'Эстетическое отбеливание зубов', '12000.00', 2),
(3, 'Удаление зуба мудрости', '8000.00', 3),
(4, 'Имплантация зуба', '25000.00', 4),
(5, 'Протезирование на имплантатах', '35000.00', 5),
(6, 'Ортодонтическое лечение', '18000.00', 6),
(7, 'Лечение кариеса', '4500.00', 1),
(8, 'Эндодонтическое лечение', '7000.00', 2),
(9, 'Гигиеническая чистка зубов', '3000.00', 2),
(10, 'Профессиональная гигиеническая чистка', '4000.00', 3),
(11, 'Лазерная терапия десен', '6000.00', 4),
(12, 'Рентгенография челюсти', '2500.00', 1),
(13, 'Диагностика состояния зубов', '3500.00', 6),
(14, 'Травматологическая помощь', '5500.00', 4),
(15, 'Консультация стоматолога', '2000.00', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `News`
--

CREATE TABLE `News` (
  `id` int NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `link` varchar(255) NOT NULL
) ;

--
-- Дамп данных таблицы `News`
--

INSERT INTO `News` (`id`, `image_path`, `title`, `content`, `link`) VALUES
(1, 'img/news1.svg', 'Тинькофф теперь с нами!', 'Зубы в кредит? Теперь не пустые слова!', 'https://www.tinkoff.ru/cards/credit-cards/'),
(2, 'img/news2.svg', 'RoyalDent доминирует', 'Клиника RoyalDent укомплектовала свой штат самыми высококлассными специалистами! ', '#team'),
(3, 'img/news3.svg', 'Услуги и цены', 'С другой стороны сложившаяся структура организации играет важную роль в формировании соответствующих условий активизации.', '#'),
(4, 'img/news4.svg', 'Индивидуальный подход', 'В нашей клинике индивидуальный подход распространяется абсолютно на всех! В том числе и на детей', '#equipment'),
(5, 'img/news5.svg', 'Якутск снова в топе!', 'В новом якутском онкоцентре установили один из трех лучших томографов в России', 'https://rg.ru/2024/01/23/reg-dfo/v-novom-iakutskom-onkocentre-ustanovili-odin-iz-treh-luchshih-tomografov-v-rossii.html'),
(6, 'img/news6.svg', 'Флагманские показатели', 'Флагманский центр ГКБ им. Вересаева принял 54 тысячи пациентов за год работы', 'https://rg.ru/2024/01/22/reg-cfo/flagmanskij-centr-gkb-im-veresaeva-prinial-54-tysiachi-pacientov-za-god-raboty.html');

-- --------------------------------------------------------

--
-- Структура таблицы `Reviews`
--

CREATE TABLE `Reviews` (
  `ID` int NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Rating` int DEFAULT NULL,
  `Comment` text,
  `Date` date DEFAULT NULL,
  `DoctorID` int DEFAULT NULL
) ;

--
-- Дамп данных таблицы `Reviews`
--

INSERT INTO `Reviews` (`ID`, `Name`, `Rating`, `Comment`, `Date`, `DoctorID`) VALUES
(1, 'Илья', 5, 'Очень хорошо, зубы как только родился!', '2024-01-23', 1),
(2, 'Ахмед', 1, 'После приёма вывалились зубы...', '2024-01-23', 1),
(3, 'Аркаша', 4, 'Хорошая клиника, но мой врач прилюдно выбирал себе новый майбах...', '2024-01-23', 1),
(4, 'Вано', 5, 'Первый бесплатный осмотр тема! больше не приду', '2024-01-23', 2),
(5, 'Артур', 2, 'Не разрешили хавать шаву во время приёма...', '2024-01-23', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `ServiceCategories`
--

CREATE TABLE `ServiceCategories` (
  `ID` int NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Photo` varchar(255) DEFAULT NULL
) ;

--
-- Дамп данных таблицы `ServiceCategories`
--

INSERT INTO `ServiceCategories` (`ID`, `Name`, `Photo`) VALUES
(1, 'Терапия', 'img/servise_img1.svg'),
(2, 'Ортопедия', 'img/servise_img2.svg'),
(3, 'Хирургия', 'img/servise_img3.svg'),
(4, 'Имплантация', 'img/servise_img4.svg'),
(5, 'Компьютерная Томография', 'img/servise_img5.svg'),
(6, 'Детская стоматология', 'img/servise_img6.svg');

-- --------------------------------------------------------

--
-- Структура таблицы `SliderData`
--

CREATE TABLE `SliderData` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `button_text` varchar(50) NOT NULL,
  `image_path` varchar(255) NOT NULL
) ;

--
-- Дамп данных таблицы `SliderData`
--

INSERT INTO `SliderData` (`id`, `title`, `content`, `button_text`, `image_path`) VALUES
(1, 'Профессиональная забота о безопасности', 'Приточно-вытяжная система вентиляции\r\nБактерицидные рециркуляторы воздуха\r\nГенеральная обработка кабинетов\r\nАнтисептическое обработка ручек и санузлов\r\nСредства индивидуальной защиты', 'Записаться онлайн', 'img/slide1.png'),
(2, 'Все виды современной имплантации', 'Имплантационные системы: - Straumann - Osstem - Miss Хирургические шаблоны Синуслифтинг Костная пластика Пластика мягких тканей', 'Записаться онлайн', 'img/slide2.png'),
(3, 'Индивидуальный подход для каждого клиента', 'Душевная атмосфера в клинике Гарантия качества на все виды услуг', 'Записаться онлайн', 'img/slide3.png'),
(4, 'Компьютерная томография', 'Современная 3D-диагностика - основа и начало любого лечения', 'Записаться онлайн', 'img/slide4.svg'),
(5, 'Команда опытных специалистов', 'Доктора нашей клиники - это команда! Команда молодых профессионалов, готовых в самых сложных ситуациях обеспечить высокое качество работы с достойным уровнем сервиса', 'Записаться онлайн', 'img/slide5.svg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `AppointmentRequests`
--
ALTER TABLE `AppointmentRequests`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `appointmentrequests_ibfk_1` (`ServiceCategoryID`);

--
-- Индексы таблицы `CallbackRequests`
--
ALTER TABLE `CallbackRequests`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `Doctors`
--
ALTER TABLE `Doctors`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `MedicalServices`
--
ALTER TABLE `MedicalServices`
  ADD PRIMARY KEY (`service_id`),
  ADD KEY `fk_category_id` (`category_id`);

--
-- Индексы таблицы `News`
--
ALTER TABLE `News`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `Reviews`
--
ALTER TABLE `Reviews`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_Reviews_Doctors` (`DoctorID`);

--
-- Индексы таблицы `ServiceCategories`
--
ALTER TABLE `ServiceCategories`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `SliderData`
--
ALTER TABLE `SliderData`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `AppointmentRequests`
--
ALTER TABLE `AppointmentRequests`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `CallbackRequests`
--
ALTER TABLE `CallbackRequests`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `Doctors`
--
ALTER TABLE `Doctors`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `MedicalServices`
--
ALTER TABLE `MedicalServices`
  MODIFY `service_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `News`
--
ALTER TABLE `News`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `Reviews`
--
ALTER TABLE `Reviews`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `ServiceCategories`
--
ALTER TABLE `ServiceCategories`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `SliderData`
--
ALTER TABLE `SliderData`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `AppointmentRequests`
--
ALTER TABLE `AppointmentRequests`
  ADD CONSTRAINT `appointmentrequests_ibfk_1` FOREIGN KEY (`ServiceCategoryID`) REFERENCES `MedicalServices` (`service_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `MedicalServices`
--
ALTER TABLE `MedicalServices`
  ADD CONSTRAINT `fk_category_id` FOREIGN KEY (`category_id`) REFERENCES `ServiceCategories` (`ID`);

--
-- Ограничения внешнего ключа таблицы `Reviews`
--
ALTER TABLE `Reviews`
  ADD CONSTRAINT `FK_Reviews_Doctors` FOREIGN KEY (`DoctorID`) REFERENCES `Doctors` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
