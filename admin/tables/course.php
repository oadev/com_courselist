<?php
	defined('_JEXEC') or die;

	jimport('joomla.database.table');

	class CourseListTableCourse extends JTable {
		function __construct(&$db) {
			parent::__construct('#__courselist', 'course_id', $db);
		}
	}