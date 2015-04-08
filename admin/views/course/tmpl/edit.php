
<?php defined('_JEXEC') or die; 
JHtml::_('behavior.tooltip');
$document = JFactory::getDocument();
$url = 'components/com_courselist/css/style.css';
$document->addStyleSheet($url);
?>

<?php 
	if (!isset($_GET['course_id'])) {
		// Hide file upload unless editing existing course
		// (have to apply course graphic after course is created)
		$style = '#jform_course_graphic_url, #jform_course_graphic_url-lbl {'
        . 'display: none;'
        . '}'; 
		$document->addStyleDeclaration($style);
	}
?>


<form enctype="multipart/form-data" action="<?php JRoute::_('index.php?option=com_courselist&layout=edit&course_id='.(int) $this->item->course_id); ?>"
	method="post" name="adminForm" id="adminForm">
	
	<fieldset class="adminForm">
		<legend><?php echo JText::_('COM_COURSELIST_COURSE_DETAILS'); ?></legend>
		<input type='hidden' name='MAX_FILE_SIZE' value='10000000'>
		<ul class="adminformlist">
			<?php foreach($this->form->getFieldset() as $field): ?>
				<li><?php echo $field->label; echo $field->input; ?></li>
			<?php endforeach; ?>
		</ul>
		<?php if ($field->value != '') { ?>
			<img src="<?php echo JURI::root() . $field->value; ?>">
		<?php } ?>
	</fieldset>
	<div class="form-actions">
		<input type="hidden" name="task" value="course.edit">
		<?php echo JHtml::_('form.token'); ?>
	</div>
</form>



