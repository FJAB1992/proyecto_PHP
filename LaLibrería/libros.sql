-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 12-03-2024 a las 23:05:57
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

DROP TABLE IF EXISTS `libros`;
CREATE TABLE IF NOT EXISTS `libros` (
  `id_libro` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) NOT NULL,
  `autor` varchar(100) NOT NULL,
  `genero` varchar(100) NOT NULL,
  `fecha_publicacion` date NOT NULL,
  `disponibilidad` tinyint(1) NOT NULL,
  `prestamo` int DEFAULT NULL,
  PRIMARY KEY (`id_libro`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id_libro`, `titulo`, `autor`, `genero`, `fecha_publicacion`, `disponibilidad`, `prestamo`) VALUES
(1, 'El alquimista', 'Paulo Coelho', 'Ficción', '1988-01-01', 1, 0),
(2, 'Cien años de soledad', 'Gabriel García Márquez', 'Realismo mágico', '1967-05-30', 1, 0),
(3, '1984', 'George Orwell', 'Distopía', '1949-06-08', 1, 0),
(4, 'Harry Potter y la piedra filosofal', 'J.K. Rowling', 'Fantasía', '1997-06-26', 1, 0),
(5, 'Orgullo y prejuicio', 'Jane Austen', 'Clásico', '1813-01-28', 1, 0),
(6, 'Don Quijote de la Mancha', 'Miguel de Cervantes', 'Novela', '1605-01-01', 1, 0),
(7, 'Matar a un ruiseñor', 'Harper Lee', 'Ficción', '1960-07-11', 1, 0),
(8, 'La metamorfosis', 'Franz Kafka', 'Ficción', '1915-10-15', 1, 0),
(9, 'Crimen y castigo', 'Fyodor Dostoevsky', 'Novela', '1866-01-01', 1, 0),
(10, 'El principito', 'Antoine de Saint-Exupéry', 'Infantil', '1943-04-06', 1, 0),
(11, 'ddsdsdsds', 'd', 'd', '0000-00-00', 1, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
