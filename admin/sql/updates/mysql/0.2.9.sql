CREATE TABLE IF NOT EXISTS `#__courselist_terms` (
	`term_id` int(2) NOT NULL AUTO_INCREMENT,
	`term_name` varchar(25) NOT NULL, 
	PRIMARY KEY (`term_id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__courselist` (
	`course_id` int(11) NOT NULL AUTO_INCREMENT,
	`published` BOOLEAN NOT NULL DEFAULT 0,
	`course_code` VARCHAR(4) NOT NULL,
	`course_dept` VARCHAR(4) NOT NULL,
	`course_name` VARCHAR(255) NOT NULL,
	`course_desc` VARCHAR(3000),
	`course_graphic_url` VARCHAR(255),
	`credit_hours` INT(1) NOT NULL,
	PRIMARY KEY (`course_id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__courselist_sections` (
	`section_id` int(11) NOT NULL AUTO_INCREMENT,
	`course_id` int(11) NOT NULL,
	`term_id` int(2) NULL,
	`eden_id` VARCHAR(15) NULL,
	`published` BOOLEAN NOT NULL DEFAULT 0,
	`section_num` VARCHAR(2),
	`section_desc` VARCHAR(3000),
	`start_date` DATE NOT NULL DEFAULT '1000-01-01',
	`end_date` DATE NOT NULL DEFAULT '1000-01-01',
	`prereq` VARCHAR(150),
	`video_id` VARCHAR(100),
	`delivery_location` VARCHAR(50),
	`physical_location` VARCHAR(50),
	`delivery_format` VARCHAR (25),
	`class_time` VARCHAR(100),
	`class_days` VARCHAR(100),
	`fs_cohort` TEXT(1) NULL,
	`math_cohort` TEXT(1) NULL,
	`tesol` TEXT(1) NULL,
	`syllabus` BOOLEAN NOT NULL DEFAULT 0,
	`yarmouth` BOOLEAN NOT NULL DEFAULT 0,
	PRIMARY KEY (`section_id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__courselist_instructors` (
	`instructor_id` int(11) NOT NULL AUTO_INCREMENT,
	`instructor_name` VARCHAR(100),
	`instructor_photo_url` VARCHAR(255),
	`instructor_video_id` VARCHAR(100),
	PRIMARY KEY (`instructor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__courselist_section_instructors` (
	`section_instructor_id` int(11) NOT NULL AUTO_INCREMENT,
	`section_id` int(11),
	`instructor_id` int(11),
	PRIMARY KEY (`section_instructor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__courselist_fees` (
	`fee_id` int(11) NOT NULL AUTO_INCREMENT,
	`fee_name` VARCHAR(50),
	`amount` FLOAT(7,2),
	`international_amount` FLOAT(7,2),
	PRIMARY KEY (`fee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__courselist_section_fees` (
	`section_fee_id` int(11) NOT NULL AUTO_INCREMENT,
	`section_id` int(11),
	`fee_id` int(11),
	PRIMARY KEY (`section_fee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;