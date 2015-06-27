-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-06-2015 a las 12:53:58
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `teresamartin`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_actualizarAlumno`(IN matri int, 
				a_pa varchar(45),
				a_ma varchar(45),
				nom varchar(45),
				FKsex int,
				FKesta int,
				FKgg int,
				FKesco int,
				FKtut int,
				FKbec int)
BEGIN
		IF LENGTH(TRIM(matri))=0 or 
		LENGTH(TRIM(a_pa))=0 or 
		LENGTH(TRIM(a_ma))=0 or
		LENGTH(TRIM(nom))=0 or 
		LENGTH(TRIM(FKsex))=0 or 
		LENGTH(TRIM(FKesta))=0 or 
		LENGTH(TRIM(FKgg))=0 or 
		LENGTH(TRIM(FKesco))=0 or 
		LENGTH(TRIM(FKtut))=0 
		THEN
			SELECT "FALTAN DATOS";
		ELSE
			UPDATE alumno SET a_paterno=a_pa, 
					a_materno=a_ma, 
					nombre=nom,
					idsexo=FKsex,
                    idestatus=FKesta,
					idgg=FKgg,
					idescolaridad=FKesco,
					idtutor=FKtut,
					idbeca=FKbec
					WHERE matricula=matri;
			
		END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_actualizarBeca`(IN idbec INT,
			nom varchar(45),
			des int)
BEGIN

DECLARE cantidadBec INT;

	IF LENGTH(TRIM(nom))=0 or LENGTH(TRIM(des))=0  THEN
			SELECT "FALTAN DATOS";
		ELSE
		UPDATE beca SET nombre=nom,
		descuento=des
		WHERE idbeca=idbec;
	end if;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_actualizarCiclo`(IN cic int, 
				ciclo varchar(10),
				FKyea int)
BEGIN
		IF LENGTH(TRIM(cic))=0 or 
		LENGTH(TRIM(ciclo))=0 or
		LENGTH(TRIM(FKyea))=0 
		THEN
			SELECT "FALTAN DATOS";
		ELSE
			UPDATE ciclo SET ciclo=cic, 
					idyear=FKyea
					WHERE ciclo=cic;
			
		END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_actualizarEscolaridad`(IN idesco INT,
				esco varchar(20))
BEGIN 
	IF LENGTH(TRIM(esco))=0  THEN
		SELECT "FALTAN DATOS";
	ELSE
		UPDATE escolaridad SET escolaridad=esco
			WHERE idescolaridad=idesco;
	END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_actualizarEstatus`(IN idesta INT,
				esta varchar(15))
BEGIN 
	IF LENGTH(TRIM(esta))=0  THEN
		SELECT "FALTAN DATOS";
	ELSE
		UPDATE estatus SET estatus=esta
			WHERE idestatus=idesta;
	END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_actualizargg`(IN idg INT,
				grado varchar(2),
				grupo varchar(2))
BEGIN 
		IF LENGTH(TRIM(grado))=0 
or LENGTH(TRIM(grupo))=0 THEN

			SELECT "FALTAN DATOS";

			ELSE 
            
				UPDATE gg SET grado=grado,
				grupo=grupo
				WHERE idgg=idg;
                
		END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_actualizarTutuor`(IN idtut INT,
				a_pa varchar(45),
				a_ma varchar(45),
				nom varchar(45),
				emi varchar(45),
				tel varchar(45))
begin 
		IF LENGTH(TRIM(a_pa))=0 or LENGTH(TRIM(a_ma))=0 or  LENGTH(TRIM(nom))=0 or LENGTH(TRIM(emi))=0 or LENGTH(TRIM(tel))=0 THEN

			SELECT "FALTAN DATOS";

			ELSE 
            
				UPDATE tutor SET a_paterno=a_pa,
				a_materno=a_ma,
				nombre=nom,
				email=emi,
				telefono=tel
				WHERE idtutor=idtut;
                
		END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_actualizarYear`(IN idyea INT,
				yea varchar(10))
BEGIN 
	IF LENGTH(TRIM(yea))=0  THEN
		SELECT "FALTAN DATOS";
	ELSE
		UPDATE year SET year=yea
			WHERE idyear=idyea;
	END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_bajaAlumno`(IN matri int,
				FKesta int)
BEGIN 
	IF LENGTH(TRIM(matri))=0 THEN
		SELECT "INGRESE UNA MATRICULA POR FAVOR";
	ELSE
		UPDATE alumno SET idestatus=FKesta
			WHERE matricula=matri;
	END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_eliminarAdministrador`(idAdmin INT)
BEGIN
	IF LENGTH(TRIM(idAdmin))=0 THEN
		SELECT "Hacen falta un dato";
	ELSE
		DELETE FROM administrador WHERE idadministrador=idAdmin;
	END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_eliminarAlumno`(IN matri int)
BEGIN
	DELETE FROM alumno WHERE matricula=matri;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_eliminarBeca`(IN idbec int)
BEGIN
	DELETE FROM beca WHERE idbeca=idbec;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_eliminarCiclo`(IN cic int)
BEGIN
	DELETE FROM ciclo WHERE ciclo=cic;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_eliminarEscolaridad`(IN idesco int)
BEGIN
	DELETE FROM escolaridad WHERE idescolaridad=idesco;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_eliminarEstatus`(IN idesta int)
BEGIN
	DELETE FROM estatus WHERE idestatus=idesta;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_eliminargg`(IN idg int)
BEGIN
	DELETE FROM gg WHERE idgg=idg;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_eliminarPrivilegios`(idpriv INT)
BEGIN
	IF LENGTH(TRIM(idpriv))=0 THEN
        SELECT "Hacen falta un dato";
	ELSE
	DELETE FROM privilegios WHERE idprivilegios=idpriv;
	END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_eliminarSexo`(idsex INT)
BEGIN
	IF LENGTH(TRIM(idsex))=0 THEN
        SELECT "Faltan un dato";
	ELSE
		DELETE FROM sexo WHERE idsexo=idsex;
	END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_eliminarTutor`(IN idtut int)
BEGIN
	DELETE FROM tutor WHERE idtutor=idtut;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_eliminarYear`(IN idyea int)
BEGIN
	DELETE FROM year WHERE idyear=idyea;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertarAdministrador`(
	nom VARCHAR(45),
	a_pat VARCHAR(45),
	a_mat VARCHAR(45),
	pass VARCHAR(45),
	idpriv VARCHAR(45))
BEGIN
	DECLARE idadmin INT(11);
	IF LENGTH(TRIM(nom))=0 OR LENGTH(TRIM(a_pat))=0 OR LENGTH(TRIM(a_mat))=0 OR LENGTH(TRIM(pass))=0 OR LENGTH(TRIM(idpriv))=0 THEN
        SELECT "Hacen faltan datos";
    ELSE
        SET idadmin = (SELECT COUNT(idadministrador) FROM administrador WHERE nombre = nom AND a_paterno=a_pat AND a_materno=a_mat);
        IF idadmin >0 THEN
            SELECT  "El Administrador que desea registrar ya existe";
        ELSE
			INSERT INTO administrador VALUES(0,nom, a_pat, a_mat, pass, idpriv);
		END IF;
    END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertarAlumno`(IN matri int, 
				a_pa varchar(45),
				a_ma varchar(45),
				nom varchar(45),
				FKsex int,
				FKesta int,
				FKgg int,
				FKesco int,
				FKtut int,
				FKbec int)
BEGIN
		IF LENGTH(TRIM(matri))=0 or 
		LENGTH(TRIM(a_pa))=0 or 
		LENGTH(TRIM(a_ma))=0 or
  		LENGTH(TRIM(nom))=0 or 
		LENGTH(TRIM(FKsex))=0 or 
		LENGTH(TRIM(FKesta))=0 or 
		LENGTH(TRIM(FKgg))=0 or 
		LENGTH(TRIM(FKesco))=0 or 
		LENGTH(TRIM(FKtut))=0 
		THEN
			SELECT "FALTAN DATOS";
		ELSE

			INSERT INTO alumno VALUES (matri, a_pa, a_ma, nom, FKsex, FKesta, FKgg, FKesco, FKtut, FKbec);

		END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertarCiclo`(IN cic int, 
				ciclo varchar(10),
				FKyea int)
BEGIN
		IF LENGTH(TRIM(cic))=0 or 
		LENGTH(TRIM(ciclo))=0 or
		LENGTH(TRIM(FKyea))=0 
		THEN
			SELECT "FALTAN DATOS";
		ELSE
			UPDATE ciclo SET ciclo=cic, 
					idyear=FKyea
					WHERE ciclo=cic;
			
		END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertarEscolaridad`(IN escolaridad varchar(20))
BEGIN
		IF LENGTH(TRIM(escolaridad))=0  THEN
			SELECT "FALTAN DATOS";
		ELSE
			INSERT INTO Escolaridad VALUES (0, escolaridad);
		END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertarEstatus`(IN esta varchar(15))
BEGIN
		IF LENGTH(TRIM(esta))=0  THEN
			SELECT "FALTAN DATOS";
		ELSE
			INSERT INTO estatus VALUES (0, esta);
		END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertargg`(IN grado varchar(2),
				grupo varchar(2))
BEGIN 
	DECLARE cantidadg int;
		IF LENGTH(TRIM(grado))=0 
or LENGTH(TRIM(grupo))=0 THEN
	
	SELECT "FALTAN DATOS";
			
			ELSE
		SET cantidadg = (SELECT COUNT(idgg) FROM
gg WHERE grado=grado);

				IF cantidadg >0 THEN

SELECT "EL grupo ya esta registrado";
			ELSE 
				INSERT INTO gg VALUES (0, grado, grupo);
			END IF;
		END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertarPago`(
	me INT, 
	fechaact DATETIME, 
	fechalim DATETIME, 
	recar INT, 
	pag INT, 
	matri INT, 
	idadmin INT)
BEGIN
	INSERT INTO pago VALUES (0, me, fechaact, fechalim, recar, pag, matri, idadmin);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertarPrivilegios`(IN priv VARCHAR(45))
BEGIN
	DECLARE idpriv INT;
	IF LENGTH(TRIM(priv))=0 THEN
        SELECT "No se ha ingresado datos";
	ELSE
		SET idpriv = (SELECT COUNT(idprivilegios) FROM privilegios WHERE privilegios = priv);
        IF idpriv >0 THEN
		SELECT  "El privilegio ya existe";
        ELSE
           INSERT INTO privilegios VALUES (0,priv);
        END IF;
	END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertarSexo`(sex VARCHAR(45))
BEGIN
	DECLARE idsex INT;
	IF LENGTH(TRIM(sex))=0 THEN
        SELECT "Faltan ingresar el sexo";
    	ELSE
        SET idsex = (SELECT COUNT(idsexo) FROM sexo WHERE sexo=sex);
        IF idsex >0 THEN
            SELECT  "El sexo ya existe";
        ELSE
		INSERT INTO sexo VALUES (0,sex);
	   END IF;
   	END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertarTutor`(IN a_pa varchar(45),
				a_ma varchar(45),
				nom varchar(45),
				emi varchar(45),
				tel varchar(45))
BEGIN
	declare cantidadT int;
		IF LENGTH(TRIM(a_pa))=0 or LENGTH(TRIM(a_ma))=0 or  LENGTH(TRIM(nom))=0 or LENGTH(TRIM(emi))=0 or LENGTH(TRIM(tel))=0 THEN
			SELECT "FALTAN DATOS";
		ELSE
			SET cantidadT = (SELECT COUNT(idtutor) from tutor WHERE email=emi);
			IF cantidadT >0 THEN
				SELECT "El Tutor ya existe reitificar su email";
			ELSE 
				INSERT INTO tutor VALUES (0, a_pa, a_ma, nom, emi, tel);
			END IF;
		END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertarYear`(IN year varchar(10))
BEGIN
		IF LENGTH(TRIM(year))=0  THEN
			SELECT "FALTAN DATOS";
		ELSE
			INSERT INTO Year VALUES (1, year);
		END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_instertarBeca`(IN nom varchar(45),
				des int)
BEGIN

DECLARE cantidadBec INT;

	IF LENGTH(TRIM(nom))=0 or LENGTH(TRIM(des))=0  THEN
			SELECT "FALTAN DATOS";
		ELSE
			SET cantidadBec = (SELECT COUNT(idbeca) from beca WHERE descuento=des);
			IF cantidadBec>0 THEN
				SELECT "Este tipo de beca ya existe";
			ELSE 
				INSERT INTO beca VALUES(0, nom, des);
			END IF;
		END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_modificarAdministrador`(
	idAdmin INT,
	nom VARCHAR(45),
	a_pat VARCHAR(45),
	a_mat VARCHAR(45),
	pass VARCHAR(45),
	idpriv VARCHAR(45))
BEGIN
    	IF LENGTH(TRIM(idAdmin))=0 OR LENGTH(TRIM(nom))=0 OR LENGTH(TRIM(a_pat))=0 OR LENGTH(TRIM(a_mat))=0 OR LENGTH(TRIM(pass))=0 OR LENGTH(TRIM(idpriv))=0 THEN
        SELECT "Hacen faltan datos";
    ELSE
	UPDATE administrador SET nombre=nom, a_paterno=a_pat, a_materno=a_mat, password=pass, idprivilegios=idpriv WHERE idadministrador=idAdmin;
	END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_modificarPago`(
	fol INT,
	me INT, 
	fechaact DATETIME, 
	fechalim DATETIME, 
	recar INT, 
	pag INT, 
	matri INT, 
	idadmin INT)
BEGIN
	UPDATE pago SET mes=me, fechaactual=fechaact, fechalimite=fechalim, 
		recargos=recar, pago=pag, matricula=matri, idadministrador=idadmin 
		WHERE folio=fol;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_modificarPrivilegios`(idpriv INT, priv VARCHAR(45))
BEGIN
	IF LENGTH(TRIM(idpriv))=0 OR LENGTH(TRIM(priv))=0 THEN
        SELECT "Hacen falta datos";
	ELSE
		UPDATE privilegios SET privilegios=priv WHERE idprivilegios=idpriv;
	END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_modificarSexo`(idsex INT, sex VARCHAR(45))
BEGIN
	IF LENGTH(TRIM(idsex))=0 OR LENGTH(TRIM(sex))=0 THEN
        SELECT "Faltan datos";
	ELSE
		UPDATE sexo SET sexo=sex WHERE idsexo=idsex;
	END IF;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE IF NOT EXISTS `administrador` (
  `idadministrador` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `a_paterno` varchar(45) NOT NULL,
  `a_materno` varchar(45) NOT NULL,
  `password` varchar(20) NOT NULL,
  `idprivilegios` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`idadministrador`, `nombre`, `a_paterno`, `a_materno`, `password`, `idprivilegios`) VALUES
(1, 'Alejandro', 'TÃ©llez', 'Aguilera', '1234', 1),
(2, 'Alan ', 'Cordoba ', 'Espinosa', '1234', 2),
(3, 'Laura', 'Acevedo', 'Zarraga', '1234', 3),
(201522, 'miriam', 'martinez', 'jimenez', 'adf', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE IF NOT EXISTS `alumno` (
  `matricula` int(11) NOT NULL,
  `a_paterno` varchar(45) NOT NULL,
  `a_materno` varchar(45) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `idsexo` int(11) NOT NULL,
  `idestatus` int(11) NOT NULL,
  `idgg` int(11) NOT NULL,
  `idescolaridad` int(11) NOT NULL,
  `idtutor` int(11) NOT NULL,
  `idbeca` int(11) NOT NULL,
  `idgrado` int(11) NOT NULL,
  `idgrupo` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`matricula`, `a_paterno`, `a_materno`, `nombre`, `idsexo`, `idestatus`, `idgg`, `idescolaridad`, `idtutor`, `idbeca`, `idgrado`, `idgrupo`) VALUES
(2, 'Domingez', 'solis', 'Ana Alicia', 4, 1, 1, 1, 2, 3, 2, 'a'),
(12000304, 'Ruiz', 'Sanchez', 'Antonio', 2, 1, 2, 2, 4, 2, 0, '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `beca`
--

CREATE TABLE IF NOT EXISTS `beca` (
`idbeca` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `descuento` float(9,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `beca`
--

INSERT INTO `beca` (`idbeca`, `nombre`, `descuento`) VALUES
(1, 'parcial', 0.00),
(2, 'parcial2', 0.25),
(3, 'parcial3', 0.50),
(4, 'parcial4', 0.75),
(5, 'parcial5', 1.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciclo`
--

CREATE TABLE IF NOT EXISTS `ciclo` (
`idciclo` int(11) NOT NULL,
  `ciclo` varchar(25) NOT NULL,
  `idyear` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ciclo`
--

INSERT INTO `ciclo` (`idciclo`, `ciclo`, `idyear`) VALUES
(1, '1', 1),
(3, '2016-2017', 2),
(4, '2017-2018', 3),
(5, '2018-2019', 4),
(9, '6', 3),
(10, 'asdfsdf', 0),
(13, 'Agosto-Junio', 0);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `descuentopago`
--
CREATE TABLE IF NOT EXISTS `descuentopago` (
`matricula` int(11)
,`nombre` varchar(45)
,`a_paterno` varchar(45)
,`a_materno` varchar(45)
,`beca` varchar(45)
,`% de descuento` float(9,2)
,`pago` int(11)
);
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle`
--

CREATE TABLE IF NOT EXISTS `detalle` (
`iddetalle` int(11) NOT NULL,
  `idciclo` int(11) NOT NULL,
  `idgg` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detalle`
--

INSERT INTO `detalle` (`iddetalle`, `idciclo`, `idgg`) VALUES
(1, 3, 2),
(2, 4, 2);

--
-- Disparadores `detalle`
--
DELIMITER //
CREATE TRIGGER `tg_Detalle` AFTER INSERT ON `detalle`
 FOR EACH ROW BEGIN
    UPDATE gg SET grado = grado
        WHERE idciclo = gg_idciclo;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `escolaridad`
--

CREATE TABLE IF NOT EXISTS `escolaridad` (
`idescolaridad` int(11) NOT NULL,
  `escolaridad` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `escolaridad`
--

INSERT INTO `escolaridad` (`idescolaridad`, `escolaridad`) VALUES
(1, 'primaria'),
(2, 'preescolar'),
(3, 'preescolar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estatus`
--

CREATE TABLE IF NOT EXISTS `estatus` (
`idestatus` int(11) NOT NULL,
  `estatus` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estatus`
--

INSERT INTO `estatus` (`idestatus`, `estatus`) VALUES
(1, 'ACTIVO'),
(2, 'INACTIVO'),
(3, 'SOLICITUD');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gg`
--

CREATE TABLE IF NOT EXISTS `gg` (
`idgg` int(11) NOT NULL,
  `grado` varchar(2) NOT NULL,
  `grupo` varchar(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `gg`
--

INSERT INTO `gg` (`idgg`, `grado`, `grupo`) VALUES
(1, '1', 'A'),
(2, '6', 'A'),
(8, '2', 'C');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grado`
--

CREATE TABLE IF NOT EXISTS `grado` (
`idgrado` int(11) NOT NULL,
  `grado` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE IF NOT EXISTS `grupo` (
`idgrupo` int(11) NOT NULL,
  `grupo` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE IF NOT EXISTS `noticias` (
`idnoticia` int(11) NOT NULL,
  `titulo` varchar(75) NOT NULL,
  `autor` varchar(50) NOT NULL,
  `fecha` varchar(25) NOT NULL,
  `urlimagen` varchar(100) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE IF NOT EXISTS `pago` (
`folio` int(11) NOT NULL,
  `mes` varchar(25) NOT NULL,
  `fechaactual` datetime NOT NULL,
  `fechalimite` datetime NOT NULL,
  `recargos` int(11) NOT NULL,
  `pago` int(11) NOT NULL,
  `matricula` int(11) NOT NULL,
  `idadministrador` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pago`
--

INSERT INTO `pago` (`folio`, `mes`, `fechaactual`, `fechalimite`, `recargos`, `pago`, `matricula`, `idadministrador`) VALUES
(1, '1', '2015-08-04 00:00:00', '1900-08-03 00:00:00', 10, 1125, 12000304, 1),
(3, 'inscripcion', '2015-06-17 01:35:52', '2015-06-10 01:35:52', 35, 1535, 12000304, 1),
(4, 'inscripcion', '2015-06-17 01:53:20', '2015-06-10 01:53:20', 35, 1485, 2, 1),
(5, 'inscripcion', '2015-06-17 01:54:39', '2015-06-10 01:54:39', 35, 1535, 12000304, 1),
(6, 'agosto', '2015-06-17 01:54:39', '2015-06-10 01:54:39', 35, 1535, 12000304, 1),
(7, 'septiembre', '2015-06-17 01:54:39', '2015-06-10 01:54:39', 35, 1535, 12000304, 1),
(8, 'octubre', '2015-06-17 01:54:39', '2015-06-10 01:54:39', 35, 1535, 12000304, 1),
(9, 'noviembre', '2015-06-17 01:54:39', '2015-06-10 01:54:39', 35, 1535, 12000304, 1),
(10, 'diciembre', '2015-06-17 01:54:39', '2015-06-10 01:54:39', 35, 1535, 12000304, 1),
(11, 'inscripcion', '2015-06-17 06:35:53', '2015-06-10 06:35:53', 35, 1485, 2, 1),
(12, 'agosto', '2015-06-17 06:35:53', '2015-06-10 06:35:53', 35, 1485, 2, 1),
(13, 'inscripcion', '2015-06-17 06:38:13', '2015-06-10 06:38:13', 35, 1485, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `privilegios`
--

CREATE TABLE IF NOT EXISTS `privilegios` (
`idprivilegios` int(11) NOT NULL,
  `privilegios` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `privilegios`
--

INSERT INTO `privilegios` (`idprivilegios`, `privilegios`) VALUES
(1, 'Administrativo'),
(2, 'eliminar'),
(3, 'actualizar'),
(4, 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sexo`
--

CREATE TABLE IF NOT EXISTS `sexo` (
`idsexo` int(11) NOT NULL,
  `sexo` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sexo`
--

INSERT INTO `sexo` (`idsexo`, `sexo`) VALUES
(2, 'MASCULINO'),
(3, 'hombre'),
(4, 'mujer');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
`idslider` int(11) NOT NULL,
  `url` varchar(100) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `slider`
--

INSERT INTO `slider` (`idslider`, `url`, `nombre`) VALUES
(5, 'img/slides/slider1.jpg', 'slider1'),
(6, 'img/slides/slider2.jpg', 'slider2'),
(7, 'img/slides/slider3.jpg', 'slider3'),
(8, 'img/slides/slider4.jpg', 'slider4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tutor`
--

CREATE TABLE IF NOT EXISTS `tutor` (
`idtutor` int(11) NOT NULL,
  `a_paterno` varchar(45) NOT NULL,
  `a_materno` varchar(45) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `telefono` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tutor`
--

INSERT INTO `tutor` (`idtutor`, `a_paterno`, `a_materno`, `nombre`, `email`, `telefono`) VALUES
(2, 'Alcantar', 'Saucedo', 'Paula', 'ariespaula@outlook.com', '4214176890'),
(3, 'sanchez ', 'soto ', 'andrea', 'aries@hotmail.com', '4171098765'),
(4, 'as', 'as', 'as', 'as@g.com', '1232343'),
(5, 'as', 'as', 'as', 'as@g.com', '1232343'),
(6, 'as', 'as', 'as', 'as@g.com', '1232343'),
(7, 'as', 'as', 'as', 'as@g.com', '1232343'),
(8, 'as', 'as', 'as', 'as@as.com', '12345'),
(9, 'as', 'as', 'as', 'as@as.com', '12345'),
(10, 'demouser', 'demouser', 'demouser', 'demo@demo.com', '23456'),
(11, 'demouser', 'demouser', 'demouser', 'demouser@d.com', '123456789'),
(12, 'U', 'UYIO', 'GH', 'UI@HJ.COM', '890'),
(13, 'sdaf', 'asdf', 'asd', 'afds@g.com', '1234567890');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `year`
--

CREATE TABLE IF NOT EXISTS `year` (
  `idyear` int(11) NOT NULL,
  `year` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `year`
--

INSERT INTO `year` (`idyear`, `year`) VALUES
(0, '2015'),
(1, '2021'),
(2, '2017'),
(3, '2018'),
(4, '2019');

-- --------------------------------------------------------

--
-- Estructura para la vista `descuentopago`
--
DROP TABLE IF EXISTS `descuentopago`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `descuentopago` AS select `alumno`.`matricula` AS `matricula`,`alumno`.`nombre` AS `nombre`,`alumno`.`a_paterno` AS `a_paterno`,`alumno`.`a_materno` AS `a_materno`,`beca`.`nombre` AS `beca`,`beca`.`descuento` AS `% de descuento`,`pago`.`pago` AS `pago` from ((`beca` join `alumno` on((`beca`.`idbeca` = `alumno`.`idbeca`))) join `pago` on((`alumno`.`matricula` = `pago`.`matricula`)));

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
 ADD PRIMARY KEY (`idadministrador`), ADD KEY `idprivilegios_idx` (`idprivilegios`);

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
 ADD PRIMARY KEY (`matricula`), ADD KEY `idsexo_idx` (`idsexo`), ADD KEY `idgg_idx` (`idgg`), ADD KEY `idescolaridad_idx` (`idescolaridad`), ADD KEY `idbeca_idx` (`idbeca`), ADD KEY `idestatus` (`idestatus`), ADD KEY `idtutor` (`idtutor`), ADD KEY `idgrupo` (`idgrupo`), ADD KEY `idgrado` (`idgrado`), ADD KEY `idgrado_2` (`idgrado`), ADD KEY `idgrupo_2` (`idgrupo`), ADD KEY `idgrupo_3` (`idgrupo`), ADD KEY `idgrado_3` (`idgrado`);

--
-- Indices de la tabla `beca`
--
ALTER TABLE `beca`
 ADD PRIMARY KEY (`idbeca`);

--
-- Indices de la tabla `ciclo`
--
ALTER TABLE `ciclo`
 ADD PRIMARY KEY (`idciclo`), ADD KEY `idyear_idx` (`idyear`);

--
-- Indices de la tabla `detalle`
--
ALTER TABLE `detalle`
 ADD PRIMARY KEY (`iddetalle`), ADD KEY `idciclo_idx` (`idciclo`), ADD KEY `idgg_idx` (`idgg`);

--
-- Indices de la tabla `escolaridad`
--
ALTER TABLE `escolaridad`
 ADD PRIMARY KEY (`idescolaridad`);

--
-- Indices de la tabla `estatus`
--
ALTER TABLE `estatus`
 ADD PRIMARY KEY (`idestatus`);

--
-- Indices de la tabla `gg`
--
ALTER TABLE `gg`
 ADD PRIMARY KEY (`idgg`);

--
-- Indices de la tabla `grado`
--
ALTER TABLE `grado`
 ADD PRIMARY KEY (`idgrado`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
 ADD PRIMARY KEY (`idgrupo`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
 ADD PRIMARY KEY (`idnoticia`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
 ADD PRIMARY KEY (`folio`), ADD KEY `matricula` (`matricula`), ADD KEY `idadministrador` (`idadministrador`);

--
-- Indices de la tabla `privilegios`
--
ALTER TABLE `privilegios`
 ADD PRIMARY KEY (`idprivilegios`);

--
-- Indices de la tabla `sexo`
--
ALTER TABLE `sexo`
 ADD PRIMARY KEY (`idsexo`);

--
-- Indices de la tabla `slider`
--
ALTER TABLE `slider`
 ADD PRIMARY KEY (`idslider`);

--
-- Indices de la tabla `tutor`
--
ALTER TABLE `tutor`
 ADD PRIMARY KEY (`idtutor`);

--
-- Indices de la tabla `year`
--
ALTER TABLE `year`
 ADD PRIMARY KEY (`idyear`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `beca`
--
ALTER TABLE `beca`
MODIFY `idbeca` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `ciclo`
--
ALTER TABLE `ciclo`
MODIFY `idciclo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `detalle`
--
ALTER TABLE `detalle`
MODIFY `iddetalle` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `escolaridad`
--
ALTER TABLE `escolaridad`
MODIFY `idescolaridad` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `estatus`
--
ALTER TABLE `estatus`
MODIFY `idestatus` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `gg`
--
ALTER TABLE `gg`
MODIFY `idgg` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `grado`
--
ALTER TABLE `grado`
MODIFY `idgrado` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `grupo`
--
ALTER TABLE `grupo`
MODIFY `idgrupo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
MODIFY `idnoticia` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
MODIFY `folio` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `privilegios`
--
ALTER TABLE `privilegios`
MODIFY `idprivilegios` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `sexo`
--
ALTER TABLE `sexo`
MODIFY `idsexo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `slider`
--
ALTER TABLE `slider`
MODIFY `idslider` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `tutor`
--
ALTER TABLE `tutor`
MODIFY `idtutor` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrador`
--
ALTER TABLE `administrador`
ADD CONSTRAINT `idprivilegios` FOREIGN KEY (`idprivilegios`) REFERENCES `privilegios` (`idprivilegios`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `alumno`
--
ALTER TABLE `alumno`
ADD CONSTRAINT `idbeca` FOREIGN KEY (`idbeca`) REFERENCES `beca` (`idbeca`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `idescolaridad` FOREIGN KEY (`idescolaridad`) REFERENCES `escolaridad` (`idescolaridad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `idestatus` FOREIGN KEY (`idestatus`) REFERENCES `estatus` (`idestatus`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `idgg` FOREIGN KEY (`idgg`) REFERENCES `gg` (`idgg`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `idsexo` FOREIGN KEY (`idsexo`) REFERENCES `sexo` (`idsexo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `idtutor` FOREIGN KEY (`idtutor`) REFERENCES `tutor` (`idtutor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ciclo`
--
ALTER TABLE `ciclo`
ADD CONSTRAINT `idyear` FOREIGN KEY (`idyear`) REFERENCES `year` (`idyear`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalle`
--
ALTER TABLE `detalle`
ADD CONSTRAINT `dgg` FOREIGN KEY (`idgg`) REFERENCES `gg` (`idgg`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `idciclo` FOREIGN KEY (`idciclo`) REFERENCES `ciclo` (`idciclo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pago`
--
ALTER TABLE `pago`
ADD CONSTRAINT `idadministrador` FOREIGN KEY (`idadministrador`) REFERENCES `administrador` (`idadministrador`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `matricula` FOREIGN KEY (`matricula`) REFERENCES `alumno` (`matricula`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
