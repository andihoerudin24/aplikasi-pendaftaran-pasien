-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2018 at 11:15 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rs_sakit`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis_berobat`
--

CREATE TABLE `jenis_berobat` (
  `id` int(11) NOT NULL,
  `jenis_pasien` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_berobat`
--

INSERT INTO `jenis_berobat` (`id`, `jenis_pasien`) VALUES
(1, 'pasian_baru'),
(2, 'pasien_rujukan'),
(4, 'pasien_lama '),
(5, 'pasien_berobat_jalan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dokter`
--

CREATE TABLE `tbl_dokter` (
  `id_dokter` int(11) NOT NULL,
  `nama_dokter` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `jenis_dokter` varchar(200) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_dokter`
--

INSERT INTO `tbl_dokter` (`id_dokter`, `nama_dokter`, `alamat`, `jenis_dokter`, `no_hp`, `foto`) VALUES
(1, 'dr andi hoerudin', 'bogor', 'spesialis', '089638889862', '551634-calon-dokter-muda-ini-cantiknya-bikin-cowok-rela-pura-pura-sakit1.png'),
(2, 'andi', 'cibinong', 'spesialis', '089638889862', '551620-calon-dokter-muda-ini-cantiknya-bikin-cowok-rela-pura-pura-sakit.jpg'),
(4, 'yuliana', 'bogor', 'SPESIALIS', '089638889862', '135215_sssc.jpg'),
(5, 'rahma', 'cibinong', 'spesialis', '089638889862', '551620-calon-dokter-muda-ini-cantiknya-bikin-cowok-rela-pura-pura-sakit2.jpg'),
(6, 'rohamah', 'cibinong', 'kandungan', '089638889862', '551634-calon-dokter-muda-ini-cantiknya-bikin-cowok-rela-pura-pura-sakit2.png'),
(7, 'sobi', 'cibinong', 'spesialis', '089638889862', '551622-calon-dokter-muda-ini-cantiknya-bikin-cowok-rela-pura-pura-sakit.jpg'),
(8, 'dokter fani ', 'cibinong', 'umum', '089638889862', 'anisa.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jadwal`
--

CREATE TABLE `tbl_jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `hari` varchar(20) NOT NULL,
  `detal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jadwal`
--

INSERT INTO `tbl_jadwal` (`id_jadwal`, `tanggal`, `hari`, `detal`) VALUES
(1, '2018-06-16', 'senin', '2018-06-16 14:34:50'),
(2, '2018-06-19', 'selasa', '2018-06-19 14:14:07'),
(3, '2018-06-20', 'rabu', '2018-06-19 14:14:29'),
(4, '2018-06-21', 'kamis', '2018-06-19 14:14:29'),
(5, '2018-06-22', 'jumat', '2018-06-19 14:14:42'),
(6, '2018-06-23', 'sabtu', '2018-06-19 14:15:00'),
(7, '2018-06-23', 'minggu', '2018-06-19 14:15:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pasien`
--

CREATE TABLE `tbl_pasien` (
  `id_pasien` int(11) NOT NULL,
  `id_jenis_pasien` int(11) NOT NULL,
  `no_pasien` varchar(200) NOT NULL,
  `nama_pasien` varchar(40) NOT NULL,
  `alamat` varchar(70) NOT NULL,
  `no_ktp` varchar(30) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `keterangan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pasien`
--

INSERT INTO `tbl_pasien` (`id_pasien`, `id_jenis_pasien`, `no_pasien`, `nama_pasien`, `alamat`, `no_ktp`, `tanggal`, `keterangan`) VALUES
(3, 2, 'AR001', 'contoh', 'bogor', '32939383992', '2018-06-20 11:57:56', 'pasien baru'),
(4, 1, 'AR002', 'contoh ke 10', 'contoh', '3293938383', '2018-06-20 12:04:37', 'contoh');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi_jadwal`
--

CREATE TABLE `tbl_transaksi_jadwal` (
  `id_transaksi_jadwal` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `keterangan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_transaksi_jadwal`
--

INSERT INTO `tbl_transaksi_jadwal` (`id_transaksi_jadwal`, `id_dokter`, `id_jadwal`, `keterangan`) VALUES
(1, 1, 1, 'keterangan'),
(2, 2, 4, 'andi adanya dihari rabu DAN KAMIS'),
(3, 1, 3, 'adanya ari selasa'),
(4, 5, 2, 'dokter motivator'),
(5, 6, 2, 'adanya hari selasa'),
(6, 7, 1, 'contoh'),
(7, 8, 4, 'adanya hari kamis'),
(8, 1, 3, 'ada');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`) VALUES
(1, 'andihoerudin', 'andihoerudin');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_daftar`
-- (See below for the actual view)
--
CREATE TABLE `v_daftar` (
`no_ktp` varchar(30)
,`id_pasien` int(11)
,`no_pasien` varchar(200)
,`nama_pasien` varchar(40)
,`alamat` varchar(70)
,`keterangan` varchar(200)
,`tanggal` timestamp
,`jenis_pasien` varchar(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_jadwal`
-- (See below for the actual view)
--
CREATE TABLE `v_jadwal` (
`id_transaksi_jadwal` int(11)
,`nama_dokter` varchar(100)
,`jenis_dokter` varchar(200)
,`keterangan` varchar(200)
,`foto` text
,`hari` varchar(20)
);

-- --------------------------------------------------------

--
-- Structure for view `v_daftar`
--
DROP TABLE IF EXISTS `v_daftar`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_daftar`  AS  select `ts`.`no_ktp` AS `no_ktp`,`ts`.`id_pasien` AS `id_pasien`,`ts`.`no_pasien` AS `no_pasien`,`ts`.`nama_pasien` AS `nama_pasien`,`ts`.`alamat` AS `alamat`,`ts`.`keterangan` AS `keterangan`,`ts`.`tanggal` AS `tanggal`,`js`.`jenis_pasien` AS `jenis_pasien` from (`tbl_pasien` `ts` join `jenis_berobat` `js`) where (`ts`.`id_jenis_pasien` = `js`.`id`) ;

-- --------------------------------------------------------

--
-- Structure for view `v_jadwal`
--
DROP TABLE IF EXISTS `v_jadwal`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_jadwal`  AS  select `tj`.`id_transaksi_jadwal` AS `id_transaksi_jadwal`,`td`.`nama_dokter` AS `nama_dokter`,`td`.`jenis_dokter` AS `jenis_dokter`,`tj`.`keterangan` AS `keterangan`,`td`.`foto` AS `foto`,`tbj`.`hari` AS `hari` from ((`tbl_transaksi_jadwal` `tj` join `tbl_dokter` `td`) join `tbl_jadwal` `tbj`) where ((`tj`.`id_jadwal` = `tbj`.`id_jadwal`) and (`tj`.`id_dokter` = `td`.`id_dokter`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis_berobat`
--
ALTER TABLE `jenis_berobat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_dokter`
--
ALTER TABLE `tbl_dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `tbl_pasien`
--
ALTER TABLE `tbl_pasien`
  ADD PRIMARY KEY (`id_pasien`),
  ADD KEY `id_jenis_pasien` (`id_jenis_pasien`);

--
-- Indexes for table `tbl_transaksi_jadwal`
--
ALTER TABLE `tbl_transaksi_jadwal`
  ADD PRIMARY KEY (`id_transaksi_jadwal`),
  ADD KEY `id_dokter` (`id_dokter`),
  ADD KEY `id_jadwal` (`id_jadwal`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis_berobat`
--
ALTER TABLE `jenis_berobat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_dokter`
--
ALTER TABLE `tbl_dokter`
  MODIFY `id_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_pasien`
--
ALTER TABLE `tbl_pasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_transaksi_jadwal`
--
ALTER TABLE `tbl_transaksi_jadwal`
  MODIFY `id_transaksi_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_pasien`
--
ALTER TABLE `tbl_pasien`
  ADD CONSTRAINT `tbl_pasien_ibfk_1` FOREIGN KEY (`id_jenis_pasien`) REFERENCES `jenis_berobat` (`id`);

--
-- Constraints for table `tbl_transaksi_jadwal`
--
ALTER TABLE `tbl_transaksi_jadwal`
  ADD CONSTRAINT `tbl_transaksi_jadwal_ibfk_1` FOREIGN KEY (`id_dokter`) REFERENCES `tbl_dokter` (`id_dokter`),
  ADD CONSTRAINT `tbl_transaksi_jadwal_ibfk_2` FOREIGN KEY (`id_jadwal`) REFERENCES `tbl_jadwal` (`id_jadwal`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
