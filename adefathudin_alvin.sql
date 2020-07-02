-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 28, 2020 at 03:58 PM
-- Server version: 10.1.44-MariaDB-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adefathudin_alvin`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('00893u1i30pv5sijvkvuhqipdc4qmp0h', '::1', 1588646333, '__ci_last_regenerate|i:1588646250;'),
('05l3fsev6dm645nfumq89ppqsese4dr9', '::1', 1591166572, '__ci_last_regenerate|i:1591166572;'),
('073e2q4tjeaq18bpoaro3oi2g3ma9gg9', '::1', 1591329418, '__ci_last_regenerate|i:1591329418;nik|s:0:\"\";rfid|s:2:\"00\";'),
('08c3f0ndjkk9fvov2ohei6rvm5onnahr', '::1', 1591329043, '__ci_last_regenerate|i:1591329043;nik|s:0:\"\";rfid|s:2:\"00\";'),
('093i054h2or31fl9kdi3s6s00von97hu', '::1', 1591445105, '__ci_last_regenerate|i:1591445105;nik|s:0:\"\";rfid|s:2:\"11\";'),
('0rskg5676cmov4su8ku2g0krt8qam8cf', '::1', 1591251872, '__ci_last_regenerate|i:1591251872;nik|s:0:\"\";rfid|s:1:\"2\";'),
('0uhm4ctf9b58hle9lpurto95kld295ou', '::1', 1592885896, '__ci_last_regenerate|i:1592885896;nik|s:0:\"\";rfid|s:2:\"00\";'),
('0uiso3j0e04s9k09mamagr2gr8ab43lp', '::1', 1589382603, '__ci_last_regenerate|i:1589382602;'),
('1egemvh7vvfhje4v7ohg7eocfvuojeq1', '::1', 1591417148, '__ci_last_regenerate|i:1591417138;nik|s:0:\"\";rfid|s:2:\"00\";'),
('228uppi121usat7lf25pvog7k3i9mlou', '::1', 1588490147, '__ci_last_regenerate|i:1588490133;'),
('42qhjsutbufhi0ql0mn5h793i518qhtn', '::1', 1591417138, '__ci_last_regenerate|i:1591417138;nik|s:1:\"1\";rfid|s:0:\"\";'),
('44pu79utmvv742rcvkmbt3u1c1u7h9e4', '::1', 1592885896, '__ci_last_regenerate|i:1592885896;nik|s:0:\"\";rfid|s:2:\"00\";'),
('49gc56ck2eflbj9p5h29qcv6mn3t7dif', '::1', 1591393793, '__ci_last_regenerate|i:1591393793;nik|s:0:\"\";rfid|s:2:\"00\";'),
('4ld7a7u2mpj3aq2q8cir6g1dm4ve5ulb', '::1', 1589382652, '__ci_last_regenerate|i:1589382511;'),
('4vn0bp90indnk5e3gocf827s3dhftfbk', '::1', 1588434619, '__ci_last_regenerate|i:1588434618;'),
('52586ffabrjibddrl9aacgdf47fo28ia', '::1', 1591256197, '__ci_last_regenerate|i:1591256197;nik|s:0:\"\";rfid|s:1:\"2\";'),
('53r7tm22li319lurshjluvlj2os9n3pm', '::1', 1591256164, '__ci_last_regenerate|i:1591256104;'),
('5jmpkngj860q2hjoig4sgpspqg223sa3', '::1', 1590892611, '__ci_last_regenerate|i:1590892611;'),
('5r4s6ss71gd8qeijes79b6kvnolo4ng0', '::1', 1592883823, '__ci_last_regenerate|i:1592883823;nik|s:0:\"\";rfid|s:2:\"00\";'),
('6f7v1jhd9f10h87bvlt1fhn9lje5ussi', '::1', 1589392225, '__ci_last_regenerate|i:1589392225;'),
('6ms821rfifrtb5ig4kj7vnfus7h6vm5u', '::1', 1588411754, '__ci_last_regenerate|i:1588411752;'),
('6up6uj9h99thln05dt75gh8thqktcmqd', '::1', 1589105710, '__ci_last_regenerate|i:1589105514;'),
('71im7esf9lmhp3ug0p00v6qmkd1r13q4', '::1', 1591583501, '__ci_last_regenerate|i:1591583501;'),
('78cnh43n3na57uqk6nsd7pk3aaaufmmt', '::1', 1591327469, '__ci_last_regenerate|i:1591327469;nik|s:0:\"\";rfid|s:1:\"2\";'),
('7v3iq28agrekj0lta8s6vr6amosqs75f', '::1', 1591245140, '__ci_last_regenerate|i:1591245140;nik|s:1:\"1\";'),
('97t7pf8tgi4todvln5l9g0bumh32pj9o', '::1', 1590893141, '__ci_last_regenerate|i:1590893141;'),
('98rhqi4mbgvp0b7f8t00h44dklhao4am', '::1', 1591418314, '__ci_last_regenerate|i:1591418314;'),
('9kprq6ro6bb6of6elpgj0gg5ipllpanj', '::1', 1591239492, '__ci_last_regenerate|i:1591239492;nik|s:1:\"1\";'),
('9mp0292bh3d3vh2qcaucptqfcljjsls0', '::1', 1591394103, '__ci_last_regenerate|i:1591394103;message|s:11:\"Login Gagal\";__ci_vars|a:1:{s:7:\"message\";s:3:\"old\";}'),
('aii9ls8oq7ivgr79vvvfir0fjuih560s', '::1', 1588492355, '__ci_last_regenerate|i:1588492345;'),
('aokh253vgq0kpecbmmois9gspb5n2kba', '::1', 1591246744, '__ci_last_regenerate|i:1591246744;nik|s:0:\"\";rfid|s:1:\"2\";'),
('b8k6ava19u9mnufo3v1k4u2arab5jajc', '::1', 1592878962, '__ci_last_regenerate|i:1592878962;nik|s:0:\"\";rfid|s:2:\"11\";'),
('c04e68c2uvl7s9il5jn4qio9ivbrmkmh', '::1', 1591067341, '__ci_last_regenerate|i:1591067340;'),
('c05hd6p6t8a78vdevft40ofru3aj0vqo', '::1', 1591257608, '__ci_last_regenerate|i:1591257150;nik|s:0:\"\";rfid|s:2:\"00\";'),
('ccje0pdcbe9u9n6p1u8lfvq43666gf0v', '::1', 1591327049, '__ci_last_regenerate|i:1591327049;nik|s:0:\"\";rfid|s:1:\"2\";'),
('cg2ovau3hp80qkori2j50gtmr5sis2hb', '::1', 1591167809, '__ci_last_regenerate|i:1591167809;'),
('ck2t3ldn33mlr6ndkkmgeu7m27htj953', '::1', 1591587867, '__ci_last_regenerate|i:1591587867;nik|s:0:\"\";rfid|s:2:\"00\";'),
('clqet9ufo5h4fna0ofu187honu8414v7', '::1', 1591244599, '__ci_last_regenerate|i:1591244599;nik|s:1:\"1\";'),
('d2qv3l8j9n9q2uob5tk81ejpf98o12gl', '::1', 1590896146, '__ci_last_regenerate|i:1590895039;'),
('db0pt5lcdsb01gqkkfn9qpebn3a51uht', '::1', 1591252177, '__ci_last_regenerate|i:1591252177;nik|s:0:\"\";rfid|s:1:\"2\";'),
('dgftodacv7u9p3tslhbnr2pik8aaksbd', '::1', 1592879681, '__ci_last_regenerate|i:1592879681;nik|s:0:\"\";rfid|s:2:\"00\";'),
('eg8lou8ntmrinaddkk1laepte4pctbb8', '::1', 1591586285, '__ci_last_regenerate|i:1591586285;nik|s:0:\"\";rfid|s:2:\"00\";'),
('ekd3dc96131sjltjss6755scjaj9jmua', '::1', 1591328594, '__ci_last_regenerate|i:1591328594;nik|s:0:\"\";rfid|s:2:\"00\";'),
('fd0per7mb9eta0f3mig0bjoag7gvgvae', '::1', 1591254935, '__ci_last_regenerate|i:1591254935;nik|s:0:\"\";rfid|s:1:\"2\";'),
('fjslhlb2ihrjc755c4hui4cohk0qopmb', '::1', 1592880497, '__ci_last_regenerate|i:1592880497;nik|s:0:\"\";rfid|s:2:\"00\";'),
('fnt3t5v7dimdhbl2rlqsuoln4qvlsbug', '::1', 1591585567, '__ci_last_regenerate|i:1591585567;nik|s:0:\"\";rfid|s:2:\"00\";'),
('fpvg4n0o2lqv74a9uumtlnb9d2pqk347', '::1', 1591326238, '__ci_last_regenerate|i:1591326238;'),
('g63rc566o64n1ncg5k620slvkkigvk5v', '::1', 1591443196, '__ci_last_regenerate|i:1591443196;nik|s:0:\"\";rfid|s:2:\"11\";'),
('g7al1b58g5ctliqb806f78m1cjidav7a', '::1', 1591585977, '__ci_last_regenerate|i:1591585977;nik|s:0:\"\";rfid|s:2:\"00\";'),
('gopvc1c0hk8flfl6num0pkqg9fnjngpv', '::1', 1588490161, ''),
('h377mbsukki89pmqcgt8mgdoetae0ps3', '::1', 1591587008, '__ci_last_regenerate|i:1591587008;nik|s:0:\"\";rfid|s:2:\"00\";'),
('h4892dprh5qu5v79vlveprlpg5u351sb', '::1', 1593334058, '__ci_last_regenerate|i:1593334058;nik|s:0:\"\";rfid|s:10:\"0979912964\";'),
('h4ev4bofv59kv9d9mdclvhbhna9dh57t', '::1', 1591170562, '__ci_last_regenerate|i:1591170562;'),
('h5f2bicnb3cgmsqj1m33e4tc9nkhp9sk', '::1', 1592884150, '__ci_last_regenerate|i:1592884150;nik|s:0:\"\";rfid|s:2:\"00\";'),
('hf89smar150lhvddaqd91stnutagh0cs', '::1', 1591584453, '__ci_last_regenerate|i:1591584453;nik|s:0:\"\";rfid|s:2:\"00\";'),
('hg1l204g0s6f016pafhlhnkg1ru90q2q', '::1', 1590892212, '__ci_last_regenerate|i:1590892212;'),
('i1p0cpiqne0trqhbofgqb1bupt6kk7b2', '::1', 1591584815, '__ci_last_regenerate|i:1591584815;nik|s:0:\"\";rfid|s:2:\"00\";'),
('ii2rvmei9bt6davso1irrmkug3bm6q13', '::1', 1590034624, '__ci_last_regenerate|i:1590034383;'),
('ij471u4oq5uem54rrd3h3td35rq30gij', '::1', 1591537163, '__ci_last_regenerate|i:1591537163;nik|s:0:\"\";rfid|s:2:\"11\";'),
('is827ckftji7vmauhaa33nib9ibsp7u1', '::1', 1588963636, '__ci_last_regenerate|i:1588963635;'),
('j3p26f2tum0l1sih2cte979djaqeke8k', '::1', 1588398903, '__ci_last_regenerate|i:1588398871;'),
('j9uhh8c4lduse6ejfurjuv6rcad9fcsn', '::1', 1591445852, '__ci_last_regenerate|i:1591445852;nik|s:0:\"\";rfid|s:2:\"11\";'),
('jbavabr9r3susgv8vj60tu3tdcavbgtc', '::1', 1591256757, '__ci_last_regenerate|i:1591256757;nik|s:0:\"\";rfid|s:1:\"2\";'),
('jg83l5h5dh1fo16ruovlc29jqdh9jh8g', '::1', 1591442227, '__ci_last_regenerate|i:1591442227;nik|s:0:\"\";rfid|s:2:\"11\";'),
('jj3t30mmeemr4jv93mkomfb6b42rp5kn', '::1', 1591167496, '__ci_last_regenerate|i:1591167496;'),
('kdloknpd741u2lon98sipa1r907i415h', '::1', 1591445517, '__ci_last_regenerate|i:1591445517;nik|s:0:\"\";rfid|s:2:\"11\";'),
('kpom8j6o3ln0emvqg4n1b2g5p102te4c', '::1', 1591157632, '__ci_last_regenerate|i:1591157631;'),
('lps7gt51mhrpggd9hef6i31bcd6gjms2', '::1', 1588411752, '__ci_last_regenerate|i:1588411752;'),
('ltr6tfhvpjmial9anlbp1q8p4nnnf8v2', '::1', 1591538286, '__ci_last_regenerate|i:1591538286;'),
('lvbfhj7s2k5pk4jlc7ohash2ufhnvrt3', '::1', 1590895039, '__ci_last_regenerate|i:1590895039;'),
('mhdd5n1nvrq8mj6tv7f13pi7kccf653t', '::1', 1592885559, '__ci_last_regenerate|i:1592885559;nik|s:0:\"\";rfid|s:2:\"11\";'),
('n7vhmalob105tptf5jqcj9g6300ej5pf', '::1', 1588424613, '__ci_last_regenerate|i:1588424613;'),
('ncib7ia7mhq94j365m5ctp8r71srhh4s', '::1', 1591254369, '__ci_last_regenerate|i:1591254369;nik|s:0:\"\";rfid|s:1:\"2\";'),
('nqje8s9cbci1d5foedp910437ail1ooj', '::1', 1591169326, '__ci_last_regenerate|i:1591169326;'),
('nsmo1f36h27bij8ikd1h242f6suka57s', '::1', 1588411345, '__ci_last_regenerate|i:1588411345;'),
('pdotn4h3fjpin7jthh3a7ie533qu1r56', '::1', 1590893482, '__ci_last_regenerate|i:1590893482;'),
('pkts5dqtk9vcftrf2kgq7haibee73laj', '::1', 1591442570, '__ci_last_regenerate|i:1591442570;nik|s:0:\"\";rfid|s:2:\"11\";'),
('qnd0c7i1j794jbmrko675659nej9not4', '::1', 1591169689, '__ci_last_regenerate|i:1591169689;'),
('r3suko3bvla6r61d8cch4sv4tecbvtbp', '::1', 1591171121, '__ci_last_regenerate|i:1591171090;nik|s:1:\"1\";'),
('r8r25un92sin62cqiqib5nca84135h1e', '::1', 1591152246, '__ci_last_regenerate|i:1591152246;'),
('r90cit81f8u3alvp21jksmmni4tmdqei', '::1', 1593334382, '__ci_last_regenerate|i:1593334358;nik|s:0:\"\";rfid|s:2:\"00\";'),
('r9lq726c92nqekauf66pacbg5epn0cc7', '::1', 1591441756, '__ci_last_regenerate|i:1591441756;nik|s:0:\"\";rfid|s:2:\"11\";'),
('rlisalac24o0i81rgr7gudkvjus0fac6', '::1', 1591245598, '__ci_last_regenerate|i:1591245598;nik|s:1:\"1\";'),
('rv39rvd8idfr92cfgmlgklpof9pdaafd', '::1', 1591244277, '__ci_last_regenerate|i:1591244277;nik|s:1:\"1\";'),
('s92uj8n27k2q30aq86p8t50dde28nqqe', '::1', 1591444801, '__ci_last_regenerate|i:1591444801;nik|s:0:\"\";rfid|s:2:\"11\";'),
('s9he35hhnnoktfc6lp2ta7get9thu58q', '::1', 1591171090, '__ci_last_regenerate|i:1591171090;nik|s:1:\"1\";'),
('scntur62up3ibgc3sk5d16ua3lrfjodd', '::1', 1591169996, '__ci_last_regenerate|i:1591169996;'),
('sp4shir9cmt2retak5aqdln23u370rvj', '::1', 1591583826, '__ci_last_regenerate|i:1591583826;nik|s:0:\"\";rfid|s:2:\"00\";'),
('suc9ka941ce71fiitq3s566otmnqjkkg', '::1', 1591587465, '__ci_last_regenerate|i:1591587465;nik|s:0:\"\";rfid|s:2:\"00\";'),
('t16rm49qpf35l3abkuimr2uo7fv7e1pk', '::1', 1592885234, '__ci_last_regenerate|i:1592885234;nik|s:0:\"\";rfid|s:2:\"11\";'),
('tkhflfdlc8guu866cde20i8i7v4lc8o4', '::1', 1591441403, '__ci_last_regenerate|i:1591441403;nik|s:0:\"\";rfid|s:2:\"00\";'),
('tqoru7upfqq8ggi67rtfe789u3mqf2tr', '::1', 1590893803, '__ci_last_regenerate|i:1590893803;'),
('tt2m538m72a1257uskr6ubn7te14a8gk', '::1', 1591587867, '__ci_last_regenerate|i:1591587867;'),
('u3pdr2i75do7s3ve4tpuoeuqr04nqeob', '::1', 1592884828, '__ci_last_regenerate|i:1592884828;nik|s:0:\"\";rfid|s:2:\"00\";'),
('uh6bresk9idrgcreenulu1oqhd087sl0', '::1', 1591254040, '__ci_last_regenerate|i:1591254040;nik|s:0:\"\";rfid|s:1:\"2\";'),
('uqof5buj4vl4uqvu9tiirjb3ija22u83', '::1', 1592815177, '__ci_last_regenerate|i:1592815177;nik|s:0:\"\";rfid|s:2:\"11\";'),
('vp1ejun990jui5cejti245qhva0f0enj', '::1', 1591257077, '__ci_last_regenerate|i:1591257077;nik|s:0:\"\";rfid|s:1:\"2\";'),
('vpatifhaaljv6jjj510e7atab712d91p', '::1', 1588424614, '__ci_last_regenerate|i:1588424613;'),
('vq916rqtec4ju229ie5r86g40tjs9p3b', '::1', 1591443550, '__ci_last_regenerate|i:1591443550;nik|s:0:\"\";rfid|s:2:\"11\";'),
('vrj93j3voknj5qb93r73hdpjr2q30hhh', '::1', 1589386766, '__ci_last_regenerate|i:1589386727;'),
('vv4bceh7i7m79e9s2sd5t0k7pdinukjj', '::1', 1591246103, '__ci_last_regenerate|i:1591246103;nik|s:1:\"1\";');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(3);

-- --------------------------------------------------------

--
-- Table structure for table `users_login`
--

CREATE TABLE `users_login` (
  `id` int(11) NOT NULL,
  `nik` varchar(15) DEFAULT NULL,
  `rfid_id_card` varchar(16) DEFAULT NULL,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `active` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_login`
--

INSERT INTO `users_login` (`id`, `nik`, `rfid_id_card`, `nama_lengkap`, `jabatan`, `password`, `active`) VALUES
(5, '123456', '00', 'Web Admin', 'Administrator', '202cb962ac59075b964b07152d234b70', 1);

-- --------------------------------------------------------

--
-- Table structure for table `visitor_card`
--

CREATE TABLE `visitor_card` (
  `rfid_visitor_card` varchar(12) NOT NULL,
  `nomor_visitor_card` int(7) DEFAULT NULL,
  `status` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `visitor_detail`
--

CREATE TABLE `visitor_detail` (
  `id` int(12) NOT NULL,
  `id_card` varchar(16) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `status_profesi` varchar(50) NOT NULL,
  `nama_perusahaan` varchar(50) NOT NULL,
  `nomor_telepon` varchar(12) NOT NULL,
  `blokir` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `visitor_history`
--

CREATE TABLE `visitor_history` (
  `id_history` int(12) NOT NULL,
  `rfid_id_card` varchar(16) NOT NULL,
  `rfid_visitor_card` varchar(16) NOT NULL,
  `status_profesi` varchar(50) NOT NULL,
  `nama_perusahaan` varchar(50) NOT NULL,
  `tujuan` varchar(150) NOT NULL,
  `checkout` tinyint(1) NOT NULL DEFAULT '0',
  `tanggal_in` date NOT NULL,
  `tanggal_out` date NOT NULL,
  `jam_in` time NOT NULL,
  `jam_out` time NOT NULL,
  `pic` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_login`
--
ALTER TABLE `users_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitor_card`
--
ALTER TABLE `visitor_card`
  ADD PRIMARY KEY (`rfid_visitor_card`);

--
-- Indexes for table `visitor_detail`
--
ALTER TABLE `visitor_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitor_history`
--
ALTER TABLE `visitor_history`
  ADD PRIMARY KEY (`id_history`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users_login`
--
ALTER TABLE `users_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `visitor_detail`
--
ALTER TABLE `visitor_detail`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `visitor_history`
--
ALTER TABLE `visitor_history`
  MODIFY `id_history` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
