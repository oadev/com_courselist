<?php defined('_JEXEC') or die;

jimport('joomla.applications.component.view');

class CourseListViewSections extends JViewLegacy {
	
	function display($tpl = null) {
		// plain old list view display stuff
		// that we get from the model
		$items = $this->get('Items');
		$sections = $this->get('Sections');
		//$something = $this->get('Something');
		$pagination = $this->get('Pagination');

		$this->items = $items;
		$this->sections = $sections;
		//$this->something = $something;
		$this->pagination = $pagination;

		CourseListHelper::addSubmenu('sections');

		$this->addToolBar();

		$this->sidebar = JHtmlSidebar::render();

		//this includes jquery so maybe we can put some tabs in the view
		JHtml::_('jquery.framework');
		
		parent::display($tpl);
	}

	// toolbar buttons
	function addToolBar() {
		require_once JPATH_COMPONENT . '/helpers/courselist.php';

		JToolBarHelper::title(JText::_('COM_COURSELIST_MANAGER_COURSES'));
		JToolBarHelper::addNew('section.add');
		JToolBarHelper::editList('section.edit');
		JToolBarHelper::publishList('sections.publish');
		JToolBarHelper::unpublishList('sections.unpublish');
		JToolBarHelper::deleteList('', 'sections.delete');
	}
}