<?php defined ('_JEXEC') or die; 
JHtml::_('behavior.tooltip');
error_reporting(E_ALL);

// This is just a course listing view, pretty similar to what is on the front end
// except this is inside of an administrative form which provides some of joomla's 
// back-end administrative functionality

?>

<form action="<?php echo JRoute::_('index.php?option=com_courselist'); ?>" method="post" name="adminForm" id="adminForm">

	<div id="j-sidebar-container" class="span2">
		<?php echo $this->sidebar; ?>
	</div>
	<div id="j-main-container" class="span10">
		<div role="tabpanel">
			<ul class="nav nav-tabs" role="tablist" id="myTab">
				<li role="presentation" class="active"><a href="#sections" aria-controls="sections" role="tab" data-toggle="tab">Sections</a></li>
				<li role="presentation"><a href="#unassigned-sections" aria-controls="unassigned-sections" role="tab" data-toggle="tab">Unassigned Sections</a></li>
			</ul>
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane active" id="sections">
					<table class="table table-striped adminlist">
						<thead>
							<tr>
								<th width="1%"><input type="checkbox" name="toggle" value="" onclick="Joomla.checkAll(this);"></th>
								<th width="10%"><?php echo JText::_('Course Code'); ?></th>
								<th width="25%"><?php echo JText::_('Course Name'); ?></th>
								<th><?php echo JText::_('JSTATUS'); ?></th>
							</tr>	
						</thead>
						<tbody>
							<?php 
							// loop through and echo course information 
							foreach($this->sections as $i => $item) { ?>
							<tr class="row<?php echo $i % 2; ?>">
								<td class="center">
										<?php // checkboxes
										echo JHtml::_('grid.id', $i, $item->section_id); ?>
									</td>
									<td>
										<strong><?php echo '<a href="index.php?option=com_courselist&amp;task=section.edit&amp;section_id='.$item->section_id.'">' . $this->escape($item->course_dept) . " " . $this->escape($item->course_code). " " . $this->escape($item->section_num) . '</a>'; ?></strong>
									</td>
									<td>
										<?php echo $this->escape($item->course_name); ?>
									</td>
									<td>
										<?php // publish and unpublish buttons
										echo JHtml::_('jgrid.published', $item->section_published, $i, 'Sections.', true, 'cb'); ?>
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


					<div role="tabpanel" class="tab-pane" id="unassigned-sections">
						<pre>
							<?php //print_r($this->something); ?>
						</pre>
					</div>
				</div><!-- /tab-content -->
			</div> 
		</div>

		<div>
			<!-- hidden inputs for task, keeping track of what is checked -->
			<input type="hidden" name="task" value="" />
			<input type="hidden" name="boxchecked" value="0" />
				<?php // security token stuff 
				echo JHtml::_('form.token'); ?>
			</div>
		</form>


		<script>
			// stuff to make our tabs work
			jQuery('#myTab a').click(function (e) {
				e.preventDefault()
				jQuery(this).tab('show')
			});
		</script>