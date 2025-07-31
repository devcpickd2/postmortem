-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2025 at 05:57 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mortem`
--

-- --------------------------------------------------------

--
-- Table structure for table `defeat_evis`
--

CREATE TABLE `defeat_evis` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `shift` varchar(255) NOT NULL,
  `no_truck` varchar(255) NOT NULL,
  `time_start` time NOT NULL,
  `time_finish` time NOT NULL,
  `speed_defeat_setting` float NOT NULL,
  `speed_defeat_actual` int(11) NOT NULL,
  `speed_evis_setting` float NOT NULL,
  `speed_evis_actual` int(11) NOT NULL,
  `stunning_voltage` float NOT NULL,
  `stunning_ampere` float NOT NULL,
  `kondisi_ayam_stunning_hidup` int(11) NOT NULL,
  `kondisi_ayam_stunning_mati` int(11) NOT NULL,
  `bleeding_time` varchar(255) NOT NULL,
  `kondisi_ayam_slaugh_hidup` int(11) NOT NULL,
  `kondisi_ayam_slaugh_mati` int(11) NOT NULL,
  `hasil_sembelih_3_saluran` int(11) NOT NULL,
  `hasil_sembelih_tidak_terputus` int(11) NOT NULL,
  `atp` int(11) NOT NULL,
  `scalding_suhu_set_1` float NOT NULL,
  `scalding_suhu_set_2` float NOT NULL,
  `scalding_suhu_set_3` float NOT NULL,
  `scalding_suhu_show_1` float NOT NULL,
  `scalding_suhu_show_2` float NOT NULL,
  `scalding_suhu_show_3` float NOT NULL,
  `scalding_suhu_aktual_1` float NOT NULL,
  `scalding_suhu_aktual_2` float NOT NULL,
  `scalding_suhu_aktual_3` float NOT NULL,
  `scalding_time_1` varchar(255) NOT NULL,
  `scalding_time_2` varchar(255) NOT NULL,
  `scalding_time_3` varchar(255) NOT NULL,
  `bumble_foot_ringan` float NOT NULL,
  `bumble_foot_berat` float NOT NULL,
  `incomplete_mesin_plucker` float NOT NULL,
  `incomplete_inside_out_washing` float NOT NULL,
  `persentase_tembolok_berisi` float NOT NULL,
  `average_tembolok_berisi` float NOT NULL,
  `persentase_usus_pecah` float NOT NULL,
  `persentase_empedu_pecah` float NOT NULL,
  `persentase_incomplete_evisceration` varchar(255) NOT NULL,
  `inside_outside_washing` float NOT NULL,
  `nama_produksi` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `plant` varchar(255) NOT NULL,
  `status_produksi` varchar(255) NOT NULL,
  `catatan_produksi` varchar(255) NOT NULL,
  `tgl_update_produksi` datetime NOT NULL DEFAULT current_timestamp(),
  `nama_spv` varchar(255) NOT NULL,
  `status_spv` varchar(255) NOT NULL,
  `catatan_spv` varchar(255) NOT NULL,
  `tgl_update_spv` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `defeat_evis`
--

INSERT INTO `defeat_evis` (`id`, `uuid`, `username`, `date`, `shift`, `no_truck`, `time_start`, `time_finish`, `speed_defeat_setting`, `speed_defeat_actual`, `speed_evis_setting`, `speed_evis_actual`, `stunning_voltage`, `stunning_ampere`, `kondisi_ayam_stunning_hidup`, `kondisi_ayam_stunning_mati`, `bleeding_time`, `kondisi_ayam_slaugh_hidup`, `kondisi_ayam_slaugh_mati`, `hasil_sembelih_3_saluran`, `hasil_sembelih_tidak_terputus`, `atp`, `scalding_suhu_set_1`, `scalding_suhu_set_2`, `scalding_suhu_set_3`, `scalding_suhu_show_1`, `scalding_suhu_show_2`, `scalding_suhu_show_3`, `scalding_suhu_aktual_1`, `scalding_suhu_aktual_2`, `scalding_suhu_aktual_3`, `scalding_time_1`, `scalding_time_2`, `scalding_time_3`, `bumble_foot_ringan`, `bumble_foot_berat`, `incomplete_mesin_plucker`, `incomplete_inside_out_washing`, `persentase_tembolok_berisi`, `average_tembolok_berisi`, `persentase_usus_pecah`, `persentase_empedu_pecah`, `persentase_incomplete_evisceration`, `inside_outside_washing`, `nama_produksi`, `keterangan`, `plant`, `status_produksi`, `catatan_produksi`, `tgl_update_produksi`, `nama_spv`, `status_spv`, `catatan_spv`, `tgl_update_spv`, `created_at`, `modified_at`) VALUES
(11, 'f9306ad9-da2c-4e39-9a8a-7262401e7303', 'admin', '2025-07-30', '2', '1212', '17:19:00', '19:19:00', 43, 45, 43, 55, 9, 141, 12, 15, '3.20', 27, 1, 14, 21, 12, 56, 34, 12, 23.4, 40.8, 60.8, 12, 23, 60.2, '1', '12', '17', 1, 2, 3, 4, 22, 2, 0, 43, '23', 3, '', '', '87042b6c-f2e0-436e-89f4-f139bd5781d0', '1', '', '2025-07-30 15:20:46', 'admin', '1', '', '2025-07-30 15:59:38', '2025-07-30 15:20:46', '2025-07-30 15:21:10');

-- --------------------------------------------------------

--
-- Table structure for table `departemen`
--

CREATE TABLE `departemen` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `user_uuid` varchar(255) NOT NULL,
  `departemen` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departemen`
--

INSERT INTO `departemen` (`id`, `uuid`, `user_uuid`, `departemen`, `created_at`, `modified_at`) VALUES
(1, '66c8b282-9c49-40d3-85a0-257edc2160b6', '000', 'PDQC', '2024-02-28 09:48:40', '2024-02-28 09:48:40'),
(2, '73e68eee-2615-4557-9e1a-6b6371c35ccd', '000', 'Engineering', '2024-02-28 09:48:46', '2024-02-28 09:48:46'),
(3, 'e2c64036-b3c0-4121-b0bf-48910cf2cd98', '000', 'Finance', '2024-02-28 09:48:53', '2024-02-28 09:48:53'),
(4, 'ee68310c-ea16-4a7b-bde7-d38fe5c4c47d', '000', 'PGA', '2024-02-28 09:49:02', '2024-02-28 09:49:02'),
(5, 'c6d788ee-9bc4-4441-9722-5127eb3111d8', '000', 'PPIC', '2024-02-28 09:49:06', '2024-02-28 09:49:06'),
(6, '3622efc5-b2f8-4370-acb0-4833617fa0af', '000', 'Produksi', '2024-02-28 09:49:17', '2024-02-28 09:49:17'),
(7, 'a69f6469-8389-4d8b-806f-b6d5d4591560', '000', 'Warehouse', '2024-02-28 09:49:22', '2024-02-28 09:49:22');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `plant` varchar(255) NOT NULL,
  `departemen` varchar(255) NOT NULL,
  `tipe_user` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `updater` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `uuid`, `nama`, `username`, `password`, `email`, `plant`, `departemen`, `tipe_user`, `foto`, `updater`, `created_at`, `modified_at`) VALUES
(1, 'c8f6b7df-8bf8-4152-8bec-48b43418611c', 'Putri Harnis', 'harnis', '$2y$10$aBaKYwziC3AzQDJ2gweB0eK/1GFXbxDMTDwHv6tl2aZXoOXiQdqMy', 'putri.harnis@cp.co.id', '651ac623-5e48-44cc-b2f6-5d622603f53c', '66c8b282-9c49-40d3-85a0-257edc2160b6', '4', 'foto_1751446055.jpg', 'admin', '2024-02-28 09:51:31', '2025-07-02 16:05:50'),
(11, '0bd19b0f-d62c-444f-9862-cd3381dfef80', 'Admin', 'admin', '$2y$10$DWxZDzzIAFhzhQ3nWMPMyuVjbcIj.3BziDdZBjCo6qhMforiRDDpy', 'putri.harnis@cp.co.id', '651ac623-5e48-44cc-b2f6-5d622603f53c', '66c8b282-9c49-40d3-85a0-257edc2160b6', '0', 'foto_1751446086.jpg', 'admin', '2025-06-05 11:05:01', '2025-07-31 10:55:28'),
(26, '9b3509d9-2dc7-4a01-9b50-e7032661b647', 'Foreman Produksi Kebumen', 'foreman_kbmn', '$2y$10$/XwqN1VyLKL28jVRZA9a3OBqAbpxXLHLlSRgvIQFiB4sqw0alr7TO', '', '87042b6c-f2e0-436e-89f4-f139bd5781d0', '66c8b282-9c49-40d3-85a0-257edc2160b6', '3', '', '', '2025-07-31 09:55:10', '2025-07-31 09:55:10'),
(27, '05d91264-b3fb-47db-995d-535fb4817dbb', 'Admin Kebumen', 'admin.kebumen', '$2y$10$GdSW/7r4sGSIEdPZ./DSSOVtcWaLh0Tg9LdrYaDCO.KyAnw.EFwNC', '', '87042b6c-f2e0-436e-89f4-f139bd5781d0', '66c8b282-9c49-40d3-85a0-257edc2160b6', '0', '', '', '2025-07-31 10:55:20', '2025-07-31 10:55:20'),
(28, '02e9a548-0c79-4dfe-874e-488edcbdb70c', 'Foreman Produksi Cikande', 'foreman_ckd', '$2y$10$86jkJ8BrcGh9JzqpgwBI7.xUNsAsnh5nCvMLtr1f3od1sUsWjTSK6', '', '651ac623-5e48-44cc-b2f6-5d622603f53c', '66c8b282-9c49-40d3-85a0-257edc2160b6', '3', '', '', '2025-07-31 10:56:39', '2025-07-31 10:56:39');

-- --------------------------------------------------------

--
-- Table structure for table `plant`
--

CREATE TABLE `plant` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `user_uuid` varchar(255) NOT NULL,
  `plant` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plant`
--

INSERT INTO `plant` (`id`, `uuid`, `user_uuid`, `plant`, `created_at`, `modified_at`) VALUES
(5, '651ac623-5e48-44cc-b2f6-5d622603f53c', 'harnis', 'CPI Cikande', '2024-11-13 15:34:48', '2025-07-30 09:44:21'),
(10, '87042b6c-f2e0-436e-89f4-f139bd5781d0', 'harnis', 'CPI Kebumen', '2025-07-30 09:44:03', '2025-07-30 09:44:03');

-- --------------------------------------------------------

--
-- Table structure for table `post_mortem`
--

CREATE TABLE `post_mortem` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `nama_farm` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `shift` varchar(255) NOT NULL,
  `nomor_truk` varchar(255) NOT NULL,
  `nopol_truk` varchar(255) NOT NULL,
  `ch_oh` varchar(255) NOT NULL,
  `waktu_kedatangan` time NOT NULL,
  `jumlah_ayam` float NOT NULL,
  `average_farm` float NOT NULL,
  `average_rpa` float NOT NULL,
  `ekspedisi` varchar(255) NOT NULL,
  `nama_mesin` varchar(255) NOT NULL,
  `sayap_memar_kebiruan_defect` float NOT NULL,
  `sayap_memar_kebiruan_persen` float NOT NULL,
  `sayap_patah_memar_defect` float NOT NULL,
  `sayap_patah_memar_persen` float NOT NULL,
  `kaki_arthritis_defect` float NOT NULL,
  `kaki_arthritis_persen` float NOT NULL,
  `hock_bruise_defect` float NOT NULL,
  `hock_bruise_persen` float NOT NULL,
  `hock_burn_defect` float NOT NULL,
  `hock_burn_persen` float NOT NULL,
  `dada_memar_defect` float NOT NULL,
  `dada_memar_persen` float NOT NULL,
  `breast_burn_defect` float NOT NULL,
  `breast_burn_persen` float NOT NULL,
  `punggung_memar_defect` float NOT NULL,
  `punggung_memar_persen` float NOT NULL,
  `kaki_patah_defect` float NOT NULL,
  `kaki_patah_persen` float NOT NULL,
  `kaki_memar_defect` float NOT NULL,
  `kaki_memar_persen` float NOT NULL,
  `penyakit_kulit_defect` float NOT NULL,
  `penyakit_kulit_persen` float NOT NULL,
  `luka_parut_defect` float NOT NULL,
  `luka_parut_persen` float NOT NULL,
  `kulit_berjamur_defect` float NOT NULL,
  `kulit_berjamur_persen` float NOT NULL,
  `kulit_daging_bintik_defect` float NOT NULL,
  `kulit_daging_bintik_persen` float NOT NULL,
  `pertumbuhan_tidak_normal_defect` float NOT NULL,
  `pertumbuhan_tidak_normal_persen` float NOT NULL,
  `sayap_memar_kebiruan_defect_lebih` float NOT NULL,
  `sayap_patah_memar_defect_lebih` float NOT NULL,
  `kaki_memar_kebiruan_defect_lebih` float NOT NULL,
  `kaki_patah_memar_defect_lebih` float NOT NULL,
  `arthritis_defect_lebih` float NOT NULL,
  `hock_bruise_defect_lebih` float NOT NULL,
  `hock_burn_defect_lebih` float NOT NULL,
  `dada_memar_kebiruan_defect_lebih` float NOT NULL,
  `breast_burn_defect_lebih` float NOT NULL,
  `punggung_memar_kebiruan_defect_lebih` float NOT NULL,
  `luka_parut_defect_lebih` float NOT NULL,
  `kulit_berjamur_defect_lebih` float NOT NULL,
  `penyakit_bisul_defect_lebih` float NOT NULL,
  `kulit_bintik_merah_defect_lebih` float NOT NULL,
  `pertumbuhan_tidak_normal_defect_lebih` float NOT NULL,
  `jumlah_defect_d` float NOT NULL,
  `hati_tidak_normal_defect` float NOT NULL,
  `hati_tidak_normal_persen` float NOT NULL,
  `jantung_tidak_normal_defect` float NOT NULL,
  `jantung_tidak_normal_persen` float NOT NULL,
  `organ_dalam_tidak_normal_defect` float NOT NULL,
  `organ_dalam_tidak_normal_persen` float NOT NULL,
  `sub_total_farm_defect` float NOT NULL,
  `sub_total_farm_persen` float NOT NULL,
  `sub_total_ordal_farm_defect` float NOT NULL,
  `sub_total_ordal_farm_persen` float NOT NULL,
  `sg_sayap_memar_defect` float NOT NULL,
  `sg_sayap_memar_persen` float NOT NULL,
  `sg_kaki_memar_defect` float NOT NULL,
  `sg_kaki_memar_persen` float NOT NULL,
  `sg_dada_memar_defect` float NOT NULL,
  `sg_dada_memar_persen` float NOT NULL,
  `sg_punggung_memar_defect` float NOT NULL,
  `sg_punggung_memar_persen` float NOT NULL,
  `sg_sayap_memar_kemerahan_defect_lebih` float NOT NULL,
  `sg_kaki_memar_kemerahan_defect_lebih` float NOT NULL,
  `sg_dada_memar_kemerahan_defect_lebih` float NOT NULL,
  `sg_punggung_memar_kemerahan_defect_lebih` float NOT NULL,
  `jumlah_defect_e` float NOT NULL,
  `sub_total_sg_defect` float NOT NULL,
  `sub_total_sg_persen` float NOT NULL,
  `rpa_over_scalder_defect` float NOT NULL,
  `rpa_over_scalder_persen` float NOT NULL,
  `rpa_sayap_patah_defect` float NOT NULL,
  `rpa_sayap_patah_persen` float NOT NULL,
  `rpa_kaki_patah_defect` float NOT NULL,
  `rpa_kaki_patah_persen` float NOT NULL,
  `rpa_kulit_sobek_dp_defect` float NOT NULL,
  `rpa_kulit_sobek_dp_persen` float NOT NULL,
  `rpa_kulit_sobek_dada_defect` float NOT NULL,
  `rpa_kulit_sobek_dada_persen` float NOT NULL,
  `rpa_kulit_sobek_paha_defect` float NOT NULL,
  `rpa_kulit_sobek_paha_persen` float NOT NULL,
  `rpa_karkas_rusak_defect` float NOT NULL,
  `rpa_karkas_rusak_persen` float NOT NULL,
  `rpa_empedu_pecah_defect` float NOT NULL,
  `rpa_empedu_pecah_persen` float NOT NULL,
  `rpa_daging_dada_bawah_cut_defect` float NOT NULL,
  `rpa_daging_dada_bawah_cut_persen` float NOT NULL,
  `rpa_daging_dada_atas_cut_defect` float NOT NULL,
  `rpa_daging_dada_atas_cut_persen` float NOT NULL,
  `rpa_kaki_terpotong_defect` float NOT NULL,
  `rpa_kaki_terpotong_persen` float NOT NULL,
  `rpa_over_scalder_defect_lebih` float NOT NULL,
  `rpa_sayap_patah_defect_lebih` float NOT NULL,
  `rpa_kaki_patah_defect_lebih` float NOT NULL,
  `rpa_kulit_sobek_dp_defect_lebih` float NOT NULL,
  `rpa_kulit_sobek_dada_defect_lebih` float NOT NULL,
  `rpa_kulit_sobek_paha_defect_lebih` float NOT NULL,
  `rpa_karkas_rusak_defect_lebih` float NOT NULL,
  `rpa_empedu_pecah_defect_lebih` float NOT NULL,
  `rpa_daging_dada_bawah_defect_lebih` float NOT NULL,
  `rpa_daging_dada_atas_defect_lebih` float NOT NULL,
  `rpa_kaki_terpotong_defect_lebih` float NOT NULL,
  `jumlah_defect_f` float NOT NULL,
  `sub_total_rpa_defect` float NOT NULL,
  `sub_total_rpa_persen` float NOT NULL,
  `ip_hati_hancur_ringan_defect` float NOT NULL,
  `ip_hati_hancur_ringan_persen` float NOT NULL,
  `ip_hati_hancur_berat_defect` float NOT NULL,
  `ip_hati_hancur_berat_persen` float NOT NULL,
  `ip_hati_hancur_ringan_defect_lebih` float NOT NULL,
  `ip_hati_hancur_berat_defect_lebih` float NOT NULL,
  `jumlah_defect_g` float NOT NULL,
  `sub_total_ip_defect` float NOT NULL,
  `sub_total_ip_persen` float NOT NULL,
  `ayam_defect_lebih_dari_satu` float NOT NULL,
  `ayam_defect_lebih_dari_satu_persen` float NOT NULL,
  `total_defect` float NOT NULL,
  `total_persen` float NOT NULL,
  `total_ayam_defect` float NOT NULL,
  `total_ayam_defect_persen` float NOT NULL,
  `total_defect_ayam_lebih` float NOT NULL,
  `total_defect_ayam_lebih_persen` float NOT NULL,
  `plant` varchar(255) NOT NULL,
  `nama_produksi` varchar(255) NOT NULL,
  `status_produksi` varchar(255) NOT NULL,
  `catatan_produksi` varchar(255) NOT NULL,
  `tgl_update_produksi` datetime NOT NULL DEFAULT current_timestamp(),
  `nama_spv` varchar(255) NOT NULL,
  `status_spv` varchar(255) NOT NULL,
  `catatan_spv` varchar(255) NOT NULL,
  `tgl_update_spv` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `defeat_evis`
--
ALTER TABLE `defeat_evis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departemen`
--
ALTER TABLE `departemen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plant`
--
ALTER TABLE `plant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_mortem`
--
ALTER TABLE `post_mortem`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `defeat_evis`
--
ALTER TABLE `defeat_evis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `departemen`
--
ALTER TABLE `departemen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `plant`
--
ALTER TABLE `plant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `post_mortem`
--
ALTER TABLE `post_mortem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
