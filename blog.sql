-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-06-25 08:46:22
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- 表的结构 `blog_cate`
--

CREATE TABLE IF NOT EXISTS `blog_cate` (
  `cate_id` int(11) NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(100) NOT NULL COMMENT '分类名称',
  `cate_title` varchar(100) NOT NULL COMMENT '分类说明',
  `cate_keyword` varchar(100) NOT NULL COMMENT '关键词',
  `cate_description` varchar(255) NOT NULL COMMENT '描述',
  `cate_view` int(11) NOT NULL DEFAULT '0' COMMENT '浏览次数',
  `cate_order` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  `cate_pid` int(11) NOT NULL COMMENT '父级ID',
  PRIMARY KEY (`cate_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='文章分类' AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `blog_cate`
--

INSERT INTO `blog_cate` (`cate_id`, `cate_name`, `cate_title`, `cate_keyword`, `cate_description`, `cate_view`, `cate_order`, `cate_pid`) VALUES
(1, '新闻', '搜索国内外最热门的新闻资讯', '', '', 0, 1, 0),
(2, '体育', '发展体育事业，增强国民体质', '', '', 0, 3, 0),
(3, '娱乐', '人人都有自己的娱乐圈', '', '', 0, 2, 0),
(4, '热点新闻', '最新新闻事件_2016年国内重大社会热点新闻事件', '', '', 0, 11, 1),
(5, '军事新闻', '最新军事新闻_中国军事新闻_国际军事新闻军情网站', '', '', 0, 10, 1),
(6, '体育彩票', '中国体彩网 - 体育彩票管理中心唯一指定官方网站', '', '', 0, 0, 2),
(7, '乐视体育', '乐视体育–最专业的体育赛事平台', '', '', 0, 1, 2),
(8, '网易体育', '网易体育_有态度的体育门户', '', '', 0, 2, 2);

-- --------------------------------------------------------

--
-- 表的结构 `blog_user`
--

CREATE TABLE IF NOT EXISTS `blog_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='用户表' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `blog_user`
--

INSERT INTO `blog_user` (`user_id`, `user_name`, `user_pass`) VALUES
(1, 'admin', 'eyJpdiI6IkxkK0ZwZVplS2dJem84WEgxUU95dHc9PSIsInZhbHVlIjoieG9YZG1SVHd3ZVVkd2hcL1F2bTBLWmc9PSIsIm1hYyI6ImU2ZjcxOWVmYjlmYmY3MWFjNmNmN2ZmMjc1MDFmMTIwZmQzODRkNjVjMjIyMjMxZmZkOGQ4OTdmZDFjZjZiNzgifQ==');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
