-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2022 at 08:17 PM
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
-- Database: `db_sekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `bagian`
--

CREATE TABLE `bagian` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(60) NOT NULL,
  `fungsi` text DEFAULT NULL,
  `tugas_pokok` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bagian`
--

INSERT INTO `bagian` (`id`, `nama`, `fungsi`, `tugas_pokok`) VALUES
(1, 'Guru', 'Satuan pendidik sekolah', 'mendidik siswa'),
(2, 'TU', 'Penata kelola administrasi sekolah', 'mempersiapkan jadwal dan membantu guru'),
(3, 'BK', 'Konselor Siswa', 'memberikan konsultasi'),
(39, 'Kepala Sekolah', 'Kepala Sekolah Sebagai Manajer', 'Merumuskan, menetapkan, dan mengembangkan visi misi sekolah.'),
(40, 'Wakil Kepala Sekolah', 'Menyusun program pengajaran', 'Mengatur pelaksaan program perbaikan dan pengayaan'),
(41, 'PramuBakti', 'pengantaran dan penjemputan dokumen', 'membantu kelancaran sosial dari suatu sekolah.');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(10) UNSIGNED NOT NULL,
  `hari` int(10) UNSIGNED NOT NULL,
  `kelas_id` int(10) UNSIGNED DEFAULT NULL,
  `mapel_id` int(10) UNSIGNED DEFAULT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_selesai` time DEFAULT NULL,
  `pegawai_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id`, `hari`, `kelas_id`, `mapel_id`, `jam_mulai`, `jam_selesai`, `pegawai_id`) VALUES
(1, 1, 1, 1, '08:00:00', '13:00:00', 1),
(2, 1, 3, 2, '07:30:00', '08:00:00', 2),
(12, 2, 1, 1, '12:12:00', '12:13:00', 5);

-- --------------------------------------------------------

--
-- Table structure for table `kehadiran_guru`
--

CREATE TABLE `kehadiran_guru` (
  `id` int(10) UNSIGNED NOT NULL,
  `waktu_masuk` datetime DEFAULT NULL,
  `waktu_keluar` datetime DEFAULT NULL,
  `pertemuan` tinyint(3) DEFAULT NULL,
  `pegawai_id` int(10) UNSIGNED NOT NULL,
  `jadwal_id` int(10) UNSIGNED NOT NULL,
  `berita_acara` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kehadiran_guru`
--

INSERT INTO `kehadiran_guru` (`id`, `waktu_masuk`, `waktu_keluar`, `pertemuan`, `pegawai_id`, `jadwal_id`, `berita_acara`) VALUES
(1, '2021-09-17 06:30:00', '2021-09-17 14:00:00', 1, 1, 1, 'mendidik siswa'),
(2, '2021-09-16 02:30:00', '2021-09-20 12:00:00', 1, 2, 2, 'mendidik siswa');

-- --------------------------------------------------------

--
-- Table structure for table `kehadiran_siswa`
--

CREATE TABLE `kehadiran_siswa` (
  `id` int(10) UNSIGNED NOT NULL,
  `kehadiran_guru_id` int(10) UNSIGNED NOT NULL,
  `siswa_id` int(10) UNSIGNED NOT NULL,
  `status_hadir` enum('Y','T') DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kehadiran_siswa`
--

INSERT INTO `kehadiran_siswa` (`id`, `kehadiran_guru_id`, `siswa_id`, `status_hadir`) VALUES
(1, 1, 1, 'T'),
(3, 2, 2, 'Y'),
(8, 2, 1, 'T');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(10) UNSIGNED NOT NULL,
  `tingkat` tinyint(3) UNSIGNED NOT NULL,
  `kelas` char(1) DEFAULT NULL,
  `pegawai_id` int(10) UNSIGNED NOT NULL,
  `tahun_ajaran_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `tingkat`, `kelas`, `pegawai_id`, `tahun_ajaran_id`) VALUES
(1, 1, 'A', 1, 1),
(3, 1, 'C', 2, 3),
(17, 3, 'A', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kelas_siswa`
--

CREATE TABLE `kelas_siswa` (
  `id` int(10) UNSIGNED NOT NULL,
  `kelas_id` int(10) UNSIGNED NOT NULL,
  `siswa_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kelas_siswa`
--

INSERT INTO `kelas_siswa` (`id`, `kelas_id`, `siswa_id`) VALUES
(1, 1, 1),
(3, 3, 2),
(4, 17, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id` int(10) UNSIGNED NOT NULL,
  `mapel` varchar(50) NOT NULL,
  `kelompok` enum('A','B') DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `tingkat` tinyint(4) DEFAULT NULL,
  `kkm` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id`, `mapel`, `kelompok`, `keterangan`, `tingkat`, `kkm`) VALUES
(1, 'Ilmu Pengetahuan Teknologi', 'B', 'materi dari daerah local', 2, 75),
(2, 'Statistika', 'A', 'materi perkuliahan', 3, 75);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2022-10-04-175606', 'App\\Database\\Migrations\\Bagian', 'default', 'App', 1667741620, 1),
(2, '2022-10-04-190149', 'App\\Database\\Migrations\\Pegawai1', 'default', 'App', 1667741620, 1),
(3, '2022-10-04-201616', 'App\\Database\\Migrations\\AddTahunAjar', 'default', 'App', 1667741620, 1),
(4, '2022-10-04-202600', 'App\\Database\\Migrations\\AddPendidikanGuru', 'default', 'App', 1667741620, 1),
(5, '2022-10-04-204922', 'App\\Database\\Migrations\\AddKelas', 'default', 'App', 1667741620, 1),
(6, '2022-10-05-180259', 'App\\Database\\Migrations\\AddMapel', 'default', 'App', 1667741620, 1),
(7, '2022-10-05-180850', 'App\\Database\\Migrations\\AddJadwal', 'default', 'App', 1667741620, 1),
(8, '2022-10-05-182726', 'App\\Database\\Migrations\\AddKehadiranGuru', 'default', 'App', 1667741620, 1),
(9, '2022-10-05-184206', 'App\\Database\\Migrations\\AddSiswa', 'default', 'App', 1667741620, 1),
(10, '2022-10-05-190109', 'App\\Database\\Migrations\\AddKelasSiswa', 'default', 'App', 1667741620, 1),
(11, '2022-10-05-190733', 'App\\Database\\Migrations\\AddKehadiranSiswa', 'default', 'App', 1667741620, 1),
(12, '2022-10-05-191635', 'App\\Database\\Migrations\\AddPenilaian', 'default', 'App', 1667741620, 1),
(13, '2022-10-05-192152', 'App\\Database\\Migrations\\AddRincianPenilaian', 'default', 'App', 1667741620, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(10) UNSIGNED NOT NULL,
  `nip` varchar(10) NOT NULL,
  `nama_depan` varchar(50) NOT NULL,
  `nama_belakang` varchar(50) DEFAULT NULL,
  `gelar_depan` varchar(10) DEFAULT NULL,
  `gelar_belakang` varchar(10) DEFAULT NULL,
  `gender` enum('L','P') DEFAULT NULL,
  `no_telpon` varchar(17) DEFAULT NULL,
  `no_wa` varchar(17) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `bagian_id` int(10) UNSIGNED NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `kota` varchar(30) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `tempat_lahir` varchar(80) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `sandi` varchar(60) DEFAULT NULL,
  `token_reset` varchar(10) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `nip`, `nama_depan`, `nama_belakang`, `gelar_depan`, `gelar_belakang`, `gender`, `no_telpon`, `no_wa`, `email`, `bagian_id`, `alamat`, `kota`, `tgl_lahir`, `tempat_lahir`, `foto`, `sandi`, `token_reset`, `created_at`, `updated_at`) VALUES
(4, '12321312', 'sad', 'a', 'w', 's', 'L', '34', '34', 'a@gmail.com', 1, 'ads', 'asd', '2022-12-06', 'sa', 'sad', '$2y$10$JdnqqScM.m46P6WykPO4WeIepTpN/TgE7lgdayBdrSLnYj8PvImIO', NULL, '2022-12-06 15:35:25', '2022-12-06 15:35:25'),
(1, '123457890', 'Fatimah', 'Soimah', 'Dr', 'A.Ma', 'P', '085738706898', '086738917343', 'fatimahsoim@gmail.com', 1, 'Jl.Sulawesi Blok A', 'Bandung', '1999-03-02', 'Jakarta', 'profil', '$2y$10$jaPi44yu8OTy/HyKNACbaOqqED0PEYpzob2UnQpcVNyl2tUZeJdT6', 'qwerty', '2022-11-06 09:57:26', '2022-11-06 09:57:26'),
(2, '2132131', 'adit', 'adit', 'adit', 'adit', 'L', '342423', '32423423', 'aditya.neo5@gmail.com', 1, 'asdas', 'sadas', '2022-11-05', 'asdsa', 'sadasd', '$2y$10$ET5OHNpgGd8/lTrv4zSwieLb8wahVL7Y/6OcV4sWOV3F1MgZbY2h6', NULL, '2022-11-07 16:04:19', '2022-11-07 16:04:19'),
(5, '456', 'adit', 'adit', 'adit', 'adit', 'L', '9879', '97897', 'adit@gmail.com', 39, 'sad', 'sad', '2022-12-13', 'asda', 'sad', '$2y$10$NnRBRaR4ZwB03JwZWlvDdOokd//21j6dkWJXOfon1b8v8sEnZZVe.', NULL, '2022-12-07 10:34:23', '2022-12-07 10:34:23');

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan_guru`
--

CREATE TABLE `pendidikan_guru` (
  `id` int(10) UNSIGNED NOT NULL,
  `pegawai_id` int(10) UNSIGNED NOT NULL,
  `jenjang` varchar(25) NOT NULL,
  `jurusan` varchar(70) DEFAULT NULL,
  `asal_sekolah` varchar(100) DEFAULT NULL,
  `tahun_lulus` year(4) DEFAULT NULL,
  `nilai_ijasah` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pendidikan_guru`
--

INSERT INTO `pendidikan_guru` (`id`, `pegawai_id`, `jenjang`, `jurusan`, `asal_sekolah`, `tahun_lulus`, `nilai_ijasah`) VALUES
(1, 1, 'S1', 'Informatika', 'SMA', 2021, 100),
(4, 2, 'S3', 'Sistem Informasi', 'SMK', 2021, 99),
(20, 4, 'S1', 'teknik', 'as', 2009, 100);

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id` int(10) UNSIGNED NOT NULL,
  `mapel_id` int(10) UNSIGNED NOT NULL,
  `siswa_id` int(10) UNSIGNED NOT NULL,
  `total_kehadiran` double DEFAULT NULL,
  `deskripsi_nilai` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`id`, `mapel_id`, `siswa_id`, `total_kehadiran`, `deskripsi_nilai`) VALUES
(1, 1, 1, 14, 'Sangat Baik'),
(2, 2, 2, 70, 'baik'),
(5, 2, 12, 100, 'baik');

-- --------------------------------------------------------

--
-- Table structure for table `rincian_penilaian`
--

CREATE TABLE `rincian_penilaian` (
  `id` int(10) UNSIGNED NOT NULL,
  `penilaian_id` int(11) UNSIGNED NOT NULL,
  `nama_nilai` varchar(50) NOT NULL,
  `nilai_angka` double DEFAULT NULL,
  `nilai_deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rincian_penilaian`
--

INSERT INTO `rincian_penilaian` (`id`, `penilaian_id`, `nama_nilai`, `nilai_angka`, `nilai_deskripsi`) VALUES
(1, 1, 'Ulangan Harian 2', 79, 'Cukup Baik'),
(3, 2, 'Ulangan harian', 100, 'Sangat Baik'),
(5, 2, 'udin', 100, 'baik');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(10) UNSIGNED NOT NULL,
  `nisn` varchar(10) NOT NULL,
  `nis` varchar(5) NOT NULL,
  `status_masuk` enum('A','P') DEFAULT NULL,
  `thn_masuk` year(4) NOT NULL,
  `nama_depan` varchar(50) DEFAULT NULL,
  `nama_belakang` varchar(50) DEFAULT NULL,
  `nik` varchar(16) DEFAULT NULL,
  `no_kk` varchar(16) DEFAULT NULL,
  `gender` enum('L','P') DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `kota` varchar(50) DEFAULT NULL,
  `skr_kelas_id` int(10) UNSIGNED NOT NULL,
  `no_telp_rumah` varchar(15) DEFAULT NULL,
  `no_hp_ibu` varchar(15) DEFAULT NULL,
  `no_hp_ayah` varbinary(17) DEFAULT NULL,
  `nm_ayah` varchar(30) DEFAULT NULL,
  `nm_ibu` varchar(30) DEFAULT NULL,
  `nm_wali` varchar(30) DEFAULT NULL,
  `foto` varbinary(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nisn`, `nis`, `status_masuk`, `thn_masuk`, `nama_depan`, `nama_belakang`, `nik`, `no_kk`, `gender`, `tgl_lahir`, `tempat_lahir`, `alamat`, `kota`, `skr_kelas_id`, `no_telp_rumah`, `no_hp_ibu`, `no_hp_ayah`, `nm_ayah`, `nm_ibu`, `nm_wali`, `foto`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '11122', '11109', 'A', 2021, 'Mino', 'Fernando', '1179405', '74839345', 'L', '2004-10-24', 'Seoul', 'Komp.BorneoStars', 'Busan', 1, '08627489574', '08926475842', 0x303832363437313237343833, 'Fendi', 'Sisil', 'Siska', 0x70726f66696c, '2022-11-06 09:58:38', '2022-11-07 19:02:24', NULL),
(2, '2132332423', '11111', 'A', 2022, 'adit', 'adit', '21312', '231312312', 'L', '2001-12-13', 'sdsa', 'dasda', 'asasda', 3, '4534534', '34543543', 0x3334353433353334, 'asda', 'sadsad', 'sadas', 0x6173647361, '2022-11-07 17:08:14', '2022-11-07 17:08:31', NULL),
(12, '32242342', '34234', 'P', 2001, 'sad', 'asdas', '342423', '34534534', 'L', '2022-12-07', 'sdsad', 'asdasd', 'asdasd', 3, '234324', '23424', 0x323334323334, '23423', '234234', '23423', 0x617364, '2022-12-07 12:10:40', '2022-12-07 12:10:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tahun_ajar`
--

CREATE TABLE `tahun_ajar` (
  `id` int(10) UNSIGNED NOT NULL,
  `tahun_ajaran` varchar(9) NOT NULL,
  `tgl_mulai` date DEFAULT NULL,
  `tgl_selesai` date DEFAULT NULL,
  `status_aktif` enum('Y','T') DEFAULT 'T'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tahun_ajar`
--

INSERT INTO `tahun_ajar` (`id`, `tahun_ajaran`, `tgl_mulai`, `tgl_selesai`, `status_aktif`) VALUES
(1, '2021/2022', '2021-09-13', '2022-03-08', 'Y'),
(2, '2022/2023', '2022-10-15', '2023-05-22', 'T'),
(3, '2021/2023', '2021-12-12', '2021-12-12', 'Y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bagian`
--
ALTER TABLE `bagian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jadwal_kelas_id_foreign` (`kelas_id`),
  ADD KEY `jadwal_pegawai_id_foreign` (`pegawai_id`);

--
-- Indexes for table `kehadiran_guru`
--
ALTER TABLE `kehadiran_guru`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kehadiran_guru_pegawai_id_foreign` (`pegawai_id`),
  ADD KEY `kehadiran_guru_jadwal_id_foreign` (`jadwal_id`);

--
-- Indexes for table `kehadiran_siswa`
--
ALTER TABLE `kehadiran_siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kehadiran_siswa_kehadiran_guru_id_foreign` (`kehadiran_guru_id`),
  ADD KEY `kehadiran_siswa_siswa_id_foreign` (`siswa_id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelas_pegawai_id_foreign` (`pegawai_id`),
  ADD KEY `kelas_tahun_ajaran_id_foreign` (`tahun_ajaran_id`);

--
-- Indexes for table `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelas_siswa_kelas_id_foreign` (`kelas_id`),
  ADD KEY `kelas_siswa_siswa_id_foreign` (`siswa_id`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`nip`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `Pegawai_bagian_id_foreign` (`bagian_id`);

--
-- Indexes for table `pendidikan_guru`
--
ALTER TABLE `pendidikan_guru`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pendidikan_guru_pegawai_id_foreign` (`pegawai_id`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penilaian_mapel_id_foreign` (`mapel_id`),
  ADD KEY `penilaian_siswa_id_foreign` (`siswa_id`);

--
-- Indexes for table `rincian_penilaian`
--
ALTER TABLE `rincian_penilaian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rincian_penilaian_penilaian_id_foreign` (`penilaian_id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nisn`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `nis` (`nis`),
  ADD UNIQUE KEY `thn_masuk` (`thn_masuk`),
  ADD KEY `siswa_skr_kelas_id_foreign` (`skr_kelas_id`);

--
-- Indexes for table `tahun_ajar`
--
ALTER TABLE `tahun_ajar`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bagian`
--
ALTER TABLE `bagian`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kehadiran_guru`
--
ALTER TABLE `kehadiran_guru`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `kehadiran_siswa`
--
ALTER TABLE `kehadiran_siswa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pendidikan_guru`
--
ALTER TABLE `pendidikan_guru`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rincian_penilaian`
--
ALTER TABLE `rincian_penilaian`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tahun_ajar`
--
ALTER TABLE `tahun_ajar`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwal_pegawai_id_foreign` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kehadiran_guru`
--
ALTER TABLE `kehadiran_guru`
  ADD CONSTRAINT `kehadiran_guru_jadwal_id_foreign` FOREIGN KEY (`jadwal_id`) REFERENCES `jadwal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kehadiran_guru_pegawai_id_foreign` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kehadiran_siswa`
--
ALTER TABLE `kehadiran_siswa`
  ADD CONSTRAINT `kehadiran_siswa_kehadiran_guru_id_foreign` FOREIGN KEY (`kehadiran_guru_id`) REFERENCES `kehadiran_guru` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kehadiran_siswa_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_pegawai_id_foreign` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kelas_tahun_ajaran_id_foreign` FOREIGN KEY (`tahun_ajaran_id`) REFERENCES `tahun_ajar` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  ADD CONSTRAINT `kelas_siswa_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kelas_siswa_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `Pegawai_bagian_id_foreign` FOREIGN KEY (`bagian_id`) REFERENCES `bagian` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pendidikan_guru`
--
ALTER TABLE `pendidikan_guru`
  ADD CONSTRAINT `pendidikan_guru_pegawai_id_foreign` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `penilaian_mapel_id_foreign` FOREIGN KEY (`mapel_id`) REFERENCES `mapel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rincian_penilaian`
--
ALTER TABLE `rincian_penilaian`
  ADD CONSTRAINT `rincian_penilaian_penilaian_id_foreign` FOREIGN KEY (`penilaian_id`) REFERENCES `penilaian` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_skr_kelas_id_foreign` FOREIGN KEY (`skr_kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
