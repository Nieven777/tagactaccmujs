/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 80032
 Source Host           : localhost:3306
 Source Schema         : blog_db

 Target Server Type    : MySQL
 Target Server Version : 80032
 File Encoding         : 65001

 Date: 01/08/2024 23:08:38
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for article_assigned
-- ----------------------------
DROP TABLE IF EXISTS `article_assigned`;
CREATE TABLE `article_assigned`  (
  `assigned_id` int NOT NULL AUTO_INCREMENT,
  `submission_id` int NOT NULL,
  `userid` int NOT NULL,
  PRIMARY KEY (`assigned_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf16 COLLATE = utf16_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of article_assigned
-- ----------------------------

-- ----------------------------
-- Table structure for article_author
-- ----------------------------
DROP TABLE IF EXISTS `article_author`;
CREATE TABLE `article_author`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `articleid` int NOT NULL,
  `audid` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 134 CHARACTER SET = utf16 COLLATE = utf16_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of article_author
-- ----------------------------
INSERT INTO `article_author` VALUES (118, 229, 56);
INSERT INTO `article_author` VALUES (119, 229, 56);
INSERT INTO `article_author` VALUES (120, 230, 56);
INSERT INTO `article_author` VALUES (121, 230, 56);
INSERT INTO `article_author` VALUES (122, 231, 56);
INSERT INTO `article_author` VALUES (123, 231, 56);
INSERT INTO `article_author` VALUES (124, 232, 56);
INSERT INTO `article_author` VALUES (125, 232, 56);
INSERT INTO `article_author` VALUES (126, 233, 56);
INSERT INTO `article_author` VALUES (127, 233, 56);
INSERT INTO `article_author` VALUES (128, 234, 56);
INSERT INTO `article_author` VALUES (129, 234, 56);
INSERT INTO `article_author` VALUES (130, 235, 56);
INSERT INTO `article_author` VALUES (131, 235, 56);
INSERT INTO `article_author` VALUES (132, 236, 56);
INSERT INTO `article_author` VALUES (133, 236, 56);

-- ----------------------------
-- Table structure for article_submission
-- ----------------------------
DROP TABLE IF EXISTS `article_submission`;
CREATE TABLE `article_submission`  (
  `submissionid` int NOT NULL AUTO_INCREMENT,
  `auid` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf16 COLLATE utf16_general_ci NULL DEFAULT NULL,
  `filename` varchar(255) CHARACTER SET utf16 COLLATE utf16_general_ci NULL DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf16 COLLATE utf16_general_ci NULL DEFAULT NULL,
  `submission` bit(1) NULL DEFAULT NULL,
  `date_submitted` datetime NULL DEFAULT CURRENT_TIMESTAMP,
  `payment` bit(1) NULL DEFAULT NULL,
  `date_paid` int NULL DEFAULT NULL,
  `review` bit(1) NULL DEFAULT NULL,
  `date_forwarded_review` datetime NULL DEFAULT CURRENT_TIMESTAMP,
  `approved` bit(1) NULL DEFAULT NULL,
  `date_approved` datetime NULL DEFAULT CURRENT_TIMESTAMP,
  `layout` bit(1) NULL DEFAULT NULL,
  `date_forwarded` datetime NULL DEFAULT CURRENT_TIMESTAMP,
  `published` bit(1) NULL DEFAULT NULL,
  `date_published` datetime NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`submissionid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 100 CHARACTER SET = utf16 COLLATE = utf16_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of article_submission
-- ----------------------------

-- ----------------------------
-- Table structure for articles
-- ----------------------------
DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles`  (
  `articleid` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf16 COLLATE utf16_general_ci NULL DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf16 COLLATE utf16_general_ci NULL DEFAULT NULL,
  `keywords` varchar(255) CHARACTER SET utf16 COLLATE utf16_general_ci NULL DEFAULT NULL,
  `abstract` text CHARACTER SET utf16 COLLATE utf16_general_ci NULL,
  `filename` varchar(255) CHARACTER SET utf16 COLLATE utf16_general_ci NULL DEFAULT NULL,
  `doi` varchar(255) CHARACTER SET utf16 COLLATE utf16_general_ci NULL DEFAULT NULL,
  `volumeid` text CHARACTER SET utf16 COLLATE utf16_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `auid` int NOT NULL,
  `authors` text CHARACTER SET utf16 COLLATE utf16_general_ci NULL,
  PRIMARY KEY (`articleid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 291 CHARACTER SET = utf16 COLLATE = utf16_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of articles
-- ----------------------------
INSERT INTO `articles` VALUES (286, 'Quantum Computing: A New Era of Computational Power', 'Quantum-Computing-A-New-Era-of-Computational-Power', 'Quantum Computing, Quantum Bits, Computational Power, Quantum Algorithms, Technology', '<p>Quantum computing represents a paradigm shift in computational power, leveraging the principles of quantum mechanics to process information in fundamentally new ways. This article provides an overview of quantum computing technology, including the basics of quantum bits (qubits), quantum gates, and algorithms. It examines recent breakthroughs in quantum hardware, such as improved qubit coherence times and error correction methods, and discusses the potential applications of quantum computing in fields such as cryptography, optimization, and complex simulations. The article also considers the current limitations and future prospects of quantum computing.</p>\r\n', '1722367491solution.pdf', 'DOI:66a93e03a9f51', '16', '2024-07-31 03:24:51', 0, 'Nieven Tagactac');
INSERT INTO `articles` VALUES (291, 'Demystifying Nursing Knowledge Development: Issues, Solutions and Future Directions', 'Demystifying-Nursing-Knowledge-Development-Issues-Solutions-and-Future-Directions', 'issues in theory development, borrowed theory, nursing metaparadigms', '<p>Nursing has evolved from its historical roots, influenced by multiple factors such as knowledge from other disciplines, methods, and processes of knowledge generation and theory utilization. Issues arise because nurses recognize the need for knowledge-based practice and envisage the focus of knowledge generation and utilization from theoretical framing guiding their practice. The borrowed or unique knowledge-based practice is grounded in philosophical and theoretical frameworks advanced through paradigmatic viewpoints within the metaparadigms of nursing. Encompassing a framework in nursing is the concept of caring. Caring in nursing uniquely contributes to appreciating nursing as a discipline of knowledge and a practice profession. Suggested processes involve knowledge-based, evidence-based, and theory-based practices within a conceptual-theoretical-empirical system. Moreover, because there is yet a continuing search for a universal theory of nursing guiding global nursing care practice, nursing must have contended with the plurality of theories dictating varying ways of practicing nursing.</p>\r\n', '1722512317solution.pdf', 'DOI:66ab73bd82ae4', '17', '2024-08-01 19:38:37', 0, 'Caesarlica S. Minguita');
INSERT INTO `articles` VALUES (292, 'Bridging the Last Mile through Shared Mobility towards an Integrated Mobility System', 'Bridging-the-Last-Mile-through-Shared-Mobility-towards-an-Integrated-Mobility-System', 'Last Mile, First Mile, Shared Mobility, Urban Mobility, Transportation', '<p>As the population of urban centers grows, there is a significant challenge of adjusting the transportation needs of urban mobility, as well as pursuing environmental protection strategies and ensuring social inclusion. The major bottleneck of urban mobility includes the constant traffic congestion in major cities because of excessive use of private cars. Developing an accessible, attractive transportation system that caters to people&#39;s individual mobility needs and preferences is one possible solution to these problems. It is important to have a coordinated system connecting the various modes of transportation so that people&#39;s homes and destinations can be reached with ease. The first and last miles of commuters, which are the weakest linkages in the transportation network, should be developed first before the system can be integrated. Shared mobility which involves using a shared vehicle (car, bike, scooter, etc.) often serves as a first or last mile connection to other modes of transportation such as public transit. Understanding the factors that influence the adoption of shared mobility services is crucial to ensuring that they become a significant component of the urban mobility system. This paper provides an overview of existing and emerging last mile solutions, particularly in the concept of shared mobility. The objective of this study is to add and enrich knowledge in the area of shared mobility in bridging the last mile toward an integrated mobility system.</p>\r\n', '1722515843solution.pdf', 'DOI:66ab81835aeed', '17', '2024-08-01 20:37:23', 0, 'Ann Wendy M. Rojas');

-- ----------------------------
-- Table structure for authors
-- ----------------------------
DROP TABLE IF EXISTS `authors`;
CREATE TABLE `authors`  (
  `audid` int NOT NULL AUTO_INCREMENT,
  `uid` int NOT NULL,
  `author_name` varchar(255) CHARACTER SET utf16 COLLATE utf16_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf16 COLLATE utf16_general_ci NULL DEFAULT NULL,
  `contact_num` varbinary(12) NULL DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf16 COLLATE utf16_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`audid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 54 CHARACTER SET = utf16 COLLATE = utf16_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of authors
-- ----------------------------
INSERT INTO `authors` VALUES (49, 0, 'Nieven Tagactac', 's.tagactac.nievencharles@cmu.edu.ph', 0x313233, 'Editor');
INSERT INTO `authors` VALUES (50, 0, 'Lilibeth Tagactac', 'lilibeth.tagactac@gmail.com', 0x30393536323533333333, 'Journalist');
INSERT INTO `authors` VALUES (51, 0, 'Richard Tagactac', 'tagactac@gmail.com', 0x30393738373837383637, 'Head Writer');
INSERT INTO `authors` VALUES (53, 0, 'sample', 'jayranes@gmail.com', 0x3039313233313234343434, '132');

-- ----------------------------
-- Table structure for comments
-- ----------------------------
DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments`  (
  `comment_id` int NOT NULL AUTO_INCREMENT,
  `comments` varchar(500) CHARACTER SET utf16 COLLATE utf16_general_ci NULL DEFAULT NULL,
  `assigned_id` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`comment_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf16 COLLATE = utf16_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of comments
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `userid` int NOT NULL AUTO_INCREMENT,
  `complete_name` varchar(255) CHARACTER SET utf16 COLLATE utf16_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf16 COLLATE utf16_general_ci NULL DEFAULT NULL,
  `pword` varchar(255) CHARACTER SET utf16 COLLATE utf16_general_ci NULL DEFAULT NULL,
  `role` int NULL DEFAULT NULL,
  `status` bit(1) NULL DEFAULT NULL,
  `date_created` datetime NULL DEFAULT CURRENT_TIMESTAMP,
  `profile_pic` varchar(255) CHARACTER SET utf16 COLLATE utf16_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`userid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1713348555 CHARACTER SET = utf16 COLLATE = utf16_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1713348552, 'Rj tagactac', 'rj@gmail.com', '123', 0, b'1', '2024-07-29 07:02:36', '1722207756_408468248_1344010963144560_4272515101157118789_n.jpg');
INSERT INTO `users` VALUES (1713348553, 'dogg', 'dog@gmail.com', '123', 0, b'1', '2024-07-29 07:08:15', '1722208095_408576508_2025404027852320_4118164276378953744_n.jpg');
INSERT INTO `users` VALUES (1713348554, 'test test', 'test@gmail.com', '123', 0, b'1', '2024-07-31 06:12:00', '1722377520_405473392_1344010936477896_6907487246365796151_n.jpg');

-- ----------------------------
-- Table structure for volume
-- ----------------------------
DROP TABLE IF EXISTS `volume`;
CREATE TABLE `volume`  (
  `volumeid` int NOT NULL AUTO_INCREMENT,
  `published` bit(1) NULL DEFAULT NULL,
  `vol_name` varchar(255) CHARACTER SET utf16 COLLATE utf16_general_ci NULL DEFAULT NULL,
  `description` text CHARACTER SET utf16 COLLATE utf16_general_ci NULL,
  `date_at` datetime NULL DEFAULT CURRENT_TIMESTAMP,
  `date_published` datetime NULL DEFAULT NULL,
  `archived` bit(1) NULL DEFAULT NULL,
  PRIMARY KEY (`volumeid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = utf16 COLLATE = utf16_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of volume
-- ----------------------------
INSERT INTO `volume` VALUES (16, b'1', 'Volume Omega', 'This volume provides a comprehensive overview of the latest advancements in CRISPR technology. It covers the development of new CRISPR systems, improvements in editing precision, and novel delivery methods. ', '2024-07-31 00:09:58', '2024-08-01 14:35:32', b'1');
INSERT INTO `volume` VALUES (17, b'1', 'Volume Alpha', 'This volume presents a detailed exploration of recent progress in quantum computing. It includes chapters on the fundamental principles of quantum mechanics, advancements in quantum hardware, and the development of new quantum algorithms. ', '2024-07-31 00:18:27', '2024-08-01 13:39:03', b'0');

SET FOREIGN_KEY_CHECKS = 1;
