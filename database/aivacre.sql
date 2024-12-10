-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2024 at 02:06 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aivacre`
--

-- --------------------------------------------------------

--
-- Table structure for table `campaign`
--

CREATE TABLE `campaign` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `no_rek` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `judul_donasi` varchar(255) NOT NULL,
  `kategori` enum('Pendidikan','Bencana Alam','Bantuan Sosial') NOT NULL,
  `opsi_bank` enum('BRI','BCA','BNI','MANDIRI') NOT NULL,
  `deskripsi` text NOT NULL,
  `jumlah_donasi` decimal(12,2) NOT NULL,
  `tenggat_waktu` date NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `jumlah_terkumpul` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `campaign`
--

INSERT INTO `campaign` (`id`, `nama`, `email`, `no_telp`, `no_rek`, `alamat`, `judul_donasi`, `kategori`, `opsi_bank`, `deskripsi`, `jumlah_donasi`, `tenggat_waktu`, `gambar`, `created_at`, `jumlah_terkumpul`) VALUES
(35, 'Ival Permana', 'ivalpermana@gmail.com', '081234567890', '123456789010', 'Rumahku', 'Mencoba Fitur Berdonasi ', 'Pendidikan', 'BCA', 'Test Berdonasi ', 10000000.00, '2024-12-13', 'img/Screenshot 2024-10-11 193910.png', '2024-12-10 12:17:48', 1510000.00),
(36, 'Test Progress ', 'test@gmail.com', '12312', '2131232', '1231', '21312', 'Pendidikan', 'MANDIRI', '2131232', 2313.00, '2024-12-12', 'img/Screenshot 2024-10-11 193910.png', '2024-12-10 12:25:19', 22313.00);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `campaign_id` int(11) NOT NULL,
  `jumlah_donasi` decimal(10,2) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `tanggal_transaksi` timestamp NOT NULL DEFAULT current_timestamp(),
  `metode_pembayaran` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `user_id`, `campaign_id`, `jumlah_donasi`, `status`, `tanggal_transaksi`, `metode_pembayaran`) VALUES
(6, 3, 35, 100000.00, NULL, '2024-12-10 12:57:11', 'ewallet'),
(7, 3, 36, 21313.00, NULL, '2024-12-10 13:03:06', 'bank');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `gambar_profile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `created_at`, `updated_at`, `gambar_profile`) VALUES
(1, 'Ival aja', 'Ivalpermana@gmail.com', '$2y$10$0G4F2OjuQuZAGvkM70JlmOm0I5GtOvVWZwRfVdvLfxDBx9vQUpCGK', '2024-11-19 11:19:30', '2024-11-28 14:00:47', 'Screenshot 2024-10-11 193910.png'),
(2, 'Dosen ', 'dosen@gmail.com', '$2y$10$Nbr3nlNghyQmYijTj/DHs.XP2TtBTD6ANf3mGcW4dwPVKXBdMLgUy', '2024-11-19 12:48:08', '2024-11-28 13:00:15', ''),
(3, 'ival', 'ival@gmail.com', '$2y$10$5Qq8lVpr4b1X1aLJn9rRT.U2EOHttnbrkl52WV8UKcrz/zoa8HoXe', '2024-12-10 11:21:48', '2024-12-10 11:21:48', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `campaign`
--
ALTER TABLE `campaign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `campaign_id` (`campaign_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `campaign`
--
ALTER TABLE `campaign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`campaign_id`) REFERENCES `campaign` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
