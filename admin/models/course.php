<?php
defined('_JEXEC') or die;

class CourseListModelCourse extends JModelAdmin {
	// tell joomla what table we want to work with
	// we get the table from /admin/tables/course.php
	public function getTable($type = 'Course', $prefix = 'CourseListTable', $config = array()) {
		return JTable::getInstance($type, $prefix, $config);
	}

	// this is the form that will edit the activity
	// we get the form from /admin/models/forms/course.xml
	public function getForm($data = array(), $loadData = true) {
		$form = $this->loadForm('com_courselist.course', 'course', array('control' => 'jform', 'load_data' => $loadData));

		if (empty($form)) {
			return false;
		}

		return $form;
	}

	// load form data (???) LOL
	// i assume this gets the task and then course id and loads up the form with this data?
	protected function loadFormData() {
		$data = JFactory::getApplication()->getUserState('com_courselist.edit.course.data', array());
		
		if (empty($data)) {
			$data = $this->getItem();
		}
		
		return $data;
	}
}