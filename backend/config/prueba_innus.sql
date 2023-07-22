-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-07-2023 a las 00:42:04
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prueba_innus`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `libro_cod` int(11) NOT NULL COMMENT 'codigo de libro',
  `libro_name` varchar(150) COLLATE utf8mb4_spanish_ci NOT NULL COMMENT 'nombre del libro',
  `libro_user` int(11) NOT NULL COMMENT 'usuario propietario del libro'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`libro_cod`, `libro_name`, `libro_user`) VALUES
(14, 'EL PRINCIPITO', 1),
(15, 'BLANCA NIEVES', 1),
(16, 'LAS MARAVILLAS ACUATICAS', 1);

--
-- Disparadores `libros`
--
DELIMITER $$
CREATE TRIGGER `log_insert_libro` AFTER INSERT ON `libros` FOR EACH ROW INSERT INTO log(log_accion,log_user)VALUES(concat('Se insertó nuevo libro :',new.libro_name,' y su id: ',new.libro_cod),CURRENT_USER())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `log_libro_delete` AFTER DELETE ON `libros` FOR EACH ROW INSERT INTO log(log_accion,log_user)VALUES(concat('Se eliminó libro :',old.libro_name,' y su id: ',old.libro_cod),CURRENT_USER())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `log_libro_update` AFTER UPDATE ON `libros` FOR EACH ROW INSERT INTO log(log_accion,log_user)VALUES(concat('Se actualizo libro :',old.libro_name,' a : ',new.libro_name,' y su id:',old.libro_cod),CURRENT_USER())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log`
--

CREATE TABLE `log` (
  `log_cod` int(11) NOT NULL,
  `log_accion` varchar(150) COLLATE utf8mb4_spanish_ci NOT NULL,
  `log_fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `log_user` varchar(150) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `log`
--

INSERT INTO `log` (`log_cod`, `log_accion`, `log_fecha`, `log_user`) VALUES
(2, 'Se actualizo libro :LA BELLA Y LA BESTIA a : LAS MARAVILLAS ACUATICAS y su id:16', '2023-07-22 16:34:38', 'root@localhost'),
(3, 'Se insertó nuevo libro :VIAJE AL CENTRO DE LA TIERRA y su id: 22', '2023-07-22 16:36:31', 'root@localhost'),
(4, 'Se actualizo libro :VIAJE AL CENTRO DE LA TIERRA a : VIAJE AL CENTRO DE LA TIERRA POR JULIO VERNE y su id:22', '2023-07-22 16:36:40', 'root@localhost'),
(5, 'Se eliminó libro :VIAJE AL CENTRO DE LA TIERRA POR JULIO VERNE y su id: 22', '2023-07-22 16:36:43', 'root@localhost'),
(6, 'Usuaro:Jose Luis su id :1 a iniciado sesión, en su sesión numero:3', '2023-07-22 16:46:58', 'root@localhost'),
(7, 'Usuaro:Jose Luis su id :1 a iniciado sesión, en su sesión numero:4', '2023-07-22 16:47:30', 'root@localhost');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `user_cod` int(11) NOT NULL COMMENT 'codigo de usuario',
  `user_name` varchar(150) COLLATE utf8mb4_spanish_ci NOT NULL COMMENT 'nombre de usuario',
  `user_email` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL COMMENT 'correo de usuario',
  `user_pass` varchar(150) COLLATE utf8mb4_spanish_ci NOT NULL COMMENT 'pass de usuario',
  `user_acceso` int(11) NOT NULL COMMENT 'contador de accesos'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`user_cod`, `user_name`, `user_email`, `user_pass`, `user_acceso`) VALUES
(1, 'Jose Luis', 'Jose__delgado@outlook.es', '123456', 4);

--
-- Disparadores `user`
--
DELIMITER $$
CREATE TRIGGER `los_session_user` AFTER UPDATE ON `user` FOR EACH ROW IF !(NEW.user_acceso <=> OLD.user_acceso)
            THEN 
              INSERT INTO log (log_accion,log_user)VALUES(concat('Usuaro:',old.user_name,' su id :',old.user_cod,' a iniciado sesión, en su sesión numero:',new.user_acceso),CURRENT_USER()) ;
        END IF
$$
DELIMITER ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`libro_cod`),
  ADD KEY `user_book` (`libro_user`);

--
-- Indices de la tabla `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`log_cod`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_cod`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `libro_cod` int(11) NOT NULL AUTO_INCREMENT COMMENT 'codigo de libro', AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `log`
--
ALTER TABLE `log`
  MODIFY `log_cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `user_cod` int(11) NOT NULL AUTO_INCREMENT COMMENT 'codigo de usuario', AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `user_book` FOREIGN KEY (`libro_user`) REFERENCES `user` (`USER_COD`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
