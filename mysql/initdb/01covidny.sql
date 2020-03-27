/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : covidny

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2020-03-27 01:09:31
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tb_data
-- ----------------------------
DROP TABLE IF EXISTS `tb_data`;
CREATE TABLE `tb_data` (
  `data_id` int(255) NOT NULL AUTO_INCREMENT,
  `co_id` varchar(20) DEFAULT NULL COMMENT 'ละติจูด',
  `da_icon` varchar(255) DEFAULT NULL COMMENT 'ลองติจูด',
  `da_popup` text DEFAULT NULL COMMENT 'ข้อความ',
  `da_last` datetime DEFAULT NULL,
  PRIMARY KEY (`data_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_data
-- ----------------------------
INSERT INTO `tb_data` VALUES ('1', '1', 'galertIcon', '<h3>ตำบลท่าช้าง </h3> ผู้ต้องเฝ้าระวัง 3 ราย ชาย(1) หญิง(2) <br> ครบ 14 วัน ชาย(1) หญิง(2) <div style=\'color:green\'>ผล: ปลอดภัย</div>', '2020-03-26 23:00:42');
INSERT INTO `tb_data` VALUES ('2', '2', 'ralertIcon', '<h3>ตำบลดงละคร </h3> ผู้ต้องเฝ้าระวัง 3 ราย หญิง(3) <br> ครบ 14 วัน หญิง(2) <div style=\'color:green\'>ผล: ปลอดภัย</div> <br> ยังไม่ครบ หญิง(1) <div style=\'color:red\'>ครบกำหนด 29 มีนาคม 2563</div>', '2020-03-26 23:00:45');
INSERT INTO `tb_data` VALUES ('3', '3', 'galertIcon', '<h3>ตำบลพรหมณี </h3> ผู้ต้องเฝ้าระวัง 11 ราย ชาย(3) หญิง(8) <br> ครบ 14 วัน ชาย(3) หญิง(8) <div style=\'color:green\'>ผล: ปลอดภัย</div>', '2020-03-26 23:00:48');
INSERT INTO `tb_data` VALUES ('4', '4', 'galertIcon', '<h3>ตำบลศรีนาวา </h3> ผู้ต้องเฝ้าระวัง 3 ราย หญิง(3) <br> ครบ 14 วัน หญิง(3) <div style=\'color:green\'>ผล: ปลอดภัย</div>', '2020-03-26 23:00:50');
INSERT INTO `tb_data` VALUES ('5', '5', 'galertIcon', '<h3>ตำบลบ้านใหญ่ </h3> ผู้ต้องเฝ้าระวัง 4 ราย ชาย(2) หญิง(2) <br> ครบ 14 วัน ชาย(2) หญิง(2) <div style=\'color:green\'>ผล: ปลอดภัย</div>', null);
INSERT INTO `tb_data` VALUES ('6', '6', 'galertIcon', '<h3>ตำบลท่าทราย </h3> ผู้ต้องเฝ้าระวัง 1 ราย ชาย(1) <br> ครบ 14 วัน ชาย(1) <div style=\'color:green\'>ผล: ปลอดภัย</div>', null);
INSERT INTO `tb_data` VALUES ('7', '7', 'galertIcon', '<h3>ตำบลหินตั้ง </h3> ผู้ต้องเฝ้าระวัง 1 ราย หญิง(1) <br> ครบ 14 วัน หญิง(1) <div style=\'color:green\'>ผล: ปลอดภัย</div>', null);
INSERT INTO `tb_data` VALUES ('8', '8', 'galertIcon', '<h3>ตำบลเขาพระ </h3> ผู้ต้องเฝ้าระวัง 1 ราย หญิง(1) <br> ครบ 14 วัน หญิง(1) <div style=\'color:green\'>ผล: ปลอดภัย</div>', null);
INSERT INTO `tb_data` VALUES ('9', '9', 'galertIcon', '<h3>ตำบลสาริกา </h3> ผู้ต้องเฝ้าระวัง 2 ราย หญิง(2) <br> ครบ 14 วัน หญิง(2) <div style=\'color:green\'>ผล: ปลอดภัย</div>', null);
INSERT INTO `tb_data` VALUES ('10', '10', 'galertIcon', '<h3>ตำบลวังกระโจม </h3> ผู้ต้องเฝ้าระวัง 2 ราย ชาย(1) หญิง(1) <br> ครบ 14 วัน ชาย(1) หญิง(1) <div style=\'color:green\'>ผล: ปลอดภัย</div>', null);
INSERT INTO `tb_data` VALUES ('11', '11', 'galertIcon', '<h3>ตำบลดอนยอ </h3> ผู้ต้องเฝ้าระวัง 1 ราย ชาย(1) <br> ครบ 14 วัน ชาย(1)<div style=\'color:green\'>ผล: ปลอดภัย</div>', null);
INSERT INTO `tb_data` VALUES ('12', '12', 'galertIcon', '<h3>ตำบลเกาะหวาย </h3> ผู้ต้องเฝ้าระวัง 4 ราย ชาย(2) หญิง(2) <br> ครบ 14 วัน ชาย(2) หญิง(2) <div style=\'color:green\'>ผล: ปลอดภัย</div>', null);
INSERT INTO `tb_data` VALUES ('13', '13', 'galertIcon', '<h3>ตำบลนาหินลาด </h3> ผู้ต้องเฝ้าระวัง 1 ราย หญิง(1) <br> ครบ 14 วัน หญิง(1) <div style=\'color:green\'>ผล: ปลอดภัย</div> ', null);
INSERT INTO `tb_data` VALUES ('14', '14', 'galertIcon', '<h3>ตำบลโครกกรวด </h3> ผู้ต้องเฝ้าระวัง 1 ราย ชาย(1) <br> ครบ 14 วัน ชาย(1) <div style=\'color:green\'>ผล: ปลอดภัย</div>', null);
INSERT INTO `tb_data` VALUES ('15', '15', 'ralertIcon', '<h3>ตำบลหนองแสง </h3> ผู้ต้องเฝ้าระวัง 3 ราย ชาย(1) หญิง(2) <br> ครบ 14 วัน ชาย(0) หญิง(2) <div style=\'color:green\'>ผล: ปลอดภัย</div> <br> ยังไม่ครบ ชาย(1) <div style=\'color:red\'>ครบกำหนด 28 มีนาคม 2563</div>', null);
INSERT INTO `tb_data` VALUES ('16', '16', 'ralertIcon', '<h3>ตำบลท่าเรือ </h3> ผู้ต้องเฝ้าระวัง 1 ราย หญิง(1) <br> ครบ 14 วัน หญิง(0) <div style=\'color:green\'>ผล: ปลอดภัย</div> <br> ยังไม่ครบ หญิง(1)  <div style=\'color:red\'>ครบกำหนด 29 มีนาคม 2563</div>', null);
INSERT INTO `tb_data` VALUES ('17', '17', 'galertIcon', '<h3>ตำบลบางสมบูรณ์ </h3> ผู้ต้องเฝ้าระวัง 1 ราย หญิง(1) <br> ครบ 14 วัน หญิง(1) <div style=\'color:green\'>ผล: ปลอดภัย</div>', null);
INSERT INTO `tb_data` VALUES ('18', '18', 'galertIcon', '<h3>ตำบลศรีษะกระบือ</h3> ผู้ต้องเฝ้าระวัง 2 ราย ชาย(1) หญิง(1) <br>ครบ 14 วัน ชาย(1) หญิง(1) <div style=\'color:green\'>ผล: ปลอดภัย</div>', null);
INSERT INTO `tb_data` VALUES ('19', '19', 'galertIcon', '<h3>ตำบลบางปลากด</h3> ผู้ต้องเฝ้าระวัง 1 ราย หญิง(1) <br>ครบ 14 วัน หญิง(1) <div style=\'color:green\'>ผล: ปลอดภัย</div>', null);
INSERT INTO `tb_data` VALUES ('20', '20', 'galertIcon', '<h3>ตำบลคลองใหญ่</h3> ผู้ต้องเฝ้าระวัง 2 ราย ชาย(1) หญิง(1) <br>ครบ 14 วัน ชาย(1) หญิง(1) <div style=\'color:green\'>ผล: ปลอดภัย</div>', null);
INSERT INTO `tb_data` VALUES ('21', '21', 'galertIcon', '<h3>ตำบลโพธิ์แทน</h3> ผู้ต้องเฝ้าระวัง 1 ราย ชาย(1) <br>ครบ 14 วัน ชาย(1) <div style=\'color:green\'>ผล: ปลอดภัย</div>', null);
INSERT INTO `tb_data` VALUES ('22', '22', 'galertIcon', '<h3>ตำบลบางลูกเสือ</h3> ผู้ต้องเฝ้าระวัง 1 ราย ชาย(1) <br>ครบ 14 วัน ชาย(1) <div style=\'color:green\'>ผล: ปลอดภัย</div>', null);
INSERT INTO `tb_data` VALUES ('23', '23', 'ralertIcon', '<h3>ตำบลทรายมูล</h3> ผู้ต้องเฝ้าระวัง 3 ราย ชาย(2) หญิง(1) <br>ครบ 14 วัน ชาย(0) หญิง(0) <div style=\'color:green\'>ผล: ปลอดภัย</div> <div style=\'color:red\'>ครบกำหนด 25 มีนาคม 2563</div>', null);

-- ----------------------------
-- Table structure for tb_map
-- ----------------------------
DROP TABLE IF EXISTS `tb_map`;
CREATE TABLE `tb_map` (
  `co_id` int(255) NOT NULL AUTO_INCREMENT,
  `co_name` varchar(255) DEFAULT NULL,
  `co_lati` varchar(20) NOT NULL COMMENT 'ละติจูด',
  `co_longti` varchar(255) NOT NULL COMMENT 'ลองติจูด',
  `co_last` datetime DEFAULT NULL,
  PRIMARY KEY (`co_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_map
-- ----------------------------
INSERT INTO `tb_map` VALUES ('1', 'ตำบลท่าช้าง - กลับจากต่างประเทศ', '14.1898453', '101.1670748', '2020-03-26 23:04:16');
INSERT INTO `tb_map` VALUES ('2', 'ตำบลดงละคร - กลับจากต่างประเทศ', '14.1457723', '101.1812288', '2020-03-26 23:04:19');
INSERT INTO `tb_map` VALUES ('3', 'ตำบลพรหมณี - กลับจากต่างประเทศ', '14.2334022', '101.1609828', '2020-03-24 23:04:26');
INSERT INTO `tb_map` VALUES ('4', 'ตำบลศรีนาวา - กลับจากต่างประเทศ', '14.2144976', '101.2648077', null);
INSERT INTO `tb_map` VALUES ('5', 'ตำบลบ้านใหญ่ - กลับจากต่างประเทศ', '14.2143552', '101.2334193', null);
INSERT INTO `tb_map` VALUES ('6', 'ตำบลท่าทราย - กลับจากต่างประเทศ', '14.1814261', '101.1340056', null);
INSERT INTO `tb_map` VALUES ('7', 'ตำบลหินตั้ง - กลับจากต่างประเทศ', '14.2728235', '101.2914633', null);
INSERT INTO `tb_map` VALUES ('8', 'ตำบลเขาพระ - กลับจากต่างประเทศ', '14.2844902', '101.2190123', null);
INSERT INTO `tb_map` VALUES ('9', 'ตำบลสาริกา - กลับจากต่างประเทศ', '14.2594912', '101.2627213', null);
INSERT INTO `tb_map` VALUES ('10', 'ตำบลวังกระโจม - กลับจากต่างประเทศ', '14.1848283', '101.2002558', null);
INSERT INTO `tb_map` VALUES ('11', 'ตำบลดอนยอ - กลับจากต่างประเทศ', '14.1550013', '101.1255978', null);
INSERT INTO `tb_map` VALUES ('12', 'ตำบลเกาะหวาย - กลับจากต่างประเทศ', '14.1758303', '101.2633148', null);
INSERT INTO `tb_map` VALUES ('13', 'ตำบลนาหินลาด - กลับจากต่างประเทศ', '14.2070242', '101.3484633', null);
INSERT INTO `tb_map` VALUES ('14', 'ตำบลโครกกรวด - กลับจากต่างประเทศ', '14.1817722', '101.2996653', null);
INSERT INTO `tb_map` VALUES ('15', 'ตำบลหนองแสง - กลับจากต่างประเทศ', '14.2003292', '101.3002063', null);
INSERT INTO `tb_map` VALUES ('16', 'ตำบลท่าเรือ - กลับจากต่างประเทศ', '14.1101032', '101.2278608', null);
INSERT INTO `tb_map` VALUES ('17', 'ตำบลบางสมบูรณ์ - กลับจากต่างประเทศ', '14.0339217', '101.1251534', null);
INSERT INTO `tb_map` VALUES ('18', 'ตำบลศรีษะกระบือ - กลับจากต่างประเทศ', '14.0288336', '101.0223347', null);
INSERT INTO `tb_map` VALUES ('19', 'ตำบลบางปลากด - กลับจากต่างประเทศ', '14.1607313', '100.9328188', null);
INSERT INTO `tb_map` VALUES ('20', 'ตำบลคลองใหญ่ - กลับจากต่างประเทศ', '14.1221814', '100.9943595', null);
INSERT INTO `tb_map` VALUES ('21', 'ตำบลโพธิ์แทน- กลับจากต่างประเทศ', '14.2082332', '100.9384823', null);
INSERT INTO `tb_map` VALUES ('22', 'ตำบลบางลูกเสือ - กลับจากต่างประเทศ', '14.0312716', '101.059181', null);
INSERT INTO `tb_map` VALUES ('23', 'ตำบลทรายมูล - กลับจากต่างประเทศ', '14.1407244', '100.9844025', null);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_users
-- ----------------------------
INSERT INTO `tb_users` VALUES ('1', 'admin', 'f6fdffe48c908deb0f4c3bd36c032e72', '2020-03-27 00:45:30', '1');
