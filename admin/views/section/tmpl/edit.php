
<?php defined('_JEXEC') or die; 
JHtml::_('behavior.tooltip');
$document = JFactory::getDocument();
$url = 'components/com_courselist/css/style.css';
$document->addStyleSheet($url);
?>


<form enctype="multipart/form-data" action="<?php JRoute::_('index.php?option=com_courselist&layout=edit&section_id='.(int) $this->item->section_id); ?>"
	method="post" name="adminForm" id="adminForm">
	
	<fieldset class="adminForm">
		<legend><?php echo JText::_('COM_COURSELIST_SECTION_DETAILS'); ?></legend>
		<ul class="adminformlist">
			<?php foreach($this->form->getFieldset() as $field): ?>
				<li><?php echo $field->label; echo $field->input; ?></li>
			<?php endforeach; ?>
		</ul>
	</fieldset>
	<div class="form-actions">
		<input type="hidden" name="task" value="section.edit">
		<?php echo JHtml::_('form.token'); ?>
	</div>
</form>



