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

 Date: 22/09/2023 21:02:05
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
) ENGINE = MyISAM AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dg_cliente
-- ----------------------------
INSERT INTO `dg_cliente` VALUES (1, 'P1', b'1');

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
) ENGINE = MyISAM AUTO_INCREMENT = 391 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Dynamic;

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
  PRIMARY KEY (`id_usu`) USING BTREE,
  INDEX `fk_dg_empleados_dg_empleado_token_1`(`log_usu`) USING BTREE,
  CONSTRAINT `fk_dg_empleados_dg_empleado_token_1` FOREIGN KEY (`log_usu`) REFERENCES `dg_empleado_token` (`log_usu`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_dg_empleados_dg_reporte_tiempo_1` FOREIGN KEY (`id_usu`) REFERENCES `dg_reporte_tiempo` (`idEmpleado`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 119 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of dg_empleados
-- ----------------------------
INSERT INTO `dg_empleados` VALUES (74, 'JESUS F', 'SANTANA S', 'jsantana', '123456', 'A', '2422568598', '12345678', 'CONSULTOR', 'jfsantana77@gmail.com', 10);

-- ----------------------------
-- Table structure for dg_empresa_consultora
-- ----------------------------
DROP TABLE IF EXISTS `dg_empresa_consultora`;
CREATE TABLE `dg_empresa_consultora`  (
  `idEmpresaConsultora` int(11) NOT NULL AUTO_INCREMENT,
  `nombreEmpresaConsultora` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`idEmpresaConsultora`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dg_empresa_consultora
-- ----------------------------
INSERT INTO `dg_empresa_consultora` VALUES (1, 'MCS');
INSERT INTO `dg_empresa_consultora` VALUES (2, 'MPS');
INSERT INTO `dg_empresa_consultora` VALUES (3, 'QP');

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
) ENGINE = MyISAM AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dg_proyecto
-- ----------------------------
INSERT INTO `dg_proyecto` VALUES (1, 'Actualizacion Tecnologica (P1)', '2023-10-02', '2024-05-15', 1, NULL);

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
  `descripcion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Descripcion de la Actividad',
  `fechaActividad` date NULL DEFAULT NULL COMMENT 'Fecha a Registrar',
  `hora` float(11, 2) NULL DEFAULT NULL COMMENT 'Horas registradas',
  `corte` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Corte al que pertenece el regitro MMAAAA',
  `tipoAtencion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'REMOTO - PRESENCIAL',
  `fechaCreacion` date NULL DEFAULT NULL COMMENT 'Fecha de creacion del registro',
  `creadoPor` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Usuario que lo creo',
  `estado` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'CREADO-APROBADO-RECHAZADO',
  `fechaActualizacion` date NULL DEFAULT NULL COMMENT 'Fecha de actualizacion de estado',
  `actualizadoPor` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Usuario que realizo la ultima actualizacion',
  PRIMARY KEY (`idRegistro`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dg_reporte_tiempo
-- ----------------------------

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
) ENGINE = MyISAM AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

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

SET FOREIGN_KEY_CHECKS = 1;
