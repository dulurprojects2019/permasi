-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 03 Mar 2020 pada 18.52
-- Versi server: 10.3.22-MariaDB
-- Versi PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `serpongu_2019_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `ads`
--

CREATE TABLE `ads` (
  `ads_id` int(11) NOT NULL,
  `ads_name` varchar(100) NOT NULL,
  `ads_slug` varchar(100) NOT NULL,
  `ads_position` varchar(100) NOT NULL,
  `ads_link` varchar(255) NOT NULL,
  `ads_image` varchar(120) NOT NULL,
  `ads_created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ads_created_by` varchar(50) NOT NULL,
  `ads_edited_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ads_edited_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ads`
--

INSERT INTO `ads` (`ads_id`, `ads_name`, `ads_slug`, `ads_position`, `ads_link`, `ads_image`, `ads_created_at`, `ads_created_by`, `ads_edited_at`, `ads_edited_by`) VALUES
(1, 'Left', 'left', 'Left', 'https://www.youtube.com/watch?v=Bey4XXJAqS8', '14-01-2020_110259_left.png', '2020-01-14 04:02:59', '1', '0000-00-00 00:00:00', ''),
(2, 'Right', 'right', 'Right', 'https://www.youtube.com/watch?v=MB80ZuIJATI', '14-01-2020_110316_right.jpg', '2020-01-14 04:03:16', '1', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `blogs`
--

CREATE TABLE `blogs` (
  `blg_id` int(11) NOT NULL,
  `blg_title` varchar(255) NOT NULL,
  `blg_slug` varchar(255) NOT NULL,
  `blg_cat_id` varchar(100) NOT NULL,
  `blg_view_id` varchar(30) NOT NULL,
  `blg_image` varchar(255) NOT NULL,
  `blg_video` varchar(255) NOT NULL,
  `blg_text_content` text NOT NULL,
  `blg_tags` varchar(255) NOT NULL,
  `blg_status` int(11) NOT NULL,
  `blg_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `blg_created_by` varchar(50) NOT NULL,
  `blg_edited_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `blg_edited_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `blogs`
--

INSERT INTO `blogs` (`blg_id`, `blg_title`, `blg_slug`, `blg_cat_id`, `blg_view_id`, `blg_image`, `blg_video`, `blg_text_content`, `blg_tags`, `blg_status`, `blg_created_at`, `blg_created_by`, `blg_edited_at`, `blg_edited_by`) VALUES
(1, 'Fajar/Rian Kalah, Indonesia Tanpa Wakil di Final Malaysia Masters', 'fajarrian-kalah-indonesia-tanpa-wakil-di-final-malaysia-masters', '3,8', 'Slide', '11-01-2020_200552_fajarrian_kalah,_indonesia_tanpa_wakil_di_final_malaysia_masters.jpeg', 'https://www.youtube.com/watch?v=nTRBINu1cNk', '<p>Kuala Lumpur - Fajar Alfian/Muhammad Rian Ardianto tersingkir di semifinal Malaysia Masters 2020. Dengan kekalahan Fajar/Rian, Indonesia tak mengirim wakil ke final.</p><p>Fajar/Rian harus mengakui keunggulan Kim Gi Jung/Lee Yong Dae. Dalam pertandingan di Axiata Arena, Sabtu (11/1/2020), Fajar/Rian kalah 21-14, 19-21, 15-21.</p><p>Setelah merebut gim pertama, Fajar/Rian terlibat pertarungan ketat dengan Lee/Kim di gim kedua. Kejar-mengejar angka terus terjadi, tapi Fajar/Rian akhirnya kalah meski sempat unggul 19-18.</p><p>Baca juga: Greysia/Apriyani Tersingkir di Semifinal Malaysia Masters 2020</p><p>Fajar/Rian kemudian mengendur di gim penentuan. Meski sempat mengejar dari 6-11 jadi 11-13, Fajar/Rian tak mampu membendung pasangan asal Korea itu.</p><p>Dengan demikian, Indonesia tak punya wakil di babak final. Empat wakil yang bertanding lebih dulu juga sama-sama menelan kekalahan.</p><p>Greysia Polii/Apriyani Rahayu dihentikan oleh Li Wen Mei/Zheng Yu. Di nomor ganda campuran, Hafiz Faizal/Gloria Emanuelle Widjaja yang jadi satu-satunya harapan harus takluk di tangan pasangan nomor satu dunia, Zheng Siwei/Huang Yaqiong.</p><p>Mohammad Ahsan/Hendra Setiawan juga terhenti di semifinal. Mereka dikalahkan Li Junhui/Liu Yuchen dalam duel ketat sepanjang tiga gim.</p><p>Baca juga: Hendra/Ahsan dan Hafiz/Gloria Terhenti di Semifinal Malaysia Masters 2020</p><p><br></p><p>Simak Video \"Fajar/Rian Tersingkir di Indonesia Open: Banyak Error!\"</p>', 'fajar rian kalah,fajar dan rian,final malaysia master', 1, '2020-01-11 13:05:52', '1', '2020-01-12 12:10:18', '1'),
(2, 'Rekor Cemerlang Zidane Tangani Real Madrid di Laga Final', 'rekor-cemerlang-zidane-tangani-real-madrid-di-laga-final', '3,8,9', 'Trending_Now', '11-01-2020_200837_rekor_cemerlang_zidane_tangani_real_madrid_di_laga_final.jpeg', '', '<p>Jeddah - Zinedine Zidane akan memainkan partai final kesembilannya bersama Real Madrid akhir pekan ini. Dari delapan laga puncak terakhirnya, ia selalu menjadi juara.</p><p>Real Madrid menghadapi Atletico Madrid di babak final Piala Super Spanyol 2020. Pertandingan digelar di Stadion King Abdullah Sports City, Arab Saudi, Senin (13/1/2020).</p><p>Pertandingan nanti juga menjadi catatan tersendiri buat Zidane. Andai Luka Modric dkk berhasil memenangkan pertandingan, maka pelatih Real Madrid tersebut tetap menjaga rekor 100 persen kemenangan di laga pamungkas Los Blancos dalam empat tahun terakhir.</p><p>Sebelum babak final vs Atletico, Zidane sudah membawa Real Madrid menembus delapan partai puncak di beberapa kompetisi dan memenangi semuanya. Ia memulainya pertama kali di tahun 2016, ketika Los Merengues mengalahkan Los Rojiblancos di final Liga Champions.</p><p>Baca juga: Madrid Vs Atletico: Final Piala Super Spanyol Tanpa Tim Juara</p><p>Pada tahun yang sama, Real Madrid memenangi Piala Super Eropa usai menaklukkan Sevilla 3-2. Zidane menutup tahun 2016 dengan menggondol trofi Piala Dunia Antarklub, setelah menang 4-2 vs Kashima Antlers di babak final.</p><p>Di tahun 2017, Zidane kembali memenangi final Liga Champions dengan mengalahkan Juventus. Sergio Ramos dkk turut memenangkan kembali Piala Super Eropa dan Piala Dunia Antarklub, serta meraih Piala Super Spanyol melawan Barcelona dalam dua leg.</p><p>Setahun berikutnya, Zidane berhasil mengantarkan Real Madrid ke final Liga Champions 2018 menghadapi Liverpool. Los Blancos menjadi juara dengan kemenangan 3-1.</p><p>Usai Liga Champions 2018, Zidane meninggalkan Real Madrid dan kembali lagi pada Maret 2019. Setelah sembilan bulan di periode keduanya, pelatih asal Prancis itu membawa lagi timnya menjajaki laga final di awal 2020 ini.</p>', 'Zinedine Zidane ,atletico madrid,madrid vs atletico,final piala super spanyol', 1, '2020-01-11 13:08:37', '1', '2020-01-12 11:17:08', '1'),
(3, '7 Momen Lionel Messi Emosi di Lapangan Hijau', '7-momen-lionel-messi-emosi-di-lapangan-hijau', '3,8,9', 'Most_Popular', '11-01-2020_201117_7_momen_lionel_messi_emosi_di_lapangan_hijau.jpeg', '', '<p>Jakarta - Lionel Messi baru saja terlibat keributan dengan Joao Felix di Piala Super Spanyol. Berikut 7 momen ketika bintang Barcelona itu emosi betul di lapangan hijau.</p><p>Di semifinal Piala Super Spanyol antara Barcelona vs Atletico Madrid, Messi sempat clash dengan Joao Felix, di penghujung babak pertama. Keduanya sempat saling bertatap dan adu mulut di King Abdullah Sport City, Jumat (10/1/2020) dini hari WIB.</p><p>Joao Felix menambah panjang daftar pemain yang sempat ribut dengan Messi dalam sedekade terakhir. Sebelumnya, La Pulga pernah berseteru dengan lawan, bahkan cukup panas momennya. Berikut detikSport rangkum:</p><p>Baca juga: Gaya Santuy Joao Felix \'Dikeroyok\' Alba, Messi, dan Suarez</p><p>1. Darijo Srna (Shakhtar Donetsk)</p><p>Di Piala Super Eropa 2009, Messi sempat berseteru dengan pemain Shakhtar Donetsk Darijo Srna di Stade Louis II, Monako, 28 Agustus 2009.</p><p>Usai nyaris mencetak gol, Messi sempat mendorong Srna sedikit. Srna yang tak terima kemudian mendatangi Messi, yang dibalas dengan dorongan dan tandukan kepala oleh penyerang Barcelona itu. Beruntung, Messi tidak dikartu merah akibat insiden itu.</p><p>2. Ronald Raldes (Timnas Bolivia)</p><p>Di laga perdana fase grup Copa America 2011, Messi sempat punya tensi tinggi dengan bek Bolivia, Ronald Raldes. Perkaranya sepele, Messi dihalangi-halangi saat berusaha mengejar bola yang akan ditangkap kiper lawan.</p><p>Messi pun mendorong Raldes, kemudian kedua pemain berdebat. Keduanya pun dipisahkan rekan-rekannya, sebelum diperingkatkan wasit.</p><p>3. Weligton (Malaga)</p><p>Messi dan eks pemain Malaga, Weligton, sempat ribut pada pertandingan Laliga musim 2014/2015. Messi sempat didorong wajahnya sampai tersungkur di lapangan.</p><p>Berawal dari perebutan bola, tangan Weligton mengenai Messi. Messi marah dan melontarkan kata-kata kasar, yang kemudian dibalas dengan dorongan kepada wajah Messi hingga jatuh. Weligton pun dikartu kuning.</p>', 'messi,messi momen,messi marah,messi pemain terbaik dunia,messi kalah,messi tidak lolos final super spanyol', 1, '2020-01-11 13:11:17', '1', '2020-01-12 15:03:46', '1'),
(4, 'Fashion Show Kids', 'fashion-show-kids', '3', 'Trending_Now', '12-01-2020_054242_fashion_show_kids.jpg', '', '<p>What is Lorem Ipsum?</p><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p>Why do we use it?</p><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p><p>Where does it come from?</p><p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p><p>Where can I get some?</p><p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', 'fashion show kids,fashion show,gaya hidup anak kecill,cute', 1, '2020-01-11 22:42:42', '1', '2020-01-12 11:18:43', '1'),
(5, 'Fashion Show Jepang', 'fashion-show-jepang', '3', 'Featured', '12-01-2020_054535_fashion_show_jepang.jpg', '', '<p>What is Lorem Ipsum?</p><p><br></p><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p><br></p><p>Why do we use it?</p><p><br></p><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p><p><br></p><p>Where does it come from?</p><p><br></p><p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p><br></p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p><p><br></p><p>Where can I get some?</p><p><br></p><p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', 'fashion show jepang,culture fashion,kimono', 1, '2020-01-11 22:45:35', '1', '2020-01-12 10:59:04', '1'),
(6, 'Jogging Pagi Di Taman Kota', 'jogging-pagi-di-taman-kota', '8,9', 'Video_Review', '12-01-2020_055852_jogging_pagi_di_taman_kota.jpg', '', '<p>What is Lorem Ipsum?</p><p><br></p><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p><br></p><p>Why do we use it?</p><p><br></p><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p><p><br></p><p>Where does it come from?</p><p><br></p><p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p><br></p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p><p><br></p><p>Where can I get some?</p><p><br></p><p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', 'jogging pagi,jogging sehat,olah raga,taman kota', 1, '2020-01-11 22:58:52', '1', '2020-01-12 17:31:40', '1'),
(7, 'asd', 'asd', '3', 'Featured', '12-01-2020_220435_asd.jpg', '', '<p>What is Lorem Ipsum? - <span style=\"font-size: 1rem;\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p><p>Why do we use it?</p><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p><p>Where does it come from?</p><p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p><p>Where can I get some?</p><p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', 'fashion,indonesia', 1, '2020-01-12 01:21:04', '1', '2020-01-12 15:04:36', '1'),
(8, 'gggggg', 'gggggg', '2,4', 'Most_Popular', '12-01-2020_175039_gggggg.jpg', 'https://www.youtube.com/watch?v=y_uM8bUnlGQ', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br></p>', 'most popular,most of the most', 1, '2020-01-12 10:50:39', '1', '2020-01-12 10:57:41', '1'),
(9, 'Popular1', 'popular1', '5,7', 'Most_Popular', 'noimageblogs.png', '', '<p>aa</p>', 'a', 1, '2020-01-12 14:38:42', '1', '2020-01-12 15:28:08', '1'),
(10, 'Popular2', 'popular2', '6,8', 'Featured', 'noimageblogs.png', '', '<p>b</p>', 'b', 1, '2020-01-12 14:39:05', '1', '2020-01-12 15:14:35', '1'),
(11, 'Popular3', 'popular3', '2,4', 'Most_Popular', 'noimageblogs.png', '', '<p>c</p>', 'c', 1, '2020-01-12 14:39:25', '1', '2020-01-12 15:28:00', '1'),
(12, 'Popular4', 'popular4', '2,9', 'Most_Popular', 'noimageblogs.png', '', '<p>d</p>', 'd', 1, '2020-01-12 14:39:52', '1', '2020-01-12 15:27:53', '1'),
(13, 'Popular5', 'popular5', '4,8', 'Video_Review', 'noimageblogs.png', '', '<p>e</p>', 'e', 1, '2020-01-12 14:40:10', '1', '2020-01-12 17:31:27', '1'),
(14, 'Popular6', 'popular6', '2,5,8', 'Video_Review', 'noimageblogs.png', '', '<p>f</p>', 'f', 1, '2020-01-12 14:40:35', '1', '2020-01-12 17:31:14', '1'),
(15, 'Video Tips1', 'video-tips1', '2,3,5', 'Video_Tips', 'noimageblogs.png', '', '<p>a</p>', 'a', 1, '2020-01-12 15:29:55', '1', '0000-00-00 00:00:00', ''),
(16, 'Video Tips2', 'video-tips2', '2,5', 'Video_Tips', 'noimageblogs.png', '', '<p>b</p>', 'b', 1, '2020-01-12 15:30:15', '1', '0000-00-00 00:00:00', ''),
(17, 'Video Tips3', 'video-tips3', '5,7', 'Video_Review', 'noimageblogs.png', '', '<p>c</p>', 'c', 1, '2020-01-12 15:31:18', '1', '2020-01-12 17:31:58', '1'),
(18, 'Video Review1', 'video-review1', '3,7,9', 'Video_Review', 'noimageblogs.png', 'https://www.youtube.com/watch?v=nTRBINu1cNk', '<p>a</p>', 'a', 1, '2020-01-12 15:40:37', '1', '0000-00-00 00:00:00', ''),
(19, 'Video Review2', 'video-review2', '6,9', 'Video_Review', 'noimageblogs.png', 'https://www.youtube.com/watch?v=nTRBINu1cNk', '<p>b</p>', 'b', 1, '2020-01-12 15:41:24', '1', '0000-00-00 00:00:00', ''),
(20, 'Video Review3', 'video-review3', '2,9', 'Video_Review', 'noimageblogs.png', 'https://www.youtube.com/watch?v=nTRBINu1cNk', '<p>c</p>', 'c', 1, '2020-01-12 15:41:45', '1', '0000-00-00 00:00:00', ''),
(21, 'Video Review4', 'video-review4', '1,2,9', 'Trending_Now', 'noimageblogs.png', 'https://www.youtube.com/watch?v=nTRBINu1cNk', '<p>d</p>', 'd', 1, '2020-01-12 15:42:04', '1', '2020-01-12 17:32:46', '1'),
(22, 'Video Review5', 'video-review5', '1,2,3,6,7,9', 'Most_Popular', 'noimageblogs.png', 'https://www.youtube.com/watch?v=nTRBINu1cNk', '<p>e</p>', 'e', 1, '2020-01-12 15:42:59', '1', '2020-01-12 16:27:20', '1'),
(23, 'Indonesia Merdeka', 'indonesia-merdeka', '5,9', 'Slide', 'noimageblogs.png', 'https://www.youtube.com/watch?v=Bey4XXJAqS8', '<p>a</p>', 'a', 1, '2020-01-14 01:46:14', '1', '0000-00-00 00:00:00', ''),
(24, 'Amazing Slide', 'amazing-slide', '1,3', 'Slide', '14-01-2020_085044_amazing_slide.jpg', '', '<p>aa</p>', 'aa', 1, '2020-01-14 01:50:44', '1', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `blogs_category`
--

CREATE TABLE `blogs_category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(100) NOT NULL,
  `cat_slug` varchar(100) NOT NULL,
  `cat_color` varchar(100) NOT NULL,
  `cat_description` text NOT NULL,
  `cat_image` varchar(255) NOT NULL,
  `cat_created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `cat_created_by` varchar(50) NOT NULL,
  `cat_edited_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `cat_edited_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `blogs_category`
--

INSERT INTO `blogs_category` (`cat_id`, `cat_name`, `cat_slug`, `cat_color`, `cat_description`, `cat_image`, `cat_created_at`, `cat_created_by`, `cat_edited_at`, `cat_edited_by`) VALUES
(1, 'Travelling', 'travelling', '#0000ff', 'All about traveling', '11-01-2020_171545_travelling.jpg', '2020-01-11 10:15:45', '1', '2020-01-11 10:15:45', '1'),
(2, 'Culinary', 'culinary', '#ff0000', 'All about culinary', '11-01-2020_171235_culinary.jpg', '2020-01-11 10:12:35', '1', '2020-01-11 10:12:35', '1'),
(3, 'Fashion', 'fashion', '#ff00ff', 'All about fashion', '11-01-2020_171255_reviews.jpg', '2020-01-11 10:15:56', '1', '2020-01-11 10:15:56', '1'),
(4, 'Sosial', 'sosial', '#808080', 'All about sosial', '11-01-2020_171319_sosial.png', '2020-01-11 10:13:19', '1', '0000-00-00 00:00:00', ''),
(5, 'Education', 'education', '#0000ff', 'All about education', '11-01-2020_171438_education.png', '2020-01-11 10:14:38', '1', '0000-00-00 00:00:00', ''),
(6, 'Shopping', 'shopping', '#00ff00', 'All about shopping', '11-01-2020_171623_shopping_.png', '2020-01-11 23:16:22', '1', '2020-01-11 23:16:22', '1'),
(7, 'Tips', 'tips', '#c0c0c0', 'All about tips', '11-01-2020_171647_tips.jpg', '2020-01-11 10:16:47', '1', '0000-00-00 00:00:00', ''),
(8, 'Activity', 'activity', '#00ffff', 'All about activity', '11-01-2020_171713_activity.jpg', '2020-01-11 10:17:13', '1', '0000-00-00 00:00:00', ''),
(9, 'Review', 'review', '#8080ff', 'All about review', '11-01-2020_171734_review.jpg', '2020-01-11 10:17:34', '1', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `iconbar`
--

CREATE TABLE `iconbar` (
  `icb_id` int(11) NOT NULL,
  `icb_name` varchar(100) NOT NULL,
  `icb_slug` varchar(100) NOT NULL,
  `icb_image` varchar(120) NOT NULL,
  `icb_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `icb_created_by` varchar(50) NOT NULL,
  `icb_edited_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `icb_edited_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `iconbar`
--

INSERT INTO `iconbar` (`icb_id`, `icb_name`, `icb_slug`, `icb_image`, `icb_created_at`, `icb_created_by`, `icb_edited_at`, `icb_edited_by`) VALUES
(3, 'Blogs', 'blogs', '14012020_081037blogs.png', '2020-01-12 06:03:03', '1', '2020-01-14 01:10:37', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menubar`
--

CREATE TABLE `menubar` (
  `mnb_id` int(11) NOT NULL,
  `mnb_name` varchar(100) NOT NULL,
  `mnb_slug` varchar(100) NOT NULL,
  `mnb_image` varchar(120) NOT NULL,
  `mnb_created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `mnb_created_by` varchar(50) NOT NULL,
  `mnb_edited_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `mnb_edited_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menubar`
--

INSERT INTO `menubar` (`mnb_id`, `mnb_name`, `mnb_slug`, `mnb_image`, `mnb_created_at`, `mnb_created_by`, `mnb_edited_at`, `mnb_edited_by`) VALUES
(2, 'Menu Bar', 'menu-bar', '14-01-2020_080655_menu_bar.png', '2020-01-14 01:06:55', '1', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pages`
--

CREATE TABLE `pages` (
  `pgs_id` int(11) NOT NULL,
  `pgs_name` varchar(255) NOT NULL,
  `pgs_slug` varchar(255) NOT NULL,
  `pgs_image` varchar(255) NOT NULL,
  `pgs_maps_link` text NOT NULL,
  `pgs_text_content` text NOT NULL,
  `pgs_tags` varchar(255) NOT NULL,
  `pgs_created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `pgs_created_by` varchar(50) NOT NULL,
  `pgs_edited_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `pgs_edited_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pages`
--

INSERT INTO `pages` (`pgs_id`, `pgs_name`, `pgs_slug`, `pgs_image`, `pgs_maps_link`, `pgs_text_content`, `pgs_tags`, `pgs_created_at`, `pgs_created_by`, `pgs_edited_at`, `pgs_edited_by`) VALUES
(1, 'About', 'about', '12-01-2020_161109_about.jpeg', '', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br></p>', 'about blogs,blogs,about', '2020-01-12 09:11:09', '1', '2020-01-12 09:11:09', '1'),
(2, 'Contact Us', 'contact-us', '12-01-2020_152519_contact_us.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.3037207735074!2d106.70686131431016!3d-6.223624662685118!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69fa1cfe0e4a87%3A0x9a1f26c4d5612d1f!2sCBD%20Ciledug!5e0!3m2!1sen!2sid!4v1578819776775!5m2!1sen!2sid\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\"></iframe>', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br></p>', 'contact us,contact blogs,contact website', '2020-01-12 09:07:19', '1', '2020-01-12 09:07:19', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `usr_id` int(11) NOT NULL,
  `usr_lvl_id` int(11) NOT NULL,
  `usr_fullname` varchar(50) NOT NULL,
  `usr_slug` varchar(50) NOT NULL,
  `usr_email` varchar(50) NOT NULL,
  `usr_password` varchar(255) NOT NULL,
  `usr_phone` varchar(13) NOT NULL,
  `usr_address` text NOT NULL,
  `usr_photo` varchar(255) NOT NULL,
  `usr_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `usr_created_by` varchar(50) NOT NULL,
  `usr_edited_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `usr_edited_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`usr_id`, `usr_lvl_id`, `usr_fullname`, `usr_slug`, `usr_email`, `usr_password`, `usr_phone`, `usr_address`, `usr_photo`, `usr_created_at`, `usr_created_by`, `usr_edited_at`, `usr_edited_by`) VALUES
(1, 1, '1392', '1392', '1392@gmail.com', '$argon2id$v=19$m=1024,t=2,p=2$dWo0Z0ZRR1NaQ3RlZTVRMw$Yuw4kD643AOjGOx3C/H6CFfysTd+U6zaLlN5s+20XVg', '082112692011', 'GG. H Ahad, Parung Jaya, Karang Tengah', '07-01-2020_105229_1392_-_edited.jpg', '2020-01-07 02:34:48', '', '2020-01-07 13:08:20', ''),
(3, 2, 'medin', 'medin', 'medin@gmail.com', '$argon2id$v=19$m=1024,t=2,p=2$TkpVVGtTQkJJTDFnc1ZXTw$lLI6wtlj3fTI5kaoqunU9sLq4dGbpzm0xj70UFbb6hI', '0891111111111', 'MJ', '07-01-2020_110716_medin.jpg', '2020-01-07 02:38:52', '', '2020-01-15 09:35:42', '1'),
(5, 2, 'copywritter', 'copywritter', 'copywritter@1392.id', '$argon2id$v=19$m=1024,t=2,p=2$YXVsYTViRjFlVzROemRBNQ$J9KAlx4UTht+PvHZL6zaumlTOpMHE23RWAKpdCqlPHg', '0861111111111', 'MJ', 'nophoto.png', '2020-01-07 02:42:49', '', '2020-01-07 13:08:37', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_level`
--

CREATE TABLE `users_level` (
  `lvl_id` int(11) NOT NULL,
  `lvl_name` varchar(50) NOT NULL,
  `lvl_slug` varchar(50) NOT NULL,
  `lvl_description` text NOT NULL,
  `lvl_created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `lvl_created_by` varchar(50) NOT NULL,
  `lvl_edited_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `lvl_edited_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users_level`
--

INSERT INTO `users_level` (`lvl_id`, `lvl_name`, `lvl_slug`, `lvl_description`, `lvl_created_at`, `lvl_created_by`, `lvl_edited_at`, `lvl_edited_by`) VALUES
(1, 'Admin', 'admin', 'Creates, Updates, Delete, and Views', '2020-01-06 15:13:26', '', '0000-00-00 00:00:00', ''),
(2, 'Writter', 'writter', 'Creates, Updates, and Views', '2020-01-06 15:18:52', '', '0000-00-00 00:00:00', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`ads_id`);

--
-- Indeks untuk tabel `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`blg_id`);

--
-- Indeks untuk tabel `blogs_category`
--
ALTER TABLE `blogs_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indeks untuk tabel `iconbar`
--
ALTER TABLE `iconbar`
  ADD PRIMARY KEY (`icb_id`);

--
-- Indeks untuk tabel `menubar`
--
ALTER TABLE `menubar`
  ADD PRIMARY KEY (`mnb_id`);

--
-- Indeks untuk tabel `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`pgs_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usr_id`);

--
-- Indeks untuk tabel `users_level`
--
ALTER TABLE `users_level`
  ADD PRIMARY KEY (`lvl_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `ads`
--
ALTER TABLE `ads`
  MODIFY `ads_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `blogs`
--
ALTER TABLE `blogs`
  MODIFY `blg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `blogs_category`
--
ALTER TABLE `blogs_category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `iconbar`
--
ALTER TABLE `iconbar`
  MODIFY `icb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `menubar`
--
ALTER TABLE `menubar`
  MODIFY `mnb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pages`
--
ALTER TABLE `pages`
  MODIFY `pgs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `usr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users_level`
--
ALTER TABLE `users_level`
  MODIFY `lvl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
