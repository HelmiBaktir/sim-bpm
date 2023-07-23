-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 23 Jul 2023 pada 06.56
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sim_bps`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `catatan_nifas`
--

CREATE TABLE `catatan_nifas` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_catatan_persalinan` int(10) UNSIGNED NOT NULL,
  `users_id` int(10) UNSIGNED NOT NULL,
  `tanggal` datetime NOT NULL,
  `keluhan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `td` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nadi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rr` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `suhu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payudara` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tfu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kontraksi_rahim` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendarahan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lochia` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `oed` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `bab` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `bak` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `asi_saja` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `analisa_masalah` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `terapi_tindakan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `penyuluhan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rujuk_ke` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pemeriksa_paraf` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_hapus` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `catatan_persalinan`
--

CREATE TABLE `catatan_persalinan` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_layanan_ibu_hamil` int(10) UNSIGNED NOT NULL,
  `users_id` int(10) UNSIGNED NOT NULL,
  `tempat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` datetime NOT NULL,
  `penolong` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_penolong` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `proses_persalinan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `komplikasi_persalinan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `keadaan_bbl_bb` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `keadaan_bbl_pb` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `keadaan_bbl_lk` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `keadaan_bbl_hidup` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `keadaan_ibu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_hapus` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `header_kspr`
--

CREATE TABLE `header_kspr` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_layanan_ibu_hamil` int(10) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_skor` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `header_lembar_observasi`
--

CREATE TABLE `header_lembar_observasi` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_layanan_ibu_hamil` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `jam` time NOT NULL,
  `his_mulai_tgl` date NOT NULL,
  `his_jam` time NOT NULL,
  `darah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lendir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ketuban` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_ketuban` time NOT NULL,
  `keluhan_lain` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tensi_atas` int(3) NOT NULL,
  `tensi_bawah` int(3) NOT NULL,
  `suhu` int(3) NOT NULL,
  `nadi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `oedema` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lain_lain` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `palpasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `djj` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `his_10` int(11) NOT NULL,
  `lama_his_10` int(11) NOT NULL,
  `vt_tgl` date NOT NULL,
  `vt_jam` time NOT NULL,
  `hasil` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pemeriksa` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `header_penapisan`
--

CREATE TABLE `header_penapisan` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_layanan_ibu_hamil` int(10) UNSIGNED NOT NULL,
  `tanggal` datetime NOT NULL,
  `jam` time NOT NULL,
  `nama` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_hapus` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `history_imunisasi`
--

CREATE TABLE `history_imunisasi` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_layanan_imunisasi` int(10) UNSIGNED NOT NULL,
  `pasien_bayi_id` int(10) UNSIGNED NOT NULL,
  `users_id` int(10) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `status_hapus` tinyint(4) NOT NULL,
  `bb` double(8,2) NOT NULL,
  `keluhan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nasehat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `umur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengobatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tarif_layanan_tambahan` double(8,2) NOT NULL,
  `total_akhir` double(8,2) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `history_kb`
--

CREATE TABLE `history_kb` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_layanan_kb` int(10) UNSIGNED NOT NULL,
  `id_jenis_layanan` int(10) UNSIGNED NOT NULL,
  `tgl` date NOT NULL,
  `tgl_haid` date NOT NULL,
  `bb` int(11) NOT NULL,
  `tensi_atas` int(11) NOT NULL,
  `tensi_bawah` int(11) NOT NULL,
  `keluhan_efek_samping` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `komplikasi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tindakan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tindakan_efek_samping` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `history_kspr`
--

CREATE TABLE `history_kspr` (
  `id` int(10) UNSIGNED NOT NULL,
  `master_kspr_id` int(10) UNSIGNED NOT NULL,
  `id_layanan_ibu_hamil` int(10) UNSIGNED NOT NULL,
  `id_header_kspr` int(11) NOT NULL,
  `skor` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_hapus` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `history_layanan_ibu_hamil`
--

CREATE TABLE `history_layanan_ibu_hamil` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_layanan_ibu_hamil` int(10) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL DEFAULT current_timestamp(),
  `keluhan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bawa_buku_kia` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bb` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `td` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nadi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rr` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `abdomen` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oedem_tungkai` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tfu` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lt_janin` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `djj` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gerak_janin` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uk` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lab` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skor` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `analisa_masalah` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penyuluhan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `terapi_tt` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rujuk_ke` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `history_lembar_observasi`
--

CREATE TABLE `history_lembar_observasi` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_lembar_observasi` int(10) UNSIGNED NOT NULL,
  `users_id` int(10) UNSIGNED NOT NULL,
  `tgl` date NOT NULL,
  `jam` time NOT NULL,
  `his_10` int(11) NOT NULL,
  `lama_his_10` int(11) NOT NULL,
  `tensi_atas` int(3) NOT NULL,
  `tensi_bawah` int(3) NOT NULL,
  `suhu` int(3) NOT NULL,
  `nadi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `djj` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vt_tgl` date DEFAULT NULL,
  `vt_jam` time DEFAULT NULL,
  `ket_vt` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `history_penapisan`
--

CREATE TABLE `history_penapisan` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_layanan_ibu_hamil` int(10) UNSIGNED NOT NULL,
  `id_master_penapisan` int(10) UNSIGNED NOT NULL,
  `id_header_penapisan` int(11) NOT NULL,
  `jawaban` tinyint(4) NOT NULL,
  `status_hapus` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hist_ibu_hamil_obat`
--

CREATE TABLE `hist_ibu_hamil_obat` (
  `id_history_ibu_hamil` int(10) UNSIGNED DEFAULT NULL,
  `id_obat` int(10) UNSIGNED DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `imunisasi_jenis_layanan`
--

CREATE TABLE `imunisasi_jenis_layanan` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_layanan_imunisasi` int(10) UNSIGNED NOT NULL,
  `id_jenis_layanan` int(10) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `status_imunisasi` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `imunisasi_obat`
--

CREATE TABLE `imunisasi_obat` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_obat` int(10) UNSIGNED NOT NULL,
  `id_layanan` int(10) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kb_obat`
--

CREATE TABLE `kb_obat` (
  `id_history_kb` int(10) UNSIGNED NOT NULL,
  `id_obat` int(10) UNSIGNED DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `harga_obat` decimal(8,0) NOT NULL,
  `total_harga_obat` decimal(8,0) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kepala_puskesmas`
--

CREATE TABLE `kepala_puskesmas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelurahan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_aktif` tinyint(1) NOT NULL,
  `status_hapus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `klinik_obat`
--

CREATE TABLE `klinik_obat` (
  `id_obat` int(10) UNSIGNED NOT NULL,
  `id_layanan` int(10) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `harga_obat` decimal(8,0) NOT NULL,
  `total_harga_obat` decimal(8,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kunjungan_ibu_hamil_obat`
--

CREATE TABLE `kunjungan_ibu_hamil_obat` (
  `id_obat` int(10) UNSIGNED NOT NULL,
  `id_layanan` int(10) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `harga_obat` decimal(8,0) NOT NULL,
  `total_harga_obat` decimal(8,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lampiran`
--

CREATE TABLE `lampiran` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_layanan` int(10) UNSIGNED DEFAULT NULL,
  `jenis_layanan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `url_gambar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_registrasi_pasien` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `layanan`
--

CREATE TABLE `layanan` (
  `id` int(10) UNSIGNED NOT NULL,
  `users_id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tarif_layanan` double(8,2) NOT NULL,
  `tarif_total` double(8,2) NOT NULL,
  `pelayanan` tinyint(4) NOT NULL,
  `status_hapus` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `layanan`
--

INSERT INTO `layanan` (`id`, `users_id`, `nama`, `tarif_layanan`, `tarif_total`, `pelayanan`, `status_hapus`, `created_at`, `updated_at`) VALUES
(3, 4, 'wwaw', 10000.00, 10123.00, 3, 0, '2023-06-24 14:23:20', '2023-06-24 14:23:20'),
(4, 4, 'Tes', 10000.00, 10123.00, 0, 0, '2023-06-26 14:57:34', '2023-06-26 14:57:34'),
(6, 4, 'COK', 200000.00, 200000.00, 1, 0, '2023-06-27 15:50:55', '2023-06-27 15:50:55'),
(7, 4, 'CIK', 300000.00, 300123.00, 2, 0, '2023-06-27 15:51:11', '2023-06-27 15:51:11'),
(8, 4, 'Test', 400000.00, 400123.00, 4, 0, '2023-06-29 07:27:32', '2023-06-29 07:27:32'),
(9, 4, 'w1', 200000.00, 200123.00, 5, 0, '2023-07-09 14:52:34', '2023-07-09 14:52:34'),
(10, 4, 'Cok', 350000.00, 350123.00, 6, 0, '2023-07-09 15:37:39', '2023-07-09 15:37:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `layanan_ibu_hamil`
--

CREATE TABLE `layanan_ibu_hamil` (
  `id` int(10) UNSIGNED NOT NULL,
  `no_regis_pasien_dewasa` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `users_id` int(10) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `rujukan_terencana` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `g` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `haid` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `hpht` date NOT NULL,
  `hpl` date NOT NULL,
  `bb_sebelum_hamil` double NOT NULL,
  `mual_muntah` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket_mual_muntah` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pusing` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket_pusing` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nyeri_perut` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket_nyeri_perut` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gerak_janin` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket_gerak_janin` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oedema` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket_oedema` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nafsu_makan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket_nafsu_makan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pendarahan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendarahan_sejak` date DEFAULT NULL,
  `keluhan_utama` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hasil_skor_kspr` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dotk` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dom` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rujuk_ke` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `penyakit_yang_diderita` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `riwayat_penyakit_keluarga` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kebiasaan_ibu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `statustt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_imunisasi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `resiko_hiv` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `penyebab_hiv` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tb` double NOT NULL,
  `lila` double NOT NULL,
  `imt` double NOT NULL,
  `bentuk_tubuh` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket_bentuk_tubuh` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kesadaran` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket_kesadaran` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `muka` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket_muka` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kulit` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket_kulit` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mata` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket_mata` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mulut` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket_mulut` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gigi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket_gigi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pembesaran_kel` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket_pembesaran_kel` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dada` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket_dada` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paru` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket_paru` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jantung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket_jantung` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payudara` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket_payudara` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tangan_tungkai` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `refleks` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `golongan_darah_ibu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `golongan_darah_suami` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `penolong` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendamping` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `calon_donor` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `stiker_p4k` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dipasang_tanggal` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kesimpulan_diagnosa` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_hapus` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `layanan_imunisasi`
--

CREATE TABLE `layanan_imunisasi` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_pasien_bayi` int(11) NOT NULL,
  `no_kartu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_paket` int(11) NOT NULL,
  `status_pasien` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `layanan_kb`
--

CREATE TABLE `layanan_kb` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_jenis_layanan` int(10) UNSIGNED NOT NULL,
  `no_regis_pasien_dewasa` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `users_id` int(10) UNSIGNED NOT NULL,
  `no_kartu` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_peserta` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_status_peserta` datetime NOT NULL,
  `jumlah_anak_laki` int(11) NOT NULL,
  `jumlah_anak_perempuan` int(11) NOT NULL,
  `ku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `haid_terakhir` datetime NOT NULL,
  `tensi_atas` int(11) NOT NULL,
  `tensi_bawah` int(11) NOT NULL,
  `bb` int(11) NOT NULL,
  `sakit_kuning` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perd_per_vag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tumor_payudara` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fluoralbus` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanda_radang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tumor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `posisi_rahim` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genetalia_luar_dalam` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_dilayani` date NOT NULL,
  `tgl_datang_kembali` date NOT NULL,
  `tgl_lepas` date NOT NULL,
  `no_registrasi_pasien` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `layanan_klinik`
--

CREATE TABLE `layanan_klinik` (
  `id` int(10) UNSIGNED NOT NULL,
  `no_regis` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `users_id` int(10) UNSIGNED NOT NULL,
  `tanggal` datetime NOT NULL,
  `keluhan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tindakan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_kspr`
--

CREATE TABLE `master_kspr` (
  `id` int(10) UNSIGNED NOT NULL,
  `urutan` int(11) NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `opsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_hapus` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `master_kspr`
--

INSERT INTO `master_kspr` (`id`, `urutan`, `text`, `opsi`, `status_hapus`, `created_at`, `updated_at`) VALUES
(28, 0, 'Skor Awal Ibu Hamil', '0;2', 0, NULL, NULL),
(29, 1, 'Terlalu muda, hamil = 16 th', '0;4', 0, NULL, NULL),
(30, 2, 'a. Terlalu lambat hamil I, kawin = 4 th', '0;4', 0, NULL, NULL),
(31, 2, 'b. Terlalu tua, hamil 1 = 35 th', '0;4', 0, NULL, NULL),
(32, 3, 'Terlalu cepat hamil lagi (< 2 th)', '0;4', 0, NULL, NULL),
(33, 4, 'Terlalu lama hamil lagi (= 10 th)', '0;4', 0, NULL, NULL),
(34, 5, 'Terlalu banyak anak, 4/lebih', '0;4', 0, NULL, NULL),
(35, 6, 'Terlalu tua, umur = 35 th', '0;4', 0, NULL, NULL),
(36, 7, 'Terlalu pendek = 145 cm', '0;4', 0, NULL, NULL),
(37, 8, 'Pernah gagal kehamilan', '0;4', 0, NULL, NULL),
(38, 9, 'Pernah melahirkan dengan:\r\na. Tarikan tang/vakum', '0;4', 0, NULL, NULL),
(39, 9, 'b. Uri dirogoh', '0;4', 0, NULL, NULL),
(40, 9, 'c. Diberi infus/transfusi', '0;4', 0, NULL, NULL),
(41, 10, 'Pernah Operasi Sesar', '0;8', 0, NULL, NULL),
(42, 11, 'Penyakit pada ibu hamil:\r\na. Kurang darah~b. Malaria', '0;4', 0, NULL, NULL),
(43, 11, 'c. TBC Paru~d. Payah jantung', '0;4', 0, NULL, NULL),
(44, 11, 'e. Kencing Manis (Diabetes)', '0;4', 0, NULL, NULL),
(45, 11, 'f. Penyaki Menular Seksual', '0;4', 0, NULL, NULL),
(46, 12, 'Bengkak pada muka/tungkai dan tekanan darah tinggi', '0;4', 0, NULL, NULL),
(47, 13, 'Hamil kembar 2 atau lebih', '0;4', 0, NULL, NULL),
(48, 14, 'Hamil kembar air (hydraminon)', '0;4', 0, NULL, NULL),
(49, 15, 'Bayi mati dalam kandungan', '0;4', 0, NULL, NULL),
(50, 16, 'Kehamilan lebih bulan', '0;4', 0, NULL, NULL),
(51, 17, 'Letak Sungsang', '0;8', 0, NULL, NULL),
(52, 18, 'Letak lintang', '0;8', 0, NULL, NULL),
(53, 19, 'Pendarahan dalam kehamilan ini', '0;8', 0, NULL, NULL),
(54, 20, 'Pre-eklampsia Berat/Kejang-kejang', '0;8', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_penapisan`
--

CREATE TABLE `master_penapisan` (
  `id` int(10) UNSIGNED NOT NULL,
  `kriteria` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_hapus` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `master_penapisan`
--

INSERT INTO `master_penapisan` (`id`, `kriteria`, `status_hapus`, `created_at`, `updated_at`) VALUES
(1, 'Riwayat Bedah Sesar', 0, NULL, NULL),
(2, 'Perdarahan Pervaginam', 0, NULL, NULL),
(3, 'Persalinan Kurang Bulan (< 37 mgg)', 0, NULL, NULL),
(4, 'Ketuban pecah dengan meconium yang kental', 0, NULL, NULL),
(5, 'Ketuban pecah lama (> 24 jam)', 0, NULL, NULL),
(6, 'Ketuban pecah pada persalinan kurang bulan (< 37 mgg)', 0, NULL, NULL),
(7, 'Ikterus', 0, NULL, NULL),
(8, 'Anemia berat', 0, NULL, NULL),
(9, 'Tanda/Gejala Infeksi', 0, NULL, NULL),
(10, 'Pre-eklamsia/hipertensi dalam kehamilan', 0, NULL, NULL),
(11, 'Tinggi fundus 40 cm atau lebih', 0, NULL, NULL),
(12, 'Gawat Janin', 0, NULL, NULL),
(13, 'Primi para dalam fase aktif, kepala masih 5/5', 0, NULL, NULL),
(14, 'Presentasi bukan belakang kepala', 0, NULL, NULL),
(15, 'Presentasi ganda (Majemuk)', 0, NULL, NULL),
(16, 'Kehamilan ganda atau gemeli', 0, NULL, NULL),
(17, 'Tali pusat menumbung', 0, NULL, NULL),
(18, 'Syok', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `nifas_obat`
--

CREATE TABLE `nifas_obat` (
  `id_obat` int(10) UNSIGNED NOT NULL,
  `id_layanan` int(10) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `harga_obat` decimal(8,0) NOT NULL,
  `total_harga_obat` decimal(8,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `id` int(10) UNSIGNED NOT NULL,
  `users_id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_obat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `merk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` decimal(8,0) NOT NULL,
  `catatan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_satuan` int(11) NOT NULL,
  `pcs` int(11) NOT NULL,
  `total_pcs` int(11) NOT NULL,
  `tanggal_kadaluarsa` date NOT NULL,
  `status_hapus` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat_layanan`
--

CREATE TABLE `obat_layanan` (
  `id_layanan` int(10) UNSIGNED NOT NULL,
  `id_obat` int(10) UNSIGNED NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `subtotal` double(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien_bayi`
--

CREATE TABLE `pasien_bayi` (
  `id` int(10) UNSIGNED NOT NULL,
  `users_id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelamin` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `bbl` double(8,2) NOT NULL,
  `cara_persalinan` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelurahan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asal_wilayah` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ayah` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ibu` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_hapus` tinyint(4) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien_dewasa`
--

CREATE TABLE `pasien_dewasa` (
  `no_regis` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelurahan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pekerjaan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pendidikan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buku_kia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_buku_kia` date DEFAULT NULL,
  `status_hapus` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_kehamilan`
--

CREATE TABLE `riwayat_kehamilan` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_layanan_ibu_hamil` int(10) UNSIGNED NOT NULL,
  `kehamilan_ke` int(11) NOT NULL,
  `komplikasi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `persalinan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_persalinan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `komplikasi_persalinan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `penolong` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `keadaan_bbl` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `keadaan_bbl_kelamin` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `keadaan_bbl_berat` double NOT NULL,
  `keadaan_anak_sekarang` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket_keadaan_anak_sekarang` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kb` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `asi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_hapus` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `suami_pasien_dewasa`
--

CREATE TABLE `suami_pasien_dewasa` (
  `id` int(10) UNSIGNED NOT NULL,
  `no_regis_pasien_dewasa` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelurahan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendidikan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nikah_ke` int(11) NOT NULL,
  `lama_nikah` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sebab_pisah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sebab_meninggal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_keterangan_sakit`
--

CREATE TABLE `surat_keterangan_sakit` (
  `id` int(11) NOT NULL,
  `users_id` int(10) UNSIGNED NOT NULL,
  `jumlah_hari` int(11) DEFAULT NULL,
  `tanggal_awal` date DEFAULT NULL,
  `tanggal_akhir` date DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_rujukan`
--

CREATE TABLE `surat_rujukan` (
  `id` int(11) NOT NULL,
  `kepala_puskesmas_id` int(10) UNSIGNED DEFAULT NULL,
  `tanggal_hari_ini` datetime DEFAULT NULL,
  `kepada` varchar(45) DEFAULT NULL,
  `nama_rs` varchar(100) DEFAULT NULL,
  `anamnese` varchar(225) DEFAULT NULL,
  `pemeriksaan` varchar(225) DEFAULT NULL,
  `perkiraan_diagnosa` varchar(225) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_layanan` int(10) UNSIGNED NOT NULL,
  `users_id` int(10) UNSIGNED NOT NULL,
  `jenis_layanan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_obat` decimal(8,0) NOT NULL,
  `harga_layanan` decimal(8,0) NOT NULL,
  `total_harga` decimal(8,0) NOT NULL,
  `tanggal` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_plain` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `tanggal_gabung` date DEFAULT NULL,
  `status_hapus` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nik`, `name`, `username`, `password`, `password_plain`, `alamat`, `telp`, `tanggal_lahir`, `tanggal_gabung`, `status_hapus`, `created_at`, `updated_at`) VALUES
(4, '123', 'Super Admin', 'superadmin', '$2y$10$3IWN1Cc6PaZnrH2s07u/UuyjkOQCDmoCkWWl23Vz50VKGCzIQWsbK', 'superadmin123', 'superadmin', '2131', '2023-05-28', '2023-06-23', 0, '2023-06-24 05:43:46', '2023-06-24 05:43:46'),
(5, '12312', 'admin', 'admin', '$2y$10$vHe6oe0Osga8A3xX0tz7mucaYlWr2sFgpsq3utONW3i55kuu8M1py', 'admin123', 'admin', '2131231', '2023-06-28', '2023-07-06', 0, '2023-06-24 05:44:12', '2023-06-24 05:44:12'),
(6, '123123123', 'Ferdi Sambo', 'sambo', '$2y$10$5otqXw2m7qhdyqt/UmwabO65NriAWS22yZ.5ORDS3zWYaEm8R9mOK', '12345678', 'Jl Penjara', '021312', '2023-06-12', '2023-06-19', 0, '2023-06-28 09:24:42', '2023-06-28 09:24:42');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `catatan_nifas`
--
ALTER TABLE `catatan_nifas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_catatan_nifas_catatan_persalinan1_idx` (`id_catatan_persalinan`),
  ADD KEY `fk_catatan_nifas_users1_idx` (`users_id`);

--
-- Indeks untuk tabel `catatan_persalinan`
--
ALTER TABLE `catatan_persalinan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_catatan_persalinan_layanan_ibu_hamil1_idx` (`id_layanan_ibu_hamil`),
  ADD KEY `fk_catatan_persalinan_users1_idx` (`users_id`);

--
-- Indeks untuk tabel `header_kspr`
--
ALTER TABLE `header_kspr`
  ADD PRIMARY KEY (`id`),
  ADD KEY `header_kspr_id_layanan_ibu_hamil_foreign` (`id_layanan_ibu_hamil`);

--
-- Indeks untuk tabel `header_lembar_observasi`
--
ALTER TABLE `header_lembar_observasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `header_penapisan`
--
ALTER TABLE `header_penapisan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_header_penapisan_layanan_ibu_hamil1_idx` (`id_layanan_ibu_hamil`);

--
-- Indeks untuk tabel `history_imunisasi`
--
ALTER TABLE `history_imunisasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_history_imunisasi_layanan_imunisasi1_idx` (`id_layanan_imunisasi`),
  ADD KEY `fk_history_imunisasi_pasien_bayi1_idx` (`pasien_bayi_id`),
  ADD KEY `fk_history_imunisasi_users1_idx` (`users_id`);

--
-- Indeks untuk tabel `history_kb`
--
ALTER TABLE `history_kb`
  ADD PRIMARY KEY (`id`),
  ADD KEY `history_kb_id_layanan_kb_foreign` (`id_layanan_kb`),
  ADD KEY `history_kb_id_jenis_layanan_foreign` (`id_jenis_layanan`);

--
-- Indeks untuk tabel `history_kspr`
--
ALTER TABLE `history_kspr`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_history_kspr_layanan_ibu_hamil1_idx` (`id_layanan_ibu_hamil`),
  ADD KEY `fk_history_kspr_master_kspr1_idx` (`master_kspr_id`);

--
-- Indeks untuk tabel `history_layanan_ibu_hamil`
--
ALTER TABLE `history_layanan_ibu_hamil`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_history_layanan_ibu_hamil_layanan_ibu_hamil1_idx` (`id_layanan_ibu_hamil`);

--
-- Indeks untuk tabel `history_lembar_observasi`
--
ALTER TABLE `history_lembar_observasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `history_lembar_observasi_id_lembar_observasi_foreign` (`id_lembar_observasi`),
  ADD KEY `fk_history_lembar_observasi_users1_idx` (`users_id`);

--
-- Indeks untuk tabel `history_penapisan`
--
ALTER TABLE `history_penapisan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_history_penapisan_layanan_ibu_hamil1_idx` (`id_layanan_ibu_hamil`),
  ADD KEY `fk_history_penapisan_master_penapisan1_idx` (`id_master_penapisan`);

--
-- Indeks untuk tabel `hist_ibu_hamil_obat`
--
ALTER TABLE `hist_ibu_hamil_obat`
  ADD KEY `hist_ibu_hamil_obat_id_history_ibu_hamil_foreign` (`id_history_ibu_hamil`),
  ADD KEY `hist_ibu_hamil_obat_id_obat_foreign` (`id_obat`);

--
-- Indeks untuk tabel `imunisasi_jenis_layanan`
--
ALTER TABLE `imunisasi_jenis_layanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_imunisasi_jenis_layanan_layanan_imunisasi1_idx` (`id_layanan_imunisasi`),
  ADD KEY `fk_imunisasi_jenis_layanan_layanan1_idx` (`id_jenis_layanan`);

--
-- Indeks untuk tabel `imunisasi_obat`
--
ALTER TABLE `imunisasi_obat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_imunisasi_obat_obat1_idx` (`id_obat`),
  ADD KEY `fk_imunisasi_obat_layanan1_idx` (`id_layanan`);

--
-- Indeks untuk tabel `kb_obat`
--
ALTER TABLE `kb_obat`
  ADD KEY `kb_obat_id_history_kb_foreign` (`id_history_kb`),
  ADD KEY `kb_obat_id_obat_foreign` (`id_obat`);

--
-- Indeks untuk tabel `kepala_puskesmas`
--
ALTER TABLE `kepala_puskesmas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `klinik_obat`
--
ALTER TABLE `klinik_obat`
  ADD PRIMARY KEY (`id_obat`,`id_layanan`),
  ADD KEY `fk_obat_has_layanan_layanan3_idx` (`id_layanan`),
  ADD KEY `fk_obat_has_layanan_obat3_idx` (`id_obat`);

--
-- Indeks untuk tabel `kunjungan_ibu_hamil_obat`
--
ALTER TABLE `kunjungan_ibu_hamil_obat`
  ADD PRIMARY KEY (`id_obat`,`id_layanan`),
  ADD KEY `fk_obat_has_layanan_layanan1_idx` (`id_layanan`),
  ADD KEY `fk_obat_has_layanan_obat1_idx` (`id_obat`);

--
-- Indeks untuk tabel `lampiran`
--
ALTER TABLE `lampiran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_lampiran_layanan1_idx` (`id_layanan`);

--
-- Indeks untuk tabel `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_layanan_users1_idx` (`users_id`);

--
-- Indeks untuk tabel `layanan_ibu_hamil`
--
ALTER TABLE `layanan_ibu_hamil`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_layanan_ibu_hamil_pasien_dewasa1_idx` (`no_regis_pasien_dewasa`),
  ADD KEY `fk_layanan_ibu_hamil_users1_idx` (`users_id`);

--
-- Indeks untuk tabel `layanan_imunisasi`
--
ALTER TABLE `layanan_imunisasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `layanan_kb`
--
ALTER TABLE `layanan_kb`
  ADD PRIMARY KEY (`id`),
  ADD KEY `layanan_kb_id_jenis_layanan_foreign` (`id_jenis_layanan`),
  ADD KEY `fk_layanan_kb_pasien_dewasa1_idx` (`no_regis_pasien_dewasa`),
  ADD KEY `fk_layanan_kb_users1_idx` (`users_id`);

--
-- Indeks untuk tabel `layanan_klinik`
--
ALTER TABLE `layanan_klinik`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_layanan_klinik_users1_idx` (`users_id`);

--
-- Indeks untuk tabel `master_kspr`
--
ALTER TABLE `master_kspr`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `master_penapisan`
--
ALTER TABLE `master_penapisan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nifas_obat`
--
ALTER TABLE `nifas_obat`
  ADD PRIMARY KEY (`id_obat`,`id_layanan`),
  ADD KEY `fk_obat_has_layanan_layanan2_idx` (`id_layanan`),
  ADD KEY `fk_obat_has_layanan_obat2_idx` (`id_obat`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_obat_users1_idx` (`users_id`);

--
-- Indeks untuk tabel `obat_layanan`
--
ALTER TABLE `obat_layanan`
  ADD PRIMARY KEY (`id_layanan`,`id_obat`),
  ADD KEY `fk_layanan_has_obat_obat1_idx` (`id_obat`),
  ADD KEY `fk_layanan_has_obat_layanan1_idx` (`id_layanan`);

--
-- Indeks untuk tabel `pasien_bayi`
--
ALTER TABLE `pasien_bayi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pasien_bayi_users1_idx` (`users_id`);

--
-- Indeks untuk tabel `pasien_dewasa`
--
ALTER TABLE `pasien_dewasa`
  ADD PRIMARY KEY (`no_regis`);

--
-- Indeks untuk tabel `riwayat_kehamilan`
--
ALTER TABLE `riwayat_kehamilan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_riwayat_kehamilan_layanan_ibu_hamil1_idx` (`id_layanan_ibu_hamil`);

--
-- Indeks untuk tabel `suami_pasien_dewasa`
--
ALTER TABLE `suami_pasien_dewasa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `suami_pasien_dewasa_id_pasien_dewasa_foreign` (`no_regis_pasien_dewasa`);

--
-- Indeks untuk tabel `surat_keterangan_sakit`
--
ALTER TABLE `surat_keterangan_sakit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_surat_keterangan_sakit_users1_idx` (`users_id`);

--
-- Indeks untuk tabel `surat_rujukan`
--
ALTER TABLE `surat_rujukan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_surat_rujukan_kepala_puskesmas1_idx` (`kepala_puskesmas_id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_transaksi_layanan1_idx` (`id_layanan`),
  ADD KEY `fk_transaksi_users1_idx` (`users_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `catatan_nifas`
--
ALTER TABLE `catatan_nifas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `catatan_persalinan`
--
ALTER TABLE `catatan_persalinan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `header_kspr`
--
ALTER TABLE `header_kspr`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `header_lembar_observasi`
--
ALTER TABLE `header_lembar_observasi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `header_penapisan`
--
ALTER TABLE `header_penapisan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `history_imunisasi`
--
ALTER TABLE `history_imunisasi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `history_kb`
--
ALTER TABLE `history_kb`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `history_kspr`
--
ALTER TABLE `history_kspr`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT untuk tabel `history_layanan_ibu_hamil`
--
ALTER TABLE `history_layanan_ibu_hamil`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `history_lembar_observasi`
--
ALTER TABLE `history_lembar_observasi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `history_penapisan`
--
ALTER TABLE `history_penapisan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `imunisasi_jenis_layanan`
--
ALTER TABLE `imunisasi_jenis_layanan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `imunisasi_obat`
--
ALTER TABLE `imunisasi_obat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `kepala_puskesmas`
--
ALTER TABLE `kepala_puskesmas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `lampiran`
--
ALTER TABLE `lampiran`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `layanan_ibu_hamil`
--
ALTER TABLE `layanan_ibu_hamil`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `layanan_imunisasi`
--
ALTER TABLE `layanan_imunisasi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `layanan_kb`
--
ALTER TABLE `layanan_kb`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `layanan_klinik`
--
ALTER TABLE `layanan_klinik`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `master_kspr`
--
ALTER TABLE `master_kspr`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT untuk tabel `master_penapisan`
--
ALTER TABLE `master_penapisan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `obat`
--
ALTER TABLE `obat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `pasien_bayi`
--
ALTER TABLE `pasien_bayi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `riwayat_kehamilan`
--
ALTER TABLE `riwayat_kehamilan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `suami_pasien_dewasa`
--
ALTER TABLE `suami_pasien_dewasa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `surat_keterangan_sakit`
--
ALTER TABLE `surat_keterangan_sakit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `surat_rujukan`
--
ALTER TABLE `surat_rujukan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `catatan_nifas`
--
ALTER TABLE `catatan_nifas`
  ADD CONSTRAINT `fk_catatan_nifas_catatan_persalinan1` FOREIGN KEY (`id_catatan_persalinan`) REFERENCES `catatan_persalinan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_catatan_nifas_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `catatan_persalinan`
--
ALTER TABLE `catatan_persalinan`
  ADD CONSTRAINT `fk_catatan_persalinan_layanan_ibu_hamil1` FOREIGN KEY (`id_layanan_ibu_hamil`) REFERENCES `layanan_ibu_hamil` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_catatan_persalinan_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `header_kspr`
--
ALTER TABLE `header_kspr`
  ADD CONSTRAINT `header_kspr_id_layanan_ibu_hamil_foreign` FOREIGN KEY (`id_layanan_ibu_hamil`) REFERENCES `layanan_ibu_hamil` (`id`);

--
-- Ketidakleluasaan untuk tabel `header_penapisan`
--
ALTER TABLE `header_penapisan`
  ADD CONSTRAINT `fk_header_penapisan_layanan_ibu_hamil1` FOREIGN KEY (`id_layanan_ibu_hamil`) REFERENCES `layanan_ibu_hamil` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `history_imunisasi`
--
ALTER TABLE `history_imunisasi`
  ADD CONSTRAINT `fk_history_imunisasi_layanan_imunisasi1` FOREIGN KEY (`id_layanan_imunisasi`) REFERENCES `layanan_imunisasi` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_history_imunisasi_pasien_bayi1` FOREIGN KEY (`pasien_bayi_id`) REFERENCES `pasien_bayi` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_history_imunisasi_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `history_kb`
--
ALTER TABLE `history_kb`
  ADD CONSTRAINT `history_kb_id_jenis_layanan_foreign` FOREIGN KEY (`id_jenis_layanan`) REFERENCES `layanan` (`id`),
  ADD CONSTRAINT `history_kb_id_layanan_kb_foreign` FOREIGN KEY (`id_layanan_kb`) REFERENCES `layanan_kb` (`id`);

--
-- Ketidakleluasaan untuk tabel `history_kspr`
--
ALTER TABLE `history_kspr`
  ADD CONSTRAINT `fk_history_kspr_layanan_ibu_hamil1` FOREIGN KEY (`id_layanan_ibu_hamil`) REFERENCES `layanan_ibu_hamil` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_history_kspr_master_kspr1` FOREIGN KEY (`master_kspr_id`) REFERENCES `master_kspr` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `history_layanan_ibu_hamil`
--
ALTER TABLE `history_layanan_ibu_hamil`
  ADD CONSTRAINT `fk_history_layanan_ibu_hamil_layanan_ibu_hamil1` FOREIGN KEY (`id_layanan_ibu_hamil`) REFERENCES `layanan_ibu_hamil` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `history_lembar_observasi`
--
ALTER TABLE `history_lembar_observasi`
  ADD CONSTRAINT `fk_history_lembar_observasi_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `history_lembar_observasi_id_lembar_observasi_foreign` FOREIGN KEY (`id_lembar_observasi`) REFERENCES `header_lembar_observasi` (`id`);

--
-- Ketidakleluasaan untuk tabel `history_penapisan`
--
ALTER TABLE `history_penapisan`
  ADD CONSTRAINT `fk_history_penapisan_layanan_ibu_hamil1` FOREIGN KEY (`id_layanan_ibu_hamil`) REFERENCES `layanan_ibu_hamil` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_history_penapisan_master_penapisan1` FOREIGN KEY (`id_master_penapisan`) REFERENCES `master_penapisan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `hist_ibu_hamil_obat`
--
ALTER TABLE `hist_ibu_hamil_obat`
  ADD CONSTRAINT `hist_ibu_hamil_obat_id_history_ibu_hamil_foreign` FOREIGN KEY (`id_history_ibu_hamil`) REFERENCES `history_layanan_ibu_hamil` (`id`),
  ADD CONSTRAINT `hist_ibu_hamil_obat_id_obat_foreign` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id`);

--
-- Ketidakleluasaan untuk tabel `imunisasi_jenis_layanan`
--
ALTER TABLE `imunisasi_jenis_layanan`
  ADD CONSTRAINT `fk_imunisasi_jenis_layanan_layanan1` FOREIGN KEY (`id_jenis_layanan`) REFERENCES `layanan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_imunisasi_jenis_layanan_layanan_imunisasi1` FOREIGN KEY (`id_layanan_imunisasi`) REFERENCES `layanan_imunisasi` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `imunisasi_obat`
--
ALTER TABLE `imunisasi_obat`
  ADD CONSTRAINT `fk_imunisasi_obat_layanan1` FOREIGN KEY (`id_layanan`) REFERENCES `layanan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_imunisasi_obat_obat1` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `kb_obat`
--
ALTER TABLE `kb_obat`
  ADD CONSTRAINT `kb_obat_id_history_kb_foreign` FOREIGN KEY (`id_history_kb`) REFERENCES `history_kb` (`id`),
  ADD CONSTRAINT `kb_obat_id_obat_foreign` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id`);

--
-- Ketidakleluasaan untuk tabel `klinik_obat`
--
ALTER TABLE `klinik_obat`
  ADD CONSTRAINT `fk_obat_has_layanan_obat3` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `kunjungan_ibu_hamil_obat`
--
ALTER TABLE `kunjungan_ibu_hamil_obat`
  ADD CONSTRAINT `fk_obat_has_layanan_layanan1` FOREIGN KEY (`id_layanan`) REFERENCES `layanan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_obat_has_layanan_obat1` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `layanan`
--
ALTER TABLE `layanan`
  ADD CONSTRAINT `fk_layanan_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `layanan_ibu_hamil`
--
ALTER TABLE `layanan_ibu_hamil`
  ADD CONSTRAINT `fk_layanan_ibu_hamil_pasien_dewasa1` FOREIGN KEY (`no_regis_pasien_dewasa`) REFERENCES `pasien_dewasa` (`no_regis`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_layanan_ibu_hamil_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `layanan_kb`
--
ALTER TABLE `layanan_kb`
  ADD CONSTRAINT `fk_layanan_kb_pasien_dewasa1` FOREIGN KEY (`no_regis_pasien_dewasa`) REFERENCES `pasien_dewasa` (`no_regis`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_layanan_kb_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `layanan_kb_id_jenis_layanan_foreign` FOREIGN KEY (`id_jenis_layanan`) REFERENCES `layanan` (`id`);

--
-- Ketidakleluasaan untuk tabel `layanan_klinik`
--
ALTER TABLE `layanan_klinik`
  ADD CONSTRAINT `fk_layanan_klinik_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `nifas_obat`
--
ALTER TABLE `nifas_obat`
  ADD CONSTRAINT `fk_obat_has_layanan_obat2` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD CONSTRAINT `fk_obat_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `obat_layanan`
--
ALTER TABLE `obat_layanan`
  ADD CONSTRAINT `fk_layanan_has_obat_obat1` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `pasien_bayi`
--
ALTER TABLE `pasien_bayi`
  ADD CONSTRAINT `fk_pasien_bayi_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `riwayat_kehamilan`
--
ALTER TABLE `riwayat_kehamilan`
  ADD CONSTRAINT `fk_riwayat_kehamilan_layanan_ibu_hamil1` FOREIGN KEY (`id_layanan_ibu_hamil`) REFERENCES `layanan_ibu_hamil` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `suami_pasien_dewasa`
--
ALTER TABLE `suami_pasien_dewasa`
  ADD CONSTRAINT `suami_pasien_dewasa_id_pasien_dewasa_foreign` FOREIGN KEY (`no_regis_pasien_dewasa`) REFERENCES `pasien_dewasa` (`no_regis`);

--
-- Ketidakleluasaan untuk tabel `surat_keterangan_sakit`
--
ALTER TABLE `surat_keterangan_sakit`
  ADD CONSTRAINT `fk_surat_keterangan_sakit_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `surat_rujukan`
--
ALTER TABLE `surat_rujukan`
  ADD CONSTRAINT `fk_surat_rujukan_kepala_puskesmas1` FOREIGN KEY (`kepala_puskesmas_id`) REFERENCES `kepala_puskesmas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fk_transaksi_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
