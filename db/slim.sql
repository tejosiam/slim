-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 26 Jul 2018 pada 12.14
-- Versi Server: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `slim`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `api_users`
--

CREATE TABLE `api_users` (
  `email` varchar(50) NOT NULL,
  `api_key` varchar(255) NOT NULL,
  `hit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `api_users`
--

INSERT INTO `api_users` (`email`, `api_key`, `hit`) VALUES
('fdtejo@gmail.com', '123', 132);

-- --------------------------------------------------------

--
-- Struktur dari tabel `client`
--

CREATE TABLE `client` (
  `client_id` varchar(10) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `client_type` varchar(10) NOT NULL,
  `client_status` varchar(10) NOT NULL,
  `signup_url` varchar(250) NOT NULL,
  `services_type` varchar(20) NOT NULL,
  `industry` varchar(50) NOT NULL,
  `geolocation_city` varchar(50) NOT NULL,
  `geolocation_country` varchar(50) NOT NULL,
  `countries_interested_in` varchar(30) NOT NULL,
  `creation_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `client`
--

INSERT INTO `client` (`client_id`, `firstname`, `lastname`, `email`, `client_type`, `client_status`, `signup_url`, `services_type`, `industry`, `geolocation_city`, `geolocation_country`, `countries_interested_in`, `creation_date`) VALUES
('JKT01', 'Amzar', '', 'jadwaltejo@gmail.com', 'Corporate', 'Client', 'testing.com/email', 'incorporation', 'Food & Beverages', '', '', 'Indonesia', '0000-00-00'),
('JKT02', 'Tejo', '', 'tejo@infotech.co.id', 'Private', 'Client', 'testing.com/email', 'eor', 'Cosmetic', '', '', 'Philippines', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `api_users`
--
ALTER TABLE `api_users`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `hit` (`hit`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
