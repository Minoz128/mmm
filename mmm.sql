/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : mmm

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-01-15 08:47:40
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `m_auth_group`
-- ----------------------------
DROP TABLE IF EXISTS `m_auth_group`;
CREATE TABLE `m_auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` char(80) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of m_auth_group
-- ----------------------------
INSERT INTO `m_auth_group` VALUES ('1', '管理员组', '1', '1,2,3,4,5,6,7,8,9,10,11');
INSERT INTO `m_auth_group` VALUES ('2', '普通用户组', '1', '1,2,10,11');

-- ----------------------------
-- Table structure for `m_auth_group_access`
-- ----------------------------
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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of m_auth_group_access
-- ----------------------------
INSERT INTO `m_auth_group_access` VALUES ('1', '1', 'admin', '123', '1');
INSERT INTO `m_auth_group_access` VALUES ('2', '2', 'mmm', '123', '1');
INSERT INTO `m_auth_group_access` VALUES ('3', '2', 'yang', '123', '1');
INSERT INTO `m_auth_group_access` VALUES ('4', '2', 'ybm', '123', '1');

-- ----------------------------
-- Table structure for `m_auth_rule`
-- ----------------------------
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
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of m_auth_rule
-- ----------------------------
INSERT INTO `m_auth_rule` VALUES ('1', '0', 'dataconfiguration', '数据预处理', '1', '1', '', '&#xe61e;');
INSERT INTO `m_auth_rule` VALUES ('2', '1', 'index/dataconfiguration/select', '数据筛选', '1', '1', '', null);
INSERT INTO `m_auth_rule` VALUES ('3', '0', 'auth', '系统设置', '1', '1', '', '&#xe61d;');
INSERT INTO `m_auth_rule` VALUES ('4', '3', 'index/auth/authgroup', '用户组&&权限', '1', '1', '', null);
INSERT INTO `m_auth_rule` VALUES ('5', '3', 'index/auth/user', '用户管理', '1', '1', '', null);
INSERT INTO `m_auth_rule` VALUES ('6', '3', 'index/index/loginfo', '登陆日志', '1', '1', '', null);
INSERT INTO `m_auth_rule` VALUES ('7', '3', 'index/auth/rule', '栏目设置', '1', '1', '', null);
INSERT INTO `m_auth_rule` VALUES ('8', '0', 'analysis', '模型归类分析', '1', '1', '', '&#xe635;');
INSERT INTO `m_auth_rule` VALUES ('9', '8', 'index/analysis/log', '开发日志', '1', '1', '', null);
INSERT INTO `m_auth_rule` VALUES ('10', '0', 'tag', '标签管理', '1', '1', '', '&#xe70d;');
INSERT INTO `m_auth_rule` VALUES ('11', '10', 'index/tagbase?connectbaseid=1', '标签定义', '1', '1', '', null);

-- ----------------------------
-- Table structure for `m_base`
-- ----------------------------
DROP TABLE IF EXISTS `m_base`;
CREATE TABLE `m_base` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `parentid` int(8) DEFAULT '0',
  `name` varchar(20) DEFAULT NULL,
  `no` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of m_base
-- ----------------------------
INSERT INTO `m_base` VALUES ('1', '0', '人脸识别', 'FACEMODULE');
INSERT INTO `m_base` VALUES ('2', '0', '手势验证', 'HAND');

-- ----------------------------
-- Table structure for `m_loginlog`
-- ----------------------------
DROP TABLE IF EXISTS `m_loginlog`;
CREATE TABLE `m_loginlog` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(5) unsigned NOT NULL DEFAULT '0',
  `username` varchar(10) NOT NULL DEFAULT '',
  `group_id` int(5) NOT NULL DEFAULT '0',
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of m_loginlog
-- ----------------------------
INSERT INTO `m_loginlog` VALUES ('1', '1', 'admin', '1', '2019-01-10 23:14:57');
INSERT INTO `m_loginlog` VALUES ('2', '1', 'admin', '1', '2019-01-12 22:33:56');
INSERT INTO `m_loginlog` VALUES ('3', '1', 'admin', '1', '2019-01-13 23:29:53');
INSERT INTO `m_loginlog` VALUES ('4', '1', 'admin', '1', '2019-01-14 22:09:45');

-- ----------------------------
-- Table structure for `m_pic`
-- ----------------------------
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
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of m_pic
-- ----------------------------
INSERT INTO `m_pic` VALUES ('1', '/patch/u=1662232266,4128046122&fm=26&gp=0.jpg', '0', '1', '19,21', '1', '2019-01-15 00:54:49', null, null, null);
INSERT INTO `m_pic` VALUES ('2', '/patch/u=2369339022,4230252782&fm=26&gp=0.jpg', '0', '1', '23,22', '1', '2019-01-15 00:54:49', null, null, null);
INSERT INTO `m_pic` VALUES ('3', '/patch/u=154603817,3028123296&fm=26&gp=0.jpg', '0', '1', '18,21', '1', '2019-01-15 00:54:49', null, null, null);
INSERT INTO `m_pic` VALUES ('4', '/patch/u=3400373425,3251980086&fm=26&gp=0.jpg', '0', '1', '19,22', '1', '2019-01-15 00:54:49', null, null, null);
INSERT INTO `m_pic` VALUES ('5', '/patch/u=1463134688,3351248769&fm=15&gp=0.jpg', '0', '1', '19,21', '1', '2019-01-15 00:54:49', null, null, null);
INSERT INTO `m_pic` VALUES ('6', '/patch/u=2330364146,3143040889&fm=15&gp=0.jpg', '0', '1', '18,21', '1', '2019-01-15 00:54:49', null, null, null);
INSERT INTO `m_pic` VALUES ('7', '/patch/u=3754718161,1365571070&fm=15&gp=0.jpg', '0', '1', '19,22', '1', '2019-01-15 00:54:49', null, null, null);
INSERT INTO `m_pic` VALUES ('8', '/patch/u=1135894379,3735840925&fm=26&gp=0.jpg', '0', '1', '18,21', '1', '2019-01-15 00:54:49', null, null, null);
INSERT INTO `m_pic` VALUES ('9', '/patch/u=3722583156,2601743867&fm=26&gp=0.jpg', '0', '1', '18,21', '1', '2019-01-15 00:54:49', null, null, null);
INSERT INTO `m_pic` VALUES ('10', '/patch/u=1108615296,3113306612&fm=15&gp=0.jpg', '0', '1', '19,22', '1', '2019-01-15 00:54:49', null, null, null);
INSERT INTO `m_pic` VALUES ('11', '/patch/u=2210820243,288538214&fm=26&gp=0.jpg', '0', '1', '18,21', '1', '2019-01-15 00:54:49', null, null, null);
INSERT INTO `m_pic` VALUES ('12', '/patch/u=3624156501,2764300074&fm=15&gp=0.jpg', '0', '1', '18,22', '1', '2019-01-15 00:54:49', null, null, null);
INSERT INTO `m_pic` VALUES ('13', '/patch/u=1622812112,2790460197&fm=26&gp=0.jpg', '0', '1', '19,21', '1', '2019-01-15 00:54:49', null, null, null);
INSERT INTO `m_pic` VALUES ('14', '/patch/u=2470574843,530393854&fm=26&gp=0.jpg', '0', '1', '19,22', '1', '2019-01-15 00:54:49', null, null, null);
INSERT INTO `m_pic` VALUES ('15', '/patch/u=3804567480,3385166150&fm=15&gp=0.jpg', '0', '1', '19,21', '1', '2019-01-15 00:54:49', null, null, null);
INSERT INTO `m_pic` VALUES ('16', '/patch/u=3546592981,1633951885&fm=26&gp=0.jpg', '0', '1', '19,22', '1', '2019-01-15 00:54:49', null, null, null);
INSERT INTO `m_pic` VALUES ('17', '/patch/u=3543637573,557726563&fm=26&gp=0.jpg', '0', '1', '19,21', '1', '2019-01-15 00:54:49', null, null, null);
INSERT INTO `m_pic` VALUES ('18', '/patch/u=2660597778,278096489&fm=26&gp=0.jpg', '0', '1', '18,21', '1', '2019-01-15 00:54:50', null, null, null);
INSERT INTO `m_pic` VALUES ('19', '/patch/u=3542561095,3468393831&fm=15&gp=0.jpg', '0', '1', '23,21', '1', '2019-01-15 00:54:51', null, null, null);
INSERT INTO `m_pic` VALUES ('20', '/patch/u=1845801207,288975644&fm=26&gp=0.jpg', '0', '1', '19,21', '1', '2019-01-15 00:54:51', null, null, null);
INSERT INTO `m_pic` VALUES ('21', '/patch/u=2929980238,3545092998&fm=26&gp=0.jpg', '0', '1', '18,22', '1', '2019-01-15 00:54:51', null, null, null);
INSERT INTO `m_pic` VALUES ('22', '/patch/u=2355452751,516603973&fm=26&gp=0.jpg', '0', '1', '18,22', '1', '2019-01-15 00:54:52', null, null, null);
INSERT INTO `m_pic` VALUES ('23', '/patch/u=3481107770,619486040&fm=15&gp=0.jpg', '0', '1', '18,22', '1', '2019-01-15 00:54:52', null, null, null);
INSERT INTO `m_pic` VALUES ('24', '/patch/u=3013203751,4239362152&fm=26&gp=0.jpg', '0', '1', '23,21', '1', '2019-01-15 00:54:52', null, null, null);
INSERT INTO `m_pic` VALUES ('25', '/patch/u=1448714938,2151564647&fm=15&gp=0.jpg', '0', '1', '18,22', '1', '2019-01-15 00:54:52', null, null, null);
INSERT INTO `m_pic` VALUES ('26', '/patch/u=2194667995,1378984718&fm=15&gp=0.jpg', '0', '1', '19,22', '1', '2019-01-15 00:54:52', null, null, null);
INSERT INTO `m_pic` VALUES ('27', '/patch/u=3390303238,4034026498&fm=15&gp=0.jpg', '0', '1', '18,21', '1', '2019-01-15 00:54:52', null, null, null);
INSERT INTO `m_pic` VALUES ('28', '/patch/u=283990217,4198311287&fm=15&gp=0.jpg', '0', '1', '19,21', '1', '2019-01-15 00:54:52', null, null, null);
INSERT INTO `m_pic` VALUES ('29', '/patch/u=3820464411,1190315362&fm=15&gp=0.jpg', '0', '1', '23,22', '1', '2019-01-15 00:54:52', null, null, null);
INSERT INTO `m_pic` VALUES ('30', '/patch/u=2578073987,4069810488&fm=26&gp=0.jpg', '0', '1', '19,21', '1', '2019-01-15 00:54:53', null, null, null);
INSERT INTO `m_pic` VALUES ('31', '/patch/u=3456016953,3507827386&fm=26&gp=0.jpg', '0', '1', '23,22', '1', '2019-01-15 00:54:53', null, null, null);
INSERT INTO `m_pic` VALUES ('32', '/patch/u=1722462893,3188671983&fm=15&gp=0.jpg', '0', '1', '23,22', '1', '2019-01-15 00:54:53', null, null, null);
INSERT INTO `m_pic` VALUES ('33', '/patch/u=2820693694,2920243562&fm=15&gp=0.jpg', '0', '1', '19,22', '1', '2019-01-15 00:54:53', null, null, null);
INSERT INTO `m_pic` VALUES ('34', '/patch/u=3383972287,756138362&fm=26&gp=0.jpg', '0', '1', '19,22', '1', '2019-01-15 00:54:53', null, null, null);
INSERT INTO `m_pic` VALUES ('35', '/patch/u=1567742673,1179855728&fm=15&gp=0.jpg', '0', '1', '19,21', '1', '2019-01-15 00:54:53', null, null, null);
INSERT INTO `m_pic` VALUES ('36', '/patch/u=3577384590,398031169&fm=15&gp=0.jpg', '0', '1', '19,21', '1', '2019-01-15 00:54:53', null, null, null);
INSERT INTO `m_pic` VALUES ('37', '/patch/u=3449886478,2679007697&fm=15&gp=0.jpg', '0', '1', '18,22', '1', '2019-01-15 00:54:53', null, null, null);
INSERT INTO `m_pic` VALUES ('38', '/patch/u=2271006232,3865594504&fm=15&gp=0.jpg', '0', '1', '18,21', '1', '2019-01-15 00:54:53', null, null, null);
INSERT INTO `m_pic` VALUES ('39', '/patch/u=827186358,3891648910&fm=11&gp=0.jpg', '0', '1', '19,22', '1', '2019-01-15 00:54:53', null, null, null);
INSERT INTO `m_pic` VALUES ('40', '/patch/u=1057107662,387094523&fm=15&gp=0.jpg', '0', '1', '18,21', '1', '2019-01-15 00:54:53', null, null, null);
INSERT INTO `m_pic` VALUES ('41', '/patch/u=329070808,86852626&fm=15&gp=0.jpg', '0', '1', '18,22', '1', '2019-01-15 00:54:53', null, null, null);
INSERT INTO `m_pic` VALUES ('42', '/patch/u=4158271824,700166083&fm=11&gp=0.jpg', '0', '1', '19,22', '1', '2019-01-15 00:54:53', null, null, null);
INSERT INTO `m_pic` VALUES ('43', '/patch/u=2825384378,226696796&fm=15&gp=0.jpg', '0', '1', '23,22', '1', '2019-01-15 00:54:53', null, null, null);
INSERT INTO `m_pic` VALUES ('44', '/patch/u=2938475935,494365371&fm=15&gp=0.jpg', '0', '1', '18,22', '1', '2019-01-15 00:54:53', null, null, null);
INSERT INTO `m_pic` VALUES ('45', '/patch/u=281030733,2941274895&fm=15&gp=0.jpg', '0', '1', '23,21', '1', '2019-01-15 00:54:53', null, null, null);
INSERT INTO `m_pic` VALUES ('46', '/patch/u=2761540801,614274645&fm=11&gp=0.jpg', '0', '1', '19,21', '1', '2019-01-15 00:54:53', null, null, null);
INSERT INTO `m_pic` VALUES ('47', '/patch/u=1212858249,83660619&fm=15&gp=0.jpg', '0', '1', '19,21', '1', '2019-01-15 00:54:53', null, null, null);
INSERT INTO `m_pic` VALUES ('48', '/patch/u=369328761,3794173769&fm=26&gp=0.jpg', '0', '1', '23,21', '1', '2019-01-15 00:54:53', null, null, null);
INSERT INTO `m_pic` VALUES ('49', '/patch/u=3348555405,983487422&fm=26&gp=0.jpg', '0', '1', '18,21', '1', '2019-01-15 00:54:53', null, null, null);
INSERT INTO `m_pic` VALUES ('50', '/patch/u=2718794256,3311652427&fm=15&gp=0.jpg', '0', '1', '18,21', '1', '2019-01-15 00:54:53', null, null, null);
INSERT INTO `m_pic` VALUES ('51', '/patch/u=3316087371,2926213091&fm=26&gp=0.jpg', '0', '1', '23,22', '1', '2019-01-15 00:54:53', null, null, null);
INSERT INTO `m_pic` VALUES ('52', '/patch/u=1957597990,3090877880&fm=15&gp=0.jpg', '0', '1', '23,22', '1', '2019-01-15 00:54:53', null, null, null);
INSERT INTO `m_pic` VALUES ('53', '/patch/u=3843445883,2974888073&fm=26&gp=0.jpg', '0', '1', '19,21', '1', '2019-01-15 00:54:54', null, null, null);
INSERT INTO `m_pic` VALUES ('54', '/patch/u=3831671411,1704264624&fm=15&gp=0.jpg', '0', '1', '23,22', '1', '2019-01-15 00:54:54', null, null, null);
INSERT INTO `m_pic` VALUES ('55', '/patch/u=3783765691,525464974&fm=15&gp=0.jpg', '0', '1', '18,22', '1', '2019-01-15 00:54:54', null, null, null);
INSERT INTO `m_pic` VALUES ('56', '/patch/u=3731989423,3855350052&fm=15&gp=0.jpg', '0', '1', '18,22', '1', '2019-01-15 00:54:54', null, null, null);
INSERT INTO `m_pic` VALUES ('57', '/patch/u=3373558444,2347035710&fm=26&gp=0.jpg', '0', '1', '19,21', '1', '2019-01-15 00:54:54', null, null, null);
INSERT INTO `m_pic` VALUES ('58', '/patch/u=1450850285,3202796738&fm=26&gp=0.jpg', '0', '1', '23,21', '1', '2019-01-15 00:54:54', null, null, null);
INSERT INTO `m_pic` VALUES ('59', '/patch/u=3239530577,4193437809&fm=15&gp=0.jpg', '0', '1', '18,21', '1', '2019-01-15 00:54:54', null, null, null);
INSERT INTO `m_pic` VALUES ('60', '/patch/u=2331130681,1445908073&fm=26&gp=0.jpg', '0', '1', '19,21', '1', '2019-01-15 00:54:54', null, null, null);
INSERT INTO `m_pic` VALUES ('61', '/patch/u=1299842767,1181153645&fm=15&gp=0.jpg', '0', '1', '19,21', '1', '2019-01-15 00:54:54', null, null, null);
INSERT INTO `m_pic` VALUES ('62', '/patch/u=197486577,2129214939&fm=26&gp=0.jpg', '0', '1', '18,21', '1', '2019-01-15 00:54:54', null, null, null);
INSERT INTO `m_pic` VALUES ('63', '/patch/u=3803044037,3649749852&fm=26&gp=0.jpg', '0', '1', '18,22', '1', '2019-01-15 00:54:54', null, null, null);
INSERT INTO `m_pic` VALUES ('64', '/patch/u=1252409544,478929086&fm=26&gp=0.jpg', '0', '1', '19,22', '1', '2019-01-15 00:54:54', null, null, null);
INSERT INTO `m_pic` VALUES ('65', '/patch/u=1357763001,760114228&fm=15&gp=0.jpg', '0', '1', '18,21', '1', '2019-01-15 00:54:54', null, null, null);
INSERT INTO `m_pic` VALUES ('66', '/patch/u=3297893164,2217516522&fm=26&gp=0.jpg', '0', '1', '23,22', '1', '2019-01-15 00:54:54', null, null, null);
INSERT INTO `m_pic` VALUES ('67', '/patch/u=2698406427,2285540984&fm=15&gp=0.jpg', '0', '1', '19,22', '1', '2019-01-15 00:54:54', null, null, null);
INSERT INTO `m_pic` VALUES ('68', '/patch/u=2466066528,4277991085&fm=15&gp=0.jpg', '0', '1', '23,21', '1', '2019-01-15 00:54:54', null, null, null);
INSERT INTO `m_pic` VALUES ('69', '/patch/u=3141855683,1861750766&fm=26&gp=0.jpg', '0', '1', '23,22', '1', '2019-01-15 00:54:54', null, null, null);
INSERT INTO `m_pic` VALUES ('70', '/patch/u=3371178617,2710446148&fm=15&gp=0.jpg', '0', '1', '19,21', '1', '2019-01-15 00:54:54', null, null, null);
INSERT INTO `m_pic` VALUES ('71', '/patch/u=1087495110,545303815&fm=15&gp=0.jpg', '0', '1', '18,21', '1', '2019-01-15 00:54:54', null, null, null);
INSERT INTO `m_pic` VALUES ('72', '/patch/u=2877130613,2237399893&fm=15&gp=0.jpg', '0', '1', '23,21', '1', '2019-01-15 00:54:54', null, null, null);
INSERT INTO `m_pic` VALUES ('73', '/patch/u=3574733183,3590242775&fm=26&gp=0.jpg', '0', '1', '19,21', '1', '2019-01-15 00:54:54', null, null, null);
INSERT INTO `m_pic` VALUES ('74', '/patch/u=1336060181,914441139&fm=15&gp=0.jpg', '0', '1', '18,22', '1', '2019-01-15 00:54:54', null, null, null);
INSERT INTO `m_pic` VALUES ('75', '/patch/u=1808393504,2734959852&fm=15&gp=0.jpg', '0', '1', '23,21', '1', '2019-01-15 00:54:54', null, null, null);
INSERT INTO `m_pic` VALUES ('76', '/patch/u=1647820089,3529623624&fm=11&gp=0.jpg', '0', '1', '23,21', '1', '2019-01-15 00:54:54', null, null, null);
INSERT INTO `m_pic` VALUES ('77', '/patch/u=2993102968,3842465638&fm=26&gp=0.jpg', '0', '1', '19,22', '1', '2019-01-15 00:54:54', null, null, null);
INSERT INTO `m_pic` VALUES ('78', '/patch/u=1612163671,4202954326&fm=26&gp=0.jpg', '0', '1', '18,22', '1', '2019-01-15 00:54:55', null, null, null);
INSERT INTO `m_pic` VALUES ('79', '/patch/u=3673559089,1271914159&fm=15&gp=0.jpg', '0', '1', '23,22', '1', '2019-01-15 00:54:55', null, null, null);
INSERT INTO `m_pic` VALUES ('80', '/patch/u=1718533413,541983207&fm=15&gp=0.jpg', '0', '1', '19,21', '1', '2019-01-15 00:54:55', null, null, null);
INSERT INTO `m_pic` VALUES ('81', '/patch/u=156423883,1050402361&fm=15&gp=0.jpg', '0', '1', '18,22', '1', '2019-01-15 00:54:55', null, null, null);
INSERT INTO `m_pic` VALUES ('82', '/patch/u=2838783833,800998860&fm=15&gp=0.jpg', '0', '1', '18,21', '1', '2019-01-15 00:54:55', null, null, null);
INSERT INTO `m_pic` VALUES ('83', '/patch/u=109958637,3825221272&fm=15&gp=0.jpg', '0', '1', '23,21', '1', '2019-01-15 00:54:55', null, null, null);
INSERT INTO `m_pic` VALUES ('84', '/patch/u=332246444,1507500665&fm=15&gp=0.jpg', '0', '1', '23,21', '1', '2019-01-15 00:54:58', null, null, null);
INSERT INTO `m_pic` VALUES ('85', '/patch/u=200962967,2191114723&fm=15&gp=0.jpg', '0', '1', '19,21', '1', '2019-01-15 00:54:58', null, null, null);
INSERT INTO `m_pic` VALUES ('86', '/patch/u=2387774078,948659958&fm=26&gp=0.jpg', '0', '1', '23,22', '1', '2019-01-15 00:54:59', null, null, null);
INSERT INTO `m_pic` VALUES ('87', '/patch/u=3718637818,1153606205&fm=15&gp=0.jpg', '0', '1', '19,21', '1', '2019-01-15 00:54:59', null, null, null);
INSERT INTO `m_pic` VALUES ('88', '/patch/u=1361769978,3501268832&fm=15&gp=0.jpg', '0', '1', '19,21', '1', '2019-01-15 00:54:59', null, null, null);
INSERT INTO `m_pic` VALUES ('89', '/patch/u=1859956145,1864211337&fm=26&gp=0.jpg', '0', '1', '23,22', '1', '2019-01-15 00:54:59', null, null, null);
INSERT INTO `m_pic` VALUES ('90', '/patch/u=1072514136,1934711206&fm=15&gp=0.jpg', '0', '1', '23,22', '1', '2019-01-15 00:54:59', null, null, null);

-- ----------------------------
-- Table structure for `m_tagbase`
-- ----------------------------
DROP TABLE IF EXISTS `m_tagbase`;
CREATE TABLE `m_tagbase` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `nid` int(5) NOT NULL,
  `tagname` varchar(10) NOT NULL,
  `no` varchar(10) DEFAULT NULL,
  `connectbaseid` int(5) NOT NULL,
  `status` int(5) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of m_tagbase
-- ----------------------------
INSERT INTO `m_tagbase` VALUES ('1', '0', '人脸识别', 'FACEMODULE', '1', '1');
INSERT INTO `m_tagbase` VALUES ('8', '0', '手势验证', 'HAND', '2', '1');
INSERT INTO `m_tagbase` VALUES ('12', '8', '折损率', null, '2', '1');
INSERT INTO `m_tagbase` VALUES ('13', '12', '高', null, '2', '1');
INSERT INTO `m_tagbase` VALUES ('14', '12', '中', null, '2', '1');
INSERT INTO `m_tagbase` VALUES ('17', '1', '识别速度', null, '1', '1');
INSERT INTO `m_tagbase` VALUES ('18', '17', '快', null, '1', '1');
INSERT INTO `m_tagbase` VALUES ('19', '17', '慢', null, '1', '1');
INSERT INTO `m_tagbase` VALUES ('20', '1', '准确度', null, '1', '1');
INSERT INTO `m_tagbase` VALUES ('21', '20', '较为准确', null, '1', '1');
INSERT INTO `m_tagbase` VALUES ('22', '20', '比较模糊', null, '1', '1');
INSERT INTO `m_tagbase` VALUES ('23', '17', '中等', null, '1', '1');
