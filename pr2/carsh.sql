-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Июн 15 2023 г., 21:03
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `carsh`
--

-- --------------------------------------------------------

--
-- Структура таблицы `automaker`
--

CREATE TABLE IF NOT EXISTS `automaker` (
  `IDma` int(11) NOT NULL AUTO_INCREMENT,
  `NameMaker` varchar(255) NOT NULL,
  `IDco` int(11) NOT NULL,
  PRIMARY KEY (`IDma`),
  KEY `IDco` (`IDco`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Дамп данных таблицы `automaker`
--

INSERT INTO `automaker` (`IDma`, `NameMaker`, `IDco`) VALUES
(1, 'Volvo', 3),
(2, 'Nissan', 7),
(3, 'Lada', 1),
(4, 'Ford', 8),
(5, 'BMW', 4),
(6, 'Kia', 9),
(7, 'Toyota', 7),
(8, 'Honda', 7),
(9, 'Chevrolet', 8),
(10, 'Volkswagen', 4),
(11, 'Hyundai', 9),
(12, 'Mercedes-Benz', 4),
(13, 'Audi', 4),
(14, 'Mazda', 7),
(15, 'Subaru', 3),
(16, 'Jeep', 8),
(17, 'Lexus', 7),
(18, 'Renault', 2),
(19, 'Peugeot', 2),
(20, 'Fiat', 6),
(21, 'Land Rover', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `cars`
--

CREATE TABLE IF NOT EXISTS `cars` (
  `IDca` int(11) NOT NULL AUTO_INCREMENT,
  `NameCar` varchar(255) NOT NULL,
  `DateRelease` date NOT NULL,
  `Color` varchar(255) NOT NULL,
  `IDma` int(11) NOT NULL,
  `imgs` varchar(255) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `vin` varchar(255) NOT NULL,
  PRIMARY KEY (`IDca`),
  UNIQUE KEY `vin` (`vin`),
  KEY `IDma` (`IDma`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Дамп данных таблицы `cars`
--

INSERT INTO `cars` (`IDca`, `NameCar`, `DateRelease`, `Color`, `IDma`, `imgs`, `price`, `vin`) VALUES
(1, 'XC60', '2023-01-17', 'black', 1, '../imgs/XC60.png', 5800000, 'WVWAA7AJ6AW314591'),
(2, 'Almera', '2022-12-26', 'red', 2, '../imgs/Almera.png', 1200000, '1LNHM83W74Y608543'),
(3, 'Granta', '2023-02-03', 'grey', 3, '../imgs/granta.png', 800000, '2GCEC13J381308268'),
(4, 'Mondeo', '2022-12-28', 'blue', 4, '../imgs/mondeo.png', 1500000, 'KMHJG25FXYU157656'),
(5, 'X5', '2023-01-26', 'black', 5, '../imgs/X5.png', 4600000, '2FMDA52294BA87522'),
(6, 'Rio', '2023-02-05', 'white', 6, '../imgs/rio.png', 1250000, '1FAHP35N18W113765'),
(7, 'Civic', '2023-03-12', 'silver', 8, '../imgs/civik.png', 450000, '1GTHK23153F137790'),
(8, 'Golf', '2023-03-15', 'white', 9, '../imgs/golf.png', 740000, '1NXBR12E11Z514748'),
(9, 'Accord', '2023-03-18', 'red', 8, '../imgs/accord.png', 940000, 'JHLRM4H71CC095744'),
(10, 'Camry', '2023-03-21', 'black', 7, '../imgs/camry.png', 2250000, 'JTDKN3DU9A0153471'),
(11, 'Corolla', '2023-03-24', 'blue', 7, '../imgs/corolla.png', 1500000, '1B3EJ46X9VN574896'),
(12, 'A4', '2023-03-27', 'grey', 5, '../imgs/a4.png', 1400000, '1J4PP2GKXAW137789'),
(13, 'A6', '2023-03-30', 'silver', 6, '../imgs/a6.png', 1600000, '4T1BF1FK6EU303401'),
(14, 'X3', '2023-04-02', 'black', 5, '../imgs/x3.png', 2750000, '4T1BG22K21U836882'),
(15, 'Tucson', '2023-04-05', 'red', 9, '../imgs/tucson.png', 1110000, '1HGEJ6674YL095071'),
(20, 'Granta', '2023-06-08', 'white', 3, 'https://lada-automir.ru/_mod_files/ce_images/granta_lift_color/beloe_oblako_240.png', 800000, '2G2WP552261215443');

-- --------------------------------------------------------

--
-- Структура таблицы `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `IDcl` int(11) NOT NULL AUTO_INCREMENT,
  `FName` varchar(255) NOT NULL,
  `LName` varchar(255) NOT NULL,
  `Phone` int(11) NOT NULL,
  `Adress` varchar(255) NOT NULL,
  PRIMARY KEY (`IDcl`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Дамп данных таблицы `clients`
--

INSERT INTO `clients` (`IDcl`, `FName`, `LName`, `Phone`, `Adress`) VALUES
(1, 'John', 'Doe', 1234567890, '123 Main St'),
(2, 'Jane', 'Smith', 2147483647, '456 Elm St'),
(3, 'Michael', 'Johnson', 2147483647, '789 Oak St'),
(4, 'Emily', 'Williams', 2147483647, '321 Pine St'),
(5, 'David', 'Brown', 1112223333, '654 Maple Ave'),
(6, 'Sarah', 'Davis', 2147483647, '987 Cedar St'),
(7, 'Robert', 'Taylor', 2147483647, '789 Elm St'),
(8, 'Jennifer', 'Anderson', 2147483647, '123 Oak St'),
(9, 'Christopher', 'Martinez', 2147483647, '456 Pine St'),
(10, 'Jessica', 'Thomas', 2147483647, '321 Maple Ave'),
(11, 'Daniel', 'Garcia', 2147483647, '654 Cedar St'),
(12, 'Amy', 'Wilson', 2147483647, '987 Elm St'),
(13, 'Matthew', 'Lee', 1112223333, '789 Oak St'),
(14, 'Amanda', 'Miller', 2147483647, '123 Pine St'),
(15, 'Andrew', 'Jackson', 2147483647, '456 Maple Ave');

-- --------------------------------------------------------

--
-- Структура таблицы `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `IDco` int(11) NOT NULL AUTO_INCREMENT,
  `NameCountry` varchar(255) NOT NULL,
  PRIMARY KEY (`IDco`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Дамп данных таблицы `country`
--

INSERT INTO `country` (`IDco`, `NameCountry`) VALUES
(1, 'Russia'),
(2, 'France'),
(3, 'Sweden'),
(4, 'Germany'),
(5, 'Iran'),
(6, 'Italy'),
(7, 'Japan'),
(8, 'USA'),
(9, 'Korea'),
(10, 'Czech'),
(11, 'Spain'),
(12, 'Brazil'),
(13, 'Canada'),
(14, 'Australia'),
(15, 'India');

-- --------------------------------------------------------

--
-- Структура таблицы `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
  `IDemp` int(11) NOT NULL AUTO_INCREMENT,
  `FName` varchar(255) NOT NULL,
  `LName` varchar(255) NOT NULL,
  `Phone` int(11) NOT NULL,
  `Position` varchar(255) NOT NULL,
  PRIMARY KEY (`IDemp`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Дамп данных таблицы `employees`
--

INSERT INTO `employees` (`IDemp`, `FName`, `LName`, `Phone`, `Position`) VALUES
(1, 'Sarah', 'Roberts', 2147483647, 'Chief'),
(2, 'Laura', 'Guerrero', 2147483647, 'Manager'),
(3, 'Barbara', 'Smith', 2147483647, 'Manager'),
(4, 'Misty', 'Gonzalez', 2147483647, 'Manager'),
(5, 'Alan', 'Reed', 2147483647, 'Security'),
(6, 'Michael', 'Johnson', 2147483647, 'Salesperson'),
(7, 'Emily', 'Anderson', 2147483647, 'Marketing Specialist'),
(8, 'David', 'Wilson', 2147483647, 'Accountant'),
(9, 'Jennifer', 'Thompson', 2147483647, 'Human Resources Manager'),
(10, 'Christopher', 'Lee', 2147483647, 'IT Specialist'),
(11, 'Stephanie', 'Harris', 2147483647, 'Customer Service Representative'),
(12, 'Matthew', 'Clark', 2147483647, 'Operations Manager'),
(13, 'Olivia', 'Walker', 2147483647, 'Financial Analyst'),
(14, 'Daniel', 'Hall', 2147483647, 'Project Manager'),
(15, 'Sophia', 'Young', 2147483647, 'Quality Assurance Specialist'),
(16, 'Aiden', 'King', 2147483647, 'Research and Development Scientist');

-- --------------------------------------------------------

--
-- Структура таблицы `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `IDsa` int(11) NOT NULL AUTO_INCREMENT,
  `DateSale` date NOT NULL,
  `IDca` int(11) NOT NULL,
  `IDcl` int(11) NOT NULL,
  `IDemp` int(11) NOT NULL,
  PRIMARY KEY (`IDsa`),
  KEY `IDca` (`IDca`,`IDcl`,`IDemp`),
  KEY `IDemp` (`IDemp`),
  KEY `IDcl` (`IDcl`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=45 ;

--
-- Дамп данных таблицы `sales`
--

INSERT INTO `sales` (`IDsa`, `DateSale`, `IDca`, `IDcl`, `IDemp`) VALUES
(1, '2023-01-10', 3, 10, 2),
(2, '2023-01-13', 6, 8, 2),
(3, '2023-01-14', 6, 6, 2),
(4, '2023-01-16', 1, 4, 3),
(5, '2023-01-18', 5, 2, 3),
(6, '2023-02-02', 4, 1, 3),
(7, '2023-02-03', 4, 3, 4),
(8, '2023-02-05', 2, 5, 4),
(9, '2023-02-07', 7, 7, 4),
(10, '2023-02-10', 8, 9, 1),
(11, '2023-02-15', 10, 2, 2),
(12, '2023-02-18', 11, 3, 2),
(13, '2023-02-20', 9, 1, 3),
(14, '2023-02-25', 14, 10, 3),
(15, '2023-03-03', 15, 5, 4),
(16, '2023-06-11', 1, 1, 4),
(17, '2023-06-11', 7, 7, 4),
(18, '2023-06-11', 3, 3, 2);

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `automaker`
--
ALTER TABLE `automaker`
  ADD CONSTRAINT `automaker_ibfk_1` FOREIGN KEY (`IDco`) REFERENCES `country` (`IDco`);

--
-- Ограничения внешнего ключа таблицы `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `cars_ibfk_1` FOREIGN KEY (`IDma`) REFERENCES `automaker` (`IDma`);

--
-- Ограничения внешнего ключа таблицы `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_6` FOREIGN KEY (`IDca`) REFERENCES `cars` (`IDca`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`IDemp`) REFERENCES `employees` (`IDemp`),
  ADD CONSTRAINT `sales_ibfk_2` FOREIGN KEY (`IDcl`) REFERENCES `clients` (`IDcl`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
