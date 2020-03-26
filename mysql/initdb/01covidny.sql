/*
Navicat MySQL Data Transfer

Source Server         : docker
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : covidny

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2020-03-26 12:27:22
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tb_data
-- ----------------------------
DROP TABLE IF EXISTS `tb_data`;
CREATE TABLE `tb_data` (
  `data_id` int(255) NOT NULL AUTO_INCREMENT,
  `co_id` varchar(20) NOT NULL COMMENT 'ละติจูด',
  `da_name` varchar(255) DEFAULT '',
  `da_icon` varchar(255) NOT NULL COMMENT 'ลองติจูด',
  `da_popup` text DEFAULT NULL COMMENT 'ข้อความ',
  `da_type` varchar(10) DEFAULT '' COMMENT 'ประเภทคนมาจากต่างจังหวัด หรือ ต่างประเทศ',
  PRIMARY KEY (`data_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_data
-- ----------------------------

-- ----------------------------
-- Table structure for tb_map
-- ----------------------------
DROP TABLE IF EXISTS `tb_map`;
CREATE TABLE `tb_map` (
  `co_id` int(255) NOT NULL AUTO_INCREMENT,
  `co_name` varchar(255) DEFAULT NULL,
  `co_lati` varchar(20) NOT NULL COMMENT 'ละติจูด',
  `co_longti` varchar(255) NOT NULL COMMENT 'ลองติจูด',
  PRIMARY KEY (`co_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_map
-- ----------------------------

-- ----------------------------
-- Table structure for tb_users
-- ----------------------------
DROP TABLE IF EXISTS `tb_users`;
CREATE TABLE `tb_users` (
  `user_id` int(255) NOT NULL AUTO_INCREMENT,
  `user_user` varchar(255) DEFAULT NULL,
  `user_pass` varchar(255) DEFAULT NULL,
  `user_last` datetime DEFAULT NULL,
  `user_type` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_users
-- ----------------------------
