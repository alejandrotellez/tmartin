-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-06-2015 a las 00:47:13
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
(12000304, 'Ruiz', 'Sanchez', 'Antonio', 2, 1, 2, 2, 4, 2, 0, '0'),
(12000305, 'sanches', 'adsfa', 'juana ', 4, 3, 1, 1, 2, 1, 1, 'a'),
(12000306, 'sanches', 'adsfa', 'juana ', 4, 3, 1, 1, 2, 1, 1, 'a'),
(12000307, 'sanches', 'adsfa', 'juana ', 4, 3, 1, 1, 2, 1, 1, 'a'),
(12000308, 'asdf', 'daf', 'dfds', 3, 3, 1, 1, 15, 1, 1, 'a');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`idnoticia`, `titulo`, `autor`, `fecha`, `urlimagen`, `descripcion`) VALUES
(5, 'Dia del NiÃ±o', 'alejandro', 'June 27, 2015', 'img/noticias/19.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas dolorum, vero non magnam tempora. At in dolore cum, aliquid voluptas nam architecto expedita nostrum iusto assumenda ea natus, iure tempore praesentium reiciendis accusantium odit deleniti placeat veritatis. Sapiente iure ducimus iste error, saepe molestias accusantium praesentium placeat eius amet fuga voluptate ad repellendus dicta voluptas necessitatibus asperiores reprehenderit quam facilis molestiae non quidem impedit. Dolores, similique, voluptatum! Iusto itaque deserunt ullam, soluta quibusdam ea nesciunt harum veniam necessitatibus doloremque assumenda! Dolorum possimus nesciunt eius odio excepturi, vitae animi nulla. Ducimus ex eius adipisci qui nemo maxime consequatur nisi, labore, vel rem nostrum fugit delectus! Earum quaerat dolor debitis consequatur est facilis dolore voluptatem nihil ad, quo ut repellendus nobis asperiores saepe minus placeat perspiciatis ');

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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

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
(13, 'sdaf', 'asdf', 'asd', 'afds@g.com', '1234567890'),
(14, 'igual', 'igual', 'su mama', 'nose@se.com', '1234567890'),
(15, 'mama', 'mama', 'mama', 'ma@mq.com', '1230923893');

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
MODIFY `idnoticia` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
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
MODIFY `idtutor` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
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
