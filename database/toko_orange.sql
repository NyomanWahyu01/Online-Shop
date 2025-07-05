-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2024 at 12:57 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_orange`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `data_bukti`
--

CREATE TABLE `data_bukti` (
  `id_bukti` int(11) NOT NULL,
  `tgl_bukti` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_pesanan` int(11) NOT NULL,
  `bukti_transfer` text NOT NULL,
  `status` enum('Bukti Transfer Terkirim','Lunas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_bukti`
--

INSERT INTO `data_bukti` (`id_bukti`, `tgl_bukti`, `id_pesanan`, `bukti_transfer`, `status`) VALUES
(1, '2024-06-08 10:18:17', 2, '123585327.jpeg', 'Bukti Transfer Terkirim'),
(2, '2024-06-09 09:47:27', 3, '156464551.jpg', 'Bukti Transfer Terkirim'),
(3, '2024-06-10 07:59:01', 4, '671460165.jpg', 'Bukti Transfer Terkirim'),
(4, '2024-06-11 01:30:18', 9, '680262909.jpg', 'Bukti Transfer Terkirim'),
(5, '2024-06-11 04:20:57', 10, '798930256.jpg', 'Lunas'),
(6, '2024-06-11 03:57:47', 5, '14218670.jpg', 'Bukti Transfer Terkirim'),
(7, '2024-06-11 04:19:57', 11, '1596116554.jpg', 'Bukti Transfer Terkirim'),
(8, '2024-06-11 05:28:31', 12, '627838719.jpg', 'Bukti Transfer Terkirim');

-- --------------------------------------------------------

--
-- Table structure for table `data_kategori`
--

CREATE TABLE `data_kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_kategori`
--

INSERT INTO `data_kategori` (`id_kategori`, `kategori`) VALUES
(1, 'Sepatu'),
(2, 'Baju');

-- --------------------------------------------------------

--
-- Table structure for table `data_keranjang`
--

CREATE TABLE `data_keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `hargax` double NOT NULL,
  `total` double NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pesanan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_keranjang`
--

INSERT INTO `data_keranjang` (`id_keranjang`, `id_produk`, `qty`, `hargax`, `total`, `id_user`, `id_pesanan`) VALUES
(1, 6, 2, 80000, 160000, 1, 1),
(2, 6, 2, 80000, 160000, 1, 2),
(6, 6, 18, 80000, 1440000, 0, 0),
(7, 9, 3, 50000, 150000, 0, 0),
(8, 10, 1, 150000, 150000, 1, 3),
(9, 21, 1, 300000, 300000, 0, 0),
(10, 14, 1, 380000, 380000, 4, 4),
(13, 16, 1, 350000, 350000, 4, 4),
(14, 12, 1, 650000, 650000, 4, 5),
(16, 14, 1, 380000, 380000, 4, 6),
(18, 10, 1, 150000, 150000, 4, 7),
(19, 12, 1, 650000, 650000, 4, 8),
(20, 14, 1, 380000, 380000, 0, 0),
(21, 14, 1, 380000, 380000, 4, 9),
(26, 16, 1, 350000, 350000, 4, 10),
(27, 14, 1, 380000, 380000, 4, 11),
(28, 14, 1, 380000, 380000, 4, 12),
(29, 14, 1, 380000, 380000, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `data_pesanan`
--

CREATE TABLE `data_pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `tgl_pesanan` datetime NOT NULL,
  `jenis_pembayaran` varchar(20) NOT NULL,
  `total_pesanan` double NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `telpon` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_pesanan`
--

INSERT INTO `data_pesanan` (`id_pesanan`, `tgl_pesanan`, `jenis_pembayaran`, `total_pesanan`, `id_user`, `status`, `nama`, `alamat`, `email`, `telpon`) VALUES
(1, '2024-06-08 05:12:23', 'Transfer', 160000, 1, 'Belum Bayar', 'Tes 1', 'Jln Perintis !', 'ss@gmail.com', '1234566'),
(2, '2024-06-08 10:17:30', 'Transfer', 160000, 1, 'LUNAS', 'Tes 1', 'Jln Perintis !', 'ss@gmail.com', '1234566'),
(3, '2024-06-09 11:46:46', 'Transfer', 150000, 1, 'LUNAS', 'Tes 1', 'Jln Perintis !', 'ss@gmail.com', '1234566'),
(4, '2024-06-10 08:17:27', 'Transfer', 730000, 4, 'LUNAS', 'Trisna Winda', 'Btn antang raya 8', 'winda@gmail.com', '085678980098'),
(5, '2024-06-10 08:19:17', 'Transfer', 650000, 4, 'LUNAS', 'Trisna Winda', 'Btn antang raya 8', 'winda@gmail.com', '085678980098'),
(6, '2024-06-10 08:30:59', 'Transfer', 380000, 4, 'Belum Bayar', 'Trisna Winda', 'Btn Antang Raya 8', 'winda@gmail.com', '085678980098'),
(7, '2024-06-10 09:54:42', 'Transfer', 150000, 4, 'Belum Bayar', 'Trisna Winda', 'Btn antang raya 8', 'winda@gmail.com', '085678980098'),
(8, '2024-06-10 09:56:44', 'Transfer', 650000, 4, 'Belum Bayar', 'Trisna Winda', 'Btn antang raya 8', 'winda@gmail.com', '085678980098'),
(9, '2024-06-11 03:30:06', 'Transfer', 380000, 4, 'LUNAS', 'Trisna Winda', 'Btn antang raya 8', 'winda@gmail.com', '085678980098'),
(10, '2024-06-11 05:50:01', 'Transfer', 350000, 4, 'LUNAS', 'Trisna Winda', 'Btn antang raya 8', 'winda@gmail.com', '085678980098'),
(11, '2024-06-11 06:19:10', 'Transfer', 380000, 4, 'LUNAS', 'Trisna Winda', 'Btn antang raya 8', 'winda@gmail.com', '085678980098'),
(12, '2024-06-11 07:28:17', 'Transfer', 380000, 4, 'LUNAS', 'Trisna Winda', 'Btn antang raya 8', 'winda@gmail.com', '085678980098');

-- --------------------------------------------------------

--
-- Table structure for table `data_produk`
--

CREATE TABLE `data_produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_produk` text NOT NULL,
  `merek` text NOT NULL,
  `warna` varchar(30) NOT NULL,
  `size` varchar(10) NOT NULL,
  `berat` varchar(100) NOT NULL,
  `harga` double NOT NULL,
  `stok` varchar(100) NOT NULL,
  `gambar` text NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_produk`
--

INSERT INTO `data_produk` (`id_produk`, `id_kategori`, `nama_produk`, `merek`, `warna`, `size`, `berat`, `harga`, `stok`, `gambar`, `deskripsi`) VALUES
(6, 1, 'Sepatu nike air', 'Nike', 'Hitam', '43', '0.5 Kg', 80000, '0', 'upload/download.jpeg', 'Sangat ringan digunakan saat olah raga'),
(9, 2, 'Baju Batik', 'cole', 'Maron', 'XL', '0.12', 50000, '6', 'upload/download (1).jpeg', 'Baju ini sangat cocok sekali untuk kaum mendang mending'),
(10, 1, 'Sport Runnig', 'Fashion CHK', 'Hitam', '41', '0,5 gram', 150000, '8', 'upload/sepatu pria 1.jpg', 'sangat cocok untuk lari  pelari laki laki '),
(11, 1, 'Sneakers Nike', 'Nike ', 'Putih ', '40-45', '0,5 gram ', 400000, '10', 'upload/sepatu pria 2.jpg', 'Sepatu Sneakers Nike langkah penuh percaya diri dengan menggunakan sepatu terbaru dari Toko Orange.'),
(12, 1, 'High Cut Warrior', 'Warrior', 'Biru', '38-43', '0,7 gram ', 650000, '0', 'upload/sepatu pria 3.jpg', 'Tingkatkan gaya Anda dengan sepatu keren Warrior dari Toko Orange. '),
(13, 1, 'High Black White', 'Converse', 'Hitam Putih', '40-45', '0,8 gram ', 500000, '8', 'upload/sepatu pria 4.jpg', 'sepatu Converse Nyaman dan stylish digunakan untuk aktivitas harian Anda'),
(14, 1, 'Sneakers Sport Adidas', 'Adidas', 'Biru', '42-45', '0,6 gram ', 380000, '3', 'upload/sepatu pria 5.jpg', 'Tetap keren menggunakan sepatu Sport Adidas di setiap kesempatan dari Toko Orange'),
(15, 1, 'Adidas Energy Boost GGS', 'Adidas', 'Hitam', '41-43', '0,5 gram ', 550000, '11', 'upload/sepatu pria 6.jpg', 'Jelajahi dunia dengan sepatu Adidas Energy Boost GGS maka langkah akan mantap. Pilih sepatu terbaik dari Toko Orange'),
(16, 1, 'Sneakers Converse', 'Converse', 'Hitam Putih', '41-43', '0,5 gram ', 350000, '2', 'upload/sepatu pria 7.jpg', 'Kualitas premium untuk setiap petualangan menggunakan sepatu Sneakers Converse. Temukan sepatu Anda di Toko Orange'),
(17, 1, 'Running Adidas Sport', 'Adidas ', 'Biru', '40-45', '0,6 gram ', 600000, '14', 'upload/sepatu pria 8.jpg', 'Sepatu running Adidas yang nyaman digunakan dan berkualitas dari Toko Orange'),
(18, 1, 'High Cut Vantela', 'vantela', 'hitam', '41-44', '0,7 gram ', 700000, '11', 'upload/sepatu pria 9.jpg', 'Sepatu Vantela yang dirancang untuk ketangguhan dan kenyamanan. Hanya di Toko Orange.'),
(19, 1, 'Nike Kyrie 6 Air Jordan', 'Air Jordan', 'merah', '40-45', '0,9 gram', 1500000, '5', 'upload/sepatu pria 10.jpg', 'Bersiaplah untuk segala style dengan sepatu Air Jordan pilihan dari Toko Orange'),
(20, 2, 'Kemeja Batik Klasik', 'Danar Hadi', 'Coklat', 'S-XII', '0,5 gram ', 500000, '5', 'upload/baju cowo 1.jpg', 'Tampil elegan dengan sentuhan tradisional. Kemeja batik klasik dari Dewi Sri Batik akan memberi Anda gaya yang berbeda. kunjungi toko orange'),
(21, 2, 'Jaket Kulit Slim Fit Pria', 'Brodo', 'Hitam', 'M-XI', '0,9 gram', 300000, '9', 'upload/baju cowo 2.jpg', 'Simpel namun elegan. Jaket Kulit Slim Fit Pria dari Brodo adalah pilihan tepat untuk tampil santai namun tetap stylish. kunjugi toko Orange untuk membelinya.'),
(24, 2, 'Blouse Shirt', 'Pekalongan', 'Orange', 'S-XI', '0,3 gram ', 100000, '10', 'upload/baju cewe 9.jpg', 'Bahan Katun Berkualitas pada baju Blouse Shirt. Kunjungi  Toko Orange untuk membelinya.'),
(26, 2, 'Batik Pria Slim Fit', 'Batik Keris', 'Coklat', 'S-XII', '0,2 gram ', 500000, '5', 'upload/baju cowo 3 revisi.jpg', 'Gaya modern dengan unsur budaya. Batik Pria Slim Fit dari Batik Keris adalah pilihan tepat untuk tampil beda dari Toko Orange.'),
(28, 2, 'Kemeja Batik Klasik', 'Danar Hadi', 'Coklat', 'S-XII', '0,3 gram ', 500000, '10', 'upload/baju cowo 1.jpg', 'Tampil elegan dengan sentuhan tradisional. Kemeja batik klasik dari Dewi Sri Batik akan memberi Anda gaya yang berbeda. kunjungi Toko Orange untuk membelinya.'),
(29, 2, 'Batik Pria Premium', 'Danar Hadi', 'Abu-abu', 'M-XI', '0,3 gram ', 700000, '8', '', 'Tampil elegan dengan sentuhan tradisional. Kemeja batik klasik dari Dewi Sri Batik akan memberi Anda gaya yang berbeda. kunjungi toko orange'),
(30, 2, 'Koko Kurta Al-Madinah', 'Zayidan', 'Coklat', 'M-XI', '0,1 gram ', 350000, '6', 'upload/baju cowo 5.jpg', 'Tampil elegan dan nyaman dengan Koko Kurta Al-Madinah dari Zayidan. Desain modern dengan sentuhan klasik untuk momen istimewa Anda. pada Toko Orange'),
(31, 2, 'Kemeja Linen Pria', 'Zara', 'Biru', 'S-XII', '0,3 gram ', 400000, '5', 'upload/baju cowo 6 .jpg', 'Kemeja Linen dengan kualitas premium. Tampil berkelas dengan kemeja dari Zara. Kunjungi Toko Orange untuk membeli Kameja Linen ini.'),
(32, 2, 'Polo Uniqlo', 'Uniqlo', 'Coklat', 'M-XI', '0,2 gram', 100000, '10', 'upload/baju cowo 7.jpg', 'Baju Polo Uniqlo nyaman untuk gaya sehari-hari. Dari kantor hingga akhir pekan, Uniqlo hadir untuk Anda di Toko Orange untuk membelinya'),
(33, 2, 'Kemeja Putih Kantor', 'H&M', 'Putih ', 'M-XI', '0,3 gram ', 200000, '5', 'upload/baju cowo 8.jpg', '\"Kemeja Denim untuk gaya kasual yang cocok untuk kantoran. Temukan gaya Anda dengan kemeja dari H&M di Toko Orange dan beli sekarang.'),
(34, 2, 'Kemeja Oxford Pria', 'Giordano', 'Abu-abu', 'L-XI', '0,1 gram ', 350000, '2', 'upload/baju cowo 9.jpg', 'Kemeja Oxford yang stylish dan nyaman. Giordano hadir untuk memenuhi kebutuhan gaya Anda untuk kebutuhan kantoran dan kampus. kunjungi Toko Orange untuk bisa mendapatkannya. '),
(35, 2, 'Kemeja Linen Pria', 'Zara', 'crem', 'S-XII', '0,3 gram ', 400000, '8', 'upload/baju cowo 10.jpg', 'Kemeja Linen dengan kualitas premium. Tampil berkelas dengan kemeja dari Zara dan beli sekarang di Toko Orange. '),
(36, 2, 'Batik Monalisa', 'Pekalongan', 'Gold', 'S-XI', '0,2 gram ', 150000, '5', 'upload/baju cewe 1.jpg', 'Bahan 100% Full Katun, Kualitas Terjamin (Halus,Adem dan Tidak Luntur). Kunjungi Toko Orange untuk membelinya.'),
(37, 2, 'Batik Genes', 'Pekalongan', 'Coklat', 'M-XI', '0,4 gram ', 160000, '6', 'upload/baju cewe 2.jpg', 'Bahan Katun Prima Berkualitas (Halus,Adem,Nyerap Keringat, Tidak Licin, Tidak Luntur dan Mudah Disetrika. Beli sekarang di Toko Orange.  '),
(38, 2, 'Kemeja Putih Wanita', 'Nelka', 'Putih ', 'S-XI', '0,2 gram', 100000, '4', 'upload/baju cewe 3.jpg', 'Bahan Linen Premium dan dapatkan di Toko Orange untuk membelinya '),
(39, 2, 'Tunik Batik', 'Pekalongan', 'Coklat', 'S-XII', '0,5 gram ', 170000, '7', 'upload/baju cewe 4.jpg', 'Bahan Signature Premium, Nyaman dan Tidak Panas digunakan. Beli sekarang di Toko Orange.'),
(40, 2, 'Blouse Batik', 'Pekalongan', 'Abu-abu', 'S-XII', '0,3 gram ', 100000, '6', 'upload/baju cewe 5.jpg', 'Bahan Signature Premium, Nyaman dan Tidak Panas digunakan. Beli sekarang di Toko Orange.'),
(41, 2, 'Gamis Premiun', 'Premium', 'Hitam', 'S-XII', '0,5 gram ', 150000, '8', 'upload/baju cewe 6.jpg', 'Bahan Katun Premium, Jahitan Rapi dan Nyaman Dipakai Daily. Buruan beli di Toko Orange Sekarang.'),
(42, 2, 'Batik Kantor Modern', 'Pekalongan', 'Biru', 'S-XII', '0,3 gram ', 150000, '11', 'upload/baju cewe 7.jpg', 'Bahan 100% Full Katun, Kualitas Terjamin (Halus,Adem dan Tidak Luntur). Buruan beli sekarang di Toko Orange. '),
(43, 2, 'Blouse Crop Polos', 'Crinkle Air Flow', 'Crem', 'M-XI', '0,3 gram ', 100000, '13', 'upload/baju cewe 8.jpg', 'Bahan Katun Prima Berkualitas (Halus,Adem, Nyerap Keringat dan Tidak Licin). Buruan beli di Toko Orange sebelum kehabisan.'),
(44, 2, 'Batik Lalisa ', 'Danar Hadi', 'Merah', 'S-XI', '0,3 gram ', 100000, '10', 'upload/baju cewe 10.jpg', 'Bahan Katun Prima Berkualitas Halus,Adem,Nyerap Keringat, Tidak Licin, Tidak Luntur dan Mudah Disetrika. Dapatkan Baju Batik Lalisa di Toko Orage Sekarang.'),
(45, 2, 'Tunik Batik', 'Batik Keris', 'Crem', 'M-XI', '0,5 gram ', 170000, '5', 'upload/baju cewe 4.jpg', 'Bahan Signature Premium, Nyaman dan Tidak Panas, dapatkan di Toko Orange Sekarang'),
(46, 1, 'Heels Jessy', 'Ens Collection ', 'Hitam Gold', '35-41', '0,6 gram ', 100000, '13', 'upload/sepatu wanita 1.jpg', 'Kunjungi Toko Orange untuk membeli Sendal Heels. \r\nBahan Sendal:\r\n- Material Kulit Sintetis\r\n - Hak 4cm.'),
(47, 1, 'Flatshoes Coline', 'Fashion Collection ', 'Hitam', '35-41', '0,8 gram ', 120000, '12', 'upload/sepatu wanita 2.jpg', '100% Original. Tinggi Sol : -+1cm. Dapatkan sepatu Flatshoes Colinedi Toko Orange.'),
(48, 1, 'Shoes Zoey', 'Fashion Collection ', 'Pink, Hitam, Biru, Gold, Abu-A', '35-41', '0,5 gram ', 150000, '12', 'upload/sepatu wanita 3.jpg', 'Meanmpilkan desain modern yang unik dan kekenian. Dengan tinggi sol 3cm. cocok digunakan sehari-hari.'),
(49, 1, 'Flatshoes Penelopi', 'Ens Collection ', 'Maron', '35-41', '0,9 gram', 150000, '10', 'upload/sepatu wanita 5.jpg', 'Sendal Heels Hak 2cm. Bahan Material Kulit Sintetis'),
(50, 1, 'Flatshoes Giany ', 'Ens Collection ', 'Kuning', '35-41', '0,5 gram ', 120000, '6', 'upload/sepatu wanita 6.jpg', 'Sepatu Flatshoes Giany 100% Original. Tinggi Sol : -+1cm'),
(51, 1, 'Shoes BP', 'Sport BlackPink ', 'Abu-Abu', '35-42', '0,5 gram ', 200000, '15', 'upload/sepatu wanita 7.jpg', 'Running Shoes Blackpink Nyaman digunakan  saat aktivitas olahraga dan sekolah.'),
(52, 1, 'Heels Shanon', 'Fashion Collection ', 'Hitam crem', '35-41', '0,8 gram ', 100000, '11', 'upload/sepatu wanita 8.jpg', 'Sepatu Heels Shanon berbahan : Dove/Non-Kilap, Tinggi Sol: 5 cm'),
(53, 1, 'Women S Casual Gfs 900', 'Shoe Casual', 'Putih ', '35-41', '0,7 gram ', 150000, '15', 'upload/sepatu wanita 9.jpg', 'Sepatu Wanita  Dengan Hak 6cm. Bahan Material Kulit Sintetis Nyaman digunakan.'),
(54, 1, 'Running Shoes Neva', 'Ens Collection ', 'Putih ', '35-41', '0,8 gram ', 200000, '13', 'upload/sepatu wanita 10.jpg', 'Running Shoes Neva sangat Meanmpilkan desain modern yang unik dan kekenian. Dapatkan sekarang di Toko Orange.');

-- --------------------------------------------------------

--
-- Table structure for table `data_wishlist`
--

CREATE TABLE `data_wishlist` (
  `id_wishlist` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_wishlist`
--

INSERT INTO `data_wishlist` (`id_wishlist`, `id_produk`, `id_user`) VALUES
(3, 6, 1),
(5, 9, 1),
(6, 20, 0),
(8, 29, 0),
(9, 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telpon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `alamat`, `email`, `telpon`) VALUES
(1, 'tes1', '1', 'Tes 1', 'Jln Perintis !', 'ss@gmail.com', '1234566'),
(2, 'tes2', '1', 'Tes2', 'Jln Perintis Kemerdekaan', 'tes@gmail.com', '12'),
(3, 'tes3', '1', 'Tes3', 'Jln Kemerdekaan', '12@gmail.com', '123'),
(4, 'Winda', '12345', 'Trisna Winda', 'Btn antang raya 8', 'winda@gmail.com', '085678980098');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `data_bukti`
--
ALTER TABLE `data_bukti`
  ADD PRIMARY KEY (`id_bukti`);

--
-- Indexes for table `data_kategori`
--
ALTER TABLE `data_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `data_keranjang`
--
ALTER TABLE `data_keranjang`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `data_pesanan`
--
ALTER TABLE `data_pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `data_produk`
--
ALTER TABLE `data_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `data_wishlist`
--
ALTER TABLE `data_wishlist`
  ADD PRIMARY KEY (`id_wishlist`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `data_bukti`
--
ALTER TABLE `data_bukti`
  MODIFY `id_bukti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `data_kategori`
--
ALTER TABLE `data_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `data_keranjang`
--
ALTER TABLE `data_keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `data_pesanan`
--
ALTER TABLE `data_pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `data_produk`
--
ALTER TABLE `data_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `data_wishlist`
--
ALTER TABLE `data_wishlist`
  MODIFY `id_wishlist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
