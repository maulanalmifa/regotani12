-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Bulan Mei 2019 pada 07.18
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database_regotani`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin_web`
--

CREATE TABLE `admin_web` (
  `id_admin` int(3) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `telepon` varchar(12) NOT NULL,
  `jabatan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `cart`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `cart` (
`kode_order` int(25)
,`gambar` varchar(255)
,`email_pembeli` varchar(50)
,`nama_penjual` varchar(50)
,`telepon_penjual` varchar(13)
,`id_produk` int(5)
,`jumlah_beli` int(6)
,`tanggal` timestamp
,`nama_produk` varchar(50)
,`status` enum('Baru Saja','Proses','Selesai','Konfirmasi')
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `cart_2`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `cart_2` (
`kode_order` int(25)
,`gambar` varchar(255)
,`pembeli` varchar(50)
,`nama_produk` varchar(50)
,`nama_penjual` varchar(50)
,`telepon_penjual` varchar(13)
,`jumlah_beli` int(6)
,`total_bayar` int(9)
,`tanggal` timestamp
,`status` enum('Baru Saja','Proses','Selesai','Konfirmasi')
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `cart_3`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `cart_3` (
`kode_order` int(25)
,`penjual` varchar(50)
,`pembeli` varchar(50)
,`nama` varchar(25)
,`telepon` varchar(13)
,`nama_produk` varchar(50)
,`jumlah_beli` int(6)
,`total_bayar` int(9)
,`tanggal` timestamp
,`status` enum('Baru Saja','Proses','Selesai','Konfirmasi')
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `data_produk`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `data_produk` (
`id_user` int(3)
,`id_produk` int(5)
,`category` varchar(20)
,`nama_produk` varchar(50)
,`deskripsi` text
,`harga` int(11)
,`stok` varchar(3)
,`gambar` varchar(255)
,`views` int(11)
,`harga_lama` int(11)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `filter`
--

CREATE TABLE `filter` (
  `category` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran_pembeli`
--

CREATE TABLE `pembayaran_pembeli` (
  `kode_order` int(4) NOT NULL,
  `total_bayar` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran_pembeli`
--

INSERT INTO `pembayaran_pembeli` (`kode_order`, `total_bayar`) VALUES
(28, 14400),
(29, 14400),
(30, 156000),
(31, 14400),
(32, 36000),
(33, 15000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_user` int(3) NOT NULL,
  `id_produk` int(5) NOT NULL,
  `category` varchar(20) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` varchar(3) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `views` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_user`, `id_produk`, `category`, `nama_produk`, `deskripsi`, `harga`, `stok`, `gambar`, `views`) VALUES
(2, 1, 'Sayur', 'Sayur Kol', 'Makan daging kambing dengan sayur kol', 7200, '49', 'golden mean.jpg', 0),
(1, 2, 'Bahan pokok', 'Jagung', 'Bla bla bla bla', 80000, '49', '', 0),
(2, 4, 'Sayur', 'Kangkung', 'Kangkung ku is the best', 3000, '45', NULL, 0),
(1, 5, 'Sayur', 'Kangkung', 'Kangkung yang lebih baik dari the best', 2700, '30', NULL, 0),
(2, 6, 'Bahan Pokok', 'Jagung', 'Jagungku paling oke', 78000, '97', NULL, 0),
(1, 15, 'Bahan Pokok', 'Beras Jagung', 'kalau beras jagung itu.....', 5000, '12', NULL, 0),
(2, 16, 'Bahan Pokok', 'Beras Jagung', 'beras jagung yang lebih baik', 5200, '15', NULL, 0),
(1, 18, 'Bahan Pokok', 'timun milos', 'ENAK ', 5000, '30', NULL, 0),
(9, 19, 'Bahan Pokok', 'Beras Mentari', 'Beras MTR asli', 12500, '25', NULL, 0),
(2, 23, 'Bahan Pokok', 'Sesuatu', 'Oioioi', 12000, '20', '[000379].jpeg', 0),
(2, 24, 'Sayur', 'Milos Timun', 'Milos Timunku paling oke', 7200, '24', 'IMG-20181014-WA0033.jpg', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_pedagang`
--

CREATE TABLE `transaksi_pedagang` (
  `kode_order` varchar(25) NOT NULL,
  `id` int(3) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(25) NOT NULL,
  `telepon` varchar(25) NOT NULL,
  `alamat` text NOT NULL,
  `id_produk` int(5) NOT NULL,
  `total` int(9) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_pembeli`
--

CREATE TABLE `transaksi_pembeli` (
  `kode_order` int(25) NOT NULL,
  `email_pembeli` varchar(50) NOT NULL,
  `nama_penjual` varchar(50) NOT NULL,
  `telepon_penjual` varchar(13) NOT NULL,
  `id_produk` int(5) NOT NULL,
  `jumlah_beli` int(6) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('Baru Saja','Proses','Selesai','Konfirmasi') NOT NULL DEFAULT 'Baru Saja'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi_pembeli`
--

INSERT INTO `transaksi_pembeli` (`kode_order`, `email_pembeli`, `nama_penjual`, `telepon_penjual`, `id_produk`, `jumlah_beli`, `tanggal`, `status`) VALUES
(28, 'ahmad@gmail.com', 'Awanda Setya', '85331446244', 1, 2, '2019-04-26 19:37:21', 'Konfirmasi'),
(29, 'irma@gmail.com', 'Awanda Setya', '85331446244', 1, 2, '2019-04-26 19:37:24', 'Konfirmasi'),
(30, 'irma@gmail.com', 'Awanda Setya', '85331446244', 6, 2, '2019-05-02 03:24:49', 'Konfirmasi'),
(31, 'irma@gmail.com', 'Awanda Setya', '85331446244', 1, 2, '2019-05-02 10:34:37', 'Konfirmasi'),
(32, 'irma@gmail.com', 'Awanda Setya', '85331446244', 1, 5, '2019-05-02 10:34:56', 'Konfirmasi'),
(33, 'irma@gmail.com', 'Awanda Setya', '85331446244', 4, 5, '2019-05-02 12:03:27', 'Konfirmasi');

--
-- Trigger `transaksi_pembeli`
--
DELIMITER $$
CREATE TRIGGER `batal_pembelian` AFTER DELETE ON `transaksi_pembeli` FOR EACH ROW DELETE FROM pembayaran_pembeli WHERE kode_order=OLD.kode_order
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `batal_pembelian_2` BEFORE DELETE ON `transaksi_pembeli` FOR EACH ROW UPDATE produk SET stok=stok + OLD.jumlah_beli WHERE id_produk=OLD.id_produk
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `proses_pembayaran` AFTER INSERT ON `transaksi_pembeli` FOR EACH ROW INSERT INTO pembayaran_pembeli (kode_order,total_bayar) VALUES (NEW.kode_order,(SELECT NEW.jumlah_beli * produk.harga FROM transaksi_pembeli, produk WHERE NEW.id_produk=produk.id_produk AND kode_order=NEW.kode_order))
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `proses_pembelian` BEFORE INSERT ON `transaksi_pembeli` FOR EACH ROW UPDATE produk SET stok=stok-NEW.jumlah_beli WHERE id_produk=NEW.id_produk
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(3) NOT NULL,
  `email` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `alamat` varchar(25) NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `wilayah` varchar(100) NOT NULL,
  `basis_dagang` varchar(100) DEFAULT NULL,
  `status` enum('Petani','Pedagang','Pembeli') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `email`, `password`, `nama`, `alamat`, `telepon`, `wilayah`, `basis_dagang`, `status`) VALUES
(1, 'ahmad@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Mip Mipa', 'Jl. Mawar 16 Malang', '8123456789', 'Malang', 'Pasar Besar Kota Malang', 'Pedagang'),
(2, 'wanda@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Awanda Setya', 'Lamongan', '85331446244', 'Lamongan', 'Pasar Lamongan', 'Pedagang'),
(3, 'irma@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Irma Fatkhia', 'Babat Lamongan', '89595196077', 'Lamongan', '', 'Pembeli'),
(4, 'admin@admin.com', '0192023a7bbd73250516f069df18b500', 'Admin', 'Lamongan', '2147483647', 'Malang', NULL, NULL),
(9, 'budi@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Budi', 'Malang', '083834123456', 'Malang', NULL, 'Petani');

-- --------------------------------------------------------

--
-- Struktur untuk view `cart`
--
DROP TABLE IF EXISTS `cart`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cart`  AS  select `t`.`kode_order` AS `kode_order`,`p`.`gambar` AS `gambar`,`t`.`email_pembeli` AS `email_pembeli`,`t`.`nama_penjual` AS `nama_penjual`,`t`.`telepon_penjual` AS `telepon_penjual`,`t`.`id_produk` AS `id_produk`,`t`.`jumlah_beli` AS `jumlah_beli`,`t`.`tanggal` AS `tanggal`,`p`.`nama_produk` AS `nama_produk`,`t`.`status` AS `status` from (`transaksi_pembeli` `t` left join `produk` `p` on((`t`.`id_produk` = `p`.`id_produk`))) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `cart_2`
--
DROP TABLE IF EXISTS `cart_2`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cart_2`  AS  select `c`.`kode_order` AS `kode_order`,`c`.`gambar` AS `gambar`,`c`.`email_pembeli` AS `pembeli`,`c`.`nama_produk` AS `nama_produk`,`c`.`nama_penjual` AS `nama_penjual`,`c`.`telepon_penjual` AS `telepon_penjual`,`c`.`jumlah_beli` AS `jumlah_beli`,`p`.`total_bayar` AS `total_bayar`,`c`.`tanggal` AS `tanggal`,`c`.`status` AS `status` from (`cart` `c` left join `pembayaran_pembeli` `p` on((`c`.`kode_order` = `p`.`kode_order`))) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `cart_3`
--
DROP TABLE IF EXISTS `cart_3`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cart_3`  AS  select `c2`.`kode_order` AS `kode_order`,`c2`.`nama_penjual` AS `penjual`,`c2`.`pembeli` AS `pembeli`,`u`.`nama` AS `nama`,`u`.`telepon` AS `telepon`,`c2`.`nama_produk` AS `nama_produk`,`c2`.`jumlah_beli` AS `jumlah_beli`,`c2`.`total_bayar` AS `total_bayar`,`c2`.`tanggal` AS `tanggal`,`c2`.`status` AS `status` from (`cart_2` `c2` join `user` `u` on((`c2`.`pembeli` = `u`.`email`))) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `data_produk`
--
DROP TABLE IF EXISTS `data_produk`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `data_produk`  AS  select `produk`.`id_user` AS `id_user`,`produk`.`id_produk` AS `id_produk`,`produk`.`category` AS `category`,`produk`.`nama_produk` AS `nama_produk`,`produk`.`deskripsi` AS `deskripsi`,`produk`.`harga` AS `harga`,`produk`.`stok` AS `stok`,`produk`.`gambar` AS `gambar`,`produk`.`views` AS `views`,`produk`.`harga` AS `harga_lama` from `produk` ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pembayaran_pembeli`
--
ALTER TABLE `pembayaran_pembeli`
  ADD PRIMARY KEY (`kode_order`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `transaksi_pembeli`
--
ALTER TABLE `transaksi_pembeli`
  ADD PRIMARY KEY (`kode_order`),
  ADD KEY `id_pembeli` (`email_pembeli`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `transaksi_pembeli`
--
ALTER TABLE `transaksi_pembeli`
  MODIFY `kode_order` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
