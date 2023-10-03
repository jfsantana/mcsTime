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

 Date: 03/10/2023 09:28:16
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
) ENGINE = MyISAM AUTO_INCREMENT = 490 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Dynamic;

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
  PRIMARY KEY (`id_usu`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 127 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of dg_empleados
-- ----------------------------
INSERT INTO `dg_empleados` VALUES (74, 'JESUS F', 'SANTANA S', 'jsantana', '123456', '1', '4244380137', '13336768', 'CONSULTOR', 'jfsantana77@gmail.com|', 10);
INSERT INTO `dg_empleados` VALUES (122, 'JOSE', 'SALAZAR', 'c1', 'c1', '1', 'd', 'd', 'd', 'd', 40);
INSERT INTO `dg_empleados` VALUES (123, 'Administrador', 'administrador', 'admin', 'admin', '1', '123', '123', '123', '123', 10);
INSERT INTO `dg_empleados` VALUES (124, 'Aprobador', 'Aprob', 'ap', 'ap', '1', '123', '123', '123', '123', 20);
INSERT INTO `dg_empleados` VALUES (125, 'Finanzas', 'FI', 'fi', 'fi', '1', '123', '123', '123', '132', 30);
INSERT INTO `dg_empleados` VALUES (126, 'ALEJANDRO', 'PARRA', 'c2', 'c2', '1', '123', '123', '123', '132', 40);

-- ----------------------------
-- Table structure for dg_empresa_consultora
-- ----------------------------
DROP TABLE IF EXISTS `dg_empresa_consultora`;
CREATE TABLE `dg_empresa_consultora`  (
  `idEmpresaConsultora` int(11) NOT NULL AUTO_INCREMENT,
  `nombreEmpresaConsultora` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `activo` bit(1) NULL DEFAULT NULL,
  PRIMARY KEY (`idEmpresaConsultora`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dg_empresa_consultora
-- ----------------------------
INSERT INTO `dg_empresa_consultora` VALUES (1, 'MCS', b'1');
INSERT INTO `dg_empresa_consultora` VALUES (2, 'MPS', b'1');
INSERT INTO `dg_empresa_consultora` VALUES (3, 'QP', b'1');

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
) ENGINE = MyISAM AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dg_reporte_factura
-- ----------------------------
INSERT INTO `dg_reporte_factura` VALUES (1, 74, '082023', 'gogle', 1800, NULL, NULL);
INSERT INTO `dg_reporte_factura` VALUES (2, 74, '072023', 'mps.com', 1800, NULL, NULL);
INSERT INTO `dg_reporte_factura` VALUES (9, 122, '102023', 'https://drive.google.com/file/d/1-P3UC6w12MhZIET8PAA-I-Q_w7SQ6-3w/view?usp=drive_link', 2650, 'c1', '2023-09-29');
INSERT INTO `dg_reporte_factura` VALUES (8, 74, '092023', 'https://jsonformatter.curiousconcept.com/#', 2860, 'jsantana', '2023-09-24');
INSERT INTO `dg_reporte_factura` VALUES (10, 74, '102023', 'https://drive.google.com/file/d/1-P3UC6w12MhZIET8PAA-I-Q_w7SQ6-3w/view?usp=drive_link', 3500, 'jsantana', '2023-10-03');

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
) ENGINE = MyISAM AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dg_reporte_tiempo
-- ----------------------------
INSERT INTO `dg_reporte_tiempo` VALUES (1, 74, 2, 24, 10, 3, 'Remota', 'Elaboracionde los procesos para la creacion de la BD', '2023-09-22', 12.00, '092023', '2023-09-22', 'jsantana', '1', '1', '2023-09-26', 'ap', NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (2, 74, 2, 24, 10, 3, 'Remota', 'Creaciond el Template, Menu, Navegacion, Seguridad', '2023-09-23', 15.00, '092023', '2023-09-24', 'jsantana', '1', '1', '2023-09-24', 'jsantana', NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (4, 74, 2, 24, 10, 3, 'Remota', 'Desarrollo de los servicios del modulo Administrativo.', '2023-09-24', 10.00, '092023', '2023-09-25', 'jsantana', '2', '1', '2023-09-26', 'ap', 'Me parece que debes bajar el numero de horas pÂ´ro que el usuario no las aprobo');
INSERT INTO `dg_reporte_tiempo` VALUES (5, 74, 1, 1, 1, 1, 'Remota', 'Ejemplo del servicio de actualizar', '2023-09-08', 8.00, '082023', '2023-09-25', 'jsantana', '3', '1', '2023-09-25', 'jsantana', NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (6, 122, 2, 24, 10, 3, 'Remota', 'blabla', '2023-09-22', 20.00, '092023', '2023-09-22', 'jsantana', '3', '1', '2023-09-26', 'jsantana', 'Aprobacion por Lote');
INSERT INTO `dg_reporte_tiempo` VALUES (7, 126, 1, 1, 1, 1, 'Remota', 'ejemplo con CONSULTOR 40', '2023-09-26', 5.00, '092023', '2023-09-26', 'co', '2', '1', '2023-09-27', 'jsantana', 'debe aumentar las horas por que es muy buen trabajador');
INSERT INTO `dg_reporte_tiempo` VALUES (8, 74, 2, 24, 10, 3, 'Remota', 'se acomodo el flujo de aprobacion', '2023-09-26', 10.00, '092023', '2023-09-26', 'jsantana', '3', '1', '2023-09-26', 'ap', '');
INSERT INTO `dg_reporte_tiempo` VALUES (9, 122, 2, 24, 10, 3, 'Remota', 'Se esta generando el manual de usuario para  el uso y carga', '2023-09-29', 6.00, '102023', '2023-09-29', 'c1', '3', '1', '2023-10-03', 'ap', 'Aprobacion por Lote');
INSERT INTO `dg_reporte_tiempo` VALUES (10, 74, 2, 24, 10, 3, 'Remota', 'Presntacion del prototipo', '2023-10-03', 2.00, '102023', '2023-10-03', 'jsantana', '1', '1', '2023-10-03', 'jsantana', NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (11, 122, 3, 1, 1, 4, 'Presencial', 'aaaaaaaaa', '2023-10-03', 20.00, '102023', '2023-10-03', 'c1', '2', '1', '2023-10-03', 'ap', 'Aprobacasdasdasdasion por Lote');
INSERT INTO `dg_reporte_tiempo` VALUES (12, 122, 3, 1, 1, 3, 'Presencial', 'asdasdasdsad', '2023-10-02', 7.00, '102023', '2023-10-03', 'c1', '1', '1', '2023-10-03', 'ap', 'Aprobacion por Lote');
INSERT INTO `dg_reporte_tiempo` VALUES (13, 122, 2, 24, 10, 5, 'Presencial', 'tityiuyuityuityuityui', '2023-10-01', 9.00, '102023', '2023-10-03', 'c1', '3', '1', '2023-10-03', 'ap', 'Aprobacion por Lote');

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
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `vw_consolidado_horas_consultores` AS select `rt`.`idRegistro` AS `idRegistro`,`emp`.`id_usu` AS `id_usu`,concat(`emp`.`ape_usu`,', ',`emp`.`nom_usu`) AS `nombre`,`ec`.`nombreEmpresaConsultora` AS `nombreEmpresaConsultora`,`dg_cliente`.`NombreCliente` AS `NombreCliente`,`rt`.`idProyecto` AS `idProyecto`,`dg_proyecto`.`nameProyecto` AS `nameProyecto`,`rt`.`corte` AS `corte`,sum((case when (`rt`.`estadoAP1` = 1) then `rt`.`hora` else 0 end)) AS `Nuevas`,sum((case when (`rt`.`estadoAP1` = 2) then `rt`.`hora` else 0 end)) AS `Rechazadas`,sum((case when (`rt`.`estadoAP1` = 3) then `rt`.`hora` else 0 end)) AS `Aprobadas` from ((((`dg_reporte_tiempo` `rt` join `dg_empleados` `emp` on((`rt`.`idEmpleado` = `emp`.`id_usu`))) join `dg_empresa_consultora` `ec` on((`rt`.`idEmpresaConsultora` = `ec`.`idEmpresaConsultora`))) join `dg_cliente` on((`rt`.`idCliente` = `dg_cliente`.`idCliente`))) join `dg_proyecto` on((`rt`.`idProyecto` = `dg_proyecto`.`idProyecto`))) group by `rt`.`idEmpleado`,`rt`.`idEmpresaConsultora`,`rt`.`idCliente`,`rt`.`idProyecto`,`rt`.`corte`;

-- ----------------------------
-- View structure for vw_consolidado_proyecto_corte
-- ----------------------------
DROP VIEW IF EXISTS `vw_consolidado_proyecto_corte`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `vw_consolidado_proyecto_corte` AS select `dg_proyecto`.`nameProyecto` AS `nameProyecto`,`dg_cliente`.`NombreCliente` AS `NombreCliente`,sum(`rt`.`hora`) AS `total` from ((`dg_reporte_tiempo` `rt` join `dg_cliente` on((`rt`.`idCliente` = `dg_cliente`.`idCliente`))) join `dg_proyecto` on((`rt`.`idProyecto` = `dg_proyecto`.`idProyecto`))) group by `rt`.`idProyecto`,`rt`.`idCliente` order by `dg_cliente`.`NombreCliente` desc;

-- ----------------------------
-- View structure for vw_porconsultora
-- ----------------------------
DROP VIEW IF EXISTS `vw_porconsultora`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `vw_porconsultora` AS select `dg_empresa_consultora`.`nombreEmpresaConsultora` AS `nombreEmpresaConsultora`,concat(`dg_empleados`.`ape_usu`,', ',`dg_empleados`.`nom_usu`) AS `Nombre`,sum(`dg_reporte_tiempo`.`hora`) AS `sum(dg_reporte_tiempo.hora)` from ((`dg_empleados` join `dg_reporte_tiempo` on((`dg_empleados`.`id_usu` = `dg_reporte_tiempo`.`idEmpleado`))) join `dg_empresa_consultora` on((`dg_reporte_tiempo`.`idEmpresaConsultora` = `dg_empresa_consultora`.`idEmpresaConsultora`))) where (`dg_reporte_tiempo`.`estadoAP1` = 3) group by `dg_empresa_consultora`.`nombreEmpresaConsultora`,`dg_empleados`.`ape_usu`,`dg_empleados`.`nom_usu` order by `dg_empresa_consultora`.`nombreEmpresaConsultora`;

SET FOREIGN_KEY_CHECKS = 1;
