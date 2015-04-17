-- MySQL dump 10.13  Distrib 5.5.35, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: ipl
-- ------------------------------------------------------
-- Server version	5.5.35-0ubuntu0.12.04.2

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
-- Table structure for table `auctions`
--

DROP TABLE IF EXISTS `auctions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auctions` (
  `player_id` int(10) unsigned NOT NULL,
  `team_id` int(10) unsigned NOT NULL,
  `bid_amt` int(10) unsigned NOT NULL,
  PRIMARY KEY (`player_id`,`team_id`),
  KEY `team_id` (`team_id`),
  CONSTRAINT `auctions_ibfk_1` FOREIGN KEY (`player_id`) REFERENCES `players` (`id`),
  CONSTRAINT `auctions_ibfk_2` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auctions`
--

LOCK TABLES `auctions` WRITE;
/*!40000 ALTER TABLE `auctions` DISABLE KEYS */;
/*!40000 ALTER TABLE `auctions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coaches`
--

DROP TABLE IF EXISTS `coaches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coaches` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `person_id` int(10) unsigned NOT NULL,
  `experience` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `person_id` (`person_id`),
  CONSTRAINT `coaches_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `persons` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coaches`
--

LOCK TABLES `coaches` WRITE;
/*!40000 ALTER TABLE `coaches` DISABLE KEYS */;
/*!40000 ALTER TABLE `coaches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fixtures`
--

DROP TABLE IF EXISTS `fixtures`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fixtures` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date_time` int(11) NOT NULL,
  `team1_id` int(10) unsigned NOT NULL,
  `team2_id` int(10) unsigned NOT NULL,
  `venue_id` int(10) unsigned NOT NULL,
  `umpire_id` int(10) unsigned NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `team1_id` (`team1_id`),
  KEY `team2_id` (`team2_id`),
  KEY `venue_id` (`venue_id`),
  KEY `umpire_id` (`umpire_id`),
  CONSTRAINT `fixtures_ibfk_1` FOREIGN KEY (`team1_id`) REFERENCES `teams` (`id`),
  CONSTRAINT `fixtures_ibfk_2` FOREIGN KEY (`team2_id`) REFERENCES `teams` (`id`),
  CONSTRAINT `fixtures_ibfk_3` FOREIGN KEY (`venue_id`) REFERENCES `venues` (`id`),
  CONSTRAINT `fixtures_ibfk_4` FOREIGN KEY (`umpire_id`) REFERENCES `umpires` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fixtures`
--

LOCK TABLES `fixtures` WRITE;
/*!40000 ALTER TABLE `fixtures` DISABLE KEYS */;
/*!40000 ALTER TABLE `fixtures` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `matches`
--

DROP TABLE IF EXISTS `matches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `matches` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fixture_id` int(10) unsigned NOT NULL,
  `winning_team_id` int(10) unsigned DEFAULT NULL,
  `man_of_match_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fixture_id` (`fixture_id`),
  KEY `winning_team_id` (`winning_team_id`),
  KEY `man_of_match_id` (`man_of_match_id`),
  CONSTRAINT `matches_ibfk_1` FOREIGN KEY (`fixture_id`) REFERENCES `fixtures` (`id`),
  CONSTRAINT `matches_ibfk_2` FOREIGN KEY (`winning_team_id`) REFERENCES `teams` (`id`),
  CONSTRAINT `matches_ibfk_3` FOREIGN KEY (`man_of_match_id`) REFERENCES `players` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `matches`
--

LOCK TABLES `matches` WRITE;
/*!40000 ALTER TABLE `matches` DISABLE KEYS */;
/*!40000 ALTER TABLE `matches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `owners`
--

DROP TABLE IF EXISTS `owners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `owners` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `person_id` int(10) unsigned NOT NULL,
  `profession` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `person_id` (`person_id`),
  CONSTRAINT `owners_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `persons` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `owners`
--

LOCK TABLES `owners` WRITE;
/*!40000 ALTER TABLE `owners` DISABLE KEYS */;
/*!40000 ALTER TABLE `owners` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `persons`
--

DROP TABLE IF EXISTS `persons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `persons` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `f_name` varchar(30) NOT NULL,
  `l_name` varchar(30) NOT NULL,
  `nationality` varchar(20) NOT NULL,
  `dob` date DEFAULT NULL,
  `photo_url` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persons`
--

LOCK TABLES `persons` WRITE;
/*!40000 ALTER TABLE `persons` DISABLE KEYS */;
/*!40000 ALTER TABLE `persons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `player_100s`
--

DROP TABLE IF EXISTS `player_100s`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `player_100s` (
  `player_id` int(10) unsigned NOT NULL,
  `match_id` int(10) unsigned NOT NULL,
  `balls` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`player_id`,`match_id`),
  KEY `match_id` (`match_id`),
  CONSTRAINT `player_100s_ibfk_1` FOREIGN KEY (`player_id`) REFERENCES `players` (`id`),
  CONSTRAINT `player_100s_ibfk_2` FOREIGN KEY (`match_id`) REFERENCES `matches` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `player_100s`
--

LOCK TABLES `player_100s` WRITE;
/*!40000 ALTER TABLE `player_100s` DISABLE KEYS */;
/*!40000 ALTER TABLE `player_100s` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `player_50s`
--

DROP TABLE IF EXISTS `player_50s`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `player_50s` (
  `player_id` int(10) unsigned NOT NULL,
  `match_id` int(10) unsigned NOT NULL,
  `balls` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`player_id`,`match_id`),
  KEY `match_id` (`match_id`),
  CONSTRAINT `player_50s_ibfk_1` FOREIGN KEY (`player_id`) REFERENCES `players` (`id`),
  CONSTRAINT `player_50s_ibfk_2` FOREIGN KEY (`match_id`) REFERENCES `matches` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `player_50s`
--

LOCK TABLES `player_50s` WRITE;
/*!40000 ALTER TABLE `player_50s` DISABLE KEYS */;
/*!40000 ALTER TABLE `player_50s` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `player_batting_stats`
--

DROP TABLE IF EXISTS `player_batting_stats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `player_batting_stats` (
  `player_id` int(10) unsigned NOT NULL,
  `match_id` int(10) unsigned NOT NULL,
  `runs` tinyint(3) unsigned DEFAULT '0',
  `balls_played` tinyint(3) unsigned DEFAULT '0',
  `strike_rate` float DEFAULT NULL,
  PRIMARY KEY (`player_id`,`match_id`),
  KEY `match_id` (`match_id`),
  CONSTRAINT `player_batting_stats_ibfk_1` FOREIGN KEY (`player_id`) REFERENCES `players` (`id`),
  CONSTRAINT `player_batting_stats_ibfk_2` FOREIGN KEY (`match_id`) REFERENCES `matches` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `player_batting_stats`
--

LOCK TABLES `player_batting_stats` WRITE;
/*!40000 ALTER TABLE `player_batting_stats` DISABLE KEYS */;
/*!40000 ALTER TABLE `player_batting_stats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `player_bowling_stats`
--

DROP TABLE IF EXISTS `player_bowling_stats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `player_bowling_stats` (
  `player_id` int(10) unsigned NOT NULL,
  `match_id` int(10) unsigned NOT NULL,
  `balls_delivered` tinyint(3) unsigned DEFAULT '0',
  `wickets` tinyint(3) unsigned DEFAULT '0',
  PRIMARY KEY (`player_id`,`match_id`),
  KEY `match_id` (`match_id`),
  CONSTRAINT `player_bowling_stats_ibfk_1` FOREIGN KEY (`player_id`) REFERENCES `players` (`id`),
  CONSTRAINT `player_bowling_stats_ibfk_2` FOREIGN KEY (`match_id`) REFERENCES `matches` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `player_bowling_stats`
--

LOCK TABLES `player_bowling_stats` WRITE;
/*!40000 ALTER TABLE `player_bowling_stats` DISABLE KEYS */;
/*!40000 ALTER TABLE `player_bowling_stats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `player_fielding_stats`
--

DROP TABLE IF EXISTS `player_fielding_stats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `player_fielding_stats` (
  `player_id` int(10) unsigned NOT NULL,
  `match_id` int(10) unsigned NOT NULL,
  `catches` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`player_id`,`match_id`),
  KEY `match_id` (`match_id`),
  CONSTRAINT `player_fielding_stats_ibfk_1` FOREIGN KEY (`player_id`) REFERENCES `players` (`id`),
  CONSTRAINT `player_fielding_stats_ibfk_2` FOREIGN KEY (`match_id`) REFERENCES `matches` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `player_fielding_stats`
--

LOCK TABLES `player_fielding_stats` WRITE;
/*!40000 ALTER TABLE `player_fielding_stats` DISABLE KEYS */;
/*!40000 ALTER TABLE `player_fielding_stats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `player_roles`
--

DROP TABLE IF EXISTS `player_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `player_roles` (
  `player_id` int(10) unsigned NOT NULL,
  `role` enum('bowler','batsman','all rounder') DEFAULT NULL,
  `bats` enum('left','right') DEFAULT NULL,
  `bowls` varchar(30) DEFAULT NULL,
  KEY `player_id` (`player_id`),
  CONSTRAINT `player_roles_ibfk_1` FOREIGN KEY (`player_id`) REFERENCES `players` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `player_roles`
--

LOCK TABLES `player_roles` WRITE;
/*!40000 ALTER TABLE `player_roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `player_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `players`
--

DROP TABLE IF EXISTS `players`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `players` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `person_id` int(10) unsigned NOT NULL,
  `matches_played` smallint(5) unsigned DEFAULT '0',
  `total_runs` smallint(5) unsigned DEFAULT '0',
  `total_wickets` smallint(5) unsigned DEFAULT '0',
  `ducks` smallint(5) unsigned DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `person_id` (`person_id`),
  CONSTRAINT `players_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `persons` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `players`
--

LOCK TABLES `players` WRITE;
/*!40000 ALTER TABLE `players` DISABLE KEYS */;
/*!40000 ALTER TABLE `players` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sixes`
--

DROP TABLE IF EXISTS `sixes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sixes` (
  `player_id` int(10) unsigned NOT NULL,
  `match_id` int(10) unsigned NOT NULL,
  `distance_in_mtr` tinyint(3) unsigned NOT NULL,
  KEY `player_id` (`player_id`),
  KEY `match_id` (`match_id`),
  CONSTRAINT `sixes_ibfk_1` FOREIGN KEY (`player_id`) REFERENCES `players` (`id`),
  CONSTRAINT `sixes_ibfk_2` FOREIGN KEY (`match_id`) REFERENCES `matches` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sixes`
--

LOCK TABLES `sixes` WRITE;
/*!40000 ALTER TABLE `sixes` DISABLE KEYS */;
/*!40000 ALTER TABLE `sixes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sponsors`
--

DROP TABLE IF EXISTS `sponsors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sponsors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sponsors`
--

LOCK TABLES `sponsors` WRITE;
/*!40000 ALTER TABLE `sponsors` DISABLE KEYS */;
/*!40000 ALTER TABLE `sponsors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `team_stats`
--

DROP TABLE IF EXISTS `team_stats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `team_stats` (
  `team_id` int(10) unsigned NOT NULL,
  `total_matches` mediumint(8) unsigned DEFAULT '0',
  `matches_won` mediumint(8) unsigned DEFAULT '0',
  `matches_lost` mediumint(8) unsigned DEFAULT '0',
  `points` smallint(5) unsigned DEFAULT '0',
  `net_run_rate` float DEFAULT '0',
  KEY `team_id` (`team_id`),
  CONSTRAINT `team_stats_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `team_stats`
--

LOCK TABLES `team_stats` WRITE;
/*!40000 ALTER TABLE `team_stats` DISABLE KEYS */;
/*!40000 ALTER TABLE `team_stats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teams`
--

DROP TABLE IF EXISTS `teams`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teams` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `home_ground` varchar(50) DEFAULT NULL,
  `owner_id` int(10) unsigned NOT NULL,
  `coach_id` int(10) unsigned NOT NULL,
  `captain_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `owner_id` (`owner_id`),
  KEY `coach_id` (`coach_id`),
  KEY `captain_id` (`captain_id`),
  CONSTRAINT `teams_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `owners` (`id`),
  CONSTRAINT `teams_ibfk_2` FOREIGN KEY (`coach_id`) REFERENCES `coaches` (`id`),
  CONSTRAINT `teams_ibfk_3` FOREIGN KEY (`captain_id`) REFERENCES `players` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teams`
--

LOCK TABLES `teams` WRITE;
/*!40000 ALTER TABLE `teams` DISABLE KEYS */;
/*!40000 ALTER TABLE `teams` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `umpires`
--

DROP TABLE IF EXISTS `umpires`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `umpires` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `person_id` int(10) unsigned NOT NULL,
  `experience` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `person_id` (`person_id`),
  CONSTRAINT `umpires_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `persons` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `umpires`
--

LOCK TABLES `umpires` WRITE;
/*!40000 ALTER TABLE `umpires` DISABLE KEYS */;
/*!40000 ALTER TABLE `umpires` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `f_name` varchar(30) NOT NULL,
  `l_name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `venues`
--

DROP TABLE IF EXISTS `venues`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `venues` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `capacity` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `venues`
--

LOCK TABLES `venues` WRITE;
/*!40000 ALTER TABLE `venues` DISABLE KEYS */;
/*!40000 ALTER TABLE `venues` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wicketkeepers`
--

DROP TABLE IF EXISTS `wicketkeepers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wicketkeepers` (
  `player_id` int(10) unsigned NOT NULL,
  `match_id` int(10) unsigned NOT NULL,
  `stumps` tinyint(3) unsigned DEFAULT NULL,
  KEY `player_id` (`player_id`),
  KEY `match_id` (`match_id`),
  CONSTRAINT `wicketkeepers_ibfk_1` FOREIGN KEY (`player_id`) REFERENCES `players` (`id`),
  CONSTRAINT `wicketkeepers_ibfk_2` FOREIGN KEY (`match_id`) REFERENCES `matches` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wicketkeepers`
--

LOCK TABLES `wicketkeepers` WRITE;
/*!40000 ALTER TABLE `wicketkeepers` DISABLE KEYS */;
/*!40000 ALTER TABLE `wicketkeepers` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-07-06  9:27:49
