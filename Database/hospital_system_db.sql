/*
SQLyog Enterprise v13.1.1 (64 bit)
MySQL - 5.7.31 : Database - hospital_system_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`hospital_system_db` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `hospital_system_db`;

/*Table structure for table `tbl_admin` */

DROP TABLE IF EXISTS `tbl_admin`;

CREATE TABLE `tbl_admin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `admin_email` varchar(20) NOT NULL,
  `admin_password` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_admin` */

/*Table structure for table `tbl_appointment` */

DROP TABLE IF EXISTS `tbl_appointment`;

CREATE TABLE `tbl_appointment` (
  `appointment_id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) DEFAULT NULL,
  `doc_id` int(11) DEFAULT NULL,
  `doctor_name` varchar(255) DEFAULT NULL,
  `doc_category` varchar(255) DEFAULT NULL,
  `appointment_day` varchar(255) DEFAULT NULL,
  `appointment_time` varchar(255) DEFAULT NULL,
  `appointment_date` int(11) DEFAULT NULL,
  `created_on` int(11) DEFAULT NULL,
  `appointment_status` varchar(255) DEFAULT 'Pending',
  `payment_status` varchar(255) DEFAULT 'Unpaid',
  `fees` int(11) DEFAULT NULL,
  PRIMARY KEY (`appointment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_appointment` */

insert  into `tbl_appointment`(`appointment_id`,`patient_id`,`doc_id`,`doctor_name`,`doc_category`,`appointment_day`,`appointment_time`,`appointment_date`,`created_on`,`appointment_status`,`payment_status`,`fees`) values 
(17,1004,1,'Dr. Abdul Rehman','Cardiologist','Mon','10:00 AM - 12:00 PM',1647820800,1647359054,'Canceled','Unpaid',1000);

/*Table structure for table `tbl_complain` */

DROP TABLE IF EXISTS `tbl_complain`;

CREATE TABLE `tbl_complain` (
  `complain_id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) DEFAULT NULL,
  `complain` text,
  `created_on` int(11) DEFAULT NULL,
  PRIMARY KEY (`complain_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `tbl_complain` */

/*Table structure for table `tbl_doctors` */

DROP TABLE IF EXISTS `tbl_doctors`;

CREATE TABLE `tbl_doctors` (
  `doc_id` int(11) NOT NULL AUTO_INCREMENT,
  `doc_email` varchar(255) DEFAULT NULL,
  `doc_password` varchar(255) DEFAULT NULL,
  `doctor_name` varchar(255) DEFAULT NULL,
  `doc_category` varchar(255) DEFAULT NULL,
  `days` varchar(255) DEFAULT NULL,
  `timing` varchar(255) DEFAULT NULL,
  `fees` int(11) DEFAULT NULL,
  PRIMARY KEY (`doc_id`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_doctors` */

insert  into `tbl_doctors`(`doc_id`,`doc_email`,`doc_password`,`doctor_name`,`doc_category`,`days`,`timing`,`fees`) values 
(1,'doc@mail.com','doc_1','Dr. Abdul Rehman','Cardiologist','Mon, Tue, Wed','10:00 AM - 12:00 PM',1000),
(2,'doc@mail.com','doc_2','Dr. Saiqa Tabassum','Cardiologist','Thu, Fri, Sat','02:00 PM - 05:00 PM',1100),
(3,'doc@mail.com','doc_3','Dr. Shazain Khan','Cardiologist','Mon, Thu, Sat','01:00 PM - 03:00 PM',1200),
(4,'doc@mail.com','doc_4','Dr. Shahzia','Dentist','Mon, Wed, Fri','10:00 AM - 02:00 PM',1300),
(5,'doc@mail.com','doc_5','Dr. Shaista','Dentist','Mon, Wed, Fri','11:30 AM - 02:30 PM',1400),
(6,'doc@mail.com','doc_6','Dr. Kashif Durrani','Dentist','Mon, Thu','03:00 PM - 05:30 PM',1050),
(7,'doc@mail.com','doc_7','Dr. Maryam Ilyas','Dentist','Tue, Sat','03:00 PM - 05:30 PM',1150),
(8,'doc@mail.com','doc_8','Dr. Tariq Saad','Dentist','Mon, Tue, Sat','02:00 PM - 04:30 PM',1250),
(9,'doc@mail.com','doc_9','Dr. Muqaddas','Dentist','Mon, Tue, Wed, Fri','10:00 AM - 01:00 PM',1350),
(10,'doc@mail.com','doc_10','Dr. Tabinda Rao','Dermatologist','Fri, Sat','10:00 PM - 02:30 PM',1450),
(11,'doc@mail.com','doc_11','Dr. Sobia Naseem','Dermatologist','Thu','01:00 PM - 02:30 PM',1000),
(12,'doc@mail.com','doc_12','Dr. Yaseen Khan','Dermatologist','Tue, Wed, Sat','01:00 PM - 05:30 PM',1100),
(13,'doc@mail.com','doc_13','Dr. Zubair Ahmed','Dermatologist','Mon, Sat','05:00 PM - 07:30 PM',1200),
(14,'doc@mail.com','doc_14','Dr. Sultana Qasim','Dermatologist','Tue, Wed, Sat','06:00 PM - 08:30 PM',1300),
(15,'doc@mail.com','doc_15','Dr. Abdul Hameed Siddiqui','ENT','Fri','07:00 PM - 09:30 PM',1400),
(16,'doc@mail.com','doc_16','Dr. Adnan Munir','ENT','Mon, Thu, Sat','06:00 PM - 07:30 PM',1050),
(17,'doc@mail.com','doc_17','Dr. Absar Ali','ENT','Tue, Thu, Sat','07:00 PM - 09:00 PM',1150),
(18,'doc@mail.com','doc_18','Dr. Sadia Ahmed','ENT','Mon, Fri','10:00 AM - 01:30 PM',1250),
(19,'doc@mail.com','doc_19','Dr. Sana Ali Khan','Gastrologist','Tue, Wed','03:00 PM - 05:30 PM',1350),
(20,'doc@mail.com','doc_20','Dr. Afsheen Nafees','Gastrologist','Wed, Fri, Sat','04:00 PM - 06:00 PM',1450),
(21,'doc@mail.com','doc_21','Dr. Ahmed Irfan','Gastrologist','Mon','10:00 AM - 12:30 PM',1000),
(22,'doc@mail.com','doc_22','Dr. Ali Asghar','Hematologist','Wed, Fri, Sat','12:00 PM - 05:30 PM',1100),
(23,'doc@mail.com','doc_23','Dr. Sobia Saeed Ghazali','Hematologist','Mon, Tue, Wed, Fri','11:00 AM - 03:00 PM',1200),
(24,'doc@mail.com','doc_24','Dr. Amir Riaz','Hematologist','Wed, Thu, Fri','03:00 PM - 05:30 PM',1300),
(25,'doc@mail.com','doc_25','Dr. Faisal Rafeeq','Hematologist','Mon, Thu, Sat','02:00 PM - 04:00 PM',1400),
(26,'doc@mail.com','doc_26','Dr. Anila Malik','Neurologist','Fri, Sat','09:00 AM - 01:00 PM',1050),
(27,'doc@mail.com','doc_27','Dr. Ather Siddiqui','Neurologist','Fri, Sat','11:00 AM - 03:30 PM',1150),
(28,'doc@mail.com','doc_28','Dr. Atif Javed','Neurologist','Wed, Thu, Fri','07:00 PM - 10:00 PM',1250),
(29,'doc@mail.com','doc_29','Dr. Beenish Saeed','Neurologist','Mon, Thu, Sat','08:00 PM - 10:30 PM',1350),
(30,'doc@mail.com','doc_30','Dr. Durre Shahwar','Physiotherapist','Mon, Thu, Sat','10:00 AM - 11:30 AM',1450),
(31,'doc@mail.com','doc_31','Dr. Fahad Nasim','Physiotherapist','Sat','11:00 AM - 01:30 PM',1000),
(32,'doc@mail.com','doc_32','Dr. Erum Fatima','Physiotherapist','Wed, Thu, Fri','12:00 PM - 02:00 PM',1100),
(33,'doc@mail.com','doc_33','Dr. Farida Jan','Physiotherapist','Mon, Thu, Sat','01:00 PM - 03:30 PM',1200),
(34,'doc@mail.com','doc_34','Dr. Farzana Adnan','Physiotherapist','Fri, Sat','02:00 PM - 04:00 PM',1300),
(35,'doc@mail.com','doc_35','Dr. Ghulam Murtuza','Plastic Surgeon','Mon, Tue, Wed, Fri','12:00 PM - 02:00 PM',1400),
(36,'doc@mail.com','doc_36','Dr. Hafeez Khan','Plastic Surgeon','Wed, Thu, Fri','08:00 PM - 10:30 PM',1050),
(37,'doc@mail.com','doc_37','Dr. Haroon Shah','Plastic Surgeon','Mon, Thu, Sat','03:00 PM - 05:30 PM',1150),
(38,'doc@mail.com','doc_38','Dr. Hina Khanni','Plastic Surgeon','Wed, Fri, Sat','08:00 PM - 10:30 PM',1250),
(39,'doc@mail.com','doc_39','Dr. Humaira Afzal','Speech Therapist','Fri, Sat','12:00 PM - 02:00 PM',1350),
(40,'doc@mail.com','doc_40','Dr. Intekhab Tofiq','Speech Therapist','Wed, Thu, Fri','03:00 PM - 05:30 PM',1450),
(41,'doc@mail.com','doc_41','Dr. Iqbal Shahzad','Speech Therapist','Mon, Thu, Sat','08:00 PM - 10:30 PM',1000),
(42,'doc@mail.com','doc_42','Dr. Ishrat Saleem','Speech Therapist','Mon, Fri, Sat','03:00 PM - 05:30 PM',1100),
(43,'doc@mail.com','doc_43','Dr. Kaniz Zehra','Speech Therapist','Fri, Sat','12:00 PM - 02:00 PM',1200),
(44,'doc@mail.com','doc_44','Dr. Khalid Ahmed','Urologist','Wed, Thu, Fri','03:00 PM - 05:30 PM',1300),
(45,'doc@mail.com','doc_45','Dr. LUbna Nazir','Urologist','Mon, Thu, Sat','08:00 PM - 10:30 PM',1400),
(46,'doc@mail.com','doc_46','Dr. Qaiser AZiz','Urologist','Fri, Sat','03:00 PM - 05:30 PM',1050),
(47,'doc@mail.com','doc_47','Dr. Manzoor Ul Haq','Urologist','Wed, Thu, Fri','12:00 PM - 02:00 PM',1150),
(48,'doc@mail.com','doc_48','Dr. Lubna Kamani','General Physician','Mon, Thu, Sat','03:00 PM - 05:30 PM',1250),
(49,'doc@mail.com','doc_49','Dr. Maria Jabeen','General Physician','Mon, Tue, Wed, Thu, Fri, Sat','08:00 PM - 10:30 PM',1350),
(50,'doc@mail.com','doc_50','Dr. Mehnaz Atiq','General Physician','Wed, Thu, Fri','12:00 PM - 02:00 PM',1450),
(51,'doc@mail.com','doc_51','Dr. Shazad Mirza','General Physician','Fri','08:00 PM - 10:30 PM',1000),
(52,'doc@mail.com','doc_52','Dr. Mohammad Asim Luqman','General Physician','Wed, Thu, Fri','12:00 PM - 02:00 PM',1100);

/*Table structure for table `tbl_doctors_categories` */

DROP TABLE IF EXISTS `tbl_doctors_categories`;

CREATE TABLE `tbl_doctors_categories` (
  `dc_cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `dc_category` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`dc_cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_doctors_categories` */

/*Table structure for table `tbl_feedback` */

DROP TABLE IF EXISTS `tbl_feedback`;

CREATE TABLE `tbl_feedback` (
  `feedback_id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) DEFAULT NULL,
  `appointment_id` int(11) DEFAULT '0',
  `feedback` text,
  `created_on` int(11) DEFAULT NULL,
  PRIMARY KEY (`feedback_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_feedback` */

/*Table structure for table `tbl_patient` */

DROP TABLE IF EXISTS `tbl_patient`;

CREATE TABLE `tbl_patient` (
  `patient_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `date_of_birth` int(11) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `created_on` int(11) DEFAULT NULL,
  `updated_on` int(11) DEFAULT NULL,
  PRIMARY KEY (`patient_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1005 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_patient` */

insert  into `tbl_patient`(`patient_id`,`name`,`email`,`phone`,`date_of_birth`,`country`,`city`,`password`,`gender`,`created_on`,`updated_on`) values 
(1004,'Sami Ur Rehman','sami@mail.com','03153974977',701481600,'Pakistan','Karachi','123','male',1647358850,0);

/*Table structure for table `tbl_patient_report` */

DROP TABLE IF EXISTS `tbl_patient_report`;

CREATE TABLE `tbl_patient_report` (
  `report_id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) DEFAULT NULL,
  `file_name` text,
  `report_file_path` text,
  `upload_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`report_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_patient_report` */

insert  into `tbl_patient_report`(`report_id`,`patient_id`,`file_name`,`report_file_path`,`upload_date`) values 
(12,1004,'5627','files/Reports/1647358983_5627.pdf',1647358983);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
