/*
Navicat MySQL Data Transfer

Source Server         : docker
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : covidny

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2020-03-21 17:45:59
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tb_map
-- ----------------------------
DROP TABLE IF EXISTS `tb_map`;
CREATE TABLE `tb_map` (
  `co_id` int(255) NOT NULL AUTO_INCREMENT,
  `co_name` varchar(255) DEFAULT NULL,
  `co_lati` varchar(20) NOT NULL,
  `co_longti` varchar(255) NOT NULL,
  `co_icon` varchar(255) NOT NULL,
  `co_popup` text DEFAULT NULL,
  PRIMARY KEY (`co_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_map
-- ----------------------------
