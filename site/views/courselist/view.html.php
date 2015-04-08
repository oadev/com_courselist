<?php
	defined('_JEXEC') or die;

	jimport('joomla.application.component.view');

	class CourseListViewCourseList extends JViewLegacy {
		protected $item;
		protected $courses;
		protected $sections;

		public function display($tpl = null) {
			// get from the CourseList model
			$this->items = $this->get('Item');
			$this->courses = $this->get('Courses');
			$this->sections = $this->get('Sections');
			// display the view
			parent::display($tpl);
		}
	}