/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 5.7.9 : Database - dogshop
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`dogshop` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `dogshop`;

/*Table structure for table `tbl_breed` */

DROP TABLE IF EXISTS `tbl_breed`;

CREATE TABLE `tbl_breed` (
  `breed_id` int(11) NOT NULL AUTO_INCREMENT,
  `breed_name` varchar(15) NOT NULL,
  `breed_status` varchar(10) NOT NULL,
  PRIMARY KEY (`breed_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `tbl_breed` */

/*Table structure for table `tbl_card` */

DROP TABLE IF EXISTS `tbl_card`;

CREATE TABLE `tbl_card` (
  `card_id` int(11) NOT NULL AUTO_INCREMENT,
  `cust_id` int(11) NOT NULL,
  `card_no` varchar(20) NOT NULL,
  `bank_name` varchar(20) NOT NULL,
  `card_type` varchar(20) NOT NULL,
  `exp_date` varchar(20) NOT NULL,
  `card_status` varchar(25) NOT NULL,
  PRIMARY KEY (`card_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `tbl_card` */

/*Table structure for table `tbl_cartchild` */

DROP TABLE IF EXISTS `tbl_cartchild`;

CREATE TABLE `tbl_cartchild` (
  `cart_child_id` int(11) NOT NULL AUTO_INCREMENT,
  `cart_master_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `qty` decimal(20,0) DEFAULT NULL,
  `total_price` decimal(12,2) DEFAULT NULL,
  PRIMARY KEY (`cart_child_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `tbl_cartchild` */

/*Table structure for table `tbl_cartmaster` */

DROP TABLE IF EXISTS `tbl_cartmaster`;

CREATE TABLE `tbl_cartmaster` (
  `cart_master_id` int(11) NOT NULL AUTO_INCREMENT,
  `cust_id` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `total_amount` decimal(12,2) NOT NULL,
  PRIMARY KEY (`cart_master_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `tbl_cartmaster` */

/*Table structure for table `tbl_customer` */

DROP TABLE IF EXISTS `tbl_customer`;

CREATE TABLE `tbl_customer` (
  `cust_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `cust_fname` varchar(10) NOT NULL,
  `cust_lname` varchar(10) NOT NULL,
  `cust_phone` decimal(10,0) NOT NULL,
  `cust_hname` varchar(30) NOT NULL,
  `cust_street` varchar(25) NOT NULL,
  `cust_district` varchar(15) NOT NULL,
  `cust_pincode` int(6) NOT NULL,
  `cust_date` varchar(10) NOT NULL,
  PRIMARY KEY (`cust_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `tbl_customer` */

/*Table structure for table `tbl_gender` */

DROP TABLE IF EXISTS `tbl_gender`;

CREATE TABLE `tbl_gender` (
  `gender_id` int(11) NOT NULL AUTO_INCREMENT,
  `gender_name` varchar(20) NOT NULL,
  PRIMARY KEY (`gender_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `tbl_gender` */

/*Table structure for table `tbl_item` */

DROP TABLE IF EXISTS `tbl_item`;

CREATE TABLE `tbl_item` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `gender_id` int(11) NOT NULL,
  `breed_id` int(11) NOT NULL,
  `description` varchar(200) NOT NULL,
  `item_image` varchar(1000) NOT NULL,
  `age` int(11) NOT NULL,
  `price` varchar(25) NOT NULL,
  `stock` varchar(12) NOT NULL,
  `item_status` varchar(15) NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `tbl_item` */

/*Table structure for table `tbl_login` */

DROP TABLE IF EXISTS `tbl_login`;

CREATE TABLE `tbl_login` (
  `username` varchar(30) NOT NULL,
  `password` varchar(10) NOT NULL,
  `user_type` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `tbl_login` */

/*Table structure for table `tbl_order` */

DROP TABLE IF EXISTS `tbl_order`;

CREATE TABLE `tbl_order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `cart_master_id` int(11) NOT NULL,
  `o_date` varchar(10) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `tbl_order` */

/*Table structure for table `tbl_payment` */

DROP TABLE IF EXISTS `tbl_payment`;

CREATE TABLE `tbl_payment` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `card_id` int(11) NOT NULL,
  `payment_date` varchar(10) NOT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `tbl_payment` */

/*Table structure for table `tbl_purchase_child` */

DROP TABLE IF EXISTS `tbl_purchase_child`;

CREATE TABLE `tbl_purchase_child` (
  `pur_child_id` int(11) NOT NULL AUTO_INCREMENT,
  `pur_master_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` decimal(6,0) NOT NULL,
  `cost_price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`pur_child_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `tbl_purchase_child` */

/*Table structure for table `tbl_purchase_master` */

DROP TABLE IF EXISTS `tbl_purchase_master`;

CREATE TABLE `tbl_purchase_master` (
  `pur_master_id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `tot_amount` decimal(12,0) NOT NULL,
  `date` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`pur_master_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `tbl_purchase_master` */

/*Table structure for table `tbl_staff` */

DROP TABLE IF EXISTS `tbl_staff`;

CREATE TABLE `tbl_staff` (
  `staff_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `staff_fname` varchar(10) NOT NULL,
  `staff_lname` varchar(10) NOT NULL,
  `staff_phone` decimal(10,0) NOT NULL,
  `staff_hname` varchar(30) NOT NULL,
  `staff_street` varchar(25) NOT NULL,
  `staff_dist` varchar(15) NOT NULL,
  `staff_pin` int(6) NOT NULL,
  `staff_date` varchar(10) NOT NULL,
  PRIMARY KEY (`staff_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `tbl_staff` */

/*Table structure for table `tbl_vaccination` */

DROP TABLE IF EXISTS `tbl_vaccination`;

CREATE TABLE `tbl_vaccination` (
  `vaccination_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `vacc_type` varchar(30) NOT NULL,
  `vacc_date` varchar(10) NOT NULL,
  `vacc_dose` varchar(5) NOT NULL,
  PRIMARY KEY (`vaccination_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `tbl_vaccination` */

/*Table structure for table `tbl_vendor` */

DROP TABLE IF EXISTS `tbl_vendor`;

CREATE TABLE `tbl_vendor` (
  `vendor_id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) NOT NULL,
  `vendor_name` varchar(20) NOT NULL,
  `vendor_phone` decimal(10,0) NOT NULL,
  `vendor_hname` varchar(10) NOT NULL,
  `vender_street` varchar(25) NOT NULL,
  `vendor_dist` varchar(30) NOT NULL,
  `vendor_pin` int(6) NOT NULL,
  `vendor_date` varchar(10) NOT NULL,
  `vendor_status` varchar(10) NOT NULL,
  PRIMARY KEY (`vendor_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `tbl_vendor` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
