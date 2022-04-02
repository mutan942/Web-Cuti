/*
 Navicat Premium Data Transfer

 Source Server         : Mysql Local
 Source Server Type    : MySQL
 Source Server Version : 100421
 Source Host           : localhost:3306
 Source Schema         : webcuti

 Target Server Type    : MySQL
 Target Server Version : 100421
 File Encoding         : 65001

 Date: 02/04/2022 11:33:44
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tbl_cuti
-- ----------------------------
DROP TABLE IF EXISTS `tbl_cuti`;
CREATE TABLE `tbl_cuti`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nomor_induk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tanggal_cuti` date NULL DEFAULT NULL,
  `lama_cuti` int NULL DEFAULT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `sampai_tanggal` date NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_cuti
-- ----------------------------
INSERT INTO `tbl_cuti` VALUES (4, '12345678', '2022-04-01', 4, 'aasfsffe', '2022-04-05');
INSERT INTO `tbl_cuti` VALUES (5, '7389236892', '2022-04-01', 8, 'sffwefwewer', '2022-04-09');
INSERT INTO `tbl_cuti` VALUES (6, '656565', '2022-04-02', 3, 'adadada', '2022-04-04');
INSERT INTO `tbl_cuti` VALUES (10, '45463', '2022-04-06', 2, 'fdfsdfsdfe', '2022-04-07');
INSERT INTO `tbl_cuti` VALUES (11, '45463', '2022-04-01', 1, 'ergertet44', '2022-04-01');

-- ----------------------------
-- Table structure for tbl_karyawan
-- ----------------------------
DROP TABLE IF EXISTS `tbl_karyawan`;
CREATE TABLE `tbl_karyawan`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nomor_induk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tanggal_lahir` date NULL DEFAULT NULL,
  `tanggal_bergabung` date NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_karyawan
-- ----------------------------
INSERT INTO `tbl_karyawan` VALUES (10, '656565', 'Arny', 'Manuruki 2', '1998-09-09', '2022-04-01');
INSERT INTO `tbl_karyawan` VALUES (12, '45463', '534534534', '345343', '2022-04-21', '2022-04-02');

SET FOREIGN_KEY_CHECKS = 1;
