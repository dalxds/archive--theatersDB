
-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: localhost    Database: theatersdb
-- ------------------------------------------------------
-- Server version	5.5.57-MariaDB

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
-- Table structure for table `aithousa`
--

DROP TABLE IF EXISTS `aithousa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aithousa` (
  `Θ_ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Όνομα_Αίθουσας` varchar(120) NOT NULL,
  `Χωρητικότητα` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`Θ_ID`,`Όνομα_Αίθουσας`),
  CONSTRAINT `Θέατρο` FOREIGN KEY (`Θ_ID`) REFERENCES `theatro` (`Θ_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aithousa`
--

LOCK TABLES `aithousa` WRITE;
/*!40000 ALTER TABLE `aithousa` DISABLE KEYS */;
INSERT INTO `aithousa` VALUES (1,'Αίθουσα 1',100),(2,'Σκηνή',772),(3,'Σκηνή',668),(4,'Αίθουσα 3',80),(5,'Σκηνή',200),(6,'Σκηνή',295),(7,'Σκηνή',400),(8,'Σκηνή 3',200),(9,'Αίθουσα 1',250),(10,'Αίθουσα 2',300),(11,'Αίθουσα  1',200),(12,'Αίθουσα 5',150),(13,'Αίθουσα 1',400),(14,'Αίθουσα 2',100),(15,'Αίθουσα A',500);
/*!40000 ALTER TABLE `aithousa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `axiologisi_paragwgis_apo_theati`
--

DROP TABLE IF EXISTS `axiologisi_paragwgis_apo_theati`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `axiologisi_paragwgis_apo_theati` (
  `ΘΕ_ID` int(10) unsigned NOT NULL,
  `ΘΠ_ID` int(10) unsigned NOT NULL,
  `Βαθμολογία` decimal(3,1) unsigned NOT NULL,
  `Περιγραφή` varchar(20000) DEFAULT NULL,
  PRIMARY KEY (`ΘΕ_ID`,`ΘΠ_ID`),
  KEY `Θεατρική Παραγωγή_idx` (`ΘΠ_ID`),
  CONSTRAINT `Θεατρική_Παραγωγή` FOREIGN KEY (`ΘΠ_ID`) REFERENCES `theatriki_paragwgi` (`ΘΠ_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Θεατής_1` FOREIGN KEY (`ΘΕ_ID`) REFERENCES `theatis` (`ΘΕ_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `axiologisi_paragwgis_apo_theati`
--

LOCK TABLES `axiologisi_paragwgis_apo_theati` WRITE;
/*!40000 ALTER TABLE `axiologisi_paragwgis_apo_theati` DISABLE KEYS */;
INSERT INTO `axiologisi_paragwgis_apo_theati` VALUES (1,1,7.0,NULL),(1,3,8.0,'Πολύ ιδιαίτερη ερμηνεία από τους πρωταγωνιστές!'),(1,5,8.0,NULL),(2,3,9.0,'Πολύ ιδιαίτερη ερμηνεία από τους πρωταγωνιστές!'),(4,5,4.0,NULL),(5,5,6.0,'Μέτρια παράσταση');
/*!40000 ALTER TABLE `axiologisi_paragwgis_apo_theati` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eisitirio`
--

DROP TABLE IF EXISTS `eisitirio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eisitirio` (
  `ΘΠ_ID` int(10) unsigned NOT NULL,
  `Π_ID` int(10) unsigned NOT NULL,
  `Σειρά` int(10) unsigned NOT NULL,
  `Θέση` smallint(5) unsigned NOT NULL,
  `Τύπος Εισιτηρίου` enum('ΚΑΝΟΝΙΚΟ','ΜΕΙΩΜΕΝΟ') NOT NULL,
  `Τιμή` decimal(4,2) unsigned NOT NULL,
  `ΘΕ_ID` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`ΘΠ_ID`,`Π_ID`,`Σειρά`,`Θέση`),
  KEY `Θεατής_idx` (`ΘΕ_ID`),
  CONSTRAINT `Παράσταση` FOREIGN KEY (`ΘΠ_ID`, `Π_ID`) REFERENCES `parastasi` (`ΘΠ_ID`, `Π_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Θεατής` FOREIGN KEY (`ΘΕ_ID`) REFERENCES `theatis` (`ΘΕ_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eisitirio`
--

LOCK TABLES `eisitirio` WRITE;
/*!40000 ALTER TABLE `eisitirio` DISABLE KEYS */;
INSERT INTO `eisitirio` VALUES (1,22,2,45,'ΚΑΝΟΝΙΚΟ',10.00,1),(1,22,2,46,'ΚΑΝΟΝΙΚΟ',10.00,2),(1,22,2,47,'ΚΑΝΟΝΙΚΟ',10.00,1),(1,22,5,180,'ΜΕΙΩΜΕΝΟ',5.00,NULL),(1,26,4,56,'ΜΕΙΩΜΕΝΟ',5.00,NULL),(2,25,6,78,'ΜΕΙΩΜΕΝΟ',5.00,NULL),(2,25,6,79,'ΚΑΝΟΝΙΚΟ',10.00,4);
/*!40000 ALTER TABLE `eisitirio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `etairia_paragwgis`
--

DROP TABLE IF EXISTS `etairia_paragwgis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `etairia_paragwgis` (
  `ΑΦΜ` varchar(9) NOT NULL,
  `Όνομα` varchar(120) NOT NULL,
  PRIMARY KEY (`ΑΦΜ`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `etairia_paragwgis`
--

LOCK TABLES `etairia_paragwgis` WRITE;
/*!40000 ALTER TABLE `etairia_paragwgis` DISABLE KEYS */;
INSERT INTO `etairia_paragwgis` VALUES ('090024737','Κρατικό Θέατρο Βορείου Ελλάδος'),('800951514','People Presents IKE'),('997177664','Καλλιτεχνική Εταιρεία Θεάτρου'),('997796278','ΜΟΝΤΕΡΝΟΙ ΚΑΙΡΟΙ ΑΚΤΙΣ ΑΜΚ');
/*!40000 ALTER TABLE `etairia_paragwgis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parastasi`
--

DROP TABLE IF EXISTS `parastasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `parastasi` (
  `Π_ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ΘΠ_ID` int(10) unsigned NOT NULL,
  `Θ_ID` int(10) unsigned NOT NULL,
  `Όνομα_Αίθουσας` varchar(120) NOT NULL,
  `Έναρξη` datetime NOT NULL,
  `Σεζόν` varchar(9) NOT NULL,
  PRIMARY KEY (`Π_ID`,`ΘΠ_ID`),
  KEY `ΘΠ_ID_idx` (`ΘΠ_ID`),
  KEY `Θ_ID_idx` (`Θ_ID`,`Όνομα_Αίθουσας`),
  CONSTRAINT `Αίθουσα` FOREIGN KEY (`Θ_ID`, `Όνομα_Αίθουσας`) REFERENCES `aithousa` (`Θ_ID`, `Όνομα_Αίθουσας`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Θεατρική__Παραγωγή` FOREIGN KEY (`ΘΠ_ID`) REFERENCES `theatriki_paragwgi` (`ΘΠ_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parastasi`
--

LOCK TABLES `parastasi` WRITE;
/*!40000 ALTER TABLE `parastasi` DISABLE KEYS */;
INSERT INTO `parastasi` VALUES (22,1,2,'Σκηνή','2019-12-12 21:00:00','2019-2020'),(23,1,1,'Αίθουσα 1','2019-12-13 19:00:00','2019-2020'),(24,2,5,'Σκηνή','2019-12-15 19:00:00','2019-2020'),(25,2,5,'Σκηνή ','2019-12-14 19:00:00','2019-2020'),(26,1,1,'Αίθουσα 1','2019-12-12 19:00:00','2019-2020');
/*!40000 ALTER TABLE `parastasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sintelestis`
--

DROP TABLE IF EXISTS `sintelestis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sintelestis` (
  `Σ_ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Όνομα` varchar(120) NOT NULL,
  `Επώνυμο` varchar(120) NOT NULL,
  `Βιογραφικό` varchar(20000) DEFAULT NULL,
  PRIMARY KEY (`Σ_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sintelestis`
--

LOCK TABLES `sintelestis` WRITE;
/*!40000 ALTER TABLE `sintelestis` DISABLE KEYS */;
INSERT INTO `sintelestis` VALUES (1,'Αντώνης','Λουδάρος','Έχει σπουδάσει στη Δραματική Σχολή του Εθνικού Θεάτρου. Διδάσκει υποκριτική στη δραματική σχολή Ίασμος. Έχει συμμετάσχει στις θεατρικές παραστάσεις Ο συμβολαιογράφος (2018-2019), Όνειρα γλυκά (2018), Στέλιος Καζαντζίδης - Η ζωή του όλη (2017), Φονική παγίδα (2017), Εκκλησιάζουσες (2018), Για όνομα... (2015), καθώς και σε αρκετές στο Εθνικό Θέατρο.'),(2,'Παυλίνα','Χαρέλα','Έχει παρακολουθήσει το εργαστήρι της Πειραματικής Τέχνης καθώς και διάφορα σεμινάρια σε Αθήνα και Θεσσαλονίκη. Είναι ιδρυτικό μέλος της Καλλιτεχνικης εταιρείας θεάτρου -Θέατρο Σοφούλη. '),(3,'Σμαράγδα','Καρύδη','Η Σμαράγδα Καρύδη (Αθήνα 9 Αυγούστου 1969-) είναι Ελληνίδα ηθοποιός της τηλεόρασης, του κινηματογράφου και του θεάτρου, σκηνοθέτης και παρουσιάστρια.'),(4,'Χάρης','Ρώμας','Ο Χάρης Ρώμας (γεννημένος ως Χαράλαμπος Ρασσιάς) (Πειραιάς, 23 Μαρτίου 1960) είναι Έλληνας ηθοποιός, σεναριογράφος, σκηνοθέτης και στιχουργός.'),(5,'Ελένη ','Ράντου','Η Ελένη Ράντου (Αιγάλεω Αττικής, 12 Νοεμβρίου 1965) είναι Ελληνίδα ηθοποιός της τηλεόρασης,του θεάτρου και του κινηματογράφου. Θεατρικές παραστάσεις στις οποίες συμμετείχε είναι οι Για μια ανάσα, Φιλούμενοι, Τζάσμιν κ.α.'),(6,'Ιεροκλής ','Μιχαηλίδης','Στο θέατρο, έχει παίξει σε έργα των Τένεσι Ουίλιαμς, Γρηγόριου Ξενόπουλου, Ιάκωβου Καμπανέλλη, Άντον Τσέχωφ, Εντουάρντο Ντε Φιλίππο κ.ά.'),(7,'Δημήτρης ','Σταρόβας','Γεννήθηκε στη Θεσσαλονίκη. Έχει συμμετάσχει ως guest star σε διάφορες τηλεοπτικές σειρές και διακρίνεται για το χιούμορ του. Επίσης, στο παρελθόν παρουσίαζε μαζί με τον Στάθη Παναγιωτόπουλο την εκπομπή μαγειρικής \"Νηστικό αρκούδι\" στη ΝΕΤ.'),(8,'Θοδωρής ','Αθερίδης','Ο Θοδωρής Αθερίδης (Θεσσαλονίκη 3 Μαΐου 1965-) είναι Έλληνας ηθοποιός ,συγγραφέας και σκηνοθέτης της τηλεόρασης, του θεάτρου και του κινηματογράφου.'),(9,'Ρένια ','Λουιζίδου','Η Αργυρώ (Ρένια) Λουιζίδου (18 Ιουλίου 1966, Θεσσαλονίκη) είναι Ελληνίδα ηθοποιός της τηλεόρασης, του θεάτρου[1] και του κινηματογράφου.'),(10,'Γεράσιμος ','Σκιαδαρέσης','Ο Γεράσιμος Σκιαδαρέσης (Πάτρα, 18 Δεκεμβρίου 1960) είναι Έλληνας ηθοποιός.'),(11,'Γιώργος ','Χρυσοστόμου','Ο Γιώργος Χρυσοστόμου είναι Έλληνας ηθοποιός της τηλεόρασης, του θεάτρου και του κινηματογράφου'),(12,'Οδυσσέας ','Παπασπηλιόπουλος','Φοίτησε στην Δραματική Σχολή του Θεάτρου Τέχνης (1996-1998) και ένα χρόνο στην Δραματική Σχολή Θεμέλιο (1998-1999). Έχει υπάρξει 2 φορές υποψήφιος για το Βραβείο ΔΗΜΗΤΡΗΣ ΧΟΡΝ.'),(13,'Πυγμαλίων ','Δαδακαρίδης','Ο Πυγμαλίων Δαδακαρίδης είναι Έλληνας ηθοποιός του θεάτρου, του κινηματογράφου και της τηλεόρασης.'),(14,'Δήμητρα ','Παπαδοπούλου','Η Δήμητρα Παπαδοπούλου είναι Κύπρια ηθοποιός, σεναριογράφος και σκηνοθέτιδα. Επίσης έχει υπάρξει παρουσιάστρια τηλεοπτικών εκπομπών, καθώς και ραδιοφωνική παραγωγός.'),(15,'Ζέτα ','Μακρυπούλια','Η Αγορίτσα Ζωή \"Ζέτα\" Μακρυπούλια είναι Ελληνίδα ηθοποιός και παρουσιάστρια, με καταγωγή από το χωριό Ποταμούλα Αιτωλοακαρνανίας');
/*!40000 ALTER TABLE `sintelestis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sintelestis_me_idiotita_se_paragwgi`
--

DROP TABLE IF EXISTS `sintelestis_me_idiotita_se_paragwgi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sintelestis_me_idiotita_se_paragwgi` (
  `ΘΠ_ID` int(10) unsigned NOT NULL,
  `Σ_ID` int(10) unsigned NOT NULL,
  `Ιδιότητα` varchar(120) NOT NULL,
  PRIMARY KEY (`ΘΠ_ID`,`Σ_ID`,`Ιδιότητα`),
  KEY `Συντελεστής_idx` (`Σ_ID`),
  CONSTRAINT `Θεατρική Παραγωγή` FOREIGN KEY (`ΘΠ_ID`) REFERENCES `theatriki_paragwgi` (`ΘΠ_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Συντελεστής` FOREIGN KEY (`Σ_ID`) REFERENCES `sintelestis` (`Σ_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sintelestis_me_idiotita_se_paragwgi`
--

LOCK TABLES `sintelestis_me_idiotita_se_paragwgi` WRITE;
/*!40000 ALTER TABLE `sintelestis_me_idiotita_se_paragwgi` DISABLE KEYS */;
INSERT INTO `sintelestis_me_idiotita_se_paragwgi` VALUES (2,1,'Ηθοποιός'),(2,2,'Ηθοποιός'),(2,2,'Σκηνοθέτης'),(5,3,'Ηθοποιός'),(5,4,'Ηθοποιός'),(5,4,'Σκηνοθέτης');
/*!40000 ALTER TABLE `sintelestis_me_idiotita_se_paragwgi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `theatis`
--

DROP TABLE IF EXISTS `theatis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `theatis` (
  `ΘΕ_ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Όνομα` varchar(120) DEFAULT NULL,
  `Επώνυμο` varchar(120) DEFAULT NULL,
  `Τηλέφωνο` varchar(15) DEFAULT NULL,
  `Email` varchar(320) DEFAULT NULL,
  PRIMARY KEY (`ΘΕ_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `theatis`
--

LOCK TABLES `theatis` WRITE;
/*!40000 ALTER TABLE `theatis` DISABLE KEYS */;
INSERT INTO `theatis` VALUES (1,'Δημήτριος','Δελεμήσης','6977102030','delemissis@gmail.com'),(2,'Κωνσταντίνος','Βεργόπουλος','6988405060','vergopoulos@gmail.com'),(3,'Δημήτριος','Αλεξιάδης','6989034739','aleksiadis@gmail.com'),(4,'Νίκος','Γιαννόπουλος','6989767854','giannopoulos@gmail.com'),(5,'Νίκος','Μάλαμας','6984345679','malamas@gmail.com');
/*!40000 ALTER TABLE `theatis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `theatriki_paragwgi`
--

DROP TABLE IF EXISTS `theatriki_paragwgi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `theatriki_paragwgi` (
  `ΘΠ_ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Εταιρεία_Παραγωγής` varchar(9) NOT NULL,
  `Τίτλος` varchar(120) NOT NULL,
  `Περιγραφή` varchar(20000) DEFAULT NULL,
  `Διάρκεια` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`ΘΠ_ID`),
  KEY `Εταιρεία Παραγωγής_idx` (`Εταιρεία_Παραγωγής`),
  CONSTRAINT `Εταιρεία Παραγωγής` FOREIGN KEY (`Εταιρεία_Παραγωγής`) REFERENCES `etairia_paragwgis` (`ΑΦΜ`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `theatriki_paragwgi`
--

LOCK TABLES `theatriki_paragwgi` WRITE;
/*!40000 ALTER TABLE `theatriki_paragwgi` DISABLE KEYS */;
INSERT INTO `theatriki_paragwgi` VALUES (1,'090024737','Ο Φάρος','Μια παραβολή για την εξιλέωση γεμάτη μαύρο χιούμορ, με πρωταγωνιστές τέσσερις φίλους που περνούν τη νύχτα με έναν ξένο, παίζοντας χαρτιά και πίνοντας.',140),(2,'997177664','Σκηνές Από Έναν Γάμο','Ένα ζευγάρι, μια ιστορία είκοσι χρόνων. Υπάρχει άραγε η τέλεια σχέση; Ο Γιόχαν και Μαριάννα είναι –φαινομενικά τουλάχιστον- το τέλειο ζευγάρι. Κι όμως μια ματιά, μια παύση, μια μισοτελειωμένη φράση, μια αδιόρατη κίνηση ίσως μαρτυρούν ένα χάσμα. Τι θα συμβεί όταν αυτό το χάσμα έρθει στο φως;',80),(3,'090024737','Τρεις Αδελφές','Παγιδευμένες μέσα σ’ ένα όνειρο για μια καλύτερη ζωή, κάπου αλλού, στην μακρινή Μόσχα των παιδικών τους χρόνων, οι ηρωίδες του Τσέχοφ ξοδεύουν τη ζωή τους, συζητώντας διαρκώς για ένα καλύτερο αύριο.',100),(4,'800951514','Του Κουτρούλη ο γάμος','Η πολιτική σάτιρα ηθών του συγγραφέα για τη διαχρονική παθογένεια του ελληνικού κράτους, πάντα επίκαιρη, με κάποιες εμβόλιμες σύγχρονες προσθήκες κειμένων και πρωτότυπων τραγουδιών.',100),(5,'997796278','Μαγιακόφσκι','Μέσα από τη σύνθεση κειμένων του Ρώσου μεγάλου ποιητή, η παράσταση αφηγείται τη συναρπαστική ζωή του, από τη νεαρή ηλικία μέχρι τη δραματική στιγμή της αυτοκτονίας του.',75);
/*!40000 ALTER TABLE `theatriki_paragwgi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `theatro`
--

DROP TABLE IF EXISTS `theatro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `theatro` (
  `Θ_ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Όνομα` varchar(120) NOT NULL,
  `Τοποθεσία` varchar(500) NOT NULL,
  `Τηλέφωνο` varchar(15) NOT NULL,
  `Email` varchar(320) DEFAULT NULL,
  PRIMARY KEY (`Θ_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `theatro`
--

LOCK TABLES `theatro` WRITE;
/*!40000 ALTER TABLE `theatro` DISABLE KEYS */;
INSERT INTO `theatro` VALUES (1,'Θέατρο Σοφούλη','Τραπεζούντος 5 & Σοφούλη, Καλαμαριά, Θεσσαλονίκη, Ελλάδα','2310423925','info@theatrosofouli.gr'),(2,'Αριστοτέλειον','Εθνικής Αμύνης 2, Θεσσαλονίκη, Ελλάδα','2310262051','info@theatrosofouli.gr'),(3,'Θέατρο Εταιρείας Μακεδονικών Σπουδών','Εθνικής Αμύνης 2, Θεσσαλονίκη, Ελλάδα','2315200000','info@ntng.gr'),(4,'Ακάδημος Νέος','Ακαδημίας & Ιπποκράτους 17, Αθήνα, Ελλάδα','2103625119','info@neosakadimos.gr'),(5,'Θέατρο Ακροπόλ','Ιπποκράτους 9-11, 10679, Αθήνα, Ελλάδα','2103648303','info@theatroakropol.gr'),(6,'Θησείον','Τουρναβίτου 7, Αθήνα, Ελλάδα','2103255444','info@thesion.gr'),(7,'Μπάγκειον Ξενοδοχείο','Πλατεία Ομονοίας 19, Αθήνα, Ελλάδα','210234227','info@bageion.gr'),(8,'Αθηναϊκή Σκηνή Κάλβου-Καλαμπόκη','Αθανασίου Διάκου & Τζιραίων 13,Μακρυγιάννη, Αθήνα, Ελλάδα','2109222300','info@kalvoukalampoki.gr'),(9,'Θεατρική Λύση','Παραμυθίας 28-30,Κεραμεικός, Αθήνα, Ελλάδα','2114013923','info@theatrikilysi.gr'),(10,'Μικρό Άνεσις','Λεωφ. Κηφισίας 14 ,Αμπελόκηποι, Αθήνα, Ελλάδα','2107718943','info@mikroanesis.gr'),(11,'Μικρό Γκλόρια','Ιπποκράτους 7 ,Κέντρο, Αθήνα, Ελλάδα','2103642334','info@mikrogloria.gr'),(12,'Μικρό Χορν','Αμερικής 10,Κολωνάκι, Αθήνα, Ελλάδα','2111826479','info@mikroxorn.gr'),(13,'Πρόβα','Ηπείρου 39 & Αχαρνών,Κέντρο,  Αθήνα, Ελλάδα','2108818326','info@prova.gr'),(14,'Ριάλτο','Κυψέλης 54,Κυψέλη, Αθήνα, Ελλάδα','2114107764','info@rialto.gr'),(15,'Φούρνος','Μαυρομιχάλη 168,Εξάρχεια, Αθήνα, Ελλάδα','2106460748','info@fournos.gr');
/*!40000 ALTER TABLE `theatro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `view1`
--

DROP TABLE IF EXISTS `view1`;
/*!50001 DROP VIEW IF EXISTS `view1`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `view1` AS SELECT 
 1 AS `Όνομα`,
 1 AS `Όνομα_Αίθουσας`,
 1 AS `Χωρητικότητα`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `view2`
--

DROP TABLE IF EXISTS `view2`;
/*!50001 DROP VIEW IF EXISTS `view2`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `view2` AS SELECT 
 1 AS `ΑΦΜ`,
 1 AS `Όνομα`,
 1 AS `Τίτλος`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `view3`
--

DROP TABLE IF EXISTS `view3`;
/*!50001 DROP VIEW IF EXISTS `view3`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `view3` AS SELECT 
 1 AS `Τίτλος`,
 1 AS `Όνομα`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `view1`
--

/*!50001 DROP VIEW IF EXISTS `view1`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view1` AS select `theatro`.`Όνομα` AS `Όνομα`,`aithousa`.`Όνομα_Αίθουσας` AS `Όνομα_Αίθουσας`,`aithousa`.`Χωρητικότητα` AS `Χωρητικότητα` from (`theatro` join `aithousa` on((`theatro`.`Θ_ID` = `aithousa`.`Θ_ID`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `view2`
--

/*!50001 DROP VIEW IF EXISTS `view2`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view2` AS select `etairia_paragwgis`.`ΑΦΜ` AS `ΑΦΜ`,`etairia_paragwgis`.`Όνομα` AS `Όνομα`,`theatriki_paragwgi`.`Τίτλος` AS `Τίτλος` from (`etairia_paragwgis` join `theatriki_paragwgi` on((`theatriki_paragwgi`.`Εταιρεία_Παραγωγής` = `etairia_paragwgis`.`ΑΦΜ`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `view3`
--

/*!50001 DROP VIEW IF EXISTS `view3`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view3` AS select distinct `theatriki_paragwgi`.`Τίτλος` AS `Τίτλος`,`theatro`.`Όνομα` AS `Όνομα` from ((`theatriki_paragwgi` join `parastasi` on((`theatriki_paragwgi`.`ΘΠ_ID` = `parastasi`.`ΘΠ_ID`))) join `theatro` on((`parastasi`.`Θ_ID` = `theatro`.`Θ_ID`))) */;
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

-- Dump completed on 2020-01-14 21:43:45
