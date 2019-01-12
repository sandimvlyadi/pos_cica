-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 12, 2019 at 03:43 AM
-- Server version: 5.5.39
-- PHP Version: 5.4.31

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
-- Table structure for table `account`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`code`, `name`, `username`, `password`, `email`, `address`, `phone`, `photo`, `role`, `additional`, `status`, `datecreated`, `dateupdated`) VALUES
(1, 'dapur', 'dapur', '6098bad3289be615ef94ae10b480c197fd73b07403ae7565124750592a615a273f8cddf18b854a36f59eb38c2312d133b632f99fd750cd0665ebf2a854c20886Lf1PD37xlIF891W794Gyo9deJem9CdbEqz7KguB1XxE=', 'dapur@gmail.com', 'Indramayu', '089638625153', 'default.jpg', 'dapur', '', 'offline', '2018-02-19 02:00:00', '2018-02-19 02:00:00'),
(2, 'kasir', 'kasir', '6098bad3289be615ef94ae10b480c197fd73b07403ae7565124750592a615a273f8cddf18b854a36f59eb38c2312d133b632f99fd750cd0665ebf2a854c20886Lf1PD37xlIF891W794Gyo9deJem9CdbEqz7KguB1XxE=', 'kasir@gmail.com', 'Indramayu', '123', 'default.jpg', 'kasir', '', '', '2018-03-02 00:00:00', '2018-03-02 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `bahan_baku`
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
-- Dumping data for table `bahan_baku`
--

INSERT INTO `bahan_baku` (`id_bahan_baku`, `bahan_baku`, `satuan`, `stok`, `created`, `updated`) VALUES
('BHN201812170001', 'Essense Strawberry', 'Pcs', '10', '2018-12-17', '2019-01-07'),
('BHN201901070001', 'Gula Cair', 'Kg', '0', '2019-01-07', '2019-01-07'),
('BHN201901070002', 'Essense Coklat', 'Kg', '0', '2019-01-07', '2019-01-07'),
('BHN201901070003', 'Mie Tektek', 'Pcs', '0', '2019-01-07', '2019-01-07'),
('BHN201901070004', 'susu ultra milk', 'Kg', '0', '2019-01-07', '2019-01-07'),
('BHN201901070005', 'sayuran', 'Kg', '0', '2019-01-07', '2019-01-07'),
('BHN201901070006', 'cabe', 'Kg', '0', '2019-01-07', '2019-01-07'),
('BHN201901080001', 'Garam', 'Gram', '0', '2019-01-08', '2019-01-08'),
('BHN201901080002', 'Gula Tebu', 'Gram', '0', '2019-01-08', '2019-01-08');

-- --------------------------------------------------------

--
-- Table structure for table `bahan_baku_keluar`
--

CREATE TABLE IF NOT EXISTS `bahan_baku_keluar` (
  `id_bahan_baku_keluar` varchar(20) NOT NULL,
  `id_detail_pemesanan` varchar(20) NOT NULL,
  `id_produk_update` bigint(20) NOT NULL,
  `id_bahan_baku` varchar(20) NOT NULL,
  `id_produk` varchar(20) NOT NULL,
  `qty` varchar(14) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bahan_baku_keluar`
--

INSERT INTO `bahan_baku_keluar` (`id_bahan_baku_keluar`, `id_detail_pemesanan`, `id_produk_update`, `id_bahan_baku`, `id_produk`, `qty`, `satuan`, `created`, `updated`) VALUES
('BBK201901090001', 'DTN201901090002', 3, 'BHN201901080001', 'PD201901090003', '4', '', '2019-01-09 00:00:00', '2019-01-09 00:00:00'),
('BBK201901090002', 'DTN201901090002', 3, 'BHN201901080002', 'PD201901090003', '2', '', '2019-01-09 00:00:00', '2019-01-09 00:00:00'),
('BBK201901090003', 'DTN201901090002', 3, 'BHN201901070006', 'PD201901090003', '10', '', '2019-01-09 00:00:00', '2019-01-09 00:00:00'),
('BBK201901090004', 'DTN201901090002', 3, 'BHN201901070005', 'PD201901090003', '6', '', '2019-01-09 00:00:00', '2019-01-09 00:00:00'),
('BBK201901090005', 'DTN201901090003', 1, 'BHN201901080001', 'PD201901090002', '10', '', '2019-01-09 00:00:00', '2019-01-09 00:00:00'),
('BBK201901090006', 'DTN201901090003', 1, 'BHN201901070005', 'PD201901090002', '10', '', '2019-01-09 00:00:00', '2019-01-09 00:00:00'),
('BBK201901090007', 'DTN201901090003', 1, 'BHN201901080002', 'PD201901090002', '10', '', '2019-01-09 00:00:00', '2019-01-09 00:00:00'),
('BBK201901120001', 'DTN201901120001', 8, 'BHN201901080001', 'PD201901090003', '2', '', '2019-01-12 00:00:00', '2019-01-12 00:00:00'),
('BBK201901120002', 'DTN201901120001', 8, 'BHN201901080002', 'PD201901090003', '1', '', '2019-01-12 00:00:00', '2019-01-12 00:00:00'),
('BBK201901120003', 'DTN201901120001', 8, 'BHN201901070006', 'PD201901090003', '5', '', '2019-01-12 00:00:00', '2019-01-12 00:00:00'),
('BBK201901120004', 'DTN201901120001', 8, 'BHN201901070005', 'PD201901090003', '3', '', '2019-01-12 00:00:00', '2019-01-12 00:00:00'),
('BBK201901120005', 'DTN201901120002', 9, 'BHN201901080002', 'PD201901090001', '1', '', '2019-01-12 00:00:00', '2019-01-12 00:00:00'),
('BBK201901120006', 'DTN201901120002', 9, 'BHN201812170001', 'PD201901090001', '3', '', '2019-01-12 00:00:00', '2019-01-12 00:00:00'),
('BBK201901120007', 'DTN201901120002', 9, 'BHN201901070004', 'PD201901090001', '1', '', '2019-01-12 00:00:00', '2019-01-12 00:00:00'),
('BBK201901120008', 'DTN201901120002', 9, 'BHN201901070002', 'PD201901090001', '1', '', '2019-01-12 00:00:00', '2019-01-12 00:00:00'),
('BBK201901120009', 'DTN201901120003', 10, 'BHN201901070003', 'PD201901070002', '1', '', '2019-01-12 00:00:00', '2019-01-12 00:00:00'),
('BBK201901120010', 'DTN201901120003', 10, 'BHN201901070004', 'PD201901070002', '1', '', '2019-01-12 00:00:00', '2019-01-12 00:00:00'),
('BBK201901120011', 'DTN201901120003', 10, 'BHN201901070006', 'PD201901070002', '1', '', '2019-01-12 00:00:00', '2019-01-12 00:00:00'),
('BBK201901120012', 'DTN201901120003', 10, 'BHN201901070005', 'PD201901070002', '1', '', '2019-01-12 00:00:00', '2019-01-12 00:00:00'),
('BBK201901120013', 'DTN201901120004', 11, 'BHN201812170001', 'PD201901070001', '1', '', '2019-01-12 00:00:00', '2019-01-12 00:00:00'),
('BBK201901120014', 'DTN201901120005', 8, 'BHN201901080001', 'PD201901090003', '2', '', '2019-01-12 00:00:00', '2019-01-12 00:00:00'),
('BBK201901120015', 'DTN201901120005', 8, 'BHN201901080002', 'PD201901090003', '1', '', '2019-01-12 00:00:00', '2019-01-12 00:00:00'),
('BBK201901120016', 'DTN201901120005', 8, 'BHN201901070006', 'PD201901090003', '5', '', '2019-01-12 00:00:00', '2019-01-12 00:00:00'),
('BBK201901120017', 'DTN201901120005', 8, 'BHN201901070005', 'PD201901090003', '3', '', '2019-01-12 00:00:00', '2019-01-12 00:00:00'),
('BBK201901120018', 'DTN201901120006', 9, 'BHN201901080002', 'PD201901090001', '1', '', '2019-01-12 00:00:00', '2019-01-12 00:00:00'),
('BBK201901120019', 'DTN201901120006', 9, 'BHN201812170001', 'PD201901090001', '3', '', '2019-01-12 00:00:00', '2019-01-12 00:00:00'),
('BBK201901120020', 'DTN201901120006', 9, 'BHN201901070004', 'PD201901090001', '1', '', '2019-01-12 00:00:00', '2019-01-12 00:00:00'),
('BBK201901120021', 'DTN201901120006', 9, 'BHN201901070002', 'PD201901090001', '1', '', '2019-01-12 00:00:00', '2019-01-12 00:00:00'),
('BBK201901120022', 'DTN201901120007', 10, 'BHN201901070003', 'PD201901070002', '1', '', '2019-01-12 00:00:00', '2019-01-12 00:00:00'),
('BBK201901120023', 'DTN201901120007', 10, 'BHN201901070004', 'PD201901070002', '1', '', '2019-01-12 00:00:00', '2019-01-12 00:00:00'),
('BBK201901120024', 'DTN201901120007', 10, 'BHN201901070006', 'PD201901070002', '1', '', '2019-01-12 00:00:00', '2019-01-12 00:00:00'),
('BBK201901120025', 'DTN201901120007', 10, 'BHN201901070005', 'PD201901070002', '1', '', '2019-01-12 00:00:00', '2019-01-12 00:00:00'),
('BBK201901120026', 'DTN201901120008', 11, 'BHN201812170001', 'PD201901070001', '1', '', '2019-01-12 00:00:00', '2019-01-12 00:00:00'),
('BBK201901120027', 'DTN201901120009', 8, 'BHN201901080001', 'PD201901090003', '2', '', '2019-01-12 00:00:00', '2019-01-12 00:00:00'),
('BBK201901120028', 'DTN201901120009', 8, 'BHN201901080002', 'PD201901090003', '1', '', '2019-01-12 00:00:00', '2019-01-12 00:00:00'),
('BBK201901120029', 'DTN201901120009', 8, 'BHN201901070006', 'PD201901090003', '5', '', '2019-01-12 00:00:00', '2019-01-12 00:00:00'),
('BBK201901120030', 'DTN201901120009', 8, 'BHN201901070005', 'PD201901090003', '3', '', '2019-01-12 00:00:00', '2019-01-12 00:00:00'),
('BBK201901120031', 'DTN201901120010', 11, 'BHN201812170001', 'PD201901070001', '1', '', '2019-01-12 00:00:00', '2019-01-12 00:00:00'),
('BBK201901120032', 'DTN201901120011', 10, 'BHN201901070003', 'PD201901070002', '1', '', '2019-01-12 00:00:00', '2019-01-12 00:00:00'),
('BBK201901120033', 'DTN201901120011', 10, 'BHN201901070004', 'PD201901070002', '1', '', '2019-01-12 00:00:00', '2019-01-12 00:00:00'),
('BBK201901120034', 'DTN201901120011', 10, 'BHN201901070006', 'PD201901070002', '1', '', '2019-01-12 00:00:00', '2019-01-12 00:00:00'),
('BBK201901120035', 'DTN201901120011', 10, 'BHN201901070005', 'PD201901070002', '1', '', '2019-01-12 00:00:00', '2019-01-12 00:00:00'),
('BBK201901120036', 'DTN201901120012', 10, 'BHN201901070003', 'PD201901070002', '1', '', '2019-01-12 00:00:00', '2019-01-12 00:00:00'),
('BBK201901120037', 'DTN201901120012', 10, 'BHN201901070004', 'PD201901070002', '1', '', '2019-01-12 00:00:00', '2019-01-12 00:00:00'),
('BBK201901120038', 'DTN201901120012', 10, 'BHN201901070006', 'PD201901070002', '1', '', '2019-01-12 00:00:00', '2019-01-12 00:00:00'),
('BBK201901120039', 'DTN201901120012', 10, 'BHN201901070005', 'PD201901070002', '1', '', '2019-01-12 00:00:00', '2019-01-12 00:00:00'),
('BBK201901120040', 'DTN201901120013', 10, 'BHN201901070003', 'PD201901070002', '1', '', '2019-01-12 00:00:00', '2019-01-12 00:00:00'),
('BBK201901120041', 'DTN201901120013', 10, 'BHN201901070004', 'PD201901070002', '1', '', '2019-01-12 00:00:00', '2019-01-12 00:00:00'),
('BBK201901120042', 'DTN201901120013', 10, 'BHN201901070006', 'PD201901070002', '1', '', '2019-01-12 00:00:00', '2019-01-12 00:00:00'),
('BBK201901120043', 'DTN201901120013', 10, 'BHN201901070005', 'PD201901070002', '1', '', '2019-01-12 00:00:00', '2019-01-12 00:00:00'),
('BBK201901120044', 'DTN201901120014', 11, 'BHN201812170001', 'PD201901070001', '1', '', '2019-01-12 00:00:00', '2019-01-12 00:00:00'),
('BBK201901120045', 'DTN201901120015', 9, 'BHN201901080002', 'PD201901090001', '1', '', '2019-01-12 00:00:00', '2019-01-12 00:00:00'),
('BBK201901120046', 'DTN201901120015', 9, 'BHN201812170001', 'PD201901090001', '3', '', '2019-01-12 00:00:00', '2019-01-12 00:00:00'),
('BBK201901120047', 'DTN201901120015', 9, 'BHN201901070004', 'PD201901090001', '1', '', '2019-01-12 00:00:00', '2019-01-12 00:00:00'),
('BBK201901120048', 'DTN201901120015', 9, 'BHN201901070002', 'PD201901090001', '1', '', '2019-01-12 00:00:00', '2019-01-12 00:00:00'),
('BBK201901120049', 'DTN201901120016', 8, 'BHN201901080001', 'PD201901090003', '4', '', '2019-01-12 00:00:00', '2019-01-12 00:00:00'),
('BBK201901120050', 'DTN201901120016', 8, 'BHN201901080002', 'PD201901090003', '2', '', '2019-01-12 00:00:00', '2019-01-12 00:00:00'),
('BBK201901120051', 'DTN201901120016', 8, 'BHN201901070006', 'PD201901090003', '10', '', '2019-01-12 00:00:00', '2019-01-12 00:00:00'),
('BBK201901120052', 'DTN201901120016', 8, 'BHN201901070005', 'PD201901090003', '6', '', '2019-01-12 00:00:00', '2019-01-12 00:00:00'),
('BBK201901120053', 'DTN201901120017', 11, 'BHN201812170001', 'PD201901070001', '1', '', '2019-01-12 00:00:00', '2019-01-12 00:00:00'),
('BBK201901120054', 'DTN201901120018', 9, 'BHN201901080002', 'PD201901090001', '1', '', '2019-01-12 00:00:00', '2019-01-12 00:00:00'),
('BBK201901120055', 'DTN201901120018', 9, 'BHN201812170001', 'PD201901090001', '3', '', '2019-01-12 00:00:00', '2019-01-12 00:00:00'),
('BBK201901120056', 'DTN201901120018', 9, 'BHN201901070004', 'PD201901090001', '1', '', '2019-01-12 00:00:00', '2019-01-12 00:00:00'),
('BBK201901120057', 'DTN201901120018', 9, 'BHN201901070002', 'PD201901090001', '1', '', '2019-01-12 00:00:00', '2019-01-12 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `bahan_baku_masuk`
--

CREATE TABLE IF NOT EXISTS `bahan_baku_masuk` (
  `id_bahan_baku_masuk` varchar(20) NOT NULL,
  `id_produk_update` bigint(20) NOT NULL,
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
-- Dumping data for table `bahan_baku_masuk`
--

INSERT INTO `bahan_baku_masuk` (`id_bahan_baku_masuk`, `id_produk_update`, `id_bahan_baku`, `supplier`, `lokasi`, `harga_satuan`, `qty`, `tgl_beli`, `created`, `updated`) VALUES
('BBM201901090001', 1, 'BHN201901080001', '', '', '', '12', '2019-01-09', '2019-01-09', '2019-01-09'),
('BBM201901090002', 1, 'BHN201901070005', '', '', '', '12', '2019-01-09', '2019-01-09', '2019-01-09'),
('BBM201901090003', 1, 'BHN201901080002', '', '', '', '12', '2019-01-09', '2019-01-09', '2019-01-09'),
('BBM201901090007', 3, 'BHN201901080001', '', '', '', '10', '2019-01-09', '2019-01-09', '2019-01-09'),
('BBM201901090008', 3, 'BHN201901080002', '', '', '', '5', '2019-01-09', '2019-01-09', '2019-01-09'),
('BBM201901090009', 3, 'BHN201901070006', '', '', '', '25', '2019-01-09', '2019-01-09', '2019-01-09'),
('BBM201901090010', 3, 'BHN201901070005', '', '', '', '15', '2019-01-09', '2019-01-09', '2019-01-09'),
('BBM201901100001', 4, 'BHN201901080001', '', '', '', '246', '2019-01-10', '2019-01-10', '2019-01-10'),
('BBM201901100002', 4, 'BHN201901080002', '', '', '', '123', '2019-01-10', '2019-01-10', '2019-01-10'),
('BBM201901100003', 4, 'BHN201901070006', '', '', '', '615', '2019-01-10', '2019-01-10', '2019-01-10'),
('BBM201901100004', 4, 'BHN201901070005', '', '', '', '369', '2019-01-10', '2019-01-10', '2019-01-10'),
('BBM201901100005', 5, 'BHN201901080002', '', '', '', '12', '2019-01-10', '2019-01-10', '2019-01-10'),
('BBM201901100006', 5, 'BHN201812170001', '', '', '', '36', '2019-01-10', '2019-01-10', '2019-01-10'),
('BBM201901100007', 5, 'BHN201901070004', '', '', '', '12', '2019-01-10', '2019-01-10', '2019-01-10'),
('BBM201901100008', 5, 'BHN201901070002', '', '', '', '12', '2019-01-10', '2019-01-10', '2019-01-10'),
('BBM201901100009', 6, 'BHN201901070003', '', '', '', '33', '2019-01-10', '2019-01-10', '2019-01-10'),
('BBM201901100010', 6, 'BHN201901070004', '', '', '', '33', '2019-01-10', '2019-01-10', '2019-01-10'),
('BBM201901100011', 6, 'BHN201901070006', '', '', '', '33', '2019-01-10', '2019-01-10', '2019-01-10'),
('BBM201901100012', 6, 'BHN201901070005', '', '', '', '33', '2019-01-10', '2019-01-10', '2019-01-10'),
('BBM201901100013', 7, 'BHN201812170001', '', '', '', '45', '2019-01-10', '2019-01-10', '2019-01-10'),
('BBM201901120001', 8, 'BHN201901080001', '', '', '', '10', '2019-01-12', '2019-01-12', '2019-01-12'),
('BBM201901120002', 8, 'BHN201901080002', '', '', '', '5', '2019-01-12', '2019-01-12', '2019-01-12'),
('BBM201901120003', 8, 'BHN201901070006', '', '', '', '25', '2019-01-12', '2019-01-12', '2019-01-12'),
('BBM201901120004', 8, 'BHN201901070005', '', '', '', '15', '2019-01-12', '2019-01-12', '2019-01-12'),
('BBM201901120005', 9, 'BHN201901080002', '', '', '', '5', '2019-01-12', '2019-01-12', '2019-01-12'),
('BBM201901120006', 9, 'BHN201812170001', '', '', '', '15', '2019-01-12', '2019-01-12', '2019-01-12'),
('BBM201901120007', 9, 'BHN201901070004', '', '', '', '5', '2019-01-12', '2019-01-12', '2019-01-12'),
('BBM201901120008', 9, 'BHN201901070002', '', '', '', '5', '2019-01-12', '2019-01-12', '2019-01-12'),
('BBM201901120009', 10, 'BHN201901070003', '', '', '', '5', '2019-01-12', '2019-01-12', '2019-01-12'),
('BBM201901120010', 10, 'BHN201901070004', '', '', '', '5', '2019-01-12', '2019-01-12', '2019-01-12'),
('BBM201901120011', 10, 'BHN201901070006', '', '', '', '5', '2019-01-12', '2019-01-12', '2019-01-12'),
('BBM201901120012', 10, 'BHN201901070005', '', '', '', '5', '2019-01-12', '2019-01-12', '2019-01-12'),
('BBM201901120013', 11, 'BHN201812170001', '', '', '', '5', '2019-01-12', '2019-01-12', '2019-01-12');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pemesanan`
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
-- Dumping data for table `detail_pemesanan`
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
('DTN201901040001', 'TRN201901040001', 'PD201812250001', '1', '10000', '2019-01-04', '2019-01-04', '', '', ''),
('DTN201901080001', 'TRN201901080001', 'PD201901070001', '7', '77000', '2019-01-08', '2019-01-08', 'Pelajar', 'Diskon', '10'),
('DTN201901090001', 'TRN201901090001', 'PD201901090003', '3', '81000', '2019-01-09', '2019-01-09', '', '', ''),
('DTN201901090002', 'TRN201901090002', 'PD201901090003', '2', '54000', '2019-01-09', '2019-01-09', '', '', ''),
('DTN201901090003', 'TRN201901090002', 'PD201901090002', '10', '25000', '2019-01-09', '2019-01-09', '', '', ''),
('DTN201901120001', 'TRN201901120001', 'PD201901090003', '1', '27000', '2019-01-12', '2019-01-12', '', '', ''),
('DTN201901120002', 'TRN201901120001', 'PD201901090001', '1', '7000', '2019-01-12', '2019-01-12', '', '', ''),
('DTN201901120003', 'TRN201901120001', 'PD201901070002', '1', '11000', '2019-01-12', '2019-01-12', '', '', ''),
('DTN201901120004', 'TRN201901120001', 'PD201901070001', '1', '11000', '2019-01-12', '2019-01-12', '', '', ''),
('DTN201901120005', 'TRN201901120002', 'PD201901090003', '1', '27000', '2019-01-12', '2019-01-12', '', '', ''),
('DTN201901120006', 'TRN201901120002', 'PD201901090001', '1', '7000', '2019-01-12', '2019-01-12', '', '', ''),
('DTN201901120007', 'TRN201901120002', 'PD201901070002', '1', '11000', '2019-01-12', '2019-01-12', '', '', ''),
('DTN201901120008', 'TRN201901120002', 'PD201901070001', '1', '11000', '2019-01-12', '2019-01-12', '', '', ''),
('DTN201901120009', 'TRN201901120003', 'PD201901090003', '1', '27000', '2019-01-12', '2019-01-12', '', '', ''),
('DTN201901120010', 'TRN201901120004', 'PD201901070001', '1', '11000', '2019-01-12', '2019-01-12', '', '', ''),
('DTN201901120011', 'TRN201901120004', 'PD201901070002', '1', '11000', '2019-01-12', '2019-01-12', '', '', ''),
('DTN201901120012', 'TRN201901120004', 'PD201901070002', '1', '11000', '2019-01-12', '2019-01-12', '', '', ''),
('DTN201901120013', 'TRN201901120005', 'PD201901070002', '1', '11000', '2019-01-12', '2019-01-12', '', '', ''),
('DTN201901120014', 'TRN201901120005', 'PD201901070001', '1', '11000', '2019-01-12', '2019-01-12', '', '', ''),
('DTN201901120015', 'TRN201901120006', 'PD201901090001', '1', '7000', '2019-01-12', '2019-01-12', '', '', ''),
('DTN201901120016', 'TRN201901120007', 'PD201901090003', '2', '54000', '2019-01-12', '2019-01-12', '', '', ''),
('DTN201901120017', 'TRN201901120007', 'PD201901070001', '1', '11000', '2019-01-12', '2019-01-12', '', '', ''),
('DTN201901120018', 'TRN201901120008', 'PD201901090001', '1', '7000', '2019-01-12', '2019-01-12', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `detail_produk`
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
-- Dumping data for table `detail_produk`
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
('DP201901070005', 'BHN201901070005', 'sayuran', 'PD201901070002', '1', 'Kg'),
('DP201901090001', 'BHN201901080002', 'Gula Tebu', 'PD201901090001', '1', 'Gram'),
('DP201901090002', 'BHN201812170001', 'Essense Strawberry', 'PD201901090001', '3', 'Pcs'),
('DP201901090003', 'BHN201901070004', 'susu ultra milk', 'PD201901090001', '1', 'Kg'),
('DP201901090004', 'BHN201901070002', 'Essense Coklat', 'PD201901090001', '1', 'Kg'),
('DP201901090008', 'BHN201901080001', 'Garam', 'PD201901090003', '2', 'Gram'),
('DP201901090009', 'BHN201901080002', 'Gula Tebu', 'PD201901090003', '1', 'Gram'),
('DP201901090010', 'BHN201901070006', 'cabe', 'PD201901090003', '5', 'Kg'),
('DP201901090011', 'BHN201901070005', 'sayuran', 'PD201901090003', '3', 'Kg');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` varchar(20) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `created` date NOT NULL,
  `updated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
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
-- Table structure for table `no_meja`
--

CREATE TABLE IF NOT EXISTS `no_meja` (
`id_no_meja` int(11) NOT NULL,
  `no_meja` varchar(10) NOT NULL,
  `created` date NOT NULL,
  `updated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE IF NOT EXISTS `pemesanan` (
  `id_pemesanan` varchar(20) NOT NULL,
  `author` varchar(60) NOT NULL,
  `pelanggan` varchar(60) NOT NULL,
  `no_meja` varchar(10) NOT NULL,
  `total` varchar(20) NOT NULL,
  `total_order` varchar(5) NOT NULL,
  `bayar` varchar(20) NOT NULL,
  `pajak` varchar(20) NOT NULL,
  `kembali` varchar(20) NOT NULL,
  `catatan` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `notif` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `author`, `pelanggan`, `no_meja`, `total`, `total_order`, `bayar`, `pajak`, `kembali`, `catatan`, `created`, `updated`, `notif`) VALUES
('TRN201812220002', 'ningsih', 'Erlangga', '2', '27500', '2', '', '', '', 'Request gula cair', '2018-12-22 21:57:59', '2018-12-22 21:57:59', '1'),
('TRN201812250001', 'ningsih', 'Erlangga', '2', '11000', '1', '', '', '', '', '2018-12-25 11:16:50', '2018-12-25 11:16:50', '1'),
('TRN201812250002', 'ningsih', 'angga', '5', '16500', '1', '', '', '', '', '2018-12-25 11:19:00', '2018-12-25 11:19:00', '1'),
('TRN201812250003', 'ningsih', 'Dewangga', '6', '11000', '1', '', '', '', '', '2018-12-25 13:14:23', '2018-12-25 13:14:23', '1'),
('TRN201812250004', 'ningsih', 'Dewangga', '3', '11000', '1', '', '', '', '', '2018-12-25 13:19:10', '2018-12-25 13:19:10', '1'),
('TRN201812260001', 'ningsih', 'Pras Wipol', '4', '42900', '3', '', '', '', '', '2018-12-26 21:02:59', '2018-12-26 21:02:59', '1'),
('TRN201901040001', 'kasir', 'kiki', '5', '11000', '1', '', '', '', '', '2019-01-04 13:21:23', '2019-01-04 13:21:23', '1'),
('TRN201901080001', 'kasir', 'udin', '1', '76230', '1', '', '', '', '', '2019-01-08 21:54:38', '2019-01-08 21:54:38', '1'),
('TRN201901120001', 'kasir', 'asdf', '7', '61600', '4', '', '', '', '', '2019-01-12 06:43:55', '2019-01-12 06:43:55', '0'),
('TRN201901120002', 'kasir', 'asdf', '7', '61600', '4', '', '', '', '', '2019-01-12 07:23:26', '2019-01-12 07:23:26', '0'),
('TRN201901120003', 'kasir', 'asdf', '8', '29700', '1', '', '', '', '', '2019-01-12 07:25:42', '2019-01-12 07:25:42', '0'),
('TRN201901120004', 'kasir', 'udin', '5', '36300', '3', '', '', '', '', '2019-01-12 07:48:14', '2019-01-12 07:48:14', '0'),
('TRN201901120005', 'kasir', 'udin', '7', '24200', '2', '', '', '', '', '2019-01-12 08:09:14', '2019-01-12 08:09:14', '0'),
('TRN201901120006', 'kasir', 'asdf', '3', '7700', '1', '', '', '', '', '2019-01-12 08:12:34', '2019-01-12 08:12:34', '0'),
('TRN201901120007', 'kasir', 'asdf', '10', '71500', '2', '100000', '6500', '28500', '', '2019-01-12 09:15:11', '2019-01-12 09:15:11', '0'),
('TRN201901120008', 'kasir', 'udin', '4', '7700', '1', '10000', '700', '2300', 'cepetan', '2019-01-12 09:22:40', '2019-01-12 09:22:40', '0');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE IF NOT EXISTS `produk` (
  `id_produk` varchar(20) NOT NULL,
  `tgl_produk` date DEFAULT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `id_kategori` varchar(20) NOT NULL,
  `harga` varchar(14) NOT NULL,
  `deskripsi` text NOT NULL,
  `status` varchar(11) NOT NULL,
  `created` date NOT NULL,
  `updated` date NOT NULL,
  `stok_baru` int(11) DEFAULT NULL,
  `sisa_stok` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `tgl_produk`, `nama_produk`, `gambar`, `id_kategori`, `harga`, `deskripsi`, `status`, `created`, `updated`, `stok_baru`, `sisa_stok`) VALUES
('PD201901070001', NULL, 'Susu Stroberi', '20190107225516.jpg', 'KTG201901070001', '11000', 'Susu dengan rasa Strawberry', 'Aktif', '2019-01-07', '2019-01-07', NULL, NULL),
('PD201901070002', NULL, 'Mie kuah susu', '20190107230632.jpg', 'KTG201901070003', '11000', 'Mie dengan Kuah susu ', 'Aktif', '2019-01-07', '2019-01-07', NULL, NULL),
('PD201901090001', '2019-01-09', 'Susu Murni Pangalengan', 'default.jpg', 'KTG201901070001', '7000', 'Susu murni yang sudah tidak murni', 'Aktif', '2019-01-09', '2019-01-09', 30, 0),
('PD201901090003', '2019-01-09', 'Empal Gentong', 'default.jpg', 'KTG201901070003', '27000', 'Empal yang dimasak didalam gentong', 'Aktif', '2019-01-09', '2019-01-09', 23, 21);

-- --------------------------------------------------------

--
-- Table structure for table `produk_update`
--

CREATE TABLE IF NOT EXISTS `produk_update` (
`id_produk_update` bigint(20) NOT NULL,
  `id_produk` varchar(20) NOT NULL,
  `tgl_produk` date DEFAULT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `harga` varchar(14) NOT NULL,
  `created` date NOT NULL,
  `updated` date NOT NULL,
  `stok_baru` int(11) DEFAULT NULL,
  `sisa_stok` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `produk_update`
--

INSERT INTO `produk_update` (`id_produk_update`, `id_produk`, `tgl_produk`, `nama_produk`, `harga`, `created`, `updated`, `stok_baru`, `sisa_stok`) VALUES
(1, 'PD201901090002', '2019-01-09', 'Surabi Hijrah', '2500', '2019-01-09', '2019-01-09', 12, 2),
(3, 'PD201901090003', '2019-01-09', 'Empal Gentong', '27000', '2019-01-09', '2019-01-09', 5, 7),
(4, 'PD201901090003', '2019-01-10', 'Empal Gentong', '27000', '2019-01-10', '2019-01-10', 123, 123),
(5, 'PD201901090001', '2019-01-10', 'Susu Murni Pangalengan', '7000', '2019-01-10', '2019-01-10', 12, 12),
(6, 'PD201901070002', '2019-01-10', 'Mie kuah susu', '11000', '2019-01-10', '2019-01-10', 33, 33),
(7, 'PD201901070001', '2019-01-10', 'Susu Stroberi', '11000', '2019-01-10', '2019-01-10', 45, 45),
(8, 'PD201901090003', '2019-01-12', 'Empal Gentong', '27000', '2019-01-12', '2019-01-12', 5, 0),
(9, 'PD201901090001', '2019-01-12', 'Susu Murni Pangalengan', '7000', '2019-01-12', '2019-01-12', 5, 1),
(10, 'PD201901070002', '2019-01-12', 'Mie kuah susu', '11000', '2019-01-12', '2019-01-12', 5, 0),
(11, 'PD201901070001', '2019-01-12', 'Susu Stroberi', '11000', '2019-01-12', '2019-01-12', 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `promo`
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
-- Dumping data for table `promo`
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
-- Indexes for table `produk_update`
--
ALTER TABLE `produk_update`
 ADD PRIMARY KEY (`id_produk_update`);

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
--
-- AUTO_INCREMENT for table `produk_update`
--
ALTER TABLE `produk_update`
MODIFY `id_produk_update` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
