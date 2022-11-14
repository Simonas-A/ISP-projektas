-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2022 at 03:27 PM
-- Server version: 10.4.25-MariaDB
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
  `nuolaida` float NOT NULL,
  `galiojimo_pradzia` datetime DEFAULT NULL,
  `galiojimo_pabaiga` datetime DEFAULT NULL,
  `panaudojimai` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nuolaidos`
--

INSERT INTO `nuolaidos` (`id`, `nuolaida`, `galiojimo_pradzia`, `galiojimo_pabaiga`, `panaudojimai`) VALUES
(1, 2.64, NULL, NULL, 0),
(2, 5.22, NULL, NULL, 0),
(3, 1.01, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pirkimai`
--

CREATE TABLE `pirkimai` (
  `id` int(11) NOT NULL,
  `data` datetime NOT NULL DEFAULT current_timestamp(),
  `kaina` float NOT NULL,
  `prekiu_kiekis` int(11) NOT NULL,
  `fk_vartotojas_id` varchar(32) CHARACTER SET utf8 NOT NULL,
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
(9, 'Riešutai (100g)', 6, 0, '0000-00-00', 1.22);

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
  `fk_vartotojo_id` varchar(32) CHARACTER SET utf8 NOT NULL,
  `mokestis` float NOT NULL,
  `budas` varchar(32) CHARACTER SET utf8 NOT NULL
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
-- Table structure for table `saskaita`
--

CREATE TABLE `saskaita` (
  `client` varchar(32) NOT NULL,
  `amount` decimal(12,2) NOT NULL,
  `id` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `saskaita`
--

INSERT INTO `saskaita` (`client`, `amount`, `id`) VALUES
('689e5b2971577d707becb97405ede951', '10.15', 1);

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
-- Table structure for table `tiekejai`
--

CREATE TABLE `tiekejai` (
  `id` int(11) NOT NULL,
  `pavadinimas` varchar(150) NOT NULL,
  `adresas` varchar(150) NOT NULL,
  `miestas` varchar(50) NOT NULL,
  `epastas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tiekejai`
--

INSERT INTO `tiekejai` (`id`, `pavadinimas`, `adresas`, `miestas`, `epastas`) VALUES
(1, 'Vičiūnai, UAB', 'Birutės g. 50, LT-90112', 'Plungė', 'info@vici.lt'),
(2, 'Žemaitijos pienas, AB', 'Sedos g. 35, LT-87101', 'Telšiai', 'info@zpienas.lt'),
(3, 'UAB \"SKYTECH.LT\"', 'Taikos pr. 17, LT-91140', 'Klaipėda', 'info@skytech.lt'),
(4, 'Senukai', 'Kareivių g. 11B, LT-09109', 'Vilnius', 'info@ksdigital.lt');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `name` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) DEFAULT NULL,
  `userid` varchar(32) NOT NULL,
  `userlevel` tinyint(1) UNSIGNED DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `phone` varchar(20) NOT NULL DEFAULT '+37065432198',
  `position` varchar(20) DEFAULT NULL,
  `type` varchar(20) NOT NULL DEFAULT 'klientas'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `surname`, `username`, `password`, `userid`, `userlevel`, `email`, `timestamp`, `phone`, `position`, `type`) VALUES
('', '', 'darbuotojas', '16c354b68848cdbd8f54a226a0a55b21', '2721ae19d27ea5033cf23c6cd103ae10', 5, 'darbuotojas@demo.lt', '2022-11-14 12:20:00', '+37065432198', NULL, 'klientas'),
('Simonas', 'aasd', 'hmm', 'c2acd92812ef99acd3dcdbb746b9a434', '5f2f664dc9cbf6932cfd6246b584016c', 4, 'lol@gmail.com', '2022-11-13 01:41:49', '+37099999999', NULL, 'klientas'),
('rimas', 'rimauskas', 'rimas', 'c2acd92812ef99acd3dcdbb746b9a434', '689e5b2971577d707becb97405ede951', 9, 'rimas@litnet.lt', '2022-11-13 19:14:24', '0', '', ''),
('kostas', 'kostauskas', 'kostas', '1c37511487d38c3ebc4c59650ce2d65a', '69986045e0925262d43addddaf76094f', 5, 'eeee@ll.lt', '2018-02-16 16:04:35', '0', '', ''),
('', '', 'klientas', '16c354b68848cdbd8f54a226a0a55b21', '703c4615ea4bdae8bb7eeeb07eacaabd', 4, 'klientas@demo.lt', '2022-11-14 01:01:48', '+37065432198', NULL, 'klientas'),
('jonas', 'jonauskas', 'jonas', '64067822105b320085d18e386f57d89a', '9c5ddd54107734f7d18335a5245c286b', 255, 'rimas@litnet.lt', '2017-05-09 17:10:37', '0', '', ''),
('adminas', 'adminauskas', 'Administratorius', '16c354b68848cdbd8f54a226a0a55b21', 'a2fe399900de341c39c632244eaf8483', 9, 'demo@ktu.lt', '2022-11-14 12:19:52', '0', '', ''),
('Simonas', 'aasd', 'simonasasas', '1653754378ce92f8cded9854caf733cb', 'b134e7196c6b2a979e26a911c749bc8f', 4, 'siasd@gmail.com', '2022-11-12 21:09:47', '+370999999123', NULL, 'klientas'),
('PRANASLAVAS', 'ABUGELIS', 'PRANYS', '31c290ad43d6c7002b45df7e7a3286a1', 'd6dae04acf3129a632f712126486d867', 4, 'PRANAS@pranas.com', '2022-11-12 21:19:17', '+3765465465', NULL, 'klientas');

-- --------------------------------------------------------

--
-- Table structure for table `uzsakymas`
--

CREATE TABLE `uzsakymas` (
  `id` int(11) NOT NULL,
  `sudaryta` datetime NOT NULL,
  `pristatyta` datetime NOT NULL,
  `suma` float NOT NULL,
  `pristatymo_kaina` float NOT NULL,
  `fk_darbuotojas_id` varchar(32) CHARACTER SET utf8 NOT NULL,
  `fk_statusas` int(11) NOT NULL,
  `fk_tiekejas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `uzsakymas`
--

INSERT INTO `uzsakymas` (`id`, `sudaryta`, `pristatyta`, `suma`, `pristatymo_kaina`, `fk_darbuotojas_id`, `fk_statusas`, `fk_tiekejas`) VALUES
(1, '2022-11-14 14:14:34', '2022-11-14 14:14:34', 12.44, 2.49, 'd6dae04acf3129a632f712126486d867', 1, 3),
(2, '2022-11-14 14:14:34', '2022-11-14 14:14:34', 50.89, 10, '69986045e0925262d43addddaf76094f', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `uzsakymo_preke`
--

CREATE TABLE `uzsakymo_preke` (
  `kiekis` int(11) NOT NULL,
  `vieneto_kaina` float NOT NULL,
  `fk_uzsakymas` int(11) NOT NULL,
  `fk_preke` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  ADD KEY `fk_nuolaidos_id` (`fk_nuolaidos_id`),
  ADD KEY `pirkimai_ibfk_3` (`fk_pristatymo_id`),
  ADD KEY `pirkimai_ibfk_4` (`fk_vartotojas_id`);

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
  ADD KEY `statusas` (`statusas`),
  ADD KEY `pristatymai_ibfk_2` (`fk_vartotojo_id`);

--
-- Indexes for table `saskaita`
--
ALTER TABLE `saskaita`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `klientas` (`client`);

--
-- Indexes for table `statusai`
--
ALTER TABLE `statusai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tiekejai`
--
ALTER TABLE `tiekejai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `uzsakymas`
--
ALTER TABLE `uzsakymas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_statusas` (`fk_statusas`),
  ADD KEY `fk_darbuotojas` (`fk_darbuotojas_id`),
  ADD KEY `fk_tiekejas` (`fk_tiekejas`);

--
-- Indexes for table `uzsakymo_preke`
--
ALTER TABLE `uzsakymo_preke`
  ADD KEY `fk_preke` (`fk_preke`),
  ADD KEY `fk_uzsakymas` (`fk_uzsakymas`);

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
-- AUTO_INCREMENT for table `saskaita`
--
ALTER TABLE `saskaita`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `statusai`
--
ALTER TABLE `statusai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tiekejai`
--
ALTER TABLE `tiekejai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `uzsakymas`
--
ALTER TABLE `uzsakymas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  ADD CONSTRAINT `pirkimai_ibfk_2` FOREIGN KEY (`fk_nuolaidos_id`) REFERENCES `nuolaidos` (`id`),
  ADD CONSTRAINT `pirkimai_ibfk_3` FOREIGN KEY (`fk_pristatymo_id`) REFERENCES `pristatymai` (`id`),
  ADD CONSTRAINT `pirkimai_ibfk_4` FOREIGN KEY (`fk_vartotojas_id`) REFERENCES `users` (`userid`);

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
  ADD CONSTRAINT `pristatymai_ibfk_1` FOREIGN KEY (`statusas`) REFERENCES `statusai` (`id`),
  ADD CONSTRAINT `pristatymai_ibfk_2` FOREIGN KEY (`fk_vartotojo_id`) REFERENCES `users` (`userid`);

--
-- Constraints for table `uzsakymas`
--
ALTER TABLE `uzsakymas`
  ADD CONSTRAINT `fk_darbuotojas` FOREIGN KEY (`fk_darbuotojas_id`) REFERENCES `users` (`userid`),
  ADD CONSTRAINT `fk_statusas` FOREIGN KEY (`fk_statusas`) REFERENCES `statusai` (`id`),
  ADD CONSTRAINT `fk_tiekejas` FOREIGN KEY (`fk_tiekejas`) REFERENCES `tiekejai` (`id`);

--
-- Constraints for table `uzsakymo_preke`
--
ALTER TABLE `uzsakymo_preke`
  ADD CONSTRAINT `fk_preke` FOREIGN KEY (`fk_preke`) REFERENCES `prekes` (`id`),
  ADD CONSTRAINT `fk_uzsakymas` FOREIGN KEY (`fk_uzsakymas`) REFERENCES `uzsakymas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
