-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 20, 2021 at 03:20 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sft.project`
--

-- --------------------------------------------------------

--
-- Table structure for table `label`
--

CREATE TABLE `label` (
  `id` int(11) NOT NULL,
  `transaction_key_label` varchar(120) NOT NULL,
  `type` int(11) NOT NULL,
  `sender` text NOT NULL,
  `num_sender` double NOT NULL,
  `receiver` text NOT NULL,
  `num_receiver` double NOT NULL,
  `address_receiver` longtext NOT NULL,
  `courier` text NOT NULL,
  `order` longtext NOT NULL,
  `date` datetime NOT NULL,
  `date_int` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `label`
--

INSERT INTO `label` (`id`, `transaction_key_label`, `type`, `sender`, `num_sender`, `receiver`, `num_receiver`, `address_receiver`, `courier`, `order`, `date`, `date_int`) VALUES
(1, '0', 0, 'Aku', 8986182128, 'Kamu', 89887546532, 'd/a. Key\'s OOTD Jl.Polowijen II / 53-L RT.4 RW.4 Polowijen - Blimbing Malang Jawa Timur', 'JNE REG', '', '2021-01-01 00:00:00', 0),
(2, '0', 0, 'I', 86532215487, 'You', 86532215487, 'I will send u the word file and i hope u can make it into html or css format... will also send the liquid variable list from shopify', 'LION', '', '2021-12-13 00:00:00', 0),
(3, '0', 0, 'Yayan', 8986182128, 'Widya', 82295300504, 'perumahan raoseun house no 21 kec cibiru bandung 40615', 'JNE REG', '', '2021-02-20 16:41:52', 0),
(4, '0', 0, 'Razzan Clothes', 8986182128, 'Yama', 86524873216, 'perumahan Raousen House dllfdgdfgdfgdfgdfgdfgdfgdfg', 'SICEPAT', 'NGGAK ADA', '2021-02-20 17:19:50', 0),
(6, '0', 0, 'Sahabat Fillah', 82295300504, 'Abi yama', 82295300504, 'Kp. Cipondoh rt 05 rw 06 desa cinunuk kec. Cileunyi kab. Bandung', 'Ahsan', '1pcs ABC\r\n3pcs WCB\r\n', '2021-02-20 18:20:27', 0),
(7, '0', 0, 'Khansa.edutoys', 8974208665, 'Irma Febrina', 82328010422, 'Jl. Cendana Raya Blok d45, Perum Griya Sunya Ragi Permai, Kel. Karyamulya, Kec kesambi, Kota Cirebon  45134', 'JNE Reg', 'Pesanan: 1pcs Human Body', '2021-02-20 18:52:12', 0),
(8, '0', 0, 'Sahabat Fillah', 82295300504, 'Nur Yuli', 81228744014, 'Jl. Ikan Piranha Atas No.60 RT.03 RW. 01 Kel. Tunjungsekar Kec. Lowokwaru Kota Malang 65142', 'Lion landpack', '1 ABC\r\n2 JA', '2021-02-22 18:38:42', 0),
(9, '0', 0, 'Sahabat Fillah', 82295300504, 'Hafiah choerunisa', 82115639141, 'Yayasan miftahul hidayah 05 kp cipajaran RT 01/RW 08 desa cintaMulya kecamatan jatinangor kab sumedang', 'Ahsan', '1 WCB', '2021-02-23 08:59:48', 0),
(10, '0', 0, 'Siti', 85317876217, 'siska vera diningrat', 81211889152, 'Nama:\r\nAlamat: kp.pasir lanjung rt 02 rw 02 desa jagabaya kec.cimaung kab.bandung\r\nNo hp: ', 'Jne', '1pcs RP2KR', '2021-02-23 09:26:53', 0),
(11, '0', 0, 'Sahabat Fillah', 82295300504, 'Dede Lilih Barokah ', 85399893439, 'SMK AL-WAFA, Jl. Raya Ciwidey km 02 Haurkoneng RT. 01 RW. 23 desa Ciwidey kecamatan Ciwidey kabupaten Bandung ', 'Ahsan', '2pcs ABC', '2021-02-23 12:15:17', 0),
(12, '0', 0, 'Widya Pinandini', 82295300504, 'cille', 82112411402, 'JI. Agung permai 4 blok C5 No.4,sunter agung, jakut 14350, KOTA JAKARTA UTARA-TANJUNG PRIOK, DKI JAKARTA ID 14350', 'J&T', 'Jam tangan anak', '2021-02-23 12:21:43', 0),
(13, '0', 0, 'Sahabat Fillah', 82295300504, 'Apriyanti susanti', 81313960210, 'Komplek cilame permai jalan roket cc 19 rt 010 rw 019 cilame ngamprah bandung barat', 'Ahsan', '1pcs ABC', '2021-02-24 08:03:48', 0),
(14, '0', 0, 'Sahabat Fillah', 82295300504, 'Nurul Aulia', 85720417676, 'Jalan Pasir Jati No. 02, RT. 06/RW. 16 Desa Jati Endah, Kecamatan Cilengkrang, Kabupaten Bandung, 40616 (Rumah pertama belakang Masjid Al-Barokah)\r\n', 'Ahsan', '1pcs ARPM', '2021-02-28 09:45:10', 0),
(15, '0', 0, 'Khansa store', 8974208665, 'Iqbal', 81218046533, 'Jl. Caringin Gg. Porib III Rt 03 Rw 02 no. 56 Kec. Babakan Ciparay Bandung', 'Ahsan', '1pcs ARPM\r\n1pcs RPPKR', '2021-02-28 09:53:50', 0),
(16, '0', 0, 'Sahabat Fillah', 82295300504, 'Susantri A. S', 82216779630, 'd.a ibu satimah KP. Cihideung rt.03 RW. 14 no. 2 desa gudang kahuripan - Lembang 40391', 'Ahsan', '1pcs STT', '2021-02-28 10:16:23', 0),
(17, '0', 0, 'Susantri', 82216779630, 'Ahmad Fatoni (Toni)', 81327383460, 'Perum Bonana Permai Blok B.1 no. 02 RT 03 RW 04 Desa Suka asih Kec. Pasar Kemis  Tangerang 15560', 'Lion landpack', '1pcs ARPM', '2021-02-28 10:35:55', 0),
(18, '0', 0, 'Sahabat Fillah', 82124519707, 'Bunda Ghazwan  ', 81321525318, 'Jl. Kapten Abdul Hamid 82 a RT 03 RW 01 kelurahan Ledeng kecamatan Cidadap  Panorama Setiabudi Bandung', 'Ahsan', '1pcs ARPM', '2021-02-28 15:07:31', 0),
(19, '0', 0, 'Sahabat Fillah', 82295300504, 'siti nursilawati', 85317876217, 'kp. Cibolang rt.02 rw.08 desa cingcin kecamatan soreang kabupaten bandung', 'Jne', '2 pcs ARPM\r\n1 pcs siapa rabb mu', '2021-02-28 16:20:14', 0),
(20, '0', 0, 'Sahabat Fillah', 82295300504, 'siti nursilawati', 85317876217, 'kp. Cibolang rt.02 rw.08 desa cingcin kecamatan soreang kabupaten bandung', 'Jne', '2 pcs ARPM\r\n1 pcs siapa rabb mu', '2021-02-28 16:20:14', 0),
(21, '0', 0, 'Siti', 85317876217, 'lisna', 81313521780, 'jl pejuang 45,,no 4 Cigadung,Subang,Subang,Jawa barat(indo baja)', 'Lion landpack', '1 pcs ARPM', '2021-02-28 16:22:39', 0),
(22, '0', 0, 'Siti', 85317876217, 'Nenden Fitria Apriani', 85724254901, 'Jl. Raya Pangalengan KM 22 No. 648 Kp. Garduh Rt 01 Rw 01 Ds Jagabaya Kec Cimaung Kab Bandung', 'Jne', '1 pcs ARPM', '2021-02-28 16:24:27', 0),
(23, '0', 0, 'Siti', 85317876217, 'Rani tismawati', 81321436297, 'gading tutuka 1 blok c 3 no 4 cingcin Soreang Bandung 40911', 'Jne', '1 pcs RPPKR', '2021-02-28 16:26:24', 0),
(24, '0', 0, 'Sahabat Fillah', 82295300504, 'Umi Aisy / Mb Ela', 81381431415, ' Jl. Pembangunan Gg merpati no 76 Tanjungredep Berau Kalimantan Timur  (rumah ujung cat tosca)', 'Lion docupack', '5 ARPM\r\n1 RPPKR\r\n2 AP', '2021-02-28 19:02:56', 0),
(25, '0', 0, 'Sahabat Fillah', 82295300504, 'Indah', 82121153008, 'Mandala Bamboo Village 2 Cimenyan kec. Cimenyam Bandung', 'Ahsan', '1set piring\r\n4pcs nampan\r\n1pcs anti rain', '2021-02-28 19:13:54', 0),
(26, '0', 0, 'Umi Aisy', 81381431415, 'Fera', 82325753786, 'Jayantaka Mulia Persada\r\nPenggung, Tridadi, Kec. Sleman Kab. Sleman DIY 55285', 'Lion landpack', '4pcs Buku RPPKR', '2021-03-05 08:41:43', 0),
(27, '0', 0, 'Sahabat Fillah', 82295300504, 'Dewi Ayu Nurmalasari', 81211059379, 'Silahkan diisi format ordernya ya????\r\nPerumahan Griya Curug Blok A3 No.08 Rt.09 Kel.Rancagong Kec.Legok Kab.Tangerang\r\n', 'JNE OKE', 'Order : 2 ARPM, 1Jam Anak', '2021-03-06 08:04:32', 0),
(28, '0', 0, 'Sahabat Fillah', 82295300504, 'Siti Kasmila', 82121274944, 'Kp. Jati RT 05 RW 06, Rumah No. 74 samping Masjid Al-Muhyidin,\r\nKelurahan Pasirbiru, Kecamatan Cibiru, Kota Bandung, Jawa Barat 40615', 'Ahsan', '2 jam anak', '2021-03-06 08:09:57', 0),
(29, '0', 0, 'Sahabat Fillah', 82295300504, 'rizki veronikha (bidan assalam)', 81273758538, 'jl. Palembang jambi km 121 pondok pesantren assalam al-islamy desa sry gunung kec. Sungai lilin kab. Musi banyuasin', 'JTR', '10pcs Buku ARPM\r\n1pcs komik arbain', '2021-03-06 14:22:54', 0),
(30, '0', 0, 'Sahabat Fillah', 82295300504, 'Suci Rachmawati', 895375882027, 'Komplek Cluster PKJ Rancamanyar Blok B9 Desa Cupu Kelurahan Rancamanyar Kecamatan Baleendah 40375', 'Ahsan', 'Jam tangan anak', '2021-03-06 15:21:41', 0),
(31, '0', 0, 'Sahabat Fillah', 82295300504, 'Ninik Munfarikhah', 85234203522, 'Perumahan Graha semeru Blok A nomer 4 Jogotrunan Lumajang Jawa Timur', 'Lion landpack', '2 ARPM\r\n1 pintu keberkahan\r\n2 Jam Anak', '2021-03-09 10:41:02', 0),
(32, '0', 0, 'Susantri', 82216779630, 'Ahmad Fatoni', 81327383460, 'Perum Bonana Permai Blok B.1 no. 02 RT 03 RW 04 Desa Suka asih Kec. Pasar Kemis  Tangerang 15560', 'Lion landpack', '2pcs ARPM', '2021-03-13 07:30:11', 0),
(33, '0', 0, 'Susantri', 82216779630, 'Nia', 81991386282, 'Kp. Babakan Bandung \r\nDesa Rajamandala kulon\r\nRT. 05 Rw. 04 no. 17\r\nKec.Cipatat Kab. Bandung Barat 40754', 'Jne reg', '1pcs ARPM', '2021-03-13 08:14:50', 0),
(34, '0', 0, 'Sahabat Fillah', 82295300504, 'Icha', 87837484494, 'Jl. Waas A No. 9 Batununggal', 'Ahsan', '1pcs ARPM', '2021-03-18 09:49:14', 0),
(35, '0', 0, 'Sahabat Fillah', 82295300504, 'Ropah Nia Kurniati', 81321116308, 'perumahan parakanmuncang blok A5 No 50 Rt.02 Rw.14 Desa Cihanjuang Kec Cimanggung. Kabupaten Sumedang', 'JNE OKE', ' 1pcs MTT', '2021-03-18 09:55:51', 0),
(36, '0', 0, 'Sahabat Fillah', 82295300504, 'Asri Umi Fakhri', 82124519707, 'Eastern hill blok N4\r\nCipadung Cibiru Bandung', 'Tiketux', '2 celengan 1 buku', '2021-03-20 08:54:56', 0),
(37, '0', 0, 'Sahabat Fillah', 82295300504, 'Ibu Ana', 81345077744, 'jln. Abadi Gg. Berkah RT 009/002. Desa Mungguk kec. Sekadau hilir. Kab. Sekadau. Kalbar', 'JNE OKE/JTR', '5pcs Celengan Custom', '2021-03-20 08:57:29', 0),
(38, '0', 0, 'Razzan Clothes', 8986182128, 'Faiesal Andhini', 81414166212, 'Widya Citra Elok 3 (Widya Citra Elok 3 Blok F\r\nno.14), BANJAR BARU SELATAN, KOTA\r\nBANJARBARU, KALIMANTAN SELATAN', 'J&t resi JP1849449298', 'Gekkoscience 2pac', '2021-03-21 19:20:38', 0),
(39, '0', 0, 'Sahabat Fillah', 82295300504, 'Nimas Tiyasrufi', 82217828281, 'Perumahan Banjaran Indah Regency \r\nJalan Banjaran Indah Raya No. 28\r\nBanjaran - Kab. Bandung\r\n', 'Ahsan', '1 buku', '2021-03-23 10:46:03', 0),
(40, '0', 0, 'Sahabat Fillah', 82295300504, 'Ninik Munfarikhah', 85234203522, 'Perumahan Graha Semeru Blok A no.4 Kelurahan Jogotrunan Kec. Lumajang Kab. Lumajang Jawa Timur', 'Lion Regpack', 'Iqra\r\nSKJ&QJK\r\nTadabur', '2021-03-25 12:24:38', 0),
(41, '0', 0, 'Ninik Munfarikhah', 85234203522, 'None Sugianto', 81337207733, 'PT. Sinar Karunia Indah, up. none sugianto, jl. trengguli no. 100b, Denpasar. (Ancer2 dpn minimarket trengguli, selatan kantor pegadaian)', 'Lion Regpack', 'Buku yang dikirim ke alamat mba none:\r\n\r\n1. Eksplorasi matematika 1\r\n2. My first handbook 1\r\n3. Solusi anak bermasalah 1\r\n4. Agendaku roket 2', '2021-03-25 12:29:02', 0),
(42, '0', 0, 'Ninik Munfarikhah', 85234203522, 'Ibu Qori Rahmah', 89618791115, 'jl. Kayu tinggi (depan masjid al-mukhlisin) rt002/006 no. 37 kec. Cakung kel. Cakung timur \r\nJakarta Timur', 'Lion landpack', 'my first handbook Romadhon', '2021-03-25 12:33:47', 0),
(43, '0', 0, 'Sahabat Fillah', 82295300504, 'Dede Lilih Barokah ', 85399893439, 'SMK AL-WAFA, Jl. Raya Ciwidey km 02 Haurkoneng RT. 01 RW. 23 desa Ciwidey kecamatan Ciwidey kabupaten Bandung ', 'Tiketux', '7pcs kaos\r\n3pcs iqra\r\n1pcs abjad ', '2021-03-30 12:30:40', 0),
(44, '0', 0, 'Sahabat Fillah', 82295300504, 'Nur Yuli', 81228744014, 'Jl. Ikan Piranha Atas No.60 RT.03 RW. 01 Kel. Tunjungsekar Kec. Lowokwaru Kota Malang 65142', 'Lion landpack', '2 kaos', '2021-03-30 13:02:47', 0),
(45, '0', 0, 'Sahabat Fillah', 82295300504, 'Dewi Ayu Nurmalasari', 81211059379, 'Perumahan Griya Curug Blok A3 No.08 Rt.09 Kel.Rancagong Kec.Legok Kab.Tangerang', 'Lion landpack', '2 kaos', '2021-03-30 13:12:47', 0),
(46, '0', 0, 'Ninik Munfarikhah', 85234203522, 'Ibu Titis rahayu wilujeng', 85334375459, 'Rt 2 rw 6 \r\ndusun kedunggrombyang Desa kedungbendo\r\nKecamatan Arjosari\r\nKabupaten Pacitan \r\nJawa Timur', 'Lion landpack', '1pcs iqra', '2021-03-30 13:47:02', 0),
(47, '0', 0, 'Ninik Munfarikhah', 85234203522, 'None Sugianto', 81337207733, 'PT. Sinar Karunia Indah, up. none sugianto, jl. trengguli no. 100b, Denpasar. (Ancer2 dpn minimarket trengguli, selatan kantor pegadaian)', 'Lion Regpack', '2pcs kaos', '2021-03-30 13:50:56', 0),
(48, '0', 0, 'Sahabat Fillah', 82295300504, 'Nurul Aulia', 85720417676, 'Jalan Pasir Jati No. 02, RT. 06/RW. 16 Desa Jati Endah, Kecamatan Cilengkrang, Kabupaten Bandung, 40616 (Rumah pertama belakang Masjid Al-Barokah)', 'Tiketux', '2pcs Pizza', '2021-04-05 07:19:38', 0),
(49, '0', 0, 'Sahabat Fillah', 82295300504, 'Lilis', 8179233156, 'Jl. Kubangsari VII No. 16, RT. 04 RW. 06, Sekeloa, Coblong, Bandung 40134', 'Tiketux', '1pizza\r\n5puzzle', '2021-04-05 07:23:54', 0),
(50, '0', 0, 'Lilis', 8179233156, 'Ibu Rita Widiastuti', 81222000202, 'Jl. Tegallega No. 50 \r\nRT 01/01 Baranangsiang - Kota bogor (dekat mesjid al ikhlas)\r\n', 'PAXEL', 'Simply Cheese 1\r\nBeef Lasagna 1', '2021-04-05 08:49:13', 0),
(51, '0', 0, 'Sahabat Fillah', 82295300504, 'Bu elis', 85794734717, 'Perumahan easternhills Blok P2\r\nCipadung cibiru bandung', 'Ahsan', '1pcs buku', '2021-04-06 11:25:19', 0),
(52, '0', 0, 'Sahabat Fillah', 82295300504, 'Umi Aisy / Mb Ela', 81381431415, 'Jl. Pembangunan Gg merpati no 76 Tanjungredep Berau Kalimantan Timur  (rumah ujung cat tosca)', 'Lion docupack', '1pcs buku\r\n2 spidol', '2021-04-06 11:27:37', 0),
(53, '0', 0, 'Asri Ummu Rabbani', 82295300504, 'Yani Mulyani', 85624030485, 'komplek Gandasari Indah blok F 9 Rt 01/12 Kec Katapang kab. Bandung 40971', 'Tiketux', 'buku Tadabur Alquran  for kids juz 30', '2021-04-17 19:33:37', 0),
(54, '0', 0, 'Sahabat Fillah', 82295300504, 'Winda Istana Zuhair', 82217822844, 'Jalan sukagalih II No.27 RT 05 RW 09 Kel. Cipedes Kec. Sukagalih Bandung', 'Sahabat Kilat', '5pcs buku', '2021-04-19 08:15:07', 0),
(55, '0', 0, 'Sahabat Fillah', 82295300504, 'Novy Widya Agustin', 85157759598, 'Pelem Rt11/05 (Ma Emben Nasi Uduk) Desa Tirtasari Kec.Tirtamulya Kab.Karawang\r\n', 'Jne', 'Adya Phone Case Ivory ', '2021-04-19 16:22:58', 0),
(56, '0', 0, 'Sahabat Fillah', 82295300504, 'Teh azma', 81313286242, 'Komp.Permata Biru Blok Z.2 No 61 Rt 05 Rw 29 Kel.Cimekar Kec.Cileunyi Kab.Bandung\r\n\r\n', 'Ahsan', 'Playtime \r\nSandal', '2021-04-23 19:02:20', 0),
(57, '0', 0, 'Siti', 85317876217, 'Dena lestari ', 85624800642, 'perum cidura regency blok G4 no 5 RT 03 rw 22 desa tenjolaya ke? pasirjambu ', 'Tiketux', '1kg kurma ajwa', '2021-04-27 12:22:36', 0),
(58, '0', 0, 'Sahabat Fillah', 82295300504, 'Siti Latifah (Ibu Ifa)', 89653914382, 'Smk ppn lembang\r\nJl. Tangkuban parahu km 3 cibogo lembang kab. bandung barat\r\n', 'Tiketux', '1dus kurma sukari', '2021-04-28 08:57:27', 0),
(59, '0', 0, 'Sahabat Fillah', 82295300504, 'Winda Istana Zuhair', 82217822844, 'Jalan Sukagalih II no.27 rt 05 rw 09 kel. Cipedes kec. Sukajadi Bandung ', 'Ahsan', '1 tas', '2021-04-28 10:56:49', 0),
(60, '0', 0, 'Sahabat Fillah', 82295300504, 'Elsa Farian Sisilia', 81298018238, 'Link Cikerut Permai (Belakang SD Al Hanif) 007/004, Kel Karangasem, Kec Cibeber, Kota Cilegon, Banten 42425', 'JNE OKE', '1pcs golden age', '2021-04-29 02:08:09', 0),
(61, '0', 0, 'Sahabat Fillah', 82295300504, 'siti nursilawati', 85317876217, 'kp. Cibolang rt.02 rw.08 desa cingcin kecamatan soreang kabupaten bandung', 'JNE OKE', '1 kurma\r\n1 buku', '2021-04-29 02:11:33', 0),
(62, '0', 0, 'Widya Pinandini', 82295300504, 'Indriyani', 81224483911, 'Ds. Rancakole Rt.02/06. (Belakang Puskesmas Rancakole, dekat Masjid Agung Al-G0zali)\r\nKecamatan Arjasari Kabupaten Bandung 40379', 'Anteraja', 'Kurma Sukary 3kg', '2021-04-29 07:52:11', 0),
(63, '0', 0, 'Sahabat Fillah', 82295300504, 'Suci Rachmawati', 895375882027, 'Komplek Cluster PKJ Rancamanyar Blok B9 Kampung Cupu Desa Rancamanyar Kecamatan Baleendah Kabupaten Bandung', 'Tiketux', '1kg coklat\r\n500gr coklat kerikil\r\n500gr kismis', '2021-04-30 06:23:19', 0),
(64, '0', 0, 'Suci Rachmawati', 895375882027, 'fica/andre', 82120151411, 'Jl caringin gg lumbung 2 kavling 1 no 92-93 rt 02 rw 03 kel margahayu utara kec babakan ciparay bandung 40224', 'Tiketux', 'Coklat kerikil 1kg', '2021-04-30 06:25:38', 0),
(65, '0', 0, 'Ninik Munfarikhah', 85234203522, 'None Sugianto', 81337207733, 'PT. Sinar Karunia Indah\r\nJL. Trengguli no.100 B\r\nDenpasar Timur\r\n(Depan minimarket trengguli, selatan kantor pegadaian)', 'Lion Regpack', '1kg kacang\r\n1kg kurma', '2021-04-30 15:18:55', 0),
(66, '0', 0, 'Aa Yama', 82295300504, 'Opah Tuti Rusmiati', 85691823734, 'Desa tirtasari no. 39 rt 011 rw 05 kec. Tirtamulya kab. Karawang 41372', 'Lion landpack', 'Kurma', '2021-04-30 15:23:00', 0),
(67, '0', 0, 'Sahabat Fillah', 82295300504, 'Teti Nurhayati', 81299585141, 'Kinagara Regency Blok B No.17 (B17), Desa Lengkong, Kec. Bojongsoang Kab. Bandung, 40287', 'Tiketux', '1kg kacang arab', '2021-04-30 15:26:08', 0),
(68, '0', 0, 'Sahabat Fillah', 82295300504, 'Teti Nurhayati', 81299585141, 'Kinagara Regency Blok B No.17 (B17), Desa Lengkong, Kec. Bojongsoang Kab. Bandung, 40287', 'Tiketux', '1kg kacang arab', '2021-04-30 15:26:08', 0),
(69, '0', 0, 'Silvia Nurbaitul Intani', 82295300504, 'Intan Nurani Putri', 85715547034, 'Jl. Gebang Sari No. 100 C RT.001 RW. 03 Kel. Bambu Apus Kec. Cipayung Jakarta timur\r\n(Samping masjid Al Muchlisin)', 'JNE OKE', 'Adya Mustar', '2021-05-01 16:38:04', 0),
(70, '0', 0, 'Chocoyama', 8986182128, 'Adi Rudiana Saputra', 82118053008, 'Blok B, Rt001/Rw001 Mekar Jadi, Mekar Jadi, Sungai Lilin, Kabupaten Musi Banyuasin, Sumatera Selatan, 30755', 'JNE REG', 'Makanan', '2021-05-03 13:17:31', 0),
(71, '0', 0, 'Sahabat Fillah', 82295300504, 'Novy Widya Agustin', 85157759598, 'Pelem Rt11/05 (Ma Emben Nasi Uduk) Desa Tirtasari Kec.Tirtamulya Kab.Karawang', 'JNE OKE', 'Makanan', '2021-05-03 13:20:20', 0),
(72, '0', 0, 'Siti', 85317876217, 'Kiki nugraha', 82129108499, 'Kp.Bobojong Gang Geude Rt 03/007 Desa Bojong Manggu Kec.Pameungpeuk\r\n', 'Ahsan', '1kg kurma', '2021-05-03 22:24:06', 0),
(73, '0', 0, 'Bahagia Store', 8974659739, 'Indah ND', 82113472813, 'Taman cimanggu Blok O12 .jln puspa pesona gg.rasamala no 1\r\nKedung Waringin, Tanah Sereal\r\nKota Bogor\r\nJawa Barat 16164', 'PAXEL', 'COKLAT  TRAFFLE', '2021-05-03 22:27:58', 0),
(74, '0', 0, 'Widya Pinandini', 82295300504, 'Nadiya F.Hj', 85723657625, 'Ini alamatnya \r\nPURI NIRWANA 1 JL KALASAN IX BLOK TT NO 47 RT/RW 8/14 PABUARAN CIBINONG 16916', 'Jne', 'Makanan ringan', '2021-05-03 23:35:49', 0),
(75, '0', 0, 'Sahabat Fillah', 82295300504, 'Shinta Malida Balqis', 87821012189, 'JLN. KH. USMAN DHOMIRI NOMOR 111 RT.05 RW.019 KELURAHAN PADASUKA KECAMATAN CIMAHI TENGAH KOTA CIMAHI PROVINSI JAWA BARAT', 'Ahsan', 'Makanan ringan', '2021-05-04 01:35:35', 0),
(76, '0', 0, 'Widya Pinandini', 82295300504, 'rifa', 81380600131, 'komplek margahayu permai, jalan permai 2 me 90 rt 03 rw 10, kel.mekarrahayu kec.margaasih kab.bandung 40218', 'ahsan', 'Makanan ringan', '2021-05-04 07:15:42', 0),
(77, '0', 0, 'Sahabat Fillah', 82295300504, 'Regina Sintiya A', 85861223091, 'Jl. Soekarno Hatta Gg. Polisi Blok Ager Sari Rt/Rw 06/10 kel. Babakan kec. Babakan ciparay, 40222', 'Ahsan', '2pcs kutus kutus', '2021-05-04 21:48:11', 0),
(78, '0', 0, 'Ninik Munfarikhah', 85234203522, 'None Sugianto', 81337207733, 'Jl. Nuansa Hijau Utama xi.a No. 1\r\nTegal Kori Kaja Kelurahan Ubung Kaja Denpasar utara (80116)', 'Lion Regpack', '1kg almond', '2021-05-04 21:55:58', 0),
(79, '0', 0, 'Sahabat Fillah', 82295300504, 'neng desi (pak iwan)', 85317876217, 'kp. Cibolang rt.02 rw.08 desa cingcin kecamatan soreang kabupaten bandung\r\nHp. :', 'Jne reguler', '1kg almond', '2021-05-04 22:09:15', 0),
(80, '0', 0, 'Siti', 85317876217, 'Elvina Ayu Agustina', 85641438438, 'jln. Pancoran barat 4 B No 6 RT 010 RW 01 kel. Pancoran kec. Pancoran Jakarta selatan (warung pai)', 'JNE OKE', '500gr kacang pistachio', '2021-05-07 10:27:28', 0),
(81, '0', 0, 'Sahabat Fillah', 82295300504, 'Sampana Saputra', 859138436016, 'Jl. Karang Arum Kp. Legok Badak RT 03 RW 10 (Warung Bu Aan) Ds. Jatiendah Kec. Cilengkrang Kab. Bandung 40616\r\n', 'Paxel', '500gr kacang arab\r\n250gr kacang almond', '2021-05-08 07:55:01', 0),
(98, 'sft1621512470project', 1, 'yama', 8986182128, 'wiwid', 82295300504, 'raosen house', 'JNE REG', '', '0000-00-00 00:00:00', 1621512470),
(99, 'sft1621515896project', 1, 'yama', 8986182128, '', 0, '', '', '', '0000-00-00 00:00:00', 1621515896);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `pengguna_id` int(11) NOT NULL,
  `pengguna_nama` varchar(50) NOT NULL,
  `pengguna_email` varchar(255) NOT NULL,
  `pengguna_username` varchar(50) NOT NULL,
  `pengguna_password` varchar(255) NOT NULL,
  `pengguna_foto` varchar(50) NOT NULL DEFAULT 'user.png',
  `pengguna_level` enum('admin','penulis') NOT NULL,
  `pengguna_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`pengguna_id`, `pengguna_nama`, `pengguna_email`, `pengguna_username`, `pengguna_password`, `pengguna_foto`, `pengguna_level`, `pengguna_status`) VALUES
(1, 'System', 'maulana24@live.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'yama.jpg', 'admin', 1),
(2, 'User', 'email@email.com', 'email', 'email', 'user.png', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `nama_product` varchar(250) NOT NULL,
  `gambar_product` varchar(250) NOT NULL,
  `modal_product` int(11) NOT NULL,
  `jual_product` int(11) NOT NULL,
  `berat_product` int(11) NOT NULL,
  `due_date_product` int(250) NOT NULL,
  `date` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `nama_product`, `gambar_product`, `modal_product`, `jual_product`, `berat_product`, `due_date_product`, `date`) VALUES
(1, 'product test', '1619862691646.png', 20000, 30000, 250, 1621942130, 1621423772),
(20, 'Muhammad Alfaraz Ibn Yama', 'FB_IMG_1584417379463.jpg', 10000, 200000, 200, 1622534400, 1621497616),
(21, 'Teh Javana', 'WhatsApp_Image_2021-05-16_at_22_15_52.jpeg', 10000, 20000, 200, 1622282100, 1621504545),
(22, 'Iqro 1', 'FB_IMG_15844173794631.jpg', 10000, 20000, 150, 1621947780, 1621515848);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `transaction_key` varchar(120) NOT NULL,
  `item` int(120) NOT NULL,
  `amount` int(120) NOT NULL,
  `price` int(120) NOT NULL,
  `date` int(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `transaction_key`, `item`, `amount`, `price`, `date`) VALUES
(30, 'sft1621512470project', 21, 10, 200000, 1621512470),
(31, 'sft1621512470project', 20, 20, 4000000, 1621512470),
(32, 'sft1621512470project', 1, 30, 900000, 1621512470),
(33, 'sft1621515896project', 22, 2, 40000, 1621515896),
(34, 'sft1621515896project', 21, 3, 60000, 1621515896);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `label`
--
ALTER TABLE `label`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`pengguna_id`),
  ADD UNIQUE KEY `pengguna_username` (`pengguna_username`),
  ADD UNIQUE KEY `pengguna_email` (`pengguna_email`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `label`
--
ALTER TABLE `label`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `pengguna_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
