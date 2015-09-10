DROP TABLE IF EXISTS `#__brand`;
 
CREATE TABLE `#__brand` (
	`id`       INT(11)     NOT NULL AUTO_INCREMENT,
	`brand_name` VARCHAR(25) NOT NULL,
	`published` tinyint(4) NOT NULL,
	PRIMARY KEY (`id`)
)
	ENGINE =MyISAM
	AUTO_INCREMENT =0
	DEFAULT CHARSET =utf8;
 
INSERT INTO `#__brand` (`brand_name`) VALUES
('LUXLIGHT'),
('SIMON'),
('ROCA');