-- MySQL dump 10.16  Distrib 10.1.26-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: viker_stuff
-- ------------------------------------------------------
-- Server version	10.1.26-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Temporary table structure for view `vw_system_users`
--

DROP TABLE IF EXISTS `vw_system_users`;
/*!50001 DROP VIEW IF EXISTS `vw_system_users`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `vw_system_users` (
  `user_id` tinyint NOT NULL,
  `username` tinyint NOT NULL,
  `password` tinyint NOT NULL,
  `first_name` tinyint NOT NULL,
  `last_name` tinyint NOT NULL,
  `bio` tinyint NOT NULL,
  `membership_id` tinyint NOT NULL,
  `company` tinyint NOT NULL,
  `lang` tinyint NOT NULL,
  `active` tinyint NOT NULL,
  `date_created` tinyint NOT NULL,
  `val` tinyint NOT NULL,
  `val_on` tinyint NOT NULL,
  `signed_agree` tinyint NOT NULL,
  `signed_on` tinyint NOT NULL,
  `is_supervisor` tinyint NOT NULL,
  `unsubscribe` tinyint NOT NULL,
  `type` tinyint NOT NULL,
  `type_id` tinyint NOT NULL,
  `password_clean` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `vw_system_users`
--

/*!50001 DROP TABLE IF EXISTS `vw_system_users`*/;
/*!50001 DROP VIEW IF EXISTS `vw_system_users`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_system_users` AS select `system_users`.`user_id` AS `user_id`,`system_users`.`username` AS `username`,`system_users`.`password` AS `password`,`system_users`.`first_name` AS `first_name`,`system_users`.`last_name` AS `last_name`,`system_users`.`bio` AS `bio`,`system_users`.`membership_id` AS `membership_id`,`system_users`.`company` AS `company`,`system_users`.`lang` AS `lang`,`system_users`.`active` AS `active`,`system_users`.`date_created` AS `date_created`,`validations`.`val` AS `val`,`validations`.`val_on` AS `val_on`,`validations`.`signed_agree` AS `signed_agree`,`validations`.`signed_on` AS `signed_on`,`validations`.`is_supervisor` AS `is_supervisor`,`validations`.`unsubscribe` AS `unsubscribe`,`system_user_type`.`type` AS `type`,`system_user_type`.`type_id` AS `type_id`,`system_users`.`password_clean` AS `password_clean` from ((`system_users` left join `validations` on((`system_users`.`user_id` = `validations`.`user_id`))) left join `system_user_type` on((`system_users`.`type` = `system_user_type`.`type_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-10-11 23:18:46
