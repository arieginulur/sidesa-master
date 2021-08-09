/*
 Navicat Premium Data Transfer

 Source Server         : denuber
 Source Server Type    : MySQL
 Source Server Version : 100138
 Source Host           : localhost:3306
 Source Schema         : desa_kamasan

 Target Server Type    : MySQL
 Target Server Version : 100138
 File Encoding         : 65001

 Date: 24/07/2021 01:56:06
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tbl_keluarga
-- ----------------------------
DROP TABLE IF EXISTS `tbl_keluarga`;
CREATE TABLE `tbl_keluarga`  (
  `id_keluarga` int(11) NOT NULL AUTO_INCREMENT,
  `id_pengguna` int(11) NULL DEFAULT NULL,
  `id_kepala_keluarga` int(11) NULL DEFAULT NULL,
  `no_kk` int(255) NULL DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `rt` int(5) NULL DEFAULT NULL,
  `rw` int(5) NULL DEFAULT NULL,
  PRIMARY KEY (`id_keluarga`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci;

-- ----------------------------
-- Records of tbl_keluarga
-- ----------------------------
BEGIN;
INSERT INTO `tbl_keluarga` VALUES (1, NULL, 1, 123123, 'bandung', 1, 1), (2, NULL, 3, 132516513, 'purwakarta', 2, 3), (3, NULL, 5, 2147483647, 'lkglsfefnlkjents', 2, 3);
COMMIT;

-- ----------------------------
-- Table structure for tbl_penduduk
-- ----------------------------
DROP TABLE IF EXISTS `tbl_penduduk`;
CREATE TABLE `tbl_penduduk`  (
  `id_penduduk` int(11) NOT NULL AUTO_INCREMENT,
  `id_keluarga` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nik` int(16) NOT NULL,
  `nama` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tempat_lahir` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_lahir` date NULL DEFAULT NULL,
  `jk` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `no_telp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_pendidikan` int(10) NULL DEFAULT NULL,
  `id_agama` int(10) NULL DEFAULT NULL,
  `id_pekerjaan` int(10) NULL DEFAULT NULL,
  `id_status_kawin` int(10) NULL DEFAULT NULL,
  `id_status_tinggal` int(10) NULL DEFAULT NULL,
  `id_kewarganegaraan` int(10) NULL DEFAULT NULL,
  `pendapatan` bigint(60) NULL DEFAULT NULL,
  PRIMARY KEY (`id_penduduk`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci;

-- ----------------------------
-- Records of tbl_penduduk
-- ----------------------------
BEGIN;
INSERT INTO `tbl_penduduk` VALUES (1, '1', 1023165, 'teddy', 'bandung', '2021-07-23', 'P', '08156464', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL), (2, '1', 2147483647, 'hali', 'garut', '2021-07-07', 'L', '084156164', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL), (3, '2', 2147483647, 'ari', 'bogor', '2021-07-11', 'L', '05161685', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL), (4, '2', 2147483647, 'fahreza', 'mars', '2021-07-14', 'L', '08416541', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL), (5, '3', 415641654, 'dinar', 'akflkf', '1999-05-05', 'P', '0486453545284', 'efsfsdfsf', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for tbl_pengguna
-- ----------------------------
DROP TABLE IF EXISTS `tbl_pengguna`;
CREATE TABLE `tbl_pengguna`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `level` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `level` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci;

-- ----------------------------
-- Records of user
-- ----------------------------
BEGIN;
INSERT INTO `user` VALUES (4, 'admin', '$2y$10$pmL9B4RFOaYinjC1ww/yGOWmlOiSQLsnDLaLOIeYWMjG7dxXTzWIC', 'Teddy Rachmadi', 'admin'), (5, 'operator', '$2y$10$g/VEKnpbhrEMeqlly9Ia6ecMxu60vYck5Q4dP8Ct3Dpsn0DfgKr.C', 'operator', 'operator');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
