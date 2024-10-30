-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2023 at 12:53 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: cf_fc
--

-- --------------------------------------------------------

--
-- Table structure for table tb_admin
--
CREATE DATABASE cf_fc;
use cf_fc;

CREATE TABLE tb_admin (
  kode_user varchar(6) NOT NULL,
  nama_user varchar(50) NOT NULL,
  user varchar(16) NOT NULL,
  pass varchar(16) DEFAULT NULL,
  level varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table tb_admin
--

INSERT INTO tb_admin (kode_user, nama_user, user, pass, level) VALUES
('U001', 'Fadlurrahman Irsyad', 'admin', 'admin', 'admin'),
('U002', 'Bayu Purnomo', 'Bayu', 'Bayu', 'user');

-- --------------------------------------------------------

--
-- Table structure for table tb_sayuran
--

CREATE TABLE tb_sayuran (
  kode_sayuran varchar(16) NOT NULL,
  nama_sayuran varchar(255) DEFAULT NULL,
  keterangan text DEFAULT NULL,
  referensi varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table tb_sayuran
--

INSERT INTO tb_sayuran (kode_sayuran, nama_sayuran, keterangan, referensi) VALUES
('S001', 'Kentang', 'Tanaman umbi-umbian yang kaya karbohidrat, biasanya ditanam di dataran tinggi dan membutuhkan suhu dingin.', 'BUDIDAYA SAYURAN TROPIS, Prof. Dr. Hj. Zulkarnain'),
('S002', 'Kubis', 'Sayuran daun berbentuk bulat, umumnya tumbuh baik di daerah bersuhu rendah dan sering digunakan dalam salad atau masakan tumis.', 'BUDIDAYA SAYURAN TROPIS, Prof. Dr. Hj. Zulkarnain'),
('S003', 'Tomat', 'Buah berwarna merah atau kuning yang kaya vitamin C, sering digunakan dalam masakan dan minuman segar.', 'BUDIDAYA SAYURAN TROPIS, Prof. Dr. Hj. Zulkarnain'),
('S004', 'Cabai', 'Tanaman buah pedas yang jadi bahan utama sambal, tersedia dalam berbagai varietas seperti cabai rawit dan cabai merah besar.', 'BUDIDAYA SAYURAN TROPIS, Prof. Dr. Hj. Zulkarnain'),
('S005', 'Sawi', 'Sayuran daun hijau yang mudah tumbuh, biasa digunakan dalam masakan seperti mie dan tumisan.', 'BUDIDAYA SAYURAN TROPIS, Prof. Dr. Hj. Zulkarnain'),
('S006', 'Kacang Buncis', 'Sayuran polong hijau dengan rasa renyah, digunakan dalam masakan atau salad.', 'BUDIDAYA SAYURAN TROPIS, Prof. Dr. Hj. Zulkarnain'),
('S007', 'Bawang Merah', 'Umbi dengan aroma khas, digunakan sebagai bumbu dasar dalam banyak masakan.', 'BUDIDAYA SAYURAN TROPIS, Prof. Dr. Hj. Zulkarnain'),
('S008', 'Bawang Putih', 'Tanaman umbi yang juga berfungsi sebagai bumbu dasar, dikenal karena manfaat kesehatan seperti antibakteri.', 'BUDIDAYA SAYURAN TROPIS, Prof. Dr. Hj. Zulkarnain');

-- --------------------------------------------------------

--
-- Table structure for table tb_tanah
--

CREATE TABLE tb_tanah (
  kode_tanah varchar(16) NOT NULL,
  jenis_tanah varchar(255) DEFAULT NULL,
  keterangan text DEFAULT NULL,
  referensi varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table tb_gejala
--

INSERT INTO tb_tanah (kode_tanah, jenis_tanah, keterangan, referensi) VALUES
('T001', 'Tanah lempung berpasir', 'Cocok untuk kentang karena dapat dikeringkan dengan baik', 'Budidaya Sayuran Tropis - Prof. Dr. H. Zulkarnain'),
('T002', 'Tanah liat', 'Ideal untuk tomat karena kaya akan bahan organik', 'Budidaya Sayuran Tropis - Prof. Dr. H. Zulkarnain'),
('T003', 'Tanah lempung', 'Digunakan untuk kubis dan memberikan drainase yang baik', 'Budidaya Sayuran Tropis - Prof. Dr. H. Zulkarnain'),
('T004', 'Tanah gembur', 'Baik untuk selada dengan kandungan bahan organik tinggi', 'Budidaya Sayuran Tropis - Prof. Dr. H. Zulkarnain'),
('T005', 'Tanah lempung liat berpasir', 'Ideal untuk bawang putih karena memerlukan tanah yang kaya nutrisi', 'Budidaya Sayuran Tropis - Prof. Dr. H. Zulkarnain'),
('T006', 'Tanah berpasir', 'Digunakan untuk caper yang tumbuh baik di tanah kering', 'Budidaya Sayuran Tropis - Prof. Dr. H. Zulkarnain'),
('T007', 'Tanah gambut', 'Digunakan untuk caper yang tumbuh baik di tanah kering', 'Budidaya Sayuran Tropis - Prof. Dr. H. Zulkarnain');

CREATE TABLE tb_suhu (
  kode_suhu varchar(16) NOT NULL,
  jenis_suhu varchar(255) DEFAULT NULL,
  keterangan text DEFAULT NULL,
referensi varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tb_suhu (kode_suhu, jenis_suhu, keterangan, referensi) VALUES
('I001', 'Dingin', 'Suhu antara 15° C hingga 20° C, cocok untuk kentang, kubis, selada, dan mustard. Biasanya ditemukan di dataran tinggi.', 'Budidaya Sayuran Tropis - Prof. Dr. H. Zulkarnain'),
('I002', 'Hangat', 'Suhu antara 20° C hingga 25° C, sesuai untuk tomat, ketimun, cabai, dan jagung manis. Lebih optimal di daerah dengan paparan sinar matahari yang baik.', 'Budidaya Sayuran Tropis - Prof. Dr. H. Zulkarnain'),
('I003', 'Gersang', 'Iklim hangat dan kering, cocok untuk tanaman seperti caper, sering ditemukan di daerah berbatu dengan sedikit curah hujan.', 'Budidaya Sayuran Tropis - Prof. Dr. H. Zulkarnain'),
('I004', 'Sejuk', 'Suhu antara 12° C hingga 24° C, cocok untuk bawang putih dan bawang merah. Lebih menyukai ketinggian sedang hingga tinggi.', 'Budidaya Sayuran Tropis - Prof. Dr. H. Zulkarnain');

CREATE TABLE tb_ph (
  kode_ph varchar(16) NOT NULL,
  rentang_ph varchar(255) DEFAULT NULL,
  keterangan text DEFAULT NULL,
  referensi varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tb_ph (kode_ph, rentang_ph, keterangan, referensi) VALUES
('P0001', '5.0 - 6.0', 'pH tanah sedikit asam', 'BUDIDAYA SAYURAN TROPIS - Prof. Dr. H. Zulkarnain'),
('P0002', '6.0 - 6.5', 'pH tanah netral hingga sedikit asam', 'BUDIDAYA SAYURAN TROPIS - Prof. Dr. H. Zulkarnain'),
('P0003', '6.5 - 7.0', 'pH tanah sedikit asam hingga netral', 'BUDIDAYA SAYURAN TROPIS - Prof. Dr. H. Zulkarnain'),
('P0004', '7.0 - 7.5', 'pH tanah sedikit asam hingga netral', 'BUDIDAYA SAYURAN TROPIS - Prof. Dr. H. Zulkarnain');

CREATE TABLE tb_ketinggian (
  kode_ketinggian varchar(16) NOT NULL,
  ketinggian_tanah varchar(255) DEFAULT NULL,
  keterangan text DEFAULT NULL,
  referensi varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tb_ketinggian (kode_ketinggian, ketinggian_tanah, keterangan, referensi) VALUES
('K001','Rendah','0-500 mdpl','BUDIDAYA SAYURAN TROPIS - Prof. Dr. H. Zulkarnain'),
('K002','Sedang','500-1000 mdpl','BUDIDAYA SAYURAN TROPIS - Prof. Dr. H. Zulkarnain'),
('K003','Tinggi','>1000 mdpl','BUDIDAYA SAYURAN TROPIS - Prof. Dr. H. Zulkarnain');

--
-- Table structure for table tb_konsultasi
--

CREATE TABLE tb_konsultasi (
  ID int(11) NOT NULL,
  kode_tanah varchar(16) DEFAULT NULL,
  kode_suhu varchar(16) DEFAULT NULL,
  kode_ph varchar(16) DEFAULT NULL,
  kode_ketinggian varchar(16) DEFAULT NULL,
  jawaban varchar(6) DEFAULT 'Tidak'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table tb_konsultasi
--

INSERT INTO tb_konsultasi (ID, kode_tanah, kode_suhu, kode_ph, kode_ketinggian) VALUES
(1, 'T001', 'I001','P001', 'K001');

-- --------------------------------------------------------

--
-- Table structure for table tb_relasi
--

CREATE TABLE tb_relasi_tanah (
  ID int(11) NOT NULL,
  kode_sayuran varchar(16) DEFAULT NULL,
kode_tanah varchar(16) DEFAULT NULL,
  cf double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table tb_relasi_tanah
--

INSERT INTO tb_relasi_tanah (ID,kode_sayuran, kode_tanah,cf) VALUES
(65, 'S001', 'T001', 0.8),
(66, 'S001', 'T005', 0.6),
(67, 'S001', 'T003', 0.6),
(68, 'S001', 'T007', 0.6),
(69, 'S002', 'T001', 0.8),
(70, 'S002', 'T002', 0.5),
(71, 'S002', 'T003', 0.9),
(72, 'S002', 'T004', 0.4),
(73, 'S002', 'T005', 0.8),
(74, 'S002', 'T006', 0.5),
(75, 'S002', 'T007', 0.6),
(76, 'S003', 'T001', 0.6),
(77, 'S003', 'T002', 0.6),
(78, 'S003', 'T003', 0.6),
(79, 'S003', 'T004', 0.6),
(80, 'S003', 'T005', 0.6),
(81, 'S003', 'T006', 0.6),
(82, 'S003', 'T007', 0.8),
(83, 'S004', 'T001', 0.6),
(84, 'S004', 'T002', 0.6),
(86, 'S004', 'T003', 0.6),
(87, 'S004', 'T004', 0.6),
(88, 'S004', 'T005', 0.6),
(89, 'S004', 'T006', 0.6),
(90, 'S004', 'T007', 0.6),
(91, 'S005', 'G023', 0.6),
(92, 'S005', 'T004', 0.8),
(93, 'S006', 'T001', 0.8),
(94, 'S006', 'T003', 0.8),
(95, 'S006', 'T004', 0.5),
(96, 'S006', 'T005', 0.4),
(97, 'S006', 'T006', 0.6),
(98, 'S006', 'T007', 0.4),
(99, 'S007', 'T001', 0.6),
(100, 'S007', 'T003', 0.7),
(101, 'S007', 'T005', 0.4),
(102, 'S007', 'T007', 0.6),
(103, 'S008', 'T006', 0.6),
(104, 'S008', 'T001', 0.6),
(105, 'S008', 'T003', 0.8),
(106, 'S008', 'T004', 0.4),
(107, 'S008', 'T005', 0.4),
(108, 'S008', 'T006', 0.6);

CREATE TABLE tb_relasi_suhu (
  ID int(11) NOT NULL,
  kode_sayuran varchar(16) DEFAULT NULL,
kode_suhu varchar(16) DEFAULT NULL,
  cf double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tb_relasi_suhu (ID,kode_sayuran, kode_suhu,cf) VALUES
(200, 'S001', 'I001', 0.8),
(201, 'S002', 'I004', 0.8),
(202, 'S003', 'I003', 0.6),
(203, 'S003', 'I001', 0.6),
(204, 'S003', 'I004', 0.8),
(205, 'S003', 'I002', 0.6),
(206, 'S004', 'I002', 0.8),
(207, 'S004', 'I004', 0.7),
(208, 'S004', 'I003', 0.6),
(209, 'S005', 'I004', 0.8),
(210, 'S005', 'I001', 0.7),
(211, 'S006', 'I004', 0.8),
(212, 'S007', 'I004', 0.8),
(213, 'S007', 'I002', 0.7),
(214, 'S007', 'I003', 0.6),
(215, 'S008', 'I004', 0.8),
(216, 'S008', 'I002', 0.6);

CREATE TABLE tb_relasi_ph (
  ID int(11) NOT NULL,
  kode_sayuran varchar(16) DEFAULT NULL,
kode_ph varchar(16) DEFAULT NULL,
  cf double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tb_relasi_ph (ID,kode_sayuran, kode_ph,cf) VALUES
(300, 'S001', 'P001', 0.9),
(301, 'S001', 'P002', 0.9),
(302, 'S002', 'P002', 1.0),
(303, 'S002', 'P001', 0.7),
(304, 'S003', 'P001', 0.7),
(305, 'S004', 'P002', 1.0),
(306, 'S004', 'P003', 0.7),
(307, 'S004', 'P001', 0.7),
(308, 'S005', 'P003', 0.7),
(309, 'S005', 'P002', 0.7),
(310, 'S006', 'P001', 0.8),
(311, 'S006', 'P002', 0.7),
(312, 'S007', 'P001', 0.7),
(313, 'S007', 'P002', 0.7),
(314, 'S008', 'P001', 0.6),
(315, 'S008', 'P002', 1.0),
(316, 'S008', 'P003', 1.0),
(317, 'S008', 'P004', 0.8);

CREATE TABLE tb_relasi_ketinggian (
  ID int(11) NOT NULL,
  kode_sayuran varchar(16) DEFAULT NULL,
kode_ketinggian varchar(16) DEFAULT NULL,
  cf double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tb_relasi_ketinggian (ID,kode_sayuran, kode_ketinggian,cf) VALUES
(400, 'S001', 'K002', 0.6),
(401, 'S001', 'K003', 1.0),
(402, 'S002', 'K003', 1.0),
(403, 'S002', 'K002', 0.6),
(404, 'S003', 'K003', 1.0),
(405, 'S004', 'K003', 0.3),
(406, 'S004', 'K001', 0.8),
(407, 'S004', 'K002', 0.8),
(408, 'S005', 'K001', 1.0),
(409, 'S005', 'K002', 0.8),
(410, 'S006', 'K001', 1.0),
(411, 'S006', 'K002', 0.8),
(412, 'S006', 'K003', 0.7),
(413, 'S007', 'K001', 0.9),
(414, 'S007', 'K002', 0.8),
(415, 'S008', 'K002', 1.0),
(416, 'S008', 'K003', 0.6);



--
-- Indexes for dumped tables
--

--
-- Indexes for table tb_admin
--
ALTER TABLE tb_admin
  ADD PRIMARY KEY (user);

--
-- Indexes for table tb_diagnosa
--
ALTER TABLE tb_sayuran
  ADD PRIMARY KEY (kode_sayuran);

--
-- Indexes for table tb_gejala
--
ALTER TABLE tb_tanah
  ADD PRIMARY KEY (kode_tanah);

ALTER TABLE tb_ketinggian
  ADD PRIMARY KEY (kode_ketinggian);

ALTER TABLE tb_ph
  ADD PRIMARY KEY (kode_ph);

ALTER TABLE tb_suhu
  ADD PRIMARY KEY (kode_suhu);

--
-- Indexes for table tb_konsultasi
--
ALTER TABLE tb_konsultasi
  ADD PRIMARY KEY (ID);

--
-- Indexes for table tb_relasi
--
ALTER TABLE tb_relasi_tanah
  ADD PRIMARY KEY (ID);

ALTER TABLE tb_relasi_ph
  ADD PRIMARY KEY (ID);

ALTER TABLE tb_relasi_ketinggian
  ADD PRIMARY KEY (ID);

ALTER TABLE tb_relasi_suhu
  ADD PRIMARY KEY (ID);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table tb_konsultasi
--
ALTER TABLE tb_konsultasi
  MODIFY ID int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table tb_relasi
--
ALTER TABLE tb_relasi_tanah
  MODIFY ID int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;
COMMIT;

ALTER TABLE tb_relasi_suhu
  MODIFY ID int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;
COMMIT;

ALTER TABLE tb_relasi_ketinggian
  MODIFY ID int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=415;
COMMIT;

ALTER TABLE tb_relasi_ph
  MODIFY ID int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=311;
COMMIT;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;