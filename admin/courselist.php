<?php
	defined ('_JEXEC') or die;

	// courselist helper class
	// require helper file
	JLoader::register('CourseListHelper', JPATH_COMPONENT . '/helpers/courselist.php');

	// get instance of CourseList controller
	$controller = JControllerLegacy::getInstance('CourseList');

	// get input (the requested task) and execute it
	$jinput = JFactory::getApplication()->input;
	$task = $jinput->get('task', "", 'STR');
	$controller->execute($task);

	// redirect if set by the controller
	$controller->redirect();
