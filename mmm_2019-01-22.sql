# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.7.21)
# Database: mmm
# Generation Time: 2019-01-22 15:20:30 +0000
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
	(1,'管理员组',1,'1,2,12,13,3,4,5,6,7,8,9,10,11,14,15,16,17,18'),
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
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

LOCK TABLES `m_auth_rule` WRITE;
/*!40000 ALTER TABLE `m_auth_rule` DISABLE KEYS */;

INSERT INTO `m_auth_rule` (`id`, `nid`, `name`, `title`, `type`, `status`, `condition`, `icon`)
VALUES
	(1,0,'dataconfiguration','数据供给',1,1,'','&#xe61e;'),
	(2,1,'index/dataconfiguration/select','数据筛选(完成后待删)',1,1,'',NULL),
	(3,0,'auth','系统设置',1,1,'',''),
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
	(14,0,'dataset','数据集管理',1,1,'','&#xe6d1;'),
	(15,14,'index/tagbase?connectbaseid=1','标签定义',1,1,'',NULL),
	(16,14,'index/dataconfiguration/tagbyman','结果接入',1,1,'',NULL),
	(17,0,'testFather','测试父节点啊',1,1,'',''),
	(18,17,'Auth/test/testson','测试子节点',1,1,'',NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

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
	(8,1,'admin',1,'2019-01-21 21:13:02'),
	(9,1,'admin',1,'2019-01-22 20:59:28');

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
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=utf8;

LOCK TABLES `m_pic` WRITE;
/*!40000 ALTER TABLE `m_pic` DISABLE KEYS */;

INSERT INTO `m_pic` (`id`, `src`, `status`, `uid`, `tag`, `type`, `date`, `resulterr`, `brief`, `manmadetags`)
VALUES
	(1,'/upload/20190122/69567916d9e3ee7b9dbbc4746306d380.PNG',0,1,'19,26,28',1,NULL,NULL,'',''),
	(2,'/upload/20190122/c352b29bb4372e18bc44b50d48619e73.PNG',0,1,'19,25,28',1,NULL,NULL,'',''),
	(3,'/upload/20190122/adc92a97fb9447e630b3741d61c9057e.PNG',0,1,'19,26,29',1,NULL,NULL,'',''),
	(4,'/patch/u=2247996164,4128585391&fm=26&gp=0.jpg',0,1,'18,26,28',1,'2019-01-22 21:00:47',NULL,NULL,NULL),
	(5,'/patch/u=2216344846,2972845391&fm=15&gp=0.jpg',0,1,'19,25,28',1,'2019-01-22 21:00:47',NULL,NULL,NULL),
	(6,'/patch/u=3398204724,172972359&fm=26&gp=0.jpg',0,1,'19,25,29',1,'2019-01-22 21:00:47',NULL,NULL,NULL),
	(7,'/patch/u=1656286263,2448499969&fm=26&gp=0.jpg',0,1,'18,26,29',1,'2019-01-22 21:00:47',NULL,NULL,NULL),
	(8,'/patch/u=2074683271,4016599590&fm=15&gp=0.jpg',0,1,'18,26,28',1,'2019-01-22 21:00:47',NULL,NULL,NULL),
	(9,'/patch/u=1362322287,71651107&fm=26&gp=0.jpg',0,1,'18,25,28',1,'2019-01-22 21:00:47',NULL,NULL,NULL),
	(10,'/patch/u=4236591953,2692838967&fm=15&gp=0.jpg',0,1,'19,25,29',1,'2019-01-22 21:00:47',NULL,NULL,NULL),
	(11,'/patch/u=1521626511,3328796421&fm=26&gp=0.jpg',0,1,'18,26,29',1,'2019-01-22 21:00:47',NULL,NULL,NULL),
	(12,'/patch/u=690327365,1456613477&fm=26&gp=0.jpg',0,1,'18,26,28',1,'2019-01-22 21:00:47',NULL,NULL,NULL),
	(13,'/patch/u=1502871830,2622412541&fm=26&gp=0.jpg',0,1,'19,25,28',1,'2019-01-22 21:00:47',NULL,NULL,NULL),
	(14,'/patch/u=4227791375,346677402&fm=15&gp=0.jpg',0,1,'18,25,28',1,'2019-01-22 21:00:47',NULL,NULL,NULL),
	(15,'/patch/u=947608557,1595897327&fm=15&gp=0.jpg',0,1,'18,25,29',1,'2019-01-22 21:00:47',NULL,NULL,NULL),
	(16,'/patch/u=1403061901,1532761856&fm=26&gp=0.jpg',0,1,'19,25,28',1,'2019-01-22 21:00:47',NULL,NULL,NULL),
	(17,'/patch/u=3487788907,2498908294&fm=15&gp=0.jpg',0,1,'18,26,28',1,'2019-01-22 21:00:48',NULL,NULL,NULL),
	(18,'/patch/u=1830276523,3892740974&fm=15&gp=0.jpg',0,1,'18,25,28',1,'2019-01-22 21:00:48',NULL,NULL,NULL),
	(19,'/patch/u=1405036185,3109858820&fm=15&gp=0.jpg',0,1,'18,25,28',1,'2019-01-22 21:00:48',NULL,NULL,NULL),
	(20,'/patch/u=3638502698,761782529&fm=15&gp=0.jpg',0,1,'19,25,28',1,'2019-01-22 21:00:48',NULL,NULL,NULL),
	(21,'/patch/u=2434999508,3041540668&fm=15&gp=0.jpg',0,1,'18,26,29',1,'2019-01-22 21:00:48',NULL,NULL,NULL),
	(22,'/patch/u=2984774744,3164831966&fm=26&gp=0.jpg',0,1,'18,26,28',1,'2019-01-22 21:00:48',NULL,NULL,NULL),
	(23,'/patch/u=3672718708,3876594741&fm=26&gp=0.jpg',0,1,'19,26,29',1,'2019-01-22 21:00:48',NULL,NULL,NULL),
	(24,'/patch/u=3478309368,522752900&fm=15&gp=0.jpg',0,1,'19,25,29',1,'2019-01-22 21:00:48',NULL,NULL,NULL),
	(25,'/patch/u=697511862,699314031&fm=15&gp=0.jpg',0,1,'19,25,28',1,'2019-01-22 21:00:48',NULL,NULL,NULL),
	(26,'/patch/u=1025862182,2142009708&fm=15&gp=0.jpg',0,1,'19,26,28',1,'2019-01-22 21:00:48',NULL,NULL,NULL),
	(27,'/patch/u=375905241,1526506933&fm=15&gp=0.jpg',0,1,'19,25,28',1,'2019-01-22 21:00:48',NULL,NULL,NULL),
	(28,'/patch/u=3392547098,1397019533&fm=15&gp=0.jpg',0,1,'18,26,29',1,'2019-01-22 21:00:48',NULL,NULL,NULL),
	(29,'/patch/u=3410785292,541156282&fm=15&gp=0.jpg',0,1,'18,25,28',1,'2019-01-22 21:00:49',NULL,NULL,NULL),
	(30,'/patch/u=2083291038,899167916&fm=15&gp=0.jpg',0,1,'19,25,28',1,'2019-01-22 21:00:49',NULL,NULL,NULL),
	(31,'/patch/u=642789375,1459306187&fm=15&gp=0.jpg',0,1,'18,26,28',1,'2019-01-22 21:00:49',NULL,NULL,NULL),
	(32,'/patch/u=168507633,3568975168&fm=15&gp=0.jpg',0,1,'19,25,28',1,'2019-01-22 21:00:49',NULL,NULL,NULL),
	(33,'/patch/u=1377168814,1797727991&fm=15&gp=0.jpg',0,1,'18,25,29',1,'2019-01-22 21:00:49',NULL,NULL,NULL),
	(34,'/patch/u=187054252,1796306144&fm=15&gp=0.jpg',0,1,'18,25,28',1,'2019-01-22 21:00:49',NULL,NULL,NULL),
	(35,'/patch/u=3121618802,526864739&fm=26&gp=0.jpg',0,1,'18,26,29',1,'2019-01-22 21:00:49',NULL,NULL,NULL),
	(36,'/patch/u=3453180738,4265257775&fm=26&gp=0.jpg',0,1,'19,25,29',1,'2019-01-22 21:00:49',NULL,NULL,NULL),
	(37,'/patch/u=3601545420,376886976&fm=26&gp=0.jpg',0,1,'18,25,28',1,'2019-01-22 21:00:49',NULL,NULL,NULL),
	(38,'/patch/u=3071208347,1810845877&fm=26&gp=0.jpg',0,1,'19,26,29',1,'2019-01-22 21:00:49',NULL,NULL,NULL),
	(39,'/patch/u=3837913933,2131108952&fm=26&gp=0.jpg',0,1,'18,26,28',1,'2019-01-22 21:00:49',NULL,NULL,NULL),
	(40,'/patch/u=4155850888,1570675933&fm=15&gp=0.jpg',0,1,'18,25,28',1,'2019-01-22 21:00:49',NULL,NULL,NULL),
	(41,'/patch/u=2419325875,1998362353&fm=26&gp=0.jpg',0,1,'19,26,28',1,'2019-01-22 21:00:49',NULL,NULL,NULL),
	(42,'/patch/u=2822099294,196317710&fm=15&gp=0.jpg',0,1,'19,26,29',1,'2019-01-22 21:00:49',NULL,NULL,NULL),
	(43,'/patch/u=385359301,361751274&fm=15&gp=0.jpg',0,1,'18,26,28',1,'2019-01-22 21:00:49',NULL,NULL,NULL),
	(44,'/patch/u=431890955,2346907747&fm=15&gp=0.jpg',0,1,'19,25,28',1,'2019-01-22 21:00:49',NULL,NULL,NULL),
	(45,'/patch/u=4191447101,1500070097&fm=26&gp=0.jpg',0,1,'19,26,28',1,'2019-01-22 21:00:50',NULL,NULL,NULL),
	(46,'/patch/u=3232881571,3383301613&fm=15&gp=0.jpg',0,1,'18,25,29',1,'2019-01-22 21:00:50',NULL,NULL,NULL),
	(47,'/patch/u=2150323924,464737745&fm=15&gp=0.jpg',0,1,'19,25,28',1,'2019-01-22 21:00:50',NULL,NULL,NULL),
	(48,'/patch/u=3683836200,3041274775&fm=15&gp=0.jpg',0,1,'18,26,29',1,'2019-01-22 21:00:50',NULL,NULL,NULL),
	(49,'/patch/u=1366247323,946097177&fm=15&gp=0.jpg',0,1,'19,26,28',1,'2019-01-22 21:00:50',NULL,NULL,NULL),
	(50,'/patch/u=1414007439,3795147130&fm=26&gp=0.jpg',0,1,'19,26,28',1,'2019-01-22 21:00:50',NULL,NULL,NULL),
	(51,'/patch/u=1460543448,461484686&fm=26&gp=0.jpg',0,1,'19,26,28',1,'2019-01-22 21:00:50',NULL,NULL,NULL),
	(52,'/patch/u=2459793388,417607264&fm=26&gp=0.jpg',0,1,'19,26,29',1,'2019-01-22 21:00:50',NULL,NULL,NULL),
	(53,'/patch/u=3995951003,2029622485&fm=26&gp=0.jpg',0,1,'19,26,28',1,'2019-01-22 21:00:50',NULL,NULL,NULL),
	(54,'/patch/u=520051493,2293175724&fm=15&gp=0.jpg',0,1,'18,26,29',1,'2019-01-22 21:00:50',NULL,NULL,NULL),
	(55,'/patch/u=614580291,1079428447&fm=26&gp=0.jpg',0,1,'18,25,28',1,'2019-01-22 21:00:51',NULL,NULL,NULL),
	(56,'/patch/u=1340126950,2569162249&fm=15&gp=0.jpg',0,1,'18,26,28',1,'2019-01-22 21:00:51',NULL,NULL,NULL),
	(57,'/patch/u=2728651076,1571645534&fm=26&gp=0.jpg',0,1,'18,26,28',1,'2019-01-22 21:00:51',NULL,NULL,NULL),
	(58,'/patch/u=2508387091,514392344&fm=26&gp=0.jpg',0,1,'18,26,28',1,'2019-01-22 21:00:51',NULL,NULL,NULL),
	(59,'/patch/u=2965356611,2320944277&fm=26&gp=0.jpg',0,1,'18,25,29',1,'2019-01-22 21:00:51',NULL,NULL,NULL),
	(60,'/patch/u=696911433,2401815236&fm=26&gp=0.jpg',0,1,'19,25,29',1,'2019-01-22 21:00:51',NULL,NULL,NULL),
	(61,'/patch/u=2291791392,1426385549&fm=26&gp=0.jpg',0,1,'18,26,28',1,'2019-01-22 21:00:51',NULL,NULL,NULL),
	(62,'/patch/u=1528222561,957096905&fm=26&gp=0.jpg',0,1,'18,25,28',1,'2019-01-22 21:00:51',NULL,NULL,NULL),
	(63,'/patch/u=3301266701,166080457&fm=15&gp=0.jpg',0,1,'19,26,28',1,'2019-01-22 21:00:51',NULL,NULL,NULL),
	(64,'/patch/u=4012345294,1363962100&fm=26&gp=0.jpg',0,1,'18,25,28',1,'2019-01-22 21:00:51',NULL,NULL,NULL),
	(65,'/patch/u=3195211956,856187219&fm=26&gp=0.jpg',0,1,'19,25,29',1,'2019-01-22 21:00:51',NULL,NULL,NULL),
	(66,'/patch/u=3875061242,4078166888&fm=26&gp=0.jpg',0,1,'19,26,28',1,'2019-01-22 21:00:51',NULL,NULL,NULL),
	(67,'/patch/u=2976341278,3453573322&fm=15&gp=0.jpg',0,1,'18,25,29',1,'2019-01-22 21:00:51',NULL,NULL,NULL),
	(68,'/patch/u=3081766849,670213261&fm=26&gp=0.jpg',0,1,'19,26,28',1,'2019-01-22 21:00:52',NULL,NULL,NULL),
	(69,'/patch/u=2168791933,4112748452&fm=26&gp=0.jpg',0,1,'18,26,29',1,'2019-01-22 21:00:52',NULL,NULL,NULL),
	(70,'/patch/u=1584203667,3185896558&fm=26&gp=0.jpg',0,1,'18,26,29',1,'2019-01-22 21:00:52',NULL,NULL,NULL),
	(71,'/patch/u=754530607,3649651720&fm=26&gp=0.jpg',0,1,'18,26,29',1,'2019-01-22 21:00:52',NULL,NULL,NULL),
	(72,'/patch/u=1642612572,1701609003&fm=15&gp=0.jpg',0,1,'19,26,28',1,'2019-01-22 21:00:52',NULL,NULL,NULL),
	(73,'/patch/u=4046345278,4068206099&fm=26&gp=0.jpg',0,1,'18,26,29',1,'2019-01-22 21:00:52',NULL,NULL,NULL),
	(74,'/patch/u=2869305610,1026794986&fm=26&gp=0.jpg',0,1,'18,26,29',1,'2019-01-22 21:00:52',NULL,NULL,NULL),
	(75,'/patch/u=40130041,2482267338&fm=26&gp=0.jpg',0,1,'18,26,28',1,'2019-01-22 21:00:52',NULL,NULL,NULL),
	(76,'/patch/u=1508006607,3537416111&fm=15&gp=0.jpg',0,1,'19,25,29',1,'2019-01-22 21:00:52',NULL,NULL,NULL),
	(77,'/patch/u=2663797011,813880836&fm=15&gp=0.jpg',0,1,'19,26,29',1,'2019-01-22 21:00:52',NULL,NULL,NULL),
	(78,'/patch/u=3894897124,3136420662&fm=15&gp=0.jpg',0,1,'18,25,29',1,'2019-01-22 21:00:52',NULL,NULL,NULL),
	(79,'/patch/u=2932008456,2558532451&fm=15&gp=0.jpg',0,1,'18,25,29',1,'2019-01-22 21:00:52',NULL,NULL,NULL),
	(80,'/patch/u=393939419,601354173&fm=26&gp=0.jpg',0,1,'19,26,29',1,'2019-01-22 21:00:52',NULL,NULL,NULL),
	(81,'/patch/u=2313338621,2134340316&fm=26&gp=0.jpg',0,1,'19,25,28',1,'2019-01-22 21:00:52',NULL,NULL,NULL),
	(82,'/patch/u=2177537741,103020927&fm=26&gp=0.jpg',0,1,'18,26,28',1,'2019-01-22 21:00:52',NULL,NULL,NULL),
	(83,'/patch/u=2226814160,3973163357&fm=26&gp=0.jpg',0,1,'19,26,29',1,'2019-01-22 21:00:52',NULL,NULL,NULL),
	(84,'/patch/u=1501151902,408296859&fm=26&gp=0.jpg',0,1,'19,26,29',1,'2019-01-22 21:00:52',NULL,NULL,NULL),
	(85,'/patch/u=1528155882,2789033155&fm=26&gp=0.jpg',0,1,'19,26,28',1,'2019-01-22 21:00:53',NULL,NULL,NULL),
	(86,'/patch/u=2368368029,3112132044&fm=15&gp=0.jpg',0,1,'18,26,28',1,'2019-01-22 21:00:53',NULL,NULL,NULL),
	(87,'/patch/u=1668938140,1600546306&fm=26&gp=0.jpg',0,1,'19,25,28',1,'2019-01-22 21:00:53',NULL,NULL,NULL),
	(88,'/patch/u=1340083590,2470593982&fm=15&gp=0.jpg',0,1,'19,25,29',1,'2019-01-22 21:00:53',NULL,NULL,NULL),
	(89,'/patch/u=3705063776,2380662149&fm=26&gp=0.jpg',0,1,'18,26,28',1,'2019-01-22 21:00:53',NULL,NULL,NULL),
	(90,'/patch/u=789139408,2743869368&fm=26&gp=0.jpg',0,1,'19,25,28',1,'2019-01-22 21:00:53',NULL,NULL,NULL),
	(91,'/patch/u=1312412680,3408836158&fm=26&gp=0.jpg',0,1,'18,25,28',1,'2019-01-22 21:00:53',NULL,NULL,NULL),
	(92,'/patch/u=771148955,3263094676&fm=26&gp=0.jpg',0,1,'18,26,29',1,'2019-01-22 21:00:53',NULL,NULL,NULL),
	(93,'/patch/u=1241364268,2963920917&fm=26&gp=0.jpg',0,1,'18,25,28',1,'2019-01-22 21:00:53',NULL,NULL,NULL);

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
