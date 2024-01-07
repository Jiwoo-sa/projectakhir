-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2024 at 06:44 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banksampah`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_sampah`
--

CREATE TABLE `data_sampah` (
  `id_sampah` int(11) NOT NULL,
  `nama_sampah` varchar(20) NOT NULL,
  `jns_sampah` enum('organik','anorganik') NOT NULL,
  `harga` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_sampah`
--

INSERT INTO `data_sampah` (`id_sampah`, `nama_sampah`, `jns_sampah`, `harga`) VALUES
(2, 'Besi', 'anorganik', '10000'),
(3, 'Almunium', 'anorganik', '5000'),
(4, 'Kertas', 'organik', '3000');

-- --------------------------------------------------------

--
-- Table structure for table `detail_penukaran`
--

CREATE TABLE `detail_penukaran` (
  `kode_detail` int(11) NOT NULL,
  `kode_penukaran` varchar(100) NOT NULL,
  `kode_sembako` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_penukaran`
--

INSERT INTO `detail_penukaran` (`kode_detail`, `kode_penukaran`, `kode_sembako`, `harga`, `jumlah`) VALUES
(1, '0', 1, 15000, 2),
(2, 'TR - 184508122303', 1, 15000, 2),
(3, 'TR - 210740122303', 1, 15000, 2),
(4, 'TR - 222159122319', 2, 20000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `detail_penukaran_temp`
--

CREATE TABLE `detail_penukaran_temp` (
  `kode_detail` int(11) NOT NULL,
  `kode_penukaran` varchar(100) NOT NULL,
  `kode_sembako` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_penukaran_temp`
--

INSERT INTO `detail_penukaran_temp` (`kode_detail`, `kode_penukaran`, `kode_sembako`, `harga`, `jumlah`) VALUES
(1, '0', 1, 15000, 2),
(2, '0', 1, 15000, 2),
(3, 'TR - 061211112324', 2, 20000, 2),
(4, 'TR - 061323112324', 1, 15000, 2),
(5, 'TR - 061656112324', 2, 20000, 2),
(7, 'TR - 063516112324', 1, 15000, 2),
(8, 'TR - 063703112324', 1, 15000, 2),
(9, 'TR - 063740112324', 1, 15000, 2),
(10, 'TR - 063908112324', 2, 20000, 2),
(11, 'TR - 064007112324', 1, 15000, 2),
(12, 'TR - 075228122301', 2, 20000, 1),
(13, 'TR - 184508122303', 1, 15000, 2),
(14, 'TR - 210740122303', 1, 15000, 2),
(15, 'TR - 223146122311', 2, 20000, 2),
(16, 'TR - 222159122319', 2, 20000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `informasi`
--

CREATE TABLE `informasi` (
  `kode_informasi` int(11) NOT NULL,
  `judul_informasi` varchar(255) DEFAULT NULL,
  `isi_informasi` text DEFAULT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `informasi`
--

INSERT INTO `informasi` (`kode_informasi`, `judul_informasi`, `isi_informasi`, `foto`) VALUES
(1, 'Kegiatan Transaksi Bank Sampah Harum Melati', 'Pada gambar disamping merupakan kegiatan transaksi bank sampah harum melati, mari para masyarakat untuk bergabung menjadi anggota bannk sampah harum melati dengan menabung sampah bisa menjadi uang, bisa juga ditukar dengan sembako sesuai dengan kebutuhan yang diinginkan.', 'Observasi1_1.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `penarikan`
--

CREATE TABLE `penarikan` (
  `id_tarik` int(11) NOT NULL,
  `id_nasabah` int(11) NOT NULL,
  `tgl_tarik` date NOT NULL,
  `jmlh_tarik` varchar(12) NOT NULL,
  `sisa_saldo` varchar(12) NOT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penarikan`
--

INSERT INTO `penarikan` (`id_tarik`, `id_nasabah`, `tgl_tarik`, `jmlh_tarik`, `sisa_saldo`, `id_admin`) VALUES
(1, 2, '2023-11-17', '1000', '19000', 10),
(2, 2, '2023-11-17', '1000', '18000', 10),
(3, 16, '2023-11-26', '15000', '70000', 1),
(4, 16, '2023-11-26', '10000', '60000', 10),
(6, 16, '2023-12-01', '10000', '50000', 10),
(7, 16, '2023-12-03', '10000', '37000', 10),
(8, 16, '2023-12-12', '10000', '12000', 10),
(10, 16, '2023-12-12', '7000', '140000', 10),
(11, 16, '2023-12-12', '10000', '130000', 10),
(12, 16, '2023-12-19', '10000', '120000', 10);

-- --------------------------------------------------------

--
-- Table structure for table `sembako`
--

CREATE TABLE `sembako` (
  `kode_sembako` int(11) NOT NULL,
  `nama_sembako` varchar(30) NOT NULL,
  `satuan` varchar(30) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sembako`
--

INSERT INTO `sembako` (`kode_sembako`, `nama_sembako`, `satuan`, `harga`) VALUES
(1, 'Beras', 'Kg', 15000),
(2, 'Minyak Goreng', 'Liter', 20000),
(3, 'Gula', 'Kg', 13000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `kode_trans` varchar(255) NOT NULL,
  `tgl` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `total_trans` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`kode_trans`, `tgl`, `id_user`, `keterangan`, `total_trans`) VALUES
('TR  ', '2023-11-05', 1, 'Selesai', '1000'),
('TR - 013544122302', '2023-12-02', 16, 'Selesai', '27000'),
('TR - 023418122312', '2023-12-12', 16, 'Selesai', '10000'),
('TR - 023507122312', '2023-12-12', 16, 'Selesai', '5000'),
('TR - 025922112317', '2023-11-17', 16, 'Selesai', '60000'),
('TR - 032542112317', '2023-11-17', 16, 'Selesai', '25000'),
('TR - 033644122312', '2023-12-12', 16, 'Selesai', '135000'),
('TR - 033854122312', '2023-12-12', 2, 'Selesai', '100000'),
('TR - 215859122326', '2023-12-26', 2, 'Selesai', '60000'),
('TR - 223246122312', '2023-12-12', 23, 'Selesai', '10000'),
('TR - 233218112311', '2023-11-11', 2, 'Selesai', '60000'),
('TR - 233720112311', '2023-11-11', 2, 'Selesai', '10000'),
('TR - 233826112311', '2023-11-11', 2, 'Selesai', '10000');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_penukaran`
--

CREATE TABLE `transaksi_penukaran` (
  `kode_penukaran` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `Id_nasabah` int(11) NOT NULL,
  `total_penukaran` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi_penukaran`
--

INSERT INTO `transaksi_penukaran` (`kode_penukaran`, `tgl`, `Id_nasabah`, `total_penukaran`, `id_petugas`) VALUES
(1, '2023-11-24', 16, 40000, 1),
(3, '2023-12-03', 16, 30000, 10),
(4, '2023-12-03', 16, 30000, 10),
(5, '2023-12-19', 16, 40000, 10);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_tabel`
--

CREATE TABLE `transaksi_tabel` (
  `id_detail` int(11) NOT NULL,
  `kode_trans` varchar(255) NOT NULL,
  `id_sampah` int(11) NOT NULL,
  `harga` varchar(12) NOT NULL,
  `jmlh_sampah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi_tabel`
--

INSERT INTO `transaksi_tabel` (`id_detail`, `kode_trans`, `id_sampah`, `harga`, `jmlh_sampah`) VALUES
(1, 'TR - 233218112311', 2, '5000', 12),
(2, 'TR - 233826112311', 2, '5000', 2),
(3, 'TR - 025922112317', 2, '5000', 12),
(4, 'TR - 032542112317', 3, '5000', 5),
(6, 'TR - 064253122301', 3, '5000', 9),
(7, 'TR - 064613122301', 4, '3000', 2),
(8, 'TR - 013544122302', 4, '3000', 9),
(9, 'TR - 023418122312', 2, '5000', 2),
(10, 'TR - 023507122312', 2, '5000', 1),
(11, 'TR - 033644122312', 3, '5000', 12),
(12, 'TR - 033644122312', 2, '5000', 15),
(13, 'TR - 033854122312', 3, '5000', 20),
(14, 'TR - 223246122312', 3, '5000', 2),
(15, 'TR - 215859122326', 3, '5000', 12);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_temp`
--

CREATE TABLE `transaksi_temp` (
  `id_detail` int(11) NOT NULL,
  `kodeheader` varchar(100) NOT NULL,
  `tgl` date NOT NULL,
  `id_sampah` int(11) NOT NULL,
  `harga` varchar(12) NOT NULL,
  `jmlh_sampah` int(11) NOT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi_temp`
--

INSERT INTO `transaksi_temp` (`id_detail`, `kodeheader`, `tgl`, `id_sampah`, `harga`, `jmlh_sampah`, `user`) VALUES
(1, 'TR - 223807112311', '2023-11-11', 3, '5000', 2, 6),
(2, 'TR - 225346112311', '2023-11-11', 2, '5000', 2, 2),
(3, 'TR - 225439112311', '2023-11-11', 2, '5000', 2, 2),
(4, 'TR - 225533112311', '2023-11-11', 2, '5000', 2, 2),
(5, 'TR - 225533112311', '2023-11-11', 3, '5000', 6, 2),
(8, 'TR - 231312112311', '2023-11-11', 2, '5000', 2, 2),
(9, 'TR - 233107112311', '2023-11-11', 2, '5000', 12, 2),
(11, 'TR - 233720112311', '2023-11-11', 3, '5000', 2, 2),
(16, 'TR - 035327112317', '2023-11-17', 2, '5000', 12, 16),
(18, 'TR - 005710112318', '2023-11-18', 2, '5000', 12, 16),
(27, 'TR - 222321122311', '2023-12-11', 0, '', 12, 16),
(28, 'TR - 222557122311', '2023-12-11', 0, '', 2, 16),
(29, 'TR - 222557122311', '2023-12-11', 3, '5000', 12, 16),
(30, 'TR - 223357122311', '2023-12-11', 3, '5000', 12, 16),
(34, 'TR - 023642122312', '2023-12-12', 3, '5000', 9, 16),
(38, 'TR - 040526122312', '2023-12-12', 0, '', 12, 0),
(39, 'TR - 040621122312', '2023-12-12', 0, '', 12, 0),
(42, 'TR - 041214122312', '2023-12-12', 0, '', 0, 16),
(43, 'TR - 041241122312', '2023-12-12', 0, '', 0, 0),
(44, 'TR - 041550122312', '2023-12-12', 0, '', 0, 0),
(45, 'TR - 041618122312', '2023-12-12', 0, '', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `jns_kelamin` varchar(10) NOT NULL,
  `hak_akses` enum('admin','user') NOT NULL,
  `saldo` varchar(12) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `alamat`, `no_hp`, `jns_kelamin`, `hak_akses`, `saldo`, `username`, `password`) VALUES
(1, 'Satrio', 'pisangsari', '09876', 'laki-laki', 'admin', '0', 'satrio', 'eec470e2f66e97a2ff82bcb62897375a'),
(2, 'Sajiwo', 'Panjang Wetan', '0987654', 'laki-laki', 'user', '60000', 'sajiwo', 'f10d673f56161650051724f39a2d5497'),
(10, 'Subagiyo', 'Gg Cucut', '123455', 'laki-laki', 'admin', '0', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(16, 'Septiyan Bagus Sajiwo', 'Pisang Sari', '08229337', 'Laki - Lak', 'user', '80000', 'nasabah', '81dc9bdb52d04dc20036dbd8313ed055'),
(23, 'Dodi', 'Kajen', '086', 'Laki - Lak', 'user', '10000', 'dodi', 'dc82a0e0107a31ba5d137a47ab09a26b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_sampah`
--
ALTER TABLE `data_sampah`
  ADD PRIMARY KEY (`id_sampah`);

--
-- Indexes for table `detail_penukaran`
--
ALTER TABLE `detail_penukaran`
  ADD PRIMARY KEY (`kode_detail`);

--
-- Indexes for table `detail_penukaran_temp`
--
ALTER TABLE `detail_penukaran_temp`
  ADD PRIMARY KEY (`kode_detail`);

--
-- Indexes for table `informasi`
--
ALTER TABLE `informasi`
  ADD PRIMARY KEY (`kode_informasi`);

--
-- Indexes for table `penarikan`
--
ALTER TABLE `penarikan`
  ADD PRIMARY KEY (`id_tarik`);

--
-- Indexes for table `sembako`
--
ALTER TABLE `sembako`
  ADD PRIMARY KEY (`kode_sembako`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`kode_trans`);

--
-- Indexes for table `transaksi_penukaran`
--
ALTER TABLE `transaksi_penukaran`
  ADD PRIMARY KEY (`kode_penukaran`);

--
-- Indexes for table `transaksi_tabel`
--
ALTER TABLE `transaksi_tabel`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `transaksi_temp`
--
ALTER TABLE `transaksi_temp`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_sampah`
--
ALTER TABLE `data_sampah`
  MODIFY `id_sampah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `detail_penukaran`
--
ALTER TABLE `detail_penukaran`
  MODIFY `kode_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `detail_penukaran_temp`
--
ALTER TABLE `detail_penukaran_temp`
  MODIFY `kode_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `informasi`
--
ALTER TABLE `informasi`
  MODIFY `kode_informasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `penarikan`
--
ALTER TABLE `penarikan`
  MODIFY `id_tarik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sembako`
--
ALTER TABLE `sembako`
  MODIFY `kode_sembako` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaksi_penukaran`
--
ALTER TABLE `transaksi_penukaran`
  MODIFY `kode_penukaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaksi_tabel`
--
ALTER TABLE `transaksi_tabel`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `transaksi_temp`
--
ALTER TABLE `transaksi_temp`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
