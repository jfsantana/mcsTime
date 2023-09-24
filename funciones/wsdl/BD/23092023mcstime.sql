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

 Date: 23/09/2023 22:22:35
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
) ENGINE = MyISAM AUTO_INCREMENT = 410 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Dynamic;

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
) ENGINE = InnoDB AUTO_INCREMENT = 123 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of dg_empleados
-- ----------------------------
INSERT INTO `dg_empleados` VALUES (74, 'JESUS F', 'SANTANA S', 'jsantana', '123456', '1', '2422568598', '12345678', 'CONSULTOR', 'jfsantana77@gmail.com', 10);
INSERT INTO `dg_empleados` VALUES (122, 'd', 'd', 'd', 'd', '1', 'd', 'd', 'd', 'd', 30);

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
INSERT INTO `dg_empresa_consultora` VALUES (2, 'M.P.S.', b'1');
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
  PRIMARY KEY (`idProyecto`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dg_proyecto
-- ----------------------------
INSERT INTO `dg_proyecto` VALUES (1, 'Actualizacion Tecnologica (P1)', '2023-10-02', '2024-05-15', 1, 'Luis Salas');
INSERT INTO `dg_proyecto` VALUES (10, 'Creaciond el sistema de Getsion de Tiempo MPS-TIME ..', '2023-09-22', '2023-09-24', 1, 'Edgar Corao');

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
) ENGINE = MyISAM AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dg_reporte_factura
-- ----------------------------
INSERT INTO `dg_reporte_factura` VALUES (1, 74, '082023', 'gogle', 1800, NULL, NULL);
INSERT INTO `dg_reporte_factura` VALUES (2, 74, '072023', 'mps.com', 1800, NULL, NULL);
INSERT INTO `dg_reporte_factura` VALUES (8, 74, '092023', 'https://jsonformatter.curiousconcept.com/#', 2860, 'jsantana', '2023-09-24');

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
  `estadoAP1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'CREADO-APROBADO-RECHAZADO',
  `estadoAP2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'PAGADO-RECHADADO',
  `fechaActualizacion` date NULL DEFAULT NULL COMMENT 'Fecha de actualizacion de estado',
  `actualizadoPor` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Usuario que realizo la ultima actualizacion',
  PRIMARY KEY (`idRegistro`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dg_reporte_tiempo
-- ----------------------------
INSERT INTO `dg_reporte_tiempo` VALUES (1, 74, 2, 24, 10, 3, 'Remota', 'Elaboracionde los procesos para la creacion de la BD', '2023-09-22', 12.00, '092023', '2023-09-22', 'jsantana', 'CREADO', 'CREADO', NULL, NULL);
INSERT INTO `dg_reporte_tiempo` VALUES (2, 74, 2, 24, 10, 3, 'Remota', 'Creaciond el Template, Menu, Navegacion, Seguridad', '2023-09-23', 15.00, '092023', '2023-09-24', 'jsantana', 'NUEVO', 'NUEVO', '2023-09-24', 'jsantana');

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

SET FOREIGN_KEY_CHECKS = 1;
