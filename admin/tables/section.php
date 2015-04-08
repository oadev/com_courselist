<?php
	defined('_JEXEC') or die;

	jimport('joomla.database.table');

	class CourseListTableSection extends JTable {
		function __construct(&$db) {
			parent::__construct('#__courselist_sections', 'section_id', $db);
		}
	}