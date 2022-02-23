-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 23 Feb 2022 pada 09.33
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simpeg`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku_dosen`
--

CREATE TABLE `buku_dosen` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `id_tingkatan` int(11) NOT NULL,
  `isbn` varchar(100) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `tahun` varchar(5) NOT NULL,
  `cover` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buku_dosen`
--

INSERT INTO `buku_dosen` (`id`, `id_user`, `judul`, `id_tingkatan`, `isbn`, `penerbit`, `tahun`, `cover`) VALUES
(2, 57, 'Tumbaz', 1, '8748436578', 'Ryan', '2021', '4590.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `doc_kepangkatan_dosen`
--

CREATE TABLE `doc_kepangkatan_dosen` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `sk_cpns` varchar(100) DEFAULT NULL,
  `sk_pns` varchar(100) DEFAULT NULL,
  `sk_kontrak` varchar(100) DEFAULT NULL,
  `karpeg` varchar(100) DEFAULT NULL,
  `sertifikat` varchar(100) DEFAULT NULL,
  `sk_jabatan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id` int(11) NOT NULL,
  `status_dosen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id`, `status_dosen`) VALUES
(1, 'Tetap'),
(2, 'Tidak Tetap');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen_skills`
--

CREATE TABLE `dosen_skills` (
  `id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dosen_skills`
--

INSERT INTO `dosen_skills` (`id`, `status`) VALUES
(1, 'Ya'),
(2, 'Tidak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fakultas`
--

CREATE TABLE `fakultas` (
  `id` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `fakultas`
--

INSERT INTO `fakultas` (`id`, `code`, `name`) VALUES
(2, 'SI001', 'Sistem informasi'),
(3, 'TI001', 'Teknik Informatika');

-- --------------------------------------------------------

--
-- Struktur dari tabel `golongan`
--

CREATE TABLE `golongan` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `golongan`
--

INSERT INTO `golongan` (`id`, `name`) VALUES
(10, 'III/a - Penata Muda'),
(11, 'III/b - Penata Muda Tk. I'),
(12, 'III/c - Penata'),
(13, 'III/d - Penata Tk. I'),
(14, 'IV/a - Pembina'),
(15, 'IV/b - Pembina Tk. I'),
(16, 'IV/c - Pembina Utama Muda'),
(17, 'IV/d - Pembina Utama Madya'),
(18, 'IV/e - Pembina Utama');

-- --------------------------------------------------------

--
-- Struktur dari tabel `haki`
--

CREATE TABLE `haki` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `haki`
--

INSERT INTO `haki` (`id`, `name`) VALUES
(2, 'Teknologi'),
(3, 'Seni');

-- --------------------------------------------------------

--
-- Struktur dari tabel `haki_dosen`
--

CREATE TABLE `haki_dosen` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_tingkatan` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `tahun` varchar(5) NOT NULL,
  `doc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hak_akses`
--

CREATE TABLE `hak_akses` (
  `id_role` int(11) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hak_akses`
--

INSERT INTO `hak_akses` (`id_role`, `role`) VALUES
(1, 'Superadmin'),
(2, 'Dosen'),
(3, 'Pegawai'),
(4, 'Operator Kepegawaian');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenjang_pendidikan`
--

CREATE TABLE `jenjang_pendidikan` (
  `id` int(11) NOT NULL,
  `jenjang_pendidikan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenjang_pendidikan`
--

INSERT INTO `jenjang_pendidikan` (`id`, `jenjang_pendidikan`) VALUES
(6, 'SMA/SMK'),
(7, 'D1'),
(8, 'D2'),
(10, 'D3'),
(11, 'D4'),
(12, 'S1'),
(13, 'S2'),
(14, 'S3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `name`) VALUES
(5, 'Teknisi'),
(6, 'Laboran'),
(7, 'Administrasi'),
(8, 'Arsiparis');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kepangkatan_dosen`
--

CREATE TABLE `kepangkatan_dosen` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nidn` varchar(16) DEFAULT NULL,
  `no_karpeg` varchar(50) DEFAULT NULL,
  `status` enum('Ya','Tidak') DEFAULT NULL,
  `nomor_serdos` varchar(50) DEFAULT NULL,
  `tmt_pns` date DEFAULT NULL,
  `id_golongan` int(11) DEFAULT NULL,
  `tmt_golongan` date DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `tmt_jabatan` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kepangkatan_dosen`
--

INSERT INTO `kepangkatan_dosen` (`id`, `id_user`, `nidn`, `no_karpeg`, `status`, `nomor_serdos`, `tmt_pns`, `id_golongan`, `tmt_golongan`, `jabatan`, `tmt_jabatan`) VALUES
(6, 57, '657864', '78594', 'Ya', '757984', '2022-01-03', 11, '2022-01-19', 'Programmer', '2022-01-05'),
(7, 59, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kepangkatan_pegawai`
--

CREATE TABLE `kepangkatan_pegawai` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `no_karpeg` varchar(50) DEFAULT NULL,
  `tmt_pns` date DEFAULT NULL,
  `id_golongan` int(11) DEFAULT NULL,
  `tmt_golongan` date DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `tmt_jabatan` date DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kepangkatan_pegawai`
--

INSERT INTO `kepangkatan_pegawai` (`id`, `id_user`, `no_karpeg`, `tmt_pns`, `id_golongan`, `tmt_golongan`, `jabatan`, `tmt_jabatan`, `id_kategori`) VALUES
(7, 55, '78594', '2021-12-15', 10, '2021-12-06', 'Programmer', '2021-12-02', 5),
(8, 58, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kepanitiaan`
--

CREATE TABLE `kepanitiaan` (
  `id` int(11) NOT NULL,
  `kepanitiaan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kepanitiaan`
--

INSERT INTO `kepanitiaan` (`id`, `kepanitiaan`) VALUES
(7, 'Ketua'),
(8, 'Wakil Ketua'),
(9, 'Sekretaris'),
(10, 'Anggota');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kursus_dosen`
--

CREATE TABLE `kursus_dosen` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `tahun` varchar(5) NOT NULL,
  `id_tingkatan` int(11) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `sertifikat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kursus_pegawai`
--

CREATE TABLE `kursus_pegawai` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `tahun` varchar(5) NOT NULL,
  `id_tingkatan` int(11) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `sertifikat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lainnya_dosen`
--

CREATE TABLE `lainnya_dosen` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `tahun` varchar(5) NOT NULL,
  `id_tingkatan` int(11) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `sertifikat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lainnya_pegawai`
--

CREATE TABLE `lainnya_pegawai` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `tahun` varchar(5) NOT NULL,
  `id_tingkatan` int(11) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `sertifikat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `nonprofesi_dosen`
--

CREATE TABLE `nonprofesi_dosen` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tahun` year(4) NOT NULL,
  `penyelenggara` varchar(50) NOT NULL,
  `periode` varchar(5) NOT NULL,
  `doc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nonprofesi_dosen`
--

INSERT INTO `nonprofesi_dosen` (`id`, `id_user`, `nama`, `tahun`, `penyelenggara`, `periode`, `doc`) VALUES
(2, 57, 'Ryan', 2021, 'Ryan', '2020', '3164.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `panitia_dosen`
--

CREATE TABLE `panitia_dosen` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `id_status` int(50) NOT NULL,
  `tahun` year(4) NOT NULL,
  `penyelenggara` varchar(50) NOT NULL,
  `doc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `panitia_dosen`
--

INSERT INTO `panitia_dosen` (`id`, `id_user`, `nama`, `id_status`, `tahun`, `penyelenggara`, `doc`) VALUES
(3, 57, 'Kegiatan A', 7, 2021, 'Ryan', '7288.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(11) NOT NULL,
  `status_pegawai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id`, `status_pegawai`) VALUES
(13, 'PNS'),
(14, 'Non PNS'),
(15, 'Kontrak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelatihan_dosen`
--

CREATE TABLE `pelatihan_dosen` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `tahun` varchar(5) NOT NULL,
  `id_tingkatan` int(11) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `sertifikat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelatihan_pegawai`
--

CREATE TABLE `pelatihan_pegawai` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `tahun` varchar(5) NOT NULL,
  `id_tingkatan` int(11) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `sertifikat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemateri`
--

CREATE TABLE `pemateri` (
  `id` int(11) NOT NULL,
  `pemateri` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemateri`
--

INSERT INTO `pemateri` (`id`, `pemateri`) VALUES
(11, 'Pemateri'),
(12, 'Narasumber');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemateri_dosen`
--

CREATE TABLE `pemateri_dosen` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `penyelenggara` varchar(50) NOT NULL,
  `id_pemateri` int(11) NOT NULL,
  `tahun` varchar(5) NOT NULL,
  `doc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemateri_dosen`
--

INSERT INTO `pemateri_dosen` (`id`, `id_user`, `judul`, `penyelenggara`, `id_pemateri`, `tahun`, `doc`) VALUES
(2, 57, 'jkjlkjljkjk', 'Ryan', 11, '2021', '8329.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendidikan_dosen`
--

CREATE TABLE `pendidikan_dosen` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pendidikan` int(11) NOT NULL,
  `nama_pt` varchar(100) NOT NULL,
  `tahun` int(5) NOT NULL,
  `judul_ta` varchar(200) NOT NULL,
  `ipk` double NOT NULL,
  `ijazah` varchar(50) NOT NULL,
  `transkrip` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendidikan_pegawai`
--

CREATE TABLE `pendidikan_pegawai` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pendidikan` int(11) NOT NULL,
  `nama_pt` varchar(100) NOT NULL,
  `tahun` int(5) NOT NULL,
  `judul_ta` varchar(200) NOT NULL,
  `ipk` double NOT NULL,
  `ijazah` varchar(50) NOT NULL,
  `transkrip` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penelitian_dosen`
--

CREATE TABLE `penelitian_dosen` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `id_tingkatan` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `tahun` varchar(5) NOT NULL,
  `publikasi` varchar(50) NOT NULL,
  `doc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penelitian_dosen`
--

INSERT INTO `penelitian_dosen` (`id`, `id_user`, `jenis`, `id_tingkatan`, `judul`, `tahun`, `publikasi`, `doc`) VALUES
(4, 57, 'AB', 1, 'Tumbaz 1', '2011', 'AB', '7104.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengabdian_dosen`
--

CREATE TABLE `pengabdian_dosen` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `id_status` int(11) NOT NULL,
  `tahun` varchar(5) NOT NULL,
  `id_tingkatan` int(11) NOT NULL,
  `publikasi` varchar(50) NOT NULL,
  `doc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengabdian_dosen`
--

INSERT INTO `pengabdian_dosen` (`id`, `id_user`, `judul`, `id_status`, `tahun`, `id_tingkatan`, `publikasi`, `doc`) VALUES
(2, 57, 'dghjfghjs', 8, '2019', 4, 'AB', '1222.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajaran_dosen`
--

CREATE TABLE `pengajaran_dosen` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_tahun` int(11) NOT NULL,
  `matkul` varchar(50) NOT NULL,
  `sks` varchar(5) NOT NULL,
  `sk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penghargaan_dosen`
--

CREATE TABLE `penghargaan_dosen` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tahun` year(4) NOT NULL,
  `id_tingkatan` int(11) NOT NULL,
  `pemberi` varchar(50) NOT NULL,
  `doc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penghargaan_dosen`
--

INSERT INTO `penghargaan_dosen` (`id`, `id_user`, `nama`, `tahun`, `id_tingkatan`, `pemberi`, `doc`) VALUES
(3, 57, 'Juara 1', 2019, 5, 'NPIC', '279.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penghargaan_pegawai`
--

CREATE TABLE `penghargaan_pegawai` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tahun` varchar(5) NOT NULL,
  `id_tingkatan` int(11) NOT NULL,
  `pemberi` varchar(50) NOT NULL,
  `doc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penghargaan_pegawai`
--

INSERT INTO `penghargaan_pegawai` (`id`, `id_user`, `nama`, `tahun`, `id_tingkatan`, `pemberi`, `doc`) VALUES
(4, 55, 'A', '2011', 1, 'NPIC', '4864.png'),
(5, 55, 'Ryan', '2021', 1, 'NPIC A', '8813.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_dosen`
--

CREATE TABLE `personal_dosen` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nik` int(16) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `agama` varchar(20) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `email_institusi` varchar(50) DEFAULT NULL,
  `id_pendidikan` int(11) DEFAULT NULL,
  `id_dosen` int(11) DEFAULT NULL,
  `id_dosen_skills` int(11) DEFAULT NULL,
  `id_fakultas` int(11) DEFAULT NULL,
  `id_prodi` int(11) DEFAULT NULL,
  `foto` varchar(100) NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `personal_dosen`
--

INSERT INTO `personal_dosen` (`id`, `id_user`, `nik`, `nama`, `alamat`, `jenis_kelamin`, `tgl_lahir`, `agama`, `no_hp`, `email`, `email_institusi`, `id_pendidikan`, `id_dosen`, `id_dosen_skills`, `id_fakultas`, `id_prodi`, `foto`) VALUES
(5, 57, 2147483647, 'Ryan Aprianto', 'blok selasa Rt 02 Rw 03, Desa Panjalin Kidul, Kecamatan Sumberjaya', 'L', '2021-12-15', 'Islam', '089639626048', 'administrator@mail.com', 'Ryan@erloom.id', 12, 1, 1, 2, 2, '9551.jpg'),
(6, 59, NULL, 'Figma', NULL, NULL, '2022-02-17', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 2, 'default.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_pegawai`
--

CREATE TABLE `personal_pegawai` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nik` int(16) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `agama` varchar(20) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `email_institusi` varchar(50) DEFAULT NULL,
  `id_pendidikan` int(11) DEFAULT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `id_fakultas` int(11) DEFAULT NULL,
  `id_prodi` int(11) DEFAULT NULL,
  `foto` varchar(100) NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `personal_pegawai`
--

INSERT INTO `personal_pegawai` (`id`, `id_user`, `nik`, `nama`, `alamat`, `jenis_kelamin`, `tgl_lahir`, `agama`, `no_hp`, `email`, `email_institusi`, `id_pendidikan`, `id_pegawai`, `id_kategori`, `id_fakultas`, `id_prodi`, `foto`) VALUES
(9, 55, 2147483647, 'Ryan Aprianto', 'blok selasa Rt 02 Rw 03, Desa Panjalin Kidul, Kecamatan Sumberjaya', 'L', '2021-12-16', 'Islam', '089639626048', 'administrator@mail.com', 'Ryan@erloom.id', 12, 13, 5, 2, 2, '854.jpg'),
(10, 58, 2147483647, 'Ryan Aprianto', 'Jakarta', 'L', '2022-02-10', 'Islam', '089639626048', 'Ryan.Aprianto77777@gmail.com', 'Ryan.Aprianto77777@gmail.com', 12, 13, 6, 2, 2, 'default.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodi`
--

CREATE TABLE `prodi` (
  `id` int(11) NOT NULL,
  `kode_prodi` varchar(10) NOT NULL,
  `nama_prodi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `prodi`
--

INSERT INTO `prodi` (`id`, `kode_prodi`, `nama_prodi`) VALUES
(2, 'RPL001', 'Rekayasa Perangkat Lunak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profesi_dosen`
--

CREATE TABLE `profesi_dosen` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tahun` year(4) NOT NULL,
  `penyelenggara` varchar(50) NOT NULL,
  `periode` varchar(5) NOT NULL,
  `doc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `profesi_dosen`
--

INSERT INTO `profesi_dosen` (`id`, `id_user`, `nama`, `tahun`, `penyelenggara`, `periode`, `doc`) VALUES
(2, 57, 'Test edit', 2021, 'Ryan', '2020', '2162.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_dosen`
--

CREATE TABLE `riwayat_dosen` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_jabatan` varchar(50) NOT NULL,
  `periode` varchar(10) NOT NULL,
  `tahun` varchar(10) NOT NULL,
  `sk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `seminar_dosen`
--

CREATE TABLE `seminar_dosen` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `tahun` varchar(5) NOT NULL,
  `id_tingkatan` int(11) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `sertifikat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `seminar_dosen`
--

INSERT INTO `seminar_dosen` (`id`, `id_user`, `judul`, `tahun`, `id_tingkatan`, `kota`, `sertifikat`) VALUES
(3, 57, 'Tumbaz', '2021', 1, 'Cirebon', '8024.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `seminar_pegawai`
--

CREATE TABLE `seminar_pegawai` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `tahun` varchar(5) NOT NULL,
  `id_tingkatan` int(11) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `sertifikat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun_akademik`
--

CREATE TABLE `tahun_akademik` (
  `id` int(11) NOT NULL,
  `kode_TA` varchar(10) NOT NULL,
  `tahun_akademik` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tahun_akademik`
--

INSERT INTO `tahun_akademik` (`id`, `kode_TA`, `tahun_akademik`) VALUES
(4, 'RPL001', '2018');

-- --------------------------------------------------------

--
-- Struktur dari tabel `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `team` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `team`
--

INSERT INTO `team` (`id`, `team`) VALUES
(7, 'Ketua'),
(8, 'Wakil Ketua'),
(10, 'Anggota');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tingkatan`
--

CREATE TABLE `tingkatan` (
  `id` int(11) NOT NULL,
  `tingkatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tingkatan`
--

INSERT INTO `tingkatan` (`id`, `tingkatan`) VALUES
(1, 'Lokal'),
(4, 'Nasional'),
(5, 'Internasional');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nip` int(11) DEFAULT NULL,
  `nama` varchar(35) NOT NULL,
  `username` varchar(15) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `id_fakultas` int(11) DEFAULT NULL,
  `id_prodi` int(11) DEFAULT NULL,
  `img` varchar(50) NOT NULL DEFAULT 'default.png',
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nip`, `nama`, `username`, `password`, `tgl_lahir`, `id_fakultas`, `id_prodi`, `img`, `role`) VALUES
(35, NULL, 'Superadmin', 'superadmin', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', NULL, NULL, NULL, 'default.png', 1),
(55, 41170405, 'Ryan Aprianto', 'A', '52a63f2b878b06bf69653149f46b02a9ec301c62', '2021-12-16', NULL, NULL, 'default.png', 3),
(56, 123456, 'Ryan', NULL, '054acc1187f7506eda2edb9c734a2687cd93b9e2', '2021-12-08', 2, 2, 'default.png', 4),
(57, 41170405, 'Ryan Aprianto', NULL, '14a7c86ddc82442039795af1842493e56051d6ce', '2021-12-15', 2, 2, 'default.png', 2),
(58, 566766, 'Adcom', NULL, '39794ba330c9d27bcd8ce1229c2645f5f82a3e54', '2022-02-10', NULL, NULL, 'default.png', 3),
(59, 2345, 'Figma', NULL, 'ea52addb3404b8b141a36f69d387b7e3a1678c96', '2022-02-17', 2, 2, 'default.png', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `workshop_dosen`
--

CREATE TABLE `workshop_dosen` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `tahun` varchar(5) NOT NULL,
  `id_tingkatan` int(11) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `sertifikat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `workshop_dosen`
--

INSERT INTO `workshop_dosen` (`id`, `id_user`, `judul`, `tahun`, `id_tingkatan`, `kota`, `sertifikat`) VALUES
(2, 57, 'Workshop A', '2011', 1, 'Cirebon', '5736.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `workshop_pegawai`
--

CREATE TABLE `workshop_pegawai` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `tahun` varchar(5) NOT NULL,
  `id_tingkatan` int(11) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `sertifikat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku_dosen`
--
ALTER TABLE `buku_dosen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tahun` (`id_tingkatan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `doc_kepangkatan_dosen`
--
ALTER TABLE `doc_kepangkatan_dosen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_golongan` (`sk_jabatan`);

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dosen_skills`
--
ALTER TABLE `dosen_skills`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `golongan`
--
ALTER TABLE `golongan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `haki`
--
ALTER TABLE `haki`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `haki_dosen`
--
ALTER TABLE `haki_dosen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tahun` (`id_tingkatan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `hak_akses`
--
ALTER TABLE `hak_akses`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeks untuk tabel `jenjang_pendidikan`
--
ALTER TABLE `jenjang_pendidikan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kepangkatan_dosen`
--
ALTER TABLE `kepangkatan_dosen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_golongan` (`id_golongan`);

--
-- Indeks untuk tabel `kepangkatan_pegawai`
--
ALTER TABLE `kepangkatan_pegawai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_golongan` (`id_golongan`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `kepanitiaan`
--
ALTER TABLE `kepanitiaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kursus_dosen`
--
ALTER TABLE `kursus_dosen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tingkatan` (`id_tingkatan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `kursus_pegawai`
--
ALTER TABLE `kursus_pegawai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tingkatan` (`id_tingkatan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `lainnya_dosen`
--
ALTER TABLE `lainnya_dosen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tingkatan` (`id_tingkatan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `lainnya_pegawai`
--
ALTER TABLE `lainnya_pegawai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tingkatan` (`id_tingkatan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `nonprofesi_dosen`
--
ALTER TABLE `nonprofesi_dosen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `panitia_dosen`
--
ALTER TABLE `panitia_dosen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_status` (`id_status`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pelatihan_dosen`
--
ALTER TABLE `pelatihan_dosen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tingkatan` (`id_tingkatan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `pelatihan_pegawai`
--
ALTER TABLE `pelatihan_pegawai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tingkatan` (`id_tingkatan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `pemateri`
--
ALTER TABLE `pemateri`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pemateri_dosen`
--
ALTER TABLE `pemateri_dosen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_pemateri` (`id_pemateri`);

--
-- Indeks untuk tabel `pendidikan_dosen`
--
ALTER TABLE `pendidikan_dosen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_pendidikan` (`id_pendidikan`);

--
-- Indeks untuk tabel `pendidikan_pegawai`
--
ALTER TABLE `pendidikan_pegawai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_pendidikan` (`id_pendidikan`);

--
-- Indeks untuk tabel `penelitian_dosen`
--
ALTER TABLE `penelitian_dosen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tahun` (`id_tingkatan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `pengabdian_dosen`
--
ALTER TABLE `pengabdian_dosen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_status` (`id_status`),
  ADD KEY `id_tingkatan` (`id_tingkatan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `pengajaran_dosen`
--
ALTER TABLE `pengajaran_dosen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tahun` (`id_tahun`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `penghargaan_dosen`
--
ALTER TABLE `penghargaan_dosen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tingkatan` (`id_tingkatan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `penghargaan_pegawai`
--
ALTER TABLE `penghargaan_pegawai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tingkatan` (`id_tingkatan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `personal_dosen`
--
ALTER TABLE `personal_dosen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pendidikan` (`id_pendidikan`),
  ADD KEY `id_dosen` (`id_dosen`),
  ADD KEY `id_dosen_skills` (`id_dosen_skills`),
  ADD KEY `id_fakultas` (`id_fakultas`),
  ADD KEY `id_prodi` (`id_prodi`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `personal_pegawai`
--
ALTER TABLE `personal_pegawai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pendidikan` (`id_pendidikan`),
  ADD KEY `id_dosen` (`id_pegawai`),
  ADD KEY `id_dosen_skills` (`id_kategori`),
  ADD KEY `id_fakultas` (`id_fakultas`),
  ADD KEY `id_prodi` (`id_prodi`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `profesi_dosen`
--
ALTER TABLE `profesi_dosen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `riwayat_dosen`
--
ALTER TABLE `riwayat_dosen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `seminar_dosen`
--
ALTER TABLE `seminar_dosen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tingkatan` (`id_tingkatan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `seminar_pegawai`
--
ALTER TABLE `seminar_pegawai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tingkatan` (`id_tingkatan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tahun_akademik`
--
ALTER TABLE `tahun_akademik`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tingkatan`
--
ALTER TABLE `tingkatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role` (`role`),
  ADD KEY `role_2` (`role`),
  ADD KEY `id_fakultas` (`id_fakultas`),
  ADD KEY `id_prodi` (`id_prodi`);

--
-- Indeks untuk tabel `workshop_dosen`
--
ALTER TABLE `workshop_dosen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tingkatan` (`id_tingkatan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `workshop_pegawai`
--
ALTER TABLE `workshop_pegawai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tingkatan` (`id_tingkatan`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku_dosen`
--
ALTER TABLE `buku_dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `doc_kepangkatan_dosen`
--
ALTER TABLE `doc_kepangkatan_dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `dosen_skills`
--
ALTER TABLE `dosen_skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `golongan`
--
ALTER TABLE `golongan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `haki`
--
ALTER TABLE `haki`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `haki_dosen`
--
ALTER TABLE `haki_dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `hak_akses`
--
ALTER TABLE `hak_akses`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `jenjang_pendidikan`
--
ALTER TABLE `jenjang_pendidikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `kepangkatan_dosen`
--
ALTER TABLE `kepangkatan_dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `kepangkatan_pegawai`
--
ALTER TABLE `kepangkatan_pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `kepanitiaan`
--
ALTER TABLE `kepanitiaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `kursus_dosen`
--
ALTER TABLE `kursus_dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kursus_pegawai`
--
ALTER TABLE `kursus_pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `lainnya_dosen`
--
ALTER TABLE `lainnya_dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `lainnya_pegawai`
--
ALTER TABLE `lainnya_pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `nonprofesi_dosen`
--
ALTER TABLE `nonprofesi_dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `panitia_dosen`
--
ALTER TABLE `panitia_dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `pelatihan_dosen`
--
ALTER TABLE `pelatihan_dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pelatihan_pegawai`
--
ALTER TABLE `pelatihan_pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pemateri`
--
ALTER TABLE `pemateri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `pemateri_dosen`
--
ALTER TABLE `pemateri_dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pendidikan_dosen`
--
ALTER TABLE `pendidikan_dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `pendidikan_pegawai`
--
ALTER TABLE `pendidikan_pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `penelitian_dosen`
--
ALTER TABLE `penelitian_dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pengabdian_dosen`
--
ALTER TABLE `pengabdian_dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pengajaran_dosen`
--
ALTER TABLE `pengajaran_dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `penghargaan_dosen`
--
ALTER TABLE `penghargaan_dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `penghargaan_pegawai`
--
ALTER TABLE `penghargaan_pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `personal_dosen`
--
ALTER TABLE `personal_dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `personal_pegawai`
--
ALTER TABLE `personal_pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `profesi_dosen`
--
ALTER TABLE `profesi_dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `riwayat_dosen`
--
ALTER TABLE `riwayat_dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `seminar_dosen`
--
ALTER TABLE `seminar_dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `seminar_pegawai`
--
ALTER TABLE `seminar_pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tahun_akademik`
--
ALTER TABLE `tahun_akademik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tingkatan`
--
ALTER TABLE `tingkatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT untuk tabel `workshop_dosen`
--
ALTER TABLE `workshop_dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `workshop_pegawai`
--
ALTER TABLE `workshop_pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `buku_dosen`
--
ALTER TABLE `buku_dosen`
  ADD CONSTRAINT `buku_dosen_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `buku_dosen_ibfk_2` FOREIGN KEY (`id_tingkatan`) REFERENCES `tingkatan` (`id`);

--
-- Ketidakleluasaan untuk tabel `doc_kepangkatan_dosen`
--
ALTER TABLE `doc_kepangkatan_dosen`
  ADD CONSTRAINT `doc_kepangkatan_dosen_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `haki_dosen`
--
ALTER TABLE `haki_dosen`
  ADD CONSTRAINT `haki_dosen_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `haki` (`id`),
  ADD CONSTRAINT `haki_dosen_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `haki_dosen_ibfk_3` FOREIGN KEY (`id_tingkatan`) REFERENCES `tingkatan` (`id`);

--
-- Ketidakleluasaan untuk tabel `kepangkatan_dosen`
--
ALTER TABLE `kepangkatan_dosen`
  ADD CONSTRAINT `kepangkatan_dosen_ibfk_1` FOREIGN KEY (`id_golongan`) REFERENCES `golongan` (`id`),
  ADD CONSTRAINT `kepangkatan_dosen_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kepangkatan_pegawai`
--
ALTER TABLE `kepangkatan_pegawai`
  ADD CONSTRAINT `kepangkatan_pegawai_ibfk_1` FOREIGN KEY (`id_golongan`) REFERENCES `golongan` (`id`),
  ADD CONSTRAINT `kepangkatan_pegawai_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kepangkatan_pegawai_ibfk_3` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id`);

--
-- Ketidakleluasaan untuk tabel `kursus_dosen`
--
ALTER TABLE `kursus_dosen`
  ADD CONSTRAINT `kursus_dosen_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `kursus_dosen_ibfk_2` FOREIGN KEY (`id_tingkatan`) REFERENCES `tingkatan` (`id`);

--
-- Ketidakleluasaan untuk tabel `kursus_pegawai`
--
ALTER TABLE `kursus_pegawai`
  ADD CONSTRAINT `kursus_pegawai_ibfk_1` FOREIGN KEY (`id_tingkatan`) REFERENCES `tingkatan` (`id`),
  ADD CONSTRAINT `kursus_pegawai_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `lainnya_dosen`
--
ALTER TABLE `lainnya_dosen`
  ADD CONSTRAINT `lainnya_dosen_ibfk_1` FOREIGN KEY (`id_tingkatan`) REFERENCES `tingkatan` (`id`),
  ADD CONSTRAINT `lainnya_dosen_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `lainnya_pegawai`
--
ALTER TABLE `lainnya_pegawai`
  ADD CONSTRAINT `lainnya_pegawai_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lainnya_pegawai_ibfk_2` FOREIGN KEY (`id_tingkatan`) REFERENCES `tingkatan` (`id`);

--
-- Ketidakleluasaan untuk tabel `nonprofesi_dosen`
--
ALTER TABLE `nonprofesi_dosen`
  ADD CONSTRAINT `nonprofesi_dosen_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `panitia_dosen`
--
ALTER TABLE `panitia_dosen`
  ADD CONSTRAINT `panitia_dosen_ibfk_1` FOREIGN KEY (`id_status`) REFERENCES `kepanitiaan` (`id`),
  ADD CONSTRAINT `panitia_dosen_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `pemateri_dosen`
--
ALTER TABLE `pemateri_dosen`
  ADD CONSTRAINT `pemateri_dosen_ibfk_1` FOREIGN KEY (`id_pemateri`) REFERENCES `pemateri` (`id`),
  ADD CONSTRAINT `pemateri_dosen_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `pendidikan_dosen`
--
ALTER TABLE `pendidikan_dosen`
  ADD CONSTRAINT `pendidikan_dosen_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `pendidikan_dosen_ibfk_2` FOREIGN KEY (`id_pendidikan`) REFERENCES `jenjang_pendidikan` (`id`);

--
-- Ketidakleluasaan untuk tabel `pendidikan_pegawai`
--
ALTER TABLE `pendidikan_pegawai`
  ADD CONSTRAINT `pendidikan_pegawai_ibfk_1` FOREIGN KEY (`id_pendidikan`) REFERENCES `jenjang_pendidikan` (`id`),
  ADD CONSTRAINT `pendidikan_pegawai_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penelitian_dosen`
--
ALTER TABLE `penelitian_dosen`
  ADD CONSTRAINT `penelitian_dosen_ibfk_1` FOREIGN KEY (`id_tingkatan`) REFERENCES `tingkatan` (`id`),
  ADD CONSTRAINT `penelitian_dosen_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengabdian_dosen`
--
ALTER TABLE `pengabdian_dosen`
  ADD CONSTRAINT `pengabdian_dosen_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `pengabdian_dosen_ibfk_2` FOREIGN KEY (`id_status`) REFERENCES `team` (`id`),
  ADD CONSTRAINT `pengabdian_dosen_ibfk_3` FOREIGN KEY (`id_tingkatan`) REFERENCES `tingkatan` (`id`);

--
-- Ketidakleluasaan untuk tabel `pengajaran_dosen`
--
ALTER TABLE `pengajaran_dosen`
  ADD CONSTRAINT `pengajaran_dosen_ibfk_1` FOREIGN KEY (`id_tahun`) REFERENCES `tahun_akademik` (`id`),
  ADD CONSTRAINT `pengajaran_dosen_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `penghargaan_dosen`
--
ALTER TABLE `penghargaan_dosen`
  ADD CONSTRAINT `penghargaan_dosen_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penghargaan_dosen_ibfk_2` FOREIGN KEY (`id_tingkatan`) REFERENCES `tingkatan` (`id`);

--
-- Ketidakleluasaan untuk tabel `penghargaan_pegawai`
--
ALTER TABLE `penghargaan_pegawai`
  ADD CONSTRAINT `penghargaan_pegawai_ibfk_1` FOREIGN KEY (`id_tingkatan`) REFERENCES `tingkatan` (`id`),
  ADD CONSTRAINT `penghargaan_pegawai_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `personal_dosen`
--
ALTER TABLE `personal_dosen`
  ADD CONSTRAINT `personal_dosen_ibfk_1` FOREIGN KEY (`id_pendidikan`) REFERENCES `jenjang_pendidikan` (`id`),
  ADD CONSTRAINT `personal_dosen_ibfk_2` FOREIGN KEY (`id_dosen_skills`) REFERENCES `dosen_skills` (`id`),
  ADD CONSTRAINT `personal_dosen_ibfk_3` FOREIGN KEY (`id_fakultas`) REFERENCES `fakultas` (`id`),
  ADD CONSTRAINT `personal_dosen_ibfk_4` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id`),
  ADD CONSTRAINT `personal_dosen_ibfk_5` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id`),
  ADD CONSTRAINT `personal_dosen_ibfk_6` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `personal_pegawai`
--
ALTER TABLE `personal_pegawai`
  ADD CONSTRAINT `personal_pegawai_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `personal_pegawai_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id`),
  ADD CONSTRAINT `personal_pegawai_ibfk_3` FOREIGN KEY (`id_fakultas`) REFERENCES `fakultas` (`id`),
  ADD CONSTRAINT `personal_pegawai_ibfk_4` FOREIGN KEY (`id_pendidikan`) REFERENCES `jenjang_pendidikan` (`id`),
  ADD CONSTRAINT `personal_pegawai_ibfk_5` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id`),
  ADD CONSTRAINT `personal_pegawai_ibfk_6` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id`);

--
-- Ketidakleluasaan untuk tabel `profesi_dosen`
--
ALTER TABLE `profesi_dosen`
  ADD CONSTRAINT `profesi_dosen_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `riwayat_dosen`
--
ALTER TABLE `riwayat_dosen`
  ADD CONSTRAINT `riwayat_dosen_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `seminar_dosen`
--
ALTER TABLE `seminar_dosen`
  ADD CONSTRAINT `seminar_dosen_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `seminar_dosen_ibfk_2` FOREIGN KEY (`id_tingkatan`) REFERENCES `tingkatan` (`id`);

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_fakultas`) REFERENCES `fakultas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id`),
  ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`role`) REFERENCES `hak_akses` (`id_role`);

--
-- Ketidakleluasaan untuk tabel `workshop_dosen`
--
ALTER TABLE `workshop_dosen`
  ADD CONSTRAINT `workshop_dosen_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `workshop_dosen_ibfk_2` FOREIGN KEY (`id_tingkatan`) REFERENCES `tingkatan` (`id`);

--
-- Ketidakleluasaan untuk tabel `workshop_pegawai`
--
ALTER TABLE `workshop_pegawai`
  ADD CONSTRAINT `workshop_pegawai_ibfk_1` FOREIGN KEY (`id_tingkatan`) REFERENCES `tingkatan` (`id`),
  ADD CONSTRAINT `workshop_pegawai_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
