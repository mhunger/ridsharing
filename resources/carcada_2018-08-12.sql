# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.22)
# Database: carcada
# Generation Time: 2018-08-12 13:10:17 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table ride
# ------------------------------------------------------------

LOCK TABLES `ride` WRITE;
/*!40000 ALTER TABLE `ride` DISABLE KEYS */;

INSERT INTO `ride` (`id`, `type`, `from`, `to`, `id_user_offered_by`, `travel_day`, `arrival_time`, `seats`, `price`, `departure_location`, `description`, `pet`, `twoseats`, `woman`, `smoker`, `baggage_size`, `detour`, `return`, `free_seating`, `agb_agreed`, `data_privacy_agreed`, `immediate_booking`, `payment`, `passenger_seat_reserved`, `back_seat_left_reserved`, `back_seat_right_reserved`, `back_seat_middle_reserved`, `third_row_left_reserved`, `third_row_right_reserved`, `third_row_middle_reserved`)
VALUES
	(1,'PRIVATFAHRT','Munich','Geneva',1,'2018-08-30 00:08:00','2018-08-30 20:00:00',3,40.00,'Muenchen Hauptbahnhof','Herzlich willkommen bei der Fahrt!',1,1,0,0,'M','0',0,3,1,1,1,'BAR',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(2,'PRIVATFAHRT','Munich','Prague',1,'2018-08-31 00:12:00','2018-08-30 18:00:00',3,20.00,'Muenchen Hauptbahnhof','Herzlich willkommen bei der Fahrt!',1,1,0,0,'M','0',0,3,1,1,1,'BAR',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	(3,'PRIVATFAHRT','Hamburg','Munich',1,'2018-08-28 00:12:00','2018-08-30 18:00:00',3,30.00,'Muenchen Hauptbahnhof','Herzlich willkommen bei der Fahrt!',1,1,0,0,'M','0',0,3,1,1,1,'BAR',NULL,NULL,NULL,NULL,NULL,NULL,NULL);

/*!40000 ALTER TABLE `ride` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ride_stop
# ------------------------------------------------------------



# Dump of table user
# ------------------------------------------------------------

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;

INSERT INTO `user` (`id`, `email`, `password`, `last_name`, `first_name`, `img`, `user_rating`, `language`)
VALUES
	(1,'benedikt@rossgardt.de','none','Rossgardt','Benedikt','profile.jpg',4.3,'de_DE'),
	(2,'musermann@gmx.de','none','Mustermann','Maximilian','profile.jpg',3.6,'de_DE');

/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
