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

 Date: 16/10/2023 00:57:06
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
) ENGINE = MyISAM AUTO_INCREMENT = 556 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Dynamic;

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
  `foraneo` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `idConsultoraContratante` int(11) NULL DEFAULT NULL,
  `equipoAsignado` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `vehiculoTipo` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `vehiculoModelo` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `vehiculoMarca` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `vehiculoColor` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `vehiculoPlaca` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `vehiculoAnio` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `vehiculoAseguradora` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `vehiculoContrato` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_usu`) USING BTREE
) ENGINE = InnoDB ;

-- ----------------------------
-- Records of dg_empleados
-- ----------------------------
INSERT INTO `dg_empleados` VALUES (74, 'JESUS F', 'SANTANA S', 'jsantana', '12345', '1', '4244380137', '13336768', 'FULL STACK', 'jfsantana77@gmail.com|', 40, 'REMOTO', 'WEB', 'RD y SART', NULL, NULL, NULL, 'HP', 'MM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (122, 'JOSE', 'SALAZAR', 'c1', 'c1', '1', 'd', 'd', 'd', 'd', 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (123, 'Administrador', 'administrador', 'admin', 'admin', '1', '04244380137', '123', '123', '123', 10, 'remotooo', 'admin', 'admin', 'si', '8813336768', '9913336768', 'ibm', '123456789', 'fraaaaaa', 2, 'equipo asignado', 'Camioneta', 'DODGE', 'DAKOTA', 'ROJO', '999-999', '2007', 'P2', '768');
INSERT INTO `dg_empleados` VALUES (124, 'Aprobador', 'MPS', 'mps', 'mps', '1', '123', '123', '123', '123', 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (125, 'Finanzas', 'FI', 'fi', 'fi', '1', '123', '123', '123', '132', 30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (126, 'ALEJANDRO', 'PARRA', 'c2', 'c2', '1', '123', '123', '123', '132', 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (127, 'Aprobador', 'QP', 'qp', 'qp', '1', '123', '123', '123', '123', 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (128, 'Aprobador', 'MCS', 'mcs', 'mcs', '1', '123', '123', '132', '132', 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (171, 'Edgar', 'Corao', 'Edgar.Corao', '6100190', '1', '+58 04120140770', 'V-6.100.190', 'Director de proyecto', 'edgar.corao@mmdmcs.com', 10, 'PANAMA', 'DP', 'TODOS', 'Carnetizado', '8469936F3CFD', '3003C860ECO3', 'Victus', 'SCD2222JNK', 'FORANEO INTERNACIONAL', 0, 'Asignado', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (172, 'Luis', 'Salas', 'Luis.Salas', '8499195', '1', '+58 04125421912', 'V-8.499.195', 'Gerente de Proyecto funcional SAP', 'luis.salas@mmdmcs.com', 20, 'VAL', 'GTE', 'TODOS', 'Carnetizado', '48-2A-E3-37-BD-4D', 'D4-3B-04-C3-1A-3C', 'Thinkpad', '1903', 'FORANEO NACIONAL', 0, 'Asignado', 'Sedan', 'X1', 'Chery', 'Azul', 'AE976TD', '2013', 'En tramite', NULL);
INSERT INTO `dg_empleados` VALUES (173, 'Maria Carlota', 'Aranzazu', 'Maria.Aranzazu', '14452526', '1', '58 0414 2140480', 'V-14.452.526', 'Gerente de Proyecto Comunicacional', NULL, 20, 'CCS', 'GTE', 'TODOS', 'Por carnetizar', NULL, '64-79-F0-39-A7-42', 'IdealPad 5', 'MP1ZXS36', NULL, 0, 'No requiere', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (174, 'Zobeida', 'Moreno', 'Zobeida.Moreno', '8674386', '1', '58 0424 2351041', 'V-8.674.386', 'Gerente de Proyecto Comunicacional', 'zobeida.moreno@mmdmcs.com', 20, 'VAL', 'GTE', 'TODOS', 'Por carnetizar', '??????????', '??????????', NULL, NULL, 'FORANEO NACIONAL', 0, 'Por asignar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (175, 'Aneska', 'Rojas', 'Aneska.Rojas', '25221449', '1', '+58 0412 1814235', 'V- 25.221.449', 'Gerente de Proyecto funcional non SAP', 'aneska.rojas@mmdmcs.com', 20, 'CCS', 'GTE', 'TODOS', 'Carnetizado', '82-30-49-6E-4F-C7', '80-30-49-6E-4F-C7', 'LAPTOP-M6PS7TRI', 'PF2BBA4W', NULL, 0, 'No requiere', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (176, 'José Gregorio', 'Medina', 'Jose.Medina', '11027646', '1', '+58 0212 7626171/ +58 04143808575 ', 'V- 11.027.646', 'Gerente de Proyecto funcional non SAP', 'jose.medina@mmdmcs.com', 20, 'CCS', 'GTE', 'TODOS', 'Carnetizado', '50-EB-F6-48-01-72', '34-6F-24-2E-C0-55', 'G513QE-WH96', 'MBNRKD03596645C', NULL, 0, 'No requiere', 'Sedan', 'Corolla', 'Toyota', 'Gris', 'AFV67N', '2006', 'Grupo Hytcia de Venezuela, C.A.', '30090B');
INSERT INTO `dg_empleados` VALUES (177, 'Juan', 'Merchan', 'Juan.Merchan', '149946229', '1', '+507 61597081', '149946229', 'Gerente de Proyecto para integraciones', 'juan.merchan@mmdmcs.com', 20, 'PANAMA', 'GTE', 'TECNICO', 'Por carnetizar', '88:66:5a:54:7d:a2', NULL, 'Macbook Pro', 'C02G908EMD6R', 'FORANEO INTERNACIONAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (178, 'José', 'Alvarado', 'Jose.Alvarado', '8596339', '1', ' +58 04242143165', 'V-8.596.339', 'Gerente de proyecto técnico', 'jr.alvarado@mmdmcs.com', 20, 'VAL', 'GTE', 'TECNICO', 'Carnetizado', '00-0A-43-00-A3-5E', 'E4-A7-A0-CB-D2-B6', 'X1 Carbon', 'R90LMUTT', 'FORANEO NACIONAL', 0, 'Asignado', 'Camioneta', 'Sport Wagon', 'Kia', 'Gris', 'AC888UE', '2012', 'Seguros Universal', '33322');
INSERT INTO `dg_empleados` VALUES (179, 'Richard', 'Amaris', 'Richard.Amaris', '21152692', '1', '+ 58 04244184313', 'V-21.152.692', 'ABAP FACTORY (5 PAX) GRUPO 1', 'richard.amaris@mmdmcs.com', 40, 'VAL', 'ABAP', 'TECNICO', 'Por carnetizar', '2C-60-0C-1B-5E-83', '34-DE-1A-73-25-F3', 'Satellite S55-B5268', 'ZE022692C', 'FORANEO NACIONAL', 0, 'No requiere', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (180, 'Darwins', 'Galindez', 'Darwins.Galindez', '20293154', '1', '+58 04127434883', 'V-20.293.154', 'ABAP FACTORY (5 PAX) GRUPO 1', 'darwins.galindez@mmdmcs.com', 40, 'PTO CABELLO', 'ABAP', 'TECNICO', 'Por carnetizar', 'E4-E7-49-38-35-37', '28-3A-4D-61-C2-19', 'HP Pavilon 15-cw0xxx', '5DC84821TK', 'FORANEO NACIONAL', 0, 'No requiere', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (181, 'Luis', 'Reyes', 'Luis.Reyes', '24013862', '1', '+58 04124873859', 'V-24.013.862', 'ABAP FACTORY (5 PAX) GRUPO 1', 'luis.reyes@mmdmcs.com', 40, 'COJEDES', 'ABAP', 'TECNICO', 'Por carnetizar', '54-AB-3A-1E-04-DF', 'A8-A7-95-A5-85-2F', 'Aspire E5-573', 'NXMVHAA02655014', 'FORANEO NACIONAL', 0, 'No requiere', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (182, 'Por', 'asignar', 'Por.asignar', NULL, '1', NULL, NULL, 'ABAP FACTORY (5 PAX) GRUPO 1', NULL, 40, NULL, 'ABAP', 'TECNICO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No requiere', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (183, 'Por', 'asignar', 'Por.asignar', NULL, '1', NULL, NULL, 'ABAP FACTORY (5 PAX) GRUPO 1', NULL, 40, NULL, 'ABAP', 'TECNICO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No requiere', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (184, 'Oreana', 'Colorado', 'Oreana.Colorado', '6721149', '1', '+58 04143978480', 'V-6.721.149', 'ABAP FACTORY (5 PAX) GRUPO 2', 'oriana.colorado@mmdmcs.com', 40, 'CCS', 'ABAP', 'TECNICO', 'Por carnetizar', '2A-39-26-69-34-1A', '28-39-26-57-7B-19', 'IdeadPad S145', 'I6317A-RTL8821CE', NULL, 0, 'No requiere', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (185, 'Viveka', 'González', 'Viveka.Gonzalez', '15464440', '1', '+58 04126926772', 'V-15.464.440', 'ABAP FACTORY (5 PAX) GRUPO 2', 'viveka.gonzalez@mmdmcs.com', 40, 'MBO', 'ABAP', 'TECNICO', 'Por carnetizar', '8C-70-5a-31-80-00', NULL, 'T40', 'S/N', 'FORANEO NACIONAL', 0, 'No requiere', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (186, 'Karla ', 'Parada', 'Karla .Parada', '12959217', '1', '58 04127000977', 'V.-12.959.217', 'ABAP FACTORY (5 PAX) GRUPO 2', 'karla.parada@mmdmcs.com', 40, 'CCS', 'ABAP', 'TECNICO', 'Por carnetizar', '00-09-0F-FE-00-01', 'E0-75-26-0A-AF-99', 'X133JR610', 'F152J-16/WB/N50N5A/FW0655031', NULL, 0, 'No requiere', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
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
INSERT INTO `dg_empleados` VALUES (199, 'Orlando', 'Labrador', 'Orlando.Labrador', '6180157', '1', '+58 04129957960', 'V-6.180.157', 'Basis  (BPC - BO)', 'orlando.labrador@mmdmcs.com', 40, 'CCS', 'BC', 'TECNICO', 'Carnetizado', '98-E7-43-13-30-44', 'AC-D5-64-9F-B7-D9', 'Inspiron P89G', '2876140994', NULL, 0, 'No requiere', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (200, 'Janeth', 'López', 'Janeth.Lopez', '9413424', '1', '+58 04143258067', 'V-9.413.424', 'Basis  (DS - BW)', 'yaneth.lopez@mmdmcs.com', 40, 'CCS', 'BC', 'TECNICO', 'Carnetizado', NULL, '00-45-E2-86-EE-E7', 'Ideapad3', 'PF36ZAE8', NULL, 0, 'No requiere', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (201, 'Eduard', 'Gúzman', 'Eduard.Guzman', '14128584', '1', '+58 04125979553', 'V-14.128.584', 'FIORI FACTORY', 'eduard.guzman@mmdmcs.com', 40, 'PANAMA', 'FIORI', NULL, 'Carnetizado', NULL, 'f8:4d:89:7b:6a:81 ', 'Macbook Pro', 'N76TPWHJTV', 'FORANEO INTERNACIONAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (202, 'Ixia', 'Muñoz', 'Ixia.Munoz', '23508219', '1', '+58 04244317584', 'V-23.508.219', 'Finanzas - MIGRACIÓN / CAPA FISCAL', 'ixia.munoz@mmdmcs.com', 40, 'VAL', 'FI', 'DATOS MIGRACION', 'Carnetizado', '6C2408B1AD41', '7032177497BC', 'Thinkpad E15 GEN4', 'PF3V63JAD', 'FORANEO NACIONAL', 0, 'Asignado', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (203, 'Ali', 'Muñoz', 'Ali.Munoz', '23508231', '1', '58 04146315850', 'V-23.508.231', 'Finanzas - MIGRACIÓN / CAPA FISCAL', 'ali.munoz@mmdmcs.com', 40, 'VAL', 'FI', 'DATOS MIGRACION', 'Carnetizado', NULL, 'FC-B3-BC-BD-1A-6E', 'IdeadPad S340-15IIL', 'MP1WXD7Y', 'FORANEO NACIONAL', 0, 'Asignado', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (204, 'Katiuska', 'Andrade', 'Katiuska.Andrade', '12722918', '1', '58 0414 3303043', 'V-12.722.918', 'Finanzas - DATOS / MIGRACIÓN', 'katiuska.andrade@mmdmcs.com', 40, 'CCS', 'FI', 'DATOS MIGRACION', 'Carnetizado', 'f4:5c:89:8c:0e:7f', NULL, 'MacBook Pro A 1502', 'C02QX20PFVH5', NULL, 0, 'No requiere', 'Sedan', 'Caliber', 'Dodge', 'Azul', 'MFM10Z', '2008', 'En tramite', NULL);
INSERT INTO `dg_empleados` VALUES (205, 'Añanguren', 'Iris', 'Añanguren.Iris', '14201201', '1', '58 04242983558', 'V- 14.201.201', 'Finanzas - DATOS / MIGRACIÓN', 'iris.ananguren@mmdmcs.com', 40, 'CCS', 'FI', 'DATOS MIGRACION', 'Carnetizado', 'CND83105CF', 'F5853LA#ABM', 'HP Compaq C768LA', '481579-002', NULL, 0, 'No requiere', 'Rustico', 'Techo Duro', 'Toyota ', 'Azul', 'AA236KD', '2001', 'Inversiones Rubi 1110', '3418');
INSERT INTO `dg_empleados` VALUES (206, 'Navarro', 'Marlegnis', 'Navarro.Marlegnis', '9452214', '1', '58 04129178985', 'V-9.452.214', 'Finanzas - RD/STAR', 'marlegnis.navarro@mmdmcs.com', 40, 'MCY', 'FI', 'RD y STAR', 'Carnetizado', '54:EE:75:2D:46:9A', '5c:93:a2:9e:db:bf', 'Flex 2-15 20405', 'WB15376977', 'FORANEO NACIONAL', 0, 'Por asignar', 'Sedan', 'Corolla', 'Toyota ', 'Gris', 'AHF42R', '2008', 'Adminisradora EULO 2021', '3190923');
INSERT INTO `dg_empleados` VALUES (207, 'Rangel', 'Linda', 'Rangel.Linda', '19231693', '1', '58 0414 5913685', 'V-19.231.693', 'Finanzas - DATOS / MIGRACIÓN', 'linda.rangel@mmdmcs.com', 40, 'VAL', 'FI', 'DATOS MIGRACION', 'Por carnetizar', 'A0-E7-0B-BC-7D-8A', 'A0-E7-0B-BC-7D-8A', 'IDEAPAD3', 'PF9XB1A12001', 'FORANEO NACIONAL', 0, 'No requiere', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (208, 'Jennifer', 'Linares', 'Jennifer.Linares', '14953399', '1', '+58 04242659342', 'V-14.953.399', 'Finanzas - DATOS / MIGRACIÓN', 'jennifer.linares@mmdmcs.com', 40, 'CCS', 'FI', NULL, 'Carnetizado', '?????????', NULL, 'IdeadPad 3', 'PF23C1BB ', NULL, 0, 'No requiere', 'Camioneta', 'Sport Wagon', 'Gran Cherokee', 'Azul', 'AD721BM', '2010', 'interbank', '310015628');
INSERT INTO `dg_empleados` VALUES (209, 'Emperatriz', 'Prichinenko', 'Emperatriz.Prichinenko', '8299029', '1', '+58 04144160943', 'V-8.299.029', 'Controlling - MIGRACIÓN', 'emperatriz.prichinenko@mmdmcs.com', 40, 'MCY', 'CO', 'DATOS MIGRACION', 'Carnetizado', '84-7B-EB-26-80-38', '2C-6E-85-F1-50-86', 'Inspiron 5458', 'G9LMDC2', 'FORANEO NACIONAL', 0, 'Asignado', 'Camioneta', 'Gran Vitara', 'Suzuki', 'Gris', 'AB388CG', '2008', 'Corporacion Multicars de Venezuela, C.A.', '16438');
INSERT INTO `dg_empleados` VALUES (210, 'Carlex', 'Canelon', 'Carlex.Canelon', '19218793', '1', '+58 04128496235', 'V-19.218.793', 'Controlling - DATOS', 'carlex.canelon@mmdmcs.com', 40, 'VAL', 'CO', 'DATOS MIGRACION', 'Carnetizado', 'B4-B5-B6-99-77-A5', NULL, '15-ef2126wm', '5CD1415RTO', 'FORANEO NACIONAL', 0, 'Asignado', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (211, 'Lorena', 'González', 'Lorena.Gonzalez', '18228341', '1', '+58 04124578358', 'V-18.228.341', 'Controlling - RD/STAR', 'lorena.gonzalez@mmdmcs.com', 40, 'VAL', 'CO', 'RD y STAR', 'Carnetizado', '??????????', NULL, 'IdeadPad 1 15ALC7', 'PF3RP3XW', 'FORANEO NACIONAL', 0, 'Asignado', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (212, 'Luis', 'Stengel', 'Luis.Stengel', '11201119', '1', '+58 04120212121', 'V- 11.201.119', 'Gestión de Materiales - MIGRACIÓN', 'luis.stengel@mmdmcs.com', 40, 'CCS', 'MM', NULL, 'Carnetizado', '28-CD-C4-63-B2-6C', '192.168.1.7', 'X64-based PC', 'CND03306V2', NULL, 0, 'No requiere', 'Camioneta', 'Santa Fe', 'Hyundai', 'Plata', 'AJ461DA', '2007', 'En tramite', NULL);
INSERT INTO `dg_empleados` VALUES (213, 'Herlinan', 'Singer', 'Herlinan.Singer', '16328895', '1', '58 04123212025', 'V-16.328.895', 'Gestión de Materiales - RD/STAR', 'herlinan.singer@mmdmcs.com', 40, 'CCS', 'MM', 'RD y STAR', 'Carnetizado', 'AC-9E-17-92-A1-3D', '10-08-B1-AE-2A-83', 'TP500LA', 'EAN0WU494685446', NULL, 0, 'No requiere', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (214, 'María', 'Blasini', 'Maria.Blasini', '11381136', '1', '58 04143201876', 'V-11.381.136', 'Gestión de Materiales - DATOS / INTEGRACIÓN / WF', 'maria.blasini@mmdmcs.com', 40, 'CCS', 'MM', 'DATOS MIGRACION', 'Carnetizado', 'FA-D0-FC-F5-C4-75', NULL, 'IdeaPad S340', 'MP1M8470', NULL, 0, 'No requiere', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (215, 'Hernán', 'Singer', 'Hernan.Singer', '12718694', '1', '+ 58 04147560628', 'V-12.718.694', 'Gestión de Ventas  - DATOS / MIGRACIÓN', 'hernan.singer@mmdmcs.com', 40, 'CCS', 'SD', 'DATOS MIGRACION', 'Carnetizado', NULL, '34-60-F9-92-81-4D', 'Pavilon', '5CD937823C', NULL, 0, 'No requiere', 'Camioneta', 'Tucson', 'Hyundai', 'Verde', 'LBB11H', '2008', 'Seguros Los Andes', 'AUIN-2160261956');
INSERT INTO `dg_empleados` VALUES (216, 'José', 'Mendoza', 'Jose.Mendoza', '22182734', '1', '+58 04245703354', 'V-22.182.734', 'Gestión de Ventas - RD/STAR', 'jose.mendoza@mmdmcs.com', 40, 'BQT', 'SD', 'RD y STAR', 'Por carnetizar', '?????', '?????', 'ROG ZEPHYRUS', 'N3NRKD004385100', 'FORANEO NACIONAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (217, 'Elizabeth', 'Balza', 'Elizabeth.Balza', '15540094', '1', '+58 0424 2081450', 'V-15.540.094', 'Gestión de Ventas  - DATOS', 'elizabeth.balza@mmdmcs.com', 40, 'CCS', 'SD', 'DATOS MIGRACION', 'Por carnetizar', 'E2-0A-F6-85-73-83', 'E0-0A-F6-85-73-83', 'IdeaPad 1 15ALC7', 'PF3W6SVB', NULL, 0, 'No requiere', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (218, 'Luis', 'Bautista', 'Luis.Bautista', '23923263', '1', '+58 04248492016', 'V-23.923.263', 'Gestión de Proyectos - DATOS / MIGRACIÓN', 'luis.bautista@mmdmcs.com', 40, 'CCS', 'GP', 'DATOS MIGRACION', 'Carnetizado', '5c.5f.67.f4.9f.07', NULL, 'Thinkpad X280', 'P17SLJZ18-05', NULL, 0, 'No requiere', 'Sedan', 'Corolla', 'Toyota', 'Negro', 'AB106PB', '2013', 'Seguros Caracas ', '9960140');
INSERT INTO `dg_empleados` VALUES (219, 'Por', 'asignar', 'Por.asignar', NULL, '1', NULL, NULL, 'Gestión de Proyectos - MIGRACIÓN', NULL, 40, NULL, 'GP', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No requiere', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (220, 'Por', 'asignar', 'Por.asignar', NULL, '1', NULL, NULL, 'Gestión de Proyectos - MIGRACIÓN', NULL, 40, NULL, 'GP', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No requiere', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (221, 'Lillie', 'Muñoz', 'Lillie.Munoz', '16447155', '1', '58 04246157167', 'V-16.447.155', 'Gestión de Producción y Calidad - RD/STAR', 'lilie.munoz@mmdmcs.com', 40, 'VAL', 'PP', 'APOYO', 'Por carnetizar', '6C2408B1A077', '703217751705', 'Thinkpad E15 GEN4', 'PF3VA3Q7', 'FORANEO NACIONAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (222, 'Valor', 'Betania', 'Valor.Betania', '23648234', '1', '+58 0412 9437252', 'V-23.648.234', 'Gestión de Producción y Calidad - DATOS', ' betania.valor@mmdmcs.com', 40, 'VAL', 'PP', 'DATOS MIGRACION', 'Por carnetizar', '?????????????', '???????????', '15-dy4013dx', '5CD2413YNL', 'FORANEO NACIONAL', 0, 'Por asignar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (223, 'Wilroxi', 'Quijada', 'Wilroxi.Quijada', '12765544', '1', '58 04149019117', 'V.-12.765.544', 'Gestión de Producción y Calidad', NULL, 40, 'CCS', 'PP', NULL, 'Por carnetizar', NULL, '14-85-7F-8C-2D-DC', 'Inspiron 15', '15.6 I5-1135G7', NULL, 0, 'No requiere', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (224, 'Carlos', 'Fuenmayor', 'Carlos.Fuenmayor', '13930907', '1', '+58 04122210229', 'V-13.930.907', 'Gestión de mantenimiento - DATOS / MIGRACIÓN', 'carlos.fuenmayor@mmdmcs.com', 40, 'MBO', 'MM', 'DATOS MIGRACION', 'Carnetizado', '60-18-95-1D-E9-2F', 'A4-42-3B-5C-ED-B0', 'Inspiron 15 3000', '2DX5KA00', 'FORANEO NACIONAL', 0, 'Por asignar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (225, 'Adriana', 'Martínez', 'Adriana.Martinez', '20513771', '1', '+ 58 4244961617', 'V-20.513.771', 'Gestión de mantenimiento - RD/STAR', 'adriana.martinez@mmdmcs.com', 40, 'VAL', 'MM', 'RD y STAR', 'Carnetizado', '??????', '??????', '81W0', 'PF2E4BEM', 'FORANEO NACIONAL', 0, 'Asignado', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (226, 'Nelson', 'Barrera', 'Nelson.Barrera', '5241996', '1', '58 426 5103083 whassap/ 58 412 1075266 ', 'V-5.241.996', 'Gestión de mantenimiento - MIGRACIÓN', 'nelson.barrera@mmdmcs.com', 40, 'VAL', 'MM', NULL, 'Carnetizar/Urgente', '70-77-81-68-AB-0B', NULL, 'Pavilion', '5cd5293d58', 'FORANEO NACIONAL', 0, 'Por asignar', 'Camioneta', 'Tucson', 'Hyundai', 'Verde', 'OAN16H', '2007', 'Seryise. Ve, C.A.', 'ML-1991');
INSERT INTO `dg_empleados` VALUES (227, 'Javier', 'Ortiz', 'Javier.Ortiz', '82079067', '1', '+58 0426 5166140', 'E-82.079.067', 'Nómina + ABAP - MIGRACIÓN', 'javier.ortiz@mmdmcs.com', 40, 'PERU', 'HR', 'NOMINA ', 'Carnetizado', '00-09-0F-FE-00-01', '74-04-F1-38-D4-CA', 'NP950QED', 'BA98-03420A10', 'FORANEO INTERNACIONAL', 0, NULL, 'Camioneta', 'Terios', 'Daihatsu', 'Gris', 'AA317KR', '2009', 'Multinacional Elite, C.A.', '22610');
INSERT INTO `dg_empleados` VALUES (228, 'Benito', 'Valeriano', 'Benito.Valeriano', '6284967', '1', '+58 04123970084', 'V-6.284.967', 'Nómina - MIGRACIÓN', 'benito.valeriano@mmdmcs.com', 40, 'CHARALLAVE', 'HR', 'NOMINA ', 'Carnetizado', '??????', '??????', 'Macbook Pro', 'C02JJ011DKQ2', NULL, 0, 'Asignado', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (229, 'Sandra', 'Vargas', 'Sandra.Vargas', '6670315', '1', NULL, 'V-6.670.315', 'Nómina - MIGRACIÓN', 'sandra.vargas@mmdmcs.com ', 40, 'MBO', 'HR', 'NOMINA ', 'Carnetizar/Urgente', '3A-00-25-07-2D-EE', NULL, 'T490', 'S/N PF-1PMSL8', 'FORANEO NACIONAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (230, 'Jonathan', 'Díaz', 'Jonathan.Diaz', '16524558', '1', '+58 04166250258', 'V-16.524.558', 'Consultor full stack ', 'jonathan.diaz@mmdmcs.com', 40, 'CCS', 'FIORI', 'TECNICO', 'Por carnetizar', '??????', '??????\'', 'G5MD', 'SN2241J000771', NULL, 0, 'No requiere', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (231, 'Jesús', 'Santana', 'Jesus.Santana', '13336768', '1', '+58 04244380137', 'V-13.336.768', 'Consultor full stack  - RD/STAR', 'jesus.santana@mmdmcs.com', 40, 'VAL', 'FIORI', 'RD y STAR', 'Carnetizado', '84-A9-3E-14-79-E2', '64-5D-86-9A-28-F6', 'Pavilon', '5CD842DLMG', 'FORANEO NACIONAL', 0, NULL, 'Camioneta', 'Dodge Dakota', 'Dodge', 'Rojo', 'A08CO9M', '2007', 'Asociacion cooperativa Acoven R.L.', '35638');
INSERT INTO `dg_empleados` VALUES (232, 'Breznev', 'Vega', 'Breznev.Vega', '12251748', '1', '+58 04242231829', 'V-12.251.748', 'Consultor full stack  - RD/STAR', 'breznev.vega@mmdmcs.com', 40, 'VAL', 'FIORI', 'RD y STAR', 'Carnetizado', '00-FF-C5-D8-39-5C', 'F8-59-71-7B-2E-DD', 'T470', 'PF13SH1A', 'FORANEO NACIONAL', 0, 'Por asignar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (233, 'María', 'Marrero', 'Maria.Marrero', '18364157', '1', '58 04123358987', 'V- 18.364.157', 'OYM (6 PAX)', 'maria.marrero@mmdmcs.com', 40, 'CCS', 'OYM', 'OYM ', 'Carnetizado', 'A8.CB.47.5B.E0', '0A.64.2D.36.CC', 'VIT3400', 'S/N', NULL, 0, 'No requiere', 'Camioneta', 'Terios', 'Daihatsu', 'Beige', ' AA778XM', '2008', 'RCV Plus', '97L-10907');
INSERT INTO `dg_empleados` VALUES (234, 'Pedro', 'Rodríguez', 'Pedro.Rodriguez', '6115084', '1', '+58 04124894239', 'V-6.115.084', 'OYM (6 PAX)', 'pedro.rodriguez@mmdmcs.com', 40, 'REMOTO', 'OYM', 'OYM ', 'Carnetizado', 'CHD987EH209F', NULL, 'E6440', '20200068375', 'FORANEO INTERNACIONAL', 0, 'Asignado', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (235, 'Yosmar', 'Molina', 'Yosmar.Molina', '7998863', '1', '58 04126116189', 'V-7.998.863', 'OYM (6 PAX)', 'yosmar.molina@mmdmcs.com', 40, 'CCS', 'OYM', 'OYM ', 'Carnetizar/Urgente', '28-11-A8-EE-35-0D', '28-11-A8-EE-35-09', 'VivoBook', 'X515JA-212.V15BB', NULL, 0, 'No requiere', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (236, 'Luis', 'Delgado', 'Luis.Delgado', '11039268', '1', ' 58 04164292637', 'V-11.039.268', 'OYM (6 PAX)', 'luis.delgado@mmdmcs.com', 40, 'LOS TEQUES', 'OYM', 'OYM ', 'Por carnetizar', '20-2B-20-03-DF-3F', NULL, '15 dy2791wm', '6M0Z6UA', 'FORANEO NACIONAL', 0, 'No requiere', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (237, 'Orlando', 'Benavides', 'Orlando.Benavides', '14128956', '1', '+58 04265194050', 'V-14.128.956', 'OYM (6 PAX)', 'orlando.benavides@mmdmcs.com', 40, 'CCS', 'OYM', 'OYM ', 'Por carnetizar', '24-B6-FD-31-97-7B', '7E-E9-D3-AA-6C-8C', 'Dell', '84WXNR1', NULL, 0, 'No requiere', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (238, 'Monica', 'Oca', 'Monica.Oca', '12338919', '1', '58 414-0521078', 'V-12.338.919', 'OYM (6 PAX)', 'monica.oca@mmdmcs.com', 40, 'MCY', 'OYM', 'OYM ', 'Por carnetizar', NULL, '9C-2A-70-2A-08-E9', '15-inch, 2012', '6122550097', 'FORANEO NACIONAL', 0, 'No requiere', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (239, 'Jaime', 'Lopez', 'Jaime.Lopez', 'C01641641', '1', '+505 89391438', 'C01-641641', 'BI (2 - Business Inteligent)', 'jaime.lopez@mmdmcs.com', 40, 'NICARAGUA', 'BIBOP', 'BI', 'Por carnetizar', '??????', '??????', 'F15', 'M3NRCX02Y420114', 'FORANEO INTERNACIONAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (240, 'Chavez', 'Osmin', 'Chavez.Osmin', '0410407011003C', '1', '+505 58065327', '041-040701-1003C', 'BI (2 - Business Inteligent)', 'chavez.osmin@mmdmcs.com', 40, 'COLOMBIA', 'BIBOP', 'BI', 'Por carnetizar', 'K1905N0020646', NULL, 'GE63 RAIDER 9SE', 'K1905N0020646', 'FORANEO INTERNACIONAL', 0, 'No requiere', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (241, 'Jaime', 'Lopez', 'Jaime.Lopez', 'C01641641', '1', '+505 89391438', 'C01-641641', 'DataServices (3 pax DS - Datamart)', 'jaime.lopez@mmdmcs.com', 40, 'NICARAGUA', 'BC', 'BI', 'Por carnetizar', '??????', '??????', 'F15', 'M3NRCX02Y420114', 'FORANEO INTERNACIONAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (242, 'Chavez', 'Osmin', 'Chavez.Osmin', '0410407011003C', '1', '+505 58065327', '041-040701-1003C', 'DataServices (3 pax DS - Datamart)', 'chavez.osmin@mmdmcs.com', 40, 'COLOMBIA', 'BC', 'BI', 'Por carnetizar', 'K1905N0020646', NULL, 'GE63 RAIDER 9SE', 'K1905N0020646', 'FORANEO INTERNACIONAL', 0, 'No requiere', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (243, 'Libardo', 'Rodríguez', 'Libardo.Rodriguez', 'AS580515', '1', '57 - 312-5121206', 'AS580515', 'DataServices (3 pax DS - Datamart)', 'libardo.rodriguez@mmdmcs.com ', 40, 'COLOMBIA', 'BC', 'BI', 'Por carnetizar', '88-A4-C2-08-A9-39', 'E0-75-26-0A-AF-99', 'ThinkPad X13 Gen2', 'PC-29L2RM', 'FORANEO INTERNACIONAL', 0, 'No requiere', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (244, 'Juan', 'Merchan', 'Juan.Merchan', '149946229', '1', '+507 61597081', '149946229', 'PI', 'juan.merchan@mmdmcs.com', 40, 'PANAMA', 'PI', NULL, 'Por carnetizar', '88:66:5a:54:7d:a2', NULL, 'Macbook Pro', 'C02G908EMD6R', 'FORANEO INTERNACIONAL', 0, 'No requiere', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (245, 'Emir', 'Morillo', 'Emir.Morillo', '11647505', '1', '+57 304 3551505', 'V.-11.647.505', 'PI', 'emir.morillo@mmdmcs.com', 40, 'COLOMBIA', 'PI', NULL, 'Por carnetizar', 'FC-01-7C-99-74-35', NULL, 'ENVY', 'SN', 'FORANEO INTERNACIONAL', 0, 'No requiere', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `dg_empleados` VALUES (246, 'Kira', 'Rocha', 'Kira.Rocha', '988510', '1', '+507 6019-0587', '988510', 'PI', 'kira.rocha@mmdmcs.com ', 40, 'PANAMA', 'PI', NULL, 'Por carnetizar', '3c:06:30:18:58:21', NULL, '13 inch M1 2020', 'C02FX5EWQ05G', 'FORANEO INTERNACIONAL', 0, 'No requiere', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for dg_empleados_old
-- ----------------------------

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
-- Table structure for dg_indicadores_sev
-- ----------------------------
DROP TABLE IF EXISTS `dg_indicadores_sev`;
CREATE TABLE `dg_indicadores_sev`  (
  `ID` int(11) NOT NULL,
  `IndSEV` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `HHE` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `total dias perdidos` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `total dias cargados` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dg_indicadores_sev
-- ----------------------------

-- ----------------------------
-- Table structure for dg_indicadores_si
-- ----------------------------
DROP TABLE IF EXISTS `dg_indicadores_si`;
CREATE TABLE `dg_indicadores_si`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Complejo_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `Siglas_Complejo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `Fecha_Carga` date NULL DEFAULT NULL,
  `IFB` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `HHE_FB` int(11) NULL DEFAULT NULL,
  `TAO` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ISEV` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `HHE_SEV` int(11) NULL DEFAULT NULL,
  `TDP` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `TDC` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `IFN` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `HHE_FN` int(11) NULL DEFAULT NULL,
  `TACTP` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 63 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

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
  `ID` int(11) NOT NULL,
  `Complejo_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `Siglas_Complejo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `IFB` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `HHE` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `TAO` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dg_indicadores_si_fb
-- ----------------------------

-- ----------------------------
-- Table structure for dg_indicadores_si_fn
-- ----------------------------
DROP TABLE IF EXISTS `dg_indicadores_si_fn`;
CREATE TABLE `dg_indicadores_si_fn`  (
  `ID` int(11) NOT NULL,
  `Complejo_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `Siglas_Complejo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `IFN` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `HHE` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `TACTP` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dg_indicadores_si_fn
-- ----------------------------

-- ----------------------------
-- Table structure for dg_indicadores_sp
-- ----------------------------
DROP TABLE IF EXISTS `dg_indicadores_sp`;
CREATE TABLE `dg_indicadores_sp`  (
  `idIndicadores` int(11) NOT NULL AUTO_INCREMENT,
  `complejo_id` char(2) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `Siglas_Complejo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `Fecha_Carga` date NULL DEFAULT NULL,
  `HHT` char(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `FHP` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `FHC` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ESP` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ESPN1` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ESPN2` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ESPN3` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `IESP` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `IEPN1` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ISPN2` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ISPN3` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `fechaCreacion` date NULL DEFAULT NULL,
  `creadoPor` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`idIndicadores`) USING BTREE,
  INDEX `complejo_id`(`Siglas_Complejo`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 93 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

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
