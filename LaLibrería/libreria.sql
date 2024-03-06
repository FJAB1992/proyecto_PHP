-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 04-03-2024 a las 15:56:10
-- Versión del servidor: 8.0.31
-- Versión de PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `libreria`
--

CREATE DATABASE IF NOT EXISTS libreria;
USE libreria;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE IF NOT EXISTS `libros` (
  `id_libro` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) NOT NULL,
  `autor` varchar(100) NOT NULL,
  `genero` varchar(100) NOT NULL,
  `fecha_publicacion` date NOT NULL,
  `disponibilidad` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_libro`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id_libro`, `titulo`, `autor`, `genero`, `fecha_publicacion`, `disponibilidad`) VALUES
(1, 'El alquimista', 'Paulo Coelho', 'Ficción', '1988-01-01', 1),
(2, 'Cien años de soledad', 'Gabriel García Márquez', 'Realismo mágico', '1967-05-30', 1),
(3, '1984', 'George Orwell', 'Distopía', '1949-06-08', 1),
(4, 'Harry Potter y la piedra filosofal', 'J.K. Rowling', 'Fantasía', '1997-06-26', 1),
(5, 'Orgullo y prejuicio', 'Jane Austen', 'Clásico', '1813-01-28', 1),
(6, 'Don Quijote de la Mancha', 'Miguel de Cervantes', 'Novela', '1605-01-01', 1),
(7, 'Matar a un ruiseñor', 'Harper Lee', 'Ficción', '1960-07-11', 1),
(8, 'La metamorfosis', 'Franz Kafka', 'Ficción', '1915-10-15', 1),
(9, 'Crimen y castigo', 'Fyodor Dostoevsky', 'Novela', '1866-01-01', 1),
(10, 'El principito', 'Antoine de Saint-Exupéry', 'Infantil', '1943-04-06', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguridad`
--

DROP TABLE IF EXISTS `seguridad`;
CREATE TABLE IF NOT EXISTS `seguridad` (
  `contraseña` varchar(100) NOT NULL,
  PRIMARY KEY (`contraseña`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `seguridad` (`contraseña`) VALUES
('w2vsH2iE');
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contraseña` varchar(100) NOT NULL,
  `rol` varchar(10) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `email`, `contraseña`, `rol`) VALUES
(1, 'Admin1', 'admin1@example.com', 'admin123', 'admin'),
(2, 'Admin2', 'admin2@example.com', 'admin456', 'admin'),
(3, 'User1', 'user1@example.com', 'user123', 'user'),
(4, 'User2', 'user2@example.com', 'user456', 'user'),
(5, 'User3', 'user3@example.com', 'user789', 'user'),
(6, 'User4', 'user4@example.com', 'user012', 'user'),
(7, 'User5', 'user5@example.com', 'user345', 'user'),
(8, 'User6', 'user6@example.com', 'user678', 'user'),
(9, 'User7', 'user7@example.com', 'user901', 'user'),
(10, 'User8', 'user8@example.com', 'user234', 'user');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
