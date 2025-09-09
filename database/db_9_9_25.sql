/*
 Navicat MySQL Dump SQL

 Source Server         : docker-mysql
 Source Server Type    : MySQL
 Source Server Version : 80405 (8.4.5)
 Source Host           : localhost:3306
 Source Schema         : moengage_db

 Target Server Type    : MySQL
 Target Server Version : 80405 (8.4.5)
 File Encoding         : 65001

 Date: 09/09/2025 14:16:59
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for affected_populations
-- ----------------------------
DROP TABLE IF EXISTS `affected_populations`;
CREATE TABLE `affected_populations`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `incident_id` bigint UNSIGNED NOT NULL,
  `students_affected` int UNSIGNED NOT NULL DEFAULT 0,
  `teachers_affected` int UNSIGNED NOT NULL DEFAULT 0,
  `staff_affected` int UNSIGNED NOT NULL DEFAULT 0,
  `injured` int UNSIGNED NOT NULL DEFAULT 0,
  `missing` int UNSIGNED NOT NULL DEFAULT 0,
  `deceased` int UNSIGNED NOT NULL DEFAULT 0,
  `evacuees` int UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `affected_populations_incident_id_index`(`incident_id` ASC) USING BTREE,
  CONSTRAINT `affected_populations_incident_id_foreign` FOREIGN KEY (`incident_id`) REFERENCES `incidents` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 32 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of affected_populations
-- ----------------------------
INSERT INTO `affected_populations` VALUES (1, 1, 420, 28, 15, 2, 0, 0, 300, '2025-09-09 04:25:40', '2025-09-09 04:25:40');
INSERT INTO `affected_populations` VALUES (2, 2, 260, 20, 10, 0, 0, 0, 180, '2025-09-09 04:25:40', '2025-09-09 04:25:40');
INSERT INTO `affected_populations` VALUES (3, 3, 180, 12, 6, 0, 0, 0, 0, '2025-09-09 04:25:40', '2025-09-09 04:25:40');
INSERT INTO `affected_populations` VALUES (4, 4, 120, 10, 8, 1, 0, 0, 90, '2025-09-09 04:25:40', '2025-09-09 04:25:40');
INSERT INTO `affected_populations` VALUES (5, 5, 340, 25, 12, 0, 0, 0, 240, '2025-09-09 04:25:40', '2025-09-09 04:25:40');
INSERT INTO `affected_populations` VALUES (6, 6, 80, 6, 4, 1, 0, 0, 60, '2025-09-09 04:25:40', '2025-09-09 04:25:40');
INSERT INTO `affected_populations` VALUES (7, 7, 95, 4, 3, 0, 0, 0, 0, '2025-09-09 04:25:40', '2025-09-09 04:25:40');
INSERT INTO `affected_populations` VALUES (8, 8, 210, 16, 9, 2, 0, 1, 170, '2025-09-09 04:25:40', '2025-09-09 04:25:40');
INSERT INTO `affected_populations` VALUES (9, 9, 650, 45, 20, 0, 0, 0, 0, '2025-09-09 04:25:40', '2025-09-09 04:25:40');
INSERT INTO `affected_populations` VALUES (10, 10, 300, 20, 10, 0, 0, 0, 210, '2025-09-09 04:25:40', '2025-09-09 04:25:40');
INSERT INTO `affected_populations` VALUES (11, 11, 220, 15, 8, 0, 0, 0, 0, '2025-09-09 04:25:40', '2025-09-09 04:25:40');
INSERT INTO `affected_populations` VALUES (12, 12, 480, 30, 14, 3, 0, 0, 350, '2025-09-09 04:25:40', '2025-09-09 04:25:40');
INSERT INTO `affected_populations` VALUES (13, 13, 260, 18, 10, 0, 0, 0, 160, '2025-09-09 04:25:40', '2025-09-09 04:25:40');
INSERT INTO `affected_populations` VALUES (14, 14, 150, 12, 7, 0, 0, 0, 90, '2025-09-09 04:25:40', '2025-09-09 04:25:40');
INSERT INTO `affected_populations` VALUES (15, 15, 60, 5, 4, 0, 0, 0, 40, '2025-09-09 04:25:40', '2025-09-09 04:25:40');
INSERT INTO `affected_populations` VALUES (16, 16, 170, 12, 6, 0, 0, 0, 120, '2025-09-09 04:25:40', '2025-09-09 04:25:40');
INSERT INTO `affected_populations` VALUES (17, 17, 380, 25, 12, 1, 0, 0, 280, '2025-09-09 04:25:40', '2025-09-09 04:25:40');
INSERT INTO `affected_populations` VALUES (18, 18, 700, 50, 25, 0, 0, 0, 0, '2025-09-09 04:25:40', '2025-09-09 04:25:40');
INSERT INTO `affected_populations` VALUES (19, 19, 70, 3, 2, 0, 0, 0, 0, '2025-09-09 04:25:40', '2025-09-09 04:25:40');
INSERT INTO `affected_populations` VALUES (20, 20, 190, 14, 8, 1, 0, 0, 140, '2025-09-09 04:25:40', '2025-09-09 04:25:40');
INSERT INTO `affected_populations` VALUES (21, 21, 210, 15, 7, 0, 0, 0, 120, '2025-09-09 04:25:40', '2025-09-09 04:25:40');
INSERT INTO `affected_populations` VALUES (22, 22, 300, 20, 10, 0, 0, 0, 0, '2025-09-09 04:25:40', '2025-09-09 04:25:40');
INSERT INTO `affected_populations` VALUES (23, 23, 520, 35, 15, 0, 0, 0, 0, '2025-09-09 04:25:40', '2025-09-09 04:25:40');
INSERT INTO `affected_populations` VALUES (24, 24, 130, 10, 6, 0, 0, 0, 90, '2025-09-09 04:25:40', '2025-09-09 04:25:40');
INSERT INTO `affected_populations` VALUES (25, 25, 40, 3, 3, 0, 0, 0, 0, '2025-09-09 04:25:40', '2025-09-09 04:25:40');
INSERT INTO `affected_populations` VALUES (26, 26, 180, 12, 6, 0, 0, 0, 0, '2025-09-09 04:25:40', '2025-09-09 04:25:40');
INSERT INTO `affected_populations` VALUES (27, 27, 220, 16, 8, 0, 0, 0, 100, '2025-09-09 04:25:40', '2025-09-09 04:25:40');
INSERT INTO `affected_populations` VALUES (28, 28, 55, 3, 2, 0, 0, 0, 0, '2025-09-09 04:25:40', '2025-09-09 04:25:40');
INSERT INTO `affected_populations` VALUES (29, 29, 160, 12, 6, 0, 0, 0, 0, '2025-09-09 04:25:40', '2025-09-09 04:25:40');
INSERT INTO `affected_populations` VALUES (30, 30, 450, 30, 12, 0, 0, 0, 0, '2025-09-09 04:25:40', '2025-09-09 04:25:40');
INSERT INTO `affected_populations` VALUES (31, 5, 200, 15, 8, 2, 1, 0, 189, '2025-09-09 04:39:53', '2025-09-09 04:40:11');

-- ----------------------------
-- Table structure for assistance
-- ----------------------------
DROP TABLE IF EXISTS `assistance`;
CREATE TABLE `assistance`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `incident_id` bigint UNSIGNED NOT NULL,
  `assistance_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `quantity` int UNSIGNED NULL DEFAULT 0,
  `unit` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `amount` decimal(16, 2) NOT NULL DEFAULT 0.00,
  `provider_agency` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `received_by_resident_id` bigint UNSIGNED NULL DEFAULT NULL,
  `approved_by_user_id` bigint UNSIGNED NULL DEFAULT NULL,
  `status` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `delivered_at` timestamp NULL DEFAULT NULL,
  `delivered_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `remarks` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx_assistance_incident_id`(`incident_id` ASC) USING BTREE,
  INDEX `fk_assistance_user`(`approved_by_user_id` ASC) USING BTREE,
  CONSTRAINT `fk_assistance_incident` FOREIGN KEY (`incident_id`) REFERENCES `incidents` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `fk_assistance_user` FOREIGN KEY (`approved_by_user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 42 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of assistance
-- ----------------------------
INSERT INTO `assistance` VALUES (11, 1, 'Relief Goods', 'Food packs for displaced households', 200, 'packs', 100000.00, 'LGU Boac', 5, 3, 'released', '2025-07-17 09:30:00', 'LGU staff', 'Distributed at evacuation center.', '2025-09-09 00:26:19', '2025-09-09 00:26:19');
INSERT INTO `assistance` VALUES (12, 2, 'Drinking Water', 'Clean drinking water for flooded community', 500, 'liters', 25000.00, 'Red Cross', 8, 3, 'received', '2025-06-22 08:30:00', 'Red Cross Palawan', 'Delivered to school canteen.', '2025-09-09 00:26:19', '2025-09-09 00:26:19');
INSERT INTO `assistance` VALUES (13, 3, 'Generator Set', 'Temporary power supply during outage', 1, 'unit', 75000.00, 'DepEd Division Office', 10, 3, 'released', '2025-03-12 13:00:00', 'DepEd Technician', 'For exam continuity.', '2025-09-09 00:26:19', '2025-09-09 00:26:19');
INSERT INTO `assistance` VALUES (14, 4, 'Construction Materials', 'Cement and hollow blocks for landslide repair', 200, 'sacks', 120000.00, 'DPWH', 12, 3, 'pending', NULL, NULL, 'Awaiting delivery to school site.', '2025-09-09 00:26:19', '2025-09-09 00:26:19');
INSERT INTO `assistance` VALUES (15, 5, 'School Supplies', 'Notebooks, bags, pencils for affected students', 300, 'kits', 90000.00, 'NGO Partner', 15, 3, 'released', '2025-08-11 10:00:00', 'NGO Volunteers', 'Targeted distribution to Grades 1-6.', '2025-09-09 00:26:19', '2025-09-09 00:26:19');
INSERT INTO `assistance` VALUES (16, 6, 'Fire Extinguishers', 'Replenishment after canteen fire', 10, 'pcs', 30000.00, 'BFP San Jose', 18, 3, 'received', '2025-05-05 09:00:00', 'BFP Officers', 'Installed across school buildings.', '2025-09-09 00:26:19', '2025-09-09 00:26:19');
INSERT INTO `assistance` VALUES (17, 7, 'Medicine Kits', 'First-aid and anti-dengue kits', 50, 'kits', 20000.00, 'DOH MIMAROPA', 20, 3, 'released', '2025-07-03 11:00:00', 'DOH Team', 'For suspected dengue cases.', '2025-09-09 00:26:19', '2025-09-09 00:26:19');
INSERT INTO `assistance` VALUES (18, 8, 'Tents', 'Temporary classrooms for displaced students', 5, 'units', 150000.00, 'DSWD', 22, 3, 'released', '2025-08-19 08:30:00', 'DSWD Field Office', 'To be used until gym repairs.', '2025-09-09 00:26:19', '2025-09-09 00:26:19');
INSERT INTO `assistance` VALUES (19, 9, 'Emergency Whistles', 'Safety kits for earthquake preparedness', 400, 'pcs', 20000.00, 'DepEd DRRM', 25, 3, 'approved', '2025-02-12 07:45:00', 'School DRRM Coordinator', 'Issued during earthquake drill.', '2025-09-09 00:26:19', '2025-09-09 00:26:19');
INSERT INTO `assistance` VALUES (20, 10, 'Cash Assistance', 'Emergency financial support for affected families', 50, 'families', 250000.00, 'Provincial Government', 30, 3, 'released', '2025-07-23 12:30:00', 'Treasurer Office', 'Distributed with LGU staff assistance.', '2025-09-09 00:26:19', '2025-09-09 00:26:19');
INSERT INTO `assistance` VALUES (21, 1, 'Relief Goods', 'Food packs for displaced households', 200, 'packs', 100000.00, 'LGU Boac', 5, 3, 'released', '2025-07-17 09:30:00', 'LGU staff', 'Distributed at evacuation center.', '2025-09-09 00:30:23', '2025-09-09 00:30:23');
INSERT INTO `assistance` VALUES (22, 2, 'Drinking Water', 'Clean water for flooded community', 500, 'liters', 25000.00, 'Red Cross', 8, 3, 'received', '2025-06-22 08:30:00', 'Red Cross Palawan', 'Delivered to school canteen.', '2025-09-09 00:30:23', '2025-09-09 00:30:23');
INSERT INTO `assistance` VALUES (23, 3, 'Generator Set', 'Temporary power supply during outage', 1, 'unit', 75000.00, 'DepEd Division Office', 10, 3, 'released', '2025-03-12 13:00:00', 'DepEd Technician', 'For exam continuity.', '2025-09-09 00:30:23', '2025-09-09 00:30:23');
INSERT INTO `assistance` VALUES (24, 4, 'Construction Materials', 'Cement and hollow blocks for landslide repair', 200, 'sacks', 120000.00, 'DPWH', 12, 3, 'pending', NULL, NULL, 'Awaiting delivery to school site.', '2025-09-09 00:30:23', '2025-09-09 00:30:23');
INSERT INTO `assistance` VALUES (25, 5, 'School Supplies', 'Notebooks and bags for affected students', 300, 'kits', 90000.00, 'NGO Partner', 15, 3, 'released', '2025-08-11 10:00:00', 'NGO Volunteers', 'Targeted distribution to Grades 1-6.', '2025-09-09 00:30:23', '2025-09-09 00:30:23');
INSERT INTO `assistance` VALUES (26, 6, 'Fire Extinguishers', 'Replenishment after storage fire', 10, 'pcs', 30000.00, 'BFP San Jose', 18, 3, 'received', '2025-05-05 09:00:00', 'BFP Officers', 'Installed across school buildings.', '2025-09-09 00:30:23', '2025-09-09 00:30:23');
INSERT INTO `assistance` VALUES (27, 7, 'Medicine Kits', 'First-aid and anti-dengue kits', 50, 'kits', 20000.00, 'DOH MIMAROPA', 20, 3, 'released', '2025-07-03 11:00:00', 'DOH Team', 'For suspected dengue cases.', '2025-09-09 00:30:23', '2025-09-09 00:30:23');
INSERT INTO `assistance` VALUES (28, 8, 'Tents', 'Temporary classrooms for displaced students', 5, 'units', 150000.00, 'DSWD', 22, 3, 'released', '2025-08-19 08:30:00', 'DSWD Field Office', 'To be used until gym repairs.', '2025-09-09 00:30:23', '2025-09-09 00:30:23');
INSERT INTO `assistance` VALUES (29, 9, 'Emergency Whistles', 'Safety kits for earthquake preparedness', 400, 'pcs', 20000.00, 'DepEd DRRM', 25, 3, 'approved', '2025-02-12 07:45:00', 'School DRRM Coordinator', 'Issued during earthquake drill.', '2025-09-09 00:30:23', '2025-09-09 00:30:23');
INSERT INTO `assistance` VALUES (30, 10, 'Cash Assistance', 'Financial support for affected families', 50, 'families', 250000.00, 'Provincial Government', 30, 3, 'released', '2025-07-23 12:30:00', 'Treasurer Office', 'Distributed with LGU staff assistance.', '2025-09-09 00:30:23', '2025-09-09 00:30:23');
INSERT INTO `assistance` VALUES (31, 11, 'Candles and Flashlights', 'Emergency lighting supplies', 200, 'sets', 15000.00, 'Barangay Victoria', 33, 3, 'received', '2025-06-03 10:00:00', 'Barangay Staff', 'For use during 6-hour outage.', '2025-09-09 00:30:23', '2025-09-09 00:30:23');
INSERT INTO `assistance` VALUES (32, 12, 'Roof Sheets', 'Galvanized sheets for damaged classrooms', 120, 'sheets', 180000.00, 'LGU Pinamalayan', 36, 3, 'released', '2025-07-17 13:00:00', 'Municipal Engineers', 'Emergency roofing materials delivered.', '2025-09-09 00:30:23', '2025-09-09 00:30:23');
INSERT INTO `assistance` VALUES (33, 13, 'Drinking Water', 'Safe water distribution after flash flood', 400, 'liters', 20000.00, 'Red Cross', 39, 3, 'released', '2025-08-03 15:00:00', 'Red Cross Mindoro', 'For students in low-lying areas.', '2025-09-09 00:30:23', '2025-09-09 00:30:23');
INSERT INTO `assistance` VALUES (34, 14, 'School Bus Rental', 'Temporary transport due to road cut', 3, 'days', 45000.00, 'LGU Roxas', 42, 3, 'released', '2025-08-13 07:00:00', 'Bus Company', 'For alternate transport route.', '2025-09-09 00:30:23', '2025-09-09 00:30:23');
INSERT INTO `assistance` VALUES (35, 15, 'Fire Blankets', 'Fire safety reinforcement', 15, 'pcs', 25000.00, 'BFP Puerto Princesa', 45, 3, 'received', '2025-04-20 14:00:00', 'BFP Crew', 'Added to canteen and labs.', '2025-09-09 00:30:23', '2025-09-09 00:30:23');
INSERT INTO `assistance` VALUES (36, 16, 'Food Packs', 'Emergency ration packs', 180, 'packs', 80000.00, 'LGU Roxas Palawan', 48, 3, 'released', '2025-07-31 09:00:00', 'Barangay Volunteers', 'For SPED students and staff.', '2025-09-09 00:30:23', '2025-09-09 00:30:23');
INSERT INTO `assistance` VALUES (37, 17, 'Window Glass', 'Replacement for shattered panes', 60, 'panes', 95000.00, 'DepEd Palawan', 51, 3, 'released', '2025-07-17 11:00:00', 'Private Contractor', 'Temporary covers replaced with glass.', '2025-09-09 00:30:23', '2025-09-09 00:30:23');
INSERT INTO `assistance` VALUES (38, 18, 'First Aid Kits', 'Distributed after earthquake tremor', 20, 'kits', 12000.00, 'LGU Coron', 54, 3, 'received', '2025-05-06 09:30:00', 'Municipal Health Office', 'Stored in clinic and classrooms.', '2025-09-09 00:30:23', '2025-09-09 00:30:23');
INSERT INTO `assistance` VALUES (39, 19, 'Mosquito Nets', 'Prevention of dengue cases', 100, 'pcs', 35000.00, 'DOH Palawan', 57, 3, 'released', '2025-06-26 08:00:00', 'Health Workers', 'For dormitory and classrooms.', '2025-09-09 00:30:23', '2025-09-09 00:30:23');
INSERT INTO `assistance` VALUES (40, 20, 'Warning Tape', 'To cordon unsafe mudslide area', 20, 'rolls', 10000.00, 'Barangay Brooke’s Point', 60, 3, 'released', '2025-08-14 08:30:00', 'Barangay Volunteers', 'Placed near gym and fence area.', '2025-09-09 00:30:23', '2025-09-09 00:30:23');
INSERT INTO `assistance` VALUES (41, 30, 'food', 'Family food packs', 150, 'packs', 0.00, 'DepEd Division Office', NULL, 3, 'released', '2025-09-05 00:00:00', 'DepEd Division Office', 'Released to school focal persons for distribution.', '2025-09-09 00:30:50', '2025-09-09 00:30:50');

-- ----------------------------
-- Table structure for cache
-- ----------------------------
DROP TABLE IF EXISTS `cache`;
CREATE TABLE `cache`  (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of cache
-- ----------------------------

-- ----------------------------
-- Table structure for cache_locks
-- ----------------------------
DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE `cache_locks`  (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of cache_locks
-- ----------------------------

-- ----------------------------
-- Table structure for damage_assessments
-- ----------------------------
DROP TABLE IF EXISTS `damage_assessments`;
CREATE TABLE `damage_assessments`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `incident_id` bigint UNSIGNED NOT NULL,
  `affected_households` int UNSIGNED NOT NULL DEFAULT 0,
  `totally_damaged` int UNSIGNED NOT NULL DEFAULT 0,
  `partially_damaged` int UNSIGNED NOT NULL DEFAULT 0,
  `injuries` int UNSIGNED NOT NULL DEFAULT 0,
  `deaths` int UNSIGNED NOT NULL DEFAULT 0,
  `missing` int UNSIGNED NOT NULL DEFAULT 0,
  `displaced_families` int UNSIGNED NOT NULL DEFAULT 0,
  `classrooms_damaged_minor` int UNSIGNED NOT NULL DEFAULT 0,
  `classrooms_damaged_major` int UNSIGNED NOT NULL DEFAULT 0,
  `estimated_cost` decimal(15, 2) NULL DEFAULT NULL,
  `estimated_loss_amount` decimal(16, 2) NOT NULL DEFAULT 0.00,
  `status` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft',
  `assessed_by_user_id` bigint UNSIGNED NULL DEFAULT NULL,
  `assessed_at` timestamp NULL DEFAULT NULL,
  `notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `damage_assessments_incident_id_index`(`incident_id` ASC) USING BTREE,
  INDEX `damage_assessments_user_id_foreign`(`assessed_by_user_id` ASC) USING BTREE,
  CONSTRAINT `damage_assessments_incident_id_foreign` FOREIGN KEY (`incident_id`) REFERENCES `incidents` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `damage_assessments_user_id_foreign` FOREIGN KEY (`assessed_by_user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of damage_assessments
-- ----------------------------
INSERT INTO `damage_assessments` VALUES (11, 1, 120, 10, 25, 2, 0, 0, 30, 2, 0, 150000.00, 250000.00, 'verified', 3, '2025-07-17 09:00:00', 'Typhoon Carina caused major roof damage and displaced families.', '2025-09-08 07:21:43', '2025-09-08 07:21:43');
INSERT INTO `damage_assessments` VALUES (12, 2, 85, 5, 12, 0, 0, 0, 20, 1, 0, 50000.00, 120000.00, 'approved', 3, '2025-06-22 10:00:00', 'Flood submerged quadrangle; relief distributed to affected households.', '2025-09-08 07:21:43', '2025-09-08 07:21:43');
INSERT INTO `damage_assessments` VALUES (13, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0.00, 'closed', 3, NULL, 'Power outage only, no physical damage reported.', '2025-09-08 07:21:43', '2025-09-08 07:21:43');
INSERT INTO `damage_assessments` VALUES (14, 4, 45, 3, 8, 1, 0, 0, 15, 0, 1, 200000.00, 350000.00, 'submitted', 3, '2025-01-28 14:30:00', 'Landslide blocked road access, one classroom unsafe.', '2025-09-08 07:21:43', '2025-09-08 07:21:43');
INSERT INTO `damage_assessments` VALUES (15, 5, 60, 4, 15, 0, 0, 0, 18, 2, 0, 120000.00, 210000.00, 'verified', 3, '2025-08-11 11:00:00', 'Flood entered classrooms; households evacuated temporarily.', '2025-09-08 07:21:43', '2025-09-08 07:21:43');
INSERT INTO `damage_assessments` VALUES (16, 6, 10, 1, 2, 0, 0, 0, 3, 1, 0, 80000.00, 90000.00, 'approved', 3, '2025-05-05 09:30:00', 'Storage fire damaged supplies and one classroom.', '2025-09-08 07:21:43', '2025-09-08 07:21:43');
INSERT INTO `damage_assessments` VALUES (17, 7, 30, 0, 0, 4, 0, 0, 10, 0, 0, 25000.00, 60000.00, 'verified', 3, '2025-07-03 08:45:00', 'Health response for dengue outbreak; minimal physical damage.', '2025-09-08 07:21:43', '2025-09-08 07:21:43');
INSERT INTO `damage_assessments` VALUES (18, 8, 75, 6, 20, 2, 1, 0, 25, 0, 2, 500000.00, 700000.00, 'submitted', 3, '2025-08-19 07:15:00', 'Slope failure behind gym collapsed two classrooms, one fatality.', '2025-09-08 07:21:43', '2025-09-08 07:21:43');
INSERT INTO `damage_assessments` VALUES (19, 9, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0.00, 'closed', 3, NULL, 'Earthquake drill successful, no damages noted.', '2025-09-08 07:21:43', '2025-09-08 07:21:43');
INSERT INTO `damage_assessments` VALUES (20, 10, 40, 2, 6, 0, 0, 0, 12, 1, 0, 40000.00, 85000.00, 'verified', 3, '2025-07-23 12:00:00', 'River overflow caused temporary displacement.', '2025-09-08 07:21:43', '2025-09-08 07:21:43');
INSERT INTO `damage_assessments` VALUES (21, 11, 230, 12, 57, 4, 0, 0, 30, 0, 0, 156000.00, 1250000.50, 'draft', NULL, NULL, NULL, '2025-09-08 07:56:54', '2025-09-08 07:56:54');
INSERT INTO `damage_assessments` VALUES (22, 12, 250, 12, 57, 4, 0, 0, 30, 2, 1, 156000.00, 1270000.50, 'submitted', 3, '2025-09-05 10:30:00', 'Initial field assessment of the contract.', '2025-09-08 07:57:47', '2025-09-08 23:18:31');

-- ----------------------------
-- Table structure for departments
-- ----------------------------
DROP TABLE IF EXISTS `departments`;
CREATE TABLE `departments`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `departments_name_unique`(`name` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of departments
-- ----------------------------
INSERT INTO `departments` VALUES (1, 'Administration', 'Handles overall administrative support for the division/region.', '2025-08-27 00:41:48', '2025-08-27 00:41:48');
INSERT INTO `departments` VALUES (2, 'Finance', 'Manages financial transactions, budgets, and disbursements.', '2025-08-27 00:41:48', '2025-08-27 00:41:48');
INSERT INTO `departments` VALUES (3, 'Human Resources', 'Oversees personnel, staffing, and employee concerns.', '2025-08-27 00:41:48', '2025-08-27 00:41:48');
INSERT INTO `departments` VALUES (4, 'Curriculum and Instruction', 'Focuses on curriculum development and instruction support.', '2025-08-27 00:41:48', '2025-08-27 00:41:48');
INSERT INTO `departments` VALUES (5, 'Disaster Risk Reduction and Management (DRRM)', 'Responsible for disaster preparedness, response, and monitoring.', '2025-08-27 00:41:48', '2025-08-27 00:41:48');
INSERT INTO `departments` VALUES (6, 'Health and Nutrition', 'Handles school health, feeding, and nutrition programs.', '2025-08-27 00:41:48', '2025-08-27 00:41:48');
INSERT INTO `departments` VALUES (7, 'ICT / Information Technology', 'Provides IT systems management, infrastructure, and support.', '2025-08-27 00:41:48', '2025-08-27 00:41:48');
INSERT INTO `departments` VALUES (8, 'Planning and Research', 'Conducts planning, research, and data analysis for decision making.', '2025-08-27 00:41:48', '2025-08-27 00:41:48');
INSERT INTO `departments` VALUES (9, 'Legal Services', 'Provides legal assistance, compliance, and policy support.', '2025-08-27 00:41:48', '2025-08-27 00:41:48');
INSERT INTO `departments` VALUES (10, 'Supply and Procurement', 'Manages procurement, supplies, and logistics.', '2025-08-27 00:41:48', '2025-08-27 00:41:48');
INSERT INTO `departments` VALUES (11, 'DRRM Operations', 'Manages incident response and logistics', '2025-09-04 07:01:19', '2025-09-04 07:02:25');

-- ----------------------------
-- Table structure for divisions
-- ----------------------------
DROP TABLE IF EXISTS `divisions`;
CREATE TABLE `divisions`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `region_id` bigint UNSIGNED NOT NULL,
  `code` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `divisions_code_unique`(`code` ASC) USING BTREE,
  INDEX `divisions_region_id_foreign`(`region_id` ASC) USING BTREE,
  CONSTRAINT `divisions_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of divisions
-- ----------------------------
INSERT INTO `divisions` VALUES (13, 1, 'MRQ', 'Division of Marinduque', '2025-08-27 00:39:36', '2025-08-27 00:39:36');
INSERT INTO `divisions` VALUES (14, 1, 'OMD', 'Division of Occidental Mindoro', '2025-08-27 00:39:36', '2025-08-27 00:39:36');
INSERT INTO `divisions` VALUES (15, 1, 'OMR', 'Division of Oriental Mindoro', '2025-08-27 00:39:36', '2025-08-27 00:39:36');
INSERT INTO `divisions` VALUES (16, 1, 'PLW', 'Division of Palawan', '2025-08-27 00:39:36', '2025-08-27 00:39:36');
INSERT INTO `divisions` VALUES (17, 1, 'PPC', 'Division of Puerto Princesa City', '2025-08-27 00:39:36', '2025-08-27 00:39:36');
INSERT INTO `divisions` VALUES (18, 1, 'RBL', 'Division of Romblon', '2025-08-27 00:39:36', '2025-08-27 00:39:36');

-- ----------------------------
-- Table structure for evacuation_centers
-- ----------------------------
DROP TABLE IF EXISTS `evacuation_centers`;
CREATE TABLE `evacuation_centers`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `school_id` bigint UNSIGNED NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `capacity` int UNSIGNED NULL DEFAULT NULL,
  `latitude` decimal(10, 7) NULL DEFAULT NULL,
  `longitude` decimal(10, 7) NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `evacuation_centers_school_id_index`(`school_id` ASC) USING BTREE,
  CONSTRAINT `evacuation_centers_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of evacuation_centers
-- ----------------------------
INSERT INTO `evacuation_centers` VALUES (1, 1, 'Boac Civic Center', 'Boac, Marinduque', 800, 13.4465000, 121.8402000, NULL, NULL);
INSERT INTO `evacuation_centers` VALUES (2, 2, 'Santa Cruz Gymnasium', 'Santa Cruz, Marinduque', 600, 13.4724000, 122.0291000, NULL, NULL);
INSERT INTO `evacuation_centers` VALUES (3, 3, 'Gasan Municipal Gym', 'Gasan, Marinduque', 500, 13.3236000, 121.8449000, NULL, NULL);
INSERT INTO `evacuation_centers` VALUES (4, 5, 'Mamburao Municipal Gym', 'Mamburao, Occidental Mindoro', 900, 13.2241000, 120.5962000, NULL, NULL);
INSERT INTO `evacuation_centers` VALUES (5, 6, 'San Jose Sports Complex', 'San Jose, Occidental Mindoro', 1200, 12.3518000, 121.0678000, NULL, NULL);
INSERT INTO `evacuation_centers` VALUES (6, 7, 'Sablayan Covered Court', 'Sablayan, Occidental Mindoro', 700, 12.8349000, 120.7699000, NULL, NULL);
INSERT INTO `evacuation_centers` VALUES (7, 9, 'Calapan City Evacuation Center', 'Calapan City, Oriental Mindoro', 1000, 13.4110000, 121.1809000, NULL, NULL);
INSERT INTO `evacuation_centers` VALUES (8, 12, 'Pinamalayan Civic Center', 'Pinamalayan, Oriental Mindoro', 850, 13.0369000, 121.4886000, NULL, NULL);
INSERT INTO `evacuation_centers` VALUES (9, 15, 'Puerto Princesa City Gym', 'Puerto Princesa City, Palawan', 1500, 9.7623000, 118.7446000, NULL, NULL);
INSERT INTO `evacuation_centers` VALUES (10, 17, 'Taytay Evacuation Center', 'Taytay, Palawan', 700, 10.8205000, 119.5089000, NULL, NULL);
INSERT INTO `evacuation_centers` VALUES (11, 18, 'Coron Multi-Purpose Hall', 'Coron, Palawan', 600, 12.0014000, 120.2065000, NULL, NULL);
INSERT INTO `evacuation_centers` VALUES (12, 21, 'Odiongan Civic Center', 'Odiongan, Romblon', 650, 12.4021000, 122.0024000, NULL, NULL);
INSERT INTO `evacuation_centers` VALUES (13, 21, 'Konoha Elementary School Ground', 'Purok 3, Konoha Village', 5700, 10.7833000, 150.8333000, '2025-09-09 04:03:47', '2025-09-09 04:07:17');

-- ----------------------------
-- Table structure for evacuation_occupancies
-- ----------------------------
DROP TABLE IF EXISTS `evacuation_occupancies`;
CREATE TABLE `evacuation_occupancies`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `incident_id` bigint UNSIGNED NOT NULL,
  `evacuation_center_id` bigint UNSIGNED NOT NULL,
  `households` int UNSIGNED NOT NULL DEFAULT 0,
  `individuals` int UNSIGNED NOT NULL DEFAULT 0,
  `reported_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `evacuation_occupancies_evacuation_center_id_foreign`(`evacuation_center_id` ASC) USING BTREE,
  INDEX `evacuation_occupancies_incident_id_evacuation_center_id_index`(`incident_id` ASC, `evacuation_center_id` ASC) USING BTREE,
  CONSTRAINT `evacuation_occupancies_evacuation_center_id_foreign` FOREIGN KEY (`evacuation_center_id`) REFERENCES `evacuation_centers` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `evacuation_occupancies_incident_id_foreign` FOREIGN KEY (`incident_id`) REFERENCES `incidents` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 57 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of evacuation_occupancies
-- ----------------------------
INSERT INTO `evacuation_occupancies` VALUES (1, 1, 1, 60, 280, '2025-07-16 08:30:00', NULL, NULL);
INSERT INTO `evacuation_occupancies` VALUES (2, 1, 1, 95, 435, '2025-07-16 12:00:00', NULL, NULL);
INSERT INTO `evacuation_occupancies` VALUES (3, 1, 1, 110, 505, '2025-07-16 18:00:00', NULL, NULL);
INSERT INTO `evacuation_occupancies` VALUES (4, 1, 1, 85, 390, '2025-07-17 08:00:00', NULL, NULL);
INSERT INTO `evacuation_occupancies` VALUES (5, 2, 2, 40, 180, '2025-06-21 06:40:00', NULL, NULL);
INSERT INTO `evacuation_occupancies` VALUES (6, 2, 2, 55, 245, '2025-06-21 09:00:00', NULL, NULL);
INSERT INTO `evacuation_occupancies` VALUES (7, 2, 2, 38, 170, '2025-06-21 16:00:00', NULL, NULL);
INSERT INTO `evacuation_occupancies` VALUES (8, 3, 3, 10, 48, '2025-03-12 10:00:00', NULL, NULL);
INSERT INTO `evacuation_occupancies` VALUES (9, 3, 3, 6, 30, '2025-03-12 15:00:00', NULL, NULL);
INSERT INTO `evacuation_occupancies` VALUES (10, 5, 4, 70, 320, '2025-08-10 05:40:00', NULL, NULL);
INSERT INTO `evacuation_occupancies` VALUES (11, 5, 4, 90, 420, '2025-08-10 10:30:00', NULL, NULL);
INSERT INTO `evacuation_occupancies` VALUES (12, 5, 4, 65, 305, '2025-08-11 07:00:00', NULL, NULL);
INSERT INTO `evacuation_occupancies` VALUES (13, 6, 5, 18, 82, '2025-05-04 16:10:00', NULL, NULL);
INSERT INTO `evacuation_occupancies` VALUES (14, 7, 6, 12, 58, '2025-07-02 12:00:00', NULL, NULL);
INSERT INTO `evacuation_occupancies` VALUES (15, 7, 6, 8, 42, '2025-07-03 08:00:00', NULL, NULL);
INSERT INTO `evacuation_occupancies` VALUES (16, 8, 6, 40, 190, '2025-08-18 08:10:00', NULL, NULL);
INSERT INTO `evacuation_occupancies` VALUES (17, 8, 6, 55, 265, '2025-08-18 18:00:00', NULL, NULL);
INSERT INTO `evacuation_occupancies` VALUES (18, 10, 7, 45, 210, '2025-07-23 06:10:00', NULL, NULL);
INSERT INTO `evacuation_occupancies` VALUES (19, 10, 7, 62, 290, '2025-07-23 12:20:00', NULL, NULL);
INSERT INTO `evacuation_occupancies` VALUES (20, 10, 8, 28, 132, '2025-07-23 15:00:00', NULL, NULL);
INSERT INTO `evacuation_occupancies` VALUES (21, 11, 7, 9, 44, '2025-06-03 09:30:00', NULL, NULL);
INSERT INTO `evacuation_occupancies` VALUES (22, 12, 8, 80, 372, '2025-07-16 08:10:00', NULL, NULL);
INSERT INTO `evacuation_occupancies` VALUES (23, 12, 8, 120, 560, '2025-07-16 13:30:00', NULL, NULL);
INSERT INTO `evacuation_occupancies` VALUES (24, 12, 8, 105, 492, '2025-07-17 08:00:00', NULL, NULL);
INSERT INTO `evacuation_occupancies` VALUES (25, 13, 8, 30, 142, '2025-08-03 12:40:00', NULL, NULL);
INSERT INTO `evacuation_occupancies` VALUES (26, 13, 8, 22, 104, '2025-08-03 18:00:00', NULL, NULL);
INSERT INTO `evacuation_occupancies` VALUES (27, 14, 7, 25, 118, '2025-08-12 09:15:00', NULL, NULL);
INSERT INTO `evacuation_occupancies` VALUES (28, 14, 4, 40, 190, '2025-08-12 17:40:00', NULL, NULL);
INSERT INTO `evacuation_occupancies` VALUES (29, 15, 9, 22, 108, '2025-04-19 13:20:00', NULL, NULL);
INSERT INTO `evacuation_occupancies` VALUES (30, 16, 10, 34, 160, '2025-07-30 06:00:00', NULL, NULL);
INSERT INTO `evacuation_occupancies` VALUES (31, 16, 9, 48, 228, '2025-07-31 08:40:00', NULL, NULL);
INSERT INTO `evacuation_occupancies` VALUES (32, 17, 10, 70, 340, '2025-07-16 08:30:00', NULL, NULL);
INSERT INTO `evacuation_occupancies` VALUES (33, 17, 10, 92, 445, '2025-07-16 19:00:00', NULL, NULL);
INSERT INTO `evacuation_occupancies` VALUES (34, 17, 10, 76, 368, '2025-07-17 09:00:00', NULL, NULL);
INSERT INTO `evacuation_occupancies` VALUES (35, 18, 11, 15, 74, '2025-05-06 08:20:00', NULL, NULL);
INSERT INTO `evacuation_occupancies` VALUES (36, 19, 9, 18, 86, '2025-06-25 10:30:00', NULL, NULL);
INSERT INTO `evacuation_occupancies` VALUES (37, 20, 9, 28, 132, '2025-08-14 09:45:00', NULL, NULL);
INSERT INTO `evacuation_occupancies` VALUES (38, 20, 9, 36, 170, '2025-08-14 18:15:00', NULL, NULL);
INSERT INTO `evacuation_occupancies` VALUES (39, 21, 12, 24, 116, '2025-06-11 06:30:00', NULL, NULL);
INSERT INTO `evacuation_occupancies` VALUES (40, 21, 12, 31, 150, '2025-06-11 11:00:00', NULL, NULL);
INSERT INTO `evacuation_occupancies` VALUES (41, 22, 12, 7, 36, '2025-03-22 09:20:00', NULL, NULL);
INSERT INTO `evacuation_occupancies` VALUES (42, 23, 12, 16, 77, '2025-07-16 08:20:00', NULL, NULL);
INSERT INTO `evacuation_occupancies` VALUES (43, 24, 12, 20, 95, '2025-08-02 06:30:00', NULL, NULL);
INSERT INTO `evacuation_occupancies` VALUES (44, 25, 9, 8, 38, '2025-02-18 14:00:00', NULL, NULL);
INSERT INTO `evacuation_occupancies` VALUES (45, 26, 5, 12, 60, '2025-04-09 15:40:00', NULL, NULL);
INSERT INTO `evacuation_occupancies` VALUES (46, 27, 8, 26, 122, '2025-08-07 18:00:00', NULL, NULL);
INSERT INTO `evacuation_occupancies` VALUES (47, 28, 1, 14, 66, '2025-05-27 10:00:00', NULL, NULL);
INSERT INTO `evacuation_occupancies` VALUES (48, 29, 11, 6, 28, '2025-08-09 13:30:00', NULL, NULL);
INSERT INTO `evacuation_occupancies` VALUES (49, 30, 7, 20, 98, '2025-07-15 20:10:00', NULL, NULL);
INSERT INTO `evacuation_occupancies` VALUES (50, 12, 8, 98, 460, '2025-07-17 18:00:00', NULL, NULL);
INSERT INTO `evacuation_occupancies` VALUES (51, 5, 4, 58, 272, '2025-08-11 18:30:00', NULL, NULL);
INSERT INTO `evacuation_occupancies` VALUES (52, 10, 7, 50, 240, '2025-07-24 07:30:00', NULL, NULL);
INSERT INTO `evacuation_occupancies` VALUES (53, 17, 10, 68, 330, '2025-07-17 18:20:00', NULL, NULL);
INSERT INTO `evacuation_occupancies` VALUES (54, 1, 1, 72, 336, '2025-07-17 18:30:00', NULL, NULL);
INSERT INTO `evacuation_occupancies` VALUES (55, 21, 12, 22, 108, '2025-06-12 07:00:00', NULL, NULL);
INSERT INTO `evacuation_occupancies` VALUES (56, 15, 12, 45, 600, '2025-09-09 18:30:00', '2025-09-09 04:08:50', '2025-09-09 04:10:12');

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for incident_attachments
-- ----------------------------
DROP TABLE IF EXISTS `incident_attachments`;
CREATE TABLE `incident_attachments`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `incident_id` bigint UNSIGNED NOT NULL,
  `file_path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_type` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `original_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `incident_attachments_incident_id_index`(`incident_id` ASC) USING BTREE,
  CONSTRAINT `incident_attachments_incident_id_foreign` FOREIGN KEY (`incident_id`) REFERENCES `incidents` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 63 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of incident_attachments
-- ----------------------------
INSERT INTO `incident_attachments` VALUES (1, 1, '/uploads/incidents/1/2025-07-16_roof_damage_1.jpg', 'image/jpeg', 'Roof_Damage_Photo1.jpg', '2025-07-16 08:05:00', '2025-07-16 08:05:00');
INSERT INTO `incident_attachments` VALUES (2, 1, '/uploads/incidents/1/2025-07-16_roof_damage_2.jpg', 'image/jpeg', 'Roof_Damage_Photo2.jpg', '2025-07-16 08:06:00', '2025-07-16 08:06:00');
INSERT INTO `incident_attachments` VALUES (3, 1, '/uploads/incidents/1/2025-07-16_initial_assessment.pdf', 'application/pdf', 'Initial_Assessment_Report.pdf', '2025-07-16 09:10:00', '2025-07-16 09:10:00');
INSERT INTO `incident_attachments` VALUES (4, 2, '/uploads/incidents/2/2025-06-21_flooded_quadrangle.jpg', 'image/jpeg', 'Flooded_Quadrangle.jpg', '2025-06-21 06:20:00', '2025-06-21 06:20:00');
INSERT INTO `incident_attachments` VALUES (5, 2, '/uploads/incidents/2/2025-06-21_water_level_marker.png', 'image/png', 'Water_Level_Marker.png', '2025-06-21 06:25:00', '2025-06-21 06:25:00');
INSERT INTO `incident_attachments` VALUES (6, 3, '/uploads/incidents/3/2025-03-12_gen_set_setup.mp4', 'video/mp4', 'GenSet_Setup.mp4', '2025-03-12 13:15:00', '2025-03-12 13:15:00');
INSERT INTO `incident_attachments` VALUES (7, 4, '/uploads/incidents/4/2025-01-28_road_blocked_1.jpg', 'image/jpeg', 'Road_Blocked_1.jpg', '2025-01-28 07:30:00', '2025-01-28 07:30:00');
INSERT INTO `incident_attachments` VALUES (8, 4, '/uploads/incidents/4/2025-01-28_road_blocked_2.jpg', 'image/jpeg', 'Road_Blocked_2.jpg', '2025-01-28 07:32:00', '2025-01-28 07:32:00');
INSERT INTO `incident_attachments` VALUES (9, 4, '/uploads/incidents/4/2025-01-28_dpwh_coordination.pdf', 'application/pdf', 'DPWH_Coordination_Letter.pdf', '2025-01-28 09:00:00', '2025-01-28 09:00:00');
INSERT INTO `incident_attachments` VALUES (10, 5, '/uploads/incidents/5/2025-08-10_classroom_flood_1.jpg', 'image/jpeg', 'Classroom_Flood_1.jpg', '2025-08-10 05:20:00', '2025-08-10 05:20:00');
INSERT INTO `incident_attachments` VALUES (11, 5, '/uploads/incidents/5/2025-08-10_classroom_flood_2.jpg', 'image/jpeg', 'Classroom_Flood_2.jpg', '2025-08-10 05:22:00', '2025-08-10 05:22:00');
INSERT INTO `incident_attachments` VALUES (12, 6, '/uploads/incidents/6/2025-05-04_storage_room_fire.jpg', 'image/jpeg', 'Storage_Room_Fire.jpg', '2025-05-04 15:10:00', '2025-05-04 15:10:00');
INSERT INTO `incident_attachments` VALUES (13, 6, '/uploads/incidents/6/2025-05-04_bfp_report.pdf', 'application/pdf', 'BFP_Incident_Report.pdf', '2025-05-04 17:45:00', '2025-05-04 17:45:00');
INSERT INTO `incident_attachments` VALUES (14, 7, '/uploads/incidents/7/2025-07-02_dengue_briefing_minutes.pdf', 'application/pdf', 'Dengue_Briefing_Minutes.pdf', '2025-07-02 11:30:00', '2025-07-02 11:30:00');
INSERT INTO `incident_attachments` VALUES (15, 8, '/uploads/incidents/8/2025-08-18_gym_slope_failure_1.jpg', 'image/jpeg', 'Gym_Slope_Failure_1.jpg', '2025-08-18 07:20:00', '2025-08-18 07:20:00');
INSERT INTO `incident_attachments` VALUES (16, 8, '/uploads/incidents/8/2025-08-18_gym_slope_failure_2.jpg', 'image/jpeg', 'Gym_Slope_Failure_2.jpg', '2025-08-18 07:21:00', '2025-08-18 07:21:00');
INSERT INTO `incident_attachments` VALUES (17, 8, '/uploads/incidents/8/2025-08-18_engineer_initial_findings.pdf', 'application/pdf', 'Engineer_Initial_Findings.pdf', '2025-08-18 09:40:00', '2025-08-18 09:40:00');
INSERT INTO `incident_attachments` VALUES (18, 9, '/uploads/incidents/9/2025-02-11_evacuated_students.jpg', 'image/jpeg', 'Evacuated_Students.jpg', '2025-02-11 10:35:00', '2025-02-11 10:35:00');
INSERT INTO `incident_attachments` VALUES (19, 10, '/uploads/incidents/10/2025-07-23_access_road_flood.jpg', 'image/jpeg', 'Access_Road_Flood.jpg', '2025-07-23 05:25:00', '2025-07-23 05:25:00');
INSERT INTO `incident_attachments` VALUES (20, 10, '/uploads/incidents/10/2025-07-23_relief_distribution.mp4', 'video/mp4', 'Relief_Distribution.mp4', '2025-07-23 12:40:00', '2025-07-23 12:40:00');
INSERT INTO `incident_attachments` VALUES (21, 11, '/uploads/incidents/11/2025-06-03_brownout_notice.pdf', 'application/pdf', 'Brownout_Notice.pdf', '2025-06-03 07:55:00', '2025-06-03 07:55:00');
INSERT INTO `incident_attachments` VALUES (22, 12, '/uploads/incidents/12/2025-07-16_roof_panels_missing.jpg', 'image/jpeg', 'Roof_Panels_Missing.jpg', '2025-07-16 07:50:00', '2025-07-16 07:50:00');
INSERT INTO `incident_attachments` VALUES (23, 12, '/uploads/incidents/12/2025-07-16_roofing_materials_request.pdf', 'application/pdf', 'Request_Roofing_Materials.pdf', '2025-07-16 13:20:00', '2025-07-16 13:20:00');
INSERT INTO `incident_attachments` VALUES (24, 13, '/uploads/incidents/13/2025-08-03_classroom_waterline.png', 'image/png', 'Classroom_Waterline.png', '2025-08-03 11:50:00', '2025-08-03 11:50:00');
INSERT INTO `incident_attachments` VALUES (25, 14, '/uploads/incidents/14/2025-08-12_landslide_cut_road.jpg', 'image/jpeg', 'Landslide_Cut_Road.jpg', '2025-08-12 06:40:00', '2025-08-12 06:40:00');
INSERT INTO `incident_attachments` VALUES (26, 14, '/uploads/incidents/14/2025-08-12_bus_alternate_route_map.pdf', 'application/pdf', 'Bus_Alternate_Route_Map.pdf', '2025-08-12 09:10:00', '2025-08-12 09:10:00');
INSERT INTO `incident_attachments` VALUES (27, 15, '/uploads/incidents/15/2025-04-19_canteen_fire_photo.jpg', 'image/jpeg', 'Canteen_Fire_Photo.jpg', '2025-04-19 12:18:00', '2025-04-19 12:18:00');
INSERT INTO `incident_attachments` VALUES (28, 15, '/uploads/incidents/15/2025-04-19_bfp_closure_order.pdf', 'application/pdf', 'BFP_Closure_Order.pdf', '2025-04-19 13:55:00', '2025-04-19 13:55:00');
INSERT INTO `incident_attachments` VALUES (29, 16, '/uploads/incidents/16/2025-07-30_sped_room_flood.jpg', 'image/jpeg', 'SPED_Room_Flood.jpg', '2025-07-30 04:55:00', '2025-07-30 04:55:00');
INSERT INTO `incident_attachments` VALUES (30, 16, '/uploads/incidents/16/2025-07-31_food_pack_distribution.jpg', 'image/jpeg', 'Food_Pack_Distribution.jpg', '2025-07-31 10:40:00', '2025-07-31 10:40:00');
INSERT INTO `incident_attachments` VALUES (31, 17, '/uploads/incidents/17/2025-07-16_shattered_windows.jpg', 'image/jpeg', 'Shattered_Windows.jpg', '2025-07-16 08:00:00', '2025-07-16 08:00:00');
INSERT INTO `incident_attachments` VALUES (32, 17, '/uploads/incidents/17/2025-07-17_temporary_plastic_covers.jpg', 'image/jpeg', 'Temporary_Plastic_Covers.jpg', '2025-07-17 09:35:00', '2025-07-17 09:35:00');
INSERT INTO `incident_attachments` VALUES (33, 18, '/uploads/incidents/18/2025-05-06_flag_ceremony_evacuation.mp4', 'video/mp4', 'Flag_Ceremony_Evacuation.mp4', '2025-05-06 07:45:00', '2025-05-06 07:45:00');
INSERT INTO `incident_attachments` VALUES (34, 19, '/uploads/incidents/19/2025-06-25_health_advisory_poster.png', 'image/png', 'Health_Advisory_Poster.png', '2025-06-25 09:05:00', '2025-06-25 09:05:00');
INSERT INTO `incident_attachments` VALUES (35, 20, '/uploads/incidents/20/2025-08-14_mudslide_warning_tape.jpg', 'image/jpeg', 'Mudslide_Warning_Tape.jpg', '2025-08-14 08:40:00', '2025-08-14 08:40:00');
INSERT INTO `incident_attachments` VALUES (36, 20, '/uploads/incidents/20/2025-08-14_perimeter_crack_detail.jpg', 'image/jpeg', 'Perimeter_Crack_Detail.jpg', '2025-08-14 08:55:00', '2025-08-14 08:55:00');
INSERT INTO `incident_attachments` VALUES (37, 21, '/uploads/incidents/21/2025-06-11_entry_gate_flood.jpg', 'image/jpeg', 'Entry_Gate_Flood.jpg', '2025-06-11 06:10:00', '2025-06-11 06:10:00');
INSERT INTO `incident_attachments` VALUES (38, 22, '/uploads/incidents/22/2025-03-22_brownout_islandwide.jpg', 'image/jpeg', 'Brownout_Islandwide.jpg', '2025-03-22 08:15:00', '2025-03-22 08:15:00');
INSERT INTO `incident_attachments` VALUES (39, 23, '/uploads/incidents/23/2025-07-15_class_suspension_memo.pdf', 'application/pdf', 'Class_Suspension_Memo.pdf', '2025-07-15 20:10:00', '2025-07-15 20:10:00');
INSERT INTO `incident_attachments` VALUES (40, 24, '/uploads/incidents/24/2025-08-02_rockfall_wall_damage.jpg', 'image/jpeg', 'Rockfall_Wall_Damage.jpg', '2025-08-02 05:50:00', '2025-08-02 05:50:00');
INSERT INTO `incident_attachments` VALUES (41, 25, '/uploads/incidents/25/2025-02-18_lab_overheat_strip.jpg', 'image/jpeg', 'Lab_Overheat_Strip.jpg', '2025-02-18 13:20:00', '2025-02-18 13:20:00');
INSERT INTO `incident_attachments` VALUES (42, 25, '/uploads/incidents/25/2025-02-18_electrical_inspection_report.pdf', 'application/pdf', 'Electrical_Inspection_Report.pdf', '2025-02-18 16:10:00', '2025-02-18 16:10:00');
INSERT INTO `incident_attachments` VALUES (43, 26, '/uploads/incidents/26/2025-04-09_evacuation_route_map.png', 'image/png', 'Evacuation_Route_Map.png', '2025-04-09 15:15:00', '2025-04-09 15:15:00');
INSERT INTO `incident_attachments` VALUES (44, 27, '/uploads/incidents/27/2025-08-07_drainage_cleanup_team.jpg', 'image/jpeg', 'Drainage_Cleanup_Team.jpg', '2025-08-07 17:15:00', '2025-08-07 17:15:00');
INSERT INTO `incident_attachments` VALUES (45, 28, '/uploads/incidents/28/2025-05-27_campus_cleanup_drive.jpg', 'image/jpeg', 'Campus_Cleanup_Drive.jpg', '2025-05-27 09:25:00', '2025-05-27 09:25:00');
INSERT INTO `incident_attachments` VALUES (46, 29, '/uploads/incidents/29/2025-08-09_module_printing.jpg', 'image/jpeg', 'Module_Printing.jpg', '2025-08-09 13:10:00', '2025-08-09 13:10:00');
INSERT INTO `incident_attachments` VALUES (47, 30, '/uploads/incidents/30/2025-07-15_preemptive_suspension_notice.pdf', 'application/pdf', 'Preemptive_Suspension_Notice.pdf', '2025-07-15 19:35:00', '2025-07-15 19:35:00');
INSERT INTO `incident_attachments` VALUES (48, 12, '/uploads/incidents/12/2025-07-16_roof_support_bracing.jpg', 'image/jpeg', 'Roof_Support_Bracing.jpg', '2025-07-16 14:05:00', '2025-07-16 14:05:00');
INSERT INTO `incident_attachments` VALUES (49, 5, '/uploads/incidents/5/2025-08-10_flood_depth_gauge.jpg', 'image/jpeg', 'Flood_Depth_Gauge.jpg', '2025-08-10 05:28:00', '2025-08-10 05:28:00');
INSERT INTO `incident_attachments` VALUES (50, 8, '/uploads/incidents/8/2025-08-18_cordon_setup.mp4', 'video/mp4', 'Cordon_Setup.mp4', '2025-08-18 08:05:00', '2025-08-18 08:05:00');
INSERT INTO `incident_attachments` VALUES (51, 17, '/uploads/incidents/17/2025-07-17_glass_delivery_receipt.pdf', 'application/pdf', 'Glass_Delivery_Receipt.pdf', '2025-07-17 10:50:00', '2025-07-17 10:50:00');
INSERT INTO `incident_attachments` VALUES (52, 10, '/uploads/incidents/10/2025-07-23_flood_recession_timelapse.mp4', 'video/mp4', 'Flood_Recession_Timelapse.mp4', '2025-07-23 09:10:00', '2025-07-23 09:10:00');
INSERT INTO `incident_attachments` VALUES (53, 15, '/uploads/incidents/15/2025-04-19_canteen_kitchen_after_cleanup.jpg', 'image/jpeg', 'Canteen_Kitchen_After_Cleanup.jpg', '2025-04-19 16:35:00', '2025-04-19 16:35:00');
INSERT INTO `incident_attachments` VALUES (54, 21, '/uploads/incidents/21/2025-06-11_guardhouse_waterline.jpg', 'image/jpeg', 'Guardhouse_Waterline.jpg', '2025-06-11 06:25:00', '2025-06-11 06:25:00');
INSERT INTO `incident_attachments` VALUES (55, 24, '/uploads/incidents/24/2025-08-02_repair_materials_delivery.jpg', 'image/jpeg', 'Repair_Materials_Delivery.jpg', '2025-08-02 11:15:00', '2025-08-02 11:15:00');
INSERT INTO `incident_attachments` VALUES (56, 6, '/uploads/incidents/6/2025-05-04_fire_origin_socket_closeup.png', 'image/png', 'Fire_Origin_Socket_Closeup.png', '2025-05-04 15:25:00', '2025-05-04 15:25:00');
INSERT INTO `incident_attachments` VALUES (57, 18, '/uploads/incidents/18/2025-05-06_assessment_checklist.pdf', 'application/pdf', 'Assessment_Checklist.pdf', '2025-05-06 10:05:00', '2025-05-06 10:05:00');
INSERT INTO `incident_attachments` VALUES (58, 1, '/uploads/incidents/1/2025-07-16_clearing_ops_team.jpg', 'image/jpeg', 'Clearing_Ops_Team.jpg', '2025-07-16 12:10:00', '2025-07-16 12:10:00');
INSERT INTO `incident_attachments` VALUES (59, 2, '/uploads/incidents/2/2025-06-21_pumps_deployed.jpg', 'image/jpeg', 'Pumps_Deployed.jpg', '2025-06-21 06:45:00', '2025-06-21 06:45:00');
INSERT INTO `incident_attachments` VALUES (60, 4, '/uploads/incidents/4/2025-01-28_barangay_heavy_equipment.jpg', 'image/jpeg', 'Barangay_Heavy_Equipment.jpg', '2025-01-28 10:05:00', '2025-01-28 10:05:00');
INSERT INTO `incident_attachments` VALUES (61, 7, '/uploads/incidents/7/2025-07-02_doh_coordination_letter.pdf', 'application/pdf', 'DOH_Coordination_Letter.pdf', '2025-07-02 11:40:00', '2025-07-02 11:40:00');
INSERT INTO `incident_attachments` VALUES (62, 9, '/uploads/incidents/9/2025-02-11_structural_checklist.pdf', 'application/pdf', 'Structural_Checklist.pdf', '2025-02-11 11:20:00', '2025-02-11 11:20:00');

-- ----------------------------
-- Table structure for incident_status_histories
-- ----------------------------
DROP TABLE IF EXISTS `incident_status_histories`;
CREATE TABLE `incident_status_histories`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `incident_id` bigint UNSIGNED NOT NULL,
  `from_status` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `to_status` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `changed_by_user_id` bigint UNSIGNED NULL DEFAULT NULL,
  `changed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `incident_status_histories_changed_by_user_id_foreign`(`changed_by_user_id` ASC) USING BTREE,
  INDEX `incident_status_histories_incident_id_changed_at_index`(`incident_id` ASC, `changed_at` ASC) USING BTREE,
  CONSTRAINT `incident_status_histories_changed_by_user_id_foreign` FOREIGN KEY (`changed_by_user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT,
  CONSTRAINT `incident_status_histories_incident_id_foreign` FOREIGN KEY (`incident_id`) REFERENCES `incidents` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 48 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of incident_status_histories
-- ----------------------------
INSERT INTO `incident_status_histories` VALUES (1, 1, NULL, 'reported', 'Incident initially reported by school admin.', NULL, '2025-07-16 07:50:00', '2025-09-04 07:39:35', '2025-09-04 07:39:35');
INSERT INTO `incident_status_histories` VALUES (2, 1, 'reported', 'verified', 'Verified by division DRRM officer.', NULL, '2025-07-16 09:00:00', '2025-09-04 07:39:35', '2025-09-04 07:39:35');
INSERT INTO `incident_status_histories` VALUES (3, 1, 'verified', 'responding', 'Roof damage inspection initiated.', NULL, '2025-07-16 11:00:00', '2025-09-04 07:39:35', '2025-09-04 07:39:35');
INSERT INTO `incident_status_histories` VALUES (4, 2, NULL, 'reported', 'Flooding reported after heavy rains.', NULL, '2025-06-21 06:15:00', '2025-09-04 07:39:35', '2025-09-04 07:39:35');
INSERT INTO `incident_status_histories` VALUES (5, 2, 'reported', 'verified', 'Floodwater confirmed in quadrangle.', NULL, '2025-06-21 06:45:00', '2025-09-04 07:39:35', '2025-09-04 07:39:35');
INSERT INTO `incident_status_histories` VALUES (6, 2, 'verified', 'resolved', 'Water subsided, classrooms cleared.', NULL, '2025-06-21 10:30:00', '2025-09-04 07:39:35', '2025-09-04 07:39:35');
INSERT INTO `incident_status_histories` VALUES (7, 3, NULL, 'reported', 'Power outage reported during exam.', NULL, '2025-03-12 09:25:00', '2025-09-04 07:39:35', '2025-09-04 07:39:35');
INSERT INTO `incident_status_histories` VALUES (8, 3, 'reported', 'closed', 'No damage, exams rescheduled.', NULL, '2025-03-12 12:00:00', '2025-09-04 07:39:35', '2025-09-04 07:39:35');
INSERT INTO `incident_status_histories` VALUES (9, 4, NULL, 'reported', 'Landslide reported near school road.', NULL, '2025-01-28 07:20:00', '2025-09-04 07:39:35', '2025-09-04 07:39:35');
INSERT INTO `incident_status_histories` VALUES (10, 4, 'reported', 'verified', 'Debris confirmed by LGU.', NULL, '2025-01-28 08:15:00', '2025-09-04 07:39:35', '2025-09-04 07:39:35');
INSERT INTO `incident_status_histories` VALUES (11, 4, 'verified', 'resolved', 'Road cleared by DPWH crew.', NULL, '2025-01-28 11:45:00', '2025-09-04 07:39:35', '2025-09-04 07:39:35');
INSERT INTO `incident_status_histories` VALUES (12, 5, NULL, 'reported', 'Flood in two classrooms reported.', NULL, '2025-08-10 05:10:00', '2025-09-04 07:39:35', '2025-09-04 07:39:35');
INSERT INTO `incident_status_histories` VALUES (13, 5, 'reported', 'verified', 'Division DRRM validated the report.', NULL, '2025-08-10 06:00:00', '2025-09-04 07:39:35', '2025-09-04 07:39:35');
INSERT INTO `incident_status_histories` VALUES (14, 6, NULL, 'reported', 'Fire in storage room reported.', NULL, '2025-05-04 15:05:00', '2025-09-04 07:39:35', '2025-09-04 07:39:35');
INSERT INTO `incident_status_histories` VALUES (15, 6, 'reported', 'verified', 'Small fire confirmed and controlled.', NULL, '2025-05-04 15:20:00', '2025-09-04 07:39:35', '2025-09-04 07:39:35');
INSERT INTO `incident_status_histories` VALUES (16, 6, 'verified', 'closed', 'Incident officially closed.', NULL, '2025-05-04 18:00:00', '2025-09-04 07:39:35', '2025-09-04 07:39:35');
INSERT INTO `incident_status_histories` VALUES (17, 7, NULL, 'reported', 'Cluster of dengue cases reported.', NULL, '2025-07-02 09:20:00', '2025-09-04 07:39:35', '2025-09-04 07:39:35');
INSERT INTO `incident_status_histories` VALUES (18, 7, 'reported', 'verified', 'Confirmed by local health unit.', NULL, '2025-07-02 11:00:00', '2025-09-04 07:39:35', '2025-09-04 07:39:35');
INSERT INTO `incident_status_histories` VALUES (19, 8, NULL, 'reported', 'Slope failure reported behind gym.', NULL, '2025-08-18 07:10:00', '2025-09-04 07:39:35', '2025-09-04 07:39:35');
INSERT INTO `incident_status_histories` VALUES (20, 8, 'reported', 'verified', 'Area cordoned off for safety.', NULL, '2025-08-18 08:00:00', '2025-09-04 07:39:35', '2025-09-04 07:39:35');
INSERT INTO `incident_status_histories` VALUES (21, 9, NULL, 'reported', 'Tremor felt during classes.', NULL, '2025-02-11 10:30:00', '2025-09-04 07:39:35', '2025-09-04 07:39:35');
INSERT INTO `incident_status_histories` VALUES (22, 9, 'reported', 'verified', 'Structural assessment completed, no damage.', NULL, '2025-02-11 11:30:00', '2025-09-04 07:39:35', '2025-09-04 07:39:35');
INSERT INTO `incident_status_histories` VALUES (23, 9, 'verified', 'closed', 'Incident closed with no issues.', NULL, '2025-02-11 12:00:00', '2025-09-04 07:39:35', '2025-09-04 07:39:35');
INSERT INTO `incident_status_histories` VALUES (24, 10, NULL, 'reported', 'Flooding affected access road.', NULL, '2025-07-23 05:20:00', '2025-09-04 07:39:35', '2025-09-04 07:39:35');
INSERT INTO `incident_status_histories` VALUES (25, 10, 'reported', 'resolved', 'Classes resumed after 1-hour delay.', NULL, '2025-07-23 08:00:00', '2025-09-04 07:39:35', '2025-09-04 07:39:35');
INSERT INTO `incident_status_histories` VALUES (26, 11, NULL, 'reported', 'Scheduled brownout reported.', NULL, '2025-06-03 07:50:00', '2025-09-04 07:39:35', '2025-09-04 07:39:35');
INSERT INTO `incident_status_histories` VALUES (27, 11, 'reported', 'closed', 'Incident closed, no damage.', NULL, '2025-06-03 13:00:00', '2025-09-04 07:39:35', '2025-09-04 07:39:35');
INSERT INTO `incident_status_histories` VALUES (28, 12, NULL, 'reported', 'Roof damage reported due to typhoon.', NULL, '2025-07-16 07:40:00', '2025-09-04 07:39:35', '2025-09-04 07:39:35');
INSERT INTO `incident_status_histories` VALUES (29, 12, 'reported', 'verified', 'Inspection confirmed major roof loss.', NULL, '2025-07-16 10:30:00', '2025-09-04 07:39:35', '2025-09-04 07:39:35');
INSERT INTO `incident_status_histories` VALUES (30, 12, 'verified', 'responding', 'Repair teams dispatched.', NULL, '2025-07-16 13:00:00', '2025-09-04 07:39:35', '2025-09-04 07:39:35');
INSERT INTO `incident_status_histories` VALUES (31, 13, NULL, 'reported', 'Flash flood reached classrooms.', NULL, '2025-08-03 11:45:00', '2025-09-04 07:39:35', '2025-09-04 07:39:35');
INSERT INTO `incident_status_histories` VALUES (32, 13, 'reported', 'verified', 'Damage assessed to furniture.', NULL, '2025-08-03 12:30:00', '2025-09-04 07:39:35', '2025-09-04 07:39:35');
INSERT INTO `incident_status_histories` VALUES (33, 14, NULL, 'reported', 'Road cut by landslide.', NULL, '2025-08-12 06:30:00', '2025-09-04 07:39:35', '2025-09-04 07:39:35');
INSERT INTO `incident_status_histories` VALUES (34, 14, 'reported', 'verified', 'School bus trips suspended.', NULL, '2025-08-12 08:00:00', '2025-09-04 07:39:35', '2025-09-04 07:39:35');
INSERT INTO `incident_status_histories` VALUES (35, 15, NULL, 'reported', 'Canteen fire reported.', NULL, '2025-04-19 12:15:00', '2025-09-04 07:39:35', '2025-09-04 07:39:35');
INSERT INTO `incident_status_histories` VALUES (36, 15, 'reported', 'verified', 'Fire controlled by staff.', NULL, '2025-04-19 12:30:00', '2025-09-04 07:39:35', '2025-09-04 07:39:35');
INSERT INTO `incident_status_histories` VALUES (37, 15, 'verified', 'closed', 'Incident officially closed.', NULL, '2025-04-19 14:00:00', '2025-09-04 07:39:35', '2025-09-04 07:39:35');
INSERT INTO `incident_status_histories` VALUES (38, 16, NULL, 'reported', 'Flooding in SPED classrooms.', NULL, '2025-07-30 04:50:00', '2025-09-04 07:39:35', '2025-09-04 07:39:35');
INSERT INTO `incident_status_histories` VALUES (39, 16, 'reported', 'verified', 'Confirmed by DRRM officer.', NULL, '2025-07-30 06:00:00', '2025-09-04 07:39:35', '2025-09-04 07:39:35');
INSERT INTO `incident_status_histories` VALUES (40, 17, NULL, 'reported', 'Broken windows after typhoon.', NULL, '2025-07-16 07:40:00', '2025-09-04 07:39:35', '2025-09-04 07:39:35');
INSERT INTO `incident_status_histories` VALUES (41, 17, 'reported', 'verified', 'Plastic covers installed as temporary measure.', NULL, '2025-07-16 09:00:00', '2025-09-04 07:39:35', '2025-09-04 07:39:35');
INSERT INTO `incident_status_histories` VALUES (42, 18, NULL, 'reported', 'Tremor during flag ceremony.', NULL, '2025-05-06 07:40:00', '2025-09-04 07:39:35', '2025-09-04 07:39:35');
INSERT INTO `incident_status_histories` VALUES (43, 18, 'reported', 'closed', 'No structural issues detected.', NULL, '2025-05-06 09:00:00', '2025-09-04 07:39:35', '2025-09-04 07:39:35');
INSERT INTO `incident_status_histories` VALUES (44, 19, NULL, 'reported', 'Dengue-like symptoms reported.', NULL, '2025-06-25 09:00:00', '2025-09-04 07:39:35', '2025-09-04 07:39:35');
INSERT INTO `incident_status_histories` VALUES (45, 19, 'reported', 'verified', 'DOH notified of suspected cluster.', NULL, '2025-06-25 11:30:00', '2025-09-04 07:39:35', '2025-09-04 07:39:35');
INSERT INTO `incident_status_histories` VALUES (46, 20, NULL, 'reported', 'Mudslide near school fence.', NULL, '2025-08-14 06:45:00', '2025-09-04 07:39:35', '2025-09-04 07:39:35');
INSERT INTO `incident_status_histories` VALUES (47, 20, 'reported', 'verified', 'Safety line established by LGU.', NULL, '2025-08-14 08:00:00', '2025-09-04 07:39:35', '2025-09-04 07:39:35');

-- ----------------------------
-- Table structure for incident_types
-- ----------------------------
DROP TABLE IF EXISTS `incident_types`;
CREATE TABLE `incident_types`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `incident_types_code_unique`(`code` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of incident_types
-- ----------------------------
INSERT INTO `incident_types` VALUES (1, 'TYPHOON', 'Typhoon', 'Typhoon-related incidents such as strong winds, damage, or storm surge.', '2025-08-27 00:43:06', '2025-08-27 00:43:06');
INSERT INTO `incident_types` VALUES (2, 'FLOOD', 'Flooding', 'Flood incidents inside or around school premises.', '2025-08-27 00:43:06', '2025-08-27 00:43:06');
INSERT INTO `incident_types` VALUES (3, 'EARTHQUAKE', 'Earthquake', 'Earthquake tremors, structural damage, or related hazards.', '2025-08-27 00:43:06', '2025-08-27 00:43:06');
INSERT INTO `incident_types` VALUES (4, 'LANDSLIDE', 'Landslide', 'Soil/rockfall affecting school grounds or access routes.', '2025-08-27 00:43:06', '2025-08-27 00:43:06');
INSERT INTO `incident_types` VALUES (5, 'FIRE', 'Fire', 'Fire-related incidents in classrooms, canteens, or facilities.', '2025-08-27 00:43:06', '2025-08-27 00:43:06');
INSERT INTO `incident_types` VALUES (6, 'POWER_OUT', 'Power Outage', 'Unscheduled or extended power interruption incidents.', '2025-08-27 00:43:06', '2025-08-27 00:43:06');
INSERT INTO `incident_types` VALUES (7, 'DENGUE', 'Dengue Cluster', 'Reported dengue cases or clusters among students/staff.', '2025-08-27 00:43:06', '2025-08-27 00:43:06');
INSERT INTO `incident_types` VALUES (8, 'VOLCANIC', 'Volcanic Activity', 'Ash fall or eruption effects (if affecting nearby provinces).', '2025-08-27 00:43:06', '2025-08-27 00:43:06');
INSERT INTO `incident_types` VALUES (9, 'OTHER', 'Other', 'Other incidents not covered by main categories.', '2025-08-27 00:43:06', '2025-08-27 00:43:06');

-- ----------------------------
-- Table structure for incidents
-- ----------------------------
DROP TABLE IF EXISTS `incidents`;
CREATE TABLE `incidents`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `ref_no` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_id` bigint UNSIGNED NOT NULL,
  `school_id` bigint UNSIGNED NULL DEFAULT NULL,
  `reported_by_user_id` bigint UNSIGNED NULL DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `status` enum('open','in_progress','resolved','closed','dismissed') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `severity` enum('low','medium','high','critical') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'medium',
  `occurred_at` datetime NOT NULL,
  `reported_at` datetime NOT NULL,
  `latitude` decimal(9, 6) NULL DEFAULT NULL,
  `longitude` decimal(9, 6) NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `incidents_ref_no_unique`(`ref_no` ASC) USING BTREE,
  INDEX `incidents_reported_by_user_id_foreign`(`reported_by_user_id` ASC) USING BTREE,
  INDEX `idx_incidents_school_id`(`school_id` ASC) USING BTREE,
  INDEX `idx_incidents_type_id`(`type_id` ASC) USING BTREE,
  INDEX `idx_incidents_status`(`status` ASC) USING BTREE,
  INDEX `idx_incidents_occurred_at`(`occurred_at` ASC) USING BTREE,
  CONSTRAINT `incidents_reported_by_user_id_foreign` FOREIGN KEY (`reported_by_user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT,
  CONSTRAINT `incidents_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT,
  CONSTRAINT `incidents_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `incident_types` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 31 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of incidents
-- ----------------------------
INSERT INTO `incidents` VALUES (1, 'INC-2025-0001', 1, 1, NULL, 'Strong winds from Typhoon Carina', 'Classrooms reported minor roof damage after overnight strong winds.', 'in_progress', 'high', '2025-07-16 02:10:00', '2025-07-16 07:45:00', 13.446100, 121.839800, '2025-08-27 00:43:30', '2025-08-27 00:43:30');
INSERT INTO `incidents` VALUES (2, 'INC-2025-0002', 2, 2, NULL, 'Flooding at school grounds', 'Half of the quadrangle submerged; temporary suspension of morning classes.', 'resolved', 'medium', '2025-06-21 05:30:00', '2025-06-21 06:10:00', 13.472000, 122.028700, '2025-08-27 00:43:30', '2025-08-27 00:43:30');
INSERT INTO `incidents` VALUES (3, 'INC-2025-0003', 6, 3, NULL, 'Power outage during exams', 'Power disruption affected Grade 6 exam schedule; rescheduled to afternoon.', 'closed', 'low', '2025-03-12 09:05:00', '2025-03-12 09:20:00', 13.323300, 121.844300, '2025-08-27 00:43:30', '2025-08-27 00:43:30');
INSERT INTO `incidents` VALUES (4, 'INC-2025-0004', 4, 4, NULL, 'Minor landslide near access road', 'Debris partially blocked the access road; LGU cleared within 3 hours.', 'resolved', 'medium', '2025-01-28 06:30:00', '2025-01-28 07:15:00', 13.263000, 121.983000, '2025-08-27 00:43:30', '2025-08-27 00:43:30');
INSERT INTO `incidents` VALUES (5, 'INC-2025-0005', 2, 5, NULL, 'Localized flooding after heavy rains', 'Water entered two classrooms; learning materials moved to higher shelves.', 'in_progress', 'medium', '2025-08-10 04:20:00', '2025-08-10 05:05:00', 13.223600, 120.596700, '2025-08-27 00:43:30', '2025-08-27 00:43:30');
INSERT INTO `incidents` VALUES (6, 'INC-2025-0006', 5, 6, NULL, 'Electrical fire in storage room', 'Small fire due to faulty extension cord; extinguished by staff, no injuries.', 'closed', 'high', '2025-05-04 14:40:00', '2025-05-04 15:00:00', 12.352000, 121.067300, '2025-08-27 00:43:30', '2025-08-27 00:43:30');
INSERT INTO `incidents` VALUES (7, 'INC-2025-0007', 7, 7, NULL, 'Dengue cluster monitoring', 'Four suspected dengue cases in Grade 9; campus cleanup and DOH coordination.', 'in_progress', 'medium', '2025-07-02 08:00:00', '2025-07-02 09:10:00', 12.834700, 120.769300, '2025-08-27 00:43:30', '2025-08-27 00:43:30');
INSERT INTO `incidents` VALUES (8, 'INC-2025-0008', 4, 8, NULL, 'Slope failure behind gym', 'Slope erosion after continuous rains; area cordoned, awaiting DPWH inspection.', 'open', 'high', '2025-08-18 06:50:00', '2025-08-18 07:05:00', 12.568300, 120.911900, '2025-08-27 00:43:30', '2025-08-27 00:43:30');
INSERT INTO `incidents` VALUES (9, 'INC-2025-0009', 3, 9, NULL, 'M4.2 tremor felt during classes', 'No structural damage noted; drop-cover-hold executed successfully.', 'closed', 'low', '2025-02-11 10:22:00', '2025-02-11 10:40:00', 13.410600, 121.180300, '2025-08-27 00:43:30', '2025-08-27 00:43:30');
INSERT INTO `incidents` VALUES (10, 'INC-2025-0010', 2, 10, NULL, 'River overflow affects access road', 'Students rerouted; classes continued with minor delay.', 'resolved', 'medium', '2025-07-23 05:10:00', '2025-07-23 05:45:00', 13.323100, 121.305900, '2025-08-27 00:43:30', '2025-08-27 00:43:30');
INSERT INTO `incidents` VALUES (11, 'INC-2025-0011', 6, 11, NULL, 'Extended power interruption', 'No electricity for six hours; afternoon classes shifted to modules.', 'closed', 'low', '2025-06-03 07:30:00', '2025-06-03 08:00:00', 13.183000, 121.205100, '2025-08-27 00:43:30', '2025-08-27 00:43:30');
INSERT INTO `incidents` VALUES (12, 'INC-2025-0012', 1, 12, NULL, 'Typhoon-induced roof damage', 'Two classrooms lost roof sheets; request for emergency repair submitted.', 'in_progress', 'high', '2025-07-16 03:20:00', '2025-07-16 07:30:00', 13.036600, 121.488000, '2025-08-27 00:43:30', '2025-08-27 00:43:30');
INSERT INTO `incidents` VALUES (13, 'INC-2025-0013', 2, 13, NULL, 'Flash flood in nearby creek', 'Water rose rapidly; early dismissal implemented for safety.', 'resolved', 'medium', '2025-08-03 11:35:00', '2025-08-03 11:55:00', 12.715200, 121.366400, '2025-08-27 00:43:30', '2025-08-27 00:43:30');
INSERT INTO `incidents` VALUES (14, 'INC-2025-0014', 4, 14, NULL, 'Road cut along hillside route', 'School bus trips suspended pending clearing operations.', 'open', 'high', '2025-08-12 06:15:00', '2025-08-12 06:45:00', 12.585200, 121.520500, '2025-08-27 00:43:30', '2025-08-27 00:43:30');
INSERT INTO `incidents` VALUES (15, 'INC-2025-0015', 5, 15, NULL, 'Minor canteen fire', 'Cooking oil flare-up; extinguisher used; canteen closed for inspection.', 'closed', 'medium', '2025-04-19 12:05:00', '2025-04-19 12:20:00', 9.761900, 118.744100, '2025-08-27 00:43:30', '2025-08-27 00:43:30');
INSERT INTO `incidents` VALUES (16, 'INC-2025-0016', 2, 16, NULL, 'Low-lying rooms inundated', 'Two SPED rooms affected; learning materials relocated to safe storage.', 'resolved', 'medium', '2025-07-30 04:40:00', '2025-07-30 05:05:00', 10.333400, 119.345600, '2025-08-27 00:43:30', '2025-08-27 00:43:30');
INSERT INTO `incidents` VALUES (17, 'INC-2025-0017', 1, 17, NULL, 'Damaged windows after typhoon', 'Multiple jalousie panes shattered; temporary plastic covers installed.', 'in_progress', 'high', '2025-07-16 01:50:00', '2025-07-16 07:35:00', 10.820000, 119.508400, '2025-08-27 00:43:30', '2025-08-27 00:43:30');
INSERT INTO `incidents` VALUES (18, 'INC-2025-0018', 3, 18, NULL, 'Light tremor during flag ceremony', 'No visible damage; structural check requested from LGU.', 'resolved', 'low', '2025-05-06 07:30:00', '2025-05-06 07:55:00', 12.000900, 120.206000, '2025-08-27 00:43:30', '2025-08-27 00:43:30');
INSERT INTO `incidents` VALUES (19, 'INC-2025-0019', 7, 19, NULL, 'Increase in dengue-like symptoms', 'Five students absent with fever; barangay health center notified.', 'in_progress', 'medium', '2025-06-25 08:10:00', '2025-06-25 09:00:00', 11.196400, 119.407000, '2025-08-27 00:43:30', '2025-08-27 00:43:30');
INSERT INTO `incidents` VALUES (20, 'INC-2025-0020', 4, 20, NULL, 'Mudslide near perimeter fence', 'Safety line set; classrooms far from area remain open.', 'open', 'medium', '2025-08-14 06:35:00', '2025-08-14 06:50:00', 8.778800, 117.834900, '2025-08-27 00:43:30', '2025-08-27 00:43:30');
INSERT INTO `incidents` VALUES (21, 'INC-2025-0021', 2, 21, NULL, 'Street flooding affects entry gate', 'Morning arrival delayed by 30 minutes; no damage inside campus.', 'resolved', 'low', '2025-06-11 06:00:00', '2025-06-11 06:20:00', 12.401700, 122.001900, '2025-08-27 00:43:30', '2025-08-27 00:43:30');
INSERT INTO `incidents` VALUES (22, 'INC-2025-0022', 6, 22, NULL, 'Island-wide brownout', 'Whole island experienced scheduled power maintenance; classes adjusted.', 'closed', 'low', '2025-03-22 08:00:00', '2025-03-22 08:10:00', 12.575300, 122.270900, '2025-08-27 00:43:30', '2025-08-27 00:43:30');
INSERT INTO `incidents` VALUES (23, 'INC-2025-0023', 1, 23, NULL, 'Typhoon signal #2—preventive suspension', 'Local DRRMC declared preventive class suspension; campus secured.', 'closed', 'medium', '2025-07-15 20:00:00', '2025-07-15 20:20:00', 12.410000, 122.671300, '2025-08-27 00:43:30', '2025-08-27 00:43:30');
INSERT INTO `incidents` VALUES (24, 'INC-2025-0024', 4, 24, NULL, 'Rockfall on mountain road', 'Alternate route used for school service vans; no injuries.', 'resolved', 'medium', '2025-08-02 05:40:00', '2025-08-02 06:05:00', 12.366700, 122.650000, '2025-08-27 00:43:30', '2025-08-27 00:43:30');
INSERT INTO `incidents` VALUES (25, 'INC-2025-0025', 5, 15, NULL, 'Laboratory equipment overheated', 'Old power strip overheated; breaker tripped; safety briefing scheduled.', 'closed', 'medium', '2025-02-18 13:10:00', '2025-02-18 13:25:00', 9.761900, 118.744100, '2025-08-27 00:43:30', '2025-08-27 00:43:30');
INSERT INTO `incidents` VALUES (26, 'INC-2025-0026', 3, 6, NULL, 'Aftershock felt during PE', 'Students evacuated to open grounds; classes resumed after inspection.', 'closed', 'low', '2025-04-09 15:05:00', '2025-04-09 15:20:00', 12.352000, 121.067300, '2025-08-27 00:43:30', '2025-08-27 00:43:30');
INSERT INTO `incidents` VALUES (27, 'INC-2025-0027', 2, 12, NULL, 'Drainage overflow after squall line', 'Water receded in 40 minutes; maintenance cleared debris.', 'resolved', 'medium', '2025-08-07 16:50:00', '2025-08-07 17:10:00', 13.036600, 121.488000, '2025-08-27 00:43:30', '2025-08-27 00:43:30');
INSERT INTO `incidents` VALUES (28, 'INC-2025-0028', 7, 1, NULL, 'Two dengue positives in Grade 5', 'Advised 4S strategy; intensified campus clean-up and larval survey.', 'in_progress', 'medium', '2025-05-27 08:30:00', '2025-05-27 09:15:00', 13.446100, 121.839800, '2025-08-27 00:43:30', '2025-08-27 00:43:30');
INSERT INTO `incidents` VALUES (29, 'INC-2025-0029', 6, 18, NULL, 'Unscheduled power interruption', 'Learning continuity ensured via printed modules for afternoon shift.', 'closed', 'low', '2025-08-09 13:00:00', '2025-08-09 13:05:00', 12.000900, 120.206000, '2025-08-27 00:43:30', '2025-08-27 00:43:30');
INSERT INTO `incidents` VALUES (30, 'INC-2025-0030', 1, 11, NULL, 'Pre-emptive class suspension', 'Governor announced suspension; school activated preparedness checklist.', 'closed', 'medium', '2025-07-15 19:30:00', '2025-07-15 19:45:00', 13.183000, 121.205100, '2025-08-27 00:43:30', '2025-08-27 00:43:30');

-- ----------------------------
-- Table structure for job_batches
-- ----------------------------
DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE `job_batches`  (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `cancelled_at` int NULL DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of job_batches
-- ----------------------------

-- ----------------------------
-- Table structure for jobs
-- ----------------------------
DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED NULL DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `jobs_queue_index`(`queue` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of jobs
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 24 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '0001_01_01_000001_create_cache_table', 1);
INSERT INTO `migrations` VALUES (2, '0001_01_01_000002_create_jobs_table', 1);
INSERT INTO `migrations` VALUES (3, '2025_08_24_122909_create_roles_table', 1);
INSERT INTO `migrations` VALUES (4, '2025_08_24_122927_create_departments_table', 1);
INSERT INTO `migrations` VALUES (5, '2025_08_24_124004_create_regions_table', 1);
INSERT INTO `migrations` VALUES (6, '2025_08_24_124005_create_divisions_table', 1);
INSERT INTO `migrations` VALUES (7, '2025_08_24_124007_create_schools_table', 1);
INSERT INTO `migrations` VALUES (8, '2025_08_24_124008_create_users_table', 1);
INSERT INTO `migrations` VALUES (9, '2025_08_24_133056_create_sessions_table', 1);
INSERT INTO `migrations` VALUES (10, '2025_08_24_133057_create_incident_types_table', 1);
INSERT INTO `migrations` VALUES (11, '2025_08_24_133534_create_incidents_table', 1);
INSERT INTO `migrations` VALUES (12, '2025_08_25_000100_create_incident_attachments_table', 1);
INSERT INTO `migrations` VALUES (13, '2025_08_25_000110_create_incident_status_histories_table', 1);
INSERT INTO `migrations` VALUES (14, '2025_08_25_000120_create_damage_assessments_table', 1);
INSERT INTO `migrations` VALUES (15, '2025_08_25_000130_create_assistance_table', 1);
INSERT INTO `migrations` VALUES (16, '2025_08_25_000140_create_affected_populations_table', 1);
INSERT INTO `migrations` VALUES (17, '2025_08_25_000150_create_evacuation_centers_table', 1);
INSERT INTO `migrations` VALUES (18, '2025_08_25_000160_create_evacuation_occupancies_table', 1);
INSERT INTO `migrations` VALUES (19, '2025_08_27_003033_create_oauth_auth_codes_table', 2);
INSERT INTO `migrations` VALUES (20, '2025_08_27_003034_create_oauth_access_tokens_table', 2);
INSERT INTO `migrations` VALUES (21, '2025_08_27_003035_create_oauth_refresh_tokens_table', 2);
INSERT INTO `migrations` VALUES (22, '2025_08_27_003036_create_oauth_clients_table', 2);
INSERT INTO `migrations` VALUES (23, '2025_08_27_003037_create_oauth_personal_access_clients_table', 2);

-- ----------------------------
-- Table structure for oauth_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `oauth_access_tokens`;
CREATE TABLE `oauth_access_tokens`  (
  `id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NULL DEFAULT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `scopes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `oauth_access_tokens_user_id_index`(`user_id` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of oauth_access_tokens
-- ----------------------------
INSERT INTO `oauth_access_tokens` VALUES ('54c73fd76b8ce0931aae61848ec0938591aaa8cd774ceadd8cac8e4c2a8f1438bcd27d76af966fc0', 3, 1, 'Personal Access Token', '[]', 0, '2025-09-04 06:53:43', '2025-09-04 06:53:43', '2026-09-04 06:53:43');
INSERT INTO `oauth_access_tokens` VALUES ('89191d3b0c891634ac84a2481e97d579e4591719b5ef88d1818a8d0f0a4c64ebf5bfac43800b2824', 3, 1, 'Personal Access Token', '[]', 0, '2025-09-08 07:37:21', '2025-09-08 07:37:21', '2026-09-08 07:37:21');
INSERT INTO `oauth_access_tokens` VALUES ('8fe9aee13da039732736682af02279de3fb6e07446bd96cf50a5b55059cf44cadcca2c529cba8b6a', 3, 1, 'Personal Access Token', '[]', 0, '2025-08-27 00:45:40', '2025-08-27 00:45:40', '2026-08-27 00:45:40');
INSERT INTO `oauth_access_tokens` VALUES ('953978d187a8203c3bb2fcb546a87553f523fb3a9e3bc765495482f2f60bc6a6be931a03c617a27c', 3, 1, 'Personal Access Token', '[]', 0, '2025-08-27 00:46:28', '2025-08-27 00:46:28', '2026-08-27 00:46:28');
INSERT INTO `oauth_access_tokens` VALUES ('a9ab36b135e11a060a72249094dc59681354ac0508e3c6ed449a43652e4a08fb3b448d9a1779fe34', 3, 1, 'Personal Access Token', '[]', 0, '2025-08-27 00:49:53', '2025-08-27 00:49:53', '2026-08-27 00:49:53');
INSERT INTO `oauth_access_tokens` VALUES ('cc2fd1393ae3ea8db58f4e7f26912fec540b1b67a2b9642eea8c050e28eb8495e908dd358aed4ebf', 3, 1, 'Personal Access Token', '[]', 0, '2025-08-27 00:47:43', '2025-08-27 00:47:43', '2026-08-27 00:47:43');
INSERT INTO `oauth_access_tokens` VALUES ('dae06dc41d40667a0d0ba6fba688eb6c35148a076c93ea73302e5b1ff5ad521161ccef4df4d24adc', 3, 1, 'Personal Access Token', '[]', 0, '2025-08-27 00:52:25', '2025-08-27 00:52:25', '2026-08-27 00:52:25');

-- ----------------------------
-- Table structure for oauth_auth_codes
-- ----------------------------
DROP TABLE IF EXISTS `oauth_auth_codes`;
CREATE TABLE `oauth_auth_codes`  (
  `id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `scopes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `oauth_auth_codes_user_id_index`(`user_id` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of oauth_auth_codes
-- ----------------------------

-- ----------------------------
-- Table structure for oauth_clients
-- ----------------------------
DROP TABLE IF EXISTS `oauth_clients`;
CREATE TABLE `oauth_clients`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `provider` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `redirect` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `oauth_clients_user_id_index`(`user_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of oauth_clients
-- ----------------------------
INSERT INTO `oauth_clients` VALUES (1, NULL, 'Laravel Personal Access Client', '2i3El2Bh1sfydCYNo5n1SPIOVg8fDk1pfcOGhudO', NULL, 'http://localhost', 1, 0, 0, '2025-08-27 00:30:41', '2025-08-27 00:30:41');
INSERT INTO `oauth_clients` VALUES (2, NULL, 'Laravel Password Grant Client', 'lkSSMGfeaDBu2ovrnlYy7EPj6uRD1KAWMSEu6BJI', 'users', 'http://localhost', 0, 1, 0, '2025-08-27 00:30:41', '2025-08-27 00:30:41');

-- ----------------------------
-- Table structure for oauth_personal_access_clients
-- ----------------------------
DROP TABLE IF EXISTS `oauth_personal_access_clients`;
CREATE TABLE `oauth_personal_access_clients`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `client_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of oauth_personal_access_clients
-- ----------------------------
INSERT INTO `oauth_personal_access_clients` VALUES (1, 1, '2025-08-27 00:30:41', '2025-08-27 00:30:41');

-- ----------------------------
-- Table structure for oauth_refresh_tokens
-- ----------------------------
DROP TABLE IF EXISTS `oauth_refresh_tokens`;
CREATE TABLE `oauth_refresh_tokens`  (
  `id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `oauth_refresh_tokens_access_token_id_index`(`access_token_id` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of oauth_refresh_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for regions
-- ----------------------------
DROP TABLE IF EXISTS `regions`;
CREATE TABLE `regions`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `regions_code_unique`(`code` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of regions
-- ----------------------------
INSERT INTO `regions` VALUES (1, 'IV-B', 'MIMAROPA', '2025-08-27 00:37:31', '2025-08-27 00:37:31');

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `roles_name_unique`(`name` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'System Administrator', 'Full access to the system, manage all configurations and users.', '2025-08-27 00:46:05', '2025-08-27 00:46:05');
INSERT INTO `roles` VALUES (2, 'Regional DRRM Coordinator', 'Oversees disaster-related incidents and responses across the entire region.', '2025-08-27 00:46:05', '2025-08-27 00:46:05');
INSERT INTO `roles` VALUES (3, 'Division DRRM Officer', 'Manages incidents and responses within the division level.', '2025-08-27 00:46:05', '2025-08-27 00:46:05');
INSERT INTO `roles` VALUES (4, 'School Administrator', 'Manages incidents, staff, and reporting within their school.', '2025-08-27 00:46:05', '2025-08-27 00:46:05');
INSERT INTO `roles` VALUES (5, 'Department Head', 'Supervises department staff, verifies and escalates incident reports.', '2025-08-27 00:46:05', '2025-08-27 00:46:05');
INSERT INTO `roles` VALUES (6, 'Staff', 'Regular employee who can report and view incidents.', '2025-08-27 00:46:05', '2025-08-27 00:46:05');
INSERT INTO `roles` VALUES (7, 'Public User', 'External user with limited access, can file public incident reports.', '2025-08-27 00:46:05', '2025-08-27 00:46:05');

-- ----------------------------
-- Table structure for schools
-- ----------------------------
DROP TABLE IF EXISTS `schools`;
CREATE TABLE `schools`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `division_id` bigint UNSIGNED NOT NULL,
  `school_id_code` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `contact_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `contact_phone` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `enrollment` int NULL DEFAULT NULL,
  `latitude` decimal(10, 7) NULL DEFAULT NULL,
  `longitude` decimal(10, 7) NULL DEFAULT NULL,
  `risk_status` enum('none','flood','earthquake','typhoon','multi') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `schools_school_id_code_unique`(`school_id_code` ASC) USING BTREE,
  INDEX `schools_division_id_foreign`(`division_id` ASC) USING BTREE,
  CONSTRAINT `schools_division_id_foreign` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 25 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of schools
-- ----------------------------
INSERT INTO `schools` VALUES (1, 13, 'MRQ-0001', 'Boac Central School', 'Boac, Marinduque', 'boac.central@deped.gov.ph', '+63-42-332-1101', 1650, 13.4461000, 121.8398000, 'none', NULL, NULL);
INSERT INTO `schools` VALUES (2, 13, 'MRQ-0002', 'Santa Cruz National High School', 'Santa Cruz, Marinduque', 'scnhs@deped.gov.ph', '+63-42-321-7788', 2100, 13.4720000, 122.0287000, 'typhoon', NULL, NULL);
INSERT INTO `schools` VALUES (3, 13, 'MRQ-0003', 'Gasan West Elementary School', 'Gasan, Marinduque', 'gasan.wes@deped.gov.ph', '+63-42-325-6003', 720, 13.3233000, 121.8443000, 'none', NULL, NULL);
INSERT INTO `schools` VALUES (4, 13, 'MRQ-0004', 'Buenavista National High School', 'Buenavista, Marinduque', 'bnhs@deped.gov.ph', '+63-42-333-2212', 950, 13.2630000, 121.9830000, 'typhoon', NULL, NULL);
INSERT INTO `schools` VALUES (5, 14, 'OMD-0101', 'Mamburao Central School', 'Mamburao, Occidental Mindoro', 'mamburao.cs@deped.gov.ph', '+63-43-711-2001', 1300, 13.2236000, 120.5967000, 'none', NULL, NULL);
INSERT INTO `schools` VALUES (6, 14, 'OMD-0102', 'San Jose National High School', 'San Jose, Occidental Mindoro', 'sjnshs@deped.gov.ph', '+63-43-491-7777', 3800, 12.3520000, 121.0673000, 'typhoon', NULL, NULL);
INSERT INTO `schools` VALUES (7, 14, 'OMD-0103', 'Sablayan National Comprehensive High School', 'Sablayan, Occidental Mindoro', 'snchs@deped.gov.ph', '+63-43-458-9900', 2900, 12.8347000, 120.7693000, 'flood', NULL, NULL);
INSERT INTO `schools` VALUES (8, 14, 'OMD-0104', 'Calintaan National High School', 'Calintaan, Occidental Mindoro', 'calintaan.nhs@deped.gov.ph', '+63-43-456-8801', 1100, 12.5683000, 120.9119000, 'multi', NULL, NULL);
INSERT INTO `schools` VALUES (9, 15, 'OMR-0201', 'Calapan City Science High School', 'Calapan City, Oriental Mindoro', 'calapansci@deped.gov.ph', '+63-43-288-5566', 1600, 13.4106000, 121.1803000, 'none', NULL, NULL);
INSERT INTO `schools` VALUES (10, 15, 'OMR-0202', 'Naujan Academy', 'Naujan, Oriental Mindoro', 'naujan.acad@deped.gov.ph', '+63-43-279-1122', 1200, 13.3231000, 121.3059000, 'flood', NULL, NULL);
INSERT INTO `schools` VALUES (11, 15, 'OMR-0203', 'Victoria National High School', 'Victoria, Oriental Mindoro', 'victoria.nhs@deped.gov.ph', '+63-43-286-7000', 2100, 13.1830000, 121.2051000, 'flood', NULL, NULL);
INSERT INTO `schools` VALUES (12, 15, 'OMR-0204', 'Pinamalayan National High School', 'Pinamalayan, Oriental Mindoro', 'pinamalayan.nhs@deped.gov.ph', '+63-43-283-4456', 3400, 13.0366000, 121.4880000, 'typhoon', NULL, NULL);
INSERT INTO `schools` VALUES (13, 15, 'OMR-0205', 'Bongabong Central School', 'Bongabong, Oriental Mindoro', 'bongabong.cs@deped.gov.ph', '+63-43-289-9011', 980, 12.7152000, 121.3664000, 'multi', NULL, NULL);
INSERT INTO `schools` VALUES (14, 15, 'OMR-0206', 'Roxas National Comprehensive High School (Mindoro)', 'Roxas, Oriental Mindoro', 'roxas.mindoro@deped.gov.ph', '+63-43-290-3311', 2500, 12.5852000, 121.5205000, 'multi', NULL, NULL);
INSERT INTO `schools` VALUES (15, 16, 'PLW-0301', 'Puerto Princesa City National High School', 'Puerto Princesa City, Palawan', 'ppcnhs@deped.gov.ph', '+63-48-433-8811', 7000, 9.7619000, 118.7441000, 'none', NULL, NULL);
INSERT INTO `schools` VALUES (16, 16, 'PLW-0302', 'Roxas National High School (Palawan)', 'Roxas, Palawan', 'roxas.palawan@deped.gov.ph', '+63-48-723-1122', 1800, 10.3334000, 119.3456000, 'typhoon', NULL, NULL);
INSERT INTO `schools` VALUES (17, 16, 'PLW-0303', 'Taytay National High School', 'Taytay, Palawan', 'taytay.nhs@deped.gov.ph', '+63-48-251-7700', 2200, 10.8200000, 119.5084000, 'typhoon', NULL, NULL);
INSERT INTO `schools` VALUES (18, 17, 'PLW-0304', 'Coron School of Fisheries', 'Coron, Palawan', 'coron.sof@deped.gov.ph', '+63-48-723-6600', 900, 12.0009000, 120.2060000, 'typhoon', NULL, NULL);
INSERT INTO `schools` VALUES (19, 17, 'PLW-0305', 'El Nido National High School', 'El Nido, Palawan', 'elnido.nhs@deped.gov.ph', '+63-48-723-8899', 1500, 11.1964000, 119.4070000, 'typhoon', NULL, NULL);
INSERT INTO `schools` VALUES (20, 17, 'PLW-0306', 'Brooke’s Point National High School', 'Brooke’s Point, Palawan', 'brookespoint.nhs@deped.gov.ph', '+63-48-741-5501', 2400, 8.7788000, 117.8349000, 'multi', NULL, NULL);
INSERT INTO `schools` VALUES (21, 18, 'RBL-0401', 'Odiongan National High School', 'Odiongan, Romblon', 'odiongan.nhs@deped.gov.ph', '+63-42-567-7701', 2600, 12.4017000, 122.0019000, 'flood', NULL, NULL);
INSERT INTO `schools` VALUES (22, 18, 'RBL-0402', 'Romblon National High School', 'Romblon, Romblon', 'romblon.nhs@deped.gov.ph', '+63-42-507-8890', 1900, 12.5753000, 122.2709000, 'typhoon', NULL, NULL);
INSERT INTO `schools` VALUES (23, 18, 'RBL-0403', 'San Fernando National High School (Sibuyan)', 'San Fernando, Romblon', 'sanfernando.sibuyan@deped.gov.ph', '+63-42-555-9001', 1200, 12.4100000, 122.6713000, 'multi', NULL, NULL);
INSERT INTO `schools` VALUES (24, 18, 'RBL-0404', 'Cajidiocan National High School', 'Cajidiocan, Romblon', 'cajidiocan.nhs@deped.gov.ph', '+63-42-556-7788', 1050, 12.3667000, 122.6500000, 'multi', NULL, NULL);

-- ----------------------------
-- Table structure for sessions
-- ----------------------------
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions`  (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NULL DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `sessions_user_id_index`(`user_id` ASC) USING BTREE,
  INDEX `sessions_last_activity_index`(`last_activity` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of sessions
-- ----------------------------
INSERT INTO `sessions` VALUES ('g4YtX1yDywu7vJl57hRk0dCG1hGbMyANu4tbnsA2', NULL, '127.0.0.1', 'PostmanRuntime/7.45.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOHpxUDRtSTF0ZmZRS3B6RUdWeEZBSXNUN1NLSHgzeXVESUVBWVZrbyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1757318256);
INSERT INTO `sessions` VALUES ('uMbYZcpI0bQNP0shrC14vxCWtUpL9GhzfqSPBkG6', NULL, '127.0.0.1', 'PostmanRuntime/7.45.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiN3R1dk9aQ2tQemF1Q1pBWHpEcTJJTXl5SGIwUXFrdW43TVhDd0ZPTyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1757390770);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_id` bigint UNSIGNED NULL DEFAULT NULL,
  `role_id` bigint UNSIGNED NULL DEFAULT NULL,
  `department_id` bigint UNSIGNED NULL DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email` ASC) USING BTREE,
  UNIQUE INDEX `users_username_unique`(`username` ASC) USING BTREE,
  INDEX `users_school_id_foreign`(`school_id` ASC) USING BTREE,
  INDEX `users_role_id_foreign`(`role_id` ASC) USING BTREE,
  INDEX `users_department_id_foreign`(`department_id` ASC) USING BTREE,
  CONSTRAINT `users_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT,
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT,
  CONSTRAINT `users_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (3, 'jimmymcgill@deped.gov.ph', 'Jimmy McGill', 'saulgoodman', '$2y$12$rkFgBpp8yPXmmkXVX1I7m.JUec9vergfETo40qNY6rXrpZ1UTVJI.', 5, 6, 5, 1, NULL, '2025-08-27 00:45:39', '2025-08-27 00:45:39');

SET FOREIGN_KEY_CHECKS = 1;
