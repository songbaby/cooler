/*
SQLyog Enterprise - MySQL GUI v8.14 
MySQL - 5.5.5-10.1.9-MariaDB : Database - cooler
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`cooler` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `cooler`;

/*Table structure for table `c_info_cooler` */

DROP TABLE IF EXISTS `c_info_cooler`;

CREATE TABLE `c_info_cooler` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT 'boss',
  `lianxiren_id` int(4) DEFAULT NULL,
  `lat` double DEFAULT NULL,
  `lng` double DEFAULT NULL,
  `note` text,
  `price` float DEFAULT NULL,
  `province` int(4) DEFAULT '1',
  `city` int(4) DEFAULT '1',
  `county` int(4) DEFAULT '1',
  `town` int(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

/*Data for the table `c_info_cooler` */

insert  into `c_info_cooler`(`id`,`name`,`lianxiren_id`,`lat`,`lng`,`note`,`price`,`province`,`city`,`county`,`town`) values (1,'东运冷库',1,35.079983,116.235237,NULL,NULL,1,1,1,5),(2,'恒泰冷库',2,35.079392,116.184357,NULL,NULL,1,1,1,2),(3,'金门冷库',3,35.179392,116.184357,NULL,NULL,1,1,1,5),(4,'宏泰集团万吨冷库',1,NULL,NULL,NULL,NULL,1,1,1,1),(5,'东泰冷库',1,NULL,NULL,NULL,NULL,1,1,1,1),(6,'金乡县文峰冷库',1,NULL,NULL,NULL,NULL,1,1,1,1),(7,'金利源冷库',1,NULL,NULL,NULL,NULL,1,1,1,1),(8,'兄弟冷库',1,NULL,NULL,NULL,NULL,1,1,1,1),(9,'金乡县金乡街道华诚蒜业冷库',1,1,NULL,NULL,NULL,1,1,1,1),(10,'汇满鑫冷库',1,NULL,NULL,NULL,NULL,1,1,1,1),(11,'国庆冷库',1,NULL,NULL,NULL,NULL,1,1,1,1),(12,'boss',1,NULL,NULL,NULL,NULL,1,1,1,1);

/*Table structure for table `c_info_lianxiren` */

DROP TABLE IF EXISTS `c_info_lianxiren`;

CREATE TABLE `c_info_lianxiren` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT 'baby',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `c_info_lianxiren` */

insert  into `c_info_lianxiren`(`id`,`name`) values (1,'刘东'),(2,'刘恒');

/*Table structure for table `c_loc_city` */

DROP TABLE IF EXISTS `c_loc_city`;

CREATE TABLE `c_loc_city` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  `pid` int(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `c_loc_city` */

insert  into `c_loc_city`(`id`,`name`,`pid`) values (1,'济宁市',1),(2,'潍坊市',1),(3,NULL,NULL);

/*Table structure for table `c_loc_county` */

DROP TABLE IF EXISTS `c_loc_county`;

CREATE TABLE `c_loc_county` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  `pid` int(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `c_loc_county` */

insert  into `c_loc_county`(`id`,`name`,`pid`) values (1,'金乡县',1),(2,'寿光市',2);

/*Table structure for table `c_loc_province` */

DROP TABLE IF EXISTS `c_loc_province`;

CREATE TABLE `c_loc_province` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `c_loc_province` */

insert  into `c_loc_province`(`id`,`name`) values (1,'山东省');

/*Table structure for table `c_loc_town` */

DROP TABLE IF EXISTS `c_loc_town`;

CREATE TABLE `c_loc_town` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  `pid` int(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

/*Data for the table `c_loc_town` */

insert  into `c_loc_town`(`id`,`name`,`pid`) values (1,'金乡街道',1),(2,'高河街道',1),(3,'王丕街道',1),(4,'鱼山街道',1),(5,'兴隆镇',1),(6,'司马镇',1),(7,'霄云镇',1),(8,'鸡黍镇',1),(9,'马庙镇',1),(10,'胡集镇',1),(11,'卜集镇',1),(12,'羊山镇',1),(13,'化雨镇',1),(14,'金乡经济开发区',1),(15,'济宁食品工业开发区',1),(16,'济宁化学工业开发区',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
