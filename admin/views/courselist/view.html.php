<?php defined('_JEXEC') or die;

jimport('joomla.applications.component.view');

class CourseListViewCourseList extends JViewLegacy {
	
	function display($tpl = null) {
		// plain old list view display stuff
		// that we get from the model (/admin/models/courselist.php)
		$items = $this->get('Items');
		$courses = $this->get('Courses');
		$pagination = $this->get('Pagination');

		$this->items = $items;
		$this->courses = $courses;
		$this->pagination = $pagination;

		CourseListHelper::addSubmenu('courselist');

		$this->addToolBar();

		$this->sidebar = JHtmlSidebar::render();

		parent::display($tpl);
	}

	// toolbar buttons
	function addToolBar() {
		require_once JPATH_COMPONENT . '/helpers/courselist.php';
		JToolBarHelper::title(JText::_('COM_COURSELIST_MANAGER_COURSES'));
		JToolBarHelper::addNew('course.add');
		JToolBarHelper::editList('course.edit');
		JToolBarHelper::publishList('courselist.publish');
		JToolBarHelper::unpublishList('courselist.unpublish');
		JToolBarHelper::deleteList('', 'courselist.delete');
	}
}