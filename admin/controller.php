<?php
defined( '_JEXEC') or die;

jimport('joomla.application.component.controller');

class CourseListController extends JControllerLegacy {
	
	function display($cachable = false, $urlparams = false) {
		// sets the default view (CourseList view) if not already specified
		$input = JFactory::getApplication()->input;
		$input->set('view', $input->getCmd('view', 'CourseList'));

		// calls parent default display function
		parent::display($cachable);
	}

}