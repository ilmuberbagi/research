-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2016 at 05:57 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `research`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(11) NOT NULL,
  `department_name` varchar(50) NOT NULL,
  `sort` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_name`, `sort`) VALUES
(1, 'Teknik Mesin', 0),
(2, 'Teknik Sipil', 0),
(3, 'Teknik Industri', 0),
(4, 'Teknik Elektro', 0),
(5, 'Teknik Kimia', 0),
(6, 'Teknik Metalurgi dan Material', 0),
(7, 'Teknik Arsitektur', 0);

-- --------------------------------------------------------

--
-- Table structure for table `grants`
--

CREATE TABLE `grants` (
  `grant_id` varchar(30) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `department_id` int(11) DEFAULT NULL,
  `main_researcher` varchar(100) NOT NULL,
  `member_researcher` varchar(255) DEFAULT NULL,
  `research_title` varchar(255) NOT NULL,
  `contract_number` varchar(100) DEFAULT NULL,
  `grant_year` int(4) NOT NULL,
  `st_year` tinyint(1) DEFAULT '0',
  `st_submision` tinyint(1) DEFAULT '0',
  `st_granted` tinyint(1) DEFAULT '0',
  `selection` varchar(200) DEFAULT NULL,
  `site` varchar(200) DEFAULT NULL,
  `publish` tinyint(1) NOT NULL DEFAULT '0',
  `date_input` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grants`
--

INSERT INTO `grants` (`grant_id`, `user_id`, `department_id`, `main_researcher`, `member_researcher`, `research_title`, `contract_number`, `grant_year`, `st_year`, `st_submision`, `st_granted`, `selection`, `site`, `publish`, `date_input`, `date_update`) VALUES
('2016082800403931', 'returns2', 4, 'Sabbana Azmi', 'Steva, colin, suratman', 'Penelitian yang ditujukan untuk serius dan nggak main-main', '898090/BT/78', 2015, NULL, 0, 1, 'Nama Seleksi', 'http://www.facebook.com', 0, '2016-08-28 00:40:39', '2016-08-28 00:50:15'),
('2016082809253356', 'returns2', 4, 'Sabbana Azmi', 'Steva, colin, suratman', 'Penelitian yang ditujukan untuk serius dan nggak main-main', '898090/BT/78', 2015, 1, 0, 1, 'Nama Seleksi', 'http://www.facebook.com', 0, '2016-08-28 09:25:33', '2016-08-28 09:25:33');

-- --------------------------------------------------------

--
-- Table structure for table `grants_detail`
--

CREATE TABLE `grants_detail` (
  `grant_id` varchar(30) NOT NULL,
  `sd_riset` tinyint(1) DEFAULT '0',
  `sd_hibah` varchar(100) DEFAULT NULL,
  `sd_skema_hibah` varchar(100) DEFAULT NULL,
  `sd_source` varchar(30) DEFAULT NULL,
  `total_proposed` int(11) DEFAULT NULL,
  `total_approved` int(11) DEFAULT NULL,
  `year_1` int(11) DEFAULT NULL,
  `year_2` int(11) DEFAULT NULL,
  `year_3` int(11) DEFAULT NULL,
  `report_progress` tinyint(1) DEFAULT '0',
  `last_report` tinyint(1) DEFAULT '0',
  `sp` varchar(100) DEFAULT NULL,
  `description` text,
  `mitra_name` varchar(200) NOT NULL,
  `mitra_institusion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grants_detail`
--

INSERT INTO `grants_detail` (`grant_id`, `sd_riset`, `sd_hibah`, `sd_skema_hibah`, `sd_source`, `total_proposed`, `total_approved`, `year_1`, `year_2`, `year_3`, `report_progress`, `last_report`, `sp`, `description`, `mitra_name`, `mitra_institusion`) VALUES
('2016082800403931', 0, 'Nama Hibah', 'Nama Skema Hibah ', 'UI', 1000000, 1000000, 100000, 600000, 300000, 1, 1, '', 'Keteragan Tambahan', 'Sabbaa', 'Kompas'),
('2016082809253356', 1, 'Nama Hibah', 'Nama Skema Hibah ', 'UI', 1000000, 1000000, 100000, 600000, 300000, 0, 0, '', 'Keteragan Tambahan', 'Sabbaa', 'Kompas');

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE `information` (
  `id` int(11) NOT NULL DEFAULT '1',
  `about` text NOT NULL,
  `vision` text NOT NULL,
  `mission` text NOT NULL,
  `structure` text NOT NULL,
  `service` text NOT NULL,
  `contact` text NOT NULL,
  `research_centers` text NOT NULL,
  `research_groups` text NOT NULL,
  `researchers` text NOT NULL,
  `statistics` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`id`, `about`, `vision`, `mission`, `structure`, `service`, `contact`, `research_centers`, `research_groups`, `researchers`, `statistics`, `user_id`, `last_updated`) VALUES
(1, '<p>Mengacu pada kebijakan umum arah pengembangan UI, rencana pembangunan UI jangka panjang 2015-2035 dengan memperhatikan tantangan global, capaian Renstra UI tahun 2007-2012, dan laporan tahunan UI pada masa transisi 2012-2014 serta analisa kesenjangan saat ini maka Visi UI pada periode 2015-2019 adalah:</p>\r\n<p><strong><em>“Mewujudkan Universitas Indonesia yang unggul dalam bidang ilmu pengetahuan, teknologi dan kebudayaan sebagai solusi masalah nasional dan global”</em></strong></p>\r\n<p>FTUI turut berperan aktif dalam mewujudkan visi dan misi UI  menjadi universitas riset kelas dunia melalui rencana aksi FTUI 2013-2017 yang merujuk pada rencana strategis Universitas Indonesia 2012-2017, mengimplementasikannya dalam bentuk program-program kerja yang dituangkan dalam Rencana Kegiatan dan Anggaran (RKA) & Rencana Kerja Tahunan (RKT) FTUI yang terintegrasi dengan RKA & RKT Universitas Indonesia.</p>\r\n<p><strong>VISI FTUI 2013-2017</strong></p>\r\n<p><strong><em>“Menjadi Fakultas Teknik terbaik, yang diakui secara lokal, nasional, dan internasional untuk prestasinya”</em></strong></p>\r\n<p><strong>MISI FTUI 2013-2017</strong></p>\r\n<ol>\r\n<li><em>Menyelenggarakan kegiatan pendidikan dan pengajaran untuk memajukan sains dan teknologi agar dapat bermanfaat bagi Bangsa dan Negara dengan mutu yang sesuai standar Nasional dan Internasional,</em></li>\r\n<li><em>Menyelenggarakan riset untuk pengembangan ilmu, sains dan teknologi sehingga menghasilkan karya riset yang dapat dipublikasikan di tingkat Nasional dan Internasional serta bermanfaat bagi Bangsa dan Negara,</em></li>\r\n<li><em>Meyelenggarakan kegiatan pengabdian masyarakat dan ventura yang terpercaya  khususnya untuk masyarakat industri dan untuk menyelesaikan masalah Global Challenges for Humanity berupa pembangunan berkelanjutan, pengentasan kemiskinan dan lingkungan bersih</em></li>\r\n<li><em>Mempersiapkan sarjana berwawasan global</em></li>\r\n<li><em>Membangun dan menumbuhkembangkan jiwa kewirausahaan / enterpreneur berbasis teknologi dan inovasi industri</em></li>\r\n</ol>\r\n<p> </p>\r\n<p><strong>STRUKTUR ORGANISASI </strong></p>\r\n<p>Dekan Fakultas Teknik Universitas Indonesia</p>\r\n<p>Wakil Dekan Bidang Akademik, Penelitian dan Kemahasiswaan</p>\r\n<p>Manajer Unit Riset dan Pengabdian Masyarakat</p>\r\n<p>Staf Khusus Publikasi FTUI</p>\r\n<p>Asisten Manajer Riset dan Pengabdian</p>\r\n<p>Sekretaris Unit RPM FTUI</p>', '', '', '', '<p>Layanan Program Pengabdian masyarakat</p>', '<p>Email : risetft[at]eng.ui.ac.id</p>\r\n<p>Alamat : Jalan Salemba UI Depok</p>', '<p>RC</p>', '<p>RG</p>', '<p>RL</p>', '<p><strong>Data and Statistics</strong></p>\r\n<p><strong>Goes to here</strong></p>', 2, '2016-08-18 06:44:25');

-- --------------------------------------------------------

--
-- Table structure for table `mitra`
--

CREATE TABLE `mitra` (
  `mitra_id` int(11) DEFAULT NULL,
  `grant_id` varchar(30) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `institute` varchar(100) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=> news, 2=>seminars, 3=>grant and insentives',
  `user_id` int(11) NOT NULL,
  `thumbnail_url` text,
  `news_title` varchar(100) NOT NULL,
  `news_content` text NOT NULL,
  `date_posted` date NOT NULL,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(2) NOT NULL,
  `hit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `type`, `user_id`, `thumbnail_url`, `news_title`, `news_content`, `date_posted`, `last_updated`, `status`, `hit`) VALUES
(6, 3, 999999, 'http://localhost/ibf/research/uploads/images/construction.jpg', 'Selamat datang di Website Unit Riset dan Pengabdian Masyarakat FTUI', '<p>Dalam rangka memudahkan akses informasi terkait kesempatan dan peluang riset, serta meningkatkan diseminasi hasil-hasil riset para peneliti/dosen FTUI, Unit Riset dan Pengabdian Masyarakat (RPM FTUI) meluncurkan website dan sistem informasi riset ini. Website ini akan menjadi antarmuka (interface) antara manajemen dengan para pemangku kepentingan termasuk para dosen/peneliti FTUI maupun masyarakat umum yang mengakses informasi pada media ini.</p>\r\n<p>Selamat memanfaatkan informasi yang tersedia dalam website ini.</p>\r\n<p>Admnistrator.</p>', '2016-04-30', '2016-06-22 22:45:48', 1, 43),
(7, 1, 999999, 'http://localhost/ibf/research/uploads/images/__thumbs/prototype%20hibah.png/prototype%20hibah__480x290.png', 'Bantuan Pembuatan Purwarupa (Prototype) Inovasi Teknologi FTUI 2016', '<p>Dalam rangka meningkatkan diseminasi dan promosi hasil-hasil riset terapan inovatif para dosen FTUI agar dapat diketahui oleh masyarakat luas, Fakultas Teknik Universitas Indonesia meluncurkan sebuah skema&nbsp;Bantuan Pembuatan Purwarupa (Prototype) Inovasi Teknologi. Secara khusus tujuan skema ini adalah:</p>\r\n\r\n<ol>\r\n	<li>Sebagai media diseminasi hasil riset dari para dosen FTUI kepada pihak luar;</li>\r\n	<li>Mendorong semangat para peneliti/dosen FTUI untuk senantiasa meningkatkan penelitian terapan yang dapat bermanfaat bagi kehidupan manusia;</li>\r\n	<li><em>Prototype</em>&nbsp;yang dihasilkan akan dipajang pada ruang pajang (<em>showroom</em>) sehingga bisa ditampilkan kepada para tamu yang sedang berkunjung ke FTUI;</li>\r\n	<li>Keberadaan&nbsp;<em>prototype</em>&nbsp;akan menjadi alat peraga yang baik untuk menjelaskan hasil riset yang telah dan sedang dijalankan oleh para peneliti/dosen FTUI.</li>\r\n</ol>\r\n\r\n<p>Disediakan&nbsp;<strong>5 paket</strong>&nbsp;dengan nilai masing-masing&nbsp;<strong>Rp. 15 juta</strong>.</p>\r\n\r\n<p>Untuk detil informasi dan template usulan dapat diperoleh pada Lampiran email ini.&nbsp;</p>\r\n\r\n<p><strong>Batas pengajuan: 9 Mei 2016</strong>&nbsp;dan pengumuman pemenang: 16 Mei 2016.</p>\r\n\r\n<p>Demikian informasi ini kami sampaikan. Atas perhatiannya kami ucapkan terima kasih.</p>\r\n\r\n<p><a href="/ckfinder/userfiles/files/SK%20Dekan%20Bantuan%20Pembuatan%20Purwarupa%20(Prototype)%20Inovasi%20Teknologi%20FTUI%202016.pdf">Unduh TOR</a></p>\r\n', '2016-04-30', '2016-05-02 06:58:21', 1, 27),
(8, 1, 999999, 'http://localhost/ibf/research/uploads/images/simlitabmas.png', 'Penerimaan Proposal Hibah Penelitian Kemristekdikti untuk Pendanaan Tahun 2017', '<p>Bapak dan Ibu Dosen yang kami hormati, serta para Mahasiswa Program Doktor FTUI yang kami banggakan,</p>\r\n\r\n<p>Kementerian Riset, Teknologi dan Pendidikan Tinggi&nbsp;sudah membuka Skema Pendanaan Hibah Penelitian untuk Tahun Anggaran 2017.&nbsp;Kami teruskan email dari DRPM-UI terkait dengan prosedur pengajuan proposal, termasuk yang paling penting untuk diperhatikan adalah dealine: pengusul harus mendaftarkan via&nbsp;<a href="http://sirip.ui.ac.id"><strong>SIRIP-UI</strong></a>&nbsp;paling lambat&nbsp;<strong>27 April 2016</strong>, sementara penggunggahan proposal ke&nbsp;<a href="http://simlitabmas.dikti.go.id"><strong>SIMLITABMAS</strong></a>&nbsp;selambat-lambatnya&nbsp;<strong>4 Mei 2016.&nbsp;</strong></p>\r\n\r\n<p>Selamat menyusun proposal yang berkualitas bersama tim masing-masing.</p>\r\n\r\n<p>Unduh : <a href="/ckfinder/userfiles/files/Panduan_Pelaksanaan_Penelitian_dan_PPM_Edisi_%20EDISI_X_2016.pdf">Buku Panduan Penelitian DIKTI</a>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', '2016-04-30', '2016-05-18 09:19:48', 1, 5),
(9, 1, 999999, 'http://localhost/ibf/research/uploads/images/Foto%20Pelatihan.jpg', 'Pelatihan Penulisan Artikel Ilmiah', '<p>Pada tanggal 31 Maret 2016, Unit Riset dan Pengabdian Masyarakat FTUI melaksanakan program Pelatihan Penulisan Artikel Ilmiah untuk Jurnal Internasional bereputasi. Acara dibuka oleh Wakil Dekan Bidang Akademik, Penelitian dan Kemahasiswaan Dr. Ir. Muhamad Asvial, M.Eng dilanjutkan dengan pemaparan materi oleh Prof. Dr. Ir. Akhmad Herman Yuwono, Dr. Wisnu Jatmiko dan Chairul Hudaya, ST, M.Eng, Ph.D. Para peserta yang merupakan dosen/peneliti FTUI dan para mahasiswa paskasarjana terlihat sangat antusias mengikuti. Total perserta yang mengikuti program ini sebanyak 66 orang.</p>\r\n\r\n<p>Berikut adalah materi yang disampaikan oleh narasumber pada acara tersebut :</p>\r\n\r\n<p><a href="/ckfinder/userfiles/files/Materi%201.pdf">Materi 1</a></p>\r\n\r\n<p><a href="/ckfinder/userfiles/files/Materi%202.pdf">Materi 2</a></p>\r\n\r\n<p><a href="/ckfinder/userfiles/files/Materi%203.pdf">Materi 3</a></p>\r\n', '2016-05-02', '2016-05-02 06:52:10', 1, 0),
(10, 1, 999999, 'http://localhost/ibf/research/uploads/images/coaching.jpg', 'Coaching Clinic Penulisan Jurnal Internasional ', '<p>Sebagai tindak lanjut kegiatan Pelatihan Penulisan Artikel ilmiah yang telah dilakukan pada tanggal 31 Maret 2016,&nbsp;Manajemen Riset dan Pengabdian Masyarakat FTUI membentuk FTUI Journal Club. Klub ini dibuat dengan tujuan sebagai wadah atau forum bagi para mahasiswa Pasca-sarjana FTUI untuk berdiskusi dan saling berbagi (<em>sharing</em>) pengalaman masing-masing mulai dari teknik menulis manuskrip hingga pemilihan jurnal, proses&nbsp;<em>submission</em>&nbsp;dan&nbsp;<em>review paper.&nbsp;</em></p>\r\n<p>Salah satu kegiatan dari FTUI Journal Club adalah<em>&nbsp;</em><em>coaching clinic</em> penulisan artikel ilmiah pada jurnal internasional bereputasi&nbsp;untuk setiap departemen. Pada <em>batch</em> pertama ini, <em>coaching clinic</em> ditujukan bagi para mahasiswa paskasarjana FTUI yang telah memiliki <em>draft paper</em>. Peserta yang mengikuti kegiatan ini&nbsp;dibatasi maksimal sebanyak 15 orang demi tercapainya efisiensi dan efektivitas dari program ini. Para peserta didampingi oleh tim pendamping (coach) yang ditunjuk oleh RPM FTUI. Mereka adalah <strong>Prof. Dr. Ir. Akhmad Herman Yuwono&nbsp;M.Phil.Eng.</strong> (Manris), <strong>Dr. Cindy S. Priadi</strong> (DTS),<strong> Dr. Agus S. Pamitran</strong> (DTM), <strong>Chairul Hudaya, Ph.D</strong> (DTE), <strong>Nofrijon Sofyan, Ph.D</strong> (DTMM), dan <strong>Dr. Eny Kusrini</strong> (DTK).</p>\r\n<p>Berikut adalah foto foto kegiatan saat coaching clinic berlangsung :</p>\r\n<h5><em>Coaching clinic</em> DTM</h5>\r\n<p><img src="http://localhost/ibf/research/uploads/files/20160627-0126535300.jpg" alt="" width="399" height="363" /></p>\r\n<h5><em>Coaching clinic</em> DTMM</h5>\r\n<p><img src="http://localhost/ibf/research/uploads/files/20160707-1004528995.JPG" alt="" width="400" height="267" /></p>\r\n<h5><em>Coaching clinic</em> DTI</h5>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', '2016-05-19', '2016-07-07 04:26:42', 1, 46),
(11, 1, 999999, 'http://localhost/ibf/research/uploads/images/prof%20ben.png', 'Pembuatan Video Profil Riset Dosen FTUI', '<p>Dalam upaya meningkatkan diseminasi riset, Unit Riset dan Pengabdian Masyarakat Fakultas Teknik Universitas Indonesia bekerjasama dengan Yayasan Ilmu Berbagi membuat 10 paket video profil riset yang telah dan/atau sedang dilakukan oleh para dosen FTUI. Kesepuluh dosen FTUI yang terpilih untuk dibuatkan video profil risetnya adalah sebagai berikut :</p>\r\n\r\n<ol>\r\n	<li>Dr. Ir. Gabriel Soedarmini Boedi Andari, M.Eng.</li>\r\n	<li>Ir. Hadi Tresno Wibowo</li>\r\n	<li>Dr. Ario Sunar Baskoro, S.T., M.T., M.Eng</li>\r\n	<li>Dr. Ir. Purnomo S. Priambodo, M.Sc.</li>\r\n	<li>Prof. Dr.Eng. Drs. Benyamin Kusumoputro, M.Eng.</li>\r\n	<li>Dr. Ir. Andi Rustandi, M.T.</li>\r\n	<li>Dr. Ir. Sotya Astutiningsih, M.Eng</li>\r\n	<li>Paramita Atmodiwirjo, S.T., M.Arch., Ph.D.</li>\r\n	<li>Prof. Dr. Ir. Slamet, M.T.</li>\r\n	<li>Ir. Boy Nurtjahyo Moch, MSIE.</li>\r\n</ol>\r\n\r\n<p>Rencananya, peluncuran video profil ini akan dilakukan setiap 2 minggu sekali. Pada peluncuran perdana, berikut adalah video profil riset <strong>Prof. Dr.Eng. Drs. Benyamin Kusumoputro, M.Eng.</strong> (DTE) yang telah diunggah&nbsp;ke youtube oleh HUMAS FTUI.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><iframe frameborder="0" height="315" src="https://www.youtube.com/embed/OMqBf9IaIKs" width="560"></iframe></p>\r\n', '2016-05-19', '2016-05-19 02:59:26', 1, 2),
(12, 1, 999999, 'http://localhost/ibf/research/uploads/images/Gambar/Posterbic.jpg', 'Sosialisasi dan Workshop Program 108 Inovasi Indonesia BIC', '<p>Yth.&nbsp;<strong>Seluruh Staf Pengajar dan Mahasiswa S3</strong><br />\r\nDepartemen T. Sipil/ T. Mesin/ T. Elektro/ T. Metalurgi dan Material/ Arsitektur/ T. Kimia/ T. Industri<br />\r\nDi lingkungan FTUI<br />\r\nKampus UI - Depok</p>\r\n\r\n<p>Sehubungan dengan telah dibukanya pendaftaran untuk Seleksi 108 Inovasi Indonesia beberapa waktu yang lalu, maka Direktorat Inovasi dan Inkubator Bisnis (DIIB) Universitas Indonesia akan menyelenggarakan kegiatan Temu Inovator dengan tema &quot;<strong>Sosialisasi dan Workshop Program 108 Inovasi Indonesia BIC</strong>&quot; yang akan diselenggarakan pada:</p>\r\n\r\n<p>Hari/Tanggal&nbsp; : Rabu, 1 Juni 2016</p>\r\n\r\n<p>Waktu&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Pukul 13.00 &ndash; 16.00 WIB</p>\r\n\r\n<p>Tempat&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Auditorium Gedung ILRC, Lantai 2, Kampus UI Depok</p>\r\n\r\n<p>Bersama ini, kami mengundang Bapak/Ibu untuk dapat hadir pada acara tersebut.</p>\r\n\r\n<p>Untuk<em>&nbsp;konfirmasi</em>&nbsp;kehadiran, mohon menghubungi melalui nomor telepon (021) 2912-0931 atau 0813-1216-9995 (CP: Raisha).</p>\r\n\r\n<p>Kami harapkan Bapak dan Ibu dapat berpartisipasi dalam acara tersebut.</p>\r\n', '2016-05-19', '2016-05-19 06:18:42', 1, 11),
(13, 2, 999999, 'http://localhost/ibf/research/uploads/images/image%201/scopus.png', 'Daftar Konferensi Ilmiah Terindex Scopus 2016', '<p><span style="color: #ff0000;"><strong>UPDATE : 09 Juni 2016&nbsp;</strong></span></p>\r\n<table class="table table-bordered table-striped">\r\n<thead>\r\n<tr>\r\n<th scope="col">No</th>\r\n<th scope="col">Judul Konferensi</th>\r\n<th scope="col">Tempat/Tanggal</th>\r\n<th scope="col">Deadline Abstrak</th>\r\n<th scope="col">Deadline Full Paper</th>\r\n<th scope="col">Website</th>\r\n</tr>\r\n</thead>\r\n<tbody>\r\n<tr>\r\n<td style="text-align: center;">1</td>\r\n<td>IEEE TENCON 2016 Technologies for Smart Nation</td>\r\n<td>Singapura, 22-25 November 2016</td>\r\n<td>&nbsp;</td>\r\n<td>20 Juni 2016</td>\r\n<td><a href="http://www.tencon2016.org" target="_blank">Klik</a></td>\r\n</tr>\r\n<tr>\r\n<td style="text-align: center;">2</td>\r\n<td>2016 IEEE International Symposium on Technology and Society (ISTAS 2016)</td>\r\n<td>India, 21-22 Oktober 2016</td>\r\n<td>15 Juli 2016</td>\r\n<td>&nbsp;</td>\r\n<td><a href="http://istas2016.org/" target="_blank">Klik</a></td>\r\n</tr>\r\n<tr>\r\n<td style="text-align: center;">3</td>\r\n<td>13th IEEE International Conference on Signal Processing (ICSP2016)</td>\r\n<td>China, 6-10 November 2016</td>\r\n<td>20 Juni 2016</td>\r\n<td>20 Agustus 2016</td>\r\n<td><a href="http://icsp.bjtu.edu.cn/" target="_blank">Klik</a></td>\r\n</tr>\r\n<tr>\r\n<td style="text-align: center;">4</td>\r\n<td>International Conference on Energy Sciences (ICES 2016)</td>\r\n<td>Bandung, 25-27 Juli 2016</td>\r\n<td>10 Juni 2016</td>\r\n<td>31 Agustus 2016</td>\r\n<td><a href="http://portal.fi.itb.ac.id/ices2016/" target="_blank">Klik</a></td>\r\n</tr>\r\n<tr>\r\n<td style="text-align: center;">5</td>\r\n<td>2016 IEEE Industrial Electronics and Applications Conference</td>\r\n<td>Kinabalu, 20-22 November 2016</td>\r\n<td>13 Juni 2016</td>\r\n<td>30 Oktober 2016</td>\r\n<td><a href="http://ieacon2016.myiaie.org/" target="_blank">Klik</a></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>&nbsp;Download file selengkapnya disini : <a title="Source File" href="http://localhost/ibf/research/uploads/files/20160623-1409344713.png">Source File</a></p>', '2016-06-09', '2016-06-23 07:10:37', 1, 69);

-- --------------------------------------------------------

--
-- Table structure for table `publication`
--

CREATE TABLE `publication` (
  `pub_id` varchar(30) NOT NULL,
  `department_id` int(11) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `pub_type_id` int(2) DEFAULT NULL,
  `title` varchar(200) NOT NULL,
  `publication_name` varchar(100) NOT NULL,
  `abstract` text NOT NULL,
  `author` varchar(100) DEFAULT NULL,
  `sidr_url` varchar(100) DEFAULT NULL,
  `sidr_upload` tinyint(1) DEFAULT '0',
  `sidr_verify` tinyint(1) DEFAULT '0',
  `publish` tinyint(1) NOT NULL DEFAULT '0',
  `date_input` datetime NOT NULL,
  `date_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `publication`
--

INSERT INTO `publication` (`pub_id`, `department_id`, `user_id`, `pub_type_id`, `title`, `publication_name`, `abstract`, `author`, `sidr_url`, `sidr_upload`, `sidr_verify`, `publish`, `date_input`, `date_update`) VALUES
('2016080723374720', 4, 'returns2', 3, 'Maskless functionalization of a carbon nanotube dot array biosensor using an ultrafine atmospheric pressure plasma jet', 'Karya ilmiah', 'Tomy Abuzairi, Mitsuru Okada, Yohei Mochizuki, Nji Raden Poespawati, Retno Wigajatri Purnamaningsih, Masaaki Nagatsua', 'Tomy Abuzairi, Mitsuru Okada, Yohei Mochizuki, Nji Raden Poespawati, Retno Wigajatri Purnamaningsih,', NULL, 0, 0, 1, '2016-08-07 23:37:47', '2016-08-07 23:37:47'),
('2016080723425517', 4, 'returns2', NULL, 'Simple-O, An Automated Essay Grading System for Indonesian Language Using the LSA Method with Multi-Level Keywords', 'Paten', 'Anak Agung Putri Ratna, Prima Dewi Purnamasari, and Boma Anantasatya Adhi', 'Anak Agung Putri Ratna, Prima Dewi Purnamasari, and Boma Anantasatya Adhi', NULL, 0, 0, 0, '2016-08-07 23:42:55', '2016-08-07 23:42:55'),
('2016080723425576', 4, 'returns2', 3, 'Maskless functionalization of a carbon nanotube dot array biosensor using an ultrafine atmospheric pressure plasma jet', 'Karya ilmiah', 'Tomy Abuzairi, Mitsuru Okada, Yohei Mochizuki, Nji Raden Poespawati, Retno Wigajatri Purnamaningsih, Masaaki Nagatsua', 'Tomy Abuzairi, Mitsuru Okada, Yohei Mochizuki, Nji Raden Poespawati, Retno Wigajatri Purnamaningsih,', NULL, 0, 0, 0, '2016-08-07 23:42:55', '2016-08-07 23:42:55'),
('2016080723522137', 4, 'returns2', 3, 'Maskless functionalization of a carbon nanotube dot array biosensor using an ultrafine atmospheric pressure plasma jet', 'Karya ilmiah', '<p>Tomy Abuzairi, Mitsuru Okada, Yohei Mochizuki, Nji Raden Poespawati, Retno Wigajatri Purnamaningsih, Masaaki Nagatsua</p>', 'Tomy Abuzairi, Mitsuru Okada, Yohei Mochizuki, Nji Raden Poespawati, Retno Wigajatri Purnamaningsih,', 'http://localhost/ibf/research/uploads/publication/sidr/20160807-235329948.pdf', 1, 1, 1, '2016-08-07 23:52:21', '2016-08-07 23:53:29'),
('2016080723522182', 4, 'returns2', 4, 'Simple-O, An Automated Essay Grading System for Indonesian Language Using the LSA Method with Multi-Level Keywords', 'Paten', '<p>Anak Agung Putri Ratna, Prima Dewi Purnamasari, and Boma Anantasatya Adhi</p>', 'Anak Agung Putri Ratna, Prima Dewi Purnamasari, and Boma Anantasatya Adhi', 'http://localhost/ibf/research/uploads/publication/sidr/20160809-2125574975.pdf', 1, 1, 1, '2016-08-07 23:52:21', '2016-08-09 21:25:57'),
('20160807235448100', 4, 'returns2', 3, 'Maskless functionalization of a carbon nanotube dot array biosensor using an ultrafine atmospheric pressure plasma jet', 'Karya ilmiah', 'Tomy Abuzairi, Mitsuru Okada, Yohei Mochizuki, Nji Raden Poespawati, Retno Wigajatri Purnamaningsih, Masaaki Nagatsua', 'Tomy Abuzairi, Mitsuru Okada, Yohei Mochizuki, Nji Raden Poespawati, Retno Wigajatri Purnamaningsih,', NULL, 0, 0, 0, '2016-08-07 23:54:48', '2016-08-07 23:54:48'),
('2016080723544875', 4, 'returns2', 4, 'Simple-O, An Automated Essay Grading System for Indonesian Language Using the LSA Method with Multi-Level Keywords', 'Paten', 'Anak Agung Putri Ratna, Prima Dewi Purnamasari, and Boma Anantasatya Adhi', 'Anak Agung Putri Ratna, Prima Dewi Purnamasari, and Boma Anantasatya Adhi', NULL, 0, 1, 1, '2016-08-07 23:54:48', '2016-08-07 23:54:48'),
('2016080922015913', 1, '999999', 4, 'Simple-O, An Automated Essay Grading System for Indonesian Language Using the LSA Method with Multi-Level Keywords', 'Paten', 'Anak Agung Putri Ratna, Prima Dewi Purnamasari, and Boma Anantasatya Adhi', 'Anak Agung Putri Ratna, Prima Dewi Purnamasari, and Boma Anantasatya Adhi', NULL, 0, 1, 1, '2016-08-09 22:01:59', '2016-08-09 22:01:59'),
('2016080922015933', 1, '999999', 3, 'Maskless functionalization of a carbon nanotube dot array biosensor using an ultrafine atmospheric pressure plasma jet', 'Karya ilmiah', 'Tomy Abuzairi, Mitsuru Okada, Yohei Mochizuki, Nji Raden Poespawati, Retno Wigajatri Purnamaningsih, Masaaki Nagatsua', 'Tomy Abuzairi, Mitsuru Okada, Yohei Mochizuki, Nji Raden Poespawati, Retno Wigajatri Purnamaningsih,', NULL, 0, 1, 1, '2016-08-09 22:01:59', '2016-08-09 22:01:59'),
('2016080922015964', 1, '999999', 4, 'Latent Semantic Analysis Based Automatic Cross-Language Plagiarism Detector for Paragraph Written in Two Syntactically Distinct Languages', 'Konferensi Ilmiah', '<p>Anak Agung Putri Ratna, Emily Lomempow, Prima Dewi Purnamasari, Untung Yuwono, Boma Anantasatya Adhi</p>', 'Anak Agung Putri Ratna, Emily Lomempow, Prima Dewi Purnamasari, Untung Yuwono, Boma Anantasatya Adhi', NULL, 0, 1, 0, '2016-08-09 22:01:59', '2016-08-18 17:07:55');

-- --------------------------------------------------------

--
-- Table structure for table `publication_detail`
--

CREATE TABLE `publication_detail` (
  `pub_id` varchar(30) DEFAULT NULL,
  `publisher` varchar(100) DEFAULT NULL,
  `pub_country` varchar(50) DEFAULT NULL,
  `pub_year` int(4) DEFAULT NULL,
  `pub_website` varchar(200) DEFAULT NULL,
  `page` varchar(20) DEFAULT NULL,
  `volume` int(4) NOT NULL,
  `issn_isbn` varchar(100) DEFAULT NULL,
  `q_year` varchar(2) DEFAULT NULL,
  `freq_year` int(4) DEFAULT NULL,
  `detail` varchar(255) NOT NULL,
  `db_index` varchar(50) DEFAULT NULL,
  `jcr` float NOT NULL,
  `scr` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `publication_detail`
--

INSERT INTO `publication_detail` (`pub_id`, `publisher`, `pub_country`, `pub_year`, `pub_website`, `page`, `volume`, `issn_isbn`, `q_year`, `freq_year`, `detail`, `db_index`, `jcr`, `scr`) VALUES
('2016080723374720', 'UI', 'Indonesia', 2015, 'http://w3schools.com', '89', 0, '1579157', 'Q1', 2, 'an international Carbon Journal, Elsevier, ISSN 0008-6223, Vol. 89, August 2015', 'SCORPUS', 0.90898, 99089),
('2016080723425576', 'UI', 'Indonesia', 2015, 'http://w3schools.com', '89', 0, '1579157', 'Q1', 2, 'an international Carbon Journal, Elsevier, ISSN 0008-6223, Vol. 89, August 2015', 'SCORPUS', 0.90898, 99089),
('2016080723425517', 'UI', 'Indonesia', 2016, 'http://w3schools.com', '78', 0, '', '', 3, 'The Third Asian Conference on Society, Education & Technology 2015 (ACSET2015), Art Center of Kobe, Kobe, Japan, October 21 - October 25, 2015', 'SCORPUS', 890890, 80989),
('2016080723522137', 'UI', 'Indonesia', 2015, 'http://w3schools.com', '89', 0, '1579157', 'Q1', 2, 'an international Carbon Journal, Elsevier, ISSN 0008-6223, Vol. 89, August 2015', 'SCORPUS', 0.90898, 99089),
('2016080723522182', 'UI', 'Indonesia', 2016, 'http://w3schools.com', '78', 0, '', 'Q1', 3, 'The Third Asian Conference on Society, Education & Technology 2015 (ACSET2015), Art Center of Kobe, Kobe, Japan, October 21 - October 25, 2015', 'SCORPUS', 890890, 80989),
('20160807235448100', 'UI', 'Indonesia', 2015, 'http://w3schools.com', '89', 0, '1579157', 'Q1', 2, 'an international Carbon Journal, Elsevier, ISSN 0008-6223, Vol. 89, August 2015', 'SCORPUS', 0.90898, 99089),
('2016080723544875', 'UI', 'Indonesia', 2016, 'http://w3schools.com', '78', 0, '', '', 3, 'The Third Asian Conference on Society, Education & Technology 2015 (ACSET2015), Art Center of Kobe, Kobe, Japan, October 21 - October 25, 2015', 'SCORPUS', 890890, 80989),
('2016080922015933', 'UI', 'Indonesia', 2015, 'http://w3schools.com', '89', 0, '1579157', 'Q1', 2, 'an international Carbon Journal, Elsevier, ISSN 0008-6223, Vol. 89, August 2015', 'SCORPUS', 0.90898, 99089),
('2016080922015913', 'UI', 'Indonesia', 2016, 'http://w3schools.com', '78', 0, '', '', 3, 'The Third Asian Conference on Society, Education & Technology 2015 (ACSET2015), Art Center of Kobe, Kobe, Japan, October 21 - October 25, 2015', 'SCORPUS', 890890, 80989),
('2016080922015964', '', '', 2010, '', '89', 115, '', 'Q1', 2, '', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `publication_type`
--

CREATE TABLE `publication_type` (
  `type_id` int(2) NOT NULL,
  `type_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `publication_type`
--

INSERT INTO `publication_type` (`type_id`, `type_name`) VALUES
(1, 'Prosiding Conference Nasional'),
(2, 'Prosiding Conference Internasional'),
(3, 'Jurnal Nasional'),
(4, 'Jurnal Internasional'),
(5, 'Majalah/Koran/Working Papers'),
(6, 'Buku'),
(7, 'Book Chapter'),
(8, 'Paten (Granted)'),
(9, 'Usulan Paten'),
(10, 'Hak Cipta'),
(11, 'Karya Seni/Teknologi'),
(12, 'Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `research_field`
--

CREATE TABLE `research_field` (
  `field_id` int(11) NOT NULL,
  `field_name` varchar(50) NOT NULL,
  `date_input` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `research_field`
--

INSERT INTO `research_field` (`field_id`, `field_name`, `date_input`, `date_update`) VALUES
(1, 'Civil & Environmental', '2016-06-14 00:00:00', '2016-06-14 00:00:00'),
(2, 'Mechanical & Naval', '2016-06-14 00:00:00', '2016-06-14 00:00:00'),
(3, 'Electrical & Computer', '2016-06-14 00:00:00', '2016-06-14 00:00:00'),
(4, 'Metallurgical & Material', '2016-06-14 00:00:00', '2016-06-14 00:00:00'),
(5, 'Architecture & Interior Design', '2016-06-14 00:00:00', '2016-06-14 00:00:00'),
(6, 'Chemical & Bioprocess ', '2016-06-14 00:00:00', '2016-06-14 00:00:00'),
(7, 'Industrial', '2016-06-14 00:00:00', '2016-06-14 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `research_member`
--

CREATE TABLE `research_member` (
  `member_id` int(11) NOT NULL,
  `research_id` varchar(30) DEFAULT NULL,
  `member_type` tinyint(1) DEFAULT NULL,
  `member_code` varchar(30) NOT NULL,
  `member_name` varchar(100) NOT NULL,
  `member_email` varchar(50) DEFAULT NULL,
  `member_phone` varchar(30) DEFAULT NULL,
  `date_input` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `research_proposal`
--

CREATE TABLE `research_proposal` (
  `research_id` varchar(30) NOT NULL,
  `field_id` int(11) DEFAULT NULL,
  `research_level` varchar(20) DEFAULT NULL,
  `user_id` varchar(30) NOT NULL,
  `research_title` varchar(200) NOT NULL,
  `description` text,
  `attachment` varchar(200) DEFAULT NULL,
  `funding` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `date_input` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `resource_id` int(11) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `resource_title` varchar(100) NOT NULL,
  `file_url` varchar(200) DEFAULT NULL,
  `viewed` int(11) DEFAULT '0',
  `enable_download` tinyint(1) NOT NULL DEFAULT '1',
  `date_create` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`resource_id`, `user_id`, `resource_title`, `file_url`, `viewed`, `enable_download`, `date_create`, `date_update`) VALUES
(3, '999999', 'Surat Keteranga Kesehatan 2', 'http://localhost/ibf/research/uploads/files/20160623-1409344713.png', 3, 1, '2016-06-23 14:09:34', '2016-06-23 14:09:34'),
(6, '999999', 'Surat Keteranga Kesehatan', 'http://localhost/ibf/research/uploads/files/20160818-1006115102.jpg', 0, 0, '2016-08-18 10:06:11', '2016-08-18 10:06:11');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(1, 'admin'),
(2, 'webadmin'),
(3, 'dosen'),
(4, 'mahasiswa');

-- --------------------------------------------------------

--
-- Table structure for table `slideshow`
--

CREATE TABLE `slideshow` (
  `slide_id` int(11) NOT NULL,
  `img_url` text NOT NULL,
  `caption_title` varchar(50) DEFAULT NULL,
  `caption_text` varchar(100) DEFAULT NULL,
  `posted` date NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slideshow`
--

INSERT INTO `slideshow` (`slide_id`, `img_url`, `caption_title`, `caption_text`, `posted`, `status`) VALUES
(5, 'http://research.eng.ui.ac.id/uploads/images/Poster%201.png', '', '', '2016-05-18', 1),
(6, 'http://research.eng.ui.ac.id/uploads/images/Poster%202.png', '', '', '2016-05-18', 1),
(7, 'http://research.eng.ui.ac.id/uploads/images/slideshow/20160623-1536024329.png', '', '', '2016-06-23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` varchar(30) NOT NULL,
  `user_code` varchar(30) NOT NULL COMMENT 'NIDN/NIK/NIP',
  `role_id` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `functional` varchar(50) DEFAULT NULL,
  `research_interest` varchar(250) NOT NULL,
  `link_research_gate` varchar(250) NOT NULL,
  `link_google_scholar` varchar(250) NOT NULL,
  `link_scopus` varchar(250) NOT NULL,
  `index_scholar` varchar(250) NOT NULL,
  `index_scopus` varchar(250) NOT NULL,
  `expertise` varchar(100) NOT NULL,
  `profile` text NOT NULL,
  `avatar` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date_create` datetime DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `date_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_code`, `role_id`, `department_id`, `name`, `email`, `password`, `phone`, `functional`, `research_interest`, `link_research_gate`, `link_google_scholar`, `link_scopus`, `index_scholar`, `index_scopus`, `expertise`, `profile`, `avatar`, `status`, `date_create`, `last_login`, `date_update`) VALUES
('10651020000', '10651065', 3, 2, 'Cybercrime', 'sabbana.returns2@yahoo.com', '4d88327e78f2402b82509c374b7e37d0', '085770427123', 'Dosen', '', '', '', '', '', '', '', '', '', 1, '2016-08-02 22:37:22', '2016-08-02 22:37:52', '0000-00-00 00:00:00'),
('999999', '', 1, 1, 'Administrator', 'sabbana.azmi@kompas.com', '02dfef23cb267ed2bad8dbcf61493ef5', '085770427123', 'AdminWeb', '', '', '', '', '', '', '', '', 'http://localhost/ibf/research/uploads/avatar/999999.jpg', 1, '2016-06-14 00:00:00', '2016-08-30 08:52:22', '0000-00-00 00:00:00'),
('returns', '10651065', 3, 7, 'Sabbana Retursn', 'sabbana.returns@yahoo.com', '4d88327e78f2402b82509c374b7e37d0', '085770427123', 'Mahasiswa', '', '', '', '', '', '', '', '', '', 1, '2016-07-28 10:59:44', '2016-07-28 11:07:17', '0000-00-00 00:00:00'),
('returns2', '10651067', 3, 4, 'Sabbana Azmi', 'sabbana.1a7@gmail.com', '94b6d9f4ac35c2c0dba2f86bdff6be6e', '085770427123', 'Mahasiswa', 'Artificial Inteligent', 'http://sabbana.wordpress.com', 'http://sabbana.wordpress.com', 'http://sabbana.wordpress.com', 'http://sabbana.wordpress.com', 'http://sabbana.wordpress.com', '', 'Dr. Hudaya obtained master and Ph.D degree from Seoul National University and University of Science and Technology – Campus of Korea Institute of Science and Technology (UST – KIST) in 2009 and 2016, respectively. In professional association, he is a member of Institute of Electrical and Electronics Engineers (IEEE) and the Electrochemical Society (ECS). During completion of doctoral study, Dr. Hudaya received Excellent Research Awards from the Mayor of Daejeon City - Korea, President of KIST and President of UST, respectively due to outstanding performance in research. He is an expert in vacuum-and-plasma- based technologies such as physical vapor deposition (PVD), chemical vapor deposition (CVD) and combined PVD-CVD systems. In addition, Dr. Hudaya experienced in battery fabrication in the form of coin and pouch type cells. Currently, he has authored more than 15 peer-reviewed papers published in prestigious journals and held 1 American and 5 Korean patents. He is now an assistant professor at Department of Electrical Engineering Universitas Indonesia. His research interest includes advanced materials for energy storage application and electronic materials including, but not limited to lithium-ion batteries, hybrid supercapacitor, superconductors, and transparent heating materials.', 'http://localhost/ibf/research/uploads/avatar/returns2.jpg', 1, '2016-07-28 16:35:55', '2016-08-30 04:54:00', '2016-08-30 04:54:11'),
('urpm.ftui', '', 1, 1, 'URPM FTUI', 'sabbana.a7@gmail.com', '1c63129ae9db9c60c3e8aa94d3e00495', '+62', 'AdminWeb', '', '', '', '', '', '', '', '', '', 1, '2016-06-14 00:00:00', '2016-06-14 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `video_id` int(11) NOT NULL,
  `video_url` text NOT NULL,
  `video_title` varchar(100) NOT NULL,
  `video_description` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `added_by` varchar(30) NOT NULL,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`video_id`, `video_url`, `video_title`, `video_description`, `status`, `added_by`, `last_updated`) VALUES
(1, 'https://www.youtube.com/embed/OMqBf9IaIKs', '', '', 1, '999999', '2016-06-17 07:17:05'),
(2, 'https://www.youtube.com/embed/mKeY42U4XJI', '', '', 1, '999999', '2016-06-17 07:17:01'),
(3, 'https://www.youtube.com/embed/iGNG6iGbwqA', '', '', 1, '999999', '2016-06-17 07:16:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `grants`
--
ALTER TABLE `grants`
  ADD PRIMARY KEY (`grant_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `grants_detail`
--
ALTER TABLE `grants_detail`
  ADD KEY `grant_id` (`grant_id`);

--
-- Indexes for table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mitra`
--
ALTER TABLE `mitra`
  ADD KEY `grant_id` (`grant_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `publication`
--
ALTER TABLE `publication`
  ADD PRIMARY KEY (`pub_id`),
  ADD KEY `pub_type_id` (`pub_type_id`);

--
-- Indexes for table `publication_detail`
--
ALTER TABLE `publication_detail`
  ADD KEY `pub_id` (`pub_id`);

--
-- Indexes for table `publication_type`
--
ALTER TABLE `publication_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `research_field`
--
ALTER TABLE `research_field`
  ADD PRIMARY KEY (`field_id`);

--
-- Indexes for table `research_member`
--
ALTER TABLE `research_member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `research_proposal`
--
ALTER TABLE `research_proposal`
  ADD PRIMARY KEY (`research_id`),
  ADD KEY `field_id` (`field_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`resource_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `slideshow`
--
ALTER TABLE `slideshow`
  ADD PRIMARY KEY (`slide_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`video_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `publication_type`
--
ALTER TABLE `publication_type`
  MODIFY `type_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `research_field`
--
ALTER TABLE `research_field`
  MODIFY `field_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `research_member`
--
ALTER TABLE `research_member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `resource_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `slideshow`
--
ALTER TABLE `slideshow`
  MODIFY `slide_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `video_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `grants`
--
ALTER TABLE `grants`
  ADD CONSTRAINT `grants_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `grants_ibfk_2` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`);

--
-- Constraints for table `grants_detail`
--
ALTER TABLE `grants_detail`
  ADD CONSTRAINT `grants_detail_ibfk_1` FOREIGN KEY (`grant_id`) REFERENCES `grants` (`grant_id`) ON DELETE CASCADE;

--
-- Constraints for table `mitra`
--
ALTER TABLE `mitra`
  ADD CONSTRAINT `mitra_ibfk_1` FOREIGN KEY (`grant_id`) REFERENCES `grants` (`grant_id`) ON DELETE CASCADE;

--
-- Constraints for table `publication`
--
ALTER TABLE `publication`
  ADD CONSTRAINT `publication_ibfk_1` FOREIGN KEY (`pub_type_id`) REFERENCES `publication_type` (`type_id`);

--
-- Constraints for table `publication_detail`
--
ALTER TABLE `publication_detail`
  ADD CONSTRAINT `publication_detail_ibfk_1` FOREIGN KEY (`pub_id`) REFERENCES `publication` (`pub_id`) ON DELETE CASCADE;

--
-- Constraints for table `research_proposal`
--
ALTER TABLE `research_proposal`
  ADD CONSTRAINT `research_proposal_ibfk_1` FOREIGN KEY (`field_id`) REFERENCES `research_field` (`field_id`),
  ADD CONSTRAINT `research_proposal_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `resources`
--
ALTER TABLE `resources`
  ADD CONSTRAINT `resources_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
