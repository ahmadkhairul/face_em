/*
MySQL Data Transfer
Source Host: localhost
Source Database: db_absen
Target Host: localhost
Target Database: db_absen
Date: 8/5/2017 10:57:07 PM
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for t_absen
-- ----------------------------
CREATE TABLE `t_absen` (
  `id` varchar(100) NOT NULL,
  `msk` varchar(100) DEFAULT NULL,
  `plg` varchar(100) DEFAULT NULL,
  `tpj` varchar(100) DEFAULT NULL,
  `lpj` varchar(100) DEFAULT NULL,
  `gpj` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for t_karyawan
-- ----------------------------
CREATE TABLE `t_karyawan` (
  `id` varchar(100) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for t_karyawan_real
-- ----------------------------
CREATE TABLE `t_karyawan_real` (
  `id` varchar(100) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for t_kry
-- ----------------------------
CREATE TABLE `t_kry` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `id_kry` varchar(100) DEFAULT NULL,
  `tgmsk` date DEFAULT NULL,
  `jmsk` varchar(100) DEFAULT NULL,
  `jklr` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for t_kry_real
-- ----------------------------
CREATE TABLE `t_kry_real` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `id_kry` varchar(100) DEFAULT NULL,
  `tgmsk` date DEFAULT NULL,
  `jmsk` varchar(100) DEFAULT NULL,
  `jklr` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `t_absen` VALUES ('1', '9', '17', '4000', '5000', '4000');
INSERT INTO `t_karyawan` VALUES ('104002', 'Ahmad Khairul');
INSERT INTO `t_karyawan_real` VALUES ('104001', 'Iman Santina');
INSERT INTO `t_karyawan_real` VALUES ('104002', 'Ahmad Khairul');
INSERT INTO `t_karyawan_real` VALUES ('104003', 'Zamzam Anshori');
INSERT INTO `t_karyawan_real` VALUES ('104004', 'Fajar Buana');
INSERT INTO `t_karyawan_real` VALUES ('104005', 'Gagan Galih');
INSERT INTO `t_kry` VALUES ('2', '104002', '2017-08-05', '07', '10');
INSERT INTO `t_kry_real` VALUES ('1', '104001', '2017-07-18', '08', '22');
INSERT INTO `t_kry_real` VALUES ('2', '104002', '2017-07-18', '08', '22');
INSERT INTO `t_kry_real` VALUES ('3', '104003', '2017-07-18', '08', '22');
INSERT INTO `t_kry_real` VALUES ('4', '104004', '2017-07-18', '08', '22');
INSERT INTO `t_kry_real` VALUES ('5', '104005', '2017-07-18', '08', '22');
INSERT INTO `t_kry_real` VALUES ('6', '104001', '2017-07-19', '08', '22');
INSERT INTO `t_kry_real` VALUES ('7', '104002', '2017-07-19', '08', '22');
INSERT INTO `t_kry_real` VALUES ('8', '104003', '2017-07-19', '08', '22');
INSERT INTO `t_kry_real` VALUES ('9', '104004', '2017-07-19', '08', '22');
INSERT INTO `t_kry_real` VALUES ('10', '104005', '2017-07-19', '08', '22');
INSERT INTO `t_kry_real` VALUES ('11', '104001', '2017-07-20', '08', '22');
INSERT INTO `t_kry_real` VALUES ('12', '104002', '2017-07-20', '08', '22');
INSERT INTO `t_kry_real` VALUES ('13', '104003', '2017-07-20', '08', '22');
INSERT INTO `t_kry_real` VALUES ('14', '104004', '2017-07-20', '08', '22');
INSERT INTO `t_kry_real` VALUES ('15', '104005', '2017-07-20', '08', '22');
INSERT INTO `t_kry_real` VALUES ('16', '104001', '2017-08-01', '08', '22');
INSERT INTO `t_kry_real` VALUES ('17', '104002', '2017-08-02', '08', '22');
INSERT INTO `t_kry_real` VALUES ('18', '104003', '2017-08-03', '08', '22');
INSERT INTO `t_kry_real` VALUES ('19', '104004', '2017-08-04', '08', '22');
INSERT INTO `t_kry_real` VALUES ('20', '104005', '2017-08-05', '08', '22');
INSERT INTO `t_kry_real` VALUES ('21', '104001', '2017-07-23', '08', '22');
INSERT INTO `t_kry_real` VALUES ('23', '104003', '2017-08-05', '20', '20');
