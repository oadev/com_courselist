<?php defined( '_JEXEC') or die;

jimport('joomla.application.component.modellist');

class CourseListModelCourseList extends JModelList {
	public function getItems() {
		$items = parent::getItems();
		return $items;
	}

	public function getCourses() {
		$db = JFactory::getDBO();
		$query = parent::getListQuery(true);

		$query
			->select('*')
			->from('#__courselist', 'a');
		$db->setQuery($query);
		$rows = $db->loadObjectList();
		return $rows;
	}

	// this function is going to check for sections associated with a course
	// when the admin calls the delete() function in the course list.
	// if there are sections for that course, the admin won't be able to delete
	// the parent course
	public function getAssocSections($id) {
		$courseid = $id; // array of course id's passed to this function
		$courseCount = count($courseid); // count the number of courses passed to this function

		// get database object and new query object
		$db = JFactory::getDBO();
		$query = parent::getListQuery(true);

		// create conditions for sql statement, looping through id's of courses
		// to be deleted
		$conditions = array();
		for ($x = 0; $x < $courseCount; $x++) {
			$conditions[$x] = $db->quoteName('course_id') . ' = ' . $id[$x];
		}

		// run the query looking for rows in the 'courselist_sections' table that have
		// matching course_id values with the ones up for deletion. then return the results
		// to the controller delete() function inside admin/controllers/courselist.php
		$query
			->select('*')
			->from('#__courselist_sections')
			->where($conditions, 'OR');

		$db->setQuery($query);
		$assocSections = $db->loadObjectList();
		return $assocSections;
	}
}