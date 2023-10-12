/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50736 (5.7.36)
 Source Host           : localhost:3306
 Source Schema         : mcstime

 Target Server Type    : MySQL
 Target Server Version : 50736 (5.7.36)
 File Encoding         : 65001

 Date: 12/10/2023 13:30:23
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for dg_cliente
-- ----------------------------
DROP TABLE IF EXISTS `dg_cliente`;
CREATE TABLE `dg_cliente`  (
  `idCliente` int(11) NOT NULL AUTO_INCREMENT,
  `NombreCliente` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `activo` bit(1) NULL DEFAULT NULL,
  PRIMARY KEY (`idCliente`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 25 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dg_cliente
-- ----------------------------
INSERT INTO `dg_cliente` VALUES (1, 'P1', b'1');
INSERT INTO `dg_cliente` VALUES (2, 'P2', b'0');
INSERT INTO `dg_cliente` VALUES (24, 'MPS Inc.', b'1');

-- ----------------------------
-- Table structure for dg_empleado_token
-- ----------------------------
DROP TABLE IF EXISTS `dg_empleado_token`;
CREATE TABLE `dg_empleado_token`  (
  `empleadoTokenId` int(11) NOT NULL AUTO_INCREMENT,
  `log_usu` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `token` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `estado` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `fecha` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`empleadoTokenId`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 544 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dg_empleado_token
-- ----------------------------
INSERT INTO `dg_empleado_token` VALUES (365, 'jfsantana77@gmail.com', '43c7ea32c49aeb943b5bcfab5619ee7c', '1', '2023-09-22 20:12:00');
INSERT INTO `dg_empleado_token` VALUES (366, 'jfsantana77@gmail.com', '9884b56386768fc3d78057c883db5efa', '1', '2023-09-22 20:16:00');
INSERT INTO `dg_empleado_token` VALUES (367, 'jfsantana77@gmail.com', 'caa3996894558e6ab847059e14f49dda', '1', '2023-09-22 20:19:00');
INSERT INTO `dg_empleado_token` VALUES (368, 'jfsantana77@gmail.com', '307f2690b464422282c039677d069151', '1', '2023-09-22 20:22:00');
INSERT INTO `dg_empleado_token` VALUES (369, 'jfsantana77@gmail.com', '5f8d5186fb3dbf3b5a0f63e98583f17e', '1', '2023-09-22 20:22:00');
INSERT INTO `dg_empleado_token` VALUES (370, 'jfsantana77@gmail.com', '18830c03e85e079b08b4ca451ebe29be', '1', '2023-09-22 20:23:00');
INSERT INTO `dg_empleado_token` VALUES (371, 'jfsantana77@gmail.com', 'e01ac6b7df735e8033bce903410d46fa', '1', '2023-09-22 20:30:00');
INSERT INTO `dg_empleado_token` VALUES (372, 'jfsantana77@gmail.com', '3d940fee440b47b15a8f10ddaabfc078', '1', '2023-09-22 20:32:00');
INSERT INTO `dg_empleado_token` VALUES (373, 'jfsantana77@gmail.com', 'b5931c3594b1992406cf3cecf25e7fe7', '1', '2023-09-22 20:32:00');
INSERT INTO `dg_empleado_token` VALUES (374, 'jfsantana77@gmail.com', 'a01197f9f0cca570014fe62fa9ffddbc', '1', '2023-09-22 20:32:00');
INSERT INTO `dg_empleado_token` VALUES (375, 'jfsantana77@gmail.com', 'da4fa5d99edbd10dad3a246b6adde4ff', '1', '2023-09-22 20:32:00');
INSERT INTO `dg_empleado_token` VALUES (376, 'jfsantana77@gmail.com', '0e140cd784505873f6a6d60fb836bf82', '1', '2023-09-22 20:32:00');
INSERT INTO `dg_empleado_token` VALUES (377, 'jfsantana77@gmail.com', '7547f94abe723b872a1cd2c407033383', '1', '2023-09-22 20:39:00');
INSERT INTO `dg_empleado_token` VALUES (378, 'jfsantana77@gmail.com', '5441354f646870647bcc8e25cd6782ef', '1', '2023-09-22 20:42:00');
INSERT INTO `dg_empleado_token` VALUES (379, 'jfsantana77@gmail.com', 'c3ba94050f36ae1769950c49bc00bc05', '1', '2023-09-22 20:46:00');
INSERT INTO `dg_empleado_token` VALUES (380, 'jfsantana77@gmail.com', '7c71fd49230deb03a0d2d428d62251f8', '1', '2023-09-22 20:58:00');
INSERT INTO `dg_empleado_token` VALUES (381, 'jfsantana77@gmail.com', 'e3533e7e037b8021b04bb7d4ba6250be', '1', '2023-09-22 23:22:00');
INSERT INTO `dg_empleado_token` VALUES (382, 'jfsantana77@gmail.com', '0d4ae609068f8d2df029555dde5fe0f9', '1', '2023-09-23 00:09:00');
INSERT INTO `dg_empleado_token` VALUES (383, 'jfsantana77@gmail.com', 'f692d102a9559b9554767d1dc561bb51', '1', '2023-09-23 00:10:00');
INSERT INTO `dg_empleado_token` VALUES (384, 'jfsantana77@gmail.com', 'c7d33a06eb434a5cd5ba109a27ee4d91', '1', '2023-09-23 00:11:00');
INSERT INTO `dg_empleado_token` VALUES (385, 'jfsantana77@gmail.com', 'c74003e9e3f5c8c11ae31ee99b7e4e1b', '1', '2023-09-23 00:12:00');
INSERT INTO `dg_empleado_token` VALUES (386, 'jfsantana77@gmail.com', '70487a8788c6682c8edbaa9871c6b2b7', '1', '2023-09-23 00:12:00');
INSERT INTO `dg_empleado_token` VALUES (387, 'jsantana', '79bd4e6ec9905467378475f427fa5d71', '1', '2023-09-23 00:14:00');
INSERT INTO `dg_empleado_token` VALUES (388, 'jsantana', '89e50068edc997d8dea1c376ff16d48c', '1', '2023-09-23 00:14:00');
INSERT INTO `dg_empleado_token` VALUES (389, 'jsantana', '8cb3f6db583909aa7b8c410fa46583c0', '1', '2023-09-23 00:18:00');
INSERT INTO `dg_empleado_token` VALUES (390, 'jsantana', '08e4ae4516db1805794b6537b6dfa953', '1', '2023-09-23 00:18:00');
INSERT INTO `dg_empleado_token` VALUES (391, 'jsantana', 'da491aed0f702ab97e17cee6925f94ac', '1', '2023-09-23 11:04:00');
INSERT INTO `dg_empleado_token` VALUES (392, 'jsantana', 'b92aa73aa8c57ba6143a1f3ce516540e', '1', '2023-09-23 11:56:00');
INSERT INTO `dg_empleado_token` VALUES (393, 'jsantana', '7507b884817bc3efce5bdee9c3c645e3', '1', '2023-09-23 12:04:00');
INSERT INTO `dg_empleado_token` VALUES (394, 'jsantana', '52b7406c65928bd344fa6cfa26b8cbdd', '1', '2023-09-23 12:05:00');
INSERT INTO `dg_empleado_token` VALUES (395, 'jsantana', '85b660e1d239015e1b436b5fefbda6d8', '1', '2023-09-23 12:19:00');
INSERT INTO `dg_empleado_token` VALUES (396, 'jsantana', '4234edbd2ee7036914cafdd393569767', '1', '2023-09-23 21:07:00');
INSERT INTO `dg_empleado_token` VALUES (397, 'jsantana', 'dd2f3f12a9ad37b67e3afc650dbea12e', '1', '2023-09-23 21:07:00');
INSERT INTO `dg_empleado_token` VALUES (398, 'jsantana', '63826de5bcd5789ecc715614886a8d75', '1', '2023-09-23 21:08:00');
INSERT INTO `dg_empleado_token` VALUES (399, 'jsantana', 'bbc77723eb11aa915dfe0e320e7c9d62', '1', '2023-09-23 21:14:00');
INSERT INTO `dg_empleado_token` VALUES (400, 'jsantana', 'c2555865c89a0db553b575e0ffb12ccd', '1', '2023-09-23 21:48:00');
INSERT INTO `dg_empleado_token` VALUES (401, 'jsantana', '34c31a7418689277a84a8266cb92bc0a', '1', '2023-09-23 21:48:00');
INSERT INTO `dg_empleado_token` VALUES (402, 'jsantana', 'e19f068395316ec225eb1248e6ba8344', '1', '2023-09-23 22:27:00');
INSERT INTO `dg_empleado_token` VALUES (403, 'jsantana', '601afad0d0f2677080c3624d09ac0332', '1', '2023-09-23 22:27:00');
INSERT INTO `dg_empleado_token` VALUES (404, 'jsantana', '455dbf044c83f8970f9ca8ddd21fc82a', '1', '2023-09-23 22:29:00');
INSERT INTO `dg_empleado_token` VALUES (405, 'jsantana', '42edc06674673b7828b535e63215635f', '1', '2023-09-23 22:30:00');
INSERT INTO `dg_empleado_token` VALUES (406, 'jsantana', 'dbf7bc65e13d15bfec6e58df632934ff', '1', '2023-09-23 22:31:00');
INSERT INTO `dg_empleado_token` VALUES (407, 'jsantana', '6343c9d81e3cb4eca7be8589dabf0e59', '1', '2023-09-23 22:31:00');
INSERT INTO `dg_empleado_token` VALUES (408, 'jsantana', '44f27a16b41adce686e5fd978e51888a', '1', '2023-09-23 22:32:00');
INSERT INTO `dg_empleado_token` VALUES (409, 'jsantana', '0ab7d653cb9265d84eb893c0d40af28e', '1', '2023-09-23 22:33:00');
INSERT INTO `dg_empleado_token` VALUES (410, 'jsantana', '67e35b62e375704ecc517b2038f0e936', '1', '2023-09-25 11:09:00');
INSERT INTO `dg_empleado_token` VALUES (411, 'jsantana', 'd765d699f2bc6ef99032e8dbc69d20fb', '1', '2023-09-25 14:30:00');
INSERT INTO `dg_empleado_token` VALUES (412, 'jsantana', '8eefe8d9800c435a2e7acaec5f9c85a6', '1', '2023-09-26 13:53:00');
INSERT INTO `dg_empleado_token` VALUES (413, 'jsantana', '9248a9a06fbad327f131be11abdabb2e', '1', '2023-09-26 17:17:00');
INSERT INTO `dg_empleado_token` VALUES (414, 'co', '57a622f5d7fa56ab4d579328d8a4eada', '1', '2023-09-26 18:49:00');
INSERT INTO `dg_empleado_token` VALUES (415, 'co', '190b3f729da0999753584627545ee84a', '1', '2023-09-26 18:51:00');
INSERT INTO `dg_empleado_token` VALUES (416, 'co', '7cf5dd5bf3939417494a35d7656eca98', '1', '2023-09-26 18:52:00');
INSERT INTO `dg_empleado_token` VALUES (417, 'fi', 'e4f9be55c45878bbc425f19563c7e13e', '1', '2023-09-26 18:57:00');
INSERT INTO `dg_empleado_token` VALUES (418, 'ap', '9f5469607c1b8a623001cc784d64bc77', '1', '2023-09-26 18:58:00');
INSERT INTO `dg_empleado_token` VALUES (419, 'co', 'c7e05cd2bd1c4ae2e8da5ef4d83732e2', '1', '2023-09-26 19:09:00');
INSERT INTO `dg_empleado_token` VALUES (420, 'd', '52cc44a94f178c0a36328a36065ada11', '1', '2023-09-26 19:09:00');
INSERT INTO `dg_empleado_token` VALUES (421, 'd', 'b7492010684896ca8bdf4125abc7cdaa', '1', '2023-09-26 19:10:00');
INSERT INTO `dg_empleado_token` VALUES (422, 'fi', 'e0f3d8ed463880c3f47b8eace45ff509', '1', '2023-09-26 19:10:00');
INSERT INTO `dg_empleado_token` VALUES (423, 'jsantana', '351b948730e44a4af86a613d2bbe7646', '1', '2023-09-26 19:10:00');
INSERT INTO `dg_empleado_token` VALUES (424, 'jsantana', '91bcd82e96880c900a53d9b4bc56bff3', '1', '2023-09-26 20:32:00');
INSERT INTO `dg_empleado_token` VALUES (425, 'ap', 'fd8eb64ee8c251713aa2b7058d61e728', '1', '2023-09-26 21:00:00');
INSERT INTO `dg_empleado_token` VALUES (426, 'jsantana', 'f250392cc31f0fe5ecc948af9559b087', '1', '2023-09-26 21:01:00');
INSERT INTO `dg_empleado_token` VALUES (427, 'fi', 'da8ee4183318028810daac0fb3037eff', '1', '2023-09-26 21:05:00');
INSERT INTO `dg_empleado_token` VALUES (428, 'co', 'f7036416fde30a1ce6d3a8a7f411be58', '1', '2023-09-26 21:05:00');
INSERT INTO `dg_empleado_token` VALUES (429, 'd', '1be44d5d5520846db4ed3ff152394115', '1', '2023-09-26 21:05:00');
INSERT INTO `dg_empleado_token` VALUES (430, 'ap', '4a42dcaac4a92faa28252e8296d92928', '1', '2023-09-26 21:06:00');
INSERT INTO `dg_empleado_token` VALUES (431, 'co', '9bd9afa749f7862cc14276281d392fb9', '1', '2023-09-26 21:09:00');
INSERT INTO `dg_empleado_token` VALUES (432, 'jsantana', '329023886af3383cd9954abd0a89ba93', '1', '2023-09-26 21:17:00');
INSERT INTO `dg_empleado_token` VALUES (433, 'co', 'c2820a268adbcaac038b5193a458a183', '1', '2023-09-26 22:56:00');
INSERT INTO `dg_empleado_token` VALUES (434, 'jsantana', '5d5508b42f80b393cf1692585dace333', '1', '2023-09-26 22:57:00');
INSERT INTO `dg_empleado_token` VALUES (435, 'jsantana', '4286cdcdd273d41cbd226fae2fe6839f', '1', '2023-09-26 23:07:00');
INSERT INTO `dg_empleado_token` VALUES (436, 'ap', 'a6331383875a668bb446f40cce802d30', '1', '2023-09-26 23:17:00');
INSERT INTO `dg_empleado_token` VALUES (437, 'co', '189d1c0758283a6082941bf52d1c7a17', '1', '2023-09-26 23:19:00');
INSERT INTO `dg_empleado_token` VALUES (438, 'jsantana', '79eef6bdc608dd8caaf627d277999993', '1', '2023-09-27 02:18:00');
INSERT INTO `dg_empleado_token` VALUES (439, 'jsantana', '2e6c225955c130b4e555db3e08c89d26', '1', '2023-09-27 02:19:00');
INSERT INTO `dg_empleado_token` VALUES (440, 'jsantana', 'b661097b8f8a2120be92171b313713a7', '1', '2023-09-27 02:20:00');
INSERT INTO `dg_empleado_token` VALUES (441, 'jsantana', 'a2f8ee46d36829bf8ad2fe6504b22fc7', '1', '2023-09-27 02:21:00');
INSERT INTO `dg_empleado_token` VALUES (442, 'jsantana', '636fe13aa25465a6aac6809d8a470803', '1', '2023-09-27 02:35:00');
INSERT INTO `dg_empleado_token` VALUES (443, 'jsantana', '88b87fca7fcfdf23f8cf92e0d9d7d53d', '1', '2023-09-27 02:36:00');
INSERT INTO `dg_empleado_token` VALUES (444, 'jsantana', 'ca2f60b872658f4c1df301aa5bf1237a', '1', '2023-09-27 02:36:00');
INSERT INTO `dg_empleado_token` VALUES (445, 'jsantana', '6e9cc0055671c0b75bd34c2985346d94', '1', '2023-09-27 02:41:00');
INSERT INTO `dg_empleado_token` VALUES (446, 'jsantana', '01545816702cdd8e28248d196f06eb51', '1', '2023-09-27 02:55:00');
INSERT INTO `dg_empleado_token` VALUES (447, 'jsantana', 'ae7b7bddf07c8f4e4999390cfd36e017', '1', '2023-09-27 02:55:00');
INSERT INTO `dg_empleado_token` VALUES (448, 'jsantana', '987983da9682a3396136d5bb71b1a616', '1', '2023-09-27 02:56:00');
INSERT INTO `dg_empleado_token` VALUES (449, 'jsantana', '82afa7940bd0f7a812dfbbd7c9053423', '1', '2023-09-27 03:04:00');
INSERT INTO `dg_empleado_token` VALUES (450, 'jsantana', '74b8a63f1d0058f411197cb4f4e16f05', '1', '2023-09-27 03:25:00');
INSERT INTO `dg_empleado_token` VALUES (451, 'jsantana', '9e2d24cab02d871a638465274baafb44', '1', '2023-09-27 03:30:00');
INSERT INTO `dg_empleado_token` VALUES (452, 'jsantana', 'b273b3edb8507fed942ef1babc989587', '1', '2023-09-27 03:32:00');
INSERT INTO `dg_empleado_token` VALUES (453, 'jsantana', '075467468a2d1fa4ddd86f4be2fb839f', '1', '2023-09-27 03:33:00');
INSERT INTO `dg_empleado_token` VALUES (454, 'jsantana', '751e0f5d809c98a31cbfb6acd70ef361', '1', '2023-09-27 03:34:00');
INSERT INTO `dg_empleado_token` VALUES (455, 'jsantana', 'af13ad8841c18d04debabfb4472cb8c3', '1', '2023-09-27 03:37:00');
INSERT INTO `dg_empleado_token` VALUES (456, 'jsantana', '369fb09446f4b861be4b5c85b2a37540', '1', '2023-09-27 03:42:00');
INSERT INTO `dg_empleado_token` VALUES (457, 'jsantana', '29c30ea8ce9da883e2513e53de12c769', '1', '2023-09-27 03:43:00');
INSERT INTO `dg_empleado_token` VALUES (458, 'jsantana', 'c674795c4c2a14114a1c5a3c7be37ab6', '1', '2023-09-27 03:43:00');
INSERT INTO `dg_empleado_token` VALUES (459, 'jsantana', 'f6042c374de62a7d64db9ae41f422e12', '1', '2023-09-27 03:51:00');
INSERT INTO `dg_empleado_token` VALUES (460, 'admin', 'c858c0d94a737fd9331aae3697cf7a80', '1', '2023-09-27 03:52:00');
INSERT INTO `dg_empleado_token` VALUES (461, 'fi', '7c85d1abe20a7542634c4258cbfbea95', '1', '2023-09-27 03:52:00');
INSERT INTO `dg_empleado_token` VALUES (462, 'jsantana', '37fd8bf6b468ffb9ce345d8cfc7bdae7', '1', '2023-09-27 19:45:00');
INSERT INTO `dg_empleado_token` VALUES (463, 'jsantana', 'e13b1c4f67b6fd3c39f9ebb3e52a908d', '1', '2023-09-27 19:46:00');
INSERT INTO `dg_empleado_token` VALUES (464, 'jsantana', '08f49276faf7d765ca454c9773dec5ce', '1', '2023-09-27 19:46:00');
INSERT INTO `dg_empleado_token` VALUES (465, 'jsantana', 'e42583ab81537b16183fc73c58a75ac8', '1', '2023-09-27 19:46:00');
INSERT INTO `dg_empleado_token` VALUES (466, 'c1', 'c77b914875fb0fcfc312bfebe0c763e3', '1', '2023-09-27 19:47:00');
INSERT INTO `dg_empleado_token` VALUES (467, 'jsantana', 'a119376d5a55f57bb0b7b9cdb8bdfca3', '1', '2023-09-29 20:09:00');
INSERT INTO `dg_empleado_token` VALUES (468, 'jsantana', '6c703a3ff8cec97c58243ebb12420e5a', '1', '2023-09-29 20:36:00');
INSERT INTO `dg_empleado_token` VALUES (469, 'c1', '44fc0db9f5587eb1e44e52484497486d', '1', '2023-09-29 20:48:00');
INSERT INTO `dg_empleado_token` VALUES (470, 'jsantana', 'e53a559b7af5052155e89d3eb1a30a9b', '1', '2023-09-29 20:48:00');
INSERT INTO `dg_empleado_token` VALUES (471, 'c1', '4885a49b1d48d0bf728a1b7e54a6edf5', '1', '2023-09-29 20:53:00');
INSERT INTO `dg_empleado_token` VALUES (472, 'ap', '6e0ddb0e8f703c45301a244540b5f134', '1', '2023-09-29 21:03:00');
INSERT INTO `dg_empleado_token` VALUES (473, 'jsantana', '00a7ae316d73f7d227620471c9768597', '1', '2023-09-29 21:20:00');
INSERT INTO `dg_empleado_token` VALUES (474, 'c2', '3d6f9f84583d9c9daf91e2a376f2ce93', '1', '2023-09-29 21:20:00');
INSERT INTO `dg_empleado_token` VALUES (475, 'c1', '96f09b7a93e09fcd5be9227fabfdaf57', '1', '2023-09-29 21:21:00');
INSERT INTO `dg_empleado_token` VALUES (476, 'jsantana', 'a5a33408cbaa4a96bde0e7672abf6f65', '1', '2023-10-03 12:08:00');
INSERT INTO `dg_empleado_token` VALUES (477, 'jsantana', '1881a216db3a9e988de88cd8ceef8eb5', '1', '2023-10-03 12:30:00');
INSERT INTO `dg_empleado_token` VALUES (478, 'c1', '3d2426e9234ffdf36230ccedf0de67bd', '1', '2023-10-03 12:34:00');
INSERT INTO `dg_empleado_token` VALUES (479, 'c2', '07f1a6d3376edc5563e6cfce961a3752', '1', '2023-10-03 12:35:00');
INSERT INTO `dg_empleado_token` VALUES (480, 'ap', 'd3e4e247191ffde7faab8bf8a13f58fe', '1', '2023-10-03 12:35:00');
INSERT INTO `dg_empleado_token` VALUES (481, 'c1', '49737a6ddc4b1534f198e346a7bde3ae', '1', '2023-10-03 12:36:00');
INSERT INTO `dg_empleado_token` VALUES (482, 'c1', '468b091e83d211eda932c042a71ec689', '1', '2023-10-03 12:37:00');
INSERT INTO `dg_empleado_token` VALUES (483, 'ap', '3f0f6e0bea691cdfd5fbd2ef293bf224', '1', '2023-10-03 12:37:00');
INSERT INTO `dg_empleado_token` VALUES (484, 'c1', 'afabced9df010bf82770ea397a0d7bcc', '1', '2023-10-03 12:38:00');
INSERT INTO `dg_empleado_token` VALUES (485, 'ap', 'a89b8735b5d0cb4e0dd763a03dd9ab10', '1', '2023-10-03 12:39:00');
INSERT INTO `dg_empleado_token` VALUES (486, 'c1', 'd02f1dc2c567caa5242dffa5dc8b8746', '1', '2023-10-03 13:22:00');
INSERT INTO `dg_empleado_token` VALUES (487, 'c1', 'a5094f64857e78e9d6f3ded0e5a38298', '1', '2023-10-03 13:22:00');
INSERT INTO `dg_empleado_token` VALUES (488, 'ap', '6858fc912767f4f362c02d732474c299', '1', '2023-10-03 13:22:00');
INSERT INTO `dg_empleado_token` VALUES (489, 'c1', '140a619985f281df99054c41d7cdc0f7', '1', '2023-10-03 13:26:00');
INSERT INTO `dg_empleado_token` VALUES (490, 'c1', 'eb85b3b96b1bbc1cc910ac14e1af674f', '1', '2023-10-03 15:30:00');
INSERT INTO `dg_empleado_token` VALUES (491, 'c1', '1b83221f4635fd7956c2aae6d2d9a36f', '1', '2023-10-03 15:31:00');
INSERT INTO `dg_empleado_token` VALUES (492, 'jsantana', '335acb1a047fdef94fa09c107c9cf256', '1', '2023-10-04 13:11:00');
INSERT INTO `dg_empleado_token` VALUES (493, 'c1', '6043040baf735c7031f11beeb325a954', '1', '2023-10-04 13:20:00');
INSERT INTO `dg_empleado_token` VALUES (494, 'fi', 'afd1159a548d405d9aa9f29792f25972', '1', '2023-10-04 13:30:00');
INSERT INTO `dg_empleado_token` VALUES (495, 'ap', 'c63048800d1832768660a25b1e009193', '1', '2023-10-04 13:31:00');
INSERT INTO `dg_empleado_token` VALUES (496, 'c2', '19b0601451e36cab6d170416b416e793', '1', '2023-10-04 13:31:00');
INSERT INTO `dg_empleado_token` VALUES (497, 'c1', '7f50da6b9e103196b89a25a5ec419474', '1', '2023-10-04 13:31:00');
INSERT INTO `dg_empleado_token` VALUES (498, 'jsantana', '24d1688f467196e5946d5f5b5f3598c1', '1', '2023-10-04 13:33:00');
INSERT INTO `dg_empleado_token` VALUES (499, 'fi', '9f897b4e5203bea7d37307520d14a0f0', '1', '2023-10-04 13:42:00');
INSERT INTO `dg_empleado_token` VALUES (500, 'jsantana', 'ecf19329d638d6bce1935bd334d14dd9', '1', '2023-10-04 13:42:00');
INSERT INTO `dg_empleado_token` VALUES (501, 'jsantana', '40c0f8175c975676976285f7d440c01f', '1', '2023-10-04 14:05:00');
INSERT INTO `dg_empleado_token` VALUES (502, 'c1', '2cdf6a1b0292f675a40f5f3562974626', '1', '2023-10-04 14:12:00');
INSERT INTO `dg_empleado_token` VALUES (503, 'jsantana', 'b46fdb5858cd7c56493f1fa9cab3c974', '1', '2023-10-04 14:12:00');
INSERT INTO `dg_empleado_token` VALUES (504, 'c1', 'c6ce1efddd7ba9c0106495e0cf4f4ed3', '1', '2023-10-04 15:05:00');
INSERT INTO `dg_empleado_token` VALUES (505, 'ap', '8977cca69abfaeaab0a4a403715f8407', '1', '2023-10-04 15:06:00');
INSERT INTO `dg_empleado_token` VALUES (506, 'fi', 'dbed851c7ff20c28eb7a1a2ff08066c3', '1', '2023-10-05 00:29:00');
INSERT INTO `dg_empleado_token` VALUES (507, 'fi', '686ddb54677075657585063883eaef73', '1', '2023-10-05 00:31:00');
INSERT INTO `dg_empleado_token` VALUES (508, 'fi', '1cb9dce0081deb74395fd32dafd46e0b', '1', '2023-10-05 00:32:00');
INSERT INTO `dg_empleado_token` VALUES (509, 'c1', '1822a0654757a46bdac33c0aadb4c21d', '1', '2023-10-05 00:32:00');
INSERT INTO `dg_empleado_token` VALUES (510, 'c1', '767c67ccd52ce1f414a942951b8a7abb', '1', '2023-10-05 00:34:00');
INSERT INTO `dg_empleado_token` VALUES (511, 'ap', '7fa896ead45547531a97c3ea9b3bc4fc', '1', '2023-10-05 00:35:00');
INSERT INTO `dg_empleado_token` VALUES (512, 'ap', '13343faee50533edb152111a9b9eec35', '1', '2023-10-05 00:35:00');
INSERT INTO `dg_empleado_token` VALUES (513, 'fi', '08fd6d62a2766be5c88211c43c266cd5', '1', '2023-10-05 00:35:00');
INSERT INTO `dg_empleado_token` VALUES (514, 'c1', '37e46ea3307551194df92f1f5ff6dda4', '1', '2023-10-05 00:35:00');
INSERT INTO `dg_empleado_token` VALUES (515, 'jsantana', '11bacc9b2252ba42419d2b7fc23a50c3', '1', '2023-10-05 00:35:00');
INSERT INTO `dg_empleado_token` VALUES (516, 'jsantana', 'f88059608d40e3870c171895ea1799d2', '1', '2023-10-05 00:48:00');
INSERT INTO `dg_empleado_token` VALUES (517, 'apmcs', 'f46e14b0e9adf46b38f88f6ef84be675', '1', '2023-10-05 00:48:00');
INSERT INTO `dg_empleado_token` VALUES (518, 'apmcs', '5cbd9f0e699d700a34e1571637785fc0', '1', '2023-10-05 01:18:00');
INSERT INTO `dg_empleado_token` VALUES (519, 'apqp', '864034bc94e3ae28e0c148908c0fbe3b', '1', '2023-10-05 01:21:00');
INSERT INTO `dg_empleado_token` VALUES (520, 'jsantana', '240574c65dfab611390a55a1596cff9f', '1', '2023-10-05 01:38:00');
INSERT INTO `dg_empleado_token` VALUES (521, 'mps', '1c8607cae23715e2ecb5ba594114f340', '1', '2023-10-05 01:41:00');
INSERT INTO `dg_empleado_token` VALUES (522, 'qp', '7ba76e36ad41a399f9b67d4deec4054e', '1', '2023-10-05 01:41:00');
INSERT INTO `dg_empleado_token` VALUES (523, 'mcs', 'b957418a0001321716cca2a072bfaefa', '1', '2023-10-05 01:41:00');
INSERT INTO `dg_empleado_token` VALUES (524, 'c1', 'c1a358f824c00c368af64c47584f6659', '1', '2023-10-05 01:49:00');
INSERT INTO `dg_empleado_token` VALUES (525, 'jsantana', 'f815678512f2f73e4be8339d8aef0f7c', '1', '2023-10-05 01:49:00');
INSERT INTO `dg_empleado_token` VALUES (526, 'jsantana', '22ba8ac6ef4f7f4c2b5d0a5843be29f6', '1', '2023-10-05 02:20:00');
INSERT INTO `dg_empleado_token` VALUES (527, 'mcs', '44822b192cede3545581d952ac43ecb7', '1', '2023-10-05 13:41:00');
INSERT INTO `dg_empleado_token` VALUES (528, 'fi', '3039c0c95e94ffa407780f40570cc431', '1', '2023-10-10 12:08:00');
INSERT INTO `dg_empleado_token` VALUES (529, 'jsantana', '34abb63aacdd054f6b43562270356d66', '1', '2023-10-10 12:12:00');
INSERT INTO `dg_empleado_token` VALUES (530, 'fi', 'c6b27f051218b056537dc73c4411cc46', '1', '2023-10-11 00:07:00');
INSERT INTO `dg_empleado_token` VALUES (531, 'fi', 'ddc83790f1c7e509c85ef836dbf02baf', '1', '2023-10-12 13:03:00');
INSERT INTO `dg_empleado_token` VALUES (532, 'admin', '249f167c91175c70c165244a140765c2', '1', '2023-10-12 14:51:00');
INSERT INTO `dg_empleado_token` VALUES (533, 'c1', 'd4d52437c41a27954db7da6d2b8d5da3', '1', '2023-10-12 16:09:00');
INSERT INTO `dg_empleado_token` VALUES (534, 'c1', '5321d4aebd1e438933e2cfc20ecac5f6', '1', '2023-10-12 16:18:00');
INSERT INTO `dg_empleado_token` VALUES (535, 'c1', '2f2c28a1bfcb32c336f693661ab248aa', '1', '2023-10-12 16:18:00');
INSERT INTO `dg_empleado_token` VALUES (536, 'jsantana', 'fcf9880b4c1fc2e9a6fdd6a8714a5d41', '1', '2023-10-12 16:33:00');
INSERT INTO `dg_empleado_token` VALUES (537, 'c1', '8865de70d95e55e174028c76577e2342', '1', '2023-10-12 16:44:00');
INSERT INTO `dg_empleado_token` VALUES (538, 'mps', '1aa43d590560a6f89f71a24a9276f916', '1', '2023-10-12 16:53:00');
INSERT INTO `dg_empleado_token` VALUES (539, 'jsantana', '577e0feef3f9cb9fb3d93f42a782209a', '1', '2023-10-12 16:54:00');
INSERT INTO `dg_empleado_token` VALUES (540, 'mps', 'ac41809138d093bf4536ddf9af01bc07', '1', '2023-10-12 16:59:00');
INSERT INTO `dg_empleado_token` VALUES (541, 'qp', 'd6c6af7372a4d92a41bf572f861db681', '1', '2023-10-12 17:21:00');
INSERT INTO `dg_empleado_token` VALUES (542, 'mps', '68327beb46267b692963a4f321817be6', '1', '2023-10-12 17:23:00');
INSERT INTO `dg_empleado_token` VALUES (543, 'jsantana', 'b042a227709eeb8fb0c17df065d4a6d5', '1', '2023-10-12 17:28:00');

-- ----------------------------
-- Table structure for dg_empleados
-- ----------------------------
DROP TABLE IF EXISTS `dg_empleados`;
CREATE TABLE `dg_empleados`  (
  `id_usu` int(11) NOT NULL AUTO_INCREMENT,
  `nom_usu` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `ape_usu` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `log_usu` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `pass_usu` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `act_usu` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `tel_usu` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `ced_usu` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `car_usu` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `cor_usu` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `rol_usu` int(11) NULL DEFAULT NULL,
  `ubicacionResidencia` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `ident` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `frenteAsignado` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `carnetizacion` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `pcMacLan` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `pcMacWam` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `pcModelo` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `pcSerial` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_usu`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 175 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of dg_empleados
-- ----------------------------
INSERT INTO `dg_empleados` VALUES (74, 'JESUS F', 'SANTANA S', 'jsantana', '12345', '1', '4244380137', '13336768', 'FULL STACK', 'jfsantana77@gmail.com|', 40, 'REMOTO', 'WEB', 'RD y SART', NULL, NULL, NULL, 'HP', NULL);
INSERT INTO `dg_empleados` VALUES (122, 'JOSE', 'SALAZAR', 'c1', 'c1', '1', 'd', 'd', 'd', 'd', 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (123, 'Administrador', 'administrador', 'admin', 'admin', '1', '123', '123', '123', '123', 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (124, 'Aprobador', 'MPS', 'mps', 'mps', '1', '123', '123', '123', '123', 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (125, 'Finanzas', 'FI', 'fi', 'fi', '1', '123', '123', '123', '132', 30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (126, 'ALEJANDRO', 'PARRA', 'c2', 'c2', '1', '123', '123', '123', '132', 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (127, 'Aprobador', 'QP', 'qp', 'qp', '1', '123', '123', '123', '123', 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (128, 'Aprobador', 'MCS', 'mcs', 'mcs', '1', '123', '123', '132', '132', 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (129, 'Juan ', 'Merchan', 'Juan.Merchan', '149946229', '1', '+507 61597081', '149946229', 'Gerente de Proyecto para integraciones', 'juan.merchan@mmdmcs.com', 40, 'PANAMA/REMOTO', 'GTE', 'TECNICO', NULL, NULL, NULL, 'Macbook Pro', 'C02G908EMD6R');
INSERT INTO `dg_empleados` VALUES (130, 'Richard ', 'Amaris', 'Richard.Amaris', '21152692', '1', '+ 58 04244184313', '21152692', 'ABAP FACTORY (5 PAX) GRUPO 1', 'richard.amaris@mmdmcs.com', 40, 'REMOTO', 'ABAP', 'TECNICO', NULL, '2C-60-0C-1B-5E-83', '34-DE-1A-73-25-F3', 'Satellite S55-B5268', 'ZE022692C');
INSERT INTO `dg_empleados` VALUES (131, 'Darwins ', 'Galindez', 'Darwins.Galindez', '20293154', '1', '+58 04127434883', '20293154', 'ABAP FACTORY (5 PAX) GRUPO 1', 'darwins.galindez@mmdmcs.com', 40, 'REMOTO', 'ABAP', 'TECNICO', NULL, 'E4-E7-49-38-35-37', '28-3A-4D-61-C2-19', 'HP Pavilon 15-cw0xxx', '5DC84821TK');
INSERT INTO `dg_empleados` VALUES (132, 'Luis ', 'Reyes', 'Luis.Reyes', '24013862', '1', '+58 04124873859', '24013862', 'ABAP FACTORY (5 PAX) GRUPO 1', 'luis.reyes@mmdmcs.com', 40, 'REMOTO', 'ABAP', 'TECNICO', NULL, '54-AB-3A-1E-04-DF', 'A8-A7-95-A5-85-2F', 'Aspire E5-573', 'NXMVHAA02655014');
INSERT INTO `dg_empleados` VALUES (133, 'Sin ', 'Asignar', 'Sin.Asignar', '', '1', NULL, '', 'ABAP FACTORY (5 PAX) GRUPO 1', NULL, 40, 'REMOTO', 'ABAP', 'TECNICO', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (134, 'Sin ', 'Asignar', 'Sin.Asignar', '', '1', NULL, '', 'ABAP FACTORY (5 PAX) GRUPO 1', NULL, 40, 'REMOTO', 'ABAP', 'TECNICO', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (135, 'Oreana ', 'Colorado', 'Oreana.Colorado', '6721149', '1', '+58 04143978480', '6721149', 'ABAP FACTORY (5 PAX) GRUPO 2', 'oriana.colorado@mmdmcs.com', 40, 'REMOTO', 'ABAP', 'TECNICO', NULL, '2A-39-26-69-34-1A', '28-39-26-57-7B-19', 'IdeadPad S145', 'I6317A-RTL8821CE');
INSERT INTO `dg_empleados` VALUES (136, 'Viveka ', 'González', 'Viveka.González', '15464440', '1', '+58 04126926772', '15464440', 'ABAP FACTORY (5 PAX) GRUPO 2', 'viveka.gonzalez@mmdmcs.com', 40, 'REMOTO', 'ABAP', 'TECNICO', NULL, '8C-70-5a-31-80-00', NULL, 'T40', 'S/N');
INSERT INTO `dg_empleados` VALUES (137, 'Karla ', ' Parada', 'Karla..Parada', '12959217', '1', '58 04127000977', '12959217', 'ABAP FACTORY (5 PAX) GRUPO 2', 'karla.parada@mmdmcs.com', 40, 'REMOTO', 'ABAP', 'TECNICO', NULL, '00-09-0F-FE-00-01', 'E0-75-26-0A-AF-99', 'X133JR610', 'F152J-16/WB/N50N5A/FW0655031');
INSERT INTO `dg_empleados` VALUES (138, 'Juan ', 'Rodríguez', 'Juan.Rodríguez', '6490091', '1', '58 04125813070', '6490091', 'ABAP FACTORY (5 PAX) GRUPO 2', 'juan.rodriguez@mmdmcs.com', 40, 'REMOTO', 'ABAP', 'TECNICO', NULL, '00-09-0F-AA-00-01', '0C-9A-3C-1F-FF-7C', 'Inspiron 15 3000', '34770536311');
INSERT INTO `dg_empleados` VALUES (139, 'Silva ', 'Alexander', 'Silva.Alexander', '15307287', '1', '58 04263540353/58 0424 5948262', '15307287', 'ABAP FACTORY (5 PAX) GRUPO 2', 'alexander.silva@mmdmcs.com', 40, 'REMOTO', 'ABAP', 'TECNICO', NULL, '?????', '??????', 'Dell Bostron', '186182396909');
INSERT INTO `dg_empleados` VALUES (140, 'Dionne ', 'Pastran', 'Dionne.Pastran', '17621930', '1', '+58  04245989740', '17621930', 'ABAP FACTORY (3 PAX) GRUPO 3', 'dionne.pastran@mmdmcs.com', 40, 'REMOTO', 'ABAP', 'TECNICO', NULL, '?????', '??????', 'ENVY', '337BCD91-B747-42E0-96F4');
INSERT INTO `dg_empleados` VALUES (141, 'Javier ', 'Silva', 'Javier.Silva', '14346474', '1', NULL, '14346474', 'ABAP FACTORY (3 PAX) GRUPO 3', 'javier.silva@mmdmcs.com', 40, 'REMOTO', 'ABAP', 'TECNICO', NULL, NULL, '00-45-E2-66-6A-55', '81W6', 'PF2W56X8');
INSERT INTO `dg_empleados` VALUES (142, 'Sin ', 'Asignar', 'Sin.Asignar', '', '1', NULL, '', 'ABAP FACTORY (3 PAX) GRUPO 3', NULL, 40, 'REMOTO', 'ABAP', 'TECNICO', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (143, 'Orlando ', 'Rodríguez', 'Orlando.Rodríguez', '12762333', '1', '+52 5577406314', '12762333', 'WORKFLOW', ' orlando.rodriguez@mmdmcs.com', 40, 'REMOTO', 'BW', NULL, NULL, '58-FB-84-12-F1-32', '58-FB-84-12-F1-2E', '80V', 'MP1654F1');
INSERT INTO `dg_empleados` VALUES (144, 'Jorge ', 'González', 'Jorge.González', '16587357', '1', '+58 04127933863', '16587357', 'WORKFLOW', 'jorge.gonzalez@mmdmcs.com', 40, 'REMOTO', 'BW', NULL, NULL, '??????', '????????', 'HP Laptop 15-dw0ww', 'B45D0B56-6080-4F11-A175-F0C3FB93A72F');
INSERT INTO `dg_empleados` VALUES (145, 'José ', 'Rodríguez', 'José.Rodríguez', ' 10970754', '1', '+58 04143420177', ' 10970754', 'Basis 1', 'jose.rodriguez@mmdmcs.com', 40, 'MBO ', 'BC', 'TECNICO', NULL, '00-21-CC-6D-03-7B', '08-11-96-78-E6-40', 'THINKPAD T420', 'R8-CP1NZ11/10');
INSERT INTO `dg_empleados` VALUES (146, 'Jonathan ', 'Valencia', 'Jonathan.Valencia', '16782496', '1', '+58 04146275806', '16782496', 'Basis 2 ', 'jonathan.valencia@mmdmcs.com', 40, 'MBO - REMOTO', 'BC', 'TECNICO', NULL, '00-FF-0F-1C-E5-AD', '02-AB-33-83-A7-92', 'T420', 'PB-RHNN3 12/06');
INSERT INTO `dg_empleados` VALUES (147, 'Luis ', 'Liscano', 'Luis.Liscano', '6093526', '1', '58 0424 1692240', '6093526', 'Basis 3', 'luis.liscano@mmdmcs.com', 40, 'CCS', 'BC', 'TECNICO', NULL, '00-FF-2B-EC-EC-8D', 'F0-9E-4A-0D-89-CD', 'Inspiron 5515', 'F7Z0T93');
INSERT INTO `dg_empleados` VALUES (148, 'Daniel ', 'Aular', 'Daniel.Aular', '12496987', '1', '+58 04165613650', '12496987', 'Basis 4', 'daniel.aular@mmdmcs.com', 40, 'PTO. FIJO - REMOTO', 'BC', 'TECNICO', NULL, '00-21-CC-60-D4-49', '00-24-D7-C7-01-B0', 'T420', 'R8-M8NND');
INSERT INTO `dg_empleados` VALUES (149, 'Sin ', 'Asignar', 'Sin.Asignar', '', '1', NULL, '', 'Gestión de Ventas  - DATOS', NULL, 40, 'CCS', 'SD', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (150, 'José ', 'Mendoza', 'José.Mendoza', '22182734', '1', '+58 04245703354', '22182734', 'Gestión de Ventas - RD/STAR', 'jose.mendoza@mmdmcs.com', 40, 'BQT', 'SD', 'RD y STAR', NULL, '?????', '?????', 'ROG ZEPHYRUS', 'N3NRKD004385100');
INSERT INTO `dg_empleados` VALUES (151, 'Elizabeth ', 'Balza', 'Elizabeth.Balza', '15540094', '1', '+58 0424 2081450', '15540094', 'Gestión de Ventas  - DATOS', 'elizabeth.balza@mmdmcs.com', 40, 'CCS', 'SD', 'DATOS MIGRACION', NULL, 'E2-0A-F6-85-73-83', 'E0-0A-F6-85-73-83', 'IdeaPad 1 15ALC7', 'PF3W6SVB');
INSERT INTO `dg_empleados` VALUES (152, 'Sin ', 'Asignar', 'Sin.Asignar', '', '1', NULL, '', 'Gestión de Proyectos - MIGRACIÓN', NULL, 40, 'CCS', 'GP', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (153, 'Sin ', 'Asignar', 'Sin.Asignar', '', '1', NULL, '', 'Gestión de Proyectos - MIGRACIÓN', NULL, 40, 'CCS', 'GP', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (154, 'Lillie ', 'Muñoz', 'Lillie.Muñoz', '16447155', '1', '58 04246157167', '16447155', 'Gestión de Producción y Calidad - RD/STAR', 'lilie.munoz@mmdmcs.com', 40, 'VAL', 'PP', 'APOYO', 'Por carnetizar', '6C2408B1A077', '703217751705', 'Thinkpad E15 GEN4', 'PF3VA3Q7');
INSERT INTO `dg_empleados` VALUES (155, 'Valor ', 'Betania', 'Valor.Betania', '23648234', '1', '+58 0412 9437252', '23648234', 'Gestión de Producción y Calidad - DATOS', ' betania.valor@mmdmcs.com', 40, 'CCS', 'PP', 'DATOS MIGRACION', 'Por carnetizar', NULL, NULL, '15-dy4013dx', '5CD2413YNL');
INSERT INTO `dg_empleados` VALUES (156, 'Nelson ', 'Barrera', 'Nelson.Barrera', '5241996', '1', '58 426 5103083 whassap/ 58 412 1075266 ', '5241996', 'Gestión de mantenimiento - MIGRACIÓN', 'nelson.barrera@mmdmcs.com', 40, 'VAL', 'MM', NULL, 'Carnetizar/Urgente', '70-77-81-68-AB-0B', NULL, 'Pavilion', '5cd5293d58');
INSERT INTO `dg_empleados` VALUES (157, 'Sandra ', 'Vargas', 'Sandra.Vargas', '6670315', '1', NULL, '6670315', 'Nómina - MIGRACIÓN', 'sandra.vargas@mmdmcs.com ', 40, 'MCBO', 'HR', 'NOMINA ', 'Carnetizar/Urgente', '3A-00-25-07-2D-EE', NULL, 'T490', 'S/N PF-1PMSL8');
INSERT INTO `dg_empleados` VALUES (158, 'Jonathan ', 'Díaz', 'Jonathan.Díaz', '16524558', '1', '+58 04166250258', '16524558', 'Consultor full stack ', 'jonathan.diaz@mmdmcs.com', 40, 'CCS', 'FIORI', 'TECNICO', 'REMOTO', '??????', '??????', 'G5MD', 'SN2241J000771');
INSERT INTO `dg_empleados` VALUES (159, 'Yosmar ', 'Molina', 'Yosmar.Molina', '7998863', '1', '58 04126116189', '7998863', 'OYM (6 PAX)', 'yosmar.molina@mmdmcs.com', 40, 'REMOTO', 'OYM', 'OYM ', 'Carnetizar/Urgente', '?????', NULL, 'VivoBook', 'X515JA-212.V15BB');
INSERT INTO `dg_empleados` VALUES (160, 'Luis ', 'Delgado', 'Luis.Delgado', '11039268', '1', ' 58 04164292637', '11039268', 'OYM (6 PAX)', 'luis.delgado@mmdmcs.com', 40, 'REMOTO', 'OYM', 'OYM ', NULL, NULL, NULL, '15 dy2791wm', '6M0Z6UA');
INSERT INTO `dg_empleados` VALUES (161, 'Orlando ', 'Benavides', 'Orlando.Benavides', '14128956', '1', '+58 04265194050', '14128956', 'OYM (6 PAX)', 'orlando.benavides@mmdmcs.com', 40, 'REMOTO', 'OYM', 'OYM ', NULL, NULL, NULL, 'Dell', 'AA583');
INSERT INTO `dg_empleados` VALUES (162, 'Monica ', 'Oca', 'Monica.Oca', '12338919', '1', '58 414-0521078', '12338919', 'OYM (6 PAX)', 'monica.oca@mmdmcs.com', 40, 'REMOTO', 'OYM', 'OYM ', NULL, NULL, '9C-2A-70-2A-08-E9', '15-inch, 2012', '6122550097');
INSERT INTO `dg_empleados` VALUES (163, 'Jaime ', 'Lopez', 'Jaime.Lopez', 'C01641641', '1', '+505 89391438', 'C01641641', 'BI (2 - Business Inteligent)', 'jaime.lopez@mmdmcs.com', 40, 'COLOMBIA', 'BIBOP', 'BI', NULL, '??????', '??????', 'F15', 'M3NRCX02Y420114');
INSERT INTO `dg_empleados` VALUES (164, 'Chavez ', 'Osmin', 'Chavez.Osmin', '0410407011003C', '1', '+505 58065327', '0410407011003C', 'BI (2 - Business Inteligent)', 'chavez.osmin@mmdmcs.com', 40, NULL, 'BIBOP', 'BI', NULL, 'K1905N0020646', NULL, 'GE63 RAIDER 9SE', 'K1905N0020646');
INSERT INTO `dg_empleados` VALUES (165, 'Jaime ', 'Lopez ', 'Jaime.Lopez.', 'C01641641', '1', '+505 89391438', 'C01641641', 'DataServices (3 pax DS - Datamart)', 'jaime.lopez@mmdmcs.com', 40, 'NICARAGUA / COLOMBIA', 'BC', 'BI', NULL, '??????', '??????', 'F15', 'M3NRCX02Y420114');
INSERT INTO `dg_empleados` VALUES (166, 'Chavez ', 'Osmin', 'Chavez.Osmin', '0410407011003C', '1', '+505 58065327', '0410407011003C', 'DataServices (3 pax DS - Datamart)', 'chavez.osmin@mmdmcs.com', 40, NULL, 'BC', 'BI', NULL, 'K1905N0020646', NULL, 'GE63 RAIDER 9SE', 'K1905N0020646');
INSERT INTO `dg_empleados` VALUES (167, 'Libardo ', 'Rodríguez', 'Libardo.Rodríguez', 'AS580515', '1', NULL, 'AS580515', 'DataServices (3 pax DS - Datamart)', 'libardo.rodriguez@mmdmcs.com ', 40, NULL, 'BC', 'BI', NULL, '88-A4-C2-08-A9-39', 'E0-75-26-0A-AF-99', 'ThinkPad X13 Gen2', 'PC-29L2RM');
INSERT INTO `dg_empleados` VALUES (168, 'Juan ', 'Merchan', 'Juan.Merchan', '149946229', '1', '+507 61597081', '149946229', 'PI', 'juan.merchan@mmdmcs.com', 40, 'PANAMA', 'PI', NULL, NULL, '88:66:5a:54:7d:a2', NULL, 'Macbook Pro', 'C02G908EMD6R');
INSERT INTO `dg_empleados` VALUES (169, 'Emir ', 'Morillo', 'Emir.Morillo', '11647505', '1', '+57 304 3551505', '11647505', 'PI', 'emir.morillo@mmdmcs.com', 40, 'COLOMBIA', 'PI', NULL, NULL, 'FC-01-7C-99-74-35', NULL, 'ENVY', 'SN');
INSERT INTO `dg_empleados` VALUES (170, 'Kira ', 'Rocha', 'Kira.Rocha', '988510', '1', '+507 6019-0587', '988510', 'PI', 'kira.rocha@mmdmcs.com ', 40, 'REMOTO', 'PI', NULL, NULL, '3c:06:30:18:58:21', NULL, '13 inch M1 2020', 'C02FX5EWQ05G');

-- ----------------------------
-- Table structure for dg_empleados_old
-- ----------------------------
DROP TABLE IF EXISTS `dg_empleados_old`;
CREATE TABLE `dg_empleados_old`  (
  `id_usu` int(11) NOT NULL AUTO_INCREMENT,
  `nom_usu` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `ape_usu` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `log_usu` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `pass_usu` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `act_usu` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `tel_usu` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `ced_usu` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `car_usu` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `cor_usu` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `rol_usu` int(11) NULL DEFAULT NULL,
  `ubicacionResidencia` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `ident` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `frenteAsignado` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `carnetizacion` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `pcMacLan` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `pcMacWam` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `pcModelo` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `pcSerial` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_usu`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 132 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of dg_empleados_old
-- ----------------------------
INSERT INTO `dg_empleados_old` VALUES (74, 'JESUS F', 'SANTANA S', 'jsantana', '123456', '1', '4244380137', '13336768', 'CONSULTOR', 'jfsantana77@gmail.com|', 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados_old` VALUES (122, 'JOSE', 'SALAZAR', 'c1', 'c1', '1', 'd', 'd', 'd', 'd', 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados_old` VALUES (123, 'Administrador', 'administrador', 'admin', 'admin', '1', '123', '123', '123', '123', 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados_old` VALUES (124, 'Aprobador', 'MPS', 'mps', 'mps', '1', '123', '123', '123', '123', 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados_old` VALUES (125, 'Finanzas', 'FI', 'fi', 'fi', '1', '123', '123', '123', '132', 30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados_old` VALUES (126, 'ALEJANDRO', 'PARRA', 'c2', 'c2', '1', '123', '123', '123', '132', 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados_old` VALUES (127, 'Aprobador', 'QP', 'qp', 'qp', '1', '123', '123', '123', '123', 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados_old` VALUES (128, 'Aprobador', 'MCS', 'mcs', 'mcs', '1', '123', '123', '132', '132', 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados_old` VALUES (129, 'Juan ', 'Merchan', 'Juan.Merchan', '149946229', '1', '+507 61597081', '149946229', 'Gerente de Proyecto para integraciones', 'juan.merchan@mmdmcs.com', 10, 'PANAMA/REMOTO', 'GTE', 'TECNICO', '', '', '', 'Macbook Pro', 'C02G908EMD6R');

-- ----------------------------
-- Table structure for dg_empresa_consultora
-- ----------------------------
DROP TABLE IF EXISTS `dg_empresa_consultora`;
CREATE TABLE `dg_empresa_consultora`  (
  `idEmpresaConsultora` int(11) NOT NULL AUTO_INCREMENT,
  `nombreEmpresaConsultora` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `activo` bit(1) NULL DEFAULT NULL,
  `idAprobador` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`idEmpresaConsultora`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dg_empresa_consultora
-- ----------------------------
INSERT INTO `dg_empresa_consultora` VALUES (1, 'MCS', b'1', 128);
INSERT INTO `dg_empresa_consultora` VALUES (2, 'MPS', b'1', 124);
INSERT INTO `dg_empresa_consultora` VALUES (3, 'QP', b'1', 127);

-- ----------------------------
-- Table structure for dg_proyecto
-- ----------------------------
DROP TABLE IF EXISTS `dg_proyecto`;
CREATE TABLE `dg_proyecto`  (
  `idProyecto` int(11) NOT NULL AUTO_INCREMENT,
  `nameProyecto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `fechaInicio` date NULL DEFAULT NULL,
  `fechaFin` date NULL DEFAULT NULL,
  `activo` bigint(20) NULL DEFAULT NULL,
  `gerenteProyecto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pais` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`idProyecto`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dg_proyecto
-- ----------------------------
INSERT INTO `dg_proyecto` VALUES (1, 'Actualizacion Tecnologica (P1)', '2023-10-02', '2024-05-15', 1, 'Luis Salas', 'VE', 'CCS');
INSERT INTO `dg_proyecto` VALUES (10, 'Creaciond el sistema de Getsion de Tiempo MPS-TIME ..', '2023-09-22', '2023-09-24', 1, 'Edgar Corao', 'VE', 'CARABOBO');

-- ----------------------------
-- Table structure for dg_reporte_factura
-- ----------------------------
DROP TABLE IF EXISTS `dg_reporte_factura`;
CREATE TABLE `dg_reporte_factura`  (
  `idFactura` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Correlativo',
  `idEmpleado` int(11) NULL DEFAULT NULL COMMENT 'Id del Consultor',
  `corte` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Corte al que pertenece el regitro MMAAAA',
  `urlFactura` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'URL de la Direccion del Drive Compatida de la Factura',
  `MontoFactura` float NULL DEFAULT NULL COMMENT 'Monto de la factura',
  `creadoPor` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'ususario que la cargo',
  `fechaCreacion` date NULL DEFAULT NULL,
  PRIMARY KEY (`idFactura`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dg_reporte_factura
-- ----------------------------
INSERT INTO `dg_reporte_factura` VALUES (1, 74, '082023', 'gogle', 1800, NULL, NULL);
INSERT INTO `dg_reporte_factura` VALUES (2, 74, '072023', 'mps.com', 1800, NULL, NULL);
INSERT INTO `dg_reporte_factura` VALUES (9, 122, '102023', 'https://drive.google.com/file/d/1-P3UC6w12MhZIET8PAA-I-Q_w7SQ6-3w/view?usp=drive_link', 2650, 'c1', '2023-09-29');
INSERT INTO `dg_reporte_factura` VALUES (8, 74, '092023', 'https://jsonformatter.curiousconcept.com/#', 2860, 'jsantana', '2023-09-24');
INSERT INTO `dg_reporte_factura` VALUES (10, 74, '102023', 'https://drive.google.com/file/d/1-P3UC6w12MhZIET8PAA-I-Q_w7SQ6-3w/view?usp=drive_link', 3500, 'jsantana', '2023-10-03');
INSERT INTO `dg_reporte_factura` VALUES (11, 74, '102023', 'https://drive.google.com/file/d/1-P3UC6w12MhZIET8PAA-I-Q_w7SQ6-3w/view?usp=drive_link', 2500, 'jsantana', '2023-10-04');

-- ----------------------------
-- Table structure for dg_reporte_tiempo
-- ----------------------------
DROP TABLE IF EXISTS `dg_reporte_tiempo`;
CREATE TABLE `dg_reporte_tiempo`  (
  `idRegistro` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Correlativo',
  `idEmpleado` int(11) NULL DEFAULT NULL COMMENT 'Id del Consultor',
  `idEmpresaConsultora` int(11) NULL DEFAULT NULL COMMENT 'ID de la Consultora Contratante',
  `idCliente` int(11) NULL DEFAULT NULL COMMENT 'Id Cliente',
  `idProyecto` int(11) NULL DEFAULT NULL COMMENT 'Id Proyecto',
  `idTipoActividad` int(11) NULL DEFAULT NULL COMMENT 'id Tipo de Actividad',
  `tipoAtencion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'REMOTO - PRESENCIAL',
  `descripcion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Descripcion de la Actividad',
  `fechaActividad` date NULL DEFAULT NULL COMMENT 'Fecha a Registrar',
  `hora` float(11, 2) NULL DEFAULT NULL COMMENT 'Horas registradas',
  `corte` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Corte al que pertenece el regitro MMAAAA',
  `fechaCreacion` date NULL DEFAULT NULL COMMENT 'Fecha de creacion del registro',
  `creadoPor` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Usuario que lo creo',
  `estadoAP1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'NUEVO(1) -RECHAZADO(2)-APROBADO(3)',
  `estadoAP2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'NUEVO(1)-RECHADADO(2)-PAGADO(3)',
  `fechaActualizacion` date NULL DEFAULT NULL COMMENT 'Fecha de actualizacion de estado',
  `actualizadoPor` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Usuario que realizo la ultima actualizacion',
  `observacionEstado` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`idRegistro`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 17 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dg_reporte_tiempo
-- ----------------------------
INSERT INTO `dg_reporte_tiempo` VALUES (1, 74, 2, 24, 10, 3, 'Remota', 'Elaboracionde los procesos para la creacion de la BD', '2023-09-22', 12.00, '092023', '2023-09-22', 'jsantana', '3', '1', '2023-10-05', 'jsantana', 'Aprobacion por Lote');
INSERT INTO `dg_reporte_tiempo` VALUES (2, 74, 2, 24, 10, 3, 'Remota', 'Creaciond el Template, Menu, Navegacion, Seguridad', '2023-09-23', 15.00, '092023', '2023-09-24', 'jsantana', '3', '1', '2023-10-05', 'jsantana', 'Aprobacion por Lote');
INSERT INTO `dg_reporte_tiempo` VALUES (4, 74, 2, 24, 10, 3, 'Remota', 'Desarrollo de los servicios del modulo Administrativo.', '2023-09-24', 10.00, '092023', '2023-09-25', 'jsantana', '3', '1', '2023-10-05', 'jsantana', 'Aprobacion por Lote');
INSERT INTO `dg_reporte_tiempo` VALUES (5, 74, 1, 1, 1, 1, 'Remota', 'Ejemplo del servicio de actualizar', '2023-09-08', 8.00, '082023', '2023-09-25', 'jsantana', '1', '1', '2023-09-25', 'jsantana', NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (6, 122, 2, 24, 10, 3, 'Remota', 'blabla', '2023-09-22', 20.00, '092023', '2023-09-22', 'jsantana', '3', '1', '2023-10-05', 'jsantana', 'Aprobacion por Lote');
INSERT INTO `dg_reporte_tiempo` VALUES (7, 126, 1, 1, 1, 1, 'Remota', 'ejemplo con CONSULTOR 40', '2023-09-26', 5.00, '092023', '2023-09-26', 'co', '3', '1', '2023-10-05', 'jsantana', 'Aprobacion por Lote');
INSERT INTO `dg_reporte_tiempo` VALUES (8, 74, 2, 24, 10, 3, 'Remota', 'se acomodo el flujo de aprobacion', '2023-09-26', 10.00, '092023', '2023-09-26', 'jsantana', '3', '1', '2023-10-05', 'jsantana', 'Aprobacion por Lote');
INSERT INTO `dg_reporte_tiempo` VALUES (16, 74, 2, 24, 10, 3, 'Remota', 'PRUEBAS INTEGRALES', '2023-10-04', 1.00, '102023', '2023-10-12', 'jsantana', '1', '1', '2023-10-12', 'jsantana', NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (9, 122, 2, 24, 10, 3, 'Remota', 'Se esta generando el manual de usuario para  el uso y carga', '2023-09-29', 6.00, '102023', '2023-09-29', 'c1', '3', '1', '2023-10-04', 'jsantana', 'Aprobacion por Lote');
INSERT INTO `dg_reporte_tiempo` VALUES (10, 74, 2, 24, 10, 3, 'Remota', 'Presntacion del prototipo', '2023-10-03', 2.00, '102023', '2023-10-03', 'jsantana', '3', '1', '2023-10-05', 'jsantana', 'Aprobacion por Lote');
INSERT INTO `dg_reporte_tiempo` VALUES (11, 122, 3, 1, 1, 4, 'Presencial', 'aaaaaaaaa', '2023-10-03', 20.00, '102023', '2023-10-03', 'c1', '3', '1', '2023-10-04', 'jsantana', 'Aprobacion por Lote');
INSERT INTO `dg_reporte_tiempo` VALUES (12, 122, 3, 1, 1, 3, 'Presencial', 'asdasdasdsad', '2023-10-02', 7.00, '102023', '2023-10-03', 'c1', '3', '1', '2023-10-04', 'jsantana', 'Aprobacion por Lote');
INSERT INTO `dg_reporte_tiempo` VALUES (13, 122, 2, 24, 10, 5, 'Presencial', 'tityiuyuityuityuityui', '2023-10-01', 5.00, '102023', '2023-10-03', 'c1', '3', '1', '2023-10-04', 'jsantana', 'Aprobacion por Lote');
INSERT INTO `dg_reporte_tiempo` VALUES (14, 74, 2, 24, 10, 5, 'Remota', 'Presentacion de la ap', '2023-10-04', 13.00, '102023', '2023-10-04', 'jsantana', '3', '1', '2023-10-05', 'jsantana', 'Aprobacion por Lote');
INSERT INTO `dg_reporte_tiempo` VALUES (15, 122, 1, 1, 1, 5, 'Remota', 'ertetrert', '2023-09-30', 5.00, '102023', '2023-10-04', 'c1', '3', '1', '2023-10-05', 'jsantana', 'Aprobacion por Lote');

-- ----------------------------
-- Table structure for dm_rol
-- ----------------------------
DROP TABLE IF EXISTS `dm_rol`;
CREATE TABLE `dm_rol`  (
  `id_rol` int(11) NOT NULL,
  `des_rol` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `creado_por` int(11) NULL DEFAULT NULL,
  `fecha_creacion` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `modificado_por` int(11) NULL DEFAULT NULL,
  `fecha_mod` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_rol`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of dm_rol
-- ----------------------------
INSERT INTO `dm_rol` VALUES (10, 'Administrador', NULL, NULL, NULL, NULL);
INSERT INTO `dm_rol` VALUES (20, 'Aprobador', NULL, NULL, NULL, NULL);
INSERT INTO `dm_rol` VALUES (30, 'Finanzas', NULL, NULL, NULL, NULL);
INSERT INTO `dm_rol` VALUES (40, 'Consultor', NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for dm_tipo_actividad
-- ----------------------------
DROP TABLE IF EXISTS `dm_tipo_actividad`;
CREATE TABLE `dm_tipo_actividad`  (
  `irTipoActividad` int(11) NOT NULL AUTO_INCREMENT,
  `descripcionTipoActividad` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`irTipoActividad`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dm_tipo_actividad
-- ----------------------------
INSERT INTO `dm_tipo_actividad` VALUES (1, 'Preparar BPD');
INSERT INTO `dm_tipo_actividad` VALUES (2, 'Explorar');
INSERT INTO `dm_tipo_actividad` VALUES (3, 'Realizar');
INSERT INTO `dm_tipo_actividad` VALUES (4, 'Pruebas Unitarias');
INSERT INTO `dm_tipo_actividad` VALUES (5, 'Pruebas Integrales ');
INSERT INTO `dm_tipo_actividad` VALUES (6, 'Pruebas UAT');
INSERT INTO `dm_tipo_actividad` VALUES (7, 'Salida a PRD');
INSERT INTO `dm_tipo_actividad` VALUES (8, 'Soporte');
INSERT INTO `dm_tipo_actividad` VALUES (9, 'Taller a Clientes');
INSERT INTO `dm_tipo_actividad` VALUES (10, 'Soporte Continuidad Operativa');
INSERT INTO `dm_tipo_actividad` VALUES (11, 'Garantia');

-- ----------------------------
-- Table structure for rel_clienteproyecto
-- ----------------------------
DROP TABLE IF EXISTS `rel_clienteproyecto`;
CREATE TABLE `rel_clienteproyecto`  (
  `idCliente` int(11) NOT NULL,
  `idProyecto` int(11) NOT NULL,
  PRIMARY KEY (`idCliente`, `idProyecto`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of rel_clienteproyecto
-- ----------------------------
INSERT INTO `rel_clienteproyecto` VALUES (1, 1);
INSERT INTO `rel_clienteproyecto` VALUES (24, 0);
INSERT INTO `rel_clienteproyecto` VALUES (24, 6);
INSERT INTO `rel_clienteproyecto` VALUES (24, 7);
INSERT INTO `rel_clienteproyecto` VALUES (24, 8);
INSERT INTO `rel_clienteproyecto` VALUES (24, 9);
INSERT INTO `rel_clienteproyecto` VALUES (24, 10);

-- ----------------------------
-- View structure for vw_consolidado_horas_consultora_corte
-- ----------------------------
DROP VIEW IF EXISTS `vw_consolidado_horas_consultora_corte`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `vw_consolidado_horas_consultora_corte` AS select `ec`.`nombreEmpresaConsultora` AS `nombreEmpresaConsultora`,`rt`.`corte` AS `corte`,sum(`rt`.`hora`) AS `total` from (`dg_reporte_tiempo` `rt` join `dg_empresa_consultora` `ec` on((`rt`.`idEmpresaConsultora` = `ec`.`idEmpresaConsultora`))) group by `rt`.`idEmpresaConsultora`,`rt`.`corte` order by `ec`.`nombreEmpresaConsultora` desc;

-- ----------------------------
-- View structure for vw_consolidado_horas_consultores
-- ----------------------------
DROP VIEW IF EXISTS `vw_consolidado_horas_consultores`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `vw_consolidado_horas_consultores` AS select `rt`.`idRegistro` AS `idRegistro`,`emp`.`id_usu` AS `id_usu`,concat(`emp`.`ape_usu`,', ',`emp`.`nom_usu`) AS `nombre`,`ec`.`nombreEmpresaConsultora` AS `nombreEmpresaConsultora`,`dg_cliente`.`NombreCliente` AS `NombreCliente`,`rt`.`idProyecto` AS `idProyecto`,`dg_proyecto`.`nameProyecto` AS `nameProyecto`,`rt`.`corte` AS `corte`,`ec`.`idAprobador` AS `idAprobador`,sum((case when (`rt`.`estadoAP1` = 1) then `rt`.`hora` else 0 end)) AS `Nuevas`,sum((case when (`rt`.`estadoAP1` = 2) then `rt`.`hora` else 0 end)) AS `Rechazadas`,sum((case when (`rt`.`estadoAP1` = 3) then `rt`.`hora` else 0 end)) AS `Aprobadas` from ((((`dg_reporte_tiempo` `rt` join `dg_empleados` `emp` on((`rt`.`idEmpleado` = `emp`.`id_usu`))) join `dg_empresa_consultora` `ec` on((`rt`.`idEmpresaConsultora` = `ec`.`idEmpresaConsultora`))) join `dg_cliente` on((`rt`.`idCliente` = `dg_cliente`.`idCliente`))) join `dg_proyecto` on((`rt`.`idProyecto` = `dg_proyecto`.`idProyecto`))) group by `rt`.`idEmpleado`,`rt`.`idEmpresaConsultora`,`ec`.`idAprobador`,`rt`.`idCliente`,`rt`.`idProyecto`,`rt`.`corte`;

-- ----------------------------
-- View structure for vw_consolidado_proyecto_corte
-- ----------------------------
DROP VIEW IF EXISTS `vw_consolidado_proyecto_corte`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `vw_consolidado_proyecto_corte` AS select `dg_proyecto`.`nameProyecto` AS `nameProyecto`,`dg_cliente`.`NombreCliente` AS `NombreCliente`,sum(`rt`.`hora`) AS `total` from ((`dg_reporte_tiempo` `rt` join `dg_cliente` on((`rt`.`idCliente` = `dg_cliente`.`idCliente`))) join `dg_proyecto` on((`rt`.`idProyecto` = `dg_proyecto`.`idProyecto`))) group by `rt`.`idProyecto`,`rt`.`idCliente` order by `dg_cliente`.`NombreCliente` desc;

-- ----------------------------
-- View structure for vw_horas_reales_mensuales_consultor
-- ----------------------------
DROP VIEW IF EXISTS `vw_horas_reales_mensuales_consultor`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `vw_horas_reales_mensuales_consultor` AS select concat(`dg_empleados`.`nom_usu`,', ',`dg_empleados`.`ape_usu`) AS `Consultor`,`dg_empleados`.`ced_usu` AS `Cedula`,`dg_empresa_consultora`.`nombreEmpresaConsultora` AS `Consultora`,concat(`e`.`ape_usu`,', ',`e`.`nom_usu`) AS `Aprobador`,`dg_cliente`.`NombreCliente` AS `Cliente`,month(`dg_reporte_tiempo`.`fechaActividad`) AS `Mes`,sum(`dg_reporte_tiempo`.`hora`) AS `totalHoras` from ((((((`dg_reporte_tiempo` join `dg_empleados` on((`dg_reporte_tiempo`.`idEmpleado` = `dg_empleados`.`id_usu`))) join `dg_empresa_consultora` on((`dg_reporte_tiempo`.`idEmpresaConsultora` = `dg_empresa_consultora`.`idEmpresaConsultora`))) join `dg_empleados` `e` on((`dg_empresa_consultora`.`idAprobador` = `e`.`id_usu`))) join `dg_cliente` on((`dg_reporte_tiempo`.`idCliente` = `dg_cliente`.`idCliente`))) join `dg_proyecto` on((`dg_reporte_tiempo`.`idProyecto` = `dg_proyecto`.`idProyecto`))) join `dm_tipo_actividad` on((`dg_reporte_tiempo`.`idTipoActividad` = `dm_tipo_actividad`.`irTipoActividad`))) where (`dg_reporte_tiempo`.`estadoAP1` = 3) group by `dg_empleados`.`nom_usu`,`dg_empleados`.`ape_usu`,`dg_empleados`.`ced_usu`,`dg_empresa_consultora`.`nombreEmpresaConsultora`,`e`.`ape_usu`,`e`.`nom_usu`,`dg_cliente`.`NombreCliente`,month(`dg_reporte_tiempo`.`fechaActividad`) order by `Mes`;

-- ----------------------------
-- View structure for vw_porconsultora
-- ----------------------------
DROP VIEW IF EXISTS `vw_porconsultora`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `vw_porconsultora` AS select `dg_empresa_consultora`.`nombreEmpresaConsultora` AS `nombreEmpresaConsultora`,concat(`dg_empleados`.`ape_usu`,', ',`dg_empleados`.`nom_usu`) AS `Nombre`,sum(`dg_reporte_tiempo`.`hora`) AS `sum(dg_reporte_tiempo.hora)` from ((`dg_empleados` join `dg_reporte_tiempo` on((`dg_empleados`.`id_usu` = `dg_reporte_tiempo`.`idEmpleado`))) join `dg_empresa_consultora` on((`dg_reporte_tiempo`.`idEmpresaConsultora` = `dg_empresa_consultora`.`idEmpresaConsultora`))) where (`dg_reporte_tiempo`.`estadoAP1` = 3) group by `dg_empresa_consultora`.`nombreEmpresaConsultora`,`dg_empleados`.`ape_usu`,`dg_empleados`.`nom_usu` order by `dg_empresa_consultora`.`nombreEmpresaConsultora`;

SET FOREIGN_KEY_CHECKS = 1;
