<?php
defined('_JEXEC') or die;

jimport('joomla.application.component.controlleradmin');

class CourseListControllerSections extends JControllerAdmin {

	protected $text_prefix = 'COM_COURSELIST_COURSELIST';

	public function getModel($name = 'Section', $prefix = 'CourseListModel', $config = array('ignore_request' => true)) {
		$model = parent::getModel($name, $prefix, $config);
		return $model;
	}

}