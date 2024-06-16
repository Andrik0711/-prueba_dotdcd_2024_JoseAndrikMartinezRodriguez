-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 16-06-2024 a las 22:34:53
-- Versión del servidor: 8.2.0
-- Versión de PHP: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `employee_management`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `employees`
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE IF NOT EXISTS `employees` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `birth_date` date NOT NULL,
  `rfc` varchar(13) NOT NULL,
  `user_type` enum('admin','employee','sales_executive') NOT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `employees`
--

INSERT INTO `employees` (`id`, `name`, `phone`, `email`, `password`, `birth_date`, `rfc`, `user_type`, `status`, `created_at`, `updated_at`) VALUES
(8, 'Kency Green', '6549873210', 'kency@gmail.com', '$2y$10$sFoKrBYktIGai3h/YCDQW.lbDtCDhv0z/m7Q1jwSwgbPxpunsxVfi', '1994-04-18', '1234567890123', 'sales_executive', 'active', '2024-06-15 21:55:38', '2024-06-16 22:18:35'),
(9, 'Marisol Taylor', '6549873210', 'marisol@gmail.com', '$2y$10$yB6K8VHncrHRpaUe.nyI2e8vEDi8oi80g0isQ7Lhopnkn2wdThp6S', '1994-04-18', '1111111111111', 'admin', 'inactive', '2024-06-16 21:02:00', '2024-06-16 22:18:34'),
(7, 'Yanel Taylor', '6549873210', 'yanel@gmail.com', '$2y$10$XUB4uL9ICuMatdaLWpFmQuNIsMzhTP4/xnx3Ng20nvb3mOepB4vH.', '1994-04-18', '1234567890123', 'employee', 'active', '2024-06-15 21:55:05', '2024-06-16 22:18:33'),
(6, 'Andrik Yellow', '6549873210', 'andrik@gmail.com', '$2y$10$q5qBjq73m/PajTxPd2npj.CsmjgseD/vEFG1XGTnFJiyI6.M86.Ce', '1994-04-18', '32132123132', 'admin', 'active', '2024-06-15 21:49:50', '2024-06-16 22:18:40'),
(10, 'Jhovan Gray', '8341450917', 'jhovan@gmail.com', '$2y$10$WgylGC9XjuR1o7Dz9wpieehOeGunsgBukouRohVWGPT0LkWJFRPSW', '1994-04-18', '1111111111111', 'admin', 'inactive', '2024-06-16 22:02:26', '2024-06-16 22:18:29'),
(11, 'Daniel Davies', '6549873210', 'daniel@gmail.com', '$2y$10$rL5yp1SOG6zpC6ZkMz1N0Ov5uZ5MrDiD/VxYUjp515P7y9Mq0dW46', '1994-04-18', '1111111111111', 'admin', 'active', '2024-06-16 22:04:36', '2024-06-16 22:18:32'),
(32, 'Olivia Taylor', '6549873210', 'olivia@example.com', '$2y$10$Y3FJtUwYlBcz95Z3BcT9lOwobpPyW5NC1vhATNcKh4lLB8Gj2gTr2', '1994-04-18', 'CDEF123456789', 'employee', 'inactive', '2024-06-16 22:16:21', '2024-06-16 22:16:21'),
(31, 'David Martinez', '8529637410', 'david@example.com', '$2y$10$Y3FJtUwYlBcz95Z3BcT9lOwobpPyW5NC1vhATNcKh4lLB8Gj2gTr2', '1987-09-12', 'YZAB123456789', 'admin', 'active', '2024-06-16 22:16:21', '2024-06-16 22:16:21'),
(30, 'Sophia Wilson', '7852149630', 'sophia@example.com', '$2y$10$Y3FJtUwYlBcz95Z3BcT9lOwobpPyW5NC1vhATNcKh4lLB8Gj2gTr2', '1991-02-05', 'UVWX123456789', 'sales_executive', 'inactive', '2024-06-16 22:16:21', '2024-06-16 22:16:21'),
(29, 'Michael Davis', '3692581470', 'michael@example.com', '$2y$10$Y3FJtUwYlBcz95Z3BcT9lOwobpPyW5NC1vhATNcKh4lLB8Gj2gTr2', '1995-07-30', 'QRST123456789', 'employee', 'active', '2024-06-16 22:16:21', '2024-06-16 22:16:21'),
(28, 'Emma Brown', '1597534680', 'emma@example.com', '$2y$10$Y3FJtUwYlBcz95Z3BcT9lOwobpPyW5NC1vhATNcKh4lLB8Gj2gTr2', '1988-11-20', 'MNOP123456789', 'admin', 'inactive', '2024-06-16 22:16:21', '2024-06-16 22:16:21'),
(27, 'Bob Johnson', '7418529630', 'bob@example.com', '$2y$10$Y3FJtUwYlBcz95Z3BcT9lOwobpPyW5NC1vhATNcKh4lLB8Gj2gTr2', '1992-03-10', 'IJKL123456789', 'sales_executive', 'active', '2024-06-16 22:16:21', '2024-06-16 22:16:21'),
(26, 'Alice Smith', '9876543210', 'alice@example.com', '$2y$10$Y3FJtUwYlBcz95Z3BcT9lOwobpPyW5NC1vhATNcKh4lLB8Gj2gTr2', '1985-08-25', 'EFGH123456789', 'employee', 'active', '2024-06-16 22:16:21', '2024-06-16 22:16:21'),
(25, 'John Doe', '1234567890', 'john@example.com', '$2y$10$Y3FJtUwYlBcz95Z3BcT9lOwobpPyW5NC1vhATNcKh4lLB8Gj2gTr2', '1990-05-15', 'ABCD123456789', 'admin', 'active', '2024-06-16 22:16:21', '2024-06-16 22:16:21'),
(33, 'William Anderson', '9871236540', 'william@example.com', '$2y$10$Y3FJtUwYlBcz95Z3BcT9lOwobpPyW5NC1vhATNcKh4lLB8Gj2gTr2', '1993-01-07', 'GHIJ123456789', 'sales_executive', 'active', '2024-06-16 22:16:21', '2024-06-16 22:16:21'),
(34, 'Ava Thomas', '8523697410', 'ava@example.com', '$2y$10$Y3FJtUwYlBcz95Z3BcT9lOwobpPyW5NC1vhATNcKh4lLB8Gj2gTr2', '1989-06-23', 'KLMN123456789', 'admin', 'active', '2024-06-16 22:16:21', '2024-06-16 22:16:21'),
(35, 'Cesar Gray', '6549873210', 'cesar@gmail.com', '$2y$10$r1CtQdJyZYt.Ns4R/sbZFebLFgjp7vYvb89I19k9hbn90iuamr/1C', '1999-06-16', 'IJKL123456', 'employee', 'active', '2024-06-16 22:32:24', '2024-06-16 22:33:41');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
