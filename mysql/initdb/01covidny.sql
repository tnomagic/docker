/*
Navicat MySQL Data Transfer

Source Server         : docker
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : covidny

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2020-03-25 22:26:02
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tb_map
-- ----------------------------
DROP TABLE IF EXISTS `tb_map`;
CREATE TABLE `tb_map` (
  `co_id` int(255) NOT NULL AUTO_INCREMENT,
  `co_name` varchar(255) DEFAULT NULL,
  `co_lati` varchar(20) NOT NULL COMMENT 'ละติจูด',
  `co_longti` varchar(255) NOT NULL COMMENT 'ลองติจูด',
  `co_icon` varchar(255) NOT NULL COMMENT 'รูปสีแดง เหลือง เขียว',
  `co_popup` text DEFAULT NULL COMMENT 'ข้อความ',
  `co_type` varchar(10) DEFAULT '' COMMENT 'ประเภทคนมาจากต่างจังหวัด หรือ ต่างประเทศ',
  PRIMARY KEY (`co_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_map
-- ----------------------------
