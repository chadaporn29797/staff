-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.21-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table staffdb.cv_title
CREATE TABLE IF NOT EXISTS `cv_title` (
  `name` varchar(30) NOT NULL,
  `en` varchar(60) DEFAULT NULL,
  `th` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table staffdb.cv_title: ~8 rows (approximately)
/*!40000 ALTER TABLE `cv_title` DISABLE KEYS */;
INSERT INTO `cv_title` (`name`, `en`, `th`) VALUES
	('award', 'Awards and Hornours', 'รางวัลและเกียรติยศ'),
	('education', 'Educational Background', 'ประวัติการศึกษา'),
	('overview', 'Research Overview', 'ภาพรวมงานวิจัย'),
	('publication', 'Publications', 'ผลงานตีพิมพ์'),
	('scholarship', 'Scholarships', 'ทุนการศึกษา'),
	('skill', 'Skills', 'ทักษะอื่นๆ'),
	('training', 'Trainings', 'การฝึกอบรม'),
	('working', 'Working Experiences', 'ประสบการณ์การทำงาน');
/*!40000 ALTER TABLE `cv_title` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
