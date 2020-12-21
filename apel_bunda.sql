/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 10.5.4-MariaDB : Database - db_apel_bunda
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `ab_user` */

insert  into `ab_user`(`user_id`,`user_username`,`user_email`,`user_password`,`user_bio`,`user_role`,`user_date`) values 
(1,'luzion','luzion@gmail.com','123123',NULL,2,'2020-12-07 01:02:54'),
(2,'eki','eki@m_eki.com','123123',NULL,1,'2020-12-07 01:03:38'),
(3,'ekohadi',NULL,'123123',NULL,1,'2020-12-16 23:11:48'),
(4,'megawati','asd@asdwa.awda','123123',NULL,NULL,'2020-12-16 23:52:02');

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

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
