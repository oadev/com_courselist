CREATE TABLE `#__courselist_terms` (
	`term_id` INT(2) NOT NULL AUTO_INCREMENT,
	`term_name` VARCHAR(25) NOT NULL, 
	PRIMARY KEY (`term_id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE `#__courselist` (
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

CREATE TABLE `#__courselist_sections` (
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

CREATE TABLE `#__courselist_instructors` (
	`instructor_id` INT(11) NOT NULL AUTO_INCREMENT,
	`instructor_first_name` VARCHAR(128),
	`instructor_last_name` VARCHAR(128),
	`instructor_photo_url` VARCHAR(128),
	`instructor_video_url` VARCHAR(128),
	PRIMARY KEY (`instructor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE `#__courselist_section_instructors` (
	`section_instructor_id` INT(11) NOT NULL AUTO_INCREMENT,
	`section_id` INT(11),
	`instructor_id` INT(11),
	PRIMARY KEY (`section_instructor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE `#__courselist_fees` (
	`fee_id` INT(11) NOT NULL AUTO_INCREMENT,
	`fee_name` VARCHAR(50),
	`fee_amount` FLOAT(7,2),
	`international_amount` FLOAT(7,2),
	PRIMARY KEY (`fee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE `#__courselist_section_fees` (
	`section_fee_id` INT(11) NOT NULL AUTO_INCREMENT,
	`section_id` INT(11),
	`fee_id` INT(11),
	PRIMARY KEY (`section_fee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

INSERT INTO `#__courselist_terms` (term_name) VALUES ('Fall'), ('Winter'), ('Spring'), ('Summer'), ('Fall/Winter');

INSERT INTO `#__courselist` (published, course_code, course_dept, course_name, course_desc, credit_hours) VALUES (
1, 1337, 'COMP', 'l33tn3ss with Computers and PC Macheins', 'Donec eros dolor, tristique quis libero id, feugiat auctor tellus. Vestibulum vel imperdiet libero. Suspendisse ornare pretium semper. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Praesent accumsan odio eu erat mattis rhoncus. Morbi fringilla leo massa, ac finibus erat varius non. Vestibulum eros lectus, iaculis vitae enim sit amet, tempor fringilla nisl. Phasellus placerat sem a sapien dapibus vestibulum. Pellentesque elit libero, condimentum et tempus vitae, pulvinar sit amet eros. Pellentesque a sapien quis erat dapibus porttitor in ac felis. Phasellus maximus enim a justo rutrum, eget rhoncus augue laoreet.', 3);

INSERT INTO `#__courselist` (published, course_code, course_dept, course_name, course_desc, credit_hours) VALUES (
1, 1234, 'COUR', 'Course Number Two', 'Aenean nisi purus, congue id scelerisque ut, mollis nec nisl. Curabitur condimentum malesuada cursus. Proin vel mi gravida, congue velit et, consectetur nunc. In sit amet tellus mi. Vivamus maximus, augue ac molestie rutrum, ex elit porta ante, ac pellentesque turpis metus ut dolor. Phasellus condimentum sodales est, et venenatis mauris sagittis a. Mauris venenatis turpis vel nisi efficitur, nec commodo enim fringilla. Donec aliquam et enim at egestas. Maecenas ex ex, gravida non velit sed, Interdum mollis nisi. Nullam vel efficitur ipsum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam bibendum quis sem in pellentesque. Morbi vehicula dapibus rutrum.', 3);

INSERT INTO `#__courselist_sections` (course_id, term_id, eden_id, section_num, published, start_date, end_date, prereq, video_url, delivery_format, delivery_location, section_desc)
VALUES (1, 2, '1a2b3c4d5e', 'NT', 1, '2014-12-10', '2015-6-10', 'BIOL 1113/1123 or BIOL 1823 with C+ or higher','4900441', 'Open Entry', 'Online', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ante quam, pellentesque eu dictum et, tempor varius sapien. Proin auctor convallis iaculis. Morbi eu magna neque. Donec condimentum nisi convallis, maximus mauris in, vestibulum nisl. Sed sed turpis convallis, eleifend risus volutpat, euismod nibh. Ut sed fringilla diam. Fusce euismod tellus diam, sit amet lobortis dui ultricies sit amet. Duis elementum risus velit, vel ullamcorper nisi congue eu. Morbi luctus egestas dignissim. Praesent in cursus leo. Ut a ante at magna condimentum bibendum. Ut sollicitudin, massa at tempus auctor, tellus libero molestie lorem, in congue diam erat ut diam. Vestibulum in eros lorem.Donec eros dolor, tristique quis libero id, feugiat auctor tellus. Vestibulum vel imperdiet libero. Suspendisse ornare pretium semper. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Praesent accumsan odio eu erat mattis rhoncus. Morbi fringilla leo massa, ac finibus erat varius non. Vestibulum eros lectus, iaculis vitae enim sit amet, tempor fringilla nisl. Phasellus placerat sem a sapien dapibus vestibulum. Pellentesque elit libero, condimentum et tempus vitae, pulvinar sit amet eros. Pellentesque a sapien quis erat dapibus porttitor in ac felis. Phasellus maximus enim a justo rutrum, eget rhoncus augue laoreet.');

INSERT INTO `#__courselist_sections` (course_id, term_id, eden_id, section_num, published, start_date, end_date, prereq, video_url, delivery_format, delivery_location, section_desc)
VALUES (2, 3, '5e4d3c2b1a', 'N8', 1, '2015-09-11', '2016-3-11', 'Reading/writing comprehension and general literacy.', '112201541', 'Intersession', 'Online', 'Donec eros dolor, tristique quis libero id, feugiat auctor tellus. Vestibulum vel imperdiet libero. Suspendisse ornare pretium semper. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Praesent accumsan odio eu erat mattis rhoncus. Morbi fringilla leo massa, ac finibus erat varius non. Vestibulum eros lectus, iaculis vitae enim sit amet, tempor fringilla nisl. Phasellus placerat sem a sapien dapibus vestibulum. Pellentesque elit libero, condimentum et tempus vitae, pulvinar sit amet eros. Pellentesque a sapien quis erat dapibus porttitor in ac felis. Phasellus maximus enim a justo rutrum, eget rhoncus augue laoreet.Aenean nisi purus, congue id scelerisque ut, mollis nec nisl. Curabitur condimentum malesuada cursus. Proin vel mi gravida, congue velit et, consectetur nunc. In sit amet tellus mi. Vivamus maximus, augue ac molestie rutrum, ex elit porta ante, ac pellentesque turpis metus ut dolor. Phasellus condimentum sodales est, et venenatis mauris sagittis a. Mauris venenatis turpis vel nisi efficitur, nec commodo enim fringilla. Donec aliquam et enim at egestas. Maecenas ex ex, gravida non velit sed, interdum mollis nisi. Nullam vel efficitur ipsum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam bibendum quis sem in pellentesque. Morbi vehicula dapibus rutrum.');

INSERT INTO `#__courselist_sections` (course_id, term_id, eden_id, section_num, published, start_date, end_date, prereq, video_url, delivery_format, delivery_location, class_time, class_days, section_desc)
VALUES (1, 5, '58-4d3-y2d1g', 'R1', 1, '2016-04-20', '2017-4-20', 'Reading/writing comprehension and general literacy.', '112201541', 'Classroom', 'On Campus', '13:30 - 15:00', 'Donec eros dolor, tristique quis libero id, feugiat auctor tellus. Vestibulum vel imperdiet libero. Suspendisse ornare pretium semper. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Praesent accumsan odio eu erat mattis rhoncus. Morbi fringilla leo massa, ac finibus erat varius non. Vestibulum eros lectus, iaculis vitae enim sit amet, tempor fringilla nisl. Phasellus placerat sem a sapien dapibus vestibulum. Pellentesque elit libero, condimentum et tempus vitae, pulvinar sit amet eros. Pellentesque a sapien quis erat dapibus porttitor in ac felis. Phasellus maximus enim a justo rutrum, eget rhoncus augue laoreet.Aenean nisi purus, congue id scelerisque ut, mollis nec nisl. Curabitur condimentum malesuada cursus. Proin vel mi gravida, congue velit et, consectetur nunc. In sit amet tellus mi. Vivamus maximus, augue ac molestie rutrum, ex elit porta ante, ac pellentesque turpis metus ut dolor. Phasellus condimentum sodales est, et venenatis mauris sagittis a. Mauris venenatis turpis vel nisi efficitur, nec commodo enim fringilla. Donec aliquam et enim at egestas. Maecenas ex ex, gravida non velit sed, interdum mollis nisi. Nullam vel efficitur ipsum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam bibendum quis sem in pellentesque. Morbi vehicula dapibus rutrum.');

INSERT INTO `#__courselist_instructors` (instructor_last_name, instructor_first_name, instructor_video_url, instructor_photo_url) VALUES ('Peppertooth', 'Chauncey', '103902910', '/images/instructors/michael_shaw.jpg');
INSERT INTO `#__courselist_section_instructors` (section_id, instructor_id) VALUES (1, 1);

INSERT INTO `#__courselist_instructors` (instructor_last_name, instructor_first_name, instructor_video_url, instructor_photo_url) VALUES ('Shaw', 'Michael', '4900589', '/images/instructors/michael_shaw.jpg');
INSERT INTO `#__courselist_section_instructors` (section_id, instructor_id) VALUES (2, 2);
INSERT INTO `#__courselist_section_instructors` (section_id, instructor_id) VALUES (3, 2);

INSERT INTO `#__courselist_fees` (fee_name, fee_amount, international_amount) VALUES (
'Rediculous Testing Fee', 1.00, 2000.00);
INSERT INTO `#__courselist_section_fees` (section_id, fee_id) VALUES (1, 1);