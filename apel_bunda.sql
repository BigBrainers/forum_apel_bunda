/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 10.4.17-MariaDB : Database - db_apel_bunda
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_apel_bunda` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_apel_bunda`;

/*Table structure for table `ab_user` */

DROP TABLE IF EXISTS `ab_user`;

CREATE TABLE `ab_user` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_username` varchar(32) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `user_bio` text DEFAULT NULL,
  `user_role` int(10) unsigned DEFAULT NULL,
  `user_date` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`user_id`),
  KEY `user_role` (`user_role`),
  CONSTRAINT `ab_user_ibfk_1` FOREIGN KEY (`user_role`) REFERENCES `ab_user_roles` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `ab_user` */

insert  into `ab_user`(`user_id`,`user_username`,`user_email`,`user_password`,`user_bio`,`user_role`,`user_date`) values 
(1,'luzion','luzion@gmail.com','123123','awdawdawd',2,'2020-12-07 01:02:54'),
(2,'eki','eki@m_eki.com','123123','cuaks\r\n',1,'2020-12-07 01:03:38'),
(5,'tita','tita@stereowall.com','123123','ciuuuuu',1,'2020-12-29 04:58:05');

/*Table structure for table `ab_user_roles` */

DROP TABLE IF EXISTS `ab_user_roles`;

CREATE TABLE `ab_user_roles` (
  `role_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `ab_user_roles` */

insert  into `ab_user_roles`(`role_id`,`role_name`) values 
(1,'user'),
(2,'admin');

/*Table structure for table `answer` */

DROP TABLE IF EXISTS `answer`;

CREATE TABLE `answer` (
  `a_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `a_date` datetime DEFAULT current_timestamp(),
  `a_user_id` int(11) unsigned DEFAULT NULL,
  `a_question_id` int(11) unsigned DEFAULT NULL,
  `a_author_id` int(11) DEFAULT NULL,
  `a_issolution` tinyint(1) DEFAULT NULL,
  `a_body` text DEFAULT NULL,
  PRIMARY KEY (`a_id`),
  KEY `a_user_id_fka` (`a_user_id`),
  KEY `a_question_id_fk1` (`a_question_id`),
  CONSTRAINT `a_question_id_fk1` FOREIGN KEY (`a_question_id`) REFERENCES `question` (`q_id`),
  CONSTRAINT `a_user_id_fka` FOREIGN KEY (`a_user_id`) REFERENCES `ab_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

/*Data for the table `answer` */

insert  into `answer`(`a_id`,`a_date`,`a_user_id`,`a_question_id`,`a_author_id`,`a_issolution`,`a_body`) values 
(2,'2020-12-29 03:14:01',1,11,2,0,'kdfjnvdfnv'),
(5,'2020-12-30 19:27:02',1,25,5,1,'kodok'),
(15,'2020-12-31 00:01:53',1,29,1,0,'ewewewewewewewewewe'),
(19,'2020-12-31 00:52:05',1,11,2,1,'hashhhhhh'),
(21,'2020-12-31 03:12:50',1,34,2,1,'halah ngtd!'),
(38,'2021-01-10 17:43:22',1,35,2,1,'yoih'),
(39,'2021-01-10 17:43:54',1,32,2,1,'rite!\r\n'),
(40,'2021-01-10 17:56:06',5,32,2,0,'kiss!');

/*Table structure for table `question` */

DROP TABLE IF EXISTS `question`;

CREATE TABLE `question` (
  `q_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `q_title` varchar(255) DEFAULT NULL,
  `q_body` text DEFAULT NULL,
  `q_user_id` int(11) unsigned DEFAULT NULL,
  `q_ishassolution` tinyint(1) DEFAULT NULL,
  `q_date` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`q_id`),
  KEY `q_user_id_fkq` (`q_user_id`),
  CONSTRAINT `q_user_id_fkq` FOREIGN KEY (`q_user_id`) REFERENCES `ab_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

/*Data for the table `question` */

insert  into `question`(`q_id`,`q_title`,`q_body`,`q_user_id`,`q_ishassolution`,`q_date`) values 
(11,'afswewse','Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et Malorum for use in a type specimen book. It usually begins with:\r\n\r\n    “Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.”\r\n\r\nThe purpose of lorem ipsum is to create a natural looking block of text (sentence, paragraph, page, etc.) that doesn\'t distract from the layout. A practice not without controversy, laying out pages with meaningless filler text can be very useful when the focus is meant to be on design, not content.\r\n\r\nThe passage experienced a surge in popularity during the 1960s when Letraset used it on their dry-transfer sheets, and again during the 90s as desktop publishers bundled the text with their software. Today it\'s seen all around the web; on templates, websites, and stock designs. Use our generator to get your own, or read on for the authoritative history of lorem ipsum. ',2,1,'2020-12-25 21:32:49'),
(25,'jangan di zoom','Petualangan vokalis Stereowall, Cynantia Pratita kandas di ajang kompetesi Indonesian Idol. Menyayikan lagu Pupus dengan aransemen full band, Cynantia yang khas dengan suara garang dan scream belum berhasil meyakinkan juri untuk bisa melanjutkan ke babak Eliminasi 3. Padahal, banyak netizen yang berharap jika wanita berusia 26 tahun ini bisa tampil di panggung Spektakuler Indonesian Idol Spesial Season. Dengan karakter suara yang khas dan biasa tampil dengan aliran musik pop punk dan post hardcore, Cynantia sebenarnya bisa menjadi pembeda di Indonesian Idol yang selama ini banyak diisi suara dengan genre, jazz, R N B, Pop dan rock. Namun, panggung sebesar Indonesian Idol nampaknya belum bisa menampung bakat dan keunikan apa yang disajikan Cynantia. Lajunya terhenti di babak Eliminasi 2 dengan tema best cover, dimana para peserta dibagi dalam beberapa kelompok dan berlomba untuk memberikan cover terbaik dengan gayanya sendiri. AYO BACA : Profil Cynantia Pratita Peserta Indonesian Idol Bergenre Pop Punk Menurut juri Ari Lasso, penampilan Cynantia sebenarnya bisa menjadi pembeda, namun saat membawakan lagu Pupus dengan cover khas band, masih belum bisa meyakinkan para juri untuk melanjutkan ke babak berikutnya. “Aku tuh selalu suka underdog, suka orang-orang yang diremehkan (lalu bangkit). Kamu unik, Karaktermu khas. Namun, Penampilanmu hari ini yang jadi masalah. Indonesian Idol menuntut lebih dari itu. PR-mu masih luar biasa besar untuk meyakinkan kami,” ujar Ari Lasso. Meskipun tidak lolos, Cynantia tetap bangga sudah menunjukkan kemampuannya. AYO BACA : Karen Claudia Dibilang Mirip Ashanty, Tapi Netizen Bilang Gak Mirip “Meksipun aku ga lolos, aku lebih terhormat tereminiasi dengan gayaku sendiri,” ujar Cynantia. Dan, dukungan buat Cynantia pun terus mengalir dari netizen. Di tayangan You Tube komentar positif berdatangan. Diantaranya, yang menyebutkan jika gaya bermusik Cynantia tidak akan pernah mendapatkan tempat di panggung musik mainstream. “Tita di eliminasi ? wah Juri yang sangat Bijak .. Terima Kasih Para juri telah Membebaskan Dan Membiarkan Tita Untuk selamat dari Aliran Musik Yang mainstream :),” ujar akun @Cukup Tau Aja. Ada juga komentar dukungan seperti ini: “RCTI tidak bisa melihat.... Dengan adanya cynantia bisa makin meningkatkan ranking ..orang yg menyukaii gentre musik seperti cynantia akan mananti penampilannya.......parah,” ujar akun @Gunawan. Netizen juga beranggapan jika Indonesian Idol memang mencari pasar yang populer, bukan untuk aliran indie seperti post hardcore, dan pop punk.\r\n\r\n---------\r\nArtikel ini sudah Terbit di AyoCirebon.com, dengan Judul Cynantia Pratita: Aku Lebih Terhormat Tereliminasi Dengan Gayaku Sendiri!, pada URL https://www.ayocirebon.com/read/2020/12/08/7285/cynantia-pratita-aku-lebih-terhormat-tereliminasi-dengan-gayaku-sendiri\r\n\r\nPenulis: A. Dadan Muhanda\r\nEditor : A. Dadan Muhanda',5,1,'2020-12-29 05:02:29'),
(29,'wewed','ckewekwekwekwkee',1,0,'2020-12-30 23:46:43'),
(32,'sadsbda.wb','slkdfnlasekmnf/ew rfqerfwqd',2,1,'2020-12-31 00:18:45'),
(34,'How can i resolve the css warnings for browser specific selectors in Bootstrap 3?','The most important thing to note is that Chrome is telling you that it thinks those CSS selectors are invalid. That does not, however, mean they\'re inherently and/or universally invalid or that you\'ve erred in some way.\r\n\r\n<b>Two foundational coding points:</b>\r\n\r\n    Browsers (usually) ignore most things they don\'t understand and that generally goes for CSS as well.\r\n    While browsers try to adhere to the core specifications, when it comes to CSS they\'re notorious for having their own CSS attributes for certain things, especially when supporting legacy browsers.\r\n\r\nSo, with those two things in mind, CSS writers who have a large, varied browser base to support (e.g., Twitter Bootstrap) will throw in all the CSS selectors and such for all browsers they intend to support, knowing that IE will ignore selectors supported by WebKit-based browsers, and Chrome will ignore IE-specifics, and so on.\r\n\r\nHere\'s a related article on this technique when handling gradients: CSS3 Linear Gradient Syntax Breakdown.\r\n\r\nAnother reason you might be seeing the warning recently is that\r\n\r\n    Chrome 27 was the last version to support WebKit.\r\n\r\nSo if you see a CSS warning for ',2,1,'2020-12-31 03:11:24'),
(35,'apakah gisel anastasya bohong?','Biodata Lengkap Gisella Anastasia Profil Gisella Anastasia – Gisella Anastasia atau yang dulunya lebih dikenal dengan nama Gisel Idol ini lahir di Surabaya, 16 November 1990. Dirinya merupakan salah satu finalis dari Indonesian Idol 2008. Saat ini, dirinya merupakan istri dari presenter kondang di Indonesia yaitu Gading Marten. Gisel mengawali karirnya lewat ajang pencarian bakat yaitu Indonesian Idol 2008. Namun namanya mulai melambung ketika dirinya bergabung dengan salah satu program lawak di televise swasta yaitu Opera Van Java sebagai seorang sinden. Karirnya sebagai seorang penyanyi dimulai ketika dirinya merilis single…',2,1,'2021-01-03 22:02:12');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
