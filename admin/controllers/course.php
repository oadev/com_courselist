<?php defined('_JEXEC') or die;

// Here we have the course controller which ties into Joomla's save function
// and performs file upload and database update tasks.

jimport('joomla.application.component.controllerform');

class CourseListControllerCourse extends JControllerForm {
	protected $view_list = 'CourseList';

    // This function runs when an administrator saves a course. We deal with 
    // uploading and saving the course graphic, as well as updating/inserting
    // it's file path in the database. Once this function runs, it calls the
    // parent save function which handles saving everything else through the 
    // magic of Joomla and the interwebs ^_^
	function save($key = null, $urlVar = null){
        // ---------------------------- Uploading the file ---------------------
        // Neccesary libraries and variables to mess with files and folders
        jimport( 'joomla.filesystem.folder' );
        jimport('joomla.filesystem.file');
        jimport( 'joomla.environment.request' );
        
        // get input from form submission including file info
        // and set a place where the file will be saved
        $jinput = JFactory::getApplication()->input;
	    $files = $jinput->files->get('jform');
	    $filename = $files['course_graphic_url']['name'];
	    $folder = JPATH_SITE . "/" . "images" . "/" . "courselist";

        // Create the folder if not exists in images folder
        if ( !JFolder::exists( $folder ) ) {
            JFolder::create( $folder, 0777 );
        }

        // files and folder names
        $src = $files['course_graphic_url']['tmp_name']; // temp name taken from files array

        // full server path of where the file will land
        $fullpath_dest = JPATH_SITE . "/" . "images" . "/" . "courselist" . "/" . $filename;
        
        // slightly shorter file path to store in the database
        $dest = "/" . "images" . "/" . "courselist" . "/" . $filename;

        // perform file upload if input field is set
        // otherwise, don't bother
        if ($filename != NULL) {
        	JFile::upload( $src, $fullpath_dest );
    	}

        // ---------------------------- Updating the database ---------------------
    	// get a new database and query object
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);

		// get the course id from the form if it is set
		$cid = $jinput->get('course_id');
        
		// if we aren't creating a new course, and the file upload field isn't empty
		// run an update query on the already existing course_graphic_url field for this course
        // you have to save a new course before uploading and applying a course graphic
        // so there is no sql for course graphic stuff besides what you see below
        if ($cid != '' && $filename != NULL) {
			$fields = array($db->quoteName('course_graphic_url') . " = " . $db->quote($dest));
			$conditions = array($db->quoteName('course_id') . " = " . $cid);
			$query
				->update($db->quoteName('#__courselist'))->set($fields)->where($conditions);
			$db->setQuery($query);
			$db->execute($query);
		}

        // perform parent save function after everything above has happened :)
        return parent::save($key = null, $urlVar = null);
    }
}