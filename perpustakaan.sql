-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2024 at 05:47 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL,
  `nis` varchar(15) NOT NULL,
  `nama_anggota` varchar(125) NOT NULL,
  `kelas` varchar(15) NOT NULL,
  `jk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nis`, `nama_anggota`, `kelas`, `jk`) VALUES
(1, '22237004', 'ADITYA FASHA', '8', 2),
(2, '22237006', 'AINUR OHMAH CANTIKA PUTRI', '8', 1),
(3, '22237011', 'ALIF JAENALDY', '8', 2),
(4, '22237019', 'ANDINI RAHMAWATI', '8', 1),
(5, '22237024', 'ARYANI OKTAVIANI', '8', 1),
(6, '22237041', 'DEVIA SABRINA', '8', 1),
(7, '22237042', 'DHIA FITRI ALIYAH', '8', 1),
(8, '22237045', 'DILA PUSPITASARI', '8', 1),
(9, '22237059', 'FAZRIANA KHADAFFI', '8', 2),
(10, '22237069', 'ILHAM DHEIVA ARDHANI', '8', 2),
(11, '22237090', 'LINDAH AYU ANDINI', '8', 1),
(12, '22237103', 'MUHAMMAD DHAFA RAMDANI', '8', 2),
(13, '22237105', 'MUHAMMAD ILHAM SANJAYA', '8', 2),
(14, '22237106', 'MUHAMMAD LUTHFIANA SYAHPUTRA', '8', 2),
(15, '22237110', 'MUHAMMAD SAUQI HANIF', '8', 2),
(16, '22237120', 'NIKO SANGAJI', '8', 2),
(17, '22237122', 'NISA FAUDZIAH', '8', 1),
(18, '22237130', 'RAFFA PERMANA', '8', 2),
(19, '22237148', 'RIZKA ALA ROBBIBINUR', '8', 2),
(20, '22237160', 'SHINTA POPPYLIA KASIH', '8', 1),
(21, '22237163', 'SINAR DIADARA MIRAZ', '8', 1),
(22, '22237164', 'SINDI AMELIA', '8', 1),
(23, '22237167', 'SITI HODIJAH', '8', 1),
(24, '22237170', 'SYAIFUL ANWAR', '8', 2),
(25, '22237172', 'TAZYA KHOLIFA', '8', 1),
(26, '22237175', 'TRI MAULANA', '8', 2),
(27, '22237003', 'ADI YAKSA WIGUNA', '8', 2),
(28, '22237005', 'AIMAN MIFTAH PUADI', '8', 2),
(29, '22237009', 'ALFIA NUR SAPA', '8', 1),
(30, '22237015', 'ALZIERA SALSA AGUSTIN', '8', 1),
(31, '22237016', 'ANASTACIA KIREY ANDREA', '8', 1),
(32, '22237020', 'ANDRIYAN NUR ROHMAN', '8', 2),
(33, '22237023', 'ARKA AKMAL MAULANA', '8', 2),
(34, '22237028', 'BAGAS OKTAPIANO', '8', 2),
(35, '22237038', 'DEFAEL ALIF HIDAYAT', '8', 2),
(36, '22237039', 'DEKA GUNALAKSANA', '8', 2),
(37, '22237044', 'DIKA ADITIYA', '8', 2),
(38, '22237053', 'FADIL AKMAL MAULANA', '8', 2),
(39, '22237063', 'GRACELA ANANTA', '8', 1),
(40, '22237076', 'JESSICA PUTRI LIANA', '8', 1),
(41, '22237082', 'KEYLA AMALIA', '8', 1),
(42, '22237084', 'KIKI FADILLAH HIDAYAT', '8', 2),
(43, '22237087', 'KUSNIAWATI', '8', 1),
(44, '22237088', 'LATISA KLAUDIA', '8', 1),
(45, '22237092', 'LITA RIHANA SRI BANDOWATI', '8', 1),
(46, '22237113', 'NADYA NAJDWANI HENTANG', '8', 1),
(47, '22237135', 'RAKA EPANDRA', '8', 2),
(48, '22237139', 'REGINA ALFARINA PUTRI', '8', 1),
(49, '22237141', 'RENDI NUR PAJAR', '8', 2),
(50, '22237154', 'SASQIA ESA JAHRIANI', '8', 1),
(51, '22237155', 'SEAN HAFIDZ PRATAMA', '8', 2),
(52, '22237156', 'SEKAR FAMELA MANDIARA', '8', 1),
(53, '22237178', 'UZI SYIFA FAUZIAH', '8', 1),
(54, '22237179', 'VANIA TALITA KHANSA', '8', 1),
(55, '22237180', 'VICKY JULIAN SAPUTRA', '8', 2),
(56, '22237182', 'WAHYUNI PUTRI', '8', 1),
(57, '22237007', 'AISAH MAULIDA', '8', 1),
(58, '22237030', 'CANTIKA AULIA', '8', 1),
(59, '22237036', 'DANDI PERMANA PUTRA', '8', 2),
(60, '22237049', 'DONI MAULANA', '8', 2),
(61, '22237051', 'ELISA PITRI NURHIKMAH', '8', 1),
(62, '22237052', 'ERLANGGA TRI MULDIANSYAH', '8', 2),
(63, '22237065', 'HAPIID ABDUL GHANI', '8', 2),
(64, '22237068', 'IKSAN ADI FIRDAUS', '8', 2),
(65, '22237071', 'IQBAL KAROMAH', '8', 2),
(66, '22237102', 'MUHAMMAD ANWAR RIZA', '8', 2),
(67, '22237116', 'NAZRIL ILHAM DRAJAT', '8', 2),
(68, '22237121', 'NILDA JAMILA', '8', 1),
(69, '22237124', 'NURMASITOH', '8', 1),
(70, '22237131', 'RAFIF DWITAMA', '8', 2),
(71, '22237134', 'RAIHAN RIJKI ALPIL DIANSAH', '8', 2),
(72, '22237136', 'RANI MULYATI', '8', 1),
(73, '22237137', 'RASYAH ATTHA PUTRI PRATAMA', '8', 1),
(74, '22237144', 'REVA NEFARISA', '8', 1),
(75, '22237149', 'RIZKY RAMDANI', '8', 2),
(76, '22237150', 'SAEFUL KAHFI', '8', 2),
(77, '22237151', 'SALSABILA NUR MAHARDIYANI PURWANTO', '8', 1),
(78, '22237157', 'SELVIANA PUTRI OKTAPIANI', '8', 1),
(79, '22237161', 'SILSI ADELIA PUTRI', '8', 1),
(80, '22237162', 'SILVIA VIRGINIA PRATIWI', '8', 1),
(81, '22237173', 'TIARA AULIA PUTRI', '8', 1),
(82, '22237174', 'TITIAN DWI HAPSARI', '8', 1),
(83, '22237177', 'TURNANSYAH', '8', 2),
(84, '22237183', 'YUNI SRI LESTARI', '8', 1),
(85, '22237184', 'YUSY YUSTIAR YASSIN', '8', 1),
(86, '22237002', 'ADE ISMA', '8', 1),
(87, '22237008', 'ALFATIH RIZKIANU', '8', 2),
(88, '23248186', 'AZRIL ADIATIA', '8', 2),
(89, '22237026', 'AZZAM KHAIRUL FIKHAR', '8', 2),
(90, '22237029', 'CANTIKA ARDILA RAMADHANI', '8', 1),
(91, '22237032', 'CHERIL AL-ZAHRA', '8', 1),
(92, '22237046', 'DIMAS BILI RAMADHAN', '8', 2),
(93, '22237050', 'ELDA KRISDIANTI', '8', 1),
(94, '22237054', 'FAIHA WAFIQ AZKIA', '8', 1),
(95, '22237061', 'FIKRY FAHREZI', '8', 2),
(96, '22237066', 'HILYA LAILA SARI', '8', 1),
(97, '22237070', 'IMRAAN NASHRULLAH', '8', 2),
(98, '22237072', 'IRMA PUSVITA SARI', '8', 1),
(99, '22237077', 'JIO JULIANSAH', '8', 2),
(100, '22237083', 'KEYSHA ADELIA ALZAHRA', '8', 1),
(101, '22237085', 'KIRANA SAPUTRA', '8', 2),
(102, '22237095', 'MILDA NURHASANAH', '8', 1),
(103, '22237097', 'MUHAMAD EGAS REFFIANA', '8', 2),
(104, '22237098', 'MUHAMAD FADLY PRATAMA', '8', 2),
(105, '22237099', 'MUHAMAD MULYA', '8', 2),
(106, '22237100', 'MUHAMAD REZA', '8', 2),
(107, '22237111', 'NADIA SALMA', '8', 1),
(108, '22237114', 'NATIA RAHMAWATI', '8', 1),
(109, '22237118', 'NAZWA NURSIVA FAUZIA', '8', 1),
(110, '22237126', 'PARIS ADAM SAPUTRA', '8', 2),
(111, '22237133', 'RAHMA HAERANIA', '8', 1),
(112, '22237147', 'RIVANIA WULAN CANTIKA', '8', 1),
(113, '22237153', 'SANDI KUSDIYANTO', '8', 2),
(114, '22237171', 'SYIFA AULIA', '8', 1),
(115, '22237181', 'WAHYU SARIPUDN', '8', 2),
(116, '22237001', 'ABDAN UBAIDILAH', '8', 2),
(117, '22237010', 'ALFITA SUCI FADILLAH', '8', 1),
(118, '22237012', 'ALIYA NAZLAUL HAYAA', '8', 1),
(119, '22237013', 'ALMAHESA', '8', 2),
(120, '22237017', 'ANASTASYA', '8', 1),
(121, '22237021', 'ANGGA KUSUMA', '8', 2),
(122, '22237022', 'ANGGUN AULIA AGUSTIN', '8', 1),
(123, '22237031', 'CENDERLELA PERMATASARI', '8', 1),
(124, '22237034', 'CINTA AULIA', '8', 1),
(125, '22237040', 'DEPITA IKAWATI', '8', 1),
(126, '22237056', 'FARHAN AL BARIK BILAH', '8', 2),
(127, '22237062', 'FIRLHY DWIYANTRI', '8', 1),
(128, '22237064', 'GYO KURNIAWAN', '8', 2),
(129, '22237079', 'JUPIONA', '8', 1),
(130, '22237081', 'KAYLA TANIDJA', '8', 1),
(132, '22237140', 'MUHAMMAD ORIK FAHREZI', '8', 2),
(134, '22237109', 'MUHAMMAD RIDHAN AISYFARIZI', '8', 2),
(135, '22237119', 'NIKO ALMEIDA ISYADINA', '8', 2),
(136, '22237128', 'PUTRI ALMIRA PRIHATINI', '8', 1),
(137, '22237129', 'PUTRI ANDINI', '8', 1),
(138, '22237132', 'RAFKA MUHAMMAD ZULFI', '8', 2),
(139, '22237138', 'REFA FEBRIYANI', '8', 1),
(140, '22237143', 'RESKY EKA PRATAMA', '8', 2),
(141, '22237159', 'SEPTIAN RAMDHANI', '8', 2),
(142, '22237165', 'SINSI HENDRIS', '8', 1),
(143, '22237185', 'ZASKHIA KHUMAIROTUSIFA', '8', 1),
(144, '22237018', 'ANDIKA MAULANA', '8', 2),
(145, '22237025', 'AZHA TRINAYA', '8', 1),
(146, '22237033', 'CIKA HANDAYANI', '8', 1),
(147, '22237035', 'DANAR AZIBARA', '8', 2),
(148, '22237037', 'DANIEL ANDRIEANO', '8', 2),
(149, '22237043', 'DIDIN', '8', 2),
(150, '22237048', 'DISNY AL-RAMADHANI', '8', 1),
(151, '22237058', 'FAUZIYAH', '8', 1),
(152, '22237188', 'HABIRUL ISHAK', '8', 2),
(153, '22237067', 'IBADUROHMAN KHOERUL HIDAYAH', '8', 2),
(154, '22237074', 'JEJE CIKA AULIA', '8', 1),
(155, '22237075', 'JENITA FITRI', '8', 1),
(156, '22237086', 'KIRANIA MAULINDA', '8', 1),
(158, '22237101', 'MUHAMAD TSAQIF FAISAL', '8', 2),
(159, '22237104', 'MUHAMMAD HAIDAR MUBAARAK AL MARIYA', '8', 2),
(160, '22237115', 'NAYARA ALIKA', '8', 1),
(161, '23248185', 'NAZWA ANINDYA FIRMASNYAH', '8', 1),
(162, '22237117', 'NAZWA MAHARANI', '8', 1),
(163, '22237123', 'NUR FADHILAH', '8', 2),
(164, '22237125', 'PAHRI ANWAR', '8', 2),
(165, '22237127', 'PITRIA HOERUN ANISA', '8', 1),
(166, '22237107', 'REHAN JAELANI', '8', 2),
(167, '22237142', 'RENDI RAMDANI', '8', 2),
(168, '22237145', 'REVANI ALICIA PUTRI', '8', 1),
(169, '22237152', 'SAM ARNOL SWAZENEGER', '8', 2),
(170, '22237158', 'SEPTI RAHMA DIANA', '8', 1),
(171, '22237166', 'SITI AULIA PUTRI', '8', 1),
(172, '22237168', 'SITI ISMIYANI', '8', 1),
(173, '22237176', 'TRIA SANJAYA', '8', 1);

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `kelas` varchar(5) NOT NULL,
  `sampul` text NOT NULL,
  `no_isbn` varchar(20) NOT NULL,
  `judul` text NOT NULL,
  `pengarang` varchar(125) NOT NULL,
  `tahun` varchar(20) NOT NULL,
  `penerbit` varchar(125) NOT NULL,
  `jml_buku` int(11) NOT NULL,
  `sisa_buku` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `sinopsis` text DEFAULT NULL,
  `file` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `id_kategori`, `kelas`, `sampul`, `no_isbn`, `judul`, `pengarang`, `tahun`, `penerbit`, `jml_buku`, `sisa_buku`, `status`, `create_at`, `sinopsis`, `file`) VALUES
(2, 1, '6', 'Bahasa-Inggris-BS-KLS-V-cover2.png', '78956-5899-21', 'Filsafat Ilmu Agama', 'Danar Sutardi', '2022', 'Danar Sutardi', 2, 4, 0, '2022-09-22 03:11:14', '<p><span style=\"background-color: rgb(0, 255, 0);\">gjkfgdfryyh</span></p>', 'Bahasa-Indonesia-BS-KLS-V1.pdf'),
(3, 1, '6', 'Islam-BS-KLS-V-cover1.png', '1233sdss', 'zdsd', 'sds', '1212', 'sdsd', 15, 15, 0, '2023-02-05 12:24:32', '<p>sfsdfsd</p>', 'Bahasa-Indonesia-BS-KLS-V1.pdf'),
(4, 1, '6', 'Matematika-BS-KLS-IV-cover2.png', '23212asda', 'asaas', 'aa', '2321', 'SFDGER', 8, 8, 0, '2023-02-05 12:24:53', '<p>cgvfgdfdf</p>', 'Matematika-BS-KLS-IV1.pdf'),
(5, 1, '5', 'Bahasa-Indonesia-BS-KLS-V-cover1.png', '4342321dfd', 'sdfsds', 'asewqeq', '3221', 'sfdfds', 2, 2, 0, '2023-02-05 12:25:13', '<p>fvhgfh</p>', 'Islam-BS-KLS-I1.pdf'),
(6, 1, '5', 'Bahasa-Indonesia-BS-KLS-I-Cover1.png', '2321ffd', 'scssf', 'ghgjyh', '45667', 'ghgfjf', 8, 8, 0, '2023-02-05 12:25:33', '<p>vhgfhgf</p>', 'Matematika-Vol-1-BS-KLS-V1.pdf'),
(7, 1, '5', 'Kumpulan-Puisi_Dian-Ratnawati_Rev-1_0_Convert_Cover-Depan-600x8571.jpg', '2343453dfd', 'bjgf', 'esdrf', '2022', 'sdsd', 100, 100, 0, '2023-02-05 12:30:08', '<p>dfdfdx</p>', 'Islam-BS-KLS-I11.pdf'),
(8, 1, '4', 'Pengantar-Dasar-Matematika_-Sri-Suryanti-rev-1_0-depan1.jpg', 'sads123234', 'cgfgd', 'xdfgds', '2321', 'sdsd', 1, 1, 0, '2023-02-05 12:37:13', '<p>fcgfd</p>', 'Matematika-BS-KLS-IV11.pdf'),
(9, 1, '4', 'Matematika-Vol-1-BS-KLS-V-cover1.png', 'cgfgrf3434', 'asaas', 'asewqeq', '1212', 'SFDGER', 150, 150, 0, '2023-02-05 12:37:32', '<p>hfghfg</p>', 'Bahasa-Inggris-BS-KLS-V11.pdf'),
(10, 1, '3', 'Matematika-BS-KLS-IV-cover3.png', '23212asdsdsds', 'asaas', 'asewqeq', '45667', 'sdsd', 150, 150, 0, '2023-02-05 12:38:00', '<p>vhghd</p>', 'Biodata_Igrily_Alhadist1.pdf'),
(11, 1, '2', 'Bahasa-Indonesia-BS-KLS-I-Cover11.png', '23212asdacg', 'zdsd', 'asewqeq', '3221', 'sdsd', 15, 15, 0, '2023-02-05 12:38:22', '<p>vhghghg</p>', '533-Article_Text-2222-1-10-2019123111.pdf'),
(12, 1, '1', 'Matematika-BS-KLS-IV-cover4.png', 'sdsd34', 'dfdsa', 'dsfgds', '2022', 'SFDGER', 1, 1, 0, '2023-02-05 12:44:50', '<p>dgdfgs</p>', 'Bahasa-Indonesia-BS-KLS-V11.pdf'),
(13, 1, '1', 'Matematika-Vol-1-BS-KLS-V-cover11.png', '1233sdss', 'fdgdf', 'dfg', '2022', 'SFDGER', 15, 15, 0, '2023-02-05 12:45:51', '<p>sfdfds</p>', 'jago-ngomong-bahasa-inggris-revisi-3_1-Convert-depan-521x768.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `detail_peminjaman`
--

CREATE TABLE `detail_peminjaman` (
  `id_detail` int(11) NOT NULL,
  `id_pinjam` varchar(30) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `jml` int(11) NOT NULL,
  `stat_pinjam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_peminjaman`
--

INSERT INTO `detail_peminjaman` (`id_detail`, `id_pinjam`, `id_buku`, `jml`, `stat_pinjam`) VALUES
(1, 'P20220922tG73l', 2, 2, 0),
(2, 'P20240622tH2f0', 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `history_ebook`
--

CREATE TABLE `history_ebook` (
  `id_histori` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history_ebook`
--

INSERT INTO `history_ebook` (`id_histori`, `id_anggota`, `id_buku`, `time`) VALUES
(1, 1, 2, '2023-01-09 14:27:01'),
(2, 1, 2, '2023-01-09 14:27:12'),
(3, 1, 2, '2023-01-09 14:27:55'),
(4, 1, 7, '2023-02-05 12:30:38'),
(5, 1, 3, '2023-04-05 11:01:10'),
(6, 1, 3, '2023-04-05 11:02:02'),
(7, 1, 3, '2023-04-05 11:02:11'),
(8, 1, 3, '2023-04-05 11:02:56'),
(9, 1, 4, '2023-04-05 11:35:02'),
(10, 1, 4, '2023-04-05 11:37:21'),
(11, 1, 4, '2023-04-05 11:38:41'),
(12, 1, 4, '2023-04-05 12:14:10'),
(13, 1, 2, '2023-04-05 12:27:35'),
(14, 1, 2, '2023-04-05 12:28:02'),
(15, 1, 10, '2023-04-05 12:30:35'),
(16, 1, 10, '2023-04-05 12:30:51'),
(17, 1, 3, '2023-04-05 12:30:57'),
(18, 1, 5, '2024-06-22 00:59:59'),
(19, 1, 5, '2024-06-22 01:00:18'),
(20, 1, 5, '2024-06-22 01:01:02');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_buku`
--

CREATE TABLE `kategori_buku` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(125) NOT NULL,
  `no_rak` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_buku`
--

INSERT INTO `kategori_buku` (`id_kategori`, `nama_kategori`, `no_rak`) VALUES
(1, 'Filsafat', '1189'),
(2, 'Bahasa Indonesia', '8');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_pinjam` varchar(30) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_pinjam` varchar(20) NOT NULL,
  `bts_pinjam` varchar(20) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `stat_pinjam_all` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_pinjam`, `id_anggota`, `id_user`, `tgl_pinjam`, `bts_pinjam`, `time`, `stat_pinjam_all`) VALUES
('P20220922tG73l', 1, 1, '2022-09-22', '2022-09-29', '2022-09-22 04:32:04', 0),
('P20240622tH2f0', 2, 1, '2024-06-22', '2024-06-29', '2024-06-22 00:46:05', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_kembali` int(11) NOT NULL,
  `id_detail` int(11) NOT NULL,
  `tgl_kembali` varchar(15) NOT NULL,
  `denda` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengembalian`
--

INSERT INTO `pengembalian` (`id_kembali`, `id_detail`, `tgl_kembali`, `denda`) VALUES
(1, 1, '2022-09-22', '0'),
(2, 2, '2024-06-22', '0'),
(3, 1, '2024-06-22', '632000');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(125) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `username` varchar(125) NOT NULL,
  `password` varchar(125) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `alamat`, `no_hp`, `username`, `password`, `role`) VALUES
(1, 'admin', 'Kuningan Jawa Barat', '085156727367', 'admin', 'admin', 1),
(3, 'Kepala Perpustakaan', 'Kuningan, Jawa Barat', '087887221113', 'kepala', 'kepala', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `history_ebook`
--
ALTER TABLE `history_ebook`
  ADD PRIMARY KEY (`id_histori`);

--
-- Indexes for table `kategori_buku`
--
ALTER TABLE `kategori_buku`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_pinjam`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id_kembali`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `history_ebook`
--
ALTER TABLE `history_ebook`
  MODIFY `id_histori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `kategori_buku`
--
ALTER TABLE `kategori_buku`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id_kembali` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
