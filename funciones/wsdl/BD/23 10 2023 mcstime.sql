/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 80031 (8.0.31)
 Source Host           : localhost:3306
 Source Schema         : mcstime

 Target Server Type    : MySQL
 Target Server Version : 80031 (8.0.31)
 File Encoding         : 65001

 Date: 23/10/2023 06:57:33
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for dg_cliente
-- ----------------------------
DROP TABLE IF EXISTS `dg_cliente`;
CREATE TABLE `dg_cliente`  (
  `idCliente` int NOT NULL AUTO_INCREMENT,
  `NombreCliente` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `activo` bit(1) NULL DEFAULT NULL,
  PRIMARY KEY (`idCliente`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 25 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of dg_cliente
-- ----------------------------
INSERT INTO `dg_cliente` VALUES (1, 'P1', b'1');
INSERT INTO `dg_cliente` VALUES (2, 'M2-Petroquimica', b'0');
INSERT INTO `dg_cliente` VALUES (24, 'MPS Inc.', b'1');

-- ----------------------------
-- Table structure for dg_empleado_token
-- ----------------------------
DROP TABLE IF EXISTS `dg_empleado_token`;
CREATE TABLE `dg_empleado_token`  (
  `empleadoTokenId` int NOT NULL AUTO_INCREMENT,
  `log_usu` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NULL DEFAULT NULL,
  `token` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NULL DEFAULT NULL,
  `estado` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NULL DEFAULT NULL,
  `fecha` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`empleadoTokenId`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 764 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_spanish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of dg_empleado_token
-- ----------------------------
INSERT INTO `dg_empleado_token` VALUES (544, 'jsantana', 'ff91b6dcf63b9cab66cf71f8bafedbc4', '1', '2023-10-12 20:10:00');
INSERT INTO `dg_empleado_token` VALUES (545, 'jsantana', '2b22bbfc2cb68e6f746a7e630c406db9', '1', '2023-10-12 20:13:00');
INSERT INTO `dg_empleado_token` VALUES (546, 'admin', '38675b3f3fa9fa3a684cb499532c99ef', '1', '2023-10-12 20:13:00');
INSERT INTO `dg_empleado_token` VALUES (547, 'admin', '85389854a97d933a859605b36896c8e2', '1', '2023-10-12 20:24:00');
INSERT INTO `dg_empleado_token` VALUES (548, 'admin', '24611577903344e2045fa4cc3335ce70', '1', '2023-10-12 20:24:00');
INSERT INTO `dg_empleado_token` VALUES (549, 'jsantana', 'c4c1a801899e723424f332cb5756daab', '1', '2023-10-12 20:25:00');
INSERT INTO `dg_empleado_token` VALUES (550, 'jsantana', 'b3b931a7a52d7ea5043d675361f1766a', '1', '2023-10-12 20:27:00');
INSERT INTO `dg_empleado_token` VALUES (551, 'jsantana', 'f3b17044f7d2a33b5dcc3bd37a288d17', '1', '2023-10-12 21:03:00');
INSERT INTO `dg_empleado_token` VALUES (552, 'admin', 'c87a22c85fa84f1ef114f6a9aaabfcdd', '1', '2023-10-12 21:03:00');
INSERT INTO `dg_empleado_token` VALUES (553, 'jsantana', '9411ba1546b5f195c23ea619b600df28', '1', '2023-10-12 22:21:00');
INSERT INTO `dg_empleado_token` VALUES (554, 'jsantana', '79bd9e30b7d5f99a48d1402979fa9f3b', '1', '2023-10-16 00:36:00');
INSERT INTO `dg_empleado_token` VALUES (555, 'admin', '3cedc203ca9754483defe8c9fd0ac912', '1', '2023-10-16 00:36:00');
INSERT INTO `dg_empleado_token` VALUES (556, 'admin', '8da54969985978c57a1b76a99ea97404', '1', '2023-10-16 05:12:00');
INSERT INTO `dg_empleado_token` VALUES (557, 'admin', '26e3f01fc1dcc9358616f3170b067353', '1', '2023-10-16 13:57:00');
INSERT INTO `dg_empleado_token` VALUES (558, 'admin', 'fdef73de5ff759706317b0df3db0ad2f', '1', '2023-10-16 14:43:00');
INSERT INTO `dg_empleado_token` VALUES (559, 'Jose.Alvarado', 'e0bff57f96cfb403a03641364841f16d', '1', '2023-10-16 14:44:00');
INSERT INTO `dg_empleado_token` VALUES (560, 'admin', 'f907484186480adb1e0855168460fdf4', '1', '2023-10-16 16:28:00');
INSERT INTO `dg_empleado_token` VALUES (561, 'Jose.Alvarado', 'af4c13f1c1ef399be691d326ee5fa84b', '1', '2023-10-16 18:11:00');
INSERT INTO `dg_empleado_token` VALUES (562, 'c1', '864ef78306c488ffd37f558c54d27895', '1', '2023-10-16 18:16:00');
INSERT INTO `dg_empleado_token` VALUES (563, 'Jose.Alvarado', '4f4b02c3c061f2c0b03ec42bff3d6f2b', '1', '2023-10-16 18:18:00');
INSERT INTO `dg_empleado_token` VALUES (564, 'mcs', 'feb7324546403fef49a07354d3247e53', '1', '2023-10-16 18:19:00');
INSERT INTO `dg_empleado_token` VALUES (565, 'fi', 'ae1d08282107c3437796a809ec4b42ae', '1', '2023-10-16 18:24:00');
INSERT INTO `dg_empleado_token` VALUES (566, 'c1', 'ff478373f34bb9c3f4b1861203dfbe68', '1', '2023-10-16 18:27:00');
INSERT INTO `dg_empleado_token` VALUES (567, 'admin', '864c3a1555f9d6932dc279363963780b', '1', '2023-10-16 18:27:00');
INSERT INTO `dg_empleado_token` VALUES (568, 'Jose.Alvarado', 'f5fcc3d5da2ecafcbc3f812c75ce6b3b', '1', '2023-10-16 18:46:00');
INSERT INTO `dg_empleado_token` VALUES (569, 'Jose.Alvarado', '176db451d598c4fc3b2d47e95945e9c1', '1', '2023-10-16 19:03:00');
INSERT INTO `dg_empleado_token` VALUES (570, 'admin', '96dfe84baa77622e669c13f29ace1108', '1', '2023-10-16 19:09:00');
INSERT INTO `dg_empleado_token` VALUES (571, 'admin', '8e110c98b118d901fbf8b95444b0daed', '1', '2023-10-16 19:10:00');
INSERT INTO `dg_empleado_token` VALUES (572, 'Jose.Alvarado', 'd47552ce45932d46e5ccd1919c7271b6', '1', '2023-10-16 19:12:00');
INSERT INTO `dg_empleado_token` VALUES (573, 'admin', '2540b55fff742ffeb9b607f99ce12513', '1', '2023-10-16 23:15:00');
INSERT INTO `dg_empleado_token` VALUES (574, 'admin', 'd8d7c43b7e980fea8e7685d11935692a', '1', '2023-10-16 23:33:00');
INSERT INTO `dg_empleado_token` VALUES (575, 'admin', 'c4e79ef95a75337f83568e207e042f15', '1', '2023-10-16 23:35:00');
INSERT INTO `dg_empleado_token` VALUES (576, 'admin', '8cbb43fa5c16728f2b86c0a3c2da8caa', '1', '2023-10-16 23:36:00');
INSERT INTO `dg_empleado_token` VALUES (577, 'Jose.Alvarado', '8866cd646eaa218974ab9d9d8c506076', '1', '2023-10-17 10:52:00');
INSERT INTO `dg_empleado_token` VALUES (578, 'admin', '08d1e0dabf1196ca91940ac7bebbce54', '1', '2023-10-17 10:54:00');
INSERT INTO `dg_empleado_token` VALUES (579, 'admin', '822bb6129d22be433382bd057ea12368', '1', '2023-10-17 11:00:00');
INSERT INTO `dg_empleado_token` VALUES (580, 'fimcs', '9fb08d78c73e923b3b39547fa661ba72', '1', '2023-10-17 11:01:00');
INSERT INTO `dg_empleado_token` VALUES (581, 'admin', '6f06536c8ca1673c194374803aa9a15e', '1', '2023-10-17 12:22:00');
INSERT INTO `dg_empleado_token` VALUES (582, 'admin', 'ae2f23f8b789f372b69962e2973a4325', '1', '2023-10-17 13:02:00');
INSERT INTO `dg_empleado_token` VALUES (583, 'Jose.Alvarado', 'da072f8c6b664299c12d3cce55f86c0d', '1', '2023-10-17 13:04:00');
INSERT INTO `dg_empleado_token` VALUES (584, 'fimcs', '181583944faa60535bcc8a17728cc386', '1', '2023-10-17 13:23:00');
INSERT INTO `dg_empleado_token` VALUES (585, 'admin', '8ac80f9e5e0cce0c2eed6eede781e778', '1', '2023-10-17 13:25:00');
INSERT INTO `dg_empleado_token` VALUES (586, 'admin', '3050092b545ee47cf7a65fdeb249d85d', '1', '2023-10-17 13:31:00');
INSERT INTO `dg_empleado_token` VALUES (587, 'fimcs', 'ffd417304593337c0dd49e7d911b1e01', '1', '2023-10-17 13:34:00');
INSERT INTO `dg_empleado_token` VALUES (588, 'Luis.Salas', '876a9dc7ee84ba3224ab31eea5728b2a', '1', '2023-10-17 14:33:00');
INSERT INTO `dg_empleado_token` VALUES (589, 'admin', '10d0be430fced1a5454ca456aff126bd', '1', '2023-10-17 14:35:00');
INSERT INTO `dg_empleado_token` VALUES (590, 'Jose.Alvarado', 'b64669f52fd7ef9909e702391670f164', '1', '2023-10-17 16:36:00');
INSERT INTO `dg_empleado_token` VALUES (591, 'Breznev.Vega', '5d598d64ba983226146e930c8cbb2315', '1', '2023-10-17 16:38:00');
INSERT INTO `dg_empleado_token` VALUES (592, 'Hernan.Singer', 'adbbfd56c477ccf6e2eddf56e3a6f9b6', '1', '2023-10-17 16:40:00');
INSERT INTO `dg_empleado_token` VALUES (593, 'Lorena.Gonzalez', 'e9eb1cae9c7619dff2c93656f6359f6b', '1', '2023-10-17 17:44:00');
INSERT INTO `dg_empleado_token` VALUES (594, 'Lorena.Gonzalez', '1b8230b0f3c363752eb403288c7b971f', '1', '2023-10-17 17:46:00');
INSERT INTO `dg_empleado_token` VALUES (595, 'Jonathan.Diaz', '677eb2d4c9b3a4053cb5e7ac95154818', '1', '2023-10-17 17:52:00');
INSERT INTO `dg_empleado_token` VALUES (596, 'Jonathan.Diaz', '11d6718e9d2b73963a5393ecbdff29fc', '1', '2023-10-17 17:52:00');
INSERT INTO `dg_empleado_token` VALUES (597, 'admin', 'e1f8e68cdc2987096cd811323dc7a3db', '1', '2023-10-17 17:52:00');
INSERT INTO `dg_empleado_token` VALUES (598, 'Maria.Blasini', '6578d9cace0e8ca139b7d592290f1ef6', '1', '2023-10-17 17:52:00');
INSERT INTO `dg_empleado_token` VALUES (599, 'Luis.Salas', '366de44f4f46bcb642a1a2a42b4891d5', '1', '2023-10-17 17:54:00');
INSERT INTO `dg_empleado_token` VALUES (600, 'Juan.Merchan', '070f2551045a800e9cdfed28724ff8f7', '1', '2023-10-17 17:54:00');
INSERT INTO `dg_empleado_token` VALUES (601, 'Javier.Ortiz', '13376e5272a72c878a59b72bb640a12f', '1', '2023-10-17 17:54:00');
INSERT INTO `dg_empleado_token` VALUES (602, 'Benito.Valeriano', 'af06223d8f2f9da96d992de17dd9891d', '1', '2023-10-17 17:54:00');
INSERT INTO `dg_empleado_token` VALUES (603, 'Emperatriz.Prichinenko', 'c0baff9be2afc131c8a61e3a048c0d92', '1', '2023-10-17 17:55:00');
INSERT INTO `dg_empleado_token` VALUES (604, 'Maria.Marrero', 'cefb67f503255c0ed2bd684afcb5d1e9', '1', '2023-10-17 17:57:00');
INSERT INTO `dg_empleado_token` VALUES (605, 'Benito.Valeriano', '6fc837186a6878bd2ca3832080c776c6', '1', '2023-10-17 18:02:00');
INSERT INTO `dg_empleado_token` VALUES (606, 'Orlando.Benavides', 'bcb121b2717914cbc0b6acb66a063846', '1', '2023-10-17 18:03:00');
INSERT INTO `dg_empleado_token` VALUES (607, 'Luis.Delgado', 'b4f6c9591a40d90f664b96e62c6daa36', '1', '2023-10-17 18:11:00');
INSERT INTO `dg_empleado_token` VALUES (608, 'Carlex.Canelon', '6e372f8671cf6d35fff54404c26d6377', '1', '2023-10-17 18:12:00');
INSERT INTO `dg_empleado_token` VALUES (609, 'Carlex.Canelon', '0bdf6bd3729196a0cbe8ce04e6414ed9', '1', '2023-10-17 18:15:00');
INSERT INTO `dg_empleado_token` VALUES (610, 'Carlos.Fuenmayor', 'f977291431b258f2e132c882cab8d1d0', '1', '2023-10-17 18:16:00');
INSERT INTO `dg_empleado_token` VALUES (611, 'Benito.Valeriano', '7a69213cf2648a3ff57033a650bdd91f', '1', '2023-10-17 18:19:00');
INSERT INTO `dg_empleado_token` VALUES (612, 'Benito.Valeriano', '52d554af3a2f4cc3eb79f502dfd0a41f', '1', '2023-10-17 18:20:00');
INSERT INTO `dg_empleado_token` VALUES (613, 'admin', '9b032ac203ca57638d4adf5d4ebe115a', '1', '2023-10-17 18:33:00');
INSERT INTO `dg_empleado_token` VALUES (614, 'admin', 'cf80960fa8ddc5cab8666944db659f74', '1', '2023-10-17 18:45:00');
INSERT INTO `dg_empleado_token` VALUES (615, 'brezhnev.vega', 'c8685fc3a0ca3a4787c174d438ce7984', '1', '2023-10-17 18:46:00');
INSERT INTO `dg_empleado_token` VALUES (616, 'Juan.Merchan', '448abbb214cc38848d21f7a22d7b393c', '1', '2023-10-17 18:55:00');
INSERT INTO `dg_empleado_token` VALUES (617, 'admin', 'f7150dd499b73d195b2d94bab33eee1a', '1', '2023-10-17 18:57:00');
INSERT INTO `dg_empleado_token` VALUES (618, 'Orlando.Benavides', 'bba01857fb26059fa06ff3454d13af61', '1', '2023-10-17 19:19:00');
INSERT INTO `dg_empleado_token` VALUES (619, 'Pedro.Rodriguez', '812bffa425cb5b8efd723f4c2d94ed72', '1', '2023-10-17 20:05:00');
INSERT INTO `dg_empleado_token` VALUES (620, 'Maria.Marrero', 'a3e4df7d4265ea5c4da355272a8be3a1', '1', '2023-10-17 22:24:00');
INSERT INTO `dg_empleado_token` VALUES (621, 'Richard.Amaris', '31a4e5be126c6f361992257d96295bb5', '1', '2023-10-17 22:59:00');
INSERT INTO `dg_empleado_token` VALUES (622, 'Janeth.Lopez', '5271acf6678635a5c88d2880a12bec0b', '1', '2023-10-17 23:04:00');
INSERT INTO `dg_empleado_token` VALUES (623, 'Jennifer.Linares', '82f4fcb9878f40e1368a654d6db1cd96', '1', '2023-10-17 23:06:00');
INSERT INTO `dg_empleado_token` VALUES (624, 'Yosmar.Molina', '1cebb7b9e23118b23b628a1f59c4f64e', '1', '2023-10-18 00:49:00');
INSERT INTO `dg_empleado_token` VALUES (625, 'Yosmar.Molina', '73b8a3b2c47ee5035bf47a0a66345a04', '1', '2023-10-18 01:10:00');
INSERT INTO `dg_empleado_token` VALUES (626, 'Carlos.Fuenmayor', 'a9f4c7a00632649b8ea3e4bde2ec1a99', '1', '2023-10-18 01:40:00');
INSERT INTO `dg_empleado_token` VALUES (627, 'admin', '1e7febc3bc36bfe93687aaf826810b6c', '1', '2023-10-18 01:54:00');
INSERT INTO `dg_empleado_token` VALUES (628, 'admin', 'b5175a6718977d5b2ef956b4bf02cda7', '1', '2023-10-18 01:55:00');
INSERT INTO `dg_empleado_token` VALUES (629, 'Ali.Munoz', 'b75ea4ebe27636a0ce762adb238f4748', '1', '2023-10-18 10:00:00');
INSERT INTO `dg_empleado_token` VALUES (630, 'Katiuska.Andrade', '51284cb1f5dc40f2d4db79b82706503c', '1', '2023-10-18 10:03:00');
INSERT INTO `dg_empleado_token` VALUES (631, 'Ixia.Munoz', '5c7e0e91813c2981d1460fc532a82fff', '1', '2023-10-18 10:04:00');
INSERT INTO `dg_empleado_token` VALUES (632, 'Orlando.Benavides', '5fcbad4012b36a56220f291162a2e549', '1', '2023-10-18 11:49:00');
INSERT INTO `dg_empleado_token` VALUES (633, 'Elizabeth.Balza', 'e4e2303324e1a0aef5038bf41545dd42', '1', '2023-10-18 12:00:00');
INSERT INTO `dg_empleado_token` VALUES (634, 'Ali.Munoz', '4ea76e9279f84169c70948b2c4541918', '1', '2023-10-18 12:10:00');
INSERT INTO `dg_empleado_token` VALUES (635, 'Viveka.Gonzalez', '25c63c7d5e19832ec89d5c7fc9855c91', '1', '2023-10-18 12:13:00');
INSERT INTO `dg_empleado_token` VALUES (636, 'Jose.Rodriguez', '7132d04e07a7f839a57fbd8f5c103618', '1', '2023-10-18 12:17:00');
INSERT INTO `dg_empleado_token` VALUES (637, 'Maria.Blasini', '693038a2f5af47d9ea28b64abc477107', '1', '2023-10-18 12:17:00');
INSERT INTO `dg_empleado_token` VALUES (638, 'Monica.Oca', 'f18f6be8dda3c1d8c98e573c55168b50', '1', '2023-10-18 12:26:00');
INSERT INTO `dg_empleado_token` VALUES (639, 'Luis.Bautista', '73f078f94ee7d0182503d2ab17133c72', '1', '2023-10-18 12:57:00');
INSERT INTO `dg_empleado_token` VALUES (640, 'Luis.Bautista', '7dfa9ff2a6853d6fe95747b28095f6cf', '1', '2023-10-18 12:57:00');
INSERT INTO `dg_empleado_token` VALUES (641, 'Carlex.Canelon', '9d7d9a4c346e23d205f663775b26e50e', '1', '2023-10-18 13:43:00');
INSERT INTO `dg_empleado_token` VALUES (642, 'Lillie.Munoz', '9c6b94b37a081043321961269486db14', '1', '2023-10-18 14:13:00');
INSERT INTO `dg_empleado_token` VALUES (643, 'Luis.Bautista', '5dd2cb8649f4ba9a125458d4391aec2b', '1', '2023-10-18 14:22:00');
INSERT INTO `dg_empleado_token` VALUES (644, 'Luis.Bautista', 'ae08eddc1b8d913417cb2a91e38d781d', '1', '2023-10-18 14:22:00');
INSERT INTO `dg_empleado_token` VALUES (645, 'Luis.Bautista', '180a96e70862a72d84465aef18bf74d7', '1', '2023-10-18 14:22:00');
INSERT INTO `dg_empleado_token` VALUES (646, 'Luis.Bautista', '362d8afefd924cbde842a50356241281', '1', '2023-10-18 14:22:00');
INSERT INTO `dg_empleado_token` VALUES (647, 'Juan.Merchan', '04532b66a770f683fa105badfb10b3b4', '1', '2023-10-18 15:05:00');
INSERT INTO `dg_empleado_token` VALUES (648, 'Benito.Valeriano', '66658ce153e9f502ff62b8e3f6eea179', '1', '2023-10-18 15:38:00');
INSERT INTO `dg_empleado_token` VALUES (649, 'Katiuska.Andrade', 'c648344e266cd97abf00f9168518a427', '1', '2023-10-18 15:40:00');
INSERT INTO `dg_empleado_token` VALUES (650, 'Luis.Delgado', 'c714428ce72551362c69bfa9b4f2f578', '1', '2023-10-18 15:56:00');
INSERT INTO `dg_empleado_token` VALUES (651, 'Yosmar.Molina', '9431ea3505f2294aa80d7fd06c046142', '1', '2023-10-18 17:01:00');
INSERT INTO `dg_empleado_token` VALUES (652, 'Juan.Merchan', '0d73442b05a951b5df88e7acf85b6969', '1', '2023-10-18 17:10:00');
INSERT INTO `dg_empleado_token` VALUES (653, 'Herlinan.Singer', '281718e6d183a788d116f9327a5012ec', '1', '2023-10-18 18:13:00');
INSERT INTO `dg_empleado_token` VALUES (654, 'Emir.Morillo', 'eb5bda16f0ef25240b25197200b7e2ac', '1', '2023-10-18 18:38:00');
INSERT INTO `dg_empleado_token` VALUES (655, 'Viveka.Gonzalez', '3b6d7308b69ab6d6a027ffca8a91a0bd', '1', '2023-10-18 18:38:00');
INSERT INTO `dg_empleado_token` VALUES (656, 'Benito.Valeriano', 'acc5399d76514bc9c7f76b415c772bf1', '1', '2023-10-18 19:15:00');
INSERT INTO `dg_empleado_token` VALUES (657, 'Benito.Valeriano', '1dc1056eca8dee49a990239a7d76de9b', '1', '2023-10-18 19:57:00');
INSERT INTO `dg_empleado_token` VALUES (658, 'Javier.Ortiz', 'e3a65a96ffcb1fb8e0e595eb8e4dd5bc', '1', '2023-10-18 20:34:00');
INSERT INTO `dg_empleado_token` VALUES (659, 'Maria.Blasini', 'e631a04fad4a73f2d70b05c4a9b5d315', '1', '2023-10-18 20:46:00');
INSERT INTO `dg_empleado_token` VALUES (660, 'Maria.Blasini', '443cf054e6734b77b841c6d6e578e87f', '1', '2023-10-19 12:02:00');
INSERT INTO `dg_empleado_token` VALUES (661, 'Adriana.Martinez', '5e9aeea438f9e811d7e432b325dd9e2d', '1', '2023-10-19 12:03:00');
INSERT INTO `dg_empleado_token` VALUES (662, 'Elizabeth.Balza', 'c8849477c600ffe34f663aa257d2ca9b', '1', '2023-10-19 12:07:00');
INSERT INTO `dg_empleado_token` VALUES (663, 'Luis.Bautista', '98bbb4683d0a08ebdee3399bd8c9f870', '1', '2023-10-19 12:13:00');
INSERT INTO `dg_empleado_token` VALUES (664, 'Carlos.Fuenmayor', 'a964516ca9fabc7987b34e53c9874150', '1', '2023-10-19 13:00:00');
INSERT INTO `dg_empleado_token` VALUES (665, 'admin', 'c48c8b785ca17780e0270c974b13e103', '1', '2023-10-19 13:52:00');
INSERT INTO `dg_empleado_token` VALUES (666, 'Jose.Medina', '8c165012af9c5157a8bbb3bd92f778cf', '1', '2023-10-19 13:58:00');
INSERT INTO `dg_empleado_token` VALUES (667, 'admin', 'a2b43d5b115d42432e854eddd8471015', '1', '2023-10-19 13:59:00');
INSERT INTO `dg_empleado_token` VALUES (668, 'Lorena.Gonzalez', 'f3299412e981297ea13d2911b0cf5bc5', '1', '2023-10-19 14:00:00');
INSERT INTO `dg_empleado_token` VALUES (669, 'Jose.Alvarado', '3c66126894ef2f7fdf558b129960aebf', '1', '2023-10-19 14:01:00');
INSERT INTO `dg_empleado_token` VALUES (670, 'Orlando.Labrador', '59e427c452ac72d2f8005a2d6702ca9c', '1', '2023-10-19 14:05:00');
INSERT INTO `dg_empleado_token` VALUES (671, 'Orlando.Labrador', 'ca45d98a2ecf753df0672b5a2e1d7f32', '1', '2023-10-19 14:07:00');
INSERT INTO `dg_empleado_token` VALUES (672, 'admin', '8d19e49ae4091d253e99808a876134fc', '1', '2023-10-19 15:35:00');
INSERT INTO `dg_empleado_token` VALUES (673, 'brezhnev.vega', 'f97ee2912d35369633e4833399a5b754', '1', '2023-10-19 16:04:00');
INSERT INTO `dg_empleado_token` VALUES (674, 'Kira.Rocha', '7cea83ffbdb9a997e4f03a91a3f58f71', '1', '2023-10-19 16:27:00');
INSERT INTO `dg_empleado_token` VALUES (675, 'Jaime.Lopez', '2f439443cc70489af4653072a84c9adc', '1', '2023-10-19 17:04:00');
INSERT INTO `dg_empleado_token` VALUES (676, 'Jaime.Lopez', 'f9f36b188cb5a1795bcfc2e770d8c44b', '1', '2023-10-19 17:08:00');
INSERT INTO `dg_empleado_token` VALUES (677, 'admin', '0c482f7cc9b094394fe05667f35487f7', '1', '2023-10-19 17:40:00');
INSERT INTO `dg_empleado_token` VALUES (678, 'Luis.Salas', '6ec90cbb0b42d6315cb7055088821675', '1', '2023-10-19 17:41:00');
INSERT INTO `dg_empleado_token` VALUES (679, 'Navarro.Marlegnis', '5861a132e3d5b447d875397c3069bac8', '1', '2023-10-19 17:42:00');
INSERT INTO `dg_empleado_token` VALUES (680, 'Chavez.Osmin', '047f42aae4f2e74819402a461e44590b', '1', '2023-10-19 17:45:00');
INSERT INTO `dg_empleado_token` VALUES (681, 'admin', 'b8c9478ce941cd4abf94ed33ed34ee8a', '1', '2023-10-19 17:45:00');
INSERT INTO `dg_empleado_token` VALUES (682, 'Chavez.Osmin', '68b7b4ea46b2c01860a06066a061a183', '1', '2023-10-19 17:53:00');
INSERT INTO `dg_empleado_token` VALUES (683, 'Chavez.Osmin', '8811a881c1fbbd4fcdb5f728ec73b6fd', '1', '2023-10-19 17:54:00');
INSERT INTO `dg_empleado_token` VALUES (684, 'Navarro.Marlegnis', 'f7d37eb4b444d8371c103584e2f68db2', '1', '2023-10-19 17:56:00');
INSERT INTO `dg_empleado_token` VALUES (685, 'Orlando.Labrador', 'aee987bc677a861c27809740de2763c5', '1', '2023-10-19 17:59:00');
INSERT INTO `dg_empleado_token` VALUES (686, 'Maria.Blasini', 'c5a70587b996fc6a1d4933641b08d313', '1', '2023-10-19 18:00:00');
INSERT INTO `dg_empleado_token` VALUES (687, 'brezhnev.vega', '655d1a5591df27ce7581a78701c38692', '1', '2023-10-19 18:05:00');
INSERT INTO `dg_empleado_token` VALUES (688, 'admin', 'e269038db389deacdda9bbb9b09e6ce4', '1', '2023-10-19 18:06:00');
INSERT INTO `dg_empleado_token` VALUES (689, 'Elizabeth.Balza', '571fa7c9c1da863332c6a5d1abbc3be3', '1', '2023-10-19 18:09:00');
INSERT INTO `dg_empleado_token` VALUES (690, 'Benito.Valeriano', '958ffa0d1492fe7763c1abbefda4a46f', '1', '2023-10-19 18:17:00');
INSERT INTO `dg_empleado_token` VALUES (691, 'Javier.Ortiz', '29dee422c87e2de71527ab87630d2b64', '1', '2023-10-19 18:19:00');
INSERT INTO `dg_empleado_token` VALUES (692, 'admin', '262f0093ab2ead36a6d86919c7b42f81', '1', '2023-10-19 19:22:00');
INSERT INTO `dg_empleado_token` VALUES (693, 'brezhnev.vega', '1967369d187d9760162941a1742e937a', '1', '2023-10-19 19:31:00');
INSERT INTO `dg_empleado_token` VALUES (694, 'Karla .Parada', '9494c400c7c21136b590923b7af41a8d', '1', '2023-10-19 19:45:00');
INSERT INTO `dg_empleado_token` VALUES (695, 'Karla .Parada', '865f68028df320d07746dc4cea4c7db8', '1', '2023-10-19 19:54:00');
INSERT INTO `dg_empleado_token` VALUES (696, 'karla.parada', '2e21bed41fedfb2cdcb95dcd0e5085ff', '1', '2023-10-19 19:54:00');
INSERT INTO `dg_empleado_token` VALUES (697, 'karla.parada', '84a4552b67fbddaf3aca8bd4bad059c0', '1', '2023-10-19 19:55:00');
INSERT INTO `dg_empleado_token` VALUES (698, 'admin', 'a08df5fbcaea0a7cadaa22a1220b53f8', '1', '2023-10-19 19:58:00');
INSERT INTO `dg_empleado_token` VALUES (699, 'admin', '1cb18e41fa7dd538fede810d37d73b0a', '1', '2023-10-19 20:03:00');
INSERT INTO `dg_empleado_token` VALUES (700, 'Monica.Oca', 'd4fa7e96d3f111e3d71ea4b066a22634', '1', '2023-10-19 21:35:00');
INSERT INTO `dg_empleado_token` VALUES (701, 'Luis.Stengel', 'ccde78b3f706cde2d05ac1070e60ffcf', '1', '2023-10-19 22:17:00');
INSERT INTO `dg_empleado_token` VALUES (702, 'Maria.Marrero', 'dd81b36dce1fbd80624ceadc0c713608', '1', '2023-10-19 23:04:00');
INSERT INTO `dg_empleado_token` VALUES (703, 'Maria.Marrero', '869e1752b4a15f3051e760e9ea8a542b', '1', '2023-10-19 23:04:00');
INSERT INTO `dg_empleado_token` VALUES (704, 'Navarro.Marlegnis', '3a6becc8dc14fa3aca1e0abf8e0e1b0a', '1', '2023-10-19 23:57:00');
INSERT INTO `dg_empleado_token` VALUES (705, 'admin', 'af885ccb9f3654ae8bceed41526c69e3', '1', '2023-10-20 00:32:00');
INSERT INTO `dg_empleado_token` VALUES (706, 'admin', '63777d9bb5738d1eda1f26e0141d1773', '1', '2023-10-20 03:38:00');
INSERT INTO `dg_empleado_token` VALUES (707, 'Valor.Betania', '4dea1eed65cadde1068d02a71fbf8f2a', '1', '2023-10-20 08:51:00');
INSERT INTO `dg_empleado_token` VALUES (708, 'Emperatriz.Prichinenko', '84d742d0b592b25dfef4e9378e081430', '1', '2023-10-20 11:45:00');
INSERT INTO `dg_empleado_token` VALUES (709, 'Elizabeth.Balza', '25a61dc2456ba016a80f0a1352388ba9', '1', '2023-10-20 11:49:00');
INSERT INTO `dg_empleado_token` VALUES (710, 'Maria.Blasini', '21ee19af4ef23d8d46ea70d6ff397dae', '1', '2023-10-20 11:59:00');
INSERT INTO `dg_empleado_token` VALUES (711, 'brezhnev.vega', 'bd65fa6d890b6977b3bb4469c428be84', '1', '2023-10-20 12:15:00');
INSERT INTO `dg_empleado_token` VALUES (712, 'Adriana.Martinez', '56742fbef18c419cfdf97ed26d699083', '1', '2023-10-20 12:33:00');
INSERT INTO `dg_empleado_token` VALUES (713, 'Javier.Ortiz', '78815b6ff032bd7c4fb31909d5751121', '1', '2023-10-20 12:42:00');
INSERT INTO `dg_empleado_token` VALUES (714, 'Javier.Ortiz', '8ec3e9db3137b490a98397178ad006fc', '1', '2023-10-20 12:43:00');
INSERT INTO `dg_empleado_token` VALUES (715, 'admin', 'b7757c03c1956519d9dec0680b8b69eb', '1', '2023-10-20 13:43:00');
INSERT INTO `dg_empleado_token` VALUES (716, 'Monica.Oca', 'dfe44802561cb39f2c4a524238864d71', '1', '2023-10-20 13:49:00');
INSERT INTO `dg_empleado_token` VALUES (717, 'Luis.Stengel', '4d7cb9f99aad2ed25e4186f1a26e54ff', '1', '2023-10-20 14:01:00');
INSERT INTO `dg_empleado_token` VALUES (718, 'Ananguren.Iris', '0783e3a396d5dea0573a5f243f82611e', '1', '2023-10-20 14:58:00');
INSERT INTO `dg_empleado_token` VALUES (719, 'Ananguren.Iris', '4afd75843f1dcd83ef6fb91c60dc1d69', '1', '2023-10-20 15:34:00');
INSERT INTO `dg_empleado_token` VALUES (720, 'Ananguren.Iris', 'b22d324b746e20d34d8d2b0382f75955', '1', '2023-10-20 15:50:00');
INSERT INTO `dg_empleado_token` VALUES (721, 'Elizabeth.Balza', 'b3b8143190ea1934da08cf237d51713f', '1', '2023-10-20 18:06:00');
INSERT INTO `dg_empleado_token` VALUES (722, 'Carlos.Fuenmayor', 'f1898b72790573a239be8ff25b48d13d', '1', '2023-10-20 18:18:00');
INSERT INTO `dg_empleado_token` VALUES (723, 'Ananguren.Iris', '3a62acb160267e43eacd7bd279f8bdf3', '1', '2023-10-20 18:34:00');
INSERT INTO `dg_empleado_token` VALUES (724, 'Luis.Delgado', 'a7f84d01580f0ce624404d69f8fa73f7', '1', '2023-10-20 18:42:00');
INSERT INTO `dg_empleado_token` VALUES (725, 'Maria.Marrero', '3525fbaf779c0c7c757e2cfdfd3ee0c5', '1', '2023-10-20 18:44:00');
INSERT INTO `dg_empleado_token` VALUES (726, 'Maria.Blasini', '82c6bce8648dd17b15a93bd23222ab32', '1', '2023-10-20 18:49:00');
INSERT INTO `dg_empleado_token` VALUES (727, 'Ananguren.Iris', 'cb27772a903877312d444ed759767ad5', '1', '2023-10-20 18:53:00');
INSERT INTO `dg_empleado_token` VALUES (728, 'Luis.Stengel', 'fb4f8f0de07039c87c6e293d91523e3a', '1', '2023-10-20 19:27:00');
INSERT INTO `dg_empleado_token` VALUES (729, 'Navarro.Marlegnis', '8d2b39d87c63378acb8e6597cb8aefc0', '1', '2023-10-20 19:48:00');
INSERT INTO `dg_empleado_token` VALUES (730, 'Javier.Ortiz', '27d484826349ef806446753270ae6b81', '1', '2023-10-20 23:24:00');
INSERT INTO `dg_empleado_token` VALUES (731, 'Jose.Medina', 'e640b957e01b8c3e917c306c23b5074f', '1', '2023-10-21 03:32:00');
INSERT INTO `dg_empleado_token` VALUES (732, 'Yosmar.Molina', 'cacafa9df2621dd0b54b9afa0fae998b', '1', '2023-10-21 23:01:00');
INSERT INTO `dg_empleado_token` VALUES (733, 'Yosmar.Molina', '744e10da761be8bad4ca3ede1c6f6462', '1', '2023-10-21 23:29:00');
INSERT INTO `dg_empleado_token` VALUES (734, 'admin', '4779ae29d18aedd8e32c8fe8802224eb', '1', '2023-10-22 14:57:00');
INSERT INTO `dg_empleado_token` VALUES (735, 'Jose.Alvarado', 'ba46b6ea9c14537aa53fff4fcc49545e', '1', '2023-10-22 14:58:00');
INSERT INTO `dg_empleado_token` VALUES (736, 'admin', '16dff3441b6a4ec85372445b3ef2284b', '1', '2023-10-22 15:04:00');
INSERT INTO `dg_empleado_token` VALUES (737, 'admin', 'afd47599b6f0269ca6de254e23052412', '1', '2023-10-22 16:40:00');
INSERT INTO `dg_empleado_token` VALUES (738, 'fimcs', '96f6880324fc219ae376d155d84b361d', '1', '2023-10-22 16:42:00');
INSERT INTO `dg_empleado_token` VALUES (739, 'Carlos.Fuenmayor', '5bac46aa3c6d740efa99b3536fcb155e', '1', '2023-10-22 21:56:00');
INSERT INTO `dg_empleado_token` VALUES (740, 'Luis.Salas', '11d50c841cebe12859b9e8e02acf47d2', '1', '2023-10-22 23:27:00');
INSERT INTO `dg_empleado_token` VALUES (741, 'Luis.Salas', '96bbd9b92d04cf36a6742156cbea51b4', '1', '2023-10-22 23:33:00');
INSERT INTO `dg_empleado_token` VALUES (742, 'Luis.Salas', 'c3f27962549d9da0b4c59b91e3839efc', '1', '2023-10-22 23:35:00');
INSERT INTO `dg_empleado_token` VALUES (743, 'Luis.Salas', 'f89c1066f3efad7897f1d51c7e948c81', '1', '2023-10-22 23:37:00');
INSERT INTO `dg_empleado_token` VALUES (744, 'Luis.Salas', '65f07a0d560e7ec53aaa6238e44c6b1a', '1', '2023-10-22 23:40:00');
INSERT INTO `dg_empleado_token` VALUES (745, 'admin', '0ac4901d2f85a86e69bc55966df084a5', '1', '2023-10-23 00:16:00');
INSERT INTO `dg_empleado_token` VALUES (746, 'fimcs', '2b059f82eb468520691859fe9d416f5c', '1', '2023-10-23 00:17:00');
INSERT INTO `dg_empleado_token` VALUES (747, 'admin', 'b45758bc23f48afbc8166342af61a335', '1', '2023-10-23 00:17:00');
INSERT INTO `dg_empleado_token` VALUES (748, 'fimcs', '18a2cb7448c01d67740f1c559ddcc7b1', '1', '2023-10-23 00:18:00');
INSERT INTO `dg_empleado_token` VALUES (749, 'fimcs', 'f1562c25207ca1da47a49f1fee9bffad', '1', '2023-10-23 00:24:00');
INSERT INTO `dg_empleado_token` VALUES (750, 'fimcs', '363ba71940fe8580463853d6d2a72c7a', '1', '2023-10-23 00:28:00');
INSERT INTO `dg_empleado_token` VALUES (751, 'Jose.Alvarado', '11289f4f42aacc04a0019462813e69e7', '1', '2023-10-23 00:34:00');
INSERT INTO `dg_empleado_token` VALUES (752, 'Jose.Alvarado', 'ca51ab876f4c421f9d31b1d53d30cbc2', '1', '2023-10-23 00:40:00');
INSERT INTO `dg_empleado_token` VALUES (753, 'fimcs', 'c2ca98bd1e017e9fd9fec0c22999cac0', '1', '2023-10-23 00:45:00');
INSERT INTO `dg_empleado_token` VALUES (754, 'Jose.Alvarado', '351c07f70b034c850d57570c3e241c21', '1', '2023-10-23 00:52:00');
INSERT INTO `dg_empleado_token` VALUES (755, 'Orlando.Benavides', '57e0e4bdb4c272c6e58fdaed567d3faf', '1', '2023-10-23 01:17:00');
INSERT INTO `dg_empleado_token` VALUES (756, 'Benito.Valeriano', '8e281abadceabce76084aca855c1d06e', '1', '2023-10-23 11:47:00');
INSERT INTO `dg_empleado_token` VALUES (757, 'brezhnev.vega', '82e947397fa9984b8842772443ea5dcc', '1', '2023-10-23 11:54:00');
INSERT INTO `dg_empleado_token` VALUES (758, 'Maria.Blasini', '16e23664260a3162ec507bdfcd906699', '1', '2023-10-23 12:07:00');
INSERT INTO `dg_empleado_token` VALUES (759, 'Luis.Salas', '08ba6ab84a1a2537bb3cad128766bbed', '1', '2023-10-23 12:48:00');
INSERT INTO `dg_empleado_token` VALUES (760, 'Emperatriz.Prichinenko', '23e0e6dae93b0b93d0e3d4dc55784688', '1', '2023-10-23 13:06:00');
INSERT INTO `dg_empleado_token` VALUES (761, 'Adriana.Martinez', '2c898fffc1d924cb23836cb36e55ffe1', '1', '2023-10-23 13:36:00');
INSERT INTO `dg_empleado_token` VALUES (762, 'Jose.Alvarado', '2242cdf8b0784ad779ded79a26801271', '1', '2023-10-23 13:48:00');
INSERT INTO `dg_empleado_token` VALUES (763, 'brezhnev.vega', '400b3f9a256f4e4dc42682fffdcb6696', '1', '2023-10-23 13:54:00');

-- ----------------------------
-- Table structure for dg_empleados
-- ----------------------------
DROP TABLE IF EXISTS `dg_empleados`;
CREATE TABLE `dg_empleados`  (
  `id_usu` int NOT NULL AUTO_INCREMENT,
  `nom_usu` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NULL DEFAULT NULL,
  `ape_usu` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NULL DEFAULT NULL,
  `log_usu` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NULL DEFAULT NULL,
  `pass_usu` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NULL DEFAULT NULL,
  `act_usu` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NULL DEFAULT NULL,
  `tel_usu` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NULL DEFAULT NULL,
  `ced_usu` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NULL DEFAULT NULL,
  `car_usu` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NULL DEFAULT NULL,
  `cor_usu` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NULL DEFAULT NULL,
  `rol_usu` int NULL DEFAULT NULL,
  `ubicacionResidencia` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NULL DEFAULT NULL,
  `ident` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NULL DEFAULT NULL,
  `frenteAsignado` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NULL DEFAULT NULL,
  `carnetizacion` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NULL DEFAULT NULL,
  `pcMacLan` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NULL DEFAULT NULL,
  `pcMacWam` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NULL DEFAULT NULL,
  `pcModelo` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NULL DEFAULT NULL,
  `pcSerial` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NULL DEFAULT NULL,
  `foraneo` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NULL DEFAULT NULL,
  `idConsultoraContratante` int NULL DEFAULT NULL,
  `equipoAsignado` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NULL DEFAULT NULL,
  `vehiculoTipo` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NULL DEFAULT NULL,
  `vehiculoModelo` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NULL DEFAULT NULL,
  `vehiculoMarca` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NULL DEFAULT NULL,
  `vehiculoColor` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NULL DEFAULT NULL,
  `vehiculoPlaca` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NULL DEFAULT NULL,
  `vehiculoAnio` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NULL DEFAULT NULL,
  `vehiculoAseguradora` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NULL DEFAULT NULL,
  `vehiculoContrato` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_usu`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 257 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dg_empleados
-- ----------------------------
INSERT INTO `dg_empleados` VALUES (123, 'Administrador', 'administrador', 'admin', 'admin', '1', '04244380137', '123', '123', '123', 10, 'remotooo', 'admin', 'admin', 'si', 'N/A', 'N/A', 'N/A', 'N/A', 'fraaaaaa', 2, 'equipo asignado', 'Seleccione', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A');
INSERT INTO `dg_empleados` VALUES (171, 'Edgar', 'Corao', 'Edgar.Corao', '6100190', '1', '+58 04120140770', 'V-6.100.190', 'Director de proyecto', 'edgar.corao@mmdmcs.com', 10, 'PANAMA', 'DP', 'TODOS', 'Carnetizado', '8469936F3CFD', '3003C860ECO3', 'Victus', 'SCD2222JNK', 'FORANEO INTERNACIONAL', 0, 'Asignado', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (172, 'Luis', 'Salas', 'Luis.Salas', 'mcs*1919', '1', '+58 04125421912', 'V-8.499.195', 'Gerente de Proyecto funcional SAP', 'luis.salas@mmdmcs.com', 20, 'VAL', 'GTE', 'TODOS', 'Carnetizado', '48-2A-E3-37-BD-4D', 'D4-3B-04-C3-1A-3C', 'Thinkpad', '1903', 'FORANEO NACIONAL', 0, 'Asignado', 'Sedan', 'X1', 'Chery', 'Azul', 'AE976TD', '2013', 'En tramite', '');
INSERT INTO `dg_empleados` VALUES (173, 'Maria Carlota', 'Aranzazu', 'Maria.Aranzazu', '14452526', '0', '58 0414 2140480', 'V-14.452.526', 'Gerente de Proyecto Comunicacional', '', 40, 'CCS', 'GTE', 'TODOS', 'Por carnetizar', '', '64-79-F0-39-A7-42', 'IdealPad 5', 'MP1ZXS36', '', 0, 'No requiere', 'Seleccione', '', '', '', '', '', '', '');
INSERT INTO `dg_empleados` VALUES (174, 'Zobeida', 'Moreno', 'Zobeida.Moreno', '8674386', '1', '58 0424 2351041', 'V-8.674.386', 'Gerente de Proyecto Comunicacional', 'zobeida.moreno@mmdmcs.com', 20, 'VAL', 'GTE', 'TODOS', 'Por carnetizar', '??????????', '??????????', NULL, NULL, 'FORANEO NACIONAL', 0, 'Por asignar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (175, 'Aneska', 'Rojas', 'Aneska.Rojas', '25221449', '0', '+58 0412 1814235', 'V- 25.221.449', 'Gerente de Proyecto funcional non SAP', 'aneska.rojas@mmdmcs.com', 40, 'CCS', 'GTE', 'TODOS', 'Carnetizado', '82-30-49-6E-4F-C7', '80-30-49-6E-4F-C7', 'LAPTOP-M6PS7TRI', 'PF2BBA4W', '', 0, 'No requiere', 'Seleccione', '', '', '', '', '', '', '');
INSERT INTO `dg_empleados` VALUES (176, 'José Gregorio', 'Medina', 'Jose.Medina', 'Jgms646.', '1', '+58 0212 7626171/ +58 04143808575 ', 'V- 11.027.646', 'Gerente de Proyecto funcional non SAP', 'jose.medina@mmdmcs.com', 40, 'CCS', 'GTE', 'TODOS', 'Carnetizado', '50-EB-F6-48-01-72', '34-6F-24-2E-C0-55', 'G513QE-WH96', 'MBNRKD03596645C', '', 0, 'No requiere', 'Sedan', 'Corolla', 'Toyota', 'Gris', 'AFV67N', '2006', 'Grupo Hytcia de Venezuela, C.A.', '30090B');
INSERT INTO `dg_empleados` VALUES (177, 'Juan', 'Merchan', 'Juan.Merchan', '149946229', '0', '+507 61597081', '149946229', 'Gerente de Proyecto para integraciones', 'juan.merchan@mmdmcs.com', 40, 'PANAMA', 'GTE', 'TECNICO', 'Por carnetizar', '88:66:5a:54:7d:a2', '', 'Macbook Pro', 'C02G908EMD6R', 'FORANEO INTERNACIONAL', 0, '', 'Seleccione', '', '', '', '', '', '', '');
INSERT INTO `dg_empleados` VALUES (178, 'José', 'Alvarado', 'Jose.Alvarado', '8596339', '1', ' +58 04242143165', 'V-8.596.339', 'Gerente de proyecto técnico', 'jr.alvarado@mmdmcs.com', 20, 'VAL', 'GTE', 'TECNICO', 'Carnetizado', '00-0A-43-00-A3-5E', 'E4-A7-A0-CB-D2-B6', 'X1 Carbon', 'R90LMUTT', 'FORANEO NACIONAL', 0, 'Asignado', 'Camioneta', 'Sport Wagon', 'Kia', 'Gris', 'AC888UE', '2012', 'Seguros Universal', '33322');
INSERT INTO `dg_empleados` VALUES (179, 'Richard', 'Amaris', 'Richard.Amaris', 'Dr2023..', '1', '+ 58 04244184313', 'V-21.152.692', 'ABAP FACTORY (5 PAX) GRUPO 1', 'richard.amaris@mmdmcs.com', 40, 'VAL', 'ABAP', 'TECNICO', 'Por carnetizar', '2C-60-0C-1B-5E-83', '34-DE-1A-73-25-F3', 'Satellite S55-B5268', 'ZE022692C', 'FORANEO NACIONAL', 0, 'No requiere', 'Seleccione', '', '', '', '', '', '', '');
INSERT INTO `dg_empleados` VALUES (180, 'Darwins', 'Galindez', 'Darwins.Galindez', '20293154', '1', '+58 04127434883', 'V-20.293.154', 'ABAP FACTORY (5 PAX) GRUPO 1', 'darwins.galindez@mmdmcs.com', 40, 'PTO CABELLO', 'ABAP', 'TECNICO', 'Por carnetizar', 'E4-E7-49-38-35-37', '28-3A-4D-61-C2-19', 'HP Pavilon 15-cw0xxx', '5DC84821TK', 'FORANEO NACIONAL', 0, 'No requiere', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (181, 'Luis', 'Reyes', 'Luis.Reyes', '24013862', '1', '+58 04124873859', 'V-24.013.862', 'ABAP FACTORY (5 PAX) GRUPO 1', 'luis.reyes@mmdmcs.com', 40, 'COJEDES', 'ABAP', 'TECNICO', 'Por carnetizar', '54-AB-3A-1E-04-DF', 'A8-A7-95-A5-85-2F', 'Aspire E5-573', 'NXMVHAA02655014', 'FORANEO NACIONAL', 0, 'No requiere', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (182, 'Por', 'asignar', 'Por.asignar', NULL, '1', NULL, NULL, 'ABAP FACTORY (5 PAX) GRUPO 1', NULL, 40, NULL, 'ABAP', 'TECNICO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No requiere', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (183, 'Por', 'asignar', 'Por.asignar', NULL, '1', NULL, NULL, 'ABAP FACTORY (5 PAX) GRUPO 1', NULL, 40, NULL, 'ABAP', 'TECNICO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No requiere', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (184, 'Oreana', 'Colorado', 'Oreana.Colorado', '6721149', '1', '+58 04143978480', 'V-6.721.149', 'ABAP FACTORY (5 PAX) GRUPO 2', 'oriana.colorado@mmdmcs.com', 40, 'CCS', 'ABAP', 'TECNICO', 'Por carnetizar', '2A-39-26-69-34-1A', '28-39-26-57-7B-19', 'IdeadPad S145', 'I6317A-RTL8821CE', NULL, 0, 'No requiere', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (185, 'Viveka', 'González', 'Viveka.Gonzalez', '15464440', '1', '+58 04126926772', 'V-15.464.440', 'ABAP FACTORY (5 PAX) GRUPO 2', 'viveka.gonzalez@mmdmcs.com', 40, 'MBO', 'ABAP', 'TECNICO', 'Por carnetizar', '8C-70-5a-31-80-00', NULL, 'T40', 'S/N', 'FORANEO NACIONAL', 0, 'No requiere', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (186, 'Karla ', 'Parada', 'karla.parada', '12959217', '1', '58 04127000977', 'V.-12.959.217', 'ABAP FACTORY (5 PAX) GRUPO 2', 'karla.parada@mmdmcs.com', 40, 'CCS', 'ABAP', 'TECNICO', 'Por carnetizar', '00-09-0F-FE-00-01', 'E0-75-26-0A-AF-99', 'X133JR610', 'F152J-16/WB/N50N5A/FW0655031', '', 0, 'No requiere', 'Seleccione', '', '', '', '', '', '', '');
INSERT INTO `dg_empleados` VALUES (187, 'Juan', 'Rodríguez', 'Juan.Rodriguez', '6490091', '1', '58 04125813070', 'V-6.490.091', 'ABAP FACTORY (5 PAX) GRUPO 2', 'juan.rodriguez@mmdmcs.com', 40, 'CCS', 'ABAP', 'TECNICO', 'Por carnetizar', '00-09-0F-AA-00-01', '0C-9A-3C-1F-FF-7C', 'Inspiron 15 3000', '34770536311', NULL, 0, 'No requiere', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (188, 'Silva', 'Alexander', 'Silva.Alexander', '15307287', '1', '58 04263540353/58 0424 5948262', 'V-15.307.287', 'ABAP FACTORY (5 PAX) GRUPO 2', 'alexander.silva@mmdmcs.com', 40, 'CCS', 'ABAP', 'TECNICO', 'Por carnetizar', '?????', '??????', 'Dell Bostron', '186182396909', NULL, 0, 'No requiere', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (189, 'Dionne', 'Pastran', 'Dionne.Pastran', '17621930', '1', '+58  04245989740', 'V-17.621.930', 'ABAP FACTORY (3 PAX) GRUPO 3', 'dionne.pastran@mmdmcs.com', 40, 'BQT', 'ABAP', 'TECNICO', 'Por carnetizar', '?????', '??????', 'ENVY', '337BCD91-B747-42E0-96F4', 'FORANEO NACIONAL', 0, 'No requiere', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (190, 'Javier', 'Silva', 'Javier.Silva', '14346474', '1', '057-314-7543392', 'V.-14.346.474', 'ABAP FACTORY (3 PAX) GRUPO 3', 'javier.silva@mmdmcs.com', 40, 'COLOMBIA', 'ABAP', 'TECNICO', 'Por carnetizar', NULL, '00-45-E2-66-6A-55', '81W6', 'PF2W56X8', 'FORANEO INTERNACIONAL', 0, 'No requiere', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (191, 'Por', 'asignar', 'Por.asignar', NULL, '1', NULL, NULL, 'ABAP FACTORY (3 PAX) GRUPO 3', NULL, 40, NULL, 'ABAP', 'TECNICO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No requiere', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (192, 'Orlando', 'Rodríguez', 'Orlando.Rodriguez', '12762333', '1', '+52 5577406314', 'V-12.762.333', 'WORKFLOW', ' orlando.rodriguez@mmdmcs.com', 40, 'CCS', 'BW', NULL, 'Por carnetizar', '58-FB-84-12-F1-32', '58-FB-84-12-F1-2E', '80V', 'MP1654F1', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (193, 'Jorge', 'González', 'Jorge.Gonzalez', '16587357', '1', '+58 04127933863', 'V-16.587.357', 'WORKFLOW', 'jorge.gonzalez@mmdmcs.com', 40, 'MBO', 'BW', NULL, 'Por carnetizar', '??????', '????????', 'HP Laptop 15-dw0ww', 'B45D0B56-6080-4F11-A175-F0C3FB93A72F', 'FORANEO NACIONAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (194, 'José', 'Rodríguez', 'Jose.Rodriguez', '10970754', '1', '+58 04143420177', 'V- 10.970.754', 'Basis 1', 'jose.rodriguez@mmdmcs.com', 40, 'MBO ', 'BC', 'TECNICO', 'Por carnetizar', '00-21-CC-6D-03-7B', '08-11-96-78-E6-40', 'THINKPAD T420', 'R8-CP1NZ11/10', 'FORANEO NACIONAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (195, 'Jonathan', 'Valencia', 'Jonathan.Valencia', '16782496', '1', '+58 04146275806', 'V-16.782.496', 'Basis 2 ', 'jonathan.valencia@mmdmcs.com', 40, 'MBO ', 'BC', 'TECNICO', 'Por carnetizar', '00-FF-0F-1C-E5-AD', '02-AB-33-83-A7-92', 'T420', 'PB-RHNN3 12/06', 'FORANEO NACIONAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (196, 'Luis', 'Liscano', 'Luis.Liscano', '6093526', '1', '58 0424 1692240', 'V-6.093.526', 'Basis 3', 'luis.liscano@mmdmcs.com', 40, 'CCS', 'BC', 'TECNICO', 'Por carnetizar', '00-FF-2B-EC-EC-8D', 'F0-9E-4A-0D-89-CD', 'Inspiron 5515', 'F7Z0T93', NULL, 0, 'No requiere', 'Camioneta', 'Gran Cherokee', 'Jeep', 'Plata', 'AFT03P', '2006', NULL, NULL);
INSERT INTO `dg_empleados` VALUES (197, 'Daniel', 'Aular', 'Daniel.Aular', '12496987', '1', '+58 04165613650', 'V-12.496.987', 'Basis 4', 'daniel.aular@mmdmcs.com', 40, 'PTO. FIJO', 'BC', 'TECNICO', 'Por carnetizar', '00-21-CC-60-D4-49', '00-24-D7-C7-01-B0', 'T420', 'R8-M8NND', 'FORANEO NACIONAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (198, 'Arnaldo', 'Aguirre', 'Arnaldo.Aguirre', '14023316', '1', '+58 04269711406', 'V- 14.023.316', 'Especialista HA / SUSE / VM', 'arnaldo.aguirre@mmdmcs.com', 40, 'CCS', 'BS', 'TECNICO', 'Carnetizado', '14-EB-B6-84-FB-DA', '8C-B8-7E-68-96-4C', 'T14 20W1-SAXN00', 'PF-3F52JF', NULL, 0, 'No requiere', 'Sedan', 'Neon', 'Chrysler', 'Plata', 'AA451TC', '1998', 'Seguros Constelacion', '66942');
INSERT INTO `dg_empleados` VALUES (199, 'Orlando', 'Labrador', 'Orlando.Labrador', 'N1a2p3l4.2023', '1', '+58 04129957960', 'V-6.180.157', 'Basis  (BPC - BO)', 'orlando.labrador@mmdmcs.com', 40, 'CCS', 'BC', 'TECNICO', 'Carnetizado', '98-E7-43-13-30-44', 'AC-D5-64-9F-B7-D9', 'Inspiron P89G', '2876140994', NULL, 0, 'No requiere', 'Seleccione', '', '', '', '', '', '', '');
INSERT INTO `dg_empleados` VALUES (200, 'Janeth', 'López', 'Janeth.Lopez', '9413424', '1', '+58 04143258067', 'V-9.413.424', 'Basis  (DS - BW)', 'yaneth.lopez@mmdmcs.com', 40, 'CCS', 'BC', 'TECNICO', 'Carnetizado', '', '00-45-E2-86-EE-E7', 'Ideapad3', 'PF36ZAE8', NULL, 0, 'No requiere', 'Seleccione', '', '', '', '', '', '', '');
INSERT INTO `dg_empleados` VALUES (201, 'Eduard', 'Gúzman', 'Eduard.Guzman', '14128584', '1', '+58 04125979553', 'V-14.128.584', 'FIORI FACTORY', 'eduard.guzman@mmdmcs.com', 40, 'PANAMA', 'FIORI', NULL, 'Carnetizado', NULL, 'f8:4d:89:7b:6a:81 ', 'Macbook Pro', 'N76TPWHJTV', 'FORANEO INTERNACIONAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (202, 'Ixia', 'Muñoz', 'Ixia.Munoz', '23508219', '1', '+58 04244317584', 'V-23.508.219', 'Finanzas - MIGRACIÓN / CAPA FISCAL', 'ixia.munoz@mmdmcs.com', 40, 'VAL', 'FI', 'DATOS MIGRACION', 'Carnetizado', '6C2408B1AD41', '7032177497BC', 'Thinkpad E15 GEN4', 'PF3V63JAD', 'FORANEO NACIONAL', 0, 'Asignado', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (203, 'Ali', 'Muñoz', 'Ali.Munoz', '23508231', '1', '58 04146315850', 'V-23.508.231', 'Finanzas - MIGRACIÓN / CAPA FISCAL', 'ali.munoz@mmdmcs.com', 40, 'VAL', 'FI', 'DATOS MIGRACION', 'Carnetizado', NULL, 'FC-B3-BC-BD-1A-6E', 'IdeadPad S340-15IIL', 'MP1WXD7Y', 'FORANEO NACIONAL', 0, 'Asignado', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (204, 'Katiuska', 'Andrade', 'Katiuska.Andrade', '12722918', '1', '58 0414 3303043', 'V-12.722.918', 'Finanzas - DATOS / MIGRACIÓN', 'katiuska.andrade@mmdmcs.com', 40, 'CCS', 'FI', 'DATOS MIGRACION', 'Carnetizado', 'f4:5c:89:8c:0e:7f', NULL, 'MacBook Pro A 1502', 'C02QX20PFVH5', NULL, 0, 'No requiere', 'Sedan', 'Caliber', 'Dodge', 'Azul', 'MFM10Z', '2008', 'En tramite', NULL);
INSERT INTO `dg_empleados` VALUES (205, 'Añanguren', 'Iris', 'Ananguren.Iris', '14201201', '1', '58 04242983558', 'V- 14.201.201', 'Finanzas - DATOS / MIGRACIÓN', 'iris.ananguren@mmdmcs.com', 40, 'CCS', 'FI', 'DATOS MIGRACION', 'Carnetizado', 'CND83105CF', 'F5853LA#ABM', 'HP Compaq C768LA', '481579-002', '', 0, 'No requiere', 'Rustico', 'Techo Duro', 'Toyota ', 'Azul', 'AA236KD', '2001', 'Inversiones Rubi 1110', '3418');
INSERT INTO `dg_empleados` VALUES (206, 'Navarro', 'Marlegnis', 'Navarro.Marlegnis', '9452214', '1', '58 04129178985', 'V-9.452.214', 'Finanzas - RD/STAR', 'marlegnis.navarro@mmdmcs.com', 40, 'MCY', 'FI', 'RD y STAR', 'Carnetizado', '54:EE:75:2D:46:9A', '5c:93:a2:9e:db:bf', 'Flex 2-15 20405', 'WB15376977', 'FORANEO NACIONAL', 0, 'Por asignar', 'Sedan', 'Corolla', 'Toyota ', 'Gris', 'AHF42R', '2008', 'Adminisradora EULO 2021', '3190923');
INSERT INTO `dg_empleados` VALUES (207, 'Rangel', 'Linda', 'Rangel.Linda', '19231693', '1', '58 0414 5913685', 'V-19.231.693', 'Finanzas - DATOS / MIGRACIÓN', 'linda.rangel@mmdmcs.com', 40, 'VAL', 'FI', 'DATOS MIGRACION', 'Por carnetizar', 'A0-E7-0B-BC-7D-8A', 'A0-E7-0B-BC-7D-8A', 'IDEAPAD3', 'PF9XB1A12001', 'FORANEO NACIONAL', 0, 'No requiere', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (208, 'Jennifer', 'Linares', 'Jennifer.Linares', '14953399', '1', '+58 04242659342', 'V-14.953.399', 'Finanzas - DATOS / MIGRACIÓN', 'jennifer.linares@mmdmcs.com', 40, 'CCS', 'FI', NULL, 'Carnetizado', '?????????', NULL, 'IdeadPad 3', 'PF23C1BB ', NULL, 0, 'No requiere', 'Camioneta', 'Sport Wagon', 'Gran Cherokee', 'Azul', 'AD721BM', '2010', 'interbank', '310015628');
INSERT INTO `dg_empleados` VALUES (209, 'Emperatriz', 'Prichinenko', 'Emperatriz.Prichinenko', '8299029', '1', '+58 04144160943', 'V-8.299.029', 'Controlling - MIGRACIÓN', 'emperatriz.prichinenko@mmdmcs.com', 40, 'MCY', 'CO', 'DATOS MIGRACION', 'Carnetizado', '84-7B-EB-26-80-38', '2C-6E-85-F1-50-86', 'Inspiron 5458', 'G9LMDC2', 'FORANEO NACIONAL', 0, 'Asignado', 'Camioneta', 'Gran Vitara', 'Suzuki', 'Gris', 'AB388CG', '2008', 'Corporacion Multicars de Venezuela, C.A.', '16438');
INSERT INTO `dg_empleados` VALUES (210, 'Carlex', 'Canelon', 'Carlex.Canelon', 'Coelho10.', '1', '+58 04128496235', 'V-19.218.793', 'Controlling - DATOS', 'carlex.canelon@mmdmcs.com', 40, 'VAL', 'CO', 'DATOS MIGRACION', 'Carnetizado', 'B4-B5-B6-99-77-A5', '', '15-ef2126wm', '5CD1415RTO', 'FORANEO NACIONAL', 0, 'Asignado', 'Seleccione', '', '', '', '', '', '', '');
INSERT INTO `dg_empleados` VALUES (211, 'Lorena', 'González', 'Lorena.Gonzalez', 'Canelon89.', '1', '+58 04124578358', 'V-18.228.341', 'Controlling - RD/STAR', 'lorena.gonzalez@mmdmcs.com', 40, 'VAL', 'CO', 'RD y STAR', 'Carnetizado', '??????????', '', 'IdeadPad 1 15ALC7', 'PF3RP3XW', 'FORANEO NACIONAL', 0, 'Asignado', 'Seleccione', '', '', '', '', '', '', '');
INSERT INTO `dg_empleados` VALUES (212, 'Luis', 'Stengel', 'Luis.Stengel', '11201119', '1', '+58 04120212121', 'V- 11.201.119', 'Gestión de Materiales - MIGRACIÓN', 'luis.stengel@mmdmcs.com', 40, 'CCS', 'MM', NULL, 'Carnetizado', '28-CD-C4-63-B2-6C', '192.168.1.7', 'X64-based PC', 'CND03306V2', NULL, 0, 'No requiere', 'Camioneta', 'Santa Fe', 'Hyundai', 'Plata', 'AJ461DA', '2007', 'En tramite', NULL);
INSERT INTO `dg_empleados` VALUES (213, 'Herlinan', 'Singer', 'Herlinan.Singer', '16328895', '1', '58 04123212025', 'V-16.328.895', 'Gestión de Materiales - RD/STAR', 'herlinan.singer@mmdmcs.com', 40, 'CCS', 'MM', 'RD y STAR', 'Carnetizado', 'AC-9E-17-92-A1-3D', '10-08-B1-AE-2A-83', 'TP500LA', 'EAN0WU494685446', NULL, 0, 'No requiere', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (214, 'María', 'Blasini', 'Maria.Blasini', 'Mlbm674832', '1', '58 04143201876', 'V-11.381.136', 'Gestión de Materiales - DATOS / INTEGRACIÓN / WF', 'maria.blasini@mmdmcs.com', 40, 'CCS', 'MM', 'DATOS MIGRACION', 'Carnetizado', 'FA-D0-FC-F5-C4-75', '', 'IdeaPad S340', 'MP1M8470', NULL, 0, 'No requiere', 'Sedan', '2011', 'Chevrolet', 'Plata', 'AC646YA', '2011', '', '');
INSERT INTO `dg_empleados` VALUES (215, 'Hernán', 'Singer', 'Hernan.Singer', '12718694', '1', '+ 58 04147560628', 'V-12.718.694', 'Gestión de Ventas  - DATOS / MIGRACIÓN', 'hernan.singer@mmdmcs.com', 40, 'CCS', 'SD', 'DATOS MIGRACION', 'Carnetizado', NULL, '34-60-F9-92-81-4D', 'Pavilon', '5CD937823C', NULL, 0, 'No requiere', 'Camioneta', 'Tucson', 'Hyundai', 'Verde', 'LBB11H', '2008', 'Seguros Los Andes', 'AUIN-2160261956');
INSERT INTO `dg_empleados` VALUES (216, 'José', 'Mendoza', 'Jose.Mendoza', '22182734', '1', '+58 04245703354', 'V-22.182.734', 'Gestión de Ventas - RD/STAR', 'jose.mendoza@mmdmcs.com', 40, 'BQT', 'SD', 'RD y STAR', 'Por carnetizar', '?????', '?????', 'ROG ZEPHYRUS', 'N3NRKD004385100', 'FORANEO NACIONAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (217, 'Elizabeth', 'Balza', 'Elizabeth.Balza', '15540094', '1', '+58 0424 2081450', 'V-15.540.094', 'Gestión de Ventas  - DATOS', 'elizabeth.balza@mmdmcs.com', 40, 'CCS', 'SD', 'DATOS MIGRACION', 'Por carnetizar', 'E2-0A-F6-85-73-83', 'E0-0A-F6-85-73-83', 'IdeaPad 1 15ALC7', 'PF3W6SVB', NULL, 0, 'No requiere', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (218, 'Luis', 'Bautista', 'Luis.Bautista', 'consultor2020', '1', '+58 04248492016', 'V-23.923.263', 'Gestión de Proyectos - DATOS / MIGRACIÓN', 'luis.bautista@mmdmcs.com', 40, 'CCS', 'GP', 'DATOS MIGRACION', 'Carnetizado', '5c.5f.67.f4.9f.07', '', 'Thinkpad X280', 'P17SLJZ18-05', NULL, 0, 'No requiere', 'Sedan', 'Corolla', 'Toyota', 'Negro', 'AB106PB', '2013', 'Seguros Caracas ', '9960140');
INSERT INTO `dg_empleados` VALUES (219, 'Por', 'asignar', 'Por.asignar', NULL, '1', NULL, NULL, 'Gestión de Proyectos - MIGRACIÓN', NULL, 40, NULL, 'GP', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No requiere', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (220, 'Por', 'asignar', 'Por.asignar', NULL, '1', NULL, NULL, 'Gestión de Proyectos - MIGRACIÓN', NULL, 40, NULL, 'GP', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No requiere', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (221, 'Lillie', 'Muñoz', 'Lillie.Munoz', 'Inicio.6328', '1', '58 04246157167', 'V-16.447.155', 'Gestión de Producción y Calidad - RD/STAR', 'lilie.munoz@mmdmcs.com', 40, 'VAL', 'PP', 'APOYO', 'Por carnetizar', '6C2408B1A077', '703217751705', 'Thinkpad E15 GEN4', 'PF3VA3Q7', 'FORANEO NACIONAL', 0, NULL, 'Seleccione', '', '', '', '', '', '', '');
INSERT INTO `dg_empleados` VALUES (222, 'Valor', 'Betania', 'Valor.Betania', '23648234', '1', '+58 0412 9437252', 'V-23.648.234', 'Gestión de Producción y Calidad - DATOS', ' betania.valor@mmdmcs.com', 40, 'VAL', 'PP', 'DATOS MIGRACION', 'Por carnetizar', '?????????????', '???????????', '15-dy4013dx', '5CD2413YNL', 'FORANEO NACIONAL', 0, 'Por asignar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (223, 'Wilroxi', 'Quijada', 'Wilroxi.Quijada', '12765544', '1', '58 04149019117', 'V.-12.765.544', 'Gestión de Producción y Calidad', NULL, 40, 'CCS', 'PP', NULL, 'Por carnetizar', NULL, '14-85-7F-8C-2D-DC', 'Inspiron 15', '15.6 I5-1135G7', NULL, 0, 'No requiere', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (224, 'Carlos', 'Fuenmayor', 'Carlos.Fuenmayor', 'Samanthaaurora-2020', '1', '+58 04122210229', 'V-13.930.907', 'Gestión de mantenimiento - DATOS / MIGRACIÓN', 'carlos.fuenmayor@mmdmcs.com', 40, 'MBO', 'MM', 'DATOS MIGRACION', 'Carnetizado', '60-18-95-1D-E9-2F', 'A4-42-3B-5C-ED-B0', 'Inspiron 15 3000', '2DX5KA00', 'FORANEO NACIONAL', 0, 'Por asignar', 'Sedan', 'LOGAN', 'RENAULT', 'PLATA', 'AA064EV', '2009', '', '');
INSERT INTO `dg_empleados` VALUES (225, 'Adriana', 'Martínez', 'Adriana.Martinez', '20513771', '1', '+ 58 4244961617', 'V-20.513.771', 'Gestión de mantenimiento - RD/STAR', 'adriana.martinez@mmdmcs.com', 40, 'VAL', 'MM', 'RD y STAR', 'Carnetizado', '??????', '??????', '81W0', 'PF2E4BEM', 'FORANEO NACIONAL', 0, 'Asignado', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (226, 'Nelson', 'Barrera', 'Nelson.Barrera', '5241996', '1', '58 426 5103083 whassap/ 58 412 1075266 ', 'V-5.241.996', 'Gestión de mantenimiento - MIGRACIÓN', 'nelson.barrera@mmdmcs.com', 40, 'VAL', 'MM', NULL, 'Carnetizar/Urgente', '70-77-81-68-AB-0B', NULL, 'Pavilion', '5cd5293d58', 'FORANEO NACIONAL', 0, 'Por asignar', 'Camioneta', 'Tucson', 'Hyundai', 'Verde', 'OAN16H', '2007', 'Seryise. Ve, C.A.', 'ML-1991');
INSERT INTO `dg_empleados` VALUES (227, 'Javier', 'Ortiz', 'Javier.Ortiz', '82079067', '1', '+58 0426 5166140', 'E-82.079.067', 'Nómina + ABAP - MIGRACIÓN', 'javier.ortiz@mmdmcs.com', 40, 'PERU', 'HR', 'NOMINA ', 'Carnetizado', '00-09-0F-FE-00-01', '74-04-F1-38-D4-CA', 'NP950QED', 'BA98-03420A10', 'FORANEO INTERNACIONAL', 0, NULL, 'Camioneta', 'Terios', 'Daihatsu', 'Gris', 'AA317KR', '2009', 'Multinacional Elite, C.A.', '22610');
INSERT INTO `dg_empleados` VALUES (228, 'Benito', 'Valeriano', 'Benito.Valeriano', '6284967', '1', '+58 04123970084', 'V-6.284.967', 'Nómina - MIGRACIÓN', 'benito.valeriano@mmdmcs.com', 40, 'CHARALLAVE', 'HR', 'NOMINA ', 'Carnetizado', '??????', '??????', 'Macbook Pro', 'C02JJ011DKQ2', NULL, 0, 'Asignado', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (229, 'Sandra', 'Vargas', 'Sandra.Vargas', '6670315', '1', NULL, 'V-6.670.315', 'Nómina - MIGRACIÓN', 'sandra.vargas@mmdmcs.com ', 40, 'MBO', 'HR', 'NOMINA ', 'Carnetizar/Urgente', '3A-00-25-07-2D-EE', NULL, 'T490', 'S/N PF-1PMSL8', 'FORANEO NACIONAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (230, 'Jonathan', 'Díaz', 'Jonathan.Diaz', '16524558', '1', '+58 04166250258', 'V-16.524.558', 'Consultor full stack ', 'jonathan.diaz@mmdmcs.com', 40, 'CCS', 'FIORI', 'TECNICO', 'Por carnetizar', '??????', '??????\'', 'G5MD', 'SN2241J000771', NULL, 0, 'No requiere', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (231, 'Jesús', 'Santana', 'jsantana', '13336768', '1', '+58 04244380137', 'V-13.336.768', 'Consultor full stack  - RD/STAR', 'jesus.santana@mmdmcs.com', 40, 'VAL', 'FIORI', 'RD y STAR', 'Carnetizado', '84-A9-3E-14-79-E2', '64-5D-86-9A-28-F6', 'Pavilon', '5CD842DLMG', 'FORANEO NACIONAL', 0, NULL, 'Camioneta', 'Dodge Dakota', 'Dodge', 'Rojo', 'A08CO9M', '2007', 'Asociacion cooperativa Acoven R.L.', '35638');
INSERT INTO `dg_empleados` VALUES (232, 'Brezhnev', 'Vega', 'brezhnev.vega', 'Brva0509$', '1', '+58 04242231829', 'V-12.251.748', 'Consultor full stack  - RD/STAR', 'breznev.vega@mmdmcs.com', 40, 'VAL', 'FIORI', 'RD y STAR', 'Carnetizado', '00-FF-C5-D8-39-5C', 'F8-59-71-7B-2E-DD', 'T470', 'PF13SH1A', 'FORANEO NACIONAL', 0, 'Por asignar', 'Seleccione', '', '', '', '', '', '', '');
INSERT INTO `dg_empleados` VALUES (233, 'María', 'Marrero', 'Maria.Marrero', '18364157', '1', '58 04123358987', 'V- 18.364.157', 'OYM (6 PAX)', 'maria.marrero@mmdmcs.com', 40, 'CCS', 'OYM', 'OYM ', 'Carnetizado', 'A8.CB.47.5B.E0', '0A.64.2D.36.CC', 'VIT3400', 'S/N', NULL, 0, 'No requiere', 'Camioneta', 'Terios', 'Daihatsu', 'Beige', ' AA778XM', '2008', 'RCV Plus', '97L-10907');
INSERT INTO `dg_empleados` VALUES (234, 'Pedro', 'Rodríguez', 'Pedro.Rodriguez', '6115084', '1', '+58 04124894239', 'V-6.115.084', 'OYM (6 PAX)', 'pedro.rodriguez@mmdmcs.com', 40, 'REMOTO', 'OYM', 'OYM ', 'Carnetizado', 'CHD987EH209F', NULL, 'E6440', '20200068375', 'FORANEO INTERNACIONAL', 0, 'Asignado', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (235, 'Yosmar', 'Molina', 'Yosmar.Molina', 'Mariara09.', '1', '58 04126116189', 'V-7.998.863', 'OYM (6 PAX)', 'yosmar.molina@mmdmcs.com', 40, 'CCS', 'OYM', 'OYM ', 'Carnetizar/Urgente', '28-11-A8-EE-35-0D', '28-11-A8-EE-35-09', 'VivoBook', 'X515JA-212.V15BB', NULL, 0, 'No requiere', 'Seleccione', '', '', '', '', '', '', '');
INSERT INTO `dg_empleados` VALUES (236, 'Luis', 'Delgado', 'Luis.Delgado', '11039268', '1', ' 58 04164292637', 'V-11.039.268', 'OYM (6 PAX)', 'luis.delgado@mmdmcs.com', 40, 'LOS TEQUES', 'OYM', 'OYM ', 'Por carnetizar', '20-2B-20-03-DF-3F', NULL, '15 dy2791wm', '6M0Z6UA', 'FORANEO NACIONAL', 0, 'No requiere', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (237, 'Orlando', 'Benavides', 'Orlando.Benavides', '14128956', '1', '+58 04265194050', 'V-14.128.956', 'OYM (6 PAX)', 'orlando.benavides@mmdmcs.com', 40, 'CCS', 'OYM', 'OYM ', 'Por carnetizar', '24-B6-FD-31-97-7B', '7E-E9-D3-AA-6C-8C', 'Dell', '84WXNR1', NULL, 0, 'No requiere', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (238, 'Monica', 'Oca', 'Monica.Oca', '12338919', '1', '58 414-0521078', 'V-12.338.919', 'OYM (6 PAX)', 'monica.oca@mmdmcs.com', 40, 'MCY', 'OYM', 'OYM ', 'Por carnetizar', NULL, '9C-2A-70-2A-08-E9', '15-inch, 2012', '6122550097', 'FORANEO NACIONAL', 0, 'No requiere', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (239, 'Jaime', 'Lopez', 'Jaime.Lopez', 'C01641641', '1', '+505 89391438', 'C01-641641', 'BI (2 - Business Inteligent)', 'jaime.lopez@mmdmcs.com', 40, 'NICARAGUA', 'BIBOP', 'BI', 'Por carnetizar', '??????', '??????', 'F15', 'M3NRCX02Y420114', 'FORANEO INTERNACIONAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (240, 'Chavez', 'Osmin', 'Chavez.Osmin', '0410407011003C', '1', '+505 58065327', '041-040701-1003C', 'BI (2 - Business Inteligent)', 'chavez.osmin@mmdmcs.com', 40, 'COLOMBIA', 'BIBOP', 'BI', 'Por carnetizar', 'K1905N0020646', NULL, 'GE63 RAIDER 9SE', 'K1905N0020646', 'FORANEO INTERNACIONAL', 0, 'No requiere', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (241, 'Jaime', 'Lopez', 'Jaime.Lopez', 'C01641641', '1', '+505 89391438', 'C01-641641', 'DataServices (3 pax DS - Datamart)', 'jaime.lopez@mmdmcs.com', 40, 'NICARAGUA', 'BC', 'BI', 'Por carnetizar', '??????', '??????', 'F15', 'M3NRCX02Y420114', 'FORANEO INTERNACIONAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (242, 'Chavez', 'Osmin', 'Chavez.Osmin', '0410407011003C', '0', '+505 58065327', '041-040701-1003C', 'DataServices (3 pax DS - Datamart)', 'chavez.osmin@mmdmcs.com', 40, 'COLOMBIA', 'BC', 'BI', 'Por carnetizar', 'K1905N0020646', '', 'GE63 RAIDER 9SE', 'K1905N0020646', 'FORANEO INTERNACIONAL', 0, 'No requiere', 'Seleccione', '', '', '', '', '', '', '');
INSERT INTO `dg_empleados` VALUES (243, 'Libardo', 'Rodríguez', 'Libardo.Rodriguez', 'AS580515', '1', '57 - 312-5121206', 'AS580515', 'DataServices (3 pax DS - Datamart)', 'libardo.rodriguez@mmdmcs.com ', 40, 'COLOMBIA', 'BC', 'BI', 'Por carnetizar', '88-A4-C2-08-A9-39', 'E0-75-26-0A-AF-99', 'ThinkPad X13 Gen2', 'PC-29L2RM', 'FORANEO INTERNACIONAL', 0, 'No requiere', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (244, 'Juan', 'Merchan', 'Juan.Merchan', '149946229', '1', '+507 61597081', '149946229', 'PI', 'juan.merchan@mmdmcs.com', 40, 'PANAMA', 'PI', NULL, 'Por carnetizar', '88:66:5a:54:7d:a2', NULL, 'Macbook Pro', 'C02G908EMD6R', 'FORANEO INTERNACIONAL', 0, 'No requiere', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (245, 'Emir', 'Morillo', 'Emir.Morillo', '11647505', '1', '+57 304 3551505', 'V.-11.647.505', 'PI', 'emir.morillo@mmdmcs.com', 40, 'COLOMBIA', 'PI', NULL, 'Por carnetizar', 'FC-01-7C-99-74-35', NULL, 'ENVY', 'SN', 'FORANEO INTERNACIONAL', 0, 'No requiere', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (246, 'Kira', 'Rocha', 'Kira.Rocha', '988510', '1', '+507 6019-0587', '988510', 'PI', 'kira.rocha@mmdmcs.com ', 40, 'PANAMA', 'PI', NULL, 'Por carnetizar', '3c:06:30:18:58:21', NULL, '13 inch M1 2020', 'C02FX5EWQ05G', 'FORANEO INTERNACIONAL', 0, 'No requiere', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (256, 'Finanzas', 'Finanzas', 'fimcs', 'fimcs', '1', '', '', '', '', 30, '', '', '', '', '', '', '', '', '', 0, '', 'Seleccione', '', '', '', '', '', '', '');

-- ----------------------------
-- Table structure for dg_empresa_consultora
-- ----------------------------
DROP TABLE IF EXISTS `dg_empresa_consultora`;
CREATE TABLE `dg_empresa_consultora`  (
  `idEmpresaConsultora` int NOT NULL AUTO_INCREMENT,
  `nombreEmpresaConsultora` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `activo` bit(1) NULL DEFAULT NULL,
  `idAprobador` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`idEmpresaConsultora`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of dg_empresa_consultora
-- ----------------------------
INSERT INTO `dg_empresa_consultora` VALUES (1, 'MCS', b'1', '123,171,172,174,178');
INSERT INTO `dg_empresa_consultora` VALUES (2, 'MPS', b'1', '123,171,172,174,178');
INSERT INTO `dg_empresa_consultora` VALUES (3, 'QP', b'1', '123,171,172,174,178');

-- ----------------------------
-- Table structure for dg_indicadores_sev
-- ----------------------------
DROP TABLE IF EXISTS `dg_indicadores_sev`;
CREATE TABLE `dg_indicadores_sev`  (
  `ID` int NOT NULL,
  `IndSEV` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `HHE` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `total dias perdidos` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `total dias cargados` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of dg_indicadores_sev
-- ----------------------------

-- ----------------------------
-- Table structure for dg_indicadores_si
-- ----------------------------
DROP TABLE IF EXISTS `dg_indicadores_si`;
CREATE TABLE `dg_indicadores_si`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `Complejo_id` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `Siglas_Complejo` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `Fecha_Carga` date NULL DEFAULT NULL,
  `IFB` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `HHE_FB` int NULL DEFAULT NULL,
  `TAO` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `ISEV` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `HHE_SEV` int NULL DEFAULT NULL,
  `TDP` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `TDC` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `IFN` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `HHE_FN` int NULL DEFAULT NULL,
  `TACTP` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 63 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of dg_indicadores_si
-- ----------------------------
INSERT INTO `dg_indicadores_si` VALUES (12, '3', 'CORPORATIVO', '2023-05-31', '0.00', 141417, '0', '0.00', 141417, '0', '0', '0.00', 141417, '0');
INSERT INTO `dg_indicadores_si` VALUES (11, '3', 'CORPORATIVO', '2023-03-31', '0.00', 141417, '0', '0.00', 141417, '0', '0', '0.00', 141417, '0');
INSERT INTO `dg_indicadores_si` VALUES (10, '3', 'CORPORATIVO', '2023-04-28', '14.66', 136455, '2', '21.99', 136455, '3', '0', '7.33', 136455, '1');
INSERT INTO `dg_indicadores_si` VALUES (9, '3', 'CORPORATIVO', '2023-02-28', '0.00', 127358, '0', '0.00', 127358, '0', '0', '0.00', 127358, '0');
INSERT INTO `dg_indicadores_si` VALUES (8, '3', 'CORPORATIVO', '2023-01-31', '0.00', 141588, '0', '0.00', 141588, '0', '0', '0.00', 141588, '0');
INSERT INTO `dg_indicadores_si` VALUES (13, '3', 'CORPORATIVO', '2023-06-30', '7.33', 136455, '1', '0.00', 136455, '0', '0', '0.00', 136455, '0');
INSERT INTO `dg_indicadores_si` VALUES (14, '3', 'CORPORATIVO', '2023-07-31', '14.14', 141417, '2', '190.92', 141417, '27', '0', '14.14', 141417, '2');
INSERT INTO `dg_indicadores_si` VALUES (15, '3', 'CORPORATIVO', '2023-08-31', '0.00', 142443, '0', '0.00', 142443, '0', '0', '0.00', 142443, '0');
INSERT INTO `dg_indicadores_si` VALUES (16, '3', 'CORPORATIVO', '2022-01-31', '0.00', 125685, '0', '0.00', 125685, '0', '0', '0.00', 125685, '0');
INSERT INTO `dg_indicadores_si` VALUES (17, '3', 'CORPORATIVO', '2022-02-28', '17.67', 113190, '2', '17.67', 113190, '2', '0', '8.83', 113190, '1');
INSERT INTO `dg_indicadores_si` VALUES (18, '3', 'CORPORATIVO', '2022-03-30', '0.00', 115425, '0', '0.00', 115425, '0', '0', '0.00', 115425, '0');
INSERT INTO `dg_indicadores_si` VALUES (19, '3', 'CORPORATIVO', '2022-04-30', '0.00', 111375, '0', '0.00', 111375, '0', '0', '0.00', 111375, '0');
INSERT INTO `dg_indicadores_si` VALUES (20, '3', 'CORPORATIVO', '2022-05-28', '7.66', 130626, '1', '160.76', 130626, '21', '0', '7.66', 130626, '1');
INSERT INTO `dg_indicadores_si` VALUES (21, '3', 'CORPORATIVO', '2022-06-30', '8.21', 121770, '1', '0.00', 121770, '0', '0', '0.00', 121770, '0');
INSERT INTO `dg_indicadores_si` VALUES (22, '3', 'CORPORATIVO', '2022-07-30', '7.08', 141246, '1', '148.68', 141246, '21', '0', '7.08', 141246, '1');
INSERT INTO `dg_indicadores_si` VALUES (23, '3', 'CORPORATIVO', '2022-08-30', '7.06', 141588, '1', '148.32', 141588, '21', '0', '7.06', 141588, '1');
INSERT INTO `dg_indicadores_si` VALUES (24, '3', 'CORPORATIVO', '2022-09-30', '0.00', 136620, '0', '0.00', 136620, '0', '0', '0.00', 136620, '0');
INSERT INTO `dg_indicadores_si` VALUES (25, '3', 'CORPORATIVO', '2022-10-30', '0.00', 141588, '0', '0.00', 141588, '0', '0', '0.00', 141588, '0');
INSERT INTO `dg_indicadores_si` VALUES (26, '3', 'CORPORATIVO', '2022-11-30', '0.00', 136620, '0', '0.00', 136620, '0', '0', '0.00', 136620, '0');
INSERT INTO `dg_indicadores_si` VALUES (27, '3', 'CORPORATIVO', '2022-12-30', '7.06', 141588, '1', '0.00', 141588, '0', '0', '0.00', 141588, '0');
INSERT INTO `dg_indicadores_si` VALUES (28, '2', 'CPAMC', '2022-01-01', '0.00', 308142, '0', '0.00', 308142, '0', '0', '0.00', 308142, '0');
INSERT INTO `dg_indicadores_si` VALUES (29, '2', 'CPAMC', '2022-02-27', '3.52', 284284, '1', '0.00', 284284, '0', '0', '0.00', 284284, '0');
INSERT INTO `dg_indicadores_si` VALUES (30, '2', 'CPAMC', '2022-03-30', '0.00', 315666, '0', '0.00', 315666, '0', '0', '0.00', 315666, '0');
INSERT INTO `dg_indicadores_si` VALUES (31, '2', 'CPAMC', '2022-04-30', '0.00', 293040, '0', '0.00', 293040, '0', '0', '0.00', 293040, '0');
INSERT INTO `dg_indicadores_si` VALUES (32, '2', 'CPAMC', '2022-05-30', '10.11', 296856, '3', '104.43', 296856, '31', '0', '10.11', 296856, '3');
INSERT INTO `dg_indicadores_si` VALUES (33, '2', 'CPAMC', '2022-06-30', '0.00', 286440, '0', '0.00', 286440, '0', '0', '0.00', 286440, '0');
INSERT INTO `dg_indicadores_si` VALUES (34, '2', 'CPAMC', '2022-07-30', '0.00', 296856, '0', '0.00', 296856, '0', '0', '0.00', 296856, '0');
INSERT INTO `dg_indicadores_si` VALUES (35, '2', 'CPAMC', '2022-08-30', '0.00', 296856, '0', '0.00', 296856, '0', '0', '0.00', 296856, '0');
INSERT INTO `dg_indicadores_si` VALUES (36, '2', 'CPAMC', '2022-09-30', '0.00', 286440, '0', '0.00', 286440, '0', '0', '0.00', 286440, '0');
INSERT INTO `dg_indicadores_si` VALUES (37, '2', 'CPAMC', '2022-10-30', '3.37', 296856, '1', '16.84', 296856, '5', '0', '3.37', 296856, '1');
INSERT INTO `dg_indicadores_si` VALUES (38, '2', 'CPAMC', '2022-11-29', '0.00', 286440, '0', '0.00', 286440, '0', '0', '0.00', 286440, '0');
INSERT INTO `dg_indicadores_si` VALUES (39, '2', 'CPAMC', '2022-12-30', '0.00', 296856, '0', '0.00', 296856, '0', '0', '0.00', 296856, '0');
INSERT INTO `dg_indicadores_si` VALUES (40, '4', 'CPJAA', '2022-01-30', '0.00', 16997, '0', '0.00', 16997, '0', '0', '0.00', 16997, '0');
INSERT INTO `dg_indicadores_si` VALUES (41, '4', 'CPJAA', '2022-02-27', '0.00', 61754, '0', '0.00', 61754, '0', '0', '0.00', 61754, '0');
INSERT INTO `dg_indicadores_si` VALUES (42, '4', 'CPJAA', '2022-03-31', '14.58', 68571, '1', '0.00', 68571, '0', '0', '0.00', 68571, '0');
INSERT INTO `dg_indicadores_si` VALUES (43, '4', 'CPJAA', '2022-04-30', '0.00', 71115, '0', '0.00', 71115, '0', '0', '0.00', 71115, '0');
INSERT INTO `dg_indicadores_si` VALUES (44, '4', 'CPJAA', '2022-05-30', '13.76', 72675, '1', '0.00', 72675, '0', '0', '0.00', 72675, '0');
INSERT INTO `dg_indicadores_si` VALUES (45, '4', 'CPJAA', '2022-06-29', '14.40', 69465, '1', '0.00', 69465, '0', '0', '0.00', 69465, '0');
INSERT INTO `dg_indicadores_si` VALUES (46, '4', 'CPJAA', '2022-07-29', '0.00', 72162, '0', '0.00', 72162, '0', '0', '0.00', 72162, '0');
INSERT INTO `dg_indicadores_si` VALUES (47, '4', 'CPJAA', '2022-08-29', '0.00', 69768, '0', '0.00', 69768, '0', '0', '0.00', 69768, '0');
INSERT INTO `dg_indicadores_si` VALUES (48, '4', 'CPJAA', '2022-09-30', '0.00', 68145, '0', '0.00', 68145, '0', '0', '0.00', 68145, '0');
INSERT INTO `dg_indicadores_si` VALUES (49, '4', 'CPJAA', '2022-10-31', '0.00', 69768, '0', '0.00', 69768, '0', '0', '0.00', 69768, '0');
INSERT INTO `dg_indicadores_si` VALUES (50, '4', 'CPJAA', '2022-11-30', '0.00', 67980, '0', '0.00', 67980, '0', '0', '0.00', 67980, '0');
INSERT INTO `dg_indicadores_si` VALUES (51, '4', 'CPJAA', '2022-12-30', '0.00', 70965, '0', '', 70965, '0', '0', '0.00', 70965, '0');
INSERT INTO `dg_indicadores_si` VALUES (52, '1', 'CPHC(MORON)', '2022-01-30', '5.47', 365598, '2', '21.88', 365598, '8', '0', '5.47', 365598, '2');
INSERT INTO `dg_indicadores_si` VALUES (53, '1', 'CPHC(MORON)', '2022-02-27', '0.00', 352770, '0', '0.00', 352770, '0', '0', '0.00', 352770, '0');
INSERT INTO `dg_indicadores_si` VALUES (54, '1', 'CPHC(MORON)', '2022-03-30', '5.47', 365598, '2', '13.68', 365598, '5', '0', '2.74', 365598, '1');
INSERT INTO `dg_indicadores_si` VALUES (55, '1', 'CPHC(MORON)', '2022-05-30', '8.09', 370728, '3', '13.49', 370728, '5', '0', '5.39', 370728, '2');
INSERT INTO `dg_indicadores_si` VALUES (56, '1', 'CPHC(MORON)', '2022-06-30', '2.71', 368560, '1', '18.99', 3688560, '7', '0', '2.71', 368560, '1');
INSERT INTO `dg_indicadores_si` VALUES (57, '1', 'CPHC(MORON)', '2022-07-30', '5.73', 349182, '2', '65.87', 349182, '23', '0', '5.73', 349182, '2');
INSERT INTO `dg_indicadores_si` VALUES (58, '1', 'CPHC(MORON)', '2022-08-30', '7.87', 381159, '3', '62.97', 381159, '24', '0', '5.25', 381159, '2');
INSERT INTO `dg_indicadores_si` VALUES (59, '1', 'CPHC(MORON)', '2022-09-30', '2.66', 375530, '1', '0.00', 375530, '0', '0', '0.00', 375530, '0');
INSERT INTO `dg_indicadores_si` VALUES (60, '1', 'CPHC(MORON)', '2022-10-30', '2.58', 387828, '1', '0.00', 387828, '0', '0', '0.00', 387828, '0');
INSERT INTO `dg_indicadores_si` VALUES (61, '1', 'CPHC(MORON)', '2022-11-30', '2.59', 385560, '1', '25.94', 385560, '10', '0', '2.59', 385560, '1');
INSERT INTO `dg_indicadores_si` VALUES (62, '1', 'CPHC(MORON)', '2022-12-30', '2.46', 406125, '1', '17.24', 406125, '7', '0', '2.46', 406125, '1');

-- ----------------------------
-- Table structure for dg_indicadores_si_fb
-- ----------------------------
DROP TABLE IF EXISTS `dg_indicadores_si_fb`;
CREATE TABLE `dg_indicadores_si_fb`  (
  `ID` int NOT NULL,
  `Complejo_id` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `Siglas_Complejo` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `IFB` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `HHE` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `TAO` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of dg_indicadores_si_fb
-- ----------------------------

-- ----------------------------
-- Table structure for dg_indicadores_si_fn
-- ----------------------------
DROP TABLE IF EXISTS `dg_indicadores_si_fn`;
CREATE TABLE `dg_indicadores_si_fn`  (
  `ID` int NOT NULL,
  `Complejo_id` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `Siglas_Complejo` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `IFN` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `HHE` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `TACTP` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of dg_indicadores_si_fn
-- ----------------------------

-- ----------------------------
-- Table structure for dg_indicadores_sp
-- ----------------------------
DROP TABLE IF EXISTS `dg_indicadores_sp`;
CREATE TABLE `dg_indicadores_sp`  (
  `idIndicadores` int NOT NULL AUTO_INCREMENT,
  `complejo_id` char(2) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `Siglas_Complejo` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `Fecha_Carga` date NULL DEFAULT NULL,
  `HHT` char(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `FHP` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `FHC` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `ESP` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `ESPN1` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `ESPN2` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `ESPN3` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `IESP` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `IEPN1` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `ISPN2` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `ISPN3` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `fechaCreacion` date NULL DEFAULT NULL,
  `creadoPor` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`idIndicadores`) USING BTREE,
  INDEX `complejo_id`(`Siglas_Complejo`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 93 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of dg_indicadores_sp
-- ----------------------------
INSERT INTO `dg_indicadores_sp` VALUES (13, '1', 'CPHC(MORON)', '2023-03-03', '594579', '497103', '97476', '1', '0', '0', '1', '1.68', '0.00', '0.00', '1.68', '2023-03-03', 'gparpacen');
INSERT INTO `dg_indicadores_sp` VALUES (12, '2', 'CPAMC', '2023-03-03', '580963', '304722', '276241', '0', '0', '0', '0', '0.00', '0.00', '0.00', '0.00', '2023-03-03', 'gparpacen');
INSERT INTO `dg_indicadores_sp` VALUES (11, '4', 'CPJAA', '2023-03-03', '90876', '54549', '36327', '0', '0', '0', '0', '0.00', '0.00', '0.00', '0.00', '2023-03-03', 'gparpacen');
INSERT INTO `dg_indicadores_sp` VALUES (15, '24', 'BORBURATA', '2023-08-04', '6112', '5814', '298', '0', '0', '0', '0', '0.00', '0.00', '0.00', '0.00', '2023-08-04', 'gparpacen');
INSERT INTO `dg_indicadores_sp` VALUES (16, '4', 'CPJAA', '2023-08-04', '92788', '51642', '41146', '0', '0', '0', '0', '0.00', '0.00', '0.00', '0.00', '2023-08-04', 'gparpacen');
INSERT INTO `dg_indicadores_sp` VALUES (18, '1', 'CPHC(MORON)', '2023-01-05', '515268', '393300', '121968', '0', '0', '0', '0', '0.00', '0.00', '0.00', '0.00', '2023-01-05', 'lperaza');
INSERT INTO `dg_indicadores_sp` VALUES (19, '1', 'CPHC(MORON)', '2023-02-05', '456450', '358974', '97476', '1', '0', '0', '1', '2.19', '0.00', '0.00', '2.19', '2023-02-05', 'lperaza');
INSERT INTO `dg_indicadores_sp` VALUES (20, '1', 'CPHC(MORON)', '2023-04-05', '491622', '397290', '94332', '8', '0', '0', '8', '16.27', '0.00', '0.00', '16.27', '2023-04-05', 'lperaza');
INSERT INTO `dg_indicadores_sp` VALUES (21, '1', 'CPHC(MORON)', '2023-05-05', '461010', '384750', '76260', '41', '0', '0', '41', '88.94', '0.00', '0.00', '88.94', '2023-05-05', 'lperaza');
INSERT INTO `dg_indicadores_sp` VALUES (22, '1', 'CPHC(MORON)', '2023-06-05', '458080', '381820', '76260', '7', '0', '2', '5', '15.28', '0.00', '4.37', '10.92', '2023-06-05', 'lperaza');
INSERT INTO `dg_indicadores_sp` VALUES (23, '1', 'CPHC(Idiota)', '2023-07-05', '472830', '384066', '88764', '1', '0', '0', '1', '2.11', '0.00', '0.00', '2.11', '2023-07-05', 'gparpacen');
INSERT INTO `dg_indicadores_sp` VALUES (24, '1', 'CPHC(MORON)', '2023-08-04', '491811', '403047', '88764', '0', '0', '0', '0', '0.00', '0.00', '0.00', '0.00', '2023-08-04', 'lperaza');
INSERT INTO `dg_indicadores_sp` VALUES (25, '2', 'CPAMC', '2023-01-05', '614024', '304722', '309302', '2', '1', '1', '0', '3.26', '1.63', '1.63', '0.00', '2023-01-05', 'lperaza');
INSERT INTO `dg_indicadores_sp` VALUES (26, '2', 'CPAMC', '2023-02-03', '514776', '274428', '240348', '0', '0', '0', '0', '0.00', '0.00', '0.00', '0.00', '2023-02-03', 'lperaza');
INSERT INTO `dg_indicadores_sp` VALUES (27, '2', 'CPAMC', '2023-04-05', '459082', '204030', '255052', '0', '0', '0', '0', '0.00', '0.00', '0.00', '0.00', '2023-04-05', 'lperaza');
INSERT INTO `dg_indicadores_sp` VALUES (28, '2', 'CPAMC', '2023-05-05', '433264', '289332', '143932', '0', '0', '0', '0', '0.00', '0.00', '0.00', '0.00', '2023-05-05', 'lperaza');
INSERT INTO `dg_indicadores_sp` VALUES (29, '2', 'CPAMC', '2023-06-05', '414600', '279180', '135420', '2', '1', '1', '0', '4.82', '2.41', '2.41', '0.00', '2023-06-05', 'lperaza');
INSERT INTO `dg_indicadores_sp` VALUES (30, '2', 'CPAMC', '2023-07-05', '489412', '289332', '200080', '0', '0', '0', '0', '0.00', '0.00', '0.00', '0.00', '2023-07-05', 'lperaza');
INSERT INTO `dg_indicadores_sp` VALUES (31, '2', 'CPAMC', '2023-08-04', '469418', '289332', '180086', '0', '0', '0', '0', '0.00', '0.00', '0.00', '0.00', '2023-08-04', 'lperaza');
INSERT INTO `dg_indicadores_sp` VALUES (32, '4', 'CPJAA', '2023-01-02', '97853', '70794', '27059', '0', '0', '0', '0', '0.00', '0.00', '0.00', '0.00', '2023-01-02', 'lperaza');
INSERT INTO `dg_indicadores_sp` VALUES (33, '4', 'CPJAA', '2023-02-03', '89444', '64218', '25226', '0', '0', '0', '0', '0.00', '0.00', '0.00', '0.00', '2023-02-03', 'lperaza');
INSERT INTO `dg_indicadores_sp` VALUES (34, '4', 'CPJAA', '2023-04-05', '87261', '49500', '37761', '0', '0', '0', '0', '0.00', '0.00', '0.00', '0.00', '2023-04-05', 'lperaza');
INSERT INTO `dg_indicadores_sp` VALUES (35, '4', 'CPJAA', '2023-05-05', '91750', '56088', '35662', '0', '0', '0', '0', '0.00', '0.00', '0.00', '0.00', '2023-05-05', 'lperaza');
INSERT INTO `dg_indicadores_sp` VALUES (36, '4', 'CPJAA', '2023-06-05', '95868', '55935', '39933', '0', '0', '0', '0', '0.00', '0.00', '0.00', '0.00', '2023-06-05', 'lperaza');
INSERT INTO `dg_indicadores_sp` VALUES (37, '4', 'CPJAA', '2023-07-05', '87109', '51984', '35125', '0', '0', '0', '0', '0.00', '0.00', '0.00', '0.00', '2023-07-05', 'lperaza');
INSERT INTO `dg_indicadores_sp` VALUES (38, '24', 'BORBURATA', '2023-01-05', '7073', '6840', '233', '0', '0', '0', '0', '0.00', '0.00', '0.00', '0.00', '2023-01-05', 'lperaza');
INSERT INTO `dg_indicadores_sp` VALUES (39, '24', 'BORBURATA', '2023-02-03', '6006', '5852', '154', '0', '0', '0', '0', '0.00', '0.00', '0.00', '0.00', '2023-02-03', 'lperaza');
INSERT INTO `dg_indicadores_sp` VALUES (40, '24', 'BORBURATA', '2023-03-03', '7061', '6840', '221', '0', '0', '0', '0', '0.00', '0.00', '0.00', '0.00', '2023-03-03', 'lperaza');
INSERT INTO `dg_indicadores_sp` VALUES (41, '24', 'BORBURATA', '2023-04-05', '6589', '6270', '319', '0', '0', '0', '0', '0.00', '0.00', '0.00', '0.00', '2023-04-05', 'lperaza');
INSERT INTO `dg_indicadores_sp` VALUES (42, '24', 'BORBURATA', '2023-05-05', '5985', '5643', '342', '0', '0', '0', '0', '0.00', '0.00', '0.00', '0.00', '2023-05-05', 'lperaza');
INSERT INTO `dg_indicadores_sp` VALUES (43, '24', 'BORBURATA', '2023-06-05', '5557', '5280', '277', '0', '0', '0', '0', '0.00', '0.00', '0.00', '0.00', '2023-06-05', 'lperaza');
INSERT INTO `dg_indicadores_sp` VALUES (44, '24', 'BORBURATA', '2023-07-05', '6950', '6669', '281', '0', '0', '0', '0', '0.00', '0.00', '0.00', '0.00', '2023-07-05', 'lperaza');
INSERT INTO `dg_indicadores_sp` VALUES (45, '1', 'CPHC(MORON)', '2022-02-04', '538498', '352770', '185728', '0', '0', '0', '0', '0.00', '0.00', '0.00', '0.00', '2022-02-04', 'lperaza');
INSERT INTO `dg_indicadores_sp` VALUES (46, '1', 'CPHC(MORON)', '2022-03-04', '550246', '365598', '184648', '0', '0', '0', '0', '0.00', '0.00', '0.00', '0.00', '2022-03-04', 'lperaza');
INSERT INTO `dg_indicadores_sp` VALUES (47, '1', 'CPHC(MORON)', '2022-04-05', '567036', '373152', '193884', '8', '3', '5', '0', '14.11', '5.29', '8.82', '0.00', '2022-04-05', 'lperaza');
INSERT INTO `dg_indicadores_sp` VALUES (48, '1', 'CPHC(MORON)', '2022-05-05', '545712', '370728', '174984', '4', '2', '2', '0', '7.33', '3.66', '3.66', '0.00', '2022-05-05', 'lperaza');
INSERT INTO `dg_indicadores_sp` VALUES (49, '1', 'CPHC(MORON)', '2022-06-03', '517631', '368580', '149051', '6', '0', '6', '0', '11.59', '0.00', '11.59', '0.00', '2022-06-03', 'lperaza');
INSERT INTO `dg_indicadores_sp` VALUES (50, '1', 'CPHC(MORON)', '2022-07-05', '498233', '349182', '149051', '1', '1', '0', '0', '2.01', '2.01', '0.00', '0.00', '2022-07-05', 'lperaza');
INSERT INTO `dg_indicadores_sp` VALUES (51, '1', 'CPHC(MORON)', '2022-08-05', '530210', '381159', '149051', '2', '1', '1', '0', '3.77', '1.89', '1.89', '0.00', '2022-08-05', 'lperaza');
INSERT INTO `dg_indicadores_sp` VALUES (52, '1', 'CPHC(MORON)', '2022-09-05', '549266', '375530', '173736', '4', '1', '3', '0', '7.28', '1.82', '5.46', '0.00', '2022-09-05', 'lperaza');
INSERT INTO `dg_indicadores_sp` VALUES (53, '1', 'CPHC(MORON)', '2022-10-05', '567352', '387828', '179524', '0', '0', '0', '0', '0.00', '0.00', '0.00', '0.00', '2022-10-05', 'lperaza');
INSERT INTO `dg_indicadores_sp` VALUES (54, '1', 'CPHC(MORON)', '2022-11-04', '559336', '385560', '173776', '0', '0', '0', '0', '0.00', '0.00', '0.00', '0.00', '2022-11-04', 'lperaza');
INSERT INTO `dg_indicadores_sp` VALUES (55, '1', 'CPHC(MORON)', '2022-12-05', '581881', '406125', '175756', '0', '0', '0', '0', '0.00', '0.00', '0.00', '0.00', '2022-12-05', 'lperaza');
INSERT INTO `dg_indicadores_sp` VALUES (56, '1', 'CPHC(MORON)', '2022-01-02', '601087', '365598', '235489', '1', '0', '1', '0', '1.66', '0.00', '1.66', '0.00', '2022-01-02', 'lperaza');
INSERT INTO `dg_indicadores_sp` VALUES (57, '2', 'CPAMC', '2022-01-05', '487284', '308142', '179142', '0', '0', '0', '0', '0.00', '0.00', '0.00', '0.00', '2022-01-05', 'lperaza');
INSERT INTO `dg_indicadores_sp` VALUES (58, '2', 'CPAMC', '2022-02-04', '451492', '284284', '167208', '0', '0', '0', '0', '0.00', '0.00', '0.00', '0.00', '2022-02-04', 'lperaza');
INSERT INTO `dg_indicadores_sp` VALUES (59, '2', 'CPAMC', '2022-03-04', '525003', '315666', '209337', '0', '0', '0', '0', '0.00', '0.00', '0.00', '0.00', '2022-03-04', 'lperaza');
INSERT INTO `dg_indicadores_sp` VALUES (60, '2', 'CPAMC', '2022-04-05', '488768', '293040', '195728', '1', '1', '0', '0', '2.05', '2.05', '0.00', '0.00', '2022-04-05', 'lperaza');
INSERT INTO `dg_indicadores_sp` VALUES (61, '2', 'CPAMC', '2022-05-05', '569889', '296856', '273033', '2', '1', '0', '1', '3.51', '1.75', '0.00', '1.75', '2022-05-05', 'lperaza');
INSERT INTO `dg_indicadores_sp` VALUES (62, '2', 'CPAMC', '2022-06-03', '551485', '286440', '265045', '1', '0', '0', '1', '1.81', '0.00', '0.00', '1.81', '2022-06-03', 'lperaza');
INSERT INTO `dg_indicadores_sp` VALUES (63, '2', 'CPAMC', '2022-07-05', '521200', '296856', '224344', '0', '0', '0', '0', '0.00', '0.00', '0.00', '0.00', '2022-07-05', 'lperaza');
INSERT INTO `dg_indicadores_sp` VALUES (64, '2', 'CPAMC', '2022-08-05', '566620', '296856', '269764', '0', '0', '0', '0', '0.00', '0.00', '0.00', '0.00', '2022-08-05', 'lperaza');
INSERT INTO `dg_indicadores_sp` VALUES (65, '2', 'CPAMC', '2022-09-05', '573414', '286440', '286974', '5', '4', '1', '0', '8.72', '6.98', '1.74', '0.00', '2022-09-05', 'lperaza');
INSERT INTO `dg_indicadores_sp` VALUES (66, '2', 'CPAMC', '2022-10-05', '593288', '296856', '296432', '1', '1', '0', '0', '1.69', '1.69', '0.00', '0.00', '2022-10-05', 'lperaza');
INSERT INTO `dg_indicadores_sp` VALUES (67, '2', 'CPAMC', '2022-11-04', '537102', '286440', '250662', '4', '0', '1', '3', '7.45', '0.00', '1.86', '5.59', '2022-11-04', 'lperaza');
INSERT INTO `dg_indicadores_sp` VALUES (68, '2', 'CPAMC', '2022-12-05', '409881', '296856', '113025', '0', '0', '0', '0', '0.00', '0.00', '0.00', '0.00', '2022-12-05', 'lperaza');
INSERT INTO `dg_indicadores_sp` VALUES (69, '4', 'CPJAA', '2022-01-05', '89843', '72846', '16997', '0', '0', '0', '0', '0.00', '0.00', '0.00', '0.00', '2022-01-05', 'lperaza');
INSERT INTO `dg_indicadores_sp` VALUES (70, '4', 'CPJAA', '2022-02-03', '80732', '61754', '18978', '0', '0', '0', '0', '0.00', '0.00', '0.00', '0.00', '2022-02-03', 'lperaza');
INSERT INTO `dg_indicadores_sp` VALUES (71, '4', 'CPJAA', '2022-03-04', '101745', '68571', '33174', '0', '0', '0', '0', '0.00', '0.00', '0.00', '0.00', '2022-03-04', 'lperaza');
INSERT INTO `dg_indicadores_sp` VALUES (72, '4', 'CPJAA', '2022-04-05', '103253', '71115', '32138', '0', '0', '0', '0', '0.00', '0.00', '0.00', '0.00', '2022-04-05', 'lperaza');
INSERT INTO `dg_indicadores_sp` VALUES (73, '4', 'CPJAA', '2022-05-05', '98581', '72675', '25906', '0', '0', '0', '0', '0.00', '0.00', '0.00', '0.00', '2022-05-05', 'lperaza');
INSERT INTO `dg_indicadores_sp` VALUES (74, '4', 'CPJAA', '2022-06-03', '101586', '69465', '32121', '0', '0', '0', '0', '0.00', '0.00', '0.00', '0.00', '2022-06-03', 'lperaza');
INSERT INTO `dg_indicadores_sp` VALUES (75, '4', 'CPJAA', '2022-07-05', '102816', '72162', '30654', '0', '0', '0', '0', '0.00', '0.00', '0.00', '0.00', '2022-07-05', 'lperaza');
INSERT INTO `dg_indicadores_sp` VALUES (76, '4', 'CPJAA', '2022-08-05', '111785', '69768', '42017', '0', '0', '0', '0', '0.00', '0.00', '0.00', '0.00', '2022-08-05', 'lperaza');
INSERT INTO `dg_indicadores_sp` VALUES (77, '4', 'CPJAA', '2022-09-05', '108898', '68145', '40753', '0', '0', '0', '0', '0.00', '0.00', '0.00', '0.00', '2022-09-05', 'lperaza');
INSERT INTO `dg_indicadores_sp` VALUES (78, '4', 'CPJAA', '2022-10-05', '100834', '69768', '31066', '0', '0', '0', '0', '0.00', '0.00', '0.00', '0.00', '2022-10-05', 'lperaza');
INSERT INTO `dg_indicadores_sp` VALUES (79, '4', 'CPJAA', '2022-11-04', '91453', '67980', '23473', '0', '0', '0', '0', '0.00', '0.00', '0.00', '0.00', '2022-11-04', 'lperaza');
INSERT INTO `dg_indicadores_sp` VALUES (80, '4', 'CPJAA', '2022-12-05', '99682', '70965', '28717', '0', '0', '0', '0', '0.00', '0.00', '0.00', '0.00', '2022-12-05', 'lperaza');
INSERT INTO `dg_indicadores_sp` VALUES (81, '24', 'BORBURATA', '2022-01-03', '8550', '7182', '1368', '0', '0', '0', '0', '0.00', '0.00', '0.00', '0.00', '2022-01-03', 'lperaza');
INSERT INTO `dg_indicadores_sp` VALUES (82, '24', 'BORBURATA', '2022-02-03', '6776', '6160', '616', '0', '0', '0', '0', '0.00', '0.00', '0.00', '0.00', '2022-02-03', 'lperaza');
INSERT INTO `dg_indicadores_sp` VALUES (83, '24', 'BORBURATA', '2022-03-04', '8208', '7524', '684', '0', '0', '0', '0', '0.00', '0.00', '0.00', '0.00', '2022-03-04', 'lperaza');
INSERT INTO `dg_indicadores_sp` VALUES (84, '24', 'BORBURATA', '2022-04-05', '8085', '7425', '660', '0', '0', '0', '0', '0.00', '0.00', '0.00', '0.00', '2022-04-05', 'lperaza');
INSERT INTO `dg_indicadores_sp` VALUES (85, '24', 'BORBURATA', '2022-05-05', '7695', '7524', '171', '0', '0', '0', '0', '0.00', '0.00', '0.00', '0.00', '2022-05-05', 'lperaza');
INSERT INTO `dg_indicadores_sp` VALUES (86, '24', 'BORBURATA', '2022-06-03', '7425', '7260', '165', '0', '0', '0', '0', '0.00', '0.00', '0.00', '0.00', '2022-06-03', 'lperaza');
INSERT INTO `dg_indicadores_sp` VALUES (87, '24', 'BORBURATA', '2022-07-05', '7353', '7182', '171', '0', '0', '0', '0', '0.00', '0.00', '0.00', '0.00', '2022-07-05', 'lperaza');
INSERT INTO `dg_indicadores_sp` VALUES (88, '24', 'BORBURATA', '2022-08-05', '7011', '6840', '171', '0', '0', '0', '0', '0.00', '0.00', '0.00', '0.00', '2022-08-05', 'lperaza');
INSERT INTO `dg_indicadores_sp` VALUES (89, '24', 'BORBURATA', '2022-09-05', '6930', '6600', '330', '0', '0', '0', '0', '0.00', '0.00', '0.00', '0.00', '2022-09-05', 'lperaza');
INSERT INTO `dg_indicadores_sp` VALUES (90, '24', 'BORBURATA', '2022-10-05', '8037', '7695', '342', '0', '0', '0', '0', '0.00', '0.00', '0.00', '0.00', '2022-10-05', 'lperaza');
INSERT INTO `dg_indicadores_sp` VALUES (91, '24', 'BORBURATA', '2022-11-04', '7095', '6930', '165', '0', '0', '0', '0', '0.00', '0.00', '0.00', '0.00', '2022-11-04', 'lperaza');
INSERT INTO `dg_indicadores_sp` VALUES (92, '24', 'BORBURATA', '2022-12-05', '7011', '6840', '171', '0', '0', '0', '0', '0.00', '0.00', '0.00', '0.00', '2022-12-05', 'lperaza');

-- ----------------------------
-- Table structure for dg_proyecto
-- ----------------------------
DROP TABLE IF EXISTS `dg_proyecto`;
CREATE TABLE `dg_proyecto`  (
  `idProyecto` int NOT NULL AUTO_INCREMENT,
  `nameProyecto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `fechaInicio` date NULL DEFAULT NULL,
  `fechaFin` date NULL DEFAULT NULL,
  `activo` bigint NULL DEFAULT NULL,
  `gerenteProyecto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pais` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`idProyecto`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of dg_proyecto
-- ----------------------------
INSERT INTO `dg_proyecto` VALUES (1, 'Actualizacion Tecnologica (P1)', '2023-10-02', '2024-05-15', 1, 'Luis Salas', 'VE', 'CCS');
INSERT INTO `dg_proyecto` VALUES (10, 'Soporte Tecnico P2_F2', '2023-09-22', '2023-09-24', 1, 'Edgar Corao', 'VE', 'CARABOBO');

-- ----------------------------
-- Table structure for dg_reporte_factura
-- ----------------------------
DROP TABLE IF EXISTS `dg_reporte_factura`;
CREATE TABLE `dg_reporte_factura`  (
  `idFactura` int NOT NULL AUTO_INCREMENT COMMENT 'Correlativo',
  `idEmpleado` int NULL DEFAULT NULL COMMENT 'Id del Consultor',
  `corte` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Corte al que pertenece el regitro MMAAAA',
  `urlFactura` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'URL de la Direccion del Drive Compatida de la Factura',
  `MontoFactura` float NULL DEFAULT NULL COMMENT 'Monto de la factura',
  `creadoPor` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'ususario que la cargo',
  `fechaCreacion` date NULL DEFAULT NULL,
  PRIMARY KEY (`idFactura`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of dg_reporte_factura
-- ----------------------------

-- ----------------------------
-- Table structure for dg_reporte_tiempo
-- ----------------------------
DROP TABLE IF EXISTS `dg_reporte_tiempo`;
CREATE TABLE `dg_reporte_tiempo`  (
  `idRegistro` int NOT NULL AUTO_INCREMENT COMMENT 'Correlativo',
  `idEmpleado` int NULL DEFAULT NULL COMMENT 'Id del Consultor',
  `idEmpresaConsultora` int NULL DEFAULT NULL COMMENT 'ID de la Consultora Contratante',
  `idCliente` int NULL DEFAULT NULL COMMENT 'Id Cliente',
  `idProyecto` int NULL DEFAULT NULL COMMENT 'Id Proyecto',
  `idTipoActividad` int NULL DEFAULT NULL COMMENT 'id Tipo de Actividad',
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
  `ticketNum` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `descripcionModulo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`idRegistro`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 244 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of dg_reporte_tiempo
-- ----------------------------
INSERT INTO `dg_reporte_tiempo` VALUES (225, 237, 3, 1, 1, 14, 'Remota', 'Revision y adecuación de la plantilla mesa de trabajo ', '2023-10-15', 4.00, '102023', '2023-10-23', 'Orlando.Benavides', '1', '1', '2023-10-23', 'Orlando.Benavides', NULL, '', 'NO-SAP');
INSERT INTO `dg_reporte_tiempo` VALUES (25, 228, 2, 1, 1, 1, 'Presencial', 'Reunión', '2023-10-02', 8.00, '102023', '2023-10-17', 'Benito.Valeriano', '1', '1', '2023-10-17', 'Benito.Valeriano', NULL, NULL, NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (26, 209, 1, 1, 1, 1, 'Presencial', 'Levantamiento de información - Revisión de procesos y datos maestros generales de controlling', '2023-10-16', 8.00, '102023', '2023-10-17', 'Emperatriz.Prichinenko', '1', '1', '2023-10-17', 'Emperatriz.Prichinenko', NULL, NULL, NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (27, 227, 2, 1, 1, 1, 'Presencial', 'Reunion overview', '2023-10-02', 8.00, '102023', '2023-10-17', 'Javier.Ortiz', '1', '1', '2023-10-17', 'Javier.Ortiz', NULL, NULL, NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (28, 228, 2, 1, 1, 1, 'Presencial', 'Disponible', '2023-10-03', 8.00, '102023', '2023-10-17', 'Benito.Valeriano', '1', '1', '2023-10-17', 'Benito.Valeriano', NULL, NULL, NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (29, 227, 2, 1, 1, 1, 'Presencial', 'Disponible', '2023-10-03', 8.00, '102023', '2023-10-17', 'Javier.Ortiz', '1', '1', '2023-10-17', 'Javier.Ortiz', NULL, NULL, NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (30, 227, 2, 1, 1, 1, 'Remota', 'Levantamiento de informacion', '2023-10-09', 8.00, '102023', '2023-10-17', 'Javier.Ortiz', '1', '1', '2023-10-17', 'Javier.Ortiz', '', NULL, NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (31, 227, 2, 1, 1, 1, 'Remota', 'Levantamiento de informacion', '2023-10-10', 8.00, '102023', '2023-10-17', 'Javier.Ortiz', '1', '1', '2023-10-17', 'Javier.Ortiz', '', NULL, NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (32, 227, 2, 1, 1, 1, 'Remota', 'Levantamiento de informacion', '2023-10-11', 8.00, '102023', '2023-10-17', 'Javier.Ortiz', '1', '1', '2023-10-17', 'Javier.Ortiz', '', NULL, NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (33, 227, 2, 1, 1, 1, 'Remota', 'Levantamiento de informacion', '2023-10-12', 8.00, '102023', '2023-10-17', 'Javier.Ortiz', '1', '1', '2023-10-17', 'Javier.Ortiz', NULL, NULL, NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (34, 227, 2, 1, 1, 1, 'Remota', 'Levantamiento de informacion', '2023-10-13', 8.00, '102023', '2023-10-17', 'Javier.Ortiz', '1', '1', '2023-10-17', 'Javier.Ortiz', NULL, NULL, NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (35, 228, 2, 1, 1, 1, 'Remota', 'Remota', '2023-10-09', 8.00, '102023', '2023-10-17', 'Benito.Valeriano', '1', '1', '2023-10-17', 'Benito.Valeriano', NULL, NULL, NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (36, 227, 2, 1, 1, 1, 'Presencial', 'Reunion Personal de nomina', '2023-10-16', 8.00, '102023', '2023-10-17', 'Javier.Ortiz', '1', '1', '2023-10-17', 'Javier.Ortiz', NULL, NULL, NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (37, 228, 2, 1, 1, 1, 'Remota', 'Remota', '2023-10-10', 8.00, '102023', '2023-10-17', 'Benito.Valeriano', '1', '1', '2023-10-17', 'Benito.Valeriano', NULL, NULL, NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (38, 227, 2, 1, 1, 1, 'Presencial', 'Reunion overview manejo Trello , control de horas', '2023-10-17', 8.00, '102023', '2023-10-17', 'Javier.Ortiz', '1', '1', '2023-10-17', 'Javier.Ortiz', NULL, NULL, NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (39, 228, 2, 1, 1, 1, 'Remota', 'Remota', '2023-10-11', 8.00, '102023', '2023-10-17', 'Benito.Valeriano', '1', '1', '2023-10-17', 'Benito.Valeriano', NULL, NULL, NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (40, 228, 2, 1, 1, 1, 'Remota', 'Remota', '2023-10-12', 8.00, '102023', '2023-10-17', 'Benito.Valeriano', '1', '1', '2023-10-17', 'Benito.Valeriano', NULL, NULL, NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (41, 228, 2, 1, 1, 1, 'Remota', 'Remota', '2023-10-13', 8.00, '102023', '2023-10-17', 'Benito.Valeriano', '1', '1', '2023-10-17', 'Benito.Valeriano', NULL, NULL, NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (42, 228, 2, 1, 1, 1, 'Presencial', 'Reunion usuarios de nómina', '2023-10-16', 8.00, '102023', '2023-10-17', 'Benito.Valeriano', '1', '1', '2023-10-17', 'Benito.Valeriano', '', NULL, NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (43, 228, 2, 1, 1, 1, 'Presencial', 'Reuniones varias', '2023-10-17', 8.00, '102023', '2023-10-17', 'Benito.Valeriano', '1', '1', '2023-10-17', 'Benito.Valeriano', NULL, NULL, NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (44, 224, 1, 1, 1, 1, 'Presencial', 'SEMANA KICKOFF: PREPARACION DE LOGISTICA, REVISION DE DOCUMENTACION Y EVALUACIÓN DEL CLIENTE', '2023-10-02', 8.00, '102023', '2023-10-17', 'Carlos.Fuenmayor', '1', '1', '2023-10-17', 'Carlos.Fuenmayor', NULL, NULL, NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (45, 224, 1, 1, 1, 1, 'Presencial', 'SEMANA KICKOFF: PREPARACION DE LOGISTICA, REVISION DE DOCUMENTACION Y EVALUACIÓN DEL CLIENTE', '2023-10-03', 8.00, '102023', '2023-10-17', 'Carlos.Fuenmayor', '1', '1', '2023-10-17', 'Carlos.Fuenmayor', NULL, NULL, NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (46, 224, 1, 1, 1, 1, 'Presencial', 'SEMANA KICKOFF: PREPARACION DE LOGISTICA, REVISION DE DOCUMENTACION Y EVALUACIÓN DEL CLIENTE', '2023-10-04', 8.00, '102023', '2023-10-17', 'Carlos.Fuenmayor', '1', '1', '2023-10-17', 'Carlos.Fuenmayor', NULL, NULL, NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (47, 224, 1, 1, 1, 1, 'Remota', 'SEMANA KICKOFF: PREPARACION DE LOGISTICA, REVISION DE DOCUMENTACION Y EVALUACIÓN DEL CLIENTE', '2023-10-05', 8.00, '102023', '2023-10-17', 'Carlos.Fuenmayor', '1', '1', '2023-10-17', 'Carlos.Fuenmayor', NULL, NULL, NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (48, 224, 1, 1, 1, 1, 'Presencial', 'SEMANA KICKOFF: PREPARACION DE LOGISTICA, REVISION DE DOCUMENTACION Y EVALUACIÓN DEL CLIENTE', '2023-10-06', 8.00, '102023', '2023-10-17', 'Carlos.Fuenmayor', '1', '1', '2023-10-17', 'Carlos.Fuenmayor', NULL, NULL, NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (49, 224, 1, 1, 1, 1, 'Remota', 'SEMANA KICKOFF: PREPARACION DE LOGISTICA, REVISION DE DOCUMENTACION Y EVALUACIÓN DEL CLIENTE', '2023-10-07', 8.00, '102023', '2023-10-17', 'Carlos.Fuenmayor', '1', '1', '2023-10-17', 'Carlos.Fuenmayor', NULL, NULL, NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (50, 209, 1, 1, 1, 1, 'Presencial', 'Levantamiento de información - Revisión de procesos y datos maestros generales de controlling, reunión con Pedro Rodriguez para ver a visión general del negocio del petróleo.                                                                                 ', '2023-10-17', 8.00, '102023', '2023-10-17', 'Emperatriz.Prichinenko', '1', '1', '2023-10-17', 'Emperatriz.Prichinenko', NULL, NULL, NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (51, 224, 1, 1, 1, 1, 'Presencial', 'REVISION DE DOCUMENTACION, EVALUACIÓN DEL CLIENTE,  ACCESOS A SAP', '2023-10-09', 8.00, '102023', '2023-10-17', 'Carlos.Fuenmayor', '1', '1', '2023-10-17', 'Carlos.Fuenmayor', NULL, NULL, NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (52, 224, 1, 1, 1, 1, 'Presencial', 'REVISION DE DOCUMENTACION, EVALUACIÓN DEL CLIENTE,  ACCESOS A SAP', '2023-10-10', 8.00, '102023', '2023-10-17', 'Carlos.Fuenmayor', '1', '1', '2023-10-17', 'Carlos.Fuenmayor', NULL, NULL, NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (53, 224, 1, 1, 1, 1, 'Presencial', 'REVISION DE DOCUMENTACION, EVALUACIÓN DEL CLIENTE,  ACCESOS A SAP', '2023-10-11', 8.00, '102023', '2023-10-17', 'Carlos.Fuenmayor', '1', '1', '2023-10-17', 'Carlos.Fuenmayor', NULL, NULL, NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (54, 224, 1, 1, 1, 1, 'Presencial', 'REVISION DE DOCUMENTACION, EVALUACIÓN DEL CLIENTE,  ACCESOS A SAP', '2023-10-12', 8.00, '102023', '2023-10-17', 'Carlos.Fuenmayor', '1', '1', '2023-10-17', 'Carlos.Fuenmayor', NULL, NULL, NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (55, 224, 1, 1, 1, 1, 'Presencial', 'REVISION DE DOCUMENTACION, EVALUACIÓN DEL CLIENTE,  ACCESOS A SAP', '2023-10-13', 8.00, '102023', '2023-10-17', 'Carlos.Fuenmayor', '1', '1', '2023-10-17', 'Carlos.Fuenmayor', NULL, NULL, NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (56, 224, 1, 1, 1, 1, 'Presencial', 'REVISION DE DOCUMENTACION, EVALUACIÓN DEL CLIENTE,  ACCESOS A SAP', '2023-10-14', 8.00, '102023', '2023-10-17', 'Carlos.Fuenmayor', '1', '1', '2023-10-17', 'Carlos.Fuenmayor', NULL, NULL, NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (57, 224, 1, 1, 1, 1, 'Presencial', 'REVISION DE DOCUMENTACION, EVALUACIÓN DEL CLIENTE,  ACCESOS A SAP, EQUIPO FUNCIONAL PM', '2023-10-16', 8.00, '102023', '2023-10-17', 'Carlos.Fuenmayor', '1', '1', '2023-10-17', 'Carlos.Fuenmayor', NULL, NULL, NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (58, 224, 1, 1, 1, 1, 'Presencial', 'REVISION DE DOCUMENTACION, EVALUACIÓN DEL CLIENTE,  ACCESOS A SAP, EQUIPO FUNCIONAL PM', '2023-10-17', 8.00, '102023', '2023-10-17', 'Carlos.Fuenmayor', '1', '1', '2023-10-17', 'Carlos.Fuenmayor', NULL, NULL, NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (59, 233, 1, 1, 1, 14, 'Presencial', 'Reunión Edgar Corao, Luis Sala para la modificación de plantillas  que se implementaran  en el proyecto.', '2023-10-13', 6.00, '102023', '2023-10-17', 'Maria.Marrero', '1', '1', '2023-10-17', 'Maria.Marrero', NULL, NULL, NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (60, 233, 1, 1, 1, 14, 'Remota', 'Presentación de propuestas de plantillas ', '2023-10-14', 8.00, '102023', '2023-10-17', 'Maria.Marrero', '1', '1', '2023-10-17', 'Maria.Marrero', NULL, NULL, NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (61, 233, 1, 1, 1, 14, 'Remota', 'Presentación de propuesta de plantillas ', '2023-10-15', 8.00, '102023', '2023-10-17', 'Maria.Marrero', '1', '1', '2023-10-17', 'Maria.Marrero', NULL, NULL, NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (62, 233, 1, 1, 1, 13, 'Presencial', 'Reunión de Homologación de documento', '2023-10-16', 1.00, '102023', '2023-10-17', 'Maria.Marrero', '1', '1', '2023-10-17', 'Maria.Marrero', NULL, NULL, NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (63, 233, 1, 1, 1, 14, 'Presencial', 'Adaptar al formato presentación procesos clientes, completar minuta de la reunión sobre la homologación de documentación ', '2023-10-16', 7.00, '102023', '2023-10-17', 'Maria.Marrero', '1', '1', '2023-10-17', 'Maria.Marrero', NULL, NULL, NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (64, 217, 1, 1, 1, 2, 'Presencial', 'Reunion de inicio equipo de Consultoria y Equipo de proyecto cliente, reunion equipo consultores RD y Star con usuario Maria Loaiza para recibir explicacion de como es el proceso que se siguen en RD y Star (Hidrocarburos)', '2023-10-11', 8.00, '102023', '2023-10-18', 'Elizabeth.Balza', '3', '1', '2023-10-19', 'Luis.Salas', 'Aprobacion por Lote', 'N/A', NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (65, 217, 1, 1, 1, 2, 'Presencial', 'Continuacion repaso del proceso informado el dia 11.10, aclaracion de proceso ejecutados en RD y STAR (Hidrocarburos).', '2023-10-13', 8.00, '102023', '2023-10-18', 'Elizabeth.Balza', '3', '1', '2023-10-19', 'Luis.Salas', 'Aprobacion por Lote', '', NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (66, 214, 3, 1, 1, 13, 'Remota', 'Se tenia programada reunion Pre-Kikoff', '2023-10-02', 8.00, '102023', '2023-10-18', 'Maria.Blasini', '1', '1', '2023-10-18', 'Maria.Blasini', NULL, '', NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (67, 217, 1, 1, 1, 2, 'Presencial', 'Reunion interna para aclaratorias de procesos a seguir y formatos a usar durante el proyecto, repaso del proceso levantado durante la semana pasada, no hubo reunion con cliente por problemas de accesos a sus sistemas. Se espera equipo de usuarios de RD y ', '2023-10-16', 8.00, '102023', '2023-10-18', 'Elizabeth.Balza', '3', '1', '2023-10-19', 'Luis.Salas', 'Aprobacion por Lote', '', NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (68, 214, 3, 1, 1, 13, 'Presencial', 'Reunion Pre-Kikoff con la Consultoria y el Gerente de Proyecto de PDVSA', '2023-10-03', 8.00, '102023', '2023-10-18', 'Maria.Blasini', '1', '1', '2023-10-18', 'Maria.Blasini', NULL, '', NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (69, 217, 1, 1, 1, 2, 'Presencial', 'Levantamiento informacion proceso ejecutado en RD y STAR (Gas) el equipo mostro y explico su proceso en los sistemas RD y Star a traves de un ejemplo antiguo (ambiente de produccion),  asistencia a presentacion dictada por el Sr Pedro Rodriguez, seguidame', '2023-10-17', 8.00, '102023', '2023-10-18', 'Elizabeth.Balza', '3', '1', '2023-10-19', 'Luis.Salas', 'Aprobacion por Lote', '', NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (70, 214, 3, 1, 1, 14, 'Presencial', 'Proceso de Carnetizacion en INTEVEP', '2023-10-06', 8.00, '102023', '2023-10-18', 'Maria.Blasini', '1', '1', '2023-10-18', 'Maria.Blasini', NULL, '', NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (71, 214, 3, 1, 1, 2, 'Remota', 'A la espera de llamado para iniciar actividades inherentes a la Migracion de SAP ECC 6.0 a S/4 HANA de PDVSA, Filiales, Negocios y Empresas Mixtas', '2023-10-04', 8.00, '102023', '2023-10-18', 'Maria.Blasini', '1', '1', '2023-10-18', 'Maria.Blasini', NULL, '', NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (72, 214, 3, 1, 1, 2, 'Remota', 'A la espera de llamado para iniciar actividades inherentes a la Migracion de SAP ECC 6.0 a S/4 HANA de PDVSA, Filiales, Negocios y Empresas Mixtas', '2023-10-05', 8.00, '102023', '2023-10-18', 'Maria.Blasini', '1', '1', '2023-10-18', 'Maria.Blasini', NULL, '', NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (73, 214, 3, 1, 1, 2, 'Remota', 'A la espera de llamado para iniciar actividades inherentes a la Migracion de SAP ECC 6.0 a S/4 HANA de PDVSA, Filiales, Negocios y Empresas Mixtas', '2023-10-09', 8.00, '102023', '2023-10-18', 'Maria.Blasini', '1', '1', '2023-10-18', 'Maria.Blasini', NULL, '', NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (74, 214, 3, 1, 1, 2, 'Remota', 'A la espera de llamado para iniciar actividades inherentes a la Migracion de SAP ECC 6.0 a S/4 HANA de PDVSA, Filiales, Negocios y Empresas Mixtas', '2023-10-10', 8.00, '102023', '2023-10-18', 'Maria.Blasini', '1', '1', '2023-10-18', 'Maria.Blasini', NULL, '', NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (75, 214, 3, 1, 1, 2, 'Presencial', 'Conocer a los integrantes del Procesode Migracion del Modulo de MM y los puntos criticos y/o de atencion del proceso', '2023-10-11', 8.00, '102023', '2023-10-18', 'Maria.Blasini', '1', '1', '2023-10-18', 'Maria.Blasini', NULL, '', NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (76, 214, 3, 1, 1, 2, 'Presencial', 'Revision de la Estructura Organizativa, Datos Maestros, Operaciones Transaccionales, Formularios, Carga Inicial de Inventario, BPP', '2023-10-13', 8.00, '102023', '2023-10-18', 'Maria.Blasini', '1', '1', '2023-10-18', 'Maria.Blasini', NULL, '', NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (77, 214, 3, 1, 1, 2, 'Presencial', 'Revision de minutas anteriores, Premisas de los Pedidos de Compras y Contratos, Margen de Tolerancia', '2023-10-16', 8.00, '102023', '2023-10-18', 'Maria.Blasini', '1', '1', '2023-10-18', 'Maria.Blasini', NULL, '', NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (78, 214, 3, 1, 1, 2, 'Presencial', 'Plan de Trabajo Semanal, Revisar procesos en SAP QAS Mandante 510, Tablas, Sociedades, Centros, Almacenes, Reglas de Validacion', '2023-10-17', 8.00, '102023', '2023-10-18', 'Maria.Blasini', '1', '1', '2023-10-18', 'Maria.Blasini', NULL, '', NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (79, 228, 2, 1, 1, 2, 'Presencial', 'Levantamiento de información para migración', '2023-10-18', 8.00, '102023', '2023-10-18', 'Benito.Valeriano', '1', '1', '2023-10-18', 'Benito.Valeriano', NULL, '', NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (80, 227, 2, 1, 1, 2, 'Presencial', 'Levantamiento informacion , lista de inventarios de informacion a solicitar', '2023-10-18', 8.00, '102023', '2023-10-18', 'Javier.Ortiz', '1', '1', '2023-10-18', 'Javier.Ortiz', NULL, '', NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (81, 214, 3, 1, 1, 2, 'Presencial', 'Revision de Tablas en QAS 510, breve explicacion de la funcionalidad del MATERIAL LEDGER, el RMM, induccion TRELLO', '2023-10-18', 8.00, '102023', '2023-10-18', 'Maria.Blasini', '1', '1', '2023-10-18', 'Maria.Blasini', NULL, '', NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (82, 225, 2, 1, 1, 2, 'Seleccione', ' ', '2023-10-16', 8.00, '102023', '2023-10-19', 'Adriana.Martinez', '1', '1', '2023-10-19', 'Adriana.Martinez', NULL, '', NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (83, 225, 2, 1, 1, 2, 'Presencial', ' ', '2023-10-17', 8.00, '102023', '2023-10-19', 'Adriana.Martinez', '1', '1', '2023-10-19', 'Adriana.Martinez', NULL, '', NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (84, 225, 2, 1, 1, 2, 'Presencial', ' ', '2023-10-18', 8.00, '102023', '2023-10-19', 'Adriana.Martinez', '1', '1', '2023-10-19', 'Adriana.Martinez', NULL, '', NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (85, 225, 2, 1, 1, 2, 'Presencial', ' ', '2023-10-19', 8.00, '102023', '2023-10-19', 'Adriana.Martinez', '1', '1', '2023-10-19', 'Adriana.Martinez', NULL, '', NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (86, 217, 1, 1, 1, 2, 'Presencial', 'Continuacion revision proceso RD y Star (Reportes), participacion capacitacion herramienta para seguimiento de avances en el proyecto (Trello)', '2023-10-18', 8.00, '102023', '2023-10-19', 'Elizabeth.Balza', '3', '1', '2023-10-19', 'Luis.Salas', 'Aprobacion por Lote', '', NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (87, 224, 1, 1, 1, 1, 'Seleccione', 'REVISION DE DOCUMENTACION, EVALUACIÓN DEL CLIENTE, ACCESOS A SAP, EQUIPO FUNCIONAL PM, TALLER DE TRELLO', '2023-10-18', 8.00, '102023', '2023-10-19', 'Carlos.Fuenmayor', '1', '1', '2023-10-19', 'Carlos.Fuenmayor', '', '', NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (88, 199, 3, 1, 1, 2, 'Remota', 'Levantamiento de informacion ', '2023-10-02', 8.00, '102023', '2023-10-19', 'Orlando.Labrador', '1', '1', '2023-10-19', 'Orlando.Labrador', NULL, '', NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (89, 199, 3, 1, 1, 2, 'Remota', 'Levantamiento de informacion ', '2023-10-03', 8.00, '102023', '2023-10-19', 'Orlando.Labrador', '1', '1', '2023-10-19', 'Orlando.Labrador', NULL, '', NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (90, 199, 3, 1, 1, 2, 'Remota', 'Levantamiento de informacion ', '2023-10-05', 8.00, '102023', '2023-10-19', 'Orlando.Labrador', '1', '1', '2023-10-19', 'Orlando.Labrador', '', '', NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (91, 232, 3, 1, 1, 2, 'Remota', 'Levantamiento de información P1', '2023-10-02', 8.00, '102023', '2023-10-19', 'brezhnev.vega', '3', '1', '2023-10-22', 'Luis.Salas', '', '', 'NO-SAP');
INSERT INTO `dg_reporte_tiempo` VALUES (92, 199, 3, 1, 1, 2, 'Remota', 'Levantamiento de informacion ', '2023-10-04', 8.00, '102023', '2023-10-19', 'Orlando.Labrador', '1', '1', '2023-10-19', 'Orlando.Labrador', NULL, '', NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (93, 232, 3, 1, 1, 2, 'Remota', 'Levantamiento de información P1', '2023-10-03', 8.00, '102023', '2023-10-19', 'brezhnev.vega', '1', '1', '2023-10-23', 'brezhnev.vega', '', '', 'NO-SAP');
INSERT INTO `dg_reporte_tiempo` VALUES (94, 199, 3, 1, 1, 2, 'Presencial', 'Levantamiento de informacion RD/Stars', '2023-10-09', 8.00, '102023', '2023-10-19', 'Orlando.Labrador', '1', '1', '2023-10-19', 'Orlando.Labrador', '', '', NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (95, 232, 3, 1, 1, 2, 'Remota', 'Levantamiento de información P1', '2023-10-04', 8.00, '102023', '2023-10-19', 'brezhnev.vega', '1', '1', '2023-10-23', 'brezhnev.vega', '', '', 'NO-SAP');
INSERT INTO `dg_reporte_tiempo` VALUES (96, 232, 3, 1, 1, 2, 'Remota', 'Levantamiento de información P1', '2023-10-05', 8.00, '102023', '2023-10-19', 'brezhnev.vega', '1', '1', '2023-10-23', 'brezhnev.vega', '', '', 'NO-SAP');
INSERT INTO `dg_reporte_tiempo` VALUES (97, 232, 3, 1, 1, 14, 'Remota', 'Levantamiento de información P1', '2023-10-06', 8.00, '102023', '2023-10-19', 'brezhnev.vega', '1', '1', '2023-10-23', 'brezhnev.vega', '', '', 'NO-SAP');
INSERT INTO `dg_reporte_tiempo` VALUES (98, 199, 3, 1, 1, 2, 'Presencial', 'Levantamiento de informacion ', '2023-10-06', 8.00, '102023', '2023-10-19', 'Orlando.Labrador', '1', '1', '2023-10-19', 'Orlando.Labrador', NULL, '', NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (99, 232, 3, 1, 1, 2, 'Presencial', 'Levantamiento de información P1', '2023-10-09', 8.00, '102023', '2023-10-19', 'brezhnev.vega', '1', '1', '2023-10-19', 'brezhnev.vega', NULL, '', NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (100, 199, 3, 1, 1, 2, 'Presencial', 'Levantamiento de informacion RD/Stars', '2023-10-10', 8.00, '102023', '2023-10-19', 'Orlando.Labrador', '1', '1', '2023-10-19', 'Orlando.Labrador', NULL, '', NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (101, 232, 3, 1, 1, 2, 'Presencial', 'Levantamiento de información P1', '2023-10-10', 8.00, '102023', '2023-10-19', 'brezhnev.vega', '1', '1', '2023-10-23', 'brezhnev.vega', '', '', 'NO-SAP');
INSERT INTO `dg_reporte_tiempo` VALUES (102, 199, 3, 1, 1, 2, 'Remota', 'documentacion', '2023-10-07', 8.00, '102023', '2023-10-19', 'Orlando.Labrador', '1', '1', '2023-10-19', 'Orlando.Labrador', '', '', NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (103, 232, 3, 1, 1, 2, 'Presencial', 'Reunión de Diagrama General RD-STAR', '2023-10-11', 8.00, '102023', '2023-10-19', 'brezhnev.vega', '1', '1', '2023-10-23', 'brezhnev.vega', '', '', 'NO-SAP');
INSERT INTO `dg_reporte_tiempo` VALUES (104, 232, 3, 1, 1, 14, 'Remota', 'Levantamiento de información P1', '2023-10-12', 8.00, '102023', '2023-10-19', 'brezhnev.vega', '1', '1', '2023-10-23', 'brezhnev.vega', '', '', 'NO-SAP');
INSERT INTO `dg_reporte_tiempo` VALUES (105, 199, 3, 1, 1, 2, 'Presencial', 'Levantamiento de informacion RD/Stars', '2023-10-11', 8.00, '102023', '2023-10-19', 'Orlando.Labrador', '1', '1', '2023-10-19', 'Orlando.Labrador', NULL, '', NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (106, 199, 3, 1, 1, 14, 'Remota', 'documentacion', '2023-10-12', 8.00, '102023', '2023-10-19', 'Orlando.Labrador', '1', '1', '2023-10-19', 'Orlando.Labrador', NULL, '', NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (107, 232, 3, 1, 1, 2, 'Presencial', 'Reunión de Procesos Transversal SAP IS OIL', '2023-10-13', 8.00, '102023', '2023-10-19', 'brezhnev.vega', '1', '1', '2023-10-23', 'brezhnev.vega', '', '', 'NO-SAP');
INSERT INTO `dg_reporte_tiempo` VALUES (108, 199, 3, 1, 1, 2, 'Presencial', 'Levantamiento de informacion RD/Stars', '2023-10-13', 8.00, '102023', '2023-10-19', 'Orlando.Labrador', '1', '1', '2023-10-19', 'Orlando.Labrador', NULL, '', NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (109, 199, 3, 1, 1, 2, 'Remota', 'documentacion', '2023-10-14', 8.00, '102023', '2023-10-19', 'Orlando.Labrador', '1', '1', '2023-10-19', 'Orlando.Labrador', NULL, '', NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (110, 228, 2, 1, 1, 2, 'Presencial', 'Levantamiento de información para migración', '2023-10-19', 8.00, '102023', '2023-10-19', 'Benito.Valeriano', '1', '1', '2023-10-19', 'Benito.Valeriano', NULL, '', NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (111, 199, 3, 1, 1, 2, 'Presencial', 'Levantamiento de informacion RD/Stars', '2023-10-16', 8.00, '102023', '2023-10-19', 'Orlando.Labrador', '1', '1', '2023-10-19', 'Orlando.Labrador', NULL, '', NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (112, 199, 3, 1, 1, 2, 'Presencial', 'Levantamiento de informacion RD/Stars', '2023-10-17', 8.00, '102023', '2023-10-19', 'Orlando.Labrador', '1', '1', '2023-10-19', 'Orlando.Labrador', NULL, '', NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (113, 227, 2, 1, 1, 2, 'Presencial', 'Levantamiento informacion , lista de inventarios de informacion a solicitar', '2023-10-19', 8.00, '102023', '2023-10-19', 'Javier.Ortiz', '1', '1', '2023-10-19', 'Javier.Ortiz', NULL, '', NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (114, 199, 3, 1, 1, 2, 'Presencial', 'Levantamiento de informacion RD/Stars', '2023-10-18', 8.00, '102023', '2023-10-19', 'Orlando.Labrador', '1', '1', '2023-10-19', 'Orlando.Labrador', NULL, '', NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (115, 199, 3, 1, 1, 2, 'Remota', 'Levantamiento de informacion RD/Stars', '2023-10-19', 8.00, '102023', '2023-10-19', 'Orlando.Labrador', '1', '1', '2023-10-19', 'Orlando.Labrador', NULL, '', NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (116, 232, 3, 1, 1, 14, 'Remota', 'Levantamiento de información P1', '2023-10-14', 8.00, '102023', '2023-10-19', 'brezhnev.vega', '1', '1', '2023-10-19', 'brezhnev.vega', '', '', NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (117, 232, 3, 1, 1, 2, 'Presencial', 'Revisión e Identificación Estructura de Datos RD', '2023-10-16', 8.00, '102023', '2023-10-19', 'brezhnev.vega', '1', '1', '2023-10-23', 'brezhnev.vega', '', '', 'NO-SAP');
INSERT INTO `dg_reporte_tiempo` VALUES (118, 232, 3, 1, 1, 2, 'Presencial', 'Reunión de Procesos STARS GAS', '2023-10-17', 8.00, '102023', '2023-10-19', 'brezhnev.vega', '1', '1', '2023-10-23', 'brezhnev.vega', '', '', 'NO-SAP');
INSERT INTO `dg_reporte_tiempo` VALUES (119, 232, 3, 1, 1, 2, 'Presencial', 'Revisión e Identificación Estructura de Datos STARS', '2023-10-18', 8.00, '102023', '2023-10-19', 'brezhnev.vega', '1', '1', '2023-10-23', 'brezhnev.vega', '', '', 'NO-SAP');
INSERT INTO `dg_reporte_tiempo` VALUES (120, 232, 3, 1, 1, 2, 'Presencial', 'Levantamiento de información RD-STARS', '2023-10-19', 8.00, '102023', '2023-10-19', 'brezhnev.vega', '1', '1', '2023-10-23', 'brezhnev.vega', '', '', 'NO-SAP');
INSERT INTO `dg_reporte_tiempo` VALUES (121, 206, 1, 1, 1, 13, 'Presencial', 'Reunión Pre kickoff MCS en Valencia (De 6:30 a 4:00)', '2023-09-22', 8.00, '102023', '2023-10-20', 'Navarro.Marlegnis', '1', '1', '2023-10-20', 'Navarro.Marlegnis', NULL, '', NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (122, 206, 1, 1, 1, 13, 'Presencial', 'Reunión con equipo de proyecto MCS en el cliente', '2023-10-03', 8.00, '102023', '2023-10-20', 'Navarro.Marlegnis', '1', '1', '2023-10-20', 'Navarro.Marlegnis', NULL, '', NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (123, 206, 1, 1, 1, 13, 'Presencial', 'Proceso de carnetización en Los Teques - INTEVEP (De 6:30 a 2:30)', '2023-10-06', 8.00, '102023', '2023-10-20', 'Navarro.Marlegnis', '1', '1', '2023-10-20', 'Navarro.Marlegnis', NULL, '', NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (124, 206, 1, 1, 1, 13, 'Presencial', '3 Reuniones de acercamiento: Equipos de proyecto MCS y Cliente / Equipo Técnico de RD/STAR / Equipo Técnico de RD/STAR y funcional de Comercio y Suministro Internacional ', '2023-10-10', 8.00, '102023', '2023-10-20', 'Navarro.Marlegnis', '1', '1', '2023-10-20', 'Navarro.Marlegnis', NULL, '', NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (125, 206, 1, 1, 1, 2, 'Presencial', '1era Mesa de Trabajo, equipo MCS  y equipo de Comercio y Suministro Internacional / Mesa de Trabajo equipo MCS / Preparar material para reunión del viernes con Maria Loaiza. Estructura organizativa de compras/ventas a nivel financiero, clientes, proveedor', '2023-10-11', 8.00, '102023', '2023-10-20', 'Navarro.Marlegnis', '1', '1', '2023-10-20', 'Navarro.Marlegnis', '', '', 'Seleccione');
INSERT INTO `dg_reporte_tiempo` VALUES (126, 206, 1, 1, 1, 2, 'Presencial', 'Mesa de Trabajo en Torre Sur, equipo MCS y Comercio Exterior(Explicación funcional del proceso de Comercio Exterior. Aclaratoria puntos del Acta 001) / Documentación de actas', '2023-10-13', 8.00, '102023', '2023-10-20', 'Navarro.Marlegnis', '1', '1', '2023-10-20', 'Navarro.Marlegnis', '', '', 'Seleccione');
INSERT INTO `dg_reporte_tiempo` VALUES (127, 206, 1, 1, 1, 2, 'Presencial', 'Asistencia reunión de Gerencia con Equipo de Proyecto MCS / Levantamiento de información P1 - Procesos en sistema vertical GasIsOil', '2023-10-16', 8.00, '102023', '2023-10-20', 'Navarro.Marlegnis', '1', '1', '2023-10-20', 'Navarro.Marlegnis', '', '', 'Seleccione');
INSERT INTO `dg_reporte_tiempo` VALUES (128, 206, 1, 1, 1, 2, 'Presencial', 'Presentación Procesos del cliente por el Sr. Pedro Rodríguez / Sistema de Carga de horas consultoría sistema de MCS por José Alvarado / Levantamiento de información P1 GAS - Procesos a nivel de sistemas RD y Star con personal Gerencial y operativo del ter', '2023-10-17', 8.00, '102023', '2023-10-20', 'Navarro.Marlegnis', '1', '1', '2023-10-20', 'Navarro.Marlegnis', '', '', 'Seleccione');
INSERT INTO `dg_reporte_tiempo` VALUES (129, 206, 1, 1, 1, 2, 'Presencial', 'Continuidad del levantamiento de información P1 GAS - Reportes del sistema Gesgas  con personal Gerencial y operativo del terminal de Puerto la Cruz y Comercio Exterior', '2023-10-18', 8.00, '102023', '2023-10-20', 'Navarro.Marlegnis', '1', '1', '2023-10-20', 'Navarro.Marlegnis', '', '', 'Seleccione');
INSERT INTO `dg_reporte_tiempo` VALUES (130, 206, 1, 1, 1, 13, 'Presencial', 'Organizar documentacion del cliente Dias 3 al 18, subir a drive compartido con equipo / Mesa de trabajo consultores de RD y Stars / Asistencia a presentación de HANA a cliente', '2023-10-19', 8.00, '102023', '2023-10-20', 'Navarro.Marlegnis', '1', '1', '2023-10-20', 'Navarro.Marlegnis', NULL, '', NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (131, 209, 1, 1, 1, 2, 'Presencial', 'Levantamiento de Información. Reunión con personal de RD Star. Preparación presentación de S4 Hana.  ', '2023-10-18', 8.00, '102023', '2023-10-20', 'Emperatriz.Prichinenko', '1', '1', '2023-10-20', 'Emperatriz.Prichinenko', NULL, '', 'CO');
INSERT INTO `dg_reporte_tiempo` VALUES (132, 209, 1, 1, 1, 2, 'Presencial', 'Levantamiento de Información. Reunión con personal que maneja el maestro de materiales. Ppresentación de S4 Hana al equipo de proyecto por parte de P1..  ', '2023-10-19', 8.00, '102023', '2023-10-20', 'Emperatriz.Prichinenko', '1', '1', '2023-10-20', 'Emperatriz.Prichinenko', NULL, '', 'CO');
INSERT INTO `dg_reporte_tiempo` VALUES (133, 209, 1, 1, 1, 2, 'Presencial', 'Leventamiento de información con el personal de costos de P1.', '2023-10-20', 8.00, '102023', '2023-10-20', 'Emperatriz.Prichinenko', '1', '1', '2023-10-20', 'Emperatriz.Prichinenko', NULL, '', 'CO');
INSERT INTO `dg_reporte_tiempo` VALUES (134, 217, 1, 1, 1, 2, 'Remota', 'Actividades administrativas ', '2023-10-14', 8.00, '102023', '2023-10-20', 'Elizabeth.Balza', '3', '1', '2023-10-23', 'Luis.Salas', 'Aprobacion por Lote', '', 'SD');
INSERT INTO `dg_reporte_tiempo` VALUES (135, 217, 1, 1, 1, 2, 'Presencial', 'Reunion interna Equipo de Consultoria para revisar seguimiento del levantamiento realizado a la fecha por parte del Equipo de RD y Star con Lideres de proyecto y tecnicos; distribucion documentacion levantada a la fecha por el equipo de RD y Star; partici', '2023-10-19', 8.00, '102023', '2023-10-20', 'Elizabeth.Balza', '3', '1', '2023-10-23', 'Luis.Salas', 'Aprobacion por Lote', '', 'SD');
INSERT INTO `dg_reporte_tiempo` VALUES (136, 225, 2, 1, 1, 2, 'Presencial', ' ', '2023-10-20', 8.00, '102023', '2023-10-20', 'Adriana.Martinez', '1', '1', '2023-10-20', 'Adriana.Martinez', NULL, '', 'Seleccione');
INSERT INTO `dg_reporte_tiempo` VALUES (137, 214, 3, 1, 1, 2, 'Presencial', 'Se revisaron Clases, Caracteristica, Registro INFO. Se reviso data en QAS 510 para validar informacion que debe ser depurada. Presentacion: OVERVIEW de la Migracion', '2023-10-19', 8.00, '102023', '2023-10-20', 'Maria.Blasini', '1', '1', '2023-10-20', 'Maria.Blasini', NULL, '', 'MM');
INSERT INTO `dg_reporte_tiempo` VALUES (138, 212, 3, 1, 1, 2, 'Presencial', 'Levantamiento con usuarios de materiales', '2023-10-02', 8.00, '102023', '2023-10-20', 'Luis.Stengel', '3', '1', '2023-10-22', 'Luis.Salas', '', '', 'MM');
INSERT INTO `dg_reporte_tiempo` VALUES (139, 212, 3, 1, 1, 2, 'Presencial', 'Levantamiento con usuarios de materiales', '2023-10-03', 8.00, '102023', '2023-10-20', 'Luis.Stengel', '1', '1', '2023-10-20', 'Luis.Stengel', NULL, '', 'MM');
INSERT INTO `dg_reporte_tiempo` VALUES (140, 212, 3, 1, 1, 2, 'Seleccione', 'Se revisaron Clases, Caracteristica, Registro INFO. Se reviso data en QAS 510 para validar informacion que debe ser depurada. Presentacion: OVERVIEW de la Migracion', '2023-10-04', 8.00, '102023', '2023-10-20', 'Luis.Stengel', '1', '1', '2023-10-20', 'Luis.Stengel', NULL, '', 'Seleccione');
INSERT INTO `dg_reporte_tiempo` VALUES (141, 212, 3, 1, 1, 2, 'Presencial', 'Levantamiento con usuarios de materiales', '2023-10-05', 8.00, '102023', '2023-10-20', 'Luis.Stengel', '1', '1', '2023-10-20', 'Luis.Stengel', NULL, '', 'MM');
INSERT INTO `dg_reporte_tiempo` VALUES (142, 212, 3, 1, 1, 2, 'Presencial', 'Se revisaron Clases, Caracteristica, Registro INFO. Se reviso data en QAS 510 para validar informacion que debe ser depurada. Presentacion: OVERVIEW de la Migracion', '2023-10-06', 8.00, '102023', '2023-10-20', 'Luis.Stengel', '1', '1', '2023-10-20', 'Luis.Stengel', NULL, '', 'MM');
INSERT INTO `dg_reporte_tiempo` VALUES (143, 212, 3, 1, 1, 2, 'Presencial', 'Datos maestros - caracteristicas', '2023-10-09', 8.00, '102023', '2023-10-20', 'Luis.Stengel', '1', '1', '2023-10-20', 'Luis.Stengel', NULL, '', 'MM');
INSERT INTO `dg_reporte_tiempo` VALUES (144, 212, 3, 1, 1, 2, 'Presencial', 'Se revisaron Clases, Caracteristica, Registro INFO. Se reviso data en QAS 510 para validar informacion que debe ser depurada. Presentacion: OVERVIEW de la Migracion', '2023-10-10', 8.00, '102023', '2023-10-20', 'Luis.Stengel', '1', '1', '2023-10-20', 'Luis.Stengel', NULL, '', 'MM');
INSERT INTO `dg_reporte_tiempo` VALUES (145, 212, 3, 1, 1, 2, 'Presencial', 'Datos maestros - procesos de operaciones transaccionales', '2023-10-11', 8.00, '102023', '2023-10-20', 'Luis.Stengel', '1', '1', '2023-10-20', 'Luis.Stengel', NULL, '', 'MM');
INSERT INTO `dg_reporte_tiempo` VALUES (146, 212, 3, 1, 1, 2, 'Presencial', 'Levantamiento con usuarios de materiales', '2023-10-12', 8.00, '102023', '2023-10-20', 'Luis.Stengel', '1', '1', '2023-10-20', 'Luis.Stengel', NULL, '', 'MM');
INSERT INTO `dg_reporte_tiempo` VALUES (147, 212, 3, 1, 1, 2, 'Presencial', 'Levantamiento con usuarios de materiales', '2023-10-13', 8.00, '102023', '2023-10-20', 'Luis.Stengel', '1', '1', '2023-10-20', 'Luis.Stengel', NULL, '', 'MM');
INSERT INTO `dg_reporte_tiempo` VALUES (148, 212, 3, 1, 1, 2, 'Presencial', 'Levantamiento con usuarios de materiales', '2023-10-14', 8.00, '102023', '2023-10-20', 'Luis.Stengel', '1', '1', '2023-10-20', 'Luis.Stengel', NULL, '', 'Seleccione');
INSERT INTO `dg_reporte_tiempo` VALUES (149, 212, 3, 1, 1, 2, 'Presencial', 'Datos maestros - procesos de operaciones transaccionales', '2023-10-16', 8.00, '102023', '2023-10-20', 'Luis.Stengel', '1', '1', '2023-10-20', 'Luis.Stengel', NULL, '', 'MM');
INSERT INTO `dg_reporte_tiempo` VALUES (150, 212, 3, 1, 10, 2, 'Presencial', 'Datos maestros - procesos de operaciones transaccionales', '2023-10-17', 8.00, '102023', '2023-10-20', 'Luis.Stengel', '1', '1', '2023-10-20', 'Luis.Stengel', NULL, '', 'MM');
INSERT INTO `dg_reporte_tiempo` VALUES (151, 212, 3, 1, 1, 2, 'Presencial', 'Levantamiento con usuarios de materiales', '2023-10-18', 8.00, '102023', '2023-10-20', 'Luis.Stengel', '1', '1', '2023-10-20', 'Luis.Stengel', NULL, '', 'MM');
INSERT INTO `dg_reporte_tiempo` VALUES (152, 212, 3, 1, 1, 2, 'Presencial', 'Levantamiento con usuarios de materiales', '2023-10-19', 8.00, '102023', '2023-10-20', 'Luis.Stengel', '1', '1', '2023-10-20', 'Luis.Stengel', NULL, '', 'MM');
INSERT INTO `dg_reporte_tiempo` VALUES (153, 212, 3, 1, 1, 2, 'Remota', 'Levantamiento con usuarios de materiales - presentación mejoras de la herramienta', '2023-10-19', 8.00, '102023', '2023-10-20', 'Luis.Stengel', '1', '1', '2023-10-20', 'Luis.Stengel', NULL, '', 'MM');
INSERT INTO `dg_reporte_tiempo` VALUES (154, 205, 1, 1, 1, 13, 'Presencial', 'Se tenía programada reunión y fue suspendida por el cliente', '2023-10-02', 8.00, '102023', '2023-10-20', 'Ananguren.Iris', '1', '1', '2023-10-20', 'Ananguren.Iris', NULL, '', 'FI');
INSERT INTO `dg_reporte_tiempo` VALUES (155, 205, 1, 1, 1, 13, 'Presencial', 'Asistencia a la Reunión Kickoff ', '2023-10-03', 8.00, '102023', '2023-10-20', 'Ananguren.Iris', '1', '1', '2023-10-20', 'Ananguren.Iris', NULL, '', 'FI');
INSERT INTO `dg_reporte_tiempo` VALUES (156, 205, 1, 1, 1, 2, 'Remota', 'A la espera de llamado para iniciar actividades inherentes a la Migracion de SAP ECC 6.0 a S/4 HANA de PDVSA, Filiales, Negocios y Empresas Mixtas', '2023-10-04', 8.00, '102023', '2023-10-20', 'Ananguren.Iris', '1', '1', '2023-10-20', 'Ananguren.Iris', NULL, '', 'FI');
INSERT INTO `dg_reporte_tiempo` VALUES (157, 205, 1, 1, 1, 2, 'Remota', 'A la espera de llamado para iniciar actividades inherentes a la Migracion de SAP ECC 6.0 a S/4 HANA de PDVSA, Filiales, Negocios y Empresas Mixtas', '2023-10-05', 8.00, '102023', '2023-10-20', 'Ananguren.Iris', '1', '1', '2023-10-20', 'Ananguren.Iris', NULL, '', 'FI');
INSERT INTO `dg_reporte_tiempo` VALUES (158, 205, 1, 1, 1, 2, 'Remota', 'Asistencia a carnetización de Intevep Los Teques', '2023-10-06', 8.00, '102023', '2023-10-20', 'Ananguren.Iris', '1', '1', '2023-10-20', 'Ananguren.Iris', NULL, '', 'FI');
INSERT INTO `dg_reporte_tiempo` VALUES (159, 205, 1, 1, 1, 2, 'Remota', 'A la espera de llamado para iniciar actividades inherentes a la Migracion de SAP ECC 6.0 a S/4 HANA de PDVSA, Filiales, Negocios y Empresas Mixtas', '2023-10-09', 8.00, '102023', '2023-10-20', 'Ananguren.Iris', '1', '1', '2023-10-20', 'Ananguren.Iris', NULL, '', 'FI');
INSERT INTO `dg_reporte_tiempo` VALUES (160, 205, 1, 1, 1, 2, 'Remota', 'A la espera de llamado para iniciar actividades inherentes a la Migracion de SAP ECC 6.0 a S/4 HANA de PDVSA, Filiales, Negocios y Empresas Mixtas', '2023-10-10', 8.00, '102023', '2023-10-20', 'Ananguren.Iris', '1', '1', '2023-10-20', 'Ananguren.Iris', NULL, '', 'FI');
INSERT INTO `dg_reporte_tiempo` VALUES (161, 205, 1, 1, 1, 2, 'Presencial', 'Acercamiento con el cliente para la revisión del Plan de cuentas, entrega del listado de sociedades operativas del mayor financiero, solicitud de los segmentos', '2023-10-11', 8.00, '102023', '2023-10-20', 'Ananguren.Iris', '1', '1', '2023-10-20', 'Ananguren.Iris', NULL, '', 'FI');
INSERT INTO `dg_reporte_tiempo` VALUES (162, 205, 1, 1, 1, 2, 'Presencial', 'Conformación equipo de trabajo con el equipo GL para la extracción de los datos globales de sociedad, SKB1, SKA1, Plan de cuentas, segmetos financieros, grupos de cuentas', '2023-10-13', 8.00, '102023', '2023-10-20', 'Ananguren.Iris', '1', '1', '2023-10-20', 'Ananguren.Iris', NULL, '', 'FI');
INSERT INTO `dg_reporte_tiempo` VALUES (163, 205, 1, 1, 1, 13, 'Presencial', 'Presentación funcionamiento del negocio, Presentación  sistema MCS Time, preparación de los puntos para la presentación nuevas funcionalidades del SGE ', '2023-10-17', 8.00, '102023', '2023-10-20', 'Ananguren.Iris', '1', '1', '2023-10-20', 'Ananguren.Iris', NULL, '', 'FI');
INSERT INTO `dg_reporte_tiempo` VALUES (164, 205, 1, 1, 1, 2, 'Presencial', 'Preparación de la Presentación de Overview SAP 4 HANNA,  asistencia al Taller de Trello', '2023-10-18', 8.00, '102023', '2023-10-20', 'Ananguren.Iris', '1', '1', '2023-10-20', 'Ananguren.Iris', '', '', 'FI');
INSERT INTO `dg_reporte_tiempo` VALUES (165, 217, 1, 1, 1, 2, 'Presencial', 'Reunion interna consultores (SD-MM) RD y Star revision procesos TM enfocados hacia el levantamiento de informacion realizado hasta la fecha en RD y STAR (Hidrocarburos y Gas), reunion equipo consultoria local junto a Gerente de proyecto Luis Salas.', '2023-10-20', 8.00, '102023', '2023-10-20', 'Elizabeth.Balza', '3', '1', '2023-10-23', 'Luis.Salas', 'Aprobacion por Lote', '', 'SD');
INSERT INTO `dg_reporte_tiempo` VALUES (166, 217, 1, 1, 1, 2, 'Remota', 'Actividades administrativas ', '2023-10-21', 8.00, '102023', '2023-10-20', 'Elizabeth.Balza', '3', '1', '2023-10-22', 'Luis.Salas', '', '', 'SD');
INSERT INTO `dg_reporte_tiempo` VALUES (167, 224, 1, 1, 1, 1, 'Presencial', 'REVISION DE DOCUMENTACION, EVALUACIÓN DEL CLIENTE, ACCESOS A SAP, EQUIPO FUNCIONAL PM', '2023-10-19', 8.00, '102023', '2023-10-20', 'Carlos.Fuenmayor', '1', '1', '2023-10-20', 'Carlos.Fuenmayor', NULL, '', 'Seleccione');
INSERT INTO `dg_reporte_tiempo` VALUES (168, 224, 1, 1, 1, 1, 'Presencial', 'REVISION DE DOCUMENTACION, EVALUACIÓN DEL CLIENTE,  ACCESOS A SAP, EQUIPO FUNCIONAL PM', '2023-10-20', 8.00, '102023', '2023-10-20', 'Carlos.Fuenmayor', '1', '1', '2023-10-20', 'Carlos.Fuenmayor', NULL, '', 'Seleccione');
INSERT INTO `dg_reporte_tiempo` VALUES (169, 233, 1, 1, 1, 13, 'Presencial', 'Material Ledger', '2023-10-18', 3.00, '102023', '2023-10-20', 'Maria.Marrero', '1', '1', '2023-10-20', 'Maria.Marrero', NULL, '005', 'MM');
INSERT INTO `dg_reporte_tiempo` VALUES (170, 233, 1, 1, 1, 14, 'Presencial', 'Presentación OVERVIEW SAP 4HANNA 2023 FINANCE CONTROLLING MATERIALES', '2023-10-19', 8.00, '102023', '2023-10-20', 'Maria.Marrero', '1', '1', '2023-10-20', 'Maria.Marrero', NULL, '', 'FI');
INSERT INTO `dg_reporte_tiempo` VALUES (171, 205, 1, 1, 1, 13, 'Presencial', 'Reunión preliminar Funcionalidades del Sistema de Gestión Empresarial FI, CO, MM/ Presentación del Overview Sala Simón Bolívar', '2023-10-19', 8.00, '102023', '2023-10-20', 'Ananguren.Iris', '1', '1', '2023-10-20', 'Ananguren.Iris', NULL, '', 'FI');
INSERT INTO `dg_reporte_tiempo` VALUES (172, 233, 1, 1, 1, 14, 'Presencial', 'Modificación de la presentación OVERVIEW SAP 4HANNA', '2023-10-20', 2.00, '102023', '2023-10-20', 'Maria.Marrero', '1', '1', '2023-10-20', 'Maria.Marrero', NULL, '', 'FI');
INSERT INTO `dg_reporte_tiempo` VALUES (173, 233, 1, 1, 1, 13, 'Presencial', 'Reunión con el equipo OYM ', '2023-10-20', 2.00, '102023', '2023-10-20', 'Maria.Marrero', '1', '1', '2023-10-20', 'Maria.Marrero', NULL, '', 'Seleccione');
INSERT INTO `dg_reporte_tiempo` VALUES (174, 205, 1, 1, 1, 14, 'Presencial', 'Documentación y seguimiento de entrega de datos maestros AR', '2023-10-20', 8.00, '102023', '2023-10-20', 'Ananguren.Iris', '1', '1', '2023-10-20', 'Ananguren.Iris', NULL, '', 'FI');
INSERT INTO `dg_reporte_tiempo` VALUES (175, 212, 3, 1, 1, 2, 'Presencial', 'Levantamiento con usuarios de materiales - presentación mejoras de la herramienta', '2023-10-20', 8.00, '102023', '2023-10-20', 'Luis.Stengel', '1', '1', '2023-10-20', 'Luis.Stengel', NULL, '', 'MM');
INSERT INTO `dg_reporte_tiempo` VALUES (176, 206, 1, 1, 1, 13, 'Remota', 'Reunión con equipo de proyecto en el cliente (Se cancela  por falta de acceso a las instalaciones del cliente). Disponibiliad remota', '2023-10-02', 8.00, '102023', '2023-10-20', 'Navarro.Marlegnis', '1', '1', '2023-10-20', 'Navarro.Marlegnis', NULL, '', 'FI');
INSERT INTO `dg_reporte_tiempo` VALUES (177, 206, 1, 1, 1, 13, 'Remota', 'Disponibilidd remota por falta de acceso a las instalaciones del cliente', '2023-10-04', 8.00, '102023', '2023-10-20', 'Navarro.Marlegnis', '1', '1', '2023-10-20', 'Navarro.Marlegnis', NULL, '', 'FI');
INSERT INTO `dg_reporte_tiempo` VALUES (178, 206, 1, 1, 1, 13, 'Remota', 'Disponibilidd remota por falta de acceso a las instalaciones del cliente', '2023-10-05', 8.00, '102023', '2023-10-20', 'Navarro.Marlegnis', '1', '1', '2023-10-20', 'Navarro.Marlegnis', NULL, '', 'FI');
INSERT INTO `dg_reporte_tiempo` VALUES (179, 206, 1, 1, 1, 13, 'Remota', 'Disponibilidd remota por falta de acceso a las instalaciones del cliente', '2023-10-09', 8.00, '102023', '2023-10-20', 'Navarro.Marlegnis', '1', '1', '2023-10-20', 'Navarro.Marlegnis', NULL, '', 'FI');
INSERT INTO `dg_reporte_tiempo` VALUES (180, 214, 3, 1, 1, 2, 'Presencial', 'Levantar No Conformidades de Actas de Minutas, preparar Minuta de Overview NEW SAP SGE, Soporte a usuarios MM para revision de Tablas (SE16N)', '2023-10-20', 8.00, '102023', '2023-10-20', 'Maria.Blasini', '1', '1', '2023-10-20', 'Maria.Blasini', NULL, '', 'MM');
INSERT INTO `dg_reporte_tiempo` VALUES (181, 227, 2, 1, 1, 2, 'Remota', 'Levantamiento informacion ', '2023-10-20', 8.00, '102023', '2023-10-20', 'Javier.Ortiz', '1', '1', '2023-10-20', 'Javier.Ortiz', NULL, '', 'HCM');
INSERT INTO `dg_reporte_tiempo` VALUES (182, 176, 2, 1, 1, 14, 'Presencial', '1) Supervisión Equipo OYM  2) Revisión y Homologación  de los formatos utilizados durante la ejecución del Proyecto, 3) Generación de recomendaciones en el adecuado llenado de los formatos.', '2023-10-02', 8.00, '102023', '2023-10-21', 'Jose.Medina', '1', '1', '2023-10-21', 'Jose.Medina', NULL, '', 'Seleccione');
INSERT INTO `dg_reporte_tiempo` VALUES (183, 176, 2, 1, 1, 14, 'Presencial', '1) Supervisión Equipo OYM  2) Revisión y Homologación  de los formatos utilizados durante la ejecución del Proyecto, 3) Generación de recomendaciones en el adecuado llenado de los formatos.', '2023-10-03', 8.00, '102023', '2023-10-21', 'Jose.Medina', '1', '1', '2023-10-21', 'Jose.Medina', NULL, '', 'Seleccione');
INSERT INTO `dg_reporte_tiempo` VALUES (184, 176, 2, 1, 1, 14, 'Presencial', '1) Supervisión Equipo OYM  2) Revisión y Homologación  de los formatos utilizados durante la ejecución del Proyecto, 3) Generación de recomendaciones en el adecuado llenado de los formatos.', '2023-10-04', 8.00, '102023', '2023-10-21', 'Jose.Medina', '1', '1', '2023-10-21', 'Jose.Medina', NULL, '', 'Seleccione');
INSERT INTO `dg_reporte_tiempo` VALUES (185, 176, 2, 1, 1, 14, 'Presencial', '1) Supervisión Equipo OYM  2) Revisión y Homologación  de los formatos utilizados durante la ejecución del Proyecto, 3) Generación de recomendaciones en el adecuado llenado de los formatos.', '2023-10-06', 8.00, '102023', '2023-10-21', 'Jose.Medina', '1', '1', '2023-10-21', 'Jose.Medina', '', '', 'Seleccione');
INSERT INTO `dg_reporte_tiempo` VALUES (186, 176, 2, 1, 1, 14, 'Presencial', '1) Supervisión Equipo OYM  2) Revisión y Homologación  de los formatos utilizados durante la ejecución del Proyecto, 3) Generación de recomendaciones en el adecuado llenado de los formatos.', '2023-10-05', 8.00, '102023', '2023-10-21', 'Jose.Medina', '1', '1', '2023-10-21', 'Jose.Medina', NULL, '', 'Seleccione');
INSERT INTO `dg_reporte_tiempo` VALUES (187, 176, 2, 1, 1, 14, 'Presencial', '1) Supervisión Equipo OYM  2) Revisión y Homologación  de los formatos utilizados durante la ejecución del Proyecto, 3) Generación de recomendaciones en el adecuado llenado de los formatos.', '2023-10-09', 8.00, '102023', '2023-10-21', 'Jose.Medina', '1', '1', '2023-10-21', 'Jose.Medina', NULL, '', 'Seleccione');
INSERT INTO `dg_reporte_tiempo` VALUES (188, 176, 2, 1, 1, 14, 'Presencial', '1) Supervisión Equipo OYM  2) Revisión y Homologación  de los formatos utilizados durante la ejecución del Proyecto, 3) Generación de recomendaciones en el adecuado llenado de los formatos.', '2023-10-10', 8.00, '102023', '2023-10-21', 'Jose.Medina', '1', '1', '2023-10-21', 'Jose.Medina', NULL, '', 'Seleccione');
INSERT INTO `dg_reporte_tiempo` VALUES (189, 176, 2, 1, 1, 14, 'Presencial', '1) Supervisión Equipo OYM  2) Revisión y Homologación  de los formatos utilizados durante la ejecución del Proyecto, 3) Generación de recomendaciones en el adecuado llenado de los formatos.', '2023-10-11', 8.00, '102023', '2023-10-21', 'Jose.Medina', '1', '1', '2023-10-21', 'Jose.Medina', NULL, '', 'Seleccione');
INSERT INTO `dg_reporte_tiempo` VALUES (190, 176, 2, 1, 1, 14, 'Presencial', '1) Supervisión Equipo OYM  2) Revisión y Homologación  de los formatos utilizados durante la ejecución del Proyecto, 3) Generación de recomendaciones en el adecuado llenado de los formatos.', '2023-10-12', 8.00, '102023', '2023-10-21', 'Jose.Medina', '1', '1', '2023-10-21', 'Jose.Medina', NULL, '', 'Seleccione');
INSERT INTO `dg_reporte_tiempo` VALUES (191, 176, 2, 1, 1, 14, 'Presencial', '1) Supervisión Equipo OYM  2) Revisión y Homologación  de los formatos utilizados durante la ejecución del Proyecto, 3) Generación de recomendaciones en el adecuado llenado de los formatos.', '2023-10-13', 8.00, '102023', '2023-10-21', 'Jose.Medina', '1', '1', '2023-10-21', 'Jose.Medina', NULL, '', 'Seleccione');
INSERT INTO `dg_reporte_tiempo` VALUES (192, 176, 2, 1, 1, 14, 'Presencial', '1) Supervisión Equipo OYM  2) Revisión y Homologación  de los formatos utilizados durante la ejecución del Proyecto, 3) Generación de recomendaciones en el adecuado llenado de los formatos.', '2023-10-16', 8.00, '102023', '2023-10-21', 'Jose.Medina', '1', '1', '2023-10-21', 'Jose.Medina', NULL, '', 'Seleccione');
INSERT INTO `dg_reporte_tiempo` VALUES (193, 176, 2, 1, 1, 14, 'Presencial', '1) Supervisión Equipo OYM  2) Revisión y Homologación  de los formatos utilizados durante la ejecución del Proyecto, 3) Generación de recomendaciones en el adecuado llenado de los formatos.', '2023-10-17', 8.00, '102023', '2023-10-21', 'Jose.Medina', '1', '1', '2023-10-21', 'Jose.Medina', NULL, '', 'Seleccione');
INSERT INTO `dg_reporte_tiempo` VALUES (194, 176, 2, 1, 1, 14, 'Presencial', '1) Supervisión Equipo OYM  2) Revisión y Homologación  de los formatos utilizados durante la ejecución del Proyecto, 3) Generación de recomendaciones en el adecuado llenado de los formatos.', '2023-10-18', 8.00, '102023', '2023-10-21', 'Jose.Medina', '1', '1', '2023-10-21', 'Jose.Medina', NULL, '', 'Seleccione');
INSERT INTO `dg_reporte_tiempo` VALUES (195, 176, 2, 1, 1, 14, 'Presencial', '1) Supervisión Equipo OYM  2) Revisión y Homologación  de los formatos utilizados durante la ejecución del Proyecto, 3) Generación de recomendaciones en el adecuado llenado de los formatos.', '2023-10-19', 8.00, '102023', '2023-10-21', 'Jose.Medina', '1', '1', '2023-10-21', 'Jose.Medina', NULL, '', 'Seleccione');
INSERT INTO `dg_reporte_tiempo` VALUES (196, 176, 2, 1, 1, 14, 'Presencial', '1) Supervisión Equipo OYM  2) Revisión y Homologación  de los formatos utilizados durante la ejecución del Proyecto, 3) Generación de recomendaciones en el adecuado llenado de los formatos.', '2023-10-20', 8.00, '102023', '2023-10-21', 'Jose.Medina', '1', '1', '2023-10-21', 'Jose.Medina', NULL, '', 'Seleccione');
INSERT INTO `dg_reporte_tiempo` VALUES (197, 235, 3, 1, 1, 14, 'Remota', 'Revisión y Ajuste de Documentación', '2023-10-02', 8.00, '102023', '2023-10-21', 'Yosmar.Molina', '3', '1', '2023-10-22', 'Luis.Salas', '', '', 'MM');
INSERT INTO `dg_reporte_tiempo` VALUES (198, 235, 3, 1, 1, 14, 'Remota', 'Revisión y Ajuste de Documentación', '2023-10-03', 8.00, '102023', '2023-10-21', 'Yosmar.Molina', '1', '1', '2023-10-21', 'Yosmar.Molina', NULL, '', 'Seleccione');
INSERT INTO `dg_reporte_tiempo` VALUES (199, 235, 3, 1, 1, 14, 'Remota', 'Revisión y Ajuste de Documentación', '2023-10-03', 8.00, '102023', '2023-10-21', 'Yosmar.Molina', '1', '1', '2023-10-21', 'Yosmar.Molina', NULL, '', 'Seleccione');
INSERT INTO `dg_reporte_tiempo` VALUES (200, 235, 3, 1, 1, 14, 'Remota', 'Revisión y Ajuste de Documentación', '2023-10-04', 8.00, '102023', '2023-10-21', 'Yosmar.Molina', '1', '1', '2023-10-21', 'Yosmar.Molina', NULL, '', 'Seleccione');
INSERT INTO `dg_reporte_tiempo` VALUES (201, 235, 3, 1, 1, 14, 'Remota', 'Revisión y Ajuste de Documentación', '2023-10-05', 8.00, '102023', '2023-10-21', 'Yosmar.Molina', '1', '1', '2023-10-21', 'Yosmar.Molina', NULL, '', 'Seleccione');
INSERT INTO `dg_reporte_tiempo` VALUES (202, 235, 3, 1, 1, 14, 'Remota', 'Revisión y Ajuste de Documentación', '2023-10-09', 8.00, '102023', '2023-10-21', 'Yosmar.Molina', '1', '1', '2023-10-21', 'Yosmar.Molina', NULL, '', 'Seleccione');
INSERT INTO `dg_reporte_tiempo` VALUES (203, 235, 3, 1, 1, 14, 'Remota', 'Revisión y Ajuste de Documentación', '2023-10-10', 8.00, '102023', '2023-10-21', 'Yosmar.Molina', '1', '1', '2023-10-21', 'Yosmar.Molina', NULL, '', 'Seleccione');
INSERT INTO `dg_reporte_tiempo` VALUES (204, 235, 3, 1, 1, 14, 'Remota', 'Revisión y Ajuste de Documentación', '2023-10-11', 8.00, '102023', '2023-10-21', 'Yosmar.Molina', '1', '1', '2023-10-21', 'Yosmar.Molina', NULL, '', 'Seleccione');
INSERT INTO `dg_reporte_tiempo` VALUES (205, 235, 3, 1, 0, 14, 'Remota', 'Revisión y Ajuste de Documentación', '2023-10-12', 8.00, '102023', '2023-10-21', 'Yosmar.Molina', '1', '1', '2023-10-21', 'Yosmar.Molina', NULL, '', 'Seleccione');
INSERT INTO `dg_reporte_tiempo` VALUES (206, 235, 3, 1, 1, 14, 'Remota', 'Revisión y Ajuste de Documentación', '2023-10-12', 8.00, '102023', '2023-10-21', 'Yosmar.Molina', '1', '1', '2023-10-21', 'Yosmar.Molina', NULL, '', 'Seleccione');
INSERT INTO `dg_reporte_tiempo` VALUES (207, 235, 3, 1, 1, 14, 'Remota', 'Revisión y Ajuste de Documentación', '2023-10-13', 8.00, '102023', '2023-10-21', 'Yosmar.Molina', '1', '1', '2023-10-21', 'Yosmar.Molina', NULL, '', 'Seleccione');
INSERT INTO `dg_reporte_tiempo` VALUES (208, 235, 3, 1, 1, 14, 'Remota', 'Revisión y Ajuste de Documentación', '2023-10-14', 8.00, '102023', '2023-10-21', 'Yosmar.Molina', '1', '1', '2023-10-21', 'Yosmar.Molina', NULL, '', 'Seleccione');
INSERT INTO `dg_reporte_tiempo` VALUES (209, 235, 3, 1, 1, 14, 'Remota', 'Revisión y Ajuste de Documentación', '2023-10-16', 8.00, '102023', '2023-10-21', 'Yosmar.Molina', '1', '1', '2023-10-21', 'Yosmar.Molina', NULL, '', 'Seleccione');
INSERT INTO `dg_reporte_tiempo` VALUES (210, 235, 3, 1, 1, 14, 'Remota', 'Revisión y Ajuste de Documentación', '2023-10-17', 8.00, '102023', '2023-10-21', 'Yosmar.Molina', '1', '1', '2023-10-21', 'Yosmar.Molina', NULL, '', 'Seleccione');
INSERT INTO `dg_reporte_tiempo` VALUES (211, 235, 3, 1, 1, 14, 'Remota', 'Revisión y Ajuste de Documentación', '2023-10-18', 8.00, '102023', '2023-10-21', 'Yosmar.Molina', '1', '1', '2023-10-21', 'Yosmar.Molina', NULL, '', 'Seleccione');
INSERT INTO `dg_reporte_tiempo` VALUES (212, 235, 3, 1, 1, 14, 'Remota', 'Revisión y Ajuste de Documentación', '2023-10-19', 8.00, '102023', '2023-10-21', 'Yosmar.Molina', '1', '1', '2023-10-21', 'Yosmar.Molina', NULL, '', 'Seleccione');
INSERT INTO `dg_reporte_tiempo` VALUES (213, 235, 3, 1, 1, 14, 'Remota', 'Revisión y Ajuste de Documentación', '2023-10-21', 8.00, '102023', '2023-10-21', 'Yosmar.Molina', '1', '1', '2023-10-21', 'Yosmar.Molina', '', '', 'Seleccione');
INSERT INTO `dg_reporte_tiempo` VALUES (214, 235, 3, 1, 1, 14, 'Presencial', 'Reunión con el Equipo de Documentación en La Estancia, piso 5', '2023-10-20', 4.00, '102023', '2023-10-21', 'Yosmar.Molina', '1', '1', '2023-10-21', 'Yosmar.Molina', NULL, '', 'Seleccione');
INSERT INTO `dg_reporte_tiempo` VALUES (224, 237, 3, 1, 1, 14, 'Remota', 'Realización de Flujograma de Procesos Mesa de Trabajo Versión 1', '2023-10-14', 6.00, '102023', '2023-10-23', 'Orlando.Benavides', '1', '1', '2023-10-23', 'Orlando.Benavides', NULL, '', 'NO-SAP');
INSERT INTO `dg_reporte_tiempo` VALUES (223, 237, 3, 1, 1, 14, 'Presencial', 'Reunión equipo OYM Definicion de Actividades , Lluvia de ideas, Propuesta de Nomenclatura Doc(Torre EASO)', '2023-10-13', 8.00, '102023', '2023-10-23', 'Orlando.Benavides', '1', '1', '2023-10-23', 'Orlando.Benavides', NULL, '', 'NO-SAP');
INSERT INTO `dg_reporte_tiempo` VALUES (222, 237, 3, 1, 1, 14, 'Remota', 'Reunión General Integración de Equipo Trabajo (Cliente- MCS) ', '2023-10-11', 4.00, '102023', '2023-10-23', 'Orlando.Benavides', '1', '1', '2023-10-23', 'Orlando.Benavides', NULL, '', 'NO-SAP');
INSERT INTO `dg_reporte_tiempo` VALUES (221, 237, 3, 1, 1, 14, 'Remota', 'Reunión remota equipo OYM (Definición de Grupos de Trabajo)', '2023-10-09', 4.00, '102023', '2023-10-23', 'Orlando.Benavides', '1', '1', '2023-10-23', 'Orlando.Benavides', NULL, '', 'NO-SAP');
INSERT INTO `dg_reporte_tiempo` VALUES (220, 224, 1, 1, 1, 1, 'Presencial', 'REVISION DE DOCUMENTACION, EVALUACIÓN DEL CLIENTE, ACCESOS A SAP, EQUIPO FUNCIONAL PM', '2023-10-21', 8.00, '102023', '2023-10-22', 'Carlos.Fuenmayor', '3', '1', '2023-10-22', 'Luis.Salas', '', '', 'PM');
INSERT INTO `dg_reporte_tiempo` VALUES (226, 237, 3, 1, 1, 14, 'Remota', 'Propuesta definitiva nomenclatura de doc y  elaboración de plantilla para las presentaciones en Power Point', '2023-10-16', 4.00, '102023', '2023-10-23', 'Orlando.Benavides', '1', '1', '2023-10-23', 'Orlando.Benavides', NULL, '', 'NO-SAP');
INSERT INTO `dg_reporte_tiempo` VALUES (227, 237, 3, 1, 1, 14, 'Remota', 'Propuesta para el manejo de control de documentos ( base de datos en formato excel)', '2023-10-17', 4.00, '102023', '2023-10-23', 'Orlando.Benavides', '1', '1', '2023-10-23', 'Orlando.Benavides', NULL, '', 'NO-SAP');
INSERT INTO `dg_reporte_tiempo` VALUES (228, 237, 3, 1, 1, 13, 'Remota', 'Inducción Trello', '2023-10-18', 4.00, '102023', '2023-10-23', 'Orlando.Benavides', '1', '1', '2023-10-23', 'Orlando.Benavides', NULL, '', 'NO-SAP');
INSERT INTO `dg_reporte_tiempo` VALUES (229, 237, 3, 1, 1, 14, 'Remota', 'Revisión y adecuación formato control de doc Versión 2 ', '2023-10-19', 4.00, '102023', '2023-10-23', 'Orlando.Benavides', '1', '1', '2023-10-23', 'Orlando.Benavides', NULL, '', 'NO-SAP');
INSERT INTO `dg_reporte_tiempo` VALUES (230, 237, 3, 1, 1, 13, 'Presencial', 'Reunión Sede La Campiña asignación de responsabilidades y actividades realizadas a la fecha', '2023-10-20', 4.00, '102023', '2023-10-23', 'Orlando.Benavides', '1', '1', '2023-10-23', 'Orlando.Benavides', NULL, '', 'NO-SAP');
INSERT INTO `dg_reporte_tiempo` VALUES (231, 237, 3, 1, 1, 14, 'Remota', 'Minuta digital resumen de reunion efectuada el dia Viernes 20/Flujogramas de procesos (Mesa de Trabajo actualizado y Gestion de Revision OYM)', '2023-10-22', 6.00, '102023', '2023-10-23', 'Orlando.Benavides', '1', '1', '2023-10-23', 'Orlando.Benavides', NULL, '', 'NO-SAP');
INSERT INTO `dg_reporte_tiempo` VALUES (232, 228, 2, 1, 1, 2, 'Remota', 'Levantamiento de información para migración', '2023-10-20', 8.00, '102023', '2023-10-23', 'Benito.Valeriano', '1', '1', '2023-10-23', 'Benito.Valeriano', NULL, '', 'HCM');
INSERT INTO `dg_reporte_tiempo` VALUES (233, 232, 3, 1, 1, 2, 'Presencial', 'Levantamiento de información P1', '2023-10-20', 8.00, '102023', '2023-10-23', 'brezhnev.vega', '1', '1', '2023-10-23', 'brezhnev.vega', NULL, '', 'NO-SAP');
INSERT INTO `dg_reporte_tiempo` VALUES (234, 232, 3, 1, 1, 14, 'Remota', 'Levantamiento de información P1', '2023-10-21', 4.00, '102023', '2023-10-23', 'brezhnev.vega', '1', '1', '2023-10-23', 'brezhnev.vega', NULL, '', 'NO-SAP');
INSERT INTO `dg_reporte_tiempo` VALUES (235, 209, 1, 1, 1, 2, 'Remota', 'Trabajo administrativo', '2023-10-21', 8.00, '102023', '2023-10-23', 'Emperatriz.Prichinenko', '1', '1', '2023-10-23', 'Emperatriz.Prichinenko', NULL, '', 'CO');
INSERT INTO `dg_reporte_tiempo` VALUES (236, 178, 1, 1, 1, 2, 'Presencial', 'Gerencia Tecnica del proyecto', '2023-10-02', 8.00, '102023', '2023-10-23', 'Jose.Alvarado', '1', '1', '2023-10-23', 'Jose.Alvarado', NULL, '', 'BASIC');
INSERT INTO `dg_reporte_tiempo` VALUES (237, 178, 1, 1, 1, 2, 'Presencial', 'Gerencia Tecnica del proyecto', '2023-10-03', 8.00, '102023', '2023-10-23', 'Jose.Alvarado', '1', '1', '2023-10-23', 'Jose.Alvarado', NULL, '', 'BASIC');
INSERT INTO `dg_reporte_tiempo` VALUES (238, 178, 1, 1, 1, 2, 'Presencial', 'Gerencia Tecnica del proyecto', '2023-10-04', 8.00, '102023', '2023-10-23', 'Jose.Alvarado', '1', '1', '2023-10-23', 'Jose.Alvarado', NULL, '', 'BASIC');
INSERT INTO `dg_reporte_tiempo` VALUES (239, 178, 1, 1, 1, 2, 'Presencial', 'Gerencia Tecnica del proyecto', '2023-10-05', 8.00, '102023', '2023-10-23', 'Jose.Alvarado', '1', '1', '2023-10-23', 'Jose.Alvarado', NULL, '', 'BASIC');
INSERT INTO `dg_reporte_tiempo` VALUES (240, 178, 1, 1, 1, 2, 'Presencial', 'Gerencia Tecnica del proyecto', '2023-10-06', 8.00, '102023', '2023-10-23', 'Jose.Alvarado', '2', '1', '2023-10-23', 'Jose.Alvarado', 'Repetida', '', 'BASIC');
INSERT INTO `dg_reporte_tiempo` VALUES (241, 178, 1, 1, 1, 2, 'Presencial', 'Gerencia Tecnica del proyecto', '2023-10-06', 8.00, '102023', '2023-10-23', 'Jose.Alvarado', '1', '1', '2023-10-23', 'Jose.Alvarado', NULL, '', 'BASIC');
INSERT INTO `dg_reporte_tiempo` VALUES (242, 178, 1, 1, 1, 2, 'Presencial', 'Gerencia Tecnica del proyecto', '2023-10-07', 8.00, '102023', '2023-10-23', 'Jose.Alvarado', '1', '1', '2023-10-23', 'Jose.Alvarado', NULL, '', 'BASIC');
INSERT INTO `dg_reporte_tiempo` VALUES (243, 178, 1, 1, 1, 2, 'Presencial', 'Gerencia Tecnica del proyecto', '2023-10-09', 8.00, '102023', '2023-10-23', 'Jose.Alvarado', '1', '1', '2023-10-23', 'Jose.Alvarado', NULL, '', 'BASIC');

-- ----------------------------
-- Table structure for dm_modulos
-- ----------------------------
DROP TABLE IF EXISTS `dm_modulos`;
CREATE TABLE `dm_modulos`  (
  `idModulo` int NOT NULL AUTO_INCREMENT,
  `descripcionModulo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`idModulo`) USING BTREE,
  UNIQUE INDEX `descripcionModulo`(`descripcionModulo`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dm_modulos
-- ----------------------------
INSERT INTO `dm_modulos` VALUES (1, 'ABAP');
INSERT INTO `dm_modulos` VALUES (2, 'BASIC');
INSERT INTO `dm_modulos` VALUES (3, 'CO');
INSERT INTO `dm_modulos` VALUES (4, 'FI');
INSERT INTO `dm_modulos` VALUES (5, 'GP');
INSERT INTO `dm_modulos` VALUES (6, 'HCM');
INSERT INTO `dm_modulos` VALUES (7, 'MM');
INSERT INTO `dm_modulos` VALUES (8, 'PP');
INSERT INTO `dm_modulos` VALUES (9, 'PS');
INSERT INTO `dm_modulos` VALUES (10, 'SD');
INSERT INTO `dm_modulos` VALUES (11, 'SOPORTE');
INSERT INTO `dm_modulos` VALUES (12, 'PM');
INSERT INTO `dm_modulos` VALUES (13, 'NO-SAP');

-- ----------------------------
-- Table structure for dm_rol
-- ----------------------------
DROP TABLE IF EXISTS `dm_rol`;
CREATE TABLE `dm_rol`  (
  `id_rol` int NOT NULL,
  `des_rol` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `creado_por` int NULL DEFAULT NULL,
  `fecha_creacion` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NULL DEFAULT NULL,
  `modificado_por` int NULL DEFAULT NULL,
  `fecha_mod` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_rol`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb3 COLLATE = utf8mb3_spanish_ci ROW_FORMAT = COMPACT;

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
  `irTipoActividad` int NOT NULL AUTO_INCREMENT,
  `descripcionTipoActividad` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`irTipoActividad`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 21 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of dm_tipo_actividad
-- ----------------------------
INSERT INTO `dm_tipo_actividad` VALUES (1, 'Preparar BPD');
INSERT INTO `dm_tipo_actividad` VALUES (2, 'Levantamiento');
INSERT INTO `dm_tipo_actividad` VALUES (3, 'Realizar');
INSERT INTO `dm_tipo_actividad` VALUES (4, 'Pruebas Unitarias');
INSERT INTO `dm_tipo_actividad` VALUES (5, 'Pruebas Integrales ');
INSERT INTO `dm_tipo_actividad` VALUES (6, 'Pruebas UAT');
INSERT INTO `dm_tipo_actividad` VALUES (7, 'Salida a PRD');
INSERT INTO `dm_tipo_actividad` VALUES (8, 'Soporte');
INSERT INTO `dm_tipo_actividad` VALUES (9, 'Taller a Clientes');
INSERT INTO `dm_tipo_actividad` VALUES (10, 'Soporte Continuidad Operativa');
INSERT INTO `dm_tipo_actividad` VALUES (11, 'Garantia');
INSERT INTO `dm_tipo_actividad` VALUES (13, 'Reuniones');
INSERT INTO `dm_tipo_actividad` VALUES (14, 'Documentacion');
INSERT INTO `dm_tipo_actividad` VALUES (18, 'Instalacion de  Servidores');
INSERT INTO `dm_tipo_actividad` VALUES (19, 'Configuracion de Servidores');

-- ----------------------------
-- Table structure for rel_clienteproyecto
-- ----------------------------
DROP TABLE IF EXISTS `rel_clienteproyecto`;
CREATE TABLE `rel_clienteproyecto`  (
  `idCliente` int NOT NULL,
  `idProyecto` int NOT NULL,
  PRIMARY KEY (`idCliente`, `idProyecto`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = FIXED;

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
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `vw_consolidado_horas_consultores` AS select `rt`.`idRegistro` AS `idRegistro`,`emp`.`id_usu` AS `id_usu`,concat(`emp`.`ape_usu`,', ',`emp`.`nom_usu`) AS `nombre`,`ec`.`nombreEmpresaConsultora` AS `nombreEmpresaConsultora`,`dg_cliente`.`NombreCliente` AS `NombreCliente`,`rt`.`idProyecto` AS `idProyecto`,`dg_proyecto`.`nameProyecto` AS `nameProyecto`,`rt`.`corte` AS `corte`,`ec`.`idAprobador` AS `idAprobador`,`dg_reporte_factura`.`urlFactura` AS `urlFactura`,sum((case when (`rt`.`estadoAP1` = 1) then `rt`.`hora` else 0 end)) AS `Nuevas`,sum((case when (`rt`.`estadoAP1` = 2) then `rt`.`hora` else 0 end)) AS `Rechazadas`,sum((case when (`rt`.`estadoAP1` = 3) then `rt`.`hora` else 0 end)) AS `Aprobadas` from (((((`dg_reporte_tiempo` `rt` join `dg_empleados` `emp` on((`rt`.`idEmpleado` = `emp`.`id_usu`))) join `dg_empresa_consultora` `ec` on((`rt`.`idEmpresaConsultora` = `ec`.`idEmpresaConsultora`))) join `dg_cliente` on((`rt`.`idCliente` = `dg_cliente`.`idCliente`))) join `dg_proyecto` on((`rt`.`idProyecto` = `dg_proyecto`.`idProyecto`))) left join `dg_reporte_factura` on(((`rt`.`idEmpleado` = `dg_reporte_factura`.`idEmpleado`) and (`rt`.`corte` = `dg_reporte_factura`.`corte`)))) group by `rt`.`idEmpleado`,`rt`.`idEmpresaConsultora`,`ec`.`idAprobador`,`rt`.`idCliente`,`rt`.`idProyecto`,`rt`.`corte`,`dg_reporte_factura`.`urlFactura`;

-- ----------------------------
-- View structure for vw_consolidado_proyecto_corte
-- ----------------------------
DROP VIEW IF EXISTS `vw_consolidado_proyecto_corte`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `vw_consolidado_proyecto_corte` AS select `dg_proyecto`.`nameProyecto` AS `nameProyecto`,`dg_cliente`.`NombreCliente` AS `NombreCliente`,sum(`rt`.`hora`) AS `total` from ((`dg_reporte_tiempo` `rt` join `dg_cliente` on((`rt`.`idCliente` = `dg_cliente`.`idCliente`))) join `dg_proyecto` on((`rt`.`idProyecto` = `dg_proyecto`.`idProyecto`))) group by `rt`.`idProyecto`,`rt`.`idCliente` order by `dg_cliente`.`NombreCliente` desc;

-- ----------------------------
-- View structure for vw_horas_reales_mensuales_consultor
-- ----------------------------
DROP VIEW IF EXISTS `vw_horas_reales_mensuales_consultor`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `vw_horas_reales_mensuales_consultor` AS select concat(`dg_empleados`.`nom_usu`,', ',`dg_empleados`.`ape_usu`) AS `Consultor`,`dg_empleados`.`ced_usu` AS `Cedula`,`dg_empresa_consultora`.`nombreEmpresaConsultora` AS `Consultora`,concat(`e`.`ape_usu`,', ',`e`.`nom_usu`) AS `Aprobador`,`dg_cliente`.`NombreCliente` AS `Cliente`,`dg_reporte_factura`.`urlFactura` AS `urlFactura`,month(`dg_reporte_tiempo`.`fechaActividad`) AS `Mes`,sum(`dg_reporte_tiempo`.`hora`) AS `totalHoras` from (((((((`dg_reporte_tiempo` join `dg_empleados` on((`dg_reporte_tiempo`.`idEmpleado` = `dg_empleados`.`id_usu`))) join `dg_empresa_consultora` on((`dg_reporte_tiempo`.`idEmpresaConsultora` = `dg_empresa_consultora`.`idEmpresaConsultora`))) join `dg_empleados` `e` on((`dg_empresa_consultora`.`idAprobador` = `e`.`id_usu`))) join `dg_cliente` on((`dg_reporte_tiempo`.`idCliente` = `dg_cliente`.`idCliente`))) join `dg_proyecto` on((`dg_reporte_tiempo`.`idProyecto` = `dg_proyecto`.`idProyecto`))) join `dm_tipo_actividad` on((`dg_reporte_tiempo`.`idTipoActividad` = `dm_tipo_actividad`.`irTipoActividad`))) left join `dg_reporte_factura` on(((`dg_reporte_tiempo`.`idEmpleado` = `dg_reporte_factura`.`idEmpleado`) and (`dg_reporte_tiempo`.`corte` = `dg_reporte_factura`.`corte`)))) where (`dg_reporte_tiempo`.`estadoAP1` = 3) group by `dg_empleados`.`nom_usu`,`dg_empleados`.`ape_usu`,`dg_empleados`.`ced_usu`,`dg_empresa_consultora`.`nombreEmpresaConsultora`,`e`.`ape_usu`,`e`.`nom_usu`,`dg_cliente`.`NombreCliente`,month(`dg_reporte_tiempo`.`fechaActividad`) order by `Mes`,`dg_reporte_factura`.`urlFactura`;

-- ----------------------------
-- View structure for vw_porconsultora
-- ----------------------------
DROP VIEW IF EXISTS `vw_porconsultora`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `vw_porconsultora` AS select `dg_empresa_consultora`.`nombreEmpresaConsultora` AS `nombreEmpresaConsultora`,concat(`dg_empleados`.`ape_usu`,', ',`dg_empleados`.`nom_usu`) AS `Nombre`,sum(`dg_reporte_tiempo`.`hora`) AS `sum(dg_reporte_tiempo.hora)` from ((`dg_empleados` join `dg_reporte_tiempo` on((`dg_empleados`.`id_usu` = `dg_reporte_tiempo`.`idEmpleado`))) join `dg_empresa_consultora` on((`dg_reporte_tiempo`.`idEmpresaConsultora` = `dg_empresa_consultora`.`idEmpresaConsultora`))) where (`dg_reporte_tiempo`.`estadoAP1` = 3) group by `dg_empresa_consultora`.`nombreEmpresaConsultora`,`dg_empleados`.`ape_usu`,`dg_empleados`.`nom_usu` order by `dg_empresa_consultora`.`nombreEmpresaConsultora`;

-- ----------------------------
-- View structure for vw_reportefi_diario_mensual
-- ----------------------------
DROP VIEW IF EXISTS `vw_reportefi_diario_mensual`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `vw_reportefi_diario_mensual` AS select `dg_reporte_tiempo`.`fechaActividad` AS `fechaActividad`,`dg_reporte_tiempo`.`idProyecto` AS `idProyecto`,`dg_reporte_tiempo`.`idEmpleado` AS `idEmpleado`,`dg_reporte_tiempo`.`ticketNum` AS `ticketNum`,`dg_reporte_tiempo`.`descripcion` AS `descripcion`,sum(`dg_reporte_tiempo`.`hora`) AS `totalHoras` from `dg_reporte_tiempo` where (`dg_reporte_tiempo`.`estadoAP1` = 3) group by `dg_reporte_tiempo`.`fechaActividad`,`dg_reporte_tiempo`.`idEmpleado`,`dg_reporte_tiempo`.`idProyecto`,`dg_reporte_tiempo`.`ticketNum` order by `dg_reporte_tiempo`.`fechaActividad`;

-- ----------------------------
-- View structure for vw_reportefi_diario_mensual_detalle
-- ----------------------------
DROP VIEW IF EXISTS `vw_reportefi_diario_mensual_detalle`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `vw_reportefi_diario_mensual_detalle` AS select `dg_reporte_tiempo`.`idRegistro` AS `idRegistro`,`dg_empleados`.`nom_usu` AS `nom_usu`,`dg_empleados`.`ape_usu` AS `ape_usu`,`dg_empleados`.`ced_usu` AS `ced_usu`,`dg_empresa_consultora`.`nombreEmpresaConsultora` AS `nombreEmpresaConsultora`,`dg_cliente`.`NombreCliente` AS `NombreCliente`,`dg_proyecto`.`nameProyecto` AS `nameProyecto`,`dm_tipo_actividad`.`descripcionTipoActividad` AS `descripcionTipoActividad`,`dg_reporte_tiempo`.`tipoAtencion` AS `tipoAtencion`,`dg_reporte_tiempo`.`ticketNum` AS `ticketNum`,`dg_reporte_tiempo`.`descripcion` AS `descripcion`,`dg_reporte_tiempo`.`fechaActividad` AS `fechaActividad`,`dg_reporte_tiempo`.`hora` AS `hora`,`dg_reporte_tiempo`.`idEmpleado` AS `idEmpleado`,`dg_reporte_tiempo`.`idEmpresaConsultora` AS `idEmpresaConsultora`,`dg_reporte_tiempo`.`idCliente` AS `idCliente`,`dg_reporte_tiempo`.`idProyecto` AS `idProyecto`,`dg_reporte_tiempo`.`idTipoActividad` AS `idTipoActividad`,`dg_reporte_tiempo`.`estadoAP1` AS `estadoAP1` from (((((`dg_reporte_tiempo` join `dg_empleados` on((`dg_reporte_tiempo`.`idEmpleado` = `dg_empleados`.`id_usu`))) join `dg_empresa_consultora` on((`dg_reporte_tiempo`.`idEmpresaConsultora` = `dg_empresa_consultora`.`idEmpresaConsultora`))) join `dg_cliente` on((`dg_reporte_tiempo`.`idCliente` = `dg_cliente`.`idCliente`))) join `dg_proyecto` on((`dg_reporte_tiempo`.`idProyecto` = `dg_proyecto`.`idProyecto`))) join `dm_tipo_actividad` on((`dg_reporte_tiempo`.`idTipoActividad` = `dm_tipo_actividad`.`irTipoActividad`))) where (`dg_reporte_tiempo`.`estadoAP1` = 3);

-- ----------------------------
-- View structure for vw_reportefi_diario_mensual_detalle_original
-- ----------------------------
DROP VIEW IF EXISTS `vw_reportefi_diario_mensual_detalle_original`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `vw_reportefi_diario_mensual_detalle_original` AS select `dg_reporte_tiempo`.`idRegistro` AS `idRegistro`,`dg_empleados`.`nom_usu` AS `nom_usu`,`dg_empleados`.`ape_usu` AS `ape_usu`,`dg_empleados`.`ced_usu` AS `ced_usu`,`dg_empresa_consultora`.`nombreEmpresaConsultora` AS `nombreEmpresaConsultora`,`dg_cliente`.`NombreCliente` AS `NombreCliente`,`dg_proyecto`.`nameProyecto` AS `nameProyecto`,`dm_tipo_actividad`.`descripcionTipoActividad` AS `descripcionTipoActividad`,`dg_reporte_tiempo`.`tipoAtencion` AS `tipoAtencion`,`dg_reporte_tiempo`.`ticketNum` AS `ticketNum`,`dg_reporte_tiempo`.`descripcion` AS `descripcion`,`dg_reporte_tiempo`.`fechaActividad` AS `fechaActividad`,`dg_reporte_tiempo`.`hora` AS `hora`,`dg_reporte_tiempo`.`idEmpleado` AS `idEmpleado`,`dg_reporte_tiempo`.`idEmpresaConsultora` AS `idEmpresaConsultora`,`dg_reporte_tiempo`.`idCliente` AS `idCliente`,`dg_reporte_tiempo`.`idProyecto` AS `idProyecto`,`dg_reporte_tiempo`.`idTipoActividad` AS `idTipoActividad`,`dg_reporte_tiempo`.`estadoAP1` AS `estadoAP1` from (((((`dg_reporte_tiempo` join `dg_empleados` on((`dg_reporte_tiempo`.`idEmpleado` = `dg_empleados`.`id_usu`))) join `dg_empresa_consultora` on((`dg_reporte_tiempo`.`idEmpresaConsultora` = `dg_empresa_consultora`.`idEmpresaConsultora`))) join `dg_cliente` on((`dg_reporte_tiempo`.`idCliente` = `dg_cliente`.`idCliente`))) join `dg_proyecto` on((`dg_reporte_tiempo`.`idProyecto` = `dg_proyecto`.`idProyecto`))) join `dm_tipo_actividad` on((`dg_reporte_tiempo`.`idTipoActividad` = `dm_tipo_actividad`.`irTipoActividad`))) where (`dg_reporte_tiempo`.`estadoAP1` = 3);

-- ----------------------------
-- View structure for vw_reportefi_diario_mensual_detalle_xls
-- ----------------------------
DROP VIEW IF EXISTS `vw_reportefi_diario_mensual_detalle_xls`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `vw_reportefi_diario_mensual_detalle_xls` AS select `dg_reporte_tiempo`.`idEmpleado` AS `idEmpleado`,`dg_reporte_tiempo`.`ticketNum` AS `ticketNum`,`dg_reporte_tiempo`.`idEmpresaConsultora` AS `idEmpresaConsultora`,concat(`dg_empleados`.`ape_usu`,' ',`dg_empleados`.`nom_usu`) AS `consultor`,`dg_reporte_tiempo`.`fechaActividad` AS `fechaActividad`,`dg_reporte_tiempo`.`descripcionModulo` AS `descripcionModulo`,`dg_reporte_tiempo`.`descripcion` AS `descripcion`,sum((case when (`dg_reporte_tiempo`.`tipoAtencion` = 'Presencial') then `dg_reporte_tiempo`.`hora` else 0 end)) AS `horasPresenciales`,sum((case when (`dg_reporte_tiempo`.`tipoAtencion` = 'Remota') then `dg_reporte_tiempo`.`hora` else 0 end)) AS `horasRemotas` from (`dg_reporte_tiempo` join `dg_empleados` on((`dg_reporte_tiempo`.`idEmpleado` = `dg_empleados`.`id_usu`))) group by `dg_reporte_tiempo`.`fechaActividad`,`dg_reporte_tiempo`.`idEmpleado`;

-- ----------------------------
-- View structure for vw_reportefi_formateado_xls
-- ----------------------------
DROP VIEW IF EXISTS `vw_reportefi_formateado_xls`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `vw_reportefi_formateado_xls` AS select `dg_reporte_tiempo`.`idEmpleado` AS `idEmpleado`,`dg_cliente`.`NombreCliente` AS `NombreCliente`,`dg_reporte_tiempo`.`ticketNum` AS `ticketNum`,`dg_reporte_tiempo`.`idEmpresaConsultora` AS `idEmpresaConsultora`,concat(`dg_empleados`.`ape_usu`,' ',`dg_empleados`.`nom_usu`) AS `consultor`,`dg_reporte_tiempo`.`fechaActividad` AS `fechaActividad`,`dg_reporte_tiempo`.`descripcionModulo` AS `descripcionModulo`,`dg_reporte_tiempo`.`descripcion` AS `descripcion`,sum((case when (`dg_reporte_tiempo`.`tipoAtencion` = 'Remota') then `dg_reporte_tiempo`.`hora` else 0 end)) AS `horasRemotas`,sum((case when (`dg_reporte_tiempo`.`tipoAtencion` = 'Presencial') then `dg_reporte_tiempo`.`hora` else 0 end)) AS `horasPresenciales` from ((`dg_reporte_tiempo` join `dg_empleados` on((`dg_reporte_tiempo`.`idEmpleado` = `dg_empleados`.`id_usu`))) join `dg_cliente` on((`dg_reporte_tiempo`.`idCliente` = `dg_cliente`.`idCliente`))) where (`dg_reporte_tiempo`.`estadoAP1` = 3) group by `dg_reporte_tiempo`.`fechaActividad`,`dg_reporte_tiempo`.`idEmpresaConsultora`,`dg_reporte_tiempo`.`idEmpleado`;

-- ----------------------------
-- View structure for vw_reporteficonsultoresxproyecto
-- ----------------------------
DROP VIEW IF EXISTS `vw_reporteficonsultoresxproyecto`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `vw_reporteficonsultoresxproyecto` AS select `dg_empleados`.`id_usu` AS `id_usu`,concat(`dg_empleados`.`nom_usu`,', ',`dg_empleados`.`ape_usu`) AS `Consultor`,`dg_empleados`.`ced_usu` AS `Cedula`,`dg_empresa_consultora`.`idEmpresaConsultora` AS `idEmpresaConsultora`,`dg_empresa_consultora`.`nombreEmpresaConsultora` AS `Consultora`,concat(`e`.`ape_usu`,', ',`e`.`nom_usu`) AS `Aprobador`,`dg_cliente`.`NombreCliente` AS `Cliente`,`dg_reporte_factura`.`urlFactura` AS `urlFactura`,`dg_reporte_tiempo`.`idProyecto` AS `idProyecto`,`dg_proyecto`.`nameProyecto` AS `nameProyecto`,`dg_reporte_tiempo`.`fechaActividad` AS `fechaActividad`,sum(`dg_reporte_tiempo`.`hora`) AS `totalHoras` from (((((((`dg_reporte_tiempo` join `dg_empleados` on((`dg_reporte_tiempo`.`idEmpleado` = `dg_empleados`.`id_usu`))) join `dg_empresa_consultora` on((`dg_reporte_tiempo`.`idEmpresaConsultora` = `dg_empresa_consultora`.`idEmpresaConsultora`))) join `dg_empleados` `e` on((`dg_empresa_consultora`.`idAprobador` = `e`.`id_usu`))) join `dg_cliente` on((`dg_reporte_tiempo`.`idCliente` = `dg_cliente`.`idCliente`))) join `dg_proyecto` on((`dg_reporte_tiempo`.`idProyecto` = `dg_proyecto`.`idProyecto`))) join `dm_tipo_actividad` on((`dg_reporte_tiempo`.`idTipoActividad` = `dm_tipo_actividad`.`irTipoActividad`))) left join `dg_reporte_factura` on(((`dg_reporte_tiempo`.`idEmpleado` = `dg_reporte_factura`.`idEmpleado`) and (`dg_reporte_tiempo`.`corte` = `dg_reporte_factura`.`corte`)))) where (`dg_reporte_tiempo`.`estadoAP1` = 3) group by `dg_empleados`.`id_usu`,`dg_empresa_consultora`.`idEmpresaConsultora` order by `dg_reporte_tiempo`.`fechaActividad`,`dg_reporte_factura`.`urlFactura`;

SET FOREIGN_KEY_CHECKS = 1;
