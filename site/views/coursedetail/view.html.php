<?php
	defined('_JEXEC') or die;

	jimport('joomla.application.component.view');

	class CourseListViewCourseDetail extends JViewLegacy {
		protected $course_details;
		protected $items;

		public function display($tpl = null) {
			// get from the CourseList model
			$this->items = $this->get('Items');
			$this->course_details = $this->get('Course');
			// display the view
			parent::display($tpl);
		}
	}