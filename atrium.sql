-- phpMyAdmin SQL Dump
-- version 3.5.4
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Дек 14 2012 г., 20:04
-- Версия сервера: 5.1.63-0ubuntu0.11.04.1
-- Версия PHP: 5.3.5-1ubuntu7.11

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `atrium`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(10) NOT NULL AUTO_INCREMENT,
  `text` text NOT NULL,
  `object` varchar(10) NOT NULL,
  `object_id` int(10) NOT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `object_id` (`object_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `finances`
--

CREATE TABLE IF NOT EXISTS `finances` (
  `finance_id` int(10) NOT NULL AUTO_INCREMENT,
  `project_id` int(10) NOT NULL,
  PRIMARY KEY (`finance_id`),
  KEY `project_id` (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `jobs`
--

CREATE TABLE IF NOT EXISTS `jobs` (
  `job_id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`job_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `privileges`
--

CREATE TABLE IF NOT EXISTS `privileges` (
  `privilege_id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  PRIMARY KEY (`privilege_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `privileges_links`
--

CREATE TABLE IF NOT EXISTS `privileges_links` (
  `privilege_id` int(5) NOT NULL,
  `usergroup_id` int(3) NOT NULL,
  PRIMARY KEY (`privilege_id`,`usergroup_id`),
  KEY `usergroup_id` (`usergroup_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `project_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET ucs2 NOT NULL,
  `budget` int(10) NOT NULL,
  `status_id` int(3) NOT NULL,
  PRIMARY KEY (`project_id`),
  KEY `status_id` (`status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `projects_links`
--

CREATE TABLE IF NOT EXISTS `projects_links` (
  `project_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  PRIMARY KEY (`project_id`,`user_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `statuses`
--

CREATE TABLE IF NOT EXISTS `statuses` (
  `status_id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `value` varchar(1) NOT NULL,
  `object` int(1) NOT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `task_id` int(10) NOT NULL AUTO_INCREMENT,
  `subject` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status_id` int(3) NOT NULL,
  PRIMARY KEY (`task_id`),
  KEY `status_id` (`status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `tasks_links`
--

CREATE TABLE IF NOT EXISTS `tasks_links` (
  `task_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  PRIMARY KEY (`task_id`,`user_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `task_actions`
--

CREATE TABLE IF NOT EXISTS `task_actions` (
  `action_id` int(10) NOT NULL AUTO_INCREMENT,
  `progress` int(5) NOT NULL,
  `time` int(10) NOT NULL,
  `task_id` int(10) NOT NULL,
  PRIMARY KEY (`action_id`),
  KEY `task_id` (`task_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `usergroups`
--

CREATE TABLE IF NOT EXISTS `usergroups` (
  `usergroup_id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`usergroup_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `second_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `birthday` int(10) NOT NULL,
  `phone` int(10) NOT NULL,
  `usergroup_id` int(3) NOT NULL,
  `job_id` int(3) NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `job_id` (`job_id`),
  KEY `usergroup_id` (`usergroup_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `finances`
--
ALTER TABLE `finances`
  ADD CONSTRAINT `finances_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`project_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `privileges_links`
--
ALTER TABLE `privileges_links`
  ADD CONSTRAINT `privileges_links_ibfk_1` FOREIGN KEY (`privilege_id`) REFERENCES `privileges` (`privilege_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `privileges_links_ibfk_2` FOREIGN KEY (`usergroup_id`) REFERENCES `usergroups` (`usergroup_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`status_id`);

--
-- Ограничения внешнего ключа таблицы `projects_links`
--
ALTER TABLE `projects_links`
  ADD CONSTRAINT `projects_links_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`project_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `projects_links_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`status_id`) ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `tasks_links`
--
ALTER TABLE `tasks_links`
  ADD CONSTRAINT `tasks_links_ibfk_1` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`task_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `tasks_links_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `task_actions`
--
ALTER TABLE `task_actions`
  ADD CONSTRAINT `task_actions_ibfk_1` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`task_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`job_id`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`usergroup_id`) REFERENCES `usergroups` (`usergroup_id`) ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
