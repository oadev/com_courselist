<?php
defined('_JEXEC') or die;

jimport('joomla.application.component.controlleradmin');

class CourseListControllerCourseList extends JControllerAdmin {

	protected $text_prefix = 'COM_COURSELIST_COURSELIST';

	public function getModel($name = 'Course', $prefix = 'CourseListModel', $config = array('ignore_request' => true)) {
		$model = parent::getModel($name, $prefix, $config);
		return $model;
	}


	// this function overrides the default delete function and checks for associated sections before going ahead
	// with the deletion process. courses with associated sections cannot be deleted. secions will have to be
	// deleted or reassigned before their parent courses can be deleted
	public function delete(&$pks) {
		// Get a handle to the Joomla! application object
		$application = JFactory::getApplication();

		// get user input. in this case, the course(s) they want to delete
		// returns an array assigned to the $cid variable
		$jinput = JFactory::getApplication()->input;
		$cid = $jinput->get('cid', null, null);

		// run the getAssocSections() function in admin/models/courselist.php
		// which returns an array 
		$model = $this->getModel("CourseList");
        $assocSections = $model->getAssocSections($cid);

        if ( empty($assocSections) ) {
        	parent::delete();
        } else {
			$application->enqueueMessage(JText::_('Could not delete course(s). You must delete or reassign course sections before you can perform this action.'), 'error');
			$link = JRoute::_('index.php?option=com_courselist&amp;view=courselist');
			$this->setRedirect($link);
		}
	}
}