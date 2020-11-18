-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-10-2020 a las 19:14:39
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `reberzza`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `productos_temp` (IN `idprod` INT, IN `cantidad` INT)  BEGIN
    	
        DECLARE precio decimal(10,2);
        SELECT precio INTO precio FROM productos WHERE idprod = idprod;
        
        INSERT INTO detalle_temp(idprod,cantidad,precio) VALUES(idprod,cantidad,precio);
        
        SELECT tmp.correlativo,tmp.idprod,productos.descripcion,tmp.cantidad,productos.precio FROM detalle_temp tmp INNER JOIN productos WHERE tmp.idprod = idprod;
        
        END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `idnota` int(10) NOT NULL,
  `obs` varchar(250) NOT NULL,
  `envio` decimal(10,2) NOT NULL,
  `redex` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `status_fin` tinyint(4) NOT NULL,
  `status_sup` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idprod` int(10) NOT NULL,
  `idnota` int(10) NOT NULL,
  `cantidad` int(10) NOT NULL,
  `descripcion` int(100) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `importe` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `idrol` int(10) NOT NULL,
  `rol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`idrol`, `rol`) VALUES
(1, 'Administrador'),
(2, 'Supervisión'),
(3, 'Finanzas'),
(4, 'Vendedor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `iduser` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `rol` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`iduser`, `nombre`, `email`, `password`, `rol`) VALUES
(1, 'adminx', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 1),
(59, 'Karla Aimé Medina Ku', 'aime370@hotmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 2),
(60, 'fea', 'fea@mail.com', 'fc7588193f4e8e5b919d203d2734c58b', 2),
(61, 'KARLA AIME', 'ai370@hotmail.com', 'c21dd89d926c7fba6f4e60e2baf74963', 3),
(62, 'Karla Aimé Medina Ku', 'e370@hotmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 4),
(63, 'IRENE', 'aiE4@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e', 4),
(64, 'aieme', 'ema@e.com', '827ccb0eea8a706c4c34a16891f84e7b', 2),
(65, 'are', 'ai0@hotmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 2),
(66, 'IRENE', 'ai30@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e', 2),
(67, 'IRENE', 'ai70@hotmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 2),
(68, 'nombre', 'email@.com', 'd41d8cd98f00b204e9800998ecf8427e', 2),
(69, 'IRENE', 're@kjf.com', 'ad3db32e68918bb743ee6d14c1756544', 3),
(70, 'feo', 'fea@jik.com', '21232f297a57a5a743894a0e4a801fc3', 2),
(71, 'bb', 'bb@kfvd.com', 'a207cc3265cf2ad4a115c0c7589e8648', 3),
(72, 'bb', 'fvervdjnvjd@dkms.com', 'ae7a643bb1e47cdea4bafa693d462196', 2),
(73, 'arf', 'dvs@niam.com', '26c8b044ee0b58dbd63f0162b5a6d52d', 3),
(74, 'bb', 'bb@hotmail.com', '962012d09b8170d912f0669f6d7d9d07', 3),
(75, 'IRENE FEA', 'gre@hotmail.com', '9391f80839e3785f2b10d013a52b79dd', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`idnota`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idprod`),
  ADD KEY `idnota` (`idnota`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idrol`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`iduser`),
  ADD KEY `rol` (`rol`),
  ADD KEY `nombre` (`nombre`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `idnota` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idprod` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`rol`) REFERENCES `roles` (`idrol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
