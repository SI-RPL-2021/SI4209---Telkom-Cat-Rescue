/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.4.10-MariaDB : Database - tubes_kelompok_7
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `adopsi` */

DROP TABLE IF EXISTS `adopsi`;

CREATE TABLE `adopsi` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `kucing_id` int(10) DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL,
  `alasan_adopsi` text DEFAULT NULL,
  `is_adoption` enum('0','1') DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `adopsi` */

insert  into `adopsi`(`id`,`kucing_id`,`user_id`,`alasan_adopsi`,`is_adoption`) values 
(2,4,2,'Saya pecinta kucing','1'),
(3,6,2,'Saya suka kucing...','1');

/*Table structure for table `kucing` */

DROP TABLE IF EXISTS `kucing`;

CREATE TABLE `kucing` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL,
  `judul_iklan` varchar(200) DEFAULT NULL,
  `nama_kucing` varchar(200) DEFAULT NULL,
  `jenis` varchar(200) DEFAULT NULL,
  `umur` varchar(200) DEFAULT NULL,
  `status` enum('pending','acc','deny') DEFAULT 'pending',
  `deskripsi` longtext DEFAULT NULL,
  `is_adopted` enum('0','1') DEFAULT '0',
  `jenis_kelamin` enum('Jantan','Betina') DEFAULT NULL,
  `tanggal_konfirmasi` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `kucing_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Data for the table `kucing` */

insert  into `kucing`(`id`,`user_id`,`foto`,`judul_iklan`,`nama_kucing`,`jenis`,`umur`,`status`,`deskripsi`,`is_adopted`,`jenis_kelamin`,`tanggal_konfirmasi`) values 
(4,7,'cat1.jpg','Adopsi Kucing Blalalsda','Mimo','Persia Anggora','Young','acc','Kucing ini sangat cantik','1','Jantan','2020-12-17 21:30:49'),
(5,7,'cat-banner.png','Kucing bla bal balbadsa','Anto','aasdasd','Kitten','acc','asdad','0','Jantan','2020-12-17 21:30:49'),
(6,7,'Portfolio Update-bro.png','Kucing Persia Anggora','Jet','Persia Mix Anggora','Kitten','acc','Kucing ini balbalba\r\n\r\nalhjsdlakjsflajsda\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','1','Jantan','2020-12-17 21:30:49');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `akses` enum('admin','user') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id`,`nama`,`email`,`password`,`no_hp`,`akses`) values 
(2,'Maulidya Ardhini','admin@admin.com','123456789','0831818242','admin'),
(7,'Wader Jhonson','jhonsonwader@gmail.com','123456','083181826488','user');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
