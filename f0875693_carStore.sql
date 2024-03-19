-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 10.0.0.57
-- Время создания: Дек 26 2023 г., 22:46
-- Версия сервера: 5.7.37-40
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `f0875693_carStore`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Brand`
--

CREATE TABLE `Brand` (
  `BrandId` int(11) NOT NULL,
  `BrandName` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `Brand`
--

INSERT INTO `Brand` (`BrandId`, `BrandName`) VALUES
(3, 'Chevrolet'),
(2, 'KIA'),
(1, 'LADA');

-- --------------------------------------------------------

--
-- Структура таблицы `Car`
--

CREATE TABLE `Car` (
  `CarId` int(11) NOT NULL,
  `ModelIdRS` int(11) NOT NULL,
  `CarBody` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `GearBox` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `WheelDrive` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Engine` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Color` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Price` int(10) UNSIGNED NOT NULL,
  `EngineVolume` decimal(2,1) UNSIGNED NOT NULL,
  `EnginePower` smallint(5) UNSIGNED NOT NULL,
  `CarCondition` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `OwnerCount` tinyint(3) UNSIGNED DEFAULT NULL,
  `VehiclePassport` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Mileage` mediumint(8) UNSIGNED DEFAULT NULL,
  `Year` smallint(4) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `Car`
--

INSERT INTO `Car` (`CarId`, `ModelIdRS`, `CarBody`, `GearBox`, `WheelDrive`, `Engine`, `Color`, `Price`, `EngineVolume`, `EnginePower`, `CarCondition`, `OwnerCount`, `VehiclePassport`, `Mileage`, `Year`) VALUES
(1, 1, 'sedan', 'manual', 'front', 'benzine', 'Черный', 500000, 1.6, 106, 'new', NULL, NULL, NULL, 2023),
(2, 2, 'sedan', 'automatic', 'front', 'benzine', 'Белый', 900000, 1.6, 106, 'used', 2, 'origin', 100000, 2017),
(3, 1, 'sedan', 'automatic', 'front', 'benzine', 'Черный', 900000, 1.6, 106, 'new', NULL, NULL, NULL, 2023);

-- --------------------------------------------------------

--
-- Структура таблицы `CarBody`
--

CREATE TABLE `CarBody` (
  `Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Title` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `CarBody`
--

INSERT INTO `CarBody` (`Name`, `Title`) VALUES
('suv', 'Внедорожник'),
('cupe', 'Купе'),
('microbus', 'Микроавтобус'),
('minivan', 'Минивен'),
('pickup', 'Пикап'),
('sedan', 'Седан'),
('universal', 'Универсал'),
('furgon', 'Фургон'),
('hatch', 'Хэтчбек');

-- --------------------------------------------------------

--
-- Структура таблицы `CarCondition`
--

CREATE TABLE `CarCondition` (
  `Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Title` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `CarCondition`
--

INSERT INTO `CarCondition` (`Name`, `Title`) VALUES
('new', 'Новый'),
('used', 'С пробегом');

-- --------------------------------------------------------

--
-- Структура таблицы `Engine`
--

CREATE TABLE `Engine` (
  `Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Title` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `Engine`
--

INSERT INTO `Engine` (`Name`, `Title`) VALUES
('benzine', 'Бензин'),
('diesel', 'Дизель');

-- --------------------------------------------------------

--
-- Структура таблицы `GearBox`
--

CREATE TABLE `GearBox` (
  `Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Title` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `GearBox`
--

INSERT INTO `GearBox` (`Name`, `Title`) VALUES
('automatic', 'АКПП'),
('manual', 'МКПП');

-- --------------------------------------------------------

--
-- Структура таблицы `Image`
--

CREATE TABLE `Image` (
  `ImageId` int(11) NOT NULL,
  `Path` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `Image`
--

INSERT INTO `Image` (`ImageId`, `Path`) VALUES
(6, 'image/cars/_0000s_0008s_0000_12.jpg'),
(5, 'image/cars/_0000s_0008s_0001_5.jpg'),
(3, 'image/cars/lada-granta-sedan-chernyy-0.jpg'),
(4, 'image/cars/lada-granta-sedan-chernyy-1.jpg'),
(1, 'image/sells/1920х585_X3.jpg'),
(2, 'image/sells/chery-arrizo-8-v-tts-2.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `Image_Car`
--

CREATE TABLE `Image_Car` (
  `ImageIdRS` int(11) NOT NULL,
  `CarIdRS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `Image_Car`
--

INSERT INTO `Image_Car` (`ImageIdRS`, `CarIdRS`) VALUES
(3, 1),
(4, 1),
(5, 2),
(6, 2),
(3, 3),
(4, 3),
(5, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `Model`
--

CREATE TABLE `Model` (
  `ModelId` int(11) NOT NULL,
  `ModelName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `BrandIdRS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `Model`
--

INSERT INTO `Model` (`ModelId`, `ModelName`, `BrandIdRS`) VALUES
(1, 'Granta', 1),
(2, 'Vesta', 1),
(3, 'Rio', 2),
(4, 'Spectra', 2),
(5, 'Tahoe', 3),
(6, 'Aveo', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `Sell`
--

CREATE TABLE `Sell` (
  `Id` int(11) NOT NULL,
  `Name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Text` text COLLATE utf8_unicode_ci NOT NULL,
  `ImageIdRS` int(11) NOT NULL,
  `DateStart` date NOT NULL,
  `DateEnd` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `Sell`
--

INSERT INTO `Sell` (`Id`, `Name`, `Text`, `ImageIdRS`, `DateStart`, `DateEnd`) VALUES
(1, '1', '1', 1, '2023-10-31', NULL),
(2, '2', '2', 2, '2023-10-31', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `Theme`
--

CREATE TABLE `Theme` (
  `Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Title` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `Theme`
--

INSERT INTO `Theme` (`Name`, `Title`) VALUES
('buy', 'Покупка машины'),
('siteproblem', 'Проблема с сайтом'),
('sell', 'Продать машину');

-- --------------------------------------------------------

--
-- Структура таблицы `User`
--

CREATE TABLE `User` (
  `Phone` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `Password` char(60) COLLATE utf8_unicode_ci NOT NULL,
  `FirstName` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `UserId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `User`
--

INSERT INTO `User` (`Phone`, `Password`, `FirstName`, `UserId`) VALUES
('88005553535', '$2y$10$dxjJahHGdLXV4MVFeMMPXu/9KrHZcQ6NjrARRBnY27UKMI4l6yjrS', 'Евгений', 6),
('89501553989', '$2y$10$t0XPw7BKDgDzeh2oYMOlZeyv4ZS3Fyhso9Ei1/eGkHoY1PwOFvtGu', 'Иван', 7),
('8922345672', '$2y$10$IU7Uk3vCKls.PDH3F7ZYQ.pdZSnmuZ/rFMeo6YU1LMCArbsQT3a.S', 'Елена', 8),
('89341231012', '$2y$10$0xKSYGvY7nZzSmmCCX9rFu4kaL6Vgq5KalYeYwK.aYcNszlNpP.eu', 'Алеша', 10),
('89213452312', '$2y$10$wHCcB0l6zIeAWIHAd1TRUOzRk5905Y0kg/wwYaakX6bM1B1IVOm4K', 'Александр', 11);

-- --------------------------------------------------------

--
-- Структура таблицы `UserApplication`
--

CREATE TABLE `UserApplication` (
  `Id` int(11) NOT NULL,
  `Phone` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `UserName` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ThemeRS` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `AppStatus` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `UserApplication`
--

INSERT INTO `UserApplication` (`Id`, `Phone`, `UserName`, `ThemeRS`, `AppStatus`) VALUES
(4, '88005553535', 'Евгений', 'buy', 'На рассмотрении'),
(5, '88005553535', 'Евгений', 'buy', 'На рассмотрении'),
(6, '88005553535', 'Евгений', 'buy', 'На рассмотрении'),
(7, '88005553535', 'Евгений', 'buy', 'На рассмотрении'),
(9, '88005553535', 'Евгений', 'buy', 'На рассмотрении'),
(11, '88005553535', 'Евгений', 'buy', 'На рассмотрении');

-- --------------------------------------------------------

--
-- Структура таблицы `UserReservedCar`
--

CREATE TABLE `UserReservedCar` (
  `UserId` int(11) NOT NULL,
  `CarId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `UserReservedCar`
--

INSERT INTO `UserReservedCar` (`UserId`, `CarId`) VALUES
(6, 1),
(6, 3),
(11, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `User_Car`
--

CREATE TABLE `User_Car` (
  `CarIdRS` int(11) NOT NULL,
  `UserIdRS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `User_Car`
--

INSERT INTO `User_Car` (`CarIdRS`, `UserIdRS`) VALUES
(1, 6),
(1, 7),
(3, 11);

-- --------------------------------------------------------

--
-- Структура таблицы `VehiclePassport`
--

CREATE TABLE `VehiclePassport` (
  `Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Title` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `VehiclePassport`
--

INSERT INTO `VehiclePassport` (`Name`, `Title`) VALUES
('dublicate', 'Дубликат'),
('origin', 'Оригинал');

-- --------------------------------------------------------

--
-- Структура таблицы `WheelDrive`
--

CREATE TABLE `WheelDrive` (
  `Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Title` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `WheelDrive`
--

INSERT INTO `WheelDrive` (`Name`, `Title`) VALUES
('rear', 'Задний привод'),
('front', 'Передний привод'),
('fourwheel', 'Полный привод');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Brand`
--
ALTER TABLE `Brand`
  ADD PRIMARY KEY (`BrandId`),
  ADD UNIQUE KEY `BrandName` (`BrandName`);

--
-- Индексы таблицы `Car`
--
ALTER TABLE `Car`
  ADD PRIMARY KEY (`CarId`),
  ADD KEY `CarBody` (`CarBody`),
  ADD KEY `CarCondition` (`CarCondition`),
  ADD KEY `Engine` (`Engine`),
  ADD KEY `GearBox` (`GearBox`),
  ADD KEY `VehiclePassport` (`VehiclePassport`),
  ADD KEY `WheelDrive` (`WheelDrive`),
  ADD KEY `ModelId` (`ModelIdRS`);

--
-- Индексы таблицы `CarBody`
--
ALTER TABLE `CarBody`
  ADD PRIMARY KEY (`Name`),
  ADD UNIQUE KEY `Title` (`Title`);

--
-- Индексы таблицы `CarCondition`
--
ALTER TABLE `CarCondition`
  ADD PRIMARY KEY (`Name`),
  ADD UNIQUE KEY `Title` (`Title`);

--
-- Индексы таблицы `Engine`
--
ALTER TABLE `Engine`
  ADD PRIMARY KEY (`Name`),
  ADD UNIQUE KEY `Title` (`Title`);

--
-- Индексы таблицы `GearBox`
--
ALTER TABLE `GearBox`
  ADD PRIMARY KEY (`Name`),
  ADD UNIQUE KEY `Title` (`Title`);

--
-- Индексы таблицы `Image`
--
ALTER TABLE `Image`
  ADD PRIMARY KEY (`ImageId`),
  ADD UNIQUE KEY `Path` (`Path`);

--
-- Индексы таблицы `Image_Car`
--
ALTER TABLE `Image_Car`
  ADD PRIMARY KEY (`ImageIdRS`,`CarIdRS`),
  ADD KEY `CarId` (`CarIdRS`);

--
-- Индексы таблицы `Model`
--
ALTER TABLE `Model`
  ADD PRIMARY KEY (`ModelId`),
  ADD KEY `BrandId` (`BrandIdRS`);

--
-- Индексы таблицы `Sell`
--
ALTER TABLE `Sell`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `ImageId` (`ImageIdRS`);

--
-- Индексы таблицы `Theme`
--
ALTER TABLE `Theme`
  ADD PRIMARY KEY (`Name`),
  ADD UNIQUE KEY `Title` (`Title`);

--
-- Индексы таблицы `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`UserId`),
  ADD UNIQUE KEY `Phone` (`Phone`);

--
-- Индексы таблицы `UserApplication`
--
ALTER TABLE `UserApplication`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `ThemeRS` (`ThemeRS`);

--
-- Индексы таблицы `UserReservedCar`
--
ALTER TABLE `UserReservedCar`
  ADD PRIMARY KEY (`CarId`),
  ADD KEY `UserId` (`UserId`);

--
-- Индексы таблицы `User_Car`
--
ALTER TABLE `User_Car`
  ADD PRIMARY KEY (`CarIdRS`,`UserIdRS`),
  ADD KEY `UserIdRS` (`UserIdRS`);

--
-- Индексы таблицы `VehiclePassport`
--
ALTER TABLE `VehiclePassport`
  ADD PRIMARY KEY (`Name`),
  ADD UNIQUE KEY `Title` (`Title`);

--
-- Индексы таблицы `WheelDrive`
--
ALTER TABLE `WheelDrive`
  ADD PRIMARY KEY (`Name`),
  ADD UNIQUE KEY `Title` (`Title`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Brand`
--
ALTER TABLE `Brand`
  MODIFY `BrandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `Car`
--
ALTER TABLE `Car`
  MODIFY `CarId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `Image`
--
ALTER TABLE `Image`
  MODIFY `ImageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `Model`
--
ALTER TABLE `Model`
  MODIFY `ModelId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `Sell`
--
ALTER TABLE `Sell`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `User`
--
ALTER TABLE `User`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `UserApplication`
--
ALTER TABLE `UserApplication`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `Car`
--
ALTER TABLE `Car`
  ADD CONSTRAINT `Car_ibfk_1` FOREIGN KEY (`CarBody`) REFERENCES `CarBody` (`Name`),
  ADD CONSTRAINT `Car_ibfk_2` FOREIGN KEY (`CarCondition`) REFERENCES `CarCondition` (`Name`),
  ADD CONSTRAINT `Car_ibfk_3` FOREIGN KEY (`Engine`) REFERENCES `Engine` (`Name`),
  ADD CONSTRAINT `Car_ibfk_4` FOREIGN KEY (`GearBox`) REFERENCES `GearBox` (`Name`),
  ADD CONSTRAINT `Car_ibfk_5` FOREIGN KEY (`VehiclePassport`) REFERENCES `VehiclePassport` (`Name`),
  ADD CONSTRAINT `Car_ibfk_6` FOREIGN KEY (`WheelDrive`) REFERENCES `WheelDrive` (`Name`),
  ADD CONSTRAINT `Car_ibfk_7` FOREIGN KEY (`ModelIdRS`) REFERENCES `Model` (`ModelId`);

--
-- Ограничения внешнего ключа таблицы `Image_Car`
--
ALTER TABLE `Image_Car`
  ADD CONSTRAINT `Image_Car_ibfk_1` FOREIGN KEY (`CarIdRS`) REFERENCES `Car` (`CarId`),
  ADD CONSTRAINT `Image_Car_ibfk_2` FOREIGN KEY (`ImageIdRS`) REFERENCES `Image` (`ImageId`);

--
-- Ограничения внешнего ключа таблицы `Model`
--
ALTER TABLE `Model`
  ADD CONSTRAINT `Model_ibfk_1` FOREIGN KEY (`BrandIdRS`) REFERENCES `Brand` (`BrandId`);

--
-- Ограничения внешнего ключа таблицы `Sell`
--
ALTER TABLE `Sell`
  ADD CONSTRAINT `Sell_ibfk_1` FOREIGN KEY (`ImageIdRS`) REFERENCES `Image` (`ImageId`);

--
-- Ограничения внешнего ключа таблицы `UserApplication`
--
ALTER TABLE `UserApplication`
  ADD CONSTRAINT `userapplication_ibfk_1` FOREIGN KEY (`ThemeRS`) REFERENCES `Theme` (`Name`);

--
-- Ограничения внешнего ключа таблицы `UserReservedCar`
--
ALTER TABLE `UserReservedCar`
  ADD CONSTRAINT `userreservedcar_ibfk_1` FOREIGN KEY (`CarId`) REFERENCES `Car` (`CarId`),
  ADD CONSTRAINT `userreservedcar_ibfk_2` FOREIGN KEY (`UserId`) REFERENCES `User` (`UserId`);

--
-- Ограничения внешнего ключа таблицы `User_Car`
--
ALTER TABLE `User_Car`
  ADD CONSTRAINT `user_car_ibfk_1` FOREIGN KEY (`CarIdRS`) REFERENCES `Car` (`CarId`),
  ADD CONSTRAINT `user_car_ibfk_2` FOREIGN KEY (`UserIdRS`) REFERENCES `User` (`UserId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
