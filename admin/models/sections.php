<?php defined( '_JEXEC') or die;

jimport('joomla.application.component.modellist');

class CourseListModelSections extends JModelList {
	public function getItems() {
		$items = parent::getItems();
		return $items;
	}

	 public function getSections() {
		$db = JFactory::getDBO();
		$query = parent::getListQuery(true);

		// build query. pull from courses and sections table. we specficially select published status for courses and 
		// sections using aliases to avoid conflicts as the column names are the same in each table.
		$query
			->select('*')
			->select($db->quoteName('a.published', 'section_published'))
		    ->select($db->quoteName('b.published', 'course_published'))
		    ->from($db->quoteName('#__courselist_sections', 'a'))
		    ->join('INNER', $db->quoteName('#__courselist', 'b') . ' ON (' . $db->quoteName('a.course_id') . ' = ' . $db->quoteName('b.course_id') . ')')
		    ->order($db->quoteName('a.course_id'));
		$db->setQuery($query);
		$sections = $db->loadObjectList();
		return $sections;
	}

	/* public function getSomething() {
		$db = JFactory::getDBO();
		$query = parent::getListQuery(true);

		$query
			->select('*');
			->from($db->quoteName('#__courselist_section_instructors'));

		$db->setQuery($query);
		$something = $db->loadObjectList();
		return $something;
	} */
}