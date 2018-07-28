/*
SQLyog Professional
MySQL - 10.1.31-MariaDB : Database - perpus2
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `anggota` */

DROP TABLE IF EXISTS `anggota`;

CREATE TABLE `anggota` (
  `id_anggota` int(5) NOT NULL AUTO_INCREMENT,
  `nama_anggota` varchar(255) DEFAULT NULL,
  `id_kelas` int(5) DEFAULT NULL,
  `id_jurusan` int(5) DEFAULT NULL,
  `alamat_anggota` varchar(255) DEFAULT NULL,
  `jk` varchar(1) DEFAULT NULL,
  `no_tlp` varchar(100) DEFAULT NULL,
  `angkatan` int(5) DEFAULT NULL,
  `nim_anggota` varchar(100) DEFAULT NULL,
  `password_anggota` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_anggota`),
  KEY `id_kelas` (`id_kelas`),
  KEY `id_jurusan` (`id_jurusan`),
  CONSTRAINT `anggota_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`),
  CONSTRAINT `anggota_ibfk_2` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `anggota` */

insert  into `anggota`(`id_anggota`,`nama_anggota`,`id_kelas`,`id_jurusan`,`alamat_anggota`,`jk`,`no_tlp`,`angkatan`,`nim_anggota`,`password_anggota`) values 
(1,'Budi',1,1,'Jogja','L','081211114444',2011,'123456','00dfc53ee86af02e742515cdcf075ed3');

/*Table structure for table `buku` */

DROP TABLE IF EXISTS `buku`;

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL AUTO_INCREMENT,
  `kode_buku` varchar(100) DEFAULT NULL,
  `gambar_buku` varchar(100) DEFAULT NULL,
  `judul_buku` varchar(255) DEFAULT NULL,
  `penerbit_buku` varchar(255) DEFAULT NULL,
  `id_jenis_buku` int(5) DEFAULT NULL,
  `id_kategori_buku` int(5) DEFAULT NULL,
  `jumlah_buku` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_buku`),
  KEY `jenis_buku` (`id_jenis_buku`),
  KEY `kategori_buku` (`id_kategori_buku`),
  CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`id_jenis_buku`) REFERENCES `jenis_buku` (`id_jenis_buku`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `buku_ibfk_2` FOREIGN KEY (`id_kategori_buku`) REFERENCES `kategori_buku` (`id_kategori_buku`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `buku` */

insert  into `buku`(`id_buku`,`kode_buku`,`gambar_buku`,`judul_buku`,`penerbit_buku`,`id_jenis_buku`,`id_kategori_buku`,`jumlah_buku`) values 
(2,'B_01','gambar.jpg','BUKU 1','PENERBIT 1',1,1,20),
(4,'BUKU_2','','buku keduaaaaaaaaaaaaaa','aaaaaaaaaaaaa',1,1,21),
(15,'B_03','file_1525599274.jpeg','BUKU 3','avaavavava',6,1,333),
(17,'tuutututu','file_1525600577.JPG','uuuuuuuuuuuuuu','uuuuuuuuuuu',6,1,77);

/*Table structure for table `detail_sirkulasi` */

DROP TABLE IF EXISTS `detail_sirkulasi`;

CREATE TABLE `detail_sirkulasi` (
  `id_detail_sirkulasi` int(5) NOT NULL AUTO_INCREMENT,
  `id_sirkulasi` int(11) DEFAULT NULL,
  `id_buku` int(11) DEFAULT NULL,
  `jumlah` int(3) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_detail_sirkulasi`),
  KEY `detail_sirkulasi_ibfk_2` (`id_buku`),
  KEY `detail_sirkulasi_ibfk_3` (`id_sirkulasi`),
  CONSTRAINT `detail_sirkulasi_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `detail_sirkulasi_ibfk_3` FOREIGN KEY (`id_sirkulasi`) REFERENCES `sirkulasi` (`id_sirkulasi`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `detail_sirkulasi` */

insert  into `detail_sirkulasi`(`id_detail_sirkulasi`,`id_sirkulasi`,`id_buku`,`jumlah`,`status`) values 
(1,47,2,5,'pinjam'),
(3,47,4,5,'pinjam'),
(6,60,4,5,'selesai'),
(7,60,2,1,'selesai'),
(8,61,2,4,'selesai'),
(9,61,4,1,'selesai');

/*Table structure for table `jenis_buku` */

DROP TABLE IF EXISTS `jenis_buku`;

CREATE TABLE `jenis_buku` (
  `id_jenis_buku` int(5) NOT NULL AUTO_INCREMENT,
  `jenis_buku` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_jenis_buku`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `jenis_buku` */

insert  into `jenis_buku`(`id_jenis_buku`,`jenis_buku`) values 
(1,'fiksi'),
(2,'non fiksi'),
(6,'tes22');

/*Table structure for table `jurusan` */

DROP TABLE IF EXISTS `jurusan`;

CREATE TABLE `jurusan` (
  `id_jurusan` int(5) NOT NULL AUTO_INCREMENT,
  `nama_jurusan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_jurusan`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `jurusan` */

insert  into `jurusan`(`id_jurusan`,`nama_jurusan`) values 
(1,'IPA'),
(2,'IPS'),
(3,'BAHASA');

/*Table structure for table `kategori_buku` */

DROP TABLE IF EXISTS `kategori_buku`;

CREATE TABLE `kategori_buku` (
  `id_kategori_buku` int(5) NOT NULL AUTO_INCREMENT,
  `kategori_buku` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_kategori_buku`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `kategori_buku` */

insert  into `kategori_buku`(`id_kategori_buku`,`kategori_buku`) values 
(1,'novel');

/*Table structure for table `kelas` */

DROP TABLE IF EXISTS `kelas`;

CREATE TABLE `kelas` (
  `id_kelas` int(5) NOT NULL AUTO_INCREMENT,
  `nama_kelas` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_kelas`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `kelas` */

insert  into `kelas`(`id_kelas`,`nama_kelas`) values 
(1,'X IPA 1'),
(2,'X IPS 1'),
(3,'XI IPA 1'),
(4,'XI IPS 1'),
(5,'XII IPA 1'),
(6,'XII IPS 1');

/*Table structure for table `petugas` */

DROP TABLE IF EXISTS `petugas`;

CREATE TABLE `petugas` (
  `id_petugas` int(5) NOT NULL AUTO_INCREMENT,
  `nama_petugas` varchar(200) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_petugas`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `petugas` */

insert  into `petugas`(`id_petugas`,`nama_petugas`,`username`,`password`) values 
(1,'Administrator','admin','21232f297a57a5a743894a0e4a801fc3');

/*Table structure for table `sirkulasi` */

DROP TABLE IF EXISTS `sirkulasi`;

CREATE TABLE `sirkulasi` (
  `id_sirkulasi` int(11) NOT NULL AUTO_INCREMENT,
  `kode_peminjaman` varchar(50) DEFAULT NULL,
  `id_anggota` int(5) DEFAULT NULL,
  `id_petugas` int(5) DEFAULT NULL,
  `tgl_pinjam` date DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `status_sirkulasi` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_sirkulasi`),
  KEY `id_petugas` (`id_petugas`),
  KEY `id_anggota` (`id_anggota`),
  CONSTRAINT `sirkulasi_ibfk_1` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `sirkulasi_ibfk_2` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;

/*Data for the table `sirkulasi` */

insert  into `sirkulasi`(`id_sirkulasi`,`kode_peminjaman`,`id_anggota`,`id_petugas`,`tgl_pinjam`,`tgl_kembali`,`status_sirkulasi`) values 
(47,'T001',1,1,'2018-05-06','2018-05-22','pinjam'),
(60,'T002',1,1,'2018-05-06','2018-05-29','pinjam'),
(61,'RTSdas',1,1,'2018-05-06','2018-05-22','selesai');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
