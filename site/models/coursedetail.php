<?php
	defined('_JEXEC') or die;

	jimport('joomla.application.component.modellist');

	class CourseListModelCourseDetail extends JModelList
	 {
		public function getItems() {
			$items = parent::getItems();
			return $items;
		}

		public function getCourse() {
			$jinput = JFactory::getApplication()->input;
			$db = JFactory::getDBO();
			$query = parent::getListQuery(true);
			$course_id = $jinput->get('id', 1, 'INT');
			$section_id = $jinput->get('sid', 1, 'INT');

			$query
				->select('*')
				->from($db->quoteName('#__courselist_sections', 'b'))
				->join('INNER', $db->quoteName('#__courselist', 'a') . ' ON (' . $db->quoteName('a.course_id') . ' = ' . $db->quoteName('b.course_id') .')')
				->join('INNER', $db->quoteName('#__courselist_section_instructors', 'c') . ' ON (' . $db->quoteName('c.section_id') . ' = ' . $db->quoteName('b.section_id') . ')')
				->join('INNER', $db->quoteName('#__courselist_instructors', 'd') . ' ON (' . $db->quoteName('d.instructor_id') . ' = ' . $db->quoteName('c.instructor_id') . ')')
				->join('LEFT OUTER', $db->quoteName('#__courselist_terms', 'e') . ' ON (' . $db->quoteName('b.term_id') . ' = ' . $db->quoteName('e.term_id') . ')')
				->where($db->quoteName('b.section_id')." = ".$section_id." AND ".$db->quoteName('b.course_id')." = ".$course_id);
			$db->setQuery($query);
			$rows = $db->loadObjectList();
			return $rows;
		}
	}