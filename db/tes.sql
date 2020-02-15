-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Feb 2020 pada 07.07
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tes`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `biodata_wni`
--

CREATE TABLE `biodata_wni` (
  `NIK` varchar(100) NOT NULL,
  `NO_KTP` varchar(100) NOT NULL,
  `TMPT_SBL` varchar(255) NOT NULL,
  `NO_PASPOR` varchar(100) NOT NULL,
  `TGL_AKH_PASPOR` datetime NOT NULL,
  `NAMA_LGKP` varchar(255) NOT NULL,
  `JENIS_KLMIN` varchar(1) NOT NULL,
  `TMPT_LHR` varchar(32) NOT NULL,
  `TGL_LHR` datetime NOT NULL,
  `AKTA_LHR` varchar(1) NOT NULL,
  `NO_AKTA_LHR` varchar(32) NOT NULL,
  `GOL_DRH` varchar(3) NOT NULL,
  `AGAMA` varchar(3) NOT NULL,
  `STAT_KWN` int(32) NOT NULL,
  `AKTA_KWN` varchar(100) NOT NULL,
  `NO_AKTA_KWN` varchar(100) NOT NULL,
  `TGL_KWN` datetime NOT NULL,
  `AKTA_CRAI` varchar(10) NOT NULL,
  `NO_AKTA_CRAI` varchar(100) NOT NULL,
  `TGL_CRAI` datetime NOT NULL,
  `STAT_HBKEL` varchar(100) NOT NULL,
  `KLAIN_FSK` varchar(10) NOT NULL,
  `PNYDNG_CCT` varchar(10) NOT NULL,
  `PDDK_AKH` varchar(10) NOT NULL,
  `JENIS_PKRJN` varchar(100) NOT NULL,
  `NIK_IBU` varchar(100) NOT NULL,
  `NAMA_LGKP_IBU` varchar(200) NOT NULL,
  `NIK_AYAH` varchar(100) NOT NULL,
  `NAMA_LGKP_AYAH` varchar(200) NOT NULL,
  `NAMA_KET_RT` varchar(200) NOT NULL,
  `NAMA_KET_RW` varchar(200) NOT NULL,
  `NAMA_PET_REG` varchar(200) NOT NULL,
  `NIP_PET_REG` varchar(100) NOT NULL,
  `NAMA_PET_ENTRI` varchar(200) NOT NULL,
  `NIP_PET_ENTRI` varchar(100) NOT NULL,
  `TGL_ENTRI` datetime NOT NULL,
  `NO_KK` varchar(100) NOT NULL,
  `JENIS_BNTU` varchar(100) NOT NULL,
  `NO_PROP` varchar(100) NOT NULL,
  `NO_KAB` varchar(100) NOT NULL,
  `NO_KEC` varchar(100) NOT NULL,
  `NO_KEL` varchar(100) NOT NULL,
  `STAT_HIDUP` varchar(100) NOT NULL,
  `TGL_UBAH` datetime NOT NULL,
  `TGL_CETAK_KTP` datetime NOT NULL,
  `TGL_GANTI_KTP` datetime NOT NULL,
  `TGL_PJG_KTP` varchar(100) NOT NULL,
  `STAT_KTP` varchar(100) NOT NULL,
  `ALS_NUMPANG` varchar(200) NOT NULL,
  `PFLAG` varchar(200) NOT NULL,
  `CFLAG` varchar(100) NOT NULL,
  `SYNC_FLAG` varchar(100) NOT NULL,
  `KET_AGAMA` varchar(100) NOT NULL,
  `KEBANGSAAN` varchar(100) NOT NULL,
  `GELAR` varchar(10) NOT NULL,
  `KET_PKRJN` varchar(100) NOT NULL,
  `GLR_AGAMA` varchar(100) NOT NULL,
  `GLR_AKADEMIS` varchar(100) NOT NULL,
  `GLR_BANGSAWAN` varchar(100) NOT NULL,
  `IS_PROS_DATANG` varchar(100) NOT NULL,
  `DESC_PEKERJAAN` varchar(100) NOT NULL,
  `DESC_KEPERCAYAAN` varchar(100) NOT NULL,
  `FLAG_STATUS` varchar(200) NOT NULL,
  `COUNT_KTP` varchar(100) NOT NULL,
  `COUNT_BIODATA` varchar(100) NOT NULL,
  `FLAG_EKTP` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_keluarga`
--

CREATE TABLE `data_keluarga` (
  `NO_KK` varchar(100) NOT NULL,
  `NAMA_KEP` varchar(100) NOT NULL,
  `ALAMAT` varchar(255) NOT NULL,
  `NO_RT` varchar(100) NOT NULL,
  `NO_RW` varchar(100) NOT NULL,
  `DUSUN` varchar(100) NOT NULL,
  `KODE_POS` varchar(100) NOT NULL,
  `TELP` varchar(100) NOT NULL,
  `ALS_PRMOHON` varchar(100) NOT NULL,
  `ALS_NUMPANG` varchar(100) NOT NULL,
  `NO_PROP` varchar(100) NOT NULL,
  `NO_KAB` varchar(100) NOT NULL,
  `NO_KEC` varchar(100) NOT NULL,
  `NO_KEL` varchar(100) NOT NULL,
  `USERID` varchar(100) NOT NULL,
  `TGL_INSERTION` datetime NOT NULL,
  `TGL_UPDATION` datetime NOT NULL,
  `CFLAG` varchar(100) NOT NULL,
  `SYNC_FLAG` varchar(100) NOT NULL,
  `Dump` varchar(100) NOT NULL,
  `OA_NAMA_PERTAMA` varchar(100) NOT NULL,
  `OA_NAMA_KELUARGA` varchar(100) NOT NULL,
  `TIPE_KK` varchar(100) NOT NULL,
  `NIK_KK` varchar(100) NOT NULL,
  `COUNT_KK` varchar(100) NOT NULL,
  `FLAGSINK` varchar(100) NOT NULL,
  `TGL_SIAK_PLUS` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
