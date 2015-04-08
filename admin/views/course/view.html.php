<?php
defined('_JEXEC') or die;

jimport('joomla.application.component.view');

class CourseListViewCourse extends JViewLegacy {
	protected $item;

	public function display($tpl = null) {
		$form = $this->get('Form');
		$item = $this->get('Item');

		$this->form = $form;
		$this->item = $item;

		$this->addToolbar();

		parent::display($tpl);
	}

	public function addToolbar() {
		$input = JFactory::getApplication()->input;
		$input->set('hidemainmenu', true);
		$isNew = ($this->item->course_id == 0);

		JToolBarHelper::title($isNew ? JText::_('COM_COURSELIST_MANAGER_COURSE_NEW')
									: JText::_('COM_COURSELIST_MANAGER_COURSE_EDIT'));
		JToolBarHelper::apply('course.apply');
		JToolBarHelper::save('course.save');
		JToolBarHelper::cancel('course.cancel', $isNew ? 'JTOOLBAR_CANCEL' : 'JTOOLBAR_CLOSE');
	}
}