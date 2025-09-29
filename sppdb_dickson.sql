-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2021 at 04:58 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sppdb_dickson`
--

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `idpengguna` varchar(12) NOT NULL,
  `password` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jantina` varchar(10) NOT NULL,
  `aras` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`idpengguna`, `password`, `nama`, `jantina`, `aras`) VALUES
('010223051224', '1224', 'Pru Peterson', 'LELAKI', 'PELAJAR'),
('010424069697', '9697', 'Gianpaolo Acardi', 'LELAKI', 'PELAJAR'),
('010630078655', '8655', 'Lin Ji-Hun ', 'LELAKI', 'PELAJAR'),
('030201070123', '0123', 'Hsu Chun Yuen', 'PEREMPUAN', 'PELAJAR'),
('030416072122', '2122', 'Vincenzo Guvenchy', 'LELAKI', 'PELAJAR'),
('031025052596', '2596', 'Jin Zheng Ho', 'LELAKI', 'PELAJAR'),
('040223072212', '2212', 'Aamir Khan', 'LELAKI', 'PELAJAR'),
('040302075432', '5432', 'Lee Chae-ri', 'PEREMPUAN', 'PELAJAR'),
('040503073322', '3322', 'Khadijah Khan', 'LELAKI', 'PELAJAR'),
('040506072324', '2324', 'Tonino Barzetti', 'LELAKI', 'PELAJAR'),
('040520073342', '3342', 'Tan Chong Wei', 'LELAKI', 'PELAJAR'),
('041023048878', '8878', 'Mahesh Ranjit Jung', 'LELAKI', 'PELAJAR'),
('041028070135', '0135', 'Deckson Lai', 'LELAKI', 'PELAJAR'),
('041029070135', '0135', 'Dickson Lai', 'LELAKI', 'GURU'),
('041123059234', '9234', 'Seo-Yeon Chan', 'LELAKI', 'PELAJAR'),
('050321057676', '7676', 'Neil Witherspoon', 'LELAKI', 'PELAJAR'),
('050427044576', '4576', 'Bora Tan Qing Kee', 'LELAKI', 'PELAJAR'),
('050612076556', '6556', 'Molly Thacker', 'PEREMPUAN', 'PELAJAR'),
('050621064522', '4522', 'Huan Ji-Soo ', 'PEREMPUAN', 'PELAJAR'),
('050719033453', '3453', 'Alfonso Chu', 'LELAKI', 'PELAJAR'),
('061212070112', '0112', 'Yuri Tamado', 'PEREMPUAN', 'PELAJAR'),
('061231074567', '4567', 'Seo-Jun Choi', 'LELAKI', 'PELAJAR'),
('070514073221', '3221', 'Niraj Hwan Chia', 'PEREMPUAN', 'PELAJAR'),
('070605035544', '5544', 'SITI BINTI KASIM', 'PEREMPUAN', 'PELAJAR'),
('111111111111', '1111', 'PENTADBIR SISTEM', 'LELAKI', 'ADMIN'),
('980321070334', '0334', 'Ming Meena Cho', 'PEREMPUAN', 'PELAJAR'),
('990302010223', '0223', 'Park Chae-Young', 'PEREMPUAN', 'PELAJAR');

-- --------------------------------------------------------

--
-- Table structure for table `perekodan`
--

CREATE TABLE `perekodan` (
  `idperekodan` int(11) NOT NULL,
  `idpengguna` varchar(12) NOT NULL,
  `idtopik` int(11) NOT NULL,
  `jenis` int(10) NOT NULL,
  `markah_didapat` int(5) NOT NULL,
  `masa` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `perekodan`
--

INSERT INTO `perekodan` (`idperekodan`, `idpengguna`, `idtopik`, `jenis`, `markah_didapat`, `masa`) VALUES
(23, '040520073342', 32, 1, 2, '2021-10-24 02:45:46'),
(25, '040520073342', 32, 1, 1, '2021-10-24 09:21:34'),
(35, '061231074567', 32, 1, 1, '2021-10-25 08:48:14'),
(37, '070514073221', 34, 2, 3, '2021-10-25 08:50:05'),
(38, '070514073221', 34, 2, 6, '2021-10-25 08:51:47'),
(40, '050427044576', 35, 1, 1, '2021-10-25 09:04:25'),
(42, '050321057676', 35, 1, 0, '2021-10-25 09:05:08'),
(43, '050321057676', 35, 1, 5, '2021-10-25 09:05:30'),
(44, '040520073342', 37, 1, 3, '2021-10-25 09:43:36'),
(45, '041028070135', 37, 1, 4, '2021-10-25 09:44:16'),
(46, '010223051224', 37, 1, 4, '2021-10-25 09:45:18'),
(47, '050427044576', 37, 1, 2, '2021-10-25 09:45:41'),
(48, '050612076556', 37, 1, 1, '2021-10-25 09:46:04'),
(49, '050621064522', 37, 1, 2, '2021-10-25 09:46:32'),
(50, '050621064522', 37, 1, 4, '2021-10-25 09:46:47'),
(51, '050719033453', 35, 1, 3, '2021-10-25 09:47:19'),
(52, '050719033453', 37, 1, 5, '2021-10-25 09:47:36'),
(53, '061231074567', 37, 1, 1, '2021-10-25 09:47:59'),
(54, '061212070112', 37, 1, 1, '2021-10-25 09:48:20'),
(55, '070514073221', 37, 1, 3, '2021-10-25 09:48:53'),
(56, '980321070334', 37, 1, 4, '2021-10-25 09:49:20');

-- --------------------------------------------------------

--
-- Table structure for table `pilihan`
--

CREATE TABLE `pilihan` (
  `idpilihan` int(11) NOT NULL,
  `bilangan` int(10) NOT NULL,
  `pilihan` varchar(20) NOT NULL,
  `jawapan` text NOT NULL,
  `idsoalan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pilihan`
--

INSERT INTO `pilihan` (`idpilihan`, `bilangan`, `pilihan`, `jawapan`, `idsoalan`) VALUES
(122, 1, '0', '5.76', 2),
(123, 1, '0', '2.55', 2),
(124, 1, '1', '7.85', 2),
(125, 1, '0', '10.55', 2),
(126, 2, '0', '2pi(theta)', 3),
(127, 2, '0', '(theta/360)*r^2', 3),
(128, 2, '0', 'r(theta)', 3),
(129, 2, '1', '(1/2)r^2(theta)', 3),
(152, 1, '', '78cm', 11),
(153, 1, '', '0.78m', 11),
(154, 1, '', '78 cm', 11),
(155, 1, '', '0.78 m', 11),
(156, 2, '', '1.2s', 12),
(157, 2, '', '1.2 s', 12),
(158, 2, '', '1.2sec', 12),
(159, 2, '', '1.2 sec', 12),
(160, 3, '', '65cm s-1', 13),
(161, 3, '', '65cm/s', 13),
(162, 3, '', '65 cm s-1', 13),
(163, 3, '', '65 cm/s', 13),
(164, 4, '', '50cm s-2', 14),
(165, 4, '', '50cm/s^2', 14),
(166, 4, '', '50 cm s-2', 14),
(167, 4, '', '50 cm/s^2', 14),
(168, 5, '', '10m s-1', 15),
(169, 5, '', '10 m s-1', 15),
(170, 5, '', '10m/s', 15),
(171, 5, '', '10 m/s', 15),
(172, 6, '', '100m', 16),
(173, 6, '', '100 m', 16),
(178, 1, '0', '1.2m', 18),
(179, 1, '1', '1.5m', 18),
(180, 1, '0', '2.1m', 18),
(181, 1, '0', '2.5m', 18),
(182, 2, '1', '19.63N', 19),
(183, 2, '0', '1.25E8N', 19),
(184, 2, '0', '3.20E11N', 19),
(185, 2, '0', '1.60E13N', 19),
(186, 3, '0', '1.92E5 m', 20),
(187, 3, '1', '3.82E5 m', 20),
(188, 3, '0', '4.12E5 m', 20),
(189, 3, '0', '3.74E5 m', 20),
(190, 4, '0', 'A', 21),
(191, 4, '1', 'B', 21),
(192, 4, '0', 'C', 21),
(193, 4, '0', 'D', 21),
(194, 5, '0', '1.59 m s-2', 22),
(195, 5, '1', '1.62 m s-2', 22),
(196, 5, '0', '1.72 m s-2', 22),
(197, 5, '0', '1.83 m s-2', 22),
(198, 1, '1', '30', 23),
(199, 1, '0', '60', 23),
(200, 1, '0', '45', 23),
(201, 1, '0', '90', 23),
(202, 2, '0', 'undefined', 24),
(203, 2, '0', '0.3', 24),
(204, 2, '1', '0.5', 24),
(205, 2, '0', '1', 24),
(206, 3, '0', '-5/13', 25),
(207, 3, '0', '-5/12', 25),
(208, 3, '1', '-12/13', 25),
(209, 3, '0', '-12/5', 25),
(210, 4, '0', '27.5', 26),
(211, 4, '0', '48', 26),
(212, 4, '1', '55', 26),
(213, 4, '0', '60', 26),
(214, 5, '0', '-4/3', 27),
(215, 5, '1', '-3/4', 27),
(216, 5, '0', '-3/5', 27),
(217, 5, '0', '-4/5', 27);

-- --------------------------------------------------------

--
-- Table structure for table `soalan`
--

CREATE TABLE `soalan` (
  `idsoalan` int(11) NOT NULL,
  `bilangan` int(11) NOT NULL,
  `item` text NOT NULL,
  `jenis` int(10) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `idtopik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `soalan`
--

INSERT INTO `soalan` (`idsoalan`, `bilangan`, `item`, `jenis`, `gambar`, `idtopik`) VALUES
(2, 1, 's=r(theta)\r\nwhen r=5, what is the arc length of a quarter of circle?', 1, '', 32),
(3, 2, 'what is the formula of area of circle in terms of pi?', 1, '', 32),
(11, 1, '1. The diagram below shows a ticker tape chart produced by a moving trolley. The frequency of the ticker timer is 50Hz. Each strip contains 10 ticks. \r\na) Calculate distance travelled by the trolley.', 2, '247894067_635877494070265_2428863349924981238_n59898.jpg', 34),
(12, 2, 'b) Calculate the total time taken by the trolley.', 2, '247894067_635877494070265_2428863349924981238_n55785.jpg', 34),
(13, 3, 'Calculate the average velocity of the trolley.', 2, '247894067_635877494070265_2428863349924981238_n20016.jpg', 34),
(14, 4, 'Calculate the acceleration of the trolley.', 2, '247894067_635877494070265_2428863349924981238_n83989.jpg', 34),
(15, 5, '2. A car moves from rest with an acceleration  of 2m s-2 for 5s. It then moves with constant velocity for 10s.\r\na) Calculate the uniform velocity travelled by the car.', 2, '', 34),
(16, 6, 'b) Calculate the distance travelled by the car with uniform velocity.', 2, '', 34),
(18, 1, 'The diagram shows two object of mass 75kg and 90kg respectively are separated by a distance, D.\r\nIf the gravitational force between the two object is 2.0E-7 N and the value of gravitational constant is 6.67E-11 m2 kg-2, D is', 1, '247690171_579282256645018_1078851220569399023_n46133.jpg', 35),
(19, 2, 'If the radius of the Earth is 6.37E6 m and mass of Earth is 5.97E24 kg, what is the gravitational force exerted on the Earth by the object with 2kg?', 1, '247644198_414328153437291_6777842745369097706_n86936.jpg', 35),
(20, 3, 'The diagram below shows Moon revolving around Earth. The force that pulls the Moon towards the Earth is 2.01E20 N. Calculate distance between Earth and Moon.\r\n[Mass of Earth=5.97E24 kg, Mass of Moon=7.35E22 kg]\r\n', 1, '247555513_924696081804565_6609586860583536118_n80870.jpg', 35),
(21, 4, 'Which of the following graph is correct? (g=gravitational acceleration, r=distance from the centre of Earth, R=radius of Earth)', 1, '247624973_1279939399125382_4911473144341156158_n44570.jpg', 35),
(22, 5, 'The mass of Moon is 7.35E22 kg and its radius is 1.74E6 m. What is the gravitational acceleration on the surface of Moon? [G=6.67E-11 N m2 kg-2]', 1, '', 35),
(23, 1, 'sin x=0.5. x=?', 1, '', 37),
(24, 2, 'cos 60=?', 1, 'cos6017668.png', 37),
(25, 3, 'In diagram 1, QTS is a straight line and T is the midpoint of QS. Find cos x.', 1, '248693668_693572125367213_71334994252098507_n56719.jpg', 37),
(26, 4, 'In diagram 2, LMN is a straight line. sin p= 7/25, tan q=0.5, The length, in cm, of LMN is', 1, '248187597_5156946160988732_8314250902642549480_n70906.jpg', 37),
(27, 5, 'In diagram 4, PQR is a straight line and PQ=QR. PR=16cm, SQ=10cm. The value of tan k is', 1, '', 37);

-- --------------------------------------------------------

--
-- Table structure for table `subjek`
--

CREATE TABLE `subjek` (
  `idsubjek` int(11) NOT NULL,
  `subjek` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjek`
--

INSERT INTO `subjek` (`idsubjek`, `subjek`) VALUES
(2, 'Additional Mathematics'),
(8, 'Math'),
(9, 'Physics');

-- --------------------------------------------------------

--
-- Table structure for table `topik`
--

CREATE TABLE `topik` (
  `idtopik` int(11) NOT NULL,
  `topik` varchar(30) NOT NULL,
  `markah` int(11) NOT NULL,
  `idsubjek` int(11) NOT NULL,
  `idpengguna` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `topik`
--

INSERT INTO `topik` (`idtopik`, `topik`, `markah`, `idsubjek`, `idpengguna`) VALUES
(32, 'Chapter 1:Circular Measure', 20, 2, '041029070135'),
(34, 'Force and Motion I', 20, 9, '041029070135'),
(35, 'Gravitation', 10, 9, '041029070135'),
(37, 'Chapter 6: Trigonometry', 20, 8, '041029070135');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`idpengguna`),
  ADD UNIQUE KEY `idpengguna` (`idpengguna`);

--
-- Indexes for table `perekodan`
--
ALTER TABLE `perekodan`
  ADD PRIMARY KEY (`idperekodan`),
  ADD KEY `idpengguna` (`idpengguna`),
  ADD KEY `idtopik` (`idtopik`);

--
-- Indexes for table `pilihan`
--
ALTER TABLE `pilihan`
  ADD PRIMARY KEY (`idpilihan`),
  ADD KEY `idsoalan` (`idsoalan`);

--
-- Indexes for table `soalan`
--
ALTER TABLE `soalan`
  ADD PRIMARY KEY (`idsoalan`),
  ADD KEY `idtopik` (`idtopik`);

--
-- Indexes for table `subjek`
--
ALTER TABLE `subjek`
  ADD PRIMARY KEY (`idsubjek`);

--
-- Indexes for table `topik`
--
ALTER TABLE `topik`
  ADD PRIMARY KEY (`idtopik`),
  ADD KEY `idpengguna` (`idpengguna`),
  ADD KEY `idsubjek` (`idsubjek`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `perekodan`
--
ALTER TABLE `perekodan`
  MODIFY `idperekodan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `pilihan`
--
ALTER TABLE `pilihan`
  MODIFY `idpilihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=222;

--
-- AUTO_INCREMENT for table `soalan`
--
ALTER TABLE `soalan`
  MODIFY `idsoalan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `subjek`
--
ALTER TABLE `subjek`
  MODIFY `idsubjek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `topik`
--
ALTER TABLE `topik`
  MODIFY `idtopik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `perekodan`
--
ALTER TABLE `perekodan`
  ADD CONSTRAINT `perekodan_ibfk_1` FOREIGN KEY (`idpengguna`) REFERENCES `pengguna` (`idpengguna`),
  ADD CONSTRAINT `perekodan_ibfk_2` FOREIGN KEY (`idtopik`) REFERENCES `topik` (`idtopik`);

--
-- Constraints for table `pilihan`
--
ALTER TABLE `pilihan`
  ADD CONSTRAINT `pilihan_ibfk_1` FOREIGN KEY (`idsoalan`) REFERENCES `soalan` (`idsoalan`);

--
-- Constraints for table `soalan`
--
ALTER TABLE `soalan`
  ADD CONSTRAINT `soalan_ibfk_2` FOREIGN KEY (`idtopik`) REFERENCES `topik` (`idtopik`);

--
-- Constraints for table `topik`
--
ALTER TABLE `topik`
  ADD CONSTRAINT `topik_ibfk_1` FOREIGN KEY (`idpengguna`) REFERENCES `pengguna` (`idpengguna`),
  ADD CONSTRAINT `topik_ibfk_3` FOREIGN KEY (`idsubjek`) REFERENCES `subjek` (`idsubjek`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
