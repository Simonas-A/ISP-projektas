-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2022 at 06:47 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vartvald`
--

-- --------------------------------------------------------

--
-- Table structure for table `apmokejimas`
--

CREATE TABLE `apmokejimas` (
  `id` int(11) NOT NULL,
  `apmokejimo_budas` int(11) NOT NULL,
  `data` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `apmokejimas`
--

INSERT INTO `apmokejimas` (`id`, `apmokejimo_budas`, `data`) VALUES
(1, 1, '2022-11-12 20:22:59'),
(2, 2, '2022-11-12 20:23:06'),
(3, 1, '2022-11-12 21:42:52');

-- --------------------------------------------------------

--
-- Table structure for table `apmokejimo_budai`
--

CREATE TABLE `apmokejimo_budai` (
  `id` int(11) NOT NULL,
  `budas` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `apmokejimo_budai`
--

INSERT INTO `apmokejimo_budai` (`id`, `budas`) VALUES
(1, 'Kortele'),
(2, 'Grynais'),
(3, 'Banko kortele');

-- --------------------------------------------------------

--
-- Table structure for table `nuolaidos`
--

CREATE TABLE `nuolaidos` (
  `id` int(11) NOT NULL,
  `nuolaida` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nuolaidos`
--

INSERT INTO `nuolaidos` (`id`, `nuolaida`) VALUES
(1, 2.64),
(2, 5.22),
(3, 1.01);

-- --------------------------------------------------------

--
-- Table structure for table `pirkimai`
--

CREATE TABLE `pirkimai` (
  `id` int(11) NOT NULL,
  `data` datetime NOT NULL DEFAULT current_timestamp(),
  `kaina` float NOT NULL,
  `prekiu_kiekis` int(11) NOT NULL,
  `fk_vartotojas_id` varchar(32) NOT NULL,
  `fk_pristatymo_id` int(11) NOT NULL,
  `fk_apmokejimo_budo_id` int(11) NOT NULL,
  `fk_nuolaidos_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pirkimai`
--

INSERT INTO `pirkimai` (`id`, `data`, `kaina`, `prekiu_kiekis`, `fk_vartotojas_id`, `fk_pristatymo_id`, `fk_apmokejimo_budo_id`, `fk_nuolaidos_id`) VALUES
(1, '2022-11-10 18:42:52', 52.43, 5, '689e5b2971577d707becb97405ede951', 1, 1, 1),
(2, '2022-11-24 17:44:28', 22.11, 3, '689e5b2971577d707becb97405ede951', 2, 1, 2),
(3, '2022-11-12 21:37:19', 44, 6, '689e5b2971577d707becb97405ede951', 3, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `pratyboms`
--

CREATE TABLE `pratyboms` (
  `id` int(5) NOT NULL,
  `siuntejas` varchar(30) CHARACTER SET utf8 COLLATE utf8_lithuanian_ci NOT NULL,
  `kam` varchar(30) CHARACTER SET utf8 COLLATE utf8_lithuanian_ci NOT NULL,
  `zinute` text CHARACTER SET utf8 COLLATE utf8_lithuanian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `prekes`
--

CREATE TABLE `prekes` (
  `id` int(11) NOT NULL,
  `pavadinimas` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `kiekis` int(11) NOT NULL,
  `statusas` tinyint(1) NOT NULL DEFAULT 0,
  `Data` date DEFAULT NULL,
  `kaina` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prekes`
--

INSERT INTO `prekes` (`id`, `pavadinimas`, `kiekis`, `statusas`, `Data`, `kaina`) VALUES
(7, 'Obuoliai (500 g)', 0, 0, '0000-00-00', 2.22),
(8, 'Bananai (1 kg)', 0, 0, '0000-00-00', 0.76),
(9, 'Riešutai (100g)', 5, 0, NULL, 1.22);

-- --------------------------------------------------------

--
-- Table structure for table `preke_pirkimai_tarpinis`
--

CREATE TABLE `preke_pirkimai_tarpinis` (
  `fk_preke_id` int(11) NOT NULL,
  `fk_pirkimas_id` int(11) NOT NULL,
  `pirktas_kiekis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `preke_pirkimai_tarpinis`
--

INSERT INTO `preke_pirkimai_tarpinis` (`fk_preke_id`, `fk_pirkimas_id`, `pirktas_kiekis`) VALUES
(7, 1, 3),
(8, 2, 12);

-- --------------------------------------------------------

--
-- Table structure for table `pristatymai`
--

CREATE TABLE `pristatymai` (
  `id` int(11) NOT NULL,
  `adresas` text NOT NULL,
  `data` datetime NOT NULL DEFAULT current_timestamp(),
  `statusas` int(11) NOT NULL,
  `fk_vartotojo_id` varchar(32) NOT NULL,
  `mokestis` float NOT NULL,
  `budas` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pristatymai`
--

INSERT INTO `pristatymai` (`id`, `adresas`, `data`, `statusas`, `fk_vartotojo_id`, `mokestis`, `budas`) VALUES
(1, 'Mažeikiai, Zeniaus g. 42', '2022-11-10 18:42:52', 1, '689e5b2971577d707becb97405ede951', 1.45, 'LP EXPRESS'),
(2, 'Alytus, Petro g. 22', '2022-11-24 17:44:28', 2, '689e5b2971577d707becb97405ede951', 1.45, 'LP EXPRESS'),
(3, 'adresas', '2022-11-12 21:37:48', 3, '689e5b2971577d707becb97405ede951', 1.8, 'LPASTAS');

-- --------------------------------------------------------

--
-- Table structure for table `statusai`
--

CREATE TABLE `statusai` (
  `id` int(11) NOT NULL,
  `statusas` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `statusai`
--

INSERT INTO `statusai` (`id`, `statusas`) VALUES
(1, 'Užsakyta'),
(2, 'Pakeliui'),
(3, 'Atlikta');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(30) NOT NULL,
  `password` varchar(32) DEFAULT NULL,
  `userid` varchar(32) NOT NULL,
  `userlevel` tinyint(1) UNSIGNED DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `userid`, `userlevel`, `email`, `timestamp`) VALUES
('Administratorius', '16c354b68848cdbd8f54a226a0a55b21', 'a2fe399900de341c39c632244eaf8483', 9, 'demo@ktu.lt', '2018-02-16 16:51:21'),
('rimas', 'c2acd92812ef99acd3dcdbb746b9a434', '689e5b2971577d707becb97405ede951', 9, 'vytas.sa12@gmail.com', '2022-11-13 02:38:28'),
('jonas', '64067822105b320085d18e386f57d89a', '9c5ddd54107734f7d18335a5245c286b', 255, 'rimas@litnet.lt', '2017-05-09 17:10:37'),
('pranas', '16c354b68848cdbd8f54a226a0a55b21', 'aa69001f0ba493bed7dddfd1cdb06591', 4, 'pranas@ltu.ee', '2018-02-16 16:03:41'),
('kostas', '1c37511487d38c3ebc4c59650ce2d65a', '69986045e0925262d43addddaf76094f', 5, 'eeee@ll.lt', '2018-02-16 16:04:35'),
('vartotojas', 'c2acd92812ef99acd3dcdbb746b9a434', '701b9d1ddcb3fa263732af84b1d1552e', 4, 'studas@gmail.com', '2022-11-13 02:38:23'),
('hmm', 'c2acd92812ef99acd3dcdbb746b9a434', '5f2f664dc9cbf6932cfd6246b584016c', 4, 'lol@gmail.com', '2022-11-13 01:41:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apmokejimas`
--
ALTER TABLE `apmokejimas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `apmokejimo_budas` (`apmokejimo_budas`);

--
-- Indexes for table `apmokejimo_budai`
--
ALTER TABLE `apmokejimo_budai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nuolaidos`
--
ALTER TABLE `nuolaidos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pirkimai`
--
ALTER TABLE `pirkimai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_apmokejimo_budo_id` (`fk_apmokejimo_budo_id`),
  ADD KEY `fk_nuolaidos_id` (`fk_nuolaidos_id`);

--
-- Indexes for table `pratyboms`
--
ALTER TABLE `pratyboms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prekes`
--
ALTER TABLE `prekes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `preke_pirkimai_tarpinis`
--
ALTER TABLE `preke_pirkimai_tarpinis`
  ADD PRIMARY KEY (`fk_preke_id`,`fk_pirkimas_id`),
  ADD KEY `fk_pirkimas_id` (`fk_pirkimas_id`);

--
-- Indexes for table `pristatymai`
--
ALTER TABLE `pristatymai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `statusas` (`statusas`);

--
-- Indexes for table `statusai`
--
ALTER TABLE `statusai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apmokejimas`
--
ALTER TABLE `apmokejimas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `apmokejimo_budai`
--
ALTER TABLE `apmokejimo_budai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nuolaidos`
--
ALTER TABLE `nuolaidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pirkimai`
--
ALTER TABLE `pirkimai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pratyboms`
--
ALTER TABLE `pratyboms`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prekes`
--
ALTER TABLE `prekes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pristatymai`
--
ALTER TABLE `pristatymai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `statusai`
--
ALTER TABLE `statusai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `apmokejimas`
--
ALTER TABLE `apmokejimas`
  ADD CONSTRAINT `apmokejimas_ibfk_1` FOREIGN KEY (`apmokejimo_budas`) REFERENCES `apmokejimo_budai` (`id`);

--
-- Constraints for table `pirkimai`
--
ALTER TABLE `pirkimai`
  ADD CONSTRAINT `pirkimai_ibfk_1` FOREIGN KEY (`fk_apmokejimo_budo_id`) REFERENCES `apmokejimas` (`id`),
  ADD CONSTRAINT `pirkimai_ibfk_2` FOREIGN KEY (`fk_nuolaidos_id`) REFERENCES `nuolaidos` (`id`);

--
-- Constraints for table `preke_pirkimai_tarpinis`
--
ALTER TABLE `preke_pirkimai_tarpinis`
  ADD CONSTRAINT `preke_pirkimai_tarpinis_ibfk_1` FOREIGN KEY (`fk_preke_id`) REFERENCES `prekes` (`id`),
  ADD CONSTRAINT `preke_pirkimai_tarpinis_ibfk_2` FOREIGN KEY (`fk_pirkimas_id`) REFERENCES `pirkimai` (`id`);

--
-- Constraints for table `pristatymai`
--
ALTER TABLE `pristatymai`
  ADD CONSTRAINT `pristatymai_ibfk_1` FOREIGN KEY (`statusas`) REFERENCES `statusai` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
