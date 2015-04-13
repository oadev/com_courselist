CREATE TABLE IF NOT EXISTS `#__courselist_terms` (
	`term_id` INT(2) NOT NULL AUTO_INCREMENT,
	`term_name` VARCHAR(25) NOT NULL, 
	PRIMARY KEY (`term_id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__courselist` (
	`course_id` INT(11) NOT NULL AUTO_INCREMENT,
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
	`section_id` INT(11) NOT NULL AUTO_INCREMENT,
	`course_id` INT(11) NOT NULL,
	`term_id` INT(2),
	`eden_id` VARCHAR(15),
	`published` BOOLEAN NOT NULL DEFAULT 0,
	`section_num` VARCHAR(2) NOT NULL,
	`section_desc` VARCHAR(3000),
	`start_date` DATE DEFAULT '1000-01-01',
	`end_date` DATE DEFAULT '1000-01-01',
	`prereq` VARCHAR(256),
	`video_url` VARCHAR(128),
	`delivery_format` VARCHAR (64) NOT NULL,
	`delivery_location` VARCHAR(128),
	`class_time` VARCHAR(128),
	`class_days` VARCHAR(128),
	`syllabus` INT(4) DEFAULT 0,
	PRIMARY KEY (`section_id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__courselist_instructors` (
	`instructor_id` INT(11) NOT NULL AUTO_INCREMENT,
	`instructor_first_name` VARCHAR(128),
	`instructor_last_name` VARCHAR(128),
	`instructor_photo_url` VARCHAR(128),
	`instructor_video_url` VARCHAR(128),
	PRIMARY KEY (`instructor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__courselist_section_instructors` (
	`section_instructor_id` INT(11) NOT NULL AUTO_INCREMENT,
	`section_id` INT(11),
	`instructor_id` INT(11),
	PRIMARY KEY (`section_instructor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__courselist_fees` (
	`fee_id` INT(11) NOT NULL AUTO_INCREMENT,
	`fee_name` VARCHAR(50),
	`fee_amount` FLOAT(7,2),
	`international_amount` FLOAT(7,2),
	PRIMARY KEY (`fee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__courselist_section_fees` (
	`section_fee_id` INT(11) NOT NULL AUTO_INCREMENT,
	`section_id` INT(11),
	`fee_id` INT(11),
	PRIMARY KEY (`section_fee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;