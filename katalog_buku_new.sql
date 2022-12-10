-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Okt 2022 pada 16.49
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `katalog_buku_new`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `blog`
--

CREATE TABLE `blog` (
  `id_blog` int(11) NOT NULL,
  `id_kategori_blog` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `tanggal` date NOT NULL DEFAULT '1999-01-01',
  `judul` varchar(255) DEFAULT NULL,
  `isi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `id_kategori_buku` int(11) DEFAULT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `pengarang` varchar(255) DEFAULT NULL,
  `id_penerbit` int(11) DEFAULT NULL,
  `tahun_terbit` int(11) DEFAULT NULL,
  `sinopsis` text DEFAULT NULL,
  `cover` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `id_kategori_buku`, `judul`, `pengarang`, `id_penerbit`, `tahun_terbit`, `sinopsis`, `cover`) VALUES
(5, 66, 'SUPPLY', 'SUMPONO      ', 4, 2082, '<p>LOREM IPSUM</p>\r\n', 'blue.png'),
(13, 68, 'Bahasa Ibu', 'hahahah', 5, 2023, 'bahasa ibu adalah bahasa daerah', 'IMG-20191224-WA0002.jpg'),
(15, 88, 'About Me', 'ERLANGGA', 7, 2024, '<p>LOREM IPSUM HAHAHAH</p>\r\n', 'IMG_20220729_145128_963.webp'),
(16, 92, 'profil', ' kamls    ', 7, 2021, '<p>awal masuk kuliah</p>\r\n', 'IMG_1113.JPG'),
(18, 66, 'jaringan komputer', 'seca ', 4, 0, '<p>jaringan lan dan waan</p>\r\n', '2.jpeg'),
(19, 92, 'Algoritma', 'Jaenudin', 5, 2022, '<p>Algoritma Matematika</p>\r\n', 'poster.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `coba`
--

CREATE TABLE `coba` (
  `id_coba` int(11) NOT NULL,
  `kategori` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `coba`
--

INSERT INTO `coba` (`id_coba`, `kategori`) VALUES
(1, 'Pemrograman'),
(2, 'Pemrograman Mobile'),
(3, 'Software Enginering');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_blog`
--

CREATE TABLE `kategori_blog` (
  `id_kategori_blog` int(11) NOT NULL,
  `kategori_blog` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori_blog`
--

INSERT INTO `kategori_blog` (`id_kategori_blog`, `kategori_blog`) VALUES
(1, 'Teknologi Informasi'),
(2, 'Pemrograman'),
(3, 'Android'),
(5, 'IoT'),
(12, 'Metaverse'),
(13, 'Software Enginering'),
(14, 'Metaverse');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_buku`
--

CREATE TABLE `kategori_buku` (
  `id_kategori_buku` int(11) NOT NULL,
  `kategori_buku` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori_buku`
--

INSERT INTO `kategori_buku` (`id_kategori_buku`, `kategori_buku`) VALUES
(57, 'WEB PROGRAM DINAMIS'),
(66, 'BASIS DATA'),
(68, 'Sejarah'),
(69, 'Listrik'),
(70, 'KBBI'),
(88, 'MANAJEMEN PERHOTELAN'),
(92, 'Matematika'),
(97, 'majalah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konten`
--

CREATE TABLE `konten` (
  `id_konten` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `tanggal` date NOT NULL DEFAULT '1999-01-01'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `konten`
--

INSERT INTO `konten` (`id_konten`, `judul`, `isi`, `tanggal`) VALUES
(1, 'About Me', '<p>harap tenang</p>\r\n', '1999-01-01'),
(2, 'Selamat Datang', '<p>hhhh</p>\r\n', '2022-07-14'),
(3, 'bahaya', '<p>warning</p>\r\n', '1999-01-01'),
(4, 'narasi', 'narasi', '0000-00-00'),
(5, 'hari yang indah', '<p>hari yang indah</p>\r\n', '0000-00-00'),
(6, 'jjjjj', 'jjjjjjj', '1999-01-01'),
(7, 'hhhhfffffffff', 'ggggggggggggg', '1999-01-01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penerbit`
--

CREATE TABLE `penerbit` (
  `id_penerbit` int(11) NOT NULL,
  `penerbit` varchar(100) DEFAULT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penerbit`
--

INSERT INTO `penerbit` (`id_penerbit`, `penerbit`, `alamat`) VALUES
(2, 'Andi', '<p>JL Beo 38-40 Yogyakarta Tugu</p>\r\n'),
(3, 'Kalomedia', '<p>JL. Jambon, Perum. Persona Alam Hijau Kav 2. B-4, Kricak Yogyakarta</p>\r\n'),
(4, 'Informatika', 'Pasar Buku Palasari No. 82 Bandung'),
(5, 'Elek Media Komputindo', 'Jakarta'),
(7, 'GRAMEDIA CITA', '<p>JL DAWUHAN SURABAYA MALANG</p>\r\n'),
(13, 'WILIS', '<p>Malang</p>\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tag`
--

CREATE TABLE `tag` (
  `id_tag` int(11) NOT NULL,
  `tag` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tag`
--

INSERT INTO `tag` (`id_tag`, `tag`) VALUES
(1, 'HTML'),
(2, 'CSS'),
(3, 'PYTHON'),
(4, 'JAVASCRIPT'),
(5, 'JAVA'),
(6, 'RUBY'),
(8, 'DART'),
(9, 'C++'),
(10, 'C#'),
(11, 'C'),
(12, 'PHP'),
(13, 'JSON');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tag_buku`
--

CREATE TABLE `tag_buku` (
  `id_tag_buku` int(11) NOT NULL,
  `id_buku` int(11) DEFAULT NULL,
  `id_tag` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  `levels` varchar(30) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `username`, `password`, `levels`, `foto`) VALUES
(35, 'salnan', 'salnan@gmail.com', 'salnan', 'd41d8cd98f00b204e9800998ecf8427e', 'superadmin', 'salnan.jpg'),
(57, 'Rifqi Alfiansyah Kamil', 'rifqialfiansyah@student.ub.ac.id', 'rifqi', '72561baf6079c338cc2dd68e98d52055', 'superadmin', 'indahstudio2432.jpg'),
(63, 'Elisabeth Situmorang ', 'elisamaple08@student.ub.ac.id', 'elisa', '8070b0b01d9042fdbc54f095bd2832ef', 'superadmin', 'WhatsApp Image 2022-10-20 at 17.53.59.jpeg'),
(64, 'Rayyan Irsyad Nashrullah ', 'raysyadrin@student.ub.ac.id', 'Rayyan', '439bc7fd7e8d5c29710ebf77eea9df9f', 'superadmin', 'WhatsApp Image 2022-10-20 at 17.54.31.jpeg'),
(65, 'Irbah Azhaar Nazhifah ', 'irbahazhaar@student.ub.ac.id', 'Irbah', '291e8cc0c5acbd0a2b63e9812ab0f934', 'superadmin', 'WhatsApp Image 2022-10-20 at 18.03.56.jpeg'),
(66, 'Sikaka', 'kaka@gmail.com', 'kaka', '5cace0cb00b29713d050de8fc62d7c7a', 'admin', 'Screenshot 2022-10-09 113158.jpg'),
(68, 'abababba', 'admin2@gmail.com', 'admin2', 'c84258e9c39059a89ab77d846ddab909', 'admin', 'Group 4 (2).png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id_blog`),
  ADD KEY `kategori_blog` (`id_kategori_blog`),
  ADD KEY `user_blog` (`id_user`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`) USING BTREE,
  ADD KEY `kategori_buku` (`id_kategori_buku`),
  ADD KEY `penerbit_buku` (`id_penerbit`);

--
-- Indeks untuk tabel `coba`
--
ALTER TABLE `coba`
  ADD PRIMARY KEY (`id_coba`);

--
-- Indeks untuk tabel `kategori_blog`
--
ALTER TABLE `kategori_blog`
  ADD PRIMARY KEY (`id_kategori_blog`);

--
-- Indeks untuk tabel `kategori_buku`
--
ALTER TABLE `kategori_buku`
  ADD PRIMARY KEY (`id_kategori_buku`);

--
-- Indeks untuk tabel `konten`
--
ALTER TABLE `konten`
  ADD PRIMARY KEY (`id_konten`);

--
-- Indeks untuk tabel `penerbit`
--
ALTER TABLE `penerbit`
  ADD PRIMARY KEY (`id_penerbit`);

--
-- Indeks untuk tabel `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id_tag`);

--
-- Indeks untuk tabel `tag_buku`
--
ALTER TABLE `tag_buku`
  ADD PRIMARY KEY (`id_tag_buku`),
  ADD KEY `tag_tag` (`id_tag`),
  ADD KEY `buku_buku` (`id_buku`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `blog`
--
ALTER TABLE `blog`
  MODIFY `id_blog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `coba`
--
ALTER TABLE `coba`
  MODIFY `id_coba` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kategori_blog`
--
ALTER TABLE `kategori_blog`
  MODIFY `id_kategori_blog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `kategori_buku`
--
ALTER TABLE `kategori_buku`
  MODIFY `id_kategori_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT untuk tabel `konten`
--
ALTER TABLE `konten`
  MODIFY `id_konten` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `penerbit`
--
ALTER TABLE `penerbit`
  MODIFY `id_penerbit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tag`
--
ALTER TABLE `tag`
  MODIFY `id_tag` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `tag_buku`
--
ALTER TABLE `tag_buku`
  MODIFY `id_tag_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`id_kategori_blog`) REFERENCES `kategori_blog` (`id_kategori_blog`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `blog_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`id_kategori_buku`) REFERENCES `kategori_buku` (`id_kategori_buku`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `buku_ibfk_2` FOREIGN KEY (`id_penerbit`) REFERENCES `penerbit` (`id_penerbit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tag_buku`
--
ALTER TABLE `tag_buku`
  ADD CONSTRAINT `tag_buku_ibfk_1` FOREIGN KEY (`id_tag`) REFERENCES `tag` (`id_tag`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tag_buku_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
