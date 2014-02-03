-- phpMyAdmin SQL Dump
-- version 3.5.8.1deb1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2014 年 01 月 21 日 19:10
-- 服务器版本: 5.5.34-0ubuntu0.13.04.1
-- PHP 版本: 5.4.9-4ubuntu2.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `hcimsg`
--

-- --------------------------------------------------------

--
-- 表的结构 `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `createTime` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastModifyTime` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(10) NOT NULL,
  `isImportant` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `article`
--

INSERT INTO `article` (`ID`, `title`, `content`, `createTime`, `lastModifyTime`, `user_id`, `isImportant`) VALUES
(3, 'testtitle', 'testcontent', '2014-01-20 01:59:30', NULL, 13, 0),
(4, 'testtitle2', 'testcontent2', '2014-01-20 02:00:10', NULL, 13, 0),
(5, 'testtitle3', 'testcontent3', '2014-01-20 16:16:28', NULL, 13, 0);

-- --------------------------------------------------------

--
-- 表的结构 `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `article_id` int(10) NOT NULL,
  `reply_id` int(1) NOT NULL DEFAULT '-1',
  `user_id` int(10) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `createTime` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `height` int(10) NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `slider`
--

INSERT INTO `slider` (`ID`, `height`, `link`, `title`, `img`) VALUES
(1, 2, 'scauhci.org', 'test', 'none.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `tag`
--

CREATE TABLE IF NOT EXISTS `tag` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `isFormal` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `tag`
--

INSERT INTO `tag` (`ID`, `name`, `isFormal`) VALUES
(1, '活动通知', 1),
(2, 'TCP/IP', 0),
(3, 'Apache', 0),
(4, 'HTML5', 0),
(5, 'CSS3', 0),
(6, 'Javascript', 0);

-- --------------------------------------------------------

--
-- 表的结构 `tag_relate_article`
--

CREATE TABLE IF NOT EXISTS `tag_relate_article` (
  `article_id` int(10) NOT NULL,
  `tag_id` int(10) NOT NULL,
  PRIMARY KEY (`article_id`,`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `tag_relate_article`
--

INSERT INTO `tag_relate_article` (`article_id`, `tag_id`) VALUES
(3, 1),
(4, 1),
(4, 3),
(4, 4),
(5, 1);

-- --------------------------------------------------------

--
-- 表的结构 `user_basic`
--

CREATE TABLE IF NOT EXISTS `user_basic` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `user` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `isAdmin` int(11) NOT NULL DEFAULT '0',
  `lastLogTime` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `user` (`user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;

--
-- 转存表中的数据 `user_basic`
--

INSERT INTO `user_basic` (`ID`, `user`, `password`, `isAdmin`, `lastLogTime`) VALUES
(13, 'test@qq.com', 'testtest', 0, '2014-01-20 17:51:46'),
(16, 'test2@qq.com', 'test2', 0, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `user_info`
--

CREATE TABLE IF NOT EXISTS `user_info` (
  `user_id` int(10) NOT NULL,
  `nickname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `popularity` int(10) DEFAULT '0',
  `registerTime` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `signature` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `article_count` int(10) DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `user_info`
--

INSERT INTO `user_info` (`user_id`, `nickname`, `popularity`, `registerTime`, `signature`, `article_count`) VALUES
(13, 'test', 5, '2014-01-12 19:27:08', 'test', 1),
(16, 'test2', 0, '2014-01-18 22:24:11', 'test2', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
