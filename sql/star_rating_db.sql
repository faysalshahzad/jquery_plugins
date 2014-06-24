/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.6.16 : Database - star_rating
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`star_rating` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `star_rating`;

/*Table structure for table `product_rating` */

DROP TABLE IF EXISTS `product_rating`;

CREATE TABLE `product_rating` (
  `id` varchar(50) NOT NULL,
  `product_name` varchar(64) DEFAULT NULL,
  `rating_1` int(11) DEFAULT NULL,
  `rating_2` int(11) DEFAULT NULL,
  `rating_3` int(11) DEFAULT NULL,
  `rating_4` int(11) DEFAULT NULL,
  `rating_5` int(11) DEFAULT NULL,
  `rating_sum` int(11) DEFAULT NULL,
  `rating_count` int(11) DEFAULT NULL,
  `avg_rating` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `product_rating` */

insert  into `product_rating`(`id`,`product_name`,`rating_1`,`rating_2`,`rating_3`,`rating_4`,`rating_5`,`rating_sum`,`rating_count`,`avg_rating`) values ('1','bellisima',3,8,4,5,12,111,32,3.5),('2','funkenfeuer',3,4,1,6,3,53,17,3),('3','gloria',4,25,5,33,23,152,38,4),('4','sweetheart',33,2,5,7,12,140,59,2.5),('5','lovely sunset',4,5,4,4,55,317,72,4.5);

/* Trigger structure for table `product_rating` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `trigger_rating_sum_avg` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `trigger_rating_sum_avg` BEFORE UPDATE ON `product_rating` FOR EACH ROW BEGIN
	SET NEW.`rating_count` = NEW.`rating_1`+NEW.`rating_2`+NEW.`rating_3`+NEW.`rating_4`+NEW.`rating_5`;
	SET NEW.`rating_sum` = NEW.`rating_1`*1 + NEW.`rating_2`*2 + NEW.`rating_3`*3 + NEW.`rating_4`*4 + NEW.`rating_5`*5;
	SET NEW.`avg_rating` = ROUND((NEW.`rating_sum`/ NEW.`rating_count`) * 2) / 2;
	END */$$


DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
