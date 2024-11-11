-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 10-11-2024 a las 17:35:46
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gimnasio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nombre_cliente` varchar(50) NOT NULL,
  `apellido_cliente` varchar(50) NOT NULL,
  `dni_cliente` int(9) NOT NULL,
  `fechaNac_cliente` date NOT NULL,
  `direccion_cliente` varchar(50) NOT NULL,
  `telefono_cliente` int(11) NOT NULL,
  `email_cliente` varchar(50) NOT NULL,
  `fechaIns_cliente` date NOT NULL,
  `id_plan` int(11) NOT NULL,
  `id_estado_memb` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombre_cliente`, `apellido_cliente`, `dni_cliente`, `fechaNac_cliente`, `direccion_cliente`, `telefono_cliente`, `email_cliente`, `fechaIns_cliente`, `id_plan`, `id_estado_memb`) VALUES
(1, 'EDITADO', 'EDITADO PRIMER EDIT', 44555666, '1999-01-01', 'DIRECCION EDITADA', 1111111, 'editado@primeredit.com', '2024-01-01', 1, 1),
(2, 'Alberto', 'Example', 44555666, '2000-02-01', 'Calle Nunca Viva 321', 3333444, 'example@client.com', '2024-01-02', 1, 1),
(3, 'Pedro', 'Primeragregar', 33444555, '2003-02-03', 'Calle al lado de siempre viva 111', 4449955, 'hola@quetal.com', '2024-02-03', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrenadores`
--

CREATE TABLE `entrenadores` (
  `id_entrenador` int(11) NOT NULL,
  `nombre_entrenador` varchar(50) NOT NULL,
  `apellido_entrenador` varchar(50) NOT NULL,
  `dni_entrenador` int(9) NOT NULL,
  `fechaContr_entrenador` date NOT NULL,
  `email_entrenador` varchar(50) NOT NULL,
  `telefono_entrenador` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL,
  `id_especialidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `entrenadores`
--

INSERT INTO `entrenadores` (`id_entrenador`, `nombre_entrenador`, `apellido_entrenador`, `dni_entrenador`, `fechaContr_entrenador`, `email_entrenador`, `telefono_entrenador`, `id_estado`, `id_especialidad`) VALUES
(1, 'Pepetrainer', 'Pesoslibres', 48492444, '2024-02-01', 'trainer@pesas.com', 22334, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidades`
--

CREATE TABLE `especialidades` (
  `id_especialidad` int(11) NOT NULL,
  `nombre_especialidad` varchar(50) NOT NULL,
  `descrip_especialidad` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `especialidades`
--

INSERT INTO `especialidades` (`id_especialidad`, `nombre_especialidad`, `descrip_especialidad`) VALUES
(1, 'Body Building', 'Especialidad centrada en la hipertrofia muscular.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados_entrenadores`
--

CREATE TABLE `estados_entrenadores` (
  `id_estado_ent` int(11) NOT NULL,
  `estado_ent` varchar(20) NOT NULL,
  `desc_estado_ent` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estados_entrenadores`
--

INSERT INTO `estados_entrenadores` (`id_estado_ent`, `estado_ent`, `desc_estado_ent`) VALUES
(1, 'Activo', 'Al dia de la fecha, el entrenador imparte clases'),
(2, 'Inactivo', 'Al dia de la fecha, el entrenador no imparte clases');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados_membresias`
--

CREATE TABLE `estados_membresias` (
  `id_estado_memb` int(11) NOT NULL,
  `estado_memb` varchar(20) NOT NULL,
  `desc_estado_memb` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estados_membresias`
--

INSERT INTO `estados_membresias` (`id_estado_memb`, `estado_memb`, `desc_estado_memb`) VALUES
(1, 'Activo', 'El cliente esta habilitado a usar las instalaciones'),
(2, 'Inactivo', 'El cliente no esta habilitado a usar las instalaciones');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados_pago`
--

CREATE TABLE `estados_pago` (
  `id_estado_pago` int(11) NOT NULL,
  `estado_pago` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estados_pago`
--

INSERT INTO `estados_pago` (`id_estado_pago`, `estado_pago`) VALUES
(1, 'Realizado'),
(2, 'Denegado'),
(3, 'En espera');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodopago`
--

CREATE TABLE `metodopago` (
  `id_metodoPago` int(11) NOT NULL,
  `nombre_metodoPago` varchar(50) NOT NULL,
  `descrip_metodoPago` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `metodopago`
--

INSERT INTO `metodopago` (`id_metodoPago`, `nombre_metodoPago`, `descrip_metodoPago`) VALUES
(1, 'Débito', 'Tarjetas de débito'),
(2, 'Crédito', 'Tarjetas de crédito'),
(3, 'Transferencia', 'Transferencias bancarias'),
(4, 'Efectivo', 'Dinero en efectivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id_pago` int(11) NOT NULL,
  `fecha_pago` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `monto_pago` decimal(10,2) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_clase` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL,
  `id_metodopago` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id_pago`, `fecha_pago`, `monto_pago`, `id_cliente`, `id_clase`, `id_estado`, `id_metodopago`) VALUES
(1, '2024-11-08 21:13:36', 1000.00, 1, 1, 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plan`
--

CREATE TABLE `plan` (
  `id_plan` int(11) NOT NULL,
  `descrip_plan` text NOT NULL,
  `cod_plan` int(11) NOT NULL,
  `duracion_plan` tinyint(4) NOT NULL,
  `sesiones_semanales_plan` int(11) NOT NULL,
  `nombre_plan` varchar(50) NOT NULL,
  `id_entrenador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `plan`
--

INSERT INTO `plan` (`id_plan`, `descrip_plan`, `cod_plan`, `duracion_plan`, `sesiones_semanales_plan`, `nombre_plan`, `id_entrenador`) VALUES
(1, 'Centrado en rutinas báscias para los principiantes', 10, 4, 3, 'Musculación básica', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(100) NOT NULL,
  `email_usuario` varchar(100) NOT NULL,
  `password_usuario` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre_usuario`, `email_usuario`, `password_usuario`) VALUES
(1, 'admin', 'admin@example.com', '$5$rounds=5000$tsegfysefuisehfu$ff4dw8QrffAN6GGIPEOhUHuCGWG8FQIOGZkPN8WSgr6');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `planid` (`id_plan`),
  ADD KEY `estadoid` (`id_estado_memb`);

--
-- Indices de la tabla `entrenadores`
--
ALTER TABLE `entrenadores`
  ADD PRIMARY KEY (`id_entrenador`),
  ADD KEY `estid` (`id_estado`),
  ADD KEY `especialidadid` (`id_especialidad`);

--
-- Indices de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  ADD PRIMARY KEY (`id_especialidad`);

--
-- Indices de la tabla `estados_entrenadores`
--
ALTER TABLE `estados_entrenadores`
  ADD PRIMARY KEY (`id_estado_ent`);

--
-- Indices de la tabla `estados_membresias`
--
ALTER TABLE `estados_membresias`
  ADD PRIMARY KEY (`id_estado_memb`);

--
-- Indices de la tabla `estados_pago`
--
ALTER TABLE `estados_pago`
  ADD PRIMARY KEY (`id_estado_pago`);

--
-- Indices de la tabla `metodopago`
--
ALTER TABLE `metodopago`
  ADD PRIMARY KEY (`id_metodoPago`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id_pago`),
  ADD KEY `idcliente` (`id_cliente`),
  ADD KEY `idclase` (`id_clase`),
  ADD KEY `statusid` (`id_estado`),
  ADD KEY `idmetodopago` (`id_metodopago`);

--
-- Indices de la tabla `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`id_plan`),
  ADD UNIQUE KEY `cod_plan` (`cod_plan`),
  ADD KEY `entrenadorid` (`id_entrenador`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email_usuario` (`email_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `entrenadores`
--
ALTER TABLE `entrenadores`
  MODIFY `id_entrenador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  MODIFY `id_especialidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `estados_entrenadores`
--
ALTER TABLE `estados_entrenadores`
  MODIFY `id_estado_ent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `estados_membresias`
--
ALTER TABLE `estados_membresias`
  MODIFY `id_estado_memb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `estados_pago`
--
ALTER TABLE `estados_pago`
  MODIFY `id_estado_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `metodopago`
--
ALTER TABLE `metodopago`
  MODIFY `id_metodoPago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `plan`
--
ALTER TABLE `plan`
  MODIFY `id_plan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `estadoid` FOREIGN KEY (`id_estado_memb`) REFERENCES `estados_membresias` (`id_estado_memb`),
  ADD CONSTRAINT `planid` FOREIGN KEY (`id_plan`) REFERENCES `plan` (`id_plan`);

--
-- Filtros para la tabla `entrenadores`
--
ALTER TABLE `entrenadores`
  ADD CONSTRAINT `especialidadid` FOREIGN KEY (`id_especialidad`) REFERENCES `especialidades` (`id_especialidad`),
  ADD CONSTRAINT `estid` FOREIGN KEY (`id_entrenador`) REFERENCES `estados_entrenadores` (`id_estado_ent`);

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `idcliente` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`),
  ADD CONSTRAINT `idmetodopago` FOREIGN KEY (`id_metodopago`) REFERENCES `metodopago` (`id_metodoPago`),
  ADD CONSTRAINT `statusid` FOREIGN KEY (`id_estado`) REFERENCES `estados_membresias` (`id_estado_memb`);

--
-- Filtros para la tabla `plan`
--
ALTER TABLE `plan`
  ADD CONSTRAINT `entrenadorid` FOREIGN KEY (`id_entrenador`) REFERENCES `entrenadores` (`id_entrenador`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
