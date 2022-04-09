-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: mart. 23, 2022 la 11:20 PM
-- Versiune server: 10.4.24-MariaDB
-- Versiune PHP: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Bază de date: `moto_service`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `appointments`
--

CREATE TABLE `appointments` (
  `id_user` int(11) NOT NULL,
  `date` date NOT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT 0,
  `id_formular` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `brands`
--

CREATE TABLE `brands` (
  `id_brand` int(11) NOT NULL,
  `brand_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `brands`
--

INSERT INTO `brands` (`id_brand`, `brand_name`) VALUES
(1, 'APRILIA'),
(2, 'BETA'),
(3, 'BMW'),
(4, 'HONDA'),
(5, 'HUSABERG'),
(6, 'HUSQVARNA'),
(7, 'KAWASAKI'),
(8, 'SUZUKI'),
(9, 'YAMAHA'),
(10, 'GENERAL');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `categories`
--

CREATE TABLE `categories` (
  `id_category` int(11) NOT NULL,
  `category_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `categories`
--

INSERT INTO `categories` (`id_category`, `category_name`) VALUES
(1, 'Accesorii si piese'),
(2, 'Anvelope si Roti'),
(3, 'Componente Motor'),
(4, 'Componente Sasiu'),
(5, 'Electrice'),
(6, 'Evacuari'),
(7, 'Filtre'),
(8, 'Frane'),
(9, 'Huse Moto'),
(10, 'Transmisie'),
(11, 'KTM Power Parts'),
(12, 'Manete si Comenzi'),
(13, 'Manete si Comenzi'),
(14, 'Plastice si Aptibilduri'),
(15, 'Protectii si Scuturi'),
(16, 'Radiatoare'),
(17, 'Suspensii Moto'),
(18, 'Uleiuri si Lubrifianti');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `formulars`
--

CREATE TABLE `formulars` (
  `id_formular` int(11) NOT NULL,
  `request_message` varchar(500) DEFAULT NULL,
  `response_message` varchar(500) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `request_picture` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `orders`
--

CREATE TABLE `orders` (
  `id_order` int(11) NOT NULL,
  `id_part` int(11) NOT NULL,
  `order_date` date NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `quantity` int(5) NOT NULL DEFAULT 0,
  `shipped_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `parts`
--

CREATE TABLE `parts` (
  `id_part` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` int(10) NOT NULL,
  `id_category` int(11) NOT NULL,
  `total_quantity` int(5) NOT NULL DEFAULT 0,
  `schedule_quantity` int(5) NOT NULL DEFAULT 0,
  `id_brand` int(11) NOT NULL DEFAULT 10
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `parts`
--

INSERT INTO `parts` (`id_part`, `name`, `price`, `id_category`, `total_quantity`, `schedule_quantity`, `id_brand`) VALUES
(1, 'Claxon 12V Negru', 30, 1, 15, 0, 10),
(2, 'Protectie schimbator viteze', 25, 1, 15, 0, 10),
(3, 'Cablu antifurt', 85, 1, 20, 0, 10),
(4, 'Anvelopa Spate', 800, 2, 20, 0, 1),
(5, 'Anvelopa Spate', 810, 2, 20, 0, 1),
(6, 'Anvelopa Spate', 820, 2, 20, 0, 2),
(7, 'Anvelopa Spate', 830, 2, 20, 0, 3),
(8, 'Anvelopa Spate', 840, 2, 20, 0, 4),
(9, 'Anvelopa Spate', 850, 2, 20, 0, 5),
(10, 'Anvelopa Spate', 750, 2, 20, 0, 6),
(11, 'Anvelopa Spate', 760, 2, 20, 0, 7),
(12, 'Anvelopa Spate', 770, 2, 20, 0, 8),
(13, 'Anvelopa Spate', 780, 2, 20, 0, 9),
(14, 'Anvelopa Fata', 610, 2, 20, 0, 1),
(15, 'Anvelopa Fata', 620, 2, 20, 0, 2),
(16, 'Anvelopa Fata', 630, 2, 20, 0, 3),
(17, 'Anvelopa Fata', 640, 2, 20, 0, 4),
(18, 'Anvelopa Fata', 650, 2, 20, 0, 5),
(19, 'Anvelopa Fata', 660, 2, 20, 0, 6),
(20, 'Anvelopa Fata', 670, 2, 20, 0, 7),
(21, 'Anvelopa Fata', 680, 2, 20, 0, 8),
(22, 'Anvelopa Fata', 690, 2, 20, 0, 9),
(23, 'Kit piston', 110, 3, 20, 0, 1),
(24, 'kit piston', 120, 3, 20, 0, 2),
(25, 'kit piston', 130, 3, 20, 0, 3),
(26, 'kit piston', 140, 3, 20, 0, 4),
(27, 'kit piston', 150, 3, 20, 0, 5),
(28, 'kit piston', 150, 3, 20, 0, 6),
(29, 'kit piston', 160, 3, 20, 0, 7),
(30, 'kit piston', 170, 3, 20, 0, 8),
(31, 'kit piston', 180, 3, 20, 0, 9),
(32, 'garnitura', 10, 3, 20, 0, 1),
(33, 'garnitura', 20, 3, 20, 0, 2),
(34, 'garnitura', 30, 3, 20, 0, 3),
(35, 'garnitura', 40, 3, 20, 0, 4),
(36, 'garnitura', 50, 3, 20, 0, 5),
(37, 'garnitura', 60, 3, 20, 0, 6),
(38, 'garnitura', 70, 3, 20, 0, 7),
(39, 'garnitura', 80, 3, 20, 0, 8),
(40, 'garnitura', 90, 3, 20, 0, 9),
(41, 'supapa', 10, 3, 20, 0, 1),
(42, 'supapa', 20, 3, 20, 0, 2),
(43, 'supapa', 30, 3, 20, 0, 3),
(44, 'supapa', 40, 3, 20, 0, 4),
(45, 'supapa', 50, 3, 20, 0, 5),
(46, 'supapa', 60, 3, 20, 0, 6),
(47, 'supapa', 70, 3, 20, 0, 7),
(48, 'supapa', 80, 3, 20, 0, 8),
(49, 'supapa', 90, 3, 20, 0, 9),
(50, 'Kit Reparatie Bascula', 110, 4, 20, 0, 1),
(51, 'Kit Reparatie Bascula', 120, 4, 20, 0, 2),
(52, 'Kit Reparatie Bascula', 130, 4, 20, 0, 3),
(53, 'Kit Reparatie Bascula', 140, 4, 20, 0, 4),
(54, 'Kit Reparatie Bascula', 150, 4, 20, 0, 5),
(55, 'Kit Reparatie Bascula', 150, 4, 20, 0, 6),
(56, 'Kit Reparatie Bascula', 160, 4, 20, 0, 7),
(57, 'Kit Reparatie Bascula', 170, 4, 20, 0, 8),
(58, 'Kit Reparatie Bascula', 180, 4, 20, 0, 9),
(59, 'Rulmenti de Jug', 10, 4, 20, 0, 1),
(60, 'Rulmenti de Jug', 20, 4, 20, 0, 2),
(61, 'Rulmenti de Jug', 30, 4, 20, 0, 3),
(62, 'Rulmenti de Jug', 40, 4, 20, 0, 4),
(63, 'Rulmenti de Jug', 50, 4, 20, 0, 5),
(64, 'Rulmenti de Jug', 60, 4, 20, 0, 6),
(65, 'Rulmenti de Jug', 70, 4, 20, 0, 7),
(66, 'Rulmenti de Jug', 80, 4, 20, 0, 8),
(67, 'Rulmenti de Jug', 90, 4, 20, 0, 9),
(68, 'Kit Reparatie Bucsa', 10, 4, 20, 0, 1),
(69, 'Kit Reparatie Bucsa', 20, 4, 20, 0, 2),
(70, 'Kit Reparatie Bucsa', 30, 4, 20, 0, 3),
(71, 'Kit Reparatie Bucsa', 40, 4, 20, 0, 4),
(72, 'Kit Reparatie Bucsa', 50, 4, 20, 0, 5),
(73, 'Kit Reparatie Bucsa', 60, 4, 20, 0, 6),
(74, 'Kit Reparatie Bucsa', 70, 4, 20, 0, 7),
(75, 'Kit Reparatie Bucsa', 80, 4, 20, 0, 8),
(76, 'Kit Reparatie Bucsa', 90, 4, 20, 0, 9),
(77, 'Acumulator', 110, 5, 20, 0, 1),
(78, 'Acumulator', 120, 5, 20, 0, 2),
(79, 'Acumulator', 130, 5, 20, 0, 3),
(80, 'Acumulator', 140, 5, 20, 0, 4),
(81, 'Acumulator', 150, 5, 20, 0, 5),
(82, 'Acumulator', 150, 5, 20, 0, 6),
(83, 'Acumulator', 160, 5, 20, 0, 7),
(84, 'Acumulator', 170, 5, 20, 0, 8),
(85, 'Acumulator', 180, 5, 20, 0, 9),
(86, 'Becuri', 10, 5, 20, 0, 1),
(87, 'Becuri', 20, 5, 20, 0, 2),
(88, 'Becuri', 30, 5, 20, 0, 3),
(89, 'Becuri', 40, 5, 20, 0, 4),
(90, 'Becuri', 50, 5, 20, 0, 5),
(91, 'Becuri', 60, 5, 20, 0, 6),
(92, 'Becuri', 70, 5, 20, 0, 7),
(93, 'Becuri', 80, 5, 20, 0, 8),
(94, 'Becuri', 90, 5, 20, 0, 9),
(95, 'Bujii', 10, 5, 20, 0, 1),
(96, 'Bujii', 20, 5, 20, 0, 2),
(97, 'Bujii', 30, 5, 20, 0, 3),
(98, 'Bujii', 40, 5, 20, 0, 4),
(99, 'Bujii', 50, 5, 20, 0, 5),
(100, 'Bujii', 60, 5, 20, 0, 6),
(101, 'Bujii', 70, 5, 20, 0, 7),
(102, 'Bujii', 80, 5, 20, 0, 8),
(103, 'Bujii', 90, 5, 20, 0, 9),
(104, 'Evacuare moto', 110, 6, 20, 0, 1),
(105, 'Evacuare moto', 120, 6, 20, 0, 2),
(106, 'Evacuare moto', 130, 6, 20, 0, 3),
(107, 'Evacuare moto', 140, 6, 20, 0, 4),
(108, 'Evacuare moto', 150, 6, 20, 0, 5),
(109, 'Evacuare moto', 150, 6, 20, 0, 6),
(110, 'Evacuare moto', 160, 6, 20, 0, 7),
(111, 'Evacuare moto', 170, 6, 20, 0, 8),
(112, 'Evacuare moto', 180, 6, 20, 0, 9),
(113, 'Filtru Benzina', 110, 7, 20, 0, 1),
(114, 'Filtru Benzina', 120, 7, 20, 0, 2),
(115, 'Filtru Benzina', 130, 7, 20, 0, 3),
(116, 'Filtru Benzina', 140, 7, 20, 0, 4),
(117, 'Filtru Benzina', 150, 7, 20, 0, 5),
(118, 'Filtru Benzina', 150, 7, 20, 0, 6),
(119, 'Filtru Benzina', 160, 7, 20, 0, 7),
(120, 'Filtru Benzina', 170, 7, 20, 0, 8),
(121, 'Filtru Benzina', 180, 7, 20, 0, 9),
(122, 'Filtru de aer', 110, 7, 20, 0, 1),
(123, 'Filtru de aer', 120, 7, 20, 0, 2),
(124, 'Filtru de aer', 130, 7, 20, 0, 3),
(125, 'Filtru de aer', 140, 7, 20, 0, 4),
(126, 'Filtru de aer', 150, 7, 20, 0, 5),
(127, 'Filtru de aer', 160, 7, 20, 0, 6),
(128, 'Filtru de aer', 170, 7, 20, 0, 7),
(129, 'Filtru de aer', 180, 7, 20, 0, 8),
(130, 'Filtru de aer', 190, 7, 20, 0, 9),
(131, 'Filtru ulei', 210, 7, 20, 0, 1),
(132, 'Filtru ulei', 220, 7, 20, 0, 2),
(133, 'Filtru ulei', 230, 7, 20, 0, 3),
(134, 'Filtru ulei', 240, 7, 20, 0, 4),
(135, 'Filtru ulei', 250, 7, 20, 0, 5),
(136, 'Filtru ulei', 260, 7, 20, 0, 6),
(137, 'Filtru ulei', 270, 7, 20, 0, 7),
(138, 'Filtru ulei', 280, 7, 20, 0, 8),
(139, 'Filtru ulei', 290, 7, 20, 0, 9),
(140, 'Discuri Frana', 110, 8, 20, 0, 1),
(141, 'Discuri Frana', 120, 8, 20, 0, 2),
(142, 'Discuri Frana', 130, 8, 20, 0, 3),
(143, 'Discuri Frana', 140, 8, 20, 0, 4),
(144, 'Discuri Frana', 150, 8, 20, 0, 5),
(145, 'Discuri Frana', 150, 8, 20, 0, 6),
(146, 'Discuri Frana', 160, 8, 20, 0, 7),
(147, 'Discuri Frana', 170, 8, 20, 0, 8),
(148, 'Discuri Frana', 180, 8, 20, 0, 9),
(149, 'Kit Reparatie Frana', 110, 8, 20, 0, 1),
(150, 'Kit Reparatie Frana', 120, 8, 20, 0, 2),
(151, 'Kit Reparatie Frana', 130, 8, 20, 0, 3),
(152, 'Kit Reparatie Frana', 140, 8, 20, 0, 4),
(153, 'Kit Reparatie Frana', 150, 8, 20, 0, 5),
(154, 'Kit Reparatie Frana', 160, 8, 20, 0, 6),
(155, 'Kit Reparatie Frana', 170, 8, 20, 0, 7),
(156, 'Kit Reparatie Frana', 180, 8, 20, 0, 8),
(157, 'Kit Reparatie Frana', 190, 8, 20, 0, 9),
(158, 'Kit Upgrade Frana', 210, 8, 20, 0, 1),
(159, 'Kit Upgrade Frana', 220, 8, 20, 0, 2),
(160, 'Kit Upgrade Frana', 230, 8, 20, 0, 3),
(161, 'Kit Upgrade Frana', 240, 8, 20, 0, 4),
(162, 'Kit Upgrade Frana', 250, 8, 20, 0, 5),
(163, 'Kit Upgrade Frana', 260, 8, 20, 0, 6),
(164, 'Kit Upgrade Frana', 270, 8, 20, 0, 7),
(165, 'Kit Upgrade Frana', 280, 8, 20, 0, 8),
(166, 'Kit Upgrade Frana', 290, 8, 20, 0, 9),
(167, 'Husa', 110, 9, 20, 0, 1),
(168, 'Husa', 120, 9, 20, 0, 2),
(169, 'Husa', 130, 9, 20, 0, 3),
(170, 'Husa', 140, 9, 20, 0, 4),
(171, 'Husa', 150, 9, 20, 0, 5),
(172, 'Husa', 150, 9, 20, 0, 6),
(173, 'Husa', 160, 9, 20, 0, 7),
(174, 'Husa', 170, 9, 20, 0, 8),
(175, 'Husa', 180, 9, 20, 0, 9),
(176, 'Kit Lant Moto', 110, 10, 20, 0, 1),
(177, 'Kit Lant Moto', 120, 10, 20, 0, 2),
(178, 'Kit Lant Moto', 130, 10, 20, 0, 3),
(179, 'Kit Lant Moto', 140, 10, 20, 0, 4),
(180, 'Kit Lant Moto', 150, 10, 20, 0, 5),
(181, 'Kit Lant Moto', 150, 10, 20, 0, 6),
(182, 'Kit Lant Moto', 160, 10, 20, 0, 7),
(183, 'Kit Lant Moto', 170, 10, 20, 0, 8),
(184, 'Kit Lant Moto', 180, 10, 20, 0, 9),
(185, 'KTM Sistem Racire', 110, 11, 20, 0, 1),
(186, 'KTM Sistem Racire', 120, 11, 20, 0, 2),
(187, 'KTM Sistem Racire', 130, 11, 20, 0, 3),
(188, 'KTM Sistem Racire', 140, 11, 20, 0, 4),
(189, 'KTM Sistem Racire', 150, 11, 20, 0, 5),
(190, 'KTM Sistem Racire', 150, 11, 20, 0, 6),
(191, 'KTM Sistem Racire', 160, 11, 20, 0, 7),
(192, 'KTM Sistem Racire', 170, 11, 20, 0, 8),
(193, 'KTM Sistem Racire', 180, 11, 20, 0, 9),
(194, 'Ghidoan', 110, 12, 20, 0, 1),
(195, 'Ghidoan', 120, 12, 20, 0, 2),
(196, 'Ghidoan', 130, 12, 20, 0, 3),
(197, 'Ghidoan', 140, 12, 20, 0, 4),
(198, 'Ghidoan', 150, 12, 20, 0, 5),
(199, 'Ghidoan', 150, 12, 20, 0, 6),
(200, 'Ghidoan', 160, 12, 20, 0, 7),
(201, 'Ghidoan', 170, 12, 20, 0, 8),
(202, 'Ghidoan', 180, 12, 20, 0, 9),
(203, 'Maneta Ambreiaj', 110, 12, 20, 0, 1),
(204, 'Maneta Ambreiaj', 120, 12, 20, 0, 2),
(205, 'Maneta Ambreiaj', 130, 12, 20, 0, 3),
(206, 'Maneta Ambreiaj', 140, 12, 20, 0, 4),
(207, 'Maneta Ambreiaj', 150, 12, 20, 0, 5),
(208, 'Maneta Ambreiaj', 160, 12, 20, 0, 6),
(209, 'Maneta Ambreiaj', 170, 12, 20, 0, 7),
(210, 'Maneta Ambreiaj', 180, 12, 20, 0, 8),
(211, 'Maneta Ambreiaj', 190, 12, 20, 0, 9),
(212, 'Maneta Frana ', 210, 12, 20, 0, 1),
(213, 'Maneta Frana ', 220, 12, 20, 0, 2),
(214, 'Maneta Frana ', 230, 12, 20, 0, 3),
(215, 'Maneta Frana ', 240, 12, 20, 0, 4),
(216, 'Maneta Frana ', 250, 12, 20, 0, 5),
(217, 'Maneta Frana ', 260, 12, 20, 0, 6),
(218, 'Maneta Frana ', 270, 12, 20, 0, 7),
(219, 'Maneta Frana ', 280, 12, 20, 0, 8),
(220, 'Maneta Frana ', 290, 12, 20, 0, 9);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `users`
--

CREATE TABLE `users` (
  `user_name` varchar(30) NOT NULL,
  `id_user` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `users`
--

INSERT INTO `users` (`user_name`, `id_user`, `email`, `phone`, `password`, `type`) VALUES
('admin', 1, 'admin@cymat.ro', '0721231234', '1234', 1),
('elena', 2, 'elena@gmail.com', '0741231234', '1234', 0),
('liliana', 3, 'liliana@yahoo.com', '0751231234', '1234', 0),
('adina', 4, 'adina@hotmail.com', '0761231234', '1234', 0);

CREATE TABLE `programari` (
`id` int(30) NOT NULL  ,
`nume_client` varchar(200) NOT NULL,
`nr_contact` int(20) DEFAULT NULL,
`email` varchar(64) DEFAULT NULL,
`descriere` text NOT NULL,
`status` tinyint(2) NOT NULL,
`marca` varchar(255) DEFAULT NULL,
`nr_inregistrare` text DEFAULT NULL,
`model` varchar(255) DEFAULT NULL,
`data_creare` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `programari`
    ADD PRIMARY KEY (`id`);
ALTER TABLE `programari` CHANGE `id` `id` INT(30) NOT NULL AUTO_INCREMENT;


INSERT INTO `programari` (`id`, `nume_client`, `nr_contact`, `email`, `descriere`, `status`, `marca`, `nr_inregistrare`, `model`, `data_creare`) VALUES
         ('', 'TESSTTT', 15525455, 'lili@test.com', 'Probleme virare', 3, 'asd', '15hg222', 'gfs', '2022-04-09 12:38:51'),
         ('', 'Lili Test', 123456789, 'test@test.com', 'Probleme motorhhh', 0, 'Dacia', 'b123ddf', 'Logan', '2022-04-05 01:31:03'),
         ('', 'Test', 234381123, 'test.lili', 'Fum negru la accelerare', 1, 'Audi', 'bc12drt', 'A6', '2022-04-05 01:41:58');

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id_brand`);

--
-- Indexuri pentru tabele `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexuri pentru tabele `formulars`
--
ALTER TABLE `formulars`
  ADD PRIMARY KEY (`id_formular`);

--
-- Indexuri pentru tabele `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexuri pentru tabele `parts`
--
ALTER TABLE `parts`
  ADD PRIMARY KEY (`id_part`);

--
-- Indexuri pentru tabele `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `brands`
--
ALTER TABLE `brands`
  MODIFY `id_brand` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pentru tabele `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pentru tabele `formulars`
--
ALTER TABLE `formulars`
  MODIFY `id_formular` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `parts`
--
ALTER TABLE `parts`
  MODIFY `id_part` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=221;

--
-- AUTO_INCREMENT pentru tabele `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;
