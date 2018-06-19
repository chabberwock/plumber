/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE IF NOT EXISTS `plumber` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `plumber`;

CREATE TABLE IF NOT EXISTS `account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `account` DISABLE KEYS */;
INSERT INTO `account` (`id`, `email`, `password`) VALUES
	(1, 'admin@example.com', 'password'),
	(2, 'boss@plumber.co', 'password'),
	(3, 'manager@plumber.co', 'password'),
	(4, 'john@plumber.co', 'password');
/*!40000 ALTER TABLE `account` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `zip` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `province` varchar(50) DEFAULT NULL,
  `street` varchar(50) DEFAULT NULL,
  `house` varchar(50) DEFAULT NULL,
  `floor` varchar(50) DEFAULT NULL,
  `door` varchar(50) DEFAULT NULL,
  `notes` mediumtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `address` DISABLE KEYS */;
INSERT INTO `address` (`id`, `customer_id`, `zip`, `city`, `state`, `province`, `street`, `house`, `floor`, `door`, `notes`) VALUES
	(1, 1, '350000', 'Краснодар', 'Краснодарский Край', NULL, 'Красная', '135', '1', '5', 'подъехать со стороны Рашпилевской');
/*!40000 ALTER TABLE `address` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `office_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `phone_sms` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` (`id`, `office_id`, `first_name`, `last_name`, `email`, `phone`, `phone_sms`) VALUES
	(1, 1, 'Иван', 'Иванов', 'user@example.com', '79876543210', '79876543210'),
	(2, 1, 'Андрей', 'Петров', 'user1@example.com', '79876543210', '79876543210');
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `manager` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `office_id` int(11) DEFAULT NULL,
  `account_id` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `manager` DISABLE KEYS */;
INSERT INTO `manager` (`id`, `office_id`, `account_id`, `name`) VALUES
	(1, 1, 3, 'Liza');
/*!40000 ALTER TABLE `manager` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `office` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `account_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `office` DISABLE KEYS */;
INSERT INTO `office` (`id`, `name`, `account_id`) VALUES
	(1, 'ООО Сантехстрой', 2),
	(2, 'ЗАО Синяя изолента', 2);
/*!40000 ALTER TABLE `office` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `task` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `office_id` int(11) DEFAULT NULL,
  `manager_id` int(11) DEFAULT NULL,
  `worker_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `address_id` int(11) DEFAULT NULL,
  `scheduled_time` datetime DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` mediumtext,
  `price` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `task` DISABLE KEYS */;
INSERT INTO `task` (`id`, `office_id`, `manager_id`, `worker_id`, `customer_id`, `address_id`, `scheduled_time`, `title`, `description`, `price`, `status`) VALUES
	(1, 1, 3, 4, 1, 1, '2018-06-19 19:06:05', 'Прочистить слив', 'Засорился слив на кухне', '750', 3),
	(2, 1, 3, 4, 1, 1, '2018-06-19 22:00:00', 'Чинить трубу', 'Прорвало трубу, надо замотать синей изолентой', '777', NULL),
	(3, 1, 1, 1, 1, 1, NULL, 'Помыть окна', '', '', NULL);
/*!40000 ALTER TABLE `task` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `worker` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `office_id` int(11) DEFAULT NULL,
  `account_id` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `worker` DISABLE KEYS */;
INSERT INTO `worker` (`id`, `office_id`, `account_id`, `name`, `phone`) VALUES
	(1, 1, 4, 'John Snow', '79876543210');
/*!40000 ALTER TABLE `worker` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
