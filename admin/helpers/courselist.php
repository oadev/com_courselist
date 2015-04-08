<?php
class CourseListHelper extends JHelperContent
{
    public static function addSubmenu($vName)
    {	
    	JHtmlSidebar::addEntry(
            'Courses',
            'index.php?option=com_courselist',
            $vName == 'courselist'
        );

        JHtmlSidebar::addEntry(
            'Sections',
            'index.php?option=com_courselist&view=sections',
            $vName == 'sections'
        );
    }
}