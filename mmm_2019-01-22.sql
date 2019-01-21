# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.7.21)
# Database: mmm
# Generation Time: 2019-01-21 16:30:15 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table m_auth_group
# ------------------------------------------------------------

DROP TABLE IF EXISTS `m_auth_group`;

CREATE TABLE `m_auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` char(80) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

LOCK TABLES `m_auth_group` WRITE;
/*!40000 ALTER TABLE `m_auth_group` DISABLE KEYS */;

INSERT INTO `m_auth_group` (`id`, `title`, `status`, `rules`)
VALUES
	(1,'管理员组',1,'1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16'),
	(2,'普通用户组',1,'1,2,10,11');

/*!40000 ALTER TABLE `m_auth_group` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table m_auth_group_access
# ------------------------------------------------------------

DROP TABLE IF EXISTS `m_auth_group_access`;

CREATE TABLE `m_auth_group_access` (
  `uid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` mediumint(8) unsigned NOT NULL,
  `username` varchar(20) NOT NULL DEFAULT '',
  `password` varchar(20) NOT NULL DEFAULT '',
  `status` int(4) DEFAULT '1',
  PRIMARY KEY (`uid`),
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

LOCK TABLES `m_auth_group_access` WRITE;
/*!40000 ALTER TABLE `m_auth_group_access` DISABLE KEYS */;

INSERT INTO `m_auth_group_access` (`uid`, `group_id`, `username`, `password`, `status`)
VALUES
	(1,1,'admin','123',1),
	(2,2,'mmm','123',1),
	(3,2,'yang','123',1),
	(4,2,'ybm','123',1);

/*!40000 ALTER TABLE `m_auth_group_access` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table m_auth_rule
# ------------------------------------------------------------

DROP TABLE IF EXISTS `m_auth_rule`;

CREATE TABLE `m_auth_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `nid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `name` char(80) NOT NULL DEFAULT '',
  `title` char(80) NOT NULL DEFAULT '',
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `condition` char(100) NOT NULL DEFAULT '',
  `icon` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

LOCK TABLES `m_auth_rule` WRITE;
/*!40000 ALTER TABLE `m_auth_rule` DISABLE KEYS */;

INSERT INTO `m_auth_rule` (`id`, `nid`, `name`, `title`, `type`, `status`, `condition`, `icon`)
VALUES
	(1,0,'dataconfiguration','数据供给',1,1,'','&#xe61e;'),
	(2,1,'index/dataconfiguration/select','数据筛选(完成后待删)',1,1,'',NULL),
	(3,0,'auth','系统设置',1,1,'','&#xe61d;'),
	(4,3,'index/auth/authgroup','用户组&&权限',1,1,'',NULL),
	(5,3,'index/auth/user','用户管理',1,1,'',NULL),
	(6,3,'index/index/loginfo','登陆日志',1,1,'',NULL),
	(7,3,'index/auth/rule','栏目设置',1,1,'',NULL),
	(8,0,'analysis','模型归类分析',1,1,'','&#xe635;'),
	(9,8,'index/analysis/log','开发日志',1,1,'',NULL),
	(10,0,'tag','标签管理',1,1,'','&#xe70d;'),
	(11,10,'','标签定义',1,1,'',NULL),
	(12,1,'index/datainput/imageupload','批量导入上传',1,1,'',NULL),
	(13,1,'index/datainput/patch','爬虫获取数据',1,1,'',NULL),
	(14,0,'dataset','数据集管理',1,1,'','&#xe637;'),
	(15,14,'index/tagbase?connectbaseid=1','标签定义',1,1,'',NULL),
	(16,14,'index/dataconfiguration/tagbyman','结果接入',1,1,'',NULL);

/*!40000 ALTER TABLE `m_auth_rule` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table m_base
# ------------------------------------------------------------

DROP TABLE IF EXISTS `m_base`;

CREATE TABLE `m_base` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `parentid` int(8) DEFAULT '0',
  `name` varchar(20) DEFAULT NULL,
  `no` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

LOCK TABLES `m_base` WRITE;
/*!40000 ALTER TABLE `m_base` DISABLE KEYS */;

INSERT INTO `m_base` (`id`, `parentid`, `name`, `no`)
VALUES
	(1,0,'人脸识别','FACEMODULE'),
	(2,0,'手势验证','HAND');

/*!40000 ALTER TABLE `m_base` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table m_loginlog
# ------------------------------------------------------------

DROP TABLE IF EXISTS `m_loginlog`;

CREATE TABLE `m_loginlog` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(5) unsigned NOT NULL DEFAULT '0',
  `username` varchar(10) NOT NULL DEFAULT '',
  `group_id` int(5) NOT NULL DEFAULT '0',
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

LOCK TABLES `m_loginlog` WRITE;
/*!40000 ALTER TABLE `m_loginlog` DISABLE KEYS */;

INSERT INTO `m_loginlog` (`id`, `uid`, `username`, `group_id`, `date`)
VALUES
	(1,1,'admin',1,'2019-01-10 23:14:57'),
	(2,1,'admin',1,'2019-01-12 22:33:56'),
	(3,1,'admin',1,'2019-01-13 23:29:53'),
	(4,1,'admin',1,'2019-01-14 22:09:45'),
	(5,1,'admin',1,'2019-01-15 22:44:10'),
	(6,1,'admin',1,'2019-01-19 21:37:12'),
	(7,1,'admin',1,'2019-01-20 17:52:41'),
	(8,1,'admin',1,'2019-01-21 21:13:02');

/*!40000 ALTER TABLE `m_loginlog` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table m_pic
# ------------------------------------------------------------

DROP TABLE IF EXISTS `m_pic`;

CREATE TABLE `m_pic` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `src` varchar(100) DEFAULT NULL,
  `status` int(4) DEFAULT '0',
  `uid` int(8) DEFAULT '0',
  `tag` varchar(100) DEFAULT NULL,
  `type` int(5) DEFAULT '0',
  `date` datetime DEFAULT NULL,
  `resulterr` int(5) DEFAULT NULL,
  `brief` varchar(300) DEFAULT NULL,
  `manmadetags` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=179 DEFAULT CHARSET=utf8;

LOCK TABLES `m_pic` WRITE;
/*!40000 ALTER TABLE `m_pic` DISABLE KEYS */;

INSERT INTO `m_pic` (`id`, `src`, `status`, `uid`, `tag`, `type`, `date`, `resulterr`, `brief`, `manmadetags`)
VALUES
	(1,'/patch/u=634994228,1053158147&fm=26&gp=0.jpg',0,1,'18,26,29',1,'2019-01-15 22:44:35',NULL,NULL,NULL),
	(2,'/patch/u=761585048,1757231181&fm=26&gp=0.jpg',0,1,'19,26,29',1,'2019-01-15 22:44:36',NULL,NULL,NULL),
	(3,'/patch/u=3690229622,2975567455&fm=11&gp=0.jpg',0,1,'19,26,28',1,'2019-01-15 22:44:36',NULL,NULL,NULL),
	(4,'/patch/u=131840351,1847726461&fm=26&gp=0.jpg',0,1,'19,26,28',1,'2019-01-15 22:44:37',NULL,NULL,NULL),
	(5,'/patch/u=3737805938,979295849&fm=26&gp=0.jpg',0,1,'19,26,28',1,'2019-01-15 22:44:39',NULL,NULL,NULL),
	(6,'/patch/u=2862674107,1679172216&fm=26&gp=0.jpg',0,1,'18,25,29',1,'2019-01-15 22:44:39',NULL,NULL,NULL),
	(7,'/patch/u=3439666185,669289276&fm=15&gp=0.jpg',0,1,'19,26,29',1,'2019-01-15 22:44:39',NULL,NULL,NULL),
	(8,'/patch/u=2305595422,1547210110&fm=26&gp=0.jpg',0,1,'18,26,29',1,'2019-01-15 22:44:39',NULL,NULL,NULL),
	(9,'/patch/u=3169984375,4221884828&fm=26&gp=0.jpg',0,1,'18,26,28',1,'2019-01-15 22:44:40',NULL,NULL,NULL),
	(10,'/patch/u=3184379481,4038057224&fm=26&gp=0.jpg',0,1,'19,25,29',1,'2019-01-15 22:44:40',NULL,NULL,NULL),
	(11,'/patch/u=1242253813,1771189878&fm=15&gp=0.jpg',0,1,'18,26,29',1,'2019-01-15 22:44:40',NULL,NULL,NULL),
	(12,'/patch/u=2347982167,2229548037&fm=26&gp=0.jpg',0,1,'19,25,28',1,'2019-01-15 22:44:40',NULL,NULL,NULL),
	(13,'/patch/u=2965212255,3923149784&fm=26&gp=0.jpg',0,1,'19,25,29',1,'2019-01-15 22:44:40',NULL,NULL,NULL),
	(14,'/patch/u=3110556434,2743377563&fm=15&gp=0.jpg',0,1,'19,26,29',1,'2019-01-15 22:44:40',NULL,NULL,NULL),
	(15,'/patch/u=1941237485,1952211612&fm=26&gp=0.jpg',0,1,'18,25,29',1,'2019-01-15 22:44:41',NULL,NULL,NULL),
	(16,'/patch/u=1567554625,2237165066&fm=26&gp=0.jpg',0,1,'19,26,29',1,'2019-01-15 22:44:42',NULL,NULL,NULL),
	(17,'/patch/u=3896574914,1696685668&fm=15&gp=0.jpg',0,1,'19,25,28',1,'2019-01-15 22:44:42',NULL,NULL,NULL),
	(18,'/patch/u=2191727160,2885899536&fm=26&gp=0.jpg',0,1,'18,26,28',1,'2019-01-15 22:44:42',NULL,NULL,NULL),
	(19,'/patch/u=341402511,2223978673&fm=26&gp=0.jpg',0,1,'19,26,29',1,'2019-01-15 22:44:42',NULL,NULL,NULL),
	(20,'/patch/u=530502065,1948822807&fm=15&gp=0.jpg',0,1,'19,25,29',1,'2019-01-15 22:44:42',NULL,NULL,NULL),
	(21,'/patch/u=2826742895,3103883741&fm=26&gp=0.jpg',0,1,'18,25,28',1,'2019-01-15 22:44:42',NULL,NULL,NULL),
	(22,'/patch/u=211187705,3628844754&fm=26&gp=0.jpg',0,1,'19,25,28',1,'2019-01-15 22:44:42',NULL,NULL,NULL),
	(23,'/patch/u=609329430,3912753808&fm=11&gp=0.jpg',0,1,'18,25,28',1,'2019-01-15 22:44:42',NULL,NULL,NULL),
	(24,'/patch/u=2075610839,2884856722&fm=26&gp=0.jpg',0,1,'18,26,28',1,'2019-01-15 22:44:42',NULL,NULL,NULL),
	(25,'/patch/u=1665227046,3713810017&fm=26&gp=0.jpg',0,1,'18,25,28',1,'2019-01-15 22:44:42',NULL,NULL,NULL),
	(26,'/patch/u=2530461469,4178072197&fm=15&gp=0.jpg',0,1,'18,26,28',1,'2019-01-15 22:44:42',NULL,NULL,NULL),
	(27,'/patch/u=2280463910,3260688022&fm=26&gp=0.jpg',0,1,'19,25,29',1,'2019-01-15 22:44:42',NULL,NULL,NULL),
	(28,'/patch/u=2710777969,4134895258&fm=26&gp=0.jpg',0,1,'19,26,29',1,'2019-01-15 22:44:42',NULL,NULL,NULL),
	(29,'/patch/u=1092403856,1708010568&fm=11&gp=0.jpg',0,1,'19,26,29',1,'2019-01-15 22:44:42',NULL,NULL,NULL),
	(30,'/patch/u=1060473446,190171183&fm=26&gp=0.jpg',0,1,'18,26,29',1,'2019-01-15 22:44:42',NULL,NULL,NULL),
	(31,'/patch/u=4114694399,595873081&fm=26&gp=0.jpg',0,1,'18,25,28',1,'2019-01-15 22:44:42',NULL,NULL,NULL),
	(32,'/patch/u=3975542249,3896438336&fm=15&gp=0.jpg',0,1,'18,25,28',1,'2019-01-15 22:44:42',NULL,NULL,NULL),
	(33,'/patch/u=1125704962,146266294&fm=26&gp=0.jpg',0,1,'19,25,29',1,'2019-01-15 22:44:42',NULL,NULL,NULL),
	(34,'/patch/u=1443210944,1219278671&fm=26&gp=0.jpg',0,1,'18,25,28',1,'2019-01-15 22:44:42',NULL,NULL,NULL),
	(35,'/patch/u=4128868973,1979543556&fm=26&gp=0.jpg',0,1,'18,26,29',1,'2019-01-15 22:44:42',NULL,NULL,NULL),
	(36,'/patch/u=1805270908,408011698&fm=26&gp=0.jpg',0,1,'18,26,28',1,'2019-01-15 22:44:42',NULL,NULL,NULL),
	(37,'/patch/u=2530259107,3550452971&fm=26&gp=0.jpg',0,1,'18,25,29',1,'2019-01-15 22:44:42',NULL,NULL,NULL),
	(38,'/patch/u=266000392,3982402435&fm=26&gp=0.jpg',0,1,'18,25,29',1,'2019-01-15 22:44:42',NULL,NULL,NULL),
	(39,'/patch/u=1784571096,2643553439&fm=26&gp=0.jpg',0,1,'18,25,29',1,'2019-01-15 22:44:42',NULL,NULL,NULL),
	(40,'/patch/u=2914238801,1020237878&fm=26&gp=0.jpg',0,1,'19,25,28',1,'2019-01-15 22:44:43',NULL,NULL,NULL),
	(41,'/patch/u=2082394878,1903345297&fm=26&gp=0.jpg',0,1,'19,25,28',1,'2019-01-15 22:44:43',NULL,NULL,NULL),
	(42,'/patch/u=3005657130,417259481&fm=26&gp=0.jpg',0,1,'18,26,29',1,'2019-01-15 22:44:43',NULL,NULL,NULL),
	(43,'/patch/u=3722369287,342991226&fm=26&gp=0.jpg',0,1,'19,25,29',1,'2019-01-15 22:44:43',NULL,NULL,NULL),
	(44,'/patch/u=2686716272,2604207418&fm=26&gp=0.jpg',0,1,'19,25,29',1,'2019-01-15 22:44:43',NULL,NULL,NULL),
	(45,'/patch/u=1325158328,781796011&fm=26&gp=0.jpg',0,1,'18,26,28',1,'2019-01-15 22:44:43',NULL,NULL,NULL),
	(46,'/patch/u=3402847872,3071334627&fm=26&gp=0.jpg',0,1,'18,25,28',1,'2019-01-15 22:44:43',NULL,NULL,NULL),
	(47,'/patch/u=1230082648,3479733448&fm=26&gp=0.jpg',0,1,'18,26,28',1,'2019-01-15 22:44:43',NULL,NULL,NULL),
	(48,'/patch/u=1273934264,733606758&fm=11&gp=0.jpg',0,1,'18,26,29',1,'2019-01-15 22:44:43',NULL,NULL,NULL),
	(49,'/patch/u=3295824297,625456553&fm=26&gp=0.jpg',0,1,'19,26,28',1,'2019-01-15 22:44:43',NULL,NULL,NULL),
	(50,'/patch/u=3445581957,3334803557&fm=15&gp=0.jpg',0,1,'18,25,29',1,'2019-01-15 22:44:43',NULL,NULL,NULL),
	(51,'/patch/u=3403887689,2730645081&fm=26&gp=0.jpg',0,1,'18,26,29',1,'2019-01-15 22:44:43',NULL,NULL,NULL),
	(52,'/patch/u=3644513728,4212424493&fm=26&gp=0.jpg',0,1,'19,26,29',1,'2019-01-15 22:44:43',NULL,NULL,NULL),
	(53,'/patch/u=1689426232,3052982410&fm=26&gp=0.jpg',0,1,'18,26,29',1,'2019-01-15 22:44:44',NULL,NULL,NULL),
	(54,'/patch/u=3160312597,4069147357&fm=26&gp=0.jpg',0,1,'18,26,29',1,'2019-01-15 22:44:44',NULL,NULL,NULL),
	(55,'/patch/u=2247036241,243605489&fm=26&gp=0.jpg',0,1,'18,26,29',1,'2019-01-15 22:44:44',NULL,NULL,NULL),
	(56,'/patch/u=3571831983,2057644503&fm=26&gp=0.jpg',0,1,'18,25,28',1,'2019-01-15 22:44:44',NULL,NULL,NULL),
	(57,'/patch/u=3525859825,2131526022&fm=26&gp=0.jpg',0,1,'19,25,28',1,'2019-01-15 22:44:44',NULL,NULL,NULL),
	(58,'/patch/u=1316654761,2978902337&fm=26&gp=0.jpg',0,1,'19,25,28',1,'2019-01-15 22:44:44',NULL,NULL,NULL),
	(59,'/patch/u=1976239647,2873296835&fm=15&gp=0.jpg',0,1,'19,25,28',1,'2019-01-15 22:44:44',NULL,NULL,NULL),
	(60,'/patch/u=4068951018,2767258803&fm=11&gp=0.jpg',0,1,'19,25,29',1,'2019-01-15 22:44:44',NULL,NULL,NULL),
	(61,'/patch/u=1378390908,1295063724&fm=26&gp=0.jpg',0,1,'19,25,28',1,'2019-01-15 22:44:44',NULL,NULL,NULL),
	(62,'/patch/u=2299751933,454540929&fm=26&gp=0.jpg',0,1,'18,25,28',1,'2019-01-15 22:44:44',NULL,NULL,NULL),
	(63,'/patch/u=3495906799,1426580875&fm=26&gp=0.jpg',0,1,'19,26,28',1,'2019-01-15 22:44:44',NULL,NULL,NULL),
	(64,'/patch/u=335453189,2052072572&fm=15&gp=0.jpg',0,1,'19,25,29',1,'2019-01-15 22:44:44',NULL,NULL,NULL),
	(65,'/patch/u=3315902572,3218828233&fm=26&gp=0.jpg',0,1,'19,26,29',1,'2019-01-15 22:44:44',NULL,NULL,NULL),
	(66,'/patch/u=1296924733,261806827&fm=26&gp=0.jpg',0,1,'19,26,29',1,'2019-01-15 22:44:44',NULL,NULL,NULL),
	(67,'/patch/u=1802639678,711966322&fm=26&gp=0.jpg',0,1,'18,26,29',1,'2019-01-15 22:44:45',NULL,NULL,NULL),
	(68,'/patch/u=3003020031,1224005865&fm=26&gp=0.jpg',0,1,'18,25,29',1,'2019-01-15 22:44:45',NULL,NULL,NULL),
	(69,'/patch/u=841003733,2292496595&fm=15&gp=0.jpg',0,1,'19,25,28',1,'2019-01-15 22:44:45',NULL,NULL,NULL),
	(70,'/patch/u=1847446033,114018673&fm=26&gp=0.jpg',0,1,'18,25,29',1,'2019-01-15 22:44:45',NULL,NULL,NULL),
	(71,'/patch/u=1745725353,2701212414&fm=26&gp=0.jpg',0,1,'18,25,29',1,'2019-01-15 22:44:46',NULL,NULL,NULL),
	(72,'/patch/u=1838844531,1574258579&fm=26&gp=0.jpg',0,1,'19,26,28',1,'2019-01-15 22:44:46',NULL,NULL,NULL),
	(73,'/patch/u=1911308230,2254577648&fm=26&gp=0.jpg',0,1,'19,25,28',1,'2019-01-15 22:44:46',NULL,NULL,NULL),
	(74,'/patch/u=2722398323,4276078660&fm=26&gp=0.jpg',0,1,'18,25,28',1,'2019-01-15 22:44:46',NULL,NULL,NULL),
	(75,'/patch/u=2584446920,3194419519&fm=11&gp=0.jpg',0,1,'18,26,28',1,'2019-01-15 22:44:46',NULL,NULL,NULL),
	(76,'/patch/u=3754436706,221900668&fm=15&gp=0.jpg',0,1,'18,26,29',1,'2019-01-15 22:44:46',NULL,NULL,NULL),
	(77,'/patch/u=3626181443,3218044288&fm=26&gp=0.jpg',0,1,'19,25,28',1,'2019-01-15 22:44:46',NULL,NULL,NULL),
	(78,'/patch/u=2102898436,1519451212&fm=15&gp=0.jpg',0,1,'18,26,28',1,'2019-01-15 22:44:46',NULL,NULL,NULL),
	(79,'/patch/u=2679408882,2543808909&fm=15&gp=0.jpg',0,1,'18,25,28',1,'2019-01-15 22:44:46',NULL,NULL,NULL),
	(80,'/patch/u=3655523710,4208826047&fm=26&gp=0.jpg',0,1,'18,26,28',1,'2019-01-15 22:44:46',NULL,NULL,NULL),
	(81,'/patch/u=2997692506,332741065&fm=26&gp=0.jpg',0,1,'18,25,28',1,'2019-01-15 22:44:46',NULL,NULL,NULL),
	(82,'/patch/u=263542035,719835986&fm=26&gp=0.jpg',0,1,'19,26,29',1,'2019-01-15 22:44:46',NULL,NULL,NULL),
	(83,'/patch/u=325659540,3947679398&fm=15&gp=0.jpg',0,1,'18,25,29',1,'2019-01-15 22:44:46',NULL,NULL,NULL),
	(84,'/patch/u=3692940869,1030233559&fm=26&gp=0.jpg',0,1,'19,26,29',1,'2019-01-15 22:44:46',NULL,NULL,NULL),
	(85,'/patch/u=2651284806,1503127009&fm=15&gp=0.jpg',0,1,'18,25,28',1,'2019-01-15 22:44:46',NULL,NULL,NULL),
	(86,'/patch/u=2629588177,2668748602&fm=26&gp=0.jpg',0,1,'19,25,29',1,'2019-01-16 01:06:10',NULL,NULL,NULL),
	(87,'/patch/u=783719155,821183414&fm=15&gp=0.jpg',0,1,'19,26,28',1,'2019-01-15 22:44:46',NULL,NULL,NULL),
	(88,'/patch/u=1990294344,1911949286&fm=15&gp=0.jpg',0,1,'18,25,28',1,'2019-01-16 01:06:07',NULL,NULL,NULL),
	(89,'/patch/u=3811585368,2677748339&fm=26&gp=0.jpg',0,1,'19,25,28',1,'2019-01-16 01:06:05',NULL,NULL,NULL),
	(90,'/patch/u=2747827792,2457565428&fm=26&gp=0.jpg',0,1,'19,26,28',1,'2019-01-21 21:36:56',NULL,NULL,NULL),
	(91,'/patch/u=218330420,16140369&fm=26&gp=0.jpg',0,1,'18,26,29',1,'2019-01-21 21:36:56',NULL,NULL,NULL),
	(92,'/patch/u=3464977464,2543105908&fm=15&gp=0.jpg',0,1,'18,25,29',1,'2019-01-21 21:36:56',NULL,NULL,NULL),
	(93,'/patch/u=2651400166,1285303024&fm=15&gp=0.jpg',0,1,'19,26,28',1,'2019-01-21 21:36:56',NULL,NULL,NULL),
	(94,'/patch/u=375661225,2642037524&fm=26&gp=0.jpg',0,1,'18,25,28',1,'2019-01-21 21:36:56',NULL,NULL,NULL),
	(95,'/patch/u=100384662,3038728268&fm=15&gp=0.jpg',0,1,'19,26,28',1,'2019-01-21 21:36:56',NULL,NULL,NULL),
	(96,'/patch/u=2501713228,822735177&fm=26&gp=0.jpg',0,1,'19,26,28',1,'2019-01-21 21:36:56',NULL,NULL,NULL),
	(97,'/patch/u=123162225,878928114&fm=15&gp=0.jpg',0,1,'19,26,29',1,'2019-01-21 21:36:57',NULL,NULL,NULL),
	(98,'/patch/u=1921333588,2829382435&fm=26&gp=0.jpg',0,1,'19,26,29',1,'2019-01-21 21:36:57',NULL,NULL,NULL),
	(99,'/patch/u=1561190957,1810244280&fm=26&gp=0.jpg',0,1,'19,25,28',1,'2019-01-21 21:36:57',NULL,NULL,NULL),
	(100,'/patch/u=1267326413,4177076113&fm=26&gp=0.jpg',0,1,'18,26,28',1,'2019-01-21 21:36:57',NULL,NULL,NULL),
	(101,'/patch/u=2346960736,1433734950&fm=26&gp=0.jpg',0,1,'18,26,28',1,'2019-01-21 21:36:57',NULL,NULL,NULL),
	(102,'/patch/u=1369417435,3740211473&fm=15&gp=0.jpg',0,1,'19,26,28',1,'2019-01-21 21:36:57',NULL,NULL,NULL),
	(103,'/patch/u=2615293269,244159163&fm=26&gp=0.jpg',0,1,'18,25,29',1,'2019-01-21 21:36:57',NULL,NULL,NULL),
	(104,'/patch/u=170873285,3781610603&fm=26&gp=0.jpg',0,1,'18,25,29',1,'2019-01-21 21:36:57',NULL,NULL,NULL),
	(105,'/patch/u=1568984277,3787703295&fm=26&gp=0.jpg',0,1,'19,26,28',1,'2019-01-21 21:36:57',NULL,NULL,NULL),
	(106,'/patch/u=3835601177,3423014440&fm=26&gp=0.jpg',0,1,'19,25,28',1,'2019-01-21 21:36:57',NULL,NULL,NULL),
	(107,'/patch/u=1889825312,1862728990&fm=15&gp=0.jpg',0,1,'19,25,28',1,'2019-01-21 21:36:57',NULL,NULL,NULL),
	(108,'/patch/u=323647705,707503219&fm=15&gp=0.jpg',0,1,'19,26,29',1,'2019-01-21 21:36:57',NULL,NULL,NULL),
	(109,'/patch/u=2123126189,2327617484&fm=15&gp=0.jpg',0,1,'18,26,29',1,'2019-01-21 21:36:57',NULL,NULL,NULL),
	(110,'/patch/u=1463646371,2979431951&fm=26&gp=0.jpg',0,1,'19,26,28',1,'2019-01-21 21:36:57',NULL,NULL,NULL),
	(111,'/patch/u=1822731675,1350840533&fm=26&gp=0.jpg',0,1,'18,25,28',1,'2019-01-21 21:36:57',NULL,NULL,NULL),
	(112,'/patch/u=1931089415,2890038569&fm=15&gp=0.jpg',0,1,'19,25,28',1,'2019-01-21 21:36:57',NULL,NULL,NULL),
	(113,'/patch/u=345306214,1777583191&fm=26&gp=0.jpg',0,1,'18,25,28',1,'2019-01-21 21:36:57',NULL,NULL,NULL),
	(114,'/patch/u=1982492694,1268927779&fm=15&gp=0.jpg',0,1,'19,25,29',1,'2019-01-21 21:36:57',NULL,NULL,NULL),
	(115,'/patch/u=2226811881,2676486337&fm=26&gp=0.jpg',0,1,'19,25,29',1,'2019-01-21 21:36:57',NULL,NULL,NULL),
	(116,'/patch/u=2573258383,3097855554&fm=26&gp=0.jpg',0,1,'18,26,28',1,'2019-01-21 21:36:57',NULL,NULL,NULL),
	(117,'/patch/u=2190023570,270009273&fm=15&gp=0.jpg',0,1,'19,25,28',1,'2019-01-21 21:36:57',NULL,NULL,NULL),
	(118,'/patch/u=2114429266,1026762781&fm=26&gp=0.jpg',0,1,'19,26,29',1,'2019-01-21 21:36:58',NULL,NULL,NULL),
	(119,'/patch/u=2552651698,3498937331&fm=15&gp=0.jpg',0,1,'19,26,28',1,'2019-01-21 21:36:58',NULL,NULL,NULL),
	(120,'/patch/u=3368978375,2128143043&fm=26&gp=0.jpg',0,1,'18,25,29',1,'2019-01-21 21:36:58',NULL,NULL,NULL),
	(121,'/patch/u=2699472818,2468902956&fm=15&gp=0.jpg',0,1,'19,26,29',1,'2019-01-21 21:36:58',NULL,NULL,NULL),
	(122,'/patch/u=3739100452,3607576393&fm=26&gp=0.jpg',0,1,'18,26,29',1,'2019-01-21 21:36:58',NULL,NULL,NULL),
	(123,'/patch/u=3560710817,2606004642&fm=15&gp=0.jpg',0,1,'18,25,28',1,'2019-01-21 21:36:58',NULL,NULL,NULL),
	(124,'/patch/u=3118552062,1968072583&fm=26&gp=0.jpg',0,1,'18,26,28',1,'2019-01-21 21:36:58',NULL,NULL,NULL),
	(125,'/patch/u=3244460829,667693882&fm=26&gp=0.jpg',0,1,'18,26,28',1,'2019-01-21 21:36:58',NULL,NULL,NULL),
	(126,'/patch/u=3152703281,4156189011&fm=26&gp=0.jpg',0,1,'18,25,28',1,'2019-01-21 21:36:58',NULL,NULL,NULL),
	(127,'/patch/u=3093505911,709757391&fm=15&gp=0.jpg',0,1,'19,25,28',1,'2019-01-21 21:36:58',NULL,NULL,NULL),
	(128,'/patch/u=3761703541,3424577052&fm=15&gp=0.jpg',0,1,'18,26,28',1,'2019-01-21 21:36:58',NULL,NULL,NULL),
	(129,'/patch/u=3502252972,3808745982&fm=26&gp=0.jpg',0,1,'18,25,29',1,'2019-01-21 21:36:58',NULL,NULL,NULL),
	(130,'/patch/u=362935741,2042450357&fm=26&gp=0.jpg',0,1,'19,26,28',1,'2019-01-21 21:36:58',NULL,NULL,NULL),
	(131,'/patch/u=1376950597,661501710&fm=15&gp=0.jpg',0,1,'18,25,28',1,'2019-01-21 21:36:58',NULL,NULL,NULL),
	(132,'/patch/u=2520627683,496386327&fm=15&gp=0.jpg',0,1,'18,26,28',1,'2019-01-21 21:36:58',NULL,NULL,NULL),
	(133,'/patch/u=2873668773,909804925&fm=26&gp=0.jpg',0,1,'18,25,28',1,'2019-01-21 21:36:58',NULL,NULL,NULL),
	(134,'/patch/u=1687373623,299564290&fm=26&gp=0.jpg',0,1,'19,25,28',1,'2019-01-21 21:36:58',NULL,NULL,NULL),
	(135,'/patch/u=2809232486,2186629937&fm=15&gp=0.jpg',0,1,'18,26,29',1,'2019-01-21 21:36:58',NULL,NULL,NULL),
	(136,'/patch/u=2400208890,1778482321&fm=15&gp=0.jpg',0,1,'19,25,28',1,'2019-01-21 21:36:58',NULL,NULL,NULL),
	(137,'/patch/u=252315101,66879399&fm=15&gp=0.jpg',0,1,'19,25,29',1,'2019-01-21 21:36:58',NULL,NULL,NULL),
	(138,'/patch/u=3337700063,1523582155&fm=26&gp=0.jpg',0,1,'19,25,28',1,'2019-01-21 21:36:58',NULL,NULL,NULL),
	(139,'/patch/u=13340956,1873075733&fm=15&gp=0.jpg',0,1,'19,25,28',1,'2019-01-21 21:36:58',NULL,NULL,NULL),
	(140,'/patch/u=2430521858,2680874223&fm=26&gp=0.jpg',0,1,'18,25,29',1,'2019-01-21 21:36:58',NULL,NULL,NULL),
	(141,'/patch/u=22273245,272330014&fm=26&gp=0.jpg',0,1,'19,26,29',1,'2019-01-21 21:36:58',NULL,NULL,NULL),
	(142,'/patch/u=264630957,3465470252&fm=15&gp=0.jpg',0,1,'19,26,29',1,'2019-01-21 21:36:59',NULL,NULL,NULL),
	(143,'/patch/u=2481413271,2253501225&fm=26&gp=0.jpg',0,1,'18,25,29',1,'2019-01-21 21:36:59',NULL,NULL,NULL),
	(144,'/patch/u=1992785949,3455097892&fm=15&gp=0.jpg',0,1,'18,25,28',1,'2019-01-21 21:36:59',NULL,NULL,NULL),
	(145,'/patch/u=3488642900,3197683258&fm=15&gp=0.jpg',0,1,'18,25,28',1,'2019-01-21 21:36:59',NULL,NULL,NULL),
	(146,'/patch/u=3705032977,2346462958&fm=15&gp=0.jpg',0,1,'19,26,28',1,'2019-01-21 21:36:59',NULL,NULL,NULL),
	(147,'/patch/u=3685443101,919844851&fm=15&gp=0.jpg',0,1,'19,25,29',1,'2019-01-21 21:36:59',NULL,NULL,NULL),
	(148,'/patch/u=3350437476,49703933&fm=15&gp=0.jpg',0,1,'19,25,28',1,'2019-01-21 21:36:59',NULL,NULL,NULL),
	(149,'/patch/u=3867486222,323769622&fm=26&gp=0.jpg',0,1,'18,26,29',1,'2019-01-21 21:36:59',NULL,NULL,NULL),
	(150,'/patch/u=2157405279,2336231639&fm=15&gp=0.jpg',0,1,'19,26,29',1,'2019-01-21 21:36:59',NULL,NULL,NULL),
	(151,'/patch/u=1037084821,2792048717&fm=15&gp=0.jpg',0,1,'19,25,28',1,'2019-01-21 21:36:59',NULL,NULL,NULL),
	(152,'/patch/u=1523518955,2789971973&fm=15&gp=0.jpg',0,1,'18,25,29',1,'2019-01-21 21:36:59',NULL,NULL,NULL),
	(153,'/patch/u=1541527982,507621349&fm=15&gp=0.jpg',0,1,'18,26,28',1,'2019-01-21 21:36:59',NULL,NULL,NULL),
	(154,'/patch/u=1327091321,3689209379&fm=26&gp=0.jpg',0,1,'18,25,29',1,'2019-01-21 21:36:59',NULL,NULL,NULL),
	(155,'/patch/u=1756891089,3033141516&fm=26&gp=0.jpg',0,1,'19,26,28',1,'2019-01-21 21:36:59',NULL,NULL,NULL),
	(156,'/patch/u=2713166814,2478585299&fm=15&gp=0.jpg',0,1,'18,25,29',1,'2019-01-21 21:36:59',NULL,NULL,NULL),
	(157,'/patch/u=2269251904,1182553882&fm=26&gp=0.jpg',0,1,'18,26,28',1,'2019-01-21 21:36:59',NULL,NULL,NULL),
	(158,'/patch/u=2013443761,1807271457&fm=15&gp=0.jpg',0,1,'18,26,29',1,'2019-01-21 21:36:59',NULL,NULL,NULL),
	(159,'/patch/u=2118968536,219408899&fm=26&gp=0.jpg',0,1,'19,25,29',1,'2019-01-21 21:36:59',NULL,NULL,NULL),
	(160,'/patch/u=3109993657,1367890184&fm=26&gp=0.jpg',0,1,'19,26,28',1,'2019-01-21 21:36:59',NULL,NULL,NULL),
	(161,'/patch/u=3695340547,1015508204&fm=26&gp=0.jpg',0,1,'19,25,29',1,'2019-01-21 21:36:59',NULL,NULL,NULL),
	(162,'/patch/u=2731456225,2543409061&fm=15&gp=0.jpg',0,1,'18,25,28',1,'2019-01-21 21:36:59',NULL,NULL,NULL),
	(163,'/patch/u=2718442748,3751238737&fm=15&gp=0.jpg',0,1,'18,25,28',1,'2019-01-21 21:36:59',NULL,NULL,NULL),
	(164,'/patch/u=3138019092,2606641644&fm=15&gp=0.jpg',0,1,'19,25,28',1,'2019-01-21 21:36:59',NULL,NULL,NULL),
	(165,'/patch/u=2738626920,157151572&fm=15&gp=0.jpg',0,1,'18,26,28',1,'2019-01-21 21:36:59',NULL,NULL,NULL),
	(166,'/patch/u=3224683769,3902330613&fm=15&gp=0.jpg',0,1,'18,26,28',1,'2019-01-21 21:37:00',NULL,NULL,NULL),
	(167,'/patch/u=3208486930,2962776711&fm=26&gp=0.jpg',0,1,'19,26,28',1,'2019-01-21 21:37:00',NULL,NULL,NULL),
	(168,'/patch/u=2336244487,1881135035&fm=15&gp=0.jpg',0,1,'18,26,28',1,'2019-01-21 21:37:00',NULL,NULL,NULL),
	(169,'/patch/u=2566564079,2955182243&fm=26&gp=0.jpg',0,1,'19,25,28',1,'2019-01-21 21:37:00',NULL,NULL,NULL),
	(170,'/patch/u=1621331718,2986802414&fm=26&gp=0.jpg',0,1,'18,26,29',1,'2019-01-21 21:37:00',NULL,NULL,NULL),
	(171,'/patch/u=125345184,2566296676&fm=26&gp=0.jpg',0,1,'19,25,28',1,'2019-01-21 21:37:00',NULL,NULL,NULL),
	(172,'/patch/u=1987047350,2206867649&fm=15&gp=0.jpg',0,1,'19,26,28',1,'2019-01-21 21:37:00',NULL,NULL,NULL),
	(173,'/patch/u=2864345339,1052193935&fm=26&gp=0.jpg',0,1,'18,25,29',1,'2019-01-21 21:37:00',NULL,NULL,NULL),
	(174,'/patch/u=1861734973,580134713&fm=15&gp=0.jpg',0,1,'19,26,28',1,'2019-01-21 21:37:00',NULL,NULL,NULL),
	(175,'/patch/u=1448786386,716665333&fm=15&gp=0.jpg',0,1,'19,25,29',1,'2019-01-21 21:37:00',NULL,NULL,NULL),
	(176,'/patch/u=337415164,3962771150&fm=15&gp=0.jpg',0,1,'19,26,29',1,'2019-01-21 21:37:00',NULL,NULL,NULL),
	(177,'/patch/u=2031382282,2815924641&fm=15&gp=0.jpg',0,1,'19,25,28',1,'2019-01-21 21:37:00',NULL,NULL,NULL),
	(178,'/patch/u=3571902001,384862529&fm=11&gp=0.jpg',0,1,'19,26,28',1,'2019-01-21 21:37:00',NULL,NULL,NULL);

/*!40000 ALTER TABLE `m_pic` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table m_tagbase
# ------------------------------------------------------------

DROP TABLE IF EXISTS `m_tagbase`;

CREATE TABLE `m_tagbase` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `nid` int(5) NOT NULL,
  `tagname` varchar(10) NOT NULL,
  `no` varchar(10) DEFAULT NULL,
  `connectbaseid` int(5) NOT NULL,
  `status` int(5) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

LOCK TABLES `m_tagbase` WRITE;
/*!40000 ALTER TABLE `m_tagbase` DISABLE KEYS */;

INSERT INTO `m_tagbase` (`id`, `nid`, `tagname`, `no`, `connectbaseid`, `status`)
VALUES
	(1,0,'人脸识别','FACEMODULE',1,1),
	(8,0,'手势验证','HAND',2,1),
	(12,8,'折损率',NULL,2,1),
	(13,12,'高',NULL,2,1),
	(14,12,'中',NULL,2,1),
	(17,1,'识别速度',NULL,1,1),
	(18,17,'快',NULL,1,1),
	(19,17,'慢',NULL,1,1),
	(24,1,'准确度',NULL,1,1),
	(25,24,'清晰',NULL,1,1),
	(26,24,'模糊',NULL,1,1),
	(27,1,'耗时',NULL,1,1),
	(28,27,'长',NULL,1,1),
	(29,27,'短',NULL,1,1);

/*!40000 ALTER TABLE `m_tagbase` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
