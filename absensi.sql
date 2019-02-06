-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 06, 2019 at 02:31 PM
-- Server version: 5.7.25-0ubuntu0.18.04.2
-- PHP Version: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absensi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `nama_login` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `last_logout` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `nama_login`, `password`, `last_login`, `last_logout`) VALUES
(1, 'Firdauz Fanani', 'firdauzfanani@gmail.com', '123456', '2019-02-06 13:29:05', '2019-02-06 13:11:45');

-- --------------------------------------------------------

--
-- Table structure for table `camera`
--

CREATE TABLE `camera` (
  `id_camera` int(100) NOT NULL,
  `nama_camera` varchar(50) NOT NULL,
  `rtsp_camera` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `camera`
--

INSERT INTO `camera` (`id_camera`, `nama_camera`, `rtsp_camera`) VALUES
(1, 'Kamera Mushola', 'rtsp://admin:gspe12345@192.168.0.26:554/PSIA/streaming/channels/101'),
(2, 'Kamera Ruang Mushola 1', 'rtsp://admin:gspe12345@192.168.0.26:554/PSIA/streaming/channels/201'),
(3, 'Kamera Ruang Kerja 1', 'rtsp://admin:gspe12345@192.168.0.26:554/PSIA/streaming/channels/301'),
(4, 'Kamera Ruang Kerja 2', 'rtsp://admin:gspe12345@192.168.0.26:554/PSIA/streaming/channels/401'),
(5, 'Kamera Lantai 2', 'rtsp://admin:gspe12345@192.168.0.26:554/PSIA/streaming/channels/501'),
(6, 'Kamera Lantai 3', 'rtsp://admin:gspe12345@192.168.0.26:554/PSIA/streaming/channels/601'),
(7, 'Kamera Lantai 3 Tangga', 'rtsp://admin:gspe12345@192.168.0.26:554/PSIA/streaming/channels/701'),
(8, 'Kamera Resepsionis', 'rtsp://admin:gspe12345@192.168.0.26:554/PSIA/streaming/channels/801'),
(9, 'Kamera Parkir 1', 'rtsp://admin:gspe12345@192.168.0.26:554/PSIA/streaming/channels/901'),
(10, 'Kamera Lantai 1', 'rtsp://admin:gspe12345@192.168.0.26:554/PSIA/streaming/channels/1001'),
(11, 'Kamera Parkir 2', 'rtsp://admin:gspe12345@192.168.0.26:554/PSIA/streaming/channels/1601');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `id_pegawai` bigint(20) NOT NULL,
  `id_telegram` int(11) NOT NULL,
  `nama_pegawai` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `divisi` varchar(30) NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `warning1` varchar(50) DEFAULT NULL,
  `warning2` varchar(50) DEFAULT NULL,
  `warning3` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `id_pegawai`, `id_telegram`, `nama_pegawai`, `email`, `no_hp`, `divisi`, `jabatan`, `warning1`, `warning2`, `warning3`) VALUES
(2, 12346, 668662889, 'Riyadi Agung Suharto', '0', '0817737727', 'HRD', 'Manager IOT', 'Surat Peringatan 1', 'Coaching By HRD', 'Penalty Sesuai Kesepakatan'),
(3, 12347, 750150427, 'Teoderikus Ferdian', '0', '087839659675', 'Marketing', 'Manager Marketing', NULL, NULL, NULL),
(4, 12348, 376571445, 'Wahyudi Prasatia', '0', '085363236007', 'Marketing', 'Staf', 'Surat Peringatan 1', NULL, NULL),
(5, 12349, 692286966, 'Muhammad Reiza Syaifullah', 'firdauz.fanani@mail.ugm.ac.id', '085274521796', 'HRD', 'Manager HRD', 'Surat Peringatan 1', 'Coaching By HRD', NULL),
(6, 12340, 644107942, 'Liza A Barezi', 'lizabarezi@gspe.co.id', '085725180999', 'HRD', 'Staf', NULL, NULL, NULL),
(7, 12341, 764143199, 'Vicky Yuliandi Siahaan', '0', '08128552527', 'HRD', 'Staf', NULL, NULL, NULL),
(8, 12342, 723606683, 'Faza Ghassani', '0', '089676824961', 'Produksi', 'Manager Produksi', 'Surat Peringatan 1', 'Coaching By HRD', NULL),
(9, 12343, 252488349, 'Muhammad Yasir Abdulazis', '0', '081703078960', 'Procurement', 'Staf', 'Surat Peringatan 1', NULL, NULL),
(10, 12350, 757158209, 'Dwi Prasetyo', '0', '085224666426', 'Procurement', 'Staf', 'Surat Peringatan 1', 'Coaching By HRD', NULL),
(11, 12351, 670747420, 'Imam Sulthon', '0', '081917558038', 'HRD', 'Staf', NULL, NULL, NULL),
(12, 12354, 788061070, 'Abdul Rohman', '0', '085795735556', 'Resepsionis', 'Staf', 'Surat Peringatan 1', NULL, NULL),
(13, 13451, 690578780, 'Gusli Arifin', 'gusli@gspe.com', '082283802775', 'Maintenance', 'Staf', NULL, NULL, NULL),
(14, 12612, 276178321, 'Tonny Siregar', 'tonys@gspe.co.id', '081908999079', 'CRC', 'Manager CRC', NULL, NULL, NULL),
(15, 12653, 798925359, 'Ahmad Kusaeri', 'ahmadk@gspe.co.id', '0851274123', 'CRC', 'Staf', NULL, NULL, NULL),
(16, 41245, 690578780, 'Wahyu Hidayat', 'wahyu@gspe.co.id', '0861232331', 'Maintenance', 'Staf', NULL, NULL, NULL),
(17, 13671, 707062800, 'Intan Liems', 'intan@gspe.co.id', '08161933863', 'HRD', 'Manager HRD', NULL, NULL, NULL),
(18, 76123, 559842343, 'Sentosa', 'sentosa@gspe.co.id', '0851752335', 'ERP', 'Manager ERP', NULL, NULL, NULL),
(19, 51314, 205017793, 'Randy Evan Wijaya', 'randy@gspe.co.id', '08512123551', 'Visitor', 'Visitor', 'Surat Peringatan 1', NULL, NULL),
(20, 14512, 205017793, 'Garry Glen Wijaya', 'garry@gspe.com', '08512512314', 'Visitor', 'Visitor', 'Surat Peringatan 1', NULL, NULL),
(21, 123412, 205017793, 'Clayton', 'Claythw@gmail.com', '90955425', 'IT', 'Test', 'Surat Peringatan 1', NULL, NULL),
(23, 12345, 205017793, 'Firdauz Fanani', 'firdauzfanani@gmail.com', '0815679205789', 'IT', 'Staf', 'Surat Peringatan 1', 'Coaching By HRD', NULL),
(24, 232331, 205017793, 'Yanto Liem', 'tes@gmail.com', '085123412331', 'IT ', 'Manager IT', 'Surat Peringatan 1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `face_absensi`
--

CREATE TABLE `face_absensi` (
  `id` bigint(20) NOT NULL,
  `employee_id` bigint(20) NOT NULL,
  `nama_pegawai` varchar(30) NOT NULL,
  `waktu_masuk` datetime NOT NULL,
  `waktu_keluar` datetime DEFAULT NULL,
  `selisih_waktu` float DEFAULT NULL,
  `kamera` varchar(30) NOT NULL,
  `note` varchar(30) DEFAULT NULL,
  `state` varchar(30) NOT NULL,
  `aktif_terlambat` tinyint(1) DEFAULT NULL,
  `aktif_notif` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `face_absensi`
--

INSERT INTO `face_absensi` (`id`, `employee_id`, `nama_pegawai`, `waktu_masuk`, `waktu_keluar`, `selisih_waktu`, `kamera`, `note`, `state`, `aktif_terlambat`, `aktif_notif`) VALUES
(1, 232331, 'Yanto Liem', '2019-02-04 15:00:54', NULL, 375.9, 'kamera 1', 'Terlambat', 'IN', 1, 0),
(2, 12345, 'Firdauz Fanani', '2019-02-04 15:01:04', NULL, 376.067, 'kamera 1', 'Terlambat', 'IN', 1, 0),
(3, 12346, 'Riyadi Agung Suharto', '2019-02-04 15:02:11', NULL, 377.183, 'kamera 1', 'Terlambat', 'IN', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `face_keamanan`
--

CREATE TABLE `face_keamanan` (
  `id` bigint(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `waktu` datetime NOT NULL,
  `kamera` varchar(30) NOT NULL,
  `status` varchar(30) DEFAULT NULL,
  `aktif_notif` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `face_keamanan`
--

INSERT INTO `face_keamanan` (`id`, `nama`, `waktu`, `kamera`, `status`, `aktif_notif`) VALUES
(1, 'Yanto Liem', '2019-02-01 15:00:54', 'kamera 1', 'tidak melanggar', 0),
(2, 'Firdauz Fanani', '2019-02-01 15:01:04', 'kamera 1', 'melanggar', 0),
(3, 'Riyadi Agung Suharto', '2019-02-01 15:02:11', 'kamera 1', 'tidak melanggar', 0),
(4, 'Firdauz Fanani', '2019-02-01 15:02:46', 'kamera 1', 'melanggar', 0),
(5, 'Yanto Liem', '2019-02-01 15:03:14', 'kamera 1', 'tidak melanggar', 0),
(6, 'Yanto Liem', '2019-02-01 15:04:19', 'kamera 1', 'tidak melanggar', 0),
(7, 'Yanto Liem', '2019-02-01 15:05:01', 'kamera 1', 'tidak melanggar', 0),
(8, 'Yanto Liem', '2019-02-01 15:06:03', 'kamera 1', 'tidak melanggar', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ijin_absensi`
--

CREATE TABLE `ijin_absensi` (
  `id` bigint(20) NOT NULL,
  `nama_pegawai` varchar(30) NOT NULL,
  `ijin` varchar(30) NOT NULL,
  `alasan_ijin` longtext NOT NULL,
  `tanggal_ijin` date NOT NULL,
  `waktu_buat_ijin` datetime DEFAULT NULL,
  `atasan` varchar(30) NOT NULL,
  `lampiran` varchar(300) DEFAULT NULL,
  `tipe_lampiran` varchar(30) DEFAULT NULL,
  `aktif_notif_manager` tinyint(1) NOT NULL,
  `aktif_appdpp_manager` tinyint(1) NOT NULL,
  `app` varchar(30) DEFAULT NULL,
  `app_by` varchar(30) DEFAULT NULL,
  `alasan_app_dpp` longtext,
  `aktif_notif_karyawan` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ijin_absensi`
--

INSERT INTO `ijin_absensi` (`id`, `nama_pegawai`, `ijin`, `alasan_ijin`, `tanggal_ijin`, `waktu_buat_ijin`, `atasan`, `lampiran`, `tipe_lampiran`, `aktif_notif_manager`, `aktif_appdpp_manager`, `app`, `app_by`, `alasan_app_dpp`, `aktif_notif_karyawan`) VALUES
(1, 'Firdauz Fanani', 'DINAS KELUAR', 'Selamat siang pak agung.\n\nUntuk hari senin saya akan dinas keluar ke Tekno BSD untuk melakukan implementasi face recognition dan attendance.\nUntuk itu saya meminta ijin dari bapak.\n\nTerima kasih.', '2018-11-19', '2018-11-16 13:35:26', 'Muhammad Reiza Syaifullah', 'NULL', 'NULL', 0, 0, 'APPROVE', 'Muhammad Reiza Syaifullah', 'Reasonable', 0),
(2, 'Intan Liems', 'DINAS KELUAR', 'Dinas ke intercon office', '2018-11-28', '2018-11-26 15:45:25', 'Riyadi Agung Suharto', 'NULL', 'Document', 0, 0, 'APPROVE', 'Riyadi Agung Suharto', 'approved', 0),
(3, 'Firdauz Fanani', 'TELAT', 'Ijin terlambat karena hujan', '2018-11-30', '2018-11-26 16:00:45', 'Intan Liems', '205017793_2018-11-26 16:00:25_AgADBQADUqgxG1d62VdmO5ShbtmnP_Bh2zIABExqXYy05loy8sEBAAEC', 'Photo', 0, 0, 'APPROVE', 'Intan Liems', 'Approved izin krn hujan', 0),
(4, 'Firdauz Fanani', 'TELAT', 'Testing pls', '2018-12-05', '2018-12-03 16:18:48', 'Muhammad Reiza Syaifullah', '205017793_2018-12-03 16:18:35_Improving_Accuracy_in_Face_Recognition_Proposal_to.pdf', 'Document', 0, 0, 'DISAPPROVE', 'Muhammad Reiza Syaifullah', 'Y', 0),
(5, 'Firdauz Fanani', 'TELAT', 'Ijin telat karena banjir', '2018-12-11', '2018-12-11 14:20:57', 'Sentosa', '205017793_2018-12-11 14:20:51_AgADBQAEqTEbfLp5VGoX5LP-kQABGfNa2zIABNsCpla_tWkZcjwCAAEC', 'Photo', 0, 0, 'APPROVE', 'Sentosa', 'Approve', 0),
(6, 'Randy Evan Wijaya', 'TELAT', 'Testing banjir', '2019-02-01', '2019-02-01 15:27:52', 'Riyadi Agung Suharto', '205017793_2019-02-01 15:27:45_AgADBQADcqgxGzdmoFZ9HooVKQ9kPUyB3zIABGLtu6Atb3N418sBAAEC', 'Photo', 0, 1, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `not_absensi`
--

CREATE TABLE `not_absensi` (
  `id` bigint(20) NOT NULL,
  `employee_id` bigint(20) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `tanggal_absen` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `not_absensi`
--

INSERT INTO `not_absensi` (`id`, `employee_id`, `nama_pegawai`, `tanggal_absen`) VALUES
(1, 12345, 'Firdauz Fanani', '2019-02-06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `camera`
--
ALTER TABLE `camera`
  ADD PRIMARY KEY (`id_camera`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `face_absensi`
--
ALTER TABLE `face_absensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `face_keamanan`
--
ALTER TABLE `face_keamanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ijin_absensi`
--
ALTER TABLE `ijin_absensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `not_absensi`
--
ALTER TABLE `not_absensi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `face_absensi`
--
ALTER TABLE `face_absensi`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `face_keamanan`
--
ALTER TABLE `face_keamanan`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `ijin_absensi`
--
ALTER TABLE `ijin_absensi`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `not_absensi`
--
ALTER TABLE `not_absensi`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
