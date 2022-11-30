-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-11-2022 a las 17:30:29
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `needpc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `category` varchar(5) DEFAULT NULL,
  `category_name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`category`, `category_name`) VALUES
('CPU', 'processors'),
('GPU', 'Graphic_card'),
('MOBO', 'Motherboard'),
('PSU', 'Power_supply_unit'),
('RAM', 'ram_memory'),
('STO', 'storage_unit');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `graphic_cards`
--

CREATE TABLE `graphic_cards` (
  `id_gpu` int(11) NOT NULL,
  `brand` varchar(20) NOT NULL,
  `model` varchar(50) NOT NULL,
  `gpu_chip` varchar(12) NOT NULL,
  `bus` varchar(15) NOT NULL,
  `memory` int(11) NOT NULL,
  `memory_tech` varchar(15) NOT NULL,
  `gpu_clock` int(11) NOT NULL,
  `memory_clock` int(11) NOT NULL,
  `shaders` int(11) NOT NULL,
  `consumtion` int(11) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `score` double DEFAULT NULL,
  `Compatibility` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `graphic_cards`
--

INSERT INTO `graphic_cards` (`id_gpu`, `brand`, `model`, `gpu_chip`, `bus`, `memory`, `memory_tech`, `gpu_clock`, `memory_clock`, `shaders`, `consumtion`, `price`, `score`, `Compatibility`, `created_at`) VALUES
(1, 'ATI', 'Radeon HD 4770', 'RV747', 'PCIe 2.0 x16', 512, 'GSSR5', 750, 800, 640, 152, 37, 4.7, 'AMD', '2022-11-26 23:52:11'),
(2, 'Gigabyte', 'NVIDIA GeForce GT 730', 'GK208B', 'PCIe 2.0 x16', 2048, 'DDR3', 902, 5010, 384, 300, 79, 4.2, 'NVIDIA', '2022-11-26 23:51:50'),
(3, 'MSI', 'NVIDIA GeForce GT 710', 'GK208B', 'PCIe 2.0 x16', 2048, 'GDDR3', 954, 900, 192, 200, 60, 4.3, 'NVIDIA', '2022-11-26 23:51:56'),
(4, 'AMD', 'Radeon RX 550 Pulse', 'Navi 14', 'PCIe 4.0 x8', 4096, 'GDDR5', 1607, 1750, 1408, 300, 169, 4.6, 'AMD', '2022-11-26 23:52:01'),
(5, 'ZOTAC', 'RTX 3070 Ti Trinity', 'GA104', 'PCIe 4.0 x16', 8192, 'GDDR6X', 1575, 1188, 6144, 600, 740, 4.9, 'NVIDIA', '2022-11-26 23:53:26'),
(6, 'MSI', 'NVIDIA GeForce RTX 3060 VENTUS 2X OC LHR', 'GA196', 'PCIe 4,0 x16', 12288, 'GDRR6', 1320, 1875, 3584, 450, 500, 4.8, 'NVIDIA', '2022-11-26 23:52:27'),
(7, 'Gigabyte', 'GT 730 2 GB Rev 3.0', 'GK208B', 'PCIe 2.0 x8', 2048, 'GDDR3', 902, 800, 384, 200, 80, 4.4, 'NVIDIA', '2022-11-26 23:54:03'),
(8, 'Gigabyte', 'RZ 6600 EAGLE', 'Navi 23', 'PCIe 4.0 x8', 8192, 'GDDR6', 1626, 1750, 1792, 300, 400, 4.7, 'AMD', '2022-11-26 23:54:53'),
(9, 'PowerColor', 'Fighter RX 6600', 'Navi 23', 'PCIe 4.0 x8', 8192, 'GDDR6', 1626, 1750, 1792, 300, 336, 4.5, 'AMD', '2022-11-26 23:52:40'),
(10, 'MSI', 'RTX 3050 GAMING X', 'GA106', 'PCIe 4.0 x8', 8192, 'GDDR6', 1552, 1750, 2560, 300, 392, 4.7, 'NVIDIA', '2022-11-26 23:55:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `motherboards`
--

CREATE TABLE `motherboards` (
  `id_motherboard` int(11) NOT NULL,
  `brand` varchar(20) DEFAULT NULL,
  `model` varchar(50) DEFAULT NULL,
  `size` varchar(10) DEFAULT NULL,
  `socket` varchar(10) DEFAULT NULL,
  `bus` varchar(15) DEFAULT NULL,
  `ram_slots` int(11) DEFAULT NULL,
  `technology` varchar(5) DEFAULT NULL,
  `ram_frequency` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `score` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `motherboards`
--

INSERT INTO `motherboards` (`id_motherboard`, `brand`, `model`, `size`, `socket`, `bus`, `ram_slots`, `technology`, `ram_frequency`, `price`, `score`) VALUES
(1, 'Gigabyte', 'B550M DS3H', 'Micro ATX', 'AM4', 'PCIe 4', 4, 'DDR4', 3600, 140, 4.7),
(2, 'MSI', 'B550-A PRO', 'ATX', 'AM4', 'PCIe 4', 4, 'DDRA', 4400, 140, 4.6),
(3, 'ASUS', 'A520M-A II', 'Micro ATX', 'AM4', 'PCIe 3', 4, 'DDR4', 4400, 80, 4.6),
(4, 'MSI', 'B450M PRO-VDH Max', 'Micro ATX', 'AM4', 'PCIe 3', 4, 'DDR4', 2133, 84, 4.6),
(5, 'Gigabyte', 'B450M AOURUS M', 'Micro ATX', 'AM4', 'PCIe 3', 4, 'DDR4', 3600, 105, 4.6),
(6, 'ASUS', 'B45M-A II', 'Micro ATX', 'AM4', NULL, 4, 'DDR4', 2400, 114, 4.6),
(7, 'ASUS', 'Prime H510M-E  ', 'Micro ATX', 'LGA1200', 'PCIe 4', 2, 'DDR4', 3200, 96, 4.6),
(8, 'Gigabyte', 'B560M DS3H', 'Micro ATX', 'LGA 1200', 'PCIe 4', 4, 'DDR4', 5333, 86, 4.5),
(9, 'ASUS', 'B560M-A AC', 'Micro ATX', 'LGA1200', 'PCIe 4', 4, 'DDR4', 5000, 120, 4.7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `necessities`
--

CREATE TABLE `necessities` (
  `necessity` varchar(15) NOT NULL,
  `necessity_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `necessities`
--

INSERT INTO `necessities` (`necessity`, `necessity_name`) VALUES
('3D DESIGN', '3D modeling, heavy render operations:\r\nHigh processor demand, high graphic demand\r\n'),
('BASSIC', 'If it can run DOOM its all right!'),
('GAME', 'Gaming and Streaming focused, high graphic performance'),
('OFFICE', 'Basic office tasks, low consumption');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `power_supplies`
--

CREATE TABLE `power_supplies` (
  `id_powersupply` int(11) NOT NULL,
  `brand` varchar(20) NOT NULL,
  `model` varchar(50) NOT NULL,
  `sata_connection` int(11) NOT NULL,
  `power` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `size` varchar(10) NOT NULL,
  `certification` varchar(15) NOT NULL,
  `temperature` varchar(5) NOT NULL,
  `type` varchar(10) NOT NULL,
  `score` double DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `power_supplies`
--

INSERT INTO `power_supplies` (`id_powersupply`, `brand`, `model`, `sata_connection`, `power`, `price`, `size`, `certification`, `temperature`, `type`, `score`, `created_at`) VALUES
(1, 'Corsair', 'VS600', 0, 600, 73, 'ATX', '80 plus', '', '0', 4.7, '2022-11-27 03:39:01'),
(2, 'Vorago', 'PSU-101', 2, 500, 15, 'ATX', '-', '100c', 'No modular', 4.6, '2022-11-28 08:14:32'),
(3, 'Game Factor', 'PSG650 ', 1, 650, 53, '-', '80 plus bronce', '', 'No modular', 4.6, '2022-11-28 08:21:16'),
(4, 'Thermaltake', 'PS-SPD-0500NPCWUS-W Smart 500W', 0, 500, 30, 'ATX', '80 plus white', '-', 'No modular', 4.7, '2022-11-28 08:32:51'),
(5, 'Gigabyte', 'GP-UD850GM', 0, 850, 98, 'ATX', '80 plus gold', '-', 'Modular', 4.7, '2022-11-28 08:35:49'),
(6, 'ASUS', 'ROG Strix 850W', 0, 850, 232, 'ATX', '80 plus gold', '', 'Modular', 4.7, '2022-11-28 08:37:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `processors`
--

CREATE TABLE `processors` (
  `id_cpu` int(11) NOT NULL,
  `brand` varchar(20) NOT NULL,
  `model` varchar(50) NOT NULL,
  `socket` varchar(10) NOT NULL,
  `cpu_cores` tinyint(4) NOT NULL,
  `threads` tinyint(4) NOT NULL,
  `frequency` double NOT NULL,
  `Memory Type` varchar(11) NOT NULL,
  `GPU included` tinyint(1) NOT NULL,
  `GPU model` varchar(20) NOT NULL,
  `GPU shaders` int(11) NOT NULL,
  `GPU frequency` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `score` double DEFAULT NULL,
  `Consumption` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `gen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `processors`
--

INSERT INTO `processors` (`id_cpu`, `brand`, `model`, `socket`, `cpu_cores`, `threads`, `frequency`, `Memory Type`, `GPU included`, `GPU model`, `GPU shaders`, `GPU frequency`, `price`, `score`, `Consumption`, `created_at`, `gen`) VALUES
(1, 'AMD', 'Ryzen 3 3200g', 'AM4', 4, 4, 3600, 'PCIe 3.0 x8', 1, 'Vega 8', 2000, 1250, 133, 4.8, 65, '2022-11-29 00:01:32', 3),
(2, 'Intel', 'Core i3-10105', 'LGA1200', 4, 8, 3700, 'DDR4', 0, '-', 0, 0, 133, 4.6, 65, '2022-11-29 00:01:36', 3),
(3, 'AMD', 'Ryzen 5 5600', 'AM4', 6, 12, 3900, 'DDR4', 1, 'Vega7', 448, 1900, 145, 4.8, 65, '2022-11-29 00:01:40', 5),
(4, 'Intel', 'Core i3-10100F', 'LGA1200', 4, 8, 3600, 'DDR4', 0, '', 0, 0, 90, 4.7, 65, '2022-11-29 00:28:13', 3),
(5, 'Intel', 'Core i5-12600K', 'LGA1700', 10, 16, 4900, 'DDR5', 1, 'Gráficos UHD Intel® ', 256, 1450, 320, 4.8, 125, '2022-11-29 00:01:48', 5),
(6, 'AMD', 'Ryzen 7 5700G', 'AM4', 8, 16, 4600, 'DDR4', 1, 'Vega 10', 512, 1750, 206, 4.9, 65, '2022-11-29 00:01:52', 7),
(7, 'Intel', 'Core i7-12700KF', 'LGA1700', 12, 20, 5000, 'DDR5', 0, '', 0, 0, 440, 4.8, 190, '2022-11-29 00:01:57', 7),
(8, 'AMD', 'Ryzen 5 4500', 'AM4', 6, 12, 4100, 'DDR4', 0, '', 0, 0, 100, 4.5, 65, '2022-11-29 00:02:00', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ram`
--

CREATE TABLE `ram` (
  `id_ram` int(11) NOT NULL,
  `brand` varchar(20) NOT NULL,
  `model` varchar(50) NOT NULL,
  `capacity` int(11) NOT NULL,
  `tech` varchar(5) NOT NULL,
  `frequency` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `score` double DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ram`
--

INSERT INTO `ram` (`id_ram`, `brand`, `model`, `capacity`, `tech`, `frequency`, `price`, `score`, `created_at`) VALUES
(1, 'Corsair', 'CMK16GX4M2B3200C16', 16, 'DDR4', 3200, 85, 4.8, '2022-11-29 04:09:54'),
(2, 'Kington', 'Fury Beast', 8, 'DDR4', 3200, 45, 4.8, '2022-11-29 04:09:57'),
(3, 'Corsair', 'Vengance', 8, 'DDR4', 3200, 50, 4.9, '2022-11-29 04:10:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recommendations`
--

CREATE TABLE `recommendations` (
  `id_recommendation` int(11) NOT NULL,
  `id_component` int(11) NOT NULL,
  `cathegory` varchar(5) NOT NULL,
  `necessity` varchar(5) NOT NULL,
  `price` int(11) NOT NULL,
  `score` tinyint(4) DEFAULT NULL,
  `crated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `storage_disks`
--

CREATE TABLE `storage_disks` (
  `id_storage` int(11) NOT NULL,
  `type` varchar(5) NOT NULL,
  `brand` varchar(20) NOT NULL,
  `model` varchar(50) NOT NULL,
  `capacity` int(11) NOT NULL,
  `r_speed` int(11) NOT NULL,
  `w_speed` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `score` double DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `storage_disks`
--

INSERT INTO `storage_disks` (`id_storage`, `type`, `brand`, `model`, `capacity`, `r_speed`, `w_speed`, `price`, `score`, `created_at`) VALUES
(1, 'HDD', 'Seagate', 'ST2000DM008', 2048, 130, 142, 92, 4.8, '2022-11-28 03:17:54'),
(2, 'HDD', 'Seagate', 'ST4000VNZ06', 4096, 180, 180, 96, 4.6, '2022-11-28 03:17:54'),
(3, 'HDD', 'Western Digital', 'W10EZEX', 1024, 155, 140, 46, 4.7, '2022-11-28 03:20:08'),
(4, 'SSD', 'Kingston', 'A400', 240, 500, 350, 53, 4.8, '2022-11-28 03:22:35'),
(5, 'SSD', 'ADATA', 'SU630', 480, 520, 450, 77, 4.8, '2022-11-28 03:22:35'),
(6, 'SSD', 'Western Digital', 'WDS100T3G0A', 1024, 545, 545, 67, 4.8, '2022-11-28 03:29:01'),
(7, 'M2', 'Micron', 'Crucial P3', 500, 3500, 3500, 71, 4.6, '2022-11-28 03:29:01'),
(8, 'M2', 'Kingston', 'NV2', 1000, 3500, 3500, 72, 4.6, '2022-11-28 03:30:51'),
(9, 'M2', 'Kingston', 'KC3000', 1024, 7000, 7000, 226, 4.8, '2022-11-28 03:32:42'),
(10, 'M2', 'WD_BLACK', 'SM850X', 1024, 7300, 7300, 232, 5, '2022-11-28 03:34:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(25) DEFAULT NULL,
  `pwd` varchar(32) DEFAULT NULL,
  `user_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_preferences`
--

CREATE TABLE `user_preferences` (
  `id_user` int(11) NOT NULL,
  `necessity` varchar(5) DEFAULT NULL,
  `category` varchar(5) DEFAULT NULL,
  `avrg_budget` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `graphic_cards`
--
ALTER TABLE `graphic_cards`
  ADD PRIMARY KEY (`id_gpu`);

--
-- Indices de la tabla `motherboards`
--
ALTER TABLE `motherboards`
  ADD PRIMARY KEY (`id_motherboard`);

--
-- Indices de la tabla `necessities`
--
ALTER TABLE `necessities`
  ADD PRIMARY KEY (`necessity`);

--
-- Indices de la tabla `power_supplies`
--
ALTER TABLE `power_supplies`
  ADD PRIMARY KEY (`id_powersupply`);

--
-- Indices de la tabla `processors`
--
ALTER TABLE `processors`
  ADD PRIMARY KEY (`id_cpu`);

--
-- Indices de la tabla `ram`
--
ALTER TABLE `ram`
  ADD PRIMARY KEY (`id_ram`);

--
-- Indices de la tabla `recommendations`
--
ALTER TABLE `recommendations`
  ADD PRIMARY KEY (`id_recommendation`);

--
-- Indices de la tabla `storage_disks`
--
ALTER TABLE `storage_disks`
  ADD PRIMARY KEY (`id_storage`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `graphic_cards`
--
ALTER TABLE `graphic_cards`
  MODIFY `id_gpu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `motherboards`
--
ALTER TABLE `motherboards`
  MODIFY `id_motherboard` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `power_supplies`
--
ALTER TABLE `power_supplies`
  MODIFY `id_powersupply` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `processors`
--
ALTER TABLE `processors`
  MODIFY `id_cpu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `ram`
--
ALTER TABLE `ram`
  MODIFY `id_ram` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `recommendations`
--
ALTER TABLE `recommendations`
  MODIFY `id_recommendation` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `storage_disks`
--
ALTER TABLE `storage_disks`
  MODIFY `id_storage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
