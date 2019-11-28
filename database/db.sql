DROP TABLE IF EXISTS `ref_measurement`;
CREATE TABLE IF NOT EXISTS `ref_measurement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `measurement` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table eperformance.ref_measurement: ~9 rows (approximately)
/*!40000 ALTER TABLE `ref_measurement` DISABLE KEYS */;
INSERT INTO `ref_measurement` (`id`, `measurement`) VALUES
	(1, 'Unit'),
	(2, 'Hours'),
	(3, 'Minutes'),
	(4, 'Date'),
	(5, 'Day'),
	(6, 'Month'),
	(7, 'Year'),
	(8, 'Percentage(%)'),
	(9, 'RM');