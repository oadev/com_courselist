<?php defined ('_JEXEC') or die; 
JHtml::_('behavior.tooltip');

// This is just a course listing view, pretty similar to what is on the front end
// except this is inside of an administrative form which provides some of joomla's 
// back-end administrative functionality
error_reporting(E_ALL);

?>
<jdoc:include type="message" />
<form action="<?php echo JRoute::_('index.php?option=com_courselist'); ?>" method="post" name="adminForm" id="adminForm">
	<div id="j-sidebar-container" class="span2">
		<?php echo $this->sidebar; ?>
	</div>
	<div id="j-main-container" class="span10">
	<table class="table table-striped adminlist">
		<thead>
			<tr>
				<th width="1%"><input type="checkbox" name="toggle" value="" onclick="Joomla.checkAll(this);"></th>
				<th width="10%"><?php echo JText::_('Course Code'); ?></th>
				<th width="25%"><?php echo JText::_('Course Name'); ?></th>
				<th><?php echo JText::_('Description'); ?></th>
				<th><?php echo JText::_('JSTATUS'); ?></th>
			</tr>	
		</thead>
		<tbody>
			<?php 
			// loop through and echo course information 
			foreach($this->courses as $i => $item) { ?>
				<tr class="row<?php echo $i % 2; ?>">
					<td class="center">
						<?php // checkboxes
							echo JHtml::_('grid.id', $i, $item->course_id); ?>
					</td>
					<td>
						<?php echo '<a href="index.php?option=com_courselist&amp;task=course.edit&amp;course_id='.$item->course_id.'">' . $this->escape($item->course_dept) . " " . $this->escape($item->course_code).'</a>'; ?>
					</td>
					<td>
						<?php
							$desc = $item->course_desc;
							$desc = substr($desc, 0, 199)
						?>
						<strong><?php echo $this->escape($item->course_name); ?></strong>
					</td>
					<td>
						<?php echo $desc . "..."; ?>
					</td>
					<td>
						<?php // publish and unpublish buttons
							echo JHtml::_('jgrid.published', $item->published, $i, 'CourseList.', true, 'cb'); ?>
					</td>
				</tr>
			<?php } // end foreach ?>
		</tbody>
		<tfoot>
			<tr>
				<td colspan="4"><?php echo $this->pagination->getListFooter(); ?></td>
			</tr>
		</tfoot>
	</table>
	</div>
	<div>
		<!-- hidden inputs for task, keeping track of what is checked -->
		<input type="hidden" name="task" value="" />
		<input type="hidden" name="boxchecked" value="0" />
		<?php // security token stuff 
			echo JHtml::_('form.token'); ?>
	</div>
</form>