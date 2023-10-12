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

 Date: 12/10/2023 14:25:50
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
