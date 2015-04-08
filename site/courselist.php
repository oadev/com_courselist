<?php
	defined ('_JEXEC') or die;

	// get instance of CourseList controller
	$controller = JControllerLegacy::getInstance('CourseList');

	// get input (the requested task) and execute it
	$input = JFactory::getApplication()->input;
	$controller->execute($input->getCmd('task'));

	// redirect if set by the controller
	$controller->redirect();

