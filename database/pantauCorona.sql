-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 15 Okt 2020 pada 11.42
-- Versi server: 10.3.25-MariaDB
-- Versi PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `njmnrtps_covid`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `hak_akses`
--

CREATE TABLE `hak_akses` (
  `id_hak_akses` int(11) NOT NULL,
  `nama_hak_akses` varchar(225) NOT NULL,
  `modul_akses` text NOT NULL,
  `parent_modul_akses` text NOT NULL,
  `created_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hak_akses`
--

INSERT INTO `hak_akses` (`id_hak_akses`, `nama_hak_akses`, `modul_akses`, `parent_modul_akses`, `created_time`) VALUES
(1, 'superuser', '{    \"modul\": [        \"1\",        \"2\",        \"3\",        \"4\",        \"21\",        \"5\",        \"6\",        \"7\",        \"8\",        \"9\",        \"10\",        \"11\",        \"12\",        \"13\",        \"14\",        \"15\",        \"16\"    ]}', '{    \"parent_modul\": [        \"1\",        \"2\",        \"3\",        \"4\"    ]}', '2020-04-20 08:35:42'),
(2, 'rumah sakit', '{\n    \"modul\": [\n        \"1\",\n        \"2\",\n        \"3\",\n        \"4\"\n    ]\n}', '{\n    \"parent_modul\": [\n        \"1\",\n        \"2\"\n    ]\n}', '2020-04-22 09:06:19'),
(3, 'dinkes', '{\n    \"modul\": [\n        \"1\",\n        \"2\",\n        \"3\",\n        \"4\",\n        \"5\",\n        \"6\",\n        \"7\",\n        \"8\",\n        \"9\",\n        \"10\",\n        \"11\",\n        \"12\"\n    ]\n}', '{\n    \"parent_modul\": [\n        \"1\",\n        \"2\",\n        \"3\",\n        \"4\"\n    ]\n}', '2020-04-22 10:03:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_peta`
--

CREATE TABLE `kategori_peta` (
  `kp_id` int(11) NOT NULL,
  `kp_name` varchar(225) NOT NULL,
  `kp_icon` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori_peta`
--

INSERT INTO `kategori_peta` (`kp_id`, `kp_name`, `kp_icon`) VALUES
(1, 'ODP', NULL),
(2, 'PDP', NULL),
(3, 'Meninggal', NULL),
(4, 'Pending', NULL),
(5, 'Positif', NULL),
(6, 'Negatif', NULL),
(7, 'Sembuh', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `modul`
--

CREATE TABLE `modul` (
  `id_modul` int(11) NOT NULL,
  `nama_modul` varchar(225) NOT NULL,
  `link_modul` varchar(225) NOT NULL,
  `type_modul` varchar(20) NOT NULL,
  `id_parent_modul` int(11) NOT NULL,
  `created_time` datetime NOT NULL DEFAULT current_timestamp(),
  `tampil_sidebar` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `modul`
--

INSERT INTO `modul` (`id_modul`, `nama_modul`, `link_modul`, `type_modul`, `id_parent_modul`, `created_time`, `tampil_sidebar`) VALUES
(1, 'List Data Pasien', 'backend/peta/', 'R', 2, '2020-04-20 08:29:52', 'N'),
(2, 'Tambah Data Pasien', 'backend/peta/create', 'C', 2, '2020-04-20 08:29:52', 'N'),
(3, 'Update Data Pasien', 'backend/peta/update/', 'U', 2, '2020-04-20 08:29:52', 'N'),
(4, 'Hapus Data Pasien', 'backend/peta/delete', 'D', 2, '2020-04-20 08:29:52', 'N'),
(5, 'List Kategori Pasien', 'backend/kategori/', 'R', 3, '2020-04-20 08:33:44', 'N'),
(6, 'Tambah Kategori', 'backend/kategori/create', 'C', 3, '2020-04-20 08:33:44', 'N'),
(7, 'Update Kategori', 'backend/kategori/update/', 'U', 3, '2020-04-20 08:33:44', 'N'),
(8, 'Hapus Kategori', 'backend/kategori/delete', 'D', 3, '2020-04-20 08:33:44', 'N'),
(9, 'List Pengguna', 'backend/pengguna/', 'R', 4, '2020-04-20 08:33:44', 'Y'),
(10, 'Tambah Pengguna', 'backend/pengguna/create', 'C', 4, '2020-04-20 08:33:44', 'N'),
(11, 'Update Pengguna', 'backend/pengguna/update/', 'U', 4, '2020-04-20 08:33:44', 'N'),
(12, 'Hapus Pengguna', 'backend/pengguna/delete', 'D', 4, '2020-04-20 08:33:44', 'N'),
(13, 'List Hak Akses Pengguna', 'backend/pengguna/hak_akses', 'R', 4, '2020-04-20 08:33:44', 'Y'),
(14, 'Tambah Hak Akses', 'backend/pengguna/create_hak_akses', 'C', 4, '2020-04-20 08:33:44', 'N'),
(15, 'Update Hak AKses Pengguna', 'backend/pengguna/update_hak_akses/', 'U', 4, '2020-04-20 08:33:44', 'N'),
(16, 'Hapus Hak AKses Pengguna', 'backend/pengguna/delete_hak_akses', 'D', 4, '2020-04-20 08:33:44', 'N');

-- --------------------------------------------------------

--
-- Struktur dari tabel `parent_modul`
--

CREATE TABLE `parent_modul` (
  `id_parent_modul` int(11) NOT NULL,
  `nama_parent_modul` varchar(225) NOT NULL,
  `urutan` int(11) NOT NULL,
  `icon` varchar(225) NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `child_module` enum('Y','N') NOT NULL,
  `link` varchar(225) NOT NULL,
  `tampil_sidebar_parent` enum('Y','N') NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `parent_modul`
--

INSERT INTO `parent_modul` (`id_parent_modul`, `nama_parent_modul`, `urutan`, `icon`, `created_time`, `child_module`, `link`, `tampil_sidebar_parent`) VALUES
(1, 'Dashboard', 1, 'nav-icon fas fa-tachometer-alt', '2020-04-20 01:26:24', 'N', 'backend/dashboard', 'Y'),
(2, 'Data Pasien', 2, 'nav-icon fas fa-map', '2020-04-20 01:26:24', 'N', 'backend/peta', 'Y'),
(3, 'Kategori Pasien', 3, 'nav-icon fa fa-map-marker', '2020-04-20 01:26:24', 'N', 'backend/kategori', 'Y'),
(4, 'Pengguna', 4, 'nav-icon fa fa-users', '2020-04-20 01:26:24', 'Y', '#', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peta_wilayah`
--

CREATE TABLE `peta_wilayah` (
  `id_peta` int(11) NOT NULL,
  `nik` varchar(225) NOT NULL,
  `nama` varchar(225) DEFAULT NULL,
  `jenkel` enum('L','P') DEFAULT NULL,
  `lokasi` text DEFAULT NULL,
  `lon` varchar(225) NOT NULL,
  `lat` varchar(225) NOT NULL,
  `usia` varchar(5) DEFAULT NULL,
  `kabupaten` varchar(225) NOT NULL,
  `kp_name` varchar(225) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rapid_test`
--

CREATE TABLE `rapid_test` (
  `id` int(11) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `usia` varchar(20) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `jenkel` enum('L','P') NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `lon` varchar(225) NOT NULL,
  `lat` varchar(225) NOT NULL,
  `created_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `foto` varchar(225) DEFAULT NULL,
  `username` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `no_telp` varchar(20) DEFAULT 'NULL',
  `hak_akses` varchar(225) NOT NULL,
  `created_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `foto`, `username`, `email`, `password`, `alamat`, `no_telp`, `hak_akses`, `created_time`) VALUES
(3, 'assets/foto/superuser.png', 'superuser', 'taufiqrorkyendo@gmail.com', '8e67bb26b358e2ed20fe552ed6fb832f397a507d', 'Pangkalan Brandan', '082276648478', 'superuser', '2020-04-22 08:36:37'),
(4, NULL, 'dinkes', 'dinkes@mail.com', 'de84b07ebb72a1d458a30f0e66232cceb5edbde2', 'dinkes medan', '082276648478', 'dinkes', '2020-04-22 10:12:07');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `hak_akses`
--
ALTER TABLE `hak_akses`
  ADD PRIMARY KEY (`id_hak_akses`),
  ADD UNIQUE KEY `nama_hak_akses` (`nama_hak_akses`);

--
-- Indeks untuk tabel `kategori_peta`
--
ALTER TABLE `kategori_peta`
  ADD PRIMARY KEY (`kp_id`);

--
-- Indeks untuk tabel `modul`
--
ALTER TABLE `modul`
  ADD PRIMARY KEY (`id_modul`),
  ADD KEY `parent_module` (`id_parent_modul`);

--
-- Indeks untuk tabel `parent_modul`
--
ALTER TABLE `parent_modul`
  ADD PRIMARY KEY (`id_parent_modul`);

--
-- Indeks untuk tabel `peta_wilayah`
--
ALTER TABLE `peta_wilayah`
  ADD PRIMARY KEY (`id_peta`),
  ADD UNIQUE KEY `nik` (`nik`);

--
-- Indeks untuk tabel `rapid_test`
--
ALTER TABLE `rapid_test`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `fk_hak_akses` (`hak_akses`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `hak_akses`
--
ALTER TABLE `hak_akses`
  MODIFY `id_hak_akses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kategori_peta`
--
ALTER TABLE `kategori_peta`
  MODIFY `kp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `modul`
--
ALTER TABLE `modul`
  MODIFY `id_modul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `parent_modul`
--
ALTER TABLE `parent_modul`
  MODIFY `id_parent_modul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `peta_wilayah`
--
ALTER TABLE `peta_wilayah`
  MODIFY `id_peta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `rapid_test`
--
ALTER TABLE `rapid_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `modul`
--
ALTER TABLE `modul`
  ADD CONSTRAINT `fk_parent_modul` FOREIGN KEY (`id_parent_modul`) REFERENCES `parent_modul` (`id_parent_modul`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_hak_akses` FOREIGN KEY (`hak_akses`) REFERENCES `hak_akses` (`nama_hak_akses`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
