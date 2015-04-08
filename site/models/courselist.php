<?php
	defined('_JEXEC') or die;

	jimport('joomla.application.component.modellist');

	class CourseListModelCourseList extends JModelList {
		public function getItems() {
			$items = parent::getItems();

			//foreach ($items as $item) {

			//}

			return $items;
		}

		public function getCourses() {
			$db = JFactory::getDBO();
			$query = parent::getListQuery(true);

			$query
				->select('*')
				->from($db->quoteName('#__courselist', 'a'))
				->where($db->quoteName('a.published')." = ".$db->quote(1));
			$db->setQuery($query);
			$rows = $db->loadObjectList();
			return $rows;
		}

		public function getSections() {
			$db = JFactory::getDBO();
			$query = parent::getListQuery(true);

			$query
				->select('*')
				->from($db->quoteName('#__courselist_sections', 'b'))
				//->join('INNER', $db->quoteName('#__courselist_section_instructors', 'c') . ' ON (' . $db->quoteName('c.section_id') . ' = ' . $db->quoteName('b.section_id') . ')')
				//->join('INNER', $db->quoteName('#__courselist_instructors', 'd') . ' ON (' . $db->quoteName('d.instructor_id') . ' = ' . $db->quoteName('c.instructor_id') . ')')
				//->join('LEFT OUTER', $db->quoteName('#__courselist_terms', 'e') . ' ON (' . $db->quoteName('b.term_id') . ' = ' . $db->quoteName('e.term_id') . ')')
				->order($db->quoteName('b.course_id'));
				$db->setQuery($query);
				$sections = $db->loadObjectList();
				return $sections;
		}
	}