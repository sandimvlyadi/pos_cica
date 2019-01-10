-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 08 Jan 2019 pada 15.08
-- Versi Server: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pos_cica`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `code` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` tinytext NOT NULL,
  `phone` varchar(30) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `role` varchar(30) NOT NULL,
  `additional` tinytext NOT NULL,
  `status` varchar(30) NOT NULL,
  `datecreated` datetime NOT NULL,
  `dateupdated` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `account`
--

INSERT INTO `account` (`code`, `name`, `username`, `password`, `email`, `address`, `phone`, `photo`, `role`, `additional`, `status`, `datecreated`, `dateupdated`) VALUES
(1, 'dapur', 'dapur', '6098bad3289be615ef94ae10b480c197fd73b07403ae7565124750592a615a273f8cddf18b854a36f59eb38c2312d133b632f99fd750cd0665ebf2a854c20886Lf1PD37xlIF891W794Gyo9deJem9CdbEqz7KguB1XxE=', 'dapur@gmail.com', 'Indramayu', '089638625153', 'default.jpg', 'dapur', '', 'offline', '2018-02-19 02:00:00', '2018-02-19 02:00:00'),
(2, 'kasir', 'kasir', '6098bad3289be615ef94ae10b480c197fd73b07403ae7565124750592a615a273f8cddf18b854a36f59eb38c2312d133b632f99fd750cd0665ebf2a854c20886Lf1PD37xlIF891W794Gyo9deJem9CdbEqz7KguB1XxE=', 'kasir@gmail.com', 'Indramayu', '123', 'default.jpg', 'kasir', '', '', '2018-03-02 00:00:00', '2018-03-02 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bahan_baku`
--

CREATE TABLE IF NOT EXISTS `bahan_baku` (
  `id_bahan_baku` varchar(20) NOT NULL,
  `bahan_baku` varchar(100) NOT NULL,
  `satuan` varchar(30) NOT NULL,
  `stok` varchar(10) NOT NULL DEFAULT '0',
  `created` date NOT NULL,
  `updated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bahan_baku`
--

INSERT INTO `bahan_baku` (`id_bahan_baku`, `bahan_baku`, `satuan`, `stok`, `created`, `updated`) VALUES
('BHN201812170001', 'Essense Strawberry', 'Pcs', '10', '2018-12-17', '2019-01-07'),
('BHN201901070001', 'Gula Cair', 'Kg', '0', '2019-01-07', '2019-01-07'),
('BHN201901070002', 'Essense Coklat', 'Kg', '0', '2019-01-07', '2019-01-07'),
('BHN201901070003', 'Mie Tektek', 'Pcs', '0', '2019-01-07', '2019-01-07'),
('BHN201901070004', 'susu ultra milk', 'Kg', '0', '2019-01-07', '2019-01-07'),
('BHN201901070005', 'sayuran', 'Kg', '0', '2019-01-07', '2019-01-07'),
('BHN201901070006', 'cabe', 'Kg', '0', '2019-01-07', '2019-01-07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bahan_baku_keluar`
--

CREATE TABLE IF NOT EXISTS `bahan_baku_keluar` (
  `id_bahan_baku_keluar` varchar(20) NOT NULL,
  `id_bahan_baku` varchar(20) NOT NULL,
  `id_produk` varchar(20) NOT NULL,
  `qty` varchar(14) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bahan_baku_masuk`
--

CREATE TABLE IF NOT EXISTS `bahan_baku_masuk` (
  `id_bahan_baku_masuk` varchar(20) NOT NULL,
  `id_bahan_baku` varchar(20) NOT NULL,
  `supplier` varchar(100) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `harga_satuan` varchar(14) NOT NULL,
  `qty` varchar(14) NOT NULL,
  `tgl_beli` date NOT NULL,
  `created` date NOT NULL,
  `updated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bahan_baku_masuk`
--

INSERT INTO `bahan_baku_masuk` (`id_bahan_baku_masuk`, `id_bahan_baku`, `supplier`, `lokasi`, `harga_satuan`, `qty`, `tgl_beli`, `created`, `updated`) VALUES
('BBM201812190002', 'BHN201812170001', 'Sasa', 'Bandung', '10000', '10', '2018-12-19', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pemesanan`
--

CREATE TABLE IF NOT EXISTS `detail_pemesanan` (
  `id_detail_pemesanan` varchar(20) NOT NULL,
  `id_pemesanan` varchar(20) NOT NULL,
  `id_produk` varchar(20) NOT NULL,
  `qty_beli` varchar(10) NOT NULL,
  `sub_total` varchar(14) NOT NULL,
  `created` date NOT NULL,
  `updated` date NOT NULL,
  `promo` varchar(20) NOT NULL,
  `tipe_promo` varchar(20) NOT NULL,
  `potongan_harga` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_pemesanan`
--

INSERT INTO `detail_pemesanan` (`id_detail_pemesanan`, `id_pemesanan`, `id_produk`, `qty_beli`, `sub_total`, `created`, `updated`, `promo`, `tipe_promo`, `potongan_harga`) VALUES
('DTN201812210001', 'TRN201812210001', 'PD201812210001', '1', '15000', '2018-12-21', '2018-12-21', '', '', ''),
('DTN201812220001', 'TRN201812220001', 'PD201812210002', '1', '10000', '2018-12-22', '2018-12-22', '', '', ''),
('DTN201812220002', 'TRN201812220002', 'PD201812210001', '1', '15000', '2018-12-22', '2018-12-22', '', '', ''),
('DTN201812220003', 'TRN201812220002', 'PD201812210002', '1', '10000', '2018-12-22', '2018-12-22', '', '', ''),
('DTN201812230001', 'TRN201812230001', 'PD201812210001', '1', '15000', '2018-12-23', '2018-12-23', '', '', ''),
('DTN201812250001', 'TRN201812250001', 'PD201812210002', '1', '10000', '2018-12-25', '2018-12-25', '', '', ''),
('DTN201812250002', 'TRN201812250002', 'PD201812210001', '1', '15000', '2018-12-25', '2018-12-25', '', '', ''),
('DTN201812250003', 'TRN201812250003', 'PD201812250001', '1', '10000', '2018-12-25', '2018-12-25', '', '', ''),
('DTN201812250004', 'TRN201812250004', 'PD201812250001', '1', '10000', '2018-12-25', '2018-12-25', '', '', ''),
('DTN201812260001', 'TRN201812260001', 'PD201812250001', '1', '10000', '2018-12-26', '2018-12-26', 'Akhir Tahun', 'Diskon', '20'),
('DTN201812260002', 'TRN201812260001', 'PD201812210002', '2', '20000', '2018-12-26', '2018-12-26', 'Akhir Tahun', 'Diskon', '20'),
('DTN201812260003', 'TRN201812260001', 'PD201812210001', '2', '30000', '2018-12-26', '2018-12-26', 'Natal', 'Potongan Harga', '15000'),
('DTN201812260004', 'TRN201812260002', 'PD201812210002', '1', '10000', '2018-12-26', '2018-12-26', 'Akhir Tahun', 'Diskon', '20'),
('DTN201812270001', 'TRN201812270001', 'PD201812200002', '1', '10000', '2018-12-27', '2018-12-27', '', '', ''),
('DTN201812270002', 'TRN201812270001', 'PD201812210001', '2', '30000', '2018-12-27', '2018-12-27', '', '', ''),
('DTN201901040001', 'TRN201901040001', 'PD201812250001', '1', '10000', '2019-01-04', '2019-01-04', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_produk`
--

CREATE TABLE IF NOT EXISTS `detail_produk` (
  `id_detail` varchar(20) NOT NULL,
  `id_bahan_baku` varchar(20) NOT NULL,
  `bahan_baku` varchar(50) NOT NULL,
  `id_produk` varchar(20) NOT NULL,
  `qty` varchar(10) NOT NULL,
  `satuan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_produk`
--

INSERT INTO `detail_produk` (`id_detail`, `id_bahan_baku`, `bahan_baku`, `id_produk`, `qty`, `satuan`) VALUES
('DP201812200004', 'BHN201812170001', 'Sosis', 'PD201812200002', '1', 'Pcs'),
('DP201812210001', 'BHN201812170001', 'Sosis', 'PD201812210001', '1', 'Pcs'),
('DP201812210002', 'BHN201812170001', 'Sosis', 'PD201812210002', '1', 'Pcs'),
('DP201812250001', 'BHN201812170001', 'Sosis', 'PD201812250001', '1', 'Pcs'),
('DP201901070001', 'BHN201812170001', 'Essense Strawberry', 'PD201901070001', '1', 'Pcs'),
('DP201901070002', 'BHN201901070003', 'Mie Tektek', 'PD201901070002', '1', 'Pcs'),
('DP201901070003', 'BHN201901070004', 'susu ultra milk', 'PD201901070002', '1', 'Kg'),
('DP201901070004', 'BHN201901070006', 'cabe', 'PD201901070002', '1', 'Kg'),
('DP201901070005', 'BHN201901070005', 'sayuran', 'PD201901070002', '1', 'Kg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` varchar(20) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `created` date NOT NULL,
  `updated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`, `created`, `updated`) VALUES
('KTG201901070001', 'Aneka Susu', '2019-01-07', '2019-01-07'),
('KTG201901070002', 'Aneka Coffe', '2019-01-07', '2019-01-07'),
('KTG201901070003', 'Aneka Mie', '2019-01-07', '2019-01-07'),
('KTG201901070004', 'Aneka Pancake', '2019-01-07', '2019-01-07'),
('KTG201901070005', 'Aneka Ice Cream', '2019-01-07', '2019-01-07'),
('KTG201901070006', 'Aneka Roti', '2019-01-07', '2019-01-07'),
('KTG201901070007', 'Aneka Pisang', '2019-01-07', '2019-01-07'),
('KTG201901070008', 'Aneka Waffles', '2019-01-07', '2019-01-07'),
('KTG201901070009', 'Aneka Sosis', '2019-01-07', '2019-01-07'),
('KTG201901070010', 'Aneka Kentang', '2019-01-07', '2019-01-07'),
('KTG201901070011', 'Aneka Steak', '2019-01-07', '2019-01-07'),
('KTG201901070012', 'Aneka Spaghetti', '2019-01-07', '2019-01-07'),
('KTG201901070013', 'Aneka Makanan Berat', '2019-01-07', '2019-01-07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `no_meja`
--

CREATE TABLE IF NOT EXISTS `no_meja` (
  `id_no_meja` int(11) NOT NULL,
  `no_meja` varchar(10) NOT NULL,
  `created` date NOT NULL,
  `updated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE IF NOT EXISTS `pemesanan` (
  `id_pemesanan` varchar(20) NOT NULL,
  `author` varchar(60) NOT NULL,
  `pelanggan` varchar(60) NOT NULL,
  `no_meja` varchar(10) NOT NULL,
  `total` varchar(20) NOT NULL,
  `total_order` varchar(5) NOT NULL,
  `catatan` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `notif` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `author`, `pelanggan`, `no_meja`, `total`, `total_order`, `catatan`, `created`, `updated`, `notif`) VALUES
('TRN201812220002', 'ningsih', 'Erlangga', '2', '27500', '2', 'Request gula cair', '2018-12-22 21:57:59', '2018-12-22 21:57:59', '1'),
('TRN201812250001', 'ningsih', 'Erlangga', '2', '11000', '1', '', '2018-12-25 11:16:50', '2018-12-25 11:16:50', '1'),
('TRN201812250002', 'ningsih', 'angga', '5', '16500', '1', '', '2018-12-25 11:19:00', '2018-12-25 11:19:00', '1'),
('TRN201812250003', 'ningsih', 'Dewangga', '6', '11000', '1', '', '2018-12-25 13:14:23', '2018-12-25 13:14:23', '1'),
('TRN201812250004', 'ningsih', 'Dewangga', '3', '11000', '1', '', '2018-12-25 13:19:10', '2018-12-25 13:19:10', '1'),
('TRN201812260001', 'ningsih', 'Pras Wipol', '4', '42900', '3', '', '2018-12-26 21:02:59', '2018-12-26 21:02:59', '1'),
('TRN201901040001', 'kasir', 'kiki', '5', '11000', '1', '', '2019-01-04 13:21:23', '2019-01-04 13:21:23', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE IF NOT EXISTS `produk` (
  `id_produk` varchar(20) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `id_kategori` varchar(20) NOT NULL,
  `harga` varchar(14) NOT NULL,
  `deskripsi` text NOT NULL,
  `status` varchar(11) NOT NULL,
  `created` date NOT NULL,
  `updated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `gambar`, `id_kategori`, `harga`, `deskripsi`, `status`, `created`, `updated`) VALUES
('PD201901070001', 'Susu Stroberi', '20190107225516.jpg', 'KTG201901070001', '11000', 'Susu dengan rasa Strawberry', 'Aktif', '2019-01-07', '2019-01-07'),
('PD201901070002', 'Mie kuah susu', '20190107230632.jpg', 'KTG201901070003', '11000', 'Mie dengan Kuah susu ', 'Aktif', '2019-01-07', '2019-01-07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `promo`
--

CREATE TABLE IF NOT EXISTS `promo` (
  `id_promo` varchar(20) NOT NULL,
  `nama_promo` varchar(100) NOT NULL,
  `tipe_promo` varchar(20) NOT NULL,
  `potongan_harga` varchar(14) NOT NULL,
  `diskon` varchar(10) NOT NULL,
  `created` date NOT NULL,
  `updated` date NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `promo`
--

INSERT INTO `promo` (`id_promo`, `nama_promo`, `tipe_promo`, `potongan_harga`, `diskon`, `created`, `updated`, `status`) VALUES
('PM201812250001', 'Pelajar', 'Diskon', '', '10', '2018-12-25', '2019-01-07', 'Aktif'),
('PM201812260001', 'Akhir Tahun', 'Potongan Harga', '10000', '', '2018-12-26', '2019-01-07', 'Aktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `bahan_baku`
--
ALTER TABLE `bahan_baku`
  ADD PRIMARY KEY (`id_bahan_baku`);

--
-- Indexes for table `bahan_baku_keluar`
--
ALTER TABLE `bahan_baku_keluar`
  ADD PRIMARY KEY (`id_bahan_baku_keluar`);

--
-- Indexes for table `bahan_baku_masuk`
--
ALTER TABLE `bahan_baku_masuk`
  ADD PRIMARY KEY (`id_bahan_baku_masuk`);

--
-- Indexes for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  ADD PRIMARY KEY (`id_detail_pemesanan`);

--
-- Indexes for table `detail_produk`
--
ALTER TABLE `detail_produk`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `no_meja`
--
ALTER TABLE `no_meja`
  ADD PRIMARY KEY (`id_no_meja`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`id_promo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `no_meja`
--
ALTER TABLE `no_meja`
  MODIFY `id_no_meja` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
